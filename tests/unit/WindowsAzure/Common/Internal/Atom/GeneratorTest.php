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

use WindowsAzure\Common\Internal\Atom\Generator;

/**
 * Unit tests for class Generator.
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
class GeneratorTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers \WindowsAzure\Common\Internal\Atom\Generator::__construct
     */
    public function testGeneratorConstructor()
    {
        // Setup
        $expectedText = 'testGenerator';

        // Test
        $generator = new Generator($expectedText);
        $actualText = $generator->getText();

        // Assert
        $this->assertNotNull($generator);
        $this->assertEquals(
            $expectedText,
            $actualText
        );
    }

    /**
     * @covers \WindowsAzure\Common\Internal\Atom\Generator::getText
     * @covers \WindowsAzure\Common\Internal\Atom\Generator::setText
     */
    public function testGeneratorGetSetText()
    {
        // Setup
        $expectedText = 'testGetText';
        $generator = new Generator();

        // Test
        $generator->setText($expectedText);
        $actualText = $generator->getText();

        // Assert
        $this->assertEquals(
            $expectedText,
            $actualText
        );
    }

    /**
     * @covers \WindowsAzure\Common\Internal\Atom\Generator::getUri
     * @covers \WindowsAzure\Common\Internal\Atom\Generator::setUri
     */
    public function testGeneratorGetSetUri()
    {
        // Setup
        $expectedUri = 'testGetSetUri';
        $generator = new Generator();

        // Test
        $generator->setUri($expectedUri);
        $actualUri = $generator->getUri();

        // Assert
        $this->assertEquals(
            $expectedUri,
            $actualUri
        );
    }

    /**
     * @covers \WindowsAzure\Common\Internal\Atom\Generator::getVersion
     * @covers \WindowsAzure\Common\Internal\Atom\Generator::setVersion
     */
    public function testGeneratorGetSetVersion()
    {
        // Setup
        $expectedVersion = 'testGetSetVersion';
        $generator = new Generator();

        // Test
        $generator->setVersion($expectedVersion);
        $actualVersion = $generator->getVersion();

        // Assert
        $this->assertEquals(
            $expectedVersion,
            $actualVersion
        );
    }

    /** 
     * @covers \WindowsAzure\Common\Internal\Atom\Generator::getText
     * @covers \WindowsAzure\Common\Internal\Atom\Generator::setText
     */
    public function testGetSetText()
    {
        // Setup
        $expected = 'testText';
        $generator = new Generator();

        // Test
        $generator->setText($expected);
        $actual = $generator->getText();

        // Assert 
        $this->assertEquals(
            $expected,
            $actual
        );
    }

    /** 
     * @covers \WindowsAzure\Common\Internal\Atom\Generator::getUri
     * @covers \WindowsAzure\Common\Internal\Atom\Generator::setUri
     */
    public function testGetSetUri()
    {
        // Setup
        $expected = 'testUri';
        $generator = new Generator();

        // Test
        $generator->setUri($expected);
        $actual = $generator->getUri();

        // Assert 
        $this->assertEquals(
            $expected,
            $actual
        );
    }

    /** 
     * @covers \WindowsAzure\Common\Internal\Atom\Generator::getVersion
     * @covers \WindowsAzure\Common\Internal\Atom\Generator::setVersion
     */
    public function testGetSetVersion()
    {
        // Setup
        $expected = 'testVersion';
        $generator = new Generator();

        // Test
        $generator->setVersion($expected);
        $actual = $generator->getVersion();

        // Assert 
        $this->assertEquals(
            $expected,
            $actual
        );
    }
}
