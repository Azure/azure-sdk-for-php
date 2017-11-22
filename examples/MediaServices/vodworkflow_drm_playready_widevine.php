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
use WindowsAzure\Common\Internal\Utilities;
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
use WindowsAzure\MediaServices\Templates\PlayReadyLicenseResponseTemplate;
use WindowsAzure\MediaServices\Templates\PlayReadyLicenseTemplate;
use WindowsAzure\MediaServices\Templates\PlayReadyLicenseType;
use WindowsAzure\MediaServices\Templates\MediaServicesLicenseTemplateSerializer;
use WindowsAzure\MediaServices\Templates\WidevineMessage;
use WindowsAzure\MediaServices\Templates\AllowedTrackTypes;
use WindowsAzure\MediaServices\Templates\ContentKeySpecs;
use WindowsAzure\MediaServices\Templates\RequiredOutputProtection;
use WindowsAzure\MediaServices\Templates\Hdcp;
use WindowsAzure\MediaServices\Templates\SymmetricVerificationKey;
use WindowsAzure\MediaServices\Templates\TokenRestrictionTemplateSerializer;
use WindowsAzure\MediaServices\Templates\TokenRestrictionTemplate;
use WindowsAzure\MediaServices\Templates\TokenClaim;
use WindowsAzure\MediaServices\Templates\TokenType;
use WindowsAzure\MediaServices\Templates\WidevineMessageSerializer;

// read user settings from config
include_once 'userconfig.php';

$mezzanineFileName = __DIR__.'/resources/Azure-Video.wmv';
$tokenRestriction = true;
$tokenType = TokenType::JWT;

echo "Azure SDK for PHP - PlayReady + Widevine Dynamic Encryption Sample".PHP_EOL;

// 0 - Instantiate the credentials, the token provider and connect to Azure Media Services
$credentials = new AzureAdTokenCredentials(
    $tenant, new AzureAdClientSymmetricKey($clientId, $clientKey),
    AzureEnvironments::AZURE_CLOUD_ENVIRONMENT());
$provider = new AzureAdTokenProvider($credentials);
$restProxy = ServicesBuilder::getInstance()->createMediaServicesService(new MediaServicesSettings($restApiEndpoint, $provider));

// 1 - Upload the mezzanine
$sourceAsset = uploadFileAndCreateAsset($restProxy, $mezzanineFileName);

// 2 - encode the output asset
$encodedAsset = encodeToAdaptiveBitrateMP4Set($restProxy, $sourceAsset);

// 3 - Create Content Key
$contentKey = createCommonTypeContentKey($restProxy, $encodedAsset);

// 4 - Create the ContentKey Authorization Policy
$tokenTemplateString = null;
if ($tokenRestriction) {
    $tokenTemplateString = addTokenRestrictedAuthorizationPolicy($restProxy, $contentKey, $tokenType);
} else {
    addOpenAuthorizationPolicy($restProxy, $contentKey);
}
// 5 - Create the AssetDeliveryPolicy
createAssetDeliveryPolicy($restProxy, $encodedAsset, $contentKey);

// 6 - Publish
publishEncodedAsset($restProxy, $encodedAsset);

// 7 - Generate Test Token
if ($tokenRestriction) {
    generateTestToken($tokenTemplateString, $contentKey);
}

// Done
echo 'Done!';

////////////////////
// Helper methods //
////////////////////

function uploadFileAndCreateAsset(MediaServicesRestProxy $restProxy, $mezzanineFileName)
{
    // 1.1. create an empty "Asset" by specifying the name
    $asset = new Asset(Asset::OPTIONS_NONE);
    $asset->setName('Mezzanine ' . basename($mezzanineFileName));
    $asset = $restProxy->createAsset($asset);
    $assetId = $asset->getId();

    echo "Asset created: name={$asset->getName()} id={$assetId}".PHP_EOL;

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

    echo "Uploading...".PHP_EOL;

    // 1.6. use the 'uploadAssetFile' to perform a multi-part upload using the Block Blobs REST API storage operations
    $restProxy->uploadAssetFile($sasLocator, basename($mezzanineFileName), $fileContent);

    // 1.7. notify Media Services that the file upload operation is done to generate the asset file metadata
    $restProxy->createFileInfos($asset);

    echo 'File uploaded: size='.strlen($fileContent).PHP_EOL;

    // 1.8. delete the SAS Locator (and Access Policy) for the Asset since we are done uploading files
    $restProxy->deleteLocator($sasLocator);
    $restProxy->deleteAccessPolicy($accessPolicy);

    return $asset;
}

function encodeToAdaptiveBitrateMP4Set(MediaServicesRestProxy $restProxy, Asset $asset)
{
    // 2.1 retrieve the latest 'Media Encoder Standard' processor version
    $mediaProcessor = $restProxy->getLatestMediaProcessor('Media Encoder Standard');

    echo "Using Media Processor: {$mediaProcessor->getName()} version {$mediaProcessor->getVersion()}".PHP_EOL;

    // 2.2 Create the Job; this automatically schedules and runs it
    $outputAssetName = 'Encoded '.$asset->getName();
    $outputAssetCreationOption = Asset::OPTIONS_NONE;
    $taskBody = '<?xml version="1.0" encoding="utf-8"?><taskBody><inputAsset>JobInputAsset(0)</inputAsset><outputAsset assetCreationOptions="'.$outputAssetCreationOption.'" assetName="'.$outputAssetName.'">JobOutputAsset(0)</outputAsset></taskBody>';

    $task = new Task($taskBody, $mediaProcessor->getId(), TaskOptions::NONE);
    $task->setConfiguration('H264 Multiple Bitrate 720p');

    $job = new Job();
    $job->setName('Encoding Job');

    $job = $restProxy->createJob($job, array($asset), array($task));

    echo "Created Job with Id: {$job->getId()}".PHP_EOL;

    // 2.3 Check to see if the Job has completed
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

    // 2.4 Get output asset
    $outputAssets = $restProxy->getJobOutputMediaAssets($job);
    $encodedAsset = $outputAssets[0];

    echo "Asset encoded: name={$encodedAsset->getName()} id={$encodedAsset->getId()}".PHP_EOL;

    return $encodedAsset;
}

function createCommonTypeContentKey(MediaServicesRestProxy $restProxy, $encodedAsset)
{
    // 3.1 Generate a new key
    $aesKey = Utilities::generateCryptoKey(16);

    // 3.2 Get the protection key id for ContentKey
    $protectionKeyId = $restProxy->getProtectionKeyId(ContentKeyTypes::COMMON_ENCRYPTION);
    $protectionKey = $restProxy->getProtectionKey($protectionKeyId);

    $contentKey = new ContentKey();
    $contentKey->setContentKey($aesKey, $protectionKey);
    $contentKey->setProtectionKeyId($protectionKeyId);
    $contentKey->setProtectionKeyType(ProtectionKeyTypes::X509_CERTIFICATE_THUMBPRINT);
    $contentKey->setContentKeyType(ContentKeyTypes::COMMON_ENCRYPTION);

    // 3.3 Create the ContentKey
    $contentKey = $restProxy->createContentKey($contentKey);

    echo "Content Key id={$contentKey->getId()}".PHP_EOL;

    // 3.4 Associate the ContentKey with the Asset
    $restProxy->linkContentKeyToAsset($encodedAsset, $contentKey);

    return $contentKey;
}

function addOpenAuthorizationPolicy(
    MediaServicesRestProxy $restProxy, ContentKey $contentKey
) {
    // 4.1 Create ContentKeyAuthorizationPolicyRestriction (Open)
    $restriction = new ContentKeyAuthorizationPolicyRestriction();
    $restriction->setName('ContentKey Authorization Policy Restriction');
    $restriction->setKeyRestrictionType(ContentKeyRestrictionType::OPEN);

    // 4.2 Configure PlayReady and Widevine license templates.
    $playReadyLicenseTemplate = configurePlayReadyLicenseTemplate();
    $widevineLicenseTemplate = configureWidevineLicenseTemplate();

    // 4.3 Create ContentKeyAuthorizationPolicyOption (PlayReady)
    $playReadyOption = new ContentKeyAuthorizationPolicyOption();
    $playReadyOption->setName('PlayReady Authorization Policy Option');
    $playReadyOption->setKeyDeliveryType(ContentKeyDeliveryType::PLAYREADY_LICENSE);
    $playReadyOption->setRestrictions(array($restriction));
    $playReadyOption->setKeyDeliveryConfiguration($playReadyLicenseTemplate);
    $playReadyOption = $restProxy->createContentKeyAuthorizationPolicyOption($playReadyOption);

    // 4.4 Create ContentKeyAuthorizationPolicyOption (Widevine)
    $widevineOption = new ContentKeyAuthorizationPolicyOption();
    $widevineOption->setName('Widevine Authorization Policy Option');
    $widevineOption->setKeyDeliveryType(ContentKeyDeliveryType::WIDEVINE);
    $widevineOption->setRestrictions(array($restriction));
    $widevineOption->setKeyDeliveryConfiguration($widevineLicenseTemplate);
    $widevineOption = $restProxy->createContentKeyAuthorizationPolicyOption($widevineOption);

    // 4.5 Create ContentKeyAuthorizationPolicy
    $ckapolicy = new ContentKeyAuthorizationPolicy();
    $ckapolicy->setName('ContentKey Authorization Policy');
    $ckapolicy = $restProxy->createContentKeyAuthorizationPolicy($ckapolicy);

    // 4.6 Link the ContentKeyAuthorizationPolicyOption to the ContentKeyAuthorizationPolicy
    $restProxy->linkOptionToContentKeyAuthorizationPolicy($playReadyOption, $ckapolicy);
    $restProxy->linkOptionToContentKeyAuthorizationPolicy($widevineOption, $ckapolicy);

    // 4.7 Associate the ContentKeyAuthorizationPolicy with the ContentKey
    $contentKey->setAuthorizationPolicyId($ckapolicy->getId());
    $restProxy->updateContentKey($contentKey);

    echo "Added Content Key Authorization Policy: name={$ckapolicy->getName()} id={$ckapolicy->getId()}".PHP_EOL;
}

function addTokenRestrictedAuthorizationPolicy(
    MediaServicesRestProxy $restProxy, ContentKey $contentKey, $tokenType
) {
    // 4.1 Create ContentKeyAuthorizationPolicyRestriction (Token Restricted)
    $tokenRestriction = generateTokenRequirements($tokenType);
    $restriction = new ContentKeyAuthorizationPolicyRestriction();
    $restriction->setName('ContentKey Authorization Policy Restriction');
    $restriction->setKeyRestrictionType(ContentKeyRestrictionType::TOKEN_RESTRICTED);
    $restriction->setRequirements($tokenRestriction);

    // 4.2 Configure PlayReady and Widevine license templates.
    $playReadyLicenseTemplate = configurePlayReadyLicenseTemplate();
    $widevineLicenseTemplate = configureWidevineLicenseTemplate();

    // 4.3 Create ContentKeyAuthorizationPolicyOption (PlayReady)
    $playReadyOption = new ContentKeyAuthorizationPolicyOption();
    $playReadyOption->setName('PlayReady Authorization Policy Option');
    $playReadyOption->setKeyDeliveryType(ContentKeyDeliveryType::PLAYREADY_LICENSE);
    $playReadyOption->setRestrictions(array($restriction));
    $playReadyOption->setKeyDeliveryConfiguration($playReadyLicenseTemplate);
    $playReadyOption = $restProxy->createContentKeyAuthorizationPolicyOption($playReadyOption);

    // 4.4 Create ContentKeyAuthorizationPolicyOption (Widevine)
    $widevineOption = new ContentKeyAuthorizationPolicyOption();
    $widevineOption->setName('Widevine Authorization Policy Option');
    $widevineOption->setKeyDeliveryType(ContentKeyDeliveryType::WIDEVINE);
    $widevineOption->setRestrictions(array($restriction));
    $widevineOption->setKeyDeliveryConfiguration($widevineLicenseTemplate);
    $widevineOption = $restProxy->createContentKeyAuthorizationPolicyOption($widevineOption);

    // 4.5 Create ContentKeyAuthorizationPolicy
    $ckapolicy = new ContentKeyAuthorizationPolicy();
    $ckapolicy->setName('ContentKey Authorization Policy');
    $ckapolicy = $restProxy->createContentKeyAuthorizationPolicy($ckapolicy);

    // 4.6 Link the ContentKeyAuthorizationPolicyOption to the ContentKeyAuthorizationPolicy
    $restProxy->linkOptionToContentKeyAuthorizationPolicy($playReadyOption, $ckapolicy);
    $restProxy->linkOptionToContentKeyAuthorizationPolicy($widevineOption, $ckapolicy);

    // 4.7 Associate the ContentKeyAuthorizationPolicy with the ContentKey
    $contentKey->setAuthorizationPolicyId($ckapolicy->getId());
    $restProxy->updateContentKey($contentKey);

    echo "Added Content Key Authorization Policy: name={$ckapolicy->getName()} id={$ckapolicy->getId()}".PHP_EOL;

    return $tokenRestriction;
}

function createAssetDeliveryPolicy(MediaServicesRestProxy $restProxy, $encodedAsset, $contentKey)
{
    // 5.1 Get the acquisition URL
    $acquisitionUrl = $restProxy->getKeyDeliveryUrl($contentKey, ContentKeyDeliveryType::PLAYREADY_LICENSE);
    $widevineUrl = $restProxy->getKeyDeliveryUrl($contentKey, ContentKeyDeliveryType::WIDEVINE);

    // remove query string
    if (strpos($widevineUrl, '?') !== false) {
        $widevineUrl = substr($widevineUrl, 0, strrpos($widevineUrl, "?"));
    }

    // 5.2 Generate the AssetDeliveryPolicy Configuration Key
    $configuration = [AssetDeliveryPolicyConfigurationKey::PLAYREADY_LICENSE_ACQUISITION_URL => $acquisitionUrl,
                      AssetDeliveryPolicyConfigurationKey::WIDEVINE_BASE_LICENSE_ACQUISITION_URL => $widevineUrl];
    $confJson = AssetDeliveryPolicyConfigurationKey::stringifyAssetDeliveryPolicyConfigurationKey($configuration);

    // 5.3 Create the AssetDeliveryPolicy
    $adpolicy = new AssetDeliveryPolicy();
    $adpolicy->setName('Asset Delivery Policy');
    $adpolicy->setAssetDeliveryProtocol(AssetDeliveryProtocol::DASH);
    $adpolicy->setAssetDeliveryPolicyType(AssetDeliveryPolicyType::DYNAMIC_COMMON_ENCRYPTION);
    $adpolicy->setAssetDeliveryConfiguration($confJson);

    $adpolicy = $restProxy->createAssetDeliveryPolicy($adpolicy);

    // 5.4 Link the AssetDeliveryPolicy to the Asset
    $restProxy->linkDeliveryPolicyToAsset($encodedAsset, $adpolicy->getId());

    echo "Added Asset Delivery Policy: name={$adpolicy->getName()} id={$adpolicy->getId()}".PHP_EOL;
}

function publishEncodedAsset(MediaServicesRestProxy $restProxy, $encodedAsset)
{
    // 6.1 Get the .ISM AssetFile
    $files = $restProxy->getAssetAssetFileList($encodedAsset);
    $manifestFile = null;

    foreach ($files as $file) {
        if (endsWith(strtolower($file->getName()), '.ism')) {
            $manifestFile = $file;
        }
    }

    if ($manifestFile == null) {
        echo "Unable to found the manifest file".PHP_EOL;
        exit(-1);
    }

    // 6.2 Create a 30-day read-only AccessPolicy
    $access = new AccessPolicy('Streaming Access Policy');
    $access->setDurationInMinutes(60 * 24 * 30);
    $access->setPermissions(AccessPolicy::PERMISSIONS_READ);
    $access = $restProxy->createAccessPolicy($access);

    // 6.3 Create a Locator using the AccessPolicy and Asset
    $locator = new Locator($encodedAsset, $access, Locator::TYPE_ON_DEMAND_ORIGIN);
    $locator->setName('Streaming Locator');
    $locator = $restProxy->createLocator($locator);

    // 6.4 Create a Smooth Streaming base URL
    $stremingUrl = $locator->getPath().$manifestFile->getName().'/manifest';

    echo "Streaming URL: {$stremingUrl}".PHP_EOL;
}

function configurePlayReadyLicenseTemplate()
{
    // The following code configures PlayReady License Template using PHP classes
    // and returns the XML string.

    // The PlayReadyLicenseResponseTemplate class represents the template for the response sent back to the end user.
    // It contains a field for a custom data string between the license server and the application
    // (may be useful for custom app logic) as well as a list of one or more license templates.
    $responseTemplate = new PlayReadyLicenseResponseTemplate();

    // The PlayReadyLicenseTemplate class represents a license template for creating PlayReady licenses
    // to be returned to the end users.
    // It contains the data on the content key in the license and any rights or restrictions to be
    // enforced by the PlayReady DRM runtime when using the content key.
    $licenseTemplate = new PlayReadyLicenseTemplate();

    // Configure whether the license is persistent (saved in persistent storage on the client)
    // or non-persistent (only held in memory while the player is using the license).
    $licenseTemplate->setLicenseType(PlayReadyLicenseType::NON_PERSISTENT);

    // AllowTestDevices controls whether test devices can use the license or not.
    // If true, the MinimumSecurityLevel property of the license
    // is set to 150.  If false (the default), the MinimumSecurityLevel property of the license is set to 2000.
    $licenseTemplate->setAllowTestDevices(true);

    // You can also configure the Play Right in the PlayReady license by using the PlayReadyPlayRight class.
    // It grants the user the ability to playback the content subject to the zero or more restrictions
    // configured in the license and on the PlayRight itself (for playback specific policy).
    // Much of the policy on the PlayRight has to do with output restrictions
    // which control the types of outputs that the content can be played over and
    // any restrictions that must be put in place when using a given output.
    // For example, if the DigitalVideoOnlyContentRestriction is enabled,
    // then the DRM runtime will only allow the video to be displayed over digital outputs
    // (analog video outputs won't be allowed to pass the content).

    // IMPORTANT: These types of restrictions can be very powerful but can also affect the consumer experience.
    // If the output protections are configured too restrictive,
    // the content might be unplayable on some clients. For more information, see the PlayReady Compliance Rules document.

    // For example:
    // $licenseTemplate->getPlayRight()->setAgcAndColorStripeRestriction(new AgcAndColorStripeRestriction(1));

    $responseTemplate->setLicenseTemplates(array($licenseTemplate));

    return MediaServicesLicenseTemplateSerializer::serialize($responseTemplate);
}

function configureWidevineLicenseTemplate()
{
    $template = new WidevineMessage();
    $template->allowed_track_types = AllowedTrackTypes::SD_HD;
    $contentKeySpecs = new ContentKeySpecs();
    $contentKeySpecs->required_output_protection = new RequiredOutputProtection();
    $contentKeySpecs->required_output_protection->hdcp = Hdcp::HDCP_NONE;
    $contentKeySpecs->security_level = 1;
    $contentKeySpecs->track_type = 'SD';
    $template->content_key_specs = array($contentKeySpecs);
    $policyOverrides = new \stdClass();
    $policyOverrides->can_play = true;
    $policyOverrides->can_persist = true;
    $policyOverrides->can_renew = false;
    $template->policy_overrides = $policyOverrides;

    return WidevineMessageSerializer::serialize($template);
}

function generateTokenRequirements($tokenType)
{
    $template = new TokenRestrictionTemplate($tokenType);

    $template->setPrimaryVerificationKey(new SymmetricVerificationKey());
    $template->setAudience('urn:contoso');
    $template->setIssuer('https://sts.contoso.com');
    $claims = array();
    $claims[] = new TokenClaim(TokenClaim::CONTENT_KEY_ID_CLAIM_TYPE);
    $template->setRequiredClaims($claims);

    return TokenRestrictionTemplateSerializer::serialize($template);
}

function generateTestToken($tokenTemplateString, ContentKey $contentKey)
{
    $template = TokenRestrictionTemplateSerializer::deserialize($tokenTemplateString);
    $contentKeyUUID = substr($contentKey->getId(), strlen('nb:kid:UUID:'));
    $expiration = strtotime('+12 hour');
    $token = TokenRestrictionTemplateSerializer::generateTestToken($template, null, $contentKeyUUID, $expiration);

    echo "Token Type {$template->getTokenType()}\r\nBearer={$token}".PHP_EOL;
}

function endsWith($haystack, $needle)
{
    $length = strlen($needle);
    if ($length == 0) {
        return true;
    }

    return substr($haystack, -$length) === $needle;
}

?>
