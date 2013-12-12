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
 * @version   Release: 0.3.1_2011-08
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

        return $asset;
    }

    public function getOutputAssetName(){

        $outputAssetName = 'TestOutputAsset' . $this->createSuffix();
        $this->outputAssets[] = $outputAssetName;

        return $outputAssetName;
    }

    public function createJobWithTasks($name) {

        $mediaProcessor = $this->restProxy->getLatestMediaProcessor('Windows Azure Media Encoder');
        $inputAsset = $this->createAssetWithFile();

        $taskBody = '<?xml version="1.0" encoding="utf-8"?><taskBody><inputAsset>JobInputAsset(0)</inputAsset><outputAsset assetCreationOptions="0" assetName="' . $this->getOutputAssetName() . '">JobOutputAsset(0)</outputAsset></taskBody>';
        $task = new Task($taskBody, $mediaProcessor->getId(), TaskOptions::NONE);
        $task->setConfiguration('H.264 HD 720p VBR');

        $job = new Job();
        $job->setName($name);

        $jobResult = $this->createJob($job, array($inputAsset), array($task));
        $this->job[$jobResult->getId()] = $jobResult;

        return $jobResult;
    }

    public function createJobTemplate($name) {

        $mediaProcessor = $this->restProxy->getLatestMediaProcessor('Windows Azure Media Encoder');

        $taskTemplate = new TaskTemplate(1, 1);
        $taskTemplate->setMediaProcessorId($mediaProcessor->getId());
        $taskTemplate->setConfiguration('H.264 HD 720p VBR');

        $jobTemplateBody = '<?xml version="1.0" encoding="utf-8"?><jobTemplate><taskBody taskTemplateId="' . $taskTemplate->getId() . '"><inputAsset>JobInputAsset(0)</inputAsset><outputAsset assetCreationOptions="0" assetName="' . $this->getOutputAssetName() . '">JobOutputAsset(0)</outputAsset></taskBody></jobTemplate>';
        $jobTemplate = new JobTemplate($jobTemplateBody);
        $jobTemplate->setName($name);

        $jobTempl = $this->restProxy->createJobTemplate($jobTemplate, array($taskTemplate));
        $this->jobTemplate[$jobTempl->getId()] = $jobTempl;

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
