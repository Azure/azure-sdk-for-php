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
use WindowsAzure\Common\Internal\Atom\Content;
use WindowsAzure\Common\Internal\Atom\Entry;
use WindowsAzure\Common\Internal\Resources;
use WindowsAzure\Common\Internal\Serialization\XmlSerializer;
use WindowsAzure\Common\Internal\Utilities;
use WindowsAzure\ServiceBus\Models\QueueDescription;

/**
 * The information of a queue.
 *
 * @category  Microsoft
 * @package   WindowsAzure\ServiceBus\Models
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */

class QueueInfo extends Entry
{
    /**
     * The description of the queue. 
     * 
     * @var QueueDescription
     */
    private $_queueDescription;

    /**
     * Creates a QueueInfo instance with specified parameters.
     *
     * @param string           $title            The name of the queue.
     * @param QueueDescription $queueDescription The description of the queue.
     */
    public function __construct(
        $title = Resources::EMPTY_STRING, 
        $queueDescription = null
    ) {
        $this->_title = $title;
        if (is_null($queueDescription)) {
            $queueDescription = new QueueDescription();
        }

        $this->_queueDescription = $queueDescription;
    }

    /**
     * Populates the properties of the queue info instance with a ATOM ENTRY XML string. 
     * 
     * @param string $entryXml An ATOM entry based XML string.
     * 
     * @return none
     */
    public function parseXml($entryXml)
    {
        parent::parseXml($entryXml);
        $content = $this->_content;
        if (is_null($content)) {
            $this->_queueDescription = null;
        } else {
            $this->_queueDescription = QueueDescription::create($content->getText());
        }
    }

    /**
     * Returns a XML string based on ATOM ENTRY schema. 
     * 
     * @return string
     */
    public function writeXml()
    {
        if (is_null($this->_queueDescription)) {
            $this->_content = null;    
        } else {
            $this->_content = new Content();
            $this->_content->setText(
                XmlSerializer::objectSerialize(
                    $this->_queueDescription,
                    'QueueDescription'
                ) 
            );
        }
        return parent::writeXml();
    }

    /**
     * Gets the description of the queue. 
     * 
     * @return none
     */
    public function getQueueDescription()
    {
        return $this->_queueDescription;
    }

    /**
     * Sets the description of the queue. 
     *
     * @param QueueDescription $queueDescription The description of the queue.
     * 
     & @return none
     */
    public function setQueueDescription($queueDescription)
    {
        $this->_queueDescription = $queueDescription;
    }

}

