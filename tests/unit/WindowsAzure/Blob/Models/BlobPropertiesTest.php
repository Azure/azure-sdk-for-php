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
use Tests\Framework\TestResources;
use WindowsAzure\Blob\Models\BlobProperties;
use WindowsAzure\Common\Internal\Utilities;

/**
 * Unit tests for class BlobProperties
 *
 * @category  Microsoft
 * @package   Tests\Unit\WindowsAzure\Blob\Models
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: 0.4.0_2014-01
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
class BlobPropertiesTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers WindowsAzure\Blob\Models\BlobProperties::create
     */
    public function testCreate()
    {
        // Setup
        $sample = TestResources::listBlobsOneEntry();
        $expected = $sample['Blobs']['Blob']['Properties'];
        $expectedDate = Utilities::rfc1123ToDateTime($expected['Last-Modified']);
        
        // Test
        $actual = BlobProperties::create($expected);
        
        // Assert
        $this->assertEquals($expectedDate, $actual->getLastModified());
        $this->assertEquals($expected['Etag'], $actual->getETag());
        $this->assertEquals(intval($expected['Content-Length']), $actual->getContentLength());
        $this->assertEquals($expected['Content-Type'], $actual->getContentType());
        $this->assertEquals($expected['Content-Encoding'], $actual->getContentEncoding());
        $this->assertEquals($expected['Content-Language'], $actual->getContentLanguage());
        $this->assertEquals($expected['Content-MD5'], $actual->getContentMD5());
        $this->assertEquals($expected['Cache-Control'], $actual->getCacheControl());
        $this->assertEquals(intval($expected['x-ms-blob-sequence-number']), $actual->getSequenceNumber());
        $this->assertEquals($expected['BlobType'], $actual->getBlobType());
        $this->assertEquals($expected['LeaseStatus'], $actual->getLeaseStatus());
    }
    
    /**
     * @covers WindowsAzure\Blob\Models\BlobProperties::setLastModified
     * @covers WindowsAzure\Blob\Models\BlobProperties::getLastModified
     */
    public function testSetLastModified()
    {
        // Setup
        $expected = Utilities::rfc1123ToDateTime('Sun, 25 Sep 2011 19:42:18 GMT');
        $properties = new BlobProperties();
        $properties->setLastModified($expected);
        
        // Test
        $properties->setLastModified($expected);
        
        // Assert
        $this->assertEquals($expected, $properties->getLastModified());
    }
    
    /**
     * @covers WindowsAzure\Blob\Models\BlobProperties::setETag
     * @covers WindowsAzure\Blob\Models\BlobProperties::getETag
     */
    public function testSetETag()
    {
        // Setup
        $expected = '0x8CAFB82EFF70C46';
        $properties = new BlobProperties();
        $properties->setETag($expected);
        
        // Test
        $properties->setETag($expected);
        
        // Assert
        $this->assertEquals($expected, $properties->getETag());
    }
    
    /**
     * @covers WindowsAzure\Blob\Models\BlobProperties::setContentRange
     * @covers WindowsAzure\Blob\Models\BlobProperties::getContentRange
     */
    public function testSetContentRange()
    {
        // Setup
        $expected = '0x8CAFB82EFF70C46';
        $properties = new BlobProperties();
        $properties->setContentRange($expected);
        
        // Test
        $properties->setContentRange($expected);
        
        // Assert
        $this->assertEquals($expected, $properties->getContentRange());
    }
    
    /**
     * @covers WindowsAzure\Blob\Models\BlobProperties::setContentType
     * @covers WindowsAzure\Blob\Models\BlobProperties::getContentType
     */
    public function testSetContentType()
    {
        // Setup
        $expected = '0x8CAFB82EFF70C46';
        $properties = new BlobProperties();
        $properties->setContentType($expected);
        
        // Test
        $properties->setContentType($expected);
        
        // Assert
        $this->assertEquals($expected, $properties->getContentType());
    }
    
    /**
     * @covers WindowsAzure\Blob\Models\BlobProperties::setContentLength
     * @covers WindowsAzure\Blob\Models\BlobProperties::getContentLength
     */
    public function testSetContentLength()
    {
        // Setup
        $expected = 100;
        $properties = new BlobProperties();
        $properties->setContentLength($expected);
        
        // Test
        $properties->setContentLength($expected);
        
        // Assert
        $this->assertEquals($expected, $properties->getContentLength());
    }
    
    /**
     * @covers WindowsAzure\Blob\Models\BlobProperties::setContentEncoding
     * @covers WindowsAzure\Blob\Models\BlobProperties::getContentEncoding
     */
    public function testSetContentEncoding()
    {
        // Setup
        $expected = '0x8CAFB82EFF70C46';
        $properties = new BlobProperties();
        $properties->setContentEncoding($expected);
        
        // Test
        $properties->setContentEncoding($expected);
        
        // Assert
        $this->assertEquals($expected, $properties->getContentEncoding());
    }
    
    /**
     * @covers WindowsAzure\Blob\Models\BlobProperties::setContentLanguage
     * @covers WindowsAzure\Blob\Models\BlobProperties::getContentLanguage
     */
    public function testSetContentLanguage()
    {
        // Setup
        $expected = '0x8CAFB82EFF70C46';
        $properties = new BlobProperties();
        $properties->setContentLanguage($expected);
        
        // Test
        $properties->setContentLanguage($expected);
        
        // Assert
        $this->assertEquals($expected, $properties->getContentLanguage());
    }
    
    /**
     * @covers WindowsAzure\Blob\Models\BlobProperties::setContentMD5
     * @covers WindowsAzure\Blob\Models\BlobProperties::getContentMD5
     */
    public function testSetContentMD5()
    {
        // Setup
        $expected = '0x8CAFB82EFF70C46';
        $properties = new BlobProperties();
        $properties->setContentMD5($expected);
        
        // Test
        $properties->setContentMD5($expected);
        
        // Assert
        $this->assertEquals($expected, $properties->getContentMD5());
    }
    
    /**
     * @covers WindowsAzure\Blob\Models\BlobProperties::setCacheControl
     * @covers WindowsAzure\Blob\Models\BlobProperties::getCacheControl
     */
    public function testSetCacheControl()
    {
        // Setup
        $expected = '0x8CAFB82EFF70C46';
        $properties = new BlobProperties();
        $properties->setCacheControl($expected);
        
        // Test
        $properties->setCacheControl($expected);
        
        // Assert
        $this->assertEquals($expected, $properties->getCacheControl());
    }
    
    /**
     * @covers WindowsAzure\Blob\Models\BlobProperties::setBlobType
     * @covers WindowsAzure\Blob\Models\BlobProperties::getBlobType
     */
    public function testSetBlobType()
    {
        // Setup
        $expected = '0x8CAFB82EFF70C46';
        $properties = new BlobProperties();
        $properties->setBlobType($expected);
        
        // Test
        $properties->setBlobType($expected);
        
        // Assert
        $this->assertEquals($expected, $properties->getblobType());
    }
    
    /**
     * @covers WindowsAzure\Blob\Models\BlobProperties::setLeaseStatus
     * @covers WindowsAzure\Blob\Models\BlobProperties::getLeaseStatus
     */
    public function testSetLeaseStatus()
    {
        // Setup
        $expected = '0x8CAFB82EFF70C46';
        $properties = new BlobProperties();
        $properties->setLeaseStatus($expected);
        
        // Test
        $properties->setLeaseStatus($expected);
        
        // Assert
        $this->assertEquals($expected, $properties->getLeaseStatus());
    }
    
    /**
     * @covers WindowsAzure\Blob\Models\BlobProperties::setSequenceNumber
     * @covers WindowsAzure\Blob\Models\BlobProperties::getSequenceNumber
     */
    public function testSetSequenceNumber()
    {
        // Setup
        $expected = 123;
        $properties = new BlobProperties();
        $properties->setSequenceNumber($expected);
        
        // Test
        $properties->setSequenceNumber($expected);
        
        // Assert
        $this->assertEquals($expected, $properties->getSequenceNumber());
    }
}


