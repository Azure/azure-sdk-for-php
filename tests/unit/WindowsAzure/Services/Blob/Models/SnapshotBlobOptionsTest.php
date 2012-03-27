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
 * @author    Albert Cheng <gongchen at the largest software company> 
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
namespace PEAR2\Tests\Unit\WindowsAzure\Services\Blob\Models;
use PEAR2\Tests\Framework\TestResources;
use PEAR2\WindowsAzure\Core\WindowsAzureUtilities;
use PEAR2\WindowsAzure\Services\Blob\Models\SnapshotBlobOptions;

/**
 * Unit tests for class SnapshotBlobOptions
 *
 * @category  Microsoft
 * @package   PEAR2\Tests\Unit\WindowsAzure\Services\Blob\Models
 * @author    Albert Cheng <gongchen at the largest software company>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
class SnapshotBlobOptionsTest extends \PHPUnit_Framework_TestCase
{
    public function testSetDate()
    {
        $snapshotBlobOptions = new SnapshotBlobOptions();
        $expected = new \DateTime("2011-8-8");
        
        $snapshotBlobOptions->setDate($expected);
        
        $this->assertEquals(
            $expected,
            $snapshotBlobOptions->getDate()
            );
    }
    
    public function testSetVersion()
    {
        $snapshotBlobOptions = new SnapshotBlobOptions();
        $expected = "2008-8-8";
        
        $snapshotBlobOptions->setVersion($expected);
        
        $this->assertEquals(
            $expected,
            $snapshotBlobOptions->getVersion()
            );
             
    }
    
    public function testSetMetadata()
    {
        $snapshotBlobOptions = new SnapshotBlobOptions();
        $expected = array('key1' => 'value1', 'key2' => 'value2');
        $snapshotBlobOptions->setMetadata($expected);
        
        $this->assertEquals(
            $expected,
            $snapshotBlobOptions->getMetadata()
            );
    }
    
    public function testSetIfModifiedSince()
    {
        $snapshotBlobOptions = new SnapshotBlobOptions();
        $expected = new \DateTime("2008-8-8");
        $snapshotBlobOptions->setIfModifiedSince($expected);
        
        $this->assertEquals(
            $expected,
            $snapshotBlobOptions->getIfModifiedSince()
            );
    }
    
    public function testSetIfUnmodifiedSince()
    {
        $snapshotBlobOptions = new SnapshotBlobOptions();
        $expected = new \DateTime("2008-8-8");
        $snapshotBlobOptions->setIfUnmodifiedSince($expected);
        
        $this->assertEquals(
            $expected,
            $snapshotBlobOptions->getIfUnmodifiedSince()
            );
    }
    
    public function testSetIfMatch()
    {
        $snapshotBlobOptions = new SnapshotBlobOptions();
        $expected = "12345678";
        $snapshotBlobOptions->setIfMatch($expected);
        
        $this->assertEquals(
            $expected,
            $snapshotBlobOptions->getIfMatch()
            );
    }
    
    public function testSetIfNoneMatch()
    {
        $snapshotBlobOptions = new SnapshotBlobOptions();
        $expected = "12345678";
        $snapshotBlobOptions->setIfNoneMatch($expected);
        
        $this->assertEquals(
            $expected,
            $snapshotBlobOptions->getIfNoneMatch()
            );
    }
    
    public function testSetLeaseId()
    {
        $snapshotBlobOptions = new SnapshotBlobOptions();
        $expected = "123456789";
        $snapshotBlobOptions->setLeaseId($expected);
        
        $this->assertEquals(
            $expected,
            $snapshotBlobOptions->getLeaseId()
            );
        
    }
}
?>
