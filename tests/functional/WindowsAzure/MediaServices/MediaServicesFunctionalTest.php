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

namespace Tests\Unit\WindowsAzure\MediaServices;

use Tests\Framework\MediaServicesRestProxyTestBase;
use Tests\Framework\TestResources;
use WindowsAzure\Common\Internal\Resources;
use WindowsAzure\Common\Internal\Utilities;
use WindowsAzure\MediaServices\Models\Asset;
use WindowsAzure\MediaServices\Models\AccessPolicy;
use WindowsAzure\MediaServices\Models\Locator;
use WindowsAzure\MediaServices\Models\Job;
use WindowsAzure\MediaServices\Models\Task;
use WindowsAzure\MediaServices\Models\TaskOptions;
use WindowsAzure\MediaServices\Models\JobTemplate;
use WindowsAzure\MediaServices\Models\TaskTemplate;
use WindowsAzure\MediaServices\Models\IngestManifest;
use WindowsAzure\MediaServices\Models\IngestManifestAsset;
use WindowsAzure\MediaServices\Models\IngestManifestFile;
use WindowsAzure\MediaServices\Models\ProtectionKeyTypes;
use WindowsAzure\MediaServices\Models\ContentKey;
use WindowsAzure\MediaServices\Models\ContentKeyTypes;
use WindowsAzure\MediaServices\Models\EncryptionSchemes;
use WindowsAzure\Common\Internal\Http\Url;
use WindowsAzure\Common\Internal\Http\HttpClient;
use Tests\Framework\VirtualFileSystem;

/**
 * Unit tests for class MediaServicesRestProxy.
 *
 * @category  Microsoft
 *
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 *
 * @version   Release: 0.5.0_2016-11
 *
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
class MediaServicesFunctionalTest extends MediaServicesRestProxyTestBase
{
    /**
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::createAsset
     */
    public function testCreateEmptyAsset()
    {
        // Setup
        $assetName = TestResources::MEDIA_SERVICES_ASSET_NAME.$this->createSuffix();
        $assetOptions = Asset::OPTIONS_NONE;

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
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::createAsset
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::createAccessPolicy
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::createLocator
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::createFileInfos
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::getAssetFileList
     */
    public function testCreateAssetWithFiles()
    {
        // Setup
        $assetName = TestResources::MEDIA_SERVICES_ASSET_NAME.$this->createSuffix();
        $assetOptions = Asset::OPTIONS_NONE;

        $accessPolicyName = TestResources::MEDIA_SERVICES_ACCESS_POLICY_NAME.$this->createSuffix();
        $accessPolicyDuration = 30;
        $accessPolicyPermission = AccessPolicy::PERMISSIONS_WRITE;

        $locatorStartTime = new \DateTime('now -5 minutes');
        $locatorType = Locator::TYPE_SAS;

        $fileName = TestResources::MEDIA_SERVICES_DUMMY_FILE_NAME;
        $otherFileName = TestResources::MEDIA_SERVICES_DUMMY_FILE_NAME_1;

        // Test
        $asset = new Asset($assetOptions);
        $asset->setName($assetName);
        $asset = $this->createAsset($asset);

        $access = new AccessPolicy($accessPolicyName);
        $access->setDurationInMinutes($accessPolicyDuration);
        $access->setPermissions($accessPolicyPermission);
        $access = $this->createAccessPolicy($access);

        $locator = new Locator($asset,  $access, $locatorType);
        $locator->setStartTime($locatorStartTime);
        $locator = $this->createLocator($locator);

        $this->mediaServicesWrapper->uploadAssetFile($locator, $fileName, TestResources::MEDIA_SERVICES_DUMMY_FILE_CONTENT);
        $this->mediaServicesWrapper->uploadAssetFile($locator, $otherFileName, TestResources::MEDIA_SERVICES_DUMMY_FILE_CONTENT_1);

        $this->mediaServicesWrapper->createFileInfos($asset);
        $assetFiles = $this->mediaServicesWrapper->getAssetFileList();

        // Assert
        $this->assertEquals($assetName, $asset->getName());
        $this->assertEquals($assetOptions, $asset->getOptions());
        $this->assertNotNull($asset->getId());
        $this->assertNotNull($asset->getCreated());

        $this->assertEquals($accessPolicyName, $access->getName());
        $this->assertEquals($accessPolicyDuration, $access->getDurationInMinutes());
        $this->assertEquals($accessPolicyPermission, $access->getPermissions());
        $this->assertNotNull($asset->getId());
        $this->assertNotNull($asset->getCreated());

        $this->assertEquals($locatorType, $locator->getType());
        $this->assertEquals($locatorStartTime->getTimestamp(), $locator->getStartTime()->getTimestamp());
        $this->assertEquals($asset->getId(), $locator->getAssetId());
        $this->assertEquals($access->getId(), $locator->getAccessPolicyId());

        $this->assertEquals(2, count($assetFiles));

        // Files order is not static, so we don't know the index of each file and need to serve them as a set
        $resultFileNames = [
            $assetFiles[0]->getName(),
            $assetFiles[1]->getName(),
        ];
        $this->assertContains($otherFileName, $resultFileNames);
        $this->assertEquals($asset->getId(), $assetFiles[0]->getParentAssetId());
        $this->assertContains($fileName, $resultFileNames);
        $this->assertEquals($asset->getId(), $assetFiles[1]->getParentAssetId());
    }

    /**
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::createJob
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::getLatestMediaProcessor
     */
    public function testCreateJobWithTasks()
    {

        // Setup
        $mediaProcessor = $this->mediaServicesWrapper->getLatestMediaProcessor(
            TestResources::MEDIA_SERVICES_PROCESSOR_NAME
        );
        $inputAsset = $this->createAssetWithFile();

        $taskBody = TestResources::getMediaServicesTask($this->getOutputAssetName());
        $configuration = TestResources::MEDIA_SERVICES_TASK_CONFIGURATION;

        $name = TestResources::MEDIA_SERVICES_JOB_NAME.$this->createSuffix();

        // Test
        $task = new Task($taskBody, $mediaProcessor->getId(), TaskOptions::NONE);
        $task->setConfiguration($configuration);

        $job = new Job();
        $job->setName($name);

        $jobWithTasks = $this->createJob($job, [$inputAsset], [$task]);

        // Assert
        $this->assertEquals($taskBody, $task->getTaskBody());
        $this->assertEquals($configuration, $task->getConfiguration());
        $this->assertContains(TestResources::MEDIA_SERVICES_PROCESSOR_ID_PREFIX, $task->getMediaProcessorId());

        $this->assertEquals($name, $job->getName());

        $this->assertEquals($name, $jobWithTasks->getName());
        $this->assertContains(TestResources::MEDIA_SERVICES_JOB_ID_PREFIX, $jobWithTasks->getId());
        $this->assertNotNull($jobWithTasks->getCreated());
    }

    /**
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::getLatestMediaProcessor
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::createJobTemplate
     */
    public function testCreateJobTemplateWithTasks()
    {

        // Setup
        $mediaProcessor = $this->mediaServicesWrapper->getLatestMediaProcessor(TestResources::MEDIA_SERVICES_PROCESSOR_NAME);
        $inputAsset = $this->createAssetWithFile();

        $configuration = TestResources::MEDIA_SERVICES_TASK_CONFIGURATION;
        $name = TestResources::MEDIA_SERVICES_JOB_TEMPLATE_NAME.$this->createSuffix();

        $taskTemplate = new TaskTemplate(1, 1);
        $jobTemplateBody = TestResources::getMediaServicesJobTemplate($taskTemplate->getId(), $this->getOutputAssetName());

        // Test
        $taskTemplate->setMediaProcessorId($mediaProcessor->getId());
        $taskTemplate->setConfiguration($configuration);

        $jobTemplate = new JobTemplate($jobTemplateBody);
        $jobTemplate->setName($name);

        $jobTemplateWithTasks = $this->createJobTemplate($jobTemplate, [$taskTemplate]);

        // Assert
        $this->assertEquals($configuration, $taskTemplate->getConfiguration());
        $this->assertEquals($mediaProcessor->getId(), $taskTemplate->getMediaProcessorId());

        $this->assertEquals($jobTemplateBody, $jobTemplate->getJobTemplateBody());
        $this->assertEquals($name, $jobTemplate->getName());

        $this->assertEquals($name, $jobTemplateWithTasks->getName());
        $this->assertContains(TestResources::MEDIA_SERVICES_JOB_TEMPLATE_ID_PREFIX, $jobTemplateWithTasks->getId());
        $this->assertNotNull($jobTemplateWithTasks->getCreated());
    }

    /**
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::createJob
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::getLatestMediaProcessor
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::createJobTemplate
     */
    public function testCreateJobUsingTemplate()
    {

        // Setup
        $mediaProcessor = $this->mediaServicesWrapper->getLatestMediaProcessor(TestResources::MEDIA_SERVICES_PROCESSOR_NAME);
        $inputAsset = $this->createAssetWithFile();

        $configuration = TestResources::MEDIA_SERVICES_TASK_CONFIGURATION;
        $name = TestResources::MEDIA_SERVICES_JOB_NAME.$this->createSuffix();
        $nameTemplate = TestResources::MEDIA_SERVICES_JOB_TEMPLATE_NAME.$this->createSuffix();

        $taskTemplate = new TaskTemplate(1, 1);
        $jobTemplateBody = TestResources::getMediaServicesJobTemplate($taskTemplate->getId(), $this->getOutputAssetName());

        // Test
        $taskTemplate->setMediaProcessorId($mediaProcessor->getId());
        $taskTemplate->setConfiguration($configuration);

        $jobTemplate = new JobTemplate($jobTemplateBody);
        $jobTemplate->setName($nameTemplate);
        $jobTemplate = $this->createJobTemplate($jobTemplate, [$taskTemplate]);

        $jobTemplateWithTasks = new Job();
        $jobTemplateWithTasks->setName($name);
        $jobTemplateWithTasks->setTemplateId($jobTemplate->getId());
        $jobTemplateWithTasks = $this->createJob($jobTemplateWithTasks, [$inputAsset]);

        // Assert
        $this->assertEquals($jobTemplateBody, $jobTemplate->getJobTemplateBody());
        $this->assertEquals($nameTemplate, $jobTemplate->getName());

        $this->assertEquals($name, $jobTemplateWithTasks->getName());

        $this->assertEquals($name, $jobTemplateWithTasks->getName());
        $this->assertEquals($jobTemplate->getId(), $jobTemplateWithTasks->getTemplateId());
        $this->assertContains(TestResources::MEDIA_SERVICES_JOB_ID_PREFIX, $jobTemplateWithTasks->getId());
        $this->assertNotNull($jobTemplateWithTasks->getCreated());
    }

    /**
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::createJob
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::getLatestMediaProcessor
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::cancelJob
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::getJobStatus
     */
    public function testCancelJob()
    {

        // Setup
        $mediaProcessor = $this->mediaServicesWrapper->getLatestMediaProcessor(
            TestResources::MEDIA_SERVICES_PROCESSOR_NAME
        );
        $inputAsset = $this->createAssetWithFile();
        $expected = [
                Job::STATE_CANCELING,
                Job::STATE_CANCELED,
        ];

        $taskBody = TestResources::getMediaServicesTask($this->getOutputAssetName());
        $configuration = TestResources::MEDIA_SERVICES_TASK_CONFIGURATION;

        $name = TestResources::MEDIA_SERVICES_JOB_NAME.$this->createSuffix();

        $task = new Task($taskBody, $mediaProcessor->getId(), TaskOptions::NONE);
        $task->setConfiguration($configuration);

        $job = new Job();
        $job->setName($name);

        $jobWithTasks = $this->createJob($job, [$inputAsset], [$task]);

        // Test
        $canceledJobWithTasks = $this->mediaServicesWrapper->cancelJob($jobWithTasks);
        $status = $this->mediaServicesWrapper->getJobStatus($jobWithTasks);

        // Assert
        $this->assertEquals($taskBody, $task->getTaskBody());
        $this->assertEquals($configuration, $task->getConfiguration());
        $this->assertContains(TestResources::MEDIA_SERVICES_PROCESSOR_ID_PREFIX, $task->getMediaProcessorId());

        $this->assertEquals($name, $job->getName());

        $this->assertNull(null, $jobWithTasks);
        $this->assertContains($status, $expected);
    }

    /**
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::createJob
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::getLatestMediaProcessor
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::getJobStatus
     */
    public function testMonitorProcessing()
    {

        // Setup
        $mediaProcessor = $this->mediaServicesWrapper->getLatestMediaProcessor(
            TestResources::MEDIA_SERVICES_PROCESSOR_NAME
        );
        $inputAsset = $this->createAssetWithFile();

        $taskBody = TestResources::getMediaServicesTask($this->getOutputAssetName());
        $configuration = TestResources::MEDIA_SERVICES_TASK_CONFIGURATION;

        $name = TestResources::MEDIA_SERVICES_JOB_NAME.$this->createSuffix();

        $task = new Task($taskBody, $mediaProcessor->getId(), TaskOptions::NONE);
        $task->setConfiguration($configuration);

        $job = new Job();
        $job->setName($name);

        $jobWithTasks = $this->createJob($job, [$inputAsset], [$task]);

        // Test
        $jobStatus = $this->mediaServicesWrapper->getJobStatus($jobWithTasks);

        // Assert
        $this->assertEquals($taskBody, $task->getTaskBody());
        $this->assertEquals($configuration, $task->getConfiguration());
        $this->assertContains(TestResources::MEDIA_SERVICES_PROCESSOR_ID_PREFIX, $task->getMediaProcessorId());

        $this->assertEquals($name, $job->getName());

        $this->assertLessThanOrEqual(6, $jobStatus);
        $this->assertGreaterThanOrEqual(0, $jobStatus);
    }

    /**
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::createAsset
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::getAssetList
     */
    public function testGetAnAssetReference()
    {

        // Setup
        $assetName = TestResources::MEDIA_SERVICES_ASSET_NAME.$this->createSuffix();
        $asset = new Asset(Asset::OPTIONS_NONE);
        $asset->setName($assetName);
        $asset = $this->createAsset($asset);

        // Test
        $result = $this->mediaServicesWrapper->getAsset($asset);

        // Assert
        $this->assertEquals($asset->getId(), $result->getId());
        $this->assertEquals($asset->getName(), $result->getName());
    }

    /**
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::createJob
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::getJobList
     */
    public function testGetJobReference()
    {
        // Setup
        $name = TestResources::MEDIA_SERVICES_JOB_NAME.$this->createSuffix();

        // Test
        $job = $this->createJobWithTasks($name);
        $result = $this->mediaServicesWrapper->getJob($job);

        $inputAssets = $this->mediaServicesWrapper->getJobInputMediaAssets($job);
        $outputAssets = $this->mediaServicesWrapper->getJobOutputMediaAssets($job);

        $tasks = $this->mediaServicesWrapper->getJobTasks($job);

        // Assert
        $this->assertCount(1, $inputAssets);
        $this->assertCount(1, $outputAssets);
        $this->assertCount(1, $tasks);
        $this->assertEquals($name, $result->getName());
        $this->assertContains($job->getId(), $result->getId());
    }

    /**
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::createAsset
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::getAssetList
     */
    public function testListAllAssets()
    {

        // Setup
        $asset1 = new Asset(Asset::OPTIONS_NONE);
        $asset1->setName(TestResources::MEDIA_SERVICES_ASSET_NAME.$this->createSuffix());

        $asset2 = new Asset(Asset::OPTIONS_NONE);
        $asset2->setName(TestResources::MEDIA_SERVICES_ASSET_NAME.$this->createSuffix());

        // Test
        $asset1 = $this->createAsset($asset1);
        $asset2 = $this->createAsset($asset2);

        $queryParams = ['$top' => 1, '$skip' => 1];
        $result = $this->mediaServicesWrapper->getAssetList($queryParams);

        // Assert
        $this->assertCount(1, $result);
        $result = $this->mediaServicesWrapper->getAssetList();
        $this->assertCount(2, $result);
        $names = [
            $result[0]->getName(),
            $result[1]->getName(),
        ];
        $id = [
                $result[0]->getId(),
                $result[1]->getId(),
        ];
        $this->assertContains($asset1->getName(), $names);
        $this->assertContains($asset2->getName(), $names);

        $this->assertContains($asset1->getId(), $id);
        $this->assertContains($asset2->getId(), $id);
    }

    /**
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::createAsset
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::createJob
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::getJobList
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::getJobInputMediaAssets
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::getJobOutputMediaAssets
     */
    public function testListAllJobsAndAssets()
    {
        $asset1 = $this->createAssetWithFile();
        $outputAssetName1 = $this->getOutputAssetName();

        $asset2 = $this->createAssetWithFile();
        $outputAssetName2 = $this->getOutputAssetName();

        $taskBody1 = '<?xml version="1.0" encoding="utf-8"?><taskBody><inputAsset>JobInputAsset(0)</inputAsset><outputAsset assetCreationOptions="0" assetName="'.$outputAssetName1.'">JobOutputAsset(0)</outputAsset></taskBody>';
        $mediaProcessorId = 'nb:mpid:UUID:ff4df607-d419-42f0-bc17-a481b1331e56';
        $task1 = new Task($taskBody1, $mediaProcessorId, TaskOptions::NONE);
        $task1->setConfiguration('H.264 HD 720p VBR');

        $taskBody2 = '<?xml version="1.0" encoding="utf-8"?><taskBody><inputAsset>JobInputAsset(0)</inputAsset><outputAsset assetCreationOptions="0" assetName="'.$outputAssetName2.'">JobOutputAsset(0)</outputAsset></taskBody>';
        $task2 = new Task($taskBody2, $mediaProcessorId, TaskOptions::NONE);
        $task2->setConfiguration('H.264 HD 720p VBR');

        $job1 = new Job();
        $job1->setName(TestResources::MEDIA_SERVICES_JOB_NAME.$this->createSuffix());
        $jobResult1 = $this->createJob($job1, [$asset1], [$task1]);

        $job2 = new Job();
        $job2->setName(TestResources::MEDIA_SERVICES_JOB_NAME.$this->createSuffix());
        $jobResult2 = $this->createJob($job2, [$asset2], [$task2]);

        // Test
        $jobList = $this->mediaServicesWrapper->getJobList();

        $resultInput1 = $this->mediaServicesWrapper->getJobInputMediaAssets($jobList[0]);
        $resultOutput1 = $this->mediaServicesWrapper->getJobOutputMediaAssets($jobList[0]);

        $resultInput2 = $this->mediaServicesWrapper->getJobInputMediaAssets($jobList[1]);
        $resultOutput2 = $this->mediaServicesWrapper->getJobOutputMediaAssets($jobList[1]);

        // Assert
        $this->assertEquals(2, count($resultInput1) + count($resultInput2));
        $this->assertEquals(2, count($resultOutput1) + count($resultOutput2));
        $this->assertEquals(2, count($jobList));

        $this->assertEquals($asset1->getId(), $resultInput2[0]->getId());
        $this->assertEquals($asset1->getName(), $resultInput2[0]->getName());

        $this->assertNotEquals($asset1->getId(), $resultOutput2[0]->getId());
        $this->assertEquals($outputAssetName1, $resultOutput2[0]->getName());

        $this->assertEquals($asset2->getId(), $resultInput1[0]->getId());
        $this->assertEquals($asset2->getName(), $resultInput1[0]->getName());

        $this->assertNotEquals($asset2->getId(), $resultOutput1[0]->getId());
        $this->assertEquals($outputAssetName2, $resultOutput1[0]->getName());
    }

    /**
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::createAccessPolicy
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::getAccessPolicyList
     */
    public function testListAllAccessPolicy()
    {

        // Setup
        $accessName1 = TestResources::MEDIA_SERVICES_ACCESS_POLICY_NAME.$this->createSuffix();

        $access1 = new AccessPolicy($accessName1);
        $access1->setDurationInMinutes(30);
        $access1->setPermissions(AccessPolicy::PERMISSIONS_WRITE);

        $accessName2 = TestResources::MEDIA_SERVICES_ACCESS_POLICY_NAME.$this->createSuffix();

        $access2 = new AccessPolicy($accessName2);
        $access2->setDurationInMinutes(30);
        $access2->setPermissions(AccessPolicy::PERMISSIONS_WRITE);

        // Test
        $access1 = $this->createAccessPolicy($access1);
        $access2 = $this->createAccessPolicy($access2);
        $result = $this->mediaServicesWrapper->getAccessPolicyList();

        // Assert
        $this->assertGreaterThanOrEqual(2, count($result));
        $names = [
                $result[0]->getName(),
                $result[1]->getName(),
        ];
        $id = [
                $result[0]->getId(),
                $result[1]->getId(),
        ];
        $this->assertContains($accessName1, $names);
        $this->assertContains($accessName2, $names);

        $this->assertContains($access1->getId(), $id);
        $this->assertContains($access2->getId(), $id);
    }

    /**
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::createAccessPolicy
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::createAsset
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::createLocator
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::getLocatorList
     */
    public function testListAllLocators()
    {

        // Setup
        $asset1 = new Asset(Asset::OPTIONS_NONE);
        $asset1->setName(TestResources::MEDIA_SERVICES_ASSET_NAME.$this->createSuffix());
        $asset1 = $this->createAsset($asset1);

        $access1 = new AccessPolicy('Name');
        $access1->setName(TestResources::MEDIA_SERVICES_ACCESS_POLICY_NAME.$this->createSuffix());
        $access1->setDurationInMinutes(30);
        $access1->setPermissions(AccessPolicy::PERMISSIONS_READ + AccessPolicy::PERMISSIONS_WRITE + AccessPolicy::PERMISSIONS_DELETE + AccessPolicy::PERMISSIONS_LIST);
        $access1 = $this->createAccessPolicy($access1);

        $locator1 = new Locator($asset1, $access1, Locator::TYPE_SAS);
        $locator1->setName(TestResources::MEDIA_SERVICES_LOCATOR_NAME.$this->createSuffix());

        $asset2 = new Asset(Asset::OPTIONS_NONE);
        $asset2->setName(TestResources::MEDIA_SERVICES_ASSET_NAME.$this->createSuffix());
        $asset2 = $this->createAsset($asset2);

        $access2 = new AccessPolicy('Name');
        $access2->setName(TestResources::MEDIA_SERVICES_ACCESS_POLICY_NAME.$this->createSuffix());
        $access2->setDurationInMinutes(30);
        $access2->setPermissions(AccessPolicy::PERMISSIONS_READ + AccessPolicy::PERMISSIONS_WRITE + AccessPolicy::PERMISSIONS_DELETE + AccessPolicy::PERMISSIONS_LIST);
        $access2 = $this->createAccessPolicy($access2);

        $locator2 = new Locator($asset2, $access2, Locator::TYPE_SAS);
        $locator2->setName(TestResources::MEDIA_SERVICES_LOCATOR_NAME.$this->createSuffix());

        // Test
        $locator1 = $this->createLocator($locator1);
        $locator2 = $this->createLocator($locator2);
        $result = $this->mediaServicesWrapper->getLocatorList();

        // Assert
        $assetId = [
                $result[0]->getAssetId(),
                $result[1]->getAssetId(),
        ];
        $accessId = [
                $result[0]->getAccessPolicyId(),
                $result[1]->getAccessPolicyId(),
        ];
        $locatorId = [
                $result[0]->getId(),
                $result[1]->getId(),
        ];
        $locatorNames = [
                $result[0]->getName(),
                $result[1]->getName(),
        ];
        $this->assertContains($asset1->getId(), $assetId);
        $this->assertContains($access1->getId(), $accessId);
        $this->assertContains($locator1->getId(), $locatorId);

        $this->assertContains($asset2->getId(), $assetId);
        $this->assertContains($access2->getId(), $accessId);
        $this->assertContains($locator2->getId(), $locatorId);

        $this->assertCount(2, $result);
        $this->assertContains($locator1->getName(), $locatorNames);
        $this->assertContains($locator2->getName(), $locatorNames);
    }

    /**
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::createAsset
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::getAssetList
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::deleteAsset
     */
    public function testDeleteAsset()
    {

        // Setup
        $asset1 = new Asset(Asset::OPTIONS_NONE);
        $asset1->setName(TestResources::MEDIA_SERVICES_ASSET_NAME.$this->createSuffix());

        $asset2 = new Asset(Asset::OPTIONS_NONE);
        $asset2->setName(TestResources::MEDIA_SERVICES_ASSET_NAME.$this->createSuffix());

        // Test
        $asset1 = $this->mediaServicesWrapper->createAsset($asset1);
        $asset2 = $this->mediaServicesWrapper->createAsset($asset2);

        $result = $this->mediaServicesWrapper->getAssetList();

        $before = count($result);
        foreach ($result as $res) {
            $this->mediaServicesWrapper->deleteAsset($res);
        }

        $after = count($this->mediaServicesWrapper->getAssetList());

        // Assert
        $this->assertEquals(2, $before);
        $this->assertEquals(0, $after);
    }

    /**
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::createJob
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::getJobList
     */
    public function testDeleteJob()
    {

        // Setup
        $name1 = TestResources::MEDIA_SERVICES_JOB_NAME.$this->createSuffix();
        $name2 = TestResources::MEDIA_SERVICES_JOB_NAME.$this->createSuffix();
        $job1 = $this->createJobWithTasks($name1);
        $job2 = $this->createJobWithTasks($name2);

        // Test
        $result = $this->mediaServicesWrapper->getJobList();

        $before = count($result);
        foreach ($result as $job) {
            $this->deleteJob($job);
        }
        $after = count($this->mediaServicesWrapper->getJobList());

        // Assert
        $this->assertEquals(2, $before);
        $this->assertEquals(0, $after);
    }

    /**
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::createAccessPolicy
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::getAccessPolicyList
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::deleteAccessPolicy
     */
    public function testDeleteAccessPolicy()
    {

        // Setup
        $name = TestResources::MEDIA_SERVICES_ASSET_NAME.$this->createSuffix();
        $access1 = new AccessPolicy($name);
        $access1->setName(TestResources::MEDIA_SERVICES_ACCESS_POLICY_NAME.$this->createSuffix());
        $access1->setDurationInMinutes(30);

        $name = TestResources::MEDIA_SERVICES_ASSET_NAME.$this->createSuffix();
        $access2 = new AccessPolicy($name);
        $access2->setName(TestResources::MEDIA_SERVICES_ACCESS_POLICY_NAME.$this->createSuffix());
        $access2->setDurationInMinutes(30);

        // Test
        $access1 = $this->mediaServicesWrapper->createAccessPolicy($access1);
        $access2 = $this->mediaServicesWrapper->createAccessPolicy($access2);

        $result = $this->mediaServicesWrapper->getAccessPolicyList();

        $before = count($result);
        foreach ($result as $res) {
            $this->mediaServicesWrapper->deleteAccessPolicy($res);
        }
        $after = count($this->mediaServicesWrapper->getAccessPolicyList());

        // Assert
        $this->assertGreaterThanOrEqual(2, $before);
        $this->assertEquals(0, $after);
    }

    /**
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::createAsset
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::createAccessPolicy
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::createLocator
     */
    public function testCreatingSASUrlForDownloadingContent()
    {

        // Setup
        $asset = $this->createAssetWithFile();

        $accessPolicy = new AccessPolicy(TestResources::MEDIA_SERVICES_ACCESS_POLICY_NAME.$this->createSuffix());
        $accessPolicy->setDurationInMinutes(300);
        $accessPolicy->setPermissions(AccessPolicy::PERMISSIONS_READ);
        $accessPolicy = $this->createAccessPolicy($accessPolicy);

        $locator = new Locator($asset, $accessPolicy, Locator::TYPE_SAS);
        $locator->setName(TestResources::MEDIA_SERVICES_LOCATOR_NAME.$this->createSuffix());
        $locator->setStartTime(new \DateTime('now -5 minutes'));
        $locator = $this->createLocator($locator);

        // without sleep() Locator hasn't enough time to create URL, so that's why we have to use at least sleep(30)
        sleep(40);

        // Test
        $method = Resources::HTTP_GET;
        $url = new Url($locator->getBaseUri().'/'.TestResources::MEDIA_SERVICES_DUMMY_FILE_NAME.$locator->getContentAccessComponent());
        $filters = [];
        $statusCode = Resources::STATUS_OK;

        $httpClient = new HttpClient();
        $httpClient->setMethod($method);
        $httpClient->setExpectedStatusCode($statusCode);
        $result = $httpClient->send($filters, $url);

        // Assert
        $this->assertEquals(TestResources::MEDIA_SERVICES_DUMMY_FILE_CONTENT, $result);
    }

    /**
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::createAsset
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::createAccessPolicy
     * @covers \WindowsAzure\MediaServices\MediaServicesRestProxy::createLocator
     */
    public function testCreatingOriginUrlForStreamingContent()
    {

        // Setup
        $asset = $this->createAssetWithFilesForStream();

        $accessPolicy = new AccessPolicy(TestResources::MEDIA_SERVICES_ACCESS_POLICY_NAME.$this->createSuffix());
        $accessPolicy->setDurationInMinutes(300);
        $accessPolicy->setPermissions(AccessPolicy::PERMISSIONS_READ);
        $accessPolicy = $this->createAccessPolicy($accessPolicy);

        $locator = new Locator($asset, $accessPolicy, Locator::TYPE_ON_DEMAND_ORIGIN);
        $locator->setName(TestResources::MEDIA_SERVICES_LOCATOR_NAME.$this->createSuffix());
        $locator->setStartTime(new \DateTime('now -5 minutes'));
        $locator = $this->createLocator($locator);

        $expectedFileContent = TestResources::getSmallIsmc();

        // without sleep() Locator hasn't enough time to create URL, so that's why we have to use at least sleep(30)
        sleep(40);

        // Test
        $method = Resources::HTTP_GET;
        $url = new Url($locator->getPath().'/'.TestResources::MEDIA_SERVICES_ISM_FILE_NAME.'/'.TestResources::MEDIA_SERVICES_STREAM_APPEND);
        $filters = [];
        $statusCode = Resources::STATUS_OK;

        $httpClient = new HttpClient();
        $httpClient->setMethod($method);
        $httpClient->setExpectedStatusCode($statusCode);
        $result = $httpClient->send($filters, $url);

        // Assert
        $this->assertEquals($expectedFileContent, $result);
    }

    public function testBulkIngest()
    {

        // Setup
        $asset = new Asset(Asset::OPTIONS_NONE);
        $asset->setName(TestResources::MEDIA_SERVICES_ASSET_NAME.$this->createSuffix());
        $asset = $this->createAsset($asset);

        $fileName = TestResources::MEDIA_SERVICES_DUMMY_FILE_NAME;
        $otherFileName = TestResources::MEDIA_SERVICES_DUMMY_FILE_NAME_1;

        // Test
        $manifest = new IngestManifest();
        $manifest->setName('IngestManifest'.$this->createSuffix());
        $manifest = $this->createIngestManifest($manifest);

        $manifestAsset = new IngestManifestAsset($manifest->getId());
        $manifestAsset = $this->createIngestManifestAsset($manifestAsset, $asset);

        $manifestFile1 = new IngestManifestFile(
            $fileName,
            $manifest->getId(),
            $manifestAsset->getId()
        );
        $manifestFile1 = $this->createIngestManifestFile($manifestFile1);

        $manifestFile2 = new IngestManifestFile(
            $otherFileName,
            $manifest->getId(),
            $manifestAsset->getId()
        );
        $manifestFile2 = $this->createIngestManifestFile($manifestFile2);

        $initialStat = $this->mediaServicesWrapper->getIngestManifest($manifest);

        $blobUrl = $manifest->getBlobStorageUriForUpload();
        $blobUrlParts = explode('/', $blobUrl);
        $container = array_pop($blobUrlParts);

        $blobRestProxy = $this->builder->createBlobService(TestResources::getMediaStorageServicesConnectionString());
        $blobRestProxy->createBlockBlob(
            $container,
            $fileName,
            TestResources::MEDIA_SERVICES_DUMMY_FILE_CONTENT
        );

        $this->waitIngestManifestFinishedFiles($manifest, 1);
        $finishedFirstStat = $this->mediaServicesWrapper->getIngestManifest($manifest);

        $blobRestProxy->createBlockBlob(
            $container,
            $otherFileName,
            TestResources::MEDIA_SERVICES_DUMMY_FILE_CONTENT_1
        );

        $this->waitIngestManifestFinishedFiles($manifest, 2);
        $finishedSecondStat = $this->mediaServicesWrapper->getIngestManifest($manifest);

        // Assert
        $this->assertEquals(0, $initialStat->getStatistics()->getFinishedFilesCount());
        $this->assertEquals(1, $finishedFirstStat->getStatistics()->getFinishedFilesCount());
        $this->assertEquals(2, $finishedSecondStat->getStatistics()->getFinishedFilesCount());

        $assetFiles = $this->mediaServicesWrapper->getAssetAssetFileList($asset);

        // Files order is not static, so we don't know the index of each file and need to serve them as a set
        $resultFileNames = [
            $assetFiles[0]->getName(),
            $assetFiles[1]->getName(),
        ];
        $this->assertContains($otherFileName, $resultFileNames);
        $this->assertEquals($asset->getId(), $assetFiles[0]->getParentAssetId());
        $this->assertContains($fileName, $resultFileNames);
        $this->assertEquals($asset->getId(), $assetFiles[1]->getParentAssetId());
    }

    public function testIngestEncryptedAsset()
    {
        // Setup
        $aesKey = Utilities::generateCryptoKey(32);

        $protectionKeyId = $this->mediaServicesWrapper->getProtectionKeyId(
            ProtectionKeyTypes::X509_CERTIFICATE_THUMBPRINT
        );
        $protectionKey = $this->mediaServicesWrapper->getProtectionKey(
            $protectionKeyId
        );

        $contentKey = new ContentKey();
        $contentKey->setContentKey($aesKey, $protectionKey);
        $contentKey->setProtectionKeyId($protectionKeyId);
        $contentKey->setProtectionKeyType(ProtectionKeyTypes::X509_CERTIFICATE_THUMBPRINT);
        $contentKey->setContentKeyType(ContentKeyTypes::STORAGE_ENCRYPTION);
        $contentKey = $this->createContentKey($contentKey);

        $asset = new Asset(Asset::OPTIONS_STORAGE_ENCRYPTED);
        $asset->setName(TestResources::MEDIA_SERVICES_ASSET_NAME.$this->createSuffix());
        $asset = $this->createAsset($asset);

        $this->mediaServicesWrapper->linkContentKeyToAsset($asset, $contentKey);
        $initializationVector = base64_encode(Utilities::generateCryptoKey(8));

        // Test
        $this->uploadFileToAsset($asset);

        $files = $this->mediaServicesWrapper->getAssetAssetFileList($asset);
        $files[0]->setIsEncrypted(true);
        $files[0]->setEncryptionKeyId($contentKey->getId());
        $files[0]->setEncryptionScheme(EncryptionSchemes::STORAGE_ENCRYPTION);
        $files[0]->setEncryptionVersion(Resources::MEDIA_SERVICES_ENCRYPTION_VERSION);
        $files[0]->setInitializationVector($initializationVector);
        $this->mediaServicesWrapper->updateAssetFile($files[0]);

        // Assert
        $files = $this->mediaServicesWrapper->getAssetAssetFileList($asset);
        $contentKeyFromAsset = $this->mediaServicesWrapper->getAssetContentKeys($asset);

        $this->assertEquals($initializationVector, $files[0]->getInitializationVector());
        $this->assertEquals(Resources::MEDIA_SERVICES_ENCRYPTION_VERSION, $files[0]->getEncryptionVersion());
        $this->assertEquals($contentKey->getProtectionKeyId(), $contentKeyFromAsset[0]->getProtectionKeyId());
        $this->assertEquals($contentKey->getId(), $contentKeyFromAsset[0]->getId());
    }

    public function testIngestEncryptedAssetAndDecryptAtAzure()
    {
        // Setup
        $content = TestResources::MEDIA_SERVICES_DUMMY_FILE_CONTENT;

        $aesKey = Utilities::generateCryptoKey(32);
        $protectionKeyId = $this->mediaServicesWrapper->getProtectionKeyId(ProtectionKeyTypes::X509_CERTIFICATE_THUMBPRINT);
        $protectionKey = $this->mediaServicesWrapper->getProtectionKey($protectionKeyId);

        $contentKey = new ContentKey();
        $contentKey->setContentKey($aesKey, $protectionKey);
        $contentKey->setProtectionKeyId($protectionKeyId);
        $contentKey->setProtectionKeyType(ProtectionKeyTypes::X509_CERTIFICATE_THUMBPRINT);
        $contentKey->setContentKeyType(ContentKeyTypes::STORAGE_ENCRYPTION);
        $contentKey = $this->createContentKey($contentKey);

        $asset = new Asset(Asset::OPTIONS_STORAGE_ENCRYPTED);
        $asset->setName(TestResources::MEDIA_SERVICES_ASSET_NAME.$this->createSuffix());
        $asset = $this->createAsset($asset);

        $this->mediaServicesWrapper->linkContentKeyToAsset($asset, $contentKey);

        $initializationVector = Utilities::generateCryptoKey(8);
        $encrypted = Utilities::ctrCrypt($content, $aesKey, str_pad($initializationVector, 16, chr(0)));

        // Test
        $access = new AccessPolicy(TestResources::MEDIA_SERVICES_ACCESS_POLICY_NAME.$this->createSuffix());
        $access->setDurationInMinutes(30);
        $access->setPermissions(AccessPolicy::PERMISSIONS_WRITE);
        $access = $this->createAccessPolicy($access);

        $locator = new Locator($asset, $access, Locator::TYPE_SAS);
        $locator->setName(TestResources::MEDIA_SERVICES_LOCATOR_NAME.$this->createSuffix());
        $locator->setStartTime(new \DateTime('now -5 minutes'));
        $locator = $this->createLocator($locator);

        $fileName = TestResources::MEDIA_SERVICES_DUMMY_FILE_NAME;
        $this->mediaServicesWrapper->uploadAssetFile($locator, $fileName, $encrypted);
        $this->mediaServicesWrapper->createFileInfos($asset);

        $files = $this->mediaServicesWrapper->getAssetAssetFileList($asset);
        $files[0]->setIsEncrypted(true);
        $files[0]->setEncryptionKeyId($contentKey->getId());
        $files[0]->setEncryptionScheme(EncryptionSchemes::STORAGE_ENCRYPTION);
        $files[0]->setEncryptionVersion(Resources::MEDIA_SERVICES_ENCRYPTION_VERSION);
        $files[0]->setInitializationVector(Utilities::base256ToDec($initializationVector));
        $this->mediaServicesWrapper->updateAssetFile($files[0]);

        $decodeProcessor = $this->mediaServicesWrapper->getLatestMediaProcessor(
            TestResources::MEDIA_SERVICES_DECODE_PROCESSOR_NAME
        );
        $task = new Task(TestResources::getMediaServicesTask($this->getOutputAssetName()), $decodeProcessor->getId(), TaskOptions::NONE);
        $job = new Job();
        $job->setName(TestResources::MEDIA_SERVICES_JOB_NAME.$this->createSuffix());
        $job = $this->createJob($job, [$asset], [$task]);

        $this->waitJobStatus($job, [Job::STATE_FINISHED, Job::STATE_ERROR]);

        $this->assertEquals($this->mediaServicesWrapper->getJobStatus($job), Job::STATE_FINISHED);

        $outputAssets = $this->mediaServicesWrapper->getJobOutputMediaAssets($job);
        $this->assertCount(1, $outputAssets);

        $accessPolicy = new AccessPolicy(TestResources::MEDIA_SERVICES_ACCESS_POLICY_NAME.$this->createSuffix());
        $accessPolicy->setDurationInMinutes(300);
        $accessPolicy->setPermissions(AccessPolicy::PERMISSIONS_READ);
        $accessPolicy = $this->createAccessPolicy($accessPolicy);

        $locator = new Locator($outputAssets[0], $accessPolicy, Locator::TYPE_SAS);
        $locator->setName(TestResources::MEDIA_SERVICES_LOCATOR_NAME.$this->createSuffix());
        $locator->setStartTime(new \DateTime('now -5 minutes'));
        $locator = $this->createLocator($locator);

        // without sleep() Locator hasn't enough time to create URL, so that's why we have to use at least sleep(30)
        sleep(40);

        $method = Resources::HTTP_GET;
        $url = new Url($locator->getBaseUri().'/'.TestResources::MEDIA_SERVICES_DUMMY_FILE_NAME.$locator->getContentAccessComponent());
        $filters = [];
        $statusCode = Resources::STATUS_OK;

        $httpClient = new HttpClient();
        $httpClient->setMethod($method);
        $httpClient->setExpectedStatusCode($statusCode);
        $actual = $httpClient->send($filters, $url);

        $this->assertEquals($content, $actual);
    }

    public function testBulkIngestEncryptedAsset()
    {

        // Setup
        $asset = new Asset(Asset::OPTIONS_STORAGE_ENCRYPTED);
        $asset->setName(TestResources::MEDIA_SERVICES_ASSET_NAME.$this->createSuffix());
        $asset = $this->createAsset($asset);

        $aesKey = Utilities::generateCryptoKey(32);
        $protectionKeyId = $this->mediaServicesWrapper->getProtectionKeyId(
            ProtectionKeyTypes::X509_CERTIFICATE_THUMBPRINT
        );
        $protectionKey = $this->mediaServicesWrapper->getProtectionKey($protectionKeyId);

        $contentKey = new ContentKey();
        $contentKey->setContentKey($aesKey, $protectionKey);
        $contentKey->setProtectionKeyId($protectionKeyId);
        $contentKey->setProtectionKeyType(ProtectionKeyTypes::X509_CERTIFICATE_THUMBPRINT);
        $contentKey->setContentKeyType(ContentKeyTypes::STORAGE_ENCRYPTION);
        $contentKey = $this->createContentKey($contentKey);
        $this->mediaServicesWrapper->linkContentKeyToAsset($asset, $contentKey);

        $fileName = TestResources::MEDIA_SERVICES_DUMMY_FILE_NAME;
        $otherFileName = TestResources::MEDIA_SERVICES_DUMMY_FILE_NAME_1;

        $manifest = new IngestManifest();
        $manifest->setName('IngestManifest'.$this->createSuffix());
        $manifest = $this->createIngestManifest($manifest);

        $manifestAsset = new IngestManifestAsset($manifest->getId());
        $manifestAsset = $this->createIngestManifestAsset($manifestAsset, $asset);

        $manifestFile1 = new IngestManifestFile(
                $fileName,
                $manifest->getId(),
                $manifestAsset->getId()
        );

        $manifestFile2 = new IngestManifestFile(
                $otherFileName,
                $manifest->getId(),
                $manifestAsset->getId()
        );

        $initializationVector1 = base64_encode(Utilities::generateCryptoKey(8));
        $initializationVector2 = base64_encode(Utilities::generateCryptoKey(8));

        $manifestFile1->setIsEncrypted(true);
        $manifestFile1->setEncryptionKeyId($contentKey->getId());
        $manifestFile1->setEncryptionScheme(EncryptionSchemes::STORAGE_ENCRYPTION);
        $manifestFile1->setEncryptionVersion(Resources::MEDIA_SERVICES_ENCRYPTION_VERSION);
        $manifestFile1->setInitializationVector($initializationVector1);

        $manifestFile2->setIsEncrypted(true);
        $manifestFile2->setEncryptionKeyId($contentKey->getId());
        $manifestFile2->setEncryptionScheme(EncryptionSchemes::STORAGE_ENCRYPTION);
        $manifestFile2->setEncryptionVersion(Resources::MEDIA_SERVICES_ENCRYPTION_VERSION);
        $manifestFile2->setInitializationVector($initializationVector2);

        $manifestFile1 = $this->createIngestManifestFile($manifestFile1);
        $manifestFile2 = $this->createIngestManifestFile($manifestFile2);

        $initialStat = $this->mediaServicesWrapper->getIngestManifest($manifest);

        $blobUrl = $manifest->getBlobStorageUriForUpload();
        $blobUrlParts = explode('/', $blobUrl);
        $container = array_pop($blobUrlParts);

        $blobRestProxy = $this->builder->createBlobService(TestResources::getMediaStorageServicesConnectionString());
        $blobRestProxy->createBlockBlob(
                $container,
                $fileName,
                TestResources::MEDIA_SERVICES_DUMMY_FILE_CONTENT
        );

        $this->waitIngestManifestFinishedFiles($manifest, 1);
        $finishedFirstStat = $this->mediaServicesWrapper->getIngestManifest($manifest);

        $blobRestProxy->createBlockBlob(
                $container,
                $otherFileName,
                TestResources::MEDIA_SERVICES_DUMMY_FILE_CONTENT_1
        );

        $this->waitIngestManifestFinishedFiles($manifest, 2);
        $finishedSecondStat = $this->mediaServicesWrapper->getIngestManifest($manifest);

        // Test

        // Assert
        $contentKeysFromAsset = $this->mediaServicesWrapper->getAssetContentKeys($asset);
        $assetFiles = $this->mediaServicesWrapper->getAssetAssetFileList($asset);

        $this->assertEquals(0, $initialStat->getStatistics()->getFinishedFilesCount());
        $this->assertEquals(1, $finishedFirstStat->getStatistics()->getFinishedFilesCount());
        $this->assertEquals(2, $finishedSecondStat->getStatistics()->getFinishedFilesCount());

        $this->assertEquals($contentKey->getId(), $contentKeysFromAsset[0]->getId());

        $this->assertEquals($contentKey->getId(), $manifestFile1->getEncryptionKeyId());
        $this->assertEquals('true', $manifestFile1->getIsEncrypted());
        $this->assertEquals(EncryptionSchemes::STORAGE_ENCRYPTION, $manifestFile1->getEncryptionScheme());
        $this->assertEquals($initializationVector1, $manifestFile1->getInitializationVector());
        $this->assertEquals(Resources::MEDIA_SERVICES_ENCRYPTION_VERSION, $manifestFile1->getEncryptionVersion());

        $this->assertEquals($contentKey->getId(), $manifestFile2->getEncryptionKeyId());
        $this->assertEquals('true', $manifestFile2->getIsEncrypted());
        $this->assertEquals(EncryptionSchemes::STORAGE_ENCRYPTION, $manifestFile2->getEncryptionScheme());
        $this->assertEquals($initializationVector2, $manifestFile2->getInitializationVector());
        $this->assertEquals(Resources::MEDIA_SERVICES_ENCRYPTION_VERSION, $manifestFile2->getEncryptionVersion());

        // Files order is not static, so we don't know the index of each file and need to serve them as a set
        $resultFileNames = [
                $assetFiles[0]->getName(),
                $assetFiles[1]->getName(),
        ];
        $this->assertContains($otherFileName, $resultFileNames);
        $this->assertEquals($asset->getId(), $assetFiles[0]->getParentAssetId());
        $this->assertContains($fileName, $resultFileNames);
        $this->assertEquals($asset->getId(), $assetFiles[1]->getParentAssetId());
    }

    public function testUploadSmallFileFromContent()
    {
        // Setup
        $assetName = TestResources::MEDIA_SERVICES_ASSET_NAME.$this->createSuffix();
        $assetOptions = Asset::OPTIONS_NONE;

        $accessPolicyName = TestResources::MEDIA_SERVICES_ACCESS_POLICY_NAME.$this->createSuffix();
        $accessPolicyNameRead = TestResources::MEDIA_SERVICES_ACCESS_POLICY_NAME.$this->createSuffix();

        $accessPolicyDuration = 30;
        $accessPolicyDurationRead = 300;

        $accessPolicyPermission = AccessPolicy::PERMISSIONS_WRITE;
        $accessPolicyPermissionRead = AccessPolicy::PERMISSIONS_READ;

        $locatorStartTime = new \DateTime('now -5 minutes');
        $locatorType = Locator::TYPE_SAS;
        $locatorStartTimeRead = new \DateTime('now -5 minutes');
        $locatorTypeRead = Locator::TYPE_SAS;

        $fileName = TestResources::MEDIA_SERVICES_DUMMY_FILE_NAME;
        $fileContent = TestResources::MEDIA_SERVICES_DUMMY_FILE_CONTENT;

        // Test
        $asset = new Asset($assetOptions);
        $asset->setName($assetName);
        $asset = $this->createAsset($asset);

        $access = new AccessPolicy($accessPolicyName);
        $access->setDurationInMinutes($accessPolicyDuration);
        $access->setPermissions($accessPolicyPermission);
        $access = $this->createAccessPolicy($access);

        $locator = new Locator($asset,  $access, $locatorType);
        $locator->setStartTime($locatorStartTime);
        $locator = $this->createLocator($locator);

        $this->mediaServicesWrapper->uploadAssetFile($locator, $fileName, $fileContent);

        $this->mediaServicesWrapper->createFileInfos($asset);
        $assetFiles = $this->mediaServicesWrapper->getAssetFileList();

        $accessRead = new AccessPolicy($accessPolicyNameRead);
        $accessRead->setDurationInMinutes($accessPolicyDurationRead);
        $accessRead->setPermissions($accessPolicyPermissionRead);
        $accessRead = $this->createAccessPolicy($accessRead);

        $locatorRead = new Locator($asset, $accessRead, $locatorTypeRead);
        $locatorRead->setStartTime($locatorStartTimeRead);
        $locatorRead = $this->createLocator($locatorRead);

        // without sleep() Locator hasn't enough time to create URL, so that's why we have to use at least sleep(30)
        sleep(40);

        $method = Resources::HTTP_GET;
        $url = new Url($locatorRead->getBaseUri().'/'.$fileName.$locatorRead->getContentAccessComponent());
        $filters = [];
        $statusCode = Resources::STATUS_OK;

        $httpClient = new HttpClient();
        $httpClient->setMethod($method);
        $httpClient->setExpectedStatusCode($statusCode);

        $downloadedFileContent = $httpClient->send($filters, $url);

        // Assert
        $this->assertEquals($assetName, $asset->getName());
        $this->assertEquals($assetOptions, $asset->getOptions());
        $this->assertNotNull($asset->getId());
        $this->assertNotNull($asset->getCreated());

        $this->assertEquals($accessPolicyName, $access->getName());
        $this->assertEquals($accessPolicyDuration, $access->getDurationInMinutes());
        $this->assertEquals($accessPolicyPermission, $access->getPermissions());

        $this->assertEquals($accessPolicyNameRead, $accessRead->getName());
        $this->assertEquals($accessPolicyDurationRead, $accessRead->getDurationInMinutes());
        $this->assertEquals($accessPolicyPermissionRead, $accessRead->getPermissions());

        $this->assertNotNull($asset->getId());
        $this->assertNotNull($asset->getCreated());

        $this->assertEquals($locatorType, $locator->getType());
        $this->assertEquals($locatorStartTime->getTimestamp(), $locator->getStartTime()->getTimestamp());

        $this->assertEquals($locatorTypeRead, $locatorRead->getType());
        $this->assertEquals($locatorStartTimeRead->getTimestamp(), $locatorRead->getStartTime()->getTimestamp());

        $this->assertEquals($asset->getId(), $locator->getAssetId());
        $this->assertEquals($access->getId(), $locator->getAccessPolicyId());

        $this->assertEquals($asset->getId(), $locatorRead->getAssetId());
        $this->assertEquals($accessRead->getId(), $locatorRead->getAccessPolicyId());

        $this->assertEquals(1, count($assetFiles));

        $this->assertEquals($asset->getId(), $assetFiles[0]->getParentAssetId());
        $this->assertEquals($fileName, $assetFiles[0]->getName());

        $this->assertEquals($fileContent, $downloadedFileContent);
    }

    public function testUploadLargeFileFromResource()
    {
        // Setup
        $assetName = TestResources::MEDIA_SERVICES_ASSET_NAME.$this->createSuffix();
        $assetOptions = Asset::OPTIONS_NONE;

        $accessPolicyName = TestResources::MEDIA_SERVICES_ACCESS_POLICY_NAME.$this->createSuffix();
        $accessPolicyNameRead = TestResources::MEDIA_SERVICES_ACCESS_POLICY_NAME.$this->createSuffix();

        $accessPolicyDuration = 30;
        $accessPolicyDurationRead = 300;

        $accessPolicyPermission = AccessPolicy::PERMISSIONS_WRITE;
        $accessPolicyPermissionRead = AccessPolicy::PERMISSIONS_READ;

        $locatorStartTime = new \DateTime('now -5 minutes');
        $locatorType = Locator::TYPE_SAS;
        $locatorStartTimeRead = new \DateTime('now -5 minutes');
        $locatorTypeRead = Locator::TYPE_SAS;

        $fileName = TestResources::MEDIA_SERVICES_DUMMY_FILE_NAME;
        $fileContent = $this->createLargeFile();
        $resource = fopen(VirtualFileSystem::newFile($fileContent), 'r');

        // Test
        $asset = new Asset($assetOptions);
        $asset->setName($assetName);
        $asset = $this->createAsset($asset);

        $access = new AccessPolicy($accessPolicyName);
        $access->setDurationInMinutes($accessPolicyDuration);
        $access->setPermissions($accessPolicyPermission);
        $access = $this->createAccessPolicy($access);

        $locator = new Locator($asset,  $access, $locatorType);
        $locator->setStartTime($locatorStartTime);
        $locator = $this->createLocator($locator);

        $this->mediaServicesWrapper->uploadAssetFile($locator, $fileName, $resource);

        $this->mediaServicesWrapper->createFileInfos($asset);
        $assetFiles = $this->mediaServicesWrapper->getAssetFileList();

        $accessRead = new AccessPolicy($accessPolicyNameRead);
        $accessRead->setDurationInMinutes($accessPolicyDurationRead);
        $accessRead->setPermissions($accessPolicyPermissionRead);
        $accessRead = $this->createAccessPolicy($accessRead);

        $locatorRead = new Locator($asset, $accessRead, $locatorTypeRead);
        $locatorRead->setStartTime($locatorStartTimeRead);
        $locatorRead = $this->createLocator($locatorRead);

        // without sleep() Locator hasn't enough time to create URL, so that's why we have to use at least sleep(30)
        sleep(40);

        $method = Resources::HTTP_GET;
        $url = new Url($locatorRead->getBaseUri().'/'.$fileName.$locatorRead->getContentAccessComponent());
        $filters = [];
        $statusCode = Resources::STATUS_OK;

        $httpClient = new HttpClient();
        $httpClient->setMethod($method);
        $httpClient->setExpectedStatusCode($statusCode);

        $downloadedFileContent = $httpClient->send($filters, $url);

        // Assert
        $this->assertEquals($assetName, $asset->getName());
        $this->assertEquals($assetOptions, $asset->getOptions());
        $this->assertNotNull($asset->getId());
        $this->assertNotNull($asset->getCreated());

        $this->assertEquals($accessPolicyName, $access->getName());
        $this->assertEquals($accessPolicyDuration, $access->getDurationInMinutes());
        $this->assertEquals($accessPolicyPermission, $access->getPermissions());

        $this->assertEquals($accessPolicyNameRead, $accessRead->getName());
        $this->assertEquals($accessPolicyDurationRead, $accessRead->getDurationInMinutes());
        $this->assertEquals($accessPolicyPermissionRead, $accessRead->getPermissions());

        $this->assertNotNull($asset->getId());
        $this->assertNotNull($asset->getCreated());

        $this->assertEquals($locatorType, $locator->getType());
        $this->assertEquals($locatorStartTime->getTimestamp(), $locator->getStartTime()->getTimestamp());

        $this->assertEquals($locatorTypeRead, $locatorRead->getType());
        $this->assertEquals($locatorStartTimeRead->getTimestamp(), $locatorRead->getStartTime()->getTimestamp());

        $this->assertEquals($asset->getId(), $locator->getAssetId());
        $this->assertEquals($access->getId(), $locator->getAccessPolicyId());

        $this->assertEquals($asset->getId(), $locatorRead->getAssetId());
        $this->assertEquals($accessRead->getId(), $locatorRead->getAccessPolicyId());

        $this->assertEquals(1, count($assetFiles));

        $this->assertEquals($asset->getId(), $assetFiles[0]->getParentAssetId());
        $this->assertEquals($fileName, $assetFiles[0]->getName());

        $this->assertEquals($fileContent, $downloadedFileContent);
    }
}
