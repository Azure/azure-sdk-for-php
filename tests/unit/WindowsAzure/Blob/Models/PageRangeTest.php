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
use WindowsAzure\Blob\Models\PageRange;

/**
 * Unit tests for class PageRange
 *
 * @category  Microsoft
 * @package   Tests\Unit\WindowsAzure\Blob\Models
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: 0.4.0_2014-01
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
class PageRangeTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers WindowsAzure\Blob\Models\PageRange::__construct
     * @covers WindowsAzure\Blob\Models\PageRange::getStart
     * @covers WindowsAzure\Blob\Models\PageRange::getEnd
     */
    public function test__construct()
    {
        // Setup
        $expectedStart = 0;
        $expectedEnd = 512;
        
        // Test
        $actual = new PageRange($expectedStart, $expectedEnd);
        
        // Assert
        $this->assertEquals($expectedStart, $actual->getStart());
        $this->assertEquals($expectedEnd, $actual->getEnd());
     
        return $actual;
    }
    
    /**
     * @covers WindowsAzure\Blob\Models\PageRange::setStart
     * @depends test__construct
     */
    public function testSetStart($obj)
    {
        // Setup
        $expected = 10;
        
        // Test
        $obj->setStart($expected);
        
        // Assert
        $this->assertEquals($expected, $obj->getStart());
    }
    
    /**
     * @covers WindowsAzure\Blob\Models\PageRange::setEnd
     * @depends test__construct
     */
    public function testSetEnd($obj)
    {
        // Setup
        $expected = 10;
        
        // Test
        $obj->setEnd($expected);
        
        // Assert
        $this->assertEquals($expected, $obj->getEnd());
    }
    
    /**
     * @covers WindowsAzure\Blob\Models\PageRange::setLength
     * @depends test__construct
     */
    public function testSetLength($obj)
    {
        // Setup
        $expected = 10;
        $start = $obj->getStart();
        
        // Test
        $obj->setLength($expected);
        
        // Assert
        $this->assertEquals($start + $expected - 1, $obj->getEnd());
    }
    
    /**
     * @covers WindowsAzure\Blob\Models\PageRange::getLength
     * @depends test__construct
     */
    public function testGetLength($obj)
    {
        // Setup
        $expected = 10;
        $obj->setLength($expected);
        
        // Test
        $actual = $obj->getLength();
        
        // Assert
        $this->assertEquals($expected, $actual);
    }
}


