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
 * @package   PEAR2\WindowsAzure\Services\Queue
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */

namespace PEAR2\WindowsAzure\Services\Queue;
use PEAR2\WindowsAzure\Services\Queue\Queue;
use PEAR2\WindowsAzure\Resources;
use PEAR2\WindowsAzure\Validate;
use PEAR2\WindowsAzure\Services\Queue\Models\ListQueueOptions;
use PEAR2\WindowsAzure\Services\Queue\Models\ListQueueResult;
use PEAR2\WindowsAzure\Services\Queue\Models\CreateQueueOptions;
use PEAR2\WindowsAzure\Services\Queue\Models\GetServicePropertiesResult;
use PEAR2\WindowsAzure\Services\Queue\Models\QueueServiceOptions;
use PEAR2\WindowsAzure\Services\Queue\Models\ServiceProperties;
use PEAR2\WindowsAzure\Services\Queue\Models\GetQueueMetadataResult;
use PEAR2\WindowsAzure\Services\Queue\Models\CreateMessageOptions;
use PEAR2\WindowsAzure\Services\Queue\Models\QueueMessage;
use PEAR2\WindowsAzure\Services\Queue\Models\ListMessagesOptions;
use PEAR2\WindowsAzure\Services\Queue\Models\ListMessagesResult;
use PEAR2\WindowsAzure\Services\Queue\Models\PeekMessagesOptions;
use PEAR2\WindowsAzure\Services\Queue\Models\PeekMessagesResult;
use PEAR2\WindowsAzure\Services\Queue\Models\UpdateMessageResult;
use PEAR2\WindowsAzure\Core\IHttpClient;
use PEAR2\WindowsAzure\Utilities;
use PEAR2\WindowsAzure\Core\Url;
use PEAR2\WindowsAzure\Core\AzureUtilities;

/**
 * This class constructs HTTP requests and receive HTTP responses for queue 
 * service service layer.
 *
 * @category  Microsoft
 * @package   PEAR2\WindowsAzure\Services\Queue\Models
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
class QueueRestProxy implements IQueue
{
    private $_channel;
    private $_filters;
    private $_url;

    /**
     * Constructor
     *
     * @param PEAR2\WindowsAzure\Core\IHttpClient $channel http client to send 
     * HTTP requests
     * @param string                              $uri     storage account uri.
     * 
     * @return array.
     */
    public function __construct($channel, $uri)
    {
        $this->_url     = new Url($uri);
        $this->_channel = $channel;
        $this->_filters = array();
    }
    
    /**
     * Sends HTTP request with the specified parameters.
     * 
     * @param string $method      HTTP method used in the request
     * @param array  $headers     HTTP headers.
     * @param array  $queryParams URL query parameters.
     * @param string $path        URL path
     * @param int    $statusCode  Expected status code received in the response
     * @param string $body        Request body
     * @param array  $config      Request configuration parameters.
     * 
     * @return \HTTP_Request2_Response
     */
    public function send($method, $headers, $queryParams, $path, $statusCode,
        $body = Resources::EMPTY_STRING, $config = array()
    ) {
        $channel = clone $this->_channel;
        $url     = clone $this->_url;
        
        $channel->setMethod($method);
        $channel->setHeaders($headers);
        $channel->setExpectedStatusCode($statusCode);
        $channel->setBody($body);
        $url->setQueryVariables($queryParams);
        if (!empty($path)) {
            $url->appendUrlPath($path);
        }
        
        foreach ($config as $key => $value) {
            if (!empty($value)) {
                $channel->setConfig($key, $value);
            }
                
        }
        
        $channel->send($this->_filters, $url);
        
        return $channel->getResponse();
    }

    /**
     * Adds new filter to queue proxy object and returns new QueueRestProxy with
     * that filter.
     *
     * @param PEAR2\WindowsAzure\Core\IServiceFilter $filter Filter to add for 
     * the pipeline.
     * 
     * @return PEAR2\WindowsAzure\Services\Queue\IQueue.
     */
    public function withFilter($filter)
    {
        $queueWithFilter             = clone $this;
        $queueWithFilter->_filters[] = $filter;

        return $queueWithFilter;
    }

    /**
     * Lists all queues in the storage account.
     * 
     * @param ListQueueOptions $listQueuesOptions Optional list queue options.
     * 
     * @return PEAR2\WindowsAzure\Services\Queue\Models\ListQueueResult.
     */
    public function listQueues($listQueuesOptions = null)
    {
        $method      = \HTTP_Request2::METHOD_GET;
        $headers     = array();
        $queryParams = array();
        $path        = Resources::EMPTY_STRING;
        $statusCode  = Resources::STATUS_OK;
        
        if (!isset($listQueuesOptions)) {
            $listQueuesOptions = new ListQueueOptions();
        }
        
        $queryParams['comp']                 = 'list';
        $queryParams[Resources::PREFIX]      = $listQueuesOptions->getPrefix();
        $queryParams[Resources::MARKER]      = $listQueuesOptions->getMarker();
        $queryParams[Resources::MAX_RESULTS] = $listQueuesOptions->getMaxResults();

        $isInclude              = $listQueuesOptions->getIncludeMetadata();
        $queryParams['include'] = $isInclude ? 'metadata' : null;
        
        $response = $this->send($method, $headers, $queryParams, $path, $statusCode);
        $parsed   = Utilities::unserialize($response->getBody());

        return ListQueueResult::create($parsed);
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
        Validate::notNullOrEmpty($queueName);
        
        $method      = \HTTP_Request2::METHOD_DELETE;
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
        $method      = \HTTP_Request2::METHOD_POST;
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
        $method      = \HTTP_Request2::METHOD_POST;
        $headers     = array();
        $queryParams = array();
        $path        = Resources::EMPTY_STRING;
        $statusCode  = Resources::STATUS_CREATED;
        
        if (!isset($createQueueOptions)) {
            $createQueueOptions = new CreateQueueOptions();
        }

        $method          = \HTTP_Request2::METHOD_PUT;
        $metadataHeaders = AzureUtilities::generateMetadataHeaders(
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
        Validate::notNullOrEmpty($queueName);
        Validate::notNullOrEmpty($messageId);
        Validate::notNullOrEmpty($popReceipt);
        
        $method      = \HTTP_Request2::METHOD_DELETE;
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
        $method      = \HTTP_Request2::METHOD_DELETE;
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
     * @return PEAR2\WindowsAzure\Services\Queue\Models\GetQueueMetadataResult.
     */
    public function getQueueMetadata($queueName, $queueServiceOptions = null)
    {
        $method      = \HTTP_Request2::METHOD_GET;
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
        $queryParams['comp']                = 'metadata';
        
        $response = $this->send(
            $method, $headers, $queryParams, $path, $statusCode, $body, $config
        );
        
        $metadata = AzureUtilities::getMetadataArray($response->getHeader());
        $maxCount = intval(
            $response->getHeader(Resources::X_MS_APPROXIMATE_MESSAGES_COUNT)
        );
        
        return new GetQueueMetadataResult($maxCount, $metadata);
    }

    /**
     * Gets the properties of the Queue service.
     * 
     * @param PEAR2\WindowsAzure\Services\Queue\Models\QueueServiceOptions 
     * $queueServiceOptions optional queue service options.
     * 
     * @return PEAR2\WindowsAzure\Services\Queue\Models\GetServicePropertiesResult
     */
    public function getServiceProperties($queueServiceOptions = null)
    {
        $method      = \HTTP_Request2::METHOD_GET;
        $headers     = array();
        $queryParams = array();
        $path        = Resources::EMPTY_STRING;
        $statusCode  = Resources::STATUS_OK;
        
        if (!isset($queueServiceOptions)) {
            $queueServiceOptions = new QueueServiceOptions();
        }
        
        $queryParams['restype'] = 'service';
        $queryParams['comp']    = 'properties';
        $queryParams['timeout'] = $queueServiceOptions->getTimeout();
        
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
     * @return PEAR2\WindowsAzure\Services\Queue\Models\ListMessagesResult.
     */
    public function listMessages($queueName, $listMessagesOptions = null)
    {
        $method      = \HTTP_Request2::METHOD_GET;
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
     * @return PEAR2\WindowsAzure\Services\Queue\Models\PeekMessagesResult.
     */
    public function peekMessages($queueName, $peekMessagesOptions = null)
    {
        $method      = \HTTP_Request2::METHOD_GET;
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
        $method      = \HTTP_Request2::METHOD_PUT;
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
        $queryParams['comp']                = 'metadata';
        
        $metadataHeaders = AzureUtilities::generateMetadataHeaders($metadata);
        $headers         = $metadataHeaders;
        
        $this->send(
            $method, $headers, $queryParams, $path, $statusCode, $body, $config
        );
    }

    /**
     * Sets the properties of the Queue service.
     * 
     * @param ServiceProperties   $serviceProperties   New service properties.
     * @param QueueServiceOptions $queueServiceOptions Optional queue service options
     * 
     * @return none.
     */
    public function setServiceProperties($serviceProperties, 
        $queueServiceOptions = null
    ) {
        $method      = \HTTP_Request2::METHOD_PUT;
        $headers     = array();
        $queryParams = array();
        $statusCode  = Resources::STATUS_ACCEPTED;
        $path        = Resources::EMPTY_STRING;
        $body        = Resources::EMPTY_STRING;
        
        if (!isset($queueServiceOptions)) {
            $queueServiceOptions = new QueueServiceOptions();
        }
        
        $queryParams['restype']           = 'service';
        $queryParams['comp']              = 'properties';
        $queryParams['timeout']           = $queueServiceOptions->getTimeout();
        $body                             = $serviceProperties->toXml();
        $headers[Resources::CONTENT_TYPE] = Resources::XML_CONTENT_TYPE;
        
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
     * @return PEAR2\WindowsAzure\Services\Queue\Models\UpdateMessageResult.
     */
    public function updateMessage($queueName, $messageId, $popReceipt, $messageText, 
        $visibilityTimeoutInSeconds, $queueServiceOptions = null
    ) {
        Validate::notNullOrEmpty($queueName);
        Validate::notNullOrEmpty($messageId);
        Validate::notNullOrEmpty($popReceipt);
        Validate::notNullOrEmpty($visibilityTimeoutInSeconds);
        
        $method      = \HTTP_Request2::METHOD_PUT;
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
        
        $date   = AzureUtilities::windowsAzureDateToDateTime($timeNextVisible);
        $result = new UpdateMessageResult();
        $result->setPopReceipt($popReceipt);
        $result->setTimeNextVisible($date);
        
        return $result;
    }
}

?>