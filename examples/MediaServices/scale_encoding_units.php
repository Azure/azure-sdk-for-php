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
 * @package   Client
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */

require_once 'vendor/autoload.php';

use WindowsAzure\Common\ServicesBuilder;
use WindowsAzure\Common\Internal\MediaServicesSettings;
use WindowsAzure\MediaServices\Models\EncodingReservedUnit;
use WindowsAzure\MediaServices\Models\EncodingReservedUnitType;

// Settings
date_default_timezone_set('America/Los_Angeles');

$account = "<your media services account name>";
$secret = "<your media services account key>";

$reservedUnits = 1; 
$reservedUnitsType = EncodingReservedUnitType::S1; 
$types = array("S1", "S2", "S3");

print "Azure SDK for PHP - Scale Encoding Units Sample\r\n";

// 1. set up the MediaServicesService object to call into the Media Services REST API
$restProxy = ServicesBuilder::getInstance()->createMediaServicesService(new MediaServicesSettings($account, $secret));

// 2. retrieve the current configuration of Encoding Units
$encodingUntis = $restProxy->getEncodingReservedUnit();

echo("Current Encoding Reserved Units: " . $encodingUntis->getCurrentReservedUnits() . " units (" . $types[$encodingUntis->getReservedUnitType()] . ")\r\n");
echo("Updating to: " . $reservedUnits . " units (" . $types[$reservedUnitsType] . ") ...");

// 3. set up the new encoding units settings
$encodingUntis->setCurrentReservedUnits($reservedUnits);
$encodingUntis->setReservedUnitType($reservedUnitsType);

// 4. update the encoding reserved units
$restProxy->updateEncodingReservedUnit($encodingUntis);

// 5. reload the current configuration and show the results
$encodingUntis = $restProxy->getEncodingReservedUnit();

echo("\r\nUpdated Encoding Reserved Units: " . $encodingUntis->getCurrentReservedUnits() . " units (" . $types[$encodingUntis->getReservedUnitType()] . ")\r\n");

?>
