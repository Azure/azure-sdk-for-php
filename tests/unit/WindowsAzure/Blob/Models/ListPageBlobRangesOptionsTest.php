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
use WindowsAzure\Blob\Models\ListPageBlobRangesOptions;
use WindowsAzure\Blob\Models\AccessCondition;
use Tests\Framework\TestResources;

/**
 * Unit tests for class ListPageBlobRangesOptions
 *
 * @category  Microsoft
 * @package   Tests\Unit\WindowsAzure\Blob\Models
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: 0.4.0_2014-01
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
class ListPageBlobRangesOptionsTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers WindowsAzure\Blob\Models\ListPageBlobRangesOptions::setLeaseId
     * @covers WindowsAzure\Blob\Models\ListPageBlobRangesOptions::getLeaseId
     */
    public function testSetLeaseId()
    {
        // Setup
        $expected = '0x8CAFB82EFF70C46';
        $options = new ListPageBlobRangesOptions();
        $options->setLeaseId($expected);
        
        // Test
        $options->setLeaseId($expected);
        
        // Assert
        $this->assertEquals($expected, $options->getLeaseId());
    }
    
    /**
     * @covers WindowsAzure\Blob\Models\ListPageBlobRangesOptions::getAccessCondition
     */
    public function testGetAccessCondition()
    {
        // Setup
        $expected = AccessCondition::none();
        $result = new ListPageBlobRangesOptions();
        $result->setAccessCondition($expected);
        
        // Test
        $actual = $result->getAccessCondition();
        
        // Assert
        $this->assertEquals($expected, $actual);
    }
    
    /**
     * @covers WindowsAzure\Blob\Models\ListPageBlobRangesOptions::setAccessCondition
     */
    public function testSetAccessCondition()
    {
        // Setup
        $expected = AccessCondition::none();
        $result = new ListPageBlobRangesOptions();
        
        // Test
        $result->setAccessCondition($expected);
        
        // Assert
        $this->assertEquals($expected, $result->getAccessCondition());
    }
    
    /**
     * @covers WindowsAzure\Blob\Models\ListPageBlobRangesOptions::setSnapshot
     */
    public function testSetSnapshot()
    {
        // Setup
        $blob = new ListPageBlobRangesOptions();
        $expected = TestResources::QUEUE1_NAME;
        
        // Test
        $blob->setSnapshot($expected);
        
        // Assert
        $this->assertEquals($expected, $blob->getSnapshot());
    }
    
    /**
     * @covers WindowsAzure\Blob\Models\ListPageBlobRangesOptions::getSnapshot
     */
    public function testGetSnapshot()
    {
        // Setup
        $blob = new ListPageBlobRangesOptions();
        $expected = TestResources::QUEUE_URI;
        $blob->setSnapshot($expected);
        
        // Test
        $actual = $blob->getSnapshot();
        
        // Assert
        $this->assertEquals($expected, $actual);
    }
    
    /**
     * @covers WindowsAzure\Blob\Models\ListPageBlobRangesOptions::setRangeStart
     * @covers WindowsAzure\Blob\Models\ListPageBlobRangesOptions::getRangeStart
     */
    public function testSetRangeStart()
    {
        // Setup
        $expected = 123;
        $prooperties = new ListPageBlobRangesOptions();
        $prooperties->setRangeStart($expected);
        
        // Test
        $prooperties->setRangeStart($expected);
        
        // Assert
        $this->assertEquals($expected, $prooperties->getRangeStart());
    }
    
    /**
     * @covers WindowsAzure\Blob\Models\ListPageBlobRangesOptions::setRangeEnd
     * @covers WindowsAzure\Blob\Models\ListPageBlobRangesOptions::getRangeEnd
     */
    public function testSetRangeEnd()
    {
        // Setup
        $expected = 123;
        $prooperties = new ListPageBlobRangesOptions();
        $prooperties->setRangeEnd($expected);
        
        // Test
        $prooperties->setRangeEnd($expected);
        
        // Assert
        $this->assertEquals($expected, $prooperties->getRangeEnd());
    }
}


