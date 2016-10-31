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
 * Represents IPRange ComplexType object used in media services.
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
class IPRange
{
    /**
     * IPRange Name.
     *
     * @var string
     */
    private $_name;

    /**
     * IPRange Address.
     *
     * @var string
     */
    private $_address;

    /**
     * IPRange SubnetPrefixLength.
     *
     * @var string
     */
    private $_subnetPrefixLength;

    /**
     * Create IPRange from array.
     *
     * @param array $options Array containing values for object properties
     *
     * @return IPRange
     */
    public static function createFromOptions($options)
    {
        $operation = new self();
        $operation->fromArray($options);

        return $operation;
    }

    /**
     * Create IPRange.
     */
    public function __construct()
    {
    }

    /**
     * Fill IPRange from array.
     *
     * @param array $options Array containing values for object properties
     */
    public function fromArray($options)
    {
        if (isset($options['Name'])) {
            Validate::isString($options['Name'], 'options[Name]');
            $this->_name = $options['Name'];
        }

        if (isset($options['Address'])) {
            Validate::isString($options['Address'], 'options[Address]');
            $this->_address = $options['Address'];
        }

        if (isset($options['SubnetPrefixLength'])) {
            Validate::isString($options['SubnetPrefixLength'], 'options[SubnetPrefixLength]');
            $this->_subnetPrefixLength = $options['SubnetPrefixLength'];
        }
    }

    /**
     * Return a list of fields that must be sent (even if null).
     *
     * @return string[]
     */
    public function requiredFields()
    {
        return ['SubnetPrefixLength'];
    }

    /**
     * Get the ip range Name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->_name;
    }

    /**
     * Set the ip range Name.
     *
     * @param string $value ip range Name
     */
    public function setName($value)
    {
        $this->_name = $value;
    }

    /**
     * Get the ip range Address.
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->_address;
    }

    /**
     * Set the ip range Address.
     *
     * @param string $value ip range Address
     */
    public function setAddress($value)
    {
        $this->_address = $value;
    }

    /**
     * Get the ip range SubnetPrefixLength.
     *
     * @return string
     */
    public function getSubnetPrefixLength()
    {
        return $this->_subnetPrefixLength;
    }

    /**
     * Set the ip range SubnetPrefixLength.
     *
     * @param string $value ip range SubnetPrefixLength
     */
    public function setSubnetPrefixLength($value)
    {
        $this->_subnetPrefixLength = $value;
    }
}
