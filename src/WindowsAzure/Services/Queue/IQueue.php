<?php

/**
 * Includes Queue interface which has all REST APIs SDK supports.
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
 * @author     Abdelrahman.Elogeel@microsoft.com
 * @copyright  2012 Microsoft Corporation
 * @license    http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link       http://pear.php.net/package/azure-sdk-for-php
 */

namespace PEAR2\WindowsAzure\Services\Queue;

/**
* This interface has all REST APIs provided by Windows Azure. You can check
* list of all supported APIs from: 
* http://msdn.microsoft.com/en-us/library/windowsazure/dd179466.aspx
*
*
* @package    azure-sdk-for-php
* @author     Abdelrahman.Elogeel@microsoft.com
* @copyright  2012 Microsoft Corporation
* @license    http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
* @version    Release: @package_version@
* @link       http://pear.php.net/package/azure-sdk-for-php
*/
interface IQueue
{
  public function WithFilter($filter);
  
  public function ListQueues();
}
?>
