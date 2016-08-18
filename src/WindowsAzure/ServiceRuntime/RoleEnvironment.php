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

/**
 * Represents the Windows Azure environment in which an instance of a role is 
 * running.
 *
 * @category  Microsoft
 * @package   PEAR2\WindowsAzure\Services\Blob
 * @author    Microsoft Corporation
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
class RoleEnvironment
{
    private static $_runtimeClient;
    private static $_currentGoalState;
    private static $_currentEnvironmentData;
    private static $_changingListeners;
    private static $_changedListeners;
    private static $_stoppingListeners;
    private static $_lastState;
    private static $_maxDateTime;
    
    /**
     * Creates new object based on the builder type in the $config.
     *
     * @param PEAR2\WindowsAzure\Services\Core\Configuration $config config object.
     * 
     * @return PEAR2\WindowsAzure\Services\Blob\IBlob.
     */
    private static function initialize()
    {
        throw new \Exception(Resources::NOT_IMPLEMENTED_MSG);
    }
    
    private static function processGoalStateChange()
    {
        throw new \Exception(Resources::NOT_IMPLEMENTED_MSG);
    }
    
    private static function acceptLatestIncarnation()
    {
        throw new \Exception(Resources::NOT_IMPLEMENTED_MSG);
    }
    
    private static function calculateChanges()
    {
        throw new \Exception(Resources::NOT_IMPLEMENTED_MSG);
    }
    
    private static function raiseStoppingEvent()
    {
        throw new \Exception(Resources::NOT_IMPLEMENTED_MSG);
    }
    
    public static function getCurrentRoleInstance()
    {
        throw new \Exception(Resources::NOT_IMPLEMENTED_MSG);
    }
    
    public static function getDeploymentId()
    {
        throw new \Exception(Resources::NOT_IMPLEMENTED_MSG);
    }
    
    public static function isAvailable()
    {
        throw new \Exception(Resources::NOT_IMPLEMENTED_MSG);
    }
    
    public static function isEmulated()
    {
        throw new \Exception(Resources::NOT_IMPLEMENTED_MSG);
    }
    
    public static function getRoles()
    {
        throw new \Exception(Resources::NOT_IMPLEMENTED_MSG);
    }
    
    public static function getConfigurationSettings()
    {
        throw new \Exception(Resources::NOT_IMPLEMENTED_MSG);
    }
    
    public static function getLocalResources()
    {
        throw new \Exception(Resources::NOT_IMPLEMENTED_MSG);
    }
    
    public static function requestRecycle()
    {
        throw new \Exception(Resources::NOT_IMPLEMENTED_MSG);
    }
    
    public static function setStatus()
    {
        throw new \Exception(Resources::NOT_IMPLEMENTED_MSG);
    }
    
    public static function clearStatus()
    {
        throw new \Exception(Resources::NOT_IMPLEMENTED_MSG);
    }
    
    public static function addRoleEnvironmentChangedListener()
    {
        throw new \Exception(Resources::NOT_IMPLEMENTED_MSG);
    }
    
    public static function removeRoleEnvironmentChangedListener()
    {
        throw new \Exception(Resources::NOT_IMPLEMENTED_MSG);
    }
    
    public static function addRoleEnvironmentChangingListener()
    {
        throw new \Exception(Resources::NOT_IMPLEMENTED_MSG);
    }
    
    public static function removeRoleEnvironmentChangingListener()
    {
        throw new \Exception(Resources::NOT_IMPLEMENTED_MSG);
    }
    
    public static function addRoleEnvironmentStoppingListener()
    {
        throw new \Exception(Resources::NOT_IMPLEMENTED_MSG);
    }
    
    public static function removeRoleEnvironmentStoppingListener()
    {
        throw new \Exception(Resources::NOT_IMPLEMENTED_MSG);
    }
}

?>