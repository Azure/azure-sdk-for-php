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

namespace WindowsAzure\Common\Internal\Atom;
use WindowsAzure\Common\Internal\Utilities;
use WindowsAzure\Common\Internal\Resources;

/**
 * This link defines a reference from an entry or feed to a Web resource.
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
    protected $_undefinedContent;

    /**
     * The HREF of the link. 
     *
     * @var string  
     */
    protected $_href;

    /**
     * The rel attribute of the link.
     *
     * @var string
     */
    protected $_rel;

    /**
     * The media type of the link. 
     *
     * @var string 
     */
    protected $_type;

    /**
     * The language of HREF.
     * 
     * @var string 
     */
    protected $_hreflang;

    /**
     * The titile of the link. 
     * 
     * @var string 
     */ 
    protected $_title;

    /**
     * The length of the link. 
     * 
     * @var integer 
     */
    protected $_length;
     
    /** 
     * Creates a AtomLink instance with specified text.
     */
    public function __construct()
    {
    }

    /**
     * Parse an ATOM Link xml. 
     * 
     * @param string $xmlString an XML based string of ATOM Link.
     */ 
    public function parseXml($xmlString)
    {
        $atomLinkXml = simplexml_load_string($xmlString);
        $attributes = (array)$atomLinkXml->attributes();

        if (!empty($attributes['href']))
        {
            $this->_href = (string)$attributes['href'];
        }

        if (!empty($attributes['rel']))
        {
            $this->_rel = (string)$attributes['rel'];
        }

        if (!empty($attributes['type']))
        {
            $this->_type = (string)$attributes['type'];
        }

        if (!empty($attributes['hreflang']))
        {
            $this->_hreflang = (string)$attributes['hreflang'];
        }

        if (!empty($attributes['title']))
        {
            $this->_title = (string)$attributes['title'];
        }

        if (!empty($attributes['length']))
        {
            $this->_length = (integer)$attributes['length'];
        }

        $this->_undefinedContent = (string)$atomLinkXml;
    }

    /** 
     * Gets the href of the link. 
     *
     * @return string
     */
    public function getHref()
    {   
        return $this->_href;
    } 

    /**
     * Sets the href of the link.
     * 
     * @param string $href The href of the link.
     */
    public function setHref($href)
    {
        $this->_href = $href; 
    }

    /**
     * Gets the rel of the atomLink. 
     * 
     * @return string
     */
    public function getRel()
    {
        return $this->_rel;
    }

    /**
     * Sets the rel of the link. 
     * 
     * @param string $rel The rel of the atomLink.
     */
    public function setRel($rel)
    {
        $this->_rel = $rel;
    }

    /**
     * Gets the type of the link. 
     *
     * @return string 
     */
    public function getType()
    {
        return $this->_type;
    }

    /**
     * Sets the type of the link.
     * 
     * @param string $type The type of the link. 
     */
    public function setType($type)
    {
        $this->_type = $type;
    }

    /**
     * Gets the language of the href. 
     * 
     * @return string 
     */
    public function getHrefLang()
    {
        return $this->_hrefLang;
    }

    /**
     * Sets the language of the href. 
     * 
     * @param string $hrefLang The language of the href.
     */
    public function setHrefLang($hrefLang)
    {
        $this->_hrefLang = $hrefLang;
    }

    /** 
     * Gets the title of the link. 
     * 
     * @return string 
     */
    public function getTitle()
    {
        return $this->_title;
    }

    /**
     * Sets the title of the link. 
     * 
     * @param string $title The title of the link. 
     */
    public function setTitle($title)
    {
        $this->_title = $title;
    }

    /**
     * Gets the length of the link. 
     * 
     * @return string 
     */
    public function getLength() 
    {
        return $this->_length;
    }

    /**
     * Sets the length of the link. 
     * 
     * @param string $length The length of the link. 
     */
    public function setLength($length)
    {
        $this->_length = $length;
    }

    /**     
     * Gets the undefined content. 
     *
     * @return string 
     */
    public function getUndefinedContent()
    {
        return $this->_undefinedContent;
    }

    /**
     * Sets the undefined content. 
     * 
     * @param string $undefinedContent The undefined content. 
     */
    public function setUndefinedContent($undefinedContent)
    {
        $this->_undefinedContent = $undefinedContent;
    }

    /** 
     * Writes an XML representing the ATOM link item.
     * 
     * @param \XMLWriter $xmlWriter The xml writer.
     */
    public function writeXml($xmlWriter)
    {
        $xmlWriter->startElement('atom:link');
        $this->writeInnerXml($xmlWriter);
        $xmlWriter->endElement();
    }

    /** 
     * Writes the inner XML representing the ATOM link item.
     * 
     * @param \XMLWriter $xmlWriter The xml writer.
     */
    public function writeInnerXml($xmlWriter)
    {
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

    }
}
?>
