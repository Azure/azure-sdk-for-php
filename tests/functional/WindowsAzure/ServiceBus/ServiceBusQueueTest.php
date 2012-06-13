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

use Tests\Functional\WindowsAzure\ServiceBus\IntegrationTestBase;
use WindowsAzure\Common\ServiceException ;
use WindowsAzure\Common\Internal\Resources;
use WindowsAzure\Common\Internal\Utilities;
use WindowsAzure\ServiceBus\ServiceBusService;
use WindowsAzure\ServiceBus\Models\BrokeredMessage;
use WindowsAzure\ServiceBus\Models\BrokerProperties;
use WindowsAzure\ServiceBus\Models\ListQueuesOptions;
use WindowsAzure\ServiceBus\Models\ReceiveMessageOptions;
use WindowsAzure\ServiceBus\Models\QueueInfo;

class ServiceBusQueueTest extends IntegrationTestBase
{
    private $queuename = 'myq';
    private static $verbose = false;
    private $RECEIVE_AND_DELETE_5_SECONDS;
    private $PEEK_LOCK;

    /**
     * @covers WindowsAzure\ServiceBus\ServiceBusRestProxy::deleteQueue
     * @covers WindowsAzure\ServiceBus\ServiceBusRestProxy::listQueues
     */
    public function testSendMessage()
    {
        $this->RECEIVE_AND_DELETE_5_SECONDS = new ReceiveMessageOptions();
        $this->RECEIVE_AND_DELETE_5_SECONDS->setReceiveAndDelete();
        $this->RECEIVE_AND_DELETE_5_SECONDS->setTimeout(5);

        $this->PEEK_LOCK = new ReceiveMessageOptions();
        $this->PEEK_LOCK->setPeekLock();
        $this->PEEK_LOCK->setTimeout(20);

        $this->queuename .= time();
        $expectedMessages = $this->sendMessages();

        $this->peeklocktest($expectedMessages);

        self::write('Deleting queue ' . $this->queuename);
        $this->restProxy->deleteQueue($this->queuename);
        self::write('Deleted queue ' . $this->queuename);
    }

    /**
     * @covers WindowsAzure\ServiceBus\ServiceBusRestProxy::createQueue
     * @covers WindowsAzure\ServiceBus\ServiceBusRestProxy::deleteQueue
     * @covers WindowsAzure\ServiceBus\ServiceBusRestProxy::getQueue
     * @covers WindowsAzure\ServiceBus\ServiceBusRestProxy::listQueues
     * @covers WindowsAzure\ServiceBus\ServiceBusRestProxy::sendQueueMessage
     */
    public function sendMessages()
    {
        $options = new ListQueuesOptions();
        $options->setSkip(20);
        // TODO: https://github.com/WindowsAzure/azure-sdk-for-php/issues/479
//        $options->setTop(2);
        $queues = $this->restProxy->listQueues($options)->getQueueInfo();
        foreach ($queues as $queue) {
            self::write('Queue name is ' . $queue->getTitle());
        }

        self::write('checking if queue already exists ' . $this->queuename);
        //delete if exits
        try {
            $this->restProxy->getQueue($this->queuename);
            self::write('Queue already exists deleting it');
            $this->restProxy->deleteQueue($this->queuename);
        }
        catch (\Exception $e) {
            self::write('could not get an existing queue (' . $e->getCode() . '), proceeding...');
        }

        $q = new QueueInfo($this->queuename);
        $q->getQueueDescription()->setEnableBatchedOperations(true);
        $q->getQueueDescription()->setMaxDeliveryCount(10);
        $q->getQueueDescription()->setMaxSizeInMegabytes(1024);
        $q->getQueueDescription()->setRequiresDuplicateDetection(true);

        self::write('Creating queue ' . $this->queuename);

        $this->restProxy->createQueue($q);
        $this->restProxy->getQueue($this->queuename)->getQueueInfo();

        $messages = array();
        $messages[] = $this->createIssueMessage('1', 'First  message information', 'label1', 'location1');
        $messages[] = $this->createIssueMessage('2', 'Second message information', 'label2', 'location4');
        $messages[] = $this->createIssueMessage('3', 'Third  message information', 'label3', 'location4');
        $messages[] = $this->createIssueMessage('4', 'Fourth message information', 'label4', 'location4');
        foreach($messages as $message)  {
            $this->restProxy->sendQueueMessage($this->queuename, $message);
            $data = $message->getBody();
            self::write('Message sent with id: ' . $message->getMessageId() . ' Body of $message ' . $data);
        }

        return $messages;
    }

    private function createIssueMessage($issueId, $issueBody, $label, $messageLocation)
    {
        // TODO: https://github.com/WindowsAzure/azure-sdk-for-php/issues/394
//        $message = new BrokeredMessage($issueBody);
        $message = new BrokeredMessage();
        $message->setBody($issueBody);
        $message->setContentType('text/xml');
        $message->setLabel($label);
        $message->setReplyTo('1@1.com');
        $message->setMessageId($issueId);

        $customProperties = $this->getCustomProperties();
        foreach ($customProperties as $key => $value) {
            // TODO: https://github.com/WindowsAzure/azure-sdk-for-php/issues/406
//            $message->setProperty($key, $value);
            $message->setProperty($key,  self::CustomPropertiesMapper_toString($value));
        }

        $bp = new BrokerProperties();
        $bp->setLabel($label);
        $bp->setMessageLocation($messageLocation);
        $bp->setReplyTo("test@test.com");
        $bp->setMessageId($issueId);
        $bp->setCorrelationId("correlationid" + $label);
        $bp->setDeliveryCount(1);
        $bp->setLockedUntilUtc(new \DateTime("1/1/1970"));
        $bp->setLockLocation($label + "locallocation");
        $bp->setLockToken($label + "locltoken");
        $bp->setSequenceNumber(12);
        // TODO: https://github.com/WindowsAzure/azure-sdk-for-php/issues/406
//        $message->setBrokerProperties($bp);

        return $message;
    }

    private function getCustomProperties()
    {
        $customProperties = array();
        $customProperties['test']  = new \DateTime("Wed, 13 Jun 2012 15:20:52 GMT");
        $customProperties['name']  = 'Test';
        $customProperties['int']   = 54;
        $customProperties['float'] = pi();
        $customProperties['true']  = true;
        $customProperties['false'] = false;
        return $customProperties;
    }

    /**
     * @covers WindowsAzure\ServiceBus\ServiceBusRestProxy::deleteMessage
     * @covers WindowsAzure\ServiceBus\ServiceBusRestProxy::getQueue
     * @covers WindowsAzure\ServiceBus\ServiceBusRestProxy::receiveQueueMessage
     * @covers WindowsAzure\ServiceBus\ServiceBusRestProxy::unlockMessage
     */
    public function peeklocktest($expectedMessages)
    {
        $expectedCount = count($expectedMessages);
        self::write('Receiving queue messages ' . $this->queuename);
        $messageCount = $this->restProxy->getQueue($this->queuename)->getQueueInfo()->getQueueDescription()->getMessageCount();
        self::write('Before getting any messages, Message count: ' . $messageCount);
        $this->assertEquals($expectedCount, $messageCount, 'Before getting any messages');

        // Get the first message

        $message = $this->restProxy->receiveQueueMessage($this->queuename, $this->PEEK_LOCK);
        $this->printMessageInfo($message, 'message1');
        $this->compareMessages($expectedMessages[0], $message);

        $messageCount = $this->restProxy->getQueue($this->queuename)->getQueueInfo()->getQueueDescription()->getMessageCount();
        self::write('Peek locked first message, Message count: ' . $messageCount);
        $this->assertEquals($expectedCount, $messageCount, 'Peek locked first message, count should not change');

        // Get the second message

        $message2 = $this->restProxy->receiveQueueMessage($this->queuename, $this->RECEIVE_AND_DELETE_5_SECONDS);
        $this->printMessageInfo($message2, '$message2');
        $this->compareMessages($expectedMessages[1], $message2);

        $messageCount = $this->restProxy->getQueue($this->queuename)->getQueueInfo()->getQueueDescription()->getMessageCount();
        self::write('RECEIVE_AND_DELETE second message, Message count: ' . $messageCount);
        $expectedCount--;
        $this->assertEquals($expectedCount, $messageCount, 'RECEIVE_AND_DELETE second message, count decrements');

        // Unlock the first message

        $this->restProxy->unlockMessage($message);

        $messageCount = $this->restProxy->getQueue($this->queuename)->getQueueInfo()->getQueueDescription()->getMessageCount();
        self::write('Unlocked first message, Message count: ' . $messageCount);
        $this->assertEquals($expectedCount, $messageCount, 'Unlocked first message, count stays the same');

        // Get the first unlocked message

        // TODO: https://github.com/WindowsAzure/azure-sdk-for-php/issues/429
//        $message3 = $this->restProxy->receiveQueueMessage($this->queuename);
        $message1again = $this->restProxy->receiveQueueMessage($this->queuename, new ReceiveMessageOptions());
        $this->printMessageInfo($message1again, '$message1again');
        // Should be the original, now that it is unlocked
        $this->compareMessages($expectedMessages[0], $message1again);

        $messageCount = $this->restProxy->getQueue($this->queuename)->getQueueInfo()->getQueueDescription()->getMessageCount();
        self::write('Got message one again, Message count: ' . $messageCount);
        $expectedCount--;
        $this->assertEquals($expectedCount, $messageCount, 'Got message one again (destructive), count should decrease');

        try {
            $this->restProxy->deleteMessage($message1again);
            $this->fail('Deleting a RECEIVEANDDELETE messasge should fail');
        } catch (ServiceException $ex) {
            // TODO: Should be a different exception
            // https://github.com/WindowsAzure/azure-sdk-for-php/issues/470
            $this->assertEquals(500, $ex->getCode(), 'Expect failure error code when deleting RECEIVEANDDELETE messasge');
        }

        // Get the thrid

        $message3 = $this->restProxy->receiveQueueMessage($this->queuename, $this->PEEK_LOCK);
        $this->printMessageInfo($message3, '$message3');
        $this->compareMessages($expectedMessages[2], $message3);

        $messageCount = $this->restProxy->getQueue($this->queuename)->getQueueInfo()->getQueueDescription()->getMessageCount();
        self::write('Got thrid message, Message count: ' . $messageCount);
        $this->assertEquals($expectedCount, $messageCount, 'Peeked thrid message, count should not change');

        $this->restProxy->deleteMessage($message3);

        $expectedCount--;
        $messageCount = $this->restProxy->getQueue($this->queuename)->getQueueInfo()->getQueueDescription()->getMessageCount();
        self::write('Deleted thrid message, Message count: ' . $messageCount);
        $this->assertEquals($expectedCount, $messageCount, 'Deleted thrid message, count decrements');

        // Get the fourth

        $message4 = $this->restProxy->receiveQueueMessage($this->queuename, $this->RECEIVE_AND_DELETE_5_SECONDS);
        $this->printMessageInfo($message4, '$message4');
        $this->compareMessages($expectedMessages[3], $message4);

        $messageCount = $this->restProxy->getQueue($this->queuename)->getQueueInfo()->getQueueDescription()->getMessageCount();
        self::write('Got fourth message, Message count: ' . $messageCount);
        $expectedCount--;
        $this->assertEquals($expectedCount, $messageCount, 'Got fourth message, count should decrement');
    }

    private function printMessageInfo($message, $name)
    {
        self::write('Received ' . $name . ' Label :' . $message->getLabel());
        self::write('Properties count:' . count($message->getProperties()));
        foreach($message->getProperties() as $propName => $propValue)  {
            self::write('    [' . $propName . ']:' . $propValue);
        }
    }

    private function compareMessages(BrokeredMessage $expectedMessage, BrokeredMessage $actualMessage)
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

        $expectedProperties = $expectedMessage->getProperties();
        $actualProperties = $actualMessage->getProperties();
        // TODO: https://github.com/WindowsAzure/azure-sdk-for-php/issues/406
//        $this->assertEquals(count($expectedProperties), count($actualProperties), 'count(getProperties)');
        $customProperties = $this->getCustomProperties();
        foreach ($customProperties as $key => $value) {
            $this->assertEquals(
                    $value,
                    // TODO: https://github.com/WindowsAzure/azure-sdk-for-php/issues/406
//                    $actualProperties[$key],
                    self::CustomPropertiesMapper_fromString($actualProperties[$key]),
                    'getProperties[' . $key . ']');
        }
    }

    // TODO: Remove when fixed
    // https://github.com/WindowsAzure/azure-sdk-for-php/issues/406
    private static function CustomPropertiesMapper_toString($value)
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
    private static function CustomPropertiesMapper_fromString($value)
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

    private static function write($message)
    {
        if (self::$verbose) {
            echo $message . "\n";
        }
    }
}
?>
