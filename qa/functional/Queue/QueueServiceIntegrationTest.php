<?php

namespace ext\microsoft\windowsazure\services\queue;

use PEAR2\WindowsAzure\Services\Queue\QueueService;
use PEAR2\WindowsAzure\Services\Queue\Models\ListQueuesOptions;
use PEAR2\WindowsAzure\Services\Queue\Models\ListQueuesResult;
use PEAR2\WindowsAzure\Services\Queue\Models\CreateQueueOptions;
use PEAR2\WindowsAzure\Services\Queue\Models\ListMessagesOptions;
use PEAR2\WindowsAzure\Services\Queue\Models\PeekMessagesOptions;


class QueueServiceIntegrationTest extends IntegrationTestBase {
    private static $testQueuesPrefix = "sdktest-";
    private static $createableQueuesPrefix = "csdktest-";
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

    public static function setup() {
        // Setup container names array (list of container names used by
        // integration tests)
        QueueServiceIntegrationTest::$testQueues = array();
        for ($i = 0; $i < 10; $i++) {
            QueueServiceIntegrationTest::$testQueues[$i] = QueueServiceIntegrationTest::$testQueuesPrefix . round( gettimeofday(true)) . ($i + 1);
        }

        QueueServiceIntegrationTest::$creatableQueues = array();
        for ($i = 0; $i < 3; $i++) {
            QueueServiceIntegrationTest::$creatableQueues[$i] = QueueServiceIntegrationTest::$createableQueuesPrefix . ($i + 1);
        }

        QueueServiceIntegrationTest::$TEST_QUEUE_FOR_MESSAGES = QueueServiceIntegrationTest::$testQueues[0];
        QueueServiceIntegrationTest::$TEST_QUEUE_FOR_MESSAGES_2 = QueueServiceIntegrationTest::$testQueues[1];
        QueueServiceIntegrationTest::$TEST_QUEUE_FOR_MESSAGES_3 = QueueServiceIntegrationTest::$testQueues[2];
        QueueServiceIntegrationTest::$TEST_QUEUE_FOR_MESSAGES_4 = QueueServiceIntegrationTest::$testQueues[3];
        QueueServiceIntegrationTest::$TEST_QUEUE_FOR_MESSAGES_5 = QueueServiceIntegrationTest::$testQueues[4];
        QueueServiceIntegrationTest::$TEST_QUEUE_FOR_MESSAGES_6 = QueueServiceIntegrationTest::$testQueues[5];
        QueueServiceIntegrationTest::$TEST_QUEUE_FOR_MESSAGES_7 = QueueServiceIntegrationTest::$testQueues[6];
        QueueServiceIntegrationTest::$TEST_QUEUE_FOR_MESSAGES_8 = QueueServiceIntegrationTest::$testQueues[7];

        QueueServiceIntegrationTest::$CREATABLE_QUEUE_1 = QueueServiceIntegrationTest::$creatableQueues[0];
        QueueServiceIntegrationTest::$CREATABLE_QUEUE_2 = QueueServiceIntegrationTest::$creatableQueues[1];
        QueueServiceIntegrationTest::$CREATABLE_QUEUE_3 = QueueServiceIntegrationTest::$creatableQueues[2];

        // Create all test containers and their content
        $service = QueueServiceIntegrationTest::createService();

        QueueServiceIntegrationTest::createQueues($service, QueueServiceIntegrationTest::$testQueuesPrefix, QueueServiceIntegrationTest::$testQueues);
    }

    public static function cleanup() {
        $service = QueueServiceIntegrationTest::createService();

        QueueServiceIntegrationTest::deleteQueues($service, QueueServiceIntegrationTest::$testQueuesPrefix, QueueServiceIntegrationTest::$testQueues);
        QueueServiceIntegrationTest::deleteQueues($service, QueueServiceIntegrationTest::$createableQueuesPrefix, QueueServiceIntegrationTest::$creatableQueues);
    }

    private static function createQueues($service, $prefix, $list) {
        $containers = QueueServiceIntegrationTest::listQueues($service, $prefix);
        foreach($list as $item)  {
            if (!in_array($item, $containers)) {
                $service->createQueue($item);
            }
        }
    }

    private static function deleteQueues($service, $prefix, $list) {
        $containers = QueueServiceIntegrationTest::listQueues($service, $prefix);
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

    public function getServicePropertiesWorks() {
        // Arrange
        $service = QueueServiceIntegrationTest::createService();

        // Don't run this test with emulator, as v1.6 doesn't support this method
        if (QueueServiceIntegrationTest::isRunningWithEmulator()) {
            return;
        }

        // Act
        $props = $service->getServiceProperties()->getValue();

        // Assert
        Assert::assertNotNull('$props', $props);
        Assert::assertNotNull('$props->getLogging', $props->getLogging());
        Assert::assertNotNull('$props->getLogging()->getRetentionPolicy', $props->getLogging()->getRetentionPolicy());
        Assert::assertNotNull('$props->getLogging()->getVersion', $props->getLogging()->getVersion());
        Assert::assertNotNull('$props->getMetrics()->getRetentionPolicy', $props->getMetrics()->getRetentionPolicy());
        Assert::assertNotNull('$props->getMetrics()->getVersion', $props->getMetrics()->getVersion());
    }

    public function setServicePropertiesWorks() {
        // Arrange
        $service = QueueServiceIntegrationTest::createService();

        // Don't run this test with emulator, as v1.6 doesn't support this method
        if (QueueServiceIntegrationTest::isRunningWithEmulator()) {
            return;
        }

        // Act
        $props = $service->getServiceProperties()->getValue();

        $props->getLogging()->setRead(true);
        $service->setServiceProperties($props);

        $props = $service->getServiceProperties()->getValue();

        // Assert
        Assert::assertNotNull('$props', $props);
        Assert::assertNotNull('$props->getLogging', $props->getLogging());
        Assert::assertNotNull('$props->getLogging()->getRetentionPolicy', $props->getLogging()->getRetentionPolicy());
        Assert::assertNotNull('$props->getLogging()->getVersion', $props->getLogging()->getVersion());
        Assert::assertTrue('$props->getLogging()->getRead', $props->getLogging()->getRead());
        Assert::assertNotNull('$props->getMetrics()->getRetentionPolicy', $props->getMetrics()->getRetentionPolicy());
        Assert::assertNotNull('$props->getMetrics()->getVersion', $props->getMetrics()->getVersion());
    }

    public function createQueueWorks() {
        // Arrange
        $service = QueueServiceIntegrationTest::createService();

        // Act
        $service->createQueue(QueueServiceIntegrationTest::$CREATABLE_QUEUE_1);
        $result = $service->getQueueMetadata(QueueServiceIntegrationTest::$CREATABLE_QUEUE_1);
        $service->deleteQueue(QueueServiceIntegrationTest::$CREATABLE_QUEUE_1);

        // Assert
        Assert::assertNotNull('result', $result);
        Assert::assertEquals('$result->getApproximateMessageCount', 0, $result->getApproximateMessageCount());
        Assert::assertNotNull('$result->getMetadata',$result->getMetadata());
        Assert::assertEquals('count($result->getMetadata', 0, count($result->getMetadata()));
    }

    public function createQueueWithOptionsWorks() {
        // Arrange
        $service = QueueServiceIntegrationTest::createService();

        // Act
        $opts = new CreateQueueOptions();
        $opts->addMetadata("foo", "bar");
        $opts->addMetadata("test", "blah");
        $service->createQueue(QueueServiceIntegrationTest::$CREATABLE_QUEUE_2, $opts);
        $result = $service->getQueueMetadata(QueueServiceIntegrationTest::$CREATABLE_QUEUE_2);
        $service->deleteQueue(QueueServiceIntegrationTest::$CREATABLE_QUEUE_2);

        // Assert
        Assert::assertNotNull('$result',$result);
        Assert::assertEquals('$result->getApproximateMessageCount', 0, $result->getApproximateMessageCount());
        Assert::assertNotNull('$result->getMetadata', $result->getMetadata());
        Assert::assertEquals('count($result->getMetadata', 2, count($result->getMetadata()));
        $metadata = $result->getMetadata();
        Assert::assertEquals('$metadata[foo]', "bar", $metadata["foo"]);
        Assert::assertEquals('$metadata[test]', "blah", $metadata["test"]);
    }

    public function listQueuesWorks() {
        // Arrange
        $service = QueueServiceIntegrationTest::createService();

        // Act
        $result = $service->listQueues();
        
        // Assert
        Assert::assertNotNull('$result', $result);
        Assert::assertNotNull('$result->getQueues', $result->getQueues());
        
        // TODO: Uncomment when the following issue is fixed:
        // https://github.com/WindowsAzure/azure-sdk-for-php/issues/98
        // Assert::assertNotNull($result->getAccountName());
        Assert::assertEquals('$result->getMarker', '', $result->getMarker());
        Assert::assertNull('$result->getMaxResults', $result->getMaxResults());
        Assert::assertTrue('counts', count(QueueServiceIntegrationTest::$testQueues) <= count($result->getQueues()));
    }

    public function listQueuesWithOptionsWorks() {
        // Arrange
        $service = QueueServiceIntegrationTest::createService();

        // Act
        $opts = new ListQueuesOptions();
        // TODO: Revert this change when fixed:
        // https://github.com/WindowsAzure/azure-sdk-for-php/issues/100
        //$opts->setMaxResults(3);
        $opts->setMaxResults("3");
        $opts->setIncludeMetadata(true);
        $opts->setPrefix(QueueServiceIntegrationTest::$testQueuesPrefix);
        $result = $service->listQueues($opts);

        $opts = new ListQueuesOptions();
        $opts->setMarker($result->getNextMarker());
        $opts->setIncludeMetadata(false);
        $opts->setPrefix(QueueServiceIntegrationTest::$testQueuesPrefix);
        $result2 = $service->listQueues($opts);

        // Assert
        Assert::assertNotNull('$result', $result);
        Assert::assertNotNull('$result->getQueues', $result->getQueues());
        Assert::assertEquals('count($result->getQueues', 3, count($result->getQueues()));
        Assert::assertEquals('$result->getMaxResults', 3, $result->getMaxResults());
        // TODO: Uncomment when the following issue is fixed:
        // https://github.com/WindowsAzure/azure-sdk-for-php/issues/98
        // Assert::assertNotNull($result->getAccountName());
        Assert::assertNull('$result->getMarker', $result->getMarker());
        $queue0 = $result->getQueues();
        $queue0 = $queue0[0];
        Assert::assertNotNull('$queue0', $queue0);
        Assert::assertNotNull('$queue0->getMetadata', $queue0->getMetadata());
        Assert::assertNotNull('$queue0->getName', $queue0->getName());
        Assert::assertNotNull('$queue0->getUrl', $queue0->getUrl());

        Assert::assertNotNull('$result2', $result2);
        Assert::assertNotNull('$result2->getQueues', $result2->getQueues());
        Assert::assertTrue('count', count(QueueServiceIntegrationTest::$testQueues) - 3 <= count($result2->getQueues()));
        Assert::assertEquals('$result2->getMaxResults', 0, $result2->getMaxResults());
        // TODO: Uncomment when the following issue is fixed:
        // https://github.com/WindowsAzure/azure-sdk-for-php/issues/98
        // Assert::assertNotNull($result2->getAccountName());
        Assert::assertEquals('$result2->getMarker', $result->getNextMarker(), $result2->getMarker());
        $queue20 = $result2->getQueues();
        $queue20 = $queue20[0];
        Assert::assertNotNull('$queue20', $queue20);
        Assert::assertNull('$queue20->getMetadata', $queue20->getMetadata());
        Assert::assertNotNull('$queue20->getName', $queue20->getName());
        Assert::assertNotNull('$queue20->getUrl', $queue20->getUrl());
    }

    public function setQueueMetadataWorks() {
        // Arrange
        $service = QueueServiceIntegrationTest::createService();

        // Act
        $service->createQueue(QueueServiceIntegrationTest::$CREATABLE_QUEUE_3);

        $metadata = array(
            "foo" => "bar",
            "test" => "blah",
            );
        $service->setQueueMetadata(QueueServiceIntegrationTest::$CREATABLE_QUEUE_3, $metadata);

        $result = $service->getQueueMetadata(QueueServiceIntegrationTest::$CREATABLE_QUEUE_3);

        $service->deleteQueue(QueueServiceIntegrationTest::$CREATABLE_QUEUE_3);

        // Assert
        Assert::assertNotNull('$result', $result);
        Assert::assertEquals('$result->getApproximateMessageCount', 0, $result->getApproximateMessageCount());
        Assert::assertNotNull('$result->getMetadata', $result->getMetadata());
        Assert::assertEquals('count($result->getMetadata', 2, count($result->getMetadata()));
        $metadata = $result->getMetadata();
        Assert::assertEquals('$metadata["foo"]', "bar", $metadata["foo"]);
        Assert::assertEquals('$metadata["test"]', "blah", $metadata["test"]);
    }

    public function createMessageWorks() {
        // Arrange
        $service = QueueServiceIntegrationTest::createService();

        // Act
        $service->createMessage(QueueServiceIntegrationTest::$TEST_QUEUE_FOR_MESSAGES, "message1");
        $service->createMessage(QueueServiceIntegrationTest::$TEST_QUEUE_FOR_MESSAGES, "message2");
        $service->createMessage(QueueServiceIntegrationTest::$TEST_QUEUE_FOR_MESSAGES, "message3");
        $service->createMessage(QueueServiceIntegrationTest::$TEST_QUEUE_FOR_MESSAGES, "message4");

        // Assert
    }

    public function listMessagesWorks() {
        // Arrange
        $service = QueueServiceIntegrationTest::createService();
        $year2010 = new \DateTime;
        $year2010->setDate(2010, 1, 1);        

        // Act
        $service->createMessage(QueueServiceIntegrationTest::$TEST_QUEUE_FOR_MESSAGES_2, "message1");
        $service->createMessage(QueueServiceIntegrationTest::$TEST_QUEUE_FOR_MESSAGES_2, "message2");
        $service->createMessage(QueueServiceIntegrationTest::$TEST_QUEUE_FOR_MESSAGES_2, "message3");
        $service->createMessage(QueueServiceIntegrationTest::$TEST_QUEUE_FOR_MESSAGES_2, "message4");
        $result = $service->listMessages(QueueServiceIntegrationTest::$TEST_QUEUE_FOR_MESSAGES_2);

        // Assert
        Assert::assertNotNull('$result', $result);
        Assert::assertEquals('count($result->getQueueMessages', 1, count($result->getQueueMessages()));

        $entry = $result->getQueueMessages();
        $entry = $entry[0];
        
        Assert::assertNotNull('$entry->getMessageId', $entry->getMessageId());
        Assert::assertNotNull('$entry->getMessageText', $entry->getMessageText());
        Assert::assertNotNull('$entry->getPopReceipt', $entry->getPopReceipt());
        Assert::assertEquals('$entry->getDequeueCount', 1, $entry->getDequeueCount());

        Assert::assertNotNull('$entry->getExpirationDate', $entry->getExpirationDate());
        Assert::assertTrue('diff', $year2010 < $entry->getExpirationDate());

        Assert::assertNotNull('$entry->getInsertionDate', $entry->getInsertionDate());
        Assert::assertTrue('diff', $year2010 < $entry->getInsertionDate());

        Assert::assertNotNull('$entry->getTimeNextVisible', $entry->getTimeNextVisible());
        Assert::assertTrue('diff', $year2010 < $entry->getTimeNextVisible());
    }

    public function listMessagesWithOptionsWorks() {
        // Arrange
        $service = QueueServiceIntegrationTest::createService();
        $year2010 = new \DateTime;
        $year2010->setDate(2010, 1, 1);        

        // Act
        $service->createMessage(QueueServiceIntegrationTest::$TEST_QUEUE_FOR_MESSAGES_3, "message1");
        $service->createMessage(QueueServiceIntegrationTest::$TEST_QUEUE_FOR_MESSAGES_3, "message2");
        $service->createMessage(QueueServiceIntegrationTest::$TEST_QUEUE_FOR_MESSAGES_3, "message3");
        $service->createMessage(QueueServiceIntegrationTest::$TEST_QUEUE_FOR_MESSAGES_3, "message4");
        $opts = new ListMessagesOptions();
        $opts->setNumberOfMessages(4);
        $opts->setVisibilityTimeoutInSeconds(20);
        $result = $service->listMessages(QueueServiceIntegrationTest::$TEST_QUEUE_FOR_MESSAGES_3, $opts);

        // Assert
        Assert::assertNotNull('',$result);
        Assert::assertEquals('',4, count($result->getQueueMessages()));
        for ($i = 0; $i < 4; $i++) {
            $entry = $result->getQueueMessages();
            $entry = $entry[$i];

            Assert::assertNotNull('', $entry->getMessageId());
            Assert::assertNotNull('', $entry->getMessageText());
            Assert::assertNotNull('', $entry->getPopReceipt());
            Assert::assertEquals('', 1, $entry->getDequeueCount());

            Assert::assertNotNull('', $entry->getExpirationDate());
            Assert::assertTrue('', $year2010 < $entry->getExpirationDate());

            Assert::assertNotNull('', $entry->getInsertionDate());
            Assert::assertTrue('', $year2010 < $entry->getInsertionDate());

            Assert::assertNotNull('', $entry->getTimeNextVisible());
            Assert::assertTrue('', $year2010 < $entry->getTimeNextVisible());
        }
    }

    public function peekMessagesWorks() {
        // Arrange
        $service = QueueServiceIntegrationTest::createService();
        $year2010 = new \DateTime;
        $year2010->setDate(2010, 1, 1);        

        // Act
        $service->createMessage(QueueServiceIntegrationTest::$TEST_QUEUE_FOR_MESSAGES_4, "message1");
        $service->createMessage(QueueServiceIntegrationTest::$TEST_QUEUE_FOR_MESSAGES_4, "message2");
        $service->createMessage(QueueServiceIntegrationTest::$TEST_QUEUE_FOR_MESSAGES_4, "message3");
        $service->createMessage(QueueServiceIntegrationTest::$TEST_QUEUE_FOR_MESSAGES_4, "message4");
        $result = $service->peekMessages(QueueServiceIntegrationTest::$TEST_QUEUE_FOR_MESSAGES_4);

        // Assert
        Assert::assertNotNull('', $result);
        Assert::assertEquals('', 1, count($result->getQueueMessages()));

        $entry = $result ->getQueueMessages();
        $entry = $entry[0];

        Assert::assertNotNull('', $entry->getMessageId());
        Assert::assertNotNull('', $entry->getMessageText());
        Assert::assertEquals('', 0, $entry->getDequeueCount());

        Assert::assertNotNull('', $entry->getExpirationDate());
        Assert::assertTrue('', $year2010 < $entry->getExpirationDate());

        Assert::assertNotNull('', $entry->getInsertionDate());
        Assert::assertTrue('', $year2010 < $entry->getInsertionDate());
    }

    public function peekMessagesWithOptionsWorks() {
        // Arrange
        $service = QueueServiceIntegrationTest::createService();
        $year2010 = new \DateTime;
        $year2010->setDate(2010, 1, 1);        

        // Act
        $service->createMessage(QueueServiceIntegrationTest::$TEST_QUEUE_FOR_MESSAGES_5, "message1");
        $service->createMessage(QueueServiceIntegrationTest::$TEST_QUEUE_FOR_MESSAGES_5, "message2");
        $service->createMessage(QueueServiceIntegrationTest::$TEST_QUEUE_FOR_MESSAGES_5, "message3");
        $service->createMessage(QueueServiceIntegrationTest::$TEST_QUEUE_FOR_MESSAGES_5, "message4");
        $opts = new PeekMessagesOptions();
        $opts->setNumberOfMessages(4);
        $result = $service->peekMessages(QueueServiceIntegrationTest::$TEST_QUEUE_FOR_MESSAGES_5, $opts);

        // Assert
        Assert::assertNotNull('', $result);
        Assert::assertEquals('', 4, count($result->getQueueMessages()));
        for ($i = 0; $i < 4; $i++) {
            $entry = $result ->getQueueMessages();
            $entry = $entry[$i];

            Assert::assertNotNull('', $entry->getMessageId());
            Assert::assertNotNull('', $entry->getMessageText());
            Assert::assertEquals('', 0, $entry->getDequeueCount());

            Assert::assertNotNull('', $entry->getExpirationDate());
            Assert::assertTrue('', $year2010 < $entry->getExpirationDate());

            Assert::assertNotNull('', $entry->getInsertionDate());
            Assert::assertTrue('', $year2010 < $entry->getInsertionDate());
        }
    }

    public function clearMessagesWorks() {
        // Arrange
        $service = QueueServiceIntegrationTest::createService();

        // Act
        $service->createMessage(QueueServiceIntegrationTest::$TEST_QUEUE_FOR_MESSAGES_6, "message1");
        $service->createMessage(QueueServiceIntegrationTest::$TEST_QUEUE_FOR_MESSAGES_6, "message2");
        $service->createMessage(QueueServiceIntegrationTest::$TEST_QUEUE_FOR_MESSAGES_6, "message3");
        $service->createMessage(QueueServiceIntegrationTest::$TEST_QUEUE_FOR_MESSAGES_6, "message4");
        $service->clearMessages(QueueServiceIntegrationTest::$TEST_QUEUE_FOR_MESSAGES_6);

        $result = $service->peekMessages(QueueServiceIntegrationTest::$TEST_QUEUE_FOR_MESSAGES_6);

        // Assert
        Assert::assertNotNull('', $result);
        Assert::assertEquals('', 0, count($result->getQueueMessages()));
    }

    public function deleteMessageWorks() {
        // Arrange
        $service = QueueServiceIntegrationTest::createService();

        // Act
        $service->createMessage(QueueServiceIntegrationTest::$TEST_QUEUE_FOR_MESSAGES_7, "message1");
        $service->createMessage(QueueServiceIntegrationTest::$TEST_QUEUE_FOR_MESSAGES_7, "message2");
        $service->createMessage(QueueServiceIntegrationTest::$TEST_QUEUE_FOR_MESSAGES_7, "message3");
        $service->createMessage(QueueServiceIntegrationTest::$TEST_QUEUE_FOR_MESSAGES_7, "message4");

        $result = $service->listMessages(QueueServiceIntegrationTest::$TEST_QUEUE_FOR_MESSAGES_7);
        $message0 = $result->getQueueMessages();
        $message0 = $message0[0];
        
        $service->deleteMessage(QueueServiceIntegrationTest::$TEST_QUEUE_FOR_MESSAGES_7, $message0->getMessageId(), $message0->getPopReceipt());
        $opts = new ListMessagesOptions();
        $opts->setNumberOfMessages(32);
        $result2 = $service->listMessages(QueueServiceIntegrationTest::$TEST_QUEUE_FOR_MESSAGES_7, $opts);

        // Assert
        Assert::assertNotNull('', $result2);
        Assert::assertEquals('', 3, count($result2->getQueueMessages()));
    }

    public function updateMessageWorks() {
        // Arrange
        $service = QueueServiceIntegrationTest::createService();
        $year2010 = new \DateTime;
        $year2010->setDate(2010, 1, 1);        

        // Act
        $service->createMessage(QueueServiceIntegrationTest::$TEST_QUEUE_FOR_MESSAGES_8, "message1");

        $listResult1 = $service->listMessages(QueueServiceIntegrationTest::$TEST_QUEUE_FOR_MESSAGES_8);
        $message0 = $listResult1->getQueueMessages();
        $message0 = $message0[0];
        
        // TODO: Change the last parameter to 0 when the following is fixed:
        // https://github.com/WindowsAzure/azure-sdk-for-php/issues/99
        // Also, remove the sleep.
        $updateResult = $service->updateMessage(
                QueueServiceIntegrationTest::$TEST_QUEUE_FOR_MESSAGES_8, 
                $message0->getMessageId(), 
                $message0->getPopReceipt(), 
                "new text", 
                1);
        sleep(2);
        $listResult2 = $service->listMessages(QueueServiceIntegrationTest::$TEST_QUEUE_FOR_MESSAGES_8);

        // Assert
        Assert::assertNotNull('', $updateResult);
        Assert::assertNotNull('', $updateResult->getPopReceipt());
        Assert::assertNotNull('', $updateResult->getTimeNextVisible());
        Assert::assertTrue('', $year2010 < $updateResult->getTimeNextVisible());

        Assert::assertNotNull('', $listResult2);
        $entry = $listResult2->getQueueMessages();
        $entry = $entry[0];

        $blarg = $listResult1->getQueueMessages();
        $blarg = $blarg[0];
        
        Assert::assertEquals('', $blarg->getMessageId(), $entry->getMessageId());
        Assert::assertEquals('', "new text", $entry->getMessageText());
        Assert::assertNotNull('', $entry->getPopReceipt());
        Assert::assertEquals('', 2, $entry->getDequeueCount());

        Assert::assertNotNull('', $entry->getExpirationDate());
        Assert::assertTrue('', $year2010 < $entry->getExpirationDate());

        Assert::assertNotNull('', $entry->getInsertionDate());
        Assert::assertTrue('', $year2010 < $entry->getInsertionDate());

        Assert::assertNotNull('', $entry->getTimeNextVisible());
        Assert::assertTrue('', $year2010 < $entry->getTimeNextVisible());

    }
}
