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

/**
 * The description of a queue.
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
class QueueDescription
{
    /**
     * The duration of the lock.
     *
     * @var string
     */
    private $_lockDuration;

    /**
     * The maximum size in mega bytes.
     *
     * @var int
     */
    private $_maxSizeInMegabytes;

    /**
     * Requires duplicate detection for queue.
     *
     * @var bool
     */
    private $_requiresDuplicateDetection;

    /**
     * Requires session for the queue.
     *
     * @var bool
     */
    private $_requiresSession;

    /**
     * The default message time to live.
     *
     * @var string
     */
    private $_defaultMessageTimeToLive;

    /**
     * The dead lettering on message expiration.
     *
     * @var string
     */
    private $_deadLetteringOnMessageExpiration;

    /**
     * The duplicate detection history time window.
     *
     * @var int
     */
    private $_duplicateDetectionHistoryTimeWindow;

    /**
     * The maximum delivery count.
     *
     * @var int
     */
    private $_maxDeliveryCount;

    /**
     * Enables batched operations.
     *
     * @var bool
     */
    private $_enableBatchedOperations;

    /**
     * The size in bytes.
     *
     * @var int
     */
    private $_sizeInBytes;

    /**
     * The count of the message.
     *
     * @var int
     */
    private $_messageCount;

    // @codingStandardsIgnoreStart

    /**
     * Creates a queue description object with specified XML string.
     *
     * @param string $queueDescriptionXml A XML based string describing
     *                                    the queue
     *
     * @return QueueDescription
     */
    public static function create($queueDescriptionXml)
    {
        $queueDescription = new self();
        $root = simplexml_load_string(
            $queueDescriptionXml
        );
        $queueDescriptionArray = (array) $root;
        if (array_key_exists('LockDuration', $queueDescriptionArray)) {
            $queueDescription->setLockDuration(
                (string) $queueDescriptionArray['LockDuration']
            );
        }

        if (array_key_exists('MaxSizeInMegabytes', $queueDescriptionArray)) {
            $queueDescription->setMaxSizeInMegabytes(
                (int) $queueDescriptionArray['MaxSizeInMegabytes']
            );
        }

        if (array_key_exists(
            'RequiresDuplicateDetection',
            $queueDescriptionArray
        )
        ) {
            $queueDescription->setRequiresDuplicateDetection(
                (bool) $queueDescriptionArray['RequiresDuplicateDetection']
            );
        }

        if (array_key_exists('RequiresSession', $queueDescriptionArray)) {
            $queueDescription->setRequiresSession(
                (bool) $queueDescriptionArray['RequiresSession']
            );
        }

        if (array_key_exists(
            'DefaultMessageTimeToLive',
            $queueDescriptionArray
        )
        ) {
            $queueDescription->setDefaultMessageTimeToLive(
                (string) $queueDescriptionArray['DefaultMessageTimeToLive']
            );
        }

        if (array_key_exists(
            'DeadLetteringOnMessageExpiration',
            $queueDescriptionArray
        )
        ) {
            $queueDescription->setDeadLetteringOnMessageExpiration(
                (string) $queueDescriptionArray['DeadLetteringOnMessageExpiration']
            );
        }

        if (array_key_exists(
            'DuplicateDetectionHistoryTimeWindow',
            $queueDescriptionArray
        )
        ) {
            $queueDescription->setDuplicateDetectionHistoryTimeWindow(
                (string) $queueDescriptionArray['DuplicateDetectionHistoryTimeWindow']
            );
        }

        if (array_key_exists('MaxDeliveryCount', $queueDescriptionArray)) {
            $queueDescription->setMaxDeliveryCount(
                (int) $queueDescriptionArray['MaxDeliveryCount']
            );
        }

        if (array_key_exists('EnableBatchedOperations', $queueDescriptionArray)) {
            $queueDescription->setEnableBatchedOperations(
                (bool) $queueDescriptionArray['EnableBatchedOperations']
            );
        }

        if (array_key_exists('SizeInBytes', $queueDescriptionArray)) {
            $queueDescription->setSizeInBytes(
                (int) $queueDescriptionArray['SizeInBytes']
            );
        }

        if (array_key_exists('MessageCount', $queueDescriptionArray)) {
            $queueDescription->setMessageCount(
                (int) $queueDescriptionArray['MessageCount']
            );
        }

        return $queueDescription;
    }

    // @codingStandardsIgnoreEnd

    /**
     * Creates a queue description instance with default parameters.
     */
    public function __construct()
    {
    }

    /**
     * Gets the lock duration.
     *
     * @return string
     */
    public function getLockDuration()
    {
        return $this->_lockDuration;
    }

    /**
     * Sets the lock duration.
     *
     * @param string $lockDuration The lock duration
     */
    public function setLockDuration($lockDuration)
    {
        $this->_lockDuration = $lockDuration;
    }

    /**
     * gets the maximum size in mega bytes.
     *
     * @return int
     */
    public function getMaxSizeInMegabytes()
    {
        return $this->_maxSizeInMegabytes;
    }

    /**
     * Sets the max size in mega bytes.
     *
     * @param int $maxSizeInMegabytes The max size in mega bytes
     */
    public function setMaxSizeInMegabytes($maxSizeInMegabytes)
    {
        $this->_maxSizeInMegabytes = $maxSizeInMegabytes;
    }

    /**
     * Gets requires duplicate detection.
     *
     * @return bool
     */
    public function getRequiresDuplicateDetection()
    {
        return $this->_requiresDuplicateDetection;
    }

    /**
     * Sets requires duplicate detection.
     *
     * @param bool $requiresDuplicateDetection If duplicate detection is required
     */
    public function setRequiresDuplicateDetection($requiresDuplicateDetection)
    {
        $this->_requiresDuplicateDetection = $requiresDuplicateDetection;
    }

    /**
     * Gets the requires session.
     *
     * @return bool
     */
    public function getRequiresSession()
    {
        return $this->_requiresSession;
    }

    /**
     * Sets the requires session.
     *
     * @param bool $requiresSession If session is required
     */
    public function setRequiresSession($requiresSession)
    {
        $this->_requiresSession = $requiresSession;
    }

    /**
     * gets the default message time to live.
     *
     * @return string
     */
    public function getDefaultMessageTimeToLive()
    {
        return $this->_defaultMessageTimeToLive;
    }

    /**
     * Sets the default message time to live.
     *
     * @param string $defaultMessageTimeToLive The default message time to live
     */
    public function setDefaultMessageTimeToLive($defaultMessageTimeToLive)
    {
        $this->_defaultMessageTimeToLive = $defaultMessageTimeToLive;
    }

    /**
     * Gets dead lettering on message expiration.
     *
     * @return string
     */
    public function getDeadLetteringOnMessageExpiration()
    {
        return $this->_deadLetteringOnMessageExpiration;
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
        $this->_deadLetteringOnMessageExpiration = $deadLetteringOnMessageExpiration;
    }

    /**
     * Gets duplicate detection history time window.
     *
     * @return string
     */
    public function getDuplicateDetectionHistoryTimeWindow()
    {
        return $this->_duplicateDetectionHistoryTimeWindow;
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
        $value = $duplicateDetectionHistoryTimeWindow;

        $this->_duplicateDetectionHistoryTimeWindow = $value;
    }

    /**
     * Gets maximum delivery count.
     *
     * @return string
     */
    public function getMaxDeliveryCount()
    {
        return $this->_maxDeliveryCount;
    }

    /**
     * Sets the maximum delivery count.
     *
     * @param string $maxDeliveryCount The maximum delivery count
     */
    public function setMaxDeliveryCount($maxDeliveryCount)
    {
        $this->_maxDeliveryCount = $maxDeliveryCount;
    }

    /**
     * Gets enable batched operation.
     *
     * @return bool
     */
    public function getEnableBatchedOperations()
    {
        return $this->_enableBatchedOperations;
    }

    /**
     * Sets enable batched operations.
     *
     * @param bool $enableBatchedOperations Enable batched operations
     */
    public function setEnableBatchedOperations($enableBatchedOperations)
    {
        $this->_enableBatchedOperations = $enableBatchedOperations;
    }

    /**
     * Gets the size in bytes.
     *
     * @return int
     */
    public function getSizeInBytes()
    {
        return $this->_sizeInBytes;
    }

    /**
     * Sets the size in bytes.
     *
     * @param int $sizeInBytes The size in bytes
     */
    public function setSizeInBytes($sizeInBytes)
    {
        $this->_sizeInBytes = $sizeInBytes;
    }

    /**
     * Gets the message count.
     *
     * @return int
     */
    public function getMessageCount()
    {
        return $this->_messageCount;
    }

    /**
     * Sets the message count.
     *
     * @param string $messageCount The count of the message
     */
    public function setMessageCount($messageCount)
    {
        $this->_messageCount = $messageCount;
    }
}
