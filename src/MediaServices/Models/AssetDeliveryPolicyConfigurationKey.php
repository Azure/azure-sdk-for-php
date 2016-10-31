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
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */

namespace WindowsAzure\MediaServices\Models;

/**
 * Represents AssetDeliveryPolicyConfigurationKey type enum used in media services.
 *
 * @category  Microsoft
 *
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 *
 * @version   Release: 0.5.0_2016-11
 *
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
class AssetDeliveryPolicyConfigurationKey
{
    /**
     * No policies.
     *
     * @var int
     */
    const NONE = 0;

    /**
     * EnvelopeKeyAcquisitionUrl, Exact Envelope key URL.
     *
     * @var int
     */
    const ENVELOPE_KEY_ACQUISITION_URL = 1;

    /**
     * EnvelopeBaseKeyAcquisitionUrl, Base key url that will have KID=<Guid> appended for Envelope.
     *
     * @var int
     */
    const ENVELOPE_BESEKEY_ACQUISITION_URL = 2;

    /**
     * EnvelopeEncryptionIVAsBase64, The initialization vector to use for envelope encryption in Base64 format.
     *
     * @var int
     */
    const ENVELOPE_ENCRYPTION_IV_AS_BASE64 = 3;

    /**
     * PlayReadyLicenseAcquisitionUrl, The PlayReady License Acquisition Url to use for common encryption.
     *
     * @var int
     */
    const PLAYREADY_LICENSE_ACQUISITION_URL = 4;

    /**
     * PlayReadyCustomAttributes, The PlayReady Custom Attributes to add to the PlayReady Content Header.
     *
     * @var int
     */
    const PLAYREADY_CUSTOM_ATTRIBUTES = 5;

    /**
     * EnvelopeEncryptionIV, The initialization vector to use for envelope encryption.
     *
     * @var int
     */
    const ENVELOPE_ENCRYPTION_IV = 6;

    /**
     * WidevineLicenseAcquisitionUrl, Widevine DRM acquisition url.
     *
     * @var int
     */
    const WIDEVINE_LICENSE_ACQUISITION_URL = 7;

    /**
     * WidevineBaseLicenseAcquisitionUrl, Base Widevine url that will have KID=<Guid> appended.
     *
     * @var int
     */
    const WIDEVINE_BASE_LICENSE_ACQUISITION_URL = 8;

    /**
     * FairPlay license acquisition URL.
     *
     * @var int
     */
    const FAIRPLAY_LICENSE_ACQUISITION_URL = 9;

    /**
     * Base FairPlay license acquisition URL that will have KID=<Guid> appended.
     *
     * @var int
     */
    const FAIRPLAY_BASE_LICENSE_ACQUISITION_URL = 10;

    /**
     * Initialization Vector that will be used for encrypting the content. Must match
     * IV in the AssetDeliveryPolicy.
     *
     * @var int
     */
    const COMMON_ENCRYPTION_IV_FOR_CBCS = 11;

    /**
     * Helper function to stringify the AssetDeliveryPolicyConfigurationKey.
     *
     * @param array $array
     *
     * @return string
     */
    public static function stringifyAssetDeliveryPolicyConfigurationKey(array $array)
    {
        $jsonArray = [];
        foreach ($array as $key => $value) {
            $jsonArray[] = ['Key' => $key, 'Value' => $value];
        }

        return json_encode($jsonArray);
    }

    /**
     * Helper function to pack the AssetDeliveryPolicyConfigurationKey.
     *
     * @param string $json
     *
     * @return array the unpacked array
     */
    public static function parseAssetDeliveryPolicyConfigurationKey($json)
    {
        $result = [];
        $array = json_decode($json, true);
        foreach ($array as $item) {
            $item = array_change_key_case($item, CASE_LOWER);
            $result[$item['key']] = $item['value'];
        }

        return $result;
    }
}
