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
 * The XML role environment data deserializer.
 *
 * @category  Microsoft
 * @package   PEAR2\WindowsAzure\ServiceRuntime\XmlGoalStateDeserializer
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
        throw new \Exception(Resources::NOT_IMPLEMENTED_MSG);
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
        throw new \Exception(Resources::NOT_IMPLEMENTED_MSG);
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
        throw new \Exception(Resources::NOT_IMPLEMENTED_MSG);
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
        throw new \Exception(Resources::NOT_IMPLEMENTED_MSG);
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
        throw new \Exception(Resources::NOT_IMPLEMENTED_MSG);
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
        throw new \Exception(Resources::NOT_IMPLEMENTED_MSG);
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
        throw new \Exception(Resources::NOT_IMPLEMENTED_MSG);
    }
}

?>