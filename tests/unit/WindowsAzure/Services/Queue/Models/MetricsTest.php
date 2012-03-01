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
 * @package   PEAR2\Tests\Unit\WindowsAzure
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */

use PEAR2\WindowsAzure\Services\Queue\Models\Metrics;
use PEAR2\WindowsAzure\Utilities;
use PEAR2\Tests\Unit\TestResources;
use PEAR2\WindowsAzure\Services\Queue\Models\RetentionPolicy;

/**
 * Unit tests for class Metrics
 *
 * @category  Microsoft
 * @package   PEAR2\Tests\Unit\WindowsAzure
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
class MetricsTest extends PHPUnit_Framework_TestCase
{
    /**
     * @covers PEAR2\WindowsAzure\Services\Queue\Models\Metrics::create
     */
    public function testCreate()
    {
        // Setup
        $sample = TestResources::getServicePropertiesSample();
        
        // Test
        $actual = Metrics::create($sample['Metrics']);
        
        // Assert
        $this->assertEquals(Utilities::toBool($sample['Metrics']['Enabled']), $actual->getEnabled());
        $this->assertEquals(Utilities::toBool($sample['Metrics']['IncludeAPIs']), $actual->getIncludeAPIs());
        $this->assertEquals(RetentionPolicy::create($sample['Metrics']['RetentionPolicy']), $actual->getRetentionPolicy());
        $this->assertEquals($sample['Metrics']['Version'], $actual->getVersion());
    }
    
    /**
     * @covers PEAR2\WindowsAzure\Services\Queue\Models\Metrics::getRetentionPolicy
     */
    public function testGetRetentionPolicy()
    {
        // Setup
        $sample = TestResources::getServicePropertiesSample();
        $metrics = new Metrics();
        $expected = RetentionPolicy::create($sample['Metrics']['RetentionPolicy']);
        $metrics->setRetentionPolicy($expected);
        
        // Test
        $actual = $metrics->getRetentionPolicy();
        
        // Assert
        $this->assertEquals($expected, $actual);
    }
    
    /**
     * @covers PEAR2\WindowsAzure\Services\Queue\Models\Metrics::setRetentionPolicy
     */
    public function testSetRetentionPolicy()
    {
        // Setup
        $sample = TestResources::getServicePropertiesSample();
        $metrics = new Metrics();
        $expected = RetentionPolicy::create($sample['Metrics']['RetentionPolicy']);
        
        // Test
        $metrics->setRetentionPolicy($expected);
        
        // Assert
        $actual = $metrics->getRetentionPolicy();
        $this->assertEquals($expected, $actual);
    }
    
    /**
     * @covers PEAR2\WindowsAzure\Services\Queue\Models\Metrics::getVersion
     */
    public function testGetVersion()
    {
        // Setup
        $sample = TestResources::getServicePropertiesSample();
        $metrics = new Metrics();
        $expected = $sample['Metrics']['Version'];
        $metrics->setVersion($expected);
        
        // Test
        $actual = $metrics->getVersion();
        
        // Assert
        $this->assertEquals($expected, $actual);
    }
    
    /**
     * @covers PEAR2\WindowsAzure\Services\Queue\Models\Metrics::setVersion
     */
    public function testSetVersion()
    {
        // Setup
        $sample = TestResources::getServicePropertiesSample();
        $metrics = new Metrics();
        $expected = $sample['Metrics']['Version'];
        
        // Test
        $metrics->setVersion($expected);
        
        // Assert
        $actual = $metrics->getVersion();
        $this->assertEquals($expected, $actual);
    }
    
    /**
     * @covers PEAR2\WindowsAzure\Services\Queue\Models\Metrics::getEnabled
     */
    public function testGetEnabled()
    {
        // Setup
        $sample = TestResources::getServicePropertiesSample();
        $metrics = new Metrics();
        $expected = Utilities::toBool($sample['Metrics']['Enabled']);
        $metrics->setEnabled($expected);
        
        // Test
        $actual = $metrics->getEnabled();
        
        // Assert
        $this->assertEquals($expected, $actual);
    }
    
    /**
     * @covers PEAR2\WindowsAzure\Services\Queue\Models\Metrics::setEnabled
     */
    public function testSetEnabled()
    {
        // Setup
        $sample = TestResources::getServicePropertiesSample();
        $metrics = new Metrics();
        $expected = Utilities::toBool($sample['Metrics']['Enabled']);
        
        // Test
        $metrics->setEnabled($expected);
        
        // Assert
        $actual = $metrics->getEnabled();
        $this->assertEquals($expected, $actual);
    }
    
    /**
     * @covers PEAR2\WindowsAzure\Services\Queue\Models\Metrics::getIncludeAPIs
     */
    public function testGetIncludeAPIs()
    {
        // Setup
        $sample = TestResources::getServicePropertiesSample();
        $metrics = new Metrics();
        $expected = Utilities::toBool($sample['Metrics']['IncludeAPIs']);
        $metrics->setIncludeAPIs($expected);
        
        // Test
        $actual = $metrics->getIncludeAPIs();
        
        // Assert
        $this->assertEquals($expected, $actual);
    }
    
    /**
     * @covers PEAR2\WindowsAzure\Services\Queue\Models\Metrics::setIncludeAPIs
     */
    public function testSetIncludeAPIs()
    {
        // Setup
        $sample = TestResources::getServicePropertiesSample();
        $metrics = new Metrics();
        $expected = Utilities::toBool($sample['Metrics']['IncludeAPIs']);
        
        // Test
        $metrics->setIncludeAPIs($expected);
        
        // Assert
        $actual = $metrics->getIncludeAPIs();
        $this->assertEquals($expected, $actual);
    }
}

?>
