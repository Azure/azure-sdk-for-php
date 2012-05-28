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
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
 
namespace WindowsAzure\ServiceBus\Models;
use WindowsAzure\Common\Internal\Atom\Feed;
use WindowsAzure\Common\Internal\Atom\Content;
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
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */

class CreateQueueResult
{
    /**
     * The description of a queue. 
     *
     * @var QueueInfo
     */
    private $_queueInfo;

    /**
     * Creates a create queue result object from response. 
     * 
     * @var string $response The response of the string. 
     */
    public function parseXml($response)
    {
        $queueInfo = new QueueInfo();
        $queueInfo->parseXml($response);
        $this->_queueInfo = $queueInfo;
    }

    /**
     * Creates a create queue result with default parameters. 
     */
    public function __construct()
    {
    }

    /**
     * Gets queue description.
     * 
     * @return QueueInfo
     */
    public function getQueueInfo()
    {
        return $this->_queueInfo;
    }

    /**
     * Sets the queue description. 
     * 
     * @param QueueInfo $queueInfo The description of the queue. 
     */
    public function setQueueInfo($queueInfo)
    {
        $this->_queueInfo = $queueInfo;
    } 
}
?>
