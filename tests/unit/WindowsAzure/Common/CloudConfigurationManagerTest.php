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

namespace Tests\unit\WindowsAzure\Common;

use WindowsAzure\Common\CloudConfigurationManager;
use WindowsAzure\Common\Internal\ConnectionStringSource;

/**
 * Unit tests for class CloudConfigurationManager.
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
class CloudConfigurationManagerTest extends \PHPUnit_Framework_TestCase
{
    private $_key = 'my_connection_string';
    private $_value = 'connection string value';

    public function setUp()
    {
        $isInitialized = new \ReflectionProperty('WindowsAzure\Common\CloudConfigurationManager', '_isInitialized');
        $isInitialized->setAccessible(true);
        $isInitialized->setValue(false);

        $sources = new \ReflectionProperty('WindowsAzure\Common\CloudConfigurationManager', '_sources');
        $sources->setAccessible(true);
        $sources->setValue([]);
    }

    /**
     * @covers \WindowsAzure\Common\CloudConfigurationManager::getConnectionString
     * @covers \WindowsAzure\Common\CloudConfigurationManager::_init
     */
    public function testGetConnectionStringFromEnvironmentVariable()
    {
        // Setup
        putenv("$this->_key=$this->_value");

        // Test
        $actual = CloudConfigurationManager::getConnectionString($this->_key);

        // Assert
        $this->assertEquals($this->_value, $actual);

        // Clean
        putenv($this->_key);
    }

    /**
     * @covers \WindowsAzure\Common\CloudConfigurationManager::getConnectionString
     */
    public function testGetConnectionStringDoesNotExist()
    {
        // Test
        $actual = CloudConfigurationManager::getConnectionString('does not exist');

        // Assert
        $this->assertEmpty($actual);
    }

    /**
     * @covers \WindowsAzure\Common\CloudConfigurationManager::registerSource
     * @covers \WindowsAzure\Common\CloudConfigurationManager::_init
     */
    public function testRegisterSource()
    {
        // Setup
        $expectedKey = $this->_key;
        $expectedValue = $this->_value.'extravalue';

        // Test
        CloudConfigurationManager::registerSource(
            'my_source',
            function ($key) use ($expectedKey, $expectedValue) {
                if ($key == $expectedKey) {
                    return $expectedValue;
                }
                return null;
            }
        );

        // Assert
        $actual = CloudConfigurationManager::getConnectionString($expectedKey);
        $this->assertEquals($expectedValue, $actual);
    }

    /**
     * @covers \WindowsAzure\Common\CloudConfigurationManager::registerSource
     * @covers \WindowsAzure\Common\CloudConfigurationManager::_init
     */
    public function testRegisterSourceWithPrepend()
    {
        // Setup
        $expectedKey = $this->_key;
        $expectedValue = $this->_value.'extravalue2';
        putenv("$this->_key=wrongvalue");

        // Test
        CloudConfigurationManager::registerSource(
            'my_source',
            function ($key) use ($expectedKey, $expectedValue) {
                if ($key == $expectedKey) {
                    return $expectedValue;
                }
                return null;
            },
            true
        );

        // Assert
        $actual = CloudConfigurationManager::getConnectionString($expectedKey);
        $this->assertEquals($expectedValue, $actual);

        // Clean
        putenv($this->_key);
    }

    /**
     * @covers \WindowsAzure\Common\CloudConfigurationManager::unregisterSource
     * @covers \WindowsAzure\Common\CloudConfigurationManager::_init
     */
    public function testUnRegisterSource()
    {
        // Setup
        $expectedKey = $this->_key;
        $expectedValue = $this->_value.'extravalue3';
        $name = 'my_source';
        CloudConfigurationManager::registerSource(
            $name,
            function ($key) use ($expectedKey, $expectedValue) {
                if ($key == $expectedKey) {
                    return $expectedValue;
                }
                return null;
            }
        );

        // Test
        $callback = CloudConfigurationManager::unregisterSource($name);

        // Assert
        $actual = CloudConfigurationManager::getConnectionString($expectedKey);
        $this->assertEmpty($actual);
        $this->assertNotNull($callback);
    }

    /**
     * @covers \WindowsAzure\Common\CloudConfigurationManager::registerSource
     * @covers \WindowsAzure\Common\CloudConfigurationManager::_init
     */
    public function testRegisterSourceWithDefaultSource()
    {
        // Setup
        $expectedKey = $this->_key;
        $expectedValue = $this->_value.'extravalue5';
        CloudConfigurationManager::unregisterSource(ConnectionStringSource::ENVIRONMENT_SOURCE);
        putenv("$expectedKey=$expectedValue");

        // Test
        CloudConfigurationManager::registerSource(ConnectionStringSource::ENVIRONMENT_SOURCE);

        // Assert
        $actual = CloudConfigurationManager::getConnectionString($expectedKey);
        $this->assertEquals($expectedValue, $actual);

        // Clean
        putenv($expectedKey);
    }

    /**
     * @covers \WindowsAzure\Common\CloudConfigurationManager::unregisterSource
     * @covers \WindowsAzure\Common\CloudConfigurationManager::_init
     */
    public function testUnRegisterSourceWithDefaultSource()
    {
        // Setup
        $expectedKey = $this->_key;
        $expectedValue = $this->_value.'extravalue4';
        $name = 'my_source';
        CloudConfigurationManager::registerSource(
            $name,
            function ($key) use ($expectedKey, $expectedValue) {
                if ($key == $expectedKey) {
                    return $expectedValue;
                }
                return null;
            }
        );

        // Test
        $callback = CloudConfigurationManager::unregisterSource(ConnectionStringSource::ENVIRONMENT_SOURCE);

        // Assert
        $actual = CloudConfigurationManager::getConnectionString($expectedKey);
        $this->assertEquals($expectedValue, $actual);
        $this->assertNotNull($callback);
    }
}
