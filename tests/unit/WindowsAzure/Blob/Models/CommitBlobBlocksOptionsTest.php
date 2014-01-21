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
use WindowsAzure\Blob\Models\CommitBlobBlocksOptions;
use WindowsAzure\Blob\Models\AccessCondition;

/**
 * Unit tests for class CommitBlobBlocksOptions
 *
 * @category  Microsoft
 * @package   Tests\Unit\WindowsAzure\Blob\Models
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: 0.4.0_2014-01
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
class CommitBlobBlocksOptionsTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers WindowsAzure\Blob\Models\CommitBlobBlocksOptions::setBlobContentType
     * @covers WindowsAzure\Blob\Models\CommitBlobBlocksOptions::getBlobContentType
     */
    public function testSetBlobContentType()
    {
        // Setup
        $expected = '0x8CAFB82EFF70C46';
        $options = new CommitBlobBlocksOptions();
        $options->setBlobContentType($expected);
        
        // Test
        $options->setBlobContentType($expected);
        
        // Assert
        $this->assertEquals($expected, $options->getBlobContentType());
    }
    
    /**
     * @covers WindowsAzure\Blob\Models\CommitBlobBlocksOptions::setBlobContentEncoding
     * @covers WindowsAzure\Blob\Models\CommitBlobBlocksOptions::getBlobContentEncoding
     */
    public function testSetBlobContentEncoding()
    {
        // Setup
        $expected = '0x8CAFB82EFF70C46';
        $options = new CommitBlobBlocksOptions();
        $options->setBlobContentEncoding($expected);
        
        // Test
        $options->setBlobContentEncoding($expected);
        
        // Assert
        $this->assertEquals($expected, $options->getBlobContentEncoding());
    }
    
    /**
     * @covers WindowsAzure\Blob\Models\CommitBlobBlocksOptions::setBlobContentLanguage
     * @covers WindowsAzure\Blob\Models\CommitBlobBlocksOptions::getBlobContentLanguage
     */
    public function testSetBlobContentLanguage()
    {
        // Setup
        $expected = '0x8CAFB82EFF70C46';
        $options = new CommitBlobBlocksOptions();
        $options->setBlobContentLanguage($expected);
        
        // Test
        $options->setBlobContentLanguage($expected);
        
        // Assert
        $this->assertEquals($expected, $options->getBlobContentLanguage());
    }
    
    /**
     * @covers WindowsAzure\Blob\Models\CommitBlobBlocksOptions::setBlobContentMD5
     * @covers WindowsAzure\Blob\Models\CommitBlobBlocksOptions::getBlobContentMD5
     */
    public function testSetBlobContentMD5()
    {
        // Setup
        $expected = '0x8CAFB82EFF70C46';
        $options = new CommitBlobBlocksOptions();
        $options->setBlobContentMD5($expected);
        
        // Test
        $options->setBlobContentMD5($expected);
        
        // Assert
        $this->assertEquals($expected, $options->getBlobContentMD5());
    }
    
    /**
     * @covers WindowsAzure\Blob\Models\CommitBlobBlocksOptions::setBlobCacheControl
     * @covers WindowsAzure\Blob\Models\CommitBlobBlocksOptions::getBlobCacheControl
     */
    public function testSetBlobCacheControl()
    {
        // Setup
        $expected = '0x8CAFB82EFF70C46';
        $options = new CommitBlobBlocksOptions();
        $options->setBlobCacheControl($expected);
        
        // Test
        $options->setBlobCacheControl($expected);
        
        // Assert
        $this->assertEquals($expected, $options->getBlobCacheControl());
    }
    
    /**
     * @covers WindowsAzure\Blob\Models\CommitBlobBlocksOptions::setLeaseId
     * @covers WindowsAzure\Blob\Models\CommitBlobBlocksOptions::getLeaseId
     */
    public function testSetLeaseId()
    {
        // Setup
        $expected = '0x8CAFB82EFF70C46';
        $options = new CommitBlobBlocksOptions();
        $options->setLeaseId($expected);
        
        // Test
        $options->setLeaseId($expected);
        
        // Assert
        $this->assertEquals($expected, $options->getLeaseId());
    }
    
    /**
     * @covers WindowsAzure\Blob\Models\CommitBlobBlocksOptions::setMetadata
     */
    public function testSetMetadata()
    {
        // Setup
        $container = new CommitBlobBlocksOptions();
        $expected = array('key1' => 'value1', 'key2' => 'value2');
        
        // Test
        $container->setMetadata($expected);
        
        // Assert
        $this->assertEquals($expected, $container->getMetadata());
    }
    
    /**
     * @covers WindowsAzure\Blob\Models\CommitBlobBlocksOptions::getMetadata
     */
    public function testGetMetadata()
    {
        // Setup
        $container = new CommitBlobBlocksOptions();
        $expected = array('key1' => 'value1', 'key2' => 'value2');
        $container->setMetadata($expected);
        
        // Test
        $actual = $container->getMetadata();
        
        // Assert
        $this->assertEquals($expected, $actual);
    }
    
    /**
     * @covers WindowsAzure\Blob\Models\CommitBlobBlocksOptions::getAccessCondition
     */
    public function testGetAccessCondition()
    {
        // Setup
        $expected = AccessCondition::none();
        $result = new CommitBlobBlocksOptions();
        $result->setAccessCondition($expected);
        
        // Test
        $actual = $result->getAccessCondition();
        
        // Assert
        $this->assertEquals($expected, $actual);
    }
    
    /**
     * @covers WindowsAzure\Blob\Models\CommitBlobBlocksOptions::setAccessCondition
     */
    public function testSetAccessCondition()
    {
        // Setup
        $expected = AccessCondition::none();
        $result = new CommitBlobBlocksOptions();
        
        // Test
        $result->setAccessCondition($expected);
        
        // Assert
        $this->assertEquals($expected, $result->getAccessCondition());
    }
}


