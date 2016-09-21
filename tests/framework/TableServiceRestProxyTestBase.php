<?php

/**
 * LICENSE: Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 * http://www.apache.org/licenses/LICENSE-2.0.
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
 *
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 *
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */

namespace Tests\framework;

use Tests\Framework\ServiceRestProxyTestBase;

/**
 * TestBase class for each unit test class.
 *
 * @category  Microsoft
 *
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 *
 * @version   Release: 0.4.5_2016-09
 *
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
class TableServiceRestProxyTestBase extends ServiceRestProxyTestBase
{
    protected $_createdTables;

    public function setUp()
    {
        parent::setUp();
        $tableRestProxy = $this->builder->createTableService($this->connectionString);
        parent::setProxy($tableRestProxy);
        $this->_createdTables = array();
    }

    public function createTable($tableName, $options = null)
    {
        $this->restProxy->createTable($tableName, $options);
        $this->_createdTables[] = $tableName;
    }

    public function deleteTable($tableName)
    {
        $this->restProxy->deleteTable($tableName);
    }

    public function safeDeleteTable($tableName)
    {
        try {
            $this->deleteTable($tableName);
        } catch (\Exception $e) {
            // Ignore exception and continue, will assume that this table doesn't exist in the sotrage account
            error_log($e->getMessage());
        }
    }

    protected function tearDown()
    {
        parent::tearDown();

        foreach ($this->_createdTables as $value) {
            $this->safeDeleteTable($value);
        }
    }
}
