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
 * A description of the queue.
 *
 * @category  Microsoft
 * @package   WindowsAzure\Services\ServiceBus\Models
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
class QueueDescription
{
    /**
     * The duration of the lock.     
     * 
     * @var integer
     */
    private $_lockDuration;

    /** 
     * The maximum size in mega bytes. 
     * 
     * @var integer
     */
    private $_maxSizeInMegabytes;

    /**
     * Requires duplicate detection for queue.
     * 
     * @var boolean 
     */
    private $_requiresDuplicateDetection;

    /**
     * Requires session for the queue. 
     * 
     * @var boolean 
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
     * @var integer
     */
    private $_duplicateDetectionHistoryTimeWindow;

    /**
     * The maximum delivery count. 
     * 
     * @var integer
     */
    private $_maxDeliveryCount;

    /**
     * Enables batched operations. 
     * 
     * @var boolean 
     */
    private $_enableBatchedOperations;

    /**
     * The size in bytes. 
     * 
     * @var integer 
     */
    private $_sizeInBytes;

    /**
     * The count of the message. 
     * 
     * @var integer 
     */ 
    private $_messageCount;    

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
     * @param string $lockDuration The lock duration.
     * 
     * @return none
     */
    public function setLockDuration($lockDuration)
    {
        $this->_lockDuration = $lockDuration;
    }
    
    /**
     * gets the maximum size in mega bytes. 
     * 
     * @return integer 
     */
    public function getMaxSizeInMegabytes()
    {
        return $this->_maxSizeInMegabytes;
    }

    /**
     * Sets the lock duration.
     *
     * @param string $lockDuration The lock duration.
     * 
     * @return none
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
    public function getRequeiresDuplicateDetection()
    {
        return $this->_requiresDuplicateDetection;
    }

    /**
     * Sets the lock duration.
     *
     * @param string $lockDuration The lock duration.
     * 
     * @return none
     */
    public function setRequiresDuplicateDetection($requiresDuplicateDetection)
    {
        $this->_requiresDuplicateDetection = $requiresDuplicateDetection;
    }

    /**
     * Gets the requires session. 
     * 
     * @return boolean
     */ 
    public function getRequiresSession()
    {
        return $this->_requiresSession;
    }

    /**
     * Sets the lock duration.
     *
     * @param string $lockDuration The lock duration.
     * 
     * @return none
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
     * Sets the lock duration.
     *
     * @param string $lockDuration The lock duration.
     * 
     * @return none
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
     * Sets the lock duration.
     *
     * @param string $lockDuration The lock duration.
     * 
     * @return none
     */
    public function setDeadLetteringOnMessageExpiration($deadLetteringOnMessageExpiration)
    {
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
     * Sets the lock duration.
     *
     * @param string $lockDuration The lock duration.
     * 
     * @return none
     */
    public function setDuplicateDetectionHistoryTimeWindow($duplicateDetectionHistoryTimeWindow)
    {
        $this->_duplicateDetectionHistoryTimeWindow = $duplicateDEtectionHistoryTimeWindow;
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
     * Sets the lock duration.
     *
     * @param string $lockDuration The lock duration.
     * 
     * @return none
     */
    public function setMaxDeliveryCount($maxDeliveryCount)
    {
        $this->_maxDeliveryCount = $maxDeliveryCount;
    }

    /**
     * Gets enable batched operation.
     * 
     * @return boolean
     */
    public function getEnableBatchedOperation()
    {
        return $this->_enableBatchedOperation;
    }

    /**
     * Sets the lock duration.
     *
     * @param string $lockDuration The lock duration.
     * 
     * @return none
     */
    public function setEnableBatchedOperation($enableBatchedOperation)
    {
        $this->_enableBatchedOperation = $enableBatchedOperation; 
    }

    /**
     * Gets the size in bytes. 
     * 
     * @return integer
     */
    public function getSizeInBytes()
    {
        return $this->_sizeInBytes;
    }

    /**
     * Sets the lock duration.
     *
     * @param string $lockDuration The lock duration.
     * 
     * @return none
     */
    public function setSizeInBytes($sizeInBytes)
    {
        $this->_sizeInBytes = $sizeInBytes;
    }

    /**
     * Gets the message count. 
     * 
     * @return integer
     */
    public function getMessageCount()
    {
        return $this->_messageCount;
    }

    /**
     * Sets the lock duration.
     *
     * @param string $lockDuration The lock duration.
     * 
     * @return none
     */
    public function setMessageCount($messageCount)
    {
        $this->_messageCount = $messageCount;
    }
}

