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
use WindowsAzure\Common\Internal\Resources;
use WindowsAzure\Common\Internal\Utilities;

/**
 * An active WRAP access Token.
 *
 * @category  Microsoft
 * @package   WindowsAzure\ServiceBus\Models
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
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
     * @var boolean 
     */
    private $_requiresDuplicateDetection;

    /** 
     * Duplicate detection history time window. 
     * 
     * @var integer
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
     * @var integer
     */  
    private $_sizeInBytes;

    public static function create($topicDescriptionXml)
    {
        $topicDescription = new TopicDescription();
        $root = simplexml_load_string($topicDescriptionXml);
        $topicDescriptionArray = (array)$root;

        if (array_key_exists('DefaultMessageToLive', $topicDescriptionArray))
        {
            $topicDescription->setDefaultMessageToLive(
                $topicDescriptionArray['DefaultMessageToLive']
            );
        }

        if (array_key_exists('MaxSizeInMegabytes', $topicDescriptionArray))
        {
            $topicDescription->setMaxSizeInMegabytes(
                $topicDescriptionArray['MaxSizeInMegabytes']
            );
        }

        if (array_key_exists('RequiresDuplicateDetection', $topicDescriptionArray))
        {
            $topicDescription->setRequiresDuplicateDetection(
                $topicDescriptionArray['RequiresDuplicateDetection']
            );
        }

        if (array_key_exists('DuplicateDetectionHistoryTimeWindow', $topicDescriptionArray))
        {
            $topicDescription->setDuplicateDetectionHistoryTimeWindow(
                $topicDescriptionArray['DuplicateDetectionHistoryTimeWindow']
            );
        }

        if (array_key_exists('EnableBatchedOperations', $topicDescriptionArray))
        {
            $topicDescription->setEnableBatchedOperations(
                $topicDescriptionArray['EnableBatchedOperations']
            );
        }

        return $topicDescription;
    }

    /**
     * Creates a topic description with specified parameters. 
     */
    public function __construct()
    {
        $this->_defaultMessageToLive = Resources::EMPTY_STRING;
        $this->_maxSizeInMegabytes = Resources::EMPTY_STRING;
        $this->_requiresDuplicateDetection = Resources::EMPTY_STRING;
        $this->_duplicateDetectionHistoryTimeWindow = Resources::EMPTY_STRING;
        $this->_enableBatchedOperations = Resources::EMPTY_STRING;
        $this->_sizeInBytes = Resources::EMPTY_STRING;
    }

    /**
     * Gets default message to live.
     *
     * @return string
     */
    public function getDefaultMessageToLive()
    {
        $this->_defaultMessageToLive;
    }
    
    /**
     * Sets the default message to live.
     *
     * @param string $defaultMessageToLive The default message to live.
     * 
     * @return none
     */
    public function setDefaultMessageToLive($defaultMessageToLive)
    {
        $this->_defaultMessageToLive = $defaultMessageToLive;
    }

    /**
     * Gets the msax size in mega bytes. 
     * 
     * @return integer
     */
    public function getMaxSizeInMegabytes()
    {
        return $this->_maxSizeInMegabytes;
    }

    /**
     * Sets max size in mega bytes. 
     * 
     * @param integer $maxSizeInMegabytes The maximum size in mega bytes. 
     */
    public function setMaxSizeInMegabytes($maxSizeInMegabytes)
    {
        $this->_maxSizeInMegabytes = $maxSizeInMegabytes;
    }

    /**
     * Gets requires duplicate detection.
     * 
     * @return boolean 
     */
    public function getRequiresDuplicateDetection()
    {
        return $this->_requiresDuplicateDetection;
    }

    /**
     * Sets requires duplicate detection. 
     * 
     * @param boolean $requiresDuplicateDetection Sets requires duplicate detection. 
     */
    public function setRequiresDuplicateDetection($requiresDuplicateDetection)
    {
        $this->_requiresDuplicateDetection = $requiresDuplicateDetection;
    }

    /**
     * Gets duplicate detection history time window. 
     * 
     * @return boolean
     */
    public function getDuplicateDetectionHistoryTimeWindow()
    {
        return $this->_duplicateDetectionHistoryTimeWindow;
    }

    /**
     * Sets duplicate detection history time window. 
     * 
     * @param boolean $duplicateDetectionHistoryTimeWindow
     */
    public function setDuplicateDetectionHistoryTimeWindow($duplicateDetectionHistoryTimeWindow)
    {
        $this->_duplicateDetectionHistoryTimeWindow = $duplicateDetectionHistoryTimeWindow;
    }

    /**
     * Gets enable batched operations. 
     * 
     * @return boolean
     */
    public function getEnableBatchedOperations()
    {
        return $this->_enableBatchedOperations;
    }

    /**
     * Sets enable batched operations.
     * 
     * @param boolean $enableBatchedOperations Enables batched operations.
     */
    public function setEnableBatchedOperations($enableBatchedOperations)
    {
        $this->_enableBatchedOperations = $enableBatchedOperations;
    }

    /**
     * Gets size in bytes. 
     * 
     * @return integer 
     */
    public function getSizeInBytes()
    {
        return $this->_sizeInBytes;
    }

    /** 
     * Sets size in bytes.
     * 
     * @param integer $sizeInBytes The size in bytes. 
     */
    public function setSizeInBytes($sizeInBytes)
    {
        $this->_sizeInBytes = $sizeInBytes;
    }

}

