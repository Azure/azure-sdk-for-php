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

use WindowsAzure\ServiceManagement\Models\UpgradeStatus;

/**
 * Unit tests for class UpgradeStatus.
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
class UpgradeStatusTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers \WindowsAzure\ServiceManagement\Models\UpgradeStatus::setUpgradeType
     * @covers \WindowsAzure\ServiceManagement\Models\UpgradeStatus::getUpgradeType
     */
    public function testSetUpgradeType()
    {
        // Setup
        $expected = 'upgradetype';
        $upgradeStatus = new UpgradeStatus();

        // Test
        $upgradeStatus->setUpgradeType($expected);

        // Assert
        $this->assertEquals($expected, $upgradeStatus->getUpgradeType());
    }

    /**
     * @covers \WindowsAzure\ServiceManagement\Models\UpgradeStatus::setCurrentUpgradeDomainState
     * @covers \WindowsAzure\ServiceManagement\Models\UpgradeStatus::getCurrentUpgradeDomainState
     */
    public function testSetCurrentUpgradeDomainState()
    {
        // Setup
        $expected = 'currentupgradedomainstate';
        $upgradeStatus = new UpgradeStatus();

        // Test
        $upgradeStatus->setCurrentUpgradeDomainState($expected);

        // Assert
        $this->assertEquals($expected, $upgradeStatus->getCurrentUpgradeDomainState());
    }

    /**
     * @covers \WindowsAzure\ServiceManagement\Models\UpgradeStatus::setCurrentUpgradeDomain
     * @covers \WindowsAzure\ServiceManagement\Models\UpgradeStatus::getCurrentUpgradeDomain
     */
    public function testSetCurrentUpgradeDomain()
    {
        // Setup
        $expected = 10;
        $upgradeStatus = new UpgradeStatus();

        // Test
        $upgradeStatus->setCurrentUpgradeDomain($expected);

        // Assert
        $this->assertEquals($expected, $upgradeStatus->getCurrentUpgradeDomain());
    }
}
