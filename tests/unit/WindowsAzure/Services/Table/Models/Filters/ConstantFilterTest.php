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
use PEAR2\WindowsAzure\Services\Table\Models\Filters\ConstantFilter;
use PEAR2\WindowsAzure\Services\Table\Models\EdmType;

/**
 * Unit tests for class ConstantFilter
 *
 * @category  Microsoft
 * @package   PEAR2\Tests\Unit\WindowsAzure\Services\Table\Models\Filters
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
class ConstantFilterTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers PEAR2\WindowsAzure\Services\Table\Models\Filters\ConstantFilter::setValue
     * @covers PEAR2\WindowsAzure\Services\Table\Models\Filters\ConstantFilter::getValue
     */
    public function testSetValue()
    {
        // Setup
        $filter = new ConstantFilter();
        $expected = 'x';
        
        // Test
        $filter->setValue($expected);
        
        // Test
        $this->assertEquals($expected, $filter->getValue());
    }
    
    /**
     * @covers PEAR2\WindowsAzure\Services\Table\Models\Filters\ConstantFilter::setEdmType
     * @covers PEAR2\WindowsAzure\Services\Table\Models\Filters\ConstantFilter::getEdmType
     */
    public function testSetEdmType()
    {
        // Setup
        $filter = new ConstantFilter();
        $expected = EdmType::BINARY;
        
        // Test
        $filter->setEdmType($expected);
        
        // Assert
        $this->assertEquals($expected, $filter->getEdmType());
    }
}

?>
