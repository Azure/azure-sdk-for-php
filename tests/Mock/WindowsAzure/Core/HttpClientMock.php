<?php

/**
 * Implementation of class HttpClientMock.
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
 
namespace PEAR2\Tests\Mock\WindowsAzure\Core;
use PEAR2\WindowsAzure\Core\IHttpClient;
use PEAR2\WindowsAzure\Services\Core\HttpClient;

/**
 * Mock class for Http client.
 *
 * @package    Azure-sdk-for-php
 * @author     Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright  2012 Microsoft Corporation
 * @license    http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version    Release: @package_version@
 * @link       http://pear.php.net/package/azure-sdk-for-php
 */
class HttpClientMock implements IHttpClient
{ 
  public function getHeaders()
  {
    
  }
  
  public function getMethod()
  {

  }
  public function getQuery()
  {
    
  }

  public function getQueryVariables()
  {
    
  }
  
  public function send($filters) 
  {
    
  }
  
  public function setHeader($header, $value)
  {
    
  }
  
  public function setMethod($method)
  {
    
  }
  
  public function setQueryVariable($key, $value)
  {
    
  }
  
  public function setUrl($url)
  {
    
  }
}

?>
