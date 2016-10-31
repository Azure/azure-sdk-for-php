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
 * @link      https://github.com/WindowsAzure/azure-sdk-for-php
 */

namespace WindowsAzure\ServiceBus\Models;

use WindowsAzure\Common\Internal\Atom\Feed;

/**
 * The results of list queues request.
 *
 * @category  Microsoft
 *
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 *
 * @version   Release: 0.5.0_2016-11
 *
 * @link      https://github.com/WindowsAzure/azure-sdk-for-php
 */
class ListQueuesResult extends Feed
{
    /**
     * The information of the queue.
     *
     * @var QueueInfo[]
     */
    private $_queueInfos;

    /**
     * Populates the properties with the response from the list queues request.
     *
     * @param string $response The body of the response of the list queues request
     */
    public function parseXml($response)
    {
        parent::parseXml($response);
        $listQueuesResultXml = new \SimpleXMLElement($response);
        $this->_queueInfos = [];
        foreach ($listQueuesResultXml->entry as $entry) {
            $queueInfo = new QueueInfo();
            $queueInfo->parseXml($entry->asXML());
            $this->_queueInfos[] = $queueInfo;
        }
    }

    /**
     * Gets the queue information.
     *
     * @return QueueInfo[]
     */
    public function getQueueInfos()
    {
        return $this->_queueInfos;
    }

    /**
     * Sets the information of the queue.
     *
     * @param QueueInfo[] $queueInfos The information of the queue
     */
    public function setQueueInfos(array $queueInfos)
    {
        $this->_queueInfos = $queueInfos;
    }
}
