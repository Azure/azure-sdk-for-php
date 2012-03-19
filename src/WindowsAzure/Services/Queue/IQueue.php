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

/**
 * This interface has all REST APIs provided by Windows Azure for queue service
 *
 * @category  Microsoft
 * @package   PEAR2\WindowsAzure\Services\Queue
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 * @see       http://msdn.microsoft.com/en-us/library/windowsazure/dd179363.aspx
 */
interface IQueue
{
    /**
     * Adds new filter to queue proxy object and returns new QueueRestProxy with
     * that filter.
     *
     * @param PEAR2\WindowsAzure\Core\IServiceFilter $filter Filter to add for 
     * the pipeline.
     * 
     * @return PEAR2\WindowsAzure\Services\Queue\IQueue.
     */
    public function withFilter($filter);

    /**
     * Gets the properties of the Queue service.
     * 
     * @param PEAR2\WindowsAzure\Services\Core\Models\QueueServiceOptions 
     * $queueServiceOptions optional queue service options.
     * 
     * @return PEAR2\WindowsAzure\Services\Core\Models\GetServicePropertiesResult
     */
    public function getServiceProperties($queueServiceOptions = null);

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
    );

    /**
     * Creates a new queue under the storage account.
     * 
     * @param string             $queueName          New queue name.
     * @param QueueCreateOptions $createQueueOptions Optional queue create options.
     * 
     * @return none.
     */
    public function createQueue($queueName, $createQueueOptions = null);

    /**
     * Deletes a queue.
     * 
     * @param string $queueName Queue to delete.
     * 
     * @return none.
     */
    public function deleteQueue($queueName);

    /**
     * Lists all queues in the storage account.
     * 
     * @param ListQueuesOptions $listQueuesOptions Optional list queue options.
     * 
     * @return PEAR2\WindowsAzure\Services\Core\Models\ListQueuesResult.
     */
    public function listQueues($listQueuesOptions = null);

    /**
     * Returns queue properties, including user-defined metadata.
     * 
     * @param string              $queueName           Name of the queue.
     * @param QueueServiceOptions $queueServiceOptions Optional queue service options
     * 
     * @return PEAR2\WindowsAzure\Services\Core\Models\GetQueueMetadataResult.
     */
    public function getQueueMetadata($queueName, $queueServiceOptions = null);

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
    );

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
    );

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
     * @return PEAR2\WindowsAzure\Services\Core\Models\UpdateMessageResult.
     */
    public function updateMessage($queueName, $messageId, $popReceipt, $messageText, 
        $visibilityTimeoutInSeconds, $queueServiceOptions = null
    );

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
    );

    /**
     * Lists all messages in the queue
     * 
     * @param string              $queueName           Name of the queue.
     * @param ListMessagesOptions $listMessagesOptions Optional list messages options
     * 
     * @return PEAR2\WindowsAzure\Services\Core\Models\ListMessagesResult.
     */
    public function listMessages($queueName, $listMessagesOptions = null);

    /**
     * Retrieves a message from the front of the queue, without changing 
     * the message visibility.
     * 
     * @param string              $queueName           Name of the queue.
     * @param PeekMessagesOptions $peekMessagesOptions Optional peek messages options
     * 
     * @return PEAR2\WindowsAzure\Services\Core\Models\PeekMessagesResult.
     */
    public function peekMessages($queueName, $peekMessagesOptions = null);

    /**
     * Clears all messages from the queue.
     * 
     * @param string              $queueName           Name of the queue.
     * @param QueueServiceOptions $queueServiceOptions Optional queue service options
     * 
     * @return PEAR2\WindowsAzure\Services\Core\Models\PeekMessagesResult.
     */
    public function clearMessages($queueName, $queueServiceOptions = null);
}
?>
