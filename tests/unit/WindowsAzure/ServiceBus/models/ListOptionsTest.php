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

use WindowsAzure\ServiceBus\Models\ListOptions;


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
class ListOptionsTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers \WindowsAzure\ServiceBus\Models\ListOptions::__construct
     */
    public function testListOptionsConstructor()
    {
        // Setup

        // Test
        $listOptions = new ListOptions();

        // Assert
        $this->assertNotNull($listOptions);
    }

    /** 
     * @covers \WindowsAzure\ServiceBus\Models\ListOptions::getSkip
     * @covers \WindowsAzure\ServiceBus\Models\ListOptions::setSkip
     */
    public function testGetSetSkip()
    {
        // Setup
        $expected = 'testSkip';
        $listOptions = new ListOptions();

        // Test
        $listOptions->setSkip($expected);
        $actual = $listOptions->getSkip();

        // Assert 
        $this->assertEquals(
            $expected,
            $actual
        );
    }

    /** 
     * @covers \WindowsAzure\ServiceBus\Models\ListOptions::getTop
     * @covers \WindowsAzure\ServiceBus\Models\ListOptions::setTop
     */
    public function testGetSetTop()
    {
        // Setup
        $expected = 'testTop';
        $listOptions = new ListOptions();

        // Test
        $listOptions->setTop($expected);
        $actual = $listOptions->getTop();

        // Assert 
        $this->assertEquals(
            $expected,
            $actual
        );
    }
}
