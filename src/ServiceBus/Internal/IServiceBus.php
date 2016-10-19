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
 * @link      https://github.com/WindowsAzure/azure-sdk-for-php
 */

namespace WindowsAzure\ServiceBus\Internal;

use Exception;
use WindowsAzure\Common\Internal\FilterableService;
use WindowsAzure\ServiceBus\Models\BrokeredMessage;
use WindowsAzure\ServiceBus\Models\ListQueuesOptions;
use WindowsAzure\ServiceBus\Models\ListRulesOptions;
use WindowsAzure\ServiceBus\Models\ListSubscriptionsOptions;
use WindowsAzure\ServiceBus\Models\ListTopicsOptions;
use WindowsAzure\ServiceBus\Models\QueueInfo;
use WindowsAzure\ServiceBus\Models\ReceiveMessageOptions;
use WindowsAzure\ServiceBus\Models\RuleInfo;
use WindowsAzure\ServiceBus\Models\SubscriptionInfo;
use WindowsAzure\ServiceBus\Models\TopicInfo;

/**
 * This class constructs HTTP requests and receive HTTP responses for Service Bus.
 *
 * @category  Microsoft
 *
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 *
 * @version   Release: 0.4.5_2016-09
 *
 * @link      https://github.com/WindowsAzure/azure-sdk-for-php
 */
interface IServiceBus extends FilterableService
{
    /**
     * Sends a brokered message. 
     * 
     * @param string          $path            The path to send message.
     * @param BrokeredMessage $brokeredMessage The brokered message.
     *
     * @throws Exception
     */
    public function sendMessage($path, BrokeredMessage $brokeredMessage);

    /**
     * Sends a queue message. 
     * 
     * @param string           $queueName       The name of the queue to send 
     *                                          message.
     * @param BrokeredMessage $brokeredMessage The brokered message.
     *
     * @throws Exception
     */
    public function sendQueueMessage($queueName, BrokeredMessage $brokeredMessage);

    /**
     * Receives a queue message. 
     * 
     * @param string                $queueName              The name of the
     *                                                      queue.
     * @param ReceiveMessageOptions $receivedMessageOptions The options to
     *                                                      receive the message.
     *
     * @throws Exception
     */
    public function receiveQueueMessage($queueName, ReceiveMessageOptions $receivedMessageOptions);

    /**
     * Receives a message. 
     * 
     * @param string                $path                  The path of the
     *                                                     message.
     * @param ReceiveMessageOptions $receiveMessageOptions The options to
     *                                                     receive the message.
     *
     * @throws Exception
     */
    public function receiveMessage($path, ReceiveMessageOptions $receiveMessageOptions);

    /**
     * Sends a brokered message to a specified topic. 
     * 
     * @param string           $topicName       The name of the topic. 
     * @param BrokeredMessage $brokeredMessage The brokered message.
     *
     * @throws Exception
     */
    public function sendTopicMessage($topicName, BrokeredMessage $brokeredMessage);

    /**
     * Receives a subscription message. 
     * 
     * @param string                $topicName             The name of the
     *                                                     topic.
     * @param string                $subscriptionName      The name of the
     *                                                     subscription.
     * @param ReceiveMessageOptions $receiveMessageOptions The options to
     *                                                     receive the subscription message.
     *
     * @throws Exception
     */
    public function receiveSubscriptionMessage(
        $topicName,
        $subscriptionName,
        ReceiveMessageOptions $receiveMessageOptions
    );

    /**
     * Unlocks a brokered message. 
     * 
     * @param BrokeredMessage $brokeredMessage The brokered message.
     *
     * @throws Exception
     */
    public function unlockMessage(BrokeredMessage $brokeredMessage);

    /**
     * Deletes a brokered message. 
     * 
     * @param BrokeredMessage $brokeredMessage The brokered message.
     *
     * @throws Exception
     */
    public function deleteMessage(BrokeredMessage $brokeredMessage);

    /**
     * Creates a queue with specified queue info. 
     * 
     * @param QueueInfo $queueInfo The information of the queue.
     *
     * @throws Exception
     */
    public function createQueue(QueueInfo $queueInfo);

    /**
     * Deletes a queue. 
     * 
     * @param string $queuePath The path of the queue.
     *
     * @throws Exception
     */
    public function deleteQueue($queuePath);

    /**
     * Gets a queue with specified path. 
     * 
     * @param string $queuePath The path of the queue.
     *
     * @throws Exception
     */
    public function getQueue($queuePath);

    /**
     * Lists a queue. 
     * 
     * @param ListQueuesOptions|null $listQueueOptions The options to list the
     *                                                 queues.
     *
     * @throws Exception
     */
    public function listQueues(ListQueuesOptions $listQueueOptions = null);

    /**
     * Creates a topic with specified topic info.  
     * 
     * @param TopicInfo $topicInfo The information of the topic.
     *
     * @throws Exception
     */
    public function createTopic(TopicInfo $topicInfo);

    /**
     * Deletes a topic with specified topic path. 
     * 
     * @param string $topicPath The path of the topic.
     *
     * @throws Exception
     */
    public function deleteTopic($topicPath);

    /**
     * Gets a topic. 
     * 
     * @param string $topicPath The path of the topic.
     *
     * @throws Exception
     */
    public function getTopic($topicPath);

    /**
     * Lists topics. 
     * 
     * @param ListTopicsOptions $listTopicsOptions The options to list
     *                                              the topics. 
     *
     * @throws Exception
     */
    public function listTopics(ListTopicsOptions $listTopicsOptions);

    /**
     * Creates a subscription with specified topic path and 
     * subscription info. 
     * 
     * @param string           $topicPath        The path of the topic.
     * @param SubscriptionInfo $subscriptionInfo The information of the
     *                                           subscription.
     *
     * @throws Exception
     */
    public function createSubscription($topicPath, SubscriptionInfo $subscriptionInfo);

    /**
     * Deletes a subscription. 
     * 
     * @param string $topicPath        The path of the topic.
     * @param string $subscriptionName The name of the subscription.
     *
     * @throws Exception
     */
    public function deleteSubscription($topicPath, $subscriptionName);

    /**
     * Gets a subscription. 
     * 
     * @param string $topicPath        The path of the topic.
     * @param string $subscriptionName The name of the subscription.
     *
     * @throws Exception
     */
    public function getSubscription($topicPath, $subscriptionName);

    /**
     * Lists subscriptions. 
     * 
     * @param string                   $topicPath                The path of 
     *                                                           the topic.
     * @param ListSubscriptionsOptions $listSubscriptionsOptions The options
     *                                                           to list the subscriptions. 
     *
     * @throws Exception
     */
    public function listSubscriptions($topicPath, ListSubscriptionsOptions $listSubscriptionsOptions);

    /**
     * Creates a rule. 
     * 
     * @param string   $topicPath        The path of the topic.
     * @param string   $subscriptionName The name of the subscription.
     * @param RuleInfo $ruleInfo         The info of the rule.
     *
     * @throws Exception
     */
    public function createRule($topicPath, $subscriptionName, RuleInfo $ruleInfo);

    /**
     * Deletes a rule. 
     * 
     * @param string $topicPath        The path of the topic.
     * @param string $subscriptionName The name of the subscription.
     * @param string $ruleName         The name of the rule.
     *
     * @throws Exception
     */
    public function deleteRule($topicPath, $subscriptionName, $ruleName);

    /**
     * Gets a rule. 
     * 
     * @param string $topicPath        The path of the topic.
     * @param string $subscriptionName The name of the subscription.
     * @param string $ruleName         The name of the rule.
     *
     * @throws Exception
     */
    public function getRule($topicPath, $subscriptionName, $ruleName);

    /**
     * Lists rules. 
     * 
     * @param string           $topicPath        The path of the topic.
     * @param string           $subscriptionName The name of the subscription.
     * @param ListRulesOptions $listRulesOptions The options to list the rules.
     *
     * @throws Exception
     */
    public function listRules($topicPath, $subscriptionName, ListRulesOptions $listRulesOptions);
}
