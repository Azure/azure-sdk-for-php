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
 * Represents ErrorMessages type enumeration used in media services.
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
class ErrorMessages
{
    const UNCOMPRESSED_DIGITAL_AUDIO_OPL_VALUE_ERROR = 'The value can only be set to null, 100, 150, 200, 250, or 300.';

    const UNCOMPRESSED_DIGITAL_VIDEO_OPL_VALUE_ERROR = 'The value can only be set to null, 100, 250, 270, or 300.';

    const  BEGIN_DATE_AND_RELATIVE_BEGIN_DATE_CANNOTBE_SET_SIMULTANEOUSLY_ERROR =
        'Set BeginDate or RelativeBeginDate but not both';

    const EXPIRATION_DATE_AND_RELATIVE_EXPIRATION_DATE_CANNOTBE_SET_SIMULTANEOUSLY_ERROR =
        'Set ExpirationDate or RelativeExpirationDate but not both';

    const PLAY_READY_PLAY_RIGHT_REQUIRED =
        'Each PlayReadyLicenseTemplate in the PlayReadyLicenseResponseTemplate must have a PlayReadyPlayRight';

    const PLAY_READY_CONTENT_KEY_REQUIRED =
        'Each PlayReadyLicenseTemplate in the PlayReadyLicenseResponseTemplate must have either a ContentEncryptionKeyFromHeader or a ContentEncryptionKeyFromKeyIdentifier';

    const INVALID_TWO_BIT_CONFIGURATION_DATA = 'ConfigurationData must be 0, 1, 2, or 3';

    const GRACE_PERIOD_CANNOT_BE_SET_ON_NON_PERSISTENT_LICENSE =
        'GracePeriod cannot be set on Non Persistent licenses.';

    const FIRST_PLAY_EXPIRATION_CANNOT_BE_SET_ON_NON_PERSISTENT_LICENSE =
        'FirstPlayExpiration cannot be set on the PlayRight of a Non Persistent license.';

    const EXPIRATION_CANNOT_BE_SET_ON_NON_PERSISTENT_LICENSE =
        'ExpirationDate cannot be set on Non Persistent licenses.';

    const DIGITAL_VIDEO_ONLY_MUTUALLY_EXCLUSIVE_WITH_PASSING_TO_UNKNOWN_OUTPUT_ERROR =
        'PlayReady does not allow passing to unknown outputs if the DigitalVideoOnlyContentRestriction is enabled.';

    const COMPRESSED_DIGITAL_VIDEO_OPL_VALUE_ERROR = 'The value can only be set to null, 400, or 500.';

    const COMPRESSED_DIGITAL_AUDIO_OPL_VALUE_ERROR = 'The value can only be set to null, 100, 150, 200, 250, or 300.';

    const BEGIN_DATE_CANNOT_BE_SET_ON_NON_PERSISTENT_LICENSE = 'BeginDate cannot be set on Non Persistent licenses.';

    const AT_LEAST_ONE_LICENSE_TEMPLATE_REQUIRED =
        'A PlayReadyLicenseResponseTemplate must have at least one PlayReadyLicenseTemplate';

    const ANALOG_VIDEO_OPL_VALUE_ERROR = 'The value can only be set to null, 100, 150, or 200.';
}
