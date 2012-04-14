<?php

/**
 * Functional tests for the SDK
 *
 * PHP version 5
 *
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
 * @category   Microsoft
 * @package    PEAR2\Tests\Functional\WindowsAzure\Services\Table
 * @author     Jason Cooke <jcooke@microsoft.com>
 * @copyright  2012 Microsoft Corporation
 * @license    http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link       http://pear.php.net/package/azure-sdk-for-php
 */

namespace PEAR2\Tests\Functional\WindowsAzure\Services\Table;

use PEAR2\WindowsAzure\Core\ServiceException;
use PEAR2\WindowsAzure\Core\WindowsAzureUtilities;
use PEAR2\WindowsAzure\Services\Table\TableService;
use PEAR2\WindowsAzure\Services\Table\Models\EdmType;
use PEAR2\WindowsAzure\Services\Table\Models\InsertEntityResult;
use PEAR2\WindowsAzure\Services\Table\Models\Entity;
use PEAR2\WindowsAzure\Services\Table\Models\Property;
use PEAR2\WindowsAzure\Services\Table\Models\Query;
use PEAR2\WindowsAzure\Services\Table\Models\QueryEntitiesOptions;
use PEAR2\WindowsAzure\Services\Table\Models\QueryEntitiesResult;
use PEAR2\WindowsAzure\Services\Table\Models\QueryTablesOptions;
use PEAR2\WindowsAzure\Services\Table\Models\QueryTableResults;
use PEAR2\WindowsAzure\Services\Table\Models\TableServiceOptions;
use PEAR2\WindowsAzure\Services\Table\Models\UpdateEntityResult;
use PEAR2\WindowsAzure\Services\Table\Models\DeleteEntityOptions;
use PEAR2\WindowsAzure\Services\Table\Models\Filters\BinaryFilter;
use PEAR2\WindowsAzure\Services\Table\Models\Filters\ConstantFilter;
use PEAR2\WindowsAzure\Services\Table\Models\Filters\Filter;
use PEAR2\WindowsAzure\Services\Table\Models\Filters\LiteralFilter;
use PEAR2\WindowsAzure\Services\Table\Models\Filters\RawStringFilter;
use PEAR2\WindowsAzure\Services\Table\Models\Filters\UnaryFilter;

class TableServiceIntegrationTest extends IntegrationTestBase {
    private static $testTablesPrefix = 'sdktest';
    private static $createableTablesPrefix = 'csdktest';
    private static $TEST_TABLE_1;
    private static $TEST_TABLE_2;
    private static $TEST_TABLE_3;
    private static $TEST_TABLE_4;
    private static $TEST_TABLE_5;
    private static $TEST_TABLE_6;
    private static $TEST_TABLE_7;
    private static $TEST_TABLE_8;
    private static $CREATABLE_TABLE_1;
    private static $CREATABLE_TABLE_2;
    //private static String CREATABLE_TABLE_3;
    private static $creatableTables;
    private static $testTables;

    public static function setUpBeforeClass() {
        parent::setUpBeforeClass();
        self::$testTablesPrefix .= rand(0,1000);
        // Setup container names array (list of container names used by
        // integration tests)
        self::$testTables = array();
        for ($i = 0; $i < 10; $i++) {
            self::$testTables[$i] = self::$testTablesPrefix . ($i + 1);
        }

        self::$creatableTables = array();
        for ($i = 0; $i < 10; $i++) {
            self::$creatableTables[$i] = self::$createableTablesPrefix . ($i + 1);
        }

        self::$TEST_TABLE_1 = self::$testTables[0];
        self::$TEST_TABLE_2 = self::$testTables[1];
        self::$TEST_TABLE_3 = self::$testTables[2];
        self::$TEST_TABLE_4 = self::$testTables[3];
        self::$TEST_TABLE_5 = self::$testTables[4];
        self::$TEST_TABLE_6 = self::$testTables[5];
        self::$TEST_TABLE_7 = self::$testTables[6];
        self::$TEST_TABLE_8 = self::$testTables[7];

        self::$CREATABLE_TABLE_1 = self::$creatableTables[0];
        self::$CREATABLE_TABLE_2 = self::$creatableTables[1];
        //CREATABLE_TABLE_3 = $creatableTables[2];

        // Create all test containers and their content
        self::deleteAllTables(self::$testTables);
        self::deleteAllTables(self::$creatableTables);
        self::createTables(self::$testTablesPrefix, self::$testTables);
    }

    public static function tearDownAfterClass() {
        parent::tearDownAfterClass();
        self::deleteAllTables(self::$testTables);
        self::deleteTables(self::$createableTablesPrefix, self::$creatableTables);
    }

    private static function createTables($prefix, $list) {
        $service = self::createService();
        $containers = self::listTables($prefix);
        foreach($list as $item)  {
            if (!in_array($item, $containers)) {
                $service->createTable($item);
            }
        }
    }

    private static function deleteTables($prefix, $list) {
        $service = self::createService();
        $containers = self::listTables($prefix);
        foreach($list as $item)  {
            if (in_array($item, $containers)) {
                $service->deleteTable($item);
            }
        }
    }

    private static function deleteAllTables($list) {
        $service = self::createService();
        foreach($list as $item)  {
            try {
                $service->deleteTable($item);
            }
            catch (ServiceException $e) {
                // Ignore
            }
        }
    }

    private static function listTables($prefix) {
        $service = self::createService();
        $result = array();
        $qto = new QueryTablesOptions();
        $qto->setPrefix($prefix);
        $list = $service->queryTables($qto);
        foreach($list->getTables() as $item)  {
            array_push($result, $item);
        }
        return $result;
    }

    private static function createService() {
        $tmp = new IntegrationTestBase();
        return $tmp->wrapper;
    }
    
    /**
    * @covers PEAR2\WindowsAzure\Services\Table\TableRestProxy::getServiceProperties
    */
    public function testGetServicePropertiesWorks() {
        // Arrange

        // Act
        $shouldReturn = false;
        try {
            $props = $this->wrapper->getServiceProperties()->getValue();
            $this->assertTrue(!WindowsAzureUtilities::isEmulated(), 'Should succeed iff not running in emulator');
        } catch (ServiceException $e) {
            // Expect failure in emulator, as v1.6 doesn't support this method
            if (WindowsAzureUtilities::isEmulated()) {
                $this->assertEquals(400, $e->getCode(), 'getCode');
                $shouldReturn = true;
            }
            else {
                throw $e;
            }
        }
        if($shouldReturn) {
            return;
        }

        // Assert
        $this->assertNotNull($props, '$props');
        $this->assertNotNull($props->getLogging(), '$props->getLogging');
        $this->assertNotNull($props->getLogging()->getRetentionPolicy(), '$props->getLogging()->getRetentionPolicy');
        $this->assertNotNull($props->getLogging()->getVersion(), '$props->getLogging()->getVersion');
        $this->assertNotNull($props->getMetrics()->getRetentionPolicy(), '$props->getMetrics()->getRetentionPolicy');
        $this->assertNotNull($props->getMetrics()->getVersion(), '$props->getMetrics()->getVersion');
    }

    /**
    * @covers PEAR2\WindowsAzure\Services\Table\TableRestProxy::getServiceProperties
    * @covers PEAR2\WindowsAzure\Services\Table\TableRestProxy::setServiceProperties
    */
    public function testSetServicePropertiesWorks() {
        // Arrange

        // Act
        $shouldReturn = false;
        try {
            $props = $this->wrapper->getServiceProperties()->getValue();
            $this->assertTrue(!WindowsAzureUtilities::isEmulated(), 'Should succeed iff not running in emulator');
        } catch (ServiceException $e) {
            // Expect failure in emulator, as v1.6 doesn't support this method
            if (WindowsAzureUtilities::isEmulated()) {
                $this->assertEquals(400, $e->getCode(), 'getCode');
                $shouldReturn = true;
            }
            else {
                throw $e;
            }
        }
        if($shouldReturn) {
            return;
        }

        $props->getLogging()->setRead(true);
        $this->wrapper->setServiceProperties($props);

        $props = $this->wrapper->getServiceProperties()->getValue();

        // Assert
        $this->assertNotNull($props, '$props');
        $this->assertNotNull($props->getLogging(), '$props->getLogging');
        $this->assertNotNull($props->getLogging()->getRetentionPolicy(), '$props->getLogging()->getRetentionPolicy');
        $this->assertNotNull($props->getLogging()->getVersion(), '$props->getLogging()->getVersion');
        $this->assertTrue($props->getLogging()->getRead(), '$props->getLogging()->getRead');
        $this->assertNotNull($props->getMetrics()->getRetentionPolicy(), '$props->getMetrics()->getRetentionPolicy');
        $this->assertNotNull($props->getMetrics()->getVersion(), '$props->getMetrics()->getVersion');
    }

    /**
    * @covers PEAR2\WindowsAzure\Services\Table\TableRestProxy::createTable
    * @covers PEAR2\WindowsAzure\Services\Table\TableRestProxy::getTable
    */
    public function testCreateTablesWorks() {
        $this->fail("Need to implement getTable");
        // Act
        try {
            $this->wrapper->getTable(self::$CREATABLE_TABLE_1);
            $error = null;
        }
        catch (Exception $e) {
            $error = $e;
        }
        $this->wrapper->createTable(self::$CREATABLE_TABLE_1);
        $result = $this->wrapper->getTable(self::$CREATABLE_TABLE_1);

        // Assert
        $this->assertNotNull($error, '$error');
        $this->assertNotNull($result, '$result');
    }

    /**
    * @covers PEAR2\WindowsAzure\Services\Table\TableRestProxy::createTable
    * @covers PEAR2\WindowsAzure\Services\Table\TableRestProxy::deleteTable
    * @covers PEAR2\WindowsAzure\Services\Table\TableRestProxy::getTable
    */
    public function testDeleteTablesWorks() {
        $this->fail("Need to implement getTable");

        // Act
        $this->wrapper->createTable(self::$CREATABLE_TABLE_2);
        $result = $this->wrapper->getTable(self::$CREATABLE_TABLE_2);

        $this->wrapper->deleteTable(self::$CREATABLE_TABLE_2);
        try {
            $this->wrapper->getTable(self::$CREATABLE_TABLE_2);
            $error = null;
        }
        catch (Exception $e) {
            $error = $e;
        }

        // Assert
        $this->assertNotNull($error, '$error');
        $this->assertNotNull($result, '$result');
    }

    /**
    * @covers PEAR2\WindowsAzure\Services\Table\TableRestProxy::queryTables
    */
    public function testQueryTablesWorks() {
        // Act
        $result = $this->wrapper->queryTables();

        // Assert
        $this->assertNotNull($result, '$result');
    }

    /**
    * @covers PEAR2\WindowsAzure\Services\Table\TableRestProxy::queryTables
    */
    public function testQueryTablesWithPrefixWorks() {
        // Act
        $qto = new QueryTablesOptions();
        $qto->setPrefix(self::$testTablesPrefix);
        $result = $this->wrapper->queryTables($qto);

        // Assert
        $this->assertNotNull($result, '$result');
    }

    /**
    * @covers PEAR2\WindowsAzure\Services\Table\TableRestProxy::getTable
    */
    public function testGetTableWorks() {
        $this->fail("Need to implement getTable");

        // Act
        $result = $this->wrapper->getTable(self::$TEST_TABLE_1);

        // Assert
        $this->assertNotNull($result, '$result');
    }

    /**
    * @covers PEAR2\WindowsAzure\Services\Table\TableRestProxy::insertEntity
    */
    public function testInsertEntityWorks() {
        // Arrange
        $binaryData = chr(1) . chr(2) . chr(3) . chr(4);
        $uuid = strtolower(trim(com_create_guid(), '{}'));
        $entity = new Entity();
        $entity->setPartitionKey('001');
        $entity->setRowKey('insertEntityWorks');
        $entity->newProperty('test', EdmType::BOOLEAN, true);
        $entity->newProperty('test2', EdmType::STRING, 'value');
        $entity->newProperty('test3', EdmType::INT32, 3);
        $entity->newProperty('test4', EdmType::INT64, 12345678901);
        $entity->newProperty('test5', EdmType::DATETIME, new \DateTime());
        $entity->newProperty('test6', EdmType::BINARY, $binaryData);
        $entity->newProperty('test7', EdmType::GUID, $uuid);

        // Act
        $result = $this->wrapper->insertEntity(self::$TEST_TABLE_2, $entity);

        // Assert
        $this->assertNotNull($result, '$result');
        $this->assertNotNull($result->getEntity(), '$result->getEntity()');

        $this->assertEquals('001', $result->getEntity()->getPartitionKey(), '$result->getEntity()->getPartitionKey()');
        $this->assertEquals('insertEntityWorks', $result->getEntity()->getRowKey(), '$result->getEntity()->getRowKey()');
        $this->assertNotNull($result->getEntity()->getTimestamp(), '$result->getEntity()->getTimestamp()');
        $this->assertNotNull($result->getEntity()->getEtag(), '$result->getEntity()->getEtag()');

        $this->assertNotNull($result->getEntity()->getProperty('test'), '$result->getEntity()->getProperty(\'test\')');
        $this->assertEquals(true, $result->getEntity()->getProperty('test')->getValue(), '$result->getEntity()->getProperty(\'test\')->getValue()');

        $this->assertNotNull($result->getEntity()->getProperty('test2'), '$result->getEntity()->getProperty(\'test2\')');
        $this->assertEquals('value', $result->getEntity()->getProperty('test2')->getValue(), '$result->getEntity()->getProperty(\'test2\')->getValue()');

        $this->assertNotNull($result->getEntity()->getProperty('test3'), '$result->getEntity()->getProperty(\'test3\')');
        $this->assertEquals(3, $result->getEntity()->getProperty('test3')->getValue(), '$result->getEntity()->getProperty(\'test3\')->getValue()');

        $this->assertNotNull($result->getEntity()->getProperty('test4'), '$result->getEntity()->getProperty(\'test4\')');
        $this->assertEquals(12345678901, $result->getEntity()->getProperty('test4')->getValue(), '$result->getEntity()->getProperty(\'test4\')->getValue()');

        $this->assertNotNull($result->getEntity()->getProperty('test5'), '$result->getEntity()->getProperty(\'test5\')');
        $this->assertTrue($result->getEntity()->getProperty('test5')->getValue() instanceof \DateTime, '$result->getEntity()->getProperty(\'test5\')->getValue() instanceof \DateTime');

        $this->assertNotNull($result->getEntity()->getProperty('test6'), '$result->getEntity()->getProperty(\'test6\')');
        $returnedBinaryData = $result->getEntity()->getProperty('test6')->getValue();
        $this->assertTrue(is_string($returnedBinaryData), 'binary data is string');
        $this->assertEquals(strlen($binaryData), strlen($returnedBinaryData), 'binary data lengths are the same');
        $this->assertEquals($binaryData, $returnedBinaryData, 'binary data are the same');

        $this->assertNotNull($result->getEntity()->getProperty('test7'), '$result->getEntity()->getProperty(\'test7\')');
        $this->assertTrue(is_string($result->getEntity()->getProperty('test7')->getValue()), 'is_string($result->getEntity()->getProperty(\'test7\')->getValue())');
        $this->assertEquals($uuid, $result->getEntity()->tryGetPropertyValue('test7'), 'GUIDs are the same');
    }
    /**
    * @covers PEAR2\WindowsAzure\Services\Table\TableRestProxy::insertEntity
    * @covers PEAR2\WindowsAzure\Services\Table\TableRestProxy::updateEntity
    */
    public function testUpdateEntityWorks() {
        // Arrange
        $entity = new Entity();
        $entity->setPartitionKey('001');
        $entity->setRowKey('updateEntityWorks');
        $entity->newProperty('test', EdmType::BOOLEAN, true);
        $entity->newProperty('test2', EdmType::STRING, 'value');
        $entity->newProperty('test3', EdmType::INT32, 3);
        $entity->newProperty('test4', EdmType::INT64, 12345678901);
        $entity->newProperty('test5', EdmType::DATETIME, new \DateTime());

        // Act
        $result = $this->wrapper->insertEntity(self::$TEST_TABLE_2, $entity);
        $result->getEntity()->newProperty('test4', EdmType::INT32, 5);
        $this->wrapper->updateEntity(self::$TEST_TABLE_2, $result->getEntity());

        // Assert
        $this->assertTrue(true, 'Expect success in testUpdateEntityWorks');
    }

    /**
    * @covers PEAR2\WindowsAzure\Services\Table\TableRestProxy::insertOrReplaceEntity
    */
    public function testInsertOrReplaceEntityWorks() {
        // Arrange
        $entity = new Entity();
        $entity->setPartitionKey('001');
        $entity->setRowKey('insertOrReplaceEntityWorks');
        $entity->newProperty('test', EdmType::BOOLEAN, true);
        $entity->newProperty('test2', EdmType::STRING, 'value');
        $entity->newProperty('test3', EdmType::INT32, 3);
        $entity->newProperty('test4', EdmType::INT64, 12345678901);
        $entity->newProperty('test5', EdmType::DATETIME, new \DateTime());

        // Act
        if(WindowsAzureUtilities::isEmulated()) {
            try {
                $this->wrapper->insertOrReplaceEntity(self::$TEST_TABLE_2, $entity);
                $this->assertFalse(WindowsAzureUtilities::isEmulated(), "Expect failure when in emulator");
            } catch (ServiceException $e) {
                $this->assertEquals(404, $e->getCode(), 'e->getCode');
            }
        } else {
            $this->wrapper->insertOrReplaceEntity(self::$TEST_TABLE_2, $entity);
            $entity->newProperty('test4', EdmType::INT32, 5);
            $entity->newProperty('test6', EdmType::INT32, 6);
            $this->wrapper->insertOrReplaceEntity(self::$TEST_TABLE_2, $entity);

            // Assert
            $this->assertTrue(true, 'Expect success in testInsertOrReplaceEntityWorks');
        }
    }

    /**
    * @covers PEAR2\WindowsAzure\Services\Table\TableRestProxy::insertOrMergeEntity
    */
    public function testInsertOrMergeEntityWorks() {
        // Arrange
        $entity = new Entity();
        $entity->setPartitionKey('001');
        $entity->setRowKey('insertOrMergeEntityWorks');
        $entity->newProperty('test', EdmType::BOOLEAN, true);
        $entity->newProperty('test2', EdmType::STRING, 'value');
        $entity->newProperty('test3', EdmType::INT32, 3);
        $entity->newProperty('test4', EdmType::INT64, 12345678901);
        $entity->newProperty('test5', EdmType::DATETIME, new \DateTime());

        // Act
        if(WindowsAzureUtilities::isEmulated()) {
            try {
                $this->wrapper->insertOrMergeEntity(self::$TEST_TABLE_2, $entity);
                $this->assertFalse(WindowsAzureUtilities::isEmulated(), "Expect failure when in emulator");
            } catch (ServiceException $e) {
                $this->assertEquals(404, $e->getCode(), 'e->getCode');
            }
        } else {
            $this->wrapper->insertOrMergeEntity(self::$TEST_TABLE_2, $entity);
            $entity->newProperty('test4', EdmType::INT32, 5);
            $entity->newProperty('test6', EdmType::INT32, 6);
            $this->wrapper->insertOrMergeEntity(self::$TEST_TABLE_2, $entity);

            // Assert
            $this->assertTrue(true, 'Expect success in testInsertOrMergeEntityWorks');
        }
    }

    /**
    * @covers PEAR2\WindowsAzure\Services\Table\TableRestProxy::insertEntity
    * @covers PEAR2\WindowsAzure\Services\Table\TableRestProxy::mergeEntity
    */
    public function testMergeEntityWorks() {
        // Arrange
        $entity = new Entity();
        $entity->setPartitionKey('001');
        $entity->setRowKey('mergeEntityWorks');
        $entity->newProperty('test', EdmType::BOOLEAN, true);
        $entity->newProperty('test2', EdmType::STRING, 'value');
        $entity->newProperty('test3', EdmType::INT32, 3);
        $entity->newProperty('test4', EdmType::INT64, 12345678901);
        $entity->newProperty('test5', EdmType::DATETIME, new \DateTime());

        // Act
        $result = $this->wrapper->insertEntity(self::$TEST_TABLE_2, $entity);

        $result->getEntity()->newProperty('test4', EdmType::INT32, 5);
        $result->getEntity()->newProperty('test6', EdmType::INT32, 6);
        $this->wrapper->mergeEntity(self::$TEST_TABLE_2, $result->getEntity());

        // Assert
        $this->assertTrue(true, 'expect no errors');
    }

    /**
    * @covers PEAR2\WindowsAzure\Services\Table\TableRestProxy::deleteEntity
    * @covers PEAR2\WindowsAzure\Services\Table\TableRestProxy::insertEntity
    */
    public function testDeleteEntityWorks() {
        // Arrange
        $entity = new Entity();
        $entity->setPartitionKey('001');
        $entity->setRowKey('deleteEntityWorks');
        $entity->newProperty('test', EdmType::BOOLEAN, true);
        $entity->newProperty('test2', EdmType::STRING, 'value');
        $entity->newProperty('test3', EdmType::INT32, 3);
        $entity->newProperty('test4', EdmType::INT64, 12345678901);
        $entity->newProperty('test5', EdmType::DATETIME, new \DateTime());

        // Act
        $result = $this->wrapper->insertEntity(self::$TEST_TABLE_2, $entity);

        $this->wrapper->deleteEntity(self::$TEST_TABLE_2, $result->getEntity()->getPartitionKey(), $result->getEntity()->getRowKey());

        // Assert
        $this->assertTrue(true, 'expect no errors');
    }

    /**
    * @covers PEAR2\WindowsAzure\Services\Queue\QueueRestProxy::deleteEntity
    * @covers PEAR2\WindowsAzure\Services\Queue\QueueRestProxy::getEntity
    * @covers PEAR2\WindowsAzure\Services\Queue\QueueRestProxy::insertEntity
    * @covers PEAR2\WindowsAzure\Services\Queue\QueueRestProxy::queryEntities
    */
    public function testDeleteEntityTroublesomeKeyWorks() {
        // Arrange
        $entity1 = new Entity();
        $entity1->setPartitionKey('001');
        $entity1->setRowKey('key with spaces');
        $entity2 = new Entity();
        $entity2->setPartitionKey('001');
        $entity2->setRowKey('key\'with\'quotes');
        $entity3 = new Entity();
        $entity3->setPartitionKey('001');
        $entity3->setRowKey('keyWithUnicode \uB2E4');
        $entity4 = new Entity();
        $entity4->setPartitionKey('001');
        $entity4->setRowKey('key \'with\'\' \uB2E4');

        // Act
        $result1 = $this->wrapper->insertEntity(self::$TEST_TABLE_8, $entity1);
        $result2 = $this->wrapper->insertEntity(self::$TEST_TABLE_8, $entity2);
        $result3 = $this->wrapper->insertEntity(self::$TEST_TABLE_8, $entity3);
        $result4 = $this->wrapper->insertEntity(self::$TEST_TABLE_8, $entity4);

        $this->wrapper->deleteEntity(self::$TEST_TABLE_8, $result1->getEntity()->getPartitionKey(), $result1->getEntity()->getRowKey());
        $this->wrapper->deleteEntity(self::$TEST_TABLE_8, $result2->getEntity()->getPartitionKey(), $result2->getEntity()->getRowKey());
        $this->wrapper->deleteEntity(self::$TEST_TABLE_8, $result3->getEntity()->getPartitionKey(), $result3->getEntity()->getRowKey());
        $this->wrapper->deleteEntity(self::$TEST_TABLE_8, $result4->getEntity()->getPartitionKey(), $result4->getEntity()->getRowKey());

        // Assert
        try {
            $this->wrapper->getEntity(self::$TEST_TABLE_8, $result1->getEntity()->getPartitionKey(), $result1->getEntity()->getRowKey());
            $this->fail('Expect an exception when getting an entity that does not exist');
        }
        catch (ServiceException $e) {
            $this->assertEquals(404, $e->getCode(), 'getCode');

        }

        $qopts = new QueryEntitiesOptions();
        $qopts->setFilter(Filter::applyEq(Filter::applyLiteral('RowKey'), Filter::applyConstant('key\'with\'quotes')));
        $assertResult2 = $this->wrapper->queryEntities(self::$TEST_TABLE_8, $qopts);

        $this->assertEquals(0, count($assertResult2->getEntities()), 'entities returned');

        $assertResult3 = $this->wrapper->queryEntities(self::$TEST_TABLE_8);
        foreach($assertResult3->getEntities() as $entity)  {
            $this->assertFalse($entity3->getRowKey() == $entity->getRowKey(), 'Entity3 should be removed from the table');
            $this->assertFalse($entity4->getRowKey() == $entity->getRowKey(), 'Entity4 should be removed from the table');
        }
    }

    /**
    * @covers PEAR2\WindowsAzure\Services\Table\TableRestProxy::deleteEntity
    * @covers PEAR2\WindowsAzure\Services\Table\TableRestProxy::insertEntity
    */
    public function testDeleteEntityWithETagWorks() {
        // Arrange
        $entity = new Entity();
        $entity->setPartitionKey('001');
        $entity->setRowKey('deleteEntityWithETagWorks');
        $entity->newProperty('test', EdmType::BOOLEAN, true);
        $entity->newProperty('test2', EdmType::STRING, 'value');
        $entity->newProperty('test3', EdmType::INT32, 3);
        $entity->newProperty('test4', EdmType::INT64, 12345678901);
        $entity->newProperty('test5', EdmType::DATETIME, new \DateTime());

        // Act
        $result = $this->wrapper->insertEntity(self::$TEST_TABLE_2, $entity);

        $deo = new DeleteEntityOptions();
        $deo->setEtag($result->getEntity()->getEtag());
        $this->wrapper->deleteEntity(self::$TEST_TABLE_2, $result->getEntity()->getPartitionKey(), $result->getEntity()->getRowKey(),
                $deo);

        // Assert
        $this->assertTrue(true, 'expect no errors');
    }

    /**
    * @covers PEAR2\WindowsAzure\Services\Table\TableRestProxy::getEntity
    * @covers PEAR2\WindowsAzure\Services\Table\TableRestProxy::insertEntity
    */
    public function testGetEntityWorks() {
        // Arrange
        $binaryData = chr(1) . chr(2) . chr(3) . chr(4);
        $uuid = strtolower(trim(com_create_guid(), '{}'));
        $entity = new Entity();
        $entity->setPartitionKey('001');
        $entity->setRowKey('getEntityWorks');
        $entity->newProperty('test', EdmType::BOOLEAN, true);
        $entity->newProperty('test2', EdmType::STRING, 'value');
        $entity->newProperty('test3', EdmType::INT32, 3);
        $entity->newProperty('test4', EdmType::INT64, 12345678901);
        $entity->newProperty('test5', EdmType::DATETIME, new \DateTime());
        $entity->newProperty('test6', EdmType::BINARY, $binaryData);
        $entity->newProperty('test7', EdmType::GUID, $uuid);

        // Act
        $insertResult = $this->wrapper->insertEntity(self::$TEST_TABLE_2, $entity);
        $result = $this->wrapper->getEntity(self::$TEST_TABLE_2, $insertResult->getEntity()->getPartitionKey(), $insertResult->getEntity()->getRowKey());

        // Assert
        $this->assertNotNull($result, '$result');
        $this->assertNotNull($result->getEntity(), '$result->getEntity()');

        $this->assertEquals('001', $result->getEntity()->getPartitionKey(), '$result->getEntity()->getPartitionKey()');
        $this->assertEquals('getEntityWorks', $result->getEntity()->getRowKey(), '$result->getEntity()->getRowKey()');
        $this->assertNotNull($result->getEntity()->getTimestamp(), '$result->getEntity()->getTimestamp()');
        $this->assertNotNull($result->getEntity()->getEtag(), '$result->getEntity()->getEtag()');

        $this->assertNotNull($result->getEntity()->getProperty('test'), '$result->getEntity()->getProperty(\'test\')');
        $this->assertEquals(true, $result->getEntity()->getProperty('test')->getValue(), '$result->getEntity()->getProperty(\'test\')->getValue()');

        $this->assertNotNull($result->getEntity()->getProperty('test2'), '$result->getEntity()->getProperty(\'test2\')');
        $this->assertEquals('value', $result->getEntity()->getProperty('test2')->getValue(), '$result->getEntity()->getProperty(\'test2\')->getValue()');

        $this->assertNotNull($result->getEntity()->getProperty('test3'), '$result->getEntity()->getProperty(\'test3\')');
        $this->assertEquals(3, $result->getEntity()->getProperty('test3')->getValue(), '$result->getEntity()->getProperty(\'test3\')->getValue()');

        $this->assertNotNull($result->getEntity()->getProperty('test4'), '$result->getEntity()->getProperty(\'test4\')');
        $this->assertEquals(12345678901, $result->getEntity()->getProperty('test4')->getValue(), '$result->getEntity()->getProperty(\'test4\')->getValue()');

        $this->assertNotNull($result->getEntity()->getProperty('test5'), '$result->getEntity()->getProperty(\'test5\')');
        $this->assertTrue($result->getEntity()->getProperty('test5')->getValue() instanceof \DateTime, '$result->getEntity()->getProperty(\'test5\')->getValue() instanceof \DateTime');

        $this->assertNotNull($result->getEntity()->getProperty('test6'), '$result->getEntity()->getProperty(\'test6\')');
        $returnedBinaryData = $result->getEntity()->getProperty('test6')->getValue();
        $this->assertTrue(is_string($returnedBinaryData), 'binary data is string');
        $this->assertEquals(strlen($binaryData), strlen($returnedBinaryData), 'binary data lengths are the same');
        $this->assertEquals($binaryData, $returnedBinaryData, 'binary data are the same');

        $this->assertNotNull($result->getEntity()->getProperty('test7'), '$result->getEntity()->getProperty(\'test7\')');
        $this->assertTrue(is_string($result->getEntity()->getProperty('test7')->getValue()), 'is_string($result->getEntity()->getProperty(\'test7\')->getValue())');
        $this->assertEquals($uuid, $result->getEntity()->tryGetPropertyValue('test7'), 'GUIDs are the same');
    }

    /**
    * @covers PEAR2\WindowsAzure\Services\Table\TableRestProxy::insertEntity
    * @covers PEAR2\WindowsAzure\Services\Table\TableRestProxy::queryEntities
    */
    public function testQueryEntitiesWorks() {
        // Arrange
        $entity = new Entity();
        $entity->setPartitionKey('001');
        $entity->setRowKey('queryEntitiesWorks');
        $entity->newProperty('test', EdmType::BOOLEAN, true);
        $entity->newProperty('test2', EdmType::STRING, 'value');
        $entity->newProperty('test3', EdmType::INT32, 3);
        $entity->newProperty('test4', EdmType::INT64, 12345678901);
        $entity->newProperty('test5', EdmType::DATETIME, new \DateTime());

        // Act
        $this->wrapper->insertEntity(self::$TEST_TABLE_3, $entity);
        $result = $this->wrapper->queryEntities(self::$TEST_TABLE_3);

        // Assert
        $this->assertNotNull($result, '$result');
        $this->assertNotNull($result->getEntities(), '$result->getEntities()');
        $this->assertEquals(1, count($result->getEntities()), 'count($result->getEntities())');

        $entities = $result->getEntities();
        $this->assertNotNull($entities[0], '$entities[0];');

        $this->assertEquals('001', $entities[0]->getPartitionKey(), '$entities[0]->getPartitionKey()');
        $this->assertEquals('queryEntitiesWorks', $entities[0]->getRowKey(), '$entities[0]->getRowKey()');
        $this->assertNotNull($entities[0]->getTimestamp(), '$entities[0]->getTimestamp()');
        $this->assertNotNull($entities[0]->getEtag(), '$entities[0]->getEtag()');

        $this->assertNotNull($entities[0]->getProperty('test'), '$entities[0]->getProperty(\'test\')');
        $this->assertEquals(true, $entities[0]->getProperty('test')->getValue(), '$entities[0]->getProperty(\'test\')->getValue()');

        $this->assertNotNull($entities[0]->getProperty('test2'), '$entities[0]->getProperty(\'test2\')');
        $this->assertEquals('value', $entities[0]->getProperty('test2')->getValue(), '$entities[0]->getProperty(\'test2\')->getValue()');

        $this->assertNotNull($entities[0]->getProperty('test3'), '$entities[0]->getProperty(\'test3\')');
        $this->assertEquals(3, $entities[0]->getProperty('test3')->getValue(), '$entities[0]->getProperty(\'test3\')->getValue()');

        $this->assertNotNull($entities[0]->getProperty('test4'), '$entities[0]->getProperty(\'test4\')');
        $this->assertEquals(12345678901, $entities[0]->getProperty('test4')->getValue(), '$entities[0]->getProperty(\'test4\')->getValue()');

        $this->assertNotNull($entities[0]->getProperty('test5'), '$entities[0]->getProperty(\'test5\')');
        $this->assertTrue($entities[0]->getProperty('test5')->getValue() instanceof \DateTime, '$entities[0]->getProperty(\'test5\')->getValue() instanceof \DateTime');
    }

    /**
    * @covers PEAR2\WindowsAzure\Services\Table\TableRestProxy::insertEntity
    * @covers PEAR2\WindowsAzure\Services\Table\TableRestProxy::queryEntities
    */
    public function testQueryEntitiesWithPaginationWorks() {
        // Arrange
        $table = self::$TEST_TABLE_4;
        $numberOfEntries = 20;
        for ($i = 0; $i < $numberOfEntries; $i++) {
            $entity = new Entity();
            $entity->setPartitionKey('001');
            $entity->setRowKey('queryEntitiesWithPaginationWorks-' . $i);
            $entity->newProperty('test', EdmType::BOOLEAN, true);
            $entity->newProperty('test2', EdmType::STRING, 'value');
            $entity->newProperty('test3', EdmType::INT32, 3);
            $entity->newProperty('test4', EdmType::INT64, 12345678901);
            $entity->newProperty('test5', EdmType::DATETIME, new \DateTime());

            $this->wrapper->insertEntity($table, $entity);
        }

        // Act
        $entryCount = 0;
        $nextPartitionKey = null;
        $nextRowKey = null;
        while (true) {
            $qeo = new QueryEntitiesOptions();
            $qeo->setNextPartitionKey($nextPartitionKey);
            $qeo->setNextRowKey($nextRowKey);
            $result = $this->wrapper->queryEntities($table, $qeo);

            $entryCount += count($result->getEntities());

            if ($nextPartitionKey == null) break;

            $nextPartitionKey = $result->getNextPartitionKey();
            $nextRowKey = $result->getNextRowKey();
        }

        // Assert
        $this->assertEquals($numberOfEntries, $entryCount, '$entryCount');
    }

    /**
    * @covers PEAR2\WindowsAzure\Services\Table\TableRestProxy::insertEntity
    * @covers PEAR2\WindowsAzure\Services\Table\TableRestProxy::queryEntities
    */
    public function testQueryEntitiesWithFilterWorks() {
        // Arrange
        $table = self::$TEST_TABLE_5;
        $numberOfEntries = 5;
        $entities = array();
        for ($i = 0; $i < $numberOfEntries; $i++) {
            $entity = new Entity();
            $entity->setPartitionKey('001');
            $entity->setRowKey('queryEntitiesWithFilterWorks-' . $i);
            $entity->newProperty('test', EdmType::BOOLEAN, $i % 2 == 0);
            $entity->newProperty('test2', EdmType::STRING, '\'value" ' . $i);
            $entity->newProperty('test3', EdmType::INT32, $i);
            $entity->newProperty('test4', EdmType::INT64, 12345678901 + $i);
            $entity->newProperty('test5', EdmType::DATETIME, new \DateTime('2012-01-0' . $i));
            $entity->newProperty('test6', EdmType::BINARY, chr($i));
            $entity->newProperty('test7', EdmType::GUID, strtolower(trim(com_create_guid(), '{}')));
            $entities[$i] = $entity;
            $this->wrapper->insertEntity($table, $entity);
        }

        {
            // Act
            $f = Filter::applyEq(Filter::applyLiteral('RowKey'), Filter::applyConstant('queryEntitiesWithFilterWorks-3'));
            $q =new Query();
            $q->setFilter($f);
            $qeo = new QueryEntitiesOptions();
            $qeo->setQuery($q);
            $result = $this->wrapper->queryEntities($table, $qeo);

            // Assert
            $this->assertNotNull($result, '$result');
            $this->assertEquals(1, count($result->getEntities()), 'result-getEntities');
            $entities = $result->getEntities();
            $this->assertEquals('queryEntitiesWithFilterWorks-3', $entities[0]->getRowKey(), '$entities[0]->getRowKey()');
        }

        {
            // Act
            $q = new Query();
            $q->setFilter(Filter::applyRawString('RowKey eq \'queryEntitiesWithFilterWorks-3\''));
            $qeo = new QueryEntitiesOptions();
            $qeo->setQuery($q);
            $result = $this->wrapper->queryEntities($table, $qeo);

            // Assert
            $this->assertNotNull($result, '$result');
            $this->assertEquals(1, count($result->getEntities()), 'count($result->getEntities())');
            $entities = $result->getEntities();
            $this->assertEquals('queryEntitiesWithFilterWorks-3', $entities[0]->getRowKey(), '$entities[0]->getRowKey()');
        }

        {
            // Act
            $q = new Query();
            $q->setFilter(Filter::applyLiteral('test'));
            $qeo = new QueryEntitiesOptions();
            $qeo->setQuery($q);
            $result = $this->wrapper->queryEntities($table, $qeo);

            // Assert
            $this->assertNotNull($result, '$result');
            $this->assertEquals(3, count($result->getEntities()), 'count($result->getEntities())');
        }

        {
            // Act
            $q = new Query();
            $q->setFilter(Filter::applyEq(Filter::applyLiteral('test2'), Filter::applyConstant('\'value" 3')));
            $qeo = new QueryEntitiesOptions();
            $qeo->setQuery($q);
            $result = $this->wrapper->queryEntities($table, $qeo);

            // Assert
            $this->assertNotNull($result, '$result');
            $this->assertEquals(1, count($result->getEntities()), 'count($result->getEntities())');
            $this->assertEquals('queryEntitiesWithFilterWorks-3', $entities[0]->getRowKey(), '$entities[0]->getRowKey()');
        }

        {
            // Act
            $q = new Query();
            $q->setFilter(Filter::applyEq(Filter::applyLiteral('test4'), Filter::applyConstant(12345678903)));
            $qeo = new QueryEntitiesOptions();
            $qeo->setQuery($q);
            $result = $this->wrapper->queryEntities($table, $qeo);

            // Assert
            $this->assertNotNull($result, '$result');
            $this->assertEquals(1, count($result->getEntities()), 'count($result->getEntities())');
            $this->assertEquals('queryEntitiesWithFilterWorks-2', $entities[0]->getRowKey(), '$entities[0]->getRowKey()');
        }

        {
            // Act
            $q = new Query();
            $q->setFilter(Filter::applyEq(Filter::applyLiteral('test5'), Filter::applyConstant(new \DateTime('2012-01-03'))));
            $qeo = new QueryEntitiesOptions();
            $qeo->setQuery($q);
            $result = $this->wrapper->queryEntities($table, $qeo);

            // Assert
            $this->assertNotNull($result, '$result');
            $this->assertEquals(1, count($result->getEntities()), 'count($result->getEntities())');
            $this->assertEquals('queryEntitiesWithFilterWorks-3', $entities[0]->getRowKey(), '$entities[0]->getRowKey()');
        }

        {
            // Act
            $q = new Query();
            $ent3 = $entities[3];
            $q->setFilter(Filter::applyEq(Filter::applyLiteral('test6'), Filter::applyConstant(chr(3))));
            $qeo = new QueryEntitiesOptions();
            $qeo->setQuery($q);
            $result = $this->wrapper->queryEntities($table, $qeo);

            // Assert
            $this->assertNotNull($result, '$result');
            $this->assertEquals(1, count($result->getEntities()), 'count($result->getEntities())');
            $this->assertEquals('queryEntitiesWithFilterWorks-3', $entities[0]->getRowKey(), '$entities[0]->getRowKey()');
        }

        {
            // Act
            $q = new Query();
            $ent3 = $entities[3];
            $q->setFilter(Filter::applyEq(Filter::applyLiteral('test7'), Filter::applyConstant($ent3->tryGetPropertyValue('test7'))));
            $qeo = new QueryEntitiesOptions();
            $qeo->setQuery($q);
            $result = $this->wrapper->queryEntities($table, $qeo);

            // Assert
            $this->assertNotNull($result, '$result');
            $this->assertEquals(1, count($result->getEntities()), 'count($result->getEntities())');
            $this->assertEquals('queryEntitiesWithFilterWorks-3', $entities[0]->getRowKey(), '$entities[0]->getRowKey()');
        }              
    }

    /**
    * @covers PEAR2\WindowsAzure\Services\Table\TableRestProxy::batch
    */
    public function testBatchInsertWorks() {
        $this->fail('Need to implement BatchOperations');
        // Arrange
        $table = self::$TEST_TABLE_6;
        $partitionKey = '001';

        // Act
        $entity = new Entity();
        $entity->setPartitionKey($partitionKey);
        $entity->setRowKey('batchInsertWorks');
        $entity->newProperty('test', EdmType::BOOLEAN, true);
        $entity->newProperty('test2', EdmType::STRING, 'value');
        $entity->newProperty('test3', EdmType::INT32, 3);
        $entity->newProperty('test4', EdmType::INT64, 12345678901);
        $entity->newProperty('test5', EdmType::DATETIME, new \DateTime());

        $bo = new BatchOperations();
        $bo->addInsertEntity($table, $entity);
        $result = $this->wrapper->batch($bo);

        // Assert
        $this->assertNotNull($result, '$result');
        $this->assertEquals(1, count($result->getEntries()), 'count($result->getEntries())');
        $ents = $result->getEntries();
        $this->assertTrue($ents[0] instanceof InsertEntity, '$result->getEntries()->get(0)->getClass()');
    }

    /**
    * @covers PEAR2\WindowsAzure\Services\Table\TableRestProxy::batch
    * @covers PEAR2\WindowsAzure\Services\Table\TableRestProxy::insertEntity
    */
    public function testBatchUpdateWorks() {
        $this->fail('Need to implement BatchOperations');
        // Arrange
        $table = self::$TEST_TABLE_6;
        $partitionKey = '001';
        $entity = new Entity();
        $entity->setPartitionKey($partitionKey);
        $entity->setRowKey('batchUpdateWorks');
        $entity->newProperty('test', EdmType::BOOLEAN, true);
        $entity->newProperty('test2', EdmType::STRING, 'value');
        $entity->newProperty('test3', EdmType::INT32, 3);
        $entity->newProperty('test4', EdmType::INT64, 12345678901);
        $entity->newProperty('test5', EdmType::DATETIME, new \DateTime());
        $entity = $this->wrapper->insertEntity($table, $entity)->getEntity();

        // Act
        $entity->newProperty('test', EdmType::BOOLEAN, false);
        $bo = new BatchOperations();
        $bo->addUpdateEntity($table, $entity);
        $result = $this->wrapper->batch($bo);

        // Assert
        $this->assertNotNull($result, '$result');
        $this->assertEquals(1, count($result->getEntries()), 'count($result->getEntries())');
        $ents = $result->getEntries();
        $this->assertTrue($ents[0] instanceof UpdateEntity, '$result->getEntries()->get(0)->getClass()');
    }

    /**
    * @covers PEAR2\WindowsAzure\Services\Table\TableRestProxy::batch
    * @covers PEAR2\WindowsAzure\Services\Table\TableRestProxy::insertEntity
    */
    public function testBatchMergeWorks() {
        $this->fail('Need to implement BatchOperations');
        // Arrange
        $table = self::$TEST_TABLE_6;
        $partitionKey = '001';
        $entity = new Entity();
        $entity->setPartitionKey($partitionKey);
        $entity->setRowKey('batchMergeWorks');
        $entity->newProperty('test', EdmType::BOOLEAN, true);
        $entity->newProperty('test2', EdmType::STRING, 'value');
        $entity->newProperty('test3', EdmType::INT32, 3);
        $entity->newProperty('test4', EdmType::INT64, 12345678901);
        $entity->newProperty('test5', EdmType::DATETIME, new \DateTime());
        $entity = $this->wrapper->insertEntity($table, $entity)->getEntity();

        // Act
        $bo = new BatchOperations();
        $bo->addMergeEntity($table, $entity);
        $result = $this->wrapper->batch($bo);

        // Assert
        $this->assertNotNull($result, '$result');
        $this->assertEquals(1, count($result->getEntries()), 'count($result->getEntries())');
        $ents = $result->getEntries();
        $this->assertTrue($ents[0] instanceof UpdateEntity, '$result->getEntries()->get(0)->getClass()');
    }

    /**
    * @covers PEAR2\WindowsAzure\Services\Table\TableRestProxy::batch
    */
    public function testBatchInsertOrReplaceWorks() {
        $this->fail('Need to implement BatchOperations');
        // Arrange
        
        // Don"t run this test with emulator, as v1.6 doesn"t support this method
        if (WindowsAzureUtilities::isEmulated()) {
            return;
        }
        $table = self::$TEST_TABLE_6;
        $partitionKey = '001';

        // Act
        $entity = new Entity();
        $entity->setPartitionKey($partitionKey);
        $entity->setRowKey('batchInsertOrReplaceWorks');
        $entity->newProperty('test', EdmType::BOOLEAN, true);
        $entity->newProperty('test2', EdmType::STRING, 'value');
        $entity->newProperty('test3', EdmType::INT32, 3);
        $entity->newProperty('test4', EdmType::INT64, 12345678901);
        $entity->newProperty('test5', EdmType::DATETIME, new \DateTime());

        $bo = new BatchOperations();
        $bo->addInsertOrReplaceEntity($table, $entity);
        $result = $this->wrapper->batch($bo);

        // Assert
        $this->assertNotNull($result, '$result');
        $this->assertEquals(1, count($result->getEntries()), 'count($result->getEntries())');
        $ents = $result->getEntries();
        $this->assertTrue($ents[0] instanceof UpdateEntity, '$result->getEntries()->get(0)->getClass()');
    }

    /**
    * @covers PEAR2\WindowsAzure\Services\Table\TableRestProxy::batch
    */
    public function testBatchInsertOrMergeWorks() {
        $this->fail('Need to implement BatchOperations');
        // Arrange
        
        // Don"t run this test with emulator, as v1.6 doesn"t support this method
        if (WindowsAzureUtilities::isEmulated()) {
            return;
        }

        $table = self::$TEST_TABLE_6;
        $partitionKey = '001';

        // Act
        $entity = new Entity();
        $entity->setPartitionKey($partitionKey);
        $entity->setRowKey('batchInsertOrMergeWorks');
        $entity->newProperty('test', EdmType::BOOLEAN, true);
        $entity->newProperty('test2', EdmType::STRING, 'value');
        $entity->newProperty('test3', EdmType::INT32, 3);
        $entity->newProperty('test4', EdmType::INT64, 12345678901);
        $entity->newProperty('test5', EdmType::DATETIME, new \DateTime());

        $bo = new BatchOperations();
        $bo->addInsertOrMergeEntity($table, $entity);
        $result = $this->wrapper->batch($bo);

        // Assert
        $this->assertNotNull($result, '$result');
        $this->assertEquals(1, count($result->getEntries()), 'count($result->getEntries())');
        $ents = $result->getEntries();
        $this->assertTrue($ents[0] instanceof UpdateEntity, '$result->getEntries()->get(0)->getClass()');
    }

    /**
    * @covers PEAR2\WindowsAzure\Services\Table\TableRestProxy::batch
    * @covers PEAR2\WindowsAzure\Services\Table\TableRestProxy::insertEntity
    */
    public function testBatchDeleteWorks() {
        $this->fail('Need to implement BatchOperations');
        // Arrange
        $table = self::$TEST_TABLE_6;
        $partitionKey = '001';
        $entity = new Entity();
        $entity->setPartitionKey($partitionKey);
        $entity->setRowKey('batchDeleteWorks');
        $entity->newProperty('test', EdmType::BOOLEAN, true);
        $entity->newProperty('test2', EdmType::STRING, 'value');
        $entity->newProperty('test3', EdmType::INT32, 3);
        $entity->newProperty('test4', EdmType::INT64, 12345678901);
        $entity->newProperty('test5', EdmType::DATETIME, new \DateTime());
        $entity = $this->wrapper->insertEntity($table, $entity)->getEntity();

        // Act
        $bo = new BatchOperations();
        $bo->addDeleteEntity($table, $entity->getPartitionKey(), $entity->getRowKey(), $entity->getEtag());
        $result = $this->wrapper->batch($bo);

        // Assert
        $this->assertNotNull($result, '$result');
        $this->assertEquals(1, count($result->getEntries()), 'count($result->getEntries())');
        $ents = $result->getEntries();
        $this->assertTrue($ents[0] instanceof DeleteEntry, '$result->getEntries()->get(0)->getClass()');
    }

    /**
    * @covers PEAR2\WindowsAzure\Services\Table\TableRestProxy::batch
    */
    public function testBatchLotsOfInsertsWorks() {
        $this->fail('Need to implement BatchOperations');
        // Arrange
        $table = self::$TEST_TABLE_7;
        $partitionKey = '001';
        $insertCount = 100;

        // Act
        $batchOperations = new BatchOperations();
        for ($i = 0; $i < $insertCount; $i++) {

            $entity = new Entity();
            $entity->setPartitionKey($partitionKey);
            $entity->setRowKey('batchWorks-' . $i);
            $entity->newProperty('test', EdmType::BOOLEAN, true);
            $entity->newProperty('test2', EdmType::STRING, 'value');
            $entity->newProperty('test3', EdmType::INT32, 3);
            $entity->newProperty('test4', EdmType::INT64, 12345678901);
            $entity->newProperty('test5', EdmType::DATETIME, new \DateTime());

            $batchOperations->addInsertEntity($table, $entity);
        }
        $result = $this->wrapper->batch($batchOperations);

        // Assert
        $this->assertNotNull($result, '$result');
        $this->assertEquals($insertCount, count($result->getEntries()), 'count($result->getEntries())');
        for ($i = 0; $i < $insertCount; $i++) {
           // $this->assertEquals(InsertEntity->class, $result->getEntries()->get(i)->getClass(), '$result->getEntries()->get(i)->getClass()');

            $entity = $result->getEntries();
            $entity = $entity[$i]->getEntity();

            $this->assertEquals('001', $entity->getPartitionKey(), '$entity->getPartitionKey()');
            $this->assertEquals('batchWorks-' . $i, $entity->getRowKey(), '$entity->getRowKey()');
            $this->assertNotNull($entity->getTimestamp(), '$entity->getTimestamp()');
            $this->assertNotNull($entity->getEtag(), '$entity->getEtag()');

            $this->assertNotNull($entity->getProperty('test'), '$entity->getProperty(\'test\')');
            $this->assertEquals(true, $entity->getProperty('test')->getValue(), '$entity->getProperty(\'test\')->getValue()');

            $this->assertNotNull($entity->getProperty('test2'), '$entity->getProperty(\'test2\')');
            $this->assertEquals('value', $entity->getProperty('test2')->getValue(), '$entity->getProperty(\'test2\')->getValue()');

            $this->assertNotNull($entity->getProperty('test3'), '$entity->getProperty(\'test3\')');
            $this->assertEquals(3, $entity->getProperty('test3')->getValue(), '$entity->getProperty(\'test3\')->getValue()');

            $this->assertNotNull($entity->getProperty('test4'), '$entity->getProperty(\'test4\')');
            $this->assertEquals(12345678901, $entity->getProperty('test4')->getValue(), '$entity->getProperty(\'test4\')->getValue()');

            $this->assertNotNull($entity->getProperty('test5'), '$entity->getProperty(\'test5\')');
            $this->assertTrue($entity->getProperty('test5')->getValue() instanceof \DateTime, '$entity->getProperty(\'test5\')->getValue() instanceof \DateTime');
        }
    }

    /**
    * @covers PEAR2\WindowsAzure\Services\Table\TableRestProxy::batch
    * @covers PEAR2\WindowsAzure\Services\Table\TableRestProxy::insertEntity
    */
    public function testBatchAllOperationsTogetherWorks() {
        $this->fail('Need to implement BatchOperations');

        // Arrange
        $table = self::$TEST_TABLE_8;
        $partitionKey = '001';

        // Insert a few entities to allow updating them in batch
        $entity1 = new Entity();
        $entity1->setPartitionKey($partitionKey);
        $entity1->setRowKey('batchAllOperationsWorks-' . 1);
        $entity1->newProperty('test', EdmType::BOOLEAN, true);
        $entity1->newProperty('test2', EdmType::STRING, 'value');
        $entity1->newProperty('test3', EdmType::INT32, 3);
        $entity1->newProperty('test4', EdmType::INT64, 12345678901);
        $entity1->newProperty('test5', EdmType::DATETIME, new \DateTime());

        $entity1 = $this->wrapper->insertEntity($table, $entity1)->getEntity();

        $entity2 = new Entity();
        $entity2->setPartitionKey($partitionKey);
        $entity2->setRowKey('batchAllOperationsWorks-' . 2);
        $entity2->newProperty('test', EdmType::BOOLEAN, true);
        $entity2->newProperty('test2', EdmType::STRING, 'value');
        $entity2->newProperty('test3', EdmType::INT32, 3);
        $entity2->newProperty('test4', EdmType::INT64, 12345678901);
        $entity2->newProperty('test5', EdmType::DATETIME, new \DateTime());

        $entity2 = $this->wrapper->insertEntity($table, $entity2)->getEntity();

        $entity3 = new Entity();
        $entity3->setPartitionKey($partitionKey);
        $entity3->setRowKey('batchAllOperationsWorks-' . 3);
        $entity3->newProperty('test', EdmType::BOOLEAN, true);
        $entity3->newProperty('test2', EdmType::STRING, 'value');
        $entity3->newProperty('test3', EdmType::INT32, 3);
        $entity3->newProperty('test4', EdmType::INT64, 12345678901);
        $entity3->newProperty('test5', EdmType::DATETIME, new \DateTime());

        $entity3 = $this->wrapper->insertEntity($table, $entity3)->getEntity();

        $entity4 = new Entity();
        $entity4->setPartitionKey($partitionKey);
        $entity4->setRowKey('batchAllOperationsWorks-' . 4);
        $entity4->newProperty('test', EdmType::BOOLEAN, true);
        $entity4->newProperty('test2', EdmType::STRING, 'value');
        $entity4->newProperty('test3', EdmType::INT32, 3);
        $entity4->newProperty('test4', EdmType::INT64, 12345678901);
        $entity4->newProperty('test5', EdmType::DATETIME, new \DateTime());

        $entity4 = $this->wrapper->insertEntity($table, $entity4)->getEntity();

        // Act
        $batchOperations = new BatchOperations();

        $entity = new Entity();
        $entity->setPartitionKey($partitionKey);
        $entity->setRowKey('batchAllOperationsWorks');
        $entity->newProperty('test', EdmType::BOOLEAN, true);
        $entity->newProperty('test2', EdmType::STRING, 'value');
        $entity->newProperty('test3', EdmType::INT32, 3);
        $entity->newProperty('test4', EdmType::INT64, 12345678901);
        $entity->newProperty('test5', EdmType::DATETIME, new \DateTime());
        $batchOperations->addInsertEntity($table, $entity);

        $batchOperations->addDeleteEntity($table, $entity1->getPartitionKey(), $entity1->getRowKey(), $entity1->getEtag());

        $batchOperations->addUpdateEntity($table, $entity2->newProperty('test3', EdmType::INT32, 5));
        $batchOperations->addMergeEntity($table, $entity3->newProperty('test3', EdmType::INT32, 5));
        // Use different behavior in the emulator, as v1.6 doesn"t support this method
        if (!WindowsAzureUtilities::isEmulated()) {
            $batchOperations->addInsertOrReplaceEntity($table, $entity4->newProperty('test3', EdmType::INT32, 5));
        }
        else {
            $batchOperations->addUpdateEntity($table, $entity4->newProperty('test3', EdmType::INT32, 5));
        }

        $entity5 = new Entity();
        $entity5->setPartitionKey($partitionKey);
        $entity5->setRowKey('batchAllOperationsWorks-' . 5);
        $entity5->newProperty('test', EdmType::BOOLEAN, true);
        $entity5->newProperty('test2', EdmType::STRING, 'value');
        $entity5->newProperty('test3', EdmType::INT32, 3);
        $entity5->newProperty('test4', EdmType::INT64, 12345678901);
        $entity5->newProperty('test5', EdmType::DATETIME, new \DateTime());
        // Use different behavior in the emulator, as v1.6 doesn"t support this method
        if (!WindowsAzureUtilities::isEmulated()) {
            $batchOperations->addInsertOrMergeEntity($table, $entity5);
        }
        else {
            $batchOperations->addInsertEntity($table, $entity5);
        }

        $result = $this->wrapper->batch($batchOperations);

        // Assert
        $this->assertNotNull($result, '$result');
        $this->assertEquals(count($batchOperations->getOperations()), count($result->getEntries()), 'count($result->getEntries())');

        $ents = $result->getEntries();
        $this->assertTrue($ents[0] instanceof InsertEntity, '$result->getEntries()->get(0)->getClass()');
        $this->assertTrue($ents[1] instanceof DeleteEntity, '$result->getEntries()->get(1)->getClass()');
        $this->assertTrue($ents[2] instanceof UpdateEntity, '$result->getEntries()->get(2)->getClass()');
        $this->assertTrue($ents[3] instanceof UpdateEntity, '$result->getEntries()->get(3)->getClass()');
        $this->assertTrue($ents[4] instanceof UpdateEntity, '$result->getEntries()->get(4)->getClass()');
        $this->assertTrue($ents[5] instanceof UpdateEntity, '$result->getEntries()->get(5)->getClass()');
    }

    /**
    * @covers PEAR2\WindowsAzure\Services\Queue\QueueRestProxy::batch
    * @covers PEAR2\WindowsAzure\Services\Queue\QueueRestProxy::insertEntity
    * @covers PEAR2\WindowsAzure\Services\Queue\QueueRestProxy::updateEntity
    */
    public function testBatchNegativeWorks() {
        $this->fail('Need to implement BatchOperations');

        // Arrange
        $table = self::$TEST_TABLE_8;
        $partitionKey = '001';

        // Insert an entity the modify it outside of the batch
        $entity1 = new Entity();
        $entity1->setPartitionKey($partitionKey);
        $entity1->setRowKey('batchNegativeWorks1');
        $entity1->newProperty('test', EdmType::INT32, 1);
        $entity2 = new Entity();
        $entity2->setPartitionKey($partitionKey);
        $entity2->setRowKey('batchNegativeWorks2');
        $entity2->newProperty('test', EdmType::INT32, 2);
        $entity3 = new Entity();
        $entity3->setPartitionKey($partitionKey);
        $entity3->setRowKey('batchNegativeWorks3');
        $entity3->newProperty('test', EdmType::INT32, 3);

        $entity1 = $this->wrapper->insertEntity($table, $entity1)->getEntity();
        $entity2 = $this->wrapper->insertEntity($table, $entity2)->getEntity();
        $entity2->newProperty('test', EdmType::INT32, -2);
        $this->wrapper->updateEntity($table, $entity2);

        // Act
        $batchOperations = new BatchOperations();

        // The $entity1 still has the original etag from the first submit, 
        // so this update should fail, because another update was already made.
        $entity1->newProperty('test', EdmType::INT32, 3);
        $batchOperations->addDeleteEntity($table, $entity1->getPartitionKey(), $entity1->getRowKey(), $entity1->getEtag());
        $batchOperations->addUpdateEntity($table, $entity2);
        $batchOperations->addInsertEntity($table, $entity3);

        $result = $this->wrapper->batch($batchOperations);

        // Assert
        $this->assertNotNull($result, '$result');
        $this->assertEquals($batchOperations->getOperations()->size(), $result->getEntries()->size(), '$result->getEntries()->size()');

        $entries = $result->getEntries();
        if (WindowsAzureUtilities::isEmulated()) {
            // Don"t run this test with emulator, as v1.6 doesn"t support ordering the results
            $this->assertNotNull($entries[0], 'First $result should not be null');
            $this->assertTrue($entries[0] instanceof Error, 'First $result type');
            $error = $entries[0];
            $this->assertEquals(412, $error->getError()->getCode(), 'First $result status code');
            $this->assertNull($entries[1], 'Second $result should be null');
            $this->assertNull($entries[2], 'Third $result should be null');
        }
        else {
            $this->assertNull($entries[0], 'First $result should be null');
            $this->assertNotNull($entries[1], 'Second $result should not be null');
            $this->assertTrue($entries[1] instanceof Error, 'Second $result type');
            $error = $entries[1];
            $this->assertEquals(412, $error->getError()->getCode(), 'Second $result status code');
            $this->assertNull($entries[2], 'Third $result should be null');
        }
    }
}
