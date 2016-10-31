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

use WindowsAzure\Common\Internal\Validate;

/**
 * Represents ChannelSlate ComplexType object used in media services.
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
class ChannelSlate
{
    /**
     * ChannelSlate InsertSlateOnAdMarker.
     *
     * @var bool
     */
    private $_insertSlateOnAdMarker;

    /**
     * ChannelSlate DefaultSlateAssetId.
     *
     * @var string
     */
    private $_defaultSlateAssetId;

    /**
     * Create ChannelSlate from array.
     *
     * @param array $options Array containing values for object properties
     *
     * @return ChannelSlate
     */
    public static function createFromOptions($options)
    {
        $operation = new self();
        $operation->fromArray($options);

        return $operation;
    }

    /**
     * Create ChannelSlate.
     */
    public function __construct()
    {
    }

    /**
     * Fill ChannelSlate from array.
     *
     * @param array $options Array containing values for object properties
     */
    public function fromArray($options)
    {
        if (isset($options['InsertSlateOnAdMarker'])) {
            Validate::isBoolean($options['InsertSlateOnAdMarker'], 'options[InsertSlateOnAdMarker]');
            $this->_insertSlateOnAdMarker = (bool) $options['InsertSlateOnAdMarker'];
        }

        if (isset($options['DefaultSlateAssetId'])) {
            Validate::isString($options['DefaultSlateAssetId'], 'options[DefaultSlateAssetIdUrl]');
            $this->_defaultSlateAssetId = $options['DefaultSlateAssetId'];
        }
    }

    /**
     * Get the ChannelSlate InsertSlateOnAdMarker.
     *
     * @return bool
     */
    public function getInsertSlateOnAdMarker()
    {
        return $this->_insertSlateOnAdMarker;
    }

    /**
     * Set the ChannelSlate InsertSlateOnAdMarker.
     *
     * @param bool $value ChannelSlate InsertSlateOnAdMarker
     */
    public function setInsertSlateOnAdMarker($value)
    {
        $this->_insertSlateOnAdMarker = $value;
    }

    /**
     * Get the ChannelSlate DefaultSlateAssetId.
     *
     * @return string
     */
    public function getDefaultSlateAssetId()
    {
        return $this->_defaultSlateAssetId;
    }

    /**
     * Set the ChannelSlate DefaultSlateAssetId.
     *
     * @param string $value ChannelSlate DefaultSlateAssetId
     */
    public function setDefaultSlateAssetId($value)
    {
        $this->_defaultSlateAssetId = $value;
    }
}
