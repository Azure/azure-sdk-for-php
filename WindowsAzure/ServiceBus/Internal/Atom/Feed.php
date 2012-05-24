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
use WindowsAzure\Common\Internal\Validate;

/**
 * Thfor service bus.
 *
 * @category  Microsoft
 * @package   WindowsAzure\ServiceBus\Internal\Atom
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
     * @var Entry
     */
    private $_entry;

    /**
     * The content of the feed.
     * 
     * @var Content
     */
    private $_content;

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
        $feedXml = new \SimpleXMLElement($xmlString);
        $attributes = $feedXml->attributes();
        $feedArray = (array)$feedXml;
        if (!empty($attributes))
        {
            $feed->setAttributes((array)$attributes);
        }

        if (array_key_exists('entry', $feedArray))
        {
            $entry = array();

            $entryXml = $feedArray['entry'];
            if (is_array($entryXml))
            {
                foreach ($entryXml as $entryXmlInstance)
                {
                    $entryInstance = Entry::create($entryXmlInstance->asXML());
                    $entry[] = $entryInstance;
                }
            }
            else
            {
                $entry[] = Entry::create($entryXml->asXML());
                
            }
            $feed->setEntry($entry);
        }

        if (array_key_exists('content', $feedArray))
        {
            $content = Content::create($feedArray['content']->asXML());
            $feed->setContent($content);
        }

        if (array_key_exists('category', $feedArray))
        {
            $category = Categtory::create($feedArray['category']->asXML());
            $feed->setCategory($category);
        }

        if (array_key_exists('contributor', $feedArray))
        {
            $contributor = Person::create($feedArray['contributor']->asXML());
            $feed->setContributor($contributor);
        }

        if (array_key_exists('generator', $feedArray))
        {
            $generator = new Generator();
            $generator->setText((string)$feedArray['generator']);
            $feed->setGenerator($generator);
        } 

        if (array_key_exists('icon', $feedArray))
        {
            $icon = Icon::create($feedArray['icon']->asXML());
            $feed->setIcon($icon);
        }

        if (array_key_exists('id', $feedArray))
        {
            $feed->setId((string)$feedArray['id']);
        }

        if (array_key_exists('link', $feedArray))
        {
            $link = AtomLink::create($feedArray['link']->asXML());
            $feed->setLink($link);
        }

        if (array_key_exists('logo', $feedArray))
        {
            $feed->setLogo((string)$feedArray['logo']);
        }

        if (array_key_exists('rights', $feedArray))
        {
            $feed->setRights((string)$feedArray['rights']);
        }

        if (array_key_exists('subtitle', $feedArray))
        {
            $feed->setSubtitle((string)$feedArray['subtitle']);
        }

        if (array_key_exists('title', $feedArray))
        {
            $feed->setTitle((string)$feedArray['title']);
        }

        if (array_key_exists('updated', $feedArray))
        {
            $feed->setUpdated((string)$feedArray['updated']);
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
     * Gets the content of the feed. 
     * 
     * @var Entry
     */
    public function getContent()
    {
        return $this->_content;
    }

    /**
     * Sets the content of the feed.
     * 
     * @param Content $content The content of the feed. 
     */
    public function setContent($content)
    {
        $this->_content = $content;
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

        if (!is_null($this->_content))
        {
            $xmlWrilter->WriteRaw($this->_content->toXml());
        }

        $xmlWriter->endElement();

        return $xmlWriter->outputMemory();
    }

}
?>
