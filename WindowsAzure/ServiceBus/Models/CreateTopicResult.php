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
     * The description of the topic. 
     *
     * @var string 
     */
    private $_topicInfo;

    /**
     * Creates a create topic result object from response. 
     * 
     * @var string $response The response of the string. 
     */
    public function parseXml($response)
    {
        $topicInfo = new TopicInfo;
        $topicInfo->parseXml($response);
        $this->_topicInfo = $topicInfo;
    }

    /** 
     * Creates a create topic result with default parameters. 
     */
    public function __construct()
    {   
    }

    /**
     * Gets topic description.
     * 
     * @return TopicInfo
     */
    public function getTopicInfo()
    {
        return $this->_topicInfo;
    }

    /**
     * Sets the topic description. 
     * 
     * @param TopicInfo $topicInfo The description of the topic. 
     */
    public function setTopicInfo($topicInfo)
    {
        $this->_topicInfo = $topicInfo;
    } 
}
?>
