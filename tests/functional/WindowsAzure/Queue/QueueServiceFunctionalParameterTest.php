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
use WindowsAzure\Common\Internal\Resources;
use WindowsAzure\Queue\Models\ListMessagesOptions;
use WindowsAzure\Queue\Models\PeekMessagesOptions;
use WindowsAzure\Queue\Models\QueueServiceOptions;

class QueueServiceFunctionalParameterTest extends FunctionalTestBase
{
    /**
    * @covers WindowsAzure\Queue\QueueRestProxy::getServiceProperties
    */
    public function testGetServicePropertiesNullOptions()
    {
        try {
            $this->restProxy->getServiceProperties(null);
            $this->assertFalse($this->isEmulated(), 'Should fail if and only if in emulator');
        } catch (ServiceException $e) {
            // Expect failure when run this test with emulator, as v1.6 doesn't support this method
            if ($this->isEmulated()) {
                // Properties are not supported in emulator
                $this->assertEquals(TestResources::STATUS_BAD_REQUEST, $e->getCode(), 'getCode');
            } else {
                throw $e;
            }
        }
    }

    /**
    * @covers WindowsAzure\Queue\QueueRestProxy::setServiceProperties
    */
    public function testSetServicePropertiesNullOptions1()
    {

        $serviceProperties = QueueServiceFunctionalTestData::getDefaultServiceProperties();
        try {
            $this->restProxy->setServiceProperties($serviceProperties);
            $this->assertFalse($this->isEmulated(), 'service properties should throw in emulator');
        } catch (ServiceException $e) {
            if ($this->isEmulated()) {
                // Properties are not supported in emulator
                $this->assertEquals(TestResources::STATUS_BAD_REQUEST, $e->getCode(), 'getCode');
            } else {
                throw $e;
            }
        }
    }

    /**
    * @covers WindowsAzure\Queue\QueueRestProxy::setServiceProperties
    */
    public function testSetServicePropertiesNullOptions2()
    {
        try {
            $this->restProxy->setServiceProperties(null);
            $this->fail('Expect null service properties to throw');
        } catch (\InvalidArgumentException $e) {
            $this->assertEquals(Resources::INVALID_SVC_PROP_MSG, $e->getMessage(), 'Expect error message');
            $this->assertEquals(0, $e->getCode(), 'Expected error code');
        }
    }

    /**
    * @covers WindowsAzure\Queue\QueueRestProxy::setServiceProperties
    */
    public function testSetServicePropertiesNullOptions3()
    {
        try {
            $this->restProxy->setServiceProperties(null, null);
            $this->fail('Expect service properties to throw');
        } catch (\InvalidArgumentException $e) {
            $this->assertEquals(Resources::INVALID_SVC_PROP_MSG, $e->getMessage(), 'Expect error message');
            $this->assertEquals(0, $e->getCode(), 'Expected error code');
        }
    }

    /**
    * @covers WindowsAzure\Queue\QueueRestProxy::setServiceProperties
    */
    public function testSetServicePropertiesNullOptions4()
    {
        $serviceProperties = QueueServiceFunctionalTestData::getDefaultServiceProperties();

        try {
            $this->restProxy->setServiceProperties($serviceProperties, null);
            $this->assertFalse($this->isEmulated(), 'service properties should throw in emulator');
        } catch (ServiceException $e) {
            if ($this->isEmulated()) {
                // Setting is not supported in emulator
                $this->assertEquals(TestResources::STATUS_BAD_REQUEST, $e->getCode(), 'getCode');
            } else {
                throw $e;
            }
        }
    }

    /**
    * @covers WindowsAzure\Queue\QueueRestProxy::listQueues
    */
    public function testListQueuesNullOptions()
    {
        $this->restProxy->listQueues(null);
        $this->assertTrue(true, 'Should just work');
    }

    /**
    * @covers WindowsAzure\Queue\QueueRestProxy::createQueue
    */
    public function testCreateQueueNullName()
    {
        try {
            $this->restProxy->createQueue(null);
            $this->fail('Expect null name to throw');
        } catch (ServiceException $e) {
            $this->fail('Should not get a service exception');
        } catch (\InvalidArgumentException $e) {
            $this->assertEquals(sprintf(Resources::NULL_OR_EMPTY_MSG, 'queueName'), $e->getMessage(), 'Expect error message');
        }
    }

    /**
    * @covers WindowsAzure\Queue\QueueRestProxy::deleteQueue
    */
    public function testDeleteQueueNullName()
    {
        try {
            $this->restProxy->deleteQueue(null);
            $this->fail('Expect null name to throw');
        } catch (ServiceException $e) {
            $this->fail('Should not get a service exception');
        } catch (\InvalidArgumentException $e) {
            $this->assertEquals(sprintf(Resources::NULL_OR_EMPTY_MSG, 'queueName'), $e->getMessage(), 'Expect error message');
        }
    }

    /**
    * @covers WindowsAzure\Queue\QueueRestProxy::getQueueMetadata
    */
    public function testGetQueueMetadataNullName()
    {
        try {
            $this->restProxy->getQueueMetadata(null);
            $this->fail('Expect null name to throw');
        } catch (ServiceException $e) {
            $this->fail('Should not get a service exception');
        } catch (\InvalidArgumentException $e) {
            $this->assertEquals(sprintf(Resources::NULL_OR_EMPTY_MSG, 'queueName'), $e->getMessage(), 'Expect error message');
        }
    }

    /**
    * @covers WindowsAzure\Queue\QueueRestProxy::setQueueMetadata
    */
    public function testSetQueueMetadataNullNameAndOptions()
    {
        try {
            $this->restProxy->setQueueMetadata(null, null);
            $this->fail('Expect null name to throw');
        } catch (ServiceException $e) {
            $this->fail('Should not get a service exception');
        } catch (\InvalidArgumentException $e) {
            $this->assertEquals(sprintf(Resources::NULL_OR_EMPTY_MSG, 'queueName'), $e->getMessage(), 'Expect error message');
        }
    }

    /**
    * @covers WindowsAzure\Queue\QueueRestProxy::setQueueMetadata
    */
    public function testSetQueueMetadataNullName()
    {
        try {
            $this->restProxy->setQueueMetadata(null, array());
            $this->fail('Expect null name to throw');
        } catch (ServiceException $e) {
            $this->fail('Should not get a service exception');
        } catch (\InvalidArgumentException $e) {
            $this->assertEquals(sprintf(Resources::NULL_OR_EMPTY_MSG, 'queueName'), $e->getMessage(), 'Expect error message');
        }
    }

    /**
    * @covers WindowsAzure\Queue\QueueRestProxy::setQueueMetadata
    */
    public function testSetQueueMetadataNullMetadata()
    {
        $queue = QueueServiceFunctionalTestData::$testQueueNames[0];
        $this->restProxy->setQueueMetadata($queue, null);
        $this->assertTrue(true, 'Should just work');
    }

    /**
    * @covers WindowsAzure\Queue\QueueRestProxy::setQueueMetadata
    */
    public function testSetQueueMetadataEmptyMetadata()
    {
        $queue = QueueServiceFunctionalTestData::$testQueueNames[0];
        $this->restProxy->setQueueMetadata($queue, array());
        $this->assertTrue(true, 'Should just work');
    }

    /**
    * @covers WindowsAzure\Queue\QueueRestProxy::setQueueMetadata
    */
    public function testSetQueueMetadataNullOptions()
    {
        $queue = QueueServiceFunctionalTestData::$testQueueNames[0];
        $this->restProxy->setQueueMetadata($queue, array(), null);
        $this->assertTrue(true, 'Should just work');
    }

    /**
    * @covers WindowsAzure\Queue\QueueRestProxy::clearMessages
    * @covers WindowsAzure\Queue\QueueRestProxy::createMessage
    */
    public function testCreateMessageQueueNull()
    {
        $queue = QueueServiceFunctionalTestData::$testQueueNames[0];
        try {
            $this->restProxy->createMessage(null, null);
            $this->fail('Expect null name to throw');
        } catch (ServiceException $e) {
            $this->fail('Should not get a service exception');
        } catch (\InvalidArgumentException $e) {
            $this->assertEquals(sprintf(Resources::NULL_OR_EMPTY_MSG, 'queueName'), $e->getMessage(), 'Expect error message');
        }
        $this->restProxy->clearMessages($queue);
    }

    /**
    * @covers WindowsAzure\Queue\QueueRestProxy::clearMessages
    * @covers WindowsAzure\Queue\QueueRestProxy::createMessage
    */
    public function testCreateMessageNull()
    {
        $queue = QueueServiceFunctionalTestData::$testQueueNames[0];
        $this->restProxy->createMessage($queue, null);
        $this->restProxy->clearMessages($queue);
        $this->assertTrue(true, 'Should just work');
    }

    /**
    * @covers WindowsAzure\Queue\QueueRestProxy::clearMessages
    * @covers WindowsAzure\Queue\QueueRestProxy::createMessage
    */
    public function testCreateMessageBothMessageAndOptionsNull()
    {
        $queue = QueueServiceFunctionalTestData::$testQueueNames[0];
        $this->restProxy->createMessage($queue, null, null);
        $this->restProxy->clearMessages($queue);
        $this->assertTrue(true, 'Should just work');
    }

    /**
    * @covers WindowsAzure\Queue\QueueRestProxy::clearMessages
    * @covers WindowsAzure\Queue\QueueRestProxy::createMessage
    */
    public function testCreateMessageMessageNull()
    {
        $queue = QueueServiceFunctionalTestData::$testQueueNames[0];
        $this->restProxy->createMessage($queue, null, QueueServiceFunctionalTestData::getSimpleCreateMessageOptions());
        $this->restProxy->clearMessages($queue);
        $this->assertTrue(true, 'Should just work');
    }

    /**
    * @covers WindowsAzure\Queue\QueueRestProxy::clearMessages
    * @covers WindowsAzure\Queue\QueueRestProxy::createMessage
    */
    public function testCreateMessageOptionsNull()
    {
        $queue = QueueServiceFunctionalTestData::$testQueueNames[0];
        $this->restProxy->createMessage($queue, QueueServiceFunctionalTestData::getSimpleMessageText(), null);
        $this->restProxy->clearMessages($queue);
        $this->assertTrue(true, 'Should just work');
    }

    /**
    * @covers WindowsAzure\Queue\QueueRestProxy::updateMessage
    */
    public function testUpdateMessageQueueNull()
    {
        $queue = null;
        $messageId = 'abc';
        $popReceipt = 'abc';
        $messageText = 'abc';
        $options = new QueueServiceOptions();
        $visibilityTimeoutInSeconds = 1;

        try {
            $this->restProxy->updateMessage($queue, $messageId, $popReceipt, $messageText, $visibilityTimeoutInSeconds, $options);
            $this->fail('Expect null name to throw');
        } catch (\InvalidArgumentException $e) {
            $this->assertEquals(sprintf(Resources::NULL_OR_EMPTY_MSG, 'queueName'), $e->getMessage(), 'Expect error message');
        }
    }

    /**
    * @covers WindowsAzure\Queue\QueueRestProxy::updateMessage
    */
    public function testUpdateMessageQueueEmpty()
    {
        $queue = '';
        $messageId = 'abc';
        $popReceipt = 'abc';
        $messageText = 'abc';
        $options = new QueueServiceOptions();
        $visibilityTimeoutInSeconds = 1;

        try {
            $this->restProxy->updateMessage($queue, $messageId, $popReceipt, $messageText, $visibilityTimeoutInSeconds, $options);
            $this->fail('Expect null name to throw');
        } catch (\InvalidArgumentException $e) {
            $this->assertEquals(sprintf(Resources::NULL_OR_EMPTY_MSG, 'queueName'), $e->getMessage(), 'Expect error message');
        }
    }

    /**
    * @covers WindowsAzure\Queue\QueueRestProxy::updateMessage
    */
    public function testUpdateMessageMessageIdNull()
    {
        $queue = QueueServiceFunctionalTestData::$testQueueNames[0];
        $messageId = null;
        $popReceipt = 'abc';
        $messageText = 'abc';
        $options = new QueueServiceOptions();
        $visibilityTimeoutInSeconds = 1;

        try {
            $this->restProxy->updateMessage($queue, $messageId, $popReceipt, $messageText, $visibilityTimeoutInSeconds, $options);
            $this->fail('Expect null messageId to throw');
        } catch (\InvalidArgumentException $e) {
            $this->assertEquals(sprintf(Resources::NULL_OR_EMPTY_MSG, 'messageId'), $e->getMessage(), 'Expect error message');
        }
    }

    /**
    * @covers WindowsAzure\Queue\QueueRestProxy::updateMessage
    */
    public function testUpdateMessageMessageIdEmpty()
    {
        $queue = QueueServiceFunctionalTestData::$testQueueNames[0];
        $messageId = '';
        $popReceipt = 'abc';
        $messageText = 'abc';
        $options = new QueueServiceOptions();
        $visibilityTimeoutInSeconds = 1;

        try {
            $this->restProxy->updateMessage($queue, $messageId, $popReceipt, $messageText, $visibilityTimeoutInSeconds, $options);
            $this->fail('Expect null messageId to throw');
        } catch (\InvalidArgumentException $e) {
            $this->assertEquals(sprintf(Resources::NULL_OR_EMPTY_MSG, 'messageId'), $e->getMessage(), 'Expect error message');
        }
    }

    /**
    * @covers WindowsAzure\Queue\QueueRestProxy::updateMessage
    */
    public function testUpdateMessagePopReceiptNull()
    {
        $queue = QueueServiceFunctionalTestData::$testQueueNames[0];
        $messageId = 'abc';
        $popReceipt = null;
        $messageText = 'abc';
        $options = new QueueServiceOptions();
        $visibilityTimeoutInSeconds = 1;

        try {
            $this->restProxy->updateMessage($queue, $messageId, $popReceipt, $messageText, $visibilityTimeoutInSeconds, $options);
            $this->fail('Expect null popReceipt to throw');
        } catch (\InvalidArgumentException $e) {
            $this->assertEquals(sprintf(Resources::NULL_OR_EMPTY_MSG, 'popReceipt'), $e->getMessage(), 'Expect error message');
        }
    }

    /**
    * @covers WindowsAzure\Queue\QueueRestProxy::updateMessage
    */
    public function testUpdateMessagePopReceiptEmpty()
    {
        $queue = QueueServiceFunctionalTestData::$testQueueNames[0];
        $messageId = 'abc';
        $popReceipt = '';
        $messageText = 'abc';
        $options = new QueueServiceOptions();
        $visibilityTimeoutInSeconds = 1;

        try {
            $this->restProxy->updateMessage($queue, $messageId, $popReceipt, $messageText, $visibilityTimeoutInSeconds, $options);
            $this->fail('Expect null popReceipt to throw');
        } catch (\InvalidArgumentException $e) {
            $this->assertEquals(sprintf(Resources::NULL_OR_EMPTY_MSG, 'popReceipt'), $e->getMessage(), 'Expect error message');
        }
    }

    /**
    * @covers WindowsAzure\Queue\QueueRestProxy::updateMessage
    */
    public function testUpdateMessageMessageTextNull()
    {
        $queue = QueueServiceFunctionalTestData::$testQueueNames[0];
        $messageId = 'abc';
        $popReceipt = 'abc';
        $messageText = null;
        $options = new QueueServiceOptions();
        $visibilityTimeoutInSeconds = 1;

        try {
            $this->restProxy->updateMessage($queue, $messageId, $popReceipt, $messageText, $visibilityTimeoutInSeconds, $options);
            $this->fail('Expect bogus message id to throw');
        } catch (ServiceException $e) {
            $this->assertEquals(TestResources::STATUS_BAD_REQUEST, $e->getCode(), 'getCode');
        }
    }

    /**
    * @covers WindowsAzure\Queue\QueueRestProxy::updateMessage
    */
    public function testUpdateMessageMessageTextEmpty()
    {
        $queue = QueueServiceFunctionalTestData::$testQueueNames[0];
        $messageId = 'abc';
        $popReceipt = 'abc';
        $messageText = '';
        $options = new QueueServiceOptions();
        $visibilityTimeoutInSeconds = 1;

        try {
            $this->restProxy->updateMessage($queue, $messageId, $popReceipt, $messageText, $visibilityTimeoutInSeconds, $options);
            $this->fail('Expect bogus message id to throw');
        } catch (ServiceException $e) {
            $this->assertEquals(TestResources::STATUS_BAD_REQUEST, $e->getCode(), 'getCode');
        }
    }

    /**
    * @covers WindowsAzure\Queue\QueueRestProxy::updateMessage
    */
    public function testUpdateMessageOptionsNull()
    {
        $queue = QueueServiceFunctionalTestData::$testQueueNames[0];
        $messageId = 'abc';
        $popReceipt = 'abc';
        $messageText = 'abc';
        $options = null;
        $visibilityTimeoutInSeconds = 1;

        try {
            $this->restProxy->updateMessage($queue, $messageId, $popReceipt, $messageText, $visibilityTimeoutInSeconds, $options);
            $this->fail('Expect bogus message id to throw');
        } catch (ServiceException $e) {
            $this->assertEquals(TestResources::STATUS_BAD_REQUEST, $e->getCode(), 'getCode');
        }
    }

    /**
    * @covers WindowsAzure\Queue\QueueRestProxy::updateMessage
    */
    public function testUpdateMessageVisibilityTimeout0()
    {
        $queue = QueueServiceFunctionalTestData::$testQueueNames[0];
        $messageId = 'abc';
        $popReceipt = 'abc';
        $messageText = 'abc';
        $options = new QueueServiceOptions();
        $visibilityTimeoutInSeconds = 0;

        try {
            $this->restProxy->updateMessage($queue, $messageId, $popReceipt, $messageText, $visibilityTimeoutInSeconds, $options);
            $this->fail('Expect bogus message id to throw');
        } catch (\InvalidArgumentException $e) {
            $this->fail('Should not get an InvalidArgumentException exception');
        } catch (ServiceException $e) {
            $this->assertEquals(TestResources::STATUS_BAD_REQUEST, $e->getCode(), 'getCode');
        }
    }

    /**
    * @covers WindowsAzure\Queue\QueueRestProxy::updateMessage
    */
    public function testUpdateMessageVisibilityTimeoutNull()
    {
        $queue = QueueServiceFunctionalTestData::$testQueueNames[0];
        $messageId = 'abc';
        $popReceipt = 'abc';
        $messageText = 'abc';
        $options = new QueueServiceOptions();
        $visibilityTimeoutInSeconds = null;

        try {
            $this->restProxy->updateMessage($queue, $messageId, $popReceipt, $messageText, $visibilityTimeoutInSeconds, $options);
            $this->fail('Expect null visibilityTimeoutInSeconds to throw');
        } catch (\InvalidArgumentException $e) {
            $this->assertEquals(sprintf(Resources::NULL_MSG, 'visibilityTimeoutInSeconds'), $e->getMessage(), 'Expect error message');
        }
    }

    /**
    * @covers WindowsAzure\Queue\QueueRestProxy::deleteMessage
    */
    public function testDeleteMessageQueueNullNoOptions()
    {
        $queue = null;
        $messageId = 'abc';
        $popReceipt = 'abc';

        try {
            $this->restProxy->deleteMessage($queue, $messageId, $popReceipt);
            $this->fail('Expect null queue to throw');
        } catch (\InvalidArgumentException $e) {
            $this->assertEquals(sprintf(Resources::NULL_OR_EMPTY_MSG, 'queueName'), $e->getMessage(), 'Expect error message');
        }
    }

    /**
    * @covers WindowsAzure\Queue\QueueRestProxy::deleteMessage
    */
    public function testDeleteMessageQueueEmptyNoOptions()
    {
        $queue = '';
        $messageId = 'abc';
        $popReceipt = 'abc';

        try {
            $this->restProxy->deleteMessage($queue, $messageId, $popReceipt);
            $this->fail('Expect empty queue to throw');
        } catch (\InvalidArgumentException $e) {
            $this->assertEquals(sprintf(Resources::NULL_OR_EMPTY_MSG, 'queueName'), $e->getMessage(), 'Expect error message');
        }
    }

    /**
    * @covers WindowsAzure\Queue\QueueRestProxy::deleteMessage
    */
    public function testDeleteMessageQueueNullWithOptions()
    {
        $queue = null;
        $messageId = 'abc';
        $popReceipt = 'abc';
        $options = new QueueServiceOptions();

        try {
            $this->restProxy->deleteMessage($queue, $messageId, $popReceipt, $options);
            $this->fail('Expect null queue to throw');
        } catch (\InvalidArgumentException $e) {
            $this->assertEquals(sprintf(Resources::NULL_OR_EMPTY_MSG, 'queueName'), $e->getMessage(), 'Expect error message');
        }
    }

    /**
    * @covers WindowsAzure\Queue\QueueRestProxy::deleteMessage
    */
    public function testDeleteMessageMessageIdNull()
    {
        $queue = 'abc';
        $messageId = null;
        $popReceipt = 'abc';
        $options = new QueueServiceOptions();

        try {
            $this->restProxy->deleteMessage($queue, $messageId, $popReceipt, $options);
            $this->fail('Expect null messageId to throw');
        } catch (\InvalidArgumentException $e) {
            $this->assertEquals(sprintf(Resources::NULL_OR_EMPTY_MSG, 'messageId'), $e->getMessage(), 'Expect error message');
        }
    }

    /**
    * @covers WindowsAzure\Queue\QueueRestProxy::deleteMessage
    */
    public function testDeleteMessageMessageIdEmpty()
    {
        $queue = 'abc';
        $messageId = '';
        $popReceipt = 'abc';
        $options = new QueueServiceOptions();

        try {
            $this->restProxy->deleteMessage($queue, $messageId, $popReceipt, $options);
            $this->fail('Expect empty messageId to throw');
        } catch (\InvalidArgumentException $e) {
            $this->assertEquals(sprintf(Resources::NULL_OR_EMPTY_MSG, 'messageId'), $e->getMessage(), 'Expect error message');
        }
    }

    /**
    * @covers WindowsAzure\Queue\QueueRestProxy::deleteMessage
    */
    public function testDeleteMessagePopReceiptNull()
    {
        $queue = 'abc';
        $messageId = 'abc';
        $popReceipt = null;
        $options = new QueueServiceOptions();

        try {
            $this->restProxy->deleteMessage($queue, $messageId, $popReceipt, $options);
            $this->fail('Expect null popReceipt to throw');
        } catch (\InvalidArgumentException $e) {
            $this->assertEquals(sprintf(Resources::NULL_OR_EMPTY_MSG, 'popReceipt'), $e->getMessage(), 'Expect error message');
        }
    }

    /**
    * @covers WindowsAzure\Queue\QueueRestProxy::deleteMessage
    */
    public function testDeleteMessagePopReceiptEmpty()
    {
        $queue = 'abc';
        $messageId = 'abc';
        $popReceipt = '';
        $options = new QueueServiceOptions();

        try {
            $this->restProxy->deleteMessage($queue, $messageId, $popReceipt, $options);
            $this->fail('Expect empty popReceipt to throw');
        } catch (\InvalidArgumentException $e) {
            $this->assertEquals(sprintf(Resources::NULL_OR_EMPTY_MSG, 'popReceipt'), $e->getMessage(), 'Expect error message');
        }
    }

    /**
    * @covers WindowsAzure\Queue\QueueRestProxy::deleteMessage
    */
    public function testDeleteMessageOptionsNull()
    {
        $queue = 'abc';
        $messageId = 'abc';
        $popReceipt = 'abc';
        $options = null;

        try {
            $this->restProxy->deleteMessage($queue, $messageId, $popReceipt, $options);
            $this->fail('Expect bogus message id to throw');
        } catch (ServiceException $e) {
            $this->assertEquals(TestResources::STATUS_BAD_REQUEST, $e->getCode(), 'getCode');
        }
    }

    /**
    * @covers WindowsAzure\Queue\QueueRestProxy::listMessages
    */
    public function testListMessagesQueueNullNoOptions()
    {
        try {
            $this->restProxy->listMessages(null);
            $this->fail('Expect null name to throw');
        } catch (ServiceException $e) {
            $this->fail('Should not get a service exception');
        } catch (\InvalidArgumentException $e) {
            $this->assertEquals(sprintf(Resources::NULL_OR_EMPTY_MSG, 'queueName'), $e->getMessage(), 'Expect error message');
        }
    }

    /**
    * @covers WindowsAzure\Queue\QueueRestProxy::listMessages
    */
    public function testListMessagesQueueNullWithOptions()
    {
        try {
            $this->restProxy->listMessages(null, new ListMessagesOptions());
            $this->fail('Expect null name to throw');
        } catch (ServiceException $e) {
            $this->fail('Should not get a service exception');
        } catch (\InvalidArgumentException $e) {
            $this->assertEquals(sprintf(Resources::NULL_OR_EMPTY_MSG, 'queueName'), $e->getMessage(), 'Expect error message');
        }
    }

    /**
    * @covers WindowsAzure\Queue\QueueRestProxy::listMessages
    */
    public function testListMessagesOptionsNull()
    {
        try {
            $this->restProxy->listMessages('abc', null);
            $this->fail('Expect bogus queue name to throw');
        } catch (ServiceException $e) {
            $this->assertEquals(TestResources::STATUS_NOT_FOUND, $e->getCode(), 'getCode');
        }
    }

    /**
    * @covers WindowsAzure\Queue\QueueRestProxy::listMessages
    */
    public function testListMessagesAllNull()
    {
        try {
            $this->restProxy->listMessages(null, null);
            $this->fail('Expect null name to throw');
        } catch (ServiceException $e) {
            $this->fail('Should not get a service exception');
        } catch (\InvalidArgumentException $e) {
            $this->assertEquals(sprintf(Resources::NULL_OR_EMPTY_MSG, 'queueName'), $e->getMessage(), 'Expect error message');
        }
    }

    /**
    * @covers WindowsAzure\Queue\QueueRestProxy::peekMessages
    */
    public function testPeekMessagesQueueNullNoOptions()
    {
        try {
            $this->restProxy->peekMessages(null);
            $this->fail('Expect null name to throw');
        } catch (ServiceException $e) {
            $this->fail('Should not get a service exception');
        } catch (\InvalidArgumentException $e) {
            $this->assertEquals(sprintf(Resources::NULL_OR_EMPTY_MSG, 'queueName'), $e->getMessage(), 'Expect error message');
        }
    }

    /**
    * @covers WindowsAzure\Queue\QueueRestProxy::peekMessages
    */
    public function testPeekMessagesQueueEmptyNoOptions()
    {
        try {
            $this->restProxy->peekMessages('');
            $this->fail('Expect empty name to throw');
        } catch (ServiceException $e) {
            $this->fail('Should not get a service exception');
        } catch (\InvalidArgumentException $e) {
            $this->assertEquals(sprintf(Resources::NULL_OR_EMPTY_MSG, 'queueName'), $e->getMessage(), 'Expect error message');
        }
    }

    /**
    * @covers WindowsAzure\Queue\QueueRestProxy::peekMessages
    */
    public function testPeekMessagesQueueNullWithOptions()
    {
        try {
            $this->restProxy->peekMessages(null, new PeekMessagesOptions());
            $this->fail('Expect null name to throw');
        } catch (ServiceException $e) {
            $this->fail('Should not get a service exception');
        } catch (\InvalidArgumentException $e) {
            $this->assertEquals(sprintf(Resources::NULL_OR_EMPTY_MSG, 'queueName'), $e->getMessage(), 'Expect error message');
        }
    }

    /**
    * @covers WindowsAzure\Queue\QueueRestProxy::peekMessages
    */
    public function testPeekMessagesOptionsNull()
    {
        try {
            $this->restProxy->peekMessages('abc', null);
            $this->fail('Expect bogus queue name to throw');
        } catch (ServiceException $e) {
            $this->assertEquals(TestResources::STATUS_NOT_FOUND, $e->getCode(), 'getCode');
        }
    }

    /**
    * @covers WindowsAzure\Queue\QueueRestProxy::peekMessages
    */
    public function testPeekMessagesAllNull()
    {
        try {
            $this->restProxy->peekMessages(null, null);
            $this->fail('Expect null name to throw');
        } catch (ServiceException $e) {
            $this->fail('Should not get a service exception');
        } catch (\InvalidArgumentException $e) {
            $this->assertEquals(sprintf(Resources::NULL_OR_EMPTY_MSG, 'queueName'), $e->getMessage(), 'Expect error message');
        }
    }

    /**
    * @covers WindowsAzure\Queue\QueueRestProxy::clearMessages
    */
    public function testClearMessagesQueueNullNoOptions()
    {
        try {
            $this->restProxy->clearMessages(null);
            $this->fail('Expect null name to throw');
        } catch (ServiceException $e) {
            $this->fail('Should not get a service exception');
        } catch (\InvalidArgumentException $e) {
            $this->assertEquals(sprintf(Resources::NULL_OR_EMPTY_MSG, 'queueName'), $e->getMessage(), 'Expect error message');
        }
    }

    /**
    * @covers WindowsAzure\Queue\QueueRestProxy::clearMessages
    */
    public function testClearMessagesQueueNullWithOptions()
    {
        try {
            $this->restProxy->clearMessages(null, new QueueServiceOptions());
            $this->fail('Expect null name to throw');
        } catch (ServiceException $e) {
            $this->fail('Should not get a service exception');
        } catch (\InvalidArgumentException $e) {
            $this->assertEquals(sprintf(Resources::NULL_OR_EMPTY_MSG, 'queueName'), $e->getMessage(), 'Expect error message');
        }
    }

    /**
    * @covers WindowsAzure\Queue\QueueRestProxy::clearMessages
    */
    public function testClearMessagesOptionsNull()
    {
        try {
            $this->restProxy->clearMessages('abc', null);
            $this->fail('Expect bogus queue name to throw');
        } catch (ServiceException $e) {
            $this->assertEquals(TestResources::STATUS_NOT_FOUND, $e->getCode(), 'getCode');
        }
    }

    /**
    * @covers WindowsAzure\Queue\QueueRestProxy::clearMessages
    */
    public function testClearMessagesAllNull()
    {
        try {
            $this->restProxy->clearMessages(null, null);
            $this->fail('Expect null name to throw');
        } catch (ServiceException $e) {
            $this->fail('Should not get a service exception');
        } catch (\InvalidArgumentException $e) {
            $this->assertEquals(sprintf(Resources::NULL_OR_EMPTY_MSG, 'queueName'), $e->getMessage(), 'Expect error message');
        }
    }
}
