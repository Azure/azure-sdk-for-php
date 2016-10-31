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
 * Represents ChannelPreview ComplexType object used in media services.
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
class ChannelPreview
{
    /**
     * ChannelPreview AccessControl.
     *
     * @var ChannelPreviewAccessControl
     */
    private $_accessControl;

    /**
     * ChannelPreview Endpoints.
     *
     * @var ChannelEndpoint[]
     */
    private $_endpoints = [];

    /**
     * Create ChannelPreview from array.
     *
     * @param array $options Array containing values for object properties
     *
     * @return ChannelPreview
     */
    public static function createFromOptions($options)
    {
        $operation = new self();
        $operation->fromArray($options);

        return $operation;
    }

    /**
     * Fill ChannelPreview from array.
     *
     * @param array $options Array containing values for object properties
     */
    public function fromArray($options)
    {
        if (!empty($options['AccessControl'])) {
            Validate::isArray($options['AccessControl'], 'options[AccessControl]');
            $this->_accessControl = ChannelPreviewAccessControl::createFromOptions($options['AccessControl']);
        }

        if (!empty($options['Endpoints'])) {
            Validate::isArray($options['Endpoints'], 'options[Endpoints]');
            foreach ($options['Endpoints'] as $endpoint) {
                $this->_endpoints[] = ChannelEndpoint::createFromOptions($endpoint);
            }
        }
    }

    /**
     * Get the ChannelPreview AccessControl.
     *
     * @return ChannelPreviewAccessControl
     */
    public function getAccessControl()
    {
        return $this->_accessControl;
    }

    /**
     * Set the ChannelPreview AccessControl.
     *
     * @param ChannelPreviewAccessControl $value ChannelPreview AccessControl
     */
    public function setAccessControl(ChannelPreviewAccessControl $value)
    {
        $this->_accessControl = $value;
    }

    /**
     * Get the ChannelPreview Endpoints.
     *
     * @return ChannelEndpoint[]
     */
    public function getEndpoints()
    {
        return $this->_endpoints;
    }
}
