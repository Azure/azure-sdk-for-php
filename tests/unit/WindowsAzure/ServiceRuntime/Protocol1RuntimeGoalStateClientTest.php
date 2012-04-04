<?php

/**
 * LICENSE: Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 * http://www.apache.org/licenses/LICENSE-2.0
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
 * @package   PEAR2\Tests\Unit\WindowsAzure\ServiceRuntime
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
namespace PEAR2\Tests\Unit\WindowsAzure\ServiceRuntime;
use PEAR2\Tests\Framework\TestResources;
use PEAR2\WindowsAzure\Core\WindowsAzureUtilities;
use PEAR2\WindowsAzure\ServiceRuntime\ChunkedGoalStateDeserializer;
use PEAR2\WindowsAzure\ServiceRuntime\FileInputChannel;
use PEAR2\WindowsAzure\ServiceRuntime\Protocol1RuntimeCurrentStateClient;
use PEAR2\WindowsAzure\ServiceRuntime\Protocol1RuntimeGoalStateClient;

require_once 'vfsStream/vfsStream.php';

/**
 * Unit tests for class Protocol1RuntimeGoalStateClient
 *
 * @category  Microsoft
 * @package   PEAR2\Tests\Unit\WindowsAzure\ServiceRuntime
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
class Protocol1RuntimeGoalStateClientTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers PEAR2\WindowsAzure\ServiceRuntime\Protocol1RuntimeGoalStateClient::__construct
     * @covers PEAR2\WindowsAzure\ServiceRuntime\Protocol1RuntimeGoalStateClient::getCurrentGoalState
     * @covers PEAR2\WindowsAzure\ServiceRuntime\Protocol1RuntimeGoalStateClient::setEndpoint
     * @covers PEAR2\WindowsAzure\ServiceRuntime\Protocol1RuntimeGoalStateClient::_ensureGoalStateRetrieved
     */
    public function testGetCurrentGoalState()
    {
        // Setup
        $rootDirectory = 'root';
        $fileName = 'goalstate';
        $goalStateFileContent = '<?xml version="1.0" encoding="utf-8"?>' .
            '<GoalState xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" ' .
            'xmlns:xsd="http://www.w3.org/2001/XMLSchema">' .
            '<Incarnation>1</Incarnation>' .
            '<ExpectedState>Started</ExpectedState>' .
            '<RoleEnvironmentPath></RoleEnvironmentPath>' .
            '<CurrentStateEndpoint>\\.\pipe\WindowsAzureRuntime.CurrentState</CurrentStateEndpoint>' .
            '<Deadline>9999-12-31T23:59:59.9999999</Deadline>' .
            '</GoalState>';

        $goalStateFileContent = dechex(strlen($goalStateFileContent)) . "\n" . $goalStateFileContent;
        
        // Setup
        \vfsStreamWrapper::register(); 
        \vfsStreamWrapper::setRoot(new \vfsStreamDirectory($rootDirectory));
        
        $file = \vfsStream::newFile($fileName);
        $file->setContent($goalStateFileContent); 
        
        \vfsStreamWrapper::getRoot()->addChild($file);
        
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
        
        $runtimeGoalStateClient->setEndpoint(\vfsStream::url($rootDirectory . '/' . $fileName));
        
        // Test
        $this->assertNotEquals(null, $runtimeGoalStateClient->getCurrentGoalState());
    }
}

?>