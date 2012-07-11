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
use WindowsAzure\Common\Internal\Resources;

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
     * @var boolean
     */
    private static $_isInitialized = false;
    
    /**
     * The list of connection string sources.
     * 
     * @var array
     */
    private static $_sources;
    
    /**
     * The list of all sources which comes as default.
     * @var type 
     */
    private static $_defaultSources;
    
    /**
     * Environment variable source name.
     */
    const ENVIORNMENT_SOURCE = 'environment_source';
    
    // Restrict users from creating instances from this class
    private function __construct() { }
    
    /**
     * Gets a connection string value from the system environment.
     * 
     * @param string $key The connection string name.
     * 
     * @return string
     */
    public static function environmentSource($key)
    {
        Validate::isString($key, 'key');
        
        return getenv($key);
    }
    
    /**
     * Initializes the connection string source providers.
     * 
     * @return none 
     */
    private static function _init()
    {
        if (!self::$_isInitialized) {
            self::$_isInitialized  = true;
            self::$_sources        = array();
            self::$_defaultSources = array(
                self::ENVIORNMENT_SOURCE => array(__CLASS__, 'environmentSource')
            );
            
            foreach (self::$_defaultSources as $name => $sourceCallback) {
                self::registerSource($name);
            }
        }
    }
    
    /**
     * Registers a new connection string source provider. If the source to be 
     * registered is default source it's required to provide the source name only.
     * 
     * @param string   $name     The source name.
     * @param callable $callback The source callback.
     * @param boolean  $prepend  The prepend flag.
     * 
     * @return none
     */
    public static function registerSource($name, $callback = null, $prepend = false)
    {
        Validate::isString($name, 'name');
        Validate::notNullOrEmpty($name, 'name');
        
        self::_init();
        
        // Try to get callback if the user is trying to register a default source.
        $callback = Utilities::tryGetValue(self::$_defaultSources, $name, $callback);
        
        Validate::notNullOrEmpty($callback, 'callback');
        
        if ($prepend) {
            self::$_sources = array_merge(
                array($name => $callback),
                self::$_sources
            );
            
        } else {
            self::$_sources[$name] = $callback;
        }
    }
    
    /**
     * Unregisters a connection string source.
     * 
     * @param string $name The source name.
     * 
     * @return callable
     */
    public static function unregisterSource($name)
    {
        Validate::isString($name, 'name');
        Validate::notNullOrEmpty($name, 'name');
        
        self::_init();
        
        $sourceCallback = Utilities::tryGetValue(self::$_sources, $name);
        
        if (!is_null($sourceCallback)) {
            unset(self::$_sources[$name]);
        }
        
        return $sourceCallback;
    }
    
    /**
     * Gets a connection string from all available sources.
     * 
     * @param string $key The connection string key name.
     * 
     * @return string If the key does not exist return null.
     */
    public static function getConnectionString($key)
    {
        Validate::isString($key, 'key');
        
        self::_init();
        $value = null;
        
        foreach (self::$_sources as $source) {
            $value = call_user_func_array($source, array($key));
            
            if (!empty($value)) {
                break;
            }
        }
        
        return $value;
    }
}


