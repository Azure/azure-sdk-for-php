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
 * @package    Tests\Functional\WindowsAzure\ServiceBus
 * @author     Jason Cooke <jcooke@microsoft.com>
 * @copyright  2012 Microsoft Corporation
 * @license    http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link       http://pear.php.net/package/azure-sdk-for-php
 */

namespace Tests\Functional\WindowsAzure\ServiceBus;

use WindowsAzure\ServiceBus\ServiceBusService;

use Tests\Functional\WindowsAzure\ServiceBus\IntegrationTestBase;
use WindowsAzure\core\Builder;
use WindowsAzure\core\Builder\Alteration;
use WindowsAzure\core\Builder\Registry;
use WindowsAzure\core\Configuration;
use WindowsAzure\core\ServiceException;
use WindowsAzure\core\ServiceFilter;
use WindowsAzure\core\ServiceFilter\Request;
use WindowsAzure\core\ServiceFilter\Response;
use WindowsAzure\ServiceBus\implementation\CorrelationFilter;
use WindowsAzure\ServiceBus\implementation\EmptyRuleAction;
use WindowsAzure\ServiceBus\implementation\FalseFilter;
use WindowsAzure\ServiceBus\implementation\SqlFilter;
use WindowsAzure\ServiceBus\implementation\SqlRuleAction;
use WindowsAzure\ServiceBus\implementation\TrueFilter;
use WindowsAzure\ServiceBus\models\BrokeredMessage;
use WindowsAzure\ServiceBus\models\ListQueuesResult;
use WindowsAzure\ServiceBus\models\ListRulesResult;
use WindowsAzure\ServiceBus\models\ListSubscriptionsResult;
use WindowsAzure\ServiceBus\models\ListTopicsResult;
use WindowsAzure\ServiceBus\Models\QueueInfo;
use WindowsAzure\ServiceBus\Models\QueueDescription;
use WindowsAzure\ServiceBus\models\ReceiveMessageOptions;
use WindowsAzure\ServiceBus\models\RuleInfo;
use WindowsAzure\ServiceBus\models\SubscriptionInfo;
use WindowsAzure\ServiceBus\Models\TopicInfo;

class ServiceBusIntegrationTest extends IntegrationTestBase
{
    private $RECEIVE_AND_DELETE_5_SECONDS;
    private $PEEK_LOCK_5_SECONDS;

    public function setUp()
    {
        parent::setUp();
        $this->RECEIVE_AND_DELETE_5_SECONDS = new ReceiveMessageOptions();
        $this->RECEIVE_AND_DELETE_5_SECONDS->setReceiveAndDelete();
        $this->RECEIVE_AND_DELETE_5_SECONDS->setTimeout(5);
        
        $this->PEEK_LOCK_5_SECONDS = new ReceiveMessageOptions();
        $this->PEEK_LOCK_5_SECONDS->setPeekLock();
        $this->PEEK_LOCK_5_SECONDS->setTimeout(5);
    }
    
//    public function testCreateService() {
//        // reinitialize configuration from known state
//        $config = createConfiguration();
//
//        // applied as default configuration
//        Configuration->setInstance($config);
//        $service = ServiceBusService->create();
//    }

    /**
    * @covers WindowsAzure\ServiceBus\ServiceBusRestProxy::getQueue
    * @covers WindowsAzure\ServiceBus\ServiceBusRestProxy::listQueues
    */
    public function testFetchQueueAndListQueuesWorks() {
        // Arrange

        // Act
        $entry = $this->restProxy->getQueue('TestAlpha')->getValue();
        $feed = $this->restProxy->listQueues();

        // Assert
        $this->assertNotNull($entry, '$entry');
        $this->assertNotNull($feed, '$feed');
    }

    /**
    * @covers WindowsAzure\ServiceBus\ServiceBusRestProxy::createQueue
    */
    public function testCreateQueueWorks()
    {
        // Arrange

        // Act
        $queue = null;
        $queue = new QueueInfo('TestCreateQueueWorks');

        $queueDescription = new QueueDescription();
        $queueDescription->setMaxSizeInMegabytes(1024);

        $queue->setQueueDescription($queueDescription);
        $saved = $this->restProxy->createQueue($queue);

        // TODO: Uncomment
//        $saved = $saved->getValue();

        // Assert
        $this->assertNotNull($saved, '$saved');
        $this->assertNotSame($queue, $saved, 'queue and saved');

        // TODO: Uncomment
//        $this->assertEquals('TestCreateQueueWorks', $saved->getPath(), '$saved->getPath()');
    }

    /**
    * @covers WindowsAzure\ServiceBus\ServiceBusRestProxy::createQueue
    * @covers WindowsAzure\ServiceBus\ServiceBusRestProxy::deleteQueue
    */
    public function testDeleteQueueWorks()
    {
        // Arrange
        try {
            $this->restProxy->createQueue(new QueueInfo('TestDeleteQueueWorks'));
        } catch (ServiceException $e) {
            // Ignore
        }

        // Act
        $this->restProxy->deleteQueue('TestDeleteQueueWorks');

        // Assert
    }

    /**
    * @covers WindowsAzure\ServiceBus\ServiceBusRestProxy::sendQueueMessage
    */
    public function testSendMessageWorks()
    {
        // Arrange
        // TODO: Revert
        // https://github.com/WindowsAzure/azure-sdk-for-php/issues/394
        // $message = new BrokeredMessage('sendMessageWorks');
        $message = new BrokeredMessage();
        $message->setBody('sendMessageWorks');

        // Act
        $this->restProxy->sendQueueMessage('TestAlpha', $message);

        // Assert
        $this->assertTrue(true, 'no error');
    }

    /**
    * @covers WindowsAzure\ServiceBus\ServiceBusRestProxy::createQueue
    * @covers WindowsAzure\ServiceBus\ServiceBusRestProxy::receiveQueueMessage
    * @covers WindowsAzure\ServiceBus\ServiceBusRestProxy::sendQueueMessage
    */
    public function testReceiveMessageWorks()
    {
        // Arrange
        $queueName = 'TestReceiveMessageWorks';
        $this->restProxy->createQueue(new QueueInfo($queueName));
        // TODO: Revert
        // https://github.com/WindowsAzure/azure-sdk-for-php/issues/394
//        $this->restProxy->sendQueueMessage($queueName, new BrokeredMessage('Hello World'));
        $message = new BrokeredMessage();
        $message->setBody('Hello World');
        $this->restProxy->sendQueueMessage($queueName, $message);

        // Act
        $message = $this->restProxy->receiveQueueMessage($queueName, $this->RECEIVE_AND_DELETE_5_SECONDS);
        $data = $message->getBody();
        $size = strlen($data);

        // Assert
        $this->assertEquals(11, $size, '$size');
        $this->assertEquals($data, 'Hello World');
    }

    /**
    * @covers WindowsAzure\ServiceBus\ServiceBusRestProxy::createQueue
    * @covers WindowsAzure\ServiceBus\ServiceBusRestProxy::receiveQueueMessage
    * @covers WindowsAzure\ServiceBus\ServiceBusRestProxy::sendQueueMessage
    */
    public function testPeekLockMessageWorks()
    {
        // Arrange
        $queueName = 'TestPeekLockMessageWorks';
        $this->restProxy->createQueue(new QueueInfo($queueName));
        // TODO: Revert
        // https://github.com/WindowsAzure/azure-sdk-for-php/issues/394
//        $this->restProxy->sendQueueMessage($queueName, new BrokeredMessage('Hello Again'));
        $message = new BrokeredMessage();
        $message->setBody('Hello Again');
        $this->restProxy->sendQueueMessage($queueName, $message);

        // Act
        $message = $this->restProxy->receiveQueueMessage($queueName, $this->PEEK_LOCK_5_SECONDS);

        // Assert
        $data = $message->getBody();
        $size = strlen($data);
        $this->assertEquals(11, $size, '$size');
        $this->assertEquals('Hello Again', $data, 'new String($data, 0, $size)');
    }

    /**
    * @covers WindowsAzure\ServiceBus\ServiceBusRestProxy::createQueue
    * @covers WindowsAzure\ServiceBus\ServiceBusRestProxy::deleteMessage
    * @covers WindowsAzure\ServiceBus\ServiceBusRestProxy::receiveQueueMessage
    * @covers WindowsAzure\ServiceBus\ServiceBusRestProxy::sendQueueMessage
    */
    public function testPeekLockedMessageCanBeCompleted()
    {
        // Arrange
        $queueName = 'TestPeekLockedMessageCanBeCompleted';
        $this->restProxy->createQueue(new QueueInfo($queueName));
        // TODO: Revert
        // https://github.com/WindowsAzure/azure-sdk-for-php/issues/394
//        $this->restProxy->sendQueueMessage($queueName, new BrokeredMessage('Hello Again'));
        $message = new BrokeredMessage();
        $message->setBody('Hello Again');
        $this->restProxy->sendQueueMessage($queueName, $message);
        $message = $this->restProxy->receiveQueueMessage($queueName, $this->PEEK_LOCK_5_SECONDS);

        // Act
        $lockToken = $message->getLockToken();
        $lockedUntil = $message->getLockedUntilUtc();
        $lockLocation = $message->getLockLocation();

        $this->restProxy->deleteMessage($message);

        // Assert
        $this->assertNotNull($lockToken, '$lockToken');
        $this->assertNotNull($lockedUntil, '$lockedUntil');
        $this->assertNotNull($lockLocation, '$lockLocation');
    }

    /**
    * @covers WindowsAzure\ServiceBus\ServiceBusRestProxy::createQueue
    * @covers WindowsAzure\ServiceBus\ServiceBusRestProxy::receiveQueueMessage
    * @covers WindowsAzure\ServiceBus\ServiceBusRestProxy::sendQueueMessage
    * @covers WindowsAzure\ServiceBus\ServiceBusRestProxy::unlockMessage
    */
    public function testPeekLockedMessageCanBeUnlocked()
    {
        // Arrange
        $queueName = 'TestPeekLockedMessageCanBeUnlocked';
        $this->restProxy->createQueue(new QueueInfo($queueName));
        // TODO: Revert
        // https://github.com/WindowsAzure/azure-sdk-for-php/issues/394
//        $this->restProxy->sendQueueMessage($queueName, new BrokeredMessage('Hello Again'));
        $message = new BrokeredMessage();
        $message->setBody('Hello Again');
        $this->restProxy->sendQueueMessage($queueName, $message);
        $peekedMessage = $this->restProxy->receiveQueueMessage($queueName, $this->PEEK_LOCK_5_SECONDS);

        // Act
        $lockToken = $peekedMessage->getLockToken();
        $lockedUntil = $peekedMessage->getLockedUntilUtc();

        $this->restProxy->unlockMessage($peekedMessage);
        $receivedMessage = $this->restProxy->receiveQueueMessage($queueName, $this->RECEIVE_AND_DELETE_5_SECONDS);

        // Assert
        $this->assertNotNull($lockToken, '$lockToken');
        $this->assertNotNull($lockedUntil, '$lockedUntil');
        $this->assertNull($receivedMessage->getLockToken(), '$receivedMessage->getLockToken()');
        $this->assertNull($receivedMessage->getLockedUntilUtc(), '$receivedMessage->getLockedUntilUtc()');
    }

    /**
    * @covers WindowsAzure\ServiceBus\ServiceBusRestProxy::createQueue
    * @covers WindowsAzure\ServiceBus\ServiceBusRestProxy::deleteMessage
    * @covers WindowsAzure\ServiceBus\ServiceBusRestProxy::receiveQueueMessage
    * @covers WindowsAzure\ServiceBus\ServiceBusRestProxy::sendQueueMessage
    */
    public function testPeekLockedMessageCanBeDeleted()
    {
        // Arrange
        $queueName = 'TestPeekLockedMessageCanBeDeleted';
        $this->restProxy->createQueue(new QueueInfo($queueName));
        // TODO: Revert
        // https://github.com/WindowsAzure/azure-sdk-for-php/issues/394
//        $this->restProxy->sendQueueMessage($queueName, new BrokeredMessage('Hello Again'));
        $message = new BrokeredMessage();
        $message->setBody('Hello Again');
        $this->restProxy->sendQueueMessage($queueName, $message);
        $peekedMessage = $this->restProxy->receiveQueueMessage($queueName, $this->PEEK_LOCK_5_SECONDS);

        // Act
        $lockToken = $peekedMessage->getLockToken();
        $lockedUntil = $peekedMessage->getLockedUntilUtc();

        $this->restProxy->deleteMessage($peekedMessage);
        $receivedMessage = $this->restProxy->receiveQueueMessage($queueName, $this->RECEIVE_AND_DELETE_5_SECONDS);

        // Assert
        $this->assertNotNull($lockToken, '$lockToken');
        $this->assertNotNull($lockedUntil, '$lockedUntil');
        $this->assertNull($receivedMessage->getLockToken(), '$receivedMessage->getLockToken()');
        $this->assertNull($receivedMessage->getLockedUntilUtc(), '$receivedMessage->getLockedUntilUtc()');
    }

    /**
    * @covers WindowsAzure\ServiceBus\ServiceBusRestProxy::createQueue
    * @covers WindowsAzure\ServiceBus\ServiceBusRestProxy::receiveQueueMessage
    * @covers WindowsAzure\ServiceBus\ServiceBusRestProxy::sendQueueMessage
    */
    public function testContentTypePassesThrough()
    {
        // Arrange
        $queueName = 'TestContentTypePassesThrough';
        $this->restProxy->createQueue(new QueueInfo($queueName));

        // Act
        // TODO: Revert
        // https://github.com/WindowsAzure/azure-sdk-for-php/issues/394
//        $message = new BrokeredMessage('<data>Hello Again</data>');
        $message = new BrokeredMessage();
        $message->setBody('<data>Hello Again</data>');
        $message->setContentType('text/xml');
        $this->restProxy->sendQueueMessage($queueName, $message);

        $message = $this->restProxy->receiveQueueMessage($queueName, $this->RECEIVE_AND_DELETE_5_SECONDS);

        // Assert
        $this->assertNotNull($message, '$message');
        $this->assertEquals('text/xml', $message->getContentType(), '$message->getContentType()');
    }

    /**
    * @covers WindowsAzure\ServiceBus\ServiceBusRestProxy::createTopic
    * @covers WindowsAzure\ServiceBus\ServiceBusRestProxy::deleteTopic
    * @covers WindowsAzure\ServiceBus\ServiceBusRestProxy::getTopic
    * @covers WindowsAzure\ServiceBus\ServiceBusRestProxy::listTopics
    */
    public function testTopicCanBeCreatedListedFetchedAndDeleted()
    {
        // Arrange
        $topicName = 'TestTopicCanBeCreatedListedFetchedAndDeleted';

        // Act
        $topic = new TopicInfo($topicName);
        $created = $this->restProxy->createTopic($topic);
        
        // TODO
        $listed = $this->restProxy->listTopics(null);
        $fetched = $this->restProxy->getTopic($topicName);
        $this->restProxy->deleteTopic($topicName);
        // TODO
        $listed2 = $this->restProxy->listTopics(null);
        
        // Assert
        $this->assertNotNull($created, '$created');
        $this->assertNotNull($listed, '$listed');
        $this->assertNotNull($fetched, '$fetched');
        $this->assertNotNull($listed2, '$listed2');

        $this->assertEquals(count($listed->getTopicDescription()) - 1, count($listed2->getTopicDescription()), '$listed2->getItems()->size()');
    }

    // TODO: Figure out what to do with this filter.
//    public function testFilterCanSeeAndChangeRequestOrResponse() {
//        // Arrange
//        $requests = array();
//        $responses = array();
//
//        $filtered = $this->restProxy->withFilter(new ServiceFilter() {
//            public Response handle($request, $next) {
//                array_push($requests, $request);
//                $response = next->handle($request);
//                array_push($responses, $response);
//                return $response;
//            }
//        });
//
//        // Act
//        $created = filtered->createQueue(new QueueInfo('TestFilterCanSeeAndChangeRequestOrResponse'))->getValue();
//
//        // Assert
//        $this->assertNotNull($created, '$created');
//        $this->assertEquals(1, count(requests), 'requests->size()');
//        $this->assertEquals(1, count(responses), 'responses->size()');
//    }

    /**
    * @covers WindowsAzure\ServiceBus\ServiceBusRestProxy::createSubscription
    * @covers WindowsAzure\ServiceBus\ServiceBusRestProxy::createTopic
    */
    public function testSubscriptionsCanBeCreatedOnTopics()
    {
        // Arrange
        $topicName = 'TestSubscriptionsCanBeCreatedOnTopics';
        $this->restProxy->createTopic(new TopicInfo($topicName));

        // Act
//        $created = $this->restProxy->createSubscription($topicName, new SubscriptionInfo('MySubscription'))->getValue();
        $created = $this->restProxy->createSubscription($topicName, new SubscriptionInfo('MySubscription'));

        // Assert
        $this->assertNotNull($created, '$created');
        // TODO: Make sure there is something good here.
//        $this->assertEquals('MySubscription', $created->getName(), '$created->getName()');
    }

    /**
    * @covers WindowsAzure\ServiceBus\ServiceBusRestProxy::createSubscription
    * @covers WindowsAzure\ServiceBus\ServiceBusRestProxy::createTopic
    * @covers WindowsAzure\ServiceBus\ServiceBusRestProxy::listSubscriptions
    */
    public function testSubscriptionsCanBeListed()
    {
        // Arrange
        $topicName = 'TestSubscriptionsCanBeListed';
        $this->restProxy->createTopic(new TopicInfo($topicName));
        $this->restProxy->createSubscription($topicName, new SubscriptionInfo('MySubscription2'));

        // Act
        $result = $this->restProxy->listSubscriptions($topicName, null);

        // Assert
        $this->assertNotNull($result, '$result');
        // TODO:
//        $this->assertEquals(1, $result->getItems()->size(), '$result->getItems()->size()');
//        $this->assertEquals('MySubscription2', $result->getItems()->get(0)->getName(), '$result->getItems()->get(0)->getName()');
        $items = $result->getSubscriptionDescription();
        $this->assertEquals(1, count($items), '$result->getItems()->size()');
        // TODO: getName is not implemented
//        $this->assertEquals('MySubscription2', $items[0]->getName(), '$result->getItems()->get(0)->getName()');
    }

    /**
    * @covers WindowsAzure\ServiceBus\ServiceBusRestProxy::createSubscription
    * @covers WindowsAzure\ServiceBus\ServiceBusRestProxy::createTopic
    * @covers WindowsAzure\ServiceBus\ServiceBusRestProxy::getSubscription
    */
    public function testSubscriptionsDetailsMayBeFetched()
    {
        // Arrange
        $topicName = 'TestSubscriptionsDetailsMayBeFetched';
        $this->restProxy->createTopic(new TopicInfo($topicName));
        $this->restProxy->createSubscription($topicName, new SubscriptionInfo('MySubscription3'));

        // Act
//        $result = $this->restProxy->getSubscription($topicName, 'MySubscription3')->getValue();
        $result = $this->restProxy->getSubscription($topicName, 'MySubscription3');

        // Assert
        $this->assertNotNull($result, '$result');
        // TODO
//        $this->assertEquals('MySubscription3', $result->getName(), '$result->getName()');
        $this->assertEquals('MySubscription3', $result->getSubscriptionInfo()->getName(), '$result->getSubscriptionInfo->getName()');
    }

    /**
    * @covers WindowsAzure\ServiceBus\ServiceBusRestProxy::createSubscription
    * @covers WindowsAzure\ServiceBus\ServiceBusRestProxy::createTopic
    * @covers WindowsAzure\ServiceBus\ServiceBusRestProxy::deleteSubscription
    * @covers WindowsAzure\ServiceBus\ServiceBusRestProxy::listSubscriptions
    */
    public function testSubscriptionsMayBeDeleted()
    {
        // Arrange
        $topicName = 'TestSubscriptionsMayBeDeleted';
        $this->restProxy->createTopic(new TopicInfo($topicName));
        $this->restProxy->createSubscription($topicName, new SubscriptionInfo('MySubscription4'));
        $this->restProxy->createSubscription($topicName, new SubscriptionInfo('MySubscription5'));

        // Act
        $this->restProxy->deleteSubscription($topicName, 'MySubscription4');

        // Assert
        // TODO: Remove null
        $result = $this->restProxy->listSubscriptions($topicName, null);
        $this->assertNotNull($result, '$result');
//        $this->assertEquals(1, count($result->getItems()), '$result->getItems()->size()');
        $this->assertEquals(1, count($result->getSubscriptionDescription()), '$result->getItems()->size()');
        $items = $result->getSubscriptionDescription();
        // TODO: https://github.com/WindowsAzure/azure-sdk-for-php/issues/399
//        $this->assertEquals('MySubscription5', $items[0]->getName(), '$result->getItems()->get(0)->getName()');
    }

    /**
    * @covers WindowsAzure\ServiceBus\ServiceBusRestProxy::createSubscription
    * @covers WindowsAzure\ServiceBus\ServiceBusRestProxy::createTopic
    * @covers WindowsAzure\ServiceBus\ServiceBusRestProxy::receiveSubscriptionMessage
    * @covers WindowsAzure\ServiceBus\ServiceBusRestProxy::sendTopicMessage
    */
    public function testSubscriptionWillReceiveMessage()
    {
        // Arrange
        $topicName = 'TestSubscriptionWillReceiveMessage';
        $this->restProxy->createTopic(new TopicInfo($topicName));
        $this->restProxy->createSubscription($topicName, new SubscriptionInfo('sub'));
        // Act
        // TODO: Revert
        // https://github.com/WindowsAzure/azure-sdk-for-php/issues/394
//        $message = new BrokeredMessage('<p>Testing subscription</p>');
        $message = new BrokeredMessage();
        $message->setBody('<p>Testing subscription</p>');
        $message->setContentType('text/html');
        $this->restProxy->sendTopicMessage($topicName, $message);

        // Act
//        $message = $this->restProxy->receiveSubscriptionMessage($topicName, 'sub', $this->RECEIVE_AND_DELETE_5_SECONDS)->getValue();
        $message = $this->restProxy->receiveSubscriptionMessage($topicName, 'sub', $this->RECEIVE_AND_DELETE_5_SECONDS);

        // Assert
        $this->assertNotNull($message, '$message');

        $data = str_pad('', 100, chr(0));
        $size = $message->getBody()->read($data);
        $this->assertEquals('<p>Testing subscription</p>', new String($data, 0, $size), 'new String($data, 0, $size)');
        $this->assertEquals('text/html', $message->getContentType(), '$message->getContentType()');
    }

    /**
    * @covers WindowsAzure\ServiceBus\ServiceBusRestProxy::createRule
    * @covers WindowsAzure\ServiceBus\ServiceBusRestProxy::createSubscription
    * @covers WindowsAzure\ServiceBus\ServiceBusRestProxy::createTopic
    */
    public function testRulesCanBeCreatedOnSubscriptions()
    {
        // Arrange
        $topicName = 'TestrulesCanBeCreatedOnSubscriptions';
        $this->restProxy->createTopic(new TopicInfo($topicName));
        $this->restProxy->createSubscription($topicName, new SubscriptionInfo('sub'));

        // Act
//        $created = $this->restProxy->createRule($topicName, 'sub', new RuleInfo('MyRule1'))->getValue();
        $created = $this->restProxy->createRule($topicName, 'sub', new RuleInfo('MyRule1'));

        // Assert
        $this->assertNotNull($created, '$created');
        // TODO
//        $this->assertEquals('MyRule1', $created->getName(), '$created->getName()');
    }

    /**
    * @covers WindowsAzure\ServiceBus\ServiceBusRestProxy::createRule
    * @covers WindowsAzure\ServiceBus\ServiceBusRestProxy::createSubscription
    * @covers WindowsAzure\ServiceBus\ServiceBusRestProxy::createTopic
    * @covers WindowsAzure\ServiceBus\ServiceBusRestProxy::listRules
    */
    public function testRulesCanBeListedAndDefaultRuleIsPrecreated()
    {
        // Arrange
        $topicName = 'TestrulesCanBeListedAndDefaultRuleIsPrecreated';
        $this->restProxy->createTopic(new TopicInfo($topicName));
        $this->restProxy->createSubscription($topicName, new SubscriptionInfo('sub'));
        $this->restProxy->createRule($topicName, 'sub', new RuleInfo('MyRule2'));

        // Act
        // TODO: Remove null
        $result = $this->restProxy->listRules($topicName, 'sub', null);

        // Assert
        $this->assertNotNull($result, '$result');
//        $this->assertEquals(2, count($result->getItems()), '$result->getItems()->size()');
        $this->assertEquals(2, count($result->getRuleDescription()), '$result->getItems()->size()');
        $items = $result->getRuleDescription();
        $rule0 = $items[0];
        $rule1 = $items[1];
        if ($rule0->getName() == 'MyRule2') {
            $swap = $rule1;
            $rule1 = $rule0;
            $rule0 = $swap;
        }

        $this->assertEquals('$Default', $rule0->getName(), '$rule0->getName()');
        $this->assertEquals('MyRule2', $rule1->getName(), '$rule1->getName()');
        $items = $result->getRuleDescription();
        $this->assertNotNull($items[0]->getModel(), '$result->getItems()->get(0)->getModel()');
    }

    /**
    * @covers WindowsAzure\ServiceBus\ServiceBusRestProxy::createSubscription
    * @covers WindowsAzure\ServiceBus\ServiceBusRestProxy::createTopic
    * @covers WindowsAzure\ServiceBus\ServiceBusRestProxy::getRule
    */
    public function testRuleDetailsMayBeFetched()
    {
        // Arrange
        $topicName = 'TestruleDetailsMayBeFetched';
        $this->restProxy->createTopic(new TopicInfo($topicName));
        $this->restProxy->createSubscription($topicName, new SubscriptionInfo('sub'));

        // Act
//        $result = $this->restProxy->getRule($topicName, 'sub', '$Default')->getValue();
        $result = $this->restProxy->getRule($topicName, 'sub', '$Default');

        // Assert
        $this->assertNotNull($result, '$result');
        // TODO
//        $this->assertEquals('$Default', $result->getName(), '$result->getName()');
    }

    /**
    * @covers WindowsAzure\ServiceBus\ServiceBusRestProxy::createRule
    * @covers WindowsAzure\ServiceBus\ServiceBusRestProxy::createSubscription
    * @covers WindowsAzure\ServiceBus\ServiceBusRestProxy::createTopic
    * @covers WindowsAzure\ServiceBus\ServiceBusRestProxy::deleteRule
    * @covers WindowsAzure\ServiceBus\ServiceBusRestProxy::listRules
    */
    public function testRulesMayBeDeleted()
    {
        // Arrange
        $topicName = 'TestRulesMayBeDeleted';
        $this->restProxy->createTopic(new TopicInfo($topicName));
        $this->restProxy->createSubscription($topicName, new SubscriptionInfo('sub'));
        $this->restProxy->createRule($topicName, 'sub', new RuleInfo('MyRule4'));
        $this->restProxy->createRule($topicName, 'sub', new RuleInfo('MyRule5'));

        // Act
        $this->restProxy->deleteRule($topicName, 'sub', 'MyRule5');
        $this->restProxy->deleteRule($topicName, 'sub', '$Default');

        // Assert
        // TODO: Remove null
        $result = $this->restProxy->listRules($topicName, 'sub', null);
        $this->assertNotNull($result, '$result');

// TODO        
//        $this->assertEquals(1, count($result->getItems()), '$result->getItems()->size()');
//        $items = $result->getItems();
        $this->assertEquals(1, count($result->getRuleDescription()), '$result->getItems()->size()');
        $items = $result->getRuleDescription();
        $this->assertEquals('MyRule4', $items[0]->getName(), '$result->getItems()->get(0)->getName()');
    }

//    /**
//    * @covers WindowsAzure\ServiceBus\ServiceBusRestProxy::createRule
//    * @covers WindowsAzure\ServiceBus\ServiceBusRestProxy::createSubscription
//    * @covers WindowsAzure\ServiceBus\ServiceBusRestProxy::createTopic
//    */
//    public function testRulesMayHaveActionAndFilter()
//    {
//        // Arrange
//        $topicName = 'TestRulesMayHaveAnActionAndFilter';
//        $this->restProxy->createTopic(new TopicInfo($topicName));
//        $this->restProxy->createSubscription($topicName, new SubscriptionInfo('sub'));
//
//        // Act
//        $ruleInfoOne = new RuleInfo('One');
//        $ruleInfoOne->withCorrelationIdFilter('my-id');
////        $ruleOne = $this->restProxy->createRule($topicName, 'sub', $ruleInfoOne)->getValue();
//        $ruleOne = $this->restProxy->createRule($topicName, 'sub', $ruleInfoOne);
//        $ruleInfoTwo = new RuleInfo('Two');
//        $ruleInfoTwo->withTrueFilter();
////        $ruleTwo = $this->restProxy->createRule($topicName, 'sub', $ruleInfoTwo)->getValue();
//        $ruleTwo = $this->restProxy->createRule($topicName, 'sub', $ruleInfoTwo);
//        $ruleInfoThree = new RuleInfo('Three');
//        $ruleInfoThree->withFalseFilter();
////        $ruleThree = $this->restProxy->createRule($topicName, 'sub', $ruleInfoThree)->getValue();
//        $ruleThree = $this->restProxy->createRule($topicName, 'sub', $ruleInfoThree);
//        $ruleInfoFour = new RuleInfo('Four');
//        $ruleInfoFour->withEmptyRuleAction();
////        $ruleFour = $this->restProxy->createRule($topicName, 'sub', $ruleInfoFour)->getValue();
//        $ruleFour = $this->restProxy->createRule($topicName, 'sub', $ruleInfoFour);
//        $ruleInfoFive = new RuleInfo('Five');
//        $ruleInfoFive->withSqlRuleAction('SET x = 5');
////        $ruleFive = $this->restProxy->createRule($topicName, 'sub', $ruleInfoFive)->getValue();
//        $ruleFive = $this->restProxy->createRule($topicName, 'sub', $ruleInfoFive);
//        $ruleInfoSix = new RuleInfo('Six');
//        $ruleInfoSix->withSqlExpressionFilter('x != 5');
////        $ruleSix = $this->restProxy->createRule($topicName, 'sub', $ruleInfoSix)->getValue();
//        $ruleSix = $this->restProxy->createRule($topicName, 'sub', $ruleInfoSix);
//
//        // Assert
//        $this->assertEquals($ruleOne->getFilter() instanceof CorrelationFilter, '$ruleOne->getFilter()->getClass()');
//        $this->assertEquals($ruleTwo->getFilter() instanceof TrueFilter, '$ruleTwo->getFilter()->getClass()');
//        $this->assertEquals($ruleThree->getFilter() instanceof FalseFilter, '$ruleThree->getFilter()->getClass()');
//        $this->assertEquals($ruleFour->getAction() instanceof EmptyRuleAction, '$ruleFour->getAction()->getClass()');
//        $this->assertEquals($ruleFive->getAction() instanceof SqlRuleAction, '$ruleFive->getAction()->getClass()');
//        $this->assertEquals($ruleSix->getFilter() instanceof SqlFilter, '$ruleSix->getFilter()->getClass()');
//    }

    /**
    * @covers WindowsAzure\ServiceBus\ServiceBusRestProxy::createQueue
    * @covers WindowsAzure\ServiceBus\ServiceBusRestProxy::receiveQueueMessage
    * @covers WindowsAzure\ServiceBus\ServiceBusRestProxy::sendQueueMessage
    */
    public function testMessagesMayHaveCustomProperties()
    {
        // Arrange
        $queueName = 'TestMessagesMayHaveCustomProperties';
        $this->restProxy->createQueue(new QueueInfo($queueName));

        // Act
        // TODO: Revert
        // https://github.com/WindowsAzure/azure-sdk-for-php/issues/394
//        $message = new BrokeredMessage('');
        $message = new BrokeredMessage();
        $message->setBody('');
        // TODO: https://github.com/WindowsAzure/azure-sdk-for-php/issues/406
//        $message->setProperty('hello', 'world');
        $message->setProperty('hello', '"world"');
        $message->setProperty('foo', 42);
        $this->restProxy->sendQueueMessage($queueName, $message);
        $message = $this->restProxy->receiveQueueMessage($queueName, $this->RECEIVE_AND_DELETE_5_SECONDS);

        // Assert
        // TODO: https://github.com/WindowsAzure/azure-sdk-for-php/issues/406
//        $this->assertEquals('world', $message->getProperty('hello'), '$message->getProperty(\'hello\')');
        $this->assertEquals('"world"', $message->getProperty('hello'), '$message->getProperty(\'hello\')');
        $this->assertEquals(42, $message->getProperty('foo'), '$message->getProperty(\'foo\')');
    }
}
?>
