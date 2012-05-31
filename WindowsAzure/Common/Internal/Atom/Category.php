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
 * The category class of the ATOM standard.
 *
 * @category  Microsoft
 * @package   WindowsAzure\ServiceBus\Internal\Atom
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */

class Category
{
    /**
     * The term of the category. 
     *
     * @var string  
     */
    protected $_term;

    /**
     * The scheme of the category. 
     *
     * @var string  
     */
    protected $_scheme;

    /**
     * The label of the category. 
     * 
     * @var string 
     */ 
    protected $_label;

    /**
     * The undefined content of the category. 
     *  
     * @var string 
     */
    protected $_undefinedContent;
     
    /** 
     * Creates a Category instance with specified text.
     *
     * @param string $text The text of the category.
     */
    public function __construct($undefinedContent = Resources::EMPTY_STRING)
    {
        $this->_undefinedContent = $undefinedContent;
    }

    /**
     * Creates an ATOM Category instance with specified xml string. 
     * 
     * @param string $xmlString an XML based string of ATOM CONTENT.
     * 
     */ 
    public function parseXml($xmlString)
    {
        $categoryXml = simplexml_load_string($xmlString);
        $attributes = $categoryXml->attributes();
        if (!empty($attributes['term']))
        {
            $this->_term = (string)$attributes['term'];
        }

        if (!empty($attributes['scheme']))
        {
            $this->_scheme = (string)$attributes['scheme'];
        }

        if (!empty($attributes['label']))
        {
            $this->_label = (string)$attributes['label'];
        }

        $this->_undefinedContent =(string)$categoryXml;
    }

    /** 
     * Gets the term of the category. 
     *
     * @return string
     */
    public function getTerm()
    {   
        return $this->_term;
    } 

    /**
     * Sets the term of the category.
     * 
     * @param string $text The text of the category.
     */
    public function setTerm($term)
    {
        $this->_term = $term; 
    }

    /**
     * Gets the scheme of the category. 
     * 
     * @return string
     */
    public function getScheme()
    {
        return $this->_scheme;
    }

    /**
     * Sets the scheme of the category. 
     * 
     * @param string $type The scheme of the category.
     */
    public function setScheme($scheme)
    {
        $this->_scheme = $scheme;
    }

    /**
     * Gets the label of the category. 
     *
     * @return string The label. 
     */
    public function getLabel()
    {
        return $this->_label;
    }

    /**
     * Sets the label of the category. 
     * 
     * @param string $label The label of the category. 
     */ 
    public function setLabel($label)
    {
        $this->_label = $label;
    }

    /**
     * Gets the undefined content of the category. 
     * 
     * @return string
     */
    public function getUndefinedContent()
    {
        return $this->_undefinedContent;
    }

    /**
     * Sets the undefined content of the category. 
     * 
     * @param string $undefinedContent The undefined content of the category. 
     */
    public function setUndefinedContent($undefinedContent)
    {
        $this->_undefinedContent = $undefinedContent;
    }
    
    /** 
     * Writes an XML representing the category. 
     * 
     * @param \XMLWriter $xmlWriter The XML writer.
     */
    public function writeXml($xmlWriter)
    {
        $xmlWriter->startElement('atom:category');
        $this->writeInnerXml($xmlWriter);
        $xmlWriter->endElement();
    }

    /** 
     * Writes an XML representing the category. 
     * 
     * @param \XMLWriter $xmlWriter The XML writer.
     */
    public function writeInnerXml($xmlWriter)
    {
        if (!empty($this->_term))
        {
            $xmlWriter->WriteAttribute('term', $this->_term);
        }

        if (!empty($this->_scheme))
        {
            $xmlWriter->WriteAttribute('scheme', $this->_scheme);
        }

        if (!empty($this->_label))
        {
            $xmlWriter->WriteAttribute('label', $this->_label);
        }

        if (!empty($this->_content))
        {
            $xmlWriter->WriteRaw($this->_content);
        }

    }
}
?>
