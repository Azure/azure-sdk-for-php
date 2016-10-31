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

namespace Tests\framework;
use MicrosoftAzure\Storage\Queue\Internal\IQueue;


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
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
class QueueServiceRestProxyTestBase extends ServiceRestProxyTestBase
{
    private $_createdQueues;
    /**
     * @var IQueue
     */
    private $queueRestProxy;

    public function setUp()
    {
        parent::setUp();
        $this->queueRestProxy = $this->builder->createQueueService($this->connectionString);
        parent::setProxy($this->queueRestProxy);
        $this->_createdQueues = [];
    }

    public function createQueue($queueName, $options = null)
    {
        $this->queueRestProxy->createQueue($queueName, $options);
        $this->_createdQueues[] = $queueName;
    }

    public function deleteQueue($queueName, $options = null)
    {
        $this->queueRestProxy->deleteQueue($queueName, $options);
    }

    public function safeDeleteQueue($queueName)
    {
        try {
            $this->deleteQueue($queueName);
        } catch (\Exception $e) {
            // Ignore exception and continue, will assume that this queue doesn't exist in the storage account
            // no need to show the error messages here.
            //error_log($e->getMessage());
        }
    }

    protected function tearDown()
    {
        parent::tearDown();

        foreach ($this->_createdQueues as $value) {
            $this->safeDeleteQueue($value);
        }
    }
}
