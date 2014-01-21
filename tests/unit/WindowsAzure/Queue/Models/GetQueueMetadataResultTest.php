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
 * @package   Tests\Unit\WindowsAzure\Queue\Models
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */

namespace Tests\Unit\WindowsAzure\Queue\Models;
use WindowsAzure\Queue\Models\GetQueueMetadataResult;

/**
 * Unit tests for class GetQueueMetadataResult
 *
 * @category  Microsoft
 * @package   Tests\Unit\WindowsAzure\Queue\Models
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: 0.4.0_2014-01
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
class GetQueueMetadataResultTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers WindowsAzure\Queue\Models\GetQueueMetadataResult::__construct
     */
    public function test__construct()
    {
        // Setup
        $count = 10;
        $metadata = array('key1' => 'value1', 'key2' => 'value2');
        
        // Test
        $actual = new GetQueueMetadataResult($count, $metadata);
        
        // Assert
        $this->assertEquals($count, $actual->getApproximateMessageCount());
        $this->assertEquals($metadata, $actual->getMetadata());
    }
    
    /**
     * @covers WindowsAzure\Queue\Models\GetQueueMetadataResult::getApproximateMessageCount
     */
    public function testGetApproximateMessageCount()
    {
        // Setup
        $expected = 10;
        $metadata = new GetQueueMetadataResult($expected, array());
        
        // Test
        $actual = $metadata->getApproximateMessageCount();
        
        // Assert
        $this->assertEquals($expected, $actual);
    }
    
    /**
     * @covers WindowsAzure\Queue\Models\GetQueueMetadataResult::setApproximateMessageCount
     */
    public function testSetApproximateMessageCount()
    {
        // Setup
        $expected = 10;
        $metadata = new GetQueueMetadataResult(30, array());
        
        // Test
        $metadata->setApproximateMessageCount($expected);
        
        // Assert
        $this->assertEquals($expected, $metadata->getApproximateMessageCount());
    }
    
    /**
     * @covers WindowsAzure\Queue\Models\GetQueueMetadataResult::getMetadata
     */
    public function testGetMetadata()
    {
        // Setup
        $expected = array('key1' => 'value1', 'key2' => 'value2');
        $metadata = new GetQueueMetadataResult(0, $expected);
        
        // Test
        $actual = $metadata->getMetadata();
        
        // Assert
        $this->assertEquals($expected, $actual);
    }
    
    /**
     * @covers WindowsAzure\Queue\Models\GetQueueMetadataResult::setMetadata
     */
    public function testSetMetadata()
    {
        // Setup
        $expected = array('key1' => 'value1', 'key2' => 'value2');
        $metadata = new GetQueueMetadataResult(0, $expected);
        
        // Test
        $metadata->setMetadata($expected);
        
        // Assert
        $this->assertEquals($expected, $metadata->getMetadata());
    }
}


