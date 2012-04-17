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
 * @package   Tests\Unit\WindowsAzure\Services\Table\Models
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */

namespace Tests\Unit\WindowsAzure\Services\Table\Models;
use WindowsAzure\Services\Table\Models\Query;
use WindowsAzure\Services\Table\Models\Filters\Filter;
use WindowsAzure\Services\Table\Models\EdmType;

/**
 * Unit tests for class Query
 *
 * @category  Microsoft
 * @package   Tests\Unit\WindowsAzure\Services\Table\Models
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
class QueryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers WindowsAzure\Services\Table\Models\Query::setSelectFields
     * @covers WindowsAzure\Services\Table\Models\Query::getSelectFields
     */
    public function testSetSelectFields()
    {
        // Setup
        $query = new Query();
        $expected = array('customerId', 'customerName');
        
        // Test
        $query->setSelectFields($expected);
        
        // Assert
        $this->assertEquals($expected, $query->getSelectFields());
    }
    
    /**
     * @covers WindowsAzure\Services\Table\Models\Query::setTop
     * @covers WindowsAzure\Services\Table\Models\Query::getTop
     */
    public function testSetTop()
    {
        // Setup
        $query = new Query();
        $expected = 123;
        
        // Test
        $query->setTop($expected);
        
        // Assert
        $this->assertEquals($expected, $query->getTop());
    }
    
    /**
     * @covers WindowsAzure\Services\Table\Models\Query::setFilter
     * @covers WindowsAzure\Services\Table\Models\Query::getFilter
     */
    public function testSetFilter()
    {
        // Setup
        $query = new Query();
        $expected = Filter::applyConstant('constValue', EdmType::STRING);
        
        // Test
        $query->setFilter($expected);
        
        // Assert
        $this->assertEquals($expected, $query->getFilter());
    }
    
    /**
     * @covers WindowsAzure\Services\Table\Models\Query::addSelectField
     * @covers WindowsAzure\Services\Table\Models\Query::getSelectFields
     */
    public function testAddSelectField()
    {
        // Setup
        $query = new Query();
        $field = 'customerId';
        $expected = array($field);
        
        // Test
        $query->addSelectField($field);
        
        // Assert
        $this->assertEquals($expected, $query->getSelectFields());
    }
}

?>
