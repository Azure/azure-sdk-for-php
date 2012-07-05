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
 * @package   WindowsAzure\Common
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
 
namespace WindowsAzure\Common;
use WindowsAzure\Common\Internal\Utilities;
use WindowsAzure\Common\Internal\Validate;

/**
 * Configuration manager for accessing Windows Azure settings.
 *
 * @category  Microsoft
 * @package   WindowsAzure\Common
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
class CloudConfigurationManager
{
    /**
     * @var array
     */
    private static $_appSettings;
    
    /**
     * Gets a connection string.
     * 
     * This method will attempt to read the connection string from all available 
     * sources, which may result in slower application performance. To avoid this, 
     * you should use getConnectionString to read the connection string initially,
     * then use getConnectionStringCached in subsequent calls.
     * The search work in the following order:
     * 1- Environment variables
     * 2- Service Configuration
     * 3- Use getConnectionStringCached
     * 
     * @param string $key The connection string key name.
     * 
     * @return string If the key does not exist return null.
     */
    public static function getConnectionString($key)
    {
        Validate::isString($key, 'key');
        
        $value = null;
        
        // Try to read from environment variables
        $env   = getenv($key);
        $value = !$env ? null : $env;
        
        // Reading from cscfg is not supported because the ServiceRuntime does not
        // read settings from web role.
        //$value = is_null($value) ? self::_getServiceRuntimeSetting($key) : $value;
        
        // Use getConnectionStringCached
        $value = is_null($value) ? self::getConnectionStringCached($key) : $value;
        
        // Cache the connection string value
        if (!is_null($value)) {
            self::$_appSettings[$key] = $value;
        }
        
        return $value;
    }
    
    /**
     * Gets a cached connection string.
     * 
     * When a new connection string has been added, use getConnectionString instead.
     * 
     * @param string $key The connection string key name.
     * 
     * @return string If the key does not exist return null.
     */
    public static function getConnectionStringCached($key)
    {
        Validate::isString($key, 'key');
        
        return Utilities::tryGetValue(self::$_appSettings, $key);
    }
    
    /**
     * Caches a connection string.
     * 
     * @param string $key   The connection string key.
     * @param string $value The connection string value.
     * 
     * @return none
     */
    public static function setConnectionString($key, $value)
    {
        Validate::isString($key, 'key');
        Validate::isString($value, 'value');
        
        self::$_appSettings[$key] = $value;
    }
}


