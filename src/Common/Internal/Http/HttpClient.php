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

use WindowsAzure\Common\Internal\Resources;
use WindowsAzure\Common\ServiceException;
use WindowsAzure\Common\Internal\Validate;

/**
 * HTTP client which sends and receives HTTP requests and responses.
 *
 * @category  Microsoft
 *
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 *
 * @version   Release: 0.4.5_2016-09
 *
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
class HttpClient implements IHttpClient
{
    /**
     * @var \GuzzleHttp\Client
     */
    private $_client;

    /**
     * @var \HTTP_Request2
     */
    private $_request;

    private $_postParams = array();

    /**
     * @var WindowsAzure\Common\Internal\Http\IUrl
     */
    private $_requestUrl;

    /**
     * Holds expected status code after sending the request.
     *
     * @var array
     */
    private $_expectedStatusCodes;

    /**
     * Initializes new HttpClient object.
     *
     * @param string $certificatePath          The certificate path.
     * @param string $certificateAuthorityPath The path of the certificate authority.
     *
     * @return WindowsAzure\Common\Internal\Http\HttpClient
     */
    public function __construct(
        $certificatePath = Resources::EMPTY_STRING,
        $certificateAuthorityPath = Resources::EMPTY_STRING
    ) {
        $config = array(
            Resources::USE_BRACKETS => true,
            Resources::SSL_VERIFY_PEER => false,
            Resources::SSL_VERIFY_HOST => false,
        );

        if (!empty($certificatePath)) {
            $config[Resources::SSL_LOCAL_CERT] = $certificatePath;
            $config[Resources::SSL_VERIFY_HOST] = true;
        }

        if (!empty($certificateAuthorityPath)) {
            $config[Resources::SSL_CAFILE] = $certificateAuthorityPath;
            $config[Resources::SSL_VERIFY_PEER] = true;
        }

        $this->_client = new \GuzzleHttp\Client($config);

        $this->_request = new \HTTP_Request2(
            null, null, $config
        );

        // Replace User-Agent.
        $this->setHeader(Resources::USER_AGENT, Resources::SDK_USER_AGENT, true);
        $this->setHeader('expect', '');

        $this->_requestUrl = null;
        $this->_expectedStatusCodes = array();

        // Since PHP 5.6, a default value for certificate validation is 'true'.
        // We set it back to false if an enviroment variable 'HTTPS_PROXY' is
        // defined.
        if ($proxy = getenv('HTTPS_PROXY'))
        {
            $this->_postParams['verify'] = false;
        }
    }

    /**
     * Makes deep copy from the current object.
     *
     * @return WindowsAzure\Common\Internal\Http\HttpClient
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
     * @param WindowsAzure\Common\Internal\Http\IUrl $url request url.
     *
     * @return none.
     */
    public function setUrl($url)
    {
        $this->_requestUrl = $url;
    }

    /**
     * Gets request url. Note that you must check if the returned object is null or
     * not.
     *
     * @return WindowsAzure\Common\Internal\Http\IUrl
     */
    public function getUrl()
    {
        return $this->_requestUrl;
    }

    /**
     * Sets request's HTTP method. You can use \HTTP_Request2 constants like
     * Resources::HTTP_GET or strings like 'GET'.
     *
     * @param string $method request's HTTP method.
     *
     * @return none
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
     *                        or append to its value (comma separated)
     *
     * @return none
     */
    public function setHeader($header, $value, $replace = false)
    {
        Validate::isString($value, 'value');

        $this->_request->setHeader($header, $value, $replace);
    }

    /**
     * Sets request headers using array.
     *
     * @param array $headers headers key-value array
     *
     * @return none
     */
    public function setHeaders($headers)
    {
        foreach ($headers as $key => $value) {
            $this->setHeader($key, $value);
        }
    }

    /**
     * Sets HTTP POST parameters.
     *
     * @param array $postParameters The HTTP POST parameters.
     *
     * @return none
     */
    public function setPostParameters($postParameters)
    {
        $this->_request->addPostParameter($postParameters);
        foreach ($postParameters as $k => $v) {
            $this->_postParams[$k] = $v;
        }
    }

    /**
     * Processes the reuqest through HTTP pipeline with passed $filters,
     * sends HTTP request to the wire and process the response in the HTTP pipeline.
     *
     * @param array $filters HTTP filters which will be applied to the request before
     *                       send and then applied to the response.
     * @param IUrl  $url     Request url.
     *
     * @throws WindowsAzure\Common\ServiceException
     *
     * @return \HTTP_Request2_Response The response.
     */
    public function sendAndGetResponse($filters, $url = null)
    {
        if (isset($url)) {
            $this->setUrl($url);
            $this->_request->setUrl($this->_requestUrl->getUrl());
        }

        $contentLength = Resources::EMPTY_STRING;

        $method = strtoupper($this->getMethod());
        if ($method != Resources::HTTP_GET
           && $method != Resources::HTTP_DELETE
           && $method != Resources::HTTP_HEAD
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

        // send request and recieve a response
        $newResponse = null;
        try
        {
            $newRequest = new \GuzzleHttp\Psr7\Request(
                $method,
                $this->_request->getUrl()->getURL(),
                $this->_request->getHeaders(),
                $this->_request->getBody());

            $newResponse = $this->_client->send($newRequest, $this->_postParams);
        }
        catch (\GuzzleHttp\Exception\ClientException $e)
        {
            $newResponse = $e->getResponse();
        }

        $response = new \HTTP_Request2_Response(
            'HTTP/1.1 ' . $newResponse->getStatusCode() . ' ' . $newResponse->getReasonPhrase());

        $response->appendBody($newResponse->getBody());

        $start = count($filters) - 1;
        for ($index = $start; $index >= 0; --$index) {
            $response = $filters[$index]->handleResponse($this, $response);
        }

        self::throwIfError(
            $response->getStatus(),
            $response->getReasonPhrase(),
            $response->getBody(),
            $this->_expectedStatusCodes
        );

        return $response;
    }

    /**
     * Processes the reuqest through HTTP pipeline with passed $filters,
     * sends HTTP request to the wire and process the response in the HTTP pipeline.
     *
     * @param array $filters HTTP filters which will be applied to the request before
     *                       send and then applied to the response.
     * @param IUrl  $url     Request url.
     *
     * @throws WindowsAzure\Common\ServiceException
     *
     * @return string The response body
     */
    public function send($filters, $url = null)
    {
        return $this->sendAndGetResponse($filters, $url)->getBody();
    }

    /**
     * Sets successful status code.
     *
     * @param array|string $statusCodes successful status code.
     *
     * @return none
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
     * @param string $name  The configuration parameter name.
     * @param mix    $value The configuration parameter value.
     *
     * @return none
     */
    public function setConfig($name, $value = null)
    {
        $this->_request->setConfig($name, $value);
    }

    /**
     * Gets value for configuration parameter.
     *
     * @param string $name configuration parameter name.
     *
     * @return string
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
     * @return none
     */
    public function setBody($body)
    {
        Validate::isString($body, 'body');
        $this->_request->setBody($body);
    }

    /**
     * Gets the request body.
     *
     * @return string
     */
    public function getBody()
    {
        return $this->_request->getBody();
    }

    /**
     * Throws ServiceException if the recieved status code is not expected.
     *
     * @param string $actual   The received status code.
     * @param string $reason   The reason phrase.
     * @param string $message  The detailed message (if any).
     * @param array  $expected The expected status codes.
     *
     * @return none
     *
     * @static
     *
     * @throws ServiceException
     */
    public static function throwIfError($actual, $reason, $message, $expected)
    {
        if (!in_array($actual, $expected)) {
            throw new ServiceException($actual, $reason, $message);
        }
    }
}
