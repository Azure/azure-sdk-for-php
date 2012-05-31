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
 * @package   Tests\Unit\WindowsAzure\Common\Internal\Atom
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */

namespace Tests\Unit\WindowsAzure\Common\Internal\Atom;
use WindowsAzure\Common\Internal\Atom\Category;

/**
 * Unit tests for class Category.
 *
 * @category  Microsoft
 * @package   Tests\Unit\WindowsAzure\Common\Internal\Atom
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */

class CategoryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers WindowsAzure\Common\Internal\Atom\Category::__construct
     */
    public function testCategoryConstructor()
    {
        // Setup

        // Test
        $category = new Category();
        
        // Assert
        $this->assertNotNull($category);
    }

    /**
     * @covers WindowsAzure\Common\Internal\Atom\Category::__construct
     */
    public function testCategoryConstructorWithParameterSuccess()
    {
        // Setup
        $expectedUndefinedContent = 'testCategoryConstructorWithParameterSuccess';

        // Test
        $category = new Category($expectedUndefinedContent);
        $actualUndefinedContent = $category->getUndefinedContent();

        // Assert
        $this->assertEquals(
            $expectedUndefinedContent,
            $actualUndefinedContent
            );
    }

    /**
     * @covers WindowsAzure\Common\Internal\Atom\Category::getTerm
     * @covers WindowsAzure\Common\Internal\Atom\Category::setTerm
     */
    public function testCategoryGetSetTerm()
    {
        // Setup
        $expectedTerm = 'testCategoryGetSetTerm';
        $category = new Category();
        
        // Test 
        $category->setTerm($expectedTerm);
        $actualTerm = $category->getTerm();

        // Assert
        $this->assertEquals(
            $expectedTerm,
            $actualTerm
        );

    }

    /**
     * @covers WindowsAzure\Common\Internal\Atom\Category::getScheme
     * @covers WindowsAzure\Common\Internal\Atom\Category::setScheme
     */
    public function testCategoryGetSetScheme()
    {
        // Setup
        $expectedScheme = 'testCategoryGetSetScheme';
        $category = new Category();
        
        // Test 
        $category->setScheme($expectedScheme);
        $actualScheme = $category->getScheme();

        // Assert
        $this->assertEquals(
            $expectedScheme,
            $actualScheme
        );

    }

    /**
     * @covers WindowsAzure\Common\Internal\Atom\Category::getLabel
     * @covers WindowsAzure\Common\Internal\Atom\Category::setLabel
     */
    public function testCategoryGetSetLabel()
    {
        // Setup
        $expectedLabel = 'testCategoryGetSetLabel';
        $category = new Category();
        
        // Test 
        $category->setLabel($expectedLabel);
        $actualLabel = $category->getLabel();

        // Assert
        $this->assertEquals(
            $expectedLabel,
            $actualLabel
        );
    }   

    /**
     * @covers WindowsAzure\Common\Internal\Atom\Category::getUndefinedContent
     * @covers WindowsAzure\Common\Internal\Atom\Category::setUndefinedContent
     */
    public function testCategoryGetSetUndefinedContent()
    {
        // Setup
        $expectedUndefinedContent = 'testCategoryGetSetUndefinedContent';
        $category = new Category();
        
        // Test 
        $category->setUndefinedContent($expectedUndefinedContent);
        $actualUndefinedContent = $category->getUndefinedContent();

        // Assert
        $this->assertEquals(
            $expectedUndefinedContent,
            $actualUndefinedContent
        );
        
    }

    /**
     * @covers WindowsAzure\Common\Internal\Atom\Category::parseXml
     */
    public function testCategoryCreate()
    {
        // Setup
        $xml = '<category/>';
        
        // Test 
        $category = new Category();
        $category->parseXml($xml);

        // Assert
        $this->assertNotNull($category);
        
    }

    /**
     * @covers WindowsAzure\Common\Internal\Atom\Category::parseXml
     * @covers WindowsAzure\Common\Internal\Atom\Category::getTerm
     */
    public function testCategoryCreateWithTerm()
    {
        // Setup
        $xml = '<category term="testTerm"></category>';
        $expected = 'testTerm';
        
        // Test 
        $category = new Category();
        $category->parseXml($xml);
        $actual = $category->getTerm();

        // Assert
        $this->assertEquals(
            $expected,
            $actual
        );
        
    }

    /**
     * @covers WindowsAzure\Common\Internal\Atom\Category::parseXml
     * @covers WindowsAzure\Common\Internal\Atom\Category::getScheme
     */
    public function testCategoryCreateWithScheme()
    {
        // Setup
        $xml = '<category scheme="testScheme"></category>';
        $expected = 'testScheme';
        
        // Test 
        $category = new Category();
        $category->parseXml($xml);
        $actual = $category->getScheme();

        // Assert
        $this->assertEquals(
            $expected,
            $actual
        );
        
    }

    /**
     * @covers WindowsAzure\Common\Internal\Atom\Category::parseXml
     * @covers WindowsAzure\Common\Internal\Atom\Category::getLabel
     */
    public function testCategoryCreateWithLabel()
    {
        // Setup
        $xml = '<category label="testLabel"></category>';
        $expected = 'testLabel';
        
        // Test 
        $category = new Category();
        $category->parseXml($xml);
        $actual = $category->getLabel();

        // Assert
        $this->assertEquals(
            $expected,
            $actual 
        );
        
    }

    /**
     * @covers WindowsAzure\Common\Internal\Atom\Category::parseXml
     * @covers WindowsAzure\Common\Internal\Atom\Category::writeXml
     */
    public function testCategoryWriteEmptyXml()
    {
        // Setup
        $category = new Category();
        $expected = '<atom:category/>';
        
        // Test 
        $xmlWriter = new \XMLWriter();
        $xmlWriter->openMemory();
        $category->writeXml($xmlWriter);
        $actual = $xmlWriter->outputMemory();

        // Assert
        $this->assertEquals(
            $expected,
            $actual
        );
    }

    /**
     * @covers WindowsAzure\Common\Internal\Atom\Category::parseXml
     * @covers WindowsAzure\Common\Internal\Atom\Category::writeXml
     */
    public function testCategoryWriteXmlSuccess()
    {
        // Setup
        $category = new Category();
        $expected = '<atom:category term="testTerm" scheme="testScheme" label="testLabel"/>';
        $category->setTerm('testTerm');
        $category->setScheme('testScheme');
        $category->setLabel('testLabel');
        
        // Test 
        $xmlWriter = new \XMLWriter();
        $xmlWriter->openMemory();
        $category->writeXml($xmlWriter);
        $actual = $xmlWriter->outputMemory();

        // Assert
        $this->assertEquals(
            $expected,
            $actual
        );
    } 

}

?>
