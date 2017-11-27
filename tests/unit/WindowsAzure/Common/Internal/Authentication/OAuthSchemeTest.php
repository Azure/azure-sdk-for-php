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

namespace Tests\unit\WindowsAzure\Common\Internal\Authentication;

use Tests\mock\WindowsAzure\Common\Internal\Authentication\OAuthSchemeMock;
use WindowsAzure\Common\Internal\Authentication\OAuthScheme;
use WindowsAzure\Common\Internal\Resources;
use Tests\framework\ServiceRestProxyTestBase;
use Tests\framework\TestResources;
use WindowsAzure\Common\Internal\Http\HttpClient;
use WindowsAzure\Common\Internal\MediaServicesSettings;
use WindowsAzure\Common\Internal\OAuthRestProxy;

/**
 * Unit tests for SharedKeyAuthScheme class.
 *
 * @author     Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright  2012 Microsoft Corporation
 * @license    http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 *
 * @version   Release: 0.5.0_2016-11
 *
 * @link       https://github.com/windowsazure/azure-sdk-for-php
 */
class OAuthSchemeTest extends ServiceRestProxyTestBase
{
    /**
     * @covers \WindowsAzure\Common\Internal\Authentication\OAuthScheme::__construct
     */
    public function test__construct()
    {
        // Setup
        $accountName = TestResources::ACCOUNT_NAME;
        $accountKey = TestResources::KEY1;
        $grantType = Resources::OAUTH_GT_CLIENT_CREDENTIALS;
        $scope = Resources::MEDIA_SERVICES_OAUTH_SCOPE;
        $oauthService = new OAuthRestProxy(new HttpClient(), '');

        // Test
        $actual = new OAuthSchemeMock($accountName, $accountKey, $grantType, $scope, $oauthService);

        // Assert
        $this->assertEquals($accountName, $actual->getAccountName());
        $this->assertEquals($accountKey, $actual->getAccountKey());
        $this->assertEquals($grantType, $actual->getGrantType());
        $this->assertEquals($scope, $actual->getScope());
        $this->assertEquals($oauthService, $actual->getOAuthService());
    }
}
