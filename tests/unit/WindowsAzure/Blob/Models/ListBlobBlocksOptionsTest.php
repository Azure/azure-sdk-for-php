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
use Tests\Framework\TestResources;
use WindowsAzure\Services\Blob\Models\ListBlobBlocksOptions;

/**
 * Unit tests for class ListBlobBlocksOptions
 *
 * @category  Microsoft
 * @package   Tests\Unit\WindowsAzure\Services\Blob\Models
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
class ListBlobBlocksOptionsTest extends \PHPUnit_Framework_TestCase
{   
    /**
     * @covers WindowsAzure\Services\Blob\Models\ListBlobBlocksOptions::setSnapshot
     * @covers WindowsAzure\Services\Blob\Models\ListBlobBlocksOptions::__construct
     */
    public function testSetSnapshot()
    {
        // Setup
        $blob = new ListBlobBlocksOptions();
        $expected = TestResources::QUEUE1_NAME;
        
        // Test
        $blob->setSnapshot($expected);
        
        // Assert
        $this->assertEquals($expected, $blob->getSnapshot());
    }
    
    /**
     * @covers WindowsAzure\Services\Blob\Models\ListBlobBlocksOptions::getSnapshot
     * @covers WindowsAzure\Services\Blob\Models\ListBlobBlocksOptions::__construct
     */
    public function testGetSnapshot()
    {
        // Setup
        $blob = new ListBlobBlocksOptions();
        $expected = TestResources::QUEUE_URI;
        $blob->setSnapshot($expected);
        
        // Test
        $actual = $blob->getSnapshot();
        
        // Assert
        $this->assertEquals($expected, $actual);
    }
    
    /**
     * @covers WindowsAzure\Services\Blob\Models\ListBlobBlocksOptions::setLeaseId
     * @covers WindowsAzure\Services\Blob\Models\ListBlobBlocksOptions::getLeaseId
     * @covers WindowsAzure\Services\Blob\Models\ListBlobBlocksOptions::__construct
     */
    public function testSetLeaseId()
    {
        // Setup
        $expected = '0x8CAFB82EFF70C46';
        $options = new ListBlobBlocksOptions();
        $options->setLeaseId($expected);
        
        // Test
        $options->setLeaseId($expected);
        
        // Assert
        $this->assertEquals($expected, $options->getLeaseId());
    }
    
    /**
     * @covers WindowsAzure\Services\Blob\Models\ListBlobBlocksOptions::setIncludeUncommittedBlobs
     */
    public function testSetIncludeUncommittedBlobs()
    {
        // Setup
        $options = new ListBlobBlocksOptions();
        $expected = true;
        
        // Test
        $options->setIncludeUncommittedBlobs($expected);
        
        // Assert
        $this->assertEquals($expected, $options->getIncludeUncommittedBlobs());
    }
    
    /**
     * @covers WindowsAzure\Services\Blob\Models\ListBlobBlocksOptions::getIncludeUncommittedBlobs
     */
    public function testGetIncludeUncommittedBlobs()
    {
        // Setup
        $options = new ListBlobBlocksOptions();
        $expected = true;
        $options->setIncludeUncommittedBlobs($expected);
        
        // Test
        $actual = $options->getIncludeUncommittedBlobs();
        
        // Assert
        $this->assertEquals($expected, $actual);
    }
    
    /**
     * @covers WindowsAzure\Services\Blob\Models\ListBlobBlocksOptions::setIncludeCommittedBlobs
     */
    public function testSetIncludeCommittedBlobs()
    {
        // Setup
        $options = new ListBlobBlocksOptions();
        $expected = true;
        
        // Test
        $options->setIncludeCommittedBlobs($expected);
        
        // Assert
        $this->assertEquals($expected, $options->getIncludeCommittedBlobs());
    }
    
    /**
     * @covers WindowsAzure\Services\Blob\Models\ListBlobBlocksOptions::getIncludeCommittedBlobs
     */
    public function testGetIncludeCommittedBlobs()
    {
        // Setup
        $options = new ListBlobBlocksOptions();
        $expected = true;
        $options->setIncludeCommittedBlobs($expected);
        
        // Test
        $actual = $options->getIncludeCommittedBlobs();
        
        // Assert
        $this->assertEquals($expected, $actual);
    }
    
    /**
     * @covers WindowsAzure\Services\Blob\Models\ListBlobBlocksOptions::getBlockListType
     */
    public function testGetBlockListType()
    {
        // Setup
        $options = new ListBlobBlocksOptions();
        $expected = 'all';
        
        // Test
        $actual = $options->getBlockListType();
        
        // Assert
        $this->assertEquals($expected, $actual);
    }
}

?>
