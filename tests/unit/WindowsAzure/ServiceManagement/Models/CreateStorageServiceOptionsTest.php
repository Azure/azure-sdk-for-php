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
 * @package   Tests\Unit\WindowsAzure\CreateStorageServiceOptionsManagement\Models
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */

namespace Tests\Unit\WindowsAzure\CreateStorageServiceOptionsManagement\Models;
use WindowsAzure\ServiceManagement\Models\CreateStorageServiceOptions;

/**
 * Unit tests for class CreateStorageServiceOptions
 *
 * @category  Microsoft
 * @package   Tests\Unit\WindowsAzure\CreateStorageServiceOptionsManagement\Models
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
class CreateStorageServiceOptionsTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers WindowsAzure\ServiceManagement\Models\CreateStorageServiceOptions::setDescription
     * @covers WindowsAzure\ServiceManagement\Models\CreateStorageServiceOptions::getDescription
     */
    public function testSetDescription()
    {
        // Setup
        $options = new CreateStorageServiceOptions();
        $expected = 'Description';
        
        // Test
        $options->setDescription($expected);
        
        // Assert
        $this->assertEquals($expected, $options->getDescription());
    }
    
    /**
     * @covers WindowsAzure\ServiceManagement\Models\CreateStorageServiceOptions::setLocation
     * @covers WindowsAzure\ServiceManagement\Models\CreateStorageServiceOptions::getLocation
     */
    public function testSetLocation()
    {
        // Setup
        $options = new CreateStorageServiceOptions();
        $expected = 'Location';
        
        // Test
        $options->setLocation($expected);
        
        // Assert
        $this->assertEquals($expected, $options->getLocation());
    }
    
    /**
     * @covers WindowsAzure\ServiceManagement\Models\CreateStorageServiceOptions::setAffinityGroup
     * @covers WindowsAzure\ServiceManagement\Models\CreateStorageServiceOptions::getAffinityGroup
     */
    public function testSetAffinityGroup()
    {
        // Setup
        $options = new CreateStorageServiceOptions();
        $expected = 'MyGroup';
        
        // Test
        $options->setAffinityGroup($expected);
        
        // Assert
        $this->assertEquals($expected, $options->getAffinityGroup());
    }
}


