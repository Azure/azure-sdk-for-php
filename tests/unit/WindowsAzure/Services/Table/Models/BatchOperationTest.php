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
use WindowsAzure\Services\Table\Models\BatchOperation;
use WindowsAzure\Services\Table\Models\BatchOperationType;
use WindowsAzure\Services\Table\Models\BatchOperationParameterName;

/**
 * Unit tests for class BatchOperation
 *
 * @category  Microsoft
 * @package   Tests\Unit\WindowsAzure\Services\Table\Models
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
class BatchOperationTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers WindowsAzure\Services\Table\Models\BatchOperation::setType
     * @covers WindowsAzure\Services\Table\Models\BatchOperation::getType
     */
    public function testSetType()
    {
        // Setup
        $batchOperation = new BatchOperation();
        $expected = BatchOperationType::DELETE_ENTITY_OPERATION;
        
        // Test
        $batchOperation->setType($expected);
        
        // Assert
        $this->assertEquals($expected, $batchOperation->getType());
    }
    
    /**
     * @covers WindowsAzure\Services\Table\Models\BatchOperation::addParameter
     * @covers WindowsAzure\Services\Table\Models\BatchOperation::getParameter
     */
    public function testAddParameter()
    {
        // Setup
        $batchOperation = new BatchOperation();
        $expected = 'param zeta';
        $name = BatchOperationParameterName::BP_ENTITY;
        
        // Test
        $batchOperation->addParameter($name, $expected);
        
        // Assert
        $this->assertEquals($expected, $batchOperation->getParameter($name));
    }
}

?>
