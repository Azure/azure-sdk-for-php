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
use WindowsAzure\Blob\Models\SetBlobPropertiesResult;
use WindowsAzure\Common\Internal\Utilities;

/**
 * Unit tests for class SetBlobPropertiesResult
 *
 * @category  Microsoft
 * @package   Tests\Unit\WindowsAzure\Blob\Models
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: 0.4.0_2014-01
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
class SetBlobPropertiesResultTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers WindowsAzure\Blob\Models\SetBlobPropertiesResult::setLastModified
     * @covers WindowsAzure\Blob\Models\SetBlobPropertiesResult::getLastModified
     */
    public function testSetLastModified()
    {
        // Setup
        $expected = Utilities::rfc1123ToDateTime('Sun, 25 Sep 2011 19:42:18 GMT');
        $prooperties = new SetBlobPropertiesResult();
        $prooperties->setLastModified($expected);
        
        // Test
        $prooperties->setLastModified($expected);
        
        // Assert
        $this->assertEquals($expected, $prooperties->getLastModified());
    }
    
    /**
     * @covers WindowsAzure\Blob\Models\SetBlobPropertiesResult::setETag
     * @covers WindowsAzure\Blob\Models\SetBlobPropertiesResult::getETag
     */
    public function testSetETag()
    {
        // Setup
        $expected = '0x8CAFB82EFF70C46';
        $prooperties = new SetBlobPropertiesResult();
        $prooperties->setETag($expected);
        
        // Test
        $prooperties->setETag($expected);
        
        // Assert
        $this->assertEquals($expected, $prooperties->getETag());
    }
    
    /**
     * @covers WindowsAzure\Blob\Models\SetBlobPropertiesResult::setSequenceNumber
     * @covers WindowsAzure\Blob\Models\SetBlobPropertiesResult::getSequenceNumber
     */
    public function testSetSequenceNumber()
    {
        // Setup
        $expected = 123;
        $prooperties = new SetBlobPropertiesResult();
        $prooperties->setSequenceNumber($expected);
        
        // Test
        $prooperties->setSequenceNumber($expected);
        
        // Assert
        $this->assertEquals($expected, $prooperties->getSequenceNumber());
    }
}


