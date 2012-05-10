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
use WindowsAzure\Services\Blob\Models\BlockList;
use WindowsAzure\Services\Blob\Models\BlobBlockType;
use WindowsAzure\Services\Blob\Models\Block;

/**
 * Unit tests for class BlockList
 *
 * @category  Microsoft
 * @package   Tests\Unit\WindowsAzure\Services\Blob\Models
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
class BlockListTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers WindowsAzure\Services\Blob\Models\BlockList::addEntry
     * @covers WindowsAzure\Services\Blob\Models\BlockList::getEntry
     */
    public function testAddEntry()
    {
        // Setup
        $expectedId = '1234';
        $expectedType = BlobBlockType::COMMITTED_TYPE;
        $blockList = new BlockList();
        
        // Test
        $blockList->addEntry($expectedId, $expectedType);
        
        // Assert
        $entry = $blockList->getEntry($expectedId);
        $this->assertEquals($expectedType, $entry->getType());
    }
    
    /**
     * @covers WindowsAzure\Services\Blob\Models\BlockList::getEntries
     */
    public function testGetEntries()
    {
        // Setup
        $expectedId = '1234';
        $expectedType = BlobBlockType::COMMITTED_TYPE;
        $blockList = new BlockList();
        $blockList->addEntry($expectedId, $expectedType);
        
        // Test
        $entries = $blockList->getEntries();
        
        // Assert
        $this->assertCount(1, $entries);
    }
    
    /**
     * @covers WindowsAzure\Services\Blob\Models\BlockList::addCommittedEntry
     * @covers WindowsAzure\Services\Blob\Models\BlockList::getEntry
     */
    public function testAddCommittedEntry()
    {
        // Setup
        $expectedId = '1234';
        $expectedType = BlobBlockType::COMMITTED_TYPE;
        $blockList = new BlockList();
        
        // Test
        $blockList->addCommittedEntry($expectedId, $expectedType);
        
        // Assert
        $entry = $blockList->getEntry($expectedId);
        $this->assertEquals($expectedId, $entry->getBlockId());
        $this->assertEquals($expectedType, $entry->getType());
    }
    
    /**
     * @covers WindowsAzure\Services\Blob\Models\BlockList::addUncommittedEntry
     * @covers WindowsAzure\Services\Blob\Models\BlockList::getEntry
     */
    public function testAddUncommittedEntry()
    {
        // Setup
        $expectedId = '1234';
        $expectedType = BlobBlockType::UNCOMMITTED_TYPE;
        $blockList = new BlockList();
        
        // Test
        $blockList->addUncommittedEntry($expectedId, $expectedType);
        
        // Assert
        $entry = $blockList->getEntry($expectedId);
        $this->assertEquals($expectedId, $entry->getBlockId());
        $this->assertEquals($expectedType, $entry->getType());
    }
    
    /**
     * @covers WindowsAzure\Services\Blob\Models\BlockList::addLatestEntry
     * @covers WindowsAzure\Services\Blob\Models\BlockList::getEntry
     */
    public function testAddLatestEntry()
    {
        // Setup
        $expectedId = '1234';
        $expectedType = BlobBlockType::LATEST_TYPE;
        $blockList = new BlockList();
        
        // Test
        $blockList->addLatestEntry($expectedId, $expectedType);
        
        // Assert
        $entry = $blockList->getEntry($expectedId);
        $this->assertEquals($expectedId, $entry->getBlockId());
        $this->assertEquals($expectedType, $entry->getType());
    }
    
    /**
     * @covers WindowsAzure\Services\Blob\Models\BlockList::create
     */
    public function testCreate()
    {
        // Setup
        $block1 = new Block();
        $block1->setBlockId('123');
        $block1->setType(BlobBlockType::COMMITTED_TYPE);
        $block2 = new Block();
        $block2->setBlockId('223');
        $block2->setType(BlobBlockType::UNCOMMITTED_TYPE);
        $block3 = new Block();
        $block3->setBlockId('333');
        $block3->setType(BlobBlockType::LATEST_TYPE);
        
        // Test
        $blockList = BlockList::create(array($block1, $block2, $block3));
        
        // Assert
        $this->assertCount(3, $blockList->getEntries());
        $b1 = $blockList->getEntry($block1->getBlockId());
        $b2 = $blockList->getEntry($block2->getBlockId());
        $b3 = $blockList->getEntry($block3->getBlockId());
        $this->assertEquals($block1, $b1);
        $this->assertEquals($block2, $b2);
        $this->assertEquals($block3, $b3);
    }
}

?>
