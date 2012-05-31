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

$package = 'WindowsAzure';
$channel = 'pear.windowsazure.com';
$installDir = 'AzureSDKForPHP';
$summary = '
Summary for Windows Azure SDK for PHP
';
$description = '
Description for Windows Azure SDK for PHP
';
$release_version = '1.0.0';
$release_state = 'stable';
$release_notes = '
* Full support of Windows Azure sotrage services Queue, Blob and Table.
* Full support of Windows Azure service bus.
* Support for storage services and affinity groups management operations.
';

$p = &PEAR_PackageFileManager2::importOptions(
    dirname(__FILE__) . DIRECTORY_SEPARATOR . 'package.xml',
    array(
      'packagefile' => 'package.xml',
	  'ignore' => array('build/', 'tests/'),
      'filelistgenerator' => 'file',
      'packagedirectory' => dirname(__FILE__),
      'changelogoldtonew' => false,
      'baseinstalldir' => $installDir,
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
$p->setLicense('Apache 2.0', 'https://github.com/WindowsAzure/azure-sdk-for-php/blob/master/LICENSE.txt');
$p->setReleaseVersion($release_version);
$p->setAPIVersion('1.0.0');
$p->setReleaseStability($release_state);
$p->setAPIStability('stable');
$p->setPhpDep('5.3.0');
// Uncomment when the lead entry doesn't exist at all, run once and then comment it back.
//$p->addMaintainer('lead', 'AzurePHPSDK', 'Azure PHP SDK', 'azurephpsdk@microsoft.com');
$p->setPearinstallerDep('1.8.0');
$p->addPackageDepWithChannel('required', 'HTTP_Request2', 'pear.php.net');
$p->addPackageDepWithChannel('required', 'Mail_Mime', 'pear.php.net');
$p->addPackageDepWithChannel('required', 'Mail_mimeDecode', 'pear.php.net');
$p->addPackageDepWithChannel('optional', 'PEAR_PackageFileManager2', 'pear.php.net');
// The replacement doesn't work check: https://github.com/WindowsAzure/azure-sdk-for-php/issues/413
$p->addReplacement('WindowsAzure/*.php', 'package-info', '@package_version@', 'version');
$p->generateContents();

if (isset($_GET['make']) || (isset($_SERVER['argv']) && @$_SERVER['argv'][1] == 'make')) {
	$p->writePackageFile();
} else {
    $p->debugPackageFile();
}