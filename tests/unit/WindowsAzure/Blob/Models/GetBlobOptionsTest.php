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
use Tests\Framework\TestResources;
use WindowsAzure\Blob\Models\AccessCondition;
use WindowsAzure\Blob\Models\GetBlobOptions;

/**
 * Unit tests for class GetBlobOptions
 *
 * @category  Microsoft
 * @package   Tests\Unit\WindowsAzure\Blob\Models
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: 0.4.0_2014-01
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
class GetBlobOptionsTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers WindowsAzure\Blob\Models\GetBlobOptions::setLeaseId
     * @covers WindowsAzure\Blob\Models\GetBlobOptions::getLeaseId
     */
    public function testSetLeaseId()
    {
        // Setup
        $expected = '0x8CAFB82EFF70C46';
        $options = new GetBlobOptions();
        $options->setLeaseId($expected);
        
        // Test
        $options->setLeaseId($expected);
        
        // Assert
        $this->assertEquals($expected, $options->getLeaseId());
    }
    
    /**
     * @covers WindowsAzure\Blob\Models\GetBlobOptions::getAccessCondition
     */
    public function testGetAccessCondition()
    {
        // Setup
        $expected = AccessCondition::none();
        $result = new GetBlobOptions();
        $result->setAccessCondition($expected);
        
        // Test
        $actual = $result->getAccessCondition();
        
        // Assert
        $this->assertEquals($expected, $actual);
    }
    
    /**
     * @covers WindowsAzure\Blob\Models\GetBlobOptions::setAccessCondition
     */
    public function testSetAccessCondition()
    {
        // Setup
        $expected = AccessCondition::none();
        $result = new GetBlobOptions();
        
        // Test
        $result->setAccessCondition($expected);
        
        // Assert
        $this->assertEquals($expected, $result->getAccessCondition());
    }
    
    /**
     * @covers WindowsAzure\Blob\Models\GetBlobOptions::setSnapshot
     */
    public function testSetSnapshot()
    {
        // Setup
        $blob = new GetBlobOptions();
        $expected = TestResources::QUEUE1_NAME;
        
        // Test
        $blob->setSnapshot($expected);
        
        // Assert
        $this->assertEquals($expected, $blob->getSnapshot());
    }
    
    /**
     * @covers WindowsAzure\Blob\Models\GetBlobOptions::getSnapshot
     */
    public function testGetSnapshot()
    {
        // Setup
        $blob = new GetBlobOptions();
        $expected = TestResources::QUEUE_URI;
        $blob->setSnapshot($expected);
        
        // Test
        $actual = $blob->getSnapshot();
        
        // Assert
        $this->assertEquals($expected, $actual);
    }
    
    /**
     * @covers WindowsAzure\Blob\Models\GetBlobOptions::setRangeStart
     * @covers WindowsAzure\Blob\Models\GetBlobOptions::getRangeStart
     */
    public function testSetRangeStart()
    {
        // Setup
        $expected = 123;
        $prooperties = new GetBlobOptions();
        $prooperties->setRangeStart($expected);
        
        // Test
        $prooperties->setRangeStart($expected);
        
        // Assert
        $this->assertEquals($expected, $prooperties->getRangeStart());
    }
    
    /**
     * @covers WindowsAzure\Blob\Models\GetBlobOptions::setRangeEnd
     * @covers WindowsAzure\Blob\Models\GetBlobOptions::getRangeEnd
     */
    public function testSetRangeEnd()
    {
        // Setup
        $expected = 123;
        $prooperties = new GetBlobOptions();
        $prooperties->setRangeEnd($expected);
        
        // Test
        $prooperties->setRangeEnd($expected);
        
        // Assert
        $this->assertEquals($expected, $prooperties->getRangeEnd());
    }
    
    /**
     * @covers WindowsAzure\Blob\Models\GetBlobOptions::setComputeRangeMD5
     */
    public function testSetComputeRangeMD5()
    {
        // Setup
        $options = new GetBlobOptions();
        $expected = true;
        
        // Test
        $options->setComputeRangeMD5($expected);
        
        // Assert
        $this->assertEquals($expected, $options->getComputeRangeMD5());
    }
    
    /**
     * @covers WindowsAzure\Blob\Models\GetBlobOptions::getComputeRangeMD5
     */
    public function testGetComputeRangeMD5()
    {
        // Setup
        $options = new GetBlobOptions();
        $expected = true;
        $options->setComputeRangeMD5($expected);
        
        // Test
        $actual = $options->getComputeRangeMD5();
        
        // Assert
        $this->assertEquals($expected, $actual);
    }
}


