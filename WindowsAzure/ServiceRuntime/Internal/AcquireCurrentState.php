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
 * @package   WindowsAzure\ServiceRuntime\Internal
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */

namespace WindowsAzure\ServiceRuntime\Internal;

/**
 * The acquire current state request.
 *
 * @category  Microsoft
 * @package   WindowsAzure\ServiceRuntime\Internal
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: 0.4.2_2016-04
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
class AcquireCurrentState extends CurrentState
{
    /**
     * @var string
     */
    private $_incarnation;
    
    /**
     * @var CurrentStatus
     */
    private $_status;
    
    /**
     * @var \DateTime
     */
    private $_expiration;
    
    /**
     * Constructor
     * 
     * @param string    $clientId    The client identifier.
     * @param string    $incarnation The incarnation.
     * @param string    $status      The status.
     * @param \DateTime $expiration  The expiration date.
     */
    public function __construct($clientId, $incarnation, $status, $expiration)
    {
        parent::__construct($clientId);
        $this->_incarnation = $incarnation;
        $this->_status      = $status;
        $this->_expiration  = $expiration;
    }
    
    /**
     * Gets the incarnation.
     * 
     * @return string
     */
    public function getIncarnation()
    {
        return $this->_incarnation;
    }
    
    /**
     * Gets the status.
     * 
     * @return string
     */
    public function getStatus()
    {
        return $this->_status;
    }
    
    /**
     * Gets the expiration.
     * 
     * @return \DateTime
     */
    public function getExpiration()
    {
        return $this->_expiration;
    }
}

