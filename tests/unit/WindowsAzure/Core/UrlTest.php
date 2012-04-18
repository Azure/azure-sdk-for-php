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
 * @package   Tests\Unit\WindowsAzure
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */

use WindowsAzure\Core\Url;
use Tests\Framework\TestResources;
use WindowsAzure\Resources;
use WindowsAzure\Core\InvalidArgumentTypeException;

/**
 * Unit tests for class Url
 *
 * @category  Microsoft
 * @package   Tests\Unit\WindowsAzure
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
class UrlTest extends PHPUnit_Framework_TestCase
{
    /**
     * @covers WindowsAzure\Core\Url::__construct
     * @covers WindowsAzure\Core\Url::_setPathIfEmpty
     */
    public function test__construct()
    {
        // Setup
        $urlString = TestResources::VALID_URL;
        
        // Test
        $url = new Url($urlString);
        
        // Assert
        $this->assertEquals($urlString . '/', $url->getUrl());
    }
    
    /**
     * @covers WindowsAzure\Core\Url::__construct
     */
    public function test__constructEmptyUrlFail()
    {
        // Setup
        $urlString = '';
        $this->setExpectedException(get_class(new \InvalidArgumentException(Resources::INVALID_URL_MSG)));
        
        // Test
        new Url($urlString);
    }
    
    /**
     * @covers WindowsAzure\Core\Url::__construct
     */
    public function test__constructNonStringUrlFail()
    {
        // Setup
        $urlString = 1;
        $this->setExpectedException(get_class(new \InvalidArgumentException(Resources::INVALID_URL_MSG)));
        
        // Test
        new Url($urlString);
    }
    
    /**
     * @covers WindowsAzure\Core\Url::__construct
     */
    public function test__constructInvalidUrlFail()
    {
        // Setup
        $urlString = 'ww.invalidurl,com';
        $this->setExpectedException(get_class(new \InvalidArgumentException(Resources::INVALID_URL_MSG)));
        
        // Test
        new Url($urlString);
    }
    
    /**
     * @covers WindowsAzure\Core\Url::__construct
     */
    public function test__constructWithUrlPath()
    {
        // Setup
        $urlString = TestResources::VALID_URL . '/';
        
        // Test
        $url = new Url($urlString);
        
        $this->assertEquals($urlString, $url->getUrl());
    }
    
    /**
     * @covers WindowsAzure\Core\Url::getQuery
     */
    public function testGetQuery()
    {
        // Setup
        $urlString = TestResources::VALID_URL;
        $expectedQueryString = TestResources::HEADER1 . '=' . TestResources::HEADER1_VALUE;
        $url = new Url($urlString);
        $url->setQueryVariable(TestResources::HEADER1, TestResources::HEADER1_VALUE);
        
        // Test
        $actualQueryString = $url->getQuery();
        
        $this->assertEquals($expectedQueryString, $actualQueryString);
    }
    
    /**
     * @covers WindowsAzure\Core\Url::getQueryVariables
     */
    public function testGetQueryVariables()
    {
        // Setup
        $urlString = TestResources::VALID_URL;
        $expectedQueryVariables = array(TestResources::HEADER1 => TestResources::HEADER1_VALUE);
        $url = new Url($urlString);
        $url->setQueryVariable(TestResources::HEADER1, TestResources::HEADER1_VALUE);
        
        // Test
        $actualQueryVariables = $url->getQueryVariables();
        
        $this->assertEquals($expectedQueryVariables, $actualQueryVariables);
    }
    
    /**
     * @covers WindowsAzure\Core\Url::setQueryVariable
     */
    public function testSetQueryVariable()
    {
        // Setup
        $urlString = TestResources::VALID_URL;
        $expectedQueryVariables = array(TestResources::HEADER1 => TestResources::HEADER1_VALUE);
        $url = new Url($urlString);
        
        // Test
        $url->setQueryVariable(TestResources::HEADER1, TestResources::HEADER1_VALUE);
        
        // Assert
        $this->assertEquals($expectedQueryVariables, $url->getQueryVariables());
    }
    
    /**
     * @covers WindowsAzure\Core\Url::setQueryVariable
     */
    public function testSetQueryVariableInvalidKeyFail()
    {
        // Setup
        $urlString = TestResources::VALID_URL;
        $invalidKey = 123;
        $value = 'ValidValue';
        $url = new Url($urlString);
        $this->setExpectedException(get_class(new InvalidArgumentTypeException(gettype(''))));
        
        // Test
        $url->setQueryVariable($invalidKey, $value);
    }
    
    /**
     * @covers WindowsAzure\Core\Url::setQueryVariable
     */
    public function testSetQueryVariableEmptyKeyFail()
    {
        // Setup
        $urlString = TestResources::VALID_URL;
        $invalidKey = '';
        $value = 'ValidValue';
        $url = new Url($urlString);
        $this->setExpectedException(get_class(new \InvalidArgumentException(Resources::NULL_ERROR_MSG)));
        
        // Test
        $url->setQueryVariable($invalidKey, $value);
    }
    
    /**
     * @covers WindowsAzure\Core\Url::setQueryVariable
     */
    public function testSetQueryVariableInvalidValueFail()
    {
        // Setup
        $urlString = TestResources::VALID_URL;
        $key = 'ValidKey';
        $invalidValue = 123;
        $url = new Url($urlString);
        $this->setExpectedException(get_class(new InvalidArgumentTypeException(gettype(''))));
        
        // Test
        $url->setQueryVariable($key, $invalidValue);
    }
    
    /**
     * @covers WindowsAzure\Core\Url::setQueryVariable
     */
    public function testSetQueryVariableSetEmptyValue()
    {
        // Setup
        $urlString = TestResources::VALID_URL;
        $key = 'validkey';
        $url = new Url($urlString);
        
        // Test
        $url->setQueryVariable($key, Resources::EMPTY_STRING, true);
        
        // Assert
        $queryVariables = $url->getQueryVariables();
        $this->assertEquals(Resources::EMPTY_STRING, $queryVariables[$key]);
    }
    
    /**
     * @covers WindowsAzure\Core\Url::getUrl
     * @covers WindowsAzure\Core\Url::_setPathIfEmpty
     */
    public function testGetUrl()
    {
        // Setup
        $urlString = TestResources::VALID_URL;
        $url = new Url($urlString);
        
        // Test
        $actualUrl = $url->getUrl();
        
        // Assert
        $this->assertEquals($urlString . '/', $actualUrl);
    }
    
    /**
     * @covers WindowsAzure\Core\Url::setUrlPath
     */
    public function testSetUrlPath()
    {
        // Setup
        $urlString = TestResources::VALID_URL;
        $urlPath = '/myqueue';
        $url = new Url($urlString);
        
        // Test
        $url->setUrlPath($urlPath);
        
        // Assert
        $this->assertEquals($urlPath, parse_url($url->getUrl(), PHP_URL_PATH));
    }
    
    /**
     * @covers WindowsAzure\Core\Url::appendUrlPath
     */
    public function testAppendUrlPath()
    {
        // Setup
        $urlString = TestResources::VALID_URL;
        $expectedUrlPath = '/myqueue';
        $urlPath = 'myqueue';
        $url = new Url($urlString);
        
        // Test
        $url->appendUrlPath($urlPath);
        
        // Assert
        $this->assertEquals($expectedUrlPath, parse_url($url->getUrl(), PHP_URL_PATH));
    }
    
    /**
     * @covers WindowsAzure\Core\Url::__toString
     * @covers WindowsAzure\Core\Url::_setPathIfEmpty
     */
    public function test__toString()
    {
        // Setup
        $urlString = TestResources::VALID_URL;
        $url = new Url($urlString);
        
        // Test
        $actualUrl = $url->__toString();
        
        // Assert
        $this->assertEquals($urlString . '/', $actualUrl);
    }
    
    /**
     * @covers WindowsAzure\Core\Url::__clone
     */
    public function test__clone()
    {
        // Setup
        $urlString = TestResources::VALID_URL;
        $url = new Url($urlString);
        
        // Test
        $actualUrl = clone $url;
        $url->setQueryVariable('key', 'value');
        
        // Assert
        $this->assertNotEquals($url->getQueryVariables(), $actualUrl->getQueryVariables());
    }
    
    /**
     * @covers WindowsAzure\Core\Url::setQueryVariables
     */
    public function testSetQueryVariables()
    {
        // Setup
        $urlString = TestResources::VALID_URL;
        $expectedQueryVariables = array(TestResources::HEADER1 => TestResources::HEADER1_VALUE,
                                        TestResources::HEADER2 => TestResources::HEADER2_VALUE);
        $url = new Url($urlString);
        
        // Test
        $url->setQueryVariables($expectedQueryVariables);
        
        // Assert
        $this->assertEquals($expectedQueryVariables, $url->getQueryVariables());
    }
}

?>
