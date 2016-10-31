<?php

/**
 * LICENSE: Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 * http://www.apache.org/licenses/LICENSE-2.0.
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
 *
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 *
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */

namespace WindowsAzure\Common\Internal;

/**
 * Utilities for the project.
 *
 * @category  Microsoft
 *
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 *
 * @version   Release: 0.5.0_2016-11
 *
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
class Utilities
{
    /**
     * Returns the specified value of the $key passed from $array and in case that
     * this $key doesn't exist, the default value is returned.
     *
     * @param array|null $array   The array to be used
     * @param mixed      $key     The array key
     * @param mixed      $default The value to return if $key is not found in $array
     *
     * @static
     *
     * @return mixed
     */
    public static function tryGetValue(array $array = null, $key, $default = null)
    {
        return is_array($array) && array_key_exists($key, $array)
            ? $array[$key]
            : $default;
    }

    /**
     * Adds a url scheme if there is no scheme.
     *
     * @param string $url    The URL
     * @param string $scheme The scheme. By default HTTP
     *
     * @static
     *
     * @return string
     */
    public static function tryAddUrlScheme($url, $scheme = 'http')
    {
        $urlScheme = parse_url($url, PHP_URL_SCHEME);

        if (empty($urlScheme)) {
            $url = "$scheme://".$url;
        }

        return $url;
    }

    /**
     * tries to get nested array with index name $key from $array.
     *
     * Returns empty array object if the value is NULL.
     *
     * @param string $key   The index name
     * @param array  $array The array object
     *
     * @static
     *
     * @return array
     */
    public static function tryGetArray($key, $array)
    {
        return self::getArray(self::tryGetValue($array, $key));
    }

    /**
     * Adds the given key/value pair into array if the value doesn't satisfy empty().
     *
     * This function just validates that the given $array is actually array. If it's
     * NULL the function treats it as array.
     *
     * @param string     $key    The key
     * @param string     $value  The value
     * @param array|null &$array The array. If NULL will be used as array
     *
     * @static
     */
    public static function addIfNotEmpty($key, $value, array &$array = null)
    {
        if (!is_null($array)) {
            Validate::isArray($array, 'array');
        }

        if (!empty($value)) {
            $array[$key] = $value;
        }
    }

    /**
     * Returns the specified value of the key chain passed from $array and in case
     * that key chain doesn't exist, null is returned.
     *
     * @param array $array Array to be used
     *
     * @static
     *
     * @return mixed
     */
    public static function tryGetKeysChainValue($array)
    {
        $arguments = func_get_args();
        $numArguments = func_num_args();

        $currentArray = $array;
        for ($i = 1; $i < $numArguments; ++$i) {
            if (is_array($currentArray)) {
                if (array_key_exists($arguments[$i], $currentArray)) {
                    $currentArray = $currentArray[$arguments[$i]];
                } else {
                    return null;
                }
            } else {
                return null;
            }
        }

        return $currentArray;
    }

    /**
     * Checks if the passed $string starts with $prefix.
     *
     * @param string $string     word to seaech in
     * @param string $prefix     prefix to be matched
     * @param bool   $ignoreCase true to ignore case during the comparison;
     *                           otherwise, false
     *
     * @static
     *
     * @return bool
     */
    public static function startsWith($string, $prefix, $ignoreCase = false)
    {
        if ($ignoreCase) {
            $string = strtolower($string);
            $prefix = strtolower($prefix);
        }

        return $prefix == substr($string, 0, strlen($prefix));
    }

    /**
     * Returns grouped items from passed $var.
     *
     * @param array $var item to group
     *
     * @static
     *
     * @return array
     */
    public static function getArray($var)
    {
        if (is_null($var) || empty($var)) {
            return [];
        }

        foreach ($var as $value) {
            if ((gettype($value) == 'object')
                && (get_class($value) == 'SimpleXMLElement')
            ) {
                return (array) $var;
            } elseif (!is_array($value)) {
                return [$var];
            }
        }

        return $var;
    }

    /**
     * Unserializes the passed $xml into array.
     *
     * @param string $xml XML to be parsed
     *
     * @static
     *
     * @return array
     */
    public static function unserialize($xml)
    {
        $sxml = new \SimpleXMLElement($xml);

        return self::_sxml2arr($sxml);
    }

    /**
     * Converts a SimpleXML object to an Array recursively
     * ensuring all sub-elements are arrays as well.
     *
     * @param string $sxml SimpleXML object
     * @param array  $arr  Array into which to store results
     *
     * @static
     *
     * @return array
     */
    private static function _sxml2arr($sxml, $arr = null)
    {
        foreach ((array) $sxml as $key => $value) {
            if (is_object($value) || (is_array($value))) {
                $arr[$key] = self::_sxml2arr($value);
            } else {
                $arr[$key] = $value;
            }
        }

        return $arr;
    }

    /**
     * Serializes given array into xml. The array indices must be string to use
     * them as XML tags.
     *
     * @param array  $array      object to serialize represented in array
     * @param string $rootName   name of the XML root element
     * @param string $defaultTag default tag for non-tagged elements
     * @param string $standalone adds 'standalone' header tag, values 'yes'/'no'
     *
     * @static
     *
     * @return string
     */
    public static function serialize($array, $rootName, $defaultTag = null,
        $standalone = null
    ) {
        $xmlVersion = '1.0';
        $xmlEncoding = 'UTF-8';

        if (!is_array($array)) {
            return false;
        }

        $xmlw = new \XMLWriter();
        $xmlw->openMemory();
        $xmlw->startDocument($xmlVersion, $xmlEncoding, $standalone);

        $xmlw->startElement($rootName);

        self::_arr2xml($xmlw, $array, $defaultTag);

        $xmlw->endElement();

        return $xmlw->outputMemory(true);
    }

    /**
     * Takes an array and produces XML based on it.
     *
     * @param \XMLWriter $xmlw       XMLWriter object that was previously instanted
     *                               and is used for creating the XML
     * @param array      $data       Array to be converted to XML
     * @param string     $defaultTag Default XML tag to be used if none specified
     *
     * @static
     */
    private static function _arr2xml(\XMLWriter $xmlw, array $data, $defaultTag = null)
    {
        foreach ($data as $key => $value) {
            if (strcmp($key, '@attributes') == 0) {
                foreach ($value as $attributeName => $attributeValue) {
                    $xmlw->writeAttribute($attributeName, $attributeValue);
                }
            } elseif (is_array($value)) {
                if (!is_int($key)) {
                    if ($key != Resources::EMPTY_STRING) {
                        $xmlw->startElement($key);
                    } else {
                        $xmlw->startElement($defaultTag);
                    }
                }

                self::_arr2xml($xmlw, $value);

                if (!is_int($key)) {
                    $xmlw->endElement();
                }
                continue;
            } else {
                $xmlw->writeElement($key, $value);
            }
        }
    }

    /**
     * Converts string into boolean value.
     *
     * @param string $obj boolean value in string format
     *
     * @static
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
     * @param bool $obj boolean value to convert
     *
     * @static
     *
     * @return string
     */
    public static function booleanToString($obj)
    {
        return $obj ? 'true' : 'false';
    }

    /**
     * Converts a given date string into \DateTime object.
     *
     * @param string $date windows azure date ins string representation
     *
     * @static
     *
     * @return \DateTime
     */
    public static function rfc1123ToDateTime($date)
    {
        $timeZone = new \DateTimeZone('GMT');
        $format = Resources::AZURE_DATE_FORMAT;

        return \DateTime::createFromFormat($format, $date, $timeZone);
    }

    /**
     * Generate ISO 8601 compliant date string in UTC time zone.
     *
     * @param int $timestamp The unix timestamp to convert
     *                       (for DateTime check date_timestamp_get)
     *
     * @static
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
     * @param \DateTime $value The datetime value
     *
     * @static
     *
     * @return string
     */
    public static function convertToEdmDateTime($value)
    {
        if (empty($value)) {
            return $value;
        }

        if (is_string($value)) {
            $value = self::convertToDateTime($value);
        }

        Validate::isDate($value, 'value');

        $cloned = clone $value;
        $cloned->setTimezone(new \DateTimeZone('UTC'));

        return str_replace('+0000', 'Z', $cloned->format(\DateTime::ISO8601));
    }

    /**
     * Converts a string to a \DateTime object. Returns false on failure.
     *
     * @param string $value The string value to parse
     *
     * @static
     *
     * @return \DateTime
     */
    public static function convertToDateTime($value)
    {
        if ($value instanceof \DateTime) {
            return $value;
        }

        if (substr($value, -1) == 'Z') {
            $value = substr($value, 0, strlen($value) - 1);
        }

        return new \DateTime($value, new \DateTimeZone('UTC'));
    }

    /**
     * Converts string to stream handle.
     *
     * @param string $string The string contents
     *
     * @static
     *
     * @return resource
     */
    public static function stringToStream($string)
    {
        return fopen('data://text/plain,'.urlencode($string), 'rb');
    }

    /**
     * Sorts an array based on given keys order.
     *
     * @param array $array The array to sort
     * @param array $order The keys order array
     *
     * @return array
     */
    public static function orderArray($array, $order)
    {
        $ordered = [];

        foreach ($order as $key) {
            if (array_key_exists($key, $array)) {
                $ordered[$key] = $array[$key];
            }
        }

        return $ordered;
    }

    /**
     * Checks if a value exists in an array. The comparison is done in a case
     * insensitive manner.
     *
     * @param string $needle   The searched value
     * @param array  $haystack The array
     *
     * @static
     *
     * @return bool
     */
    public static function inArrayInsensitive($needle, $haystack)
    {
        return in_array(strtolower($needle), array_map('strtolower', $haystack));
    }

    /**
     * Checks if the given key exists in the array. The comparison is done in a case
     * insensitive manner.
     *
     * @param string $key    The value to check
     * @param array  $search The array with keys to check
     *
     * @static
     *
     * @return bool
     */
    public static function arrayKeyExistsInsensitive($key, $search)
    {
        return array_key_exists(strtolower($key), array_change_key_case($search));
    }

    /**
     * Returns the specified value of the $key passed from $array and in case that
     * this $key doesn't exist, the default value is returned. The key matching is
     * done in a case insensitive manner.
     *
     * @param string $key      The array key
     * @param array  $haystack The array to be used
     * @param mixed  $default  The value to return if $key is not found in $array
     *
     * @static
     *
     * @return mixed
     */
    public static function tryGetValueInsensitive($key, array $haystack, $default = null)
    {
        $array = array_change_key_case($haystack);

        return self::tryGetValue($array, strtolower($key), $default);
    }

    /**
     * Returns a string representation of a version 4 GUID, which uses random
     * numbers.There are 6 reserved bits, and the GUIDs have this format:
     *     xxxxxxxx-xxxx-4xxx-[8|9|a|b]xxx-xxxxxxxxxxxx
     * where 'x' is a hexadecimal digit, 0-9a-f.
     *
     * See http://tools.ietf.org/html/rfc4122 for more information.
     *
     * Note: This function is available on all platforms, while the
     * com_create_guid() is only available for Windows.
     *
     * @static
     *
     * @return string A new GUID
     */
    public static function getGuid()
    {
        // @codingStandardsIgnoreStart

        return sprintf(
            '%04x%04x-%04x-%04x-%02x%02x-%04x%04x%04x',
            mt_rand(0, 65535),
            mt_rand(0, 65535),          // 32 bits for "time_low"
            mt_rand(0, 65535),          // 16 bits for "time_mid"
            mt_rand(0, 4096) + 16384,   // 16 bits for "time_hi_and_version", with
                                        // the most significant 4 bits being 0100
                                        // to indicate randomly generated version
            mt_rand(0, 64) + 128,       // 8 bits  for "clock_seq_hi", with
                                        // the most significant 2 bits being 10,
                                        // required by version 4 GUIDs.
            mt_rand(0, 256),            // 8 bits  for "clock_seq_low"
            mt_rand(0, 65535),          // 16 bits for "node 0" and "node 1"
            mt_rand(0, 65535),          // 16 bits for "node 2" and "node 3"
            mt_rand(0, 65535)           // 16 bits for "node 4" and "node 5"
        );

        // @codingStandardsIgnoreEnd
    }

    /**
     * Creates a list of objects of type $class from the provided array using static
     * create method.
     *
     * @param array  $parsed The object in array representation
     * @param string $class  The class name. Must have static method create
     *
     * @static
     *
     * @return array
     */
    public static function createInstanceList($parsed, $class)
    {
        $list = [];

        foreach ($parsed as $value) {
            $list[] = $class::create($value);
        }

        return $list;
    }

    /**
     * Takes a string and return if it ends with the specified character/string.
     *
     * @param string $haystack   The string to search in
     * @param string $needle     postfix to match
     * @param bool   $ignoreCase Set true to ignore case during the comparison;
     *                           otherwise, false
     *
     * @static
     *
     * @return bool
     */
    public static function endsWith($haystack, $needle, $ignoreCase = false)
    {
        if ($ignoreCase) {
            $haystack = strtolower($haystack);
            $needle = strtolower($needle);
        }
        $length = strlen($needle);
        if ($length == 0) {
            return true;
        }

        return substr($haystack, -$length) === $needle;
    }

    /**
     * Get id from entity object or string.
     * If entity is object than validate type and return $entity->$method()
     * If entity is string than return this string.
     *
     * @param object|string $entity Entity with id property
     * @param string        $type   Entity type to validate
     * @param string        $method Methods that gets id (getId by default)
     *
     * @return string
     */
    public static function getEntityId($entity, $type, $method = 'getId')
    {
        if (is_string($entity)) {
            return $entity;
        } else {
            Validate::isA($entity, $type, 'entity');
            Validate::methodExists($entity, $method, $type);

            return $entity->$method();
        }
    }

    /**
     * Generate a pseudo-random string of bytes using a cryptographically strong
     * algorithm.
     *
     * @param int $length Length of the string in bytes
     *
     * @return string|bool Generated string of bytes on success, or FALSE on
     *                     failure
     */
    public static function generateCryptoKey($length)
    {
        return openssl_random_pseudo_bytes($length);
    }

    /**
     * Encrypts $data with CTR encryption.
     *
     * @param string $data                 Data to be encrypted
     * @param string $key                  AES Encryption key
     * @param string $initializationVector Initialization vector
     *
     * @return string Encrypted data
     */
    public static function ctrCrypt($data, $key, $initializationVector)
    {
        Validate::isString($data, 'data');
        Validate::isString($key, 'key');
        Validate::isString($initializationVector, 'initializationVector');

        Validate::isTrue(
            (strlen($key) == 16 || strlen($key) == 24 || strlen($key) == 32),
            sprintf(Resources::INVALID_STRING_LENGTH, 'key', '16, 24, 32')
        );

        Validate::isTrue(
            (strlen($initializationVector) == 16),
            sprintf(Resources::INVALID_STRING_LENGTH, 'initializationVector', '16')
        );

        $blockCount = ceil(strlen($data) / 16);

        $ctrData = '';
        for ($i = 0; $i < $blockCount; ++$i) {
            $ctrData .= $initializationVector;

            // increment Initialization Vector
            $j = 15;
            do {
                $digit = ord($initializationVector[$j]) + 1;
                $initializationVector[$j] = chr($digit & 0xFF);

                --$j;
            } while (($digit == 0x100) && ($j >= 0));
        }

        $encryptCtrData = mcrypt_encrypt(
            MCRYPT_RIJNDAEL_128,
            $key,
            $ctrData,
            MCRYPT_MODE_ECB
        );

        return $data ^ $encryptCtrData;
    }

    /**
     * Convert base 256 number to decimal number.
     *
     * @param string $number Base 256 number
     *
     * @return string Decimal number
     */
    public static function base256ToDec($number)
    {
        Validate::isString($number, 'number');

        $result = 0;
        $base = 1;
        for ($i = strlen($number) - 1; $i >= 0; --$i) {
            $result = bcadd($result, bcmul(ord($number[$i]), $base));
            $base = bcmul($base, 256);
        }

        return $result;
    }
}
