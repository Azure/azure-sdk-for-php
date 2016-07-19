<?php

/**
 * @category    Microsoft
 *
 * @author      Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright   2016 Microsoft Corporation
 * @license     https://github.com/yaqiyang/php-sdk-dev/blob/master/LICENSE
 *
 * @link        https://github.com/Azure/azure-sdk-for-php
 *
 * @version     Release: 0.10.0_2016
 */

namespace MicrosoftAzure\Common\Internal\Serialization;

use MicrosoftAzure\Common\Internal\Validate;

/**
 * Perform JSON serialization / deserialization.
 */
class JsonSerializer implements ISerializer
{
    /**
     * Serializes an object with specified root element name.
     *
     * @param object $targetObject The target object.
     * @param string $rootName     The name of the root element.
     *
     * @return string
     */
    public static function objectSerialize($targetObject, $rootName)
    {
        Validate::notNull($targetObject, 'targetObject');
        Validate::isString($rootName, 'rootName');

        $contianer = new \stdClass();

        $contianer->$rootName = $targetObject;

        return json_encode($contianer);
    }

    /**
     * Serializes given array. The array indices must be string to use them as
     * as element name.
     *
     * @param array $array      The object to serialize represented in array.
     * @param array $properties The used properties in the serialization process.
     *
     * @return string
     */
    public function serialize($array, $properties = null)
    {
        Validate::isArray($array, 'array');

        return json_encode($array);
    }

    /**
     * Deserializes given serialized string to array.
     *
     * @param string $serialized The serialized object in string representation.
     *
     * @return array
     */
    public function deserialize($serialized)
    {
        Validate::isString($serialized, 'serialized');

        $json = json_decode($serialized);
        if ($json && !is_array($json)) {
            return get_object_vars($json);
        } else {
            return $json;
        }
    }
}
