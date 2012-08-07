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
 * @package   Tests\Unit\WindowsAzure\ServiceManagement
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */

namespace Tests\Unit\WindowsAzure\ServiceManagement;
use Tests\Framework\ServiceManagementRestProxyTestBase;
use Tests\Framework\TestResources;
use WindowsAzure\Common\Internal\Resources;
use WindowsAzure\Common\Internal\Http\HttpClient;
use WindowsAzure\Common\Internal\Serialization\XmlSerializer;
use WindowsAzure\ServiceManagement\ServiceManagementRestProxy;
use WindowsAzure\ServiceManagement\Models\Locations;
use WindowsAzure\ServiceManagement\Models\CreateServiceOptions;
use WindowsAzure\ServiceManagement\Models\UpdateServiceOptions;
use WindowsAzure\ServiceManagement\Models\KeyType;
use WindowsAzure\ServiceManagement\Models\GetDeploymentOptions;
use WindowsAzure\ServiceManagement\Models\GetHostedServicePropertiesOptions;
use WindowsAzure\ServiceManagement\Models\DeploymentSlot;

/**
 * Unit tests for class ServiceManagementRestProxy
 *
 * @category  Microsoft
 * @package   Tests\Unit\WindowsAzure\ServiceManagement
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
class ServiceManagementRestProxyTest extends ServiceManagementRestProxyTestBase
{
    private $_storageServiceName = 'createstorageservice';
    
    /**
     * @covers WindowsAzure\ServiceManagement\ServiceManagementRestProxy::__construct
     */
    public function test__construct()
    {
        // Setup
        $channel = new HttpClient();
        $subscriptionId = '1234567-4323232';
        $dataSerializer = new XmlSerializer();
        
        // Test
        $actual = new ServiceManagementRestProxy(
            $channel,
            $subscriptionId,
            Resources::SERVICE_MANAGEMENT_URL,
            $dataSerializer
        );
        
        // Assert
        $this->assertNotNull($actual);
        $this->assertEquals(Resources::SERVICE_MANAGEMENT_URL, $actual->getUri());
    }
    
    /**
     * This test makes sure that the list of location constants in the SDK are 
     * consistant with what is used by Windows Azure.
     * 
     * @covers WindowsAzure\ServiceManagement\Models\Locations
     */
    public function testLocations()
    {
        // Setup
        $locations = array(
            Locations::ANYWHERE_ASIA,
            Locations::ANYWHERE_EUROPE,
            Locations::ANYWHERE_US,
            Locations::EAST_ASIA,
            Locations::WEST_US,
            Locations::EAST_US,
            Locations::NORTH_CENTRAL_US,
            Locations::NORTH_EUROPE,
            Locations::SOUTHEAST_ASIA,
            Locations::SOUTH_CENTRAL_US,
            Locations::WEST_EUROPE
        );
        
        // Test
        try {
            $actual = $this->restProxy->listLocations();
        } catch (\HTTP_Request2_MessageException $e) {
            $msg  = 'The test is skipped because Windows Azure replied with corrupted response.';
            $msg .= 'This doesn\'t happen frequently but when it does happen the test is skipped';
            $this->markTestSkipped($msg);
        }
        
        // Assert
        $windowsAzureLocations = $actual->getLocations();
        $this->assertCount(count($locations), $windowsAzureLocations);
        foreach ($locations as $value) {
            $exists = false;
            foreach ($windowsAzureLocations as $location) {
                if ($value == $location->getName()) {
                    $exists = true;
                    break;
                }
            }
            $this->assertTrue($exists);
        }
    }
    
    /**
     * @covers WindowsAzure\ServiceManagement\ServiceManagementRestProxy::createAffinityGroup
     * @covers WindowsAzure\ServiceManagement\ServiceManagementRestProxy::_getAffinityGroupPath
     * @covers WindowsAzure\ServiceManagement\ServiceManagementRestProxy::_getPath
     * @group AffinityGroup
     */
    public function testCreateAffinityGroup()
    {
        // Setup
        $name  = 'createaffinitygroup';
        $label = base64_encode($name);
        $location = Locations::WEST_US;
        
        // Test
        $this->restProxy->createAffinityGroup($name, $label, $location);
        
        // Assert
        $this->assertTrue($this->affinityGroupExists($name));
        $this->createdAffinityGroups[] = $name;
    }
    
    /**
     * @covers WindowsAzure\ServiceManagement\ServiceManagementRestProxy::deleteAffinityGroup
     * @covers WindowsAzure\ServiceManagement\ServiceManagementRestProxy::_getAffinityGroupPath
     * @covers WindowsAzure\ServiceManagement\ServiceManagementRestProxy::_getPath
     * @group AffinityGroup
     */
    public function testDeleteAffinityGroup()
    {
        // Setup
        $name = 'deleteaffinitygroup';
        $label = base64_encode($name);
        $location = Locations::WEST_US;
        $this->restProxy->createAffinityGroup($name, $label, $location);
        
        // Test
        $this->restProxy->deleteAffinityGroup($name);
        
        // Assert
        $this->assertFalse($this->affinityGroupExists($name));
    }
    
    /**
     * @covers WindowsAzure\ServiceManagement\ServiceManagementRestProxy::listAffinityGroups 
     * @covers WindowsAzure\ServiceManagement\Models\ListAffinityGroupsResult::create
     * @covers WindowsAzure\ServiceManagement\ServiceManagementRestProxy::_getAffinityGroupPath
     * @covers WindowsAzure\ServiceManagement\ServiceManagementRestProxy::_getPath
     * @group AffinityGroup
     */
    public function testListAffinityGroupsWithEmpty()
    {
        // Setup
        $currentCount = count($this->restProxy->listAffinityGroups()->getAffinityGroups());
        $expectedCount = 0 + $currentCount;
        
        // Test
        $result = $this->restProxy->listAffinityGroups();
        
        // Assert
        $affinityGroups = $result->getAffinityGroups();
        $this->assertCount($expectedCount, $affinityGroups);
    }
    
    /**
     * @covers WindowsAzure\ServiceManagement\ServiceManagementRestProxy::listAffinityGroups 
     * @covers WindowsAzure\ServiceManagement\Models\ListAffinityGroupsResult::create
     * @covers WindowsAzure\ServiceManagement\ServiceManagementRestProxy::_getAffinityGroupPath
     * @covers WindowsAzure\ServiceManagement\ServiceManagementRestProxy::_getPath
     * @group AffinityGroup
     */
    public function testListAffinityGroupsWithOneEntry()
    {
        // Setup
        $name = 'listaffinitygroupwithoneentry';
        $currentCount = count($this->restProxy->listAffinityGroups()->getAffinityGroups());
        $expectedCount = 1 + $currentCount;
        $this->createAffinityGroup($name);
        
        // Test
        $result = $this->restProxy->listAffinityGroups();
        
        // Assert
        $affinityGroups = $result->getAffinityGroups();
        $this->assertCount($expectedCount, $affinityGroups);
    }
    
    /**
     * @covers WindowsAzure\ServiceManagement\ServiceManagementRestProxy::listAffinityGroups 
     * @covers WindowsAzure\ServiceManagement\Models\ListAffinityGroupsResult::create
     * @covers WindowsAzure\ServiceManagement\ServiceManagementRestProxy::_getAffinityGroupPath
     * @covers WindowsAzure\ServiceManagement\ServiceManagementRestProxy::_getPath
     * @group AffinityGroup
     */
    public function testListAffinityGroupsWithMultipleEntries()
    {
        // Setup
        $name1 = 'listaffinitygroupwithmultipleentries1';
        $name2 = 'listaffinitygroupwithmultipleentries2';
        $currentCount = count($this->restProxy->listAffinityGroups()->getAffinityGroups());
        $expectedCount = 2 + $currentCount;
        $this->createAffinityGroup($name1);
        $this->createAffinityGroup($name2);
        
        // Test
        $result = $this->restProxy->listAffinityGroups();
        
        // Assert
        $affinityGroups = $result->getAffinityGroups();
        $this->assertCount($expectedCount, $affinityGroups);
    }
    
    /**
     * @covers WindowsAzure\ServiceManagement\ServiceManagementRestProxy::updateAffinityGroup
     * @covers WindowsAzure\ServiceManagement\ServiceManagementRestProxy::_getAffinityGroupPath
     * @covers WindowsAzure\ServiceManagement\ServiceManagementRestProxy::_getPath
     * @group AffinityGroup
     */
    public function testUpdateAffinityGroup()
    {
        // Setup
        $name  = 'updateaffinitygroup';
        $label = base64_encode($name);
        $location = Locations::WEST_US;
        $expectedLabel = base64_encode('newlabel');
        $this->createAffinityGroup($name, $label, $location);
        
        // Test
        $this->restProxy->updateAffinityGroup($name, $expectedLabel);
        
        // Assert
        $affinityGroup = $this->getAffinityGroup($name);
        $this->assertEquals($expectedLabel, $affinityGroup->getLabel());
    }
    
    /**
     * @covers WindowsAzure\ServiceManagement\ServiceManagementRestProxy::getAffinityGroupProperties
     * @covers WindowsAzure\ServiceManagement\Models\GetAffinityGroupPropertiesResult::create
     * @covers WindowsAzure\ServiceManagement\ServiceManagementRestProxy::_getAffinityGroupPath
     * @covers WindowsAzure\ServiceManagement\ServiceManagementRestProxy::_getPath
     * @group AffinityGroup
     */
    public function testGetAffinityGroupProperties()
    {
        // Setup
        $name = 'getaffinitygroupproperties';
        $this->createAffinityGroup($name);
        
        // Test
        $result = $this->restProxy->getAffinityGroupProperties($name);
        
        // Assert
        $expected = $this->getAffinityGroup($name);
        $this->assertEquals($expected->getLabel(), $result->getAffinityGroup()->getLabel());
        $this->assertEquals($expected->getLocation(), $result->getAffinityGroup()->getLocation());
        $this->assertEquals($expected->getDescription(), $result->getAffinityGroup()->getDescription());
    }
    
    /**
     * @covers WindowsAzure\ServiceManagement\ServiceManagementRestProxy::listLocations
     * @covers WindowsAzure\ServiceManagement\Models\ListLocationsResult::create
     * @covers WindowsAzure\ServiceManagement\ServiceManagementRestProxy::_getLocationPath
     * @covers WindowsAzure\ServiceManagement\ServiceManagementRestProxy::_getPath
     * @group AffinityGroup
     */
    public function testListLocations()
    {
        // Test
        $result = $this->restProxy->listLocations();
        
        // Assert
        $locations = $result->getLocations();
        $this->assertCount(Locations::COUNT, $locations);
    }

    /**
     * @covers WindowsAzure\ServiceManagement\ServiceManagementRestProxy::createStorageService
     * @covers WindowsAzure\ServiceManagement\ServiceManagementRestProxy::getOperationStatus
     * @covers WindowsAzure\ServiceManagement\ServiceManagementRestProxy::_getOperationPath
     * @covers WindowsAzure\ServiceManagement\ServiceManagementRestProxy::_getStorageServicePath
     * @covers WindowsAzure\ServiceManagement\ServiceManagementRestProxy::_getPath
     * @covers WindowsAzure\ServiceManagement\Models\GetOperationStatusResult::create
     * @covers WindowsAzure\ServiceManagement\Models\StorageService::toArray
     * @covers WindowsAzure\ServiceManagement\Internal\WindowsAzureService::toArray
     * @group StorageService
     */
    public function testCreateStorageService()
    {
        // Setup
        $name = $this->_storageServiceName;
        $label = base64_encode($name);
        $options = new CreateServiceOptions();
        $options->setLocation('West US');
        
        // Count the storage services before creating new one.
        $storageCount = count($this->restProxy->listStorageServices()->getStorageServices());
        
        // Test
        $result = $this->restProxy->createStorageService($name, $label, $options);
        $this->blockUntilAsyncSucceed($result);
        
        // Assert
        $this->assertTrue($this->storageServiceExists($name));
        
        return $storageCount;
    }
    
    /**
     * @covers WindowsAzure\ServiceManagement\ServiceManagementRestProxy::listStorageServices
     * @covers WindowsAzure\ServiceManagement\Models\ListStorageServicesResult::create
     * @covers WindowsAzure\ServiceManagement\ServiceManagementRestProxy::_getStorageServicePath
     * @covers WindowsAzure\ServiceManagement\ServiceManagementRestProxy::_getPath
     * @depends testCreateStorageService
     * @group StorageService
     */
    public function testListStorageServices($storageCount)
    {
        // Setup
        $expected = 1;
        
         // Test
        $result = $this->restProxy->listStorageServices();
        
        // Assert
        $this->assertCount($expected + $storageCount, $result->getStorageServices());
    }
    
    /**
     * @covers WindowsAzure\ServiceManagement\ServiceManagementRestProxy::updateStorageService
     * @covers WindowsAzure\ServiceManagement\ServiceManagementRestProxy::_getStorageServicePath
     * @covers WindowsAzure\ServiceManagement\ServiceManagementRestProxy::_getPath
     * @depends testListStorageServices
     * @group StorageService
     */
    public function testUpdateStorageService()
    {
        // Setup
        $name = $this->_storageServiceName;
        $options = new UpdateServiceOptions();
        $expectedDesc = 'My description';
        $expectedLabel = base64_encode('new label');
        $options->setDescription($expectedDesc);
        $options->setLabel($expectedLabel);
        
        // Test
        $this->restProxy->updateStorageService($name, $options);
        
        // Assert
        $result = $this->restProxy->getStorageServiceProperties($name);
        $this->assertEquals($expectedDesc, $result->getStorageService()->getDescription());
        $this->assertEquals($expectedLabel, $result->getStorageService()->getLabel());
    }
    
    /**
     * @covers WindowsAzure\ServiceManagement\ServiceManagementRestProxy::getStorageServiceProperties
     * @covers WindowsAzure\ServiceManagement\ServiceManagementRestProxy::_getStorageServicePath
     * @covers WindowsAzure\ServiceManagement\ServiceManagementRestProxy::_getPath
     * @covers WindowsAzure\ServiceManagement\Models\GetStorageServicePropertiesResult::create
     * @depends testUpdateStorageService
     * @group StorageService
     */
    public function testGetStorageServiceProperties()
    {
        // Setup
        $name = $this->_storageServiceName;
        
        // Test
        $result = $this->restProxy->getStorageServiceProperties($name);
        
        // Assert
        $this->assertEquals($name, $result->getStorageService()->getName());
        $this->assertNotNull($result->getStorageService()->getUrl());
        $this->assertNotNull($result->getStorageService()->getLabel());
    }
    
    /**
     * @covers WindowsAzure\ServiceManagement\ServiceManagementRestProxy::getStorageServiceKeys
     * @covers WindowsAzure\ServiceManagement\ServiceManagementRestProxy::_getPath
     * @covers WindowsAzure\ServiceManagement\ServiceManagementRestProxy::_getStorageServiceKeysPath
     * @covers WindowsAzure\ServiceManagement\Models\GetStorageServiceKeysResult::create
     * @depends testGetStorageServiceProperties
     * @group StorageService
     * @group StorageService
     */
    public function testGetStorageServiceKeys()
    {
        // Setup
        $name = $this->_storageServiceName;
        
        // Test
        $result = $this->restProxy->getStorageServiceKeys($name);
        
        // Assert
        $this->assertNotNull($result->getUrl());
        $this->assertNotNull($result->getPrimary());
        $this->assertNotNull($result->getSecondary());
    }
    
    /**
     * @covers WindowsAzure\ServiceManagement\ServiceManagementRestProxy::regenerateStorageServiceKeys
     * @covers WindowsAzure\ServiceManagement\ServiceManagementRestProxy::_getPath
     * @covers WindowsAzure\ServiceManagement\ServiceManagementRestProxy::_getStorageServiceKeysPath
     * @covers WindowsAzure\ServiceManagement\Models\GetStorageServiceKeysResult::create
     * @depends testGetStorageServiceKeys
     * @group StorageService
     */
    public function testRegenerateStorageServiceKeys()
    {
        // Setup
        $name = $this->_storageServiceName;
        $old = $this->restProxy->getStorageServiceKeys($name);
        
        // Test
        $new = $this->restProxy->regenerateStorageServiceKeys($name, KeyType::PRIMARY_KEY);
        
        // Assert
        $this->assertNotEquals($old->getPrimary(), $new->getPrimary());
        $this->assertEquals($old->getSecondary(), $new->getSecondary());
    }
    
    /**
     * @covers WindowsAzure\ServiceManagement\ServiceManagementRestProxy::deleteStorageService
     * @covers WindowsAzure\ServiceManagement\ServiceManagementRestProxy::_getStorageServicePath
     * @covers WindowsAzure\ServiceManagement\ServiceManagementRestProxy::_getPath
     * @depends testRegenerateStorageServiceKeys
     */
    public function testDeleteStorageService()
    {
        // From build time perspective, this method must be called as the last unit
        // test (by specifying @depends) because all other unit tests use the storage 
        // account this method deletes.
        
        // Setup
        $name = $this->_storageServiceName;
        
         // Test
        $this->restProxy->deleteStorageService($name);
        
        // Assert
        $this->assertFalse($this->storageServiceExists($name));
    }
    
    /**
     * @covers WindowsAzure\ServiceManagement\ServiceManagementRestProxy::listHostedServices
     * @covers WindowsAzure\ServiceManagement\ServiceManagementRestProxy::_getHostedServicePath
     * @covers WindowsAzure\ServiceManagement\ServiceManagementRestProxy::_getPath
     * @covers WindowsAzure\ServiceManagement\Models\ListHostedServicesResult::create
     * @group HostedService
     */
    public function testListHostedServicesEmpty()
    {
        // Setup
        $currentCount = count($this->restProxy->listHostedServices()->getHostedServices());
        $expectedCount = $currentCount;
        
         // Test
        $result = $this->restProxy->listHostedServices();
        
        // Assert
        $this->assertCount($expectedCount, $result->getHostedServices());
    }
    
    /**
     * @covers WindowsAzure\ServiceManagement\ServiceManagementRestProxy::listHostedServices
     * @covers WindowsAzure\ServiceManagement\ServiceManagementRestProxy::_getHostedServicePath
     * @covers WindowsAzure\ServiceManagement\ServiceManagementRestProxy::_getPath
     * @covers WindowsAzure\ServiceManagement\Models\ListHostedServicesResult::create
     * @group HostedService
     */
    public function testListHostedServicesOne()
    {
        // Setup
        $currentCount = count($this->restProxy->listHostedServices()->getHostedServices());
        $name = 'testlisthostedservicesone';
        $this->createHostedService($name);
        $expectedCount = $currentCount + 1;
        
         // Test
        $result = $this->restProxy->listHostedServices();
        
        // Assert
        $actual = $result->getHostedServices();
        $this->assertCount($expectedCount, $actual);
        
        $serviceExists = false;
        foreach ($actual as $hostedService) {
            if ($hostedService->getName() === $name) {
                $serviceExists = true;
            }
        }
        $this->assertTrue($serviceExists);
    }
    
    /**
     * @covers WindowsAzure\ServiceManagement\ServiceManagementRestProxy::listHostedServices
     * @covers WindowsAzure\ServiceManagement\ServiceManagementRestProxy::_getHostedServicePath
     * @covers WindowsAzure\ServiceManagement\ServiceManagementRestProxy::_getPath
     * @covers WindowsAzure\ServiceManagement\Models\ListHostedServicesResult::create
     * @group HostedService
     */
    public function testListHostedServicesMultiple()
    {
        // Setup
        $currentCount = count($this->restProxy->listHostedServices()->getHostedServices());
        $name1 = 'testlisthostedservicesmultiple1';
        $name2 = 'testlisthostedservicesmultiple2';
        $name3 = 'testlisthostedservicesmultiple3';
        $this->createHostedService($name1);
        $this->createHostedService($name2);
        $this->createHostedService($name3);
        $expectedCount = $currentCount + 3;
        
         // Test
        $result = $this->restProxy->listHostedServices();
        
        // Assert
        $actual = $result->getHostedServices();
        $this->assertCount($expectedCount, $actual);
        
        $service1Exists = false;
        $service2Exists = false;
        $service3Exists = false;
        foreach ($actual as $hostedService) {
            if ($hostedService->getName() === $name1) {
                $service1Exists = true;
            } else if ($hostedService->getName() === $name2) {
                $service2Exists = true;
            } else if ($hostedService->getName() === $name3) {
                $service3Exists = true;
            }
        }
        $this->assertTrue($service1Exists);
        $this->assertTrue($service2Exists);
        $this->assertTrue($service3Exists);
    }
    
    /**
     * @covers WindowsAzure\ServiceManagement\ServiceManagementRestProxy::deleteHostedService
     * @covers WindowsAzure\ServiceManagement\ServiceManagementRestProxy::_getHostedServicePath
     * @covers WindowsAzure\ServiceManagement\ServiceManagementRestProxy::_getPath
     * @group HostedService
     */
    public function testDeleteHostedService()
    {
        // Setup
        $name = 'testdeletehostedservice';
        $this->createHostedService($name);
        
         // Test
        $this->restProxy->deleteHostedService($name);
        
        // Assert
        $this->assertFalse($this->hostedServiceExists($name));
    }
    
    /**
     * @covers WindowsAzure\ServiceManagement\ServiceManagementRestProxy::createHostedService
     * @covers WindowsAzure\ServiceManagement\ServiceManagementRestProxy::getOperationStatus
     * @covers WindowsAzure\ServiceManagement\ServiceManagementRestProxy::_getOperationPath
     * @covers WindowsAzure\ServiceManagement\ServiceManagementRestProxy::_getHostedServicePath
     * @covers WindowsAzure\ServiceManagement\ServiceManagementRestProxy::_getPath
     * @covers WindowsAzure\ServiceManagement\Models\GetOperationStatusResult::create
     * @covers WindowsAzure\ServiceManagement\Models\HostedService::toArray
     * @covers WindowsAzure\ServiceManagement\Internal\WindowsAzureService::toArray
     * @group HostedService
     */
    public function testCreateHostedService()
    {
        // Setup
        $name = 'testcreatehostedservice';
        $label = base64_encode($name);
        $options = new CreateServiceOptions();
        $options->setLocation('West US');
        $options->setDescription('I am description');
        
        // Test
        $this->restProxy->createHostedService($name, $label, $options);
        $this->createdHostedServices[] = $name;
        
        // Assert
        $this->assertTrue($this->hostedServiceExists($name));
    }
    
    /**
     * @covers WindowsAzure\ServiceManagement\ServiceManagementRestProxy::updateHostedService
     * @covers WindowsAzure\ServiceManagement\ServiceManagementRestProxy::_getHostedServicePath
     * @covers WindowsAzure\ServiceManagement\ServiceManagementRestProxy::_getPath
     * @group HostedService
     */
    public function testUpdateHostedService()
    {
        // Setup
        $name = 'testupdatehostedservice';
        $this->createHostedService($name);
        $options = new UpdateServiceOptions();
        $expectedDesc = 'My description';
        $expectedLabel = base64_encode('new label');
        $options->setDescription($expectedDesc);
        $options->setLabel($expectedLabel);
        
        // Test
        $this->restProxy->updateHostedService($name, $options);
        
        // Assert
        $result = $this->restProxy->getHostedServiceProperties($name);
        $this->assertEquals($expectedDesc, $result->getHostedService()->getDescription());
        $this->assertEquals($expectedLabel, $result->getHostedService()->getLabel());
    }
    
    /**
     * @covers WindowsAzure\ServiceManagement\ServiceManagementRestProxy::getHostedServiceProperties
     * @covers WindowsAzure\ServiceManagement\ServiceManagementRestProxy::_getHostedServicePath
     * @covers WindowsAzure\ServiceManagement\ServiceManagementRestProxy::_getPath
     * @covers WindowsAzure\ServiceManagement\Models\GetHostedServicePropertiesResult::create
     * @group HostedService
     */
    public function testGetHostedServiceProperties()
    {
        // Setup
        $name = 'testGetHostedServiceProperties';
        $this->createHostedService($name);
        
        // Test
        $result = $this->restProxy->getHostedServiceProperties($name);
        
        // Assert
        $this->assertEquals($name, $result->getHostedService()->getName());
        $this->assertEquals($this->defaultLocation, $result->getHostedService()->getLocation());
        $this->assertEquals(base64_encode($name), $result->getHostedService()->getLabel());
    }
    
    /**
     * @covers WindowsAzure\ServiceManagement\ServiceManagementRestProxy::getHostedServiceProperties
     * @covers WindowsAzure\ServiceManagement\ServiceManagementRestProxy::_getHostedServicePath
     * @covers WindowsAzure\ServiceManagement\ServiceManagementRestProxy::_getPath
     * @covers WindowsAzure\ServiceManagement\Models\GetHostedServicePropertiesResult::create
     * @group HostedService
     */
    public function testGetHostedServicePropertiesWithEmbed()
    {
        // Setup
        $name = 'testgethostedservicepropertieswithembed';
        $stagingName = $name . 'staging';
        $options = new GetHostedServicePropertiesOptions();
        $options->setEmbedDetail(true);
        $this->createDeployment($name);
        $this->createDeployment($name, DeploymentSlot::STAGING, $stagingName);
        
        // Test
        $result = $this->restProxy->getHostedServiceProperties($name, $options);
        
        // Need to delete the staging deployment manually
        $this->deleteDeployment($name, DeploymentSlot::STAGING);
        
        // Assert
        $this->assertEquals($name, $result->getHostedService()->getName());
        $this->assertEquals($this->defaultLocation, $result->getHostedService()->getLocation());
        $this->assertEquals(base64_encode($name), $result->getHostedService()->getLabel());
        $this->assertCount(2, $result->getHostedService()->getDeployments());
        $deployments = $result->getHostedService()->getDeployments();
        $deployment1 = $deployments[0];
        $deployment2 = $deployments[1];
        
        // First deployment
        $this->assertSuspendedDeploymentWithOneRole(
            $deployment1,
            $name,
            DeploymentSlot::PRODUCTION,
            'WebRole1',
            'WebRole1_IN_0'
        );
        
        // Second deployment
        $this->assertSuspendedDeploymentWithOneRole(
            $deployment2,
            $stagingName,
            DeploymentSlot::STAGING,
            'WebRole1',
            'WebRole1_IN_0'
        );
    }
    
    /**
     * @covers WindowsAzure\ServiceManagement\ServiceManagementRestProxy::createDeployment
     * @covers WindowsAzure\ServiceManagement\ServiceManagementRestProxy::_getDeploymentPathUsingSlot
     * @covers WindowsAzure\ServiceManagement\ServiceManagementRestProxy::_getPath
     * @covers WindowsAzure\ServiceManagement\ServiceManagementRestProxy::_createRequestXml
     * @group Deployment
     */
    public function testCreateDeployment()
    {
        // Setup
        $name = 'testcreatedeployment';
        
        // Test
        $this->createDeployment($name);
        
        // Assert
        $this->assertTrue($this->deploymentExists($name));
    }
    
    /**
     * @covers WindowsAzure\ServiceManagement\ServiceManagementRestProxy::deleteDeployment
     * @covers WindowsAzure\ServiceManagement\ServiceManagementRestProxy::_getDeploymentPathUsingSlot
     * @covers WindowsAzure\ServiceManagement\ServiceManagementRestProxy::_getPath
     * @group Deployment
     */
    public function testDeleteDeploymentWithSlot()
    {
        // Setup
        $name = 'testdeletedeploymentwithslot';
        $label = base64_encode($name);
        $deploymentName = $name;
        $slot = $this->defaultSlot;
        $packageUrl = TestResources::simplePackageUrl();
        $configuration = $this->defaultDeploymentEncodedConfiguration;
        $this->createHostedService($name);
        $this->createdHostedServices[] = $name;
        $result = $this->restProxy->createDeployment(
            $name,
            $deploymentName,
            $slot,
            $packageUrl,
            $configuration,
            $label
        );
        $this->blockUntilAsyncSucceed($result);
        $options = new GetDeploymentOptions();
        $options->setSlot($slot);
        
        // Test
        $result = $this->restProxy->deleteDeployment($name, $options);
        $this->blockUntilAsyncSucceed($result);
        
        // Assert
        $this->assertFalse($this->deploymentExists($name));
        $this->assertNotNull($result);
    }
    
    /**
     * @covers WindowsAzure\ServiceManagement\ServiceManagementRestProxy::deleteDeployment
     * @covers WindowsAzure\ServiceManagement\ServiceManagementRestProxy::_getDeploymentPathUsingName
     * @covers WindowsAzure\ServiceManagement\ServiceManagementRestProxy::_getPath
     * @group Deployment
     */
    public function testDeleteDeploymentWithName()
    {
        // Setup
        $name = 'testdeletedeploymentwithname';
        $label = base64_encode($name);
        $deploymentName = $name;
        $slot = $this->defaultSlot;
        $packageUrl = TestResources::simplePackageUrl();
        $configuration = $this->defaultDeploymentEncodedConfiguration;
        $this->createHostedService($name);
        $this->createdHostedServices[] = $name;
        $result = $this->restProxy->createDeployment(
            $name,
            $deploymentName,
            $slot,
            $packageUrl,
            $configuration,
            $label
        );
        $this->blockUntilAsyncSucceed($result);
        $options = new GetDeploymentOptions();
        $options->setDeploymentName($name);
        
        // Test
        $result = $this->restProxy->deleteDeployment($name, $options);
        $this->blockUntilAsyncSucceed($result);
        
        // Assert
        $this->assertFalse($this->deploymentExists($name));
        $this->assertNotNull($result);
    }
    
    /**
     * @covers WindowsAzure\ServiceManagement\ServiceManagementRestProxy::getDeployment
     * @covers WindowsAzure\ServiceManagement\ServiceManagementRestProxy::_getDeploymentPathUsingName
     * @covers WindowsAzure\ServiceManagement\ServiceManagementRestProxy::_getPath
     * @covers WindowsAzure\ServiceManagement\Models\GetDeploymentResult::create
     * @covers WindowsAzure\ServiceManagement\Models\Deployment::create
     * @covers WindowsAzure\Common\Internal\Utilities::createList
     * @covers WindowsAzure\ServiceManagement\Models\UpgradeStatus::create
     * @covers WindowsAzure\ServiceManagement\Models\RoleInstance::create
     * @covers WindowsAzure\ServiceManagement\Models\Role::create
     * @covers WindowsAzure\ServiceManagement\Models\InputEndpoint::create
     * @group Deployment
     */
    public function testGetDeploymentWithOneRole()
    {
        // Setup
        $name = 'testgetdeployment';
        $this->createDeployment($name);
        $options = new GetDeploymentOptions();
        $options->setDeploymentName($name);
        
        // Test
        $result = $this->restProxy->getDeployment($name, $options);
        
        // Assert
        $this->assertNotNull($result);
        $this->assertSuspendedDeploymentWithOneRole(
            $result->getDeployment(),
            $name,
            $this->defaultSlot,
            'WebRole1',
            'WebRole1_IN_0'
        );
    }
    
    /**
     * @covers WindowsAzure\ServiceManagement\ServiceManagementRestProxy::getDeployment
     * @covers WindowsAzure\ServiceManagement\ServiceManagementRestProxy::_getDeploymentPathUsingSlot
     * @covers WindowsAzure\ServiceManagement\ServiceManagementRestProxy::_getPath
     * @covers WindowsAzure\ServiceManagement\Models\GetDeploymentResult::create
     * @covers WindowsAzure\ServiceManagement\Models\Deployment::create
     * @covers WindowsAzure\Common\Internal\Utilities::createList
     * @covers WindowsAzure\ServiceManagement\Models\UpgradeStatus::create
     * @covers WindowsAzure\ServiceManagement\Models\RoleInstance::create
     * @covers WindowsAzure\ServiceManagement\Models\Role::create
     * @covers WindowsAzure\ServiceManagement\Models\InputEndpoint::create
     * @group Deployment
     */
    public function testGetDeploymentWithMultipleRoles()
    {
        // Setup
        $name = 'testgetdeploymentwithmultipleroles';
        $label = base64_encode($name);
        $deploymentName = $name;
        $slot = $this->defaultSlot;
        $packageUrl = TestResources::complexPackageUrl();
        $configuration = $this->encodedComplexConfiguration;
        $this->createHostedService($name);
        $this->createdHostedServices[] = $name;
        $this->createdDeployments[] = $name;
        $result = $this->restProxy->createDeployment(
            $name,
            $deploymentName,
            $slot,
            $packageUrl,
            $configuration,
            $label
        );
        $this->blockUntilAsyncSucceed($result);
        $options = new GetDeploymentOptions();
        $options->setSlot($slot);
        $webCount = 1;
        $workerCount = 1;
        $instancesCount = 4;
        $inputEndpointCount = 1;
        
        // Test
        $result = $this->restProxy->getDeployment($name, $options);
        
        // Assert
        $this->assertNotNull($result);
        $this->assertSuspendedDeploymentWithMultipleRoles(
            $result->getDeployment(),
            $name,
            $slot,
            $webCount,
            $workerCount,
            $instancesCount,
            $inputEndpointCount
        );
    }
}