<?php

/**
 * Implementation of class ConfigurationTest.
 *
 *
 * PHP version 5
 *
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
 * @package    Tests\Unit\WindowsAzure\Common\Internal
 * @author     Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright  2012 Microsoft Corporation
 * @license    http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link       http://pear.php.net/package/azure-sdk-for-php
 */

namespace Tests\Unit\WindowsAzure\Common\Internal;
use WindowsAzure\Common\Configuration;
use Tests\Framework\TestResources;
use WindowsAzure\Common\Internal\Resources;
use WindowsAzure\Common\Internal\InvalidArgumentTypeException;
use WindowsAzure\Queue\QueueSettings;

/**
 * Unit tests for Configuration class
 *
 * @package    Tests\Unit\WindowsAzure\Common\Internal
 * @author     Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright  2012 Microsoft Corporation
 * @license    http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version    Release: @package_version@
 * @link       http://pear.php.net/package/azure-sdk-for-php
 */
class ConfigurationTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers WindowsAzure\Common\Configuration::__construct
     */
    public function test__construct()
    {
        // Test
        $config = new Configuration();
        
        // Assert
        $actual = $config->getProperties();
        $this->assertTrue(empty($actual));
    }
    
    /**
    * @covers WindowsAzure\Common\Configuration::getInstance
    */
    public function testGetInstance()
    {
        $config = Configuration::getInstance();

        $this->assertTrue(is_array($config->getProperties()));
    }

    /**
    * @covers WindowsAzure\Common\Configuration::getProperties
    */
    public function testGetProperties()
    {
        $config = new Configuration();
        $config->setProperty(TestResources::KEY1, TestResources::VALUE1);
        $config->setProperty(TestResources::KEY2, TestResources::VALUE2);

        $this->assertTrue(is_array($config->getProperties()));
        $this->assertEquals(2, count($config->getProperties()));
    }

    /**
    * @covers WindowsAzure\Common\Configuration::getProperty
    */
    public function testGetProperty()
    {
        $config = $this->config = new Configuration();
        $config->setProperty(TestResources::KEY1, TestResources::VALUE1);
        $config->setProperty(TestResources::KEY2, TestResources::VALUE2);

        $this->assertEquals(TestResources::VALUE1, $config->getProperty(TestResources::KEY1));
        $this->assertEquals(TestResources::VALUE2, $config->getProperty(TestResources::KEY2));
    }

    /**
    * @covers WindowsAzure\Common\Configuration::setProperty
    */
    public function testSetProperty()
    {
        // Setup
        $key = 'prop_key';
        $value = 'prop_value';
        $config = new Configuration();
        
        // Test
        $config->setProperty($key, $value);
        
        // Assert
        $this->assertEquals($value, $config->getProperty($key));
    }

    /**
    * @covers WindowsAzure\Common\Configuration::setProperty
    */
    public function testSetPropertyWithNonStringKeyFail()
    {
        $invalidKey = new \DateTime();
        $this->setExpectedException(get_class(new InvalidArgumentTypeException('')));
        $config = $this->config = new Configuration();
        $config->setProperty($invalidKey, TestResources::VALUE1);
    }

    /**
    * @covers WindowsAzure\Common\Configuration::create
    * @covers WindowsAzure\Common\Configuration::_useStorageEmulatorConfig
    */
    public function testCreate()
    {
        $config = new Configuration();
        $config->setProperty(QueueSettings::ACCOUNT_KEY, TestResources::KEY1);
        $config->setProperty(QueueSettings::ACCOUNT_NAME, TestResources::ACCOUNT_NAME);
        $config->setProperty(QueueSettings::URI, 'http://' . TestResources::ACCOUNT_NAME . TestResources::QUEUE_URI);
        $queueRestProxy = $config->create(Resources::QUEUE_TYPE_NAME);

        $this->assertInstanceOf('WindowsAzure\Queue\Internal\IQueue', $queueRestProxy);
    }

    /**
    * @covers WindowsAzure\Common\Configuration::create
    * @covers WindowsAzure\Common\Configuration::_useStorageEmulatorConfig
    */
    public function testCreateWithInvalidTypeFail()
    {
        $invalidType = gettype('');
        $this->setExpectedException(get_class(new InvalidArgumentTypeException('')));
        $config = $this->config = new Configuration();
        $config->setProperty(QueueSettings::ACCOUNT_KEY, TestResources::KEY1);
        $config->setProperty(QueueSettings::ACCOUNT_NAME, TestResources::ACCOUNT_NAME);
        $config->setProperty(QueueSettings::URI, TestResources::QUEUE_URI);
        $config->create($invalidType);
    }
    
    /**
     * @covers WindowsAzure\Common\Configuration::isEmulated
     */
    public function testIsEmulated()
    {
        // Test
        $actual = Configuration::isEmulated();
        
        // Assert
        $this->assertTrue(isset($actual));
    }
}

?>
