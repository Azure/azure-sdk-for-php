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
 * @copyright Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */

const CHANNEL_NAME = 'pear.windowsazure.com';
const CHANNEL_SUMMARY = 'Windows Azure PEAR channel';
const CHANNEL_ALIAS = 'WindowsAzure';
const CHANNEL_URL = 'http://pear.windowsazure.com/';
const CHANNEL_STORAGE_SERVICE_NAME = 'pear';
const CHANNEL_DIR_NAME = 'channel';
const CHANNEL_MAIN_CONTAINER = '$root';
const CHANNEL_GET_CONTAINER = 'get';
const CHANNEL_REST_CONTAINER = 'rest';
const PACKAGE_NAME = 'WindowsAzure';
const PACKAGE_RELEASE_VERSION = '0.4.1';
const PACKAGE_API_VERSION = '0.4.1';
const PACKAGE_RELEASE_STATE = 'beta';
const PACKAGE_API_STATE = 'beta';
const PACKAGE_MIN_PHP_VERSION = '5.3.0';
const PACKAGE_MIN_PEAR_VERSION = '1.8.0';
const PACKAGE_LICENSE = 'Apache 2.0';
const PACKAGE_LICENSE_AGREEMENT = 'http://www.apache.org/licenses/LICENSE-2.0';
const PACKAGE_SUMMARY = 'Windows Azure SDK for PHP.';
const PACKAGE_DESCRIPTION = '
This package contains client libraries for accessing the Windows Azure Tables, Blobs,
Queues, Service Runtime, Service Management, Service Bus (Queues, Topics) and Media Services REST APIs.
It is build as a thin REST call wrapper where each server call maps to a single method call within the library.
';
const PACKAGE_RELEASE_NOTES = '
- Improved API support for Media Services:
    * Encrypting assets
    * Bulk ingesting
    * Uploading of large files
- Updated storage API version to 2012-02-12
';
$dependencies = array(
    array('required', 'HTTP_Request2',            'pear.php.net'),
    array('required', 'Mail_Mime',                'pear.php.net'),
    array('required', 'Mail_mimeDecode',          'pear.php.net'),
    array('optional', 'PEAR_PackageFileManager2', 'pear.php.net'),
    array('optional', 'Pirum',                    'pear.pirum-project.org')
);
$ignore = array(
    'build/',
    'tests/',
    'channel/'
);
$include = array(
    'README.md',
    'LICENSE.txt',
    'WindowsAzure/'
);

