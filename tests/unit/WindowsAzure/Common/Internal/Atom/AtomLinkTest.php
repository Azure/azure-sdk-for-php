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


use WindowsAzure\Common\Internal\Atom\AtomLink;

/**
 * Unit tests for class AtomLink.
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
class AtomLinkTest extends \PHPUnit_Framework_TestCase
{
    /**
     */
    public function testAtomLinkConstructor()
    {
        // Setup

        // Test
        $feed = new AtomLink();

        // Assert
        $this->assertNotNull($feed);
    }

    /** 
     * @covers \WindowsAzure\Common\Internal\Atom\AtomLink::getUndefinedContent
     * @covers \WindowsAzure\Common\Internal\Atom\AtomLink::setUndefinedContent
     */
    public function testGetSetUndefinedContent()
    {
        // Setup
        $expected = 'testUndefinedContent';
        $atomLink = new AtomLink();

        // Test
        $atomLink->setUndefinedContent($expected);
        $actual = $atomLink->getUndefinedContent();

        // Assert 
        $this->assertEquals(
            $expected,
            $actual
        );
    }

    /** 
     * @covers \WindowsAzure\Common\Internal\Atom\AtomLink::getHref
     * @covers \WindowsAzure\Common\Internal\Atom\AtomLink::setHref
     */
    public function testGetSetHref()
    {
        // Setup
        $expected = 'testHref';
        $atomLink = new AtomLink();

        // Test
        $atomLink->setHref($expected);
        $actual = $atomLink->getHref();

        // Assert 
        $this->assertEquals(
            $expected,
            $actual
        );
    }

    /** 
     * @covers \WindowsAzure\Common\Internal\Atom\AtomLink::getRel
     * @covers \WindowsAzure\Common\Internal\Atom\AtomLink::setRel
     */
    public function testGetSetRel()
    {
        // Setup
        $expected = 'testRel';
        $atomLink = new AtomLink();

        // Test
        $atomLink->setRel($expected);
        $actual = $atomLink->getRel();

        // Assert 
        $this->assertEquals(
            $expected,
            $actual
        );
    }

    /** 
     * @covers \WindowsAzure\Common\Internal\Atom\AtomLink::getType
     * @covers \WindowsAzure\Common\Internal\Atom\AtomLink::setType
     */
    public function testGetSetType()
    {
        // Setup
        $expected = 'testType';
        $atomLink = new AtomLink();

        // Test
        $atomLink->setType($expected);
        $actual = $atomLink->getType();

        // Assert 
        $this->assertEquals(
            $expected,
            $actual
        );
    }

    /** 
     * @covers \WindowsAzure\Common\Internal\Atom\AtomLink::getHreflang
     * @covers \WindowsAzure\Common\Internal\Atom\AtomLink::setHreflang
     */
    public function testGetSetHreflang()
    {
        // Setup
        $expected = 'testHreflang';
        $atomLink = new AtomLink();

        // Test
        $atomLink->setHreflang($expected);
        $actual = $atomLink->getHreflang();

        // Assert 
        $this->assertEquals(
            $expected,
            $actual
        );
    }

    /** 
     * @covers \WindowsAzure\Common\Internal\Atom\AtomLink::getTitle
     * @covers \WindowsAzure\Common\Internal\Atom\AtomLink::setTitle
     */
    public function testGetSetTitle()
    {
        // Setup
        $expected = 'testTitle';
        $atomLink = new AtomLink();

        // Test
        $atomLink->setTitle($expected);
        $actual = $atomLink->getTitle();

        // Assert 
        $this->assertEquals(
            $expected,
            $actual
        );
    }

    /** 
     * @covers \WindowsAzure\Common\Internal\Atom\AtomLink::getLength
     * @covers \WindowsAzure\Common\Internal\Atom\AtomLink::setLength
     */
    public function testGetSetLength()
    {
        // Setup
        $expected = 'testLength';
        $atomLink = new AtomLink();

        // Test
        $atomLink->setLength($expected);
        $actual = $atomLink->getLength();

        // Assert 
        $this->assertEquals(
            $expected,
            $actual
        );
    }

    /** 
     * @covers \WindowsAzure\Common\Internal\Atom\AtomLink::parseXml
     */
    public function testParseXmlSuccess()
    {
        // Setup
        $xml = '<link href="http://www.contonso.com"/>';
        $expected = new AtomLink();
        $expected->setHref('http://www.contonso.com');
        $actual = new AtomLink();

        // Test
        $actual->parseXml($xml);

        // Assert
        $this->assertEquals(
            $expected,
            $actual
        );
    }

    /** 
     * @covers \WindowsAzure\Common\Internal\Atom\AtomLink::parseXml
     */
    public function testParseXmlInvalidArgument()
    {
        // Setup
        $this->setExpectedException(get_class(new \InvalidArgumentException()));
        $atomLink = new AtomLink();

        // Test
        $atomLink->parseXml(null);

        // Assert
    }

    /** 
     * @covers \WindowsAzure\Common\Internal\Atom\AtomLink::writeXml
     */
    public function testWriteXmlSuccess()
    {
        // Setup
        $expected = '<atom:link href="http://www.contonso.com" xmlns:atom="http://www.w3.org/2005/Atom"/>';
        $atomLink = new AtomLink();
        $atomLink->setHref('http://www.contonso.com');

        // Test
        $xmlWriter = new \XMLWriter();
        $xmlWriter->openMemory();
        $atomLink->writeXml($xmlWriter);
        $actual = $xmlWriter->outputMemory();

        // Assert
        $this->assertEquals(
            $expected,
            $actual
        );
    }
}
