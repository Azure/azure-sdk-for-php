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
 * @package   PEAR2\Tests\Unit\WindowsAzure\Services\Table
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */

namespace PEAR2\Tests\Unit\WindowsAzure\Services\Table;
use PEAR2\WindowsAzure\Core\HttpClient;
use PEAR2\WindowsAzure\Services\Table\Utilities\AtomReaderWriter;
use PEAR2\WindowsAzure\Services\Table\Utilities\MimeReaderWriter;
use PEAR2\Tests\Framework\TableServiceRestProxyTestBase;
use PEAR2\WindowsAzure\Core\WindowsAzureUtilities;
use PEAR2\WindowsAzure\Core\ServiceException;
use PEAR2\Tests\Framework\TestResources;
use PEAR2\WindowsAzure\Resources;
use PEAR2\WindowsAzure\Services\Table\TableRestProxy;
use PEAR2\WindowsAzure\Services\Core\Models\ServiceProperties;
use PEAR2\WindowsAzure\Services\Table\Models\QueryTablesOptions;
use PEAR2\WindowsAzure\Services\Table\Models\Query;
use PEAR2\WindowsAzure\Services\Table\Models\Filters\Filter;
use PEAR2\WindowsAzure\Services\Table\Models\Entity;
use PEAR2\WindowsAzure\Services\Table\Models\EdmType;
use PEAR2\WindowsAzure\Services\Table\Models\QueryEntitiesOptions;
use PEAR2\WindowsAzure\Services\Table\Models\BatchOperations;

/**
 * Unit tests for class TableRestProxy
 *
 * @category  Microsoft
 * @package   PEAR2\Tests\Unit\WindowsAzure\Services\Table
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
class TableRestProxyTest extends TableServiceRestProxyTestBase
{
    public function test__construct()
    {
        // Setup
        $channel = new HttpClient();
        $atomSerializer = new AtomReaderWriter();
        $mimeSerializer = new MimeReaderWriter();
        $url = 'http:://www.microsoft.com';
        
        // Test
        $tableRestProxy = new TableRestProxy($channel, $atomSerializer, $mimeSerializer, $url);
        
        // Assert
        $this->assertNotNull($tableRestProxy);
    }
    
    /**
     * @covers PEAR2\WindowsAzure\Services\Table\TableRestProxy::getServiceProperties
     * @covers PEAR2\WindowsAzure\Services\Core\ServiceRestProxy::sendContext
    */
    public function testGetServiceProperties()
    {
        if (WindowsAzureUtilities::isEmulated()) {
            $this->markTestSkipped(self::NOT_SUPPORTED);
        }
        
        // Test
        $result = $this->wrapper->getServiceProperties();
        
        // Assert
        $this->assertEquals($this->defaultProperties->toArray(), $result->getValue()->toArray());
    }
    
    /**
     * @covers PEAR2\WindowsAzure\Services\Table\TableRestProxy::setServiceProperties
     * @covers PEAR2\WindowsAzure\Services\Core\ServiceRestProxy::sendContext
    */
    public function testSetServiceProperties()
    {
        if (WindowsAzureUtilities::isEmulated()) {
            $this->markTestSkipped(self::NOT_SUPPORTED);
        }
        
        // Setup
        $expected = ServiceProperties::create(TestResources::setServicePropertiesSample());
        
        // Test
        $this->setServiceProperties($expected);
        $actual = $this->wrapper->getServiceProperties();
        
        // Assert
        $this->assertEquals($expected->toXml(), $actual->getValue()->toXml());
    }
    
    /**
     * @covers PEAR2\WindowsAzure\Services\Table\TableRestProxy::createTable
     * @covers PEAR2\WindowsAzure\Services\Table\Utilities\AtomReaderWriter::_fillTemplate
     * @covers PEAR2\WindowsAzure\Services\Table\Utilities\AtomReaderWriter::getTable
     * @covers PEAR2\WindowsAzure\Services\Core\ServiceRestProxy::sendContext
     */
    public function testCreateTable()
    {
        // Setup
        $name = 'createtable';
        
        // Test
        $this->createTable($name);
        
        // Assert
        $result = $this->wrapper->queryTables();
        $this->assertCount(1, $result->getTables());
    }
    
    /**
     * @covers PEAR2\WindowsAzure\Services\Table\TableRestProxy::deleteTable
     * @covers PEAR2\WindowsAzure\Services\Core\ServiceRestProxy::sendContext
     */
    public function testDeleteTable()
    {
        // Setup
        $name = 'deletetable';
        $this->wrapper->createTable($name);
        
        // Test
        $this->wrapper->deleteTable($name);
        
        // Assert
        $result = $this->wrapper->queryTables();
        $this->assertCount(0, $result->getTables());
    }
    
    /**
     * @covers PEAR2\WindowsAzure\Services\Table\TableRestProxy::queryTables
     * @covers PEAR2\WindowsAzure\Services\Table\TableRestProxy::_buildFilterExpression
     * @covers PEAR2\WindowsAzure\Services\Table\TableRestProxy::_buildFilterExpressionRec
     * @covers PEAR2\WindowsAzure\Services\Table\TableRestProxy::_addOptionalQuery
     * @covers PEAR2\WindowsAzure\Services\Table\TableRestProxy::_encodeODataUriValues
     * @covers PEAR2\WindowsAzure\Services\Table\TableRestProxy::_encodeODataUriValue
     * @covers PEAR2\WindowsAzure\Services\Table\Models\QueryTablesResult::create
     * @covers PEAR2\WindowsAzure\Services\Table\Utilities\AtomReaderWriter::_parseBody
     * @covers PEAR2\WindowsAzure\Services\Table\Utilities\AtomReaderWriter::parseTableEntries
     * @covers PEAR2\WindowsAzure\Services\Core\ServiceRestProxy::sendContext
     */
    public function testQueryTablesSimple()
    {
        // Setup
        $name1 = 'querytablessimple1';
        $name2 = 'querytablessimple2';
        $this->createTable($name1);
        $this->createTable($name2);
        
        // Test
        $result = $this->wrapper->queryTables();
        
        // Assert
        $tables = $result->getTables();
        $this->assertCount(2, $tables);
        $this->assertEquals($name1, $tables[0]);
        $this->assertEquals($name2, $tables[1]);
    }
    
    /**
     * @covers PEAR2\WindowsAzure\Services\Table\TableRestProxy::queryTables
     * @covers PEAR2\WindowsAzure\Services\Table\TableRestProxy::_buildFilterExpression
     * @covers PEAR2\WindowsAzure\Services\Table\TableRestProxy::_buildFilterExpressionRec
     * @covers PEAR2\WindowsAzure\Services\Table\TableRestProxy::_addOptionalQuery
     * @covers PEAR2\WindowsAzure\Services\Table\TableRestProxy::_encodeODataUriValues
     * @covers PEAR2\WindowsAzure\Services\Table\TableRestProxy::_encodeODataUriValue
     * @covers PEAR2\WindowsAzure\Services\Table\Models\QueryTablesResult::create
     * @covers PEAR2\WindowsAzure\Services\Table\Utilities\AtomReaderWriter::_parseBody
     * @covers PEAR2\WindowsAzure\Services\Table\Utilities\AtomReaderWriter::parseTableEntries
     * @covers PEAR2\WindowsAzure\Services\Core\ServiceRestProxy::sendContext
     */
    public function testQueryTablesOneTable()
    {
        // Setup
        $name1 = 'querytablesonetable';
        $this->createTable($name1);
        
        // Test
        $result = $this->wrapper->queryTables();
        
        // Assert
        $tables = $result->getTables();
        $this->assertCount(1, $tables);
        $this->assertEquals($name1, $tables[0]);
    }
    
    /**
     * @covers PEAR2\WindowsAzure\Services\Table\TableRestProxy::queryTables
     * @covers PEAR2\WindowsAzure\Services\Table\TableRestProxy::_buildFilterExpression
     * @covers PEAR2\WindowsAzure\Services\Table\TableRestProxy::_buildFilterExpressionRec
     * @covers PEAR2\WindowsAzure\Services\Table\TableRestProxy::_addOptionalQuery
     * @covers PEAR2\WindowsAzure\Services\Table\TableRestProxy::_encodeODataUriValues
     * @covers PEAR2\WindowsAzure\Services\Table\TableRestProxy::_encodeODataUriValue
     * @covers PEAR2\WindowsAzure\Services\Table\Models\QueryTablesResult::create
     * @covers PEAR2\WindowsAzure\Services\Table\Utilities\AtomReaderWriter::_parseBody
     * @covers PEAR2\WindowsAzure\Services\Table\Utilities\AtomReaderWriter::parseTableEntries
     * @covers PEAR2\WindowsAzure\Services\Core\ServiceRestProxy::sendContext
     */
    public function testQueryTablesEmpty()
    {
        // Test
        $result = $this->wrapper->queryTables();
        
        // Assert
        $tables = $result->getTables();
        $this->assertCount(0, $tables);
    }
    
    /**
     * @covers PEAR2\WindowsAzure\Services\Table\TableRestProxy::queryTables
     * @covers PEAR2\WindowsAzure\Services\Table\TableRestProxy::_buildFilterExpression
     * @covers PEAR2\WindowsAzure\Services\Table\TableRestProxy::_buildFilterExpressionRec
     * @covers PEAR2\WindowsAzure\Services\Table\TableRestProxy::_addOptionalQuery
     * @covers PEAR2\WindowsAzure\Services\Table\TableRestProxy::_encodeODataUriValues
     * @covers PEAR2\WindowsAzure\Services\Table\TableRestProxy::_encodeODataUriValue
     * @covers PEAR2\WindowsAzure\Services\Table\Models\QueryTablesResult::create
     * @covers PEAR2\WindowsAzure\Services\Table\Utilities\AtomReaderWriter::_parseBody
     * @covers PEAR2\WindowsAzure\Services\Table\Utilities\AtomReaderWriter::parseTableEntries
     * @covers PEAR2\WindowsAzure\Services\Core\ServiceRestProxy::sendContext
     */
    public function testQueryTablesWithPrefix()
    {
        if (WindowsAzureUtilities::isEmulated()) {
            $this->markTestSkipped(self::NOT_SUPPORTED);
        }
        
        // Setup
        $name1 = 'wquerytableswithprefix1';
        $name2 = 'querytableswithprefix2';
        $name3 = 'querytableswithprefix3';
        $options = new QueryTablesOptions();
        $options->setPrefix('q');
        $this->createTable($name1);
        $this->createTable($name2);
        $this->createTable($name3);
        
        // Test
        $result = $this->wrapper->queryTables($options);
        
        // Assert
        $tables = $result->getTables();
        $this->assertCount(2, $tables);
        $this->assertEquals($name2, $tables[0]);
        $this->assertEquals($name3, $tables[1]);
    }
    
    /**
     * @covers PEAR2\WindowsAzure\Services\Table\TableRestProxy::insertEntity
     * @covers PEAR2\WindowsAzure\Services\Table\TableRestProxy::_constructInsertEntityContext
     * @covers PEAR2\WindowsAzure\Services\Table\Utilities\AtomReaderWriter::_parseBody
     * @covers PEAR2\WindowsAzure\Services\Table\Utilities\AtomReaderWriter::getEntity
     * @covers PEAR2\WindowsAzure\Services\Table\Utilities\AtomReaderWriter::_generatePropertiesXml
     * @covers PEAR2\WindowsAzure\Services\Table\Utilities\AtomReaderWriter::parseEntity
     * @covers PEAR2\WindowsAzure\Services\Table\Utilities\AtomReaderWriter::_parseOneEntity
     * PEAR2\WindowsAzure\Services\Table\Models\InsertEntityResult::create
     * @covers PEAR2\WindowsAzure\Services\Core\ServiceRestProxy::sendContext
     */
    public function testInsertEntity()
    {
        // Setup
        $name = 'insertentity';
        $this->createTable($name);
        $expected = TestResources::getTestEntity('123', '456');
        
        // Test
        $result = $this->wrapper->insertEntity($name, $expected);
        
        // Assert
        $actual = $result->getEntity();
        $this->assertEquals($expected->getPartitionKey(), $actual->getPartitionKey());
        $this->assertEquals($expected->getRowKey(), $actual->getRowKey());
        $this->assertCount(count($expected->getProperties()), $actual->getProperties());
    }
    
    /**
     * @covers PEAR2\WindowsAzure\Services\Table\TableRestProxy::queryEntities
     * @covers PEAR2\WindowsAzure\Services\Table\Utilities\AtomReaderWriter::_parseBody
     * @covers PEAR2\WindowsAzure\Services\Table\Utilities\AtomReaderWriter::parseEntities
     * @covers PEAR2\WindowsAzure\Services\Table\Utilities\AtomReaderWriter::_parseOneEntity
     * @covers PEAR2\WindowsAzure\Services\Core\ServiceRestProxy::sendContext
     */
    public function testQueryEntitiesWithEmpty()
    {
        // Setup
        $name = 'queryentitieswithempty';
        $this->createTable($name);
        
        // Test
        $result = $this->wrapper->queryEntities($name);
        
        // Assert
        $entities = $result->getEntities();
        $this->assertCount(0, $entities);
        
    }
    
    /**
     * @covers PEAR2\WindowsAzure\Services\Table\TableRestProxy::queryEntities
     * @covers PEAR2\WindowsAzure\Services\Table\Utilities\AtomReaderWriter::_parseBody
     * @covers PEAR2\WindowsAzure\Services\Table\Utilities\AtomReaderWriter::parseEntities
     * @covers PEAR2\WindowsAzure\Services\Table\Utilities\AtomReaderWriter::_parseOneEntity
     * @covers PEAR2\WindowsAzure\Services\Core\ServiceRestProxy::sendContext
     */
    public function testQueryEntitiesWithOneEntity()
    {
        // Setup
        $name = 'queryentitieswithoneentity';
        $pk1 = '123';
        $e1 = TestResources::getTestEntity($pk1, '1');
        $this->createTable($name);
        $this->wrapper->insertEntity($name, $e1);
        
        // Test
        $result = $this->wrapper->queryEntities($name);
        
        // Assert
        $entities = $result->getEntities();
        $this->assertCount(1, $entities);
        $this->assertEquals($pk1, $entities[0]->getPartitionKey());
    }
    
    /**
     * @covers PEAR2\WindowsAzure\Services\Table\TableRestProxy::queryEntities
     * @covers PEAR2\WindowsAzure\Services\Table\TableRestProxy::_addOptionalQuery
     * @covers PEAR2\WindowsAzure\Services\Table\TableRestProxy::_encodeODataUriValues
     * @covers PEAR2\WindowsAzure\Services\Table\TableRestProxy::_encodeODataUriValue
     * @covers PEAR2\WindowsAzure\Services\Table\Utilities\AtomReaderWriter::_parseBody
     * @covers PEAR2\WindowsAzure\Services\Table\Utilities\AtomReaderWriter::parseEntities
     * @covers PEAR2\WindowsAzure\Services\Table\Utilities\AtomReaderWriter::_parseOneEntity
     * @covers PEAR2\WindowsAzure\Services\Core\ServiceRestProxy::sendContext
     */
    public function testQueryEntitiesWithMultipleEntities()
    {
        if (WindowsAzureUtilities::isEmulated()) {
            $this->markTestSkipped(self::NOT_SUPPORTED);
        }
        
        // Setup
        $name = 'queryentitieswithmultipleentities';
        $pk1 = '123';
        $pk2 = '124';
        $pk3 = '125';
        // This value is hard coded in TestResources::getTestEntity
        $expected = 890;
        $field = 'CustomerId';
        $e1 = TestResources::getTestEntity($pk1, '1');
        $e2 = TestResources::getTestEntity($pk2, '2');
        $e3 = TestResources::getTestEntity($pk3, '3');
        $this->createTable($name);
        $this->wrapper->insertEntity($name, $e1);
        $this->wrapper->insertEntity($name, $e2);
        $this->wrapper->insertEntity($name, $e3);
        $query = new Query();
        $query->addSelectField('CustomerId');
        $options = new QueryEntitiesOptions();
        $options->setQuery($query);
        
        // Test
        $result = $this->wrapper->queryEntities($name, $options);
        
        // Assert
        $entities = $result->getEntities();
        $this->assertCount(3, $entities);
        $this->assertEquals($expected, $entities[0]->getProperty($field)->getValue());
        $this->assertEquals($expected, $entities[1]->getProperty($field)->getValue());
        $this->assertEquals($expected, $entities[2]->getProperty($field)->getValue());
    }
    
    /**
     * @covers PEAR2\WindowsAzure\Services\Table\TableRestProxy::queryEntities
     * @covers PEAR2\WindowsAzure\Services\Table\TableRestProxy::_addOptionalQuery
     * @covers PEAR2\WindowsAzure\Services\Table\TableRestProxy::_encodeODataUriValues
     * @covers PEAR2\WindowsAzure\Services\Table\TableRestProxy::_encodeODataUriValue
     * @covers PEAR2\WindowsAzure\Services\Table\Utilities\AtomReaderWriter::_parseBody
     * @covers PEAR2\WindowsAzure\Services\Table\Utilities\AtomReaderWriter::parseEntities
     * @covers PEAR2\WindowsAzure\Services\Table\Utilities\AtomReaderWriter::_parseOneEntity
     * @covers PEAR2\WindowsAzure\Services\Core\ServiceRestProxy::sendContext
     */
    public function testQueryEntitiesWithGetTop()
    {
        // Setup
        $name = 'queryentitieswithgettop';
        $pk1 = '123';
        $pk2 = '124';
        $pk3 = '125';
        $e1 = TestResources::getTestEntity($pk1, '1');
        $e2 = TestResources::getTestEntity($pk2, '2');
        $e3 = TestResources::getTestEntity($pk3, '3');
        $this->createTable($name);
        $this->wrapper->insertEntity($name, $e1);
        $this->wrapper->insertEntity($name, $e2);
        $this->wrapper->insertEntity($name, $e3);
        $query = new Query();
        $query->setTop(1);
        $options = new QueryEntitiesOptions();
        $options->setQuery($query);
        
        // Test
        $result = $this->wrapper->queryEntities($name, $options);
        
        // Assert
        $entities = $result->getEntities();
        $this->assertCount(1, $entities);
        $this->assertEquals($pk1, $entities[0]->getPartitionKey());
    }
    
    /**
     * @covers PEAR2\WindowsAzure\Services\Table\TableRestProxy::updateEntity
     * @covers PEAR2\WindowsAzure\Services\Table\TableRestProxy::_getEntityPath
     * @covers PEAR2\WindowsAzure\Services\Table\TableRestProxy::_putOrMergeEntityImpl
     * @covers PEAR2\WindowsAzure\Services\Table\TableRestProxy::_constructPutOrMergeEntityContext
     * @covers PEAR2\WindowsAzure\Services\Table\Utilities\AtomReaderWriter::_parseBody
     * @covers PEAR2\WindowsAzure\Services\Table\Utilities\AtomReaderWriter::getEntity
     * @covers PEAR2\WindowsAzure\Services\Table\Utilities\AtomReaderWriter::_generatePropertiesXml
     * @covers PEAR2\WindowsAzure\Services\Table\Models\UpdateEntityResult::create
     * @covers PEAR2\WindowsAzure\Services\Core\ServiceRestProxy::sendContext
     */
    public function testUpdateEntity()
    {
        // Setup
        $name = 'updateentity';
        $this->createTable($name);
        $expected = TestResources::getTestEntity('123', '456');
        $this->wrapper->insertEntity($name, $expected);
        $result = $this->wrapper->queryEntities($name);
        $entities = $result->getEntities();
        $expected = $entities[0];
        $expected->addProperty('CustomerPlace', EdmType::STRING, 'Redmond');
        
        // Test
        $this->wrapper->UpdateEntity($name, $expected);
        
        // Assert
        $result = $this->wrapper->queryEntities($name);
        $entities = $result->getEntities();
        $actual = $entities[0];
        $this->assertEquals($expected->getPartitionKey(), $actual->getPartitionKey());
        $this->assertEquals($expected->getRowKey(), $actual->getRowKey());
        $this->assertCount(count($expected->getProperties()), $actual->getProperties());
    }
    
    /**
     * @covers PEAR2\WindowsAzure\Services\Table\TableRestProxy::mergeEntity
     * @covers PEAR2\WindowsAzure\Services\Table\TableRestProxy::_getEntityPath
     * @covers PEAR2\WindowsAzure\Services\Table\TableRestProxy::_putOrMergeEntityImpl
     * @covers PEAR2\WindowsAzure\Services\Table\TableRestProxy::_constructPutOrMergeEntityContext
     * @covers PEAR2\WindowsAzure\Services\Table\Utilities\AtomReaderWriter::_parseBody
     * @covers PEAR2\WindowsAzure\Services\Table\Utilities\AtomReaderWriter::getEntity
     * @covers PEAR2\WindowsAzure\Services\Table\Utilities\AtomReaderWriter::_generatePropertiesXml
     * @covers PEAR2\WindowsAzure\Services\Table\Models\UpdateEntityResult::create
     * @covers PEAR2\WindowsAzure\Services\Core\ServiceRestProxy::sendContext
     */
    public function testMergeEntity()
    {
        // Setup
        $name = 'mergeentity';
        $this->createTable($name);
        $expected = TestResources::getTestEntity('123', '456');
        $this->wrapper->insertEntity($name, $expected);
        $result = $this->wrapper->queryEntities($name);
        $entities = $result->getEntities();
        $expected = $entities[0];
        $expected->addProperty('CustomerPhone', EdmType::STRING, '99999999');
        
        // Test
        $this->wrapper->mergeEntity($name, $expected);
        
        // Assert
        $result = $this->wrapper->queryEntities($name);
        $entities = $result->getEntities();
        $actual = $entities[0];
        $this->assertEquals($expected->getPartitionKey(), $actual->getPartitionKey());
        $this->assertEquals($expected->getRowKey(), $actual->getRowKey());
        $this->assertCount(count($expected->getProperties()), $actual->getProperties());
    }
    
    /**
     * @covers PEAR2\WindowsAzure\Services\Table\TableRestProxy::insertOrReplaceEntity
     * @covers PEAR2\WindowsAzure\Services\Table\TableRestProxy::_getEntityPath
     * @covers PEAR2\WindowsAzure\Services\Table\TableRestProxy::_putOrMergeEntityImpl
     * @covers PEAR2\WindowsAzure\Services\Table\TableRestProxy::_constructPutOrMergeEntityContext
     * @covers PEAR2\WindowsAzure\Services\Table\Utilities\AtomReaderWriter::_parseBody
     * @covers PEAR2\WindowsAzure\Services\Table\Utilities\AtomReaderWriter::getEntity
     * @covers PEAR2\WindowsAzure\Services\Table\Utilities\AtomReaderWriter::_generatePropertiesXml
     * @covers PEAR2\WindowsAzure\Services\Table\Models\UpdateEntityResult::create
     * @covers PEAR2\WindowsAzure\Services\Core\ServiceRestProxy::sendContext
     */
    public function testInsertOrReplaceEntity()
    {
        // Setup
        $name = 'insertorreplaceentity';
        $this->createTable($name);
        $expected = TestResources::getTestEntity('123', '456');
        $this->wrapper->insertEntity($name, $expected);
        $result = $this->wrapper->queryEntities($name);
        $entities = $result->getEntities();
        $expected = $entities[0];
        $expected->addProperty('CustomerPlace', EdmType::STRING, 'Redmond');
        
        // Test
        $this->wrapper->InsertOrReplaceEntity($name, $expected);
        
        // Assert
        $result = $this->wrapper->queryEntities($name);
        $entities = $result->getEntities();
        $actual = $entities[0];
        $this->assertEquals($expected->getPartitionKey(), $actual->getPartitionKey());
        $this->assertEquals($expected->getRowKey(), $actual->getRowKey());
        $this->assertCount(count($expected->getProperties()), $actual->getProperties());
    }
    
    /**
     * @covers PEAR2\WindowsAzure\Services\Table\TableRestProxy::InsertOrMergeEntity
     * @covers PEAR2\WindowsAzure\Services\Table\TableRestProxy::_getEntityPath
     * @covers PEAR2\WindowsAzure\Services\Table\TableRestProxy::_putOrMergeEntityImpl
     * @covers PEAR2\WindowsAzure\Services\Table\TableRestProxy::_constructPutOrMergeEntityContext
     * @covers PEAR2\WindowsAzure\Services\Table\Utilities\AtomReaderWriter::_parseBody
     * @covers PEAR2\WindowsAzure\Services\Table\Utilities\AtomReaderWriter::getEntity
     * @covers PEAR2\WindowsAzure\Services\Table\Utilities\AtomReaderWriter::_generatePropertiesXml
     * @covers PEAR2\WindowsAzure\Services\Table\Models\UpdateEntityResult::create
     * @covers PEAR2\WindowsAzure\Services\Core\ServiceRestProxy::sendContext
     */
    public function testInsertOrMergeEntity()
    {
        // Setup
        $name = 'insertormergeentity';
        $this->createTable($name);
        $expected = TestResources::getTestEntity('123', '456');
        $this->wrapper->insertEntity($name, $expected);
        $result = $this->wrapper->queryEntities($name);
        $entities = $result->getEntities();
        $expected = $entities[0];
        $expected->addProperty('CustomerPhone', EdmType::STRING, '99999999');
        
        // Test
        $this->wrapper->InsertOrMergeEntity($name, $expected);
        
        // Assert
        $result = $this->wrapper->queryEntities($name);
        $entities = $result->getEntities();
        $actual = $entities[0];
        $this->assertEquals($expected->getPartitionKey(), $actual->getPartitionKey());
        $this->assertEquals($expected->getRowKey(), $actual->getRowKey());
        $this->assertCount(count($expected->getProperties()), $actual->getProperties());
    }
    
    /**
     * @covers PEAR2\WindowsAzure\Services\Table\TableRestProxy::deleteEntity
     * @covers PEAR2\WindowsAzure\Services\Table\TableRestProxy::_getEntityPath
     * @covers PEAR2\WindowsAzure\Services\Table\TableRestProxy::_constructDeleteEntityContext
     * @covers PEAR2\WindowsAzure\Services\Core\ServiceRestProxy::sendContext
     */
    public function testDeleteEntity()
    {
        // Setup
        $name = 'deleteentity';
        $this->createTable($name);
        $partitionKey = '123';
        $rowKey = '456';
        $entity = TestResources::getTestEntity($partitionKey, $rowKey);
        $result = $this->wrapper->insertEntity($name, $entity);
        
        // Test
        $this->wrapper->deleteEntity($name, $partitionKey, $rowKey);
        
        // Assert
        $result = $this->wrapper->queryEntities($name);
        $entities = $result->getEntities();
        $this->assertCount(0, $entities);
    }
    
    /**
     * @covers PEAR2\WindowsAzure\Services\Table\TableRestProxy::getEntity
     * @covers PEAR2\WindowsAzure\Services\Table\Utilities\AtomReaderWriter::_parseBody
     * @covers PEAR2\WindowsAzure\Services\Table\Utilities\AtomReaderWriter::parseEntity
     * @covers PEAR2\WindowsAzure\Services\Table\Utilities\AtomReaderWriter::_parseOneEntity
     * @covers PEAR2\WindowsAzure\Services\Core\ServiceRestProxy::sendContext
     */
    public function testGetEntity()
    {
        // Setup
        $name = 'getentity';
        $this->createTable($name);
        $partitionKey = '123';
        $rowKey = '456';
        $expected = TestResources::getTestEntity($partitionKey, $rowKey);
        $this->wrapper->insertEntity($name, $expected);
        
        // Test
        $result = $this->wrapper->getEntity($name, $partitionKey, $rowKey);
        
        // Assert
        $actual = $result->getEntity();
        $this->assertEquals($expected->getPartitionKey(), $actual->getPartitionKey());
        $this->assertEquals($expected->getRowKey(), $actual->getRowKey());
        $this->assertCount(count($expected->getProperties()), $actual->getProperties());
    }
    
    /**
     * @covers PEAR2\WindowsAzure\Services\Table\TableRestProxy::batch
     * @covers PEAR2\WindowsAzure\Services\Table\TableRestProxy::_createBatchRequestBody
     * @covers PEAR2\WindowsAzure\Services\Table\TableRestProxy::_getOperationContext
     * @covers PEAR2\WindowsAzure\Services\Table\TableRestProxy::_constructInsertEntityContext
     * @covers PEAR2\WindowsAzure\Services\Table\TableRestProxy::_createOperationsContexts
     * @covers PEAR2\WindowsAzure\Services\Table\Utilities\MimeReaderWriter::encodeMimeMultipart
     * @covers PEAR2\WindowsAzure\Services\Table\Utilities\MimeReaderWriter::decodeMimeMultipart
     * @covers PEAR2\WindowsAzure\Services\Table\Models\BatchResult::create
     * @covers PEAR2\WindowsAzure\Services\Table\Models\BatchResult::_constructResponses
     * @covers PEAR2\WindowsAzure\Services\Table\Models\BatchResult::_compareUsingContentId
     * @covers PEAR2\WindowsAzure\Services\Core\ServiceRestProxy::sendContext
     */
    public function testBatchWithInsert()
    {
        // Setup
        $name = 'batchwithinsert';
        $this->createTable($name);
        $partitionKey = '123';
        $rowKey = '456';
        $expected = TestResources::getTestEntity($partitionKey, $rowKey);
        $operations = new BatchOperations();
        $operations->addInsertEntity($name, $expected);
        
        // Test
        $result = $this->wrapper->batch($operations);
        
        // Assert
        $entries = $result->getEntries();
        $actual = $entries[0]->getEntity();
        $this->assertEquals($expected->getPartitionKey(), $actual->getPartitionKey());
        $this->assertEquals($expected->getRowKey(), $actual->getRowKey());
        $this->assertCount(count($expected->getProperties()), $actual->getProperties());
    }
    
    /**
     * @covers PEAR2\WindowsAzure\Services\Table\TableRestProxy::batch
     * @covers PEAR2\WindowsAzure\Services\Table\TableRestProxy::_createBatchRequestBody
     * @covers PEAR2\WindowsAzure\Services\Table\TableRestProxy::_getOperationContext
     * @covers PEAR2\WindowsAzure\Services\Table\TableRestProxy::_createOperationsContexts
     * @covers PEAR2\WindowsAzure\Services\Table\TableRestProxy::_constructDeleteEntityContext
     * @covers PEAR2\WindowsAzure\Services\Table\Utilities\MimeReaderWriter::encodeMimeMultipart
     * @covers PEAR2\WindowsAzure\Services\Table\Utilities\MimeReaderWriter::decodeMimeMultipart
     * @covers PEAR2\WindowsAzure\Services\Table\Models\BatchResult::create
     * @covers PEAR2\WindowsAzure\Services\Table\Models\BatchResult::_constructResponses
     * @covers PEAR2\WindowsAzure\Services\Table\Models\BatchResult::_compareUsingContentId
     * @covers PEAR2\WindowsAzure\Services\Core\ServiceRestProxy::sendContext
     */
    public function testBatchWithDelete()
    {
        // Setup
        $name = 'batchwithdelete';
        $this->createTable($name);
        $partitionKey = '123';
        $rowKey = '456';
        $expected = TestResources::getTestEntity($partitionKey, $rowKey);
        $r = $this->wrapper->insertEntity($name, $expected);
        $operations = new BatchOperations();
        $etag = $r->getEntity()->getEtag();
        $operations->addDeleteEntity($name, $partitionKey, $rowKey, $etag);
        
        // Test
        $this->wrapper->batch($operations);
        
        // Assert
        $result = $this->wrapper->queryEntities($name);
        $entities = $result->getEntities();
        $this->assertCount(0, $entities);
    }
    
    /**
     * @covers PEAR2\WindowsAzure\Services\Table\TableRestProxy::batch
     * @covers PEAR2\WindowsAzure\Services\Table\TableRestProxy::_createBatchRequestBody
     * @covers PEAR2\WindowsAzure\Services\Table\TableRestProxy::_getOperationContext
     * @covers PEAR2\WindowsAzure\Services\Table\TableRestProxy::_createOperationsContexts
     * @covers PEAR2\WindowsAzure\Services\Table\TableRestProxy::_constructPutOrMergeEntityContext
     * @covers PEAR2\WindowsAzure\Services\Table\Utilities\MimeReaderWriter::encodeMimeMultipart
     * @covers PEAR2\WindowsAzure\Services\Table\Utilities\MimeReaderWriter::decodeMimeMultipart
     * @covers PEAR2\WindowsAzure\Services\Table\Models\BatchResult::create
     * @covers PEAR2\WindowsAzure\Services\Table\Models\BatchResult::_constructResponses
     * @covers PEAR2\WindowsAzure\Services\Table\Models\BatchResult::_compareUsingContentId
     * @covers PEAR2\WindowsAzure\Services\Core\ServiceRestProxy::sendContext
     */
    public function testBatchWithUpdate()
    {
        // Setup
        $name = 'batchwithupdate';
        $this->createTable($name);
        $partitionKey = '123';
        $rowKey = '456';
        $expected = TestResources::getTestEntity($partitionKey, $rowKey);
        $this->wrapper->insertEntity($name, $expected);
        $result = $this->wrapper->queryEntities($name);
        $entities = $result->getEntities();
        $expected = $entities[0];
        $expected->addProperty('CustomerPlace', EdmType::STRING, 'Redmond');
        $operations = new BatchOperations();
        $operations->addUpdateEntity($name, $expected);
        
        // Test
        $result = $this->wrapper->batch($operations);
        
        // Assert
        $entries = $result->getEntries();
        $this->assertNotNull($entries[0]->getEtag());
        $result = $this->wrapper->queryEntities($name);
        $entities = $result->getEntities();
        $actual = $entities[0];
        $this->assertEquals($expected->getPartitionKey(), $actual->getPartitionKey());
        $this->assertEquals($expected->getRowKey(), $actual->getRowKey());
        $this->assertCount(count($expected->getProperties()), $actual->getProperties());
    }
    
    /**
     * @covers PEAR2\WindowsAzure\Services\Table\TableRestProxy::batch
     * @covers PEAR2\WindowsAzure\Services\Table\TableRestProxy::_createBatchRequestBody
     * @covers PEAR2\WindowsAzure\Services\Table\TableRestProxy::_getOperationContext
     * @covers PEAR2\WindowsAzure\Services\Table\TableRestProxy::_createOperationsContexts
     * @covers PEAR2\WindowsAzure\Services\Table\TableRestProxy::_constructPutOrMergeEntityContext
     * @covers PEAR2\WindowsAzure\Services\Table\Utilities\MimeReaderWriter::encodeMimeMultipart
     * @covers PEAR2\WindowsAzure\Services\Table\Utilities\MimeReaderWriter::decodeMimeMultipart
     * @covers PEAR2\WindowsAzure\Services\Table\Models\BatchResult::create
     * @covers PEAR2\WindowsAzure\Services\Table\Models\BatchResult::_constructResponses
     * @covers PEAR2\WindowsAzure\Services\Table\Models\BatchResult::_compareUsingContentId
     * @covers PEAR2\WindowsAzure\Services\Core\ServiceRestProxy::sendContext
     */
    public function testBatchWithMerge()
    {
        // Setup
        $name = 'batchwithmerge';
        $this->createTable($name);
        $partitionKey = '123';
        $rowKey = '456';
        $expected = TestResources::getTestEntity($partitionKey, $rowKey);
        $this->wrapper->insertEntity($name, $expected);
        $result = $this->wrapper->queryEntities($name);
        $entities = $result->getEntities();
        $expected = $entities[0];
        $expected->addProperty('CustomerPlace', EdmType::STRING, 'Redmond');
        $operations = new BatchOperations();
        $operations->addMergeEntity($name, $expected);
        
        // Test
        $result = $this->wrapper->batch($operations);
        
        // Assert
        $entries = $result->getEntries();
        $this->assertNotNull($entries[0]->getEtag());
        $result = $this->wrapper->queryEntities($name);
        $entities = $result->getEntities();
        $actual = $entities[0];
        $this->assertEquals($expected->getPartitionKey(), $actual->getPartitionKey());
        $this->assertEquals($expected->getRowKey(), $actual->getRowKey());
        $this->assertCount(count($expected->getProperties()), $actual->getProperties());
    }
    
    /**
     * @covers PEAR2\WindowsAzure\Services\Table\TableRestProxy::batch
     * @covers PEAR2\WindowsAzure\Services\Table\TableRestProxy::_createBatchRequestBody
     * @covers PEAR2\WindowsAzure\Services\Table\TableRestProxy::_getOperationContext
     * @covers PEAR2\WindowsAzure\Services\Table\TableRestProxy::_createOperationsContexts
     * @covers PEAR2\WindowsAzure\Services\Table\TableRestProxy::_constructPutOrMergeEntityContext
     * @covers PEAR2\WindowsAzure\Services\Table\Utilities\MimeReaderWriter::encodeMimeMultipart
     * @covers PEAR2\WindowsAzure\Services\Table\Utilities\MimeReaderWriter::decodeMimeMultipart
     * @covers PEAR2\WindowsAzure\Services\Table\Models\BatchResult::create
     * @covers PEAR2\WindowsAzure\Services\Table\Models\BatchResult::_constructResponses
     * @covers PEAR2\WindowsAzure\Services\Table\Models\BatchResult::_compareUsingContentId
     * @covers PEAR2\WindowsAzure\Services\Core\ServiceRestProxy::sendContext
     */
    public function testBatchWithInsertOrReplace()
    {
        // Setup
        $name = 'batchwithinsertorreplace';
        $this->createTable($name);
        $partitionKey = '123';
        $rowKey = '456';
        $expected = TestResources::getTestEntity($partitionKey, $rowKey);
        $this->wrapper->insertEntity($name, $expected);
        $result = $this->wrapper->queryEntities($name);
        $entities = $result->getEntities();
        $expected = $entities[0];
        $expected->addProperty('CustomerPlace', EdmType::STRING, 'Redmond');
        $operations = new BatchOperations();
        $operations->addInsertOrReplaceEntity($name, $expected);
        
        // Test
        $result = $this->wrapper->batch($operations);
        
        // Assert
        $entries = $result->getEntries();
        $this->assertNotNull($entries[0]->getEtag());
        $result = $this->wrapper->queryEntities($name);
        $entities = $result->getEntities();
        $actual = $entities[0];
        $this->assertEquals($expected->getPartitionKey(), $actual->getPartitionKey());
        $this->assertEquals($expected->getRowKey(), $actual->getRowKey());
        $this->assertCount(count($expected->getProperties()), $actual->getProperties());
    }
    
    /**
     * @covers PEAR2\WindowsAzure\Services\Table\TableRestProxy::batch
     * @covers PEAR2\WindowsAzure\Services\Table\TableRestProxy::_createBatchRequestBody
     * @covers PEAR2\WindowsAzure\Services\Table\TableRestProxy::_getOperationContext
     * @covers PEAR2\WindowsAzure\Services\Table\TableRestProxy::_createOperationsContexts
     * @covers PEAR2\WindowsAzure\Services\Table\TableRestProxy::_constructPutOrMergeEntityContext
     * @covers PEAR2\WindowsAzure\Services\Table\Utilities\MimeReaderWriter::encodeMimeMultipart
     * @covers PEAR2\WindowsAzure\Services\Table\Utilities\MimeReaderWriter::decodeMimeMultipart
     * @covers PEAR2\WindowsAzure\Services\Table\Models\BatchResult::create
     * @covers PEAR2\WindowsAzure\Services\Table\Models\BatchResult::_constructResponses
     * @covers PEAR2\WindowsAzure\Services\Table\Models\BatchResult::_compareUsingContentId
     * @covers PEAR2\WindowsAzure\Services\Core\ServiceRestProxy::sendContext
     */
    public function testBatchWithInsertOrMerge()
    {
        // Setup
        $name = 'batchwithinsertormerge';
        $this->createTable($name);
        $partitionKey = '123';
        $rowKey = '456';
        $expected = TestResources::getTestEntity($partitionKey, $rowKey);
        $this->wrapper->insertEntity($name, $expected);
        $result = $this->wrapper->queryEntities($name);
        $entities = $result->getEntities();
        $expected = $entities[0];
        $expected->addProperty('CustomerPlace', EdmType::STRING, 'Redmond');
        $operations = new BatchOperations();
        $operations->addInsertOrMergeEntity($name, $expected);
        
        // Test
        $result = $this->wrapper->batch($operations);
        
        // Assert
        $entries = $result->getEntries();
        $this->assertNotNull($entries[0]->getEtag());
        $result = $this->wrapper->queryEntities($name);
        $entities = $result->getEntities();
        $actual = $entities[0];
        $this->assertEquals($expected->getPartitionKey(), $actual->getPartitionKey());
        $this->assertEquals($expected->getRowKey(), $actual->getRowKey());
        $this->assertCount(count($expected->getProperties()), $actual->getProperties());
    }
    
    /**
     * @covers PEAR2\WindowsAzure\Services\Table\TableRestProxy::batch
     * @covers PEAR2\WindowsAzure\Services\Table\TableRestProxy::_createBatchRequestBody
     * @covers PEAR2\WindowsAzure\Services\Table\TableRestProxy::_getOperationContext
     * @covers PEAR2\WindowsAzure\Services\Table\TableRestProxy::_createOperationsContexts
     * @covers PEAR2\WindowsAzure\Services\Table\TableRestProxy::_constructPutOrMergeEntityContext
     * @covers PEAR2\WindowsAzure\Services\Table\Utilities\MimeReaderWriter::encodeMimeMultipart
     * @covers PEAR2\WindowsAzure\Services\Table\Utilities\MimeReaderWriter::decodeMimeMultipart
     * @covers PEAR2\WindowsAzure\Services\Table\Models\BatchResult::create
     * @covers PEAR2\WindowsAzure\Services\Table\Models\BatchResult::_constructResponses
     * @covers PEAR2\WindowsAzure\Services\Table\Models\BatchResult::_compareUsingContentId
     * @covers PEAR2\WindowsAzure\Services\Core\ServiceRestProxy::sendContext
     */
    public function testBatchWithMultipleOperations()
    {
        // Setup
        $name = 'batchwithwithmultipleoperations';
        $this->createTable($name);
        $partitionKey = '123';
        $rk1 = '456';
        $rk2 = '457';
        $rk3 = '458';
        $delete = TestResources::getTestEntity($partitionKey, $rk1);
        $insert = TestResources::getTestEntity($partitionKey, $rk2);
        $update = TestResources::getTestEntity($partitionKey, $rk3);
        $this->wrapper->insertEntity($name, $delete);
        $this->wrapper->insertEntity($name, $update);
        $result = $this->wrapper->queryEntities($name);
        $entities = $result->getEntities();
        $delete = $entities[0];
        $update = $entities[1];
        $update->addProperty('CustomerPlace', EdmType::STRING, 'Redmond');
        $operations = new BatchOperations();
        $operations->addInsertEntity($name, $insert);
        $operations->addUpdateEntity($name, $update);
        $operations->addDeleteEntity($name, $delete->getPartitionKey(), $delete->getRowKey(), $delete->getEtag());
        
        // Test
        $result = $this->wrapper->batch($operations);
        
        // Assert
        $this->assertTrue(true);
    }
    
    /**
     * @covers PEAR2\WindowsAzure\Services\Table\TableRestProxy::batch
     * @covers PEAR2\WindowsAzure\Services\Table\TableRestProxy::_createBatchRequestBody
     * @covers PEAR2\WindowsAzure\Services\Table\TableRestProxy::_getOperationContext
     * @covers PEAR2\WindowsAzure\Services\Table\TableRestProxy::_createOperationsContexts
     * @covers PEAR2\WindowsAzure\Services\Table\TableRestProxy::_constructPutOrMergeEntityContext
     * @covers PEAR2\WindowsAzure\Services\Table\Utilities\MimeReaderWriter::encodeMimeMultipart
     * @covers PEAR2\WindowsAzure\Services\Table\Utilities\MimeReaderWriter::decodeMimeMultipart
     * @covers PEAR2\WindowsAzure\Services\Table\Models\BatchResult::create
     * @covers PEAR2\WindowsAzure\Services\Table\Models\BatchResult::_constructResponses
     * @covers PEAR2\WindowsAzure\Services\Table\Models\BatchResult::_compareUsingContentId
     * @covers PEAR2\WindowsAzure\Services\Core\ServiceRestProxy::sendContext
     */
    public function testBatchWithDifferentPKFail()
    {
        // Setup
        $name = 'batchwithwithdifferentpkfail';
        $this->createTable($name);
        $partitionKey = '123';
        $rk1 = '456';
        $rk3 = '458';
        $delete = TestResources::getTestEntity($partitionKey, $rk1);
        $update = TestResources::getTestEntity($partitionKey, $rk3);
        $this->wrapper->insertEntity($name, $delete);
        $this->wrapper->insertEntity($name, $update);
        $result = $this->wrapper->queryEntities($name);
        $entities = $result->getEntities();
        $delete = $entities[0];
        $update = $entities[1];
        $update->addProperty('CustomerPlace', EdmType::STRING, 'Redmond');
        $operations = new BatchOperations();
        $operations->addUpdateEntity($name, $update);
        $operations->addDeleteEntity($name, '125', $delete->getRowKey(), $delete->getEtag());
        
        // Test
        $result = $this->wrapper->batch($operations);
        
        // Assert
        $this->assertTrue(true);
    }
}

?>
