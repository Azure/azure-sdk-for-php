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
 * @package   PEAR2\WindowsAzure
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
 
use PEAR2\WindowsAzure\Services\Core\Configuration;
use PEAR2\WindowsAzure\Services\Queue\QueueSettings;
use PEAR2\Tests\Unit\TestResources;
use PEAR2\WindowsAzure\Services\Queue\QueueService;

/**
 * TestBase class for each unit test class.
 *
 * @category  Microsoft
 * @package   PEAR2\WindowsAzure
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
class RestTestBase extends PHPUnit_Framework_TestCase
{
    protected $config;
    protected $queueWrapper;
    protected $createdQueues;
    
    public function __construct()
    {
        $this->config = new Configuration();
        $this->config->setProperty(QueueSettings::ACCOUNT_KEY, TestResources::accountKey());
        $this->config->setProperty(QueueSettings::ACCOUNT_NAME, TestResources::accountName());
        $this->config->setProperty(QueueSettings::URI, 'queue.core.windows.net');
        $this->queueWrapper = QueueService::create($this->config);
        $this->createdQueues = array();
    }
    
    public function createQueue($queueName, $options = null)
    {
        $this->queueWrapper->createQueue($queueName, $options);
        $this->createdQueues[] = $queueName;
    }
    
    public function deleteQueue($queueName, $options = null)
    {
        $this->queueWrapper->deleteQueue($queueName, $options);
    }

    protected function tearDown()
    {
        foreach ($this->createdQueues as $value) {
            try
            {
                $this->deleteQueue($value);
            }
            catch (Exception $e)
            {
                // Ignore exception and continue, will assume that this queue doesn't exist in the sotrage account
                error_log($e->getMessage());
            }
        }
    }
    
    protected function onNotSuccessfulTest(Exception $e)
    {
        $this->tearDown();
        throw $e;
    }
}

?>
