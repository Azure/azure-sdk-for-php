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
use WindowsAzure\Blob\Models\AccessPolicy;

/**
 * Unit tests for class AccessPolicy
 *
 * @category  Microsoft
 * @package   Tests\Unit\WindowsAzure\Blob\Models
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: 0.4.0_2014-01
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
class AccessPolicyTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers WindowsAzure\Blob\Models\AccessPolicy::getStart 
     */
    public function testGetStart()
    {
        // Setup
        $accessPolicy = new AccessPolicy();
        $expected = new \DateTime('2009-09-28T08:49:37');
        $accessPolicy->setStart($expected);
        
        // Test
        $actual = $accessPolicy->getStart();
        
        // Assert
        $this->assertEquals($expected, $actual);
    }
    
    /**
     * @covers WindowsAzure\Blob\Models\AccessPolicy::setStart 
     */
    public function testSetStart()
    {
        // Setup
        $accessPolicy = new AccessPolicy();
        $expected = new \DateTime('2009-09-28T08:49:37');
        
        // Test
        $accessPolicy->setStart($expected);
        
        // Assert
        $this->assertEquals($expected, $accessPolicy->getStart());
    }
    
    /**
     * @covers WindowsAzure\Blob\Models\AccessPolicy::getExpiry 
     */
    public function testGetExpiry()
    {
        // Setup
        $accessPolicy = new AccessPolicy();
        $expected = new \DateTime('2009-09-28T08:49:37');
        $accessPolicy->setExpiry($expected);
        
        // Test
        $actual = $accessPolicy->getExpiry();
        
        // Assert
        $this->assertEquals($expected, $actual);
    }
    
    /**
     * @covers WindowsAzure\Blob\Models\AccessPolicy::setExpiry 
     */
    public function testSetExpiry()
    {
        // Setup
        $accessPolicy = new AccessPolicy();
        $expected = new \DateTime('2009-09-28T08:49:37');
        
        // Test
        $accessPolicy->setExpiry($expected);
        
        // Assert
        $this->assertEquals($expected, $accessPolicy->getExpiry());
    }
    
    /**
     * @covers WindowsAzure\Blob\Models\AccessPolicy::getPermission 
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
     * @covers WindowsAzure\Blob\Models\AccessPolicy::setPermission 
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
     * @covers WindowsAzure\Blob\Models\AccessPolicy::toArray
     */
    public function testToArray()
    {
        // Setup
        $accessPolicy = new AccessPolicy();
        $permission = 'rw';
        $start = '2009-09-28T08:49:37Z';
        $expiry = '2009-10-28T08:49:37Z';
        $startDate = new \DateTime($start);
        $expiryDate = new \DateTime($expiry);
        $accessPolicy->setPermission($permission);
        $accessPolicy->setStart($startDate);
        $accessPolicy->setExpiry($expiryDate);
        
        // Test
        $actual = $accessPolicy->toArray();
        
        // Assert
        $this->assertEquals($permission, $actual['Permission']);
        $this->assertEquals($start, urldecode($actual['Start']));
        $this->assertEquals($expiry, urldecode($actual['Expiry']));
    }
}


