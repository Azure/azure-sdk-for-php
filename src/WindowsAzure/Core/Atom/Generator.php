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

class Generator
{
    /**
     * The of the generator. 
     *
     * @var string  
     */
    private $_text;

    /**
     * The Uri of the generator. 
     *
     * @var string  
     */
    private $_uri;

    /**
     * The version of the generator.
     *
     * @var string 
     */
    private $_version;
     
    /** 
     * Creates an ATOM generator instance with specified name.
     *
     * @param string $text The text content of the generator.
     */
    public function __construct($text)
    {
        $this->_text = $text;
    }

    /** 
     * Gets the text of the generator. 
     *
     * @return string
     */
    public function getText()
    {   
        return $this->_text;
    } 

    /**
     * Sets the text of the generator.
     * 
     * @param string $text The text of the generator.
     */
    public function setText($text)
    {
        $this->_text = $text; 
    }

    /**
     * Gets the URI of the generator. 
     * 
     * @return string
     */
    public function getUri()
    {
        return $this->_uri;
    }

    /**
     * Sets the URI of the generator. 
     * 
     * @param string $uri The URI of the generator.
     */
    public function setUri($uri)
    {
        $this->_uri = $uri;
    }

    
    /**
     * Gets the version of the generator. 
     * 
     * @return string
     */
    public function getVersion()
    {
        return $this->_version;
    }

    /**
     * Sets the version of the generator. 
     * 
     * @param string $version The version of the generator.
     */
    public function setVersion($version)
    {
        $this->_version = $version;
    }

    /** 
     * Gets an XML representing the generator. 
     * 
     * return string
     */
    public function toXml()
    {
        $xmlWriter = new XMLWriter();
        
        $xmlWriter->openMemory();
        $xmlWriter->startElement('atom:category');
        if (!empty($this->_uri))
        {
            $xmlWriter->writeAttribute('atom:uri', $this->_uri);
        }

        if (!empty($this->_version))
        {
            $xmlWriter->writeAttribute('atom:version', $this->_version);
        }

        $xmlWriter->writeRaw($this->_text);

        $xmlWriter->endElement();
        
        return $xmlWriter->outputMemory();
    }
}
?>
