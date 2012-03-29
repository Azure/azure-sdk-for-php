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
 * @package   PEAR2\Tests\Unit\WindowsAzure\Services\Table\Models\Filters
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */

namespace PEAR2\Tests\Unit\WindowsAzure\Services\Table\Models\Filters;
use PEAR2\WindowsAzure\Services\Table\Models\Filters\BinaryFilter;

/**
 * Unit tests for class BinaryFilter
 *
 * @category  Microsoft
 * @package   PEAR2\Tests\Unit\WindowsAzure\Services\Table\Models\Filters
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
class BinaryFilterTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers PEAR2\WindowsAzure\Services\Table\Models\Filters\BinaryFilter::setOperator
     * @covers PEAR2\WindowsAzure\Services\Table\Models\Filters\BinaryFilter::getOperator
     */
    public function testSetOperator()
    {
        // Setup
        $filter = new BinaryFilter();
        $expected = 'x';
        
        // Test
        $filter->setOperator($expected);
        
        // Test
        $this->assertEquals($expected, $filter->getOperator());
    }
    
    /**
     * @covers PEAR2\WindowsAzure\Services\Table\Models\Filters\BinaryFilter::setLeft
     * @covers PEAR2\WindowsAzure\Services\Table\Models\Filters\BinaryFilter::getLeft
     */
    public function testSetLeft()
    {
        // Setup
        $filter = new BinaryFilter();
        $expected = new BinaryFilter();
        
        // Test
        $filter->setLeft($expected);
        
        // Test
        $this->assertEquals($expected, $filter->getLeft());
    }
    
    /**
     * @covers PEAR2\WindowsAzure\Services\Table\Models\Filters\BinaryFilter::setRight
     * @covers PEAR2\WindowsAzure\Services\Table\Models\Filters\BinaryFilter::getRight
     */
    public function testSetRight()
    {
        // Setup
        $filter = new BinaryFilter();
        $expected = new BinaryFilter();
        
        // Test
        $filter->setRight($expected);
        
        // Test
        $this->assertEquals($expected, $filter->getRight());
    }
}

?>
