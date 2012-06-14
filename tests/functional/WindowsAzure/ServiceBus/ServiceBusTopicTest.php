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
 * @package   Tests\Functional\WindowsAzure\ServiceBus
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */

namespace Tests\Functional\WindowsAzure\ServiceBus;

use Tests\Functional\WindowsAzure\ServiceBus\ScenarioTestBase;
use WindowsAzure\Common\Internal\Utilities;
use WindowsAzure\ServiceBus\ServiceBusService;
use WindowsAzure\ServiceBus\Models\Action;
use WindowsAzure\ServiceBus\Models\BrokeredMessage;
use WindowsAzure\ServiceBus\Models\ListTopicsOptions;
use WindowsAzure\ServiceBus\Models\ReceiveMessageOptions;
use WindowsAzure\ServiceBus\models\RuleInfo;
use WindowsAzure\ServiceBus\Models\SubscriptionInfo;
use WindowsAzure\ServiceBus\Models\SqlFilter;
use WindowsAzure\ServiceBus\Models\SqlRuleAction;
use WindowsAzure\ServiceBus\Models\TopicInfo;

class ServiceBusTopicTest extends ScenarioTestBase
{
    private $topicName = 'testMyTopic';
    private $subscriptionName1 = 'noRules';
    private $subscriptionName2 = 'intRuleSub';
    private $subscriptionName3 = 'strAndBoolRuleSub';
    private $subscriptionName4 = 'tripleMsgRuleSub';
    private $RECEIVE_AND_DELETE_5_SECONDS;
    private $PEEK_LOCK;

    public function testSubscriptionTopic()
    {
        $this->RECEIVE_AND_DELETE_5_SECONDS = new ReceiveMessageOptions();
        $this->RECEIVE_AND_DELETE_5_SECONDS->setReceiveAndDelete();
        $this->RECEIVE_AND_DELETE_5_SECONDS->setTimeout(5);

        $this->PEEK_LOCK = new ReceiveMessageOptions();
        $this->PEEK_LOCK->setPeekLock();
        $this->PEEK_LOCK->setTimeout(20);

        $this->topicName .= time();

        $this->setupTopic();
        $this->setupSubscriptions();
        $this->setupRules();

        $messages = $this->sendMessages();

        $this->getMessageCounts();
        $this->getMessageFromSub($messages, $this->subscriptionName1);
        $this->getMessageFromSub($messages, $this->subscriptionName2);
        $this->getMessageFromSub($messages, $this->subscriptionName3);
        $this->getMessageFromSub($messages, $this->subscriptionName4);

        self::write('Deleting topic ' . $this->topicName);
        $this->restProxy->deleteTopic($this->topicName);
        self::write('Deleted topic ' . $this->topicName);
    }

    private function setupTopic()
    {
        $options = new ListTopicsOptions();
        $options->setSkip(20);
        // TODO: https://github.com/WindowsAzure/azure-sdk-for-php/issues/479
//        $options->setTop(2);
        $topics = $this->restProxy->listTopics($options)->getTopicInfo();
        foreach ($topics as $topic) {
            self::write('Topic name is ' . $topic->getTitle());
        }

        self::write('checking if topic already exists ' . $this->topicName);
        try {
            $this->restProxy->getTopic($this->topicName);
            self::write('Topic already exists deleting it');
            $this->restProxy->deleteTopic($this->topicName);
        }
        catch (\Exception $e) {
            self::write('could not get an existing topic (' . $e->getCode() . '), proceeding...');
        }

        $topic = new TopicInfo($this->topicName);
        $topic->getTopicDescription()->setEnableBatchedOperations(true);
        $topic->getTopicDescription()->setMaxSizeInMegabytes(1024);
        $topic->getTopicDescription()->setRequiresDuplicateDetection(false);

        self::write('Creating topic ' . $this->topicName);

        $this->restProxy->createTopic($topic);
        $this->restProxy->getTopic($this->topicName)->getTopicInfo();
    }

    private function setupSubscriptions()
    {
        $s = new SubscriptionInfo($this->subscriptionName1);
        $s->getSubscriptionDescription()->setDeadLetteringOnFilterEvaluationExceptions(true);
        $s->getSubscriptionDescription()->setDeadLetteringOnMessageExpiration(true);
        $s->getSubscriptionDescription()->setEnableBatchedOperations(true);
        $s->getSubscriptionDescription()->setMaxDeliveryCount(10);
        $s->getSubscriptionDescription()->setRequiresSession(false);
        $this->restProxy->createSubscription($this->topicName, $s);

        $this->restProxy->createSubscription($this->topicName, new SubscriptionInfo($this->subscriptionName2));
        $this->restProxy->createSubscription($this->topicName, new SubscriptionInfo($this->subscriptionName3));
        $this->restProxy->createSubscription($this->topicName, new SubscriptionInfo($this->subscriptionName4));
    }

    private function setupRules()
    {
        // See this topic for more information on what SQL filter strings are allowed:
        // http://msdn.microsoft.com/en-us/library/microsoft.servicebus.messaging.sqlfilter.sqlexpression.aspx
        // See this topic for more information on what SQL action strings are allowed:
        // http://msdn.microsoft.com/en-us/library/microsoft.servicebus.messaging.sqlruleaction.sqlexpression

        // subscriptionName1 is left unchanged

        // subscriptionName2 gets a rule that works on integers
        $this->restProxy->deleteRule($this->topicName, $this->subscriptionName2, '$Default');
        $rule2 = new RuleInfo('intType');
        $rule2->withSqlFilter('int < 53');
        $this->restProxy->createRule($this->topicName, $this->subscriptionName2, $rule2);

        // subscriptionName3 gets a rule that works on strings and booleans
        $this->restProxy->deleteRule($this->topicName, $this->subscriptionName3, '$Default');
        $rule3 = new RuleInfo('strAndBoolRule');
        $rule3->withSqlFilter('name LIKE \'%3\' OR user.even = TRUE');
        $this->restProxy->createRule($this->topicName, $this->subscriptionName3, $rule3);

        // subscriptionName4 gets rules to enable 3 duplicate messages
        $rule4a = new RuleInfo('trueRuleA');
        $rule4a->withTrueFilter();
        $rule2->withSqlRuleAction('SET trueRuleA=TRUE; SET actionGuid=newid(); SET actionDouble=3.5;');
        $rule4b = new RuleInfo('trueRuleB');
        $rule4b->withTrueFilter();
        $rule2->withSqlRuleAction('SET trueRuleB=TRUE; SET actionString=\'hello\'; SET actionBoolean=TRUE');
        $this->restProxy->createRule($this->topicName, $this->subscriptionName4, $rule4a);
        $this->restProxy->createRule($this->topicName, $this->subscriptionName4, $rule4b);

        $this->showRules($this->subscriptionName1);
        $this->showRules($this->subscriptionName2);
        $this->showRules($this->subscriptionName3);
        $this->showRules($this->subscriptionName4);
    }

    private function showRules($subName)
    {
        self::write('Subscription: ' . $subName);
        $lst = $this->restProxy->listRules($this->topicName, $subName)->getRuleInfo();
        foreach ($lst as $item) {
            self::write('  Rule: ' . $item->getTitle());
            $filter = $item->getRuleDescription()->getFilter();
            self::write('    Filter: ' . get_class($filter) . ':' . $filter->getCompatibilityLevel());
            if ($filter instanceof SqlFilter) {
                self::write('      ' . $filter->getSqlExpression());
            }
        }
    }

    private function sendMessages()
    {
        $messages = array();
        $messages[] = $this->createIssueMessage('1', 'First  message information', 'label1', 1);
        $messages[] = $this->createIssueMessage('2', 'Second message information', 'label2', 2);
        $messages[] = $this->createIssueMessage('3', 'Third  message information', 'label3', 3);
        $messages[] = $this->createIssueMessage('4', 'Fourth message information', 'label4', 4);
        foreach($messages as $message)  {
            $this->restProxy->sendTopicMessage($this->topicName, $message);
            $data = $message->getBody();
            self::write('Message sent with id: ' . $message->getMessageId() . ' Body of $message ' . $data);
        }

        // Seems like it takes some time to the subscribers to get all the messages.
        // So just take a 10 second pause.
        sleep(10);
        return $messages;
    }

    private function createIssueMessage($issueId, $issueBody, $label, $i)
    {
        // TODO: https://github.com/WindowsAzure/azure-sdk-for-php/issues/394
//        $message = new BrokeredMessage($issueBody);
        $message = new BrokeredMessage();
        $message->setBody($issueBody);
        $message->setContentType('text/xml');
        $message->setLabel($label);
        $message->setReplyTo('1@1.com');
        $message->setMessageId($issueId);

        $customProperties = $this->getCustomProperties($i);
        foreach ($customProperties as $key => $value) {
            // TODO: https://github.com/WindowsAzure/azure-sdk-for-php/issues/406
//            $message->setProperty($key, $value);
            $message->setProperty($key,  self::CustomPropertiesMapper_toString($value));
        }

        return $message;
    }

    private function getMessageCounts()
    {
        $topic = $this->restProxy->getTopic($this->topicName);
        $this->assertEquals($this->topicName, $topic->getTopicInfo()->getTitle(), '$topic->getTopicInfo->getTitle');

        // Subscription 1
        $subscription1 = $this->restProxy->getSubscription($this->topicName, $this->subscriptionName1);
        $subscription1 = $subscription1->getSubscriptionInfo()->getSubscriptionDescription();
        self::write('Subscription 1 message count: ' . $subscription1->getMessageCount());
        $this->assertEquals(4, $subscription1->getMessageCount(), 'Subscription 1 message count');

        // Subscription 2
        $subscription2 = $this->restProxy->getSubscription($this->topicName, $this->subscriptionName2);
        $subscription2 = $subscription2->getSubscriptionInfo()->getSubscriptionDescription();
        self::write('Subscription 2 message count ' . $subscription2->getMessageCount());
        $this->assertEquals(2, $subscription2->getMessageCount(), 'Subscription 2 message count');

        // Subscription 3
        $subscription3 = $this->restProxy->getSubscription($this->topicName, $this->subscriptionName3);
        $subscription3 = $subscription3->getSubscriptionInfo()->getSubscriptionDescription();
        self::write('Subscription 3 message count ' . $subscription3->getMessageCount());
        $this->assertEquals(3, $subscription3->getMessageCount(), 'Subscription 3 message count');

        // Subscription 4
        $subscription4 = $this->restProxy->getSubscription($this->topicName, $this->subscriptionName4);
        $subscription4 = $subscription4->getSubscriptionInfo()->getSubscriptionDescription();
        self::write('Subscription 4 message count ' . $subscription4->getMessageCount());
        $this->assertEquals(4, $subscription4->getMessageCount(), 'Subscription 4 message count');
    }

    private function getMessageFromSub($expectedMessages, $subscriptionName)
    {
        $expectedCount = count($expectedMessages);

        // Peek the first message

        $message1 = $this->restProxy->receiveSubscriptionMessage($this->topicName, $subscriptionName, $this->PEEK_LOCK);
        $this->compareMessages($expectedMessages[0], $message1);

        $messageCount = $this->restProxy->getSubscription($this->topicName, $subscriptionName)->getSubScriptionInfo()->getSubscriptionDescription()->getMessageCount();
        self::write('Peek locked first message, Message count: ' . $messageCount);
        $this->assertEquals($expectedCount, $messageCount, 'Peek locked first message, count should not change');

        // Get the second message

        $message2 = $this->restProxy->receiveSubscriptionMessage($this->topicName, $subscriptionName, $this->RECEIVE_AND_DELETE_5_SECONDS);
        $expectedCount--;
        $this->compareMessages($expectedMessages[1], $message2);

        $messageCount = $this->restProxy->getSubscription($this->topicName, $subscriptionName)->getSubScriptionInfo()->getSubscriptionDescription()->getMessageCount();
        self::write('RECEIVE_AND_DELETE second message, Message count: ' . $messageCount);
        $this->assertEquals($expectedCount, $messageCount, 'RECEIVE_AND_DELETE second message, count decrements');

        // Unlock then get the first message

        $this->restProxy->unlockMessage($message1);
        $message1again = $this->restProxy->receiveSubscriptionMessage($this->topicName, $subscriptionName, $this->RECEIVE_AND_DELETE_5_SECONDS);
        $expectedCount--;
        $this->compareMessages($expectedMessages[0], $message1again);

        $messageCount = $this->restProxy->getSubscription($this->topicName, $subscriptionName)->getSubscriptionInfo()->getSubscriptionDescription()->getMessageCount();
        self::write('got first message again, Message count: ' . $messageCount);
        $this->assertEquals($expectedCount, $messageCount, 'got first message again, count decrements');

        // Get the third and fourth messages

        if ($expectedCount > 0) {
            $message3 = $this->restProxy->receiveSubscriptionMessage($this->topicName, $subscriptionName, $this->RECEIVE_AND_DELETE_5_SECONDS);
            $expectedCount--;
            $this->compareMessages($expectedMessages[2], $message3);
        }

        if ($expectedCount > 0) {
            $message4 = $this->restProxy->receiveSubscriptionMessage($this->topicName, $subscriptionName, $this->RECEIVE_AND_DELETE_5_SECONDS);
            $expectedCount--;
            $this->compareMessages($expectedMessages[3], $message4);
        }

        $messageCount = $this->restProxy->getSubscription($this->topicName, $subscriptionName)->getSubscriptionInfo()->getSubscriptionDescription()->getMessageCount();
        self::write('got all messages, Message count: ' . $messageCount);
        $this->assertEquals($expectedCount, $messageCount, 'got all messages');
    }
}
?>
