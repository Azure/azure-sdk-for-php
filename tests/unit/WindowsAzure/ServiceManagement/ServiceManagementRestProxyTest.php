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

namespace Tests\unit\WindowsAzure\ServiceManagement;

use Tests\framework\ServiceRestProxyTestBase;
use Tests\framework\ServiceManagementRestProxyTestBase;
use Tests\framework\TestResources;
use WindowsAzure\Common\Internal\Resources;
use WindowsAzure\Common\Internal\Http\HttpClient;
use WindowsAzure\Common\Internal\Serialization\XmlSerializer;
use WindowsAzure\Common\ServiceException;
use WindowsAzure\ServiceManagement\ServiceManagementRestProxy;
use WindowsAzure\ServiceManagement\Models\CreateServiceOptions;
use WindowsAzure\ServiceManagement\Models\UpdateServiceOptions;
use WindowsAzure\ServiceManagement\Models\KeyType;
use WindowsAzure\ServiceManagement\Models\GetDeploymentOptions;
use WindowsAzure\ServiceManagement\Models\GetHostedServicePropertiesOptions;
use WindowsAzure\ServiceManagement\Models\DeploymentSlot;
use WindowsAzure\ServiceManagement\Models\ChangeDeploymentConfigurationOptions;
use WindowsAzure\ServiceManagement\Models\DeploymentStatus;
use WindowsAzure\ServiceManagement\Models\Mode;
use WindowsAzure\ServiceManagement\Models\UpgradeDeploymentOptions;
use WindowsAzure\ServiceManagement\Models\CreateDeploymentOptions;

/**
 * Unit tests for class ServiceManagementRestProxy.
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
class ServiceManagementRestProxyTest extends ServiceManagementRestProxyTestBase
{
    /**
     * @covers \WindowsAzure\ServiceManagement\ServiceManagementRestProxy::__construct
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
     * @covers \WindowsAzure\ServiceManagement\ServiceManagementRestProxy::createAffinityGroup
     * @covers \WindowsAzure\ServiceManagement\ServiceManagementRestProxy::_getAffinityGroupPath
     * @covers \WindowsAzure\ServiceManagement\ServiceManagementRestProxy::_getPath
     * @group AffinityGroup
     */
    public function testCreateAffinityGroup()
    {
        // Setup
        $name = $this->getTestName();
        $label = base64_encode($name);
        $location = $this->defaultLocation;

        // Test
        $this->serviceManagementRestProxy->createAffinityGroup($name, $label, $location);

        // Assert
        $this->assertTrue($this->affinityGroupExists($name));
        $this->createdAffinityGroups[] = $name;
    }

    /**
     * @covers \WindowsAzure\ServiceManagement\ServiceManagementRestProxy::deleteAffinityGroup
     * @covers \WindowsAzure\ServiceManagement\ServiceManagementRestProxy::_getAffinityGroupPath
     * @covers \WindowsAzure\ServiceManagement\ServiceManagementRestProxy::_getPath
     * @group AffinityGroup
     */
    public function testDeleteAffinityGroup()
    {
        // Setup
        $name = $this->getTestName();
        $label = base64_encode($name);
        $location = $this->defaultLocation;
        $this->serviceManagementRestProxy->createAffinityGroup($name, $label, $location);

        // Test
        $this->serviceManagementRestProxy->deleteAffinityGroup($name);

        // Assert
        $this->assertFalse($this->affinityGroupExists($name));
    }

    /**
     * @covers \WindowsAzure\ServiceManagement\ServiceManagementRestProxy::listAffinityGroups
     * @covers \WindowsAzure\ServiceManagement\Models\ListAffinityGroupsResult::create
     * @covers \WindowsAzure\ServiceManagement\ServiceManagementRestProxy::_getAffinityGroupPath
     * @covers \WindowsAzure\ServiceManagement\ServiceManagementRestProxy::_getPath
     * @group AffinityGroup
     */
    public function testListAffinityGroupsWithEmpty()
    {
        // Setup
        $currentCount = count($this->serviceManagementRestProxy->listAffinityGroups()->getAffinityGroups());
        $expectedCount = 0 + $currentCount;

        // Test
        $result = $this->serviceManagementRestProxy->listAffinityGroups();

        // Assert
        $affinityGroups = $result->getAffinityGroups();
        $this->assertCount($expectedCount, $affinityGroups);
    }

    /**
     * @covers \WindowsAzure\ServiceManagement\ServiceManagementRestProxy::listAffinityGroups
     * @covers \WindowsAzure\ServiceManagement\Models\ListAffinityGroupsResult::create
     * @covers \WindowsAzure\ServiceManagement\ServiceManagementRestProxy::_getAffinityGroupPath
     * @covers \WindowsAzure\ServiceManagement\ServiceManagementRestProxy::_getPath
     * @group AffinityGroup
     */
    public function testListAffinityGroupsWithOneEntry()
    {
        // Setup
        $name = $this->getTestName();
        $currentCount = count($this->serviceManagementRestProxy->listAffinityGroups()->getAffinityGroups());
        $expectedCount = 1 + $currentCount;
        $this->createAffinityGroup($name);

        // Test
        $result = $this->serviceManagementRestProxy->listAffinityGroups();

        // Assert
        $affinityGroups = $result->getAffinityGroups();
        $this->assertCount($expectedCount, $affinityGroups);
    }

    /**
     * @covers \WindowsAzure\ServiceManagement\ServiceManagementRestProxy::listAffinityGroups
     * @covers \WindowsAzure\ServiceManagement\Models\ListAffinityGroupsResult::create
     * @covers \WindowsAzure\ServiceManagement\ServiceManagementRestProxy::_getAffinityGroupPath
     * @covers \WindowsAzure\ServiceManagement\ServiceManagementRestProxy::_getPath
     * @group AffinityGroup
     */
    public function testListAffinityGroupsWithMultipleEntries()
    {
        // Setup
        $name1 = $this->getTestName();
        $name2 = $this->getTestName();
        $currentCount = count($this->serviceManagementRestProxy->listAffinityGroups()->getAffinityGroups());
        $expectedCount = 2 + $currentCount;
        $this->createAffinityGroup($name1);
        $this->createAffinityGroup($name2);

        // Test
        $result = $this->serviceManagementRestProxy->listAffinityGroups();

        // Assert
        $affinityGroups = $result->getAffinityGroups();
        $this->assertCount($expectedCount, $affinityGroups);
    }

    /**
     * @covers \WindowsAzure\ServiceManagement\ServiceManagementRestProxy::updateAffinityGroup
     * @covers \WindowsAzure\ServiceManagement\ServiceManagementRestProxy::_getAffinityGroupPath
     * @covers \WindowsAzure\ServiceManagement\ServiceManagementRestProxy::_getPath
     * @group AffinityGroup
     */
    public function testUpdateAffinityGroup()
    {
        // Setup
        $name = $this->getTestName();
        $label = base64_encode($name);
        $location = $this->defaultLocation;
        $expectedLabel = base64_encode('newlabel');
        $this->createAffinityGroup($name, $label, $location);

        // Test
        $this->serviceManagementRestProxy->updateAffinityGroup($name, $expectedLabel);

        // Assert
        $affinityGroup = $this->getAffinityGroup($name);
        $this->assertEquals($expectedLabel, $affinityGroup->getLabel());
    }

    /**
     * @covers \WindowsAzure\ServiceManagement\ServiceManagementRestProxy::getAffinityGroupProperties
     * @covers \WindowsAzure\ServiceManagement\Models\GetAffinityGroupPropertiesResult::create
     * @covers \WindowsAzure\ServiceManagement\ServiceManagementRestProxy::_getAffinityGroupPath
     * @covers \WindowsAzure\ServiceManagement\ServiceManagementRestProxy::_getPath
     * @group AffinityGroup
     */
    public function testGetAffinityGroupProperties()
    {
        // Setup
        $name = $this->getTestName();
        $this->createAffinityGroup($name);

        // Test
        $result = $this->serviceManagementRestProxy->getAffinityGroupProperties($name);

        // Assert
        $expected = $this->getAffinityGroup($name);
        $this->assertEquals($expected->getLabel(), $result->getAffinityGroup()->getLabel());
        $this->assertEquals($expected->getLocation(), $result->getAffinityGroup()->getLocation());
        $this->assertEquals($expected->getDescription(), $result->getAffinityGroup()->getDescription());
    }

    /**
     * @covers \WindowsAzure\ServiceManagement\ServiceManagementRestProxy::createStorageService
     * @covers \WindowsAzure\ServiceManagement\ServiceManagementRestProxy::getOperationStatus
     * @covers \WindowsAzure\ServiceManagement\ServiceManagementRestProxy::_getOperationPath
     * @covers \WindowsAzure\ServiceManagement\ServiceManagementRestProxy::_getStorageServicePath
     * @covers \WindowsAzure\ServiceManagement\ServiceManagementRestProxy::_getPath
     * @covers \WindowsAzure\ServiceManagement\Models\GetOperationStatusResult::create
     * @covers \WindowsAzure\ServiceManagement\Models\StorageService::toArray
     * @covers \WindowsAzure\ServiceManagement\Internal\WindowsAzureService::toArray
     * @group StorageService
     */
    public function testCreateStorageService()
    {
        // Setup
        $name = $this->storageServiceName;
        $label = base64_encode($name);
        $options = new CreateServiceOptions();
        $options->setLocation($this->defaultLocation);

        // Count the storage services before creating new one.
        $storageCount = count($this->serviceManagementRestProxy->listStorageServices()->getStorageServices());

        // Test
        $result = $this->serviceManagementRestProxy->createStorageService($name, $label, $options);
        $this->blockUntilAsyncSucceed($result);

        // Assert
        $this->assertTrue($this->storageServiceExists($name));

        return $storageCount;
    }

    /**
     * @covers \WindowsAzure\ServiceManagement\ServiceManagementRestProxy::listStorageServices
     * @covers \WindowsAzure\ServiceManagement\Models\ListStorageServicesResult::create
     * @covers \WindowsAzure\ServiceManagement\ServiceManagementRestProxy::_getStorageServicePath
     * @covers \WindowsAzure\ServiceManagement\ServiceManagementRestProxy::_getPath
     * @depends testCreateStorageService
     * @group StorageService
     */
    public function testListStorageServices($storageCount)
    {
        // Setup
        $expected = 1;

         // Test
        $result = $this->serviceManagementRestProxy->listStorageServices();

        // Assert
        $this->assertCount($expected + $storageCount, $result->getStorageServices());
    }

    /**
     * @covers \WindowsAzure\ServiceManagement\ServiceManagementRestProxy::updateStorageService
     * @covers \WindowsAzure\ServiceManagement\ServiceManagementRestProxy::_getStorageServicePath
     * @covers \WindowsAzure\ServiceManagement\ServiceManagementRestProxy::_getPath
     * @depends testListStorageServices
     * @group StorageService
     */
    public function testUpdateStorageService()
    {
        // Setup
        $name = $this->storageServiceName;
        $options = new UpdateServiceOptions();
        $expectedDesc = 'My description';
        $expectedLabel = base64_encode('new label');
        $options->setDescription($expectedDesc);
        $options->setLabel($expectedLabel);

        // Test
        $this->serviceManagementRestProxy->updateStorageService($name, $options);

        // Assert
        $result = $this->serviceManagementRestProxy->getStorageServiceProperties($name);
        $this->assertEquals($expectedDesc, $result->getStorageService()->getDescription());
        $this->assertEquals($expectedLabel, $result->getStorageService()->getLabel());
    }

    /**
     * @covers \WindowsAzure\ServiceManagement\ServiceManagementRestProxy::getStorageServiceProperties
     * @covers \WindowsAzure\ServiceManagement\ServiceManagementRestProxy::_getStorageServicePath
     * @covers \WindowsAzure\ServiceManagement\ServiceManagementRestProxy::_getPath
     * @covers \WindowsAzure\ServiceManagement\Models\GetStorageServicePropertiesResult::create
     * @depends testUpdateStorageService
     * @group StorageService
     */
    public function testGetStorageServiceProperties()
    {
        // Setup
        $name = $this->storageServiceName;

        // Test
        $result = $this->serviceManagementRestProxy->getStorageServiceProperties($name);

        // Assert
        $this->assertEquals($name, $result->getStorageService()->getName());
        $this->assertNotNull($result->getStorageService()->getUrl());
        $this->assertNotNull($result->getStorageService()->getLabel());
    }

    /**
     * @covers \WindowsAzure\ServiceManagement\ServiceManagementRestProxy::getStorageServiceKeys
     * @covers \WindowsAzure\ServiceManagement\ServiceManagementRestProxy::_getPath
     * @covers \WindowsAzure\ServiceManagement\ServiceManagementRestProxy::_getStorageServiceKeysPath
     * @covers \WindowsAzure\ServiceManagement\Models\GetStorageServiceKeysResult::create
     * @depends testGetStorageServiceProperties
     * @group StorageService
     * @group StorageService
     */
    public function testGetStorageServiceKeys()
    {
        // Setup
        $name = $this->storageServiceName;

        // Test
        $result = $this->serviceManagementRestProxy->getStorageServiceKeys($name);

        // Assert
        $this->assertNotNull($result->getUrl());
        $this->assertNotNull($result->getPrimary());
        $this->assertNotNull($result->getSecondary());
    }

    /**
     * @covers \WindowsAzure\ServiceManagement\ServiceManagementRestProxy::regenerateStorageServiceKeys
     * @covers \WindowsAzure\ServiceManagement\ServiceManagementRestProxy::_getPath
     * @covers \WindowsAzure\ServiceManagement\ServiceManagementRestProxy::_getStorageServiceKeysPath
     * @covers \WindowsAzure\ServiceManagement\Models\GetStorageServiceKeysResult::create
     * @depends testGetStorageServiceKeys
     * @group StorageService
     */
    public function testRegenerateStorageServiceKeys()
    {
        // Setup
        $name = $this->storageServiceName;
        $old = $this->serviceManagementRestProxy->getStorageServiceKeys($name);

        // Test
        $new = $this->serviceManagementRestProxy->regenerateStorageServiceKeys($name, KeyType::PRIMARY_KEY);

        // Assert
        $this->assertNotEquals($old->getPrimary(), $new->getPrimary());
        $this->assertEquals($old->getSecondary(), $new->getSecondary());
    }

    /**
     * @covers \WindowsAzure\ServiceManagement\ServiceManagementRestProxy::deleteStorageService
     * @covers \WindowsAzure\ServiceManagement\ServiceManagementRestProxy::_getStorageServicePath
     * @covers \WindowsAzure\ServiceManagement\ServiceManagementRestProxy::_getPath
     * @depends testRegenerateStorageServiceKeys
     */
    public function testDeleteStorageService()
    {
        // From build time perspective, this method must be called as the last unit
        // test (by specifying @depends) because all other unit tests use the storage
        // account this method deletes.

        // Setup
        $name = $this->storageServiceName;

         // Test
        $this->serviceManagementRestProxy->deleteStorageService($name);

        // Assert
        $this->assertFalse($this->storageServiceExists($name));
    }

    /**
     * @covers \WindowsAzure\ServiceManagement\ServiceManagementRestProxy::listHostedServices
     * @covers \WindowsAzure\ServiceManagement\ServiceManagementRestProxy::_getHostedServicePath
     * @covers \WindowsAzure\ServiceManagement\ServiceManagementRestProxy::_getPath
     * @covers \WindowsAzure\ServiceManagement\Models\ListHostedServicesResult::create
     * @group HostedService
     */
    public function testListHostedServicesEmpty()
    {
        // Setup
        $currentCount = count($this->serviceManagementRestProxy->listHostedServices()->getHostedServices());
        $expectedCount = $currentCount;

         // Test
        $result = $this->serviceManagementRestProxy->listHostedServices();

        // Assert
        $this->assertCount($expectedCount, $result->getHostedServices());
    }

    /**
     * @covers \WindowsAzure\ServiceManagement\ServiceManagementRestProxy::listHostedServices
     * @covers \WindowsAzure\ServiceManagement\ServiceManagementRestProxy::_getHostedServicePath
     * @covers \WindowsAzure\ServiceManagement\ServiceManagementRestProxy::_getPath
     * @covers \WindowsAzure\ServiceManagement\Models\ListHostedServicesResult::create
     * @group HostedService
     */
    public function testListHostedServicesOne()
    {
        // Setup
        $currentCount = count($this->serviceManagementRestProxy->listHostedServices()->getHostedServices());
        $name = $this->getTestName();
        $this->createHostedService($name);
        $expectedCount = $currentCount + 1;

         // Test
        $result = $this->serviceManagementRestProxy->listHostedServices();

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
     * @covers \WindowsAzure\ServiceManagement\ServiceManagementRestProxy::listHostedServices
     * @covers \WindowsAzure\ServiceManagement\ServiceManagementRestProxy::_getHostedServicePath
     * @covers \WindowsAzure\ServiceManagement\ServiceManagementRestProxy::_getPath
     * @covers \WindowsAzure\ServiceManagement\Models\ListHostedServicesResult::create
     * @group HostedService
     */
    public function testListHostedServicesMultiple()
    {
        // Setup
        $currentCount = count($this->serviceManagementRestProxy->listHostedServices()->getHostedServices());
        $name1 = $this->getTestName();
        $name2 = $this->getTestName();
        $name3 = $this->getTestName();
        $this->createHostedService($name1);
        $this->createHostedService($name2);
        $this->createHostedService($name3);
        $expectedCount = $currentCount + 3;

         // Test
        $result = $this->serviceManagementRestProxy->listHostedServices();

        // Assert
        $actual = $result->getHostedServices();
        $this->assertCount($expectedCount, $actual);

        $service1Exists = false;
        $service2Exists = false;
        $service3Exists = false;
        foreach ($actual as $hostedService) {
            if ($hostedService->getName() === $name1) {
                $service1Exists = true;
            } elseif ($hostedService->getName() === $name2) {
                $service2Exists = true;
            } elseif ($hostedService->getName() === $name3) {
                $service3Exists = true;
            }
        }
        $this->assertTrue($service1Exists);
        $this->assertTrue($service2Exists);
        $this->assertTrue($service3Exists);
    }

    /**
     * @covers \WindowsAzure\ServiceManagement\ServiceManagementRestProxy::deleteHostedService
     * @covers \WindowsAzure\ServiceManagement\ServiceManagementRestProxy::_getHostedServicePath
     * @covers \WindowsAzure\ServiceManagement\ServiceManagementRestProxy::_getPath
     * @group HostedService
     */
    public function testDeleteHostedService()
    {
        // Setup
        $name = $this->getTestName();
        $this->createHostedService($name);

         // Test
        $this->serviceManagementRestProxy->deleteHostedService($name);

        // Assert
        $this->assertFalse($this->hostedServiceExists($name));
    }

    /**
     * @covers \WindowsAzure\ServiceManagement\ServiceManagementRestProxy::createHostedService
     * @covers \WindowsAzure\ServiceManagement\ServiceManagementRestProxy::getOperationStatus
     * @covers \WindowsAzure\ServiceManagement\ServiceManagementRestProxy::_getOperationPath
     * @covers \WindowsAzure\ServiceManagement\ServiceManagementRestProxy::_getHostedServicePath
     * @covers \WindowsAzure\ServiceManagement\ServiceManagementRestProxy::_getPath
     * @covers \WindowsAzure\ServiceManagement\Models\GetOperationStatusResult::create
     * @covers \WindowsAzure\ServiceManagement\Models\HostedService::toArray
     * @covers \WindowsAzure\ServiceManagement\Internal\WindowsAzureService::toArray
     * @group HostedService
     */
    public function testCreateHostedService()
    {
        // Setup
        $name = $this->getTestName();
        $label = base64_encode($name);
        $options = new CreateServiceOptions();
        $options->setLocation($this->defaultLocation);
        $options->setDescription('I am description');

        // Test
        $this->serviceManagementRestProxy->createHostedService($name, $label, $options);
        $this->createdHostedServices[] = $name;

        // Assert
        $this->assertTrue($this->hostedServiceExists($name));
    }

    /**
     * @covers \WindowsAzure\ServiceManagement\ServiceManagementRestProxy::updateHostedService
     * @covers \WindowsAzure\ServiceManagement\ServiceManagementRestProxy::_getHostedServicePath
     * @covers \WindowsAzure\ServiceManagement\ServiceManagementRestProxy::_getPath
     * @group HostedService
     */
    public function testUpdateHostedService()
    {
        // Setup
        $name = $this->getTestName();
        $this->createHostedService($name);
        $options = new UpdateServiceOptions();
        $expectedDesc = 'My description';
        $expectedLabel = base64_encode('new label');
        $options->setDescription($expectedDesc);
        $options->setLabel($expectedLabel);

        // Test
        $this->serviceManagementRestProxy->updateHostedService($name, $options);

        // Assert
        $result = $this->serviceManagementRestProxy->getHostedServiceProperties($name);
        $this->assertEquals($expectedDesc, $result->getHostedService()->getDescription());
        $this->assertEquals($expectedLabel, $result->getHostedService()->getLabel());
    }

    /**
     * @covers \WindowsAzure\ServiceManagement\ServiceManagementRestProxy::getHostedServiceProperties
     * @covers \WindowsAzure\ServiceManagement\ServiceManagementRestProxy::_getHostedServicePath
     * @covers \WindowsAzure\ServiceManagement\ServiceManagementRestProxy::_getPath
     * @covers \WindowsAzure\ServiceManagement\Models\GetHostedServicePropertiesResult::create
     * @group HostedService
     */
    public function testGetHostedServiceProperties()
    {
        // Setup
        $name = $this->getTestName();
        $this->createHostedService($name);

        // Test
        $result = $this->serviceManagementRestProxy->getHostedServiceProperties($name);

        // Assert
        $this->assertEquals($name, $result->getHostedService()->getName());
        $this->assertEquals($this->defaultLocation, $result->getHostedService()->getLocation());
        $this->assertEquals(base64_encode($name), $result->getHostedService()->getLabel());
    }

    /**
     * @covers \WindowsAzure\ServiceManagement\ServiceManagementRestProxy::getHostedServiceProperties
     * @covers \WindowsAzure\ServiceManagement\ServiceManagementRestProxy::_getHostedServicePath
     * @covers \WindowsAzure\ServiceManagement\ServiceManagementRestProxy::_getPath
     * @covers \WindowsAzure\ServiceManagement\Models\GetHostedServicePropertiesResult::create
     * @group HostedService
     */
    public function testGetHostedServicePropertiesWithEmbed()
    {
        // Setup
        $name = $this->getTestName();
        $stagingName = $name.'staging';
        $options = new GetHostedServicePropertiesOptions();
        $options->setEmbedDetail(true);
        $this->createDeployment($name);
        $this->createDeployment($name, DeploymentSlot::STAGING, $stagingName);

        // Test
        $result = $this->serviceManagementRestProxy->getHostedServiceProperties($name, $options);

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
     * @covers \WindowsAzure\ServiceManagement\ServiceManagementRestProxy::createDeployment
     * @covers \WindowsAzure\ServiceManagement\ServiceManagementRestProxy::_getDeploymentPathUsingSlot
     * @covers \WindowsAzure\ServiceManagement\ServiceManagementRestProxy::_getPath
     * @covers \WindowsAzure\ServiceManagement\ServiceManagementRestProxy::_createRequestXml
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
     * @covers \WindowsAzure\ServiceManagement\ServiceManagementRestProxy::deleteDeployment
     * @covers \WindowsAzure\ServiceManagement\ServiceManagementRestProxy::_getDeploymentPathUsingSlot
     * @covers \WindowsAzure\ServiceManagement\ServiceManagementRestProxy::_getPath
     * @covers \WindowsAzure\ServiceManagement\ServiceManagementRestProxy::_getDeploymentPath
     * @group Deployment
     */
    public function testDeleteDeploymentWithSlot()
    {
        // Setup
        $name = $this->getTestName();
        $label = base64_encode($name);
        $deploymentName = $name;
        $slot = $this->defaultSlot;
        $packageUrl = TestResources::simplePackageUrl();
        $configuration = $this->defaultDeploymentConfiguration;
        $this->createHostedService($name);
        $this->createdHostedServices[] = $name;
        $result = $this->serviceManagementRestProxy->createDeployment(
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
        $result = $this->serviceManagementRestProxy->deleteDeployment($name, $options);
        $this->blockUntilAsyncSucceed($result);

        // Assert
        $this->assertFalse($this->deploymentExists($name));
        $this->assertNotNull($result);
    }

    /**
     * @covers \WindowsAzure\ServiceManagement\ServiceManagementRestProxy::deleteDeployment
     * @covers \WindowsAzure\ServiceManagement\ServiceManagementRestProxy::_getDeploymentPathUsingName
     * @covers \WindowsAzure\ServiceManagement\ServiceManagementRestProxy::_getPath
     * @covers \WindowsAzure\ServiceManagement\ServiceManagementRestProxy::_getDeploymentPath
     * @group Deployment
     */
    public function testDeleteDeploymentWithName()
    {
        // Setup
        $name = $this->getTestName();
        $label = base64_encode($name);
        $deploymentName = $name;
        $slot = $this->defaultSlot;
        $packageUrl = TestResources::simplePackageUrl();
        $configuration = $this->defaultDeploymentConfiguration;
        $this->createHostedService($name);
        $this->createdHostedServices[] = $name;
        $result = $this->serviceManagementRestProxy->createDeployment(
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
        $result = $this->serviceManagementRestProxy->deleteDeployment($name, $options);
        $this->blockUntilAsyncSucceed($result);

        // Assert
        $this->assertFalse($this->deploymentExists($name));
        $this->assertNotNull($result);
    }

    /**
     * @covers \WindowsAzure\ServiceManagement\ServiceManagementRestProxy::getDeployment
     * @covers \WindowsAzure\ServiceManagement\ServiceManagementRestProxy::_getDeploymentPathUsingName
     * @covers \WindowsAzure\ServiceManagement\ServiceManagementRestProxy::_getPath
     * @covers \WindowsAzure\ServiceManagement\ServiceManagementRestProxy::_getDeploymentPath
     * @covers \WindowsAzure\ServiceManagement\Models\GetDeploymentResult::create
     * @covers \WindowsAzure\ServiceManagement\Models\Deployment::create
     * @covers \WindowsAzure\Common\Internal\Utilities::createInstanceList
     * @covers \WindowsAzure\ServiceManagement\Models\UpgradeStatus::create
     * @covers \WindowsAzure\ServiceManagement\Models\RoleInstance::create
     * @covers \WindowsAzure\ServiceManagement\Models\Role::create
     * @covers \WindowsAzure\ServiceManagement\Models\InputEndpoint::create
     * @group Deployment
     */
    public function testGetDeploymentWithOneRole()
    {
        // Setup
        $name = $this->getTestName();
        $this->createDeployment($name);
        $options = new GetDeploymentOptions();
        $options->setDeploymentName($name);

        // Test
        $result = $this->serviceManagementRestProxy->getDeployment($name, $options);

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
     * @covers \WindowsAzure\ServiceManagement\ServiceManagementRestProxy::getDeployment
     * @covers \WindowsAzure\ServiceManagement\ServiceManagementRestProxy::_getDeploymentPathUsingSlot
     * @covers \WindowsAzure\ServiceManagement\ServiceManagementRestProxy::_getPath
     * @covers \WindowsAzure\ServiceManagement\ServiceManagementRestProxy::_getDeploymentPath
     * @covers \WindowsAzure\ServiceManagement\Models\GetDeploymentResult::create
     * @covers \WindowsAzure\ServiceManagement\Models\Deployment::create
     * @covers \WindowsAzure\Common\Internal\Utilities::createInstanceList
     * @covers \WindowsAzure\ServiceManagement\Models\UpgradeStatus::create
     * @covers \WindowsAzure\ServiceManagement\Models\RoleInstance::create
     * @covers \WindowsAzure\ServiceManagement\Models\Role::create
     * @covers \WindowsAzure\ServiceManagement\Models\InputEndpoint::create
     * @group Deployment
     */
    public function testGetDeploymentWithMultipleRoles()
    {
        $this->markTestSkipped('Skip it. Complex package not set up yet.');
        // Setup
        $name = $this->getTestName();
        $label = base64_encode($name);
        $deploymentName = $name;
        $slot = $this->defaultSlot;
        $packageUrl = TestResources::complexPackageUrl();
        $configuration = $this->complexConfiguration;
        $this->createHostedService($name);
        $this->createdHostedServices[] = $name;
        $this->createdDeployments[] = $name;
        $result = $this->serviceManagementRestProxy->createDeployment(
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
        $result = $this->serviceManagementRestProxy->getDeployment($name, $options);

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

    /**
     * @covers \WindowsAzure\ServiceManagement\ServiceManagementRestProxy::getDeployment
     * @covers \WindowsAzure\ServiceManagement\ServiceManagementRestProxy::_getDeploymentPathUsingSlot
     * @covers \WindowsAzure\ServiceManagement\ServiceManagementRestProxy::_getPath
     * @covers \WindowsAzure\ServiceManagement\ServiceManagementRestProxy::_getDeploymentPath
     * @covers \WindowsAzure\ServiceManagement\Models\GetDeploymentResult::create
     * @covers \WindowsAzure\ServiceManagement\Models\Deployment::create
     * @covers \WindowsAzure\Common\Internal\Utilities::createInstanceList
     * @covers \WindowsAzure\ServiceManagement\Models\UpgradeStatus::create
     * @covers \WindowsAzure\ServiceManagement\Models\RoleInstance::create
     * @covers \WindowsAzure\ServiceManagement\Models\Role::create
     * @covers \WindowsAzure\ServiceManagement\Models\InputEndpoint::create
     * @group Deployment
     */
    public function testGetDeploymentWhileUpgrading()
    {
        // Setup
        $name = $this->getTestName();
        $this->createDeployment($name);

        $mode = Mode::AUTO;
        $configuration = $this->complexConfiguration;
        $packageUrl = TestResources::complexPackageUrl();
        $label = base64_encode($name.'upgraded');
        $force = true;
        $options = new UpgradeDeploymentOptions();
        $options->setDeploymentName($name);

        $upgradeResult = $this->serviceManagementRestProxy->upgradeDeployment(
            $name,
            $mode,
            $packageUrl,
            $configuration,
            $label,
            $force,
            $options
        );

        // Test
        $result = $this->serviceManagementRestProxy->getDeployment($name, $options);

        // Block until the upgrade is done.
        $this->blockUntilAsyncSucceed($upgradeResult);

        // Assert
        $options = new GetDeploymentOptions();
        $options->setSlot(DeploymentSlot::PRODUCTION);
        $this->assertEquals($mode, strtolower($result->getDeployment()->getUpgradeStatus()->getUpgradeType()));
        $this->assertEquals('Before', $result->getDeployment()->getUpgradeStatus()->getCurrentUpgradeDomainState());
        $this->assertEquals(0, $result->getDeployment()->getUpgradeStatus()->getCurrentUpgradeDomain());
    }

    /**
     * @covers \WindowsAzure\ServiceManagement\ServiceManagementRestProxy::swapDeployment
     * @covers \WindowsAzure\ServiceManagement\ServiceManagementRestProxy::_getHostedServicePath
     * @covers \WindowsAzure\ServiceManagement\ServiceManagementRestProxy::_getPath
     * @covers \WindowsAzure\ServiceManagement\ServiceManagementRestProxy::_createRequestXml
     * @covers \WindowsAzure\ServiceManagement\Models\AsynchronousOperationResult::create
     * @group Deployment
     */
    public function testSwapDeployment()
    {
        $this->markTestSkipped('Skip it. Complex package not set up yet.');
        // Setup
        $name = $this->getTestName();
        $staging = 'stagingdeployment';
        $production = 'productiondeployment';
        $expectedInstanceCount = 4;
        $this->createComplexDeployment($name, DeploymentSlot::STAGING, $staging);
        $this->createDeployment($name, DeploymentSlot::PRODUCTION, $production);

        // Test
        $result = $this->serviceManagementRestProxy->swapDeployment($name, $staging, $production);

        // Block until the swap is done
        $this->blockUntilAsyncSucceed($result);

        // Assert
        $options = new GetDeploymentOptions();
        $options->setSlot(DeploymentSlot::PRODUCTION);
        $result = $this->serviceManagementRestProxy->getDeployment($name, $options);
        $deployment = $result->getDeployment();
        $this->assertCount($expectedInstanceCount, $deployment->getRoleInstanceList());

        // Clean
        $this->deleteDeployment($name, DeploymentSlot::STAGING);
    }

    /**
     * @covers \WindowsAzure\ServiceManagement\ServiceManagementRestProxy::changeDeploymentConfiguration
     * @covers \WindowsAzure\ServiceManagement\ServiceManagementRestProxy::_getDeploymentPath
     * @covers \WindowsAzure\ServiceManagement\ServiceManagementRestProxy::_getPath
     * @covers \WindowsAzure\ServiceManagement\ServiceManagementRestProxy::_createRequestXml
     * @covers \WindowsAzure\ServiceManagement\Models\AsynchronousOperationResult::create
     * @group Deployment
     */
    public function testChangeDeploymentConfiguration()
    {
        // Setup
        $name = $this->getTestName();
        $newConfig = '<?xml version="1.0" encoding="utf-8"?>
                        <ServiceConfiguration serviceName="WindowsAzure1" xmlns="http://schemas.microsoft.com/ServiceHosting/2008/10/ServiceConfiguration" osFamily="3" osVersion="*" schemaVersion="2013-10.2.2">
                            <Role name="WebRole1">
                                <Instances count="2" />
                                <ConfigurationSettings>
                                    <Setting name="Microsoft.WindowsAzure.Plugins.Diagnostics.ConnectionString" value="UseDevelopmentStorage=true" />
                                </ConfigurationSettings>
                            </Role>
                        </ServiceConfiguration>';
        $expected = 'PFNlcnZpY2VDb25maWd1cmF0aW9uIHhtbG5zOnhzZD0iaHR0cDovL3d3dy53My5vcmcvMjAwMS9YTUxTY2hlbWEiIHhtbG5zOnhzaT0iaHR0cDovL3d3dy53My5vcmcvMjAwMS9YTUxTY2hlbWEtaW5zdGFuY2UiIHNlcnZpY2VOYW1lPSIiIG9zRmFtaWx5PSIzIiBvc1ZlcnNpb249IioiIHhtbG5zPSJodHRwOi8vc2NoZW1hcy5taWNyb3NvZnQuY29tL1NlcnZpY2VIb3N0aW5nLzIwMDgvMTAvU2VydmljZUNvbmZpZ3VyYXRpb24iPg0KICA8Um9sZSBuYW1lPSJXZWJSb2xlMSI+DQogICAgPENvbmZpZ3VyYXRpb25TZXR0aW5ncz4NCiAgICAgIDxTZXR0aW5nIG5hbWU9Ik1pY3Jvc29mdC5XaW5kb3dzQXp1cmUuUGx1Z2lucy5EaWFnbm9zdGljcy5Db25uZWN0aW9uU3RyaW5nIiB2YWx1ZT0iVXNlRGV2ZWxvcG1lbnRTdG9yYWdlPXRydWUiIC8+DQogICAgPC9Db25maWd1cmF0aW9uU2V0dGluZ3M+DQogICAgPEluc3RhbmNlcyBjb3VudD0iMiIgLz4NCiAgICA8Q2VydGlmaWNhdGVzIC8+DQogIDwvUm9sZT4NCjwvU2VydmljZUNvbmZpZ3VyYXRpb24+';
        $this->createDeployment($name);
        $options = new ChangeDeploymentConfigurationOptions();
        $options->setDeploymentName($name);

        // Test
        $result = $this->serviceManagementRestProxy->changeDeploymentConfiguration($name, $newConfig, $options);

        // Block until the change is done.
        $this->blockUntilAsyncSucceed($result);

        // Assert
        $options = new GetDeploymentOptions();
        $options->setSlot(DeploymentSlot::PRODUCTION);
        $result = $this->serviceManagementRestProxy->getDeployment($name, $options);
        $deployment = $result->getDeployment();
        $this->assertEquals($expected, $deployment->getConfiguration());
    }

    /**
     * @covers \WindowsAzure\ServiceManagement\ServiceManagementRestProxy::updateDeploymentStatus
     * @covers \WindowsAzure\ServiceManagement\ServiceManagementRestProxy::_getDeploymentPath
     * @covers \WindowsAzure\ServiceManagement\ServiceManagementRestProxy::_getPath
     * @covers \WindowsAzure\ServiceManagement\ServiceManagementRestProxy::_createRequestXml
     * @covers \WindowsAzure\ServiceManagement\Models\AsynchronousOperationResult::create
     * @group Deployment
     */
    public function testUpdateDeploymentStatus()
    {
        // Setup
        $name = $this->getTestName();
        $this->createDeployment($name);
        $options = new GetDeploymentOptions();
        $options->setDeploymentName($name);

        // Test
        $result = $this->serviceManagementRestProxy->updateDeploymentStatus($name, DeploymentStatus::SUSPENDED, $options);

        // Block until the status update is done.
        $this->blockUntilAsyncSucceed($result);

        // Assert
        $options = new GetDeploymentOptions();
        $options->setDeploymentName($name);
        $result = $this->serviceManagementRestProxy->getDeployment($name, $options);
        $deployment = $result->getDeployment();
        $this->assertEquals(DeploymentStatus::SUSPENDED, $deployment->getStatus());
    }

    /**
     * @covers \WindowsAzure\ServiceManagement\ServiceManagementRestProxy::upgradeDeployment
     * @covers \WindowsAzure\ServiceManagement\ServiceManagementRestProxy::_getDeploymentPath
     * @covers \WindowsAzure\ServiceManagement\ServiceManagementRestProxy::_getPath
     * @covers \WindowsAzure\ServiceManagement\ServiceManagementRestProxy::_createRequestXml
     * @covers \WindowsAzure\ServiceManagement\Models\AsynchronousOperationResult::create
     * @group Deployment
     */
    public function testUpgradeDeployment()
    {
        $this->markTestSkipped('Skip it. Complex package not set up yet.');
        // Setup
        $name = $this->getTestName();
        $this->createDeployment($name);
        $mode = Mode::AUTO;
        $configuration = $this->complexConfiguration;
        $packageUrl = TestResources::complexPackageUrl();
        $label = base64_encode($name.'upgraded');
        $force = true;
        $options = new UpgradeDeploymentOptions();
        $options->setDeploymentName($name);
        $expectedInstancesCount = 4;

        // Test
        $result = $this->serviceManagementRestProxy->upgradeDeployment(
            $name,
            $mode,
            $packageUrl,
            $configuration,
            $label,
            $force,
            $options
        );

        // Block until the status update is done.
        $this->blockUntilAsyncSucceed($result);

        // Assert
        $options = new GetDeploymentOptions();
        $options->setSlot(DeploymentSlot::PRODUCTION);
        $result = $this->serviceManagementRestProxy->getDeployment($name, $options);
        $deployment = $result->getDeployment();
        $this->assertCount($expectedInstancesCount, $deployment->getRoleInstanceList());
    }

    /**
     * @covers \WindowsAzure\ServiceManagement\ServiceManagementRestProxy::walkUpgradeDomain
     * @covers \WindowsAzure\ServiceManagement\ServiceManagementRestProxy::_getDeploymentPath
     * @covers \WindowsAzure\ServiceManagement\ServiceManagementRestProxy::_getPath
     * @covers \WindowsAzure\ServiceManagement\ServiceManagementRestProxy::_createRequestXml
     * @covers \WindowsAzure\ServiceManagement\Models\AsynchronousOperationResult::create
     * @group Deployment
     */
    public function testWalkUpgradeDomain()
    {
        $this->markTestSkipped('Skip it. Complex package not set up yet.');
        // Setup
        $name = $this->getTestName();
        $this->createDeployment($name);

        $mode = Mode::MANUAL;
        $configuration = $this->complexConfiguration;
        $packageUrl = TestResources::complexPackageUrl();
        $label = base64_encode($name.'upgraded');
        $force = true;
        $options = new UpgradeDeploymentOptions();
        $options->setDeploymentName($name);
        $expectedInstancesCount = 4;

        $result = $this->serviceManagementRestProxy->upgradeDeployment(
            $name,
            $mode,
            $packageUrl,
            $configuration,
            $label,
            $force,
            $options
        );

        // Block until the upgrade is done.
        $this->blockUntilAsyncSucceed($result);

        // Test
        $result = $this->serviceManagementRestProxy->walkUpgradeDomain($name, 0, $options);

        // Block until the walk upgrade is done.
        $this->blockUntilAsyncSucceed($result);

        // Assert
        $options = new GetDeploymentOptions();
        $options->setSlot(DeploymentSlot::PRODUCTION);
        $result = $this->serviceManagementRestProxy->getDeployment($name, $options);
        $deployment = $result->getDeployment();
        $this->assertCount($expectedInstancesCount, $deployment->getRoleInstanceList());
    }

    /**
     * @covers \WindowsAzure\ServiceManagement\ServiceManagementRestProxy::rebootRoleInstance
     * @covers \WindowsAzure\ServiceManagement\ServiceManagementRestProxy::_getRoleInstancePath
     * @covers \WindowsAzure\ServiceManagement\ServiceManagementRestProxy::_sendRoleInstanceOrder
     * @covers \WindowsAzure\ServiceManagement\ServiceManagementRestProxy::_getDeploymentPath
     * @covers \WindowsAzure\ServiceManagement\ServiceManagementRestProxy::_getPath
     * @covers \WindowsAzure\ServiceManagement\ServiceManagementRestProxy::_createRequestXml
     * @covers \WindowsAzure\ServiceManagement\Models\AsynchronousOperationResult::create
     * @group Deployment
     */
    public function testRebootRoleInstance()
    {
        $this->markTestSkipped(ServiceRestProxyTestBase::TAKE_TOO_LONG);
        // Setup
        $name = $this->getTestName();
        $roleName = 'WebRole1_IN_0';
        $options = new CreateDeploymentOptions();
        $options->setStartDeployment(true);
        $this->createDeployment(
            $name,
            $this->defaultSlot,
            $name,
            $options
        );
        $options = new GetDeploymentOptions();
        $options->setDeploymentName($name);

        $this->waitUntilDeploymentReachStatus($name, DeploymentStatus::RUNNING);
        $this->waitUntilRoleInstanceReachStatus($name, 'ReadyRole', $roleName);

        // Test
        $result = $this->serviceManagementRestProxy->rebootRoleInstance($name, $roleName, $options);

        // Block until reboot request is completed
        $this->blockUntilAsyncSucceed($result);

        // Assert
        $result = $this->serviceManagementRestProxy->getDeployment($name, $options);
        $deployment = $result->getDeployment();
        $roleInstanceList = $deployment->getRoleInstanceList();
        $webRoleInstance = $roleInstanceList[0];
        $this->assertEquals('StoppedVM', $webRoleInstance->getInstanceStatus());
    }

    /**
     * @covers \WindowsAzure\ServiceManagement\ServiceManagementRestProxy::reimageRoleInstance
     * @covers \WindowsAzure\ServiceManagement\ServiceManagementRestProxy::_getRoleInstancePath
     * @covers \WindowsAzure\ServiceManagement\ServiceManagementRestProxy::_sendRoleInstanceOrder
     * @covers \WindowsAzure\ServiceManagement\ServiceManagementRestProxy::_getDeploymentPath
     * @covers \WindowsAzure\ServiceManagement\ServiceManagementRestProxy::_getPath
     * @covers \WindowsAzure\ServiceManagement\ServiceManagementRestProxy::_createRequestXml
     * @covers \WindowsAzure\ServiceManagement\Models\AsynchronousOperationResult::create
     * @group Deployment
     */
    public function testReimageRoleInstance()
    {
        $this->markTestSkipped(ServiceRestProxyTestBase::TAKE_TOO_LONG);
        // Setup
        $name = $this->getTestName();
        $roleName = 'WebRole1_IN_0';
        $options = new CreateDeploymentOptions();
        $options->setStartDeployment(true);
        $this->createDeployment(
            $name,
            $this->defaultSlot,
            $name,
            $options
        );
        $options = new GetDeploymentOptions();
        $options->setDeploymentName($name);

        $this->waitUntilDeploymentReachStatus($name, DeploymentStatus::RUNNING);
        $this->waitUntilRoleInstanceReachStatus($name, 'ReadyRole', $roleName);

        // Test
        $result = $this->serviceManagementRestProxy->reimageRoleInstance($name, $roleName, $options);

        // Block until reboot request is completed
        $this->blockUntilAsyncSucceed($result);

        // Assert
        $result = $this->serviceManagementRestProxy->getDeployment($name, $options);
        $deployment = $result->getDeployment();
        $roleInstanceList = $deployment->getRoleInstanceList();
        $webRoleInstance = $roleInstanceList[0];
        $this->assertEquals('StoppedVM', $webRoleInstance->getInstanceStatus());
    }

    /**
     * @covers \WindowsAzure\ServiceManagement\ServiceManagementRestProxy::rollbackUpdateOrUpgrade
     * @covers \WindowsAzure\ServiceManagement\ServiceManagementRestProxy::_getDeploymentPath
     * @covers \WindowsAzure\ServiceManagement\ServiceManagementRestProxy::_getPath
     * @covers \WindowsAzure\ServiceManagement\ServiceManagementRestProxy::_createRequestXml
     * @covers \WindowsAzure\ServiceManagement\Models\AsynchronousOperationResult::create
     * @group Deployment
     */
    public function testRollbackUpgradeOrUpdate()
    {
        $this->markTestSkipped(ServiceRestProxyTestBase::TAKE_TOO_LONG);
        $attempt = 0;
        $maxAttempts = 10;
        $isPassed = false;
        while (!$isPassed && ($attempt < $maxAttempts)) {
            try {
                $name = $this->getTestName();
                $newConfig = '<?xml version="1.0" encoding="utf-8"?>
                                <ServiceConfiguration serviceName="WindowsAzureProject2" xmlns="http://schemas.microsoft.com/ServiceHosting/2008/10/ServiceConfiguration" osFamily="3" osVersion="*">
                                <Role name="WebRole1">
                                    <Instances count="2" />
                                    <ConfigurationSettings>
                                        <Setting name="Microsoft.WindowsAzure.Plugins.Diagnostics.ConnectionString" value="UseDevelopmentStorage=false" />
                                    </ConfigurationSettings>
                                </Role>
                                <Role name="WorkerRole1">
                                    <Instances count="2" />
                                    <ConfigurationSettings>
                                        <Setting name="Microsoft.WindowsAzure.Plugins.Diagnostics.ConnectionString" value="UseDevelopmentStorage=false" />
                                    </ConfigurationSettings>
                                </Role>
                                </ServiceConfiguration>';
                $this->createComplexDeployment($name);
                $options = new ChangeDeploymentConfigurationOptions();
                $options->setSlot($this->defaultSlot);
                $this->serviceManagementRestProxy->changeDeploymentConfiguration($name, $newConfig, $options);
                $mode = Mode::AUTO;
                $force = true;
                $expectedInstanceCount = 4;

                $this->waitUntilRollbackIsAllowed($name);

                // Test
                $result = $this->serviceManagementRestProxy->rollbackUpdateOrUpgrade($name, $mode, $force, $options);

                // Block until reboot request is completed
                $this->blockUntilAsyncSucceed($result);

                // Assert
                $result = $this->serviceManagementRestProxy->getDeployment($name, $options);
                $deployment = $result->getDeployment();
                $this->assertCount($expectedInstanceCount, $deployment->getRoleInstanceList());

                $isPassed = true;
            } catch (ServiceException $e) {
                if (($e->getCode() == 400) && ($e->getErrorText() == 'Bad Request')
                   && (strpos($e->getErrorReason(), 'The previous update has completed and so rollback is not allowed.'))) {
                    ++$attempt;
                } else {
                    throw $e;
                }
            }
        }

        if (!$isPassed && ($attempt == $maxAttempts)) {
            $this->markTestSkipped(ServiceRestProxyTestBase::SKIPPED_AFTER_SEVERAL_ATTEMPTS);
        }
    }
}
