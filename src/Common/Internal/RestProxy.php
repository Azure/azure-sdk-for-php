<?php

/**
 * LICENSE: Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 * http://www.apache.org/licenses/LICENSE-2.0.
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
 *
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 *
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */

namespace WindowsAzure\Common\Internal;

use WindowsAzure\Common\Internal\Http\Url;
use WindowsAzure\Common\Internal\Http\IHttpClient;
use WindowsAzure\Common\Internal\Http\HttpCallContext;
use WindowsAzure\Common\Internal\Serialization\ISerializer;
use Psr\Http\Message\ResponseInterface;

/**
 * Base class for all REST proxies.
 *
 * @category  Microsoft
 *
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 *
 * @version   Release: 0.5.0_2016-11
 *
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
class RestProxy
{
    /**
     * @var IHttpClient
     */
    private $_channel;

    /**
     * @var array
     */
    private $_filters;

    /**
     * @var ISerializer|null
     */
    protected $dataSerializer;

    /**
     * @var string
     */
    private $_uri;

    /**
     * Initializes new RestProxy object.
     *
     * @param IHttpClient      $channel        The HTTP client used to send HTTP requests
     * @param ISerializer|null $dataSerializer The data serializer
     * @param string           $uri            The uri of the service
     */
    public function __construct(IHttpClient $channel, $dataSerializer, $uri)
    {
        $this->_channel = $channel;
        $this->_filters = [];
        $this->dataSerializer = $dataSerializer;
        $this->_uri = $uri;
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
     * Gets the Uri of the service.
     *
     * @return string
     */
    public function getUri()
    {
        return $this->_uri;
    }

    /**
     * Sets the Uri of the service.
     *
     * @param string $uri The URI of the request
     */
    public function setUri($uri)
    {
        $this->_uri = $uri;
    }

    /**
     * Sends HTTP request with the specified HTTP call context.
     *
     * @param HttpCallContext $context The HTTP call context
     *
     * @return ResponseInterface
     */
    protected function sendHttpContext(HttpCallContext $context)
    {
        $channel = clone $this->_channel;
        $contextUrl = $context->getUri();
        $url = new Url(empty($contextUrl) ? $this->_uri : $contextUrl);
        $headers = $context->getHeaders();
        $statusCodes = $context->getStatusCodes();
        $body = $context->getBody();
        $queryParams = $context->getQueryParameters();
        $postParameters = $context->getPostParameters();
        $path = $context->getPath();

        $channel->setMethod($context->getMethod());
        $channel->setExpectedStatusCode($statusCodes);
        $channel->setBody($body);
        $channel->setHeaders($headers);

        if (count($postParameters) > 0) {
            $channel->setPostParameters($postParameters);
        }
        $url->setQueryVariables($queryParams);
        $url->appendUrlPath($path);

        return $channel->sendAndGetHttpResponse($this->_filters, $url);
    }

    /**
     * Adds new filter to new service rest proxy object and returns that object back.
     *
     * @param IServiceFilter $filter Filter to add for the pipeline
     *
     * @return RestProxy
     */
    public function withFilter(IServiceFilter $filter)
    {
        $serviceProxyWithFilter = clone $this;
        $serviceProxyWithFilter->_filters[] = $filter;

        return $serviceProxyWithFilter;
    }

    /**
     * Adds optional query parameter.
     *
     * Doesn't add the value if it satisfies empty().
     *
     * @param array  &$queryParameters The query parameters
     * @param string $key              The query variable name
     * @param string $value            The query variable value
     */
    protected function addOptionalQueryParam(array &$queryParameters, $key, $value)
    {
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
     * @param array  &$headers The HTTP header parameters
     * @param string $key      The HTTP header name
     * @param string $value    The HTTP header value
     */
    protected function addOptionalHeader(array &$headers, $key, $value)
    {
        Validate::isString($key, 'key');
        Validate::isString($value, 'value');

        if (!is_null($value) && Resources::EMPTY_STRING !== $value) {
            $headers[$key] = $value;
        }
    }
}
