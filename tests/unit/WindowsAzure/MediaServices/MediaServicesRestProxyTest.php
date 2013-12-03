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
use WindowsAzure\MediaServices\Models\Locator;
use WindowsAzure\MediaServices\Models\Job;
use WindowsAzure\MediaServices\Models\Task;
use WindowsAzure\MediaServices\Models\TaskOptions;
use WindowsAzure\MediaServices\Models\JobTemplate;
use WindowsAzure\MediaServices\Models\TaskTemplate;

/**
 * Unit tests for class MediaServicesRestProxy
 *
 * @category Microsoft
 * @package Tests\Unit\WindowsAzure\MediaServices
 * @author Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright Microsoft Corporation
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache License 2.0
 * @version Release: 0.3.1_2011-08
 * @link https://github.com/windowsazure/azure-sdk-for-php
 */
class MediaServicesRestProxyTest extends MediaServicesRestProxyTestBase
{

    /**
     * @covers WindowsAzure\MediaServices\MediaServicesRestProxy::createAsset
     * @covers WindowsAzure\MediaServices\MediaServicesRestProxy::deleteAsset
     * @covers WindowsAzure\MediaServices\MediaServicesRestProxy::send
     * @covers WindowsAzure\MediaServices\MediaServicesRestProxy::wrapAtomEntry
     * @covers WindowsAzure\MediaServices\MediaServicesRestProxy::getPropertiesFromAtomEntry
     */
    public function testCreateAsset()
    {
        // Setup
        $asset = new Asset(Asset::OPTIONS_NONE);
        $asset->setName('testAsset' . $this->createSuffix());

        // Test
        $result = $this->createAsset($asset);

        // Assert
        $this->assertEquals($asset->getName(), $result->getName());
    }

    /**
     * @covers WindowsAzure\MediaServices\MediaServicesRestProxy::getAsset
     * @covers WindowsAzure\MediaServices\MediaServicesRestProxy::send
     * @covers WindowsAzure\MediaServices\MediaServicesRestProxy::wrapAtomEntry
     * @covers WindowsAzure\MediaServices\MediaServicesRestProxy::getPropertiesFromAtomEntry
     */
    public function testGetAsset()
    {
        // Setup
        $asset = new Asset(Asset::OPTIONS_NONE);
        $asset->setName('testAsset' . $this->createSuffix());
        $asset = $this->createAsset($asset);

        // Test
        $result = $this->restProxy->getAsset($asset);

        // Assert
        $this->assertEquals($asset->getId(), $result->getId());
    }

    /**
     * @covers WindowsAzure\MediaServices\MediaServicesRestProxy::getAssetList
     * @covers WindowsAzure\MediaServices\MediaServicesRestProxy::send
     * @covers WindowsAzure\MediaServices\MediaServicesRestProxy::wrapAtomEntry
     * @covers WindowsAzure\MediaServices\MediaServicesRestProxy::getPropertiesFromAtomEntry
     */
    public function testGetAssetList()
    {
        // Setup
        $asset = new Asset(Asset::OPTIONS_NONE);
        $asset->setName('testAsset' . $this->createSuffix());
        $asset = $this->createAsset($asset);

        // Test
        $result = $this->restProxy->getAssetList();

        // Assert
        $this->assertCount(1, $result);
        $this->assertEquals($asset->getName(), $result[0]->getName());
    }

    /**
     * @covers WindowsAzure\MediaServices\MediaServicesRestProxy::createAccessPolicy
     * @covers WindowsAzure\MediaServices\MediaServicesRestProxy::deleteAccessPolicy
     * @covers WindowsAzure\MediaServices\MediaServicesRestProxy::send
     * @covers WindowsAzure\MediaServices\MediaServicesRestProxy::wrapAtomEntry
     * @covers WindowsAzure\MediaServices\MediaServicesRestProxy::getPropertiesFromAtomEntry
     */
    public function testCreateAccessPolicy()
    {
        // Setup
        $name = 'Name';
        $sample = new AccessPolicy($name);
        $sample->setName('testAccess' . $this->createSuffix());
        $sample->setDurationInMinutes(30);

        // Test
        $result = $this->createAccessPolicy($sample);

        // Assert
        $this->assertEquals($sample->getName(), $result->getName());
    }

    /**
     * @covers WindowsAzure\MediaServices\MediaServicesRestProxy::createLocator
     * @covers WindowsAzure\MediaServices\MediaServicesRestProxy::deleteLocator
     * @covers WindowsAzure\MediaServices\MediaServicesRestProxy::send
     * @covers WindowsAzure\MediaServices\MediaServicesRestProxy::wrapAtomEntry
     * @covers WindowsAzure\MediaServices\MediaServicesRestProxy::getPropertiesFromAtomEntry
     */
    public function testCreateLocator()
    {
        // Setup
        $asset = new Asset(Asset::OPTIONS_NONE);
        $asset->setName('AssetForLocator' . $this->createSuffix());
        $asset = $this->createAsset($asset);

        $access = new AccessPolicy('Name');
        $access->setName('AccessForLocator' . $this->createSuffix());
        $access->setDurationInMinutes(30);
        $access->setPermissions(AccessPolicy::PERMISSIONS_READ + AccessPolicy::PERMISSIONS_WRITE + AccessPolicy::PERMISSIONS_DELETE + AccessPolicy::PERMISSIONS_LIST);
        $access = $this->createAccessPolicy($access);

        $locat = new Locator($asset, $access, 1);
        $locat->setName('testLocator' . $this->createSuffix());

        // Test
        $result = $this->createLocator($locat);

        // Assert
        $this->assertEquals($locat->getName(), $result->getName());
    }

    /**
     * @covers WindowsAzure\MediaServices\MediaServicesRestProxy::createFileInfos
     * @covers WindowsAzure\MediaServices\MediaServicesRestProxy::getAssetFiles
     * @covers WindowsAzure\MediaServices\MediaServicesRestProxy::uploadAssetFile
     * @covers WindowsAzure\MediaServices\MediaServicesRestProxy::send
     */
    public function testCreateFileInfos()
    {
        // Setup
        $asset = new Asset(Asset::OPTIONS_NONE);
        $asset->setName('TestAsset' . $this->createSuffix());
        $asset = $this->createAsset($asset);

        $access = new AccessPolicy('Name');
        $access->setName('TestAccessPolicy' . $this->createSuffix());
        $access->setDurationInMinutes(30);
        $access->setPermissions(AccessPolicy::PERMISSIONS_WRITE);
        $access = $this->createAccessPolicy($access);

        $locator = new Locator($asset, $access, Locator::TYPE_SAS);
        $locator->setName('TestLocator' . $this->createSuffix());
        $locator->setStartTime(new \DateTime('now -5 minutes'));
        $locator = $this->createLocator($locator);

        $fileName = 'simple.avi';
        $this->restProxy->uploadAssetFile($locator, $fileName, 'test file content');

        // Test
        $this->restProxy->createFileInfos($asset);

        // Assert
        $assetFiles = $this->restProxy->getAssetFiles(null, $asset);
        $this->assertEquals(1, count($assetFiles));
        $this->assertEquals($fileName, $assetFiles[0]->getName());
        $this->assertEquals($asset->getId(), $assetFiles[0]->getParentAssetId());
    }

    /**
     * @covers WindowsAzure\MediaServices\MediaServicesRestProxy::createFileInfos
     * @covers WindowsAzure\MediaServices\MediaServicesRestProxy::getAssetFiles
     * @covers WindowsAzure\MediaServices\MediaServicesRestProxy::uploadAssetFile
     * @covers WindowsAzure\MediaServices\MediaServicesRestProxy::send
     */
    public function testGetAssetFilesAll()
    {
        // Setup
        $asset = new Asset(Asset::OPTIONS_NONE);
        $asset->setName('TestAsset' . $this->createSuffix());
        $asset = $this->createAsset($asset);

        $access = new AccessPolicy('Name');
        $access->setName('TestAccessPolicy' . $this->createSuffix());
        $access->setDurationInMinutes(30);
        $access->setPermissions(AccessPolicy::PERMISSIONS_WRITE);
        $access = $this->createAccessPolicy($access);

        $locator = new Locator($asset, $access, Locator::TYPE_SAS);
        $locator->setName('TestLocator' . $this->createSuffix());
        $locator->setStartTime(new \DateTime('now -5 minutes'));
        $locator = $this->createLocator($locator);

        $fileName = 'simple.avi';
        $this->restProxy->uploadAssetFile($locator, $fileName, 'test file content');
        $this->restProxy->createFileInfos($asset);

        // Test
        $assetFiles = $this->restProxy->getAssetFiles();

        // Assert
        $this->assertEquals(1, count($assetFiles));
        $this->assertEquals($fileName, $assetFiles[0]->getName());
        $this->assertEquals($asset->getId(), $assetFiles[0]->getParentAssetId());
    }

    /**
     * @covers WindowsAzure\MediaServices\MediaServicesRestProxy::createFileInfos
     * @covers WindowsAzure\MediaServices\MediaServicesRestProxy::getAssetFiles
     * @covers WindowsAzure\MediaServices\MediaServicesRestProxy::uploadAssetFile
     * @covers WindowsAzure\MediaServices\MediaServicesRestProxy::send
     */
    public function testGetAssetFilesById()
    {
        // Setup
        $asset = new Asset(Asset::OPTIONS_NONE);
        $asset->setName('TestAsset' . $this->createSuffix());
        $asset = $this->createAsset($asset);

        $access = new AccessPolicy('Name');
        $access->setName('TestAccessPolicy' . $this->createSuffix());
        $access->setDurationInMinutes(30);
        $access->setPermissions(AccessPolicy::PERMISSIONS_WRITE);
        $access = $this->createAccessPolicy($access);

        $locator = new Locator($asset, $access, Locator::TYPE_SAS);
        $locator->setName('TestLocator' . $this->createSuffix());
        $locator->setStartTime(new \DateTime('now -5 minutes'));
        $locator = $this->createLocator($locator);

        $fileName = 'simple.avi';
        $this->restProxy->uploadAssetFile($locator, $fileName, 'test file content');
        $this->restProxy->createFileInfos($asset);
        $assetFiles = $this->restProxy->getAssetFiles(null, $asset);

        // Test
        $result = $this->restProxy->getAssetFiles($assetFiles[0]);

        // Assert
        $this->assertEquals(1, count($result));
        $this->assertEquals($fileName, $result[0]->getName());
        $this->assertEquals($asset->getId(), $result[0]->getParentAssetId());
    }

    /**
     * @covers WindowsAzure\MediaServices\MediaServicesRestProxy::createJob
     * @covers WindowsAzure\MediaServices\MediaServicesRestProxy::send
     */
    public function testCreateJobWithTasks()
    {
        // Setup
        $asset = $this->createAssetWithFile();

        $taskBody = '<?xml version="1.0" encoding="utf-8"?><taskBody><inputAsset>JobInputAsset(0)</inputAsset><outputAsset assetCreationOptions="0" assetName="Output asset">JobOutputAsset(0)</outputAsset></taskBody>';
        $mediaProcessorId = 'nb:mpid:UUID:2e7aa8f3-4961-4e0c-b4db-0e0439e524f5';
        $task = new Task($taskBody, $mediaProcessorId, TaskOptions::NONE);
        $task->setConfiguration('H.264 HD 720p VBR');

        $job = new Job();
        $job->setName('TestJob' . $this->createSuffix());

        // Test
        $result = $this->restProxy->createJob($job, array($asset), array($task));

        // Assert
        $this->assertEquals($job->getName(), $result->getName());
    }

    /**
     * @covers WindowsAzure\MediaServices\MediaServicesRestProxy::getJobStatus
     * @covers WindowsAzure\MediaServices\MediaServicesRestProxy::send
     */
    public function testGetJobStatus()
    {
        // Setup
        $asset = $this->createAssetWithFile();

        $taskBody = '<?xml version="1.0" encoding="utf-8"?><taskBody><inputAsset>JobInputAsset(0)</inputAsset><outputAsset assetCreationOptions="0" assetName="Output asset">JobOutputAsset(0)</outputAsset></taskBody>';
        $mediaProcessorId = 'nb:mpid:UUID:2e7aa8f3-4961-4e0c-b4db-0e0439e524f5';
        $task = new Task($taskBody, $mediaProcessorId, TaskOptions::NONE);
        $task->setConfiguration('H.264 HD 720p VBR');

        $job = new Job();
        $job->setName('TestJob' . $this->createSuffix());
        $job = $this->restProxy->createJob($job, array($asset), array($task));

        // Test
        $result = $this->restProxy->getJobStatus($job);

        // Assert
        $this->assertGreaterThanOrEqual(0, $result);
        $this->assertLessThanOrEqual(6, $result);
    }

    /**
     * @covers WindowsAzure\MediaServices\MediaServicesRestProxy::cancelJob
     * @covers WindowsAzure\MediaServices\MediaServicesRestProxy::send
     */
    public function testCancelJob()
    {
        // Setup
        $asset = $this->createAssetWithFile();

        $taskBody = '<?xml version="1.0" encoding="utf-8"?><taskBody><inputAsset>JobInputAsset(0)</inputAsset><outputAsset assetCreationOptions="0" assetName="Output asset">JobOutputAsset(0)</outputAsset></taskBody>';
        $mediaProcessorId = 'nb:mpid:UUID:2e7aa8f3-4961-4e0c-b4db-0e0439e524f5';
        $task = new Task($taskBody, $mediaProcessorId, TaskOptions::NONE);
        $task->setConfiguration('H.264 HD 720p VBR');

        $job = new Job();
        $job->setName('TestJob' . $this->createSuffix());
        $job = $this->restProxy->createJob($job, array($asset), array($task));

        // Test
        $result = $this->restProxy->cancelJob($job);

        // Assert
        $this->assertNull($result);
    }

    /**
     * @covers WindowsAzure\MediaServices\MediaServicesRestProxy::createJobTemplate
     * @covers WindowsAzure\MediaServices\MediaServicesRestProxy::send
     */
    public function testCreateJobTemplate()
    {
        // Setup
        $mediaProcessorId = 'nb:mpid:UUID:2e7aa8f3-4961-4e0c-b4db-0e0439e524f5';

        $taskTemplate = new TaskTemplate(1, 1);
        $taskTemplate->setMediaProcessorId($mediaProcessorId);
        $taskTemplate->setConfiguration('H.264 HD 720p VBR');

        $jobTemplateBody = '<?xml version="1.0" encoding="utf-8"?><jobTemplate><taskBody taskTemplateId="' . $taskTemplate->getId() . '"><inputAsset>JobInputAsset(0)</inputAsset><outputAsset assetCreationOptions="0" assetName="Output asset">JobOutputAsset(0)</outputAsset></taskBody></jobTemplate>';
        $jobTemplate = new JobTemplate($jobTemplateBody);
        $jobTemplate->setName('TestJobTemplate' . $this->createSuffix());

        // Test
        $result = $this->restProxy->createJobTemplate($jobTemplate, array($taskTemplate));

        // Assert
        $this->assertEquals($jobTemplate->getName(), $result->getName());
    }

    /**
     * @covers WindowsAzure\MediaServices\MediaServicesRestProxy::getMediaProcessors
     * @covers WindowsAzure\MediaServices\MediaServicesRestProxy::send
     */
    public function testGetMediaProcessors()
    {
        // Test
        $result = $this->restProxy->getMediaProcessors();

        // Assert
        $this->assertNotEmpty($result);
    }
}
