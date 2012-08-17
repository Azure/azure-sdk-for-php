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
 * @package   Tests\Framework
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
 
namespace Tests\Framework;
use Tests\Framework\TestResources;
use WindowsAzure\Common\Internal\Resources;
use WindowsAzure\ServiceManagement\Models\CreateServiceOptions;
use WindowsAzure\ServiceManagement\Models\OperationStatus;
use WindowsAzure\ServiceManagement\Models\Locations;
use WindowsAzure\ServiceManagement\Models\DeploymentSlot;
use WindowsAzure\ServiceManagement\Models\GetDeploymentOptions;

/**
 * Test base for ServiceManagementTest class.
 *
 * @category  Microsoft
 * @package   Tests\Framework
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
class ServiceManagementRestProxyTestBase extends RestProxyTestBase
{
    protected $createdStorageServices;
    protected $createdHostedServices;
    protected $createdAffinityGroups;
    protected $createdDeployments;
    protected $defaultLocation;
    protected $defaultSlot;
    protected $defaultDeploymentEncodedConfiguration;
    protected $encodedComplexConfiguration;


    public function setUp()
    {
        parent::setUp();
        $serviceManagementRestProxy = $this->builder->createServiceManagementService(TestResources::getServiceManagementConnectionString());
        parent::setProxy($serviceManagementRestProxy);
        
        $this->createdStorageServices = array();
        $this->createdAffinityGroups = array();
        $this->createdHostedServices = array();
        $this->createdDeployments = array();
        $this->defaultLocation = 'West US';
        $this->defaultSlot = DeploymentSlot::PRODUCTION;
        $this->defaultDeploymentEncodedConfiguration = base64_encode(file_get_contents(TestResources::simplePackageConfiguration()));
        $this->encodedComplexConfiguration = base64_encode(file_get_contents(TestResources::complexPackageConfiguration()));
    }

    public function createAffinityGroup($name)
    {
        $location = Locations::WEST_US;
        $label = base64_encode($name);
        
        $this->restProxy->createAffinityGroup($name, $label, $location);
        $this->createdAffinityGroups[] = $name;
    }
    
    public function affinityGroupExists($name)
    {
        return !is_null($this->getAffinityGroup($name));
    }
    
    public function getAffinityGroup($name)
    {
        $result = $this->restProxy->listAffinityGroups();
        $affinityGroups = $result->getAffinityGroups();
        
        foreach ($affinityGroups as $affinityGroup) {
            if ($affinityGroup->getName() == $name) {
                return $affinityGroup;
            }
        }
        
        return null;
    }
    
    public function deleteAffinityGroup($name)
    {
        $this->restProxy->deleteAffinityGroup($name);
    }
    
    public function safeDeleteAffinityGroup($name)
    {
        try
        {
            $this->deleteAffinityGroup($name);
        }
        catch (\Exception $e)
        {
            // Ignore exception and continue, will assume that this affinity group doesn't exist
            error_log($e->getMessage());
        }
    }
    
    public function createStorageService($name, $options = null)
    {
        $label = base64_encode($name);
        $options = new CreateServiceOptions();
        $options->setLocation($this->defaultLocation);
        
        $result = $this->restProxy->createStorageService($name, $label, $options);
        $this->blockUntilAsyncSucceed($result);
        $this->createdStorageServices[] = $name;
    }
    
    protected function blockUntilAsyncSucceed($requestInfo)
    {
        $status = null;
        
        do {
            sleep(5);
            $result = $this->restProxy->getOperationStatus($requestInfo);
            $status = $result->getStatus();
        } while(OperationStatus::IN_PROGRESS == $status);
        
        $this->assertEquals(OperationStatus::SUCCEEDED, $status, $result->getError());
    }
    
    public function storageServiceExists($name)
    {
        $result = $this->restProxy->listStorageServices();
        $storageServices = $result->getStorageServices();
        
        foreach ($storageServices as $storageService) {
            if ($storageService->getName() == $name) {
                return true;
            }
        }
        
        return false;
    }
    
    public function deleteStorageService($name)
    {
        $this->restProxy->deleteStorageService($name);
    }
    
    public function safeDeleteStorageService($name)
    {
        try
        {
            $this->deleteStorageService($name);
        }
        catch (\Exception $e)
        {
            // Ignore exception and continue, will assume that this storage account doesn't exist 
            error_log($e->getMessage());
        }
    }
    
    public function createHostedService($name, $options = null)
    {
        $label = base64_encode($name);
        $options = new CreateServiceOptions();
        $options->setLocation($this->defaultLocation);
        
        $this->restProxy->createHostedService($name, $label, $options);
        $this->createdHostedServices[] = $name;
    }
    
    public function hostedServiceExists($name)
    {
        $result = $this->restProxy->listHostedServices();
        $hostedServices = $result->getHostedServices();
        
        foreach ($hostedServices as $hostedService) {
            if ($hostedService->getName() == $name) {
                return true;
            }
        }
        
        return false;
    }
    
    public function deleteHostedService($name)
    {
        $this->restProxy->deleteHostedService($name);
    }
    
    public function safeDeleteHostedService($name)
    {
        try
        {
            $this->deleteHostedService($name);
        }
        catch (\Exception $e)
        {
            // Ignore exception and continue, will assume that this hosted account doesn't exist 
            error_log($e->getMessage());
        }
    }
    
    public function createComplexDeployment($name, $slot = null, $deploymentName = null, $options = null)
    {
        $deploymentName = is_null($deploymentName) ? $name : $deploymentName;
        $label = base64_encode($deploymentName);
        $slot = is_null($slot) ? $this->defaultSlot : $slot;
        $packageUrl = TestResources::complexPackageUrl();
        $configuration = $this->encodedComplexConfiguration;
        
        if (!$this->hostedServiceExists($name)) {
            $this->createHostedService($name);
        } else {
            if (!in_array($name, $this->createdHostedServices)) {
                $this->createdHostedServices[] = $name;
            }
        }
        
        $result = $this->restProxy->createDeployment(
            $name,
            $deploymentName,
            $slot,
            $packageUrl,
            $configuration,
            $label,
            $options
        );
        $this->blockUntilAsyncSucceed($result);
        
        $this->createdDeployments[] = $name;
    }
    
    public function waitUntilDeploymentReachStatus($name, $status)
    {
        $options = new GetDeploymentOptions();
        $options->setSlot($this->defaultSlot);
        $currentStatus = null;
        
        do {
            $result = $this->restProxy->getDeployment($name, $options);
            $deployment = $result->getDeployment(); 
            $currentStatus = $deployment->getStatus();
        } while($currentStatus != $status);
    }
    
    public function waitUntilRollbackIsAllowed($name)
    {
        $options = new GetDeploymentOptions();
        $options->setSlot($this->defaultSlot);
        
        do {
            $result = $this->restProxy->getDeployment($name, $options);
            $deployment = $result->getDeployment(); 
            $rollbackAllowed = $deployment->getRollbackAllowed();
        } while(!$rollbackAllowed);
    }
    
    public function waitUntilRoleInstanceReachStatus($name, $state, $roleInstanceName)
    {
        $options = new GetDeploymentOptions();
        $options->setSlot($this->defaultSlot);
        $currentStatus = null;
        
        do {
            $result = $this->restProxy->getDeployment($name, $options);
            $deployment = $result->getDeployment(); 
            $roleInstanceList = $deployment->getRoleInstanceList();
            
            foreach ($roleInstanceList as $roleInstance) {
                if  ($roleInstance->getInstanceName() == $roleInstanceName) {
                    $currentStatus = $roleInstance->getInstanceStatus();
                    break;
                }
            }
        } while($currentStatus != $state);
    }
    
    public function createDeployment($name, $slot = null, $deploymentName = null, $options = null)
    {
        $deploymentName = is_null($deploymentName) ? $name : $deploymentName;
        $label = base64_encode($deploymentName);
        $slot = is_null($slot) ? $this->defaultSlot : $slot;
        $packageUrl = TestResources::simplePackageUrl();
        $configuration = $this->defaultDeploymentEncodedConfiguration;
        
        if (!$this->hostedServiceExists($name)) {
            $this->createHostedService($name);
        } else {
            if (!in_array($name, $this->createdHostedServices)) {
                $this->createdHostedServices[] = $name;
            }
        }
        
        $result = $this->restProxy->createDeployment(
            $name,
            $deploymentName,
            $slot,
            $packageUrl,
            $configuration,
            $label,
            $options
        );
        $this->blockUntilAsyncSucceed($result);
        
        $this->createdDeployments[] = $name;
    }
    
    public function deploymentExists($name)
    {
        try {
            $options = new GetDeploymentOptions();
            $options->setSlot($this->defaultSlot);
            $result = $this->restProxy->getDeployment($name, $options);
            
            if ($result->getDeployment()->getName() === $name) {
                return true;
            }
            
            return false;
            
        } catch (\Exception $e) {
            return false;
        }
    }
    
    public function deleteDeployment($name, $slot = null)
    {
        $options = new GetDeploymentOptions();
        $options->setSlot(is_null($slot) ? $this->defaultSlot : $slot);
        $result = $this->restProxy->deleteDeployment($name, $options);
        $this->blockUntilAsyncSucceed($result);
    }
    
    public function safeDeleteDeployment($name)
    {
        try
        {
            $this->deleteDeployment($name);
        }
        catch (\Exception $e)
        {
            // Ignore exception and continue, will assume that this hosted account doesn't exist 
            error_log($e->getMessage());
        }
    }

    protected function tearDown()
    {
        parent::tearDown();
        
        foreach ($this->createdStorageServices as $value) {
            $this->safeDeleteStorageService($value);
        }
        
        foreach ($this->createdAffinityGroups as $value) {
            $this->safeDeleteAffinityGroup($value);
        }
        
        foreach ($this->createdDeployments as $value) {
            $this->safeDeleteDeployment($value, $this->defaultSlot);
            $this->safeDeleteHostedService($value);
        }
        
        foreach ($this->createdHostedServices as $value) {
            $this->safeDeleteHostedService($value);
        }
    }
    
    protected function assertGeneralDeploymentInformation($deployment, $name, $slot, $roleCount)
    {
        $this->assertNotNull($deployment);
        $this->assertNotNull($deployment->getPrivateId());
        $this->assertNotNull($deployment->getConfiguration());
        $this->assertNotNull($deployment->getUrl());
        $this->assertEquals($name, $deployment->getName());
        $this->assertEquals($slot, strtolower($deployment->getSlot()));
        $this->assertEquals('Suspended', $deployment->getStatus());
        $this->assertEquals(base64_encode($name), $deployment->getLabel());
        $this->assertEquals($roleCount, $deployment->getUpgradeDomainCount());
        $this->assertEquals('1.6.21103.1459', $deployment->getSdkVersion());
        $this->assertEquals(false, $deployment->getLocked());
        $this->assertEquals(false, $deployment->getRollbackAllowed());
        $this->assertInstanceOf('WindowsAzure\ServiceManagement\Models\UpgradeStatus', $deployment->getUpgradeStatus());
        $this->assertInternalType('array', $deployment->getRoleInstanceList());
        $this->assertInternalType('array', $deployment->getRoleList());
        $this->assertInternalType('array', $deployment->getInputEndpointList());
        
        // Assert the deployment upgrade status
        $this->assertEquals(0, $deployment->getUpgradeStatus()->getCurrentUpgradeDomain());
        $this->assertNull($deployment->getUpgradeStatus()->getUpgradeType());
        $this->assertNull($deployment->getUpgradeStatus()->getCurrentUpgradeDomainState());
    }
    
    protected function assertSuspendedDeploymentWithMultipleRoles(
        $deployment,
        $name,
        $slot,
        $webCount,
        $workerCount,
        $instancesCount,
        $inputEndpointCount
    ) {
        $this->assertGeneralDeploymentInformation($deployment, $name, $slot, $webCount + $workerCount);
        
        // Assert the deployment role instance list
        $roleInstanceList = $deployment->getRoleInstanceList();
        $this->assertCount($instancesCount, $roleInstanceList);
        
        // Assert the deployment role list
        $roleList = $deployment->getRoleList();
        $this->assertCount($webCount + $workerCount, $roleList);
        
        // Assert the deployment input endpoint list
        $inputEndpointList = $deployment->getInputEndpointList();
        $this->assertCount($inputEndpointCount, $inputEndpointList);
    }

    protected function assertSuspendedDeploymentWithOneRole(
        $deployment,
        $name,
        $slot,
        $roleName,
        $roleInstanceName
    ) {
        $this->assertGeneralDeploymentInformation($deployment, $name, $slot, 1);
        
        // Assert the deployment role instance list
        $roleInstanceList = $deployment->getRoleInstanceList();
        $this->assertCount(1, $roleInstanceList);
        $roleInstance = $roleInstanceList[0];
        $this->assertInstanceOf('WindowsAzure\ServiceManagement\Models\RoleInstance', $roleInstance);
        $this->assertEquals($roleName, $roleInstance->getRoleName());
        $this->assertEquals($roleInstanceName, $roleInstance->getInstanceName());
        $this->assertEquals('StoppedVM', $roleInstance->getInstanceStatus());
        $this->assertEquals('Small', $roleInstance->getInstanceSize());
        $this->assertEmpty($roleInstance->getInstanceStateDetails());
        $this->assertNull($roleInstance->getInstanceErrorCode());
        $this->assertEquals(0, $roleInstance->getInstanceUpgradeDomain());
        $this->assertEquals(0, $roleInstance->getInstanceFaultDomain());
        
        // Assert the deployment role list
        $roleList = $deployment->getRoleList();
        $this->assertCount(1, $roleList);
        $role = $roleList[0];
        $this->assertInstanceOf('WindowsAzure\ServiceManagement\Models\Role', $role);
        $this->assertEquals($roleName, $role->getRoleName());
        $this->assertNotNull($role->getOsVersion());
        
        // Assert the deployment input endpoint list
        $inputEndpointList = $deployment->getInputEndpointList();
        $this->assertCount(1, $inputEndpointList);
        $inputEndpoint1 = $inputEndpointList[0];
        $this->assertInstanceOf('WindowsAzure\ServiceManagement\Models\InputEndpoint', $inputEndpoint1);
        $this->assertEquals($roleName, $inputEndpoint1->getRoleName());
        $this->assertEquals('80', $inputEndpoint1->getPort());
        $this->assertNotNull($inputEndpoint1->getVip());
    }
}