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
 * @package   Tests\Unit\WindowsAzure\Queue\Models
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */

namespace Tests\Unit\WindowsAzure\ServiceBus\Models;
use WindowsAzure\ServiceBus\Models\ActiveToken;
use WindowsAzure\ServiceBus\Models\WrapAccessTokenResult;

/**
 * Unit tests for class ActiveToken
 *
 * @category  Microsoft
 * @package   Tests\Unit\WindowsAzure\Queue\Models
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
class ActiveTokenTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers WindowsAzure\ServiceBus\Models\ActiveToken::__construct
     */
    public function testActiveTokenConstructor()
    {
        // Setup
        $wrapAccessTokenResult = new WrapAccessTokenResult();
        
        // Test
        $activeToken = new ActiveToken($wrapAccessTokenResult);
        
        // Assert
        $this->assertNotNull($activeToken);
    }

    /**
     * @covers WindowsAzure\ServiceBus\Models\ActiveToken::getWrapAccessTokenResult
     * @covers WindowsAzure\ServiceBus\Models\ActiveToken::setWrapAccessTokenResult
     */
    public function testActiveTokenGetSetWrapAccessTokenResult()
    {
        // Setup
        $expected = new WrapAccessTokenResult();
        
        // Test
        $activeToken = new ActiveToken($expected);
        $activeToken->setWrapAccessTokenResult($expected);
        $actual = $activeToken->getWrapAccessTokenResult();
        
        // Assert
        $this->assertEquals(
            $expected,
            $actual
        );
    }

    /**
     * @covers WindowsAzure\ServiceBus\Models\ActiveToken::getExpirationDateTime
     * @covers WindowsAzure\ServiceBus\Models\ActiveToken::setExpirationDateTime
     */
    public function testActiveTokenGetSetExpirationDateTimeResult()
    {
        // Setup
        $expected = new \DateTime();
        $wrapAccessTokenResult = new WrapAccessTokenResult(); 
        
        // Test
        $activeToken = new ActiveToken($wrapAccessTokenResult);
        $activeToken->setExpirationDateTime($expected);
        $actual = $activeToken->getExpirationDateTime();
        
        // Assert
        $this->assertEquals(
            $expected,
            $actual
        );
    }
    
    
}

?>
