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
use WindowsAzure\Queue\Models\WindowsAzureQueueMessage;
use Tests\Framework\TestResources;
use WindowsAzure\Common\Internal\Utilities;

/**
 * Unit tests for class WindowsAzureQueueMessageTest
 *
 * @category  Microsoft
 * @package   Tests\Unit\WindowsAzure\Queue\Models
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: 0.4.0_2014-01
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
class WindowsAzureQueueMessageTest extends \PHPUnit_Framework_TestCase
{
    /**
    * @covers WindowsAzure\Queue\Models\WindowsAzureQueueMessage::createFromListMessages
    */
    public function testCreateListMessages()
    {
        // Setup
        $sample = TestResources::listMessagesSample();
        $sample = $sample['QueueMessage'];
        
        // Test
        $actual = WindowsAzureQueueMessage::createFromListMessages($sample);
        
        // Assert
        $this->assertEquals($sample['MessageId'] , $actual->getMessageId());
        $this->assertEquals(Utilities::rfc1123ToDateTime($sample['InsertionTime']) , $actual->getInsertionDate());
        $this->assertEquals(Utilities::rfc1123ToDateTime($sample['ExpirationTime']) , $actual->getExpirationDate());
        $this->assertEquals($sample['PopReceipt'] , $actual->getPopReceipt());
        $this->assertEquals(Utilities::rfc1123ToDateTime($sample['TimeNextVisible']), $actual->getTimeNextVisible());
        $this->assertEquals(intval($sample['DequeueCount']) , $actual->getDequeueCount());
        $this->assertEquals($sample['MessageText'] , $actual->getMessageText());
    }
    
    /**
    * @covers WindowsAzure\Queue\Models\WindowsAzureQueueMessage::createFromPeekMessages
    */
    public function testCreateFromPeekMessages()
    {
        // Setup
        $sample = TestResources::listMessagesSample();
        $sample = $sample['QueueMessage'];
        
        // Test
        $actual = WindowsAzureQueueMessage::createFromPeekMessages($sample);
        
        // Assert
        $this->assertEquals($sample['MessageId'] , $actual->getMessageId());
        $this->assertEquals(Utilities::rfc1123ToDateTime($sample['InsertionTime']) , $actual->getInsertionDate());
        $this->assertEquals(Utilities::rfc1123ToDateTime($sample['ExpirationTime']) , $actual->getExpirationDate());
        $this->assertEquals(intval($sample['DequeueCount']) , $actual->getDequeueCount());
        $this->assertEquals($sample['MessageText'] , $actual->getMessageText());
    }
    
    /**
     * @covers WindowsAzure\Queue\Models\WindowsAzureQueueMessage::getMessageText
     */
    public function testGetMessageText()
    {
        // Setup
        $azureQueueMessage = new WindowsAzureQueueMessage();
        $expected = 'PHRlc3Q+dGhpcyBpcyBhIHRlc3QgbWVzc2FnZTwvdGVzdD4=' ;
        $azureQueueMessage->setMessageText($expected);
        
        // Test
        $actual = $azureQueueMessage->getMessageText();
        
        // Assert
        $this->assertEquals($expected, $actual);
    }
    
    /**
     * @covers WindowsAzure\Queue\Models\WindowsAzureQueueMessage::setMessageText
     */
    public function testSetMessageText()
    {
        // Setup
        $azureQueueMessage = new WindowsAzureQueueMessage();
        $expected = 'PHRlc3Q+dGhpcyBpcyBhIHRlc3QgbWVzc2FnZTwvdGVzdD4=';
        
        // Test
        $azureQueueMessage->setMessageText($expected);
        
        // Assert
        $actual = $azureQueueMessage->getMessageText();
        $this->assertEquals($expected, $actual);
    }
    
    /**
     * @covers WindowsAzure\Queue\Models\WindowsAzureQueueMessage::getMessageId
     */
    public function testGetMessageId()
    {
        // Setup
        $azureQueueMessage = new WindowsAzureQueueMessage();
        $expected = '5974b586-0df3-4e2d-ad0c-18e3892bfca2';
        $azureQueueMessage->setMessageId($expected);
        
        // Test
        $actual = $azureQueueMessage->getMessageId();
        
        // Assert
        $this->assertEquals($expected, $actual);
    }
    
    /**
     * @covers WindowsAzure\Queue\Models\WindowsAzureQueueMessage::setMessageId
     */
    public function testSetMessageId()
    {
        // Setup
        $azureQueueMessage = new WindowsAzureQueueMessage();
        $expected = '5974b586-0df3-4e2d-ad0c-18e3892bfca2';
        
        // Test
        $azureQueueMessage->setMessageId($expected);
        
        // Assert
        $actual = $azureQueueMessage->getMessageId();
        $this->assertEquals($expected, $actual);
    }
    
    /**
     * @covers WindowsAzure\Queue\Models\WindowsAzureQueueMessage::getInsertionDate
     */
    public function testGetInsertionDate()
    {
        // Setup
        $azureQueueMessage = new WindowsAzureQueueMessage();
        $expected = 'Fri, 09 Oct 2009 21:04:30 GMT';
        $azureQueueMessage->setInsertionDate($expected);
        
        // Test
        $actual = $azureQueueMessage->getInsertionDate();
        
        // Assert
        $this->assertEquals($expected, $actual);
    }
    
    /**
     * @covers WindowsAzure\Queue\Models\WindowsAzureQueueMessage::setInsertionDate
     */
    public function testSetInsertionDate()
    {
        // Setup
        $azureQueueMessage = new WindowsAzureQueueMessage();
        $expected = 'Fri, 09 Oct 2009 21:04:30 GMT';
        
        // Test
        $azureQueueMessage->setInsertionDate($expected);
        
        // Assert
        $actual = $azureQueueMessage->getInsertionDate();
        $this->assertEquals($expected, $actual);
    }
    
    /**
     * @covers WindowsAzure\Queue\Models\WindowsAzureQueueMessage::getExpirationDate
     */
    public function testGetExpirationDate()
    {
        // Setup
        $azureQueueMessage = new WindowsAzureQueueMessage();
        $expected = 'Fri, 16 Oct 2009 21:04:30 GMT';
        $azureQueueMessage->setExpirationDate($expected);
        
        // Test
        $actual = $azureQueueMessage->getExpirationDate();
        
        // Assert
        $this->assertEquals($expected, $actual);
    }
    
    /**
     * @covers WindowsAzure\Queue\Models\WindowsAzureQueueMessage::setExpirationDate
     */
    public function testSetExpirationDate()
    {
        // Setup
        $azureQueueMessage = new WindowsAzureQueueMessage();
        $expected = 'Fri, 16 Oct 2009 21:04:30 GMT';
        
        // Test
        $azureQueueMessage->setExpirationDate($expected);
        
        // Assert
        $actual = $azureQueueMessage->getExpirationDate();
        $this->assertEquals($expected, $actual);
    }
    
    /**
     * @covers WindowsAzure\Queue\Models\WindowsAzureQueueMessage::getPopReceipt
     */
    public function testGetPopReceipt()
    {
        // Setup
        $azureQueueMessage = new WindowsAzureQueueMessage();
        $expected = 'YzQ4Yzg1MDItYTc0Ny00OWNjLTkxYTUtZGM0MDFiZDAwYzEw';
        $azureQueueMessage->setPopReceipt($expected);
        
        // Test
        $actual = $azureQueueMessage->getPopReceipt();
        
        // Assert
        $this->assertEquals($expected, $actual);
    }
    
    /**
     * @covers WindowsAzure\Queue\Models\WindowsAzureQueueMessage::setPopReceipt
     */
    public function testSetPopReceipt()
    {
        // Setup
        $azureQueueMessage = new WindowsAzureQueueMessage();
        $expected = 'YzQ4Yzg1MDItYTc0Ny00OWNjLTkxYTUtZGM0MDFiZDAwYzEw';
        
        // Test
        $azureQueueMessage->setPopReceipt($expected);
        
        // Assert
        $actual = $azureQueueMessage->getPopReceipt();
        $this->assertEquals($expected, $actual);
    }
    
    /**
     * @covers WindowsAzure\Queue\Models\WindowsAzureQueueMessage::getTimeNextVisible
     */
    public function testGetTimeNextVisible()
    {
        // Setup
        $azureQueueMessage = new WindowsAzureQueueMessage();
        $expected = 'Fri, 09 Oct 2009 23:29:20 GMT';
        $azureQueueMessage->setTimeNextVisible($expected);
        
        // Test
        $actual = $azureQueueMessage->getTimeNextVisible();
        
        // Assert
        $this->assertEquals($expected, $actual);
    }
    
    /**
     * @covers WindowsAzure\Queue\Models\WindowsAzureQueueMessage::setTimeNextVisible
     */
    public function testSetTimeNextVisible()
    {
        // Setup
        $azureQueueMessage = new WindowsAzureQueueMessage();
        $expected = 'Fri, 09 Oct 2009 23:29:20 GMT';
        
        // Test
        $azureQueueMessage->setTimeNextVisible($expected);
        
        // Assert
        $actual = $azureQueueMessage->getTimeNextVisible();
        $this->assertEquals($expected, $actual);
    }
    
    /**
     * @covers WindowsAzure\Queue\Models\WindowsAzureQueueMessage::getDequeueCount
     */
    public function testGetDequeueCount()
    {
        // Setup
        $azureQueueMessage = new WindowsAzureQueueMessage();
        $expected = 1;
        $azureQueueMessage->setDequeueCount($expected);
        
        // Test
        $actual = $azureQueueMessage->getDequeueCount();
        
        // Assert
        $this->assertEquals($expected, $actual);
    }
    
    /**
     * @covers WindowsAzure\Queue\Models\WindowsAzureQueueMessage::setDequeueCount
     */
    public function testSetDequeueCount()
    {
        // Setup
        $azureQueueMessage = new WindowsAzureQueueMessage();
        $expected = 1;
        
        // Test
        $azureQueueMessage->setDequeueCount($expected);
        
        // Assert
        $actual = $azureQueueMessage->getDequeueCount();
        $this->assertEquals($expected, $actual);
    }
}


