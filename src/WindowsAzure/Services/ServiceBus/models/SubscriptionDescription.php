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
 * @package   WindowsAzure\Services\Subscription\Models
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
class SubscriptionDescription
{
    private $_lockDuration;
    private $_requiresSession;
    private $_defaultMessageTimeToLive;
    private $_deadLetteringOnMessageExpiration;
    private $_deadLetteringOnFilterEvaluationExceptions;
    private $_defaultRuleDescription;
    private $_messageCount;
    private $_maxDeliveryCount;
    private $_enableBatchedOperations;
    /**
     * @var bool 
     */

    /** 
     * @var integer
     */
    /**
     * Creates an ActiveToken with specified WRAP 
     * access token result.
     *
     * @param array $wrapAccessTokenResult A WRAP access token result.
     * 
     */

    /**
     * Gets WRAP access token.
     *
     * @return WrapAccessTokenResult
     */
    public function getLockDuration()
    {
        return $this->_lockDuration;
    }
    
    /**
     * Sets WRAP access token.
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

