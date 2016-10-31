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

use WindowsAzure\Common\Internal\Atom\Content;
use WindowsAzure\Common\Internal\Atom\Entry;
use WindowsAzure\Common\Internal\Resources;
use WindowsAzure\Common\Internal\Serialization\XmlSerializer;
use WindowsAzure\Common\Internal\Validate;

/**
 * The information of a queue.
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
class QueueInfo
{
    /**
     * The entry of the queue info.
     *
     * @var Entry
     */
    private $_entry;

    /**
     * The description of the queue.
     *
     * @var QueueDescription
     */
    private $_queueDescription;

    /**
     * Creates a QueueInfo instance with specified parameters.
     *
     * @param string           $title            The name of the queue
     * @param QueueDescription $queueDescription The description of the queue
     */
    public function __construct(
        $title = Resources::EMPTY_STRING,
        $queueDescription = null
    ) {
        Validate::isString($title, 'title');
        if (is_null($queueDescription)) {
            $queueDescription = new QueueDescription();
        }

        $this->_queueDescription = $queueDescription;
        $this->_entry = new Entry();
        $this->_entry->setTitle($title);
        $this->_entry->setAttribute(
            Resources::XMLNS,
            Resources::SERVICE_BUS_NAMESPACE
        );
    }

    /**
     * Populates the properties of the queue info instance with a
     * ATOM ENTRY XML string.
     *
     * @param string $entryXml An ATOM entry based XML string
     */
    public function parseXml($entryXml)
    {
        $this->_entry->parseXml($entryXml);
        $content = $this->_entry->getContent();
        if (is_null($content)) {
            $this->_queueDescription = null;
        } else {
            $this->_queueDescription = QueueDescription::create($content->getText());
        }
    }

    /**
     * Returns a XML string based on ATOM ENTRY schema.
     *
     * @param \XMLWriter $xmlWriter The XML writer
     */
    public function writeXml(\XMLWriter $xmlWriter)
    {
        $content = null;
        if (!is_null($this->_queueDescription)) {
            $content = new Content();
            $content->setText(
                XmlSerializer::objectSerialize(
                    $this->_queueDescription,
                    'QueueDescription'
                )
            );
            $content->setType(Resources::XML_CONTENT_TYPE);
        }
        $this->_entry->setContent($content);
        $this->_entry->writeXml($xmlWriter);
    }

    /**
     * Gets the description of the queue.
     *
     * @return QueueDescription
     */
    public function getQueueDescription()
    {
        return $this->_queueDescription;
    }

    /**
     * Sets the description of the queue.
     *
     * @param QueueDescription $queueDescription The description of the queue
     */
    public function setQueueDescription(QueueDescription $queueDescription)
    {
        $this->_queueDescription = $queueDescription;
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
    public function setEntry($entry)
    {
        $this->_entry = $entry;
    }

    /**
     * Gets the lock duration.
     *
     * @return string
     */
    public function getLockDuration()
    {
        return $this->_queueDescription->getLockDuration();
    }

    /**
     * Sets the lock duration.
     *
     * @param string $lockDuration The lock duration
     */
    public function setLockDuration($lockDuration)
    {
        $this->_queueDescription->setLockDuration($lockDuration);
    }

    /**
     * gets the maximum size in mega bytes.
     *
     * @return int
     */
    public function getMaxSizeInMegabytes()
    {
        return $this->_queueDescription->getMaxSizeInMegabytes();
    }

    /**
     * Sets the max size in mega bytes.
     *
     * @param int $maxSizeInMegabytes The max size in mega bytes
     */
    public function setMaxSizeInMegabytes($maxSizeInMegabytes)
    {
        $this->_queueDescription->setMaxSizeInMegabytes($maxSizeInMegabytes);
    }

    /**
     * Gets requires duplicate detection.
     *
     * @return bool
     */
    public function getRequiresDuplicateDetection()
    {
        return $this->_queueDescription->getRequiresDuplicateDetection();
    }

    /**
     * Sets requires duplicate detection.
     *
     * @param bool $requiresDuplicateDetection If duplicate detection is required
     */
    public function setRequiresDuplicateDetection($requiresDuplicateDetection)
    {
        $this->_queueDescription->setRequiresDuplicateDetection(
            $requiresDuplicateDetection
        );
    }

    /**
     * Gets the requires session.
     *
     * @return bool
     */
    public function getRequiresSession()
    {
        return $this->_queueDescription->getRequiresSession();
    }

    /**
     * Sets the requires session.
     *
     * @param bool $requiresSession If session is required
     */
    public function setRequiresSession($requiresSession)
    {
        $this->_queueDescription->setRequiresSession($requiresSession);
    }

    /**
     * gets the default message time to live.
     *
     * @return string
     */
    public function getDefaultMessageTimeToLive()
    {
        return $this->_queueDescription->getDefaultMessageTimeToLive();
    }

    /**
     * Sets the default message time to live.
     *
     * @param string $defaultMessageTimeToLive The default message time to live
     */
    public function setDefaultMessageTimeToLive($defaultMessageTimeToLive)
    {
        $this->_queueDescription->setDefaultMessageTimeToLive(
            $defaultMessageTimeToLive
        );
    }

    /**
     * Gets dead lettering on message expiration.
     *
     * @return string
     */
    public function getDeadLetteringOnMessageExpiration()
    {
        return $this->_queueDescription->getDeadLetteringOnMessageExpiration();
    }

    /**
     * Sets dead lettering on message expiration.
     *
     * @param string $deadLetteringOnMessageExpiration The dead lettering on
     *                                                 message expiration
     */
    public function setDeadLetteringOnMessageExpiration(
        $deadLetteringOnMessageExpiration
    ) {
        $this->_queueDescription->setDeadLetteringOnMessageExpiration(
            $deadLetteringOnMessageExpiration
        );
    }

    /**
     * Gets duplicate detection history time window.
     *
     * @return string
     */
    public function getDuplicateDetectionHistoryTimeWindow()
    {
        return $this->_queueDescription->getDuplicateDetectionHistoryTimeWindow();
    }

    /**
     * Sets the duplicate detection history time window.
     *
     * @param string $duplicateDetectionHistoryTimeWindow The duplicate
     *                                                    detection history time window
     */
    public function setDuplicateDetectionHistoryTimeWindow(
        $duplicateDetectionHistoryTimeWindow
    ) {
        $this->_queueDescription->setDuplicateDetectionHistoryTimeWindow(
            $duplicateDetectionHistoryTimeWindow
        );
    }

    /**
     * Gets maximum delivery count.
     *
     * @return string
     */
    public function getMaxDeliveryCount()
    {
        return $this->_queueDescription->getMaxDeliveryCount();
    }

    /**
     * Sets the maximum delivery count.
     *
     * @param string $maxDeliveryCount The maximum delivery count
     */
    public function setMaxDeliveryCount($maxDeliveryCount)
    {
        $this->_queueDescription->setMaxDeliveryCount($maxDeliveryCount);
    }

    /**
     * Gets enable batched operation.
     *
     * @return bool
     */
    public function getEnableBatchedOperations()
    {
        return $this->_queueDescription->getEnableBatchedOperations();
    }

    /**
     * Sets enable batched operations.
     *
     * @param bool $enableBatchedOperations Enable batched operations
     */
    public function setEnableBatchedOperations($enableBatchedOperations)
    {
        $this->_queueDescription->setEnableBatchedOperations(
            $enableBatchedOperations
        );
    }

    /**
     * Gets the size in bytes.
     *
     * @return int
     */
    public function getSizeInBytes()
    {
        return $this->_queueDescription->getSizeInBytes();
    }

    /**
     * Sets the size in bytes.
     *
     * @param int $sizeInBytes The size in bytes
     */
    public function setSizeInBytes($sizeInBytes)
    {
        $this->_queueDescription->setSizeInBytes($sizeInBytes);
    }

    /**
     * Gets the message count.
     *
     * @return int
     */
    public function getMessageCount()
    {
        return $this->_queueDescription->getMessageCount();
    }

    /**
     * Sets the message count.
     *
     * @param string $messageCount The count of the message
     */
    public function setMessageCount($messageCount)
    {
        $this->_queueDescription->setMessageCount($messageCount);
    }
}
