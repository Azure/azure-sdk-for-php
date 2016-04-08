<?php

/**
 * LICENSE: Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 * http://www.apache.org/licenses/LICENSE-2.0
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
 * @package   WindowsAzure\MediaServices\Models
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */

namespace WindowsAzure\MediaServices\Models;
use WindowsAzure\Common\Internal\Validate;
use WindowsAzure\Common\Internal\Utilities;



/**
 * Represents ContentKey object used in media services
 *
 * @category  Microsoft
 * @package   WindowsAzure\MediaServices\Models
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: 0.4.2_2016-04
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
class ContentKey
{
    /**
     * ContentKey id
     *
     * @var string
     */
    private $_id;

    /**
     * Created
     *
     * @var \DateTime
     */
    private $_created;

    /**
     * Last modified
     *
     * @var \DateTime
     */
    private $_lastModified;

    /**
     * ContentKeyType
     *
     * @var int
     */
    private $_contentKeyType;

    /**
     * EncryptedContentKey
     *
     * @var string
     */
    private $_encryptedContentKey;

    /**
     * Name
     *
     * @var string
     */
    private $_name;

    /**
     * ProtectionKeyId
     *
     * @var string
     */
    private $_protectionKeyId;

    /**
     * ProtectionKeyType
     *
     * @var int
     */
    private $_protectionKeyType;

    /**
     * Checksum
     *
     * @var string
     */
    private $_checksum;

    /**
     * AuthorizationPolicyId
     *
     * @var string
     */
    private $_authorizationPolicyId;

    /**
     * Create ContentKey from array
     *
     * @param array $options Array containing values for object properties
     *
     * @return WindowsAzure\MediaServices\Models\ContentKey
     */
    public static function createFromOptions($options)
    {
        $contentKey = new ContentKey();
        $contentKey->fromArray($options);

        return $contentKey;
    }

    /**
     * Create contentKey
     *
     * @return none
     */
    public function __construct()
    {
        $this->_id = 'nb:kid:UUID:' . Utilities::getGuid();
    }

    /**
     * Fill contentKey from array
     *
     * @param array $options Array containing values for object properties
     *
     * @return none
     */
    public function fromArray($options)
    {
        if (isset($options['Id'])) {
            Validate::isString($options['Id'], 'options[Id]');
            $this->_id = $options['Id'];
        }

        if (isset($options['Created'])) {
            Validate::isDateString($options['Created'], 'options[Created]');
            $this->_created = new \DateTime($options['Created']);
        }

        if (isset($options['LastModified'])) {
            Validate::isDateString(
                $options['LastModified'],
                'options[LastModified]'
            );
            $this->_lastModified = new \DateTime($options['LastModified']);
        }

        if (isset($options['ContentKeyType'])) {
            Validate::isInteger(
                $options['ContentKeyType'],
                'options[ContentKeyType]'
            );
            $this->_contentKeyType = $options['ContentKeyType'];
        }

        if (isset($options['EncryptedContentKey'])) {
            Validate::isString(
                $options['EncryptedContentKey'],
                'options[EncryptedContentKey]'
            );
            $this->_encryptedContentKey = $options['EncryptedContentKey'];
        }

        if (isset($options['Name'])) {
            Validate::isString($options['Name'], 'options[Name]');
            $this->_name = $options['Name'];
        }

        if (isset($options['ProtectionKeyId'])) {
            Validate::isString(
                $options['ProtectionKeyId'],
                'options[ProtectionKeyId]'
            );
            $this->_protectionKeyId = $options['ProtectionKeyId'];
        }

        if (isset($options['ProtectionKeyType'])) {
            Validate::isInteger(
                $options['ProtectionKeyType'],
                'options[ProtectionKeyType]'
            );
            $this->_protectionKeyType = $options['ProtectionKeyType'];
        }

        if (isset($options['Checksum'])) {
            Validate::isString($options['Checksum'], 'options[Checksum]');
            $this->_checksum = $options['Checksum'];
        }

        if (isset($options['AuthorizationPolicyId'])) {
            Validate::isString($options['AuthorizationPolicyId'], 'options[AuthorizationPolicyId]');
            $this->_authorizationPolicyId = $options['AuthorizationPolicyId'];
        }
    }

    /**
     * Get "Checksum"
     *
     * @return string
     */
    public function getChecksum()
    {
        return $this->_checksum;
    }

    /**
     * Set "Checksum"
     *
     * @param string $value Checksum
     *
     * @return none
     */
    public function setChecksum($value)
    {
        $this->_checksum = $value;
    }

    /**
     * Get "ProtectionKeyType"
     *
     * @return int
     */
    public function getProtectionKeyType()
    {
        return $this->_protectionKeyType;
    }

    /**
     * Set "ProtectionKeyType"
     *
     * @param int $value ProtectionKeyType
     *
     * @return none
     */
    public function setProtectionKeyType($value)
    {
        $this->_protectionKeyType = $value;
    }

    /**
     * Get "ProtectionKeyId"
     *
     * @return string
     */
    public function getProtectionKeyId()
    {
        return $this->_protectionKeyId;
    }

    /**
     * Set "ProtectionKeyId"
     *
     * @param string $value ProtectionKeyId
     *
     * @return none
     */
    public function setProtectionKeyId($value)
    {
        $this->_protectionKeyId = $value;
    }

    /**
     * Get "Name"
     *
     * @return string
     */
    public function getName()
    {
        return $this->_name;
    }

    /**
     * Set "Name"
     *
     * @param string $value Name
     *
     * @return none
     */
    public function setName($value)
    {
        $this->_name = $value;
    }

    /**
     * Get "EncryptedContentKey"
     *
     * @return string
     */
    public function getEncryptedContentKey()
    {
        return $this->_encryptedContentKey;
    }

    /**
     * Set "EncryptedContentKey"
     *
     * @param string $value EncryptedContentKey
     *
     * @return none
     */
    public function setEncryptedContentKey($value)
    {
        $this->_encryptedContentKey = $value;
    }

    /**
     * Get "ContentKeyType"
     *
     * @return int
     */
    public function getContentKeyType()
    {
        return $this->_contentKeyType;
    }

    /**
     * Set "ContentKeyType"
     *
     * @param int $value ContentKeyType
     *
     * @return none
     */
    public function setContentKeyType($value)
    {
        $this->_contentKeyType = $value;
    }

    /**
     * Get "Last modified"
     *
     * @return \DateTime
     */
    public function getLastModified()
    {
        return $this->_lastModified;
    }

    /**
     * Get "Created"
     *
     * @return \DateTime
     */
    public function getCreated()
    {
        return $this->_created;
    }

    /**
     * Get "ContentKey id"
     *
     * @return string
     */
    public function getId()
    {
        return $this->_id;
    }

    /**
     * Set "ContentKey id"
     *
     * @param string $value ContentKey id
     *
     * @return none
     */
    public function setId($value)
    {
        $this->_id = $value;
    }

    /**
     * Generate encryption content key. Encrypt aes key with protection key from WAMS
     *
     * @param string $aesKey        Content key to encrypt
     * @param string $protectionKey Protection key (public key) from WAMS
     *
     * @return none
     */
    private function _generateEncryptedContentKey($aesKey, $protectionKey)
    {
        $cert = openssl_x509_read($protectionKey);

        $cryptedContentKey = '';
        openssl_public_encrypt(
            $aesKey, 
            $cryptedContentKey, 
            $cert, 
            OPENSSL_PKCS1_OAEP_PADDING
        );

        $this->_encryptedContentKey = base64_encode($cryptedContentKey);
    }

    /**
     * Generate checksum for content key.
     *
     * @param string $aesKey Content key
     *
     * @return none
     */
    private function _generateChecksum($aesKey)
    {
        $encrypted = mcrypt_encrypt(
            MCRYPT_RIJNDAEL_128, // AES
            $aesKey,
            $this->_id,
            MCRYPT_MODE_ECB
        );

        $this->_checksum = base64_encode(substr($encrypted, 0, 8));
    }

    /**
     * Set not encrypted content key. Automatically encrypted content key and
     * set checksum
     *
     * @param string $value         Content key
     * @param string $protectionKey Protection key (public key) from WAMS
     *
     * @return none
     */
    public function setContentKey($value, $protectionKey)
    {
        $this->_generateEncryptedContentKey($value, $protectionKey);

        $this->_generateChecksum($value);
    }   

    /**
     * Get "AuthorizationPolicyId"
     *
     * @return string
     */
    public function getAuthorizationPolicyId()
    {
        return $this->_authorizationPolicyId;
    }

    /**
     * Set "AuthorizationPolicyId"
     *
     * @param string $value AuthorizationPolicyId id
     *
     * @return none
     */
    public function setAuthorizationPolicyId($value)
    {
        $this->_authorizationPolicyId = $value;
    }
}


