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
 * @package   Tests\Unit\WindowsAzure\Common\Internal\Authentication
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */

namespace Tests\Unit\WindowsAzure\Common\Internal\Authentication;
use Tests\Mock\WindowsAzure\Common\Internal\Authentication\OAuthSchemeMock;
use WindowsAzure\Common\Internal\Authentication\OAuthScheme;
use WindowsAzure\Common\Internal\Resources;
use Tests\Framework\TestResources;
use WindowsAzure\Common\Internal\Http\HttpClient;
use WindowsAzure\Common\Internal\MediaServicesSettings;
use WindowsAzure\Common\Internal\OAuthRestProxy;

/**
 * Unit tests for SharedKeyAuthScheme class.
 *
 * @package    Tests\Unit\WindowsAzure\Common\Internal\Authentication
 * @author     Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright  2012 Microsoft Corporation
 * @license    http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version    Release: @package_version@
 * @link       https://github.com/windowsazure/azure-sdk-for-php
 */
class OAuthSchemeTest extends \PHPUnit_Framework_TestCase
{
    /**
    * @covers WindowsAzure\Common\Internal\Authentication\OAuthScheme::__construct
    */
    public function test__construct()
    {
        // Setup
        $accountName = TestResources::ACCOUNT_NAME;
        $accountKey = TestResources::KEY1;
        $grantType = Resources::OAUTH_GT_CLIENT_CREDENTIALS;
        $scope = Resources::MEDIA_SERVICES_OAUTH_SCOPE;
        $oauthService = new \stdClass;

        // Test
        $actual = new OAuthSchemeMock($accountName, $accountKey, $grantType, $scope, $oauthService);

        // Assert
        $this->assertEquals($accountName, $actual->getAccountName());
        $this->assertEquals($accountKey, $actual->getAccountKey());
        $this->assertEquals($grantType, $actual->getGrantType());
        $this->assertEquals($scope, $actual->getScope());
        $this->assertEquals($oauthService, $actual->getOAuthService());

    }

    /**
     * @covers WindowsAzure\Common\Internal\Authentication\OAuthScheme::getAuthorizationHeader
     */
    public function testGetAuthorizationHeader()
    {
        // Setup
        // OAuth REST setup
        $channel            = new HttpClient();
        $uri                = Resources::MEDIA_SERVICES_OAUTH_URL;
        $connection         = TestResources::getMediaServicesConnectionParameters();
        $settings           = new MediaServicesSettings($connection['accountName'], $connection['accessKey']);
        $scope              = Resources::MEDIA_SERVICES_OAUTH_SCOPE;
        $grantType          = Resources::OAUTH_GT_CLIENT_CREDENTIALS;
        $rest               = new OAuthRestProxy($channel, $uri);

        // Scheme setup
        $headers        = array();
        $url            = Resources::MEDIA_SERVICES_URL;
        $queryParams    = array();
        $httpMethod     = Resources::HTTP_GET;

        // Test
        $scheme = new OAuthScheme($settings->getAccountName(), $settings->getAccessKey(), $grantType, $scope, $rest);
        $actual = $scheme->getAuthorizationHeader($headers, $url, $queryParams, $httpMethod);

        // Assert
        $this->assertNotNull($actual);
        $this->assertStringStartsWith(Resources::OAUTH_ACCESS_TOKEN_PREFIX, $actual);
    }

    /**
     * @covers WindowsAzure\Common\Internal\Authentication\OAuthScheme::getAuthorizationHeader
     */
    public function testGetAuthorizationHeaderMultiple()
    {
        // Setup
        // OAuth REST setup
        $channel            = new HttpClient();
        $uri                = Resources::MEDIA_SERVICES_OAUTH_URL;
        $connection         = TestResources::getMediaServicesConnectionParameters();
        $settings           = new MediaServicesSettings($connection['accountName'], $connection['accessKey']);
        $scope              = Resources::MEDIA_SERVICES_OAUTH_SCOPE;
        $grantType          = Resources::OAUTH_GT_CLIENT_CREDENTIALS;
        $rest               = new OAuthRestProxy($channel, $uri);

        // Scheme setup
        $headers        = array();
        $url            = Resources::MEDIA_SERVICES_URL;
        $queryParams    = array();
        $httpMethod     = Resources::HTTP_GET;

        // Get access token
        $scheme = new OAuthScheme($settings->getAccountName(), $settings->getAccessKey(), $grantType, $scope, $rest);
        $token  = $scheme->getAuthorizationHeader($headers, $url, $queryParams, $httpMethod);

        // Test
        $actual = $scheme->getAuthorizationHeader($headers, $url, $queryParams, $httpMethod);

        // Assert
        $this->assertEquals($token, $actual);
    }
}

