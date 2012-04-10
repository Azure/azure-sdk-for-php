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
use PEAR2\WindowsAzure\ServiceRuntime\FileInputChannel;
use PEAR2\WindowsAzure\ServiceRuntime\RoleEnvironment;
use PEAR2\WindowsAzure\ServiceRuntime\RoleInstanceStatus;

require_once 'vfsStream/vfsStream.php';

/**
 * Unit tests for class RoleEnvironment.
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
     * @covers PEAR2\WindowsAzure\ServiceRuntime\RoleEnvironment::_initialize
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
            '<Deployment id="id1" emulated="false" />' .
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
    
    /**
     * @covers PEAR2\WindowsAzure\ServiceRuntime\RoleEnvironment::getDeploymentId
     * @covers PEAR2\WindowsAzure\ServiceRuntime\RoleEnvironment::_initialize
     */
    public function testGetDeploymentId()
    {
        // Setup
        $rootDirectory = 'root';

        \vfsStreamWrapper::register(); 
        \vfsStreamWrapper::setRoot(new \vfsStreamDirectory($rootDirectory));
        
        $roleEnvironmentFileName = 'roleEnvironment';
        $roleEnvironmentFileContent = '<?xml version="1.0" encoding="utf-8"?>' .
            '<RoleEnvironment xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" ' .
            'xmlns:xsd="http://www.w3.org/2001/XMLSchema">' .
            '<Deployment id="deploymentId" emulated="false" />' .
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
        $this->assertEquals('deploymentId', RoleEnvironment::getDeploymentId());
    }
    
    /**
     * @covers PEAR2\WindowsAzure\ServiceRuntime\RoleEnvironment::getCurrentRoleInstance
     * @covers PEAR2\WindowsAzure\ServiceRuntime\RoleEnvironment::_initialize
     */
    public function testGetCurrentRoleInstance()
    {
        // Setup
        $rootDirectory = 'root';

        \vfsStreamWrapper::register(); 
        \vfsStreamWrapper::setRoot(new \vfsStreamDirectory($rootDirectory));
        
        $roleEnvironmentFileName = 'roleEnvironment';
        $roleEnvironmentFileContent = '<?xml version="1.0" encoding="utf-8"?>' .
            '<RoleEnvironment xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" ' .
            'xmlns:xsd="http://www.w3.org/2001/XMLSchema">' .
            '<Deployment id="deploymentId" emulated="false" />' .
            '<CurrentInstance id="id3" roleName="roleName" faultDomain="4" updateDomain="5">' .
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
     * @covers PEAR2\WindowsAzure\ServiceRuntime\RoleEnvironment::isEmulated
     */
    public function testIsEmulated()
    {
        // Setup - is not emulated
        $rootDirectory = 'root';

        \vfsStreamWrapper::register(); 
        \vfsStreamWrapper::setRoot(new \vfsStreamDirectory($rootDirectory));
        
        $roleEnvironmentFileName = 'roleEnvironment';
        $roleEnvironmentFileContent = '<?xml version="1.0" encoding="utf-8"?>' .
            '<RoleEnvironment xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" ' .
            'xmlns:xsd="http://www.w3.org/2001/XMLSchema">' .
            '<Deployment id="deploymentId" emulated="false" />' .
            '<CurrentInstance id="id3" roleName="roleName" faultDomain="4" updateDomain="5">' .
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
        
        $roleEnvironmentFile = \vfsStream::newFile($roleEnvironmentFileName);
        $roleEnvironmentFile->setContent($roleEnvironmentFileContent); 
        
        \vfsStreamWrapper::getRoot()->addChild($roleEnvironmentFile);
        
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
        $this->assertEquals(false, RoleEnvironment::isEmulated());
        
        // Setup - is emulated
        $roleEnvironmentFileContent = '<?xml version="1.0" encoding="utf-8"?>' .
            '<RoleEnvironment xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" ' .
            'xmlns:xsd="http://www.w3.org/2001/XMLSchema">' .
            '<Deployment id="deploymentId" emulated="true" />' .
            '<CurrentInstance id="id3" roleName="roleName" faultDomain="4" updateDomain="5">' .
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
        $roleEnvironmentFile->setContent($roleEnvironmentFileContent); 
        
        $this->assertEquals(true, RoleEnvironment::isEmulated());
    }
    
   /**
    * @covers PEAR2\WindowsAzure\ServiceRuntime\RoleEnvironment::getRoles
    * @covers PEAR2\WindowsAzure\ServiceRuntime\RoleEnvironment::_initialize
    */
    public function testGetRoles()
    {
        // Setup
        $rootDirectory = 'root';

        \vfsStreamWrapper::register(); 
        \vfsStreamWrapper::setRoot(new \vfsStreamDirectory($rootDirectory));
        
        $roleEnvironmentFileName = 'roleEnvironment';
        $roleEnvironmentFileContent = '<?xml version="1.0" encoding="utf-8"?>' .
            '<RoleEnvironment xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" ' .
            'xmlns:xsd="http://www.w3.org/2001/XMLSchema">' .
            '<Deployment id="deploymentId" emulated="false" />' .
            '<CurrentInstance id="role3instance1" roleName="role3" faultDomain="4" updateDomain="4">' .
            '</CurrentInstance>' .
            '<Roles>' .
            '<Role name="role1">' .
            '<Instances>' .
            '<Instance id="role1instance1" faultDomain="1" updateDomain="1">' .
            '<Endpoints>' .
            '<Endpoint name="MyInternalEndpoint1" address="127.255.0.0" port="20000" protocol="tcp" />' .
            '</Endpoints>' .
            '</Instance>' .
            '</Instances>' .
            '</Role>' .
            '<Role name="role2">' .
            '<Instances>' .
            '<Instance id="role2instance1" faultDomain="2" updateDomain="2">' .
            '<Endpoints>' .
            '<Endpoint name="MyInternalEndpoint2" address="127.255.0.2" port="20002" protocol="tcp" />' .
            '</Endpoints>' .
            '</Instance>' .
            '<Instance id="role2instance2" faultDomain="3" updateDomain="3">' .
            '<Endpoints>' .
            '<Endpoint name="MyInternalEndpoint3" address="127.255.0.3" port="20002" protocol="tcp" />' .
            '<Endpoint name="MyInternalEndpoint4" address="127.255.0.3" port="20004" protocol="tcp" />' .
            '</Endpoints>' .
            '</Instance>' .
            '</Instances>' .
            '</Role>' .
            '</Roles>' .
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
     * @covers PEAR2\WindowsAzure\ServiceRuntime\RoleEnvironment::getConfigurationSettings
     */
    public function testGetConfigurationSettings()
    {
        // Setup
        $rootDirectory = 'root';

        \vfsStreamWrapper::register(); 
        \vfsStreamWrapper::setRoot(new \vfsStreamDirectory($rootDirectory));
        
        $roleEnvironmentFileName = 'roleEnvironment';
        $roleEnvironmentFileContent = '<?xml version="1.0" encoding="utf-8"?>' .
            '<RoleEnvironment xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" ' .
            'xmlns:xsd="http://www.w3.org/2001/XMLSchema">' .
            '<Deployment id="deploymentId" emulated="false" />' .
            '<CurrentInstance id="id3" roleName="roleName" faultDomain="4" updateDomain="5">' .
            '<ConfigurationSettings>' .
            '<ConfigurationSetting name="Setting1" value="Value1" />' .
            '</ConfigurationSettings>' .
            '</CurrentInstance>' .
            '<Roles />' .
            '</RoleEnvironment>';
        
        $roleEnvironmentFile = \vfsStream::newFile($roleEnvironmentFileName);
        $roleEnvironmentFile->setContent($roleEnvironmentFileContent); 
        
        \vfsStreamWrapper::getRoot()->addChild($roleEnvironmentFile);
        
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
        $configurationSettings = RoleEnvironment::getConfigurationSettings();
        $this->assertTrue(array_key_exists('Setting1', $configurationSettings));
        $this->assertEquals('Value1', $configurationSettings['Setting1']);
    }
    
    /**
     * @covers PEAR2\WindowsAzure\ServiceRuntime\RoleEnvironment::getLocalResources
     */
    public function testGetLocalResources()
    {
        // Setup
        $rootDirectory = 'root';

        \vfsStreamWrapper::register(); 
        \vfsStreamWrapper::setRoot(new \vfsStreamDirectory($rootDirectory));
        
        $roleEnvironmentFileName = 'roleEnvironment';
        $roleEnvironmentFileContent = '<?xml version="1.0" encoding="utf-8"?>' .
            '<RoleEnvironment xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" ' .
            'xmlns:xsd="http://www.w3.org/2001/XMLSchema">' .
            '<Deployment id="deploymentId" emulated="false" />' .
            '<CurrentInstance id="id3" roleName="roleName" faultDomain="4" updateDomain="5">' .
            '<LocalResources>' .
            '<LocalResource name="DiagnosticStore" path="somepath.DiagnosticStore" sizeInMB="4096" />' .
            '</LocalResources>' .
            '</CurrentInstance>' .
            '<Roles />' .
            '</RoleEnvironment>';
        
        $roleEnvironmentFile = \vfsStream::newFile($roleEnvironmentFileName);
        $roleEnvironmentFile->setContent($roleEnvironmentFileContent); 
        
        \vfsStreamWrapper::getRoot()->addChild($roleEnvironmentFile);
        
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
        $localResources = RoleEnvironment::getLocalResources();
        $this->assertTrue(array_key_exists('DiagnosticStore', $localResources));
        $this->assertEquals('somepath.DiagnosticStore', $localResources['DiagnosticStore']['path']);
        $this->assertEquals('4096', $localResources['DiagnosticStore']['sizeInMB']);
    }
    
    /**
     * @covers PEAR2\WindowsAzure\ServiceRuntime\RoleEnvironment::requestRecycle
     */
    public function testRequestRecycle() 
    {
        // Setup
        $rootDirectory = 'root';

        \vfsStreamWrapper::register(); 
        \vfsStreamWrapper::setRoot(new \vfsStreamDirectory($rootDirectory));
        
        $currentStateFileName = 'test';
        $fileContents = '<?xml version="1.0" encoding="UTF-8"?>' . "\n" .
            '<CurrentState>' .
            '<StatusLease ClientId="">' .
            '<Acquire>' .
            '<Incarnation>1</Incarnation>' .
            '<Status>Recycle</Status>' .
            '<Expiration>2038-01-19T03:14:07.0000000Z</Expiration>' .
            '</Acquire>' .
            '</StatusLease>' .
            '</CurrentState>';
        
        $currentStateFile = \vfsStream::newFile($currentStateFileName);
        \vfsStreamWrapper::getRoot()->addChild($currentStateFile);
        
        $roleEnvironmentFileName = 'roleEnvironment';
        $roleEnvironmentFileContent = '<?xml version="1.0" encoding="utf-8"?>' .
            '<RoleEnvironment xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" ' .
            'xmlns:xsd="http://www.w3.org/2001/XMLSchema">' .
            '<Deployment id="deploymentId" emulated="false" />' .
            '<CurrentInstance id="id3" roleName="roleName" faultDomain="4" updateDomain="5">' .
            '<LocalResources>' .
            '<LocalResource name="DiagnosticStore" path="somepath.DiagnosticStore" sizeInMB="4096" />' .
            '</LocalResources>' .
            '</CurrentInstance>' .
            '<Roles />' .
            '</RoleEnvironment>';
        
        $roleEnvironmentFile = \vfsStream::newFile($roleEnvironmentFileName);
        $roleEnvironmentFile->setContent($roleEnvironmentFileContent); 
        
        \vfsStreamWrapper::getRoot()->addChild($roleEnvironmentFile);
        
        $goalStateFileName = 'goalstate';
        $goalStateFileContent = '<?xml version="1.0" encoding="utf-8"?>' .
            '<GoalState xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" ' .
            'xmlns:xsd="http://www.w3.org/2001/XMLSchema">' .
            '<Incarnation>1</Incarnation>' .
            '<ExpectedState>Started</ExpectedState>' .
            '<RoleEnvironmentPath>' . 
            \vfsStream::url($rootDirectory . '/' . $roleEnvironmentFileName) . 
            '</RoleEnvironmentPath>' .
            '<CurrentStateEndpoint>' .
            \vfsStream::url($rootDirectory . '/' . $currentStateFileName) . 
            '</CurrentStateEndpoint>' .
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
        RoleEnvironment::requestRecycle();

        $fileInputChannel = new FileInputChannel();
        $fileInputStream = $fileInputChannel->getInputStream(
            \vfsStream::url($rootDirectory . '/' . $currentStateFileName)
        );
        
        $inputChannelContents = stream_get_contents($fileInputStream);
        $this->assertEquals($fileContents, $inputChannelContents);
    }
    
    /**
     * @covers PEAR2\WindowsAzure\ServiceRuntime\RoleEnvironment::clearStatus
     */
    public function testClearStatus() 
    {
        // Setup
        $rootDirectory = 'root';

        \vfsStreamWrapper::register(); 
        \vfsStreamWrapper::setRoot(new \vfsStreamDirectory($rootDirectory));
        
        $currentStateFileName = 'test';
        $fileContents = '<?xml version="1.0" encoding="UTF-8"?>' . "\n" .
            '<CurrentState>' .
            '<StatusLease ClientId="">' .
            '<Release/>' .
            '</StatusLease>' .
            '</CurrentState>';
        
        $currentStateFile = \vfsStream::newFile($currentStateFileName);
        \vfsStreamWrapper::getRoot()->addChild($currentStateFile);
        
        $roleEnvironmentFileName = 'roleEnvironment';
        $roleEnvironmentFileContent = '<?xml version="1.0" encoding="utf-8"?>' .
            '<RoleEnvironment xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" ' .
            'xmlns:xsd="http://www.w3.org/2001/XMLSchema">' .
            '<Deployment id="deploymentId" emulated="false" />' .
            '<CurrentInstance id="id3" roleName="roleName" faultDomain="4" updateDomain="5">' .
            '<LocalResources>' .
            '<LocalResource name="DiagnosticStore" path="somepath.DiagnosticStore" sizeInMB="4096" />' .
            '</LocalResources>' .
            '</CurrentInstance>' .
            '<Roles />' .
            '</RoleEnvironment>';
        
        $roleEnvironmentFile = \vfsStream::newFile($roleEnvironmentFileName);
        $roleEnvironmentFile->setContent($roleEnvironmentFileContent); 
        
        \vfsStreamWrapper::getRoot()->addChild($roleEnvironmentFile);
        
        $goalStateFileName = 'goalstate';
        $goalStateFileContent = '<?xml version="1.0" encoding="utf-8"?>' .
            '<GoalState xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" ' .
            'xmlns:xsd="http://www.w3.org/2001/XMLSchema">' .
            '<Incarnation>1</Incarnation>' .
            '<ExpectedState>Started</ExpectedState>' .
            '<RoleEnvironmentPath>' . 
            \vfsStream::url($rootDirectory . '/' . $roleEnvironmentFileName) . 
            '</RoleEnvironmentPath>' .
            '<CurrentStateEndpoint>' .
            \vfsStream::url($rootDirectory . '/' . $currentStateFileName) . 
            '</CurrentStateEndpoint>' .
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
        RoleEnvironment::clearStatus();

        $fileInputChannel = new FileInputChannel();
        $fileInputStream = $fileInputChannel->getInputStream(
            \vfsStream::url($rootDirectory . '/' . $currentStateFileName)
        );
        
        $inputChannelContents = stream_get_contents($fileInputStream);
        $this->assertEquals($fileContents, $inputChannelContents);
    }
    
    /**
     * @covers PEAR2\WindowsAzure\ServiceRuntime\RoleEnvironment::setStatus
     */
    public function testSetStatusBusy() 
    {
        // Setup
        $rootDirectory = 'root';

        \vfsStreamWrapper::register(); 
        \vfsStreamWrapper::setRoot(new \vfsStreamDirectory($rootDirectory));
        
        $currentStateFileName = 'test';
        $fileContents = '<?xml version="1.0" encoding="UTF-8"?>' . "\n" .
            '<CurrentState>' .
            '<StatusLease ClientId="">' .
            '<Acquire>' .
            '<Incarnation>1</Incarnation>' .
            '<Status>Busy</Status>' .
            '<Expiration>2000-01-01T00:00:00.0000000Z</Expiration>' .
            '</Acquire>' .
            '</StatusLease>' .
            '</CurrentState>';
        
        $currentStateFile = \vfsStream::newFile($currentStateFileName);
        \vfsStreamWrapper::getRoot()->addChild($currentStateFile);
        
        $roleEnvironmentFileName = 'roleEnvironment';
        $roleEnvironmentFileContent = '<?xml version="1.0" encoding="utf-8"?>' .
            '<RoleEnvironment xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" ' .
            'xmlns:xsd="http://www.w3.org/2001/XMLSchema">' .
            '<Deployment id="deploymentId" emulated="false" />' .
            '<CurrentInstance id="id3" roleName="roleName" faultDomain="4" updateDomain="5">' .
            '<LocalResources>' .
            '<LocalResource name="DiagnosticStore" path="somepath.DiagnosticStore" sizeInMB="4096" />' .
            '</LocalResources>' .
            '</CurrentInstance>' .
            '<Roles />' .
            '</RoleEnvironment>';
        
        $roleEnvironmentFile = \vfsStream::newFile($roleEnvironmentFileName);
        $roleEnvironmentFile->setContent($roleEnvironmentFileContent); 
        
        \vfsStreamWrapper::getRoot()->addChild($roleEnvironmentFile);
        
        $goalStateFileName = 'goalstate';
        $goalStateFileContent = '<?xml version="1.0" encoding="utf-8"?>' .
            '<GoalState xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" ' .
            'xmlns:xsd="http://www.w3.org/2001/XMLSchema">' .
            '<Incarnation>1</Incarnation>' .
            '<ExpectedState>Started</ExpectedState>' .
            '<RoleEnvironmentPath>' . 
            \vfsStream::url($rootDirectory . '/' . $roleEnvironmentFileName) . 
            '</RoleEnvironmentPath>' .
            '<CurrentStateEndpoint>' .
            \vfsStream::url($rootDirectory . '/' . $currentStateFileName) . 
            '</CurrentStateEndpoint>' .
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
        RoleEnvironment::setStatus(
            RoleInstanceStatus::BUSY,
            new \DateTime(
                '2000-01-01',
                new \DateTimeZone('UTC')
            )
        );

        $fileInputChannel = new FileInputChannel();
        $fileInputStream = $fileInputChannel->getInputStream(
            \vfsStream::url($rootDirectory . '/' . $currentStateFileName)
        );
        
        $inputChannelContents = stream_get_contents($fileInputStream);
        $this->assertEquals($fileContents, $inputChannelContents);
    }
    
    /**
     * @covers PEAR2\WindowsAzure\ServiceRuntime\RoleEnvironment::setStatus
     */
    public function testSetStatusReady() 
    {
        // Setup
        $rootDirectory = 'root';

        \vfsStreamWrapper::register(); 
        \vfsStreamWrapper::setRoot(new \vfsStreamDirectory($rootDirectory));
        
        $currentStateFileName = 'test';
        $fileContents = '<?xml version="1.0" encoding="UTF-8"?>' . "\n" .
            '<CurrentState>' .
            '<StatusLease ClientId="">' .
            '<Acquire>' .
            '<Incarnation>1</Incarnation>' .
            '<Status>Started</Status>' .
            '<Expiration>2000-01-01T00:00:00.0000000Z</Expiration>' .
            '</Acquire>' .
            '</StatusLease>' .
            '</CurrentState>';
        
        $currentStateFile = \vfsStream::newFile($currentStateFileName);
        \vfsStreamWrapper::getRoot()->addChild($currentStateFile);
        
        $roleEnvironmentFileName = 'roleEnvironment';
        $roleEnvironmentFileContent = '<?xml version="1.0" encoding="utf-8"?>' .
            '<RoleEnvironment xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" ' .
            'xmlns:xsd="http://www.w3.org/2001/XMLSchema">' .
            '<Deployment id="deploymentId" emulated="false" />' .
            '<CurrentInstance id="id3" roleName="roleName" faultDomain="4" updateDomain="5">' .
            '<LocalResources>' .
            '<LocalResource name="DiagnosticStore" path="somepath.DiagnosticStore" sizeInMB="4096" />' .
            '</LocalResources>' .
            '</CurrentInstance>' .
            '<Roles />' .
            '</RoleEnvironment>';
        
        $roleEnvironmentFile = \vfsStream::newFile($roleEnvironmentFileName);
        $roleEnvironmentFile->setContent($roleEnvironmentFileContent); 
        
        \vfsStreamWrapper::getRoot()->addChild($roleEnvironmentFile);
        
        $goalStateFileName = 'goalstate';
        $goalStateFileContent = '<?xml version="1.0" encoding="utf-8"?>' .
            '<GoalState xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" ' .
            'xmlns:xsd="http://www.w3.org/2001/XMLSchema">' .
            '<Incarnation>1</Incarnation>' .
            '<ExpectedState>Started</ExpectedState>' .
            '<RoleEnvironmentPath>' . 
            \vfsStream::url($rootDirectory . '/' . $roleEnvironmentFileName) . 
            '</RoleEnvironmentPath>' .
            '<CurrentStateEndpoint>' .
            \vfsStream::url($rootDirectory . '/' . $currentStateFileName) . 
            '</CurrentStateEndpoint>' .
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
        RoleEnvironment::setStatus(
            RoleInstanceStatus::READY,
            new \DateTime(
                '2000-01-01',
                new \DateTimeZone('UTC')
            )
        );

        $fileInputChannel = new FileInputChannel();
        $fileInputStream = $fileInputChannel->getInputStream(
            \vfsStream::url($rootDirectory . '/' . $currentStateFileName)
        );
        
        $inputChannelContents = stream_get_contents($fileInputStream);
        $this->assertEquals($fileContents, $inputChannelContents);
    }
}

?>