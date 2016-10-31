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
 * Represents ChannelInput ComplexType object used in media services.
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
class ChannelInput
{
    /**
     * ChannelInput InputKeyFrameInterval.
     *
     * @var \DateInterval
     */
    private $_keyFrameInterval;

    /**
     * ChannelInput StreamingProtocol.
     *
     * @var string
     */
    private $_streamingProtocol;

    /**
     * ChannelInput AccessControl.
     *
     * @var ChannelInputAccessControl
     */
    private $_accessControl;

    /**
     * ChannelInput Endpoints.
     *
     * @var ChannelEndpoint[]
     */
    private $_endpoints = [];

    /**
     * Create ChannelInput from array.
     *
     * @param array $options Array containing values for object properties
     *
     * @return ChannelInput
     */
    public static function createFromOptions($options)
    {
        $operation = new self();
        $operation->fromArray($options);

        return $operation;
    }

    /**
     * Fill ChannelInput from array.
     *
     * @param array $options Array containing values for object properties
     */
    public function fromArray($options)
    {
        if (!empty($options['KeyFrameInterval'])) {
            Validate::isString($options['KeyFrameInterval'], 'options[KeyFrameInterval]');
            $this->_keyFrameInterval = $options['KeyFrameInterval'];
        }

        if (isset($options['StreamingProtocol'])) {
            Validate::isString($options['StreamingProtocol'], 'options[StreamingProtocol]');
            $this->_streamingProtocol = $options['StreamingProtocol'];
        }

        if (isset($options['AccessControl'])) {
            Validate::isArray($options['AccessControl'], 'options[AccessControl]');
            $this->_accessControl = ChannelInputAccessControl::createFromOptions($options['AccessControl']);
        }

        if (!empty($options['Endpoints'])) {
            Validate::isArray($options['Endpoints'], 'options[Endpoints]');
            foreach ($options['Endpoints'] as $endpoint) {
                $this->_endpoints[] = ChannelEndpoint::createFromOptions($endpoint);
            }
        }
    }

    /**
     * Get the channel input AccessControl.
     *
     * @return ChannelInputAccessControl AccessControl
     */
    public function getAccessControl()
    {
        return $this->_accessControl;
    }

    /**
     * Set the channel input AccessControl.
     *
     * @param ChannelInputAccessControl $value AccessControl
     */
    public function setAccessControl(ChannelInputAccessControl $value)
    {
        $this->_accessControl = $value;
    }

    /**
     * Get the channel input KeyFrameInterval.
     *
     * Use ISO 8601 duration format. Allowed values are in the range from "PT1.9S" to "PT6.1S"
     *
     * @return string
     */
    public function getKeyFrameInterval()
    {
        return $this->_keyFrameInterval;
    }

    /**
     * Set the channel input KeyFrameInterval.
     *
     * @param string $value channel input KeyFrameInterval
     */
    public function setKeyFrameInterval($value)
    {
        $this->_keyFrameInterval = $value;
    }

    /**
     * Get the channel input StreamingProtocol.
     *
     * @return string
     */
    public function getStreamingProtocol()
    {
        return $this->_streamingProtocol;
    }

    /**
     * Set the channel input StreamingProtocol.
     *
     * @param string $value StreamingProtocol
     */
    public function setStreamingProtocol($value)
    {
        $this->_streamingProtocol = $value;
    }

    /**
     * Get the channel input Endpoints.
     *
     * @return ChannelEndpoint[] Endpoints
     */
    public function getEndpoints()
    {
        return $this->_endpoints;
    }
}
