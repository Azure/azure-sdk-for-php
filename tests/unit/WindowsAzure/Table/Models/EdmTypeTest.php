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
 * @package   Tests\Unit\WindowsAzure\Table\Models
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
namespace Tests\Unit\WindowsAzure\Table\Models;
use WindowsAzure\Table\Models\EdmType;
use WindowsAzure\Common\Internal\Utilities;

/**
 * Unit tests for class EdmTypeTest
 *
 * @category  Microsoft
 * @package   Tests\Unit\WindowsAzure\Table\Models
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: 0.4.0_2014-01
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
class EdmTypeTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers WindowsAzure\Table\Models\EdmType::processType
     */
    public function testProcessTypeWithNull()
    {
        // Setup
        $expected = EdmType::STRING;
        
        // Test
        $actual = EdmType::processType(null);
        
        // Assert
        $this->assertEquals($expected, $actual);
    }
    
    /**
     * @covers WindowsAzure\Table\Models\EdmType::processType
     */
    public function testProcessType()
    {
        // Setup
        $expected = EdmType::BINARY;
        
        // Test
        $actual = EdmType::processType($expected);
        
        // Assert
        $this->assertEquals($expected, $actual);
    }
    
    /**
     * @covers WindowsAzure\Table\Models\EdmType::unserializeQueryValue
     */
    public function testUnserializeQueryValueWithString()
    {
        // Setup
        $type = EdmType::STRING;
        $value = '1234';
        $expected = $value;
        
        // Test
        $actual = EdmType::unserializeQueryValue($type, $value);
        
        // Assert
        $this->assertEquals($expected, $actual);
    }
    
    /**
     * @covers WindowsAzure\Table\Models\EdmType::unserializeQueryValue
     */
    public function testUnserializeQueryValueWithBinary()
    {
        // Setup
        $type = EdmType::BINARY;
        $value = 'MTIzNDU=';
        $expected = base64_decode($value);
        
        // Test
        $actual = EdmType::unserializeQueryValue($type, $value);
        
        // Assert
        $this->assertEquals($expected, $actual);
    }
    
    /**
     * @covers WindowsAzure\Table\Models\EdmType::unserializeQueryValue
     */
    public function testUnserializeQueryValueWithDate()
    {
        // Setup
        $type = EdmType::DATETIME;
        $value = '2008-10-01T15:26:13Z';
        
        // Test
        $actual = EdmType::unserializeQueryValue($type, $value);
        
        // Assert
        $this->assertInstanceOf('\DateTime', $actual);
    }
    
    /**
     * @covers WindowsAzure\Table\Models\EdmType::unserializeQueryValue
     */
    public function testUnserializeQueryValueWithInt()
    {
        // Setup
        $type = EdmType::INT64;
        $value = '123';
        $expected = 123;
        
        // Test
        $actual = EdmType::unserializeQueryValue($type, $value);
        
        // Assert
        $this->assertEquals($expected, $actual);
    }
    
    /**
     * @covers WindowsAzure\Table\Models\EdmType::unserializeQueryValue
     */
    public function testUnserializeQueryValueWithBoolean()
    {
        // Setup
        $type = EdmType::BOOLEAN;
        $value = '1';
        $expected = true;
        
        // Test
        $actual = EdmType::unserializeQueryValue($type, $value);
        
        // Assert
        $this->assertEquals($expected, $actual);
    }
    
    /**
     * @covers WindowsAzure\Table\Models\EdmType::unserializeQueryValue
     */
    public function testUnserializeQueryValueWithInvalid()
    {
        // Assert
        $this->setExpectedException('\InvalidArgumentException');
        
        // Test
        EdmType::unserializeQueryValue('7amada', '1233');
    }
    
    /**
     * @covers WindowsAzure\Table\Models\EdmType::isValid
     */
    public function testIsValid()
    {
        // Setup
        $expected = true;
        
        // Test
        $actual = EdmType::isValid(EdmType::STRING);
        
        // Assert
        $this->assertEquals($expected, $actual);
    }
    
    /**
     * @covers WindowsAzure\Table\Models\EdmType::isValid
     */
    public function testIsValidWithInvalid()
    {
        // Setup
        $expected = false;
        
        // Test
        $actual = EdmType::isValid('hobba');
        
        // Assert
        $this->assertEquals($expected, $actual);
    }
    
    /**
     * @covers WindowsAzure\Table\Models\EdmType::validateEdmValue
     */
    public function testValidateEdmValueWithBinary()
    {
        // Setup
        $type = EdmType::BINARY;
        $value = 'MTIzNDU=';
        $expected = true;
        
        // Test
        $actual = EdmType::validateEdmValue($type, $value);
        
        // Assert
        $this->assertEquals($expected, $actual);
    }
    
    /**
     * @covers WindowsAzure\Table\Models\EdmType::validateEdmValue
     */
    public function testValidateEdmValueWithDate()
    {
        // Setup
        $type = EdmType::DATETIME;
        $value = new \DateTime();
        $expected = true;
        
        // Test
        $actual = EdmType::validateEdmValue($type, $value);
        
        // Assert
        $this->assertEquals($expected, $actual);
    }
    
    /**
     * @covers WindowsAzure\Table\Models\EdmType::validateEdmValue
     */
    public function testValidateEdmValueWithInt()
    {
        // Setup
        $type = EdmType::INT64;
        $value = '123';
        $expected = true;
        
        // Test
        $actual = EdmType::validateEdmValue($type, $value);
        
        // Assert
        $this->assertEquals($expected, $actual);
    }
    
    /**
     * @covers WindowsAzure\Table\Models\EdmType::validateEdmValue
     */
    public function testValidateEdmValueWithBoolean()
    {
        // Setup
        $type = EdmType::BOOLEAN;
        $value = false;
        $expected = true;
        
        // Test
        $actual = EdmType::validateEdmValue($type, $value);
        
        // Assert
        $this->assertEquals($expected, $actual);
    }
    
    /**
     * @covers WindowsAzure\Table\Models\EdmType::validateEdmValue
     */
    public function testValidateEdmValueWithInvalid()
    {
        // Assert
        $this->setExpectedException('\InvalidArgumentException');
        
        // Test
        EdmType::validateEdmValue('7amada', '1233');
    }
    
    /**
     * @covers WindowsAzure\Table\Models\EdmType::serializeValue
     */
    public function testSerializeValueWithBinary()
    {
        // Setup
        $type = EdmType::BINARY;
        $value = '010101010111';
        $expected = base64_encode($value);
        
        // Test
        $actual = EdmType::serializeValue($type, $value);
        
        // Assert
        $this->assertEquals($expected, $actual);
    }
    
    /**
     * @covers WindowsAzure\Table\Models\EdmType::serializeValue
     */
    public function testSerializeValueWithDate()
    {
        // Setup
        $type = EdmType::DATETIME;
        $value = new \DateTime();
        $expected = Utilities::convertToEdmDateTime($value);
        
        // Test
        $actual = EdmType::serializeValue($type, $value);
        
        // Assert
        $this->assertEquals($expected, $actual);
    }
    
    /**
     * @covers WindowsAzure\Table\Models\EdmType::serializeValue
     */
    public function testSerializeValueWithInt()
    {
        // Setup
        $type = EdmType::INT64;
        $value = 123;
        $expected = htmlspecialchars($value);
        
        // Test
        $actual = EdmType::serializeValue($type, $value);
        
        // Assert
        $this->assertEquals($expected, $actual);
    }
    
    /**
     * @covers WindowsAzure\Table\Models\EdmType::serializeValue
     */
    public function testSerializeValueWithBoolean()
    {
        // Setup
        $type = EdmType::BOOLEAN;
        $value = true;
        $expected = ($value == true ? '1' : '0');
        
        // Test
        $actual = EdmType::serializeValue($type, $value);
        
        // Assert
        $this->assertEquals($expected, $actual);
    }
    
    /**
     * @covers WindowsAzure\Table\Models\EdmType::serializeValue
     */
    public function testSerializeValueWithInvalid()
    {
        // Assert
        $this->setExpectedException('\InvalidArgumentException');
        
        // Test
        EdmType::serializeValue('7amada', '1233');
    }
}


