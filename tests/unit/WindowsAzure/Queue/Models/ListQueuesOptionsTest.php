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
 * @package   Tests\Unit\WindowsAzure\Queue\Models
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */

namespace Tests\Unit\WindowsAzure\Queue\Models;
use WindowsAzure\Queue\Models\ListQueuesOptions;
use Tests\Framework\TestResources;

/**
 * Unit tests for class ListQueuesOptions
 *
 * @category  Microsoft
 * @package   Tests\Unit\WindowsAzure\Queue\Models
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: 0.4.0_2014-01
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
class ListQueuesOptionsTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers WindowsAzure\Queue\Models\ListQueuesOptions::setPrefix
     */
    public function testSetPrefix()
    {
        // Setup
        $options = new ListQueuesOptions();
        $expected = 'myprefix';
        
        // Test
        $options->setPrefix($expected);
        
        // Assert
        $this->assertEquals($expected, $options->getPrefix());
    }
    
    /**
     * @covers WindowsAzure\Queue\Models\ListQueuesOptions::getPrefix
     */
    public function testGetPrefix()
    {
        // Setup
        $options = new ListQueuesOptions();
        $expected = 'myprefix';
        $options->setPrefix($expected);
        
        // Test
        $actual = $options->getPrefix();
        
        // Assert
        $this->assertEquals($expected, $actual);
    }
    
    /**
     * @covers WindowsAzure\Queue\Models\ListQueuesOptions::setMarker
     */
    public function testSetMarker()
    {
        // Setup
        $options = new ListQueuesOptions();
        $expected = 'mymarker';
        
        // Test
        $options->setMarker($expected);
        
        // Assert
        $this->assertEquals($expected, $options->getMarker());
    }
    
    /**
     * @covers WindowsAzure\Queue\Models\ListQueuesOptions::getMarker
     */
    public function testGetMarker()
    {
        // Setup
        $options = new ListQueuesOptions();
        $expected = 'mymarker';
        $options->setMarker($expected);
        
        // Test
        $actual = $options->getMarker();
        
        // Assert
        $this->assertEquals($expected, $actual);
    }
    
    /**
     * @covers WindowsAzure\Queue\Models\ListQueuesOptions::setMaxResults
     */
    public function testSetMaxResults()
    {
        // Setup
        $options = new ListQueuesOptions();
        $expected = '3';
        
        // Test
        $options->setMaxResults($expected);
        
        // Assert
        $this->assertEquals($expected, $options->getMaxResults());
    }
    
    /**
     * @covers WindowsAzure\Queue\Models\ListQueuesOptions::getMaxResults
     */
    public function testGetMaxResults()
    {
        // Setup
        $options = new ListQueuesOptions();
        $expected = '3';
        $options->setMaxResults($expected);
        
        // Test
        $actual = $options->getMaxResults();
        
        // Assert
        $this->assertEquals($expected, $actual);
    }
    
    /**
     * @covers WindowsAzure\Queue\Models\ListQueuesOptions::setIncludeMetadata
     */
    public function testSetIncludeMetadata()
    {
        // Setup
        $options = new ListQueuesOptions();
        $expected = true;
        
        // Test
        $options->setIncludeMetadata($expected);
        
        // Assert
        $this->assertEquals($expected, $options->getIncludeMetadata());
    }
    
    /**
     * @covers WindowsAzure\Queue\Models\ListQueuesOptions::getIncludeMetadata
     */
    public function testGetIncludeMetadata()
    {
        // Setup
        $options = new ListQueuesOptions();
        $expected = true;
        $options->setIncludeMetadata($expected);
        
        // Test
        $actual = $options->getIncludeMetadata();
        
        // Assert
        $this->assertEquals($expected, $actual);
    }
}


