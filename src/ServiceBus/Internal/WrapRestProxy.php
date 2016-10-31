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
 * @link      https://github.com/WindowsAzure/azure-sdk-for-php
 */

namespace WindowsAzure\ServiceBus\Internal;

use WindowsAzure\Common\Internal\Http\IHttpClient;
use WindowsAzure\Common\Internal\ServiceRestProxy;
use WindowsAzure\Common\Internal\Resources;

/**
 * The WRAP service layer.
 *
 * @category  Microsoft
 *
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 *
 * @version   Release: 0.5.0_2016-11
 *
 * @link      https://github.com/WindowsAzure/azure-sdk-for-php
 */
class WrapRestProxy extends ServiceRestProxy implements IWrap
{
    /**
     * Creates a WrapRestProxy with specified parameters.
     *
     * @param IHttpClient $channel The channel to send the WRAP request
     * @param string      $uri     The Uri of the WRAP service
     */
    public function __construct(IHttpClient $channel, $uri)
    {
        parent::__construct($channel, $uri, Resources::EMPTY_STRING, null);
    }

    /**
     * Gets a WRAP access token with specified parameters.
     *
     * @param string $uri      The URI of the WRAP service
     * @param string $name     The user name of the WRAP service
     * @param string $password The password of the WRAP service
     * @param string $scope    The scope of the WRAP service
     *
     * @return WrapAccessTokenResult
     */
    public function wrapAccessToken($uri, $name, $password, $scope)
    {
        $method = Resources::HTTP_POST;
        $headers = [];
        $queryParams = [];
        $postParameters = [];
        $statusCode = Resources::STATUS_OK;

        $postParameters = $this->addPostParameter(
            $postParameters,
            Resources::WRAP_NAME,
            $name
        );

        $postParameters = $this->addPostParameter(
            $postParameters,
            Resources::WRAP_PASSWORD,
            $password
        );

        $postParameters = $this->addPostParameter(
            $postParameters,
            Resources::WRAP_SCOPE,
            $scope
        );

        $this->setUri($uri);

        $response = $this->sendHttp(
            $method,
            $headers,
            $queryParams,
            $postParameters,
            Resources::EMPTY_STRING,
            $statusCode
        );

        return WrapAccessTokenResult::create($response->getBody());
    }
}
