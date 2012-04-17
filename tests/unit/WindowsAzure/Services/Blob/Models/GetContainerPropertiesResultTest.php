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
use WindowsAzure\Services\Blob\Models\GetContainerPropertiesResult;

/**
 * Unit tests for class GetContainerPropertiesResult
 *
 * @category  Microsoft
 * @package   Tests\Unit\WindowsAzure\Services\Blob\Models
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
class GetContainerPropertiesResultTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers WindowsAzure\Services\Blob\Models\GetContainerPropertiesResult::getEtag
     */
    public function testGetEtag()
    {
        // Setup
        $properties = new GetContainerPropertiesResult();
        $expected = '0x8CACB9BD7C6B1B2';
        $properties->setEtag($expected);
        
        // Test
        $actual = $properties->getEtag();
        
        // Assert
        $this->assertEquals($expected, $actual);
    }
    
    /**
     * @covers WindowsAzure\Services\Blob\Models\GetContainerPropertiesResult::setEtag
     */
    public function testSetEtag()
    {
        // Setup
        $properties = new GetContainerPropertiesResult();
        $expected = '0x8CACB9BD7C6B1B2';
        
        // Test
        $properties->setEtag($expected);
        
        // Assert
        $actual = $properties->getEtag();
        $this->assertEquals($expected, $actual);
    }
    
    /**
     * @covers WindowsAzure\Services\Blob\Models\GetContainerPropertiesResult::getLastModified
     */
    public function testGetLastModified()
    {
        // Setup
        $properties = new GetContainerPropertiesResult();
        $expected = 'Fri, 09 Oct 2009 21:04:30 GMT';
        $properties->setLastModified($expected);
        
        // Test
        $actual = $properties->getLastModified();
        
        // Assert
        $this->assertEquals($expected, $actual);
    }
    
    /**
     * @covers WindowsAzure\Services\Blob\Models\GetContainerPropertiesResult::setLastModified
     */
    public function testSetLastModified()
    {
        // Setup
        $properties = new GetContainerPropertiesResult();
        $expected = 'Fri, 09 Oct 2009 21:04:30 GMT';
        
        // Test
        $properties->setLastModified($expected);
        
        // Assert
        $actual = $properties->getLastModified();
        $this->assertEquals($expected, $actual);
    }
    
    /**
     * @covers WindowsAzure\Services\Blob\Models\GetContainerPropertiesResult::setMetadata
     */
    public function testSetMetadata()
    {
        // Setup
        $container = new GetContainerPropertiesResult();
        $expected = array('key1' => 'value1', 'key2' => 'value2');
        
        // Test
        $container->setMetadata($expected);
        
        // Assert
        $this->assertEquals($expected, $container->getMetadata());
    }
    
    /**
     * @covers WindowsAzure\Services\Blob\Models\GetContainerPropertiesResult::getMetadata
     */
    public function testGetMetadata()
    {
        // Setup
        $container = new GetContainerPropertiesResult();
        $expected = array('key1' => 'value1', 'key2' => 'value2');
        $container->setMetadata($expected);
        
        // Test
        $actual = $container->getMetadata();
        
        // Assert
        $this->assertEquals($expected, $actual);
    }
}

?>
