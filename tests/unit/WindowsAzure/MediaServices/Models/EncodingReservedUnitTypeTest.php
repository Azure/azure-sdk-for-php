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
 * @copyright Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 *
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */

namespace Tests\unit\WindowsAzure\MediaServices\Models;

use WindowsAzure\MediaServices\Models\EncodingReservedUnitType;
use WindowsAzure\MediaServices\Models\EncodingReservedUnit;

/**
 * Unit Tests for EncodingReservedUnitType.
 *
 * @category  Microsoft
 *
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 *
 * @version   Release: 0.5.0_2016-11
 *
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
class EncodingReservedUnitTypeTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers \WindowsAzure\MediaServices\Models\EncodingReservedUnit::createFromOptions
     * @covers \WindowsAzure\MediaServices\Models\EncodingReservedUnit::fromArray
     * @covers \WindowsAzure\MediaServices\Models\EncodingReservedUnit::__construct
     */
    public function testCreateFromOptions()
    {

        // Setup
        $testAccountId = 'testAccountId';
        $options = [
                'AccountId' => $testAccountId,
                'ReservedUnitType' => EncodingReservedUnitType::S1,
                'MaxReservableUnits' => 30,
                'CurrentReservedUnits' => 5,
        ];

        // Test
        $encodingReservedUnitType = EncodingReservedUnit::createFromOptions($options);

        // Assert
        $this->assertEquals($testAccountId, $encodingReservedUnitType->getAccountId());
        $this->assertEquals($options['AccountId'], $encodingReservedUnitType->getAccountId());
        $this->assertEquals($options['ReservedUnitType'], $encodingReservedUnitType->getReservedUnitType());
        $this->assertEquals($options['MaxReservableUnits'], $encodingReservedUnitType->getMaxReservableUnits());
        $this->assertEquals($options['CurrentReservedUnits'], $encodingReservedUnitType->getCurrentReservedUnits());
    }

    /**
     * @covers \WindowsAzure\MediaServices\Models\EncodingReservedUnit::getAccountId
     * @covers \WindowsAzure\MediaServices\Models\EncodingReservedUnit::setAccountId
     */
    public function testGetSetAccountId()
    {

        // Setup
        $expected = 'testNameForAssetDeliveryPolicy';
        $encodingReservedUnitType = new EncodingReservedUnit();

        // Test
        $encodingReservedUnitType->setAccountId($expected);
        $result = $encodingReservedUnitType->getAccountId();

        // Assert
        $this->assertEquals($expected, $result);
    }

    /**
     * @covers \WindowsAzure\MediaServices\Models\EncodingReservedUnit::getReservedUnitType
     * @covers \WindowsAzure\MediaServices\Models\EncodingReservedUnit::setReservedUnitType
     */
    public function testGetSetReservedUnitType()
    {

        // Setup
        $expected = EncodingReservedUnitType::S3;
        $encodingReservedUnitType = new EncodingReservedUnit();

        // Test
        $encodingReservedUnitType->setReservedUnitType($expected);
        $result = $encodingReservedUnitType->getReservedUnitType();

        // Assert
        $this->assertEquals($expected, $result);
    }

    /**
     * @covers \WindowsAzure\MediaServices\Models\EncodingReservedUnit::getMaxReservableUnits
     * @covers \WindowsAzure\MediaServices\Models\EncodingReservedUnit::setMaxReservableUnits
     */
    public function testGetSetMaxReservableUnits()
    {

        // Setup
        $expected = 10;
        $encodingReservedUnitType = new EncodingReservedUnit();

        // Test
        $encodingReservedUnitType->setMaxReservableUnits($expected);
        $result = $encodingReservedUnitType->getMaxReservableUnits();

        // Assert
        $this->assertEquals($expected, $result);
    }

    /**
     * @covers \WindowsAzure\MediaServices\Models\EncodingReservedUnit::getCurrentReservedUnits
     * @covers \WindowsAzure\MediaServices\Models\EncodingReservedUnit::setCurrentReservedUnits
     */
    public function testGetSetCurrentReservedUnits()
    {

        // Setup
        $expected = 5;
        $encodingReservedUnitType = new EncodingReservedUnit();

        // Test
        $encodingReservedUnitType->setCurrentReservedUnits($expected);
        $result = $encodingReservedUnitType->getCurrentReservedUnits();

        // Assert
        $this->assertEquals($expected, $result);
    }
}
