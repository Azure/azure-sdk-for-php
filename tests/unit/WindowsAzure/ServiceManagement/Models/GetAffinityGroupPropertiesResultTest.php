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

use WindowsAzure\ServiceManagement\Models\GetAffinityGroupPropertiesResult;
use WindowsAzure\ServiceManagement\Models\AffinityGroup;

/**
 * Unit tests for class GetAffinityGroupPropertiesResult.
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
class GetAffinityGroupPropertiesResultTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers \WindowsAzure\ServiceManagement\Models\GetAffinityGroupPropertiesResult::create
     */
    public function testCreate()
    {
        // Setup
        $array = [
            'HostedServices' => [
                'Url' => 'url',
                'ServiceName' => 'name',
            ],
            'StorageServices' => [
                'Url' => 'url',
                'ServiceName' => 'name',
            ],
        ];

        // Test
        $actual = GetAffinityGroupPropertiesResult::create($array);

        // Assert
        $this->assertCount(1, $actual->getHostedServices());
        $this->assertCount(1, $actual->getStorageServices());
    }

    /**
     * @covers \WindowsAzure\ServiceManagement\Models\GetAffinityGroupPropertiesResult::setAffinityGroup
     * @covers \WindowsAzure\ServiceManagement\Models\GetAffinityGroupPropertiesResult::getAffinityGroup
     */
    public function testSetAffinityGroup()
    {
        // Setup
        $expected = new AffinityGroup();
        $result = new GetAffinityGroupPropertiesResult();

        // Test
        $result->setAffinityGroup($expected);

        // Assert
        $this->assertEquals($expected, $result->getAffinityGroup());
    }

    /**
     * @covers \WindowsAzure\ServiceManagement\Models\GetAffinityGroupPropertiesResult::setHostedServices
     * @covers \WindowsAzure\ServiceManagement\Models\GetAffinityGroupPropertiesResult::getHostedServices
     */
    public function testSetHostedServices()
    {
        // Setup
        $expected = [];
        $result = new GetAffinityGroupPropertiesResult();

        // Test
        $result->setHostedServices($expected);

        // Assert
        $this->assertEquals($expected, $result->getHostedServices());
    }

    /**
     * @covers \WindowsAzure\ServiceManagement\Models\GetAffinityGroupPropertiesResult::setStorageServices
     * @covers \WindowsAzure\ServiceManagement\Models\GetAffinityGroupPropertiesResult::getStorageServices
     */
    public function testSetStorageServices()
    {
        // Setup
        $expected = [];
        $result = new GetAffinityGroupPropertiesResult();

        // Test
        $result->setStorageServices($expected);

        // Assert
        $this->assertEquals($expected, $result->getStorageServices());
    }
}
