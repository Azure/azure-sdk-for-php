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
 * Represents ContentKeyDeliveryType type enum used in media services.
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
class ContentKeyDeliveryType
{
    /**
     * None.
     *
     * @var int
     */
    const NONE = 0;

    /**
     * Use PlayReady License acquisition protocol.
     *
     * @var int
     */
    const PLAYREADY_LICENSE = 1;

    /**
     * Use MPEG Baseline HTTP key protocol.
     *
     * @var int
     */
    const BASELINE_HTTP = 2;

    /**
     * Use Widevine license server.
     *
     * @var int
     */
    const WIDEVINE = 3;

    /**
     * Send FairPlay SPC to Key Delivery server and get CKC back.
     *
     * @var int
     */
    const FAIRPLAY = 4;
}
