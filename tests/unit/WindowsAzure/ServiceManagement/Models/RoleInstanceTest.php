<?php

/**
 * LICENSE: Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 * http://www.apache.org/licenses/LICENSE-2.0.
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
 *
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 *
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */

namespace Tests\unit\WindowsAzure\ServiceManagement\Models;

use WindowsAzure\ServiceManagement\Models\RoleInstance;

/**
 * Unit tests for class RoleInstance.
 *
 * @category  Microsoft
 *
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 *
 * @version   Release: 0.5.0_2016-11
 *
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
class RoleInstanceTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers \WindowsAzure\ServiceManagement\Models\RoleInstance::setRoleName
     * @covers \WindowsAzure\ServiceManagement\Models\RoleInstance::getRoleName
     */
    public function testSetRoleName()
    {
        // Setup
        $expected = 'rolename';
        $roleInstance = new RoleInstance();

        // Test
        $roleInstance->setRoleName($expected);

        // Assert
        $this->assertEquals($expected, $roleInstance->getRoleName());
    }

    /**
     * @covers \WindowsAzure\ServiceManagement\Models\RoleInstance::setInstanceName
     * @covers \WindowsAzure\ServiceManagement\Models\RoleInstance::getInstanceName
     */
    public function testSetInstanceName()
    {
        // Setup
        $expected = 'instancename';
        $roleInstance = new RoleInstance();

        // Test
        $roleInstance->setInstanceName($expected);

        // Assert
        $this->assertEquals($expected, $roleInstance->getInstanceName());
    }

    /**
     * @covers \WindowsAzure\ServiceManagement\Models\RoleInstance::setInstanceStatus
     * @covers \WindowsAzure\ServiceManagement\Models\RoleInstance::getInstanceStatus
     */
    public function testSetInstanceStatus()
    {
        // Setup
        $expected = 'instancestatus';
        $roleInstance = new RoleInstance();

        // Test
        $roleInstance->setInstanceStatus($expected);

        // Assert
        $this->assertEquals($expected, $roleInstance->getInstanceStatus());
    }

    /**
     * @covers \WindowsAzure\ServiceManagement\Models\RoleInstance::setInstanceUpgradeDomain
     * @covers \WindowsAzure\ServiceManagement\Models\RoleInstance::getInstanceUpgradeDomain
     */
    public function testSetInstanceUpgradeDomain()
    {
        // Setup
        $expected = 1;
        $roleInstance = new RoleInstance();

        // Test
        $roleInstance->setInstanceUpgradeDomain($expected);

        // Assert
        $this->assertEquals($expected, $roleInstance->getInstanceUpgradeDomain());
    }

    /**
     * @covers \WindowsAzure\ServiceManagement\Models\RoleInstance::setInstanceFaultDomain
     * @covers \WindowsAzure\ServiceManagement\Models\RoleInstance::getInstanceFaultDomain
     */
    public function testSetInstanceFaultDomain()
    {
        // Setup
        $expected = 'instancefaultdomain';
        $roleInstance = new RoleInstance();

        // Test
        $roleInstance->setInstanceFaultDomain($expected);

        // Assert
        $this->assertEquals($expected, $roleInstance->getInstanceFaultDomain());
    }

    /**
     * @covers \WindowsAzure\ServiceManagement\Models\RoleInstance::setInstanceSize
     * @covers \WindowsAzure\ServiceManagement\Models\RoleInstance::getInstanceSize
     */
    public function testSetInstanceSize()
    {
        // Setup
        $expected = 'instancesize';
        $roleInstance = new RoleInstance();

        // Test
        $roleInstance->setInstanceSize($expected);

        // Assert
        $this->assertEquals($expected, $roleInstance->getInstanceSize());
    }

    /**
     * @covers \WindowsAzure\ServiceManagement\Models\RoleInstance::setInstanceStateDetails
     * @covers \WindowsAzure\ServiceManagement\Models\RoleInstance::getInstanceStateDetails
     */
    public function testSetInstanceStateDetails()
    {
        // Setup
        $expected = 'instancestatedetails';
        $roleInstance = new RoleInstance();

        // Test
        $roleInstance->setInstanceStateDetails($expected);

        // Assert
        $this->assertEquals($expected, $roleInstance->getInstanceStateDetails());
    }

    /**
     * @covers \WindowsAzure\ServiceManagement\Models\RoleInstance::setInstanceErrorCode
     * @covers \WindowsAzure\ServiceManagement\Models\RoleInstance::getInstanceErrorCode
     */
    public function testSetInstanceErrorCode()
    {
        // Setup
        $expected = 'instanceerrorcode';
        $roleInstance = new RoleInstance();

        // Test
        $roleInstance->setInstanceErrorCode($expected);

        // Assert
        $this->assertEquals($expected, $roleInstance->getInstanceErrorCode());
    }
}
