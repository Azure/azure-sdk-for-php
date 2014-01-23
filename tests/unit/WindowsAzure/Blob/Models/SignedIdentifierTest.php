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
use WindowsAzure\Blob\Models\SignedIdentifier;
use WindowsAzure\Blob\Models\AccessPolicy;

/**
 * Unit tests for class SignedIdentifier
 *
 * @category  Microsoft
 * @package   Tests\Unit\WindowsAzure\Blob\Models
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: 0.4.0_2014-01
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
class SignedIdentifierTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers WindowsAzure\Blob\Models\SignedIdentifier::getId 
     */
    public function testGetId()
    {
        // Setup
        $signedIdentifier = new SignedIdentifier();
        $expected = 'MTIzNDU2Nzg5MDEyMzQ1Njc4OTAxMjM0NTY3ODkwMTI=';
        $signedIdentifier->setId($expected);
        
        // Test
        $actual = $signedIdentifier->getId();
        
        // Assert
        $this->assertEquals($expected, $actual);
    }
    
    /**
     * @covers WindowsAzure\Blob\Models\SignedIdentifier::setId 
     */
    public function testSetId()
    {
        // Setup
        $signedIdentifier = new SignedIdentifier();
        $expected = 'MTIzNDU2Nzg5MDEyMzQ1Njc4OTAxMjM0NTY3ODkwMTI=';
        
        // Test
        $signedIdentifier->setId($expected);
        
        // Assert
        $this->assertEquals($expected, $signedIdentifier->getId());
    }
    
    /**
     * @covers WindowsAzure\Blob\Models\SignedIdentifier::getAccessPolicy 
     */
    public function testGetAccessPolicy()
    {
        // Setup
        $signedIdentifier = new SignedIdentifier();
        $expected = new AccessPolicy();
        $expected->setExpiry(new \DateTime('2009-09-29T08:49:37'));
        $expected->setPermission('rwd');
        $expected->setStart(new \DateTime('2009-09-28T08:49:37'));
        $signedIdentifier->setAccessPolicy($expected);
        
        // Test
        $actual = $signedIdentifier->getAccessPolicy();
        
        // Assert
        $this->assertEquals($expected, $actual);
    }
    
    /**
     * @covers WindowsAzure\Blob\Models\SignedIdentifier::setAccessPolicy
     */
    public function testSetAccessPolicy()
    {
        // Setup
        $signedIdentifier = new SignedIdentifier();
        $expected = new AccessPolicy();
        $expected->setExpiry(new \DateTime('2009-09-29T08:49:37'));
        $expected->setPermission('rwd');
        $expected->setStart(new \DateTime('2009-09-28T08:49:37'));
        
        // Test
        $signedIdentifier->setAccessPolicy($expected);
        
        // Assert
        $this->assertEquals($expected, $signedIdentifier->getAccessPolicy());
        
        return $signedIdentifier;
    }
    
    /**
     * @covers WindowsAzure\Blob\Models\SignedIdentifier::toArray
     * @depends testSetAccessPolicy
     */
    public function testToXml($signedIdentifier)
    {
        // Setup
        $id = 'MTIzNDU2Nzg5MDEyMzQ1Njc4OTAxMjM0NTY3ODkwMTI=';
        $signedIdentifier->setId($id);
        
        // Test
        $array = $signedIdentifier->toArray();
        
        // Assert
        $this->assertEquals($id, $array['SignedIdentifier']['Id']);
        $this->assertArrayHasKey('AccessPolicy', $array['SignedIdentifier']);
    }
}


