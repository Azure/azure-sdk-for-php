<?php

/**
 * Implements QueueExceptionProcessor class.
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
use PEAR2\WindowsAzure\Services\Queue\IQueue;

/**
 * Wrapper for IQueue object with exception handeling
 *
 * @package    azure-sdk-for-php
 * @author     Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright  2012 Microsoft Corporation
 * @license    http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version    Release: @package_version@
 * @link       http://pear.php.net/package/azure-sdk-for-php
 */
class QueueExceptionProcessor implements IQueue
{
  private $service;
  
  public function __construct($service)
  {
    $this->service = $service;
  }
  
  public function WithFilter($filter)
  {
    return new QueueExceptionProcessor($this->service->WithFilter($filter));
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
    try
    {
      if (func_num_args() == 0)
      {
        $this->service->ListQueues();
      }
      else
      {
        $this->service->ListQueues(func_get_arg(0));
      }
    }
    catch (Exception $e)
    {
      // Write code to handle the exception
    }
  }
}

?>
