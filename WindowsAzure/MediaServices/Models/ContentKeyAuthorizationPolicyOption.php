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
 * Represents ContentKeyAuthorizationPolicy object used in media services
 *
 * @category  Microsoft
 * @package   WindowsAzure\MediaServices\Models
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: 0.4.2_2016-04
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
class ContentKeyAuthorizationPolicyOption
{
    /**
     * ContentKeyAuthorizationPolicyOption id
     *
     * @var string
     */
    private $_id;

    /**
     * ContentKeyAuthorizationPolicyOption Name
     *
     * @var string
     */
    private $_name;

    /**
     * ContentKeyAuthorizationPolicyOption KeyDeliveryType
     *
     * @var int
     */
    private $_keyDeliveryType;

    /**
     * ContentKeyAuthorizationPolicyOption KeyDeliveryConfiguration
     *
     * @var string
     */
    private $_keyDeliveryConfiguration;

    /**
     * ContentKeyAuthorizationPolicyOption Restrictions
     *
     * @var array
     */
    private $_restrictions;

    /**
     * Create ContentKeyAuthorizationPolicyOption from array
     *
     * @param array $options Array containing values for object properties
     *
     * @return ContentKeyAuthorizationPolicyOption
     */
    public static function createFromOptions($options)
    {
        $contentKeyAuthorizationOptions = new ContentKeyAuthorizationPolicyOption();
        $contentKeyAuthorizationOptions->fromArray($options);

        return $contentKeyAuthorizationOptions;
    }

    /**
     * Create ContentKeyAuthorizationPolicyOption
     *
     * @return void
     */
    public function __construct()
    {
        $this->_restrictions = array();
    }

    /**
     * Return a list of fields that must be sent (even if null)
     * @return string[]
     */
    public function requiredFields() {
        return ['KeyDeliveryType'];
    }

    /**
     * Fill ContentKeyAuthorizationPolicyOption from array
     *
     * @param array $options Array containing values for object properties
     *
     * @return void
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
        
        if (isset($options['KeyDeliveryType'])) {
            Validate::isInteger($options['KeyDeliveryType'], 'options[KeyDeliveryType]');
            $this->_keyDeliveryType = $options['KeyDeliveryType'];
        }

        if (isset($options['KeyDeliveryConfiguration'])) {
            Validate::isString($options['KeyDeliveryConfiguration'], 'options[KeyDeliveryConfiguration]');
            $this->_keyDeliveryConfiguration = $options['KeyDeliveryConfiguration'];
        }  

        if (!empty($options['Restrictions'])) {
            Validate::isArray($options['Restrictions'], 'options[Restrictions]');
            foreach ($options['Restrictions'] as $restriction) {
                $this->_restrictions[] = ContentKeyAuthorizationPolicyRestriction::createFromOptions($restriction);
            }            
        }
    }

    /**
     * Get "ContentKeyAuthorizationPolicyOption id"
     *
     * @return string
     */
    public function getId()
    {
        return $this->_id;
    }

    /**
     * Set "ContentKeyAuthorizationPolicyOption id"
     *
     * @param string $value ContentKey id
     *
     * @return void
     */
    public function setId($value)
    {
        $this->_id = $value;
    }
    
    /**
     * Get "ContentKeyAuthorizationPolicyOption Name"
     *
     * @return string
     */
    public function getName()
    {
        return $this->_name;
    }

    /**
     * Set "ContentKeyAuthorizationPolicyOption Name"
     *
     * @param string $value Name
     *
     * @return void
     */
    public function setName($value)
    {
        $this->_name = $value;
    }    

    /**
     * Get "ContentKeyAuthorizationPolicyOption KeyDeliveryType"
     *
     * @return int
     */
    public function getKeyDeliveryType()
    {
        return $this->_keyDeliveryType;
    }

    /**
     * Set "ContentKeyAuthorizationPolicyOption KeyDeliveryType"
     *
     * @param int $value NameKeyDeliveryType
     *
     * @return void
     */
    public function setKeyDeliveryType($value)
    {
        $this->_keyDeliveryType = $value;
    }    

    /**
     * Get "ContentKeyAuthorizationPolicyOption KeyDeliveryConfiguration"
     *
     * @return string
     */
    public function getKeyDeliveryConfiguration()
    {
        return $this->_keyDeliveryConfiguration;
    }

    /**
     * Set "ContentKeyAuthorizationPolicyOption KeyDeliveryConfiguration"
     *
     * @param string $value NameKeyDeliveryType
     *
     * @return void
     */
    public function setKeyDeliveryConfiguration($value)
    {
        $this->_keyDeliveryConfiguration = $value;
    }

    /**
     * Get "ContentKeyAuthorizationPolicyOption Restrictions"
     *
     * @return string
     */
    public function getRestrictions()
    {
        return $this->_restrictions;
    }

    /**
     * Set "ContentKeyAuthorizationPolicyOption Restrictions"
     *
     * @param array $value NameKeyDeliveryType
     *
     * @return void
     */
    public function setRestrictions($value)
    {
        $this->_restrictions = $value;
    }
}


