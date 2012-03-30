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
            $this->assertFalse('service properties should throw in emulator', FunctionalTestBase::isRunningWithEmulator());
        }
        catch (ServiceException $e) {
            if (FunctionalTestBase::isRunningWithEmulator()) {
                // Properties are not supported in emulator
                $this->assertEquals('getCode', 400, $e->getCode());
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
            $this->assertFalse('service properties should throw in emulator', FunctionalTestBase::isRunningWithEmulator());
        } catch (ServiceException $e) {
            if (FunctionalTestBase::isRunningWithEmulator()) {
                // Properties are not supported in emulator
                $this->assertEquals('getCode', 400, $e->getCode());
            } else {
                throw $e;
            }
        }
    }

    public function testSetServicePropertiesNullOptions2() {
        $this->assertTrue('Test gives a fatal error, so commenting out', false);

            // This gives a fatal error, so commenting out
            // https://github.com/WindowsAzure/azure-sdk-for-php/issues/108
//        $service = FunctionalTestBase::createService();
//        try {
//            $service->setServiceProperties(null);
//            $this->assertTrue('Expect null options to throw', false);
//        }
//        catch (NullPointerException $e) {
//            // Got the expected exception->
//        }
    }

    public function testSetServicePropertiesNullOptions3() {
        $this->assertTrue('Test gives a fatal error, so commenting out', false);
            // This gives a fatal error, so commenting out
            // https://github.com/WindowsAzure/azure-sdk-for-php/issues/108
//        $service = FunctionalTestBase::createService();
//        try {
//            $service->setServiceProperties(null, null);
//            $this->assertTrue('Expect null options to throw', false);
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
            $this->assertFalse('service properties should throw in emulator', FunctionalTestBase::isRunningWithEmulator());
        }
        catch (ServiceException $e) {
            if (FunctionalTestBase::isRunningWithEmulator()) {
                // Setting is not supported in emulator
                $this->assertEquals('getCode', 400, $e->getCode());
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
        $this->assertTrue('Should just work', true);
    }

    // -------------------
    // --- createQueue --- 
    // -------------------  

    public function testCreateQueueNullName() {
        $service = FunctionalTestBase::createService();

        try {
            $service->createQueue(null);
            $this->assertTrue('Expect null name to throw', false);
        }
        catch (ServiceException $e) {
            $this->assertFalse('Should not get a service exception', true);
        }
        catch (InvalidArgumentException $e) {
            $this->assertEquals('Expect error message', Resources::NULL_ERROR_MSG, $e->getMessage());
        }
    }

    // -------------------
    // --- deleteQueue ---
    // -------------------

    public function testDeleteQueueNullName() {
        $service = FunctionalTestBase::createService();
        try {
            $service->deleteQueue(null);
            $this->assertTrue('Expect null name to throw', false);
        }
        catch (ServiceException $e) {
            $this->assertFalse('Should not get a service exception', true);
        }
        catch (InvalidArgumentException $e) {
            $this->assertEquals('Expect error message', Resources::NULL_ERROR_MSG, $e->getMessage());
        }
    }

    // ------------------------
    // --- getQueueMetadata ---
    // ------------------------

    public function testGetQueueMetadataNullName() {
        $service = FunctionalTestBase::createService();
        try {
            $service->getQueueMetadata(null);
            $this->assertTrue('Expect null name to throw', false);
        }
        catch (ServiceException $e) {
            $this->assertFalse('Should not get a service exception', true);
        }
        catch (InvalidArgumentException $e) {
            $this->assertEquals('Expect error message', Resources::NULL_ERROR_MSG, $e->getMessage());
        }
    }

    // ------------------------
    // --- setQueueMetadata ---
    // ------------------------

    public function testSetQueueMetadataNullNameAndOptions() {
        $service = FunctionalTestBase::createService();
        try {
            $service->setQueueMetadata(null, null);
            $this->assertTrue('Expect null name to throw', false);
        }
        catch (ServiceException $e) {
            $this->assertFalse('Should not get a service exception', true);
        }
        catch (InvalidArgumentException $e) {
            $this->assertEquals('Expect error message', Resources::NULL_ERROR_MSG, $e->getMessage());
        }
    }

    public function testSetQueueMetadataNullName() {
        $service = FunctionalTestBase::createService();
        try {
            $service->setQueueMetadata(null, array());
            $this->assertTrue('Expect null name to throw', false);
        }
        catch (ServiceException $e) {
            $this->assertFalse('Should not get a service exception', true);
        }
        catch (InvalidArgumentException $e) {
            $this->assertEquals('Expect error message', Resources::NULL_ERROR_MSG, $e->getMessage());
        }
    }

    public function testSetQueueMetadataNullOptions() {
        $service = FunctionalTestBase::createService();
        $queue = QueueServiceFunctionalTestData::$TEST_QUEUE_NAMES[0];
        $service->setQueueMetadata($queue, null);
        $this->assertTrue('Should just work', true);
    }

    // ---------------------
    // --- createMessage ---
    // ---------------------

    public function testCreateMessageQueueNull() {
        $queue = QueueServiceFunctionalTestData::$TEST_QUEUE_NAMES[0];
        $service = FunctionalTestBase::createService();
        try {
            $service->createMessage(null, null);
            $this->assertTrue('Expect null name to throw', false);
        }
        catch (ServiceException $e) {
            $this->assertFalse('Should not get a service exception', true);
        }
        catch (InvalidArgumentException $e) {
            $this->assertEquals('Expect error message', Resources::NULL_ERROR_MSG, $e->getMessage());
        }
        $service->clearMessages($queue);
    }

    public function testCreateMessageNull() {
        $queue = QueueServiceFunctionalTestData::$TEST_QUEUE_NAMES[0];
        $service = FunctionalTestBase::createService();
        $service->createMessage($queue, null);
        $service->clearMessages($queue);
        $this->assertTrue('Should just work', true);
    }

    public function testCreateMessageBothMessageAndOptionsNull() {
        $queue = QueueServiceFunctionalTestData::$TEST_QUEUE_NAMES[0];
        $service = FunctionalTestBase::createService();
        $service->createMessage($queue, null, null);
        $service->clearMessages($queue);
        $this->assertTrue('Should just work', true);
    }

    public function testCreateMessageMessageNull() {
        $queue = QueueServiceFunctionalTestData::$TEST_QUEUE_NAMES[0];
        $service = FunctionalTestBase::createService();
        $service->createMessage($queue, null, QueueServiceFunctionalTestData::getSimpleCreateMessageOptions());
        $service->clearMessages($queue);
        $this->assertTrue('Should just work', true);
    }

    public function testCreateMessageOptionsNull() {
        $queue = QueueServiceFunctionalTestData::$TEST_QUEUE_NAMES[0];
        $service = FunctionalTestBase::createService();
        $service->createMessage($queue, QueueServiceFunctionalTestData::getSimpleMessageText(), null);
        $service->clearMessages($queue);
        $this->assertTrue('Should just work', true);
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
            $this->assertTrue('Expect null name to throw', false);
        }
        catch (InvalidArgumentException $e) {
            $this->assertEquals('Expect error message', Resources::NULL_ERROR_MSG, $e->getMessage());
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
            $this->assertTrue('Expect null name to throw', false);
        }
        catch (InvalidArgumentException $e) {
            $this->assertEquals('Expect error message', Resources::NULL_ERROR_MSG, $e->getMessage());
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
            $this->assertTrue('Expect null message id to throw', false);
        }
        catch (InvalidArgumentException $e) {
            $this->assertEquals('Expect error message', Resources::NULL_ERROR_MSG, $e->getMessage());
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
            $this->assertTrue('Expect null message id to throw', false);
        }
        catch (InvalidArgumentException $e) {
            $this->assertEquals('Expect error message', Resources::NULL_ERROR_MSG, $e->getMessage());
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
            $this->assertTrue('Expect null pop reciept to throw', false);
        }
        catch (InvalidArgumentException $e) {
            $this->assertEquals('Expect error message', Resources::NULL_ERROR_MSG, $e->getMessage());
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
            $this->assertTrue('Expect null pop reciept to throw', false);
        }
        catch (InvalidArgumentException $e) {
            $this->assertEquals('Expect error message', Resources::NULL_ERROR_MSG, $e->getMessage());
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
            $this->assertTrue('Expect bogus message id to throw', false);
        }
        catch (ServiceException $e) {
            $this->assertEquals('getCode', 400, $e->getCode());
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
            $this->assertTrue('Expect bogus message id to throw', false);
        }
        catch (ServiceException $e) {
            $this->assertEquals('getCode', 400, $e->getCode());
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
            $this->assertTrue('Expect bogus message id to throw', false);
        }
        catch (ServiceException $e) {
            $this->assertEquals('getCode', 400, $e->getCode());
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
            $this->assertTrue('Expect bogus message id to throw', false);
        }
        catch (InvalidArgumentException $e) {
            $this->assertFalse('Should not get a InvalidArgumentException exception', true);
        }
        catch (ServiceException $e) {
            $this->assertEquals('getCode', 400, $e->getCode());
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
            $this->assertTrue('Expect null visibilityTimeoutInSeconds to throw', false);
        }
        catch (InvalidArgumentException $e) {
            $this->assertEquals('Expect error message', Resources::NULL_ERROR_MSG, $e->getMessage());
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
            $this->assertTrue('Expect null queue to throw', false);
        }
        catch (InvalidArgumentException $e) {
            $this->assertEquals('Expect error message', Resources::NULL_ERROR_MSG, $e->getMessage());
        }
    }

    public function testDeleteMessageQueueEmptyNoOptions() {
        $queue = '';
        $messageId = 'abc';
        $popReceipt = 'abc';

        $service = FunctionalTestBase::createService();
        try {
            $service->deleteMessage($queue, $messageId, $popReceipt);
            $this->assertTrue('Expect empty queue to throw', false);
        }
        catch (InvalidArgumentException $e) {
            $this->assertEquals('Expect error message', Resources::NULL_ERROR_MSG, $e->getMessage());
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
            $this->assertTrue('Expect null queue to throw', false);
        }
        catch (InvalidArgumentException $e) {
            $this->assertEquals('Expect error message', Resources::NULL_ERROR_MSG, $e->getMessage());
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
            $this->assertTrue('Expect null messageid to throw', false);
        }
        catch (InvalidArgumentException $e) {
            $this->assertEquals('Expect error message', Resources::NULL_ERROR_MSG, $e->getMessage());
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
            $this->assertTrue('Expect empty messageid to throw', false);
        }
        catch (InvalidArgumentException $e) {
            $this->assertEquals('Expect error message', Resources::NULL_ERROR_MSG, $e->getMessage());
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
            $this->assertTrue('Expect null popReceipt to throw', false);
        }
        catch (InvalidArgumentException $e) {
            $this->assertEquals('Expect error message', Resources::NULL_ERROR_MSG, $e->getMessage());
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
            $this->assertTrue('Expect empty popReceipt to throw', false);
        }
        catch (InvalidArgumentException $e) {
            $this->assertEquals('Expect error message', Resources::NULL_ERROR_MSG, $e->getMessage());
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
            $this->assertTrue('Expect bogus message id to throw', false);
        }
        catch (ServiceException $e) {
            $this->assertEquals('getCode', 400, $e->getCode());
        }
    }

    // --------------------
    // --- listMessages ---
    // --------------------

    public function testListMessagesQueueNullNoOptions() {
        $service = FunctionalTestBase::createService();
        try {
            $service->listMessages(null);
            $this->assertTrue('Expect null name to throw', false);
        }
        catch (ServiceException $e) {
            $this->assertFalse('Should not get a service exception', true);
        }
        catch (InvalidArgumentException $e) {
            $this->assertEquals('Expect error message', Resources::NULL_ERROR_MSG, $e->getMessage());
        }
    }

    public function testListMessagesQueueNullWithOptions() {
        $service = FunctionalTestBase::createService();
        try {
            $service->listMessages(null, new ListMessagesOptions());
            $this->assertTrue('Expect null name to throw', false);
        }
        catch (ServiceException $e) {
            $this->assertFalse('Should not get a service exception', true);
        }
        catch (InvalidArgumentException $e) {
            $this->assertEquals('Expect error message', Resources::NULL_ERROR_MSG, $e->getMessage());
        }
    }

    public function testListMessagesOptionsNull() {
        $service = FunctionalTestBase::createService();
        try {
            $service->listMessages('abc', null);
            $this->assertTrue('Expect bogus queue name to throw', false);
        }
        catch (ServiceException $e) {
            $this->assertEquals('getCode', 404, $e->getCode());
        }
    }

    public function testListMessagesAllNull() {
        $service = FunctionalTestBase::createService();
        try {
            $service->listMessages(null, null);
            $this->assertTrue('Expect null name to throw', false);
        }
        catch (ServiceException $e) {
            $this->assertFalse('Should not get a service exception', true);
        }
        catch (InvalidArgumentException $e) {
            $this->assertEquals('Expect error message', Resources::NULL_ERROR_MSG, $e->getMessage());
        }
    }

    // --------------------
    // --- peekMessages ---
    // --------------------

    public function testPeekMessagesQueueNullNoOptions() {
        $service = FunctionalTestBase::createService();
        try {
            $service->peekMessages(null);
            $this->assertTrue('Expect null name to throw', false);
        }
        catch (ServiceException $e) {
            $this->assertFalse('Should not get a service exception', true);
        }
        catch (InvalidArgumentException $e) {
            $this->assertEquals('Expect error message', Resources::NULL_ERROR_MSG, $e->getMessage());
        }
    }

    public function testPeekMessagesQueueEmptyNoOptions() {
        $service = FunctionalTestBase::createService();
        try {
            $service->peekMessages('');
            $this->assertTrue('Expect empty name to throw', false);
        }
        catch (ServiceException $e) {
            $this->assertFalse('Should not get a service exception', true);
        }
        catch (InvalidArgumentException $e) {
            $this->assertEquals('Expect error message', Resources::NULL_ERROR_MSG, $e->getMessage());
        }
    }

    public function testPeekMessagesQueueNullWithOptions() {
        $service = FunctionalTestBase::createService();
        try {
            $service->peekMessages(null, new PeekMessagesOptions());
            $this->assertTrue('Expect null name to throw', false);
        }
        catch (ServiceException $e) {
            $this->assertFalse('Should not get a service exception', true);
        }
        catch (InvalidArgumentException $e) {
            $this->assertEquals('Expect error message', Resources::NULL_ERROR_MSG, $e->getMessage());
        }
    }

    public function testPeekMessagesOptionsNull() {
        $service = FunctionalTestBase::createService();
        try {
            $service->peekMessages('abc', null);
            $this->assertTrue('Expect bogus queue name to throw', false);
        }
        catch (ServiceException $e) {
            $this->assertEquals('getCode', 404, $e->getCode());
        }
    }

    public function testPeekMessagesAllNull() {
        $service = FunctionalTestBase::createService();
        try {
            $service->peekMessages(null, null);
            $this->assertTrue('Expect null name to throw', false);
        }
        catch (ServiceException $e) {
            $this->assertFalse('Should not get a service exception', true);
        }
        catch (InvalidArgumentException $e) {
            $this->assertEquals('Expect error message', Resources::NULL_ERROR_MSG, $e->getMessage());
        }
    }

    // ---------------------
    // --- clearMessages ---
    // ---------------------

    public function testClearMessagesQueueNullNoOptions() {
        $service = FunctionalTestBase::createService();
        try {
            $service->clearMessages(null);
            $this->assertTrue('Expect null name to throw', false);
        }
        catch (ServiceException $e) {
            $this->assertFalse('Should not get a service exception', true);
        }
        catch (InvalidArgumentException $e) {
            $this->assertEquals('Expect error message', Resources::NULL_ERROR_MSG, $e->getMessage());
        }
    }

    public function testClearMessagesQueueNullWithOptions() {
        $service = FunctionalTestBase::createService();
        try {
            $service->clearMessages(null, new QueueServiceOptions());
            $this->assertTrue('Expect null name to throw', false);
        }
        catch (ServiceException $e) {
            $this->assertFalse('Should not get a service exception', true);
        }
        catch (InvalidArgumentException $e) {
            $this->assertEquals('Expect error message', Resources::NULL_ERROR_MSG, $e->getMessage());
        }
    }

    public function testClearMessagesOptionsNull() {
        $service = FunctionalTestBase::createService();
        try {
            $service->clearMessages('abc', null);
            $this->assertTrue('Expect bogus queue name to throw', false);
        }
        catch (ServiceException $e) {
            $this->assertEquals('getCode', 404, $e->getCode());
        }
    }

    public function testClearMessagesAllNull() {
        $service = FunctionalTestBase::createService();
        try {
            $service->clearMessages(null, null);
            $this->assertTrue('Expect null name to throw', false);
        }
        catch (ServiceException $e) {
            $this->assertFalse('Should not get a service exception', true);
        }
        catch (InvalidArgumentException $e) {
            $this->assertEquals('Expect error message', Resources::NULL_ERROR_MSG, $e->getMessage());
        }
    }
}
