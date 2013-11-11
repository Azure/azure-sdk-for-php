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
 * Represents locator object used in media services
 *
 * @category  Microsoft
 * @package   WindowsAzure\MediaServices\Models
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: 0.3.1_2011-08
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
class Locator
{
    /**
     * Locator id
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
     * Expiration date time
     *
     * @var \DateTime
     */
    private $_expirationDateTime;

    /**
     * Type
     *
     * @var int
     */
    private $_type;

    /**
     * Path
     *
     * @var string
     */
    private $_path;

    /**
     * Base URI
     *
     * @var string
     */
    private $_baseUri;

    /**
     * Content access component
     *
     * @var string
     */
    private $_contentAccessComponent;

    /**
     * Access policy Id
     *
     * @var string
     */
    private $_accessPolicyId;

    /**
     * Asset id
     *
     * @var string
     */
    private $_assetId;

    /**
     * Start time
     *
     * @var \DateTime
     */
    private $_startTime;

    /**
     * Asset policy entity set
     *
     * @var array
     */
    private $_assetPolicy;

    /**
     * Asset
     *
     * @var array
     */
    private $_asset;

    /**
     * Create locator
     *
     * @param int   $type   Enumeration value that describes the type of Locator.
     *                      None = 0,
     *                      SAS = 1,
     *                      OnDemandOrigin = 2
     */
    public function __construct($type) {
        $this->_type = $type;
    }

    /**
     * Get "Asset"
     *
     * @return array
     */
    public function getAsset() {
       return $this->_asset;
    }

    /**
     * Get "Asset policy entity set"
     *
     * @return array
     */
    public function getAssetPolicy() {
       return $this->_assetPolicy;
    }

    /**
     * Get "Start time"
     *
     * @return \DateTime
     */
    public function getStartTime() {
       return $this->_startTime;
    }

    /**
     * Set "Start time"
     *
     * @param \DateTime    $value Start time
     *
     * @return none
     */
    public function setStartTime($value) {
        $this->_startTime = $value;
    }

    /**
     * Get "Asset id"
     *
     * @return string
     */
    public function getAssetId() {
       return $this->_assetId;
    }

    /**
     * Get "Access policy Id"
     *
     * @return string
     */
    public function getAccessPolicyId() {
       return $this->_accessPolicyId;
    }

    /**
     * Get "Content access component"
     *
     * @return string
     */
    public function getContentAccessComponent() {
       return $this->_contentAccessComponent;
    }

    /**
     * Get "Base URI"
     *
     * @return string
     */
    public function getBaseUri() {
       return $this->_baseUri;
    }

    /**
     * Get "Path"
     *
     * @return string
     */
    public function getPath() {
       return $this->_path;
    }

    /**
     * Get "Type"
     *
     * @return int
     */
    public function getType() {
       return $this->_type;
    }

    /**
     * Set "Type"
     *
     * @param int    $value Type
     *
     * @return none
     */
    public function setType($value) {
        $this->_type = $value;
    }

    /**
     * Get "Expiration date time"
     *
     * @return \DateTime
     */
    public function getExpirationDateTime() {
       return $this->_expirationDateTime;
    }

    /**
     * Set "Expiration date time"
     *
     * @param \DateTime    $value Expiration date time
     *
     * @return none
     */
    public function setExpirationDateTime($value) {
        $this->_expirationDateTime = $value;
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
     * Get "Locator id"
     *
     * @return string
     */
    public function getId() {
       return $this->_id;
    }

    /**
     * Set "Locator id"
     *
     * @param string    $value Locator id
     *
     * @return none
     */
    public function setId($value) {
        $this->_id = $value;
    }
}

