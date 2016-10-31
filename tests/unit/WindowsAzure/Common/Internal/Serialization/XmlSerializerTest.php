<?php

/**
 * LICENSE: Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 * http://www.apache.org/licenses/LICENSE-2.0.
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
 *
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 *
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */

namespace Tests\unit\WindowsAzure\Common\Internal\Serialization;

use Tests\Framework\TestResources;
use WindowsAzure\Common\Models\ServiceProperties;
use WindowsAzure\Common\Internal\Serialization\XmlSerializer;

/**
 * Unit tests for class XmlSerializer.
 *
 * @category  Microsoft
 *
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 *
 * @version   Release: 0.5.0_2016-11
 *
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
class XmlSerializerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers \WindowsAzure\Common\Internal\Serialization\XmlSerializer::unserialize
     * @covers \WindowsAzure\Common\Internal\Serialization\XmlSerializer::_sxml2arr
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
     * @covers \WindowsAzure\Common\Internal\Serialization\XmlSerializer::serialize
     * @covers \WindowsAzure\Common\Internal\Serialization\XmlSerializer::_arr2xml
     */
    public function testSerialize()
    {
        // Setup
        $xmlSerializer = new XmlSerializer();
        $propertiesSample = TestResources::getServicePropertiesSample();
        $properties = ServiceProperties::create($propertiesSample);
        $expected = $properties->toXml($xmlSerializer);
        $array = $properties->toArray();
        $serializerProperties = [XmlSerializer::ROOT_NAME => ServiceProperties::$xmlRootName];

        // Test
        $actual = $xmlSerializer->serialize($array, $serializerProperties);

        $this->assertEquals($expected, $actual);
    }

    /**
     * @covers \WindowsAzure\Common\Internal\Serialization\XmlSerializer::serialize
     * @covers \WindowsAzure\Common\Internal\Serialization\XmlSerializer::_arr2xml
     */
    public function testSerializeAttribute()
    {
        // Setup
        $xmlSerializer = new XmlSerializer();
        $expected = '<?xml version="1.0" encoding="UTF-8"?>'."\n".
            '<Object field1="value1" field2="value2"/>'."\n";

        $object = [
            '@attributes' => [
                'field1' => 'value1',
                'field2' => 'value2',
            ],
        ];
        $serializerProperties = [XmlSerializer::ROOT_NAME => 'Object'];

        // Test
        $actual = $xmlSerializer->serialize($object, $serializerProperties);

        $this->assertEquals($expected, $actual);
    }

    /**
     * @covers \WindowsAzure\Common\Internal\Serialization\XmlSerializer::objectSerialize
     */
    public function testObjectSerializeSuccess()
    {
        // Setup
        $expected = "<DummyClass/>\n";
        $target = new DummyClass();

        // Test
        $actual = XmlSerializer::objectSerialize($target, 'DummyClass');

        // Assert
        $this->assertEquals(
            $expected,
            $actual
        );
    }

    /**
     * @covers \WindowsAzure\Common\Internal\Serialization\XmlSerializer::objectSerialize
     */
    public function testObjectSerializeSuccessWithAttributes()
    {
        // Setup 
        $expected = "<DummyClass testAttribute=\"testAttributeValue\"/>\n";
        $target = new DummyClass();
        $target->addAttribute('testAttribute', 'testAttributeValue');

        // Test
        $actual = XmlSerializer::objectSerialize($target, 'DummyClass');

        // Assert
        $this->assertEquals(
            $expected,
            $actual
        );
    }

    /**
     * @covers \WindowsAzure\Common\Internal\Serialization\XmlSerializer::objectSerialize
     */
    public function testObjectSerializeInvalidObject()
    {
        // Setup
        $this->setExpectedException(get_class(new \InvalidArgumentException()));
        // Test
        $actual = XmlSerializer::objectSerialize(null, null);
        // Assert
    }
}
