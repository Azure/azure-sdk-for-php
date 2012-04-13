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
use PEAR2\WindowsAzure\Resources;
use PEAR2\WindowsAzure\Validate;
use PEAR2\WindowsAzure\Core\Url;
use PEAR2\WindowsAzure\Core\HttpCallContext;
use PEAR2\WindowsAzure\Core\IHttpClient;
use PEAR2\WindowsAzure\Core\WindowsAzureUtilities;
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
    /**
     * @var PEAR2\WindowsAzure\Core\IHttpClient
     */
    private $_channel;
    
    /**
     * @var array
     */
    private $_filters;
    
    /**
     * @var string
     */
    protected $url;
    
    /**
     * Constructor
     *
     * @param PEAR2\WindowsAzure\Core\IHttpClient $channel http client to send 
     * HTTP requests
     * @param string                              $uri     storage account uri.
     * 
     * @return ServiceRestProxy.
     */
    public function __construct($channel, $uri)
    {
        $this->url      = $uri;
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
     * Sends HTTP request with the specified HTTP call context.
     * 
     * @param PEAR2\WindowsAzure\Core\HttpCallContext $context The HTTP call context.
     * 
     * @return \HTTP_Request2_Response
     */
    protected function send2($context)
    {
        $channel     = clone $this->_channel;
        $url         = new Url($this->url);
        $headers     = $context->getHeaders();
        $statusCodes = $context->getStatusCodes();
        $body        = $context->getBody();
        $queryParams = $context->getQueryParameters();
        $path        = $context->getPath();

        $channel->setMethod($context->getMethod());
        $channel->setExpectedStatusCode($statusCodes);
        $channel->setBody($body);
        foreach ($headers as $key => $value) {
            if (!is_null($value) && !empty($value)) {
                $channel->setHeader($key, $value);
            }
        }
        
        $url->setQueryVariables($queryParams);
        if (!empty($path)) {
            $url->appendUrlPath($path);
        }
        
        $channel->send($this->_filters, $url);
        
        return $channel->getResponse();
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
        $context = new HttpCallContext();
        $context->setBody($body);
        $context->setHeaders($headers);
        $context->setMethod($method);
        $context->setPath($path);
        $context->setQueryParameters($queryParams);
        
        if (is_array($statusCode)) {
            $context->setStatusCodes($statusCode);
        } else if (is_integer($statusCode)) {
            $context->addStatusCode($statusCode);
        } else {
            throw new \InvalidArgumentException();
        }
        
        return $this->send2($context);
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
    public function addOptionalAccessConditionHeader($headers, $accessCondition)
    {
        if (!is_null($accessCondition)) {
            $header = $accessCondition->getHeader();
            
            if ($header != AccessConditionHeaderType::NONE) {
                $headers[$header] = $accessCondition->getValue();
            }
        }
        
        return $headers;
    }
    
    /**
     * Groups set of values into one value separated with Resources::SEPARATOR
     * 
     * @param array $values array of values to be grouped.
     * 
     * @return string
     */
    public function groupQueryValues($values)
    {
        Validate::isArray($values);
        $joined = Resources::EMPTY_STRING;
        
        foreach ($values as $value) {
            if (!is_null($value) && !empty($value)) {
                $joined .= $value . Resources::SEPARATOR;
            }
        }
        
        return trim($joined, Resources::SEPARATOR);
    }
    
    /**
     * Adds metadata elements to headers array
     * 
     * @param array $headers  HTTP request headers
     * @param array $metadata user specified metadata
     * 
     * @return array
     */
    protected function addMetadataHeaders($headers, $metadata)
    {
        if (!is_null($metadata) && !empty($metadata)) {
            $metadata = WindowsAzureUtilities::generateMetadataHeaders($metadata);
            $headers  = array_merge($headers, $metadata);
        }
        
        return $headers;
    }
}

?>
