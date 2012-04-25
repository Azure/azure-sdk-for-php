<?php

/**
 * Unit tests for the SDK
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
 * @package    Tests\Unit\WindowsAzure\Services\Queue
 * @author     Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright  2012 Microsoft Corporation
 * @license    http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link       http://pear.php.net/package/azure-sdk-for-php
 */

namespace Tests\Unit\WindowsAzure\Services\Queue;
use WindowsAzure\Core\WindowsAzureUtilities;
use Tests\Framework\QueueServiceRestProxyTestBase;
use WindowsAzure\Services\Core\Configuration;
use WindowsAzure\Services\Core\Models\ServiceProperties;
use WindowsAzure\Services\Queue\QueueRestProxy;
use WindowsAzure\Services\Queue\IQueue;
use WindowsAzure\Services\Queue\QueueService;
use WindowsAzure\Services\Queue\QueueSettings;
use WindowsAzure\Services\Queue\Models\ListQueuesOptions;
use WindowsAzure\Services\Queue\Models\ListQueuesResult;
use WindowsAzure\Services\Queue\Models\CreateQueueOptions;
use WindowsAzure\Services\Queue\Models\GetQueueMetadataResult;
use WindowsAzure\Services\Queue\Models\ListMessagesResult;
use WindowsAzure\Services\Queue\Models\ListMessagesOptions;
use WindowsAzure\Services\Queue\Models\PeekMessagesResult;
use WindowsAzure\Services\Queue\Models\PeekMessagesOptions;
use WindowsAzure\Services\Queue\Models\UpdateMessageResult;
use WindowsAzure\Services\Queue\Models\QueueServiceOptions;
use Tests\Framework\TestResources;
use WindowsAzure\Resources;
use WindowsAzure\Core\ServiceException;

/**
* Unit tests for QueueRestProxy class
*
* @package    Tests\Unit\WindowsAzure\Services\Queue
* @author     Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
* @copyright  2012 Microsoft Corporation
* @license    http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
* @version    Release: @package_version@
* @link       http://pear.php.net/package/azure-sdk-for-php
*/
class QueueRestProxyTest extends QueueServiceRestProxyTestBase
{
    /**
     * @covers WindowsAzure\Services\Queue\QueueRestProxy::listQueues
     * @covers WindowsAzure\Services\Core\ServiceRestProxy::send
     */
    public function testListQueuesSimple()
    {
        // Setup
        $queue1 = 'listqueuesimple1';
        $queue2 = 'listqueuesimple2';
        $queue3 = 'listqueuesimple3';

        parent::createQueue($queue1);
        parent::createQueue($queue2);
        parent::createQueue($queue3);
        
        // Test
        $result = $this->wrapper->listQueues();

        // Assert
        $queues = $result->getQueues();
        $this->assertEquals($queue1, $queues[0]->getName());
        $this->assertEquals($queue2, $queues[1]->getName());
        $this->assertEquals($queue3, $queues[2]->getName());
    }

    /**
    * @covers WindowsAzure\Services\Queue\QueueRestProxy::listQueues
    */
    public function testListQueuesWithOptions()
    {
        // Setup
        $queue1        = 'listqueuewithoptions1';
        $queue2        = 'listqueuewithoptions2';
        $queue3        = 'mlistqueuewithoptions3';
        $metadataName  = 'Mymetadataname';
        $metadataValue = 'MetadataValue';
        $options = new CreateQueueOptions();
        $options->addMetadata($metadataName, $metadataValue);
        parent::createQueue($queue1);
        parent::createQueue($queue2, $options);
        parent::createQueue($queue3);
        $options = new ListQueuesOptions();
        $options->setPrefix('list');
        $options->setIncludeMetadata(true);
        
        // Test
        $result = $this->wrapper->listQueues($options);
        
        // Assert
        $queues   = $result->getQueues();
        $metadata = $queues[1]->getMetadata();
        $this->assertEquals(2, count($queues));
        $this->assertEquals($queue1, $queues[0]->getName());
        $this->assertEquals($queue2, $queues[1]->getName());
        $this->assertEquals($metadataValue, $metadata[$metadataName]);
    }

    /**
    * @covers WindowsAzure\Services\Queue\QueueRestProxy::listQueues
    */
    public function testListQueuesWithNextMarker()
    {
        // Setup
        $queue1 = 'listqueueswithnextmarker1';
        $queue2 = 'listqueueswithnextmarker2';
        $queue3 = 'listqueueswithnextmarker3';
        parent::createQueue($queue1);
        parent::createQueue($queue2);
        parent::createQueue($queue3);
        $options = new ListQueuesOptions();
        $options->setMaxResults(2);
        
        // Test
        $result = $this->wrapper->listQueues($options);
        
        // Assert
        $queues = $result->getQueues();
        $this->assertEquals(2, count($queues));
        $this->assertEquals($queue1, $queues[0]->getName());
        $this->assertEquals($queue2, $queues[1]->getName());
        
        // Test
        $options->setMarker($result->getNextMarker());
        $result = $this->wrapper->listQueues($options);
        $queues = $result->getQueues();

        // Assert
        $this->assertEquals(1, count($queues));
        $this->assertEquals($queue3, $queues[0]->getName());
    }
    
    /**
    * @covers WindowsAzure\Services\Queue\QueueRestProxy::listQueues
    */
    public function testListQueuesWithInvalidNextMarkerFail()
    {
        if (WindowsAzureUtilities::isEmulated()) {
            $this->markTestSkipped(self::NOT_SUPPORTED);
        }
        
        // Setup
        $queue1 = 'listqueueswithinvalidnextmarker1';
        $queue2 = 'listqueueswithinvalidnextmarker2';
        $queue3 = 'listqueueswithinvalidnextmarker3';
        parent::createQueue($queue1);
        parent::createQueue($queue2);
        parent::createQueue($queue3);
        $options = new ListQueuesOptions();
        $options->setMaxResults(2);
        $this->setExpectedException(get_class(new ServiceException('409')));
        
        // Test
        $this->wrapper->listQueues($options);
        $options->setMarker('wrong marker');
        $this->wrapper->listQueues($options);
    }

    /**
    * @covers WindowsAzure\Services\Queue\QueueRestProxy::listQueues
    */
    public function testListQueuesWithNoQueues()
    {
        // Test
        $result = $this->wrapper->listQueues();
        
        // Assert
        $queues = $result->getQueues();
        $this->assertTrue(empty($queues));
    }

    /**
    * @covers WindowsAzure\Services\Queue\QueueRestProxy::listQueues
    */
    public function testListQueuesWithOneResult()
    {
        // Setup
        $queueName = 'listqueueswithoneresult';
        parent::createQueue($queueName);
        
        // Test
        $result = $this->wrapper->listQueues();
        $queues = $result->getQueues();

        // Assert
        $this->assertEquals(1, count($queues));
    }

    /**
    * @covers WindowsAzure\Services\Queue\QueueRestProxy::createQueue
    */
    public function testCreateQueueSimple()
    {
        // Setup
        $queueName = 'createqueuesimple';
        
        // Test
        $this->createQueue($queueName);
        
        // Assert
        $result = $this->wrapper->listQueues();
        $queues = $result->getQueues();
        $this->assertEquals(1, count($queues));
        $this->assertEquals($queues[0]->getName(), $queueName);
    }
    
    /**
    * @covers WindowsAzure\Services\Queue\QueueRestProxy::createQueue
    */
    public function testCreateQueueWithExistingQueue()
    {
        // Setup
        $queueName = 'createqueuewithexistingqueue';
        $this->createQueue($queueName);
        
        // Test
        $this->createQueue($queueName);
        
        // Assert
        $result = $this->wrapper->listQueues();
        $queues = $result->getQueues();
        $this->assertEquals(1, count($queues));
        $this->assertEquals($queues[0]->getName(), $queueName);
    }
    
    /**
    * @covers WindowsAzure\Services\Queue\QueueRestProxy::createQueue
    */
    public function testCreateQueueWithMetadata()
    {
        $queueName     = 'createqueuewithmetadata';
        $metadataName  = 'Name';
        $metadataValue = 'MyName';
        $queueCreateOptions = new CreateQueueOptions();
        $queueCreateOptions->addMetadata($metadataName, $metadataValue);
        
        // Test
        $this->createQueue($queueName, $queueCreateOptions);

        // Assert
        $options = new ListQueuesOptions();
        $options->setIncludeMetadata(true);
        $result   = $this->wrapper->listQueues($options);
        $queues   = $result->getQueues();
        $metadata = $queues[0]->getMetadata();
        $this->assertEquals($metadataValue, $metadata[$metadataName]);
    }
    
    /**
    * @covers WindowsAzure\Services\Queue\QueueRestProxy::createQueue
    */
    public function testCreateQueueInvalidNameFail()
    {
        // Setup
        $queueName = 'CreateQueueInvalidNameFail';
        $this->setExpectedException(get_class(new ServiceException('400')));
        
        // Test
        $this->createQueue($queueName);
    }
    
    /**
    * @covers WindowsAzure\Services\Queue\QueueRestProxy::deleteQueue
    */
    public function testDeleteQueue()
    {
        // Setup
        $queueName = 'deletequeue';
        $this->wrapper->createQueue($queueName);
        
        // Test
        $this->wrapper->deleteQueue($queueName);
        
        // Assert
        $result = $this->wrapper->listQueues();
        $queues = $result->getQueues();
        $this->assertTrue(empty($queues));
    }
    
    /**
    * @covers WindowsAzure\Services\Queue\QueueRestProxy::deleteQueue
    */
    public function testDeleteQueueFail()
    {
        // Setup
        $queueName = 'deletequeuefail';
        $this->setExpectedException(get_class(new ServiceException('404')));
        
        // Test
        $this->wrapper->deleteQueue($queueName);
    }
    
    /**
    * @covers WindowsAzure\Services\Queue\QueueRestProxy::getServiceProperties
    */
    public function testGetServiceProperties()
    {
        if (WindowsAzureUtilities::isEmulated()) {
            $this->markTestSkipped(self::NOT_SUPPORTED);
        }
        
        // Test
        $result = $this->wrapper->getServiceProperties();
        
        // Assert
        $this->assertEquals($this->defaultProperties->toArray(), $result->getValue()->toArray());
    }
    
    /**
    * @covers WindowsAzure\Services\Queue\QueueRestProxy::setServiceProperties
    */
    public function testSetServiceProperties()
    {
        if (WindowsAzureUtilities::isEmulated()) {
            $this->markTestSkipped(self::NOT_SUPPORTED);
        }
        
        // Setup
        $expected = ServiceProperties::create(TestResources::setServicePropertiesSample());
        
        // Test
        $this->setServiceProperties($expected);
        $actual = $this->wrapper->getServiceProperties();
        
        // Assert
        $this->assertEquals($expected->toXml($this->xmlSerializer), $actual->getValue()->toXml($this->xmlSerializer));
    }
    
    /**
    * @covers WindowsAzure\Services\Queue\QueueRestProxy::getQueueMetadata
    */
    public function testGetQueueMetadata()
    {
        // Setup
        $name     = 'getqueuemetadata';
        $expectedCount = 0;
        $options  = new CreateQueueOptions();
        $expected = array ('name1' => 'MyName1', 'mymetaname' => '12345', 'values' => 'Microsoft_');
        $options->setMetadata($expected);
        $this->createQueue($name, $options);
        
        // Test
        $result = $this->wrapper->getQueueMetadata($name);
        
        // Assert
        $this->assertEquals($expectedCount, $result->getApproximateMessageCount());
        $this->assertEquals($expected, $result->getMetadata());
    }
    
    /**
    * @covers WindowsAzure\Services\Queue\QueueRestProxy::setQueueMetadata
    */
    public function testSetQueueMetadata()
    {
        // Setup
        $name = 'setqueuemetadata';
        $expected = array ('name1' => 'MyName1', 'mymetaname' => '12345', 'values' => 'Microsoft_');
        $this->createQueue($name);
        
        // Test
        $this->wrapper->setQueueMetadata($name, $expected);
        $actual = $this->wrapper->getQueueMetadata($name);
        
        // Assert
        $this->assertEquals($expected, $actual->getMetadata());
    }
    
    /**
     * @covers WindowsAzure\Services\Queue\QueueRestProxy::createMessage
     * @covers WindowsAzure\Services\Core\ServiceRestProxy::send
     */
    public function testCreateMessage()
    {
        // Setup
        $name = 'createmessage';
        $expected = 'this is message text';
        $this->createQueue($name);
        
        // Test
        $this->wrapper->createMessage($name, $expected);
        
        // Assert
        $result = $this->wrapper->listMessages($name);
        $messages = $result->getQueueMessages();
        $actual = $messages[0]->getMessageText();
        $this->assertEquals($expected, $actual);
    }
    
    /**
    * @covers WindowsAzure\Services\Queue\QueueRestProxy::listMessages
    */
    public function testListMessagesEmpty()
    {
        // Setup
        $name = 'listmessagesempty';
        $this->createQueue($name);

        // Test
        $result = $this->wrapper->listMessages($name);        
        
        // Assert
        $actual = $result->getQueueMessages();
        $this->assertEmpty($actual);
    }
    
    /**
    * @covers WindowsAzure\Services\Queue\QueueRestProxy::listMessages
    */
    public function testListMessagesOneMessage()
    {
        // Setup
        $name = 'listmessagesonemessage';
        $this->createQueue($name);
        $expected = 'Message text';
        $this->wrapper->createMessage($name, $expected);
        
        // Test
        $result = $this->wrapper->listMessages($name);        
        
        // Assert
        $messages = $result->getQueueMessages();
        $actual = $messages[0];
        $this->assertCount(1, $messages);
        $this->assertEquals($expected, $actual->getMessageText());
    }
    
    /**
    * @covers WindowsAzure\Services\Queue\QueueRestProxy::listMessages
    */
    public function testListMessagesCreateMultiplesReturnOne()
    {
        // Setup
        $name = 'listmessagescreatemultiplesreturnone';
        $this->createQueue($name);
        $expected1 = 'Message #1 Text';
        $message2 = 'Message #2 Text';
        $message3 = 'Message #3 Text';
        $this->wrapper->createMessage($name, $expected1);
        $this->wrapper->createMessage($name, $message2);
        $this->wrapper->createMessage($name, $message3);
        
        // Test
        $result = $this->wrapper->listMessages($name);
        
        // Assert
        $actual = $result->getQueueMessages();
        $this->assertCount(1, $actual);
        $this->assertEquals($expected1, $actual[0]->getMessageText());
    }
    
    /**
    * @covers WindowsAzure\Services\Queue\QueueRestProxy::listMessages
    */
    public function testListMessagesMultiplesMessages()
    {
        // Setup
        $name = 'listmessagesmultiplesmessages';
        $this->createQueue($name);
        $expected1 = 'Message #1 Text';
        $expected2 = 'Message #2 Text';
        $expected3 = 'Message #3 Text';
        $this->wrapper->createMessage($name, $expected1);
        $this->wrapper->createMessage($name, $expected2);
        $this->wrapper->createMessage($name, $expected3);
        $options = new ListMessagesOptions();
        $options->setNumberOfMessages(10);
        
        // Test
        $result = $this->wrapper->listMessages($name, $options);
        
        // Assert
        $actual = $result->getQueueMessages();
        $this->assertCount(3, $actual);
        $this->assertEquals($expected1, $actual[0]->getMessageText());
        $this->assertEquals($expected2, $actual[1]->getMessageText());
        $this->assertEquals($expected3, $actual[2]->getMessageText());
    }
    
    /**
    * @covers WindowsAzure\Services\Queue\QueueRestProxy::peekMessages
    */
    public function testPeekMessagesEmpty()
    {
        // Setup
        $name = 'peekmessagesempty';
        $this->createQueue($name);

        // Test
        $result = $this->wrapper->peekMessages($name);        
        
        // Assert
        $actual = $result->getQueueMessages();
        $this->assertEmpty($actual);
    }
    
    /**
    * @covers WindowsAzure\Services\Queue\QueueRestProxy::peekMessages
    */
    public function testPeekMessagesOneMessage()
    {
        // Setup
        $name = 'peekmessagesonemessage';
        $this->createQueue($name);
        $expected = 'Message text';
        $this->wrapper->createMessage($name, $expected);
        
        // Test
        $result = $this->wrapper->peekMessages($name);        
        
        // Assert
        $messages = $result->getQueueMessages();
        $actual = $messages[0];
        $this->assertCount(1, $messages);
        $this->assertEquals($expected, $actual->getMessageText());
    }
    
    /**
    * @covers WindowsAzure\Services\Queue\QueueRestProxy::peekMessages
    */
    public function testPeekMessagesCreateMultiplesReturnOne()
    {
        // Setup
        $name = 'peekmessagescreatemultiplesreturnone';
        $this->createQueue($name);
        $expected1 = 'Message #1 Text';
        $message2 = 'Message #2 Text';
        $message3 = 'Message #3 Text';
        $this->wrapper->createMessage($name, $expected1);
        $this->wrapper->createMessage($name, $message2);
        $this->wrapper->createMessage($name, $message3);
        
        // Test
        $result = $this->wrapper->peekMessages($name);
        
        // Assert
        $actual = $result->getQueueMessages();
        $this->assertCount(1, $actual);
        $this->assertEquals($expected1, $actual[0]->getMessageText());
    }
    
    /**
    * @covers WindowsAzure\Services\Queue\QueueRestProxy::peekMessages
    */
    public function testPeekMessagesMultiplesMessages()
    {
        // Setup
        $name = 'peekmessagesmultiplesmessages';
        $this->createQueue($name);
        $expected1 = 'Message #1 Text';
        $expected2 = 'Message #2 Text';
        $expected3 = 'Message #3 Text';
        $this->wrapper->createMessage($name, $expected1);
        $this->wrapper->createMessage($name, $expected2);
        $this->wrapper->createMessage($name, $expected3);
        $options = new PeekMessagesOptions();
        $options->setNumberOfMessages(10);
        
        // Test
        $result = $this->wrapper->peekMessages($name, $options);
        
        // Assert
        $actual = $result->getQueueMessages();
        $this->assertCount(3, $actual);
        $this->assertEquals($expected1, $actual[0]->getMessageText());
        $this->assertEquals($expected2, $actual[1]->getMessageText());
        $this->assertEquals($expected3, $actual[2]->getMessageText());
    }
    
    /**
    * @covers WindowsAzure\Services\Queue\QueueRestProxy::deleteMessage
    */
    public function testDeleteMessage()
    {
        // Setup
        $name = 'deletemessage';
        $expected = 'this is message text';
        $this->createQueue($name);
        $this->wrapper->createMessage($name, $expected);
        $result = $this->wrapper->listMessages($name);
        $messages   = $result->getQueueMessages();
        $messageId  = $messages[0]->getMessageId();
        $popReceipt = $messages[0]->getPopReceipt();
        
        // Test
        $this->wrapper->deleteMessage($name, $messageId, $popReceipt);
        
        // Assert
        $result   = $this->wrapper->listMessages($name);
        $messages = $result->getQueueMessages();
        $this->assertTrue(empty($messages));
    }
    
    /**
     * @covers WindowsAzure\Services\Queue\QueueRestProxy::clearMessages
     * @covers WindowsAzure\Services\Core\ServiceRestProxy::send
     */
    public function testClearMessagesWithOptions()
    {
        // Setup
        $name = 'clearmessageswithoptions';
        $msg1 = 'message #1';
        $msg2 = 'message #2';
        $msg3 = 'message #3';
        $options = new QueueServiceOptions();
        $options->setTimeout('10');
        $this->createQueue($name);
        $this->wrapper->createMessage($name, $msg1);
        $this->wrapper->createMessage($name, $msg2);
        $this->wrapper->createMessage($name, $msg3);
        
        // Test
        $this->wrapper->clearMessages($name, $options);
        
        // Assert
        $result   = $this->wrapper->listMessages($name);
        $messages = $result->getQueueMessages();
        $this->assertTrue(empty($messages));
    }
    
    /**
     * @covers WindowsAzure\Services\Queue\QueueRestProxy::clearMessages
     * @covers WindowsAzure\Services\Core\ServiceRestProxy::send
     */
    public function testClearMessages()
    {
        // Setup
        $name = 'clearmessages';
        $msg1 = 'message #1';
        $msg2 = 'message #2';
        $msg3 = 'message #3';
        $this->createQueue($name);
        $this->wrapper->createMessage($name, $msg1);
        $this->wrapper->createMessage($name, $msg2);
        $this->wrapper->createMessage($name, $msg3);
        
        // Test
        $this->wrapper->clearMessages($name);
        
        // Assert
        $result   = $this->wrapper->listMessages($name);
        $messages = $result->getQueueMessages();
        $this->assertTrue(empty($messages));
    }
    
    /**
    * @covers WindowsAzure\Services\Queue\QueueRestProxy::updateMessage
    */
    public function testUpdateMessage()
    {
        // Setup
        $name = 'updatemessage';
        $expectedText = 'this is message text';
        $expectedVisibility = 10;
        $this->createQueue($name);
        $this->wrapper->createMessage($name, 'Text to change');
        $result = $this->wrapper->listMessages($name);
        $messages   = $result->getQueueMessages();
        $popReceipt = $messages[0]->getPopReceipt();
        $messageId = $messages[0]->getMessageId();
        
        // Test
        $result = $this->wrapper->UpdateMessage($name, $messageId, $popReceipt, 
            $expectedText, $expectedVisibility);
        
        // Assert
        $result   = $this->wrapper->listMessages($name);
        $messages = $result->getQueueMessages();
        $this->assertTrue(empty($messages));
        
        sleep($expectedVisibility);
        
        $result   = $this->wrapper->listMessages($name);
        $messages = $result->getQueueMessages();
        $actual   = $messages[0];
        $this->assertEquals($expectedText, $actual->getMessageText());
    }
}

?>
