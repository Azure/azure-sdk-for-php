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

use WindowsAzure\ServiceManagement\Models\Deployment;
use WindowsAzure\ServiceManagement\Models\DeploymentSlot;
use WindowsAzure\ServiceManagement\Models\UpgradeStatus;

/**
 * Unit tests for class Deployment.
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
class DeploymentTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers \WindowsAzure\ServiceManagement\Models\Deployment::setName
     * @covers \WindowsAzure\ServiceManagement\Models\Deployment::getName
     */
    public function testSetName()
    {
        // Setup
        $expected = 'name';
        $deployment = new Deployment();

        // Test
        $deployment->setName($expected);

        // Assert
        $this->assertEquals($expected, $deployment->getName());
    }

    /**
     * @covers \WindowsAzure\ServiceManagement\Models\Deployment::setSlot
     * @covers \WindowsAzure\ServiceManagement\Models\Deployment::getSlot
     */
    public function testSetSlot()
    {
        // Setup
        $expected = DeploymentSlot::PRODUCTION;
        $deployment = new Deployment();

        // Test
        $deployment->setSlot($expected);

        // Assert
        $this->assertEquals($expected, $deployment->getSlot());
    }

    /**
     * @covers \WindowsAzure\ServiceManagement\Models\Deployment::setPrivateId
     * @covers \WindowsAzure\ServiceManagement\Models\Deployment::getPrivateId
     */
    public function testSetPrivateId()
    {
        // Setup
        $expected = 'privateid';
        $deployment = new Deployment();

        // Test
        $deployment->setPrivateId($expected);

        // Assert
        $this->assertEquals($expected, $deployment->getPrivateId());
    }

    /**
     * @covers \WindowsAzure\ServiceManagement\Models\Deployment::setStatus
     * @covers \WindowsAzure\ServiceManagement\Models\Deployment::getStatus
     */
    public function testSetStatus()
    {
        // Setup
        $expected = 'status';
        $deployment = new Deployment();

        // Test
        $deployment->setStatus($expected);

        // Assert
        $this->assertEquals($expected, $deployment->getStatus());
    }

    /**
     * @covers \WindowsAzure\ServiceManagement\Models\Deployment::setLabel
     * @covers \WindowsAzure\ServiceManagement\Models\Deployment::getLabel
     */
    public function testSetLabel()
    {
        // Setup
        $expected = 'label';
        $deployment = new Deployment();

        // Test
        $deployment->setLabel($expected);

        // Assert
        $this->assertEquals($expected, $deployment->getLabel());
    }

    /**
     * @covers \WindowsAzure\ServiceManagement\Models\Deployment::setConfiguration
     * @covers \WindowsAzure\ServiceManagement\Models\Deployment::getConfiguration
     */
    public function testSetConfiguration()
    {
        // Setup
        $expected = 'configuration';
        $deployment = new Deployment();

        // Test
        $deployment->setConfiguration($expected);

        // Assert
        $this->assertEquals($expected, $deployment->getConfiguration());
    }

    /**
     * @covers \WindowsAzure\ServiceManagement\Models\Deployment::setRoleInstanceList
     * @covers \WindowsAzure\ServiceManagement\Models\Deployment::getRoleInstanceList
     */
    public function testSetRoleInstanceList()
    {
        // Setup
        $expected = [];
        $deployment = new Deployment();

        // Test
        $deployment->setRoleInstanceList($expected);

        // Assert
        $this->assertEquals($expected, $deployment->getRoleInstanceList());
    }

    /**
     * @covers \WindowsAzure\ServiceManagement\Models\Deployment::setUpgradeDomainCount
     * @covers \WindowsAzure\ServiceManagement\Models\Deployment::getUpgradeDomainCount
     */
    public function testSetUpgradeDomainCount()
    {
        // Setup
        $expected = 1;
        $deployment = new Deployment();

        // Test
        $deployment->setUpgradeDomainCount($expected);

        // Assert
        $this->assertEquals($expected, $deployment->getUpgradeDomainCount());
    }

    /**
     * @covers \WindowsAzure\ServiceManagement\Models\Deployment::setRoleList
     * @covers \WindowsAzure\ServiceManagement\Models\Deployment::getRoleList
     */
    public function testSetRoleList()
    {
        // Setup
        $expected = [];
        $deployment = new Deployment();

        // Test
        $deployment->setRoleList($expected);

        // Assert
        $this->assertEquals($expected, $deployment->getRoleList());
    }

    /**
     * @covers \WindowsAzure\ServiceManagement\Models\Deployment::setSdkVersion
     * @covers \WindowsAzure\ServiceManagement\Models\Deployment::getSdkVersion
     */
    public function testSetSdkVersion()
    {
        // Setup
        $expected = 'sdkversion';
        $deployment = new Deployment();

        // Test
        $deployment->setSdkVersion($expected);

        // Assert
        $this->assertEquals($expected, $deployment->getSdkVersion());
    }

    /**
     * @covers \WindowsAzure\ServiceManagement\Models\Deployment::setInputEndpointList
     * @covers \WindowsAzure\ServiceManagement\Models\Deployment::getInputEndpointList
     */
    public function testSetInputEndpointList()
    {
        // Setup
        $expected = [];
        $deployment = new Deployment();

        // Test
        $deployment->setInputEndpointList($expected);

        // Assert
        $this->assertEquals($expected, $deployment->getInputEndpointList());
    }

    /**
     * @covers \WindowsAzure\ServiceManagement\Models\Deployment::setLocked
     * @covers \WindowsAzure\ServiceManagement\Models\Deployment::getLocked
     */
    public function testSetLocked()
    {
        // Setup
        $expected = false;
        $deployment = new Deployment();

        // Test
        $deployment->setLocked($expected);

        // Assert
        $this->assertEquals($expected, $deployment->getLocked());
    }

    /**
     * @covers \WindowsAzure\ServiceManagement\Models\Deployment::setRollbackAllowed
     * @covers \WindowsAzure\ServiceManagement\Models\Deployment::getRollbackAllowed
     */
    public function testSetRollbackAllowed()
    {
        // Setup
        $expected = false;
        $deployment = new Deployment();

        // Test
        $deployment->setRollbackAllowed($expected);

        // Assert
        $this->assertEquals($expected, $deployment->getRollbackAllowed());
    }

    /**
     * @covers \WindowsAzure\ServiceManagement\Models\Deployment::setUpgradeStatus
     * @covers \WindowsAzure\ServiceManagement\Models\Deployment::getUpgradeStatus
     */
    public function testSetUpgradeStatus()
    {
        // Setup
        $expected = new UpgradeStatus();
        $deployment = new Deployment();

        // Test
        $deployment->setUpgradeStatus($expected);

        // Assert
        $this->assertEquals($expected, $deployment->getUpgradeStatus());
    }
}
