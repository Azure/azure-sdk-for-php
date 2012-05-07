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
 * @package   WindowsAzure\Services\ServiceBus
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
 
namespace WindowsAzure\Services\ServiceBus;
use WindowsAzure\Core\Configuration;
use WindowsAzure\Resources;
use WindowsAzure\Services\ServiceBus\WrapRestProxy;
use WindowsAzure\Services\ServiceBus\Models\ActiveToken;

/**
 * Manages WRAP tokens. 
 *
 * @category  Microsoft
 * @package   WindowsAzure\Services\ServiceBus
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */

class WrapTokenManager
{
    /** 
     * The Uri of the WRAP service.
     * 
     * @var string.
     */
    private $_wrapUri;

    /** 
     * The user name of the WRAP service.
     * 
     * @var string.
     */
    private $_wrapName;

    /** 
     * The password of the WRAP service.
     * 
     * @var string.
     */
    private $_wrapPassword;

    /** 
     * The proxy of the WRAP service.
     * 
     * @var string.
     */
    private $_wrapRestProxy;

    /** 
     * The active WRAP access tokens.
     * 
     * @var \array.
     */
    private static $_activeTokens;

    /**
     * Creates a WRAP token manager with specified parameters. 
     *
     * @param string $wrapUri      The URI of the WRAP service. 
     * @param string $wrapName     The user name of the WRAP service. 
     * @param string $wrapPassword The password of the WRAP service. 
     * 
     * @return WindowsAzure\Services\ServiceBus\WrapTokenManager
     */
    public function __construct($wrapUri, $wrapName, $wrapPassword) 
    {
        $this->_wrapUri = $wrapUri;
        $this->_wrapName = $wrapName;
        $this->_wrapPassword = $wrapPassword;
        
        $config = new configuration();
        $config->setProperty(
            ServiceBusSettings::WRAP_URI, 
            $this->_wrapUri);
            
        $config->setProperty(
            ServiceBusSettings::WRAP_NAME, 
            $this->_wrapName
        );
            
        $config->setProperty(
            ServiceBusSettings::WRAP_PASSWORD,
            $this->_wrapPassword
        );
           
        $this->_wrapRestProxy = WrapService::create($config);
        
        $this->_activeTokens = array();
        
    }    

    /** 
     * Gets WRAP access token with sepcified target Uri. 
     * 
     * @param string $targetUri The target Uri of the WRAP access Token. 
     * 
     * return string
     */
    public function getAccessToken($targetUri) 
    {
        $this->sweepExpiredTokens();
        $scopeUri = $this->createScopeUri($targetUri);
        
        if (array_key_exists($scopeUri, $this->_activeTokens))
        {
            $activeToken = $this->activeTokens[$scopeUri];
            return $activeToken->getWrapAccessTokenResult->getAccessToken();
        }
        
        $wrapAccessTokenResult = $this->_wrapRestProxy->wrapAccessToken(
            $this->_wrapUri, 
            $this->_wrapName,
            $this->_wrapPassword,
            $scopeUri
        );
        
        $expirationDateTime = new \DateTime("now");
        $expiresIn = intval($wrapAccessTokenResult->getExpiresIn() / 2); 
        $expirationDateTime = $expirationDateTime->add(
                new \DateInterval('PT'.$expiresIn.'S')
        );

        $acquiredActiveToken = new ActiveToken($wrapAccessTokenResult);
        $acquiredActiveToken->setExpirationDateTime($expirationDateTime); 
        
        return $wrapAccessTokenResult->getAccessToken(); 
    }
    
    private function sweepExpiredTokens()
    {
        foreach ($this->_activeTokens as $scopeUri => $activeToken) 
        {
            $currentDateTime = new DateTime("now");
            if ($activeToken->getExpirationDateTime() > $currentDateTime )
            {
                unset($this->_activeTokens[$scopeUri]);
            }
        }
    }

    private function createScopeUri($targetUri)
    {   
        $targetUriComponents = parse_url($targetUri);

        $scopeUri = '';
        $authority = '';
        if ($this->containsValidAuthority($targetUriComponents))
        {
            $authority = $this->createAuthority($targetUriComponents);
            
        }
    
        $scopeUri = 'http://'
            .$authority
            .$targetUriComponents[Resources::PHP_URL_HOST];
        
        if (array_key_exists(Resources::PHP_URL_PATH, $targetUriComponents))
        {
            $scopeUri .= $targetUriComponents[Resources::PHP_URL_PATH];
        }

        return $scopeUri;
    }

    private function containsValidAuthority($targetUriComponents)
    {
        if (! array_key_exists(Resources::PHP_URL_USER, $targetUriComponents))
        {
            return false;
        }

        if (empty($targetUriComponents[Resources::PHP_URL_USER]))
        {
            return false;
        }

        if (! array_key_exists(Resources::PHP_URL_PASS, $targetUriComponents))
        {
            return false;
        }

        if (empty($targetUriComponents[Resources::PHP_URL_PASS]))
        {
            return false;
        }

        return true;
    }

    private function createAuthority($targetUriComponents)
    {
        $authority = $targetUriComponents[Resources::PHP_URL_USER]
            .'@'
            .$targetUriComponents[Resources::PHP_URL_PASS]
            .'/'; 

        return $authority;
    }
}

?>
