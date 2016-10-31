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

namespace Tests\unit\WindowsAzure\ServiceRuntime\Internal;

use WindowsAzure\ServiceRuntime\Internal\Role;
use WindowsAzure\ServiceRuntime\Internal\RoleInstance;

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
     * @covers \WindowsAzure\ServiceRuntime\Internal\RoleInstance::__construct
     * @covers \WindowsAzure\ServiceRuntime\Internal\RoleInstance::getId
     */
    public function testGetId()
    {
        $id = 'roleId';

        // Setup
        $roleInstance = new RoleInstance($id, null, null, null);

        // Test
        $this->assertEquals($id, $roleInstance->getId());
    }

    /**
     * @covers \WindowsAzure\ServiceRuntime\Internal\RoleInstance::getFaultDomain
     */
    public function testGetFaultDomain()
    {
        $faultDomain = 3;

        // Setup
        $roleInstance = new RoleInstance(null, $faultDomain, null, null);

        // Test
        $this->assertEquals($faultDomain, $roleInstance->getFaultDomain());
    }

    /**
     * @covers \WindowsAzure\ServiceRuntime\Internal\RoleInstance::getUpdateDomain
     */
    public function testGetUpdateDomain()
    {
        $updateDomain = 3;

        // Setup
        $roleInstance = new RoleInstance(null, null, $updateDomain, null);

        // Test
        $this->assertEquals($updateDomain, $roleInstance->getUpdateDomain());
    }

    /**
     * @covers \WindowsAzure\ServiceRuntime\Internal\RoleInstance::getInstanceEndpoints
     */
    public function testGetInstanceEndpoints()
    {
        $instanceEndpoints = [];

        // Setup
        $roleInstance = new RoleInstance(null, null, null, $instanceEndpoints);

        // Test
        $this->assertEquals($instanceEndpoints,
            $roleInstance->getInstanceEndpoints());
    }

    /**
     * @covers \WindowsAzure\ServiceRuntime\Internal\RoleInstance::getRole
     * @covers \WindowsAzure\ServiceRuntime\Internal\RoleInstance::setRole
     */
    public function testGetSetRole()
    {
        $role = new Role(null, []);

        // Setup
        $roleInstance = new RoleInstance(null, null, null, null);

        // Test
        $roleInstance->setRole($role);
        $this->assertEquals($role, $roleInstance->getRole());
    }
}
