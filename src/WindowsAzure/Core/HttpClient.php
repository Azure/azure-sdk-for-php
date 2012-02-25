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
use PEAR2\WindowsAzure\Core\Exceptions\ServiceException;

require_once 'HTTP/Request2.php';
require_once 'XML/Unserializer.php';
require_once 'Net/URL2.php';

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
    private $_request;
    private $_requestUrl;
    private $_successfulStatusCodes;
    
    /**
     * Constructor
     * 
     * @return PEAR2\WindowsAzure\Services\Core\HttpClient
     */
    function __construct()
    {
        $this->_request = new \HTTP_Request2(
            null, null, array(
                'use_brackets'    => true,
                'ssl_verify_peer' => false,
                'ssl_verify_host' => false
                )
        );

        $this->_request->SetHeader(
            array(Resources::X_MS_VERSION => Resources::API_VERSION)
        );
        $this->_requestUrl      = null;
        $this->_successfulStatusCodes = array();
    }
    
    /**
     * Resets request headers queyr variables and url path section. Also sets 
     * x-ms-version header to latest version.
     * 
     * @return none
     */
    private function _resetRequest()
    {
        // Clear headers
        $headerKeys = array_keys($this->getHeaders());
        $this->setHeaders($headerKeys);
        
        // Reset url path section
        $this->setUrlPath('/');
        
        // Clear query variables
        $this->_requestUrl->setQuery(Resources::EMPTY_STRING);
        
        // Sets version header
        $this->_request->SetHeader(
            array(Resources::X_MS_VERSION => Resources::API_VERSION)
        );
    }

    /**
     * Returns the query portion of the url
     * 
     * @return string
     */
    public function getQuery()
    {
        return $this->_requestUrl->getQuery();
    }

    /**
     * Returns the query portion of the url in array form
     * 
     * @return array
     */
    public function getQueryVariables()
    {
        return $this->_requestUrl->getQueryVariables();
    }

    /**
     * Sets a an existing query parameter to value or creates a new one if the $key
     * doesn't exist.
     * 
     * @param string $key   query parameter name.
     * @param string $value query value.
     * 
     * @return none.
     */
    public function setQueryVariable($key, $value)
    {
        if (isset($value)) {
            $this->_requestUrl->setQueryVariable(strtolower($key), $value);
        }
    }

    /**
     * Sets the request url.
     *
     * @param string $url request url.
     * 
     * @return none.
     */
    public function setUrl($url)
    {
        $this->_requestUrl = new \Net_URL2($url);
    }

    /**
     * Gets request url.
     *
     * @return \Net_URL2
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
     * @return \Net_URL2
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
     * Gets request's headers
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
     * @param string $header header name.
     * @param string $value  header value.
     * 
     * @return none.
     */
    public function setHeader($header, $value)
    {
        $this->_request->SetHeader($header, $value, false);
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
     * Sets url path
     * 
     * @param string $urlPath url path to set.
     * 
     * @return none.
     */
    public function setUrlPath($urlPath)
    {
        $this->_requestUrl->setPath($urlPath);
    }
    
    /**
     * Appends url path
     * 
     * @param string $urlPath url path to append.
     * 
     * @return none.
     */
    public function appendUrlPath($urlPath)
    {
        $newUrlPath = parse_url($this->_requestUrl, PHP_URL_PATH) . $urlPath;
        $this->_requestUrl->setPath($newUrlPath);
    }

    /**
     * Processes the reuqest through HTTP pipeline with passed $filters, 
     * sends HTTP request to the wire and process the response in the HTTP pipeline.
     * 
     * @param array $filters HTTP filters which will be applied to the request before
     * send and then applied to the response.
     * 
     * @throws PEAR2\WindowsAzure\Core\Exceptions\ServiceException
     * 
     * @return string The response body.
     */
    public function send($filters)
    {
        $this->_request->setUrl($this->_requestUrl);

        foreach ($filters as $filter) {
            $this->_request = $filter->handleRequest($this)->_request;
        }

        $response = $this->_request->send();

        foreach ($filters as $filter) {
            $response = $filter->handleResponse($this, $response);
        }
        
        $this->_resetRequest();
        
        if (!in_array($response->getStatus(), $this->_successfulStatusCodes)) {            
            $errorCode      = $response->getStatus();
            $stringValue    = $response->getReasonPhrase();
            $errorDetails   = $response->getBody();
            
            throw new ServiceException($errorCode, $stringValue, $errorDetails);
        }

        return $response->getBody();
    }
    
    /**
     * Sets successful status code
     * 
     * @param array|string $statusCodes successful status code.
     * 
     * @return none.
     */
    public function setSuccessfulStatusCode($statusCodes)
    {
        if (!is_array($statusCodes)) {
            $this->_successfulStatusCodes[] = $statusCodes;
        } else {
            $this->_successfulStatusCodes = $statusCodes;
        }
    }
}

?>
