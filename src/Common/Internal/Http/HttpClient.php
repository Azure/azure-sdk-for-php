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

namespace WindowsAzure\Common\Internal\Http;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Psr7\Request;
use WindowsAzure\Common\Internal\Resources;
use WindowsAzure\Common\ServiceException;
use WindowsAzure\Common\Internal\Validate;
use Psr\Http\Message\ResponseInterface;
use GuzzleHttp\RequestOptions;

/**
 * HTTP client which sends and receives HTTP requests and responses.
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
class HttpClient implements IHttpClient
{
    /**
     * @var string
     */
    private $_method = Resources::HTTP_GET;

    /**
     * @var array
     */
    private $_requestOptions = [
        // Don't allow redirect.
        RequestOptions::ALLOW_REDIRECTS => false,
    ];

    /**
     * @var array
     */
    private $_postParams = [];

    /**
     * @var array
     */
    private $_headers = [];

    /**
     * @var string
     */
    private $_body = '';

    /**
     * @var IUrl
     */
    private $_requestUrl;

    /**
     * @var array
     */
    private $_config;

    /**
     * Holds expected status code after sending the request.
     *
     * @var array
     */
    private $_expectedStatusCodes;

    /**
     * Initializes new HttpClient object.
     *
     * @param string $certificatePath          The certificate path
     * @param string $certificateAuthorityPath The path of the certificate authority
     * @param array  $options                   Array of options for guzzle
     */
    public function __construct(
        $certificatePath = Resources::EMPTY_STRING,
        $certificateAuthorityPath = Resources::EMPTY_STRING,
        $options = array()
    ) {
        $this->_config = [
            Resources::USE_BRACKETS => true,
            Resources::SSL_VERIFY_PEER => false,
            Resources::SSL_VERIFY_HOST => false,
        ];

        if (!empty($certificatePath)) {
            $this->_config[Resources::SSL_LOCAL_CERT] = $certificatePath;
            $this->_config[Resources::SSL_VERIFY_HOST] = true;
            $this->_requestOptions[RequestOptions::CERT] = $certificatePath;
        }

        if (!empty($certificateAuthorityPath)) {
            $this->_config[Resources::SSL_CAFILE] = $certificateAuthorityPath;
            $this->_config[Resources::SSL_VERIFY_PEER] = true;
        }

        // Replace User-Agent.
        $this->setHeader(Resources::USER_AGENT, Resources::SDK_USER_AGENT, true);
        $this->setHeader('expect', '');

        $this->_requestUrl = null;
        $this->_expectedStatusCodes = [];

        $this->_config = array_merge($this->_config, $options);
    }

    /**
     * Makes deep copy from the current object.
     */
    public function __clone()
    {
        if (!is_null($this->_requestUrl)) {
            $this->_requestUrl = clone $this->_requestUrl;
        }
    }

    /**
     * Sets the request url.
     *
     * @param IUrl $url request url
     */
    public function setUrl(IUrl $url)
    {
        $this->_requestUrl = $url;
    }

    /**
     * Gets request url. Note that you must check if the returned object is null or
     * not.
     *
     * @return IUrl
     */
    public function getUrl()
    {
        return $this->_requestUrl;
    }

    /**
     * Sets request's HTTP method. You can use constants like
     * Resources::HTTP_GET or strings like 'GET'.
     *
     * @param string $method request's HTTP method
     */
    public function setMethod($method)
    {
        $this->_method = strtoupper($method);
    }

    /**
     * Gets request's HTTP method.
     *
     * @return string
     */
    public function getMethod()
    {
        return $this->_method;
    }

    /**
     * Gets request's headers. The returned array key (header names) are all in
     * lower case even if they were set having some upper letters.
     *
     * @return array
     */
    public function getHeaders()
    {
        return $this->_headers;
    }

    /**
     * Sets a an existing request header to value or creates a new one if the $header
     * doesn't exist.
     *
     * @param string $header  header name
     * @param string $value   header value
     * @param bool   $replace whether to replace previous header with the same name
     *                        or append to its value (comma separated)
     */
    public function setHeader($header, $value, $replace = false)
    {
        Validate::isString($value, 'value');

        // Header names are case insensitive
        $header = strtolower($header);
        if (!isset($this->_headers[$header]) || $replace) {
            $this->_headers[$header] = $value;
        } else {
            $this->_headers[$header] .= ', '.$value;
        }
    }

    /**
     * Sets request headers using array.
     *
     * @param array $headers headers key-value array
     */
    public function setHeaders(array $headers)
    {
        foreach ($headers as $key => $value) {
            $this->setHeader($key, $value);
        }
    }

    /**
     * Sets HTTP POST parameters.
     *
     * @param array $postParameters The HTTP POST parameters
     */
    public function setPostParameters(array $postParameters)
    {
        foreach ($postParameters as $k => $v) {
            $this->_postParams[$k] = $v;
        }
    }

    /**
     * Processes the request through HTTP pipeline with passed $filters,
     * sends HTTP request to the wire and process the response in the HTTP pipeline.
     *
     * @param array $filters HTTP filters which will be applied to the request before
     *                       send and then applied to the response
     * @param IUrl  $url     Request url
     *
     * @throws ServiceException
     *
     * @return ResponseInterface The response
     */
    public function sendAndGetHttpResponse(array $filters, IUrl $url = null)
    {
        if (isset($url)) {
            $this->setUrl($url);
        }

        foreach ($filters as $filter) {
            $filter->handleRequest($this);
        }

        $client = new Client($this->_config);

        // send request and recieve a response
        $response = null;
        try {
            $options = $this->_requestOptions;

            if (!empty($this->_postParams)) {
                $options[RequestOptions::FORM_PARAMS] = $this->_postParams;
            }

            // Since PHP 5.6, a default value for certificate validation is 'true'.
            // We set it back to false if an enviroment variable 'HTTPS_PROXY' is
            // defined.
            if (getenv('HTTPS_PROXY')) {
                $options[RequestOptions::VERIFY] = false;
            }

            $request = new Request(
                $this->_method,
                $this->getUrl()->getUrl(),
                $this->_headers,
                $this->_body);

            $response = $client->send($request, $options);
        } catch (ClientException $e) {
            $response = $e->getResponse();
        }

        $start = count($filters) - 1;
        for ($index = $start; $index >= 0; --$index) {
            $response = $filters[$index]->handleResponse($this, $response);
        }

        self::throwIfError(
            $response->getStatusCode(),
            $response->getReasonPhrase(),
            $response->getBody(),
            $this->_expectedStatusCodes
        );

        return $response;
    }

    /**
     * Processes the request through HTTP pipeline with passed $filters,
     * sends HTTP request to the wire and process the response in the HTTP pipeline.
     *
     * @param array $filters HTTP filters which will be applied to the request before
     *                       send and then applied to the response
     * @param IUrl  $url     Request url
     *
     * @throws ServiceException
     *
     * @return string The response body
     */
    public function send(array $filters, IUrl $url = null)
    {
        return (string) ($this->sendAndGetHttpResponse($filters, $url)->getBody());
    }

    /**
     * Sets successful status code.
     *
     * @param array|string $statusCodes successful status code
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
     * Gets successful status code.
     *
     * @return array
     */
    public function getSuccessfulStatusCode()
    {
        return $this->_expectedStatusCodes;
    }

    /**
     * Sets configuration parameter.
     *
     * @param string $name  The configuration parameter name
     * @param mixed  $value The configuration parameter value
     */
    public function setConfig($name, $value = null)
    {
        $this->_config[$name] = $value;
    }

    /**
     * Gets value for configuration parameter.
     *
     * @param string $name configuration parameter name
     *
     * @return string
     */
    public function getConfig($name)
    {
        return $this->_config[$name];
    }

    /**
     * Sets the request body.
     *
     * @param string $body body to use
     */
    public function setBody($body)
    {
        Validate::isString($body, 'body');
        $this->_body = $body;
    }

    /**
     * Gets the request body.
     *
     * @return string
     */
    public function getBody()
    {
        return $this->_body;
    }

    /**
     * Throws ServiceException if the received status code is not expected.
     *
     * @param string $actual   The received status code
     * @param string $reason   The reason phrase
     * @param string $message  The detailed message (if any)
     * @param array  $expected The expected status codes
     *
     * @throws ServiceException
     */
    public static function throwIfError($actual, $reason, $message, array $expected)
    {
        if (!in_array($actual, $expected)) {
            throw new ServiceException($actual, $reason, $message);
        }
    }

    /**
     * @param ResponseInterface $response
     *
     * @return string[]
     */
    public static function getResponseHeaders(ResponseInterface $response)
    {
        $responseHeaderArray = $response->getHeaders();

        /** @var string[] $responseHeaders */
        $responseHeaders = [];

        foreach ($responseHeaderArray as $key => $value) {
            $responseHeaders[strtolower($key)] = implode(',', $value);
        }

        return $responseHeaders;
    }
}
