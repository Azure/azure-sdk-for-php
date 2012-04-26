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
 * @package   WindowsAzure\Core
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
 
namespace WindowsAzure\Core;
use WindowsAzure\Resources;
use WindowsAzure\Validate;
use WindowsAzure\Core\Http\Url;

/**
 * Base class for all REST proxies.
 *
 * @category  Microsoft
 * @package   WindowsAzure\Core
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
class RestProxy
{
    /**
     * @var WindowsAzure\Core\Http\IHttpClient
     */
    private $_channel;
    
    /**
     * @var array
     */
    private $_filters;
    
    /**
     * @var WindowsAzure\Core\Serialization\ISerializer
     */
    protected $dataSerializer;
    
    /**
     * Initializes new RestProxy object.
     *
     * @param IHttpClient $channel        The HTTP client used to send HTTP requests.
     * @param ISerializer $dataSerializer The data serializer.
     */
    public function __construct($channel, $dataSerializer)
    {
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
     * @param WindowsAzure\Core\Http\HttpCallContext $context The HTTP call context.
     * 
     * @return \HTTP_Request2_Response
     */
    protected function sendContext($context)
    {
        $channel     = clone $this->_channel;
        $url         = new Url($context->getUri());
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
                
        if (!is_null($value) && Resources::EMPTY_STRING !== $value) {
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
                
        if (!is_null($value) && Resources::EMPTY_STRING !== $value) {
            $headers[$key] = $value;
        }
    }
}

?>
