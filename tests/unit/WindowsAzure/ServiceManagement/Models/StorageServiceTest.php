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
use WindowsAzure\ServiceManagement\Models\StorageService;
use WindowsAzure\Common\Internal\Resources;

/**
 * Unit tests for class StorageService
 *
 * @category  Microsoft
 * @package   Tests\Unit\WindowsAzure\ServiceManagement\Models
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
class StorageServiceTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers WindowsAzure\ServiceManagement\Models\StorageService::__construct
     */
    public function test__construct()
    {
        // Setup
        $expectedGroup = 'group';
        $expectedName = 'name';
        $raw = array(
            Resources::XTAG_AFFINITY_GROUP => $expectedGroup,
            Resources::XTAG_SERVICE_NAME => $expectedName
        );
        
        // Test
        $storageService = new StorageService($raw);
        
        // Assert
        $this->assertEquals($expectedGroup, $storageService->getAffinityGroup());
        $this->assertEquals($expectedName, $storageService->getName());
        
        return $storageService;
    }
    
    /**
     * @covers WindowsAzure\ServiceManagement\Models\StorageService::setAffinityGroup
     * @covers WindowsAzure\ServiceManagement\Models\StorageService::getAffinityGroup
     */
    public function testSetAffinityGroup()
    {
        // Setup
        $storageService = new StorageService();
        $expected = 'MyGroup';
        
        // Test
        $storageService->setAffinityGroup($expected);
        
        // Assert
        $this->assertEquals($expected, $storageService->getAffinityGroup());
    }
}

?>
