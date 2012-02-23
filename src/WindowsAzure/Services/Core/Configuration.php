<?php

/**
 * Configuration class implementation.
 *
 * PHP version 5
 *
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
 * @package    Azure-sdk-for-php
 * @author     Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright  2012 Microsoft Corporation
 * @license    http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link       http://pear.php.net/package/azure-sdk-for-php
 */
 
namespace PEAR2\WindowsAzure\Services\Core;
use PEAR2\WindowsAzure\Services\Core\ServicesBuilder;
use PEAR2\WindowsAzure\Utilities\Validate;

/**
 * Contains configuration used to access azure sotrage accounts.
 *
 * @package    Azure-sdk-for-php
 * @author     Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright  2012 Microsoft Corporation
 * @license    http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version    Release: @package_version@
 * @link       http://pear.php.net/package/azure-sdk-for-php
 */
class Configuration
{
  private $_properties;
  private static $_instance;
  
  private function __construct()
  {
    $this->_properties = array();
  }

  /**
  * Access point to the static _instance of the class.
  *
  * @return PEAR2\WindowsAzure\Services\Core\Configuration
  */
  public static function getInstance()
  {
    if (!isset(self::$_instance)) 
    {
      $className = __CLASS__;
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
  * @param  string $key index of the property value
  * @return mix
  */
  public function getProperty($key)
  {
    return $this->_properties[$key];
  }
  
  /**
  * Sets the configuration property value for a provided key.
  *
  * @param  string $key   index of the property value.
  * @param  string $value actual value to store.
  */
  public function setProperty($key, $value)
  {
    Validate::isString($key);
    
    $this->_properties[$key] = $value;
  }
  
  /**
  * Builds and returns an object from the specified type.
  *
  * @param  string $type the desired object type.
  * @return mix
  */
  public function create($type)
  {
    return ServicesBuilder::build(self::$_instance, $type);
  }
}

?>
