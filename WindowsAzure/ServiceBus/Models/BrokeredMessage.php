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
use WindowsAzure\ServiceBus\Models\BrokerProperties;

/**
 * An active WRAP access Token.
 *
 * @category  Microsoft
 * @package   WindowsAzure\ServiceBus\Models
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 */
class BrokeredMessage
{
    /**
     * The properties of the broker.
     * 
     * @var BrokerProperties
     */
    private $_brokerProperties;

    /**
     * The body of the brokered message.
     * 
     * @var string
     */
    private $_body;

    /**
     * The content type of the brokered message.
     * 
     * @var string
     */
    private $_contentType;

    /**
     * The date of the brokered message.
     * 
     * @var \DateTime 
     */
    private $_date;

    /**
     * The custom properties.
     * 
     * @var array
     */
    private $_customProperties; 

    /**
     * Creates a brokered message with specified broker properties. 
     */
    public function __construct($brokerProperties = null)
    {
        if (!empty($brokerProperties))
        {
            $this->_brokerProperties = $brokerProperties;
        }
        else 
        {
            $this->_brokerProperties = new BrokerProperties();
        }

        $this->_customProperties = array();
    }

    /** 
     * Gets the broker properties.
     *
     * @return BrokerProperties
     */
    public function getBrokerProperties() {
        return $this->_brokerProperties;
    }

    /** 
     * Sets the broker properties.
     * 
     * @param BrokerProperties $brokerProperties The properties of broker.
     */
    public function setBrokerProperties($brokerProperties)
    {
        $this->_brokerProperties = $brokerProperties;
    }
   
    /**
     * Gets the body of the brokered message. 
     * 
     * @return string
     */
    public function getBody() {
        return $this->_body;
    } 
    
    /**
     * Sets the body of the brokered message. 
     * 
     * @param string $body The body of the brokered message.
     */
    public function setBody($body) {
        $this->_body = $body;
    }

    /**
     * Gets the content type of the brokered message. 
     * 
     * @return string
     */
    public function getContentType() {
        return $this->_contentType;
    } 

    /**
     * Sets the content type of the brokered message. 
     * 
     * @param string $contentType The content type of 
     * the brokered message. 
     */ 
    public function setContentType($contentType) {
        $this->_contentType = $contentType;
    } 

    /**
     * Gets the date of the brokered message.
     * 
     * @return \Date
     */
    public function getDate() {
        return $this->_date;
    }
    
    /** 
     * Sets the date of the brokered message. 
     * 
     * @param \Date $date Sets the date of the brokered message. 
     */
    public function setDate($date) {
        $this->_date = $date;
    }
    
    /**
     * Gets the value of a custom property. 
     *
     * @param string $propertyName The name of the property. 
     */
    public function getProperty($propertyName) {
        return $this->_customProperties[$propertyName];
    } 

    /**
     * Sets the value of a custom property. 
     * 
     * @param string $propertyName  The name of the property.
     * @param string $propertyValue The value of the property.
     */
    public function setProperty($propertyName, $propertyValue) {
        $this->_customProperties[$propertyName] = $propertyValue;
    }

    /**
     * Gets the custom properties. 
     *
     * @return array 
     */
    public function getProperties() {
        return $this->_customProperties;
    }

    /**
     * Gets the delivery count. 
     * 
     * @return integer
     */
    public function getDeliveryCount() {
        return $this->_brokerProperties->getDeliveryCount();
    }

    /**
     * Gets the ID of the message. 
     * 
     * @return string 
     */
    public function getMessageId() {
        return $this->_brokerProperties->getMessageId();
    }
    
    /**
     * Sets the ID of the message. 
     * 
     * @param string $messageId The ID of the message. 
     */
    public function setMesageId($messageId) {
        $this->_brokerProperties->setMesageId($messageId);
    }
    
    /** 
     * Gets the sequence number. 
     * 
     * @return integer
     */
    public function getSequenceNumber() {
        $this->_brokerProperties->getSequenceNumber();
    }

    /**
     * Sets the sequence number. 
     * 
     * @param integer $sequenceNumber The sequence number. 
     */
    public function setSequenceNumber($sequenceNumber) {
        $this->_brokerProperties->setSequenceNumber($sequenceNumber);
    } 

    /** 
     * Gets the time to live. 
     * 
     * @return integer 
     */
    public function getTimeToLive() {
        $this->_brokerProperties->getTimeToLive();
    }

    /**
     * Sets the time to live. 
     * 
     * @param string $timeToLive The time to live. 
     */ 
    public function setTimeToLive($timeToLive) {
        $this->_brokerProperties->setTimeToLive($timeToLive);
    }

    /**
     * Gets the lock token. 
     * 
     * @return string 
     */
    public function getLockToken() {
        return $this->_brokerProperties->getLockToken();
    }

    /**
     * Sets the lock token. 
     * 
     * @param string $lockToken The token of the lock. 
     */
    public function setLockToken($lockToken)
    {
        $this->_brokerProperties->setLockToken($lockToken);
    }

    /**
     * Gets the time of locked until UTC.
     * 
     * @return \Date
     */
    public function getLockedUntilUtc() {
        return $this->_brokerProperties->getLockedUntilUtc();
    }

    /**
     * Sets the time of locked until UTC. 
     * 
     * @param \Date $lockedUntilUtc The time of locked until UTC.
     */ 
    public function setLockedUntilUtc($lockedUntilUtc)
    {
        $this->_brokerProperties->setLockedUntilUtc($lockedUntilUtc);
    }

    /**
     * Gets the correlation ID.
     * 
     * @return string 
     */
    public function getCorrelationId() {
        return $this->_brokerProperties->getCorrelationId();
    }
    
    /**     
     * Sets the correlation ID.
     * 
     * @param string $correlationId The ID of the correlation.
     */
    public function setCorrelationId($correlationId) {
        $this->_brokerProperties->setCorrelationId($correlationId);
    }

    /**
     * Gets the session ID.
     * 
     * @return string
     */
    public function getSessionId() {
        $this->_brokerProperties->getSessionId();
    }
    
    /**
     * Sets the session ID.
     * 
     * @param string $sessionId The ID of the session. 
     */
    public function setSessionId($sessionId) {
        $this->_brokerProperities->setSessionId($sessionId);
    }

    /**
     * Gets the label.
     * 
     * @return string
     */
    public function getLabel() {
        return $this->_brokerProperties->getLabel();
    }

    /**
     * Sets the label. 
     * 
     * @param string $label The label of the broker properties. 
     */
    public function setLabel($label) {
        $this->_brokerProperties->setLabel($label);
    }

    /**
     * Gets reply to. 
     * 
     * @return string 
     */
    public function getReplyTo() {
        return $this->_brokerProperties->getReplyTo();
    }

    /**
     * Sets the reply to. 
     * 
     * @param string $replyTo The reply to value. 
     */
    public function setReplyTo($replyTo) {
        $this->_brokerProperties->setReplytTo($replyTo);
    }

    /**
     * Gets to.     
     * 
     * @return string
     */
    public function getTo() {
        return $this->_brokerProperties->getTo();
    } 

    /**
     * Sets the to.
     * 
     * @param string $to to.
     */
    public function setTo($to) {
        $this->_borkerProeprties->setTo($to);
    }

    /**
     * Gets the scheduled enqueue time. 
     * 
     * @return \Date
     */
    public function getScheduledEnqueueTimeUtc() {
        return $this->_brokerProperties->getScheduledEnqueueTimeUtc();
    }
    
    /**
     * Sets the scheduled enqueue time. 
     * 
     * @param \Date $scheduledEnqueueTime The date/time of the message.
     */
    public function setScheduledEnqueueTimeUtc($scheduledEnqueueTime) {
        $this->_brokerProperties->setScheduledEnqueueTimeUtc($scheduledEnqueueTime);
    }

    /**
     * Gets the reply to session ID. 
     * 
     * @return string 
     */
    public function getReplyToSessionId() {
        return $this->_brokerProperties->getReplyToSessionId();
    }

    /**
     * Sets the reply to session ID.
     * 
     * @param string $replyToSessionId The session ID of the reply to recipient. 
     * 
     */
    public function setReplyToSessionId($replyToSessionId) {
        $this->_brokerProperties->setReplyToSessionId($replyToSessionId);
    }
    
    /**
     * Gets the message location.
     * 
     * @return string 
     */
    public function getMessageLocation() {
        return $this->_brokerProperties->getMessageLocation();
    }

    /**
     * Gets the location of the lock location.
     * 
     * @return string
     */
    public function getLockLocation() {
        return $this->_brokerProperties->getLockLocation();
    }
    
}

?>
