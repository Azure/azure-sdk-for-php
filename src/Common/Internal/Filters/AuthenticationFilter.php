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

namespace WindowsAzure\Common\Internal\Filters;

use WindowsAzure\Common\Internal\Resources;
use WindowsAzure\Common\Internal\IServiceFilter;
use WindowsAzure\Common\Internal\Http\IHttpClient;
use WindowsAzure\MediaServices\Authentication\ITokenProvider;
use Psr\Http\Message\ResponseInterface;

/**
 * Adds authentication header to the http request object.
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
class AuthenticationFilter implements IServiceFilter
{
    /**
     * @var IAuthScheme
     */
    private $_azureAdTokenProvider;

    /**
     * Creates AuthenticationFilter with the passed scheme.
     *
     * @param ITokenProvider $authenticationScheme The authentication scheme
     */
    public function __construct(ITokenProvider $azureAdTokenProvider)
    {
        $this->_azureAdTokenProvider = $azureAdTokenProvider;
    }

    /**
     * Adds authentication header to the request headers.
     *
     * @param IHttpClient $request HTTP channel object
     *
     * @return IHttpClient
     */
    public function handleRequest(IHttpClient $request)
    {
        $signedKey = $this->_azureAdTokenProvider->getAccessToken();
        $request->setHeader(Resources::AUTHENTICATION, "Bearer " . $signedKey->getAccessToken());

        return $request;
    }

    /**
     * Does nothing with the response.
     *
     * @param IHttpClient       $request  HTTP channel object
     * @param ResponseInterface $response HTTP response object
     *
     * @return ResponseInterface
     */
    public function handleResponse(IHttpClient $request, ResponseInterface $response)
    {
        // Do nothing with the response.
        return $response;
    }
}
