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
 * @package   WindowsAzure\MediaServices\Internal
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */

namespace WindowsAzure\MediaServices\Internal;
use WindowsAzure\Common\Internal\FilterableService;

/**
 * This interface has all REST APIs provided by Windows Azure for Media Services.
 *
 * @category  Microsoft
 * @package   WindowsAzure\MediaServices\Internal
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: 0.4.1_2015-03
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
interface IMediaServices extends FilterableService
{
    /**
     * Create new asset
     *
     * @param WindowsAzure\MediaServices\Models\Asset $asset Asset data
     *
     * @return WindowsAzure\MediaServices\Models\Asset Created asset
     */
    public function createAsset($asset);

    /**
     * Get asset
     *
     * @param WindowsAzure\MediaServices\Models\Asset|string $asset Asset data or
     * asset Id
     *
     * @return WindowsAzure\MediaServices\Models\Asset
     */
    public function getAsset($asset);

    /**
     * Get asset list
     *
     * @return array of Models\Asset
     */
    public function getAssetList();

    /**
     * Get asset locators
     *
     * @param WindowsAzure\MediaServices\Models\Asset|string $asset Asset data or
     * asset Id
     *
     * @return array of Models\Locator
     */
    public function getAssetLocators($asset);

    /**
     * Get parent assets of asset
     *
     * @param WindowsAzure\MediaServices\Models\Asset|string $asset Asset data or
     * asset Id
     *
     * @return array of Models\Asset
     */
    public function getAssetParentAssets($asset);

    /**
     * Get assetFiles of asset
     *
     * @param WindowsAzure\MediaServices\Models\Asset|string $asset Asset data or
     * asset Id
     *
     * @return array of Models\AssetFile
     */
    public function getAssetAssetFileList($asset);

    /**
     * Get storage account of asset
     *
     * @param WindowsAzure\MediaServices\Models\Asset|string $asset Asset data or
     * asset Id
     *
     * @return WindowsAzure\MediaServices\Models\StorageAccount
     */
    public function getAssetStorageAccount($asset);

    /**
     * Update asset
     *
     * @param WindowsAzure\MediaServices\Models\Asset $asset New asset data with
     * valid id
     *
     * @return none
     */
    public function updateAsset($asset);

    /**
     * Delete asset
     *
     * @param WindowsAzure\MediaServices\Models\Asset|string $asset Asset data or
     * asset Id
     *
     * @return none
     */
    public function deleteAsset($asset);

    /**
     * Create new access policy
     *
     * @param WindowsAzure\MediaServices\Models\AccessPolicy $accessPolicy Access
     * policy data
     *
     * @return WindowsAzure\MediaServices\Models\AccessPolicy
     */
    public function createAccessPolicy($accessPolicy);

    /**
     * Get AccessPolicy.
     *
     * @param WindowsAzure\MediaServices\Models\AccessPolicy|string $accessPolicy A
     * AccessPolicy data or AccessPolicy Id
     *
     * @return WindowsAzure\MediaServices\Models\AccessPolicy
     */
    public function getAccessPolicy($accessPolicy);

    /**
     * Get list of AccessPolicies.
     *
     * @return array of Models\AccessPolicy
     */
    public function getAccessPolicyList();

    /**
     * Delete access policy
     *
     * @param WindowsAzure\MediaServices\Models\AccessPolicy|string $accessPolicy A
     * Access policy data or access policy Id
     *
     * @return none
     */
    public function deleteAccessPolicy($accessPolicy);

    /**
     * Create new locator
     *
     * @param WindowsAzure\MediaServices\Models\Locator $locator Locator data
     *
     * @return WindowsAzure\MediaServices\Models\Locator
     */
    public function createLocator($locator);

    /**
     * Get Locator.
     *
     * @param WindowsAzure\MediaServices\Models\Locator|string $locator Locator data
     * or locator Id
     *
     * @return WindowsAzure\MediaServices\Models\Locator
     */
    public function getLocator($locator);

    /**
     * Get Locator access policy.
     *
     * @param WindowsAzure\MediaServices\Models\Locator|string $locator Locator data
     * or locator Id
     *
     * @return WindowsAzure\MediaServices\Models\Locator
     */
    public function getLocatorAccessPolicy($locator);

    /**
     * Get Locator asset.
     *
     * @param WindowsAzure\MediaServices\Models\Locator|string $locator Locator data
     * or locator Id
     *
     * @return WindowsAzure\MediaServices\Models\Locator
     */
    public function getLocatorAsset($locator);

    /**
     * Get list of Locators.
     *
     * @return array of Models\Locator
     */
    public function getLocatorList();

    /**
     * Update locator
     *
     * @param WindowsAzure\MediaServices\Models\Locator $locator New locator data
     * with valid id
     *
     * @return none
     */
    public function updateLocator($locator);

    /**
     * Delete locator
     *
     * @param WindowsAzure\MediaServices\Models\Locator|string $locator Asset data
     * or asset Id
     *
     * @return none
     */
    public function deleteLocator($locator);

    /**
     * Generate file info for all files in asset
     *
     * @param WindowsAzure\MediaServices\Models\Asset|string $asset Asset data or
     * asset Id
     *
     * @return none
     */
    public function createFileInfos($asset);

    /**
     * Get asset file.
     *
     * @param WindowsAzure\MediaServices\Models\AssetFile|string $assetFile AssetFile
     * data or assetFile Id
     *
     * @return WindowsAzure\MediaServices\Models\AssetFile
     */
    public function getAssetFile($assetFile);


    /**
     * Get list of all asset files.
     *
     * @return array of Models\AssetFile
     */
    public function getAssetFileList();

    /**
     * Update asset file
     *
     * @param WindowsAzure\MediaServices\Models\AssetFile $assetFile New AssetFile
     * data
     *
     * @return none
     */
    public function updateAssetFile($assetFile);

    /**
     * Upload asset file to storage.
     *
     * @param WindowsAzure\MediaServices\Models\Locator $locator Write locator for
     * file upload
     *
     * @param string                                    $name    Uploading filename
     * @param string                                    $body    Uploading content
     *
     * @return none
     */
    public function uploadAssetFile($locator, $name, $body);

    /**
     * Create a job.
     *
     * @param WindowsAzure\MediaServices\Models\Job $job         Job data
     * @param array                                 $inputAssets Input assets list
     * @param array                                 $tasks       Performed tasks
     * array (optional)
     *
     * @return Models\Job
     */
    public function createJob($job, $inputAssets, $tasks = null);

    /**
     * Get Job.
     *
     * @param WindowsAzure\MediaServices\Models\Job|string $job Job data or job Id
     *
     * @return WindowsAzure\MediaServices\Models\Job
     */
    public function getJob($job);

    /**
     * Get list of Jobs.
     *
     * @return array of Models\Job
     */
    public function getJobList();

    /**
     * Get status of a job
     *
     * @param WindowsAzure\MediaServices\Models\Job|string $job Job data or job Id
     *
     * @return string
     */
    public function getJobStatus($job);

    /**
     * Get job tasks.
     *
     * @param WindowsAzure\MediaServices\Models\Job|string $job Job data or job Id
     *
     * @return array of Models\Task
     */
    public function getJobTasks($job);


    /**
     * Get job input assets.
     *
     * @param WindowsAzure\MediaServices\Models\Job|string $job Job data or job Id
     *
     * @return array of Models\Asset
     */
    public function getJobInputMediaAssets($job);

    /**
     * Get job output assets.
     *
     * @param WindowsAzure\MediaServices\Models\Job|string $job Job data or job Id
     *
     * @return array of Models\Asset
     */
    public function getJobOutputMediaAssets($job);

    /**
     * Cancel a job
     *
     * @param WindowsAzure\MediaServices\Models\Job|string $job Job data or job Id
     *
     * @return none
     */
    public function cancelJob($job);

    /**
     * Delete job
     *
     * @param WindowsAzure\MediaServices\Models\Job|string $job Job data or job Id
     *
     * @return none
     */
    public function deleteJob($job);

    /**
     * Get list of tasks.
     *
     * @return array of Models\Task
     */
    public function getTaskList();

    /**
     * Create a job.
     *
     * @param WindowsAzure\MediaServices\Models\JobTemplate $jobTemplate   Job
     * template data
     *
     * @param array                                         $taskTemplates Performed
     * tasks template array
     *
     * @return Models\JobTemplate
     */
    public function createJobTemplate($jobTemplate, $taskTemplates);

    /**
     * Get job template.
     *
     * @param WindowsAzure\MediaServices\Models\JobTemplate|string $jobTemplate Job
     * template data or jobTemplate Id
     *
     * @return WindowsAzure\MediaServices\Models\JobTemplate
     */
    public function getJobTemplate($jobTemplate);

    /**
     * Get list of Job Templates.
     *
     * @return array of Models\JobTemplate
     */
    public function getJobTemplateList();

    /**
     * Get task templates for job template.
     *
     * @param WindowsAzure\MediaServices\Models\JobTemplate|string $jobTemplate Job
     * template data or jobTemplate Id
     *
     * @return array of Models\TaskTemplate
     */
    public function getJobTemplateTaskTemplateList($jobTemplate);


    /**
     * Delete job template
     *
     * @param WindowsAzure\MediaServices\Models\JobTemplate|string $jobTemplate Job
     * template data or job template Id
     *
     * @return none
     */
    public function deleteJobTemplate($jobTemplate);

    /**
     * Get list of task templates.
     *
     * @return array of Models\Tasktemplate
     */
    public function getTaskTemplateList();

    /**
     * Get list of all media processors asset files
     *
     * @return array of Models\MediaProcessor
     */
    public function getMediaProcessors();

    /**
     * Get media processor by name with latest version
     *
     * @param string $name Media processor name
     *
     * @return WindowsAzure\MediaServices\Models\JobTemplate\MediaProcessor
     */
    public function getLatestMediaProcessor($name);

    /**
     * Create new IngestManifest
     *
     * @param Models\IngestManifest $ingestManifest An IngestManifest data
     *
     * @return WindowsAzure\MediaServices\Models\IngestManifest
     */
    public function createIngestManifest($ingestManifest);

    /**
     * Get IngestManifest
     *
     * @param Models\IngestManifest|string $ingestManifest An IngestManifest data or
     * IngestManifest Id
     *
     * @return WindowsAzure\MediaServices\Models\IngestManifest
     */
    public function getIngestManifest($ingestManifest);

    /**
     * Get IngestManifest list
     *
     * @return array of Models\IngestManifest
     */
    public function getIngestManifestList();

    /**
     * Get IngestManifest assets
     *
     * @param Models\IngestManifest|string $ingestManifest An IngestManifest data or
     * IngestManifest Id
     *
     * @return array of Models\IngestManifestAsset
     */
    public function getIngestManifestAssets($ingestManifest);

    /**
     * Get pending assets of IngestManifest
     *
     * @param Models\IngestManifest|string $ingestManifest An IngestManifest data or
     * IngestManifest Id
     *
     * @return array of Models\IngestManifestAsset
     */
    public function getPendingIngestManifestAssets($ingestManifest);

    /**
     * Get storage account of IngestManifest
     *
     * @param Models\IngestManifest|string $ingestManifest An IngestManifest data
     * or IngestManifest Id
     *
     * @return WindowsAzure\MediaServices\Models\StorageAccount
     */
    public function getIngestManifestStorageAccount($ingestManifest);

    /**
     * Update IngestManifest
     *
     * @param Models\IngestManifest $ingestManifest New IngestManifest data with
     * valid id
     *
     * @return none
     */
    public function updateIngestManifest($ingestManifest);

    /**
     * Delete IngestManifest
     *
     * @param Models\IngestManifest|string $ingestManifest An IngestManifest data or
     * IngestManifest Id
     *
     * @return none
     */
    public function deleteIngestManifest($ingestManifest);

    /**
     * Create new IngestManifestAsset
     *
     * @param Models\IngestManifestAsset $ingestManifestAsset An IngestManifestAsset
     * data
     *
     * @param Models\Asset               $asset               An Asset data to be
     * linked with IngestManifestAsset
     *
     * @return WindowsAzure\MediaServices\Models\IngestManifestAsset
     */
    public function createIngestManifestAsset($ingestManifestAsset, $asset);

    /**
     * Get IngestManifestAsset.
     *
     * @param Models\IngestManifestAsset|string $ingestManifestAsset An
     * IngestManifestAsset data or IngestManifestAsset Id
     *
     * @return WindowsAzure\MediaServices\Models\IngestManifestAsset
     */
    public function getIngestManifestAsset($ingestManifestAsset);

    /**
     * Get list of IngestManifestAsset.
     *
     * @return array of Models\IngestManifestAsset
     */
    public function getIngestManifestAssetList();

    /**
     * Get IngestManifestFiles of IngestManifestAsset
     *
     * @param Models\IngestManifestAsset|string $ingestManifestAsset An
     * IngestManifestAsset data or IngestManifestAsset Id
     *
     * @return array of Models\IngestManifestFiles
     */
    public function getIngestManifestAssetFiles($ingestManifestAsset);


    /**
     * Delete IngestManifestAsset
     *
     * @param Models\IngestManifestAsset|string $ingestManifestAsset An
     * IngestManifestAsset data or IngestManifestAsset Id
     *
     * @return none
     */
    public function deleteIngestManifestAsset($ingestManifestAsset);

    /**
     * Create new IngestManifestFile
     *
     * @param Models\IngestManifestFile $ingestManifestFile An IngestManifestFile
     * data
     *
     * @return WindowsAzure\MediaServices\Models\IngestManifestFile
     */
    public function createIngestManifestFile($ingestManifestFile);

    /**
     * Get IngestManifestFile.
     *
     * @param Models\IngestManifestFile|string $ingestManifestFile An
     * IngestManifestFile data or IngestManifestFile Id
     *
     * @return WindowsAzure\MediaServices\Models\IngestManifestFile
     */
    public function getIngestManifestFile($ingestManifestFile);

    /**
     * Get list of IngestManifestFile.
     *
     * @return array of Models\IngestManifestFile
     */
    public function getIngestManifestFileList();

    /**
     * Delete IngestManifestFile
     *
     * @param Models\IngestManifestFile|string $ingestManifestFile An
     * IngestManifestFile data or IngestManifestFile Id
     *
     * @return none
     */
    public function deleteIngestManifestFile($ingestManifestFile);
}

