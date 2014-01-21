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
 * @package   Tests\Unit\WindowsAzure\Table\Models
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */

namespace Tests\Unit\WindowsAzure\Table\Models;
use WindowsAzure\Table\Models\QueryTablesOptions;
use WindowsAzure\Table\Models\Query;
use WindowsAzure\Table\Models\Filters\Filter;
use WindowsAzure\Table\Models\EdmType;

/**
 * Unit tests for class QueryTablesOptions
 *
 * @category  Microsoft
 * @package   Tests\Unit\WindowsAzure\Table\Models
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: 0.4.0_2014-01
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
class QueryTablesOptionsTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers WindowsAzure\Table\Models\QueryTablesOptions::setNextTableName
     * @covers WindowsAzure\Table\Models\QueryTablesOptions::getNextTableName
     */
    public function testSetNextTableName()
    {
        // Setup
        $options = new QueryTablesOptions();
        $expected = 'table';
        
        // Test
        $options->setNextTableName($expected);
        
        // Assert
        $this->assertEquals($expected, $options->getNextTableName());
    }
    
    /**
     * @covers WindowsAzure\Table\Models\QueryTablesOptions::setPrefix
     * @covers WindowsAzure\Table\Models\QueryTablesOptions::getPrefix
     */
    public function testSetPrefix()
    {
        // Setup
        $options = new QueryTablesOptions();
        $expected = 'prefix';
        
        // Test
        $options->setPrefix($expected);
        
        // Assert
        $this->assertEquals($expected, $options->getPrefix());
    }
    
    /**
     * @covers WindowsAzure\Table\Models\QueryTablesOptions::setTop
     * @covers WindowsAzure\Table\Models\QueryTablesOptions::getTop
     * @covers WindowsAzure\Table\Models\QueryTablesOptions::__construct
     */
    public function testSetTop()
    {
        // Setup
        $options = new QueryTablesOptions();
        $expected = 123;
        
        // Test
        $options->setTop($expected);
        
        // Assert
        $this->assertEquals($expected, $options->getTop());
    }
    
    /**
     * @covers WindowsAzure\Table\Models\QueryTablesOptions::getQuery
     */
    public function testGetQuery()
    {
        // Setup
        $options = new QueryTablesOptions();
        $expected = new Query();
        
        // Test
        $actual = $options->getQuery();
        
        // Assert
        $this->assertEquals($expected, $actual);
    }
    
    /**
     * @covers WindowsAzure\Table\Models\QueryTablesOptions::setFilter
     * @covers WindowsAzure\Table\Models\QueryTablesOptions::getFilter
     */
    public function testSetFilter()
    {
        // Setup
        $options = new QueryTablesOptions();
        $expected = Filter::applyConstant('constValue', EdmType::STRING);
        
        // Test
        $options->setFilter($expected);
        
        // Assert
        $this->assertEquals($expected, $options->getFilter());
    }
}


