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
use WindowsAzure\MediaServices\Authentication\AzureAdClientUserCredentials;
use WindowsAzure\MediaServices\Authentication\AzureAdTokenProvider;
use WindowsAzure\MediaServices\Authentication\AzureEnvironments;
use WindowsAzure\MediaServices\Models\Asset;

// read user settings from config
include_once 'userconfig.php';

echo "Azure SDK for PHP - AzureAD User/Password Authentication Sample".PHP_EOL;

// 1 - Instantiate the credentials
$credentials = new AzureAdTokenCredentials(
    $tenant,
    new AzureAdClientUserCredentials($username, $password),
    AzureEnvironments::AZURE_CLOUD_ENVIRONMENT());

// 2 - Instantiate a token provider
$provider = new AzureAdTokenProvider($credentials);

// 3 - Connect to Azure Media Services
$restProxy = ServicesBuilder::getInstance()->createMediaServicesService(new MediaServicesSettings($restApiEndpoint, $provider));

// 4 - List assets (sample operation)
print('Listing Assets:' . PHP_EOL);
foreach($restProxy->getAssetList() as $asset)
{
    print('Asset Id=' . $asset->getId() . ' Name=' . $asset->getName() . PHP_EOL);
}
