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
 * @package   PEAR2\Tests\Unit\WindowsAzure\Services\Blob\Models
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
namespace PEAR2\Tests\Unit\WindowsAzure\Services\Blob\Models;
use PEAR2\Tests\Framework\TestResources;
use PEAR2\WindowsAzure\Core\WindowsAzureUtilities;
use PEAR2\WindowsAzure\Services\Blob\Models\CreateBlobPagesResult;


/**
 * Unit tests for class CreateBlobPagesResult
 *
 * @category  Microsoft
 * @package   PEAR2\Tests\Unit\WindowsAzure\Services\Blob\Models
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
class CreateBlobPagesResultTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers PEAR2\WindowsAzure\Services\Blob\Models\CreateBlobPagesResult::create
     */
    public function testCreate()
    {
        // Setup
        $sample = TestResources::listBlobsOneEntry();
        $expected = $sample['Blobs']['Blob']['Properties'];
        $expectedDate = WindowsAzureUtilities::rfc1123ToDateTime($expected['Last-Modified']);
        
        // Test
        $actual = CreateBlobPagesResult::create($expected);
        
        // Assert
        $this->assertEquals($expectedDate, $actual->getLastModified());
        $this->assertEquals($expected['Etag'], $actual->getEtag());
        $this->assertEquals($expected['Content-MD5'], $actual->getContentMD5());
        $this->assertEquals(intval($expected['x-ms-blob-sequence-number']), $actual->getSequenceNumber());
    }
    
    /**
     * @covers PEAR2\WindowsAzure\Services\Blob\Models\CreateBlobPagesResult::setLastModified
     * @covers PEAR2\WindowsAzure\Services\Blob\Models\CreateBlobPagesResult::getLastModified
     */
    public function testSetLastModified()
    {
        // Setup
        $expected = WindowsAzureUtilities::rfc1123ToDateTime('Sun, 25 Sep 2011 19:42:18 GMT');
        $options = new CreateBlobPagesResult();
        $options->setLastModified($expected);
        
        // Test
        $options->setLastModified($expected);
        
        // Assert
        $this->assertEquals($expected, $options->getLastModified());
    }
    
    /**
     * @covers PEAR2\WindowsAzure\Services\Blob\Models\CreateBlobPagesResult::setEtag
     * @covers PEAR2\WindowsAzure\Services\Blob\Models\CreateBlobPagesResult::getEtag
     */
    public function testSetEtag()
    {
        // Setup
        $expected = '0x8CAFB82EFF70C46';
        $options = new CreateBlobPagesResult();
        $options->setEtag($expected);
        
        // Test
        $options->setEtag($expected);
        
        // Assert
        $this->assertEquals($expected, $options->getEtag());
    }
    
    /**
     * @covers PEAR2\WindowsAzure\Services\Blob\Models\CreateBlobPagesResult::setContentMD5
     * @covers PEAR2\WindowsAzure\Services\Blob\Models\CreateBlobPagesResult::getContentMD5
     */
    public function testSetContentMD5()
    {
        // Setup
        $expected = '0x8CAFB82EFF70C46';
        $options = new CreateBlobPagesResult();
        $options->setContentMD5($expected);
        
        // Test
        $options->setContentMD5($expected);
        
        // Assert
        $this->assertEquals($expected, $options->getContentMD5());
    }
    
    /**
     * @covers PEAR2\WindowsAzure\Services\Blob\Models\CreateBlobPagesResult::setSequenceNumber
     * @covers PEAR2\WindowsAzure\Services\Blob\Models\CreateBlobPagesResult::getSequenceNumber
     */
    public function testSetSequenceNumber()
    {
        // Setup
        $expected = 123;
        $options = new CreateBlobPagesResult();
        $options->setSequenceNumber($expected);
        
        // Test
        $options->setSequenceNumber($expected);
        
        // Assert
        $this->assertEquals($expected, $options->getSequenceNumber());
    }
}

?>
