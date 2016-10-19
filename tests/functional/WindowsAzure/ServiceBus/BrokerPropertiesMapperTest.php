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

namespace Tests\functional\WindowsAzure\ServiceBus;

use Tests\Framework\ServiceBusRestProxyTestBase;
use Tests\Functional\WindowsAzure\BlobServiceFunctionalTestData;
use WindowsAzure\ServiceBus\Models\BrokerProperties;

class BrokerPropertiesMapperTest extends ServiceBusRestProxyTestBase
{
    public function testJsonStringMapsToBrokerPropertiesObject()
    {
        // Act
        $properties = BrokerProperties::create('{"DeliveryCount":5,"MessageId":"something"}');

        // Assert
        $this->assertNotNull($properties, '$properties');
        $this->assertEquals(5, $properties->getDeliveryCount(), '$properties->getDeliveryCount()');
        $this->assertEquals('something', $properties->getMessageId(), '$properties->getMessageId()');
    }

    public function testNonDefaultPropertiesMapToJsonString()
    {
        // Act
        $properties = new BrokerProperties();
        $properties->setMessageId('foo');
        $properties->setDeliveryCount(7);
        $json = $properties->toString();

        // Assert
        $this->assertNotNull($json, '$json');
        $this->assertEquals('{"DeliveryCount":7,"MessageId":"foo"}', $json, '$json');
    }

    public function testDeserializingAllPossibleValues()
    {
        // Arrange
        $scheduledTimeUtc = new \DateTime('Sun, 06 Nov 1994 08:49:37 GMT');
        $scheduledTimeUtc->setTimezone(new \DateTimeZone('UTC'));

        $lockedUntilUtc = new \DateTime('Fri, 14 Oct 2011 12:34:56 GMT');
        $lockedUntilUtc->setTimezone(new \DateTimeZone('UTC'));

        // Act
        $jsonValue =
            '{'.
            '"CorrelationId":"corid",'.
            '"SessionId":"sesid",'.
            '"DeliveryCount":5,'.
            '"LockedUntilUtc":"Fri, 14 Oct 2011 12:34:56 GMT",'.
            '"LockToken":"loctok",'.
            '"MessageId":"mesid",'.
            '"Label":"lab",'.
            '"ReplyTo":"repto",'.
            '"SequenceNumber":7,'.
            '"TimeToLive":8.123,'.
            '"To":"to",'.
            '"ScheduledEnqueueTimeUtc":"Sun, 06 Nov 1994 08:49:37 GMT",'.
            '"ReplyToSessionId":"reptosesid",'.
            '"MessageLocation":"mesloc",'.
            '"LockLocation":"locloc"'.'}';

        $properties = BrokerProperties::create($jsonValue);

        $jsonRoundTrip = $properties->toString();

        // Assert
        $this->assertNotNull($properties, '$properties');

        $lockedUntilDelta = BlobServiceFunctionalTestData::diffInTotalSeconds(
                $properties->getLockedUntilUtc(),
                $lockedUntilUtc);
        $scheduledTimeDelta = BlobServiceFunctionalTestData::diffInTotalSeconds(
                $properties->getScheduledEnqueueTimeUtc(),
                $scheduledTimeUtc);

        $this->assertEquals('corid', $properties->getCorrelationId(), '$properties->getCorrelationId()');
        $this->assertEquals('sesid', $properties->getSessionId(), '$properties->getSessionId()');
        $this->assertEquals(5, (int) $properties->getDeliveryCount(), '(int) $properties->getDeliveryCount()');
        $this->assertTrue(abs($lockedUntilDelta) < 2000, 'abs($lockedUntilDelta) < 2000');
        $this->assertEquals('loctok', $properties->getLockToken(), '$properties->getLockToken()');
        $this->assertEquals('mesid', $properties->getMessageId(), '$properties->getMessageId()');
        $this->assertEquals('lab', $properties->getLabel(), '$properties->getLabel()');
        $this->assertEquals('repto', $properties->getReplyTo(), '$properties->getReplyTo()');
        $this->assertEquals(7, $properties->getSequenceNumber(), '$properties->getSequenceNumber()');
        $this->assertEquals(8.123, $properties->getTimeToLive(), .001);
        $this->assertEquals('to', $properties->getTo(), '$properties->getTo()');
        $this->assertTrue(abs($scheduledTimeDelta) < 2000, 'abs($scheduledTimeDelta) < 2000');
        $this->assertEquals('reptosesid', $properties->getReplyToSessionId(), '$properties->getReplyToSessionId()');
        $this->assertEquals('mesloc', $properties->getMessageLocation(), '$properties->getMessageLocation()');
        $this->assertEquals('locloc', $properties->getLockLocation(), '$properties->getLockLocation()');
        $this->assertEquals($jsonValue, $jsonRoundTrip, 'round-tripped JSON');
    }

    public function testMissingDatesDeserializeAsNull()
    {
        // Act
        $properties = BrokerProperties::create('{}');

        // Assert
        $this->assertNull($properties->getLockedUntilUtc(), '$properties->getLockedUntilUtc()');
        $this->assertNull($properties->getScheduledEnqueueTimeUtc(), '$properties->getScheduledEnqueueTimeUtc()');
    }
}
