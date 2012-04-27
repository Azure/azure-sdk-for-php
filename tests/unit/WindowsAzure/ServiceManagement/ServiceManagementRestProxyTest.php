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
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */

namespace Tests\Unit\WindowsAzure\ServiceManagement;
use Tests\Framework\ServiceManagementRestProxyTestBase;
use WindowsAzure\Core\Http\HttpClient;
use WindowsAzure\Core\Serialization\XmlSerializer;
use WindowsAzure\ServiceManagement\ServiceManagementRestProxy;
use WindowsAzure\ServiceManagement\Models\Locations;

/**
 * Unit tests for class ServiceManagementRestProxy
 *
 * @category  Microsoft
 * @package   Tests\Unit\WindowsAzure\ServiceManagement
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
class ServiceManagementRestProxyTest extends ServiceManagementRestProxyTestBase
{
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
        $actual = new ServiceManagementRestProxy($channel, $subscriptionId, $dataSerializer);
        
        // Assert
        $this->assertNotNull($actual);
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
     * @covers WindowsAzure\ServiceManagement\ServiceManagementRestProxy::createAffinityGroup
     * @covers WindowsAzure\ServiceManagement\ServiceManagementRestProxy::_getAffinityGroupPath
     * @covers WindowsAzure\ServiceManagement\ServiceManagementRestProxy::_getPath
     * @covers WindowsAzure\ServiceManagement\ServiceManagementRestProxy::_send
     */
    public function testCreateAffinityGroup()
    {
        // Setup
        $name  = 'createaffinitygroup';
        $label = base64_encode($name);
        $location = 'West US';
        
        // Test
        $this->wrapper->createAffinityGroup($name, $label, $location);
        
        // Assert
        $this->assertTrue($this->affinityGroupExists($name));
        $this->createdAffinityGroups[] = $name;
    }
    
    /**
     * @covers WindowsAzure\ServiceManagement\ServiceManagementRestProxy::deleteAffinityGroup
     * @covers WindowsAzure\ServiceManagement\ServiceManagementRestProxy::_getAffinityGroupPath
     * @covers WindowsAzure\ServiceManagement\ServiceManagementRestProxy::_getPath
     * @covers WindowsAzure\ServiceManagement\ServiceManagementRestProxy::_send
     */
    public function testDeleteAffinityGroup()
    {
        // Setup
        $name = 'deleteaffinitygroup';
        $label = base64_encode($name);
        $location = 'West US';
        $this->wrapper->createAffinityGroup($name, $label, $location);
        
        // Test
        $this->wrapper->deleteAffinityGroup($name);
        
        // Assert
        $this->assertFalse($this->affinityGroupExists($name));
    }
    
    /**
     * @covers WindowsAzure\ServiceManagement\ServiceManagementRestProxy::listAffinityGroups 
     * @covers WindowsAzure\ServiceManagement\Models\ListAffinityGroupsResult::create
     * @covers WindowsAzure\ServiceManagement\ServiceManagementRestProxy::_getAffinityGroupPath
     * @covers WindowsAzure\ServiceManagement\ServiceManagementRestProxy::_getPath
     * @covers WindowsAzure\ServiceManagement\ServiceManagementRestProxy::_send
     */
    public function testListAffinityGroupsWithEmpty()
    {
        // Test
        $result = $this->wrapper->listAffinityGroups();
        
        // Assert
        $affinityGroups = $result->getAffinityGroups();
        $this->assertCount(0, $affinityGroups);
    }
    
    /**
     * @covers WindowsAzure\ServiceManagement\ServiceManagementRestProxy::listAffinityGroups 
     * @covers WindowsAzure\ServiceManagement\Models\ListAffinityGroupsResult::create
     * @covers WindowsAzure\ServiceManagement\ServiceManagementRestProxy::_getAffinityGroupPath
     * @covers WindowsAzure\ServiceManagement\ServiceManagementRestProxy::_getPath
     * @covers WindowsAzure\ServiceManagement\ServiceManagementRestProxy::_send
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
        $this->assertCount(1, $affinityGroups);
    }
    
    /**
     * @covers WindowsAzure\ServiceManagement\ServiceManagementRestProxy::listAffinityGroups 
     * @covers WindowsAzure\ServiceManagement\Models\ListAffinityGroupsResult::create
     * @covers WindowsAzure\ServiceManagement\ServiceManagementRestProxy::_getAffinityGroupPath
     * @covers WindowsAzure\ServiceManagement\ServiceManagementRestProxy::_getPath
     * @covers WindowsAzure\ServiceManagement\ServiceManagementRestProxy::_send
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
        $this->assertCount(2, $affinityGroups);
    }
    
    /**
     * @covers WindowsAzure\ServiceManagement\ServiceManagementRestProxy::updateAffinityGroup
     * @covers WindowsAzure\ServiceManagement\ServiceManagementRestProxy::_getAffinityGroupPath
     * @covers WindowsAzure\ServiceManagement\ServiceManagementRestProxy::_getPath
     * @covers WindowsAzure\ServiceManagement\ServiceManagementRestProxy::_send
     */
    public function testUpdateAffinityGroup()
    {
        // Setup
        $name  = 'updateaffinitygroup';
        $label = base64_encode($name);
        $location = 'West US';
        $expectedLabel = base64_encode('newlabel');
        $this->createAffinityGroup($name, $label, $location);
        
        // Test
        $this->wrapper->updateAffinityGroup($name, $expectedLabel);
        
        // Assert
        $affinityGroup = $this->getAffinityGroup($name);
        $this->assertEquals($expectedLabel, $affinityGroup->getLabel());
    }
    
    /**
     * @covers WindowsAzure\ServiceManagement\ServiceManagementRestProxy::getAffinityGroupProperties
     * @covers WindowsAzure\ServiceManagement\Models\GetAffinityGroupPropertiesResult::create
     * @covers WindowsAzure\ServiceManagement\ServiceManagementRestProxy::_getAffinityGroupPath
     * @covers WindowsAzure\ServiceManagement\ServiceManagementRestProxy::_getPath
     * @covers WindowsAzure\ServiceManagement\ServiceManagementRestProxy::_send
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
     * @covers WindowsAzure\ServiceManagement\ServiceManagementRestProxy::listLocations
     * @covers WindowsAzure\ServiceManagement\Models\ListLocationsResult::create
     * @covers WindowsAzure\ServiceManagement\ServiceManagementRestProxy::_getLocationPath
     * @covers WindowsAzure\ServiceManagement\ServiceManagementRestProxy::_getPath
     * @covers WindowsAzure\ServiceManagement\ServiceManagementRestProxy::_send
     */
    public function testListLocations()
    {
        // Test
        $result = $this->wrapper->listLocations();
        
        // Assert
        $locations = $result->getLocations();
        $this->assertCount(Locations::COUNT, $locations);
    }
}

?>
