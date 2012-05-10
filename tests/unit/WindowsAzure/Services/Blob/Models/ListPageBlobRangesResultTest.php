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
 * @package   Tests\Unit\WindowsAzure\Services\Blob\Models
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
namespace Tests\Unit\WindowsAzure\Services\Blob\Models;
use WindowsAzure\Utilities;
use WindowsAzure\Services\Blob\Models\ListPageBlobRangesResult;
use WindowsAzure\Services\Blob\Models\PageRange;

/**
 * Unit tests for class ListPageBlobRangesResultTest
 *
 * @category  Microsoft
 * @package   Tests\Unit\WindowsAzure\Services\Blob\Models
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
class ListPageBlobRangesResultTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers WindowsAzure\Services\Blob\Models\ListPageBlobRangesResult::setLastModified
     * @covers WindowsAzure\Services\Blob\Models\ListPageBlobRangesResult::getLastModified
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
     * @covers WindowsAzure\Services\Blob\Models\ListPageBlobRangesResult::setEtag
     * @covers WindowsAzure\Services\Blob\Models\ListPageBlobRangesResult::getEtag
     */
    public function testSetEtag()
    {
        // Setup
        $expected = '0x8CAFB82EFF70C46';
        $result = new ListPageBlobRangesResult();
        $result->setEtag($expected);
        
        // Test
        $result->setEtag($expected);
        
        // Assert
        $this->assertEquals($expected, $result->getEtag());
    }
    
    /**
     * @covers WindowsAzure\Services\Blob\Models\ListPageBlobRangesResult::setContentLength
     * @covers WindowsAzure\Services\Blob\Models\ListPageBlobRangesResult::getContentLength
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
     * @covers WindowsAzure\Services\Blob\Models\ListPageBlobRangesResult::setPageRanges
     * @covers WindowsAzure\Services\Blob\Models\ListPageBlobRangesResult::getPageRanges
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

?>
