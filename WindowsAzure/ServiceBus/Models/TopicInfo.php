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
use WindowsAzure\Common\Internal\Atom\Entry;
use WindowsAzure\Common\Internal\Resources;
use WindowsAzure\Common\Internal\Utilities;
use WindowsAzure\ServiceBus\Models\TopicDescription;

/**
 * The information of a topic.
 *
 * @category  Microsoft
 * @package   WindowsAzure\ServiceBus\Models
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
class TopicInfo extends Entry
{
    /**
     * The description of the topics. 
     *
     * @TopicDescription
     */
    private $_topicDescription;

    /**
     * Creates a TopicInfo with specified parameters.
     *
     * @param string           $title            The name of the topic.
     * @param TopicDescription $topicDescription The description of the topic.
     * 
     */
    public function __construct($title = Resources::EMPTY_STRING, $topicDescription = null)
    {
        $this->_title = $title;
        if (is_null($topicDescription)) {
            $topicDescription = new TopicDescription();
        }
        $this->_topicDescription = $topicDescription;
    }

    public function parseXml($xmlString)
    {
        parent::parseXml($xmlString);
        $content = $this->_content;
        if (is_null($content)) {
            $this->_topicDescription = null;
        }
        else {
            $this->_topicDescription = TopicDescription::create($content->getText());
        }
    }

    public function writeXml()
    {
        if (is_null($this->_topicDescription)) {
            $this->_content = null;    
        }
        else {
            $this->_content = $this->_topicDescription->writeXml(); 
        }
        return parent::writeXml();
    }

    /**
     * Gets the descriptions of the topic. 
     * 
     * @return TopicDescription
     */
    public function getTopicDescription()
    {
        return $this->_topicDescription;
    }

    /** 
     * Sets the descriptions of the topic. 
     * 
     * @param TopicDescription $topicDescription The description of the topic. 
     */
    public function setTopicDescription($topicDescription)
    {
        $this->_topicDescription = $topicDescription;
    }
    
}
?>

