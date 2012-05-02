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
 * @author    Albert Cheng <gongchen at the largest software company> 
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
namespace Tests\Unit\WindowsAzure\Services\Blob\Models;
use Tests\Framework\TestResources;
use WindowsAzure\Core\WindowsAzureUtilities;
use WindowsAzure\Services\Blob\Models\AccessCondition;
use WindowsAzure\Services\Blob\Models\CopyBlobOptions;
use WindowsAzure\Services\Blob\Models\SourceAccessCondition;

/**
 * Unit tests for class CopyBlobBlobOptions
 *
 * @category  Microsoft
 * @package   PEAR2\Tests\Unit\WindowsAzure\Services\Blob\Models
 * @author    Albert Cheng <gongchen at the largest software company>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
class CopyBlobOptionsTest extends \PHPUnit_Framework_TestCase
{  
    /** 
     * @covers WindowsAzure\Services\Blob\Models\CopyBlobOptions::setCopySource
     * @covers WindowsAzure\Services\Blob\Models\CopyBlobOptions::getCopySource
     */
    public function testSetCopySource()
    {
        $copyBlobOptions = new CopyBlobOptions();
        $expected = "\container1\blob1";
        
        $copyBlobOptions->setCopySource($expected);
        $this->assertEquals(
            $expected,
            $copyBlobOptions->getCopySource()
            );
    }
    
    /** 
     * @covers WindowsAzure\Services\Blob\Models\CopyBlobOptions::setMetadata
     * @covers WindowsAzure\Services\Blob\Models\CopyBlobOptions::getMetadata
     */
    public function testSetMetadata()
    {
        $copyBlobOptions = new CopyBlobOptions();
        $expected = array('key1' => 'value1', 'key2' => 'value2');
        $copyBlobOptions->setMetadata($expected);
        
        $this->assertEquals(
            $expected,
            $copyBlobOptions->getMetadata()
            );
    }
    
    /**
     * @covers WindowsAzure\Services\Blob\Models\CopyBlobOptions::setAccessCondition
     * @covers WindowsAzure\Services\Blob\Models\CopyBlobOptions::getAccessCondition
     */
    public function testSetAccessCondition()
    {
        $copyBlobOptions = new CopyBlobOptions();
        $expected = AccessCondition::ifMatch("12345");
        $copyBlobOptions->setAccessCondition($expected);
        
        $this->assertEquals(
            $expected,
            $copyBlobOptions->getAccessCondition()
        );
    }
    
    /**
     * @covers WindowsAzure\Services\Blob\Models\CopyBlobOptions::setSourceAccessCondition
     * @covers WindowsAzure\Services\Blob\Models\CopyBlobOptions::getSourceAccessCondition
     */
    public function testSetSourceAccessCondition()
    {
        $copyBlobOptions = new CopyBlobOptions();
        $expected = SourceAccessCondition::sourceIfMatch("x");
        $copyBlobOptions->setSourceAccessCondition($expected);
        
        $this->assertEquals(
            $expected,
            $copyBlobOptions->getSourceAccessCondition()
         );
    }
    
    /** 
     * @covers WindowsAzure\Services\Blob\Models\CopyBlobOptions::setLeaseId
     * @covers WindowsAzure\Services\Blob\Models\CopyBlobOptions::getLeaseId
     */
    public function testSetLeaseId()
    {
        $expected = '0x8CAFB82EFF70C46';
        $options = new CopyBlobOptions();
        
        $options->setLeaseId($expected);
        $this->assertEquals($expected, $options->getLeaseId());
    }
    
    /** 
     * @covers WindowsAzure\Services\Blob\Models\CopyBlobOptions::setSourceLeaseId
     * @covers WindowsAzure\Services\Blob\Models\CopyBlobOptions::getSourceLeaseId
     */
    public function testSetSourceLeaseId()
    {
        $expected = '0x8CAFB82EFF70C46';
        $options = new CopyBlobOptions();
        
        $options->setSourceLeaseId($expected);
        $this->assertEquals($expected, $options->getSourceLeaseId());
    }
}
?>
