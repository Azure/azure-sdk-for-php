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
 * @package   PEAR2\Tests\Framework
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
namespace PEAR2\Tests\Framework;
use PEAR2\Tests\Framework\ServiceRestProxyTestBase;
use PEAR2\Tests\Framework\TestResources;
use PEAR2\WindowsAzure\Services\Core\Configuration;
use PEAR2\WindowsAzure\Services\Core\Models\ServiceProperties;
use PEAR2\WindowsAzure\Services\Queue\QueueSettings;
use PEAR2\WindowsAzure\Services\Queue\QueueService;

/**
 * TestBase class for each unit test class.
 *
 * @category  Microsoft
 * @package   PEAR2\Tests\Framework
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
class QueueServiceRestProxyTestBase extends ServiceRestProxyTestBase
{
    private $_createdQueues;
    
    public function __construct()
    {
        $config = new Configuration();
        $queueUri = 'http://' . TestResources::accountName() . '.queue.core.windows.net';
        $config->setProperty(QueueSettings::ACCOUNT_KEY, TestResources::accountKey());
        $config->setProperty(QueueSettings::ACCOUNT_NAME, TestResources::accountName());        
        $config->setProperty(QueueSettings::URI, $queueUri);
        $queueWrapper = QueueService::create($config);
        parent::__construct($config, $queueWrapper);
        $this->_createdQueues = array();
    }
    
    public function createQueue($queueName, $options = null)
    {
        $this->wrapper->createQueue($queueName, $options);
        $this->_createdQueues[] = $queueName;
    }
    
    public function deleteQueue($queueName, $options = null)
    {
        $this->wrapper->deleteQueue($queueName, $options);
    }
    
    public function safeDeleteQueue($queueName)
    {
        try
        {
            $this->deleteQueue($queueName);
        }
        catch (\Exception $e)
        {
            // Ignore exception and continue, will assume that this queue doesn't exist in the sotrage account
            error_log($e->getMessage());
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

?>
