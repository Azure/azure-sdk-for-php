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

use WindowsAzure\Common\Internal\Validate;

/**
 * Represents TokenClaim object used in media services.
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
class TokenClaim
{
    const CONTENT_KEY_ID_CLAIM_TYPE = 'urn:microsoft:azure:mediaservices:contentkeyidentifier';

    /**
     * TokenClaim claimType.
     *
     * @var string
     */
    private $_claimType;

    /**
     * TokenClaim claimValue.
     *
     * @var string
     */
    private $_claimValue;

    /**
     * Create TokenClaim.
     *
     * @param $type
     * @param null $value
     */
    public function __construct($type, $value = null)
    {
        Validate::notNull($type, 'type');
        $this->_claimType = $type;
        $this->_claimValue = $value;
    }

    /**
     * Get "TokenClaim ClaimType".
     *
     * @return string
     */
    public function getClaimType()
    {
        return $this->_claimType;
    }

    /**
     * Set "TokenClaim ClaimType".
     *
     * @param string $value ClaimType
     */
    public function setClaimType($value)
    {
        $this->_claimType = $value;
    }

    /**
     * Get "TokenClaim ClaimValue".
     *
     * @return string
     */
    public function getClaimValue()
    {
        return $this->_claimValue;
    }

    /**
     * Set "TokenClaim ClaimValue".
     *
     * @param string $value ClaimValue
     */
    public function setClaimValue($value)
    {
        $this->_claimValue = $value;
    }
}
