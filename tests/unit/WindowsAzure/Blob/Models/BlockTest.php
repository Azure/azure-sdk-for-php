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
use WindowsAzure\Blob\Models\Block;

/**
 * Unit tests for class Block.
 *
 * @category  Microsoft
 * @package   Tests\Unit\WindowsAzure\Blob\Models
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: 0.4.2_2016-04
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
class BlockTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers WindowsAzure\Blob\Models\Block::setBlockId
     * @covers WindowsAzure\Blob\Models\Block::getBlockId
     */
    public function testSetBlockId()
    {
        // Setup
        $block = new Block();
        $expected = '1234';
        
        // Test
        $block->setBlockId($expected);
        
        // Assert
        $this->assertEquals($expected, $block->getBlockId());
    }
    
    /**
     * @covers WindowsAzure\Blob\Models\Block::setType
     * @covers WindowsAzure\Blob\Models\Block::getType
     */
    public function testSetType()
    {
        // Setup
        $block = new Block();
        $expected = 'BlockType';
        
        // Test
        $block->setType($expected);
        
        // Assert
        $this->assertEquals($expected, $block->getType());
    }
}


