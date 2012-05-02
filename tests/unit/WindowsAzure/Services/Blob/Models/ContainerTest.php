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
 * @package   Tests\Unit\WindowsAzure\Services\Blob\Models
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */

namespace Tests\Unit\WindowsAzure\Services\Blob\Models;
use WindowsAzure\Services\Blob\Models\Container;
use Tests\Framework\TestResources;
use WindowsAzure\Services\Blob\Models\ContainerProperties;
use WindowsAzure\Core\WindowsAzureUtilities;

/**
 * Unit tests for class Container
 *
 * @category  Microsoft
 * @package   Tests\Unit\WindowsAzure\Services\Blob\Models
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
class ContainerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers WindowsAzure\Services\Blob\Models\Container::setName
     */
    public function testSetName()
    {
        // Setup
        $container = new Container();
        $expected = TestResources::QUEUE1_NAME;
        
        // Test
        $container->setName($expected);
        
        // Assert
        $this->assertEquals($expected, $container->getName());
    }
    
    /**
     * @covers WindowsAzure\Services\Blob\Models\Container::getName
     */
    public function testGetName()
    {
        // Setup
        $container = new Container();
        $expected = TestResources::QUEUE1_NAME;
        $container->setName($expected);
        
        // Test
        $actual = $container->getName();
        
        // Assert
        $this->assertEquals($expected, $actual);
    }
    
    /**
     * @covers WindowsAzure\Services\Blob\Models\Container::setUrl
     */
    public function testSetUrl()
    {
        // Setup
        $container = new Container();
        $expected = TestResources::QUEUE1_NAME;
        
        // Test
        $container->setUrl($expected);
        
        // Assert
        $this->assertEquals($expected, $container->getUrl());
    }
    
    /**
     * @covers WindowsAzure\Services\Blob\Models\Container::getUrl
     */
    public function testGetUrl()
    {
        // Setup
        $container = new Container();
        $expected = TestResources::QUEUE_URI;
        $container->setUrl($expected);
        
        // Test
        $actual = $container->getUrl();
        
        // Assert
        $this->assertEquals($expected, $actual);
    }
    
    /**
     * @covers WindowsAzure\Services\Blob\Models\Container::setMetadata
     */
    public function testSetMetadata()
    {
        // Setup
        $container = new Container();
        $expected = array('key1' => 'value1', 'key2' => 'value2');
        
        // Test
        $container->setMetadata($expected);
        
        // Assert
        $this->assertEquals($expected, $container->getMetadata());
    }
    
    /**
     * @covers WindowsAzure\Services\Blob\Models\Container::getMetadata
     */
    public function testGetMetadata()
    {
        // Setup
        $container = new Container();
        $expected = array('key1' => 'value1', 'key2' => 'value2');
        $container->setMetadata($expected);
        
        // Test
        $actual = $container->getMetadata();
        
        // Assert
        $this->assertEquals($expected, $actual);
    }
    
    /**
     * @covers WindowsAzure\Services\Blob\Models\Container::setProperties
     */
    public function testSetProperties()
    {
        // Setup
        $date = WindowsAzureUtilities::rfc1123ToDateTime('Wed, 12 Aug 2009 20:39:39 GMT');
        $container = new Container();
        $expected = new ContainerProperties();
        $expected->setEtag('0x8CACB9BD7C1EEEC');
        $expected->setLastModified($date);
        
        // Test
        $container->setProperties($expected);
        
        // Assert
        $this->assertEquals($expected, $container->getProperties());
    }
    
    /**
     * @covers WindowsAzure\Services\Blob\Models\Container::getProperties
     */
    public function testGetProperties()
    {
        // Setup
        $date = WindowsAzureUtilities::rfc1123ToDateTime('Wed, 12 Aug 2009 20:39:39 GMT');
        $container = new Container();
        $expected = new ContainerProperties();
        $expected->setEtag('0x8CACB9BD7C1EEEC');
        $expected->setLastModified($date);
        $container->setProperties($expected);
        
        // Test
        $actual = $container->getProperties();
        
        // Assert
        $this->assertEquals($expected, $actual);
    }
}

?>
