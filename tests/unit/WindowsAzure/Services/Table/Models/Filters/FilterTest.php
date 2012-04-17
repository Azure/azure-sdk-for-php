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
 * @package   Tests\Unit\WindowsAzure\Services\Table\Models\Filters
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */

namespace Tests\Unit\WindowsAzure\Services\Table\Models\Filters;
use WindowsAzure\Services\Table\Models\Filters\Filter;
use WindowsAzure\Services\Table\Models\EdmType;

/**
 * Unit tests for class Filter
 *
 * @category  Microsoft
 * @package   Tests\Unit\WindowsAzure\Services\Table\Models\Filters
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
class FilterTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers WindowsAzure\Services\Table\Models\Filters\Filter::applyAnd
     * @covers WindowsAzure\Services\Table\Models\Filters\Filter::applyLiteral
     * @covers WindowsAzure\Services\Table\Models\Filters\Filter::applyRawString
     */
    public function testApplyAnd()
    {
        // Setup
        $left = Filter::applyLiteral('test');
        $right = Filter::applyRawString('raw string');
        
        // Test
        $actual = Filter::applyAnd($left, $right);
        
        // Assert
        $this->assertEquals($left, $actual->getLeft());
        $this->assertEquals($right, $actual->getRight());
    }
    
    /**
     * @covers WindowsAzure\Services\Table\Models\Filters\Filter::applyNot
     * @covers WindowsAzure\Services\Table\Models\Filters\Filter::applyConstant
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
     * @covers WindowsAzure\Services\Table\Models\Filters\Filter::applyOr
     * @covers WindowsAzure\Services\Table\Models\Filters\Filter::applyLiteral
     * @covers WindowsAzure\Services\Table\Models\Filters\Filter::applyRawString
     */
    public function testApplyOr()
    {
        // Setup
        $left = Filter::applyLiteral('test');
        $right = Filter::applyRawString('raw string');
        
        // Test
        $actual = Filter::applyOr($left, $right);
        
        // Assert
        $this->assertEquals($left, $actual->getLeft());
        $this->assertEquals($right, $actual->getRight());
    }
    
    /**
     * @covers WindowsAzure\Services\Table\Models\Filters\Filter::applyEq
     * @covers WindowsAzure\Services\Table\Models\Filters\Filter::applyLiteral
     * @covers WindowsAzure\Services\Table\Models\Filters\Filter::applyRawString
     */
    public function testApplyEq()
    {
        // Setup
        $left = Filter::applyLiteral('test');
        $right = Filter::applyRawString('raw string');
        
        // Test
        $actual = Filter::applyEq($left, $right);
        
        // Assert
        $this->assertEquals($left, $actual->getLeft());
        $this->assertEquals($right, $actual->getRight());
    }
    
    /**
     * @covers WindowsAzure\Services\Table\Models\Filters\Filter::applyNe
     * @covers WindowsAzure\Services\Table\Models\Filters\Filter::applyLiteral
     * @covers WindowsAzure\Services\Table\Models\Filters\Filter::applyRawString
     */
    public function testApplyNe()
    {
        // Setup
        $left = Filter::applyLiteral('test');
        $right = Filter::applyRawString('raw string');
        
        // Test
        $actual = Filter::applyNe($left, $right);
        
        // Assert
        $this->assertEquals($left, $actual->getLeft());
        $this->assertEquals($right, $actual->getRight());
    }
    
    /**
     * @covers WindowsAzure\Services\Table\Models\Filters\Filter::applyGe
     * @covers WindowsAzure\Services\Table\Models\Filters\Filter::applyLiteral
     * @covers WindowsAzure\Services\Table\Models\Filters\Filter::applyRawString
     */
    public function testApplyGe()
    {
        // Setup
        $left = Filter::applyLiteral('test');
        $right = Filter::applyRawString('raw string');
        
        // Test
        $actual = Filter::applyGe($left, $right);
        
        // Assert
        $this->assertEquals($left, $actual->getLeft());
        $this->assertEquals($right, $actual->getRight());
    }
    
    /**
     * @covers WindowsAzure\Services\Table\Models\Filters\Filter::applyGt
     * @covers WindowsAzure\Services\Table\Models\Filters\Filter::applyLiteral
     * @covers WindowsAzure\Services\Table\Models\Filters\Filter::applyRawString
     */
    public function testApplyGt()
    {
        // Setup
        $left = Filter::applyLiteral('test');
        $right = Filter::applyRawString('raw string');
        
        // Test
        $actual = Filter::applyGt($left, $right);
        
        // Assert
        $this->assertEquals($left, $actual->getLeft());
        $this->assertEquals($right, $actual->getRight());
    }
    
    /**
     * @covers WindowsAzure\Services\Table\Models\Filters\Filter::applyLt
     * @covers WindowsAzure\Services\Table\Models\Filters\Filter::applyLiteral
     * @covers WindowsAzure\Services\Table\Models\Filters\Filter::applyRawString
     */
    public function testApplyLt()
    {
        // Setup
        $left = Filter::applyLiteral('test');
        $right = Filter::applyRawString('raw string');
        
        // Test
        $actual = Filter::applyLt($left, $right);
        
        // Assert
        $this->assertEquals($left, $actual->getLeft());
        $this->assertEquals($right, $actual->getRight());
    }
    
    /**
     * @covers WindowsAzure\Services\Table\Models\Filters\Filter::applyLe
     * @covers WindowsAzure\Services\Table\Models\Filters\Filter::applyLiteral
     * @covers WindowsAzure\Services\Table\Models\Filters\Filter::applyRawString
     */
    public function testApplyLe()
    {
        // Setup
        $left = Filter::applyLiteral('test');
        $right = Filter::applyRawString('raw string');
        
        // Test
        $actual = Filter::applyLe($left, $right);
        
        // Assert
        $this->assertEquals($left, $actual->getLeft());
        $this->assertEquals($right, $actual->getRight());
    }
}

?>
