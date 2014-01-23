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
 * @package   Tests\Framework
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */

namespace Tests\Framework;
use Tests\Framework\ServiceRestProxyTestBase;
use WindowsAzure\Common\ServiceException;
use WindowsAzure\Common\Internal\MediaServicesSettings;
use WindowsAzure\MediaServices\Models\Asset;
use WindowsAzure\MediaServices\Models\AccessPolicy;
use WindowsAzure\MediaServices\Models\Locator;
use WindowsAzure\MediaServices\Models\AssetFile;
use WindowsAzure\MediaServices\Models\Job;
use WindowsAzure\MediaServices\Models\Task;
use WindowsAzure\MediaServices\Models\TaskOptions;
use WindowsAzure\MediaServices\Models\JobTemplate;
use WindowsAzure\MediaServices\Models\TaskTemplate;

/**
 * TestBase class for each unit test class.
 *
 * @category  Microsoft
 * @package   Tests\Framework
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: 0.4.0_2014-01
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

    public function setUp()
    {
        parent::setUp();
        $connection         = TestResources::getMediaServicesConnectionParameters();
        $settings           = new MediaServicesSettings($connection['accountName'], $connection['accessKey'], $connection['endpointUri'], $connection['oauthEndopointUri']);
        $mediaServicesWrapper = $this->builder->createMediaServicesService($settings);
        parent::setProxy($mediaServicesWrapper);
    }

    public function createAsset($asset) {
        $result = $this->restProxy->createAsset($asset);

        $this->assets[$result->getId()] = $result;

        return $result;
    }

    public function createAccessPolicy($accessPolicy) {
        $result = $this->restProxy->createAccessPolicy($accessPolicy);

        $this->accessPolicy[$result->getId()] = $result;

        return $result;
    }

    public function createLocator($loc) {

        $result = $this->restProxy->createLocator($loc);

        $this->locator[$result->getId()] = $result;

        return $result;
    }

    public function createJob($job, $inputAssets, $tasks = null) {

        $result = $this->restProxy->createJob($job, $inputAssets, $tasks);

        $this->job[$result->getId()] = $result;

        return $result;
    }

    public function createAssetWithFile() {
        $asset = new Asset(Asset::OPTIONS_NONE);
        $asset->setName(TestResources::MEDIA_SERVICES_ASSET_NAME . $this->createSuffix());
        $asset = $this->createAsset($asset);

        $access = new AccessPolicy(TestResources::MEDIA_SERVICES_ACCESS_POLICY_NAME . $this->createSuffix());
        $access->setDurationInMinutes(30);
        $access->setPermissions(AccessPolicy::PERMISSIONS_WRITE);
        $access = $this->createAccessPolicy($access);

        $locator = new Locator($asset, $access, Locator::TYPE_SAS);
        $locator->setName(TestResources::MEDIA_SERVICES_LOCATOR_NAME . $this->createSuffix());
        $locator->setStartTime(new \DateTime('now -5 minutes'));
        $locator = $this->createLocator($locator);

        $fileName = TestResources::MEDIA_SERVICES_DUMMY_FILE_NAME;
        $this->restProxy->uploadAssetFile($locator, $fileName, TestResources::MEDIA_SERVICES_DUMMY_FILE_CONTENT);
        $this->restProxy->createFileInfos($asset);

        return $asset;
    }

    public function createAssetWithFilesForStream() {

        $asset = new Asset(Asset::OPTIONS_NONE);
        $asset->setName(TestResources::MEDIA_SERVICES_ASSET_NAME . $this->createSuffix());
        $asset = $this->createAsset($asset);

        $access = new AccessPolicy(TestResources::MEDIA_SERVICES_ACCESS_POLICY_NAME . $this->createSuffix());
        $access->setDurationInMinutes(30);
        $access->setPermissions(AccessPolicy::PERMISSIONS_WRITE);
        $access = $this->createAccessPolicy($access);

        $locator = new Locator($asset, $access, Locator::TYPE_SAS);
        $locator->setName(TestResources::MEDIA_SERVICES_LOCATOR_NAME . $this->createSuffix());
        $locator->setStartTime(new \DateTime('now -5 minutes'));
        $locator = $this->createLocator($locator);


        $firstFile = TestResources::getSmallIsm();
        $secondFile = TestResources::getSmallIsmc();
        $this->restProxy->uploadAssetFile($locator, TestResources::MEDIA_SERVICES_ISM_FILE_NAME, $firstFile);
        $this->restProxy->uploadAssetFile($locator, TestResources::MEDIA_SERVICES_ISMC_FILE_NAME, $secondFile);
        $this->restProxy->createFileInfos($asset);

        return $asset;
    }

    public function getOutputAssetName(){

        $outputAssetName = TestResources::MEDIA_SERVICES_OUTPUT_ASSET_NAME . $this->createSuffix();
        $this->outputAssets[] = $outputAssetName;

        return $outputAssetName;
    }

    public function createJobWithTasks($name) {

        $mediaProcessor = $this->restProxy->getLatestMediaProcessor(TestResources::MEDIA_SERVICES_PROCESSOR_NAME);
        $inputAsset = $this->createAssetWithFile();

        $taskBody = TestResources::getMediaServicesTask($this->getOutputAssetName());
        $task = new Task($taskBody, $mediaProcessor->getId(), TaskOptions::NONE);
        $task->setConfiguration(TestResources::MEDIA_SERVICES_TASK_COFIGURATION);

        $job = new Job();
        $job->setName($name);

        $jobResult = $this->createJob($job, array($inputAsset), array($task));
        $this->job[$jobResult->getId()] = $jobResult;

        return $jobResult;
    }

    public function createJobTemplate($jobTemplate, $taskTemplates) {

        $jobTempl = $this->restProxy->createJobTemplate($jobTemplate, $taskTemplates);
        $this->jobTemplate[$jobTempl->getId()] = $jobTempl;

        return $jobTempl;
    }

    public function createJobTemplateWithTasks($name) {

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

        foreach($this->locator as $loc) {
            $this->restProxy->deleteLocator($loc);
        }

        foreach($this->assets as $asset) {
            $this->restProxy->deleteAsset($asset);
        }

        foreach($this->accessPolicy as $access) {
            $this->restProxy->deleteAccessPolicy($access);
        }

        foreach($this->jobTemplate as $jobTemplate) {
            $this->restProxy->deleteJobTemplate($jobTemplate);
        }

        foreach($this->job as $job) {
            $this->deleteJob($job);
        }

        $assets = $this->restProxy->getAssetList();
        foreach($assets as $asset){
            if (in_array($asset->getName(), $this->outputAssets)) {
                $this->restProxy->deleteAsset($asset);
            }
        }
    }

    protected function createSuffix() {
        return sprintf('-%04x', mt_rand(0, 65535));
    }

    public function deleteJob($job){
        $status = $this->restProxy->getJobStatus($job);
        while ($status != Job::STATE_FINISHED && $status != Job::STATE_ERROR && $status != Job::STATE_CANCELED) {
            sleep(1);
            $status = $this->restProxy->getJobStatus($job);
        }
        $this->restProxy->deleteJob($job->getId());
        unset($this->job[$job->getId()]);
    }
}
