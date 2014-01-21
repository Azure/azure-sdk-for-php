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
 * @package   Tests\Unit\WindowsAzure\Blob\Models
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */

namespace Tests\Unit\WindowsAzure\Blob\Models;
use WindowsAzure\Blob\Models\CreateContainerOptions;
use WindowsAzure\Common\Internal\InvalidArgumentTypeException;

/**
 * Unit tests for class CreateContainerOptions
 *
 * @category  Microsoft
 * @package   Tests\Unit\WindowsAzure\Blob\Models
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: 0.4.0_2014-01
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
class CreateContainerOptionsTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers WindowsAzure\Blob\Models\CreateContainerOptions::getPublicAccess
     */
    public function testGetPublicAccess()
    {
        // Setup
        $properties = new CreateContainerOptions();
        $expected = 'blob';
        $properties->setPublicAccess($expected);
        
        // Test
        $actual = $properties->getPublicAccess();
        
        // Assert
        $this->assertEquals($expected, $actual);
    }
    
    /**
     * @covers WindowsAzure\Blob\Models\CreateContainerOptions::setPublicAccess
     */
    public function testSetPublicAccess()
    {
        // Setup
        $properties = new CreateContainerOptions();
        $expected = 'container';
        
        // Test
        $properties->setPublicAccess($expected);
        
        // Assert
        $actual = $properties->getPublicAccess();
        $this->assertEquals($expected, $actual);
    }
    
    /**
     * @covers WindowsAzure\Blob\Models\CreateContainerOptions::setPublicAccess
     */
    public function testSetPublicAccessInvalidValueFail()
    {
        // Setup
        $properties = new CreateContainerOptions();
        $expected = new \DateTime();
        $this->setExpectedException(get_class(new InvalidArgumentTypeException('')));
        
        // Test
        $properties->setPublicAccess($expected);
    }
    
    /**
     * @covers WindowsAzure\Blob\Models\CreateContainerOptions::setMetadata
     */
    public function testSetMetadata()
    {
        // Setup
        $container = new CreateContainerOptions();
        $expected = array('key1' => 'value1', 'key2' => 'value2');
        
        // Test
        $container->setMetadata($expected);
        
        // Assert
        $this->assertEquals($expected, $container->getMetadata());
    }
    
    /**
     * @covers WindowsAzure\Blob\Models\CreateContainerOptions::getMetadata
     */
    public function testGetMetadata()
    {
        // Setup
        $container = new CreateContainerOptions();
        $expected = array('key1' => 'value1', 'key2' => 'value2');
        $container->setMetadata($expected);
        
        // Test
        $actual = $container->getMetadata();
        
        // Assert
        $this->assertEquals($expected, $actual);
    }
    
    /**
     * @covers WindowsAzure\Blob\Models\CreateContainerOptions::addMetadata
     */
    public function testAddMetadata()
    {
        // Setup
        $container = new CreateContainerOptions();
        $key = 'key1';
        $value = 'value1';
        $expected = array($key => $value);
        
        // Test
        $container->addMetadata($key, $value);
        
        // Assert
        $this->assertEquals($expected, $container->getMetadata());
    }
}


