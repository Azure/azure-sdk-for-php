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

namespace Tests\framework;

use Tests\Framework\ServiceRestProxyTestBase;
use WindowsAzure\Common\Internal\MediaServicesSettings;
use WindowsAzure\MediaServices\Models\Asset;
use WindowsAzure\MediaServices\Models\AccessPolicy;
use WindowsAzure\MediaServices\Models\Locator;
use WindowsAzure\MediaServices\Models\Job;
use WindowsAzure\MediaServices\Models\Task;
use WindowsAzure\MediaServices\Models\TaskOptions;
use WindowsAzure\MediaServices\Models\JobTemplate;
use WindowsAzure\MediaServices\Models\TaskTemplate;
use WindowsAzure\MediaServices\Models\Channel;
use WindowsAzure\MediaServices\Models\Program;
use WindowsAzure\MediaServices\Models\ChannelState;
use WindowsAzure\MediaServices\Models\ProgramState;
use WindowsAzure\Common\Internal\Http\Url;
use WindowsAzure\Common\Internal\Http\HttpClient;
use WindowsAzure\Common\Internal\Resources;

/**
 * TestBase class for each unit test class.
 *
 * @category  Microsoft
 *
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 *
 * @version   Release: 0.4.5_2016-09
 *
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
class MediaServicesRestProxyTestBase extends ServiceRestProxyTestBase
{
    protected $assets = array();
    protected $accessPolicy = array();
    protected $locator = array();
    protected $jobTemplate = array();
    protected $job = array();
    protected $outputAssets = array();
    protected $ingestManifests = array();
    protected $ingestManifestAssets = array();
    protected $ingestManifestFiles = array();
    protected $contentKeys = array();
    protected $contentKeyAuthorizationPolicies = array();
    protected $contentKeyAuthorizationOptions = array();
    protected $assetDeliveryPolicies = array();

    const LARGE_FILE_SIZE_MB = 7;

    public function setUp()
    {
        $this->skipIfEmulated();
        parent::setUp();
        $connection = TestResources::getMediaServicesConnectionParameters();
        $settings = new MediaServicesSettings($connection['accountName'], $connection['accessKey'], $connection['endpointUri'], $connection['oauthEndopointUri']);
        $mediaServicesWrapper = $this->builder->createMediaServicesService($settings);
        parent::setProxy($mediaServicesWrapper);
    }

    public function createAsset($asset)
    {
        $result = $this->restProxy->createAsset($asset);
        $this->assets[$result->getId()] = $result;

        return $result;
    }

    public function createAccessPolicy($accessPolicy)
    {
        $result = $this->restProxy->createAccessPolicy($accessPolicy);
        $this->accessPolicy[$result->getId()] = $result;

        return $result;
    }

    public function createLocator($loc)
    {
        $result = $this->restProxy->createLocator($loc);
        $this->locator[$result->getId()] = $result;

        return $result;
    }

    public function createJob($job, $inputAssets, $tasks = null)
    {
        $result = $this->restProxy->createJob($job, $inputAssets, $tasks);
        $this->job[$result->getId()] = $result;

        return $result;
    }

    public function createIngestManifest($ingestManifest)
    {
        $result = $this->restProxy->createIngestManifest($ingestManifest);
        $this->ingestManifests[$result->getId()] = $result;

        return $result;
    }

    public function createIngestManifestAsset($ingestManifestAsset, $asset)
    {
        $result = $this->restProxy->createIngestManifestAsset($ingestManifestAsset, $asset);
        $this->ingestManifestAssets[$result->getId()] = $result;

        return $result;
    }

    public function createIngestManifestFile($ingestManifestFile)
    {
        $result = $this->restProxy->createIngestManifestFile($ingestManifestFile);
        $this->ingestManifestFiles[$result->getId()] = $result;

        return $result;
    }

    public function createContentKey($contentKey)
    {
        $result = $this->restProxy->createContentKey($contentKey);
        $this->contentKeys[$result->getId()] = $result;

        return $result;
    }

    public function createContentKeyAuthorizationPolicy($contentKeyAuthorizationPolicy)
    {
        $result = $this->restProxy->createContentKeyAuthorizationPolicy($contentKeyAuthorizationPolicy);
        $this->contentKeyAuthorizationPolicies[$result->getId()] = $result;

        return $result;
    }

    public function createContentKeyAuthorizationPolicyOption($contentKeyAuthorizationOption)
    {
        $result = $this->restProxy->createContentKeyAuthorizationPolicyOption($contentKeyAuthorizationOption);
        $this->contentKeyAuthorizationOptions[$result->getId()] = $result;

        return $result;
    }

    public function createAssetDeliveryPolicy($assetDeliveryPolicy)
    {
        $result = $this->restProxy->createAssetDeliveryPolicy($assetDeliveryPolicy);
        $this->assetDeliveryPolicies[$result->getId()] = $result;

        return $result;
    }

    public function createAssetWithFile()
    {
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
        $this->restProxy->uploadAssetFile($locator, $fileName, TestResources::MEDIA_SERVICES_DUMMY_FILE_CONTENT);
        $this->restProxy->createFileInfos($asset);

        return $asset;
    }

    public function uploadFileToAsset($asset)
    {
        $access = new AccessPolicy(TestResources::MEDIA_SERVICES_ACCESS_POLICY_NAME.$this->createSuffix());
        $access->setDurationInMinutes(30);
        $access->setPermissions(AccessPolicy::PERMISSIONS_WRITE);
        $access = $this->createAccessPolicy($access);

        $locator = new Locator($asset, $access, Locator::TYPE_SAS);
        $locator->setName(TestResources::MEDIA_SERVICES_LOCATOR_NAME.$this->createSuffix());
        $locator->setStartTime(new \DateTime('now -5 minutes'));
        $locator = $this->createLocator($locator);

        $fileName = TestResources::MEDIA_SERVICES_DUMMY_FILE_NAME;
        $this->restProxy->uploadAssetFile($locator, $fileName, TestResources::MEDIA_SERVICES_DUMMY_FILE_CONTENT);
        $this->restProxy->createFileInfos($asset);
    }

    public function createAssetWithFilesForStream()
    {
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

        $firstFile = TestResources::getSmallIsm();
        $secondFile = TestResources::getSmallIsmc();
        $this->restProxy->uploadAssetFile($locator, TestResources::MEDIA_SERVICES_ISM_FILE_NAME, $firstFile);
        $this->restProxy->uploadAssetFile($locator, TestResources::MEDIA_SERVICES_ISMC_FILE_NAME, $secondFile);
        $this->restProxy->createFileInfos($asset);

        return $asset;
    }

    public function getOutputAssetName()
    {
        $outputAssetName = TestResources::MEDIA_SERVICES_OUTPUT_ASSET_NAME.$this->createSuffix();
        $this->outputAssets[] = $outputAssetName;

        return $outputAssetName;
    }

    public function createJobWithTasks($name)
    {
        $mediaProcessor = $this->restProxy->getLatestMediaProcessor(TestResources::MEDIA_SERVICES_PROCESSOR_NAME);
        $inputAsset = $this->createAssetWithFile();

        $taskBody = TestResources::getMediaServicesTask($this->getOutputAssetName());
        $task = new Task($taskBody, $mediaProcessor->getId(), TaskOptions::NONE);
        $task->setConfiguration(TestResources::MEDIA_SERVICES_TASK_COFIGURATION);

        $job = new Job();
        $job->setName($name);

        $jobResult = $this->createJob($job, array($inputAsset), array($task));

        return $jobResult;
    }

    public function createJobTemplate($jobTemplate, $taskTemplates)
    {
        $jobTempl = $this->restProxy->createJobTemplate($jobTemplate, $taskTemplates);
        $this->jobTemplate[$jobTempl->getId()] = $jobTempl;

        return $jobTempl;
    }

    public function createJobTemplateWithTasks($name)
    {
        $mediaProcessor = $this->restProxy->getLatestMediaProcessor(TestResources::MEDIA_SERVICES_PROCESSOR_NAME);

        $taskTemplate = new TaskTemplate(1, 1);
        $taskTemplate->setMediaProcessorId($mediaProcessor->getId());
        $taskTemplate->setConfiguration(TestResources::MEDIA_SERVICES_TASK_COFIGURATION);

        $jobTemplateBody = TestResources::getMediaServicesJobTemplate($taskTemplate->getId(), $this->getOutputAssetName());
        $jobTemplate = new JobTemplate($jobTemplateBody);
        $jobTemplate->setName($name);

        $jobTempl = $this->createJobTemplate($jobTemplate, array($taskTemplate));

        return $jobTempl;
    }

    protected function tearDown()
    {
        parent::tearDown();

        $channels = $this->restProxy->getChannelList();
        foreach ($channels as $ch) {
            if ($this->startsWith($ch->getName(), TestResources::MEDIA_SERVICES_CHANNEL_NAME)) {

                $programs = $this->restProxy->getProgramList($ch);

                foreach($programs as $prog) {
                    if ($prog->getState() == ProgramState::Running) {
                        $this->restProxy->stopProgram($prog);
                    }
                    $this->restProxy->deleteProgram($prog);
                }
                if ($ch->getState() == ChannelState::Running) {
                    $this->restProxy->stopChannel($ch);
                }
                $this->restProxy->deleteChannel($ch);
            }
        }

        foreach ($this->ingestManifestFiles as $ingestManifestFile) {
            $this->restProxy->deleteIngestManifestFile($ingestManifestFile);
        }

        foreach ($this->ingestManifestAssets as $ingestManifestAsset) {
            $this->restProxy->deleteIngestManifestAsset($ingestManifestAsset);
        }

        foreach ($this->ingestManifests as $ingestManifest) {
            $this->restProxy->deleteIngestManifest($ingestManifest);
        }

        foreach ($this->locator as $loc) {
            $this->restProxy->deleteLocator($loc);
        }

        foreach ($this->contentKeyAuthorizationPolicies as $contentKeyAuthorizationPolicy) {
            $this->restProxy->deleteContentKeyAuthorizationPolicy($contentKeyAuthorizationPolicy);
        }

        foreach ($this->contentKeyAuthorizationOptions as $contentKeyAuthorizationOption) {
            $this->restProxy->deleteContentKeyAuthorizationPolicyOption($contentKeyAuthorizationOption);
        }

        foreach ($this->assets as $asset) {
            $assetDeliveryPolicies = $this->restProxy->getAssetLinkedDeliveryPolicy($asset);
            foreach ($assetDeliveryPolicies as $dp) {
                $this->restProxy->removeDeliveryPolicyFromAsset($asset, $dp);
            }
        }

        foreach ($this->assetDeliveryPolicies as $assetDeliveryPolicy) {
            $this->restProxy->deleteAssetDeliveryPolicy($assetDeliveryPolicy);
        }

        foreach ($this->assets as $asset) {
            $contentKeyList = $this->restProxy->getAssetContentKeys($asset);
            foreach ($contentKeyList as $contentKey) {
                unset($this->contentKeys[$contentKey->getId()]);
            }

            $this->restProxy->deleteAsset($asset);
        }

        // $this->restProxy can be empty here
        if (is_object($this->restProxy)) {
            $availableContentKeyList = $this->restProxy->getContentKeyList();
        }

        $availableContentKeyIds = array();
        foreach ($availableContentKeyList as $availableContentKey) {
            $availableContentKeyIds[] = $availableContentKey->getId();
        }
        foreach ($this->contentKeys as $contentKey) {
            if (in_array($contentKey->getId(), $availableContentKeyIds)) {
                $this->restProxy->deleteContentKey($contentKey);
            }
        }

        foreach ($this->accessPolicy as $access) {
            $this->restProxy->deleteAccessPolicy($access);
        }

        foreach ($this->jobTemplate as $jobTemplate) {
            $this->restProxy->deleteJobTemplate($jobTemplate);
        }

        foreach ($this->job as $job) {
            $this->deleteJob($job);
        }

        $assets = $this->restProxy->getAssetList();
        foreach ($assets as $asset) {
            if (in_array($asset->getName(), $this->outputAssets)) {
                $this->restProxy->deleteAsset($asset);
            }
        }
    }

    function startsWith($haystack, $needle) {
        return $needle === "" || strrpos($haystack, $needle, -strlen($haystack)) !== false;
    }

    protected function createSuffix()
    {
        return sprintf('-%04x', mt_rand(0, 65535));
    }

    protected function createLargeFile()
    {
        $fileContent = TestResources::MEDIA_SERVICES_DUMMY_FILE_CONTENT;

        $targetFileSize = self::LARGE_FILE_SIZE_MB * 1024 * 1024;

        while (strlen($fileContent) < $targetFileSize) {
            $fileContent .= TestResources::MEDIA_SERVICES_DUMMY_FILE_CONTENT;
        }

        return $fileContent;
    }

    public function waitJobStatus($job, $statusArray)
    {
        $status = $this->restProxy->getJobStatus($job);
        while (!in_array($status, $statusArray)) {
            sleep(1);
            $status = $this->restProxy->getJobStatus($job);
        }
    }

    public function deleteJob($job)
    {
        $this->waitJobStatus($job, array(Job::STATE_FINISHED, Job::STATE_ERROR, Job::STATE_CANCELED));
        $this->restProxy->deleteJob($job->getId());
        unset($this->job[$job->getId()]);
    }

    public function waitIngestManifestFinishedFiles($manifest, $fileCount, $threshold = 40)
    {
        $stat = $this->restProxy->getIngestManifest($manifest);
        $attempt = 0;
        while (($stat->getStatistics()->getFinishedFilesCount() < $fileCount)
            && ($attempt < $threshold)
        ) {
            $stat = $this->restProxy->getIngestManifest($manifest);
            ++$attempt;
            sleep(1);
        }
    }

    public function uploadFile($fileName, $fileContent)
    {
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

        $this->restProxy->uploadAssetFile($locator, $fileName, $fileContent);
        $this->restProxy->createFileInfos($asset);

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

        $method = Resources::HTTP_GET;
        $url = new Url($locator->getBaseUri().'/'.$fileName.$locator->getContentAccessComponent());
        $filters = array();
        $statusCode = Resources::STATUS_OK;

        $httpClient = new HttpClient();
        $httpClient->setMethod($method);
        $httpClient->setExpectedStatusCode($statusCode);

        return $httpClient->send($filters, $url);
    }

    public function uploadSingleFile($fileName, $fileContent)
    {
        $asset = new Asset(Asset::OPTIONS_NONE);
        $asset->setName($fileName);
        $asset = $this->createAsset($asset);

        $access = new AccessPolicy(TestResources::MEDIA_SERVICES_ACCESS_POLICY_NAME.$this->createSuffix());
        $access->setDurationInMinutes(30);
        $access->setPermissions(AccessPolicy::PERMISSIONS_WRITE);
        $access = $this->createAccessPolicy($access);
        
        $locator = new Locator($asset, $access, Locator::TYPE_SAS);
        $locator->setName(TestResources::MEDIA_SERVICES_LOCATOR_NAME.$this->createSuffix());
        $locator->setStartTime(new \DateTime('now -5 minutes'));
        $locator = $this->createLocator($locator);
        
        $this->restProxy->uploadAssetFile($locator, $fileName, $fileContent); 
        $this->restProxy->createFileInfos($asset);

        $list = $this->restProxy->getAssetAssetFileList($asset);
        if (isset($list[0])) {
            $list[0]->setIsPrimary(true);
            $this->restProxy->updateAssetFile($list[0]);
        } else {
            throw new Exception("unable to find the asset file");
        }
        return $asset;
    }

    /**
     * Verifies if $array contains an entity with id $id.
     *
     * @param mixed $id    the id to lookup into the array
     * @param mixed $array the array 
     */
    public static function assertContainsEntityById($id, $array)
    {
        $found = false;
        foreach ($array as $entity) {
            $reflect = new \ReflectionClass($entity);
            if ($reflect->hasMethod('getId')) {
                if ($id == $entity->getId()) {
                    $found = true;
                }
            }
        }
        self::assertThat($found, self::isTrue(), "The entity with ID=$id was not found in the provided array");
    }
}
