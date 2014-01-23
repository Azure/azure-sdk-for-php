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
use WindowsAzure\Common\Internal\Utilities;
use WindowsAzure\Queue\Models\QueueMessage;
use WindowsAzure\Common\Internal\Serialization\XmlSerializer;

/**
 * Unit tests for class QueueMessage
 *
 * @category  Microsoft
 * @package   Tests\Unit\WindowsAzure\Queue\Models
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: 0.4.0_2014-01
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
class QueueMessageTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers WindowsAzure\Queue\Models\QueueMessage::getMessageText
     */
    public function testGetMessageText()
    {
        // Setup
        $queueMessage = new QueueMessage();
        $expected = 'this is message text';
        $queueMessage->setMessageText($expected);
        
        // Test
        $actual = $queueMessage->getMessageText();
        
        // Assert
        $this->assertEquals($expected, $actual);
    }
    
    /**
     * @covers WindowsAzure\Queue\Models\QueueMessage::setMessageText
     */
    public function testSetMessageText()
    {
        // Setup
        $queueMessage = new QueueMessage();
        $expected = 'this is message text';
        
        // Test
        $queueMessage->setMessageText($expected);
        
        // Assert
        $actual = $queueMessage->getMessageText();
        $this->assertEquals($expected, $actual);
    }
    
    /**
     * @covers WindowsAzure\Queue\Models\QueueMessage::toXml
     */
    public function testToXml()
    {
        // Setup
        $queueMessage = new QueueMessage();
        $messageText = 'this is message text';
        $array = array('MessageText' => $messageText);
        $queueMessage->setMessageText($messageText);
        $xmlSerializer = new XmlSerializer();
        $properties = array(XmlSerializer::ROOT_NAME => QueueMessage::$xmlRootName);
        $expected = $xmlSerializer->serialize($array, $properties);
        
        // Test
        $actual = $queueMessage->toXml($xmlSerializer);
        
        // Assert
        $this->assertEquals($expected, $actual);
    }
}


