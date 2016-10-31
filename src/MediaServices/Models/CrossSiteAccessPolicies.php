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
 * Represents CrossSiteAccessPolicies ComplexType object used in media services.
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
class CrossSiteAccessPolicies
{
    /**
     * CrossSiteAccessPolicies ClientAccessPolicy.
     *
     * @var string
     */
    private $_clientAccessPolicy;

    /**
     * CrossSiteAccessPolicies CrossDomainPolicy.
     *
     * @var array
     */
    private $_crossDomainPolicy;

    /**
     * Create CrossSiteAccessPolicies from array.
     *
     * @param array $options Array containing values for object properties
     *
     * @return CrossSiteAccessPolicies
     */
    public static function createFromOptions($options)
    {
        $operation = new self();
        $operation->fromArray($options);

        return $operation;
    }

    /**
     * Create CrossSiteAccessPolicies.
     */
    public function __construct()
    {
    }

    /**
     * Fill CrossSiteAccessPolicies from array.
     *
     * @param array $options Array containing values for object properties
     */
    public function fromArray($options)
    {
        if (isset($options['ClientAccessPolicy'])) {
            Validate::isString($options['ClientAccessPolicy'], 'options[ClientAccessPolicy]');
            $this->_clientAccessPolicy = $options['ClientAccessPolicy'];
        }

        if (isset($options['CrossDomainPolicy'])) {
            Validate::isString($options['CrossDomainPolicy'], 'options[CrossDomainPolicy]');
            $this->_crossDomainPolicy = $options['CrossDomainPolicy'];
        }
    }

    /**
     * Get the CrossSiteAccessPolicies ClientAccessPolicy.
     *
     * @return string
     */
    public function getClientAccessPolicy()
    {
        return $this->_clientAccessPolicy;
    }

    /**
     * Set the CrossSiteAccessPolicies ClientAccessPolicy.
     *
     * @param string $value CrossSiteAccessPolicies ClientAccessPolicy
     */
    public function setClientAccessPolicy($value)
    {
        $this->_clientAccessPolicy = $value;
    }

    /**
     * Get the CrossSiteAccessPolicies CrossDomainPolicy.
     *
     * @return string
     */
    public function getCrossDomainPolicy()
    {
        return $this->_crossDomainPolicy;
    }

    /**
     * Set the CrossSiteAccessPolicies CrossDomainPolicy.
     *
     * @param string $value CrossSiteAccessPolicies CrossDomainPolicy
     */
    public function setCrossDomainPolicy($value)
    {
        $this->_crossDomainPolicy = $value;
    }
}
