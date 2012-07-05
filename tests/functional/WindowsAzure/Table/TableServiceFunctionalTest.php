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
use Tests\Functional\WindowsAzure\Table\Enums\ConcurType;
use Tests\Functional\WindowsAzure\Table\Enums\MutatePivot;
use Tests\Functional\WindowsAzure\Table\Enums\OpType;
use Tests\Functional\WindowsAzure\Table\Models\BatchWorkerConfig;
use Tests\Functional\WindowsAzure\Table\Models\FakeTableInfoEntry;
use WindowsAzure\Common\Internal\Utilities;
use WindowsAzure\Common\ServiceException;
use WindowsAzure\Table\Models\BatchError;
use WindowsAzure\Table\Models\BatchOperations;
use WindowsAzure\Table\Models\DeleteEntityOptions;
use WindowsAzure\Table\Models\EdmType;
use WindowsAzure\Table\Models\Entity;
use WindowsAzure\Table\Models\InsertEntityResult;
use WindowsAzure\Table\Models\Property;
use WindowsAzure\Table\Models\QueryEntitiesOptions;
use WindowsAzure\Table\Models\QueryTablesOptions;
use WindowsAzure\Table\Models\TableServiceOptions;
use WindowsAzure\Table\Models\UpdateEntityResult;

class TableServiceFunctionalTest extends FunctionalTestBase
{
    /**
    * @covers WindowsAzure\Table\TableRestProxy::getServiceProperties
    * @covers WindowsAzure\Table\TableRestProxy::setServiceProperties
    */
    public function testGetServicePropertiesNoOptions()
    {
        $serviceProperties = TableServiceFunctionalTestData::getDefaultServiceProperties();

        $shouldReturn = false;
        try {
            $this->restProxy->setServiceProperties($serviceProperties);
            $this->assertFalse($this->isEmulated(), 'Should succeed when not running in emulator');
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

        $this->getServicePropertiesWorker(null);
    }

    /**
    * @covers WindowsAzure\Table\TableRestProxy::getServiceProperties
    * @covers WindowsAzure\Table\TableRestProxy::setServiceProperties
    */
    public function testGetServiceProperties()
    {
        $serviceProperties = TableServiceFunctionalTestData::getDefaultServiceProperties();

        try {
            $this->restProxy->setServiceProperties($serviceProperties);
            $this->assertFalse($this->isEmulated(), 'Should succeed when not running in emulator');
        } catch (ServiceException $e) {
            // Expect failure in emulator, as v1.6 doesn't support this method
            if ($this->isEmulated()) {
                $this->assertEquals(TestResources::STATUS_BAD_REQUEST, $e->getCode(), 'getCode');
            } else {
                throw $e;
            }
        }
    }

    /**
    * @covers WindowsAzure\Table\TableRestProxy::getServiceProperties
    */
    private function getServicePropertiesWorker($options)
    {
        self::println( 'Trying $options: ' . self::tmptostring($options));
        $effOptions = (is_null($options) ? new TableServiceOptions() : $options);
        try {
            $ret = (is_null($options) ? $this->restProxy->getServiceProperties() : $this->restProxy->getServiceProperties($effOptions));
            $this->assertFalse($this->isEmulated(), 'Should succeed when not running in emulator');
            $this->verifyServicePropertiesWorker($ret, null);
        } catch (ServiceException $e) {
            if ($this->isEmulated()) {
                // Expect failure in emulator, as v1.6 doesn't support this method
                $this->assertEquals(TestResources::STATUS_BAD_REQUEST, $e->getCode(), 'getCode');
            } else {
                $this->assertEquals(TestResources::STATUS_INTERNAL_SERVER_ERROR, $e->getCode(), 'getCode');
            }
        }
    }

    private function verifyServicePropertiesWorker($ret, $serviceProperties)
    {
        if (is_null($serviceProperties)) {
            $serviceProperties = TableServiceFunctionalTestData::getDefaultServiceProperties();
        }

        $sp = $ret->getValue();
        $this->assertNotNull($sp, 'getValue should be non-null');

        $l = $sp->getLogging();
        $this->assertNotNull($l, 'getValue()->getLogging() should be non-null');
        $this->assertEquals($serviceProperties->getLogging()->getVersion(), $l->getVersion(), 'getValue()->getLogging()->getVersion');
        $this->assertEquals($serviceProperties->getLogging()->getDelete(), $l->getDelete(), 'getValue()->getLogging()->getDelete');
        $this->assertEquals($serviceProperties->getLogging()->getRead(), $l->getRead(), 'getValue()->getLogging()->getRead');
        $this->assertEquals($serviceProperties->getLogging()->getWrite(), $l->getWrite(), 'getValue()->getLogging()->getWrite');

        $r = $l->getRetentionPolicy();
        $this->assertNotNull($r, 'getValue()->getLogging()->getRetentionPolicy should be non-null');
        $this->assertEquals($serviceProperties->getLogging()->getRetentionPolicy()->getDays(), $r->getDays(), 'getValue()->getLogging()->getRetentionPolicy()->getDays');

        $m = $sp->getMetrics();
        $this->assertNotNull($m, 'getValue()->getMetrics() should be non-null');
        $this->assertEquals($serviceProperties->getMetrics()->getVersion(), $m->getVersion(), 'getValue()->getMetrics()->getVersion');
        $this->assertEquals($serviceProperties->getMetrics()->getEnabled(), $m->getEnabled(), 'getValue()->getMetrics()->getEnabled');
        $this->assertEquals($serviceProperties->getMetrics()->getIncludeAPIs(), $m->getIncludeAPIs(), 'getValue()->getMetrics()->getIncludeAPIs');

        $r = $m->getRetentionPolicy();
        $this->assertNotNull($r, 'getValue()->getMetrics()->getRetentionPolicy should be non-null');
        $this->assertEquals($serviceProperties->getMetrics()->getRetentionPolicy()->getDays(), $r->getDays(), 'getValue()->getMetrics()->getRetentionPolicy()->getDays');
    }

    /**
    * @covers WindowsAzure\Table\TableRestProxy::getServiceProperties
    * @covers WindowsAzure\Table\TableRestProxy::setServiceProperties
    */
    public function testSetServicePropertiesNoOptions()
    {
        $serviceProperties = TableServiceFunctionalTestData::getDefaultServiceProperties();
        $this->setServicePropertiesWorker($serviceProperties, null);
    }

    /**
    * @covers WindowsAzure\Table\TableRestProxy::getServiceProperties
    * @covers WindowsAzure\Table\TableRestProxy::setServiceProperties
    */
    public function testSetServiceProperties()
    {
        $interestingServiceProperties = TableServiceFunctionalTestData::getInterestingServiceProperties();
        foreach($interestingServiceProperties as $serviceProperties)  {
            $options = new TableServiceOptions();
            $this->setServicePropertiesWorker($serviceProperties, $options);
        }

        if (!$this->isEmulated()) {
            $serviceProperties = TableServiceFunctionalTestData::getDefaultServiceProperties();
            $this->restProxy->setServiceProperties($serviceProperties);
        }
    }

    /**
    * @covers WindowsAzure\Table\TableRestProxy::getServiceProperties
    * @covers WindowsAzure\Table\TableRestProxy::setServiceProperties
    */
    private function setServicePropertiesWorker($serviceProperties, $options)
    {
        try {
            if (is_null($options)) {
                $this->restProxy->setServiceProperties($serviceProperties);
            } else {
                $this->restProxy->setServiceProperties($serviceProperties, $options);
            }

            $this->assertFalse($this->isEmulated(), 'Should succeed when not running in emulator');
            $ret = (is_null($options) ? $this->restProxy->getServiceProperties() : $this->restProxy->getServiceProperties($options));
            $this->verifyServicePropertiesWorker($ret, $serviceProperties);
        } catch (ServiceException $e) {
            if ($this->isEmulated()) {
                $this->assertEquals(TestResources::STATUS_BAD_REQUEST, $e->getCode(), 'getCode');
            } else {
                throw $e;
            }
        }
    }

    /**
    * @covers WindowsAzure\Table\TableRestProxy::queryTables
    */
    public function testQueryTablesNoOptions()
    {
        $this->queryTablesWorker(null);
    }

    /**
    * @covers WindowsAzure\Table\TableRestProxy::queryTables
    */
    public function testQueryTables()
    {
        $interestingqueryTablesOptions = TableServiceFunctionalTestData::getInterestingQueryTablesOptions($this->isEmulated());
        foreach($interestingqueryTablesOptions as $options)  {
            $this->queryTablesWorker($options);
        }
    }

    /**
    * @covers WindowsAzure\Table\TableRestProxy::queryTables
    */
    private function queryTablesWorker($options)
    {
        try {
            $ret = (is_null($options) ? $this->restProxy->queryTables() : $this->restProxy->queryTables($options));

            if (is_null($options)) {
                $options = new QueryTablesOptions();
            }

            if ((!is_null($options->getTop()) && $options->getTop() <= 0)) {
                if ($this->isEmulated()) {
                    $this->assertEquals(0, count($ret->getTables()), "should be no tables");
                } else {
                    $this->fail('Expect non-positive Top in $options to throw');
                }
            }

            $this->verifyqueryTablesWorker($ret, $options);
        } catch (ServiceException $e) {
            if ((!is_null($options->getTop()) && $options->getTop() <= 0) && !$this->isEmulated()) {
                $this->assertEquals(TestResources::STATUS_BAD_REQUEST, $e->getCode(), 'getCode');
            } else {
                throw $e;
            }
        }
    }

    private function verifyqueryTablesWorker($ret, $options)
    {
        $this->assertNotNull($ret->getTables(), 'getTables');

        $effectivePrefix = $options->getPrefix();
        if (is_null($effectivePrefix)) {
            $effectivePrefix = '';
        }

        $expectedFilter = $options->getFilter();
        if (TableServiceFunctionalTestUtils::isEqNotInTopLevel($expectedFilter)) {
            // This seems wrong, but appears to be a bug in the $service itself.
            // So working around the limitation.
            $expectedFilter = TableServiceFunctionalTestUtils::cloneRemoveEqNotInTopLevel($expectedFilter);
        }

        $expectedData = array();
        foreach(TableServiceFunctionalTestData::$testTableNames as $s)  {
            if (substr($s, 0, strlen($effectivePrefix)) == $effectivePrefix) {
                $fte = new FakeTableInfoEntry();
                $fte->TableName = $s;
                array_push($expectedData, $fte);
            }
        }

        if (!is_null($options->getNextTableName())) {
            $tmpExpectedData = array();
            $foundNext = false;
            foreach($expectedData as $s)  {
                if ($s == $options->getNextTableName()) {
                    $foundNext = true;
                }

                if (!$foundNext) {
                    continue;
                }

                if (substr($s, 0, strlen($effectivePrefix)) == $effectivePrefix) {
                    $fte = new FakeTableInfoEntry();
                    $fte->TableName = $s;
                    array_push($expectedData, $fte);
                }
            }

            $expectedData = $tmpExpectedData;
        }


        $expectedData = TableServiceFunctionalTestUtils::filterList($expectedFilter, $expectedData);
        $effectiveTop = (is_null($options->getTop()) ? 100000 : $options->getTop());
        $expectedCount = min($effectiveTop, count($expectedData));

        $tables = $ret->getTables();
        for ($i = 0; $i < $expectedCount; $i++) {
            $expected = $expectedData[$i]->TableName;
            // Assume there are other tables. Make sure the expected ones are there.
            $foundNext = false;
            foreach($tables as $actual) {
                if ($expected == $actual) {
                    $foundNext = true;
                    break;
                }
            }
            $this->assertTrue($foundNext, $expected . ' should be in getTables');
        }
    }

    /**
    * @covers WindowsAzure\Table\TableRestProxy::createTable
    * @covers WindowsAzure\Table\TableRestProxy::deleteTable
    * @covers WindowsAzure\Table\TableRestProxy::queryTables
    */
    public function testCreateTableNoOptions()
    {
        $this->createTableWorker(null);
    }

    /**
    * @covers WindowsAzure\Table\TableRestProxy::createTable
    * @covers WindowsAzure\Table\TableRestProxy::deleteTable
    * @covers WindowsAzure\Table\TableRestProxy::queryTables
    */
    public function testCreateTable()
    {
        $options = new TableServiceOptions();
        $this->createTableWorker($options);
    }

    /**
    * @covers WindowsAzure\Table\TableRestProxy::createTable
    * @covers WindowsAzure\Table\TableRestProxy::deleteTable
    * @covers WindowsAzure\Table\TableRestProxy::queryTables
    */
    private function createTableWorker($options)
    {
        $table = TableServiceFunctionalTestData::getInterestingTableName();
        $created = false;

        // Make sure that the list of all applicable Tables is correctly updated.
        $qto = new QueryTablesOptions();
        if (!$this->isEmulated()) {
            // The emulator has problems with some queries,
            // but full Azure allow this to be more efficient:
            $qto->setPrefix(TableServiceFunctionalTestData::$testUniqueId);
        }
        $qsStart = $this->restProxy->queryTables($qto);

        if (is_null($options)) {
            $this->restProxy->createTable($table);
        } else {
            $this->restProxy->createTable($table, $options);
        }
        $created = true;

        if (is_null($options)) {
            $options = new TableServiceOptions();
        }

        // Make sure that the list of all applicable Tables is correctly updated.
        $qs = $this->restProxy->queryTables($qto);
        if ($created) {
            $this->restProxy->deleteTable($table);
        }

        $this->assertEquals(count($qsStart->getTables()) + 1, count($qs->getTables()), 'After adding one, with Prefix=(\'' . TableServiceFunctionalTestData::$testUniqueId . '\'), then count(Tables)');
    }

    /**
    * @covers WindowsAzure\Table\TableRestProxy::createTable
    * @covers WindowsAzure\Table\TableRestProxy::deleteTable
    * @covers WindowsAzure\Table\TableRestProxy::queryTables
    */
    public function testDeleteTableNoOptions()
    {
        $this->deleteTableWorker(null);
    }

    /**
    * @covers WindowsAzure\Table\TableRestProxy::createTable
    * @covers WindowsAzure\Table\TableRestProxy::deleteTable
    * @covers WindowsAzure\Table\TableRestProxy::queryTables
    */
    public function testDeleteTable()
    {
        $options = new TableServiceOptions();
        $this->deleteTableWorker($options);
    }

    /**
    * @covers WindowsAzure\Table\TableRestProxy::createTable
    * @covers WindowsAzure\Table\TableRestProxy::deleteTable
    * @covers WindowsAzure\Table\TableRestProxy::queryTables
    */
    private function deleteTableWorker($options)
    {
        $Table = TableServiceFunctionalTestData::getInterestingTableName();

        // Make sure that the list of all applicable Tables is correctly updated.
        $qto = new QueryTablesOptions();
        if (!$this->isEmulated()) {
            // The emulator has problems with some queries,
            // but full Azure allow this to be more efficient:
            $qto->setPrefix(TableServiceFunctionalTestData::$testUniqueId);
        }
        $qsStart = $this->restProxy->queryTables($qto);

        // Make sure there is something to delete.
        $this->restProxy->createTable($Table);

        // Make sure that the list of all applicable Tables is correctly updated.
        $qs = $this->restProxy->queryTables($qto);
        $this->assertEquals(count($qsStart->getTables()) + 1, count($qs->getTables()), 'After adding one, with Prefix=(\'' . TableServiceFunctionalTestData::$testUniqueId . '\'), then count Tables');

        $deleted = false;
        if (is_null($options)) {
            $this->restProxy->deleteTable($Table);
        } else {
            $this->restProxy->deleteTable($Table, $options);
        }

        $deleted = true;

        if (is_null($options)) {
            $options = new TableServiceOptions();
        }

        // Make sure that the list of all applicable Tables is correctly updated.
        $qs = $this->restProxy->queryTables($qto);

        if (!$deleted) {
            $this->println('Test didn\'t delete the $Table, so try again more simply');
            // Try again. If it doesn't work, not much else to try.
            $this->restProxy->deleteTable($Table);
        }

        $this->assertEquals(count($qsStart->getTables()), count($qs->getTables()),'After adding then deleting one, with Prefix=(\'' . TableServiceFunctionalTestData::$testUniqueId . '\'), then count(Tables)');
    }

    /**
    * @covers WindowsAzure\Table\TableRestProxy::createTable
    * @covers WindowsAzure\Table\TableRestProxy::deleteTable
    * @covers WindowsAzure\Table\TableRestProxy::getTable
    */
    public function testGetTableNoOptions()
    {
        $this->getTableWorker(null);
    }

    /**
    * @covers WindowsAzure\Table\TableRestProxy::createTable
    * @covers WindowsAzure\Table\TableRestProxy::deleteTable
    * @covers WindowsAzure\Table\TableRestProxy::getTable
    */
    public function testGetTable()
    {
        $options = new TableServiceOptions();
        $this->getTableWorker($options);
    }

    /**
    * @covers WindowsAzure\Table\TableRestProxy::createTable
    * @covers WindowsAzure\Table\TableRestProxy::deleteTable
    * @covers WindowsAzure\Table\TableRestProxy::getTable
    */
    private function getTableWorker($options)
    {
        $table = TableServiceFunctionalTestData::getInterestingTableName();
        $created = false;

        $this->restProxy->createTable($table);
        $created = true;

        $ret = (is_null($options) ? $this->restProxy->getTable($table) : $this->restProxy->getTable($table, $options));

        if (is_null($options)) {
            $options = new TableServiceOptions();
        }

        $this->verifygetTableWorker($ret, $table);

        if ($created) {
            $this->restProxy->deleteTable($table);
        }
    }

    private function verifygetTableWorker($ret, $tableName)
    {
        $this->assertNotNull($ret, 'getTableEntry');
        $this->assertEquals($tableName, $ret->getName(), 'getTableEntry->Name');
    }

    /**
    * @covers WindowsAzure\Table\TableRestProxy::getEntity
    * @covers WindowsAzure\Table\TableRestProxy::insertEntity
    */
    public function testGetEntity()
    {
        $ents = TableServiceFunctionalTestData::getInterestingEntities();
        foreach($ents as $ent)  {
            $options = new TableServiceOptions();
            $this->getEntityWorker($ent, true, $options);
        }
    }

    /**
    * @covers WindowsAzure\Table\TableRestProxy::getEntity
    * @covers WindowsAzure\Table\TableRestProxy::insertEntity
    */
    private function getEntityWorker($ent, $isGood, $options)
    {
        $table = $this->getCleanTable();
        try {
            // Upload the entity.
            $this->restProxy->insertEntity($table, $ent);
            $qer = (is_null($options) ? $this->restProxy->getEntity($table, $ent->getPartitionKey(), $ent->getRowKey()) : $this->restProxy->getEntity($table, $ent->getPartitionKey(), $ent->getRowKey(), $options));

            if (is_null($options)) {
                $options = new TableServiceOptions();
            }

            $this->assertNotNull($qer->getEntity(), 'getEntity()');
            $this->verifygetEntityWorker($ent, $qer->getEntity());
        } catch (ServiceException $e) {
            if (!$isGood) {
                $this->assertEquals(TestResources::STATUS_BAD_REQUEST, $e->getCode(), 'getCode');
            } else if (is_null($ent->getPartitionKey()) || is_null($ent->getRowKey())) {
                $this->assertEquals(TestResources::STATUS_BAD_REQUEST, $e->getCode(), 'getCode');
            } else {
                throw $e;
            }
        }
        $this->clearTable($table);
    }

    private function verifygetEntityWorker($ent, $entReturned)
    {
        $expectedProps = array();
        foreach($ent->getProperties() as $pname => $actualProp)  {
            if (is_null($actualProp) || !is_null($actualProp->getValue())) {
                $cloneProp = null;
                if (!is_null($actualProp)) {
                    $cloneProp = new Property();
                    $cloneProp->setEdmType($actualProp->getEdmType());
                    $cloneProp->setValue($actualProp->getValue());
                }
                $expectedProps[$pname] = $cloneProp;
            }
        }

        // Compare the entities to make sure they match.
        $this->assertEquals($ent->getPartitionKey(), $entReturned->getPartitionKey(), 'getPartitionKey');
        $this->assertEquals($ent->getRowKey(), $entReturned->getRowKey(), 'getRowKey');
        $this->assertNotNull($entReturned->getETag(), 'getETag');
        if (!is_null($ent->getETag())) {
            $this->assertEquals($ent->getETag(), $entReturned->getETag(), 'getETag');
        }
        $this->assertNotNull($entReturned->getTimestamp(), 'getTimestamp');
        if (is_null($ent->getTimestamp())) {
            // This property will come back, so need to account for it.
            $expectedProps['Timestamp'] = null;
        } else {
            $this->assertEquals($ent->getTimestamp(), $entReturned->getTimestamp(), 'getTimestamp');
        }
        $this->assertNotNull($ent->getProperties(), 'getProperties');

        $nullCount = 0;
        foreach($entReturned->getProperties() as $pname => $actualProp) {
            if (is_null($actualProp->getValue())) {
                $nullCount++;
            }
        }

        // Need to skip null values from the count.
        $this->assertEquals(count($expectedProps) + $nullCount, count($entReturned->getProperties()), 'getProperties()');

        foreach($entReturned->getProperties() as $pname => $actualProp)  {
            $this->println($actualProp->getEdmType() . ':' . (is_null($actualProp->getValue()) ? 'NULL' :
                ($actualProp->getValue() instanceof \DateTime ? "date" : $actualProp->getValue())));
        }

        foreach($entReturned->getProperties() as $pname => $actualProp)  {
            $expectedProp = Utilities::tryGetValue($expectedProps, $pname, null);
            $this->assertNotNull($actualProp, 'getProperties[\'' . $pname . '\']');
            if (!is_null($expectedProp)) {
                $this->compareProperties($pname, $actualProp, $expectedProp);
            }

            $this->assertEquals($entReturned->getProperty($pname), $actualProp, 'getProperty(\'' . $pname . '\')');
            $this->assertEquals($entReturned->getPropertyValue($pname), $actualProp->getValue(), 'getPropertyValue(\'' . $pname . '\')');
        }
    }

    /**
    * @covers WindowsAzure\Table\TableRestProxy::deleteEntity
    * @covers WindowsAzure\Table\TableRestProxy::getEntity
    * @covers WindowsAzure\Table\TableRestProxy::insertEntity
    */
    public function testDeleteEntity()
    {
        $ents = TableServiceFunctionalTestData::getSimpleEntities(3);
        for ($useETag = 0; $useETag <= 2; $useETag++) {
            foreach($ents as $ent)  {
                $options = new DeleteEntityOptions();
                $this->deleteEntityWorker($ent, $useETag, $options);
            }
        }
    }

    /**
    * @covers WindowsAzure\Table\TableRestProxy::deleteEntity
    * @covers WindowsAzure\Table\TableRestProxy::getEntity
    * @covers WindowsAzure\Table\TableRestProxy::insertEntity
    */
    private function deleteEntityWorker($ent, $useETag, $options)
    {
        $table = $this->getCleanTable();
        try {
            // Upload the entity.
            $ier = $this->restProxy->insertEntity($table, $ent);
            if ($useETag == 1) {
                $options->setETag($ier->getEntity()->getETag());
            } else if ($useETag == 2) {
                $options->setETag('W/"datetime\'2012-03-05T21%3A46%3A25->5385467Z\'"');
            }

            $this->restProxy->deleteEntity($table, $ent->getPartitionKey(), $ent->getRowKey(), $options);

            if ($useETag == 2) {
                $this->fail('Expect bad etag throws');
            }

            // Check that the entity really is gone

            $gotError = false;
            try {
                $this->restProxy->getEntity($table, $ent->getPartitionKey(), $ent->getRowKey());
            } catch (ServiceException $e2) {
                $gotError = ($e2->getCode() == TestResources::STATUS_NOT_FOUND);
            }
            $this->assertTrue($gotError, 'Expect error when entity is deleted');
        } catch (ServiceException $e) {
            if ($useETag == 2) {
                $this->assertEquals(TestResources::STATUS_PRECONDITION_FAILED, $e->getCode(), 'getCode');
            } else {
                throw $e;
            }
        }
        $this->clearTable($table);
    }

    /**
    * @covers WindowsAzure\Table\TableRestProxy::insertEntity
    * @covers WindowsAzure\Table\TableRestProxy::queryEntities
    */
    public function testInsertEntity()
    {
        $ents = TableServiceFunctionalTestData::getInterestingEntities();
        foreach($ents as $ent)  {
            $options = new TableServiceOptions();
            $this->insertEntityWorker($ent, true, $options);
        }
    }

    /**
    * @covers WindowsAzure\Table\TableRestProxy::insertEntity
    * @covers WindowsAzure\Table\TableRestProxy::queryEntities
    */
    public function testInsertBadEntity()
    {
        $ents = TableServiceFunctionalTestData::getInterestingBadEntities();
        foreach($ents as $ent)  {
            $options = new TableServiceOptions();
            try {
                $this->insertEntityWorker($ent, true, $options);
                $this->fail('this call should fail');
            } catch (\InvalidArgumentException $e) {
                $this->assertEquals(0, $e->getCode(), 'getCode');
                $this->assertTrue(true, 'got expected exception');
            }
        }
    }

    /**
    * @covers WindowsAzure\Table\TableRestProxy::insertEntity
    * @covers WindowsAzure\Table\TableRestProxy::queryEntities
    */
    public function testInsertEntityBoolean()
    {
        foreach(TableServiceFunctionalTestData::getInterestingGoodBooleans() as $o)  {
            $ent = new Entity();
            $ent->setPartitionKey(TableServiceFunctionalTestData::getNewKey());
            $ent->setRowKey(TableServiceFunctionalTestData::getNewKey());
            $ent->addProperty('BOOLEAN', EdmType::BOOLEAN, $o);
            $this->insertEntityWorker($ent, true, null, $o);
        }
    }

    /**
    * @covers WindowsAzure\Table\TableRestProxy::insertEntity
    * @covers WindowsAzure\Table\TableRestProxy::queryEntities
    */
    public function testInsertEntityBooleanNegative()
    {
        foreach(TableServiceFunctionalTestData::getInterestingBadBooleans() as $o)  {
            $ent = new Entity();
            $ent->setPartitionKey(TableServiceFunctionalTestData::getNewKey());
            $ent->setRowKey(TableServiceFunctionalTestData::getNewKey());
            try {
                $ent->addProperty('BOOLEAN', EdmType::BOOLEAN, $o);
                $this->fail('Should get an exception when trying to parse this value');
                $this->insertEntityWorker($ent, false, null, $o);
            } catch (\Exception $e) {
                $this->assertEquals(0, $e->getCode(), 'getCode');
                $this->assertTrue(true, 'got expected exception');
            }
        }
    }

    /**
    * @covers WindowsAzure\Table\TableRestProxy::insertEntity
    * @covers WindowsAzure\Table\TableRestProxy::queryEntities
    */
    public function testInsertEntityDate()
    {
        foreach(TableServiceFunctionalTestData::getInterestingGoodDates() as $o)  {
            $ent = new Entity();
            $ent->setPartitionKey(TableServiceFunctionalTestData::getNewKey());
            $ent->setRowKey(TableServiceFunctionalTestData::getNewKey());
            $ent->addProperty('DATETIME', EdmType::DATETIME, $o);
            $this->insertEntityWorker($ent, true, null, $o);
        }
    }

    /**
    * @covers WindowsAzure\Table\TableRestProxy::insertEntity
    * @covers WindowsAzure\Table\TableRestProxy::queryEntities
    */
    public function testInsertEntityDateNegative()
    {
        foreach(TableServiceFunctionalTestData::getInterestingBadDates() as $o)  {
            $ent = new Entity();
            $ent->setPartitionKey(TableServiceFunctionalTestData::getNewKey());
            $ent->setRowKey(TableServiceFunctionalTestData::getNewKey());
            try {
                $ent->addProperty('DATETIME', EdmType::DATETIME, $o);
                $this->fail('Should get an exception when trying to parse this value');
                $this->insertEntityWorker($ent, false, null, $o);
            } catch (\Exception $e) {
                $this->assertEquals(0, $e->getCode(), 'getCode');
                $this->assertTrue(true, 'got expected exception');
            }
        }
    }

    /**
    * @covers WindowsAzure\Table\TableRestProxy::insertEntity
    * @covers WindowsAzure\Table\TableRestProxy::queryEntities
    */
    public function testInsertEntityDouble()
    {
        foreach(TableServiceFunctionalTestData::getInterestingGoodDoubles() as $o)  {
            $ent = new Entity();
            $ent->setPartitionKey(TableServiceFunctionalTestData::getNewKey());
            $ent->setRowKey(TableServiceFunctionalTestData::getNewKey());
            $ent->addProperty('DOUBLE', EdmType::DOUBLE, $o);
            $this->insertEntityWorker($ent, true, null, $o);
        }
    }

    /**
    * @covers WindowsAzure\Table\TableRestProxy::insertEntity
    * @covers WindowsAzure\Table\TableRestProxy::queryEntities
    */
    public function testInsertEntityDoubleNegative()
    {
        foreach(TableServiceFunctionalTestData::getInterestingBadDoubles() as $o)  {
            $ent = new Entity();
            $ent->setPartitionKey(TableServiceFunctionalTestData::getNewKey());
            $ent->setRowKey(TableServiceFunctionalTestData::getNewKey());
            try {
                $ent->addProperty('DOUBLE', EdmType::DOUBLE, $o);
                $this->fail('Should get an exception when trying to parse this value');
                $this->insertEntityWorker($ent, false, null, $o);
            } catch (\Exception $e) {
                $this->assertEquals(0, $e->getCode(), 'getCode');
                $this->assertTrue(true, 'got expected exception');
            }
        }
    }

    /**
    * @covers WindowsAzure\Table\TableRestProxy::insertEntity
    * @covers WindowsAzure\Table\TableRestProxy::queryEntities
    */
    public function testInsertEntityGuid()
    {
        foreach(TableServiceFunctionalTestData::getInterestingGoodGuids() as $o)  {
            $ent = new Entity();
            $ent->setPartitionKey(TableServiceFunctionalTestData::getNewKey());
            $ent->setRowKey(TableServiceFunctionalTestData::getNewKey());
            $ent->addProperty('GUID', EdmType::GUID, $o);
            $this->insertEntityWorker($ent, true, null, $o);
        }
    }

    /**
    * @covers WindowsAzure\Table\TableRestProxy::insertEntity
    * @covers WindowsAzure\Table\TableRestProxy::queryEntities
    */
    public function testInsertEntityGuidNegative()
    {
        foreach(TableServiceFunctionalTestData::getInterestingBadGuids() as $o)  {
            $ent = new Entity();
            $ent->setPartitionKey(TableServiceFunctionalTestData::getNewKey());
            $ent->setRowKey(TableServiceFunctionalTestData::getNewKey());
            try {
                $ent->addProperty('GUID', EdmType::GUID, $o);
                $this->fail('Should get an exception when trying to parse this value');
                $this->insertEntityWorker($ent, false, null, $o);
            } catch (\Exception $e) {
                $this->assertEquals(0, $e->getCode(), 'getCode');
                $this->assertTrue(true, 'got expected exception');
            }
        }
    }

    /**
    * @covers WindowsAzure\Table\TableRestProxy::insertEntity
    * @covers WindowsAzure\Table\TableRestProxy::queryEntities
    */
    public function testInsertEntityInt()
    {
        foreach(TableServiceFunctionalTestData::getInterestingGoodInts() as $o)  {
            $ent = new Entity();
            $ent->setPartitionKey(TableServiceFunctionalTestData::getNewKey());
            $ent->setRowKey(TableServiceFunctionalTestData::getNewKey());
            $ent->addProperty('INT32', EdmType::INT32, $o);
            $this->insertEntityWorker($ent, true, null, $o);
        }
    }

    /**
    * @covers WindowsAzure\Table\TableRestProxy::insertEntity
    * @covers WindowsAzure\Table\TableRestProxy::queryEntities
    */
    public function testInsertEntityIntNegative()
    {
        foreach(TableServiceFunctionalTestData::getInterestingBadInts() as $o)  {
            $ent = new Entity();
            $ent->setPartitionKey(TableServiceFunctionalTestData::getNewKey());
            $ent->setRowKey(TableServiceFunctionalTestData::getNewKey());
            try {
                $ent->addProperty('INT32', EdmType::INT32, $o);
                $this->fail('Should get an exception when trying to parse this value');
                $this->insertEntityWorker($ent, false, null, $o);
            } catch (\Exception $e) {
                $this->assertEquals(0, $e->getCode(), 'getCode');
                $this->assertTrue(true, 'got expected exception');
            }
        }
    }

    /**
    * @covers WindowsAzure\Table\TableRestProxy::insertEntity
    * @covers WindowsAzure\Table\TableRestProxy::queryEntities
    */
    public function testInsertEntityLong()
    {
        foreach(TableServiceFunctionalTestData::getInterestingGoodLongs() as $o)  {
            $ent = new Entity();
            $ent->setPartitionKey(TableServiceFunctionalTestData::getNewKey());
            $ent->setRowKey(TableServiceFunctionalTestData::getNewKey());
            $ent->addProperty('INT64', EdmType::INT64, $o);
            $this->insertEntityWorker($ent, true, null, $o);
        }
    }

    /**
    * @covers WindowsAzure\Table\TableRestProxy::insertEntity
    * @covers WindowsAzure\Table\TableRestProxy::queryEntities
    */
    public function testInsertEntityLongNegative()
    {
        foreach(TableServiceFunctionalTestData::getInterestingBadLongs() as $o)  {
            $ent = new Entity();
            $ent->setPartitionKey(TableServiceFunctionalTestData::getNewKey());
            $ent->setRowKey(TableServiceFunctionalTestData::getNewKey());
            try {
                $ent->addProperty('INT64', EdmType::INT64, $o);
                $this->fail('Should get an exception when trying to parse this value');
                $this->insertEntityWorker($ent, false, null, $o);
            } catch (\Exception $e) {
                $this->assertEquals(0, $e->getCode(), 'getCode');
                $this->assertTrue(true, 'got expected exception');
            }
        }
    }

    /**
    * @covers WindowsAzure\Table\TableRestProxy::insertEntity
    * @covers WindowsAzure\Table\TableRestProxy::queryEntities
    */
    public function testInsertEntityBinary()
    {
        foreach(TableServiceFunctionalTestData::getInterestingGoodBinaries() as $o)  {
            $ent = new Entity();
            $ent->setPartitionKey(TableServiceFunctionalTestData::getNewKey());
            $ent->setRowKey(TableServiceFunctionalTestData::getNewKey());
            $ent->addProperty('BINARY', EdmType::BINARY, $o);
            $this->insertEntityWorker($ent, true, null, $o);
        }
    }

    /**
    * @covers WindowsAzure\Table\TableRestProxy::insertEntity
    * @covers WindowsAzure\Table\TableRestProxy::queryEntities
    */
    public function testInsertEntityBinaryNegative()
    {
        foreach(TableServiceFunctionalTestData::getInterestingBadBinaries() as $o)  {
            $ent = new Entity();
            $ent->setPartitionKey(TableServiceFunctionalTestData::getNewKey());
            $ent->setRowKey(TableServiceFunctionalTestData::getNewKey());
            try {
                $ent->addProperty('BINARY', EdmType::BINARY, $o);
                $this->fail('Should get an exception when trying to parse this value');
                $this->insertEntityWorker($ent, false, null, $o);
            } catch (\Exception $e) {
                $this->assertEquals(0, $e->getCode(), 'getCode');
                $this->assertTrue(true, 'got expected exception');
            }
        }
    }

    /**
    * @covers WindowsAzure\Table\TableRestProxy::insertEntity
    * @covers WindowsAzure\Table\TableRestProxy::queryEntities
    */
    public function testInsertEntityString()
    {
        foreach(TableServiceFunctionalTestData::getInterestingGoodStrings() as $o)  {
            $ent = new Entity();
            $ent->setPartitionKey(TableServiceFunctionalTestData::getNewKey());
            $ent->setRowKey(TableServiceFunctionalTestData::getNewKey());
            $ent->addProperty('STRING', EdmType::STRING, $o);
            $this->insertEntityWorker($ent, true, null, $o);
        }
    }

    /**
    * @covers WindowsAzure\Table\TableRestProxy::insertEntity
    * @covers WindowsAzure\Table\TableRestProxy::queryEntities
    */
    private function insertEntityWorker($ent, $isGood, $options, $specialValue = null)
    {
        $table = $this->getCleanTable();
        try {
            $ret = (is_null($options) ? $this->restProxy->insertEntity($table, $ent) : $this->restProxy->insertEntity($table, $ent, $options));

            if (is_null($options)) {
                $options = new TableServiceOptions();
            }

            // Check that the message matches
            $this->assertNotNull($ret->getEntity(), 'getEntity()');
            $this->verifyinsertEntityWorker($ent, $ret->getEntity());

            if (is_null($ent->getPartitionKey()) || is_null($ent->getRowKey())) {
                $this->fail('Expect missing keys throw');
            }

            if (!$isGood) {
                $this->fail('Expect bad values to throw: ' . self::tmptostring($specialValue));
            }

            // Check that the message matches
            $qer = $this->restProxy->queryEntities($table);
            $this->assertNotNull($qer->getEntities(), 'getEntities()');
            $this->assertEquals(1, count($qer->getEntities()), 'getEntities() count');
            $entReturned = $qer->getEntities();
            $entReturned = $entReturned[0];
            $this->assertNotNull($entReturned, 'getEntities()[0]');

            $this->verifyinsertEntityWorker($ent, $entReturned);
        } catch (ServiceException $e) {
            if (!$isGood) {
                $this->assertEquals(TestResources::STATUS_BAD_REQUEST, $e->getCode(), 'getCode');
            } else if (is_null($ent->getPartitionKey()) || is_null($ent->getRowKey())) {
                $this->assertEquals(TestResources::STATUS_BAD_REQUEST, $e->getCode(), 'getCode');
            } else {
                throw $e;
            }
        }
        $this->clearTable($table);
    }

    /**
    * @covers WindowsAzure\Table\TableRestProxy::insertEntity
    * @covers WindowsAzure\Table\TableRestProxy::queryEntities
    * @covers WindowsAzure\Table\TableRestProxy::updateEntity
    */
    public function testUpdateEntity()
    {
        $ents = TableServiceFunctionalTestData::getSimpleEntities(2);
        foreach(MutatePivot::values() as $mutatePivot) {
            foreach($ents as $initialEnt)  {
                $options = new TableServiceOptions();
                $ent = TableServiceFunctionalTestUtils::cloneEntity($initialEnt);
                TableServiceFunctionalTestUtils::mutateEntity($ent, $mutatePivot);
                $this->updateEntityWorker($initialEnt, $ent, $options);
            }
        }
    }

    /**
    * @covers WindowsAzure\Table\TableRestProxy::insertEntity
    * @covers WindowsAzure\Table\TableRestProxy::queryEntities
    * @covers WindowsAzure\Table\TableRestProxy::updateEntity
    */
    private function updateEntityWorker($initialEnt, $ent, $options)
    {
        $table = $this->getCleanTable();

        // Upload the entity.
        $this->restProxy->insertEntity($table, $initialEnt);

        if (is_null($options)) {
            $this->restProxy->updateEntity($table, $ent);
        } else {
            $this->restProxy->updateEntity($table, $ent, $options);
        }

        if (is_null($options)) {
            $options = new TableServiceOptions();
        }

        // Check that the message matches
        $qer = $this->restProxy->queryEntities($table);
        $this->assertNotNull($qer->getEntities(), 'getEntities()');
        $this->assertEquals(1, count($qer->getEntities()), 'getEntities()');
        $entReturned = $qer->getEntities();
        $entReturned = $entReturned[0];
        $this->assertNotNull($entReturned, 'getEntities()[0]');
        $this->verifyinsertEntityWorker($ent, $entReturned);
        $this->clearTable($table);
    }

    /**
    * @covers WindowsAzure\Table\TableRestProxy::insertEntity
    * @covers WindowsAzure\Table\TableRestProxy::mergeEntity
    * @covers WindowsAzure\Table\TableRestProxy::queryEntities
    */
    public function testMergeEntity()
    {
        $ents = TableServiceFunctionalTestData::getSimpleEntities(2);
        foreach(MutatePivot::values() as $mutatePivot) {
            foreach($ents as $initialEnt)  {
                $options = new TableServiceOptions();
                $ent = TableServiceFunctionalTestUtils::cloneEntity($initialEnt);
                TableServiceFunctionalTestUtils::mutateEntity($ent, $mutatePivot);
                $this->mergeEntityWorker($initialEnt, $ent, $options);
            }
        }
    }

    /**
    * @covers WindowsAzure\Table\TableRestProxy::insertEntity
    * @covers WindowsAzure\Table\TableRestProxy::mergeEntity
    * @covers WindowsAzure\Table\TableRestProxy::queryEntities
    */
    private function mergeEntityWorker($initialEnt, $ent, $options)
    {
        $table = $this->getCleanTable();

        // Upload the entity.
        $this->restProxy->insertEntity($table, $initialEnt);

        if (is_null($options)) {
            $this->restProxy->mergeEntity($table, $ent);
        } else {
            $this->restProxy->mergeEntity($table, $ent, $options);
        }

        if (is_null($options)) {
            $options = new TableServiceOptions();
        }

        // Check that the message matches
        $qer = $this->restProxy->queryEntities($table);
        $this->assertNotNull($qer->getEntities(), 'getEntities()');
        $this->assertEquals(1, count($qer->getEntities()), 'getEntities() count');
        $entReturned = $qer->getEntities();
        $entReturned = $entReturned[0];
        $this->assertNotNull($entReturned, 'getEntities()[0]');

        $this->verifymergeEntityWorker($initialEnt, $ent, $entReturned);
        $this->clearTable($table);
    }

    /**
    * @covers WindowsAzure\Table\TableRestProxy::insertEntity
    * @covers WindowsAzure\Table\TableRestProxy::insertOrReplaceEntity
    * @covers WindowsAzure\Table\TableRestProxy::queryEntities
    */
    public function testInsertOrReplaceEntity()
    {
        $ents = TableServiceFunctionalTestData::getSimpleEntities(2);
        foreach(MutatePivot::values() as $mutatePivot) {
            foreach($ents as $initialEnt)  {
                $options = new TableServiceOptions();
                $ent = TableServiceFunctionalTestUtils::cloneEntity($initialEnt);
                TableServiceFunctionalTestUtils::mutateEntity($ent, $mutatePivot);
                try {
                    $this->insertOrReplaceEntityWorker($initialEnt, $ent, $options);
                    $this->assertFalse($this->isEmulated(), 'Should succeed when not running in emulator');
                } catch (ServiceException $e) {
                    // Expect failure in emulator, as v1.6 doesn't support this method
                    if ($this->isEmulated()) {
                        $this->assertEquals(TestResources::STATUS_BAD_REQUEST, $e->getCode(), 'getCode');
                    } else {
                        throw $e;
                    }
                }
            }
        }
    }

    /**
    * @covers WindowsAzure\Table\TableRestProxy::insertEntity
    * @covers WindowsAzure\Table\TableRestProxy::insertOrReplaceEntity
    * @covers WindowsAzure\Table\TableRestProxy::queryEntities
    */
    private function insertOrReplaceEntityWorker($initialEnt, $ent, $options)
    {
        $table = $this->getCleanTable();

        // Upload the entity.
        $this->restProxy->insertEntity($table, $initialEnt);
        if (is_null($options)) {
            $this->restProxy->insertOrReplaceEntity($table, $ent);
        } else {
            $this->restProxy->insertOrReplaceEntity($table, $ent, $options);
        }

        if (is_null($options)) {
            $options = new TableServiceOptions();
        }

        // Check that the message matches
        $qer = $this->restProxy->queryEntities($table);
        $this->assertNotNull($qer->getEntities(), 'getEntities()');
        $this->assertEquals(1, count($qer->getEntities()), 'getEntities() count');
        $entReturned = $qer->getEntities();
        $entReturned = $entReturned[0];
        $this->assertNotNull($entReturned, 'getEntities()[0]');

        $this->verifyinsertEntityWorker($ent, $entReturned);
        $this->clearTable($table);
    }

    /**
    * @covers WindowsAzure\Table\TableRestProxy::insertEntity
    * @covers WindowsAzure\Table\TableRestProxy::insertOrMergeEntity
    * @covers WindowsAzure\Table\TableRestProxy::queryEntities
    */
    public function testInsertOrMergeEntity()
    {
        $ents = TableServiceFunctionalTestData::getSimpleEntities(2);
        foreach(MutatePivot::values() as $mutatePivot) {
            foreach($ents as $initialEnt)  {
                $options = new TableServiceOptions();
                $ent = TableServiceFunctionalTestUtils::cloneEntity($initialEnt);
                TableServiceFunctionalTestUtils::mutateEntity($ent, $mutatePivot);
                try {
                    $this->insertOrMergeEntityWorker($initialEnt, $ent, $options);
                    $this->assertFalse($this->isEmulated(), 'Should succeed when not running in emulator');
                } catch (ServiceException $e) {
                    // Expect failure in emulator, as v1.6 doesn't support this method
                    if ($this->isEmulated()) {
                        $this->assertEquals(TestResources::STATUS_BAD_REQUEST, $e->getCode(), 'getCode');
                    } else {
                        throw $e;
                    }
                }
            }
        }
    }

    /**
    * @covers WindowsAzure\Table\TableRestProxy::insertEntity
    * @covers WindowsAzure\Table\TableRestProxy::insertOrMergeEntity
    * @covers WindowsAzure\Table\TableRestProxy::queryEntities
    */
    private function insertOrMergeEntityWorker($initialEnt, $ent, $options)
    {
        $table = $this->getCleanTable();

        // Upload the entity.
        $this->restProxy->insertEntity($table, $initialEnt);

        if (is_null($options)) {
            $this->restProxy->insertOrMergeEntity($table, $ent);
        } else {
            $this->restProxy->insertOrMergeEntity($table, $ent, $options);
        }

        if (is_null($options)) {
            $options = new TableServiceOptions();
        }

        // Check that the message matches
        $qer = $this->restProxy->queryEntities($table);
        $this->assertNotNull($qer->getEntities(), 'getEntities()');
        $this->assertEquals(1, count($qer->getEntities()), 'getEntities() count');
        $entReturned = $qer->getEntities();
        $entReturned = $entReturned[0];
        $this->assertNotNull($entReturned, 'getEntities()[0]');

        $this->verifymergeEntityWorker($initialEnt, $ent, $entReturned);
        $this->clearTable($table);
    }

    /**
    * @covers WindowsAzure\Table\TableRestProxy::deleteEntity
    * @covers WindowsAzure\Table\TableRestProxy::insertEntity
    * @covers WindowsAzure\Table\TableRestProxy::insertOrMergeEntity
    * @covers WindowsAzure\Table\TableRestProxy::insertOrReplaceEntity
    * @covers WindowsAzure\Table\TableRestProxy::mergeEntity
    * @covers WindowsAzure\Table\TableRestProxy::updateEntity
    */
    public function testCRUDdeleteEntity()
    {
        foreach(ConcurType::values() as $concurType)  {
            foreach(MutatePivot::values() as $mutatePivot) {
                for ($i = 0; $i <= 1; $i++) {
                    foreach(TableServiceFunctionalTestData::getSimpleEntities(2) as $ent)  {
                        $options = ($i == 0 ? null : new TableServiceOptions());
                        $this->crudWorker(OpType::DELETE_ENTITY, $concurType, $mutatePivot, $ent, $options);
                    }
                }
            }
        }
    }
/*
    /**
    * @covers WindowsAzure\Table\TableRestProxy::deleteEntity
    * @covers WindowsAzure\Table\TableRestProxy::insertEntity
    * @covers WindowsAzure\Table\TableRestProxy::insertOrMergeEntity
    * @covers WindowsAzure\Table\TableRestProxy::insertOrReplaceEntity
    * @covers WindowsAzure\Table\TableRestProxy::mergeEntity
    * @covers WindowsAzure\Table\TableRestProxy::updateEntity
    */
    public function testCRUDinsertEntity()
    {
        foreach(ConcurType::values() as $concurType)  {
            foreach(MutatePivot::values() as $mutatePivot) {
                for ($i = 0; $i <= 1; $i++) {
                    foreach(TableServiceFunctionalTestData::getSimpleEntities(2) as $ent)  {
                        $options = ($i == 0 ? null : new TableServiceOptions());
                        $this->crudWorker(OpType::INSERT_ENTITY, $concurType, $mutatePivot, $ent, $options);
                    }
                }
            }
        }
    }

    /**
    * @covers WindowsAzure\Table\TableRestProxy::deleteEntity
    * @covers WindowsAzure\Table\TableRestProxy::insertEntity
    * @covers WindowsAzure\Table\TableRestProxy::insertOrMergeEntity
    * @covers WindowsAzure\Table\TableRestProxy::insertOrReplaceEntity
    * @covers WindowsAzure\Table\TableRestProxy::mergeEntity
    * @covers WindowsAzure\Table\TableRestProxy::updateEntity
    */
    public function testCRUDinsertOrMergeEntity()
    {
        $this->skipIfEmulated();

        foreach(ConcurType::values() as $concurType)  {
            foreach(MutatePivot::values() as $mutatePivot) {
                for ($i = 0; $i <= 1; $i++) {
                    foreach(TableServiceFunctionalTestData::getSimpleEntities(2) as $ent)  {
                        $options = ($i == 0 ? null : new TableServiceOptions());
                        $this->crudWorker(OpType::INSERT_OR_MERGE_ENTITY, $concurType, $mutatePivot, $ent, $options);
                    }
                }
            }
        }
    }
/*
    /**
    * @covers WindowsAzure\Table\TableRestProxy::deleteEntity
    * @covers WindowsAzure\Table\TableRestProxy::insertEntity
    * @covers WindowsAzure\Table\TableRestProxy::insertOrMergeEntity
    * @covers WindowsAzure\Table\TableRestProxy::insertOrReplaceEntity
    * @covers WindowsAzure\Table\TableRestProxy::mergeEntity
    * @covers WindowsAzure\Table\TableRestProxy::updateEntity
    */
    public function testCRUDinsertOrReplaceEntity()
    {
        $this->skipIfEmulated();

        foreach(ConcurType::values() as $concurType)  {
            foreach(MutatePivot::values() as $mutatePivot) {
                for ($i = 0; $i <= 1; $i++) {
                    foreach(TableServiceFunctionalTestData::getSimpleEntities(2) as $ent)  {
                        $options = ($i == 0 ? null : new TableServiceOptions());
                        $this->crudWorker(OpType::INSERT_OR_REPLACE_ENTITY, $concurType, $mutatePivot, $ent, $options);
                    }
                }
            }
        }
    }

    /**
    * @covers WindowsAzure\Table\TableRestProxy::deleteEntity
    * @covers WindowsAzure\Table\TableRestProxy::insertEntity
    * @covers WindowsAzure\Table\TableRestProxy::insertOrMergeEntity
    * @covers WindowsAzure\Table\TableRestProxy::insertOrReplaceEntity
    * @covers WindowsAzure\Table\TableRestProxy::mergeEntity
    * @covers WindowsAzure\Table\TableRestProxy::updateEntity
    */
    public function testCRUDmergeEntity()
    {
        foreach(ConcurType::values() as $concurType)  {
            foreach(MutatePivot::values() as $mutatePivot) {
                for ($i = 0; $i <= 1; $i++) {
                    foreach(TableServiceFunctionalTestData::getSimpleEntities(2) as $ent)  {
                        $options = ($i == 0 ? null : new TableServiceOptions());
                        $this->crudWorker(OpType::MERGE_ENTITY, $concurType, $mutatePivot, $ent, $options);
                    }
                }
            }
        }
    }

    /**
    * @covers WindowsAzure\Table\TableRestProxy::deleteEntity
    * @covers WindowsAzure\Table\TableRestProxy::insertEntity
    * @covers WindowsAzure\Table\TableRestProxy::insertOrMergeEntity
    * @covers WindowsAzure\Table\TableRestProxy::insertOrReplaceEntity
    * @covers WindowsAzure\Table\TableRestProxy::mergeEntity
    * @covers WindowsAzure\Table\TableRestProxy::updateEntity
    */
    public function testCRUDupdateEntity()
    {
        foreach(ConcurType::values() as $concurType)  {
            foreach(MutatePivot::values() as $mutatePivot) {
                for ($i = 0; $i <= 1; $i++) {
                    foreach(TableServiceFunctionalTestData::getSimpleEntities(2) as $ent)  {
                        $options = ($i == 0 ? null : new TableServiceOptions());
                        $this->crudWorker(OpType::UPDATE_ENTITY, $concurType, $mutatePivot, $ent, $options);
                    }
                }
            }
        }
    }

    /**
    * @covers WindowsAzure\Table\TableRestProxy::deleteEntity
    * @covers WindowsAzure\Table\TableRestProxy::insertEntity
    * @covers WindowsAzure\Table\TableRestProxy::insertOrMergeEntity
    * @covers WindowsAzure\Table\TableRestProxy::insertOrReplaceEntity
    * @covers WindowsAzure\Table\TableRestProxy::mergeEntity
    * @covers WindowsAzure\Table\TableRestProxy::updateEntity
    */
    private function crudWorker($opType, $concurType, $mutatePivot, $ent, $options)
    {
        $exptErr = $this->expectConcurrencyFailure($opType, $concurType);
        $table = $this->getCleanTable();

        try {
            // Upload the entity.
            $initial = $this->restProxy->insertEntity($table, $ent);
            $targetEnt = $this->createTargetEntity($table, $initial->getEntity(), $concurType, $mutatePivot);

            $this->executeCrudMethod($table, $targetEnt, $opType, $concurType, $options);

            if (!is_null($exptErr)) {
                $this->fail('Expected a failure when opType=' . $opType . ' and concurType=' . $concurType . ' :' . $this->expectConcurrencyFailure($opType, $concurType));
            }

            $this->verifyCrudWorker($opType, $table, $ent, $targetEnt, true);
        } catch (ServiceException $e) {
            if (!is_null($exptErr)) {
                $this->assertEquals($exptErr, $e->getCode(), 'getCode');
            } else {
                throw $e;
            }
        }
        $this->clearTable($table);
    }

    /**
    * @covers WindowsAzure\Table\TableRestProxy::batch
    * @covers WindowsAzure\Table\TableRestProxy::insertEntity
    */
    public function testBatchPositiveFirstNoKeyMatch()
    {
        $this->batchPositiveOuter(ConcurType::NO_KEY_MATCH, 123);
    }

    /**
    * @covers WindowsAzure\Table\TableRestProxy::batch
    * @covers WindowsAzure\Table\TableRestProxy::insertEntity
    */
    public function testBatchPositiveFirstKeyMatchNoETag()
    {
        $this->batchPositiveOuter(ConcurType::KEY_MATCH_NO_ETAG, 234);
    }

    /**
    * @covers WindowsAzure\Table\TableRestProxy::batch
    * @covers WindowsAzure\Table\TableRestProxy::insertEntity
    */
    public function testBatchPositiveFirstKeyMatchETagMismatch()
    {
        $this->skipIfEmulated();
        $this->batchPositiveOuter(ConcurType::KEY_MATCH_ETAG_MISMATCH, 345);
    }

    /**
    * @covers WindowsAzure\Table\TableRestProxy::batch
    * @covers WindowsAzure\Table\TableRestProxy::insertEntity
    */
    public function testBatchPositiveFirstKeyMatchETagMatch()
    {
        $this->batchPositiveOuter(ConcurType::KEY_MATCH_ETAG_MATCH, 456);
    }

    /**
    * @covers WindowsAzure\Table\TableRestProxy::batch
    * @covers WindowsAzure\Table\TableRestProxy::insertEntity
    */
    public function testBatchNegative()
    {
        $this->skipIfEmulated();

        // The random here is not to generate random values, but to
        // get a good mix of values in the table entities.

        mt_srand(456);
        $concurTypes = ConcurType::values();
        $mutatePivots = MutatePivot::values();
        $opTypes = OpType::values();

        for ($j = 0; $j < 10; $j++) {
            $configs = array();
            foreach(TableServiceFunctionalTestData::getSimpleEntities(6) as $ent)  {
                $config = new BatchWorkerConfig();
                $config->concurType = $concurTypes[mt_rand(0, count($concurTypes))];
                $config->opType = $opTypes[mt_rand(0, count($opTypes))];
                $config->mutatePivot = $mutatePivots[mt_rand(0, count($mutatePivots))];
                $config->ent = $ent;
                array_push($configs, $config);
            }

            for ($i = 0; $i <= 1; $i++) {
                $options = ($i == 0 ? null : new TableServiceOptions());
                $this->batchWorker($configs, $options);
            }
        }
    }

    private function verifyinsertEntityWorker($ent, $entReturned)
    {
        $this->verifyinsertOrMergeEntityWorker(null, $ent, $entReturned);
    }

    private function verifymergeEntityWorker($intitalEnt, $ent, $entReturned)
    {
        $this->verifyinsertOrMergeEntityWorker($intitalEnt, $ent, $entReturned);
    }

    private function verifyinsertOrMergeEntityWorker($initialEnt, $ent, $entReturned)
    {
        $expectedProps = array();
        if (!is_null($initialEnt) && $initialEnt->getPartitionKey() == $ent->getPartitionKey() && $initialEnt->getRowKey() == $ent->getRowKey()) {
            foreach($initialEnt->getProperties() as $pname => $actualProp)  {
                if (!is_null($actualProp) && !is_null($actualProp->getValue())) {
                    $cloneProp = null;
                    if (!is_null($actualProp)) {
                        $cloneProp = new Property();
                        $cloneProp->setEdmType($actualProp->getEdmType());
                        $cloneProp->setValue($actualProp->getValue());
                    }
                    $expectedProps[$pname] = $cloneProp;
                }
            }
        }
        foreach($ent->getProperties() as $pname => $actualProp)  {
            // Any properties with null values are ignored by the Merge Entity operation.
            // All other properties will be updated.
            if (!is_null($actualProp) && !is_null($actualProp->getValue())) {
                $cloneProp = new Property();
                $cloneProp->setEdmType($actualProp->getEdmType());
                $cloneProp->setValue($actualProp->getValue());
                $expectedProps[$pname] = $cloneProp;
            }
        }

        $effectiveProps = array();
        foreach($entReturned->getProperties() as $pname => $actualProp)  {
            // This is to work with Dev Storage, which returns items for all
            // columns, null valued or not.
            if (!is_null($actualProp) && !is_null($actualProp->getValue())) {
                $cloneProp = new Property();
                $cloneProp->setEdmType($actualProp->getEdmType());
                $cloneProp->setValue($actualProp->getValue());
                $effectiveProps[$pname] = $cloneProp;
            }
        }

        // Compare the entities to make sure they match.
        $this->assertEquals($ent->getPartitionKey(), $entReturned->getPartitionKey(), 'getPartitionKey');
        $this->assertEquals($ent->getRowKey(), $entReturned->getRowKey(), 'getRowKey');
        $this->assertNotNull($entReturned->getETag(), 'getETag');
        if (!is_null($ent->getETag())) {
            $this->assertTrue($ent->getETag() != $entReturned->getETag(), 'getETag should change after submit: initial \'' . $ent->getETag() . '\', returned \'' . $entReturned->getETag() . '\'');
        }
        $this->assertNotNull($entReturned->getTimestamp(), 'getTimestamp');
        if (is_null($ent->getTimestamp())) {
            // This property will come back, so need to account for it.
            $expectedProps['Timestamp'] = null;
        } else {
            $this->assertEquals($ent->getTimestamp(), $entReturned->getTimestamp(), 'getTimestamp');
        }
        $this->assertNotNull($ent->getProperties(), 'getProperties');

        // Need to skip null values from the count.
        $this->assertEquals(count($expectedProps), count($effectiveProps), 'getProperties()');

        foreach($expectedProps as $pname => $expectedProp)  {
            $actualProp = $effectiveProps;
            $actualProp = $actualProp[$pname];

            $this->assertNotNull($actualProp, 'getProperties()[\'' . $pname . '\')');
            if (!is_null($expectedProp) ) {
                $this->compareProperties($pname, $actualProp, $expectedProp);
            }

            $this->assertEquals($entReturned->getProperty($pname), $actualProp, 'getProperty(\'' . $pname . '\')');
            $this->assertEquals($entReturned->getPropertyValue($pname), $actualProp->getValue(), 'getPropertyValue(\'' . $pname . '\')');
        }
    }

    /**
    * @covers WindowsAzure\Table\TableRestProxy::batch
    * @covers WindowsAzure\Table\TableRestProxy::insertEntity
    */
    private function batchPositiveOuter($firstConcurType, $seed)
    {
        // The random here is not to generate random values, but to
        // get a good mix of values in the table entities.
        mt_srand($seed);
        $concurTypes = ConcurType::values();
        $mutatePivots = MutatePivot::values();
        $opTypes = OpType::values();

        // Main loop.
        foreach($opTypes as $firstOpType)  {
            if (!is_null($this->expectConcurrencyFailure($firstOpType, $firstConcurType))) {
                // Want to know there is at least one part that does not fail.
                continue;
            }
            if ($this->isEmulated() && (
                    ($firstOpType == OpType::INSERT_OR_MERGE_ENTITY) ||
                    ($firstOpType == OpType::INSERT_OR_REPLACE_ENTITY))) {
                // Emulator does not support these operations.
                continue;
            }

            $simpleEntities = TableServiceFunctionalTestData::getSimpleEntities(6);
            $configs = array();
            $firstConfig = new BatchWorkerConfig();
            $firstConfig->concurType = $firstConcurType;
            $firstConfig->opType = $firstOpType;
            $firstConfig->ent = $simpleEntities[0];
            $firstConfig->mutatePivot = $mutatePivots[mt_rand(0, count($mutatePivots))];
            array_push($configs, $firstConfig);

            for ($i = 1; $i < count($simpleEntities); $i++) {
                $config = new BatchWorkerConfig();
                while (!is_null($this->expectConcurrencyFailure($config->opType, $config->concurType))) {
                    $config->concurType = $concurTypes[mt_rand(0, count($concurTypes))];
                    $config->opType = $opTypes[mt_rand(0, count($opTypes))];
                    if ($this->isEmulated()) {
                        if ($config->opType == OpType::INSERT_OR_MERGE_ENTITY) {
                            $config->opType = OpType::MERGE_ENTITY;
                        }
                        if ($config->opType == OpType::INSERT_OR_REPLACE_ENTITY) {
                            $config->opType = OpType::UPDATE_ENTITY;
                        }
                    }
                }
                $config->mutatePivot = $mutatePivots[mt_rand(0, count($mutatePivots) -1)];
                $config->ent = $simpleEntities[$i];
                array_push($configs, $config);
            }

            for ($i = 0; $i <= 1; $i++) {
                $options = ($i == 0 ? null : new TableServiceOptions());
                if ($this->isEmulated()) {
                    // The emulator has trouble with some batches.
                    for ($j = 0; $j < count($configs); $j++) {
                        $tmpconfigs = array();
                        $tmpconfigs[] = $configs[$j];
                        $this->batchWorker($tmpconfigs, $options);
                    }
                } else {
                    $this->batchWorker($configs, $options);
                }
            }
        }
    }

    /**
    * @covers WindowsAzure\Table\TableRestProxy::batch
    * @covers WindowsAzure\Table\TableRestProxy::insertEntity
    */
    private function batchWorker($configs, $options)
    {
        $exptErrs = array();
        $expectedReturned = count($configs);
        $expectedError = false;
        $expectedErrorCount = 0;
        for ($i = 0; $i < count($configs); $i++) {
            $err = $this->expectConcurrencyFailure($configs[$i]->opType, $configs[$i]->concurType);
            if (!is_null($err)) {
                $expectedErrorCount++;
                $expectedError = true;
            }
            array_push($exptErrs, $err);
        }

        $table = $this->getCleanTable();

        try {
            // Upload the initial entities and get the target entities.
            $targetEnts = array();
            for ($i = 0; $i < count($configs); $i++) {
                $initial = $this->restProxy->insertEntity($table, $configs[$i]->ent);
                array_push($targetEnts, $this->createTargetEntity($table, $initial->getEntity(),
                        $configs[$i]->concurType,
                        $configs[$i]->mutatePivot));
            }

            // Build up the batch.
            $operations = new BatchOperations();
            for ($i = 0; $i < count($configs); $i++) {
                $this->buildBatchOperations($table, $operations, $targetEnts[$i],
                        $configs[$i]->opType,
                        $configs[$i]->concurType,
                        $configs[$i]->options);
            }

            // Execute the batch.
            $ret = (is_null($options) ? $this->restProxy->batch($operations) : $this->restProxy->batch($operations, $options));

            if (is_null($options)) {
                $options = new QueryEntitiesOptions();
            }

            // Verify results.
            if ($expectedError) {
                $this->assertEquals($expectedErrorCount, count($ret->getEntries()), 'count $ret->getEntries()');

                // No changes should have gone through.
                for ($i = 0; $i < count($configs); $i++) {
                    $this->verifyCrudWorker($configs[$i]->opType, $table, $configs[$i]->ent, $configs[$i]->ent, false);
                }
            } else {
                $this->assertEquals($expectedReturned, count($ret->getEntries()), 'count $ret->getEntries()');
                for ($i = 0; $i < count($ret->getEntries()); $i++) {
                    $opResult = $ret->getEntries();
                    $opResult = $opResult[$i];
                    $this->verifyBatchEntryType($configs[$i]->opType, $exptErrs[$i], $opResult);
                    $this->verifyEntryData($table, $exptErrs[$i], $targetEnts[$i], $opResult);
                    // Check out the entities.
                    $this->verifyCrudWorker($configs[$i]->opType, $table, $configs[$i]->ent, $targetEnts[$i], true);
                }
            }
        } catch (ServiceException $e) {
            if ($expectedError) {
                $this->assertEquals(TestResources::STATUS_BAD_REQUEST, $e->getCode(), 'getCode');
            } else {
                throw $e;
            }
        }

        $this->clearTable($table);
    }

    /**
    * @covers WindowsAzure\Table\TableRestProxy::getEntity
    */
    private function verifyEntryData($table, $exptErr, $targetEnt, $opResult)
    {
        if ($opResult instanceof InsertEntityResult) {
            $this->verifyinsertEntityWorker($targetEnt, $opResult->getEntity());
        } else if ($opResult instanceof UpdateEntityResult) {
            $ger = $this->restProxy->getEntity($table, $targetEnt->getPartitionKey(), $targetEnt->getRowKey());
            $this->assertEquals($opResult->getETag(), $ger->getEntity()->getETag(), 'op->getETag');
        } else if (is_string($opResult)) {
            // Nothing special to do.
        } else if ($opResult instanceof BatchError) {
            $this->assertEquals($exptErr, $opResult->getError()->getCode(), 'getError()->getCode');
        } else {
            $this->fail('opResult is of an unknown type');
        }
    }

    private function verifyBatchEntryType($opType, $exptErr, $opResult)
    {
        if (is_null($exptErr)) {
            switch ($opType) {
                case OpType::INSERT_ENTITY:
                    $this->assertTrue($opResult instanceof InsertEntityResult,
                            'When opType=' . $opType . ' expect opResult instanceof InsertEntityResult');
                    break;
                case OpType::DELETE_ENTITY:
                    $this->assertTrue(
                            is_string($opResult),
                            'When opType=' . $opType . ' expect opResult is a string');
                    break;
                case OpType::UPDATE_ENTITY:
                case OpType::INSERT_OR_REPLACE_ENTITY:
                case OpType::MERGE_ENTITY:
                case OpType::INSERT_OR_MERGE_ENTITY:
                    $this->assertTrue($opResult instanceof UpdateEntityResult,
                            'When opType=' . $opType . ' expect opResult instanceof UpdateEntityResult');
                    break;
            }
        } else {
            $this->assertTrue($opResult instanceof BatchError, 'When expect an error, expect opResult instanceof BatchError');
        }
    }

    private function buildBatchOperations($table, $operations, $targetEnt, $opType, $concurType, $options)
    {
        switch ($opType) {
            case OpType::DELETE_ENTITY:
                if (is_null($options) && $concurType != ConcurType::KEY_MATCH_ETAG_MISMATCH) {
                    $operations->addDeleteEntity($table, $targetEnt->getPartitionKey(), $targetEnt->getRowKey(), null);
                } else {
                    $operations->addDeleteEntity($table, $targetEnt->getPartitionKey(), $targetEnt->getRowKey(), $targetEnt->getETag());
                }
                break;
            case OpType::INSERT_ENTITY:
                $operations->addInsertEntity($table, $targetEnt);
                break;
            case OpType::INSERT_OR_MERGE_ENTITY:
                $operations->addInsertOrMergeEntity($table, $targetEnt);
                break;
            case OpType::INSERT_OR_REPLACE_ENTITY:
                $operations->addInsertOrReplaceEntity($table, $targetEnt);
                break;
            case OpType::MERGE_ENTITY:
                $operations->addMergeEntity($table, $targetEnt);
                break;
            case OpType::UPDATE_ENTITY:
                $operations->addUpdateEntity($table, $targetEnt);
                break;
        }
    }

    /**
    * @covers WindowsAzure\Table\TableRestProxy::deleteEntity
    * @covers WindowsAzure\Table\TableRestProxy::insertEntity
    * @covers WindowsAzure\Table\TableRestProxy::insertOrMergeEntity
    * @covers WindowsAzure\Table\TableRestProxy::insertOrReplaceEntity
    * @covers WindowsAzure\Table\TableRestProxy::mergeEntity
    * @covers WindowsAzure\Table\TableRestProxy::updateEntity
    */
    private function executeCrudMethod($table, $targetEnt, $opType, $concurType, $options)
    {
        switch ($opType) {
            case OpType::DELETE_ENTITY:
                if (is_null($options) && $concurType != ConcurType::KEY_MATCH_ETAG_MISMATCH) {
                    $this->restProxy->deleteEntity($table, $targetEnt->getPartitionKey(), $targetEnt->getRowKey());
                } else {
                    $delOptions = new DeleteEntityOptions();
                    $delOptions->setETag($targetEnt->getETag());
                    $this->restProxy->deleteEntity($table, $targetEnt->getPartitionKey(), $targetEnt->getRowKey(), $delOptions);
                }
                break;
            case OpType::INSERT_ENTITY:
                if (is_null($options)) {
                    $this->restProxy->insertEntity($table, $targetEnt);
                } else {
                    $this->restProxy->insertEntity($table, $targetEnt, $options);
                }
                break;
            case OpType::INSERT_OR_MERGE_ENTITY:
                if (is_null($options)) {
                    $this->restProxy->insertOrMergeEntity($table, $targetEnt);
                } else {
                    $this->restProxy->insertOrMergeEntity($table, $targetEnt, $options);
                }
                break;
            case OpType::INSERT_OR_REPLACE_ENTITY:
                if (is_null($options)) {
                    $this->restProxy->insertOrReplaceEntity($table, $targetEnt);
                } else {
                    $this->restProxy->insertOrReplaceEntity($table, $targetEnt, $options);
                }
                break;
            case OpType::MERGE_ENTITY:
                if (is_null($options)) {
                    $this->restProxy->mergeEntity($table, $targetEnt);
                } else {
                    $this->restProxy->mergeEntity($table, $targetEnt, $options);
                }
                break;
            case OpType::UPDATE_ENTITY:
                if (is_null($options)) {
                    $this->restProxy->updateEntity($table, $targetEnt);
                } else {
                    $this->restProxy->updateEntity($table, $targetEnt, $options);
                }
                break;
        }
    }

    /**
    * @covers WindowsAzure\Table\TableRestProxy::getEntity
    */
    private function verifyCrudWorker($opType, $table, $initialEnt, $targetEnt, $expectedSuccess)
    {
        $entInTable = null;
        try {
            $ger = $this->restProxy->getEntity($table, $targetEnt->getPartitionKey(), $targetEnt->getRowKey());
            $entInTable = $ger->getEntity();
        } catch (ServiceException $e) {
            $this->assertTrue(($opType == OpType::DELETE_ENTITY) && (TestResources::STATUS_NOT_FOUND == $e->getCode()), '404:NotFound is expected for deletes');
        }

        switch ($opType) {
            case OpType::DELETE_ENTITY:
                // Check that the entity really is gone
                if ($expectedSuccess) {
                    $this->assertNull($entInTable, 'Entity from table');
                } else {
                    // Check that the message matches
                    $this->assertNotNull($entInTable, 'Entity from table');
                    $this->verifyinsertEntityWorker($targetEnt, $entInTable);
                }
                break;
            case OpType::INSERT_ENTITY:
                // Check that the message matches
                $this->assertNotNull($entInTable, 'Entity from table');
                $this->verifyinsertEntityWorker($targetEnt, $entInTable);
                break;
            case OpType::INSERT_OR_MERGE_ENTITY:
                $this->assertNotNull($entInTable, 'Entity from table');
                $this->verifymergeEntityWorker($initialEnt, $targetEnt, $entInTable);
                break;
            case OpType::INSERT_OR_REPLACE_ENTITY:
                // Check that the message matches
                $this->assertNotNull($entInTable, 'Entity from table');
                $this->verifyinsertEntityWorker($targetEnt, $entInTable);
                break;
            case OpType::MERGE_ENTITY:
                $this->assertNotNull($entInTable, 'Entity from table');
                $this->verifymergeEntityWorker($initialEnt, $targetEnt, $entInTable);
                break;
            case OpType::UPDATE_ENTITY:
                // Check that the message matches
                $this->assertNotNull($entInTable, 'Entity from table');
                $this->verifyinsertEntityWorker($targetEnt, $entInTable);
                break;
        }
    }

    /**
    * @covers WindowsAzure\Table\TableRestProxy::updateEntity
    */
    private function createTargetEntity($table, $initialEnt, $concurType, $mutatePivot)
    {
        $targetEnt = TableServiceFunctionalTestUtils::cloneEntity($initialEnt);

        // Update the entity/table state to get the requested concurrency type error.
        switch ($concurType) {
            case ConcurType::NO_KEY_MATCH:
                // Mutate the keys to not match.
                $targetEnt->setRowKey(TableServiceFunctionalTestData::getNewKey());
                break;
            case ConcurType::KEY_MATCH_NO_ETAG:
                $targetEnt->setETag(null);
                break;
            case ConcurType::KEY_MATCH_ETAG_MISMATCH:
                $newETag =  $this->restProxy->updateEntity($table, $initialEnt)->getETag();
                $initialEnt->setETag($newETag);
                // Now the $targetEnt ETag will not match.
                $this->assertTrue($targetEnt->getETag() != $initialEnt->getETag(), 'targetEnt->ETag(\'' . $targetEnt->getETag() . '\') !=  updated->ETag(\'' . $initialEnt->getETag() . '\')');

                break;
            case ConcurType::KEY_MATCH_ETAG_MATCH:
                // Don't worry here.
                break;
        }

        // Mutate the properties.
        TableServiceFunctionalTestUtils::mutateEntity($targetEnt, $mutatePivot);
        return $targetEnt;
    }

    private static function expectConcurrencyFailure($opType, $concurType)
    {
        if (is_null($concurType) || is_null($opType)) {
            return -1;
        }

        switch ($concurType) {
            case ConcurType::NO_KEY_MATCH:
                if (($opType == OpType::DELETE_ENTITY) || ($opType == OpType::MERGE_ENTITY) || ($opType == OpType::UPDATE_ENTITY)) {
                    return TestResources::STATUS_NOT_FOUND;
                }
                break;
            case ConcurType::KEY_MATCH_NO_ETAG:
                if ($opType == OpType::INSERT_ENTITY) {
                    return TestResources::STATUS_CONFLICT;
                }
                break;
            case ConcurType::KEY_MATCH_ETAG_MATCH:
                if ($opType == OpType::INSERT_ENTITY) {
                    return TestResources::STATUS_CONFLICT;
                }
                break;
            case ConcurType::KEY_MATCH_ETAG_MISMATCH:
                if ($opType == OpType::INSERT_ENTITY) {
                    return TestResources::STATUS_CONFLICT;
                } else if ($opType == OpType::INSERT_OR_REPLACE_ENTITY || $opType == OpType::INSERT_OR_MERGE_ENTITY) {
                    // If exists, just clobber.
                    return null;
                }
                return TestResources::STATUS_PRECONDITION_FAILED;
        }
        return null;
    }

    function compareProperties($pname, $actualProp, $expectedProp)
    {
        $effectiveExpectedProp = (is_null($expectedProp->getEdmType()) ? EdmType::STRING : $expectedProp->getEdmType());
        $effectiveActualProp = (is_null($expectedProp->getEdmType()) ? EdmType::STRING : $expectedProp->getEdmType());

        $this->assertEquals($effectiveExpectedProp, $effectiveActualProp,
                'getProperties()->get(\'' . $pname . '\')->getEdmType');

        $effExp = $expectedProp->getValue();
        $effAct = $actualProp->getValue();

        if ($effExp instanceof \DateTime) {
            $effExp = $effExp->setTimezone(new \DateTimeZone('UTC'));
        }
        if ($effAct instanceof \DateTime) {
            $effAct = $effAct->setTimezone(new \DateTimeZone('UTC'));
        }

        $this->assertEquals($expectedProp->getValue(), $actualProp->getValue(), 'getProperties()->get(\'' . $pname . '\')->getValue [' . $effectiveExpectedProp . ']');
    }

}

