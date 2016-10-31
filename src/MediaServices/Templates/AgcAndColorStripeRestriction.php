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

namespace WindowsAzure\MediaServices\Templates;

/**
 * Represents AgcAndColorStripeRestriction object used in media services.
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
class AgcAndColorStripeRestriction
{
    /**
     * AgcAndColorStripeRestriction ConfigurationData.
     *
     * @var int
     */
    private $_configurationData;

    /**
     * Create AgcAndColorStripeRestriction.
     *
     * @param int $configurationData
     */
    public function __construct($configurationData)
    {
        $this->setConfigurationData($configurationData);
    }

    /**
     * Configures the Automatic Gain Control (AGC) and Color Stripe control bits. For further details see the PlayReady
     * Compliance Rules.
     *
     * @return int ConfigurationData
     */
    public function getConfigurationData()
    {
        return $this->_configurationData;
    }

    /**
     * Configures the Automatic Gain Control (AGC) and Color Stripe control bits. For further details see the PlayReady
     * Compliance Rules.
     *
     * @param int $value ConfigurationData
     */
    public function setConfigurationData($value)
    {
        ScmsRestriction::verifyTwoBitConfigurationData($value);
        $this->_configurationData = $value;
    }
}
