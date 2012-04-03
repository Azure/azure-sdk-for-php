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
 * @package   PEAR2\Tests\Unit\WindowsAzure\Services\Table\Models
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
namespace PEAR2\Tests\Unit\WindowsAzure\Services\Table\Models;
use PEAR2\WindowsAzure\Services\Table\Models\EdmType;

/**
 * Unit tests for class EdmTypeTest
 *
 * @category  Microsoft
 * @package   PEAR2\Tests\Unit\WindowsAzure\Services\Table\Models
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
class EdmTypeTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers PEAR2\WindowsAzure\Services\Table\Models\EdmType::processType
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
     * @covers PEAR2\WindowsAzure\Services\Table\Models\EdmType::processType
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
     * @covers PEAR2\WindowsAzure\Services\Table\Models\EdmType::processValue
     */
    public function testProcessValueWithString()
    {
        // Setup
        $type = EdmType::STRING;
        $value = '1234';
        $expected = $value;
        
        // Test
        $actual = EdmType::processValue($type, $value);
        
        // Assert
        $this->assertEquals($expected, $actual);
    }
    
    /**
     * @covers PEAR2\WindowsAzure\Services\Table\Models\EdmType::processValue
     */
    public function testProcessValueWithDate()
    {
        // Setup
        $type = EdmType::DATETIME;
        $value = '2008-10-01T15:26:13Z';
        
        // Test
        $actual = EdmType::processValue($type, $value);
        
        // Assert
        $this->assertInstanceOf('\DateTime', $actual);
    }
    
    /**
     * @covers PEAR2\WindowsAzure\Services\Table\Models\EdmType::processValue
     */
    public function testProcessValueWithInt()
    {
        // Setup
        $type = EdmType::INT64;
        $value = '123';
        $expected = 123;
        
        // Test
        $actual = EdmType::processValue($type, $value);
        
        // Assert
        $this->assertEquals($expected, $actual);
    }
    
    /**
     * @covers PEAR2\WindowsAzure\Services\Table\Models\EdmType::processValue
     */
    public function testProcessValueWithBoolean()
    {
        // Setup
        $type = EdmType::BOOLEAN;
        $value = '1';
        $expected = true;
        
        // Test
        $actual = EdmType::processValue($type, $value);
        
        // Assert
        $this->assertEquals($expected, $actual);
    }
    
    /**
     * @covers PEAR2\WindowsAzure\Services\Table\Models\EdmType::processValue
     */
    public function testProcessValueWithInvalid()
    {
        // Assert
        $this->setExpectedException('\InvalidArgumentException');
        
        // Test
        EdmType::processValue('7amada', '1233');
    }
    
    /**
     * @covers PEAR2\WindowsAzure\Services\Table\Models\EdmType::isValid
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
     * @covers PEAR2\WindowsAzure\Services\Table\Models\EdmType::isValid
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
}

?>
