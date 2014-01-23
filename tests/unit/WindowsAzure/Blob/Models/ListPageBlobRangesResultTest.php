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
use WindowsAzure\Common\Internal\Utilities;
use WindowsAzure\Blob\Models\ListPageBlobRangesResult;
use WindowsAzure\Blob\Models\PageRange;

/**
 * Unit tests for class ListPageBlobRangesResultTest
 *
 * @category  Microsoft
 * @package   Tests\Unit\WindowsAzure\Blob\Models
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: 0.4.0_2014-01
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
class ListPageBlobRangesResultTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers WindowsAzure\Blob\Models\ListPageBlobRangesResult::setLastModified
     * @covers WindowsAzure\Blob\Models\ListPageBlobRangesResult::getLastModified
     */
    public function testSetLastModified()
    {
        // Setup
        $expected = Utilities::rfc1123ToDateTime('Sun, 25 Sep 2011 19:42:18 GMT');
        $result = new ListPageBlobRangesResult();
        $result->setLastModified($expected);
        
        // Test
        $result->setLastModified($expected);
        
        // Assert
        $this->assertEquals($expected, $result->getLastModified());
    }
    
    /**
     * @covers WindowsAzure\Blob\Models\ListPageBlobRangesResult::setETag
     * @covers WindowsAzure\Blob\Models\ListPageBlobRangesResult::getETag
     */
    public function testSetETag()
    {
        // Setup
        $expected = '0x8CAFB82EFF70C46';
        $result = new ListPageBlobRangesResult();
        $result->setETag($expected);
        
        // Test
        $result->setETag($expected);
        
        // Assert
        $this->assertEquals($expected, $result->getETag());
    }
    
    /**
     * @covers WindowsAzure\Blob\Models\ListPageBlobRangesResult::setContentLength
     * @covers WindowsAzure\Blob\Models\ListPageBlobRangesResult::getContentLength
     */
    public function testSetContentLength()
    {
        // Setup
        $expected = 100;
        $result = new ListPageBlobRangesResult();
        $result->setContentLength($expected);
        
        // Test
        $result->setContentLength($expected);
        
        // Assert
        $this->assertEquals($expected, $result->getContentLength());
    }
    
    /**
     * @covers WindowsAzure\Blob\Models\ListPageBlobRangesResult::setPageRanges
     * @covers WindowsAzure\Blob\Models\ListPageBlobRangesResult::getPageRanges
     */
    public function testSetPageRanges()
    {
        // Setup
        $expected = array(0 => new PageRange(0, 10), 1 => new PageRange(20, 40));
        $result = new ListPageBlobRangesResult();
        
        // Test
        $result->setPageRanges($expected);
        
        // Assert
        $this->assertEquals($expected, $result->getPageRanges());
    }
}


