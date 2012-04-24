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
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */

namespace WindowsAzure\Services\Queue;
use WindowsAzure\Services\Core\ServiceRestProxy;
use WindowsAzure\Resources;
use WindowsAzure\Validate;
use WindowsAzure\Services\Core\Models\GetServicePropertiesResult;
use WindowsAzure\Services\Core\Models\ServiceProperties;
use WindowsAzure\Services\Queue\Models\ListQueuesOptions;
use WindowsAzure\Services\Queue\Models\ListQueuesResult;
use WindowsAzure\Services\Queue\Models\CreateQueueOptions;
use WindowsAzure\Services\Queue\Models\QueueServiceOptions;
use WindowsAzure\Services\Queue\Models\GetQueueMetadataResult;
use WindowsAzure\Services\Queue\Models\CreateMessageOptions;
use WindowsAzure\Services\Queue\Models\QueueMessage;
use WindowsAzure\Services\Queue\Models\ListMessagesOptions;
use WindowsAzure\Services\Queue\Models\ListMessagesResult;
use WindowsAzure\Services\Queue\Models\PeekMessagesOptions;
use WindowsAzure\Services\Queue\Models\PeekMessagesResult;
use WindowsAzure\Services\Queue\Models\UpdateMessageResult;
use WindowsAzure\Core\IHttpClient;
use WindowsAzure\Utilities;
use WindowsAzure\Core\Url;
use WindowsAzure\Core\WindowsAzureUtilities;

/**
 * This class constructs HTTP requests and receive HTTP responses for queue 
 * service layer.
 *
 * @category  Microsoft
 * @package   WindowsAzure\Services\Queue
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
class QueueRestProxy extends ServiceRestProxy implements IQueue
{
    /**
     * Lists all queues in the storage account.
     * 
     * @param ListQueuesOptions $listQueuesOptions Optional list queue options.
     * 
     * @return WindowsAzure\Services\Queue\Models\ListQueuesResult.
     */
    public function listQueues($listQueuesOptions = null)
    {
        $method      = Resources::HTTP_GET;
        $headers     = array();
        $queryParams = array();
        $path        = Resources::EMPTY_STRING;
        $statusCode  = Resources::STATUS_OK;
        
        if (!isset($listQueuesOptions)) {
            $listQueuesOptions = new ListQueuesOptions();
        }
        
        $maxResults = $listQueuesOptions->getMaxResults();
        $isInclude  = $listQueuesOptions->getIncludeMetadata();
        
        $queryParams[Resources::QP_COMP]        = 'list';
        $queryParams[Resources::QP_PREFIX]      = $listQueuesOptions->getPrefix();
        $queryParams[Resources::QP_MARKER]      = $listQueuesOptions->getMarker();
        $queryParams[Resources::QP_MAX_RESULTS] = $maxResults;
        $queryParams[Resources::QP_INCLUDE]     = $isInclude ? 'metadata' : null;
        
        $response = $this->send($method, $headers, $queryParams, $path, $statusCode);
        $parsed   = Utilities::unserialize($response->getBody());
        
        return ListQueuesResult::create($parsed);
    }

    /**
     * Clears all messages from the queue.
     * 
     * If a queue contains a large number of messages, Clear Messages may time out 
     * before all messages have been deleted. In this case the Queue service will 
     * return status code 500 (Internal Server Error), with the additional error 
     * code OperationTimedOut. If the operation times out, the client should 
     * continue to retry Clear Messages until it succeeds, to ensure that all 
     * messages have been deleted.
     * 
     * @param string              $queueName           Name of the queue.
     * @param QueueServiceOptions $queueServiceOptions Optional queue service options
     * 
     * @return none.
     */
    public function clearMessages($queueName, $queueServiceOptions = null)
    {
        Validate::isString($queueName);
        
        $method      = Resources::HTTP_DELETE;
        $headers     = array();
        $queryParams = array();
        $config      = array();
        $path        = $queueName . '/messages';
        $body        = Resources::EMPTY_STRING;
        $statusCode  = Resources::STATUS_NO_CONTENT;
        
        if (!isset($queueServiceOptions)) {
            $queueServiceOptions = new QueueServiceOptions();
        }
        
        $config[Resources::CONNECT_TIMEOUT] = $queueServiceOptions->getTimeout();
        
        $this->send(
            $method, $headers, $queryParams, $path, $statusCode, $body, $config
        );
    }

    /**
     * Adds a message to the queue and optionally sets a visibility timeout 
     * for the message.
     * 
     * @param string               $queueName            Name of the queue.
     * @param string               $messageText          Message contents.
     * @param CreateMessageOptions $createMessageOptions optional create options.
     * 
     * @return none.
     */
    public function createMessage($queueName, $messageText,
        $createMessageOptions = null
    ) {
        Validate::isString($queueName);
        Validate::isString($messageText);
        
        $method      = Resources::HTTP_POST;
        $headers     = array();
        $queryParams = array();
        $path        = Resources::EMPTY_STRING;
        $body        = Resources::EMPTY_STRING;
        $statusCode  = Resources::STATUS_CREATED;
        
        if (!isset($createMessageOptions)) {
            $createMessageOptions = new CreateMessageOptions();
        }
        
        $headers[Resources::CONTENT_TYPE] = Resources::XML_CONTENT_TYPE;
        
        $message = new QueueMessage();
        $message->setMessageText($messageText);
        $body = $message->toXml();
        
        $visibility = $createMessageOptions->getVisibilityTimeoutInSeconds();
        $timeToLive = $createMessageOptions->getTimeToLiveInSeconds();
        
        $queryParams['visibilitytimeout'] = $visibility;
        $queryParams['messagettl']        = $timeToLive;
        $path                             = $queueName . '/messages';
        
        $this->send($method, $headers, $queryParams, $path, $statusCode, $body);
    }

    /**
     * Creates a new queue under the storage account.
     * 
     * @param string             $queueName          New queue name.
     * @param QueueCreateOptions $createQueueOptions Optional queue create options.
     * 
     * @return none.
     */
    public function createQueue($queueName, $createQueueOptions = null)
    {
        Validate::isString($queueName);
        
        $method      = Resources::HTTP_PUT;
        $headers     = array();
        $queryParams = array();
        $path        = Resources::EMPTY_STRING;
        $statusCode  = Resources::STATUS_CREATED;
        
        if (!isset($createQueueOptions)) {
            $createQueueOptions = new CreateQueueOptions();
        }

        $metadataHeaders = WindowsAzureUtilities::generateMetadataHeaders(
            $createQueueOptions->getMetadata()
        );
        $headers         = $metadataHeaders;
        $path            = $queueName;
        
        $this->send($method, $headers, $queryParams, $path, $statusCode);
    }

    /**
     * Deletes a specified message from the queue.
     * 
     * @param string              $queueName           Name of the queue.
     * @param string              $messageId           Id of the message.
     * @param string              $popReceipt          A valid pop receipt value
     * returned from an earlier call to the Get Messages or Update Message operation.
     * @param QueueServiceOptions $queueServiceOptions Optional queue service options
     * 
     * @return none.
     */
    public function deleteMessage($queueName, $messageId, $popReceipt, 
        $queueServiceOptions = null
    ) {
        Validate::isString($queueName);
        Validate::isString($messageId);
        Validate::isString($popReceipt);
        
        $method      = Resources::HTTP_DELETE;
        $headers     = array();
        $queryParams = array();
        $config      = array();
        $path        = $queueName . '/messages/' . $messageId;
        $body        = Resources::EMPTY_STRING;
        $statusCode  = Resources::STATUS_NO_CONTENT;
        
        if (!isset($queueServiceOptions)) {
            $queueServiceOptions = new QueueServiceOptions();
        }
        
        $queryParams['popreceipt']          = $popReceipt;
        $config[Resources::CONNECT_TIMEOUT] = $queueServiceOptions->getTimeout();
        
        $this->send(
            $method, $headers, $queryParams, $path, $statusCode, $body, $config
        );
    }

    /**
     * Deletes a queue.
     * 
     * @param string $queueName Queue name to delete.
     * 
     * @return none.
     */
    public function deleteQueue($queueName)
    {
        Validate::isString($queueName);
        
        $method      = Resources::HTTP_DELETE;
        $headers     = array();
        $queryParams = array();
        $path        = $queueName;
        $statusCode  = Resources::STATUS_NO_CONTENT;
        
        $this->send($method, $headers, $queryParams, $path, $statusCode);
    }

    /**
     * Returns queue properties, including user-defined metadata.
     * 
     * @param string              $queueName           Name of the queue.
     * @param QueueServiceOptions $queueServiceOptions Optional queue service options
     * 
     * @return WindowsAzure\Services\Queue\Models\GetQueueMetadataResult.
     */
    public function getQueueMetadata($queueName, $queueServiceOptions = null)
    {
        Validate::isString($queueName);
        
        $method      = Resources::HTTP_GET;
        $headers     = array();
        $queryParams = array();
        $config      = array();
        $path        = $queueName;
        $body        = Resources::EMPTY_STRING;
        $statusCode  = Resources::STATUS_OK;
        
        if (!isset($queueServiceOptions)) {
            $queueServiceOptions = new QueueServiceOptions();
        }
        
        $config[Resources::CONNECT_TIMEOUT] = $queueServiceOptions->getTimeout();
        $queryParams[Resources::QP_COMP]    = 'metadata';
        
        $response = $this->send(
            $method, $headers, $queryParams, $path, $statusCode, $body, $config
        );
        
        $metadata = WindowsAzureUtilities::getMetadataArray($response->getHeader());
        $maxCount = intval(
            $response->getHeader(Resources::X_MS_APPROXIMATE_MESSAGES_COUNT)
        );
        
        return new GetQueueMetadataResult($maxCount, $metadata);
    }

    /**
     * Gets the properties of the Queue service.
     * 
     * @param WindowsAzure\Services\Queue\Models\QueueServiceOptions 
     * $queueServiceOptions optional queue service options.
     * 
     * @return WindowsAzure\Services\Core\Models\GetServicePropertiesResult
     */
    public function getServiceProperties($queueServiceOptions = null)
    {
        $method      = Resources::HTTP_GET;
        $headers     = array();
        $queryParams = array();
        $path        = Resources::EMPTY_STRING;
        $statusCode  = Resources::STATUS_OK;
        
        if (!isset($queueServiceOptions)) {
            $queueServiceOptions = new QueueServiceOptions();
        }
        
        $queryParams[Resources::QP_REST_TYPE] = 'service';
        $queryParams[Resources::QP_COMP]      = 'properties';
        $queryParams[Resources::QP_TIMEOUT]   = $queueServiceOptions->getTimeout();
        
        $response = $this->send($method, $headers, $queryParams, $path, $statusCode);
        $parsed   = Utilities::unserialize($response->getBody());
        
        return GetServicePropertiesResult::create($parsed);
    }

    /**
     * Lists all messages in the queue
     * 
     * @param string              $queueName           Name of the queue.
     * @param ListMessagesOptions $listMessagesOptions Optional list messages options
     * 
     * @return WindowsAzure\Services\Queue\Models\ListMessagesResult.
     */
    public function listMessages($queueName, $listMessagesOptions = null)
    {
        Validate::isString($queueName);
        
        $method      = Resources::HTTP_GET;
        $headers     = array();
        $queryParams = array();
        $path        = $queueName . '/messages';
        $statusCode  = Resources::STATUS_OK;
        
        if (!isset($listMessagesOptions)) {
            $listMessagesOptions = new ListMessagesOptions();
        }
        
        $messagesCount = $listMessagesOptions->getNumberOfMessages();
        $visibility    = $listMessagesOptions->getVisibilityTimeoutInSeconds();
        
        $queryParams['numofmessages']     = strval($messagesCount);
        $queryParams['visibilitytimeout'] = strval($visibility);
        
        $response = $this->send($method, $headers, $queryParams, $path, $statusCode);
        $parsed   = Utilities::unserialize($response->getBody());
        
        return ListMessagesResult::create($parsed);
    }

    /**
     * Retrieves a message from the front of the queue, without changing 
     * the message visibility.
     * 
     * @param string              $queueName           Name of the queue.
     * @param PeekMessagesOptions $peekMessagesOptions Optional peek messages options
     * 
     * @return WindowsAzure\Services\Queue\Models\PeekMessagesResult.
     */
    public function peekMessages($queueName, $peekMessagesOptions = null)
    {
        Validate::isString($queueName);
        
        $method      = Resources::HTTP_GET;
        $headers     = array();
        $queryParams = array();
        $path        = $queueName . '/messages';
        $statusCode  = Resources::STATUS_OK;
        
        if (!isset($peekMessagesOptions)) {
            $peekMessagesOptions = new PeekMessagesOptions();
        }
        
        $messagesCount = $peekMessagesOptions->getNumberOfMessages();
        
        $queryParams['peekonly']      = 'true';
        $queryParams['numofmessages'] = strval($messagesCount);
        
        $response = $this->send($method, $headers, $queryParams, $path, $statusCode);
        $parsed   = Utilities::unserialize($response->getBody());
        
        return PeekMessagesResult::create($parsed);
    }

    /**
     * Sets user-defined metadata on the queue. To delete queue metadata, call 
     * this API without specifying any metadata in $metadata.
     * 
     * @param string              $queueName           Name of the queue.
     * @param array               $metadata            Metadata to set
     * @param QueueServiceOptions $queueServiceOptions Optional queue service options
     * 
     * @return none.
     */
    public function setQueueMetadata($queueName, $metadata, 
        $queueServiceOptions = null
    ) {
        Validate::isString($queueName);
        Validate::isArray($metadata);
        
        $method      = Resources::HTTP_PUT;
        $headers     = array();
        $queryParams = array();
        $config      = array();
        $path        = $queueName;
        $statusCode  = Resources::STATUS_NO_CONTENT;
        $body        = Resources::EMPTY_STRING;
        
        if (!isset($queueServiceOptions)) {
            $queueServiceOptions = new QueueServiceOptions();
        }
        
        $config[Resources::CONNECT_TIMEOUT] = $queueServiceOptions->getTimeout();
        $queryParams[Resources::QP_COMP]    = 'metadata';
        
        $metadataHeaders = WindowsAzureUtilities::generateMetadataHeaders($metadata);
        $headers         = $metadataHeaders;
        
        $this->send(
            $method, $headers, $queryParams, $path, $statusCode, $body, $config
        );
    }

    /**
     * Sets the properties of the Queue service.
     * 
     * It's recommended to use getServiceProperties, alter the returned object and
     * then use setServiceProperties with this altered object.
     * 
     * @param ServiceProperties   $serviceProperties   New service properties.
     * @param QueueServiceOptions $queueServiceOptions Optional queue service options
     * 
     * @return none.
     */
    public function setServiceProperties($serviceProperties, 
        $queueServiceOptions = null
    ) {
        Validate::isTrue(
            $serviceProperties instanceof ServiceProperties,
            Resources::INVALID_SVC_PROP_MSG
        );
                
        $method      = Resources::HTTP_PUT;
        $headers     = array();
        $queryParams = array();
        $statusCode  = Resources::STATUS_ACCEPTED;
        $path        = Resources::EMPTY_STRING;
        $body        = $serviceProperties->toXml();
        
        if (!isset($queueServiceOptions)) {
            $queueServiceOptions = new QueueServiceOptions();
        }
        
        $queryParams[Resources::QP_REST_TYPE] = 'service';
        $queryParams[Resources::QP_COMP]      = 'properties';
        $queryParams[Resources::QP_TIMEOUT]   = $queueServiceOptions->getTimeout();
        $headers[Resources::CONTENT_TYPE]     = Resources::XML_CONTENT_TYPE;
        
        $this->send($method, $headers, $queryParams, $path, $statusCode, $body);
    }

    /**
     * Updates the visibility timeout of a message and/or the message contents.
     * 
     * @param string              $queueName                  Name of the queue.
     * @param string              $messageId                  Id of the message.
     * @param string              $popReceipt                 Specifies the valid 
     * pop receipt value returned from an earlier call to the Get Messages or 
     * Update Message operation
     * @param string              $messageText                Message contents.
     * @param int                 $visibilityTimeoutInSeconds Specifies the new 
     * visibility timeout value, in seconds, relative to server time. 
     * The new value must be larger than or equal to 0, and cannot be larger 
     * than 7 days. The visibility timeout of a message cannot be set to a value 
     * later than the expiry time. A message can be updated until it has been 
     * deleted or has expired.
     * @param QueueServiceOptions $queueServiceOptions        Optional queue 
     * service options
     * 
     * @return WindowsAzure\Services\Queue\Models\UpdateMessageResult.
     */
    public function updateMessage($queueName, $messageId, $popReceipt, $messageText, 
        $visibilityTimeoutInSeconds, $queueServiceOptions = null
    ) {
        Validate::isString($queueName);
        Validate::isString($messageId);
        Validate::isString($popReceipt);
        Validate::isString($messageText);
        Validate::isInteger($visibilityTimeoutInSeconds);
        
        $method      = Resources::HTTP_PUT;
        $headers     = array();
        $queryParams = array();
        $config      = array();
        $path        = $queueName . '/messages' . '/' . $messageId;
        $body        = Resources::EMPTY_STRING;
        $statusCode  = Resources::STATUS_NO_CONTENT;
        
        if (!isset($queueServiceOptions)) {
            $queueServiceOptions = new QueueServiceOptions();
        }
        
        $queryParams['visibilitytimeout']   = strval($visibilityTimeoutInSeconds);
        $queryParams['popreceipt']          = $popReceipt;
        $config[Resources::CONNECT_TIMEOUT] = $queueServiceOptions->getTimeout();
        
        if (!empty($messageText)) {
            $headers[Resources::CONTENT_TYPE] = Resources::XML_CONTENT_TYPE;
        
            $message = new QueueMessage();
            $message->setMessageText($messageText);
            $body = $message->toXml();
        }
        
        $response        = $this->send(
            $method, $headers, $queryParams, $path, $statusCode, $body, $config
        );
        $popReceipt      = $response->getHeader(Resources::X_MS_POPRECEIPT);
        $timeNextVisible = $response->getHeader(Resources::X_MS_TIME_NEXT_VISIBLE);
        
        $date   = WindowsAzureUtilities::rfc1123ToDateTime($timeNextVisible);
        $result = new UpdateMessageResult();
        $result->setPopReceipt($popReceipt);
        $result->setTimeNextVisible($date);
        
        return $result;
    }
}

?>