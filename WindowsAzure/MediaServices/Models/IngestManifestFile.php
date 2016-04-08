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
use WindowsAzure\Common\Internal\Utilities;
use WindowsAzure\Common\Internal\Validate;

/**
 * Represents IngestManifestFile file object used in media services
 *
 * @category  Microsoft
 * @package   WindowsAzure\MediaServices\Models
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: 0.4.2_2016-04
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
class IngestManifestFile
{
    /**
     * The state of the file "inactive"
     *
     * @var int
     */
    const STATE_PENDING = 0;

    /**
     * The state of the file "finished"
     *
     * @var int
     */
    const STATE_FINISHED = 1;

    /**
     * The state of the file "error"
     *
     * @var int
     */
    const STATE_ERROR = 2;

    /**
     * IngestManifestFile Id
     *
     * @var string
     */
    private $_id;

    /**
     * Name
     *
     * @var string
     */
    private $_name;

    /**
     * Encryption version
     *
     * @var string
     */
    private $_encryptionVersion;

    /**
     * Encryption scheme
     *
     * @var string
     */
    private $_encryptionScheme;

    /**
     * Is encrypted
     *
     * @var bool
     */
    private $_isEncrypted;

    /**
     * Encryption key id
     *
     * @var string
     */
    private $_encryptionKeyId;

    /**
     * Initialization vector
     *
     * @var string
     */
    private $_initializationVector;

    /**
     * Is primary
     *
     * @var bool
     */
    private $_isPrimary;

    /**
     * Last modified
     *
     * @var \DateTime
     */
    private $_lastModified;

    /**
     * Created
     *
     * @var \DateTime
     */
    private $_created;

    /**
     * Mime type
     *
     * @var string
     */
    private $_mimeType;

    /**
     * State
     *
     * @var int
     */
    private $_state;

    /**
     * ParentIngestManifestId
     *
     * @var string
     */
    private $_parentIngestManifestId;

    /**
     * ParentIngestManifestAssetId
     *
     * @var string
     */
    private $_parentIngestManifestAssetId;

    /**
     * ErrorDetail
     *
     * @var string
     */
    private $_errorDetail;

    /**
     * Create manifest file from array
     *
     * @param array $options Array containing values for object properties
     *
     * @return WindowsAzure\MediaServices\Models\IngestManifestFile
     */
    public static function createFromOptions($options)
    {
        Validate::notNull($options['Name'], 'options[Name]');
        Validate::notNull(
            $options['ParentIngestManifestId'],
            'options[ParentIngestManifestId]'
        );
        Validate::notNull(
            $options['ParentIngestManifestAssetId'],
            'options[ParentIngestManifestAssetId]'
        );

        $file = new IngestManifestFile(
            $options['Name'],
            $options['ParentIngestManifestId'],
            $options['ParentIngestManifestAssetId']
        );

        $file->fromArray($options);

        return $file;
    }

    /**
     * Create manifest file
     *
     * @param string $name                        Actual filename that will be
     * uploaded.
     *
     * @param string $parentIngestManifestId      IngestManifest Id of the manifest
     * that contains this file.
     *
     * @param string $parentIngestManifestAssetId IngestManifestAsset Id of the
     * IngestManifestAsset that this file is associated with.
     */
    public function __construct(
        $name,
        $parentIngestManifestId,
        $parentIngestManifestAssetId
    ) {
        $this->_name                        = $name;
        $this->_parentIngestManifestId      = $parentIngestManifestId;
        $this->_parentIngestManifestAssetId = $parentIngestManifestAssetId;
    }

    /**
     * Fill manifest file from array
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

        if (isset($options['Name'])) {
            Validate::isString($options['Name'], 'options[Name]');
            $this->_name = $options['Name'];
        }

        if (isset($options['EncryptionVersion'])) {
            Validate::isString(
                $options['EncryptionVersion'],
                'options[EncryptionVersion]'
            );
            $this->_encryptionVersion = $options['EncryptionVersion'];
        }

        if (isset($options['EncryptionScheme'])) {
            Validate::isString(
                $options['EncryptionScheme'],
                'options[EncryptionScheme]'
            );
            $this->_encryptionScheme = $options['EncryptionScheme'];
        }

        if (isset($options['IsEncrypted'])) {
            Validate::isBoolean($options['IsEncrypted'], 'options[IsEncrypted]');
            $this->_isEncrypted = $options['IsEncrypted'];
        }

        if (isset($options['EncryptionKeyId'])) {
            Validate::isString(
                $options['EncryptionKeyId'],
                'options[EncryptionKeyId]'
            );
            $this->_encryptionKeyId = $options['EncryptionKeyId'];
        }

        if (isset($options['InitializationVector'])) {
            Validate::isString(
                $options['InitializationVector'],
                'options[InitializationVector]'
            );
            $this->_initializationVector = $options['InitializationVector'];
        }

        if (isset($options['IsPrimary'])) {
            Validate::isBoolean($options['IsPrimary'], 'options[IsPrimary]');
            $this->_isPrimary = $options['IsPrimary'];
        }

        if (isset($options['LastModified'])) {
            Validate::isDateString(
                $options['LastModified'],
                'options[LastModified]'
            );
            $this->_lastModified = new \DateTime($options['LastModified']);
        }

        if (isset($options['Created'])) {
            Validate::isDateString($options['Created'], 'options[Created]');
            $this->_created = new \DateTime($options['Created']);
        }

        if (isset($options['MimeType'])) {
            Validate::isString($options['MimeType'], 'options[MimeType]');
            $this->_mimeType = $options['MimeType'];
        }

        if (isset($options['State'])) {
            Validate::isInteger($options['State'], 'options[State]');
            $this->_state = $options['State'];
        }

        if (isset($options['ParentIngestManifestId'])) {
            Validate::isString(
                $options['ParentIngestManifestId'],
                'options[ParentIngestManifestId]'
            );
            $this->_parentIngestManifestId = $options['ParentIngestManifestId'];
        }

        if (isset($options['ParentIngestManifestAssetId'])) {
            Validate::isString(
                $options['ParentIngestManifestAssetId'],
                'options[ParentIngestManifestAssetId]'
            );
            $id = $options['ParentIngestManifestAssetId'];

            $this->_parentIngestManifestAssetId = $id;
        }

        if (isset($options['ErrorDetail'])) {
            Validate::isString($options['ErrorDetail'], 'options[ErrorDetail]');
            $this->_errorDetail = $options['ErrorDetail'];
        }
    }

    /**
     * Get "ErrorDetail"
     *
     * @return string
     */
    public function getErrorDetail()
    {
        return $this->_errorDetail;
    }

    /**
     * Get "ParentIngestManifestAssetId"
     *
     * @return string
     */
    public function getParentIngestManifestAssetId()
    {
        return $this->_parentIngestManifestAssetId;
    }

    /**
     * Set "ParentIngestManifestAssetId"
     *
     * @param string $value ParentIngestManifestAssetId
     *
     * @return none
     */
    public function setParentIngestManifestAssetId($value)
    {
        $this->_parentIngestManifestAssetId = $value;
    }

    /**
     * Get "ParentIngestManifestId"
     *
     * @return string
     */
    public function getParentIngestManifestId()
    {
        return $this->_parentIngestManifestId;
    }

    /**
     * Set "ParentIngestManifestId"
     *
     * @param string $value ParentIngestManifestId
     *
     * @return none
     */
    public function setParentIngestManifestId($value)
    {
        $this->_parentIngestManifestId = $value;
    }

    /**
     * Get "State"
     *
     * @return int
     */
    public function getState()
    {
        return $this->_state;
    }

    /**
     * Get "Mime type"
     *
     * @return string
     */
    public function getMimeType()
    {
        return $this->_mimeType;
    }

    /**
     * Set "Mime type"
     *
     * @param string $value Mime type
     *
     * @return none
     */
    public function setMimeType($value)
    {
        $this->_mimeType = $value;
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
     * Get "Last modified"
     *
     * @return \DateTime
     */
    public function getLastModified()
    {
        return $this->_lastModified;
    }

    /**
     * Get "Is primary"
     *
     * @return bool
     */
    public function getIsPrimary()
    {
        return $this->_isPrimary;
    }

    /**
     * Set "Is primary"
     *
     * @param bool $value Is primary
     *
     * @return none
     */
    public function setIsPrimary($value)
    {
        $this->_isPrimary = $value;
    }

    /**
     * Get "Initialization vector"
     *
     * @return string
     */
    public function getInitializationVector()
    {
        return $this->_initializationVector;
    }

    /**
     * Set "Initialization vector"
     *
     * @param string $value Initialization vector
     *
     * @return none
     */
    public function setInitializationVector($value)
    {
        $this->_initializationVector = $value;
    }

    /**
     * Get "Encryption key id"
     *
     * @return string
     */
    public function getEncryptionKeyId()
    {
        return $this->_encryptionKeyId;
    }

    /**
     * Set "Encryption key id"
     *
     * @param string $value Encryption key id
     *
     * @return none
     */
    public function setEncryptionKeyId($value)
    {
        $this->_encryptionKeyId = $value;
    }

    /**
     * Get "Is encrypted"
     *
     * @return bool
     */
    public function getIsEncrypted()
    {
        return $this->_isEncrypted;
    }

    /**
     * Set "Is encrypted"
     *
     * @param bool $value Is encrypted
     *
     * @return none
     */
    public function setIsEncrypted($value)
    {
        $this->_isEncrypted = $value;
    }

    /**
     * Get "Encryption scheme"
     *
     * @return string
     */
    public function getEncryptionScheme()
    {
        return $this->_encryptionScheme;
    }

    /**
     * Set "Encryption scheme"
     *
     * @param string $value Encryption scheme
     *
     * @return none
     */
    public function setEncryptionScheme($value)
    {
        $this->_encryptionScheme = $value;
    }

    /**
     * Get "Encryption version"
     *
     * @return string
     */
    public function getEncryptionVersion()
    {
        return $this->_encryptionVersion;
    }

    /**
     * Set "Encryption version"
     *
     * @param string $value Encryption version
     *
     * @return none
     */
    public function setEncryptionVersion($value)
    {
        $this->_encryptionVersion = $value;
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
     * Get "Manifest file Id"
     *
     * @return string
     */
    public function getId()
    {
        return $this->_id;
    }
}


