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
use WindowsAzure\ServiceRuntime\Internal\FileInputChannel;
use WindowsAzure\ServiceRuntime\Internal\XmlRoleEnvironmentDataDeserializer;

/**
 * Unit tests for class XmlRoleEnvironmentDataDeserializer.
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
class XmlRoleEnvironmentDataDeserializerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers \WindowsAzure\ServiceRuntime\Internal\XmlRoleEnvironmentDataDeserializer::deserialize
     */
    public function testDeserialize()
    {
        // Setup
        $rootDirectory = 'root';

        vfsStreamWrapper::register();
        vfsStreamWrapper::setRoot(new vfsStreamDirectory($rootDirectory));

        $fileName = 'roleenvironmentendpoint';
        $fileContent = '<?xml version="1.0" encoding="utf-8"?>'.
            '<RoleEnvironment xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" '.
            'xmlns:xsd="http://www.w3.org/2001/XMLSchema">'.
            '<Deployment id="92f5cd71a4c048ed94e1b130bd0c4639" emulated="false" />'.
            '<CurrentInstance id="id" roleName="roleName" faultDomain="0" updateDomain="0">'.
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

        $file = vfsStream::newFile($fileName);
        $file->setContent($fileContent);

        vfsStreamWrapper::getRoot()->addChild($file);

        $xmlRoleEnvironmentDataDeserializer = new XmlRoleEnvironmentDataDeserializer();

        $inputChannel = new FileInputChannel();
        $inputStream = $inputChannel->getInputStream(
            vfsStream::url($rootDirectory.'/'.$fileName)
        );

        $roleEnvironmentData = $xmlRoleEnvironmentDataDeserializer->deserialize(
            $inputStream
        );

        // Test
        $this->assertNotEquals(null, $roleEnvironmentData);
    }

    /**
     * @covers \WindowsAzure\ServiceRuntime\Internal\XmlRoleEnvironmentDataDeserializer::_translateConfigurationSettings
     */
    public function testTranslateConfigurationSettings_NoSettings()
    {
        // Setup
        $rootDirectory = 'root';

        vfsStreamWrapper::register();
        vfsStreamWrapper::setRoot(new vfsStreamDirectory($rootDirectory));

        // Test no settings
        $fileName = 'roleenvironmentendpoint';
        $fileContent = '<?xml version="1.0" encoding="utf-8"?>'.
            '<RoleEnvironment xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" '.
            'xmlns:xsd="http://www.w3.org/2001/XMLSchema">'.
            '<Deployment id="92f5cd71a4c048ed94e1b130bd0c4639" emulated="false" />'.
            '<CurrentInstance id="id" roleName="roleName" faultDomain="0" updateDomain="0">'.
            '<ConfigurationSettings />'.
            '</CurrentInstance>'.
            '</RoleEnvironment>';

        $file = vfsStream::newFile($fileName);
        $file->setContent($fileContent);

        vfsStreamWrapper::getRoot()->addChild($file);

        $xmlRoleEnvironmentDataDeserializer = new XmlRoleEnvironmentDataDeserializer();

        $inputChannel = new FileInputChannel();
        $inputStream = $inputChannel->getInputStream(
            vfsStream::url($rootDirectory.'/'.$fileName)
        );

        $roleEnvironmentData = $xmlRoleEnvironmentDataDeserializer->deserialize(
            $inputStream
        );

        $this->assertNotEquals(null, $roleEnvironmentData);
    }

    /**
     * @covers \WindowsAzure\ServiceRuntime\Internal\XmlRoleEnvironmentDataDeserializer::_translateConfigurationSettings
     */
    public function testTranslateConfigurationSettings_OneSetting()
    {
        // Setup
        $rootDirectory = 'root';

        vfsStreamWrapper::register();
        vfsStreamWrapper::setRoot(new vfsStreamDirectory($rootDirectory));

        // Test one setting
        $fileName = 'roleenvironmentendpoint';
        $fileContent = '<?xml version="1.0" encoding="utf-8"?>'.
            '<RoleEnvironment xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" '.
            'xmlns:xsd="http://www.w3.org/2001/XMLSchema">'.
            '<Deployment id="92f5cd71a4c048ed94e1b130bd0c4639" emulated="false" />'.
            '<CurrentInstance id="id" roleName="roleName" faultDomain="0" updateDomain="0">'.
            '<ConfigurationSettings>'.
            '<ConfigurationSetting name="Setting1" value="Value1" />'.
            '</ConfigurationSettings>'.
            '</CurrentInstance>'.
            '</RoleEnvironment>';

        $file = vfsStream::newFile($fileName);
        $file->setContent($fileContent);

        vfsStreamWrapper::getRoot()->addChild($file);

        $xmlRoleEnvironmentDataDeserializer = new XmlRoleEnvironmentDataDeserializer();

        $inputChannel = new FileInputChannel();
        $inputStream = $inputChannel->getInputStream(
            vfsStream::url($rootDirectory.'/'.$fileName)
        );

        $roleEnvironmentData = $xmlRoleEnvironmentDataDeserializer->deserialize(
            $inputStream
        );

        $this->assertNotEquals(null, $roleEnvironmentData);
    }

    /**
     * @covers \WindowsAzure\ServiceRuntime\Internal\XmlRoleEnvironmentDataDeserializer::_translateConfigurationSettings
     */
    public function testTranslateConfigurationSettings_MultipleSettings()
    {
        // Setup
        $rootDirectory = 'root';

        vfsStreamWrapper::register();
        vfsStreamWrapper::setRoot(new vfsStreamDirectory($rootDirectory));

        // Test multiple settings
        $fileName = 'roleenvironmentendpoint';
        $fileContent = '<?xml version="1.0" encoding="utf-8"?>'.
            '<RoleEnvironment xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" '.
            'xmlns:xsd="http://www.w3.org/2001/XMLSchema">'.
            '<Deployment id="92f5cd71a4c048ed94e1b130bd0c4639" emulated="false" />'.
            '<CurrentInstance id="id" roleName="roleName" faultDomain="0" updateDomain="0">'.
            '<ConfigurationSettings>'.
            '<ConfigurationSetting name="Setting1" value="Value1" />'.
            '<ConfigurationSetting name="Setting2" value="Value2" />'.
            '</ConfigurationSettings>'.
            '</CurrentInstance>'.
            '</RoleEnvironment>';

        $file = vfsStream::newFile($fileName);
        $file->setContent($fileContent);

        vfsStreamWrapper::getRoot()->addChild($file);

        $xmlRoleEnvironmentDataDeserializer = new XmlRoleEnvironmentDataDeserializer();

        $inputChannel = new FileInputChannel();
        $inputStream = $inputChannel->getInputStream(
            vfsStream::url($rootDirectory.'/'.$fileName)
        );

        $roleEnvironmentData = $xmlRoleEnvironmentDataDeserializer->deserialize(
            $inputStream
        );

        $this->assertNotEquals(null, $roleEnvironmentData);
    }

    /**
     * @covers \WindowsAzure\ServiceRuntime\Internal\XmlRoleEnvironmentDataDeserializer::_translateLocalResources
     */
    public function testTranslateLocalResources_NoSettings()
    {
        // Setup
        $rootDirectory = 'root';

        vfsStreamWrapper::register();
        vfsStreamWrapper::setRoot(new vfsStreamDirectory($rootDirectory));

        // Test no settings
        $fileName = 'roleenvironmentendpoint';
        $fileContent = '<?xml version="1.0" encoding="utf-8"?>'.
            '<RoleEnvironment xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" '.
            'xmlns:xsd="http://www.w3.org/2001/XMLSchema">'.
            '<Deployment id="92f5cd71a4c048ed94e1b130bd0c4639" emulated="false" />'.
            '<CurrentInstance id="id" roleName="roleName" faultDomain="0" updateDomain="0">'.
            '<LocalResources />'.
            '</CurrentInstance>'.
            '</RoleEnvironment>';

        $file = vfsStream::newFile($fileName);
        $file->setContent($fileContent);

        vfsStreamWrapper::getRoot()->addChild($file);

        $xmlRoleEnvironmentDataDeserializer = new XmlRoleEnvironmentDataDeserializer();

        $inputChannel = new FileInputChannel();
        $inputStream = $inputChannel->getInputStream(
            vfsStream::url($rootDirectory.'/'.$fileName)
        );

        $roleEnvironmentData = $xmlRoleEnvironmentDataDeserializer->deserialize(
            $inputStream
        );

        $this->assertNotEquals(null, $roleEnvironmentData);
    }

    /**
     * @covers \WindowsAzure\ServiceRuntime\Internal\XmlRoleEnvironmentDataDeserializer::_translateLocalResources
     */
    public function testTranslateLocalResources_OneSetting()
    {
        // Setup
        $rootDirectory = 'root';

        vfsStreamWrapper::register();
        vfsStreamWrapper::setRoot(new vfsStreamDirectory($rootDirectory));

        // Test one setting
        $fileName = 'roleenvironmentendpoint';
        $fileContent = '<?xml version="1.0" encoding="utf-8"?>'.
            '<RoleEnvironment xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" '.
            'xmlns:xsd="http://www.w3.org/2001/XMLSchema">'.
            '<Deployment id="92f5cd71a4c048ed94e1b130bd0c4639" emulated="false" />'.
            '<CurrentInstance id="id" roleName="roleName" faultDomain="0" updateDomain="0">'.
            '<LocalResources>'.
            '<LocalResource name="DiagnosticStore" path="somepath.DiagnosticStore" sizeInMB="4096" />'.
            '</LocalResources>'.
            '</CurrentInstance>'.
            '</RoleEnvironment>';

        $file = vfsStream::newFile($fileName);
        $file->setContent($fileContent);

        vfsStreamWrapper::getRoot()->addChild($file);

        $xmlRoleEnvironmentDataDeserializer = new XmlRoleEnvironmentDataDeserializer();

        $inputChannel = new FileInputChannel();
        $inputStream = $inputChannel->getInputStream(
            vfsStream::url($rootDirectory.'/'.$fileName)
        );

        $roleEnvironmentData = $xmlRoleEnvironmentDataDeserializer->deserialize(
            $inputStream
        );

        $this->assertNotEquals(null, $roleEnvironmentData);
    }

    /**
     * @covers \WindowsAzure\ServiceRuntime\Internal\XmlRoleEnvironmentDataDeserializer::_translateLocalResources
     */
    public function testTranslateLocalResources_MultipleSettings()
    {
        // Setup
        $rootDirectory = 'root';

        vfsStreamWrapper::register();
        vfsStreamWrapper::setRoot(new vfsStreamDirectory($rootDirectory));

        // Test multiple settings
        $fileName = 'roleenvironmentendpoint';
        $fileContent = '<?xml version="1.0" encoding="utf-8"?>'.
            '<RoleEnvironment xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" '.
            'xmlns:xsd="http://www.w3.org/2001/XMLSchema">'.
            '<Deployment id="92f5cd71a4c048ed94e1b130bd0c4639" emulated="false" />'.
            '<CurrentInstance id="id" roleName="roleName" faultDomain="0" updateDomain="0">'.
            '<LocalResources>'.
            '<LocalResource name="DiagnosticStore1" path="somepath.DiagnosticStore1" sizeInMB="4096" />'.
            '<LocalResource name="DiagnosticStore2" path="somepath.DiagnosticStore2" sizeInMB="4096" />'.
            '</LocalResources>'.
            '</CurrentInstance>'.
            '</RoleEnvironment>';

        $file = vfsStream::newFile($fileName);
        $file->setContent($fileContent);

        vfsStreamWrapper::getRoot()->addChild($file);

        $xmlRoleEnvironmentDataDeserializer = new XmlRoleEnvironmentDataDeserializer();

        $inputChannel = new FileInputChannel();
        $inputStream = $inputChannel->getInputStream(
            vfsStream::url($rootDirectory.'/'.$fileName)
        );

        $roleEnvironmentData = $xmlRoleEnvironmentDataDeserializer->deserialize(
            $inputStream
        );

        $this->assertNotEquals(null, $roleEnvironmentData);
    }

    /**
     * @covers \WindowsAzure\ServiceRuntime\Internal\XmlRoleEnvironmentDataDeserializer::_translateCurrentInstance
     * @covers \WindowsAzure\ServiceRuntime\Internal\XmlRoleEnvironmentDataDeserializer::_translateRoleInstanceEndpoints
     */
    public function testTranslateCurrentInstance_OneEndpoint()
    {
        // Setup
        $rootDirectory = 'root';

        vfsStreamWrapper::register();
        vfsStreamWrapper::setRoot(new vfsStreamDirectory($rootDirectory));

        // Test multiple settings
        $fileName = 'roleenvironmentendpoint';
        $fileContent = '<?xml version="1.0" encoding="utf-8"?>'.
            '<RoleEnvironment xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" '.
            'xmlns:xsd="http://www.w3.org/2001/XMLSchema">'.
            '<Deployment id="92f5cd71a4c048ed94e1b130bd0c4639" emulated="false" />'.
            '<CurrentInstance id="id" roleName="roleName" faultDomain="0" updateDomain="0">'.
            '<Endpoints>'.
            '<Endpoint name="HttpIn" address="10.114.250.21" port="80" protocol="tcp" />'.
            '</Endpoints>'.
            '</CurrentInstance>'.
            '</RoleEnvironment>';

        $file = vfsStream::newFile($fileName);
        $file->setContent($fileContent);

        vfsStreamWrapper::getRoot()->addChild($file);

        $xmlRoleEnvironmentDataDeserializer = new XmlRoleEnvironmentDataDeserializer();

        $inputChannel = new FileInputChannel();
        $inputStream = $inputChannel->getInputStream(
            vfsStream::url($rootDirectory.'/'.$fileName)
        );

        $roleEnvironmentData = $xmlRoleEnvironmentDataDeserializer->deserialize(
            $inputStream
        );

        $this->assertNotEquals(null, $roleEnvironmentData);
    }

    /**
     * @covers \WindowsAzure\ServiceRuntime\Internal\XmlRoleEnvironmentDataDeserializer::_translateCurrentInstance
     * @covers \WindowsAzure\ServiceRuntime\Internal\XmlRoleEnvironmentDataDeserializer::_translateRoleInstanceEndpoints
     */
    public function testTranslateCurrentInstance_MultipleEndpoints()
    {
        // Setup
        $rootDirectory = 'root';

        vfsStreamWrapper::register();
        vfsStreamWrapper::setRoot(new vfsStreamDirectory($rootDirectory));

        // Test multiple settings
        $fileName = 'roleenvironmentendpoint';
        $fileContent = '<?xml version="1.0" encoding="utf-8"?>'.
            '<RoleEnvironment xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" '.
            'xmlns:xsd="http://www.w3.org/2001/XMLSchema">'.
            '<Deployment id="92f5cd71a4c048ed94e1b130bd0c4639" emulated="false" />'.
            '<CurrentInstance id="id" roleName="roleName" faultDomain="0" updateDomain="0">'.
            '<Endpoints>'.
            '<Endpoint name="HttpIn1" address="10.114.250.21" port="80" protocol="tcp" />'.
            '<Endpoint name="HttpIn2" address="10.114.250.22" port="80" protocol="tcp" />'.
            '</Endpoints>'.
            '</CurrentInstance>'.
            '</RoleEnvironment>';

        $file = vfsStream::newFile($fileName);
        $file->setContent($fileContent);

        vfsStreamWrapper::getRoot()->addChild($file);

        $xmlRoleEnvironmentDataDeserializer = new XmlRoleEnvironmentDataDeserializer();

        $inputChannel = new FileInputChannel();
        $inputStream = $inputChannel->getInputStream(
            vfsStream::url($rootDirectory.'/'.$fileName)
        );

        $roleEnvironmentData = $xmlRoleEnvironmentDataDeserializer->deserialize(
            $inputStream
        );

        $this->assertNotEquals(null, $roleEnvironmentData);
    }

    /**
     * @covers \WindowsAzure\ServiceRuntime\Internal\XmlRoleEnvironmentDataDeserializer::_translateRoles
     * @covers \WindowsAzure\ServiceRuntime\Internal\XmlRoleEnvironmentDataDeserializer::_translateRoleInstances
     */
    public function testTranslateRoles_MultipleRoles()
    {
        // Setup
        $rootDirectory = 'root';

        vfsStreamWrapper::register();
        vfsStreamWrapper::setRoot(new vfsStreamDirectory($rootDirectory));

        // Test multiple settings
        $fileName = 'roleenvironmentendpoint';
        $fileContent = '<?xml version="1.0" encoding="utf-8"?>'.
            '<RoleEnvironment xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" '.
            'xmlns:xsd="http://www.w3.org/2001/XMLSchema">'.
            '<Deployment id="92f5cd71a4c048ed94e1b130bd0c4639" emulated="false" />'.
            '<CurrentInstance id="geophotoapp_IN_0" roleName="geophotoapp" faultDomain="0" updateDomain="0">'.
            '</CurrentInstance>'.
            '<Roles>'.
            '<Role name="role1">'.
            '<Instances>'.
            '<Instance id="deployment16(191).test.role1_IN_0" faultDomain="0" updateDomain="0">'.
            '<Endpoints>'.
            '<Endpoint name="MyInternalEndpoint1" address="127.255.0.0" port="20000" protocol="tcp" />'.
            '</Endpoints>'.
            '</Instance>'.
            '</Instances>'.
            '</Role>'.
            '<Role name="role2">'.
            '<Instances>'.
            '<Instance id="deployment16(191).test.role2_IN_0" faultDomain="0" updateDomain="0">'.
            '<Endpoints>'.
            '<Endpoint name="MyInternalEndpoint2" address="127.255.0.2" port="20002" protocol="tcp" />'.
            '</Endpoints>'.
            '</Instance>'.
            '<Instance id="deployment16(191).test.role2_IN_1" faultDomain="0" updateDomain="0">'.
            '<Endpoints>'.
            '<Endpoint name="MyInternalEndpoint3" address="127.255.0.3" port="20002" protocol="tcp" />'.
            '<Endpoint name="MyInternalEndpoint4" address="127.255.0.3" port="20004" protocol="tcp" />'.
            '</Endpoints>'.
            '</Instance>'.
            '</Instances>'.
            '</Role>'.
            '</Roles>'.
            '</RoleEnvironment>';

        $file = vfsStream::newFile($fileName);
        $file->setContent($fileContent);

        vfsStreamWrapper::getRoot()->addChild($file);

        $xmlRoleEnvironmentDataDeserializer = new XmlRoleEnvironmentDataDeserializer();

        $inputChannel = new FileInputChannel();
        $inputStream = $inputChannel->getInputStream(
            vfsStream::url($rootDirectory.'/'.$fileName)
        );

        $roleEnvironmentData = $xmlRoleEnvironmentDataDeserializer->deserialize(
            $inputStream
        );

        $this->assertNotEquals(null, $roleEnvironmentData);
    }

    /**
     * @covers \WindowsAzure\ServiceRuntime\Internal\XmlRoleEnvironmentDataDeserializer::_translateRoles
     * @covers \WindowsAzure\ServiceRuntime\Internal\XmlRoleEnvironmentDataDeserializer::_translateRoleInstances
     */
    public function testTranslateRoles_OneRoles()
    {
        // Setup
        $rootDirectory = 'root';

        vfsStreamWrapper::register();
        vfsStreamWrapper::setRoot(new vfsStreamDirectory($rootDirectory));

        // Test multiple settings
        $fileName = 'roleenvironmentendpoint';
        $fileContent = '<?xml version="1.0" encoding="utf-8"?>'.
            '<RoleEnvironment xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" '.
            'xmlns:xsd="http://www.w3.org/2001/XMLSchema">'.
            '<Deployment id="92f5cd71a4c048ed94e1b130bd0c4639" emulated="false" />'.
            '<CurrentInstance id="role1" roleName="role1" faultDomain="0" updateDomain="0">'.
            '</CurrentInstance>'.
            '<Roles>'.
            '<Role name="role1">'.
            '<Instances>'.
            '<Instance id="deployment16(191).test.role1_IN_0" faultDomain="0" updateDomain="0">'.
            '<Endpoints>'.
            '<Endpoint name="MyInternalEndpoint1" address="127.255.0.0" port="20000" protocol="tcp" />'.
            '</Endpoints>'.
            '</Instance>'.
            '</Instances>'.
            '</Role>'.
            '</Roles>'.
            '</RoleEnvironment>';

        $file = vfsStream::newFile($fileName);
        $file->setContent($fileContent);

        vfsStreamWrapper::getRoot()->addChild($file);

        $xmlRoleEnvironmentDataDeserializer = new XmlRoleEnvironmentDataDeserializer();

        $inputChannel = new FileInputChannel();
        $inputStream = $inputChannel->getInputStream(
            vfsStream::url($rootDirectory.'/'.$fileName)
        );

        $roleEnvironmentData = $xmlRoleEnvironmentDataDeserializer->deserialize(
            $inputStream
        );

        $this->assertNotEquals(null, $roleEnvironmentData);
    }
}
