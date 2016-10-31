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
 * Represents AssetDeliveryPolicyType type enum used in media services.
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
class AssetDeliveryPolicyType
{
    /**
     * The asset delivery policy type "None".
     *
     * @var int
     */
    const NONE = 0;

    /**
     * The asset delivery policy type "Blocked".
     *
     * @var int
     */
    const BLOCKED = 1;

    /**
     * The asset delivery policy type "NoDynamicEncryption".
     *
     * @var int
     */
    const NO_DYNAMIC_ENCRYPTION = 2;

    /**
     * The asset delivery policy type "DynamicEnvelopeEncryption".
     *
     * @var int
     */
    const DYNAMIC_ENVELOPE_ENCRYPTION = 3;

    /**
     * The asset delivery policy type "DynamicCommonEncryption".
     *
     * @var int
     */
    const DYNAMIC_COMMON_ENCRYPTION = 4;

    /**
     * Apply Dynamic Common encryption with cbcs.
     *
     * @var int
     */
    const DYNAMIC_COMMON_ENCRYPTION_CBCS = 5;
}
