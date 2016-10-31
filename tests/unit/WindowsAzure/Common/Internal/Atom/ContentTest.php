<?php

/**
 * LICENSE: Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 * http://www.apache.org/licenses/LICENSE-2.0.
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
 *
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 *
 * @link      https://github.com/WindowsAzure/azure-sdk-for-php
 */

namespace Tests\unit\WindowsAzure\Common\Internal\Atom;

use WindowsAzure\Common\Internal\Atom\Content;


/**
 * Unit tests for class WrapAccessTokenResult.
 *
 * @category  Microsoft
 *
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 *
 * @version   Release: 0.5.0_2016-11
 *
 * @link      https://github.com/WindowsAzure/azure-sdk-for-php
 */
class ContentTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers \WindowsAzure\Common\Internal\Atom\Content::__construct
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
     * @covers \WindowsAzure\Common\Internal\Atom\Content::getText
     * @covers \WindowsAzure\Common\Internal\Atom\Content::setText
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
     * @covers \WindowsAzure\Common\Internal\Atom\Content::getType
     * @covers \WindowsAzure\Common\Internal\Atom\Content::setType
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
     * @covers \WindowsAzure\Common\Internal\Atom\Content::writeXml
     */
    public function testWriteXml()
    {
        // Setup
        $expected = '<atom:content type="testType" xmlns:atom="http://www.w3.org/2005/Atom">testText</atom:content>';
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

    /**
     * @covers \WindowsAzure\Common\Internal\Atom\Content::parseXml
     */
    public function testParseXmlSuccess()
    {
        // Setup
        $expected = new Content();
        $xml = '<content key="value"/>';

        // Test
        $actual = new Content();
        $actual->parseXml($xml);

        // Assert
        $this->assertEquals(
            $expected->getText(),
            $actual->getText()
        );
    }

    /**
     * @covers \WindowsAzure\Common\Internal\Atom\Content::parseXml
     */
    public function testParseXmlInvalidParameter()
    {
        // Setup
        $this->setExpectedException(get_class(new \InvalidArgumentException()));
        $content = new Content();

        // Test
        $content->parseXml(null);
    }

    /**
     * @covers \WindowsAzure\Common\Internal\Atom\Content::parseXml
     */
    public function testWriteXmlSuccess()
    {
        // Setup
        $expected = '<atom:content xmlns:atom="http://www.w3.org/2005/Atom"></atom:content>';
        $content = new Content();

        // Test
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

    /**
     * @covers \WindowsAzure\Common\Internal\Atom\Content::getXml
     */
    public function testGetXml()
    {

        // Setup
        $xml = '<atom:content xmlns:atom="http://www.w3.org/2005/Atom"></atom:content>';
        $content = new Content();
        $content->parseXml($xml);

        // Test
        $result = $content->getXml();

        // Assert
        $this->assertNotNull($result);
        $this->assertInstanceOf('\SimpleXMLElement', $result);
    }

    /**
     * @covers \WindowsAzure\Common\Internal\Atom\Content::fromXml
     */
    public function testFromXml()
    {

        // Setup
        $testText = 'SomeName';
        $testKey = 'name';
        $innerText = '<test>test string</test>';
        $xmlString = "<content>{$innerText}</content>";
        $atomContent = new Content();
        $xml = simplexml_load_string($xmlString);

        // Test
        $atomContent->fromXml($xml);

        // Assert
        $this->assertEquals($innerText, $atomContent->getText());
        $this->assertEquals($xml, $atomContent->getXml());
    }
}
