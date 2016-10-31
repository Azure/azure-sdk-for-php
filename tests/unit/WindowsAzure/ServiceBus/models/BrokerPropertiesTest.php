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

use WindowsAzure\ServiceBus\Models\BrokerProperties;
use WindowsAzure\Common\Internal\Resources;

/**
 * Unit tests for class BrokerProperties.
 *
 * @category  Microsoft
 *
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 *
 * @version   Release: 0.5.0_2016-11
 *
 * @link      https://github.com/WindowsAzure/azure-sdk-for-php
 */
class BrokerPropertiesTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers \WindowsAzure\ServiceBus\Models\BrokerProperties::__construct
     */
    public function testBrokerPropertiesConstructor()
    {
        // Test
        $brokerProperties = new BrokerProperties();

        // Assert
        $this->assertNotNull($brokerProperties);
    }

    /**
     * @covers \WindowsAzure\ServiceBus\Models\BrokerProperties::create
     */
    public function testCreateBrokerPropertiesSuccess()
    {
        // Setup
        $brokerPropertiesJsonString = '{"MessageId": "1","Label": "label1","ReplyTo": "1@1.com"}';

        // Test
        $brokerProperties = BrokerProperties::create($brokerPropertiesJsonString);

        // Assert
        $this->assertEquals(
            1,
            $brokerProperties->getMessageId()
        );

        $this->assertEquals(
            'label1',
            $brokerProperties->getLabel()
        );

        $this->assertEquals(
            '1@1.com',
            $brokerProperties->getReplyTo()
        );
    }

    /**
     * @covers \WindowsAzure\ServiceBus\Models\BrokerProperties::create
     */
    public function testCreateBrokerPropertiesAllPropertiesSuccess()
    {
        // Setup
        $brokerPropertiesJsonString = '{"CorrelationId":"testCorrelationId","SessionId":"testSessionId","DeliveryCount":38,"LockedUntilUtc":"Sun, 06 Nov 2011 01:00:00 GMT","LockToken":"testLockToken","MessageId":"testMessageId","Label":"testLabel","ReplyTo":"testReplyTo","SequenceNumber":88,"TimeToLive":123.456,"To":"testTo","ScheduledEnqueueTimeUtc":"Sun, 06 Nov 2011 01:00:00 GMT","ReplyToSessionId":"testReplyToSessionId","MessageLocation":"testMessageLocation","LockLocation":"testLockLocation"}';
        $expectedCorrelationId = 'testCorrelationId';
        $expectedSessionId = 'testSessionId';
        $expectedDeliveryCount = 38;
        $expectedLockedUntilUtc = \DateTime::createFromFormat(
            Resources::AZURE_DATE_FORMAT, 'Sun, 06 Nov 2011 01:00:00 GMT'
        );
        $expectedLockToken = 'testLockToken';
        $expectedMessageId = 'testMessageId';
        $expectedLabel = 'testLabel';
        $expectedReplyTo = 'testReplyTo';
        $expectedSequenceNumber = 88;
        $expectedTimeToLive = '123.456';
        $expectedTo = 'testTo';
        $expectedScheduledEnqueueTimeUtc = $expectedLockedUntilUtc;
        $expectedReplyToSessionId = 'testReplyToSessionId';
        $expectedMessageLocation = 'testMessageLocation';
        $expectedLockLocation = 'testLockLocation';

        // Test
        $brokerProperties = BrokerProperties::create($brokerPropertiesJsonString);

        // Assert
        $this->assertEquals(
            $expectedCorrelationId,
            $brokerProperties->getCorrelationId()
        );

        $this->assertEquals(
            $expectedSessionId,
            $brokerProperties->getSessionId()
        );

        $this->assertEquals(
            $expectedDeliveryCount,
            $brokerProperties->getDeliveryCount()
        );

        $this->assertEquals(
            $expectedLockedUntilUtc->format(Resources::AZURE_DATE_FORMAT),
            $brokerProperties->getLockedUntilUtc()->format(Resources::AZURE_DATE_FORMAT)
        );

        $this->assertEquals(
            $expectedLockToken,
            $brokerProperties->getLockToken()
        );

        $this->assertEquals(
            $expectedMessageId,
            $brokerProperties->getMessageId()
        );

        $this->assertEquals(
            $expectedLabel,
            $brokerProperties->getLabel()
        );

        $this->assertEquals(
            $expectedReplyTo,
            $brokerProperties->getReplyTo()
        );

        $this->assertEquals(
            $expectedSequenceNumber,
            $brokerProperties->getSequenceNumber()
        );

        $this->assertEquals(
            $expectedTimeToLive,
            $brokerProperties->getTimeToLive()
        );

        $this->assertEquals(
            $expectedTo,
            $brokerProperties->getTo()
        );

        $this->assertEquals(
            $expectedScheduledEnqueueTimeUtc,
            $brokerProperties->getScheduledEnqueueTimeUtc()
        );

        $this->assertEquals(
            $expectedReplyToSessionId,
            $brokerProperties->getReplyToSessionId()
        );

        $this->assertEquals(
            $expectedMessageLocation,
            $brokerProperties->getMessageLocation()
        );

        $this->assertEquals(
            $expectedLockLocation,
            $brokerProperties->getLockLocation()
        );
    }

    /**
     * @covers \WindowsAzure\ServiceBus\Models\BrokerProperties::toString
     */
    public function testSerializeBrokerPropertiesSuccess()
    {
        // Setup
        $expected = '{"MessageId":"1","Label":"label1","ReplyTo":"1@1.com"}';

        // Test
        $brokerProperties = new BrokerProperties();
        $brokerProperties->setMessageId('1');
        $brokerProperties->setLabel('label1');
        $brokerProperties->setReplyTo('1@1.com');

        // Assert
        $this->assertEquals(
            $expected,
            $brokerProperties->toString()
        );
    }

    /**
     * @covers \WindowsAzure\ServiceBus\Models\BrokerProperties::toString
     */
    public function testSerializeBrokerPropertiesAllPropertiesSuccess()
    {
        // Setup
        $expected = '{"CorrelationId":"testCorrelationId","SessionId":"testSessionId","DeliveryCount":38,"LockedUntilUtc":"Sun, 06 Nov 2011 01:00:00 GMT","LockToken":"testLockToken","MessageId":"testMessageId","Label":"testLabel","ReplyTo":"testReplyTo","SequenceNumber":88,"TimeToLive":123.456,"To":"testTo","ScheduledEnqueueTimeUtc":"Sun, 06 Nov 2011 01:00:00 GMT","ReplyToSessionId":"testReplyToSessionId","MessageLocation":"testMessageLocation","LockLocation":"testLockLocation"}';
        $lockedUntilUtc = \DateTime::createFromFormat(
            'Y-m-d H:i:s', '2011-11-06 01:00:00', new \DateTimeZone('UTC'));
        $timeToLive = '123.456';
        $scheduledEnqueueTimeUtc = $lockedUntilUtc;

        // Test
        $brokerProperties = new BrokerProperties();
        $brokerProperties->setCorrelationId('testCorrelationId');
        $brokerProperties->setSessionId('testSessionId');
        $brokerProperties->setDeliveryCount(38);
        $brokerProperties->setLockedUntilUtc($lockedUntilUtc);
        $brokerProperties->setLockToken('testLockToken');
        $brokerProperties->setMessageId('testMessageId');
        $brokerProperties->setLabel('testLabel');
        $brokerProperties->setReplyTo('testReplyTo');
        $brokerProperties->setSequenceNumber(88);
        $brokerProperties->setTimeToLive($timeToLive);
        $brokerProperties->setTo('testTo');
        $brokerProperties->setScheduledEnqueueTimeUtc($scheduledEnqueueTimeUtc);
        $brokerProperties->setReplyToSessionId('testReplyToSessionId');
        $brokerProperties->setMessageLocation('testMessageLocation');
        $brokerProperties->setLockLocation('testLockLocation');

        // Assert
        $this->assertEquals(
            $expected,
            $brokerProperties->toString()
        );
    }

    /** 
     * @covers \WindowsAzure\ServiceBus\Models\BrokerProperties::getCorrelationId
     * @covers \WindowsAzure\ServiceBus\Models\BrokerProperties::setCorrelationId
     */
    public function testGetSetCorrelationId()
    {
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
     * @covers \WindowsAzure\ServiceBus\Models\BrokerProperties::getSessionId
     * @covers \WindowsAzure\ServiceBus\Models\BrokerProperties::setSessionId
     */
    public function testGetSetSessionId()
    {
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
     * @covers \WindowsAzure\ServiceBus\Models\BrokerProperties::getDeliveryCount
     * @covers \WindowsAzure\ServiceBus\Models\BrokerProperties::setDeliveryCount
     */
    public function testGetSetDeliveryCount()
    {
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
     * @covers \WindowsAzure\ServiceBus\Models\BrokerProperties::getLockedUntilUtc
     * @covers \WindowsAzure\ServiceBus\Models\BrokerProperties::setLockedUntilUtc
     */
    public function testGetSetLockedUntilUtc()
    {
        // Setup
        $expected = new \DateTime();
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
     * @covers \WindowsAzure\ServiceBus\Models\BrokerProperties::getLockToken
     * @covers \WindowsAzure\ServiceBus\Models\BrokerProperties::setLockToken
     */
    public function testGetSetLockToken()
    {
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
     * @covers \WindowsAzure\ServiceBus\Models\BrokerProperties::getMessageId
     * @covers \WindowsAzure\ServiceBus\Models\BrokerProperties::setMessageId
     */
    public function testGetSetMessageId()
    {
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
     * @covers \WindowsAzure\ServiceBus\Models\BrokerProperties::getLabel
     * @covers \WindowsAzure\ServiceBus\Models\BrokerProperties::setLabel
     */
    public function testGetSetLabel()
    {
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
     * @covers \WindowsAzure\ServiceBus\Models\BrokerProperties::getReplyTo
     * @covers \WindowsAzure\ServiceBus\Models\BrokerProperties::setReplyTo
     */
    public function testGetSetReplyTo()
    {
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
     * @covers \WindowsAzure\ServiceBus\Models\BrokerProperties::getSequenceNumber
     * @covers \WindowsAzure\ServiceBus\Models\BrokerProperties::setSequenceNumber
     */
    public function testGetSetSequenceNumber()
    {
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
     * @covers \WindowsAzure\ServiceBus\Models\BrokerProperties::getTimeToLive
     * @covers \WindowsAzure\ServiceBus\Models\BrokerProperties::setTimeToLive
     */
    public function testGetSetTimeToLive()
    {
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
     * @covers \WindowsAzure\ServiceBus\Models\BrokerProperties::getTo
     * @covers \WindowsAzure\ServiceBus\Models\BrokerProperties::setTo
     */
    public function testGetSetTo()
    {
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
     * @covers \WindowsAzure\ServiceBus\Models\BrokerProperties::getScheduledEnqueueTimeUtc
     * @covers \WindowsAzure\ServiceBus\Models\BrokerProperties::setScheduledEnqueueTimeUtc
     */
    public function testGetSetScheduledEnqueueTimeUtc()
    {
        // Setup
        $expected = new \DateTime();
        $brokerProperties = new BrokerProperties();

        // Test
        $brokerProperties->setScheduledEnqueueTimeUtc($expected);
        $actual = $brokerProperties->getScheduledEnqueueTimeUtc();

        // Assert 
        $this->assertEquals(
            $expected,
            $actual
        );
    }

    /** 
     * @covers \WindowsAzure\ServiceBus\Models\BrokerProperties::getReplyToSessionId
     * @covers \WindowsAzure\ServiceBus\Models\BrokerProperties::setReplyToSessionId
     */
    public function testGetSetReplyToSessionId()
    {
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
     * @covers \WindowsAzure\ServiceBus\Models\BrokerProperties::getMessageLocation
     * @covers \WindowsAzure\ServiceBus\Models\BrokerProperties::setMessageLocation
     */
    public function testGetSetMessageLocation()
    {
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
     * @covers \WindowsAzure\ServiceBus\Models\BrokerProperties::getLockLocation
     * @covers \WindowsAzure\ServiceBus\Models\BrokerProperties::setLockLocation
     */
    public function testGetSetLockLocation()
    {
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
