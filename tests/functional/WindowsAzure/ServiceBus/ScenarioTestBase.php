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
 * @package   Tests\Functional\WindowsAzure\ServiceBus
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */

namespace Tests\Functional\WindowsAzure\ServiceBus;

use Tests\Framework\FiddlerFilter;
use Tests\Framework\ServiceBusRestProxyTestBase;
use Tests\Functional\WindowsAzure\ServiceBus\IntegrationTestBase;
use WindowsAzure\Common\ServiceException;
use WindowsAzure\Common\Internal\Utilities;
use WindowsAzure\ServiceBus\ServiceBusService;
use WindowsAzure\ServiceBus\Models\QueueInfo;
use WindowsAzure\ServiceBus\Models\ReceiveMessageOptions;
use WindowsAzure\Common\Internal\Resources;

class ScenarioTestBase extends IntegrationTestBase
{
    private static $verbose = false;

    protected function compareMessages($expectedMessage, $actualMessage, $customProperties = null)
    {
        $this->assertEquals($expectedMessage->getBody(), $actualMessage->getBody(), 'body');
        $this->assertEquals($expectedMessage->getContentType(), $actualMessage->getContentType(), 'getContentType');
        $this->assertEquals($expectedMessage->getCorrelationId(), $actualMessage->getCorrelationId(), 'getCorrelationId');
        $this->assertEquals($expectedMessage->getDate(), $actualMessage->getDate(), 'getDate');
        // Note: The DeliveryCount property is controled by the server, so cannot compare it.
        $this->assertEquals($expectedMessage->getLabel(), $actualMessage->getLabel(), 'getLabel');
        // Note: The LockLocation property is controled by the server, so cannot compare it.
        // Note: The LockToken property is controled by the server, so cannot compare it.
        // Note: The LockedUntilUtc property is controled by the server, so cannot compare it.
        $this->assertEquals($expectedMessage->getMessageId(), $actualMessage->getMessageId(), 'getMessageId');
        $this->assertEquals($expectedMessage->getMessageLocation(), $actualMessage->getMessageLocation(), 'getMessageLocation');
        $this->assertEquals($expectedMessage->getReplyTo(), $actualMessage->getReplyTo(), 'getReplyTo');
        $this->assertEquals($expectedMessage->getReplyToSessionId(), $actualMessage->getReplyToSessionId(), 'getReplyToSessionId');
        $this->assertEquals($expectedMessage->getScheduledEnqueueTimeUtc(), $actualMessage->getScheduledEnqueueTimeUtc(), 'getScheduledEnqueueTimeUtc');
        $this->assertEquals($expectedMessage->getSequenceNumber(), $actualMessage->getSequenceNumber(), 'getSequenceNumber');
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

        // TODO: https://github.com/WindowsAzure/azure-sdk-for-php/issues/406
//        $this->assertEquals(count($expectedProperties), count($actualProperties), 'count(getProperties)');
        foreach ($customProperties as $key => $value) {
            // Guids from the server cannot be known in advance
            if ($value != 'GUID') {
                $this->assertEquals(
                    $value,
                    // TODO: https://github.com/WindowsAzure/azure-sdk-for-php/issues/406
//                    $actualProperties[$key],
                    self::CustomPropertiesMapper_fromString($actualProperties[strtolower($key)]),
                    'getProperties[\'' . $key . '\']');
            }
        }
    }

    protected function getCustomProperties($i)
    {
        $customProperties = array();
        $customProperties['i']     = $i;
        $customProperties['test']  = new \DateTime('01/0'. $i . '/2001');
        $customProperties['name']  = 'Test' . $i;
        $customProperties['int']   = 50 + $i;
        $customProperties['float'] = pi() + $i;
        $customProperties['even']  = ($i % 2 == 0);
        return $customProperties;
    }

    // TODO: Remove when fixed
    // https://github.com/WindowsAzure/azure-sdk-for-php/issues/406
    protected static function CustomPropertiesMapper_toString($value)
    {
        if (is_null($value)) {
            return null;
        } else if (is_numeric($value)) {
            return strval($value);
        } else if (is_bool($value)) {
            return ($value ? 'true' : 'false');
        } else if ($value instanceof \DateTime) {
            $formatted = gmdate(Resources::AZURE_DATE_FORMAT, $value->getTimestamp());
            return '"' . $formatted . '"';
        } else if (is_string($value)) {
            return '"' . $value . '"';
        } else {
            throw new \Exception();
        }
    }

    // TODO: Remove when fixed
    // https://github.com/WindowsAzure/azure-sdk-for-php/issues/406
    protected static function CustomPropertiesMapper_fromString($value)
    {
        if (is_null($value)) {
            return null;
        } else if ($value[0] == '"' && $value[strlen($value) - 1] == '"') {
            $text = substr($value, 1, strlen($value) - 2);
            $ret = Utilities::rfc1123ToDateTime($text);
            if (!$ret) {
                return $text;
            }
            return $ret;
        } else if ('true' == $value) {
            return true;
        } else if ('false' == $value) {
            return false;
        } else if (strstr($value, '.') === false) {
            return (int)$value;
        } else {
            return (float)$value;
        }
    }

    public static function assertEquals($expected, $actual, $description)
    {
        self::write('  assertEquals(\'' .
                ($expected instanceof \DateTime ?
                    $expected->format(Resources::AZURE_DATE_FORMAT) :
                    strval($expected)) . '\', \'' .
                ($actual instanceof \DateTime ?
                    $actual->format(Resources::AZURE_DATE_FORMAT) :
                    strval($actual)) . '\', \'' .
                $description . '\')');

        $effExp = $expected;
        $effAct = $actual;

        if ($effExp instanceof \DateTime) {
            $effExp = $effExp->setTimezone(new \DateTimeZone('UTC'));
        }
        if ($effAct instanceof \DateTime) {
            $effAct = $effAct->setTimezone(new \DateTimeZone('UTC'));
        }

        parent::assertEquals($expected, $actual, $description);
    }

    protected static function write($message)
    {
        if (self::$verbose) {
            echo $message . "\n";
        }
    }
}
?>