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
 * @package   Tests\Unit\WindowsAzure\ServiceBus\Models
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      https://github.com/WindowsAzure/azure-sdk-for-php
 */

namespace Tests\Unit\WindowsAzure\ServiceBus\Models;
use WindowsAzure\ServiceBus\Models\RuleDescription;
use WindowsAzure\ServiceBus\Internal\WrapAccessTokenResult;

/**
 * Unit tests for class WrapAccessTokenResult
 *
 * @category  Microsoft
 * @package   Tests\Unit\WindowsAzure\ServiceBus\Models
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: 0.4.0_2014-01
 * @link      https://github.com/WindowsAzure/azure-sdk-for-php
 */
class RuleDescriptionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers WindowsAzure\ServiceBus\Models\RuleDescription::__construct
     */
    public function testRuleDescriptionConstructor()
    {
        // Setup
        
        // Test
        $ruleDescription = new RuleDescription();
        
        // Assert
        $this->assertNotNull($ruleDescription);
    }

    /** 
     * @covers WindowsAzure\ServiceBus\Models\RuleDescription::getFilter
     * @covers WindowsAzure\ServiceBus\Models\RuleDescription::setFilter
     */
    public function testGetSetFilter() {
        // Setup
        $expected = 'testFilter';
        $ruleDescription = new RuleDescription();

        // Test
        $ruleDescription->setFilter($expected);
        $actual = $ruleDescription->getFilter();

        // Assert 
        $this->assertEquals(
            $expected,
            $actual
        );

    }


    /** 
     * @covers WindowsAzure\ServiceBus\Models\RuleDescription::getAction
     * @covers WindowsAzure\ServiceBus\Models\RuleDescription::setAction
     */
    public function testGetSetAction() {
        // Setup
        $expected = 'testAction';
        $ruleDescription = new RuleDescription();

        // Test
        $ruleDescription->setAction($expected);
        $actual = $ruleDescription->getAction();

        // Assert 
        $this->assertEquals(
            $expected,
            $actual
        );

    }


    /** 
     * @covers WindowsAzure\ServiceBus\Models\RuleDescription::getName
     * @covers WindowsAzure\ServiceBus\Models\RuleDescription::setName
     */
    public function testGetSetName() {
        // Setup
        $expected = 'testName';
        $ruleDescription = new RuleDescription();

        // Test
        $ruleDescription->setName($expected);
        $actual = $ruleDescription->getName();

        // Assert 
        $this->assertEquals(
            $expected,
            $actual
        );

    }


}


