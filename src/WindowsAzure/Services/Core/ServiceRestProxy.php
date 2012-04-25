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
 * @package   WindowsAzure\Services\Core
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
 
namespace WindowsAzure\Services\Core;
use WindowsAzure\Resources;
use WindowsAzure\Validate;
use WindowsAzure\Core\Url;
use WindowsAzure\Core\HttpCallContext;
use WindowsAzure\Core\IHttpClient;
use WindowsAzure\Core\WindowsAzureUtilities;

/**
 * Base class for all services rest proxies.
 *
 * @category  Microsoft
 * @package   WindowsAzure\Services\Core
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
class ServiceRestProxy
{
    /**
     * @var WindowsAzure\Core\IHttpClient
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
     * @var WindowsAzure\Core\Serialization\ISerializer
     */
    protected $dataSerializer;
    
    /**
     * Initializes new ServiceRestProxy object.
     *
     * @param IHttpClient $channel        The HTTP client used to send HTTP requests.
     * @param string      $uri            The storage account uri.
     * @param ISerializer $dataSerializer The data serializer.
     */
    public function __construct($channel, $uri, $dataSerializer)
    {
        $this->url            = $uri;
        $this->_channel       = $channel;
        $this->_filters       = array();
        $this->dataSerializer = $dataSerializer;
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
     * @param WindowsAzure\Core\HttpCallContext $context The HTTP call context.
     * 
     * @return \HTTP_Request2_Response
     */
    protected function sendContext($context)
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
        $channel->setHeaders($headers);
        $url->setQueryVariables($queryParams);
        $url->appendUrlPath($path);
        
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
     * 
     * @return \HTTP_Request2_Response
     */
    protected function send($method, $headers, $queryParams, $path, $statusCode,
        $body = Resources::EMPTY_STRING
    ) {
        $context = new HttpCallContext();
        $context->setBody($body);
        $context->setHeaders($headers);
        $context->setMethod($method);
        $context->setPath($path);
        $context->setQueryParameters($queryParams);
        
        if (is_array($statusCode)) {
            $context->setStatusCodes($statusCode);
        } else {
            $context->addStatusCode($statusCode);
        }
        
        return $this->sendContext($context);
    }

    /**
     * Adds new filter to queue proxy object and returns new QueueRestProxy with
     * that filter.
     *
     * @param WindowsAzure\Core\IServiceFilter $filter Filter to add for 
     * the pipeline.
     * 
     * @return WindowsAzure\Services\Queue\IQueue.
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
            
            if ($header != Resources::EMPTY_STRING) {
                $headers[$header] = $accessCondition->getValue();
            }
        }
        
        return $headers;
    }
    
    /**
     * Adds optional query parameter.
     * 
     * Doesn't add the value if it satisfies empty().
     * 
     * @param array  &$queryParameters The query parameters.
     * @param string $key              The query variable name.
     * @param string $value            The query variable value.
     * 
     * @return none
     */
    protected function addOptionalQueryParam(&$queryParameters, $key, $value)
    {
        Validate::isArray($queryParameters, 'queryParameters');
        Validate::isString($key, 'key');
        Validate::isString($value, 'value');
                
        if (!empty($value)) {
            $queryParameters[$key] = $value;
        }
    }
    
    /**
     * Adds optional header.
     * 
     * Doesn't add the value if it satisfies empty().
     * 
     * @param array  &$headers The HTTP header parameters.
     * @param string $key      The HTTP header name.
     * @param string $value    The HTTP header value.
     * 
     * @return none
     */
    protected function addOptionalHeader(&$headers, $key, $value)
    {
        Validate::isArray($headers, 'headers');
        Validate::isString($key, 'key');
        Validate::isString($value, 'value');
                
        if (!empty($value)) {
            $headers[$key] = $value;
        }
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
        Validate::isArray($values, 'values');
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
