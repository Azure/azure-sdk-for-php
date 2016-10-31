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

namespace Tests\framework;


use WindowsAzure\ServiceBus\Internal\IServiceBus;
use WindowsAzure\ServiceBus\Models\QueueInfo;
use WindowsAzure\ServiceBus\Models\RuleInfo;
use WindowsAzure\ServiceBus\Models\SubscriptionInfo;
use WindowsAzure\ServiceBus\Models\TopicInfo;

/**
 * TestBase class for each unit test class.
 *
 * @category  Microsoft
 *
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 *
 * @version   Release: 0.5.0_2016-11
 *
 * @link      https://github.com/WindowsAzure/azure-sdk-for-php
 */
class ServiceBusRestProxyTestBase extends ServiceRestProxyTestBase
{
    private $_createdTopics;
    private $_createdSubscriptions;
    private $_createdRules;
    private $_createdQueues;
    /**
     * @var IServiceBus
     */
    protected $serviceBusWrapper;

    public function setUp()
    {
        $this->skipIfEmulated();
        parent::setUp();
        $this->serviceBusWrapper = $this->builder->createServiceBusService(TestResources::getServiceBusConnectionString());
        $this->_createdTopics = [];
        $this->_createdSubscriptions = [];
        $this->_createdRules = [];
        $this->_createdQueues = [];
        parent::setProxy($this->serviceBusWrapper);
    }

    public function createQueue(QueueInfo $queueInfo)
    {
        $this->_createdQueues[] = $queueInfo->getTitle();

        return $this->serviceBusWrapper->createQueue($queueInfo);
    }

    public function createTopic(TopicInfo $topicInfo)
    {
        $this->_createdTopics[] = $topicInfo->getTitle();

        return $this->serviceBusWrapper->createTopic($topicInfo);
    }

    /**
     * @param $topicName
     * @param SubscriptionInfo $subscriptionInfo
     * @return SubscriptionInfo
     */
    public function createSubscription($topicName, SubscriptionInfo $subscriptionInfo)
    {
        $topicSubscriptionNameArray = [$topicName, $subscriptionInfo->getTitle()];
        $this->_createdSubscriptions[] = implode('::', $topicSubscriptionNameArray);

        return $this->serviceBusWrapper->createSubscription($topicName, $subscriptionInfo);
    }

    public function createRule($topicName, $subscriptionName, RuleInfo $ruleInfo)
    {
        $topicSubscriptionRuleArray = [$topicName, $subscriptionName, $ruleInfo->getTitle()];
        $this->_createdRules[] = implode('::', $topicSubscriptionRuleArray);

        return $this->serviceBusWrapper->createRule($topicName, $subscriptionName, $ruleInfo);
    }

    public function safeDeleteQueue($queueName)
    {
        try {
            $this->serviceBusWrapper->deleteQueue($queueName);
        } catch (\Exception $e) {
            // no need to show the error messages here. They are benign. 
            //error_log($e->getMessage());
        }
    }

    public function safeDeleteRule($topicName, $subscriptionName, $ruleName)
    {
        try {
            $this->serviceBusWrapper->deleteRule($topicName, $subscriptionName, $ruleName);
        } catch (\Exception $e) {
            // no need to show the error messages here. They are benign.
            //error_log($e->getMessage());
        }
    }

    public function safeDeleteSubscription($topicName, $subscriptionName)
    {
        try {
            $this->serviceBusWrapper->deleteSubscription($topicName, $subscriptionName);
        } catch (\Exception $e) {
            // no need to show the error messages here. They are benign.
            //error_log($e->getMessage());
        }
    }

    public function safeDeleteTopic($topicName)
    {
        try {
            $this->serviceBusWrapper->deleteTopic($topicName);
        } catch (\Exception $e) {
            // no need to show the error messages here. They are benign.
            //error_log($e->getMessage());
        }
    }

    protected function tearDown()
    {
        parent::tearDown();

        foreach ($this->_createdRules as $topicSubscriptionRuleName) {
            $topicSubscriptionRuleNameArray = explode('::', $topicSubscriptionRuleName);
            $topicName = $topicSubscriptionRuleNameArray[0];
            $subscriptionName = $topicSubscriptionRuleNameArray[1];
            $ruleName = $topicSubscriptionRuleNameArray[2];
            $this->safeDeleteRule($topicName, $subscriptionName, $ruleName);
        }

        foreach ($this->_createdSubscriptions as $topicSubscriptionName) {
            $topicSubscriptionNameArray = explode('::', $topicSubscriptionName);
            $topicName = $topicSubscriptionNameArray[0];
            $subscriptionName = $topicSubscriptionNameArray[1];
            $this->safeDeleteSubscription($topicName, $subscriptionName);
        }

        foreach ($this->_createdTopics as $topicName) {
            $this->safeDeleteTopic($topicName);
        }

        foreach ($this->_createdQueues as $queueName) {
            $this->safeDeleteQueue($queueName);
        }
    }
}
