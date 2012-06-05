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

use Tests\Framework\FiddlerFilter;
use Tests\Framework\TableServiceRestProxyTestBase;
use Tests\Framework\TestResources;
use Tests\Functional\WindowsAzure\Table\TableServiceFunctionalTestData;
use WindowsAzure\Common\Internal\Resources;
use WindowsAzure\Common\Internal\Utilities;
use WindowsAzure\Common\ServiceException;
use WindowsAzure\Common\Configuration;
use WindowsAzure\Table\TableService;
use WindowsAzure\Table\TableSettings;
use WindowsAzure\Table\Models\Entity;
use WindowsAzure\Table\Models\Filters\Filter;

class FunctionalTestBase extends TableServiceRestProxyTestBase {
    public function __construct()
    {
        parent::__construct();
        $fiddlerFilter = new FiddlerFilter();
        $this->restProxy = $this->restProxy->withFilter($fiddlerFilter);
    }
    
    public static function setUpBeforeClass() {
        parent::setUpBeforeClass();
        $service = self::createService();
        TableServiceFunctionalTestData::setupData();

        foreach(TableServiceFunctionalTestData::$TEST_TABLE_NAMES as $name)  {            
            self::println('Creating Table: ' . $name);
            $service->createTable($name);
        }
    }

    public static function tearDownAfterClass()
    {
        parent::tearDownAfterClass();
        $service = self::createService();
        if (!Configuration::isEmulated()) {
            $serviceProperties = TableServiceFunctionalTestData::getDefaultServiceProperties();
            $service->setServiceProperties($serviceProperties);
        }

        foreach(TableServiceFunctionalTestData::$TEST_TABLE_NAMES as $name)  {
            try
            {
                $service->deleteTable($name);
            }
            catch (\Exception $e)
            {
                // Ignore exception and continue.
                error_log($e->getMessage());
            }
        }
    }

    private static function createService() {
        $tmp = new FunctionalTestBase();
        return $tmp->restProxy;
    }
    
    protected function clearTable($table) {
        $index = array_search($table, TableServiceFunctionalTestData::$TEST_TABLE_NAMES);
        if ($index !== false) {
            // This is a well-known table, so need to create a new one to replace it.
            TableServiceFunctionalTestData::$TEST_TABLE_NAMES[$index] = TableServiceFunctionalTestData::getInterestingTableName();
            $this->restProxy->createTable(TableServiceFunctionalTestData::$TEST_TABLE_NAMES[$index]);
        }
            
        $this->restProxy->deleteTable($table);
    }

    protected function getCleanTable() {
        $this->clearTable(TableServiceFunctionalTestData::$TEST_TABLE_NAMES[0]);
        return TableServiceFunctionalTestData::$TEST_TABLE_NAMES[0];
     }

    public static function println($msg) {
        error_log($msg);
    }
    
    public static function tmptostring($value) {
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
   
    public static function entityPropsToString($props) {
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

    public static function entityToString($ent) {        
        $ret = 'Etag=' . self::tmptostring($ent->getEtag()) . "\n";
        $ret .= 'Props=' . self::entityPropsToString($ent->getProperties());
        return $ret;
    }
}

?>
