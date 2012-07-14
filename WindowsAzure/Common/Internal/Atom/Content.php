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
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      https://github.com/WindowsAzure/azure-sdk-for-php
 */

namespace WindowsAzure\Common\Internal\Atom;
use WindowsAzure\Common\Internal\Resources;
use WindowsAzure\Common\Internal\Utilities;
use WindowsAzure\Common\Internal\Validate;

/**
 * The content class of ATOM standard.
 *
 * @category  Microsoft
 * @package   WindowsAzure\Common\Internal\Atom
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      https://github.com/WindowsAzure/azure-sdk-for-php
 */

class Content extends AtomBase
{
    /**
     * The text of the content. 
     *
     * @var string  
     */
    protected $text;

    /**
     * The type of the content. 
     *
     * @var string  
     */
    protected $type;
     
    /** 
     * Creates a Content instance with specified text.
     *
     * @param string $text The text of the content.
     * 
     * @return none
     */
    public function __construct($text = null)
    {
        $this->text = $text;
    }

    /**
     * Creates an ATOM CONTENT instance with specified xml string. 
     * 
     * @param string $xmlString an XML based string of ATOM CONTENT.
     * 
     * @return none
     */ 
    public function parseXml($xmlString)
    {
        Validate::notNull($xmlString, 'xmlString');
        Validate::isString($xmlString, 'xmlString');
        $contentXml = simplexml_load_string($xmlString);
        Validate::notNull($contentXml, 'contentXml');

        $attributes = $contentXml->attributes();

        if (!empty($attributes['type'])) {
            $this->content = (string)$attributes['type'];
        }

        $text = '';
        foreach ($contentXml->children() as $child) {
            $text .= $child->asXML();
        } 

        $this->text = $text;
    }

    /** 
     * Gets the text of the content. 
     *
     * @return string
     */
    public function getText()
    {   
        return $this->text;
    } 

    /**
     * Sets the text of the content.
     * 
     * @param string $text The text of the content.
     * 
     * @return none
     */
    public function setText($text)
    {
        $this->text = $text; 
    }

    /**
     * Gets the type of the content. 
     * 
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Sets the type of the content. 
     * 
     * @param string $type The type of the content.
     * 
     * @return none
     */
    public function setType($type)
    {
        $this->type = $type;
    }
    
    /** 
     * Writes an XML representing the content. 
     * 
     * @param \XMLWriter $xmlWriter The XML writer.
     * 
     * @return none
     */
    public function writeXml($xmlWriter)
    {
        Validate::notNull($xmlWriter, 'xmlWriter');
        $xmlWriter->startElementNS(
            'atom',
            'content',
            Resources::ATOM_NAMESPACE
        );

        $this->writeOptionalAttribute(
            $xmlWriter,
            'type', 
            $this->type
        );

        $this->writeInnerXml($xmlWriter);
        $xmlWriter->endElement();
    }

    /** 
     * Writes an inner XML representing the content. 
     * 
     * @param \XMLWriter $xmlWriter The XML writer.
     * 
     * @return none
     */
    public function writeInnerXml($xmlWriter)
    {
        Validate::notNull($xmlWriter, 'xmlWriter');
        $xmlWriter->writeRaw($this->text);
    }
}
?>
