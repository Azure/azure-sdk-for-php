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

namespace Tests\unit\WindowsAzure\Common\Models;

use WindowsAzure\Common\Models\RetentionPolicy;
use Tests\Framework\TestResources;
use WindowsAzure\Common\Internal\Utilities;

/**
 * Unit tests for class RetentionPolicy.
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
class RetentionPolicyTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers \WindowsAzure\Common\Models\RetentionPolicy::create
     */
    public function testCreate()
    {
        // Setup
        $sample = TestResources::getServicePropertiesSample();
        $expectedEnabled = Utilities::toBoolean($sample['Logging']['RetentionPolicy']['Enabled']);
        $expectedDays = intval($sample['Logging']['RetentionPolicy']['Days']);

        // Test
        $actual = RetentionPolicy::create($sample['Logging']['RetentionPolicy']);

        // Assert
        $this->assertEquals($expectedEnabled, $actual->getEnabled());
        $this->assertEquals($expectedDays, $actual->getDays());
    }

    /**
     * @covers \WindowsAzure\Common\Models\RetentionPolicy::getEnabled
     */
    public function testGetEnabled()
    {
        // Setup
        $sample = TestResources::getServicePropertiesSample();
        $retentionPolicy = new RetentionPolicy();
        $expected = Utilities::toBoolean($sample['Logging']['RetentionPolicy']['Enabled']);
        $retentionPolicy->setEnabled($expected);

        // Test
        $actual = $retentionPolicy->getEnabled();

        // Assert
        $this->assertEquals($expected, $actual);
    }

    /**
     * @covers \WindowsAzure\Common\Models\RetentionPolicy::setEnabled
     */
    public function testSetEnabled()
    {
        // Setup
        $sample = TestResources::getServicePropertiesSample();
        $retentionPolicy = new RetentionPolicy();
        $expected = Utilities::toBoolean($sample['Logging']['RetentionPolicy']['Enabled']);

        // Test
        $retentionPolicy->setEnabled($expected);

        // Assert
        $actual = $retentionPolicy->getEnabled();
        $this->assertEquals($expected, $actual);
    }

    /**
     * @covers \WindowsAzure\Common\Models\RetentionPolicy::getDays
     */
    public function testGetDays()
    {
        // Setup
        $sample = TestResources::getServicePropertiesSample();
        $retentionPolicy = new RetentionPolicy();
        $expected = intval($sample['Logging']['RetentionPolicy']['Days']);
        $retentionPolicy->setDays($expected);

        // Test
        $actual = $retentionPolicy->getDays();

        // Assert
        $this->assertEquals($expected, $actual);
    }

    /**
     * @covers \WindowsAzure\Common\Models\RetentionPolicy::setDays
     */
    public function testSetDays()
    {
        // Setup
        $sample = TestResources::getServicePropertiesSample();
        $retentionPolicy = new RetentionPolicy();
        $expected = intval($sample['Logging']['RetentionPolicy']['Days']);

        // Test
        $retentionPolicy->setDays($expected);

        // Assert
        $actual = $retentionPolicy->getDays();
        $this->assertEquals($expected, $actual);
    }

    /**
     * @covers \WindowsAzure\Common\Models\RetentionPolicy::toArray
     */
    public function testToArray()
    {
        // Setup
        $sample = TestResources::getServicePropertiesSample();
        $retentionPolicy = RetentionPolicy::create($sample['Logging']['RetentionPolicy']);
        $expected = [
            'Enabled' => $sample['Logging']['RetentionPolicy']['Enabled'],
            'Days' => $sample['Logging']['RetentionPolicy']['Days'],
        ];

        // Test
        $actual = $retentionPolicy->toArray();

        // Assert
        $this->assertEquals($expected, $actual);
    }

    /**
     * @covers \WindowsAzure\Common\Models\RetentionPolicy::toArray
     */
    public function testToArrayWithoutDays()
    {
        // Setup
        $sample = TestResources::getServicePropertiesSample();
        $retentionPolicy = RetentionPolicy::create($sample['Logging']['RetentionPolicy']);
        $expected = ['Enabled' => $sample['Logging']['RetentionPolicy']['Enabled']];
        $retentionPolicy->setDays(null);

        // Test
        $actual = $retentionPolicy->toArray();

        // Assert
        $this->assertEquals($expected, $actual);
    }
}
