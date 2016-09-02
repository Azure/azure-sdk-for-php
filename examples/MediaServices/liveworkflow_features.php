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
use WindowsAzure\MediaServices\Models\Asset;
use WindowsAzure\MediaServices\Models\AccessPolicy;
use WindowsAzure\MediaServices\Models\Locator;
use WindowsAzure\MediaServices\Models\Task;
use WindowsAzure\MediaServices\Models\Job;
use WindowsAzure\MediaServices\Models\TaskOptions;
// Live Features
use WindowsAzure\MediaServices\Models\Channel;
use WindowsAzure\MediaServices\Models\ChannelInput;
use WindowsAzure\MediaServices\Models\ChannelOutput;
use WindowsAzure\MediaServices\Models\ChannelPreview;
use WindowsAzure\MediaServices\Models\ChannelEncoding;
use WindowsAzure\MediaServices\Models\ChannelEndpoint;
use WindowsAzure\MediaServices\Models\ChannelInputAccessControl;
use WindowsAzure\MediaServices\Models\ChannelPreviewAccessControl;
use WindowsAzure\MediaServices\Models\ChannelOutputHls;
use WindowsAzure\MediaServices\Models\ChannelSlate;
use WindowsAzure\MediaServices\Models\ChannelState;
use WindowsAzure\MediaServices\Models\StreamingProtocol;
use WindowsAzure\MediaServices\Models\EncodingType;
use WindowsAzure\MediaServices\Models\IPAccessControl;
use WindowsAzure\MediaServices\Models\IPRange;
use WindowsAzure\MediaServices\Models\Operation;
use WindowsAzure\MediaServices\Models\OperationState;
use WindowsAzure\MediaServices\Models\CrossSiteAccessPolicies;
use WindowsAzure\MediaServices\Models\AudioStream;
use WindowsAzure\MediaServices\Models\VideoStream;
use WindowsAzure\MediaServices\Models\ChannelEncodingPresets;
use WindowsAzure\MediaServices\Models\AdMarkerSources;
use WindowsAzure\MediaServices\Models\Program;
use WindowsAzure\MediaServices\Models\ProgramState;
// Content Protection
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
use WindowsAzure\MediaServices\Templates\SymmetricVerificationKey;
use WindowsAzure\MediaServices\Templates\TokenRestrictionTemplateSerializer;
use WindowsAzure\MediaServices\Templates\TokenRestrictionTemplate;
use WindowsAzure\MediaServices\Templates\TokenClaim;
use WindowsAzure\MediaServices\Templates\TokenType;

// read user settings from config
include_once 'userconfig.php';

// allow the script to run longer than 600 seconds (php default)
set_time_limit(0);

$options = new StdClass();

// General Options
$options->channelName = 'phpsdk-sample';
$options->programName = 'program-sample';

// Encoding Options
$options->encodingType = EncodingType::None;

// Encoding Standard Options 
$options->archiveWindowLenght = new \DateInterval("PT1H");

// AES Dynamic Encription Options 
$options->aesDynamicEncription = true;
$options->tokenRestriction = false;
$options->tokenType = TokenType::JWT;

// Archive options
$options->deleteArchiveAsset = true; // change this to false to keep the asset archive 

echo "Azure SDK for PHP - Live Features".PHP_EOL;

// 0 - set up the MediaServicesService object to call into the Media Services REST API.
$restProxy = ServicesBuilder::getInstance()->createMediaServicesService(new MediaServicesSettings($account, $secret));

// 1 - Create and Start new channel.
$channel = createAndStartChannel($restProxy, $options);

// 2 - Create and Start new program, also apply AES encryption if setted.
$program = createAndStartProgram($restProxy, $channel, $options);

// 3 - Display the ingest URL and the preview URL.
echo "Ingest URL: {$channel->getInput()->getEndpoints()[0]->getUrl()}".PHP_EOL;
echo "Preview URL: {$channel->getPreview()->getEndpoints()[0]->getUrl()}".PHP_EOL;
if (isset($options->generatedTestToken)) {
    echo "Token: Bearer {$options->generatedTestToken}".PHP_EOL;
}

// 4 - Publish the asset
publishLiveAsset($restProxy, getAssetByProgram($restProxy, $program));

// 5 - Wait for user decide to shutdown.
echo "Press ENTER to shutdown the live stream and cleanup resources.".PHP_EOL;
$handle = fopen ("php://stdin","r");
$line = fgets($handle);

// 6 - Cleanup the entities.
doCleanup($restProxy, $channel, $program, $options);

exit(1);

////////////////////
// Main methods   //
////////////////////

function createAndStartChannel($restProxy, $options) {
    // 1 - prepare the channel template 
    $channelData = createChannelData($options);

    // 2 - create the channel
    echo "Creating channel... ";
    $channel = $restProxy->createChannel($channelData);

    // 3 - start the channel
    echo "Done!".PHP_EOL."Starting channel... ";
    $restProxy->startChannel($channel);

    echo "Done!".PHP_EOL;
    // 4 - get and return the started channel
    return $restProxy->getChannel($channel);
}

function createAndStartProgram($restProxy, $channel, $options) {
    // 1 - prepare the program asset 
    $asset = new Asset(Asset::OPTIONS_NONE);
    $asset->setName($options->programName);
    $asset = $restProxy->createAsset($asset);

    // 2 - create & apply asset delivey policy
    if ($options->aesDynamicEncription) {
        applyAesDynamicEncription($restProxy, $asset, $options);
    } else {
        applyNonDynamicEncription($restProxy, $asset);
    }

    // 3 - create a new program and link to the asset and channel
    $program = new Program();
    $program->setName($options->programName);
    $program->setAssetId($asset->getId());
    $program->setArchiveWindowLength($options->archiveWindowLenght);
    $program->setChannelId($channel->getId());

    echo "Creating program... ";
    $program = $restProxy->createProgram($program);

    // 4 - start the program
    echo "Done!".PHP_EOL."Starting program... ";
    $restProxy->startProgram($program);
    
    echo "Done!".PHP_EOL;
    return $restProxy->getProgram($program);
}

function doCleanup($restProxy, $channel, $program, $options) {
    // cleanup program
    echo "Stopping program... ";
    $restProxy->stopProgram($program);
    
    echo "Done!".PHP_EOL."Deleting program... ";
    $restProxy->deleteProgram($program);

    // cleanup channel
    echo "Done!".PHP_EOL."Stopping channel... ";
    $restProxy->stopChannel($channel);
    
    echo "Done!".PHP_EOL."Deleting channel... ";
    $restProxy->deleteChannel($channel);
     
    echo "Done!".PHP_EOL;

    // cleanup asset
    if ($options->deleteArchiveAsset) {
        echo "Deleting asset...   ";
        $asset = $restProxy->getAsset($program->getAssetId());

        // clean locators
        $locators = $restProxy->getAssetLocatorList($asset);
        foreach ($locators as $loc) {
            $restProxy->deleteLocator($loc);
        }

        // clean delivery policies
        $policies = $restProxy->getAssetLinkedDeliveryPolicy($asset);
        foreach($policies as $policy) {
            $restProxy->removeDeliveryPolicyFromAsset($asset, $policy);
            $restProxy->deleteAssetDeliveryPolicy($policy);
        }

        // cleanup content keys
        $keys = $restProxy->getAssetContentKeys($asset);
        foreach ($keys as $key) {
            $restProxy->removeContentKeyFromAsset($asset, $key);
            $authPolicyId = $key->getAuthorizationPolicyId();
            $restProxy->deleteContentKeyAuthorizationPolicy($authPolicyId);
        }
        
        $restProxy->deleteAsset($asset);
        
        echo "Done!".PHP_EOL;
    } else {
        echo "Archive asset was not removed.";
    }
}

////////////////////
// Helper methods //
////////////////////

function applyAesDynamicEncription ($restProxy, $asset, $options) {
    // 1 - Create Content Key
    $contentKey = createEnvelopeTypeContentKey($restProxy, $asset);

    // 2 - Create the ContentKey Authorization Policy and Options
    $tokenTemplateString = null;
    if ($options->tokenRestriction) {
        $tokenTemplateString = 
            addTokenRestrictedAuthorizationPolicy($restProxy, $contentKey, $options->tokenType);
    } else {
        addOpenAuthorizationPolicy($restProxy, $contentKey);
    }

    // 3 - Create the AssetDeliveryPolicy
    createAssetDeliveryPolicy($restProxy, $asset, $contentKey);

    // 4 - Generate Test Token
    if ($options->tokenRestriction) {
        $options->generatedTestToken = generateTestToken($tokenTemplateString, $contentKey);
    }
}

function applyNonDynamicEncription ($restProxy, $asset) {
    $policy = new AssetDeliveryPolicy();
    $policy->setName("Clear Policy");
    $policy->setAssetDeliveryProtocol(AssetDeliveryProtocol::SMOOTH_STREAMING | AssetDeliveryProtocol::DASH | AssetDeliveryProtocol::HLS);
    $policy->setAssetDeliveryPolicyType(AssetDeliveryPolicyType::NO_DYNAMIC_ENCRYPTION);

    $policy = $restProxy->createAssetDeliveryPolicy($policy);
    $restProxy->linkDeliveryPolicyToAsset($asset, $policy);
}

function createChannelData($options) { 

    $channel = new Channel();
    $channel->setName($options->channelName);

    // 1 - Channel Input
    $channelInput = new ChannelInput();
    $channelAccessControl = new ChannelInputAccessControl();
    $channelAccessControl->setIP(createOpenIPAccessControl());
    $channelInput->setAccessControl($channelAccessControl);
    $channelInput->setStreamingProtocol(StreamingProtocol::RTMP);
    $channel->setInput($channelInput);

    // 2 - Channel Preview
    $channelPreview = new ChannelPreview();
    $channelAccessControl = new ChannelPreviewAccessControl();
    $channelAccessControl->setIP(createOpenIPAccessControl());
    $channelPreview->setAccessControl($channelAccessControl);
    $channel->setPreview($channelPreview);

    // 3 - Channel Encoding
    if ($options->encodingType == EncodingType::Standard) {
        $channel->setEncodingType(EncodingType::Standard);
        $channelEncoding = new ChannelEncoding();
        $channelEncoding->setSystemPreset(ChannelEncodingPresets::Default720p);
        $channel->setEncoding($channelEncoding);
    }  else { 
        $channel->setEncodingType(EncodingType::None);
    }

    // 4 - cors rules
    $channel->setCrossSiteAccessPolicies(new CrossSiteAccessPolicies());

    return $channel;
}

function createOpenIPAccessControl() {
    $iPAccessControl = new IPAccessControl();
    $iPRange = new IPRange();
    $iPRange->setName("default");
    $iPRange->setAddress("0.0.0.0");
    $iPRange->setSubnetPrefixLength("0");
    $iPAccessControl->setAllow(array($iPRange));
    return $iPAccessControl;
}

function getAssetByProgram($restProxy, $program) {
    return $restProxy->getAsset($program->getAssetId());
}

function publishLiveAsset($restProxy, $asset)
{
    // 1 Get the .ISM AssetFile
    $files = $restProxy->getAssetAssetFileList($asset);
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

    // 2 Create a 30-day read-only AccessPolicy
    $access = new AccessPolicy('Live Access Policy');
    $access->setDurationInMinutes(60 * 24 * 30);
    $access->setPermissions(AccessPolicy::PERMISSIONS_READ);
    $access = $restProxy->createAccessPolicy($access);

    // 3 Create a Locator using the AccessPolicy and Asset
    $locator = new Locator($asset, $access, Locator::TYPE_ON_DEMAND_ORIGIN);
    $locator->setName('Live Locator');
    $locator = $restProxy->createLocator($locator);

    // 4 Create a Smooth Streaming base URL
    $streamingUrl = $locator->getPath().$manifestFile->getName().'/manifest';

    echo "Streaming URL: {$streamingUrl}".PHP_EOL;
}

function createEnvelopeTypeContentKey($restProxy, $encodedAsset)
{
    // 1 Generate a new key
    $aesKey = Utilities::generateCryptoKey(16);

    // 2 Get the protection key id for ContentKey
    $protectionKeyId = $restProxy->getProtectionKeyId(ContentKeyTypes::ENVELOPE_ENCRYPTION);
    $protectionKey = $restProxy->getProtectionKey($protectionKeyId);

    $contentKey = new ContentKey();
    $contentKey->setContentKey($aesKey, $protectionKey);
    $contentKey->setProtectionKeyId($protectionKeyId);
    $contentKey->setProtectionKeyType(ProtectionKeyTypes::X509_CERTIFICATE_THUMBPRINT);
    $contentKey->setContentKeyType(ContentKeyTypes::ENVELOPE_ENCRYPTION);

    // 3 Create the ContentKey
    $contentKey = $restProxy->createContentKey($contentKey);

    // 4 Associate the ContentKey with the Asset
    $restProxy->linkContentKeyToAsset($encodedAsset, $contentKey);

    return $contentKey;
}

function addOpenAuthorizationPolicy($restProxy, $contentKey)
{
    // 1 Create ContentKeyAuthorizationPolicyRestriction (Open)
    $restriction = new ContentKeyAuthorizationPolicyRestriction();
    $restriction->setName('ContentKey Authorization Policy Restriction');
    $restriction->setKeyRestrictionType(ContentKeyRestrictionType::OPEN);

    // 2 Create ContentKeyAuthorizationPolicyOption (AES)
    $option = new ContentKeyAuthorizationPolicyOption();
    $option->setName('ContentKey Authorization Policy Option');
    $option->setKeyDeliveryType(ContentKeyDeliveryType::BASELINE_HTTP);
    $option->setRestrictions(array($restriction));
    $option = $restProxy->createContentKeyAuthorizationPolicyOption($option);

    // 3 Create ContentKeyAuthorizationPolicy
    $ckapolicy = new ContentKeyAuthorizationPolicy();
    $ckapolicy->setName('ContentKey Authorization Policy');
    $ckapolicy = $restProxy->createContentKeyAuthorizationPolicy($ckapolicy);

    // 4 Link the ContentKeyAuthorizationPolicyOption to the ContentKeyAuthorizationPolicy
    $restProxy->linkOptionToContentKeyAuthorizationPolicy($option, $ckapolicy);

    // 5 Associate the ContentKeyAuthorizationPolicy with the ContentKey
    $contentKey->setAuthorizationPolicyId($ckapolicy->getId());
    $restProxy->updateContentKey($contentKey);
}

function addTokenRestrictedAuthorizationPolicy($restProxy, $contentKey, $tokenType)
{
    // 1 Create ContentKeyAuthorizationPolicyRestriction (Token Restricted)
    $tokenRestriction = generateTokenRequirements($tokenType);
    $restriction = new ContentKeyAuthorizationPolicyRestriction();
    $restriction->setName('ContentKey Authorization Policy Restriction');
    $restriction->setKeyRestrictionType(ContentKeyRestrictionType::TOKEN_RESTRICTED);
    $restriction->setRequirements($tokenRestriction);

    // 2 Create ContentKeyAuthorizationPolicyOption (AES)
    $option = new ContentKeyAuthorizationPolicyOption();
    $option->setName('ContentKey Authorization Policy Option');
    $option->setKeyDeliveryType(ContentKeyDeliveryType::BASELINE_HTTP);
    $option->setRestrictions(array($restriction));
    $option = $restProxy->createContentKeyAuthorizationPolicyOption($option);

    // 3 Create ContentKeyAuthorizationPolicy
    $ckapolicy = new ContentKeyAuthorizationPolicy();
    $ckapolicy->setName('ContentKey Authorization Policy');
    $ckapolicy = $restProxy->createContentKeyAuthorizationPolicy($ckapolicy);

    // 4 Link the ContentKeyAuthorizationPolicyOption to the ContentKeyAuthorizationPolicy
    $restProxy->linkOptionToContentKeyAuthorizationPolicy($option, $ckapolicy);

    // 5 Associate the ContentKeyAuthorizationPolicy with the ContentKey
    $contentKey->setAuthorizationPolicyId($ckapolicy->getId());
    $restProxy->updateContentKey($contentKey);

    return $tokenRestriction;
}

function createAssetDeliveryPolicy($restProxy, $asset, $contentKey)
{
    // 1 Get the acquisition URL
    $acquisitionUrl = $restProxy->getKeyDeliveryUrl($contentKey, ContentKeyDeliveryType::BASELINE_HTTP);

    // 2 Generate the AssetDeliveryPolicy Configuration Key
    $randomKey = Utilities::generateCryptoKey(16);
    $configuration = [AssetDeliveryPolicyConfigurationKey::ENVELOPE_KEY_ACQUISITION_URL => $acquisitionUrl,
                      AssetDeliveryPolicyConfigurationKey::ENVELOPE_ENCRYPTION_IV_AS_BASE64 => base64_encode($randomKey)];
    $confJson = AssetDeliveryPolicyConfigurationKey::stringifyAssetDeliveryPolicyConfiguartionKey($configuration);

    // 3 Create the AssetDeliveryPolicy
    $adpolicy = new AssetDeliveryPolicy();
    $adpolicy->setName('Asset Delivery Policy');
    $adpolicy->setAssetDeliveryProtocol(AssetDeliveryProtocol::SMOOTH_STREAMING | AssetDeliveryProtocol::DASH | AssetDeliveryProtocol::HLS);
    $adpolicy->setAssetDeliveryPolicyType(AssetDeliveryPolicyType::DYNAMIC_ENVELOPE_ENCRYPTION);
    $adpolicy->setAssetDeliveryConfiguration($confJson);

    $adpolicy = $restProxy->createAssetDeliveryPolicy($adpolicy);

    // 4 Link the AssetDeliveryPolicy to the Asset
    $restProxy->linkDeliveryPolicyToAsset($asset, $adpolicy->getId());
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

function generateTestToken($tokenTemplateString, $contentKey)
{
    $template = TokenRestrictionTemplateSerializer::deserialize($tokenTemplateString);
    $contentKeyUUID = substr($contentKey->getId(), strlen('nb:kid:UUID:'));
    $expiration = strtotime('+12 hour');
    $token = TokenRestrictionTemplateSerializer::generateTestToken($template, null, $contentKeyUUID, $expiration);

    return $token;
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
