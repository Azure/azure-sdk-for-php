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
 * Represents ContentKeyAuthorizationPolicy object used in media services.
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
class ContentKeyAuthorizationPolicy
{
    /**
     * ContentKeyAuthorizationPolicy id.
     *
     * @var string
     */
    private $_id;

    /**
     * ContentKeyAuthorizationPolicy Name.
     *
     * @var string
     */
    private $_name;

    /**
     * Create ContentKeyAuthorizationPolicy from array.
     *
     * @param array $options Array containing values for object properties
     *
     * @return ContentKeyAuthorizationPolicy
     */
    public static function createFromOptions($options)
    {
        $contentKeyAuthorizationPolicy = new self();
        $contentKeyAuthorizationPolicy->fromArray($options);

        return $contentKeyAuthorizationPolicy;
    }

    /**
     * Create ContentKeyAuthorizationPolicy.
     */
    public function __construct()
    {
    }

    /**
     * Fill ContentKeyAuthorizationPolicy from array.
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
    }

    /**
     * Get "ContentKeyAuthorizationPolicy id".
     *
     * @return string
     */
    public function getId()
    {
        return $this->_id;
    }

    /**
     * Set "ContentKeyAuthorizationPolicy id".
     *
     * @param string $value ContentKey id
     */
    public function setId($value)
    {
        $this->_id = $value;
    }

    /**
     * Get "ContentKeyAuthorizationPolicy Name".
     *
     * @return string
     */
    public function getName()
    {
        return $this->_name;
    }

    /**
     * Set "ContentKeyAuthorizationPolicy Name".
     *
     * @param string $value Name
     */
    public function setName($value)
    {
        $this->_name = $value;
    }
}
