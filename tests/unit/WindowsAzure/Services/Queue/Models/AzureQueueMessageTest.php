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
 * @package   PEAR2\Tests\Unit\WindowsAzure
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */

use PEAR2\WindowsAzure\Services\Queue\Models\AzureQueueMessage;
use PEAR2\Tests\Framework\TestResources;
use PEAR2\WindowsAzure\Core\AzureUtilities;

/**
 * Unit tests for class AzureQueueMessageTest
 *
 * @category  Microsoft
 * @package   PEAR2\Tests\Unit\WindowsAzure
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
class AzureQueueMessageTest extends PHPUnit_Framework_TestCase
{
    /**
    * @covers PEAR2\WindowsAzure\Services\Queue\Models\AzureQueueMessage::createFromListMessages
    */
    public function testCreateListMessages()
    {
        // Setup
        $sample = TestResources::listMessagesSample();
        $sample = $sample['QueueMessage'];
        
        // Test
        $actual = AzureQueueMessage::createFromListMessages($sample);
        
        // Assert
        $this->assertEquals($sample['MessageId'] , $actual->getMessageId());
        $this->assertEquals(AzureUtilities::windowsAzureDateToDateTime($sample['InsertionTime']) , $actual->getInsertionDate());
        $this->assertEquals(AzureUtilities::windowsAzureDateToDateTime($sample['ExpirationTime']) , $actual->getExpirationDate());
        $this->assertEquals($sample['PopReceipt'] , $actual->getPopReceipt());
        $this->assertEquals(AzureUtilities::windowsAzureDateToDateTime($sample['TimeNextVisible']), $actual->getTimeNextVisible());
        $this->assertEquals(intval($sample['DequeueCount']) , $actual->getDequeueCount());
        $this->assertEquals($sample['MessageText'] , $actual->getMessageText());
    }
    
    /**
    * @covers PEAR2\WindowsAzure\Services\Queue\Models\AzureQueueMessage::createFromPeekMessages
    */
    public function testCreateFromPeekMessages()
    {
        // Setup
        $sample = TestResources::listMessagesSample();
        $sample = $sample['QueueMessage'];
        
        // Test
        $actual = AzureQueueMessage::createFromPeekMessages($sample);
        
        // Assert
        $this->assertEquals($sample['MessageId'] , $actual->getMessageId());
        $this->assertEquals(AzureUtilities::windowsAzureDateToDateTime($sample['InsertionTime']) , $actual->getInsertionDate());
        $this->assertEquals(AzureUtilities::windowsAzureDateToDateTime($sample['ExpirationTime']) , $actual->getExpirationDate());
        $this->assertEquals(intval($sample['DequeueCount']) , $actual->getDequeueCount());
        $this->assertEquals($sample['MessageText'] , $actual->getMessageText());
    }
    
    /**
     * @covers PEAR2\WindowsAzure\Services\Queue\Models\AzureQueueMessage::getMessageText
     */
    public function testGetMessageText()
    {
        // Setup
        $azureQueueMessage = new AzureQueueMessage();
        $expected = 'PHRlc3Q+dGhpcyBpcyBhIHRlc3QgbWVzc2FnZTwvdGVzdD4=' ;
        $azureQueueMessage->setMessageText($expected);
        
        // Test
        $actual = $azureQueueMessage->getMessageText();
        
        // Assert
        $this->assertEquals($expected, $actual);
    }
    
    /**
     * @covers PEAR2\WindowsAzure\Services\Queue\Models\AzureQueueMessage::setMessageText
     */
    public function testSetMessageText()
    {
        // Setup
        $azureQueueMessage = new AzureQueueMessage();
        $expected = 'PHRlc3Q+dGhpcyBpcyBhIHRlc3QgbWVzc2FnZTwvdGVzdD4=';
        
        // Test
        $azureQueueMessage->setMessageText($expected);
        
        // Assert
        $actual = $azureQueueMessage->getMessageText();
        $this->assertEquals($expected, $actual);
    }
    
    /**
     * @covers PEAR2\WindowsAzure\Services\Queue\Models\AzureQueueMessage::getMessageId
     */
    public function testGetMessageId()
    {
        // Setup
        $azureQueueMessage = new AzureQueueMessage();
        $expected = '5974b586-0df3-4e2d-ad0c-18e3892bfca2';
        $azureQueueMessage->setMessageId($expected);
        
        // Test
        $actual = $azureQueueMessage->getMessageId();
        
        // Assert
        $this->assertEquals($expected, $actual);
    }
    
    /**
     * @covers PEAR2\WindowsAzure\Services\Queue\Models\AzureQueueMessage::setMessageId
     */
    public function testSetMessageId()
    {
        // Setup
        $azureQueueMessage = new AzureQueueMessage();
        $expected = '5974b586-0df3-4e2d-ad0c-18e3892bfca2';
        
        // Test
        $azureQueueMessage->setMessageId($expected);
        
        // Assert
        $actual = $azureQueueMessage->getMessageId();
        $this->assertEquals($expected, $actual);
    }
    
    /**
     * @covers PEAR2\WindowsAzure\Services\Queue\Models\AzureQueueMessage::getInsertionDate
     */
    public function testGetInsertionDate()
    {
        // Setup
        $azureQueueMessage = new AzureQueueMessage();
        $expected = 'Fri, 09 Oct 2009 21:04:30 GMT';
        $azureQueueMessage->setInsertionDate($expected);
        
        // Test
        $actual = $azureQueueMessage->getInsertionDate();
        
        // Assert
        $this->assertEquals($expected, $actual);
    }
    
    /**
     * @covers PEAR2\WindowsAzure\Services\Queue\Models\AzureQueueMessage::setInsertionDate
     */
    public function testSetInsertionDate()
    {
        // Setup
        $azureQueueMessage = new AzureQueueMessage();
        $expected = 'Fri, 09 Oct 2009 21:04:30 GMT';
        
        // Test
        $azureQueueMessage->setInsertionDate($expected);
        
        // Assert
        $actual = $azureQueueMessage->getInsertionDate();
        $this->assertEquals($expected, $actual);
    }
    
    /**
     * @covers PEAR2\WindowsAzure\Services\Queue\Models\AzureQueueMessage::getExpirationDate
     */
    public function testGetExpirationDate()
    {
        // Setup
        $azureQueueMessage = new AzureQueueMessage();
        $expected = 'Fri, 16 Oct 2009 21:04:30 GMT';
        $azureQueueMessage->setExpirationDate($expected);
        
        // Test
        $actual = $azureQueueMessage->getExpirationDate();
        
        // Assert
        $this->assertEquals($expected, $actual);
    }
    
    /**
     * @covers PEAR2\WindowsAzure\Services\Queue\Models\AzureQueueMessage::setExpirationDate
     */
    public function testSetExpirationDate()
    {
        // Setup
        $azureQueueMessage = new AzureQueueMessage();
        $expected = 'Fri, 16 Oct 2009 21:04:30 GMT';
        
        // Test
        $azureQueueMessage->setExpirationDate($expected);
        
        // Assert
        $actual = $azureQueueMessage->getExpirationDate();
        $this->assertEquals($expected, $actual);
    }
    
    /**
     * @covers PEAR2\WindowsAzure\Services\Queue\Models\AzureQueueMessage::getPopReceipt
     */
    public function testGetPopReceipt()
    {
        // Setup
        $azureQueueMessage = new AzureQueueMessage();
        $expected = 'YzQ4Yzg1MDItYTc0Ny00OWNjLTkxYTUtZGM0MDFiZDAwYzEw';
        $azureQueueMessage->setPopReceipt($expected);
        
        // Test
        $actual = $azureQueueMessage->getPopReceipt();
        
        // Assert
        $this->assertEquals($expected, $actual);
    }
    
    /**
     * @covers PEAR2\WindowsAzure\Services\Queue\Models\AzureQueueMessage::setPopReceipt
     */
    public function testSetPopReceipt()
    {
        // Setup
        $azureQueueMessage = new AzureQueueMessage();
        $expected = 'YzQ4Yzg1MDItYTc0Ny00OWNjLTkxYTUtZGM0MDFiZDAwYzEw';
        
        // Test
        $azureQueueMessage->setPopReceipt($expected);
        
        // Assert
        $actual = $azureQueueMessage->getPopReceipt();
        $this->assertEquals($expected, $actual);
    }
    
    /**
     * @covers PEAR2\WindowsAzure\Services\Queue\Models\AzureQueueMessage::getTimeNextVisible
     */
    public function testGetTimeNextVisible()
    {
        // Setup
        $azureQueueMessage = new AzureQueueMessage();
        $expected = 'Fri, 09 Oct 2009 23:29:20 GMT';
        $azureQueueMessage->setTimeNextVisible($expected);
        
        // Test
        $actual = $azureQueueMessage->getTimeNextVisible();
        
        // Assert
        $this->assertEquals($expected, $actual);
    }
    
    /**
     * @covers PEAR2\WindowsAzure\Services\Queue\Models\AzureQueueMessage::setTimeNextVisible
     */
    public function testSetTimeNextVisible()
    {
        // Setup
        $azureQueueMessage = new AzureQueueMessage();
        $expected = 'Fri, 09 Oct 2009 23:29:20 GMT';
        
        // Test
        $azureQueueMessage->setTimeNextVisible($expected);
        
        // Assert
        $actual = $azureQueueMessage->getTimeNextVisible();
        $this->assertEquals($expected, $actual);
    }
    
    /**
     * @covers PEAR2\WindowsAzure\Services\Queue\Models\AzureQueueMessage::getDequeueCount
     */
    public function testGetDequeueCount()
    {
        // Setup
        $azureQueueMessage = new AzureQueueMessage();
        $expected = 1;
        $azureQueueMessage->setDequeueCount($expected);
        
        // Test
        $actual = $azureQueueMessage->getDequeueCount();
        
        // Assert
        $this->assertEquals($expected, $actual);
    }
    
    /**
     * @covers PEAR2\WindowsAzure\Services\Queue\Models\AzureQueueMessage::setDequeueCount
     */
    public function testSetDequeueCount()
    {
        // Setup
        $azureQueueMessage = new AzureQueueMessage();
        $expected = 1;
        
        // Test
        $azureQueueMessage->setDequeueCount($expected);
        
        // Assert
        $actual = $azureQueueMessage->getDequeueCount();
        $this->assertEquals($expected, $actual);
    }
}

?>
