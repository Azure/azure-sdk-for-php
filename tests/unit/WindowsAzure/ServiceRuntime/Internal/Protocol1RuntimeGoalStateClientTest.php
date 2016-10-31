<?php

/**
 * LICENSE: Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 * http://www.apache.org/licenses/LICENSE-2.0.
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 * 
 * PHP version 5
 *
 * @category  Microsoft
 *
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 *
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */

namespace Tests\unit\WindowsAzure\ServiceRuntime\Internal;

use org\bovigo\vfs\vfsStream;
use org\bovigo\vfs\vfsStreamDirectory;
use org\bovigo\vfs\vfsStreamWrapper;
use WindowsAzure\ServiceRuntime\Internal\ChunkedGoalStateDeserializer;
use WindowsAzure\ServiceRuntime\Internal\FileInputChannel;
use WindowsAzure\ServiceRuntime\Internal\Protocol1RuntimeCurrentStateClient;
use WindowsAzure\ServiceRuntime\Internal\Protocol1RuntimeGoalStateClient;
use WindowsAzure\ServiceRuntime\Internal\XmlRoleEnvironmentDataDeserializer;

/**
 * Unit tests for class Protocol1RuntimeGoalStateClient.
 *
 * @category  Microsoft
 *
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 *
 * @version   Release: 0.5.0_2016-11
 *
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
class Protocol1RuntimeGoalStateClientTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers \WindowsAzure\ServiceRuntime\Internal\Protocol1RuntimeGoalStateClient::__construct
     * @covers \WindowsAzure\ServiceRuntime\Internal\Protocol1RuntimeGoalStateClient::getCurrentGoalState
     * @covers \WindowsAzure\ServiceRuntime\Internal\Protocol1RuntimeGoalStateClient::setEndpoint
     * @covers \WindowsAzure\ServiceRuntime\Internal\Protocol1RuntimeGoalStateClient::_ensureGoalStateRetrieved
     */
    public function testGetCurrentGoalState()
    {
        // Setup
        $rootDirectory = 'root';
        $fileName = 'goalstate';
        $goalStateFileContent = '<?xml version="1.0" encoding="utf-8"?>'.
            '<GoalState xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" '.
            'xmlns:xsd="http://www.w3.org/2001/XMLSchema">'.
            '<Incarnation>1</Incarnation>'.
            '<ExpectedState>Started</ExpectedState>'.
            '<RoleEnvironmentPath></RoleEnvironmentPath>'.
            '<CurrentStateEndpoint>\\.\pipe\WindowsAzureRuntime.CurrentState</CurrentStateEndpoint>'.
            '<Deadline>9999-12-31T23:59:59.9999999</Deadline>'.
            '</GoalState>';

        $goalStateFileContent = dechex(strlen($goalStateFileContent))."\n".$goalStateFileContent;

        // Setup
        vfsStreamWrapper::register();
        vfsStreamWrapper::setRoot(new vfsStreamDirectory($rootDirectory));

        $file = vfsStream::newFile($fileName);
        $file->setContent($goalStateFileContent);

        vfsStreamWrapper::getRoot()->addChild($file);

        // Test
        $fileInputChannel = new FileInputChannel();
        $goalStateDeserializer = new ChunkedGoalStateDeserializer();
        $currentStateClient = new Protocol1RuntimeCurrentStateClient(null, null);
        $runtimeGoalStateClient = new Protocol1RuntimeGoalStateClient(
            $currentStateClient,
            $goalStateDeserializer,
            null,
            $fileInputChannel
        );

        $runtimeGoalStateClient->setEndpoint(vfsStream::url($rootDirectory.'/'.$fileName));

        // Test
        $this->assertNotEquals(null, $runtimeGoalStateClient->getCurrentGoalState());
    }

    /**
     * @covers \WindowsAzure\ServiceRuntime\Internal\Protocol1RuntimeGoalStateClient::__construct
     * @covers \WindowsAzure\ServiceRuntime\Internal\Protocol1RuntimeGoalStateClient::getRoleEnvironmentData
     * @covers \WindowsAzure\ServiceRuntime\Internal\Protocol1RuntimeGoalStateClient::setEndpoint
     * @covers \WindowsAzure\ServiceRuntime\Internal\Protocol1RuntimeGoalStateClient::_ensureGoalStateRetrieved
     */
    public function testGetRoleEnvironmentData()
    {
        // Setup
        $rootDirectory = 'root';

        vfsStreamWrapper::register();
        vfsStreamWrapper::setRoot(new vfsStreamDirectory($rootDirectory));

        $roleEnvironmentFileName = 'roleEnvironment';
        $roleEnvironmentFileContent = '<?xml version="1.0" encoding="utf-8"?>'.
            '<RoleEnvironment xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" '.
            'xmlns:xsd="http://www.w3.org/2001/XMLSchema">'.
            '<Deployment id="id1" emulated="false" />'.
            '<CurrentInstance id="geophotoapp_IN_0" roleName="geophotoapp" faultDomain="0" updateDomain="0">'.
            '<ConfigurationSettings />'.
            '<LocalResources>'.
            '<LocalResource name="DiagnosticStore" path="somepath.DiagnosticStore" sizeInMB="4096" />'.
            '</LocalResources>'.
            '<Endpoints>'.
            '<Endpoint name="HttpIn" address="10.114.250.21" port="80" protocol="tcp" />'.
            '</Endpoints>'.
            '</CurrentInstance>'.
            '<Roles />'.
            '</RoleEnvironment>';

        $file = vfsStream::newFile($roleEnvironmentFileName);
        $file->setContent($roleEnvironmentFileContent);

        vfsStreamWrapper::getRoot()->addChild($file);

        $goalStateFileName = 'goalstate';
        $goalStateFileContent = '<?xml version="1.0" encoding="utf-8"?>'.
            '<GoalState xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" '.
            'xmlns:xsd="http://www.w3.org/2001/XMLSchema">'.
            '<Incarnation>1</Incarnation>'.
            '<ExpectedState>Started</ExpectedState>'.
            '<RoleEnvironmentPath>'.
            vfsStream::url($rootDirectory.'/'.$roleEnvironmentFileName).
            '</RoleEnvironmentPath>'.
            '<CurrentStateEndpoint>\\.\pipe\WindowsAzureRuntime.CurrentState</CurrentStateEndpoint>'.
            '<Deadline>9999-12-31T23:59:59.9999999</Deadline>'.
            '</GoalState>';

        $goalStateFileContent = dechex(strlen($goalStateFileContent))."\n".$goalStateFileContent;

        $file = vfsStream::newFile($goalStateFileName);
        $file->setContent($goalStateFileContent);

        vfsStreamWrapper::getRoot()->addChild($file);

        // Test
        $fileInputChannel = new FileInputChannel();
        $goalStateDeserializer = new ChunkedGoalStateDeserializer();
        $roleEnvironmentDeserializer = new XmlRoleEnvironmentDataDeserializer();
        $currentStateClient = new Protocol1RuntimeCurrentStateClient(null, null);
        $runtimeGoalStateClient = new Protocol1RuntimeGoalStateClient(
            $currentStateClient,
            $goalStateDeserializer,
            $roleEnvironmentDeserializer,
            $fileInputChannel
        );

        $runtimeGoalStateClient->setEndpoint(vfsStream::url($rootDirectory.'/'.$goalStateFileName));

        // Test
        $this->assertNotEquals(null, $runtimeGoalStateClient->getRoleEnvironmentData());
    }

    /**
     * @covers \WindowsAzure\ServiceRuntime\Internal\Protocol1RuntimeGoalStateClient::setKeepOpen
     * @covers \WindowsAzure\ServiceRuntime\Internal\Protocol1RuntimeGoalStateClient::getKeepOpen
     */
    public function testSetKeepOpen()
    {
        // Setup
        $runtimeGoalStateClient = new Protocol1RuntimeGoalStateClient(
            null,
            null,
            null,
            null
        );

        // Test
        $runtimeGoalStateClient->setKeepOpen(true);
        $this->assertEquals(true, $runtimeGoalStateClient->getKeepOpen());

        $runtimeGoalStateClient->setKeepOpen(false);
        $this->assertEquals(false, $runtimeGoalStateClient->getKeepOpen());
    }

    /**
     * @covers \WindowsAzure\ServiceRuntime\Internal\Protocol1RuntimeGoalStateClient::setEndpoint
     * @covers \WindowsAzure\ServiceRuntime\Internal\Protocol1RuntimeGoalStateClient::getEndpoint
     */
    public function testSetGetEndpoint()
    {
        // Setup
        $runtimeGoalStateClient = new Protocol1RuntimeGoalStateClient(
            null,
            null,
            null,
            null
        );

        // Test
        $runtimeGoalStateClient->setEndpoint('endpoint1');
        $this->assertEquals('endpoint1', $runtimeGoalStateClient->getEndpoint());

        $runtimeGoalStateClient->setEndpoint('endpoint2');
        $this->assertEquals('endpoint2', $runtimeGoalStateClient->getEndpoint());
    }
}
