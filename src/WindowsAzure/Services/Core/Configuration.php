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
 * @package    azure-sdk-for-php
 * @author     Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright  2012 Microsoft Corporation
 * @license    http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link       http://pear.php.net/package/azure-sdk-for-php
 */
 
namespace PEAR2\WindowsAzure\Services\Core;
use PEAR2\WindowsAzure\Services\Core\ServicesBuilder;

/**
 * Contains configuration used to access azure sotrage accounts.
 *
 * @package    azure-sdk-for-php
 * @author     Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright  2012 Microsoft Corporation
 * @license    http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version    Release: @package_version@
 * @link       http://pear.php.net/package/azure-sdk-for-php
 */
class Configuration
{
  private $properties;
  private static $instance;
  
  private function __construct()
  {
    $this->properties = array();
  }

  /**
  * Access point to the static instance of the class.
  *
  * @return PEAR2\WindowsAzure\Services\Core\Configuration
  */
  public static function GetInstance()
  {
    if (!isset(self::$instance)) 
    {
      $className = __CLASS__;
      self::$instance = new $className;
    }
    return self::$instance;
  }
  
  /**
  * Gets the configuration property set.
  *
  * @return array
  */
  public function GetProperties()
  {
    return $this->properties;
  }
  
  /**
  * Gets the configuration property value for a provided key.
  *
  * @param  string $key index of the property value
  * @return mix
  */
  public function GetProperty($key)
  {
    return $this->properties[$key];
  }
  
  /**
  * Sets the configuration property value for a provided key.
  *
  * @param  string $key   index of the property value.
  * @param  string $value actual value to store.
  */
  public function SetProperty($key, $value)
  {
    
    
    $this->properties[$key] = $value;
  }
  
  /**
  * Builds and returns an object from the specified type.
  *
  * @param  string $type the desired object type.
  * @return mix
  */
  public function Create($type)
  {
    return ServicesBuilder::Build($type);
  }
}

?>
