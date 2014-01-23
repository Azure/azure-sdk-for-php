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
use WindowsAzure\Blob\Models\ListBlobBlocksResult;
use WindowsAzure\Common\Internal\Utilities;

/**
 * Unit tests for class ListBlobBlocksResult
 *
 * @category  Microsoft
 * @package   Tests\Unit\WindowsAzure\Blob\Models
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: 0.4.0_2014-01
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
class ListBlobBlocksResultTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers WindowsAzure\Blob\Models\ListBlobBlocksResult::setLastModified
     * @covers WindowsAzure\Blob\Models\ListBlobBlocksResult::getLastModified
     */
    public function testSetLastModified()
    {
        // Setup
        $expected = Utilities::rfc1123ToDateTime('Sun, 25 Sep 2011 19:42:18 GMT');
        $result = new ListBlobBlocksResult();
        $result->setLastModified($expected);
        
        // Test
        $result->setLastModified($expected);
        
        // Assert
        $this->assertEquals($expected, $result->getLastModified());
    }
    
    /**
     * @covers WindowsAzure\Blob\Models\ListBlobBlocksResult::setETag
     * @covers WindowsAzure\Blob\Models\ListBlobBlocksResult::getETag
     */
    public function testSetETag()
    {
        // Setup
        $expected = '0x8CAFB82EFF70C46';
        $result = new ListBlobBlocksResult();
        $result->setETag($expected);
        
        // Test
        $result->setETag($expected);
        
        // Assert
        $this->assertEquals($expected, $result->getETag());
    }
    
    /**
     * @covers WindowsAzure\Blob\Models\ListBlobBlocksResult::setContentType
     * @covers WindowsAzure\Blob\Models\ListBlobBlocksResult::getContentType
     */
    public function testSetContentType()
    {
        // Setup
        $expected = '0x8CAFB82EFF70C46';
        $result = new ListBlobBlocksResult();
        $result->setContentType($expected);
        
        // Test
        $result->setContentType($expected);
        
        // Assert
        $this->assertEquals($expected, $result->getContentType());
    }
    
    /**
     * @covers WindowsAzure\Blob\Models\ListBlobBlocksResult::setContentLength
     * @covers WindowsAzure\Blob\Models\ListBlobBlocksResult::getContentLength
     */
    public function testSetContentLength()
    {
        // Setup
        $expected = 100;
        $result = new ListBlobBlocksResult();
        $result->setContentLength($expected);
        
        // Test
        $result->setContentLength($expected);
        
        // Assert
        $this->assertEquals($expected, $result->getContentLength());
    }
    
    /**
     * @covers WindowsAzure\Blob\Models\ListBlobBlocksResult::setUncommittedBlocks
     * @covers WindowsAzure\Blob\Models\ListBlobBlocksResult::getUncommittedBlocks
     */
    public function testSetUncommittedBlocks()
    {
        // Setup
        $result = new ListBlobBlocksResult();
        $expected = array('Block1' => 10, 'Block2' => 20, 'Block3' => 30);
        
        // Test
        $result->setUncommittedBlocks($expected);
        
        // Assert
        $this->assertEquals($expected, $result->getUncommittedBlocks());
    }
    
    /**
     * @covers WindowsAzure\Blob\Models\ListBlobBlocksResult::setCommittedBlocks
     * @covers WindowsAzure\Blob\Models\ListBlobBlocksResult::getCommittedBlocks
     */
    public function testSetCommittedBlocks()
    {
        // Setup
        $result = new ListBlobBlocksResult();
        $expected = array('Block1' => 10, 'Block2' => 20, 'Block3' => 30);
        
        // Test
        $result->setCommittedBlocks($expected);
        
        // Assert
        $this->assertEquals($expected, $result->getCommittedBlocks());
    }
}


