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
 * @package   PEAR2\Tests\Framework
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
namespace PEAR2\Tests\Unit\WindowsAzure\ServiceRuntime;
use PEAR2\Tests\Framework\TestResources;
use PEAR2\WindowsAzure\ServiceRuntime\Role;
use PEAR2\WindowsAzure\ServiceRuntime\RoleInstance;

/**
 * Unit tests for class CurrentState
 *
 * @category  Microsoft
 * @package   PEAR2\Tests\Unit\WindowsAzure
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
class RoleInstanceTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers PEAR2\WindowsAzure\ServiceRuntime\RoleInstance::__construct
     * @covers PEAR2\WindowsAzure\ServiceRuntime\RoleInstance::getId
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
     * @covers PEAR2\WindowsAzure\ServiceRuntime\RoleInstance::getFaultDomain
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
     * @covers PEAR2\WindowsAzure\ServiceRuntime\RoleInstance::getUpdateDomain
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
     * @covers PEAR2\WindowsAzure\ServiceRuntime\RoleInstance::getInstanceEndpoints
     */
    public function testGetInstanceEndpoints()
    {
        $instanceEndpoints = array();

        // Setup
        $roleInstance = new RoleInstance(null, null, null, $instanceEndpoints);
        
        // Test
        $this->assertEquals($instanceEndpoints,
            $roleInstance->getInstanceEndpoints());
    }    
    
    /**
     * @covers PEAR2\WindowsAzure\ServiceRuntime\RoleInstance::getRole
     * @covers PEAR2\WindowsAzure\ServiceRuntime\RoleInstance::setRole
     */
    public function testGetSetRole()
    {
        $role = new Role(null, array());

        // Setup
        $roleInstance = new RoleInstance(null, null, null, null);
        
        // Test
        $roleInstance->setRole($role);
        $this->assertEquals($role, $roleInstance->getRole());
    }
}

?>