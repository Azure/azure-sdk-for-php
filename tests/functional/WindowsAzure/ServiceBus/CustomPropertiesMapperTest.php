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

namespace Tests\functional\WindowsAzure\ServiceBus;

use Tests\Framework\ServiceBusRestProxyTestBase;

class CustomPropertiesMapperTest extends ServiceBusRestProxyTestBase
{
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
        $cal = 'Thu, 14 Oct 1971 12:34:56 GMT';

        // Assert
        $this->assertEquals('"a"', json_encode('a'), 'json_encode("a")');
        $this->assertEquals('-78', json_encode(-78), 'json_encode(-78)');
        $this->assertEquals('78.5', json_encode(78.5), 'json_encode(78.5)');
        $this->assertEquals('true', json_encode(true), 'json_encode(true)');
        $this->assertEquals('false', json_encode(false), 'json_encode(false)');
        $this->assertEquals('"Thu, 14 Oct 1971 12:34:56 GMT"', json_encode($cal), 'json_encode($cal)');
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
        $cal = 'Thu, 14 Oct 1971 12:34:56 GMT';

        // Act
        $dt = json_decode('"Thu, 14 Oct 1971 12:34:56 GMT"');

        // Assert
        $this->assertEquals(-78, json_decode('-78'), 'json_decode("-78")');
        $this->assertEquals(78.5, json_decode('78.5'), 'json_decode("78.5")');
        $this->assertEquals(true, json_decode('true'), 'json_decode("true")');
        $this->assertEquals(false, json_decode('false'), 'json_decode("false")');
        $this->assertEquals($cal, $dt, 'date');
    }
}
