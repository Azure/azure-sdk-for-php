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

namespace PEAR2\Tests\Unit\WindowsAzure;
use PEAR2\WindowsAzure\Validate;
use PEAR2\WindowsAzure\Core\InvalidArgumentTypeException;
use PEAR2\WindowsAzure\Resources;
use PEAR2\WindowsAzure\Core\WindowsAzureUtilities;

/**
 * Unit tests for class ValidateTest
 *
 * @category  Microsoft
 * @package   PEAR2\Tests\Unit\WindowsAzure
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
class ValidateTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers PEAR2\WindowsAzure\Validate::isArray
     */
    public function testIsArrayWithArray()
    {
        Validate::isArray(array());
        
        $this->assertTrue(true);
    }
    
    /**
     * @covers PEAR2\WindowsAzure\Validate::isArray
     */
    public function testIsArrayWithNonArray()
    {
        $this->setExpectedException(get_class(new InvalidArgumentTypeException('')));
        Validate::isArray(123);
    }
    
    /**
     * @covers PEAR2\WindowsAzure\Validate::isString
     */
    public function testIsStringWithString()
    {
        Validate::isString('I\'m a string');
        
        $this->assertTrue(true);
    }
    
    /**
     * @covers PEAR2\WindowsAzure\Validate::isString
     */
    public function testIsStringWithNonString()
    {
        $this->setExpectedException(get_class(new InvalidArgumentTypeException('')));
        Validate::isString(123);
    }
    
    /**
     * @covers PEAR2\WindowsAzure\Validate::isBoolean
     */
    public function testIsBooleanWithBoolean()
    {
        Validate::isBoolean(true);
        
        $this->assertTrue(true);
    }
    
    /**
     * @covers PEAR2\WindowsAzure\Validate::isBoolean
     */
    public function testIsBooleanWithNonBoolean()
    {
        $this->setExpectedException(get_class(new InvalidArgumentTypeException('')));
        Validate::isBoolean('I\'m not boolean');
    }
    
    /**
     * @covers PEAR2\WindowsAzure\Validate::isInteger
     */
    public function testIsIntegerWithInteger()
    {
        Validate::isInteger(123);
        
        $this->assertTrue(true);
    }
    
    /**
     * @covers PEAR2\WindowsAzure\Validate::isInteger
     */
    public function testIsIntegerWithNonInteger()
    {
        $this->setExpectedException(get_class(new InvalidArgumentTypeException('')));
        Validate::isInteger('I\'m not Integer');
    }
    
    /**
     * @covers PEAR2\WindowsAzure\Validate::notNullOrEmpty
     */
    public function testNotNullOrEmptyWithNonEmpty()
    {
        Validate::notNullOrEmpty(1234);
        
        $this->assertTrue(true);
    }
    
    /**
     * @covers PEAR2\WindowsAzure\Validate::notNullOrEmpty
     */
    public function testNotNullOrEmptyWithEmpty()
    {
        $this->setExpectedException('\InvalidArgumentException');
        Validate::notNullOrEmpty(Resources::EMPTY_STRING);
    }
    
    /**
     * @covers PEAR2\WindowsAzure\Validate::isTrue
     */
    public function testIsTrueWithTrue()
    {
        Validate::isTrue(true, Resources::EMPTY_STRING);
        
        $this->assertTrue(true);
    }
    
    /**
     * @covers PEAR2\WindowsAzure\Validate::isTrue
     */
    public function testIsTrueWithFalse()
    {
        $this->setExpectedException('\RuntimeException');
        Validate::isTrue(false, Resources::EMPTY_STRING);
    }
    
    /**
     * @covers PEAR2\WindowsAzure\Validate::isDate
     */
    public function testIsDateWithDate()
    {
        $date = WindowsAzureUtilities::rfc1123ToDateTime('Fri, 09 Oct 2009 21:04:30 GMT');
        Validate::isDate($date);
        
        $this->assertTrue(true);
    }
    
    /**
     * @covers PEAR2\WindowsAzure\Validate::isDate
     */
    public function testIsDateWithNonDate()
    {
        $this->setExpectedException(get_class(new InvalidArgumentTypeException('DateTime')));
        Validate::isDate('not date');
    }
    
    public function testIsValidString()
    {
        Validate::isValidString('ValidString');
        $this->assertTrue(true);
    }
}

?>
