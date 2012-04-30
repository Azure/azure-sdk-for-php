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
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */

namespace Tests\Unit\WindowsAzure\ServiceManagement\Models;
use WindowsAzure\ServiceManagement\Models\GetStorageAccountPropertiesResult;
use WindowsAzure\ServiceManagement\Models\StorageService;

/**
 * Unit tests for class GetStorageAccountPropertiesResult
 *
 * @category  Microsoft
 * @package   Tests\Unit\WindowsAzure\ServiceManagement\Models
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
class GetStorageAccountPropertiesResultTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers WindowsAzure\ServiceManagement\Models\GetStorageAccountPropertiesResult::setStorageService
     * @covers WindowsAzure\ServiceManagement\Models\GetStorageAccountPropertiesResult::getStorageService
     */
    public function testSetStorageService()
    {
        // Setup
        $expected = new StorageService();
        $result = new GetStorageAccountPropertiesResult();
        
        // Test
        $result->setStorageService($expected);
        
        // Assert
        $this->assertEquals($expected, $result->getStorageService());
    }
    
    /**
     * @covers WindowsAzure\ServiceManagement\Models\GetStorageAccountPropertiesResult::setUrl
     * @covers WindowsAzure\ServiceManagement\Models\GetStorageAccountPropertiesResult::getUrl
     */
    public function testSetUrl()
    {
        // Setup
        $expected = 'url';
        $result = new GetStorageAccountPropertiesResult();
        
        // Test
        $result->setUrl($expected);
        
        // Assert
        $this->assertEquals($expected, $result->getUrl());
    }
    
    /**
     * @covers WindowsAzure\ServiceManagement\Models\GetStorageAccountPropertiesResult::setEndpoints
     * @covers WindowsAzure\ServiceManagement\Models\GetStorageAccountPropertiesResult::getEndpoints
     */
    public function testSetEndpoints()
    {
        // Setup
        $expected = array();
        $result = new GetStorageAccountPropertiesResult();
        
        // Test
        $result->setEndpoints($expected);
        
        // Assert
        $this->assertEquals($expected, $result->getEndpoints());
    }
    
    /**
     * @covers WindowsAzure\ServiceManagement\Models\GetStorageAccountPropertiesResult::setStatus
     * @covers WindowsAzure\ServiceManagement\Models\GetStorageAccountPropertiesResult::getStatus
     */
    public function testSetStatus()
    {
        // Setup
        $expected = 'status';
        $result = new GetStorageAccountPropertiesResult();
        
        // Test
        $result->setStatus($expected);
        
        // Assert
        $this->assertEquals($expected, $result->getStatus());
    }
}

?>
