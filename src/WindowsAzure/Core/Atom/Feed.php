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
 * @package   WindowsAzure\Core\Atom
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */

namespace WindowsAzure\Core\Atom;
use WindowsAzure\Validate;

/**
 * Thfor service bus.
 *
 * @category  Microsoft
 * @package   WindowsAzure\Core\Atom
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */

class Feed
{
    /**
     * The attributes of the feed.
     *
     * @var string 
     */
    private $_attributes;

    /**
     * The entry of the feed. 
     * 
     * @var string 
     */
    private $_entry;

    /**
     * The category of the feed. 
     * 
     * @var string
     */
    private $_category;

    /**
     * The contributor of the feed. 
     * 
     * @var string
     */
    private $_contributor;

    /**
     * The generator of the feed. 
     * 
     * @var string
     */
    private $_generator;

    /**
     * The icon of the feed. 
     * 
     * @var string
     */
    private $_icon;

    /**
     * The ID of the feed. 
     * 
     * @var string
     */
    private $_id;

    /**
     * The link of the feed. 
     * 
     * @var string
     */
    private $_link;

    /**
     * The logo of the feed. 
     * 
     * @var string
     */
    private $_logo;

    /**
     * The rights of the feed. 
     * 
     * @var string
     */
    private $_rights;

    /**
     * The subtitle of the feed. 
     * 
     * @var string
     */
    private $_subtitle;

    /**
     * The title of the feed. 
     * 
     * @var string
     */
    private $_title;

    /**
     * The update of the feed. 
     * 
     * @var string
     */
    private $_updated;

    /**
     * The extension element of the feed. 
     * 
     * @var string
     */
    private $_extensionElement;

    /**
     * Creates an ATOM FEED object with default parameters. 
     */ 
    public function __construct()
    {   
        $this->_attributes = array();
    }

    /**
     * Creates a feed object with specified XML string. 
     */
    public static function create($xmlString)
    {
        $feed = new Feed();
        $feedXml = simplexml_load_string($xmlString);
        $feed->setAttributes($feedXml->attributes());
        if (array_key_exists($feedXml, 'category'))
        {
            $category = Categtory::create($feedXml['category']);
            $feed->setCategory($category);
        }

        if (array_key_exists($feedXml, 'contributor'))
        {
            $contributor = Person::create($feedXml['contributor']);
            $feed->setContributor($contributor);
        }

        if (array_key_exists($feedXml, 'generator'))
        {
            $generator = Generator::create($feedXml['generator']);
            $feed->setGenerator($generator);
        } 

        if (array_key_exists($feedXml, 'icon'))
        {
            $icon = Icon::create($feedXml['icon']);
            $feed->setIcon($icon);
        }

        if (array_key_exists($feedXml, 'id'))
        {
            $feed->setId($feedXml['id']);
        }

        if (array_key_exists($feedXml, 'link'))
        {
            $link = AtomLink::create($feedXml['link']);
            $feed->setLink($link);
        }

        if (array_key_exists($feedXml, 'logo'))
        {
            $feed->setLogo($feedXml['logo']);
        }

        if (array_key_exists($feedXml, 'rights'))
        {
            $feed->setRights($feedXml['rights']);
        }

        if (array_key_exists($feedXml, 'subtitle'))
        {
            $feed->setSubtitle($feedXml['subtitle']);
        }

        if (array_key_exists($feedXml, 'title'))
        {
            $feed->setTitle($feedXml['title']);
        }

        if (array_key_exists($feedXml, 'updated'))
        {
            $feed->setUpdated($feedXml['updated']);
        }
         
        return $feed;
    }

    /**
     * Gets the attributes of the feed. 
     *
     * @return array
     */
    public function getAttributes()
    {
        return $this->_attributes;
    }

    /**
     * Sets the attributes of the feed. 
     *
     * @param array $attributes The attributes of the array. 
     *
     */
    public function setAttributes($attributes)
    {
        Validate::isArray($attributes, 'attributes');
        $this->_attributes = $attributes;
    }

    public function addAttribute($attributeKey, $attributeValue)
    {
        $this->_attributes[$attributeKey] = $attributeValue;
    }   

    /**
     * Gets the category of the feed.
     *  
     * @return string
     */
    public function getCategory()
    {
        return _categroy;
    }

    /**
     * Sets the category of the feed.
     *  
     * @param string $category The category of the feed. 
     */
    public function setCategory($category)
    {
        $this->_category = $cateogry;
    }
   
    /**
     * Gets contributor.
     *
     * @return array
     */
    public function getContributor()
    {
        return _contributor;
    }

    /**
     * Sets contributor.
     * 
     * @param string $contributor The contributor of the feed. 
     */
    public function setContributor($contributor)
    {
        $this->_contributor = $contributor;
    }

    /**
     * Gets generator.
     * 
     * @return string 
     */
    public function getGenerator()
    {
        return _generator;
    }

    /**
     * Sets the generator. 
     * 
     * @param string $generator Sets the generator of the feed. 
     */
    public function setGenerator($generator)
    {
        $this->_generator = $generator;
    }

    /**
     * Gets the icon of the feed. 
     * 
     * @return string 
     */
    public function getIcon()
    {
        return _icon;
    }

    /**
     * Sets the icon of the feed. 
     * 
     * @param string $icon The icon of the feed. 
     */
    public function setIcon($icon)
    {
        $this->_icon = $icon;
    }

    /**
     * Gets the ID of the feed. 
     * 
     * @return string   
     */ 
    public function getId()
    {   
        return _id;
    }

    /**
     * Sets the ID of the feed.
     * 
     * @param string $id The ID of the feed. 
     */
    public function setId($id)
    {
        $this->_id = $id;
    }

    /**
     * Gets the link of the feed. 
     * 
     * @return string 
     */
    public function getLink()
    {
        return _link;
    }

    /**
     * Sets the link of the feed. 
     * 
     * @param string $link The link of the feed. 
     */
    public function setLink($link)
    {
        $this->_link = $link;
    }

    /**
     * Gets the logo of the feed. 
     * 
     * @return string 
     */
    public function getLogo()
    {
        return _logo;
    }

    /**
     * Sets the logo of the feed. 
     * 
     * @param string $logo The logo of the feed. 
     */
    public function setLogo($logo)
    {
        $this->_logo = $logo;
    }

    /**
     * Gets the rights of the feed. 
     * 
     * @return string 
     */
    public function getRights()
    {   
        return _rights;
    }

    /** 
     * Sets the rights of the feed. 
     * 
     * @param string $rights The rights of the feed. 
     */
    public function setRights($rights)
    {
        $this->_rights = $rights;
    }

    /**
     * Gets the sub title.  
     * 
     * @return string 
     */
    public function getSubtitle()
    {   
        return _subtitle;
    }

    /**
     * Sets the sub title of the feed. 
     *
     * @param string $subtitle Sets the sub title of the feed. 
     */
    public function setSubtitle($subtitle)
    {
        $this->_subtitle = $subtitle;
    }

    /**
     * Gets the title of the feed. 
     *
     * @return string. 
     */
    public function getTitle() 
    {   
        return _title;
    }

    /**
     * Sets the title of the feed. 
     *
     * @param string $title The title of the feed. 
     */
    public function setTitle($title)
    {
        $this->_title = $title;
    }

    /**
     * Gets the updated. 
     * 
     * @return string 
     */
    public function getUpdated()
    {   
        return _updated;
    }

    /**
     * Sets the updated. 
     * 
     * @param string $updated updated
     */
    public function setUpdated($updated)
    {
        $this->_udpated = $updated;
    }

    /** 
     * Gets the extension element. 
     * 
     * @return string 
     */
    public function getExtensionElement()
    {   
        return _extensionElement;
    }

    /**
     * Sets the extension element. 
     * 
     * @param string $extensionElement The extension element. 
     */
    public function setExtensionElement($extensionElement)
    {
        $this->_extensionElement = $extensionElement;
    }

    /**
     * Gets the entry of the feed. 
     * 
     * @var Entry
     */
    public function getEntry()
    {
        return $this->_entry;
    }

    /**
     * Sets the entry of the feed.
     * 
     * @param Entry $entry The entry of the feed. 
     */
    public function setEntry($entry)
    {
        $this->_entry = $entry;
    }

    /** 
     * Gets an XML representing the feed object.
     * 
     * @param boolean $writeNamespace Whether to write the XmlNamespace.
     * 
     * @return string 
     */
    public function toXml()
    {
        $xmlWriter = new XMLWriter();
        
        $xmlWriter->openMemory();
        $xmlWriter->setIndent(true);
        $xmlWriter->startElement('<atom:feed>');

        $xmlWriter->writeAttribute('xmlns:atom', 'http://www.w3.org/2005/Atom');
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
            $xmlWriter->writeElement('author', $this->_author->toXml());
        } 

        if (!is_null($this->_category))
        {
            if (is_array($this->_category))
            {
                foreach ($this->_category as $category)
                {
                    $xmlWriter->writeElement('category', $category->toXml());
                }
            }
            else
            {
                $xmlWriter->writeElement('category', $this->_category->toXml());
            }
        }

        if (!is_null($this->_contributor))
        {
            if (is_array($this->_contributor))
            {
                foreach ($this->_contributor as $contributor)
                {
                    $xmlWriter->writeElement('contributor', $contributor->toXml());
                }
            }
            else
            {
                $xmlWriter->writeElement('contributor', $this->_contributor->toXml());
            }
        }

        if (!is_null($this->_generator))
        {
            $xmlWriter->writeElement('generator', $this->_generator->toXml());
        } 

        if (!is_null($this->_icon))
        {
            $xmlWriter->writeElement('icon', $this->_icon);
        }

        if (!is_null($this->_logo))
        {
            $xmlWriter->writeElement('logo', $this->_logo);
        }

        if (!is_null($this->_id))
        {
            $xmlWriter->writeElement('id', $this->_id);
        }

        if (!is_null($this->_link))
        {
            $xmlWriter->writeElement('link', $this->_link);
        }

        if (!is_null($this->_rights))
        {
            $xmlWriter->writeElement('rights', $this->_rights);
        }

        if (!is_null($this->_subtitle))
        {
            $xmlWriter->writeElement('subtitle', $this->_subtitle);
        }
        
        if (!is_null($this->_title))
        {
            $xmlWriter->writeElement('title', $this->_title);
        }

        if (!is_null($this->_updated))
        {
            $xmlWriter->writeElement('updated', $this->_updated);
        }
        $xmlWriter->endElement();

        return $xmlWriter->outputMemory();
    }

}
?>
