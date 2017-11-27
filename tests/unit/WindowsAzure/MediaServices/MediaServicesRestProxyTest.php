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
 * @copyright Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 *
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */

namespace Tests\unit\WindowsAzure\MediaServices;

use Tests\Framework\MediaServicesRestProxyTestBase;
use Tests\Framework\TestResources;
use WindowsAzure\Common\Internal\Utilities;
use WindowsAzure\Common\ServiceException;
use WindowsAzure\MediaServices\Models\Asset;
use WindowsAzure\MediaServices\Models\AccessPolicy;
use WindowsAzure\MediaServices\Models\Locator;
use WindowsAzure\MediaServices\Models\Job;
use WindowsAzure\MediaServices\Models\Task;
use WindowsAzure\MediaServices\Models\TaskOptions;
use WindowsAzure\MediaServices\Models\IngestManifest;
use WindowsAzure\MediaServices\Models\IngestManifestAsset;
use WindowsAzure\MediaServices\Models\IngestManifestFile;
use WindowsAzure\MediaServices\Models\ContentKey;
use WindowsAzure\MediaServices\Models\ProtectionKeyTypes;
use WindowsAzure\MediaServices\Models\ContentKeyTypes;
use WindowsAzure\MediaServices\Models\ContentKeyAuthorizationPolicy;
use WindowsAzure\MediaServices\Models\ContentKeyAuthorizationPolicyOption;
use WindowsAzure\MediaServices\Models\ContentKeyAuthorizationPolicyRestriction;
use WindowsAzure\MediaServices\Models\ContentKeyDeliveryType;
use WindowsAzure\MediaServices\Models\ContentKeyRestrictionType;
use WindowsAzure\MediaServices\Models\AssetDeliveryPolicy;
use WindowsAzure\MediaServices\Models\AssetDeliveryProtocol;
use WindowsAzure\MediaServices\Models\AssetDeliveryPolicyType;
use WindowsAzure\MediaServices\Models\EncodingReservedUnitType;
use WindowsAzure\MediaServices\Models\Channel;
use WindowsAzure\MediaServices\Models\ChannelInput;

use WindowsAzure\MediaServices\Models\ChannelPreview;
use WindowsAzure\MediaServices\Models\ChannelEncoding;

use WindowsAzure\MediaServices\Models\ChannelInputAccessControl;
use WindowsAzure\MediaServices\Models\ChannelPreviewAccessControl;

use WindowsAzure\MediaServices\Models\ChannelSlate;
use WindowsAzure\MediaServices\Models\ChannelState;
use WindowsAzure\MediaServices\Models\StreamingProtocol;
use WindowsAzure\MediaServices\Models\EncodingType;
use WindowsAzure\MediaServices\Models\IPAccessControl;
use WindowsAzure\MediaServices\Models\IPRange;

use WindowsAzure\MediaServices\Models\OperationState;
use WindowsAzure\MediaServices\Models\CrossSiteAccessPolicies;
use WindowsAzure\MediaServices\Models\AudioStream;
use WindowsAzure\MediaServices\Models\VideoStream;
use WindowsAzure\MediaServices\Models\ChannelEncodingPresets;
use WindowsAzure\MediaServices\Models\AdMarkerSources;
use WindowsAzure\MediaServices\Models\Program;
use WindowsAzure\MediaServices\Models\ProgramState;
use WindowsAzure\MediaServices\Templates\TokenRestrictionTemplateSerializer;
use WindowsAzure\MediaServices\Templates\TokenRestrictionTemplate;
use WindowsAzure\MediaServices\Templates\TokenType;
use WindowsAzure\MediaServices\Templates\TokenClaim;
use WindowsAzure\MediaServices\Templates\SymmetricVerificationKey;
use WindowsAzure\MediaServices\Templates\MediaServicesLicenseTemplateSerializer;
use WindowsAzure\MediaServices\Templates\PlayReadyLicenseResponseTemplate;
use WindowsAzure\MediaServices\Templates\PlayReadyLicenseTemplate;
use WindowsAzure\MediaServices\Templates\PlayReadyPlayRight;
use WindowsAzure\MediaServices\Templates\ScmsRestriction;
use WindowsAzure\MediaServices\Templates\AgcAndColorStripeRestriction;
use WindowsAzure\MediaServices\Templates\ContentEncryptionKeyFromHeader;
use WindowsAzure\MediaServices\Templates\ContentEncryptionKeyFromKeyIdentifier;
use WindowsAzure\MediaServices\Templates\ExplicitAnalogTelevisionRestriction;
use WindowsAzure\MediaServices\Templates\PlayReadyLicenseType;
use WindowsAzure\MediaServices\Templates\UnknownOutputPassingOption;
use WindowsAzure\MediaServices\Templates\WidevineMessageSerializer;
use WindowsAzure\MediaServices\Templates\WidevineMessage;
use WindowsAzure\MediaServices\Templates\AllowedTrackTypes;
use WindowsAzure\MediaServices\Templates\ContentKeySpecs;
use WindowsAzure\MediaServices\Templates\Hdcp;
use WindowsAzure\MediaServices\Templates\RequiredOutputProtection;
use Tests\Framework\VirtualFileSystem;
use WindowsAzure\MediaServices\Templates\X509CertTokenVerificationKey;

/**
 * Unit tests for class MediaServicesRestProxy.
 *
 * @category Microsoft
 *
 * @author Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright Microsoft Corporation
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache License 2.0
 *
 * @version   Release: 0.5.0_2016-11
 *
 * @link https://github.com/windowsazure/azure-sdk-for-php
 */
class MediaServicesRestProxyTest extends MediaServicesRestProxyTestBase
{
    /**
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::createAsset
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::deleteAsset
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::wrapAtomEntry
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::getPropertiesFromAtomEntry
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::_createEntity
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::_deleteEntity
     */
    public function testCreateAsset()
    {
        // Setup
        $asset = new Asset(Asset::OPTIONS_NONE);
        $asset->setName(TestResources::MEDIA_SERVICES_ASSET_NAME.$this->createSuffix());

        // Test
        $result = $this->createAsset($asset);

        // Assert
        $this->assertEquals($asset->getName(), $result->getName());
    }

    /**
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::getAsset
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::_getEntity
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::wrapAtomEntry
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::getPropertiesFromAtomEntry
     */
    public function testGetAsset()
    {
        // Setup
        $asset = new Asset(Asset::OPTIONS_NONE);
        $name = TestResources::MEDIA_SERVICES_ASSET_NAME.$this->createSuffix();
        $asset->setName($name);
        $asset = $this->createAsset($asset);

        // Test
        $result = $this->mediaServicesWrapper->getAsset($asset);

        // Assert
        $this->assertEquals($asset->getId(), $result->getId());
    }

    /**
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::getAssetList
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::wrapAtomEntry
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::getPropertiesFromAtomEntry
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::_getEntityList
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::getEntryList
     * @group needs-review
     */
    public function testGetAssetList()
    {
        // Setup
        $asset = new Asset(Asset::OPTIONS_NONE);
        $asset->setName(TestResources::MEDIA_SERVICES_ASSET_NAME.$this->createSuffix());
        $asset = $this->createAsset($asset);

        // Test
        $result = $this->mediaServicesWrapper->getAssetList(array('$filter' => "Name eq '" . $asset->getName() . "'"));

        // Assert
        $this->assertCount(1, $result);
        $this->assertEquals($asset->getName(), $result[0]->getName());
    }

    /**
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::updateAsset
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::_updateEntity
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::wrapAtomEntry
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::getPropertiesFromAtomEntry
     */
    public function testUpdateAsset()
    {
        // Setup
        $asset = new Asset(Asset::OPTIONS_NONE);
        $asset = $this->createAsset($asset);
        $name = TestResources::MEDIA_SERVICES_ASSET_NAME.$this->createSuffix();

        // Test
        $asset->setName($name);
        $this->mediaServicesWrapper->updateAsset($asset);
        $result = $this->mediaServicesWrapper->getAsset($asset);

        // Assert
        $this->assertEquals($asset->getId(), $result->getId());
        $this->assertEquals($asset->getName(), $result->getName());
    }

    /**
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::createAccessPolicy
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::deleteAccessPolicy
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::wrapAtomEntry
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::getPropertiesFromAtomEntry
     */
    public function testCreateAccessPolicy()
    {
        // Setup
        $name = TestResources::MEDIA_SERVICES_ACCESS_POLICY_NAME.$this->createSuffix();
        $access = new AccessPolicy($name);
        $access->setName(TestResources::MEDIA_SERVICES_ACCESS_POLICY_NAME.$this->createSuffix());
        $access->setDurationInMinutes(30);

        // Test
        $result = $this->createAccessPolicy($access);

        // Assert
        $this->assertEquals($access->getName(), $result->getName());
    }

    /**
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::getAccessPolicyList
     */
    public function testGetAccessPolicyList()
    {
        // Setup
        $accessName = TestResources::MEDIA_SERVICES_ACCESS_POLICY_NAME.$this->createSuffix();

        $access = new AccessPolicy($accessName);
        $access->setDurationInMinutes(30);
        $access->setPermissions(AccessPolicy::PERMISSIONS_WRITE);
        $access = $this->createAccessPolicy($access);

        // Test
        $accessPolicies = $this->mediaServicesWrapper->getAccessPolicyList();

        // Assert
        $this->assertGreaterThanOrEqual(1, count($accessPolicies)); //this changes with the user's permissions
        $this->assertEquals($accessName, $accessPolicies[0]->getName());
    }

    /**
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::getAccessPolicy
     */
    public function testGetAccessPolicy()
    {
        // Setup
        $accessName = TestResources::MEDIA_SERVICES_ACCESS_POLICY_NAME.$this->createSuffix();

        $access = new AccessPolicy($accessName);
        $access->setDurationInMinutes(30);
        $access->setPermissions(AccessPolicy::PERMISSIONS_WRITE);
        $access = $this->createAccessPolicy($access);

        // Test
        $result = $this->mediaServicesWrapper->getAccessPolicy($access);

        // Assert
        $this->assertEquals($access->getId(), $result->getId());
    }

    /**
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::createLocator
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::deleteLocator
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::wrapAtomEntry
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::getPropertiesFromAtomEntry
     */
    public function testCreateLocator()
    {
        // Setup
        $asset = new Asset(Asset::OPTIONS_NONE);
        $asset->setName(TestResources::MEDIA_SERVICES_ASSET_NAME.$this->createSuffix());
        $asset = $this->createAsset($asset);

        $access = new AccessPolicy(TestResources::MEDIA_SERVICES_ACCESS_POLICY_NAME.$this->createSuffix());
        $access->setDurationInMinutes(30);
        $access->setPermissions(AccessPolicy::PERMISSIONS_READ + AccessPolicy::PERMISSIONS_WRITE + AccessPolicy::PERMISSIONS_DELETE + AccessPolicy::PERMISSIONS_LIST);
        $access = $this->createAccessPolicy($access);

        $locator = new Locator($asset, $access, 1);
        $locator->setName(TestResources::MEDIA_SERVICES_LOCATOR_NAME.$this->createSuffix());

        // Test
        $result = $this->createLocator($locator);

        // Assert
        $this->assertEquals($locator->getName(), $result->getName());
    }

    /**
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::createFileInfos
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::uploadAssetFile
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::wrapAtomEntry
     */
    public function testCreateFileInfos()
    {
        // Setup
        $asset = new Asset(Asset::OPTIONS_NONE);
        $asset->setName(TestResources::MEDIA_SERVICES_ASSET_NAME.$this->createSuffix());
        $asset = $this->createAsset($asset);

        $access = new AccessPolicy(TestResources::MEDIA_SERVICES_ACCESS_POLICY_NAME.$this->createSuffix());
        $access->setDurationInMinutes(30);
        $access->setPermissions(AccessPolicy::PERMISSIONS_WRITE);
        $access = $this->createAccessPolicy($access);

        $locator = new Locator($asset, $access, Locator::TYPE_SAS);
        $locator->setName(TestResources::MEDIA_SERVICES_LOCATOR_NAME.$this->createSuffix());
        $locator->setStartTime(new \DateTime('now -5 minutes'));
        $locator = $this->createLocator($locator);

        $fileName = TestResources::MEDIA_SERVICES_DUMMY_FILE_NAME;
        $this->mediaServicesWrapper->uploadAssetFile(
            $locator, $fileName, TestResources::MEDIA_SERVICES_DUMMY_FILE_CONTENT
        );

        // Test
        $this->mediaServicesWrapper->createFileInfos($asset);

        // Assert
        $assetFiles = $this->mediaServicesWrapper->getAssetFileList();
        $result = $this->mediaServicesWrapper->getAssetFile($assetFiles[0]);
        $this->assertGreaterThanOrEqual(1, count($assetFiles)); //this changes with the user's permissions

        $this->assertEquals($fileName, $assetFiles[0]->getName());
        $this->assertEquals($asset->getId(), $assetFiles[0]->getParentAssetId());
    }

    /**
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::createJob
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::deleteJob
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::_getCreateEmptyJobContext
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::_getCreateTaskContext
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::wrapAtomEntry
     */
    public function testCreateJobWithTasks()
    {
        // Setup
        $name = TestResources::MEDIA_SERVICES_JOB_NAME.$this->createSuffix();

        // Test
        $result = $this->createJobWithTasks($name);

        // Assert
        $this->assertEquals($name, $result->getName());
    }

    /**
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::getJobStatus
     */
    public function testGetJobStatus()
    {
        // Setup
        $name = TestResources::MEDIA_SERVICES_JOB_NAME.$this->createSuffix();
        $job = $this->createJobWithTasks($name);

        // Test
        $result = $this->mediaServicesWrapper->getJobStatus($job);

        // Assert
        $this->assertGreaterThanOrEqual(0, $result);
        $this->assertLessThanOrEqual(6, $result);
    }

    /**
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::cancelJob
     */
    public function testCancelJob()
    {
        // Setup
        $name = TestResources::MEDIA_SERVICES_JOB_NAME.$this->createSuffix();
        $job = $this->createJobWithTasks($name);

        // Test
        $job = $this->mediaServicesWrapper->cancelJob($job);

        // Assert
        $this->assertNull($job);
    }

    /**
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::createJobTemplate
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::deleteJobTemplate
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::_getCreateEmptyJobTemplateContext
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::_getCreateTaskTemplateContext
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::wrapAtomEntry
     */
    public function testCreateJobTemplate()
    {
        // Setup
        $name = TestResources::MEDIA_SERVICES_JOB_TEMPLATE_NAME.$this->createSuffix();

        // Test
        $result = $this->createJobTemplateWithTasks($name);

        // Assert
        $this->assertEquals($name, $result->getName());
    }

    /**
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::getAssetLocators
     */
    public function testGetAssetLocators()
    {

        // Setup
        $asset = new Asset(Asset::OPTIONS_NONE);
        $asset->setName(TestResources::MEDIA_SERVICES_ASSET_NAME.$this->createSuffix());
        $asset = $this->createAsset($asset);

        $access = new AccessPolicy(TestResources::MEDIA_SERVICES_ACCESS_POLICY_NAME.$this->createSuffix());
        $access->setDurationInMinutes(30);
        $access->setPermissions(AccessPolicy::PERMISSIONS_READ + AccessPolicy::PERMISSIONS_WRITE + AccessPolicy::PERMISSIONS_DELETE + AccessPolicy::PERMISSIONS_LIST);
        $access = $this->createAccessPolicy($access);

        $locator = new Locator($asset, $access, Locator::TYPE_SAS);
        $locator->setName(TestResources::MEDIA_SERVICES_LOCATOR_NAME.$this->createSuffix());
        $locator = $this->createLocator($locator);

        // Test
        $result = $this->mediaServicesWrapper->getAssetLocators($asset);

        // Assert
        $this->assertEquals($asset->getId(), $result[0]->getAssetId());
        $this->assertEquals($access->getId(), $result[0]->getAccessPolicyId());
    }

    /**
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::getAssetStorageAccount
     */
    public function testGetAssetStorageAccount()
    {

        // Setup
        $asset = new Asset(Asset::OPTIONS_NONE);
        $asset->setName(TestResources::MEDIA_SERVICES_ASSET_NAME.$this->createSuffix());
        $asset = $this->createAsset($asset);

        // Test
        $result = $this->mediaServicesWrapper->getAssetStorageAccount($asset);

        // Assert
        $this->assertNotEmpty($result);
        $this->assertNotEmpty($result->getName());
    }

    /**
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::getLocator
     */
    public function testGetLocator()
    {

        // Setup
        $asset = new Asset(Asset::OPTIONS_NONE);
        $asset->setName(TestResources::MEDIA_SERVICES_ASSET_NAME.$this->createSuffix());
        $asset = $this->createAsset($asset);

        $access = new AccessPolicy(TestResources::MEDIA_SERVICES_ACCESS_POLICY_NAME.$this->createSuffix());
        $access->setDurationInMinutes(30);
        $access->setPermissions(AccessPolicy::PERMISSIONS_READ + AccessPolicy::PERMISSIONS_WRITE + AccessPolicy::PERMISSIONS_DELETE + AccessPolicy::PERMISSIONS_LIST);
        $access = $this->createAccessPolicy($access);

        $locator = new Locator($asset, $access, Locator::TYPE_SAS);
        $locator->setName(TestResources::MEDIA_SERVICES_LOCATOR_NAME.$this->createSuffix());
        $locator = $this->createLocator($locator);

        // Test
        $result = $this->mediaServicesWrapper->getLocator($locator);

        // Assert
        $this->assertEquals($locator->getId(), $result->getId());
        $this->assertEquals($asset->getId(), $result->getAssetId());
        $this->assertEquals($access->getId(), $result->getAccessPolicyId());
    }

    /**
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::getLocatorAccessPolicy
     */
    public function testGetLocatorAccessPolicy()
    {

        // Setup
        $asset = new Asset(Asset::OPTIONS_NONE);
        $asset->setName(TestResources::MEDIA_SERVICES_ASSET_NAME.$this->createSuffix());
        $asset = $this->createAsset($asset);

        $access = new AccessPolicy(TestResources::MEDIA_SERVICES_ACCESS_POLICY_NAME.$this->createSuffix());
        $access->setDurationInMinutes(30);
        $access->setPermissions(AccessPolicy::PERMISSIONS_READ + AccessPolicy::PERMISSIONS_WRITE + AccessPolicy::PERMISSIONS_DELETE + AccessPolicy::PERMISSIONS_LIST);
        $access = $this->createAccessPolicy($access);

        $locator = new Locator($asset, $access, Locator::TYPE_SAS);
        $locator->setName(TestResources::MEDIA_SERVICES_LOCATOR_NAME.$this->createSuffix());
        $locator = $this->createLocator($locator);

        // Test
        $result = $this->mediaServicesWrapper->getLocatorAccessPolicy($locator);

        // Assert
        $this->assertEquals($access->getId(), $result->getId());
    }

    /**
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::getLocatorAsset
     */
    public function testGetLocatorAsset()
    {

        // Setup
        $asset = new Asset(Asset::OPTIONS_NONE);
        $asset->setName(TestResources::MEDIA_SERVICES_ASSET_NAME.$this->createSuffix());
        $asset = $this->createAsset($asset);

        $access = new AccessPolicy(TestResources::MEDIA_SERVICES_ACCESS_POLICY_NAME.$this->createSuffix());
        $access->setDurationInMinutes(30);
        $access->setPermissions(AccessPolicy::PERMISSIONS_READ + AccessPolicy::PERMISSIONS_WRITE + AccessPolicy::PERMISSIONS_DELETE + AccessPolicy::PERMISSIONS_LIST);
        $access = $this->createAccessPolicy($access);

        $locator = new Locator($asset, $access, Locator::TYPE_SAS);
        $locator->setName(TestResources::MEDIA_SERVICES_LOCATOR_NAME.$this->createSuffix());
        $locator = $this->createLocator($locator);

        // Test
        $result = $this->mediaServicesWrapper->getLocatorAsset($locator);

        // Assert
        $this->assertEquals($asset->getId(), $result->getId());
    }

    /**
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::getLocatorList
     * @group needs-review
     */
    public function testGetLocatorList()
    {

        // Setup
        $asset = new Asset(Asset::OPTIONS_NONE);
        $asset->setName(TestResources::MEDIA_SERVICES_ASSET_NAME.$this->createSuffix());
        $asset = $this->createAsset($asset);

        $access = new AccessPolicy(TestResources::MEDIA_SERVICES_ACCESS_POLICY_NAME.$this->createSuffix());
        $access->setDurationInMinutes(30);
        $access->setPermissions(AccessPolicy::PERMISSIONS_READ + AccessPolicy::PERMISSIONS_WRITE + AccessPolicy::PERMISSIONS_DELETE + AccessPolicy::PERMISSIONS_LIST);
        $access = $this->createAccessPolicy($access);

        $locator = new Locator($asset, $access, Locator::TYPE_SAS);
        $locator->setName(TestResources::MEDIA_SERVICES_LOCATOR_NAME.$this->createSuffix());
        $locator = $this->createLocator($locator);

        // Test
        $result = $this->mediaServicesWrapper->getLocatorList(array('$filter' => "Name eq '" . $locator->getName() . "'"));

        // Assert
        $this->assertCount(1, $result);
        $this->assertEquals($locator->getName(), $result[0]->getName());
        $this->assertEquals($locator->getId(), $result[0]->getId());
    }

    /**
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::updateLocator
     */
    public function testUpdateLocator()
    {

        // Setup
        $asset = new Asset(Asset::OPTIONS_NONE);
        $asset->setName(TestResources::MEDIA_SERVICES_ASSET_NAME.$this->createSuffix());
        $asset = $this->createAsset($asset);

        $access = new AccessPolicy(TestResources::MEDIA_SERVICES_ACCESS_POLICY_NAME.$this->createSuffix());
        $access->setDurationInMinutes(30);
        $access->setPermissions(AccessPolicy::PERMISSIONS_READ);
        $access = $this->createAccessPolicy($access);

        $locator = new Locator($asset, $access, Locator::TYPE_ON_DEMAND_ORIGIN);
        $locator->setName(TestResources::MEDIA_SERVICES_LOCATOR_NAME.$this->createSuffix());
        $locator = $this->createLocator($locator);
        $newName = TestResources::MEDIA_SERVICES_LOCATOR_NAME.$this->createSuffix();

        // Test
        $locator->setName($newName);
        $this->mediaServicesWrapper->updateLocator($locator);

        // Assert
        $this->assertEquals($newName, $locator->getName());
    }

    /**
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::getAssetFileList
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::wrapAtomEntry
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::getPropertiesFromAtomEntry
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::getAssetFile
     */
    public function testGetAssetFile()
    {
        // Setup
        $asset = $this->createAssetWithFile();
        $assetFiles = $this->mediaServicesWrapper->getAssetFileList();

        // Test
        $result = $this->mediaServicesWrapper->getAssetFile($assetFiles[0]);

        // Assert
        $this->assertEquals($assetFiles[0]->getName(), $result->getName());
        $this->assertEquals($asset->getId(), $result->getParentAssetId());
    }

    /**
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::updateAssetFile
     */
    public function testUpdateAssetFile()
    {

        // Setup
        $asset = $this->createAssetWithFile();
        $newFileName = TestResources::MEDIA_SERVICES_DUMMY_FILE_NAME_1;
        $assetFiles = $this->mediaServicesWrapper->getAssetFileList();

        // Test
        $assetFiles[0]->setName($newFileName);
        $this->mediaServicesWrapper->updateAssetFile($assetFiles[0]);
        $result = $assetFiles[0]->getName();

        // Assert
        $this->assertEquals($newFileName, $result);
    }

    /**
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::getJob
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::getJobList
     */
    public function testGetJob()
    {

        //Setup
        $job = $this->createJobWithTasks(TestResources::MEDIA_SERVICES_JOB_NAME.$this->createSuffix());
        $jobList = $this->mediaServicesWrapper->getJobList();

        // Test
        $result = $this->mediaServicesWrapper->getJob($jobList[0]);

        // Assert
        $this->assertEquals($job->getId(), $result->getId());
        $this->assertEquals($job->getName(), $result->getName());
    }

    /**
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::getJobTasks
     */
    public function testGetJobTasks()
    {

        //Setup
        $asset = $this->createAssetWithFile();
        $outputAssetName = $this->getOutputAssetName();

        $taskBody = '<?xml version="1.0" encoding="utf-8"?><taskBody><inputAsset>JobInputAsset(0)</inputAsset><outputAsset assetCreationOptions="0" assetName="'.$outputAssetName.'">JobOutputAsset(0)</outputAsset></taskBody>';
        $mediaProcessorId = 'nb:mpid:UUID:ff4df607-d419-42f0-bc17-a481b1331e56';
        $task = new Task($taskBody, $mediaProcessorId, TaskOptions::NONE);
        $task->setConfiguration('H.264 HD 720p VBR');

        $job = new Job();
        $job->setName(TestResources::MEDIA_SERVICES_JOB_NAME.$this->createSuffix());
        $job = $this->createJob($job, [$asset], [$task]);

        // Test
        $result = $this->mediaServicesWrapper->getJobTasks($job);

        // Assert
        $this->assertEquals($mediaProcessorId, $result[0]->getMediaProcessorId());
        $this->assertEquals($taskBody, $result[0]->getTaskBody());
    }

    /**
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::getJobInputMediaAssets
     */
    public function testGetJobInputMediaAssets()
    {

        //Setup
        $asset = $this->createAssetWithFile();
        $outputAssetName = $this->getOutputAssetName();

        $taskBody = '<?xml version="1.0" encoding="utf-8"?><taskBody><inputAsset>JobInputAsset(0)</inputAsset><outputAsset assetCreationOptions="0" assetName="'.$outputAssetName.'">JobOutputAsset(0)</outputAsset></taskBody>';
        $mediaProcessorId = 'nb:mpid:UUID:ff4df607-d419-42f0-bc17-a481b1331e56';
        $task = new Task($taskBody, $mediaProcessorId, TaskOptions::NONE);
        $task->setConfiguration('H.264 HD 720p VBR');

        $job = new Job();
        $job->setName(TestResources::MEDIA_SERVICES_JOB_NAME.$this->createSuffix());
        $job = $this->createJob($job, [$asset], [$task]);

        // Test
        $result = $this->mediaServicesWrapper->getJobInputMediaAssets($job);

        // Assert
        $this->assertEquals($asset->getId(), $result[0]->getId());
        $this->assertEquals($asset->getName(), $result[0]->getName());
    }

    /**
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::getMediaProcessors
     */
    public function testGetMediaProcessors()
    {
        // Test
        $result = $this->mediaServicesWrapper->getMediaProcessors();

        // Assert
        $this->assertNotEmpty($result);
    }

    /**
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::getLatestMediaProcessor
     */
    public function testGetLatestMediaProcessor()
    {
        // Setup
        $name = TestResources::MEDIA_SERVICES_PROCESSOR_NAME;

        // Test
        $result = $this->mediaServicesWrapper->getLatestMediaProcessor($name);

        // Assert
        $this->assertNotNull($result);
        $this->assertEquals($name, $result->getName());
    }

    /**
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::getJobOutputMediaAssets
     */
    public function testGetJobOutputMediaAssets()
    {

        //Setup
        $asset = $this->createAssetWithFile();
        $outputAssetName = $this->getOutputAssetName();

        $taskBody = '<?xml version="1.0" encoding="utf-8"?><taskBody><inputAsset>JobInputAsset(0)</inputAsset><outputAsset assetCreationOptions="0" assetName="'.$outputAssetName.'">JobOutputAsset(0)</outputAsset></taskBody>';
        $mediaProcessorId = 'nb:mpid:UUID:ff4df607-d419-42f0-bc17-a481b1331e56';
        $task = new Task($taskBody, $mediaProcessorId, TaskOptions::NONE);
        $task->setConfiguration('H.264 HD 720p VBR');

        $job = new Job();
        $job->setName(TestResources::MEDIA_SERVICES_JOB_NAME.$this->createSuffix());
        $job = $this->createJob($job, [$asset], [$task]);

        // Test
        $result = $this->mediaServicesWrapper->getJobOutputMediaAssets($job);

        // Assert
        $this->assertNotEquals($asset->getId(), $result[0]->getId());
        $this->assertEquals($outputAssetName, $result[0]->getName());
    }

    /**
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::getTaskList
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::_getEntityList
     */
    public function testGetTaskList()
    {

        // Setup
        $asset = $this->createAssetWithFile();
        $outputAssetName = $this->getOutputAssetName();

        $taskBody = '<?xml version="1.0" encoding="utf-8"?><taskBody><inputAsset>JobInputAsset(0)</inputAsset><outputAsset assetCreationOptions="0" assetName="'.$outputAssetName.'">JobOutputAsset(0)</outputAsset></taskBody>';
        $mediaProcessorId = 'nb:mpid:UUID:ff4df607-d419-42f0-bc17-a481b1331e56';
        $task = new Task($taskBody, $mediaProcessorId, TaskOptions::NONE);
        $task->setConfiguration('H.264 HD 720p VBR');

        $job = new Job();
        $job->setName(TestResources::MEDIA_SERVICES_JOB_NAME.$this->createSuffix());
        $job = $this->createJob($job, [$asset], [$task]);

        // Test
        $result = $this->mediaServicesWrapper->getTaskList();

        // Assert
        $this->assertGreaterThanOrEqual(1, count($result)); //this changes with the user's permissions
        $this->assertEquals($task->getName(), $result[0]->getName());
        $this->assertEquals($taskBody, $result[0]->getTaskBody());
    }

    /**
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::getJobTemplate
     */
    public function testGetJobTemplate()
    {
        // Setup
        $name = TestResources::MEDIA_SERVICES_JOB_TEMPLATE_NAME.$this->createSuffix();
        $jobTemplate = $this->createJobTemplateWithTasks($name);

        // Test
        $result = $this->mediaServicesWrapper->getJobTemplate($jobTemplate);

        // Assert
        $this->assertEquals($name, $result->getName());
        $this->assertEquals($jobTemplate->getId(), $result->getId());
    }

    /**
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::getJobTemplateList
     * @group needs-review
     */
    public function testGetJobTemplateList()
    {
        // Setup
        $name = TestResources::MEDIA_SERVICES_JOB_TEMPLATE_NAME.$this->createSuffix();
        $jobTemplate = $this->createJobTemplateWithTasks($name);

        // Test
        $result = $this->mediaServicesWrapper->getJobTemplateList(array('$filter' => "Name eq '" . $name . "'"));

        // Assert
        $this->assertEquals(1, count($result));
        $this->assertEquals($name, $result[0]->getName());
        $this->assertEquals($jobTemplate->getId(), $result[0]->getId());
    }

    /**
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::getJobTemplateTaskTemplateList
     */
    public function testGetJobTemplateTaskTemplateList()
    {

        // Setup
        $mediaProcessor = $this->mediaServicesWrapper->getLatestMediaProcessor('Media Encoder Standard');
        $configuration = 'H.264 HD 720p VBR';
        $name = TestResources::MEDIA_SERVICES_JOB_TEMPLATE_NAME.$this->createSuffix();

        $jobTemplate = $this->createJobTemplateWithTasks($name);

        // Test
        $result = $this->mediaServicesWrapper->getJobTemplateTaskTemplateList($jobTemplate);

        // Assert
        $this->assertEquals(1, count($result));
        $this->assertEquals($configuration, $result[0]->getConfiguration());
        $this->assertEquals($mediaProcessor->getId(), $result[0]->getMediaProcessorId());
    }

    /**
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::getTaskTemplateList
     * @group needs-review
     */
    public function testGetTaskTemplateList()
    {
        // Setup
        $name = TestResources::MEDIA_SERVICES_JOB_TEMPLATE_NAME.$this->createSuffix();
        $mediaProcessor = $this->mediaServicesWrapper->getLatestMediaProcessor('Media Encoder Standard');
        $configuration = 'H.264 HD 720p VBR';

        $jobTemplate = $this->createJobTemplateWithTasks($name);

        // Test
        $result = $this->mediaServicesWrapper->getTaskTemplateList();

        // Assert
        $this->assertTrue(count($result) >= 1);
    }

    /**
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::getAssetAssetFileList
     */
    public function testGetAssetAssetFileList()
    {

        // Setup
        $asset = $this->createAssetWithFile();

        // Test
        $result = $this->mediaServicesWrapper->getAssetAssetFileList($asset);

        // Assert
        $this->assertEquals(1, count($result));
        $this->assertEquals($asset->getId(), $result[0]->getParentAssetId());
    }

    /**
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::getAssetParentAssets
     */
    public function testGetAssetParentAsset()
    {

        // Setup
        $name = $this->getOutputAssetName();
        $mediaProcessor = $this->mediaServicesWrapper->getLatestMediaProcessor('Media Encoder Standard');
        $inputAsset = $this->createAssetWithFile();

        $taskBody = '<?xml version="1.0" encoding="utf-8"?><taskBody><inputAsset>JobInputAsset(0)</inputAsset><outputAsset assetCreationOptions="0" assetName="'.$name.'">JobOutputAsset(0)</outputAsset></taskBody>';
        $task = new Task($taskBody, $mediaProcessor->getId(), TaskOptions::NONE);
        $task->setConfiguration('H.264 HD 720p VBR');

        $job = new Job();
        $job->setName($name);
        $job = $this->createJob($job, [$inputAsset], [$task]);

        $assetList = $this->mediaServicesWrapper->getAssetList();

        $parentAssetId = null;
        // Test
        foreach ($assetList as $assetElement) {
            if (strcmp($assetElement->getName(), $name) == 0) {
                $parentAssetId = $this->mediaServicesWrapper->getAssetParentAssets($assetElement);
            }
        }

        // Assert
        $this->assertEquals(1, count($parentAssetId));
        $this->assertEquals($inputAsset->getId(), $parentAssetId[0]->getId());
    }

    /**
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::createIngestManifest
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::deleteIngestManifest
     */
    public function testCreateIngestManifest()
    {

        // Setup
        $ingestManifest = new IngestManifest();
        $name = TestResources::MEDIA_SERVICES_INGEST_MANIFEST.$this->createSuffix();
        $ingestManifest->setName($name);

        // Test
        $ingestManifest = $this->createIngestManifest($ingestManifest);

        // Assert
        $this->assertEquals($name, $ingestManifest->getName());
    }

    /**
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::getIngestManifest
     */
    public function testGetIngestManifest()
    {

        // Setup
        $ingestManifest = new IngestManifest();
        $name = TestResources::MEDIA_SERVICES_INGEST_MANIFEST.$this->createSuffix();
        $ingestManifest->setName($name);
        $ingestManifest = $this->createIngestManifest($ingestManifest);

        // Test
        $result = $this->mediaServicesWrapper->getIngestManifest($ingestManifest);

        // Assert
        $this->assertEquals($name, $result->getName());
    }

    /**
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::getIngestManifestList
     */
    public function testGetIngestManifestList()
    {

        // Setup
        $ingestManifest = new IngestManifest();
        $name = TestResources::MEDIA_SERVICES_INGEST_MANIFEST.$this->createSuffix();
        $ingestManifest->setName($name);
        $ingestManifest = $this->createIngestManifest($ingestManifest);

        // Test
        $result = $this->mediaServicesWrapper->getIngestManifestList();

        // Assert
        $this->assertGreaterThanOrEqual(1, count($result));
        $this->assertEquals($name, $result[0]->getName());
    }

    /**
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::getIngestManifestAssets
     */
    public function testGetIngestManifestAssets()
    {

        // Setup
        $ingestManifest = new IngestManifest();
        $name = TestResources::MEDIA_SERVICES_INGEST_MANIFEST.$this->createSuffix();
        $ingestManifest->setName($name);
        $ingestManifest = $this->createIngestManifest($ingestManifest);
        $ingestManifestFileName = TestResources::MEDIA_SERVICES_DUMMY_FILE_NAME;

        $asset = new Asset(Asset::OPTIONS_NONE);
        $asset->setName(TestResources::MEDIA_SERVICES_ASSET_NAME.$this->createSuffix());
        $asset = $this->createAsset($asset);

        $ingestManifestAsset = new IngestManifestAsset($ingestManifest->getId());
        $ingestManifestAsset = $this->createIngestManifestAsset($ingestManifestAsset, $asset);

        $ingestManifestFile = new IngestManifestFile($ingestManifestFileName, $ingestManifest->getId(), $ingestManifestAsset->getId());

        $ingestManifestFile = $this->createIngestManifestFile($ingestManifestFile);

        // Test
        $result = $this->mediaServicesWrapper->getIngestManifestAssets($ingestManifest);

        // Assert
        $this->assertCount(1, $result);
        $this->assertEquals($ingestManifest->getId(), $result[0]->getParentIngestManifestId());
    }

    /**
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::getPendingIngestManifestAssets
     */
    public function testGetPendingIngestManifestAssets()
    {

        // Setup
        $ingestManifest = new IngestManifest();
        $name = TestResources::MEDIA_SERVICES_INGEST_MANIFEST.$this->createSuffix();
        $ingestManifest->setName($name);
        $ingestManifest = $this->createIngestManifest($ingestManifest);
        $ingestManifestFileName = TestResources::MEDIA_SERVICES_DUMMY_FILE_NAME;

        $asset = new Asset(Asset::OPTIONS_NONE);
        $asset->setName(TestResources::MEDIA_SERVICES_ASSET_NAME.$this->createSuffix());
        $asset = $this->createAsset($asset);

        $ingestManifestAsset = new IngestManifestAsset($ingestManifest->getId());
        $ingestManifestAsset = $this->createIngestManifestAsset($ingestManifestAsset, $asset);

        $ingestManifestFile = new IngestManifestFile($ingestManifestFileName, $ingestManifest->getId(), $ingestManifestAsset->getId());

        $ingestManifestFile = $this->createIngestManifestFile($ingestManifestFile);

        // Test
        $result = $this->mediaServicesWrapper->getPendingIngestManifestAssets($ingestManifest);

        // Assert
        $this->assertCount(1, $result);
        $this->assertEquals($ingestManifest->getId(), $result[0]->getParentIngestManifestId());
    }

    /**
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::getIngestManifestStorageAccount
     */
    public function testGetIngestManifestStorageAccount()
    {

        // Setup
        $ingestManifest = new IngestManifest();
        $name = TestResources::MEDIA_SERVICES_INGEST_MANIFEST.$this->createSuffix();
        $ingestManifest->setName($name);
        $ingestManifest = $this->createIngestManifest($ingestManifest);

        // Test
        $result = $this->mediaServicesWrapper->getIngestManifestStorageAccount($ingestManifest);

        // Assert
        $this->assertEquals($ingestManifest->getStorageAccountName(), $result->getName());
    }

    /**
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::updateIngestManifest
     */
    public function testUpdateIngestManifest()
    {

        // Setup
        $ingestManifest = new IngestManifest();
        $name = TestResources::MEDIA_SERVICES_INGEST_MANIFEST.$this->createSuffix();
        $ingestManifest->setName($name);
        $ingestManifest = $this->createIngestManifest($ingestManifest);
        $name = TestResources::MEDIA_SERVICES_INGEST_MANIFEST.$this->createSuffix();

        // Test
        $ingestManifest->setName($name);
        $this->mediaServicesWrapper->updateIngestManifest($ingestManifest);

        // Assert
        $this->assertEquals($name, $ingestManifest->getName());
    }

    /**
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::createIngestManifestAsset
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::deleteIngestManifestAsset
     */
    public function testCreateIngestManifestAsset()
    {

        //  Setup
        $ingestManifest = new IngestManifest();
        $name = TestResources::MEDIA_SERVICES_INGEST_MANIFEST.$this->createSuffix();
        $ingestManifest->setName($name);
        $ingestManifest = $this->createIngestManifest($ingestManifest);

        $asset = new Asset(Asset::OPTIONS_NONE);
        $asset->setName(TestResources::MEDIA_SERVICES_ASSET_NAME.$this->createSuffix());
        $asset = $this->createAsset($asset);

        $ingestManifestAsset = new IngestManifestAsset($ingestManifest->getId());

        // Test
        $ingestManifestAsset = $this->createIngestManifestAsset($ingestManifestAsset, $asset);

        // Assert
        $this->assertEquals($ingestManifest->getId(), $ingestManifestAsset->getParentIngestManifestId());
    }

    /**
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::getIngestManifestAsset
     */
    public function testGetIngestManifestAsset()
    {

        //  Setup
        $ingestManifest = new IngestManifest();
        $name = TestResources::MEDIA_SERVICES_INGEST_MANIFEST.$this->createSuffix();
        $ingestManifest->setName($name);
        $ingestManifest = $this->createIngestManifest($ingestManifest);

        $asset = new Asset(Asset::OPTIONS_NONE);
        $asset->setName(TestResources::MEDIA_SERVICES_ASSET_NAME.$this->createSuffix());
        $asset = $this->createAsset($asset);

        $ingestManifestAsset = new IngestManifestAsset($ingestManifest->getId());
        $ingestManifestAsset = $this->createIngestManifestAsset($ingestManifestAsset, $asset);

        // Test
        $result = $this->mediaServicesWrapper->getIngestManifestAsset($ingestManifestAsset);

        // Assert
        $this->assertEquals($ingestManifest->getId(), $result->getParentIngestManifestId());
        $this->assertEquals($ingestManifestAsset->getId(), $result->getId());
    }

    /**
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::getIngestManifestAssetList
     */
    public function testGetIngestManifestAssetList()
    {

        //  Setup
        $ingestManifest = new IngestManifest();
        $name = TestResources::MEDIA_SERVICES_INGEST_MANIFEST.$this->createSuffix();
        $ingestManifest->setName($name);
        $ingestManifest = $this->createIngestManifest($ingestManifest);

        $asset = new Asset(Asset::OPTIONS_NONE);
        $asset->setName(TestResources::MEDIA_SERVICES_ASSET_NAME.$this->createSuffix());
        $asset = $this->createAsset($asset);

        $ingestManifestAsset = new IngestManifestAsset($ingestManifest->getId());
        $ingestManifestAsset = $this->createIngestManifestAsset($ingestManifestAsset, $asset);

        // Test
        $result = $this->mediaServicesWrapper->getIngestManifestAssetList();

        // Assert
        $this->assertGreaterThanOrEqual(1, count($result));
        $this->assertEquals($ingestManifestAsset->getId(), $result[0]->getId());
    }

    /**
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::getIngestManifestAssetFiles
     */
    public function testGetIngestManifestAssetFiles()
    {

        //  Setup
        $ingestManifest = new IngestManifest();
        $name = TestResources::MEDIA_SERVICES_INGEST_MANIFEST.$this->createSuffix();
        $ingestManifest->setName($name);
        $ingestManifest = $this->createIngestManifest($ingestManifest);
        $ingestAssetFileName = TestResources::MEDIA_SERVICES_DUMMY_FILE_NAME;

        $asset = new Asset(Asset::OPTIONS_NONE);
        $asset->setName(TestResources::MEDIA_SERVICES_ASSET_NAME.$this->createSuffix());
        $asset = $this->createAsset($asset);

        $ingestManifestAsset = new IngestManifestAsset($ingestManifest->getId());
        $ingestManifestAsset = $this->createIngestManifestAsset($ingestManifestAsset, $asset);

        $ingestManifestAssetFile = new IngestManifestFile($ingestAssetFileName, $ingestManifest->getId(), $ingestManifestAsset->getId());
        $ingestManifestAssetFile = $this->createIngestManifestFile($ingestManifestAssetFile);

        // Test
        $result = $this->mediaServicesWrapper->getIngestManifestAssetFiles($ingestManifestAsset);

        // Assert
        $this->assertCount(1, $result);
        $this->assertEquals($ingestManifest->getId(), $result[0]->getParentIngestManifestId());
        $this->assertEquals($ingestManifestAsset->getId(), $result[0]->getParentIngestManifestAssetId());
        $this->assertEquals($ingestAssetFileName, $result[0]->getName());
    }

    /**
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::createIngestManifestFile
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::deleteIngestManifestFile
     */
    public function testCreateIngestManifestFile()
    {

        //  Setup
        $ingestManifest = new IngestManifest();
        $name = TestResources::MEDIA_SERVICES_INGEST_MANIFEST.$this->createSuffix();
        $ingestManifest->setName($name);
        $ingestManifest = $this->createIngestManifest($ingestManifest);
        $ingestAssetFileName = TestResources::MEDIA_SERVICES_DUMMY_FILE_NAME;

        $asset = new Asset(Asset::OPTIONS_NONE);
        $asset->setName(TestResources::MEDIA_SERVICES_ASSET_NAME.$this->createSuffix());
        $asset = $this->createAsset($asset);

        $ingestManifestAsset = new IngestManifestAsset($ingestManifest->getId());
        $ingestManifestAsset = $this->createIngestManifestAsset($ingestManifestAsset, $asset);

        $ingestManifestFile = new IngestManifestFile($ingestAssetFileName, $ingestManifest->getId(), $ingestManifestAsset->getId());

        // Test
        $ingestManifestFile = $this->createIngestManifestFile($ingestManifestFile);

        // Assert
        $this->assertEquals($ingestManifest->getId(), $ingestManifestFile->getParentIngestManifestId());
        $this->assertEquals($ingestManifestAsset->getId(), $ingestManifestFile->getParentIngestManifestAssetId());
        $this->assertEquals($ingestAssetFileName, $ingestManifestFile->getName());
    }

    /**
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::getIngestManifestFile
     */
    public function testGetIngestManifestFile()
    {

        // Setup
        $ingestManifest = new IngestManifest();
        $name = TestResources::MEDIA_SERVICES_INGEST_MANIFEST.$this->createSuffix();
        $ingestManifest->setName($name);
        $ingestManifest = $this->createIngestManifest($ingestManifest);
        $ingestAssetFileName = TestResources::MEDIA_SERVICES_DUMMY_FILE_NAME;

        $asset = new Asset(Asset::OPTIONS_NONE);
        $asset->setName(TestResources::MEDIA_SERVICES_ASSET_NAME.$this->createSuffix());
        $asset = $this->createAsset($asset);

        $ingestManifestAsset = new IngestManifestAsset($ingestManifest->getId());
        $ingestManifestAsset = $this->createIngestManifestAsset($ingestManifestAsset, $asset);

        $ingestManifestFile = new IngestManifestFile($ingestAssetFileName, $ingestManifest->getId(), $ingestManifestAsset->getId());
        $ingestManifestFile = $this->createIngestManifestFile($ingestManifestFile);

        // Test
        $result = $this->mediaServicesWrapper->getIngestManifestFile($ingestManifestFile);

        // Assert
        $this->assertEquals($ingestManifestFile->getParentIngestManifestId(), $result->getParentIngestManifestId());
        $this->assertEquals($ingestManifestFile->getParentIngestManifestAssetId(), $result->getParentIngestManifestAssetId());
        $this->assertEquals($ingestManifestFile->getName(), $result->getName());
    }

    /**
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::getIngestManifestFileList
     */
    public function testGetIngestManifestFileList()
    {

        //  Setup
        $ingestManifest = new IngestManifest();
        $name = TestResources::MEDIA_SERVICES_INGEST_MANIFEST.$this->createSuffix();
        $ingestManifest->setName($name);
        $ingestManifest = $this->createIngestManifest($ingestManifest);
        $ingestAssetFileName = TestResources::MEDIA_SERVICES_DUMMY_FILE_NAME.$this->createSuffix();

        $asset = new Asset(Asset::OPTIONS_NONE);
        $asset->setName(TestResources::MEDIA_SERVICES_ASSET_NAME.$this->createSuffix());
        $asset = $this->createAsset($asset);

        $ingestManifestAsset = new IngestManifestAsset($ingestManifest->getId());
        $ingestManifestAsset = $this->createIngestManifestAsset($ingestManifestAsset, $asset);

        $ingestManifestFile = new IngestManifestFile($ingestAssetFileName, $ingestManifest->getId(), $ingestManifestAsset->getId());
        $ingestManifestFile = $this->createIngestManifestFile($ingestManifestFile);

        // Test
        $result = $this->mediaServicesWrapper->getIngestManifestFileList();

        // Assert
        $this->assertGreaterThanOrEqual(1, count($result));
        $this->assertEquals($ingestManifestFile->getParentIngestManifestId(), $result[0]->getParentIngestManifestId());
        $this->assertEquals($ingestManifestFile->getParentIngestManifestAssetId(), $result[0]->getParentIngestManifestAssetId());
        $this->assertEquals($ingestManifestFile->getName(), $result[0]->getName());
    }

    /**
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::createContentKey
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::deleteContentKey
     */
    public function testCreateContentKey()
    {

        // Setup
        $aesKey = Utilities::generateCryptoKey(32);

        $protectionKeyId = $this->mediaServicesWrapper->getProtectionKeyId(
            ProtectionKeyTypes::X509_CERTIFICATE_THUMBPRINT
        );
        $protectionKey = $this->mediaServicesWrapper->getProtectionKey($protectionKeyId);

        $contentKey = new ContentKey();
        $contentKey->setContentKey($aesKey, $protectionKey);
        $contentKey->setProtectionKeyId($protectionKeyId);
        $contentKey->setProtectionKeyType(ProtectionKeyTypes::X509_CERTIFICATE_THUMBPRINT);
        $contentKey->setContentKeyType(ContentKeyTypes::ENVELOPE_ENCRYPTION);

        // Test
        $result = $this->createContentKey($contentKey);

        // Assert
        $this->assertEquals($contentKey->getId(), $result->getId());
        //current time and value of 'Created' field in $contentKey may differ on some seconds. That's why we check the difference in the boundary of hour
        $this->assertLessThan(3600, abs(time() - $result->getCreated()->getTimestamp()));
        $this->assertEquals($contentKey->getProtectionKeyId(), $result->getProtectionKeyId());
        $this->assertEquals($contentKey->getProtectionKeyType(), $result->getProtectionKeyType());
        $this->assertEquals($contentKey->getContentKeyType(), $result->getContentKeyType());

        return $result;
    }

    /**
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::getContentKeyList
     * @group needs-review
     * @group working
     */
    public function testGetContentKeyList()
    {

        // Setup
        $aesKey = Utilities::generateCryptoKey(32);

        $protectionKeyId = $this->mediaServicesWrapper->getProtectionKeyId(ProtectionKeyTypes::X509_CERTIFICATE_THUMBPRINT);
        $protectionKey = $this->mediaServicesWrapper->getProtectionKey($protectionKeyId);

        $contentKey = new ContentKey();
        $contentKey->setContentKey($aesKey, $protectionKey);
        $contentKey->setProtectionKeyId($protectionKeyId);
        $contentKey->setProtectionKeyType(ProtectionKeyTypes::X509_CERTIFICATE_THUMBPRINT);
        $contentKey->setContentKeyType(ContentKeyTypes::STORAGE_ENCRYPTION);
        $contentKey = $this->createContentKey($contentKey);

        // Test
        $result = $this->mediaServicesWrapper->getContentKeyList(array('$filter' => "Id eq '" . $contentKey->getId() . "'"));

        // Assert
        $this->assertCount(1, $result);
        $this->assertEquals($contentKey->getId(), $result[0]->getId());
        $this->assertEquals($contentKey->getProtectionKeyId(), $result[0]->getProtectionKeyId());
        $this->assertEquals($contentKey->getProtectionKeyType(), $result[0]->getProtectionKeyType());
        $this->assertEquals($contentKey->getContentKeyType(), $result[0]->getContentKeyType());
    }

    /**
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::getContentKey
     */
    public function testGetContentKey()
    {

        // Setup
        $aesKey = Utilities::generateCryptoKey(32);

        $protectionKeyId = $this->mediaServicesWrapper->getProtectionKeyId(ProtectionKeyTypes::X509_CERTIFICATE_THUMBPRINT);
        $protectionKey = $this->mediaServicesWrapper->getProtectionKey($protectionKeyId);

        $contentKey = new ContentKey();
        $contentKey->setContentKey($aesKey, $protectionKey);
        $contentKey->setProtectionKeyId($protectionKeyId);
        $contentKey->setProtectionKeyType(ProtectionKeyTypes::X509_CERTIFICATE_THUMBPRINT);
        $contentKey->setContentKeyType(ContentKeyTypes::STORAGE_ENCRYPTION);
        $contentKey = $this->createContentKey($contentKey);

        // Test
        $result = $this->mediaServicesWrapper->getContentKey($contentKey);

        // Assert
        $this->assertEquals($contentKey->getId(), $result->getId());
        $this->assertEquals($contentKey->getProtectionKeyId(), $result->getProtectionKeyId());
        $this->assertEquals($contentKey->getProtectionKeyType(), $result->getProtectionKeyType());
        $this->assertEquals($contentKey->getContentKeyType(), $result->getContentKeyType());
    }

    /**
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::rebindContentKey
     */
    public function testRebindContentKey()
    {

        // Setup
        $aesKey = Utilities::generateCryptoKey(32);

        $protectionKeyId = $this->mediaServicesWrapper->getProtectionKeyId(ContentKeyTypes::STORAGE_ENCRYPTION);
        $protectionKey = $this->mediaServicesWrapper->getProtectionKey($protectionKeyId);

        $contentKey = new ContentKey();
        $contentKey->setContentKey($aesKey, $protectionKey);
        $contentKey->setProtectionKeyId($protectionKeyId);
        $contentKey->setProtectionKeyType(ProtectionKeyTypes::X509_CERTIFICATE_THUMBPRINT);
        $contentKey->setContentKeyType(ContentKeyTypes::STORAGE_ENCRYPTION);
        $contentKey = $this->createContentKey($contentKey);

        // Test
        $result = $this->mediaServicesWrapper->rebindContentKey($contentKey, '');

        // Assert
        $this->assertEquals($result, $aesKey);
    }

    /**
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::getProtectionKeyId
     */
    public function testGetProtectionKeyId()
    {

        // Setup
        $contentKeyType = ContentKeyTypes::STORAGE_ENCRYPTION;

        // Test
        $protectionKeyId = $this->mediaServicesWrapper->getProtectionKeyId($contentKeyType);

        // Assert
        $this->assertNotNull($protectionKeyId);
    }

    /**
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::getProtectionKey
     */
    public function testGetProtectionKey()
    {

        // Setup
        $contentKeyType = ContentKeyTypes::STORAGE_ENCRYPTION;
        $protectionKeyId = $this->mediaServicesWrapper->getProtectionKeyId($contentKeyType);

        // Test
        $protectionKey = $this->mediaServicesWrapper->getProtectionKey($protectionKeyId);

        // Assert
        $this->assertNotNull($protectionKey);
    }

    /**
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::getAssetContentKeys
     */
    public function testGetAssetContentKeys()
    {

        // Setup
        $aesKey = Utilities::generateCryptoKey(32);

        $protectionKeyId = $this->mediaServicesWrapper->getProtectionKeyId(ContentKeyTypes::COMMON_ENCRYPTION);
        $protectionKey = $this->mediaServicesWrapper->getProtectionKey($protectionKeyId);

        $contentKey = new ContentKey();
        $contentKey->setContentKey($aesKey, $protectionKey);
        $contentKey->setProtectionKeyId($protectionKeyId);
        $contentKey->setProtectionKeyType(ProtectionKeyTypes::X509_CERTIFICATE_THUMBPRINT);
        $contentKey->setContentKeyType(ContentKeyTypes::COMMON_ENCRYPTION);
        $contentKey = $this->createContentKey($contentKey);

        $asset = new Asset(Asset::OPTIONS_COMMON_ENCRYPTION_PROTECTED);
        $asset->setName(TestResources::MEDIA_SERVICES_ASSET_NAME.$this->createSuffix());
        $asset = $this->createAsset($asset);

        $this->mediaServicesWrapper->linkContentKeyToAsset($asset, $contentKey);

        // Test
        $result = $this->mediaServicesWrapper->getAssetContentKeys($asset);

        // Assert
        $this->assertCount(1, $result);
        $this->assertEquals($protectionKeyId, $result[0]->getProtectionKeyId());
        $this->assertEquals($contentKey->getId(), $result[0]->getId());
    }

    /**
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::linkContentKeyToAsset
     */
    public function testLinkContentKeyToAsset()
    {

        // Setup
        $aesKey = Utilities::generateCryptoKey(16);

        $protectionKeyId = $this->mediaServicesWrapper->getProtectionKeyId(ContentKeyTypes::COMMON_ENCRYPTION);
        $protectionKey = $this->mediaServicesWrapper->getProtectionKey($protectionKeyId);

        $contentKey = new ContentKey();
        $contentKey->setContentKey($aesKey, $protectionKey);
        $contentKey->setProtectionKeyId($protectionKeyId);
        $contentKey->setProtectionKeyType(ProtectionKeyTypes::X509_CERTIFICATE_THUMBPRINT);
        $contentKey->setContentKeyType(ContentKeyTypes::COMMON_ENCRYPTION);
        $contentKey = $this->createContentKey($contentKey);

        $asset = new Asset(Asset::OPTIONS_COMMON_ENCRYPTION_PROTECTED);
        $asset->setName(TestResources::MEDIA_SERVICES_ASSET_NAME.$this->createSuffix());
        $asset = $this->createAsset($asset);

        // Test
        $this->mediaServicesWrapper->linkContentKeyToAsset($asset, $contentKey);

        // Assert
        $contentKeyFromAsset = $this->mediaServicesWrapper->getAssetContentKeys($asset);
        $this->assertEquals($contentKey->getId(), $contentKeyFromAsset[0]->getId());
        $this->assertEquals($contentKey->getProtectionKeyId(), $contentKeyFromAsset[0]->getProtectionKeyId());
        $this->assertEquals($contentKey->getContentKeyType(), $contentKeyFromAsset[0]->getContentKeyType());
    }

    /**
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::removeContentKeyFromAsset
     */
    public function testRemoveContentKeyFromAsset()
    {

        // Setup
        $aesKey = Utilities::generateCryptoKey(32);

        $protectionKeyId = $this->mediaServicesWrapper->getProtectionKeyId(ContentKeyTypes::COMMON_ENCRYPTION);
        $protectionKey = $this->mediaServicesWrapper->getProtectionKey($protectionKeyId);

        $contentKey = new ContentKey();
        $contentKey->setContentKey($aesKey, $protectionKey);
        $contentKey->setProtectionKeyId($protectionKeyId);
        $contentKey->setProtectionKeyType(ProtectionKeyTypes::X509_CERTIFICATE_THUMBPRINT);
        $contentKey->setContentKeyType(ContentKeyTypes::COMMON_ENCRYPTION);
        $contentKey = $this->createContentKey($contentKey);

        $asset = new Asset(Asset::OPTIONS_COMMON_ENCRYPTION_PROTECTED);
        $asset->setName(TestResources::MEDIA_SERVICES_ASSET_NAME.$this->createSuffix());
        $asset = $this->createAsset($asset);

        $this->mediaServicesWrapper->linkContentKeyToAsset($asset, $contentKey);

        // Test
        $this->mediaServicesWrapper->removeContentKeyFromAsset($asset, $contentKey);

        // Assert
        $contentKeyFromAsset = $this->mediaServicesWrapper->getAssetContentKeys($asset);
        $this->assertEmpty($contentKeyFromAsset);
    }

    /**
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::uploadAssetFile
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::_uploadAssetFileFromString
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::_uploadAssetFileSingle
     */
    public function testUploadSmallFileFromContent()
    {
        // Setup
        $fileContent = TestResources::MEDIA_SERVICES_DUMMY_FILE_CONTENT;

        // Test
        $actual = $this->uploadFile(TestResources::MEDIA_SERVICES_DUMMY_FILE_NAME, $fileContent);

        // Assert
        $this->assertEquals(TestResources::MEDIA_SERVICES_DUMMY_FILE_CONTENT, $actual);
    }

    /**
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::uploadAssetFile
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::_uploadAssetFileFromString
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::_uploadBlock
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::_commitBlocks
     */
    public function testUploadLargeFileFromContent()
    {
        // Setup
        $fileContent = $this->createLargeFile();

        // Test
        $actual = $this->uploadFile(TestResources::MEDIA_SERVICES_DUMMY_FILE_NAME, $fileContent);

        // Assert
        $this->assertEquals($fileContent, $actual);
    }

    /**
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::uploadAssetFile
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::_uploadAssetFileFromResource
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::_uploadAssetFileSingle
     */
    public function testUploadSmallFileFromResource()
    {
        // Setup
        $fileContent = TestResources::MEDIA_SERVICES_DUMMY_FILE_CONTENT;

        $resource = fopen(VirtualFileSystem::newFile($fileContent), 'r');

        // Test
        $actual = $this->uploadFile(TestResources::MEDIA_SERVICES_DUMMY_FILE_NAME, $resource);

        // Assert
        $this->assertEquals($fileContent, $actual);
    }

    /**
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::uploadAssetFile
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::_uploadAssetFileFromResource
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::_uploadBlock
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::_commitBlocks
     */
    public function testUploadLargeFileFromResource()
    {
        // Setup
        $fileContent = $this->createLargeFile();

        $resource = fopen(VirtualFileSystem::newFile($fileContent), 'r');

        // Test
        $actual = $this->uploadFile(TestResources::MEDIA_SERVICES_DUMMY_FILE_NAME, $resource);

        // Assert
        $this->assertEquals($fileContent, $actual);
    }

    /**
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::createContentKeyAuthorizationPolicy
     */
    public function testCreateContentKeyAuthorizationPolicy()
    {
        // Setup
        $name = TestResources::MEDIA_SERVICES_CONTENT_KEY_AUTHORIZATION_POLICY_NAME.$this->createSuffix();
        $policy = new ContentKeyAuthorizationPolicy();
        $policy->setName($name);

        // Test
        $result = $this->createContentKeyAuthorizationPolicy($policy);

        // Assert
        $this->assertEquals($policy->getName(), $result->getName());

        return $result->getId();
    }

    /**
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::getContentKeyAuthorizationPolicy
     */
    public function testGetContentKeyAuthorizationPolicy()
    {
        // Setup
        $id = $this->testCreateContentKeyAuthorizationPolicy();

        // Test
        $result = $this->mediaServicesWrapper->getContentKeyAuthorizationPolicy($id);

        // Assert
        $this->assertEquals($id, $result->getId());
    }

    /**
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::getContentKeyAuthorizationPolicyList
     */
    public function testGetContentKeyAuthorizationPolicyList()
    {
        // Setup
        $id1 = $this->testCreateContentKeyAuthorizationPolicy();
        $id2 = $this->testCreateContentKeyAuthorizationPolicy();

        // Test
        $result = $this->mediaServicesWrapper->getContentKeyAuthorizationPolicyList();

        // Assert
        $this->assertContainsEntityById($id1, $result);
        $this->assertContainsEntityById($id2, $result);
    }

    /**
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::createContentKeyAuthorizationPolicy
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::updateContentKeyAuthorizationPolicy
     */
    public function testUpdateContentKeyAuthorizationPolicy()
    {
        // Setup
        $name = TestResources::MEDIA_SERVICES_CONTENT_KEY_AUTHORIZATION_POLICY_NAME.$this->createSuffix();
        $newName = TestResources::MEDIA_SERVICES_CONTENT_KEY_AUTHORIZATION_POLICY_NAME.$this->createSuffix();
        $policy = new ContentKeyAuthorizationPolicy();
        $policy->setName($name);
        $result = $this->createContentKeyAuthorizationPolicy($policy);

        // Test
        $result->setName($newName);
        $this->mediaServicesWrapper->updateContentKeyAuthorizationPolicy($result);

        $result = $this->mediaServicesWrapper->getContentKeyAuthorizationPolicy($result->getId());

        // Assert
        $this->assertEquals($newName, $result->getName());
    }

    /**
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::deleteContentKeyAuthorizationPolicy
     */
    public function testDeleteContentKeyAuthorizationPolicy()
    {
        // Setup
        $countBefore = count($this->mediaServicesWrapper->getContentKeyAuthorizationPolicyList());
        $name = TestResources::MEDIA_SERVICES_CONTENT_KEY_AUTHORIZATION_POLICY_NAME.$this->createSuffix();
        $policy = new ContentKeyAuthorizationPolicy();
        $policy->setName($name);
        $result = $this->mediaServicesWrapper->createContentKeyAuthorizationPolicy($policy);

        $countMiddle = count($this->mediaServicesWrapper->getContentKeyAuthorizationPolicyList());

        // Test
        $this->mediaServicesWrapper->deleteContentKeyAuthorizationPolicy($result);
        $countAfter = count($this->mediaServicesWrapper->getContentKeyAuthorizationPolicyList());

        // Assert
        $this->assertEquals($countMiddle - 1, $countBefore);
        $this->assertEquals($countBefore, $countAfter);
        $this->assertEquals($countMiddle - 1, $countAfter);
    }

    /**
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::createContentKeyAuthorizationPolicyOption
     */
    public function testCreateContentKeyAuthorizationPolicyOption()
    {
        // Setup
        $name = TestResources::MEDIA_SERVICES_CONTENT_KEY_AUTHORIZATION_OPTIONS_NAME.$this->createSuffix();
        $restrictionName = TestResources::MEDIA_SERVICES_CONTENT_KEY_AUTHORIZATION_POLICY_RESTRICTION_NAME.$this->createSuffix();
        $restriction = new ContentKeyAuthorizationPolicyRestriction();
        $restriction->setName($restrictionName);
        $restriction->setKeyRestrictionType(ContentKeyRestrictionType::OPEN);
        $restrictions = [$restriction];

        $options = new ContentKeyAuthorizationPolicyOption();
        $options->setName($name);
        $options->setKeyDeliveryType(ContentKeyDeliveryType::BASELINE_HTTP);
        $options->setRestrictions($restrictions);

        // Test
        $result = $this->createContentKeyAuthorizationPolicyOption($options);

        // Assert
        $this->assertEquals($options->getName(), $result->getName());
        $this->assertEquals($options->getKeyDeliveryType(), $result->getKeyDeliveryType());
        $this->assertEquals($options->getRestrictions(), $result->getRestrictions());

        return $result->getId();
    }

    /**
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::getContentKeyAuthorizationPolicyOption
     */
    public function testGetContentKeyAuthorizationPolicyOption()
    {
        // Setup
        $id = $this->testCreateContentKeyAuthorizationPolicyOption();

        // Test
        $result = $this->mediaServicesWrapper->getContentKeyAuthorizationPolicyOption($id);

        // Assert
        $this->assertEquals($id, $result->getId());
    }

    /**
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::getContentKeyAuthorizationPolicyOption
     */
    public function testGetContentKeyAuthorizationPolicyOptionList()
    {
        // Setup
        $id1 = $this->testCreateContentKeyAuthorizationPolicyOption();
        $id2 = $this->testCreateContentKeyAuthorizationPolicyOption();

        // Test
        $result = $this->mediaServicesWrapper->getContentKeyAuthorizationPolicyOptionList();

        // Assert
        $this->assertContainsEntityById($id1, $result);
        $this->assertContainsEntityById($id2, $result);
    }

    /**
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::updateContentKeyAuthorizationPolicyOption
     */
    public function testUpdateContentKeyAuthorizationPolicyOption()
    {
        // Setup
        $id = $this->testCreateContentKeyAuthorizationPolicyOption();
        $newName = TestResources::MEDIA_SERVICES_CONTENT_KEY_AUTHORIZATION_POLICY_NAME.$this->createSuffix();
        $options = $this->mediaServicesWrapper->getContentKeyAuthorizationPolicyOption($id);

        // Test
        $options->setName($newName);
        $this->mediaServicesWrapper->updateContentKeyAuthorizationPolicyOption($options);

        $options = $this->mediaServicesWrapper->getContentKeyAuthorizationPolicyOption($options->getId());

        // Assert
        $this->assertEquals($newName, $options->getName());
    }

    /**
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::deleteContentKeyAuthorizationPolicyOption
     */
    public function testDeleteContentKeyAuthorizationPolicyOption()
    {
        // Setup
        $countBefore = count($this->mediaServicesWrapper->getContentKeyAuthorizationPolicyOptionList());
        $name = TestResources::MEDIA_SERVICES_CONTENT_KEY_AUTHORIZATION_OPTIONS_NAME.$this->createSuffix();
        $options = new ContentKeyAuthorizationPolicyOption();
        $options->setName($name);
        $options->setKeyDeliveryType(ContentKeyDeliveryType::BASELINE_HTTP);
        $options = $this->mediaServicesWrapper->createContentKeyAuthorizationPolicyOption($options);
        $countMiddle = count($this->mediaServicesWrapper->getContentKeyAuthorizationPolicyOptionList());

        // Test
        $this->mediaServicesWrapper->deleteContentKeyAuthorizationPolicyOption($options);
        $countAfter = count($this->mediaServicesWrapper->getContentKeyAuthorizationPolicyOptionList());

        // Assert
        $this->assertEquals($countMiddle - 1, $countBefore);
        $this->assertEquals($countBefore, $countAfter);
        $this->assertEquals($countMiddle - 1, $countAfter);
    }

    /**
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::getAssetContentKeys
     */
    public function testGetContentKeyAuthorizationPolicyLinkedOptions()
    {

        // Setup
        $policyId = $this->testCreateContentKeyAuthorizationPolicy();
        $optionsId = $this->testCreateContentKeyAuthorizationPolicyOption();

        $this->mediaServicesWrapper->linkOptionToContentKeyAuthorizationPolicy($optionsId, $policyId);

        // Test
        $result = $this->mediaServicesWrapper->getContentKeyAuthorizationPolicyLinkedOptions($policyId);

        // Assert
        $this->assertCount(1, $result);
        $this->assertEquals($optionsId, $result[0]->getId());
    }

    /**
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::linkContentKeyToAsset
     */
    public function testLinkOptionsToContentKeyAuthorizationPolicy()
    {
        // Setup
        $policyId = $this->testCreateContentKeyAuthorizationPolicy();
        $optionsId = $this->testCreateContentKeyAuthorizationPolicyOption();

        // Test
        $this->mediaServicesWrapper->linkOptionToContentKeyAuthorizationPolicy($optionsId, $policyId);

        // Assert
        $result = $this->mediaServicesWrapper->getContentKeyAuthorizationPolicyLinkedOptions($policyId);
        $this->assertCount(1, $result);
        $this->assertEquals($optionsId, $result[0]->getId());
    }

    /**
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::removeContentKeyFromAsset
     */
    public function testRemoveOptionsFromContentKeyAuthorizationPolicy()
    {

        // Setup
        $policyId = $this->testCreateContentKeyAuthorizationPolicy();
        $optionsId = $this->testCreateContentKeyAuthorizationPolicyOption();
        $this->mediaServicesWrapper->linkOptionToContentKeyAuthorizationPolicy($optionsId, $policyId);

        // Test
        $this->mediaServicesWrapper->removeOptionsFromContentKeyAuthorizationPolicy($optionsId, $policyId);

        // Assert
        $optionsFromPolicy = $this->mediaServicesWrapper->getContentKeyAuthorizationPolicyLinkedOptions($policyId);
        $this->assertEmpty($optionsFromPolicy);
    }

    /**
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::createAssetDeliveryPolicy
     */
    public function testCreateAssetDeliveryPolicy()
    {
        // Setup
        $name = TestResources::MEDIA_SERVICES_ASSET_DELIVERY_POLICY_NAME.$this->createSuffix();
        $policy = new AssetDeliveryPolicy();
        $policy->setName($name);
        $policy->setAssetDeliveryProtocol(AssetDeliveryProtocol::ALL);
        $policy->setAssetDeliveryPolicyType(AssetDeliveryPolicyType::BLOCKED);

        // Test
        $result = $this->createAssetDeliveryPolicy($policy);

        // Assert
        $this->assertEquals($policy->getName(), $result->getName());
        $this->assertEquals(AssetDeliveryProtocol::ALL, $result->getAssetDeliveryProtocol());
        $this->assertEquals(AssetDeliveryPolicyType::BLOCKED, $result->getAssetDeliveryPolicyType());

        return $result->getId();
    }

    /**
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::getAssetDeliveryPolicy
     */
    public function testGetAssetDeliveryPolicy()
    {
        // Setup
        $id = $this->testCreateAssetDeliveryPolicy();

        // Test
        $result = $this->mediaServicesWrapper->getAssetDeliveryPolicy($id);

        // Assert
        $this->assertEquals($id, $result->getId());
    }

    /**
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::getAssetDeliveryPolicyList
     */
    public function testGetAssetDeliveryPolicyList()
    {
        // Setup
        $id1 = $this->testCreateAssetDeliveryPolicy();
        $id2 = $this->testCreateAssetDeliveryPolicy();

        // Test
        $result = $this->mediaServicesWrapper->getAssetDeliveryPolicyList();

        // Assert
        $this->assertContainsEntityById($id1, $result);
        $this->assertContainsEntityById($id2, $result);
    }

    /**
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::createAssetDeliveryPolicy
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::updateAssetDeliveryPolicy
     */
    public function testUpdateAssetDeliveryPolicy()
    {
        // Setup
        $name = TestResources::MEDIA_SERVICES_ASSET_DELIVERY_POLICY_NAME.$this->createSuffix();
        $newName = TestResources::MEDIA_SERVICES_ASSET_DELIVERY_POLICY_NAME.$this->createSuffix();
        $policy = new AssetDeliveryPolicy();
        $policy->setName($name);
        $policy->setAssetDeliveryProtocol(AssetDeliveryProtocol::ALL);
        $policy->setAssetDeliveryPolicyType(AssetDeliveryPolicyType::BLOCKED);

        $result = $this->createAssetDeliveryPolicy($policy);

        // Test
        $result->setName($newName);
        $this->mediaServicesWrapper->updateAssetDeliveryPolicy($result);

        $result = $this->mediaServicesWrapper->getAssetDeliveryPolicy($result->getId());

        // Assert
        $this->assertEquals($newName, $result->getName());
    }

    /**
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::deleteAssetDeliveryPolicy
     */
    public function testDeleteAssetDeliveryPolicy()
    {
        // Setup
        $countBefore = count($this->mediaServicesWrapper->getAssetDeliveryPolicyList());
        $name = TestResources::MEDIA_SERVICES_ASSET_DELIVERY_POLICY_NAME.$this->createSuffix();
        $policy = new AssetDeliveryPolicy();
        $policy->setName($name);
        $policy->setAssetDeliveryProtocol(AssetDeliveryProtocol::ALL);
        $policy->setAssetDeliveryPolicyType(AssetDeliveryPolicyType::BLOCKED);

        $result = $this->mediaServicesWrapper->createAssetDeliveryPolicy($policy);

        $countMiddle = count($this->mediaServicesWrapper->getAssetDeliveryPolicyList());

        // Test
        $this->mediaServicesWrapper->deleteAssetDeliveryPolicy($result);
        $countAfter = count($this->mediaServicesWrapper->getAssetDeliveryPolicyList());

        // Assert
        $this->assertEquals($countMiddle - 1, $countBefore);
        $this->assertEquals($countBefore, $countAfter);
        $this->assertEquals($countMiddle - 1, $countAfter);
    }

    /**
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::getAssetLinkedDeliveryPolicy
     */
    public function testGetAssetLinkedDeliveryPolicies()
    {

        // Setup
        $asset = new Asset(Asset::OPTIONS_NONE);
        $asset->setName(TestResources::MEDIA_SERVICES_ASSET_NAME . $this->createSuffix());

        $asset = $this->createAsset($asset);
        $policyId = $this->testCreateAssetDeliveryPolicy();

        $this->mediaServicesWrapper->linkDeliveryPolicyToAsset($asset, $policyId);

        // Test
        $result = $this->mediaServicesWrapper->getAssetLinkedDeliveryPolicy($asset);

        // Assert
        $this->assertCount(1, $result);
        $this->assertEquals($policyId, $result[0]->getId());

        // Cleanup
        $this->mediaServicesWrapper->removeDeliveryPolicyFromAsset($asset, $policyId);
    }

    /**
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::linkDeliveryPolicyToAsset
     */
    public function testLinkDeliveryPolicyToAsset()
    {
        // Setup
        $asset = new Asset(Asset::OPTIONS_NONE);
        $asset->setName(TestResources::MEDIA_SERVICES_ASSET_NAME . $this->createSuffix());

        $asset = $this->createAsset($asset);
        $policyId = $this->testCreateAssetDeliveryPolicy();

        // Test
        $this->mediaServicesWrapper->linkDeliveryPolicyToAsset($asset, $policyId);

        // Assert
        $result = $this->mediaServicesWrapper->getAssetLinkedDeliveryPolicy($asset);
        $this->assertCount(1, $result);
        $this->assertEquals($policyId, $result[0]->getId());

        // Cleanup
        $this->mediaServicesWrapper->removeDeliveryPolicyFromAsset($asset, $policyId);
    }

    /**
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::removeDeliveryPolicyFromAsset
     */
    public function testRemoveDeliveryPolicyFromAsset()
    {
        // Setup
        $asset = new Asset(Asset::OPTIONS_NONE);
        $asset->setName(TestResources::MEDIA_SERVICES_ASSET_NAME . $this->createSuffix());

        $asset = $this->createAsset($asset);
        $policyId = $this->testCreateAssetDeliveryPolicy();

        $this->mediaServicesWrapper->linkDeliveryPolicyToAsset($asset, $policyId);

        // Test
        $this->mediaServicesWrapper->removeDeliveryPolicyFromAsset($asset, $policyId);

        // Assert
        $optionsFromPolicy = $this->mediaServicesWrapper->getAssetLinkedDeliveryPolicy($asset);
        $this->assertEmpty($optionsFromPolicy);
    }

    /**
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::getKeyDeliveryUrl
     * @group needs-review
     */
    public function testGetKeyDeliveryUrl()
    {
        // Setup
        $contentKey = $this->testCreateContentKey();
        $policyId = $this->testCreateContentKeyAuthorizationPolicy();
        $optionsId = $this->testCreateContentKeyAuthorizationPolicyOption();
        $this->mediaServicesWrapper->linkOptionToContentKeyAuthorizationPolicy($optionsId, $policyId);
        $contentKey->setAuthorizationPolicyId($policyId);
        $this->mediaServicesWrapper->updateContentKey($contentKey); // new method, TODO: integration test
        $contentKey = $this->mediaServicesWrapper->getContentKey($contentKey);

        // Test
        $result = $this->mediaServicesWrapper->getKeyDeliveryUrl($contentKey, ContentKeyDeliveryType::BASELINE_HTTP);

        // Assert
        $this->assertRegExp('/keydelivery/', $result);
    }

    public function testCreateContentKeyAuthorizationPolicyOptionWithTokenRestrictions()
    {
        // Setup Token
        $template = new TokenRestrictionTemplate(TokenType::SWT);

        $template->setPrimaryVerificationKey(new SymmetricVerificationKey());
        $template->setAlternateVerificationKeys([new SymmetricVerificationKey()]);
        $template->setAudience('http://sampleaudience/');
        $template->setIssuer('http://sampleissuerurl/');

        $claims = [];
        $claims[] = new TokenClaim(TokenClaim::CONTENT_KEY_ID_CLAIM_TYPE);
        $claims[] = new TokenClaim('Rental', 'true');

        $template->setRequiredClaims($claims);

        $serializedTemplate = TokenRestrictionTemplateSerializer::serialize($template);

        // Setup Options
        $name = TestResources::MEDIA_SERVICES_CONTENT_KEY_AUTHORIZATION_OPTIONS_NAME.$this->createSuffix();
        $restrictionName = TestResources::MEDIA_SERVICES_CONTENT_KEY_AUTHORIZATION_POLICY_RESTRICTION_NAME.$this->createSuffix();
        $restriction = new ContentKeyAuthorizationPolicyRestriction();
        $restriction->setName($restrictionName);
        $restriction->setKeyRestrictionType(ContentKeyRestrictionType::TOKEN_RESTRICTED);
        $restriction->setRequirements($serializedTemplate);
        $restrictions = [$restriction];

        $options = new ContentKeyAuthorizationPolicyOption();
        $options->setName($name);
        $options->setKeyDeliveryType(ContentKeyDeliveryType::BASELINE_HTTP);
        $options->setRestrictions($restrictions);

        // Test
        $result = $this->createContentKeyAuthorizationPolicyOption($options);

        // Retrieve the CKAPO again.
        $result = $this->mediaServicesWrapper->getContentKeyAuthorizationPolicyOption($result->getId());

        // Assert Options
        $this->assertEquals($options->getName(), $result->getName());
        $this->assertEquals($options->getKeyDeliveryType(), $result->getKeyDeliveryType());
        $this->assertEquals($options->getRestrictions(), $result->getRestrictions());

        $receivedTemplate = $result->getRestrictions()[0]->getRequirements();

        // Assert Restrictions
        $template2 = TokenRestrictionTemplateSerializer::deserialize($receivedTemplate);

        $this->assertEqualsTokenRestrictionTemplate($template, $template2);

        return $result->getId();
    }

    public function testCreateContentKeyAuthorizationPolicyOptionForPlayReady()
    {
        // Setup Token
        $template = new TokenRestrictionTemplate(TokenType::SWT);

        $template->setPrimaryVerificationKey(new SymmetricVerificationKey());
        $template->setAlternateVerificationKeys([new SymmetricVerificationKey()]);
        $template->setAudience('http://sampleaudience/');
        $template->setIssuer('http://sampleissuerurl/');

        $claims = [];
        $claims[] = new TokenClaim(TokenClaim::CONTENT_KEY_ID_CLAIM_TYPE);
        $claims[] = new TokenClaim('Rental', 'true');

        $template->setRequiredClaims($claims);

        $serializedTemplate = TokenRestrictionTemplateSerializer::serialize($template);

        // Setup Options
        $name = TestResources::MEDIA_SERVICES_CONTENT_KEY_AUTHORIZATION_OPTIONS_NAME.$this->createSuffix();
        $restrictionName = TestResources::MEDIA_SERVICES_CONTENT_KEY_AUTHORIZATION_POLICY_RESTRICTION_NAME.$this->createSuffix();
        $restriction = new ContentKeyAuthorizationPolicyRestriction();
        $restriction->setName($restrictionName);
        $restriction->setKeyRestrictionType(ContentKeyRestrictionType::TOKEN_RESTRICTED);
        $restriction->setRequirements($serializedTemplate);
        $restrictions = [$restriction];

        $options = new ContentKeyAuthorizationPolicyOption();
        $options->setName($name);
        $options->setKeyDeliveryType(ContentKeyDeliveryType::PLAYREADY_LICENSE);
        $playReadyTemplate = $this->getPlayReadyTemplate();
        $deliveryConfiguration = MediaServicesLicenseTemplateSerializer::serialize($playReadyTemplate);
        $options->setKeyDeliveryConfiguration($deliveryConfiguration);
        $options->setRestrictions($restrictions);

        // Test
        $result = $this->createContentKeyAuthorizationPolicyOption($options);

        // Retrieve the CKAPO again.
        $result = $this->mediaServicesWrapper->getContentKeyAuthorizationPolicyOption($result->getId());

        // Assert Options
        $this->assertEquals($options->getName(), $result->getName());
        $this->assertEquals($options->getKeyDeliveryType(), $result->getKeyDeliveryType());
        $this->assertEquals($options->getRestrictions(), $result->getRestrictions());

        $receivedTemplate = $result->getRestrictions()[0]->getRequirements();
        $receivedPlayReadyTemplate = $options->getKeyDeliveryConfiguration();
        $playReadyTemplate2 = MediaServicesLicenseTemplateSerializer::deserialize($receivedPlayReadyTemplate);
        // Assert Restrictions
        $template2 = TokenRestrictionTemplateSerializer::deserialize($receivedTemplate);

        $this->assertEqualsTokenRestrictionTemplate($template, $template2);
        $this->assertEqualsLicenseResponseTemplate($playReadyTemplate, $playReadyTemplate2);

        return $result->getId();
    }

    public function testCreateContentKeyAuthorizationPolicyOptionForWidevine()
    {
        // Setup Token

        $widevine = new WidevineMessage();
        $widevine->allowed_track_types = AllowedTrackTypes::SD_HD;
        $contentKeySpecs = new ContentKeySpecs();
        $contentKeySpecs->required_output_protection = new RequiredOutputProtection();
        $contentKeySpecs->required_output_protection->hdcp = Hdcp::HDCP_NONE;
        $contentKeySpecs->security_level = 1;
        $contentKeySpecs->track_type = 'SD';
        $widevine->content_key_specs = [$contentKeySpecs];
        $policyOverrides = new \stdClass();
        $policyOverrides->can_play = true;
        $policyOverrides->can_persist = true;
        $policyOverrides->can_renew = false;
        $widevine->policy_overrides = $policyOverrides;

        $jsonWidevine = WidevineMessageSerializer::serialize($widevine);

        $template = new TokenRestrictionTemplate(TokenType::SWT);

        $template->setPrimaryVerificationKey(new SymmetricVerificationKey());
        $template->setAlternateVerificationKeys([new SymmetricVerificationKey()]);
        $template->setAudience('http://sampleaudience/');
        $template->setIssuer('http://sampleissuerurl/');

        $claims = [];
        $claims[] = new TokenClaim(TokenClaim::CONTENT_KEY_ID_CLAIM_TYPE);
        $claims[] = new TokenClaim('Rental', 'true');

        $template->setRequiredClaims($claims);

        $serializedTemplate = TokenRestrictionTemplateSerializer::serialize($template);

        // Setup Options
        $name = TestResources::MEDIA_SERVICES_CONTENT_KEY_AUTHORIZATION_OPTIONS_NAME.$this->createSuffix();
        $restrictionName = TestResources::MEDIA_SERVICES_CONTENT_KEY_AUTHORIZATION_POLICY_RESTRICTION_NAME.$this->createSuffix();
        $restriction = new ContentKeyAuthorizationPolicyRestriction();
        $restriction->setName($restrictionName);
        $restriction->setKeyRestrictionType(ContentKeyRestrictionType::TOKEN_RESTRICTED);
        $restriction->setRequirements($serializedTemplate);
        $restrictions = [$restriction];

        $options = new ContentKeyAuthorizationPolicyOption();
        $options->setName($name);
        $options->setKeyDeliveryType(ContentKeyDeliveryType::WIDEVINE);
        $options->setKeyDeliveryConfiguration($jsonWidevine);
        $options->setRestrictions($restrictions);

        // Test
        $result = $this->createContentKeyAuthorizationPolicyOption($options);

        // Retrieve the CKAPO again.
        $result = $this->mediaServicesWrapper->getContentKeyAuthorizationPolicyOption($result->getId());

        // Assert Options
        $this->assertEquals($options->getName(), $result->getName());
        $this->assertEquals($options->getKeyDeliveryType(), $result->getKeyDeliveryType());
        $this->assertJsonStringEqualsJsonString($jsonWidevine, $result->getKeyDeliveryConfiguration());

        $actualWidevine = WidevineMessageSerializer::deserialize($result->getKeyDeliveryConfiguration());
        $this->assertEqualsWidevineMessage($widevine, $actualWidevine);

        return $result->getId();
    }

    private function getPlayReadyTemplate()
    {
        $template = new PlayReadyLicenseResponseTemplate();
        $template->setResponseCustomData('test custom data');

        $licenseTemplate = new PlayReadyLicenseTemplate();
        $template->setLicenseTemplates([$licenseTemplate]);

        $licenseTemplate->setLicenseType(PlayReadyLicenseType::PERSISTENT);
        $licenseTemplate->setBeginDate(new \DateTime('now'));
        $licenseTemplate->setRelativeExpirationDate(new \DateInterval('PT6H'));
        $licenseTemplate->setContentKey(new ContentEncryptionKeyFromHeader());

        $playRight = new PlayReadyPlayRight();
        $licenseTemplate->setPlayRight($playRight);

        $playRight->setAgcAndColorStripeRestriction(new AgcAndColorStripeRestriction(1));
        $playRight->setAllowPassingVideoContentToUnknownOutput(UnknownOutputPassingOption::ALLOWED);
        $playRight->setAnalogVideoOpl(100);
        $playRight->setCompressedDigitalAudioOpl(300);
        $playRight->setCompressedDigitalVideoOpl(400);
        $playRight->setExplicitAnalogTelevisionOutputRestriction(new ExplicitAnalogTelevisionRestriction(0, true));
        $playRight->setImageConstraintForAnalogComponentVideoRestriction(true);
        $playRight->setImageConstraintForAnalogComputerMonitorRestriction(true);
        $playRight->setScmsRestriction(new ScmsRestriction(2));
        $playRight->setUncompressedDigitalAudioOpl(250);
        $playRight->setUncompressedDigitalVideoOpl(270);

        return $template;
    }

    /**
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::getContentKeyAuthorizationPolicyOption
     */
    public function testGetEncodingReservedUnitType()
    {
        // Test
        $result = $this->mediaServicesWrapper->getEncodingReservedUnit();

        // Assert
        $this->assertNotNull($result);
    }

    /**
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::getContentKeyAuthorizationPolicyOption
     */
    public function testUpdateEncodingReservedUnitType()
    {
        // Setup
        $original = $this->mediaServicesWrapper->getEncodingReservedUnit();
        $toUpdate = $this->mediaServicesWrapper->getEncodingReservedUnit();

        $this->assertNotNull($toUpdate);

        // Test
        $toUpdate->setReservedUnitType(EncodingReservedUnitType::S1);
        $toUpdate->setCurrentReservedUnits(2);
        $this->mediaServicesWrapper->updateEncodingReservedUnit($toUpdate);

        // Assert
        $updated = $this->mediaServicesWrapper->getEncodingReservedUnit();

        $this->assertEquals(EncodingReservedUnitType::S1, $updated->getReservedUnitType());
        $this->assertEquals(2, $updated->getCurrentReservedUnits());

        // restore initial conditions
        $this->mediaServicesWrapper->updateEncodingReservedUnit($original);
    }

    /**
     * @group livefeatures
     */
    public function testGetOperationNotFound()
    {
        // Setup
        $opId = "nb:opid:UUID:ab66eff9-8945-4323-9f91-d257a695899b";

        // Test
        try {
            $op = $this->mediaServicesWrapper->getOperation($opId);
        } catch (ServiceException $se) {
            // Assert
            $this->assertEquals($se->getCode(), 404);
        }
    }

    /**
     * @group livefeatures
     * @group channel
     */
    public function testCreateGetDeleteValidateChannel()
    {
        // Setup
        $channelName = TestResources::MEDIA_SERVICES_CHANNEL_NAME . $this->createSuffix();
        $channel = $this->makeChannelEncodingTypeNone($channelName);

        // test
        $operation = $this->mediaServicesWrapper->sendCreateChannelOperation($channel);

        // waiting for create operation finishes
        $operation = $this->mediaServicesWrapper->awaitOperation($operation);

        // get the created channel
        $channelResult = $this->mediaServicesWrapper->getChannel($operation->getTargetEntityId());

        // assert #1, channel must exists
        $channelId = $channelResult->getId();
        $this->assertEquals($channelId, $operation->getTargetEntityId());
        $this->assertEquals($channelResult->getState(), ChannelState::Stopped);
        $this->assertEqualsChannel($channel, $channelResult);

        // assert #2 the list should contains the channel
        $list = $this->mediaServicesWrapper->getChannelList();
        $exists = false;
        foreach($list as $channel) {
            if ($channel->getId() == $channelId) {
                $exists = true;
            }
        }
        $this->assertTrue($exists);

        // delete the channel
        $operation = $this->mediaServicesWrapper->sendDeleteChannelOperation($channelResult->getId());

        // waiting for delete operation finishes
        $operation = $this->mediaServicesWrapper->awaitOperation($operation);

        // assert #3 the list should not contains the channel
        $list = $this->mediaServicesWrapper->getChannelList();

        foreach($list as $channel) {
            $this->assertFalse($channel->getId() == $channelId);
        }
    }

    /**
     * @group livefeatures
     * @group channel
     */
    public function testCreateGetDeleteValidateChannel2()
    {
        // Upload image
        $resource = fopen(__DIR__."/resources/default_slate_image_media_services.jpg", 'r');
        $slateAsset = $this->uploadSingleFile("slate2.jpg", $resource);

        // Setup
        $channelName = TestResources::MEDIA_SERVICES_CHANNEL_NAME . $this->createSuffix();
        $channel = $this->makeChannelEncodingTypeStandard($channelName);
        $channel->getCrossSiteAccessPolicies()->setClientAccessPolicy(TestResources::getClientAccessPolicy());
        $channel->getCrossSiteAccessPolicies()->setCrossDomainPolicy(TestResources::getCrossDomainPolicy());
        $channel->setSlate(new ChannelSlate());
        $channel->getSlate()->setInsertSlateOnAdMarker(true);
        $channel->getSlate()->setDefaultSlateAssetId($slateAsset->getId());

        // test
        $operation = $this->mediaServicesWrapper->sendCreateChannelOperation($channel);

        // waiting for create operation finishes
        $operation = $this->mediaServicesWrapper->awaitOperation($operation);

        // get the created channel
        $channelResult = $this->mediaServicesWrapper->getChannel($operation->getTargetEntityId());

        // assert #1, channel must exists
        $channelId = $channelResult->getId();
        $this->assertEquals($channelId, $operation->getTargetEntityId());
        $this->assertEquals($channelResult->getState(), ChannelState::Stopped);

        $this->assertEqualsChannel($channel, $channelResult);

        // assert #2 the list should contains the channel
        $list = $this->mediaServicesWrapper->getChannelList();
        $exists = false;
        foreach($list as $channel) {
            if ($channel->getId() == $channelId) {
                $exists = true;
            }
        }
        $this->assertTrue($exists);

        // delete the channel
        $operation = $this->mediaServicesWrapper->sendDeleteChannelOperation($channelResult->getId());

        // waiting for delete operation finishes
        $operation = $this->mediaServicesWrapper->awaitOperation($operation);

        // assert #3 the list should not contains the channel
        $list = $this->mediaServicesWrapper->getChannelList();

        foreach($list as $channel10) {
            $this->assertFalse($channel10->getId() == $channelId);
        }
    }

    /**
     * @group livefeatures
     * @group channel
     */
    public function testCreateUpdateDeleteValidateChannel()
    {
        // Setup
        $channelName = TestResources::MEDIA_SERVICES_CHANNEL_NAME . $this->createSuffix();
        $channel = $this->makeChannelEncodingTypeNone($channelName);

        // test
        $operation = $this->mediaServicesWrapper->sendCreateChannelOperation($channel);

        // waiting for create operation finishes
        $operation = $this->mediaServicesWrapper->awaitOperation($operation);

        // get the created channel
        $channelResult = $this->mediaServicesWrapper->getChannel($operation->getTargetEntityId());

        // assert #1, channel must exists
        $channelId = $channelResult->getId();
        $this->assertEquals($channelId, $operation->getTargetEntityId());
        $this->assertEquals($channelResult->getState(), ChannelState::Stopped);
        $this->assertEqualsChannel($channel, $channelResult);

        // assert #2 the list should contains the channel
        $list = $this->mediaServicesWrapper->getChannelList();
        $exists = false;
        foreach($list as $channel2) {
            if ($channel2->getId() == $channelId) {
                $exists = true;
            }
        }
        $this->assertTrue($exists);

        // update channel description
        $channelResult->setDescription("Alternative Description");

        // update the channel
        $operation = $this->mediaServicesWrapper->sendUpdateChannelOperation($channelResult);

        // validate that the update was applied directly
        $this->assertEquals($operation->getState(), OperationState::Succeeded);

        // get the created updated
        $channelResult = $this->mediaServicesWrapper->getChannel($channelResult);

        // assert the description is updated
        $this->assertEquals($channelResult->getDescription(), "Alternative Description");

        // delete the channel
        $operation = $this->mediaServicesWrapper->sendDeleteChannelOperation($channelResult->getId());

        // waiting for delete operation finishes
        $operation = $this->mediaServicesWrapper->awaitOperation($operation);

        // assert #3 the list should not contains the channel
        $list = $this->mediaServicesWrapper->getChannelList();

        foreach($list as $channel2) {
            $this->assertFalse($channel2->getId() == $channelId);
        }
    }

    /**
     * @group livefeatures
     * @group channel
     */
    public function testCreateGetStartStopDeleteValidateChannel()
    {
        // Setup
        $channelName = TestResources::MEDIA_SERVICES_CHANNEL_NAME . $this->createSuffix();
        $channel = $this->makeChannelEncodingTypeNone($channelName);

        // test
        $operation = $this->mediaServicesWrapper->sendCreateChannelOperation($channel);

        // waiting for create operation finishes
        $operation = $this->mediaServicesWrapper->awaitOperation($operation);

        // get the created channel
        $channelResult = $this->mediaServicesWrapper->getChannel($operation->getTargetEntityId());

        // assert #1, channel must exists
        $channelId = $channelResult->getId();
        $this->assertEquals($channelId, $operation->getTargetEntityId());
        $this->assertEquals($channelResult->getState(), ChannelState::Stopped);
        $this->assertEqualsChannel($channel, $channelResult);

        // assert #2 the list should contains the channel
        $list = $this->mediaServicesWrapper->getChannelList();
        $exists = false;
        foreach($list as $channel2) {
            if ($channel2->getId() == $channelId) {
                $exists = true;
            }
        }
        $this->assertTrue($exists);

        // start the channel
        $operation = $this->mediaServicesWrapper->sendStartChannelOperation($channelResult->getId());

        // waiting for start channel operation finishes
        $operation = $this->mediaServicesWrapper->awaitOperation($operation);

        // get the stared channel
        $channelResult = $this->mediaServicesWrapper->getChannel($operation->getTargetEntityId());

        // assert that the channel is running
        $this->assertEquals($channelResult->getState(), ChannelState::Running);

        // stop the channel
        $operation = $this->mediaServicesWrapper->sendStopChannelOperation($channelResult->getId());

        // waiting for stop channel operation finishes
        $operation = $this->mediaServicesWrapper->awaitOperation($operation);

        // delete the channel
        $operation = $this->mediaServicesWrapper->sendDeleteChannelOperation($channelResult->getId());

        // waiting for delete operation finishes
        $operation = $this->mediaServicesWrapper->awaitOperation($operation);

        // assert #3 the list should not contains the channel
        $list = $this->mediaServicesWrapper->getChannelList();

        foreach($list as $channelX) {
            $this->assertFalse($channelX->getId() == $channelId);
        }
    }

    /**
     * @group livefeatures
     * @group channel
     */
    public function testCreateGetStartUpdateStopDeleteValidateChannel()
    {
        // Setup
        $channelName = TestResources::MEDIA_SERVICES_CHANNEL_NAME . $this->createSuffix();
        $channel = $this->makeChannelEncodingTypeNone($channelName);

        // test
        $operation = $this->mediaServicesWrapper->sendCreateChannelOperation($channel);

        // waiting for create operation finishes
        $operation = $this->mediaServicesWrapper->awaitOperation($operation);

        // get the created channel
        $channelResult = $this->mediaServicesWrapper->getChannel($operation->getTargetEntityId());

        // assert #1, channel must exists
        $channelId = $channelResult->getId();
        $this->assertEquals($channelId, $operation->getTargetEntityId());
        $this->assertEquals($channelResult->getState(), ChannelState::Stopped);
        $this->assertEqualsChannel($channel, $channelResult);

        // assert #2 the list should contains the channel
        $list = $this->mediaServicesWrapper->getChannelList();
        $exists = false;
        foreach($list as $channel) {
            if ($channel->getId() == $channelId) {
                $exists = true;
            }
        }
        $this->assertTrue($exists);

        // start the channel
        $operation = $this->mediaServicesWrapper->sendStartChannelOperation($channelResult->getId());

        // waiting for start channel operation finishes
        $operation = $this->mediaServicesWrapper->awaitOperation($operation);

        // get the stared channel
        $channelResult = $this->mediaServicesWrapper->getChannel($operation->getTargetEntityId());

        // assert that the channel is running
        $this->assertEquals($channelResult->getState(), ChannelState::Running);

        // update channel description
        $channelResult->setDescription("Alternative Description");

        // update the channel
        $operation = $this->mediaServicesWrapper->sendUpdateChannelOperation($channelResult);

        // waiting for update channel operation finishes
        $operation = $this->mediaServicesWrapper->awaitOperation($operation);

        // validate that the update was applied
        $this->assertEquals($operation->getState(), OperationState::Succeeded);

        // get the created updated
        $channelResult = $this->mediaServicesWrapper->getChannel($channelResult);

        // assert the description is updated
        $this->assertEquals($channelResult->getDescription(), "Alternative Description");

        // stop the channel
        $operation = $this->mediaServicesWrapper->sendStopChannelOperation($channelResult->getId());

        // waiting for stop channel operation finishes
        $operation = $this->mediaServicesWrapper->awaitOperation($operation);

        // delete the channel
        $operation = $this->mediaServicesWrapper->sendDeleteChannelOperation($channelResult->getId());

        // waiting for delete operation finishes
        $operation = $this->mediaServicesWrapper->awaitOperation($operation);

        // assert #3 the list should not contains the channel
        $list = $this->mediaServicesWrapper->getChannelList();

        foreach($list as $channel) {
            $this->assertFalse($channel->getId() == $channelId);
        }
    }

    /**
     * @group livefeatures
     * @group channel
     */
    public function testCreateGetStartResetStopDeleteValidateChannel()
    {
	    // Setup
        $channelName = TestResources::MEDIA_SERVICES_CHANNEL_NAME . $this->createSuffix();
        $channel = $this->makeChannelEncodingTypeNone($channelName);

        // test
        $operation = $this->mediaServicesWrapper->sendCreateChannelOperation($channel);

        // waiting for create operation finishes
        $operation = $this->mediaServicesWrapper->awaitOperation($operation);

        // get the created channel
        $channelResult = $this->mediaServicesWrapper->getChannel($operation->getTargetEntityId());

        // assert #1, channel must exists
        $channelId = $channelResult->getId();
        $this->assertEquals($channelId, $operation->getTargetEntityId());
        $this->assertEquals($channelResult->getState(), ChannelState::Stopped);
        $this->assertEqualsChannel($channel, $channelResult);

        // assert #2 the list should contains the channel
        $list = $this->mediaServicesWrapper->getChannelList();
        $exists = false;
        foreach($list as $channel) {
            if ($channel->getId() == $channelId) {
                $exists = true;
            }
        }
        $this->assertTrue($exists);

        // start the channel
        $operation = $this->mediaServicesWrapper->sendStartChannelOperation($channelResult->getId());

        // waiting for start channel operation finishes
        $operation = $this->mediaServicesWrapper->awaitOperation($operation);

        // get the stared channel
        $channelResult = $this->mediaServicesWrapper->getChannel($operation->getTargetEntityId());

        // assert that the channel is running
        $this->assertEquals($channelResult->getState(), ChannelState::Running);

        // reset the channel
        $operation = $this->mediaServicesWrapper->sendResetChannelOperation($channelResult->getId());

        // waiting for reset channel operation finishes
        $operation = $this->mediaServicesWrapper->awaitOperation($operation);

        // validate that the update was applied
        $this->assertEquals($operation->getState(), OperationState::Succeeded);

        // stop the channel
        $operation = $this->mediaServicesWrapper->sendStopChannelOperation($channelResult->getId());

        // waiting for stop channel operation finishes
        $operation = $this->mediaServicesWrapper->awaitOperation($operation);

        // delete the channel
        $operation = $this->mediaServicesWrapper->sendDeleteChannelOperation($channelResult->getId());

        // waiting for delete operation finishes
        $operation = $this->mediaServicesWrapper->awaitOperation($operation);

        // assert #3 the list should not contains the channel
        $list = $this->mediaServicesWrapper->getChannelList();

        foreach($list as $channel) {
            $this->assertFalse($channel->getId() == $channelId);
        }
    }

    /**
     * @group livefeatures
     * @group channel
     */
    public function testCreateGetStartAdStopDeleteValidateChannel()
    {
	    // Setup
        $channelName = TestResources::MEDIA_SERVICES_CHANNEL_NAME . $this->createSuffix();
        $channel = $this->makeChannelEncodingTypeStandard($channelName);

        // test
        $operation = $this->mediaServicesWrapper->sendCreateChannelOperation($channel);

        // waiting for create operation finishes
        $operation = $this->mediaServicesWrapper->awaitOperation($operation);

        // get the created channel
        $channelResult = $this->mediaServicesWrapper->getChannel($operation->getTargetEntityId());

        // assert #1, channel must exists
        $channelId = $channelResult->getId();
        $this->assertEquals($channelId, $operation->getTargetEntityId());
        $this->assertEquals($channelResult->getState(), ChannelState::Stopped);
        $this->assertEqualsChannel($channel, $channelResult);

        // assert #2 the list should contains the channel
        $list = $this->mediaServicesWrapper->getChannelList();
        $exists = false;
        foreach($list as $channel) {
            if ($channel->getId() == $channelId) {
                $exists = true;
            }
        }
        $this->assertTrue($exists);

        // start the channel
        $operation = $this->mediaServicesWrapper->sendStartChannelOperation($channelResult->getId());

        // waiting for start channel operation finishes
        $operation = $this->mediaServicesWrapper->awaitOperation($operation);

        // get the stared channel
        $channelResult = $this->mediaServicesWrapper->getChannel($operation->getTargetEntityId());

        // assert that the channel is running
        $this->assertEquals($channelResult->getState(), ChannelState::Running);

        // start advertisement on the channel
        $operation = $this->mediaServicesWrapper->sendStartAdvertisementChannelOperation(
            $channelResult->getId(), "PT120S", "1234", true
        );

        // waiting for reset channel operation finishes
        $operation = $this->mediaServicesWrapper->awaitOperation($operation);

        // validate that the operation is completed successfully
        $this->assertEquals($operation->getState(), OperationState::Succeeded);

        // wait for 5 seconds before to send the end advertisement signal.
        sleep(5);

        // end advertisement on the channel
        $operation = $this->mediaServicesWrapper->sendEndAdvertisementChannelOperation($channelResult->getId(),"1234");

        // waiting for end advertisement on channel operation finishes
        $operation = $this->mediaServicesWrapper->awaitOperation($operation);

        // validate that the operation is completed successfully
        $this->assertEquals($operation->getState(), OperationState::Succeeded);

        // stop the channel
        $operation = $this->mediaServicesWrapper->sendStopChannelOperation($channelResult->getId());

        // waiting for stop channel operation finishes
        $operation = $this->mediaServicesWrapper->awaitOperation($operation);

        // delete the channel
        $operation = $this->mediaServicesWrapper->sendDeleteChannelOperation($channelResult->getId());

        // waiting for delete operation finishes
        $operation = $this->mediaServicesWrapper->awaitOperation($operation);

        // assert #3 the list should not contains the channel
        $list = $this->mediaServicesWrapper->getChannelList();

        foreach($list as $channel3) {
            $this->assertFalse($channel3->getId() == $channelId);
        }
    }

    /**
     * @group livefeatures
     * @group channel
     */
    public function testCreateGetStartSlateStopDeleteValidateChannel()
    {
        // Upload image
        $resource = fopen(__DIR__."/resources/default_slate_image_media_services.jpg", 'r');
        $slateAsset = $this->uploadSingleFile("slate.jpg", $resource);

	    // Setup
        $channelName = TestResources::MEDIA_SERVICES_CHANNEL_NAME . $this->createSuffix();
        $channel = $this->makeChannelEncodingTypeStandard($channelName);

        // test
        $operation = $this->mediaServicesWrapper->sendCreateChannelOperation($channel);

        // waiting for create operation finishes
        $operation = $this->mediaServicesWrapper->awaitOperation($operation);

        // get the created channel
        $channelResult = $this->mediaServicesWrapper->getChannel($operation->getTargetEntityId());

        // assert #1, channel must exists
        $channelId = $channelResult->getId();
        $this->assertEquals($channelId, $operation->getTargetEntityId());
        $this->assertEquals($channelResult->getState(), ChannelState::Stopped);
        $this->assertEqualsChannel($channel, $channelResult);

        // assert #2 the list should contains the channel
        $list = $this->mediaServicesWrapper->getChannelList();
        $exists = false;
        foreach($list as $channel) {
            if ($channel->getId() == $channelId) {
                $exists = true;
            }
        }
        $this->assertTrue($exists);

        // start the channel
        $operation = $this->mediaServicesWrapper->sendStartChannelOperation($channelResult->getId());

        // waiting for start channel operation finishes
        $operation = $this->mediaServicesWrapper->awaitOperation($operation);

        // get the stared channel
        $channelResult = $this->mediaServicesWrapper->getChannel($operation->getTargetEntityId());

        // assert that the channel is running
        $this->assertEquals($channelResult->getState(), ChannelState::Running);

        // show slate on the channel
        $operation = $this->mediaServicesWrapper->sendShowSlateChannelOperation($channelResult->getId(),
                                            "PT30S", $slateAsset->getId());

        // waiting for reset channel operation finishes
        $operation = $this->mediaServicesWrapper->awaitOperation($operation);

        // validate that the operation is completed successfully
        $this->assertEquals($operation->getState(), OperationState::Succeeded);

        // wait for 5 seconds before to send the end advertisement signal.
        sleep(5);

        // hide slate on the channel
        $operation = $this->mediaServicesWrapper->sendHideSlateChannelOperation($channelResult->getId());

        // waiting for end advertisement on channel operation finishes
        $operation = $this->mediaServicesWrapper->awaitOperation($operation);

        // validate that the operation is completed successfully
        $this->assertEquals($operation->getState(), OperationState::Succeeded);

        // stop the channel
        $operation = $this->mediaServicesWrapper->sendStopChannelOperation($channelResult->getId());

        // waiting for stop channel operation finishes
        $operation = $this->mediaServicesWrapper->awaitOperation($operation);

        // delete the channel
        $operation = $this->mediaServicesWrapper->sendDeleteChannelOperation($channelResult->getId());

        // waiting for delete operation finishes
        $operation = $this->mediaServicesWrapper->awaitOperation($operation);

        // assert #3 the list should not contains the channel
        $list = $this->mediaServicesWrapper->getChannelList();

        foreach($list as $channel) {
            $this->assertFalse($channel->getId() == $channelId);
        }
    }

    /**
     * @group livefeatures
     * @group channel
     */
    public function testSyncCreateGetDeleteValidateChannel()
    {
        // Setup
        $channelName = TestResources::MEDIA_SERVICES_CHANNEL_NAME . $this->createSuffix();
        $channel = $this->makeChannelEncodingTypeStandard($channelName);

        // create channel
        $channelResult = $this->mediaServicesWrapper->createChannel($channel);
        $this->assertEqualsChannel($channel, $channelResult);

        // assert #1 the list should contains the channel
        $list = $this->mediaServicesWrapper->getChannelList();
        $exists = false;
        foreach($list as $channel) {
            if ($channel->getId() == $channelResult->getId()) {
                $exists = true;
            }
        }
        $this->assertTrue($exists);

        // delete the channel
        $this->mediaServicesWrapper->deleteChannel($channelResult);

        // assert #2 the list should not contains the channel
        $list = $this->mediaServicesWrapper->getChannelList();

        foreach($list as $channel3) {
            $this->assertFalse($channel3->getId() == $channelResult->getId());
        }
    }

    /**
     * @group livefeatures
     * @group channel
     */
    public function testRoundTripChannelSyncOperations()
    {
        // Upload image
        $resource = fopen(__DIR__."/resources/default_slate_image_media_services.jpg", 'r');
        $slateAsset = $this->uploadSingleFile("slate3.jpg", $resource);

        // Setup
        $channelName = TestResources::MEDIA_SERVICES_CHANNEL_NAME . $this->createSuffix();
        $channel = $this->makeChannelEncodingTypeStandard($channelName);

        // test
        $channelResult = $this->mediaServicesWrapper->createChannel($channel);

        // assert #1, channel must exists
        $channelId = $channelResult->getId();
        $this->assertEquals($channelResult->getState(), ChannelState::Stopped);
        $this->assertEqualsChannel($channel, $channelResult);

        // assert #2 the list should contains the channel
        $list = $this->mediaServicesWrapper->getChannelList();
        $exists = false;
        foreach($list as $channel2) {
            if ($channel2->getId() == $channelId) {
                $exists = true;
            }
        }
        $this->assertTrue($exists);

        // update channel description
        $channelResult->setDescription("Alternative Description");

        // update the channel
        $this->mediaServicesWrapper->updateChannel($channelResult);

        // get the created updated
        $channelResult = $this->mediaServicesWrapper->getChannel($channelResult);

        // assert the description is updated
        $this->assertEquals($channelResult->getDescription(), "Alternative Description");

        // start the channel
        $this->mediaServicesWrapper->startChannel($channelResult);
        $channelResult = $this->mediaServicesWrapper->getChannel($channelResult);

        // assert that the channel is running
        $this->assertEquals($channelResult->getState(), ChannelState::Running);

        // wait for 5 seconds before to reset the channel
        sleep(5);

        // reset the channel
        $this->mediaServicesWrapper->resetChannel($channelResult);

        // show slate on the channel
        $operation = $this->mediaServicesWrapper->showSlateChannel($channelResult->getId(),
                                            "PT30S", $slateAsset->getId());

        // wait for 5 seconds before to send the end advertisement signal.
        sleep(5);

        // hide slate on the channel
        $operation = $this->mediaServicesWrapper->hideSlateChannel($channelResult->getId());

        // wait for 5 seconds before to send start AD
        sleep(5);

        // start advertisement on the channel
        $this->mediaServicesWrapper->startAdvertisementChannel($channelResult->getId(),
                                    "PT120S", "1234", true);

        // wait for 5 seconds before to send the end advertisement signal.
        sleep(5);

        // end advertisement on the channel
        $this->mediaServicesWrapper->endAdvertisementChannel($channelResult->getId(), "1234");

        // stop the channel
        $this->mediaServicesWrapper->stopChannel($channelResult);

        // delete the channel
        $this->mediaServicesWrapper->deleteChannel($channelResult);

        // assert #3 the list should not contains the channel
        $list = $this->mediaServicesWrapper->getChannelList();

        foreach($list as $channel2) {
            $this->assertFalse($channel2->getId() == $channelId);
        }
    }

    /**
     * @group livefeatures
     * @group program
     */
    public function testUpdateProgramOperations()
    {
        // Setup
        $channelName = TestResources::MEDIA_SERVICES_CHANNEL_NAME . $this->createSuffix();
        $channel = $this->makeChannelEncodingTypeStandard($channelName);

        $channel = $this->mediaServicesWrapper->createChannel($channel);
        $program = $this->mediaServicesWrapper->createProgram($this->makeProgram("Prog", $channel));

        // test
        $program->setDescription("Alternate Description");
        $programResult = $this->mediaServicesWrapper->updateProgram($program);

        // assert
        $this->assertEqualsProgram($program, $programResult);

        // teardown
        $this->mediaServicesWrapper->deleteProgram($program);
        $this->mediaServicesWrapper->deleteChannel($channel);
    }

    /**
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::createChannel
     * @group livefeatures
     * @group program
     */
    public function testRoundTripProgramOperations()
    {
        // Upload image
        $resource = fopen(__DIR__."/resources/default_slate_image_media_services.jpg", 'r');
        $slateAsset = $this->uploadSingleFile("slate_program.jpg", $resource);

        // Setup
        $channelName = TestResources::MEDIA_SERVICES_CHANNEL_NAME . $this->createSuffix();
        $channel = $this->makeChannelEncodingTypeStandard($channelName);
        $channelResult = $this->mediaServicesWrapper->createChannel($channel);
        $this->mediaServicesWrapper->startChannel($channelResult);
        $channelResult = $this->mediaServicesWrapper->getChannel($channelResult);

        // assert that the channel is running
        $this->assertEquals($channelResult->getState(), ChannelState::Running);

        // wait for 5 seconds before to create a program
        sleep(5);

        // Test
        $program = $this->makeProgram("Progname", $channelResult);
        $program = $this->mediaServicesWrapper->createProgram($program);

        // wait for 5 seconds before to start the program
        sleep(5);

        $this->mediaServicesWrapper->startProgram($program);

        // assert that the program is in running state
        $program = $this->mediaServicesWrapper->getProgram($program);
        $this->assertEquals($program->getState(), ProgramState::Running);

        // assert that the channel has only one program and it is the created one
        $programList = $this->mediaServicesWrapper->getProgramList($channelResult);
        $this->assertEquals(1, count($programList));
        foreach($programList as $p) {
            $this->assertEquals($program->getId(), $p->getId());
        }

        // wait for 5 seconds before to stop the program
        sleep(5);

        $this->mediaServicesWrapper->stopProgram($program);

        // assert that the program is in running state
        $program = $this->mediaServicesWrapper->getProgram($program);
        $this->assertEquals($program->getState(), ProgramState::Stopped);

        // wait for 5 seconds before to delete the program
        sleep(5);

        $program = $this->mediaServicesWrapper->deleteProgram($program);

        // assert that the channel has no programs
        $programList = $this->mediaServicesWrapper->getProgramList($channelResult);
        $this->assertEquals(0, count($programList));

        // teardown
        // stop & delete the channel
        $this->mediaServicesWrapper->stopChannel($channelResult);
        $this->mediaServicesWrapper->deleteChannel($channelResult);

        // assert the list should not contains the channel
        $list = $this->mediaServicesWrapper->getChannelList();
        $channelId = $channel->getId();
        foreach($list as $channel2) {
            $this->assertFalse($channel2->getId() == $channelId);
        }
    }

    /// Utils
    private function makeProgram($name, Channel $channel) {
        $asset = new Asset(Asset::OPTIONS_NONE);
        $asset->setName(TestResources::MEDIA_SERVICES_ASSET_NAME.$this->createSuffix());
        $asset = $this->createAsset($asset);

        $policy = new AssetDeliveryPolicy();
        $policy->setName("Clear Policy");
        $policy->setAssetDeliveryProtocol(AssetDeliveryProtocol::SMOOTH_STREAMING | AssetDeliveryProtocol::DASH | AssetDeliveryProtocol::HLS);
        $policy->setAssetDeliveryPolicyType(AssetDeliveryPolicyType::NO_DYNAMIC_ENCRYPTION);

        $policy = $this->createAssetDeliveryPolicy($policy);
        $this->mediaServicesWrapper->linkDeliveryPolicyToAsset($asset, $policy);

        $program = new Program();
        $program->setName($name);
        $program->setAssetId($asset->getId());
        $program->setArchiveWindowLength(new \DateInterval("PT1H"));
        $program->setChannelId($channel->getId());

        return $program;
    }

    private function makeChannelEncodingTypeNone($name) {
        $channel = new Channel();
        $channel->setName($name);
        $channel->setDescription("Description of channel {$name}");

        // channel Input
        $channelInput = new ChannelInput();
        //$channelInput->setKeyFrameInterval("PT1.9S"); TODO
        $channelInput->setStreamingProtocol(StreamingProtocol::FragmentedMP4);

        // channel Input\ChannelInputAccessControl
        $channelInputAccessControl = new ChannelInputAccessControl();
        $ciacIPAccessControl = new IPAccessControl();
        $ciacIPRange = new IPRange();
        $ciacIPRange->setName("default");
        $ciacIPRange->setAddress("0.0.0.0");
        $ciacIPRange->setSubnetPrefixLength("0");
        $ciacIPAccessControl->setAllow([$ciacIPRange]);
        $channelInputAccessControl->setIP($ciacIPAccessControl);
        $channelInput->setAccessControl($channelInputAccessControl);
        $channel->setInput($channelInput);

        // channel Preview
        $channelPreview = new ChannelPreview();

        // channel Preview\ChannelPreviewAccessControl
        $channelPreviewAccessControl = new ChannelPreviewAccessControl();
        $cpacIPAccessControl = new IPAccessControl();
        $cpacIPRange = new IPRange();
        $cpacIPRange->setName("default");
        $cpacIPRange->setAddress("0.0.0.0");
        $cpacIPRange->setSubnetPrefixLength("0");
        $cpacIPAccessControl->setAllow([$cpacIPRange]);
        $channelPreviewAccessControl->setIP($cpacIPAccessControl);
        $channelPreview->setAccessControl($channelPreviewAccessControl);
        $channel->setPreview($channelPreview);

        // encoding type
        $channel->setEncodingType(EncodingType::None);

        // cors rules
        $channel->setCrossSiteAccessPolicies(new CrossSiteAccessPolicies());
        return $channel;
    }

    private function makeChannelEncodingTypeStandard($name) {
        $channel = new Channel();
        $channel->setName($name);
        $channel->setDescription("Description of channel {$name}");

        // channel Input
        $channelInput = new ChannelInput();
        $channelInput->setStreamingProtocol(StreamingProtocol::RTPMPEG2TS);

        // channel Input\ChannelInputAccessControl
        $channelInputAccessControl = new ChannelInputAccessControl();
        $ciacIPAccessControl = new IPAccessControl();
        $ciacIPRange = new IPRange();
        $ciacIPRange->setName("default");
        $ciacIPRange->setAddress("0.0.0.0");
        $ciacIPRange->setSubnetPrefixLength("0");
        $ciacIPAccessControl->setAllow([$ciacIPRange]);
        $channelInputAccessControl->setIP($ciacIPAccessControl);
        $channelInput->setAccessControl($channelInputAccessControl);
        $channel->setInput($channelInput);

        // channel Preview
        $channelPreview = new ChannelPreview();

        // channel Preview\ChannelPreviewAccessControl
        $channelPreviewAccessControl = new ChannelPreviewAccessControl();
        $cpacIPAccessControl = new IPAccessControl();
        $cpacIPRange = new IPRange();
        $cpacIPRange->setName("default");
        $cpacIPRange->setAddress("0.0.0.0");
        $cpacIPRange->setSubnetPrefixLength("0");
        $cpacIPAccessControl->setAllow([$cpacIPRange]);
        $channelPreviewAccessControl->setIP($cpacIPAccessControl);
        $channelPreview->setAccessControl($channelPreviewAccessControl);
        $channel->setPreview($channelPreview);

        // encoding type
        $channel->setEncodingType(EncodingType::Standard);
        $channelEncoding = new ChannelEncoding();
        $channelEncoding->setSystemPreset(ChannelEncodingPresets::Default720p);
        $channelEncoding->setAdMarkerSource(AdMarkerSources::Scte35);
        $channelEncoding->setIgnoreCea708ClosedCaptions(true);
        $vs = new VideoStream();
        $vs->setIndex(0);
        $channelEncoding->setVideoStreams([$vs]);
        $as = new AudioStream();
        $as->setIndex(0);
        $as->setLanguage("eng");
        $channelEncoding->setAudioStreams([$as]);
        $channel->setEncoding($channelEncoding);

        // cors rules
        $channel->setCrossSiteAccessPolicies(new CrossSiteAccessPolicies());
        return $channel;
    }

    /// Assertion

    /**
     * @param TokenRestrictionTemplate $expected
     * @param TokenRestrictionTemplate $actual
     */
    public function assertEqualsTokenRestrictionTemplate($expected, $actual)
    {
        // Assert
        $this->assertNotNull($expected);
        $this->assertNotNull($actual);
        $this->assertEquals($expected->getTokenType(), $actual->getTokenType());
        $this->assertEquals($expected->getAudience(), $actual->getAudience());
        $this->assertEquals($expected->getIssuer(), $actual->getIssuer());
        $this->assertEqualsVerificationKey($expected->getPrimaryVerificationKey(), $actual->getPrimaryVerificationKey());
        $this->assertEquals(count($expected->getAlternateVerificationKeys()), count($actual->getAlternateVerificationKeys()));
        for ($i = 0; $i < count($expected->getAlternateVerificationKeys()); ++$i) {
            $this->assertEqualsVerificationKey($expected->getAlternateVerificationKeys()[$i], $actual->getAlternateVerificationKeys()[$i]);
        }
        $this->assertEquals(count($expected->getRequiredClaims()), count($actual->getRequiredClaims()));
        for ($i = 0; $i < count($expected->getRequiredClaims()); ++$i) {
            $this->assertEqualsRequiredClaim($expected->getRequiredClaims()[$i], $actual->getRequiredClaims()[$i]);
        }
        if ($expected->getOpenIdConnectDiscoveryDocument() != null) {
            $this->assertNotNull($actual->getOpenIdConnectDiscoveryDocument());
            $this->assertEquals($expected->getOpenIdConnectDiscoveryDocument()->getOpenIdDiscoveryUri(), $actual->getOpenIdConnectDiscoveryDocument()->getOpenIdDiscoveryUri());
        } else {
            $this->assertNull($actual->getOpenIdConnectDiscoveryDocument());
        }
    }

    public function assertEqualsVerificationKey($expected, $actual)
    {
        if ($expected instanceof SymmetricVerificationKey) {
            if ($actual instanceof SymmetricVerificationKey) {
                $this->assertEquals($expected->getKeyValue(), $actual->getKeyValue());
            } else {
                $this->fail();
            }
        }

        if ($expected instanceof X509CertTokenVerificationKey) {
            if ($actual instanceof X509CertTokenVerificationKey) {
                $this->assertEquals($expected->getRawBody(), $actual->getRawBody());
            } else {
                $this->fail();
            }
        }
    }

    public function assertEqualsRequiredClaim(TokenClaim $expected, TokenClaim $actual)
    {
        $this->assertEquals($expected->getClaimType(), $actual->getClaimType());
        $this->assertEquals($expected->getClaimValue(), $actual->getClaimValue());
    }

    /**
     * Assert that both PlayReadyLicenceResponseTemplate are equal.
     *
     * @param PlayReadyLicenseResponseTemplate $expected
     * @param PlayReadyLicenseResponseTemplate $actual
     */
    public function assertEqualsLicenseResponseTemplate(
        PlayReadyLicenseResponseTemplate $expected, PlayReadyLicenseResponseTemplate$actual)
    {
        $this->assertEquals(count($expected->getLicenseTemplates()), count($actual->getLicenseTemplates()));
        for ($i = 0; $i < count($expected->getLicenseTemplates()); ++$i) {
            $this->assertEqualsLicenseTemplate($expected->getLicenseTemplates()[$i], $actual->getLicenseTemplates()[$i]);
        }
        $this->assertEquals($expected->getResponseCustomData(), $actual->getResponseCustomData());
    }

    public function assertEqualsLicenseTemplate(
        PlayReadyLicenseTemplate $expected, PlayReadyLicenseTemplate $actual
    ) {
        $this->assertEquals($expected->getAllowTestDevices(), $actual->getAllowTestDevices());
        $this->assertEquals($expected->getLicenseType(), $actual->getLicenseType());
        $this->assertEquals($expected->getBeginDate(), $actual->getBeginDate());
        $this->assertEquals($expected->getExpirationDate(), $actual->getExpirationDate());
        $this->assertEquals($expected->getRelativeBeginDate(), $actual->getRelativeBeginDate());
        $this->assertEquals($expected->getRelativeExpirationDate(), $actual->getRelativeExpirationDate());
        $this->assertEquals($expected->getGracePeriod(), $actual->getGracePeriod());
        $this->assertEquals($expected->getLicenseType(), $actual->getLicenseType());
        $this->assertEqualsPlayRight($expected->getPlayRight(), $actual->getPlayRight());
        $this->assertEqualsContentKey($expected->getContentKey(), $actual->getContentKey());
    }

    public function assertEqualsContentKey($expected, $actual)
    {
        if ($expected instanceof ContentEncryptionKeyFromHeader) {
            $this->assertTrue($actual instanceof ContentEncryptionKeyFromHeader);
        }

        if ($expected instanceof ContentEncryptionKeyFromKeyIdentifier) {
            if ($actual instanceof ContentEncryptionKeyFromKeyIdentifier) {
                $this->assertEquals($expected->getKeyIdentifier(), $actual->getKeyIdentifier());
            } else {
                $this->fail();
            }
        }
    }

    public function assertEqualsPlayRight(PlayReadyPlayRight $expected, PlayReadyPlayRight $actual)
    {
        $this->assertNotNull($expected);
        $this->assertNotNull($actual);

        $this->assertEquals($expected->getAllowPassingVideoContentToUnknownOutput(), $actual->getAllowPassingVideoContentToUnknownOutput());
        $this->assertEquals($expected->getDigitalVideoOnlyContentRestriction(), $actual->getDigitalVideoOnlyContentRestriction());
        $this->assertEquals($expected->getAnalogVideoOpl(), $actual->getAnalogVideoOpl());
        $this->assertEquals($expected->getCompressedDigitalAudioOpl(), $actual->getCompressedDigitalAudioOpl());
        $this->assertEquals($expected->getImageConstraintForAnalogComponentVideoRestriction(), $actual->getImageConstraintForAnalogComponentVideoRestriction());
        $this->assertEquals($expected->getImageConstraintForAnalogComputerMonitorRestriction(), $actual->getImageConstraintForAnalogComputerMonitorRestriction());
        $this->assertEquals($expected->getCompressedDigitalVideoOpl(), $actual->getCompressedDigitalVideoOpl());
        $this->assertEquals($expected->getUncompressedDigitalAudioOpl(), $actual->getUncompressedDigitalAudioOpl());

        if ($expected->getScmsRestriction() != null) {
            $this->assertNotNull($actual->getScmsRestriction());
            $this->assertEquals($expected->getScmsRestriction()->getConfigurationData(), $actual->getScmsRestriction()->getConfigurationData());
        }

        if ($expected->getAgcAndColorStripeRestriction() != null) {
            $this->assertNotNull($actual->getAgcAndColorStripeRestriction());
            $this->assertEquals($expected->getAgcAndColorStripeRestriction()->getConfigurationData(), $actual->getAgcAndColorStripeRestriction()->getConfigurationData());
        }

        if ($expected->getExplicitAnalogTelevisionOutputRestriction() != null) {
            $this->assertNotNull($actual->getExplicitAnalogTelevisionOutputRestriction());
            $this->assertEquals($expected->getExplicitAnalogTelevisionOutputRestriction()->getBestEffort(), $actual->getExplicitAnalogTelevisionOutputRestriction()->getBestEffort());
            $this->assertEquals($expected->getExplicitAnalogTelevisionOutputRestriction()->getConfigurationData(), $actual->getExplicitAnalogTelevisionOutputRestriction()->getConfigurationData());
        }
    }

    /**
     * Assertion that both Widevine messages are equals.
     *
     * @param WidevineMessage $expected
     * @param WidevineMessage $actual
     */
    public function assertEqualsWidevineMessage($expected, $actual)
    {
        $this->assertEquals($expected->allowed_track_types, $actual->allowed_track_types);
        $this->assertEquals(count($expected->content_key_specs), count($actual->content_key_specs));
        for ($i = 0; $i < count($expected->content_key_specs); ++$i) {
            $expectedCks = $expected->content_key_specs[$i];
            $actualCks = $actual->content_key_specs[$i];
            $this->assertEquals($expectedCks->track_type, $actualCks->track_type);
            $this->assertEquals($expectedCks->key_id, $actualCks->key_id);
            $this->assertEquals($expectedCks->security_level, $actualCks->security_level);
            $this->assertEquals($expectedCks->required_output_protection, $actualCks->required_output_protection);
            if (isset($expectedCks->required_output_protection) &&
                isset($actualCks->required_output_protection)) {
                $this->assertEquals($expectedCks->required_output_protection->hdcp, $actualCks->required_output_protection->hdcp);
            }
        }
        $this->assertEquals($expected->policy_overrides, $actual->policy_overrides);
    }

    // channel validation
    public function assertEqualsIPRange(IPRange $expected, IPRange $actual) {
         $this->assertEquals($expected->getName(), $actual->getName());
         $this->assertEquals($expected->getAddress(), $actual->getAddress());
         $this->assertEquals($expected->getSubnetPrefixLength(), $actual->getSubnetPrefixLength());
    }

    public function assertEqualsIPAccessControl(IPAccessControl $expected, IPAccessControl $actual) {
        $ix = 0;
        foreach ($expected->getAllow() as $ipRange) {
            $this->assertEqualsIPRange($ipRange, $actual->getAllow()[$ix++]);
        }
    }

    public function assertEqualsChannelInputAccessControl(
        ChannelInputAccessControl $expected, ChannelInputAccessControl $actual
    ) {
        $this->assertEqualsIPAccessControl($expected->getIP(), $actual->getIP());
    }

    public function assertEqualsChannelPreviewAccessControl(
        ChannelPreviewAccessControl $expected, ChannelPreviewAccessControl $actual
    ) {
        $this->assertEqualsIPAccessControl($expected->getIP(), $actual->getIP());
    }

    public function assertEqualsChannelInput(ChannelInput $expected, ChannelInput $actual) {
        $this->assertEquals($expected->getKeyFrameInterval(), $actual->getKeyFrameInterval());
        $this->assertEquals($expected->getStreamingProtocol(), $actual->getStreamingProtocol());
        $this->assertEqualsChannelInputAccessControl($expected->getAccessControl(), $actual->getAccessControl());
        // endpoints are server side generated: not validated.
    }

    public function assertEqualsChannelPreview(ChannelPreview $expected, ChannelPreview $actual) {
        $this->assertEqualsChannelPreviewAccessControl($expected->getAccessControl(), $actual->getAccessControl());
        // endpoints are server side generated: not validated.
    }

    public function assertEqualsVideoStream(VideoStream $expected, VideoStream $actual) {
         $this->assertEquals($expected->getIndex(), $actual->getIndex());
    }

    public function assertEqualsAudioStream(AudioStream $expected, AudioStream $actual) {
         $this->assertEquals($expected->getIndex(), $actual->getIndex());
         $this->assertEquals($expected->getLanguage(), $actual->getLanguage());
    }

    public function assertEqualsEncoding(ChannelEncoding $expected = null, ChannelEncoding $actual = null) {
        if (is_null($expected) && is_null($actual)) {
            return; // pass
        } else if (is_null($expected) || is_null($actual)) {
            $this->assertFalse(is_null($expected) || is_null($actual));
            return; // fail
        }

        $this->assertEquals($expected->getAdMarkerSource(), $actual->getAdMarkerSource());
        $this->assertEquals($expected->getIgnoreCea708ClosedCaptions(), $actual->getIgnoreCea708ClosedCaptions());
        $ix = 0;
        foreach($expected->getVideoStreams() as $vs) {
            $this->assertEqualsVideoStream($vs, $actual->getVideoStreams()[$ix++]);
        }
        $ix = 0;
        foreach($expected->getAudioStreams() as $as) {
            $this->assertEqualsAudioStream($as, $actual->getAudioStreams()[$ix++]);
        }
        $this->assertEquals($expected->getSystemPreset(), $actual->getSystemPreset());
    }

    public function assertEqualsSlate(ChannelSlate $expected = null, ChannelSlate $actual = null) {
        if (is_null($expected) && is_null($actual)) {
            return; // pass
        } else if (is_null($expected) || is_null($actual)) {
            $this->assertFalse(is_null($expected) || is_null($actual));
            return; // fail
        }

        $this->assertEquals($expected->getInsertSlateOnAdMarker(), $actual->getInsertSlateOnAdMarker());
        $this->assertEquals($expected->getDefaultSlateAssetId(), $actual->getDefaultSlateAssetId());
    }

    public function assertEqualsChannel(Channel $expected, Channel $actual) {
        // server side generated values are not verified
        $this->assertEquals($expected->getName(), $actual->getName());
        $this->assertEquals($expected->getDescription(), $actual->getDescription());
        $this->assertEqualsChannelInput($expected->getInput(), $actual->getInput());
        $this->assertEqualsChannelPreview($expected->getPreview(), $actual->getPreview());
        $this->assertEquals($expected->getEncodingType(), $actual->getEncodingType());
        $this->assertEqualsEncoding($expected->getEncoding(), $actual->getEncoding());
        $this->assertEqualsSlate($expected->getSlate(), $actual->getSlate());
    }

    public function assertEqualsProgram(Program $expected, Program $actual) {
        // server side generated values are not verified
        $this->assertEquals($expected->getName(), $actual->getName());
        $this->assertEquals($expected->getDescription(), $actual->getDescription());
        $this->assertEquals($expected->getAssetId(), $actual->getAssetId());
        $this->assertEquals($expected->getChannelId(), $actual->getChannelId());
        $this->assertEquals($expected->getArchiveWindowLength(), $actual->getArchiveWindowLength());
        $this->assertEquals($expected->getManifestName(), $actual->getManifestName());
        $this->assertEquals($expected->getState(), $actual->getState());
    }
}
