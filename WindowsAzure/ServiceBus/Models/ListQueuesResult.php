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

/**
 * The results of list queues request. 
 *
 * @category  Microsoft
 * @package   WindowsAzure\ServiceBus\Models
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
class ListQueuesResult extends Feed
{
    /**
     * The information of the queue. 
     *
     * @var QueueInfo
     */
    private $_queueInfo;

    /** 
     * Creates a list queue result instance with specified response from the server. 
     * 
     * @param string $response the response of the list queue request. 
     */
    public function parseXml($response)
    {
        parent::parseXml($response);
        $listQueuesResultXml = new \SimpleXMLElement($response);
        $this->_queueInfo = array();
        foreach ($listQueuesResultXml->entry as $entry)
        {
            $queueInfo = new QueueInfo();
            $queueInfo->parseXml($entry->asXml());
            $this->_queueInfo[] = $queueInfo;
        }
    }

    /**
     * Creates a queue with default parameters. 
     */
    public function __construct()
    {
    }

    /**
     * Gets the queue information. 
     * 
     * @return array
     */
    public function getQueueInfo()
    {
        return $this->_queueInfo;
    }

    /**
     * Sets the information of the queue. 
     * 
     * @param array $queueInfo The information of the queue. 
     */
    public function setQueueInfo($queueInfo)
    {
        $this->_queueInfo = $queueInfo;
    }

}
?>
