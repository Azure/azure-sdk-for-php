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
 * Represents TokenRestrictionTemplate object used in media services
 *
 * @category  Microsoft
 * @package   WindowsAzure\MediaServices\Models
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: 0.4.2_2016-04
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
class TokenRestrictionTemplate
{
    /**
     * TokenRestrictionTemplate AlternateVerificationKeys
     *
     * @var TokenVerificationKey[]
     */
    private $_alternateVerificationKeys;

    /**
     * TokenRestrictionTemplate Audience
     *
     * @var string
     */
    private $_audience;

    /**
     * TokenRestrictionTemplate Issuer
     *
     * @var string
     */
    private $_issuer;

    /**
     * TokenRestrictionTemplate PrimaryVerificationKey
     * 
     * @var TokenVerificationKey
     */
    private $_primaryVerificationKey;

    /**
     * TokenRestrictionTemplate RequiredClaims
     * 
     * @var TokenClaim[]
     */
    private $_requiredClaims;

    /**
     * TokenRestrictionTemplate TokenType
     *
     * @var string 
     */
    private $_tokenType;


    /** TokenRestrictionTemplate OpenIdConnectDiscoveryDocument
     *
     * @var OpenIdConnectDiscoveryDocument
     */
    private $_openIdConnectDiscoveryDocument;

    /**
     * Create TokenRestrictionTemplate
     *
     * @return void
     */
    public function __construct($type = null)
    {
        $this->_tokenType = $type;
    }

    /**
     * Get "TokenRestrictionTemplate AlternateVerificationKeys"
     *
     * @return TokenVerificationKey[] Array of TokenVerificationKey
     */
    public function getAlternateVerificationKeys()
    {
        return $this->_alternateVerificationKeys;
    }

    /**
     * Set "TokenRestrictionTemplate AlternateVerificationKeys"
     *
     * @param TokenVerificationKey[] $value Array of TokenVerificationKey
     *
     * @return void
     */
    public function setAlternateVerificationKeys($value)
    {
        $this->_alternateVerificationKeys = $value;
    }  

    /**
     * Get "TokenRestrictionTemplate Audience"
     *
     * @return string Audience
     */
    public function getAudience()
    {
        return $this->_audience;
    }

    /**
     * Set "TokenRestrictionTemplate Audience"
     *
     * @param string $value Audience
     *
     * @return void
     */
    public function setAudience($value)
    {
        $this->_audience = $value;
    }  
    
    /**
     * Get "TokenRestrictionTemplate Issuer"
     *
     * @return string Issuer
     */
    public function getIssuer()
    {
        return $this->_issuer;
    }

    /**
     * Set "TokenRestrictionTemplate Issuer"
     *
     * @param string $value Issuer
     *
     * @return void
     */
    public function setIssuer($value)
    {
        $this->_issuer = $value;
    }

    /**
     * Get "TokenRestrictionTemplate PrimaryVerificationKey"
     *
     * @return TokenVerificationKey PrimaryVerificationKey
     */
    public function getPrimaryVerificationKey()
    {
        return $this->_primaryVerificationKey;
    }

    /**
     * Set "TokenRestrictionTemplate PrimaryVerificationKey"
     *
     * @param TokenVerificationKey $value PrimaryVerificationKey
     *
     * @return void
     */
    public function setPrimaryVerificationKey($value)
    {
        $this->_primaryVerificationKey = $value;
    }

    /**
     * Get "TokenRestrictionTemplate RequiredClaims"
     *
     * @return TokenClaim[] Array of TokenClaim
     */
    public function getRequiredClaims()
    {
        return $this->_requiredClaims;
    }

    /**
     * Set "TokenRestrictionTemplate RequiredClaims"
     *
     * @param TokenClaim[] $value Array of TokenClaim
     *
     * @return void
     */
    public function setRequiredClaims($value)
    {
        $this->_requiredClaims = $value;
    }    

    /**
     * Get "TokenRestrictionTemplate TokenType"
     *
     * @return string TokenType
     */
    public function getTokenType()
    {
        return $this->_tokenType;
    }

    /**
     * Set "TokenRestrictionTemplate TokenType"
     *
     * @param string $value TokenType
     *
     * @return void
     */
    public function setTokenType($value)
    {
        $this->_tokenType = $value;
    }

    /**
     * Get "TokenRestrictionTemplate OpenIdConnectDiscoveryDocument"
     *
     * @return OpenIdConnectDiscoveryDocument TokenType
     */
    public function getOpenIdConnectDiscoveryDocument()
    {
        return $this->_openIdConnectDiscoveryDocument;
    }

    /**
     * Set "TokenRestrictionTemplate OpenIdConnectDiscoveryDocument"
     *
     * @param OpenIdConnectDiscoveryDocument $value OpenIdConnectDiscoveryDocument
     *
     * @return void
     */
    public function setOpenIdConnectDiscoveryDocument($value)
    {
        $this->_openIdConnectDiscoveryDocument = $value;
    } 
}


