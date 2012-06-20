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
 * @package   Tests\Unit\WindowsAzure\ServiceBus\Models\
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      https://github.com/WindowsAzure/azure-sdk-for-php
 */

namespace Tests\Unit\WindowsAzure\ServiceBus\Models\Models;
use WindowsAzure\ServiceBus\Models\GetSubscriptionResult;

/**
 * Unit tests for class WrapAccessTokenResult
 *
 * @category  Microsoft
 * @package   Tests\Unit\WindowsAzure\ServiceBus\Models\
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      https://github.com/WindowsAzure/azure-sdk-for-php
 */
class GetSubscriptionResultTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers WindowsAzure\ServiceBus\Models\GetSubscriptionResult::__construct
     */
    public function testGetSubscriptionResultConstructor()
    {
        // Setup
        
        // Test
        $getSubscriptionResult = new GetSubscriptionResult();
        
        // Assert
        $this->assertNotNull($getSubscriptionResult);
    }

    /** 
     * @covers WindowsAzure\ServiceBus\Models\GetSubscriptionResult::getSubscriptionInfo
     * @covers WindowsAzure\ServiceBus\Models\GetSubscriptionResult::setSubscriptionInfo
     */
    public function testGetSetSubscriptionInfo() {
        // Setup
        $expected = 'testSubscriptionInfo';
        $getSubscriptionResult = new GetSubscriptionResult();

        // Test
        $getSubscriptionResult->setSubscriptionInfo($expected);
        $actual = $getSubscriptionResult->getSubscriptionInfo();

        // Assert 
        $this->assertEquals(
            $expected,
            $actual
        );

    }

}

?>
