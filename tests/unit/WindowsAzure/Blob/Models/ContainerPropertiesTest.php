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
use WindowsAzure\Blob\Models\ContainerProperties;

/**
 * Unit tests for class ContainerProperties
 *
 * @category  Microsoft
 * @package   Tests\Unit\WindowsAzure\Blob\Models
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: 0.4.0_2014-01
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
class ContainerPropertiesTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers WindowsAzure\Blob\Models\ContainerProperties::getETag
     */
    public function testGetETag()
    {
        // Setup
        $properties = new ContainerProperties();
        $expected = '0x8CACB9BD7C6B1B2';
        $properties->setETag($expected);
        
        // Test
        $actual = $properties->getETag();
        
        // Assert
        $this->assertEquals($expected, $actual);
    }
    
    /**
     * @covers WindowsAzure\Blob\Models\ContainerProperties::setETag
     */
    public function testSetETag()
    {
        // Setup
        $properties = new ContainerProperties();
        $expected = '0x8CACB9BD7C6B1B2';
        
        // Test
        $properties->setETag($expected);
        
        // Assert
        $actual = $properties->getETag();
        $this->assertEquals($expected, $actual);
    }
    
    /**
     * @covers WindowsAzure\Blob\Models\ContainerProperties::getLastModified
     */
    public function testGetLastModified()
    {
        // Setup
        $properties = new ContainerProperties();
        $expected = 'Fri, 09 Oct 2009 21:04:30 GMT';
        $properties->setLastModified($expected);
        
        // Test
        $actual = $properties->getLastModified();
        
        // Assert
        $this->assertEquals($expected, $actual);
    }
    
    /**
     * @covers WindowsAzure\Blob\Models\ContainerProperties::setLastModified
     */
    public function testSetLastModified()
    {
        // Setup
        $properties = new ContainerProperties();
        $expected = 'Fri, 09 Oct 2009 21:04:30 GMT';
        
        // Test
        $properties->setLastModified($expected);
        
        // Assert
        $actual = $properties->getLastModified();
        $this->assertEquals($expected, $actual);
    }
}


