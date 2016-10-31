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

namespace Tests\unit\WindowsAzure\Common\Models;

use WindowsAzure\Common\Models\OAuthAccessToken;
use WindowsAzure\Common\Internal\Resources;
use Tests\Framework\TestResources;

/**
 * Unit tests for class OAuthAccessToken.
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
class OAuthAccessTokenTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers \WindowsAzure\Common\Models\OAuthAccessToken::create
     */
    public function testCreate()
    {
        // Setup
        $sample = TestResources::getTestOAuthAccessToken();
        $currentTime = time();

        // Test
        $actual = OAuthAccessToken::create($sample);

        // Assert
        $this->assertEquals($sample[Resources::OAUTH_ACCESS_TOKEN], $actual->getAccessToken());
        $this->assertEquals($sample[Resources::OAUTH_EXPIRES_IN], $actual->getExpiresIn() - $currentTime);
        $this->assertEquals($sample[Resources::OAUTH_SCOPE], $actual->getScope());
    }

    /**
     * @covers \WindowsAzure\Common\Models\OAuthAccessToken::getAccessToken
     * @covers \WindowsAzure\Common\Models\OAuthAccessToken::setAccessToken
     */
    public function testGetSetAccessToken()
    {
        // Setup
        $sample = TestResources::getTestOAuthAccessToken();

        // Test
        $actual = new OAuthAccessToken();
        $actual->setAccessToken($sample[Resources::OAUTH_ACCESS_TOKEN]);

        // Assert
        $this->assertEquals($sample[Resources::OAUTH_ACCESS_TOKEN], $actual->getAccessToken());
    }

    /**
     * @covers \WindowsAzure\Common\Models\OAuthAccessToken::getExpiresIn
     * @covers \WindowsAzure\Common\Models\OAuthAccessToken::setExpiresIn
     */
    public function testGetSetExpiresIn()
    {
        // Setup
        $sample = TestResources::getTestOAuthAccessToken();

        // Test
        $actual = new OAuthAccessToken();
        $actual->setExpiresIn($sample[Resources::OAUTH_EXPIRES_IN]);

        // Assert
        $this->assertEquals($sample[Resources::OAUTH_EXPIRES_IN], $actual->getExpiresIn());
    }

    /**
     * @covers \WindowsAzure\Common\Models\OAuthAccessToken::getScope
     * @covers \WindowsAzure\Common\Models\OAuthAccessToken::setScope
     */
    public function testGetSetScope()
    {
        // Setup
        $sample = TestResources::getTestOAuthAccessToken();

        // Test
        $actual = new OAuthAccessToken();
        $actual->setScope($sample[Resources::OAUTH_SCOPE]);

        // Assert
        $this->assertEquals($sample[Resources::OAUTH_SCOPE], $actual->getScope());
    }
}
