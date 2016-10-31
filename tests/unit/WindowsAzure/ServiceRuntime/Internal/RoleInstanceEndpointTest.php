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

use WindowsAzure\ServiceRuntime\Internal\RoleInstance;
use WindowsAzure\ServiceRuntime\Internal\RoleInstanceEndpoint;

/**
 * Unit tests for class RoleInstanceEndpoint.
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
class RoleInstanceEndpointTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers \WindowsAzure\ServiceRuntime\Internal\RoleInstanceEndpoint::__construct
     * @covers \WindowsAzure\ServiceRuntime\Internal\RoleInstanceEndpoint::setRoleInstance
     * @covers \WindowsAzure\ServiceRuntime\Internal\RoleInstanceEndpoint::getRoleInstance
     */
    public function testRoleInstance()
    {
        // Setup
        $roleInstanceEndpoint = new RoleInstanceEndpoint(null, null, null);
        $roleInstance = new RoleInstance('roleInstance', null, null, null);

        // Test
        $roleInstanceEndpoint->setRoleInstance($roleInstance);
        $this->assertEquals(
            'roleInstance',
            $roleInstanceEndpoint->getRoleInstance()->getId()
        );
    }

    /**
     * @covers \WindowsAzure\ServiceRuntime\Internal\RoleInstanceEndpoint::getProtocol
     */
    public function testGetProtocol()
    {
        // Setup
        $roleInstanceEndpoint = new RoleInstanceEndpoint('protocol', null, null);

        // Test
        $this->assertEquals(
            'protocol',
            $roleInstanceEndpoint->getProtocol()
        );
    }

    /**
     * @covers \WindowsAzure\ServiceRuntime\Internal\RoleInstanceEndpoint::getAddress
     */
    public function testGetAddress()
    {
        // Setup
        $roleInstanceEndpoint = new RoleInstanceEndpoint(null, 'address', null);

        // Test
        $this->assertEquals(
            'address',
            $roleInstanceEndpoint->getAddress()
        );
    }

    /**
     * @covers \WindowsAzure\ServiceRuntime\Internal\RoleInstanceEndpoint::getPort
     */
    public function testGetPort()
    {
        // Setup
        $roleInstanceEndpoint = new RoleInstanceEndpoint(null, null, 8080);

        // Test
        $this->assertEquals(
            8080,
            $roleInstanceEndpoint->getPort()
        );
    }
}
