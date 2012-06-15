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
use WindowsAzure\Common\Internal\Resources;

/**
 * The base class of ATOM library.
 *
 * @category  Microsoft
 * @package   WindowsAzure\ServiceBus\Internal\Atom
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */

class AtomBase
{
    /**
     * The attributes of the feed.
     *
     * @var array
     */
    protected $attributes;

    /**
     * Creates an ATOM base object with default parameters. 
     */ 
    public function __construct()
    {   
        $this->attributes = array();
    }

    /**
     * Gets the attributes of the ATOM class. 
     *
     * @return array
     */
    public function getAttributes()
    {
        return $this->attributes;
    }

    /**
     * Sets the attributes of the ATOM class.
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
     * Sets an attribute to the ATOM object instance. 
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
     * Gets an attribute with a specified attribute key. 
     * 
     * @param string $attributeKey The key of the attribute. 
     *
     * @return none
     */
    public function getAttribute($attributeKey)
    {
        return $this->attributes[$attributeKey];
    }   

    protected function processAuthorNode($xmlArray)
    {
        $author = array();
        $authorItem = $xmlArray['author'];

        if (is_array($authorItem))
        { 
            foreach ($xmlArray['author'] as $authorXmlInstance) {
                $authorInstance = new Person();
                $authorInstance->parseXml($authorXmlInstance->asXML());
                $author[] = $authorInstance;
            }
        } else {
            $authorInstance = new Person();
            $authorInstance->parseXml($authorItem->asXML()); 
            $author[] = $authorInstance;
        }
        return $author;
    }

    protected function processEntryNode($xmlArray)
    {
        $entry = array();
        $entryItem = $xmlArray['entry'];

        if (is_array($entryItem))
        { 
            foreach ($xmlArray['entry'] as $entryXmlInstance) {
                $entryInstance = new Entry();
                $entryInstance->parseXml($entryXmlInstance->asXML());
                $entry[] = $entryInstance;
            }
        } else {
            $entryInstance = new Entry();
            $entryInstance->parseXml($entryItem->asXML()); 
            $entry[] = $entryInstance;
        }
        return $entry;
    }

    protected function processCategoryNode($xmlArray)
    {
        $category = array();
        $categoryItem = $xmlArray['category'];

        if (is_array($categoryItem))
        { 
            foreach ($xmlArray['category'] as $categoryXmlInstance) {
                $categoryInstance = new Category();
                $categoryInstance->parseXml($categoryXmlInstance->asXML());
                $category[] = $categoryInstance;
            }
        } else {
            $categoryInstance = new Category();
            $categoryInstance->parseXml($categoryItem->asXML()); 
            $category[] = $categoryInstance;
        }
        return $category;
    }

    protected function processContributorNode($xmlArray)
    {
        $category = array();
        $contributorItem = $xmlArray['contributor'];

        if (is_array($contributorItem))
        { 
            foreach ($xmlArray['contributor'] as $contributorXmlInstance) {
                $contributorInstance = new Person();
                $contributorInstance->parseXml($contributorXmlInstance->asXML());
                $contributor[] = $contributorInstance;
            }
        } elseif (is_string($contributorItem)) {
            $contributorInstance = new Person();
            $contributorInstance->setName((string)$contributorItem);
            $contributor[] = $contributorInstance;
        } else {
            $contributorInstance = new Person();
            $contributorInstance->parseXml($contributorItem->asXML());
            $contributor[] = $contributorInstance;
        }
        return $contributor;
    }

    protected function processLinkNode($xmlArray)
    {
        $link = array();
        $linkValue = $xmlArray['link'];

        if (is_array($linkValue))
        {
            foreach ($xmlArray['link'] as $linkValueInstance) {
                $linkInstance = new AtomLink();
                $linkInstance->parseXml($linkValueInstance->asXML());
                $link[] = $linkInstance;
            }
        } else {
            $linkInstance = new AtomLink();
            $linkInstance->parseXml($linkValue->asXML());
            $link[] = $linkInstance;
        }

        return $link;
    }

}
?>
