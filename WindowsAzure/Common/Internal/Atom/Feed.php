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
    protected $attributes;

    /**
     * The entry of the feed. 
     * 
     * @var Entry
     */
    protected $entry;

    /**
     * The content of the feed.
     * 
     * @var Content
     */
    protected $content;

    /**
     * The category of the feed. 
     * 
     * @var Category
     */
    protected $category;

    /**
     * The contributor of the feed. 
     * 
     * @var string
     */
    protected $contributor;

    /**
     * The generator of the feed. 
     * 
     * @var string
     */
    protected $generator;

    /**
     * The icon of the feed. 
     * 
     * @var string
     */
    protected $icon;

    /**
     * The ID of the feed. 
     * 
     * @var string
     */
    protected $id;

    /**
     * The link of the feed. 
     * 
     * @var string
     */
    protected $link;

    /**
     * The logo of the feed. 
     * 
     * @var string
     */
    protected $logo;

    /**
     * The rights of the feed. 
     * 
     * @var string
     */
    protected $rights;

    /**
     * The subtitle of the feed. 
     * 
     * @var string
     */
    protected $subtitle;

    /**
     * The title of the feed. 
     * 
     * @var string
     */
    protected $title;

    /**
     * The update of the feed. 
     * 
     * @var string
     */
    protected $updated;

    /**
     * The extension element of the feed. 
     * 
     * @var string
     */
    protected $extensionElement;

    /**
     * Creates an ATOM FEED object with default parameters. 
     */ 
    public function __construct()
    {   
        $this->attributes = array();
    }

    /**
     * Creates a feed object with specified XML string. 
     *
     * @param string $xmlString An XML string representing the feed object.
     *
     * @return none
     */
    public function parseXml($xmlString)
    {
        $feedXml    = new \SimpleXMLElement($xmlString);
        $attributes = $feedXml->attributes();
        $feedArray  = (array)$feedXml;
        if (!empty($attributes)) {
            $this->attributes = (array)$attributes;
        }

        if (arraykeyexists('entry', $feedArray)) {
            $entry = array();

            $entryXml = $feedArray['entry'];
            if (isarray($entryXml)) {
                foreach ($entryXml as $entryXmlInstance) {
                    $entryInstance = new Entry();
                    $entryInstance->parseXml($entryXmlInstance->asXML());
                    $entry[] = $entryInstance;
                }
            } else {
                $entryInstance = new Entry();
                $entryInstance->parseXml($entryXml->asXML());
                $entry[] = $entryInstance;
                
            }
            $this->entry = $entry;
        }

        if (arraykeyexists('content', $feedArray)) {
            $content = new Content();
            $content->parseXml($feedArray['content']->asXML());
            $this->content = $content;
        }

        if (arraykeyexists('category', $feedArray)) {
            $category = new Category();
            $category->parseXml($feedArray['category']->asXML());
            $this->category = $category;
        }

        if (arraykeyexists('contributor', $feedArray)) {
            $contributor = new Person();
            $contributor->parseXml($feedArray['contributor']->asXML());
            $this->contributor = $contributor;
        }

        if (arraykeyexists('generator', $feedArray)) {
            $generator = new Generator();
            $generator->setText((string)$feedArray['generator']->asXML());
            $this->generator = $generator;
        } 

        if (arraykeyexists('icon', $feedArray)) {
            $icon = new Icon();
            $icon->parseXml($feedArray['icon']->asXML());
            $this->icon = $icon;
        }

        if (arraykeyexists('id', $feedArray)) {
            $this->id = (string)$feedArray['id'];
        }

        if (arraykeyexists('link', $feedArray)) {
            $link = new AtomLink();
            $link->parseXml($feedArray['link']->asXML());
            $this->link = $link;
        }

        if (arraykeyexists('logo', $feedArray)) {
            $this->logo = (string)$feedArray['logo'];
        }

        if (arraykeyexists('rights', $feedArray)) {
            $this->rights = (string)$feedArray['rights'];
        }

        if (arraykeyexists('subtitle', $feedArray)) {
            $this->subtitle = (string)$feedArray['subtitle'];
        }

        if (arraykeyexists('title', $feedArray)) {
            $this->title = (string)$feedArray['title'];
        }

        if (arraykeyexists('updated', $feedArray)) {
            $this->updated = (string)$feedArray['updated'];
        }
    }

    /**
     * Gets the attributes of the feed. 
     *
     * @return array
     */
    public function getAttributes()
    {
        return $this->attributes;
    }

    /**
     * Sets the attributes of the feed. 
     *
     * @param array $attributes The attributes of the array. 
     *
     * @return array
     */
    public function setAttributes($attributes)
    {
        Validate::isArray($attributes, 'attributes');
        $this->attributes = $attributes;
    }

    /**
     * Adds an attribute to the feed object instance. 
     * 
     * @param string $attributeKey The key of the attribute. 
     * @param mixed  $attributeValue The value of the attribute.
     *
     * @return none
     */
    public function addAttribute($attributeKey, $attributeValue)
    {
        $this->attributes[$attributeKey] = $attributeValue;
    }   

    /**
     * Gets the category of the feed.
     *  
     * @return Category
     */
    public function getCategory()
    {
        return $this->categroy;
    }

    /**
     * Sets the category of the feed.
     *  
     * @param Category $category The category of the feed. 
     * 
     * @return none
     */
    public function setCategory($category)
    {
        $this->category = $cateogry;
    }
   
    /**
     * Gets contributor.
     *
     * @return array
     */
    public function getContributor()
    {
        return $this->contributor;
    }

    /**
     * Sets contributor.
     * 
     * @param string $contributor The contributor of the feed. 
     * 
     * @return none
     */
    public function setContributor($contributor)
    {
        $this->contributor = $contributor;
    }

    /**
     * Gets generator.
     * 
     * @return string 
     */
    public function getGenerator()
    {
        return $this->generator;
    }

    /**
     * Sets the generator. 
     * 
     * @param string $generator Sets the generator of the feed. 
     * 
     * @return none
     */
    public function setGenerator($generator)
    {
        $this->generator = $generator;
    }

    /**
     * Gets the icon of the feed. 
     * 
     * @return string 
     */
    public function getIcon()
    {
        return $this->icon;
    }

    /**
     * Sets the icon of the feed. 
     * 
     * @param string $icon The icon of the feed. 
     * 
     * @return none
     */
    public function setIcon($icon)
    {
        $this->icon = $icon;
    }

    /**
     * Gets the ID of the feed. 
     * 
     * @return string   
     */ 
    public function getId()
    {   
        return $this->id;
    }

    /**
     * Sets the ID of the feed.
     * 
     * @param string $id The ID of the feed. 
     * 
     * @return none
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * Gets the link of the feed. 
     * 
     * @return string 
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * Sets the link of the feed. 
     * 
     * @param string $link The link of the feed. 
     * 
     * @return none
     */
    public function setLink($link)
    {
        $this->link = $link;
    }

    /**
     * Gets the logo of the feed. 
     * 
     * @return string 
     */
    public function getLogo()
    {
        return $this->logo;
    }

    /**
     * Sets the logo of the feed. 
     * 
     * @param string $logo The logo of the feed. 
     * 
     * @return none
     */
    public function setLogo($logo)
    {
        $this->logo = $logo;
    }

    /**
     * Gets the rights of the feed. 
     * 
     * @return string 
     */
    public function getRights()
    {   
        return $this->rights;
    }

    /** 
     * Sets the rights of the feed. 
     * 
     * @param string $rights The rights of the feed. 
     * 
     * @return none
     */
    public function setRights($rights)
    {
        $this->rights = $rights;
    }

    /**
     * Gets the sub title.  
     * 
     * @return string 
     */
    public function getSubtitle()
    {   
        return $this->subtitle;
    }

    /**
     * Sets the sub title of the feed. 
     *
     * @param string $subtitle Sets the sub title of the feed. 
     * 
     * @return none
     */
    public function setSubtitle($subtitle)
    {
        $this->subtitle = $subtitle;
    }

    /**
     * Gets the title of the feed. 
     *
     * @return string. 
     */
    public function getTitle() 
    {   
        return $this->title;
    }

    /**
     * Sets the title of the feed. 
     *
     * @param string $title The title of the feed. 
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * Gets the updated. 
     * 
     * @return string 
     */
    public function getUpdated()
    {   
        return $this->updated;
    }

    /**
     * Sets the updated. 
     * 
     * @param string $updated updated
     * 
     * @return none
     */
    public function setUpdated($updated)
    {
        $this->udpated = $updated;
    }

    /** 
     * Gets the extension element. 
     * 
     * @return string 
     */
    public function getExtensionElement()
    {   
        return $this->extensionElement;
    }

    /**
     * Sets the extension element. 
     * 
     * @param string $extensionElement The extension element. 
     * 
     * @return none
     */
    public function setExtensionElement($extensionElement)
    {
        $this->extensionElement = $extensionElement;
    }

    /**
     * Gets the entry of the feed. 
     * 
     * @return Entry
     */
    public function getEntry()
    {
        return $this->entry;
    }

    /**
     * Sets the entry of the feed.
     * 
     * @param Entry $entry The entry of the feed. 
     * 
     * @return none
     */
    public function setEntry($entry)
    {
        $this->entry = $entry;
    }

    /**
     * Gets the content of the feed. 
     * 
     * @return Content
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Sets the content of the feed.
     * 
     * @param Content $content The content of the feed. 
     *
     * @return none
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /** 
     * Writes an XML representing the feed object.
     * 
     * @param \XMLWriter $xmlWriter The XML writer.
     * 
     * @return none 
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
                foreach ($this->category as $category) {
                    $category->writeXml($xmlWriter);
                }
            } else {
                $category->writeXml($xmlWriter);
            }
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

        if (!is_null($this->generator)) {
            $this->generator->writeXml($xmlWriter);
        } 

        if (!is_null($this->icon)) {
            $xmlWriter->writeElement('atom:icon', $this->icon);
        }

        if (!is_null($this->logo)) {
            $xmlWriter->writeElement('atom:logo', $this->logo);
        }

        if (!is_null($this->id)) {
            $xmlWriter->writeElement('atom:id', $this->id);
        }

        if (!is_null($this->link)) {
            $xmlWriter->writeElement('atom:link', $this->link);
        }

        if (!is_null($this->rights)) {
            $xmlWriter->writeElement('atom:rights', $this->rights);
        }

        if (!is_null($this->subtitle)) {
            $xmlWriter->writeElement('atom:subtitle', $this->subtitle);
        }
        
        if (!is_null($this->title)) {
            $xmlWriter->writeElement('atom:title', $this->title);
        }

        if (!is_null($this->updated)) {
            $xmlWriter->writeElement('atom:updated', $this->updated);
        }

        if (!is_null($this->content)) {
            $this->content->writeXml($xmlWriter);
        }
    }
}
?>
