<?php

require_once 'vendor/autoload.php';
require_once "WindowsAzure/WindowsAzure.php";

use WindowsAzure\Common\ServicesBuilder;
use WindowsAzure\Common\Internal\MediaServicesSettings;
use WindowsAzure\Common\Internal\Utilities;
use WindowsAzure\MediaServices\Models\Asset;
use WindowsAzure\MediaServices\Models\AccessPolicy;
use WindowsAzure\MediaServices\Models\Locator;
use WindowsAzure\MediaServices\Models\Task;
use WindowsAzure\MediaServices\Models\Job;
use WindowsAzure\MediaServices\Models\TaskOptions;
use WindowsAzure\MediaServices\Models\ContentKey;
use WindowsAzure\MediaServices\Models\ProtectionKeyTypes;
use WindowsAzure\MediaServices\Models\ContentKeyTypes;
use WindowsAzure\MediaServices\Models\ContentKeyAuthorizationPolicy;
use WindowsAzure\MediaServices\Models\ContentKeyAuthorizationPolicyOption;
use WindowsAzure\MediaServices\Models\ContentKeyAuthorizationPolicyRestriction;
use WindowsAzure\MediaServices\Models\ContentKeyDeliveryType;
use WindowsAzure\MediaServices\Models\ContentKeyRestrictionType;
use WindowsAzure\MediaServices\Models\AssetDeliveryPolicy;
use WindowsAzure\MediaServices\Models\AssetDeliveryProtocol;
use WindowsAzure\MediaServices\Models\AssetDeliveryPolicyType;
use WindowsAzure\MediaServices\Models\AssetDeliveryPolicyConfigurationKey;

// Settings
$account = "<your account here>";
$secret = "<account key here>";
$mezzanineFileName = "Azure-Video.wmv";

print "Azure SDK for PHP - AES Dynamic Encryption Sample\r\n";

// Phase 1 - Upload the mezzanine

// 1.1. set up the MediaServicesService object to call into the Media Services REST API.
$restProxy = ServicesBuilder::getInstance()->createMediaServicesService(new MediaServicesSettings($account, $secret));

// 1.2. create an empty "Asset" by specifying the name and Storage account to use
$asset = new Asset(Asset::OPTIONS_NONE);
$asset->setName("Mezzanine " . $mezzanineFileName);
$asset = $restProxy->createAsset($asset);
$assetId = $asset->getId();

print "Asset created: name=" . $asset->getName() . " id=" . $assetId . "\r\n";

// 1.3. create an Access Policy with Write permissions
$accessPolicy = new AccessPolicy('UploadAccessPolicy');
$accessPolicy->setDurationInMinutes(60.0);
$accessPolicy->setPermissions(AccessPolicy::PERMISSIONS_WRITE);
$accessPolicy = $restProxy->createAccessPolicy($accessPolicy);

// 1.4. create a SAS Locator for the Asset
$sasLocator = new Locator($asset,  $accessPolicy, Locator::TYPE_SAS);
$sasLocator->setStartTime(new \DateTime('now -5 minutes'));
$sasLocator = $restProxy->createLocator($sasLocator);

// 1.5. get the mezzanine file content 
$fileContent = file_get_contents($mezzanineFileName);

print "Uploading...\r\n";

// 1.6. use the 'uploadAssetFile' to perform a multi-part upload using the Block Blobs REST API storage operations 
$restProxy->uploadAssetFile($sasLocator, $mezzanineFileName, $fileContent);

// 1.7. notify Media Services that the file upload operation is done to generate the asset file metadata
$restProxy->createFileInfos($asset);

print "File uploaded: size=" . strlen($fileContent) . "\r\n";

// 1.8. delete the SAS Locator (and Access Policy) for the Asset since we are done uploading files
$restProxy->deleteLocator($sasLocator);
$restProxy->deleteAccessPolicy($accessPolicy);

// Phase 2 - encode the output asset

// 2.1 retrieve the last Media Encoder Standard
$mediaProcessor = $restProxy->getLatestMediaProcessor('Media Encoder Standard');

print "Using Media Processor: {$mediaProcessor->getName()} version {$mediaProcessor->getVersion()}\r\n";

// 2.2 Create the Job; this automatically schedules and runs it.

$outputAssetName = "Encoded " . $mezzanineFileName;
$taskBody = '<?xml version="1.0" encoding="utf-8"?><taskBody><inputAsset>JobInputAsset(0)</inputAsset><outputAsset assetCreationOptions="0" assetName="' . $outputAssetName . '">JobOutputAsset(0)</outputAsset></taskBody>';

$task = new Task($taskBody, $mediaProcessor->getId(), TaskOptions::NONE);
$task->setConfiguration('H264 Multiple Bitrate 720p');

$job = new Job();
$job->setName('Encoding Job');

$job = $restProxy->createJob($job, array($asset), array($task));

print "Created Job with Id: {$job->getId()}\r\n";

// 2.3 Check to see if the Job has completed
$result = $restProxy->getJobStatus($job);

while($result != 3 && $result != 4 && $result != 5) {
    print "Job status: $result\r\n";
    sleep(5);
    $result = $restProxy->getJobStatus($job);
}

if ($result != 3) {
    print "The job has finished with a wrong status: $result\r\n";
    return;
}

print "Job Finished!\r\n";

// 2.4 Get output asset
$outputAssets = $restProxy->getJobOutputMediaAssets($job);
$encodedAsset = $outputAssets[0];

print "Encoded Asset name={$encodedAsset->getName()} id={$encodedAsset->getId()}\r\n";

// Phase 3 - Create Content Key

// 3.1 Generate a new key 
$aesKey = Utilities::generateCryptoKey(16);

// 3.2 Get the protection key id for ContentKey
$protectionKeyId = $restProxy->getProtectionKeyId(ContentKeyTypes::ENVELOPE_ENCRYPTION);
$protectionKey = $restProxy->getProtectionKey($protectionKeyId);

$contentKey = new ContentKey();
$contentKey->setContentKey($aesKey, $protectionKey);
$contentKey->setProtectionKeyId($protectionKeyId);
$contentKey->setProtectionKeyType(ProtectionKeyTypes::X509_CERTIFICATE_THUMBPRINT);
$contentKey->setContentKeyType(ContentKeyTypes::ENVELOPE_ENCRYPTION);

// 3.3 Create the ContentKey
$contentKey = $restProxy->createContentKey($contentKey);

print "Content Key id={$contentKey->getId()}\r\n"; 

// 3.4 Associate the ContentKey with the Asset
$restProxy->linkContentKeyToAsset($encodedAsset, $contentKey);

// Phase 4 - Create the ContentKey Authorization Policy

// 4.1 Create ContentKeyAuthorizationPolicyRestriction (Open)
$restriction = new ContentKeyAuthorizationPolicyRestriction();
$restriction->setName('ContentKey Authorization Policy Restriction');
$restriction->setKeyRestrictionType(ContentKeyRestrictionType::OPEN);

// 4.2 Create ContentKeyAuthorizationPolicyOption (AES)
$option = new ContentKeyAuthorizationPolicyOption();
$option->setName('ContentKey Authorization Policy Option');
$option->setKeyDeliveryType(ContentKeyDeliveryType::BASELINE_HTTP);
$option->setRestrictions(array($restriction));
$option = $restProxy->createContentKeyAuthorizationPolicyOption($option);

// 4.3 Create ContentKeyAuthorizationPolicy
$ckapolicy = new ContentKeyAuthorizationPolicy();
$ckapolicy->setName('ContentKey Authorization Policy');
$ckapolicy = $restProxy->createContentKeyAuthorizationPolicy($ckapolicy);

// 4.4 Link the ContentKeyAuthorizationPolicyOption to the ContentKeyAuthorizationPolicy
$restProxy->linkOptionsToContentKeyAuthorizationPolicy($option, $ckapolicy);

// 4.5 Associate the ContentKeyAuthorizationPolicy with the ContentKey
$contentKey->setAuthorizationPolicyId($ckapolicy->getId());
$restProxy->updateContentKey($contentKey);

print "Added Content Key Authorization Policy: name={$ckapolicy->getName()} id={$ckapolicy->getId()}\r\n";

// Phase 5 - Create the AssetDeliveryPolicy

// 5.1 Get the acquisition URL
$acquisitionUrl = $restProxy->getKeyDeliveryUrl($contentKey, ContentKeyDeliveryType::BASELINE_HTTP);

// 5.2 Generate the AssetDeliveryPolicy Configuration Key
$randomKey = Utilities::generateCryptoKey(16);
$configuration = [AssetDeliveryPolicyConfigurationKey::ENVELOPE_KEY_ACQUISITION_URL => $acquisitionUrl,
                  AssetDeliveryPolicyConfigurationKey::ENVELOPE_ENCRYPTION_IV_AS_BASE64 => base64_encode($randomKey)];
$confJson = AssetDeliveryPolicyConfigurationKey::stringifyAssetDeliveryPolicyConfiguartionKey($configuration);

// 5.3 Create the AssetDeliveryPolicy

$adpolicy = new AssetDeliveryPolicy();
$adpolicy->setName('Asset Delivery Policy');
$adpolicy->setAssetDeliveryProtocol(AssetDeliveryProtocol::SMOOTH_STREAMING | AssetDeliveryProtocol::DASH | AssetDeliveryProtocol::HLS);
$adpolicy->setAssetDeliveryPolicyType(AssetDeliveryPolicyType::DYNAMIC_ENVELOPE_ENCRYPTION);
$adpolicy->setAssetDeliveryConfiguration($confJson);

$adpolicy = $restProxy->createAssetDeliveryPolicy($adpolicy);

// 5.4 Link the AssetDeliveryPolicy to the Asset
$restProxy->linkDeliveryPolicyToAsset($encodedAsset, $adpolicy->getId());

print "Added Asset Delivery Policy: name={$adpolicy->getName()} id={$adpolicy->getId()}\r\n";

// Phase 6 - Publish

// 6.1 Get the .ISM AssetFile
$files = $restProxy->getAssetFileList();
$manifestFile = null;

foreach($files as $file) {
    //print "File {$file->getName()} assetId={$file->getParentAssetId()}\r\n";
    if ($file->getParentAssetId() === $encodedAsset->getId() &&
            endsWith(strtolower($file->getName()), '.ism')) {
        $manifestFile = $file;
    }
}

if ($manifestFile == null) {
    print "Unable to found the manifest file\r\n";
    return -1;
}

// 6.2 Create a 30-day readonly AccessPolicy
$access = new AccessPolicy("Streaming Access Policy");
$access->setDurationInMinutes(60 * 24 * 30);
$access->setPermissions(AccessPolicy::PERMISSIONS_READ);
$access = $restProxy->createAccessPolicy($access);

// 6.3 Create a Locator using the AccessPolicy and Asset
$locator = new Locator($encodedAsset, $access, Locator::TYPE_ON_DEMAND_ORIGIN);
$locator->setName("Streaming Locator");
$locator = $restProxy->createLocator($locator);

// 6.4 Create a Smooth Streaming base URL

$stremingUrl = $locator->getPath() . $manifestFile->getName() . "/manifest";

print "Done! Streaming URL: {$stremingUrl}\r\n";

// the End

//////////////////////////////////////////////////////////////////////////////////////////////////////////
/// HELPER FUNCTIONS

function endsWith($haystack, $needle)
{
    $length = strlen($needle);
    if ($length == 0) {
        return true;
    }

    return (substr($haystack, -$length) === $needle);
}

?>
