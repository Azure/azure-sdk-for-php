<?php

/**
 * Functional tests for the SDK
 *
 * PHP version 5
 *
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
 * @category   Microsoft
 * @package    Tests\Functional\WindowsAzure\Queue
 * @author     Jason Cooke <jcooke@microsoft.com>
 * @copyright  2012 Microsoft Corporation
 * @license    http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link       http://pear.php.net/package/azure-sdk-for-php
 */

namespace Tests\Functional\WindowsAzure\Queue;

use WindowsAzure\Common\Internal\ServiceException;
use WindowsAzure\Common\Configuration;
use WindowsAzure\Queue\QueueService;
use WindowsAzure\Queue\Models\ListQueuesOptions;
use WindowsAzure\Queue\Models\ListQueuesResult;
use WindowsAzure\Queue\Models\CreateQueueOptions;
use WindowsAzure\Queue\Models\ListMessagesOptions;
use WindowsAzure\Queue\Models\PeekMessagesOptions;

class QueueServiceIntegrationTest extends IntegrationTestBase {
    private static $testQueuesPrefix = 'sdktest-';
    private static $createableQueuesPrefix = 'csdktest-';
    private static $TEST_QUEUE_FOR_MESSAGES;
    private static $TEST_QUEUE_FOR_MESSAGES_2;
    private static $TEST_QUEUE_FOR_MESSAGES_3;
    private static $TEST_QUEUE_FOR_MESSAGES_4;
    private static $TEST_QUEUE_FOR_MESSAGES_5;
    private static $TEST_QUEUE_FOR_MESSAGES_6;
    private static $TEST_QUEUE_FOR_MESSAGES_7;
    private static $TEST_QUEUE_FOR_MESSAGES_8;
    private static $CREATABLE_QUEUE_1;
    private static $CREATABLE_QUEUE_2;
    private static $CREATABLE_QUEUE_3;
    private static $creatableQueues;
    private static $testQueues;

    public function setUp() {
        parent::setUp();
        // Setup container names array (list of container names used by
        // integration tests)
        self::$testQueues = array();
        for ($i = 0; $i < 10; $i++) {
            self::$testQueues[$i] = self::$testQueuesPrefix . round( gettimeofday(true)) . ($i + 1);
        }

        self::$creatableQueues = array();
        for ($i = 0; $i < 3; $i++) {
            self::$creatableQueues[$i] = self::$createableQueuesPrefix . ($i + 1);
        }

        self::$TEST_QUEUE_FOR_MESSAGES = self::$testQueues[0];
        self::$TEST_QUEUE_FOR_MESSAGES_2 = self::$testQueues[1];
        self::$TEST_QUEUE_FOR_MESSAGES_3 = self::$testQueues[2];
        self::$TEST_QUEUE_FOR_MESSAGES_4 = self::$testQueues[3];
        self::$TEST_QUEUE_FOR_MESSAGES_5 = self::$testQueues[4];
        self::$TEST_QUEUE_FOR_MESSAGES_6 = self::$testQueues[5];
        self::$TEST_QUEUE_FOR_MESSAGES_7 = self::$testQueues[6];
        self::$TEST_QUEUE_FOR_MESSAGES_8 = self::$testQueues[7];

        self::$CREATABLE_QUEUE_1 = self::$creatableQueues[0];
        self::$CREATABLE_QUEUE_2 = self::$creatableQueues[1];
        self::$CREATABLE_QUEUE_3 = self::$creatableQueues[2];

        // Create all test containers and their content

        self::createQueues(self::$testQueuesPrefix, self::$testQueues);
    }

    public function tearDown() {
        parent::tearDown();
        self::deleteQueues(self::$testQueuesPrefix, self::$testQueues);
        self::deleteQueues(self::$createableQueuesPrefix, self::$creatableQueues);
    }

    /**
    * @covers WindowsAzure\Queue\Internal\QueueRestProxy::createQueue
    */
    private function createQueues($prefix, $list) {
        $containers = self::listQueues($prefix);
        foreach($list as $item)  {
            if (!in_array($item, $containers)) {
                $this->wrapper->createQueue($item);
            }
        }
    }

    /**
    * @covers WindowsAzure\Queue\Internal\QueueRestProxy::deleteQueue
    */
    private function deleteQueues($prefix, $list) {
        $containers = self::listQueues($prefix);
        foreach($list as $item)  {
            if (in_array($item, $containers)) {
                $this->wrapper->deleteQueue($item);
            }
        }
    }

    /**
    * @covers WindowsAzure\Queue\Internal\QueueRestProxy::listQueues
    */
    private function listQueues($prefix) {
        $result = array();
        $opts = new ListQueuesOptions();
        $opts->setPrefix($prefix);
        $list = $this->wrapper->listQueues($opts);
        foreach($list->getQueues() as $item)  {
            array_push($result, $item->getName());
        }
        return $result;
    }

    /**
    * @covers WindowsAzure\Queue\Internal\QueueRestProxy::getServiceProperties
    */
    public function testGetServicePropertiesWorks() {
        // Arrange

        // Act
        $shouldReturn = false;
        try {
            $props = $this->wrapper->getServiceProperties()->getValue();
            $this->assertFalse(Configuration::isEmulated(), 'Should succeed when not running in emulator');
        } catch (ServiceException $e) {
            // Expect failure in emulator, as v1.6 doesn't support this method
            if (Configuration::isEmulated()) {
                $this->assertEquals(400, $e->getCode(), 'getCode');
                $shouldReturn = true;
            }
        }
        if($shouldReturn) {
            return;
        }

        // Assert
        $this->assertNotNull($props, '$props');
        $this->assertNotNull($props->getLogging(), '$props->getLogging');
        $this->assertNotNull($props->getLogging()->getRetentionPolicy(), '$props->getLogging()->getRetentionPolicy');
        $this->assertNotNull($props->getLogging()->getVersion(), '$props->getLogging()->getVersion');
        $this->assertNotNull($props->getMetrics()->getRetentionPolicy(), '$props->getMetrics()->getRetentionPolicy');
        $this->assertNotNull($props->getMetrics()->getVersion(), '$props->getMetrics()->getVersion');
    }

    /**
    * @covers WindowsAzure\Queue\Internal\QueueRestProxy::getServiceProperties
    * @covers WindowsAzure\Queue\Internal\QueueRestProxy::setServiceProperties
    */
    public function testSetServicePropertiesWorks() {
        // Arrange

        // Act
        $shouldReturn = false;
        try {
            $props = $this->wrapper->getServiceProperties()->getValue();
            $this->assertFalse(Configuration::isEmulated(), 'Should succeed when not running in emulator');
        } catch (ServiceException $e) {
            // Expect failure in emulator, as v1.6 doesn't support this method
            if (Configuration::isEmulated()) {
                $this->assertEquals(400, $e->getCode(), 'getCode');
                $shouldReturn = true;
            }
        }
        if($shouldReturn) {
            return;
        }

        $props->getLogging()->setRead(true);
        $this->wrapper->setServiceProperties($props);

        $props = $this->wrapper->getServiceProperties()->getValue();

        // Assert
        $this->assertNotNull($props, '$props');
        $this->assertNotNull($props->getLogging(), '$props->getLogging');
        $this->assertNotNull($props->getLogging()->getRetentionPolicy(), '$props->getLogging()->getRetentionPolicy');
        $this->assertNotNull($props->getLogging()->getVersion(), '$props->getLogging()->getVersion');
        $this->assertTrue($props->getLogging()->getRead(), '$props->getLogging()->getRead');
        $this->assertNotNull($props->getMetrics()->getRetentionPolicy(), '$props->getMetrics()->getRetentionPolicy');
        $this->assertNotNull($props->getMetrics()->getVersion(), '$props->getMetrics()->getVersion');
    }

    /**
    * @covers WindowsAzure\Queue\Internal\QueueRestProxy::createQueue
    * @covers WindowsAzure\Queue\Internal\QueueRestProxy::deleteQueue
    * @covers WindowsAzure\Queue\Internal\QueueRestProxy::getQueueMetadata
    */
    public function testCreateQueueWorks() {
        // Arrange

        // Act
        $this->wrapper->createQueue(self::$CREATABLE_QUEUE_1);
        $result = $this->wrapper->getQueueMetadata(self::$CREATABLE_QUEUE_1);
        $this->wrapper->deleteQueue(self::$CREATABLE_QUEUE_1);

        // Assert
        $this->assertNotNull($result, 'result');
        $this->assertEquals(0, $result->getApproximateMessageCount(), '$result->getApproximateMessageCount');
        $this->assertNotNull($result->getMetadata(), '$result->getMetadata');
        $this->assertEquals(0, count($result->getMetadata()), 'count($result->getMetadata');
    }

    /**
    * @covers WindowsAzure\Queue\Internal\QueueRestProxy::createQueue
    * @covers WindowsAzure\Queue\Internal\QueueRestProxy::deleteQueue
    * @covers WindowsAzure\Queue\Internal\QueueRestProxy::getQueueMetadata
    */
    public function testCreateQueueWithOptionsWorks() {
        // Arrange

        // Act
        $opts = new CreateQueueOptions();
        $opts->addMetadata('foo', 'bar');
        $opts->addMetadata('test', 'blah');
        $this->wrapper->createQueue(self::$CREATABLE_QUEUE_2, $opts);
        $result = $this->wrapper->getQueueMetadata(self::$CREATABLE_QUEUE_2);
        $this->wrapper->deleteQueue(self::$CREATABLE_QUEUE_2);

        // Assert
        $this->assertNotNull($result, '$result');
        $this->assertEquals(0, $result->getApproximateMessageCount(), '$result->getApproximateMessageCount');
        $this->assertNotNull($result->getMetadata(), '$result->getMetadata');
        $this->assertEquals(2, count($result->getMetadata()), 'count($result->getMetadata');
        $metadata = $result->getMetadata();
        $this->assertEquals('bar', $metadata['foo'], '$metadata[foo]');
        $this->assertEquals('blah', $metadata['test'], '$metadata[test]');
    }

    /**
    * @covers WindowsAzure\Queue\Internal\QueueRestProxy::listQueues
    */
    public function testListQueuesWorks() {
        // Arrange

        // Act
        $result = $this->wrapper->listQueues();

        // Assert
        $this->assertNotNull($result, '$result');
        $this->assertNotNull($result->getQueues(), '$result->getQueues');

        // TODO: Uncomment when the following issue is fixed:
        // https://github.com/WindowsAzure/azure-sdk-for-php/issues/98
        // $this->assertNotNull($result->getAccountName(), '$result->getAccountName()');
        $this->assertEquals('', $result->getMarker(), '$result->getMarker');
        $this->assertNull($result->getMaxResults(), '$result->getMaxResults');
        $this->assertTrue(count(self::$testQueues) <= count($result->getQueues()), 'counts');
    }

    /**
    * @covers WindowsAzure\Queue\Internal\QueueRestProxy::listQueues
    */
    public function testListQueuesWithOptionsWorks() {
        // Arrange

        // Act
        $opts = new ListQueuesOptions();
        // TODO: Revert this change when fixed:
        // https://github.com/WindowsAzure/azure-sdk-for-php/issues/100
        //$opts->setMaxResults(3);
        $opts->setMaxResults('3');
        $opts->setIncludeMetadata(true);
        $opts->setPrefix(self::$testQueuesPrefix);
        $result = $this->wrapper->listQueues($opts);

        $opts = new ListQueuesOptions();
        $opts->setMarker($result->getNextMarker());
        $opts->setIncludeMetadata(false);
        $opts->setPrefix(self::$testQueuesPrefix);
        $result2 = $this->wrapper->listQueues($opts);

        // Assert
        $this->assertNotNull($result, '$result');
        $this->assertNotNull($result->getQueues(), '$result->getQueues');
        $this->assertEquals(3, count($result->getQueues()), 'count($result->getQueues');
        $this->assertEquals(3, $result->getMaxResults(), '$result->getMaxResults');
        // TODO: Uncomment when the following issue is fixed:
        // https://github.com/WindowsAzure/azure-sdk-for-php/issues/98
        // $this->assertNotNull($result->getAccountName(), '$result->getAccountName()');
        $this->assertNull($result->getMarker(), '$result->getMarker');
        $queue0 = $result->getQueues();
        $queue0 = $queue0[0];
        $this->assertNotNull($queue0, '$queue0');
        $this->assertNotNull($queue0->getMetadata(), '$queue0->getMetadata');
        $this->assertNotNull($queue0->getName(), '$queue0->getName');
        $this->assertNotNull($queue0->getUrl(), '$queue0->getUrl');

        $this->assertNotNull($result2, '$result2');
        $this->assertNotNull($result2->getQueues(), '$result2->getQueues');
        $this->assertTrue(count(self::$testQueues) - 3 <= count($result2->getQueues()), 'count');
        $this->assertEquals(0, $result2->getMaxResults(), '$result2->getMaxResults');
        // TODO: Uncomment when the following issue is fixed:
        // https://github.com/WindowsAzure/azure-sdk-for-php/issues/98
        // $this->assertNotNull($result2->getAccountName(), '$result2->getAccountName()');
        $this->assertEquals($result->getNextMarker(), $result2->getMarker(), '$result2->getMarker');
        $queue20 = $result2->getQueues();
        $queue20 = $queue20[0];
        $this->assertNotNull($queue20, '$queue20');
        $this->assertNull($queue20->getMetadata(), '$queue20->getMetadata');
        $this->assertNotNull($queue20->getName(), '$queue20->getName');
        $this->assertNotNull($queue20->getUrl(), '$queue20->getUrl');
    }

    /**
    * @covers WindowsAzure\Queue\Internal\QueueRestProxy::createQueue
    * @covers WindowsAzure\Queue\Internal\QueueRestProxy::deleteQueue
    * @covers WindowsAzure\Queue\Internal\QueueRestProxy::getQueueMetadata
    * @covers WindowsAzure\Queue\Internal\QueueRestProxy::setQueueMetadata
    */
    public function testSetQueueMetadataWorks() {
        // Arrange

        // Act
        $this->wrapper->createQueue(self::$CREATABLE_QUEUE_3);

        $metadata = array(
            'foo' => 'bar',
            'test' => 'blah',
            );
        $this->wrapper->setQueueMetadata(self::$CREATABLE_QUEUE_3, $metadata);

        $result = $this->wrapper->getQueueMetadata(self::$CREATABLE_QUEUE_3);

        $this->wrapper->deleteQueue(self::$CREATABLE_QUEUE_3);

        // Assert
        $this->assertNotNull($result, '$result');
        $this->assertEquals(0, $result->getApproximateMessageCount(), '$result->getApproximateMessageCount');
        $this->assertNotNull($result->getMetadata(), '$result->getMetadata');
        $this->assertEquals(2, count($result->getMetadata()), 'count($result->getMetadata');
        $metadata = $result->getMetadata();
        $this->assertEquals('bar', $metadata['foo'], '$metadata[\'foo\']');
        $this->assertEquals('blah', $metadata['test'], '$metadata[\'test\']');
    }

    /**
    * @covers WindowsAzure\Queue\Internal\QueueRestProxy::createMessage
    */
    public function testCreateMessageWorks() {
        // Arrange

        // Act
        $this->wrapper->createMessage(self::$TEST_QUEUE_FOR_MESSAGES, 'message1');
        $this->wrapper->createMessage(self::$TEST_QUEUE_FOR_MESSAGES, 'message2');
        $this->wrapper->createMessage(self::$TEST_QUEUE_FOR_MESSAGES, 'message3');
        $this->wrapper->createMessage(self::$TEST_QUEUE_FOR_MESSAGES, 'message4');

        // Assert
        $this->assertTrue(true, 'if get there, it is working');
    }

    /**
    * @covers WindowsAzure\Queue\Internal\QueueRestProxy::createMessage
    * @covers WindowsAzure\Queue\Internal\QueueRestProxy::listMessages
    */
    public function testListMessagesWorks() {
        // Arrange
        $year2010 = new \DateTime;
        $year2010->setDate(2010, 1, 1);

        // Act
        $this->wrapper->createMessage(self::$TEST_QUEUE_FOR_MESSAGES_2, 'message1');
        $this->wrapper->createMessage(self::$TEST_QUEUE_FOR_MESSAGES_2, 'message2');
        $this->wrapper->createMessage(self::$TEST_QUEUE_FOR_MESSAGES_2, 'message3');
        $this->wrapper->createMessage(self::$TEST_QUEUE_FOR_MESSAGES_2, 'message4');
        $result = $this->wrapper->listMessages(self::$TEST_QUEUE_FOR_MESSAGES_2);

        // Assert
        $this->assertNotNull($result, '$result');
        $this->assertEquals(1, count($result->getQueueMessages()), 'count($result->getQueueMessages');

        $entry = $result->getQueueMessages();
        $entry = $entry[0];

        $this->assertNotNull($entry->getMessageId(), '$entry->getMessageId');
        $this->assertNotNull($entry->getMessageText(), '$entry->getMessageText');
        $this->assertNotNull($entry->getPopReceipt(), '$entry->getPopReceipt');
        $this->assertEquals(1, $entry->getDequeueCount(), '$entry->getDequeueCount');

        $this->assertNotNull($entry->getExpirationDate(), '$entry->getExpirationDate');
        $this->assertTrue($year2010 < $entry->getExpirationDate(), 'diff');

        $this->assertNotNull($entry->getInsertionDate(), '$entry->getInsertionDate');
        $this->assertTrue($year2010 < $entry->getInsertionDate(), 'diff');

        $this->assertNotNull($entry->getTimeNextVisible(), '$entry->getTimeNextVisible');
        $this->assertTrue($year2010 < $entry->getTimeNextVisible(), 'diff');
    }

    /**
    * @covers WindowsAzure\Queue\Internal\QueueRestProxy::createMessage
    * @covers WindowsAzure\Queue\Internal\QueueRestProxy::listMessages
    */
    public function testListMessagesWithOptionsWorks() {
        // Arrange
        $year2010 = new \DateTime;
        $year2010->setDate(2010, 1, 1);

        // Act
        $this->wrapper->createMessage(self::$TEST_QUEUE_FOR_MESSAGES_3, 'message1');
        $this->wrapper->createMessage(self::$TEST_QUEUE_FOR_MESSAGES_3, 'message2');
        $this->wrapper->createMessage(self::$TEST_QUEUE_FOR_MESSAGES_3, 'message3');
        $this->wrapper->createMessage(self::$TEST_QUEUE_FOR_MESSAGES_3, 'message4');
        $opts = new ListMessagesOptions();
        $opts->setNumberOfMessages(4);
        $opts->setVisibilityTimeoutInSeconds(20);
        $result = $this->wrapper->listMessages(self::$TEST_QUEUE_FOR_MESSAGES_3, $opts);

        // Assert
        $this->assertNotNull($result, '$result');
        $this->assertEquals(4, count($result->getQueueMessages()), 'count($result->getQueueMessages())');
        for ($i = 0; $i < 4; $i++) {
            $entry = $result->getQueueMessages();
            $entry = $entry[$i];

            $this->assertNotNull($entry->getMessageId(), '$entry->getMessageId()');
            $this->assertNotNull($entry->getMessageText(), '$entry->getMessageText()');
            $this->assertNotNull($entry->getPopReceipt(), '$entry->getPopReceipt()');
            $this->assertEquals(1, $entry->getDequeueCount(), '$entry->getDequeueCount()');

            $this->assertNotNull($entry->getExpirationDate(), '$entry->getExpirationDate()');
            $this->assertTrue($year2010 < $entry->getExpirationDate(), '$year2010 < $entry->getExpirationDate()');

            $this->assertNotNull($entry->getInsertionDate(), '$entry->getInsertionDate()');
            $this->assertTrue($year2010 < $entry->getInsertionDate(), '$year2010 < $entry->getInsertionDate()');

            $this->assertNotNull($entry->getTimeNextVisible(), '$entry->getTimeNextVisible()');
            $this->assertTrue($year2010 < $entry->getTimeNextVisible(), '$year2010 < $entry->getTimeNextVisible()');
        }
    }

    /**
    * @covers WindowsAzure\Queue\Internal\QueueRestProxy::createMessage
    * @covers WindowsAzure\Queue\Internal\QueueRestProxy::peekMessages
    */
    public function testPeekMessagesWorks() {
        // Arrange

        $year2010 = new \DateTime;
        $year2010->setDate(2010, 1, 1);

        // Act
        $this->wrapper->createMessage(self::$TEST_QUEUE_FOR_MESSAGES_4, 'message1');
        $this->wrapper->createMessage(self::$TEST_QUEUE_FOR_MESSAGES_4, 'message2');
        $this->wrapper->createMessage(self::$TEST_QUEUE_FOR_MESSAGES_4, 'message3');
        $this->wrapper->createMessage(self::$TEST_QUEUE_FOR_MESSAGES_4, 'message4');
        $result = $this->wrapper->peekMessages(self::$TEST_QUEUE_FOR_MESSAGES_4);

        // Assert
        $this->assertNotNull($result, '$result');
        $this->assertEquals(1, count($result->getQueueMessages()), 'count($result->getQueueMessages())');

        $entry = $result ->getQueueMessages();
        $entry = $entry[0];

        $this->assertNotNull($entry->getMessageId(), '$entry->getMessageId()');
        $this->assertNotNull($entry->getMessageText(), '$entry->getMessageText()');
        $this->assertEquals(0, $entry->getDequeueCount(), '$entry->getDequeueCount()');

        $this->assertNotNull($entry->getExpirationDate(), '$entry->getExpirationDate()');
        $this->assertTrue($year2010 < $entry->getExpirationDate(), '$year2010 < $entry->getExpirationDate()');

        $this->assertNotNull($entry->getInsertionDate(), '$entry->getInsertionDate()');
        $this->assertTrue($year2010 < $entry->getInsertionDate(), '$year2010 < $entry->getInsertionDate()');
    }

    /**
    * @covers WindowsAzure\Queue\Internal\QueueRestProxy::createMessage
    * @covers WindowsAzure\Queue\Internal\QueueRestProxy::peekMessages
    */
    public function testPeekMessagesWithOptionsWorks() {
        // Arrange
        $year2010 = new \DateTime;
        $year2010->setDate(2010, 1, 1);

        // Act
        $this->wrapper->createMessage(self::$TEST_QUEUE_FOR_MESSAGES_5, 'message1');
        $this->wrapper->createMessage(self::$TEST_QUEUE_FOR_MESSAGES_5, 'message2');
        $this->wrapper->createMessage(self::$TEST_QUEUE_FOR_MESSAGES_5, 'message3');
        $this->wrapper->createMessage(self::$TEST_QUEUE_FOR_MESSAGES_5, 'message4');
        $opts = new PeekMessagesOptions();
        $opts->setNumberOfMessages(4);
        $result = $this->wrapper->peekMessages(self::$TEST_QUEUE_FOR_MESSAGES_5, $opts);

        // Assert
        $this->assertNotNull($result, '$result');
        $this->assertEquals(4, count($result->getQueueMessages()), 'count($result->getQueueMessages())');
        for ($i = 0; $i < 4; $i++) {
            $entry = $result ->getQueueMessages();
            $entry = $entry[$i];

            $this->assertNotNull($entry->getMessageId(), '$entry->getMessageId()');
            $this->assertNotNull($entry->getMessageText(), '$entry->getMessageText()');
            $this->assertEquals(0, $entry->getDequeueCount(), '$entry->getDequeueCount()');

            $this->assertNotNull($entry->getExpirationDate(), '$entry->getExpirationDate()');
            $this->assertTrue($year2010 < $entry->getExpirationDate(), '$year2010 < $entry->getExpirationDate()');

            $this->assertNotNull($entry->getInsertionDate(), '$entry->getInsertionDate()');
            $this->assertTrue($year2010 < $entry->getInsertionDate(), '$year2010 < $entry->getInsertionDate()');
        }
    }

    /**
    * @covers WindowsAzure\Queue\Internal\QueueRestProxy::clearMessages
    * @covers WindowsAzure\Queue\Internal\QueueRestProxy::createMessage
    * @covers WindowsAzure\Queue\Internal\QueueRestProxy::peekMessages
    */
    public function testClearMessagesWorks() {
        // Arrange

        // Act
        $this->wrapper->createMessage(self::$TEST_QUEUE_FOR_MESSAGES_6, 'message1');
        $this->wrapper->createMessage(self::$TEST_QUEUE_FOR_MESSAGES_6, 'message2');
        $this->wrapper->createMessage(self::$TEST_QUEUE_FOR_MESSAGES_6, 'message3');
        $this->wrapper->createMessage(self::$TEST_QUEUE_FOR_MESSAGES_6, 'message4');
        $this->wrapper->clearMessages(self::$TEST_QUEUE_FOR_MESSAGES_6);

        $result = $this->wrapper->peekMessages(self::$TEST_QUEUE_FOR_MESSAGES_6);

        // Assert
        $this->assertNotNull($result, '$result');
        $this->assertEquals(0, count($result->getQueueMessages()), 'count($result->getQueueMessages())');
    }

    /**
    * @covers WindowsAzure\Queue\Internal\QueueRestProxy::createMessage
    * @covers WindowsAzure\Queue\Internal\QueueRestProxy::deleteMessage
    * @covers WindowsAzure\Queue\Internal\QueueRestProxy::listMessages
    */
    public function testDeleteMessageWorks() {
        // Arrange

        // Act
        $this->wrapper->createMessage(self::$TEST_QUEUE_FOR_MESSAGES_7, 'message1');
        $this->wrapper->createMessage(self::$TEST_QUEUE_FOR_MESSAGES_7, 'message2');
        $this->wrapper->createMessage(self::$TEST_QUEUE_FOR_MESSAGES_7, 'message3');
        $this->wrapper->createMessage(self::$TEST_QUEUE_FOR_MESSAGES_7, 'message4');

        $result = $this->wrapper->listMessages(self::$TEST_QUEUE_FOR_MESSAGES_7);
        $message0 = $result->getQueueMessages();
        $message0 = $message0[0];

        $this->wrapper->deleteMessage(self::$TEST_QUEUE_FOR_MESSAGES_7, $message0->getMessageId(), $message0->getPopReceipt());
        $opts = new ListMessagesOptions();
        $opts->setNumberOfMessages(32);
        $result2 = $this->wrapper->listMessages(self::$TEST_QUEUE_FOR_MESSAGES_7, $opts);

        // Assert
        $this->assertNotNull($result2, '$result2');
        $this->assertEquals(3, count($result2->getQueueMessages()), 'count($result2->getQueueMessages())');
    }

    /**
    * @covers WindowsAzure\Queue\Internal\QueueRestProxy::createMessage
    * @covers WindowsAzure\Queue\Internal\QueueRestProxy::listMessages
    * @covers WindowsAzure\Queue\Internal\QueueRestProxy::updateMessage
    */
    public function testUpdateMessageWorks() {
        // Arrange
        $year2010 = new \DateTime;
        $year2010->setDate(2010, 1, 1);

        // Act
        $this->wrapper->createMessage(self::$TEST_QUEUE_FOR_MESSAGES_8, 'message1');

        $listResult1 = $this->wrapper->listMessages(self::$TEST_QUEUE_FOR_MESSAGES_8);
        $message0 = $listResult1->getQueueMessages();
        $message0 = $message0[0];

        // TODO: Change the last parameter to 0 when the following is fixed:
        // https://github.com/WindowsAzure/azure-sdk-for-php/issues/99
        // Also, remove the sleep.
        $updateResult = $this->wrapper->updateMessage(
                self::$TEST_QUEUE_FOR_MESSAGES_8,
                $message0->getMessageId(),
                $message0->getPopReceipt(),
                'new text',
                1);
        sleep(2);
        $listResult2 = $this->wrapper->listMessages(self::$TEST_QUEUE_FOR_MESSAGES_8);

        // Assert
        $this->assertNotNull($updateResult, '$updateResult');
        $this->assertNotNull($updateResult->getPopReceipt(), '$updateResult->getPopReceipt()');
        $this->assertNotNull($updateResult->getTimeNextVisible(), '$updateResult->getTimeNextVisible()');
        $this->assertTrue($year2010 < $updateResult->getTimeNextVisible(), '$year2010 < $updateResult->getTimeNextVisible()');

        $this->assertNotNull($listResult2, '$listResult2');
        $entry = $listResult2->getQueueMessages();
        $entry = $entry[0];

        $blarg = $listResult1->getQueueMessages();
        $blarg = $blarg[0];

        $this->assertEquals($blarg->getMessageId(), $entry->getMessageId(), '$entry->getMessageId()');
        $this->assertEquals('new text', $entry->getMessageText(), '$entry->getMessageText()');
        $this->assertNotNull($entry->getPopReceipt(), '$entry->getPopReceipt()');
        $this->assertEquals(2, $entry->getDequeueCount(), '$entry->getDequeueCount()');

        $this->assertNotNull($entry->getExpirationDate(), '$entry->getExpirationDate()');
        $this->assertTrue($year2010 < $entry->getExpirationDate(), '$year2010 < $entry->getExpirationDate()');

        $this->assertNotNull($entry->getInsertionDate(), '$entry->getInsertionDate()');
        $this->assertTrue($year2010 < $entry->getInsertionDate(), '$year2010 < $entry->getInsertionDate()');

        $this->assertNotNull($entry->getTimeNextVisible(), '$entry->getTimeNextVisible()');
        $this->assertTrue($year2010 < $entry->getTimeNextVisible(), '$year2010 < $entry->getTimeNextVisible()');

    }
}
