<?php

/**
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
 * PHP version 5
 * 
 * @category  Microsoft
 * @package   PEAR2\WindowsAzure\Services\Core
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
 
namespace PEAR2\WindowsAzure\Services\Core;
use PEAR2\WindowsAzure\Core\IHttpClient;
use PEAR2\WindowsAzure\Core\IServiceFilter;
use PEAR2\WindowsAzure\Resources;
use PEAR2\WindowsAzure\Core\ServiceException;
use PEAR2\WindowsAzure\Validate;
use PEAR2\WindowsAzure\Core\IUrl;

require_once 'HTTP/Request2.php';

/**
 * HTTP client which sends and receives HTTP requests and responses.
 *
 * @category  Microsoft
 * @package   PEAR2\WindowsAzure\Services\Core
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
class HttpClient implements IHttpClient
{
    /**
     * @var \HTTP_Request2
     */
    private $_request;
    
    /**
     * @var PEAR2\WindowsAzure\Core\IUrl 
     */
    private $_requestUrl;
    
    /**
     * Holds the latest response object
     * 
     * @var \HTTP_Request2_Response
     */
    private $_response;
    
    /**
     * Holds expected status code after sending the request.
     * 
     * @var array
     */
    private $_expectedStatusCodes;
    
    /**
     * Constructor
     * 
     * @return PEAR2\WindowsAzure\Services\Core\HttpClient
     */
    function __construct()
    {
        $this->_request = new \HTTP_Request2(
            null, null, array(
                Resources::USE_BRACKETS    => true,
                Resources::SSL_VERIFY_PEER => false,
                Resources::SSL_VERIFY_HOST => false
                )
        );

        $this->setHeader(Resources::X_MS_VERSION, Resources::API_VERSION);
        $this->setHeader('user-agent', null);
        
        $this->_requestUrl          = null;
        $this->_response            = null;
        $this->_expectedStatusCodes = array();
    }
    
    /**
     * Makes deep copy from the current object.
     * 
     * @return PEAR2\WindowsAzure\Core\HttpClient
     */
    public function __clone()
    {
        $this->_request = clone $this->_request;
        
        if (!is_null($this->_requestUrl)) {
            $this->_requestUrl = clone $this->_requestUrl;
        }
    }

    /**
     * Sets the request url.
     *
     * @param PEAR2\WindowsAzure\Core\IUrl $url request url.
     * 
     * @return none.
     */
    public function setUrl($url)
    {
        $this->_requestUrl = $url;
    }

    /**
     * Gets request url.
     *
     * @return PEAR2\WindowsAzure\Core\IUrl
     */ 
    public function getUrl()
    {
        return $this->_requestUrl;
    }

    /**
     * Sets request's HTTP method. You can use \HTTP_Request2 constants like
     * \HTTP_Request2::METHOD_GET or strings like 'GET'.
     * 
     * @param string $method request's HTTP method.
     * 
     * @return none.
     */
    public function setMethod($method)
    {
        $this->_request->setMethod($method);
    }

    /**
     * Gets request's HTTP method.
     *
     * @return string
     */
    public function getMethod()
    {
        return $this->_request->getMethod();
    }

    /**
     * Gets request's headers. The returned array key (header names) are all in
     * lower case even if they were set having some upper letters.
     *
     * @return array
     */
    public function getHeaders()
    {
        return $this->_request->getHeaders();
    }

    /**
     * Sets a an existing request header to value or creates a new one if the $header
     * doesn't exist.
     * 
     * @param string $header  header name.
     * @param string $value   header value.
     * @param bool   $replace whether to replace previous header with the same name
     * or append to its value (comma separated)
     * 
     * @return none.
     */
    public function setHeader($header, $value, $replace = false)
    {
        $this->_request->SetHeader($header, $value, $replace);
    }
    
    /**
     * Sets request headers using array
     * 
     * @param array $headers headers key-value array
     * 
     * @return none.
     */
    public function setHeaders($headers)
    {
        $this->_request->SetHeader($headers);
    }

    /**
     * Processes the reuqest through HTTP pipeline with passed $filters, 
     * sends HTTP request to the wire and process the response in the HTTP pipeline.
     * 
     * @param array $filters HTTP filters which will be applied to the request before
     * send and then applied to the response.
     * @param IUrl  $url     Request url.
     * 
     * @throws PEAR2\WindowsAzure\Core\ServiceException
     * 
     * @return string The response body.
     */
    public function send($filters, $url = null)
    {
        if (isset($url)) {
            $this->setUrl($url);
            $this->_request->setUrl($this->_requestUrl->getUrl());
        }
        
        $contentLength = Resources::EMPTY_STRING;
        if (    strtoupper($this->getMethod()) != \HTTP_Request2::METHOD_GET
            && strtoupper($this->getMethod()) != \HTTP_Request2::METHOD_DELETE
            && strtoupper($this->getMethod()) != \HTTP_Request2::METHOD_HEAD
        ) {
            $contentLength = 0;
            
            if (!is_null($this->getBody())) {
                $contentLength = strlen($this->getBody());
            }
            $this->_request->setHeader(Resources::CONTENT_LENGTH, $contentLength);
        }

        foreach ($filters as $filter) {
            $this->_request = $filter->handleRequest($this)->_request;
        }

        $this->_response = $this->_request->send();

        $start = count($filters) - 1;
        for ($index = $start; $index >= 0; $index--) {
            $this->_response = $filters[$index]->handleResponse(
                $this, $this->_response
            );
        }
        
        if (!in_array($this->_response->getStatus(), $this->_expectedStatusCodes)) {
            $errorCode    = $this->_response->getStatus();
            $stringValue  = $this->_response->getReasonPhrase();
            $errorDetails = $this->_response->getBody();
            
            throw new ServiceException($errorCode, $stringValue, $errorDetails);
        }

        return $this->_response->getBody();
    }
    
    /**
     * Sets successful status code
     * 
     * @param array|string $statusCodes successful status code.
     * 
     * @return none.
     */
    public function setExpectedStatusCode($statusCodes)
    {
        if (!is_array($statusCodes)) {
            $this->_expectedStatusCodes[] = $statusCodes;
        } else {
            $this->_expectedStatusCodes = $statusCodes;
        }
    }
    
    /**
     * Gets successful status code
     * 
     * @return array.
     */
    public function getSuccessfulStatusCode()
    {
        return $this->_expectedStatusCodes;
    }
    
    /**
     * Sets configuration parameter.
     * 
     * @param string $name  configuration parameter name.
     * @param mixed  $value configuration parameter value.
     * 
     * @return none.
     */
    public function setConfig($name, $value = null)
    {
        Validate::isString($name);
        Validate::notNullOrEmpty($name);
        
        $this->_request->setConfig($name, $value);
    }
    
    /**
     * Gets value for configuration parameter.
     * 
     * @param string $name configuration parameter name.
     * 
     * @return string.
     */
    public function getConfig($name)
    {
        return $this->_request->getConfig($name);
    }
    
    /**
     * Sets the request body.
     * 
     * @param string $body body to use.
     * 
     * @return none.
     */
    public function setBody($body)
    {
        Validate::isString($body);
        $this->_request->setBody($body);
    }
    
    /**
     * Gets the request body.
     * 
     * @return string.
     */
    public function getBody()
    {
        return $this->_request->getBody();
    }
    
    /**
     * Gets the response object.
     * 
     * @return \HTTP_Request2_Response.
     */
    public function getResponse()
    {
        return $this->_response;
    }
}

?>
