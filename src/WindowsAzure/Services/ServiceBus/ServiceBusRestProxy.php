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
 * @package   WindowsAzure\Services\Queue
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */

namespace WindowsAzure\Services\ServiceBus;
use WindowsAzure\Core\Http\IHttpClient;
use WindowsAzure\Core\Http\Url;
use WindowsAzure\Core\WindowsAzureUtilities;
use WindowsAzure\Services\Core\Models\GetServicePropertiesResult;
use WindowsAzure\Services\Core\Models\ServiceProperties;
use WindowsAzure\Services\Core\ServiceRestProxy;
use WindowsAzure\Services\ServiceBus\IServiceBus;
use WindowsAzure\Resources;
use WindowsAzure\Utilities;
use WindowsAzure\Validate;

/**
 * This class constructs HTTP requests and receive HTTP responses for service bus.
 *
 * @category  Microsoft
 * @package   WindowsAzure\Services\ServiceBus
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
class ServiceBusRestProxy extends ServiceRestProxy implements IServiceBus
{
    /**
     * Creates a ServiceBusRestProxy with specified parameter. 
     * 
     * @param IHttpClient $channel        The channel to communicate. 
     * @param string      $uri            The URI of service bus service.
     * @param ISerializer $dataSerializer The serializer of the service bus.
     *
     * @return none
     */
    public function __construct($channel, $uri, $dataSerializer)
    {
        parent::__construct($channel, $uri, '', $dataSerializer);
    }
    
    /**
     * Sends a brokered message. 
     * 
     * @param type $path            The path to send message. 
     * @param type $brokeredMessage The brokered message. 
     *
     * @throws Exception 
     * @return none
     */
    public function sendMessage($path, $brokeredMessage)
    {
        throw new Exception(Resources::NOT_IMPLEMENTED_MSG);
    }

    /**
     * Sends a queue message. 
     * 
     * @param string           $path            The path to send message.
     * @param \BrokeredMessage $brokeredMessage The brokered message. 
     *
     * @throws Exception 
     * @return none
     */
    public function sendQueueMessage($path, $brokeredMessage)
    {
        throw new Exception(Resources::NOT_IMPLEMENTED_MSG);
    }
    
    /**
     * Receives a queue message. 
     * 
     * @param string                  $queuePath              The path to the
     * queue. 
     * @param \ReceivedMessageOptions $receivedMessageOptions The options to 
     * receive the message. 
     *
     * @throws Exception 
     * @return none
     */
    public function receiveQueueMessage($queuePath, $receivedMessageOptions)
    {
        throw new Exception(Resources::NOT_IMPLEMENTED_MSG);
    }

    /**
     * Receives a message. 
     * 
     * @param string                  $path                  The path of the 
     * message. 
     * @param \ReceivedMessageOptions $receiveMessageOptions The options to 
     * receive the message. 
     *
     * @throws Exception 
     * @return none
     */
    public function receiveMessage($path, $receiveMessageOptions)
    {
        throw new Exception(Resources::NOT_IMPLEMENTED_MSG);
    }

    /**
     * Sends a brokered message to a specified topic. 
     * 
     * @param string           $topicName       The name of the topic. 
     * @param \BrokeredMessage $brokeredMessage The brokered message. 
     *
     * @throws Exception 
     * @return none
     */
    public function sendTopicMessage($topicName, $brokeredMessage)
    {
        throw new Exception(Resources::NOT_IMPLEMENTED_MSG);
    } 

    /**
     * Receives a subscription message. 
     * 
     * @param string                 $topicName             The name of the 
     * topic.
     * @param string                 $subscriptionName      The name of the 
     * subscription.
     * @param \ReceiveMessageOptions $receiveMessageOptions The options to 
     * receive the subscription message. 
     *
     * @throws Exception 
     * @return none
     */
    public function receiveSubscriptionMessage(
        $topicName, 
        $subscriptionName, 
        $receiveMessageOptions
    ) {
        throw new Exception(Resources::NOT_IMPLEMENTED_MSG);
    }

    /**
     * Unlocks a brokered message. 
     * 
     * @param \BrokeredMessage $brokeredMessage The brokered message. 
     *
     * @throws Exception 
     * @return none
     */
    public function unlockMessage($brokeredMessage)
    {
        throw new Exception(Resources::NOT_IMPLEMENTED_MSG);
    }
    
    /**
     * Deletes a brokered message. 
     * 
     * @param \BrokeredMessage $brokeredMessage The borkered message.
     *
     * @throws Exception 
     * @return none
     */
    public function deleteMessage($brokeredMessage)
    {
        throw new Exception(Resources::NOT_IMPLEMENTED_MSG);
    }
   
    /**
     * Creates a queue with specified queue info. 
     * 
     * @param \QueueInfo $queueInfo The information of the queue.
     *
     * @throws Exception 
     * @return none
     */
    public function createQueue($queueInfo)
    {
        throw new Exception(Resources::NOT_IMPLEMENTED_MSG);
    } 

    /**
     * Deletes a queue. 
     * 
     * @param string $queuePath The path of the queue.
     *
     * @throws Exception 
     * @return none
     */
    public function deleteQueue($queuePath)
    {
        Validate::isString($queuePath, 'queuePath');
        Validate::notNullOrEmpty($queuePath, 'queuePath');
        
        $method      = Resources::HTTP_DELETE;
        $headers     = array();
        $queryParams = array();
        $postParams  = array();
        $path        = $queuePath;
        $statusCode  = Resources::STATUS_CREATED;
        
        $this->send(
            $method, 
            $headers, 
            $queryParams, 
            $postParams, 
            $path, 
            $statusCode
        );

    }

    /**
     * Gets a queue with specified path. 
     * 
     * @param string $queuePath The path of the queue.
     *
     * @throws Exception 
     * @return none
     */
    public function getQueue($queuePath)
    {
        throw new Exception(Resources::NOT_IMPLEMENTED_MSG);
    }

    /**
     * Lists a queue. 
     * 
     * @param \ListQueueOptions $listQueueOptions The options to list the 
     * queues.
     *
     * @throws Exception 
     * @return none
     */
    public function listQueues($listQueueOptions)
    {
        throw new Exception(Resources::NOT_IMPLEMENTED_MSG);
    }

    /**
     * Creates a topic with specified topic info.  
     * 
     * @param \TopicInfo $topicInfo The information of the topic. 
     *
     * @throws Exception 
     * @return none
     */
    public function createTopic($topicInfo)
    {
        throw new Exception(Resources::NOT_IMPLEMENTED_MSG);
    }

    /**
     * Deletes a topic with specified topic path. 
     * 
     * @param string $topicPath The path of the topic.
     *
     * @throws Exception 
     * @return none
     */
    public function deleteTopic($topicPath)
    {
        throw new Exception(Resources::NOT_IMPLEMENTED_MSG);
    }
    
    /**
     * Gets a topic. 
     * 
     * @param string $topicPath The path of the topic.
     *
     * @throws Exception 
     * @return none
     */
    public function getTopic($topicPath) 
    {
        throw new Exception(Resources::NOT_IMPLEMENTED_MSG);
    }
    
    /**
     * Lists topics. 
     * 
     * @param \ListTopicsOptions $listTopicsOptions The options to list 
     * the topics. 
     *
     * @throws Exception 
     * @return none 
     */
    public function listTopics($listTopicsOptions) 
    {
        throw new Exception(Resources::NOT_IMPLEMENTED_MSG);
    }

    /**
     * Creates a subscription with specified topic path and 
     * subscription info. 
     * 
     * @param string            $topicPath        The path of the topic.
     * @param \SubscriptionInfo $subscriptionInfo The information of the 
     * subscription.
     *
     * @throws Exception 
     * @return none
     */
    public function createSubscription($topicPath, $subscriptionInfo) 
    {
        throw new Exception(Resources::NOT_IMPLEMENTED_MSG);
    }

    /**
     * Deletes a subscription. 
     * 
     * @param string $topicPath        The path of the topic.
     * @param string $subscriptionName The name of the subscription.
     *
     * @throws Exception 
     * @return none
     */
    public function deleteSubscription($topicPath, $subscriptionName) 
    {
        throw new Exception(Resources::NOT_IMPLEMENTED_MSG);
    }
    
    /**
     * Gets a subscription. 
     * 
     * @param string $topicPath        The path of the topic.
     * @param string $subscriptionName The name of the subscription.
     *
     * @throws Exception 
     * @return none 
     */
    public function getSubscription($topicPath, $subscriptionName) 
    {
        throw new Exception(Resources::NOT_IMPLEMENTED_MSG);
    }

    /**
     * Lists subscription. 
     * 
     * @param string                   $topicPath               The path of 
     * the topic.
     * @param \ListSubscriptionOptions $listSubscriptionOptions The options
     * to list the subscription. 
     *
     * @throws Exception 
     * @return none
     */
    public function listSubscription($topicPath, $listSubscriptionOptions) 
    {
        throw new Exception(Resources::NOT_IMPLEMENTED_MSG);
    }

    /**
     * Creates a rule. 
     * 
     * @param string    $topicPath        The path of the topic.
     * @param string    $subscriptionName The name of the subscription. 
     * @param \RuleInfo $ruleInfo         The info of the rule.
     *
     * @throws Exception 
     * @return none
     */
    public function createRule($topicPath, $subscriptionName, $ruleInfo)
    {
        throw new Exception(Resources::NOT_IMPLEMENTED_MSG);
    }

    /**
     * Deletes a rule. 
     * 
     * @param string $topicPath        The path of the topic.
     * @param string $subscriptionName The name of the subscription.
     * @param string $ruleName         The name of the rule.
     *
     * @throws Exception 
     * @return none
     */
    public function deleteRule($topicPath, $subscriptionName, $ruleName) 
    {
        throw new Exception(Resources::NOT_IMPLEMENTED_MSG);
    }

    /**
     * Gets a rule. 
     * 
     * @param string $topicPath        The path of the topic.
     * @param string $subscriptionName The name of the subscription.
     * @param string $ruleName         The name of the rule.
     *
     * @throws Exception 
     * @return none
     */
    public function getRule($topicPath, $subscriptionName, $ruleName) 
    {
        throw new Exception(Resources::NOT_IMPLEMENTED_MSG);
    }

    /**
     * Lists rules. 
     * 
     * @param string            $topicPath        The path of the topic.
     * @param string            $subscriptionName The name of the subscription.
     * @param \ListRulesOptions $listRulesOptions The options to list the rules.
     *
     * @throws Exception 
     * @return none
     */
    public function listRules($topicPath, $subscriptionName, $listRulesOptions) 
    {
        throw new Exception(Resources::NOT_IMPLEMENTED_MSG);
    }
    
}
