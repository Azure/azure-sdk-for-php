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
 * @package   Tests\Functional\WindowsAzure\ServiceBus
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */

namespace Tests\Functional\WindowsAzure\ServiceBus;

use Tests\Framework\ServiceBusRestProxyTestBase;

// TODO: The tests in this class fail because of
// https://github.com/WindowsAzure/azure-sdk-for-php/issues/406

class CustomPropertiesMapperTest extends ServiceBusRestProxyTestBase
{
    private $mapper;

    public function setUp()
    {
        $this->fail("Blocked by issue #406");

        parent::setUp();
        $this->mapper = new CustomPropertiesMapper();
    }

    public function testStringValuesShouldComeThroughInQuotes()
    {
        // Act
        $text = $this->mapper->toString('This is a string');

        // Assert
        $this->assertEquals('"This is a string"', $text, '$text');
    }

    public function testNonStringValuesShouldNotHaveQuotes()
    {
        // Act
        $text = $this->mapper->toString(78);

        // Assert
        $this->assertEquals('78', $text, '$text');
    }

    public function testSupportedJavaTypesHaveExpectedRepresentations()
    {
        // Arrange
        $cal = new \DateTime("Thu, 14 Oct 1971 12:34:56 GMT");
        $cal->setTimezone(new \DateTimeZone('UTC'));

        // Assert
        //        $this->assertEquals('78;byte', $this->mapper->toString((byte) 78), '$this->mapper->toString((byte) 78)');
        $this->assertEquals('78', $this->mapper->toString(78), '$this->mapper->toString((byte) 78)');
        $this->assertEquals('"a"', $this->mapper->toString("a"), '$this->mapper->toString("a")');
        $this->assertEquals('-78', $this->mapper->toString(-78), '$this->mapper->toString((short) -78)');
        //      $this->assertEquals('78;ushort', $this->mapper->toString((unsigned short)78, '$this->mapper->toString((unsigned short)78');
        $this->assertEquals('-78', $this->mapper->toString(-78), '$this->mapper->toString(-78)');
        //     $this->assertEquals('78;uint', $this->mapper->toString(78), '$this->mapper->toString(78)');
        $this->assertEquals('-78', $this->mapper->toString(-78), '$this->mapper->toString((long) -78)');
        //     $this->assertEquals('78;ulong', $this->mapper->toString(78), '$this->mapper->toString(78)');
        $this->assertEquals('78.5', $this->mapper->toString(78.5), '$this->mapper->toString((float) 78.5)');
        $this->assertEquals('78.5', $this->mapper->toString(78.5), '$this->mapper->toString(78.5)');
        //assertEquals('78;decimal', $this->mapper->toString(78));
        $this->assertEquals('true', $this->mapper->toString(true), '$this->mapper->toString(true)');
        $this->assertEquals('false', $this->mapper->toString(false), '$this->mapper->toString(false)');
 //       $this->assertEquals('"12345678-9abc-def0-9abc-def012345678"', $this->mapper->toString(new UUID(0x123456789abcdef0L, 0x9abcdef012345678L)), '$this->mapper->toString(new UUID(0x123456789abcdef0L, 0x9abcdef012345678L))');
        $this->assertEquals('"Thu, 14 Oct 1971 12:34:56 GMT"', $this->mapper->toString($cal), '$this->mapper->toString($cal)');
        $this->assertEquals('"Thu, 14 Oct 1971 12:34:56 GMT"', $this->mapper->toString($cal->getTime()), '$this->mapper->toString($cal->getTime())');
        //assertEquals('78;date-seconds', $this->mapper->toString(78));
    }

    public function testValuesComeBackAsStringsWhenInQuotes()
    {
        // Act
        $value = $this->mapper->fromString('"Hello world"');

        // Assert
        $this->assertEquals('Hello world', $value, '$value');
        $this->assertTrue(is_string($value), '$value->getClass()');
    }

    public function testNonStringTypesWillBeParsedAsNumeric()
    {
        // Act
        $value = $this->mapper->fromString('5');

        // Assert
        $this->assertEquals(5, $value, '$value');
        $this->assertTrue(is_int($value), '$value->getClass()');
    }

    public function testSupportedFormatsHaveExpectedJavaTypes()
    {
        // Arrange
        $cal = new \DateTime("Thu, 14 Oct 1971 12:34:56 GMT");
        $cal->setTimezone(new \DateTimeZone('UTC'));

        // Act
        $dt = $this->mapper->fromString('"Thu, 14 Oct 1971 12:34:56 GMT"');

        // Assert
        //        $this->assertEquals('78;byte', $this->mapper->toString((byte) 78), '$this->mapper->toString((byte) 78)');
        // $this->assertEquals((byte) 78, $this->mapper->fromString('78'), '$this->mapper->fromString("78")');
        //  $this->assertEquals("a", $this->mapper->fromString('a;char'), '$this->mapper->fromString("a;char")');
        //  $this->assertEquals((short) -78, $this->mapper->fromString('-78;short'), '$this->mapper->fromString("-78;short")');
        //      $this->assertEquals('78;ushort', $this->mapper->toString((unsigned short)78, '$this->mapper->toString((unsigned short)78');
        $this->assertEquals(-78, $this->mapper->fromString('-78'), '$this->mapper->fromString("-78")');
        //     $this->assertEquals('78;uint', $this->mapper->toString(78), '$this->mapper->toString(78)');
        //    $this->assertEquals((long) -78, $this->mapper->fromString('-78;long'), '$this->mapper->fromString("-78;long")');
        //     $this->assertEquals('78;ulong', $this->mapper->toString(78), '$this->mapper->toString(78)');
        //   $this->assertEquals((float) 78.5, $this->mapper->fromString('78.5;float'), '$this->mapper->fromString("78.5;float")');
        $this->assertEquals(78.5, $this->mapper->fromString('78.5'), '$this->mapper->fromString("78.5")');
        //assertEquals('78;decimal', $this->mapper->toString(78));
        $this->assertEquals(true, $this->mapper->fromString('true'), '$this->mapper->fromString("true")');
        $this->assertEquals(false, $this->mapper->fromString('false'), '$this->mapper->fromString("false")');
        //    $this->assertEquals(new UUID(0x123456789abcdef0L, 0x9abcdef012345678L, '0x9abcdef012345678L'),
        //          $this->mapper->fromString('12345678-9abc-def0-9abc-def012345678;uuid'));

        $this->assertEquals($cal->getTime()->getTime(), $dt->getTime(), 1000);
        //assertEquals('78;date-seconds', $this->mapper->toString(78));
    }
}

?>
