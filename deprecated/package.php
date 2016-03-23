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
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */

require_once 'PEAR/PackageFileManager2.php';
require_once 'Defaults.php';
PEAR::setErrorHandling(PEAR_ERROR_DIE);

$p = &PEAR_PackageFileManager2::importOptions(
    dirname(__FILE__) . DIRECTORY_SEPARATOR . 'package.xml',
    array(
      'packagefile' => 'package.xml',
	  'ignore' => $ignore,
      'filelistgenerator' => 'file',
      'packagedirectory' => dirname(__FILE__),
      'changelogoldtonew' => false,
      'simpleoutput' => false
      ));
$p->addInclude($include);
$p->setPackage(PACKAGE_NAME);
$p->setSummary(PACKAGE_SUMMARY);
$p->setDescription(PACKAGE_DESCRIPTION);
$p->setNotes(PACKAGE_RELEASE_NOTES);
$p->setPackageType('php');
$p->addRelease();
$p->clearDeps();
$p->setChannel(CHANNEL_NAME);
$p->setLicense(PACKAGE_LICENSE, PACKAGE_LICENSE_AGREEMENT);
$p->setReleaseVersion(PACKAGE_RELEASE_VERSION);
$p->setAPIVersion(PACKAGE_API_VERSION);
$p->setReleaseStability(PACKAGE_RELEASE_STATE);
$p->setAPIStability(PACKAGE_API_STATE);
$p->setPhpDep(PACKAGE_MIN_PHP_VERSION);
// If this run twice the lead entry will be duplicated. Make sure that it just run once.
//$p->addMaintainer('lead', 'AzurePHPSDK', 'Azure PHP SDK', 'azurephpsdk@microsoft.com');
$p->setPearinstallerDep(PACKAGE_MIN_PEAR_VERSION);
foreach($dependencies as $dependency) {
    $p->addPackageDepWithChannel($dependency[0], $dependency[1], $dependency[2]);
}
// The replacement doesn't work check: https://github.com/WindowsAzure/azure-sdk-for-php/issues/413
// $p->addReplacement('WindowsAzure/*.php', 'package-info', '0.3.1_2011-08', 'version');
$p->generateContents();

if (isset($_GET['make']) || (isset($_SERVER['argv']) && @$_SERVER['argv'][1] == 'make')) {
	$p->writePackageFile();
} else {
    $p->debugPackageFile();
}