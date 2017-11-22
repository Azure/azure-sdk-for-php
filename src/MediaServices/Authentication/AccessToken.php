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
 * @copyright Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 *
 * @link      https://github.com/WindowsAzure/azure-sdk-for-php
 */

namespace WindowsAzure\MediaServices\Authentication;

/**
 * Represents a Bearer Token
 *
 * @category  Microsoft
 *
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 *
 * @version   Release: 0.5.0_2016-11
 *
 * @link      https://github.com/WindowsAzure/azure-sdk-for-php
 */
class AccessToken
{
    /**
     * Access Token
     *
     * @var string
     */
    private $_access_token;

    /**
     * Expiration time
     *
     * @var \DateTime
     */
    private $_expiration_time;

    /**
     * Create an Access Token.
     *
     * @param string $accessToken The access token
     * @param \DateTime $expirationTime The expiration time of the access token
     */
    public function __construct($accessToken, $expirationTime)
    {
        $this->_access_token = $accessToken;
        $this->_expiration_time = $expirationTime;
    }

    /**
     * Get the access token
     *
     * @return string
     */
    public function getAccessToken()
    {
        return $this->_access_token;
    }

    /**
     * Get the access token expiration time
     *
     * @return \DateTime
     */
    public function getExpirationTime()
    {
        return $this->_expiration_time;
    }

    /**
     * Verify if the access token is still valid.
     *
     * @return int $margin seconds of margin after while to get a new access token
     */
    public function isValid($margin = 120) {
        return ($this->_expiration_time - $margin) > time();
    }
}
