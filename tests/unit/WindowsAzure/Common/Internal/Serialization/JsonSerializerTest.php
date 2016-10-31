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
 * @copyright Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 *
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */

namespace Tests\unit\WindowsAzure\Common\Internal\Serialization;

use Tests\Framework\TestResources;
use WindowsAzure\Common\Internal\Serialization\JsonSerializer;


/**
 * Unit tests for class XmlSerializer.
 *
 * @category  Microsoft
 *
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 *
 * @version   Release: 0.5.0_2016-11
 *
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
class JsonSerializerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers \WindowsAzure\Common\Internal\Serialization\JsonSerializer::objectSerialize
     */
    public function testObjectSerialize()
    {
        // Setup
        $testData = TestResources::getSimpleJson();
        $rootName = 'testRoot';
        $expected = "{\"{$rootName}\":{$testData['jsonObject']}}";

        // Test
        $actual = JsonSerializer::objectSerialize($testData['dataObject'], $rootName);

        // Assert
        $this->assertEquals($expected, $actual);
    }

    /**
     * @covers \WindowsAzure\Common\Internal\Serialization\JsonSerializer::unserialize
     */
    public function testUnserializeArray()
    {
        // Setup
        $jsonSerializer = new JsonSerializer();
        $testData = TestResources::getSimpleJson();
        $expected = $testData['dataArray'];

        // Test
        $actual = $jsonSerializer->unserialize($testData['jsonArray']);

        // Assert
        $this->assertEquals($expected, $actual);
    }

    /**
     * @covers \WindowsAzure\Common\Internal\Serialization\JsonSerializer::unserialize
     */
    public function testUnserializeObject()
    {
        // Setup
        $jsonSerializer = new JsonSerializer();
        $testData = TestResources::getSimpleJson();
        $expected = $testData['dataObject'];

        // Test
        $actual = $jsonSerializer->unserialize($testData['jsonObject']);

        // Assert
        $this->assertEquals($expected, $actual);
    }

    /**
     * @covers \WindowsAzure\Common\Internal\Serialization\JsonSerializer::unserialize
     */
    public function testUnserializeEmptyString()
    {
        // Setup
        $jsonSerializer = new JsonSerializer();
        $testData = '';
        $expected = null;

        // Test
        $actual = $jsonSerializer->unserialize($testData);

        // Assert
        $this->assertEquals($expected, $actual);
    }

    /**
     * @covers \WindowsAzure\Common\Internal\Serialization\JsonSerializer::unserialize
     */
    public function testUnserializeInvalidString()
    {
        // Setup
        $jsonSerializer = new JsonSerializer();
        $testData = '{]{{test]';
        $expected = null;

        // Test
        $actual = $jsonSerializer->unserialize($testData);

        // Assert
        $this->assertEquals($expected, $actual);
    }

    /**
     * @covers \WindowsAzure\Common\Internal\Serialization\JsonSerializer::serialize
     */
    public function testSerialize()
    {
        // Setup
        $jsonSerializer = new JsonSerializer();
        $testData = TestResources::getSimpleJson();
        $expected = $testData['jsonArray'];

        // Test
        $actual = $jsonSerializer->serialize($testData['dataArray']);

        // Assert
        $this->assertEquals($expected, $actual);
    }
}
