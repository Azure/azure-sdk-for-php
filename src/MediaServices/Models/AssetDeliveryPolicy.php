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
 * Represents AssetDeliveryPolicy object used in media services.
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
class AssetDeliveryPolicy
{
    /**
     * AssetDeliveryPolicy id.
     *
     * @var string
     */
    private $_id;

    /**
     * AssetDeliveryPolicy Name.
     *
     * @var string
     */
    private $_name;

    /**
     * AssetDeliveryPolicy AssetDeliveryProtocol.
     *
     * @var int
     */
    private $_protocol;

    /**
     * AssetDeliveryPolicy AssetDeliveryPolicyType.
     *
     * @var int
     */
    private $_policyType;

    /**
     * AssetDeliveryPolicy AssetDeliveryConfiguration.
     *
     * @var int
     */
    private $_configuration;

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
     * Create AssetDeliveryPolicy from array.
     *
     * @param array $options Array containing values for object properties
     *
     * @return AssetDeliveryPolicy
     */
    public static function createFromOptions($options)
    {
        $assetDeliveryPolicy = new self();
        $assetDeliveryPolicy->fromArray($options);

        return $assetDeliveryPolicy;
    }

    /**
     * Create AssetDeliveryPolicy.
     */
    public function __construct()
    {
    }

    /**
     * Fill AssetDeliveryPolicy from array.
     *
     * @param array $options Array containing values for object properties
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

        if (isset($options['AssetDeliveryProtocol'])) {
            Validate::isInteger($options['AssetDeliveryProtocol'], 'options[AssetDeliveryProtocol]');
            $this->_protocol = $options['AssetDeliveryProtocol'];
        }

        if (isset($options['AssetDeliveryPolicyType'])) {
            Validate::isInteger($options['AssetDeliveryPolicyType'], 'options[AssetDeliveryPolicyType]');
            $this->_policyType = $options['AssetDeliveryPolicyType'];
        }

        if (isset($options['AssetDeliveryConfiguration'])) {
            Validate::isString($options['AssetDeliveryConfiguration'], 'options[AssetDeliveryConfiguration]');
            $this->_configuration = $options['AssetDeliveryConfiguration'];
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
    }

    /**
     * Get "AssetDeliveryPolicy id".
     *
     * @return string
     */
    public function getId()
    {
        return $this->_id;
    }

    /**
     * Set "AssetDeliveryPolicy id".
     *
     * @param string $value AssetDeliveryPolicy id
     */
    public function setId($value)
    {
        $this->_id = $value;
    }

    /**
     * Get "AssetDeliveryPolicy Name".
     *
     * @return string
     */
    public function getName()
    {
        return $this->_name;
    }

    /**
     * Set "AssetDeliveryPolicy Name".
     *
     * @param string $value Name
     */
    public function setName($value)
    {
        $this->_name = $value;
    }

    /**
     * Get "AssetDeliveryPolicy AssetDeliveryProtocol".
     *
     * @return int
     */
    public function getAssetDeliveryProtocol()
    {
        return $this->_protocol;
    }

    /**
     * Set "AssetDeliveryPolicy AssetDeliveryProtocol".
     *
     * @param int $value Name
     */
    public function setAssetDeliveryProtocol($value)
    {
        $this->_protocol = $value;
    }

    /**
     * Get "AssetDeliveryPolicy AssetDeliveryPolicyType".
     *
     * @return int
     */
    public function getAssetDeliveryPolicyType()
    {
        return $this->_policyType;
    }

    /**
     * Set "AssetDeliveryPolicy AssetDeliveryPolicyType".
     *
     * @param int $value AssetDeliveryPolicyType
     */
    public function setAssetDeliveryPolicyType($value)
    {
        $this->_policyType = $value;
    }

    /**
     * Get "AssetDeliveryPolicy AssetDeliveryConfiguration".
     *
     * @return string
     */
    public function getAssetDeliveryConfiguration()
    {
        return $this->_configuration;
    }

    /**
     * Set "AssetDeliveryPolicy AssetDeliveryConfiguration".
     *
     * @param string $value NameAssetDeliveryConfiguration
     */
    public function setAssetDeliveryConfiguration($value)
    {
        $this->_configuration = $value;
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
}
