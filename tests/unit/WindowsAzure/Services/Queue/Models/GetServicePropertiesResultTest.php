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

use PEAR2\WindowsAzure\Services\Core\Models\GetServicePropertiesResult;
use PEAR2\WindowsAzure\Services\Core\Models\ServiceProperties;
use PEAR2\Tests\Framework\TestResources;

/**
 * Unit tests for class GetServicePropertiesResult
 *
 * @category  Microsoft
 * @package   PEAR2\Tests\Unit\WindowsAzure
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
class GetServicePropertiesResultTest extends PHPUnit_Framework_TestCase
{
    /**
     * @covers PEAR2\WindowsAzure\Services\Core\Models\GetServicePropertiesResult::create
     */
    public function testCreate()
    {
        // Test
        $result = GetServicePropertiesResult::create(TestResources::getServicePropertiesSample());
        
        // Assert
        $this->assertTrue(isset($result));
        
    }
    
    /**
     * @covers PEAR2\WindowsAzure\Services\Core\Models\GetServicePropertiesResult::getValue
     */
    public function testGetValue()
    {
        // Setup
        $result = GetServicePropertiesResult::create(TestResources::getServicePropertiesSample());
        $expected = ServiceProperties::create(TestResources::getServicePropertiesSample());
        
        // Test
        $actual = $result->getValue();
        
        // Assert
        $this->assertEquals($expected, $actual);
        
    }
    
    /**
     * @covers PEAR2\WindowsAzure\Services\Core\Models\GetServicePropertiesResult::setValue
     */
    public function testSetValue()
    {
        // Setup
        $result = new GetServicePropertiesResult();
        $expected = ServiceProperties::create(TestResources::getServicePropertiesSample());
        
        // Test
        $result->setValue($expected);
        
        // Assert
        $this->assertEquals($expected, $result->getValue());
        
    }
}

?>
