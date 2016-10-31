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
 * @link      https://github.com/WindowsAzure/azure-sdk-for-php
 */

namespace Tests\unit\WindowsAzure\ServiceBus\models;

use WindowsAzure\ServiceBus\Internal\WrapAccessTokenResult;

/**
 * Unit tests for class WrapAccessTokenResult.
 *
 * @category  Microsoft
 *
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 *
 * @version   Release: 0.5.0_2016-11
 *
 * @link      https://github.com/WindowsAzure/azure-sdk-for-php
 */
class WrapAccessTokenResultTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers \WindowsAzure\ServiceBus\Internal\WrapAccessTokenResult::create
     */
    public function testCreateWrapAccessTokenSuccess()
    {
        // Setup
        $expectedWrapAccessToken = 'WRAP_ACCESS_TOKEN';
        $expectedWrapAccessTokenExpiresIn = 300;

        $queryParameter = [
            'wrap_access_token' => 'WRAP_ACCESS_TOKEN',
            'wrap_access_token_expires_in' => 300,
        ];

        $queryString = http_build_query($queryParameter);

        // Test
        $wrapAccessTokenResult = WrapAccessTokenResult::create($queryString);
        $actualWrapAccessToken = $wrapAccessTokenResult->getAccessToken();
        $actualWrapAccessTokenExpiresIn = $wrapAccessTokenResult->getExpiresIn();

        // Assert
        $this->assertEquals(
            $expectedWrapAccessToken,
            $actualWrapAccessToken
        );

        $this->assertEquals(
            $expectedWrapAccessTokenExpiresIn,
            $actualWrapAccessTokenExpiresIn
        );
    }

    /**
     * @covers \WindowsAzure\ServiceBus\Internal\WrapAccessTokenResult::getAccessToken
     * @covers \WindowsAzure\ServiceBus\Internal\WrapAccessTokenResult::setAccessToken
     */
    public function testGetAccessToken()
    {
        // Setup
        $wrapAccessTokenResult = new WrapAccessTokenResult();
        $expected = 'abcde';
        $wrapAccessTokenResult->setAccessToken($expected);

        // Test
        $actual = $wrapAccessTokenResult->getAccessToken();

        // Assert
        $this->assertEquals($expected, $actual);
    }

    /**
     * @covers \WindowsAzure\ServiceBus\Internal\WrapAccessTokenResult::getExpiresIn
     * @covers \WindowsAzure\ServiceBus\Internal\WrapAccessTokenResult::setExpiresIn
     */
    public function testGetExpiresIn()
    {
        // Setup 
        $wrapAccessTokenResult = new WrapAccessTokenResult();
        $expected = 1000;

        // Test 
        $wrapAccessTokenResult->setExpiresIn($expected);

        // Assert
        $actual = $wrapAccessTokenResult->getExpiresIn();
        $this->assertEquals($expected, $actual);
    }
}
