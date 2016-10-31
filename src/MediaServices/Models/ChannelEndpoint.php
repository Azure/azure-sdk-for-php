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
 * Represents ChannelEndpoint ComplexType object used in media services.
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
class ChannelEndpoint
{
    /**
     * ChannelEndpoint Protocol.
     *
     * @var string
     */
    private $_protocol;

    /**
     * ChannelEndpoint Url.
     *
     * @var string
     */
    private $_url;

    /**
     * Create ChannelEndpoint from array.
     *
     * @param array $options Array containing values for object properties
     *
     * @return ChannelEndpoint
     */
    public static function createFromOptions($options)
    {
        $operation = new self();
        $operation->fromArray($options);

        return $operation;
    }

    /**
     * Create ChannelEndpoint.
     */
    public function __construct()
    {
    }

    /**
     * Fill ChannelEndpoint from array.
     *
     * @param array $options Array containing values for object properties
     */
    public function fromArray($options)
    {
        if (isset($options['Protocol'])) {
            Validate::isString($options['Protocol'], 'options[Protocol]');
            $this->_protocol = $options['Protocol'];
        }
        if (isset($options['Url'])) {
            Validate::isString($options['Url'], 'options[Url]');
            $this->_url = $options['Url'];
        }
    }

    /**
     * Get the ChannelEndpoint Protocol.
     *
     * @return string
     */
    public function getProtocol()
    {
        return $this->_protocol;
    }

    /**
     * Set the ChannelEndpoint Protocol.
     *
     * @param string $value ChannelEndpoint Protocol
     */
    public function setProtocol($value)
    {
        $this->_protocol = $value;
    }

    /**
     * Get the ChannelEndpoint Url.
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->_url;
    }

    /**
     * Set the ChannelEndpoint Url.
     *
     * @param string $value ChannelEndpoint Url
     */
    public function setUrl($value)
    {
        $this->_url = $value;
    }
}
