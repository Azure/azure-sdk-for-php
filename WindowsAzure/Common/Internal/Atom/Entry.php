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

class Entry
{
    /**
     * The attributes of the entry 
     * @var array
     */
    protected $_attributes;

    /**
     * The author of the entry.
     *
     * @var Person
     */
    protected $_author;

    /**
     * The category of the entry.
     *
     * @var array
     */
    protected $_category;

    /**
     * The content of the entry.
     *
     * @var string
     */
    protected $_content;

    /**
     * The contributor of the entry.
     *
     * @var string
     */
    protected $_contributor;

    /**
     * An unqiue ID representing the entry.
     *
     * @var string
     */
    protected $_id;

    /**
     * The link of the entry.
     *
     * @var string
     */
    protected $_link;

    /**
     * Is the entry published.
     *
     * @var boolean
     */
    protected $_published;

    /**
     * The copy right of the entry.
     *
     * @var string
     */
    protected $_rights;

    /**
     * The source of the entry.
     *
     * @var string
     */
    protected $_source;

    /**
     * The summary of the entry.
     *
     * @var string
     */
    protected $_summary;

    /**
     * The title of the entry.
     *
     * @var string
     */
    protected $_title;

    /**
     * Is the entry updated.
     *
     * @var boolean
     */
    protected $_updated;

    /**
     * The extension element of the entry.
     *
     * @var string
     */
    protected $_extensionElement;

    /**
     * Creates an ATOM Entry instance with default parameters. 
     */
    public function __construct()
    {
        $this->_attributes = array();
    }

    /**
     * Populate the properties of an ATOM Entry instance with specified XML.. 
     * 
     * @param string $xmlString A string representing an ATOM entry instance. 
     * 
     */
    public function parseXml($xmlString)
    {
        $entryXml = simplexml_load_string($xmlString);
        $this->_attributes = $entryXml->attributes();
        $entryArray = (array)$entryXml;

        if (array_key_exists('author', $entryArray))
        {
            $author = new Person();
            $author->parseXml($entryArray['author']->asXML());
            $this->_author = $author;
        }

        if (array_key_exists('category', $entryArray))
        {
            $category = new Category();
            $category->parseXml($entryArray['category']->asXML());
            $this->_category = $category;
        }

        if (array_key_exists('content', $entryArray))
        {
            $content = new Content();
            $content->parseXml($entryArray['content']->asXML());
            $this->_content = $content;
        }

        if (array_key_exists('contributor', $entryArray))
        {
            $contributor = new Person();
            $contributor->parseXml($entryArray['contributor']->asXML());
            $this->_contributor = $contributor;
        }

        if (array_key_exists('id', $entryArray))
        {
            $this->_id = (string)$entryArray['id'];
        }

        if (array_key_exists('link', $entryArray))
        {
            $link = new AtomLink();
            $link->parseXml($entryArray['link']->asXML());
            $this->_link = $link;
        }

        if (array_key_exists('published', $entryArray))
        {
            $this->_published = $entryArray['published'];
        }

        if (array_key_exists('rights', $entryArray))
        {
            $this->_rights = $entryArray['rights'];
        }

        if (array_key_exists('source', $entryArray))
        {
            $source = new Source();
            $source->parseXml($entryArray['source']->asXML());
            $this->_source = $source;
        }

        if (array_key_exists('title', $entryArray))
        {
            $this->_title = $entryArray['title'];
        }

        if (array_key_exists('updated', $entryArray))
        {
            $this->_updated = $entryArray['updated'];
        }
         
    }

    /**
     * Gets the attributes. 
     * 
     * @return array
     */
    public function getAttributes()
    {   
        return $this->_attributes;
    }

    /**
     * Sets the attributes. 
     * 
     * @param array $attributes The attributes of the entry. 
     *
     */
    public function setAttributes($attributes)
    {
        $this->_attributes = $attributes;
    }

    /**
     * Sets the attribute of the entry. 
     * 
     * @param string $attributeKey   The key of the attribute. 
     * @param mixed  $attributeValue The value of the attribute. 
     *
     * @return none 
     */
    public function setAttribute($attributeKey, $attributeValue)
    {
        $this->_attributes[$attributeKey] = $attributeValue;
    }

    /**
     * Gets the attribute of the entry. 
     * 
     * @param string $attributeKey The key of the attribute. 
     * 
     * @return mixed
     */
    public function getAttribute($attributeKey)
    {
        return $this->_attributes[$attributeKey];
    }

    /**
     * Gets the author of the entry. 
     * 
     * @return Person
     */
    public function getAuthor()
    {
        return $this->_author;
    }

    /** 
     * Sets the author of the entry.
     *
     * @param Person $author The author of the entry. 
     */
    public function setAuthor($author)
    {
        $this->_author = $author;
    }

    /** 
     * Gets the category. 
     * 
     * @return array
     */
    public function getCategory()
    {
        return $this->_category;
    }

    /** 
     * Sets the category.
     * 
     * @param string $category The category of the entry.
     */
    public function setCategory($category)
    {
        $this->_category = $category;
    }

    /** 
     * Gets the content.
     * 
     * @return Content.
     */
    public function getContent()
    {
        return $this->_content;
    }

    /** 
     * Sets the content. 
     * 
     * @param Content $content Sets the content of the entry.
     */
    public function setContent($content)
    {
        $this->_content = $content;
    }

    /**
     * Gets the contributor. 
     * 
     * @return string
     */
    public function getContributor()
    {
        return $this->_contributor;
    }

    /** 
     * Sets the contributor.
     *
     * @param string $contributor The contributor of the entry. 
     */
    public function setContributor($contributor)
    {
        $this->_contributor = $contributor;
    }

    /**
     * Gets the ID of the entry. 
     * 
     * @return string 
     */
    public function getId()
    {
        return $this->_id;
    }

    /** 
     * Sets the ID of the entry.
     * 
     * @param string $id The id of the entry. 
     */
    public function setId($id)
    {
        $this->_id = $id;
    }

    /**     
     * Gets the link of the entry.
     * 
     * return string 
     */
    public function getLink()
    {
        return $this->_link;
    }

    /**
     * Sets the link of the entry. 
     * 
     * @param string $link The link of the entry.
     */
    public function setLink($link)
    {
        $this->_link = $link;
    }

    /** 
     * Gets published of the entry.
     *
     * @return boolean
     */
    public function getPublished()
    {
        return $this->_published;
    }

    /** 
     * Sets published of the entry. 
     * 
     * @param boolean $published Is the entry published. 
     */
    public function setPublished($published)
    {
        $this->_published = $published;
    }

    /** 
     * Gets the rights of the entry. 
     *
     * @return string
     */
    public function getRights()
    {
        return $this->_rights;
    }

    /** 
     * Sets the rights of the entry. 
     * 
     * @param string $rights The rights of the entry. 
     */
    public function setRights($rights)
    {
        $this->_rights = $rights;
    }

    /** 
     * Gets the source of the entry. 
     * 
     * @return string 
     */
    public function getSource()
    {
        return $this->_source;
    }

    /** 
     * Sets the source of the entry. 
     * 
     * @param string $source The source of the entry. 
     */
    public function setSource($source)
    {
        $this->_source = $source;
    }

    /** 
     * Gets the summary of the entry. 
     * 
     * @return string
     */ 
    public function getSummary()
    {
        return $this->_summary;
    }

    /** 
     * Sets the summary of the entry. 
     * 
     * @param string $summary The summary of the entry. 
     */
    public function setSummary($summary)
    {
        $this->_summary = $summary;
    }

    /** 
     * Gets the title of the entry.
     * 
     * @return string
     */
    public function getTitle()
    {
        return $this->_title;
    }

    /**
     * Sets the title of the entry. 
     *
     * @param string $title The title of the entry. 
     */
    public function setTitle($title)
    {
        $this->_title = $title;
    }
    
    /**
     * Gets updated. 
     *  
     * return boolean
     */
    public function getUpdated()
    {
        return $this->_updated;
    }

    /**  
     * Sets updated
     * 
     * @param boolean $updated updated.
     */
    public function setUpdated($updated)
    {
        $this->_updated = $updated;
    }

    /**
     * Gets extension element. 
     * 
     * @return string 
     */
    public function getExtensionElement()
    {
        return $this->_extensionElement;
    }    
    
    /**
     * Sets extension element.
     * 
     * @param string $extensionElement The extension element of the entry. 
     */
    public function setExtensionElement($extensionElement)
    {
        $this->_extensionElement = $extensionElement;     
    }

    /** 
     * Writes a inner XML string representing the entry. 
     * 
     * @param \XMLWriter $xmlWriter The XML writer.
     */
    public function writeXml($xmlWriter)
    {
        $xmlWriter->startElement('atom:entry');
        $this->writeInnerXml($xmlWriter);
        $xmlWriter->endElement();
    }

    /** 
     * Writes a inner XML string representing the entry. 
     * 
     * @param \XMLWriter $xmlWriter The XML writer.
     */
    public function writeInnerXml($xmlWriter)
    {
        if (!is_null($this->_attributes))
        {
            if (is_array($this->_attributes))
            {
                foreach ($this->_attributes as $attributeName => $attributeValue)
                {
                    $xmlWriter->writeAttribute($attributeName, $attributeValue);
                }
            }
        }
         
        if (!is_null($this->_author))
        {
            $xmlWriter->startElement('atom:author');
            $this->_author->writeInnerXml($xmlWriter);
            $xmlWriter->endElement();
        } 

        if (!is_null($this->_category))
        {
            if (is_array($this->_category))
            {
                foreach ($this->_category as $category)
                {
                    $xmlWriter->startElement('atom:category');
                    $category->writeInnerXml($xmlWriter);
                    $xmlWriter->endElement();
                }
            }
            else
            {
                $xmlWriter->startElement('atom:category');
                $category->writeInnerXml($xmlWriter);
                $xmlWriter->endElement();
            }
        }

        if (!is_null($this->_content))
        {
            $this->_content->writeXml($xmlWriter);
        }

        if (!is_null($this->_contributor))
        {
            if (is_array($this->_contributor))
            {
                foreach ($this->_contributor as $contributor)
                {
                    $xmlWriter->startElement('atom:contributor');
                    $contributor->writeInnerXml($xmlWriter);
                    $xmlWriter->endElement();
                }
            }
            else
            {
                $xmlWriter->startElement('atom:contributor');
                $contributor->writeInnerXml($xmlWriter);
                $xmlWriter->endElement();
            }
        }

        if (!is_null($this->_id))
        {
            $xmlWriter->writeElement('atom:id', $this->_id);
        }

        if (!is_null($this->_link))
        {
            $xmlWriter->writeElement('atom:link', $this->_link);
        }

        if (!is_null($this->_published))
        {
            $xmlWriter->writeElement('atom:published', $this->_published);
        }

        if (!is_null($this->_rights))
        {
            $xmlWriter->writeElement('atom:rights', $this->_rights);
        }

        if (!is_null($this->_source))
        {
            $xmlWriter->writeElement('atom:source', $this->_source);
        }

        if (!is_null($this->_summary))
        {
            $xmlWriter->writeElement('atom:summary', $this->_summary);
        }
        
        if (!is_null($this->_title))
        {
            $xmlWriter->writeElement('atom:title', $this->_title);
        }

        if (!is_null($this->_updated))
        {
            $xmlWriter->writeElement('atom:updated', $this->_updated);
        }
    }
}

?>
