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
     *
     * @var array
     */
    protected $attributes;

    /**
     * The author of the entry.
     *
     * @var Person
     */
    protected $author;

    /**
     * The category of the entry.
     *
     * @var array
     */
    protected $category;

    /**
     * The content of the entry.
     *
     * @var string
     */
    protected $content;

    /**
     * The contributor of the entry.
     *
     * @var string
     */
    protected $contributor;

    /**
     * An unqiue ID representing the entry.
     *
     * @var string
     */
    protected $id;

    /**
     * The link of the entry.
     *
     * @var string
     */
    protected $link;

    /**
     * Is the entry published.
     *
     * @var boolean
     */
    protected $published;

    /**
     * The copy right of the entry.
     *
     * @var string
     */
    protected $rights;

    /**
     * The source of the entry.
     *
     * @var string
     */
    protected $source;

    /**
     * The summary of the entry.
     *
     * @var string
     */
    protected $summary;

    /**
     * The title of the entry.
     *
     * @var string
     */
    protected $title;

    /**
     * Is the entry updated.
     *
     * @var boolean
     */
    protected $updated;

    /**
     * The extension element of the entry.
     *
     * @var string
     */
    protected $extensionElement;

    /**
     * Creates an ATOM Entry instance with default parameters. 
     */
    public function __construct()
    {
        $this->attributes = array();
    }

    /**
     * Populate the properties of an ATOM Entry instance with specified XML.. 
     * 
     * @param string $xmlString A string representing an ATOM entry instance. 
     * 
     * @return none
     */
    public function parseXml($xmlString)
    {
        $entryXml         = simplexml_load_string($xmlString);
        $this->attributes = $entryXml->attributes();
        $entryArray       = (array)$entryXml;

        if (arraykeyexists('author', $entryArray)) {
            $author = new Person();
            $author->parseXml($entryArray['author']->asXML());
            $this->author = $author;
        }

        if (arraykeyexists('category', $entryArray)) {
            $category = new Category();
            $category->parseXml($entryArray['category']->asXML());
            $this->category = $category;
        }

        if (arraykeyexists('content', $entryArray)) {
            $content = new Content();
            $content->parseXml($entryArray['content']->asXML());
            $this->content = $content;
        }

        if (arraykeyexists('contributor', $entryArray)) {
            $contributor = new Person();
            $contributor->parseXml($entryArray['contributor']->asXML());
            $this->contributor = $contributor;
        }

        if (arraykeyexists('id', $entryArray)) {
            $this->id = (string)$entryArray['id'];
        }

        if (arraykeyexists('link', $entryArray)) {
            $link = new AtomLink();
            $link->parseXml($entryArray['link']->asXML());
            $this->link = $link;
        }

        if (arraykeyexists('published', $entryArray)) {
            $this->published = $entryArray['published'];
        }

        if (arraykeyexists('rights', $entryArray)) {
            $this->rights = $entryArray['rights'];
        }

        if (arraykeyexists('source', $entryArray)) {
            $source = new Source();
            $source->parseXml($entryArray['source']->asXML());
            $this->source = $source;
        }

        if (arraykeyexists('title', $entryArray)) {
            $this->title = $entryArray['title'];
        }

        if (arraykeyexists('updated', $entryArray)) {
            $this->updated = $entryArray['updated'];
        }
         
    }

    /**
     * Gets the attributes. 
     * 
     * @return array
     */
    public function getAttributes()
    {   
        return $this->attributes;
    }

    /**
     * Sets the attributes. 
     * 
     * @param array $attributes The attributes of the entry. 
     *
     * @return none
     */
    public function setAttributes($attributes)
    {
        $this->attributes = $attributes;
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
        $this->attributes[$attributeKey] = $attributeValue;
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
        return $this->attributes[$attributeKey];
    }

    /**
     * Gets the author of the entry. 
     * 
     * @return Person
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /** 
     * Sets the author of the entry.
     *
     * @param Person $author The author of the entry. 
     * 
     * @return none
     */
    public function setAuthor($author)
    {
        $this->author = $author;
    }

    /** 
     * Gets the category. 
     * 
     * @return array
     */
    public function getCategory()
    {
        return $this->category;
    }

    /** 
     * Sets the category.
     * 
     * @param string $category The category of the entry.
     * 
     * @return none
     */
    public function setCategory($category)
    {
        $this->category = $category;
    }

    /** 
     * Gets the content.
     * 
     * @return Content.
     */
    public function getContent()
    {
        return $this->content;
    }

    /** 
     * Sets the content. 
     * 
     * @param Content $content Sets the content of the entry.
     * 
     * @return none
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * Gets the contributor. 
     * 
     * @return string
     */
    public function getContributor()
    {
        return $this->contributor;
    }

    /** 
     * Sets the contributor.
     *
     * @param string $contributor The contributor of the entry. 
     * 
     * @return none
     */
    public function setContributor($contributor)
    {
        $this->contributor = $contributor;
    }

    /**
     * Gets the ID of the entry. 
     * 
     * @return string 
     */
    public function getId()
    {
        return $this->id;
    }

    /** 
     * Sets the ID of the entry.
     * 
     * @param string $id The id of the entry. 
     * 
     * @return none
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**     
     * Gets the link of the entry.
     * 
     * return string 
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * Sets the link of the entry. 
     * 
     * @param string $link The link of the entry.
     * 
     * @return none
     */
    public function setLink($link)
    {
        $this->link = $link;
    }

    /** 
     * Gets published of the entry.
     *
     * @return boolean
     */
    public function getPublished()
    {
        return $this->published;
    }

    /** 
     * Sets published of the entry. 
     * 
     * @param boolean $published Is the entry published. 
     * 
     * @return none
     */
    public function setPublished($published)
    {
        $this->published = $published;
    }

    /** 
     * Gets the rights of the entry. 
     *
     * @return string
     */
    public function getRights()
    {
        return $this->rights;
    }

    /** 
     * Sets the rights of the entry. 
     * 
     * @param string $rights The rights of the entry. 
     * 
     * @return none
     */
    public function setRights($rights)
    {
        $this->rights = $rights;
    }

    /** 
     * Gets the source of the entry. 
     * 
     * @return string 
     */
    public function getSource()
    {
        return $this->source;
    }

    /** 
     * Sets the source of the entry. 
     * 
     * @param string $source The source of the entry. 
     * 
     * @return none
     */
    public function setSource($source)
    {
        $this->source = $source;
    }

    /** 
     * Gets the summary of the entry. 
     * 
     * @return string
     */ 
    public function getSummary()
    {
        return $this->summary;
    }

    /** 
     * Sets the summary of the entry. 
     * 
     * @param string $summary The summary of the entry. 
     * 
     * @return none
     */
    public function setSummary($summary)
    {
        $this->summary = $summary;
    }

    /** 
     * Gets the title of the entry.
     * 
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Sets the title of the entry. 
     *
     * @param string $title The title of the entry. 
     * 
     * @return none
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }
    
    /**
     * Gets updated. 
     *  
     * return boolean
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**  
     * Sets updated
     * 
     * @param boolean $updated updated.
     * 
     * @return none
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;
    }

    /**
     * Gets extension element. 
     * 
     * @return string 
     */
    public function getExtensionElement()
    {
        return $this->extensionElement;
    }    
    
    /**
     * Sets extension element.
     * 
     * @param string $extensionElement The extension element of the entry. 
     * 
     * @return none
     */
    public function setExtensionElement($extensionElement)
    {
        $this->extensionElement = $extensionElement;     
    }

    /** 
     * Writes a inner XML string representing the entry. 
     * 
     * @param \XMLWriter $xmlWriter The XML writer.
     * 
     * @return none
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
     * 
     * @return none
     */
    public function writeInnerXml($xmlWriter)
    {
        if (!is_null($this->attributes)) {
            if (isarray($this->attributes)) {
                foreach (
                    $this->attributes 
                    as $attributeName => $attributeValue
                ) {
                    $xmlWriter->writeAttribute($attributeName, $attributeValue);
                }
            }
        }
         
        if (!is_null($this->author)) {
            $xmlWriter->startElement('atom:author');
            $this->author->writeInnerXml($xmlWriter);
            $xmlWriter->endElement();
        } 

        if (!is_null($this->category)) {
            if (isarray($this->category)) {
                foreach (
                    $this->category 
                    as $category
                ) {
                    $xmlWriter->startElement('atom:category');
                    $category->writeInnerXml($xmlWriter);
                    $xmlWriter->endElement();
                }
            } else {
                $xmlWriter->startElement('atom:category');
                $category->writeInnerXml($xmlWriter);
                $xmlWriter->endElement();
            }
        }

        if (!is_null($this->content)) {
            $this->content->writeXml($xmlWriter);
        }

        if (!is_null($this->contributor)) {
            if (isarray($this->contributor)) {
                foreach ($this->contributor as $contributor) {
                    $xmlWriter->startElement('atom:contributor');
                    $contributor->writeInnerXml($xmlWriter);
                    $xmlWriter->endElement();
                }
            } else {
                $xmlWriter->startElement('atom:contributor');
                $contributor->writeInnerXml($xmlWriter);
                $xmlWriter->endElement();
            } 
        }

        if (!is_null($this->id)) {
            $xmlWriter->writeElement('atom:id', $this->id);
        }

        if (!is_null($this->link)) {
            $xmlWriter->writeElement('atom:link', $this->link);
        }

        if (!is_null($this->published)) {
            $xmlWriter->writeElement('atom:published', $this->published);
        }

        if (!is_null($this->rights)) {
            $xmlWriter->writeElement('atom:rights', $this->rights);
        }

        if (!is_null($this->source)) {
            $xmlWriter->writeElement('atom:source', $this->source);
        }

        if (!is_null($this->summary)) {
            $xmlWriter->writeElement('atom:summary', $this->summary);
        }
        
        if (!is_null($this->title)) {
            $xmlWriter->writeElement('atom:title', $this->title);
        }

        if (!is_null($this->updated)) {
            $xmlWriter->writeElement('atom:updated', $this->updated);
        }
    }
}

?>
