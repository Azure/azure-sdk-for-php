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
use PEAR2\WindowsAzure\Services\Blob\Models\CopyBlobResult;
use PEAR2\WindowsAzure\Services\Blob\Models\AccessCondition;

/**
 * Unit tests for class CopyBlobResult
 *
 * @category  Microsoft
 * @package   PEAR2\Tests\Unit\WindowsAzure\Services\Blob\Models
 * @author    Albert Cheng <gongchen at the largest software company>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
class CopyBlobResultTest extends \PHPUnit_Framework_TestCase
{
    public function testSetETag()
    {
        $copyBlobResult = new CopyBlobResult();
        $expected = "123456789";
        $copyBlobResult->setETag($expected);
        
        $this->assertEquals(
            $expected,
            $copyBlobResult->getETag()
            );
    }
    
    public function testSetLastModified()
    {
        $copyBlobResult = new CopyBlobResult();
        $expected = new \DateTime("2008-8-8");
        $copyBlobResult->setLastModified($expected);
        
        $this->assertEquals(
            $expected,
            $copyBlobResult->getLastModified()
            );
    }
    
    public function testSetRequestId()
    {
        $copyBlobResult = new CopyBlobResult();
        $expected = "123456789";
        $copyBlobResult->setRequestId($expected);
        
        $this->assertEquals(
            $expected,
            $copyBlobResult->getRequestId()
            );
    }
    
    public function testSetVersion()
    {
        $copyBlobResult = new CopyBlobResult();
        $expected = "123456789";
        $copyBlobResult->setVersion($expected);
        
        $this->assertEquals(
            $expected,
            $copyBlobResult->getVersion()
            );
    }
    
    public function testSetDate()
    {
        $copyBlobResult = new CopyBlobResult();
        $expected = new \DateTime("2008-8-8");
        $copyBlobResult->setDate($expected);
        
        $this->assertEquals(
            $expected,
            $copyBlobResult->getDate()
            );
                
    }
}
?>
