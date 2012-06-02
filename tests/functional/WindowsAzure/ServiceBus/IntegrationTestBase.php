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
use WindowsAzure\Common\ServiceException;
use WindowsAzure\ServiceBus\ServiceBusService;
use WindowsAzure\ServiceBus\Models\QueueInfo;
use WindowsAzure\ServiceBus\Models\ReceiveMessageOptions;
use WindowsAzure\Common\Internal\Utilities;

class IntegrationTestBase extends ServiceBusRestProxyTestBase
{
    /**
     * @covers WindowsAzure\ServiceBus\ServiceBusRestProxy::withFilter
     */
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
        $testAlphaExists = false;
        $queues = $restProxy->listQueues()->getQueueInfo();
        foreach($queues as $queue)  {
            $queueName = $queue->getTitle();
            if (Utilities::startsWith($queueName, 'Test') || Utilities::startsWith($queueName, 'test')) {
                if (strtolower($queueName) == strtolower('TestAlpha')) {
                    $testAlphaExists = true;
                    $count = $queue->getQueueDescription()->getMessageCount();
                    for ($i = 0; $i != $count; $i++) {
                        $opts = new ReceiveMessageOptions();
                        $opts->setTimeout(20);
                        try {
                            $restProxy->receiveQueueMessage($queueName, $opts);
                        } catch (\Exception $ex) {
                        }
                    }
                }
                else {
                    try {
                        $restProxy->deleteQueue($queueName);
                    } catch (\Exception $ex) {
                    }
                }
            }
        }
        foreach($restProxy->listTopics()->getTopicInfo() as $topic)  {
            $topicName = $topic->getTitle();
            if (Utilities::startsWith($topicName, 'Test') || Utilities::startsWith($topicName, 'test')) {
                try {
                    $restProxy->deleteTopic($topicName);
                } catch (\Exception $ex) {
                }
            }
        }

        if (!$testAlphaExists) {
            try {
                $restProxy->createQueue(new QueueInfo('TestAlpha'));
            } catch (\Exception $ex) {
            }
        }
    }
}

?>
