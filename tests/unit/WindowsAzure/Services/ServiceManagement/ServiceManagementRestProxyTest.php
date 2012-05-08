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
 * @package   Tests\Unit\WindowsAzure\Services\ServiceManagement
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */

namespace Tests\Unit\WindowsAzure\Services\ServiceManagement;
use Tests\Framework\ServiceManagementRestProxyTestBase;
use WindowsAzure\Core\Http\HttpClient;
use WindowsAzure\Core\Serialization\XmlSerializer;
use WindowsAzure\Services\ServiceManagement\ServiceManagementRestProxy;
use WindowsAzure\Services\ServiceManagement\Models\Locations;
use WindowsAzure\Services\ServiceManagement\Models\CreateStorageServiceOptions;
use WindowsAzure\Services\ServiceManagement\Models\UpdateStorageServiceOptions;
use WindowsAzure\Services\ServiceManagement\Models\KeyType;

/**
 * Unit tests for class ServiceManagementRestProxy
 *
 * @category  Microsoft
 * @package   Tests\Unit\WindowsAzure\Services\ServiceManagement
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
class ServiceManagementRestProxyTest extends ServiceManagementRestProxyTestBase
{
    private $_storageServiceName = 'createstorageservice';
    
    /**
     * @covers WindowsAzure\Services\ServiceManagement\ServiceManagementRestProxy::__construct
     */
    public function test__construct()
    {
        // Setup
        $channel = new HttpClient();
        $subscriptionId = '1234567-4323232';
        $dataSerializer = new XmlSerializer();
        
        // Test
        $actual = new ServiceManagementRestProxy($channel, $subscriptionId, $dataSerializer);
        
        // Assert
        $this->assertNotNull($actual);
    }
    
    /**
     * This test makes sure that the list of location constants in the SDK are 
     * consistant with what is used by Windows Azure.
     * 
     * @covers WindowsAzure\Services\ServiceManagement\Models\Locations
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
        $actual = $this->wrapper->listLocations();
        
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
     * @covers WindowsAzure\Services\ServiceManagement\ServiceManagementRestProxy::createAffinityGroup
     * @covers WindowsAzure\Services\ServiceManagement\ServiceManagementRestProxy::_getAffinityGroupPath
     * @covers WindowsAzure\Services\ServiceManagement\ServiceManagementRestProxy::_getPath
     */
    public function testCreateAffinityGroup()
    {
        // Setup
        $name  = 'createaffinitygroup';
        $label = base64_encode($name);
        $location = Locations::WEST_US;
        
        // Test
        $this->wrapper->createAffinityGroup($name, $label, $location);
        
        // Assert
        $this->assertTrue($this->affinityGroupExists($name));
        $this->createdAffinityGroups[] = $name;
    }
    
    /**
     * @covers WindowsAzure\Services\ServiceManagement\ServiceManagementRestProxy::deleteAffinityGroup
     * @covers WindowsAzure\Services\ServiceManagement\ServiceManagementRestProxy::_getAffinityGroupPath
     * @covers WindowsAzure\Services\ServiceManagement\ServiceManagementRestProxy::_getPath
     */
    public function testDeleteAffinityGroup()
    {
        // Setup
        $name = 'deleteaffinitygroup';
        $label = base64_encode($name);
        $location = Locations::WEST_US;
        $this->wrapper->createAffinityGroup($name, $label, $location);
        
        // Test
        $this->wrapper->deleteAffinityGroup($name);
        
        // Assert
        $this->assertFalse($this->affinityGroupExists($name));
    }
    
    /**
     * @covers WindowsAzure\Services\ServiceManagement\ServiceManagementRestProxy::listAffinityGroups 
     * @covers WindowsAzure\Services\ServiceManagement\Models\ListAffinityGroupsResult::create
     * @covers WindowsAzure\Services\ServiceManagement\ServiceManagementRestProxy::_getAffinityGroupPath
     * @covers WindowsAzure\Services\ServiceManagement\ServiceManagementRestProxy::_getPath
     */
    public function testListAffinityGroupsWithEmpty()
    {
        // Test
        $result = $this->wrapper->listAffinityGroups();
        
        // Assert
        $affinityGroups = $result->getAffinityGroups();
        $this->assertCount(0 + $this->affinityGroupCount, $affinityGroups);
    }
    
    /**
     * @covers WindowsAzure\Services\ServiceManagement\ServiceManagementRestProxy::listAffinityGroups 
     * @covers WindowsAzure\Services\ServiceManagement\Models\ListAffinityGroupsResult::create
     * @covers WindowsAzure\Services\ServiceManagement\ServiceManagementRestProxy::_getAffinityGroupPath
     * @covers WindowsAzure\Services\ServiceManagement\ServiceManagementRestProxy::_getPath
     */
    public function testListAffinityGroupsWithOneEntry()
    {
        // Setup
        $name = 'listaffinitygroupwithoneentry';
        $this->createAffinityGroup($name);
        
        // Test
        $result = $this->wrapper->listAffinityGroups();
        
        // Assert
        $affinityGroups = $result->getAffinityGroups();
        $this->assertCount(1 + $this->affinityGroupCount, $affinityGroups);
    }
    
    /**
     * @covers WindowsAzure\Services\ServiceManagement\ServiceManagementRestProxy::listAffinityGroups 
     * @covers WindowsAzure\Services\ServiceManagement\Models\ListAffinityGroupsResult::create
     * @covers WindowsAzure\Services\ServiceManagement\ServiceManagementRestProxy::_getAffinityGroupPath
     * @covers WindowsAzure\Services\ServiceManagement\ServiceManagementRestProxy::_getPath
     */
    public function testListAffinityGroupsWithMultipleEntries()
    {
        // Setup
        $name1 = 'listaffinitygroupwithmultipleentries1';
        $name2 = 'listaffinitygroupwithmultipleentries2';
        $this->createAffinityGroup($name1);
        $this->createAffinityGroup($name2);
        
        // Test
        $result = $this->wrapper->listAffinityGroups();
        
        // Assert
        $affinityGroups = $result->getAffinityGroups();
        $this->assertCount(2 + $this->affinityGroupCount, $affinityGroups);
    }
    
    /**
     * @covers WindowsAzure\Services\ServiceManagement\ServiceManagementRestProxy::updateAffinityGroup
     * @covers WindowsAzure\Services\ServiceManagement\ServiceManagementRestProxy::_getAffinityGroupPath
     * @covers WindowsAzure\Services\ServiceManagement\ServiceManagementRestProxy::_getPath
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
        $this->wrapper->updateAffinityGroup($name, $expectedLabel);
        
        // Assert
        $affinityGroup = $this->getAffinityGroup($name);
        $this->assertEquals($expectedLabel, $affinityGroup->getLabel());
    }
    
    /**
     * @covers WindowsAzure\Services\ServiceManagement\ServiceManagementRestProxy::getAffinityGroupProperties
     * @covers WindowsAzure\Services\ServiceManagement\Models\GetAffinityGroupPropertiesResult::create
     * @covers WindowsAzure\Services\ServiceManagement\ServiceManagementRestProxy::_getAffinityGroupPath
     * @covers WindowsAzure\Services\ServiceManagement\ServiceManagementRestProxy::_getPath
     */
    public function testGetAffinityGroupProperties()
    {
        // Setup
        $name = 'getaffinitygroupproperties';
        $this->createAffinityGroup($name);
        
        // Test
        $result = $this->wrapper->getAffinityGroupProperties($name);
        
        // Assert
        $expected = $this->getAffinityGroup($name);
        $this->assertEquals($expected->getLabel(), $result->getAffinityGroup()->getLabel());
        $this->assertEquals($expected->getLocation(), $result->getAffinityGroup()->getLocation());
        $this->assertEquals($expected->getDescription(), $result->getAffinityGroup()->getDescription());
    }
    
    /**
     * @covers WindowsAzure\Services\ServiceManagement\ServiceManagementRestProxy::listLocations
     * @covers WindowsAzure\Services\ServiceManagement\Models\ListLocationsResult::create
     * @covers WindowsAzure\Services\ServiceManagement\ServiceManagementRestProxy::_getLocationPath
     * @covers WindowsAzure\Services\ServiceManagement\ServiceManagementRestProxy::_getPath
     */
    public function testListLocations()
    {
        // Test
        $result = $this->wrapper->listLocations();
        
        // Assert
        $locations = $result->getLocations();
        $this->assertCount(Locations::COUNT, $locations);
    }

    /**
     * @covers WindowsAzure\Services\ServiceManagement\ServiceManagementRestProxy::createStorageService
     * @covers WindowsAzure\Services\ServiceManagement\ServiceManagementRestProxy::getOperationStatus
     * @covers WindowsAzure\Services\ServiceManagement\ServiceManagementRestProxy::_getOperationPath
     * @covers WindowsAzure\Services\ServiceManagement\ServiceManagementRestProxy::_getStorageServicePath
     * @covers WindowsAzure\Services\ServiceManagement\ServiceManagementRestProxy::_getPath
     * @covers WindowsAzure\Services\ServiceManagement\Models\GetOperationStatusResult::create
     * @covers WindowsAzure\Services\ServiceManagement\Models\StorageService::toArray
     */
    public function testCreateStorageService()
    {
        // Setup
        $name = $this->_storageServiceName;
        $label = base64_encode($name);
        $options = new CreateStorageServiceOptions();
        $options->setLocation('West US');
        
        // Test
        $result = $this->wrapper->createStorageService($name, $label, $options);
        $this->blockUntilAsyncSucceed($result->getRequestId());
        
        // Assert
        $this->assertTrue($this->storageServiceExists($name));
    }
    
    /**
     * @covers WindowsAzure\Services\ServiceManagement\ServiceManagementRestProxy::listStorageServices
     * @covers WindowsAzure\Services\ServiceManagement\Models\ListStorageServicesResult::create
     * @covers WindowsAzure\Services\ServiceManagement\ServiceManagementRestProxy::_getStorageServicePath
     * @covers WindowsAzure\Services\ServiceManagement\ServiceManagementRestProxy::_getPath
     * @depends testCreateStorageService
     */
    public function testListStorageServices()
    {
        // Setup
        $expected = 1;
        
         // Test
        $result = $this->wrapper->listStorageServices();
        
        // Assert
        $this->assertCount($expected + $this->storageCount, $result->getStorageServices());
    }
    
    /**
     * @covers WindowsAzure\Services\ServiceManagement\ServiceManagementRestProxy::updateStorageService
     * @covers WindowsAzure\Services\ServiceManagement\ServiceManagementRestProxy::_getStorageServicePath
     * @covers WindowsAzure\Services\ServiceManagement\ServiceManagementRestProxy::_getPath
     * @depends testListStorageServices
     */
    public function testUpdateStorageService()
    {
        // Setup
        $name = $this->_storageServiceName;
        $options = new UpdateStorageServiceOptions();
        $expectedDesc = 'My description';
        $expectedLabel = base64_encode('new label');
        $options->setDescription($expectedDesc);
        $options->setLabel($expectedLabel);
        
        // Test
        $this->wrapper->updateStorageService($name, $options);
        
        // Assert
        $result = $this->wrapper->getStorageServiceProperties($name);
        $this->assertEquals($expectedDesc, $result->getStorageService()->getDescription());
        $this->assertEquals($expectedLabel, $result->getStorageService()->getLabel());
    }
    
    /**
     * @covers WindowsAzure\Services\ServiceManagement\ServiceManagementRestProxy::getStorageServiceProperties
     * @covers WindowsAzure\Services\ServiceManagement\ServiceManagementRestProxy::_getStorageServicePath
     * @covers WindowsAzure\Services\ServiceManagement\ServiceManagementRestProxy::_getPath
     * @covers WindowsAzure\Services\ServiceManagement\Models\GetStorageServicePropertiesResult::create
     * @depends testUpdateStorageService
     */
    public function testGetStorageServiceProperties()
    {
        // Setup
        $name = $this->_storageServiceName;
        
        // Test
        $result = $this->wrapper->getStorageServiceProperties($name);
        
        // Assert
        $this->assertEquals($name, $result->getStorageService()->getName());
    }
    
    /**
     * @covers WindowsAzure\Services\ServiceManagement\ServiceManagementRestProxy::getStorageServiceKeys
     * @covers WindowsAzure\Services\ServiceManagement\ServiceManagementRestProxy::_getPath
     * @covers WindowsAzure\Services\ServiceManagement\ServiceManagementRestProxy::_getStorageServiceKeysPath
     * @covers WindowsAzure\Services\ServiceManagement\Models\GetStorageServiceKeysResult::create
     * @depends testGetStorageServiceProperties
     */
    public function testGetStorageServiceKeys()
    {
        // Setup
        $name = $this->_storageServiceName;
        
        // Test
        $result = $this->wrapper->getStorageServiceKeys($name);
        
        // Assert
        $this->assertNotNull($result->getUrl());
        $this->assertNotNull($result->getPrimary());
        $this->assertNotNull($result->getSecondary());
    }
    
    /**
     * @covers WindowsAzure\Services\ServiceManagement\ServiceManagementRestProxy::regenerateStorageServiceKeys
     * @covers WindowsAzure\Services\ServiceManagement\ServiceManagementRestProxy::_getPath
     * @covers WindowsAzure\Services\ServiceManagement\ServiceManagementRestProxy::_getStorageServiceKeysPath
     * @covers WindowsAzure\Services\ServiceManagement\Models\GetStorageServiceKeysResult::create
     * @depends testGetStorageServiceKeys
     */
    public function testRegenerateStorageServiceKeys()
    {
        // Setup
        $name = $this->_storageServiceName;
        $old = $this->wrapper->getStorageServiceKeys($name);
        
        // Test
        $new = $this->wrapper->regenerateStorageServiceKeys($name, KeyType::PRIMARY_KEY);
        
        // Assert
        $this->assertNotEquals($old->getPrimary(), $new->getPrimary());
        $this->assertEquals($old->getSecondary(), $new->getSecondary());
    }
    
    /**
     * @covers WindowsAzure\Services\ServiceManagement\ServiceManagementRestProxy::deleteStorageService
     * @covers WindowsAzure\Services\ServiceManagement\ServiceManagementRestProxy::_getStorageServicePath
     * @covers WindowsAzure\Services\ServiceManagement\ServiceManagementRestProxy::_getPath
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
        $this->wrapper->deleteStorageService($name);
        
        // Assert
        $this->assertFalse($this->storageServiceExists($name));
    }
}

?>
