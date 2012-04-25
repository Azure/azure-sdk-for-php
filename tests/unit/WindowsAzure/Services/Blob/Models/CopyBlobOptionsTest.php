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
 * @author    Albert Cheng <gongchen at the largest software company> 
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
namespace Tests\Unit\WindowsAzure\Services\Blob\Models;
use Tests\Framework\TestResources;
use WindowsAzure\Core\WindowsAzureUtilities;
use WindowsAzure\Services\Blob\Models\CopyBlobOptions;

/**
 * Unit tests for class CopyBlobBlobOptions
 *
 * @category  Microsoft
 * @package   PEAR2\Tests\Unit\WindowsAzure\Services\Blob\Models
 * @author    Albert Cheng <gongchen at the largest software company>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
class CopyBlobOptionsTest extends \PHPUnit_Framework_TestCase
{
    /** 
     * @covers WindowsAzure\Services\Blob\Models\CopyBlobOptions::setDate
     * @covers WindowsAzure\Services\Blob\Models\CopyBlobOptions::getDate
     */
    public function testSetDate()
    {
        $copyBlobOptions = new CopyBlobOptions();
        $expected = new \DateTime("2011-09-29 23:50:26");
        
        $copyBlobOptions->setDate(($expected));
        $this->assertEquals(
            $expected,
            $copyBlobOptions->getDate()
            );  
    }
    
    /** 
     * @covers WindowsAzure\Services\Blob\Models\CopyBlobOptions::setCopySource
     * @covers WindowsAzure\Services\Blob\Models\CopyBlobOptions::getCopySource
     */
    public function testSetCopySource()
    {
        $copyBlobOptions = new CopyBlobOptions();
        $expected = "\container1\blob1";
        
        $copyBlobOptions->setCopySource($expected);
        $this->assertEquals(
            $expected,
            $copyBlobOptions->getCopySource()
            );
        
    }
    
    /** 
     * @covers WindowsAzure\Services\Blob\Models\CopyBlobOptions::setMetadata
     * @covers WindowsAzure\Services\Blob\Models\CopyBlobOptions::getMetadata
     */
    public function testSetMetadata()
    {
        $copyBlobOptions = new CopyBlobOptions();
        $expected = array('key1' => 'value1', 'key2' => 'value2');
        $copyBlobOptions->setMetadata($expected);
        
        $this->assertEquals(
            $expected,
            $copyBlobOptions->getMetadata()
            );
    }
    
    /** 
     * @covers WindowsAzure\Services\Blob\Models\CopyBlobOptions::setSourceIfModifiedSince
     * @covers WindowsAzure\Services\Blob\Models\CopyBlobOptions::getSourceIfModifiedSince
     */
    public function testSetSourceIfModifiedSince()
    {
        $copyBlobOptions = new CopyBlobOptions();
        $expected = new \DateTime("2012-1-1");
        $copyBlobOptions->setSourceIfModifiedSince($expected);
        
        $this->assertEquals(
            $expected,
            $copyBlobOptions->getSourceIfModifiedSince()
            );
        
    }
    
    /** 
     * @covers WindowsAzure\Services\Blob\Models\CopyBlobOptions::setSourceIfUnmodifiedSince
     * @covers WindowsAzure\Services\Blob\Models\CopyBlobOptions::getSourceIfUnmodifiedSince
     */
    public function testSetSourceIfUnmodifiedSince()
    {
        $copyBlobOptions = new CopyBlobOptions();
        $expected = new \DateTime("2012-1-1");
        $copyBlobOptions->setSourceIfUnmodifiedSince($expected);
        
        $this->assertEquals(
            $expected,
            $copyBlobOptions->getSourceIfUnmodifiedSince()
            );
    }
    
    /** 
     * @covers WindowsAzure\Services\Blob\Models\CopyBlobOptions::setSourceIfMatch
     * @covers WindowsAzure\Services\Blob\Models\CopyBlobOptions::getSourceIfMatch
     */
    public function testSetSourceIfMatch()
    {
        $copyBlobOptions = new CopyBlobOptions();
        $expected = "123456789" ;
        
        $copyBlobOptions->setSourceIfMatch($expected);
        $this->assertEquals(
            $expected,
            $copyBlobOptions->getSourceIfMatch()
            );
    }
    
    /** 
     * @covers WindowsAzure\Services\Blob\Models\CopyBlobOptions::setSourceIfNoneMatch
     * @covers WindowsAzure\Services\Blob\Models\CopyBlobOptions::getSourceIfNoneMatch
     */
    public function testSetSourceIfNoneMatch()
    {
        $copyBlobOptions = new CopyBlobOptions();
        $expected = "123456789" ;
        
        $copyBlobOptions->setSourceIfNoneMatch($expected);
        $this->assertEquals(
            $expected,
            $copyBlobOptions->getSourceIfNoneMatch()
            );
    }
    
    /** 
     * @covers WindowsAzure\Services\Blob\Models\CopyBlobOptions::setIfModifiedSince
     * @covers WindowsAzure\Services\Blob\Models\CopyBlobOptions::getIfModifiedSince
     */
    public function testSetIfModifiedSince()
    {
        $copyBlobOptions = new CopyBlobOptions();
        $expected = new \DateTime("2012-1-1");
        $copyBlobOptions->setIfModifiedSince($expected);
        
        $this->assertEquals(
            $expected,
            $copyBlobOptions->getIfModifiedSince()
            );
    }
    
    /** 
     * @covers WindowsAzure\Services\Blob\Models\CopyBlobOptions::setIfUnmodifiedSince
     * @covers WindowsAzure\Services\Blob\Models\CopyBlobOptions::getIfUnmodifiedSince
     */
    public function testSetIfUnmodifiedSince()
    {
        $copyBlobOptions = new CopyBlobOptions();
        $expected = new \DateTime("2012-1-1");
        $copyBlobOptions->setIfUnmodifiedSince($expected);
        
        $this->assertEquals(
            $expected,
            $copyBlobOptions->getIfUnmodifiedSince()
            );
    }
    
    /** 
     * @covers WindowsAzure\Services\Blob\Models\CopyBlobOptions::setIfMatch
     * @covers WindowsAzure\Services\Blob\Models\CopyBlobOptions::getIfMatch
     */
    public function testSetIfMatch()
    {
        $copyBlobOptions = new CopyBlobOptions();
        $expected = "123456789" ;
        
        $copyBlobOptions->setIfMatch($expected);
        $this->assertEquals(
            $expected,
            $copyBlobOptions->getIfMatch()
            );
    }
    
    /** 
     * @covers WindowsAzure\Services\Blob\Models\CopyBlobOptions::setIfNoneMatch
     * @covers WindowsAzure\Services\Blob\Models\CopyBlobOptions::getIfNoneMatch
     */
    public function testSetIfNoneMatch()
    {
        $copyBlobOptions = new CopyBlobOptions();
        $expected = "123456789" ;
        
        $copyBlobOptions->setIfNoneMatch($expected);
        $this->assertEquals(
            $expected,
            $copyBlobOptions->getIfNoneMatch()
            );
    }

    /** 
     * @covers WindowsAzure\Services\Blob\Models\CopyBlobOptions::setLeaseId
     * @covers WindowsAzure\Services\Blob\Models\CopyBlobOptions::getLeaseId
     */
    public function testSetLeaseId()
    {
        $expected = '0x8CAFB82EFF70C46';
        $options = new CopyBlobOptions();
        
        $options->setLeaseId($expected);
        $this->assertEquals($expected, $options->getLeaseId());
    }
    
    /** 
     * @covers WindowsAzure\Services\Blob\Models\CopyBlobOptions::setSourceLeaseId
     * @covers WindowsAzure\Services\Blob\Models\CopyBlobOptions::getSourceLeaseId
     */
    public function testSetSourceLeaseId()
    {
        $expected = '0x8CAFB82EFF70C46';
        $options = new CopyBlobOptions();
        
        $options->setSourceLeaseId($expected);
        $this->assertEquals($expected, $options->getSourceLeaseId());
    }
}
?>
