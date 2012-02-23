<?php

/**
 * Implementation of class ListQueueResults.
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
 * @package    Azure-sdk-for-php
 * @author     Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright  2012 Microsoft Corporation
 * @license    http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link       http://pear.php.net/package/azure-sdk-for-php
 */
 
namespace PEAR2\WindowsAzure\Services\Queue\Models;
use PEAR2\WindowsAzure\Resources;
use PEAR2\WindowsAzure\Services\Queue\Queue;
use PEAR2\WindowsAzure\Utilities;

/**
 * Container to hold list queue response object.
 *
 * @package    Azure-sdk-for-php
 * @author     Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright  2012 Microsoft Corporation
 * @license    http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version    Release: @package_version@
 * @link       http://pear.php.net/package/azure-sdk-for-php
 */
class ListQueueResult
{
  private $_queues;
  private $_prefix;
  private $_marker;
  private $_nextMarker;
  private $_maxResults;
  
  public static function createFromParsedResponse($parsedResponse)
  {
    $result = new ListQueueResult();
    $result->_prefix = Utilities::getValue($parsedResponse, Resources::PREFIX, NULL);
    $result->_marker = Utilities::getValue($parsedResponse, Resources::MARKER, NULL);
    $result->_nextMarker = Utilities::getValue($parsedResponse, Resources::NEXT_MARKER, NULL);
    $result->_queues = array();
    $rawQueuesList = is_array($parsedResponse['Queues']) ? $parsedResponse['Queues']['Queue'] : array();
    
    if (!is_array($parsedResponse['Queues']))
    {
      // There are no queues returned. Do nothing.
    }
    else if (array_key_exists('Name', $rawQueuesList))
    {
      // Just one queue is returned.
      $result->_queues[] = Queue::createOneObject($rawQueuesList);
    }
    else
    {
      // Multiple queues are returned
      $result->_queues = Queue::createArray($rawQueuesList);
    }
    
    return $result;
  }
  
  public function getQueues()
  {
    return $this->_queues;
  }
  
  public function getPrefix()
  {
    $this->_prefix;
  }
  
  public function setPrefix($prefix)
  {
    $this->_prefix = $prefix;
  }
  
  public function getMarker()
  {
    return $this->_marker;
  }
  
  public function setMarker($marker)
  {
    $this->_marker = $marker;
  }
  
  public function getMaxResults()
  {
    return $this->_maxResults;
  }
  
  public function setMaxResults($maxResults)
  {
    $this->_maxResults = $maxResults;
  }
  
  public function getNextMarker()
  {
    return $this->_nextMarker;
  }
  
  public function setNextMarker($nextMarker)
  {
    $this->_nextMarker = $nextMarker;
  }
}

?>
