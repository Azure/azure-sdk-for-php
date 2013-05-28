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
 * @package   Tests\Functional\WindowsAzure\Table
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */

namespace Tests\Functional\WindowsAzure\Table;

use Tests\Framework\TestResources;
use WindowsAzure\Common\ServiceException;
use WindowsAzure\Common\Internal\Utilities;
use WindowsAzure\Table\Models\BatchError;
use WindowsAzure\Table\Models\BatchOperations;
use WindowsAzure\Table\Models\DeleteEntityOptions;
use WindowsAzure\Table\Models\EdmType;
use WindowsAzure\Table\Models\Entity;
use WindowsAzure\Table\Models\InsertEntityResult;
use WindowsAzure\Table\Models\Query;
use WindowsAzure\Table\Models\QueryEntitiesOptions;
use WindowsAzure\Table\Models\QueryTablesOptions;
use WindowsAzure\Table\Models\UpdateEntityResult;
use WindowsAzure\Table\Models\Filters\Filter;

class TableServiceIntegrationTest extends IntegrationTestBase
{
    private static $testTablesPrefix = 'sdktest';
    private static $createableTablesPrefix = 'csdktest';
    private static $testTable1;
    private static $testTable2;
    private static $testTable3;
    private static $testTable4;
    private static $testTable5;
    private static $testTable6;
    private static $testTable7;
    private static $testTable8;
    private static $createTable1;
    private static $createTable2;
    private static $creatableTables;
    private static $testTables;

    private static $isOneTimeSetup = false;

    public function setUp()
    {
        parent::setUp();
        if (!self::$isOneTimeSetup) {
            $this->doOneTimeSetup();
            self::$isOneTimeSetup = true;
        }
    }

    private function doOneTimeSetup()
    {
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

        self::$testTable1 = self::$testTables[0];
        self::$testTable2 = self::$testTables[1];
        self::$testTable3 = self::$testTables[2];
        self::$testTable4 = self::$testTables[3];
        self::$testTable5 = self::$testTables[4];
        self::$testTable6 = self::$testTables[5];
        self::$testTable7 = self::$testTables[6];
        self::$testTable8 = self::$testTables[7];

        self::$createTable1 = self::$creatableTables[0];
        self::$createTable2 = self::$creatableTables[1];

        // Create all test containers and their content
        $this->deleteAllTables(self::$testTables);
        $this->deleteAllTables(self::$creatableTables);
        $this->createTables(self::$testTablesPrefix, self::$testTables);
    }

    public static function tearDownAfterClass()
    {
        if (self::$isOneTimeSetup) {
            $tmp = new TableServiceIntegrationTest();
            $tmp->setUp();
            $tmp->deleteAllTables(self::$testTables);
            $tmp->deleteTables(self::$createableTablesPrefix, self::$creatableTables);
            self::$isOneTimeSetup = false;
        }
        parent::tearDownAfterClass();
    }

    private function createTables($prefix, $list)
    {
        $containers = $this->listTables($prefix);
        foreach($list as $item)  {
            if (!in_array($item, $containers)) {
                $this->createTable($item);
            }
        }
    }

    private function deleteTables($prefix, $list)
    {
        $containers = $this->listTables($prefix);
        foreach($list as $item)  {
            if (in_array($item, $containers)) {
                $this->safeDeleteTable($item);
            }
        }
    }

    private function deleteAllTables($list)
    {
        foreach($list as $item)  {
            $this->safeDeleteTable($item);
        }
    }

    private function listTables($prefix)
    {
        $result = array();
        $qto = new QueryTablesOptions();
        $qto->setPrefix($prefix);
        $list = $this->restProxy->queryTables($qto);
        foreach($list->getTables() as $item)  {
            array_push($result, $item);
        }
        return $result;
    }

    /**
    * @covers WindowsAzure\Table\TableRestProxy::getServiceProperties
    */
    public function testGetServicePropertiesWorks()
    {
        // Arrange

        // Act
        $shouldReturn = false;
        try {
            $props = $this->restProxy->getServiceProperties()->getValue();
            $this->assertTrue(!$this->isEmulated(), 'Should succeed if and only if not running in emulator');
        } catch (ServiceException $e) {
            // Expect failure in emulator, as v1.6 doesn't support this method
            if ($this->isEmulated()) {
                $this->assertEquals(TestResources::STATUS_BAD_REQUEST, $e->getCode(), 'getCode');
                $shouldReturn = true;
            } else {
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
    * @covers WindowsAzure\Table\TableRestProxy::getServiceProperties
    * @covers WindowsAzure\Table\TableRestProxy::setServiceProperties
    */
    public function testSetServicePropertiesWorks()
    {
        // Arrange

        // Act
        $shouldReturn = false;
        try {
            $props = $this->restProxy->getServiceProperties()->getValue();
            $this->assertTrue(!$this->isEmulated(), 'Should succeed if and only if not running in emulator');
        } catch (ServiceException $e) {
            // Expect failure in emulator, as v1.6 doesn't support this method
            if ($this->isEmulated()) {
                $this->assertEquals(TestResources::STATUS_BAD_REQUEST, $e->getCode(), 'getCode');
                $shouldReturn = true;
            } else {
                throw $e;
            }
        }
        if($shouldReturn) {
            return;
        }

        $props->getLogging()->setRead(true);
        $this->restProxy->setServiceProperties($props);

        $props = $this->restProxy->getServiceProperties()->getValue();

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
    * @covers WindowsAzure\Table\TableRestProxy::createTable
    * @covers WindowsAzure\Table\TableRestProxy::getTable
    */
    public function testCreateTablesWorks()
    {
        // Act
        try {
            $this->restProxy->getTable(self::$createTable1);
            $error = null;
        } catch (ServiceException $e) {
            $error = $e;
        }
        $this->restProxy->createTable(self::$createTable1);
        $result = $this->restProxy->getTable(self::$createTable1);

        // Assert
        $this->assertNotNull($error, '$error');
        $this->assertNotNull($result, '$result');
    }

    /**
    * @covers WindowsAzure\Table\TableRestProxy::createTable
    * @covers WindowsAzure\Table\TableRestProxy::deleteTable
    * @covers WindowsAzure\Table\TableRestProxy::getTable
    */
    public function testDeleteTablesWorks()
    {
        // Act
        $this->restProxy->createTable(self::$createTable2);
        $result = $this->restProxy->getTable(self::$createTable2);

        $this->restProxy->deleteTable(self::$createTable2);
        try {
            $this->restProxy->getTable(self::$createTable2);
            $error = null;
        } catch (ServiceException $e) {
            $error = $e;
        }

        // Assert
        $this->assertNotNull($error, '$error');
        $this->assertNotNull($result, '$result');
    }

    /**
    * @covers WindowsAzure\Table\TableRestProxy::queryTables
    */
    public function testQueryTablesWorks()
    {
        // Act
        $result = $this->restProxy->queryTables();

        // Assert
        $this->assertNotNull($result, '$result');
    }

    /**
    * @covers WindowsAzure\Table\TableRestProxy::queryTables
    */
    public function testQueryTablesWithPrefixWorks()
    {
        // Act
        $qto = new QueryTablesOptions();
        $qto->setPrefix(self::$testTablesPrefix);
        $result = $this->restProxy->queryTables($qto);

        // Assert
        $this->assertNotNull($result, '$result');
    }

    /**
    * @covers WindowsAzure\Table\TableRestProxy::getTable
    */
    public function testGetTableWorks()
    {
        // Act
        $result = $this->restProxy->getTable(self::$testTable1);

        // Assert
        $this->assertNotNull($result, '$result');
    }

    /**
    * @covers WindowsAzure\Table\TableRestProxy::insertEntity
    */
    public function testInsertEntityWorks()
    {
        // Arrange
        $binaryData = chr(1) . chr(2) . chr(3) . chr(4);
        $uuid = Utilities::getGuid();
        $entity = new Entity();
        $entity->setPartitionKey('001');
        $entity->setRowKey('insertEntityWorks');
        $entity->addProperty('test', EdmType::BOOLEAN, true);
        $entity->addProperty('test2', EdmType::STRING, 'value');
        $entity->addProperty('test3', EdmType::INT32, 3);
        $entity->addProperty('test4', EdmType::INT64, '12345678901');
        $entity->addProperty('test5', EdmType::DATETIME, new \DateTime());
        $entity->addProperty('test6', EdmType::BINARY, $binaryData);
        $entity->addProperty('test7', EdmType::GUID, $uuid);

        // Act
        $result = $this->restProxy->insertEntity(self::$testTable2, $entity);

        // Assert
        $this->assertNotNull($result, '$result');
        $this->assertNotNull($result->getEntity(), '$result->getEntity()');

        $this->assertEquals('001', $result->getEntity()->getPartitionKey(), '$result->getEntity()->getPartitionKey()');
        $this->assertEquals('insertEntityWorks', $result->getEntity()->getRowKey(), '$result->getEntity()->getRowKey()');
        $this->assertNotNull($result->getEntity()->getTimestamp(), '$result->getEntity()->getTimestamp()');
        $this->assertNotNull($result->getEntity()->getETag(), '$result->getEntity()->getETag()');

        $this->assertNotNull($result->getEntity()->getProperty('test'), '$result->getEntity()->getProperty(\'test\')');
        $this->assertEquals(true, $result->getEntity()->getProperty('test')->getValue(), '$result->getEntity()->getProperty(\'test\')->getValue()');

        $this->assertNotNull($result->getEntity()->getProperty('test2'), '$result->getEntity()->getProperty(\'test2\')');
        $this->assertEquals('value', $result->getEntity()->getProperty('test2')->getValue(), '$result->getEntity()->getProperty(\'test2\')->getValue()');

        $this->assertNotNull($result->getEntity()->getProperty('test3'), '$result->getEntity()->getProperty(\'test3\')');
        $this->assertEquals(3, $result->getEntity()->getProperty('test3')->getValue(), '$result->getEntity()->getProperty(\'test3\')->getValue()');

        $this->assertNotNull($result->getEntity()->getProperty('test4'), '$result->getEntity()->getProperty(\'test4\')');
        $this->assertEquals('12345678901', $result->getEntity()->getProperty('test4')->getValue(), '$result->getEntity()->getProperty(\'test4\')->getValue()');

        $this->assertNotNull($result->getEntity()->getProperty('test5'), '$result->getEntity()->getProperty(\'test5\')');
        $this->assertTrue($result->getEntity()->getProperty('test5')->getValue() instanceof \DateTime, '$result->getEntity()->getProperty(\'test5\')->getValue() instanceof \DateTime');

        $this->assertNotNull($result->getEntity()->getProperty('test6'), '$result->getEntity()->getProperty(\'test6\')');
        $returnedBinaryData = $result->getEntity()->getProperty('test6')->getValue();
        $this->assertTrue(is_string($returnedBinaryData), 'binary data is string');
        $this->assertEquals(strlen($binaryData), strlen($returnedBinaryData), 'binary data lengths are the same');
        $this->assertEquals($binaryData, $returnedBinaryData, 'binary data are the same');

        $this->assertNotNull($result->getEntity()->getProperty('test7'), '$result->getEntity()->getProperty(\'test7\')');
        $this->assertTrue(is_string($result->getEntity()->getProperty('test7')->getValue()), 'is_string($result->getEntity()->getProperty(\'test7\')->getValue())');
        $this->assertEquals($uuid, $result->getEntity()->getPropertyValue('test7'), 'GUIDs are the same');
    }
    /**
    * @covers WindowsAzure\Table\TableRestProxy::insertEntity
    * @covers WindowsAzure\Table\TableRestProxy::updateEntity
    */
    public function testUpdateEntityWorks()
    {
        // Arrange
        $entity = new Entity();
        $entity->setPartitionKey('001');
        $entity->setRowKey('updateEntityWorks');
        $entity->addProperty('test', EdmType::BOOLEAN, true);
        $entity->addProperty('test2', EdmType::STRING, 'value');
        $entity->addProperty('test3', EdmType::INT32, 3);
        $entity->addProperty('test4', EdmType::INT64, '12345678901');
        $entity->addProperty('test5', EdmType::DATETIME, new \DateTime());

        // Act
        $result = $this->restProxy->insertEntity(self::$testTable2, $entity);
        $result->getEntity()->addProperty('test4', EdmType::INT32, 5);
        $this->restProxy->updateEntity(self::$testTable2, $result->getEntity());

        // Assert
        $this->assertTrue(true, 'Expect success in testUpdateEntityWorks');
    }

    /**
    * @covers WindowsAzure\Table\TableRestProxy::insertOrReplaceEntity
    */
    public function testInsertOrReplaceEntityWorks()
    {
        // Arrange
        $entity = new Entity();
        $entity->setPartitionKey('001');
        $entity->setRowKey('insertOrReplaceEntityWorks');
        $entity->addProperty('test', EdmType::BOOLEAN, true);
        $entity->addProperty('test2', EdmType::STRING, 'value');
        $entity->addProperty('test3', EdmType::INT32, 3);
        $entity->addProperty('test4', EdmType::INT64, '12345678901');
        $entity->addProperty('test5', EdmType::DATETIME, new \DateTime());

        // Act
        if($this->isEmulated()) {
            try {
                $this->restProxy->insertOrReplaceEntity(self::$testTable2, $entity);
                $this->assertFalse($this->isEmulated(), 'Expect failure when in emulator');
            } catch (ServiceException $e) {
                $this->assertEquals(TestResources::STATUS_NOT_FOUND, $e->getCode(), 'e->getCode');
            }
        } else {
            $this->restProxy->insertOrReplaceEntity(self::$testTable2, $entity);
            $entity->addProperty('test4', EdmType::INT32, 5);
            $entity->addProperty('test6', EdmType::INT32, 6);
            $this->restProxy->insertOrReplaceEntity(self::$testTable2, $entity);

            // Assert
            $this->assertTrue(true, 'Expect success in testInsertOrReplaceEntityWorks');
        }
    }

    /**
    * @covers WindowsAzure\Table\TableRestProxy::insertOrMergeEntity
    */
    public function testInsertOrMergeEntityWorks()
    {
        // Arrange
        $entity = new Entity();
        $entity->setPartitionKey('001');
        $entity->setRowKey('insertOrMergeEntityWorks');
        $entity->addProperty('test', EdmType::BOOLEAN, true);
        $entity->addProperty('test2', EdmType::STRING, 'value');
        $entity->addProperty('test3', EdmType::INT32, 3);
        $entity->addProperty('test4', EdmType::INT64, '12345678901');
        $entity->addProperty('test5', EdmType::DATETIME, new \DateTime());

        // Act
        if($this->isEmulated()) {
            try {
                $this->restProxy->insertOrMergeEntity(self::$testTable2, $entity);
                $this->assertFalse($this->isEmulated(), 'Expect failure when in emulator');
            } catch (ServiceException $e) {
                $this->assertEquals(TestResources::STATUS_NOT_FOUND, $e->getCode(), 'e->getCode');
            }
        } else {
            $this->restProxy->insertOrMergeEntity(self::$testTable2, $entity);
            $entity->addProperty('test4', EdmType::INT32, 5);
            $entity->addProperty('test6', EdmType::INT32, 6);
            $this->restProxy->insertOrMergeEntity(self::$testTable2, $entity);

            // Assert
            $this->assertTrue(true, 'Expect success in testInsertOrMergeEntityWorks');
        }
    }

    /**
    * @covers WindowsAzure\Table\TableRestProxy::insertEntity
    * @covers WindowsAzure\Table\TableRestProxy::mergeEntity
    */
    public function testMergeEntityWorks()
    {
        // Arrange
        $entity = new Entity();
        $entity->setPartitionKey('001');
        $entity->setRowKey('mergeEntityWorks');
        $entity->addProperty('test', EdmType::BOOLEAN, true);
        $entity->addProperty('test2', EdmType::STRING, 'value');
        $entity->addProperty('test3', EdmType::INT32, 3);
        $entity->addProperty('test4', EdmType::INT64, '12345678901');
        $entity->addProperty('test5', EdmType::DATETIME, new \DateTime());

        // Act
        $result = $this->restProxy->insertEntity(self::$testTable2, $entity);

        $result->getEntity()->addProperty('test4', EdmType::INT32, 5);
        $result->getEntity()->addProperty('test6', EdmType::INT32, 6);
        $this->restProxy->mergeEntity(self::$testTable2, $result->getEntity());

        // Assert
        $this->assertTrue(true, 'expect no errors');
    }

    /**
    * @covers WindowsAzure\Table\TableRestProxy::deleteEntity
    * @covers WindowsAzure\Table\TableRestProxy::insertEntity
    */
    public function testDeleteEntityWorks()
    {
        // Arrange
        $entity = new Entity();
        $entity->setPartitionKey('001');
        $entity->setRowKey('deleteEntityWorks');
        $entity->addProperty('test', EdmType::BOOLEAN, true);
        $entity->addProperty('test2', EdmType::STRING, 'value');
        $entity->addProperty('test3', EdmType::INT32, 3);
        $entity->addProperty('test4', EdmType::INT64, '12345678901');
        $entity->addProperty('test5', EdmType::DATETIME, new \DateTime());

        // Act
        $result = $this->restProxy->insertEntity(self::$testTable2, $entity);

        $this->restProxy->deleteEntity(self::$testTable2, $result->getEntity()->getPartitionKey(), $result->getEntity()->getRowKey());

        // Assert
        $this->assertTrue(true, 'expect no errors');
    }

    /**
    * @covers WindowsAzure\Table\TableRestProxy::deleteEntity
    * @covers WindowsAzure\Table\TableRestProxy::getEntity
    * @covers WindowsAzure\Table\TableRestProxy::insertEntity
    * @covers WindowsAzure\Table\TableRestProxy::queryEntities
    */
    public function testDeleteEntityTroublesomeKeyWorks()
    {
        // The service does not allow the following common characters in keys:
        // * chr(35) = '#'
        // * chr(47) = '/'
        // * chr(63) = '?'
        // * chr(92) = '\'
        //
        // In addition, the following values are not allowed, as they make the URL bad:
        // * 0-31, 127-159
        // That still leaves several options for making troublesome keys
        // * spaces
        // * single quotes
        // * Unicode
        // These need to be properly encoded when passed on the URL, else there will be trouble

        // Arrange
        $entity1 = new Entity();
        $entity1->setPartitionKey('001');
        $entity1->setRowKey('key with spaces');
        $entity2 = new Entity();
        $entity2->setPartitionKey('001');
        $entity2->setRowKey('key\'with\'quotes');
        $entity3 = new Entity();
        $entity3->setPartitionKey('001');
        $entity3->setRowKey('keyWithUnicode' . chr(0xEB) . chr(0x8B) . chr(0xA4)); // \uB2E4 in UTF8
        $entity4 = new Entity();
        $entity4->setPartitionKey('001');
        $entity4->setRowKey('key \'with\'\'' . chr(0xEB) . chr(0x8B) . chr(0xA4)); // \uB2E4 in UTF8
        $entity5 = new Entity();
        $entity5->setPartitionKey('001');
        $entity5->setRowKey('Qbert_Says=.!@%^&');

        // Act
        $result1 = $this->restProxy->insertEntity(self::$testTable8, $entity1);
        $result2 = $this->restProxy->insertEntity(self::$testTable8, $entity2);
        $result3 = $this->restProxy->insertEntity(self::$testTable8, $entity3);
        $result4 = $this->restProxy->insertEntity(self::$testTable8, $entity4);
        $result5 = $this->restProxy->insertEntity(self::$testTable8, $entity5);

        $this->restProxy->deleteEntity(self::$testTable8, $result1->getEntity()->getPartitionKey(), $result1->getEntity()->getRowKey());
        $this->restProxy->deleteEntity(self::$testTable8, $result2->getEntity()->getPartitionKey(), $result2->getEntity()->getRowKey());
        $this->restProxy->deleteEntity(self::$testTable8, $result3->getEntity()->getPartitionKey(), $result3->getEntity()->getRowKey());
        $this->restProxy->deleteEntity(self::$testTable8, $result4->getEntity()->getPartitionKey(), $result4->getEntity()->getRowKey());
        $this->restProxy->deleteEntity(self::$testTable8, $result5->getEntity()->getPartitionKey(), $result5->getEntity()->getRowKey());

        // Assert
        try {
            $this->restProxy->getEntity(self::$testTable8, $result1->getEntity()->getPartitionKey(), $result1->getEntity()->getRowKey());
            $this->fail('Expect an exception when getting an entity that does not exist');
        } catch (ServiceException $e) {
            $this->assertEquals(TestResources::STATUS_NOT_FOUND, $e->getCode(), 'getCode');
        }

        $qopts = new QueryEntitiesOptions();
        $qopts->setFilter(Filter::applyEq(Filter::applyPropertyName('RowKey'), Filter::applyConstant('key\'with\'quotes', EdmType::STRING)));
        $assertResult2 = $this->restProxy->queryEntities(self::$testTable8, $qopts);

        $this->assertEquals(0, count($assertResult2->getEntities()), 'entities returned');

        $assertResult3 = $this->restProxy->queryEntities(self::$testTable8);
        foreach($assertResult3->getEntities() as $entity)  {
            $this->assertFalse($entity3->getRowKey() == $entity->getRowKey(), 'Entity3 should be removed from the table');
            $this->assertFalse($entity4->getRowKey() == $entity->getRowKey(), 'Entity4 should be removed from the table');
            $this->assertFalse($entity5->getRowKey() == $entity->getRowKey(), 'Entity5 should be removed from the table');
        }
    }

    /**
    * @covers WindowsAzure\Table\TableRestProxy::deleteEntity
    * @covers WindowsAzure\Table\TableRestProxy::insertEntity
    */
    public function testDeleteEntityWithETagWorks()
    {
        // Arrange
        $entity = new Entity();
        $entity->setPartitionKey('001');
        $entity->setRowKey('deleteEntityWithETagWorks');
        $entity->addProperty('test', EdmType::BOOLEAN, true);
        $entity->addProperty('test2', EdmType::STRING, 'value');
        $entity->addProperty('test3', EdmType::INT32, 3);
        $entity->addProperty('test4', EdmType::INT64, '12345678901');
        $entity->addProperty('test5', EdmType::DATETIME, new \DateTime());

        // Act
        $result = $this->restProxy->insertEntity(self::$testTable2, $entity);

        $deo = new DeleteEntityOptions();
        $deo->setETag($result->getEntity()->getETag());
        $this->restProxy->deleteEntity(self::$testTable2, $result->getEntity()->getPartitionKey(), $result->getEntity()->getRowKey(),
                $deo);

        // Assert
        $this->assertTrue(true, 'expect no errors');
    }

    /**
    * @covers WindowsAzure\Table\TableRestProxy::getEntity
    * @covers WindowsAzure\Table\TableRestProxy::insertEntity
    */
    public function testGetEntityWorks()
    {
        // Arrange
        $binaryData = chr(1) . chr(2) . chr(3) . chr(4);
        $uuid = Utilities::getGuid();
        $entity = new Entity();
        $entity->setPartitionKey('001');
        $entity->setRowKey('getEntityWorks');
        $entity->addProperty('test', EdmType::BOOLEAN, true);
        $entity->addProperty('test2', EdmType::STRING, 'value');
        $entity->addProperty('test3', EdmType::INT32, 3);
        $entity->addProperty('test4', EdmType::INT64, '12345678901');
        $entity->addProperty('test5', EdmType::DATETIME, new \DateTime());
        $entity->addProperty('test6', EdmType::BINARY, $binaryData);
        $entity->addProperty('test7', EdmType::GUID, $uuid);

        // Act
        $insertResult = $this->restProxy->insertEntity(self::$testTable2, $entity);
        $result = $this->restProxy->getEntity(self::$testTable2, $insertResult->getEntity()->getPartitionKey(), $insertResult->getEntity()->getRowKey());

        // Assert
        $this->assertNotNull($result, '$result');
        $this->assertNotNull($result->getEntity(), '$result->getEntity()');

        $this->assertEquals('001', $result->getEntity()->getPartitionKey(), '$result->getEntity()->getPartitionKey()');
        $this->assertEquals('getEntityWorks', $result->getEntity()->getRowKey(), '$result->getEntity()->getRowKey()');
        $this->assertNotNull($result->getEntity()->getTimestamp(), '$result->getEntity()->getTimestamp()');
        $this->assertNotNull($result->getEntity()->getETag(), '$result->getEntity()->getETag()');

        $this->assertNotNull($result->getEntity()->getProperty('test'), '$result->getEntity()->getProperty(\'test\')');
        $this->assertEquals(true, $result->getEntity()->getProperty('test')->getValue(), '$result->getEntity()->getProperty(\'test\')->getValue()');

        $this->assertNotNull($result->getEntity()->getProperty('test2'), '$result->getEntity()->getProperty(\'test2\')');
        $this->assertEquals('value', $result->getEntity()->getProperty('test2')->getValue(), '$result->getEntity()->getProperty(\'test2\')->getValue()');

        $this->assertNotNull($result->getEntity()->getProperty('test3'), '$result->getEntity()->getProperty(\'test3\')');
        $this->assertEquals(3, $result->getEntity()->getProperty('test3')->getValue(), '$result->getEntity()->getProperty(\'test3\')->getValue()');

        $this->assertNotNull($result->getEntity()->getProperty('test4'), '$result->getEntity()->getProperty(\'test4\')');
        $this->assertEquals('12345678901', $result->getEntity()->getProperty('test4')->getValue(), '$result->getEntity()->getProperty(\'test4\')->getValue()');

        $this->assertNotNull($result->getEntity()->getProperty('test5'), '$result->getEntity()->getProperty(\'test5\')');
        $this->assertTrue($result->getEntity()->getProperty('test5')->getValue() instanceof \DateTime, '$result->getEntity()->getProperty(\'test5\')->getValue() instanceof \DateTime');

        $this->assertNotNull($result->getEntity()->getProperty('test6'), '$result->getEntity()->getProperty(\'test6\')');
        $returnedBinaryData = $result->getEntity()->getProperty('test6')->getValue();
        $this->assertTrue(is_string($returnedBinaryData), 'binary data is string');
        $this->assertEquals(strlen($binaryData), strlen($returnedBinaryData), 'binary data lengths are the same');
        $this->assertEquals($binaryData, $returnedBinaryData, 'binary data are the same');

        $this->assertNotNull($result->getEntity()->getProperty('test7'), '$result->getEntity()->getProperty(\'test7\')');
        $this->assertTrue(is_string($result->getEntity()->getProperty('test7')->getValue()), 'is_string($result->getEntity()->getProperty(\'test7\')->getValue())');
        $this->assertEquals($uuid, $result->getEntity()->getPropertyValue('test7'), 'GUIDs are the same');
    }

    /**
    * @covers WindowsAzure\Table\TableRestProxy::insertEntity
    * @covers WindowsAzure\Table\TableRestProxy::queryEntities
    */
    public function testQueryEntitiesWorks()
    {
        // Arrange
        $entity = new Entity();
        $entity->setPartitionKey('001');
        $entity->setRowKey('queryEntitiesWorks');
        $entity->addProperty('test', EdmType::BOOLEAN, true);
        $entity->addProperty('test2', EdmType::STRING, 'value');
        $entity->addProperty('test3', EdmType::INT32, 3);
        $entity->addProperty('test4', EdmType::INT64, '12345678901');
        $entity->addProperty('test5', EdmType::DATETIME, new \DateTime());

        // Act
        $this->restProxy->insertEntity(self::$testTable3, $entity);
        $result = $this->restProxy->queryEntities(self::$testTable3);

        // Assert
        $this->assertNotNull($result, '$result');
        $this->assertNotNull($result->getEntities(), '$result->getEntities()');
        $this->assertEquals(1, count($result->getEntities()), 'count($result->getEntities())');

        $entities = $result->getEntities();
        $this->assertNotNull($entities[0], '$entities[0];');

        $this->assertEquals('001', $entities[0]->getPartitionKey(), '$entities[0]->getPartitionKey()');
        $this->assertEquals('queryEntitiesWorks', $entities[0]->getRowKey(), '$entities[0]->getRowKey()');
        $this->assertNotNull($entities[0]->getTimestamp(), '$entities[0]->getTimestamp()');
        $this->assertNotNull($entities[0]->getETag(), '$entities[0]->getETag()');

        $this->assertNotNull($entities[0]->getProperty('test'), '$entities[0]->getProperty(\'test\')');
        $this->assertEquals(true, $entities[0]->getProperty('test')->getValue(), '$entities[0]->getProperty(\'test\')->getValue()');

        $this->assertNotNull($entities[0]->getProperty('test2'), '$entities[0]->getProperty(\'test2\')');
        $this->assertEquals('value', $entities[0]->getProperty('test2')->getValue(), '$entities[0]->getProperty(\'test2\')->getValue()');

        $this->assertNotNull($entities[0]->getProperty('test3'), '$entities[0]->getProperty(\'test3\')');
        $this->assertEquals(3, $entities[0]->getProperty('test3')->getValue(), '$entities[0]->getProperty(\'test3\')->getValue()');

        $this->assertNotNull($entities[0]->getProperty('test4'), '$entities[0]->getProperty(\'test4\')');
        $this->assertEquals('12345678901', $entities[0]->getProperty('test4')->getValue(), '$entities[0]->getProperty(\'test4\')->getValue()');

        $this->assertNotNull($entities[0]->getProperty('test5'), '$entities[0]->getProperty(\'test5\')');
        $this->assertTrue($entities[0]->getProperty('test5')->getValue() instanceof \DateTime, '$entities[0]->getProperty(\'test5\')->getValue() instanceof \DateTime');
    }

    /**
    * @covers WindowsAzure\Table\TableRestProxy::insertEntity
    * @covers WindowsAzure\Table\TableRestProxy::queryEntities
    */
    public function testQueryEntitiesWithPaginationWorks()
    {
        // Arrange
        $table = self::$testTable4;
        $numberOfEntries = 20;
        for ($i = 0; $i < $numberOfEntries; $i++) {
            $entity = new Entity();
            $entity->setPartitionKey('001');
            $entity->setRowKey('queryEntitiesWithPaginationWorks-' . $i);
            $entity->addProperty('test', EdmType::BOOLEAN, true);
            $entity->addProperty('test2', EdmType::STRING, 'value');
            $entity->addProperty('test3', EdmType::INT32, 3);
            $entity->addProperty('test4', EdmType::INT64, '12345678901');
            $entity->addProperty('test5', EdmType::DATETIME, new \DateTime());

            $this->restProxy->insertEntity($table, $entity);
        }

        // Act
        $entryCount = 0;
        $nextPartitionKey = null;
        $nextRowKey = null;
        while (true) {
            $qeo = new QueryEntitiesOptions();
            $qeo->setNextPartitionKey($nextPartitionKey);
            $qeo->setNextRowKey($nextRowKey);
            $result = $this->restProxy->queryEntities($table, $qeo);

            $entryCount += count($result->getEntities());

            if (is_null($nextPartitionKey)) break;

            $nextPartitionKey = $result->getNextPartitionKey();
            $nextRowKey = $result->getNextRowKey();
        }

        // Assert
        $this->assertEquals($numberOfEntries, $entryCount, '$entryCount');
    }

    /**
    * @covers WindowsAzure\Table\TableRestProxy::insertEntity
    * @covers WindowsAzure\Table\TableRestProxy::queryEntities
    */
    public function testQueryEntitiesWithFilterWorks()
    {
        // Arrange
        $table = self::$testTable5;
        $numberOfEntries = 5;
        $entities = array();
        for ($i = 0; $i < $numberOfEntries; $i++) {
            $entity = new Entity();
            $entity->setPartitionKey('001');
            $entity->setRowKey('queryEntitiesWithFilterWorks-' . $i);
            $entity->addProperty('test', EdmType::BOOLEAN, $i % 2 == 0);
            $entity->addProperty('test2', EdmType::STRING, '\'value" ' . $i);
            $entity->addProperty('test3', EdmType::INT32, $i);
            $entity->addProperty('test4', EdmType::INT64, strval('12345678901' + $i));
            $entity->addProperty('test5', EdmType::DATETIME, new \DateTime('2012-01-0' . $i));
            $entity->addProperty('test6', EdmType::BINARY, chr($i));
            $entity->addProperty('test7', EdmType::GUID, Utilities::getGuid());
            $entities[$i] = $entity;
            $this->restProxy->insertEntity($table, $entity);
        }

        {
            // Act
            $f = Filter::applyEq(Filter::applyPropertyName('RowKey'), Filter::applyConstant('queryEntitiesWithFilterWorks-3', EdmType::STRING));
            $q =new Query();
            $q->setFilter($f);
            $qeo = new QueryEntitiesOptions();
            $qeo->setQuery($q);
            $result = $this->restProxy->queryEntities($table, $qeo);

            // Assert
            $this->assertNotNull($result, '$result');
            $this->assertEquals(1, count($result->getEntities()), 'count($result->getEntities())');
            $resEnts = $result->getEntities();
            $this->assertEquals('queryEntitiesWithFilterWorks-3', $resEnts[0]->getRowKey(), '$resEnts[0]->getRowKey()');
        }

        {
            // Act
            $q = new Query();
            $q->setFilter(Filter::applyQueryString('RowKey eq \'queryEntitiesWithFilterWorks-3\''));
            $qeo = new QueryEntitiesOptions();
            $qeo->setQuery($q);
            $result = $this->restProxy->queryEntities($table, $qeo);

            // Assert
            $this->assertNotNull($result, '$result');
            $this->assertEquals(1, count($result->getEntities()), 'count($result->getEntities())');
            $resEnts = $result->getEntities();
            $this->assertEquals('queryEntitiesWithFilterWorks-3', $resEnts[0]->getRowKey(), '$resEnts[0]->getRowKey()');
        }

        {
            // Act
            $q = new Query();
            $q->setFilter(Filter::applyEq(Filter::applyPropertyName('test'), Filter::applyConstant(true, EdmType::BOOLEAN)));
            $qeo = new QueryEntitiesOptions();
            $qeo->setQuery($q);
            $result = $this->restProxy->queryEntities($table, $qeo);

            // Assert
            $this->assertNotNull($result, '$result');
            $this->assertEquals(3, count($result->getEntities()), 'count($result->getEntities())');
        }

        {
            // Act
            $q = new Query();
            $q->setFilter(Filter::applyEq(Filter::applyPropertyName('test2'), Filter::applyConstant('\'value" 3', EdmType::STRING)));
            $qeo = new QueryEntitiesOptions();
            $qeo->setQuery($q);
            $result = $this->restProxy->queryEntities($table, $qeo);

            // Assert
            $this->assertNotNull($result, '$result');
            $this->assertEquals(1, count($result->getEntities()), 'count($result->getEntities())');
            $resEnts = $result->getEntities();
            $this->assertEquals('queryEntitiesWithFilterWorks-3', $resEnts[0]->getRowKey(), '$resEnts[0]->getRowKey()');
        }

        {
            // Act
            $q = new Query();
            $q->setFilter(Filter::applyEq(Filter::applyPropertyName('test4'), Filter::applyConstant(12345678903, EdmType::INT64)));
            $qeo = new QueryEntitiesOptions();
            $qeo->setQuery($q);
            $result = $this->restProxy->queryEntities($table, $qeo);

            // Assert
            $this->assertNotNull($result, '$result');
            $this->assertEquals(1, count($result->getEntities()), 'count($result->getEntities())');
            $resEnts = $result->getEntities();
            $this->assertEquals('queryEntitiesWithFilterWorks-2', $resEnts[0]->getRowKey(), '$resEnts[0]->getRowKey()');
        }

        {
            // Act
            $q = new Query();
            $q->setFilter(Filter::applyEq(Filter::applyPropertyName('test5'), Filter::applyConstant(new \DateTime('2012-01-03'), EdmType::DATETIME)));
            $qeo = new QueryEntitiesOptions();
            $qeo->setQuery($q);
            $result = $this->restProxy->queryEntities($table, $qeo);

            // Assert
            $this->assertNotNull($result, '$result');
            $this->assertEquals(1, count($result->getEntities()), 'count($result->getEntities())');
            $resEnts = $result->getEntities();
            $this->assertEquals('queryEntitiesWithFilterWorks-3', $resEnts[0]->getRowKey(), '$resEnts[0]->getRowKey()');
        }

        {
            // Act
            $q = new Query();
            $ent3 = $entities[3];
            $q->setFilter(Filter::applyEq(Filter::applyPropertyName('test6'), Filter::applyConstant(chr(3), EdmType::BINARY)));
            $qeo = new QueryEntitiesOptions();
            $qeo->setQuery($q);
            $result = $this->restProxy->queryEntities($table, $qeo);

            // Assert
            $this->assertNotNull($result, '$result');
            $this->assertEquals(1, count($result->getEntities()), 'count($result->getEntities())');
            $resEnts = $result->getEntities();
            $this->assertEquals('queryEntitiesWithFilterWorks-3', $resEnts[0]->getRowKey(), '$resEnts[0]->getRowKey()');
        }

        {
            // Act
            $q = new Query();
            $ent3 = $entities[3];
            $q->setFilter(Filter::applyEq(Filter::applyPropertyName('test7'), Filter::applyConstant($ent3->getPropertyValue('test7'), EdmType::GUID)));
            $qeo = new QueryEntitiesOptions();
            $qeo->setQuery($q);
            $result = $this->restProxy->queryEntities($table, $qeo);

            // Assert
            $this->assertNotNull($result, '$result');
            $this->assertEquals(1, count($result->getEntities()), 'count($result->getEntities())');
            $resEnts = $result->getEntities();
            $this->assertEquals('queryEntitiesWithFilterWorks-3', $resEnts[0]->getRowKey(), '$resEnts[0]->getRowKey()');
        }
    }

    /**
    * @covers WindowsAzure\Table\TableRestProxy::batch
    */
    public function testBatchInsertWorks()
    {
        // Arrange
        $table = self::$testTable6;
        $partitionKey = '001';

        // Act
        $entity = new Entity();
        $entity->setPartitionKey($partitionKey);
        $entity->setRowKey('batchInsertWorks');
        $entity->addProperty('test', EdmType::BOOLEAN, true);
        $entity->addProperty('test2', EdmType::STRING, 'value');
        $entity->addProperty('test3', EdmType::INT32, 3);
        $entity->addProperty('test4', EdmType::INT64, '12345678901');
        $entity->addProperty('test5', EdmType::DATETIME, new \DateTime());

        $bo = new BatchOperations();
        $bo->addInsertEntity($table, $entity);
        $result = $this->restProxy->batch($bo);

        // Assert
        $this->assertNotNull($result, '$result');
        $this->assertEquals(1, count($result->getEntries()), 'count($result->getEntries())');
        $ents = $result->getEntries();
        $this->assertTrue($ents[0] instanceof InsertEntityResult, '$result->getEntries()->get(0)->getClass()');
    }

    /**
    * @covers WindowsAzure\Table\TableRestProxy::batch
    * @covers WindowsAzure\Table\TableRestProxy::insertEntity
    */
    public function testBatchUpdateWorks()
    {
        // Arrange
        $table = self::$testTable6;
        $partitionKey = '001';
        $entity = new Entity();
        $entity->setPartitionKey($partitionKey);
        $entity->setRowKey('batchUpdateWorks');
        $entity->addProperty('test', EdmType::BOOLEAN, true);
        $entity->addProperty('test2', EdmType::STRING, 'value');
        $entity->addProperty('test3', EdmType::INT32, 3);
        $entity->addProperty('test4', EdmType::INT64, '12345678901');
        $entity->addProperty('test5', EdmType::DATETIME, new \DateTime());
        $entity = $this->restProxy->insertEntity($table, $entity)->getEntity();

        // Act
        $entity->addProperty('test', EdmType::BOOLEAN, false);
        $bo = new BatchOperations();
        $bo->addUpdateEntity($table, $entity);
        $result = $this->restProxy->batch($bo);

        // Assert
        $this->assertNotNull($result, '$result');
        $this->assertEquals(1, count($result->getEntries()), 'count($result->getEntries())');
        $ents = $result->getEntries();
        $this->assertTrue($ents[0] instanceof UpdateEntityResult, '$result->getEntries()->get(0)->getClass()');
    }

    /**
    * @covers WindowsAzure\Table\TableRestProxy::batch
    * @covers WindowsAzure\Table\TableRestProxy::insertEntity
    */
    public function testBatchMergeWorks()
    {
        // Arrange
        $table = self::$testTable6;
        $partitionKey = '001';
        $entity = new Entity();
        $entity->setPartitionKey($partitionKey);
        $entity->setRowKey('batchMergeWorks');
        $entity->addProperty('test', EdmType::BOOLEAN, true);
        $entity->addProperty('test2', EdmType::STRING, 'value');
        $entity->addProperty('test3', EdmType::INT32, 3);
        $entity->addProperty('test4', EdmType::INT64, '12345678901');
        $entity->addProperty('test5', EdmType::DATETIME, new \DateTime());
        $entity = $this->restProxy->insertEntity($table, $entity)->getEntity();

        // Act
        $bo = new BatchOperations();
        $bo->addMergeEntity($table, $entity);
        $result = $this->restProxy->batch($bo);

        // Assert
        $this->assertNotNull($result, '$result');
        $this->assertEquals(1, count($result->getEntries()), 'count($result->getEntries())');
        $ents = $result->getEntries();
        $this->assertTrue($ents[0] instanceof UpdateEntityResult, '$result->getEntries()->get(0)->getClass()');
    }

    /**
    * @covers WindowsAzure\Table\TableRestProxy::batch
    */
    public function testBatchInsertOrReplaceWorks()
    {
        $this->skipIfEmulated();

        $table = self::$testTable6;
        $partitionKey = '001';

        // Act
        $entity = new Entity();
        $entity->setPartitionKey($partitionKey);
        $entity->setRowKey('batchInsertOrReplaceWorks');
        $entity->addProperty('test', EdmType::BOOLEAN, true);
        $entity->addProperty('test2', EdmType::STRING, 'value');
        $entity->addProperty('test3', EdmType::INT32, 3);
        $entity->addProperty('test4', EdmType::INT64, '12345678901');
        $entity->addProperty('test5', EdmType::DATETIME, new \DateTime());

        $bo = new BatchOperations();
        $bo->addInsertOrReplaceEntity($table, $entity);
        $result = $this->restProxy->batch($bo);

        // Assert
        $this->assertNotNull($result, '$result');
        $this->assertEquals(1, count($result->getEntries()), 'count($result->getEntries())');
        $ents = $result->getEntries();
        $this->assertTrue($ents[0] instanceof UpdateEntityResult, '$result->getEntries()->get(0)->getClass()');
    }

    /**
    * @covers WindowsAzure\Table\TableRestProxy::batch
    */
    public function testBatchInsertOrMergeWorks()
    {
        $this->skipIfEmulated();

        $table = self::$testTable6;
        $partitionKey = '001';

        // Act
        $entity = new Entity();
        $entity->setPartitionKey($partitionKey);
        $entity->setRowKey('batchInsertOrMergeWorks');
        $entity->addProperty('test', EdmType::BOOLEAN, true);
        $entity->addProperty('test2', EdmType::STRING, 'value');
        $entity->addProperty('test3', EdmType::INT32, 3);
        $entity->addProperty('test4', EdmType::INT64, '12345678901');
        $entity->addProperty('test5', EdmType::DATETIME, new \DateTime());

        $bo = new BatchOperations();
        $bo->addInsertOrMergeEntity($table, $entity);
        $result = $this->restProxy->batch($bo);

        // Assert
        $this->assertNotNull($result, '$result');
        $this->assertEquals(1, count($result->getEntries()), 'count($result->getEntries())');
        $ents = $result->getEntries();
        $this->assertTrue($ents[0] instanceof UpdateEntityResult, '$result->getEntries()->get(0)->getClass()');
    }

    /**
    * @covers WindowsAzure\Table\TableRestProxy::batch
    * @covers WindowsAzure\Table\TableRestProxy::insertEntity
    */
    public function testBatchDeleteWorks()
    {
        // Arrange
        $table = self::$testTable6;
        $partitionKey = '001';
        $entity = new Entity();
        $entity->setPartitionKey($partitionKey);
        $entity->setRowKey('batchDeleteWorks');
        $entity->addProperty('test', EdmType::BOOLEAN, true);
        $entity->addProperty('test2', EdmType::STRING, 'value');
        $entity->addProperty('test3', EdmType::INT32, 3);
        $entity->addProperty('test4', EdmType::INT64, '12345678901');
        $entity->addProperty('test5', EdmType::DATETIME, new \DateTime());
        $entity = $this->restProxy->insertEntity($table, $entity)->getEntity();

        // Act
        $bo = new BatchOperations();
        $bo->addDeleteEntity($table, $entity->getPartitionKey(), $entity->getRowKey(), $entity->getETag());
        $result = $this->restProxy->batch($bo);

        // Assert
        $this->assertNotNull($result, '$result');
        $this->assertEquals(1, count($result->getEntries()), 'count($result->getEntries())');
        $ents = $result->getEntries();
        $this->assertTrue(is_string($ents[0]), '$result->getEntries()[0] is string');
    }

    /**
    * @covers WindowsAzure\Table\TableRestProxy::batch
    */
    public function testBatchLotsOfInsertsWorks()
    {
        // Arrange
        $table = self::$testTable7;
        $partitionKey = '001';
        $insertCount = 100;

        // Act
        $batchOperations = new BatchOperations();
        for ($i = 0; $i < $insertCount; $i++) {

            $entity = new Entity();
            $entity->setPartitionKey($partitionKey);
            $entity->setRowKey('batchWorks-' . $i);
            $entity->addProperty('test', EdmType::BOOLEAN, true);
            $entity->addProperty('test2', EdmType::STRING, 'value');
            $entity->addProperty('test3', EdmType::INT32, 3);
            $entity->addProperty('test4', EdmType::INT64, '12345678901');
            $entity->addProperty('test5', EdmType::DATETIME, new \DateTime());

            $batchOperations->addInsertEntity($table, $entity);
        }
        $result = $this->restProxy->batch($batchOperations);

        // Assert
        $this->assertNotNull($result, '$result');
        $this->assertEquals($insertCount, count($result->getEntries()), 'count($result->getEntries())');
        for ($i = 0; $i < $insertCount; $i++) {
            $entity = $result->getEntries();
            $entity = $entity[$i]->getEntity();

            $this->assertEquals('001', $entity->getPartitionKey(), '$entity->getPartitionKey()');
            $this->assertEquals('batchWorks-' . $i, $entity->getRowKey(), '$entity->getRowKey()');
            $this->assertNotNull($entity->getTimestamp(), '$entity->getTimestamp()');
            $this->assertNotNull($entity->getETag(), '$entity->getETag()');

            $this->assertNotNull($entity->getProperty('test'), '$entity->getProperty(\'test\')');
            $this->assertEquals(true, $entity->getProperty('test')->getValue(), '$entity->getProperty(\'test\')->getValue()');

            $this->assertNotNull($entity->getProperty('test2'), '$entity->getProperty(\'test2\')');
            $this->assertEquals('value', $entity->getProperty('test2')->getValue(), '$entity->getProperty(\'test2\')->getValue()');

            $this->assertNotNull($entity->getProperty('test3'), '$entity->getProperty(\'test3\')');
            $this->assertEquals(3, $entity->getProperty('test3')->getValue(), '$entity->getProperty(\'test3\')->getValue()');

            $this->assertNotNull($entity->getProperty('test4'), '$entity->getProperty(\'test4\')');
            $this->assertEquals('12345678901', $entity->getProperty('test4')->getValue(), '$entity->getProperty(\'test4\')->getValue()');

            $this->assertNotNull($entity->getProperty('test5'), '$entity->getProperty(\'test5\')');
            $this->assertTrue($entity->getProperty('test5')->getValue() instanceof \DateTime, '$entity->getProperty(\'test5\')->getValue() instanceof \DateTime');
        }
    }

    /**
    * @covers WindowsAzure\Table\TableRestProxy::batch
    * @covers WindowsAzure\Table\TableRestProxy::insertEntity
    */
    public function testBatchAllOperationsTogetherWorks()
    {
        // Arrange
        $table = self::$testTable8;
        $partitionKey = '001';

        // Insert a few entities to allow updating them in batch
        $entity1 = new Entity();
        $entity1->setPartitionKey($partitionKey);
        $entity1->setRowKey('batchAllOperationsWorks-' . 1);
        $entity1->addProperty('test', EdmType::BOOLEAN, true);
        $entity1->addProperty('test2', EdmType::STRING, 'value');
        $entity1->addProperty('test3', EdmType::INT32, 3);
        $entity1->addProperty('test4', EdmType::INT64, '12345678901');
        $entity1->addProperty('test5', EdmType::DATETIME, new \DateTime());

        $entity1 = $this->restProxy->insertEntity($table, $entity1)->getEntity();

        $entity2 = new Entity();
        $entity2->setPartitionKey($partitionKey);
        $entity2->setRowKey('batchAllOperationsWorks-' . 2);
        $entity2->addProperty('test', EdmType::BOOLEAN, true);
        $entity2->addProperty('test2', EdmType::STRING, 'value');
        $entity2->addProperty('test3', EdmType::INT32, 3);
        $entity2->addProperty('test4', EdmType::INT64, '12345678901');
        $entity2->addProperty('test5', EdmType::DATETIME, new \DateTime());

        $entity2 = $this->restProxy->insertEntity($table, $entity2)->getEntity();

        $entity3 = new Entity();
        $entity3->setPartitionKey($partitionKey);
        $entity3->setRowKey('batchAllOperationsWorks-' . 3);
        $entity3->addProperty('test', EdmType::BOOLEAN, true);
        $entity3->addProperty('test2', EdmType::STRING, 'value');
        $entity3->addProperty('test3', EdmType::INT32, 3);
        $entity3->addProperty('test4', EdmType::INT64, '12345678901');
        $entity3->addProperty('test5', EdmType::DATETIME, new \DateTime());

        $entity3 = $this->restProxy->insertEntity($table, $entity3)->getEntity();

        $entity4 = new Entity();
        $entity4->setPartitionKey($partitionKey);
        $entity4->setRowKey('batchAllOperationsWorks-' . 4);
        $entity4->addProperty('test', EdmType::BOOLEAN, true);
        $entity4->addProperty('test2', EdmType::STRING, 'value');
        $entity4->addProperty('test3', EdmType::INT32, 3);
        $entity4->addProperty('test4', EdmType::INT64, '12345678901');
        $entity4->addProperty('test5', EdmType::DATETIME, new \DateTime());

        $entity4 = $this->restProxy->insertEntity($table, $entity4)->getEntity();

        // Act
        $batchOperations = new BatchOperations();

        $entity = new Entity();
        $entity->setPartitionKey($partitionKey);
        $entity->setRowKey('batchAllOperationsWorks');
        $entity->addProperty('test', EdmType::BOOLEAN, true);
        $entity->addProperty('test2', EdmType::STRING, 'value');
        $entity->addProperty('test3', EdmType::INT32, 3);
        $entity->addProperty('test4', EdmType::INT64, '12345678901');
        $entity->addProperty('test5', EdmType::DATETIME, new \DateTime());
        $batchOperations->addInsertEntity($table, $entity);
        $batchOperations->addDeleteEntity($table, $entity1->getPartitionKey(), $entity1->getRowKey(), $entity1->getETag());
        $entity2->addProperty('test3', EdmType::INT32, 5);
        $batchOperations->addUpdateEntity($table, $entity2);
        $entity3->addProperty('test3', EdmType::INT32, 5);
        $batchOperations->addMergeEntity($table, $entity3);
        $entity4->addProperty('test3', EdmType::INT32, 5);
        // Use different behavior in the emulator, as v1.6 does not support this method
        if (!$this->isEmulated()) {
            $batchOperations->addInsertOrReplaceEntity($table, $entity4);
        } else {
            $batchOperations->addUpdateEntity($table, $entity4);
        }

        $entity5 = new Entity();
        $entity5->setPartitionKey($partitionKey);
        $entity5->setRowKey('batchAllOperationsWorks-' . 5);
        $entity5->addProperty('test', EdmType::BOOLEAN, true);
        $entity5->addProperty('test2', EdmType::STRING, 'value');
        $entity5->addProperty('test3', EdmType::INT32, 3);
        $entity5->addProperty('test4', EdmType::INT64, '12345678901');
        $entity5->addProperty('test5', EdmType::DATETIME, new \DateTime());
        // Use different behavior in the emulator, as v1.6 does not support this method
        if ($this->isEmulated()) {
            $batchOperations->addInsertEntity($table, $entity5);
        } else {
            $batchOperations->addInsertOrMergeEntity($table, $entity5);
        }

        $result = $this->restProxy->batch($batchOperations);

        // Assert
        $this->assertNotNull($result, '$result');
        $this->assertEquals(count($batchOperations->getOperations()), count($result->getEntries()), 'count($result->getEntries())');

        $ents = $result->getEntries();
        $this->assertTrue($ents[0] instanceof InsertEntityResult, '$result->getEntries()->get(0)->getClass()');
        $this->assertTrue(is_string($ents[1]), '$result->getEntries()->get(1)->getClass()');
        $this->assertTrue($ents[2] instanceof UpdateEntityResult, '$result->getEntries()->get(2)->getClass()');
        $this->assertTrue($ents[3] instanceof UpdateEntityResult, '$result->getEntries()->get(3)->getClass()');
        $this->assertTrue($ents[4] instanceof UpdateEntityResult, '$result->getEntries()->get(4)->getClass()');
        if ($this->isEmulated()) {
            $this->assertTrue($ents[5] instanceof InsertEntityResult, '$result->getEntries()->get(5)->getClass()');
        } else {
            $this->assertTrue($ents[5] instanceof UpdateEntityResult, '$result->getEntries()->get(5)->getClass()');
        }
    }

    /**
    * @covers WindowsAzure\Table\TableRestProxy::batch
    * @covers WindowsAzure\Table\TableRestProxy::insertEntity
    * @covers WindowsAzure\Table\TableRestProxy::updateEntity
    */
    public function testBatchNegativeWorks()
    {
        // Arrange
        $table = self::$testTable8;
        $partitionKey = '001';

        // Insert an entity the modify it outside of the batch
        $entity1 = new Entity();
        $entity1->setPartitionKey($partitionKey);
        $entity1->setRowKey('batchNegativeWorks1');
        $entity1->addProperty('test', EdmType::INT32, 1);
        $entity2 = new Entity();
        $entity2->setPartitionKey($partitionKey);
        $entity2->setRowKey('batchNegativeWorks2');
        $entity2->addProperty('test', EdmType::INT32, 2);
        $entity3 = new Entity();
        $entity3->setPartitionKey($partitionKey);
        $entity3->setRowKey('batchNegativeWorks3');
        $entity3->addProperty('test', EdmType::INT32, 3);

        $entity1 = $this->restProxy->insertEntity($table, $entity1)->getEntity();
        $entity2 = $this->restProxy->insertEntity($table, $entity2)->getEntity();
        $entity2->addProperty('test', EdmType::INT32, -2);
        $this->restProxy->updateEntity($table, $entity2);

        // Act
        $batchOperations = new BatchOperations();

        // The $entity1 still has the original etag from the first submit,
        // so this update should fail, because another update was already made.
        $entity1->addProperty('test', EdmType::INT32, 3);
        $batchOperations->addDeleteEntity($table, $entity1->getPartitionKey(), $entity1->getRowKey(), $entity1->getETag());
        $batchOperations->addUpdateEntity($table, $entity2);
        $batchOperations->addInsertEntity($table, $entity3);

        $result = $this->restProxy->batch($batchOperations);

        // Assert
        $this->assertNotNull($result, '$result');
        $entries = $result->getEntries();
        $this->assertEquals(1, count($entries), 'count($result->getEntries())');
        $this->assertNotNull($entries[0], 'First $result should not be null');
        $this->assertTrue($entries[0] instanceof BatchError, 'First $result type');
        $error = $entries[0];
        $this->assertEquals(412, $error->getError()->getCode(), 'First $result status code');
    }
}


