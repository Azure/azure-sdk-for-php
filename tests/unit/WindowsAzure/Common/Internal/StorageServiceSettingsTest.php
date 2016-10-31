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

namespace Tests\unit\WindowsAzure\Common\Internal;

use WindowsAzure\Common\Internal\StorageServiceSettings;
use WindowsAzure\Common\Internal\Resources;
use Tests\Framework\TestResources;

/**
 * Unit tests for class StorageServiceSettings.
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
class StorageServiceSettingsTest extends \PHPUnit_Framework_TestCase
{
    private $_accountName = 'mytestaccount';

    public function setUp()
    {
        $property = new \ReflectionProperty('WindowsAzure\Common\Internal\StorageServiceSettings', 'isInitialized');
        $property->setAccessible(true);
        $property->setValue(false);
    }

    /**
     * @covers \WindowsAzure\Common\Internal\StorageServiceSettings::createFromConnectionString
     * @covers \WindowsAzure\Common\Internal\StorageServiceSettings::developmentStorageAccount
     * @covers \WindowsAzure\Common\Internal\StorageServiceSettings::init
     * @covers \WindowsAzure\Common\Internal\StorageServiceSettings::__construct
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::getValidator
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::optional
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::allRequired
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::setting
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::settingWithFunc
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::matchedSpecification
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::parseAndValidateKeys
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::noMatch
     * @covers \WindowsAzure\Common\Internal\StorageServiceSettings::_getDevelopmentStorageAccount
     */
    public function testCreateFromConnectionStringWithUseDevStore()
    {
        // Setup
        $connectionString = 'UseDevelopmentStorage=true';
        $expectedName = Resources::DEV_STORE_NAME;
        $expectedKey = Resources::DEV_STORE_KEY;
        $expectedBlobEndpoint = Resources::DEV_STORE_URI.':10000/devstoreaccount1/';
        $expectedQueueEndpoint = Resources::DEV_STORE_URI.':10001/devstoreaccount1/';
        $expectedTableEndpoint = Resources::DEV_STORE_URI.':10002/devstoreaccount1/';

        // Test
        $actual = StorageServiceSettings::createFromConnectionString($connectionString);

        // Assert
        $this->assertEquals($expectedName, $actual->getName());
        $this->assertEquals($expectedKey, $actual->getKey());
        $this->assertEquals($expectedBlobEndpoint, $actual->getBlobEndpointUri());
        $this->assertEquals($expectedQueueEndpoint, $actual->getQueueEndpointUri());
        $this->assertEquals($expectedTableEndpoint, $actual->getTableEndpointUri());
    }

    /**
     * @covers \WindowsAzure\Common\Internal\StorageServiceSettings::createFromConnectionString
     * @covers \WindowsAzure\Common\Internal\StorageServiceSettings::developmentStorageAccount
     * @covers \WindowsAzure\Common\Internal\StorageServiceSettings::init
     * @covers \WindowsAzure\Common\Internal\StorageServiceSettings::__construct
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::getValidator
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::optional
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::allRequired
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::setting
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::settingWithFunc
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::matchedSpecification
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::parseAndValidateKeys
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::noMatch
     * @covers \WindowsAzure\Common\Internal\StorageServiceSettings::_getDevelopmentStorageAccount
     */
    public function testCreateFromConnectionStringWithUseDevStoreUri()
    {
        // Setup
        $myProxyUri = 'http://222.3.5.6';
        $connectionString = "DevelopmentStorageProxyUri=$myProxyUri;UseDevelopmentStorage=true";
        $expectedName = Resources::DEV_STORE_NAME;
        $expectedKey = Resources::DEV_STORE_KEY;
        $expectedBlobEndpoint = $myProxyUri.':10000/devstoreaccount1/';
        $expectedQueueEndpoint = $myProxyUri.':10001/devstoreaccount1/';
        $expectedTableEndpoint = $myProxyUri.':10002/devstoreaccount1/';

        // Test
        $actual = StorageServiceSettings::createFromConnectionString($connectionString);

        // Assert
        $this->assertEquals($expectedName, $actual->getName());
        $this->assertEquals($expectedKey, $actual->getKey());
        $this->assertEquals($expectedBlobEndpoint, $actual->getBlobEndpointUri());
        $this->assertEquals($expectedQueueEndpoint, $actual->getQueueEndpointUri());
        $this->assertEquals($expectedTableEndpoint, $actual->getTableEndpointUri());
    }

    /**
     * @covers \WindowsAzure\Common\Internal\StorageServiceSettings::createFromConnectionString
     * @covers \WindowsAzure\Common\Internal\StorageServiceSettings::developmentStorageAccount
     * @covers \WindowsAzure\Common\Internal\StorageServiceSettings::init
     * @covers \WindowsAzure\Common\Internal\StorageServiceSettings::__construct
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::getValidator
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::optional
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::allRequired
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::setting
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::settingWithFunc
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::matchedSpecification
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::parseAndValidateKeys
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::noMatch
     * @covers \WindowsAzure\Common\Internal\StorageServiceSettings::_getDevelopmentStorageAccount
     */
    public function testCreateFromConnectionStringWithInvalidUseDevStoreFail()
    {
        // Setup
        $invalidValue = 'invalid_value';
        $connectionString = "UseDevelopmentStorage=$invalidValue";
        $expectedMsg = sprintf(
            Resources::INVALID_CONFIG_VALUE,
            $invalidValue,
            implode("\n", ['true'])
        );
        $this->setExpectedException('\RuntimeException', $expectedMsg);

        // Test
        StorageServiceSettings::createFromConnectionString($connectionString);
    }

    /**
     * @covers \WindowsAzure\Common\Internal\StorageServiceSettings::createFromConnectionString
     * @covers \WindowsAzure\Common\Internal\StorageServiceSettings::developmentStorageAccount
     * @covers \WindowsAzure\Common\Internal\StorageServiceSettings::init
     * @covers \WindowsAzure\Common\Internal\StorageServiceSettings::__construct
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::getValidator
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::optional
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::allRequired
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::setting
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::settingWithFunc
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::matchedSpecification
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::parseAndValidateKeys
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::noMatch
     * @covers \WindowsAzure\Common\Internal\StorageServiceSettings::_getDevelopmentStorageAccount
     */
    public function testCreateFromConnectionStringWithEmptyConnectionStringFail()
    {
        // Setup
        $connectionString = '';
        $this->setExpectedException('\InvalidArgumentException');

        // Test
        StorageServiceSettings::createFromConnectionString($connectionString);
    }

    /**
     * @covers \WindowsAzure\Common\Internal\StorageServiceSettings::getName
     */
    public function testGetName()
    {
        // Setup
        $expected = 'myname';
        $setting = new StorageServiceSettings($expected, null, null, null, null);

        // Test
        $actual = $setting->getName();

        // Assert
        $this->assertEquals($expected, $actual);
    }

    /**
     * @covers \WindowsAzure\Common\Internal\StorageServiceSettings::getKey
     */
    public function testGetKey()
    {
        // Setup
        $expected = 'mykey';
        $setting = new StorageServiceSettings(null, $expected, null, null, null);

        // Test
        $actual = $setting->getKey();

        // Assert
        $this->assertEquals($expected, $actual);
    }

    /**
     * @covers \WindowsAzure\Common\Internal\StorageServiceSettings::getBlobEndpointUri
     */
    public function testGetBlobEndpointUri()
    {
        // Setup
        $expected = 'myblobEndpointUri';
        $setting = new StorageServiceSettings(null, null, $expected, null, null);

        // Test
        $actual = $setting->getBlobEndpointUri();

        // Assert
        $this->assertEquals($expected, $actual);
    }

    /**
     * @covers \WindowsAzure\Common\Internal\StorageServiceSettings::getQueueEndpointUri
     */
    public function testGetQueueEndpointUri()
    {
        // Setup
        $expected = 'myqueueEndpointUri';
        $setting = new StorageServiceSettings(null, null, null, $expected, null);

        // Test
        $actual = $setting->getQueueEndpointUri();

        // Assert
        $this->assertEquals($expected, $actual);
    }

    /**
     * @covers \WindowsAzure\Common\Internal\StorageServiceSettings::getTableEndpointUri
     */
    public function testGetTableEndpointUri()
    {
        // Setup
        $expected = 'mytableEndpointUri';
        $setting = new StorageServiceSettings(null, null, null, null, $expected);

        // Test
        $actual = $setting->getTableEndpointUri();

        // Assert
        $this->assertEquals($expected, $actual);
    }

    /**
     * @covers \WindowsAzure\Common\Internal\StorageServiceSettings::createFromConnectionString
     * @covers \WindowsAzure\Common\Internal\StorageServiceSettings::init
     * @covers \WindowsAzure\Common\Internal\StorageServiceSettings::__construct
     * @covers \WindowsAzure\Common\Internal\StorageServiceSettings::_getDefaultServiceEndpoint
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::getValidator
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::optional
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::allRequired
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::setting
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::settingWithFunc
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::matchedSpecification
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::parseAndValidateKeys
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::noMatch
     * @covers \WindowsAzure\Common\Internal\StorageServiceSettings::_createStorageServiceSettings
     */
    public function testCreateFromConnectionStringWithAutomatic()
    {
        // Setup
        $protocol = 'https';
        $expectedName = $this->_accountName;
        $expectedKey = TestResources::KEY4;
        $connectionString = "DefaultEndpointsProtocol=$protocol;AccountName=$expectedName;AccountKey=$expectedKey";
        $expectedBlobEndpoint = sprintf(Resources::SERVICE_URI_FORMAT, $protocol, $expectedName, Resources::BLOB_BASE_DNS_NAME);
        $expectedQueueEndpoint = sprintf(Resources::SERVICE_URI_FORMAT, $protocol, $expectedName, Resources::QUEUE_BASE_DNS_NAME);
        $expectedTableEndpoint = sprintf(Resources::SERVICE_URI_FORMAT, $protocol, $expectedName, Resources::TABLE_BASE_DNS_NAME);

        // Test
        $actual = StorageServiceSettings::createFromConnectionString($connectionString);

        // Assert
        $this->assertEquals($expectedName, $actual->getName());
        $this->assertEquals($expectedKey, $actual->getKey());
        $this->assertEquals($expectedBlobEndpoint, $actual->getBlobEndpointUri());
        $this->assertEquals($expectedQueueEndpoint, $actual->getQueueEndpointUri());
        $this->assertEquals($expectedTableEndpoint, $actual->getTableEndpointUri());
    }

    /**
     * @covers \WindowsAzure\Common\Internal\StorageServiceSettings::createFromConnectionString
     * @covers \WindowsAzure\Common\Internal\StorageServiceSettings::init
     * @covers \WindowsAzure\Common\Internal\StorageServiceSettings::__construct
     * @covers \WindowsAzure\Common\Internal\StorageServiceSettings::_getDefaultServiceEndpoint
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::getValidator
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::optional
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::allRequired
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::setting
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::settingWithFunc
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::matchedSpecification
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::parseAndValidateKeys
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::noMatch
     * @covers \WindowsAzure\Common\Internal\StorageServiceSettings::_createStorageServiceSettings
     */
    public function testCreateFromConnectionStringWithTableEndpointSpecified()
    {
        // Setup
        $protocol = 'https';
        $expectedName = $this->_accountName;
        $expectedKey = TestResources::KEY4;
        $expectedTableEndpoint = 'http://myprivatedns.com';
        $expectedBlobEndpoint = sprintf(Resources::SERVICE_URI_FORMAT, $protocol, $expectedName, Resources::BLOB_BASE_DNS_NAME);
        $expectedQueueEndpoint = sprintf(Resources::SERVICE_URI_FORMAT, $protocol, $expectedName, Resources::QUEUE_BASE_DNS_NAME);
        $connectionString = "DefaultEndpointsProtocol=$protocol;AccountName=$expectedName;AccountKey=$expectedKey;TableEndpoint=$expectedTableEndpoint";

        // Test
        $actual = StorageServiceSettings::createFromConnectionString($connectionString);

        // Assert
        $this->assertEquals($expectedName, $actual->getName());
        $this->assertEquals($expectedKey, $actual->getKey());
        $this->assertEquals($expectedBlobEndpoint, $actual->getBlobEndpointUri());
        $this->assertEquals($expectedQueueEndpoint, $actual->getQueueEndpointUri());
        $this->assertEquals($expectedTableEndpoint, $actual->getTableEndpointUri());
    }

    /**
     * @covers \WindowsAzure\Common\Internal\StorageServiceSettings::createFromConnectionString
     * @covers \WindowsAzure\Common\Internal\StorageServiceSettings::init
     * @covers \WindowsAzure\Common\Internal\StorageServiceSettings::__construct
     * @covers \WindowsAzure\Common\Internal\StorageServiceSettings::_getDefaultServiceEndpoint
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::getValidator
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::optional
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::allRequired
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::setting
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::settingWithFunc
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::matchedSpecification
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::parseAndValidateKeys
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::noMatch
     * @covers \WindowsAzure\Common\Internal\StorageServiceSettings::_createStorageServiceSettings
     */
    public function testCreateFromConnectionStringWithBlobEndpointSpecified()
    {
        // Setup
        $protocol = 'https';
        $expectedName = $this->_accountName;
        $expectedKey = TestResources::KEY4;
        $expectedTableEndpoint = sprintf(Resources::SERVICE_URI_FORMAT, $protocol, $expectedName, Resources::TABLE_BASE_DNS_NAME);
        $expectedBlobEndpoint = 'http://myprivatedns.com';
        $expectedQueueEndpoint = sprintf(Resources::SERVICE_URI_FORMAT, $protocol, $expectedName, Resources::QUEUE_BASE_DNS_NAME);
        $connectionString = "DefaultEndpointsProtocol=$protocol;BlobEndpoint=$expectedBlobEndpoint;AccountName=$expectedName;AccountKey=$expectedKey";

        // Test
        $actual = StorageServiceSettings::createFromConnectionString($connectionString);

        // Assert
        $this->assertEquals($expectedName, $actual->getName());
        $this->assertEquals($expectedKey, $actual->getKey());
        $this->assertEquals($expectedBlobEndpoint, $actual->getBlobEndpointUri());
        $this->assertEquals($expectedQueueEndpoint, $actual->getQueueEndpointUri());
        $this->assertEquals($expectedTableEndpoint, $actual->getTableEndpointUri());
    }

    /**
     * @covers \WindowsAzure\Common\Internal\StorageServiceSettings::createFromConnectionString
     * @covers \WindowsAzure\Common\Internal\StorageServiceSettings::init
     * @covers \WindowsAzure\Common\Internal\StorageServiceSettings::__construct
     * @covers \WindowsAzure\Common\Internal\StorageServiceSettings::_getDefaultServiceEndpoint
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::getValidator
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::optional
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::allRequired
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::setting
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::settingWithFunc
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::matchedSpecification
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::parseAndValidateKeys
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::noMatch
     * @covers \WindowsAzure\Common\Internal\StorageServiceSettings::_createStorageServiceSettings
     */
    public function testCreateFromConnectionStringWithQueueEndpointSpecified()
    {
        // Setup
        $protocol = 'https';
        $expectedName = $this->_accountName;
        $expectedKey = TestResources::KEY4;
        $expectedTableEndpoint = sprintf(Resources::SERVICE_URI_FORMAT, $protocol, $expectedName, Resources::TABLE_BASE_DNS_NAME);
        $expectedBlobEndpoint = sprintf(Resources::SERVICE_URI_FORMAT, $protocol, $expectedName, Resources::BLOB_BASE_DNS_NAME);
        $expectedQueueEndpoint = 'http://myprivatedns.com';
        $connectionString = "QueueEndpoint=$expectedQueueEndpoint;DefaultEndpointsProtocol=$protocol;AccountName=$expectedName;AccountKey=$expectedKey";

        // Test
        $actual = StorageServiceSettings::createFromConnectionString($connectionString);

        // Assert
        $this->assertEquals($expectedName, $actual->getName());
        $this->assertEquals($expectedKey, $actual->getKey());
        $this->assertEquals($expectedBlobEndpoint, $actual->getBlobEndpointUri());
        $this->assertEquals($expectedQueueEndpoint, $actual->getQueueEndpointUri());
        $this->assertEquals($expectedTableEndpoint, $actual->getTableEndpointUri());
    }

    /**
     * @covers \WindowsAzure\Common\Internal\StorageServiceSettings::createFromConnectionString
     * @covers \WindowsAzure\Common\Internal\StorageServiceSettings::init
     * @covers \WindowsAzure\Common\Internal\StorageServiceSettings::__construct
     * @covers \WindowsAzure\Common\Internal\StorageServiceSettings::_getDefaultServiceEndpoint
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::getValidator
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::optional
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::allRequired
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::setting
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::settingWithFunc
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::matchedSpecification
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::parseAndValidateKeys
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::noMatch
     * @covers \WindowsAzure\Common\Internal\StorageServiceSettings::_createStorageServiceSettings
     */
    public function testCreateFromConnectionStringWithQueueAndBlobEndpointSpecified()
    {
        // Setup
        $protocol = 'https';
        $expectedName = $this->_accountName;
        $expectedKey = TestResources::KEY4;
        $expectedTableEndpoint = sprintf(Resources::SERVICE_URI_FORMAT, $protocol, $expectedName, Resources::TABLE_BASE_DNS_NAME);
        $expectedBlobEndpoint = 'http://myprivateblobdns.com';
        $expectedQueueEndpoint = 'http://myprivatequeuedns.com';
        $connectionString = "QueueEndpoint=$expectedQueueEndpoint;DefaultEndpointsProtocol=$protocol;AccountName=$expectedName;AccountKey=$expectedKey;BlobEndpoint=$expectedBlobEndpoint";

        // Test
        $actual = StorageServiceSettings::createFromConnectionString($connectionString);

        // Assert
        $this->assertEquals($expectedName, $actual->getName());
        $this->assertEquals($expectedKey, $actual->getKey());
        $this->assertEquals($expectedBlobEndpoint, $actual->getBlobEndpointUri());
        $this->assertEquals($expectedQueueEndpoint, $actual->getQueueEndpointUri());
        $this->assertEquals($expectedTableEndpoint, $actual->getTableEndpointUri());
    }

    /**
     * @covers \WindowsAzure\Common\Internal\StorageServiceSettings::createFromConnectionString
     * @covers \WindowsAzure\Common\Internal\StorageServiceSettings::init
     * @covers \WindowsAzure\Common\Internal\StorageServiceSettings::__construct
     * @covers \WindowsAzure\Common\Internal\StorageServiceSettings::_getDefaultServiceEndpoint
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::getValidator
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::optional
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::allRequired
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::setting
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::settingWithFunc
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::matchedSpecification
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::parseAndValidateKeys
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::noMatch
     * @covers \WindowsAzure\Common\Internal\StorageServiceSettings::_createStorageServiceSettings
     */
    public function testCreateFromConnectionStringWithAutomaticMissingProtocolFail()
    {
        // Setup
        $expectedName = $this->_accountName;
        $expectedKey = TestResources::KEY4;
        $connectionString = "AccountName=$expectedName;AccountKey=$expectedKey";
        $expectedMsg = sprintf(Resources::MISSING_CONNECTION_STRING_SETTINGS, $connectionString);
        $this->setExpectedException('\RuntimeException', $expectedMsg);

        // Test
        StorageServiceSettings::createFromConnectionString($connectionString);
    }

    /**
     * @covers \WindowsAzure\Common\Internal\StorageServiceSettings::createFromConnectionString
     * @covers \WindowsAzure\Common\Internal\StorageServiceSettings::init
     * @covers \WindowsAzure\Common\Internal\StorageServiceSettings::__construct
     * @covers \WindowsAzure\Common\Internal\StorageServiceSettings::_getDefaultServiceEndpoint
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::getValidator
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::optional
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::allRequired
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::setting
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::settingWithFunc
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::matchedSpecification
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::parseAndValidateKeys
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::noMatch
     * @covers \WindowsAzure\Common\Internal\StorageServiceSettings::_createStorageServiceSettings
     */
    public function testCreateFromConnectionStringWithAutomaticMissingAccountNameFail()
    {
        // Setup
        $expectedKey = TestResources::KEY4;
        $connectionString = "DefaultEndpointsProtocol=http;AccountKey=$expectedKey";
        $expectedMsg = sprintf(Resources::MISSING_CONNECTION_STRING_SETTINGS, $connectionString);
        $this->setExpectedException('\RuntimeException', $expectedMsg);

        // Test
        StorageServiceSettings::createFromConnectionString($connectionString);
    }

    /**
     * @covers \WindowsAzure\Common\Internal\StorageServiceSettings::createFromConnectionString
     * @covers \WindowsAzure\Common\Internal\StorageServiceSettings::init
     * @covers \WindowsAzure\Common\Internal\StorageServiceSettings::__construct
     * @covers \WindowsAzure\Common\Internal\StorageServiceSettings::_getDefaultServiceEndpoint
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::getValidator
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::optional
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::allRequired
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::setting
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::settingWithFunc
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::matchedSpecification
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::parseAndValidateKeys
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::noMatch
     * @covers \WindowsAzure\Common\Internal\StorageServiceSettings::_createStorageServiceSettings
     */
    public function testCreateFromConnectionStringWithAutomaticCorruptedAccountKeyFail()
    {
        // Setup
        $expectedName = $this->_accountName;
        $invalidKey = '__A&*INVALID-@Key';
        $connectionString = "DefaultEndpointsProtocol=http;AccountName=$expectedName;AccountKey=$invalidKey";
        $expectedMsg = sprintf(Resources::INVALID_ACCOUNT_KEY_FORMAT, $invalidKey);
        $this->setExpectedException('\RuntimeException', $expectedMsg);

        // Test
        StorageServiceSettings::createFromConnectionString($connectionString);
    }

    /**
     * @covers \WindowsAzure\Common\Internal\StorageServiceSettings::createFromConnectionString
     * @covers \WindowsAzure\Common\Internal\StorageServiceSettings::init
     * @covers \WindowsAzure\Common\Internal\StorageServiceSettings::__construct
     * @covers \WindowsAzure\Common\Internal\StorageServiceSettings::_getDefaultServiceEndpoint
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::getValidator
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::atLeastOne
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::allRequired
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::setting
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::settingWithFunc
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::matchedSpecification
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::parseAndValidateKeys
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::noMatch
     * @covers \WindowsAzure\Common\Internal\StorageServiceSettings::_createStorageServiceSettings
     */
    public function testCreateFromConnectionStringWithQueueEndpointSpecified2()
    {
        // Setup
        $expectedName = $this->_accountName;
        $expectedKey = TestResources::KEY4;
        $expectedTableEndpoint = null;
        $expectedBlobEndpoint = null;
        $expectedQueueEndpoint = 'http://myprivatequeuedns.com';
        $connectionString = "QueueEndpoint=$expectedQueueEndpoint;AccountName=$expectedName;AccountKey=$expectedKey";

        // Test
        $actual = StorageServiceSettings::createFromConnectionString($connectionString);

        // Assert
        $this->assertEquals($expectedName, $actual->getName());
        $this->assertEquals($expectedKey, $actual->getKey());
        $this->assertEquals($expectedBlobEndpoint, $actual->getBlobEndpointUri());
        $this->assertEquals($expectedQueueEndpoint, $actual->getQueueEndpointUri());
        $this->assertEquals($expectedTableEndpoint, $actual->getTableEndpointUri());
    }

    /**
     * @covers \WindowsAzure\Common\Internal\StorageServiceSettings::createFromConnectionString
     * @covers \WindowsAzure\Common\Internal\StorageServiceSettings::init
     * @covers \WindowsAzure\Common\Internal\StorageServiceSettings::__construct
     * @covers \WindowsAzure\Common\Internal\StorageServiceSettings::_getDefaultServiceEndpoint
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::getValidator
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::atLeastOne
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::allRequired
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::setting
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::settingWithFunc
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::matchedSpecification
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::parseAndValidateKeys
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::noMatch
     * @covers \WindowsAzure\Common\Internal\StorageServiceSettings::_createStorageServiceSettings
     */
    public function testCreateFromConnectionStringWithQueueAndBlobEndpointSpecified2()
    {
        // Setup
        $expectedName = $this->_accountName;
        $expectedKey = TestResources::KEY4;
        $expectedTableEndpoint = null;
        $expectedBlobEndpoint = 'http://myprivateblobdns.com';
        $expectedQueueEndpoint = 'http://myprivatequeuedns.com';
        $connectionString = "QueueEndpoint=$expectedQueueEndpoint;BlobEndpoint=$expectedBlobEndpoint;AccountName=$expectedName;AccountKey=$expectedKey";

        // Test
        $actual = StorageServiceSettings::createFromConnectionString($connectionString);

        // Assert
        $this->assertEquals($expectedName, $actual->getName());
        $this->assertEquals($expectedKey, $actual->getKey());
        $this->assertEquals($expectedBlobEndpoint, $actual->getBlobEndpointUri());
        $this->assertEquals($expectedQueueEndpoint, $actual->getQueueEndpointUri());
        $this->assertEquals($expectedTableEndpoint, $actual->getTableEndpointUri());
    }

    /**
     * @covers \WindowsAzure\Common\Internal\StorageServiceSettings::createFromConnectionString
     * @covers \WindowsAzure\Common\Internal\StorageServiceSettings::init
     * @covers \WindowsAzure\Common\Internal\StorageServiceSettings::__construct
     * @covers \WindowsAzure\Common\Internal\StorageServiceSettings::_getDefaultServiceEndpoint
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::getValidator
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::atLeastOne
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::allRequired
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::setting
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::settingWithFunc
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::matchedSpecification
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::parseAndValidateKeys
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::noMatch
     * @covers \WindowsAzure\Common\Internal\StorageServiceSettings::_createStorageServiceSettings
     */
    public function testCreateFromConnectionStringWithQueueAndBlobAndTableEndpointSpecfied()
    {
        // Setup
        $expectedName = $this->_accountName;
        $expectedKey = TestResources::KEY4;
        $expectedTableEndpoint = 'http://myprivatetabledns.com';
        $expectedBlobEndpoint = 'http://myprivateblobdns.com';
        $expectedQueueEndpoint = 'http://myprivatequeuedns.com';
        $connectionString = "TableEndpoint=$expectedTableEndpoint;QueueEndpoint=$expectedQueueEndpoint;BlobEndpoint=$expectedBlobEndpoint;AccountName=$expectedName;AccountKey=$expectedKey";

        // Test
        $actual = StorageServiceSettings::createFromConnectionString($connectionString);

        // Assert
        $this->assertEquals($expectedName, $actual->getName());
        $this->assertEquals($expectedKey, $actual->getKey());
        $this->assertEquals($expectedBlobEndpoint, $actual->getBlobEndpointUri());
        $this->assertEquals($expectedQueueEndpoint, $actual->getQueueEndpointUri());
        $this->assertEquals($expectedTableEndpoint, $actual->getTableEndpointUri());
    }

    /**
     * @covers \WindowsAzure\Common\Internal\StorageServiceSettings::createFromConnectionString
     * @covers \WindowsAzure\Common\Internal\StorageServiceSettings::init
     * @covers \WindowsAzure\Common\Internal\StorageServiceSettings::__construct
     * @covers \WindowsAzure\Common\Internal\StorageServiceSettings::_getDefaultServiceEndpoint
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::getValidator
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::atLeastOne
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::allRequired
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::setting
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::settingWithFunc
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::matchedSpecification
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::parseAndValidateKeys
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::noMatch
     * @covers \WindowsAzure\Common\Internal\StorageServiceSettings::_createStorageServiceSettings
     */
    public function testCreateFromConnectionStringMissingServicesEndpointsFail()
    {
        // Setup
        $expectedName = $this->_accountName;
        $expectedKey = TestResources::KEY4;
        $connectionString = "AccountName=$expectedName;AccountKey=$expectedKey";
        $expectedMsg = sprintf(Resources::MISSING_CONNECTION_STRING_SETTINGS, $connectionString);
        $this->setExpectedException('\RuntimeException', $expectedMsg);

        // Test
        $actual = StorageServiceSettings::createFromConnectionString($connectionString);

        // Assert
        $this->assertNull($actual);
    }

    /**
     * @covers \WindowsAzure\Common\Internal\StorageServiceSettings::createFromConnectionString
     * @covers \WindowsAzure\Common\Internal\StorageServiceSettings::init
     * @covers \WindowsAzure\Common\Internal\StorageServiceSettings::__construct
     * @covers \WindowsAzure\Common\Internal\StorageServiceSettings::_getDefaultServiceEndpoint
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::getValidator
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::optional
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::allRequired
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::setting
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::settingWithFunc
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::matchedSpecification
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::parseAndValidateKeys
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::noMatch
     * @covers \WindowsAzure\Common\Internal\StorageServiceSettings::_createStorageServiceSettings
     */
    public function testCreateFromConnectionStringWithInvalidBlobEndpointUriFail()
    {
        // Setup
        $expectedName = $this->_accountName;
        $expectedKey = TestResources::KEY4;
        $invalidUri = 'https://www.invalid_domain';
        $connectionString = "BlobEndpoint=$invalidUri;DefaultEndpointsProtocol=http;AccountName=$expectedName;AccountKey=$expectedKey";
        $expectedMsg = sprintf(Resources::INVALID_CONFIG_URI, $invalidUri);
        $this->setExpectedException('\RuntimeException', $expectedMsg);

        // Test
        StorageServiceSettings::createFromConnectionString($connectionString);
    }

    /**
     * @covers \WindowsAzure\Common\Internal\StorageServiceSettings::createFromConnectionString
     * @covers \WindowsAzure\Common\Internal\StorageServiceSettings::init
     * @covers \WindowsAzure\Common\Internal\StorageServiceSettings::__construct
     * @covers \WindowsAzure\Common\Internal\StorageServiceSettings::_getDefaultServiceEndpoint
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::getValidator
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::optional
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::allRequired
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::setting
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::settingWithFunc
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::matchedSpecification
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::parseAndValidateKeys
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::noMatch
     * @covers \WindowsAzure\Common\Internal\StorageServiceSettings::_createStorageServiceSettings
     */
    public function testCreateFromConnectionStringWithInvalidSettingKeyFail()
    {
        // Setup
        $expectedName = $this->_accountName;
        $expectedKey = TestResources::KEY4;
        $validKeys = [];
        $validKeys[] = Resources::USE_DEVELOPMENT_STORAGE_NAME;
        $validKeys[] = Resources::DEVELOPMENT_STORAGE_PROXY_URI_NAME;
        $validKeys[] = Resources::DEFAULT_ENDPOINTS_PROTOCOL_NAME;
        $validKeys[] = Resources::ACCOUNT_NAME_NAME;
        $validKeys[] = Resources::ACCOUNT_KEY_NAME;
        $validKeys[] = Resources::BLOB_ENDPOINT_NAME;
        $validKeys[] = Resources::QUEUE_ENDPOINT_NAME;
        $validKeys[] = Resources::TABLE_ENDPOINT_NAME;
        $invalidKey = 'InvalidKey';
        $connectionString = "DefaultEndpointsProtocol=http;$invalidKey=MyValue;AccountName=$expectedName;AccountKey=$expectedKey";
        $expectedMsg = sprintf(
            Resources::INVALID_CONNECTION_STRING_SETTING_KEY,
            $invalidKey,
            implode("\n", $validKeys)
        );
        $this->setExpectedException('\RuntimeException', $expectedMsg);

        // Test
        StorageServiceSettings::createFromConnectionString($connectionString);
    }

    /**
     * @covers \WindowsAzure\Common\Internal\StorageServiceSettings::createFromConnectionString
     * @covers \WindowsAzure\Common\Internal\StorageServiceSettings::init
     * @covers \WindowsAzure\Common\Internal\StorageServiceSettings::__construct
     * @covers \WindowsAzure\Common\Internal\StorageServiceSettings::_getDefaultServiceEndpoint
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::getValidator
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::optional
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::allRequired
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::setting
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::settingWithFunc
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::matchedSpecification
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::parseAndValidateKeys
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::noMatch
     * @covers \WindowsAzure\Common\Internal\StorageServiceSettings::_createStorageServiceSettings
     */
    public function testCreateFromConnectionStringWithCaseInsensitive()
    {
        // Setup
        $protocol = 'https';
        $expectedName = $this->_accountName;
        $expectedKey = TestResources::KEY4;
        $connectionString = "defaultendpointsprotocol=$protocol;accountname=$expectedName;accountkey=$expectedKey";
        $expectedBlobEndpoint = sprintf(Resources::SERVICE_URI_FORMAT, $protocol, $expectedName, Resources::BLOB_BASE_DNS_NAME);
        $expectedQueueEndpoint = sprintf(Resources::SERVICE_URI_FORMAT, $protocol, $expectedName, Resources::QUEUE_BASE_DNS_NAME);
        $expectedTableEndpoint = sprintf(Resources::SERVICE_URI_FORMAT, $protocol, $expectedName, Resources::TABLE_BASE_DNS_NAME);

        // Test
        $actual = StorageServiceSettings::createFromConnectionString($connectionString);

        // Assert
        $this->assertEquals($expectedName, $actual->getName());
        $this->assertEquals($expectedKey, $actual->getKey());
        $this->assertEquals($expectedBlobEndpoint, $actual->getBlobEndpointUri());
        $this->assertEquals($expectedQueueEndpoint, $actual->getQueueEndpointUri());
        $this->assertEquals($expectedTableEndpoint, $actual->getTableEndpointUri());
    }
}
