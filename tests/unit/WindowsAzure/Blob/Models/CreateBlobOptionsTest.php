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
use WindowsAzure\Common\Internal\Utilities;
use WindowsAzure\Blob\Models\CreateBlobOptions;
use WindowsAzure\Blob\Models\AccessCondition;

/**
 * Unit tests for class CreateBlobOptions
 *
 * @category  Microsoft
 * @package   Tests\Unit\WindowsAzure\Blob\Models
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: 0.4.0_2014-01
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
class CreateBlobOptionsTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers WindowsAzure\Blob\Models\CreateBlobOptions::setContentType
     * @covers WindowsAzure\Blob\Models\CreateBlobOptions::getContentType
     */
    public function testSetContentType()
    {
        // Setup
        $expected = '0x8CAFB82EFF70C46';
        $options = new CreateBlobOptions();
        $options->setContentType($expected);
        
        // Test
        $options->setContentType($expected);
        
        // Assert
        $this->assertEquals($expected, $options->getContentType());
    }
    
    /**
     * @covers WindowsAzure\Blob\Models\CreateBlobOptions::setContentEncoding
     * @covers WindowsAzure\Blob\Models\CreateBlobOptions::getContentEncoding
     */
    public function testSetContentEncoding()
    {
        // Setup
        $expected = '0x8CAFB82EFF70C46';
        $options = new CreateBlobOptions();
        $options->setContentEncoding($expected);
        
        // Test
        $options->setContentEncoding($expected);
        
        // Assert
        $this->assertEquals($expected, $options->getContentEncoding());
    }
    
    /**
     * @covers WindowsAzure\Blob\Models\CreateBlobOptions::setContentLanguage
     * @covers WindowsAzure\Blob\Models\CreateBlobOptions::getContentLanguage
     */
    public function testSetContentLanguage()
    {
        // Setup
        $expected = '0x8CAFB82EFF70C46';
        $options = new CreateBlobOptions();
        $options->setContentLanguage($expected);
        
        // Test
        $options->setContentLanguage($expected);
        
        // Assert
        $this->assertEquals($expected, $options->getContentLanguage());
    }
    
    /**
     * @covers WindowsAzure\Blob\Models\CreateBlobOptions::setContentMD5
     * @covers WindowsAzure\Blob\Models\CreateBlobOptions::getContentMD5
     */
    public function testSetContentMD5()
    {
        // Setup
        $expected = '0x8CAFB82EFF70C46';
        $options = new CreateBlobOptions();
        $options->setContentMD5($expected);
        
        // Test
        $options->setContentMD5($expected);
        
        // Assert
        $this->assertEquals($expected, $options->getContentMD5());
    }
    
    /**
     * @covers WindowsAzure\Blob\Models\CreateBlobOptions::setCacheControl
     * @covers WindowsAzure\Blob\Models\CreateBlobOptions::getCacheControl
     */
    public function testSetCacheControl()
    {
        // Setup
        $expected = '0x8CAFB82EFF70C46';
        $options = new CreateBlobOptions();
        $options->setCacheControl($expected);
        
        // Test
        $options->setCacheControl($expected);
        
        // Assert
        $this->assertEquals($expected, $options->getCacheControl());
    }
    
    /**
     * @covers WindowsAzure\Blob\Models\CreateBlobOptions::setBlobContentType
     * @covers WindowsAzure\Blob\Models\CreateBlobOptions::getBlobContentType
     */
    public function testSetBlobContentType()
    {
        // Setup
        $expected = '0x8CAFB82EFF70C46';
        $options = new CreateBlobOptions();
        $options->setBlobContentType($expected);
        
        // Test
        $options->setBlobContentType($expected);
        
        // Assert
        $this->assertEquals($expected, $options->getBlobContentType());
    }
    
    /**
     * @covers WindowsAzure\Blob\Models\CreateBlobOptions::setBlobContentEncoding
     * @covers WindowsAzure\Blob\Models\CreateBlobOptions::getBlobContentEncoding
     */
    public function testSetBlobContentEncoding()
    {
        // Setup
        $expected = '0x8CAFB82EFF70C46';
        $options = new CreateBlobOptions();
        $options->setBlobContentEncoding($expected);
        
        // Test
        $options->setBlobContentEncoding($expected);
        
        // Assert
        $this->assertEquals($expected, $options->getBlobContentEncoding());
    }
    
    /**
     * @covers WindowsAzure\Blob\Models\CreateBlobOptions::setBlobContentLanguage
     * @covers WindowsAzure\Blob\Models\CreateBlobOptions::getBlobContentLanguage
     */
    public function testSetBlobContentLanguage()
    {
        // Setup
        $expected = '0x8CAFB82EFF70C46';
        $options = new CreateBlobOptions();
        $options->setBlobContentLanguage($expected);
        
        // Test
        $options->setBlobContentLanguage($expected);
        
        // Assert
        $this->assertEquals($expected, $options->getBlobContentLanguage());
    }
    
    /**
     * @covers WindowsAzure\Blob\Models\CreateBlobOptions::setBlobContentMD5
     * @covers WindowsAzure\Blob\Models\CreateBlobOptions::getBlobContentMD5
     */
    public function testSetBlobContentMD5()
    {
        // Setup
        $expected = '0x8CAFB82EFF70C46';
        $options = new CreateBlobOptions();
        $options->setBlobContentMD5($expected);
        
        // Test
        $options->setBlobContentMD5($expected);
        
        // Assert
        $this->assertEquals($expected, $options->getBlobContentMD5());
    }
    
    /**
     * @covers WindowsAzure\Blob\Models\CreateBlobOptions::setBlobCacheControl
     * @covers WindowsAzure\Blob\Models\CreateBlobOptions::getBlobCacheControl
     */
    public function testSetBlobCacheControl()
    {
        // Setup
        $expected = '0x8CAFB82EFF70C46';
        $options = new CreateBlobOptions();
        $options->setBlobCacheControl($expected);
        
        // Test
        $options->setBlobCacheControl($expected);
        
        // Assert
        $this->assertEquals($expected, $options->getBlobCacheControl());
    }
    
    /**
     * @covers WindowsAzure\Blob\Models\CreateBlobOptions::setLeaseId
     * @covers WindowsAzure\Blob\Models\CreateBlobOptions::getLeaseId
     */
    public function testSetLeaseId()
    {
        // Setup
        $expected = '0x8CAFB82EFF70C46';
        $options = new CreateBlobOptions();
        $options->setLeaseId($expected);
        
        // Test
        $options->setLeaseId($expected);
        
        // Assert
        $this->assertEquals($expected, $options->getLeaseId());
    }

    /**
     * @covers WindowsAzure\Blob\Models\CreateBlobOptions::setSequenceNumber
     * @covers WindowsAzure\Blob\Models\CreateBlobOptions::getSequenceNumber
     */
    public function testSetSequenceNumber()
    {
        // Setup
        $expected = 123;
        $options = new CreateBlobOptions();
        $options->setSequenceNumber($expected);
        
        // Test
        $options->setSequenceNumber($expected);
        
        // Assert
        $this->assertEquals($expected, $options->getSequenceNumber());
    }
    
    /**
     * @covers WindowsAzure\Blob\Models\CreateBlobOptions::setMetadata
     */
    public function testSetMetadata()
    {
        // Setup
        $container = new CreateBlobOptions();
        $expected = array('key1' => 'value1', 'key2' => 'value2');
        
        // Test
        $container->setMetadata($expected);
        
        // Assert
        $this->assertEquals($expected, $container->getMetadata());
    }
    
    /**
     * @covers WindowsAzure\Blob\Models\CreateBlobOptions::getMetadata
     */
    public function testGetMetadata()
    {
        // Setup
        $container = new CreateBlobOptions();
        $expected = array('key1' => 'value1', 'key2' => 'value2');
        $container->setMetadata($expected);
        
        // Test
        $actual = $container->getMetadata();
        
        // Assert
        $this->assertEquals($expected, $actual);
    }
    
    /**
     * @covers WindowsAzure\Blob\Models\CreateBlobOptions::getAccessCondition
     */
    public function testGetAccessCondition()
    {
        // Setup
        $expected = AccessCondition::none();
        $result = new CreateBlobOptions();
        $result->setAccessCondition($expected);
        
        // Test
        $actual = $result->getAccessCondition();
        
        // Assert
        $this->assertEquals($expected, $actual);
    }
    
    /**
     * @covers WindowsAzure\Blob\Models\CreateBlobOptions::setAccessCondition
     */
    public function testSetAccessCondition()
    {
        // Setup
        $expected = AccessCondition::none();
        $result = new CreateBlobOptions();
        
        // Test
        $result->setAccessCondition($expected);
        
        // Assert
        $this->assertEquals($expected, $result->getAccessCondition());
    }
}


