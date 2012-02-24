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

require_once 'XML/Unserializer.php';

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
        $channel->setUrl(sprintf(Resources::STORAGE_URI, $accountName, $uri));
        $this->_channel = $channel;
        $this->_filters = array();
    }

    /**
     * Unserializes the passed $xml into array.
     *
     * @param string $xml XML to be parsed.
     * 
     * @return array.
     */
    private function _unserialize($xml)
    {
        $unserializer = new \XML_Unserializer();
        $unserializer->unserialize($xml);
        return $unserializer->getUnserializedData();
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
        $this->_channel->setQueryVariable('comp', 'list');
        $this->_channel->setQueryVariable(
            Resources::PREFIX, $listQueuesOptions->getPrefix()
        );
        $this->_channel->setQueryVariable(
            Resources::MARKER, $listQueuesOptions->getMarker()
        );
        $this->_channel->setQueryVariable(
            Resources::MAX_RESULTS, $listQueuesOptions->getMaxResults()
        );
        $this->_channel->setQueryVariable(
            'include', $listQueuesOptions->isIncludeMetadata()? 'metadata':  null
        );

        $responseBody   = $this->_channel->send($this->_filters);
        $parsedResponse = $this->_unserialize($responseBody);

        return ListQueueResult::createFromParsedResponse($parsedResponse);
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
        $this->_channel->setHeaders($metadata);

        $responseBody   = $this->_channel->send($this->_filters);
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

    }

    /**
     * Deletes a queue.
     * 
     * @param string              $queueName           Queue to delete.
     * @param QueueServiceOptions $queueServiceOptions Optional queue service options
     * 
     * @return none.
     */
    public function deleteQueue($queueName, $queueServiceOptions = null)
    {

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

    }
}

?>