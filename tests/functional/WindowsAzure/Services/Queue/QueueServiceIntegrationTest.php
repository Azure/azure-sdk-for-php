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
 * @package    PEAR2\Tests\Functional\WindowsAzure\Services\Queue
 * @author     Jason Cooke <jcooke@microsoft.com>
 * @copyright  2012 Microsoft Corporation
 * @license    http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link       http://pear.php.net/package/azure-sdk-for-php
 */

namespace PEAR2\Tests\Functional\WindowsAzure\Services\Queue;

use PEAR2\WindowsAzure\Core\ServiceException;
use PEAR2\WindowsAzure\Services\Queue\QueueService;
use PEAR2\WindowsAzure\Services\Queue\Models\ListQueuesOptions;
use PEAR2\WindowsAzure\Services\Queue\Models\ListQueuesResult;
use PEAR2\WindowsAzure\Services\Queue\Models\CreateQueueOptions;
use PEAR2\WindowsAzure\Services\Queue\Models\ListMessagesOptions;
use PEAR2\WindowsAzure\Services\Queue\Models\PeekMessagesOptions;

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
        $service = self::createService();

        self::createQueues($service, self::$testQueuesPrefix, self::$testQueues);
    }

    public function tearDown() {
        $service = self::createService();

        self::deleteQueues($service, self::$testQueuesPrefix, self::$testQueues);
        self::deleteQueues($service, self::$createableQueuesPrefix, self::$creatableQueues);
    }

    private static function createQueues($service, $prefix, $list) {
        $containers = self::listQueues($service, $prefix);
        foreach($list as $item)  {
            if (!in_array($item, $containers)) {
                $service->createQueue($item);
            }
        }
    }

    private static function deleteQueues($service, $prefix, $list) {
        $containers = self::listQueues($service, $prefix);
        foreach($list as $item)  {
            if (in_array($item, $containers)) {
                $service->deleteQueue($item);
            }
        }
    }

    private static function listQueues($service, $prefix) {
        $result = array();
        $opts = new ListQueuesOptions();
        $opts->setPrefix($prefix);
        $list = $service->listQueues($opts);
        foreach($list->getQueues() as $item)  {
            array_push($result, $item->getName());
        }
        return $result;
    }

    public function testGetServicePropertiesWorks() {
        // Arrange
        $service = self::createService();

        // Act
        $shouldReturn = false;
        try {
            $props = $service->getServiceProperties()->getValue();
            $this->assertFalse('Should succeed when not running in emulator', self::isRunningWithEmulator());
        } catch (ServiceException $e) {
            // Expect failure in emulator, as v1.6 doesn't support this method
            if (self::isRunningWithEmulator()) {
                $this->assertEquals('getCode', 400, $e->getCode());
                $shouldReturn = true;
            }
        }
        if($shouldReturn) {
            return;
        }

        // Assert
        $this->assertNotNull('$props', $props);
        $this->assertNotNull('$props->getLogging', $props->getLogging());
        $this->assertNotNull('$props->getLogging()->getRetentionPolicy', $props->getLogging()->getRetentionPolicy());
        $this->assertNotNull('$props->getLogging()->getVersion', $props->getLogging()->getVersion());
        $this->assertNotNull('$props->getMetrics()->getRetentionPolicy', $props->getMetrics()->getRetentionPolicy());
        $this->assertNotNull('$props->getMetrics()->getVersion', $props->getMetrics()->getVersion());
    }

    public function testSetServicePropertiesWorks() {
        // Arrange
        $service = self::createService();

        // Act
        $shouldReturn = false;
        try {
            $props = $service->getServiceProperties()->getValue();
            $this->assertFalse('Should succeed when not running in emulator', self::isRunningWithEmulator());
        } catch (ServiceException $e) {
            // Expect failure in emulator, as v1.6 doesn't support this method
            if (self::isRunningWithEmulator()) {
                $this->assertEquals('getCode', 400, $e->getCode());
                $shouldReturn = true;
            }
        }
        if($shouldReturn) {
            return;
        }

        $props->getLogging()->setRead(true);
        $service->setServiceProperties($props);

        $props = $service->getServiceProperties()->getValue();

        // Assert
        $this->assertNotNull('$props', $props);
        $this->assertNotNull('$props->getLogging', $props->getLogging());
        $this->assertNotNull('$props->getLogging()->getRetentionPolicy', $props->getLogging()->getRetentionPolicy());
        $this->assertNotNull('$props->getLogging()->getVersion', $props->getLogging()->getVersion());
        $this->assertTrue('$props->getLogging()->getRead', $props->getLogging()->getRead());
        $this->assertNotNull('$props->getMetrics()->getRetentionPolicy', $props->getMetrics()->getRetentionPolicy());
        $this->assertNotNull('$props->getMetrics()->getVersion', $props->getMetrics()->getVersion());
    }

    public function testCreateQueueWorks() {
        // Arrange
        $service = self::createService();

        // Act
        $service->createQueue(self::$CREATABLE_QUEUE_1);
        $result = $service->getQueueMetadata(self::$CREATABLE_QUEUE_1);
        $service->deleteQueue(self::$CREATABLE_QUEUE_1);

        // Assert
        $this->assertNotNull('result', $result);
        $this->assertEquals('$result->getApproximateMessageCount', 0, $result->getApproximateMessageCount());
        $this->assertNotNull('$result->getMetadata',$result->getMetadata());
        $this->assertEquals('count($result->getMetadata', 0, count($result->getMetadata()));
    }

    public function testCreateQueueWithOptionsWorks() {
        // Arrange
        $service = self::createService();

        // Act
        $opts = new CreateQueueOptions();
        $opts->addMetadata('foo', 'bar');
        $opts->addMetadata('test', 'blah');
        $service->createQueue(self::$CREATABLE_QUEUE_2, $opts);
        $result = $service->getQueueMetadata(self::$CREATABLE_QUEUE_2);
        $service->deleteQueue(self::$CREATABLE_QUEUE_2);

        // Assert
        $this->assertNotNull('$result',$result);
        $this->assertEquals('$result->getApproximateMessageCount', 0, $result->getApproximateMessageCount());
        $this->assertNotNull('$result->getMetadata', $result->getMetadata());
        $this->assertEquals('count($result->getMetadata', 2, count($result->getMetadata()));
        $metadata = $result->getMetadata();
        $this->assertEquals('$metadata[foo]', 'bar', $metadata['foo']);
        $this->assertEquals('$metadata[test]', 'blah', $metadata['test']);
    }

    public function testListQueuesWorks() {
        // Arrange
        $service = self::createService();

        // Act
        $result = $service->listQueues();
        
        // Assert
        $this->assertNotNull('$result', $result);
        $this->assertNotNull('$result->getQueues', $result->getQueues());
        
        // TODO: Uncomment when the following issue is fixed:
        // https://github.com/WindowsAzure/azure-sdk-for-php/issues/98
        // $this->assertNotNull($result->getAccountName());
        $this->assertEquals('$result->getMarker', '', $result->getMarker());
        $this->assertNull('$result->getMaxResults', $result->getMaxResults());
        $this->assertTrue('counts', count(self::$testQueues) <= count($result->getQueues()));
    }

    public function testListQueuesWithOptionsWorks() {
        // Arrange
        $service = self::createService();

        // Act
        $opts = new ListQueuesOptions();
        // TODO: Revert this change when fixed:
        // https://github.com/WindowsAzure/azure-sdk-for-php/issues/100
        //$opts->setMaxResults(3);
        $opts->setMaxResults('3');
        $opts->setIncludeMetadata(true);
        $opts->setPrefix(self::$testQueuesPrefix);
        $result = $service->listQueues($opts);

        $opts = new ListQueuesOptions();
        $opts->setMarker($result->getNextMarker());
        $opts->setIncludeMetadata(false);
        $opts->setPrefix(self::$testQueuesPrefix);
        $result2 = $service->listQueues($opts);

        // Assert
        $this->assertNotNull('$result', $result);
        $this->assertNotNull('$result->getQueues', $result->getQueues());
        $this->assertEquals('count($result->getQueues', 3, count($result->getQueues()));
        $this->assertEquals('$result->getMaxResults', 3, $result->getMaxResults());
        // TODO: Uncomment when the following issue is fixed:
        // https://github.com/WindowsAzure/azure-sdk-for-php/issues/98
        // $this->assertNotNull($result->getAccountName());
        $this->assertNull('$result->getMarker', $result->getMarker());
        $queue0 = $result->getQueues();
        $queue0 = $queue0[0];
        $this->assertNotNull('$queue0', $queue0);
        $this->assertNotNull('$queue0->getMetadata', $queue0->getMetadata());
        $this->assertNotNull('$queue0->getName', $queue0->getName());
        $this->assertNotNull('$queue0->getUrl', $queue0->getUrl());

        $this->assertNotNull('$result2', $result2);
        $this->assertNotNull('$result2->getQueues', $result2->getQueues());
        $this->assertTrue('count', count(self::$testQueues) - 3 <= count($result2->getQueues()));
        $this->assertEquals('$result2->getMaxResults', 0, $result2->getMaxResults());
        // TODO: Uncomment when the following issue is fixed:
        // https://github.com/WindowsAzure/azure-sdk-for-php/issues/98
        // $this->assertNotNull($result2->getAccountName());
        $this->assertEquals('$result2->getMarker', $result->getNextMarker(), $result2->getMarker());
        $queue20 = $result2->getQueues();
        $queue20 = $queue20[0];
        $this->assertNotNull('$queue20', $queue20);
        $this->assertNull('$queue20->getMetadata', $queue20->getMetadata());
        $this->assertNotNull('$queue20->getName', $queue20->getName());
        $this->assertNotNull('$queue20->getUrl', $queue20->getUrl());
    }

    public function testSetQueueMetadataWorks() {
        // Arrange
        $service = self::createService();

        // Act
        $service->createQueue(self::$CREATABLE_QUEUE_3);

        $metadata = array(
            'foo' => 'bar',
            'test' => 'blah',
            );
        $service->setQueueMetadata(self::$CREATABLE_QUEUE_3, $metadata);

        $result = $service->getQueueMetadata(self::$CREATABLE_QUEUE_3);

        $service->deleteQueue(self::$CREATABLE_QUEUE_3);

        // Assert
        $this->assertNotNull('$result', $result);
        $this->assertEquals('$result->getApproximateMessageCount', 0, $result->getApproximateMessageCount());
        $this->assertNotNull('$result->getMetadata', $result->getMetadata());
        $this->assertEquals('count($result->getMetadata', 2, count($result->getMetadata()));
        $metadata = $result->getMetadata();
        $this->assertEquals('$metadata[\'foo\']', 'bar', $metadata['foo']);
        $this->assertEquals('$metadata[\'test\']', 'blah', $metadata['test']);
    }

    public function testCreateMessageWorks() {
        // Arrange
        $service = self::createService();

        // Act
        $service->createMessage(self::$TEST_QUEUE_FOR_MESSAGES, 'message1');
        $service->createMessage(self::$TEST_QUEUE_FOR_MESSAGES, 'message2');
        $service->createMessage(self::$TEST_QUEUE_FOR_MESSAGES, 'message3');
        $service->createMessage(self::$TEST_QUEUE_FOR_MESSAGES, 'message4');

        // Assert
        $this->assertTrue('if get there, it is working', true);
    }

    public function testListMessagesWorks() {
        // Arrange
        $service = self::createService();
        $year2010 = new \DateTime;
        $year2010->setDate(2010, 1, 1);        

        // Act
        $service->createMessage(self::$TEST_QUEUE_FOR_MESSAGES_2, 'message1');
        $service->createMessage(self::$TEST_QUEUE_FOR_MESSAGES_2, 'message2');
        $service->createMessage(self::$TEST_QUEUE_FOR_MESSAGES_2, 'message3');
        $service->createMessage(self::$TEST_QUEUE_FOR_MESSAGES_2, 'message4');
        $result = $service->listMessages(self::$TEST_QUEUE_FOR_MESSAGES_2);

        // Assert
        $this->assertNotNull('$result', $result);
        $this->assertEquals('count($result->getQueueMessages', 1, count($result->getQueueMessages()));

        $entry = $result->getQueueMessages();
        $entry = $entry[0];
        
        $this->assertNotNull('$entry->getMessageId', $entry->getMessageId());
        $this->assertNotNull('$entry->getMessageText', $entry->getMessageText());
        $this->assertNotNull('$entry->getPopReceipt', $entry->getPopReceipt());
        $this->assertEquals('$entry->getDequeueCount', 1, $entry->getDequeueCount());

        $this->assertNotNull('$entry->getExpirationDate', $entry->getExpirationDate());
        $this->assertTrue('diff', $year2010 < $entry->getExpirationDate());

        $this->assertNotNull('$entry->getInsertionDate', $entry->getInsertionDate());
        $this->assertTrue('diff', $year2010 < $entry->getInsertionDate());

        $this->assertNotNull('$entry->getTimeNextVisible', $entry->getTimeNextVisible());
        $this->assertTrue('diff', $year2010 < $entry->getTimeNextVisible());
    }

    public function testListMessagesWithOptionsWorks() {
        // Arrange
        $service = self::createService();
        $year2010 = new \DateTime;
        $year2010->setDate(2010, 1, 1);        

        // Act
        $service->createMessage(self::$TEST_QUEUE_FOR_MESSAGES_3, 'message1');
        $service->createMessage(self::$TEST_QUEUE_FOR_MESSAGES_3, 'message2');
        $service->createMessage(self::$TEST_QUEUE_FOR_MESSAGES_3, 'message3');
        $service->createMessage(self::$TEST_QUEUE_FOR_MESSAGES_3, 'message4');
        $opts = new ListMessagesOptions();
        $opts->setNumberOfMessages(4);
        $opts->setVisibilityTimeoutInSeconds(20);
        $result = $service->listMessages(self::$TEST_QUEUE_FOR_MESSAGES_3, $opts);

        // Assert
        $this->assertNotNull('',$result);
        $this->assertEquals('',4, count($result->getQueueMessages()));
        for ($i = 0; $i < 4; $i++) {
            $entry = $result->getQueueMessages();
            $entry = $entry[$i];

            $this->assertNotNull('', $entry->getMessageId());
            $this->assertNotNull('', $entry->getMessageText());
            $this->assertNotNull('', $entry->getPopReceipt());
            $this->assertEquals('', 1, $entry->getDequeueCount());

            $this->assertNotNull('', $entry->getExpirationDate());
            $this->assertTrue('', $year2010 < $entry->getExpirationDate());

            $this->assertNotNull('', $entry->getInsertionDate());
            $this->assertTrue('', $year2010 < $entry->getInsertionDate());

            $this->assertNotNull('', $entry->getTimeNextVisible());
            $this->assertTrue('', $year2010 < $entry->getTimeNextVisible());
        }
    }

    public function testPeekMessagesWorks() {
        // Arrange
        $service = self::createService();
        $year2010 = new \DateTime;
        $year2010->setDate(2010, 1, 1);        

        // Act
        $service->createMessage(self::$TEST_QUEUE_FOR_MESSAGES_4, 'message1');
        $service->createMessage(self::$TEST_QUEUE_FOR_MESSAGES_4, 'message2');
        $service->createMessage(self::$TEST_QUEUE_FOR_MESSAGES_4, 'message3');
        $service->createMessage(self::$TEST_QUEUE_FOR_MESSAGES_4, 'message4');
        $result = $service->peekMessages(self::$TEST_QUEUE_FOR_MESSAGES_4);

        // Assert
        $this->assertNotNull('', $result);
        $this->assertEquals('', 1, count($result->getQueueMessages()));

        $entry = $result ->getQueueMessages();
        $entry = $entry[0];

        $this->assertNotNull('', $entry->getMessageId());
        $this->assertNotNull('', $entry->getMessageText());
        $this->assertEquals('', 0, $entry->getDequeueCount());

        $this->assertNotNull('', $entry->getExpirationDate());
        $this->assertTrue('', $year2010 < $entry->getExpirationDate());

        $this->assertNotNull('', $entry->getInsertionDate());
        $this->assertTrue('', $year2010 < $entry->getInsertionDate());
    }

    public function testPeekMessagesWithOptionsWorks() {
        // Arrange
        $service = self::createService();
        $year2010 = new \DateTime;
        $year2010->setDate(2010, 1, 1);        

        // Act
        $service->createMessage(self::$TEST_QUEUE_FOR_MESSAGES_5, 'message1');
        $service->createMessage(self::$TEST_QUEUE_FOR_MESSAGES_5, 'message2');
        $service->createMessage(self::$TEST_QUEUE_FOR_MESSAGES_5, 'message3');
        $service->createMessage(self::$TEST_QUEUE_FOR_MESSAGES_5, 'message4');
        $opts = new PeekMessagesOptions();
        $opts->setNumberOfMessages(4);
        $result = $service->peekMessages(self::$TEST_QUEUE_FOR_MESSAGES_5, $opts);

        // Assert
        $this->assertNotNull('', $result);
        $this->assertEquals('', 4, count($result->getQueueMessages()));
        for ($i = 0; $i < 4; $i++) {
            $entry = $result ->getQueueMessages();
            $entry = $entry[$i];

            $this->assertNotNull('', $entry->getMessageId());
            $this->assertNotNull('', $entry->getMessageText());
            $this->assertEquals('', 0, $entry->getDequeueCount());

            $this->assertNotNull('', $entry->getExpirationDate());
            $this->assertTrue('', $year2010 < $entry->getExpirationDate());

            $this->assertNotNull('', $entry->getInsertionDate());
            $this->assertTrue('', $year2010 < $entry->getInsertionDate());
        }
    }

    public function testClearMessagesWorks() {
        // Arrange
        $service = self::createService();

        // Act
        $service->createMessage(self::$TEST_QUEUE_FOR_MESSAGES_6, 'message1');
        $service->createMessage(self::$TEST_QUEUE_FOR_MESSAGES_6, 'message2');
        $service->createMessage(self::$TEST_QUEUE_FOR_MESSAGES_6, 'message3');
        $service->createMessage(self::$TEST_QUEUE_FOR_MESSAGES_6, 'message4');
        $service->clearMessages(self::$TEST_QUEUE_FOR_MESSAGES_6);

        $result = $service->peekMessages(self::$TEST_QUEUE_FOR_MESSAGES_6);

        // Assert
        $this->assertNotNull('', $result);
        $this->assertEquals('', 0, count($result->getQueueMessages()));
    }

    public function testDeleteMessageWorks() {
        // Arrange
        $service = self::createService();

        // Act
        $service->createMessage(self::$TEST_QUEUE_FOR_MESSAGES_7, 'message1');
        $service->createMessage(self::$TEST_QUEUE_FOR_MESSAGES_7, 'message2');
        $service->createMessage(self::$TEST_QUEUE_FOR_MESSAGES_7, 'message3');
        $service->createMessage(self::$TEST_QUEUE_FOR_MESSAGES_7, 'message4');

        $result = $service->listMessages(self::$TEST_QUEUE_FOR_MESSAGES_7);
        $message0 = $result->getQueueMessages();
        $message0 = $message0[0];
        
        $service->deleteMessage(self::$TEST_QUEUE_FOR_MESSAGES_7, $message0->getMessageId(), $message0->getPopReceipt());
        $opts = new ListMessagesOptions();
        $opts->setNumberOfMessages(32);
        $result2 = $service->listMessages(self::$TEST_QUEUE_FOR_MESSAGES_7, $opts);

        // Assert
        $this->assertNotNull('', $result2);
        $this->assertEquals('', 3, count($result2->getQueueMessages()));
    }

    public function testUpdateMessageWorks() {
        // Arrange
        $service = self::createService();
        $year2010 = new \DateTime;
        $year2010->setDate(2010, 1, 1);        

        // Act
        $service->createMessage(self::$TEST_QUEUE_FOR_MESSAGES_8, 'message1');

        $listResult1 = $service->listMessages(self::$TEST_QUEUE_FOR_MESSAGES_8);
        $message0 = $listResult1->getQueueMessages();
        $message0 = $message0[0];
        
        // TODO: Change the last parameter to 0 when the following is fixed:
        // https://github.com/WindowsAzure/azure-sdk-for-php/issues/99
        // Also, remove the sleep.
        $updateResult = $service->updateMessage(
                self::$TEST_QUEUE_FOR_MESSAGES_8, 
                $message0->getMessageId(), 
                $message0->getPopReceipt(), 
                'new text', 
                1);
        sleep(2);
        $listResult2 = $service->listMessages(self::$TEST_QUEUE_FOR_MESSAGES_8);

        // Assert
        $this->assertNotNull('', $updateResult);
        $this->assertNotNull('', $updateResult->getPopReceipt());
        $this->assertNotNull('', $updateResult->getTimeNextVisible());
        $this->assertTrue('', $year2010 < $updateResult->getTimeNextVisible());

        $this->assertNotNull('', $listResult2);
        $entry = $listResult2->getQueueMessages();
        $entry = $entry[0];

        $blarg = $listResult1->getQueueMessages();
        $blarg = $blarg[0];
        
        $this->assertEquals('', $blarg->getMessageId(), $entry->getMessageId());
        $this->assertEquals('', 'new text', $entry->getMessageText());
        $this->assertNotNull('', $entry->getPopReceipt());
        $this->assertEquals('', 2, $entry->getDequeueCount());

        $this->assertNotNull('', $entry->getExpirationDate());
        $this->assertTrue('', $year2010 < $entry->getExpirationDate());

        $this->assertNotNull('', $entry->getInsertionDate());
        $this->assertTrue('', $year2010 < $entry->getInsertionDate());

        $this->assertNotNull('', $entry->getTimeNextVisible());
        $this->assertTrue('', $year2010 < $entry->getTimeNextVisible());

    }
}
