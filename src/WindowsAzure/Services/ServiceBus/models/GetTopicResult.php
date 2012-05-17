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
 * @package   WindowsAzure\Services\ServiceBus
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */

namespace WindowsAzure\Services\ServiceBus\Models;

use WindowsAzure\Core\Atom\Feed;
use WindowsAzure\Core\Atom\Content;

/**
 * The result of a get topic request. 
 *
 * @category  Microsoft
 * @package   WindowsAzure\Services\ServiceBus
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
class GetTopicResult
{
    /**
     * The description of the topic. 
     */
    private $_topicDescription;

    /**
     * Creates a get topic result instance with specified response from the server. 
     * 
     * @param string $response The response from the get topic request. 
     */ 
    public static function create($response)
    {
        $getTopicResult = new GetTopicResult();
        $feed = Feed::create($response);
        $entry = $feed->getEntry();
        $content = $entry->getContent();
        $topicDescription = XmlSerializer::objectUnserialize($content->getText()); 
        $getTopicResult->setTopicDescription($topicDescription);
        return $getTopicResult;
    }    

    /**
     * Gets the description of the topic. 
     * 
     * @return the description of the topic.
     */ 
    public function getTopicDescription()
    {
        return $this->_topicDescription;
    }

    /**
     * Sets the description of the topic. 
     * 
     * @param TopicDescription $topicDescription The description of the topic. 
     */
    public function setTopicDescription($topicDescription)
    {
        $this->_topicDescription = $topicDescription; 
    }
}
?>
