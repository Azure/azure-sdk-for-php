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
 * @package   Tests\Unit\WindowsAzure\Table\Models\Filters
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */

namespace Tests\Unit\WindowsAzure\Table\Models\Filters;
use WindowsAzure\Table\Models\Filters\BinaryFilter;

/**
 * Unit tests for class BinaryFilter
 *
 * @category  Microsoft
 * @package   Tests\Unit\WindowsAzure\Table\Models\Filters
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: 0.4.0_2014-01
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
class BinaryFilterTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers WindowsAzure\Table\Models\Filters\BinaryFilter::__construct
     * @covers WindowsAzure\Table\Models\Filters\BinaryFilter::getOperator
     */
    public function testGetOperator()
    {
        // Setup
        $expected = 'x';
        $filter = new BinaryFilter(null, $expected, null);
        
        // Assert
        $this->assertEquals($expected, $filter->getOperator());
    }
    
    /**
     * @covers WindowsAzure\Table\Models\Filters\BinaryFilter::__construct
     * @covers WindowsAzure\Table\Models\Filters\BinaryFilter::getLeft
     */
    public function testGetLeft()
    {
        // Setup
        $expected = null;
        $filter = new BinaryFilter($expected, null, null);
        
        // Assert
        $this->assertEquals($expected, $filter->getLeft());
    }
    
    /**
     * @covers WindowsAzure\Table\Models\Filters\BinaryFilter::__construct
     * @covers WindowsAzure\Table\Models\Filters\BinaryFilter::getRight
     */
    public function testGetRight()
    {
        // Setup
        $expected = null;
        $filter = new BinaryFilter(null, null, $expected);
        
        // Assert
        $this->assertEquals($expected, $filter->getRight());
    }
}


