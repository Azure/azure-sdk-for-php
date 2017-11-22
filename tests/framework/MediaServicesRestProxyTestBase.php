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

use Exception;
use WindowsAzure\Common\Internal\MediaServicesSettings;
use WindowsAzure\MediaServices\Authentication\AzureAdTokenCredentials;
use WindowsAzure\MediaServices\Authentication\AzureAdClientSymmetricKey;
use WindowsAzure\MediaServices\Authentication\AzureAdTokenProvider;
use WindowsAzure\MediaServices\Authentication\AzureEnvironments;
use WindowsAzure\MediaServices\MediaServicesRestProxy;
use WindowsAzure\MediaServices\Models\Asset;
use WindowsAzure\MediaServices\Models\AccessPolicy;
use WindowsAzure\MediaServices\Models\Locator;
use WindowsAzure\MediaServices\Models\Job;
use WindowsAzure\MediaServices\Models\Task;
use WindowsAzure\MediaServices\Models\TaskOptions;
use WindowsAzure\MediaServices\Models\JobTemplate;
use WindowsAzure\MediaServices\Models\TaskTemplate;
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
 * @version   Release: 0.5.0_2016-11
 *
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
class MediaServicesRestProxyTestBase extends ServiceRestProxyTestBase
{
    protected $assets = [];
    protected $accessPolicy = [];
    protected $locator = [];
    protected $jobTemplate = [];
    /**
     * @var Job[]
     */
    protected $job = [];
    protected $outputAssets = [];
    protected $ingestManifests = [];
    protected $ingestManifestAssets = [];
    protected $ingestManifestFiles = [];
    protected $contentKeys = [];
    protected $contentKeyAuthorizationPolicies = [];
    protected $contentKeyAuthorizationOptions = [];
    protected $assetDeliveryPolicies = [];
    /**
     * @var MediaServicesRestProxy
     */
    protected $mediaServicesWrapper;

    const LARGE_FILE_SIZE_MB = 7;

    public function setUp()
    {
        $this->skipIfEmulated();
        parent::setUp();
        $connection = TestResources::getMediaServicesConnectionParameters();
        $credentials = new AzureAdTokenCredentials(
            $connection['tenant'],
            new AzureAdClientSymmetricKey($connection['clientId'], $connection['clientKey']),
            call_user_func('WindowsAzure\\MediaServices\\Authentication\\AzureEnvironments::' . $connection['environment']));
        $provider = new AzureAdTokenProvider($credentials);
        $settings = new MediaServicesSettings($connection['restApiEndpoint'], $provider);
        $this->mediaServicesWrapper = $this->builder->createMediaServicesService($settings);
        parent::setProxy($this->mediaServicesWrapper);
    }

    public function createAsset($asset)
    {
        $result = $this->mediaServicesWrapper->createAsset($asset);
        $this->assets[$result->getId()] = $result;

        return $result;
    }

    public function createAccessPolicy($accessPolicy)
    {
        $result = $this->mediaServicesWrapper->createAccessPolicy($accessPolicy);
        $this->accessPolicy[$result->getId()] = $result;

        return $result;
    }

    public function createLocator($loc)
    {
        $result = $this->mediaServicesWrapper->createLocator($loc);
        $this->locator[$result->getId()] = $result;

        return $result;
    }

    public function createJob($job, $inputAssets, $tasks = null)
    {
        $result = $this->mediaServicesWrapper->createJob($job, $inputAssets, $tasks);
        $this->job[$result->getId()] = $result;

        return $result;
    }

    public function createIngestManifest($ingestManifest)
    {
        $result = $this->mediaServicesWrapper->createIngestManifest($ingestManifest);
        $this->ingestManifests[$result->getId()] = $result;

        return $result;
    }

    public function createIngestManifestAsset($ingestManifestAsset, $asset)
    {
        $result = $this->mediaServicesWrapper->createIngestManifestAsset($ingestManifestAsset, $asset);
        $this->ingestManifestAssets[$result->getId()] = $result;

        return $result;
    }

    public function createIngestManifestFile($ingestManifestFile)
    {
        $result = $this->mediaServicesWrapper->createIngestManifestFile($ingestManifestFile);
        $this->ingestManifestFiles[$result->getId()] = $result;

        return $result;
    }

    public function createContentKey($contentKey)
    {
        $result = $this->mediaServicesWrapper->createContentKey($contentKey);
        $this->contentKeys[$result->getId()] = $result;

        return $result;
    }

    public function createContentKeyAuthorizationPolicy($contentKeyAuthorizationPolicy)
    {
        $result = $this->mediaServicesWrapper->createContentKeyAuthorizationPolicy($contentKeyAuthorizationPolicy);
        $this->contentKeyAuthorizationPolicies[$result->getId()] = $result;

        return $result;
    }

    public function createContentKeyAuthorizationPolicyOption($contentKeyAuthorizationOption)
    {
        $result = $this->mediaServicesWrapper->createContentKeyAuthorizationPolicyOption($contentKeyAuthorizationOption);
        $this->contentKeyAuthorizationOptions[$result->getId()] = $result;

        return $result;
    }

    public function createAssetDeliveryPolicy($assetDeliveryPolicy)
    {
        $result = $this->mediaServicesWrapper->createAssetDeliveryPolicy($assetDeliveryPolicy);
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
        $this->mediaServicesWrapper->uploadAssetFile($locator, $fileName, TestResources::MEDIA_SERVICES_DUMMY_FILE_CONTENT);
        $this->mediaServicesWrapper->createFileInfos($asset);

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
        $this->mediaServicesWrapper->uploadAssetFile($locator, $fileName, TestResources::MEDIA_SERVICES_DUMMY_FILE_CONTENT);
        $this->mediaServicesWrapper->createFileInfos($asset);
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
        $this->mediaServicesWrapper->uploadAssetFile($locator, TestResources::MEDIA_SERVICES_ISM_FILE_NAME, $firstFile);
        $this->mediaServicesWrapper->uploadAssetFile($locator, TestResources::MEDIA_SERVICES_ISMC_FILE_NAME, $secondFile);
        $this->mediaServicesWrapper->createFileInfos($asset);

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
        $mediaProcessor = $this->mediaServicesWrapper->getLatestMediaProcessor(
            TestResources::MEDIA_SERVICES_PROCESSOR_NAME
        );
        $inputAsset = $this->createAssetWithFile();

        $taskBody = TestResources::getMediaServicesTask($this->getOutputAssetName());
        $task = new Task($taskBody, $mediaProcessor->getId(), TaskOptions::NONE);
        $task->setConfiguration(TestResources::MEDIA_SERVICES_TASK_CONFIGURATION);

        $job = new Job();
        $job->setName($name);

        $jobResult = $this->createJob($job, [$inputAsset], [$task]);

        return $jobResult;
    }

    public function createJobTemplate($jobTemplate, $taskTemplates)
    {
        $jobTempl = $this->mediaServicesWrapper->createJobTemplate($jobTemplate, $taskTemplates);
        $this->jobTemplate[$jobTempl->getId()] = $jobTempl;

        return $jobTempl;
    }

    public function createJobTemplateWithTasks($name)
    {
        $mediaProcessor = $this->mediaServicesWrapper->getLatestMediaProcessor(
            TestResources::MEDIA_SERVICES_PROCESSOR_NAME);

        $this->assertNotNull($mediaProcessor);

        $taskTemplate = new TaskTemplate(1, 1);
        $taskTemplate->setMediaProcessorId($mediaProcessor->getId());
        $taskTemplate->setConfiguration(TestResources::MEDIA_SERVICES_TASK_CONFIGURATION);

        $jobTemplateBody = TestResources::getMediaServicesJobTemplate($taskTemplate->getId(), $this->getOutputAssetName());
        $jobTemplate = new JobTemplate($jobTemplateBody);
        $jobTemplate->setName($name);

        $jobTempl = $this->createJobTemplate($jobTemplate, [$taskTemplate]);

        return $jobTempl;
    }

    protected function tearDown()
    {
        parent::tearDown();

        $this->assertNotNull($this->restProxy);

        $channels = $this->mediaServicesWrapper->getChannelList();
        foreach ($channels as $ch) {
            if ($this->startsWith($ch->getName(), TestResources::MEDIA_SERVICES_CHANNEL_NAME)) {

                $programs = $this->mediaServicesWrapper->getProgramList($ch);

                foreach($programs as $program) {
                    if ($program->getState() == ProgramState::Running) {
                        $this->mediaServicesWrapper->stopProgram($program);
                    }
                    $this->mediaServicesWrapper->deleteProgram($program);
                }
                if ($ch->getState() == ChannelState::Running) {
                    $this->mediaServicesWrapper->stopChannel($ch);
                }
                $this->mediaServicesWrapper->deleteChannel($ch);
            }
        }

        foreach ($this->ingestManifestFiles as $ingestManifestFile) {
            $this->mediaServicesWrapper->deleteIngestManifestFile($ingestManifestFile);
        }

        foreach ($this->ingestManifestAssets as $ingestManifestAsset) {
            $this->mediaServicesWrapper->deleteIngestManifestAsset($ingestManifestAsset);
        }

        foreach ($this->ingestManifests as $ingestManifest) {
            $this->mediaServicesWrapper->deleteIngestManifest($ingestManifest);
        }

        foreach ($this->locator as $loc) {
            $this->mediaServicesWrapper->deleteLocator($loc);
        }

        foreach ($this->contentKeyAuthorizationPolicies as $contentKeyAuthorizationPolicy) {
            $this->mediaServicesWrapper->deleteContentKeyAuthorizationPolicy($contentKeyAuthorizationPolicy);
        }

        foreach ($this->contentKeyAuthorizationOptions as $contentKeyAuthorizationOption) {
            $this->mediaServicesWrapper->deleteContentKeyAuthorizationPolicyOption($contentKeyAuthorizationOption);
        }

        foreach ($this->assets as $asset) {
            $assetDeliveryPolicies = $this->mediaServicesWrapper->getAssetLinkedDeliveryPolicy($asset);
            foreach ($assetDeliveryPolicies as $dp) {
                $this->mediaServicesWrapper->removeDeliveryPolicyFromAsset($asset, $dp);
            }
        }

        foreach ($this->assetDeliveryPolicies as $assetDeliveryPolicy) {
            $this->mediaServicesWrapper->deleteAssetDeliveryPolicy($assetDeliveryPolicy);
        }

        foreach ($this->assets as $asset) {
            $contentKeyList = $this->mediaServicesWrapper->getAssetContentKeys($asset);
            foreach ($contentKeyList as $contentKey) {
                unset($this->contentKeys[$contentKey->getId()]);
            }

            $this->mediaServicesWrapper->deleteAsset($asset);
        }

        $availableContentKeyList = null;

        // $this->restProxy can be empty here
        if (is_object($this->restProxy)) {
            $availableContentKeyList = $this->mediaServicesWrapper->getContentKeyList();
        }

        $availableContentKeyIds = [];
        foreach ($availableContentKeyList as $availableContentKey) {
            $availableContentKeyIds[] = $availableContentKey->getId();
        }
        foreach ($this->contentKeys as $contentKey) {
            if (in_array($contentKey->getId(), $availableContentKeyIds)) {
                $this->mediaServicesWrapper->deleteContentKey($contentKey);
            }
        }

        foreach ($this->accessPolicy as $access) {
            $this->mediaServicesWrapper->deleteAccessPolicy($access);
        }

        foreach ($this->jobTemplate as $jobTemplate) {
            $this->mediaServicesWrapper->deleteJobTemplate($jobTemplate);
        }

        foreach ($this->job as $job) {
            $this->deleteJob($job);
        }

        $assets = $this->mediaServicesWrapper->getAssetList();
        foreach ($assets as $asset) {
            if (in_array($asset->getName(), $this->outputAssets)) {
                $this->mediaServicesWrapper->deleteAsset($asset);
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
        $status = $this->mediaServicesWrapper->getJobStatus($job);
        while (!in_array($status, $statusArray)) {
            sleep(1);
            $status = $this->mediaServicesWrapper->getJobStatus($job);
        }
    }

    public function deleteJob(Job $job)
    {
        $this->waitJobStatus($job, [Job::STATE_FINISHED, Job::STATE_ERROR, Job::STATE_CANCELED]);
        $this->mediaServicesWrapper->deleteJob($job->getId());
        unset($this->job[$job->getId()]);
    }

    public function waitIngestManifestFinishedFiles($manifest, $fileCount, $threshold = 40)
    {
        $stat = $this->mediaServicesWrapper->getIngestManifest($manifest);
        $attempt = 0;
        while (($stat->getStatistics()->getFinishedFilesCount() < $fileCount)
            && ($attempt < $threshold)
        ) {
            $stat = $this->mediaServicesWrapper->getIngestManifest($manifest);
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

        $this->mediaServicesWrapper->uploadAssetFile($locator, $fileName, $fileContent);
        $this->mediaServicesWrapper->createFileInfos($asset);

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
        $filters = [];
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

        $this->mediaServicesWrapper->uploadAssetFile($locator, $fileName, $fileContent);
        $this->mediaServicesWrapper->createFileInfos($asset);

        $list = $this->mediaServicesWrapper->getAssetAssetFileList($asset);
        if (isset($list[0])) {
            $list[0]->setIsPrimary(true);
            $this->mediaServicesWrapper->updateAssetFile($list[0]);
        } else {
            throw new Exception("unable to find the asset file");
        }
        return $asset;
    }

    /**
     * Verifies if $array contains an entity with id $id.
     *
     * @param mixed $id    the id to lookup into the array
     * @param array $array the array
     */
    public static function assertContainsEntityById($id, array $array)
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
