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
use WindowsAzure\Table\Models\BatchOperations;
use WindowsAzure\Table\Models\BatchOperation;
use WindowsAzure\Table\Models\Entity;

/**
 * Unit tests for class BatchOperations
 *
 * @category  Microsoft
 * @package   Tests\Unit\WindowsAzure\Table\Models
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: 0.4.0_2014-01
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
class BatchOperationsTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers WindowsAzure\Table\Models\BatchOperations::__construct
     * @covers WindowsAzure\Table\Models\BatchOperations::getOperations
     */
    public function test__construct()
    {
        // Test
        $operations = new BatchOperations();
        
        // Assert
        $this->assertCount(0, $operations->getOperations());
        
        return $operations;
    }
    
    /**
     * @covers WindowsAzure\Table\Models\BatchOperations::setOperations
     * @covers WindowsAzure\Table\Models\BatchOperations::getOperations
     * @covers WindowsAzure\Table\Models\BatchOperations::addOperation
     * @depends test__construct
     */
    public function testSetOperations($operations)
    {
        // Setup
        $operation = new BatchOperation();
        $expected = array($operation);
        $operations->addOperation($operation);
        
        // Test
        $operations->setOperations($expected);
        
        // Assert
        $this->assertEquals($expected, $operations->getOperations());
    }
    
    /**
     *  @covers WindowsAzure\Table\Models\BatchOperations::addInsertEntity
     *  @covers WindowsAzure\Table\Models\BatchOperations::addOperation
     *  @covers WindowsAzure\Table\Models\BatchOperations::getOperations
     */
    public function testAddInsertEntity()
    {
        // Setup
        $table = 'mytable';
        $entity = new Entity();
        $operations = new BatchOperations();
        
        // Test
        $operations->addInsertEntity($table, $entity);
        
        // Assert
        $this->assertCount(1, $operations->getOperations());
    }
    
    /**
     *  @covers WindowsAzure\Table\Models\BatchOperations::addUpdateEntity
     *  @covers WindowsAzure\Table\Models\BatchOperations::addOperation
     *  @covers WindowsAzure\Table\Models\BatchOperations::getOperations
     */
    public function testAddUpdateEntity()
    {
        // Setup
        $table = 'mytable';
        $entity = new Entity();
        $operations = new BatchOperations();
        
        // Test
        $operations->addUpdateEntity($table, $entity);
        
        // Assert
        $this->assertCount(1, $operations->getOperations());
    }
    
    /**
     *  @covers WindowsAzure\Table\Models\BatchOperations::addMergeEntity
     *  @covers WindowsAzure\Table\Models\BatchOperations::addOperation
     *  @covers WindowsAzure\Table\Models\BatchOperations::getOperations
     */
    public function testAddMergeEntity()
    {
        // Setup
        $table = 'mytable';
        $entity = new Entity();
        $operations = new BatchOperations();
        
        // Test
        $operations->addMergeEntity($table, $entity);
        
        // Assert
        $this->assertCount(1, $operations->getOperations());
    }
    
    /**
     *  @covers WindowsAzure\Table\Models\BatchOperations::addInsertOrReplaceEntity
     *  @covers WindowsAzure\Table\Models\BatchOperations::addOperation
     *  @covers WindowsAzure\Table\Models\BatchOperations::getOperations
     */
    public function testAddInsertOrReplaceEntity()
    {
        // Setup
        $table = 'mytable';
        $entity = new Entity();
        $operations = new BatchOperations();
        
        // Test
        $operations->addInsertOrReplaceEntity($table, $entity);
        
        // Assert
        $this->assertCount(1, $operations->getOperations());
    }
    
    /**
     *  @covers WindowsAzure\Table\Models\BatchOperations::addInsertOrMergeEntity
     *  @covers WindowsAzure\Table\Models\BatchOperations::addOperation
     *  @covers WindowsAzure\Table\Models\BatchOperations::getOperations
     */
    public function testAddInsertOrMergeEntity()
    {
        // Setup
        $table = 'mytable';
        $entity = new Entity();
        $operations = new BatchOperations();
        
        // Test
        $operations->addInsertOrMergeEntity($table, $entity);
        
        // Assert
        $this->assertCount(1, $operations->getOperations());
    }
    
    /**
     *  @covers WindowsAzure\Table\Models\BatchOperations::addDeleteEntity
     *  @covers WindowsAzure\Table\Models\BatchOperations::addOperation
     *  @covers WindowsAzure\Table\Models\BatchOperations::getOperations
     */
    public function testAddDeleteEntity()
    {
        // Setup
        $table = 'mytable';
        $partitionKey = '123';
        $rowKey= '456';
        $etag = 'W/datetime:2009';
        $operations = new BatchOperations();
        
        // Test
        $operations->addDeleteEntity($table, $partitionKey, $rowKey, $etag);
        
        // Assert
        $this->assertCount(1, $operations->getOperations());
    }
}


