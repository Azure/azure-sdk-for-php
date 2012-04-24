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
use PEAR2\WindowsAzure\Services\Blob\Models\SnapshotBlobResult;
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
class SnapshotBlobResultTest extends \PHPUnit_Framework_TestCase
{
    public function testSetSnapshot()
    {
        $snapshotBlobResult = new SnapshotBlobResult();
        $expected = new \DateTime("2008-8-8");
        $snapshotBlobResult->setSnapshot($expected);
        
        $this->assertEquals(
            $expected,
            $snapshotBlobResult->getSnapshot()
            );
    }
    
    public function testSetETag()
    {
        $snapshotBlobResult = new SnapshotBlobResult();
        $expected = "12345678";
        $snapshotBlobResult->setETag($expected);
        
        $this->assertEquals(
            $expected,
            $snapshotBlobResult->getETag()
            );
    }
    
    public function testGetLastModified()
    {
        $snapshotBlobResult = new SnapshotBlobResult();
        $expected = new \DateTime("2008-8-8");
        $snapshotBlobResult->setLastModified($expected);
        
        $this->assertEquals(
            $expected,
            $snapshotBlobResult->getLastModified()
            );
        
    }
    
    public function testGetRequestId()
    {
        $snapshotBlobResult = new SnapshotBlobResult();
        $expected = "12345";
        $snapshotBlobResult->setRequestId($expected);
        
        $this->assertEquals(
            $expected,
            $snapshotBlobResult->getRequestId($expected)
            );
    }
    
    public function testGetVersion()
    {
        $snapshotBlobResult = new SnapshotBlobResult();
        $expected = "2008-8-8";
        $snapshotBlobResult->setVersion($expected);
        
        $this->assertEquals(
            $expected,
            $snapshotBlobResult->getVersion()
            );
    }
    
    public function testGetDate()
    {
        $snapshotBlobResult = new SnapshotBlobResult();
        $expected = new \DateTime("2008-8-8");
        $snapshotBlobResult->setDate($expected);
        
        $this->assertEquals(
            $expected,
            $snapshotBlobResult->getDate()
            );
    }
}
?>
