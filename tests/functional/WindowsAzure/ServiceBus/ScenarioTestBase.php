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


use WindowsAzure\Common\Internal\Utilities;
use WindowsAzure\Common\Internal\Resources;
use WindowsAzure\ServiceBus\Models\BrokeredMessage;

class ScenarioTestBase extends IntegrationTestBase
{
    private static $verbose = false;

    protected function compareMessages(
        BrokeredMessage $expectedMessage, BrokeredMessage $actualMessage, $customProperties = null
    ) {
        $this->assertEquals($expectedMessage->getBody(), $actualMessage->getBody(), 'body');
        $this->assertEquals($expectedMessage->getContentType(), $actualMessage->getContentType(), 'getContentType');
        $this->assertEquals($expectedMessage->getCorrelationId(), $actualMessage->getCorrelationId(), 'getCorrelationId');
        $this->assertEquals($expectedMessage->getDate(), $actualMessage->getDate(), 'getDate');
        // Note: The DeliveryCount property is controlled by the server, so cannot compare it.
        $this->assertTrue(is_int($actualMessage->getDeliveryCount()), 'is_int($actualMessage->getDeliveryCount)');
        $this->assertEquals($expectedMessage->getLabel(), $actualMessage->getLabel(), 'getLabel');
        // Note: The LockLocation property is controlled by the server, so cannot compare it.
        $this->assertTrue(
                is_null($actualMessage->getLockLocation()) ||
                is_string($actualMessage->getLockLocation()), 'is_string/numm($actualMessage->getLockLocation)');
        // Note: The LockToken property is controlled by the server, so cannot compare it.
        $this->assertTrue(
                is_null($actualMessage->getLockToken()) ||
                is_string($actualMessage->getLockToken()), 'is_string/null($actualMessage->getLockToken)');
        // Note: The LockedUntilUtc property is controlled by the server, so cannot compare it.
        $this->assertTrue(
                is_null($actualMessage->getLockedUntilUtc()) ||
                $actualMessage->getLockedUntilUtc() instanceof \DateTime, '$is_null/DateTime(actualMessage->getLockedUntilUtc)');
        $this->assertEquals($expectedMessage->getMessageId(), $actualMessage->getMessageId(), 'getMessageId');
        $this->assertEquals($expectedMessage->getMessageLocation(), $actualMessage->getMessageLocation(), 'getMessageLocation');
        $this->assertEquals($expectedMessage->getReplyTo(), $actualMessage->getReplyTo(), 'getReplyTo');
        $this->assertEquals($expectedMessage->getReplyToSessionId(), $actualMessage->getReplyToSessionId(), 'getReplyToSessionId');
        $this->assertEquals($expectedMessage->getScheduledEnqueueTimeUtc(), $actualMessage->getScheduledEnqueueTimeUtc(), 'getScheduledEnqueueTimeUtc');
        // Note: The SequenceNumber property is controlled by the server, so cannot compare it.
        $this->assertTrue(is_int($actualMessage->getSequenceNumber()), 'is_int($actualMessage->getSequenceNumber)');
        $this->assertEquals($expectedMessage->getSessionId(), $actualMessage->getSessionId(), 'getSessionId');
        $this->assertEquals($expectedMessage->getTo(), $actualMessage->getTo(), 'getTo');

        // Note: The BrokerProperties does not need to be tested, as most of
        // the BrokerMessage properties call into it.

        if (is_null($customProperties)) {
            $expectedProperties = $expectedMessage->getProperties();
            $index = Utilities::tryGetValue($expectedProperties, 'i', 1);
            $customProperties = $this->getCustomProperties(intval($index));
        }

        $actualProperties = $actualMessage->getProperties();

        $this->assertEquals(count($customProperties), count($actualProperties), 'count(getProperties)');
        foreach ($customProperties as $key => $value) {
            // GUIDs from the server cannot be known in advance
            if ($value != 'GUID') {
                $this->assertEquals(
                    $value,
                    $actualProperties[strtolower($key)],
                    'getProperties[\''.$key.'\']');
            }
        }
    }

    protected function getCustomProperties($i)
    {
        $customProperties = [];
        $customProperties['i'] = $i;
        $date = new \DateTime('01/0'.$i.'/2001');
        $customProperties['test'] = gmdate(Resources::AZURE_DATE_FORMAT,
                $date->getTimestamp());
        $customProperties['name'] = 'Test'.$i;
        $customProperties['meanname'] = "'\"Me`\\'&*<>!@#%^*)\n".$i;
        $customProperties['int'] = 50 + $i;
        $customProperties['float'] = pi() + $i;
        $customProperties['even'] = ($i % 2 == 0);

        return $customProperties;
    }

    public static function assertEquals($expected, $actual, $message = '', $delta = 0, $maxDepth = 10, $canonicalize = false, $ignoreCase = false)
    {
        self::write('  assertEquals(\''.
                ($expected instanceof \DateTime ?
                    $expected->format(Resources::AZURE_DATE_FORMAT) :
                    strval($expected)).'\', \''.
                ($actual instanceof \DateTime ?
                    $actual->format(Resources::AZURE_DATE_FORMAT) :
                    strval($actual)).'\', \''.
                $message.'\')');

        $effExp = $expected;
        $effAct = $actual;

        if ($effExp instanceof \DateTime) {
            $effExp = $effExp->setTimezone(new \DateTimeZone('UTC'));
        }
        if ($effAct instanceof \DateTime) {
            $effAct = $effAct->setTimezone(new \DateTimeZone('UTC'));
        }

        parent::assertEquals($expected, $actual, $message, $delta, $maxDepth, $canonicalize, $ignoreCase);
    }

    protected static function write($message)
    {
        if (self::$verbose) {
            echo $message."\n";
        }
    }
}
