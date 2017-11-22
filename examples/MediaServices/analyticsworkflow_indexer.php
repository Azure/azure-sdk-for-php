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
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 *
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
require_once __DIR__.'/../../vendor/autoload.php';

use WindowsAzure\Common\ServicesBuilder;
use WindowsAzure\Common\Internal\MediaServicesSettings;
use WindowsAzure\MediaServices\MediaServicesRestProxy;
use WindowsAzure\MediaServices\Authentication\AzureAdTokenCredentials;
use WindowsAzure\MediaServices\Authentication\AzureAdClientSymmetricKey;
use WindowsAzure\MediaServices\Authentication\AzureAdTokenProvider;
use WindowsAzure\MediaServices\Authentication\AzureEnvironments;
use WindowsAzure\MediaServices\Models\Asset;
use WindowsAzure\MediaServices\Models\AccessPolicy;
use WindowsAzure\MediaServices\Models\Locator;
use WindowsAzure\MediaServices\Models\Task;
use WindowsAzure\MediaServices\Models\Job;
use WindowsAzure\MediaServices\Models\TaskOptions;

// Read user settings from config
include_once 'userconfig.php';

$mediaFileName = __DIR__.'/resources/Azure-Video.wmv';
$destinationPath = __DIR__.'/IndexerOutput';
$indexerTaskPresetTemplate = file_get_contents(__DIR__.'/resources/indexerTaskPresetTemplate.xml');

// Configuration parameters for Indexer task
$title = '';
$description = '';
$language = 'English';
$captionFormats = 'ttml;sami;webvtt';
$generateAIB = 'true';
$generateKeywords = 'true';

echo "Azure SDK for PHP - Media Analytics Sample (Indexer)".PHP_EOL;

// 0 - Instantiate the credentials, the token provider and connect to Azure Media Services
$credentials = new AzureAdTokenCredentials(
    $tenant, new AzureAdClientSymmetricKey($clientId, $clientKey),
    AzureEnvironments::AZURE_CLOUD_ENVIRONMENT());
$provider = new AzureAdTokenProvider($credentials);
$restProxy = ServicesBuilder::getInstance()->createMediaServicesService(new MediaServicesSettings($restApiEndpoint, $provider));

// 1 - Upload the mezzanine
$sourceAsset = uploadFileAndCreateAsset($restProxy, $mediaFileName);

// 2 - Create indexing task configuration based on parameters
$taskConfiguration = sprintf($indexerTaskPresetTemplate, $title, $description, $language, $captionFormats, $generateAIB, $generateKeywords);

// 3 - Run indexing job to generate output asset
$outputAsset = runIndexingJob($restProxy, $sourceAsset, $taskConfiguration);

// 4 - Download output asset files
downloadAssetFiles($restProxy, $outputAsset, $destinationPath);

// Done
echo 'Done!';

////////////////////
// Helper methods //
////////////////////

/**
 * @param MediaServicesRestProxy $restProxy
 * @param $mediaFileName
 * @return Asset
 */
function uploadFileAndCreateAsset(MediaServicesRestProxy $restProxy, $mediaFileName)
{
    // Create an empty "Asset" by specifying the name
    $asset = new Asset(Asset::OPTIONS_NONE);
    $asset->setName('Media File ' . basename($mediaFileName));
    $asset = $restProxy->createAsset($asset);
    $assetId = $asset->getId();

    echo "Asset created: name={$asset->getName()} id={$assetId}".PHP_EOL;

    // Create an Access Policy with Write permissions
    $accessPolicy = new AccessPolicy('UploadAccessPolicy');
    $accessPolicy->setDurationInMinutes(60.0);
    $accessPolicy->setPermissions(AccessPolicy::PERMISSIONS_WRITE);
    $accessPolicy = $restProxy->createAccessPolicy($accessPolicy);

    // Create a SAS Locator for the Asset
    $sasLocator = new Locator($asset,  $accessPolicy, Locator::TYPE_SAS);
    $sasLocator->setStartTime(new \DateTime('now -5 minutes'));
    $sasLocator = $restProxy->createLocator($sasLocator);

    // Get the mezzanine file content
    $fileContent = file_get_contents($mediaFileName);

    echo "Uploading...".PHP_EOL;

    // Use the 'uploadAssetFile' to perform a multi-part upload using the Block Blobs REST API storage operations
    $restProxy->uploadAssetFile($sasLocator, basename($mediaFileName), $fileContent);

    // Notify Media Services that the file upload operation is done to generate the asset file metadata
    $restProxy->createFileInfos($asset);

    echo 'File uploaded: size='.strlen($fileContent).PHP_EOL;

    // Delete the SAS Locator (and Access Policy) for the Asset since we are done uploading files
    $restProxy->deleteLocator($sasLocator);
    $restProxy->deleteAccessPolicy($accessPolicy);

    return $asset;
}

function runIndexingJob(MediaServicesRestProxy $restProxy, Asset $asset, $taskConfiguration)
{
    // Retrieve the latest 'Azure Media Indexer' processor version
    $mediaProcessor = $restProxy->getLatestMediaProcessor('Azure Media Indexer');

    echo "Using Media Processor: {$mediaProcessor->getName()} version {$mediaProcessor->getVersion()}".PHP_EOL;

    // Create the Job; this automatically schedules and runs it
    $outputAssetName = 'Indexer Results '.$asset->getName();
    $outputAssetCreationOption = Asset::OPTIONS_NONE;
    $taskBody = '<?xml version="1.0" encoding="utf-8"?><taskBody><inputAsset>JobInputAsset(0)</inputAsset><outputAsset assetCreationOptions="'.$outputAssetCreationOption.'" assetName="'.$outputAssetName.'">JobOutputAsset(0)</outputAsset></taskBody>';

    $task = new Task($taskBody, $mediaProcessor->getId(), TaskOptions::NONE);
    $task->setName('Indexing Task');
    $task->setConfiguration($taskConfiguration);

    $job = new Job();
    $job->setName('Indexing Job');

    $job = $restProxy->createJob($job, array($asset), array($task));

    echo "Created Job with Id: {$job->getId()}".PHP_EOL;

    // Check to see if the Job has completed
    $result = $restProxy->getJobStatus($job);

    $jobStatusMap = array('Queued', 'Scheduled', 'Processing', 'Finished', 'Error', 'Canceled', 'Canceling');

    while ($result != Job::STATE_FINISHED && $result != Job::STATE_ERROR && $result != Job::STATE_CANCELED) {
        echo "Job status: {$jobStatusMap[$result]}".PHP_EOL;
        sleep(5);
        $result = $restProxy->getJobStatus($job);
    }

    if ($result != Job::STATE_FINISHED) {
        echo "The job has finished with a wrong status: {$jobStatusMap[$result]}".PHP_EOL;
        exit(-1);
    }

    echo "Job Finished!".PHP_EOL;

    // Get output asset
    $outputAssets = $restProxy->getJobOutputMediaAssets($job);
    $outputAsset = $outputAssets[0];

    echo "Output asset: name={$outputAsset->getName()} id={$outputAsset->getId()}".PHP_EOL;

    return $outputAsset;
}

function downloadAssetFiles(MediaServicesRestProxy $restProxy, $asset, $destinationPath)
{
    // Create destination directory if does not exist
    if (!file_exists($destinationPath)) {
        mkdir($destinationPath);
    }

    // Create an Access Policy with Read permissions
    $accessPolicy = new AccessPolicy('DownloadAccessPolicy');
    $accessPolicy->setDurationInMinutes(60.0);
    $accessPolicy->setPermissions(AccessPolicy::PERMISSIONS_READ);
    $accessPolicy = $restProxy->createAccessPolicy($accessPolicy);

    // Create a SAS Locator for the Asset
    $sasLocator = new Locator($asset, $accessPolicy, Locator::TYPE_SAS);
    $sasLocator->setStartTime(new \DateTime('now -5 minutes'));
    $sasLocator = $restProxy->createLocator($sasLocator);

    $files = $restProxy->getAssetAssetFileList($asset);

    // Download Asset Files
    foreach ($files as $file) {
        echo "Downloading {$file->getName()} output file...";
        $restProxy->downloadAssetFile($file, $sasLocator, $destinationPath);
        echo "Done!".PHP_EOL;
    }

    // Clean up Locator and Access Policy
    $restProxy->deleteLocator($sasLocator);
    $restProxy->deleteAccessPolicy($accessPolicy);
}

?>
