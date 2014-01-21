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
use WindowsAzure\Blob\Models\GetBlobPropertiesResult;
use WindowsAzure\Blob\Models\BlobProperties;

/**
 * Unit tests for class GetBlobPropertiesResult
 *
 * @category  Microsoft
 * @package   Tests\Unit\WindowsAzure\Blob\Models
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: 0.4.0_2014-01
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
class GetBlobPropertiesResultTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers WindowsAzure\Blob\Models\GetBlobPropertiesResult::setMetadata
     */
    public function testSetMetadata()
    {
        // Setup
        $properties = new GetBlobPropertiesResult();
        $expected = array('key1' => 'value1', 'key2' => 'value2');
        
        // Test
        $properties->setMetadata($expected);
        
        // Assert
        $this->assertEquals($expected, $properties->getMetadata());
    }
    
    /**
     * @covers WindowsAzure\Blob\Models\GetBlobPropertiesResult::getMetadata
     */
    public function testGetMetadata()
    {
        // Setup
        $properties = new GetBlobPropertiesResult();
        $expected = array('key1' => 'value1', 'key2' => 'value2');
        $properties->setMetadata($expected);
        
        // Test
        $actual = $properties->getMetadata();
        
        // Assert
        $this->assertEquals($expected, $actual);
    }
    
    /**
     * @covers WindowsAzure\Blob\Models\GetBlobPropertiesResult::setProperties
     */
    public function testSetProperties()
    {
        // Setup
        $properties = new GetBlobPropertiesResult();
        $expected = new BlobProperties();
        
        // Test
        $properties->setProperties($expected);
        
        // Assert
        $this->assertEquals($expected, $properties->getProperties());
    }
    
    /**
     * @covers WindowsAzure\Blob\Models\GetBlobPropertiesResult::getProperties
     */
    public function testGetProperties()
    {
        // Setup
        $properties = new GetBlobPropertiesResult();
        $expected = new BlobProperties();
        $properties->setProperties($expected);
        
        // Test
        $actual = $properties->getProperties();
        
        // Assert
        $this->assertEquals($expected, $actual);
    }
}


