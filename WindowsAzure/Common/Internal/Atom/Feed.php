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
use WindowsAzure\Common\Internal\Validate;

/**
 * The feed class of ATOM library.
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
    protected $_attributes;

    /**
     * The entry of the feed. 
     * 
     * @var Entry
     */
    protected $_entry;

    /**
     * The content of the feed.
     * 
     * @var Content
     */
    protected $_content;

    /**
     * The category of the feed. 
     * 
     * @var string
     */
    protected $_category;

    /**
     * The contributor of the feed. 
     * 
     * @var string
     */
    protected $_contributor;

    /**
     * The generator of the feed. 
     * 
     * @var string
     */
    protected $_generator;

    /**
     * The icon of the feed. 
     * 
     * @var string
     */
    protected $_icon;

    /**
     * The ID of the feed. 
     * 
     * @var string
     */
    protected $_id;

    /**
     * The link of the feed. 
     * 
     * @var string
     */
    protected $_link;

    /**
     * The logo of the feed. 
     * 
     * @var string
     */
    protected $_logo;

    /**
     * The rights of the feed. 
     * 
     * @var string
     */
    protected $_rights;

    /**
     * The subtitle of the feed. 
     * 
     * @var string
     */
    protected $_subtitle;

    /**
     * The title of the feed. 
     * 
     * @var string
     */
    protected $_title;

    /**
     * The update of the feed. 
     * 
     * @var string
     */
    protected $_updated;

    /**
     * The extension element of the feed. 
     * 
     * @var string
     */
    protected $_extensionElement;

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
    public function parseXml($xmlString)
    {
        $feedXml = new \SimpleXMLElement($xmlString);
        $attributes = $feedXml->attributes();
        $feedArray = (array)$feedXml;
        if (!empty($attributes))
        {
            $this->_attributes = (array)$attributes;
        }

        if (array_key_exists('entry', $feedArray))
        {
            $entry = array();

            $entryXml = $feedArray['entry'];
            if (is_array($entryXml))
            {
                foreach ($entryXml as $entryXmlInstance)
                {
                    $entryInstance = new Entry();
                    $entryInstance->parseXml($entryXmlInstance->asXML());
                    $entry[] = $entryInstance;
                }
            }
            else
            {
                $entryInstance = new Entry();
                $entryInstance->parseXml($entryXml->asXML());
                $entry[] = $entryInstance;
                
            }
            $this->_entry = $entry;
        }

        if (array_key_exists('content', $feedArray))
        {
            $content = new Content();
            $content->parseXml($feedArray['content']->asXML());
            $this->_content = $content;
        }

        if (array_key_exists('category', $feedArray))
        {
            $category = new Category();
            $category->parseXml($feedArray['category']->asXML());
            $this->_category = $category;
        }

        if (array_key_exists('contributor', $feedArray))
        {
            $contributor = new Person();
            $contributor->parseXml($feedArray['contributor']->asXML());
            $this->_contributor = $contributor;
        }

        if (array_key_exists('generator', $feedArray))
        {
            $generator = new Generator();
            $generator->setText((string)$feedArray['generator']->asXML());
            $this->_generator = $generator;
        } 

        if (array_key_exists('icon', $feedArray))
        {
            $icon = new Icon();
            $icon->parseXml($feedArray['icon']->asXML());
            $this->_icon = $icon;
        }

        if (array_key_exists('id', $feedArray))
        {
            $this->_id = (string)$feedArray['id'];
        }

        if (array_key_exists('link', $feedArray))
        {
            $link = new AtomLink();
            $link->parseXml($feedArray['link']->asXML());
            $this->_link = $link;
        }

        if (array_key_exists('logo', $feedArray))
        {
            $this->_logo = (string)$feedArray['logo'];
        }

        if (array_key_exists('rights', $feedArray))
        {
            $this->_rights = (string)$feedArray['rights'];
        }

        if (array_key_exists('subtitle', $feedArray))
        {
            $this->_subtitle = (string)$feedArray['subtitle'];
        }

        if (array_key_exists('title', $feedArray))
        {
            $this->_title = (string)$feedArray['title'];
        }

        if (array_key_exists('updated', $feedArray))
        {
            $this->_updated = (string)$feedArray['updated'];
        }
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
     * Writes an XML representing the feed object.
     * 
     * @param \XMLWriter $xmlWriter The XML writer.
     * 
     */
    public function writeXml($xmlWriter)
    {
        $xmlWriter->startElement('<atom:feed>');
        $this->writeInnerXml($xmlWriter);
        $xmlWriter->endElement();
    }

    /** 
     * Writes an XML representing the feed object.
     * 
     * @param \XMLWriter $xmlWriter The XML writer.
     * 
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
                    $category->writeXml($xmlWriter);
                }
            }
            else
            {
                $category->writeXml($xmlWriter);
            }
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

        if (!is_null($this->_generator))
        {
            $this->_generator->writeXml($xmlWriter);
        } 

        if (!is_null($this->_icon))
        {
            $xmlWriter->writeElement('atom:icon', $this->_icon);
        }

        if (!is_null($this->_logo))
        {
            $xmlWriter->writeElement('atom:logo', $this->_logo);
        }

        if (!is_null($this->_id))
        {
            $xmlWriter->writeElement('atom:id', $this->_id);
        }

        if (!is_null($this->_link))
        {
            $xmlWriter->writeElement('atom:link', $this->_link);
        }

        if (!is_null($this->_rights))
        {
            $xmlWriter->writeElement('atom:rights', $this->_rights);
        }

        if (!is_null($this->_subtitle))
        {
            $xmlWriter->writeElement('atom:subtitle', $this->_subtitle);
        }
        
        if (!is_null($this->_title))
        {
            $xmlWriter->writeElement('atom:title', $this->_title);
        }

        if (!is_null($this->_updated))
        {
            $xmlWriter->writeElement('atom:updated', $this->_updated);
        }

        if (!is_null($this->_content))
        {
            $this->_content->writeXml($xmlWriter);
        }

    }

}
?>
