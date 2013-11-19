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

namespace WindowsAzure\Common\Internal\Atom;
use WindowsAzure\Common\Internal\Resources;
use WindowsAzure\Common\Internal\Utilities;
use WindowsAzure\Common\Internal\Validate;

/**
 * Atom object properties.
 *
 * @category  Microsoft
 * @package   WindowsAzure\Common\Internal\Atom
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: 0.3.1_2011-08
 * @link      https://github.com/WindowsAzure/azure-sdk-for-php
 */

class AtomProperties extends AtomBase
{
    /**
     * The undefined content.
     *
     * @var array
     */
    protected $properties;

    /**
     * Creates a AtomProperties instance.
     */
    public function __construct()
    {
    }

    /**
     * Parse an ATOM Properties xml.
     *
     * @param string $xmlString an XML based string of ATOM Link.
     *
     * @return none
     */
    public function fromXml($xmlContent)
    {
        Validate::notNull($xmlContent, 'xmlContent');

        foreach ($xmlContent->children(Resources::DS_XML_NAMESPACE) as $child) {
            $this->properties[$child->getName()] = (string)$child;
        }
    }

    /**
     * Set properties from object.
     *
     * @return object
     */
    public function setPropertiesFromObject($object)
    {
        Validate::notNull($object, 'object');

        $reflectionClass = new \ReflectionClass($object);
        $methodArray     = $reflectionClass->getMethods();

        foreach ($methodArray as $method) {
            if ((strpos($method->name, 'get') === 0)
            && $method->isPublic()
            ) {
                $variableName  = substr($method->name, 3);
                $variableValue = $method->invoke($object);
                if (!empty($variableValue)) {
                    if (is_a($variableValue, '\DateTime')) {
                        $variableValue = $variableValue->format(\DateTime::ATOM);
                    }
                    $this->properties[$variableName] = (string)$variableValue;
                }
            }
        }
    }


    /**
     * Get properties
     *
     * @return array
     */
    public function getProperties() {
        return $this->properties;
    }

    /**
     * Writes an XML representing the ATOM properties item.
     *
     * @param \XMLWriter $xmlWriter The xml writer.
     *
     * @return none
     */
    public function writeXml($xmlWriter)
    {
        Validate::notNull($xmlWriter, 'xmlWriter');
        $xmlWriter->startElementNS(
            'meta',
            Resources::PROPERTIES,
            Resources::DSM_XML_NAMESPACE
        );
        $this->writeInnerXml($xmlWriter);
        $xmlWriter->endElement();
    }

    /**
     * Writes the inner XML representing the ATOM properties item.
     *
     * @param \XMLWriter $xmlWriter The xml writer.
     *
     * @return none
     */
    public function writeInnerXml($xmlWriter)
    {
        Validate::notNull($xmlWriter, 'xmlWriter');

        foreach($this->properties as $key => $value) {
            $xmlWriter->writeElementNS(
                'data',
                $key,
                Resources::DS_XML_NAMESPACE,
                $value
            );
        }
    }
}

