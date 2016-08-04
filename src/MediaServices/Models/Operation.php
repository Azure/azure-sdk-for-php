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
 * Represents Operation object used in media services.
 *
 * @category  Microsoft
 *
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 *
 * @version   Release: 0.4.3_2016-05
 *
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
class Operation
{
    /**
     * Operation id.
     *
     * @var string
     */
    private $_id;

    /**
     * Operation ErrorCode.
     *
     * @var string
     */
    private $_errorCode;

    /**
     * Operation ErrorMessage.
     *
     * @var string
     */
    private $_errorMessage;

    /**
     * Operation State.
     *
     * @var string
     */
    private $_state;

    /**
     * Operation TargetEntityId.
     *
     * @var string
     */
    private $_targetEntityId;

    /**
     * Create Operation from array.
     *
     * @param array $options Array containing values for object properties
     *
     * @return Operation
     */
    public static function createFromOptions($options)
    {
        $operation = new self();
        $operation->fromArray($options);

        return $operation;
    }

    /**
     * Create Operation.
     */
    public function __construct()
    {
    }

    /**
     * Fill Operation from array.
     *
     * @param array $options Array containing values for object properties
     */
    public function fromArray($options)
    {
        if (isset($options['Id'])) {
            Validate::isString($options['Id'], 'options[Id]');
            $this->_id = $options['Id'];
        }

        if (isset($options['ErrorCode'])) {
            Validate::isString($options['ErrorCode'], 'options[ErrorCode]');
            $this->_errorCode = $options['ErrorCode'];
        }

        if (isset($options['ErrorMessage'])) {
            Validate::isString($options['ErrorMessage'], 'options[ErrorMessage]');
            $this->_errorMessage = $options['ErrorMessage'];
        }

        if (isset($options['State'])) {
            Validate::isString($options['State'], 'options[State]');
            $this->_state = $options['State'];
        }

        if (isset($options['TargetEntityId'])) {
            Validate::isString($options['TargetEntityId'], 'options[TargetEntityId]');
            $this->_targetEntityId = $options['TargetEntityId'];
        }
    }

    /**
     * Get the operation identifier.
     *
     * @return string
     */
    public function getId()
    {
        return $this->_id;
    }

    /**
     * Set the operation identifier
     *
     * @param string $value Operation id
     */
    public function setId($value)
    {
        $this->_id = $value;
    }

    /**
     * Get the Operation ErrorCode.
     *
     * @return string
     */
    public function getErrorCode()
    {
        return $this->_errorCode;
    }

    /**
     * Set the Operation ErrorCode.
     *
     * @param string $value Name
     */
    public function setErrorCode($value)
    {
        $this->_name = $value;
    }

    /**
     * Get the Operation ErrorMessage.
     *
     * @return string ErrorMessage
     */
    public function getErrorMessage()
    {
        return $this->_errorMessage;
    }

    /**
     * Set the Operation ErrorMessage.
     *
     * @param string $value ErrorMessage 
     */
    public function setErrorMessage($value)
    {
        $this->_errorMessage = $value;
    }

    /**
     * Get the Operation State.
     *
     * @return string State
     */
    public function getState()
    {
        return $this->_state;
    }

    /**
     * Set the Operation State.
     *
     * @param string $value State
     */
    public function setState($value)
    {
        $this->_state = $value;
    }

    /**
     * Get the Operation TargetEntityId.
     *
     * @return string TargetEntityId
     */
    public function getTargetEntityId()
    {
        return $this->_targetEntityId;
    }

    /**
     * Set the Operation TargetEntityId.
     *
     * @param string $value TargetEntityId
     */
    public function setTargetEntityId($value)
    {
        $this->_targetEntityId = $value;
    }
}
