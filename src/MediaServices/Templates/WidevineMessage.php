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
 * Represents WidevineMessage type used in media services.
 *
 * @category  Microsoft
 *
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 *
 * @version   Release: 0.4.5_2016-09
 *
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
class WidevineMessage
{
    /**
     * Controls which content keys should be included in a license. 
     * Only one of allowed_track_types and content_key_specs can be specified.
     *
     * @var string
     */
    public $allowed_track_types;

    /**
     * A finer grained control on what content keys to return. 
     * Only one of allowed_track_types and content_key_specs can be specified.
     *
     * @var ContentKeySpecs[]
     */
    public $content_key_specs;

    /**
     * Policy settings for this license. In the event this asset has 
     * a pre-defined policy, these specified values will be used.
     *
     * @var mixed
     */
    public $policy_overrides;
}
