<?php

/**
 * Implementation of class SharedKeyFilter.
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
 
namespace PEAR2\WindowsAzure\Services\Core\Filters;
use PEAR2\WindowsAzure\Core\IServiceFilter;
use PEAR2\WindowsAzure\Resources;

/**
 * Adds authentication header to the http request object.
 *
 * @package    azure-sdk-for-php
 * @author     Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright  2012 Microsoft Corporation
 * @license    http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version    Release: @package_version@
 * @link       http://pear.php.net/package/azure-sdk-for-php
 */
class SharedKeyFilter implements IServiceFilter
{
  private $sharedKeyAuthentication;
  
  public function __construct($sharedKeyAuthentication)
  {
    $this->sharedKeyAuthentication = $sharedKeyAuthentication;
  }
  
  public function HandleRequest($request) 
  {
    $signedKey = $this->sharedKeyAuthentication->ComputeSignedKey($request);
    $request->SetHeader(AUTHENTICATION, $signedKey);
  }
  
  public function HandleResponse($response) 
  {
    // Do nothing with the response.
    return $response;
  }
}

?>
