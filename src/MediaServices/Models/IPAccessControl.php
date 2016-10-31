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
 * Represents IPAccessControl ComplexType object used in media services.
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
class IPAccessControl
{
    /**
     * IPAccessControl Allow.
     *
     * @var IPRange[]
     */
    private $_allow;

    /**
     * Create IPAccessControl from array.
     *
     * @param array $options Array containing values for object properties
     *
     * @return IPAccessControl
     */
    public static function createFromOptions(array $options)
    {
        $operation = new self();
        $operation->fromArray($options);

        return $operation;
    }

    /**
     * Create IPAccessControl.
     */
    public function __construct()
    {
        $this->_allow = [];
    }

    /**
     * Fill IPRange from array.
     *
     * @param array $options Array containing values for object properties
     */
    public function fromArray(array $options)
    {
        if (isset($options['Allow'])) {
            Validate::isArray($options['Allow'], 'options[Allow]');
            foreach ($options['Allow'] as $allow) {
                $this->_allow[] = IPRange::createFromOptions($allow);
            }
        }
    }

    /**
     * Get the ip access control allow.
     *
     * @return IPRange[]
     */
    public function getAllow()
    {
        return $this->_allow;
    }

    /**
     * Set the ip access control allow.
     *
     * @param IPRange[] $value ip range Name
     */
    public function setAllow(array $value)
    {
        $this->_allow = $value;
    }
}
