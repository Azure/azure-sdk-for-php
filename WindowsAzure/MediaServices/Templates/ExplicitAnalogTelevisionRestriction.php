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
 * Represents ExplicitAnalogTelevisionRestriction object used in media services
 *
 * @category  Microsoft
 * @package   WindowsAzure\MediaServices\Templates
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: 0.4.2_2016-04
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
class ExplicitAnalogTelevisionRestriction
{
    /**
     * ExplicitAnalogTelevisionRestriction BestEffort
     *
     * @var boolean
     */
    private $_bestEffort;

    /**
     * ExplicitAnalogTelevisionRestriction ConfigurationData
     *
     * @var int
     */
    private $_configurationData;

    /**
     * Create ExplicitAnalogTelevisionRestriction
     *
     * @return void
     */
    public function __construct($configurationData, $bestEffort = false)
    {
        $this->setConfigurationData($configurationData);
        $this->_bestEffort = $bestEffort;
    }
    
    /**
     * Controls whether the Explicit Analog Television Output Restriction is enforced on a Best Effort basis or not. If true, 
     * then the PlayReady client must make its best effort to enforce the restriction but can allow video content to flow to 
     * Analog Television Outputs if it cannot support the restriction. If false, the PlayReady client must enforce the restriction. 
     * For further details see the PlayReady Compliance Rules.
     *
     * @return boolean BestEffort
     */
    public function getBestEffort()
    {
        return $this->_bestEffort;
    }

    /**
     * Controls whether the Explicit Analog Television Output Restriction is enforced on a Best Effort basis or not. If true, 
     * then the PlayReady client must make its best effort to enforce the restriction but can allow video content to flow to 
     * Analog Television Outputs if it cannot support the restriction. If false, the PlayReady client must enforce the restriction. 
     * For further details see the PlayReady Compliance Rules.
     *
     * @param boolean $value BestEffort
     *
     * @return void
     */
    public function setBestEffort($value)
    {
        $this->_bestEffort = $value;
    }
    
    /**
     * Configures the Explicit Analog Television Output Restriction control bits. For further details see the PlayReady Compliance Rules.
     *
     * @return int ConfigurationData
     */
    public function getConfigurationData()
    {
        return $this->_configurationData;
    }

    /**
     * Configures the Explicit Analog Television Output Restriction control bits. For further details see the PlayReady Compliance Rules.
     *
     * @param int $value ConfigurationData
     *
     * @return void
     */
    public function setConfigurationData($value)
    {
        ScmsRestriction::verifyTwoBitConfigurationData($value);
        $this->_configurationData = $value;
    }    
}


