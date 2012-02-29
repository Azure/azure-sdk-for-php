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
use PEAR2\WindowsAzure\Services\Queue\Models\ListQueueOptions;
use PEAR2\WindowsAzure\Services\Queue\Models\ListQueueResult;
use PEAR2\WindowsAzure\Services\Queue\Models\CreateQueueOptions;
use PEAR2\WindowsAzure\Core\IHttpClient;
use PEAR2\WindowsAzure\Utilities\Utilities;
use PEAR2\WindowsAzure\Core\Url;

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
     * @param PEAR2\WindowsAzure\Core\IHttpClient $channel     http client to send 
     * HTTP requests
     * @param string                              $accountName storage account name.
     * @param string                              $uri         storage account uri.
     * 
     * @return array.
     */
    public function __construct($channel, $accountName, $uri)
    {
        $this->_url     = new Url(
            sprintf(Resources::STORAGE_URI, $accountName, $uri)
        );
        $this->_channel = $channel;
        $this->_filters = array();
    }
    
    /**
     * Resets the http channel and request url
     *
     * @return none.
     */
    private function _reset()
    {
        $this->_channel->reset();
        $this->_url->reset();
    }
    
    /**
     * Tries to send, serialize response and then resets resources.
     *
     * @return none.
     */
    private function _sendAndReset()
    {
        try
        {
            $responseBody   = $this->_channel->send($this->_filters, $this->_url);
            $parsedResponse = Utilities::unserialize($responseBody);
            $this->_reset();
            
            return $parsedResponse;
        }
        catch (\Exception $e)
        {
            $this->_reset();
            throw $e;
        }
    }
    
    /**
     * Generates metadata headers by prefixing each element with 'x-ms-meta'.
     *
     * @param array $metadata user defined metadata.
     * 
     * @return array.
     */
    private function _generateMetadataHeaders($metadata)
    {
        $metadataHeaders = array();
        
        if (is_array($metadata) && !empty($metadata)) {
            $headerName = Resources::X_MS_META_HEADER_PREFIX;
            
            foreach ($metadata as $key => $value) {
                if (   strpos($value, "\r") !== false
                    || strpos($value, "\n") !== false
                ) {
                    throw new \InvalidArgumentException(Resources::INVALID_META_MSG);
                }
                
                $headerName                  .= strtolower($key);
                $metadataHeaders[$headerName] = $value;
            }
        }
        
        return $metadataHeaders;
    }

    /**
     * Clones the current object into new one.
     *
     * @return PEAR2\WindowsAzure\Services\Queue\Models\QueueRestProxy.
     */
    public function __clone()
    {

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
        if (!isset($listQueuesOptions)) {
            $listQueuesOptions = new ListQueueOptions();
        }

        $this->_channel->setMethod(\HTTP_Request2::METHOD_GET);
        $this->_url->setQueryVariable('comp', 'list');
        $this->_url->setQueryVariable(
            Resources::PREFIX, $listQueuesOptions->getPrefix()
        );
        $this->_url->setQueryVariable(
            Resources::MARKER, $listQueuesOptions->getMarker()
        );
        $this->_url->setQueryVariable(
            Resources::MAX_RESULTS, $listQueuesOptions->getMaxResults()
        );
        $this->_url->setQueryVariable(
            'include', $listQueuesOptions->getIncludeMetadata()? 'metadata':  null
        );
        
        $this->_channel->setSuccessfulStatusCode(Resources::SUCCESS_LIST_QUEUES);
        
        $parsedResponse = $this->_sendAndReset();

        return ListQueueResult::create($parsedResponse);
    }

    /**
     * Clears all messages from the queue.
     * 
     * @param string              $queueName           Name of the queue.
     * @param QueueServiceOptions $queueServiceOptions Optional queue service options
     * 
     * @return PEAR2\WindowsAzure\Services\Queue\Models\PeekMessagesResult.
     */
    public function clearMessages($queueName, $queueServiceOptions = null)
    {
        throw new \Exception(Resources::NOT_IMPLEMENTED_MSG);
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
        throw new \Exception(Resources::NOT_IMPLEMENTED_MSG);
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
        if (!isset($createQueueOptions)) {
            $createQueueOptions = new CreateQueueOptions();
        }

        $this->_channel->setMethod(\HTTP_Request2::METHOD_PUT);
        $this->_url->appendUrlPath($queueName);
        // Set metadata headers.
        $metadataHeaders = $this->_generateMetadataHeaders(
            $createQueueOptions->getMetadata()
        );
        $this->_channel->setHeaders($metadataHeaders);
        $this->_channel->setHeader(Resources::CONTENT_LENGTH, 0);
        $this->_channel->setSuccessfulStatusCode(Resources::SUCCESS_CREATE_QUEUE);

        $this->_sendAndReset();
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
        throw new \Exception(Resources::NOT_IMPLEMENTED_MSG);
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
        $this->_channel->setMethod(\HTTP_Request2::METHOD_DELETE);
        $this->_url->appendUrlPath($queueName);
        $this->_channel->setSuccessfulStatusCode(Resources::SUCCESS_DELETE_QUEUE);
        
        $this->_sendAndReset();
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
        throw new \Exception(Resources::NOT_IMPLEMENTED_MSG);
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
        throw new \Exception(Resources::NOT_IMPLEMENTED_MSG);
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
        throw new \Exception(Resources::NOT_IMPLEMENTED_MSG);
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
        throw new \Exception(Resources::NOT_IMPLEMENTED_MSG);
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
        throw new \Exception(Resources::NOT_IMPLEMENTED_MSG);
    }

    /**
     * Sets the properties of the Queue service.
     * 
     * @param array               $serviceProperties   New service properties.
     * @param QueueServiceOptions $queueServiceOptions Optional queue service options
     * 
     * @return none.
     */
    public function setServiceProperties($serviceProperties, 
        $queueServiceOptions = null
    ) {
        throw new \Exception(Resources::NOT_IMPLEMENTED_MSG);
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
        throw new \Exception(Resources::NOT_IMPLEMENTED_MSG);
    }
}

?>