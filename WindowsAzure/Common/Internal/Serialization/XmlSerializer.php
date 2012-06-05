<?php

/**
 * LICENSE: Licensed under the Apache License, Version 2.0 (the "License");
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
 * @package   WindowsAzure\Common\Internal\Serialization
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
 
namespace WindowsAzure\Common\Internal\Serialization;
use WindowsAzure\Common\Internal\Utilities;
use WindowsAzure\Common\Internal\Resources;

/**
 * Short description
 *
 * @category  Microsoft
 * @package   WindowsAzure\Common\Internal\Serialization
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
class XmlSerializer implements ISerializer
{
    const STANDALONE  = 'standalone';
    const ROOT_NAME   = 'rootName';
    const DEFAULT_TAG = 'defaultTag';
    
    /**
     * Converts a SimpleXML object to an Array recursively
     * ensuring all sub-elements are arrays as well.
     *
     * @param string $sxml The SimpleXML object.
     * @param array  $arr  The array into which to store results.
     * 
     * @return array
     */
    private function _sxml2arr($sxml, $arr = null)
    {
        foreach ((array) $sxml as $key => $value) {
            if (is_object($value) || (is_array($value))) {
                $arr[$key] = $this->_sxml2arr($value);
            } else {
                $arr[$key] = $value;
            }
        }

        return $arr; 
    }
    
    /**
     * Takes an array and produces XML based on it.
     *
     * @param XMLWriter $xmlw       XMLWriter object that was previously instanted
     * and is used for creating the XML.
     * @param array     $data       Array to be converted to XML.
     * @param string    $defaultTag Default XML tag to be used if none specified.
     * 
     * @return void
     */
    private function _arr2xml(\XMLWriter $xmlw, $data, $defaultTag = null)
    {
        foreach ($data as $key => $value) {
            if ($key === Resources::XTAG_ATTRIBUTES) {
                foreach ($value as $attributeName => $attributeValue) {
                    $xmlw->writeAttribute($attributeName, $attributeValue);
                }
            } else if (is_array($value)) {
                if (!is_int($key)) {
                    if ($key != Resources::EMPTY_STRING) {
                        $xmlw->startElement($key);
                    } else {
                        $xmlw->startElement($defaultTag);
                    }
                }
                
                $this->_arr2xml($xmlw, $value);
                
                if (!is_int($key)) {
                    $xmlw->endElement();
                }
            } else {
                $xmlw->writeElement($key, $value);
            }
        }
    }
    
    /**
     * Serializes given array. The array indices must be string to use them as
     * as element name.
     * 
     * @param array $array      The object to serialize represented in array.
     * @param array $properties The used properties in the serialization process.
     * 
     * @return string
     */
    public function serialize($array, $properties = null)
    {
        $xmlVersion   = '1.0';
        $xmlEncoding  = 'UTF-8';
        $standalone   = Utilities::tryGetValue($properties, self::STANDALONE);
        $defaultTag   = Utilities::tryGetValue($properties, self::DEFAULT_TAG);
        $rootName     = Utilities::tryGetValue($properties, self::ROOT_NAME);
        $docNamespace = Utilities::tryGetValue(
            $array,
            Resources::XTAG_NAMESPACE,
            null
        );

        if (!is_array($array)) {
            return false;
        }

        $xmlw = new \XmlWriter();
        $xmlw->openMemory();
        $xmlw->setIndent(true);
        $xmlw->startDocument($xmlVersion, $xmlEncoding, $standalone);
        
        if (is_null($docNamespace)) {
            $xmlw->startElement($rootName);
        } else {
            foreach ($docNamespace as $uri => $prefix) {
                $xmlw->startElementNS($prefix, $rootName, $uri);
                break;
            }
        }
        
        unset($array[Resources::XTAG_NAMESPACE]);
        $this->_arr2xml($xmlw, $array, $defaultTag);

        $xmlw->endElement();

        return $xmlw->outputMemory(true);
    }
    
    /**
     * Unserializes given serialized string.
     * 
     * @param string $serialized The serialized object in string representation.
     * 
     * @return array
     */
    public function unserialize($serialized)
    {
        $sxml = new \SimpleXMLElement($serialized);

        return $this->_sxml2arr($sxml);
    }
}

?>
