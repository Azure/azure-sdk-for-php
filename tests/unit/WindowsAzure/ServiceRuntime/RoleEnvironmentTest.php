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
use PEAR2\WindowsAzure\ServiceRuntime\RoleEnvironment;

require_once 'vfsStream/vfsStream.php';

/**
 * Unit tests for class RoleEnvironment
 *
 * @category  Microsoft
 * @package   PEAR2\Tests\Unit\WindowsAzure\ServiceRuntime
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
class RoleEnvironmentTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers PEAR2\WindowsAzure\ServiceRuntime\RoleEnvironment::isAvailable
     */
    public function testIsNotAvailable()
    {
        // Setup
        putenv('WaRuntimeEndpoint=');
        
        // Test
        $this->assertEquals(false, RoleEnvironment::isAvailable());
    }
    
    /**
     * @covers PEAR2\WindowsAzure\ServiceRuntime\RoleEnvironment::isAvailable
     */
    public function testIsAvailable()
    {
        // Setup
        $rootDirectory = 'root';

        \vfsStreamWrapper::register(); 
        \vfsStreamWrapper::setRoot(new \vfsStreamDirectory($rootDirectory));
        
        $roleEnvironmentFileName = 'roleEnvironment';
        $roleEnvironmentFileContent = '<?xml version="1.0" encoding="utf-8"?>' .
            '<RoleEnvironment xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" ' .
            'xmlns:xsd="http://www.w3.org/2001/XMLSchema">' .
            '<Deployment id="92f5cd71a4c048ed94e1b130bd0c4639" emulated="false" />' .
            '<CurrentInstance id="geophotoapp_IN_0" roleName="geophotoapp" faultDomain="0" updateDomain="0">' .
            '<ConfigurationSettings />' .
            '<LocalResources>' .
            '<LocalResource name="DiagnosticStore" path="somepath.DiagnosticStore" sizeInMB="4096" />' .
            '</LocalResources>' .
            '<Endpoints>' .
            '<Endpoint name="HttpIn" address="10.114.250.21" port="80" protocol="tcp" />' .
            '</Endpoints>' .
            '</CurrentInstance>' .
            '<Roles />' .
            '</RoleEnvironment>';
        
        $file = \vfsStream::newFile($roleEnvironmentFileName);
        $file->setContent($roleEnvironmentFileContent); 
        
        \vfsStreamWrapper::getRoot()->addChild($file);
        
        $goalStateFileName = 'goalstate';
        $goalStateFileContent = '<?xml version="1.0" encoding="utf-8"?>' .
            '<GoalState xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" ' .
            'xmlns:xsd="http://www.w3.org/2001/XMLSchema">' .
            '<Incarnation>1</Incarnation>' .
            '<ExpectedState>Started</ExpectedState>' .
            '<RoleEnvironmentPath>' . 
            \vfsStream::url($rootDirectory . '/' . $roleEnvironmentFileName) . 
            '</RoleEnvironmentPath>' .
            '<CurrentStateEndpoint>\\.\pipe\WindowsAzureRuntime.CurrentState</CurrentStateEndpoint>' .
            '<Deadline>9999-12-31T23:59:59.9999999</Deadline>' .
            '</GoalState>';
        
        $goalStateFileContent = dechex(strlen($goalStateFileContent)) . "\n" . $goalStateFileContent;
        
        $file = \vfsStream::newFile($goalStateFileName);
        $file->setContent($goalStateFileContent); 
        
        \vfsStreamWrapper::getRoot()->addChild($file);
        
        $fileName = 'versionendpoint';
        $fileContent = '<?xml version="1.0" encoding="utf-8"?>' .
            '<RuntimeServerDiscovery xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" ' .
            'xmlns:xsd="http://www.w3.org/2001/XMLSchema">' .
            '<RuntimeServerEndpoints>' .
            '<RuntimeServerEndpoint version="2011-03-08" path="' . 
            \vfsStream::url($rootDirectory . '/' . $goalStateFileName) . 
            '" />' .
            '</RuntimeServerEndpoints>' .
            '</RuntimeServerDiscovery>';
        
        $file = \vfsStream::newFile($fileName);
        $file->setContent($fileContent);
        
        \vfsStreamWrapper::getRoot()->addChild($file);
        
        putenv('WaRuntimeEndpoint=' . \vfsStream::url($rootDirectory . '/' . $fileName));
        
        // Test
        $this->assertEquals(true, RoleEnvironment::isAvailable());
    }
}

?>