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

use Tests\Framework\FiddlerFilter;
use Tests\Framework\ServiceBusRestProxyTestBase;
use WindowsAzure\ServiceBus\ServiceBusService;
use WindowsAzure\ServiceBus\Models\QueueInfo;
use WindowsAzure\Common\ServiceException;

class IntegrationTestBase extends ServiceBusRestProxyTestBase
{
    public function __construct()
    {
        parent::__construct();
        $fiddlerFilter = new FiddlerFilter();
        $this->restProxy = $this->restProxy->withFilter($fiddlerFilter);
    }

    public function setUp()
    {
        parent::setUp();
    }

    public static function setUpBeforeClass()
    {
        parent::setUpBeforeClass();
        self::initialize();
    }

    /**
     * @covers WindowsAzure\ServiceBus\ServiceBusRestProxy::createQueue
     * @covers WindowsAzure\ServiceBus\ServiceBusRestProxy::deleteQueue
     * @covers WindowsAzure\ServiceBus\ServiceBusRestProxy::receiveQueueMessage
     */
    public static function initialize()
    {
        $inst = new IntegrationTestBase();
        $restProxy = $inst->restProxy;
//        $testAlphaExists = false;
//        foreach($this->iterateQueues() as $queue)  {
//            $queueName = $queue->getPath();
//            if ($queueName->startsWith('Test') || $queueName->startsWith('test')) {
//                if ($queueName->equalsIgnoreCase('TestAlpha')) {
//                    $testAlphaExists = true;
//                    $count = $queue->getMessageCount();
//                    for ($i = 0; $i != $count; $i++) {
//                        $opts = new ReceiveMessageOptions();
//                        $opts->setTimeout(20);
//                        $this->restProxy->receiveQueueMessage($queueName, $opts);
//                    }
//                }
//                else {
//                    $service->deleteQueue($queueName);
//                }
//            }
//        }
//        foreach($this->iterateTopics() as $topic)  {
//            $topicName = $topic->getPath();
//            if ($topicName->startsWith('Test') || $topicName->startsWith('test')) {
//                $service->deleteQueue($topicName);
//            }
//        }
//        
        $queueList = array('TestCreateQueueWorks',
            'TestContentTypePassesThrough',
            'TestMessagesMayHaveCustomProperties',
            'TestPeekLockedMessageCanBeCompleted',
            'TestPeekLockedMessageCanBeDeleted',
            'TestPeekLockedMessageCanBeUnlocked',
            'TestPeekLockMessageWorks',
            'TestReceiveMessageWorks');

        foreach($queueList as $queueName) {
            try {
                $restProxy->deleteQueue($queueName);
            } catch (\Exception $ex) {
                // Ignore
            }
        }

        $topicList = array('TestruleDetailsMayBeFetched',
            'TestrulesCanBeCreatedOnSubscriptions',
            'TestrulesCanBeListedAndDefaultRuleIsPrecreated',
            'TestRulesMayBeDeleted',
            'TestRulesMayHaveAnActionAndFilter',
            'TestSubscriptionsCanBeCreatedOnTopics',
            'TestSubscriptionsCanBeListed',
            'TestSubscriptionsDetailsMayBeFetched',
            'TestSubscriptionsMayBeDeleted',
            'TestSubscriptionWillReceiveMessage',
            'TestTopicCanBeCreatedListedFetchedAndDeleted');

        foreach($topicList as $topicName) {
            try {
                $restProxy->deleteTopic($topicName);
            } catch (\Exception $ex) {
                // Ignore
            }
        }
        
//        
//        
//        if (!$testAlphaExists) {
        try {
            $restProxy->createQueue(new QueueInfo('TestAlpha'));
        } catch (\Exception $ex) {
           
        }
    }
    
    private static function iterateQueues($wrapper)
    {
        return $wrapper->listQueues()->getItems();
    }

    private static function iterateTopics($wrapper)
    {
        return $wrapper->listTopics()->getItems();
    }
}

?>
