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
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */

namespace Tests\Unit\WindowsAzure\Common\Internal;
use Tests\Framework\TestResources;
use WindowsAzure\Common\Internal\Resources;
use WindowsAzure\Common\Internal\ServicesBuilder;
use WindowsAzure\Common\Configuration;
use WindowsAzure\Queue\QueueSettings;
use WindowsAzure\Blob\BlobSettings;
use WindowsAzure\Table\TableSettings;
use WindowsAzure\ServiceManagement\ServiceManagementSettings;
use WindowsAzure\ServiceBus\ServiceBusSettings;
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
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
class ServicesBuilderTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers WindowsAzure\Common\Internal\ServicesBuilder::build
     * @covers WindowsAzure\Common\Internal\ServicesBuilder::_buildQueue
     * @covers WindowsAzure\Common\Internal\ServicesBuilder::_addHeadersFilter
     * @covers WindowsAzure\Common\Internal\ServicesBuilder::_validateConfig
     */
    public function testBuildForQueue()
    {
        // Setup
        $uri = 'http://' . TestResources::accountName() . '.queue.core.windows.net';
        $config = new Configuration();
        $config->setProperty(QueueSettings::ACCOUNT_KEY, TestResources::accountKey());
        $config->setProperty(QueueSettings::ACCOUNT_NAME, TestResources::accountName());        
        $config->setProperty(QueueSettings::URI, $uri);
        $builder = new ServicesBuilder();
        
        // Test
        $queueRestProxy = $builder->build($config, Resources::QUEUE_TYPE_NAME);
        
        // Assert
        $this->assertInstanceOf('WindowsAzure\Queue\Internal\IQueue', $queueRestProxy);
    }
    
    /**
     * @covers WindowsAzure\Common\Internal\ServicesBuilder::build
     * @covers WindowsAzure\Common\Internal\ServicesBuilder::_buildBlob
     * @covers WindowsAzure\Common\Internal\ServicesBuilder::_addHeadersFilter
     * @covers WindowsAzure\Common\Internal\ServicesBuilder::_validateConfig
     */
    public function testBuildForBlob()
    {
        // Setup
        $uri = 'http://' . TestResources::accountName() . '.blob.core.windows.net';
        $config = new Configuration();
        $config->setProperty(BlobSettings::ACCOUNT_KEY, TestResources::accountKey());
        $config->setProperty(BlobSettings::ACCOUNT_NAME, TestResources::accountName());        
        $config->setProperty(BlobSettings::URI, $uri);
        $builder = new ServicesBuilder();
        
        // Test
        $blobRestProxy = $builder->build($config, Resources::BLOB_TYPE_NAME);
        
        // Assert
        $this->assertInstanceOf('WindowsAzure\Blob\Internal\IBlob', $blobRestProxy);
    }
    
    /**
     * @covers WindowsAzure\Common\Internal\ServicesBuilder::build
     * @covers WindowsAzure\Common\Internal\ServicesBuilder::_buildTable
     * @covers WindowsAzure\Common\Internal\ServicesBuilder::_addHeadersFilter
     * @covers WindowsAzure\Common\Internal\ServicesBuilder::_validateConfig
     */
    public function testBuildForTable()
    {
        // Setup
        $uri = 'http://' . TestResources::accountName() . '.table.core.windows.net';
        $config = new Configuration();
        $config->setProperty(TableSettings::ACCOUNT_KEY, TestResources::accountKey());
        $config->setProperty(TableSettings::ACCOUNT_NAME, TestResources::accountName());        
        $config->setProperty(TableSettings::URI, $uri);
        $builder = new ServicesBuilder();
        
        // Test
        $tableRestProxy = $builder->build($config, Resources::TABLE_TYPE_NAME);
        
        // Assert
        $this->assertInstanceOf('WindowsAzure\Table\Internal\ITable', $tableRestProxy);
    }
    
    /**
     * @covers WindowsAzure\Common\Internal\ServicesBuilder::build
     * @covers WindowsAzure\Common\Internal\ServicesBuilder::_buildServiceManagement
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
        $serviceManagementRestProxy = $builder->build($config, Resources::SERVICE_MANAGEMENT_TYPE_NAME);
        
        // Assert
        $this->assertInstanceOf('WindowsAzure\ServiceManagement\Internal\IServiceManagement', $serviceManagementRestProxy);
    }
    
    /**
     * @covers WindowsAzure\Common\Internal\ServicesBuilder::build
     * @covers WindowsAzure\Common\Internal\ServicesBuilder::_buildServiceBus
     * @covers WindowsAzure\Common\Internal\ServicesBuilder::_addHeadersFilter
     * @covers WindowsAzure\Common\Internal\ServicesBuilder::_validateConfig
     */
    public function testBuildForServiceBus()
    {
        // Setup
        $config = new Configuration();
        $config->setProperty(ServiceBusSettings::URI, 'uri');
        $config->setProperty(ServiceBusSettings::WRAP_URI, 'wrap uri');
        $config->setProperty(ServiceBusSettings::WRAP_NAME, 'wrap name');
        $config->setProperty(ServiceBusSettings::WRAP_PASSWORD, 'wrap password');
        $builder = new ServicesBuilder();
        
        // Test
        $serviceBusRestProxy = $builder->build($config, Resources::SERVICE_BUS_TYPE_NAME);
        
        // Assert
        $this->assertInstanceOf('WindowsAzure\ServiceBus\Internal\IServiceBus', $serviceBusRestProxy);
    }
    
    /**
     * @covers WindowsAzure\Common\Internal\ServicesBuilder::build
     * @covers WindowsAzure\Common\Internal\ServicesBuilder::_buildWrap
     * @covers WindowsAzure\Common\Internal\ServicesBuilder::_addHeadersFilter
     * @covers WindowsAzure\Common\Internal\ServicesBuilder::_validateConfig
     */
    public function testBuildForWrap()
    {
        // Setup
        $config = new Configuration();
        $config->setProperty(ServiceBusSettings::WRAP_URI, 'wrap uri');
        $builder = new ServicesBuilder();
        
        // Test
        $wrapRestProxy = $builder->build($config, Resources::WRAP_TYPE_NAME);
        
        // Assert
        $this->assertInstanceOf('WindowsAzure\ServiceBus\Internal\IWrap', $wrapRestProxy);
    }
    
    /**
     * @covers WindowsAzure\Common\Internal\ServicesBuilder::build
     * @covers WindowsAzure\Common\Internal\ServicesBuilder::_validateConfig
     */
    public function testBuildWithInvalidTypeFail()
    {
        // Setup
        $uri = 'http://' . TestResources::accountName() . '.queue.core.windows.net';
        $config = new Configuration();
        $config->setProperty(QueueSettings::ACCOUNT_KEY, TestResources::accountKey());
        $config->setProperty(QueueSettings::ACCOUNT_NAME, TestResources::accountName());        
        $config->setProperty(QueueSettings::URI, $uri);
        $builder = new ServicesBuilder();
        $this->setExpectedException(get_class(new InvalidArgumentTypeException('')));
        
        // Test
        $builder->build($config, 'FooType');
    }
    
    /**
     * @covers WindowsAzure\Common\Internal\ServicesBuilder::build
     * @covers WindowsAzure\Common\Internal\ServicesBuilder::_validateConfig
     * @covers WindowsAzure\Common\Internal\ServicesBuilder::_validateConfigSetting
     */
    public function testValidateConfigWithMissingQueueSettingConfig()
    {
        $missingKeyMsg   = sprintf(Resources::MISSING_CONFIG_SETTING_KEY_MSG, 'QueueSettings::ACCOUNT_KEY', 'Queue');
        $config = new Configuration();
        $config->setProperty(QueueSettings::ACCOUNT_NAME, TestResources::accountName());        
        $config->setProperty(QueueSettings::URI, 'url');
        $builder = new ServicesBuilder();
        $this->setExpectedException('\InvalidArgumentException', $missingKeyMsg);
        
        $builder->build($config, Resources::QUEUE_TYPE_NAME);
    }
    
    /**
     * @covers WindowsAzure\Common\Internal\ServicesBuilder::build
     * @covers WindowsAzure\Common\Internal\ServicesBuilder::_validateConfig
     * @covers WindowsAzure\Common\Internal\ServicesBuilder::_validateConfigSetting
     */
    public function testValidateConfigWithEmptyQueueSettingConfig()
    {
        $missingValueMsg   = sprintf(Resources::MISSING_CONFIG_SETTING_VALUE_MSG, 'QueueSettings::ACCOUNT_KEY');
        $config = new Configuration();
        $config->setProperty(QueueSettings::ACCOUNT_NAME, TestResources::accountName());
        $config->setProperty(QueueSettings::ACCOUNT_KEY, null);
        $config->setProperty(QueueSettings::URI, 'url');
        $builder = new ServicesBuilder();
        $this->setExpectedException('\InvalidArgumentException', $missingValueMsg);
        
        $builder->build($config, Resources::QUEUE_TYPE_NAME);
    }
    
    /**
     * @covers WindowsAzure\Common\Internal\ServicesBuilder::build
     * @covers WindowsAzure\Common\Internal\ServicesBuilder::_validateConfig
     * @covers WindowsAzure\Common\Internal\ServicesBuilder::_validateConfigSetting
     */
    public function testValidateConfigWithMissingBlobSettingConfig()
    {
        $missingKeyMsg   = sprintf(Resources::MISSING_CONFIG_SETTING_KEY_MSG, 'BlobSettings::ACCOUNT_KEY', 'Blob');
        $config = new Configuration();
        $config->setProperty(BlobSettings::ACCOUNT_NAME, TestResources::accountName());        
        $config->setProperty(BlobSettings::URI, 'url');
        $builder = new ServicesBuilder();
        $this->setExpectedException('\InvalidArgumentException', $missingKeyMsg);
        
        $builder->build($config, Resources::BLOB_TYPE_NAME);
    }
    
    /**
     * @covers WindowsAzure\Common\Internal\ServicesBuilder::build
     * @covers WindowsAzure\Common\Internal\ServicesBuilder::_validateConfig
     * @covers WindowsAzure\Common\Internal\ServicesBuilder::_validateConfigSetting
     */
    public function testValidateConfigWithEmptyBlobSettingConfig()
    {
        $missingValueMsg   = sprintf(Resources::MISSING_CONFIG_SETTING_VALUE_MSG, 'BlobSettings::ACCOUNT_KEY');
        $config = new Configuration();
        $config->setProperty(BlobSettings::ACCOUNT_NAME, TestResources::accountName());
        $config->setProperty(BlobSettings::ACCOUNT_KEY, null);
        $config->setProperty(BlobSettings::URI, 'url');
        $builder = new ServicesBuilder();
        $this->setExpectedException('\InvalidArgumentException', $missingValueMsg);
        
        $builder->build($config, Resources::BLOB_TYPE_NAME);
    }
    
    /**
     * @covers WindowsAzure\Common\Internal\ServicesBuilder::build
     * @covers WindowsAzure\Common\Internal\ServicesBuilder::_validateConfig
     * @covers WindowsAzure\Common\Internal\ServicesBuilder::_validateConfigSetting
     */
    public function testValidateConfigWithMissingTableSettingConfig()
    {
        $missingKeyMsg   = sprintf(Resources::MISSING_CONFIG_SETTING_KEY_MSG, 'TableSettings::ACCOUNT_KEY', 'Table');
        $config = new Configuration();
        $config->setProperty(TableSettings::ACCOUNT_NAME, TestResources::accountName());        
        $config->setProperty(TableSettings::URI, 'url');
        $builder = new ServicesBuilder();
        $this->setExpectedException('\InvalidArgumentException', $missingKeyMsg);
        
        $builder->build($config, Resources::TABLE_TYPE_NAME);
    }
    
    /**
     * @covers WindowsAzure\Common\Internal\ServicesBuilder::build
     * @covers WindowsAzure\Common\Internal\ServicesBuilder::_validateConfig
     * @covers WindowsAzure\Common\Internal\ServicesBuilder::_validateConfigSetting
     */
    public function testValidateConfigWithEmptyTableSettingConfig()
    {
        $missingValueMsg   = sprintf(Resources::MISSING_CONFIG_SETTING_VALUE_MSG, 'TableSettings::ACCOUNT_KEY');
        $config = new Configuration();
        $config->setProperty(TableSettings::ACCOUNT_NAME, TestResources::accountName());
        $config->setProperty(TableSettings::ACCOUNT_KEY, null);
        $config->setProperty(TableSettings::URI, 'url');
        $builder = new ServicesBuilder();
        $this->setExpectedException('\InvalidArgumentException', $missingValueMsg);
        
        $builder->build($config, Resources::TABLE_TYPE_NAME);
    }
    
    /**
     * @covers WindowsAzure\Common\Internal\ServicesBuilder::build
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
        
        $builder->build($config, Resources::SERVICE_MANAGEMENT_TYPE_NAME);
    }
    
    /**
     * @covers WindowsAzure\Common\Internal\ServicesBuilder::build
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
        
        $builder->build($config, Resources::SERVICE_MANAGEMENT_TYPE_NAME);
    }
    
    /**
     * @covers WindowsAzure\Common\Internal\ServicesBuilder::build
     * @covers WindowsAzure\Common\Internal\ServicesBuilder::_validateConfig
     * @covers WindowsAzure\Common\Internal\ServicesBuilder::_validateConfigSetting
     */
    public function testValidateConfigWithMissingServiceBusSettingConfig()
    {
        $missingKeyMsg   = sprintf(Resources::MISSING_CONFIG_SETTING_KEY_MSG, 'ServiceBusSettings::WRAP_PASSWORD', 'ServiceBus');
        $config = new Configuration();
        $config->setProperty(ServiceBusSettings::URI, 'uri');
        $config->setProperty(ServiceBusSettings::WRAP_URI, 'wrap uri');
        $config->setProperty(ServiceBusSettings::WRAP_NAME, 'wrap name');
        $builder = new ServicesBuilder();
        $this->setExpectedException('\InvalidArgumentException', $missingKeyMsg);
        
        $builder->build($config, Resources::SERVICE_BUS_TYPE_NAME);
    }
    
    /**
     * @covers WindowsAzure\Common\Internal\ServicesBuilder::build
     * @covers WindowsAzure\Common\Internal\ServicesBuilder::_validateConfig
     * @covers WindowsAzure\Common\Internal\ServicesBuilder::_validateConfigSetting
     */
    public function testValidateConfigWithEmptyServiceBusSettingConfig()
    {
        $missingValueMsg   = sprintf(Resources::MISSING_CONFIG_SETTING_VALUE_MSG, 'ServiceBusSettings::WRAP_PASSWORD');
        $config = new Configuration();
        $config->setProperty(ServiceBusSettings::URI, 'uri');
        $config->setProperty(ServiceBusSettings::WRAP_URI, 'wrap uri');
        $config->setProperty(ServiceBusSettings::WRAP_NAME, 'wrap name');
        $config->setProperty(ServiceBusSettings::WRAP_PASSWORD, null);
        $builder = new ServicesBuilder();
        $this->setExpectedException('\InvalidArgumentException', $missingValueMsg);
        
        $builder->build($config, Resources::SERVICE_BUS_TYPE_NAME);
    }
    
    /**
     * @covers WindowsAzure\Common\Internal\ServicesBuilder::build
     * @covers WindowsAzure\Common\Internal\ServicesBuilder::_validateConfig
     * @covers WindowsAzure\Common\Internal\ServicesBuilder::_validateConfigSetting
     */
    public function testValidateConfigWithMissingWrapSettingConfig()
    {
        $missingKeyMsg   = sprintf(Resources::MISSING_CONFIG_SETTING_KEY_MSG, 'ServiceBusSettings::WRAP_URI', 'Wrap');
        $config = new Configuration();
        $builder = new ServicesBuilder();
        $this->setExpectedException('\InvalidArgumentException', $missingKeyMsg);
        
        $builder->build($config, Resources::WRAP_TYPE_NAME);
    }
    
    /**
     * @covers WindowsAzure\Common\Internal\ServicesBuilder::build
     * @covers WindowsAzure\Common\Internal\ServicesBuilder::_validateConfig
     * @covers WindowsAzure\Common\Internal\ServicesBuilder::_validateConfigSetting
     */
    public function testValidateConfigWithEmptyWrapSettingConfig()
    {
        $missingValueMsg   = sprintf(Resources::MISSING_CONFIG_SETTING_VALUE_MSG, 'ServiceBusSettings::WRAP_URI');
        $config = new Configuration();
        $config->setProperty(ServiceBusSettings::WRAP_URI, '');
        $builder = new ServicesBuilder();
        $this->setExpectedException('\InvalidArgumentException', $missingValueMsg);
        
        $builder->build($config, Resources::WRAP_TYPE_NAME);
    }
}

?>
