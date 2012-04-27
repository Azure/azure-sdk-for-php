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
 * @package   Tests\Unit\WindowsAzure\ServiceManagement\Models
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */

namespace Tests\Unit\WindowsAzure\ServiceManagement\Models;
use WindowsAzure\ServiceManagement\Models\AffinityGroup;
use WindowsAzure\Core\Serialization\XmlSerializer;
use WindowsAzure\Resources;


/**
 * Unit tests for class AffinityGroup
 *
 * @category  Microsoft
 * @package   Tests\Unit\WindowsAzure\ServiceManagement\Models
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
class AffinityGroupTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers WindowsAzure\ServiceManagement\Models\AffinityGroup::setName
     * @covers WindowsAzure\ServiceManagement\Models\AffinityGroup::getName
     */
    public function testSetName()
    {
        // Setup
        $affinityGroup = new AffinityGroup();
        $expected = 'Name';
        
        // Test
        $affinityGroup->setName($expected);
        
        // Assert
        $this->assertEquals($expected, $affinityGroup->getName());
    }
    
    /**
     * @covers WindowsAzure\ServiceManagement\Models\AffinityGroup::setLabel
     * @covers WindowsAzure\ServiceManagement\Models\AffinityGroup::getLabel
     */
    public function testSetLabel()
    {
        // Setup
        $affinityGroup = new AffinityGroup();
        $expected = 'Label';
        
        // Test
        $affinityGroup->setLabel($expected);
        
        // Assert
        $this->assertEquals($expected, $affinityGroup->getLabel());
    }
    
    /**
     * @covers WindowsAzure\ServiceManagement\Models\AffinityGroup::setDescription
     * @covers WindowsAzure\ServiceManagement\Models\AffinityGroup::getDescription
     */
    public function testSetDescription()
    {
        // Setup
        $affinityGroup = new AffinityGroup();
        $expected = 'Description';
        
        // Test
        $affinityGroup->setDescription($expected);
        
        // Assert
        $this->assertEquals($expected, $affinityGroup->getDescription());
    }
    
    /**
     * @covers WindowsAzure\ServiceManagement\Models\AffinityGroup::setLocation
     * @covers WindowsAzure\ServiceManagement\Models\AffinityGroup::getLocation
     */
    public function testSetLocation()
    {
        // Setup
        $affinityGroup = new AffinityGroup();
        $expected = 'Location';
        
        // Test
        $affinityGroup->setLocation($expected);
        
        // Assert
        $this->assertEquals($expected, $affinityGroup->getLocation());
    }
    
    /**
     * @covers WindowsAzure\ServiceManagement\Models\AffinityGroup::addSerializationProperty
     * @covers WindowsAzure\ServiceManagement\Models\AffinityGroup::getSerializationPropertyValue
     */
    public function testAddSerializationProperty()
    {
        // Setup
        $affinityGroup = new AffinityGroup();
        $expectedKey = 'Key';
        $expectedValue = 'Value';
        
        // Test
        $affinityGroup->addSerializationProperty($expectedKey, $expectedValue);
        
        // Assert
        $this->assertEquals($expectedValue, $affinityGroup->getSerializationPropertyValue($expectedKey));
    }
    
    /**
     * @covers WindowsAzure\ServiceManagement\Models\AffinityGroup::serialize
     */
    public function testSerialize()
    {
        // Setup
        $serializer = new XmlSerializer();
        $expected = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
        $expected .= '<CreateAffinityGroup xmlns="http://schemas.microsoft.com/windowsazure">' . "\n";
        $expected .= ' <Name>Name</Name>' . "\n";
        $expected .= ' <Label>Label</Label>' . "\n";
        $expected .= ' <Description>Description</Description>' . "\n";
        $expected .= ' <Location>Location</Location>' . "\n";
        $expected .= '</CreateAffinityGroup>' . "\n";
        $affinityGroup = new AffinityGroup();
        $affinityGroup->setName('Name');
        $affinityGroup->setLabel('Label');
        $affinityGroup->setLocation('Location');
        $affinityGroup->setDescription('Description');
        $affinityGroup->addSerializationProperty(
            XmlSerializer::ROOT_NAME,
            'CreateAffinityGroup'
        );
        
        // Test
        $actual = $affinityGroup->serialize($serializer);
        
        // Assert
        $this->assertEquals($expected, $actual);
    }
    
    /**
     * @covers WindowsAzure\ServiceManagement\Models\AffinityGroup::serialize
     */
    public function testSerializeWithInvalidSerializer()
    {
        // Setup
        $this->setExpectedException('\InvalidArgumentException', Resources::UNKNOWN_SRILZER_MSG);
        $affinityGroup = new AffinityGroup();
        
        // Test
        $affinityGroup->serialize(new AffinityGroup());        
    }
    
    /**
     * @covers WindowsAzure\ServiceManagement\Models\AffinityGroup::create
     */
    public function testCreate()
    {
        // Setup
        $name = 'name';
        $location = 'Anywhere US';
        $label = base64_encode($name);
        $arr = array(
            Resources::XTAG_NAME => $name,
            Resources::XTAG_LOCATION => $location,
            Resources::XTAG_LABEL => $label,
        );
        
        // Test
        $actual = AffinityGroup::create($arr);
        
        // Assert
        $this->assertEquals($name, $actual->getName());
        $this->assertEquals($location, $actual->getLocation());
        $this->assertEquals($label, $actual->getLabel());
        $this->assertNull($actual->getDescription());
    }
}

?>
