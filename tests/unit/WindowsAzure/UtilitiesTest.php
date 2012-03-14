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
 * @package   PEAR2\Tests\Unit\WindowsAzure
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */

use PEAR2\WindowsAzure\Utilities;
use PEAR2\Tests\Framework\TestResources;

/**
 * Unit tests for class Utilities
 *
 * @category  Microsoft
 * @package   PEAR2\Tests\Unit\WindowsAzure
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
class UtilitiesTest extends PHPUnit_Framework_TestCase
{
    /**
     * @covers PEAR2\WindowsAzure\Utilities::tryGetValue
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
     * @covers PEAR2\WindowsAzure\Utilities::tryGetValue
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
     * @covers PEAR2\WindowsAzure\Utilities::tryGetValue
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
     * @covers PEAR2\WindowsAzure\Utilities::startsWith
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
     * @covers PEAR2\WindowsAzure\Utilities::startsWith
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
     * @covers PEAR2\WindowsAzure\Utilities::getArray
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
     * @covers PEAR2\WindowsAzure\Utilities::getArray
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
     * @covers PEAR2\WindowsAzure\Utilities::getArray
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
     * @covers PEAR2\WindowsAzure\Utilities::getArray
     */
    public function testGetArrayWithEmptyValue()
    {
        // Setup
        $empty = PEAR2\WindowsAzure\Resources::EMPTY_STRING;
        $expected = array();
        
        // Test
        $actual = Utilities::getArray($empty);
        
        $this->assertEquals($expected, $actual);
    }
    
    /**
     * @covers PEAR2\WindowsAzure\Utilities::unserialize
     */
    public function testUnserialize()
    {
        // Setup
        $propertiesSample = TestResources::getServicePropertiesSample();
        $properties = \PEAR2\WindowsAzure\Services\Core\Models\ServiceProperties::create($propertiesSample);
        $xml = $properties->toXml();
        $expected = $properties->toArray();
        
        // Test
        $actual = Utilities::unserialize($xml);
        
        $this->assertEquals($expected, $actual);
    }
    
    /**
     * @covers PEAR2\WindowsAzure\Utilities::serialize
     */
    public function testSerialize()
    {
        // Setup
        $propertiesSample = TestResources::getServicePropertiesSample();
        $properties = \PEAR2\WindowsAzure\Services\Core\Models\ServiceProperties::create($propertiesSample);
        $expected = $properties->toXml();
        $array = $properties->toArray();
        
        // Test
        $actual = Utilities::serialize($array, \PEAR2\WindowsAzure\Services\Core\Models\ServiceProperties::$xmlRootName);
        
        $this->assertEquals($expected, $actual);
    }
    
    /**
     * @covers PEAR2\WindowsAzure\Utilities::toBoolean
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
     * @covers PEAR2\WindowsAzure\Utilities::booleanToString
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
}

?>
