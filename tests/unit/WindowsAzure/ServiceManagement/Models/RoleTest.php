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

use WindowsAzure\ServiceManagement\Models\Role;

/**
 * Unit tests for class Role.
 *
 * @category  Microsoft
 *
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 *
 * @version   Release: 0.4.5_2016-09
 *
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
class RoleTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers WindowsAzure\ServiceManagement\Models\Role::setRoleName
     * @covers WindowsAzure\ServiceManagement\Models\Role::getRoleName
     */
    public function testSetRoleName()
    {
        // Setup
        $expected = 'rolename';
        $role = new Role();

        // Test
        $role->setRoleName($expected);

        // Assert
        $this->assertEquals($expected, $role->getRoleName());
    }

    /**
     * @covers WindowsAzure\ServiceManagement\Models\Role::setOsVersion
     * @covers WindowsAzure\ServiceManagement\Models\Role::getOsVersion
     */
    public function testSetOsVersion()
    {
        // Setup
        $expected = 'osversion';
        $role = new Role();

        // Test
        $role->setOsVersion($expected);

        // Assert
        $this->assertEquals($expected, $role->getOsVersion());
    }
}
