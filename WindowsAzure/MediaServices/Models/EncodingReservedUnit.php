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
 * Represents AssetDeliveryPolicy object used in media services
 *
 * @category  Microsoft
 * @package   WindowsAzure\MediaServices\Models
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: 0.4.2_2016-04
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
class EncodingReservedUnit
{
    // AccountId
    private $_accountId;

    // ReservedUnitType
    private $_reservedUnitType;

    // MaxReservableUnits
    private $_maxReservableUnits;

    // CurrentReservedUnits
    private $_currentReservedUnits;

    /**
     * Create EncodingReservedUnitType from array
     *
     * @param array $options Array containing values for object properties
     *
     * @return EncodingReservedUnit
     */
    public static function createFromOptions($options)
    {
        $encodingReservedUnitType = new EncodingReservedUnit();
        $encodingReservedUnitType->fromArray($options);

        return $encodingReservedUnitType;
    }

    /**
     * Create EncodingReservedUnitType
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Fill EncodingReservedUnitType from array
     *
     * @param array $options Array containing values for object properties
     *
     * @return void
     */
    public function fromArray($options)
    {
        if (isset($options['AccountId'])) {
            Validate::isString($options['AccountId'], 'options[AccountId]');
            $this->_accountId = $options['AccountId'];
        }

        if (isset($options['ReservedUnitType'])) {
            Validate::isInteger($options['ReservedUnitType'], 'options[ReservedUnitType]');
            $this->_reservedUnitType = intval($options['ReservedUnitType']);
        }

        if (isset($options['MaxReservableUnits'])) {
            Validate::isInteger($options['MaxReservableUnits'], 'options[MaxReservableUnits]');
            $this->_maxReservableUnits = intval($options['MaxReservableUnits']);
        }
        
        if (isset($options['CurrentReservedUnits'])) {
            Validate::isString($options['CurrentReservedUnits'], 'options[CurrentReservedUnits]');
            $this->_currentReservedUnits = intval($options['CurrentReservedUnits']);
        }
    }

    /**
     * Return a list of fields that must be sent (even if null)
     * @return string[]
     */
    public function requiredFields() {
        return ['ReservedUnitType', 'CurrentReservedUnits'];
    }


    /**
     * @return string the accountId
     */
    public function getAccountId() {
        return $this->_accountId;
    }

    /**
     * @param string $accountId the accountId to set
     */
    public function setAccountId($accountId) {
        $this->_accountId = $accountId;
    }

    /**
     * @return int the reservedUnitType
     */
    public function getReservedUnitType() {
        return $this->_reservedUnitType;
    }

    /**
     * @param int $reservedUnitType the reservedUnitType to set
     */
    public function setReservedUnitType($reservedUnitType) {
        $this->_reservedUnitType = $reservedUnitType;
    }

    /**
     * @return int the maxReservableUnits
     */
    public function getMaxReservableUnits() {
        return $this->_maxReservableUnits;
    }

    /**
     * @param int $maxReservableUnits the maxReservableUnits to set
     */
    public function setMaxReservableUnits($maxReservableUnits) {
        $this->_maxReservableUnits = $maxReservableUnits;
    }

    /**
     * @return int the currentReservedUnits
     */
    public function getCurrentReservedUnits() {
        return $this->_currentReservedUnits;
    }

    /**
     * @param int $currentReservedUnits the currentReservedUnits to set
     */
    public function setCurrentReservedUnits($currentReservedUnits) {
        $this->_currentReservedUnits = $currentReservedUnits;
    }
}


