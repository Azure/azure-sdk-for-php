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
 * The result of a list topics request.
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
class ListTopicsResult extends Feed
{
    /**
     * Gets the information of the topic.
     *
     * @var TopicInfo[]
     */
    private $_topicInfos;

    /**
     * Populates the properties with a the response from the list topics request.
     *
     * @param string $response The body of the response of the list topics request
     */
    public function parseXml($response)
    {
        parent::parseXml($response);
        $listTopicsResultXml = new \SimpleXMLElement($response);
        $this->_topicInfos = [];
        foreach ($listTopicsResultXml->entry as $entry) {
            $topicInfo = new TopicInfo();
            $topicInfo->parseXml($entry->asXML());
            $this->_topicInfos[] = $topicInfo;
        }
    }

    /**
     * Gets the information of the topic.
     *
     * @return TopicInfo[]
     */
    public function getTopicInfos()
    {
        return $this->_topicInfos;
    }

    /**
     * Sets the topic information.
     *
     * @param TopicInfo[] $topicInfos The information of the topics
     */
    public function setTopicInfos(array $topicInfos)
    {
        $this->_topicInfos = $topicInfos;
    }
}
