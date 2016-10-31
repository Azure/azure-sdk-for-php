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

namespace Tests\Unit\WindowsAzure\ServiceRuntime;

use org\bovigo\vfs\vfsStream;
use org\bovigo\vfs\vfsStreamDirectory;
use org\bovigo\vfs\vfsStreamWrapper;
use WindowsAzure\ServiceRuntime\Internal\FileInputChannel;
use WindowsAzure\ServiceRuntime\Internal\RoleEnvironmentConfigurationSettingChange;
use WindowsAzure\ServiceRuntime\RoleEnvironment;
use WindowsAzure\ServiceRuntime\Internal\RoleEnvironmentNotAvailableException;
use WindowsAzure\ServiceRuntime\Internal\RoleInstanceStatus;
use WindowsAzure\ServiceRuntime\Internal\RuntimeKernel;

/**
 * Unit tests for class RoleEnvironment.
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
class RoleEnvironmentTest extends \PHPUnit_Framework_TestCase
{
    public function testRoleNotAvailable()
    {
        // Setup
        putenv('WaRuntimeEndpoint=');

        // Test
        $this->setExpectedException(get_class(
            new RoleEnvironmentNotAvailableException()
        ));

        RoleEnvironment::getCurrentRoleInstance();
    }

    /**
     * @covers \WindowsAzure\ServiceRuntime\RoleEnvironment::_initialize
     * @covers \WindowsAzure\ServiceRuntime\RoleEnvironment::init
     */
    public function testValidEndpoint()
    {
        // Test 1 - No environment variable
        putenv('WaRuntimeEndpoint');

        try {
            RoleEnvironment::getDeploymentId();
        } catch (RoleEnvironmentNotAvailableException $exception) {
        }

        $endpoint = self::getStaticPropertyValue('_versionEndpoint');

        $this->assertEquals('\\\\.\\pipe\\WindowsAzureRuntime', $endpoint);

        // Test 2 - Environment variable
        putenv('WaRuntimeEndpoint=endpoint1');

        try {
            RoleEnvironment::getDeploymentId();
        } catch (RoleEnvironmentNotAvailableException $exception) {
        }

        $endpoint = self::getStaticPropertyValue('_versionEndpoint');

        $this->assertEquals('endpoint1', $endpoint);
    }

    /**
     * @covers \WindowsAzure\ServiceRuntime\RoleEnvironment::init
     * @covers \WindowsAzure\ServiceRuntime\RoleEnvironment::getClientId
     */
    public function testGetClientId()
    {
        // Test
        $this->assertNotEquals(null, RoleEnvironment::getClientId());
    }

    /**
     * @covers \WindowsAzure\ServiceRuntime\RoleEnvironment::isAvailable
     */
    public function testIsNotAvailable()
    {
        // Setup
        putenv('WaRuntimeEndpoint=');

        // Test
        $this->assertEquals(false, RoleEnvironment::isAvailable());
    }

    /**
     * @covers \WindowsAzure\ServiceRuntime\RoleEnvironment::isAvailable
     * @covers \WindowsAzure\ServiceRuntime\RoleEnvironment::_initialize
     */
    public function testIsAvailable()
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

        $fileName = 'versionendpoint';
        $fileContent = '<?xml version="1.0" encoding="utf-8"?>'.
            '<RuntimeServerDiscovery xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" '.
            'xmlns:xsd="http://www.w3.org/2001/XMLSchema">'.
            '<RuntimeServerEndpoints>'.
            '<RuntimeServerEndpoint version="2011-03-08" path="'.
            vfsStream::url($rootDirectory.'/'.$goalStateFileName).
            '" />'.
            '</RuntimeServerEndpoints>'.
            '</RuntimeServerDiscovery>';

        $file = vfsStream::newFile($fileName);
        $file->setContent($fileContent);

        vfsStreamWrapper::getRoot()->addChild($file);

        putenv('WaRuntimeEndpoint='.vfsStream::url($rootDirectory.'/'.$fileName));

        // Test
        $this->assertEquals(true, RoleEnvironment::isAvailable());
    }

    /**
     * @covers \WindowsAzure\ServiceRuntime\RoleEnvironment::getDeploymentId
     * @covers \WindowsAzure\ServiceRuntime\RoleEnvironment::_initialize
     */
    public function testGetDeploymentId()
    {
        // Setup
        $rootDirectory = 'root';

        vfsStreamWrapper::register();
        vfsStreamWrapper::setRoot(new vfsStreamDirectory($rootDirectory));

        $roleEnvironmentFileName = 'roleEnvironment';
        $roleEnvironmentFileContent = '<?xml version="1.0" encoding="utf-8"?>'.
            '<RoleEnvironment xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" '.
            'xmlns:xsd="http://www.w3.org/2001/XMLSchema">'.
            '<Deployment id="deploymentId" emulated="false" />'.
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

        $fileName = 'versionendpoint';
        $fileContent = '<?xml version="1.0" encoding="utf-8"?>'.
            '<RuntimeServerDiscovery xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" '.
            'xmlns:xsd="http://www.w3.org/2001/XMLSchema">'.
            '<RuntimeServerEndpoints>'.
            '<RuntimeServerEndpoint version="2011-03-08" path="'.
            vfsStream::url($rootDirectory.'/'.$goalStateFileName).
            '" />'.
            '</RuntimeServerEndpoints>'.
            '</RuntimeServerDiscovery>';

        $file = vfsStream::newFile($fileName);
        $file->setContent($fileContent);

        vfsStreamWrapper::getRoot()->addChild($file);

        putenv('WaRuntimeEndpoint='.vfsStream::url($rootDirectory.'/'.$fileName));

        // Test
        $this->assertEquals('deploymentId', RoleEnvironment::getDeploymentId());
    }

    /**
     * @covers \WindowsAzure\ServiceRuntime\RoleEnvironment::getCurrentRoleInstance
     * @covers \WindowsAzure\ServiceRuntime\RoleEnvironment::_initialize
     */
    public function testGetCurrentRoleInstance()
    {
        // Setup
        $rootDirectory = 'root';

        vfsStreamWrapper::register();
        vfsStreamWrapper::setRoot(new vfsStreamDirectory($rootDirectory));

        $roleEnvironmentFileName = 'roleEnvironment';
        $roleEnvironmentFileContent = '<?xml version="1.0" encoding="utf-8"?>'.
            '<RoleEnvironment xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" '.
            'xmlns:xsd="http://www.w3.org/2001/XMLSchema">'.
            '<Deployment id="deploymentId" emulated="false" />'.
            '<CurrentInstance id="id3" roleName="roleName" faultDomain="4" updateDomain="5">'.
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

        $fileName = 'versionendpoint';
        $fileContent = '<?xml version="1.0" encoding="utf-8"?>'.
            '<RuntimeServerDiscovery xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" '.
            'xmlns:xsd="http://www.w3.org/2001/XMLSchema">'.
            '<RuntimeServerEndpoints>'.
            '<RuntimeServerEndpoint version="2011-03-08" path="'.
            vfsStream::url($rootDirectory.'/'.$goalStateFileName).
            '" />'.
            '</RuntimeServerEndpoints>'.
            '</RuntimeServerDiscovery>';

        $file = vfsStream::newFile($fileName);
        $file->setContent($fileContent);

        vfsStreamWrapper::getRoot()->addChild($file);

        putenv('WaRuntimeEndpoint='.vfsStream::url($rootDirectory.'/'.$fileName));

        // Test
        $currentRoleInstance = RoleEnvironment::getCurrentRoleInstance();
        $this->assertEquals('id3', $currentRoleInstance->getId());
        $this->assertEquals('roleName', $currentRoleInstance->getRole()->getName());
        $this->assertEquals('4', $currentRoleInstance->getFaultDomain());
        $this->assertEquals('5', $currentRoleInstance->getUpdateDomain());

        $endpoints = $currentRoleInstance->getInstanceEndpoints();
        $this->assertTrue(array_key_exists('HttpIn', $endpoints));
        $this->assertEquals('10.114.250.21', $endpoints['HttpIn']->getAddress());
        $this->assertEquals('tcp', $endpoints['HttpIn']->getProtocol());
        $this->assertEquals('80', $endpoints['HttpIn']->getPort());
    }

    /**
     * @covers \WindowsAzure\ServiceRuntime\RoleEnvironment::isEmulated
     */
    public function testIsEmulated()
    {
        // Setup - is not emulated
        $rootDirectory = 'root';

        vfsStreamWrapper::register();
        vfsStreamWrapper::setRoot(new vfsStreamDirectory($rootDirectory));

        $roleEnvironmentFileName = 'roleEnvironment';
        $roleEnvironmentFileContent = '<?xml version="1.0" encoding="utf-8"?>'.
            '<RoleEnvironment xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" '.
            'xmlns:xsd="http://www.w3.org/2001/XMLSchema">'.
            '<Deployment id="deploymentId" emulated="false" />'.
            '<CurrentInstance id="id3" roleName="roleName" faultDomain="4" updateDomain="5">'.
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

        $roleEnvironmentFile = vfsStream::newFile($roleEnvironmentFileName);
        $roleEnvironmentFile->setContent($roleEnvironmentFileContent);

        vfsStreamWrapper::getRoot()->addChild($roleEnvironmentFile);

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

        $fileName = 'versionendpoint';
        $fileContent = '<?xml version="1.0" encoding="utf-8"?>'.
            '<RuntimeServerDiscovery xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" '.
            'xmlns:xsd="http://www.w3.org/2001/XMLSchema">'.
            '<RuntimeServerEndpoints>'.
            '<RuntimeServerEndpoint version="2011-03-08" path="'.
            vfsStream::url($rootDirectory.'/'.$goalStateFileName).
            '" />'.
            '</RuntimeServerEndpoints>'.
            '</RuntimeServerDiscovery>';

        $file = vfsStream::newFile($fileName);
        $file->setContent($fileContent);

        vfsStreamWrapper::getRoot()->addChild($file);

        putenv('WaRuntimeEndpoint='.vfsStream::url($rootDirectory.'/'.$fileName));

        // Test
        $this->assertEquals(false, RoleEnvironment::isEmulated());

        // Setup - is emulated
        $roleEnvironmentFileContent = '<?xml version="1.0" encoding="utf-8"?>'.
            '<RoleEnvironment xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" '.
            'xmlns:xsd="http://www.w3.org/2001/XMLSchema">'.
            '<Deployment id="deploymentId" emulated="true" />'.
            '<CurrentInstance id="id3" roleName="roleName" faultDomain="4" updateDomain="5">'.
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
        $roleEnvironmentFile->setContent($roleEnvironmentFileContent);

        $this->assertEquals(true, RoleEnvironment::isEmulated());
    }

    /**
     * @covers \WindowsAzure\ServiceRuntime\RoleEnvironment::getRoles
     * @covers \WindowsAzure\ServiceRuntime\RoleEnvironment::_initialize
     */
    public function testGetRoles()
    {
        // Setup
        $rootDirectory = 'root';

        vfsStreamWrapper::register();
        vfsStreamWrapper::setRoot(new vfsStreamDirectory($rootDirectory));

        $roleEnvironmentFileName = 'roleEnvironment';
        $roleEnvironmentFileContent = '<?xml version="1.0" encoding="utf-8"?>'.
            '<RoleEnvironment xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" '.
            'xmlns:xsd="http://www.w3.org/2001/XMLSchema">'.
            '<Deployment id="deploymentId" emulated="false" />'.
            '<CurrentInstance id="role3instance1" roleName="role3" faultDomain="4" updateDomain="4">'.
            '</CurrentInstance>'.
            '<Roles>'.
            '<Role name="role1">'.
            '<Instances>'.
            '<Instance id="role1instance1" faultDomain="1" updateDomain="1">'.
            '<Endpoints>'.
            '<Endpoint name="MyInternalEndpoint1" address="127.255.0.0" port="20000" protocol="tcp" />'.
            '</Endpoints>'.
            '</Instance>'.
            '</Instances>'.
            '</Role>'.
            '<Role name="role2">'.
            '<Instances>'.
            '<Instance id="role2instance1" faultDomain="2" updateDomain="2">'.
            '<Endpoints>'.
            '<Endpoint name="MyInternalEndpoint2" address="127.255.0.2" port="20002" protocol="tcp" />'.
            '</Endpoints>'.
            '</Instance>'.
            '<Instance id="role2instance2" faultDomain="3" updateDomain="3">'.
            '<Endpoints>'.
            '<Endpoint name="MyInternalEndpoint3" address="127.255.0.3" port="20002" protocol="tcp" />'.
            '<Endpoint name="MyInternalEndpoint4" address="127.255.0.3" port="20004" protocol="tcp" />'.
            '</Endpoints>'.
            '</Instance>'.
            '</Instances>'.
            '</Role>'.
            '</Roles>'.
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

        $fileName = 'versionendpoint';
        $fileContent = '<?xml version="1.0" encoding="utf-8"?>'.
            '<RuntimeServerDiscovery xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" '.
            'xmlns:xsd="http://www.w3.org/2001/XMLSchema">'.
            '<RuntimeServerEndpoints>'.
            '<RuntimeServerEndpoint version="2011-03-08" path="'.
            vfsStream::url($rootDirectory.'/'.$goalStateFileName).
            '" />'.
            '</RuntimeServerEndpoints>'.
            '</RuntimeServerDiscovery>';

        $file = vfsStream::newFile($fileName);
        $file->setContent($fileContent);

        vfsStreamWrapper::getRoot()->addChild($file);

        putenv('WaRuntimeEndpoint='.vfsStream::url($rootDirectory.'/'.$fileName));

        // Test
        $roles = RoleEnvironment::getRoles();
        $this->assertEquals(3, count($roles));
        $this->assertTrue(array_key_exists('role1', $roles));
        $this->assertTrue(array_key_exists('role2', $roles));
        $this->assertTrue(array_key_exists('role3', $roles));

        $role1 = $roles['role1'];
        $this->assertEquals('role1', $role1->getName());
        $role1Instances = $role1->getInstances();
        $this->assertEquals(1, count($role1Instances));
        $this->assertTrue(array_key_exists('role1instance1', $role1Instances));
        $this->assertEquals(1, $role1Instances['role1instance1']->getFaultDomain());
        $this->assertEquals(1, $role1Instances['role1instance1']->getUpdateDomain());

        $role2 = $roles['role2'];
        $this->assertEquals('role2', $role2->getName());
        $role2Instances = $role2->getInstances();
        $this->assertEquals(2, count($role2Instances));
        $this->assertTrue(array_key_exists('role2instance1', $role2Instances));
        $this->assertEquals(2, $role2Instances['role2instance1']->getFaultDomain());
        $this->assertEquals(2, $role2Instances['role2instance1']->getUpdateDomain());

        $this->assertTrue(array_key_exists('role2instance2', $role2Instances));
        $this->assertEquals(3, $role2Instances['role2instance2']->getFaultDomain());
        $this->assertEquals(3, $role2Instances['role2instance2']->getUpdateDomain());

        $role3 = $roles['role3'];
        $this->assertEquals('role3', $role3->getName());

        $role3Instances = $role3->getInstances();
        $this->assertEquals(1, count($role3Instances));
        $this->assertTrue(array_key_exists('role3instance1', $role3Instances));
        $this->assertEquals(4, $role3Instances['role3instance1']->getFaultDomain());
        $this->assertEquals(4, $role3Instances['role3instance1']->getUpdateDomain());
    }

    /**
     * @covers \WindowsAzure\ServiceRuntime\RoleEnvironment::getConfigurationSettings
     */
    public function testGetConfigurationSettings()
    {
        // Setup
        $rootDirectory = 'root';

        vfsStreamWrapper::register();
        vfsStreamWrapper::setRoot(new vfsStreamDirectory($rootDirectory));

        $roleEnvironmentFileName = 'roleEnvironment';
        $roleEnvironmentFileContent = '<?xml version="1.0" encoding="utf-8"?>'.
            '<RoleEnvironment xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" '.
            'xmlns:xsd="http://www.w3.org/2001/XMLSchema">'.
            '<Deployment id="deploymentId" emulated="false" />'.
            '<CurrentInstance id="id3" roleName="roleName" faultDomain="4" updateDomain="5">'.
            '<ConfigurationSettings>'.
            '<ConfigurationSetting name="Setting1" value="Value1" />'.
            '</ConfigurationSettings>'.
            '</CurrentInstance>'.
            '<Roles />'.
            '</RoleEnvironment>';

        $roleEnvironmentFile = vfsStream::newFile($roleEnvironmentFileName);
        $roleEnvironmentFile->setContent($roleEnvironmentFileContent);

        vfsStreamWrapper::getRoot()->addChild($roleEnvironmentFile);

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

        $fileName = 'versionendpoint';
        $fileContent = '<?xml version="1.0" encoding="utf-8"?>'.
            '<RuntimeServerDiscovery xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" '.
            'xmlns:xsd="http://www.w3.org/2001/XMLSchema">'.
            '<RuntimeServerEndpoints>'.
            '<RuntimeServerEndpoint version="2011-03-08" path="'.
            vfsStream::url($rootDirectory.'/'.$goalStateFileName).
            '" />'.
            '</RuntimeServerEndpoints>'.
            '</RuntimeServerDiscovery>';

        $file = vfsStream::newFile($fileName);
        $file->setContent($fileContent);

        vfsStreamWrapper::getRoot()->addChild($file);

        putenv('WaRuntimeEndpoint='.vfsStream::url($rootDirectory.'/'.$fileName));

        // Test
        $configurationSettings = RoleEnvironment::getConfigurationSettings();
        $this->assertTrue(array_key_exists('Setting1', $configurationSettings));
        $this->assertEquals('Value1', $configurationSettings['Setting1']);
    }

    /**
     * @covers \WindowsAzure\ServiceRuntime\RoleEnvironment::getLocalResources
     */
    public function testGetLocalResources()
    {
        // Setup
        $rootDirectory = 'root';

        vfsStreamWrapper::register();
        vfsStreamWrapper::setRoot(new vfsStreamDirectory($rootDirectory));

        $roleEnvironmentFileName = 'roleEnvironment';
        $roleEnvironmentFileContent = '<?xml version="1.0" encoding="utf-8"?>'.
            '<RoleEnvironment xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" '.
            'xmlns:xsd="http://www.w3.org/2001/XMLSchema">'.
            '<Deployment id="deploymentId" emulated="false" />'.
            '<CurrentInstance id="id3" roleName="roleName" faultDomain="4" updateDomain="5">'.
            '<LocalResources>'.
            '<LocalResource name="DiagnosticStore" path="somepath.DiagnosticStore" sizeInMB="4096" />'.
            '</LocalResources>'.
            '</CurrentInstance>'.
            '<Roles />'.
            '</RoleEnvironment>';

        $roleEnvironmentFile = vfsStream::newFile($roleEnvironmentFileName);
        $roleEnvironmentFile->setContent($roleEnvironmentFileContent);

        vfsStreamWrapper::getRoot()->addChild($roleEnvironmentFile);

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

        $fileName = 'versionendpoint';
        $fileContent = '<?xml version="1.0" encoding="utf-8"?>'.
            '<RuntimeServerDiscovery xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" '.
            'xmlns:xsd="http://www.w3.org/2001/XMLSchema">'.
            '<RuntimeServerEndpoints>'.
            '<RuntimeServerEndpoint version="2011-03-08" path="'.
            vfsStream::url($rootDirectory.'/'.$goalStateFileName).
            '" />'.
            '</RuntimeServerEndpoints>'.
            '</RuntimeServerDiscovery>';

        $file = vfsStream::newFile($fileName);
        $file->setContent($fileContent);

        vfsStreamWrapper::getRoot()->addChild($file);

        putenv('WaRuntimeEndpoint='.vfsStream::url($rootDirectory.'/'.$fileName));

        // Test
        $localResources = RoleEnvironment::getLocalResources();
        $this->assertTrue(array_key_exists('DiagnosticStore', $localResources));
        $this->assertEquals('somepath.DiagnosticStore', $localResources['DiagnosticStore']->getRootPath());
        $this->assertEquals('4096', $localResources['DiagnosticStore']->getMaximumSizeInMegabytes());
    }

    /**
     * @covers \WindowsAzure\ServiceRuntime\RoleEnvironment::requestRecycle
     */
    public function testRequestRecycle()
    {
        // Setup
        $rootDirectory = 'root';

        vfsStreamWrapper::register();
        vfsStreamWrapper::setRoot(new vfsStreamDirectory($rootDirectory));

        $currentStateFileName = 'test';
        $fileContents = '<?xml version="1.0" encoding="UTF-8"?>'."\n".
            '<CurrentState>'.
            '<StatusLease ClientId="'.RoleEnvironment::getClientId().'">'.
            '<Acquire>'.
            '<Incarnation>1</Incarnation>'.
            '<Status>Recycle</Status>'.
            '<Expiration>2038-01-19T03:14:07.0000000Z</Expiration>'.
            '</Acquire>'.
            '</StatusLease>'.
            '</CurrentState>';

        $currentStateFile = vfsStream::newFile($currentStateFileName);
        vfsStreamWrapper::getRoot()->addChild($currentStateFile);

        $roleEnvironmentFileName = 'roleEnvironment';
        $roleEnvironmentFileContent = '<?xml version="1.0" encoding="utf-8"?>'.
            '<RoleEnvironment xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" '.
            'xmlns:xsd="http://www.w3.org/2001/XMLSchema">'.
            '<Deployment id="deploymentId" emulated="false" />'.
            '<CurrentInstance id="id3" roleName="roleName" faultDomain="4" updateDomain="5">'.
            '<LocalResources>'.
            '<LocalResource name="DiagnosticStore" path="somepath.DiagnosticStore" sizeInMB="4096" />'.
            '</LocalResources>'.
            '</CurrentInstance>'.
            '<Roles />'.
            '</RoleEnvironment>';

        $roleEnvironmentFile = vfsStream::newFile($roleEnvironmentFileName);
        $roleEnvironmentFile->setContent($roleEnvironmentFileContent);

        vfsStreamWrapper::getRoot()->addChild($roleEnvironmentFile);

        $goalStateFileName = 'goalstate';
        $goalStateFileContent = '<?xml version="1.0" encoding="utf-8"?>'.
            '<GoalState xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" '.
            'xmlns:xsd="http://www.w3.org/2001/XMLSchema">'.
            '<Incarnation>1</Incarnation>'.
            '<ExpectedState>Started</ExpectedState>'.
            '<RoleEnvironmentPath>'.
            vfsStream::url($rootDirectory.'/'.$roleEnvironmentFileName).
            '</RoleEnvironmentPath>'.
            '<CurrentStateEndpoint>'.
            vfsStream::url($rootDirectory.'/'.$currentStateFileName).
            '</CurrentStateEndpoint>'.
            '<Deadline>9999-12-31T23:59:59.9999999</Deadline>'.
            '</GoalState>';

        $goalStateFileContent = dechex(strlen($goalStateFileContent))."\n".$goalStateFileContent;

        $file = vfsStream::newFile($goalStateFileName);
        $file->setContent($goalStateFileContent);

        vfsStreamWrapper::getRoot()->addChild($file);

        $fileName = 'versionendpoint';
        $fileContent = '<?xml version="1.0" encoding="utf-8"?>'.
            '<RuntimeServerDiscovery xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" '.
            'xmlns:xsd="http://www.w3.org/2001/XMLSchema">'.
            '<RuntimeServerEndpoints>'.
            '<RuntimeServerEndpoint version="2011-03-08" path="'.
            vfsStream::url($rootDirectory.'/'.$goalStateFileName).
            '" />'.
            '</RuntimeServerEndpoints>'.
            '</RuntimeServerDiscovery>';

        $file = vfsStream::newFile($fileName);
        $file->setContent($fileContent);

        vfsStreamWrapper::getRoot()->addChild($file);

        putenv('WaRuntimeEndpoint='.vfsStream::url($rootDirectory.'/'.$fileName));

        // Test
        RoleEnvironment::requestRecycle();

        $fileInputChannel = new FileInputChannel();
        $fileInputStream = $fileInputChannel->getInputStream(
            vfsStream::url($rootDirectory.'/'.$currentStateFileName)
        );

        $inputChannelContents = stream_get_contents($fileInputStream);
        $this->assertEquals($fileContents, $inputChannelContents);
    }

    /**
     * @covers \WindowsAzure\ServiceRuntime\RoleEnvironment::clearStatus
     */
    public function testClearStatus()
    {
        // Setup
        $rootDirectory = 'root';

        vfsStreamWrapper::register();
        vfsStreamWrapper::setRoot(new vfsStreamDirectory($rootDirectory));

        $currentStateFileName = 'test';
        $fileContents = '<?xml version="1.0" encoding="UTF-8"?>'."\n".
            '<CurrentState>'.
            '<StatusLease ClientId="'.RoleEnvironment::getClientId().'">'.
            '<Release/>'.
            '</StatusLease>'.
            '</CurrentState>';

        $currentStateFile = vfsStream::newFile($currentStateFileName);
        vfsStreamWrapper::getRoot()->addChild($currentStateFile);

        $roleEnvironmentFileName = 'roleEnvironment';
        $roleEnvironmentFileContent = '<?xml version="1.0" encoding="utf-8"?>'.
            '<RoleEnvironment xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" '.
            'xmlns:xsd="http://www.w3.org/2001/XMLSchema">'.
            '<Deployment id="deploymentId" emulated="false" />'.
            '<CurrentInstance id="id3" roleName="roleName" faultDomain="4" updateDomain="5">'.
            '<LocalResources>'.
            '<LocalResource name="DiagnosticStore" path="somepath.DiagnosticStore" sizeInMB="4096" />'.
            '</LocalResources>'.
            '</CurrentInstance>'.
            '<Roles />'.
            '</RoleEnvironment>';

        $roleEnvironmentFile = vfsStream::newFile($roleEnvironmentFileName);
        $roleEnvironmentFile->setContent($roleEnvironmentFileContent);

        vfsStreamWrapper::getRoot()->addChild($roleEnvironmentFile);

        $goalStateFileName = 'goalstate';
        $goalStateFileContent = '<?xml version="1.0" encoding="utf-8"?>'.
            '<GoalState xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" '.
            'xmlns:xsd="http://www.w3.org/2001/XMLSchema">'.
            '<Incarnation>1</Incarnation>'.
            '<ExpectedState>Started</ExpectedState>'.
            '<RoleEnvironmentPath>'.
            vfsStream::url($rootDirectory.'/'.$roleEnvironmentFileName).
            '</RoleEnvironmentPath>'.
            '<CurrentStateEndpoint>'.
            vfsStream::url($rootDirectory.'/'.$currentStateFileName).
            '</CurrentStateEndpoint>'.
            '<Deadline>9999-12-31T23:59:59.9999999</Deadline>'.
            '</GoalState>';

        $goalStateFileContent = dechex(strlen($goalStateFileContent))."\n".$goalStateFileContent;

        $file = vfsStream::newFile($goalStateFileName);
        $file->setContent($goalStateFileContent);

        vfsStreamWrapper::getRoot()->addChild($file);

        $fileName = 'versionendpoint';
        $fileContent = '<?xml version="1.0" encoding="utf-8"?>'.
            '<RuntimeServerDiscovery xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" '.
            'xmlns:xsd="http://www.w3.org/2001/XMLSchema">'.
            '<RuntimeServerEndpoints>'.
            '<RuntimeServerEndpoint version="2011-03-08" path="'.
            vfsStream::url($rootDirectory.'/'.$goalStateFileName).
            '" />'.
            '</RuntimeServerEndpoints>'.
            '</RuntimeServerDiscovery>';

        $file = vfsStream::newFile($fileName);
        $file->setContent($fileContent);

        vfsStreamWrapper::getRoot()->addChild($file);

        putenv('WaRuntimeEndpoint='.vfsStream::url($rootDirectory.'/'.$fileName));

        // Test
        RoleEnvironment::clearStatus();

        $fileInputChannel = new FileInputChannel();
        $fileInputStream = $fileInputChannel->getInputStream(
            vfsStream::url($rootDirectory.'/'.$currentStateFileName)
        );

        $inputChannelContents = stream_get_contents($fileInputStream);
        $this->assertEquals($fileContents, $inputChannelContents);
    }

    /**
     * @covers \WindowsAzure\ServiceRuntime\RoleEnvironment::setStatus
     */
    public function testSetStatusBusy()
    {
        // Setup
        $rootDirectory = 'root';

        vfsStreamWrapper::register();
        vfsStreamWrapper::setRoot(new vfsStreamDirectory($rootDirectory));

        $currentStateFileName = 'test';
        $fileContents = '<?xml version="1.0" encoding="UTF-8"?>'."\n".
            '<CurrentState>'.
            '<StatusLease ClientId="'.RoleEnvironment::getClientId().'">'.
            '<Acquire>'.
            '<Incarnation>1</Incarnation>'.
            '<Status>Busy</Status>'.
            '<Expiration>2000-01-01T00:00:00.0000000Z</Expiration>'.
            '</Acquire>'.
            '</StatusLease>'.
            '</CurrentState>';

        $currentStateFile = vfsStream::newFile($currentStateFileName);
        vfsStreamWrapper::getRoot()->addChild($currentStateFile);

        $roleEnvironmentFileName = 'roleEnvironment';
        $roleEnvironmentFileContent = '<?xml version="1.0" encoding="utf-8"?>'.
            '<RoleEnvironment xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" '.
            'xmlns:xsd="http://www.w3.org/2001/XMLSchema">'.
            '<Deployment id="deploymentId" emulated="false" />'.
            '<CurrentInstance id="id3" roleName="roleName" faultDomain="4" updateDomain="5">'.
            '<LocalResources>'.
            '<LocalResource name="DiagnosticStore" path="somepath.DiagnosticStore" sizeInMB="4096" />'.
            '</LocalResources>'.
            '</CurrentInstance>'.
            '<Roles />'.
            '</RoleEnvironment>';

        $roleEnvironmentFile = vfsStream::newFile($roleEnvironmentFileName);
        $roleEnvironmentFile->setContent($roleEnvironmentFileContent);

        vfsStreamWrapper::getRoot()->addChild($roleEnvironmentFile);

        $goalStateFileName = 'goalstate';
        $goalStateFileContent = '<?xml version="1.0" encoding="utf-8"?>'.
            '<GoalState xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" '.
            'xmlns:xsd="http://www.w3.org/2001/XMLSchema">'.
            '<Incarnation>1</Incarnation>'.
            '<ExpectedState>Started</ExpectedState>'.
            '<RoleEnvironmentPath>'.
            vfsStream::url($rootDirectory.'/'.$roleEnvironmentFileName).
            '</RoleEnvironmentPath>'.
            '<CurrentStateEndpoint>'.
            vfsStream::url($rootDirectory.'/'.$currentStateFileName).
            '</CurrentStateEndpoint>'.
            '<Deadline>9999-12-31T23:59:59.9999999</Deadline>'.
            '</GoalState>';

        $goalStateFileContent = dechex(strlen($goalStateFileContent))."\n".$goalStateFileContent;

        $file = vfsStream::newFile($goalStateFileName);
        $file->setContent($goalStateFileContent);

        vfsStreamWrapper::getRoot()->addChild($file);

        $fileName = 'versionendpoint';
        $fileContent = '<?xml version="1.0" encoding="utf-8"?>'.
            '<RuntimeServerDiscovery xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" '.
            'xmlns:xsd="http://www.w3.org/2001/XMLSchema">'.
            '<RuntimeServerEndpoints>'.
            '<RuntimeServerEndpoint version="2011-03-08" path="'.
            vfsStream::url($rootDirectory.'/'.$goalStateFileName).
            '" />'.
            '</RuntimeServerEndpoints>'.
            '</RuntimeServerDiscovery>';

        $file = vfsStream::newFile($fileName);
        $file->setContent($fileContent);

        vfsStreamWrapper::getRoot()->addChild($file);

        putenv('WaRuntimeEndpoint='.vfsStream::url($rootDirectory.'/'.$fileName));

        // Test
        RoleEnvironment::setStatus(
            RoleInstanceStatus::BUSY,
            new \DateTime(
                '2000-01-01',
                new \DateTimeZone('UTC')
            )
        );

        $fileInputChannel = new FileInputChannel();
        $fileInputStream = $fileInputChannel->getInputStream(
            vfsStream::url($rootDirectory.'/'.$currentStateFileName)
        );

        $inputChannelContents = stream_get_contents($fileInputStream);
        $this->assertEquals($fileContents, $inputChannelContents);
    }

    /**
     * @covers \WindowsAzure\ServiceRuntime\RoleEnvironment::setStatus
     */
    public function testSetStatusReady()
    {
        // Setup
        $rootDirectory = 'root';

        vfsStreamWrapper::register();
        vfsStreamWrapper::setRoot(new vfsStreamDirectory($rootDirectory));

        $currentStateFileName = 'test';
        $fileContents = '<?xml version="1.0" encoding="UTF-8"?>'."\n".
            '<CurrentState>'.
            '<StatusLease ClientId="'.RoleEnvironment::getClientId().'">'.
            '<Acquire>'.
            '<Incarnation>1</Incarnation>'.
            '<Status>Started</Status>'.
            '<Expiration>2000-01-01T00:00:00.0000000Z</Expiration>'.
            '</Acquire>'.
            '</StatusLease>'.
            '</CurrentState>';

        $currentStateFile = vfsStream::newFile($currentStateFileName);
        vfsStreamWrapper::getRoot()->addChild($currentStateFile);

        $roleEnvironmentFileName = 'roleEnvironment';
        $roleEnvironmentFileContent = '<?xml version="1.0" encoding="utf-8"?>'.
            '<RoleEnvironment xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" '.
            'xmlns:xsd="http://www.w3.org/2001/XMLSchema">'.
            '<Deployment id="deploymentId" emulated="false" />'.
            '<CurrentInstance id="id3" roleName="roleName" faultDomain="4" updateDomain="5">'.
            '<LocalResources>'.
            '<LocalResource name="DiagnosticStore" path="somepath.DiagnosticStore" sizeInMB="4096" />'.
            '</LocalResources>'.
            '</CurrentInstance>'.
            '<Roles />'.
            '</RoleEnvironment>';

        $roleEnvironmentFile = vfsStream::newFile($roleEnvironmentFileName);
        $roleEnvironmentFile->setContent($roleEnvironmentFileContent);

        vfsStreamWrapper::getRoot()->addChild($roleEnvironmentFile);

        $goalStateFileName = 'goalstate';
        $goalStateFileContent = '<?xml version="1.0" encoding="utf-8"?>'.
            '<GoalState xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" '.
            'xmlns:xsd="http://www.w3.org/2001/XMLSchema">'.
            '<Incarnation>1</Incarnation>'.
            '<ExpectedState>Started</ExpectedState>'.
            '<RoleEnvironmentPath>'.
            vfsStream::url($rootDirectory.'/'.$roleEnvironmentFileName).
            '</RoleEnvironmentPath>'.
            '<CurrentStateEndpoint>'.
            vfsStream::url($rootDirectory.'/'.$currentStateFileName).
            '</CurrentStateEndpoint>'.
            '<Deadline>9999-12-31T23:59:59.9999999</Deadline>'.
            '</GoalState>';

        $goalStateFileContent = dechex(strlen($goalStateFileContent))."\n".$goalStateFileContent;

        $file = vfsStream::newFile($goalStateFileName);
        $file->setContent($goalStateFileContent);

        vfsStreamWrapper::getRoot()->addChild($file);

        $fileName = 'versionendpoint';
        $fileContent = '<?xml version="1.0" encoding="utf-8"?>'.
            '<RuntimeServerDiscovery xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" '.
            'xmlns:xsd="http://www.w3.org/2001/XMLSchema">'.
            '<RuntimeServerEndpoints>'.
            '<RuntimeServerEndpoint version="2011-03-08" path="'.
            vfsStream::url($rootDirectory.'/'.$goalStateFileName).
            '" />'.
            '</RuntimeServerEndpoints>'.
            '</RuntimeServerDiscovery>';

        $file = vfsStream::newFile($fileName);
        $file->setContent($fileContent);

        vfsStreamWrapper::getRoot()->addChild($file);

        putenv('WaRuntimeEndpoint='.vfsStream::url($rootDirectory.'/'.$fileName));

        // Test
        RoleEnvironment::setStatus(
            RoleInstanceStatus::READY,
            new \DateTime(
                '2000-01-01',
                new \DateTimeZone('UTC')
            )
        );

        $fileInputChannel = new FileInputChannel();
        $fileInputStream = $fileInputChannel->getInputStream(
            vfsStream::url($rootDirectory.'/'.$currentStateFileName)
        );

        $inputChannelContents = stream_get_contents($fileInputStream);
        $this->assertEquals($fileContents, $inputChannelContents);
    }

    /**
     * @covers \WindowsAzure\ServiceRuntime\RoleEnvironment::addRoleEnvironmentChangedListener
     * @covers \WindowsAzure\ServiceRuntime\RoleEnvironment::removeRoleEnvironmentChangedListener
     */
    public function testAddRemoveRoleEnvironmentChangedListener()
    {
        RoleEnvironment::addRoleEnvironmentChangedListener(
            'RoleEnvironmentTest::myFunction'
        );

        // Removing succeeds
        $this->assertEquals(
            true,
            RoleEnvironment::removeRoleEnvironmentChangedListener(
                'RoleEnvironmentTest::myFunction'
            )
        );

        // Removing again fails
        $this->assertEquals(
            false,
            RoleEnvironment::removeRoleEnvironmentChangedListener(
                'RoleEnvironmentTest::myFunction'
            )
        );
    }

    /**
     * @covers \WindowsAzure\ServiceRuntime\RoleEnvironment::addRoleEnvironmentChangingListener
     * @covers \WindowsAzure\ServiceRuntime\RoleEnvironment::removeRoleEnvironmentChangingListener
     */
    public function testAddRemoveRoleEnvironmentChangingListener()
    {
        RoleEnvironment::addRoleEnvironmentChangingListener(
            'RoleEnvironmentTest::myFunction'
        );

        // Removing succeeds
        $this->assertEquals(
            true,
            RoleEnvironment::removeRoleEnvironmentChangingListener(
                'RoleEnvironmentTest::myFunction'
            )
        );

        // Removing again fails
        $this->assertEquals(
            false,
            RoleEnvironment::removeRoleEnvironmentChangingListener(
                'RoleEnvironmentTest::myFunction'
            )
        );
    }

    /**
     * @covers \WindowsAzure\ServiceRuntime\RoleEnvironment::addRoleEnvironmentStoppingListener
     * @covers \WindowsAzure\ServiceRuntime\RoleEnvironment::removeRoleEnvironmentStoppingListener
     */
    public function testAddRemoveRoleEnvironmentStoppingListener()
    {
        RoleEnvironment::addRoleEnvironmentStoppingListener(
            'RoleEnvironmentTest::myFunction'
        );

        // Removing succeeds
        $this->assertEquals(
            true,
            RoleEnvironment::removeRoleEnvironmentStoppingListener(
                'RoleEnvironmentTest::myFunction'
            )
        );

        // Removing again fails
        $this->assertEquals(
            false,
            RoleEnvironment::removeRoleEnvironmentStoppingListener(
                'RoleEnvironmentTest::myFunction'
            )
        );
    }

    /**
     * @covers \WindowsAzure\ServiceRuntime\RoleEnvironment::_calculateChanges
     * @covers \WindowsAzure\ServiceRuntime\RoleEnvironment::_calculateConfigurationChanges
     * @covers \WindowsAzure\ServiceRuntime\RoleEnvironment::_calculateNewRoleInstanceChanges
     * @covers \WindowsAzure\ServiceRuntime\RoleEnvironment::_calculateNewRoleInstanceEndpointsChanges
     * @covers \WindowsAzure\ServiceRuntime\RoleEnvironment::_calculateCurrentRoleInstanceChanges
     * @covers \WindowsAzure\ServiceRuntime\RoleEnvironment::_calculateCurrentRoleInstanceEndpointsChanges
     */
    public function testCalculateChanges()
    {
        // Setup
        $rootDirectory = 'root';

        vfsStreamWrapper::register();
        vfsStreamWrapper::setRoot(new vfsStreamDirectory($rootDirectory));

        $roleEnvironmentFileName = 'roleEnvironment';
        $roleEnvironmentFileContent = '<?xml version="1.0" encoding="utf-8"?>'.
            '<RoleEnvironment xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" '.
            'xmlns:xsd="http://www.w3.org/2001/XMLSchema">'.
            '<Deployment id="deploymentId" emulated="false" />'.
            '<CurrentInstance id="id3" roleName="roleName" faultDomain="4" updateDomain="5">'.
            '<LocalResources>'.
            '<LocalResource name="DiagnosticStore" path="somepath.DiagnosticStore" sizeInMB="4096" />'.
            '</LocalResources>'.
            '</CurrentInstance>'.
            '<Roles />'.
            '</RoleEnvironment>';

        $roleEnvironmentFile = vfsStream::newFile($roleEnvironmentFileName);
        $roleEnvironmentFile->setContent($roleEnvironmentFileContent);

        vfsStreamWrapper::getRoot()->addChild($roleEnvironmentFile);

        $goalStateFileName = 'goalstate';
        $goalStateFileContent = '<?xml version="1.0" encoding="utf-8"?>'.
            '<GoalState xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" '.
            'xmlns:xsd="http://www.w3.org/2001/XMLSchema">'.
            '<Incarnation>1</Incarnation>'.
            '<ExpectedState>Started</ExpectedState>'.
            '<RoleEnvironmentPath>'.
            vfsStream::url($rootDirectory.'/'.$roleEnvironmentFileName).
            '</RoleEnvironmentPath>'.
            '<CurrentStateEndpoint>none</CurrentStateEndpoint>'.
            '<Deadline>9999-12-31T23:59:59.9999999</Deadline>'.
            '</GoalState>';

        $goalStateFileContent = dechex(strlen($goalStateFileContent))."\n".$goalStateFileContent;

        $file = vfsStream::newFile($goalStateFileName);
        $file->setContent($goalStateFileContent);

        vfsStreamWrapper::getRoot()->addChild($file);

        $fileName = 'versionendpoint';
        $fileContent = '<?xml version="1.0" encoding="utf-8"?>'.
            '<RuntimeServerDiscovery xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" '.
            'xmlns:xsd="http://www.w3.org/2001/XMLSchema">'.
            '<RuntimeServerEndpoints>'.
            '<RuntimeServerEndpoint version="2011-03-08" path="'.
            vfsStream::url($rootDirectory.'/'.$goalStateFileName).
            '" />'.
            '</RuntimeServerEndpoints>'.
            '</RuntimeServerDiscovery>';

        $file = vfsStream::newFile($fileName);
        $file->setContent($fileContent);

        vfsStreamWrapper::getRoot()->addChild($file);

        putenv('WaRuntimeEndpoint='.vfsStream::url($rootDirectory.'/'.$fileName));

        // Test
        $this->assertEquals(
            'deploymentId',
            RoleEnvironment::getDeploymentId()
        );

        // Test 1 - No changes
        $calculateChanges = self::getMethod('_calculateChanges');
        $changes = $calculateChanges->invoke(null);

        // Force a role environment data refresh
        RoleEnvironment::getDeploymentId();

        $this->assertEquals(0, count($changes));

        // Test 2 - Add a configuration
        $roleEnvironmentFileContent = '<?xml version="1.0" encoding="utf-8"?>'.
            '<RoleEnvironment xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" '.
            'xmlns:xsd="http://www.w3.org/2001/XMLSchema">'.
            '<Deployment id="deploymentId" emulated="false" />'.
            '<CurrentInstance id="id3" roleName="roleName" faultDomain="4" updateDomain="5">'.
            '<ConfigurationSettings>'.
            '<ConfigurationSetting name="Setting1" value="Value1" />'.
            '</ConfigurationSettings>'.
            '</CurrentInstance>'.
            '<Roles />'.
            '</RoleEnvironment>';

        $roleEnvironmentFile->setContent($roleEnvironmentFileContent);

        /** @var RoleEnvironmentConfigurationSettingChange[] $changes */
        $changes = $calculateChanges->invoke(null);

        $this->assertEquals(1, count($changes));
        $this->assertEquals('Setting1', $changes[0]->getConfigurationSettingName());

        // Test 3 - Change configuration value
        $roleEnvironmentFileContent = '<?xml version="1.0" encoding="utf-8"?>'.
            '<RoleEnvironment xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" '.
            'xmlns:xsd="http://www.w3.org/2001/XMLSchema">'.
            '<Deployment id="deploymentId" emulated="false" />'.
            '<CurrentInstance id="id3" roleName="roleName" faultDomain="4" updateDomain="5">'.
            '<ConfigurationSettings>'.
            '<ConfigurationSetting name="Setting1" value="Value2" />'.
            '</ConfigurationSettings>'.
            '</CurrentInstance>'.
            '<Roles />'.
            '</RoleEnvironment>';

        $roleEnvironmentFile->setContent($roleEnvironmentFileContent);

        $changes = $calculateChanges->invoke(null);

        // Force a role environment data refresh
        RoleEnvironment::getDeploymentId();

        $this->assertEquals(1, count($changes));
        $this->assertEquals('Setting1', $changes[0]->getConfigurationSettingName());

        // Test 4 - Remove the configuration
        $roleEnvironmentFileContent = '<?xml version="1.0" encoding="utf-8"?>'.
            '<RoleEnvironment xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" '.
            'xmlns:xsd="http://www.w3.org/2001/XMLSchema">'.
            '<Deployment id="deploymentId" emulated="false" />'.
            '<CurrentInstance id="id3" roleName="roleName" faultDomain="4" updateDomain="5">'.
            '<ConfigurationSettings>'.
            '<ConfigurationSetting name="Setting1" value="Value1" />'.
            '</ConfigurationSettings>'.
            '</CurrentInstance>'.
            '<Roles />'.
            '</RoleEnvironment>';

        $roleEnvironmentFile->setContent($roleEnvironmentFileContent);

        $changes = $calculateChanges->invoke(null);

        // Force a role environment data refresh
        RoleEnvironment::getDeploymentId();

        $this->assertEquals(1, count($changes));
        $this->assertEquals('Setting1', $changes[0]->getConfigurationSettingName());

        // Test 5 - Adding roles
        $roleEnvironmentFileContent = '<?xml version="1.0" encoding="utf-8"?>'.
            '<RoleEnvironment xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" '.
            'xmlns:xsd="http://www.w3.org/2001/XMLSchema">'.
            '<Deployment id="deploymentId" emulated="false" />'.
            '<CurrentInstance id="id3" roleName="roleName" faultDomain="4" updateDomain="5">'.
            '</CurrentInstance>'.
            '<Roles>'.
            '<Role name="role1">'.
            '<Instances>'.
            '<Instance id="role1instance1" faultDomain="1" updateDomain="1">'.
            '<Endpoints>'.
            '<Endpoint name="MyInternalEndpoint1" address="127.255.0.0" port="20000" protocol="tcp" />'.
            '</Endpoints>'.
            '</Instance>'.
            '</Instances>'.
            '</Role>'.
            '<Role name="role2">'.
            '<Instances>'.
            '<Instance id="role2instance1" faultDomain="2" updateDomain="2">'.
            '<Endpoints>'.
            '<Endpoint name="MyInternalEndpoint2" address="127.255.0.2" port="20002" protocol="tcp" />'.
            '</Endpoints>'.
            '</Instance>'.
            '<Instance id="role2instance2" faultDomain="3" updateDomain="3">'.
            '<Endpoints>'.
            '<Endpoint name="MyInternalEndpoint3" address="127.255.0.3" port="20002" protocol="tcp" />'.
            '<Endpoint name="MyInternalEndpoint4" address="127.255.0.3" port="20004" protocol="tcp" />'.
            '</Endpoints>'.
            '</Instance>'.
            '</Instances>'.
            '</Role>'.
            '</Roles>'.
            '</RoleEnvironment>';

        $roleEnvironmentFile->setContent($roleEnvironmentFileContent);

        $changes = $calculateChanges->invoke(null);

        // Force a role environment data refresh
        RoleEnvironment::getDeploymentId();

        // There are 2 topology changes (the 2 roles) and 1 setting change (removed)
        $this->assertEquals(3, count($changes));

        $this->assertInstanceOf(
            'WindowsAzure\ServiceRuntime\Internal\RoleEnvironmentConfigurationSettingChange',
            $changes[0]
        );

        $this->assertInstanceOf(
            'WindowsAzure\ServiceRuntime\Internal\RoleEnvironmentTopologyChange',
            $changes[1]
        );

        $this->assertInstanceOf(
            'WindowsAzure\ServiceRuntime\Internal\RoleEnvironmentTopologyChange',
            $changes[2]
        );

        // Test 6 - No changes
        $roleEnvironmentFileContent = '<?xml version="1.0" encoding="utf-8"?>'.
            '<RoleEnvironment xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" '.
            'xmlns:xsd="http://www.w3.org/2001/XMLSchema">'.
            '<Deployment id="deploymentId" emulated="false" />'.
            '<CurrentInstance id="id3" roleName="roleName" faultDomain="4" updateDomain="5">'.
            '</CurrentInstance>'.
            '<Roles>'.
            '<Role name="role1">'.
            '<Instances>'.
            '<Instance id="role1instance1" faultDomain="1" updateDomain="1">'.
            '<Endpoints>'.
            '<Endpoint name="MyInternalEndpoint1" address="127.255.0.0" port="20000" protocol="tcp" />'.
            '</Endpoints>'.
            '</Instance>'.
            '</Instances>'.
            '</Role>'.
            '<Role name="role2">'.
            '<Instances>'.
            '<Instance id="role2instance1" faultDomain="2" updateDomain="2">'.
            '<Endpoints>'.
            '<Endpoint name="MyInternalEndpoint2" address="127.255.0.2" port="20002" protocol="tcp" />'.
            '</Endpoints>'.
            '</Instance>'.
            '<Instance id="role2instance2" faultDomain="3" updateDomain="3">'.
            '<Endpoints>'.
            '<Endpoint name="MyInternalEndpoint3" address="127.255.0.3" port="20002" protocol="tcp" />'.
            '<Endpoint name="MyInternalEndpoint4" address="127.255.0.3" port="20004" protocol="tcp" />'.
            '</Endpoints>'.
            '</Instance>'.
            '</Instances>'.
            '</Role>'.
            '</Roles>'.
            '</RoleEnvironment>';

        $roleEnvironmentFile->setContent($roleEnvironmentFileContent);

        $calculateChanges = self::getMethod('_calculateChanges');
        $changes = $calculateChanges->invoke(null);

        // Force a role environment data refresh
        RoleEnvironment::getDeploymentId();

        $this->assertEquals(0, count($changes));

        // Test 7 - Adding endpoint
        $roleEnvironmentFileContent = '<?xml version="1.0" encoding="utf-8"?>'.
            '<RoleEnvironment xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" '.
            'xmlns:xsd="http://www.w3.org/2001/XMLSchema">'.
            '<Deployment id="deploymentId" emulated="false" />'.
            '<CurrentInstance id="id3" roleName="roleName" faultDomain="4" updateDomain="5">'.
            '</CurrentInstance>'.
            '<Roles>'.
            '<Role name="role1">'.
            '<Instances>'.
            '<Instance id="role1instance1" faultDomain="1" updateDomain="1">'.
            '<Endpoints>'.
            '<Endpoint name="MyInternalEndpoint1" address="127.255.0.0" port="20000" protocol="tcp" />'.
            '</Endpoints>'.
            '</Instance>'.
            '</Instances>'.
            '</Role>'.
            '<Role name="role2">'.
            '<Instances>'.
            '<Instance id="role2instance1" faultDomain="2" updateDomain="2">'.
            '<Endpoints>'.
            '<Endpoint name="MyInternalEndpoint2" address="127.255.0.2" port="20002" protocol="tcp" />'.
            '</Endpoints>'.
            '</Instance>'.
            '<Instance id="role2instance2" faultDomain="3" updateDomain="3">'.
            '<Endpoints>'.
            '<Endpoint name="MyInternalEndpoint3" address="127.255.0.3" port="20002" protocol="tcp" />'.
            '<Endpoint name="MyInternalEndpoint4" address="127.255.0.3" port="20004" protocol="tcp" />'.
            '<Endpoint name="MyInternalEndpoint5" address="127.255.0.3" port="20006" protocol="tcp" />'.
            '</Endpoints>'.
            '</Instance>'.
            '</Instances>'.
            '</Role>'.
            '</Roles>'.
            '</RoleEnvironment>';

        $roleEnvironmentFile->setContent($roleEnvironmentFileContent);

        $changes = $calculateChanges->invoke(null);

        // There are 1 topology changes - the endpoint added
        $this->assertEquals(1, count($changes));

        // Force a role environment data refresh
        RoleEnvironment::getDeploymentId();

        $this->assertInstanceOf(
            'WindowsAzure\ServiceRuntime\Internal\RoleEnvironmentTopologyChange',
            $changes[0]
        );

        // Test 8 - Removing endpoint
        $roleEnvironmentFileContent = '<?xml version="1.0" encoding="utf-8"?>'.
            '<RoleEnvironment xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" '.
            'xmlns:xsd="http://www.w3.org/2001/XMLSchema">'.
            '<Deployment id="deploymentId" emulated="false" />'.
            '<CurrentInstance id="id3" roleName="roleName" faultDomain="4" updateDomain="5">'.
            '</CurrentInstance>'.
            '<Roles>'.
            '<Role name="role1">'.
            '<Instances>'.
            '<Instance id="role1instance1" faultDomain="1" updateDomain="1">'.
            '<Endpoints>'.
            '<Endpoint name="MyInternalEndpoint1" address="127.255.0.0" port="20000" protocol="tcp" />'.
            '</Endpoints>'.
            '</Instance>'.
            '</Instances>'.
            '</Role>'.
            '<Role name="role2">'.
            '<Instances>'.
            '<Instance id="role2instance1" faultDomain="2" updateDomain="2">'.
            '<Endpoints>'.
            '<Endpoint name="MyInternalEndpoint2" address="127.255.0.2" port="20002" protocol="tcp" />'.
            '</Endpoints>'.
            '</Instance>'.
            '<Instance id="role2instance2" faultDomain="3" updateDomain="3">'.
            '<Endpoints>'.
            '<Endpoint name="MyInternalEndpoint4" address="127.255.0.3" port="20004" protocol="tcp" />'.
            '<Endpoint name="MyInternalEndpoint5" address="127.255.0.3" port="20006" protocol="tcp" />'.
            '</Endpoints>'.
            '</Instance>'.
            '</Instances>'.
            '</Role>'.
            '</Roles>'.
            '</RoleEnvironment>';

        $roleEnvironmentFile->setContent($roleEnvironmentFileContent);

        $changes = $calculateChanges->invoke(null);

        // Force a role environment data refresh
        RoleEnvironment::getDeploymentId();

        // There are 1 topology changes - the endpoint removed
        $this->assertEquals(1, count($changes));

        $this->assertInstanceOf(
            'WindowsAzure\ServiceRuntime\Internal\RoleEnvironmentTopologyChange',
            $changes[0]
        );

        // Test 9 - Changing endpoint
        $roleEnvironmentFileContent = '<?xml version="1.0" encoding="utf-8"?>'.
            '<RoleEnvironment xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" '.
            'xmlns:xsd="http://www.w3.org/2001/XMLSchema">'.
            '<Deployment id="deploymentId" emulated="false" />'.
            '<CurrentInstance id="id3" roleName="roleName" faultDomain="4" updateDomain="5">'.
            '</CurrentInstance>'.
            '<Roles>'.
            '<Role name="role1">'.
            '<Instances>'.
            '<Instance id="role1instance1" faultDomain="1" updateDomain="1">'.
            '<Endpoints>'.
            '<Endpoint name="MyInternalEndpoint1" address="127.255.0.0" port="20000" protocol="tcp" />'.
            '</Endpoints>'.
            '</Instance>'.
            '</Instances>'.
            '</Role>'.
            '<Role name="role2">'.
            '<Instances>'.
            '<Instance id="role2instance1" faultDomain="2" updateDomain="2">'.
            '<Endpoints>'.
            '<Endpoint name="MyInternalEndpoint2" address="127.255.0.2" port="20002" protocol="tcp" />'.
            '</Endpoints>'.
            '</Instance>'.
            '<Instance id="role2instance2" faultDomain="3" updateDomain="3">'.
            '<Endpoints>'.
            '<Endpoint name="MyInternalEndpoint4" address="127.255.0.3" port="20004" protocol="http" />'.
            '<Endpoint name="MyInternalEndpoint5" address="127.255.0.3" port="20006" protocol="tcp" />'.
            '</Endpoints>'.
            '</Instance>'.
            '</Instances>'.
            '</Role>'.
            '</Roles>'.
            '</RoleEnvironment>';

        $roleEnvironmentFile->setContent($roleEnvironmentFileContent);

        $changes = $calculateChanges->invoke(null);

        // Force a role environment data refresh
        RoleEnvironment::getDeploymentId();

        // There are 1 topology changes - the endpoint protocol was changed
        $this->assertEquals(1, count($changes));

        $this->assertInstanceOf(
            'WindowsAzure\ServiceRuntime\Internal\RoleEnvironmentTopologyChange',
            $changes[0]
        );

        // Test 10 - Removing role
        $roleEnvironmentFileContent = '<?xml version="1.0" encoding="utf-8"?>'.
            '<RoleEnvironment xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" '.
            'xmlns:xsd="http://www.w3.org/2001/XMLSchema">'.
            '<Deployment id="deploymentId" emulated="false" />'.
            '<CurrentInstance id="id3" roleName="roleName" faultDomain="4" updateDomain="5">'.
            '</CurrentInstance>'.
            '<Roles>'.
            '<Role name="role1">'.
            '<Instances>'.
            '<Instance id="role1instance1" faultDomain="1" updateDomain="1">'.
            '<Endpoints>'.
            '<Endpoint name="MyInternalEndpoint1" address="127.255.0.0" port="20000" protocol="tcp" />'.
            '</Endpoints>'.
            '</Instance>'.
            '</Instances>'.
            '</Role>'.
            '</Roles>'.
            '</RoleEnvironment>';

        $roleEnvironmentFile->setContent($roleEnvironmentFileContent);

        $changes = $calculateChanges->invoke(null);

        // Force a role environment data refresh
        RoleEnvironment::getDeploymentId();

        // There are 1 topology changes - the endpoint removed
        $this->assertEquals(1, count($changes));

        $this->assertInstanceOf(
            'WindowsAzure\ServiceRuntime\Internal\RoleEnvironmentTopologyChange',
            $changes[0]
        );

        // Test 11 - Change role
        $roleEnvironmentFileContent = '<?xml version="1.0" encoding="utf-8"?>'.
            '<RoleEnvironment xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" '.
            'xmlns:xsd="http://www.w3.org/2001/XMLSchema">'.
            '<Deployment id="deploymentId" emulated="false" />'.
            '<CurrentInstance id="id3" roleName="roleName" faultDomain="4" updateDomain="5">'.
            '</CurrentInstance>'.
            '<Roles>'.
            '<Role name="role1">'.
            '<Instances>'.
            '<Instance id="role1instance1" faultDomain="1" updateDomain="2">'.
            '<Endpoints>'.
            '<Endpoint name="MyInternalEndpoint1" address="127.255.0.0" port="20000" protocol="tcp" />'.
            '</Endpoints>'.
            '</Instance>'.
            '</Instances>'.
            '</Role>'.
            '</Roles>'.
            '</RoleEnvironment>';

        $roleEnvironmentFile->setContent($roleEnvironmentFileContent);

        $changes = $calculateChanges->invoke(null);

        // Force a role environment data refresh
        RoleEnvironment::getDeploymentId();

        // There are 1 topology changes - the endpoint removed
        $this->assertEquals(1, count($changes));

        $this->assertInstanceOf(
            'WindowsAzure\ServiceRuntime\Internal\RoleEnvironmentTopologyChange',
            $changes[0]
        );
    }

    /**
     * @covers \WindowsAzure\ServiceRuntime\RoleEnvironment::_processGoalStateChange
     * @covers \WindowsAzure\ServiceRuntime\RoleEnvironment::_acceptLatestIncarnation
     * @covers \WindowsAzure\ServiceRuntime\RoleEnvironment::_raiseStoppingEvent
     * @covers \WindowsAzure\ServiceRuntime\RoleEnvironment::_raiseChangingEvent
     * @covers \WindowsAzure\ServiceRuntime\RoleEnvironment::_raiseChangedEvent
     */
    public function testProcessGoalStateChange()
    {
        // Setup
        $rootDirectory = 'root';

        vfsStreamWrapper::register();
        vfsStreamWrapper::setRoot(new vfsStreamDirectory($rootDirectory));

        $roleEnvironmentFileName = 'roleEnvironment';
        $roleEnvironmentFileContent = '<?xml version="1.0" encoding="utf-8"?>'.
            '<RoleEnvironment xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" '.
            'xmlns:xsd="http://www.w3.org/2001/XMLSchema">'.
            '<Deployment id="state1" emulated="false" />'.
            '<CurrentInstance id="id3" roleName="roleName" faultDomain="4" updateDomain="5">'.
            '<LocalResources>'.
            '<LocalResource name="DiagnosticStore" path="somepath.DiagnosticStore" sizeInMB="4096" />'.
            '</LocalResources>'.
            '</CurrentInstance>'.
            '<Roles />'.
            '</RoleEnvironment>';

        $roleEnvironmentFile = vfsStream::newFile($roleEnvironmentFileName);
        $roleEnvironmentFile->setContent($roleEnvironmentFileContent);

        vfsStreamWrapper::getRoot()->addChild($roleEnvironmentFile);

        $currentGoalStateFileName = 'currentGoalStateFile';
        $currentGoalStateFile = vfsStream::newFile($currentGoalStateFileName);
        vfsStreamWrapper::getRoot()->addChild($currentGoalStateFile);

        $goalStateFileName = 'goalstate';
        $goalStateFileContent = '<?xml version="1.0" encoding="utf-8"?>'.
            '<GoalState xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" '.
            'xmlns:xsd="http://www.w3.org/2001/XMLSchema">'.
            '<Incarnation>1</Incarnation>'.
            '<ExpectedState>Started</ExpectedState>'.
            '<RoleEnvironmentPath>'.
            vfsStream::url($rootDirectory.'/'.$roleEnvironmentFileName).
            '</RoleEnvironmentPath>'.
            '<CurrentStateEndpoint>'.
            vfsStream::url($rootDirectory.'/'.$currentGoalStateFileName).
            '</CurrentStateEndpoint>'.
            '<Deadline>9999-12-31T23:59:59.9999999</Deadline>'.
            '</GoalState>';

        $goalStateFileContent = dechex(strlen($goalStateFileContent))."\n".$goalStateFileContent;

        $file = vfsStream::newFile($goalStateFileName);
        $file->setContent($goalStateFileContent);

        vfsStreamWrapper::getRoot()->addChild($file);

        $fileName = 'versionendpoint';
        $fileContent = '<?xml version="1.0" encoding="utf-8"?>'.
            '<RuntimeServerDiscovery xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" '.
            'xmlns:xsd="http://www.w3.org/2001/XMLSchema">'.
            '<RuntimeServerEndpoints>'.
            '<RuntimeServerEndpoint version="2011-03-08" path="'.
            vfsStream::url($rootDirectory.'/'.$goalStateFileName).
            '" />'.
            '</RuntimeServerEndpoints>'.
            '</RuntimeServerDiscovery>';

        $file = vfsStream::newFile($fileName);
        $file->setContent($fileContent);

        vfsStreamWrapper::getRoot()->addChild($file);

        putenv('WaRuntimeEndpoint='.vfsStream::url($rootDirectory.'/'.$fileName));

        // Test
        $this->assertEquals('state1', RoleEnvironment::getDeploymentId());

        $currentGoalState = self::getStaticPropertyValue('_currentGoalState');

        // Process goal state to the previous state
        $args = [];
        $args[] = $currentGoalState;

        $processGoalStateChange = self::getMethod('_processGoalStateChange');
        $processGoalStateChange->invokeArgs(null, $args);

        // Update current state this time changing things
        $roleEnvironmentFileContent = '<?xml version="1.0" encoding="utf-8"?>'.
            '<RoleEnvironment xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" '.
            'xmlns:xsd="http://www.w3.org/2001/XMLSchema">'.
            '<Deployment id="state3" emulated="false" />'.
            '<CurrentInstance id="id3" roleName="roleName" faultDomain="10" updateDomain="10">'.
            '</CurrentInstance>'.
            '<Roles />'.
            '</RoleEnvironment>';

        $roleEnvironmentFile->setContent($roleEnvironmentFileContent);

        $currentGoalState = RuntimeKernel::getKernel()->getProtocol1RuntimeGoalStateClient()
            ->getCurrentGoalState();

        $processGoalStateChange = self::getMethod('_processGoalStateChange');
        $processGoalStateChange->invokeArgs(null, $args);

        $this->assertEquals('state3', RoleEnvironment::getDeploymentId());
    }

    /**
     * @covers \WindowsAzure\ServiceRuntime\RoleEnvironment::trackChanges
     * @covers \WindowsAzure\ServiceRuntime\RoleEnvironment::_raiseStoppingEvent
     */
    public function testTrackChanges()
    {
        // Setup
        $rootDirectory = 'root';

        vfsStreamWrapper::register();
        vfsStreamWrapper::setRoot(new vfsStreamDirectory($rootDirectory));

        $roleEnvironmentFileName = 'roleEnvironment';
        $roleEnvironmentFileContent = '<?xml version="1.0" encoding="utf-8"?>'.
            '<RoleEnvironment xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" '.
            'xmlns:xsd="http://www.w3.org/2001/XMLSchema">'.
            '<Deployment id="state1" emulated="false" />'.
            '<CurrentInstance id="id3" roleName="roleName" faultDomain="4" updateDomain="5">'.
            '<LocalResources>'.
            '<LocalResource name="DiagnosticStore" path="somepath.DiagnosticStore" sizeInMB="4096" />'.
            '</LocalResources>'.
            '</CurrentInstance>'.
            '<Roles />'.
            '</RoleEnvironment>';

        $roleEnvironmentFile = vfsStream::newFile($roleEnvironmentFileName);
        $roleEnvironmentFile->setContent($roleEnvironmentFileContent);

        vfsStreamWrapper::getRoot()->addChild($roleEnvironmentFile);

        $currentGoalStateFileName = 'currentGoalStateFile';
        $currentGoalStateFile = vfsStream::newFile($currentGoalStateFileName);
        vfsStreamWrapper::getRoot()->addChild($currentGoalStateFile);

        $goalStateFileName = 'goalstate';
        $goalStateFileContent = '<?xml version="1.0" encoding="utf-8"?>'.
            '<GoalState xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" '.
            'xmlns:xsd="http://www.w3.org/2001/XMLSchema">'.
            '<Incarnation>1</Incarnation>'.
            '<ExpectedState>Started</ExpectedState>'.
            '<RoleEnvironmentPath>'.
            vfsStream::url($rootDirectory.'/'.$roleEnvironmentFileName).
            '</RoleEnvironmentPath>'.
            '<CurrentStateEndpoint>'.
            vfsStream::url($rootDirectory.'/'.$currentGoalStateFileName).
            '</CurrentStateEndpoint>'.
            '<Deadline>9999-12-31T23:59:59.9999999</Deadline>'.
            '</GoalState>';

        $goalStateFileContent = dechex(strlen($goalStateFileContent))."\n".$goalStateFileContent;

        $goalStateFile = vfsStream::newFile($goalStateFileName);
        $goalStateFile->setContent($goalStateFileContent);

        vfsStreamWrapper::getRoot()->addChild($goalStateFile);

        $fileName = 'versionendpoint';
        $fileContent = '<?xml version="1.0" encoding="utf-8"?>'.
            '<RuntimeServerDiscovery xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" '.
            'xmlns:xsd="http://www.w3.org/2001/XMLSchema">'.
            '<RuntimeServerEndpoints>'.
            '<RuntimeServerEndpoint version="2011-03-08" path="'.
            vfsStream::url($rootDirectory.'/'.$goalStateFileName).
            '" />'.
            '</RuntimeServerEndpoints>'.
            '</RuntimeServerDiscovery>';

        $file = vfsStream::newFile($fileName);
        $file->setContent($fileContent);

        vfsStreamWrapper::getRoot()->addChild($file);

        putenv('WaRuntimeEndpoint='.vfsStream::url($rootDirectory.'/'.$fileName));

        // Test
        $this->assertEquals('state1', RoleEnvironment::getDeploymentId());

        $currentGoalState = self::getStaticPropertyValue('_currentGoalState');

        // Process goal state to the previous state
        $args = [];
        $args[] = $currentGoalState;

        self::setStaticPropertyValue('_tracking', 1);
        RoleEnvironment::trackChanges();

        $goalStateFileContent = '<?xml version="1.0" encoding="utf-8"?>'.
            '<GoalState xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" '.
            'xmlns:xsd="http://www.w3.org/2001/XMLSchema">'.
            '<Incarnation>1</Incarnation>'.
            '<ExpectedState>Stopped</ExpectedState>'.
            '<RoleEnvironmentPath>'.
            vfsStream::url($rootDirectory.'/'.$roleEnvironmentFileName).
            '</RoleEnvironmentPath>'.
            '<CurrentStateEndpoint>'.
            vfsStream::url($rootDirectory.'/'.$currentGoalStateFileName).
            '</CurrentStateEndpoint>'.
            '<Deadline>9999-12-31T23:59:59.9999999</Deadline>'.
            '</GoalState>';

        $goalStateFileContent = dechex(strlen($goalStateFileContent))."\n".$goalStateFileContent;

        $goalStateFile->setContent($goalStateFileContent);

        RoleEnvironment::addRoleEnvironmentStoppingListener(['Tests\Unit\WindowsAzure\ServiceRuntime\myclass', 'execute']);

        self::setStaticPropertyValue('_tracking', 1);
        RoleEnvironment::trackChanges();

        $this->assertEquals(true, myclass::$_executed);
    }

    protected static function getMethod($name)
    {
        $class = new \ReflectionClass('WindowsAzure\ServiceRuntime\RoleEnvironment');
        $method = $class->getMethod($name);
        $method->setAccessible(true);

        return $method;
    }

    protected static function getStaticPropertyValue($property)
    {
        $class = new \ReflectionClass('WindowsAzure\ServiceRuntime\RoleEnvironment');
        $properties = $class->getStaticProperties();

        return $properties[$property];
    }

    protected static function setStaticPropertyValue($property, $value)
    {
        $class = new \ReflectionClass('WindowsAzure\ServiceRuntime\RoleEnvironment');
        $propertyObject = $class->getProperty($property);
        $propertyObject->setAccessible(true);
        $propertyObject->setValue(null, $value);
    }
}

class myclass
{
    public static $_executed;

    public static function execute()
    {
        self::$_executed = true;
    }
}
