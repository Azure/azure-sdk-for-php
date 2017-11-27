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

use WindowsAzure\MediaServices\Authentication\AzureEnvironment;
use WindowsAzure\MediaServices\Authentication\AzureAdClientUsernamePassword;
use WindowsAzure\MediaServices\Authentication\AzureAdClientAsymmetricKey;
use WindowsAzure\MediaServices\Authentication\AzureAdClientSymmetricKey;
use WindowsAzure\MediaServices\Authentication\AzureAdClientUserCredentials;

/**
 * Represents an Azure AD Credential for Azure Media Services
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
class AzureAdTokenCredentials {

    /**
     * @var string
     */
    private $_tenant;

    /**
     * @var int
     */
    private $_credentialType;

    /**
     * @var object
     */
    private $_credential;

    /**
     * @var AzureEnvironment
     */
    private $_azureEnvironment;

    /**
     * Initializes a new instance of the AzureEnvironment class.
     *
     * @param string $tenant The tenant domain name.
     * @param object $credential The credential.
     * @param AzureEnvironment $azureEnvironment The Azure environment data.
     */
    public function __construct(
        $tenant,
        $credential,
        $azureEnvironment) {

        if ($tenant == NULL) {
            throw new \InvalidArgumentException("tenant");
        }

        if ($credential == NULL) {
            throw new \InvalidArgumentException("credential");
        }

        if ($azureEnvironment == NULL) {
            throw new \InvalidArgumentException("azureEnvironment");
        }

        if ($credential instanceof AzureAdClientUserCredentials) {
            $this->_credentialType = AzureAdTokenCredentialType::USER_SECRET_CREDENTIAL;
        } else if ($credential instanceof AzureAdClientSymmetricKey) {
            $this->_credentialType = AzureAdTokenCredentialType::SERVICE_PRINCIPAL_WITH_CLIENT_SYMMETRIC_KEY;
        } else if ($credential instanceof AzureAdClientAsymmetricKey) {
            $this->_credentialType = AzureAdTokenCredentialType::SERVICE_PRINCIPAL_WITH_CERTIFICATE;
        } else {
            throw new \InvalidArgumentException("the credential must be a valid type");
        }

        $this->_tenant = $tenant;
        $this->_credential = $credential;
        $this->_azureEnvironment = $azureEnvironment;
    }

    /**
     * Gets the tenant.
     * @return string the tenant.
     */
    public function getTenant() {
        return $this->_tenant;
    }

    /**
     * Gets the credential.
     * @return object the credential.
     */
    public function getCredential() {
        return $this->_credential;
    }

    /**
     * Gets the credential type.
     * @return int the credential type.
     */
    public function getCredentialType() {
        return $this->_credentialType;
    }

    /**
     * Gets the environment.
     * @return AzureEnvironment the environment.
     */
    public function getAzureEnvironment() {
        return $this->_azureEnvironment;
    }
}
