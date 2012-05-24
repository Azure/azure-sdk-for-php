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

/**
 * This class constructs HTTP requests and receive HTTP responses for service bus.
 *
 * @category  Microsoft
 * @package   WindowsAzure\ServiceBus\Models
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
class ListTopicsResult
{
    /**
     * Gets the description of the topic. 
     * 
     * @var TopicDescription
     */ 
    private $_topicDescription;

    /**
     * Creates a list topics result. 
     *
     * @var string $response The response of the list topic request.
     */ 
    public static function create($response)
    {
        $listTopicsResult = new ListTopicsResult();
        $feed = Feed::create($response);
        $entries = $feed->getEntry();
        $topicDescription = array();
        if (!is_null($entries))
        {
            foreach ($entries as $entry)
            {
                $content = $entry->getContent();
                $topicDescriptionInstance = TopicDescription::create($content->getText());
                $topicDescription[] = $topicDescriptionInstance; 
            }
        }

        $listTopicsResult->setTopicDescription($topicDescription);
        return $listTopicsResult;
    }

    /**
     * Creates a list topics result with default parameters. 
     */
    public function __construct()
    {
    }

    /**
     * Gets the description of the topic. 
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
     * @var TopicDescription $topicDescription The description of the topics. 
     */
    public function setTopicDescription($topicDescription)
    {
        $this->_topicDescription = $topicDescription;
    }

}
?>
