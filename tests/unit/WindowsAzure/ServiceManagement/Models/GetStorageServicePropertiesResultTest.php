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
 * @package   Tests\Unit\WindowsAzure\ServiceManagement\Models
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */

namespace Tests\Unit\WindowsAzure\ServiceManagement\Models;
use WindowsAzure\ServiceManagement\Models\GetStorageServicePropertiesResult;
use WindowsAzure\ServiceManagement\Models\StorageService;

/**
 * Unit tests for class GetStorageServicePropertiesResult
 *
 * @category  Microsoft
 * @package   Tests\Unit\WindowsAzure\ServiceManagement\Models
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
class GetStorageServicePropertiesResultTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers WindowsAzure\ServiceManagement\Models\GetStorageServicePropertiesResult::setStorageService
     * @covers WindowsAzure\ServiceManagement\Models\GetStorageServicePropertiesResult::getStorageService
     */
    public function testSetStorageService()
    {
        // Setup
        $expected = new StorageService();
        $result = new GetStorageServicePropertiesResult();
        
        // Test
        $result->setStorageService($expected);
        
        // Assert
        $this->assertEquals($expected, $result->getStorageService());
    }
    
    /**
     * @covers WindowsAzure\ServiceManagement\Models\GetStorageServicePropertiesResult::setUrl
     * @covers WindowsAzure\ServiceManagement\Models\GetStorageServicePropertiesResult::getUrl
     */
    public function testSetUrl()
    {
        // Setup
        $expected = 'url';
        $result = new GetStorageServicePropertiesResult();
        
        // Test
        $result->setUrl($expected);
        
        // Assert
        $this->assertEquals($expected, $result->getUrl());
    }
    
    /**
     * @covers WindowsAzure\ServiceManagement\Models\GetStorageServicePropertiesResult::setEndpoints
     * @covers WindowsAzure\ServiceManagement\Models\GetStorageServicePropertiesResult::getEndpoints
     */
    public function testSetEndpoints()
    {
        // Setup
        $expected = array();
        $result = new GetStorageServicePropertiesResult();
        
        // Test
        $result->setEndpoints($expected);
        
        // Assert
        $this->assertEquals($expected, $result->getEndpoints());
    }
    
    /**
     * @covers WindowsAzure\ServiceManagement\Models\GetStorageServicePropertiesResult::setStatus
     * @covers WindowsAzure\ServiceManagement\Models\GetStorageServicePropertiesResult::getStatus
     */
    public function testSetStatus()
    {
        // Setup
        $expected = 'status';
        $result = new GetStorageServicePropertiesResult();
        
        // Test
        $result->setStatus($expected);
        
        // Assert
        $this->assertEquals($expected, $result->getStatus());
    }
}

?>
