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
 * @package   Tests\Unit\WindowsAzure
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */

namespace Tests\Unit\WindowsAzure;
use WindowsAzure\Utilities;
use WindowsAzure\Resources;
use Tests\Framework\TestResources;
use Tests\Framework\VirtualFileSystem;
use WindowsAzure\Services\Core\Models\ServiceProperties;

/**
 * Unit tests for class Utilities
 *
 * @category  Microsoft
 * @package   Tests\Unit\WindowsAzure
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
class UtilitiesTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers WindowsAzure\Utilities::tryGetValue
     */
    public function testTryGetValue()
    {
        // Setup
        $key = 0;
        $expected = 10;
        $data = array(10, 20, 30);
        
        // Test
        $actual = Utilities::tryGetValue($data, $key);
        
        $this->assertEquals($expected, $actual);
    }
    
    /**
     * @covers WindowsAzure\Utilities::tryGetValue
     */
    public function testTryGetValueUsingDefault()
    {
        // Setup
        $key = 10;
        $expected = 6;
        $data = array(10, 20, 30);
        
        // Test
        $actual = Utilities::tryGetValue($data, $key, $expected);
        
        $this->assertEquals($expected, $actual);
    }
    
    /**
     * @covers WindowsAzure\Utilities::tryGetValue
     */
    public function testTryGetValueWithNull()
    {
        // Setup
        $key = 10;
        $data = array(10, 20, 30);
        
        // Test
        $actual = Utilities::tryGetValue($data, $key);
        
        $this->assertNull($actual);
    }

    /**
     * @covers WindowsAzure\Utilities::tryGetKeysChainValue
     */
    public function testTryGetKeysChainValue()
    {
        // Setup
        $array = array();
        $array['a1'] = array();
        $array['a2'] = 'value1';
        $array['a1']['b1'] = array();
        $array['a1']['b2'] = 'value2';
        $array['a1']['b1']['c1'] = 'value3';
        
        // Test - Level 1
        $this->assertEquals('value1', Utilities::tryGetKeysChainValue($array, 'a2'));
        $this->assertEquals(null, Utilities::tryGetKeysChainValue($array, 'a3'));
        
        // Test - Level 2
        $this->assertEquals('value2', Utilities::tryGetKeysChainValue($array, 'a1', 'b2'));
        $this->assertEquals(null, Utilities::tryGetKeysChainValue($array, 'a1', 'b3'));
        
        // Test - Level 3
        $this->assertEquals('value3', Utilities::tryGetKeysChainValue($array, 'a1', 'b1', 'c1'));
        $this->assertEquals(null, Utilities::tryGetKeysChainValue($array, 'a1', 'b1', 'c2'));
    }
    
    /**
     * @covers WindowsAzure\Utilities::startsWith
     */
    public function testStartsWith()
    {
        // Setup
        $string = 'myname';
        $prefix = 'my';
        
        // Test
        $actual = Utilities::startsWith($string, $prefix);
        
        $this->assertTrue($actual);
    }
    
    /**
     * @covers WindowsAzure\Utilities::startsWith
     */
    public function testStartsWithDoesNotStartWithPrefix()
    {
        // Setup
        $string = 'amyname';
        $prefix = 'my';
        
        // Test
        $actual = Utilities::startsWith($string, $prefix);
        
        $this->assertFalse($actual);
    }
    
    /**
     * @covers WindowsAzure\Utilities::getArray
     */
    public function testGetArray()
    {
        // Setup
        $expected = array(array(1, 2, 3, 4),  array(5, 6, 7, 8));
        
        // Test
        $actual = Utilities::getArray($expected);
        
        $this->assertEquals($expected, $actual);
    }
    
    /**
     * @covers WindowsAzure\Utilities::getArray
     */
    public function testGetArrayWithFlatValue()
    {
        // Setup
        $flat = array(1, 2, 3, 4, 5, 6, 7, 8);
        $expected = array(array(1, 2, 3, 4, 5, 6, 7, 8));
        
        // Test
        $actual = Utilities::getArray($flat);
        
        $this->assertEquals($expected, $actual);
    }
    
    /**
     * @covers WindowsAzure\Utilities::getArray
     */
    public function testGetArrayWithMixtureValue()
    {
        // Setup
        $flat = array(array(10, 2), 1, 2, 3, 4, 5, 6, 7, 8);
        $expected = array(array(array(10, 2), 1, 2, 3, 4, 5, 6, 7, 8));
        
        // Test
        $actual = Utilities::getArray($flat);
        
        $this->assertEquals($expected, $actual);
    }
    
    /**
     * @covers WindowsAzure\Utilities::getArray
     */
    public function testGetArrayWithEmptyValue()
    {
        // Setup
        $empty = Resources::EMPTY_STRING;
        $expected = array();
        
        // Test
        $actual = Utilities::getArray($empty);
        
        $this->assertEquals($expected, $actual);
    }
    
    /**
     * @covers WindowsAzure\Utilities::unserialize
     * @covers WindowsAzure\Utilities::_sxml2arr
     */
    public function testUnserialize()
    {
        // Setup
        $propertiesSample = TestResources::getServicePropertiesSample();
        $properties = ServiceProperties::create($propertiesSample);
        $xml = $properties->toXml();
        $expected = $properties->toArray();
        
        // Test
        $actual = Utilities::unserialize($xml);
        
        $this->assertEquals($expected, $actual);
    }
    
    /**
     * @covers WindowsAzure\Utilities::serialize
     * @covers WindowsAzure\Utilities::_arr2xml
     */
    public function testSerialize()
    {
        // Setup
        $propertiesSample = TestResources::getServicePropertiesSample();
        $properties = ServiceProperties::create($propertiesSample);
        $expected = $properties->toXml();
        $array = $properties->toArray();
        
        // Test
        $actual = Utilities::serialize($array, ServiceProperties::$xmlRootName);
        
        $this->assertEquals($expected, $actual);
    }

    /**
     * @covers WindowsAzure\Utilities::serialize
     * @covers WindowsAzure\Utilities::_arr2xml
     */
    public function testSerializeNoArray()
    {
        // Setup
        $expected = false;
        $array = 'not an array';
        
        // Test
        $actual = Utilities::serialize($array, ServiceProperties::$xmlRootName);
        
        $this->assertEquals($expected, $actual);
    }
    
    /**
     * @covers WindowsAzure\Utilities::serialize
     * @covers WindowsAzure\Utilities::_arr2xml
     */
    public function testSerializeAttribute()
    {
        // Setup
        $expected = '<?xml version="1.0" encoding="UTF-8"?>' . "\n" .
            '<Object field1="value1" field2="value2"/>';
        
        $object = array(
            '@attributes' => array(
                'field1' => 'value1',
                'field2' => 'value2'
            )
        );
        
        // Test
        $actual = Utilities::serialize($object, 'Object');
        
        $this->assertEquals($expected, $actual);
    }
    
    /**
     * @covers WindowsAzure\Utilities::toBoolean
     */
    public function testToBoolean()
    {
        // Setup
        $value = 'true';
        $expected = true;
        
        // Test
        $actual = Utilities::toBoolean($value);
        
        // Assert
        $this->assertTrue(is_bool($actual));
        $this->assertEquals($expected, $actual);
    }
    
    /**
     * @covers WindowsAzure\Utilities::booleanToString
     */
    public function testBooleanToString()
    {
        // Setup
        $expected = 'true';
        $value = true;
        
        // Test
        $actual = Utilities::booleanToString($value);
        
        // Assert
        $this->assertEquals($expected, $actual);
    }
    
    /**
     * @covers WindowsAzure\Utilities::keysToLower
     */
    public function testKeysToLower()
    {
        // Setup
        $expected = array('name' => 1, 'value' => 20, '12m3' => 0);
        $test = array('NamE' => 1, 'VALUe' => 20, '12M3' => 0);
        
        // Test
        $actual = Utilities::keysToLower($test);
        
        // Assert
        $this->assertEquals($expected, $actual);
    }
    
    /**
     * @covers WindowsAzure\Utilities::isoDate
     */
    public function testIsoDate()
    {
        // Test
        $date = Utilities::isoDate();
        
        // Assert
        $this->assertNotNull($date);
    }
    
    /**
     * @covers WindowsAzure\Utilities::convertToEdmDateTime
     */
    public function testConvertToEdmDateTime()
    {
        // Test
        $actual = Utilities::convertToEdmDateTime(new \DateTime());
        
        // Assert
        $this->assertNotNull($actual);
    }
    
    /**
     * @covers WindowsAzure\Utilities::convertToDateTime
     */
    public function testConvertToDateTime()
    {
        // Setup
        $date = '2008-10-01T15:26:13Z';
        
        // Test
        $actual = Utilities::convertToDateTime($date);
        
        // Assert
        $this->assertInstanceOf('\DateTime', $actual);
    }
    
    /**
     * @covers WindowsAzure\Utilities::convertToDateTime
     */
    public function testConvertToDateTimeWithDate()
    {
        // Setup
        $date = new \DateTime();
        
        // Test
        $actual = Utilities::convertToDateTime($date);
        
        // Assert
        $this->assertEquals($date, $actual);
    }
    
    /**
     * @covers WindowsAzure\Utilities::readFile
     */
    public function testReadFile()
    {
        $expected = 'FileDummyContent';
        $stream = fopen(VirtualFileSystem::newFile($expected), 'r');
        
        // Test
        $actual = Utilities::readFile($stream);
        
        // Assert
        $this->assertEquals($expected, $actual);
    }
}

?>
