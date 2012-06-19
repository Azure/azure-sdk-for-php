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
 * @package   WindowsAzure\ServiceBus\Models
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      https://github.com/WindowsAzure/azure-sdk-for-php
 */
 
namespace WindowsAzure\ServiceBus\Models;
use WindowsAzure\ServiceBus\Models\QueueInfo;

/**
 * The results of a create queue request.
 *
 * @category  Microsoft
 * @package   WindowsAzure\ServiceBus\Models
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      https://github.com/WindowsAzure/azure-sdk-for-php
 */

class CreateQueueResult
{
    /**
     * The information of a queue. 
     *
     * @var QueueInfo
     */
    private $_queueInfo;

    /**
     * Populates the queue information from the response of a create queue 
     * request.
     * 
     * @param string $createQueueResponseBody The response of the create queue
     * request.
     * 
     * @return none
     */
    public function parseXml($createQueueResponseBody)
    {
        $this->_queueInfo = new QueueInfo();
        $this->_queueInfo->parseXml($createQueueResponseBody);
    }

    /**
     * Creates a create queue result with default parameters. 
     */
    public function __construct()
    {
    }

    /**
     * Gets the information of the queue.
     * 
     * @return QueueInfo
     */
    public function getQueueInfo()
    {
        return $this->_queueInfo;
    }

    /**
     * Sets the information of the queue.
     * 
     * @param QueueInfo $queueInfo The information of the queue. 
     * 
     * @return none
     */
    public function setQueueInfo($queueInfo)
    {
        $this->_queueInfo = $queueInfo;
    } 
}
?>
