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
 * This class acts as HTTP _request which sends and receives HTTP requests and
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
  private $_request;
  private $_requestUrl;
  
  function __construct()
  {
    $this->_request = new \HTTP_Request2(NULL, NULL, array(
        'use_brackets'    => true,
        'ssl_verify_peer' => false,
        'ssl_verify_host' => false,
    ));
    
    $this->_request->SetHeader(array(Resources::X_MS_VERSION  =>  Resources::API_VERSION));
    $this->_requestUrl = NULL;
  }
  
  public function getQuery()
  {
    return $this->_requestUrl->getQuery();
  }
  
  public function getQueryVariables()
  {
    return $this->_requestUrl->getQueryVariables();
  }
  
  public function setQueryVariable($key, $value)
  {
    $this->_requestUrl->setQueryVariable(strtolower($key), $value);
  }
  
  public function setUrl($url)
  {
    $this->_requestUrl = new \Net_URL2($url);
  }
  
  public function getUrl()
  {
    return $this->_requestUrl;
  }
  
  public function setMethod($method)
  {
    $this->_request->setMethod($method);
  }
  
  public function getMethod()
  {
    return $this->_request->getMethod();
  }
  
  public function getHeaders()
  {
    return $this->_request->getHeaders();
  }
  
  public function setHeader($header, $value)
  {
    $this->_request->SetHeader($header, $value);
  }
  
  public function send($filters)
  {
    $this->_request->setUrl($this->_requestUrl);
    
    foreach ($filters as $filter)
    {
      $this->_request = $filter->handleRequest($this)->_request;
    }
    
    $response = $this->_request->send();
    
    foreach ($filters as $filter)
    {
      $response = $filter->handleResponse($this, $response);
    }
    
    return $response->getBody();
  }
}

?>
