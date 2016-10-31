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

namespace Tests\unit\WindowsAzure\Common\Internal;

use WindowsAzure\Common\Internal\ConnectionStringSource;

/**
 * Unit tests for class ConnectionStringSource.
 *
 * @category  Microsoft
 *
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 *
 * @version   Release: 0.5.0_2016-11
 *
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
class ConnectionStringSourceTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $property = new \ReflectionProperty('WindowsAzure\Common\Internal\ConnectionStringSource', '_isInitialized');
        $property->setAccessible(true);
        $property->setValue(null);
    }

    /**
     * @covers \WindowsAzure\Common\Internal\ConnectionStringSource::environmentSource
     */
    public function testEnvironmentSource()
    {
        // Setup
        $key = 'key';
        $value = 'value';
        putenv("$key=$value");

        // Test
        $actual = ConnectionStringSource::environmentSource($key);

        // Assert
        $this->assertEquals($value, $actual);

        // Clean
        putenv($key);
    }

    /**
     * @covers \WindowsAzure\Common\Internal\ConnectionStringSource::getDefaultSources
     * @covers \WindowsAzure\Common\Internal\ConnectionStringSource::_init
     */
    public function testGetDefaultSources()
    {
        // Setup
        $expectedKeys = [ConnectionStringSource::ENVIRONMENT_SOURCE];

        // Test
        $actual = ConnectionStringSource::getDefaultSources();

        // Assert
        $keys = array_keys($actual);
        $this->assertEquals(count($expectedKeys), count($keys));
        for ($index = 0; $index < count($expectedKeys); ++$index) {
            $this->assertEquals($expectedKeys[$index], $keys[$index]);
        }
    }
}
