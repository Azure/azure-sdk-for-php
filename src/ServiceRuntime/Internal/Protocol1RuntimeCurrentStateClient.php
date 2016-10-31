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
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */

namespace WindowsAzure\ServiceRuntime\Internal;

/**
 * An implementation for the protocol runtime current state client.
 *
 * @category  Microsoft
 *
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 *
 * @version   Release: 0.5.0_2016-11
 *
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
class Protocol1RuntimeCurrentStateClient implements IRuntimeCurrentStateClient
{
    /**
     * @var ICurrentStateSerializer
     */
    private $_serializer;

    /**
     * @var IOutputChannel
     */
    private $_outputChannel;

    /**
     * @var string
     */
    private $_endpoint;

    /**
     * Constructor.
     *
     * @param ICurrentStateSerializer|null $serializer    The current state
     *                                                    serializer
     * @param IOutputChannel|null          $outputChannel The output channel
     */
    public function __construct(ICurrentStateSerializer $serializer = null, IOutputChannel $outputChannel = null)
    {
        $this->_serializer = $serializer;
        $this->_outputChannel = $outputChannel;
        $this->_endpoint = null;
    }

    /**
     * Sets the endpoint to be used.
     *
     * @param string $endpoint The endpoint
     */
    public function setEndpoint($endpoint)
    {
        $this->_endpoint = $endpoint;
    }

    /**
     * Sets the current state.
     *
     * @param CurrentState $state The current state
     */
    public function setCurrentState(CurrentState $state)
    {
        $outputStream = $this->_outputChannel->getOutputStream($this->_endpoint);
        $this->_serializer->serialize($state, $outputStream);
        fclose($outputStream);
    }
}
