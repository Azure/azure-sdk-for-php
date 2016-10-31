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
use WindowsAzure\Common\Internal\Atom\Content;
use WindowsAzure\Common\Internal\Atom\Entry;
use WindowsAzure\Common\Internal\Atom\Category;
use WindowsAzure\Common\Internal\Atom\Person;
use WindowsAzure\Common\Internal\Atom\Source;

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
class EntryTest extends \PHPUnit_Framework_TestCase
{
    /**
     */
    public function testEntryConstructor()
    {
        // Setup

        // Test
        $entry = new Entry();

        // Assert
        $this->assertNotNull($entry);
    }

    /**
     * @covers \WindowsAzure\Common\Internal\Atom\Entry::getAuthor
     * @covers \WindowsAzure\Common\Internal\Atom\Entry::setAuthor
     */
    public function testEntryGetSetAuthor()
    {
        // Setup
        $expected = new Person();
        $expected->setName('testPerson');
        $entry = new Entry();

        // Test
        $entry->setAuthor([$expected]);
        $actual = $entry->getAuthor()[0];

        // Assert
        $this->assertEquals(
            $expected->getName(),
            $actual->getName()
        );
    }

    /**
     * @covers \WindowsAzure\Common\Internal\Atom\Entry::getCategory
     * @covers \WindowsAzure\Common\Internal\Atom\Entry::setCategory
     */
    public function testEntryGetSetCategory()
    {
        // Setup
        $expected = new Category();
        $expected->setTerm('testTerm');
        $entry = new Entry();

        // Test
        $entry->setCategory([$expected]);
        $actual = $entry->getCategory()[0];

        // Assert
        $this->assertEquals(
            $expected->getTerm(),
            $actual->getTerm()
        );
    }

    /**
     * @covers \WindowsAzure\Common\Internal\Atom\Entry::getContent
     * @covers \WindowsAzure\Common\Internal\Atom\Entry::setContent
     */
    public function testEntryGetSetContent()
    {
        // Setup
        $expected = new Content();
        $expected->setText('testText');
        $entry = new Entry();

        // Test
        $entry->setContent($expected);
        $actual = $entry->getContent();

        // Assert
        $this->assertEquals(
            $expected->getText(),
            $actual->getText()
        );
    }

    /**
     * @covers \WindowsAzure\Common\Internal\Atom\Entry::getContributor
     * @covers \WindowsAzure\Common\Internal\Atom\Entry::setContributor
     */
    public function testEntryGetSetContributor()
    {
        // Setup
        $expected = new Person();
        $expected->setName('testContributor');
        $entry = new Entry();

        // Test
        $entry->setContributor([$expected]);
        $actual = $entry->getContributor()[0];

        // Assert
        $this->assertEquals(
            $expected->getName(),
            $actual->getName()
        );
    }

    /**
     * @covers \WindowsAzure\Common\Internal\Atom\Entry::getId
     * @covers \WindowsAzure\Common\Internal\Atom\Entry::setId
     */
    public function testEntryGetSetId()
    {
        // Setup
        $expected = 'testId';
        $entry = new Entry();

        // Test
        $entry->setId($expected);
        $actual = $entry->getId();

        // Assert
        $this->assertEquals(
            $expected,
            $actual
        );
    }

    /**
     * @covers \WindowsAzure\Common\Internal\Atom\Entry::getLink
     * @covers \WindowsAzure\Common\Internal\Atom\Entry::setLink
     */
    public function testEntryGetSetLink()
    {
        // Setup
        $expected = new AtomLink('testLink');
        $entry = new Entry();

        // Test
        $entry->setLink($expected);
        $actual = $entry->getLink();

        // Assert
        $this->assertEquals(
            $expected,
            $actual
        );
    }

    /**
     * @covers \WindowsAzure\Common\Internal\Atom\Entry::getPublished
     * @covers \WindowsAzure\Common\Internal\Atom\Entry::setPublished
     */
    public function testEntryGetSetPublished()
    {
        // Setup
        $expected = true;
        $entry = new Entry();

        // Test
        $entry->setPublished($expected);
        $actual = $entry->getPublished();

        // Assert
        $this->assertEquals(
            $expected,
            $actual
        );
    }

    /**
     * @covers \WindowsAzure\Common\Internal\Atom\Entry::getRights
     * @covers \WindowsAzure\Common\Internal\Atom\Entry::setRights
     */
    public function testEntryGetSetRights()
    {
        // Setup
        $expected = 'rights';
        $entry = new Entry();

        // Test
        $entry->setRights($expected);
        $actual = $entry->getRights();

        // Assert
        $this->assertEquals(
            $expected,
            $actual
        );
    }

    /**
     * @covers \WindowsAzure\Common\Internal\Atom\Entry::getSource
     * @covers \WindowsAzure\Common\Internal\Atom\Entry::setSource
     */
    public function testEntryGetSetSource()
    {
        // Setup
        $expected = new Source();
        $entry = new Entry();

        // Test
        $entry->setSource($expected);
        $actual = $entry->getSource();

        // Assert
        $this->assertEquals(
            $expected,
            $actual
        );
    }

    /**
     * @covers \WindowsAzure\Common\Internal\Atom\Entry::getSummary
     * @covers \WindowsAzure\Common\Internal\Atom\Entry::setSummary
     */
    public function testEntryGetSetSummary()
    {
        // Setup
        $expected = 'testSummary';
        $entry = new Entry();

        // Test
        $entry->setSummary($expected);
        $actual = $entry->getSummary();

        // Assert
        $this->assertEquals(
            $expected,
            $actual
        );
    }

    /**
     * @covers \WindowsAzure\Common\Internal\Atom\Entry::getTitle
     * @covers \WindowsAzure\Common\Internal\Atom\Entry::setTitle
     */
    public function testEntryGetSetTitle()
    {
        // Setup
        $expected = 'testTitle';
        $entry = new Entry();

        // Test
        $entry->setTitle($expected);
        $actual = $entry->getTitle();

        // Assert
        $this->assertEquals(
            $expected,
            $actual
        );
    }

    /**
     * @covers \WindowsAzure\Common\Internal\Atom\Entry::getUpdated
     * @covers \WindowsAzure\Common\Internal\Atom\Entry::setUpdated
     */
    public function testEntryGetSetUpdated()
    {
        // Setup
        $expected = new \DateTime();
        $entry = new Entry();

        // Test
        $entry->setUpdated($expected);
        $actual = $entry->getUpdated();

        // Assert
        $this->assertEquals(
            $expected,
            $actual
        );
    }

    /**
     * @covers \WindowsAzure\Common\Internal\Atom\Entry::getExtensionElement
     * @covers \WindowsAzure\Common\Internal\Atom\Entry::setExtensionElement
     */
    public function testEntryGetSetExtensionElement()
    {
        // Setup
        $expected = 'testExtensionElement';
        $entry = new Entry();

        // Test
        $entry->setExtensionElement($expected);
        $actual = $entry->getExtensionElement();

        // Assert
        $this->assertEquals(
            $expected,
            $actual
        );
    }

    /**
     * @covers \WindowsAzure\Common\Internal\Atom\Entry::writeXml
     */
    public function testEntryToXml()
    {
        // Setup
        $entry = new Entry();
        $expected = '<atom:entry xmlns:atom="http://www.w3.org/2005/Atom"/>';

        // Test
        $xmlWriter = new \XMLWriter();
        $xmlWriter->openMemory();
        $entry->writeXml($xmlWriter);
        $actual = $xmlWriter->outputMemory();

        // Assert
        $this->assertEquals(
            $expected,
            $actual
        );
    }

    /**
     * @covers \WindowsAzure\Common\Internal\Atom\Entry::getAttributes
     * @covers \WindowsAzure\Common\Internal\Atom\Entry::setAttributes
     */
    public function testGetSetAttributes()
    {
        // Setup
        $expected = [];
        $expected['testKey'] = 'testValue';
        $entry = new Entry();

        // Test
        $entry->setAttributes($expected);
        $actual = $entry->getAttributes();

        // Assert
        $this->assertEquals(
            $expected,
            $actual
        );
    }

    /**
     * @covers \WindowsAzure\Common\Internal\Atom\Entry::getAuthor
     * @covers \WindowsAzure\Common\Internal\Atom\Entry::setAuthor
     */
    public function testGetSetAuthor()
    {
        // Setup
        $expected = new Person('testAuthor');
        $entry = new Entry();

        // Test
        $entry->setAuthor([$expected]);
        $actual = $entry->getAuthor()[0];

        // Assert
        $this->assertEquals(
            $expected,
            $actual
        );
    }

    /**
     * @covers \WindowsAzure\Common\Internal\Atom\Entry::getCategory
     * @covers \WindowsAzure\Common\Internal\Atom\Entry::setCategory
     */
    public function testGetSetCategory()
    {
        // Setup
        $expected = 'testCategory';
        $entry = new Entry();

        // Test
        $entry->setCategory([new Category($expected)]);
        $actual = $entry->getCategory()[0]->getUndefinedContent();

        // Assert
        $this->assertEquals(
            $expected,
            $actual
        );
    }

    /**
     * @covers \WindowsAzure\Common\Internal\Atom\Entry::getContent
     * @covers \WindowsAzure\Common\Internal\Atom\Entry::setContent
     */
    public function testGetSetContent()
    {
        // Setup
        $expected = new Content('testContent');
        $entry = new Entry();

        // Test
        $entry->setContent($expected);
        $actual = $entry->getContent();

        // Assert
        $this->assertEquals(
            $expected,
            $actual
        );
    }

    /**
     * @covers \WindowsAzure\Common\Internal\Atom\Entry::getContributor
     * @covers \WindowsAzure\Common\Internal\Atom\Entry::setContributor
     */
    public function testGetSetContributor()
    {
        // Setup
        $expected = [new Person()];
        $entry = new Entry();

        // Test
        $entry->setContributor($expected);
        $actual = $entry->getContributor();

        // Assert
        $this->assertEquals(
            $expected,
            $actual
        );
    }

    /**
     * @covers \WindowsAzure\Common\Internal\Atom\Entry::getId
     * @covers \WindowsAzure\Common\Internal\Atom\Entry::setId
     */
    public function testGetSetId()
    {
        // Setup
        $expected = 'testId';
        $entry = new Entry();

        // Test
        $entry->setId($expected);
        $actual = $entry->getId();

        // Assert
        $this->assertEquals(
            $expected,
            $actual
        );
    }

    /**
     * @covers \WindowsAzure\Common\Internal\Atom\Entry::getLink
     * @covers \WindowsAzure\Common\Internal\Atom\Entry::setLink
     */
    public function testGetSetLink()
    {
        // Setup
        $expected = 'testLink';
        $entry = new Entry();

        // Test
        $entry->setLink($expected);
        $actual = $entry->getLink();

        // Assert
        $this->assertEquals(
            $expected,
            $actual
        );
    }

    /**
     * @covers \WindowsAzure\Common\Internal\Atom\Entry::getPublished
     * @covers \WindowsAzure\Common\Internal\Atom\Entry::setPublished
     */
    public function testGetSetPublished()
    {
        // Setup
        $expected = 'testPublished';
        $entry = new Entry();

        // Test
        $entry->setPublished($expected);
        $actual = $entry->getPublished();

        // Assert
        $this->assertEquals(
            $expected,
            $actual
        );
    }

    /**
     * @covers \WindowsAzure\Common\Internal\Atom\Entry::getRights
     * @covers \WindowsAzure\Common\Internal\Atom\Entry::setRights
     */
    public function testGetSetRights()
    {
        // Setup
        $expected = 'testRights';
        $entry = new Entry();

        // Test
        $entry->setRights($expected);
        $actual = $entry->getRights();

        // Assert
        $this->assertEquals(
            $expected,
            $actual
        );
    }

    /**
     * @covers \WindowsAzure\Common\Internal\Atom\Entry::getSource
     * @covers \WindowsAzure\Common\Internal\Atom\Entry::setSource
     */
    public function testGetSetSource()
    {
        // Setup
        $expected = 'testSource';
        $entry = new Entry();

        // Test
        $entry->setSource($expected);
        $actual = $entry->getSource();

        // Assert
        $this->assertEquals(
            $expected,
            $actual
        );
    }

    /**
     * @covers \WindowsAzure\Common\Internal\Atom\Entry::getSummary
     * @covers \WindowsAzure\Common\Internal\Atom\Entry::setSummary
     */
    public function testGetSetSummary()
    {
        // Setup
        $expected = 'testSummary';
        $entry = new Entry();

        // Test
        $entry->setSummary($expected);
        $actual = $entry->getSummary();

        // Assert
        $this->assertEquals(
            $expected,
            $actual
        );
    }

    /**
     * @covers \WindowsAzure\Common\Internal\Atom\Entry::getTitle
     * @covers \WindowsAzure\Common\Internal\Atom\Entry::setTitle
     */
    public function testGetSetTitle()
    {
        // Setup
        $expected = 'testTitle';
        $entry = new Entry();

        // Test
        $entry->setTitle($expected);
        $actual = $entry->getTitle();

        // Assert
        $this->assertEquals(
            $expected,
            $actual
        );
    }

    /**
     * @covers \WindowsAzure\Common\Internal\Atom\Entry::getUpdated
     * @covers \WindowsAzure\Common\Internal\Atom\Entry::setUpdated
     */
    public function testGetSetUpdated()
    {
        // Setup
        $expected = new \DateTime('now');
        $entry = new Entry();

        // Test
        $entry->setUpdated($expected);
        $actual = $entry->getUpdated();

        // Assert
        $this->assertEquals(
            $expected,
            $actual
        );
    }

    /**
     * @covers \WindowsAzure\Common\Internal\Atom\Entry::getExtensionElement
     * @covers \WindowsAzure\Common\Internal\Atom\Entry::setExtensionElement
     */
    public function testGetSetExtensionElement()
    {
        // Setup
        $expected = 'testExtensionElement';
        $entry = new Entry();

        // Test
        $entry->setExtensionElement($expected);
        $actual = $entry->getExtensionElement();

        // Assert
        $this->assertEquals(
            $expected,
            $actual
        );
    }

    /**
     * @covers \WindowsAzure\Common\Internal\Atom\Entry::fromXml
     */
    public function testFromXml()
    {

        // Setup
        $xmlString = '<entry>
                       <content>
                       </content>
                      </entry>';
        $entry = new Entry();
        $xml = simplexml_load_string($xmlString);

        // Test
        $entry->fromXml($xml);

        // Assert
        $this->assertNotNull($entry->getContent());
    }
}
