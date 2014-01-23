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
use WindowsAzure\Table\Models\BatchOperations;
use WindowsAzure\Table\Models\EdmType;
use WindowsAzure\Table\Models\Entity;
use WindowsAzure\Table\Models\Query;
use WindowsAzure\Table\Models\QueryEntitiesOptions;
use WindowsAzure\Table\Models\Filters\Filter;

class TableServiceFunctionalQueryTest extends FunctionalTestBase
{
    private static $entitiesInTable;
    private static $Partitions = array('Alpha', 'Bravo', 'Charlie', 'Delta', 'Echo');
    private static $curPartition;
    private static $curRowKey;

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
        $table = TableServiceFunctionalTestData::$testTableNames[0];
        self::$entitiesInTable = self::getEntitiesToQueryOver();
        $parts = array();
        foreach(self::$entitiesInTable as $entity)  {
            if (array_key_exists($entity->getPartitionKey(), $parts) === false) {
                $parts[$entity->getPartitionKey()] = array();
            }
            array_push($parts[$entity->getPartitionKey()], $entity);
        }
        foreach($parts as $part) {
            $batch = new BatchOperations();
            foreach($part as $entity)  {
                $batch->addInsertEntity($table, $entity);
            }
            $this->restProxy->batch($batch);
        }
    }

    public static function tearDownAfterClass()
    {
        if (self::$isOneTimeSetup) {
            self::$isOneTimeSetup = false;
        }
        parent::tearDownAfterClass();
    }

    private static function getNewEntity()
    {
        if (is_null(self::$curPartition) || self::$curPartition == count(self::$Partitions) - 1) {
            self::$curPartition = 0;
            self::$curRowKey = TableServiceFunctionalTestData::getNewKey();
        } else {
            self::$curPartition++;
        }

        $entity = new Entity();
        $entity->setPartitionKey(self::$Partitions[self::$curPartition]);
        $entity->setRowKey(self::$curRowKey);
        return $entity;
    }

    private static function getEntitiesToQueryOver()
    {
        $ret = array();

        array_push($ret, self::getNewEntity());

        $entity = self::getNewEntity();
        $entity->addProperty('BOOLEAN', EdmType::BOOLEAN, true);
        array_push($ret, $entity);

        $entity = self::getNewEntity();
        $entity->addProperty('BOOLEAN', EdmType::BOOLEAN, false);
        array_push($ret, $entity);

        $entity = self::getNewEntity();
        $entity->addProperty('DATETIME', EdmType::DATETIME, new \DateTime());
        array_push($ret, $entity);

        $entity = self::getNewEntity();
        $entity->addProperty('DATETIME', EdmType::DATETIME, new \DateTime('2012-01-02'));
        array_push($ret, $entity);

        $entity = self::getNewEntity();
        $entity->addProperty('DOUBLE', EdmType::DOUBLE, 2.71828183);
        array_push($ret, $entity);

        $entity = self::getNewEntity();
        $entity->addProperty('DOUBLE', EdmType::DOUBLE, 3.14159265);
        array_push($ret, $entity);

        $entity = self::getNewEntity();
        $entity->addProperty('GUID', EdmType::GUID, '90ab64d6-d3f8-49ec-b837-b8b5b6367b74');
        array_push($ret, $entity);

        $entity = self::getNewEntity();
        $entity->addProperty('GUID', EdmType::GUID, '00000000-1111-2222-3333-444444444444');
        array_push($ret, $entity);

        $entity = self::getNewEntity();
        $entity->addProperty('INT32', EdmType::INT32, 23);
        array_push($ret, $entity);

        $entity = self::getNewEntity();
        $entity->addProperty('INT32', EdmType::INT32, 42);
        array_push($ret, $entity);

        $entity = self::getNewEntity();
        $entity->addProperty('INT64', EdmType::INT64, '-1');
        array_push($ret, $entity);

        $entity = self::getNewEntity();
        $entity->addProperty('INT64', EdmType::INT64, strval(TableServiceFunctionalTestData::LONG_BIG_VALUE));
        array_push($ret, $entity);

        $entity = self::getNewEntity();
        $entity->addProperty('STRING', EdmType::STRING, 'foo');
        array_push($ret, $entity);

        $entity = self::getNewEntity();
        $entity->addProperty('STRING', EdmType::STRING, 'o hai');
        array_push($ret, $entity);

        $entity = self::getNewEntity();

        $e = self::getNewEntity();
        $e->addProperty('test', EdmType::BOOLEAN, true);
        $e->addProperty('test2', EdmType::STRING, 'value');
        $e->addProperty('test3', EdmType::INT32, 3);
        $e->addProperty('test4', EdmType::INT64, '12345678901');
        $e->addProperty('test5', EdmType::DATETIME, new \DateTime());
        array_push($ret, $e);

        $booleans = TableServiceFunctionalTestData::getInterestingGoodBooleans();
        $dates = TableServiceFunctionalTestData::getInterestingGoodDates();
        $doubles = TableServiceFunctionalTestData::getInterestingGoodDoubles();
        $guids = TableServiceFunctionalTestData::getInterestingGoodGuids();
        $ints = TableServiceFunctionalTestData::getInterestingGoodInts();
        $longs = TableServiceFunctionalTestData::getInterestingGoodLongs();
        $binaries = TableServiceFunctionalTestData::getInterestingGoodBinaries();
        $strings = TableServiceFunctionalTestData::getInterestingGoodStrings();

        // The random here is not to generate random values, but to
        // get a good mix of values in the table entities.
        mt_srand(123);

        for ($i = 0; $i < 20; $i++) {
            $e = self::getNewEntity();
            TableServiceFunctionalTestData::addProperty($e, 'BINARY', EdmType::BINARY, $binaries);
            TableServiceFunctionalTestData::addProperty($e, 'BOOLEAN', EdmType::BOOLEAN, $booleans);
            TableServiceFunctionalTestData::addProperty($e, 'DATETIME', EdmType::DATETIME, $dates);
            TableServiceFunctionalTestData::addProperty($e, 'DOUBLE', EdmType::DOUBLE, $doubles);
            TableServiceFunctionalTestData::addProperty($e, 'GUID', EdmType::GUID, $guids);
            TableServiceFunctionalTestData::addProperty($e, 'INT32', EdmType::INT32, $ints);
            TableServiceFunctionalTestData::addProperty($e, 'INT64', EdmType::INT64, $longs);
            TableServiceFunctionalTestData::addProperty($e, 'STRING', EdmType::STRING, $strings);
            array_push($ret, $e);
        }

        return $ret;
    }

    public static function getInterestingQueryEntitiesOptions()
    {
        $ret = array();
        $e = self::$entitiesInTable[count(self::$entitiesInTable) - 3];

        $options = new QueryEntitiesOptions();
        array_push($ret, $options);

        $options = new QueryEntitiesOptions();
        $query = new Query();
        $options->setQuery($query);
        array_push($ret, $options);

        $options = new QueryEntitiesOptions();
        $query = new Query();
        $query->setTop(2);
        $options->setQuery($query);
        array_push($ret, $options);

        $options = new QueryEntitiesOptions();
        $query = new Query();
        $query->setTop(-2);
        $options->setQuery($query);
        array_push($ret, $options);

        $options = new QueryEntitiesOptions();
        $query = new Query();
        $query->addSelectField('TableName');
        $options->setQuery($query);
        array_push($ret, $options);

        $options = new QueryEntitiesOptions();
        $query = new Query();
        $filter = Filter::applyPropertyName('BOOLEAN');
        $query->setFilter($filter);
        $options->setQuery($query);
        array_push($ret, $options);

        $options = new QueryEntitiesOptions();
        $query = new Query();
        $filter = Filter::applyConstant(false, EdmType::BOOLEAN);
        $query->setFilter($filter);
        $options->setQuery($query);
        array_push($ret, $options);

        $options = new QueryEntitiesOptions();
        $query = new Query();
        $filter = Filter::applyEq(Filter::applyConstant(23, EdmType::INT32), Filter::applyPropertyName('INT32'));
        $query->setFilter($filter);
        $options->setQuery($query);
        array_push($ret, $options);

        $options = new QueryEntitiesOptions();
        $query = new Query();
        $filter = Filter::applyNe(Filter::applyConstant(23, EdmType::INT32), Filter::applyPropertyName('INT32'));
        $query->setFilter($filter);
        $options->setQuery($query);
        array_push($ret, $options);

        $options = new QueryEntitiesOptions();
        $query = new Query();
        $filter = Filter::applyNot(Filter::applyEq(Filter::applyConstant(23, EdmType::INT32), Filter::applyPropertyName('INT32')));
        $query->setFilter($filter);
        $options->setQuery($query);
        array_push($ret, $options);

        $options = new QueryEntitiesOptions();
        $options->setNextPartitionKey($e->getPartitionKey());
        $options->setNextRowKey($e->getRowKey());
        array_push($ret, $options);

        // Ask for an entity that does not exist.
        $options = new QueryEntitiesOptions();
        $options->setNextPartitionKey(self::$Partitions[2] . 'X');
        $options->setNextRowKey($e->getRowKey() . 'X');
        array_push($ret, $options);

        return $ret;
    }

    public static function getInterestingQueryEntitiesOptionsOfDepth($depth)
    {
        $ret = array();

        // The random here is not to generate random values, but to
        // get a good mix of values in the table entities.
        mt_srand(456 + $depth);
        for ($i = 1; $i < 20; $i++) {
            $filter = self::generateFilterWithBooleanParameters($depth, 0);
            $options = new QueryEntitiesOptions();
            $query = new Query();
            $query->setFilter($filter);
            $options->setQuery($query);
            array_push($ret, $options);
        }

        return $ret;
    }

    private static function generateFilterWithBooleanParameters($targetDepth, $depth)
    {
        // Use the filter grammar to construct a tree.
        // The random here is not to generate random values, but to
        // get a good mix of values in the table entities.

        // TODO: Treat raw string special
        if ($depth == $targetDepth) {
            switch (mt_rand(0,2)) {
                case 0:
                    return self::generateBinaryFilterWithAnyParameters();
                case 1:
                    return Filter::applyConstant(mt_rand(0,1) == 1, EdmType::BOOLEAN);
                case 2:
                    $e = self::getEntityFromTable();
                    $boolPropNames = array();
                    foreach($e->getProperties() as $key => $p)  {
                        if ($p->getEdmType() == EdmType::BOOLEAN) {
                            array_push($boolPropNames, $key);
                        }
                    }
                    if (count($boolPropNames) == 0) {
                        return Filter::applyConstant(mt_rand(0,1) == 1, EdmType::BOOLEAN);
                    } else {
                        $key = $boolPropNames[mt_rand(0, count($boolPropNames) - 1)];
                        return Filter::applyPropertyName($key);
                    }
                default:
                    return null;
            }
        } else {
            switch (mt_rand(0,8)) {
                case 0:
                case 1:
                case 2:
                case 3:
                    return Filter::applyAnd(
                            self::generateFilterWithBooleanParameters($targetDepth, $depth + 1),
                            self::generateFilterWithBooleanParameters($targetDepth, $depth + 1));
                case 4:
                case 5:
                case 6:
                case 7:
                    return Filter::applyOr(
                            self::generateFilterWithBooleanParameters($targetDepth, $depth + 1),
                            self::generateFilterWithBooleanParameters($targetDepth, $depth + 1));
                case 8:
                    return Filter::applyNot(self::generateFilterWithBooleanParameters($targetDepth, $depth + 1));
                default:
                    return null;
            }
        }
    }

    private static function generateBinaryFilterWithAnyParameters()
    {
        // get a good mix of values in the table entities.

        // Pull out one of the constants.
        $e = self::getEntityFromTable();
        $keys = array_keys($e->getProperties());
        $propId = mt_rand(0, count($keys) - 1);
        $key = $keys[$propId];

        $prop = $e->getProperty($key);
        $f1 = Filter::applyConstant($prop->getValue(), $prop->getEdmType());
        $f2 = Filter::applyPropertyName($key);

        if (mt_rand(0,1) == 1) {
            // Try swapping.
            $t = $f1;
            $f1 = $f2;
            $f2 = $t;
        }

        return self::getBinaryFilterFromIndex(mt_rand(0, 5), $f1, $f2);
    }

    private static function getEntityFromTable()
    {
        $entId = mt_rand(0, count(self::$entitiesInTable) - 1);
        $e = self::$entitiesInTable[$entId];
        return $e;
    }

    private static function getBinaryFilterFromIndex($index, $f1, $f2)
    {
        switch ($index) {
            case 0: return Filter::applyEq($f1, $f2);
            case 1: return Filter::applyGe($f1, $f2);
            case 2: return Filter::applyGt($f1, $f2);
            case 3: return Filter::applyLe($f1, $f2);
            case 4: return Filter::applyLt($f1, $f2);
            case 5: return Filter::applyNe($f1, $f2);
            default: return null;
        }
    }

    /**
    * @covers WindowsAzure\Table\TableRestProxy::queryEntities
    */
    public function testQueryEntities()
    {
        // The emulator has problems with non-standard queries tested here.
        $this->skipIfEmulated();

        $interestingqueryEntitiesOptions = self::getInterestingQueryEntitiesOptions();
        foreach($interestingqueryEntitiesOptions as $options)  {
            $this->queryEntitiesWorker($options);
        }
    }

    /**
    * @covers WindowsAzure\Table\TableRestProxy::queryEntities
    */
    public function testQueryEntitiesBooleanLevel1()
    {
        // The emulator has problems with non-standard queries tested here.
        $this->skipIfEmulated();

        $interestingqueryEntitiesOptions = self::addBinaryFilter('BOOLEAN', EdmType::BOOLEAN, TableServiceFunctionalTestData::getInterestingGoodBooleans());
        foreach($interestingqueryEntitiesOptions as $options)  {
            $this->queryEntitiesWorker($options);
        }
    }

    /**
    * @covers WindowsAzure\Table\TableRestProxy::queryEntities
    */
    public function testQueryEntitiesDateTimeLevel1()
    {
        // The emulator has problems with non-standard queries tested here.
        $this->skipIfEmulated();

        $interestingqueryEntitiesOptions = self::addBinaryFilter('DATETIME', EdmType::DATETIME, TableServiceFunctionalTestData::getInterestingGoodDates());
        foreach($interestingqueryEntitiesOptions as $options)  {
            $this->queryEntitiesWorker($options);
        }
    }

    /**
    * @covers WindowsAzure\Table\TableRestProxy::queryEntities
    */
    public function testQueryEntitiesDoubleLevel1()
    {
        // The emulator has problems with non-standard queries tested here.
        $this->skipIfEmulated();

        $interestingqueryEntitiesOptions = self::addBinaryFilter('DOUBLE', EdmType::DOUBLE, TableServiceFunctionalTestData::getInterestingGoodDoubles());
        foreach($interestingqueryEntitiesOptions as $options)  {
            $this->queryEntitiesWorker($options);
        }
    }

    /**
    * @covers WindowsAzure\Table\TableRestProxy::queryEntities
    */
    public function testQueryEntitiesGuidLevel1()
    {
        // The emulator has problems with non-standard queries tested here.
        $this->skipIfEmulated();

        $interestingqueryEntitiesOptions = self::addBinaryFilter('GUID', EdmType::GUID, TableServiceFunctionalTestData::getInterestingGoodGuids());
        foreach($interestingqueryEntitiesOptions as $options)  {
            $this->queryEntitiesWorker($options);
        }
    }

    /**
    * @covers WindowsAzure\Table\TableRestProxy::queryEntities
    */
    public function testQueryEntitiesIntLevel1()
    {
        // The emulator has problems with non-standard queries tested here.
        $this->skipIfEmulated();

         $interestingqueryEntitiesOptions = self::addBinaryFilter('INT32', EdmType::INT32, TableServiceFunctionalTestData::getInterestingGoodInts());
        foreach($interestingqueryEntitiesOptions as $options)  {
            $this->queryEntitiesWorker($options);
        }
    }

    /**
    * @covers WindowsAzure\Table\TableRestProxy::queryEntities
    */
    public function testQueryEntitiesLongLevel1()
    {
        // The emulator has problems with non-standard queries tested here.
        $this->skipIfEmulated();

        $interestingqueryEntitiesOptions = self::addBinaryFilter('INT64', EdmType::INT64, TableServiceFunctionalTestData::getInterestingGoodLongs());
        foreach($interestingqueryEntitiesOptions as $options)  {
            $this->queryEntitiesWorker($options);
        }
    }

    /**
    * @covers WindowsAzure\Table\TableRestProxy::queryEntities
    */
    public function testQueryEntitiesStringLevel1()
    {
        // The emulator has problems with non-standard queries tested here.
        $this->skipIfEmulated();

        $interestingqueryEntitiesOptions = self::addBinaryFilter('STRING', EdmType::STRING, TableServiceFunctionalTestData::getInterestingGoodStrings());
        foreach($interestingqueryEntitiesOptions as $options)  {
            $this->queryEntitiesWorker($options);
        }
    }

    /**
    * @covers WindowsAzure\Table\TableRestProxy::queryEntities
    */
    public function testQueryEntitiesBinaryLevel1()
    {
        // The emulator has problems with non-standard queries tested here.
        $this->skipIfEmulated();

        $interestingqueryEntitiesOptions = self::addBinaryFilter('BINARY', EdmType::BINARY, TableServiceFunctionalTestData::getInterestingGoodBinaries());
        foreach($interestingqueryEntitiesOptions as $options)  {
            $this->queryEntitiesWorker($options);
        }
    }

    /**
    * @covers WindowsAzure\Table\TableRestProxy::queryEntities
    */
    public function testQueryEntitiesLevel2()
    {
        // The emulator has problems with non-standard queries tested here.
        $this->skipIfEmulated();

        $interestingqueryEntitiesOptions = self::getInterestingQueryEntitiesOptionsOfDepth(2);
        foreach($interestingqueryEntitiesOptions as $options)  {
            $this->queryEntitiesWorker($options);
        }
    }

    /**
    * @covers WindowsAzure\Table\TableRestProxy::queryEntities
    */
    public function testQueryEntitiesLevel3()
    {
        // The emulator has problems with non-standard queries tested here.
        $this->skipIfEmulated();

        $interestingqueryEntitiesOptions = self::getInterestingQueryEntitiesOptionsOfDepth(3);
        foreach($interestingqueryEntitiesOptions as $options)  {
            $this->queryEntitiesWorker($options);
        }
    }

    /**
    * @covers WindowsAzure\Table\TableRestProxy::queryEntities
    */
    private function queryEntitiesWorker($options)
    {
        $table = TableServiceFunctionalTestData::$testTableNames[0];

        try {
            $ret = (is_null($options) ? $this->restProxy->queryEntities($table) : $this->restProxy->queryEntities($table, $options));

            if (is_null($options)) {
                $options = new QueryEntitiesOptions();
            }

            if (!is_null($options->getQuery()) && !is_null($options->getQuery()->getTop()) && $options->getQuery()->getTop() <= 0) {
                $this->assertTrue(false, 'Expect non-positive Top in $options->query to throw');
            }

            $this->verifyqueryEntitiesWorker($ret, $options);

            // In principle, should check if there is a continuation, then use it.
            // However, the user cannot easily control when this happens, so I'm
            // not sure how useful it is.
            // To test that scenario, set NextTable in the $options.
        } catch (ServiceException $e) {
            if (!is_null($options->getQuery()) && !is_null($options->getQuery()->getTop()) && $options->getQuery()->getTop() <= 0) {
                $this->assertEquals(TestResources::STATUS_BAD_REQUEST, $e->getCode(), 'getCode');
            } else {
                $this->assertEquals(TestResources::STATUS_INTERNAL_SERVER_ERROR, $e->getCode(), 'getCode');
            }
        }
    }

    private function verifyqueryEntitiesWorker($ret, $options)
    {
        $this->assertNotNull($ret->getEntities(), 'getTables');

        $expectedData = array();
        foreach(self::$entitiesInTable as $e)  {
            array_push($expectedData, $e);
        }

        sort($expectedData);

        $projected = false;

        if (!is_null($options->getNextPartitionKey()) && !is_null($options->getNextRowKey())) {
            $expectedDataTmp = array();
            foreach($expectedData as $e)  {
                if ( ($e->getPartitionKey() >  $options->getNextPartitionKey()) ||
                    (($e->getPartitionKey() == $options->getNextPartitionKey()) &&
                     ($e->getRowKey()       >= $options->getNextRowKey()))) {
                    array_push($expectedDataTmp, $e);
                }
            }
            $expectedData = $expectedDataTmp;
        }

        $q = $options->getQuery();
        $expectedFilter = $q->getFilter();
        $projected = (count($q->getSelectFields()) != 0);

        $expectedData = TableServiceFunctionalTestUtils::filterEntityList($expectedFilter, $expectedData);

        if (!is_null($q->getTop()) && $q->getTop() < count($expectedData)) {
            $expectedDataTmp = array();
            for ($i = 0; $i < $q->getTop(); $i++) {
                array_push($expectedDataTmp, $expectedData[$i]);
            }
            $expectedData = $expectedDataTmp;
        }

        $this->compareEntityLists($ret->getEntities(), $expectedData, $projected);
    }

    private function compareEntityLists($actualData, $expectedData, $projected)
    {
        // Need to sort the lists.
        $actualData = self::sortEntitiesByCompositeKey($actualData);
        $expectedData = self::sortEntitiesByCompositeKey($expectedData);

        $this->assertEquals(count($expectedData), count($actualData), 'count(getEntities)');
        for ($i = 0; $i < count($expectedData); $i++) {
            $e1 = $expectedData[$i];
            $e2 = $actualData[$i];
            if (!$projected) {
                $this->assertTrue(
                    ($e1->getPartitionKey() == $e2->getPartitionKey()) && ($e1->getRowKey() == $e2->getRowKey()),
                    '(' . $e1->getPartitionKey() . ',' . $e1->getRowKey() . ') == (' . $e2->getPartitionKey() . ',' . $e2->getRowKey() . ')');
            }
            // Don't need to verify the whole entities, done elsewhere
        }
    }

    private static function addBinaryFilter($name, $edmType, $values)
    {
        $counter = 0;
        $ret = array();
        foreach($values as $o)  {
            $f = self::getBinaryFilterFromIndex($counter, Filter::applyPropertyName($name), Filter::applyConstant($o, $edmType));
            $q = new Query();
            $q->setFilter($f);
            $qeo = new QueryEntitiesOptions();
            $qeo->setQuery($q);
            array_push($ret, $qeo);
            $counter = ($counter + 1) % 6;
        }
        return $ret;
    }

    public static function sortEntitiesByCompositeKey($originalArray)
    {
        $tmpArray = array();
        $isordered = true;
        $prevIndex = '/';
        foreach($originalArray as $e) {
            $index = $e->getPartitionKey() . '/' . $e->getRowKey();
            $tmpArray[$index] = $e;
            if ($isordered) {
                $isordered = $prevIndex <= $index;
            }
            $prevIndex = $index;
        }

        if ($isordered) {
            return $originalArray;
        }

        ksort($tmpArray);
        $ret = array();
        foreach($tmpArray as $e) {
            array_push($ret, $e);
        }
        return $ret;
    }
}


