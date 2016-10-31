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

namespace WindowsAzure\MediaServices\Models;

use WindowsAzure\Common\Internal\Validate;

/**
 * Represents IngestManifest object used in media services.
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
class IngestManifest
{
    /**
     * The state of the manifest "inactive".
     *
     * @var int
     */
    const STATE_INACTIVE = 0;

    /**
     * The state of the manifest "activating".
     *
     * @var int
     */
    const STATE_ACTIVATING = 1;

    /**
     * The state of the manifest "active".
     *
     * @var int
     */
    const STATE_ACTIVE = 2;

    /**
     * Manifest id.
     *
     * @var string
     */
    private $_id;

    /**
     * State.
     *
     * @var int
     */
    private $_state;

    /**
     * Created.
     *
     * @var \DateTime
     */
    private $_created;

    /**
     * Last modified.
     *
     * @var \DateTime
     */
    private $_lastModified;

    /**
     * Name.
     *
     * @var string
     */
    private $_name;

    /**
     * Storage account name.
     *
     * @var string
     */
    private $_storageAccountName;

    /**
     * BlobStorageUriForUpload.
     *
     * @var string
     */
    private $_blobStorageUriForUpload;

    /**
     * Statistics.
     *
     * @var IngestManifestStatistics
     */
    private $_statistics;

    /**
     * Create manifest from array.
     *
     * @param array $options Array containing values for object properties
     *
     * @return IngestManifest
     */
    public static function createFromOptions(array $options)
    {
        $manifest = new self();
        $manifest->fromArray($options);

        return $manifest;
    }

    /**
     * Fill manifest from array.
     *
     * @param array $options Array containing values for object properties
     */
    public function fromArray(array $options)
    {
        if (isset($options['Id'])) {
            Validate::isString($options['Id'], 'options[Id]');
            $this->_id = $options['Id'];
        }

        if (isset($options['State'])) {
            Validate::isInteger($options['State'], 'options[State]');
            $this->_state = $options['State'];
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

        if (isset($options['Name'])) {
            Validate::isString($options['Name'], 'options[Name]');
            $this->_name = $options['Name'];
        }

        if (isset($options['BlobStorageUriForUpload'])) {
            Validate::isValidUri(
                $options['BlobStorageUriForUpload'],
                'options[BlobStorageUriForUpload]'
            );
            $this->_blobStorageUriForUpload = $options['BlobStorageUriForUpload'];
        }

        if (isset($options['Statistics'])) {
            $this->_statistics = null;
            if (is_array($options['Statistics'])) {
                $this->_statistics = IngestManifestStatistics::createFromOptions(
                    $options['Statistics']
                );
            }
        }

        if (isset($options['StorageAccountName'])) {
            Validate::isString(
                $options['StorageAccountName'],
                'options[StorageAccountName]'
            );
            $this->_storageAccountName = $options['StorageAccountName'];
        }
    }

    /**
     * Get "Statistics".
     *
     * @return IngestManifestStatistics
     */
    public function getStatistics()
    {
        return $this->_statistics;
    }

    /**
     * Get "BlobStorageUriForUpload".
     *
     * @return string
     */
    public function getBlobStorageUriForUpload()
    {
        return $this->_blobStorageUriForUpload;
    }

    /**
     * Get "Storage account name".
     *
     * @return string
     */
    public function getStorageAccountName()
    {
        return $this->_storageAccountName;
    }

    /**
     * Get "Name".
     *
     * @return string
     */
    public function getName()
    {
        return $this->_name;
    }

    /**
     * Set "Name".
     *
     * @param string $value Name
     */
    public function setName($value)
    {
        $this->_name = $value;
    }

    /**
     * Get "Last modified".
     *
     * @return \DateTime
     */
    public function getLastModified()
    {
        return $this->_lastModified;
    }

    /**
     * Get "Created".
     *
     * @return \DateTime
     */
    public function getCreated()
    {
        return $this->_created;
    }

    /**
     * Get "State".
     *
     * @return int
     */
    public function getState()
    {
        return $this->_state;
    }

    /**
     * Get "Manifest id".
     *
     * @return string
     */
    public function getId()
    {
        return $this->_id;
    }
}
