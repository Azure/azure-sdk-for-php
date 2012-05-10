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
use WindowsAzure\Utilities;
use WindowsAzure\Services\Blob\Models\SetBlobMetadataResult;

/**
 * Unit tests for class SetBlobMetadataResult
 *
 * @category  Microsoft
 * @package   Tests\Unit\WindowsAzure\Services\Blob\Models
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
class SetBlobMetadataResultTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers WindowsAzure\Services\Blob\Models\SetBlobMetadataResult::getEtag
     */
    public function testGetEtag()
    {
        // Setup
        $getBlobMetadataResult = new SetBlobMetadataResult();
        $expected = '0x8CACB9BD7C6B1B2';
        $getBlobMetadataResult->setEtag($expected);
        
        // Test
        $actual = $getBlobMetadataResult->getEtag();
        
        // Assert
        $this->assertEquals($expected, $actual);
    }
    
    /**
     * @covers WindowsAzure\Services\Blob\Models\SetBlobMetadataResult::setEtag
     */
    public function testSetEtag()
    {
        // Setup
        $getBlobMetadataResult = new SetBlobMetadataResult();
        $expected = '0x8CACB9BD7C6B1B2';
        
        // Test
        $getBlobMetadataResult->setEtag($expected);
        
        // Assert
        $actual = $getBlobMetadataResult->getEtag();
        $this->assertEquals($expected, $actual);
    }
    
    /**
     * @covers WindowsAzure\Services\Blob\Models\SetBlobMetadataResult::getLastModified
     */
    public function testGetLastModified()
    {
        // Setup
        $getBlobMetadataResult = new SetBlobMetadataResult();
        $expected = Utilities::rfc1123ToDateTime('Fri, 09 Oct 2009 21:04:30 GMT');
        $getBlobMetadataResult->setLastModified($expected);
        
        // Test
        $actual = $getBlobMetadataResult->getLastModified();
        
        // Assert
        $this->assertEquals($expected, $actual);
    }
    
    /**
     * @covers WindowsAzure\Services\Blob\Models\SetBlobMetadataResult::setLastModified
     */
    public function testSetLastModified()
    {
        // Setup
        $getBlobMetadataResult = new SetBlobMetadataResult();
        $expected = Utilities::rfc1123ToDateTime('Fri, 09 Oct 2009 21:04:30 GMT');
        
        // Test
        $getBlobMetadataResult->setLastModified($expected);
        
        // Assert
        $actual = $getBlobMetadataResult->getLastModified();
        $this->assertEquals($expected, $actual);
    }
}

?>
