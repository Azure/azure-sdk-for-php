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
 * The runtime goal state client.
 *
 * @category  Microsoft
 * @package   PEAR2\WindowsAzure\ServiceRuntime\IRuntimeGoalStateClient
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
interface IRuntimeGoalStateClient
{
    /**
     * Gets the current goal state.
     * 
     * @return GoalState
     */
    public function getCurrentGoalState();
    
    /**
     * Gets the role environment data.
     * 
     * @return RoleEnvironmentData
     */
    public function getRoleEnvironmentData();

    /**
     * Adds a goal state changed listener.
     * 
     * @param string $listener The listener.
     * 
     * @return none
     */
    public function addGoalStateChangedListener($listener);

    /**
     * Removes a goal state changed listener.
     * 
     * @param string $listener The listener.
     * 
     * @return none
     */
    public function removeGoalStateChangedListener($listener);
}

?>