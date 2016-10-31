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

namespace Tests\mock\WindowsAzure\Common\Internal\Authentication;

use WindowsAzure\Common\Internal\Authentication\OAuthScheme;
use WindowsAzure\Common\Internal\OAuthRestProxy;

/**
 * Mock class to wrap OAuthScheme class.
 *
 * @author     Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright  2012 Microsoft Corporation
 * @license    http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 *
 * @version   Release: 0.5.0_2016-11
 *
 * @link       https://github.com/windowsazure/azure-sdk-for-php
 */
class OAuthSchemeMock extends OAuthScheme
{
    public function __construct($accountName, $accountKey, $grantType, $scope, OAuthRestProxy $oauthService)
    {
        parent::__construct($accountName, $accountKey, $grantType, $scope, $oauthService);
    }

    public function getAccountName()
    {
        return $this->accountName;
    }

    public function getAccountKey()
    {
        return $this->accountKey;
    }

    public function getGrantType()
    {
        return $this->grantType;
    }

    public function getScope()
    {
        return $this->scope;
    }

    public function getOAuthService()
    {
        return $this->oauthService;
    }
}
