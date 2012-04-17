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
use WindowsAzure\Services\Blob\Models\AccessCondition;
use WindowsAzure\Services\Blob\Models\AccessConditionHeaderType;
use WindowsAzure\Resources;
use WindowsAzure\Core\WindowsAzureUtilities;

/**
 * Unit tests for class AccessCondition
 *
 * @category  Microsoft
 * @package   Tests\Unit\WindowsAzure\Services\Blob\Models
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
class AccessConditionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers WindowsAzure\Services\Blob\Models\AccessCondition::__construct
     * @covers WindowsAzure\Services\Blob\Models\AccessCondition::getHeader
     * @covers WindowsAzure\Services\Blob\Models\AccessCondition::getValue
     * @covers WindowsAzure\Services\Blob\Models\AccessCondition::setHeader
     * @covers WindowsAzure\Services\Blob\Models\AccessCondition::setValue
     */
    public function test__construct()
    {
        // Setup
        $expectedHeaderType = AccessConditionHeaderType::IF_MATCH;
        $expectedValue = '0x8CAFB82EFF70C46';
        
        // Test
        $actual = AccessCondition::ifMatch($expectedValue);
        
        // Assert
        $this->assertEquals($expectedHeaderType, $actual->getHeader());
        $this->assertEquals($expectedValue, $actual->getValue());
    }
    
    /**
     * @covers WindowsAzure\Services\Blob\Models\AccessCondition::none
     * @covers WindowsAzure\Services\Blob\Models\AccessCondition::getHeader
     * @covers WindowsAzure\Services\Blob\Models\AccessCondition::getValue
     */
    public function testNone()
    {
        // Setup
        $expectedHeader = AccessConditionHeaderType::NONE;
        $expectedValue = null;
        
        // Test
        $actual = AccessCondition::none();
        
        // Assert
        $this->assertEquals($expectedHeader, $actual->getHeader());
        $this->assertEquals($expectedValue, $actual->getValue());
    }
    
    /**
     * @covers WindowsAzure\Services\Blob\Models\AccessCondition::ifModifiedSince
     * @covers WindowsAzure\Services\Blob\Models\AccessCondition::getHeader
     * @covers WindowsAzure\Services\Blob\Models\AccessCondition::getValue
     */
    public function testIfModifiedSince()
    {
        // Setup
        $expectedHeader = AccessConditionHeaderType::IF_MODIFIED_SINCE;
        $date = 'Sun, 25 Sep 2011 00:42:49 GMT';
        $expectedValue = WindowsAzureUtilities::rfc1123ToDateTime($date);
        
        // Test
        $actual = AccessCondition::ifModifiedSince($date);
        
        // Assert
        $this->assertEquals($expectedHeader, $actual->getHeader());
        $this->assertEquals($expectedValue, $actual->getValue());
    }
    
    /**
     * @covers WindowsAzure\Services\Blob\Models\AccessCondition::ifMatch
     * @covers WindowsAzure\Services\Blob\Models\AccessCondition::getHeader
     * @covers WindowsAzure\Services\Blob\Models\AccessCondition::getValue
     */
    public function testIfMatch()
    {
        // Setup
        $expectedHeader = AccessConditionHeaderType::IF_MATCH;
        $expectedValue = '0x8CAFB82EFF70C46';
        
        // Test
        $actual = AccessCondition::ifMatch($expectedValue);
        
        // Assert
        $this->assertEquals($expectedHeader, $actual->getHeader());
        $this->assertEquals($expectedValue, $actual->getValue());
    }
    
    /**
     * @covers WindowsAzure\Services\Blob\Models\AccessCondition::ifNoneMatch
     * @covers WindowsAzure\Services\Blob\Models\AccessCondition::getHeader
     * @covers WindowsAzure\Services\Blob\Models\AccessCondition::getValue
     */
    public function testIfNoneMatch()
    {
        // Setup
        $expectedHeader = AccessConditionHeaderType::IF_NONE_MATCH;
        $expectedValue = '0x8CAFB82EFF70C46';
        
        // Test
        $actual = AccessCondition::ifNoneMatch($expectedValue);
        
        // Assert
        $this->assertEquals($expectedHeader, $actual->getHeader());
        $this->assertEquals($expectedValue, $actual->getValue());
    }
    
    /**
     * @covers WindowsAzure\Services\Blob\Models\AccessCondition::ifNotModifiedSince
     * @covers WindowsAzure\Services\Blob\Models\AccessCondition::getHeader
     * @covers WindowsAzure\Services\Blob\Models\AccessCondition::getValue
     */
    public function testIfNotModifiedSince()
    {
        // Setup
        $expectedHeader = AccessConditionHeaderType::IF_UNMODIFIED_SINCE;
        $date = 'Sun, 25 Sep 2011 00:42:49 GMT';
        $expectedValue = WindowsAzureUtilities::rfc1123ToDateTime($date);
        
        // Test
        $actual = AccessCondition::ifNotModifiedSince($date);
        
        // Assert
        $this->assertEquals($expectedHeader, $actual->getHeader());
        $this->assertEquals($expectedValue, $actual->getValue());
    }
}

?>
