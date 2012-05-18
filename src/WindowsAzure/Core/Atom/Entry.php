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
 * @package   WindowsAzure\Services\ServiceBus
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */

namespace WindowsAzure\Core\Atom;
use WindowsAzure\Utilities;
use WindowsAzure\Resources;

/**
 * This class constructs HTTP requests and receive HTTP responses for service bus.
 *
 * @category  Microsoft
 * @package   WindowsAzure\Services\ServiceBus
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
    private $_attributes;

    /**
     * The author of the entry.
     *
     * @var string
     */
    private $_author;

    /**
     * The category of the entry.
     *
     * @var array
     */
    private $_category;

    /**
     * The content of the entry.
     *
     * @var string
     */
    private $_content;

    /**
     * The contributor of the entry.
     *
     * @var string
     */
    private $_contributor;

    /**
     * An unqiue ID representing the entry.
     *
     * @var string
     */
    private $_id;

    /**
     * The link of the entry.
     *
     * @var string
     */
    private $_link;

    /**
     * Is the entry published.
     *
     * @var boolean
     */
    private $_published;

    /**
     * The copy right of the entry.
     *
     * @var string
     */
    private $_rights;

    /**
     * The source of the entry.
     *
     * @var string
     */
    private $_source;

    /**
     * The summary of the entry.
     *
     * @var string
     */
    private $_summary;

    /**
     * The title of the entry.
     *
     * @var string
     */
    private $_title;

    /**
     * Is the entry updated.
     *
     * @var boolean
     */
    private $_updated;

    /**
     * The extension element of the entry.
     *
     * @var string
     */
    private $_extensionElement;

    /**
     * Creates an ATOM Entry instance with default parameters. 
     */
    public function __construct()
    {
        $this->_attributes = array();
    }

    /**
     * Creates an ATOM Entry instance with specified XmlString. 
     * 
     * @param string $xmlString A string representing an ATOM entry instance. 
     * 
     */
    public static function create($xmlString)
    {
        $entry = new Entry();
        $entryXml = simplexml_load_string($xmlString);
        $entry->setAttributes($entryXml->attributes());
        if (array_key_exists($entryXml, 'author'))
        {
            $author = Category::create($entryXml['author']);
            $entry->setAuthor($author);
        }

        if (array_key_exists($entryXml, 'category'))
        {
            $category = Categtory::create($entryXml['category']);
            $entry->setCategory($category);
        }

        if (array_key_exists($entryXml, 'content'))
        {
            $content = Content::create($entryXml['content']);
            $entry->setContent($content);
        }

        if (array_key_exists($entryXml, 'contributor'))
        {
            $contributor = Person::create($entryXml['contributor']);
            $entry->setContributor($contributor);
        }

        if (array_key_exists($entryXml, 'id'))
        {
            $entry->setId($entryXml['id']);
        }

        if (array_key_exists($entryXml, 'link'))
        {
            $link = AtomLink::create($entryXml['link']);
            $entry->setLink($link);
        }

        if (array_key_exists($entryXml, 'published'))
        {
            $entry->setPublished($entryXml['published']);
        }

        if (array_key_exists($entryXml, 'rights'))
        {
            $entry->setRights($entryXml['rights']);
        }

        if (array_key_exists($entryXml, 'source'))
        {
            $source = Source::create($entryXml['source']);
            $entry->setSource($source);
        }

        if (array_key_exists($entryXml, 'title'))
        {
            $entry->setTitle($entryXml['title']);
        }

        if (array_key_exists($entryXml, 'updated'))
        {
            $entry->setUpdated($entryXml['updated']);
        }
         
        return $entry;

    }

    /**
     * Gets the author of the entry. 
     * 
     * @return string
     */
    public function getAuthor()
    {
        return $this->_author;
    }

    /** 
     * Sets the author of the entry.
     *
     * @param string $author The author of the entry. 
     */
    public function setAuthor($author)
    {
        $this->_author;
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
     * Gets an XML string representing the entry. 
     */
    public function toXml()
    {
        $innerXml = '';
        if (!is_null($this->_author))
        {
            $innerXml .= '<author>'.$this->author.'</author>';
        }

        if (!is_null($this->_category))
        {
            if (is_array($this->_category))
            {
                foreach ($this->_category as $category)
                {
                    $innerXml .= '<category>'.$category.'</category>';
                }
            }
            else
            {
                $innerXml .= '<category>'.$this->_category.'</category>';
            }
        }

        if (!is_null($this->_content))
        {
            $innerXml .= $this->_content->toXml();
        }

        if (!is_null($this->_contributor))
        {
            if (is_array($this->_contributor))
            {
                foreach ($this->_contributor as $contributor)
                {
                    $innerXml .= '<contributor>'.$contributor.'</contributor>';
                }
            }
            else
            {
                $innerXml .= '<contributor>'.$this->_contributor.'</contributor>';
            }
        }

        if (!is_null($this->_id))
        {
            $innerXml .= '<id>'.Resources::UNIQUE_ID_PREFIX.$this->_id.'</id>';
        }
        
        if (!is_null($this->_link))
        {
            $innerXml .= '<link>'.$this->_link.'</link>';
        } 

        if (!is_null($this->_published))
        {
            $innerXml .= '<published>'.$this->_published.'</published>';
        }

        if (!is_null($this->_rights))
        {
            $innerXml .= '<rights>'.$this->_rights.'</rights>';
        }

        if (!is_null($this->_source))
        {
            $innerXml .= '<source>'.$this->_source.'</source>';
        }

        if (!is_null($this->_summary))
        {
            $innerXml .= '<summary>'.$this->_summary.'</summary>';
        }

        if (!is_null($this->_title))
        { 
            $innerXml .= '<title>'.$this->_title.'</title>';
        }
        
        if (!is_null($this->_updated))
        {
            $innerXml .= '<updated>'.$this->_updated.'</updated>';
        }

        $outerXml = '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>'
            .'<entry xmlns="http://www.w3.org/2005/Atom/">'.$innerXml.'</entry>';
        return $outerXml;
    }

}

?>
