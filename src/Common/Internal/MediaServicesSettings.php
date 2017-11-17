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
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */

namespace WindowsAzure\Common\Internal;

use WindowsAzure\MediaServices\Authentication\ITokenProvider;
use WindowsAzure\MediaServices\Authentication\AzureAdTokenProvider;

/**
 * Represents the settings used to sign and access a request against the service
 * management.
 *
 * @category  Microsoft
 *
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 *
 * @version   Release: 0.5.0_2016-11
 *
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
class MediaServicesSettings extends ServiceSettings
{
    /**
     * @var string
     */
    private $_endpointUri;

    /**
     * @var ITokenProvider
     */
    private $_tokenProvider;

    /**
     * Creates new media services settings instance.
     *
     * @param string $endpointUri      The account REST API endpoint
     * @param ITokenProvider $tokenProvider    The token provider
     */
    public function __construct(
        $endpointUri,
        $tokenProvider = null
    ) {
        Validate::isValidUri($endpointUri, 'endpointUri');
        Validate::notNull($tokenProvider, 'tokenProvider');

        $this->_endpointUri = $endpointUri;
        $this->_tokenProvider = $tokenProvider;
    }

    /**
     * Gets media services endpoint uri.
     *
     * @return string
     */
    public function getEndpointUri()
    {
        return $this->_endpointUri;
    }

    /**
     * Gets media services OAuth endpoint uri.
     *
     * @return ITokenProvider
     */
    public function getTokenProvider()
    {
        return $this->_tokenProvider;
    }
}
