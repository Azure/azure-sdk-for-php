<?php

/**
 * LICENSE: Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 * http://www.apache.org/licenses/LICENSE-2.0
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
 * @package   PEAR2\WindowsAzure\ServiceRuntime
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */

namespace PEAR2\WindowsAzure\ServiceRuntime;
use PEAR2\WindowsAzure\Resources;

/**
 * An implementation for the protocol runtime current state client.
 *
 * @category  Microsoft
 * @package   PEAR2\WindowsAzure\ServiceRuntime
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
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
     * Constructor
     * 
     * @param ICurrentStateSerializer $serializer    The current state
     *  serializer.
     * @param IOutputChannel          $outputChannel The output channel.
     */
    public function __construct($serializer, $outputChannel)
    {
        $this->_serializer    = $serializer;
        $this->_outputChannel = $outputChannel;
        $this->_endpoint      = null;
    }
    
    /**
     * Sets the endpoint to be used.
     * 
     * @param string $endpoint The endpoint.
     * 
     * @return none
     */
    public function setEndpoint($endpoint)
    {
        $this->_endpoint = $endpoint;
    }
    
    /**
     * Sets the current state.
     * 
     * @param CurrentState $state The current state.
     * 
     * @return none
     */
    public function setCurrentState($state)
    {
        $outputStream = $this->_outputChannel->getOutputStream($this->_endpoint);
        $this->_serializer->serialize($state, $outputStream);
        fclose($outputStream);
    }
}

?>