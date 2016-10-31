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

use WindowsAzure\Common\Internal\Atom\Feed;
use WindowsAzure\Common\Internal\Atom\Entry;

use WindowsAzure\Common\Internal\Atom\Category;
use WindowsAzure\Common\Internal\Atom\Person;
use WindowsAzure\Common\Internal\Atom\Generator;
use WindowsAzure\Common\Internal\Atom\AtomLink;

/**
 * Unit tests for class Feed.
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
class FeedTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers \WindowsAzure\Common\Internal\Atom\Feed::__construct
     */
    public function testFeedConstructor()
    {
        // Setup

        // Test
        $feed = new Feed();

        // Assert
        $this->assertNotNull($feed);
    }

    /** 
     * @covers \WindowsAzure\Common\Internal\Atom\Feed::getAttributes
     * @covers \WindowsAzure\Common\Internal\Atom\Feed::setAttributes
     */
    public function testGetSetAttributes()
    {
        // Setup
        $expected = [];
        $expected['key'] = 'value';
        $feed = new Feed();

        // Test
        $feed->setAttributes($expected);
        $actual = $feed->getAttributes();

        // Assert 
        $this->assertEquals(
            $expected,
            $actual
        );
    }

    /** 
     * @covers \WindowsAzure\Common\Internal\Atom\Feed::getEntry
     * @covers \WindowsAzure\Common\Internal\Atom\Feed::setEntry
     */
    public function testGetSetEntry()
    {
        // Setup
        $expected = 'testEntry';
        $feed = new Feed();

        // Test
        $feed->setEntry($expected);
        $actual = $feed->getEntry();

        // Assert 
        $this->assertEquals(
            $expected,
            $actual
        );
    }

    /** 
     * @covers \WindowsAzure\Common\Internal\Atom\Feed::getCategory
     * @covers \WindowsAzure\Common\Internal\Atom\Feed::setCategory
     */
    public function testGetSetCategory()
    {
        // Setup
        $expected = [];
        $expected[] = new Category();
        $feed = new Feed();

        // Test
        $feed->setCategory($expected);
        $actual = $feed->getCategory();

        // Assert 
        $this->assertEquals(
            $expected,
            $actual
        );
    }

    /** 
     * @covers \WindowsAzure\Common\Internal\Atom\Feed::getContributor
     * @covers \WindowsAzure\Common\Internal\Atom\Feed::setContributor
     */
    public function testGetSetContributor()
    {
        // Setup
        $expected = [];
        $expected[] = new Person();
        $feed = new Feed();

        // Test
        $feed->setContributor($expected);
        $actual = $feed->getContributor();

        // Assert 
        $this->assertEquals(
            $expected,
            $actual
        );
    }

    /** 
     * @covers \WindowsAzure\Common\Internal\Atom\Feed::getGenerator
     * @covers \WindowsAzure\Common\Internal\Atom\Feed::setGenerator
     */
    public function testGetSetGenerator()
    {
        // Setup
        $expected = new Generator();
        $feed = new Feed();

        // Test
        $feed->setGenerator($expected);
        $actual = $feed->getGenerator();

        // Assert 
        $this->assertEquals(
            $expected,
            $actual
        );
    }

    /** 
     * @covers \WindowsAzure\Common\Internal\Atom\Feed::getIcon
     * @covers \WindowsAzure\Common\Internal\Atom\Feed::setIcon
     */
    public function testGetSetIcon()
    {
        // Setup
        $expected = 'testIcon';
        $feed = new Feed();

        // Test
        $feed->setIcon($expected);
        $actual = $feed->getIcon();

        // Assert 
        $this->assertEquals(
            $expected,
            $actual
        );
    }

    /** 
     * @covers \WindowsAzure\Common\Internal\Atom\Feed::getId
     * @covers \WindowsAzure\Common\Internal\Atom\Feed::setId
     */
    public function testGetSetId()
    {
        // Setup
        $expected = 'testId';
        $feed = new Feed();

        // Test
        $feed->setId($expected);
        $actual = $feed->getId();

        // Assert 
        $this->assertEquals(
            $expected,
            $actual
        );
    }

    /** 
     * @covers \WindowsAzure\Common\Internal\Atom\Feed::getLink
     * @covers \WindowsAzure\Common\Internal\Atom\Feed::setLink
     */
    public function testGetSetLink()
    {
        // Setup
        $expected = [];
        $expected[] = new AtomLink();
        $feed = new Feed();

        // Test
        $feed->setLink($expected);
        $actual = $feed->getLink();

        // Assert 
        $this->assertEquals(
            $expected,
            $actual
        );
    }

    /** 
     * @covers \WindowsAzure\Common\Internal\Atom\Feed::getLogo
     * @covers \WindowsAzure\Common\Internal\Atom\Feed::setLogo
     */
    public function testGetSetLogo()
    {
        // Setup
        $expected = 'testLogo';
        $feed = new Feed();

        // Test
        $feed->setLogo($expected);
        $actual = $feed->getLogo();

        // Assert 
        $this->assertEquals(
            $expected,
            $actual
        );
    }

    /** 
     * @covers \WindowsAzure\Common\Internal\Atom\Feed::getRights
     * @covers \WindowsAzure\Common\Internal\Atom\Feed::setRights
     */
    public function testGetSetRights()
    {
        // Setup
        $expected = 'testRights';
        $feed = new Feed();

        // Test
        $feed->setRights($expected);
        $actual = $feed->getRights();

        // Assert 
        $this->assertEquals(
            $expected,
            $actual
        );
    }

    /** 
     * @covers \WindowsAzure\Common\Internal\Atom\Feed::getSubtitle
     * @covers \WindowsAzure\Common\Internal\Atom\Feed::setSubtitle
     */
    public function testGetSetSubtitle()
    {
        // Setup
        $expected = 'testSubtitle';
        $feed = new Feed();

        // Test
        $feed->setSubtitle($expected);
        $actual = $feed->getSubtitle();

        // Assert 
        $this->assertEquals(
            $expected,
            $actual
        );
    }

    /** 
     * @covers \WindowsAzure\Common\Internal\Atom\Feed::getTitle
     * @covers \WindowsAzure\Common\Internal\Atom\Feed::setTitle
     */
    public function testGetSetTitle()
    {
        // Setup
        $expected = 'testTitle';
        $feed = new Feed();

        // Test
        $feed->setTitle($expected);
        $actual = $feed->getTitle();

        // Assert 
        $this->assertEquals(
            $expected,
            $actual
        );
    }

    /** 
     * @covers \WindowsAzure\Common\Internal\Atom\Feed::getUpdated
     * @covers \WindowsAzure\Common\Internal\Atom\Feed::setUpdated
     */
    public function testGetSetUpdated()
    {
        // Setup
        $expected = new \DateTime();
        $feed = new Feed();

        // Test
        $feed->setUpdated($expected);
        $actual = $feed->getUpdated();

        // Assert 
        $this->assertEquals(
            $expected,
            $actual
        );
    }

    /** 
     * @covers \WindowsAzure\Common\Internal\Atom\Feed::getExtensionElement
     * @covers \WindowsAzure\Common\Internal\Atom\Feed::setExtensionElement
     */
    public function testGetSetExtensionElement()
    {
        // Setup
        $expected = 'testExtensionElement';
        $feed = new Feed();

        // Test
        $feed->setExtensionElement($expected);
        $actual = $feed->getExtensionElement();

        // Assert 
        $this->assertEquals(
            $expected,
            $actual
        );
    }

    /** 
     * @covers \WindowsAzure\Common\Internal\Atom\Feed::writeXml
     */
    public function testWriteXmlWorks()
    {
        // Setup
        $expected = '<atom:feed xmlns:atom="http://www.w3.org/2005/Atom"/>';
        $feed = new Feed();

        // Test 
        $xmlWriter = new \XMLWriter();
        $xmlWriter->openMemory();
        $feed->writeXml($xmlWriter);
        $actual = $xmlWriter->outputMemory();

        // Assert
        $this->assertEquals(
            $expected,
            $actual
        );
    }

    /**
     * @covers \WindowsAzure\Common\Internal\Atom\Feed::writeXml
     */
    public function testWriteXmlWorksWithNamespace()
    {
        // Setup 
        $expected = '<atom:feed xmlns:atom="http://www.w3.org/2005/Atom"/>';
        $feed = new Feed();

        // Test
        $xmlWriter = new \XMLWriter();
        $xmlWriter->openMemory();
        $feed->writeXml($xmlWriter);
        $actual = $xmlWriter->outputMemory();

        // Assert
        $this->assertEquals(
            $expected,
            $actual
        );
    }

    /** 
     * @covers \WindowsAzure\Common\Internal\Atom\Feed::parseXml
     */
    public function testParseXmlSuccess()
    {
        // Setup
        $expected = new Feed();
        $actual = new Feed();
        $xml = '<feed></feed>';

        // Test
        $actual->parseXml($xml);

        // Assert
        $this->assertEquals(
            $expected,
            $actual
        );
    }

    /** 
     * @covers \WindowsAzure\Common\Internal\Atom\Feed::parseXml
     */
    public function testFeedParseXmlMultipleLinks()
    {
        // Setup
        $expected = new Feed();
        $link = [];
        $linkInstanceOne = new AtomLink();
        $linkInstanceOne->setHref('linkOne');
        $linkInstanceTwo = new AtomLink();
        $linkInstanceTwo->setHref('linkTwo');
        $link[] = $linkInstanceOne;
        $link[] = $linkInstanceTwo;
        $expected->setLink($link);
        $xml = '<feed xmlns="http://www.w3.org/2005/Atom"><link href="linkOne"/><link href="linkTwo"/></feed>';

        // Test
        $actual = new Feed();
        $actual->parseXml($xml);

        // Assert

        $this->assertEquals(
            $expected,
            $actual
        );
    }

    /** 
     * @covers \WindowsAzure\Common\Internal\Atom\Feed::parseXml
     */
    public function testFeedParseXmlAllProperties()
    {
        // Setup
        $expected = new Feed();
        $entry = [];
        $entry[] = new Entry();
        $category = [];
        $categoryInstance = new Category();
        $categoryInstance->setScheme('testCategory');
        $category[] = $categoryInstance;
        $contributor = [];
        $contributorItem = new Person();
        $contributorItem->setName('testContributor');
        $contributor[] = $contributorItem;
        $generator = new Generator();
        $generator->setText('testGenerator');
        $icon = 'testIcon';
        $id = 'testId';
        $link = [];
        $atomLink = new AtomLink();
        $atomLink->setHref('testLink');
        $link[] = $atomLink;
        $logo = 'testLogo';
        $rights = 'testRights';
        $subtitle = 'testSubtitle';
        $title = 'testTitle';
        $updated = \DateTime::createFromFormat(\DateTime::ATOM, '2011-09-29T23:50:26+00:00');

        $expected->setEntry($entry);
        $expected->setCategory($category);
        $expected->setContributor($contributor);
        $expected->setGenerator($generator);
        $expected->setIcon($icon);
        $expected->setId($id);
        $expected->setLink($link);
        $expected->setLogo($logo);
        $expected->setRights($rights);
        $expected->setSubtitle($subtitle);
        $expected->setTitle($title);
        $expected->setUpdated($updated);

        $actual = new Feed();

        $xml = '
        <feed xmlns="http://www.w3.org/2005/Atom">
            <entry/>
            <content/>
            <category scheme="testCategory"/>
            <contributor>testContributor</contributor>
            <generator>testGenerator</generator>
            <icon>testIcon</icon>
            <id>testId</id>
            <link href="testLink"/>
            <logo>testLogo</logo>
            <rights>testRights</rights>
            <subtitle>testSubtitle</subtitle>
            <title>testTitle</title>
            <updated>2011-09-29T23:50:26+00:00</updated>
        </feed>';

        // Test
        $actual->parseXml($xml);

        // Assert
        $this->assertEquals(
            $expected,
            $actual
        );
    }
}
