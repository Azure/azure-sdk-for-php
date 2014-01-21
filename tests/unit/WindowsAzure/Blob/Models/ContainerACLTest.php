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
use WindowsAzure\Blob\Models\ContainerAcl;
use Tests\Framework\TestResources;
use WindowsAzure\Common\Internal\Resources;
use WindowsAzure\Common\Internal\Utilities;
use WindowsAzure\Common\Internal\Serialization\XmlSerializer;

/**
 * Unit tests for class ContainerAcl
 *
 * @category  Microsoft
 * @package   Tests\Unit\WindowsAzure\Blob\Models
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: 0.4.0_2014-01
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
class ContainerAclTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers WindowsAzure\Blob\Models\ContainerAcl::create
     * @covers WindowsAzure\Blob\Models\ContainerAcl::getPublicAccess
     * @covers WindowsAzure\Blob\Models\ContainerAcl::getSignedIdentifiers
     * @covers WindowsAzure\Blob\Models\ContainerAcl::addSignedIdentifier
     */
    public function testCreateEmpty()
    {
        // Setup
        $sample = Resources::EMPTY_STRING;
        $expectedPublicAccess = 'container';
        
        // Test
        $acl = ContainerAcl::create($expectedPublicAccess, $sample);
        
        // Assert
        $this->assertEquals($expectedPublicAccess, $acl->getPublicAccess());
        $this->assertCount(0, $acl->getSignedIdentifiers());
    }
    
    /**
     * @covers WindowsAzure\Blob\Models\ContainerAcl::create
     * @covers WindowsAzure\Blob\Models\ContainerAcl::getPublicAccess
     * @covers WindowsAzure\Blob\Models\ContainerAcl::getSignedIdentifiers
     * @covers WindowsAzure\Blob\Models\ContainerAcl::addSignedIdentifier
     */
    public function testCreateOneEntry()
    {
        // Setup
        $sample = TestResources::getContainerAclOneEntrySample();
        $expectedPublicAccess = 'container';
        
        // Test
        $acl = ContainerAcl::create($expectedPublicAccess, $sample['SignedIdentifiers']);
        
        // Assert
        $this->assertEquals($expectedPublicAccess, $acl->getPublicAccess());
        $this->assertCount(1, $acl->getSignedIdentifiers());
    }
    
    /**
     * @covers WindowsAzure\Blob\Models\ContainerAcl::create
     * @covers WindowsAzure\Blob\Models\ContainerAcl::getPublicAccess
     * @covers WindowsAzure\Blob\Models\ContainerAcl::getSignedIdentifiers
     * @covers WindowsAzure\Blob\Models\ContainerAcl::addSignedIdentifier
     */
    public function testCreateMultipleEntries()
    {
        // Setup
        $sample = TestResources::getContainerAclMultipleEntriesSample();
        $expectedPublicAccess = 'container';
        
        // Test
        $acl = ContainerAcl::create($expectedPublicAccess, $sample['SignedIdentifiers']);
        
        // Assert
        $this->assertEquals($expectedPublicAccess, $acl->getPublicAccess());
        $this->assertCount(2, $acl->getSignedIdentifiers());
        
        return $acl;
    }
    
    /**
     * @covers WindowsAzure\Blob\Models\ContainerAcl::setSignedIdentifiers
     * @covers WindowsAzure\Blob\Models\ContainerAcl::getSignedIdentifiers
     */
    public function testSetSignedIdentifiers()
    {
        // Setup
        $sample = TestResources::getContainerAclOneEntrySample();
        $expectedPublicAccess = 'container';
        $acl = ContainerAcl::create($expectedPublicAccess, $sample['SignedIdentifiers']);
        $expected = $acl->getSignedIdentifiers();
        $expected[0]->setId('newXid');
        
        // Test
        $acl->setSignedIdentifiers($expected);
        
        // Assert
        $this->assertEquals($expectedPublicAccess, $acl->getPublicAccess());
        $this->assertEquals($expected, $acl->getSignedIdentifiers());
    }
    
    /**
     * @covers WindowsAzure\Blob\Models\ContainerAcl::setPublicAccess
     * @covers WindowsAzure\Blob\Models\ContainerAcl::getPublicAccess
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
     * @covers WindowsAzure\Blob\Models\ContainerAcl::toXml
     * @covers WindowsAzure\Blob\Models\ContainerAcl::toArray
     * @depends testCreateMultipleEntries
     */
    public function testToXml($acl)
    {
        // Setup
        $sample = TestResources::getContainerAclMultipleEntriesSample();
        $expected = ContainerAcl::create('container', $sample['SignedIdentifiers']);
        $xmlSerializer = new XmlSerializer();
        
        // Test
        $xml = $acl->toXml($xmlSerializer);
        
        // Assert
        $array = Utilities::unserialize($xml);
        $acl = ContainerAcl::create('container', $array);
        $this->assertEquals($expected->getSignedIdentifiers(), $acl->getSignedIdentifiers());
    }
}


