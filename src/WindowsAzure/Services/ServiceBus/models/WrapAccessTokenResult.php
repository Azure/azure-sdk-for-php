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
 * @package   WindowsAzure\Services\Queue\Models
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
 
namespace WindowsAzure\Services\ServiceBus\Models;
use WindowsAzure\Resources;
use WindowsAzure\Services\ServiceBus\Models;
use WindowsAzure\Utilities;

/**
 * Container to hold wrap accesss token response object.
 *
 * @category  Microsoft
 * @package   WindowsAzure\Services\ServiceBus\Models
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
class WrapAccessTokenResult
{
    /**
     * @var string
     */
    private $_accessToken;

    /**
     * @var integer
     */
    private $_expiresIn;

    /**
     * Creates WrapAccesTokenResult object from parsed XML response.
     *
     * @param array $parsedResponse XML response parsed into array.
     * 
     * @return WindowsAzure\Services\ServiceBus\Models\WrapAccessTokenResult.
     */
    public static function create($parsedResponse)
    {
        $wrapAccessTokenResult               = new WrapAccessTokenResult();
        $wrapAccessTokenResult->_accessToken = Utilities::tryGetValue(
            $parsedResponse, Resources::WRAP_ACCESS_TOKEN
        );
        $wrapAccessTokenResult->_expiresIn   = Utilities::tryGetValue(
            $parsedResponse, Resources::WRAP_ACCESS_TOKEN_EXPIRES_IN
        );
        
        return $wrapAccessTokenResult;
    }

    /**
     * Gets access token.
     *
     * @return string.
     */
    public function getAccessToken()
    {
        return $this->_accessToken;
    }
    
    /**
     * Sets access token.
     *
     * @param string $accessToken The access token.
     * 
     * @return none.
     */
    public function setAccessToken($accessToken)
    {
        $this->_accessToken = $accessToken;
    }

    /**
     * Gets expires in.
     *
     * @return integer.
     */
    public function getExpiresIn()
    {
        return $this->_expiresIn;
    }

    /**
     * Sets expires in.
     *
     * @param integer $expiresIn value.
     * 
     * @return none.
     */
    public function setExpiresIn($expiresIn)
    {
        $this->_expiresIn = $expiresIn;
    }
}

