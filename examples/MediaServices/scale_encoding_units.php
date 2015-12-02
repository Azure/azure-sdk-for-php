<?php
require_once 'vendor/autoload.php';
require_once "WindowsAzure/WindowsAzure.php";

use WindowsAzure\Common\ServicesBuilder;
use WindowsAzure\Common\Internal\MediaServicesSettings;
use WindowsAzure\MediaServices\Models\EncodingReservedUnit;
use WindowsAzure\MediaServices\Models\EncodingReservedUnitType;

$account = "<your media services account name>";
$secret = "<your media services account key>";
$reservedUnits = 1; 
$reservedUnitsType = EncodingReservedUnitType::S3; 

print "Azure SDK for PHP - Scale Encoding Units Sample\r\n";

// 1. set up the MediaServicesService object to call into the Media Services REST API.
$restProxy = ServicesBuilder::getInstance()->createMediaServicesService(new MediaServicesSettings($account, $secret));

// 2. retrieve the current configuration of Encoding Units
$encodingUntis = $restProxy->getEncodingReservedUnit();

// 3. set up the new encoding units settings.
$encodingUntis->setCurrentReservedUnits($reservedUnits);
$encodingUntis->setReservedUnitType($reservedUnitsType);

// 4. update the encoding reserved units
$restProxy->updateEncodingReservedUnit($encodingUntis);

// 5. reload the current configuration and show the results
$encodingUntis = $restProxy->getEncodingReservedUnit();

$types = array("S1", "S2", "S3");

echo("Encoding Reseverd Units Type: " . $types[$encodingUntis->getReservedUnitType()] . " Units: " . $encodingUntis->getCurrentReservedUnits() . "\r\n");

?>
