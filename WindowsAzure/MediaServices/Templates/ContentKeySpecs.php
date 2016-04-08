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
 * @package   WindowsAzure\MediaServices\Models
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */

namespace WindowsAzure\MediaServices\Templates;

/**
 * Represents ContentKeySpecs type used in media services
 *
 * @category  Microsoft
 * @package   WindowsAzure\MediaServices\Models
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: 0.4.2_2016-04
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
class ContentKeySpecs
{
    /**
     * A track type name.
     *
     * @var string
     */
    public $track_type;

    /**
     * Unique identifier for the key.
     *
     * @var string
     */
    public $key_id;

    /**
     * Defines client robustness requirements for playback.
     * 1 - Software-based whitebox crypto is required.
     * 2 - Software crypto and an obfuscated decoder is required.
     * 3 - The key material and crypto operations must be performed within a hardware backed trusted execution environment.
     * 4 - The crypto and decoding of content must be performed within a hardware backed trusted execution environment.
     * 5 - The crypto, decoding and all handling of the media (compressed and uncompressed) must be handled within a hardware backed trusted execution environment.
     *
     * @var int
     */
    public $security_level;

    /**
     * Indicates whether HDCP V1 or V2 is required or not.
     *
     * @var RequiredOutputProtection  
     */
    public $required_output_protection;
}



