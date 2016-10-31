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
 * @copyright Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 *
 * @link      https://github.com/WindowsAzure/azure-sdk-for-php
 */

namespace WindowsAzure\MediaServices\Internal;

use SimpleXMLElement;
use WindowsAzure\Common\Internal\Resources;
use WindowsAzure\Common\Internal\Validate;

/**
 * Atom content properties serializer.
 *
 * @category  Microsoft
 *
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 *
 * @version   Release: 0.5.0_2016-11
 *
 * @link      https://github.com/WindowsAzure/azure-sdk-for-php
 */
class ContentPropertiesSerializer
{
    /**
     * Parse a Properties xml.
     *
     * @param SimpleXMLElement $xmlContent XML object to parse
     *
     * @return array
     */
    public static function unserialize(SimpleXMLElement $xmlContent)
    {
        Validate::notNull($xmlContent, 'xmlContent');

        return self::_unserializeRecursive($xmlContent);
    }

    /**
     * Get properties XML from object.
     *
     * @param object $object The object to get properties
     *
     * @return string
     */
    public static function serialize($object)
    {
        Validate::notNull($object, 'object');

        $xmlWriter = new \XMLWriter();
        $xmlWriter->openMemory();

        $xmlWriter->startElementNS(
            'meta',
            Resources::PROPERTIES,
            Resources::DSM_XML_NAMESPACE
        );
        self::_serializeRecursive($object, $xmlWriter);
        $xmlWriter->endElement();

        return $xmlWriter->outputMemory();
    }

    /**
     * Parse properties recursively.
     *
     * @param SimpleXMLElement $xml XML object to parse
     *
     * @return array
     */
    private static function _unserializeRecursive(SimpleXMLElement $xml)
    {
        $result = [];
        $dataNamespace = Resources::DS_XML_NAMESPACE;
        /** @var SimpleXMLElement $child */
        foreach ($xml->children($dataNamespace) as $child) {
            if (count($child->children($dataNamespace)) > 0) {
                $value = [];
                $children = $child->children($dataNamespace);
                /** @var SimpleXMLElement $firstChild */
                $firstChild = $children[0];
                if ($firstChild->getName() == 'element') {
                    foreach ($children as $subChild) {
                        $value[] = self::_unserializeRecursive(
                            $subChild
                        );
                    }
                } else {
                    $value = self::_unserializeRecursive(
                        $child
                    );
                }
            } else {
                $value = (string) $child;
            }

            $result[$child->getName()] = $value;
        }

        return $result;
    }

    /**
     * Returns true if the specified filed y required for the specified entity.
     *
     * @param mixed  $object    the entity
     * @param string $fieldName the property name to verify if it's required or not
     *
     * @return bool
     */
    private static function _isRequired($object, $fieldName)
    {
        $reflectionClass = new \ReflectionClass($object);
        if ($reflectionClass->hasMethod('requiredFields')) {
            return in_array($fieldName, $object->requiredFields());
        }

        return false;
    }

    /**
     * Get object properties as array.
     *
     * @param object     $object    Source object
     * @param \XMLWriter $xmlWriter Xml writer to use
     *
     * @return array
     */
    private static function _serializeRecursive($object, \XMLWriter $xmlWriter)
    {
        Validate::notNull($object, 'object');

        $reflectionClass = new \ReflectionClass($object);
        $methodArray = $reflectionClass->getMethods();

        $result = [];
        foreach ($methodArray as $method) {
            if ((strpos($method->name, 'get') === 0)
                && $method->isPublic()
            ) {
                $variableName = substr($method->name, 3);
                $variableValue = $method->invoke($object);
                if (!empty($variableValue) || self::_isRequired($object, $variableName)) {
                    if (is_a($variableValue, '\DateTime')) {
                        $variableValue = $variableValue->format(\DateTime::ATOM);
                    }
                    if (is_a($variableValue, '\DateInterval')) {
                        $variableValue = self::dateIntervalToString($variableValue);
                    }
                    if (gettype($variableValue) == 'array') {
                        $xmlWriter->startElementNS(
                            'data',
                            $variableName,
                            Resources::DS_XML_NAMESPACE
                        );

                        foreach ($variableValue as $item) {
                            $xmlWriter->startElementNS(
                                'data',
                                Resources::ELEMENT,
                                Resources::DS_XML_NAMESPACE
                            );

                            self::_serializeRecursive(
                                $item,
                                $xmlWriter
                            );

                            $xmlWriter->endElement();
                        }

                        $xmlWriter->endElement();
                    } elseif (gettype($variableValue) == 'object') {
                        $xmlWriter->startElementNS(
                            'data',
                            $variableName,
                            Resources::DS_XML_NAMESPACE
                        );

                        self::_serializeRecursive(
                            $variableValue,
                            $xmlWriter
                        );

                        $xmlWriter->endElement();
                    } else {
                        $xmlWriter->writeElementNS(
                            'data',
                            $variableName,
                            Resources::DS_XML_NAMESPACE,
                            (string) $variableValue
                        );
                    }
                }
            }
        }

        return $result;
    }

    /**
     * @param \DateInterval $interval
     *
     * @return string
     */
    private static function dateIntervalToString(\DateInterval $interval)
    {

        // Reading all non-zero date parts.
        $date = array_filter([
            'Y' => $interval->y,
            'M' => $interval->m,
            'D' => $interval->d,
        ]);

        // Reading all non-zero time parts.
        $time = array_filter([
            'H' => $interval->h,
            'M' => $interval->i,
            'S' => $interval->s,
        ]);

        $specString = 'P';

        // Adding each part to the spec-string.
        foreach ($date as $key => $value) {
            $specString .= $value.$key;
        }
        if (count($time) > 0) {
            $specString .= 'T';
            foreach ($time as $key => $value) {
                $specString .= $value.$key;
            }
        }

        return $specString;
    }
}
