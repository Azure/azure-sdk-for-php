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
class ChannelOutputHls
{
    /**
     * ChannelOutputHls FragmentsPerSegment.
     *
     * @var int
     */
    private $_fragmentsPerSegment;

    /**
     * Create ChannelOutputHls from array.
     *
     * @param array $options Array containing values for object properties
     *
     * @return ChannelOutputHls
     */
    public static function createFromOptions($options)
    {
        $operation = new self();
        $operation->fromArray($options);

        return $operation;
    }

    /**
     * Create ChannelOutputHls.
     */
    public function __construct()
    {
    }

    /**
     * Fill ChannelOutputHls from array.
     *
     * @param array $options Array containing values for object properties
     */
    public function fromArray($options)
    {
        if (isset($options['FragmentsPerSegment'])) {
            Validate::isInteger($options['FragmentsPerSegment'], 'options[FragmentsPerSegment]');
            $this->_fragmentsPerSegment = (int) $options['FragmentsPerSegment'];
        }
    }

    /**
     * Get the ChannelOutputHls FragmentsPerSegment.
     *
     * @return int
     */
    public function getFragmentsPerSegment()
    {
        return $this->_fragmentsPerSegment;
    }

    /**
     * Set the ChannelOutputHls FragmentsPerSegment.
     *
     * @param int $value ChannelOutputHls FragmentsPerSegment
     */
    public function setFragmentsPerSegment($value)
    {
        $this->_fragmentsPerSegment = $value;
    }
}
