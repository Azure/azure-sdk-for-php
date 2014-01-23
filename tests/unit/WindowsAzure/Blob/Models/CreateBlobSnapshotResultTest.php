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
use Tests\Framework\TestResources;
use WindowsAzure\Common\Internal\Utilities;
use WindowsAzure\Blob\Models\CreateBlobSnapshotResult;
use WindowsAzure\Blob\Models\AccessCondition;

/**
 * Unit tests for class SnapshotBlobResult
 *
 * @category  Microsoft
 * @package   Tests\Unit\WindowsAzure\Blob\Models
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: 0.4.0_2014-01
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
class CreateBlobSnapshotResultTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers WindowsAzure\Blob\Models\CreateBlobSnapshotResult::getSnapshot
     * @covers WindowsAzure\Blob\Models\CreateBlobSnapshotResult::setSnapshot
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
     * @covers WindowsAzure\Blob\Models\CreateBlobSnapshotResult::getETag
     * @covers WindowsAzure\Blob\Models\CreateBlobSnapshotResult::setETag
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
     * @covers WindowsAzure\Blob\Models\CreateBlobSnapshotResult::getLastModified
     * @covers WindowsAzure\Blob\Models\CreateBlobSnapshotResult::setLastModified
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
}

