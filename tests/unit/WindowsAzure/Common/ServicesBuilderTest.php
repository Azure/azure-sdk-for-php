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
 * @package   Tests\Unit\WindowsAzure\Common
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */

namespace Tests\Unit\WindowsAzure\Common;
use Tests\Framework\TestResources;
use WindowsAzure\Common\Internal\Resources;
use WindowsAzure\Common\Internal\MediaServicesSettings;
use WindowsAzure\Common\ServicesBuilder;
use WindowsAzure\Common\Configuration;
use WindowsAzure\Common\Internal\InvalidArgumentTypeException;

/**
 * Unit tests for class ServicesBuilder
 *
 * @category  Microsoft
 * @package   Tests\Unit\WindowsAzure\Common
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: 0.4.0_2014-01
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
class ServicesBuilderTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers WindowsAzure\Common\ServicesBuilder::createQueueService
     * @covers WindowsAzure\Common\ServicesBuilder::httpClient
     * @covers WindowsAzure\Common\ServicesBuilder::serializer
     * @covers WindowsAzure\Common\ServicesBuilder::queueAuthenticationScheme
     */
    public function testBuildForQueue()
    {
        // Setup
        $builder = new ServicesBuilder();

        // Test
        $queueRestProxy = $builder->createQueueService(TestResources::getWindowsAzureStorageServicesConnectionString());

        // Assert
        $this->assertInstanceOf('WindowsAzure\Queue\Internal\IQueue', $queueRestProxy);
    }

    /**
     * @covers WindowsAzure\Common\ServicesBuilder::createBlobService
     * @covers WindowsAzure\Common\ServicesBuilder::httpClient
     * @covers WindowsAzure\Common\ServicesBuilder::serializer
     * @covers WindowsAzure\Common\ServicesBuilder::blobAuthenticationScheme
     */
    public function testBuildForBlob()
    {
        // Setup
        $builder = new ServicesBuilder();

        // Test
        $blobRestProxy = $builder->createBlobService(TestResources::getWindowsAzureStorageServicesConnectionString());

        // Assert
        $this->assertInstanceOf('WindowsAzure\Blob\Internal\IBlob', $blobRestProxy);
    }

    /**
     * @covers WindowsAzure\Common\ServicesBuilder::createTableService
     * @covers WindowsAzure\Common\ServicesBuilder::httpClient
     * @covers WindowsAzure\Common\ServicesBuilder::serializer
     * @covers WindowsAzure\Common\ServicesBuilder::mimeSerializer
     * @covers WindowsAzure\Common\ServicesBuilder::atomSerializer
     * @covers WindowsAzure\Common\ServicesBuilder::tableAuthenticationScheme
     */
    public function testBuildForTable()
    {
        // Setup
        $builder = new ServicesBuilder();

        // Test
        $tableRestProxy = $builder->createTableService(TestResources::getWindowsAzureStorageServicesConnectionString());

        // Assert
        $this->assertInstanceOf('WindowsAzure\Table\Internal\ITable', $tableRestProxy);
    }

    /**
     * @covers WindowsAzure\Common\ServicesBuilder::createServiceManagementService
     * @covers WindowsAzure\Common\ServicesBuilder::httpClient
     * @covers WindowsAzure\Common\ServicesBuilder::serializer
     */
    public function testBuildForServiceManagement()
    {
        // Setup
        $builder = new ServicesBuilder();

        // Test
        $serviceManagementRestProxy = $builder->createServiceManagementService(TestResources::getServiceManagementConnectionString());

        // Assert
        $this->assertInstanceOf('WindowsAzure\ServiceManagement\Internal\IServiceManagement', $serviceManagementRestProxy);
    }

    /**
     * @covers WindowsAzure\Common\ServicesBuilder::createServiceBusService
     * @covers WindowsAzure\Common\ServicesBuilder::createWrapService
     * @covers WindowsAzure\Common\ServicesBuilder::httpClient
     * @covers WindowsAzure\Common\ServicesBuilder::serializer
     */
    public function testBuildForServiceBus()
    {
        // Setup
        $builder = new ServicesBuilder();

        // Test
        $serviceBusRestProxy = $builder->createServiceBusService(TestResources::getServiceBusConnectionString());

        // Assert
        $this->assertInstanceOf('WindowsAzure\ServiceBus\Internal\IServiceBus', $serviceBusRestProxy);
    }

    /**
     * @covers WindowsAzure\Common\ServicesBuilder::createMediaServicesService
     */
    public function testBuildForMediaServices()
    {
        // Setup
        $builder            = new ServicesBuilder();
        $connection         = TestResources::getMediaServicesConnectionParameters();
        $settings           = new MediaServicesSettings($connection['accountName'], $connection['accessKey']);

        // Test
        $mediaServicesRestProxy = $builder->createMediaServicesService($settings);

        // Assert
        $this->assertInstanceOf('WindowsAzure\MediaServices\Internal\IMediaServices', $mediaServicesRestProxy);
    }

    /**
     * @covers WindowsAzure\Common\ServicesBuilder::getInstance
     */
    public function testGetInstance()
    {
        // Test
        $actual = ServicesBuilder::getInstance();

        // Assert
        $this->assertInstanceOf('WindowsAzure\Common\ServicesBuilder', $actual);
    }
}