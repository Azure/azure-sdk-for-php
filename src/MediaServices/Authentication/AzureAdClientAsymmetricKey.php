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

use Herrera\Json\Exception\Exception;


/**
 * Represents an Azure AD client asymmetric key
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
class AzureAdClientAsymmetricKey
{
    /**
     * client id
     *
     * @var string
     */
    private $_clientId;

    /**
     * client certificates
     *
     * @var string
     */
    private $_certs;

    /**
     * Create an AzureAdClientSymmetricKey
     *
     * @param string $clientId The client id
     * @param string $certs client certificates
     */
    public function __construct($clientId, $certs)
    {
        $this->_clientId = $clientId;
        if (!isset($certs['cert']) || !isset($certs['pkey'])) {
            throw new Exception('The client certificate is invalid. Use the output of `openssl_pkcs12_read`');
        }
        $this->_certs = $certs;
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
     * Get the X.509 certificate fingerprint
     *
     * @return string X.509 certificate fingerprint encoded as Base64
     */
    public function getFingerprint()
    {
        return base64_encode(pack('H*', openssl_x509_fingerprint($this->_certs['cert'])));
    }

    /**
     * Get the X.509 certificate
     * @param boolean $justbase64 if true (the default), returns the certificate as plain base64 string (without headers nor formatting)
     * @return string the certificate
     */
    public function getCertificate($justbase64 = true)
    {
        if ($justbase64) {
            $str=str_replace("\n", "", $this->_certs['cert']);
            $str = str_replace("-----BEGIN CERTIFICATE-----","", $str);
            $str = str_replace("-----END CERTIFICATE-----","", $str);
            return $str;
        }

        return $this->_certs['cert'];
    }

    public function getPrivateKey()
    {
        return $this->_certs['pkey'];
    }
}
