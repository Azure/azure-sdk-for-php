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
 * @author    Microsoft Corporation
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */

namespace PEAR2\WindowsAzure\ServiceRuntime;

class Protocol1RuntimeClient
{
    private $_goalStateClient;
    private $_currentStateClient;
    
    public function __construct($goalStateClient, $currentStateClient, $endpoint)
    {
        $this->_goalStateClient = $goalStateClient;
        $this->_currentStateClient = $currentStateClient;
        
        $this->_goalStateClient->setEndpoint($endpoint);
    }
    
    public function getCurrentGoalState()
    {
        return $this->_goalStateClient->getCurrentGoalState();
    }
    
    public function getRoleEnvironmentData()
    {
        return $this->_goalStateClient->getRoleEnvironmentData();
    }
    
    public function addGoalStateChangedListener($listener)
    {
        $this->_goalStateClient->addGoalStateChangedListener($listener);
    }
    
    public function removeGoalStateChangedListener($listener)
    {
        $this->_goalStateClient->removeGoalStateChangedListener($listener);
    }
    
    public function setCurrentState($state)
    {
        $this->_currentStateClient->setCurrentState($state);
    }
}
?>
