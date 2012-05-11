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
 * @package    Tests\Functional\WindowsAzure\Table
 * @author     Jason Cooke <jcooke@microsoft.com>
 * @copyright  2012 Microsoft Corporation
 * @license    http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link       http://pear.php.net/package/azure-sdk-for-php
 */

namespace Tests\Functional\WindowsAzure\Table;

use WindowsAzure\Common\Internal\Resources;
use WindowsAzure\Common\Internal\ServiceException;
use WindowsAzure\Common\Configuration;
use WindowsAzure\Common\Models\Logging;
use WindowsAzure\Common\Models\Metrics;
use WindowsAzure\Common\Models\RetentionPolicy;
use WindowsAzure\Common\Models\ServiceProperties;
use WindowsAzure\Table\Models\DeleteEntityOptions;
use WindowsAzure\Table\Models\EdmType;
use WindowsAzure\Table\Models\Entity;
use WindowsAzure\Table\Models\Property;
use WindowsAzure\Table\Models\Query;
use WindowsAzure\Table\Models\QueryEntitiesOptions;
use WindowsAzure\Table\Models\QueryTablesOptions;
use WindowsAzure\Table\Models\TableServiceOptions;
use WindowsAzure\Table\Models\Filters\Filter;

class TableServiceFunctionalParametersTest extends FunctionalTestBase {
    public static function setUpBeforeClass() {
        parent::setUpBeforeClass();
    }

    public static function tearDownAfterClass() {
        parent::tearDownAfterClass();
    }

    /**
    * @covers WindowsAzure\Table\Internal\TableRestProxy::getServiceProperties
    */
    public function testGetServicePropertiesNullOptions() {
        try {
            $this->wrapper->getServiceProperties(null);
            $this->assertFalse(Configuration::isEmulated(), 'Should fail if and only if in emulator');
        }
        catch (ServiceException $e) {
            // Expect failure when run this test with emulator, as v1.6 doesn't support this method
            if (Configuration::isEmulated()) {
                // Properties are not supported in emulator
                $this->assertEquals(400, $e->getCode(), 'getCode');
            } else {
                throw $e;
            }
        }
    }

    /**
    * @covers WindowsAzure\Table\Internal\TableRestProxy::setServiceProperties
    */
    public function testSetServicePropertiesNullOptions1() {
        try {
            $this->wrapper->setServiceProperties(new ServiceProperties());
            $this->fail('Expect default service properties to cause service to error');
        }
        catch (ServiceException $e) {
            $this->assertEquals(400, $e->getCode(), 'Expect 400 when sending default service properties to server');
        }
    }

    /**
    * @covers WindowsAzure\Table\Internal\TableRestProxy::setServiceProperties
    */
    public function testSetServicePropertiesNullOptions2() {
        try {
            $this->wrapper->setServiceProperties(null);
            $this->fail('Expect null service properties to throw');
        }
        catch (\InvalidArgumentException $e) {
            $this->assertEquals(Resources::INVALID_SVC_PROP_MSG, $e->getMessage(), 'Expect error message');
            $this->assertEquals(0, $e->getCode(), 'Expected error code');
        }
    }

    /**
    * @covers WindowsAzure\Table\Internal\TableRestProxy::setServiceProperties
    */
    public function testSetServicePropertiesNullOptions3() {
        try {
            $this->wrapper->setServiceProperties(null, null);
            $this->fail('Expect service properties to throw');
        }
        catch (\InvalidArgumentException $e) {
            $this->assertEquals(Resources::INVALID_SVC_PROP_MSG, $e->getMessage(), 'Expect error message');
            $this->assertEquals(0, $e->getCode(), 'Expected error code');
        }
    }

    /**
    * @covers WindowsAzure\Table\Internal\TableRestProxy::setServiceProperties
    */
    public function testSetServicePropertiesNullOptions4() {
        try {
            $this->wrapper->setServiceProperties(new ServiceProperties(), null);
            $this->fail('Expect default service properties to cause service to error');
        }
        catch (ServiceException $e) {
            $this->assertEquals(400, $e->getCode(), 'Expect 400 when sending default service properties to server');
        }
    }

    /**
    * @covers WindowsAzure\Table\Internal\TableRestProxy::queryTables
    */
    public function testQueryTablesNullOptions() {
        $this->wrapper->queryTables(null);
        $this->assertTrue(true, 'Null options should be fine.');
    }

    /**
    * @covers WindowsAzure\Table\Internal\TableRestProxy::createTable
    */
    public function testCreateTableNullOptions() {
        try {
            $this->wrapper->createTable(null);
            $this->fail('Expect null table to throw');
        }
        catch (\InvalidArgumentException $e) {
            $this->assertEquals(sprintf(Resources::NULL_OR_EMPTY_MSG, 'table'), $e->getMessage(), 'Expect error message');
            $this->assertEquals(0, $e->getCode(), 'Expected error code');
        }
    }

    /**
    * @covers WindowsAzure\Table\Internal\TableRestProxy::deleteTable
    */
    public function testDeleteTableNullOptions() {
        try {
            $this->wrapper->deleteTable(null);
            $this->fail('Expect null table to throw');
        }
        catch (\InvalidArgumentException $e) {
            $this->assertEquals(sprintf(Resources::NULL_OR_EMPTY_MSG, 'table'), $e->getMessage(), 'Expect error message');
            $this->assertEquals(0, $e->getCode(), 'Expected error code');
        }
    }

    /**
    * @covers WindowsAzure\Table\Internal\TableRestProxy::getTable
    */
    public function testGetTableNullOptions() {
        try {
            $this->wrapper->getTable(null);
            $this->fail('Expect null table to throw');
        }
        catch (\InvalidArgumentException $e) {
            $this->assertEquals(sprintf(Resources::NULL_OR_EMPTY_MSG, 'table'), $e->getMessage(), 'Expect error message');
            $this->assertEquals(0, $e->getCode(), 'Expected error code');
        }
    }


    /**
    * @covers WindowsAzure\Table\Internal\TableRestProxy::insertEntity
    */
    public function testInsertEntityEntityNull() {
        $table = TableServiceFunctionalTestData::$TEST_TABLE_NAMES[0];

        try {
            $this->wrapper->insertEntity($table, null);
            $this->fail('Expect null entity to throw');
        }
        catch (\InvalidArgumentException $e) {
            $this->assertEquals(sprintf(Resources::NULL_OR_EMPTY_MSG, 'entity'), $e->getMessage(), 'Expect error message');
            $this->assertEquals(0, $e->getCode(), 'Expected error code');
        }
        $this->clearTable($table);
    }

    /**
    * @covers WindowsAzure\Table\Internal\TableRestProxy::insertEntity
    */
    public function testInsertEntityTableAndEntityNull() {
        $table = TableServiceFunctionalTestData::$TEST_TABLE_NAMES[0];

        try {
            $this->wrapper->insertEntity(null, null);
            $this->fail('Expect null table and entity to throw');
        }
        catch (\InvalidArgumentException $e) {
            $this->assertEquals(sprintf(Resources::NULL_OR_EMPTY_MSG, 'table'), $e->getMessage(), 'Expect error message');
            $this->assertEquals(0, $e->getCode(), 'Expected error code');
        }
        $this->clearTable($table);
    }

    /**
    * @covers WindowsAzure\Table\Internal\TableRestProxy::insertEntity
    */
    public function testInsertEntityTableNull() {
        $table = TableServiceFunctionalTestData::$TEST_TABLE_NAMES[0];

        try {
            $this->wrapper->insertEntity(null, new Entity());
            $this->fail('Expect null table to throw');
        }
        catch (\InvalidArgumentException $e) {
            $this->assertEquals(sprintf(Resources::NULL_OR_EMPTY_MSG, 'table'), $e->getMessage(), 'Expect error message');
            $this->assertEquals(0, $e->getCode(), 'Expected error code');
        }
        $this->clearTable($table);
    }

    /**
    * @covers WindowsAzure\Table\Internal\TableRestProxy::insertEntity
    */
    public function testInsertEntityEntityAndOptionsNull() {
        $table = TableServiceFunctionalTestData::$TEST_TABLE_NAMES[0];

        try {
            $this->wrapper->insertEntity($table, null, null);
            $this->fail('Expect null entity to throw');
        }
        catch (\InvalidArgumentException $e) {
            $this->assertEquals(sprintf(Resources::NULL_OR_EMPTY_MSG, 'entity'), $e->getMessage(), 'Expect error message');
            $this->assertEquals(0, $e->getCode(), 'Expected error code');
        }
        $this->clearTable($table);
    }

    /**
    * @covers WindowsAzure\Table\Internal\TableRestProxy::insertEntity
    */
    public function testInsertEntityEntityNullWithOptions() {
        $table = TableServiceFunctionalTestData::$TEST_TABLE_NAMES[0];

        try {
            $this->wrapper->insertEntity($table, null, TableServiceFunctionalTestData::getSimpleinsertEntityOptions());
            $this->fail('Expect null entity to throw');
        }
        catch (\InvalidArgumentException $e) {
            $this->assertEquals(sprintf(Resources::NULL_OR_EMPTY_MSG, 'entity'), $e->getMessage(), 'Expect error message');
            $this->assertEquals(0, $e->getCode(), 'Expected error code');
        }
        $this->clearTable($table);
    }

    /**
    * @covers WindowsAzure\Table\Internal\TableRestProxy::insertEntity
    */
    public function testInsertEntityOptionsNull() {
        $table = TableServiceFunctionalTestData::$TEST_TABLE_NAMES[0];

        $this->wrapper->insertEntity($table, TableServiceFunctionalTestData::getSimpleEntity(), null);
        $this->clearTable($table);
        $this->assertTrue(true, 'Null options should be fine.');
    }

    /**
    * @covers WindowsAzure\Table\Internal\TableRestProxy::insertEntity
    */
    public function testInsertEntityEmptyPartitionKey() {
        // TODO: Fails because of https://github.com/WindowsAzure/azure-sdk-for-php/issues/176
        $table = TableServiceFunctionalTestData::$TEST_TABLE_NAMES[0];

        $e = new Entity();
        $e->setPartitionKey('normalRowKey');
        $e->setRowKey('');
        $this->wrapper->insertEntity($table, $e);
        $this->clearTable($table);
        $this->assertTrue(true, 'Should be fine.');
    }

    /**
    * @covers WindowsAzure\Table\Internal\TableRestProxy::insertEntity
    */
    public function testInsertEntityEmptyRowKey() {
        // TODO: Fails because of https://github.com/WindowsAzure/azure-sdk-for-php/issues/176
        $table = TableServiceFunctionalTestData::$TEST_TABLE_NAMES[0];

        $e = new Entity();
        $e->setPartitionKey('normalPartitionKey');
        $e->setRowKey('');
        $this->wrapper->insertEntity($table, $e);
        $this->clearTable($table);
        $this->assertTrue(true, 'Should be fine.');
    }

    /**
    * @covers WindowsAzure\Table\Internal\TableRestProxy::insertEntity
    */
    public function testInsertStringWithAllAsciiCharacters() {
        $table = TableServiceFunctionalTestData::$TEST_TABLE_NAMES[0];

        $e = new Entity();
        $e->setPartitionKey('foo');
        $e->setRowKey(TableServiceFunctionalTestData::getNewKey());

        // ASCII code points in the following ranges are valid in XML 1.0 documents
        // - 0x09, 0x0A, 0x0D, 0x20-0x7F
        // Note: 0x0D gets mapped to 0x0A by the server.

        $k = '';
        for ($b = 0x20; $b < 0x30; $b++) {
            $k .= chr($b);
        }
        $k .= chr(0x09);
        for ($b = 0x30; $b < 0x40; $b++) {
            $k .= chr($b);
        }
        $k .= chr(0x0A);
        for ($b= 0x40; $b < 0x50; $b++) {
            $k .= chr($b);
        }
        $k .= chr(0x0A);
        for ($b = 0x50; $b < 0x80; $b++) {
            $k .= chr($b);
        }

        $e->addProperty('foo', EdmType::STRING, $k);

        $ret = $this->wrapper->insertEntity($table, $e);
        $this->assertNotNull($ret, '$ret');
        $this->assertNotNull($ret->getEntity(), '$ret->getEntity');

        $l = $ret->getEntity()->getPropertyValue('foo');
        $this->assertEquals($k, $l, '$ret->getEntity()->getPropertyValue(\'foo\')');
        $this->clearTable($table);
    }

    /**
    * @covers WindowsAzure\Table\Internal\TableRestProxy::getEntity
    */
    public function testGetEntityPartKeyNull() {
        // TODO: Fails because of https://github.com/WindowsAzure/azure-sdk-for-php/issues/206
        $table = TableServiceFunctionalTestData::$TEST_TABLE_NAMES[0];

        try {
            $this->wrapper->getEntity($table, null, TableServiceFunctionalTestData::getNewKey());
            $this->fail('Expect null options to throw');
        }
        catch (\InvalidArgumentException $e) {
            $this->assertEquals(Resources::NULL_TABLE_KEY_MSG, $e->getMessage(), 'Expect error message');
            $this->assertEquals(0, $e->getCode(), 'Expected error code');
        }
        $this->clearTable($table);
    }

    /**
    * @covers WindowsAzure\Table\Internal\TableRestProxy::getEntity
    */
    public function testGetEntityRowKeyNull() {
        // TODO: Fails because of https://github.com/WindowsAzure/azure-sdk-for-php/issues/206
        $table = TableServiceFunctionalTestData::$TEST_TABLE_NAMES[0];

        try {
            $this->wrapper->getEntity($table, TableServiceFunctionalTestData::getNewKey(), null);
            $this->assertTrue(true, 'Expect null row key to throw');
        }
        catch (\InvalidArgumentException $e) {
            $this->assertEquals(Resources::NULL_TABLE_KEY_MSG, $e->getMessage(), 'Expect error message');
            $this->assertEquals(0, $e->getCode(), 'Expected error code');
        }
        $this->clearTable($table);
    }

    /**
    * @covers WindowsAzure\Table\Internal\TableRestProxy::getEntity
    */
    public function testGetEntityKeysNull() {
        // TODO: Fails because of https://github.com/WindowsAzure/azure-sdk-for-php/issues/206
        $table = TableServiceFunctionalTestData::$TEST_TABLE_NAMES[0];

        try {
            $this->wrapper->getEntity($table, null, null);
            $this->fail('Expect null partition and row keys to throw');
        }
        catch (\InvalidArgumentException $e) {
            $this->assertEquals(Resources::NULL_TABLE_KEY_MSG, $e->getMessage(), 'Expect error message');
            $this->assertEquals(0, $e->getCode(), 'Expected error code');
        }
        $this->clearTable($table);
    }

    /**
    * @covers WindowsAzure\Table\Internal\TableRestProxy::getEntity
    */
    public function testGetEntityTableAndKeysNull() {
        $table = TableServiceFunctionalTestData::$TEST_TABLE_NAMES[0];

        try {
            $this->wrapper->getEntity(null, null, null);
            $this->fail('Expect null table name to throw');
        }
        catch (\InvalidArgumentException $e) {
            $this->assertEquals(sprintf(Resources::NULL_OR_EMPTY_MSG, 'table'), $e->getMessage(), 'Expect error message');
            $this->assertEquals(0, $e->getCode(), 'Expected error code');
        }
        $this->clearTable($table);
    }

    /**
    * @covers WindowsAzure\Table\Internal\TableRestProxy::getEntity
    */
    public function testGetEntityTableNull() {
        $table = TableServiceFunctionalTestData::$TEST_TABLE_NAMES[0];

        try {
            $this->wrapper->getEntity(null, TableServiceFunctionalTestData::getNewKey(), TableServiceFunctionalTestData::getNewKey());
            $this->fail('Expect null table name to throw');
        }
        catch (\InvalidArgumentException $e) {
            $this->assertEquals(sprintf(Resources::NULL_OR_EMPTY_MSG, 'table'), $e->getMessage(), 'Expect error message');
            $this->assertEquals(0, $e->getCode(), 'Expected error code');
        }
        $this->clearTable($table);
    }

    /**
    * @covers WindowsAzure\Table\Internal\TableRestProxy::getEntity
    */
    public function testGetEntityKeysAndOptionsNull() {
        // TODO: Fails because of https://github.com/WindowsAzure/azure-sdk-for-php/issues/206
        $table = TableServiceFunctionalTestData::$TEST_TABLE_NAMES[0];

        try {
            $this->wrapper->getEntity($table, null, null, null);
            $this->fail('Expect keys to throw');
        }
        catch (\InvalidArgumentException $e) {
            $this->assertEquals(Resources::NULL_TABLE_KEY_MSG, $e->getMessage(), 'Expect error message');
            $this->assertEquals(0, $e->getCode(), 'Expected error code');
        }
        $this->clearTable($table);
    }

    /**
    * @covers WindowsAzure\Table\Internal\TableRestProxy::getEntity
    * @covers WindowsAzure\Table\Internal\TableRestProxy::insertEntity
    */
    public function testGetEntityKeysNullWithOptions() {
        // TODO: Fails because of https://github.com/WindowsAzure/azure-sdk-for-php/issues/206
        $table = TableServiceFunctionalTestData::$TEST_TABLE_NAMES[0];
        $ent = TableServiceFunctionalTestData::getSimpleEntity();

        try {
            $this->wrapper->insertEntity($table, $ent);
            $this->wrapper->getEntity($table, null, null, new TableServiceOptions());
            $this->fail('Expect null keys to throw');
        }
        catch (\InvalidArgumentException $e) {
            $this->assertEquals(Resources::NULL_TABLE_KEY_MSG, $e->getMessage(), 'Expect error message');
            $this->assertEquals(0, $e->getCode(), 'Expected error code');
        }
        $this->clearTable($table);
    }

    /**
    * @covers WindowsAzure\Table\Internal\TableRestProxy::getEntity
    * @covers WindowsAzure\Table\Internal\TableRestProxy::insertEntity
    */
    public function testGetEntityOptionsNull() {
        $table = TableServiceFunctionalTestData::$TEST_TABLE_NAMES[0];
        $ent = TableServiceFunctionalTestData::getSimpleEntity();

        $this->wrapper->insertEntity($table, $ent);
        $this->wrapper->getEntity($table, $ent->getPartitionKey(), $ent->getRowKey(), null);
        $this->clearTable($table);
        $this->assertTrue(true, 'Null options should be fine.');
    }

    /**
    * @covers WindowsAzure\Table\Internal\TableRestProxy::deleteEntity
    */
    public function testDeleteEntityPartKeyNull() {
        // TODO: Fails because of https://github.com/WindowsAzure/azure-sdk-for-php/issues/206
        $table = TableServiceFunctionalTestData::$TEST_TABLE_NAMES[0];

        try {
            $this->wrapper->deleteEntity($table, null, TableServiceFunctionalTestData::getNewKey());
            $this->fail('Expect null partition key to throw');
        }
        catch (\InvalidArgumentException $e) {
            $this->assertEquals(Resources::NULL_TABLE_KEY_MSG, $e->getMessage(), 'Expect error message');
            $this->assertEquals(0, $e->getCode(), 'Expected error code');
        }
        $this->clearTable($table);
    }

    /**
    * @covers WindowsAzure\Table\Internal\TableRestProxy::deleteEntity
    */
    public function testDeleteEntityRowKeyNull() {
        // TODO: Fails because of https://github.com/WindowsAzure/azure-sdk-for-php/issues/206
        $table = TableServiceFunctionalTestData::$TEST_TABLE_NAMES[0];

        try {
            $this->wrapper->deleteEntity($table, TableServiceFunctionalTestData::getNewKey(), null);
            $this->fail('Expect null row key to throw');
        }
        catch (\InvalidArgumentException $e) {
            $this->assertEquals(Resources::NULL_TABLE_KEY_MSG, $e->getMessage(), 'Expect error message');
            $this->assertEquals(0, $e->getCode(), 'Expected error code');
        }
        $this->clearTable($table);
    }

    /**
    * @covers WindowsAzure\Table\Internal\TableRestProxy::deleteEntity
    */
    public function testDeleteEntityKeysNull() {
        // TODO: Fails because of https://github.com/WindowsAzure/azure-sdk-for-php/issues/206
        $table = TableServiceFunctionalTestData::$TEST_TABLE_NAMES[0];

        try {
            $this->wrapper->deleteEntity($table, null, null);
            $this->fail('Expect null keys to throw');
        }
        catch (\InvalidArgumentException $e) {
            $this->assertEquals(Resources::NULL_TABLE_KEY_MSG, $e->getMessage(), 'Expect error message');
            $this->assertEquals(0, $e->getCode(), 'Expected error code');
        }
        $this->clearTable($table);
    }

    /**
    * @covers WindowsAzure\Table\Internal\TableRestProxy::deleteEntity
    */
    public function testDeleteEntityTableAndKeysNull() {
        $table = TableServiceFunctionalTestData::$TEST_TABLE_NAMES[0];

        try {
            $this->wrapper->deleteEntity(null, null, null);
            $this->fail('Expect null table name to throw');
        }
        catch (\InvalidArgumentException $e) {
            $this->assertEquals(sprintf(Resources::NULL_OR_EMPTY_MSG, 'table'), $e->getMessage(), 'Expect error message');
            $this->assertEquals(0, $e->getCode(), 'Expected error code');
        }
        $this->clearTable($table);
    }

    /**
    * @covers WindowsAzure\Table\Internal\TableRestProxy::deleteEntity
    */
    public function testDeleteEntityTableNull() {
        $table = TableServiceFunctionalTestData::$TEST_TABLE_NAMES[0];

        try {
            $this->wrapper->deleteEntity(null, TableServiceFunctionalTestData::getNewKey(), TableServiceFunctionalTestData::getNewKey());
            $this->fail('Expect null table name to throw');
        }
        catch (\InvalidArgumentException $e) {
            $this->assertEquals(sprintf(Resources::NULL_OR_EMPTY_MSG, 'table'), $e->getMessage(), 'Expect error message');
            $this->assertEquals(0, $e->getCode(), 'Expected error code');
        }
        $this->clearTable($table);
    }

    /**
    * @covers WindowsAzure\Table\Internal\TableRestProxy::deleteEntity
    */
    public function testDeleteEntityKeysAndOptionsNull() {
        // TODO: Fails because of https://github.com/WindowsAzure/azure-sdk-for-php/issues/206
        $table = TableServiceFunctionalTestData::$TEST_TABLE_NAMES[0];

        try {
            $this->wrapper->deleteEntity($table, null, null, null);
            $this->fail('Expect null keys to throw');
        }
        catch (\InvalidArgumentException $e) {
            $this->assertEquals(Resources::NULL_TABLE_KEY_MSG, $e->getMessage(), 'Expect error message');
            $this->assertEquals(0, $e->getCode(), 'Expected error code');
        }
        $this->clearTable($table);
    }

    /**
    * @covers WindowsAzure\Table\Internal\TableRestProxy::deleteEntity
    * @covers WindowsAzure\Table\Internal\TableRestProxy::insertEntity
    */
    public function testDeleteEntityKeysNullWithOptions() {
        // TODO: Fails because of https://github.com/WindowsAzure/azure-sdk-for-php/issues/206
        $table = TableServiceFunctionalTestData::$TEST_TABLE_NAMES[0];
        $ent = TableServiceFunctionalTestData::getSimpleEntity();

        try {
            $this->wrapper->insertEntity($table, $ent);
            $this->wrapper->deleteEntity($table, null, null, new DeleteEntityOptions());
            $this->fail('Expect null keys to throw');
        }
        catch (\InvalidArgumentException $e) {
            $this->assertEquals(Resources::NULL_TABLE_KEY_MSG, $e->getMessage(), 'Expect error message');
            $this->assertEquals(0, $e->getCode(), 'Expected error code');
        }
        $this->clearTable($table);
    }

    /**
    * @covers WindowsAzure\Table\Internal\TableRestProxy::deleteEntity
    * @covers WindowsAzure\Table\Internal\TableRestProxy::insertEntity
    */
    public function testDeleteEntityOptionsNull() {
        $table = TableServiceFunctionalTestData::$TEST_TABLE_NAMES[0];
        $ent = TableServiceFunctionalTestData::getSimpleEntity();

        $this->wrapper->insertEntity($table, $ent);
        $this->wrapper->deleteEntity($table, $ent->getPartitionKey(), $ent->getRowKey(), null);
        $this->assertTrue(true, 'Expect null options to be fine');
        $this->clearTable($table);
    }

    /**
    * @covers WindowsAzure\Table\Internal\TableRestProxy::deleteEntity
    * @covers WindowsAzure\Table\Internal\TableRestProxy::insertEntity
    */
    public function testDeleteEntityTroublesomePartitionKey() {
        // TODO: Fails because of https://github.com/WindowsAzure/azure-sdk-for-php/issues/180

        // The service does not allow the following common characters in keys:
        // 35 '#'
        // 47 '/'
        // 63 '?'
        // 92 '\'
        // In addition, the following values are not allowed, as they make the URL bad:
        // 0-31, 127-159
        // That still leaves several options for making troublesome keys
        // * spaces
        // * single quotes
        // * Unicode
        // These need to be properly encoded when passed on the URL, else there will be trouble

        $table = TableServiceFunctionalTestData::$TEST_TABLE_NAMES[0];

        $e = new Entity();
        $e->setPartitionKey('partition\'Key\'');
        $e->setRowKey('niceKey');
        $this->wrapper->insertEntity($table, $e);
        $this->wrapper->deleteEntity($table, $e->getPartitionKey(), $e->getRowKey());
        $qopts = new QueryEntitiesOptions();
        $qopts->setFilter(Filter::applyEq(Filter::applyPropertyName('PartitionKey'), Filter::applyConstant($e->getRowKey(), EdmType::STRING)));
        $queryres = $this->wrapper->queryEntities($table, $qopts);
        $this->assertEquals(0, count($queryres->getEntities()), 'entities returned');

        $e = new Entity();
        $e->setPartitionKey('partition Key');
        $e->setRowKey('niceKey');
        $this->wrapper->insertEntity($table, $e);
        $this->wrapper->deleteEntity($table, $e->getPartitionKey(), $e->getRowKey());
        $qopts = new QueryEntitiesOptions();
        $qopts->setFilter(Filter::applyEq(Filter::applyPropertyName('PartitionKey'), Filter::applyConstant($e->getRowKey(), EdmType::STRING)));
        $queryres = $this->wrapper->queryEntities($table, $qopts);
        $this->assertEquals(0, count($queryres->getEntities()), 'entities returned');

        $e = new Entity();
        $e->setPartitionKey('partition '. TableServiceFunctionalTestData::getUnicodeString());
        $e->setRowKey('niceKey');
        $this->wrapper->insertEntity($table, $e);
        $this->wrapper->deleteEntity($table, $e->getPartitionKey(), $e->getRowKey());
        $qopts = new QueryEntitiesOptions();
        $qopts->setFilter(Filter::applyEq(Filter::applyPropertyName('PartitionKey'), Filter::applyConstant($e->getRowKey(), EdmType::STRING)));
        $queryres = $this->wrapper->queryEntities($table, $qopts);
        $this->assertEquals(0, count($queryres->getEntities()), 'entities returned');

        $this->clearTable($table);
    }

    /**
    * @covers WindowsAzure\Table\Internal\TableRestProxy::deleteEntity
    * @covers WindowsAzure\Table\Internal\TableRestProxy::insertEntity
    */
    public function testDeleteEntityTroublesomeRowKey() {
        // TODO: Fails because of https://github.com/WindowsAzure/azure-sdk-for-php/issues/180

        // The service does not allow the following common characters in keys:
        // 35 '#'
        // 47 '/'
        // 63 '?'
        // 92 '\'
        // In addition, the following values are not allowed, as they make the URL bad:
        // 0-31, 127-159
        // That still leaves several options for making troublesome keys
        // spaces
        // single quotes
        // Unicode
        // These need to be properly encoded when passed on the URL, else there will be trouble

        $table = TableServiceFunctionalTestData::$TEST_TABLE_NAMES[0];

        $e = new Entity();
        $e->setRowKey('row\'Key\'');
        $e->setPartitionKey('niceKey');
        $this->wrapper->insertEntity($table, $e);
        $this->wrapper->deleteEntity($table, $e->getPartitionKey(), $e->getRowKey());
        $qopts = new QueryEntitiesOptions();
        $qopts->setFilter(Filter::applyEq(Filter::applyPropertyName('RowKey'), Filter::applyConstant($e->getRowKey(), EdmType::STRING)));
        $queryres = $this->wrapper->queryEntities($table, $qopts);
        $this->assertEquals(0, count($queryres->getEntities()), 'entities returned');

        $e = new Entity();
        $e->setRowKey('row Key');
        $e->setPartitionKey('niceKey');
        $this->wrapper->insertEntity($table, $e);
        $this->wrapper->deleteEntity($table, $e->getPartitionKey(), $e->getRowKey());
        $qopts = new QueryEntitiesOptions();
        $qopts->setFilter(Filter::applyEq(Filter::applyPropertyName('RowKey'), Filter::applyConstant($e->getRowKey(), EdmType::STRING)));
        $queryres = $this->wrapper->queryEntities($table, $qopts);
        $this->assertEquals(0, count($queryres->getEntities()), 'entities returned');

        $e = new Entity();
        $e->setRowKey('row ' . TableServiceFunctionalTestData::getUnicodeString());
        $e->setPartitionKey('niceKey');
        $this->wrapper->insertEntity($table, $e);
        $this->wrapper->deleteEntity($table, $e->getPartitionKey(), $e->getRowKey());
        $qopts = new QueryEntitiesOptions();
        $qopts->setFilter(Filter::applyEq(Filter::applyPropertyName('RowKey'), Filter::applyConstant($e->getRowKey(), EdmType::STRING)));
        $queryres = $this->wrapper->queryEntities($table, $qopts);
        $this->assertEquals(0, count($queryres->getEntities()), 'entities returned');

        $this->clearTable($table);
    }

    /**
    * @covers WindowsAzure\Table\Internal\TableRestProxy::mergeEntity
    */
    public function testMergeEntityEntityNull() {
        $table = TableServiceFunctionalTestData::$TEST_TABLE_NAMES[0];

        try {
            $this->wrapper->mergeEntity($table, null);
            $this->assertTrue('Expect null entity to throw');
        }
        catch (\InvalidArgumentException $e) {
            $this->assertEquals(sprintf(Resources::NULL_OR_EMPTY_MSG, 'entity'), $e->getMessage(), 'Expect error message');
            $this->assertEquals(0, $e->getCode(), 'Expected error code');
        }
        $this->clearTable($table);
    }

    /**
    * @covers WindowsAzure\Table\Internal\TableRestProxy::mergeEntity
    */
    public function testMergeEntityTableAndEntityNull() {
        $table = TableServiceFunctionalTestData::$TEST_TABLE_NAMES[0];

        try {
            $this->wrapper->mergeEntity(null, null);
            $this->fail('Expect null table name and entity to throw');
        }
        catch (\InvalidArgumentException $e) {
            $this->assertEquals(sprintf(Resources::NULL_OR_EMPTY_MSG, 'table'), $e->getMessage(), 'Expect error message');
            $this->assertEquals(0, $e->getCode(), 'Expected error code');
        }
        $this->clearTable($table);
    }

    /**
    * @covers WindowsAzure\Table\Internal\TableRestProxy::mergeEntity
    */
    public function testMergeEntityTableNull() {
        $table = TableServiceFunctionalTestData::$TEST_TABLE_NAMES[0];

        try {
            $this->wrapper->mergeEntity(null, TableServiceFunctionalTestData::getSimpleEntity());
            $this->fail('Expect null table name to throw');
        }
        catch (\InvalidArgumentException $e) {
            $this->assertEquals(sprintf(Resources::NULL_OR_EMPTY_MSG, 'table'), $e->getMessage(), 'Expect error message');
            $this->assertEquals(0, $e->getCode(), 'Expected error code');
        }
        $this->clearTable($table);
    }

    /**
    * @covers WindowsAzure\Table\Internal\TableRestProxy::mergeEntity
    */
    public function testMergeEntityEntityAndOptionsNull() {
        $table = TableServiceFunctionalTestData::$TEST_TABLE_NAMES[0];

        try {
            $this->wrapper->mergeEntity($table, null, null);
            $this->fail('Expect null entity to throw');
        }
        catch (\InvalidArgumentException $e) {
            $this->assertEquals(sprintf(Resources::NULL_OR_EMPTY_MSG, 'entity'), $e->getMessage(), 'Expect error message');
            $this->assertEquals(0, $e->getCode(), 'Expected error code');
        }
        $this->clearTable($table);
    }

    /**
    * @covers WindowsAzure\Table\Internal\TableRestProxy::mergeEntity
    */
    public function testMergeEntityEntityNullWithOptions() {
        $table = TableServiceFunctionalTestData::$TEST_TABLE_NAMES[0];

        try {
            $this->wrapper->mergeEntity($table, null, TableServiceFunctionalTestData::getSimpleinsertEntityOptions());
            $this->fail('Expect null entity to throw');
        }
        catch (\InvalidArgumentException $e) {
            $this->assertEquals(sprintf(Resources::NULL_OR_EMPTY_MSG, 'entity'), $e->getMessage(), 'Expect error message');
            $this->assertEquals(0, $e->getCode(), 'Expected error code');
        }
        $this->clearTable($table);
    }

    /**
    * @covers WindowsAzure\Table\Internal\TableRestProxy::mergeEntity
    */
    public function testMergeEntityOptionsNull() {
        // TODO: Fails because of https://github.com/WindowsAzure/azure-sdk-for-php/issues/157
        $table = TableServiceFunctionalTestData::$TEST_TABLE_NAMES[0];

        try {
            $this->wrapper->mergeEntity($table, TableServiceFunctionalTestData::getSimpleEntity(), null);
            $this->fail('Expect 404 when merging with non-existant entity');
        }
        catch (ServiceException $e) {
            $this->assertEquals(404, $e->getCode(), 'Expect 404 when merging with non-existant entity');
        }
        $this->clearTable($table);
    }

    /**
    * @covers WindowsAzure\Table\Internal\TableRestProxy::updateEntity
    */
    public function testUpdateEntityEntityNull() {
        $table = TableServiceFunctionalTestData::$TEST_TABLE_NAMES[0];

        try {
            $this->wrapper->updateEntity($table, null);
            $this->fail('Expect null entity to throw');
        }
        catch (\InvalidArgumentException $e) {
            $this->assertEquals(sprintf(Resources::NULL_OR_EMPTY_MSG, 'entity'), $e->getMessage(), 'Expect error message');
            $this->assertEquals(0, $e->getCode(), 'Expected error code');
        }
        $this->clearTable($table);
    }

    /**
    * @covers WindowsAzure\Table\Internal\TableRestProxy::updateEntity
    */
    public function testUpdateEntityTableAndEntityNull() {
        $table = TableServiceFunctionalTestData::$TEST_TABLE_NAMES[0];

        try {
            $this->wrapper->updateEntity(null, null);
            $this->fail('Expect null table name and entity to throw');
        }
        catch (\InvalidArgumentException $e) {
            $this->assertEquals(sprintf(Resources::NULL_OR_EMPTY_MSG, 'table'), $e->getMessage(), 'Expect error message');
            $this->assertEquals(0, $e->getCode(), 'Expected error code');
        }
        $this->clearTable($table);
    }

    /**
    * @covers WindowsAzure\Table\Internal\TableRestProxy::updateEntity
    */
    public function testUpdateEntityTableNull() {
        $table = TableServiceFunctionalTestData::$TEST_TABLE_NAMES[0];

        try {
            $this->wrapper->updateEntity(null, TableServiceFunctionalTestData::getSimpleEntity());
            $this->fail('Expect null options to throw');
        }
        catch (\InvalidArgumentException $e) {
            $this->assertEquals(sprintf(Resources::NULL_OR_EMPTY_MSG, 'table'), $e->getMessage(), 'Expect error message');
            $this->assertEquals(0, $e->getCode(), 'Expected error code');
        }
        $this->clearTable($table);
    }

    /**
    * @covers WindowsAzure\Table\Internal\TableRestProxy::updateEntity
    */
    public function testUpdateEntityEntityAndOptionsNull() {
        $table = TableServiceFunctionalTestData::$TEST_TABLE_NAMES[0];

        try {
            $this->wrapper->updateEntity($table, null, null);
            $this->fail('Expect null entity to throw');
        }
        catch (\InvalidArgumentException $e) {
            $this->assertEquals(sprintf(Resources::NULL_OR_EMPTY_MSG, 'entity'), $e->getMessage(), 'Expect error message');
            $this->assertEquals(0, $e->getCode(), 'Expected error code');
        }
        $this->clearTable($table);
    }

    /**
    * @covers WindowsAzure\Table\Internal\TableRestProxy::updateEntity
    */
    public function testUpdateEntityEntityNullWithOptions() {
        $table = TableServiceFunctionalTestData::$TEST_TABLE_NAMES[0];

        try {
            $this->wrapper->updateEntity($table, null, TableServiceFunctionalTestData::getSimpleinsertEntityOptions());
            $this->fail('Expect null entity to throw');
        }
        catch (\InvalidArgumentException $e) {
            $this->assertEquals(sprintf(Resources::NULL_OR_EMPTY_MSG, 'entity'), $e->getMessage(), 'Expect error message');
            $this->assertEquals(0, $e->getCode(), 'Expected error code');
        }
        $this->clearTable($table);
    }

    /**
    * @covers WindowsAzure\Table\Internal\TableRestProxy::updateEntity
    */
    public function testUpdateEntityOptionsNull() {
        // TODO: Fails because of https://github.com/WindowsAzure/azure-sdk-for-php/issues/157
        $table = TableServiceFunctionalTestData::$TEST_TABLE_NAMES[0];

        try {
            $this->wrapper->updateEntity($table, TableServiceFunctionalTestData::getSimpleEntity(), null);
            $this->fail('Expect 404 when updating non-existant entity');
        }
        catch (ServiceException $e) {
            $this->assertEquals(404, $e->getCode(), 'Should be 404 for update nonexistant entity');
        }
        $this->clearTable($table);
    }

    /**
    * @covers WindowsAzure\Table\Internal\TableRestProxy::insertOrMergeEntity
    */
    public function testInsertOrMergeEntityEntityNull() {
        $table = TableServiceFunctionalTestData::$TEST_TABLE_NAMES[0];

        try {
            $this->wrapper->insertOrMergeEntity($table, null);
            $this->fail('Expect to throw for null entity');
        }
        catch (\InvalidArgumentException $e) {
            $this->assertEquals(sprintf(Resources::NULL_OR_EMPTY_MSG, 'entity'), $e->getMessage(), 'Expect error message');
            $this->assertEquals(0, $e->getCode(), 'Expected error code');
        }
        $this->clearTable($table);
    }

    /**
    * @covers WindowsAzure\Table\Internal\TableRestProxy::insertOrMergeEntity
    */
    public function testInsertOrMergeEntityTableAndEntityNull() {
        $table = TableServiceFunctionalTestData::$TEST_TABLE_NAMES[0];

        try {
            $this->wrapper->insertOrMergeEntity(null, null);
            $this->fail('Expect to throw for null table name and entity');
        }
        catch (\InvalidArgumentException $e) {
            $this->assertEquals(sprintf(Resources::NULL_OR_EMPTY_MSG, 'table'), $e->getMessage(), 'Expect error message');
            $this->assertEquals(0, $e->getCode(), 'Expected error code');
        }
        $this->clearTable($table);
    }

    /**
    * @covers WindowsAzure\Table\Internal\TableRestProxy::insertOrMergeEntity
    */
    public function testInsertOrMergeEntityTableNull() {
        $table = TableServiceFunctionalTestData::$TEST_TABLE_NAMES[0];

        try {
            $this->wrapper->insertOrMergeEntity(null, new Entity());
            $this->fail('Expect to throw for null table name');
        }
        catch (\InvalidArgumentException $e) {
            $this->assertEquals(sprintf(Resources::NULL_OR_EMPTY_MSG, 'table'), $e->getMessage(), 'Expect error message');
            $this->assertEquals(0, $e->getCode(), 'Expected error code');
        }
        $this->clearTable($table);
    }

    /**
    * @covers WindowsAzure\Table\Internal\TableRestProxy::insertOrMergeEntity
    */
    public function testInsertOrMergeEntityEntityAndOptionsNull() {
        $table = TableServiceFunctionalTestData::$TEST_TABLE_NAMES[0];

        try {
            $this->wrapper->insertOrMergeEntity($table, null, null);
            $this->fail('Expect to throw for null entity');
        }
        catch (\InvalidArgumentException $e) {
            $this->assertEquals(sprintf(Resources::NULL_OR_EMPTY_MSG, 'entity'), $e->getMessage(), 'Expect error message');
            $this->assertEquals(0, $e->getCode(), 'Expected error code');
        }
        $this->clearTable($table);
    }

    /**
    * @covers WindowsAzure\Table\Internal\TableRestProxy::insertOrMergeEntity
    */
    public function testInsertOrMergeEntityEntityNullWithOptions() {
        $table = TableServiceFunctionalTestData::$TEST_TABLE_NAMES[0];

        try {
            $this->wrapper->insertOrMergeEntity($table, null, TableServiceFunctionalTestData::getSimpleinsertEntityOptions());
            $this->fail('Expect to throw for null entity');
        }
        catch (\InvalidArgumentException $e) {
            $this->assertEquals(sprintf(Resources::NULL_OR_EMPTY_MSG, 'entity'), $e->getMessage(), 'Expect error message');
            $this->assertEquals(0, $e->getCode(), 'Expected error code');
        }
        $this->clearTable($table);
    }

    /**
    * @covers WindowsAzure\Table\Internal\TableRestProxy::insertOrMergeEntity
    */
    public function testInsertOrMergeEntityOptionsNull() {
        $table = TableServiceFunctionalTestData::$TEST_TABLE_NAMES[0];

        try {
            $this->wrapper->insertOrMergeEntity($table, TableServiceFunctionalTestData::getSimpleEntity(), null);
            $this->assertFalse(Configuration::isEmulated(), 'Should fail if and only if in emulator');
        }
        catch (ServiceException $e) {
            // Expect failure when run this test with emulator, as v1.6 doesn't support this method
            if (Configuration::isEmulated()) {
                $this->assertEquals(404, $e->getCode(), 'getCode');
            }
        }
        $this->clearTable($table);
    }

    /**
    * @covers WindowsAzure\Table\Internal\TableRestProxy::insertOrReplaceEntity
    */
    public function testInsertOrReplaceEntityEntityNull() {
        $table = TableServiceFunctionalTestData::$TEST_TABLE_NAMES[0];

        try {
            $this->wrapper->insertOrReplaceEntity($table, null);
            $this->fail('Expect to throw for null entity');
        }
        catch (\InvalidArgumentException $e) {
            $this->assertEquals(sprintf(Resources::NULL_OR_EMPTY_MSG, 'entity'), $e->getMessage(), 'Expect error message');
            $this->assertEquals(0, $e->getCode(), 'Expected error code');
        }
        $this->clearTable($table);
    }

    /**
    * @covers WindowsAzure\Table\Internal\TableRestProxy::insertOrReplaceEntity
    */
    public function testInsertOrReplaceEntityTableAndEntityNull() {
        $table = TableServiceFunctionalTestData::$TEST_TABLE_NAMES[0];

        try {
            $this->wrapper->insertOrReplaceEntity(null, null);
            $this->fail('Expect to throw for null table name and entity');
        }
        catch (\InvalidArgumentException $e) {
            $this->assertEquals(sprintf(Resources::NULL_OR_EMPTY_MSG, 'table'), $e->getMessage(), 'Expect error message');
            $this->assertEquals(0, $e->getCode(), 'Expected error code');
        }
        $this->clearTable($table);
    }

    /**
    * @covers WindowsAzure\Table\Internal\TableRestProxy::insertOrReplaceEntity
    */
    public function testInsertOrReplaceEntityTableNull() {
        $table = TableServiceFunctionalTestData::$TEST_TABLE_NAMES[0];

        try {
            $this->wrapper->insertOrReplaceEntity(null, new Entity());
            $this->fail('Expect to throw for null table name');
        }
        catch (\InvalidArgumentException $e) {
            $this->assertEquals(sprintf(Resources::NULL_OR_EMPTY_MSG, 'table'), $e->getMessage(), 'Expect error message');
            $this->assertEquals(0, $e->getCode(), 'Expected error code');
        }
        $this->clearTable($table);
    }

    /**
    * @covers WindowsAzure\Table\Internal\TableRestProxy::insertOrReplaceEntity
    */
    public function testInsertOrReplaceEntityEntityAndOptionsNull() {
        $table = TableServiceFunctionalTestData::$TEST_TABLE_NAMES[0];

        try {
            $this->wrapper->insertOrReplaceEntity($table, null, null);
            $this->fail('Expect to throw for null entity');
        }
        catch (\InvalidArgumentException $e) {
            $this->assertEquals(sprintf(Resources::NULL_OR_EMPTY_MSG, 'entity'), $e->getMessage(), 'Expect error message');
            $this->assertEquals(0, $e->getCode(), 'Expected error code');
        }
        $this->clearTable($table);
    }

    /**
    * @covers WindowsAzure\Table\Internal\TableRestProxy::insertOrReplaceEntity
    */
    public function testInsertOrReplaceEntityEntityNullWithOptions() {
        $table = TableServiceFunctionalTestData::$TEST_TABLE_NAMES[0];

        try {
            $this->wrapper->insertOrReplaceEntity($table, null, TableServiceFunctionalTestData::getSimpleinsertEntityOptions());
            $this->fail('Expect to throw for null entity');
        }
        catch (\InvalidArgumentException $e) {
            $this->assertEquals(sprintf(Resources::NULL_OR_EMPTY_MSG, 'entity'), $e->getMessage(), 'Expect error message');
            $this->assertEquals(0, $e->getCode(), 'Expected error code');
        }
        $this->clearTable($table);
    }

    /**
    * @covers WindowsAzure\Table\Internal\TableRestProxy::insertOrReplaceEntity
    */
    public function testInsertOrReplaceEntityOptionsNull() {
        $table = TableServiceFunctionalTestData::$TEST_TABLE_NAMES[0];

        try {
            $this->wrapper->insertOrReplaceEntity($table, TableServiceFunctionalTestData::getSimpleEntity(), null);
            $this->assertFalse(Configuration::isEmulated(), 'Should fail if and only if in emulator');
        }
        catch (ServiceException $e) {
            // Expect failure when run this test with emulator, as v1.6 doesn't support this method
            if (Configuration::isEmulated()) {
                $this->assertEquals(404, $e->getCode(), 'getCode');
            }
        }
        $this->clearTable($table);
    }

    /**
    * @covers WindowsAzure\Table\Internal\TableRestProxy::queryEntities
    */
    public function testQueryEntitiesTableNull() {
        $table = TableServiceFunctionalTestData::$TEST_TABLE_NAMES[0];

        try {
            $this->wrapper->queryEntities(null);
            $this->fail('Expect to throw for null table name');
        }
        catch (\InvalidArgumentException $e) {
            $this->assertEquals(sprintf(Resources::NULL_OR_EMPTY_MSG, 'table'), $e->getMessage(), 'Expect error message');
            $this->assertEquals(0, $e->getCode(), 'Expected error code');
        }
        $this->clearTable($table);
    }

    /**
    * @covers WindowsAzure\Table\Internal\TableRestProxy::queryEntities
    */
    public function testQueryEntitiesTableNullOptionsNull() {
        $table = TableServiceFunctionalTestData::$TEST_TABLE_NAMES[0];

        try {
            $this->wrapper->queryEntities(null, null);
            $this->fail('Expect to throw for null table name');
        }
        catch (\InvalidArgumentException $e) {
            $this->assertEquals(sprintf(Resources::NULL_OR_EMPTY_MSG, 'table'), $e->getMessage(), 'Expect error message');
            $this->assertEquals(0, $e->getCode(), 'Expected error code');
        }
        $this->clearTable($table);
    }

    /**
    * @covers WindowsAzure\Table\Internal\TableRestProxy::queryEntities
    */
    public function testQueryEntitiesTableNullWithOptions() {
        $table = TableServiceFunctionalTestData::$TEST_TABLE_NAMES[0];

        try {
            $this->wrapper->queryEntities(null, new QueryEntitiesOptions());
            $this->fail('Expect to throw for null table name');
        }
        catch (\InvalidArgumentException $e) {
            $this->assertEquals(sprintf(Resources::NULL_OR_EMPTY_MSG, 'table'), $e->getMessage(), 'Expect error message');
            $this->assertEquals(0, $e->getCode(), 'Expected error code');
        }
        $this->clearTable($table);
    }

    /**
    * @covers WindowsAzure\Table\Internal\TableRestProxy::queryEntities
    */
    public function testQueryEntitiesOptionsNull() {
        $table = TableServiceFunctionalTestData::$TEST_TABLE_NAMES[0];

        $this->wrapper->queryEntities($table, null);
        $this->clearTable($table);
        $this->assertTrue(true, 'Null options should be fine.');
    }
}

?>
