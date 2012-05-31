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
 * @package   Tests\Unit\WindowsAzure\Services\Queue\Models
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */

namespace Tests\Unit\WindowsAzure\Common\Internal\Atom;
use WindowsAzure\Common\Internal\Atom\Content;

/**
 * Unit tests for class WrapAccessTokenResult
 *
 * @category  Microsoft
 * @package   Tests\Unit\WindowsAzure\Services\Queue\Models
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
class ContentTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers WindowsAzure\Common\Internal\Atom\Content::__construct
     */
    public function testContentConstructor()
    {
        // Setup
        $expected = 'testText'; 

        // Test
        $content = new Content($expected);
        $actual = $content->getText(); 
        
        // Assert
        $this->assertNotNull($content);
        $this->assertEquals(
            $expected,
            $actual
        );
    }

    /**
     * @covers WindowsAzure\Common\Internal\Atom\Content::getText
     * @covers WindowsAzure\Common\Internal\Atom\Content::setText
     */
    public function testGetSetText()
    {
        // Setup
        $expected = 'testText';
        $content = new Content();
        
        // Test
        $content->setText($expected);
        $actual = $content->getText();

        // Assert
        $this->assertEquals(
            $expected,
            $actual
        );
    
    }

    /**
     * @covers WindowsAzure\Common\Internal\Atom\Content::getType
     * @covers WindowsAzure\Common\Internal\Atom\Content::setType 
     */
    public function testGetSetType()
    {
        // Setup
        $expected = 'text/plain';
        $content = new Content();

        // Test
        $content->setType($expected);
        $actual = $content->getType();
        
        // Assert
        $this->assertEquals(
            $expected,
            $actual
        );
    } 

    /**
     * @covers WindowsAzure\Common\Internal\Atom\Content::writeXml
     */
    public function testToXml()
    {
        // Setup
        $expected = '<atom:content type="testType">testText</atom:content>'; 
        $expectedContentType = 'testType';
        $expectedText = 'testText';
        $content = new Content();
        
        // Test
        $content->setType($expectedContentType);
        $content->setText($expectedText);
        $xmlWriter = new \XMLWriter();
        $xmlWriter->openMemory();
        $content->writeXml($xmlWriter);
        $actual = $xmlWriter->outputMemory();
        
        // Assert
        $this->assertEquals(
            $expected,
            $actual
        ); 

    }

}

?>
