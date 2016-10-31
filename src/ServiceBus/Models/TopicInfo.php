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

use WindowsAzure\Common\Internal\Atom\Entry;
use WindowsAzure\Common\Internal\Atom\Content;
use WindowsAzure\Common\Internal\Resources;
use WindowsAzure\Common\Internal\Serialization\XmlSerializer;
use WindowsAzure\Common\Internal\Validate;

/**
 * The description of a topic.
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
class TopicInfo extends Entry
{
    /**
     * The entry of the topic info.
     *
     * @var Entry
     */
    private $_entry;

    /**
     * The description of the topics.
     *
     * @var TopicDescription
     */
    private $_topicDescription;

    /**
     * Creates a TopicInfo with specified parameters.
     *
     * @param string           $title            The name of the topic
     * @param TopicDescription $topicDescription The description of the
     *                                           topic
     */
    public function __construct(
        $title = Resources::EMPTY_STRING,
        $topicDescription = null
    ) {
        Validate::isString($title, 'title');
        if (is_null($topicDescription)) {
            $topicDescription = new TopicDescription();
        }
        $this->title = $title;
        $this->_topicDescription = $topicDescription;
        $this->_entry = new Entry();
        $this->_entry->setTitle($title);
        $this->_entry->setAttribute(
            Resources::XMLNS,
            Resources::SERVICE_BUS_NAMESPACE
        );
    }

    /**
     * Populates properties with a specified XML string.
     *
     * @param string $xmlString An XML string representing the topic information
     */
    public function parseXml($xmlString)
    {
        $this->_entry->parseXml($xmlString);
        $content = $this->_entry->getContent();
        if (is_null($content)) {
            $this->_topicDescription = null;
        } else {
            $this->_topicDescription = TopicDescription::create($content->getText());
        }
    }

    /**
     * Writes an XML string.
     *
     * @param \XMLWriter $xmlWriter The XML writer
     */
    public function writeXml(\XMLWriter $xmlWriter)
    {
        $content = null;
        if (!is_null($this->_topicDescription)) {
            $content = new Content();
            $content->setText(
                XmlSerializer::objectSerialize(
                    $this->_topicDescription,
                    'TopicDescription'
                )
            );
            $content->setType(Resources::XML_CONTENT_TYPE);
        }
        $this->_entry->setContent($content);
        $this->_entry->writeXml($xmlWriter);
    }

    /**
     * Gets the title.
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->_entry->getTitle();
    }

    /**
     * Sets the title.
     *
     * @param string $title The title of the queue info
     */
    public function setTitle($title)
    {
        $this->_entry->setTitle($title);
    }

    /**
     * Gets the entry.
     *
     * @return Entry
     */
    public function getEntry()
    {
        return $this->_entry;
    }

    /**
     * Sets the entry.
     *
     * @param Entry $entry The entry of the queue info
     */
    public function setEntry(Entry $entry)
    {
        $this->_entry = $entry;
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
     * @param TopicDescription $topicDescription The description of the topic
     */
    public function setTopicDescription(TopicDescription $topicDescription)
    {
        $this->_topicDescription = $topicDescription;
    }

    /**
     * Gets default message time to live.
     *
     * @return string
     */
    public function getDefaultMessageTimeToLive()
    {
        return $this->_topicDescription->getDefaultMessageTimeToLive();
    }

    /**
     * Sets the default message to live.
     *
     * @param string $defaultMessageTimeToLive The default message time to live
     */
    public function setDefaultMessageTimeToLive($defaultMessageTimeToLive)
    {
        $this->_topicDescription->setDefaultMessageTimeToLive(
            $defaultMessageTimeToLive
        );
    }

    /**
     * Gets the msax size in mega bytes.
     *
     * @return int
     */
    public function getMaxSizeInMegabytes()
    {
        return $this->_topicDescription->getMaxSizeInMegabytes();
    }

    /**
     * Sets max size in mega bytes.
     *
     * @param int $maxSizeInMegabytes The maximum size in mega bytes
     */
    public function setMaxSizeInMegabytes($maxSizeInMegabytes)
    {
        $this->_topicDescription->setMaxSizeInMegabytes($maxSizeInMegabytes);
    }

    /**
     * Gets requires duplicate detection.
     *
     * @return bool
     */
    public function getRequiresDuplicateDetection()
    {
        return $this->_topicDescription->getRequiresDuplicateDetection();
    }

    /**
     * Sets requires duplicate detection.
     *
     * @param bool $requiresDuplicateDetection Sets requires duplicate detection
     */
    public function setRequiresDuplicateDetection($requiresDuplicateDetection)
    {
        $this->_topicDescription->setRequiresDuplicateDetection(
            $requiresDuplicateDetection
        );
    }

    /**
     * Gets duplicate detection history time window.
     *
     * @return string
     */
    public function getDuplicateDetectionHistoryTimeWindow()
    {
        return $this->_topicDescription->getDuplicateDetectionHistoryTimeWindow();
    }

    /**
     * Sets duplicate detection history time window.
     *
     * @param string $duplicateDetectionHistoryTimeWindow The duplicate
     *                                                    detection history time window
     */
    public function setDuplicateDetectionHistoryTimeWindow(
        $duplicateDetectionHistoryTimeWindow
    ) {
        $this->_topicDescription->setDuplicateDetectionHistoryTimeWindow(
            $duplicateDetectionHistoryTimeWindow
        );
    }

    /**
     * Gets enable batched operations.
     *
     * @return bool
     */
    public function getEnableBatchedOperations()
    {
        return $this->_topicDescription->getEnableBatchedOperations();
    }

    /**
     * Sets enable batched operations.
     *
     * @param bool $enableBatchedOperations Enables batched operations
     */
    public function setEnableBatchedOperations($enableBatchedOperations)
    {
        $this->_topicDescription->setEnableBatchedOperations(
            $enableBatchedOperations
        );
    }

    /**
     * Gets size in bytes.
     *
     * @return int
     */
    public function getSizeInBytes()
    {
        return $this->_topicDescription->getSizeInBytes();
    }

    /**
     * Sets size in bytes.
     *
     * @param int $sizeInBytes The size in bytes
     */
    public function setSizeInBytes($sizeInBytes)
    {
        $this->_topicDescription->setSizeInBytes($sizeInBytes);
    }
}
