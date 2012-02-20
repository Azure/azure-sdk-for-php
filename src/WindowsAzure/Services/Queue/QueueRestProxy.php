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

namespace  PEAR2\WindowsAzure\Services\Queue;
use PEAR2\WindowsAzure\Services\Queue\Queue;
use \PEAR2\WindowsAzure\Resources;

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
  private $channel;
  private $filters;
  
  public function __construct($channel, $accountName, $uri)
  {
    $channel->setUrl(sprintf(Resources::STORAGE_URI, $accountName, $uri));
    $this->channel = $channel;
    $this->filters = array();
  }
  
  private function Unserialize($xml)
  {
    $unserializer = new \XML_Unserializer();
    $unserializer->unserialize($xml);
    $data = $unserializer->getUnserializedData();
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
  public function WithFilter($filter)
  {
    $queueWithFilter = clone $this;
    $queueWithFilter->filters[] = $filter;
    
    return $queueWithFilter;
  }
  
  /**
    * List queue objects for storage account.
    *
    * @param ListQueueOptions $options  Optional. Options provided for list queues request.
    * @return array
    * @throws ServiceException
    */
  public function ListQueues()
  {
    $queues = array();
    
    if (func_num_args() == 1)
    {
      $listQueueOptions = func_get_arg(0);
    }
    
    $this->channel->SetMethod(\HTTP_Request2::METHOD_GET);
    $this->channel->SetQueryVariable('comp', 'list');
    
    $responseBody = $this->channel->Send($this->filters);
    $queues = $this->Unserialize($responseBody);
    
    return $this->Unserialize($responseBody);
  }
}

?>