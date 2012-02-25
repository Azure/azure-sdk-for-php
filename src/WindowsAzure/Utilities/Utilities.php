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
 * @package   PEAR2\WindowsAzure\Utilities
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
 
namespace PEAR2\WindowsAzure\Utilities;
require_once 'XML/Unserializer.php';

/**
 * Utilities for the project
 *
 * @category  Microsoft
 * @package   PEAR2\WindowsAzure\Utilities
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
class Utilities
{
    /**
     * Returns the specified value of the $key passed from $array and in case that
     * this $key doesn't exist, the default value is retured.
     *
     * @param array $array   Array to be used.
     * @param mixed $key     Array key.
     * @param mixed $default Value to return if $key is not found in $array.
     * 
     * @return mixed.
     */
    public static function getValue($array, $key, $default)
    {
        return array_key_exists($key, $array) ? $array[$key] : $default;
    }
    
    /**
     * Unserializes the passed $xml into array.
     *
     * @param string $xml XML to be parsed.
     * 
     * @static
     * 
     * @return array.
     */
    public static function unserialize($xml)
    {
        $unserializer = new \XML_Unserializer();
        $unserializer->unserialize($xml);
        return $unserializer->getUnserializedData();
    }
}

?>
