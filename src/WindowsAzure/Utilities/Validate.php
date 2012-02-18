<?php

/**
 * Implementation of class Validate.
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
 
namespace PEAR2\WindowsAzure\Utilities;
use PEAR2\WindowsAzure\Core\Exceptions\InvalidArgumentTypeException;

/**
 * Validates aganist a condition and throws an exception in case of failure.
 *
 * @package    azure-sdk-for-php
 * @author     Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright  2012 Microsoft Corporation
 * @license    http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version    Release: @package_version@
 * @link       http://pear.php.net/package/azure-sdk-for-php
 */
class Validate
{
  /**
  * Throws exception if the provided variable type is not array.
  *
  * @param  mix $var variable to check against.
  * @throws InvalidArgumentTypeException
  */
  public static function IsArray($var)
  {
    if (!is_array($var))
    {
      throw new InvalidArgumentTypeException(gettype(array()));
    }
  }
  
  /**
  * Throws exception if the provided variable type is not string.
  *
  * @param  mix $var variable to check against.
  * @throws InvalidArgumentTypeException
  */
  public static function IsString($var)
  {
    if (!is_string($var))
    {
      throw new InvalidArgumentTypeException(gettype(''));
    }
  }
}

?>
