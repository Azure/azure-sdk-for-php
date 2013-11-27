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
 * @package   Tests\Unit\WindowsAzure\Blob
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */

namespace Tests\Unit\WindowsAzure\MediaServices;
use Tests\Framework\MediaServicesRestProxyTestBase;
use Tests\Framework\TestResources;
use WindowsAzure\Common\Internal\Resources;
use WindowsAzure\Common\Internal\Utilities;
use WindowsAzure\Common\ServiceException;
use WindowsAzure\Common\Models\ServiceProperties;
use WindowsAzure\MediaServices\Models\Asset;
use WindowsAzure\MediaServices\Models\AccessPolicy;
use WindowsAzure\MediaServices\Models\AssetFile;
use WindowsAzure\MediaServices\Models\Locator;

/**
 * Unit tests for class MediaServicesRestProxy
 *
 * @category  Microsoft
 * @package   Tests\Unit\WindowsAzure\Blob
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: 0.3.1_2011-08
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
class MediaServicesFunctionalTest extends MediaServicesRestProxyTestBase
{
    /**
    * @covers WindowsAzure\MediaServices\MediaServicesRestProxy::createAsset
    */
    public function testCreatEmptyAsset()
    {
        // Setup
        $assetName      = 'TestAsset' . $this->createSuffix();
        $assetOptions   = Asset::OPTIONS_NONE;

        // Test
        $asset = new Asset($assetOptions);
        $asset->setName($assetName);
        $asset = $this->createAsset($asset);

        // Assert
        $this->assertEquals($assetName, $asset->getName());
        $this->assertEquals($assetOptions, $asset->getOptions());
        $this->assertNotNull($asset->getId());
        $this->assertNotNull($asset->getCreated());
    }

    /**
     * @covers WindowsAzure\MediaServices\MediaServicesRestProxy::createAsset
     * @covers WindowsAzure\MediaServices\MediaServicesRestProxy::createAccessPolicy
     * @covers WindowsAzure\MediaServices\MediaServicesRestProxy::createLocator
     * @covers WindowsAzure\MediaServices\MediaServicesRestProxy::createFileInfos
     * @covers WindowsAzure\MediaServices\MediaServicesRestProxy::getAssetFiles
     */
    public function testCreateAssetWithFiles()
    {
        // Setup
        $assetName              = 'TestAsset' . $this->createSuffix();
        $assetOptions           = Asset::OPTIONS_NONE;

        $accessPolicyName       = 'AccessPolicyTest' . $this->createSuffix();
        $accessPolicyDiration   = 30;
        $accessPolicyPermission = AccessPolicy::PERMISSIONS_WRITE;

        $locatorStartTime       = new \DateTime('now -5 minutes');
        $locatorType            = Locator::TYPE_SAS;

        $fileName               = 'simple.avi';
        $otherFileName          = 'other.avi';

        // Test
        $asset = new Asset($assetOptions);
        $asset->setName($assetName);
        $asset = $this->createAsset($asset);

        $access = new AccessPolicy($accessPolicyName);
        $access->setDurationInMinutes($accessPolicyDiration);
        $access->setPermissions($accessPolicyPermission);
        $access = $this->createAccessPolicy($access);

        $locator = new Locator($asset,  $access, $locatorType);
        $locator->setStartTime($locatorStartTime);
        $locator = $this->createLocator($locator);

        $this->restProxy->uploadAssetFile($locator, $fileName, 'test file content');
        $this->restProxy->uploadAssetFile($locator, $otherFileName, 'other file content');

        $this->restProxy->createFileInfos($asset);
        $assetFiles = $this->restProxy->getAssetFiles(null, $asset);

        // Assert
        $this->assertEquals($assetName, $asset->getName());
        $this->assertEquals($assetOptions, $asset->getOptions());
        $this->assertNotNull($asset->getId());
        $this->assertNotNull($asset->getCreated());

        $this->assertEquals($accessPolicyName, $access->getName());
        $this->assertEquals($accessPolicyDiration, $access->getDurationInMinutes());
        $this->assertEquals($accessPolicyPermission, $access->getPermissions());
        $this->assertNotNull($asset->getId());
        $this->assertNotNull($asset->getCreated());

        $this->assertEquals($locatorType, $locator->getType());
        $this->assertEquals($locatorStartTime->getTimestamp(), $locator->getStartTime()->getTimestamp());
        $this->assertEquals($asset->getId(), $locator->getAssetId());
        $this->assertEquals($access->getId(), $locator->getAccessPolicyId());

        $this->assertEquals(2, count($assetFiles));
        $this->assertEquals($otherFileName, $assetFiles[0]->getName());
        $this->assertEquals($asset->getId(), $assetFiles[0]->getParentAssetId());
        $this->assertEquals($fileName, $assetFiles[1]->getName());
        $this->assertEquals($asset->getId(), $assetFiles[1]->getParentAssetId());
    }

}