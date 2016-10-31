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
 * @link      https://github.com/WindowsAzure/azure-sdk-for-php
 */

namespace Tests\unit\WindowsAzure\Common\Internal\Atom;

use WindowsAzure\Common\Internal\Atom\Person;

/**
 * Unit tests for class Person.
 *
 * @category  Microsoft
 *
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 *
 * @version   Release: 0.5.0_2016-11
 *
 * @link      https://github.com/WindowsAzure/azure-sdk-for-php
 */
class PersonTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers \WindowsAzure\Common\Internal\Atom\Person::__construct
     */
    public function testPersonConstructor()
    {
        // Setup

        // Test
        $feed = new Person();

        // Assert
        $this->assertNotNull($feed);
    }

    /** 
     * @covers \WindowsAzure\Common\Internal\Atom\Person::getName
     * @covers \WindowsAzure\Common\Internal\Atom\Person::setName
     */
    public function testGetSetName()
    {
        // Setup
        $expected = 'testName';
        $person = new Person();

        // Test
        $person->setName($expected);
        $actual = $person->getName();

        // Assert 
        $this->assertEquals(
            $expected,
            $actual
        );
    }

    /** 
     * @covers \WindowsAzure\Common\Internal\Atom\Person::getUri
     * @covers \WindowsAzure\Common\Internal\Atom\Person::setUri
     */
    public function testGetSetUri()
    {
        // Setup
        $expected = 'testUri';
        $person = new Person();

        // Test
        $person->setUri($expected);
        $actual = $person->getUri();

        // Assert 
        $this->assertEquals(
            $expected,
            $actual
        );
    }

    /** 
     * @covers \WindowsAzure\Common\Internal\Atom\Person::getEmail
     * @covers \WindowsAzure\Common\Internal\Atom\Person::setEmail
     */
    public function testGetSetEmail()
    {
        // Setup
        $expected = 'testEmail';
        $person = new Person();

        // Test
        $person->setEmail($expected);
        $actual = $person->getEmail();

        // Assert 
        $this->assertEquals(
            $expected,
            $actual
        );
    }
}
