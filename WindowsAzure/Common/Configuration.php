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
use WindowsAzure\Common\Internal\Validate;
use WindowsAzure\Common\Internal\Resources;
use WindowsAzure\Common\Internal\InvalidArgumentTypeException;
use WindowsAzure\Common\Internal\ServicesBuilder;
use WindowsAzure\Queue\QueueSettings;
use WindowsAzure\Blob\BlobSettings;
use WindowsAzure\Table\TableSettings;

/**
 * Contains configuration used to access azure storage accounts. 
 * 
 * There are two possible ways to create Configuration objects:
 * <code>
 * // Scenario #1 (using global configuration)
 * $config = Configuration::getInstance();
 * 
 * // Scenario #2
 * $config = new Configuration();
 * </code>
 * 
 * @category  Microsoft
 * @package   WindowsAzure\Common
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
class Configuration
{
    /**
     * @var array
     */
    private $_properties;
    
    /**
     * @var Configuration
     */
    private static $_instance;

    /**
     * Initializes new Configuration object.
     *
     * @return WindowsAzure\Common\Configuration
     */
    public function __construct()
    {
        $this->_properties = array();
    }

    /**
     * Access point to the static _instance of the class.
     *
     * @return WindowsAzure\Common\Configuration
     */
    public static function getInstance()
    {
        if (!isset(self::$_instance)) {
            $className       = __CLASS__;
            self::$_instance = new $className;
        }
        return self::$_instance;
    }

    /**
     * Gets the configuration property set.
     *
     * @return array
     */
    public function getProperties()
    {
        return $this->_properties;
    }

    /**
     * Gets the configuration property value for a provided key.
     *
     * @param string $key index of the property value.
     * 
     * @return mix
     */
    public function getProperty($key)
    {
        return $this->_properties[$key];
    }

    /**
     * Sets the configuration property value for a provided key.
     *
     * @param string $key   index of the property value.
     * @param string $value actual value to store.
     * 
     * @return none
     */
    public function setProperty($key, $value)
    {
        Validate::isString($key, 'key');
        Validate::isString($value, 'value');

        $this->_properties[$key] = $value;
    }
    
    /**
     * Returns boolean flag indicating if running aganist emulator or not.
     * 
     * @return bool
     */
    public static function isEmulated()
    {
        return (bool)getenv(Resources::EMULATED);
    }
}

?>
