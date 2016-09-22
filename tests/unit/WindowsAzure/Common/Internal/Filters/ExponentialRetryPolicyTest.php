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

use WindowsAzure\Common\Internal\Filters\ExponentialRetryPolicy;

/**
 * Unit tests for class ExponentialRetryPolicy.
 *
 * @category  Microsoft
 *
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 *
 * @version   Release: 0.4.5_2016-09
 *
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
class ExponentialRetryPolicyTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers WindowsAzure\Common\Internal\Filters\ExponentialRetryPolicy::__construct
     */
    public function test__construct()
    {
        // Setup
        $expectedRetryableStatusCodes = array(200, 201);

        // Test
        $actual = new ExponentialRetryPolicy($expectedRetryableStatusCodes);

        // Assert
        $this->assertNotNull($actual);

        return $actual;
    }

    /**
     * @covers WindowsAzure\Common\Internal\Filters\ExponentialRetryPolicy::shouldRetry
     * @depends test__construct
     */
    public function testShouldRetryFalse($retryPolicy)
    {
        // Setup
        $expected = false;

        // Test
        $actual = $retryPolicy->shouldRetry(1000, null);

        // Assert
        $this->assertEquals($expected, $actual);
    }

    /**
     * @covers WindowsAzure\Common\Internal\Filters\ExponentialRetryPolicy::calculateBackoff
     * @depends test__construct
     */
    public function testCalculateBackoff($retryPolicy)
    {
        // Test
        $actual = $retryPolicy->calculateBackoff(2, null);

        // Assert
        $this->assertTrue(is_integer($actual));
    }
}
