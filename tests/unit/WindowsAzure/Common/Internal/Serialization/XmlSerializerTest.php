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
 * @package   Tests\Unit\WindowsAzure\Core\Serialization
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */

namespace Tests\Unit\WindowsAzure\Core\Serialization;
use Tests\Framework\TestResources;
use WindowsAzure\Core\Serialization\XmlSerializer;
use WindowsAzure\Services\Core\Models\ServiceProperties;

/**
 * Unit tests for class XmlSerializer
 *
 * @category  Microsoft
 * @package   Tests\Unit\WindowsAzure\Core\Serialization
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
class XmlSerializerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers WindowsAzure\Core\Serialization\XmlSerializer::unserialize
     * @covers WindowsAzure\Core\Serialization\XmlSerializer::_sxml2arr
     */
    public function testUnserialize()
    {
        // Setup
        $xmlSerializer = new XmlSerializer();
        $propertiesSample = TestResources::getServicePropertiesSample();
        $properties = ServiceProperties::create($propertiesSample);
        $xml = $properties->toXml($xmlSerializer);
        $expected = $properties->toArray();
        
        // Test
        $actual = $xmlSerializer->unserialize($xml);
        
        $this->assertEquals($expected, $actual);
    }
    
    /**
     * @covers WindowsAzure\Core\Serialization\XmlSerializer::serialize
     * @covers WindowsAzure\Core\Serialization\XmlSerializer::_arr2xml
     */
    public function testSerialize()
    {
        // Setup
        $xmlSerializer = new XmlSerializer();
        $propertiesSample = TestResources::getServicePropertiesSample();
        $properties = ServiceProperties::create($propertiesSample);
        $expected = $properties->toXml($xmlSerializer);
        $array = $properties->toArray();
        $serializerProperties = array(XmlSerializer::ROOT_NAME => ServiceProperties::$xmlRootName);
        
        // Test
        $actual = $xmlSerializer->serialize($array, $serializerProperties);
        
        $this->assertEquals($expected, $actual);
    }

    /**
     * @covers WindowsAzure\Core\Serialization\XmlSerializer::serialize
     * @covers WindowsAzure\Core\Serialization\XmlSerializer::_arr2xml
     */
    public function testSerializeNoArray()
    {
        // Setup
        $xmlSerializer = new XmlSerializer();
        $expected = false;
        $array = 'not an array';
        $serializerProperties = array(XmlSerializer::ROOT_NAME => ServiceProperties::$xmlRootName);
        
        // Test
        $actual = $xmlSerializer->serialize($array, $serializerProperties);
        
        $this->assertEquals($expected, $actual);
    }
    
    /**
     * @covers WindowsAzure\Core\Serialization\XmlSerializer::serialize
     * @covers WindowsAzure\Core\Serialization\XmlSerializer::_arr2xml
     */
    public function testSerializeAttribute()
    {
        // Setup
        $xmlSerializer = new XmlSerializer();
        $expected = '<?xml version="1.0" encoding="UTF-8"?>' . "\n" .
            '<Object field1="value1" field2="value2"/>' . "\n";
        
        $object = array(
            '@attributes' => array(
                'field1' => 'value1',
                'field2' => 'value2'
            )
        );
        $serializerProperties = array(XmlSerializer::ROOT_NAME => 'Object');
        
        // Test
        $actual = $xmlSerializer->serialize($object, $serializerProperties);
        
        $this->assertEquals($expected, $actual);
    }
}

?>
