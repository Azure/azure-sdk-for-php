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

/**
 * Holds the Azure Media Services Environmental constants
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
class AzureEnvironmentConstants {

    /**
     * The Active Directory endpoint for Azure Cloud environment.
     */
    const AZURE_CLOUD_ACTIVE_DIRECTORY_ENDPOINT = "https://login.microsoftonline.com/";

    /**
     * The Media Services resource for Azure Cloud environment.
     */
    const AZURE_CLOUD_MEDIA_SERVICES_RESOURCE = "https://rest.media.azure.net";

    /**
     * The Active Directory endpoint for Azure China Cloud environment.
     */
    const AZURE_CHINA_CLOUD_ACTIVE_DIRECTORY_ENDPOINT = "https://login.chinacloudapi.cn/";

    /**
     * The Media Services resource for Azure China Cloud environment.
     */
    const AZURE_CHINA_CLOUD_MEDIA_SERVICES_RESOURCE = "https://rest.media.chinacloudapi.cn";

    /**
     * The Active Directory endpoint for Azure US Government environment.
     */
    const AZURE_US_GOVERNMENT_ACTIVE_DIRECTORY_ENDPOINT = "https://login-us.microsoftonline.com/";

    /**
     * The Media Services resource for Azure US Government environment.
     */
    const AZURE_US_GOVERNMENT_MEDIA_SERVICES_RESOURCE = "https://rest.media.usgovcloudapi.net";

    /**
     * The native SDK AAD application ID for Azure US Government environment.
     */
    const AZURE_US_GOVERNMENT_SDK_AAD_APPLIATION_ID = "68dac91e-cab5-461b-ab4a-ec7dcff0bd67";

    /**
     * The Active Directory endpoint for Azure German cloud environment.
     */
    const AZURE_GERMAN_CLOUD_ACTIVE_DIRECTORY_ENDPOINT = "https://login.microsoftonline.de/";

    /**
     * The Media Services resource for Azure German Cloud environment.
     */
    const AZURE_GERMAN_CLOUD_MEDIA_SERVICES_RESOURCE = "https://rest.media.cloudapi.de";

    /**
     * The native SDK AAD application ID for Azure Cloud, Azure China Cloud and Azure German Cloud environment.
     */
    const SDK_AAD_APPLICATION_ID = "d476653d-842c-4f52-862d-397463ada5e7";

    /**
     * The native SDK AAD application's redirect URL for all environments.
     */
    const SDK_AAD_APPLICATION_REDIRECT_URI = "https://AzureMediaServicesNativeSDK";
}
