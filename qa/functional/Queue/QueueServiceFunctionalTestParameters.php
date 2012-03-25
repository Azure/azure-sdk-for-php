<?php

namespace ext\microsoft\windowsazure\services\queue;

use PEAR2\WindowsAzure\Services\Core\Models\RetentionPolicy;
use PEAR2\WindowsAzure\Services\Core\Models\Logging;
use PEAR2\WindowsAzure\Services\Core\Models\Metrics;
use PEAR2\WindowsAzure\Services\Core\Models\ServiceProperties;
use PEAR2\WindowsAzure\Services\Queue\Models\QueueServiceOptions;
use PEAR2\WindowsAzure\Services\Queue\Models\ListQueuesOptions;
use PEAR2\WindowsAzure\Services\Queue\Models\CreateQueueOptions;
use PEAR2\WindowsAzure\Services\Queue\Models\CreateMessageOptions;
use PEAR2\WindowsAzure\Services\Queue\Models\ListMessagesOptions;
use PEAR2\WindowsAzure\Services\Queue\Models\PeekMessagesOptions;
use PEAR2\WindowsAzure\Core\ServiceException;
use PEAR2\WindowsAzure\Resources;
use InvalidArgumentException;

class QueueServiceFunctionalTestParameters extends FunctionalTestBase {
    // ----------------------------
    // --- getServiceProperties ---
    // ----------------------------

    public function getServicePropertiesNullOptions() {
        $service = FunctionalTestBase::createService();
        try {
            $service->getServiceProperties(null);
            if (FunctionalTestBase::isRunningWithEmulator()) {
                // Properties are not supported in emulator
                Assert::assertTrue("service properties should throw in emulator", false);
            }
        }
        catch (ServiceException $e) {
            if (FunctionalTestBase::isRunningWithEmulator()) {
                // Properties are not supported in emulator
                Assert::assertEquals("getCode", 400, $e->getCode());
            } else {
                throw $e;
            }
        }
    }

    // ----------------------------
    // --- setServiceProperties ---
    // ----------------------------

    public function setServicePropertiesNullOptions1() {
        $service = FunctionalTestBase::createService();
        $serviceProperties = QueueServiceFunctionalTestData::getDefaultServiceProperties();
        try {
            $service->setServiceProperties($serviceProperties);
            if (FunctionalTestBase::isRunningWithEmulator()) {
                // Properties are not supported in emulator
                Assert::assertTrue("service properties should throw in emulator", false);
            }
        } catch (ServiceException $e) {
            if (FunctionalTestBase::isRunningWithEmulator()) {
                // Properties are not supported in emulator
                Assert::assertEquals("getCode", 400, $e->getCode());
            } else {
                throw $e;
            }
        }
    }

    public function setServicePropertiesNullOptions2() {
            // This gives a fatal error, so commenting out
            // https://github.com/WindowsAzure/azure-sdk-for-php/issues/108
//        $service = FunctionalTestBase::createService();
//        try {
//            $service->setServiceProperties(null);
//            Assert::assertTrue("Expect null options to throw", false);
//        }
//        catch (NullPointerException $e) {
//            // Got the expected exception->
//        }
    }

    public function setServicePropertiesNullOptions3() {
            // This gives a fatal error, so commenting out
            // https://github.com/WindowsAzure/azure-sdk-for-php/issues/108
//        $service = FunctionalTestBase::createService();
//        try {
//            $service->setServiceProperties(null, null);
//            Assert::assertTrue("Expect null options to throw", false);
//        }
//        catch (NullPointerException $e) {
//            // Got the expected exception->
//        }
    }

    public function setServicePropertiesNullOptions4() {
        $service = FunctionalTestBase::createService();
        $serviceProperties = QueueServiceFunctionalTestData::getDefaultServiceProperties();

        try {
            $service->setServiceProperties($serviceProperties, null);
        }
        catch (ServiceException $e) {
            if (FunctionalTestBase::isRunningWithEmulator()) {
                // Setting is not supported in emulator
                Assert::assertEquals("getCode", 400, $e->getCode());
            } else {
                throw $e;
            }
        }
    }

    // ------------------
    // --- listQueues ---
    // ------------------

    public function listQueuesNullOptions() {
        $service = FunctionalTestBase::createService();
        $service->listQueues(null);
    }

    // -------------------
    // --- createQueue --- 
    // -------------------  

    public function createQueueNullName() {
        $service = FunctionalTestBase::createService();

        try {
            $service->createQueue(null);
            Assert::assertTrue("Expect null name to throw", false);
        }
        catch (InvalidArgumentException $e) {
            Assert::assertEquals("Expect error message", Resources::NULL_ERROR_MSG, $e->getMessage());
        }
    }

    // -------------------
    // --- deleteQueue ---
    // -------------------

    public function deleteQueueNullName() {
        $service = FunctionalTestBase::createService();
        try {
            $service->deleteQueue(null);
            Assert::assertTrue("Expect null name to throw", false);
        }
        catch (InvalidArgumentException $e) {
            Assert::assertEquals("Expect error message", Resources::NULL_ERROR_MSG, $e->getMessage());
        }
    }

    // ------------------------
    // --- getQueueMetadata ---
    // ------------------------

    public function getQueueMetadataNullName() {
        $service = FunctionalTestBase::createService();
        try {
            $service->getQueueMetadata(null);
            Assert::assertTrue("Expect null name to throw", false);
        }
        catch (InvalidArgumentException $e) {
            Assert::assertEquals("Expect error message", Resources::NULL_ERROR_MSG, $e->getMessage());
        }
    }

    // ------------------------
    // --- setQueueMetadata ---
    // ------------------------

    public function setQueueMetadataNullNameAndOptions() {
        $service = FunctionalTestBase::createService();
        try {
            $service->setQueueMetadata(null, null);
            Assert::assertTrue("Expect null name to throw", false);
        }
        catch (InvalidArgumentException $e) {
            Assert::assertEquals("Expect error message", Resources::NULL_ERROR_MSG, $e->getMessage());
        }
    }

    public function setQueueMetadataNullName() {
        $service = FunctionalTestBase::createService();
        try {
            $service->setQueueMetadata(null, array());
            Assert::assertTrue("Expect null name to throw", false);
        }
        catch (InvalidArgumentException $e) {
            Assert::assertEquals("Expect error message", Resources::NULL_ERROR_MSG, $e->getMessage());
        }
    }

    public function setQueueMetadataNullOptions() {
        $service = FunctionalTestBase::createService();
        $queue = QueueServiceFunctionalTestData::$TEST_QUEUE_NAMES[0];
        $service->setQueueMetadata($queue, null);
    }

    // ---------------------
    // --- createMessage ---
    // ---------------------

    public function createMessageQueueNull() {
        $queue = QueueServiceFunctionalTestData::$TEST_QUEUE_NAMES[0];
        $service = FunctionalTestBase::createService();
        try {
            $service->createMessage(null, null);
            Assert::assertTrue("Expect null name to throw", false);
        }
        catch (InvalidArgumentException $e) {
            Assert::assertEquals("Expect error message", Resources::NULL_ERROR_MSG, $e->getMessage());
        }
        $service->clearMessages($queue);
    }

    public function createMessageNull() {
        $queue = QueueServiceFunctionalTestData::$TEST_QUEUE_NAMES[0];
        $service = FunctionalTestBase::createService();
        $service->createMessage($queue, null);
        $service->clearMessages($queue);
    }

    public function createMessageBothMessageAndOptionsNull() {
        $queue = QueueServiceFunctionalTestData::$TEST_QUEUE_NAMES[0];
        $service = FunctionalTestBase::createService();
        $service->createMessage($queue, null, null);
        $service->clearMessages($queue);
    }

    public function createMessageMessageNull() {
        $queue = QueueServiceFunctionalTestData::$TEST_QUEUE_NAMES[0];
        $service = FunctionalTestBase::createService();
        $service->createMessage($queue, null, QueueServiceFunctionalTestData::getSimpleCreateMessageOptions());
        $service->clearMessages($queue);
    }

    public function createMessageOptionsNull() {
        $queue = QueueServiceFunctionalTestData::$TEST_QUEUE_NAMES[0];
        $service = FunctionalTestBase::createService();
        $service->createMessage($queue, QueueServiceFunctionalTestData::getSimpleMessageText(), null);
        $service->clearMessages($queue);
    }

    // ---------------------
    // --- updateMessage ---
    // ---------------------

    public function updateMessageQueueNull() {
        $queue = null;
        $messageId = "abc";
        $popReceipt = "abc";
        $messageText = "abc";
        $options = new QueueServiceOptions();
        $visibilityTimeoutInSeconds = 1;

        $service = FunctionalTestBase::createService();
        try {
            $service->updateMessage($queue, $messageId, $popReceipt, $messageText, $visibilityTimeoutInSeconds, $options);
            Assert::assertTrue("Expect null name to throw", false);
        }
        catch (InvalidArgumentException $e) {
            Assert::assertEquals("Expect error message", Resources::NULL_ERROR_MSG, $e->getMessage());
        }
    }

    public function updateMessageQueueEmpty() {
        $queue = '';
        $messageId = "abc";
        $popReceipt = "abc";
        $messageText = "abc";
        $options = new QueueServiceOptions();
        $visibilityTimeoutInSeconds = 1;

        $service = FunctionalTestBase::createService();
        try {
            $service->updateMessage($queue, $messageId, $popReceipt, $messageText, $visibilityTimeoutInSeconds, $options);
            Assert::assertTrue("Expect null name to throw", false);
        }
        catch (InvalidArgumentException $e) {
            Assert::assertEquals("Expect error message", Resources::NULL_ERROR_MSG, $e->getMessage());
        }
    }

    public function updateMessageMessageIdNull() {
        $queue = QueueServiceFunctionalTestData::$TEST_QUEUE_NAMES[0];
        $messageId = null;
        $popReceipt = "abc";
        $messageText = "abc";
        $options = new QueueServiceOptions();
        $visibilityTimeoutInSeconds = 1;

        $service = FunctionalTestBase::createService();
        try {
            $service->updateMessage($queue, $messageId, $popReceipt, $messageText, $visibilityTimeoutInSeconds, $options);
            Assert::assertTrue("Expect null message id to throw", false);
        }
        catch (InvalidArgumentException $e) {
            Assert::assertEquals("Expect error message", Resources::NULL_ERROR_MSG, $e->getMessage());
        }
    }

    public function updateMessageMessageIdEmpty() {
        $queue = QueueServiceFunctionalTestData::$TEST_QUEUE_NAMES[0];
        $messageId = '';
        $popReceipt = "abc";
        $messageText = "abc";
        $options = new QueueServiceOptions();
        $visibilityTimeoutInSeconds = 1;

        $service = FunctionalTestBase::createService();
        try {
            $service->updateMessage($queue, $messageId, $popReceipt, $messageText, $visibilityTimeoutInSeconds, $options);
            Assert::assertTrue("Expect null message id to throw", false);
        }
        catch (InvalidArgumentException $e) {
            Assert::assertEquals("Expect error message", Resources::NULL_ERROR_MSG, $e->getMessage());
        }
    }

    public function updateMessagePopReceiptNull() {
        $queue = QueueServiceFunctionalTestData::$TEST_QUEUE_NAMES[0];
        $messageId = "abc";
        $popReceipt = null;
        $messageText = "abc";
        $options = new QueueServiceOptions();
        $visibilityTimeoutInSeconds = 1;

        $service = FunctionalTestBase::createService();
        try {
            $service->updateMessage($queue, $messageId, $popReceipt, $messageText, $visibilityTimeoutInSeconds, $options);
            Assert::assertTrue("Expect null pop reciept to throw", false);
        }
        catch (InvalidArgumentException $e) {
            Assert::assertEquals("Expect error message", Resources::NULL_ERROR_MSG, $e->getMessage());
        }
    }

    public function updateMessagePopReceiptEmpty() {
        $queue = QueueServiceFunctionalTestData::$TEST_QUEUE_NAMES[0];
        $messageId = "abc";
        $popReceipt = '';
        $messageText = "abc";
        $options = new QueueServiceOptions();
        $visibilityTimeoutInSeconds = 1;

        $service = FunctionalTestBase::createService();
        try {
            $service->updateMessage($queue, $messageId, $popReceipt, $messageText, $visibilityTimeoutInSeconds, $options);
            Assert::assertTrue("Expect null pop reciept to throw", false);
        }
        catch (InvalidArgumentException $e) {
            Assert::assertEquals("Expect error message", Resources::NULL_ERROR_MSG, $e->getMessage());
        }
    }

    public function updateMessageMessageTextNull() {
        $queue = QueueServiceFunctionalTestData::$TEST_QUEUE_NAMES[0];
        $messageId = "abc";
        $popReceipt = "abc";
        $messageText = null;
        $options = new QueueServiceOptions();
        $visibilityTimeoutInSeconds = 1;

        $service = FunctionalTestBase::createService();
        try {
            $service->updateMessage($queue, $messageId, $popReceipt, $messageText, $visibilityTimeoutInSeconds, $options);
            Assert::assertTrue("Expect bogus message id to throw", false);
        }
        catch (ServiceException $e) {
            Assert::assertEquals("getCode", 400, $e->getCode());
        }
    }

    public function updateMessageMessageTextEmpty() {
        $queue = QueueServiceFunctionalTestData::$TEST_QUEUE_NAMES[0];
        $messageId = "abc";
        $popReceipt = "abc";
        $messageText = '';
        $options = new QueueServiceOptions();
        $visibilityTimeoutInSeconds = 1;

        $service = FunctionalTestBase::createService();
        try {
            $service->updateMessage($queue, $messageId, $popReceipt, $messageText, $visibilityTimeoutInSeconds, $options);
            Assert::assertTrue("Expect bogus message id to throw", false);
        }
        catch (ServiceException $e) {
            Assert::assertEquals("getCode", 400, $e->getCode());
        }
    }

    public function updateMessageOptionsNull() {
        $queue = QueueServiceFunctionalTestData::$TEST_QUEUE_NAMES[0];
        $messageId = "abc";
        $popReceipt = "abc";
        $messageText = "abc";
        $options = null;
        $visibilityTimeoutInSeconds = 1;

        $service = FunctionalTestBase::createService();
        try {
            $service->updateMessage($queue, $messageId, $popReceipt, $messageText, $visibilityTimeoutInSeconds, $options);
            Assert::assertTrue("Expect bogus message id to throw", false);
        }
        catch (ServiceException $e) {
            Assert::assertEquals("getCode", 400, $e->getCode());
        }
    }

    public function updateMessageVisibilityTimeout0() {
        $queue = QueueServiceFunctionalTestData::$TEST_QUEUE_NAMES[0];
        $messageId = "abc";
        $popReceipt = "abc";
        $messageText = "abc";
        $options = new QueueServiceOptions();
        $visibilityTimeoutInSeconds = 0;

        $service = FunctionalTestBase::createService();
        try {
            // Throws due to
            // https://github.com/WindowsAzure/azure-sdk-for-php/issues/99
            $service->updateMessage($queue, $messageId, $popReceipt, $messageText, $visibilityTimeoutInSeconds, $options);
            Assert::assertTrue("Expect bogus message id to throw", false);
        }
        catch (ServiceException $e) {
            Assert::assertEquals("getCode", 400, $e->getCode());
        }
    }

    public function updateMessageVisibilityTimeoutNull() {
        $queue = QueueServiceFunctionalTestData::$TEST_QUEUE_NAMES[0];
        $messageId = "abc";
        $popReceipt = "abc";
        $messageText = "abc";
        $options = new QueueServiceOptions();
        $visibilityTimeoutInSeconds = null;

        $service = FunctionalTestBase::createService();
        try {
            $service->updateMessage($queue, $messageId, $popReceipt, $messageText, $visibilityTimeoutInSeconds, $options);
            Assert::assertTrue("Expect null visibilityTimeoutInSeconds to throw", false);
        }
        catch (InvalidArgumentException $e) {
            Assert::assertEquals("Expect error message", Resources::NULL_ERROR_MSG, $e->getMessage());
        }
    }

    // ---------------------
    // --- deleteMessage ---
    // ---------------------

    public function deleteMessageQueueNullNoOptions() {
        $queue = null;
        $messageId = "abc";
        $popReceipt = "abc";

        $service = FunctionalTestBase::createService();
        try {
            $service->deleteMessage($queue, $messageId, $popReceipt);
            Assert::assertTrue("Expect null queue to throw", false);
        }
        catch (InvalidArgumentException $e) {
            Assert::assertEquals("Expect error message", Resources::NULL_ERROR_MSG, $e->getMessage());
        }
    }

    public function deleteMessageQueueEmptyNoOptions() {
        $queue = '';
        $messageId = "abc";
        $popReceipt = "abc";

        $service = FunctionalTestBase::createService();
        try {
            $service->deleteMessage($queue, $messageId, $popReceipt);
            Assert::assertTrue("Expect empty queue to throw", false);
        }
        catch (InvalidArgumentException $e) {
            Assert::assertEquals("Expect error message", Resources::NULL_ERROR_MSG, $e->getMessage());
        }
    }

    public function deleteMessageQueueNullWithOptions() {
        $queue = null;
        $messageId = "abc";
        $popReceipt = "abc";
        $options = new QueueServiceOptions();

        $service = FunctionalTestBase::createService();
        try {
            $service->deleteMessage($queue, $messageId, $popReceipt, $options);
            Assert::assertTrue("Expect null queue to throw", false);
        }
        catch (InvalidArgumentException $e) {
            Assert::assertEquals("Expect error message", Resources::NULL_ERROR_MSG, $e->getMessage());
        }
    }

    public function deleteMessageMessageIdNull() {
        $queue = "abc";
        $messageId = null;
        $popReceipt = "abc";
        $options = new QueueServiceOptions();

        $service = FunctionalTestBase::createService();
        try {
            $service->deleteMessage($queue, $messageId, $popReceipt, $options);
            Assert::assertTrue("Expect null messageid to throw", false);
        }
        catch (InvalidArgumentException $e) {
            Assert::assertEquals("Expect error message", Resources::NULL_ERROR_MSG, $e->getMessage());
        }
    }

    public function deleteMessageMessageIdEmpty() {
        $queue = "abc";
        $messageId = '';
        $popReceipt = "abc";
        $options = new QueueServiceOptions();

        $service = FunctionalTestBase::createService();
        try {
            $service->deleteMessage($queue, $messageId, $popReceipt, $options);
            Assert::assertTrue("Expect empty messageid to throw", false);
        }
        catch (InvalidArgumentException $e) {
            Assert::assertEquals("Expect error message", Resources::NULL_ERROR_MSG, $e->getMessage());
        }
    }

    public function deleteMessagePopReceiptNull() {
        $queue = "abc";
        $messageId = "abc";
        $popReceipt = null;
        $options = new QueueServiceOptions();

        $service = FunctionalTestBase::createService();
        try {
            $service->deleteMessage($queue, $messageId, $popReceipt, $options);
            Assert::assertTrue("Expect null popReceipt to throw", false);
        }
        catch (InvalidArgumentException $e) {
            Assert::assertEquals("Expect error message", Resources::NULL_ERROR_MSG, $e->getMessage());
        }
    }

    public function deleteMessagePopReceiptEmpty() {
        $queue = "abc";
        $messageId = "abc";
        $popReceipt = '';
        $options = new QueueServiceOptions();

        $service = FunctionalTestBase::createService();
        try {
            $service->deleteMessage($queue, $messageId, $popReceipt, $options);
            Assert::assertTrue("Expect empty popReceipt to throw", false);
        }
        catch (InvalidArgumentException $e) {
            Assert::assertEquals("Expect error message", Resources::NULL_ERROR_MSG, $e->getMessage());
        }
    }

    public function deleteMessageOptionsNull() {
        $queue = "abc";
        $messageId = "abc";
        $popReceipt = "abc";
        $options = null;

        $service = FunctionalTestBase::createService();
        try {
            $service->deleteMessage($queue, $messageId, $popReceipt, $options);
            Assert::assertTrue("Expect bogus message id to throw", false);
        }
        catch (ServiceException $e) {
            Assert::assertEquals("getCode", 400, $e->getCode());
        }
    }

    // --------------------
    // --- listMessages ---
    // --------------------

    public function listMessagesQueueNullNoOptions() {
        $service = FunctionalTestBase::createService();
        try {
            $service->listMessages(null);
            Assert::assertTrue("Expect null name to throw", false);
        }
        catch (InvalidArgumentException $e) {
            Assert::assertEquals("Expect error message", Resources::NULL_ERROR_MSG, $e->getMessage());
        }
    }

    public function listMessagesQueueNullWithOptions() {
        $service = FunctionalTestBase::createService();
        try {
            $service->listMessages(null, new ListMessagesOptions());
            Assert::assertTrue("Expect null name to throw", false);
        }
        catch (InvalidArgumentException $e) {
            Assert::assertEquals("Expect error message", Resources::NULL_ERROR_MSG, $e->getMessage());
        }
    }

    public function listMessagesOptionsNull() {
        $service = FunctionalTestBase::createService();
        try {
            $service->listMessages("abc", null);
            Assert::assertTrue("Expect bogus queue name to throw", false);
        }
        catch (ServiceException $e) {
            Assert::assertEquals("getCode", 404, $e->getCode());
        }
    }

    public function listMessagesAllNull() {
        $service = FunctionalTestBase::createService();
        try {
            $service->listMessages(null, null);
            Assert::assertTrue("Expect null name to throw", false);
        }
        catch (InvalidArgumentException $e) {
            Assert::assertEquals("Expect error message", Resources::NULL_ERROR_MSG, $e->getMessage());
        }
    }

    // --------------------
    // --- peekMessages ---
    // --------------------

    public function peekMessagesQueueNullNoOptions() {
        $service = FunctionalTestBase::createService();
        try {
            $service->peekMessages(null);
            Assert::assertTrue("Expect null name to throw", false);
        }
        catch (InvalidArgumentException $e) {
            Assert::assertEquals("Expect error message", Resources::NULL_ERROR_MSG, $e->getMessage());
        }
    }

    public function peekMessagesQueueEmptyNoOptions() {
        $service = FunctionalTestBase::createService();
        try {
            $service->peekMessages('');
            Assert::assertTrue("Expect empty name to throw", false);
        }
        catch (InvalidArgumentException $e) {
            Assert::assertEquals("Expect error message", Resources::NULL_ERROR_MSG, $e->getMessage());
        }
    }

    public function peekMessagesQueueNullWithOptions() {
        $service = FunctionalTestBase::createService();
        try {
            $service->peekMessages(null, new PeekMessagesOptions());
            Assert::assertTrue("Expect null name to throw", false);
        }
        catch (InvalidArgumentException $e) {
            Assert::assertEquals("Expect error message", Resources::NULL_ERROR_MSG, $e->getMessage());
        }
    }

    public function peekMessagesOptionsNull() {
        $service = FunctionalTestBase::createService();
        try {
            $service->peekMessages("abc", null);
            Assert::assertTrue("Expect bogus queue name to throw", false);
        }
        catch (ServiceException $e) {
            Assert::assertEquals("getCode", 404, $e->getCode());
        }
    }

    public function peekMessagesAllNull() {
        $service = FunctionalTestBase::createService();
        try {
            $service->peekMessages(null, null);
            Assert::assertTrue("Expect null name to throw", false);
        }
        catch (InvalidArgumentException $e) {
            Assert::assertEquals("Expect error message", Resources::NULL_ERROR_MSG, $e->getMessage());
        }
    }

    // ---------------------
    // --- clearMessages ---
    // ---------------------

    public function clearMessagesQueueNullNoOptions() {
        $service = FunctionalTestBase::createService();
        try {
            $service->clearMessages(null);
            Assert::assertTrue("Expect null name to throw", false);
        }
        catch (InvalidArgumentException $e) {
            Assert::assertEquals("Expect error message", Resources::NULL_ERROR_MSG, $e->getMessage());
        }
    }

    public function clearMessagesQueueNullWithOptions() {
        $service = FunctionalTestBase::createService();
        try {
            $service->clearMessages(null, new QueueServiceOptions());
            Assert::assertTrue("Expect null name to throw", false);
        }
        catch (InvalidArgumentException $e) {
            Assert::assertEquals("Expect error message", Resources::NULL_ERROR_MSG, $e->getMessage());
        }
    }

    public function clearMessagesOptionsNull() {
        $service = FunctionalTestBase::createService();
        try {
            $service->clearMessages("abc", null);
            Assert::assertTrue("Expect bogus queue name to throw", false);
        }
        catch (ServiceException $e) {
            Assert::assertEquals("getCode", 404, $e->getCode());
        }
    }

    public function clearMessagesAllNull() {
        $service = FunctionalTestBase::createService();
        try {
            $service->clearMessages(null, null);
            Assert::assertTrue("Expect null name to throw", false);
        }
        catch (InvalidArgumentException $e) {
            Assert::assertEquals("Expect error message", Resources::NULL_ERROR_MSG, $e->getMessage());
        }
    }
}
