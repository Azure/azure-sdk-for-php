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
 * An implementation for the protocol runtime goal state client.
 *
 * @category  Microsoft
 * @package   PEAR2\WindowsAzure\ServiceRuntime\Protocol1RuntimeGoalStateClient
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
class Protocol1RuntimeGoalStateClient implements IRuntimeGoalStateClient
{
    /**
     * @var Protocol1RuntimeCurrentStateClient
     */
    private $_currentStateClient;
    
    /**
     * @var IGoalStateDeserializer
     */
    private $_goalStateDeserializer;
    
    /**
     * @var IGoalStateDeserializer
     */
    private $_roleEnvironmentDeserializer;
    
    /**
     * @var IInputChannel
     */
    private $_inputChannel;
    
    /**
     * @var array
     */    
    private $_listeners;
    
    /**
     * @var string
     */
    private $_endpoint;
    
    /**
     * @var CurrentGoalState
     */
    private $_currentGoalState;
    
    /**
     * @var RoleEnvironmentData
     */
    private $_currentEnvironmentData;
    
    /**
     * Constructor
     * 
     * @param Protocol1RuntimeCurrentStateClient $currentStateClient          The
     *      current state client.
     * @param IGoalStateDeserializer             $goalStateDeserializer       The
     *      goal state deserializer.
     * @param IRoleEnvironmentDeserializer       $roleEnvironmentDeserializer The
     *      role environment deserializer.
     * @param IInputChannel                      $inputChannel                The
     *      input channel.
     */
    public function __construct($currentStateClient, $goalStateDeserializer,
        $roleEnvironmentDeserializer, $inputChannel
    ) {
        $this->_currentStateClient          = $currentStateClient;
        $this->_goalStateDeserializer       = $goalStateDeserializer;
        $this->_roleEnvironmentDeserializer = $roleEnvironmentDeserializer;
        $this->_inputChannel                = $inputChannel;
        
        $this->_listeners = array();
        
        $this->_currentGoalState       = null;
        $this->_currentEnvironmentData = null;
    }
    
    /**
     * Gets the current goal state.
     * 
     * @return GoalState
     */
    public function getCurrentGoalState()
    {
        return $this->_currentGoalState;
    }
    
    /**
     * Gets the role environment data.
     * 
     * @return RoleEnvironmentData
     */
    public function getRoleEnvironmentData()
    {
        throw new \Exception(Resources::NOT_IMPLEMENTED_MSG);
    }
    
    /**
     * Adds a goal state changed listener.
     * 
     * @param string $listener The listener.
	 *
     * @return none
     */
    public function addGoalStateChangedListener($listener)
    {
        throw new \Exception(Resources::NOT_IMPLEMENTED_MSG);
    }
    
    /**
     * Removes a goal state changed listener.
     * 
     * @param string $listener The listener.
	 *
     * @return none
     */
    public function removeGoalStateChangedListener($listener)
    {
        throw new \Exception(Resources::NOT_IMPLEMENTED_MSG);
    }
    
    /**
     * Sets the endpoint.
     *
     * @param string $endpoint Sets the endpoint.
     * 
     * @return none
     */
    public function setEndpoint($endpoint)
    {
        $this->_endpoint = $endpoint;
    }
    
    /**
     * Ensures that the goal state is retrieved.
     * 
     * @return none
     */
    private function _ensureGoalStateRetrieved()
    {
        throw new \Exception(Resources::NOT_IMPLEMENTED_MSG);
    }
}

?>
