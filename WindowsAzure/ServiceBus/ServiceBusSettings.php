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
 * @package   WindowsAzure\ServiceBus
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
 
namespace WindowsAzure\ServiceBus;

/**
 * Basic Service Bus configuration elements.
 *
 * @category  Microsoft
 * @package   WindowsAzure\ServiceBus
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
class ServiceBusSettings
{
    const URI           = 'serviceBus.uri';
    const WRAP_URI      = 'serviceBus.wrap.uri';
    const WRAP_NAME     = 'serviceBus.wrap.name';
    const WRAP_PASSWORD = 'serviceBus.wrap.password';
    
    /**
     * Sets a configuration with specified WRAP authentication parameters. 
     * 
     * @param \Configuration $configuration          The configuration. 
     * @param string         $namespace              The WRAP service namespace. 
     * @param string         $authenticationName     The user name. 
     * @param string         $authenticationPassword The password.
     *
     * @return \Configuration
     */
    public static function configureWithWrapAuthentication(
        $configuration,
        $namespace,
        $authenticationName,
        $authenticationPassword
    ) {
        
        $configuration->setProperty(
            ServiceBusSettings::URI, 
            'https://'.$namespace.'.servicebus.windows.net'
        );
        
        $configuration->setProperty(
            ServiceBusSettings::WRAP_URI,
            'https://'.$namespace.'-sb.accesscontrol.windows.net/WRAPv0.9'
        );
        
        $configuration->setProperty(
            ServiceBusSettings::WRAP_NAME,
            $authenticationName
        );
        
        $configuration->setProperty(
            ServiceBusSettings::WRAP_PASSWORD,
            $authenticationPassword
        );
            
        return $configuration; 
    }       

}

?>
