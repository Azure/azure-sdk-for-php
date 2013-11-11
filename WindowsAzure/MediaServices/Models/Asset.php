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


/**
 * Represents asset object used in media services
 *
 * @category  Microsoft
 * @package   WindowsAzure\MediaServices\Models
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: 0.3.1_2011-08
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
class Asset
{
    /**
     * Asset id
     *
     * @var string
     */
    private $_id;

    /**
     * State
     *
     * @var int
     */
    private $_state;

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
     * Alternate id
     *
     * @var string
     */
    private $_alternateId;

    /**
     * Name
     *
     * @var string
     */
    private $_name;

    /**
     * Options
     *
     * @var int
     */
    private $_options;

    /**
     * URI
     *
     * @var string
     */
    private $_uri;

    /**
     * Locators entity set
     *
     * @var array
     */
    private $_locators;

    /**
     * Files entity set
     *
     * @var array
     */
    private $_files;

    /**
     * Parent assets entity set
     *
     * @var array
     */
    private $_parentAssets;

    /**
     * Storage account name
     *
     * @var string
     */
    private $_storageAccountName;

    /**
     * Storage account entity set
     *
     * @var array
     */
    private $_storageAccount;

    /**
     * Create asset
     *
     * @param int   $options    Asset encrytion options.
     *                          None = 0,
     *                          StorageEncrypted = 1,
     *                          CommonEncryptionProtected = 2,
     *                          EnvelopeEncryptionProtected = 4
     */
    public function __construct($options) {
        $this->options = $options;
    }

    /**
     * Get "Storage account entity set"
     *
     * @return array
     */
    public function getStorageAccount() {
       return $this->_storageAccount;
    }

    /**
     * Get "Storage account name"
     *
     * @return string
     */
    public function getStorageAccountName() {
       return $this->_storageAccountName;
    }

    /**
     * Set "Storage account name"
     *
     * @param string    $value Storage account name
     *
     * @return none
     */
    public function setStorageAccountName($value) {
        $this->_storageAccountName = $value;
    }

    /**
     * Get "Parent assets entity set"
     *
     * @return array
     */
    public function getParentAssets() {
       return $this->_parentAssets;
    }

    /**
     * Set "Parent assets entity set"
     *
     * @param array    $value Parent assets entity set
     *
     * @return none
     */
    public function setParentAssets($value) {
        $this->_parentAssets = $value;
    }

    /**
     * Get "Files entity set"
     *
     * @return array
     */
    public function getFiles() {
       return $this->_files;
    }

    /**
     * Get "Locators entity set"
     *
     * @return array
     */
    public function getLocators() {
       return $this->_locators;
    }

    /**
     * Get "URI"
     *
     * @return string
     */
    public function getUri() {
       return $this->_uri;
    }

    /**
     * Get "Options"
     *
     * @return int
     */
    public function getOptions() {
       return $this->_options;
    }

    /**
     * Set "Options"
     *
     * @param int    $value Options
     *
     * @return none
     */
    public function setOptions($value) {
        $this->_options = $value;
    }

    /**
     * Get "Name"
     *
     * @return string
     */
    public function getName() {
       return $this->_name;
    }

    /**
     * Set "Name"
     *
     * @param string    $value Name
     *
     * @return none
     */
    public function setName($value) {
        $this->_name = $value;
    }

    /**
     * Get "Alternate id"
     *
     * @return string
     */
    public function getAlternateId() {
       return $this->_alternateId;
    }

    /**
     * Set "Alternate id"
     *
     * @param string    $value Alternate id
     *
     * @return none
     */
    public function setAlternateId($value) {
        $this->_alternateId = $value;
    }

    /**
     * Get "Last modified"
     *
     * @return \DateTime
     */
    public function getLastModified() {
       return $this->_lastModified;
    }

    /**
     * Get "Created"
     *
     * @return \DateTime
     */
    public function getCreated() {
       return $this->_created;
    }

    /**
     * Get "State"
     *
     * @return int
     */
    public function getState() {
       return $this->_state;
    }

    /**
     * Get "Asset id"
     *
     * @return string
     */
    public function getId() {
       return $this->_id;
    }
}


