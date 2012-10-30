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
 * @package   Tests\Functional\WindowsAzure\Queue
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */

namespace Tests\Functional\WindowsAzure\Queue;

use Tests\Framework\TestResources;
use WindowsAzure\Common\ServiceException;
use WindowsAzure\Queue\Models\CreateQueueOptions;
use WindowsAzure\Queue\Models\ListMessagesOptions;
use WindowsAzure\Queue\Models\ListQueuesOptions;
use WindowsAzure\Queue\Models\PeekMessagesOptions;

class QueueServiceIntegrationTest extends IntegrationTestBase
{
    private static $testQueuesPrefix = 'sdktest-';
    private static $createableQueuesPrefix = 'csdktest-';
    private static $testQueueForMessages;
    private static $testQueueForMessages2;
    private static $testQueueForMessages3;
    private static $testQueueForMessages4;
    private static $testQueueForMessages5;
    private static $testQueueForMessages6;
    private static $testQueueForMessages7;
    private static $testQueueForMessages8;
    private static $creatableQueue1;
    private static $creatableQueue2;
    private static $creatableQueue3;
    private static $creatableQueues;
    private static $testQueues;

    public function setUp()
    {
        parent::setUp();
        // Setup container names array (list of container names used by
        // integration tests)
        self::$testQueues = array();
        $rint = mt_rand(0, 1000000);
        for ($i = 0; $i < 10; $i++) {
            self::$testQueues[$i] = self::$testQueuesPrefix . $rint . ($i + 1);
        }

        self::$creatableQueues = array();
        for ($i = 0; $i < 3; $i++) {
            self::$creatableQueues[$i] = self::$createableQueuesPrefix . $rint . ($i + 1);
        }

        self::$testQueueForMessages = self::$testQueues[0];
        self::$testQueueForMessages2 = self::$testQueues[1];
        self::$testQueueForMessages3 = self::$testQueues[2];
        self::$testQueueForMessages4 = self::$testQueues[3];
        self::$testQueueForMessages5 = self::$testQueues[4];
        self::$testQueueForMessages6 = self::$testQueues[5];
        self::$testQueueForMessages7 = self::$testQueues[6];
        self::$testQueueForMessages8 = self::$testQueues[7];

        self::$creatableQueue1 = self::$creatableQueues[0];
        self::$creatableQueue2 = self::$creatableQueues[1];
        self::$creatableQueue3 = self::$creatableQueues[2];

        // Create all test containers and their content

        self::createQueues(self::$testQueuesPrefix, self::$testQueues);
    }

    public function tearDown()
    {
        parent::tearDown();
        self::deleteQueues(self::$testQueuesPrefix, self::$testQueues);
        self::deleteQueues(self::$createableQueuesPrefix, self::$creatableQueues);
    }

    /**
    * @covers WindowsAzure\Queue\QueueRestProxy::createQueue
    */
    private function createQueues($prefix, $list)
    {
        $containers = self::listQueues($prefix);
        foreach($list as $item)  {
            if (!in_array($item, $containers)) {
                $this->restProxy->createQueue($item);
            }
        }
    }

    /**
    * @covers WindowsAzure\Queue\QueueRestProxy::deleteQueue
    */
    private function deleteQueues($prefix, $list)
    {
        $containers = self::listQueues($prefix);
        foreach($list as $item)  {
            if (in_array($item, $containers)) {
                $this->restProxy->deleteQueue($item);
            }
        }
    }

    /**
    * @covers WindowsAzure\Queue\QueueRestProxy::listQueues
    */
    private function listQueues($prefix)
    {
        $result = array();
        $opts = new ListQueuesOptions();
        $opts->setPrefix($prefix);
        $list = $this->restProxy->listQueues($opts);
        foreach($list->getQueues() as $item)  {
            array_push($result, $item->getName());
        }
        return $result;
    }

    /**
    * @covers WindowsAzure\Queue\QueueRestProxy::getServiceProperties
    */
    public function testGetServicePropertiesWorks()
    {
        // Arrange

        // Act
        $shouldReturn = false;
        try {
            $props = $this->restProxy->getServiceProperties()->getValue();
            $this->assertFalse($this->isEmulated(), 'Should succeed when not running in emulator');
        } catch (ServiceException $e) {
            // Expect failure in emulator, as v1.6 doesn't support this method
            if ($this->isEmulated()) {
                $this->assertEquals(TestResources::STATUS_BAD_REQUEST, $e->getCode(), 'getCode');
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
    * @covers WindowsAzure\Queue\QueueRestProxy::getServiceProperties
    * @covers WindowsAzure\Queue\QueueRestProxy::setServiceProperties
    */
    public function testSetServicePropertiesWorks()
    {
        // Arrange

        // Act
        $shouldReturn = false;
        try {
            $props = $this->restProxy->getServiceProperties()->getValue();
            $this->assertFalse($this->isEmulated(), 'Should succeed when not running in emulator');
        } catch (ServiceException $e) {
            // Expect failure in emulator, as v1.6 doesn't support this method
            if ($this->isEmulated()) {
                $this->assertEquals(TestResources::STATUS_BAD_REQUEST, $e->getCode(), 'getCode');
                $shouldReturn = true;
            }
        }
        if($shouldReturn) {
            return;
        }

        $props->getLogging()->setRead(true);
        $this->restProxy->setServiceProperties($props);

        $props = $this->restProxy->getServiceProperties()->getValue();

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
    * @covers WindowsAzure\Queue\QueueRestProxy::createQueue
    * @covers WindowsAzure\Queue\QueueRestProxy::deleteQueue
    * @covers WindowsAzure\Queue\QueueRestProxy::getQueueMetadata
    */
    public function testCreateQueueWorks()
    {
        // Arrange

        // Act
        $this->restProxy->createQueue(self::$creatableQueue1);
        $result = $this->restProxy->getQueueMetadata(self::$creatableQueue1);
        $this->restProxy->deleteQueue(self::$creatableQueue1);

        // Assert
        $this->assertNotNull($result, 'result');
        $this->assertEquals(0, $result->getApproximateMessageCount(), '$result->getApproximateMessageCount');
        $this->assertNotNull($result->getMetadata(), '$result->getMetadata');
        $this->assertEquals(0, count($result->getMetadata()), 'count($result->getMetadata');
    }

    /**
    * @covers WindowsAzure\Queue\QueueRestProxy::createQueue
    * @covers WindowsAzure\Queue\QueueRestProxy::deleteQueue
    * @covers WindowsAzure\Queue\QueueRestProxy::getQueueMetadata
    */
    public function testCreateQueueWithOptionsWorks()
    {
        // Arrange

        // Act
        $opts = new CreateQueueOptions();
        $opts->addMetadata('foo', 'bar');
        $opts->addMetadata('test', 'blah');
        $this->restProxy->createQueue(self::$creatableQueue2, $opts);
        $result = $this->restProxy->getQueueMetadata(self::$creatableQueue2);
        $this->restProxy->deleteQueue(self::$creatableQueue2);

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
    * @covers WindowsAzure\Queue\QueueRestProxy::listQueues
    */
    public function testListQueuesWorks()
    {
        // Arrange

        // Act
        $result = $this->restProxy->listQueues();

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
    * @covers WindowsAzure\Queue\QueueRestProxy::listQueues
    */
    public function testListQueuesWithOptionsWorks()
    {
        // Arrange

        // Act
        $opts = new ListQueuesOptions();
        $opts->setMaxResults(3);
        $opts->setIncludeMetadata(true);
        $opts->setPrefix(self::$testQueuesPrefix);
        $result = $this->restProxy->listQueues($opts);

        $opts = new ListQueuesOptions();
        $opts->setMarker($result->getNextMarker());
        $opts->setIncludeMetadata(false);
        $opts->setPrefix(self::$testQueuesPrefix);
        $result2 = $this->restProxy->listQueues($opts);

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
        $this->assertNotNull(
                $queue0->getMetadata(),
                '$queue0->getMetadata' .
                ' (https://github.com/WindowsAzure/azure-sdk-for-php/issues/252)');
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
        $this->assertNotNull($queue20->getMetadata(), '$queue20->getMetadata');
        $this->assertEquals(0, count($queue20->getMetadata()), 'count($queue20->getMetadata)');
        $this->assertNotNull($queue20->getName(), '$queue20->getName');
        $this->assertNotNull($queue20->getUrl(), '$queue20->getUrl');
    }

    /**
    * @covers WindowsAzure\Queue\QueueRestProxy::createQueue
    * @covers WindowsAzure\Queue\QueueRestProxy::deleteQueue
    * @covers WindowsAzure\Queue\QueueRestProxy::getQueueMetadata
    * @covers WindowsAzure\Queue\QueueRestProxy::setQueueMetadata
    */
    public function testSetQueueMetadataWorks()
    {
        // Arrange

        // Act
        $this->restProxy->createQueue(self::$creatableQueue3);

        $metadata = array(
            'foo' => 'bar',
            'test' => 'blah',
            );
        $this->restProxy->setQueueMetadata(self::$creatableQueue3, $metadata);

        $result = $this->restProxy->getQueueMetadata(self::$creatableQueue3);

        $this->restProxy->deleteQueue(self::$creatableQueue3);

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
    * @covers WindowsAzure\Queue\QueueRestProxy::createMessage
    */
    public function testCreateMessageWorks()
    {
        // Arrange

        // Act
        $this->restProxy->createMessage(self::$testQueueForMessages, 'message1');
        $this->restProxy->createMessage(self::$testQueueForMessages, 'message2');
        $this->restProxy->createMessage(self::$testQueueForMessages, 'message3');
        $this->restProxy->createMessage(self::$testQueueForMessages, 'message4');

        // Assert
        $this->assertTrue(true, 'if get there, it is working');
    }

    /**
    * @covers WindowsAzure\Queue\QueueRestProxy::createMessage
    * @covers WindowsAzure\Queue\QueueRestProxy::listMessages
    */
    public function testListMessagesWorks()
    {
        // Arrange
        $year2010 = new \DateTime;
        $year2010->setDate(2010, 1, 1);

        // Act
        $this->restProxy->createMessage(self::$testQueueForMessages2, 'message1');
        $this->restProxy->createMessage(self::$testQueueForMessages2, 'message2');
        $this->restProxy->createMessage(self::$testQueueForMessages2, 'message3');
        $this->restProxy->createMessage(self::$testQueueForMessages2, 'message4');
        $result = $this->restProxy->listMessages(self::$testQueueForMessages2);

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
    * @covers WindowsAzure\Queue\QueueRestProxy::createMessage
    * @covers WindowsAzure\Queue\QueueRestProxy::listMessages
    */
    public function testListMessagesWithOptionsWorks()
    {
        // Arrange
        $year2010 = new \DateTime;
        $year2010->setDate(2010, 1, 1);

        // Act
        $this->restProxy->createMessage(self::$testQueueForMessages3, 'message1');
        $this->restProxy->createMessage(self::$testQueueForMessages3, 'message2');
        $this->restProxy->createMessage(self::$testQueueForMessages3, 'message3');
        $this->restProxy->createMessage(self::$testQueueForMessages3, 'message4');
        $opts = new ListMessagesOptions();
        $opts->setNumberOfMessages(4);
        $opts->setVisibilityTimeoutInSeconds(20);
        $result = $this->restProxy->listMessages(self::$testQueueForMessages3, $opts);

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
    * @covers WindowsAzure\Queue\QueueRestProxy::createMessage
    * @covers WindowsAzure\Queue\QueueRestProxy::peekMessages
    */
    public function testPeekMessagesWorks()
    {
        // Arrange

        $year2010 = new \DateTime;
        $year2010->setDate(2010, 1, 1);

        // Act
        $this->restProxy->createMessage(self::$testQueueForMessages4, 'message1');
        $this->restProxy->createMessage(self::$testQueueForMessages4, 'message2');
        $this->restProxy->createMessage(self::$testQueueForMessages4, 'message3');
        $this->restProxy->createMessage(self::$testQueueForMessages4, 'message4');
        $result = $this->restProxy->peekMessages(self::$testQueueForMessages4);

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
    * @covers WindowsAzure\Queue\QueueRestProxy::createMessage
    * @covers WindowsAzure\Queue\QueueRestProxy::peekMessages
    */
    public function testPeekMessagesWithOptionsWorks()
    {
        // Arrange
        $year2010 = new \DateTime;
        $year2010->setDate(2010, 1, 1);

        // Act
        $this->restProxy->createMessage(self::$testQueueForMessages5, 'message1');
        $this->restProxy->createMessage(self::$testQueueForMessages5, 'message2');
        $this->restProxy->createMessage(self::$testQueueForMessages5, 'message3');
        $this->restProxy->createMessage(self::$testQueueForMessages5, 'message4');
        $opts = new PeekMessagesOptions();
        $opts->setNumberOfMessages(4);
        $result = $this->restProxy->peekMessages(self::$testQueueForMessages5, $opts);

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
    * @covers WindowsAzure\Queue\QueueRestProxy::clearMessages
    * @covers WindowsAzure\Queue\QueueRestProxy::createMessage
    * @covers WindowsAzure\Queue\QueueRestProxy::peekMessages
    */
    public function testClearMessagesWorks()
    {
        // Arrange

        // Act
        $this->restProxy->createMessage(self::$testQueueForMessages6, 'message1');
        $this->restProxy->createMessage(self::$testQueueForMessages6, 'message2');
        $this->restProxy->createMessage(self::$testQueueForMessages6, 'message3');
        $this->restProxy->createMessage(self::$testQueueForMessages6, 'message4');
        $this->restProxy->clearMessages(self::$testQueueForMessages6);

        $result = $this->restProxy->peekMessages(self::$testQueueForMessages6);

        // Assert
        $this->assertNotNull($result, '$result');
        $this->assertEquals(0, count($result->getQueueMessages()), 'count($result->getQueueMessages())');
    }

    /**
    * @covers WindowsAzure\Queue\QueueRestProxy::createMessage
    * @covers WindowsAzure\Queue\QueueRestProxy::deleteMessage
    * @covers WindowsAzure\Queue\QueueRestProxy::listMessages
    */
    public function testDeleteMessageWorks()
    {
        // Arrange

        // Act
        $this->restProxy->createMessage(self::$testQueueForMessages7, 'message1');
        $this->restProxy->createMessage(self::$testQueueForMessages7, 'message2');
        $this->restProxy->createMessage(self::$testQueueForMessages7, 'message3');
        $this->restProxy->createMessage(self::$testQueueForMessages7, 'message4');

        $result = $this->restProxy->listMessages(self::$testQueueForMessages7);
        $message0 = $result->getQueueMessages();
        $message0 = $message0[0];

        $this->restProxy->deleteMessage(self::$testQueueForMessages7, $message0->getMessageId(), $message0->getPopReceipt());
        $opts = new ListMessagesOptions();
        $opts->setNumberOfMessages(32);
        $result2 = $this->restProxy->listMessages(self::$testQueueForMessages7, $opts);

        // Assert
        $this->assertNotNull($result2, '$result2');
        $this->assertEquals(3, count($result2->getQueueMessages()), 'count($result2->getQueueMessages())');
    }

    /**
    * @covers WindowsAzure\Queue\QueueRestProxy::createMessage
    * @covers WindowsAzure\Queue\QueueRestProxy::listMessages
    * @covers WindowsAzure\Queue\QueueRestProxy::updateMessage
    */
    public function testUpdateMessageWorks()
    {
        // Arrange
        $year2010 = new \DateTime;
        $year2010->setDate(2010, 1, 1);

        // Act
        $this->restProxy->createMessage(self::$testQueueForMessages8, 'message1');

        $listResult1 = $this->restProxy->listMessages(self::$testQueueForMessages8);
        $message0 = $listResult1->getQueueMessages();
        $message0 = $message0[0];

        $updateResult = $this->restProxy->updateMessage(
                self::$testQueueForMessages8,
                $message0->getMessageId(),
                $message0->getPopReceipt(),
                'new text',
                0);
        $listResult2 = $this->restProxy->listMessages(self::$testQueueForMessages8);

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
