<?php

/**
 * Unit tests for the SDK
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
 * @package    Azure-sdk-for-php
 * @author     Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright  2012 Microsoft Corporation
 * @license    http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link       http://pear.php.net/package/azure-sdk-for-php
 */

use PEAR2\WindowsAzure\Services\Core\Configuration;
use PEAR2\WindowsAzure\Services\Queue\IQueue;
use PEAR2\WindowsAzure\Services\Queue\QueueService;
use PEAR2\WindowsAzure\Services\Queue\QueueSettings;
use PEAR2\WindowsAzure\Services\Queue\Models\ListQueueOptions;
use PEAR2\WindowsAzure\Services\Queue\Models\ListQueueResult;
use PEAR2\Tests\Unit\TestResources;

/**
* Unit tests for QueueRestProxy class
*
* @package    Azure-sdk-for-php
* @author     Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
* @copyright  2012 Microsoft Corporation
* @license    http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
* @version    Release: @package_version@
* @link       http://pear.php.net/package/azure-sdk-for-php
*/
class QueueRestProxyTest extends PHPUnit_Framework_TestCase
{
  /**
  * @covers PEAR2\WindowsAzure\Services\Queue\QueueRestProxy::listQueues
  */
  public function testListQueues()
  {
    $config = Configuration::getInstance();
    $config->setProperty(QueueSettings::ACCOUNT_KEY, TestResources::accountKey());
    $config->setProperty(QueueSettings::ACCOUNT_NAME, TestResources::accountName());
    $config->setProperty(QueueSettings::URI, 'queue.core.windows.net');
    $queueWrapper = QueueService::create($config);
    $result = $queueWrapper->listQueues();
    $queues = $result->getQueues();
    
    $this->assertEquals('testqueue1', $queues[0]->getName());
    $this->assertEquals('testqueue2', $queues[1]->getName());
    $this->assertEquals('testqueue3', $queues[2]->getName());
    $this->assertEquals('zikas3', $queues[3]->getName());
  }
  
  /**
  * @covers PEAR2\WindowsAzure\Services\Queue\QueueRestProxy::listQueues
  */
  public function testListQueuesWithOptions()
  {
    $config = Configuration::getInstance();
    $config->setProperty(QueueSettings::ACCOUNT_KEY, TestResources::accountKey());
    $config->setProperty(QueueSettings::ACCOUNT_NAME, TestResources::accountName());
    $config->setProperty(QueueSettings::URI, 'queue.core.windows.net');
    $queueWrapper = QueueService::create($config);
    $options = new ListQueueOptions();
    $options->setPrefix('test');
    $options->setIncludeMetadata(true);
    $result = $queueWrapper->listQueues($options);
    $queues = $result->getQueues();
    
    $this->assertEquals(3, count($queues));
    $this->assertEquals('testqueue1', $queues[0]->getName());
    $this->assertEquals('testqueue2', $queues[1]->getName());
    $this->assertEquals('testqueue3', $queues[2]->getName());
  }
  
  /**
  * @covers PEAR2\WindowsAzure\Services\Queue\QueueRestProxy::listQueues
  */
  public function testListQueuesWithNextMarker()
  {
    $config = Configuration::getInstance();
    $config->setProperty(QueueSettings::ACCOUNT_KEY, TestResources::accountKey());
    $config->setProperty(QueueSettings::ACCOUNT_NAME, TestResources::accountName());
    $config->setProperty(QueueSettings::URI, 'queue.core.windows.net');
    $queueWrapper = QueueService::create($config);
    $options = new ListQueueOptions();
    $options->setMaxResults('2');
    $result = $queueWrapper->listQueues($options);
    $queues = $result->getQueues();
  
    $this->assertEquals(2, count($queues));
    $this->assertEquals('testqueue1', $queues[0]->getName());
    $this->assertEquals('testqueue2', $queues[1]->getName());
    
    $options->setMarker($result->getNextMarker());
    $result = $queueWrapper->listQueues($options);
    $queues = $result->getQueues();
    
    $this->assertEquals(2, count($queues));
    $this->assertEquals('testqueue3', $queues[0]->getName());
    $this->assertEquals('zikas3', $queues[1]->getName());
  }
  
  /**
  * @covers PEAR2\WindowsAzure\Services\Queue\QueueRestProxy::listQueues
  */
  public function testListQueuesWithNoQueues()
  {
    $config = Configuration::getInstance();
    $config->setProperty(QueueSettings::ACCOUNT_KEY, TestResources::accountKey());
    $config->setProperty(QueueSettings::ACCOUNT_NAME, TestResources::accountName());
    $config->setProperty(QueueSettings::URI, 'queue.core.windows.net');
    $queueWrapper = QueueService::create($config);
    $options = new ListQueueOptions();
    $options->setPrefix('7amada');
    $result = $queueWrapper->listQueues($options);
    $queues = $result->getQueues();
  
    $this->assertTrue(empty($queues));
  }
  
  /**
  * @covers PEAR2\WindowsAzure\Services\Queue\QueueRestProxy::listQueues
  */
  public function testListQueuesWithOneResult()
  {
    $config = Configuration::getInstance();
    $config->setProperty(QueueSettings::ACCOUNT_KEY, TestResources::accountKey());
    $config->setProperty(QueueSettings::ACCOUNT_NAME, TestResources::accountName());
    $config->setProperty(QueueSettings::URI, 'queue.core.windows.net');
    $queueWrapper = QueueService::create($config);
    $options = new ListQueueOptions();
    $options->setMaxResults('2');
    $options->setPrefix('z');
    $result = $queueWrapper->listQueues($options);
    $queues = $result->getQueues();
  
    $this->assertEquals(1, count($queues));
  }
}

?>
