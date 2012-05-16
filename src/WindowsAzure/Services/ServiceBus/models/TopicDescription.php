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
 * @package   WindowsAzure\Services\Queue\Models
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
 
namespace WindowsAzure\Services\ServiceBus\Models;
use WindowsAzure\Resources;
use WindowsAzure\Utilities;

/**
 * An active WRAP access Token.
 *
 * @category  Microsoft
 * @package   WindowsAzure\Services\ServiceBus\Models
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
class TopicDescription
{
    /** 
     * The WRAP access token result. 
     * 
     * @var integer
     */

    /** 
     * When the WRAP access token expires.
     * 
     * @var string
     */
    private $_defaultMessageTimeToLive;
    private $_maxSizeInMegabytes;

    /**
     * @var bool 
     */
    private $_requiresDuplicateDetection;

    /** 
     * @var integer
     */
    private $_duplicateDetectionHistoryTimeWindow;
    
    /**
     * @var bool
     */
    private $_enableBatchedOperations;
   

    /**
     * @var integer
     */  
    private $_sizeInBytes;

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
     * Sets WRAP access token.
     *
     * @param string $wrapAccessTokenResult The WRAP access token result.
     * 
     * @return none
     */
    public function setDefaultMessageToLive($defaultMessageToLive)
    {
        $this->_defaultMessageToLive = $defaultMessageToLive;
    }

    public function getMaxSizeInMegabytes()
    {
        return $this->_maxSizeInMegabytes;
    }

    public function setMaxSizeInMegabytes($maxSizeInMegabytes)
    {
        $this->_maxSizeInMegabytes = $maxSizeInMegabytes;
    }

    public function getRequeiresDuplicateDetection()
    {
        return $this->_requiresDuplicateDetection;
    }

    public function setRequiresDuplicateDetection($requiresDuplicateDetection)
    {
        $this->_requiresDuplicateDetection = $requiresDuplicateDetection;
    }

    public function getDuplicateDetectionHistoryTimeWindow()
    {
        return $this->_duplicateDetectionHistoryTimeWindow;
    }

    public function setDuplicateDetectionHistoryTimeWindow($duplicateDetectionHistoryTimeWindow)
    {
        $this->_duplicateDetectionHistoryTimeWindow = $duplicateDetectionHistoryTimeWindow;
    }

    public function getEnableBatchedOperations()
    {
        return $this->_enableBatchedOperations;
    }

    public function setEnableBatchedOperations($enableBatchedOperations)
    {
        $this->_enableBatchedOperations = $enableBatchedOperations;
    }

    public function getSizeInBytes()
    {
        return $this->_sizeInBytes;
    }

    public function setSizeInBytes($sizeInBytes)
    {
        $this->_sizeInBytes = $sizeInBytes;
    }

}

