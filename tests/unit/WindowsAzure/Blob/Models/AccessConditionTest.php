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
 * @package   Tests\Unit\WindowsAzure\Blob\Models
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
namespace Tests\Unit\WindowsAzure\Blob\Models;
use WindowsAzure\Blob\Models\AccessCondition;
use WindowsAzure\Common\Internal\Resources;
use WindowsAzure\Common\Internal\Utilities;

/**
 * Unit tests for class AccessCondition
 *
 * @category  Microsoft
 * @package   Tests\Unit\WindowsAzure\Blob\Models
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: 0.4.0_2014-01
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
class AccessConditionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers WindowsAzure\Blob\Models\AccessCondition::__construct
     * @covers WindowsAzure\Blob\Models\AccessCondition::getHeader
     * @covers WindowsAzure\Blob\Models\AccessCondition::getValue
     * @covers WindowsAzure\Blob\Models\AccessCondition::setHeader
     * @covers WindowsAzure\Blob\Models\AccessCondition::setValue
     */
    public function test__construct()
    {
        // Setup
        $expectedHeaderType = Resources::IF_MATCH;
        $expectedValue = '0x8CAFB82EFF70C46';
        
        // Test
        $actual = AccessCondition::ifMatch($expectedValue);
        
        // Assert
        $this->assertEquals($expectedHeaderType, $actual->getHeader());
        $this->assertEquals($expectedValue, $actual->getValue());
    }
    
    /**
     * @covers WindowsAzure\Blob\Models\AccessCondition::none
     * @covers WindowsAzure\Blob\Models\AccessCondition::getHeader
     * @covers WindowsAzure\Blob\Models\AccessCondition::getValue
     */
    public function testNone()
    {
        // Setup
        $expectedHeader = Resources::EMPTY_STRING;
        $expectedValue = null;
        
        // Test
        $actual = AccessCondition::none();
        
        // Assert
        $this->assertEquals($expectedHeader, $actual->getHeader());
        $this->assertEquals($expectedValue, $actual->getValue());
    }
    
    /**
     * @covers WindowsAzure\Blob\Models\AccessCondition::ifModifiedSince
     * @covers WindowsAzure\Blob\Models\AccessCondition::getHeader
     * @covers WindowsAzure\Blob\Models\AccessCondition::getValue
     */
    public function testIfModifiedSince()
    {
        // Setup
        $expectedHeader = Resources::IF_MODIFIED_SINCE;
        $expectedValue = new \DateTime('Sun, 25 Sep 2011 00:42:49 GMT');
        
        // Test
        $actual = AccessCondition::ifModifiedSince($expectedValue);
        
        // Assert
        $this->assertEquals($expectedHeader, $actual->getHeader());
        $this->assertEquals($expectedValue, $actual->getValue());
    }
    
    /**
     * @covers WindowsAzure\Blob\Models\AccessCondition::ifMatch
     * @covers WindowsAzure\Blob\Models\AccessCondition::getHeader
     * @covers WindowsAzure\Blob\Models\AccessCondition::getValue
     */
    public function testIfMatch()
    {
        // Setup
        $expectedHeader = Resources::IF_MATCH;
        $expectedValue = '0x8CAFB82EFF70C46';
        
        // Test
        $actual = AccessCondition::ifMatch($expectedValue);
        
        // Assert
        $this->assertEquals($expectedHeader, $actual->getHeader());
        $this->assertEquals($expectedValue, $actual->getValue());
    }
    
    /**
     * @covers WindowsAzure\Blob\Models\AccessCondition::ifNoneMatch
     * @covers WindowsAzure\Blob\Models\AccessCondition::getHeader
     * @covers WindowsAzure\Blob\Models\AccessCondition::getValue
     */
    public function testIfNoneMatch()
    {
        // Setup
        $expectedHeader = Resources::IF_NONE_MATCH;
        $expectedValue = '0x8CAFB82EFF70C46';
        
        // Test
        $actual = AccessCondition::ifNoneMatch($expectedValue);
        
        // Assert
        $this->assertEquals($expectedHeader, $actual->getHeader());
        $this->assertEquals($expectedValue, $actual->getValue());
    }
    
    /**
     * @covers WindowsAzure\Blob\Models\AccessCondition::ifNotModifiedSince
     * @covers WindowsAzure\Blob\Models\AccessCondition::getHeader
     * @covers WindowsAzure\Blob\Models\AccessCondition::getValue
     */
    public function testIfNotModifiedSince()
    {
        // Setup
        $expectedHeader = Resources::IF_UNMODIFIED_SINCE;
        $expectedValue = new \DateTime('Sun, 25 Sep 2011 00:42:49 GMT');
        
        // Test
        $actual = AccessCondition::ifNotModifiedSince($expectedValue);
        
        // Assert
        $this->assertEquals($expectedHeader, $actual->getHeader());
        $this->assertEquals($expectedValue, $actual->getValue());
    }
    
    /**
     * @covers WindowsAzure\Blob\Models\AccessCondition::isValid
     */
    public function testIsValidWithValid()
    {
        // Test
        $actual = AccessCondition::isValid(Resources::IF_MATCH);
        
        // Assert
        $this->assertTrue($actual);
    }
    
    /**
     * @covers WindowsAzure\Blob\Models\AccessCondition::isValid
     */
    public function testIsValidWithInvalid()
    {
        // Test
        $actual = AccessCondition::isValid('1234');
        
        // Assert
        $this->assertFalse($actual);
    }
}


