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
use WindowsAzure\Services\Blob\Models\SignedIdentifier;
use WindowsAzure\Services\Blob\Models\AccessPolicy;

/**
 * Unit tests for class SignedIdentifier
 *
 * @category  Microsoft
 * @package   Tests\Unit\WindowsAzure\Services\Blob\Models
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
class SignedIdentifierTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers WindowsAzure\Services\Blob\Models\SignedIdentifier::getId 
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
     * @covers WindowsAzure\Services\Blob\Models\SignedIdentifier::setId 
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
     * @covers WindowsAzure\Services\Blob\Models\SignedIdentifier::getAccessPolicy 
     */
    public function testGetAccessPolicy()
    {
        // Setup
        $signedIdentifier = new SignedIdentifier();
        $expected = new AccessPolicy();
        $expected->setExpiry('2009-09-29T08%3a49%3a37.0000000Z');
        $expected->setPermission('rwd');
        $expected->setStart('2009-09-28T08%3a49%3a37.0000000Z');
        $signedIdentifier->setAccessPolicy($expected);
        
        // Test
        $actual = $signedIdentifier->getAccessPolicy();
        
        // Assert
        $this->assertEquals($expected, $actual);
    }
    
    /**
     * @covers WindowsAzure\Services\Blob\Models\SignedIdentifier::setAccessPolicy
     */
    public function testSetAccessPolicy()
    {
        // Setup
        $signedIdentifier = new SignedIdentifier();
        $expected = new AccessPolicy();
        $expected->setExpiry('2009-09-29T08%3a49%3a37.0000000Z');
        $expected->setPermission('rwd');
        $expected->setStart('2009-09-28T08%3a49%3a37.0000000Z');
        
        // Test
        $signedIdentifier->setAccessPolicy($expected);
        
        // Assert
        $this->assertEquals($expected, $signedIdentifier->getAccessPolicy());
        
        return $signedIdentifier;
    }
    
    /**
     * @covers WindowsAzure\Services\Blob\Models\SignedIdentifier::toArray
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

?>
