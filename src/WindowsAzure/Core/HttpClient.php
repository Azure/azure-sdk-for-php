<?php

/**
 * Implementation for HttpClient class.
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
 
namespace PEAR2\WindowsAzure\Services\Core;
use PEAR2\WindowsAzure\Core\IHttpClient;
use PEAR2\WindowsAzure\Core\IServiceFilter;
use PEAR2\WindowsAzure\Resources;

require_once 'HTTP/Request2.php';
require_once 'XML/Unserializer.php';
require_once 'Net/URL2.php';

/**
 * This class acts as HTTP request which sends and receives HTTP requests and
 * responses.
 *
 * @package    azure-sdk-for-php
 * @author     Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright  2012 Microsoft Corporation
 * @license    http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version    Release: @package_version@
 * @link       http://pear.php.net/package/azure-sdk-for-php
 */
class HttpClient implements IHttpClient
{
  private $request;
  private $requestUrl;
  
  function __construct()
  {
    $this->request = new \HTTP_Request2(NULL, NULL, array(
        'use_brackets'    => true,
        'ssl_verify_peer' => false,
        'ssl_verify_host' => false,
    ));
    
    $this->request->SetHeader(array(Resources::X_MS_VERSION  =>  Resources::API_VERSION));
    $this->requestUrl = NULL;
  }
  
  public function GetQuery()
  {
    return $this->requestUrl->getQuery();
  }
  
  public function GetQueryVariables()
  {
    return $this->requestUrl->getQueryVariables();
  }
  
  public function SetQueryVariable($key, $value)
  {
    $this->requestUrl->setQueryVariable($key, $value);
  }
  
  public function SetUrl($url)
  {
    $this->requestUrl = new \Net_URL2($url);
  }
  
  public function GetUrl()
  {
    return $this->requestUrl;
  }
  
  public function SetMethod($method)
  {
    $this->request->setMethod($method);
  }
  
  public function GetMethod()
  {
    return $this->request->getMethod();
  }
  
  public function GetHeaders()
  {
    return $this->request->getHeaders();
  }
  
  public function SetHeader($header, $value)
  {
    $this->request->SetHeader($header, $value);
  }
  
  public function Send($filters)
  {
    $this->request->setUrl($this->requestUrl);
    
    foreach ($filters as $filter)
    {
      $this->request = $filter->HandleRequest($this)->request;
    }
    
    $response = $this->request->send();
    
    foreach ($filters as $filter)
    {
      $response = $filter->HandleResponse($this, $response);
    }
    
    return $response->getBody();
  }
}

?>
