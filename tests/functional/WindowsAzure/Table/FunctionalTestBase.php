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

use Tests\Framework\FiddlerFilter;
use Tests\Framework\TableServiceRestProxyTestBase;
use Tests\Framework\TestResources;
use WindowsAzure\Common\Internal\Resources;
use WindowsAzure\Common\Internal\Utilities;
use WindowsAzure\Common\ServiceException;
use WindowsAzure\Common\Configuration;
use WindowsAzure\Table\TableService;
use WindowsAzure\Table\TableSettings;
use WindowsAzure\Table\Models\Entity;
use WindowsAzure\Table\Models\Filters\Filter;

class FunctionalTestBase extends IntegrationTestBase
{
    public static function setUpBeforeClass()
    {
        parent::setUpBeforeClass();
        $testBase = new FunctionalTestBase();
        TableServiceFunctionalTestData::setupData();

        foreach(TableServiceFunctionalTestData::$testTableNames as $name)  {
            self::println('Creating Table: ' . $name);
            $testBase->restProxy->createTable($name);
        }
    }

    public static function tearDownAfterClass()
    {
        $testBase = new FunctionalTestBase();
        foreach(TableServiceFunctionalTestData::$testTableNames as $name)  {
            $testBase->safeDeleteTable($name);
        }
        parent::tearDownAfterClass();
    }

    /**
     * @covers WindowsAzure\ServiceBus\ServiceBusRestProxy::createTable
     * @covers WindowsAzure\ServiceBus\ServiceBusRestProxy::deleteTable
     */
    protected function clearTable($table)
    {
        $index = array_search($table, TableServiceFunctionalTestData::$testTableNames);
        if ($index !== false) {
            // This is a well-known table, so need to create a new one to replace it.
            TableServiceFunctionalTestData::$testTableNames[$index] = TableServiceFunctionalTestData::getInterestingTableName();
            $this->restProxy->createTable(TableServiceFunctionalTestData::$testTableNames[$index]);
        }

        $this->restProxy->deleteTable($table);
    }

    protected function getCleanTable()
    {
        $this->clearTable(TableServiceFunctionalTestData::$testTableNames[0]);
        return TableServiceFunctionalTestData::$testTableNames[0];
     }

    public static function println($msg)
    {
        error_log($msg);
    }

    public static function tmptostring($value)
    {
        if (is_null($value)) {
            return 'null';
        } else if (is_bool($value)) {
            return ($value == true ? 'true' : 'false');
        } else if ($value instanceof \DateTime) {
            return Utilities::convertToEdmDateTime($value);
        } else if ($value instanceof Entity) {
            return self::entityToString($value);
        } else if (is_array($value)) {
            return self::entityPropsToString($value);
        } else if ($value instanceof Filter) {
            return TableServiceFunctionalTestUtils::filtertoString($value);
        } else {
            return $value;
        }
    }

    public static function entityPropsToString($props)
    {
        $ret = '';
        foreach($props as $k => $value) {
            $ret .= $k . ':';
            if (is_null($value)) {
                $ret .= 'NULL PROP!';
             } else {
                $ret .= $value->getEdmType() . ':' . self::tmptostring($value->getValue());
            }
            $ret .= "\n";
        }
        return $ret;
    }

    public static function entityToString($ent)
    {
        $ret = 'Etag=' . self::tmptostring($ent->getEtag()) . "\n";
        $ret .= 'Props=' . self::entityPropsToString($ent->getProperties());
        return $ret;
    }
}

?>
