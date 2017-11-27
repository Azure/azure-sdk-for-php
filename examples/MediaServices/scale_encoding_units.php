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
use WindowsAzure\MediaServices\Authentication\AzureAdTokenCredentials;
use WindowsAzure\MediaServices\Authentication\AzureAdClientSymmetricKey;
use WindowsAzure\MediaServices\Authentication\AzureAdTokenProvider;
use WindowsAzure\MediaServices\Authentication\AzureEnvironments;
use WindowsAzure\MediaServices\Models\EncodingReservedUnitType;

// read user settings from config
include_once 'userconfig.php';

$reservedUnits = 1;
$reservedUnitsType = EncodingReservedUnitType::S1;
$types = array('S1', 'S2', 'S3');

echo "Azure SDK for PHP - Scale Encoding Units Sample".PHP_EOL;

// 1. Instantiate the credentials, the token provider and connect to Azure Media Services
$credentials = new AzureAdTokenCredentials(
    $tenant, new AzureAdClientSymmetricKey($clientId, $clientKey),
    AzureEnvironments::AZURE_CLOUD_ENVIRONMENT());
$provider = new AzureAdTokenProvider($credentials);
$restProxy = ServicesBuilder::getInstance()->createMediaServicesService(new MediaServicesSettings($restApiEndpoint, $provider));

// 2. retrieve the current configuration of Encoding Units
$encodingUnits = $restProxy->getEncodingReservedUnit();

echo 'Current Encoding Reserved Units: '.$encodingUnits->getCurrentReservedUnits().' units ('.$types[$encodingUnits->getReservedUnitType()].")".PHP_EOL;
echo 'Updating to: '.$reservedUnits.' units ('.$types[$reservedUnitsType].') ...';

// 3. set up the new encoding units settings
$encodingUnits->setCurrentReservedUnits($reservedUnits);
$encodingUnits->setReservedUnitType($reservedUnitsType);

// 4. update the encoding reserved units
$restProxy->updateEncodingReservedUnit($encodingUnits);

// 5. reload the current configuration and show the results
$encodingUnits = $restProxy->getEncodingReservedUnit();

echo PHP_EOL."Updated Encoding Reserved Units: ".$encodingUnits->getCurrentReservedUnits().' units ('.$types[$encodingUnits->getReservedUnitType()].")".PHP_EOL;
