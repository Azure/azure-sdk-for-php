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
        $this->blockUntilAsyncSucceed($result->getRequestId());
        $this->createdStorageServices[] = $name;
    }
    
    protected function blockUntilAsyncSucceed($requestId)
    {
        $status = null;
        
        do {
            sleep(5);
            $result = $this->restProxy->getOperationStatus($requestId);
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
    
    public function createDeployment($name, $options = null)
    {
        $label = base64_encode($name);
        $deploymentName = $name;
        $slot = $this->defaultSlot;
        $packageUrl = TestResources::simplePackageUrl();
        $configuration = $this->defaultDeploymentEncodedConfiguration;
        
        $this->createHostedService($name);
        $result = $this->restProxy->createDeployment(
            $name,
            $deploymentName,
            $slot,
            $packageUrl,
            $configuration,
            $label,
            $options
        );
        $this->blockUntilAsyncSucceed($result->getRequestId());
        
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
    
    public function deleteDeployment($name)
    {
        $options = new GetDeploymentOptions();
        $options->setSlot($this->defaultSlot);
        $result = $this->restProxy->deleteDeployment($name, $options);
        $this->blockUntilAsyncSucceed($result->getRequestId());
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
}