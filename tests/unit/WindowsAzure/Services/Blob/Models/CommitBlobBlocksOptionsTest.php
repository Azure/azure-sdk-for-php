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
use PEAR2\WindowsAzure\Services\Blob\Models\CommitBlobBlocksOptions;
use PEAR2\WindowsAzure\Services\Blob\Models\AccessCondition;

/**
 * Unit tests for class CommitBlobBlocksOptions
 *
 * @category  Microsoft
 * @package   PEAR2\Tests\Unit\WindowsAzure\Services\Blob\Models
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
class CommitBlobBlocksOptionsTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers PEAR2\WindowsAzure\Services\Blob\Models\CommitBlobBlocksOptions::setBlobContentType
     * @covers PEAR2\WindowsAzure\Services\Blob\Models\CommitBlobBlocksOptions::getBlobContentType
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
     * @covers PEAR2\WindowsAzure\Services\Blob\Models\CommitBlobBlocksOptions::setBlobContentEncoding
     * @covers PEAR2\WindowsAzure\Services\Blob\Models\CommitBlobBlocksOptions::getBlobContentEncoding
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
     * @covers PEAR2\WindowsAzure\Services\Blob\Models\CommitBlobBlocksOptions::setBlobContentLanguage
     * @covers PEAR2\WindowsAzure\Services\Blob\Models\CommitBlobBlocksOptions::getBlobContentLanguage
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
     * @covers PEAR2\WindowsAzure\Services\Blob\Models\CommitBlobBlocksOptions::setBlobContentMD5
     * @covers PEAR2\WindowsAzure\Services\Blob\Models\CommitBlobBlocksOptions::getBlobContentMD5
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
     * @covers PEAR2\WindowsAzure\Services\Blob\Models\CommitBlobBlocksOptions::setBlobCacheControl
     * @covers PEAR2\WindowsAzure\Services\Blob\Models\CommitBlobBlocksOptions::getBlobCacheControl
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
     * @covers PEAR2\WindowsAzure\Services\Blob\Models\CommitBlobBlocksOptions::setLeaseId
     * @covers PEAR2\WindowsAzure\Services\Blob\Models\CommitBlobBlocksOptions::getLeaseId
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
     * @covers PEAR2\WindowsAzure\Services\Blob\Models\CommitBlobBlocksOptions::setMetadata
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
     * @covers PEAR2\WindowsAzure\Services\Blob\Models\CommitBlobBlocksOptions::getMetadata
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
     * @covers PEAR2\WindowsAzure\Services\Blob\Models\CommitBlobBlocksOptions::getAccessCondition
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
     * @covers PEAR2\WindowsAzure\Services\Blob\Models\CommitBlobBlocksOptions::setAccessCondition
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

?>
