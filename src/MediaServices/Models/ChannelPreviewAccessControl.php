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
 * Represents ChannelPreviewAccessControl ComplexType object used in media services.
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
class ChannelPreviewAccessControl
{
    /**
     * ChannelPreviewAccessControl IP.
     *
     * @var IPAccessControl
     */
    private $_ip;

    /**
     * Create ChannelPreviewAccessControl from array.
     *
     * @param array $options Array containing values for object properties
     *
     * @return ChannelPreviewAccessControl
     */
    public static function createFromOptions(array $options)
    {
        $operation = new self();
        $operation->fromArray($options);

        return $operation;
    }

    /**
     * Create ChannelInputAccessControl.
     */
    public function __construct()
    {
    }

    /**
     * Fill ChannelPreviewAccessControl from array.
     *
     * @param array $options Array containing values for object properties
     */
    public function fromArray(array $options)
    {
        if (!empty($options['IP'])) {
            Validate::isArray($options['IP'], 'options[IP]');
            $this->_ip = IPAccessControl::createFromOptions($options['IP']);
        }
    }

    /**
     * Get the ChannelPreviewAccessControl IP.
     *
     * @return IPAccessControl
     */
    public function getIP()
    {
        return $this->_ip;
    }

    /**
     * Set the ChannelPreviewAccessControl IP.
     *
     * @param IPAccessControl $value ChannelPreviewAccessControl IP
     */
    public function setIP(IPAccessControl $value)
    {
        $this->_ip = $value;
    }
}
