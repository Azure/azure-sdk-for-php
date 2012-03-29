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
use PEAR2\Tests\Framework\TableRestProxyTestBase;
use PEAR2\WindowsAzure\Core\WindowsAzureUtilities;
use PEAR2\WindowsAzure\Core\ServiceException;
use PEAR2\Tests\Framework\TestResources;
use PEAR2\WindowsAzure\Resources;
use PEAR2\WindowsAzure\Services\Core\Models\ServiceProperties;
use PEAR2\WindowsAzure\Services\Table\Models\QueryTablesOptions;
use PEAR2\WindowsAzure\Services\Table\Models\Query;
use PEAR2\WindowsAzure\Services\Table\Models\Filters\Filter;

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
class TableRestProxyTest extends TableRestProxyTestBase
{
    /**
    * @covers PEAR2\WindowsAzure\Services\Table\TableRestProxy::getServiceProperties
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
     */
    public function testQueryTablesWithPrefix()
    {
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
}

?>
