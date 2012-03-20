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
 * @package   PEAR2\Tests\Unit\WindowsAzure\Services\Blob\Models
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
namespace PEAR2\Tests\Unit\WindowsAzure\Services\Blob\Models;
use PEAR2\WindowsAzure\Services\Blob\Models\ContainerACL;
use PEAR2\Tests\Framework\TestResources;
use PEAR2\WindowsAzure\Resources;
use PEAR2\WindowsAzure\Core\WindowsAzureUtilities;
use PEAR2\WindowsAzure\Utilities;

/**
 * Unit tests for class ContainerACL
 *
 * @category  Microsoft
 * @package   PEAR2\Tests\Unit\WindowsAzure\Services\Blob\Models
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
class ContainerACLTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers PEAR2\WindowsAzure\Services\Blob\Models\ContainerACL::create
     * @covers PEAR2\WindowsAzure\Services\Blob\Models\ContainerACL::getEtag
     * @covers PEAR2\WindowsAzure\Services\Blob\Models\ContainerACL::getLastModified
     * @covers PEAR2\WindowsAzure\Services\Blob\Models\ContainerACL::getPublicAccess
     * @covers PEAR2\WindowsAzure\Services\Blob\Models\ContainerACL::getSignedIdentifiers
     * @covers PEAR2\WindowsAzure\Services\Blob\Models\ContainerACL::addSignedIdentifier
     */
    public function testCreateEmpty()
    {
        // Setup
        $sample = Resources::EMPTY_STRING;
        $expectedEtag = '0x8CAFB82EFF70C46';
        $expectedLastModified = 'Sun, 25 Sep 2011 19:42:18 GMT';
        $expectedDate = WindowsAzureUtilities::rfc1123ToDateTime($expectedLastModified);
        $expectedPublicAccess = 'container';
        
        // Test
        $acl = ContainerACL::create($expectedPublicAccess, $expectedEtag, 
            $expectedLastModified, $sample);
        
        // Assert
        $this->assertEquals($expectedEtag, $acl->getEtag());
        $this->assertEquals($expectedDate, $acl->getLastModified());
        $this->assertEquals($expectedPublicAccess, $acl->getPublicAccess());
        $this->assertCount(0, $acl->getSignedIdentifiers());
    }
    
    /**
     * @covers PEAR2\WindowsAzure\Services\Blob\Models\ContainerACL::create
     * @covers PEAR2\WindowsAzure\Services\Blob\Models\ContainerACL::getEtag
     * @covers PEAR2\WindowsAzure\Services\Blob\Models\ContainerACL::getLastModified
     * @covers PEAR2\WindowsAzure\Services\Blob\Models\ContainerACL::getPublicAccess
     * @covers PEAR2\WindowsAzure\Services\Blob\Models\ContainerACL::getSignedIdentifiers
     * @covers PEAR2\WindowsAzure\Services\Blob\Models\ContainerACL::addSignedIdentifier
     */
    public function testCreateOneEntry()
    {
        // Setup
        $sample = TestResources::getContainerACLOneEntrySample();
        $expectedEtag = '0x8CAFB82EFF70C46';
        $expectedLastModified = 'Sun, 25 Sep 2011 19:42:18 GMT';
        $expectedDate = WindowsAzureUtilities::rfc1123ToDateTime($expectedLastModified);
        $expectedPublicAccess = 'container';
        
        // Test
        $acl = ContainerACL::create($expectedPublicAccess, $expectedEtag, 
            $expectedLastModified, $sample['SignedIdentifiers']);
        
        // Assert
        $this->assertEquals($expectedEtag, $acl->getEtag());
        $this->assertEquals($expectedDate, $acl->getLastModified());
        $this->assertEquals($expectedPublicAccess, $acl->getPublicAccess());
        $this->assertCount(1, $acl->getSignedIdentifiers());
    }
    
    /**
     * @covers PEAR2\WindowsAzure\Services\Blob\Models\ContainerACL::create
     * @covers PEAR2\WindowsAzure\Services\Blob\Models\ContainerACL::getEtag
     * @covers PEAR2\WindowsAzure\Services\Blob\Models\ContainerACL::getLastModified
     * @covers PEAR2\WindowsAzure\Services\Blob\Models\ContainerACL::getPublicAccess
     * @covers PEAR2\WindowsAzure\Services\Blob\Models\ContainerACL::getSignedIdentifiers
     * @covers PEAR2\WindowsAzure\Services\Blob\Models\ContainerACL::addSignedIdentifier
     */
    public function testCreateMultipleEntries()
    {
        // Setup
        $sample = TestResources::getContainerACLMultipleEntriesSample();
        $expectedEtag = '0x8CAFB82EFF70C46';
        $expectedLastModified = 'Sun, 25 Sep 2011 19:42:18 GMT';
        $expectedDate = WindowsAzureUtilities::rfc1123ToDateTime($expectedLastModified);
        $expectedPublicAccess = 'container';
        
        // Test
        $acl = ContainerACL::create($expectedPublicAccess, $expectedEtag, 
            $expectedLastModified, $sample['SignedIdentifiers']);
        
        // Assert
        $this->assertEquals($expectedEtag, $acl->getEtag());
        $this->assertEquals($expectedDate, $acl->getLastModified());
        $this->assertEquals($expectedPublicAccess, $acl->getPublicAccess());
        $this->assertCount(2, $acl->getSignedIdentifiers());
        
        return $acl;
    }
    
    /**
     * @covers PEAR2\WindowsAzure\Services\Blob\Models\ContainerACL::setSignedIdentifiers
     * @covers PEAR2\WindowsAzure\Services\Blob\Models\ContainerACL::getSignedIdentifiers
     */
    public function testSetSignedIdentifiers()
    {
        // Setup
        $sample = TestResources::getContainerACLOneEntrySample();
        $expectedEtag = '0x8CAFB82EFF70C46';
        $expectedLastModified = 'Sun, 25 Sep 2011 19:42:18 GMT';
        $expectedDate = WindowsAzureUtilities::rfc1123ToDateTime($expectedLastModified);
        $expectedPublicAccess = 'container';
        $acl = ContainerACL::create($expectedPublicAccess, $expectedEtag, 
            $expectedLastModified, $sample['SignedIdentifiers']);
        $expected = $acl->getSignedIdentifiers();
        $expected[0]->setId('newXid');
        
        // Test
        $acl->setSignedIdentifiers($expected);
        
        // Assert
        $this->assertEquals($expectedEtag, $acl->getEtag());
        $this->assertEquals($expectedDate, $acl->getLastModified());
        $this->assertEquals($expectedPublicAccess, $acl->getPublicAccess());
        $this->assertEquals($expected, $acl->getSignedIdentifiers());
    }
    
    /**
     * @covers PEAR2\WindowsAzure\Services\Blob\Models\ContainerACL::setLastModified
     * @covers PEAR2\WindowsAzure\Services\Blob\Models\ContainerACL::getLastModified
     */
    public function testSetLastModified()
    {
        // Setup
        $expected = WindowsAzureUtilities::rfc1123ToDateTime('Sun, 25 Sep 2011 19:42:18 GMT');
        $acl = new ContainerACL();
        $acl->setLastModified($expected);
        
        // Test
        $acl->setLastModified($expected);
        
        // Assert
        $this->assertEquals($expected, $acl->getLastModified());
    }
    
    /**
     * @covers PEAR2\WindowsAzure\Services\Blob\Models\ContainerACL::setEtag
     * @covers PEAR2\WindowsAzure\Services\Blob\Models\ContainerACL::getEtag
     */
    public function testSetEtag()
    {
        // Setup
        $expected = '0x8CAFB82EFF70C46';
        $acl = new ContainerACL();
        $acl->setEtag($expected);
        
        // Test
        $acl->setEtag($expected);
        
        // Assert
        $this->assertEquals($expected, $acl->getEtag());
    }
    
    /**
     * @covers PEAR2\WindowsAzure\Services\Blob\Models\ContainerACL::setPublicAccess
     * @covers PEAR2\WindowsAzure\Services\Blob\Models\ContainerACL::getPublicAccess
     */
    public function testSetPublicAccess()
    {
        // Setup
        $expected = 'container';
        $acl = new ContainerACL();
        $acl->setPublicAccess($expected);
        
        // Test
        $acl->setPublicAccess($expected);
        
        // Assert
        $this->assertEquals($expected, $acl->getPublicAccess());
    }
    
    /**
     * @covers PEAR2\WindowsAzure\Services\Blob\Models\ContainerACL::toXml
     * @covers PEAR2\WindowsAzure\Services\Blob\Models\ContainerACL::toArray
     * @depends testCreateMultipleEntries
     */
    public function testToXml($acl)
    {
        // Setup
        $sample = TestResources::getContainerACLMultipleEntriesSample();
        $expected = ContainerACL::create('container', 
            '123', 'Sun, 25 Sep 2011 19:42:18 GMT', $sample['SignedIdentifiers']);
        
        // Test
        $xml = $acl->toXml();
        
        // Assert
        $array = Utilities::unserialize($xml);
        $acl = ContainerACL::create('container', '123', 'Sun, 25 Sep 2011 19:42:18 GMT', $array);
        $this->assertEquals($expected->getSignedIdentifiers(), $acl->getSignedIdentifiers());
    }
}

?>
