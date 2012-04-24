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
use PEAR2\WindowsAzure\Services\Blob\Models\CreateBlobSnapshotResult;
use PEAR2\WindowsAzure\Services\Blob\Models\AccessCondition;

/**
 * Unit tests for class SnapshotBlobResult
 *
 * @category  Microsoft
 * @package   PEAR2\Tests\Unit\WindowsAzure\Services\Blob\Models
 * @author    Albert Cheng <gongchen at the largest software company>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
class CreateBlobSnapshotResultTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers PEAR2\WindowsAzure\Services\Blob\Models\CreateBlobSnapshotResult::getSnapshot
     * @covers PEAR2\WindowsAzure\Services\Blob\Models\CreateBlobSnapshotResult::setSnapshot
     */
    public function testSetSnapshot()
    {
        $createBlobSnapshotResult = new CreateBlobSnapshotResult();
        $expected = new \DateTime("2008-8-8");
        $createBlobSnapshotResult->setSnapshot($expected);
        
        $this->assertEquals(
            $expected,
            $createBlobSnapshotResult->getSnapshot()
            );
    }
    
    /**
     * @covers PEAR2\WindowsAzure\Services\Blob\Models\CreateBlobSnapshotResult::getETag
     * @covers PEAR2\WindowsAzure\Services\Blob\Models\CreateBlobSnapshotResult::setETag
     */
    public function testSetETag()
    {
        $createBlobSnapshotResult = new CreateBlobSnapshotResult();
        $expected = "12345678";
        $createBlobSnapshotResult->setETag($expected);
        
        $this->assertEquals(
            $expected,
            $createBlobSnapshotResult->getETag()
            );
    }
    
    /**
     * @covers PEAR2\WindowsAzure\Services\Blob\Models\CreateBlobSnapshotResult::getLastModified
     * @covers PEAR2\WindowsAzure\Services\Blob\Models\CreateBlobSnapshotResult::setLastModified
     */
    public function testSetLastModified()
    {
        $createBlobSnapshotResult = new CreateBlobSnapshotResult();
        $expected = new \DateTime("2008-8-8");
        $createBlobSnapshotResult->setLastModified($expected);
        
        $this->assertEquals(
            $expected,
            $createBlobSnapshotResult->getLastModified()
            );
        
    }
    
    /**
     * @covers PEAR2\WindowsAzure\Services\Blob\Models\CreateBlobSnapshotResult::getRequestId
     * @covers PEAR2\WindowsAzure\Services\Blob\Models\CreateBlobSnapshotResult::setRequestId
     */
    public function testSetRequestId()
    {
        $createBlobSnapshotResult = new CreateBlobSnapshotResult();
        $expected = "12345";
        $createBlobSnapshotResult->setRequestId($expected);
        
        $this->assertEquals(
            $expected,
            $createBlobSnapshotResult->getRequestId($expected)
            );
    }
    
    /**
     * @covers PEAR2\WindowsAzure\Services\Blob\Models\CreateBlobSnapshotResult::getVersion
     * @covers PEAR2\WindowsAzure\Services\Blob\Models\CreateBlobSnapshotResult::setVersion
     */
    public function testSetVersion()
    {
        $createBlobSnapshotResult = new CreateBlobSnapshotResult();
        $expected = "2008-8-8";
        $createBlobSnapshotResult->setVersion($expected);
        
        $this->assertEquals(
            $expected,
            $createBlobSnapshotResult->getVersion()
            );
    }
    
    /**
     * @covers PEAR2\WindowsAzure\Services\Blob\Models\CreateBlobSnapshotResult::getDate
     * @covers PEAR2\WindowsAzure\Services\Blob\Models\CreateBlobSnapshotResult::setDate
     */
    public function testSetDate()
    {
        $createBlobSnapshotResult = new CreateBlobSnapshotResult();
        $expected = new \DateTime("2008-8-8");
        $createBlobSnapshotResult->setDate($expected);
        
        $this->assertEquals(
            $expected,
            $createBlobSnapshotResult->getDate()
            );
    }
}
?>
