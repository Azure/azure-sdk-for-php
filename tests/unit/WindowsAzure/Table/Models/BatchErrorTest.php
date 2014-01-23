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
use WindowsAzure\Table\Models\BatchError;
use WindowsAzure\Common\ServiceException;

/**
 * Unit tests for class BatchError
 *
 * @category  Microsoft
 * @package   Tests\Unit\WindowsAzure\Table\Models
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: 0.4.0_2014-01
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
class BatchErrorTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers WindowsAzure\Table\Models\BatchError::create
     * @covers WindowsAzure\Table\Models\BatchError::getError
     * @covers WindowsAzure\Table\Models\BatchError::getContentId
     */
    public function testCreate()
    {
        // Setup
        $error = new ServiceException('200');
        $contentId = 1;
        $headers = array('content-id' => strval($contentId));
        
        // Test
        $batchError = BatchError::create($error, $headers);
        
        // Assert
        $this->assertEquals($error, $batchError->getError());
        $this->assertEquals($contentId, $batchError->getContentId());
        
        return $batchError;
    }
    
    /**
     * @covers WindowsAzure\Table\Models\BatchError::setError
     * @covers WindowsAzure\Table\Models\BatchError::getError
     * @depends testCreate
     */
    public function testSetError($batchError)
    {
        // Setup
        $error = new ServiceException('100');
        
        // Test
        $batchError->setError($error);
        
        // Assert
        $this->assertEquals($error, $batchError->getError());
    }
    
    /**
     * @covers WindowsAzure\Table\Models\BatchError::setContentId
     * @covers WindowsAzure\Table\Models\BatchError::getContentId
     * @depends testCreate
     */
    public function testSetContentId($batchError)
    {
        // Setup
        $contentId = 1;
        
        // Test
        $batchError->setContentId($contentId);
        
        // Assert
        $this->assertEquals($contentId, $batchError->getContentId());
    }
}


