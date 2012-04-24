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
 * @package   WindowsAzure
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
 
namespace WindowsAzure;
use WindowsAzure\Core\InvalidArgumentTypeException;
use WindowsAzure\Resources;

/**
 * Validates aganist a condition and throws an exception in case of failure.
 *
 * @category  Microsoft
 * @package   WindowsAzure
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
class Validate
{
    /**
     * Throws exception if the provided variable type is not array.
     *
     * @param mix    $var  The variable to check.
     * @param string $name The parameter name.
     * 
     * @throws InvalidArgumentTypeException.
     * 
     * @return none
     */
    public static function isArray($var, $name)
    {
        if (!is_array($var)) {
            throw new InvalidArgumentTypeException($name, gettype(array()));
        }
    }

    /**
     * Throws exception if the provided variable type is not string.
     *
     * @param mix    $var  The variable to check.
     * @param string $name The parameter name.
     * 
     * @throws InvalidArgumentTypeException
     * 
     * @return none
     */
    public static function isString($var, $name)
    {
        try {
            (string)$var;
        } catch (\Exception $e) {
            throw new InvalidArgumentTypeException(gettype(''), $name);
        }
    }
    
    /**
     * Throws exception if the provided variable type is not boolean.
     *
     * @param mix $var variable to check against.
     * 
     * @throws InvalidArgumentTypeException
     * 
     * @return none
     */
    public static function isBoolean($var)
    {
        (bool)$var;
    }
    
    /**
     * Throws exception if the provided variable is set to null.
     *
     * @param mix    $var  The variable to check.
     * @param string $name The parameter name.
     *
     * @throws \InvalidArgumentException
     *
     * @return none
     */
    public static function notNullOrEmpty($var, $name)
    {
        if (is_null($var) || empty($var)) {
            throw new \InvalidArgumentException(
                sprintf(Resources::NULL_ERROR_MSG, $name)
            );
        }
    }
    
    /**
     * Throws exception if the provided variable type is not integer.
     *
     * @param mix    $var  The variable to check.
     * @param string $name The parameter name.
     * 
     * @throws InvalidArgumentTypeException
     * 
     * @return none
     */
    public static function isInteger($var, $name)
    {
        try {
            (int)$var;
        } catch (\Exception $e) {
            throw new InvalidArgumentTypeException(gettype(123), $name);
        }
    }
    
    /**
     * Throws exception if the provided condition is not satisfied.
     *
     * @param bool   $isSatisfied    condition result.
     * @param string $failureMessage the exception message
     * 
     * @throws \Exception
     * 
     * @return none
     */
    public static function isTrue($isSatisfied, $failureMessage)
    {
        if (!$isSatisfied) {
            throw new \InvalidArgumentException($failureMessage);
        }
    }
    
    /**
     * Throws exception if the provided $date is not of type \DateTime
     *
     * @param mix $date variable to check against.
     * 
     * @throws WindowsAzure\Core\InvalidArgumentTypeException
     * 
     * @return none
     */
    public static function isDate($date)
    {
        if (gettype($date) != 'object' || get_class($date) != 'DateTime') {
            throw new InvalidArgumentTypeException('DateTime');
        }
    }
}

?>
