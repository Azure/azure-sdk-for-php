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
 * Represents an Azure Media Services Environment
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
class AzureEnvironment {

    /**
     * @var string
     */
    private $_activeDirectoryEndpoint;

    /**
     * @var string
     */
    private $_mediaServicesResource;

    /**
     * @var string
     */
    private $_mediaServicesSdkClientId;

    /**
     * @var string
     */
    private $_mediaServicesSdkRedirectUri;

    /**
     * Gets the Active Directory endpoint.
     * @return string Active Directory endpoint.
     */
    public function getActiveDirectoryEndpoint() {
        return $this->_activeDirectoryEndpoint;
    }

    /**
     * Gets the Media Services resource.
     * @return string Media Services resource
     */
    public function getMediaServicesResource() {
        return $this->_mediaServicesResource;
    }

    /**
     * Gets the Media Services SDK client ID.
     * @return string Media Services SDK client ID
     */
    public function getMediaServicesSdkClientId() {
        return $this->_mediaServicesSdkClientId;
    }

    /**
     * Gets Media Services SDK application redirect URI.
     * @return string Media Services SDK application redirect URI.
     */
    public function getMediaServicesSdkRedirectUri() {
        return $this->_this.mediaServicesSdkRedirectUri;
    }

    /**
     * Initializes a new instance of the AzureEnvironment class.
     *
     * @param string $activeDirectoryEndpoint The Active Directory endpoint.
     * @param string $mediaServicesResource The Media Services resource.
     * @param string $mediaServicesSdkClientId The Media Services SDK client ID.
     * @param string $mediaServicesSdkRedirectUri The Media Services SDK redirect URI.
     */
    public function __construct(
        $activeDirectoryEndpoint,
        $mediaServicesResource,
        $mediaServicesSdkClientId,
        $mediaServicesSdkRedirectUri) {

        if ($activeDirectoryEndpoint == NULL) {
            throw new \InvalidArgumentException("activeDirectoryEndpoint");
        }

        if ($mediaServicesResource == NULL) {
            throw new \InvalidArgumentException("mediaServicesResource");
        }

        if ($mediaServicesSdkClientId == NULL) {
            throw new \InvalidArgumentException("mediaServicesSdkClientId");
        }

        if ($mediaServicesSdkRedirectUri == NULL) {
            throw new \InvalidArgumentException("mediaServicesSdkRedirectUri");
        }

        $this->_activeDirectoryEndpoint = $activeDirectoryEndpoint;
        $this->_mediaServicesResource = $mediaServicesResource;
        $this->_mediaServicesSdkClientId = $mediaServicesSdkClientId;
        $this->_mediaServicesSdkRedirectUri = $mediaServicesSdkRedirectUri;
    }
}