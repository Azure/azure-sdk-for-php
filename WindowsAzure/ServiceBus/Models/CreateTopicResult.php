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
use WindowsAzure\ServiceBus\Internal\Atom\Feed;
use WindowsAzure\ServiceBus\Internal\Atom\Content;
use WindowsAzure\ServiceBus\Models\TopicDescription;

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
    private $_topicDescription;

    /**
     * Creates a create topic result object from response. 
     * 
     * @var string $response The response of the string. 
     */
    public static function create($response)
    {
        $createTopicResult = new CreateTopicResult();
        $feed = Feed::create($response);
        $content = $feed->getContent();
        $createTopicResult->_topicDescription = TopicDescription::create($content->getText()); 
        return $createTopicResult;
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
     * @return TopicDescription
     */
    public function getTopicDescription()
    {
        return $this->_topicDescription;
    }

    /**
     * Sets the topic description. 
     * 
     * @param TopicDescription $topicDescription The description of the topic. 
     */
    public function setTopicDescription($topicDescription)
    {
        $this->_topicDescription = $topicDescription;
    } 
}
?>
