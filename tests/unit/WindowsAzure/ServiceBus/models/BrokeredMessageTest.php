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
 * @link      https://github.com/WindowsAzure/azure-sdk-for-php
 */

namespace Tests\unit\WindowsAzure\ServiceBus\models;

use WindowsAzure\ServiceBus\Models\BrokeredMessage;
use WindowsAzure\ServiceBus\Models\BrokerProperties;

/**
 * Unit tests for class brokered message. 
 *
 * @category  Microsoft
 *
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 *
 * @version   Release: 0.4.5_2016-09
 *
 * @link      https://github.com/WindowsAzure/azure-sdk-for-php
 */
class BrokeredMessageTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers BrokeredMessage::__construct
     */
    public function testBrokeredMessageConstructor()
    {
        // Setup
        $message = 'testMessage';
        // Test
        $brokeredMessage = new BrokeredMessage($message);

        // Assert
        $this->assertNotNull($brokeredMessage);
    }

    /**
     * @covers BrokeredMessage::getBrokerProperties
     */
    public function testBrokeredMessageConstructorWithMessage()
    {
        // Setup
        $expected = 'testMessage';

        // Test
        $brokeredMessage = new BrokeredMessage($expected);
        $actual = $brokeredMessage->getBody();

        // Assert
        $this->assertEquals(
            $expected,
            $actual
        );
    }

    /** 
     * @covers BrokeredMessage::getBrokerProperties
     * @covers BrokeredMessage::setBrokerProperties
     */
    public function testGetSetBrokerProperties()
    {
        // Setup
        $expected = new BrokerProperties();
        $brokeredMessage = new BrokeredMessage();

        // Test
        $brokeredMessage->setBrokerProperties($expected);
        $actual = $brokeredMessage->getBrokerProperties();

        // Assert 
        $this->assertEquals(
            $expected,
            $actual
        );
    }

    /** 
     * @covers BrokeredMessage::getBody
     * @covers BrokeredMessage::setBody
     */
    public function testGetSetBody()
    {
        // Setup
        $expected = 'testBody';
        $brokeredMessage = new BrokeredMessage();

        // Test
        $brokeredMessage->setBody($expected);
        $actual = $brokeredMessage->getBody();

        // Assert 
        $this->assertEquals(
            $expected,
            $actual
        );
    }

    /** 
     * @covers BrokeredMessage::getContentType
     * @covers BrokeredMessage::setContentType
     */
    public function testGetSetContentType()
    {
        // Setup
        $expected = 'testContentType';
        $brokeredMessage = new BrokeredMessage();

        // Test
        $brokeredMessage->setContentType($expected);
        $actual = $brokeredMessage->getContentType();

        // Assert 
        $this->assertEquals(
            $expected,
            $actual
        );
    }

    /** 
     * @covers BrokeredMessage::getDate
     * @covers BrokeredMessage::setDate
     */
    public function testGetSetDate()
    {
        // Setup
        $expected = new \DateTime();
        $brokeredMessage = new BrokeredMessage();

        // Test
        $brokeredMessage->setDate($expected);
        $actual = $brokeredMessage->getDate();

        // Assert 
        $this->assertEquals(
            $expected,
            $actual
        );
    }

    /** 
     * @covers BrokeredMessage::getProperties
     * @covers BrokeredMessage::setProperty
     */
    public function testGetSetCustomProperties()
    {
        // Setup
        $expected = 'testCustomPropertyValue';
        $testCustomPropertyKey = 'testCustomPropertyKey';
        $brokeredMessage = new BrokeredMessage();

        // Test
        $brokeredMessage->setProperty($testCustomPropertyKey, $expected);
        $customProperties = $brokeredMessage->getProperties();
        $actual = $customProperties[strtolower($testCustomPropertyKey)];

        // Assert 
        $this->assertEquals(
            $expected,
            $actual
        );
    }

    /** 
     * @covers BrokeredMessage::getCorrelationId
     * @covers BrokeredMessage::setCorrelationId
     */
    public function testGetSetCorrelationId()
    {
        // Setup
        $expected = 'testCorrelationId';
        $brokeredMessage = new BrokeredMessage();

        // Test
        $brokeredMessage->setCorrelationId($expected);
        $actual = $brokeredMessage->getCorrelationId();

        // Assert 
        $this->assertEquals(
            $expected,
            $actual
        );
    }

    /** 
     * @covers BrokeredMessage::getSessionId
     * @covers BrokeredMessage::setSessionId
     */
    public function testGetSetSessionId()
    {
        // Setup
        $expected = 'testSessionId';
        $brokeredMessage = new BrokeredMessage();

        // Test
        $brokeredMessage->setSessionId($expected);
        $actual = $brokeredMessage->getSessionId();

        // Assert 
        $this->assertEquals(
            $expected,
            $actual
        );
    }

    /** 
     * @covers BrokeredMessage::getDeliveryCount
     * @covers BrokeredMessage::setDeliveryCount
     */
    public function testGetSetDeliveryCount()
    {
        // Setup
        $expected = 100;
        $brokeredMessage = new BrokeredMessage();

        // Test
        $brokeredMessage->setDeliveryCount($expected);
        $actual = $brokeredMessage->getDeliveryCount();

        // Assert 
        $this->assertEquals(
            $expected,
            $actual
        );
    }

    /** 
     * @covers BrokeredMessage::getLockedUntilUtc
     * @covers BrokeredMessage::setLockedUntilUtc
     */
    public function testGetSetLockedUntilUtc()
    {
        // Setup
        $expected = 'testLockedUntilUtc';
        $brokeredMessage = new BrokeredMessage();

        // Test
        $brokeredMessage->setLockedUntilUtc($expected);
        $actual = $brokeredMessage->getLockedUntilUtc();

        // Assert 
        $this->assertEquals(
            $expected,
            $actual
        );
    }

    /** 
     * @covers BrokeredMessage::getLockToken
     * @covers BrokeredMessage::setLockToken
     */
    public function testGetSetLockToken()
    {
        // Setup
        $expected = 'testLockToken';
        $brokeredMessage = new BrokeredMessage();

        // Test
        $brokeredMessage->setLockToken($expected);
        $actual = $brokeredMessage->getLockToken();

        // Assert 
        $this->assertEquals(
            $expected,
            $actual
        );
    }

    /** 
     * @covers BrokeredMessage::getMessageId
     * @covers BrokeredMessage::setMessageId
     */
    public function testGetSetMessageId()
    {
        // Setup
        $expected = 'testMessageId';
        $brokeredMessage = new BrokeredMessage();

        // Test
        $brokeredMessage->setMessageId($expected);
        $actual = $brokeredMessage->getMessageId();

        // Assert 
        $this->assertEquals(
            $expected,
            $actual
        );
    }

    /** 
     * @covers BrokeredMessage::getLabel
     * @covers BrokeredMessage::setLabel
     */
    public function testGetSetLabel()
    {
        // Setup
        $expected = 'testLabel';
        $brokeredMessage = new BrokeredMessage();

        // Test
        $brokeredMessage->setLabel($expected);
        $actual = $brokeredMessage->getLabel();

        // Assert 
        $this->assertEquals(
            $expected,
            $actual
        );
    }

    /** 
     * @covers BrokeredMessage::getReplyTo
     * @covers BrokeredMessage::setReplyTo
     */
    public function testGetSetReplyTo()
    {
        // Setup
        $expected = 'testReplyTo';
        $brokeredMessage = new BrokeredMessage();

        // Test
        $brokeredMessage->setReplyTo($expected);
        $actual = $brokeredMessage->getReplyTo();

        // Assert 
        $this->assertEquals(
            $expected,
            $actual
        );
    }

    /** 
     * @covers BrokeredMessage::getSequenceNumber
     * @covers BrokeredMessage::setSequenceNumber
     */
    public function testGetSetSequenceNumber()
    {
        // Setup
        $expected = 58;
        $brokeredMessage = new BrokeredMessage();

        // Test
        $brokeredMessage->setSequenceNumber($expected);
        $actual = $brokeredMessage->getSequenceNumber();

        // Assert 
        $this->assertEquals(
            $expected,
            $actual
        );
    }

    /** 
     * @covers BrokeredMessage::getTimeToLive
     * @covers BrokeredMessage::setTimeToLive
     */
    public function testGetSetTimeToLive()
    {
        // Setup
        $expected = 'testTimeToLive';
        $brokeredMessage = new BrokeredMessage();

        // Test
        $brokeredMessage->setTimeToLive($expected);
        $actual = $brokeredMessage->getTimeToLive();

        // Assert 
        $this->assertEquals(
            $expected,
            $actual
        );
    }

    /** 
     * @covers BrokeredMessage::getTo
     * @covers BrokeredMessage::setTo
     */
    public function testGetSetTo()
    {
        // Setup
        $expected = 'testTo';
        $brokeredMessage = new BrokeredMessage();

        // Test
        $brokeredMessage->setTo($expected);
        $actual = $brokeredMessage->getTo();

        // Assert 
        $this->assertEquals(
            $expected,
            $actual
        );
    }

    /** 
     * @covers BrokeredMessage::getScheduledEnqueueTimeUtc
     * @covers BrokeredMessage::setScheduledEnqueueTimeUtc
     */
    public function testGetSetScheduledEnqueueTimeUtc()
    {
        // Setup
        $expected = 'testScheduledEnqueueTimeUtc';
        $brokeredMessage = new BrokeredMessage();

        // Test
        $brokeredMessage->setScheduledEnqueueTimeUtc($expected);
        $actual = $brokeredMessage->getScheduledEnqueueTimeUtc();

        // Assert 
        $this->assertEquals(
            $expected,
            $actual
        );
    }

    /** 
     * @covers BrokeredMessage::getReplyToSessionId
     * @covers BrokeredMessage::setReplyToSessionId
     */
    public function testGetSetReplyToSessionId()
    {
        // Setup
        $expected = 'testReplyToSessionId';
        $brokeredMessage = new BrokeredMessage();

        // Test
        $brokeredMessage->setReplyToSessionId($expected);
        $actual = $brokeredMessage->getReplyToSessionId();

        // Assert 
        $this->assertEquals(
            $expected,
            $actual
        );
    }

    /** 
     * @covers BrokeredMessage::getMessageLocation
     * @covers BrokeredMessage::setMessageLocation
     */
    public function testGetSetMessageLocation()
    {
        // Setup
        $expected = 'testMessageLocation';
        $brokeredMessage = new BrokeredMessage();

        // Test
        $brokeredMessage->setMessageLocation($expected);
        $actual = $brokeredMessage->getMessageLocation();

        // Assert 
        $this->assertEquals(
            $expected,
            $actual
        );
    }

    /** 
     * @covers BrokeredMessage::getLockLocation
     * @covers BrokeredMessage::setLockLocation
     */
    public function testGetSetLockLocation()
    {
        // Setup
        $expected = 'testLockLocation';
        $brokeredMessage = new BrokeredMessage();

        // Test
        $brokeredMessage->setLockLocation($expected);
        $actual = $brokeredMessage->getLockLocation();

        // Assert 
        $this->assertEquals(
            $expected,
            $actual
        );
    }
}
