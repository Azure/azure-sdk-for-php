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
use WindowsAzure\Queue\Models\ListMessagesResult;
use Tests\Framework\TestResources;
use WindowsAzure\Common\Internal\Utilities;

/**
 * Unit tests for class ListMessagesResult
 *
 * @category  Microsoft
 * @package   Tests\Unit\WindowsAzure\Queue\Models
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: 0.4.0_2014-01
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
class ListMessagesResultTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers WindowsAzure\Queue\Models\ListMessagesResult::create
     */
    public function testCreate()
    {
        // Setup
        $sample = TestResources::listMessagesSample();
        
        
        // Test
        $result = ListMessagesResult::create($sample);
        
        // Assert
        $actual = $result->getQueueMessages();
        $this->assertCount(1, $actual);
        $this->assertEquals($sample['QueueMessage']['MessageId'] , $actual[0]->getMessageId());
        $this->assertEquals(Utilities::rfc1123ToDateTime($sample['QueueMessage']['InsertionTime']) , $actual[0]->getInsertionDate());
        $this->assertEquals(Utilities::rfc1123ToDateTime($sample['QueueMessage']['ExpirationTime']) , $actual[0]->getExpirationDate());
        $this->assertEquals($sample['QueueMessage']['PopReceipt'] , $actual[0]->getPopReceipt());
        $this->assertEquals(Utilities::rfc1123ToDateTime($sample['QueueMessage']['TimeNextVisible']), $actual[0]->getTimeNextVisible());
        $this->assertEquals(intval($sample['QueueMessage']['DequeueCount']) , $actual[0]->getDequeueCount());
        $this->assertEquals($sample['QueueMessage']['MessageText'] , $actual[0]->getMessageText());
    }
    
    /**
     * @covers WindowsAzure\Queue\Models\ListMessagesResult::create
     */
    public function testCreateMultiple()
    {
        // Setup
        $sample = TestResources::listMessagesMultipleMessagesSample();
        
        // Test
        $result = ListMessagesResult::create($sample);
        
        // Assert
        $actual = $result->getQueueMessages();
        $this->assertCount(2, $actual);
        $this->assertEquals($sample['QueueMessage'][0]['MessageId'] , $actual[0]->getMessageId());
        $this->assertEquals(Utilities::rfc1123ToDateTime($sample['QueueMessage'][0]['InsertionTime']) , $actual[0]->getInsertionDate());
        $this->assertEquals(Utilities::rfc1123ToDateTime($sample['QueueMessage'][0]['ExpirationTime']) , $actual[0]->getExpirationDate());
        $this->assertEquals($sample['QueueMessage'][0]['PopReceipt'] , $actual[0]->getPopReceipt());
        $this->assertEquals(Utilities::rfc1123ToDateTime($sample['QueueMessage'][0]['TimeNextVisible']), $actual[0]->getTimeNextVisible());
        $this->assertEquals(intval($sample['QueueMessage'][0]['DequeueCount']) , $actual[0]->getDequeueCount());
        $this->assertEquals($sample['QueueMessage'][0]['MessageText'] , $actual[0]->getMessageText());
        
        $this->assertEquals($sample['QueueMessage'][1]['MessageId'] , $actual[1]->getMessageId());
        $this->assertEquals(Utilities::rfc1123ToDateTime($sample['QueueMessage'][1]['InsertionTime']) , $actual[1]->getInsertionDate());
        $this->assertEquals(Utilities::rfc1123ToDateTime($sample['QueueMessage'][1]['ExpirationTime']) , $actual[1]->getExpirationDate());
        $this->assertEquals($sample['QueueMessage'][1]['PopReceipt'] , $actual[1]->getPopReceipt());
        $this->assertEquals(Utilities::rfc1123ToDateTime($sample['QueueMessage'][1]['TimeNextVisible']), $actual[1]->getTimeNextVisible());
        $this->assertEquals(intval($sample['QueueMessage'][1]['DequeueCount']) , $actual[1]->getDequeueCount());
        $this->assertEquals($sample['QueueMessage'][1]['MessageText'] , $actual[1]->getMessageText());
    }
    
    /**
     * @covers WindowsAzure\Queue\Models\ListMessagesResult::getQueueMessages
     */
    public function testGetQueueMessages()
    {
        // Setup
        $sample = TestResources::listMessagesSample();
        $expectedMessageId = '1234b585-0ac3-4e2a-ad0c-18e3992brca1';
        $result = ListMessagesResult::create($sample);
        $expected = $result->getQueueMessages();
        $expected[0]->setMessageId($expectedMessageId);
        $result->setQueueMessages($expected);
        
        // Test
        $actual = $result->getQueueMessages();
        
        $this->assertEquals($expected, $actual);
    }
    
    /**
     * @covers WindowsAzure\Queue\Models\ListMessagesResult::setQueueMessages
     */
    public function testSetQueueMessages()
    {
        // Setup
        $sample = TestResources::listMessagesSample();
        $expectedMessageId = '1234b585-0ac3-4e2a-ad0c-18e3992brca1';
        $result = ListMessagesResult::create($sample);
        $expected = $result->getQueueMessages();
        $expected[0]->setMessageId($expectedMessageId);
        
        // Test
        $result->setQueueMessages($expected);
        
        $this->assertEquals($expected, $result->getQueueMessages());
    }
}


