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
use WindowsAzure\Queue\Models\Queue;
use Tests\Framework\TestResources;

/**
 * Unit tests for class Queue
 *
 * @category  Microsoft
 * @package   Tests\Unit\WindowsAzure\Queue\Models
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: 0.4.0_2014-01
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
class QueueTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers WindowsAzure\Queue\Models\Queue::__construct
     */
    public function test__construct()
    {
        // Setup
        $expectedName = TestResources::QUEUE1_NAME;
        $expectedUrl = TestResources::QUEUE_URI;
        
        // Test
        $queue = new Queue($expectedName, $expectedUrl);
        
        // Assert
        $this->assertEquals($expectedName, $queue->getName());
        $this->assertEquals($expectedUrl, $queue->getUrl());
    }
    
    /**
     * @covers WindowsAzure\Queue\Models\Queue::setName
     */
    public function testSetName()
    {
        // Setup
        $queue = new Queue('myqueue', 'myurl');
        $expected = TestResources::QUEUE1_NAME;
        
        // Test
        $queue->setName($expected);
        
        // Assert
        $this->assertEquals($expected, $queue->getName());
    }
    
    /**
     * @covers WindowsAzure\Queue\Models\Queue::getName
     */
    public function testGetName()
    {
        // Setup
        $queue = new Queue('myqueue', 'myurl');
        $expected = TestResources::QUEUE1_NAME;
        $queue->setName($expected);
        
        // Test
        $actual = $queue->getName();
        
        // Assert
        $this->assertEquals($expected, $actual);
    }
    
    /**
     * @covers WindowsAzure\Queue\Models\Queue::setUrl
     */
    public function testSetUrl()
    {
        // Setup
        $queue = new Queue('myqueue', 'myurl');
        $expected = TestResources::QUEUE1_NAME;
        
        // Test
        $queue->setUrl($expected);
        
        // Assert
        $this->assertEquals($expected, $queue->getUrl());
    }
    
    /**
     * @covers WindowsAzure\Queue\Models\Queue::getUrl
     */
    public function testGetUrl()
    {
        // Setup
        $queue = new Queue('myqueue', 'myurl');
        $expected = TestResources::QUEUE_URI;
        $queue->setUrl($expected);
        
        // Test
        $actual = $queue->getUrl();
        
        // Assert
        $this->assertEquals($expected, $actual);
    }
    
    /**
     * @covers WindowsAzure\Queue\Models\Queue::setMetadata
     */
    public function testSetMetadata()
    {
        // Setup
        $queue = new Queue('myqueue', 'myurl');
        $expected = array('key1' => 'value1', 'key2' => 'value2');
        
        // Test
        $queue->setMetadata($expected);
        
        // Assert
        $this->assertEquals($expected, $queue->getMetadata());
    }
    
    /**
     * @covers WindowsAzure\Queue\Models\Queue::getMetadata
     */
    public function testGetMetadata()
    {
        // Setup
        $queue = new Queue('myqueue', 'myurl');
        $expected = array('key1' => 'value1', 'key2' => 'value2');
        $queue->setMetadata($expected);
        
        // Test
        $actual = $queue->getMetadata();
        
        // Assert
        $this->assertEquals($expected, $actual);
    }
}


