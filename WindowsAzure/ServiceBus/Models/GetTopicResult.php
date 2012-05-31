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
use WindowsAzure\ServiceBus\Models\TopicInfo;

/**
 * The result of a get topic request. 
 *
 * @category  Microsoft
 * @package   WindowsAzure\ServiceBus\Models
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
class GetTopicResult
{
    /**
     * The information of the topic. 
     *
     * @var TopicInfo
     */
    private $_topicInfo;

    /**
     * Populate the properties with a specified get topic request response body. 
     * 
     * @param string $getTopicResponse The body of the response from a get topic request. 
     */ 
    public function parseXml($getTopicResponse)
    {
        $this->_topicInfo = new TopicInfo();
        $this->_topicInfo->parseXml($getTopicResponse);
    }    

    /**
     * Creates a get topic result with specified results. 
     */
    public function __construct()
    {
    }

    /**
     * Gets the information of the topic. 
     * 
     * @return the information of the topic.
     */ 
    public function getTopicInfo()
    {
        return $this->_topicInfo;
    }

    /**
     * Sets the information of the topic. 
     * 
     * @param TopicInfo $topicInfo The information of the topic. 
     */
    public function setTopicInfo($topicInfo)
    {
        $this->_topicInfo = $topicInfo; 
    }
}
?>
