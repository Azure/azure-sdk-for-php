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
use WindowsAzure\Table\Models\QueryEntitiesOptions;
use WindowsAzure\Table\Models\Query;
use WindowsAzure\Table\Models\Filters\Filter;
use WindowsAzure\Table\Models\EdmType;

/**
 * Unit tests for class QueryEntitiesOptions
 *
 * @category  Microsoft
 * @package   Tests\Unit\WindowsAzure\Table\Models
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: 0.4.0_2014-01
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
class QueryEntitiesOptionsTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers WindowsAzure\Table\Models\QueryEntitiesOptions::setQuery
     * @covers WindowsAzure\Table\Models\QueryEntitiesOptions::getQuery
     * @covers WindowsAzure\Table\Models\QueryEntitiesOptions::__construct
     */
    public function testSetQuery()
    {
        // Setup
        $options = new QueryEntitiesOptions();
        $expected = new Query();
        
        // Test
        $options->setQuery($expected);
        
        // Assert
        $this->assertEquals($expected, $options->getQuery());
    }
    
    /**
     * @covers WindowsAzure\Table\Models\QueryEntitiesOptions::setNextPartitionKey
     * @covers WindowsAzure\Table\Models\QueryEntitiesOptions::getNextPartitionKey
     */
    public function testSetNextPartitionKey()
    {
        // Setup
        $options = new QueryEntitiesOptions();
        $expected = 'parition';
        
        // Test
        $options->setNextPartitionKey($expected);
        
        // Assert
        $this->assertEquals($expected, $options->getNextPartitionKey());
    }
    
    /**
     * @covers WindowsAzure\Table\Models\QueryEntitiesOptions::setNextRowKey
     * @covers WindowsAzure\Table\Models\QueryEntitiesOptions::getNextRowKey
     */
    public function testSetNextRowKey()
    {
        // Setup
        $options = new QueryEntitiesOptions();
        $expected = 'edelo';
        
        // Test
        $options->setNextRowKey($expected);
        
        // Assert
        $this->assertEquals($expected, $options->getNextRowKey());
    }
    
    /**
     * @covers WindowsAzure\Table\Models\QueryEntitiesOptions::setSelectFields
     * @covers WindowsAzure\Table\Models\QueryEntitiesOptions::getSelectFields
     */
    public function testSetSelectFields()
    {
        // Setup
        $options = new QueryEntitiesOptions();
        $expected = array('customerId', 'customerName');
        
        // Test
        $options->setSelectFields($expected);
        
        // Assert
        $this->assertEquals($expected, $options->getSelectFields());
    }
    
    /**
     * @covers WindowsAzure\Table\Models\QueryEntitiesOptions::setTop
     * @covers WindowsAzure\Table\Models\QueryEntitiesOptions::getTop
     */
    public function testSetTop()
    {
        // Setup
        $options = new QueryEntitiesOptions();
        $expected = 123;
        
        // Test
        $options->setTop($expected);
        
        // Assert
        $this->assertEquals($expected, $options->getTop());
    }
    
    /**
     * @covers WindowsAzure\Table\Models\QueryEntitiesOptions::setFilter
     * @covers WindowsAzure\Table\Models\QueryEntitiesOptions::getFilter
     */
    public function testSetFilter()
    {
        // Setup
        $options = new QueryEntitiesOptions();
        $expected = Filter::applyConstant('constValue', EdmType::STRING);
        
        // Test
        $options->setFilter($expected);
        
        // Assert
        $this->assertEquals($expected, $options->getFilter());
    }
    
    /**
     * @covers WindowsAzure\Table\Models\QueryEntitiesOptions::addSelectField
     * @covers WindowsAzure\Table\Models\QueryEntitiesOptions::getSelectFields
     */
    public function testAddSelectField()
    {
        // Setup
        $options = new QueryEntitiesOptions();
        $field = 'customerId';
        $expected = array($field);
        
        // Test
        $options->addSelectField($field);
        
        // Assert
        $this->assertEquals($expected, $options->getSelectFields());
    }
}


