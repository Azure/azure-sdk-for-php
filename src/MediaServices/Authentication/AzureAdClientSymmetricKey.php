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
 * Represents an Azure AD client symmetric key
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
class AzureAdClientSymmetricKey
{
    /**
     * client id
     *
     * @var string
     */
    private $_clientId;

    /**
     * client secret
     *
     * @var string
     */
    private $_clientSecret;

    /**
     * Create an AzureAdClientSymmetricKey
     *
     * @param string $clientId The client id
     * @param string $clientSecret The client secret
     */
    public function __construct($clientId, $clientSecret)
    {
        $this->_clientId = $clientId;
        $this->_clientSecret = $clientSecret;
    }

    /**
     * Get the client id
     *
     * @return string
     */
    public function getClientId()
    {
        return $this->_clientId;
    }

    /**
     * Get the client secret
     *
     * @return string
     */
    public function getClientSecret()
    {
        return $this->_clientSecret;
    }
}
