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
use WindowsAzure\ServiceManagement\Models\GetStorageAccountKeysResult;

/**
 * Unit tests for class GetStorageAccountKeysResult
 *
 * @category  Microsoft
 * @package   Tests\Unit\WindowsAzure\ServiceManagement\Models
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
class GetStorageAccountKeysResultTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers WindowsAzure\ServiceManagement\Models\GetStorageAccountKeysResult::setUrl
     * @covers WindowsAzure\ServiceManagement\Models\GetStorageAccountKeysResult::getUrl
     */
    public function testSetUrl()
    {
        // Setup
        $expected = 'Url';
        $result = new GetStorageAccountKeysResult();
        
        // Test
        $result->setUrl($expected);
        
        // Assert
        $this->assertEquals($expected, $result->getUrl());
    }
    
    /**
     * @covers WindowsAzure\ServiceManagement\Models\GetStorageAccountKeysResult::setPrimary
     * @covers WindowsAzure\ServiceManagement\Models\GetStorageAccountKeysResult::getPrimary
     */
    public function testSetPrimary()
    {
        // Setup
        $expected = 'Primary';
        $result = new GetStorageAccountKeysResult();
        
        // Test
        $result->setPrimary($expected);
        
        // Assert
        $this->assertEquals($expected, $result->getPrimary());
    }
    
    /**
     * @covers WindowsAzure\ServiceManagement\Models\GetStorageAccountKeysResult::setSecondary
     * @covers WindowsAzure\ServiceManagement\Models\GetStorageAccountKeysResult::getSecondary
     */
    public function testSetSecondary()
    {
        // Setup
        $expected = 'Secondary';
        $result = new GetStorageAccountKeysResult();
        
        // Test
        $result->setSecondary($expected);
        
        // Assert
        $this->assertEquals($expected, $result->getSecondary());
    }
}

?>
