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
 * @package   WindowsAzure\ServiceBus
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */

namespace WindowsAzure\ServiceBus;
use WindowsAzure\Common\Internal\ServiceRestProxy;
use WindowsAzure\Common\Internal\Http\HttpCallContext;
use WindowsAzure\ServiceBus\Internal\Atom\Content;
use WindowsAzure\ServiceBus\Internal\Atom\Entry;
use WindowsAzure\ServiceBus\Internal\Atom\Feed;
use WindowsAzure\ServiceBus\Internal\IServiceBus;
use WindowsAzure\ServiceBus\Models\BrokeredMessage;
use WindowsAzure\ServiceBus\Models\BrokerProperties;
use WindowsAzure\ServiceBus\Models\CreateQueueResult;
use WindowsAzure\ServiceBus\Models\CreateRuleResult;
use WindowsAzure\ServiceBus\Models\CreateTopicResult;
use WindowsAzure\ServiceBus\Models\CreateSubscriptionResult;
use WindowsAzure\ServiceBus\Models\GetQueueResult;
use WindowsAzure\ServiceBus\Models\GetRuleResult;
use WindowsAzure\ServiceBus\Models\GetSubscriptionResult;
use WindowsAzure\ServiceBus\Models\GetTopicResult;
use WindowsAzure\ServiceBus\Models\ListSubscriptionsResult;
use WindowsAzure\ServiceBus\Models\ListTopicsResult;
use WindowsAzure\ServiceBus\Models\ListRulesResult;
use WindowsAzure\ServiceBus\Models\QueueDescription;
use WindowsAzure\ServiceBus\Models\QueueInfo;
use WindowsAzure\ServiceBus\Models\RuleDescription;
use WindowsAzure\ServiceBus\Models\RuleInfo;
use WindowsAzure\ServiceBus\Models\SubscriptionDescription;
use WindowsAzure\ServiceBus\Models\SubscriptionInfo;
use WindowsAzure\ServiceBus\Models\TopicDescription;
use WindowsAzure\ServiceBus\Models\TopicInfo;
use WindowsAzure\Common\Internal\Resources;
use WindowsAzure\Common\Internal\Utilities;
use WindowsAzure\Common\Internal\Validate;

/**
 * This class constructs HTTP requests and receive HTTP responses for service bus.
 *
 * @category  Microsoft
 * @package   WindowsAzure\ServiceBus
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
     * @return none
     */
    public function sendMessage($path, $brokeredMessage)
    {
        $httpCallContext = new HttpCallContext();
        $httpCallContext->setMethod(Resources::HTTP_POST);
        $httpCallContext->addStatusCode(Resources::STATUS_CREATED);
        $httpCallContext->setPath($path);
        $contentType = $brokeredMessage->getContentType();

        if (!is_null($contentType))
        {
            $httpCallContext->addHeader(
                Resources::CONTENT_TYPE,
                $contentType
            );
        }
        
        $brokerProperties = $brokeredMessage->getBrokerProperties();
        if (!is_null($brokerProperties))
        {
            $httpCallContext->addHeader(
                Resources::BROKER_PROPERTIES,
                $brokerProperties->toString()
            );
        } 
        $customProperties = $brokeredMessage->getProperties();

        if (!empty($customProperties))
        {
            foreach ($customProperties as $key => $value)
            {
                $httpCallContext->addHeader($key, $value);
                    
            }
        }

        $httpCallContext->setBody($brokeredMessage->getBody());
        $this->sendContext($httpCallContext);
    }

    /**
     * Sends a queue message. 
     * 
     * @param string           $path            The path to send message.
     * @param \BrokeredMessage $brokeredMessage The brokered message. 
     *
     * @return none
     */
    public function sendQueueMessage($path, $brokeredMessage)
    {
        $this->sendMessage($path, $brokeredMessage);
    }
    
    /**
     * Receives a queue message. 
     * 
     * @param string                $queuePath             The path of the
     * queue. 
     * @param ReceiveMessageOptions $receiveMessageOptions The options to 
     * receive the message. 
     *
     * @return BrokeredMessage
     */
    public function receiveQueueMessage($queuePath, $receiveMessageOptions)
    {
        $queueMessagePath = sprintf(Resources::QUEUE_MESSAGE_PATH, $queuePath);
        return $this->receiveMessage(
            $queueMessagePath, 
            $receiveMessageOptions
        );
    }

    /**
     * Receives a message. 
     * 
     * @param string                 $path                  The path of the 
     * message. 
     * @param ReceivedMessageOptions $receiveMessageOptions The options to 
     * receive the message. 
     *
     * @return BrokeredMessage
     */
    public function receiveMessage($path, $receiveMessageOptions)
    {
        $httpCallContext = new HttpCallContext();
        $httpCallContext->setPath($path);
        $httpCallContext->addStatusCode(Resources::STATUS_OK);
        $httpCallContext->addStatusCode(Resources::STATUS_CREATED);
        $timeout = $receiveMessageOptions->getTimeout();
        if (!is_null($timeout))
        {
            $httpCallContext->addQueryParameter('timeout', $timeout);
        }

        if ($receiveMessageOptions->getIsReceiveAndDelete()) {
            $httpCallContext->setMethod(Resources::HTTP_DELETE);
        }
        else if ($receiveMessageOptions->getIsPeekLock()) {
            $httpCallContext->setMethod(Resources::HTTP_POST);
        }
        else {
            throw new ServiceException(
                'The receive message option is in an unknown mode.'
            );
        }

        $response = $this->sendContext($httpCallContext);
        $responseHeaders = $response->getHeader(); 
        $brokerProperties = new BrokerProperties();

        if (array_key_exists('brokerproperties', $responseHeaders))
        {
            $brokerProperties = BrokerProperties::create(
                $responseHeaders['brokerproperties']
            );
        }

        $brokeredMessage = new BrokeredMessage($brokerProperties);
        
        if (array_key_exists(Resources::CONTENT_TYPE, $responseHeaders))
        {
            $brokeredMessage->setContentType($responseHeaders[Resources::CONTENT_TYPE]);
        }

        if (array_key_exists('Date', $responseHeaders))
        {
            $brokeredMessage->setDate($responseHeaders['Date']);
        }

        $brokeredMessage->setBody($response->getBody());

        foreach (array_keys($responseHeaders) as $headerKey)
        {
            $brokeredMessage->setProperty(
                $headerKey, 
                $responseHeaders[$headerKey]
            );
        }
        
       return $brokeredMessage; 
    }

    /**
     * Sends a brokered message to a specified topic. 
     * 
     * @param string          $topicName       The name of the topic. 
     * @param BrokeredMessage $brokeredMessage The brokered message. 
     *
     * @return none
     */
    public function sendTopicMessage($topicName, $brokeredMessage)
    {
        $this->sendMessage($topicName, $brokeredMessage);
    } 

    /**
     * Receives a subscription message. 
     * 
     * @param string                $topicName             The name of the 
     * topic.
     * @param string                $subscriptionName      The name of the 
     * subscription.
     * @param ReceiveMessageOptions $receiveMessageOptions The options to 
     * receive the subscription message. 
     *
     * @return ReceiveSubscriptionMessageResult
     */
    public function receiveSubscriptionMessage(
        $topicName, 
        $subscriptionName, 
        $receiveMessageOptions
    ) {
        $httpCallContext = new HttpCallContext();
        $httpCallContext->setMethod(Resources::HTTP_GET);
        $messagePath = sprintf(
            Resources::SUBSCRIPTION_MESSAGE_PATH, 
            $topicName,
            $subscriptionName
        );
        $httpCallContext->setPath($messagePath);
        $httpCallContext->addStatusCode(Resouces::STATUS_OK);

        $response = $this->sendContext($httpCallContext); 

        $receiveSubscriptionMessageResult 
            = ReceiveSubscriptionMessageResult::create($response->getBody());

        return $receiveSubscriptionMessageResult;
    }

    /**
     * Unlocks a brokered message. 
     * 
     * @param BrokeredMessage $brokeredMessage The brokered message. 
     *
     * @return none
     */
    public function unlockMessage($brokeredMessage)
    {
        $httpCallContext = new HttpCallContext();
        $httpCallContext->setMethod(Resources::HTTP_PUT);
        $httpCallContext->setPath($brokeredMessage->getLockLocation());
        $httpCallContext->addStatusCode(Resources::STATUS_OK);
        $this->sendContext($httpCallContext);
    }
    
    /**
     * Deletes a brokered message. 
     * 
     * @param BrokeredMessage $brokeredMessage The borkered message.
     *
     * @return none
     */
    public function deleteMessage($brokeredMessage)
    {
        $httpCallContext = new HttpCallContext();
        $httpCallContext->setMethod(Resources::HTTP_DELETE);
        $httpCallContext->setPath($brokeredMessage->getLockLocation());
        $httpCallContext->addStatusCode(Resources::STATUS_OK);
        $this->sendContext($httpCallContext);
    }
   
    /**
     * Creates a queue with specified queue info. 
     * 
     * @param QueueInfo $queueInfo The information of the queue.
     *
     * @return CreateQueueResult
     */
    public function createQueue($queueInfo)
    {
        $httpCallContext = new HttpCallContext();
        $httpCallContext->setMethod(Resources::HTTP_PUT);
        $httpCallContext->setPath($queueInfo->getName());
        $httpCallContext->addHeader(
            Resources::CONTENT_TYPE,
            Resources::ATOM_ENTRY_CONTENT_TYPE
        );
        $httpCallContext->addStatusCode(Resources::STATUS_CREATED);
        
        $queueDescriptionXml = XmlSerializer::objectSerialize(
            $queueInfo->getQueueDescription(),
            'QueueDescription'
        );

        $entry = new Entry();
        $content = new Content($queueDescriptionXml);
        $content->setType(Resources::APPLICATION_XML_CONTENT_TYPE);
        $entry->setContent($content);
        $entry->setAttribute(
            Resources::XMLNS_ATOM, 
            Resources::ATOM_NAMESPACE
        );

        $entry->setAttribute(
            Resources::XMLNS,
            Resources::SERVICE_BUS_NAMESPACE
        );

        $httpCallContext->setBody($entry->toXml());
        $response = $this->sendContext($httpCallContext);
        $createQueueResult = CreateQueueResult::create($response->getBody());
        return $createQueueResult;
    } 

    /**
     * Deletes a queue. 
     * 
     * @param string $queuePath The path of the queue.
     *
     * @return none
     */
    public function deleteQueue($queuePath)
    {
        Validate::isString($queuePath, 'queuePath');
        Validate::notNullOrEmpty($queuePath, 'queuePath');
        
        $httpCallContext = new HttpCallContext();
        $httpCallContext->setMethod(Resources::HTTP_DELETE);
        $httpCallContext->addStatusCode(Resources::STATUS_OK);
        $httpCallContext->setPath($queuePath);
        
        $this->sendContext($httpCallContext);
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
        $httpCallContext = new HttpCallContext();
        $httpCallContext->setPath($queuePath);
        $httpCallContext->setMethod(Resources::HTTP_GET);
        $response = $this->sendContext($httpCallContext);
        $getQueueResult = GetQueueResult::create($response->getBody());
        return $getQueueResult;
    }

    /**
     * Lists a queue. 
     * 
     * @param ListQueueOptions $listQueueOptions The options to list the 
     * queues.
     *
     * @throws Exception 
     * @return ListQueuesResult;
     */
    public function listQueues($listQueueOptions)
    {
        $httpCallContext = new HttpCallContext();
        $httpCallContext->setMethod(ResourceS::HTTP_GET);
        $httpCallContext->setPath(Resources::LIST_QUEUE_PATH);
        $response = $this->sendContext($httpCallContext);
        $listQueueResult = ListQueuesResult::create($response->getBody());
        return $listQueueResult;
    }

    /**
     * Creates a topic with specified topic info.  
     * 
     * @param  TopicInfo $topicInfo The information of the topic. 
     *
     * @throws Exception 
     *
     * @return CreateTopicResult 
     */
    public function createTopic($topicInfo)
    {
        Validate::notNullOrEmpty($topicInfo, 'topicInfo');
        $httpCallContext = new HttpCallContext();
        $httpCallContext->setMethod(Resources::HTTP_PUT);
        $httpCallContext->setPath($topicInfo->getName());
        $httpCallContext->addHeader(
            Resources::CONTENT_TYPE,
            Resources::ATOM_ENTRY_CONTENT_TYPE
        );
        $httpCallContext->addStatusCode(Resources::STATUS_CREATED);

        $topicDescriptionXml = XmlSerializer::objectSerialize(
            $topicInfo->getTopicDescription(),
            'TopicDescription'
        );

        $entry = new Entry();
        $content = new Content($topicDescriptionXml);
        $content->setType(Resources::APPLICATION_XML_CONTENT_TYPE);
        $entry->setContent($content); 
        $entry->setAttribute('xmlns:atom', 'http://www.w3.org/2005/Atom');
        $entry->setAttribute('xmlns', 'http://schemas.microsoft.com/netservices/2010/10/servicebus/connect');
        $httpCallContext->setBody($entry->toXml());

        $response = $this->sendContext($httpCallContext);
        return CreateTopicResult::create($response->getBody());
    } 

    /**
     * Deletes a topic with specified topic path. 
     * 
     * @param string $topicPath The path of the topic.
     *
     * @return none
     */
    public function deleteTopic($topicPath)
    {
        $httpCallContext = new HttpCallContext();
        $httpCallContext->setMethod(Resources::HTTP_DELETE);
        $httpCallContext->setPath($topicPath);     
        $httpCallContext->addStatusCode(Resources::STATUS_OK);
        
        $this->sendContext($httpCallContext);
    }
    
    /**
     * Gets a topic. 
     * 
     * @param string $topicPath The path of the topic.
     *
     * @return GetTopicResult;
     */
    public function getTopic($topicPath) 
    {
        $httpCallContext = new HttpCallContext();
        $httpCallContext->setMethod(Resources::HTTP_GET);
        $httpCallContext->setPath($topicPath);
        $httpCallContext->addStatusCode(Resources::STATUS_OK);
        $response = $this->sendContext($httpCallContext);
        $getTopicResult = GetTopicResult::create($response->getBody());
        return $getTopicResult; 
    }
    
    /**
     * Lists topics. 
     * 
     * @param ListTopicsOptions $listTopicsOptions The options to list 
     * the topics. 
     *
     * @return ListTopicsResults
     */
    public function listTopics($listTopicsOptions) 
    {
        $httpCallContext = new HttpCallContext();
        $httpCallContext->setMethod(Resources::HTTP_GET);
        $httpCallContext->addStatusCode(Resources::STATUS_OK);
        $httpCallContext->setPath(Resources::LIST_TOPIC_PATH);
        $response = $this->sendContext($httpCallContext);
        $listTopicResult = ListTopicsResult::create($response->getBody());
        return $listTopicResult; 
    }

    /**
     * Creates a subscription with specified topic path and 
     * subscription info. 
     * 
     * @param string                  $topicPath               The path of
     * the topic.
     * @param SubscriptionDescription $subscriptionDescription The description
     * of the subscription.
     *
     * @return CreateSubscriptionResult
     */
    public function createSubscription($topicPath, $subscriptionInfo) 
    {
        $httpCallContext = new HttpCallContext(); 
        $httpCallContext->setMethod(Resources::HTTP_PUT);
        $subscriptionPath = sprintf(
            Resources::SUBSCRIPTION_PATH, 
            $topicPath,
            $subscriptionInfo->getName()
        );
        $httpCallContext->setPath($subscriptionPath);
        $httpCallContext->addHeader(Resources::CONTENT_TYPE, Resources::ATOM_ENTRY_CONTENT_TYPE);
        $httpCallContext->addStatusCode(Resources::STATUS_CREATED);

        $subscriptionDescriptionXml = XmlSerializer::objectSerialize(
            $subscriptionInfo->getSubscriptionDescription(),
            'SubscriptionDescription'
        );
        $entry = new Entry();
        $content = new Content($subscriptionDescriptionXml);
        $content->setType(Resources::APPLICATION_XML_CONTENT_TYPE);
        $entry->setContent($content);
        $entry->setAttribute(
            Resources::XMLNS_ATOM,
            Resources::ATOM_NAMESPACE
        );

        $entry->setAttribute(
            Resources::XMLNS,
            Resources::SERVICE_BUS_NAMESPACE
        );

        $httpCallContext->setBody($entry->toXml());

        $response = $this->sendContext($httpCallContext);
        $createSubscriptionResult = CreateSubscriptionResult::create($response->getBody());
        return $createSubscriptionResult;
    }

    /**
     * Deletes a subscription. 
     * 
     * @param string $topicPath        The path of the topic.
     * @param string $subscriptionName The name of the subscription.
     *
     * @return none
     */
    public function deleteSubscription($topicPath, $subscriptionName) 
    {
        $httpCallContext = new HttpCallContext();
        $httpCallContext->setMethod(Resources::HTTP_DELETE);
        $httpCallContext->addStatusCode(Resources::STATUS_OK);
        $subscriptionPath = sprintf(
            Resources::SUBSCRIPTION_PATH,
            $topicPath,
            $subscriptionName
        );
        $httpCallContext->setPath($subscriptionPath);
        $this->sendContext($httpCallContext);
    }
    
    /**
     * Gets a subscription. 
     * 
     * @param string $topicPath        The path of the topic.
     * @param string $subscriptionName The name of the subscription.
     *
     * @return GetSubscriptionResult
     */
    public function getSubscription($topicPath, $subscriptionName) 
    {
        $httpCallContext = new HttpCallContext();
        $httpCallContext->setMethod(Resources::HTTP_GET);
        $httpCallContext->addStatusCode(Resources::STATUS_OK);
        $subscriptionPath = sprintf(
            Resources::SUBSCRIPTION_PATH,
            $topicPath,
            $subscriptionName
        );
        $httpCallContext->setPath($subscriptionPath);
        $response = $this->sendContext($httpCallContext);
        $getSubscriptionResult = GetSubscriptionResult::create($response->getBody()); 
        return $getSubscriptionResult;
    }

    /**
     * Lists subscription. 
     * 
     * @param string                   $topicPath               The path of 
     * the topic.
     * @param ListSubscriptionsOptions $listSubscriptionsOptions The options
     * to list the subscription. 
     *
     * @return ListSubscriptionsResult
     */
    public function listSubscriptions($topicPath, $listSubscriptionsOptions) 
    {
        $httpCallContext = new HttpCallContext();
        $httpCallContext->setMethod(Resources::HTTP_GET);
        $httpCallContext->addStatusCode(Resources::STATUS_OK);
        $listSubscriptionPath = sprintf(
            Resources::LIST_SUBSCRIPTION_PATH, 
            $topicPath
        );
        $httpCallContext->setPath($listSubscriptionPath);
        $httpCallContext->addHeader(
            Resources::CONTENT_TYPE,
            Resources::ATOM_ENTRY_CONTENT_TYPE
        );
        $response = $this->sendContext($httpCallContext);
        $listSubscriptionsResult = ListSubscriptionsResult::create($response->getBody());
        return $listSubscriptionsResult; 
    }

    /**
     * Creates a rule. 
     * 
     * @param string   $topicPath        The path of the topic.
     * @param string   $subscriptionName The name of the subscription. 
     * @param RuleInfo $ruleDescription  The description of the rule.
     *
     * @throws Exception 
     * @return CreateRuleResult;
     */
    public function createRule($topicPath, $subscriptionName, $ruleInfo)
    {
        $httpCallContext = new HttpCallContext();
        $httpCallContext->setMethod(Resources::HTTP_PUT);
        $httpCallContext->addStatusCode(Resources::STATUS_CREATED);
        $httpCallContext->addHeader(
            Resources::CONTENT_TYPE,
            Resources::ATOM_ENTRY_CONTENT_TYPE
        );
        $rulePath = sprintf(
            Resources::RULE_PATH,
            $topicPath,
            $subscriptionName,
            $ruleInfo->getName()
        );

        $ruleDescriptionXml = XmlSerializer::objectSerialize(
            $ruleInfo->getRuleDescription(),
            'RuleDescription'
        );

        $entry = new Entry();
        $content = new Content($ruleDescriptionXml);
        $content->setType(Resources::APPLICATION_XML_CONTENT_TYPE);
        $entry->setContent($content);
        $entry->setAttribute(
            Resources::XMLNS_ATOM,
            Resources::ATOM_NAMESPACE
        );

        $entry->setAttribute(
            Resources::XMLNS,
            Resources::SERVICE_BUS_NAMESPACE
        );

        $httpCallContext->setBody($entry->toXml());
        $httpCallContext->setPath($rulePath);
        $response = $this->sendContext($httpCallContext);
        $createRuleResult = CreateRuleResult::create($response->getBody()); 
        return $createRuleResult;
    }

    /**
     * Deletes a rule. 
     * 
     * @param string $topicPath        The path of the topic.
     * @param string $subscriptionName The name of the subscription.
     * @param string $ruleName         The name of the rule.
     *
     * @return none
     */
    public function deleteRule($topicPath, $subscriptionName, $ruleName) 
    {
        $httpCallContext = new HttpCallContext();
        $httpCallContext->addStatusCode(Resources::STATUS_OK);
        $httpCallContext->setMethod(Resources::HTTP_DELETE);
        $rulePath = sprintf(
            Resources::RULE_PATH,
            $topicPath,
            $subscriptionName,
            $ruleName
        );
        $httpCallContext->setPath($rulePath);
        $this->sendContext($httpCallContext);
    }

    /**
     * Gets a rule. 
     * 
     * @param string $topicPath        The path of the topic.
     * @param string $subscriptionName The name of the subscription.
     * @param string $ruleName         The name of the rule.
     *
     * @return GetRuleResult
     */
    public function getRule($topicPath, $subscriptionName, $ruleName) 
    {
        $httpCallContext = new HttpCallContext();
        $httpCallContext->setMethod(Resources::HTTP_GET);
        $httpCallContext->addStatusCode(Resources::STATUS_OK);
        $rulePath = sprintf(
            Resources::RULE_PATH,
            $topicPath,
            $subscriptionName,
            $ruleName
        );
        $httpCallContext->setPath($rulePath);
        $response = $this->sendContext($httpCallContext);
        $getRuleResult = GetRuleResult::create($response->getBody());
        return $getRuleResult;
    }

    /**
     * Lists rules. 
     * 
     * @param string           $topicPath        The path of the topic.
     * @param string           $subscriptionName The name of the subscription.
     * @param ListRulesOptions $listRulesOptions The options to list the rules.
     *
     * @return ListRuleResult
     */
    public function listRules($topicPath, $subscriptionName, $listRulesOptions) 
    {
        $httpCallContext = new HttpCallContext();
        $httpCallContext->setMethod(Resources::HTTP_GET);
        $httpCallContext->addStatusCode(Resources::STATUS_OK);
        $rulePath = sprintf(
            Resources::LIST_RULE_PATH,
            $topicPath,
            $subscriptionName
        );

        $httpCallContext->setPath($rulePath);
        $response = $this->sendContext($httpCallContext);
        $listRulesResult = ListRulesResult::create($response->getBody());

        return $listRulesResult;
    }
    
}
