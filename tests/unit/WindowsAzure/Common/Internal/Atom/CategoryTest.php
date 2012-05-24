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
 * @package   Tests\Unit\WindowsAzure\Core\Atom
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
 * @package   Tests\Unit\WindowsAzure\Core\Atom
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */

class CategoryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers WindowsAzure\Core\Atom\Category::__construct
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
     * @covers WindowsAzure\Core\Atom\Category::__construct
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
     * @covers WindowsAzure\Core\Atom\Category::getTerm
     * @covers WindowsAzure\Core\Atom\Category::setTerm
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
     * @covers WindowsAzure\Core\Atom\Category::getScheme
     * @covers WindowsAzure\Core\Atom\Category::setScheme
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
     * @covers WindowsAzure\Core\Atom\Category::getLabel
     * @covers WindowsAzure\Core\Atom\Category::setLabel
     */
    public function testCategoryGetSetLabel()
    {
        // Setup
        $expectedScheme = 'testCategoryGetSetLabel';
        $category = new Category();
        
        // Test 
        $category->setScheme($expectedLabel);
        $actualLabel = $category->getLabel();

        // Assert
        $this->assertEquals(
            $expectedLabel,
            $actualLabel
        );
    }   

    /**
     * @covers WindowsAzure\Core\Atom\Category::getUndefinedContent
     * @covers WindowsAzure\Core\Atom\Category::setUndefinedContent
     */
    public function testCategoryGetSetUndefinedContent()
    {
        // Setup
        $expectedUndefinedContent = 'testCategoryGetSetUndefinedContent';
        $category = new Category();
        
        // Test 
        $category->setScheme($expectedUndefinedContent);
        $actualUndefinedContent = $category->getLabel();

        // Assert
        $this->assertEquals(
            $expectedUndefinedContent,
            $actualUndefinedContent
        );
        
    }

    /**
     * @covers WindowsAzure\Core\Atom\Category::create
     */
    public function testCategoryCreate()
    {
        // Setup
        $xml = '<atom:category/>';
        
        // Test 
        $category = Category::create($xml);

        // Assert
        $this->assertNotNull($category);
        
    }

    public function testCategoryCreateWithTerm()
    {
        // Setup
        $xml = '<atom:category term="testTerm"></atom:category>';
        $expected = 'testTerm';
        
        // Test 
        $category = Category::create($xml);
        $actual = $category->getTerm();

        // Assert
        $this->assertEquals(
            $expected,
            $actual
        );
        
    }

    public function testCategoryCreateWithScheme()
    {
        // Setup
        $xml = '<atom:category scheme="testScheme"></atom:category>';
        $expected = 'testScheme';
        
        // Test 
        $category = Category::create($xml);
        $actual = $category->getScheme();

        // Assert
        $this->assertEquals(
            $expected,
            $actual
        );
        
    }

    public function testCategoryCreateWithLabel()
    {
        // Setup
        $xml = '<atom:category label="testLabel"></atom:category>';
        $expected = 'testLabel';
        
        // Test 
        $category = Category::create($xml);
        $actual = $category->getLabel();

        // Assert
        $this->assertEquals(
            $expected,
            $actual 
        );
        
    }

    public function testCategoryWriteEmptyXml()
    {
        // Setup
        $category = new Category();
        $expected = '<atom:category/>';
        
        // Test 
        $actual = $category->toXml();

        // Assert
        $this->assertEquals(
            $expected,
            $actual
        );
    }

    public function testCategoryWriteXmlSuccess()
    {
        // Setup
        $category = new Category();
        $expected = '<atom:category term="testTerm" scheme="testScheme" label="testLabel"></atom:category>';
        
        // Test 
        $actual = $category->toXml();

        // Assert
        $this->assertEquals(
            $expected,
            $actual
        );
    } 

}

?>
