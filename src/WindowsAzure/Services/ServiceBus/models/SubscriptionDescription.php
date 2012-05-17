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
 * @package   WindowsAzure\Services\ServiceBus\Models
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
 
namespace WindowsAzure\Services\ServiceBus\Models;
use WindowsAzure\Resources;
use WindowsAzure\Utilities;

/**
 * The subscription description.
 *
 * @category  Microsoft
 * @package   WindowsAzure\Services\ServiceBus\Models
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */

class SubscriptionDescription
{
    /**
     * The duration of the lock. 
     * 
     * @var integer 
     */
    private $_lockDuration;

    /**
     * Requires session.
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
     * The dead lettering on filter evaluation exception. 
     * 
     * @var string 
     */
    private $_deadLetteringOnFilterEvaluationExceptions;

    /**
     * The description of the default rule. 
     * 
     * @var string
     */
    private $_defaultRuleDescription;

    /**
     * The count of the message. 
     * 
     * @var integer
     */
    private $_messageCount;

    /**
     * The count of the delivery 
     * 
     * @var integer
     */
    private $_maxDeliveryCount;
    
    /**
     * Enables Batched operations. 
     * 
     * @var boolean 
     */
    private $_enableBatchedOperations;
    /**
     * @var bool 
     */

    /**
     * Gets the lock duration.
     *
     * @return integer
     */
    public function getLockDuration()
    {
        return $this->_lockDuration;
    }
    
    /**
     * Sets the lock duration.
     *
     * @param string $wrapAccessTokenResult The WRAP access token result.
     * 
     * @return none
     */
    public function setLockDuration($lockDuration)
    {
        $this->_lockDuration = $lockDuration;
    }

    public function getRequiresSession()
    {
        return $this->_requiresSession;
    }

    public function setRequiresSession($requiresSession)
    {
        $this->_requiresSession = $requiresSession;
    }

    public function getDefaultMessageTimeToLive()
    {
        return $this->_defaultMessageTimeToLive;
    }

    public function setDefaultMessageTimeToLive($defaultMessageTimeToLive)
    {   
        $this->_defaultMessageTimeToLive = $defaultMessageTimeToLive;
    }

    public function getDeadLetteringOnMessageExpiration()
    {
        return $this->_deadLetteringOnMessageExpiration;
    }

    public function setDeadLetteringOnMessageExpiration($deadLetteringOnMessageExpiration)
    {
        $this->_deadLetteringOnMessageExpiration = $deadLetteringOnMessageExpiration;
    }

    public function getDeadLetteringOnFilterEvaluationExceptions()
    {
        return $this->_deadLetteringOnFilterEvaluationExceptions;
    }

    public function setDeadLetteringOnFilterEvaluationExceptions($deadLetteringOnFilterEvaluationExceptions)
    {
        $this->_deadLetteringOnFilterEvaluationExceptions = $deadLetteringOnFilterEvaluationExceptions;
    }

    public function getDefaultRuleDescription()
    {
        return $this->_defaultRuleDescription;
    }

    public function setDefaultRuleDescription($defaultRuleDescription)
    {
        $this->_defaultRuleDescription = $defaultRuleDescription;
    }

    public function getMessageCount()
    {
        return $this->_messageCount;
    }

    public function setMessageCount($messageCount)
    {
        $this->_messageCount = $messageCount;
    }

    public function getMaxDeliveryCount()
    {
        return $this->_maxDeliveryCount;
    }

    public function setMaxDeliveryCount($maxDeliveryCount)
    {
        $this->_maxDeliveryCount = $maxDeliveryCount;
    }

    public function getEnableBatchedOperation()
    {
        return $this->_enableBatchedOperation;
    }

    public function setEnableBatchedOperation($enableBatchedOperation)
    {
        $this->_enableBatchedOperation = $enableBatchedOperation; 
    }
}

