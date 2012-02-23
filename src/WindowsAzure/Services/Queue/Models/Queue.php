<?php

/**
 * Implementation of class Queue.
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
 
namespace PEAR2\WindowsAzure\Services\Queue;
use PEAR2\WindowsAzure\Resources;
use PEAR2\WindowsAzure\Utilities;

/**
 * Azure queue object.
 *
 * @package    Azure-sdk-for-php
 * @author     Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright  2012 Microsoft Corporation
 * @license    http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version    Release: @package_version@
 * @link       http://pear.php.net/package/azure-sdk-for-php
 */
class Queue
{
  private $_name;
  private $_url;
  private $_metadata;
  
  public static function createOneObject($raw)
  {
    $queue = new Queue($raw['Name'], $raw['Url']);
    $queue->setMetadata(Utilities::getValue($raw, Resources::METADATA, NULL));
    
    return $queue;
  }
  
  public static function createArray($raw)
  {
    $queues = array();
    foreach ($raw as $rawQueue)
    {
      $queues[] = self::createOneObject($rawQueue);
    }
    
    return $queues;
  }
  
  function __construct($name, $url)
  {
    $this->_name = $name;
    $this->_url = $url;
  }
  
  public function getName()
  {
    return $this->_name;
  }
  
  public function setName($name)
  {
    $this->_name = $name;
  }
  
  public function getUrl()
  {
    return $this->_url;
  }
  
  public function setUrl($url)
  {
    $this->_url = $url;
  }
  
  public function getMetadata()
  {
    return $this->_metadata;
  }
  
  public function setMetadata($metadata)
  {
    $this->_metadata = $metadata;
  }
}

?>