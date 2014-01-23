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
use WindowsAzure\Blob\Models\ListContainersResult;
use Tests\Framework\TestResources;
use WindowsAzure\Common\Internal\Utilities;

/**
 * Unit tests for class ListContainersResult
 *
 * @category  Microsoft
 * @package   Tests\Unit\WindowsAzure\Blob\Models
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: 0.4.0_2014-01
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
class ListContainersResultTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers WindowsAzure\Blob\Models\ListContainersResult::create 
     */
    public function testCreateWithEmpty()
    {
        // Setup
        $sample = TestResources::listContainersEmpty();
        
        // Test
        $actual = ListContainersResult::create($sample);
        
        // Assert
        $this->assertCount(0, $actual->getContainers());
        $this->assertTrue(empty($sample['NextMarker']));
    }
    
    /**
     * @covers WindowsAzure\Blob\Models\ListContainersResult::create 
     */
    public function testCreateWithOneEntry()
    {
        // Setup
        $sample = TestResources::listContainersOneEntry();
        
        // Test
        $actual = ListContainersResult::create($sample);
        
        // Assert
        $containers = $actual->getContainers();
        $this->assertCount(1, $containers);
        $this->assertEquals($sample['Containers']['Container']['Name'], $containers[0]->getName());
        $this->assertEquals($sample['Containers']['Container']['Url'], $containers[0]->getUrl());
        $this->assertEquals(
         Utilities::rfc1123ToDateTime($sample['Containers']['Container']['Properties']['Last-Modified']),
        $containers[0]->getProperties()->getLastModified());
        $this->assertEquals(
            $sample['Containers']['Container']['Properties']['Etag'],
            $containers[0]->getProperties()->getETag());
        $this->assertEquals($sample['Marker'], $actual->getMarker());
        $this->assertEquals($sample['MaxResults'], $actual->getMaxResults());
        $this->assertEquals($sample['NextMarker'], $actual->getNextMarker());
    }
    
    /**
     * @covers WindowsAzure\Blob\Models\ListContainersResult::create 
     */
    public function testCreateWithMultipleEntries()
    {
        // Setup
        $sample = TestResources::listContainersMultipleEntries();
        
        // Test
        $actual = ListContainersResult::create($sample);
        
        // Assert
        $containers = $actual->getContainers();
        $this->assertCount(2, $containers);
        $this->assertEquals($sample['Containers']['Container'][0]['Name'], $containers[0]->getName());
        $this->assertEquals($sample['Containers']['Container'][0]['Url'], $containers[0]->getUrl());
        $this->assertEquals(
            Utilities::rfc1123ToDateTime($sample['Containers']['Container'][0]['Properties']['Last-Modified']), 
            $containers[0]->getProperties()->getLastModified());
        $this->assertEquals(
            $sample['Containers']['Container'][0]['Properties']['Etag'],
            $containers[0]->getProperties()->getETag());
        $this->assertEquals($sample['Containers']['Container'][1]['Name'], $containers[1]->getName());
        $this->assertEquals($sample['Containers']['Container'][1]['Url'], $containers[1]->getUrl());
        $this->assertEquals(
            Utilities::rfc1123ToDateTime($sample['Containers']['Container'][1]['Properties']['Last-Modified']), 
            $containers[1]->getProperties()->getLastModified());
        $this->assertEquals(
            $sample['Containers']['Container'][1]['Properties']['Etag'],
            $containers[1]->getProperties()->getETag());
        $this->assertEquals($sample['MaxResults'], $actual->getMaxResults());
        $this->assertEquals($sample['NextMarker'], $actual->getNextMarker());
        
        return $actual;
    }
    
    /**
     * @covers WindowsAzure\Blob\Models\ListContainersResult::getContainers
     * @depends testCreateWithMultipleEntries
     */
    public function testGetContainers($result)
    {
        // Test
        $actual = $result->getContainers();
        
        // Assert
        $this->assertCount(2, $actual);
    }
    
    /**
     * @covers WindowsAzure\Blob\Models\ListContainersResult::setContainers
     * @depends testCreateWithMultipleEntries
     */
    public function testSetContainers($result)
    {
        // Setup
        $sample = new ListContainersResult();
        $expected = $result->getContainers();
        
        // Test
        $sample->setContainers($expected);
        
        // Assert
        $this->assertEquals($expected, $sample->getContainers());
        $expected[0]->setName('test');
        $this->assertNotEquals($expected, $sample->getContainers());
    }
    
    /**
     * @covers WindowsAzure\Blob\Models\ListContainersResult::setPrefix
     */
    public function testSetPrefix()
    {
        // Setup
        $result = new ListContainersResult();
        $expected = 'myprefix';
        
        // Test
        $result->setPrefix($expected);
        
        // Assert
        $this->assertEquals($expected, $result->getPrefix());
    }
    
    /**
     * @covers WindowsAzure\Blob\Models\ListContainersResult::getPrefix
     */
    public function testGetPrefix()
    {
        // Setup
        $result = new ListContainersResult();
        $expected = 'myprefix';
        $result->setPrefix($expected);
        
        // Test
        $actual = $result->getPrefix();
        
        // Assert
        $this->assertEquals($expected, $actual);
    }
    
    /**
     * @covers WindowsAzure\Blob\Models\ListContainersResult::setNextMarker
     */
    public function testSetNextMarker()
    {
        // Setup
        $result = new ListContainersResult();
        $expected = 'mymarker';
        
        // Test
        $result->setNextMarker($expected);
        
        // Assert
        $this->assertEquals($expected, $result->getNextMarker());
    }
    
    /**
     * @covers WindowsAzure\Blob\Models\ListContainersResult::getNextMarker
     */
    public function testGetNextMarker()
    {
        // Setup
        $result = new ListContainersResult();
        $expected = 'mymarker';
        $result->setNextMarker($expected);
        
        // Test
        $actual = $result->getNextMarker();
        
        // Assert
        $this->assertEquals($expected, $actual);
    }
    
    /**
     * @covers WindowsAzure\Blob\Models\ListContainersResult::setMarker
     */
    public function testSetMarker()
    {
        // Setup
        $result = new ListContainersResult();
        $expected = 'mymarker';
        
        // Test
        $result->setMarker($expected);
        
        // Assert
        $this->assertEquals($expected, $result->getMarker());
    }
    
    /**
     * @covers WindowsAzure\Blob\Models\ListContainersResult::getMarker
     */
    public function testGetMarker()
    {
        // Setup
        $result = new ListContainersResult();
        $expected = 'mymarker';
        $result->setMarker($expected);
        
        // Test
        $actual = $result->getMarker();
        
        // Assert
        $this->assertEquals($expected, $actual);
    }
    
    /**
     * @covers WindowsAzure\Blob\Models\ListContainersResult::setMaxResults
     */
    public function testSetMaxResults()
    {
        // Setup
        $result = new ListContainersResult();
        $expected = '3';
        
        // Test
        $result->setMaxResults($expected);
        
        // Assert
        $this->assertEquals($expected, $result->getMaxResults());
    }
    
    /**
     * @covers WindowsAzure\Blob\Models\ListContainersResult::getMaxResults
     */
    public function testGetMaxResults()
    {
        // Setup
        $result = new ListContainersResult();
        $expected = '3';
        $result->setMaxResults($expected);
        
        // Test
        $actual = $result->getMaxResults();
        
        // Assert
        $this->assertEquals($expected, $actual);
    }
    
    /**
     * @covers WindowsAzure\Blob\Models\ListContainersResult::setAccountName
     */
    public function testSetAccountName()
    {
        // Setup
        $result = new ListContainersResult();
        $expected = 'name';
        
        // Test
        $result->setAccountName($expected);
        
        // Assert
        $this->assertEquals($expected, $result->getAccountName());
    }
    
    /**
     * @covers WindowsAzure\Blob\Models\ListContainersResult::getAccountName
     */
    public function testGetAccountName()
    {
        // Setup
        $result = new ListContainersResult();
        $expected = 'name';
        $result->setAccountName($expected);
        
        // Test
        $actual = $result->getAccountName();
        
        // Assert
        $this->assertEquals($expected, $actual);
    }
}