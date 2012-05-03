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
 * @author    azurephpsdk@microsoft.com
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
use WindowsAzure\Resources;
use WindowsAzure\Utilities;
use WindowsAzure\Validate;

/**
 * This class constructs HTTP requests and receive HTTP responses for service bus.
 *
 * @category  Microsoft
 * @package   WindowsAzure\Services\ServiceBus
 * @author    azurephpsdk@microsoft.com
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
class ServiceBusRestProxy extends ServiceRestProxy 
{
    /**
     * Creates a ServiceBusRestProxy with specified parameter. 
     * 
     * @param IHttpClient $channel
     * @param string $uri
     * @param ISerializer $dataSerializer 
     */
    public function __construct($channel, $uri, $dataSerializer)
    {
        parent::__construct($channel, $uri, '', $dataSerializer);
    }
    
    /**
     * Sends a brokered message. 
     * 
     * @param type $path
     * @param type $brokeredMessage
     * @throws Exception 
     */
    public function sendMessage($path, $brokeredMessage) {
        throw new Exception('This method hasn\'t been implemented yet.');
    }

    /**
     * Sends a queue message. 
     * @param string $path
     * @param \BrokeredMessage $brokeredMessage
     * @throws Exception 
     */
    public function sendQueueMessage($path, $brokeredMessage) {
        throw new Exception('This method hasn\'t been implemented yet.');
    }
    
    /**
     * Receives a queue message. 
     * 
     * @param string $queuePath
     * @param \ReceivedMessageOptions $receivedMessageOptions
     * @throws Exception 
     */
    public function receiveQueueMessage($queuePath, $receivedMessageOptions) {
        throw new Exception('This method hasn\'t been implemented yet.');
    }

    /**
     * Receives a message. 
     * 
     * @param string $path
     * @param \ReceivedMessageOptions $receiveMessageOptions
     * @throws Exception 
     */
    public function receiveMessage($path, $receiveMessageOptions) {
        throw new Exception('This method hasn\'t been implemented yet.');
    }

    /**
     * Sends a brokered message to a specified topic. 
     * 
     * @param string $topicName
     * @param \BrokeredMessage $brokeredMessage
     * @throws Exception 
     */
    public function sendToMessage($topicName, $brokeredMessage) {
        throw new Exception('This method hasn\'t been implemented yet.');
    } 

    /**
     * Receives a subscription message. 
     * 
     * @param string $topicName
     * @param string $subscriptionName
     * @param \ReceiveMessageOptions $receiveMessageOptions
     * @throws Exception 
     */
    public function receiveSubscriptionMessage(
        $topicName, 
        $subscriptionName, 
        $receiveMessageOptions
    ) {
        throw new Exception('This method hasn\'t been implemented yet.');
    }

    /**
     * Unlocks a brokered message. 
     * 
     * @param \BrokeredMessage $brokeredMessage
     * @throws Exception 
     */
    public function unlockMessage($brokeredMessage) {
        throw new Exception('This method hasn\'t been implemented yet.');
    }
    
    /**
     * Deletes a brokered message. 
     * 
     * @param \BrokeredMessage $brokeredMessage
     * @throws Exception 
     */
    public function deleteMessage($brokeredMessage) {
        throw new Exception('This method hasn\'t been implemented yet.');
    }
   
    /**
     * Creates a queue with specified queue info. 
     * 
     * @param \QueueInfo $queueInfo
     * @throws Exception 
     */
    public function createQueue($queueInfo) {
        throw new Exception('This method hasn\'t been implemented yet.');
    } 

    /**
     * Deletes a queue. 
     * 
     * @param \QueuePath $queuePath
     * @throws Exception 
     */
    public function deleteQueue($queuePath) {
        throw new Exception('This method hasn\'t been implemented yet.');
    }

    /**
     * Gets a queue with specified path. 
     * 
     * @param string $queuePath
     * @throws Exception 
     */
    public function getQueue($queuePath) {
        throw new Exception('This method hasn\'t been implemented yet.');
    }

    /**
     * Lists a queue. 
     * 
     * @param type $listQueueOptions
     * @throws Exception 
     */
    public function listQueues($listQueueOptions) {
        throw new Exception('This method hasn\'t been implemented yet.');
    }

    /**
     * Creates a topic with specified topic info.  
     * 
     * @param \TopicInfo $topicInfo
     * @throws Exception 
     */
    public function createTopic($topicInfo) {
        throw new Exception('This method hasn\'t been implemented yet.');
    }

    /**
     * Deletes a topic with specified topic path. 
     * 
     * @param string $topicPath
     * @throws Exception 
     */
    public function deleteTopic($topicPath) {
        throw new Exception('This method hasn\'t been implemented yet.');
    }
    
    /**
     * Gets a topic. 
     * 
     * @param string $topicPath
     * @throws Exception 
     */
    public function getTopic($topicPath) {
        throw new Exception('This method hasn\'t been implemented yet.');
    }
    
    /**
     * Lists topics. 
     * 
     * @param type $listTopicsOptions
     * @throws Exception 
     */
    public function listTopics($listTopicsOptions) {
        throw new Exception('This method hasn\'t been implemented yet.');
    }

    /**
     * Creates a subscription with specified topic path and 
     * subscription info. 
     * 
     * @param type $topicPath
     * @param type $subscriptionInfo
     * @throws Exception 
     */
    public function createSubscription($topicPath, $subscriptionInfo) {
        throw new Exception('This method hasn\'t been implemented yet.');
    }

    /**
     * Deletes a subscription. 
     * 
     * @param string $topicPath
     * @param string $subscriptionName
     * @throws Exception 
     */
    public function deleteSubscription($topicPath, $subscriptionName) {
        throw new Exception('This method hasn\'t been implemented yet.');
    }
    
    /**
     * Gets a subscription. 
     * 
     * @param string $topicPath
     * @param string $subscriptionName
     * @throws Exception 
     */
    public function getSubscription($topicPath, $subscriptionName) {
        throw new Exception('This method hasn\'t been implemented yet.');
    }

    /**
     * Lists subscription. 
     * 
     * @param string $topicPath
     * @param \ListSubscriptionOptions $listSubscriptionOptions
     * @throws Exception 
     */
    public function listSubscription($topicPath, $listSubscriptionOptions) {
        throw new Exception('This method hasn\'t been implemented yet.');
    }

    /**
     * Creates a rule. 
     * 
     * @param string $topicPath
     * @param string $subscriptionName
     * @param \RuleInfo $ruleInfo
     * @throws Exception 
     */
    public function createRule($topicPath, $subscriptionName, $ruleInfo) {
        throw new Exception('This method hasn\'t been implemented yet.');
    }

    /**
     * Deletes a rule. 
     * 
     * @param string $topicPath
     * @param string $subscriptionName
     * @param string $ruleName
     * @throws Exception 
     */
    public function deleteRule($topicPath, $subscriptionName, $ruleName) {
        throw new Exception('This method hasn\'t been implemented yet.');
    }

    /**
     * Gets a rule. 
     * 
     * @param string $topicPath
     * @param string $subscriptionName
     * @param string $ruleName
     * @throws Exception 
     */
    public function getRule($topicPath, $subscriptionName, $ruleName) {
        throw new Exception('This method hasn\'t been implemented yet.');
    }

    /**
     * Lists rules. 
     * 
     * @param string $topicPath
     * @param string $subscriptionName
     * @param \ListRulesOptions $listRulesOptions
     * @throws Exception 
     */
    public function listRules($topicPath, $subscriptionName, $listRulesOptions) {
        throw new Exception('This method hasn\'t been implemented yet.');
    }
    
}
