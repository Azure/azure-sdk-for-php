<?php

/**
 * Implementation of class ListQueueOptions.
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
 
namespace PEAR2\WindowsAzure\Services\Queue\Models;
use PEAR2\WindowsAzure\Services\Queue\Models\QueueServiceOptions;

/**
 * Options for listQueues API.
 *
 * @package    azure-sdk-for-php
 * @author     Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright  2012 Microsoft Corporation
 * @license    http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version    Release: @package_version@
 * @link       http://pear.php.net/package/azure-sdk-for-php
 */
class ListQueueOptions extends QueueServiceOptions
{
  private $_prefix;
  private $_marker;
  private $_maxResults;
  private $_includeMetadata;
  
  public function getPrefix()
  {
    return $this->_prefix;
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
  
  public function isIncludeMetadata()
  {
    return $this->_includeMetadata;
  }
  
  public function setIncludeMetadata($includeMetadata)
  {
    $this->_includeMetadata = $includeMetadata;
  }
}

?>
