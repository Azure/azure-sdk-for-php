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

namespace WindowsAzure\MediaServices\Templates;
use WindowsAzure\Common\Internal\Validate;
use WindowsAzure\Common\Internal\Utilities;

/**
 * Represents ScmsRestriction object used in media services
 *
 * @category  Microsoft
 * @package   WindowsAzure\MediaServices\Templates
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: 0.4.2_2016-04
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
class ScmsRestriction
{
    /**
     * ScmsRestriction ConfigurationData
     *
     * @var int
     */
    private $_configurationData;

    /**
     * Create ScmsRestriction
     *
     * @return void
     */
    public function __construct($configurationData)
    {        
        $this->setConfigurationData($configurationData);
    }
    
    /**
     * Configures the Serial Copy Management System (SCMS) control bits. For further details see the PlayReady Compliance Rules.
     *
     * @return int ConfigurationData
     */
    public function getConfigurationData()
    {
        return $this->_configurationData;
    }

    /**
     * Configures the Serial Copy Management System (SCMS) control bits. For further details see the PlayReady Compliance Rules.
     *
     * @param int $value ConfigurationData
     *
     * @return void
     */
    public function setConfigurationData($value)
    {
        self::verifyTwoBitConfigurationData($value);
        $this->_configurationData = $value;
    }    

    /**
     * @param int $value ConfigurationData
     *
     * @return void
     */
    public static function verifyTwoBitConfigurationData($configurationData) {
        if (($configurationData & 0x3) != $configurationData) {
           throw new \InvalidArgumentException(ErrorMessages::INVALID_TWO_BIT_CONFIGURATION_DATA);
       }
    }
}


