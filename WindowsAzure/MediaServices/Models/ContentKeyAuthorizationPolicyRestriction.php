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
 * Represents ContentKeyAuthorizationPolicyRestriction object used in media services
 *
 * @category  Microsoft
 * @package   WindowsAzure\MediaServices\Models
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: 0.4.2_2016-04
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
class ContentKeyAuthorizationPolicyRestriction
{
    /**
     * ContentKeyAuthorizationPolicyRestriction Name
     *
     * @var string
     */
    private $_name;

    /**
     * ContentKeyAuthorizationPolicyRestriction KeyRestrictionType
     *
     * @var int
     */
    private $_keyRestrictionType;

    /**
     * ContentKeyAuthorizationPolicyRestriction Requirements
     *
     * @var string
     */
    private $_requirements;

    /**
     * Return a list of fields that must be sent (even if it's null or zero)
     * @return string[]
     */
    public function requiredFields() {
        return ['KeyRestrictionType'];
    }

    /**
     * Create ContentKeyAuthorizationPolicyRestriction from array
     *
     * @param array $options Array containing values for object properties
     *
     * @return ContentKeyAuthorizationPolicyRestriction
     */
    public static function createFromOptions($options)
    {
        $contentKeyAuthorizationPolicyRestriction = new ContentKeyAuthorizationPolicyRestriction();
        $contentKeyAuthorizationPolicyRestriction->fromArray($options);

        return $contentKeyAuthorizationPolicyRestriction;
    }

    /**
     * Create ContentKeyAuthorizationPolicyRestriction
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Fill ContentKeyAuthorizationPolicyRestriction from array
     *
     * @param array $options Array containing values for object properties
     *
     * @return void
     */
    public function fromArray($options)
    {
        if (isset($options['Name'])) {
            Validate::isString($options['Name'], 'options[Name]');
            $this->_name = $options['Name'];
        }

        if (isset($options['KeyRestrictionType'])) {
            Validate::isInteger($options['KeyRestrictionType'], 'options[KeyRestrictionType]');
            $this->_keyRestrictionType = $options['KeyRestrictionType'];
        }

        if (isset($options['Requirements'])) {
            Validate::isString($options['Requirements'], 'options[Requirements]');
            $this->_requirements = $options['Requirements'];
        }
    }

    /**
     * Get "ContentKeyAuthorizationPolicyRestriction Name"
     *
     * @return string
     */
    public function getName()
    {
        return $this->_name;
    }

    /**
     * Set "ContentKeyAuthorizationPolicy Name"
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
     * Get "ContentKeyAuthorizationPolicyRestriction KeyRestrictionType"
     *
     * @return string
     */
    public function getKeyRestrictionType()
    {
        return $this->_keyRestrictionType;
    }

    /**
     * Set "ContentKeyAuthorizationPolicyRestriction KeyRestrictionType"
     *
     * @param string $value ContentKeyAuthorizationPolicyRestriction KeyRestrictionType
     *
     * @return void
     */
    public function setKeyRestrictionType($value)
    {
        $this->_keyRestrictionType = $value;
    }
    
    /**
     * Get "ContentKeyAuthorizationPolicyRestriction Requirements"
     *
     * @return string
     */
    public function getRequirements()
    {
        return $this->_requirements;
    }

    /**
     * Set "ContentKeyAuthorizationPolicyRestriction Requirements"
     *
     * @param string $value ContentKeyAuthorizationPolicyRestriction Requirements
     *
     * @return void
     */
    public function setRequirements($value)
    {
        $this->_requirements = $value;
    }    
}


