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
 * @package    azure-sdk-for-php
 * @author     Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright  2012 Microsoft Corporation
 * @license    http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link       http://pear.php.net/package/azure-sdk-for-php
 */

use PEAR2\WindowsAzure\Services\Core\Configuration;
use PEAR2\WindowsAzure\Services\Queue\IQueue;
use PEAR2\WindowsAzure\Services\Queue\QueueService;
use PEAR2\WindowsAzure\Services\Queue\QueueConfiguration;

/**
* Unit tests for QueueRestProxy class
*
* @package    azure-sdk-for-php
* @author     Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
* @copyright  2012 Microsoft Corporation
* @license    http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
* @version    Release: @package_version@
* @link       http://pear.php.net/package/azure-sdk-for-php
*/
class QueueRestProxyTest extends PHPUnit_Framework_TestCase
{
  /**
  * @covers PEAR2\WindowsAzure\Services\Queue\QueueRestProxy::ListQueues
  */
  public function testListQueues()
  {
    $config = Configuration::GetInstance();
    $config->SetProperty(QueueConfiguration::ACCOUNT_KEY, 'AhlzsbLRkjkwObubff3xrhB2yWJNh1EMptmcmxFJ6fvPTVX2PZXwrG2YtYWf5DPMVgNsteKStM5iBLlknYFVoA==');
    $config->SetProperty(QueueConfiguration::ACCOUNT_NAME, 'aogailsvc');
    $config->SetProperty(QueueConfiguration::URI, 'queue.core.windows.net');
    $queueWrapper = QueueService::Create($config);
    $queues = $queueWrapper->ListQueues();
    
    $this->assertEquals('testqueue1', $queues['Queues']['Queue'][0]['Name']);
    $this->assertEquals('testqueue2', $queues['Queues']['Queue'][1]['Name']);
    $this->assertEquals('testqueue3', $queues['Queues']['Queue'][2]['Name']);
    $this->assertEquals('zikas3', $queues['Queues']['Queue'][3]['Name']);
  }
}

?>
