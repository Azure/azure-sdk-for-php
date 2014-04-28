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
 * @package   Tests\Unit\WindowsAzure\Table\Models\Filters
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */

namespace Tests\Unit\WindowsAzure\Table\Models\Filters;
use WindowsAzure\Table\Models\Filters\Filter;
use WindowsAzure\Table\Models\EdmType;

/**
 * Unit tests for class Filter
 *
 * @category  Microsoft
 * @package   Tests\Unit\WindowsAzure\Table\Models\Filters
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: 0.4.0_2014-01
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
class FilterTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers WindowsAzure\Table\Models\Filters\Filter::applyAnd
     * @covers WindowsAzure\Table\Models\Filters\Filter::applyPropertyName
     * @covers WindowsAzure\Table\Models\Filters\Filter::applyQueryString
     */
    public function testApplyAnd()
    {
        // Setup
        $left = Filter::applyPropertyName('test');
        $right = Filter::applyQueryString('raw string');
        
        // Test
        $actual = Filter::applyAnd($left, $right);
        
        // Assert
        $this->assertEquals($left, $actual->getLeft());
        $this->assertEquals($right, $actual->getRight());
    }
    
    /**
     * @covers WindowsAzure\Table\Models\Filters\Filter::applyNot
     * @covers WindowsAzure\Table\Models\Filters\Filter::applyConstant
     */
    public function testApplyNot()
    {
        // Setup
        $operand = Filter::applyConstant('test', EdmType::STRING);
        
        // Test
        $actual = Filter::applyNot($operand);
        
        // Assert
        $this->assertEquals($operand, $actual->getOperand());
    }
    
    /**
     * @covers WindowsAzure\Table\Models\Filters\Filter::applyOr
     * @covers WindowsAzure\Table\Models\Filters\Filter::applyPropertyName
     * @covers WindowsAzure\Table\Models\Filters\Filter::applyQueryString
     */
    public function testApplyOr()
    {
        // Setup
        $left = Filter::applyPropertyName('test');
        $right = Filter::applyQueryString('raw string');
        
        // Test
        $actual = Filter::applyOr($left, $right);
        
        // Assert
        $this->assertEquals($left, $actual->getLeft());
        $this->assertEquals($right, $actual->getRight());
    }
    
    /**
     * @covers WindowsAzure\Table\Models\Filters\Filter::applyEq
     * @covers WindowsAzure\Table\Models\Filters\Filter::applyPropertyName
     * @covers WindowsAzure\Table\Models\Filters\Filter::applyQueryString
     */
    public function testApplyEq()
    {
        // Setup
        $left = Filter::applyPropertyName('test');
        $right = Filter::applyQueryString('raw string');
        
        // Test
        $actual = Filter::applyEq($left, $right);
        
        // Assert
        $this->assertEquals($left, $actual->getLeft());
        $this->assertEquals($right, $actual->getRight());
    }
    
    /**
     * @covers WindowsAzure\Table\Models\Filters\Filter::applyNe
     * @covers WindowsAzure\Table\Models\Filters\Filter::applyPropertyName
     * @covers WindowsAzure\Table\Models\Filters\Filter::applyQueryString
     */
    public function testApplyNe()
    {
        // Setup
        $left = Filter::applyPropertyName('test');
        $right = Filter::applyQueryString('raw string');
        
        // Test
        $actual = Filter::applyNe($left, $right);
        
        // Assert
        $this->assertEquals($left, $actual->getLeft());
        $this->assertEquals($right, $actual->getRight());
    }
    
    /**
     * @covers WindowsAzure\Table\Models\Filters\Filter::applyGe
     * @covers WindowsAzure\Table\Models\Filters\Filter::applyPropertyName
     * @covers WindowsAzure\Table\Models\Filters\Filter::applyQueryString
     */
    public function testApplyGe()
    {
        // Setup
        $left = Filter::applyPropertyName('test');
        $right = Filter::applyQueryString('raw string');
        
        // Test
        $actual = Filter::applyGe($left, $right);
        
        // Assert
        $this->assertEquals($left, $actual->getLeft());
        $this->assertEquals($right, $actual->getRight());
    }
    
    /**
     * @covers WindowsAzure\Table\Models\Filters\Filter::applyGt
     * @covers WindowsAzure\Table\Models\Filters\Filter::applyPropertyName
     * @covers WindowsAzure\Table\Models\Filters\Filter::applyQueryString
     */
    public function testApplyGt()
    {
        // Setup
        $left = Filter::applyPropertyName('test');
        $right = Filter::applyQueryString('raw string');
        
        // Test
        $actual = Filter::applyGt($left, $right);
        
        // Assert
        $this->assertEquals($left, $actual->getLeft());
        $this->assertEquals($right, $actual->getRight());
    }
    
    /**
     * @covers WindowsAzure\Table\Models\Filters\Filter::applyLt
     * @covers WindowsAzure\Table\Models\Filters\Filter::applyPropertyName
     * @covers WindowsAzure\Table\Models\Filters\Filter::applyQueryString
     */
    public function testApplyLt()
    {
        // Setup
        $left = Filter::applyPropertyName('test');
        $right = Filter::applyQueryString('raw string');
        
        // Test
        $actual = Filter::applyLt($left, $right);
        
        // Assert
        $this->assertEquals($left, $actual->getLeft());
        $this->assertEquals($right, $actual->getRight());
    }
    
    /**
     * @covers WindowsAzure\Table\Models\Filters\Filter::applyLe
     * @covers WindowsAzure\Table\Models\Filters\Filter::applyPropertyName
     * @covers WindowsAzure\Table\Models\Filters\Filter::applyQueryString
     */
    public function testApplyLe()
    {
        // Setup
        $left = Filter::applyPropertyName('test');
        $right = Filter::applyQueryString('raw string');
        
        // Test
        $actual = Filter::applyLe($left, $right);
        
        // Assert
        $this->assertEquals($left, $actual->getLeft());
        $this->assertEquals($right, $actual->getRight());
    }
}


