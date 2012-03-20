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
use PEAR2\WindowsAzure\Services\Blob\Models\GetContainerACLResult;
use PEAR2\WindowsAzure\Services\Blob\Models\ContainerACL;
use PEAR2\Tests\Framework\TestResources;
use PEAR2\WindowsAzure\Resources;
use PEAR2\WindowsAzure\Core\WindowsAzureUtilities;

/**
 * Unit tests for class GetContainerACLResult
 *
 * @category  Microsoft
 * @package   PEAR2\Tests\Unit\WindowsAzure\Services\Blob\Models
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
class GetContainerACLResultTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers PEAR2\WindowsAzure\Services\Blob\Models\GetContainerACLResult::create
     */
    public function testCreate()
    {
        // Setup
        $sample = Resources::EMPTY_STRING;
        $expectedEtag = '0x8CAFB82EFF70C46';
        $expectedLastModified = 'Sun, 25 Sep 2011 19:42:18 GMT';
        $expectedDate = WindowsAzureUtilities::rfc1123ToDateTime($expectedLastModified);
        $expectedPublicAccess = 'container';
        
        // Test
        $result = GetContainerACLResult::create($expectedPublicAccess, $expectedEtag, 
            $expectedLastModified, $sample);
        
        // Assert
        $acl = $result->getContainerACL();
        $this->assertEquals($expectedEtag, $acl->getEtag());
        $this->assertEquals($expectedDate, $acl->getLastModified());
        $this->assertEquals($expectedPublicAccess, $acl->getPublicAccess());
        $this->assertCount(0, $acl->getSignedIdentifiers());
    }
    
    /**
     * @covers PEAR2\WindowsAzure\Services\Blob\Models\GetContainerACLResult::getContainerACL
     */
    public function testGetContainerACL()
    {
        // Setup
        $expected = new ContainerACL();
        $expected->setEtag('0x8CAFB82EFF70C46');
        $obj = new GetContainerACLResult();
        
        // Test
        $obj->setContainerACL($expected);
        
        // Assert
        $this->assertEquals($expected->getEtag(), $obj->getContainerACL()->getEtag());
        $this->assertCount(0, $obj->getContainerACL()->getSignedIdentifiers());
        $this->assertNull($obj->getContainerACL()->getLastModified());
    }
    
    /**
     * @covers PEAR2\WindowsAzure\Services\Blob\Models\GetContainerACLResult::setContainerACL
     */
    public function testSetContainerACL()
    {
        // Setup
        $expected = new ContainerACL();
        $expected->setEtag('0x8CAFB82EFF70C46');
        $obj = new GetContainerACLResult();
        $obj->setContainerACL($expected);
        
        // Test
        $actual = $obj->getContainerACL();
        
        // Assert
        $this->assertEquals($expected->getEtag(), $actual->getEtag());
        $this->assertCount(0, $actual->getSignedIdentifiers());
        $this->assertNull($actual->getLastModified());
    }
}

?>
