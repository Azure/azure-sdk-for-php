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
 * @package    Azure-sdk-for-php
 * @author     Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright  2012 Microsoft Corporation
 * @license    http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link       http://pear.php.net/package/azure-sdk-for-php
 */

use PEAR2\WindowsAzure\Services\Core\Configuration;
use PEAR2\Tests\Unit\TestResources;
use PEAR2\WindowsAzure\Resources;
use PEAR2\WindowsAzure\Core\InvalidArgumentTypeException;
use PEAR2\WindowsAzure\Services\Queue\QueueSettings;

/**
 * Unit tests for Configuration class
 *
 * @package    Azure-sdk-for-php
 * @author     Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright  2012 Microsoft Corporation
 * @license    http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version    Release: @package_version@
 * @link       http://pear.php.net/package/azure-sdk-for-php
 */
class ConfigurationTest extends PHPUnit_Framework_TestCase
{
  /**
  * @covers PEAR2\WindowsAzure\Services\Core\Configuration::GetInstance
  */
  public function testGetInstance()
  {
    $config = new Configuration();
    
    $this->assertTrue(is_array($config->getProperties()));
  }
    
  /**
  * @covers PEAR2\WindowsAzure\Services\Core\Configuration::GetProperties
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
  * @covers PEAR2\WindowsAzure\Services\Core\Configuration::GetProperty
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
  * @covers PEAR2\WindowsAzure\Services\Core\Configuration::SetProperty
  */
  public function testSetPropertyWithNonStringKeyFail()
  {
    $invalidKey = 1;
    $this->setExpectedException(get_class(new InvalidArgumentTypeException('')), 
            Resources::INVALID_TYPE_MSG . gettype(''));
    $config = $this->config = new Configuration();
    $config->setProperty($invalidKey, TestResources::VALUE1);
  }
  
  /**
  * @covers PEAR2\WindowsAzure\Services\Core\Configuration::Create
  */
  public function testCreate()
  {
    $config = Configuration::GetInstance();
    $config->setProperty(QueueSettings::ACCOUNT_KEY, TestResources::KEY1);
    $config->setProperty(QueueSettings::ACCOUNT_NAME, TestResources::ACCOUNT_NAME);
    $config->setProperty(QueueSettings::URI, TestResources::QUEUE_URI);
    $queueWrapper = $config->create(Resources::QUEUE_TYPE_NAME);
    
    $this->assertInstanceOf('PEAR2\\WindowsAzure\\Services\\Queue\\' . Resources::QUEUE_TYPE_NAME, $queueWrapper);
  }
  
  /**
  * @covers PEAR2\WindowsAzure\Services\Core\Configuration::Create
  */
  public function testCreateWithInvalidTypeFail()
  {
    $invalidType = gettype('');
    $this->setExpectedException(get_class(new InvalidArgumentTypeException('')), Resources::INVALID_TYPE_MSG . Resources::QUEUE_TYPE_NAME);
    $config = $this->config = new Configuration();
    $config->setProperty(QueueSettings::ACCOUNT_KEY, TestResources::KEY1);
    $config->setProperty(QueueSettings::ACCOUNT_NAME, TestResources::ACCOUNT_NAME);
    $config->setProperty(QueueSettings::URI, TestResources::QUEUE_URI);
    $config->create($invalidType);
  }
}

?>
