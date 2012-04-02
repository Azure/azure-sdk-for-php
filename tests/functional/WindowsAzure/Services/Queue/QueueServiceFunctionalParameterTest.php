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

use InvalidArgumentException;
use PEAR2\WindowsAzure\Core\ServiceException;
use PEAR2\WindowsAzure\Resources;
use PEAR2\WindowsAzure\Services\Core\Models\Logging;
use PEAR2\WindowsAzure\Services\Core\Models\Metrics;
use PEAR2\WindowsAzure\Services\Core\Models\RetentionPolicy;
use PEAR2\WindowsAzure\Services\Core\Models\ServiceProperties;
use PEAR2\WindowsAzure\Services\Queue\Models\CreateMessageOptions;
use PEAR2\WindowsAzure\Services\Queue\Models\CreateQueueOptions;
use PEAR2\WindowsAzure\Services\Queue\Models\ListMessagesOptions;
use PEAR2\WindowsAzure\Services\Queue\Models\ListQueuesOptions;
use PEAR2\WindowsAzure\Services\Queue\Models\PeekMessagesOptions;
use PEAR2\WindowsAzure\Services\Queue\Models\QueueServiceOptions;

class QueueServiceFunctionalParameterTest extends FunctionalTestBase {
    // ----------------------------
    // --- getServiceProperties ---
    // ----------------------------

    public function testGetServicePropertiesNullOptions() {
        $service = FunctionalTestBase::createService();
        try {
            $service->getServiceProperties(null);
            $this->assertFalse(FunctionalTestBase::isRunningWithEmulator(), 'service properties should throw in emulator');
        }
        catch (ServiceException $e) {
            if (FunctionalTestBase::isRunningWithEmulator()) {
                // Properties are not supported in emulator
                $this->assertEquals(400, $e->getCode(), 'getCode');
            } else {
                throw $e;
            }
        }
    }

    // ----------------------------
    // --- setServiceProperties ---
    // ----------------------------

    public function testSetServicePropertiesNullOptions1() {
        $service = FunctionalTestBase::createService();
        $serviceProperties = QueueServiceFunctionalTestData::getDefaultServiceProperties();
        try {
            $service->setServiceProperties($serviceProperties);
            $this->assertFalse(FunctionalTestBase::isRunningWithEmulator(), 'service properties should throw in emulator');
        } catch (ServiceException $e) {
            if (FunctionalTestBase::isRunningWithEmulator()) {
                // Properties are not supported in emulator
                $this->assertEquals(400, $e->getCode(), 'getCode');
            } else {
                throw $e;
            }
        }
    }

    public function testSetServicePropertiesNullOptions2() {
        $this->assertTrue(false, 'Test gives a fatal error, so commenting out');

            // This gives a fatal error, so commenting out
            // https://github.com/WindowsAzure/azure-sdk-for-php/issues/108
//        $service = FunctionalTestBase::createService();
//        try {
//            $service->setServiceProperties(null);
//            $this->assertTrue(false, 'Expect null options to throw');
//        }
//        catch (NullPointerException $e) {
//            // Got the expected exception->
//        }
    }

    public function testSetServicePropertiesNullOptions3() {
        $this->assertTrue(false, 'Test gives a fatal error, so commenting out');
            // This gives a fatal error, so commenting out
            // https://github.com/WindowsAzure/azure-sdk-for-php/issues/108
//        $service = FunctionalTestBase::createService();
//        try {
//            $service->setServiceProperties(null, null);
//            $this->assertTrue(false, 'Expect null options to throw');
//        }
//        catch (NullPointerException $e) {
//            // Got the expected exception->
//        }
    }

    public function testSetServicePropertiesNullOptions4() {
        $service = FunctionalTestBase::createService();
        $serviceProperties = QueueServiceFunctionalTestData::getDefaultServiceProperties();

        try {
            $service->setServiceProperties($serviceProperties, null);
            $this->assertFalse(FunctionalTestBase::isRunningWithEmulator(), 'service properties should throw in emulator');
        }
        catch (ServiceException $e) {
            if (FunctionalTestBase::isRunningWithEmulator()) {
                // Setting is not supported in emulator
                $this->assertEquals(400, $e->getCode(), 'getCode');
            } else {
                throw $e;
            }
        }
    }

    // ------------------
    // --- listQueues ---
    // ------------------

    public function testListQueuesNullOptions() {
        $service = FunctionalTestBase::createService();
        $service->listQueues(null);
        $this->assertTrue(true, 'Should just work');
    }

    // -------------------
    // --- createQueue --- 
    // -------------------  

    public function testCreateQueueNullName() {
        $service = FunctionalTestBase::createService();

        try {
            $service->createQueue(null);
            $this->assertTrue(false, 'Expect null name to throw');
        }
        catch (ServiceException $e) {
            $this->assertFalse(true, 'Should not get a service exception');
        }
        catch (InvalidArgumentException $e) {
            $this->assertEquals(Resources::NULL_ERROR_MSG, $e->getMessage(), 'Expect error message');
        }
    }

    // -------------------
    // --- deleteQueue ---
    // -------------------

    public function testDeleteQueueNullName() {
        $service = FunctionalTestBase::createService();
        try {
            $service->deleteQueue(null);
            $this->assertTrue(false, 'Expect null name to throw');
        }
        catch (ServiceException $e) {
            $this->assertFalse(true, 'Should not get a service exception');
        }
        catch (InvalidArgumentException $e) {
            $this->assertEquals(Resources::NULL_ERROR_MSG, $e->getMessage(), 'Expect error message');
        }
    }

    // ------------------------
    // --- getQueueMetadata ---
    // ------------------------

    public function testGetQueueMetadataNullName() {
        $service = FunctionalTestBase::createService();
        try {
            $service->getQueueMetadata(null);
            $this->assertTrue(false, 'Expect null name to throw');
        }
        catch (ServiceException $e) {
            $this->assertFalse(true, 'Should not get a service exception');
        }
        catch (InvalidArgumentException $e) {
            $this->assertEquals(Resources::NULL_ERROR_MSG, $e->getMessage(), 'Expect error message');
        }
    }

    // ------------------------
    // --- setQueueMetadata ---
    // ------------------------

    public function testSetQueueMetadataNullNameAndOptions() {
        $service = FunctionalTestBase::createService();
        try {
            $service->setQueueMetadata(null, null);
            $this->assertTrue(false, 'Expect null name to throw');
        }
        catch (ServiceException $e) {
            $this->assertFalse(true, 'Should not get a service exception');
        }
        catch (InvalidArgumentException $e) {
            $this->assertEquals(Resources::NULL_ERROR_MSG, $e->getMessage(), 'Expect error message');
        }
    }

    public function testSetQueueMetadataNullName() {
        $service = FunctionalTestBase::createService();
        try {
            $service->setQueueMetadata(null, array());
            $this->assertTrue(false, 'Expect null name to throw');
        }
        catch (ServiceException $e) {
            $this->assertFalse(true, 'Should not get a service exception');
        }
        catch (InvalidArgumentException $e) {
            $this->assertEquals(Resources::NULL_ERROR_MSG, $e->getMessage(), 'Expect error message');
        }
    }

    public function testSetQueueMetadataNullOptions() {
        $service = FunctionalTestBase::createService();
        $queue = QueueServiceFunctionalTestData::$TEST_QUEUE_NAMES[0];
        $service->setQueueMetadata($queue, null);
        $this->assertTrue(true, 'Should just work');
    }

    // ---------------------
    // --- createMessage ---
    // ---------------------

    public function testCreateMessageQueueNull() {
        $queue = QueueServiceFunctionalTestData::$TEST_QUEUE_NAMES[0];
        $service = FunctionalTestBase::createService();
        try {
            $service->createMessage(null, null);
            $this->assertTrue(false, 'Expect null name to throw');
        }
        catch (ServiceException $e) {
            $this->assertFalse(true, 'Should not get a service exception');
        }
        catch (InvalidArgumentException $e) {
            $this->assertEquals(Resources::NULL_ERROR_MSG, $e->getMessage(), 'Expect error message');
        }
        $service->clearMessages($queue);
    }

    public function testCreateMessageNull() {
        $queue = QueueServiceFunctionalTestData::$TEST_QUEUE_NAMES[0];
        $service = FunctionalTestBase::createService();
        $service->createMessage($queue, null);
        $service->clearMessages($queue);
        $this->assertTrue(true, 'Should just work');
    }

    public function testCreateMessageBothMessageAndOptionsNull() {
        $queue = QueueServiceFunctionalTestData::$TEST_QUEUE_NAMES[0];
        $service = FunctionalTestBase::createService();
        $service->createMessage($queue, null, null);
        $service->clearMessages($queue);
        $this->assertTrue(true, 'Should just work');
    }

    public function testCreateMessageMessageNull() {
        $queue = QueueServiceFunctionalTestData::$TEST_QUEUE_NAMES[0];
        $service = FunctionalTestBase::createService();
        $service->createMessage($queue, null, QueueServiceFunctionalTestData::getSimpleCreateMessageOptions());
        $service->clearMessages($queue);
        $this->assertTrue(true, 'Should just work');
    }

    public function testCreateMessageOptionsNull() {
        $queue = QueueServiceFunctionalTestData::$TEST_QUEUE_NAMES[0];
        $service = FunctionalTestBase::createService();
        $service->createMessage($queue, QueueServiceFunctionalTestData::getSimpleMessageText(), null);
        $service->clearMessages($queue);
        $this->assertTrue(true, 'Should just work');
    }

    // ---------------------
    // --- updateMessage ---
    // ---------------------

    public function testUpdateMessageQueueNull() {
        $queue = null;
        $messageId = 'abc';
        $popReceipt = 'abc';
        $messageText = 'abc';
        $options = new QueueServiceOptions();
        $visibilityTimeoutInSeconds = 1;

        $service = FunctionalTestBase::createService();
        try {
            $service->updateMessage($queue, $messageId, $popReceipt, $messageText, $visibilityTimeoutInSeconds, $options);
            $this->assertTrue(false, 'Expect null name to throw');
        }
        catch (InvalidArgumentException $e) {
            $this->assertEquals(Resources::NULL_ERROR_MSG, $e->getMessage(), 'Expect error message');
        }
    }

    public function testUpdateMessageQueueEmpty() {
        $queue = '';
        $messageId = 'abc';
        $popReceipt = 'abc';
        $messageText = 'abc';
        $options = new QueueServiceOptions();
        $visibilityTimeoutInSeconds = 1;

        $service = FunctionalTestBase::createService();
        try {
            $service->updateMessage($queue, $messageId, $popReceipt, $messageText, $visibilityTimeoutInSeconds, $options);
            $this->assertTrue(false, 'Expect null name to throw');
        }
        catch (InvalidArgumentException $e) {
            $this->assertEquals(Resources::NULL_ERROR_MSG, $e->getMessage(), 'Expect error message');
        }
    }

    public function testUpdateMessageMessageIdNull() {
        $queue = QueueServiceFunctionalTestData::$TEST_QUEUE_NAMES[0];
        $messageId = null;
        $popReceipt = 'abc';
        $messageText = 'abc';
        $options = new QueueServiceOptions();
        $visibilityTimeoutInSeconds = 1;

        $service = FunctionalTestBase::createService();
        try {
            $service->updateMessage($queue, $messageId, $popReceipt, $messageText, $visibilityTimeoutInSeconds, $options);
            $this->assertTrue(false, 'Expect null message id to throw');
        }
        catch (InvalidArgumentException $e) {
            $this->assertEquals(Resources::NULL_ERROR_MSG, $e->getMessage(), 'Expect error message');
        }
    }

    public function testUpdateMessageMessageIdEmpty() {
        $queue = QueueServiceFunctionalTestData::$TEST_QUEUE_NAMES[0];
        $messageId = '';
        $popReceipt = 'abc';
        $messageText = 'abc';
        $options = new QueueServiceOptions();
        $visibilityTimeoutInSeconds = 1;

        $service = FunctionalTestBase::createService();
        try {
            $service->updateMessage($queue, $messageId, $popReceipt, $messageText, $visibilityTimeoutInSeconds, $options);
            $this->assertTrue(false, 'Expect null message id to throw');
        }
        catch (InvalidArgumentException $e) {
            $this->assertEquals(Resources::NULL_ERROR_MSG, $e->getMessage(), 'Expect error message');
        }
    }

    public function testUpdateMessagePopReceiptNull() {
        $queue = QueueServiceFunctionalTestData::$TEST_QUEUE_NAMES[0];
        $messageId = 'abc';
        $popReceipt = null;
        $messageText = 'abc';
        $options = new QueueServiceOptions();
        $visibilityTimeoutInSeconds = 1;

        $service = FunctionalTestBase::createService();
        try {
            $service->updateMessage($queue, $messageId, $popReceipt, $messageText, $visibilityTimeoutInSeconds, $options);
            $this->assertTrue(false, 'Expect null pop reciept to throw');
        }
        catch (InvalidArgumentException $e) {
            $this->assertEquals(Resources::NULL_ERROR_MSG, $e->getMessage(), 'Expect error message');
        }
    }

    public function testUpdateMessagePopReceiptEmpty() {
        $queue = QueueServiceFunctionalTestData::$TEST_QUEUE_NAMES[0];
        $messageId = 'abc';
        $popReceipt = '';
        $messageText = 'abc';
        $options = new QueueServiceOptions();
        $visibilityTimeoutInSeconds = 1;

        $service = FunctionalTestBase::createService();
        try {
            $service->updateMessage($queue, $messageId, $popReceipt, $messageText, $visibilityTimeoutInSeconds, $options);
            $this->assertTrue(false, 'Expect null pop reciept to throw');
        }
        catch (InvalidArgumentException $e) {
            $this->assertEquals(Resources::NULL_ERROR_MSG, $e->getMessage(), 'Expect error message');
        }
    }

    public function testUpdateMessageMessageTextNull() {
        $queue = QueueServiceFunctionalTestData::$TEST_QUEUE_NAMES[0];
        $messageId = 'abc';
        $popReceipt = 'abc';
        $messageText = null;
        $options = new QueueServiceOptions();
        $visibilityTimeoutInSeconds = 1;

        $service = FunctionalTestBase::createService();
        try {
            $service->updateMessage($queue, $messageId, $popReceipt, $messageText, $visibilityTimeoutInSeconds, $options);
            $this->assertTrue(false, 'Expect bogus message id to throw');
        }
        catch (ServiceException $e) {
            $this->assertEquals(400, $e->getCode(), 'getCode');
        }
    }

    public function testUpdateMessageMessageTextEmpty() {
        $queue = QueueServiceFunctionalTestData::$TEST_QUEUE_NAMES[0];
        $messageId = 'abc';
        $popReceipt = 'abc';
        $messageText = '';
        $options = new QueueServiceOptions();
        $visibilityTimeoutInSeconds = 1;

        $service = FunctionalTestBase::createService();
        try {
            $service->updateMessage($queue, $messageId, $popReceipt, $messageText, $visibilityTimeoutInSeconds, $options);
            $this->assertTrue(false, 'Expect bogus message id to throw');
        }
        catch (ServiceException $e) {
            $this->assertEquals(400, $e->getCode(), 'getCode');
        }
    }

    public function testUpdateMessageOptionsNull() {
        $queue = QueueServiceFunctionalTestData::$TEST_QUEUE_NAMES[0];
        $messageId = 'abc';
        $popReceipt = 'abc';
        $messageText = 'abc';
        $options = null;
        $visibilityTimeoutInSeconds = 1;

        $service = FunctionalTestBase::createService();
        try {
            $service->updateMessage($queue, $messageId, $popReceipt, $messageText, $visibilityTimeoutInSeconds, $options);
            $this->assertTrue(false, 'Expect bogus message id to throw');
        }
        catch (ServiceException $e) {
            $this->assertEquals(400, $e->getCode(), 'getCode');
        }
    }

    public function testUpdateMessageVisibilityTimeout0() {
        $queue = QueueServiceFunctionalTestData::$TEST_QUEUE_NAMES[0];
        $messageId = 'abc';
        $popReceipt = 'abc';
        $messageText = 'abc';
        $options = new QueueServiceOptions();
        $visibilityTimeoutInSeconds = 0;

        $service = FunctionalTestBase::createService();
        try {
            // Throws due to
            // https://github.com/WindowsAzure/azure-sdk-for-php/issues/99
            $service->updateMessage($queue, $messageId, $popReceipt, $messageText, $visibilityTimeoutInSeconds, $options);
            $this->assertTrue(false, 'Expect bogus message id to throw');
        }
        catch (InvalidArgumentException $e) {
            $this->assertFalse(true, 'Should not get a InvalidArgumentException exception');
        }
        catch (ServiceException $e) {
            $this->assertEquals(400, $e->getCode(), 'getCode');
        }
    }

    public function testUpdateMessageVisibilityTimeoutNull() {
        $queue = QueueServiceFunctionalTestData::$TEST_QUEUE_NAMES[0];
        $messageId = 'abc';
        $popReceipt = 'abc';
        $messageText = 'abc';
        $options = new QueueServiceOptions();
        $visibilityTimeoutInSeconds = null;

        $service = FunctionalTestBase::createService();
        try {
            $service->updateMessage($queue, $messageId, $popReceipt, $messageText, $visibilityTimeoutInSeconds, $options);
            $this->assertTrue(false, 'Expect null visibilityTimeoutInSeconds to throw');
        }
        catch (InvalidArgumentException $e) {
            $this->assertEquals(Resources::NULL_ERROR_MSG, $e->getMessage(), 'Expect error message');
        }
    }

    // ---------------------
    // --- deleteMessage ---
    // ---------------------

    public function testDeleteMessageQueueNullNoOptions() {
        $queue = null;
        $messageId = 'abc';
        $popReceipt = 'abc';

        $service = FunctionalTestBase::createService();
        try {
            $service->deleteMessage($queue, $messageId, $popReceipt);
            $this->assertTrue(false, 'Expect null queue to throw');
        }
        catch (InvalidArgumentException $e) {
            $this->assertEquals(Resources::NULL_ERROR_MSG, $e->getMessage(), 'Expect error message');
        }
    }

    public function testDeleteMessageQueueEmptyNoOptions() {
        $queue = '';
        $messageId = 'abc';
        $popReceipt = 'abc';

        $service = FunctionalTestBase::createService();
        try {
            $service->deleteMessage($queue, $messageId, $popReceipt);
            $this->assertTrue(false, 'Expect empty queue to throw');
        }
        catch (InvalidArgumentException $e) {
            $this->assertEquals(Resources::NULL_ERROR_MSG, $e->getMessage(), 'Expect error message');
        }
    }

    public function testDeleteMessageQueueNullWithOptions() {
        $queue = null;
        $messageId = 'abc';
        $popReceipt = 'abc';
        $options = new QueueServiceOptions();

        $service = FunctionalTestBase::createService();
        try {
            $service->deleteMessage($queue, $messageId, $popReceipt, $options);
            $this->assertTrue(false, 'Expect null queue to throw');
        }
        catch (InvalidArgumentException $e) {
            $this->assertEquals(Resources::NULL_ERROR_MSG, $e->getMessage(), 'Expect error message');
        }
    }

    public function testDeleteMessageMessageIdNull() {
        $queue = 'abc';
        $messageId = null;
        $popReceipt = 'abc';
        $options = new QueueServiceOptions();

        $service = FunctionalTestBase::createService();
        try {
            $service->deleteMessage($queue, $messageId, $popReceipt, $options);
            $this->assertTrue(false, 'Expect null messageid to throw');
        }
        catch (InvalidArgumentException $e) {
            $this->assertEquals(Resources::NULL_ERROR_MSG, $e->getMessage(), 'Expect error message');
        }
    }

    public function testDeleteMessageMessageIdEmpty() {
        $queue = 'abc';
        $messageId = '';
        $popReceipt = 'abc';
        $options = new QueueServiceOptions();

        $service = FunctionalTestBase::createService();
        try {
            $service->deleteMessage($queue, $messageId, $popReceipt, $options);
            $this->assertTrue(false, 'Expect empty messageid to throw');
        }
        catch (InvalidArgumentException $e) {
            $this->assertEquals(Resources::NULL_ERROR_MSG, $e->getMessage(), 'Expect error message');
        }
    }

    public function testDeleteMessagePopReceiptNull() {
        $queue = 'abc';
        $messageId = 'abc';
        $popReceipt = null;
        $options = new QueueServiceOptions();

        $service = FunctionalTestBase::createService();
        try {
            $service->deleteMessage($queue, $messageId, $popReceipt, $options);
            $this->assertTrue(false, 'Expect null popReceipt to throw');
        }
        catch (InvalidArgumentException $e) {
            $this->assertEquals(Resources::NULL_ERROR_MSG, $e->getMessage(), 'Expect error message');
        }
    }

    public function testDeleteMessagePopReceiptEmpty() {
        $queue = 'abc';
        $messageId = 'abc';
        $popReceipt = '';
        $options = new QueueServiceOptions();

        $service = FunctionalTestBase::createService();
        try {
            $service->deleteMessage($queue, $messageId, $popReceipt, $options);
            $this->assertTrue(false, 'Expect empty popReceipt to throw');
        }
        catch (InvalidArgumentException $e) {
            $this->assertEquals(Resources::NULL_ERROR_MSG, $e->getMessage(), 'Expect error message');
        }
    }

    public function testDeleteMessageOptionsNull() {
        $queue = 'abc';
        $messageId = 'abc';
        $popReceipt = 'abc';
        $options = null;

        $service = FunctionalTestBase::createService();
        try {
            $service->deleteMessage($queue, $messageId, $popReceipt, $options);
            $this->assertTrue(false, 'Expect bogus message id to throw');
        }
        catch (ServiceException $e) {
            $this->assertEquals(400, $e->getCode(), 'getCode');
        }
    }

    // --------------------
    // --- listMessages ---
    // --------------------

    public function testListMessagesQueueNullNoOptions() {
        $service = FunctionalTestBase::createService();
        try {
            $service->listMessages(null);
            $this->assertTrue(false, 'Expect null name to throw');
        }
        catch (ServiceException $e) {
            $this->assertFalse(true, 'Should not get a service exception');
        }
        catch (InvalidArgumentException $e) {
            $this->assertEquals(Resources::NULL_ERROR_MSG, $e->getMessage(), 'Expect error message');
        }
    }

    public function testListMessagesQueueNullWithOptions() {
        $service = FunctionalTestBase::createService();
        try {
            $service->listMessages(null, new ListMessagesOptions());
            $this->assertTrue(false, 'Expect null name to throw');
        }
        catch (ServiceException $e) {
            $this->assertFalse(true, 'Should not get a service exception');
        }
        catch (InvalidArgumentException $e) {
            $this->assertEquals(Resources::NULL_ERROR_MSG, $e->getMessage(), 'Expect error message');
        }
    }

    public function testListMessagesOptionsNull() {
        $service = FunctionalTestBase::createService();
        try {
            $service->listMessages('abc', null);
            $this->assertTrue(false, 'Expect bogus queue name to throw');
        }
        catch (ServiceException $e) {
            $this->assertEquals(404, $e->getCode(), 'getCode');
        }
    }

    public function testListMessagesAllNull() {
        $service = FunctionalTestBase::createService();
        try {
            $service->listMessages(null, null);
            $this->assertTrue(false, 'Expect null name to throw');
        }
        catch (ServiceException $e) {
            $this->assertFalse(true, 'Should not get a service exception');
        }
        catch (InvalidArgumentException $e) {
            $this->assertEquals(Resources::NULL_ERROR_MSG, $e->getMessage(), 'Expect error message');
        }
    }

    // --------------------
    // --- peekMessages ---
    // --------------------

    public function testPeekMessagesQueueNullNoOptions() {
        $service = FunctionalTestBase::createService();
        try {
            $service->peekMessages(null);
            $this->assertTrue(false, 'Expect null name to throw');
        }
        catch (ServiceException $e) {
            $this->assertFalse(true, 'Should not get a service exception');
        }
        catch (InvalidArgumentException $e) {
            $this->assertEquals(Resources::NULL_ERROR_MSG, $e->getMessage(), 'Expect error message');
        }
    }

    public function testPeekMessagesQueueEmptyNoOptions() {
        $service = FunctionalTestBase::createService();
        try {
            $service->peekMessages('');
            $this->assertTrue(false, 'Expect empty name to throw');
        }
        catch (ServiceException $e) {
            $this->assertFalse(true, 'Should not get a service exception');
        }
        catch (InvalidArgumentException $e) {
            $this->assertEquals(Resources::NULL_ERROR_MSG, $e->getMessage(), 'Expect error message');
        }
    }

    public function testPeekMessagesQueueNullWithOptions() {
        $service = FunctionalTestBase::createService();
        try {
            $service->peekMessages(null, new PeekMessagesOptions());
            $this->assertTrue(false, 'Expect null name to throw');
        }
        catch (ServiceException $e) {
            $this->assertFalse(true, 'Should not get a service exception');
        }
        catch (InvalidArgumentException $e) {
            $this->assertEquals(Resources::NULL_ERROR_MSG, $e->getMessage(), 'Expect error message');
        }
    }

    public function testPeekMessagesOptionsNull() {
        $service = FunctionalTestBase::createService();
        try {
            $service->peekMessages('abc', null);
            $this->assertTrue(false, 'Expect bogus queue name to throw');
        }
        catch (ServiceException $e) {
            $this->assertEquals(404, $e->getCode(), 'getCode');
        }
    }

    public function testPeekMessagesAllNull() {
        $service = FunctionalTestBase::createService();
        try {
            $service->peekMessages(null, null);
            $this->assertTrue(false, 'Expect null name to throw');
        }
        catch (ServiceException $e) {
            $this->assertFalse(true, 'Should not get a service exception');
        }
        catch (InvalidArgumentException $e) {
            $this->assertEquals(Resources::NULL_ERROR_MSG, $e->getMessage(), 'Expect error message');
        }
    }

    // ---------------------
    // --- clearMessages ---
    // ---------------------

    public function testClearMessagesQueueNullNoOptions() {
        $service = FunctionalTestBase::createService();
        try {
            $service->clearMessages(null);
            $this->assertTrue(false, 'Expect null name to throw');
        }
        catch (ServiceException $e) {
            $this->assertFalse(true, 'Should not get a service exception');
        }
        catch (InvalidArgumentException $e) {
            $this->assertEquals(Resources::NULL_ERROR_MSG, $e->getMessage(), 'Expect error message');
        }
    }

    public function testClearMessagesQueueNullWithOptions() {
        $service = FunctionalTestBase::createService();
        try {
            $service->clearMessages(null, new QueueServiceOptions());
            $this->assertTrue(false, 'Expect null name to throw');
        }
        catch (ServiceException $e) {
            $this->assertFalse(true, 'Should not get a service exception');
        }
        catch (InvalidArgumentException $e) {
            $this->assertEquals(Resources::NULL_ERROR_MSG, $e->getMessage(), 'Expect error message');
        }
    }

    public function testClearMessagesOptionsNull() {
        $service = FunctionalTestBase::createService();
        try {
            $service->clearMessages('abc', null);
            $this->assertTrue(false, 'Expect bogus queue name to throw');
        }
        catch (ServiceException $e) {
            $this->assertEquals(404, $e->getCode(), 'getCode');
        }
    }

    public function testClearMessagesAllNull() {
        $service = FunctionalTestBase::createService();
        try {
            $service->clearMessages(null, null);
            $this->assertTrue(false, 'Expect null name to throw');
        }
        catch (ServiceException $e) {
            $this->assertFalse(true, 'Should not get a service exception');
        }
        catch (InvalidArgumentException $e) {
            $this->assertEquals(Resources::NULL_ERROR_MSG, $e->getMessage(), 'Expect error message');
        }
    }
}
