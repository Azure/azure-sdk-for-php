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
use PEAR2\WindowsAzure\Services\Blob\Models\BlockList;
use PEAR2\WindowsAzure\Services\Blob\Models\BlobBlockType;

/**
 * Unit tests for class BlockList
 *
 * @category  Microsoft
 * @package   PEAR2\Tests\Unit\WindowsAzure\Services\Blob\Models
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
class BlockListTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers PEAR2\WindowsAzure\Services\Blob\Models\BlockList::setEntry
     * @covers PEAR2\WindowsAzure\Services\Blob\Models\BlockList::getEntry
     */
    public function testSetEntry()
    {
        // Setup
        $expectedId = '1234';
        $expectedType = BlobBlockType::COMMITTED_TYPE;
        $blockList = new BlockList();
        
        // Test
        $blockList->setEntry($expectedId, $expectedType);
        
        // Assert
        $this->assertEquals($expectedType, $blockList->getEntry($expectedId));
    }
    
    /**
     * @covers PEAR2\WindowsAzure\Services\Blob\Models\BlockList::getEntries
     */
    public function testGetEntries()
    {
        // Setup
        $expectedId = '1234';
        $expectedType = BlobBlockType::COMMITTED_TYPE;
        $blockList = new BlockList();
        $blockList->setEntry($expectedId, $expectedType);
        
        // Test
        $entries = $blockList->getEntries();
        
        // Assert
        $this->assertCount(1, $entries);
    }
}

?>
