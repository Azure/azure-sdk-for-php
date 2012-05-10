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
use WindowsAzure\Services\Blob\Models\ContainerAcl;
use Tests\Framework\TestResources;
use WindowsAzure\Resources;
use WindowsAzure\Core\WindowsAzureUtilities;
use WindowsAzure\Utilities;
use WindowsAzure\Core\Serialization\XmlSerializer;

/**
 * Unit tests for class ContainerAcl
 *
 * @category  Microsoft
 * @package   Tests\Unit\WindowsAzure\Services\Blob\Models
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
class ContainerAclTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers WindowsAzure\Services\Blob\Models\ContainerAcl::create
     * @covers WindowsAzure\Services\Blob\Models\ContainerAcl::getEtag
     * @covers WindowsAzure\Services\Blob\Models\ContainerAcl::getLastModified
     * @covers WindowsAzure\Services\Blob\Models\ContainerAcl::getPublicAccess
     * @covers WindowsAzure\Services\Blob\Models\ContainerAcl::getSignedIdentifiers
     * @covers WindowsAzure\Services\Blob\Models\ContainerAcl::addSignedIdentifier
     */
    public function testCreateEmpty()
    {
        // Setup
        $sample = Resources::EMPTY_STRING;
        $expectedEtag = '0x8CAFB82EFF70C46';
        $expectedDate = new \DateTime('Sun, 25 Sep 2011 19:42:18 GMT');
        $expectedPublicAccess = 'container';
        
        // Test
        $acl = ContainerAcl::create($expectedPublicAccess, $expectedEtag, 
            $expectedDate, $sample);
        
        // Assert
        $this->assertEquals($expectedEtag, $acl->getEtag());
        $this->assertEquals($expectedDate, $acl->getLastModified());
        $this->assertEquals($expectedPublicAccess, $acl->getPublicAccess());
        $this->assertCount(0, $acl->getSignedIdentifiers());
    }
    
    /**
     * @covers WindowsAzure\Services\Blob\Models\ContainerAcl::create
     * @covers WindowsAzure\Services\Blob\Models\ContainerAcl::getEtag
     * @covers WindowsAzure\Services\Blob\Models\ContainerAcl::getLastModified
     * @covers WindowsAzure\Services\Blob\Models\ContainerAcl::getPublicAccess
     * @covers WindowsAzure\Services\Blob\Models\ContainerAcl::getSignedIdentifiers
     * @covers WindowsAzure\Services\Blob\Models\ContainerAcl::addSignedIdentifier
     */
    public function testCreateOneEntry()
    {
        // Setup
        $sample = TestResources::getContainerAclOneEntrySample();
        $expectedEtag = '0x8CAFB82EFF70C46';
        $expectedDate = new \DateTime('Sun, 25 Sep 2011 19:42:18 GMT');
        $expectedPublicAccess = 'container';
        
        // Test
        $acl = ContainerAcl::create($expectedPublicAccess, $expectedEtag, 
            $expectedDate, $sample['SignedIdentifiers']);
        
        // Assert
        $this->assertEquals($expectedEtag, $acl->getEtag());
        $this->assertEquals($expectedDate, $acl->getLastModified());
        $this->assertEquals($expectedPublicAccess, $acl->getPublicAccess());
        $this->assertCount(1, $acl->getSignedIdentifiers());
    }
    
    /**
     * @covers WindowsAzure\Services\Blob\Models\ContainerAcl::create
     * @covers WindowsAzure\Services\Blob\Models\ContainerAcl::getEtag
     * @covers WindowsAzure\Services\Blob\Models\ContainerAcl::getLastModified
     * @covers WindowsAzure\Services\Blob\Models\ContainerAcl::getPublicAccess
     * @covers WindowsAzure\Services\Blob\Models\ContainerAcl::getSignedIdentifiers
     * @covers WindowsAzure\Services\Blob\Models\ContainerAcl::addSignedIdentifier
     */
    public function testCreateMultipleEntries()
    {
        // Setup
        $sample = TestResources::getContainerAclMultipleEntriesSample();
        $expectedEtag = '0x8CAFB82EFF70C46';
        $expectedDate = new \DateTime('Sun, 25 Sep 2011 19:42:18 GMT');
        $expectedPublicAccess = 'container';
        
        // Test
        $acl = ContainerAcl::create($expectedPublicAccess, $expectedEtag, 
            $expectedDate, $sample['SignedIdentifiers']);
        
        // Assert
        $this->assertEquals($expectedEtag, $acl->getEtag());
        $this->assertEquals($expectedDate, $acl->getLastModified());
        $this->assertEquals($expectedPublicAccess, $acl->getPublicAccess());
        $this->assertCount(2, $acl->getSignedIdentifiers());
        
        return $acl;
    }
    
    /**
     * @covers WindowsAzure\Services\Blob\Models\ContainerAcl::setSignedIdentifiers
     * @covers WindowsAzure\Services\Blob\Models\ContainerAcl::getSignedIdentifiers
     */
    public function testSetSignedIdentifiers()
    {
        // Setup
        $sample = TestResources::getContainerAclOneEntrySample();
        $expectedEtag = '0x8CAFB82EFF70C46';
        $expectedDate = new \DateTime('Sun, 25 Sep 2011 19:42:18 GMT');
        $expectedPublicAccess = 'container';
        $acl = ContainerAcl::create($expectedPublicAccess, $expectedEtag, 
            $expectedDate, $sample['SignedIdentifiers']);
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
     * @covers WindowsAzure\Services\Blob\Models\ContainerAcl::setLastModified
     * @covers WindowsAzure\Services\Blob\Models\ContainerAcl::getLastModified
     */
    public function testSetLastModified()
    {
        // Setup
        $expected = new \DateTime('Sun, 25 Sep 2011 19:42:18 GMT');
        $acl = new ContainerAcl();
        $acl->setLastModified($expected);
        
        // Test
        $acl->setLastModified($expected);
        
        // Assert
        $this->assertEquals($expected, $acl->getLastModified());
    }
    
    /**
     * @covers WindowsAzure\Services\Blob\Models\ContainerAcl::setEtag
     * @covers WindowsAzure\Services\Blob\Models\ContainerAcl::getEtag
     */
    public function testSetEtag()
    {
        // Setup
        $expected = '0x8CAFB82EFF70C46';
        $acl = new ContainerAcl();
        $acl->setEtag($expected);
        
        // Test
        $acl->setEtag($expected);
        
        // Assert
        $this->assertEquals($expected, $acl->getEtag());
    }
    
    /**
     * @covers WindowsAzure\Services\Blob\Models\ContainerAcl::setPublicAccess
     * @covers WindowsAzure\Services\Blob\Models\ContainerAcl::getPublicAccess
     */
    public function testSetPublicAccess()
    {
        // Setup
        $expected = 'container';
        $acl = new ContainerAcl();
        $acl->setPublicAccess($expected);
        
        // Test
        $acl->setPublicAccess($expected);
        
        // Assert
        $this->assertEquals($expected, $acl->getPublicAccess());
    }
    
    /**
     * @covers WindowsAzure\Services\Blob\Models\ContainerAcl::toXml
     * @covers WindowsAzure\Services\Blob\Models\ContainerAcl::toArray
     * @depends testCreateMultipleEntries
     */
    public function testToXml($acl)
    {
        // Setup
        $sample = TestResources::getContainerAclMultipleEntriesSample();
        $expected = ContainerAcl::create(
            'container',
            '123',
            new \DateTime('Sun, 25 Sep 2011 19:42:18 GMT'),
            $sample['SignedIdentifiers']
        );
        $xmlSerializer = new XmlSerializer();
        
        // Test
        $xml = $acl->toXml($xmlSerializer);
        
        // Assert
        $array = Utilities::unserialize($xml);
        $acl = ContainerAcl::create(
            'container',
            '123',
            new \DateTime('Sun, 25 Sep 2011 19:42:18 GMT'),
            $array
        );
        $this->assertEquals($expected->getSignedIdentifiers(), $acl->getSignedIdentifiers());
    }
}

?>
