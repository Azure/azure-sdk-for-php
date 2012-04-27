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
use WindowsAzure\Services\Blob\Models\AccessPolicy;

/**
 * Unit tests for class AccessPolicy
 *
 * @category  Microsoft
 * @package   Tests\Unit\WindowsAzure\Services\Blob\Models
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
class AccessPolicyTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers WindowsAzure\Services\Blob\Models\AccessPolicy::getStart 
     */
    public function testGetStart()
    {
        // Setup
        $accessPolicy = new AccessPolicy();
        $expected = '2009-09-28T08:49:37.0000000Z';
        $accessPolicy->setStart($expected);
        
        // Test
        $actual = $accessPolicy->getStart();
        
        // Assert
        $this->assertEquals($expected, $actual);
    }
    
    /**
     * @covers WindowsAzure\Services\Blob\Models\AccessPolicy::setStart 
     */
    public function testSetStart()
    {
        // Setup
        $accessPolicy = new AccessPolicy();
        $expected = '2009-09-28T08:49:37.0000000Z';
        
        // Test
        $accessPolicy->setStart($expected);
        
        // Assert
        $this->assertEquals($expected, $accessPolicy->getStart());
    }
    
    /**
     * @covers WindowsAzure\Services\Blob\Models\AccessPolicy::getExpiry 
     */
    public function testGetExpiry()
    {
        // Setup
        $accessPolicy = new AccessPolicy();
        $expected = '2009-09-28T08:49:37.0000000Z';
        $accessPolicy->setExpiry($expected);
        
        // Test
        $actual = $accessPolicy->getExpiry();
        
        // Assert
        $this->assertEquals($expected, $actual);
    }
    
    /**
     * @covers WindowsAzure\Services\Blob\Models\AccessPolicy::setExpiry 
     */
    public function testSetExpiry()
    {
        // Setup
        $accessPolicy = new AccessPolicy();
        $expected = '2009-09-28T08:49:37.0000000Z';
        
        // Test
        $accessPolicy->setExpiry($expected);
        
        // Assert
        $this->assertEquals($expected, $accessPolicy->getExpiry());
    }
    
    /**
     * @covers WindowsAzure\Services\Blob\Models\AccessPolicy::getPermission 
     */
    public function testGetPermission()
    {
        // Setup
        $accessPolicy = new AccessPolicy();
        $expected = 'rw';
        $accessPolicy->setPermission($expected);
        
        // Test
        $actual = $accessPolicy->getPermission();
        
        // Assert
        $this->assertEquals($expected, $actual);
    }
    
    /**
     * @covers WindowsAzure\Services\Blob\Models\AccessPolicy::setPermission 
     */
    public function testSetPermission()
    {
        // Setup
        $accessPolicy = new AccessPolicy();
        $expected = 'rw';
        
        // Test
        $accessPolicy->setPermission($expected);
        
        // Assert
        $this->assertEquals($expected, $accessPolicy->getPermission());
    }
    
    /**
     * @covers WindowsAzure\Services\Blob\Models\AccessPolicy::toArray
     */
    public function testToArray()
    {
        // Setup
        $accessPolicy = new AccessPolicy();
        $permission = 'rw';
        $start = '2009-09-28T08:49:37.0000000Z';
        $expiry = '2009-10-28T08:49:37.0000000Z';
        $accessPolicy->setPermission($permission);
        $accessPolicy->setStart($start);
        $accessPolicy->setExpiry($expiry);
        
        // Test
        $actual = $accessPolicy->toArray();
        
        // Assert
        $this->assertEquals($permission, $actual['Permission']);
        $this->assertEquals($start, urldecode($actual['Start']));
        $this->assertEquals($expiry, urldecode($actual['Expiry']));
    }
}

?>
