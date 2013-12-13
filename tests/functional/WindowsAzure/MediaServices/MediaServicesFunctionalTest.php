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
use WindowsAzure\MediaServices\Models\Job;
use WindowsAzure\MediaServices\Models\Task;
use WindowsAzure\MediaServices\Models\TaskOptions;
use WindowsAzure\MediaServices\Models\JobTemplate;
use WindowsAzure\MediaServices\Models\TaskTemplate;

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
        $assetName      = TestResources::MEDIA_SERVICES_ASSET_NAME . $this->createSuffix();
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
        $assetName              = TestResources::MEDIA_SERVICES_ASSET_NAME . $this->createSuffix();
        $assetOptions           = Asset::OPTIONS_NONE;

        $accessPolicyName       = TestResources::MEDIA_SERVICES_ACCESS_POLICY_NAME . $this->createSuffix();
        $accessPolicyDiration   = 30;
        $accessPolicyPermission = AccessPolicy::PERMISSIONS_WRITE;

        $locatorStartTime       = new \DateTime('now -5 minutes');
        $locatorType            = Locator::TYPE_SAS;

        $fileName               = TestResources::MEDIA_SERVICES_DUMMY_FILE_NAME;
        $otherFileName          = TestResources::MEDIA_SERVICES_DUMMY_FILE_NAME_1;

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

        $this->restProxy->uploadAssetFile($locator, $fileName, TestResources::MEDIA_SERVICES_DUMMY_FILE_CONTENT);
        $this->restProxy->uploadAssetFile($locator, $otherFileName, TestResources::MEDIA_SERVICES_DUMMY_FILE_CONTENT_1);

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

        // Files order is not static, so we don't know the index of each file and need to serve them as a set
        $resultFileNames = array(
            $assetFiles[0]->getName(),
            $assetFiles[1]->getName(),
        );
        $this->assertContains($otherFileName, $resultFileNames);
        $this->assertEquals($asset->getId(), $assetFiles[0]->getParentAssetId());
        $this->assertContains($fileName, $resultFileNames);
        $this->assertEquals($asset->getId(), $assetFiles[1]->getParentAssetId());
    }

    /**
     * @covers WindowsAzure\MediaServices\MediaServicesRestProxy::createJob
     * @covers WindowsAzure\MediaServices\MediaServicesRestProxy::getLatestMediaProcessor
     */
    public function testCreateJobWithTasks() {

        // Setup
        $mediaProcessor = $this->restProxy->getLatestMediaProcessor(TestResources::MEDIA_SERVICES_PROCESSOR_NAME);
        $inputAsset = $this->createAssetWithFile();

        $taskBody = TestResources::getMediaServicesTask($this->getOutputAssetName());
        $configuration = TestResources::MEDIA_SERVICES_TASK_COFIGURATION;

        $name = TestResources::MEDIA_SERVICES_JOB_NAME . $this->createSuffix();

        // Test
        $task = new Task($taskBody, $mediaProcessor->getId(), TaskOptions::NONE);
        $task->setConfiguration($configuration);

        $job = new Job();
        $job->setName($name);

        $jobWithTasks = $this->createJob($job, array($inputAsset), array($task));

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
     * @covers WindowsAzure\MediaServices\MediaServicesRestProxy::getLatestMediaProcessor
     * @covers WindowsAzure\MediaServices\MediaServicesRestProxy::createJobTemplate
     */
    public function testCreateJobTemplateWithTasks(){

        // Setup
        $mediaProcessor = $this->restProxy->getLatestMediaProcessor(TestResources::MEDIA_SERVICES_PROCESSOR_NAME);
        $inputAsset = $this->createAssetWithFile();

        $configuration = TestResources::MEDIA_SERVICES_TASK_COFIGURATION;
        $name = TestResources::MEDIA_SERVICES_JOB_TEMPLATE_NAME . $this->createSuffix();

        $taskTemplate = new TaskTemplate(1, 1);
        $jobTemplateBody = TestResources::getMediaServicesJobTemplate($taskTemplate->getId(), $this->getOutputAssetName());

        // Test
        $taskTemplate->setMediaProcessorId($mediaProcessor->getId());
        $taskTemplate->setConfiguration($configuration);

        $jobTemplate = new JobTemplate($jobTemplateBody);
        $jobTemplate->setName($name);

        $jobTemplateWithTasks = $this->createJobTemplate($jobTemplate, array($taskTemplate));

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
     * @covers WindowsAzure\MediaServices\MediaServicesRestProxy::createJob
     * @covers WindowsAzure\MediaServices\MediaServicesRestProxy::getLatestMediaProcessor
     * @covers WindowsAzure\MediaServices\MediaServicesRestProxy::createJobTemplate
     */
    public function testCreateJobUsingTemplate(){

        // Setup
        $mediaProcessor = $this->restProxy->getLatestMediaProcessor(TestResources::MEDIA_SERVICES_PROCESSOR_NAME);
        $inputAsset = $this->createAssetWithFile();

        $configuration = TestResources::MEDIA_SERVICES_TASK_COFIGURATION;
        $name = TestResources::MEDIA_SERVICES_JOB_NAME . $this->createSuffix();
        $nameTempl = TestResources::MEDIA_SERVICES_JOB_TEMPLATE_NAME . $this->createSuffix();

        $taskTemplate = new TaskTemplate(1, 1);
        $jobTemplateBody = TestResources::getMediaServicesJobTemplate($taskTemplate->getId(), $this->getOutputAssetName());

        // Test
        $taskTemplate->setMediaProcessorId($mediaProcessor->getId());
        $taskTemplate->setConfiguration($configuration);

        $jobTemplate = new JobTemplate($jobTemplateBody);
        $jobTemplate->setName($nameTempl);
        $jobTemplate = $this->createJobTemplate($jobTemplate, array($taskTemplate));

        $jobTemplateWithTasks = new Job();
        $jobTemplateWithTasks->setName($name);
        $jobTemplateWithTasks->setTemplateId($jobTemplate->getId());
        $jobTemplateWithTasks = $this->createJob($jobTemplateWithTasks, array($inputAsset));

        // Assert
        $this->assertEquals($jobTemplateBody, $jobTemplate->getJobTemplateBody());
        $this->assertEquals($nameTempl, $jobTemplate->getName());

        $this->assertEquals($name, $jobTemplateWithTasks->getName());

        $this->assertEquals($name, $jobTemplateWithTasks->getName());
        $this->assertEquals($jobTemplate->getId(), $jobTemplateWithTasks->getTemplateId());
        $this->assertContains(TestResources::MEDIA_SERVICES_JOB_ID_PREFIX, $jobTemplateWithTasks->getId());
        $this->assertNotNull($jobTemplateWithTasks->getCreated());
    }

    /**
     * @covers WindowsAzure\MediaServices\MediaServicesRestProxy::createJob
     * @covers WindowsAzure\MediaServices\MediaServicesRestProxy::getLatestMediaProcessor
     * @covers WindowsAzure\MediaServices\MediaServicesRestProxy::cancelJob
     * @covers WindowsAzure\MediaServices\MediaServicesRestProxy::getJobStatus
     */
    public function testCancelJob(){

        // Setup
        $mediaProcessor = $this->restProxy->getLatestMediaProcessor(TestResources::MEDIA_SERVICES_PROCESSOR_NAME);
        $inputAsset = $this->createAssetWithFile();
        $expected = array(
                Job::STATE_CANCELING,
                Job::STATE_CANCELED
        );

        $taskBody = TestResources::getMediaServicesTask($this->getOutputAssetName());
        $configuration = TestResources::MEDIA_SERVICES_TASK_COFIGURATION;

        $name = TestResources::MEDIA_SERVICES_JOB_NAME . $this->createSuffix();

        $task = new Task($taskBody, $mediaProcessor->getId(), TaskOptions::NONE);
        $task->setConfiguration($configuration);

        $job = new Job();
        $job->setName($name);

        $jobWithTasks = $this->createJob($job, array($inputAsset), array($task));

        // Test
        $canceledJobWithTasks = $this->restProxy->cancelJob($jobWithTasks);
        $status = $this->restProxy->getJobStatus($jobWithTasks);

        // Assert
        $this->assertEquals($taskBody, $task->getTaskBody());
        $this->assertEquals($configuration, $task->getConfiguration());
        $this->assertContains(TestResources::MEDIA_SERVICES_PROCESSOR_ID_PREFIX, $task->getMediaProcessorId());

        $this->assertEquals($name, $job->getName());

        $this->assertNull(null, $jobWithTasks);
        $this->assertContains($status, $expected);
    }

    /**
     * @covers WindowsAzure\MediaServices\MediaServicesRestProxy::createJob
     * @covers WindowsAzure\MediaServices\MediaServicesRestProxy::getLatestMediaProcessor
     * @covers WindowsAzure\MediaServices\MediaServicesRestProxy::getJobStatus
     */
    public function testMonitorProcessing(){

        // Setup
        $mediaProcessor = $this->restProxy->getLatestMediaProcessor(TestResources::MEDIA_SERVICES_PROCESSOR_NAME);
        $inputAsset = $this->createAssetWithFile();

        $taskBody = TestResources::getMediaServicesTask($this->getOutputAssetName());
        $configuration = TestResources::MEDIA_SERVICES_TASK_COFIGURATION;

        $name = TestResources::MEDIA_SERVICES_JOB_NAME . $this->createSuffix();

        $task = new Task($taskBody, $mediaProcessor->getId(), TaskOptions::NONE);
        $task->setConfiguration($configuration);

        $job = new Job();
        $job->setName($name);

        $jobWithTasks = $this->createJob($job, array($inputAsset), array($task));

        // Test
        $jobStatus = $this->restProxy->getJobStatus($jobWithTasks);

        // Assert
        $this->assertEquals($taskBody, $task->getTaskBody());
        $this->assertEquals($configuration, $task->getConfiguration());
        $this->assertContains(TestResources::MEDIA_SERVICES_PROCESSOR_ID_PREFIX, $task->getMediaProcessorId());

        $this->assertEquals($name, $job->getName());

        $this->assertLessThanOrEqual(6, $jobStatus);
        $this->assertGreaterThanOrEqual(0, $jobStatus);
    }
}