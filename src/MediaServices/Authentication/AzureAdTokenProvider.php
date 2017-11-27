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

use Firebase\JWT\JWT;
use WindowsAzure\Common\Internal\Http\HttpClient;
use WindowsAzure\Common\Internal\Resources;
use WindowsAzure\MediaServices\Authentication\AccessToken;
use WindowsAzure\MediaServices\Authentication\ITokenProvider;
use WindowsAzure\MediaServices\Authentication\AzureAdClient;
use WindowsAzure\MediaServices\Authentication\AzureAdTokenCredentials;

/**
 * Represents an Azure AD Credential
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
class AzureAdTokenProvider implements ITokenProvider {

    /**
     * @var AzureAdTokenCredentials
     */
    private $_credentials;

    /**
     * @var AzureAdClient
     */
    private $_azureAdClient;

    /**
     * @var string
     */
    private $_cachedAccessToken;

    /**
     * Initializes a new instance of the AzureAdTokenProvider class.
     *
     * @param AzureAdTokenCredentials $credentials The AzureAdTokenCredentials
     */
    public function __construct($credentials) {
        if ($credentials == NULL) {
            throw new \InvalidArgumentException("credentials");
        }

        $this->_credentials = $credentials;

        $authority = $this->canonicalizeUri($credentials->getAzureEnvironment()->getActiveDirectoryEndpoint());
        $authority .= $credentials->getTenant();
        $authority .= Resources::OAUTH_V1_ENDPOINT;

        $this->_azureAdClient = new AzureAdClient(
            new HttpClient(),
            $authority
        );

        $this->_cachedAccessToken = null;
    }

    /**
     * Gets a valid access Token
     * @return AccessToken the access token object
     */
    public function getAccessToken() {
        if (!is_null($this->_cachedAccessToken) &&
            $this->_cachedAccessToken->isValid()) {
            return $this->_cachedAccessToken;
        }

        $this->_cachedAccessToken = $this->acquireAccessToken();
        return $this->_cachedAccessToken;
    }

    /**
     * Gets a valid access Token
     * @return AccessToken the access token object
     */
    public function acquireAccessToken() {

        switch ($this->_credentials->getCredentialType()) {
            case AzureAdTokenCredentialType::USER_SECRET_CREDENTIAL:
                return $this->_azureAdClient->acquireTokenWithUserCredentials(
                        $this->_credentials->getAzureEnvironment()->getMediaServicesResource(),
                        $this->_credentials->getAzureEnvironment()->getMediaServicesSdkClientId(),
                        $this->_credentials->getCredential()->getUsername(),
                        $this->_credentials->getCredential()->getPassword());

            case AzureAdTokenCredentialType::SERVICE_PRINCIPAL_WITH_CLIENT_SYMMETRIC_KEY:
                return $this->_azureAdClient->acquireTokenWithSymmetricKey(
                    $this->_credentials->getAzureEnvironment()->getMediaServicesResource(),
                    $this->_credentials->getCredential()->getClientId(),
                    $this->_credentials->getCredential()->getClientSecret());

            case AzureAdTokenCredentialType::SERVICE_PRINCIPAL_WITH_CERTIFICATE:
                return $this->_azureAdClient->acquireTokenWithAsymmetricKey(
                    $this->_credentials->getAzureEnvironment()->getMediaServicesResource(),
                    $this->_credentials->getCredential());

            case AzureAdTokenCredentialType::USER_CREDENTIAL:
                throw new \Symfony\Component\DependencyInjection\Exception\RuntimeException(
                    "Interactive user credential is currently not supported by the php sdk");

            default:
                throw new \Symfony\Component\DependencyInjection\Exception\RuntimeException(
                        "Unknown token credential type");
        }
    }

    /**
     * @param string $uri the URI to be canonicalized.
     */
    private function canonicalizeUri($uri) {
        if ($uri != NULL && substr($uri, -1) !== '/') {
                return $uri . '/';
        }

        return $uri;
    }

    private function isJWTValid($jwt) {
        $tks = explode('.', $jwt->getAccessToken());
        if (count($tks) != 3) {
            throw new UnexpectedValueException('Wrong number of segments');
        }
        list($headb64, $bodyb64, $cryptob64) = $tks;
        if (null === ($header = static::jsonDecode(static::urlsafeB64Decode($headb64)))) {
            throw new UnexpectedValueException('Invalid header encoding');
        }
        if (null === $payload = static::jsonDecode(static::urlsafeB64Decode($bodyb64))) {
            throw new UnexpectedValueException('Invalid claims encoding');
        }

        // Check if this token has expired.
        return !(isset($payload->exp) && time() >= $payload->exp);
    }
}
