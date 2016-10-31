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

namespace WindowsAzure\MediaServices\Templates;

/**
 * Represents FairPlayConfiguration type used in media services.
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
class FairPlayConfiguration
{
    /**
     * @var string
     */
    public $ASkId;

    /**
     * @var string
     */
    public $FairPlayPfxPasswordId;

    /**
     * @var string
     */
    public $FairPlayPfx;

    /**
     * @var string
     */
    public $ContentEncryptionIV;

    /**
     * @param $cert
     * @param $pkey
     * @param $pfxPassword
     * @param $pfxPasswordKeyId
     * @param $askId
     * @param $contentIv
     *
     * @return string
     */
    public static function createSerializedFairPlayOptionConfiguration(
        $cert, $pkey, $pfxPassword, $pfxPasswordKeyId, $askId, $contentIv
    ) {
        openssl_pkcs12_export($cert, $certBytes, $pkey, $pfxPassword);
        $certString = base64_encode($certBytes);
        $template = new self();
        $template->ASkId = $askId;
        $template->ContentEncryptionIV = $contentIv;
        $template->FairPlayPfx = $certString;
        $template->FairPlayPfxPasswordId = $pfxPasswordKeyId;

        return json_encode($template);
    }
}
