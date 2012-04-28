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
use WindowsAzure\ServiceManagement\Models\Service;

/**
 * Unit tests for class Service
 *
 * @category  Microsoft
 * @package   Tests\Unit\WindowsAzure\ServiceManagement\Models
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
class ServiceTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers WindowsAzure\ServiceManagement\Models\Service::setUrl
     * @covers WindowsAzure\ServiceManagement\Models\Service::getUrl
     */
    public function testSetUrl()
    {
        // Setup
        $service = new Service();
        $expected = 'Url';
        
        // Test
        $service->setUrl($expected);
        
        // Assert
        $this->assertEquals($expected, $service->getUrl());
    }
    
    /**
     * @covers WindowsAzure\ServiceManagement\Models\Service::setServiceName
     * @covers WindowsAzure\ServiceManagement\Models\Service::getServiceName
     */
    public function testSetServiceName()
    {
        // Setup
        $service = new Service();
        $expected = 'ServiceName';
        
        // Test
        $service->setServiceName($expected);
        
        // Assert
        $this->assertEquals($expected, $service->getServiceName());
    }
}

?>
