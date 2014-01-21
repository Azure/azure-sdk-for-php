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
use WindowsAzure\Blob\Models\CreateBlobSnapshotOptions;

/**
 * Unit tests for class CreateBlobSnapshotOptions
 *
 * @category  Microsoft
 * @package   Tests\Unit\WindowsAzure\Blob\Models
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: 0.4.0_2014-01
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
class CreateBlobSnapshotOptionsTest extends \PHPUnit_Framework_TestCase
{  
    /**
     * @covers WindowsAzure\Blob\Models\CreateBlobSnapshotOptions::setMetadata
     * @covers WindowsAzure\Blob\Models\CreateBlobSnapshotOptions::getMetadata
     */
    public function testSetMetadata()
    {
        $createBlobSnapshotOptions = new CreateBlobSnapshotOptions();
        $expected = array('key1' => 'value1', 'key2' => 'value2');
        $createBlobSnapshotOptions->setMetadata($expected);
        
        $this->assertEquals(
            $expected,
            $createBlobSnapshotOptions->getMetadata()
        );
    }
    
    
    /**
     * @covers WindowsAzure\Blob\Models\CreateBlobSnapshotOptions::setLeaseId
     * @covers WindowsAzure\Blob\Models\CreateBlobSnapshotOptions::getLeaseId
     */
    public function testSetLeaseId()
    {
        $createBlobSnapshotOptions = new CreateBlobSnapshotOptions();
        $expected = "123456789";
        $createBlobSnapshotOptions->setLeaseId($expected);
        
        $this->assertEquals(
            $expected,
            $createBlobSnapshotOptions->getLeaseId()
        );
    }
}

