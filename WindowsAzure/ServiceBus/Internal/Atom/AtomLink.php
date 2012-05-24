<?php

/**
 * LICENSE: Licensed under the Apache License, Version 2.0 (the "License");;
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
 * @package   WindowsAzure\ServiceBus\Internal\Atom
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */

namespace WindowsAzure\ServiceBus\Internal\Atom;
use WindowsAzure\Common\Internal\Utilities;
use WindowsAzure\Common\Internal\Resources;

/**
 * This class constructs HTTP requests and receive HTTP responses for service bus.
 *
 * @category  Microsoft
 * @package   WindowsAzure\ServiceBus\Internal\Atom
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */

class AtomLink
{
    /**
     * The undefined content. 
     *
     * @var string  
     */
    private $_undefinedContent;

    /**
     * The HREF of the link. 
     *
     * @var string  
     */
    private $_href;

    private $_rel;

    private $_type;

    private $_hreflang;

    private $_title;

    private $_length;

     
    /** 
     * Creates a AtomLink instance with specified text.
     *
     * @param string $text The text of the atomLink.
     */
    public function __construct()
    {
    }

    /**
     * Creates an ATOM CONTENT instance with specified xml string. 
     * 
     * @param string $xmlString an XML based string of ATOM CONTENT.
     */ 
    public static function create($xmlString)
    {
        $atomLink = new AtomLink();
        $atomLinkXml = simplexml_load_string($xmlString);
        $attributes = $atomLinkXml->attributes();

        if (array_key_exists('href', $attributes))
        {
            $atomLink->setHref((string)$attributes["href"]);
        }

        if (array_key_exists('rel', $attributes))
        {
            $atomLink->setHref($attributes['rel']);
        }

        if (array_key_exists('type', $attributes))
        {
            $atomLink->setHref($attributes['type']);
        }

        if (array_key_exists('hreflang', $attributes))
        {
            $atomLink->setHref($attributes['hreflang']);
        }

        if (array_key_exists('title', $attributes))
        {
            $atomLink->setHref($attributes['title']);
        }

        if (array_key_exists('length', $attributes))
        {
            $atomLink->setHref($attributes['length']);
        }

        $atomLink->setUndefinedContent((string)$atomLinkXml->InnerNode);
        return $atomLink;
    }

    /** 
     * Gets the text of the atomLink. 
     *
     * @return string
     */
    public function getHref()
    {   
        return $this->_href;
    } 

    /**
     * Sets the text of the atomLink.
     * 
     * @param string $text The text of the atomLink.
     */
    public function setHref($href)
    {
        $this->_href = $href; 
    }

    /**
     * Gets the type of the atomLink. 
     * 
     * @return string
     */
    public function getRel()
    {
        return $this->_rel;
    }

    /**
     * Sets the type of the atomLink. 
     * 
     * @param string $type The type of the atomLink.
     */
    public function setRel($rel)
    {
        $this->_rel = $rel;
    }

    public function getType()
    {
        return $this->_type;
    }

    public function setType($type)
    {
        $this->_type = $type;
    }

    public function getHrefLang()
    {
        return $this->_hrefLang;
    }

    public function setHrefLang($hrefLang)
    {
        $this->_hrefLang = $hrefLang;
    }

    public function getTitle()
    {
        return $this->_title;
    }

    public function setTitle($title)
    {
        $this->_title = $title;
    }

    public function getLength() 
    {
        return $this->_length;
    }

    public function setLength($length)
    {
        $this->_length = $length;
    }

    public function getUndefinedContent()
    {
        return $this->_undefinedContent;
    }

    public function setUndefinedContent($undefinedContent)
    {
        $this->_undefinedContent = $undefinedContent;
    }

    /** 
     * Gets an XML representing the atomLink. 
     * 
     * return string
     */
    public function toXml()
    {
        $xmlWriter = new \XMLWriter();
        $xmlWriter->openMemory();
        $xmlWriter->startElement('atom:atomLink');
        if (!empty($this->_href))
        {
            $xmlWriter->writeAttribute('href', $this->_href);
        }

        if (!empty($this->_rel))
        {
            $xmlWriter->writeAttribute('rel', $this->_rel);
        }

        if (!empty($this->_type))
        {
            $xmlWriter->writeAttribute('type', $this->_type);
        }

        if (!empty($this->_hreflang))
        {
            $xmlWriter->writeAttribute('hreflang', $this->_hreflang);
        }

        if (!empty($this->_title))
        {
            $xmlWriter->writeAttribute('title', $this->_title);
        }

        if (!empty($this->_length))
        {
            $xmlWriter->writeAttribute('length', $this->_length);
        }

        if (!empty($this->_undefinedContent))
        {
            $xmlWriter->writeRaw($this->_undefinedContent);
        }

        $xmlWriter->endElement();

        return $xmlWriter->outputMemory();
    }
}
?>
