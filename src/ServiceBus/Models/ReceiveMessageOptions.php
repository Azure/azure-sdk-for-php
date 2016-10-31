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
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 *
 * @link      https://github.com/WindowsAzure/azure-sdk-for-php
 */

namespace WindowsAzure\ServiceBus\Models;

/**
 * The options for a receive message request.
 *
 * @category  Microsoft
 *
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 *
 * @version   Release: 0.5.0_2016-11
 *
 * @link      https://github.com/WindowsAzure/azure-sdk-for-php
 */
class ReceiveMessageOptions
{
    /**
     * The timeout value of receiving message.
     *
     * @var int
     */
    private $_timeout;

    /**
     * The mode of receiving message.
     *
     * @var int
     */
    private $_receiveMode;

    /**
     * Creates a receive message option instance with default parameters.
     */
    public function __construct()
    {
        $this->_receiveMode = ReceiveMode::RECEIVE_AND_DELETE;
    }
    /**
     * Gets the timeout of the receive message request.
     *
     * @return int
     */
    public function getTimeout()
    {
        return $this->_timeout;
    }

    /**
     * Sets the timeout of the receive message request.
     *
     * @param int $timeout The timeout of the receive message request
     */
    public function setTimeout($timeout)
    {
        $this->_timeout = $timeout;
    }

    /**
     * Gets the receive mode.
     *
     * @return int
     */
    public function getReceiveMode()
    {
        return $this->_receiveMode;
    }

    /**
     * Sets the receive mode.
     *
     * @param int $receiveMode The mode of receiving the message
     */
    public function setReceiveMode($receiveMode)
    {
        $this->_receiveMode = $receiveMode;
    }

    /**
     * Gets is receive and delete.
     *
     * @return bool
     */
    public function getIsReceiveAndDelete()
    {
        return $this->_receiveMode === ReceiveMode::RECEIVE_AND_DELETE;
    }

    /**
     * Sets whether the mode of receiving is receive and delete.
     */
    public function setReceiveAndDelete()
    {
        $this->_receiveMode = ReceiveMode::RECEIVE_AND_DELETE;
    }

    /**
     * Gets peek lock.
     *
     * @return bool
     */
    public function getIsPeekLock()
    {
        return $this->_receiveMode === ReceiveMode::PEEK_LOCK;
    }

    /**
     * Sets peek lock.
     */
    public function setPeekLock()
    {
        $this->_receiveMode = ReceiveMode::PEEK_LOCK;
    }
}
