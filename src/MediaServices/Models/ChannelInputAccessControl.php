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
 * Represents ChannelInputAccessControl ComplexType object used in media services.
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
class ChannelInputAccessControl
{
    /**
     * ChannelInputAccessControl IP.
     *
     * @var IPAccessControl
     */
    private $_ip;

    /**
     * Create ChannelInputAccessControl from array.
     *
     * @param array $options Array containing values for object properties
     *
     * @return ChannelInputAccessControl
     */
    public static function createFromOptions($options)
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
     * Fill ChannelInputAccessControl from array.
     *
     * @param array $options Array containing values for object properties
     */
    public function fromArray($options)
    {
        if (isset($options['IP'])) {
            Validate::isArray($options['IP'], 'options[IP]');
            $this->_ip = IPAccessControl::createFromOptions($options['IP']);
        }
    }

    /**
     * Get the ChannelInputAccessControl IP.
     *
     * @return IPAccessControl
     */
    public function getIP()
    {
        return $this->_ip;
    }

    /**
     * Set the ChannelInputAccessControl IP.
     *
     * @param IPAccessControl $value ChannelInputAccessControl IP
     */
    public function setIP(IPAccessControl $value)
    {
        $this->_ip = $value;
    }
}
