<?php

/**
 * Includes QueueRestProxy which implements Queue interface.
 *
 * PHP version 5
 *
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
 * @package    azure-sdk-for-php
 * @author     Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright  2012 Microsoft Corporation
 * @license    http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link       http://pear.php.net/package/azure-sdk-for-php
 */

namespace PEAR2\WindowsAzure\Services\Queue;
use PEAR2\WindowsAzure\Services\Queue\Queue;
use PEAR2\WindowsAzure\Resources;
use PEAR2\WindowsAzure\Services\Queue\Models\ListQueueOptions;
use PEAR2\WindowsAzure\Services\Queue\Models\ListQueueResult;

require_once 'HTTP/Request2.php';
require_once 'XML/Unserializer.php';

/**
* This class constructs HTTP requests and receive HTTP responses for queue 
* service service layer.
*
* @package    azure-sdk-for-php
* @author     Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
* @copyright  2012 Microsoft Corporation
* @license    http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
* @version    Release: @package_version@
* @link       http://pear.php.net/package/azure-sdk-for-php
*/
class QueueRestProxy implements IQueue
{
  private $_channel;
  private $_filters;
  
  public function __construct($channel, $accountName, $uri)
  {
    $channel->setUrl(sprintf(Resources::STORAGE_URI, $accountName, $uri));
    $this->_channel = $channel;
    $this->_filters = array();
  }
  
  private function unserialize($xml)
  {
    $unserializer = new \XML_Unserializer();
    $unserializer->unserialize($xml);
    return $unserializer->getUnserializedData();
  }
  
  public function __clone()
  {
    
  }
  
  /**
    * Add new filter to queue proxy object and returns new QueueRestProxy with
    * that filter.
    *
    * @param ServiceFilter $filter filter to add for the pipeline.
    * @return QueueRestProxy
    */  
  public function withFilter($filter)
  {
    $queueWithFilter = clone $this;
    $queueWithFilter->_filters[] = $filter;
    
    return $queueWithFilter;
  }
  
  /**
    * List queue objects for storage account.
    *
    * @param ListQueueOptions $listQueuesOptions  Optional. Options provided for list queues request.
    * @return array
    * @throws ServiceException
    */
  public function listQueues($listQueuesOptions = NULL)
  {
    if (!isset($listQueuesOptions))
    {
      $listQueuesOptions = new ListQueueOptions();
    }
    
    $this->_channel->setMethod(\HTTP_Request2::METHOD_GET);
    $this->_channel->setQueryVariable('comp', 'list');
    $this->_channel->setQueryVariable(Resources::PREFIX, $listQueuesOptions->getPrefix());
    $this->_channel->setQueryVariable(Resources::MARKER, $listQueuesOptions->getMarker());
    $this->_channel->setQueryVariable(Resources::MAX_RESULTS, $listQueuesOptions->getMaxResults());
    $this->_channel->setQueryVariable('include', $listQueuesOptions->isIncludeMetadata()? 
            'metadata':  NULL);
    
    $responseBody = $this->_channel->send($this->_filters);
    $parsedResponse = $this->unserialize($responseBody);
    
    return ListQueueResult::createFromParsedResponse($parsedResponse);
  }

  public function clearMessages($queueName, $queueServiceOptions = NULL)
  {
    
  }

  public function createMessage($queueName, $messageText, $createMessageOptions = NULL)
  {
    
  }

  public function createQueue($queueName, $createQueueOptions = NULL)
  {
    
  }

  public function deleteMessage($queueName, $messageId, $popReceipt, $queueServiceOptions = NULL)
  {
    
  }

  public function deleteQueue($queueName, $queueServiceOptions = NULL)
  {
    
  }

  public function getQueueMetadata($queueName, $queueServiceOptions = NULL)
  {
    
  }

  public function getServiceProperties($queueServiceOptions = NULL)
  {
    
  }

  public function listMessages($queueName, $listMessagesOptions = NULL)
  {
    
  }

  public function peekMessages($queueName, $peekMessagesOptions = NULL)
  {
    
  }

  public function setQueueMetadata($queueName, $metadata, $queueServiceOptions = NULL)
  {
    
  }

  public function setServiceProperties($serviceProperties, $queueServiceOptions = NULL)
  {
    
  }

  public function updateMessage($queueName, $messageId, $popReceipt, $messageText, 
          $visibilityTimeoutInSeconds, $queueServiceOptions = NULL)
  {
    
  }
}

?>