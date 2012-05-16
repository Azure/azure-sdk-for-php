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

class Feed
{

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

    public static function create($xmlString)
    {
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
     * Gets an XML representing the feed object.
     * 
     * @return string 
     */
    public function toXml()
    {
        $innerXml = '';
        if (!is_null($this->_author))
        {
            $innerXml .= '<author>'.$this->_author.'</author>';            
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

        if (!is_null($this->_generator))
        {
            $innerXml .= '<generator>'.$this->_generator.'</generator>';
        } 

        if (!is_null($this->_icon))
        {
            $innerXml .= '<icon>'.$this->_icon.'</icon>';
        }

        if (!is_null($this->_logo))
        {
            $innerXml .= '<logo>'.$this->_logo.'</logo>';
        }

        if (!is_null($this->_id))
        {
            $innerXml .= '<id>'.$this->_id.'</id>';
        }

        if (!is_null($this->_link))
        {
            $innerXml .= '<link>'.$this->_link.'</link>';
        }

        if (!is_null($this->_rights))
        {
            $innerXml .= '<rights>'.$this->_rights.'</rights>';
        }

        if (!is_null($this->_subtitle))
        {
            $innerXml .= '<subtitle>'.$this->_subtitle.'</subtitle>';
        }
        
        if (!is_null($this->_title))
        {
            $innerXml .= '<title>'.$this->_title.'</title>';
        }

        if (!is_null($this->_updated))
        {
            $innerXml .= '<updated>'.$this->_updated.'</updated>';
        }

        $outerXml = '<entry>'.$innerXml.'</entry>';
        return $outerXml;
    }

}
?>
