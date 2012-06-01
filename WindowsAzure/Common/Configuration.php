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
 * @link      http://pear.php.net/package/azure-sdk-for-php
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
 * @link      http://pear.php.net/package/azure-sdk-for-php
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
     * Configures $config to run against the storage emulator.
     *
     * @param WindowsAzure\Common\Configuration $config The configuration.
     * @param string                            $type   The type name.
     * 
     * @return none
     */
    private static function _useStorageEmulatorConfig($config, $type)
    {
        $name = Resources::DEV_STORE_NAME;
        $key  = Resources::DEV_STORE_KEY;
        $uri  = "http://%s/" . Resources::DEV_STORE_NAME . "/";
        
        if ($type == Resources::QUEUE_TYPE_NAME) {
            $config->setProperty(
                QueueSettings::URI, sprintf($uri, Resources::EMULATOR_QUEUE_URI)
            );
            $config->setProperty(QueueSettings::ACCOUNT_NAME, $name);
            $config->setProperty(QueueSettings::ACCOUNT_KEY, $key);
        } else if ($type == Resources::BLOB_TYPE_NAME) {
            $config->setProperty(
                BlobSettings::URI, sprintf($uri, Resources::EMULATOR_BLOB_URI)
            );
            $config->setProperty(BlobSettings::ACCOUNT_NAME, $name);
            $config->setProperty(BlobSettings::ACCOUNT_KEY, $key);
        } else if ($type == Resources::TABLE_TYPE_NAME) {
            $config->setProperty(
                TableSettings::URI, sprintf($uri, Resources::EMULATOR_TABLE_URI)
            );
            $config->setProperty(TableSettings::ACCOUNT_NAME, $name);
            $config->setProperty(TableSettings::ACCOUNT_KEY, $key);
        } else {
            $expected  = Resources::QUEUE_TYPE_NAME;
            $expected .= '|' . Resources::BLOB_TYPE_NAME;
            $expected .= '|' . Resources::TABLE_TYPE_NAME;
            throw new InvalidArgumentTypeException($expected);
        }
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
     * Builds and returns an object from the specified type.
     *
     * @param string           $type    The desired  object type.
     * @param IServicesBuilder $builder The services builder.
     * 
     * @return mix
     */
    public function create($type, $builder = null)
    {
        if (self::isEmulated()) {
            self::_useStorageEmulatorConfig($this, $type);
        }
        
        if (is_null($builder)) {
            $builder = new ServicesBuilder();
        }
        
        return $builder->build($this, $type);
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
