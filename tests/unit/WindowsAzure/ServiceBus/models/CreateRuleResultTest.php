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
 * @package   Tests\Unit\WindowsAzure\Services\Rule\Models
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */

namespace Tests\Unit\WindowsAzure\ServiceBus\Models;
use WindowsAzure\ServiceBus\Models\CreateRuleResult;
use WindowsAzure\ServiceBus\Models\RuleDescription;

/**
 * Unit tests for class WrapAccessTokenResult
 *
 * @category  Microsoft
 * @package   Tests\Unit\WindowsAzure\Services\Rule\Models
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
class CreateRuleResultTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers WindowsAzure\ServiceBus\Models\CreateRuleResult::__construct
     */
    public function testCreateRuleResult()
    {
        // Setup
        
        // Test
        $createRuleResult = new CreateRuleResult();
        
        // Assert
        $this->assertNotNull($createRuleResult);
    }

    /**
     * @covers WindowsAzure\ServiceBus\Models\CreateRuleResult::getRuleDescription
     * @covers WindowsAzure\ServiceBus\Models\CreateRuleResult::setRuleDescription
     */
    public function testCreateRuleResultGetSetRuleDescription()
    {
        // Setup
        $createRuleResult = new CreateRuleResult();
        $expected = new RuleDescription();
        
        // Test
        $createRuleResult->setRuleDescription($expected);
        $actual = $createRuleResult->getRuleDescription();
        
        // Assert
        $this->assertEquals(
            $expected,
            $actual
        );
    }
    
}

?>
