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

use WindowsAzure\Common\Internal\Resources;
use WindowsAzure\Common\Internal\Utilities;
use WindowsAzure\Common\Internal\Validate;

/**
 * Container to hold wrap access token response object.
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
class WrapAccessTokenResult
{
    /**
     * @var string
     */
    private $_accessToken;

    /**
     * @var int
     */
    private $_expiresIn;

    /**
     * Creates WrapAccessTokenResult object from parsed XML response.
     *
     * @param string $response The get WRAP access token response
     *
     * @return WrapAccessTokenResult
     */
    public static function create($response)
    {
        Validate::isString($response, 'response');

        $wrapAccessTokenResult = new self();
        parse_str($response, $parsedResponse);

        $wrapAccessTokenResult->setAccessToken(
            Utilities::tryGetValue(
                $parsedResponse, Resources::WRAP_ACCESS_TOKEN
            )
        );

        $wrapAccessTokenResult->setExpiresIn(
            Utilities::tryGetValue(
                $parsedResponse, Resources::WRAP_ACCESS_TOKEN_EXPIRES_IN
            )
        );

        return $wrapAccessTokenResult;
    }

    /**
     * Gets access token.
     *
     * @return string
     */
    public function getAccessToken()
    {
        return $this->_accessToken;
    }

    /**
     * Sets access token.
     *
     * @param string $accessToken The access token
     */
    public function setAccessToken($accessToken)
    {
        $this->_accessToken = $accessToken;
    }

    /**
     * Gets expires in.
     *
     * @return integer
     */
    public function getExpiresIn()
    {
        return $this->_expiresIn;
    }

    /**
     * Sets expires in.
     *
     * @param int $expiresIn value
     */
    public function setExpiresIn($expiresIn)
    {
        $this->_expiresIn = $expiresIn;
    }
}
