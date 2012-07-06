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
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */

namespace Tests\Unit\WindowsAzure\ServiceManagement\Models;
use WindowsAzure\ServiceManagement\Models\ServiceProperties;

/**
 * Unit tests for class ServiceProperties
 *
 * @category  Microsoft
 * @package   Tests\Unit\WindowsAzure\ServiceManagement\Models
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
class ServicePropertiesTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers WindowsAzure\ServiceManagement\Models\ServiceProperties::setUrl
     * @covers WindowsAzure\ServiceManagement\Models\ServiceProperties::getUrl
     */
    public function testSetUrl()
    {
        // Setup
        $service = new ServiceProperties();
        $expected = 'Url';
        
        // Test
        $service->setUrl($expected);
        
        // Assert
        $this->assertEquals($expected, $service->getUrl());
    }
    
    /**
     * @covers WindowsAzure\ServiceManagement\Models\ServiceProperties::setServiceName
     * @covers WindowsAzure\ServiceManagement\Models\ServiceProperties::getServiceName
     */
    public function testSetServiceName()
    {
        // Setup
        $service = new ServiceProperties();
        $expected = 'ServiceName';
        
        // Test
        $service->setServiceName($expected);
        
        // Assert
        $this->assertEquals($expected, $service->getServiceName());
    }
}


