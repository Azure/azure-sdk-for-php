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

use WindowsAzure\ServiceRuntime\Internal\RoleEnvironmentData;
use WindowsAzure\ServiceRuntime\Internal\RoleInstance;

/**
 * Unit tests for class RoleEnvironmentData.
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
class RoleEnvironmentDataTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers \WindowsAzure\ServiceRuntime\Internal\RoleEnvironmentData::__construct
     * @covers \WindowsAzure\ServiceRuntime\Internal\RoleEnvironmentData::getDeploymentId
     * @covers \WindowsAzure\ServiceRuntime\Internal\RoleEnvironmentData::getConfigurationSettings
     * @covers \WindowsAzure\ServiceRuntime\Internal\RoleEnvironmentData::getLocalResources
     * @covers \WindowsAzure\ServiceRuntime\Internal\RoleEnvironmentData::getCurrentInstance
     * @covers \WindowsAzure\ServiceRuntime\Internal\RoleEnvironmentData::getRoles
     * @covers \WindowsAzure\ServiceRuntime\Internal\RoleEnvironmentData::isEmulated
     */
    public function testGetters()
    {
        $deploymentId = 'deploymentId';
        $configurationSettings = [];
        $localResources = [];
        $currentInstance = new RoleInstance(null, null, null, null);
        $roles = [];
        $isEmulated = false;

        // Setup
        $roleEnvironmentData = new RoleEnvironmentData($deploymentId,
            $configurationSettings, $localResources, $currentInstance,
            $roles, $isEmulated);

        // Test
        $this->assertEquals($deploymentId,
            $roleEnvironmentData->getDeploymentId());

        $this->assertEquals($configurationSettings,
            $roleEnvironmentData->getConfigurationSettings());

        $this->assertEquals($localResources,
            $roleEnvironmentData->getLocalResources());

        $this->assertEquals($currentInstance,
            $roleEnvironmentData->getCurrentInstance());

        $this->assertEquals($roles,
            $roleEnvironmentData->getRoles());

        $this->assertEquals($isEmulated,
            $roleEnvironmentData->isEmulated());
    }
}
