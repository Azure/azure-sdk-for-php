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
 
namespace PEAR2\WindowsAzure\Services;
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
  
  function __construct()
  {
    
  }


  public static function GetInstance()
  {
    if (!isset(self::$instance)) 
    {
      $className = __CLASS__;
      self::$instance = new $className;
    }
    return self::$instance;
  }
  
  public function GetProperty($key)
  {
    return $this->properties[key];
  }
  
  public function SetProperty($key, $value)
  {
    $this->properties[$key] = $value;
  }
  
  public function Create($type)
  {
    return ServicesBuilder::Build($type);
  }
}

?>
