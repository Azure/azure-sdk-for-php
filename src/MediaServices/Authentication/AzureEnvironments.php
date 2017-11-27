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
 * @copyright Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 *
 * @link      https://github.com/WindowsAzure/azure-sdk-for-php
 */

namespace WindowsAzure\MediaServices\Authentication;

use WindowsAzure\MediaServices\Authentication\AzureEnvironment;
use WindowsAzure\MediaServices\Authentication\AzureEnvironmentConstants;

/**
 * Holds all Azure Media Services Environments
 *
 * @category  Microsoft
 *
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 *
 * @version   Release: 0.5.0_2016-11
 *
 * @link      https://github.com/WindowsAzure/azure-sdk-for-php
 */
class AzureEnvironments {

    /**
     * Azure Cloud environment.
     */
    private static $AZURE_CLOUD_ENVIRONMENT;

    /**
     *  Azure China Cloud environment.
     */
    private static $AZURE_CHINA_CLOUD_ENVIRONMENT;

    /**
     * Azure US Government environment.
     */
    private static $AZURE_US_GOVERNMENT_ENVIRONMENT;

    /**
     * Azure German Cloud environment.
     */
    private static $AZURE_GERMAN_CLOUD_ENVIRONMENT;

    public static function AZURE_CLOUD_ENVIRONMENT() {
        if (self::$AZURE_CLOUD_ENVIRONMENT == NULL) {
            self::$AZURE_CLOUD_ENVIRONMENT = new AzureEnvironment(
                AzureEnvironmentConstants::AZURE_CLOUD_ACTIVE_DIRECTORY_ENDPOINT,
                AzureEnvironmentConstants::AZURE_CLOUD_MEDIA_SERVICES_RESOURCE,
                AzureEnvironmentConstants::SDK_AAD_APPLICATION_ID,
                AzureEnvironmentConstants::SDK_AAD_APPLICATION_REDIRECT_URI);
        }

        return self::$AZURE_CLOUD_ENVIRONMENT;
    }

    public static function AZURE_CHINA_CLOUD_ENVIRONMENT() {
        if (self::$AZURE_CHINA_CLOUD_ENVIRONMENT == NULL) {
            self::$AZURE_CHINA_CLOUD_ENVIRONMENT = new AzureEnvironment(
                AzureEnvironmentConstants::AZURE_CHINA_CLOUD_ACTIVE_DIRECTORY_ENDPOINT,
                AzureEnvironmentConstants::AZURE_CHINA_CLOUD_MEDIA_SERVICES_RESOURCE,
                AzureEnvironmentConstants::SDK_AAD_APPLICATION_ID,
                AzureEnvironmentConstants::SDK_AAD_APPLICATION_REDIRECT_URI);
        }

        return self::$AZURE_CHINA_CLOUD_ENVIRONMENT;
    }

    public static function AZURE_GERMAN_CLOUD_ENVIRONMENT() {
        if (self::$AZURE_GERMAN_CLOUD_ENVIRONMENT == NULL) {
            self::$AZURE_GERMAN_CLOUD_ENVIRONMENT = new AzureEnvironment(
                AzureEnvironmentConstants::AZURE_GERMAN_CLOUD_ACTIVE_DIRECTORY_ENDPOINT,
                AzureEnvironmentConstants::AZURE_GERMAN_CLOUD_MEDIA_SERVICES_RESOURCE,
                AzureEnvironmentConstants::SDK_AAD_APPLICATION_ID,
                AzureEnvironmentConstants::SDK_AAD_APPLICATION_REDIRECT_URI);
        }

        return self::$AZURE_GERMAN_CLOUD_ENVIRONMENT;
    }

    public static function AZURE_US_GOVERNMENT_ENVIRONMENT() {
        if (self::$AZURE_US_GOVERNMENT_ENVIRONMENT == NULL) {
            self::$AZURE_US_GOVERNMENT_ENVIRONMENT = new AzureEnvironment(
                AzureEnvironmentConstants::AZURE_US_GOVERNMENT_ACTIVE_DIRECTORY_ENDPOINT,
                AzureEnvironmentConstants::AZURE_US_GOVERNMENT_MEDIA_SERVICES_RESOURCE,
                AzureEnvironmentConstants::AZURE_US_GOVERNMENT_SDK_AAD_APPLIATION_ID,
                AzureEnvironmentConstants::SDK_AAD_APPLICATION_REDIRECT_URI);
        }

        return self::$AZURE_US_GOVERNMENT_ENVIRONMENT;
    }
}

