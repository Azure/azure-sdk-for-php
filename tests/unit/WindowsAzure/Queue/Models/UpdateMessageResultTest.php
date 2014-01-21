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
use WindowsAzure\Queue\Models\UpdateMessageResult;
use WindowsAzure\Common\Internal\Utilities;

/**
 * Unit tests for class UpdateMessageResult
 *
 * @category  Microsoft
 * @package   Tests\Unit\WindowsAzure\Queue\Models
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: 0.4.0_2014-01
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
class UpdateMessageResultTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers WindowsAzure\Queue\Models\UpdateMessageResult::getPopReceipt
     */
    public function testGetPopReceipt()
    {
        // Setup
        $updateMessageResult = new UpdateMessageResult();
        $expected = 'YzQ4Yzg1MDItYTc0Ny00OWNjLTkxYTUtZGM0MDFiZDAwYzEw';
        $updateMessageResult->setPopReceipt($expected);
        
        // Test
        $actual = $updateMessageResult->getPopReceipt();
        
        // Assert
        $this->assertEquals($expected, $actual);
    }
    
    /**
     * @covers WindowsAzure\Queue\Models\UpdateMessageResult::setPopReceipt
     */
    public function testSetPopReceipt()
    {
        // Setup
        $updateMessageResult = new UpdateMessageResult();
        $expected = 'YzQ4Yzg1MDItYTc0Ny00OWNjLTkxYTUtZGM0MDFiZDAwYzEw';
        
        // Test
        $updateMessageResult->setPopReceipt($expected);
        
        // Assert
        $actual = $updateMessageResult->getPopReceipt();
        $this->assertEquals($expected, $actual);
    }
    
    /**
     * @covers WindowsAzure\Queue\Models\UpdateMessageResult::getTimeNextVisible
     */
    public function testGetTimeNextVisible()
    {
        // Setup
        $updateMessageResult = new UpdateMessageResult();
        $expected = Utilities::rfc1123ToDateTime('Fri, 09 Oct 2009 23:29:20 GMT');
        $updateMessageResult->setTimeNextVisible($expected);
        
        // Test
        $actual = $updateMessageResult->getTimeNextVisible();
        
        // Assert
        $this->assertEquals($expected, $actual);
    }
    
    /**
     * @covers WindowsAzure\Queue\Models\UpdateMessageResult::setTimeNextVisible
     */
    public function testSetTimeNextVisible()
    {
        // Setup
        $updateMessageResult = new UpdateMessageResult();
        $expected = Utilities::rfc1123ToDateTime('Fri, 09 Oct 2009 23:29:20 GMT');
        
        // Test
        $updateMessageResult->setTimeNextVisible($expected);
        
        // Assert
        $actual = $updateMessageResult->getTimeNextVisible();
        $this->assertEquals($expected, $actual);
    }
}


