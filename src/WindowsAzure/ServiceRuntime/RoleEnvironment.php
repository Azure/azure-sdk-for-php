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
 * Represents the Windows Azure environment in which an instance of a role is 
 * running.
 *
 * @category  Microsoft
 * @package   PEAR2\WindowsAzure\ServiceRuntime
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
class RoleEnvironment
{
    /**
     * Specifies the environment variable that contains the path to the endpoint.
     * 
     * @var string
     */
    const VERSION_ENDPOINT_ENVIRONMENT_NAME = 'WaRuntimeEndpoint';

    /**
     * Specifies the endpoint fixed path.
     * 
     * @var string
     */
    const VERSION_ENDPOINT_FIXED_PATH = '\\.\pipe\WindowsAzureRuntime';

    /**
     * @var string
     */
    private static $_clientId; // TODO: initialize ... 
    
    /**
     * @var IRuntimeClient
     */
    private static $_runtimeClient;

    /**
     * @var GoalState
     */
    private static $_currentGoalState;

    /**
     * @var RoleEnvironmentData
     */
    private static $_currentEnvironmentData;

    /**
     * @var array
     */
    private static $_changingListeners;

    /**
     * @var array
     */    
    private static $_changedListeners;

    /**
     * @var array
     */
    private static $_stoppingListeners;

    /**
     * @var CurrentState
     */
    private static $_lastState;

    /**
     * Initializes the runtime client.
     * 
     * @static
     * 
     * @return none
     */
    private static function _initialize()
    {
        if (self::$_runtimeClient == null) {
            $endpoint = getenv(self::VERSION_ENDPOINT_ENVIRONMENT_NAME);

            if ($endpoint == null) {
                $endpoint = self::VERSION_ENDPOINT_FIXED_PATH;
            }

            $kernel = RuntimeKernel::getKernel();
            
            self::$_runtimeClient = $kernel->getRuntimeVersionManager()
                ->getRuntimeClient($endpoint);
            
            self::$_currentGoalState = self::$_runtimeClient
                ->getCurrentGoalState();
            
            self::$_currentEnvironmentData = self::$_runtimeClient
                ->getRoleEnvironmentData();
        } else {
            self::$_currentGoalState = self::$_runtimeClient
                ->getCurrentGoalState();
            
            self::$_currentEnvironmentData = self::$_runtimeClient
                ->getRoleEnvironmentData();
        }
    }

    /**
     * Processes a goal state change.
     * 
     * @static
     * 
     * @return none
     */
    private static function _processGoalStateChange()
    {
        throw new \Exception(Resources::NOT_IMPLEMENTED_MSG);
    }

    /**
     * Accepts the latest incarnation.
     * 
     * @static
     * 
     * @return none
     */
    private static function _acceptLatestIncarnation()
    {
        throw new \Exception(Resources::NOT_IMPLEMENTED_MSG);
    }

    /**
     * Calculates changes.
     * 
     * @param array $changes The list of changes.
     *
     * @static
     *
     * @return none
     */
    private static function _calculateChanges($changes)
    {
        $current = self::$_currentEnvironmentData;
        $newData = self::$_runtimeClient->getRoleEnvironmentData();
        
        self::_calculateConfigurationChanges($changes, $current, $newData);

        $currentRoles   = $current->getRoles();
        $newRoles       = $newData->getRoles();
        $changedRoleSet = array();
        
        foreach ($currentRoles as $role) {
            if (array_key_exists($role, $newRoles)) {
                $currentRole = $currentRoles[$role];
                $newRole     = $newRoles[$role];

                $currentRoleInstances = $currentRole->getInstances();
                $newRoleInstances     = $newRole->getInstances();
                    
                self::_calculateNewRoleInstanceChanges(
                    $changedRoleSet,
                    $currentRoleInstances,
                    $newRoleInstances
                );
            } else {
                $changedRoleSet[] = $role;
            }
        }
        
        foreach ($newRoles as $role) {
            if (array_key_exists($role, $currentRoles)) {
                $currentRole = $currentRoles[$role];
                $newRole     = $newRoles[$role];
                
                $currentRoleInstances = $currentRole->getInstances();
                $newRoleInstances     = $newRole->getInstances();
                    
                self::_calculateCurrentRoleInstanceChanges(
                    $changedRoleSet,
                    $currentRoleInstances,
                    $newRoleInstances
                );
            } else {
                $changedRoleSet[] = $role;
            }
        }
        
        foreach ($changedRoleSet as $role) {
            $changes[] = new RoleEnvironmentTopologyChange($role);
        }
    }
    
    /**
     * Calculates the configuration changes.
     * 
     * @param array               $changes                The current changes.
     * @param RoleEnvironmentData $currentRoleEnvironment The current role 
     *     environment data.
     * @param RoleEnvionrmentData $newRoleEnvironment     The new role 
     *     environment data.
     * 
     * @static
     * 
     * @return none
     */
    private static function _calculateConfigurationChanges($changes,
        $currentRoleEnvironment, $newRoleEnvironment
    ) {    
        $currentConfig = $currentRoleEnvironment->getConfigurationSettings();
        $newConfig     = $newRoleEnvironment->getConfigurationSettings();
        
        foreach ($currentConfig as $setting) {
            if (array_key_exists($setting, $newConfig)) {
                if ($newConfig[$setting] != $currentConfig[$setting]) {
                    $changes[] = new RoleEnvironmentConfigurationSettingChange(
                        $setting
                    );
                }
            } else {
                $changes[] = new RoleEnvironmentConfigurationSettingChange($setting);
            }
        }
        
        foreach ($newConfig as $setting) {
            if (!array_key_exists($setting, $currentConfig)) {
                $changes[] = new RoleEnvironmentConfigurationSettingChange($setting);
            }
        }
    }
    
    /**
     * Calculates which instances / instance endpoints were added from the current
     * role to the new role.
     * 
     * @param type $changedRoleSet       The current changed role set.
     * @param type $currentRoleInstances The current role instances.
     * @param type $newRoleInstances     The new role instances.
     * 
     * @static
     * 
     * @return none
     */
    private static function _calculateNewRoleInstanceChanges($changedRoleSet, 
        $currentRoleInstances, $newRoleInstances
    ) {
        foreach ($currentRoleInstances as $instanceKey => $currentInstance) {
            if (array_key_exists($instanceKey, $newRoleInstances)) {
                $newInstance = $newRoleInstances[$instanceKey];

                $currentUpdateDomain = $currentInstance->getUpdateDomain();
                $newUpdateDomain     = $newInstance->getUpdateDomain();
                $currentFaultDomain  = $currentInstance->getFaultDomain();
                $newFaultDomain      = $newInstance->getFaultDomain();
                
                if ($currentUpdateDomain == $newUpdateDomain
                    && $currentFaultDomain == $newFaultDomain
                ) {
                    $currentInstanceEndpoints = $currentInstance
                        ->getInstanceEndpoints();                    
                    $newInstanceEndpoints     = $newInstance->getInstanceEndpoints();
                    
                    self::_calculateNewRoleInstanceEndpointsChanges(
                        $changedRoleSet,
                        $currentInstanceEndpoints,
                        $newInstanceEndpoints
                    );
                } else {
                    $changedRoleSet[] = $role;
                }
            } else {
                $changedRoleSet[] = $role;
            }
        }
    }
    
    /**
     * Calculates which endpoints / endpoint were added from the current
     * role to the new role.
     * 
     * @param type $changedRoleSet           The current changed role set.
     * @param type $currentInstanceEndpoints The current instance endpoints.
     * @param type $newInstanceEndpoints     The new instance endpoints.
     * 
     * @static
     * 
     * @return none
     */
    private static function _calculateNewRoleInstanceEndpointsChanges(
        $changedRoleSet, $currentInstanceEndpoints, $newInstanceEndpoints
    ) {
        foreach ($currentInstanceEndpoints as $endpointKey => $currentEndpoint) {
            if (array_key_exists($endpointKey, $newInstanceEndpoints)) {
                $newEndpoint = $newInstanceEndpoints[$endpointKey];

                $currentProtocol = $currentEndpoint->getProtocol();
                $newProtocol     = $newEndpoint->getProtocol();
                $currentAddress  = $currentEndpoint->getAddress();
                $newAddress      = $newEndpoint->getAddress();
                $currentPort     = $currentEndpoint->getPort();
                $newPort         = $newEndpoint->getPort();
                if ($currentProtocol != $newProtocol
                    || $currentAddress != $newAddress
                    || $currentPort != $newPort
                ) {
                    $changedRoleSet[] = $role;
                }
            } else {
                $changedRoleSet[] = $role;
            }
        }
    }
    
    /**
     * Calculates which instances / instance endpoints were removed from the current
     * role to the new role.
     * 
     * @param type $changedRoleSet       The current changed role set.
     * @param type $currentRoleInstances The current role instances.
     * @param type $newRoleInstances     The new role instances.
     * 
     * @static
     * 
     * @return none
     */
    private static function _calculateCurrentRoleInstanceChanges($changedRoleSet, 
        $currentRoleInstances, $newRoleInstances
    ) {
        foreach ($newRoleInstances as $instanceKey => $newInstance) {
            if (array_key_exists($instanceKey, $currentRoleInstances)) {
                $currentInstance = $currentRoleInstances[$instanceKey];
                
                $currentUpdateDomain = $currentInstance->getUpdateDomain();
                $newUpdateDomain     = $newInstance->getUpdateDomain();
                $currentFaultDomain  = $currentInstance->getFaultDomain();
                $newFaultDomain      = $newInstance->getFaultDomain();
                
                if ($currentUpdateDomain == $newUpdateDomain
                    && $currentFaultDomain == $newFaultDomain
                ) {
                    $newInstanceEndpoints     = $newInstance->getInstanceEndpoints();
                    $currentInstanceEndpoints = $currentInstance->getEndpoints();

                    self::_calculateCurrentRoleInstanceEndpointsChanges(
                        $changedRoleSet,
                        $currentInstanceEndpoints,   
                        $newInstanceEndpoints
                    );
                } else {
                    $changedRoleSet[] = $role;
                }
            } else {
                $changedRoleSet[] = $role;
            }
        }
    }
    
    /**
     * Calculates which endpoints / endpoint were removed from the current
     * role to the new role.
     * 
     * @param type $changedRoleSet           The current changed role set.
     * @param type $currentInstanceEndpoints The current instance endpoints.
     * @param type $newInstanceEndpoints     The new instance endpoints.
     * 
     * @static
     * 
     * @return none
     */
    private static function _calculateCurrentRoleInstanceEndpointsChanges(
        $changedRoleSet, $currentInstanceEndpoints, $newInstanceEndpoints
    ) {
        foreach ($newInstanceEndpoints as $endpointKey => $newEndpoint) {
            if (array_key_exists(
                $endpointKey,
                $currentInstanceEndpoints
            )
            ) {
                $currentEndpoint = $currentInstanceEndpoints
                    [$endpointKey];

                $currentProtocol = $currentEndpoint->getProtocol();
                $newProtocol     = $newEndpoint->getProtocol();
                $currentAddress  = $currentEndpoint->getAddress();
                $newAddress      = $newEndpoint->getAddress();
                $currentPort     = $currentEndpoint->getPort();
                $newPort         = $newEndpoint->getPort();
                if ($currentProtocol != $newProtocol
                    || $currentAddress != $newAddress
                    || $currentPort != $newPort
                ) {
                    $changedRoleSet[] = $role;
                }
            }
        }
    }
    
    /**
     * Raises a stopping event.
     * 
     * @static
     * 
     * @return none
     */
    private static function _raiseStoppingEvent()
    {
        throw new \Exception(Resources::NOT_IMPLEMENTED_MSG);
    }

    /**
     * Returns a RoleInstance object that represents the role instance
     * in which this code is currently executing.
     * 
     * @static
     * 
     * @return RoleInstance
     */
    public static function getCurrentRoleInstance()
    {
        self::_initialize();
        
        return self::$_currentEnvironmentData->getCurrentInstance();
    }

    /**
     * Returns the deployment ID that uniquely identifies the deployment in
     * which this role instance is running.
     * 
     * @static
     * 
     * @return string
     */
    public static function getDeploymentId()
    {
        self::_initialize();
        
        return self::$_currentEnvironmentData->getDeploymentId();
    }

    /**
     * Indicates whether the role instance is running in the Windows Azure
     * environment.
     * 
     * @static
     * 
     * @return boolean
     */
    public static function isAvailable()
    {
        try {
            self::_initialize();
        } catch (RoleEnvironmentNotAvailableException $ex) {
        } catch (ChannelNotAvailableException $ex) {
            return false;
        }

        return self::$_runtimeClient != null;
    }

    /**
     * Indicates whether the role instance is running in the development fabric.
     * 
     * @static
     * 
     * @return boolean
     */
    public static function isEmulated()
    {
        self::_initialize();
        
        return self::$_currentEnvironmentData->isEmulated();
    }

    /**
     * Returns the set of Role objects defined for your service.
     * 
     * Roles are defined in the service definition file.
     * 
     * @static
     * 
     * @return array
     */
    public static function getRoles()
    {
        self::_initialize();
        
        return self::$_currentEnvironmentData->getRoles();
    }

    /**
     * Retrieves the settings in the service configuration file.
     * 
     * A role's configuration settings are defined in the service definition 
     * file. Values for configuration settings are set in the service
     * configuration file.
     * 
     * @static
     * 
     * @return array
     */
    public static function getConfigurationSettings()
    {
        self::_initialize();
        
        return self::$_currentEnvironmentData->getConfigurationSettings();
    }

    /**
     * Retrieves the set of named local storage resources.
     * 
     * @static
     * 
     * @return array
     */
    public static function getLocalResources()
    {
        self::_initialize();
        
        return self::$_currentEnvironmentData->getLocalResources();
    }

    /**
     * Requests that the current role instance be stopped and restarted.
     * Before the role instance is recycled, the Windows Azure load balancer 
     * takes the role instance out of rotation.
     * 
     * This ensures that no new requests are routed to the instance while it 
     * is restarting.
     * 
     * @static
     * 
     * @return none
     */
    public static function requestRecycle()
    {
        // 2038-01-19 04:14:07 
        $maxDateTime = new \DateTime(date('Y-m-d H:i:s', PHP_INT_MAX));
        
        self::_initialize();
        
        $recycleState = new AcquireCurrentState(
            self::$_clientId,
            self::$_currentGoalState->getIncarnation(),
            CurrentStatus::RECYCLE,
            $maxDateTime
        );
        
        self::$_runtimeClient->setCurrentState($recycleState);
    }

    /**
     * Sets the status of the role instance.
     * 
     * An instance may indicate that it is in one of two states: Ready or Busy. 
     * If an instance's state is Ready, it is prepared to receive requests from 
     * the load balancer. If the instance's state is Busy, it will not receive
     * requests from the load balancer.
     * 
     * @param RoleInstanceStatus $status        The new role status.
     * @param \DateTime          $expirationUtc The expiration UTC time.
     * 
     * @static
     * 
     * @return none
     */
    public static function setStatus($status, $expirationUtc)
    {
        self::_initialize();
        
        $currentStatus = CurrentStatus::STARTED;
        
        switch ($status) {
        case RoleInstanceStatus::BUSY:
            $currentStatus = CurrentStatus::BUSY;
            break;
        case RoleInstanceStatus::READY:
            $currentStatus = CurrentStatus::STARTED;
            break;
        }
        
        $newState = new AcquireCurrentState(
            self::$_clientId,
            self::$_currentGoalState->getIncarnation(),
            $currentStatus,
            $expirationUtc
        );
        
        self::$_lastState = $newState;
        
        self::$_runtimeClient->setCurrentState($newState);
    }

    /**
     * Clears the status of the role instance.
     * 
     * An instance may indicate that it has completed communicating status by 
     * calling this method.
     * 
     * @static
     * 
     * @return none
     */
    public static function clearStatus()
    {
        self::_initialize();
        
        $newState = new ReleaseCurrentState(self::$_clientId);
        
        self::$_lastState = $newState;
        
        self::$_runtimeClient->setCurrentState($newState);
    }

    /**
     * Adds an event listener for the changed event, which occurs
     * after a configuration change has been applied to a role instance.
     * 
     * @param function $listener The changed listener.
     * 
     * @return none
     */
    public static function addRoleEnvironmentChangedListener($listener)
    {
        self::_initialize();        
        
        self::$_changedListeners[] = $listener;
    }

    /**
     * Removes an event listener for the Changed event.
     * 
     * @static
     * 
     * @return none
     */
    public static function removeRoleEnvironmentChangedListener()
    {
        throw new \Exception(Resources::NOT_IMPLEMENTED_MSG);
    }

    /**
     * Adds an event listener for the Changing event, which occurs
     * before a change to the service configuration is applied to the running
     * instances of the role.
     * 
     * Service configuration changes are applied on-the-fly to running role 
     * instances. Configuration changes include changes to the service 
     * configuration changes and changes to the number of instances in the 
     * service.
     * 
     * This event occurs after the new configuration file has been submitted to 
     * Windows Azure but before the changes have been applied to each running 
     * role instance. This event can be cancelled for a given instance to 
     * prevent the configuration change.
     * 
     * Note that cancelling this event causes the instance to be automatically 
     * recycled. When the instance is recycled, the configuration change is 
     * applied when it restarts.
     * 
     * @param function $listener The changing listener.
     * 
     * @static
     * 
     * @return none
     */
    public static function addRoleEnvironmentChangingListener($listener)
    {
        self::_initialize();
        
        self::$_changingListeners[] = $listener;
    }

    /** 
     * Removes an event listener for the Changing event.
     * 
     * @static
     * 
     * @return none
     */
    public static function removeRoleEnvironmentChangingListener()
    {
        throw new \Exception(Resources::NOT_IMPLEMENTED_MSG);
    }

    /**
     * Adds an event listener for the Stopping event, which occurs
     * wheen the role is stopping.
     * 
     * @param function $listener The stopping listener.
     * 
     * @static
     * 
     * @return none
     */
    public static function addRoleEnvironmentStoppingListener($listener)
    {
        self::_initialize();
        
        self::$_stoppingListeners = $listener;
    }

    /**
     * Removes an event listener for the Stopping event.
     * 
     * @static
     * 
     * @return none
     */
    public static function removeRoleEnvironmentStoppingListener()
    {
        throw new \Exception(Resources::NOT_IMPLEMENTED_MSG);
    }
}

?>