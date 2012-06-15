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
 * @package   Tests\Unit\WindowsAzure\ServiceBus\Models
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */

namespace Tests\Unit\WindowsAzure\ServiceBus\Models;
use WindowsAzure\ServiceBus\Models\BrokeredMessage;
use WindowsAzure\ServiceBus\Models\BrokerProperties;

/**
 * Unit tests for class brokered message. 
 *
 * @category  Microsoft
 * @package   Tests\Unit\WindowsAzure\ServiceBus\Models
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
class BrokeredMessageTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers WindowsAzure\ServiceBus\Models\BrokeredMessage::__construct
     */
    public function testBrokeredMessageConstructor()
    {
        // Setup
        $message = 'testMessage';        
        // Test
        $brokeredMessage = new Brokeredmessage($message);
        
        // Assert
        $this->assertNotNull($brokeredMessage);
    }

    /**
     * @covers WindowsAzure\ServiceBus\Models\BrokeredMessage::getBrokerProperties
     */
    public function testBrokeredMessageConstructorWithMessage()
    {
        // Setup
        $expected = 'testMessage';
        
        // Test
        $brokeredMessage = new BrokeredMessage($expected);
        $actual = $brokeredMessage->getBody();
        
        // Assert
        $this->assertEquals(
            $expected,
            $actual
        );
    }

    /** 
     * @covers WindowsAzure\ServiceBus\Models\BrokeredMessage::getBrokerProperties
     * @covers WindowsAzure\ServiceBus\Models\BrokeredMessage::setBrokerProperties
     */
    public function testGetSetBrokerProperties() {
        // Setup
        $expected = new BrokerProperties();
        $brokeredMessage = new BrokeredMessage();

        // Test
        $brokeredMessage->setBrokerProperties($expected);
        $actual = $brokeredMessage->getBrokerProperties();

        // Assert 
        $this->assertEquals(
            $expected,
            $actual
        );

    }


    /** 
     * @covers WindowsAzure\ServiceBus\Models\BrokeredMessage::getBody
     * @covers WindowsAzure\ServiceBus\Models\BrokeredMessage::setBody
     */
    public function testGetSetBody() {
        // Setup
        $expected = 'testBody';
        $brokeredMessage = new BrokeredMessage();

        // Test
        $brokeredMessage->setBody($expected);
        $actual = $brokeredMessage->getBody();

        // Assert 
        $this->assertEquals(
            $expected,
            $actual
        );

    }


    /** 
     * @covers WindowsAzure\ServiceBus\Models\BrokeredMessage::getContentType
     * @covers WindowsAzure\ServiceBus\Models\BrokeredMessage::setContentType
     */
    public function testGetSetContentType() {
        // Setup
        $expected = 'testContentType';
        $brokeredMessage = new BrokeredMessage();

        // Test
        $brokeredMessage->setContentType($expected);
        $actual = $brokeredMessage->getContentType();

        // Assert 
        $this->assertEquals(
            $expected,
            $actual
        );

    }


    /** 
     * @covers WindowsAzure\ServiceBus\Models\BrokeredMessage::getDate
     * @covers WindowsAzure\ServiceBus\Models\BrokeredMessage::setDate
     */
    public function testGetSetDate() {
        // Setup
        $expected = 'testDate';
        $brokeredMessage = new BrokeredMessage();

        // Test
        $brokeredMessage->setDate($expected);
        $actual = $brokeredMessage->getDate();

        // Assert 
        $this->assertEquals(
            $expected,
            $actual
        );

    }


    /** 
     * @covers WindowsAzure\ServiceBus\Models\BrokeredMessage::getProperties
     * @covers WindowsAzure\ServiceBus\Models\BrokeredMessage::setProperty
     */
    public function testGetSetCustomProperties() {
        // Setup
        $expected = 'testCustomPropertyValue';
        $testCustomPropertyKey = 'testCustomPropertyKey';
        $brokeredMessage = new BrokeredMessage();

        // Test
        $brokeredMessage->setProperty($testCustomPropertyKey, $expected);
        $customProperties = $brokeredMessage->getProperties();
        $actual = $customProperties[$testCustomPropertyKey];

        // Assert 
        $this->assertEquals(
            $expected,
            $actual
        );

    }


}

?>
