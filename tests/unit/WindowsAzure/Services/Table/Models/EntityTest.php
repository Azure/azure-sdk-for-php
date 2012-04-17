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
 * @package   Tests\Unit\WindowsAzure\Services\Table\Models
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
namespace Tests\Unit\WindowsAzure\Services\Table\Models;
use WindowsAzure\Services\Table\Models\Entity;
use WindowsAzure\Services\Table\Models\Property;
use WindowsAzure\Services\Table\Models\EdmType;
use WindowsAzure\Utilities;

/**
 * Unit tests for class Entity
 *
 * @category  Microsoft
 * @package   Tests\Unit\WindowsAzure\Services\Table\Models
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
class EntityTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers WindowsAzure\Services\Table\Models\Entity::getPropertyValue
     */
    public function testGetPropertyValue()
    {
        // Setup
        $entity = new Entity();
        
        // Test
        $actual = $entity->getPropertyValue('dummy');
        
        // Assert
        $this->assertNull($actual);
    }
    
    /**
     * @covers WindowsAzure\Services\Table\Models\Entity::setEtag
     * @covers WindowsAzure\Services\Table\Models\Entity::getEtag
     */
    public function testSetEtag()
    {
        // Setup
        $expected = '0x8CAFB82EFF70C46';
        $entity = new Entity();
        $entity->setEtag($expected);
        
        // Test
        $entity->setEtag($expected);
        
        // Assert
        $this->assertEquals($expected, $entity->getEtag());
    }
    
    /**
     * @covers WindowsAzure\Services\Table\Models\Entity::setPartitionKey
     * @covers WindowsAzure\Services\Table\Models\Entity::getPartitionKey
     */
    public function testSetPartitionKey()
    {
        // Setup
        $entity = new Entity();
        $expected = '1234';
        
        // Test
        $entity->setPartitionKey($expected);
        
        // Assert
        $this->assertEquals($expected, $entity->getPartitionKey());
    }
    
    /**
     * @covers WindowsAzure\Services\Table\Models\Entity::setRowKey
     * @covers WindowsAzure\Services\Table\Models\Entity::getRowKey
     */
    public function testSetRowKey()
    {
        // Setup
        $entity = new Entity();
        $expected = '1234';
        
        // Test
        $entity->setRowKey($expected);
        
        // Assert
        $this->assertEquals($expected, $entity->getRowKey());
    }
    
    /**
     * @covers WindowsAzure\Services\Table\Models\Entity::setTimestamp
     * @covers WindowsAzure\Services\Table\Models\Entity::getTimestamp
     */
    public function testSetTimestamp()
    {
        // Setup
        $entity = new Entity();
        $expected = Utilities::convertToDateTime(Utilities::isoDate());
        
        // Test
        $entity->setTimestamp($expected);
        
        // Assert
        $this->assertEquals($expected, $entity->getTimestamp());
    }
    
    /**
     * @covers WindowsAzure\Services\Table\Models\Entity::setProperties
     * @covers WindowsAzure\Services\Table\Models\Entity::getProperties
     * @covers WindowsAzure\Services\Table\Models\Entity::_validateProperties
     */
    public function testSetProperties()
    {
        // Setup
        $entity = new Entity();
        $expected = array('name' => new Property());
        
        // Test
        $entity->setProperties($expected);
        
        // Assert
        $this->assertEquals($expected, $entity->getProperties());
    }
    
    /**
     * @covers WindowsAzure\Services\Table\Models\Entity::getProperty
     * @covers WindowsAzure\Services\Table\Models\Entity::setProperty
     */
    public function testSetProperty()
    {
        // Setup
        $entity = new Entity();
        $expected = new Property();
        $name = 'test';
        
        // Test
        $entity->setProperty($name, $expected);
        
        // Assert
        $this->assertEquals($expected, $entity->getProperty($name));
    }
    
    /**
     * @covers WindowsAzure\Services\Table\Models\Entity::addProperty
     */
    public function testAddProperty()
    {
        // Setup
        $entity = new Entity();
        $name = 'test';
        $expected = new Property();
        $edmType = EdmType::STRING;
        $value = '01231232290234210';
        $expected->setEdmType($edmType);
        $expected->setValue($value);
        
        // Test
        $entity->addProperty($name, $edmType, $value);
        
        // Assert
        $this->assertEquals($expected, $entity->getProperty($name));
    }
    
    /**
     * @covers WindowsAzure\Services\Table\Models\Entity::isValid
     */
    public function testIsValid()
    {
        // Setup
        $entity = new Entity();
        $entity->setPartitionKey('123');
        $entity->setRowKey('456');
        $entity->setTimestamp('2008-10-01T15:26:13Z');
        
        // Assert
        $actual = $entity->isValid();
        
        // Assert
        $this->assertTrue($actual);
    }
    
    /**
     * @covers WindowsAzure\Services\Table\Models\Entity::isValid
     */
    public function testIsValidWithInvalid()
    {
        // Setup
        $entity = new Entity();
        
        // Assert
        $actual = $entity->isValid();
        
        // Assert
        $this->assertFalse($actual);
    }
}

?>
