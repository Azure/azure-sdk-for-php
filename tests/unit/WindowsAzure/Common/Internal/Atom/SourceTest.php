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
use WindowsAzure\Common\Internal\Atom\Source;
use WindowsAzure\Common\Internal\Atom\Person;
use WindowsAzure\Common\Internal\Atom\Generator;
use WindowsAzure\Common\Internal\Atom\Category;

/**
 * Unit tests for class Source.
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
class SourceTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers \WindowsAzure\Common\Internal\Atom\Source::__construct
     */
    public function testSourceConstructor()
    {
        // Setup

        // Test
        $feed = new Source();

        // Assert
        $this->assertNotNull($feed);
    }

    /** 
     * @covers \WindowsAzure\Common\Internal\Atom\Source::getAttributes
     * @covers \WindowsAzure\Common\Internal\Atom\Source::setAttributes
     */
    public function testGetSetAttributes()
    {
        // Setup
        $expected = [];
        $expected['attributeKey'] = 'attributeValue';
        $source = new Source();

        // Test
        $source->setAttributes($expected);
        $actual = $source->getAttributes();

        // Assert 
        $this->assertEquals(
            $expected,
            $actual
        );
    }

    /** 
     * @covers \WindowsAzure\Common\Internal\Atom\Source::getAuthor
     * @covers \WindowsAzure\Common\Internal\Atom\Source::setAuthor
     */
    public function testGetSetAuthor()
    {
        // Setup
        $expected = ['testAuthor'];
        $source = new Source();

        // Test
        $source->setAuthor($expected);
        $actual = $source->getAuthor();

        // Assert 
        $this->assertEquals(
            $expected,
            $actual
        );
    }

    /** 
     * @covers \WindowsAzure\Common\Internal\Atom\Source::getCategory
     * @covers \WindowsAzure\Common\Internal\Atom\Source::setCategory
     */
    public function testGetSetCategory()
    {
        // Setup
        $expected = [];
        $category = new Category();
        $category->setTerm('testTerm');
        $expected[] = $category;
        $source = new Source();

        // Test
        $source->setCategory($expected);
        $actual = $source->getCategory();

        // Assert 
        $this->assertEquals(
            $expected,
            $actual
        );
    }

    /** 
     * @covers \WindowsAzure\Common\Internal\Atom\Source::getContributor
     * @covers \WindowsAzure\Common\Internal\Atom\Source::setContributor
     */
    public function testGetSetContributor()
    {
        // Setup
        $expected = ['testContributor'];
        $source = new Source();

        // Test
        $source->setContributor($expected);
        $actual = $source->getContributor();

        // Assert 
        $this->assertEquals(
            $expected,
            $actual
        );
    }

    /** 
     * @covers \WindowsAzure\Common\Internal\Atom\Source::getGenerator
     * @covers \WindowsAzure\Common\Internal\Atom\Source::setGenerator
     */
    public function testGetSetGenerator()
    {
        // Setup
        $expected = new Generator();
        $source = new Source();

        // Test
        $source->setGenerator($expected);
        $actual = $source->getGenerator();

        // Assert 
        $this->assertEquals(
            $expected,
            $actual
        );
    }

    /** 
     * @covers \WindowsAzure\Common\Internal\Atom\Source::getIcon
     * @covers \WindowsAzure\Common\Internal\Atom\Source::setIcon
     */
    public function testGetSetIcon()
    {
        // Setup
        $expected = 'testIcon';
        $source = new Source();

        // Test
        $source->setIcon($expected);
        $actual = $source->getIcon();

        // Assert 
        $this->assertEquals(
            $expected,
            $actual
        );
    }

    /** 
     * @covers \WindowsAzure\Common\Internal\Atom\Source::getId
     * @covers \WindowsAzure\Common\Internal\Atom\Source::setId
     */
    public function testGetSetId()
    {
        // Setup
        $expected = 'testId';
        $source = new Source();

        // Test
        $source->setId($expected);
        $actual = $source->getId();

        // Assert 
        $this->assertEquals(
            $expected,
            $actual
        );
    }

    /** 
     * @covers \WindowsAzure\Common\Internal\Atom\Source::getLink
     * @covers \WindowsAzure\Common\Internal\Atom\Source::setLink
     */
    public function testGetSetLink()
    {
        // Setup
        $expected = 'testLink';
        $source = new Source();

        // Test
        $source->setLink($expected);
        $actual = $source->getLink();

        // Assert 
        $this->assertEquals(
            $expected,
            $actual
        );
    }

    /** 
     * @covers \WindowsAzure\Common\Internal\Atom\Source::getLogo
     * @covers \WindowsAzure\Common\Internal\Atom\Source::setLogo
     */
    public function testGetSetLogo()
    {
        // Setup
        $expected = 'testLogo';
        $source = new Source();

        // Test
        $source->setLogo($expected);
        $actual = $source->getLogo();

        // Assert 
        $this->assertEquals(
            $expected,
            $actual
        );
    }

    /** 
     * @covers \WindowsAzure\Common\Internal\Atom\Source::getRights
     * @covers \WindowsAzure\Common\Internal\Atom\Source::setRights
     */
    public function testGetSetRights()
    {
        // Setup
        $expected = 'testRights';
        $source = new Source();

        // Test
        $source->setRights($expected);
        $actual = $source->getRights();

        // Assert 
        $this->assertEquals(
            $expected,
            $actual
        );
    }

    /** 
     * @covers \WindowsAzure\Common\Internal\Atom\Source::getSubtitle
     * @covers \WindowsAzure\Common\Internal\Atom\Source::setSubtitle
     */
    public function testGetSetSubtitle()
    {
        // Setup
        $expected = 'testSubtitle';
        $source = new Source();

        // Test
        $source->setSubtitle($expected);
        $actual = $source->getSubtitle();

        // Assert 
        $this->assertEquals(
            $expected,
            $actual
        );
    }

    /** 
     * @covers \WindowsAzure\Common\Internal\Atom\Source::getTitle
     * @covers \WindowsAzure\Common\Internal\Atom\Source::setTitle
     */
    public function testGetSetTitle()
    {
        // Setup
        $expected = 'testTitle';
        $source = new Source();

        // Test
        $source->setTitle($expected);
        $actual = $source->getTitle();

        // Assert 
        $this->assertEquals(
            $expected,
            $actual
        );
    }

    /** 
     * @covers \WindowsAzure\Common\Internal\Atom\Source::getUpdated
     * @covers \WindowsAzure\Common\Internal\Atom\Source::setUpdated
     */
    public function testGetSetUpdated()
    {
        // Setup
        $expected = new \DateTime();
        $source = new Source();

        // Test
        $source->setUpdated($expected);
        $actual = $source->getUpdated();

        // Assert 
        $this->assertEquals(
            $expected,
            $actual
        );
    }

    /** 
     * @covers \WindowsAzure\Common\Internal\Atom\Source::getExtensionElement
     * @covers \WindowsAzure\Common\Internal\Atom\Source::setExtensionElement
     */
    public function testGetSetExtensionElement()
    {
        // Setup
        $expected = 'testExtensionElement';
        $source = new Source();

        // Test
        $source->setExtensionElement($expected);
        $actual = $source->getExtensionElement();

        // Assert 
        $this->assertEquals(
            $expected,
            $actual
        );
    }

    /** 
     * @covers \WindowsAzure\Common\Internal\Atom\Source::writeXml
     * @covers \WindowsAzure\Common\Internal\Atom\Source::writeInnerXml
     */
    public function testSourceWriteXmlWorks()
    {
        // Setup
        $expected = '<atom:source xmlns:atom="http://www.w3.org/2005/Atom"/>';
        $source = new Source();

        // Test
        $xmlWriter = new \XMLWriter();
        $xmlWriter->openMemory();
        $source->writeXml($xmlWriter);
        $actual = $xmlWriter->outputMemory();

        // Assert
        $this->assertEquals(
            $expected,
            $actual
        );
    }

    /** 
     * @covers \WindowsAzure\Common\Internal\Atom\Source::writeXml
     * @covers \WindowsAzure\Common\Internal\Atom\Source::writeInnerXml
     */
    public function testSourceWriteXmlAllPropertiesWorks()
    {
        // Setup
        $expected = '<atom:source xmlns:atom="http://www.w3.org/2005/Atom"><atom:author xmlns:atom="http://www.w3.org/2005/Atom"><atom:name xmlns:atom="http://www.w3.org/2005/Atom"></atom:name></atom:author><atom:category xmlns:atom="http://www.w3.org/2005/Atom"/><atom:contributor xmlns:atom="http://www.w3.org/2005/Atom"><atom:name xmlns:atom="http://www.w3.org/2005/Atom"></atom:name></atom:contributor><atom:category xmlns:atom="http://www.w3.org/2005/Atom"></atom:category><atom:icon xmlns:atom="http://www.w3.org/2005/Atom">testIcon</atom:icon><atom:logo xmlns:atom="http://www.w3.org/2005/Atom">testLogo</atom:logo><atom:id xmlns:atom="http://www.w3.org/2005/Atom">testId</atom:id><atom:link xmlns:atom="http://www.w3.org/2005/Atom"/><atom:rights xmlns:atom="http://www.w3.org/2005/Atom">testRights</atom:rights><atom:subtitle xmlns:atom="http://www.w3.org/2005/Atom">testSubtitle</atom:subtitle><atom:title xmlns:atom="http://www.w3.org/2005/Atom">testTitle</atom:title><atom:updated xmlns:atom="http://www.w3.org/2005/Atom">2012-06-17T20:53:36-07:00</atom:updated></atom:source>';

        $source = new Source();
        $author = [];
        $authorInstance = new Person();
        $author[] = $authorInstance;

        $category = [];
        $categoryInstance = new Category();
        $category[] = $categoryInstance;

        $contributor = [];
        $contributorInstance = new Person();
        $contributor[] = $contributorInstance;

        $link = [];
        $linkInstance = new AtomLink();
        $link[] = $linkInstance;

        $source->setAuthor($author);
        $source->setCategory($category);
        $source->setContributor($contributor);
        $source->setGenerator(new Generator());
        $source->setIcon('testIcon');
        $source->setId('testId');
        $source->setLink($link);
        $source->setLogo('testLogo');
        $source->setRights('testRights');
        $source->setSubtitle('testSubtitle');
        $source->setTitle('testTitle');
        $source->setUpdated(\DateTime::createFromFormat(\DateTime::ATOM, '2012-06-17T20:53:36-07:00'));

        // Test
        $xmlWriter = new \XMLWriter();
        $xmlWriter->openMemory();
        $source->writeXml($xmlWriter);
        $actual = $xmlWriter->outputMemory();

        // Assert
        $this->assertEquals(
            $expected,
            $actual
        );
    }
}
