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
use WindowsAzure\Common\Internal\Resources;
use WindowsAzure\ServiceManagement\Models\CreateStorageServiceOptions;
use WindowsAzure\ServiceManagement\Models\OperationStatus;
use WindowsAzure\ServiceManagement\Models\Locations;

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
    protected $createdAffinityGroups;
    protected $affinityGroupCount;
    
    public function setUp()
    {
        parent::setUp();
        $serviceManagementRestProxy = $this->builder->createServiceManagementService(TestResources::getServiceManagementConnectionString());
        parent::setProxy($serviceManagementRestProxy);
        
        $this->createdStorageServices = array();
        $this->createdAffinityGroups = array();
        $this->affinityGroupCount = count($this->restProxy->listAffinityGroups()->getAffinityGroups());
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
        $options = new CreateStorageServiceOptions();
        $options->setLocation('West US');
        
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
        }while(OperationStatus::IN_PROGRESS == $status);
        
        $this->assertEquals(OperationStatus::SUCCEEDED, $status);
    }
    
    public function storageServiceExists($name)
    {
        $result = $this->restProxy->listStorageServices();
        $storageServices = $result->getStorageServices();
        
        foreach ($storageServices as $storageService) {
            if ($storageService->getServiceName() == $name) {
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

    protected function tearDown()
    {
        parent::tearDown();
        
        foreach ($this->createdStorageServices as $value) {
            $this->safeDeleteStorageService($value);
        }
        
        foreach ($this->createdAffinityGroups as $value) {
            $this->safeDeleteAffinityGroup($value);
        }
    }
}


