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
use PEAR2\WindowsAzure\ServiceRuntime\RoleInstance;
use PEAR2\WindowsAzure\Utilities;
use PEAR2\WindowsAzure\Resources;

/**
 * The XML role environment data deserializer.
 *
 * @category  Microsoft
 * @package   PEAR2\WindowsAzure\ServiceRuntime
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
class XmlRoleEnvironmentDataDeserializer
{
    /**
     * Deserializes the role environment data.
     * 
     * @param IInputChannel $inputChannel The input Channel.
     * 
     * @return RoleEnvironmentData
     */
    public function deserialize($inputChannel)
    {
        $document = stream_get_contents($inputChannel);
       
        $environmentInfo = Utilities::unserialize($document);
        
        $configurationSettings = $this->_translateConfigurationSettings(
            $environmentInfo
        );
        
        $localResources  = $this->_translateLocalResources($environmentInfo);
        $currentInstance = $this
            ->_translateCurrentInstance($environmentInfo);        
        $roles           = $this->_translateRoles(
            $environmentInfo,
            $currentInstance,
            $environmentInfo['CurrentInstance']['@attributes']['roleName']
        );
        
        return new RoleEnvironmentData(
            $environmentInfo['Deployment']['@attributes']['id'],
            $configurationSettings,
            $localResources,
            $currentInstance,
            $roles,
            $environmentInfo['Deployment']['@attributes']['emulated']
        );
    }
    
    /**
     * Translates the configuration settings.
     * 
     * @param string $environmentInfo The role environment info.
     * 
     * @return array 
     */
    private function _translateConfigurationSettings($environmentInfo)
    {
        $configurationSettings = array();
        
        if (array_key_exists('CurrentInstance', $environmentInfo)
            && array_key_exists(
                'ConfigurationSettings',
                $environmentInfo['CurrentInstance']
            )
            && array_key_exists(
                'ConfigurationSetting',
                $environmentInfo['CurrentInstance']['ConfigurationSettings']
            )
        ) {
    
            $settingInfos = $environmentInfo['CurrentInstance']
                ['ConfigurationSettings']['ConfigurationSetting'];
            if (array_key_exists('@attributes', $settingInfos)) {
                $settingInfos   = array();
                $settingInfos[] = $environmentInfo['CurrentInstance']
                    ['ConfigurationSettings']
                    ['ConfigurationSetting'];
            }
            
            foreach ($settingInfos as $settingInfo) {
                $configurationSettings
                    [$settingInfo['@attributes']['name']] = $settingInfo
                        ['@attributes']['value'];
            }
        }
        
        return $configurationSettings;
    }
    
    /**
     * Translates the local resources.
     * 
     * @param string $environmentInfo The role environment info.
     * 
     * @return array 
     */
    private function _translateLocalResources($environmentInfo)
    {
        $localResourcesMap = array();
        
        if (array_key_exists('CurrentInstance', $environmentInfo)
            && array_key_exists(
                'LocalResources',
                $environmentInfo['CurrentInstance']
            )
            && array_key_exists(
                'LocalResource',
                $environmentInfo['CurrentInstance']['LocalResources']
            )
        ) {
    
            $localResources = $environmentInfo['CurrentInstance']
                ['LocalResources']['LocalResource'];
            if (array_key_exists('@attributes', $localResources)) {
                $localResources   = array();
                $localResources[] = $environmentInfo['CurrentInstance']
                    ['LocalResources']['LocalResource'];
            }
            
            foreach ($localResources as $localResource) {
                $localResourcesMap
                    [$localResource['@attributes']['name']] = $localResource
                        ['@attributes'];
            }
        }
        
        return $localResourcesMap;
    }
    
    /**
     * Translates the roles.
     * 
     * @param string       $environmentInfo The role environment info.
     * @param RoleInstance $currentInstance The current instance info.
     * @param string       $currentRole     The current role.
     * 
     * @return array
     */
    private function _translateRoles($environmentInfo, $currentInstance,
        $currentRole
    ) {
        $rolesMap = array();
        
        if (array_key_exists('Roles', $environmentInfo)
            && array_key_exists('Role', $environmentInfo['Roles'])
        ) {
            
            $roles = $environmentInfo['Roles']['Role'];
            if (array_key_exists('@attributes', $roles)) {
                $roles   = array();
                $roles[] = $environmentInfo['Roles']['Role'];
            }
            
            foreach ($roles as $role) {
                $roleInstances = $this->_translateRoleInstances($role);
                
                if ($role['@attributes']['name'] == $currentRole) {
                    $roleInstances[$currentInstance->getId()] = $currentInstance;
                }
                
                $rolesMap[$role['@attributes']['name']] = $roleInstances;
            }
            
            if (!array_key_exists($currentRole, $rolesMap)) {
                $roleInstances                            = array();
                $roleInstances[$currentInstance->getId()] = $currentInstance;
                
                $rolesMap[$currentRole] = $roleInstances;
            }
        }
        
        return $rolesMap;
    }
    
    /**
     * Translates the role instances.
     * 
     * @param string $instancesInfo The instance info.
     * 
     * @return array
     */
    private function _translateRoleInstances($instancesInfo)
    {
        $roleInstanceMap = array();
        
        if (array_key_exists('Instances', $instancesInfo)
            && array_key_exists('Instance', $instancesInfo['Instances'])
        ) {
            
            $instances = $instancesInfo['Instances']['Instance'];
            if (array_key_exists('@attributes', $instances)) {
                $instances   = array();
                $instances[] = $instancesInfo['Instances']['Instance'];
            }
            
            foreach ($instances as $instance) {
                $instance['@attributes']
                    ['Endpoints'] = $this->_translateRoleInstanceEndpoints(
                        $instance['Endpoints']['Endpoint']
                    );
                
                $roleInstanceMap
                    [$instance['@attributes']['id']] = $instance['@attributes'];
            }
        }
        
        return $roleInstanceMap;
    }
    
    /**
     * Translates the role instance endpoints.
     * 
     * @param string $endpointsInfo The endpoints info.
     * 
     * @return array
     */
    private function _translateRoleInstanceEndpoints($endpointsInfo)
    {
        $endpointsMap = array();
        
        $endpoints = $endpointsInfo;
        if (array_key_exists('@attributes', $endpoints)) {
            $endpoints   = array();
            $endpoints[] = $endpointsInfo;
        }
        
        foreach ($endpoints as $endpoint) {
            $endpointsMap
                [$endpoint['@attributes']['name']] = $endpoint['@attributes'];
        }
        
        return $endpointsMap;
    }
    
    /**
     * Translates the current instance info.
     * 
     * @param string $environmentInfo The environment info.
     * 
     * @return RoleInstance
     */
    private function _translateCurrentInstance($environmentInfo)
    {
        $endpoints = null;
        if (array_key_exists('CurrentInstance', $environmentInfo)
            && array_key_exists(
                'Endpoints',
                $environmentInfo['CurrentInstance']
            )
            && array_key_exists(
                'Endpoint',
                $environmentInfo['CurrentInstance']['Endpoints']
            )
        ) {
            
            $endpoints = $this->_translateRoleInstanceEndpoints(
                $environmentInfo['CurrentInstance']['Endpoints']['Endpoint']
            );
        }
        
        $currentInstance = new RoleInstance(
            $environmentInfo['CurrentInstance']['@attributes']['id'],
            $environmentInfo['CurrentInstance']['@attributes']['faultDomain'],
            $environmentInfo['CurrentInstance']['@attributes']['updateDomain'],
            $endpoints
        );
        
        return $currentInstance;
    }
}

?>