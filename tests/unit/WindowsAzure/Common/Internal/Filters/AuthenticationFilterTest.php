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
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 *
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */

namespace Tests\unit\WindowsAzure\Common\Internal\Filters;

use WindowsAzure\Common\Internal\Filters\AuthenticationFilter;
use WindowsAzure\Common\Internal\Http\HttpClient;
use WindowsAzure\Common\Internal\Http\Url;
use WindowsAzure\Common\Internal\Resources;
use WindowsAzure\Common\Internal\Authentication\SharedKeyAuthScheme;
use WindowsAzure\MediaServices\Authentication\AccessToken;

/**
 * Unit tests for class AuthenticationFilterTest.
 *
 * @category  Microsoft
 *
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 *
 * @version   Release: 0.5.0_2016-11
 *
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
class AuthenticationFilterTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers \WindowsAzure\Common\Internal\Filters\AuthenticationFilter::handleRequest
     * @covers \WindowsAzure\Common\Internal\Filters\AuthenticationFilter::__construct
     */
    public function testHandleRequest()
    {
        // Setup
        $channel = new HttpClient();
        $token = 'testToken';
        $expiration = new \DateTime('now');
        $accessToken = new AccessToken($token, $expiration);
        $tokenProvider = $this->getMock('\WindowsAzure\MediaServices\Authentication\ITokenProvider');
        $tokenProvider->expects($this->any())->method('getAccessToken')->will($this->returnValue($accessToken));
        $filter = new AuthenticationFilter($tokenProvider);

        // Test
        $request = $filter->handleRequest($channel);

        // Assert
        $this->assertArrayHasKey(strtolower(Resources::AUTHENTICATION), $request->getHeaders());
    }
}
