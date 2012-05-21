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
 * @package   WindowsAzure\Services\Queue
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
namespace WindowsAzure\Services\ServiceBus\Models;

/**
 * This class constructs HTTP requests and receive HTTP responses for service bus.
 *
 * @category  Microsoft
 * @package   WindowsAzure\Services\ServiceBus
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */

class BrokerProperties
{

    /**
     * The correlation ID.
     *
     * @var string
     */
    private $_correlationId;

    /**
     * The session ID.
     *
     * @var string
     */
    private $_sessionId;

    /**
     * The delivery count.
     *
     * @var string
     */
    private $_deliveryCount;

    /**
     * The correlation ID.
     *
     * @var string
     */
    private $_lockedUntilUtc;

    /**
     * The correlation ID.
     *
     * @var string
     */
    private $_lockToken;

    /**
     * The correlation ID.
     *
     * @var string
     */
    private $_messageId;

    /**
     * The correlation ID.
     *
     * @var string
     */
    private $_label;    

    /**
     * The correlation ID.
     *
     * @var string
     */
    private $_replyTo;

    /**
     * The correlation ID.
     *
     * @var string
     */
    private $_sequenceNumber;

    /**
     * The correlation ID.
     *
     * @var string
     */
    private $_timeToLive;

    /**
     * The correlation ID.
     *
     * @var string
     */
    private $_to;

    /**
     * The correlation ID.
     *
     * @var string
     */
    private $_scheduleEnqueuTimeUtc;

    /**
     * The correlation ID.
     *
     * @var string
     */
    private $_replyToSessionId;

    /**
     * The correlation ID.
     *
     * @var string
     */
    private $_messageLocation;

    /**
     * The correlation ID.
     *
     * @var string
     */
    private $_lockLocation;
 

    /**
     * Creates a broker properties instance with default parameters. 
     */
    public function __construct()
    {
    }

    public function getCorrelationId()
    {
        return $this->_correlationId;
    }

    public function setCorrelationId($correlationId)
    {
        $this->_correlationId = $correlationId;
    }

    public function getSessionId()
    {
        return $this->_sessionId;
    }
    public function setSessionId($sessionId)
    {
        $this->_sessionId = $sessionId;
    }

    public function getDeliveryCount()
    {
        return $this->_deliveryCount;
    }
    public function setDeliveryCount($deliveryCount)
    {
        $this->_deliveryCount = $deliveryCount;
    }

    public function getLockedUntilUtc()
    {
        return $this->_lockedUntilUtc;
    }
    public function setLockedUntilUtc($lockedUntilUtc)
    {
        $this->_lockedUntilUtc;
    }

    public function getLockToken()
    {
        return $this->_lockToken;
    }
    public function setLockToken($lockToken)
    {
        $this->_lockToken = $lockToken;
    }

    public function getMessageId()
    {
        return $this->_messageId;
    }
    public function setMessageId($messageId)
    {
        $this->_messageId = $messageId;
    }

    public function getLabel()
    {
        return $this->_label;
    }
    public function setLabel($label)
    {
        $this->_label = $label;
    }

    public function getReplyTo()
    {
        return $this->_replyTo;
    }
    public function setReplyTo($replyTo)
    {
        $this->_replyTo = $replyTo;
    }

    public function getSequenceNumber()
    {
        return $this->_sequenceNumber;
    }
    public function setSequenceNumber($sequenceNumber)
    {
        $this->_sequenceNumber = $sequenceNumber;
    }
    public function getTimeToLive()
    {
        return $this->_timeToLive;
    }
    public function setTimeToLive($timeToLive)
    {
        $this->_timeToLive = $timeToLive;
    }

    public function getTo()
    {
        return $this->_to;
    }
    public function setTo($to)
    {
        $this->_to = $to;
    }

    public function getScheduleEnqueuTimeUtc()
    {
        return $this->_scheduleEnqueueTimeUtc;
    }
    public function setScheduleEnqueuTimeUtc($scheduleEnqueueTimeUtc)
    {
        $this->_scheduleEnqueueTimeUtc = $scheduleEnqueueTimeUtc;
    }

    public function getReplyToSessionId()
    {
        return $this->_replyToSessionId;
    }
    public function setReplyToSessionId($replyToSession)
    {
        $this->_replyToSession = $replyToSession;
    }

    public function getMessageLocation()
    {
        return $this->_messageLocation;
    }
    public function setMessageLocation($messageLocation)
    {
        $this->_messageLocation = $messageLocation;
    }

    public function getLockLocation()
    {
        return $this->_lockLocation;
    }
    public function setLockLocation($lockLocation)
    {
        $this->_lockLocation = $lockLocation;
    }
    
    public function toString()
    {
        return 'brokerProperty'; 
    }    
}
?>
