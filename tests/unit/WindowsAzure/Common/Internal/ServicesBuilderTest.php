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
 * @package   Tests\Unit\WindowsAzure\Common\Internal
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */

namespace Tests\Unit\WindowsAzure\Common\Internal;
use Tests\Framework\TestResources;
use WindowsAzure\Common\Internal\Resources;
use WindowsAzure\Common\Internal\ServicesBuilder;
use WindowsAzure\Common\Configuration;
use WindowsAzure\ServiceManagement\ServiceManagementSettings;
use WindowsAzure\Common\Internal\InvalidArgumentTypeException;

/**
 * Unit tests for class ServicesBuilder
 *
 * @category  Microsoft
 * @package   Tests\Unit\WindowsAzure\Common\Internal
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
class ServicesBuilderTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers WindowsAzure\Common\Internal\ServicesBuilder::createQueueService
     * @covers WindowsAzure\Common\Internal\ServicesBuilder::httpClient
     * @covers WindowsAzure\Common\Internal\ServicesBuilder::serializer
     * @covers WindowsAzure\Common\Internal\ServicesBuilder::queueAuthenticationScheme
     * @covers WindowsAzure\Common\Internal\ServicesBuilder::_addHeadersFilter
     * @covers WindowsAzure\Common\Internal\ServicesBuilder::_validateConfig
     */
    public function testBuildForQueue()
    {
        // Setup
        $builder = new ServicesBuilder();
        
        // Test
        $queueRestProxy = $builder->createQueueService(TestResources::getStorageServicesConnectionString());
        
        // Assert
        $this->assertInstanceOf('WindowsAzure\Queue\Internal\IQueue', $queueRestProxy);
    }
    
    /**
     * @covers WindowsAzure\Common\Internal\ServicesBuilder::createBlobService
     * @covers WindowsAzure\Common\Internal\ServicesBuilder::httpClient
     * @covers WindowsAzure\Common\Internal\ServicesBuilder::serializer
     * @covers WindowsAzure\Common\Internal\ServicesBuilder::blobAuthenticationScheme
     * @covers WindowsAzure\Common\Internal\ServicesBuilder::_addHeadersFilter
     * @covers WindowsAzure\Common\Internal\ServicesBuilder::_validateConfig
     */
    public function testBuildForBlob()
    {
        // Setup
        $builder = new ServicesBuilder();
        
        // Test
        $blobRestProxy = $builder->createBlobService(TestResources::getStorageServicesConnectionString());
        
        // Assert
        $this->assertInstanceOf('WindowsAzure\Blob\Internal\IBlob', $blobRestProxy);
    }
    
    /**
     * @covers WindowsAzure\Common\Internal\ServicesBuilder::createTableService
     * @covers WindowsAzure\Common\Internal\ServicesBuilder::httpClient
     * @covers WindowsAzure\Common\Internal\ServicesBuilder::serializer
     * @covers WindowsAzure\Common\Internal\ServicesBuilder::mimeSerializer
     * @covers WindowsAzure\Common\Internal\ServicesBuilder::atomSerializer
     * @covers WindowsAzure\Common\Internal\ServicesBuilder::tableAuthenticationScheme
     * @covers WindowsAzure\Common\Internal\ServicesBuilder::_addHeadersFilter
     * @covers WindowsAzure\Common\Internal\ServicesBuilder::_validateConfig
     */
    public function testBuildForTable()
    {
        // Setup
        $builder = new ServicesBuilder();
        
        // Test
        $tableRestProxy = $builder->createTableService(TestResources::getStorageServicesConnectionString());
        
        // Assert
        $this->assertInstanceOf('WindowsAzure\Table\Internal\ITable', $tableRestProxy);
    }
    
    /**
     * @covers WindowsAzure\Common\Internal\ServicesBuilder::createServiceManagementService
     * @covers WindowsAzure\Common\Internal\ServicesBuilder::httpClient
     * @covers WindowsAzure\Common\Internal\ServicesBuilder::serializer
     * @covers WindowsAzure\Common\Internal\ServicesBuilder::_addHeadersFilter
     * @covers WindowsAzure\Common\Internal\ServicesBuilder::_validateConfig
     */
    public function testBuildForServiceManagement()
    {
        // Setup
        $config = new Configuration();
        $config->setProperty(ServiceManagementSettings::CERTIFICATE_PATH, 'path');
        $config->setProperty(ServiceManagementSettings::SUBSCRIPTION_ID, 'sub id');
        $config->setProperty(ServiceManagementSettings::URI, 'uri');
        $builder = new ServicesBuilder();
        
        // Test
        $serviceManagementRestProxy = $builder->createServiceManagementService($config);
        
        // Assert
        $this->assertInstanceOf('WindowsAzure\ServiceManagement\Internal\IServiceManagement', $serviceManagementRestProxy);
    }
    
    /**
     * @covers WindowsAzure\Common\Internal\ServicesBuilder::createServiceManagementService
     * @covers WindowsAzure\Common\Internal\ServicesBuilder::_validateConfig
     * @covers WindowsAzure\Common\Internal\ServicesBuilder::_validateConfigSetting
     */
    public function testValidateConfigWithMissingServiceManagementSettingConfig()
    {
        $missingKeyMsg   = sprintf(Resources::MISSING_CONFIG_SETTING_KEY_MSG, 'ServiceManagementSettings::SUBSCRIPTION_ID', 'ServiceManagement');
        $config = new Configuration();
        $config->setProperty(ServiceManagementSettings::CERTIFICATE_PATH, 'path');
        $config->setProperty(ServiceManagementSettings::URI, 'url');
        $builder = new ServicesBuilder();
        $this->setExpectedException('\InvalidArgumentException', $missingKeyMsg);
        
        $builder->createServiceManagementService($config);
    }
    
    /**
     * @covers WindowsAzure\Common\Internal\ServicesBuilder::createServiceManagementService
     * @covers WindowsAzure\Common\Internal\ServicesBuilder::_validateConfig
     * @covers WindowsAzure\Common\Internal\ServicesBuilder::_validateConfigSetting
     */
    public function testValidateConfigWithEmptyServiceManagementSettingConfig()
    {
        $missingValueMsg   = sprintf(Resources::MISSING_CONFIG_SETTING_VALUE_MSG, 'ServiceManagementSettings::SUBSCRIPTION_ID');
        $config = new Configuration();
        $config->setProperty(ServiceManagementSettings::CERTIFICATE_PATH, 'path');
        $config->setProperty(ServiceManagementSettings::SUBSCRIPTION_ID, '');
        $config->setProperty(ServiceManagementSettings::URI, 'url');
        $builder = new ServicesBuilder();
        $this->setExpectedException('\InvalidArgumentException', $missingValueMsg);
        
        $builder->createServiceManagementService($config);
    }
}

?>
