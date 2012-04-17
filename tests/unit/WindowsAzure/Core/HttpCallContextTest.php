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
 * @package   Tests\Unit\WindowsAzure\Core
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */

namespace Tests\Unit\WindowsAzure\Core;
use WindowsAzure\Core\HttpCallContext;
use WindowsAzure\Core\Url;

/**
 * Unit tests for class HttpCallContext
 *
 * @category  Microsoft
 * @package   Tests\Unit\WindowsAzure\Core
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
class HttpCallContextTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers WindowsAzure\Core\HttpCallContext::__construct
     */
    public function test__construct()
    {
        // Test
        $context = new HttpCallContext();
        
        // Assert
        $this->assertNull($context->getBody());
        $this->assertNull($context->getMethod());
        $this->assertNull($context->getPath());
        $this->assertNull($context->getUri());
        $this->assertTrue(is_array($context->getHeaders()));
        $this->assertTrue(is_array($context->getQueryParameters()));
        $this->assertTrue(is_array($context->getStatusCodes()));
        
        return $context;
    }
    
    /**
     * @covers WindowsAzure\Core\HttpCallContext::getMethod
     * @covers WindowsAzure\Core\HttpCallContext::setMethod
     * @depends test__construct
     */
    public function testSetMethod($context)
    {
        // Setup
        $expected = 'Method';
        
        // Test
        $context->setMethod($expected);
        
        // Assert
        $this->assertEquals($expected, $context->getMethod());
    }
    
    /**
     * @covers WindowsAzure\Core\HttpCallContext::getBody
     * @covers WindowsAzure\Core\HttpCallContext::setBody
     * @depends test__construct
     */
    public function testSetBody($context)
    {
        // Setup
        $expected = 'Body';
        
        // Test
        $context->setBody($expected);
        
        // Assert
        $this->assertEquals($expected, $context->getBody());
    }
    
    /**
     * @covers WindowsAzure\Core\HttpCallContext::getPath
     * @covers WindowsAzure\Core\HttpCallContext::setPath
     * @depends test__construct
     */
    public function testSetPath($context)
    {
        // Setup
        $expected = 'Path';
        
        // Test
        $context->setPath($expected);
        
        // Assert
        $this->assertEquals($expected, $context->getPath());
    }
    
    /**
     * @covers WindowsAzure\Core\HttpCallContext::getUri
     * @covers WindowsAzure\Core\HttpCallContext::setUri
     * @depends test__construct
     */
    public function testSetUri($context)
    {
        // Setup
        $expected = new Url('http://www.microsoft.com');
        
        // Test
        $context->setUri($expected);
        
        // Assert
        $this->assertEquals($expected, $context->getUri());
    }
    
    /**
     * @covers WindowsAzure\Core\HttpCallContext::getHeaders
     * @covers WindowsAzure\Core\HttpCallContext::setHeaders
     * @covers WindowsAzure\Core\HttpCallContext::addHeader
     * @depends test__construct
     */
    public function testSetHeaders($context)
    {
        // Setup
        $expected = array('value1', 'value2', 'value3');
        
        // Test
        $context->setHeaders($expected);
        
        // Assert
        $this->assertEquals($expected, $context->getHeaders());
    }
    
    /**
     * @covers WindowsAzure\Core\HttpCallContext::getQueryParameters
     * @covers WindowsAzure\Core\HttpCallContext::setQueryParameters
     * @covers WindowsAzure\Core\HttpCallContext::addQueryParameter
     * @depends test__construct
     */
    public function testSetQueryParameters($context)
    {
        // Setup
        $expected = array('value1', 'value2', 'value3');
        
        // Test
        $context->setQueryParameters($expected);
        
        // Assert
        $this->assertEquals($expected, $context->getQueryParameters());
    }
    
    /**
     * @covers WindowsAzure\Core\HttpCallContext::getStatusCodes
     * @covers WindowsAzure\Core\HttpCallContext::setStatusCodes
     * @covers WindowsAzure\Core\HttpCallContext::addStatusCode
     * @depends test__construct
     */
    public function testSetStatusCodes($context)
    {
        // Setup
        $expected = array(1, 2, 3);
        
        // Test
        $context->setStatusCodes($expected);
        
        // Assert
        $this->assertEquals($expected, $context->getStatusCodes());
    }
    
    /**
     * @covers WindowsAzure\Core\HttpCallContext::getHeader
     * @covers WindowsAzure\Core\HttpCallContext::addHeader
     * @depends test__construct
     */
    public function testAddHeader($context)
    {
        // Setup
        $expected = 'value';
        $key = 'key';
        
        // Test
        $context->addHeader($key, $expected);
        
        // Assert
        $this->assertEquals($expected, $context->getHeader($key));
    }
    
    /**
     * @covers WindowsAzure\Core\HttpCallContext::removeHeader
     * @covers WindowsAzure\Core\HttpCallContext::getHeaders
     * @covers WindowsAzure\Core\HttpCallContext::addHeader
     * @depends test__construct
     */
    public function testRemoveHeader($context)
    {
        // Setup
        $value = 'value';
        $key = 'key';
        $context->addHeader($key, $value);
        
        // Test
        $context->removeHeader($key);
        
        // Assert
        $this->assertFalse(array_key_exists($key, $context->getHeaders()));
    }
    
    /**
     * @covers WindowsAzure\Core\HttpCallContext::__toString
     * @depends test__construct
     */
    public function test__toString($context)
    {
        // Setup
        $headers = array('h1' => 'v1', 'h2' => 'v2');
        $method = 'GET';
        $uri = 'http://microsoft.com';
        $path = 'windowsazure/services';
        $body = 'The request body';
        $expected = "GET http://microsoft.com/windowsazure/services HTTP/1.1\nh1: v1\nh2: v2\n\nThe request body";
        $context->setHeaders($headers);
        $context->setMethod($method);
        $context->setUri($uri);
        $context->setPath($path);
        $context->setBody($body);
        
        // Test
        $actual = $context->__toString();
        
        // Assert
        $this->assertEquals($expected, $actual);
    }
}

?>
