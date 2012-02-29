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
 * @package   PEAR2\WindowsAzure\Core
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
 
namespace PEAR2\WindowsAzure\Core;

/**
 * Defines required methods for a HTTP client proxy.
 *
 * @category  Microsoft
 * @package   PEAR2\WindowsAzure\Core
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
interface IHttpClient
{
    /**
     * Sets the request url.
     *
     * @param PEAR2\WindowsAzure\Core\IUrl $url request url.
     * 
     * @return none.
     */
    public function setUrl($url);

    /**
     * Gets request url.
     *
     * @return PEAR2\WindowsAzure\Core\IUrl
     */
    public function getUrl();
    
    /**
     * Sets request's HTTP method.
     * 
     * @param string $method request's HTTP method.
     * 
     * @return none.
     */
    public function setMethod($method);

    /**
     * Gets request's HTTP method.
     *
     * @return string
     */
    public function getMethod();

    /**
     * Gets request's headers
     *
     * @return array
     */
    public function getHeaders();

    /**
     * Sets a an existing request header to value or creates a new one if the $header
     * doesn't exist.
     * 
     * @param string $header header name.
     * @param string $value  header value.
     * 
     * @return none.
     */
    public function setHeader($header, $value);
    
    /**
     * Sets request headers using array
     * 
     * @param array $headers headers key-value array
     * 
     * @return none.
     */
    public function setHeaders($headers);

    /**
     * Processes the reuqest through HTTP pipeline with passed $filters, 
     * sends HTTP request to the wire and process the response in the HTTP pipeline.
     * 
     * @param array $filters HTTP filters which will be applied to the request before
     * send and then applied to the response.
     * 
     * @return string The response body.
     */
    public function send($filters);
    
    /**
     * Sets successful status code
     * 
     * @param array|string $statusCodes successful status code.
     * 
     * @return none.
     */
    public function setExpectedStatusCode($statusCodes);
    
    /**
     * Resets request headers, expected code and sets x-ms-version header to latest
     * version.
     * 
     * @return string.
     */
    public function reset();
}

?>
