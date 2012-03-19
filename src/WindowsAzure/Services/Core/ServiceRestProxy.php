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
use PEAR2\WindowsAzure\Core\Url;
use PEAR2\WindowsAzure\Core\IHttpClient;
use PEAR2\WindowsAzure\Resources;
use PEAR2\WindowsAzure\Services\Blob\Models\AccessConditionHeaderType;

/**
 * Base class for all services rest proxies.
 *
 * @category  Microsoft
 * @package   PEAR2\WindowsAzure\Services\Core
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
class ServiceRestProxy
{
    private $_channel;
    private $_filters;
    private $_url;

    /**
     * Constructor
     *
     * @param PEAR2\WindowsAzure\Core\IHttpClient $channel http client to send 
     * HTTP requests
     * @param string                              $uri     storage account uri.
     * 
     * @return array.
     */
    public function __construct($channel, $uri)
    {
        $this->_url     = new Url($uri);
        $this->_channel = $channel;
        $this->_filters = array();
    }
    
    /**
     * Gets HTTP filters that will process each request.
     * 
     * @return array
     */
    public function getFilters()
    {
        return $this->_filters;
    }
    
    /**
     * Sends HTTP request with the specified parameters.
     * 
     * @param string $method      HTTP method used in the request
     * @param array  $headers     HTTP headers.
     * @param array  $queryParams URL query parameters.
     * @param string $path        URL path
     * @param int    $statusCode  Expected status code received in the response
     * @param string $body        Request body
     * @param array  $config      Request configuration parameters.
     * 
     * @return \HTTP_Request2_Response
     */
    protected function send($method, $headers, $queryParams, $path, $statusCode,
        $body = Resources::EMPTY_STRING, $config = array()
    ) {
        $channel = clone $this->_channel;
        $url     = clone $this->_url;
        
        $channel->setMethod($method);
        $channel->setHeaders($headers);
        $channel->setExpectedStatusCode($statusCode);
        $channel->setBody($body);
        $url->setQueryVariables($queryParams);
        if (!empty($path)) {
            $url->appendUrlPath($path);
        }
        
        foreach ($config as $key => $value) {
            if (!empty($value)) {
                $channel->setConfig($key, $value);
            }
                
        }
        
        $channel->send($this->_filters, $url);
        
        return $channel->getResponse();
    }

    /**
     * Adds new filter to queue proxy object and returns new QueueRestProxy with
     * that filter.
     *
     * @param PEAR2\WindowsAzure\Core\IServiceFilter $filter Filter to add for 
     * the pipeline.
     * 
     * @return PEAR2\WindowsAzure\Services\Queue\IQueue.
     */
    public function withFilter($filter)
    {
        $queueWithFilter             = clone $this;
        $queueWithFilter->_filters[] = $filter;

        return $queueWithFilter;
    }
    
    /**
     * Adds optional header to headers if set
     * 
     * @param array           $headers         array of request headers
     * @param AccessCondition $accessCondition the access condition object
     * 
     * @return array
     */
    public function addOptionalAccessContitionHeader($headers, $accessCondition)
    {
        if (!is_null($accessCondition)) {
            $header = $accessCondition->getHeader();
            
            if ($header != AccessConditionHeaderType::NONE) {
                $headers[$header] = $accessCondition->getValue();
            }
        }
        
        return $headers;
    }
}

?>
