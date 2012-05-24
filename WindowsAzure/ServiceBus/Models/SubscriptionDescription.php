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
 * The subscription description.
 *
 * @category  Microsoft
 * @package   WindowsAzure\ServiceBus\Models
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
     * Creates a subscription description instance with default 
     * parameter. 
     */
    public function __construct()
    {
    }

    /**
     * Creates a subscription description with specified XML string. 
     *
     * @param string $subscriptionDescription The subscription description.
     */
    public static function create($subscriptionDescriptionXml)
    {
        $subscriptionDescription = new SubscriptionDescription();
        $root = simplexml_load_string($subscriptionDescriptionXml);
        $subscriptionDescriptionArray = (array)$root;
        if (array_key_exists('LockDuration', $subscriptionDescriptionArray)) {
            $subscriptionDescription->setLockDuration($subscriptionDescriptionArray['LockDuration']);
        }

        if (array_key_exists('RequiresSession', $subscriptionDescriptionArray)) {
            $subscriptionDescription->setRequiresSession($subscriptionDescriptionArray['RequiresSession']);
        }

        if (array_key_exists('DefaultMessageTimeToLive', $subscriptionDescriptionArray)) {
            $subscriptionDescription->setDefaultMessageTimeToLive($subscriptionDescriptionArray['DefaultMessageTimeToLive']);
        }

        if (array_key_exists('DeadLetteringOnMessageExpiration', $subscriptionDescriptionArray)) {
            $subscriptionDescription->setDeadLetteringOnMessageExpiration($subscriptionDescriptionArray['DeadLetteringOnMessageExpiration']);
        }

        if (array_key_exists('DeadLetteringOnFilterEvaluationException', $subscriptionDescriptionArray)) {
            $subscriptionDescription->setDeadLetteringOnFilterEvaluationException(
                $subscriptionDescriptionArray['DeadLetteringOnFilterEvaluationException']);
        }

        if (array_key_exists('DefaultRuleDescription', $subscriptionDescriptionArray)) {
            $subscriptionDescription->setDefaultRuleDescription($subscriptionDescriptionArray['DefaultRuleDescription']);
        }

        if (array_key_exists('MessageCount', $subscriptionDescriptionArray)) {
            $subscriptionDescription->setMessageCount($subscriptionDescriptionArray['MessageCount']);
        }

        if (array_key_exists('MaxDeliveryCount', $subscriptionDescriptionArray)) {
            $subscriptionDescription->setMaxDeliveryCount($subscriptionDescriptionArray['MaxDeliveryCount']);
        }

        if (array_key_exists('EnableBatchedOperations', $subscriptionDescriptionArray)) {
            $subscriptionDescription->setEnableBatchedOperations($subscriptionDescriptionArray['EnableBatchedOperations']);
        }

        return $subscriptionDescription;
    }

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

    /**
     * Gets requires session.
     * 
     * @return boolean
     */
    public function getRequiresSession()
    {
        return $this->_requiresSession;
    }

    /**
     * Sets the requires session.
     * 
     * @param boolean $requiresSession The requires session. 
     */
    public function setRequiresSession($requiresSession)
    {
        $this->_requiresSession = $requiresSession;
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
     * Sets default message time to live. 
     * 
     * @param string $defaultMessagetimeToLive The default message time to live. 
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
     * @param string $deadLetteringOnMessageExpiration The dead lettering 
     * on message expiration.
     */
    public function setDeadLetteringOnMessageExpiration($deadLetteringOnMessageExpiration)
    {
        $this->_deadLetteringOnMessageExpiration = $deadLetteringOnMessageExpiration;
    }

    /**
     * Gets dead lettering on filter evaluation exceptions. 
     * 
     * @return string 
     */
    public function getDeadLetteringOnFilterEvaluationExceptions()
    {
        return $this->_deadLetteringOnFilterEvaluationExceptions;
    }

    /**
     * Sets dead lettering on filter evaluation exceptions. 
     * 
     * @param string $deadLetteringOnFilterEvaluationException Sets dead lettering 
     * on filter evaluation exceptions. 
     */
    public function setDeadLetteringOnFilterEvaluationExceptions($deadLetteringOnFilterEvaluationExceptions)
    {
        $this->_deadLetteringOnFilterEvaluationExceptions = $deadLetteringOnFilterEvaluationExceptions;
    }

    /**
     * Gets the default rule description. 
     * 
     * @return RuleDescription 
     */
    public function getDefaultRuleDescription()
    {
        return $this->_defaultRuleDescription;
    }

    /**
     * Sets the default rule description.
     * 
     * @param string $defaultRuleDescription The default rule description. 
     */
    public function setDefaultRuleDescription($defaultRuleDescription)
    {
        $this->_defaultRuleDescription = $defaultRuleDescription;
    }

    /**
     * Gets the count of the message. 
     * 
     * @return integer
     */
    public function getMessageCount()
    {
        return $this->_messageCount;
    } 

    /**
     * Sets the count of the message.
     * 
     * @param string $messageCount The count of the message. 
     */
    public function setMessageCount($messageCount)
    {
        $this->_messageCount = $messageCount;
    }

    /**
     * Gets maximum delivery count.
     * 
     * @return integer
     */
    public function getMaxDeliveryCount()
    {
        return $this->_maxDeliveryCount;
    }

    /**
     * Sets maximum delivery count. 
     * 
     * @param integer $maxDeliveryCount The maximum delivery count. 
     */
    public function setMaxDeliveryCount($maxDeliveryCount)
    {
        $this->_maxDeliveryCount = $maxDeliveryCount;
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
     * @param boolean $enableBatchedOperations Enable batched operations. 
     */
    public function setEnableBatchedOperations($enableBatchedOperations)
    {
        $this->_enableBatchedOperations = $enableBatchedOperations; 
    }
}

