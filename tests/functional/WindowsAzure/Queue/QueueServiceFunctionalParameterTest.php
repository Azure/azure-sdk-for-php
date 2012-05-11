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

use WindowsAzure\Common\Internal\Resources;
use WindowsAzure\Common\Internal\ServiceException;
use WindowsAzure\Common\Configuration;
use WindowsAzure\Common\Models\Logging;
use WindowsAzure\Common\Models\Metrics;
use WindowsAzure\Common\Models\RetentionPolicy;
use WindowsAzure\Common\Models\ServiceProperties;
use WindowsAzure\Queue\Models\CreateMessageOptions;
use WindowsAzure\Queue\Models\CreateQueueOptions;
use WindowsAzure\Queue\Models\ListMessagesOptions;
use WindowsAzure\Queue\Models\ListQueuesOptions;
use WindowsAzure\Queue\Models\PeekMessagesOptions;
use WindowsAzure\Queue\Models\QueueServiceOptions;

class QueueServiceFunctionalParameterTest extends FunctionalTestBase {
    /**
    * @covers WindowsAzure\Queue\Internal\QueueRestProxy::getServiceProperties
    */
    public function testGetServicePropertiesNullOptions() {
        try {
            $this->wrapper->getServiceProperties(null);
            $this->assertFalse(Configuration::isEmulated(), 'Should fail if and only if in emulator');
        }
        catch (ServiceException $e) {
            // Expect failure when run this test with emulator, as v1.6 doesn't support this method
            if (Configuration::isEmulated()) {
                // Properties are not supported in emulator
                $this->assertEquals(400, $e->getCode(), 'getCode');
            } else {
                throw $e;
            }
        }
    }

    /**
    * @covers WindowsAzure\Queue\Internal\QueueRestProxy::setServiceProperties
    */
    public function testSetServicePropertiesNullOptions1() {

        $serviceProperties = QueueServiceFunctionalTestData::getDefaultServiceProperties();
        try {
            $this->wrapper->setServiceProperties($serviceProperties);
            $this->assertFalse(Configuration::isEmulated(), 'service properties should throw in emulator');
        } catch (ServiceException $e) {
            if (Configuration::isEmulated()) {
                // Properties are not supported in emulator
                $this->assertEquals(400, $e->getCode(), 'getCode');
            } else {
                throw $e;
            }
        }
    }

    /**
    * @covers WindowsAzure\Queue\Internal\QueueRestProxy::setServiceProperties
    */
    public function testSetServicePropertiesNullOptions2() {
        try {
            $this->wrapper->setServiceProperties(null);
            $this->fail('Expect null service properties to throw');
        }
        catch (\InvalidArgumentException $e) {
            $this->assertEquals(Resources::INVALID_SVC_PROP_MSG, $e->getMessage(), 'Expect error message');           
            $this->assertEquals(0, $e->getCode(), 'Expected error code');
        }
    }

    /**
    * @covers WindowsAzure\Queue\Internal\QueueRestProxy::setServiceProperties
    */
    public function testSetServicePropertiesNullOptions3() {
        try {
            $this->wrapper->setServiceProperties(null, null);
            $this->fail('Expect service properties to throw');
        }
        catch (\InvalidArgumentException $e) {
            $this->assertEquals(Resources::INVALID_SVC_PROP_MSG, $e->getMessage(), 'Expect error message');           
            $this->assertEquals(0, $e->getCode(), 'Expected error code');
        }
    }

    /**
    * @covers WindowsAzure\Queue\Internal\QueueRestProxy::setServiceProperties
    */
    public function testSetServicePropertiesNullOptions4() {
        $serviceProperties = QueueServiceFunctionalTestData::getDefaultServiceProperties();

        try {
            $this->wrapper->setServiceProperties($serviceProperties, null);
            $this->assertFalse(Configuration::isEmulated(), 'service properties should throw in emulator');
        }
        catch (ServiceException $e) {
            if (Configuration::isEmulated()) {
                // Setting is not supported in emulator
                $this->assertEquals(400, $e->getCode(), 'getCode');
            } else {
                throw $e;
            }
        }
    }

    /**
    * @covers WindowsAzure\Queue\Internal\QueueRestProxy::listQueues
    */
    public function testListQueuesNullOptions() {
        $this->wrapper->listQueues(null);
        $this->assertTrue(true, 'Should just work');
    }

    /**
    * @covers WindowsAzure\Queue\Internal\QueueRestProxy::createQueue
    */
    public function testCreateQueueNullName() {
        try {
            $this->wrapper->createQueue(null);
            $this->fail('Expect null name to throw');
        }
        catch (ServiceException $e) {
            $this->fail('Should not get a service exception');
        }
        catch (\InvalidArgumentException $e) {
            $this->assertEquals(sprintf(Resources::NULL_OR_EMPTY_MSG, 'queueName'), $e->getMessage(), 'Expect error message');
        }
    }

    /**
    * @covers WindowsAzure\Queue\Internal\QueueRestProxy::deleteQueue
    */
    public function testDeleteQueueNullName() {
        try {
            $this->wrapper->deleteQueue(null);
            $this->fail('Expect null name to throw');
        }
        catch (ServiceException $e) {
            $this->fail('Should not get a service exception');
        }
        catch (\InvalidArgumentException $e) {
            $this->assertEquals(sprintf(Resources::NULL_OR_EMPTY_MSG, 'queueName'), $e->getMessage(), 'Expect error message');
        }
    }

    /**
    * @covers WindowsAzure\Queue\Internal\QueueRestProxy::getQueueMetadata
    */
    public function testGetQueueMetadataNullName() {
        try {
            $this->wrapper->getQueueMetadata(null);
            $this->fail('Expect null name to throw');
        }
        catch (ServiceException $e) {
            $this->fail('Should not get a service exception');
        }
        catch (\InvalidArgumentException $e) {
            $this->assertEquals(sprintf(Resources::NULL_OR_EMPTY_MSG, 'queueName'), $e->getMessage(), 'Expect error message');
        }
    }

    /**
    * @covers WindowsAzure\Queue\Internal\QueueRestProxy::setQueueMetadata
    */
    public function testSetQueueMetadataNullNameAndOptions() {
        try {
            $this->wrapper->setQueueMetadata(null, null);
            $this->fail('Expect null name to throw');
        }
        catch (ServiceException $e) {
            $this->fail('Should not get a service exception');
        }
        catch (\InvalidArgumentException $e) {
            $this->assertEquals(sprintf(Resources::NULL_OR_EMPTY_MSG, 'queueName'), $e->getMessage(), 'Expect error message');
        }
    }

    /**
    * @covers WindowsAzure\Queue\Internal\QueueRestProxy::setQueueMetadata
    */
    public function testSetQueueMetadataNullName() {
        try {
            $this->wrapper->setQueueMetadata(null, array());
            $this->fail('Expect null name to throw');
        }
        catch (ServiceException $e) {
            $this->fail('Should not get a service exception');
        }
        catch (\InvalidArgumentException $e) {
            $this->assertEquals(sprintf(Resources::NULL_OR_EMPTY_MSG, 'queueName'), $e->getMessage(), 'Expect error message');
        }
    }

    /**
    * @covers WindowsAzure\Queue\Internal\QueueRestProxy::setQueueMetadata
    */
    public function testSetQueueMetadataNullMetadata() {
        $queue = QueueServiceFunctionalTestData::$TEST_QUEUE_NAMES[0];
        $this->wrapper->setQueueMetadata($queue, null);
        $this->assertTrue(true, 'Should just work');
    }

    /**
    * @covers WindowsAzure\Queue\Internal\QueueRestProxy::setQueueMetadata
    */
    public function testSetQueueMetadataEmptyMetadata() {
        $queue = QueueServiceFunctionalTestData::$TEST_QUEUE_NAMES[0];
        $this->wrapper->setQueueMetadata($queue, array());
        $this->assertTrue(true, 'Should just work');
    }

    /**
    * @covers WindowsAzure\Queue\Internal\QueueRestProxy::setQueueMetadata
    */
    public function testSetQueueMetadataNullOptions() {
        $queue = QueueServiceFunctionalTestData::$TEST_QUEUE_NAMES[0];
        $this->wrapper->setQueueMetadata($queue, array(), null);
        $this->assertTrue(true, 'Should just work');
    }

    /**
    * @covers WindowsAzure\Queue\Internal\QueueRestProxy::clearMessages
    * @covers WindowsAzure\Queue\Internal\QueueRestProxy::createMessage
    */
    public function testCreateMessageQueueNull() {
        $queue = QueueServiceFunctionalTestData::$TEST_QUEUE_NAMES[0];
        try {
            $this->wrapper->createMessage(null, null);
            $this->fail('Expect null name to throw');
        }
        catch (ServiceException $e) {
            $this->fail('Should not get a service exception');
        }
        catch (\InvalidArgumentException $e) {
            $this->assertEquals(sprintf(Resources::NULL_OR_EMPTY_MSG, 'queueName'), $e->getMessage(), 'Expect error message');
        }
        $this->wrapper->clearMessages($queue);
    }

    /**
    * @covers WindowsAzure\Queue\Internal\QueueRestProxy::clearMessages
    * @covers WindowsAzure\Queue\Internal\QueueRestProxy::createMessage
    */
    public function testCreateMessageNull() {
        $queue = QueueServiceFunctionalTestData::$TEST_QUEUE_NAMES[0];
        $this->wrapper->createMessage($queue, null);
        $this->wrapper->clearMessages($queue);
        $this->assertTrue(true, 'Should just work');
    }

    /**
    * @covers WindowsAzure\Queue\Internal\QueueRestProxy::clearMessages
    * @covers WindowsAzure\Queue\Internal\QueueRestProxy::createMessage
    */
    public function testCreateMessageBothMessageAndOptionsNull() {
        $queue = QueueServiceFunctionalTestData::$TEST_QUEUE_NAMES[0];
        $this->wrapper->createMessage($queue, null, null);
        $this->wrapper->clearMessages($queue);
        $this->assertTrue(true, 'Should just work');
    }

    /**
    * @covers WindowsAzure\Queue\Internal\QueueRestProxy::clearMessages
    * @covers WindowsAzure\Queue\Internal\QueueRestProxy::createMessage
    */
    public function testCreateMessageMessageNull() {
        $queue = QueueServiceFunctionalTestData::$TEST_QUEUE_NAMES[0];
        $this->wrapper->createMessage($queue, null, QueueServiceFunctionalTestData::getSimpleCreateMessageOptions());
        $this->wrapper->clearMessages($queue);
        $this->assertTrue(true, 'Should just work');
    }

    /**
    * @covers WindowsAzure\Queue\Internal\QueueRestProxy::clearMessages
    * @covers WindowsAzure\Queue\Internal\QueueRestProxy::createMessage
    */
    public function testCreateMessageOptionsNull() {
        $queue = QueueServiceFunctionalTestData::$TEST_QUEUE_NAMES[0];
        $this->wrapper->createMessage($queue, QueueServiceFunctionalTestData::getSimpleMessageText(), null);
        $this->wrapper->clearMessages($queue);
        $this->assertTrue(true, 'Should just work');
    }

    /**
    * @covers WindowsAzure\Queue\Internal\QueueRestProxy::updateMessage
    */
    public function testUpdateMessageQueueNull() {
        $queue = null;
        $messageId = 'abc';
        $popReceipt = 'abc';
        $messageText = 'abc';
        $options = new QueueServiceOptions();
        $visibilityTimeoutInSeconds = 1;

        try {
            $this->wrapper->updateMessage($queue, $messageId, $popReceipt, $messageText, $visibilityTimeoutInSeconds, $options);
            $this->fail('Expect null name to throw');
        }
        catch (\InvalidArgumentException $e) {
            $this->assertEquals(sprintf(Resources::NULL_OR_EMPTY_MSG, 'queueName'), $e->getMessage(), 'Expect error message');
        }
    }

    /**
    * @covers WindowsAzure\Queue\Internal\QueueRestProxy::updateMessage
    */
    public function testUpdateMessageQueueEmpty() {
        $queue = '';
        $messageId = 'abc';
        $popReceipt = 'abc';
        $messageText = 'abc';
        $options = new QueueServiceOptions();
        $visibilityTimeoutInSeconds = 1;

        try {
            $this->wrapper->updateMessage($queue, $messageId, $popReceipt, $messageText, $visibilityTimeoutInSeconds, $options);
            $this->fail('Expect null name to throw');
        }
        catch (\InvalidArgumentException $e) {
            $this->assertEquals(sprintf(Resources::NULL_OR_EMPTY_MSG, 'queueName'), $e->getMessage(), 'Expect error message');
        }
    }

    /**
    * @covers WindowsAzure\Queue\Internal\QueueRestProxy::updateMessage
    */
    public function testUpdateMessageMessageIdNull() {
        $queue = QueueServiceFunctionalTestData::$TEST_QUEUE_NAMES[0];
        $messageId = null;
        $popReceipt = 'abc';
        $messageText = 'abc';
        $options = new QueueServiceOptions();
        $visibilityTimeoutInSeconds = 1;

        try {
            $this->wrapper->updateMessage($queue, $messageId, $popReceipt, $messageText, $visibilityTimeoutInSeconds, $options);
            $this->fail('Expect null messageId to throw');
        }
        catch (\InvalidArgumentException $e) {
            $this->assertEquals(sprintf(Resources::NULL_OR_EMPTY_MSG, 'messageId'), $e->getMessage(), 'Expect error message');
        }
    }

    /**
    * @covers WindowsAzure\Queue\Internal\QueueRestProxy::updateMessage
    */
    public function testUpdateMessageMessageIdEmpty() {
        $queue = QueueServiceFunctionalTestData::$TEST_QUEUE_NAMES[0];
        $messageId = '';
        $popReceipt = 'abc';
        $messageText = 'abc';
        $options = new QueueServiceOptions();
        $visibilityTimeoutInSeconds = 1;

        try {
            $this->wrapper->updateMessage($queue, $messageId, $popReceipt, $messageText, $visibilityTimeoutInSeconds, $options);
            $this->fail('Expect null messageId to throw');
        }
        catch (\InvalidArgumentException $e) {
            $this->assertEquals(sprintf(Resources::NULL_OR_EMPTY_MSG, 'messageId'), $e->getMessage(), 'Expect error message');
        }
    }

    /**
    * @covers WindowsAzure\Queue\Internal\QueueRestProxy::updateMessage
    */
    public function testUpdateMessagePopReceiptNull() {
        $queue = QueueServiceFunctionalTestData::$TEST_QUEUE_NAMES[0];
        $messageId = 'abc';
        $popReceipt = null;
        $messageText = 'abc';
        $options = new QueueServiceOptions();
        $visibilityTimeoutInSeconds = 1;

        try {
            $this->wrapper->updateMessage($queue, $messageId, $popReceipt, $messageText, $visibilityTimeoutInSeconds, $options);
            $this->fail('Expect null popReceipt to throw');
        }
        catch (\InvalidArgumentException $e) {
            $this->assertEquals(sprintf(Resources::NULL_OR_EMPTY_MSG, 'popReceipt'), $e->getMessage(), 'Expect error message');
        }
    }

    /**
    * @covers WindowsAzure\Queue\Internal\QueueRestProxy::updateMessage
    */
    public function testUpdateMessagePopReceiptEmpty() {
        $queue = QueueServiceFunctionalTestData::$TEST_QUEUE_NAMES[0];
        $messageId = 'abc';
        $popReceipt = '';
        $messageText = 'abc';
        $options = new QueueServiceOptions();
        $visibilityTimeoutInSeconds = 1;

        try {
            $this->wrapper->updateMessage($queue, $messageId, $popReceipt, $messageText, $visibilityTimeoutInSeconds, $options);
            $this->fail('Expect null popReceipt to throw');
        }
        catch (\InvalidArgumentException $e) {
            $this->assertEquals(sprintf(Resources::NULL_OR_EMPTY_MSG, 'popReceipt'), $e->getMessage(), 'Expect error message');
        }
    }

    /**
    * @covers WindowsAzure\Queue\Internal\QueueRestProxy::updateMessage
    */
    public function testUpdateMessageMessageTextNull() {
        $queue = QueueServiceFunctionalTestData::$TEST_QUEUE_NAMES[0];
        $messageId = 'abc';
        $popReceipt = 'abc';
        $messageText = null;
        $options = new QueueServiceOptions();
        $visibilityTimeoutInSeconds = 1;

        try {
            $this->wrapper->updateMessage($queue, $messageId, $popReceipt, $messageText, $visibilityTimeoutInSeconds, $options);
            $this->fail('Expect bogus message id to throw');
        }
        catch (ServiceException $e) {
            $this->assertEquals(400, $e->getCode(), 'getCode');
        }
    }

    /**
    * @covers WindowsAzure\Queue\Internal\QueueRestProxy::updateMessage
    */
    public function testUpdateMessageMessageTextEmpty() {
        $queue = QueueServiceFunctionalTestData::$TEST_QUEUE_NAMES[0];
        $messageId = 'abc';
        $popReceipt = 'abc';
        $messageText = '';
        $options = new QueueServiceOptions();
        $visibilityTimeoutInSeconds = 1;

        try {
            $this->wrapper->updateMessage($queue, $messageId, $popReceipt, $messageText, $visibilityTimeoutInSeconds, $options);
            $this->fail('Expect bogus message id to throw');
        }
        catch (ServiceException $e) {
            $this->assertEquals(400, $e->getCode(), 'getCode');
        }
    }

    /**
    * @covers WindowsAzure\Queue\Internal\QueueRestProxy::updateMessage
    */
    public function testUpdateMessageOptionsNull() {
        $queue = QueueServiceFunctionalTestData::$TEST_QUEUE_NAMES[0];
        $messageId = 'abc';
        $popReceipt = 'abc';
        $messageText = 'abc';
        $options = null;
        $visibilityTimeoutInSeconds = 1;

        try {
            $this->wrapper->updateMessage($queue, $messageId, $popReceipt, $messageText, $visibilityTimeoutInSeconds, $options);
            $this->fail('Expect bogus message id to throw');
        }
        catch (ServiceException $e) {
            $this->assertEquals(400, $e->getCode(), 'getCode');
        }
    }

    /**
    * @covers WindowsAzure\Queue\Internal\QueueRestProxy::updateMessage
    */
    public function testUpdateMessageVisibilityTimeout0() {
        $queue = QueueServiceFunctionalTestData::$TEST_QUEUE_NAMES[0];
        $messageId = 'abc';
        $popReceipt = 'abc';
        $messageText = 'abc';
        $options = new QueueServiceOptions();
        $visibilityTimeoutInSeconds = 0;

        try {
            // Throws due to
            // https://github.com/WindowsAzure/azure-sdk-for-php/issues/99
            $this->wrapper->updateMessage($queue, $messageId, $popReceipt, $messageText, $visibilityTimeoutInSeconds, $options);
            $this->fail('Expect bogus message id to throw');
        }
        catch (\InvalidArgumentException $e) {
            $this->fail('Should not get an InvalidArgumentException exception');
        }
        catch (ServiceException $e) {
            $this->assertEquals(400, $e->getCode(), 'getCode');
        }
    }

    /**
    * @covers WindowsAzure\Queue\Internal\QueueRestProxy::updateMessage
    */
    public function testUpdateMessageVisibilityTimeoutNull() {
        $queue = QueueServiceFunctionalTestData::$TEST_QUEUE_NAMES[0];
        $messageId = 'abc';
        $popReceipt = 'abc';
        $messageText = 'abc';
        $options = new QueueServiceOptions();
        $visibilityTimeoutInSeconds = null;

        try {
            $this->wrapper->updateMessage($queue, $messageId, $popReceipt, $messageText, $visibilityTimeoutInSeconds, $options);
            $this->fail('Expect null visibilityTimeoutInSeconds to throw');
        }
        catch (\InvalidArgumentException $e) {
            $this->assertEquals(sprintf(Resources::NULL_MSG, 'visibilityTimeoutInSeconds'), $e->getMessage(), 'Expect error message');
        }
    }

    /**
    * @covers WindowsAzure\Queue\Internal\QueueRestProxy::deleteMessage
    */
    public function testDeleteMessageQueueNullNoOptions() {
        $queue = null;
        $messageId = 'abc';
        $popReceipt = 'abc';

        try {
            $this->wrapper->deleteMessage($queue, $messageId, $popReceipt);
            $this->fail('Expect null queue to throw');
        }
        catch (\InvalidArgumentException $e) {
            $this->assertEquals(sprintf(Resources::NULL_OR_EMPTY_MSG, 'queueName'), $e->getMessage(), 'Expect error message');
        }
    }

    /**
    * @covers WindowsAzure\Queue\Internal\QueueRestProxy::deleteMessage
    */
    public function testDeleteMessageQueueEmptyNoOptions() {
        $queue = '';
        $messageId = 'abc';
        $popReceipt = 'abc';

        try {
            $this->wrapper->deleteMessage($queue, $messageId, $popReceipt);
            $this->fail('Expect empty queue to throw');
        }
        catch (\InvalidArgumentException $e) {
            $this->assertEquals(sprintf(Resources::NULL_OR_EMPTY_MSG, 'queueName'), $e->getMessage(), 'Expect error message');
        }
    }

    /**
    * @covers WindowsAzure\Queue\Internal\QueueRestProxy::deleteMessage
    */
    public function testDeleteMessageQueueNullWithOptions() {
        $queue = null;
        $messageId = 'abc';
        $popReceipt = 'abc';
        $options = new QueueServiceOptions();

        try {
            $this->wrapper->deleteMessage($queue, $messageId, $popReceipt, $options);
            $this->fail('Expect null queue to throw');
        }
        catch (\InvalidArgumentException $e) {
            $this->assertEquals(sprintf(Resources::NULL_OR_EMPTY_MSG, 'queueName'), $e->getMessage(), 'Expect error message');
        }
    }

    /**
    * @covers WindowsAzure\Queue\Internal\QueueRestProxy::deleteMessage
    */
    public function testDeleteMessageMessageIdNull() {
        $queue = 'abc';
        $messageId = null;
        $popReceipt = 'abc';
        $options = new QueueServiceOptions();

        try {
            $this->wrapper->deleteMessage($queue, $messageId, $popReceipt, $options);
            $this->fail('Expect null messageId to throw');
        }
        catch (\InvalidArgumentException $e) {
            $this->assertEquals(sprintf(Resources::NULL_OR_EMPTY_MSG, 'messageId'), $e->getMessage(), 'Expect error message');
        }
    }

    /**
    * @covers WindowsAzure\Queue\Internal\QueueRestProxy::deleteMessage
    */
    public function testDeleteMessageMessageIdEmpty() {
        $queue = 'abc';
        $messageId = '';
        $popReceipt = 'abc';
        $options = new QueueServiceOptions();

        try {
            $this->wrapper->deleteMessage($queue, $messageId, $popReceipt, $options);
            $this->fail('Expect empty messageId to throw');
        }
        catch (\InvalidArgumentException $e) {
            $this->assertEquals(sprintf(Resources::NULL_OR_EMPTY_MSG, 'messageId'), $e->getMessage(), 'Expect error message');
        }
    }

    /**
    * @covers WindowsAzure\Queue\Internal\QueueRestProxy::deleteMessage
    */
    public function testDeleteMessagePopReceiptNull() {
        $queue = 'abc';
        $messageId = 'abc';
        $popReceipt = null;
        $options = new QueueServiceOptions();

        try {
            $this->wrapper->deleteMessage($queue, $messageId, $popReceipt, $options);
            $this->fail('Expect null popReceipt to throw');
        }
        catch (\InvalidArgumentException $e) {
            $this->assertEquals(sprintf(Resources::NULL_OR_EMPTY_MSG, 'popReceipt'), $e->getMessage(), 'Expect error message');
        }
    }

    /**
    * @covers WindowsAzure\Queue\Internal\QueueRestProxy::deleteMessage
    */
    public function testDeleteMessagePopReceiptEmpty() {
        $queue = 'abc';
        $messageId = 'abc';
        $popReceipt = '';
        $options = new QueueServiceOptions();

        try {
            $this->wrapper->deleteMessage($queue, $messageId, $popReceipt, $options);
            $this->fail('Expect empty popReceipt to throw');
        }
        catch (\InvalidArgumentException $e) {
            $this->assertEquals(sprintf(Resources::NULL_OR_EMPTY_MSG, 'popReceipt'), $e->getMessage(), 'Expect error message');
        }
    }

    /**
    * @covers WindowsAzure\Queue\Internal\QueueRestProxy::deleteMessage
    */
    public function testDeleteMessageOptionsNull() {
        $queue = 'abc';
        $messageId = 'abc';
        $popReceipt = 'abc';
        $options = null;

        try {
            $this->wrapper->deleteMessage($queue, $messageId, $popReceipt, $options);
            $this->fail('Expect bogus message id to throw');
        }
        catch (ServiceException $e) {
            $this->assertEquals(400, $e->getCode(), 'getCode');
        }
    }

    /**
    * @covers WindowsAzure\Queue\Internal\QueueRestProxy::listMessages
    */
    public function testListMessagesQueueNullNoOptions() {
        try {
            $this->wrapper->listMessages(null);
            $this->fail('Expect null name to throw');
        }
        catch (ServiceException $e) {
            $this->fail('Should not get a service exception');
        }
        catch (\InvalidArgumentException $e) {
            $this->assertEquals(sprintf(Resources::NULL_OR_EMPTY_MSG, 'queueName'), $e->getMessage(), 'Expect error message');
        }
    }

    /**
    * @covers WindowsAzure\Queue\Internal\QueueRestProxy::listMessages
    */
    public function testListMessagesQueueNullWithOptions() {
        try {
            $this->wrapper->listMessages(null, new ListMessagesOptions());
            $this->fail('Expect null name to throw');
        }
        catch (ServiceException $e) {
            $this->fail('Should not get a service exception');
        }
        catch (\InvalidArgumentException $e) {
            $this->assertEquals(sprintf(Resources::NULL_OR_EMPTY_MSG, 'queueName'), $e->getMessage(), 'Expect error message');
        }
    }

    /**
    * @covers WindowsAzure\Queue\Internal\QueueRestProxy::listMessages
    */
    public function testListMessagesOptionsNull() {
        try {
            $this->wrapper->listMessages('abc', null);
            $this->fail('Expect bogus queue name to throw');
        }
        catch (ServiceException $e) {
            $this->assertEquals(404, $e->getCode(), 'getCode');
        }
    }

    /**
    * @covers WindowsAzure\Queue\Internal\QueueRestProxy::listMessages
    */
    public function testListMessagesAllNull() {
        try {
            $this->wrapper->listMessages(null, null);
            $this->fail('Expect null name to throw');
        }
        catch (ServiceException $e) {
            $this->fail('Should not get a service exception');
        }
        catch (\InvalidArgumentException $e) {
            $this->assertEquals(sprintf(Resources::NULL_OR_EMPTY_MSG, 'queueName'), $e->getMessage(), 'Expect error message');
        }
    }

    /**
    * @covers WindowsAzure\Queue\Internal\QueueRestProxy::peekMessages
    */
    public function testPeekMessagesQueueNullNoOptions() {
        try {
            $this->wrapper->peekMessages(null);
            $this->fail('Expect null name to throw');
        }
        catch (ServiceException $e) {
            $this->fail('Should not get a service exception');
        }
        catch (\InvalidArgumentException $e) {
            $this->assertEquals(sprintf(Resources::NULL_OR_EMPTY_MSG, 'queueName'), $e->getMessage(), 'Expect error message');
        }
    }

    /**
    * @covers WindowsAzure\Queue\Internal\QueueRestProxy::peekMessages
    */
    public function testPeekMessagesQueueEmptyNoOptions() {
        try {
            $this->wrapper->peekMessages('');
            $this->fail('Expect empty name to throw');
        }
        catch (ServiceException $e) {
            $this->fail('Should not get a service exception');
        }
        catch (\InvalidArgumentException $e) {
            $this->assertEquals(sprintf(Resources::NULL_OR_EMPTY_MSG, 'queueName'), $e->getMessage(), 'Expect error message');
        }
    }

    /**
    * @covers WindowsAzure\Queue\Internal\QueueRestProxy::peekMessages
    */
    public function testPeekMessagesQueueNullWithOptions() {
        try {
            $this->wrapper->peekMessages(null, new PeekMessagesOptions());
            $this->fail('Expect null name to throw');
        }
        catch (ServiceException $e) {
            $this->fail('Should not get a service exception');
        }
        catch (\InvalidArgumentException $e) {
            $this->assertEquals(sprintf(Resources::NULL_OR_EMPTY_MSG, 'queueName'), $e->getMessage(), 'Expect error message');
        }
    }

    /**
    * @covers WindowsAzure\Queue\Internal\QueueRestProxy::peekMessages
    */
    public function testPeekMessagesOptionsNull() {
        try {
            $this->wrapper->peekMessages('abc', null);
            $this->fail('Expect bogus queue name to throw');
        }
        catch (ServiceException $e) {
            $this->assertEquals(404, $e->getCode(), 'getCode');
        }
    }

    /**
    * @covers WindowsAzure\Queue\Internal\QueueRestProxy::peekMessages
    */
    public function testPeekMessagesAllNull() {
        try {
            $this->wrapper->peekMessages(null, null);
            $this->fail('Expect null name to throw');
        }
        catch (ServiceException $e) {
            $this->fail('Should not get a service exception');
        }
        catch (\InvalidArgumentException $e) {
            $this->assertEquals(sprintf(Resources::NULL_OR_EMPTY_MSG, 'queueName'), $e->getMessage(), 'Expect error message');
        }
    }

    /**
    * @covers WindowsAzure\Queue\Internal\QueueRestProxy::clearMessages
    */
    public function testClearMessagesQueueNullNoOptions() {
        try {
            $this->wrapper->clearMessages(null);
            $this->fail('Expect null name to throw');
        }
        catch (ServiceException $e) {
            $this->fail('Should not get a service exception');
        }
        catch (\InvalidArgumentException $e) {
            $this->assertEquals(sprintf(Resources::NULL_OR_EMPTY_MSG, 'queueName'), $e->getMessage(), 'Expect error message');
        }
    }

    /**
    * @covers WindowsAzure\Queue\Internal\QueueRestProxy::clearMessages
    */
    public function testClearMessagesQueueNullWithOptions() {
        try {
            $this->wrapper->clearMessages(null, new QueueServiceOptions());
            $this->fail('Expect null name to throw');
        }
        catch (ServiceException $e) {
            $this->fail('Should not get a service exception');
        }
        catch (\InvalidArgumentException $e) {
            $this->assertEquals(sprintf(Resources::NULL_OR_EMPTY_MSG, 'queueName'), $e->getMessage(), 'Expect error message');
        }
    }

    /**
    * @covers WindowsAzure\Queue\Internal\QueueRestProxy::clearMessages
    */
    public function testClearMessagesOptionsNull() {
        try {
            $this->wrapper->clearMessages('abc', null);
            $this->fail('Expect bogus queue name to throw');
        }
        catch (ServiceException $e) {
            $this->assertEquals(404, $e->getCode(), 'getCode');
        }
    }

    /**
    * @covers WindowsAzure\Queue\Internal\QueueRestProxy::clearMessages
    */
    public function testClearMessagesAllNull() {
        try {
            $this->wrapper->clearMessages(null, null);
            $this->fail('Expect null name to throw');
        }
        catch (ServiceException $e) {
            $this->fail('Should not get a service exception');
        }
        catch (\InvalidArgumentException $e) {
            $this->assertEquals(sprintf(Resources::NULL_OR_EMPTY_MSG, 'queueName'), $e->getMessage(), 'Expect error message');
        }
    }
}
