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
 * @package   WindowsAzure\Common\Internal
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
 
namespace WindowsAzure\Common\Internal;

/**
 * Holder for default connection string sources used in CloudConfigurationManager.
 *
 * @category  Microsoft
 * @package   WindowsAzure\Common\Internal
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
class ConnectionStringSource
{
    /**
     * The list of all sources which comes as default.
     * 
     * @var type 
     */
    private $_defaultSources;
    
    /**
     * @var ConnectionStringSource 
     */
    private static $_instance;
    
    /**
     * Environment variable source name.
     */
    const ENVIRONMENT_SOURCE = 'environment_source';
    
    /**
     * Constructs new ConnectionStringSource instance. 
     */
    private function __construct()
    {
        $this->_defaultSources = array(
                self::ENVIRONMENT_SOURCE => array(__CLASS__, 'environmentSource')
        );
    }
    
    /**
     * Gets a connection string value from the system environment.
     * 
     * @param string $key The connection string name.
     * 
     * @return string
     */
    public function environmentSource($key)
    {
        Validate::isString($key, 'key');
        
        return getenv($key);
    }
    
    /**
     * Gets list of default sources.
     * 
     * @return array
     */
    public function getDefaultSources()
    {
        return $this->_defaultSources;
    }
    
    /**
     * Gets the single instance of this class.
     * 
     * @return ConnectionStringSource
     */
    public static function getInstance()
    {
        if (!isset(self::$_instance)) {
            $className = __CLASS__;
            self::$_instance = new $className;
        }
        
        return self::$_instance;
    }
}

?>
