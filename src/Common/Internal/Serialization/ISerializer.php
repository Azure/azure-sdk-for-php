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

/**
 * The serialization interface.
 */
interface ISerializer
{
    /**
     * Serializes an object into a XML or other format such as Json.
     *
     * @param object $targetObject The target object to be serialized.
     * @param string $rootName     The name of the root.
     *
     * @return string
     */
    public static function objectSerialize($targetObject, $rootName);

    /**
     * Serializes the given array. The array indices must be string to use them as
     * as element name.
     *
     * @param array $array      The object to serialize represented in array.
     * @param array $properties The used properties in the serialization process.
     *
     * @return string
     */
    public function serialize($array, $properties = null);

    /**
     * Deserializes given serialized string.
     *
     * @param string $serialized The serialized object in string representation.
     *
     * @return array
     */
    public function deserialize($serialized);
}
