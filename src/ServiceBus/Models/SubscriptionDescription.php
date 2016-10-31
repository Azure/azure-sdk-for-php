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
 * The subscription description.
 *
 * @category  Microsoft
 *
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 *
 * @version   Release: 0.5.0_2016-11
 *
 * @link      http://msdn.microsoft.com/en-us/library/windowsazure/hh780763
 */
class SubscriptionDescription
{
    /**
     * The duration of the lock.
     *
     * @var string
     */
    private $_lockDuration;

    /**
     * Requires session.
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
     * @var int
     */
    private $_messageCount;

    /**
     * The count of the delivery.
     *
     * @var int
     */
    private $_maxDeliveryCount;

    /**
     * Enables Batched operations.
     *
     * @var bool
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
     * @param string $subscriptionDescriptionXml An XML based subscription
     *                                           description
     *
     * @return SubscriptionDescription
     */
    public static function create($subscriptionDescriptionXml)
    {
        $subscriptionDescription = new self();
        $root = simplexml_load_string(
            $subscriptionDescriptionXml
        );
        $subscriptionDescriptionArray = (array) $root;
        if (array_key_exists('LockDuration', $subscriptionDescriptionArray)) {
            $subscriptionDescription->setLockDuration(
                (string) $subscriptionDescriptionArray['LockDuration']
            );
        }

        if (array_key_exists('RequiresSession', $subscriptionDescriptionArray)) {
            $subscriptionDescription->setRequiresSession(
                (bool) $subscriptionDescriptionArray['RequiresSession']
            );
        }

        if (array_key_exists(
            'DefaultMessageTimeToLive',
            $subscriptionDescriptionArray
        )
        ) {
            $subscriptionDescription->setDefaultMessageTimeToLive(
                (string) $subscriptionDescriptionArray['DefaultMessageTimeToLive']
            );
        }

        if (array_key_exists(
            'DeadLetteringOnMessageExpiration',
            $subscriptionDescriptionArray
        )
        ) {
            $subscriptionDescription->setDeadLetteringOnMessageExpiration(
                (string) $subscriptionDescriptionArray[
                'DeadLetteringOnMessageExpiration'
                ]
            );
        }

        if (array_key_exists(
            'DeadLetteringOnFilterEvaluationException',
            $subscriptionDescriptionArray
        )
        ) {
            $subscriptionDescription->setDeadLetteringOnFilterEvaluationExceptions(
                (string) $subscriptionDescriptionArray[
                    'DeadLetteringOnFilterEvaluationException'
                ]
            );
        }

        if (array_key_exists(
            'DefaultRuleDescription',
            $subscriptionDescriptionArray
        )
        ) {
            $subscriptionDescription->setDefaultRuleDescription(
                (string) $subscriptionDescriptionArray['DefaultRuleDescription']
            );
        }

        if (array_key_exists('MessageCount', $subscriptionDescriptionArray)) {
            $subscriptionDescription->setMessageCount(
                (string) $subscriptionDescriptionArray['MessageCount']
            );
        }

        if (array_key_exists('MaxDeliveryCount', $subscriptionDescriptionArray)) {
            $subscriptionDescription->setMaxDeliveryCount(
                (string) $subscriptionDescriptionArray['MaxDeliveryCount']
            );
        }

        if (array_key_exists(
            'EnableBatchedOperations',
            $subscriptionDescriptionArray
        )
        ) {
            $subscriptionDescription->setEnableBatchedOperations(
                (bool) $subscriptionDescriptionArray['EnableBatchedOperations']
            );
        }

        return $subscriptionDescription;
    }

    /**
     * Gets the lock duration.
     *
     * @return int
     */
    public function getLockDuration()
    {
        return $this->_lockDuration;
    }

    /**
     * Sets the lock duration.
     *
     * @param string $lockDuration The duration of the lock
     */
    public function setLockDuration($lockDuration)
    {
        $this->_lockDuration = $lockDuration;
    }

    /**
     * Gets requires session.
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
     * @param bool $requiresSession The requires session
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
     * @param string $deadLetteringOnMessageExpiration The dead lettering
     *                                                 on message expiration
     */
    public function setDeadLetteringOnMessageExpiration(
        $deadLetteringOnMessageExpiration
    ) {
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
     * @param string $deadLetteringOnFilterEvaluationExceptions Sets dead lettering
     *                                                          on filter evaluation exceptions
     */
    public function setDeadLetteringOnFilterEvaluationExceptions(
        $deadLetteringOnFilterEvaluationExceptions
    ) {
        $value = $deadLetteringOnFilterEvaluationExceptions;

        $this->_deadLetteringOnFilterEvaluationExceptions = $value;
    }

    /**
     * Gets the default rule description.
     *
     * @return string
     */
    public function getDefaultRuleDescription()
    {
        return $this->_defaultRuleDescription;
    }

    /**
     * Sets the default rule description.
     *
     * @param string $defaultRuleDescription The default rule description
     */
    public function setDefaultRuleDescription($defaultRuleDescription)
    {
        $this->_defaultRuleDescription = $defaultRuleDescription;
    }

    /**
     * Gets the count of the message.
     *
     * @return int
     */
    public function getMessageCount()
    {
        return $this->_messageCount;
    }

    /**
     * Sets the count of the message.
     *
     * @param string $messageCount The count of the message
     */
    public function setMessageCount($messageCount)
    {
        $this->_messageCount = $messageCount;
    }

    /**
     * Gets maximum delivery count.
     *
     * @return int
     */
    public function getMaxDeliveryCount()
    {
        return $this->_maxDeliveryCount;
    }

    /**
     * Sets maximum delivery count.
     *
     * @param int $maxDeliveryCount The maximum delivery count
     */
    public function setMaxDeliveryCount($maxDeliveryCount)
    {
        $this->_maxDeliveryCount = $maxDeliveryCount;
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
     * @param bool $enableBatchedOperations Enable batched operations
     */
    public function setEnableBatchedOperations($enableBatchedOperations)
    {
        $this->_enableBatchedOperations = $enableBatchedOperations;
    }
}
