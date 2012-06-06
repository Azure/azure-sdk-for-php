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
 * The results of a create topic request.
 *
 * @category  Microsoft
 * @package   WindowsAzure\ServiceBus\Models
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */

class CreateTopicResult
{
    /**
     * The information of the topic. 
     *
     * @var TopicInfo
     */
    private $_topicInfo;

    /**
     * Populates the topic information from the response of a create topic request. 
     * 
     * @param string $response The response of the create topic request.
     *
     * @return none
     */
    public function parseXml($response)
    {
        $this->_topicInfo = new TopicInfo();
        $this->_topicInfo->parseXml($response);
    }

    /** 
     * Creates a create topic result with default parameters. 
     */
    public function __construct()
    {   
    }

    /**
     * Gets topic information.
     * 
     * @return TopicInfo
     */
    public function getTopicInfo()
    {
        return $this->_topicInfo;
    }

    /**
     * Sets the topic information. 
     * 
     * @param TopicInfo $topicInfo The information of the topic. 
     *
     * @return none
     */
    public function setTopicInfo($topicInfo)
    {
        $this->_topicInfo = $topicInfo;
    } 
}
?>
