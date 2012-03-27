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
 * @package   PEAR2\Tests\Unit\WindowsAzure\Services\Core\Models
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */

namespace PEAR2\Tests\Unit\WindowsAzure\Services\Core\Models;
use PEAR2\WindowsAzure\Services\Core\Models\Logging;
use PEAR2\Tests\Framework\TestResources;
use PEAR2\WindowsAzure\Services\Core\Models\RetentionPolicy;
use PEAR2\WindowsAzure\Utilities;

/**
 * Unit tests for class Logging
 *
 * @category  Microsoft
 * @package   PEAR2\Tests\Unit\WindowsAzure\Services\Core\Models
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
class LoggingTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers PEAR2\WindowsAzure\Services\Core\Models\Logging::create
     */
    public function testCreate()
    {
        // Setup
        $sample = TestResources::getServicePropertiesSample();
        
        // Test
        $actual = Logging::create($sample['Logging']);
        
        // Assert
        $this->assertEquals(Utilities::toBoolean($sample['Logging']['Delete']), $actual->getDelete());
        $this->assertEquals(Utilities::toBoolean($sample['Logging']['Read']), $actual->getRead());
        $this->assertEquals(RetentionPolicy::create($sample['Logging']['RetentionPolicy']), $actual->getRetentionPolicy());
        $this->assertEquals($sample['Logging']['Version'], $actual->getVersion());
        $this->assertEquals(Utilities::toBoolean($sample['Logging']['Write']), $actual->getWrite());
    }
    
    /**
     * @covers PEAR2\WindowsAzure\Services\Core\Models\Logging::getRetentionPolicy
     */
    public function testGetRetentionPolicy()
    {
        // Setup
        $sample = TestResources::getServicePropertiesSample();
        $logging = new Logging();
        $expected = RetentionPolicy::create($sample['Logging']['RetentionPolicy']);
        $logging->setRetentionPolicy($expected);
        
        // Test
        $actual = $logging->getRetentionPolicy();
        
        // Assert
        $this->assertEquals($expected, $actual);
    }
    
    /**
     * @covers PEAR2\WindowsAzure\Services\Core\Models\Logging::setRetentionPolicy
     */
    public function testSetRetentionPolicy()
    {
        // Setup
        $sample = TestResources::getServicePropertiesSample();
        $logging = new Logging();
        $expected = RetentionPolicy::create($sample['Logging']['RetentionPolicy']);
        
        // Test
        $logging->setRetentionPolicy($expected);
        
        // Assert
        $actual = $logging->getRetentionPolicy();
        $this->assertEquals($expected, $actual);
    }
    
    /**
     * @covers PEAR2\WindowsAzure\Services\Core\Models\Logging::getWrite
     */
    public function testGetWrite()
    {
        // Setup
        $sample = TestResources::getServicePropertiesSample();
        $logging = new Logging();
        $expected = Utilities::toBoolean($sample['Logging']['Write']);
        $logging->setWrite($expected);
        
        // Test
        $actual = $logging->getWrite();
        
        // Assert
        $this->assertEquals($expected, $actual);
    }
    
    /**
     * @covers PEAR2\WindowsAzure\Services\Core\Models\Logging::setWrite
     */
    public function testSetWrite()
    {
        // Setup
        $sample = TestResources::getServicePropertiesSample();
        $logging = new Logging();
        $expected = Utilities::toBoolean($sample['Logging']['Write']);
        
        // Test
        $logging->setWrite($expected);
        
        // Assert
        $actual = $logging->getWrite();
        $this->assertEquals($expected, $actual);
    }
    
    /**
     * @covers PEAR2\WindowsAzure\Services\Core\Models\Logging::getRead
     */
    public function testGetRead()
    {
        // Setup
        $sample = TestResources::getServicePropertiesSample();
        $logging = new Logging();
        $expected = Utilities::toBoolean($sample['Logging']['Read']);
        $logging->setRead($expected);
        
        // Test
        $actual = $logging->getRead();
        
        // Assert
        $this->assertEquals($expected, $actual);
    }
    
    /**
     * @covers PEAR2\WindowsAzure\Services\Core\Models\Logging::setRead
     */
    public function testSetRead()
    {
        // Setup
        $sample = TestResources::getServicePropertiesSample();
        $logging = new Logging();
        $expected = Utilities::toBoolean($sample['Logging']['Read']);
        
        // Test
        $logging->setRead($expected);
        
        // Assert
        $actual = $logging->getRead();
        $this->assertEquals($expected, $actual);
    }
    
    /**
     * @covers PEAR2\WindowsAzure\Services\Core\Models\Logging::getDelete
     */
    public function testGetDelete()
    {
        // Setup
        $sample = TestResources::getServicePropertiesSample();
        $logging = new Logging();
        $expected = Utilities::toBoolean($sample['Logging']['Delete']);
        $logging->setDelete($expected);
        
        // Test
        $actual = $logging->getDelete();
        
        // Assert
        $this->assertEquals($expected, $actual);
    }
    
    /**
     * @covers PEAR2\WindowsAzure\Services\Core\Models\Logging::setDelete
     */
    public function testSetDelete()
    {
        // Setup
        $sample = TestResources::getServicePropertiesSample();
        $logging = new Logging();
        $expected = Utilities::toBoolean($sample['Logging']['Delete']);
        
        // Test
        $logging->setDelete($expected);
        
        // Assert
        $actual = $logging->getDelete();
        $this->assertEquals($expected, $actual);
    }
    
    /**
     * @covers PEAR2\WindowsAzure\Services\Core\Models\Logging::getVersion
     */
    public function testGetVersion()
    {
        // Setup
        $sample = TestResources::getServicePropertiesSample();
        $logging = new Logging();
        $expected = $sample['Logging']['Version'];
        $logging->setVersion($expected);
        
        // Test
        $actual = $logging->getVersion();
        
        // Assert
        $this->assertEquals($expected, $actual);
    }
    
    /**
     * @covers PEAR2\WindowsAzure\Services\Core\Models\Logging::setVersion
     */
    public function testSetVersion()
    {
        // Setup
        $sample = TestResources::getServicePropertiesSample();
        $logging = new Logging();
        $expected = $sample['Logging']['Version'];
        
        // Test
        $logging->setVersion($expected);
        
        // Assert
        $actual = $logging->getVersion();
        $this->assertEquals($expected, $actual);
    }
    
    /**
     * @covers PEAR2\WindowsAzure\Services\Core\Models\Logging::toArray
     */
    public function testToArray()
    {
        // Setup
        $sample = TestResources::getServicePropertiesSample();
        $logging = Logging::create($sample['Logging']);
        $expected = array(
            'Version'         => $sample['Logging']['Version'],
            'Delete'          => $sample['Logging']['Delete'],
            'Read'            => $sample['Logging']['Read'],
            'Write'           => $sample['Logging']['Write'],
            'RetentionPolicy' => $logging->getRetentionPolicy()->toArray()
        );
        
        // Test
        $actual = $logging->toArray();
        
        // Assert
        $this->assertEquals($expected, $actual);
    }
}

?>
