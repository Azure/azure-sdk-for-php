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
 * @package   Tests\Unit\WindowsAzure\Table\internal
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */

namespace Tests\Unit\WindowsAzure\Table\internal;
use WindowsAzure\Common\Internal\Http\HttpClient;
use WindowsAzure\Table\Internal\AtomReaderWriter;
use WindowsAzure\Table\Internal\MimeReaderWriter;
use Tests\Framework\TableServiceRestProxyTestBase;
use WindowsAzure\Common\Internal\Utilities;
use WindowsAzure\Common\ServiceException;
use Tests\Framework\TestResources;
use WindowsAzure\Common\Internal\Resources;
use WindowsAzure\Table\TableRestProxy;
use WindowsAzure\Common\Models\ServiceProperties;
use WindowsAzure\Table\Models\QueryTablesOptions;
use WindowsAzure\Table\Models\Query;
use WindowsAzure\Table\Models\Filters\Filter;
use WindowsAzure\Table\Models\Entity;
use WindowsAzure\Table\Models\EdmType;
use WindowsAzure\Table\Models\QueryEntitiesOptions;
use WindowsAzure\Table\Models\BatchOperations;
use WindowsAzure\Common\Internal\Serialization\XmlSerializer;

/**
 * Unit tests for class TableRestProxy
 *
 * @category  Microsoft
 * @package   Tests\Unit\WindowsAzure\Table\internal
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: 0.4.0_2014-01
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
class TableRestProxyTest extends TableServiceRestProxyTestBase
{
    /**
     * @covers  WindowsAzure\Table\TableRestProxy::__construct
     */
    public function test__construct()
    {
        // Setup
        $channel = new HttpClient();
        $atomSerializer = new AtomReaderWriter();
        $mimeSerializer = new MimeReaderWriter();
        $url = 'http://www.microsoft.com';
        
        // Test
        $tableRestProxy = new TableRestProxy($channel, $url, $atomSerializer, $mimeSerializer, null);
        
        // Assert
        $this->assertNotNull($tableRestProxy);
    }
    
    /**
     * @covers WindowsAzure\Table\TableRestProxy::getServiceProperties
     * @covers WindowsAzure\Common\Internal\ServiceRestProxy::sendContext
     */
    public function testGetServiceProperties()
    {
        $this->skipIfEmulated();
        
        // Test
        $result = $this->restProxy->getServiceProperties();
        
        // Assert
        $this->assertEquals($this->defaultProperties->toArray(), $result->getValue()->toArray());
    }
    
    /**
     * @covers WindowsAzure\Table\TableRestProxy::setServiceProperties
     * @covers WindowsAzure\Common\Internal\ServiceRestProxy::sendContext
     */
    public function testSetServiceProperties()
    {
        $this->skipIfEmulated();
        
        // Setup
        $expected = ServiceProperties::create(TestResources::setServicePropertiesSample());
        
        // Test
        $this->setServiceProperties($expected);
        $actual = $this->restProxy->getServiceProperties();
        
        // Assert
        $this->assertEquals($expected->toXml($this->xmlSerializer), $actual->getValue()->toXml($this->xmlSerializer));
    }
    
    /**
     * @covers WindowsAzure\Table\TableRestProxy::setServiceProperties
     * @covers WindowsAzure\Common\Internal\ServiceRestProxy::sendContext
     */
    public function testSetServicePropertiesWithEmptyParts()
    {
        $this->skipIfEmulated();
        
        // Setup
        $xml = TestResources::setServicePropertiesSample();
        $xml['Metrics']['RetentionPolicy'] = null;
        $expected = ServiceProperties::create($xml);
        
        // Test
        $this->setServiceProperties($expected);
        $actual = $this->restProxy->getServiceProperties();
        
        // Assert
        $this->assertEquals($expected->toXml($this->xmlSerializer), $actual->getValue()->toXml($this->xmlSerializer));
    }
    
    /**
     * @covers WindowsAzure\Table\TableRestProxy::createTable
     * @covers WindowsAzure\Table\Internal\AtomReaderWriter::getTable
     * @covers WindowsAzure\Common\Internal\ServiceRestProxy::sendContext
     */
    public function testCreateTable()
    {
        // Setup
        $name = 'createtable';
        
        // Test
        $this->createTable($name);
        
        // Assert
        $result = $this->restProxy->queryTables();
        $this->assertCount(1, $result->getTables());
    }
    
    /**
     * @covers WindowsAzure\Table\TableRestProxy::getTable
     * @covers WindowsAzure\Common\Internal\ServiceRestProxy::sendContext
     * @covers WindowsAzure\Table\Internal\AtomReaderWriter::parseTable
     * @covers WindowsAzure\Table\Internal\AtomReaderWriter::_parseBody
     * @covers WindowsAzure\Table\Models\GetTableResult::create
     */
    public function testGetTable()
    {
        // Setup
        $name = 'gettable';
        $this->createTable($name);
        
        // Test
        $result = $this->restProxy->getTable($name);
        
        // Assert
        $this->assertEquals($name, $result->getName());
    }
    
    /**
     * @covers WindowsAzure\Table\TableRestProxy::deleteTable
     * @covers WindowsAzure\Common\Internal\ServiceRestProxy::sendContext
     */
    public function testDeleteTable()
    {
        // Setup
        $name = 'deletetable';
        $this->restProxy->createTable($name);
        
        // Test
        $this->restProxy->deleteTable($name);
        
        // Assert
        $result = $this->restProxy->queryTables();
        $this->assertCount(0, $result->getTables());
    }
    
    /**
     * @covers WindowsAzure\Table\TableRestProxy::queryTables
     * @covers WindowsAzure\Table\TableRestProxy::_buildFilterExpression
     * @covers WindowsAzure\Table\TableRestProxy::_buildFilterExpressionRec
     * @covers WindowsAzure\Table\TableRestProxy::_addOptionalQuery
     * @covers WindowsAzure\Table\TableRestProxy::_encodeODataUriValues
     * @covers WindowsAzure\Table\TableRestProxy::_encodeODataUriValue
     * @covers WindowsAzure\Table\Models\EdmType::serializeQueryValue
     * @covers WindowsAzure\Table\Models\QueryTablesResult::create
     * @covers WindowsAzure\Table\Internal\AtomReaderWriter::_parseBody
     * @covers WindowsAzure\Table\Internal\AtomReaderWriter::parseTableEntries
     * @covers WindowsAzure\Common\Internal\ServiceRestProxy::sendContext
     */
    public function testQueryTablesSimple()
    {
        // Setup
        $name1 = 'querytablessimple1';
        $name2 = 'querytablessimple2';
        $this->createTable($name1);
        $this->createTable($name2);
        
        // Test
        $result = $this->restProxy->queryTables();
        
        // Assert
        $tables = $result->getTables();
        $this->assertCount(2, $tables);
        $this->assertEquals($name1, $tables[0]);
        $this->assertEquals($name2, $tables[1]);
    }
    
    /**
     * @covers WindowsAzure\Table\TableRestProxy::queryTables
     * @covers WindowsAzure\Table\TableRestProxy::_buildFilterExpression
     * @covers WindowsAzure\Table\TableRestProxy::_buildFilterExpressionRec
     * @covers WindowsAzure\Table\TableRestProxy::_addOptionalQuery
     * @covers WindowsAzure\Table\TableRestProxy::_encodeODataUriValues
     * @covers WindowsAzure\Table\TableRestProxy::_encodeODataUriValue
     * @covers WindowsAzure\Table\Models\EdmType::serializeQueryValue
     * @covers WindowsAzure\Table\Models\QueryTablesResult::create
     * @covers WindowsAzure\Table\Internal\AtomReaderWriter::_parseBody
     * @covers WindowsAzure\Table\Internal\AtomReaderWriter::parseTableEntries
     * @covers WindowsAzure\Common\Internal\ServiceRestProxy::sendContext
     */
    public function testQueryTablesOneTable()
    {
        // Setup
        $name1 = 'querytablesonetable';
        $this->createTable($name1);
        
        // Test
        $result = $this->restProxy->queryTables();
        
        // Assert
        $tables = $result->getTables();
        $this->assertCount(1, $tables);
        $this->assertEquals($name1, $tables[0]);
    }
    
    /**
     * @covers WindowsAzure\Table\TableRestProxy::queryTables
     * @covers WindowsAzure\Table\TableRestProxy::_buildFilterExpression
     * @covers WindowsAzure\Table\TableRestProxy::_buildFilterExpressionRec
     * @covers WindowsAzure\Table\TableRestProxy::_addOptionalQuery
     * @covers WindowsAzure\Table\TableRestProxy::_encodeODataUriValues
     * @covers WindowsAzure\Table\TableRestProxy::_encodeODataUriValue
     * @covers WindowsAzure\Table\Models\EdmType::serializeQueryValue
     * @covers WindowsAzure\Table\Models\QueryTablesResult::create
     * @covers WindowsAzure\Table\Internal\AtomReaderWriter::_parseBody
     * @covers WindowsAzure\Table\Internal\AtomReaderWriter::parseTableEntries
     * @covers WindowsAzure\Common\Internal\ServiceRestProxy::sendContext
     */
    public function testQueryTablesEmpty()
    {
        // Test
        $result = $this->restProxy->queryTables();
        
        // Assert
        $tables = $result->getTables();
        $this->assertCount(0, $tables);
    }
    
    /**
     * @covers WindowsAzure\Table\TableRestProxy::queryTables
     * @covers WindowsAzure\Table\TableRestProxy::_buildFilterExpression
     * @covers WindowsAzure\Table\TableRestProxy::_buildFilterExpressionRec
     * @covers WindowsAzure\Table\TableRestProxy::_addOptionalQuery
     * @covers WindowsAzure\Table\TableRestProxy::_encodeODataUriValues
     * @covers WindowsAzure\Table\TableRestProxy::_encodeODataUriValue
     * @covers WindowsAzure\Table\Models\EdmType::serializeQueryValue
     * @covers WindowsAzure\Table\Models\QueryTablesResult::create
     * @covers WindowsAzure\Table\Internal\AtomReaderWriter::_parseBody
     * @covers WindowsAzure\Table\Internal\AtomReaderWriter::parseTableEntries
     * @covers WindowsAzure\Common\Internal\ServiceRestProxy::sendContext
     */
    public function testQueryTablesWithPrefix()
    {
        $this->skipIfEmulated();
        
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
        $result = $this->restProxy->queryTables($options);
        
        // Assert
        $tables = $result->getTables();
        $this->assertCount(2, $tables);
        $this->assertEquals($name2, $tables[0]);
        $this->assertEquals($name3, $tables[1]);
    }
    
    /**
     * @covers WindowsAzure\Table\TableRestProxy::queryTables
     * @covers WindowsAzure\Table\TableRestProxy::_buildFilterExpression
     * @covers WindowsAzure\Table\TableRestProxy::_buildFilterExpressionRec
     * @covers WindowsAzure\Table\TableRestProxy::_addOptionalQuery
     * @covers WindowsAzure\Table\TableRestProxy::_encodeODataUriValues
     * @covers WindowsAzure\Table\TableRestProxy::_encodeODataUriValue
     * @covers WindowsAzure\Table\Models\EdmType::serializeQueryValue
     * @covers WindowsAzure\Table\Models\QueryTablesResult::create
     * @covers WindowsAzure\Table\Internal\AtomReaderWriter::_parseBody
     * @covers WindowsAzure\Table\Internal\AtomReaderWriter::parseTableEntries
     * @covers WindowsAzure\Common\Internal\ServiceRestProxy::sendContext
     */
    public function testQueryTablesWithStringOption()
    {
        $this->skipIfEmulated();
        
        // Setup
        $name1 = 'wquerytableswithstringoption1';
        $name2 = 'querytableswithstringoption2';
        $name3 = 'querytableswithstringoption3';
        $prefix = 'q';
        $this->createTable($name1);
        $this->createTable($name2);
        $this->createTable($name3);
        
        // Test
        $result = $this->restProxy->queryTables($prefix);
        
        // Assert
        $tables = $result->getTables();
        $this->assertCount(2, $tables);
        $this->assertEquals($name2, $tables[0]);
        $this->assertEquals($name3, $tables[1]);
    }
    
    /**
     * @covers WindowsAzure\Table\TableRestProxy::queryTables
     * @covers WindowsAzure\Table\TableRestProxy::_buildFilterExpression
     * @covers WindowsAzure\Table\TableRestProxy::_buildFilterExpressionRec
     * @covers WindowsAzure\Table\TableRestProxy::_addOptionalQuery
     * @covers WindowsAzure\Table\TableRestProxy::_encodeODataUriValues
     * @covers WindowsAzure\Table\TableRestProxy::_encodeODataUriValue
     * @covers WindowsAzure\Table\Models\EdmType::serializeQueryValue
     * @covers WindowsAzure\Table\Models\QueryTablesResult::create
     * @covers WindowsAzure\Table\Internal\AtomReaderWriter::_parseBody
     * @covers WindowsAzure\Table\Internal\AtomReaderWriter::parseTableEntries
     * @covers WindowsAzure\Common\Internal\ServiceRestProxy::sendContext
     */
    public function testQueryTablesWithFilterOption()
    {
        $this->skipIfEmulated();
        
        // Setup
        $name1 = 'wquerytableswithfilteroption1';
        $name2 = 'querytableswithfilteroption2';
        $name3 = 'querytableswithfilteroption3';
        $prefix = 'q';
        $prefixFilter = Filter::applyAnd(
                Filter::applyGe(
                    Filter::applyPropertyName('TableName'),
                    Filter::applyConstant($prefix, EdmType::STRING)
                ),
                Filter::applyLe(
                    Filter::applyPropertyName('TableName'),
                    Filter::applyConstant($prefix . '{', EdmType::STRING)
                )
            );
        $this->createTable($name1);
        $this->createTable($name2);
        $this->createTable($name3);
        
        // Test
        $result = $this->restProxy->queryTables($prefixFilter);
        
        // Assert
        $tables = $result->getTables();
        $this->assertCount(2, $tables);
        $this->assertEquals($name2, $tables[0]);
        $this->assertEquals($name3, $tables[1]);
    }
    
    /**
     * @covers WindowsAzure\Table\TableRestProxy::insertEntity
     * @covers WindowsAzure\Table\TableRestProxy::_constructInsertEntityContext
     * @covers WindowsAzure\Table\Models\EdmType::serializeValue
     * @covers WindowsAzure\Table\Internal\AtomReaderWriter::_parseBody
     * @covers WindowsAzure\Table\Internal\AtomReaderWriter::getEntity
     * @covers WindowsAzure\Table\Internal\AtomReaderWriter::parseEntity
     * @covers WindowsAzure\Table\Internal\AtomReaderWriter::_parseOneEntity
     * @covers WindowsAzure\Table\Models\InsertEntityResult::create
     * @covers WindowsAzure\Common\Internal\ServiceRestProxy::sendContext
     */
    public function testInsertEntity()
    {
        // Setup
        $name = 'insertentity';
        $this->createTable($name);
        $expected = TestResources::getTestEntity('123', '456');
        
        // Test
        $result = $this->restProxy->insertEntity($name, $expected);
        
        // Assert
        $actual = $result->getEntity();
        $this->assertEquals($expected->getPartitionKey(), $actual->getPartitionKey());
        $this->assertEquals($expected->getRowKey(), $actual->getRowKey());
        // Add extra count for the properties because the Timestamp property
        $this->assertCount(count($expected->getProperties()) + 1, $actual->getProperties());
    }
    
    /**
     * @covers WindowsAzure\Table\TableRestProxy::queryEntities
     * @covers WindowsAzure\Table\Internal\AtomReaderWriter::_parseBody
     * @covers WindowsAzure\Table\Internal\AtomReaderWriter::parseEntities
     * @covers WindowsAzure\Table\Internal\AtomReaderWriter::_parseOneEntity
     * @covers WindowsAzure\Common\Internal\ServiceRestProxy::sendContext
     */
    public function testQueryEntitiesWithEmpty()
    {
        // Setup
        $name = 'queryentitieswithempty';
        $this->createTable($name);
        
        // Test
        $result = $this->restProxy->queryEntities($name);
        
        // Assert
        $entities = $result->getEntities();
        $this->assertCount(0, $entities);
        
    }
    
    /**
     * @covers WindowsAzure\Table\TableRestProxy::queryEntities
     * @covers WindowsAzure\Table\Internal\AtomReaderWriter::_parseBody
     * @covers WindowsAzure\Table\Internal\AtomReaderWriter::parseEntities
     * @covers WindowsAzure\Table\Internal\AtomReaderWriter::_parseOneEntity
     * @covers WindowsAzure\Common\Internal\ServiceRestProxy::sendContext
     */
    public function testQueryEntitiesWithOneEntity()
    {
        // Setup
        $name = 'queryentitieswithoneentity';
        $pk1 = '123';
        $e1 = TestResources::getTestEntity($pk1, '1');
        $this->createTable($name);
        $this->restProxy->insertEntity($name, $e1);
        
        // Test
        $result = $this->restProxy->queryEntities($name);
        
        // Assert
        $entities = $result->getEntities();
        $this->assertCount(1, $entities);
        $this->assertEquals($pk1, $entities[0]->getPartitionKey());
    }
    
    /**
     * @covers WindowsAzure\Table\TableRestProxy::queryEntities
     * @covers WindowsAzure\Table\TableRestProxy::_addOptionalQuery
     * @covers WindowsAzure\Table\TableRestProxy::_encodeODataUriValues
     * @covers WindowsAzure\Table\TableRestProxy::_encodeODataUriValue
     * @covers WindowsAzure\Table\Internal\AtomReaderWriter::_parseBody
     * @covers WindowsAzure\Table\Internal\AtomReaderWriter::parseEntities
     * @covers WindowsAzure\Table\Internal\AtomReaderWriter::_parseOneEntity
     * @covers WindowsAzure\Common\Internal\ServiceRestProxy::sendContext
     */
    public function testQueryEntitiesQueryStringOption()
    {
        $this->skipIfEmulated();
        
        // Setup
        $name = 'queryentitieswithquerystringoption';
        $pk1 = '123';
        $pk2 = '124';
        $pk3 = '125';
        $e1 = TestResources::getTestEntity($pk1, '1');
        $e2 = TestResources::getTestEntity($pk2, '2');
        $e3 = TestResources::getTestEntity($pk3, '3');
        $this->createTable($name);
        $this->restProxy->insertEntity($name, $e1);
        $this->restProxy->insertEntity($name, $e2);
        $this->restProxy->insertEntity($name, $e3);
        $queryString = "PartitionKey eq '123'";
        
        // Test
        $result = $this->restProxy->queryEntities($name, $queryString);
        
        // Assert
        $entities = $result->getEntities();
        $this->assertCount(1, $entities);
        $this->assertEquals($pk1, $entities[0]->getPartitionKey());
    }
    
    /**
     * @covers WindowsAzure\Table\TableRestProxy::queryEntities
     * @covers WindowsAzure\Table\TableRestProxy::_addOptionalQuery
     * @covers WindowsAzure\Table\TableRestProxy::_encodeODataUriValues
     * @covers WindowsAzure\Table\TableRestProxy::_encodeODataUriValue
     * @covers WindowsAzure\Table\Internal\AtomReaderWriter::_parseBody
     * @covers WindowsAzure\Table\Internal\AtomReaderWriter::parseEntities
     * @covers WindowsAzure\Table\Internal\AtomReaderWriter::_parseOneEntity
     * @covers WindowsAzure\Common\Internal\ServiceRestProxy::sendContext
     */
    public function testQueryEntitiesFilterOption()
    {
        $this->skipIfEmulated();
        
        // Setup
        $name = 'queryentitieswithfilteroption';
        $pk1 = '123';
        $pk2 = '124';
        $pk3 = '125';
        $e1 = TestResources::getTestEntity($pk1, '1');
        $e2 = TestResources::getTestEntity($pk2, '2');
        $e3 = TestResources::getTestEntity($pk3, '3');
        $this->createTable($name);
        $this->restProxy->insertEntity($name, $e1);
        $this->restProxy->insertEntity($name, $e2);
        $this->restProxy->insertEntity($name, $e3);
        $queryString = "PartitionKey eq '123'";
        $filter = Filter::applyQueryString($queryString);
        
        // Test
        $result = $this->restProxy->queryEntities($name, $filter);
        
        // Assert
        $entities = $result->getEntities();
        $this->assertCount(1, $entities);
        $this->assertEquals($pk1, $entities[0]->getPartitionKey());
    }
    
    /**
     * @covers WindowsAzure\Table\TableRestProxy::queryEntities
     * @covers WindowsAzure\Table\TableRestProxy::_addOptionalQuery
     * @covers WindowsAzure\Table\TableRestProxy::_encodeODataUriValues
     * @covers WindowsAzure\Table\TableRestProxy::_encodeODataUriValue
     * @covers WindowsAzure\Table\Internal\AtomReaderWriter::_parseBody
     * @covers WindowsAzure\Table\Internal\AtomReaderWriter::parseEntities
     * @covers WindowsAzure\Table\Internal\AtomReaderWriter::_parseOneEntity
     * @covers WindowsAzure\Common\Internal\ServiceRestProxy::sendContext
     */
    public function testQueryEntitiesWithMultipleEntities()
    {
        $this->skipIfEmulated();
        
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
        $this->restProxy->insertEntity($name, $e1);
        $this->restProxy->insertEntity($name, $e2);
        $this->restProxy->insertEntity($name, $e3);
        $query = new Query();
        $query->addSelectField('CustomerId');
        $options = new QueryEntitiesOptions();
        $options->setQuery($query);
        
        // Test
        $result = $this->restProxy->queryEntities($name, $options);
        
        // Assert
        $entities = $result->getEntities();
        $this->assertCount(3, $entities);
        $this->assertEquals($expected, $entities[0]->getProperty($field)->getValue());
        $this->assertEquals($expected, $entities[1]->getProperty($field)->getValue());
        $this->assertEquals($expected, $entities[2]->getProperty($field)->getValue());
    }
    
    /**
     * @covers WindowsAzure\Table\TableRestProxy::queryEntities
     * @covers WindowsAzure\Table\TableRestProxy::_addOptionalQuery
     * @covers WindowsAzure\Table\TableRestProxy::_encodeODataUriValues
     * @covers WindowsAzure\Table\TableRestProxy::_encodeODataUriValue
     * @covers WindowsAzure\Table\Internal\AtomReaderWriter::_parseBody
     * @covers WindowsAzure\Table\Internal\AtomReaderWriter::parseEntities
     * @covers WindowsAzure\Table\Internal\AtomReaderWriter::_parseOneEntity
     * @covers WindowsAzure\Common\Internal\ServiceRestProxy::sendContext
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
        $this->restProxy->insertEntity($name, $e1);
        $this->restProxy->insertEntity($name, $e2);
        $this->restProxy->insertEntity($name, $e3);
        $query = new Query();
        $query->setTop(1);
        $options = new QueryEntitiesOptions();
        $options->setQuery($query);
        
        // Test
        $result = $this->restProxy->queryEntities($name, $options);
        
        // Assert
        $entities = $result->getEntities();
        $this->assertCount(1, $entities);
        $this->assertEquals($pk1, $entities[0]->getPartitionKey());
    }
    
    /**
     * @covers WindowsAzure\Table\TableRestProxy::updateEntity
     * @covers WindowsAzure\Table\TableRestProxy::_getEntityPath
     * @covers WindowsAzure\Table\TableRestProxy::_putOrMergeEntityImpl
     * @covers WindowsAzure\Table\TableRestProxy::_constructPutOrMergeEntityContext
     * @covers WindowsAzure\Table\Models\EdmType::serializeValue
     * @covers WindowsAzure\Table\Internal\AtomReaderWriter::_parseBody
     * @covers WindowsAzure\Table\Internal\AtomReaderWriter::getEntity
     * @covers WindowsAzure\Table\Models\UpdateEntityResult::create
     * @covers WindowsAzure\Common\Internal\ServiceRestProxy::sendContext
     */
    public function testUpdateEntity()
    {
        // Setup
        $name = 'updateentity';
        $this->createTable($name);
        $expected = TestResources::getTestEntity('123', '456');
        $this->restProxy->insertEntity($name, $expected);
        $result = $this->restProxy->queryEntities($name);
        $entities = $result->getEntities();
        $expected = $entities[0];
        $expected->addProperty('CustomerPlace', EdmType::STRING, 'Redmond');
        
        // Test
        $result = $this->restProxy->UpdateEntity($name, $expected);
        
        // Assert
        $this->assertNotNull($result);
        $result = $this->restProxy->queryEntities($name);
        $entities = $result->getEntities();
        $actual = $entities[0];
        $this->assertEquals($expected->getPartitionKey(), $actual->getPartitionKey());
        $this->assertEquals($expected->getRowKey(), $actual->getRowKey());
        $this->assertCount(count($expected->getProperties()), $actual->getProperties());
    }
    
    /**
     * @covers WindowsAzure\Table\TableRestProxy::insertEntity
     * @covers WindowsAzure\Table\TableRestProxy::_constructInsertEntityContext
     * @covers WindowsAzure\Table\Models\EdmType::serializeValue
     * @covers WindowsAzure\Table\Internal\AtomReaderWriter::_parseBody
     * @covers WindowsAzure\Table\Internal\AtomReaderWriter::getEntity
     * @covers WindowsAzure\Table\Internal\AtomReaderWriter::parseEntity
     * @covers WindowsAzure\Table\Internal\AtomReaderWriter::_parseOneEntity
     * @covers WindowsAzure\Table\Models\InsertEntityResult::create
     * @covers WindowsAzure\Common\Internal\ServiceRestProxy::sendContext
     */
    public function testUpdateEntityWithDeleteProperty()
    {
        $this->skipIfEmulated();
        
        // Setup
        $name = 'updateentitywithdeleteproperty';
        $this->createTable($name);
        $expected = TestResources::getTestEntity('123', '456');
        $this->restProxy->insertEntity($name, $expected);
        $expected->setPropertyValue('CustomerId', null);
        
        // Test
        $result = $this->restProxy->updateEntity($name, $expected);
        
        // Assert
        $this->assertNotNull($result);
        $actual = $this->restProxy->getEntity($name, $expected->getPartitionKey(), $expected->getRowKey());
        $this->assertEquals($expected->getPartitionKey(), $actual->getEntity()->getPartitionKey());
        $this->assertEquals($expected->getRowKey(), $actual->getEntity()->getRowKey());
        // Add +1 to the count to include Timestamp property.
        $this->assertCount(count($expected->getProperties()), $actual->getEntity()->getProperties());
    }
    
    /**
     * @covers WindowsAzure\Table\TableRestProxy::mergeEntity
     * @covers WindowsAzure\Table\TableRestProxy::_getEntityPath
     * @covers WindowsAzure\Table\TableRestProxy::_putOrMergeEntityImpl
     * @covers WindowsAzure\Table\TableRestProxy::_constructPutOrMergeEntityContext
     * @covers WindowsAzure\Table\Models\EdmType::serializeValue
     * @covers WindowsAzure\Table\Internal\AtomReaderWriter::_parseBody
     * @covers WindowsAzure\Table\Internal\AtomReaderWriter::getEntity
     * @covers WindowsAzure\Table\Models\UpdateEntityResult::create
     * @covers WindowsAzure\Common\Internal\ServiceRestProxy::sendContext
     */
    public function testMergeEntity()
    {
        // Setup
        $name = 'mergeentity';
        $this->createTable($name);
        $expected = TestResources::getTestEntity('123', '456');
        $this->restProxy->insertEntity($name, $expected);
        $result = $this->restProxy->queryEntities($name);
        $entities = $result->getEntities();
        $expected = $entities[0];
        $expected->addProperty('CustomerPhone', EdmType::STRING, '99999999');
        
        // Test
        $result = $this->restProxy->mergeEntity($name, $expected);
        
        // Assert
        $this->assertNotNull($result);
        $result = $this->restProxy->queryEntities($name);
        $entities = $result->getEntities();
        $actual = $entities[0];
        $this->assertEquals($expected->getPartitionKey(), $actual->getPartitionKey());
        $this->assertEquals($expected->getRowKey(), $actual->getRowKey());
        $this->assertCount(count($expected->getProperties()), $actual->getProperties());
    }
    
    /**
     * @covers WindowsAzure\Table\TableRestProxy::insertOrReplaceEntity
     * @covers WindowsAzure\Table\TableRestProxy::_getEntityPath
     * @covers WindowsAzure\Table\TableRestProxy::_putOrMergeEntityImpl
     * @covers WindowsAzure\Table\TableRestProxy::_constructPutOrMergeEntityContext
     * @covers WindowsAzure\Table\Internal\AtomReaderWriter::_parseBody
     * @covers WindowsAzure\Table\Internal\AtomReaderWriter::getEntity
     * @covers WindowsAzure\Table\Models\UpdateEntityResult::create
     * @covers WindowsAzure\Common\Internal\ServiceRestProxy::sendContext
     */
    public function testInsertOrReplaceEntity()
    {
        $this->skipIfEmulated();
        
        // Setup
        $name = 'insertorreplaceentity';
        $this->createTable($name);
        $expected = TestResources::getTestEntity('123', '456');
        $this->restProxy->insertEntity($name, $expected);
        $result = $this->restProxy->queryEntities($name);
        $entities = $result->getEntities();
        $expected = $entities[0];
        $expected->addProperty('CustomerPlace', EdmType::STRING, 'Redmond');
        
        // Test
        $result = $this->restProxy->InsertOrReplaceEntity($name, $expected);
        
        // Assert
        $this->assertNotNull($result);
        $result = $this->restProxy->queryEntities($name);
        $entities = $result->getEntities();
        $actual = $entities[0];
        $this->assertEquals($expected->getPartitionKey(), $actual->getPartitionKey());
        $this->assertEquals($expected->getRowKey(), $actual->getRowKey());
        $this->assertCount(count($expected->getProperties()), $actual->getProperties());
    }
    
    /**
     * @covers WindowsAzure\Table\TableRestProxy::InsertOrMergeEntity
     * @covers WindowsAzure\Table\TableRestProxy::_getEntityPath
     * @covers WindowsAzure\Table\TableRestProxy::_putOrMergeEntityImpl
     * @covers WindowsAzure\Table\TableRestProxy::_constructPutOrMergeEntityContext
     * @covers WindowsAzure\Table\Internal\AtomReaderWriter::_parseBody
     * @covers WindowsAzure\Table\Internal\AtomReaderWriter::getEntity
     * @covers WindowsAzure\Table\Models\UpdateEntityResult::create
     * @covers WindowsAzure\Common\Internal\ServiceRestProxy::sendContext
     */
    public function testInsertOrMergeEntity()
    {
        $this->skipIfEmulated();
        
        // Setup
        $name = 'insertormergeentity';
        $this->createTable($name);
        $expected = TestResources::getTestEntity('123', '456');
        $this->restProxy->insertEntity($name, $expected);
        $result = $this->restProxy->queryEntities($name);
        $entities = $result->getEntities();
        $expected = $entities[0];
        $expected->addProperty('CustomerPhone', EdmType::STRING, '99999999');
        
        // Test
        $result = $this->restProxy->InsertOrMergeEntity($name, $expected);
        
        // Assert
        $this->assertNotNull($result);
        $result = $this->restProxy->queryEntities($name);
        $entities = $result->getEntities();
        $actual = $entities[0];
        $this->assertEquals($expected->getPartitionKey(), $actual->getPartitionKey());
        $this->assertEquals($expected->getRowKey(), $actual->getRowKey());
        $this->assertCount(count($expected->getProperties()), $actual->getProperties());
    }
    
    /**
     * @covers WindowsAzure\Table\TableRestProxy::deleteEntity
     * @covers WindowsAzure\Table\TableRestProxy::_getEntityPath
     * @covers WindowsAzure\Table\TableRestProxy::_constructDeleteEntityContext
     * @covers WindowsAzure\Common\Internal\ServiceRestProxy::sendContext
     */
    public function testDeleteEntity()
    {
        // Setup
        $name = 'deleteentity';
        $this->createTable($name);
        $partitionKey = '123';
        $rowKey = '456';
        $entity = TestResources::getTestEntity($partitionKey, $rowKey);
        $result = $this->restProxy->insertEntity($name, $entity);
        
        // Test
        $this->restProxy->deleteEntity($name, $partitionKey, $rowKey);
        
        // Assert
        $result = $this->restProxy->queryEntities($name);
        $entities = $result->getEntities();
        $this->assertCount(0, $entities);
    }
    
    /**
     * @covers WindowsAzure\Table\TableRestProxy::deleteEntity
     * @covers WindowsAzure\Table\TableRestProxy::_getEntityPath
     * @covers WindowsAzure\Table\TableRestProxy::_constructDeleteEntityContext
     * @covers WindowsAzure\Common\Internal\ServiceRestProxy::sendContext
     */
    public function testDeleteEntityWithSpecialChars()
    {
        // Setup
        $name = 'deleteentitywithspecialchars';
        $this->createTable($name);
        $partitionKey = '123';
        $rowKey = 'key with spaces';
        $entity = TestResources::getTestEntity($partitionKey, $rowKey);
        $result = $this->restProxy->insertEntity($name, $entity);
        
        // Test
        $this->restProxy->deleteEntity($name, $partitionKey, $rowKey);
        
        // Assert
        $result = $this->restProxy->queryEntities($name);
        $entities = $result->getEntities();
        $this->assertCount(0, $entities);
    }
    
    /**
     * @covers WindowsAzure\Table\TableRestProxy::getEntity
     * @covers WindowsAzure\Table\Internal\AtomReaderWriter::_parseBody
     * @covers WindowsAzure\Table\Internal\AtomReaderWriter::parseEntity
     * @covers WindowsAzure\Table\Internal\AtomReaderWriter::_parseOneEntity
     * @covers WindowsAzure\Common\Internal\ServiceRestProxy::sendContext
     */
    public function testGetEntity()
    {
        // Setup
        $name = 'getentity';
        $this->createTable($name);
        $partitionKey = '123';
        $rowKey = '456';
        $expected = TestResources::getTestEntity($partitionKey, $rowKey);
        $this->restProxy->insertEntity($name, $expected);
        
        // Test
        $result = $this->restProxy->getEntity($name, $partitionKey, $rowKey);
        
        // Assert
        $actual = $result->getEntity();
        $this->assertEquals($expected->getPartitionKey(), $actual->getPartitionKey());
        $this->assertEquals($expected->getRowKey(), $actual->getRowKey());
        // Increase thec properties count to incloude the Timestamp property.
        $this->assertCount(count($expected->getProperties()) + 1, $actual->getProperties());
    }
    
    /**
     * @covers WindowsAzure\Table\TableRestProxy::batch
     * @covers WindowsAzure\Table\TableRestProxy::_createBatchRequestBody
     * @covers WindowsAzure\Table\TableRestProxy::_getOperationContext
     * @covers WindowsAzure\Table\TableRestProxy::_constructInsertEntityContext
     * @covers WindowsAzure\Table\TableRestProxy::_createOperationsContexts
     * @covers WindowsAzure\Table\Internal\MimeReaderWriter::encodeMimeMultipart
     * @covers WindowsAzure\Table\Internal\MimeReaderWriter::decodeMimeMultipart
     * @covers WindowsAzure\Table\Models\BatchResult::create
     * @covers WindowsAzure\Table\Models\BatchResult::_constructResponses
     * @covers WindowsAzure\Table\Models\BatchResult::_compareUsingContentId
     * @covers WindowsAzure\Common\Internal\ServiceRestProxy::sendContext
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
        $result = $this->restProxy->batch($operations);
        
        // Assert
        $entries = $result->getEntries();
        $actual = $entries[0]->getEntity();
        $this->assertEquals($expected->getPartitionKey(), $actual->getPartitionKey());
        $this->assertEquals($expected->getRowKey(), $actual->getRowKey());
        // Increase the properties count to include Timestamp property.
        $this->assertCount(count($expected->getProperties()) + 1, $actual->getProperties());
    }
    
    /**
     * @covers WindowsAzure\Table\TableRestProxy::batch
     * @covers WindowsAzure\Table\TableRestProxy::_createBatchRequestBody
     * @covers WindowsAzure\Table\TableRestProxy::_getOperationContext
     * @covers WindowsAzure\Table\TableRestProxy::_createOperationsContexts
     * @covers WindowsAzure\Table\TableRestProxy::_constructDeleteEntityContext
     * @covers WindowsAzure\Table\Internal\MimeReaderWriter::encodeMimeMultipart
     * @covers WindowsAzure\Table\Internal\MimeReaderWriter::decodeMimeMultipart
     * @covers WindowsAzure\Table\Models\BatchResult::create
     * @covers WindowsAzure\Table\Models\BatchResult::_constructResponses
     * @covers WindowsAzure\Table\Models\BatchResult::_compareUsingContentId
     * @covers WindowsAzure\Common\Internal\ServiceRestProxy::sendContext
     */
    public function testBatchWithDelete()
    {
        // Setup
        $name = 'batchwithdelete';
        $this->createTable($name);
        $partitionKey = '123';
        $rowKey = '456';
        $expected = TestResources::getTestEntity($partitionKey, $rowKey);
        $this->restProxy->insertEntity($name, $expected);
        $operations = new BatchOperations();
        $operations->addDeleteEntity($name, $partitionKey, $rowKey);
        
        // Test
        $this->restProxy->batch($operations);
        
        // Assert
        $result = $this->restProxy->queryEntities($name);
        $entities = $result->getEntities();
        $this->assertCount(0, $entities);
    }
    
    /**
     * @covers WindowsAzure\Table\TableRestProxy::batch
     * @covers WindowsAzure\Table\TableRestProxy::_createBatchRequestBody
     * @covers WindowsAzure\Table\TableRestProxy::_getOperationContext
     * @covers WindowsAzure\Table\TableRestProxy::_createOperationsContexts
     * @covers WindowsAzure\Table\TableRestProxy::_constructPutOrMergeEntityContext
     * @covers WindowsAzure\Table\Internal\MimeReaderWriter::encodeMimeMultipart
     * @covers WindowsAzure\Table\Internal\MimeReaderWriter::decodeMimeMultipart
     * @covers WindowsAzure\Table\Models\BatchResult::create
     * @covers WindowsAzure\Table\Models\BatchResult::_constructResponses
     * @covers WindowsAzure\Table\Models\BatchResult::_compareUsingContentId
     * @covers WindowsAzure\Common\Internal\ServiceRestProxy::sendContext
     */
    public function testBatchWithUpdate()
    {
        // Setup
        $name = 'batchwithupdate';
        $this->createTable($name);
        $partitionKey = '123';
        $rowKey = '456';
        $expected = TestResources::getTestEntity($partitionKey, $rowKey);
        $this->restProxy->insertEntity($name, $expected);
        $result = $this->restProxy->queryEntities($name);
        $entities = $result->getEntities();
        $expected = $entities[0];
        $expected->addProperty('CustomerPlace', EdmType::STRING, 'Redmond');
        $operations = new BatchOperations();
        $operations->addUpdateEntity($name, $expected);
        
        // Test
        $result = $this->restProxy->batch($operations);
        
        // Assert
        $entries = $result->getEntries();
        $this->assertNotNull($entries[0]->getETag());
        $result = $this->restProxy->queryEntities($name);
        $entities = $result->getEntities();
        $actual = $entities[0];
        $this->assertEquals($expected->getPartitionKey(), $actual->getPartitionKey());
        $this->assertEquals($expected->getRowKey(), $actual->getRowKey());
        $this->assertCount(count($expected->getProperties()), $actual->getProperties());
    }
    
    /**
     * @covers WindowsAzure\Table\TableRestProxy::batch
     * @covers WindowsAzure\Table\TableRestProxy::_createBatchRequestBody
     * @covers WindowsAzure\Table\TableRestProxy::_getOperationContext
     * @covers WindowsAzure\Table\TableRestProxy::_createOperationsContexts
     * @covers WindowsAzure\Table\TableRestProxy::_constructPutOrMergeEntityContext
     * @covers WindowsAzure\Table\Internal\MimeReaderWriter::encodeMimeMultipart
     * @covers WindowsAzure\Table\Internal\MimeReaderWriter::decodeMimeMultipart
     * @covers WindowsAzure\Table\Models\BatchResult::create
     * @covers WindowsAzure\Table\Models\BatchResult::_constructResponses
     * @covers WindowsAzure\Table\Models\BatchResult::_compareUsingContentId
     * @covers WindowsAzure\Common\Internal\ServiceRestProxy::sendContext
     */
    public function testBatchWithMerge()
    {
        // Setup
        $name = 'batchwithmerge';
        $this->createTable($name);
        $partitionKey = '123';
        $rowKey = '456';
        $expected = TestResources::getTestEntity($partitionKey, $rowKey);
        $this->restProxy->insertEntity($name, $expected);
        $result = $this->restProxy->queryEntities($name);
        $entities = $result->getEntities();
        $expected = $entities[0];
        $expected->addProperty('CustomerPlace', EdmType::STRING, 'Redmond');
        $operations = new BatchOperations();
        $operations->addMergeEntity($name, $expected);
        
        // Test
        $result = $this->restProxy->batch($operations);
        
        // Assert
        $entries = $result->getEntries();
        $this->assertNotNull($entries[0]->getETag());
        $result = $this->restProxy->queryEntities($name);
        $entities = $result->getEntities();
        $actual = $entities[0];
        $this->assertEquals($expected->getPartitionKey(), $actual->getPartitionKey());
        $this->assertEquals($expected->getRowKey(), $actual->getRowKey());
        $this->assertCount(count($expected->getProperties()), $actual->getProperties());
    }
    
    /**
     * @covers WindowsAzure\Table\TableRestProxy::batch
     * @covers WindowsAzure\Table\TableRestProxy::_createBatchRequestBody
     * @covers WindowsAzure\Table\TableRestProxy::_getOperationContext
     * @covers WindowsAzure\Table\TableRestProxy::_createOperationsContexts
     * @covers WindowsAzure\Table\TableRestProxy::_constructPutOrMergeEntityContext
     * @covers WindowsAzure\Table\Internal\MimeReaderWriter::encodeMimeMultipart
     * @covers WindowsAzure\Table\Internal\MimeReaderWriter::decodeMimeMultipart
     * @covers WindowsAzure\Table\Models\BatchResult::create
     * @covers WindowsAzure\Table\Models\BatchResult::_constructResponses
     * @covers WindowsAzure\Table\Models\BatchResult::_compareUsingContentId
     * @covers WindowsAzure\Common\Internal\ServiceRestProxy::sendContext
     */
    public function testBatchWithInsertOrReplace()
    {
        $this->skipIfEmulated();
        
        // Setup
        $name = 'batchwithinsertorreplace';
        $this->createTable($name);
        $partitionKey = '123';
        $rowKey = '456';
        $expected = TestResources::getTestEntity($partitionKey, $rowKey);
        $this->restProxy->insertEntity($name, $expected);
        $result = $this->restProxy->queryEntities($name);
        $entities = $result->getEntities();
        $expected = $entities[0];
        $expected->addProperty('CustomerPlace', EdmType::STRING, 'Redmond');
        $operations = new BatchOperations();
        $operations->addInsertOrReplaceEntity($name, $expected);
        
        // Test
        $result = $this->restProxy->batch($operations);
        
        // Assert
        $entries = $result->getEntries();
        $this->assertNotNull($entries[0]->getETag());
        $result = $this->restProxy->queryEntities($name);
        $entities = $result->getEntities();
        $actual = $entities[0];
        $this->assertEquals($expected->getPartitionKey(), $actual->getPartitionKey());
        $this->assertEquals($expected->getRowKey(), $actual->getRowKey());
        $this->assertCount(count($expected->getProperties()), $actual->getProperties());
    }
    
    /**
     * @covers WindowsAzure\Table\TableRestProxy::batch
     * @covers WindowsAzure\Table\TableRestProxy::_createBatchRequestBody
     * @covers WindowsAzure\Table\TableRestProxy::_getOperationContext
     * @covers WindowsAzure\Table\TableRestProxy::_createOperationsContexts
     * @covers WindowsAzure\Table\TableRestProxy::_constructPutOrMergeEntityContext
     * @covers WindowsAzure\Table\Internal\MimeReaderWriter::encodeMimeMultipart
     * @covers WindowsAzure\Table\Internal\MimeReaderWriter::decodeMimeMultipart
     * @covers WindowsAzure\Table\Models\BatchResult::create
     * @covers WindowsAzure\Table\Models\BatchResult::_constructResponses
     * @covers WindowsAzure\Table\Models\BatchResult::_compareUsingContentId
     * @covers WindowsAzure\Common\Internal\ServiceRestProxy::sendContext
     */
    public function testBatchWithInsertOrMerge()
    {
        $this->skipIfEmulated();
        
        // Setup
        $name = 'batchwithinsertormerge';
        $this->createTable($name);
        $partitionKey = '123';
        $rowKey = '456';
        $expected = TestResources::getTestEntity($partitionKey, $rowKey);
        $this->restProxy->insertEntity($name, $expected);
        $result = $this->restProxy->queryEntities($name);
        $entities = $result->getEntities();
        $expected = $entities[0];
        $expected->addProperty('CustomerPlace', EdmType::STRING, 'Redmond');
        $operations = new BatchOperations();
        $operations->addInsertOrMergeEntity($name, $expected);
        
        // Test
        $result = $this->restProxy->batch($operations);
        
        // Assert
        $entries = $result->getEntries();
        $this->assertNotNull($entries[0]->getETag());
        $result = $this->restProxy->queryEntities($name);
        $entities = $result->getEntities();
        $actual = $entities[0];
        $this->assertEquals($expected->getPartitionKey(), $actual->getPartitionKey());
        $this->assertEquals($expected->getRowKey(), $actual->getRowKey());
        $this->assertCount(count($expected->getProperties()), $actual->getProperties());
    }
    
    /**
     * @covers WindowsAzure\Table\TableRestProxy::batch
     * @covers WindowsAzure\Table\TableRestProxy::_createBatchRequestBody
     * @covers WindowsAzure\Table\TableRestProxy::_getOperationContext
     * @covers WindowsAzure\Table\TableRestProxy::_createOperationsContexts
     * @covers WindowsAzure\Table\TableRestProxy::_constructPutOrMergeEntityContext
     * @covers WindowsAzure\Table\Internal\MimeReaderWriter::encodeMimeMultipart
     * @covers WindowsAzure\Table\Internal\MimeReaderWriter::decodeMimeMultipart
     * @covers WindowsAzure\Table\Models\BatchResult::create
     * @covers WindowsAzure\Table\Models\BatchResult::_constructResponses
     * @covers WindowsAzure\Table\Models\BatchResult::_compareUsingContentId
     * @covers WindowsAzure\Common\Internal\ServiceRestProxy::sendContext
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
        $this->restProxy->insertEntity($name, $delete);
        $this->restProxy->insertEntity($name, $update);
        $result = $this->restProxy->queryEntities($name);
        $entities = $result->getEntities();
        $delete = $entities[0];
        $update = $entities[1];
        $update->addProperty('CustomerPlace', EdmType::STRING, 'Redmond');
        $operations = new BatchOperations();
        $operations->addInsertEntity($name, $insert);
        $operations->addUpdateEntity($name, $update);
        $operations->addDeleteEntity($name, $delete->getPartitionKey(), $delete->getRowKey(), $delete->getETag());
        
        // Test
        $result = $this->restProxy->batch($operations);
        
        // Assert
        $this->assertTrue(true);
    }
    
    /**
     * @covers WindowsAzure\Table\TableRestProxy::batch
     * @covers WindowsAzure\Table\TableRestProxy::_createBatchRequestBody
     * @covers WindowsAzure\Table\TableRestProxy::_getOperationContext
     * @covers WindowsAzure\Table\TableRestProxy::_createOperationsContexts
     * @covers WindowsAzure\Table\TableRestProxy::_constructPutOrMergeEntityContext
     * @covers WindowsAzure\Table\Internal\MimeReaderWriter::encodeMimeMultipart
     * @covers WindowsAzure\Table\Internal\MimeReaderWriter::decodeMimeMultipart
     * @covers WindowsAzure\Table\Models\BatchResult::create
     * @covers WindowsAzure\Table\Models\BatchResult::_constructResponses
     * @covers WindowsAzure\Table\Models\BatchResult::_compareUsingContentId
     * @covers WindowsAzure\Common\Internal\ServiceRestProxy::sendContext
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
        $this->restProxy->insertEntity($name, $delete);
        $this->restProxy->insertEntity($name, $update);
        $result = $this->restProxy->queryEntities($name);
        $entities = $result->getEntities();
        $delete = $entities[0];
        $update = $entities[1];
        $update->addProperty('CustomerPlace', EdmType::STRING, 'Redmond');
        $operations = new BatchOperations();
        $operations->addUpdateEntity($name, $update);
        $operations->addDeleteEntity($name, '125', $delete->getRowKey(), $delete->getETag());
        
        // Test
        $result = $this->restProxy->batch($operations);
        
        // Assert
        $this->assertTrue(true);
    }
}


