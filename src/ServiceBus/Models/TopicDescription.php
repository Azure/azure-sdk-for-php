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
 * The description of the topic.
 *
 * @category  Microsoft
 *
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 *
 * @version   Release: 0.5.0_2016-11
 *
 * @link      http://msdn.microsoft.com/en-us/library/windowsazure/hh780749
 */
class TopicDescription
{
    /**
     * The default message time to live.
     *
     * @var string
     */
    private $_defaultMessageTimeToLive;

    /**
     * The maxizmu size in mega bytes.
     *
     * @integer
     */
    private $_maxSizeInMegabytes;

    /**
     * Requires duplicate detection.
     *
     * @var bool
     */
    private $_requiresDuplicateDetection;

    /**
     * Duplicate detection history time window.
     *
     * @var string
     */
    private $_duplicateDetectionHistoryTimeWindow;

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
     * Creates a topic description with default parameters.
     */
    public function __construct()
    {
    }

    /**
     * Creates a topic description object with specified XML string.
     *
     * @param string $topicDescriptionXml A XML based string describing
     *                                    the topic
     *
     * @return TopicDescription
     */
    public static function create($topicDescriptionXml)
    {
        $topicDescription = new self();
        $root = simplexml_load_string($topicDescriptionXml);
        $topicDescriptionArray = (array) $root;

        if (array_key_exists('DefaultMessageToLive', $topicDescriptionArray)) {
            $topicDescription->setDefaultMessageTimeToLive(
                (string) $topicDescriptionArray['DefaultMessageToLive']
            );
        }

        if (array_key_exists('MaxSizeInMegabytes', $topicDescriptionArray)) {
            $topicDescription->setMaxSizeInMegabytes(
                (int) $topicDescriptionArray['MaxSizeInMegabytes']
            );
        }

        if (array_key_exists(
            'RequiresDuplicateDetection',
            $topicDescriptionArray
        )
        ) {
            $topicDescription->setRequiresDuplicateDetection(
                (bool) $topicDescriptionArray['RequiresDuplicateDetection']
            );
        }

        if (array_key_exists(
            'DuplicateDetectionHistoryTimeWindow',
            $topicDescriptionArray
        )
        ) {
            $topicDescription->setDuplicateDetectionHistoryTimeWindow(
                (string) $topicDescriptionArray['DuplicateDetectionHistoryTimeWindow']
            );
        }

        if (array_key_exists(
            'EnableBatchedOperations',
            $topicDescriptionArray
        )) {
            $topicDescription->setEnableBatchedOperations(
                (bool) $topicDescriptionArray['EnableBatchedOperations']
            );
        }

        return $topicDescription;
    }

    /**
     * Gets default message time to live.
     *
     * @return string
     */
    public function getDefaultMessageTimeToLive()
    {
        return $this->_defaultMessageTimeToLive;
    }

    /**
     * Sets the default message to live.
     *
     * @param string $defaultMessageTimeToLive The default message time to live
     */
    public function setDefaultMessageTimeToLive($defaultMessageTimeToLive)
    {
        $this->_defaultMessageTimeToLive = $defaultMessageTimeToLive;
    }

    /**
     * Gets the msax size in mega bytes.
     *
     * @return int
     */
    public function getMaxSizeInMegabytes()
    {
        return $this->_maxSizeInMegabytes;
    }

    /**
     * Sets max size in mega bytes.
     *
     * @param int $maxSizeInMegabytes The maximum size in mega bytes
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
     * @param bool $requiresDuplicateDetection Sets requires duplicate detection
     */
    public function setRequiresDuplicateDetection($requiresDuplicateDetection)
    {
        $this->_requiresDuplicateDetection = $requiresDuplicateDetection;
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
     * Sets duplicate detection history time window.
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
     * Gets enable batched operations.
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
     * @param bool $enableBatchedOperations Enables batched operations
     */
    public function setEnableBatchedOperations($enableBatchedOperations)
    {
        $this->_enableBatchedOperations = $enableBatchedOperations;
    }

    /**
     * Gets size in bytes.
     *
     * @return int
     */
    public function getSizeInBytes()
    {
        return $this->_sizeInBytes;
    }

    /**
     * Sets size in bytes.
     *
     * @param int $sizeInBytes The size in bytes
     */
    public function setSizeInBytes($sizeInBytes)
    {
        $this->_sizeInBytes = $sizeInBytes;
    }
}
