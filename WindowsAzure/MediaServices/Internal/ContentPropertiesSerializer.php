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
 * @package   WindowsAzure\Common\Internal\Atom
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      https://github.com/WindowsAzure/azure-sdk-for-php
 */

namespace WindowsAzure\MediaServices\Internal;
use WindowsAzure\Common\Internal\Resources;
use WindowsAzure\Common\Internal\Utilities;
use WindowsAzure\Common\Internal\Validate;


/**
 * Atom content properties serializer.
 *
 * @category  Microsoft
 * @package   WindowsAzure\Common\Internal\Atom
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: 0.4.2_2016-04
 * @link      https://github.com/WindowsAzure/azure-sdk-for-php
 */

class ContentPropertiesSerializer
{
    /**
     * Parse a Properties xml.
     *
     * @param \SimpleXML $xmlContent XML object to parse
     *
     * @return array
     */
    public static function unserialize($xmlContent)
    {
        Validate::notNull($xmlContent, 'xmlContent');

        return ContentPropertiesSerializer::_unserializeRecursive($xmlContent);
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
        ContentPropertiesSerializer::_serializeRecursive($object, $xmlWriter);
        $xmlWriter->endElement();

        return $xmlWriter->outputMemory();
    }

    /**
     * Parse properties recursively
     *
     * @param \SimpleXML $xml XML object to parse
     *
     * @return array
     */
    private static function _unserializeRecursive($xml)
    {
        $result        = array();
        $dataNamespace = Resources::DS_XML_NAMESPACE;
        foreach ($xml->children($dataNamespace) as $child) {
            if (count($child->children($dataNamespace)) > 0) {
                $value      = array();
                $children   = $child->children($dataNamespace);
                $firstChild = $children[0];
                if ($firstChild->getName() == 'element') {
                    foreach ($children as $subChild) {
                        $value[] = ContentPropertiesSerializer::_unserializeRecursive(
                            $subChild
                        );
                    }
                } else {
                    $value = ContentPropertiesSerializer::_unserializeRecursive(
                        $child
                    );
                }
            } else {
                $value = (string)$child;
            }

            $result[$child->getName()] = $value;
        }

        return $result;
    }

    /**
     * Returns true if the specified filed y requierd for the specified entity.
     * @param mixed $object the entity
     * @param string $fieldName the property name to verify if it's required or not.
     * @return bool
     */
    private static function _isRequired($object, $fieldName) {
        $reflectionClass = new \ReflectionClass($object);
        if ($reflectionClass->hasMethod('requiredFields')) {
            return in_array($fieldName, $object->requiredFields());
        }
        return false;
    }

    /**
     * Get object properties as array
     *
     * @param object     $object    Source object
     * @param \XMLWriter $xmlWriter Xml writer to use
     *
     * @return  array
     */
    private static function _serializeRecursive($object, $xmlWriter)
    {
        Validate::notNull($object, 'object');

        $reflectionClass = new \ReflectionClass($object);
        $methodArray     = $reflectionClass->getMethods();

        $result = array();
        foreach ($methodArray as $method) {
            if ((strpos($method->name, 'get') === 0)
                && $method->isPublic()
            ) {
                $variableName  = substr($method->name, 3);
                $variableValue = $method->invoke($object);
                if (!empty($variableValue) || ContentPropertiesSerializer::_isRequired($object, $variableName)) {
                    if (is_a($variableValue, '\DateTime')) {
                        $variableValue = $variableValue->format(\DateTime::ATOM);
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

                            ContentPropertiesSerializer::_serializeRecursive(
                                $item,
                                $xmlWriter
                            );

                            $xmlWriter->endElement();
                        }

                        $xmlWriter->endElement();
                    } else if (gettype($variableValue) == 'object') {
                        $xmlWriter->startElementNS(
                            'data',
                            $variableName,
                            Resources::DS_XML_NAMESPACE
                        );

                        ContentPropertiesSerializer::_serializeRecursive(
                            $variableValue,
                            $xmlWriter
                        );

                        $xmlWriter->endElement();
                    } else {
                        $xmlWriter->writeElementNS(
                            'data',
                            $variableName,
                            Resources::DS_XML_NAMESPACE,
                            (string)$variableValue
                        );
                    }
                }
            }
        }

        return $result;
    }
}

