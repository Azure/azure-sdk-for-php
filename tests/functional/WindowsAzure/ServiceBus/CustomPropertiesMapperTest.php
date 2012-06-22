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
    public function setUp()
    {
    }

    public function testStringValuesShouldComeThroughInQuotes()
    {
        // Act
        $text = json_encode('This is a string');

        // Assert
        $this->assertEquals('"This is a string"', $text, '$text');
    }

    public function testNonStringValuesShouldNotHaveQuotes()
    {
        // Act
        $text = json_encode(78);

        // Assert
        $this->assertEquals('78', $text, '$text');
    }

    public function testSupportedJavaTypesHaveExpectedRepresentations()
    {
        // Arrange
        $cal = "Thu, 14 Oct 1971 12:34:56 GMT";
//        $cal = new \DateTime("Thu, 14 Oct 1971 12:34:56 GMT");
//        $cal->setTimezone(new \DateTimeZone('UTC'));

        // Assert
        //        $this->assertEquals('78;byte', json_encode((byte) 78), 'json_encode((byte) 78)');
        $this->assertEquals('78', json_encode(78), 'json_encode((byte) 78)');
        $this->assertEquals('"a"', json_encode("a"), 'json_encode("a")');
        $this->assertEquals('-78', json_encode(-78), 'json_encode((short) -78)');
        //      $this->assertEquals('78;ushort', json_encode((unsigned short)78, 'json_encode((unsigned short)78');
        $this->assertEquals('-78', json_encode(-78), 'json_encode(-78)');
        //     $this->assertEquals('78;uint', json_encode(78), 'json_encode(78)');
        $this->assertEquals('-78', json_encode(-78), 'json_encode((long) -78)');
        //     $this->assertEquals('78;ulong', json_encode(78), 'json_encode(78)');
        $this->assertEquals('78.5', json_encode(78.5), 'json_encode((float) 78.5)');
        $this->assertEquals('78.5', json_encode(78.5), 'json_encode(78.5)');
        //assertEquals('78;decimal', json_encode(78));
        $this->assertEquals('true', json_encode(true), 'json_encode(true)');
        $this->assertEquals('false', json_encode(false), 'json_encode(false)');
 //       $this->assertEquals('"12345678-9abc-def0-9abc-def012345678"', json_encode(new UUID(0x123456789abcdef0L, 0x9abcdef012345678L)), 'json_encode(new UUID(0x123456789abcdef0L, 0x9abcdef012345678L))');
        $this->assertEquals('"Thu, 14 Oct 1971 12:34:56 GMT"', json_encode($cal), 'json_encode($cal)');
        $this->assertEquals('"Thu, 14 Oct 1971 12:34:56 GMT"', json_encode($cal), 'json_encode($cal->getTime())');
        //assertEquals('78;date-seconds', json_encode(78));
    }

    public function testValuesComeBackAsStringsWhenInQuotes()
    {
        // Act
        $value = json_decode('"Hello world"');

        // Assert
        $this->assertEquals('Hello world', $value, '$value');
        $this->assertTrue(is_string($value), '$value->getClass()');
    }

    public function testNonStringTypesWillBeParsedAsNumeric()
    {
        // Act
        $value = json_decode('5');

        // Assert
        $this->assertEquals(5, $value, '$value');
        $this->assertTrue(is_int($value), '$value->getClass()');
    }

    public function testSupportedFormatsHaveExpectedJavaTypes()
    {
        // Arrange
//        $cal = new \DateTime("Thu, 14 Oct 1971 12:34:56 GMT");
//        $cal->setTimezone(new \DateTimeZone('UTC'));
        $cal = "Thu, 14 Oct 1971 12:34:56 GMT";

        // Act
        $dt = json_decode('"Thu, 14 Oct 1971 12:34:56 GMT"');

        // Assert
        //        $this->assertEquals('78;byte', json_encode((byte) 78), 'json_encode((byte) 78)');
        // $this->assertEquals((byte) 78, json_decode('78'), 'json_decode("78")');
        //  $this->assertEquals("a", json_decode('a;char'), 'json_decode("a;char")');
        //  $this->assertEquals((short) -78, json_decode('-78;short'), 'json_decode("-78;short")');
        //      $this->assertEquals('78;ushort', json_encode((unsigned short)78, 'json_encode((unsigned short)78');
        $this->assertEquals(-78, json_decode('-78'), 'json_decode("-78")');
        //     $this->assertEquals('78;uint', json_encode(78), 'json_encode(78)');
        //    $this->assertEquals((long) -78, json_decode('-78;long'), 'json_decode("-78;long")');
        //     $this->assertEquals('78;ulong', json_encode(78), 'json_encode(78)');
        //   $this->assertEquals((float) 78.5, json_decode('78.5;float'), 'json_decode("78.5;float")');
        $this->assertEquals(78.5, json_decode('78.5'), 'json_decode("78.5")');
        //assertEquals('78;decimal', json_encode(78));
        $this->assertEquals(true, json_decode('true'), 'json_decode("true")');
        $this->assertEquals(false, json_decode('false'), 'json_decode("false")');
        //    $this->assertEquals(new UUID(0x123456789abcdef0L, 0x9abcdef012345678L, '0x9abcdef012345678L'),
        //          json_decode('12345678-9abc-def0-9abc-def012345678;uuid'));

        $this->assertEquals($cal, $dt, "date");
        //assertEquals('78;date-seconds', json_encode(78));
    }
}

?>
