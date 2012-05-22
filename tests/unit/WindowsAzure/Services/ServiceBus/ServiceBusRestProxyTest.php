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
 * @author     Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright  2012 Microsoft Corporation
 * @license    http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link       http://pear.php.net/package/azure-sdk-for-php
 */

namespace Tests\Unit\WindowsAzure\Services\ServiceBus;

use WindowsAzure\Services\Core\Models\ServiceProperties;
use Tests\Framework\TestResources;
use Tests\Framework\ServiceBusRestProxyTestBase;
use WindowsAzure\Core\Configuration;
use WindowsAzure\Core\ServiceException;
use WindowsAzure\Core\WindowsAzureUtilities;
use WindowsAzure\Services\ServiceBus\ServiceBusRestProxy;
use WindowsAzure\Services\ServiceBus\Models\BrokeredMessage;
use WindowsAzure\Services\ServiceBus\Models\BrokerProperties;
use WindowsAzure\Services\ServiceBus\Models\CreateQueueResult;
use WindowsAzure\Services\ServiceBus\Models\CreateRuleResult;
use WindowsAzure\Services\ServiceBus\Models\CreateTopicResult;
use WindowsAzure\Services\ServiceBus\Models\CreateSubscriptionResult;
use WindowsAzure\Services\ServiceBus\Models\ListTopicsOptions;
use WindowsAzure\Services\ServiceBus\Models\QueueDescription;
use WindowsAzure\Services\ServiceBus\Models\QueueInfo;
use WindowsAzure\Services\ServiceBus\Models\ReceiveMessageOptions;
use WindowsAzure\Services\ServiceBus\Models\RuleDescription;
use WindowsAzure\Services\ServiceBus\Models\RuleInfo;
use WindowsAzure\Services\ServiceBus\Models\SubscriptionDescription;
use WindowsAzure\Services\ServiceBus\Models\SubscriptionInfo;
use WindowsAzure\Services\ServiceBus\Models\TopicDescription;
use WindowsAzure\Services\ServiceBus\Models\TopicInfo;
use WindowsAzure\Resources;

/**
 * Unit tests for ServiceBusRestProxy class
 *
 * @package    Tests\Unit\WindowsAzure\Services\ServiceBus
 * @author     Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright  2012 Microsoft Corporation
 * @license    http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version    Release: @package_version@s
 * @link       http://pear.php.net/package/azure-sdk-for-php
 */
class ServiceBusRestProxyTest extends ServiceBusRestProxyTestBase
{
    /**
     * @covers WindowsAzure\Services\ServiceBus\ServiceBusRestProxy::createQueue
     */
    public function testCreateQueueWorks()
    {
        $queueName = 'createQueueWorks';
        $queueInfo = new QueueInfo($queueName);

        try
        {
            $this->wrapper->deleteQueue($queueName);
        }
        catch(\Exception $e)
        {
        }

        $createQueueResult = $this->createQueue($queueInfo);
        $this->assertNotNull($createQueueResult);
    } 

    /**
     * @covers WindowsAzure\Services\ServiceBus\ServiceBusRestProxy::deleteQueue
     */
    public function testDeleteQueueWorks()
    {
        $queueName = 'testDeleteQueueWorks';
        $queueInfo = new QueueInfo($queueName);
        $this->wrapper->createQueue($queueInfo);
        $this->wrapper->deleteQueue($queueName);
        $this->assertNotNull($queueInfo);
    }
    
    /**
     * @covers WindowsAzure\Services\ServiceBus\ServiceBusRestProxy::deleteQueue
     */
    public function testDeleteQueueNonExistQueueFail()
    {
        $this->setExpectedException(get_class(
            new ServiceException(''))
        );

        $this->wrapper->deleteQueue('IDoNotExist');
    }
    
    /**
     * @covers WindowsAzure\Services\ServiceBus\ServiceBusRestProxy::sendMessage
     */
    public function testSendQueueMessageWorks()
    {
        $queueName = 'sendQueueMessageWorksQueue';
        $queueInfo = new QueueInfo($queueName);
        try {
           $this->wrapper->deleteQueue($queueName);
        }
        catch (\Exception $e)
        {
        }
        $this->createQueue($queueInfo);
        $brokeredMessage = new BrokeredMessage();
        $brokeredMessage->setBody('sendQueueMessageWorksMessage');
        $this->wrapper->sendQueueMessage('sendQueueMessageWorksQueue/messages', $brokeredMessage);
        $this->assertNotNull($brokeredMessage);
        
    }

    /**
     * @covers WindowsAzure\Services\ServiceBus\ServiceBusRestProxy::receiveMessage
     */
    public function testReceiveMessageWorks()
    {   
        $queueDescription = new QueueDescription();
        $queueName = 'testReceiveMessageWorksQueue';
        $queueInfo = new QueueInfo($queueName, $queueDescription);
        $this->safeDeleteQueue($queueName);
        $this->createQueue($queueInfo);
        $brokeredMessage = new BrokeredMessage();
        $expectedMessageText = 'testReceiveMessageWorks';

        $brokeredMessage->setBody($expectedMessageText);
        
        $this->wrapper->sendQueueMessage(
            $queueName.'/messages',
            $brokeredMessage
        );
        $receiveMessageOptions = new ReceiveMessageOptions();
        $receiveMessageOptions->setIsReceiveAndDelete(true);
        $receiveMessageOptions->setIsPeekLock(false);
        $receiveMessageOptions->setTimeout(5);

        $receivedMessage = $this->wrapper->receiveMessage($queueName.'/messages/head', $receiveMessageOptions);
        $this->assertNotNull($receivedMessage);
        $this->assertEquals(
            $expectedMessageText,
            $receivedMessage->getBody()
        );
    }

    /**
     * @covers WindowsAzure\Services\ServiceBus\ServiceBusRestProxy::sendMessage
     */
    public function testPeekLockMessageWorks()
    {
        $queueDescription = new QueueDescription();
        $queueName = 'testPeekLockMessageWorks';
        $expectedMessage = 'testPeekLockMessageWorksMessage';
        $queueInfo = new QueueInfo($queueName, $queueDescription);
        $this->safeDeleteQueue($queueName);
        $this->createQueue($queueInfo);
        $brokeredMessage = new BrokeredMessage();
        $brokeredMessage->setBody($expectedMessage);

        $this->wrapper->sendQueueMessage($queueName.'/messages', $brokeredMessage);
        $receiveMessageOptions = new ReceiveMessageOptions();
        $receiveMessageOptions->setTimeout(5);
        $receiveMessageOptions->setIsReceiveAndDelete(false); 
        $receiveMessageOptions->setIsPeekLock(true); 
        $receivedMessage = $this->wrapper->receiveQueueMessage(
            $queueName, 
            $receiveMessageOptions
        );
        $actualMessage = $receivedMessage->getBody();
        $this->assertEquals(
            $expectedMessage,
            $actualMessage
        );         
    }

    /**
     * @covers WindowsAzure\Services\ServiceBus\ServiceBusRestProxy::sendMessage
     */
    public function testPeekLockedMessageCanBeCompleted() 
    {
        $queueDescription = new QueueDescription();
        $queueName = 'testPeekLockMessageCanBeCompleted';
        $expectedMessage = 'testPeekLockMessageCanBeCompletedMessage';
        $queueInfo = new QueueInfo($queueName, $queueDescription);
        $this->safeDeleteQueue($queueName);
        $this->createQueue($queueInfo);
        $brokeredMessage = new BrokeredMessage();
        $brokeredMessage->setBody($expectedMessage);

        $this->wrapper->sendQueueMessage(
            $queueName.'/messages', 
            $brokeredMessage
        );

        $receiveMessageOptions = new ReceiveMessageOptions();
        $receiveMessageOptions->setTimeout(5);
        $receiveMessageOptions->setIsReceiveAndDelete(false);
        $receiveMessageOptions->setIsPeekLock(true);

        $brokeredMessage = $this->wrapper->receiveQueueMessage(
            $queueName, 
            $receiveMessageOptions
        );

        $lockToken = $brokeredMessage->getLockToken();
        $lockedUntil = $brokeredMessage->getLockedUntilUtc();
        $this->assertNotNull($lockToken);
        $this->assertNotNull($lockedUntil);
    } 

    /**
     * @covers WindowsAzure\Services\ServiceBus\ServiceBusRestProxy::unlockMessage
     */
    public function testPeekLockedMessageCanBeUnlocked()
    {
        $queueDescription = new QueueDescription();
        $queueName = 'testPeekLockMessageCanBeCompleted';
        $expectedMessage = 'testPeekLockMessageCanBeCompletedMessage';
        $queueInfo = new QueueInfo($queueName, $queueDescription);
        $this->safeDeleteQueue($queueName);
        $this->createQueue($queueInfo);
        $brokeredMessage = new BrokeredMessage();
        $brokeredMessage->setBody($expectedMessage);

        $this->wrapper->sendQueueMessage($queueName.'/messages', $brokeredMessage);

        $receiveMessageOptions = new ReceiveMessageOptions();
        $receiveMessageOptions->setTimeout(5);
        $receiveMessageOptions->setIsReceiveAndDelete(false);
        $receiveMessageOptions->setIsPeekLock(true);

        $peekedMessage = $this->wrapper->receiveQueueMessage(
            $queueName, 
            $receiveMessageOptions
        );

        $lockToken = $peekedMessage->getLockToken();
        $lockedUnti = $peekedMessage->getLockedUntilUtc();

        $this->wrapper->unlockMessage($peekedMessage);
        $unlockedMessage = $this->receiveQueueMessage(
            $queueName,
            $receiveMessageOptions
        );

        $this->assertNotNull($lockToken);
        $this->assertNotNull($lockedUntilUtc);
        $this->assertNull($unlockedMessage->getLockToken());
        $this->assertNull($unlockedMessage->getLockedUntilUtc());
        
    }

    /**
     * @covers WindowsAzure\Services\ServiceBus\ServiceBusRestProxy::peekLockMessageWorks
     */
    public function testContentTypePassesThrough()
    {
        $queueName = 'testContnetTypePassesThrough';
        $queueDescription = new QueueDescription();
        $queueInfo = new QueueInfo($queueName, $queueDescription);
        $expectedMessage = new BrokeredMessage();
        $expectedMessage->setBody('<data>testContentTypePassesThrough</data>');
        $expectedMessage->setContentType(Resources::TEXT_XML_CONTENT_TYPE); 

        $this->safeDeleteQueue($queueName);
        $receiveMessageOptions = new ReceiveMessageOptions();
        $receiveMessageOptions->setTimeout(5);
        $receiveMessageOptions->setIsReceiveAndDelete(true);
        $this->createQueue($queueInfo);
        $this->wrapper->sendQueueMessage($queueName.'/messages', $expectedMessage);
        $actualMessage = $this->wrapper->receiveQueueMessage(
            $queueName, 
            $receiveMessageOptions
        );

        $this->assertEquals(
            $expectedMessage->getBody(),
            $actualMessage->getBody()
        ); 

        $this->assertEquals(
            $expectedMessage->getContentType(),
            $actualMessage->getContentType()
        );
    }

    /**
     * @covers WindowsAzure\Services\ServiceBus\ServiceBusRestProxy::createTopic
     */
    public function testCreateListFetchAndDeleteTopicSuccess()
    {
        $topicName = 'createTopicSuccess';
        $topicInfo = new TopicInfo($topicName);

        $this->safeDeleteTopic($topicName); 

        $listTopicsOptions = new ListTopicsOptions();
        $createTopicResult = $this->createTopic($topicInfo);
        $listTopicsResult = $this->wrapper->listTopics($listTopicsOptions);
        $getTopicResult = $this->wrapper->getTopic($topicName);
        $this->wrapper->deleteTopic($topicName);
        $listTopicsResult2 = $this->wrapper->listTopics();

        $this->assertNotNull($createTopicResult);
        $this->assertNotNull($listTopicResult);
        $this->assertNotNull($getTopicResult);
        $this->assertNotNull($listTopicResult2);
        
    }

    /**
     * @covers WindowsAzure\Services\ServiceBus\ServiceBusRestProxy::createSubscription
     */
    public function testSubscriptionCanBeCreatedOnTopics()
    {
        
        $topicName = 'testCreateSubscriptionWorksTopic';
        $subscriptionName = 'testCreateSubscriptionWorksSubscription';
        $topicInfo = new TopicInfo($topicName);
        $subscriptionInfo = new SubscriptionInfo($subscriptionName);
        $this->safeDeleteSubscription($topicName, $subscriptionName);
        $this->safeDeleteTopic($topicName);
        $this->createTopic($topicInfo);
         
        $createSubscriptionResult = $this->createSubscription(
            $topicName,
            $subscriptionInfo
        );
        $this->assertNotNull($createSubscriptionResult);

    } 

    /**
     * @covers WindowsAzure\Services\ServiceBus\ServiceBusRestProxy::listSubscription
     */
    public function testSubscripitonsCanBeListed()
    {
        $topicName = 'testSubscriptionCanBeListed';
        $subscriptionName = 'sub';
        $topicInfo = new TopicInfo($topicName);
        $subscriptionInfo = new SubscriptionInfo($subscriptionName);
        
        $this->createTopic($topicInfo);
        $this->createSubscription($topicName, $subscriptionInfo);

        $listSubscriptionsResult = $this->listSubscriptions($topicName);
        $subscriptionDescription = $listSubscriptionResult->getSubscriptionDescription();
      
        $this->assertNotNull($listSubscriptionsResult);
        $this->assertEquals(1, count($subscriptionDescription));
    }

    /**
     * @covers WindowsAzure\Services\ServiceBus\ServiceBusRestProxy::getSubscription
     */
    public function testSubscriptionsDetailsMayBeFetched()
    {
        $topicName = 'testSubscriptionsDetailsMayBeFetched';
        $subscriptionName = 'sub';
        $topicInfo = new TopicInfo($topicName);
        $subscriptionInfo = new SubscriptionInfo($subscriptionName);
        
        $this->safeDeleteSubscription($topicName, $subscriptionName);
        $this->safeDeleteTopic($topicName);

        $this->createTopic($topicInfo);
        $this->createSubscription($topicName, $subscriptionInfo);

        $getSubscriptionResult = $this->wrapper->getSubscription(
            $topicName, 
            $subscriptionName
        );
        
        $this->assertNotNull($getSubscriptionResult);
    }

    /**
     * @covers WindowsAzure\Services\ServiceBus\ServiceBusRestProxy::deleteSubscriptions
     */
    public function testSubscriptionMayBeDeleted()
    {
        $topicName = 'testSubscriptionMayBeDeleted';
        $topicInfo = new TopicInfo($topicName);
        $subscriptionName = 'MySubscription';
        $subscriptionInfo = new SubscriptionInfo($subscriptionName);
        
        $this->createTopic($topicInfo);
        $this->createSubscription($topicName, $subscriptionInfo);
        $this->deleteSubscription($topicName, $subscriptionName);

        $listSubscriptionsResult = $this->wrapper->listSubsriptions(
            $topicName,
            $subscriptionName
        );

        $subscriptionDescription = $listSubscriptionsResult->getSubscriptionDescription();

        $this->assertNotNull($listSubscriptionsResult);
        $this->assertEquals(
            0,
            count($subscriptionDescription)
        ); 
        
    }

    /**
     * @covers WindowsAzure\Services\ServiceBus\ServiceBusRestProxy::listSubscriptions
     */
    public function testSubscriptionCanBeListed()
    {
        $topicName = 'testSubscriptionMayBeDeleted';
        $topicInfo = new TopicInfo($topicName);
        $subscriptionName = 'MySubscription';
        $subscriptionInfo = new SubscriptionInfo($subscriptionName);
        
        $this->createTopic($topicInfo);
        $this->createSubscription($topicName, $subscriptionInfo);
        $this->delete($topicName, $subscriptionName);

        $listSubscriptionsResult = $this->wrapper->listSubsriptions(
            $topicName,
            $subscriptionName
        );

        $subscriptionDescription = $listSubscriptionsResult->getSubscriptionDescription();

        $this->assertNotNull($listSubscriptionsResult);
        $this->assertEquals(
            0,
            count($subscriptionDescription)
        );
    }

    /**
     * @covers WindowsAzure\Services\ServiceBus\ServiceBusRestProxy::listSubscriptions
     */
    public function testSubscriptionWillReceiveMessage()
    {
        $topicName = 'testSubscriptionWillReceiveMessage';
        $subscriptionName = 'sub';
        $topicInfo = new TopicInfo($topicName);
        $subscriptionInfo = new SubscriptionInfo($subscriptionName);
        $brokeredMessage = new BrokeredMessage();
        $brokeredMessage->setBody('<p>testSubscriptionWillReceiveMessage</p>');
        $brokeredMessage->setContentType('text/html');

        $this->createTopic($topicInfo);
        $this->createSubscription($topicName, $subscriptionInfo);
    }

    public function testRulesCanBeCreatedOnSubscription()
    {
        $topicName = 'testRulesCanBeCreatedOnSubscription';
        $subscriptionName = 'sub';
        $topicInfo = new TopicInfo($topicName);
        $subscriptionInfo = new SubscriptionInfo($subscriptionName);
        $ruleName = 'MyRule';
        $ruleInfo = new RuleInfo($ruleName);
        $this->safeDeleteSubscription($topicName, $subscriptionName);
        $this->safeDeleteTopic($topicName);

        $this->createTopic($topicInfo);
        $this->createSubscription($topicName, $subscriptionInfo);
        $createRuleResult = $this->createRule($topicName, $subscriptionName, $ruleInfo);
        $this->assertNotNull($createRuleResult);
        $this->assertEquals(
            $ruleName,
            $createRuleResult->getName()
        );
    
    }

    public function testRulesCanBeListedAndDefaultRuleIsPrecreated()
    {
        $topicName = 'testRulesCanBeListedAndDefaultRuleIsPrecreated';
        $subscriptionName = 'sub';
        $ruleName = 'MyRule';
        $secondRuleName = 'MyRule2';
        $topicInfo = new TopicInfo($topicName);
        $subscriptionInfo = new SubscriptionInfo($subscriptionName);
        $ruleInfo = new RuleInfo($ruleName);
        $secondRuleInfo = new RuleInfo($secondRuleName);

        $this->safeDeleteSubscription($topicName, $subscriptionName);
        $this->safeDeleteTopic($topicName);

        $this->createTopic($topicInfo);
        $this->createSubscription($topicName, $subscriptionInfo);
        $this->createRule($topicName, $subscriptionName, $ruleInfo);
        $this->createRule($topicName, $subscriptionName, $secondRuleInfo);
        
        $listRulesResult = $this->wrapper->listRules($topicName, $subscriptionName);

        $this->assertNotNull($listRulesReslt);
        $this->assertEquals(2, $listRulesResult->getRuleDescription());
        
    }

    public function testRuleDetailsMayBeFetched()
    {
        $topicName = 'testRuleDetailsMayBeFetched';
        $subscriptionName = 'sub';
        $ruleName = '$Default';

        $topicInfo = new TopicInfo($topicName);
        $subscriptionInfo = new SubscriptionInfo($subscriptionName);

        $this->safeDeleteSubscription($topicName, $subscriptionName);
        $this->safeDeleteTopic($topicName);

        $this->createTopic($topicInfo); 
        $this->createSubscription($topicName, $subscriptionInfo);
        $getRuleResult = $this->wrapper->getRule($topicName, $subscriptionName, Resources::DEFAULT_RULE_NAME);
        
        $this->assertNotNull($getRuleResult);
        $this->assertEquals(
            '$Default',
            $getRuleResult->getName()
        );
    } 

    public function testRuleMayBeDeleted()
    {
        $topicName = 'testRuleMayBeDeleted';
        $subscriptionName = 'sub';
        $firstRuleName = 'RuleNumberOne';
        $secondRuleName = 'RuleNumberTwo';
        
        $topicInfo = new TopicInfo($topicName);
        $subscriptionInfo = new SubscriptionInfo($subscriptionName);
        $firstRuleInfo = new RuleInfo($firstRuleName);
        $secondRuleInfo = new RuleInfo($secondRuleName);
        
        $this->safeDeleteSubscription($topicName, $subscriptionName);
        $this->safeDeleteTopic($topicName);

        $this->createTopic($topicInfo);
        $this->createSubscription($topicName, $subscriptionInfo);
        $this->createRule($topicName, $subscriptionName, $firstRuleInfo);
        $this->createRule($topicName, $subscriptionName, $SecondRuleInfo);

        $this->deleteRule($topicName, $subscriptionName, $secondRuleName);
        $this->deleteRule($topicName, $subscriptionName, Resources::DEFAULT_RULE_NAME); 

        $listRulesResult = $this->listRule($topicName, $subscriptionName);
        
        $ruleDescription = $listRulesResult->getRuleDescription();
        
        $this->assertNotNull($ruleDescription);
        $this->assertEquals(1, count($ruleDescription));
    }
   
    public function testRulesMayHaveActionAndFilter()
    {
        $topicName = 'testRulesMayHaveActionAndFilter';
        $subscriptionName = 'sub';

        $topicInfo = new TopicInfo($topicName);
        $subscriptionInfo = new SubscriptionInfo($subscriptionName);
        $this->safeDeleteSubscription($topicName, $subscriptionName); 
        $this->safeDeleteTopic($topicName);

        $this->createTopic($topicInfo);
        $this->createSubscription($topicName, $subscriptionInfo);
         
    }

    /**
     * @covers WindowsAzure\Services\ServiceBus\ServiceBusRestProxy::createSubscription
     */
    public function testMessageMayHaveCustomProperties()
    {
        $queueName = 'testMessageMayHaveCustomProperties';
        $queueDescription = new QueueDescription();
        $queueInfo = new QueueInfo($queueName, $queueDescription);

        $this->safeDeleteQueue($queueName);
        $this->createQueue($queueInfo);
        $brokeredMessage = new BrokeredMessage();
        $brokeredMessage->setProperty('Hello', 'World');
        $brokeredMessage->setProperty('foo', 42);
        $this->wrapper->sendQueueMessage($queueName.'/messages', $brokeredMessage);
        $receiveMessageOptions = new ReceiveMessageOptions();
        $receiveMessageOptions->setTimeout(5);
        $receiveMessageOptions->setIsReceiveAndDelete(true);
        $receivedMessage = $this->wrapper->receiveQueueMessage(
            $queueName, 
            $receiveMessageOptions
        );

        $this->assertNotNull($receivedMessage);
        $this->assertEquals(
            'world',
            $receivedMessage->getProperty('hello')
        );

        $this->assertEquals(
            42,
            $receivedMessage->getProperty('foo')
        );
        
    }

}

?>
