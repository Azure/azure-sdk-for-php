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
 * @package   Tests\Unit\WindowsAzure\Table\Models
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
namespace Tests\Unit\WindowsAzure\Table\Models;
use WindowsAzure\Table\Models\QueryEntitiesResult;

/**
 * Unit tests for class QueryEntitiesResult
 *
 * @category  Microsoft
 * @package   Tests\Unit\WindowsAzure\Table\Models
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: 0.4.0_2014-01
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
class QueryEntitiesResultTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers WindowsAzure\Table\Models\QueryEntitiesResult::create
     */
    public function testCreate()
    {
        // Test
        $result = QueryEntitiesResult::create(array(), array());
        
        // Assert
        $this->assertCount(0, $result->getEntities());
        $this->assertNull($result->getNextPartitionKey());
        $this->assertNull($result->getNextRowKey());
    }
    
    /**
     * @covers WindowsAzure\Table\Models\QueryEntitiesResult::setNextPartitionKey
     * @covers WindowsAzure\Table\Models\QueryEntitiesResult::getNextPartitionKey
     */
    public function testSetNextPartitionKey()
    {
        // Setup
        $result = new QueryEntitiesResult();
        $expected = 'parition';
        
        // Test
        $result->setNextPartitionKey($expected);
        
        // Assert
        $this->assertEquals($expected, $result->getNextPartitionKey());
    }
    
    /**
     * @covers WindowsAzure\Table\Models\QueryEntitiesResult::setNextRowKey
     * @covers WindowsAzure\Table\Models\QueryEntitiesResult::getNextRowKey
     */
    public function testSetNextRowKey()
    {
        // Setup
        $result = new QueryEntitiesResult();
        $expected = 'edelo';
        
        // Test
        $result->setNextRowKey($expected);
        
        // Assert
        $this->assertEquals($expected, $result->getNextRowKey());
    }
    
    /**
     * @covers WindowsAzure\Table\Models\QueryEntitiesResult::setEntities
     * @covers WindowsAzure\Table\Models\QueryEntitiesResult::getEntities
     */
    public function testSetEntities()
    {
        // Setup
        $result = new QueryEntitiesResult();
        $expected = array();
        
        // Test
        $result->setEntities($expected);
        
        // Assert
        $this->assertEquals($expected, $result->getEntities());
    }
}


