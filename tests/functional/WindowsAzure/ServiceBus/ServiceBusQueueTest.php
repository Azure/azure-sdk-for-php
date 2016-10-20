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


use WindowsAzure\Common\Internal\Resources;
use WindowsAzure\ServiceBus\Models\BrokeredMessage;
use WindowsAzure\ServiceBus\Models\BrokerProperties;
use WindowsAzure\ServiceBus\Models\ListQueuesOptions;
use WindowsAzure\ServiceBus\Models\ReceiveMessageOptions;
use WindowsAzure\ServiceBus\Models\QueueInfo;

class ServiceBusQueueTest extends ScenarioTestBase
{
    private $queueName = 'testMyq';
    private $RECEIVE_AND_DELETE_5_SECONDS;
    private $PEEK_LOCK;

    /**
     * @covers \WindowsAzure\ServiceBus\ServiceBusRestProxy::deleteQueue
     * @covers \WindowsAzure\ServiceBus\ServiceBusRestProxy::listQueues
     */
    public function testSendMessage()
    {
        $this->RECEIVE_AND_DELETE_5_SECONDS = new ReceiveMessageOptions();
        $this->RECEIVE_AND_DELETE_5_SECONDS->setReceiveAndDelete();
        $this->RECEIVE_AND_DELETE_5_SECONDS->setTimeout(5);

        $this->PEEK_LOCK = new ReceiveMessageOptions();
        $this->PEEK_LOCK->setPeekLock();
        $this->PEEK_LOCK->setTimeout(20);

        $this->queueName .= time();

        $this->setupQueue();

        $expectedMessages = $this->sendMessages();

        $this->peekLockTest($expectedMessages);

        self::write('Deleting queue '.$this->queueName);
        $this->serviceBusWrapper->deleteQueue($this->queueName);
        self::write('Deleted queue '.$this->queueName);
    }

    /**
     * @covers \WindowsAzure\ServiceBus\ServiceBusRestProxy::createQueue
     * @covers \WindowsAzure\ServiceBus\ServiceBusRestProxy::deleteQueue
     * @covers \WindowsAzure\ServiceBus\ServiceBusRestProxy::getQueue
     * @covers \WindowsAzure\ServiceBus\ServiceBusRestProxy::listQueues
     */
    private function setupQueue()
    {
        $options = new ListQueuesOptions();
        $options->setSkip(20);
        $options->setTop(2);
        $queues = $this->serviceBusWrapper->listQueues($options)->getQueueInfos();
        foreach ($queues as $queue) {
            self::write('Queue name is '.$queue->getTitle());
        }

        self::write('checking if queue already exists '.$this->queueName);
        try {
            $this->serviceBusWrapper->getQueue($this->queueName);
            self::write('Queue already exists deleting it');
            $this->serviceBusWrapper->deleteQueue($this->queueName);
        } catch (\Exception $e) {
            self::write('could not get an existing queue ('.$e->getCode().'), proceeding...');
        }

        $q = new QueueInfo($this->queueName);
        $q->setEnableBatchedOperations(true);
        $q->setMaxDeliveryCount(10);
        $q->setMaxSizeInMegabytes(1024);
        $q->setRequiresDuplicateDetection(true);

        self::write('Creating queue '.$this->queueName);

        $this->serviceBusWrapper->createQueue($q);
        $this->serviceBusWrapper->getQueue($this->queueName);
    }

    /**
     * @covers \WindowsAzure\ServiceBus\ServiceBusRestProxy::sendQueueMessage
     *
     * @return BrokeredMessage[]
     */
    private function sendMessages()
    {
        $messages = [];
        $messages[] = $this->createIssueMessage('1', 'First  message information', 'label1', 'location1');
        $messages[] = $this->createIssueMessage('2', 'Second message information', 'label2', 'location2');
        $messages[] = $this->createIssueMessage('3', 'Third  message information', 'label3', 'location3');
        $messages[] = $this->createIssueMessage('4', 'Fourth message information', 'label4', 'location4');
        foreach ($messages as $message) {
            $this->serviceBusWrapper->sendQueueMessage($this->queueName, $message);
            $data = $message->getBody();
            self::write('Message sent with id: '.$message->getMessageId().' Body of $message '.$data);
        }

        return $messages;
    }

    /**
     * @param $issueId
     * @param $issueBody
     * @param $label
     * @param $messageLocation
     * @return BrokeredMessage
     */
    private function createIssueMessage($issueId, $issueBody, $label, $messageLocation)
    {
        $message = new BrokeredMessage($issueBody);

        $bp = new BrokerProperties();
        $bp->setLabel($label);
//        $bp->setMessageLocation($messageLocation);
        $bp->setReplyTo('test@test.com');
        $bp->setMessageId($issueId);
        $bp->setCorrelationId('correlationid' + $label);
        $bp->setDeliveryCount(1);
        $bp->setLockedUntilUtc(new \DateTime('2/4/1984'));
        $bp->setLockLocation($label + 'locallocation');
        $bp->setLockToken($label + 'locltoken');
        $bp->setSequenceNumber(12);
        $message->setBrokerProperties($bp);

        $message->setContentType('text/xml');
        $message->setLabel($label);
        $message->setReplyTo('1@1.com');
        $message->setMessageId($issueId);

        $customProperties = $this->getCustomProperties(1);
        foreach ($customProperties as $key => $value) {
            $message->setProperty($key, $value);
        }

        return $message;
    }

    /**
     * @covers \WindowsAzure\ServiceBus\ServiceBusRestProxy::deleteMessage
     * @covers \WindowsAzure\ServiceBus\ServiceBusRestProxy::getQueue
     * @covers \WindowsAzure\ServiceBus\ServiceBusRestProxy::receiveQueueMessage
     * @covers \WindowsAzure\ServiceBus\ServiceBusRestProxy::unlockMessage
     *
     * @param BrokeredMessage[] $expectedMessages
     */
    private function peekLockTest(array $expectedMessages)
    {
        $expectedCount = count($expectedMessages);
        self::write('Receiving queue messages '.$this->queueName);
        $messageCount = $this->serviceBusWrapper->getQueue($this->queueName)->getMessageCount();
        self::write('Before getting any messages, Message count: '.$messageCount);
        $this->assertEquals($expectedCount, $messageCount, 'Before getting any messages');

        // Get the first message

        $message = $this->serviceBusWrapper->receiveQueueMessage($this->queueName, $this->PEEK_LOCK);
        $this->compareMessages($expectedMessages[0], $message);

        $messageCount = $this->serviceBusWrapper->getQueue($this->queueName)->getMessageCount();
        self::write('Peek locked first message, Message count: '.$messageCount);
        $this->assertEquals($expectedCount, $messageCount, 'Peek locked first message, count should not change');

        // Get the second message

        $message2 = $this->serviceBusWrapper->receiveQueueMessage($this->queueName, $this->RECEIVE_AND_DELETE_5_SECONDS);
        --$expectedCount;
        $this->compareMessages($expectedMessages[1], $message2);

        $messageCount = $this->serviceBusWrapper->getQueue($this->queueName)->getMessageCount();
        self::write('RECEIVE_AND_DELETE second message, Message count: '.$messageCount);
        $this->assertEquals($expectedCount, $messageCount, 'RECEIVE_AND_DELETE second message, count decrements');

        // Unlock the first message

        $this->serviceBusWrapper->unlockMessage($message);

        $messageCount = $this->serviceBusWrapper->getQueue($this->queueName)->getMessageCount();
        self::write('Unlocked first message, Message count: '.$messageCount);
        $this->assertEquals($expectedCount, $messageCount, 'Unlocked first message, count stays the same');

        // Get the first unlocked message

        $message1again = $this->serviceBusWrapper->receiveQueueMessage($this->queueName);
        --$expectedCount;
        // Should be the original, now that it is unlocked
        $this->compareMessages($expectedMessages[0], $message1again);

        $messageCount = $this->serviceBusWrapper->getQueue($this->queueName)->getMessageCount();
        self::write('got first message again, Message count: '.$messageCount);
        $this->assertEquals($expectedCount, $messageCount, 'Got message one again (destructive), count should decrease');

        try {
            $this->serviceBusWrapper->deleteMessage($message1again);
            $this->fail('Deleting a RECEIVEANDDELETE messasge should fail');
        } catch (\InvalidArgumentException $ex) {
            $this->assertEquals(
                    Resources::MISSING_LOCK_LOCATION_MSG, $ex->getMessage(),
                    'exception message for deleting a RECEIVEANDDELETE message');
        }

        // Get the third

        $message3 = $this->serviceBusWrapper->receiveQueueMessage($this->queueName, $this->PEEK_LOCK);
        $this->compareMessages($expectedMessages[2], $message3);

        $messageCount = $this->serviceBusWrapper->getQueue($this->queueName)->getMessageCount();
        self::write('Got third message, Message count: '.$messageCount);
        $this->assertEquals($expectedCount, $messageCount, 'Peeked third message, count should not change');

        $this->serviceBusWrapper->deleteMessage($message3);
        --$expectedCount;

        $messageCount = $this->serviceBusWrapper->getQueue($this->queueName)->getMessageCount();
        self::write('Deleted third message, Message count: '.$messageCount);
        $this->assertEquals($expectedCount, $messageCount, 'Deleted third message, count decrements');

        // Get the fourth

        $message4 = $this->serviceBusWrapper->receiveQueueMessage(
            $this->queueName, $this->RECEIVE_AND_DELETE_5_SECONDS);
        --$expectedCount;
        $this->compareMessages($expectedMessages[3], $message4);

        $messageCount = $this->serviceBusWrapper->getQueue($this->queueName)->getMessageCount();
        self::write('Got fourth message, Message count: '.$messageCount);
        $this->assertEquals($expectedCount, $messageCount, 'Got fourth message, count should decrement');
    }
}
