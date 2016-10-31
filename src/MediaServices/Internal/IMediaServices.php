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

namespace WindowsAzure\MediaServices\Internal;

use WindowsAzure\Common\Internal\FilterableService;
use WindowsAzure\MediaServices\Models\Asset;
use WindowsAzure\MediaServices\Models\Job;
use WindowsAzure\MediaServices\Models\JobTemplate;
use WindowsAzure\MediaServices\Models\AccessPolicy;
use WindowsAzure\MediaServices\Models\Locator;
use WindowsAzure\MediaServices\Models\AssetFile;
use WindowsAzure\MediaServices\Models\IngestManifest;
use WindowsAzure\MediaServices\Models\IngestManifestAsset;
use WindowsAzure\MediaServices\Models\IngestManifestFile;
use WindowsAzure\MediaServices\Models\ContentKeyAuthorizationPolicy;
use WindowsAzure\MediaServices\Models\ContentKeyAuthorizationPolicyOption;
use WindowsAzure\MediaServices\Models\AssetDeliveryPolicy;
use WindowsAzure\MediaServices\Models\EncodingReservedUnit;
use WindowsAzure\MediaServices\Models\MediaProcessor;
use WindowsAzure\MediaServices\Models\StorageAccount;
use WindowsAzure\MediaServices\Models\Task;
use WindowsAzure\MediaServices\Models\TaskTemplate;

/**
 * This interface has all REST APIs provided by Windows Azure for Media Services.
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
interface IMediaServices extends FilterableService
{
    /**
     * Create new asset.
     *
     * @param Asset $asset Asset data
     *
     * @return Asset Created asset
     */
    public function createAsset(Asset $asset);

    /**
     * Get asset.
     *
     * @param Asset|string $asset Asset data or asset Id
     *
     * @return Asset
     */
    public function getAsset($asset);

    /**
     * Get asset list.
     *
     * @param array $queryParams
     *
     * @return Asset[]
     */
    public function getAssetList(array $queryParams = []);

    /**
     * Get asset locators.
     *
     * @param Asset|string $asset Asset data or asset Id
     *
     * @return Locator[]
     */
    public function getAssetLocators($asset);

    /**
     * Get parent assets of asset.
     *
     * @param Asset|string $asset Asset data or asset Id
     *
     * @return array of Models\Asset
     */
    public function getAssetParentAssets($asset);

    /**
     * Get assetFiles of asset.
     *
     * @param Asset|string $asset Asset data or asset Id
     *
     * @return AssetFile[]
     */
    public function getAssetAssetFileList($asset);

    /**
     * Get storage account of asset.
     *
     * @param Asset|string $asset Asset data or asset Id
     *
     * @return StorageAccount
     */
    public function getAssetStorageAccount($asset);

    /**
     * Update asset.
     *
     * @param Asset $asset New asset data with valid id
     */
    public function updateAsset(Asset $asset);

    /**
     * Delete asset.
     *
     * @param Asset|string $asset Asset data or asset Id
     */
    public function deleteAsset($asset);

    /**
     * Create new access policy.
     *
     * @param AccessPolicy $accessPolicy Access  policy data
     *
     * @return AccessPolicy
     */
    public function createAccessPolicy(AccessPolicy $accessPolicy);

    /**
     * Get AccessPolicy.
     *
     * @param AccessPolicy|string $accessPolicy A AccessPolicy data or AccessPolicy Id
     *
     * @return AccessPolicy
     */
    public function getAccessPolicy($accessPolicy);

    /**
     * Get list of AccessPolicies.
     *
     * @return AccessPolicy[]
     */
    public function getAccessPolicyList();

    /**
     * Delete access policy.
     *
     * @param AccessPolicy|string $accessPolicy A Access policy data or access policy Id
     */
    public function deleteAccessPolicy($accessPolicy);

    /**
     * Create new locator.
     *
     * @param Locator $locator Locator data
     *
     * @return Locator
     */
    public function createLocator(Locator $locator);

    /**
     * Get Locator.
     *
     * @param Locator|string $locator Locator data or locator Id
     *
     * @return Locator
     */
    public function getLocator($locator);

    /**
     * Get Locator access policy.
     *
     * @param Locator|string $locator Locator data or locator Id
     *
     * @return Locator
     */
    public function getLocatorAccessPolicy($locator);

    /**
     * Get Locator asset.
     *
     * @param Locator|string $locator Locator data or locator Id
     *
     * @return Locator
     */
    public function getLocatorAsset($locator);

    /**
     * Get list of Locators.
     *
     * @return Locator[]
     */
    public function getLocatorList();

    /**
     * Update locator.
     *
     * @param Locator $locator New locator data with valid id
     */
    public function updateLocator(Locator $locator);

    /**
     * Delete locator.
     *
     * @param Locator|string $locator Asset data or asset Id
     */
    public function deleteLocator($locator);

    /**
     * Generate file info for all files in asset.
     *
     * @param Asset|string $asset Asset data or asset Id
     */
    public function createFileInfos($asset);

    /**
     * Get asset file.
     *
     * @param AssetFile|string $assetFile AssetFile data or assetFile Id
     *
     * @return AssetFile
     */
    public function getAssetFile($assetFile);

    /**
     * Get list of all asset files.
     *
     * @return AssetFile[]
     */
    public function getAssetFileList();

    /**
     * Update asset file.
     *
     * @param AssetFile $assetFile New AssetFile data
     */
    public function updateAssetFile(AssetFile $assetFile);

    /**
     * Upload asset file to storage.
     *
     * @param Locator $locator Write locator for file upload
     * @param string  $name    Uploading filename
     * @param string  $body    Uploading content
     */
    public function uploadAssetFile(Locator $locator, $name, $body);

    /**
     * Create a job.
     *
     * @param Job   $job         Job data
     * @param array $inputAssets Input assets list
     * @param array $tasks       Performed tasks array (optional)
     *
     * @return Job
     */
    public function createJob(Job $job, array $inputAssets, array $tasks = null);

    /**
     * Get Job.
     *
     * @param Job|string $job Job data or job Id
     *
     * @return Job
     */
    public function getJob($job);

    /**
     * Get list of Jobs.
     *
     * @return Job[]
     */
    public function getJobList();

    /**
     * Get status of a job.
     *
     * @param Job|string $job Job data or job Id
     *
     * @return string
     */
    public function getJobStatus($job);

    /**
     * Get job tasks.
     *
     * @param Job|string $job Job data or job Id
     *
     * @return Task[]
     */
    public function getJobTasks($job);

    /**
     * Get job input assets.
     *
     * @param Job|string $job Job data or job Id
     *
     * @return Asset[]
     */
    public function getJobInputMediaAssets($job);

    /**
     * Get job output assets.
     *
     * @param Job|string $job Job data or job Id
     *
     * @return Asset[]
     */
    public function getJobOutputMediaAssets($job);

    /**
     * Cancel a job.
     *
     * @param Job|string $job Job data or job Id
     */
    public function cancelJob($job);

    /**
     * Delete job.
     *
     * @param Job|string $job Job data or job Id
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
     * @param JobTemplate $jobTemplate   Job template data
     * @param array       $taskTemplates Performed tasks template array
     *
     * @return JobTemplate
     */
    public function createJobTemplate(JobTemplate $jobTemplate, array $taskTemplates);

    /**
     * Get job template.
     *
     * @param JobTemplate|string $jobTemplate Job template data or jobTemplate Id
     *
     * @return JobTemplate
     */
    public function getJobTemplate($jobTemplate);

    /**
     * Get list of Job Templates.
     *
     * @return JobTemplate[]
     */
    public function getJobTemplateList();

    /**
     * Get task templates for job template.
     *
     * @param JobTemplate|string $jobTemplate Job template data or jobTemplate Id
     *
     * @return TaskTemplate[]
     */
    public function getJobTemplateTaskTemplateList($jobTemplate);

    /**
     * Delete job template.
     *
     * @param JobTemplate|string $jobTemplate Job template data or job template Id
     */
    public function deleteJobTemplate($jobTemplate);

    /**
     * Get list of task templates.
     *
     * @return TaskTemplate[]
     */
    public function getTaskTemplateList();

    /**
     * Get list of all media processors asset files.
     *
     * @return MediaProcessor[]
     */
    public function getMediaProcessors();

    /**
     * Get media processor by name with latest version.
     *
     * @param string $name Media processor name
     *
     * @return MediaProcessor
     */
    public function getLatestMediaProcessor($name);

    /**
     * Create new IngestManifest.
     *
     * @param IngestManifest $ingestManifest An IngestManifest data
     *
     * @return IngestManifest
     */
    public function createIngestManifest(IngestManifest $ingestManifest);

    /**
     * Get IngestManifest.
     *
     * @param IngestManifest|string $ingestManifest An IngestManifest data or
     *                                              IngestManifest Id
     *
     * @return IngestManifest
     */
    public function getIngestManifest($ingestManifest);

    /**
     * Get IngestManifest list.
     *
     * @return IngestManifest[]
     */
    public function getIngestManifestList();

    /**
     * Get IngestManifest assets.
     *
     * @param IngestManifest|string $ingestManifest An IngestManifest data or
     *                                              IngestManifest Id
     *
     * @return IngestManifestAsset[]
     */
    public function getIngestManifestAssets($ingestManifest);

    /**
     * Get pending assets of IngestManifest.
     *
     * @param IngestManifest|string $ingestManifest An IngestManifest data or
     *                                              IngestManifest Id
     *
     * @return IngestManifestAsset[]
     */
    public function getPendingIngestManifestAssets($ingestManifest);

    /**
     * Get storage account of IngestManifest.
     *
     * @param IngestManifest|string $ingestManifest An IngestManifest data
     *                                              or IngestManifest Id
     *
     * @return StorageAccount
     */
    public function getIngestManifestStorageAccount($ingestManifest);

    /**
     * Update IngestManifest.
     *
     * @param IngestManifest $ingestManifest New IngestManifest data with valid id
     */
    public function updateIngestManifest(IngestManifest $ingestManifest);

    /**
     * Delete IngestManifest.
     *
     * @param IngestManifest|string $ingestManifest An IngestManifest data or
     *                                              IngestManifest Id
     */
    public function deleteIngestManifest($ingestManifest);

    /**
     * Create new IngestManifestAsset.
     *
     * @param IngestManifestAsset $ingestManifestAsset An IngestManifestAsset data
     * @param Asset               $asset               An Asset data to be linked with IngestManifestAsset
     *
     * @return IngestManifestAsset
     */
    public function createIngestManifestAsset(IngestManifestAsset $ingestManifestAsset, Asset $asset);

    /**
     * Get IngestManifestAsset.
     *
     * @param IngestManifestAsset|string $ingestManifestAsset An
     *                                                        IngestManifestAsset data or IngestManifestAsset Id
     *
     * @return IngestManifestAsset
     */
    public function getIngestManifestAsset($ingestManifestAsset);

    /**
     * Get list of IngestManifestAsset.
     *
     * @return IngestManifestAsset[]
     */
    public function getIngestManifestAssetList();

    /**
     * Get IngestManifestFiles of IngestManifestAsset.
     *
     * @param IngestManifestAsset|string $ingestManifestAsset An
     *                                                        IngestManifestAsset data or IngestManifestAsset Id
     *
     * @return IngestManifestFile[]
     */
    public function getIngestManifestAssetFiles($ingestManifestAsset);

    /**
     * Delete IngestManifestAsset.
     *
     * @param IngestManifestAsset|string $ingestManifestAsset An IngestManifestAsset data or IngestManifestAsset Id
     */
    public function deleteIngestManifestAsset($ingestManifestAsset);

    /**
     * Create new IngestManifestFile.
     *
     * @param IngestManifestFile $ingestManifestFile An IngestManifestFile data
     *
     * @return IngestManifestFile
     */
    public function createIngestManifestFile(IngestManifestFile $ingestManifestFile);

    /**
     * Get IngestManifestFile.
     *
     * @param IngestManifestFile|string $ingestManifestFile An IngestManifestFile data or IngestManifestFile Id
     *
     * @return IngestManifestFile
     */
    public function getIngestManifestFile($ingestManifestFile);

    /**
     * Get list of IngestManifestFile.
     *
     * @return IngestManifestFile[]
     */
    public function getIngestManifestFileList();

    /**
     * Delete IngestManifestFile.
     *
     * @param IngestManifestFile|string $ingestManifestFile An IngestManifestFile data or IngestManifestFile Id
     */
    public function deleteIngestManifestFile($ingestManifestFile);

    /**
     * Create new content key authorization policy.
     *
     * @param ContentKeyAuthorizationPolicy $contentKeyAuthorizationPolicy ContentKeyAuthorizationPolicy data
     *
     * @return ContentKeyAuthorizationPolicy Created ContentKeyAuthorizationPolicy
     */
    public function createContentKeyAuthorizationPolicy(ContentKeyAuthorizationPolicy $contentKeyAuthorizationPolicy);

    /**
     * Get content key authorization policy.
     *
     * @param ContentKeyAuthorizationPolicy|string $contentKeyAuthorizationPolicy ContentKeyAuthorizationPolicies data
     *                                                                            or content key authorization policy Id
     *
     * @return ContentKeyAuthorizationPolicy
     */
    public function getContentKeyAuthorizationPolicy($contentKeyAuthorizationPolicy);

    /**
     * Get content key authorization policies list.
     *
     * @return array of Models\ContentKeyAuthorizationPolicy
     */
    public function getContentKeyAuthorizationPolicyList();

    /**
     * Update content key authorization policy.
     *
     * @param ContentKeyAuthorizationPolicy $contentKeyAuthorizationPolicy New content key authorization policy data
     *                                                                     with valid id
     */
    public function updateContentKeyAuthorizationPolicy(ContentKeyAuthorizationPolicy $contentKeyAuthorizationPolicy);

    /**
     * Delete content key authorization policy.
     *
     * @param ContentKeyAuthorizationPolicy|string $contentKeyAuthorizationPolicy ContentKeyAuthorizationPolicy data or
     *                                                                            content key authorization policy Id
     */
    public function deleteContentKeyAuthorizationPolicy($contentKeyAuthorizationPolicy);

    /**
     * Create new content key authorization options.
     *
     * @param ContentKeyAuthorizationPolicyOption $contentKeyAuthorizationOptions data
     *
     * @return ContentKeyAuthorizationPolicyOption Created ContentKeyAuthorizationPolicyOption
     */
    public function createContentKeyAuthorizationPolicyOption(
        ContentKeyAuthorizationPolicyOption $contentKeyAuthorizationOptions
    );

    /**
     * Get content key authorization option by id.
     *
     * @param ContentKeyAuthorizationPolicy|string $contentKeyAuthorizationOptions ContentKeyAuthorizationPolicies data
     *                                                                             or content key authorization policy
     *                                                                             Id
     *
     * @return ContentKeyAuthorizationPolicyOption
     */
    public function getContentKeyAuthorizationPolicyOption($contentKeyAuthorizationOptions);

    /**
     * Get content key authorization options.
     *
     * @return array of Models\ContentKeyAuthorizationPolicyOption
     */
    public function getContentKeyAuthorizationPolicyOptionList();

    /**
     * Update content key authorization options.
     *
     * @param ContentKeyAuthorizationPolicyOption $contentKeyAuthorizationOptions New content key authorization options
     *                                                                            data with valid id
     */
    public function updateContentKeyAuthorizationPolicyOption(
        ContentKeyAuthorizationPolicyOption $contentKeyAuthorizationOptions
    );

    /**
     * Delete content key authorization policy.
     *
     * @param ContentKeyAuthorizationPolicy|string $contentKeyAuthorizationOptions ContentKeyAuthorizationPolicy data or
     *                                                                             content key authorization policy Id
     */
    public function deleteContentKeyAuthorizationPolicyOption($contentKeyAuthorizationOptions);

    /**
     * Get ContentKeyAuthorizationPolicy linked Options.
     *
     * @param ContentKeyAuthorizationPolicy|string $policy ContentKeyAuthorizationPolicy data or
     *                                                     ContentKeyAuthorizationPolicy Id
     *
     * @return array
     */
    public function getContentKeyAuthorizationPolicyLinkedOptions($policy);

    /**
     * Link ContentKeyAuthorizationPolicyOption to ContentKeyAuthorizationPolicy.
     *
     * @param ContentKeyAuthorizationPolicyOption|string $options ContentKeyAuthorizationPolicyOption to link a
     *                                                            ContentKeyAuthorizationPolicy or
     *                                                            ContentKeyAuthorizationPolicyOption id
     *
     * @param string                                     $policy  ContentKeyAuthorizationPolicy to link or
     *                                                            ContentKeyAuthorizationPolicy id
     */
    public function linkOptionToContentKeyAuthorizationPolicy($options, $policy);

    /**
     * Remove ContentKeyAuthorizationPolicyOption from ContentKeyAuthorizationPolicy.
     *
     * @param ContentKeyAuthorizationPolicyOption|string $options ContentKeyAuthorizationPolicyOption to remove from
     *                                                            ContentKeyAuthorizationPolicy or
     *                                                            ContentKeyAuthorizationPolicyOption id
     *
     * @param ContentKeyAuthorizationPolicy|string       $policy  ContentKeyAuthorizationPolicy to remove or
     *                                                            ContentKeyAuthorizationPolicy id
     */
    public function removeOptionsFromContentKeyAuthorizationPolicy($options, $policy);

    /**
     * Create new asset delivery policy.
     *
     * @param AssetDeliveryPolicy $assetDeliveryPolicy AssetDeliveryPolicy data
     *
     * @return AssetDeliveryPolicy Created AssetDeliveryPolicy
     */
    public function createAssetDeliveryPolicy(AssetDeliveryPolicy $assetDeliveryPolicy);

    /**
     * Get asset delivery policy.
     *
     * @param $assetDeliveryPolicy
     *
     * @return AssetDeliveryPolicy
     */
    public function getAssetDeliveryPolicy($assetDeliveryPolicy);

    /**
     * Get asset delivery policies list.
     *
     * @return AssetDeliveryPolicy[]
     */
    public function getAssetDeliveryPolicyList();

    /**
     * Update asset delivery policy.
     *
     * @param AssetDeliveryPolicy $assetDeliveryPolicy New asset delivery policy data with valid id
     */
    public function updateAssetDeliveryPolicy(AssetDeliveryPolicy $assetDeliveryPolicy);

    /**
     * Delete asset delivery policy.
     *
     * @param AssetDeliveryPolicy|string $assetDeliveryPolicy AssetDeliveryPolicy data or asset delivery policy Id
     */
    public function deleteAssetDeliveryPolicy($assetDeliveryPolicy);

    /**
     * Get AssetDeliveryPolicy list linked to an Asset.
     *
     * @param Asset|string $asset Asset data or Asset Id to retrieve the linked delivery policies
     *
     * @return array
     */
    public function getAssetLinkedDeliveryPolicy($asset);

    /**
     * Link AssetDeliveryPolicy to Asset.
     *
     * @param Asset|string               $asset  Asset to link a AssetDeliveryPolicy or Asset id
     * @param AssetDeliveryPolicy|string $policy DeliveryPolicy to link or DeliveryPolicy id
     */
    public function linkDeliveryPolicyToAsset($asset, $policy);

    /**
     * Remove AssetDeliveryPolicy from Asset.
     *
     * @param Asset|string               $asset  Asset to remove a AssetDeliveryPolicy or Asset id
     * @param AssetDeliveryPolicy|string $policy DeliveryPolicy to remove or DeliveryPolicy id
     */
    public function removeDeliveryPolicyFromAsset($asset, $policy);

    /**
     * Link AssetDeliveryPolicy to Asset.
     *
     * @param Asset|string               $contentKey             Asset to link a AssetDeliveryPolicy or Asset id
     * @param AssetDeliveryPolicy|string $contentKeyDeliveryType DeliveryPolicy to link or DeliveryPolicy id
     */
    public function getKeyDeliveryUrl($contentKey, $contentKeyDeliveryType);

    /**
     * Get encoding reserved units settings.
     *
     * @return EncodingReservedUnit
     */
    public function getEncodingReservedUnit();

    /**
     * Update encoding reserved units settings.
     *
     * @param EncodingReservedUnit $encodingReservedUnit Update data valid idli
     */
    public function updateEncodingReservedUnit(EncodingReservedUnit $encodingReservedUnit);
}
