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

use PEAR2\WindowsAzure\Services\Queue\IQueue;
use PEAR2\WindowsAzure\Services\Queue\QueueService;
use PEAR2\WindowsAzure\Services\Configuration;

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

        $config = new Configuration();
        $queueService = QueueService::Create($config);
        $queues = $queueService->ListQueues();
        $this->assertEquals(3, count($queues));
        $this->assertEquals('Queue1', $queues[0]->GetName());
        $this->assertEquals('Queue2', $queues[1]->GetName());
        $this->assertEquals('Queue3', $queues[2]->GetName());

        return $queueService;
    }
}

?>
