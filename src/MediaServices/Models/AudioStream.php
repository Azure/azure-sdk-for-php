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
 * Represents AudioStream ComplexType object used in media services.
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
class AudioStream
{
    /**
     * AudioStreams Index.
     *
     * @var int
     */
    private $_index;

    /**
     * AudioStreams Language.
     *
     * @var string
     */
    private $_language;

    /**
     * Create AudioStreams from array.
     *
     * @param array $options Array containing values for object properties
     *
     * @return AudioStream
     */
    public static function createFromOptions(array $options)
    {
        $operation = new self();
        $operation->fromArray($options);

        return $operation;
    }

    /**
     * Create AudioStreams.
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
     * Fill AudioStreams from array.
     *
     * @param array $options Array containing values for object properties
     */
    public function fromArray($options)
    {
        if (isset($options['Index'])) {
            Validate::isInteger($options['Index'], 'options[Index]');
            $this->_index = (int) $options['Index'];
        }

        if (isset($options['Language'])) {
            Validate::isString($options['Language'], 'options[Language]');
            $this->_language = $options['Language'];
        }
    }

    /**
     * Get the AudioStreams Index.
     *
     * @return string
     */
    public function getIndex()
    {
        return $this->_index;
    }

    /**
     * Set the AudioStreams Index.
     *
     * @param string $value AudioStreams Index
     */
    public function setIndex($value)
    {
        $this->_index = $value;
    }

    /**
     * Get the AudioStreams Language.
     *
     * @return string
     */
    public function getLanguage()
    {
        return $this->_language;
    }

    /**
     * Set the AudioStreams Language.
     *
     * @param string $value AudioStreams Language
     */
    public function setLanguage($value)
    {
        $this->_language = $value;
    }
}
