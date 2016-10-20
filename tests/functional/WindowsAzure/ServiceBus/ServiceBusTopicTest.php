<?php

/**
 * LICENSE: Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 * http://www.apache.org/licenses/LICENSE-2.0.
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
 *
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 *
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */

namespace Tests\functional\WindowsAzure\ServiceBus;


use WindowsAzure\Common\Internal\Resources;
use WindowsAzure\ServiceBus\Models\BrokeredMessage;
use WindowsAzure\ServiceBus\Models\ListTopicsOptions;
use WindowsAzure\ServiceBus\Models\ReceiveMessageOptions;
use WindowsAzure\ServiceBus\models\RuleInfo;
use WindowsAzure\ServiceBus\Models\SqlFilter;
use WindowsAzure\ServiceBus\Models\SubscriptionInfo;
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

    /**
     * @covers \WindowsAzure\ServiceBus\ServiceBusRestProxy::deleteTopic
     */
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

        $expSub1Messages = $messages;
        $expSub2Messages = [$messages[0], $messages[1]];
        $expSub3Messages = [$messages[1], $messages[2], $messages[3]];
        // The rules for subscription 4 add and remove custom properties.
        $expCustomProps4 = [];
        $expSub4Messages = [];
        for ($i = 1; $i <= 4; ++$i) {
            $tmp = $this->getCustomProperties($i);
            $tmp['trueRuleA'] = true;
            $tmp['actionGuid'] = 'GUID';
            $tmp['actionDouble'] = 3.5;
            unset($tmp['int']);
            $expCustomProps4[] = $tmp;
            $expSub4Messages[] = $messages[$i - 1];

            $tmp = $this->getCustomProperties($i);
            $tmp['trueRuleB'] = true;
            $tmp['actionString'] = 'hello';
            $tmp['actionStringSingleQuote'] = '\'';
            $tmp['actionStringDoubleQuote'] = '"';
            $tmp['actionStringReverseSolidus'] = '\\';
            $tmp['actionStringSlashN'] = "\n";
            $tmp['actionStringTab'] = "\t";
            // Null valued properties are not returned
            $date = new \DateTime('1999-12-25 00:00:00 GMT');
            $date = gmdate(Resources::AZURE_DATE_FORMAT, $date->getTimestamp());
            $tmp['test'] = $date;
            $tmp['actionNewDate'] = '1999-12-25';
            unset($tmp['float']);
            $expCustomProps4[] = $tmp;
            $expSub4Messages[] = $messages[$i - 1];
        }

        $this->getMessageFromSub($expSub1Messages, $this->subscriptionName1);
        $this->getMessageFromSub($expSub2Messages, $this->subscriptionName2);
        $this->getMessageFromSub($expSub3Messages, $this->subscriptionName3);
        // this always fails in the current version of SDK
        //$this->getMessageFromSub($expSub4Messages, $this->subscriptionName4, $expCustomProps4);

        self::write('Deleting topic '.$this->topicName);
        $this->serviceBusWrapper->deleteTopic($this->topicName);
        self::write('Deleted topic '.$this->topicName);
    }

    /**
     * @covers \WindowsAzure\ServiceBus\ServiceBusRestProxy::createTopic
     * @covers \WindowsAzure\ServiceBus\ServiceBusRestProxy::deleteTopic
     * @covers \WindowsAzure\ServiceBus\ServiceBusRestProxy::getTopic
     * @covers \WindowsAzure\ServiceBus\ServiceBusRestProxy::listTopics
     */
    private function setupTopic()
    {
        $options = new ListTopicsOptions();
        $options->setSkip(20);
        $options->setTop(2);
        $topics = $this->serviceBusWrapper->listTopics($options)->getTopicInfos();
        foreach ($topics as $topic) {
            self::write('Topic name is '.$topic->getTitle());
        }

        self::write('checking if topic already exists '.$this->topicName);
        try {
            $this->serviceBusWrapper->getTopic($this->topicName);
            self::write('Topic already exists deleting it');
            $this->serviceBusWrapper->deleteTopic($this->topicName);
        } catch (\Exception $e) {
            self::write('could not get an existing topic ('.$e->getCode().'), proceeding...');
        }

        $topic = new TopicInfo($this->topicName);
        $topic->setEnableBatchedOperations(true);
        $topic->setMaxSizeInMegabytes(1024);
        $topic->setRequiresDuplicateDetection(false);

        self::write('Creating topic '.$this->topicName);

        $this->serviceBusWrapper->createTopic($topic);
        $this->serviceBusWrapper->getTopic($this->topicName);
    }

    /**
     * @covers \WindowsAzure\ServiceBus\ServiceBusRestProxy::createSubscription
     */
    private function setupSubscriptions()
    {
        $s = new SubscriptionInfo($this->subscriptionName1);
        $s->setDeadLetteringOnFilterEvaluationExceptions(true);
        $s->setDeadLetteringOnMessageExpiration(true);
        $s->setEnableBatchedOperations(true);
        $s->setMaxDeliveryCount(10);
        $s->setRequiresSession(false);
        $this->serviceBusWrapper->createSubscription($this->topicName, $s);

        $this->serviceBusWrapper->createSubscription($this->topicName, new SubscriptionInfo($this->subscriptionName2));
        $this->serviceBusWrapper->createSubscription($this->topicName, new SubscriptionInfo($this->subscriptionName3));
        $this->serviceBusWrapper->createSubscription($this->topicName, new SubscriptionInfo($this->subscriptionName4));
    }

    /**
     * @covers \WindowsAzure\ServiceBus\ServiceBusRestProxy::createRule
     * @covers \WindowsAzure\ServiceBus\ServiceBusRestProxy::deleteRule
     * @covers \WindowsAzure\ServiceBus\ServiceBusRestProxy::listRules
     */
    private function setupRules()
    {
        // See this topic for more information on what SQL filter strings are allowed:
        // http://msdn.microsoft.com/en-us/library/microsoft.servicebus.messaging.sqlfilter.sqlexpression.aspx
        // See this topic for more information on what SQL action strings are allowed:
        // http://msdn.microsoft.com/en-us/library/microsoft.servicebus.messaging.sqlruleaction.sqlexpression

        // subscriptionName1 is left unchanged

        // subscriptionName2 gets a rule that works on integers
        $this->serviceBusWrapper->deleteRule($this->topicName, $this->subscriptionName2, '$Default');
        $rule2 = new RuleInfo('intType');
        $rule2->withSqlFilter('int < 53');
        $this->serviceBusWrapper->createRule($this->topicName, $this->subscriptionName2, $rule2);

        // subscriptionName3 gets a rule that works on strings and booleans
        $this->serviceBusWrapper->deleteRule($this->topicName, $this->subscriptionName3, '$Default');
        $rule3 = new RuleInfo('strAndBoolRule');
        $rule3->withSqlFilter('name LIKE \'%3\' OR user.even = TRUE');
        $this->serviceBusWrapper->createRule($this->topicName, $this->subscriptionName3, $rule3);

        // subscriptionName4 gets two rules to enable duplicate messages

        $lst = $this->serviceBusWrapper->listRules($this->topicName, $this->subscriptionName4)->getRuleInfos();
        $rule4a = $lst[0];
        $rule4a->withSqlRuleAction(
                'SET trueRuleA=TRUE; '.
                'SET actionGuid=newid(); '.
                'SET actionDouble=3.5; '.
                'REMOVE int;');
        $this->serviceBusWrapper->deleteRule($this->topicName, $this->subscriptionName4, $rule4a->getTitle());
        $this->serviceBusWrapper->createRule($this->topicName, $this->subscriptionName4, $rule4a);

        $rule4b = new RuleInfo('trueRuleB');
        $rule4b->withTrueFilter();
        $action =
                'SET trueRuleB=TRUE; '.
                'SET actionString=\'hello\'; '.
                // SQL uses '' to represent ' in strings.
                'SET actionStringSingleQuote=\'\'\'\'; '.
                'SET actionStringDoubleQuote=\'"\'; '.
                // ReverseSolidus is just \
                'SET actionStringReverseSolidus=\'\\\'; '.
                'SET actionStringSlashN=\''."\n".'\'; '.
                'SET actionStringTab=\''."\t".'\'; '.
                'SET actionNull=null; '.
                'SET test=\'1999-12-25\'; '.
                'SET actionNewDate=\'1999-12-25\'; '.
                'REMOVE float;';
        $rule4b->withSqlRuleAction($action);

        $this->serviceBusWrapper->createRule($this->topicName, $this->subscriptionName4, $rule4b);

        $this->showRules($this->subscriptionName1);
        $this->showRules($this->subscriptionName2);
        $this->showRules($this->subscriptionName3);
        $this->showRules($this->subscriptionName4);
    }

    /**
     * @covers \WindowsAzure\ServiceBus\ServiceBusRestProxy::listRules
     */
    private function showRules($subName)
    {
        self::write('Subscription: '.$subName);
        $lst = $this->serviceBusWrapper->listRules($this->topicName, $subName)->getRuleInfos();
        foreach ($lst as $item) {
            self::write('  Rule: '.$item->getTitle());
            $filter = $item->getFilter();
            self::write('    Filter: '.get_class($filter));
            if ($filter instanceof SqlFilter) {
                self::write('      '.$filter->getSqlExpression());
            }
        }
    }

    /**
     * @covers \WindowsAzure\ServiceBus\ServiceBusRestProxy::sendTopicMessage
     */
    private function sendMessages()
    {
        $messages = [];
        $messages[] = $this->createIssueMessage('1', 'First  message information', 'label1', 1);
        $messages[] = $this->createIssueMessage('2', 'Second message information', 'label2', 2);
        $messages[] = $this->createIssueMessage('3', 'Third  message information', 'label3', 3);
        $messages[] = $this->createIssueMessage('4', 'Fourth message information', 'label4', 4);
        foreach ($messages as $message) {
            $this->serviceBusWrapper->sendTopicMessage($this->topicName, $message);
            $data = $message->getBody();
            self::write('Message sent with id: '.$message->getMessageId().' Body of $message '.$data);
        }

        // Seems like it takes some time to the subscribers to get all the messages.
        // So just take a 10 second pause.
        sleep(10);

        return $messages;
    }

    private function createIssueMessage($issueId, $issueBody, $label, $i)
    {
        $message = new BrokeredMessage($issueBody);
        $message->setContentType('text/xml');
        $message->setLabel($label);
        $message->setReplyTo('1@1.com');
        $message->setMessageId($issueId);

        $customProperties = $this->getCustomProperties($i);
        foreach ($customProperties as $key => $value) {
            $message->setProperty($key, $value);
        }

        return $message;
    }

    /**
     * @covers \WindowsAzure\ServiceBus\ServiceBusRestProxy::getSubscription
     * @covers \WindowsAzure\ServiceBus\ServiceBusRestProxy::getTopic
     */
    private function getMessageCounts()
    {
        $topic = $this->serviceBusWrapper->getTopic($this->topicName);
        $this->assertEquals($this->topicName, $topic->getTitle(), '$topic->getTopicInfo->getTitle');

        // Subscription 1
        $subscription1 = $this->serviceBusWrapper->getSubscription($this->topicName, $this->subscriptionName1);
        self::write('Subscription 1 message count: '.$subscription1->getMessageCount());
        $this->assertEquals(4, $subscription1->getMessageCount(), 'Subscription 1 message count');

        // Subscription 2
        $subscription2 = $this->serviceBusWrapper->getSubscription($this->topicName, $this->subscriptionName2);
        self::write('Subscription 2 message count '.$subscription2->getMessageCount());
        $this->assertEquals(2, $subscription2->getMessageCount(), 'Subscription 2 message count');

        // Subscription 3
        $subscription3 = $this->serviceBusWrapper->getSubscription($this->topicName, $this->subscriptionName3);
        self::write('Subscription 3 message count '.$subscription3->getMessageCount());
        $this->assertEquals(3, $subscription3->getMessageCount(), 'Subscription 3 message count');

        // Subscription 4
        $subscription4 = $this->serviceBusWrapper->getSubscription($this->topicName, $this->subscriptionName4);
        self::write('Subscription 4 message count '.$subscription4->getMessageCount());
        $this->assertEquals(8, $subscription4->getMessageCount(), 'Subscription 4 message count');
    }

    /**
     * @covers \WindowsAzure\ServiceBus\ServiceBusRestProxy::getSubscription
     * @covers \WindowsAzure\ServiceBus\ServiceBusRestProxy::receiveSubscriptionMessage
     * @covers \WindowsAzure\ServiceBus\ServiceBusRestProxy::unlockMessage
     */
    private function getMessageFromSub($expectedMessages, $subscriptionName, $expCustomProps = null)
    {
        $expectedCount = count($expectedMessages);
        if (is_null($expCustomProps)) {
            $expCustomProps = [];
            while (count($expCustomProps) < $expectedCount) {
                $expCustomProps[] = null;
            }
        }
        self::write('==============================================');
        self::write('Getting messages from subscription '.$subscriptionName.
                ', expecting '.$expectedCount.' messages');

        // Peek the first message

        $message1 = $this->serviceBusWrapper->receiveSubscriptionMessage($this->topicName, $subscriptionName, $this->PEEK_LOCK);
        $this->compareMessages($expectedMessages[0], $message1, $expCustomProps[0]);

        $messageCount = $this->serviceBusWrapper->getSubscription($this->topicName, $subscriptionName)->getMessageCount();
        self::write('Peek locked first message, Message count: '.$messageCount);
        $this->assertEquals($expectedCount, $messageCount, 'Peek locked first message, count should not change');

        // Get the second message

        $message2 = $this->serviceBusWrapper->receiveSubscriptionMessage($this->topicName, $subscriptionName, $this->RECEIVE_AND_DELETE_5_SECONDS);
        --$expectedCount;
        $this->compareMessages($expectedMessages[1], $message2, $expCustomProps[1]);

        $messageCount = $this->serviceBusWrapper->getSubscription($this->topicName, $subscriptionName)->getMessageCount();
        self::write('RECEIVE_AND_DELETE second message, Message count: '.$messageCount);
        $this->assertEquals($expectedCount, $messageCount, 'RECEIVE_AND_DELETE second message, count decrements');

        // Unlock then get the first message

        $this->serviceBusWrapper->unlockMessage($message1);
        $message1again = $this->serviceBusWrapper->receiveSubscriptionMessage($this->topicName, $subscriptionName, $this->RECEIVE_AND_DELETE_5_SECONDS);
        --$expectedCount;
        $this->compareMessages($expectedMessages[0], $message1again, $expCustomProps[0]);

        $messageCount = $this->serviceBusWrapper->getSubscription($this->topicName, $subscriptionName)->getMessageCount();
        self::write('got first message again, Message count: '.$messageCount);
        $this->assertEquals($expectedCount, $messageCount, 'got first message again, count decrements');

        // Get the third and fourth messages

        $messageId = 2;
        while ($expectedCount > 0) {
            $message3 = $this->serviceBusWrapper->receiveSubscriptionMessage($this->topicName, $subscriptionName);
            --$expectedCount;
            self::write('Got message #'.$messageId.', Message count: '.$messageCount);
            $this->compareMessages($expectedMessages[$messageId], $message3, $expCustomProps[$messageId]);
            ++$messageId;
        }

        $messageCount = $this->serviceBusWrapper->getSubscription($this->topicName, $subscriptionName)->getMessageCount();
        self::write('got all messages, Message count: '.$messageCount);
        $this->assertEquals($expectedCount, $messageCount, 'got all messages');
    }
}
