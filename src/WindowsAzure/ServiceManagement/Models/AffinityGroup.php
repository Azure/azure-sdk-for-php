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
 * @package   WindowsAzure\ServiceManagement\Models
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
 
namespace WindowsAzure\ServiceManagement\Models;
use WindowsAzure\Resources;
use WindowsAzure\Utilities;
use WindowsAzure\Core\Serialization\XmlSerializer;

/**
 * The affinity group class.
 *
 * @category  Microsoft
 * @package   WindowsAzure\ServiceManagement\Models
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
class AffinityGroup
{
    /**
     * @var string
     */
    private $_name;
    
    /**
     * @var string
     */
    private $_label;
    
    /**
     * @var string
     */
    private $_description;
    
    /**
     * @var string
     */
    private $_location;
    
    /**
     * @var array 
     */
    private $_serializationProperties;
    
    /**
     * Creates AffinityGroup from the given raw array.
     * 
     * @param array $raw The raw affinity group members.
     * 
     * @return AffinityGroup
     */
    public function create($raw)
    {
        $result = new AffinityGroup();
        $result->setLabel(Utilities::tryGetValue($raw, Resources::XTAG_LABEL));
        $result->setLocation(Utilities::tryGetValue($raw, Resources::XTAG_LOCATION));
        $result->setName(Utilities::tryGetValue($raw, Resources::XTAG_NAME));
        $result->setDescription(
                Utilities::tryGetValue($raw, Resources::XTAG_DESCRIPTION)
            );
        
        return $result;
    }
    
    /**
     * Gets the name.
     * 
     * @return string
     */
    public function getName()
    {
        return $this->_name;
    }
    
    /**
     * Sets the name.
     * 
     * @param string $name The name.
     * 
     * @return none
     */
    public function setName($name)
    {
        $this->_name = $name;
    }
    
    /**
     * Gets the label.
     * 
     * @return string
     */
    public function getLabel()
    {
        return $this->_label;
    }
    
    /**
     * Sets the label.
     * 
     * @param string $label The label.
     * 
     * @return none
     */
    public function setLabel($label)
    {
        $this->_label = $label;
    }
    
    /**
     * Gets the description.
     * 
     * @return string
     */
    public function getDescription()
    {
        return $this->_description;
    }
    
    /**
     * Sets the description.
     * 
     * @param string $description The description.
     * 
     * @return none
     */
    public function setDescription($description)
    {
        $this->_description = $description;
    }
    
    /**
     * Gets the location.
     * 
     * @return string
     */
    public function getLocation()
    {
        return $this->_location;
    }
    
    /**
     * Sets the location.
     * 
     * @param string $location The location.
     * 
     * @return none
     */
    public function setLocation($location)
    {
        $this->_location = $location;
    }
    
    /**
     * Adds serialization property.
     * 
     * @param string $key   The property name.
     * @param string $value The property value.
     * 
     * @return none
     */
    public function addSerializationProperty($key, $value)
    {
        $this->_serializationProperties[$key] = $value;
    }
    
    /**
     * Gets serialization property value.
     * 
     * @param string $key The property key.
     * 
     * @return string
     */
    public function getSerializationPropertyValue($key)
    {
        return Utilities::tryGetValue($this->_serializationProperties, $key);
    }
    
    /**
     * Serializes the current object.
     * 
     * @param ISerializer $serializer The serializer.
     * 
     * @return string
     * 
     * @throws \InvalidArgumentException
     */
    public function serialize($serializer)
    {
        $serialized = Resources::EMPTY_STRING;
        
        if ($serializer instanceof XmlSerializer) {
            $arr = array();
            $arr[Resources::XTAG_NAMESPACE] = array(
                Resources::WA_XML_NAMESPACE => null,
            );
            Utilities::addIfNotEmpty(Resources::XTAG_NAME, $this->_name, $arr);
            Utilities::addIfNotEmpty(Resources::XTAG_LABEL, $this->_label, $arr);
            Utilities::addIfNotEmpty(
                Resources::XTAG_DESCRIPTION,
                $this->_description,
                $arr
            );
            Utilities::addIfNotEmpty(
                Resources::XTAG_LOCATION,
                $this->_location,
                $arr
            );
            
            $serialized = $serializer->serialize(
                $arr,
                $this->_serializationProperties
            );
        } else {
            throw new \InvalidArgumentException(Resources::UNKNOWN_SRILZER_MSG);
        }
        
        return $serialized;
    }
}

?>