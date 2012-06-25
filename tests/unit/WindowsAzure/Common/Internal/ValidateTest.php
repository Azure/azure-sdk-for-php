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
 * @package   Tests\Unit\WindowsAzure\Common\Internal
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */

namespace Tests\Unit\WindowsAzure\Common\Internal;
use WindowsAzure\Common\Internal\Validate;
use WindowsAzure\Common\Internal\InvalidArgumentTypeException;
use WindowsAzure\Common\Internal\Resources;
use WindowsAzure\Common\Internal\Utilities;

/**
 * Unit tests for class ValidateTest
 *
 * @category  Microsoft
 * @package   Tests\Unit\WindowsAzure\Common\Internal
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
class ValidateTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers WindowsAzure\Common\Internal\Validate::isArray
     */
    public function testIsArrayWithArray()
    {
        Validate::isArray(array(), 'array');
        
        $this->assertTrue(true);
    }
    
    /**
     * @covers WindowsAzure\Common\Internal\Validate::isArray
     */
    public function testIsArrayWithNonArray()
    {
        $this->setExpectedException(get_class(new InvalidArgumentTypeException('')));
        Validate::isArray(123, 'array');
    }
    
    /**
     * @covers WindowsAzure\Common\Internal\Validate::isString
     */
    public function testIsStringWithString()
    {
        Validate::isString('I\'m a string', 'string');
        
        $this->assertTrue(true);
    }
    
    /**
     * @covers WindowsAzure\Common\Internal\Validate::isString
     */
    public function testIsStringWithNonString()
    {
        $this->setExpectedException(get_class(new InvalidArgumentTypeException('')));
        Validate::isString(new \DateTime(), 'string');
    }
    
    /**
     * @covers WindowsAzure\Common\Internal\Validate::isBoolean
     */
    public function testIsBooleanWithBoolean()
    {
        Validate::isBoolean(true);
        
        $this->assertTrue(true);
    }
    
    /**
     * @covers WindowsAzure\Common\Internal\Validate::isInteger
     */
    public function testIsIntegerWithInteger()
    {
        Validate::isInteger(123, 'integer');
        
        $this->assertTrue(true);
    }
    
    /**
     * @covers WindowsAzure\Common\Internal\Validate::isInteger
     */
    public function testIsIntegerWithNonInteger()
    {
        $this->setExpectedException(get_class(new InvalidArgumentTypeException('')));
        Validate::isInteger(new \DateTime(), 'integer');
    }
    
    /**
     * @covers WindowsAzure\Common\Internal\Validate::isTrue
     */
    public function testIsTrueWithTrue()
    {
        Validate::isTrue(true, Resources::EMPTY_STRING);
        
        $this->assertTrue(true);
    }
    
    /**
     * @covers WindowsAzure\Common\Internal\Validate::isTrue
     */
    public function testIsTrueWithFalse()
    {
        $this->setExpectedException('\InvalidArgumentException');
        Validate::isTrue(false, Resources::EMPTY_STRING);
    }
    
    /**
     * @covers WindowsAzure\Common\Internal\Validate::isDate
     */
    public function testIsDateWithDate()
    {
        $date = Utilities::rfc1123ToDateTime('Fri, 09 Oct 2009 21:04:30 GMT');
        Validate::isDate($date);
        
        $this->assertTrue(true);
    }
    
    /**
     * @covers WindowsAzure\Common\Internal\Validate::isDate
     */
    public function testIsDateWithNonDate()
    {
        $this->setExpectedException(get_class(new InvalidArgumentTypeException('DateTime')));
        Validate::isDate('not date');
    }
    
    /**
     * @covers WindowsAzure\Common\Internal\Validate::notNullOrEmpty
     */
    public function testNotNullOrEmptyWithNonEmpty()
    {
        Validate::notNullOrEmpty(1234, 'not null');
        
        $this->assertTrue(true);
    }
    
    /**
     * @covers WindowsAzure\Common\Internal\Validate::notNullOrEmpty
     */
    public function testNotNullOrEmptyWithEmpty()
    {
        $this->setExpectedException('\InvalidArgumentException');
        Validate::notNullOrEmpty(Resources::EMPTY_STRING, 'variable');
    }
    
    /**
     * @covers WindowsAzure\Common\Internal\Validate::notNull
     */
    public function testNotNullWithNull()
    {
        $this->setExpectedException('\InvalidArgumentException');
        Validate::notNullOrEmpty(null, 'variable');
    }

    /**
     * @covers WindowsAzure\Common\Internal\Validate::isInstanceOf
     */
    public function testIsInstanceOfStringPasses()
    {
        // Setup
        $value = 'testString';
        $stringObject = 'stringObject';

        // Test
        $result = Validate::isInstanceOf($value, $stringObject, 'value');
    
        // Assert
        $this->assertTrue($result);
    }

    /**
     * @covers WindowsAzure\Common\Internal\Validate::isInstanceOf
     */
    public function testIsInstanceOfStringFail()
    {
        // Setup
        $this->setExpectedException('\InvalidArgumentException');
        $value = 'testString';
        $arrayObject = array();

        // Test
        $result = Validate::isInstanceOf($value, $arrayObject, 'value');
    
        // Assert
    }

    /**
     * @covers WindowsAzure\Common\Internal\Validate::isInstanceOf
     */
    public function testIsInstanceOfArrayPasses()
    {
        // Setup
        $value = array();
        $arrayObject = array();

        // Test
        $result = Validate::isInstanceOf($value, $arrayObject, 'value');
    
        // Assert
        $this->assertTrue($result);
    }

    /**
     * @covers WindowsAzure\Common\Internal\Validate::isInstanceOf
     */
    public function testIsInstanceOfArrayFail()
    {
        // Setup
        $this->setExpectedException('\InvalidArgumentException');
        $value = array();
        $stringObject = 'testString';

        // Test
        $result = Validate::isInstanceOf($value, $stringObject, 'value');
    
        // Assert
    }

    /**
     * @covers WindowsAzure\Common\Internal\Validate::isInstanceOf
     */
    public function testIsInstanceOfIntPasses()
    {
        // Setup
        $value = 38;
        $intObject = 83;

        // Test
        $result = Validate::isInstanceOf($value, $intObject, 'value');
    
        // Assert
        $this->assertTrue($result);
    }

    /**
     * @covers WindowsAzure\Common\Internal\Validate::isInstanceOf
     */
    public function testIsInstanceOfIntFail()
    {
        // Setup
        $this->setExpectedException('\InvalidArgumentException');
        $value = 38;
        $stringObject = 'testString';

        // Test
        $result = Validate::isInstanceOf($value, $stringObject, 'value');
    
        // Assert
    }


    /**
     * @covers WindowsAzure\Common\Internal\Validate::isInstanceOf
     */
    public function testIsInstanceOfNullValue()
    {
        // Setup
        $value = null;
        $arrayObject = array();
        
        // Test
        $result = Validate::isInstanceOf($value, $arrayObject, 'value');

        // Assert
        $this->assertTrue($result);
    }

    /**
     * @covers WindowsAzure\Common\Internal\Validate::isDouble
     */
    public function testIsDoubleSuccess()
    {
        // Setup 
        $value = 3.14159265;

        // Test 
        Validate::isDouble($value, 'value');

        // Assert
        $this->assertTrue(true);
    }

    /**
     * @covers WindowsAzure\Common\Internal\Validate::isDouble
     */
    public function testIsDoubleFail()
    {
        // Setup 
        $this->setExpectedException('\InvalidArgumentException');
        $value = 'testInvalidDoubleValue';

        // Test 
        Validate::isDouble($value, 'value');

        // Assert
    }
    
    /**
     * @covers WindowsAzure\Common\Internal\Validate::isDouble
     */
    public function testGetValidateUri()
    {
        // Test
        $function = Validate::getIsValidUri();
        
        // Assert
        $this->assertInternalType('object', $function);
    }
}

