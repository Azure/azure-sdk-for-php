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
 * @package   PEAR2\Tests\Unit\WindowsAzure\Services\Table\Models
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */

namespace PEAR2\Tests\Unit\WindowsAzure\Services\Table\Models;
use PEAR2\WindowsAzure\Services\Table\Models\BatchOperations;
use PEAR2\WindowsAzure\Services\Table\Models\BatchOperation;
use PEAR2\WindowsAzure\Services\Table\Models\Entity;

/**
 * Unit tests for class BatchOperations
 *
 * @category  Microsoft
 * @package   PEAR2\Tests\Unit\WindowsAzure\Services\Table\Models
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
class BatchOperationsTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers PEAR2\WindowsAzure\Services\Table\Models\BatchOperations::__construct
     * @covers PEAR2\WindowsAzure\Services\Table\Models\BatchOperations::getOperations
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
     * @covers PEAR2\WindowsAzure\Services\Table\Models\BatchOperations::setOperations
     * @covers PEAR2\WindowsAzure\Services\Table\Models\BatchOperations::getOperations
     * @covers PEAR2\WindowsAzure\Services\Table\Models\BatchOperations::addOperation
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
     *  @covers PEAR2\WindowsAzure\Services\Table\Models\BatchOperations::addInsertEntity
     *  @covers PEAR2\WindowsAzure\Services\Table\Models\BatchOperations::addOperation
     *  @covers PEAR2\WindowsAzure\Services\Table\Models\BatchOperations::getOperations
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
     *  @covers PEAR2\WindowsAzure\Services\Table\Models\BatchOperations::addUpdateEntity
     *  @covers PEAR2\WindowsAzure\Services\Table\Models\BatchOperations::addOperation
     *  @covers PEAR2\WindowsAzure\Services\Table\Models\BatchOperations::getOperations
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
     *  @covers PEAR2\WindowsAzure\Services\Table\Models\BatchOperations::addMergeEntity
     *  @covers PEAR2\WindowsAzure\Services\Table\Models\BatchOperations::addOperation
     *  @covers PEAR2\WindowsAzure\Services\Table\Models\BatchOperations::getOperations
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
     *  @covers PEAR2\WindowsAzure\Services\Table\Models\BatchOperations::addInsertOrReplaceEntity
     *  @covers PEAR2\WindowsAzure\Services\Table\Models\BatchOperations::addOperation
     *  @covers PEAR2\WindowsAzure\Services\Table\Models\BatchOperations::getOperations
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
     *  @covers PEAR2\WindowsAzure\Services\Table\Models\BatchOperations::addInsertOrMergeEntity
     *  @covers PEAR2\WindowsAzure\Services\Table\Models\BatchOperations::addOperation
     *  @covers PEAR2\WindowsAzure\Services\Table\Models\BatchOperations::getOperations
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
     *  @covers PEAR2\WindowsAzure\Services\Table\Models\BatchOperations::addDeleteEntity
     *  @covers PEAR2\WindowsAzure\Services\Table\Models\BatchOperations::addOperation
     *  @covers PEAR2\WindowsAzure\Services\Table\Models\BatchOperations::getOperations
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

?>
