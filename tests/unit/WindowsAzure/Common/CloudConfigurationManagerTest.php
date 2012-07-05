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
 * @package   Tests\Unit\WindowsAzure\Common
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */

namespace Tests\Unit\WindowsAzure\Common;
use WindowsAzure\Common\CloudConfigurationManager;

/**
 * Unit tests for class CloudConfigurationManager
 *
 * @category  Microsoft
 * @package   Tests\Unit\WindowsAzure\Common
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
class CloudConfigurationManagerTest extends \PHPUnit_Framework_TestCase
{
    private $_key = 'my_connection_string';
    private $_value = 'connection string value';
    
    /**
     * @covers WindowsAzure\Common\CloudConfigurationManager::getConnectionString
     */
    public function testGetConnectionStringFromEnvironmentVariable()
    {
        // Setup
        putenv("$this->_key=$this->_value");
        
        // Test
        $actual = CloudConfigurationManager::getConnectionString($this->_key);
        
        // Assert
        $this->assertEquals($this->_value, $actual);
    }
    
    /**
     * @covers WindowsAzure\Common\CloudConfigurationManager::getConnectionString
     */
    public function testGetConnectionStringFromCached()
    {
        // Setup
        CloudConfigurationManager::setConnectionString($this->_key, $this->_value);
        
        // Test
        $actual = CloudConfigurationManager::getConnectionString($this->_key);
        
        // Assert
        $this->assertEquals($this->_value, $actual);
    }
    
    /**
     * @covers WindowsAzure\Common\CloudConfigurationManager::getConnectionString
     */
    public function testGetConnectionStringDoesNotExit()
    {        
        // Test
        $actual = CloudConfigurationManager::getConnectionString('does not exist');
        
        // Assert
        $this->assertNull($actual);
    }
    
    /**
     * @covers WindowsAzure\Common\CloudConfigurationManager::getConnectionStringCached
     */
    public function testGetConnectionStringCached()
    {
        // Setup
        CloudConfigurationManager::setConnectionString($this->_key, $this->_value);
        
        // Test
        $actual = CloudConfigurationManager::getConnectionStringCached($this->_key);
        
        // Assert
        $this->assertEquals($this->_value, $actual);
    }
    
    /**
     * @covers WindowsAzure\Common\CloudConfigurationManager::setConnectionString
     */
    public function testSetConnectionString()
    {
        // Test
        CloudConfigurationManager::setConnectionString($this->_key, $this->_value);
        
        // Assert
        $actual = CloudConfigurationManager::getConnectionStringCached($this->_key);
        $this->assertEquals($this->_value, $actual);
    }
}


