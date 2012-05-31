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
 * @package   Tests\Unit\WindowsAzure\ServiceBus\Models
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */

namespace Tests\Unit\WindowsAzure\ServiceBus\Models;
use WindowsAzure\ServiceBus\Models\BrokerProperties;
use WindowsAzure\ServiceBus\Models\BrokeredMessage;

/**
 * Unit tests for class WrapAccessTokenResult
 *
 * @category  Microsoft
 * @package   Tests\Unit\WindowsAzure\ServiceBus\Models
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
class BrokerPropertiesTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers WindowsAzure\ServiceBus\Models\BrokerProperties::__construct
     */
    public function testBrokerPropertiesConstructor()
    {
        // Test
        $brokerProperties = new BrokerProperties();
        
        // Assert
        $this->assertNotNull($brokerProperties);
    }

    /** 
     * @covers WindowsAzure\ServiceBus\Models\BrokerProperties::getCorrelationId
     * @covers WindowsAzure\ServiceBus\Models\BrokerProperties::setCorrelationId
     */
    public function testGetSetCorrelationId() {
        // Setup
        $expected = 'testCorrelationId';
        $brokerProperties = new BrokerProperties();

        // Test
        $brokerProperties->setCorrelationId($expected);
        $actual = $brokerProperties->getCorrelationId();

        // Assert 
        $this->assertEquals(
            $expected,
            $actual
        );

    }

    /** 
     * @covers WindowsAzure\ServiceBus\Models\BrokerProperties::getSessionId
     * @covers WindowsAzure\ServiceBus\Models\BrokerProperties::setSessionId
     */
    public function testGetSetSessionId() {
        // Setup
        $expected = 'testSessionId';
        $brokerProperties = new BrokerProperties();

        // Test
        $brokerProperties->setSessionId($expected);
        $actual = $brokerProperties->getSessionId();

        // Assert 
        $this->assertEquals(
            $expected,
            $actual
        );

    }

    /** 
     * @covers WindowsAzure\ServiceBus\Models\BrokerProperties::getDeliveryCount
     * @covers WindowsAzure\ServiceBus\Models\BrokerProperties::setDeliveryCount
     */
    public function testGetSetDeliveryCount() {
        // Setup
        $expected = 100;
        $brokerProperties = new BrokerProperties();

        // Test
        $brokerProperties->setDeliveryCount($expected);
        $actual = $brokerProperties->getDeliveryCount();

        // Assert 
        $this->assertEquals(
            $expected,
            $actual
        );

    }


    /** 
     * @covers WindowsAzure\ServiceBus\Models\BrokerProperties::getLockedUntilUtc
     * @covers WindowsAzure\ServiceBus\Models\BrokerProperties::setLockedUntilUtc
     */
    public function testGetSetLockedUntilUtc() {
        // Setup
        $expected = 'testLockedUntilUtc';
        $brokerProperties = new BrokerProperties();

        // Test
        $brokerProperties->setLockedUntilUtc($expected);
        $actual = $brokerProperties->getLockedUntilUtc();

        // Assert 
        $this->assertEquals(
            $expected,
            $actual
        );

    }


    /** 
     * @covers WindowsAzure\ServiceBus\Models\BrokerProperties::getLockToken
     * @covers WindowsAzure\ServiceBus\Models\BrokerProperties::setLockToken
     */
    public function testGetSetLockToken() {
        // Setup
        $expected = 'testLockToken';
        $brokerProperties = new BrokerProperties();

        // Test
        $brokerProperties->setLockToken($expected);
        $actual = $brokerProperties->getLockToken();

        // Assert 
        $this->assertEquals(
            $expected,
            $actual
        );

    }


    /** 
     * @covers WindowsAzure\ServiceBus\Models\BrokerProperties::getMessageId
     * @covers WindowsAzure\ServiceBus\Models\BrokerProperties::setMessageId
     */
    public function testGetSetMessageId() {
        // Setup
        $expected = 'testMessageId';
        $brokerProperties = new BrokerProperties();

        // Test
        $brokerProperties->setMessageId($expected);
        $actual = $brokerProperties->getMessageId();

        // Assert 
        $this->assertEquals(
            $expected,
            $actual
        );

    }


    /** 
     * @covers WindowsAzure\ServiceBus\Models\BrokerProperties::getLabel
     * @covers WindowsAzure\ServiceBus\Models\BrokerProperties::setLabel
     */
    public function testGetSetLabel() {
        // Setup
        $expected = 'testLabel';
        $brokerProperties = new BrokerProperties();

        // Test
        $brokerProperties->setLabel($expected);
        $actual = $brokerProperties->getLabel();

        // Assert 
        $this->assertEquals(
            $expected,
            $actual
        );

    }


    /** 
     * @covers WindowsAzure\ServiceBus\Models\BrokerProperties::getReplyTo
     * @covers WindowsAzure\ServiceBus\Models\BrokerProperties::setReplyTo
     */
    public function testGetSetReplyTo() {
        // Setup
        $expected = 'testReplyTo';
        $brokerProperties = new BrokerProperties();

        // Test
        $brokerProperties->setReplyTo($expected);
        $actual = $brokerProperties->getReplyTo();

        // Assert 
        $this->assertEquals(
            $expected,
            $actual
        );

    }


    /** 
     * @covers WindowsAzure\ServiceBus\Models\BrokerProperties::getSequenceNumber
     * @covers WindowsAzure\ServiceBus\Models\BrokerProperties::setSequenceNumber
     */
    public function testGetSetSequenceNumber() {
        // Setup
        $expected = 58;
        $brokerProperties = new BrokerProperties();

        // Test
        $brokerProperties->setSequenceNumber($expected);
        $actual = $brokerProperties->getSequenceNumber();

        // Assert 
        $this->assertEquals(
            $expected,
            $actual
        );

    }


    /** 
     * @covers WindowsAzure\ServiceBus\Models\BrokerProperties::getTimeToLive
     * @covers WindowsAzure\ServiceBus\Models\BrokerProperties::setTimeToLive
     */
    public function testGetSetTimeToLive() {
        // Setup
        $expected = 'testTimeToLive';
        $brokerProperties = new BrokerProperties();

        // Test
        $brokerProperties->setTimeToLive($expected);
        $actual = $brokerProperties->getTimeToLive();

        // Assert 
        $this->assertEquals(
            $expected,
            $actual
        );

    }


    /** 
     * @covers WindowsAzure\ServiceBus\Models\BrokerProperties::getTo
     * @covers WindowsAzure\ServiceBus\Models\BrokerProperties::setTo
     */
    public function testGetSetTo() {
        // Setup
        $expected = 'testTo';
        $brokerProperties = new BrokerProperties();

        // Test
        $brokerProperties->setTo($expected);
        $actual = $brokerProperties->getTo();

        // Assert 
        $this->assertEquals(
            $expected,
            $actual
        );

    }


    /** 
     * @covers WindowsAzure\ServiceBus\Models\BrokerProperties::getScheduleEnqueuTimeUtc
     * @covers WindowsAzure\ServiceBus\Models\BrokerProperties::setScheduleEnqueuTimeUtc
     */
    public function testGetSetScheduleEnqueuTimeUtc() {
        // Setup
        $expected = 'testScheduleEnqueuTimeUtc';
        $brokerProperties = new BrokerProperties();

        // Test
        $brokerProperties->setScheduleEnqueuTimeUtc($expected);
        $actual = $brokerProperties->getScheduleEnqueuTimeUtc();

        // Assert 
        $this->assertEquals(
            $expected,
            $actual
        );

    }


    /** 
     * @covers WindowsAzure\ServiceBus\Models\BrokerProperties::getReplyToSessionId
     * @covers WindowsAzure\ServiceBus\Models\BrokerProperties::setReplyToSessionId
     */
    public function testGetSetReplyToSessionId() {
        // Setup
        $expected = 'testReplyToSessionId';
        $brokerProperties = new BrokerProperties();

        // Test
        $brokerProperties->setReplyToSessionId($expected);
        $actual = $brokerProperties->getReplyToSessionId();

        // Assert 
        $this->assertEquals(
            $expected,
            $actual
        );

    }


    /** 
     * @covers WindowsAzure\ServiceBus\Models\BrokerProperties::getMessageLocation
     * @covers WindowsAzure\ServiceBus\Models\BrokerProperties::setMessageLocation
     */
    public function testGetSetMessageLocation() {
        // Setup
        $expected = 'testMessageLocation';
        $brokerProperties = new BrokerProperties();

        // Test
        $brokerProperties->setMessageLocation($expected);
        $actual = $brokerProperties->getMessageLocation();

        // Assert 
        $this->assertEquals(
            $expected,
            $actual
        );

    }


    /** 
     * @covers WindowsAzure\ServiceBus\Models\BrokerProperties::getLockLocation
     * @covers WindowsAzure\ServiceBus\Models\BrokerProperties::setLockLocation
     */
    public function testGetSetLockLocation() {
        // Setup
        $expected = 'testLockLocation';
        $brokerProperties = new BrokerProperties();

        // Test
        $brokerProperties->setLockLocation($expected);
        $actual = $brokerProperties->getLockLocation();

        // Assert 
        $this->assertEquals(
            $expected,
            $actual
        );

    }

}

?>
