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
 * Represents VideoStream ComplexType object used in media services.
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
class VideoStream
{
    /**
     * VideoStream Index.
     *
     * @var int
     */
    private $_index;

    /**
     * Create VideoStream from array.
     *
     * @param array $options Array containing values for object properties
     *
     * @return VideoStream
     */
    public static function createFromOptions($options)
    {
        $operation = new self();
        $operation->fromArray($options);

        return $operation;
    }

    /**
     * Create VideoStream.
     */
    public function __construct()
    {
    }

    /**
     * Return a list of fields that must be sent (even if it's null or zero).
     *
     * @return string[]
     */
    public function requiredFields()
    {
        return ['Index'];
    }

    /**
     * Fill VideoStream from array.
     *
     * @param array $options Array containing values for object properties
     */
    public function fromArray($options)
    {
        if (isset($options['Index'])) {
            Validate::isInteger($options['Index'], 'options[Index]');
            $this->_index = (int) $options['Index'];
        }
    }

    /**
     * Get the VideoStream Index.
     *
     * @return string
     */
    public function getIndex()
    {
        return $this->_index;
    }

    /**
     * Set the VideoStream Index.
     *
     * @param string $value VideoStream Index
     */
    public function setIndex($value)
    {
        $this->_index = $value;
    }
}
