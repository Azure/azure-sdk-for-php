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
 * The source class of ATOM library.
 *
 * @category  Microsoft
 * @package   WindowsAzure\ServiceBus\Internal\Atom
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */

class Source
{

    /**
     * The attributes of the source. 
     * 
     * @var array
     */
    protected $_attributes;

    /**
     * The author the source. 
     * 
     * @var Person
     */
    protected $_author;

    /**
     * The category of the source. 
     * 
     * @var string
     */
    protected $_category;

    /**
     * The contributor of the source. 
     * 
     * @var string
     */
    protected $_contributor;

    /**
     * The generator of the source. 
     * 
     * @var string
     */
    protected $_generator;

    /**
     * The icon of the source. 
     * 
     * @var string
     */
    protected $_icon;

    /**
     * The ID of the source. 
     * 
     * @var string
     */
    protected $_id;

    /**
     * The link of the source. 
     * 
     * @var string
     */
    protected $_link;

    /**
     * The logo of the source. 
     * 
     * @var string
     */
    protected $_logo;

    /**
     * The rights of the source. 
     * 
     * @var string
     */
    protected $_rights;

    /**
     * The subtitle of the source. 
     * 
     * @var string
     */
    protected $_subtitle;

    /**
     * The title of the source. 
     * 
     * @var string
     */
    protected $_title;

    /**
     * The update of the source. 
     * 
     * @var string
     */
    protected $_updated;

    /**
     * The extension element of the source. 
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
     * Creates a source object with specified XML string. 
     */
    public function parseXml($xmlString)
    {
        $sourceXml = new \SimpleXMLElement($xmlString);
        $attributes = $sourceXml->attributes();
        $sourceArray = (array)$sourceXml;

        if (array_key_exists('author', $sourceArray))
        {
            $content = new Person();
            $content->parseXml($sourceArray['person']->asXML());
            $this->_content = $content;
        }

        if (array_key_exists('category', $sourceArray))
        {
            $category = new Category();
            $category->parseXml($sourceArray['category']->asXML());
            $this->_category = $category;
        }

        if (array_key_exists('contributor', $sourceArray))
        {
            $contributor = new Person();
            $contributor->parseXml($sourceArray['contributor']->asXML());
            $this->_contributor = $contributor;
        }

        if (array_key_exists('generator', $sourceArray))
        {
            $generator = new Generator();
            $generator->setText((string)$sourceArray['generator']->asXML());
            $this->_generator = $generator;
        } 

        if (array_key_exists('icon', $sourceArray))
        {
            $icon = new Icon();
            $icon->parseXml($sourceArray['icon']->asXML());
            $this->_icon = $icon;
        }

        if (array_key_exists('id', $sourceArray))
        {
            $this->_id = (string)$sourceArray['id'];
        }

        if (array_key_exists('link', $sourceArray))
        {
            $link = new AtomLink();
            $link->parseXml($sourceArray['link']->asXML());
            $this->_link = $link;
        }

        if (array_key_exists('logo', $sourceArray))
        {
            $this->_logo = (string)$sourceArray['logo'];
        }

        if (array_key_exists('rights', $sourceArray))
        {
            $this->_rights = (string)$sourceArray['rights'];
        }

        if (array_key_exists('subtitle', $sourceArray))
        {
            $this->_subtitle = (string)$sourceArray['subtitle'];
        }

        if (array_key_exists('title', $sourceArray))
        {
            $this->_title = (string)$sourceArray['title'];
        }

        if (array_key_exists('updated', $sourceArray))
        {
            $this->_updated = (string)$sourceArray['updated'];
        }
    }

    /**
     * Gets the attributes of the source. 
     *
     * @return array
     */
    public function getAttributes()
    {
        return $this->_attributes;
    }

    /**
     * Sets the attributes of the source. 
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
     * Gets the category of the source.
     *  
     * @return string
     */
    public function getCategory()
    {
        return _categroy;
    }

    /**
     * Sets the category of the source.
     *  
     * @param string $category The category of the source. 
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
     * @param string $contributor The contributor of the source. 
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
     * @param string $generator Sets the generator of the source. 
     */
    public function setGenerator($generator)
    {
        $this->_generator = $generator;
    }

    /**
     * Gets the icon of the source. 
     * 
     * @return string 
     */
    public function getIcon()
    {
        return _icon;
    }

    /**
     * Sets the icon of the source. 
     * 
     * @param string $icon The icon of the source. 
     */
    public function setIcon($icon)
    {
        $this->_icon = $icon;
    }

    /**
     * Gets the ID of the source. 
     * 
     * @return string   
     */ 
    public function getId()
    {   
        return _id;
    }

    /**
     * Sets the ID of the source.
     * 
     * @param string $id The ID of the source. 
     */
    public function setId($id)
    {
        $this->_id = $id;
    }

    /**
     * Gets the link of the source. 
     * 
     * @return string 
     */
    public function getLink()
    {
        return _link;
    }

    /**
     * Sets the link of the source. 
     * 
     * @param string $link The link of the source. 
     */
    public function setLink($link)
    {
        $this->_link = $link;
    }

    /**
     * Gets the logo of the source. 
     * 
     * @return string 
     */
    public function getLogo()
    {
        return _logo;
    }

    /**
     * Sets the logo of the source. 
     * 
     * @param string $logo The logo of the source. 
     */
    public function setLogo($logo)
    {
        $this->_logo = $logo;
    }

    /**
     * Gets the rights of the source. 
     * 
     * @return string 
     */
    public function getRights()
    {   
        return _rights;
    }

    /** 
     * Sets the rights of the source. 
     * 
     * @param string $rights The rights of the source. 
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
     * Sets the sub title of the source. 
     *
     * @param string $subtitle Sets the sub title of the source. 
     */
    public function setSubtitle($subtitle)
    {
        $this->_subtitle = $subtitle;
    }

    /**
     * Gets the title of the source. 
     *
     * @return string. 
     */
    public function getTitle() 
    {   
        return _title;
    }

    /**
     * Sets the title of the source. 
     *
     * @param string $title The title of the source. 
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
     * Gets the entry of the source. 
     * 
     * @var Entry
     */
    public function getEntry()
    {
        return $this->_entry;
    }

    /**
     * Sets the entry of the source.
     * 
     * @param Entry $entry The entry of the source. 
     */
    public function setEntry($entry)
    {
        $this->_entry = $entry;
    }

    /**
     * Gets the content of the source. 
     * 
     * @var Entry
     */
    public function getContent()
    {
        return $this->_content;
    }

    /**
     * Sets the content of the source.
     * 
     * @param Content $content The content of the source. 
     */
    public function setContent($content)
    {
        $this->_content = $content;
    }

    /** 
     * Gets an XML representing the source object.
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
        $xmlWriter->startElement('<atom:source>');

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
