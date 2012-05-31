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
 * @package   WindowsAzure
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
require_once 'PEAR/PackageFileManager2.php';
PEAR::setErrorHandling(PEAR_ERROR_DIE);

$package              = 'WindowsAzure';
$channel              = 'pear.blob.core.windows.net';
$release_version      = '0.1.0';
$api_version          = '0.1.0';
$release_state        = 'beta';
$api_state            = 'beta';
$min_php_version      = '5.3.0';
$min_pear_version     = '1.8.0';
$license              = 'Apache 2.0';
$license_agreement    = 'http://www.apache.org/licenses/LICENSE-2.0';
$summary              = '
Official PHP SDK for Microsoft Windows Azure.
';
$description          = '
The Windows Azure client libraries provide easy access to all Windows Azure REST services 
including Tables, Blobs, Queues, Service Bus, Service Management and Service Runtime.
';
$release_notes        = '
* Full support of Queue, Blob and Table services.
* Full support of Service Bus.
* Full support of Service Runtime.
* Support for storage services and affinity groups management operations.
';
$default_pear_channel = 'pear.php.net';
$dependencies         = array(
    array('required', 'HTTP_Request2', 	          $default_pear_channel),
    array('required', 'Mail_Mime',                $default_pear_channel),
    array('required', 'Mail_mimeDecode',          $default_pear_channel),
    array('optional', 'PEAR_PackageFileManager2', $default_pear_channel),
);

$p = &PEAR_PackageFileManager2::importOptions(
    dirname(__FILE__) . DIRECTORY_SEPARATOR . 'package.xml',
    array(
      'packagefile' => 'package.xml',
	  'ignore' => array('build/', 'tests/'),
      'filelistgenerator' => 'file',
      'packagedirectory' => dirname(__FILE__),
      'changelogoldtonew' => false,
      'simpleoutput' => false
      ));
$p->addInclude(array(
	'README.md',
	'LICENSE.txt',
	'WindowsAzure/'
));
$p->setPackage($package);
$p->setSummary($summary);
$p->setDescription($description);
$p->setNotes($release_notes);
$p->setPackageType('php');
$p->addRelease();
$p->clearDeps();
$p->setChannel($channel);
$p->setLicense($license, $license_agreement);
$p->setReleaseVersion($release_version);
$p->setAPIVersion($api_version);
$p->setReleaseStability($release_state);
$p->setAPIStability($api_state);
$p->setPhpDep($min_php_version);
// If this run twice the lead entry will be duplicated. Make sure that it just run once.
//$p->addMaintainer('lead', 'AzurePHPSDK', 'Azure PHP SDK', 'azurephpsdk@microsoft.com');
$p->setPearinstallerDep($min_pear_version);
foreach($dependencies as $dependency) {
    $p->addPackageDepWithChannel($dependency[0], $dependency[1], $dependency[2]);
}
// The replacement doesn't work check: https://github.com/WindowsAzure/azure-sdk-for-php/issues/413
$p->addReplacement('WindowsAzure/*.php', 'package-info', '@package_version@', 'version');
$p->generateContents();

if (isset($_GET['make']) || (isset($_SERVER['argv']) && @$_SERVER['argv'][1] == 'make')) {
	$p->writePackageFile();
} else {
    $p->debugPackageFile();
}