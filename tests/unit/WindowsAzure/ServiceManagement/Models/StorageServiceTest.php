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

namespace Tests\unit\WindowsAzure\ServiceManagement\Models;

use WindowsAzure\ServiceManagement\Models\StorageService;
use WindowsAzure\Common\Internal\Resources;

/**
 * Unit tests for class StorageService.
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
class StorageServiceTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers \WindowsAzure\ServiceManagement\Models\StorageService::__construct
     */
    public function test__construct()
    {
        // Setup
        $expectedGroup = 'group';
        $expectedName = 'name';
        $raw = [
            Resources::XTAG_AFFINITY_GROUP => $expectedGroup,
            Resources::XTAG_SERVICE_NAME => $expectedName,
        ];

        // Test
        $storageService = new StorageService($raw);

        // Assert
        $this->assertEquals($expectedGroup, $storageService->getAffinityGroup());
        $this->assertEquals($expectedName, $storageService->getName());

        return $storageService;
    }

    /**
     * @covers \WindowsAzure\ServiceManagement\Models\StorageService::setAffinityGroup
     * @covers \WindowsAzure\ServiceManagement\Models\StorageService::getAffinityGroup
     */
    public function testSetAffinityGroup()
    {
        // Setup
        $storageService = new StorageService();
        $expected = 'MyGroup';

        // Test
        $storageService->setAffinityGroup($expected);

        // Assert
        $this->assertEquals($expected, $storageService->getAffinityGroup());
    }

    /**
     * @covers \WindowsAzure\ServiceManagement\Models\StorageService::setBlobEndpointUri
     * @covers \WindowsAzure\ServiceManagement\Models\StorageService::getBlobEndpointUri
     */
    public function testSetBlobEndpointUri()
    {
        // Setup
        $expected = 'endpoint uri';
        $result = new StorageService();

        // Test
        $result->setBlobEndpointUri($expected);

        // Assert
        $this->assertEquals($expected, $result->getBlobEndpointUri());
    }

    /**
     * @covers \WindowsAzure\ServiceManagement\Models\StorageService::setQueueEndpointUri
     * @covers \WindowsAzure\ServiceManagement\Models\StorageService::getQueueEndpointUri
     */
    public function testSetQueueEndpointUri()
    {
        // Setup
        $expected = 'endpoint uri';
        $result = new StorageService();

        // Test
        $result->setQueueEndpointUri($expected);

        // Assert
        $this->assertEquals($expected, $result->getQueueEndpointUri());
    }

    /**
     * @covers \WindowsAzure\ServiceManagement\Models\StorageService::setTableEndpointUri
     * @covers \WindowsAzure\ServiceManagement\Models\StorageService::getTableEndpointUri
     */
    public function testSetTableEndpointUri()
    {
        // Setup
        $expected = 'endpoint uri';
        $result = new StorageService();

        // Test
        $result->setTableEndpointUri($expected);

        // Assert
        $this->assertEquals($expected, $result->getTableEndpointUri());
    }

    /**
     * @covers \WindowsAzure\ServiceManagement\Models\StorageService::setStatus
     * @covers \WindowsAzure\ServiceManagement\Models\StorageService::getStatus
     */
    public function testSetStatus()
    {
        // Setup
        $expected = 'status';
        $result = new StorageService();

        // Test
        $result->setStatus($expected);

        // Assert
        $this->assertEquals($expected, $result->getStatus());
    }
}
