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
 * @package   PEAR2\WindowsAzure
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
 
namespace PEAR2\WindowsAzure;
require_once 'XML/Unserializer.php';
require_once 'XML/Serializer.php';

/**
 * Utilities for the project
 *
 * @category  Microsoft
 * @package   PEAR2\WindowsAzure
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
     * @static
     * 
     * @return mixed.
     */
    public static function tryGetValue($array, $key, $default = null)
    {
        return array_key_exists($key, $array) ? $array[$key] : $default;
    }
    
    /**
     * Checks if the passed $string starts with $prefix
     *
     * @param string $string word to seaech in
     * @param string $prefix prefix to be matched
     * 
     * @static
     * 
     * @return bool.
     */
    public static function startsWith($string, $prefix)
    {
        return ($prefix == substr($string, 0, strlen($prefix)));
    }
    
    /**
     * Returns grouped items from passed $var
     *
     * @param array $var item to group
     * 
     * @static
     * 
     * @return array.
     */
    public static function getArray($var)
    {
        if (is_null($var) || empty($var)) {
            return array();
        }
        
        foreach ($var as $value) {
            if (!is_array($value)) {
                return array($var);
            }
        }
        
        return $var;
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
    
    /**
     * Serializes given array into xml. The array indecies must be string to use
     * them as XML tags.
     * 
     * @param array  $array      object to serialize represented in array.
     * @param string $rootName   name of the XML root element.
     * @param string $defaultTag default tag for non-tagged elements.
     * 
     * @return string
     */
    public static function serialize($array, $rootName, $defaultTag = null)
    {
        $options = array(
            XML_SERIALIZER_OPTION_INDENT           => '    ',
            XML_SERIALIZER_OPTION_XML_DECL_ENABLED => true,
            XML_SERIALIZER_OPTION_RETURN_RESULT    => true,
            XML_SERIALIZER_OPTION_XML_ENCODING     => "UTF-8",
            XML_SERIALIZER_OPTION_ROOT_NAME        => $rootName,
            XML_SERIALIZER_OPTION_DEFAULT_TAG      => $defaultTag
        );
        
        $serializer = new \XML_Serializer($options);
        $xml        = $serializer->serialize($array);
        
        return $xml;
    }
    
    /**
     * Converts string into boolean value.
     * 
     * @param string $obj boolean value in string format.
     * 
     * @return bool
     */
    public static function toBoolean($obj)
    {
        return filter_var($obj, FILTER_VALIDATE_BOOLEAN);
    }
    
    /**
     * Converts string into boolean value.
     * 
     * @param bool $obj boolean value to convert.
     * 
     * @return string
     */
    public static function booleanToString($obj)
    {
        return $obj ? 'true' : 'false';
    }
    
    /**
     * Converts all string keys in the given $array into lower case
     * 
     * @param array $array array to be used
     * 
     * @return array 
     */
    public static function keysToLower($array)
    {
        $clean = array();
        
        foreach ($array as $key => $value) {
            $clean[strtolower($key)] = $value;
        }
        
        return $clean;
    }

    /**
    * Generate ISO 8601 compliant date string in UTC time zone
    * 
    * @param int $timestamp The time to convert
    *
    * @return string
    */
    public static function isoDate($timestamp = null)
    {        
        $tz = date_default_timezone_get();
        date_default_timezone_set('UTC');

        if (is_null($timestamp)) {
            $timestamp = time();
        }

        $returnValue = str_replace(
            '+00:00', '.0000000Z', date('c', $timestamp)
        );
        date_default_timezone_set($tz);
        return $returnValue;
    }
    
    /**
        * Converts a DateTime object into an Edm.DaeTime value in UTC timezone,
        * represented as a string.
        * 
        * @param \DateTime $value The datetime value.
        * 
        * @return string
        */
    public static function convertToEdmDateTime($value) 
    {
        $cloned = clone $value;
        $cloned->setTimezone(new \DateTimeZone('UTC'));
        return str_replace('+0000', 'Z', $cloned->format(\DateTime::ISO8601));
    }
    
    /**
        * Converts a string to a \DateTime object. Returns false on failure.
        * 
        * @param string $value The string value to parse.
        * 
        * @return DateTime
        */
    public function convertToDateTime($value)
    {
        if ($value instanceof \DateTime) {
            return $value;
        }
        
        if (substr($value, -1) == 'Z') {
            $value = substr($value, 0, strlen($value) - 1);
        }
            
        return new \DateTime($value, new \DateTimeZone('UTC'));
    }
}

?>
