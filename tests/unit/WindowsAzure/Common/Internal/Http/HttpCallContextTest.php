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
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */

namespace Tests\unit\WindowsAzure\Common\Internal\Http;

use WindowsAzure\Common\Internal\Http\HttpCallContext;
use WindowsAzure\Common\Internal\Http\Url;

/**
 * Unit tests for class HttpCallContext.
 *
 * @category  Microsoft
 *
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 *
 * @version   Release: 0.5.0_2016-11
 *
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
class HttpCallContextTest extends \PHPUnit_Framework_TestCase
{
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
     * @covers \WindowsAzure\Common\Internal\Http\HttpCallContext::getMethod
     * @covers \WindowsAzure\Common\Internal\Http\HttpCallContext::setMethod
     * @depends test__construct
     */
    public function testSetMethod(HttpCallContext $context)
    {
        // Setup
        $expected = 'Method';

        // Test
        $context->setMethod($expected);

        // Assert
        $this->assertEquals($expected, $context->getMethod());
    }

    /**
     * @covers \WindowsAzure\Common\Internal\Http\HttpCallContext::getBody
     * @covers \WindowsAzure\Common\Internal\Http\HttpCallContext::setBody
     * @depends test__construct
     */
    public function testSetBody(HttpCallContext $context)
    {
        // Setup
        $expected = 'Body';

        // Test
        $context->setBody($expected);

        // Assert
        $this->assertEquals($expected, $context->getBody());
    }

    /**
     * @covers \WindowsAzure\Common\Internal\Http\HttpCallContext::getPath
     * @covers \WindowsAzure\Common\Internal\Http\HttpCallContext::setPath
     * @depends test__construct
     */
    public function testSetPath(HttpCallContext $context)
    {
        // Setup
        $expected = 'Path';

        // Test
        $context->setPath($expected);

        // Assert
        $this->assertEquals($expected, $context->getPath());
    }

    /**
     * @covers \WindowsAzure\Common\Internal\Http\HttpCallContext::getUri
     * @covers \WindowsAzure\Common\Internal\Http\HttpCallContext::setUri
     * @depends test__construct
     */
    public function testSetUri(HttpCallContext $context)
    {
        // Setup
        $expected = new Url('http://www.microsoft.com');

        // Test
        $context->setUri($expected);

        // Assert
        $this->assertEquals($expected, $context->getUri());
    }

    /**
     * @covers \WindowsAzure\Common\Internal\Http\HttpCallContext::getHeaders
     * @covers \WindowsAzure\Common\Internal\Http\HttpCallContext::setHeaders
     * @covers \WindowsAzure\Common\Internal\Http\HttpCallContext::addHeader
     * @depends test__construct
     */
    public function testSetHeaders(HttpCallContext $context)
    {
        // Setup
        $expected = ['value1', 'value2', 'value3'];

        // Test
        $context->setHeaders($expected);

        // Assert
        $this->assertEquals($expected, $context->getHeaders());
    }

    /**
     * @covers \WindowsAzure\Common\Internal\Http\HttpCallContext::getQueryParameters
     * @covers \WindowsAzure\Common\Internal\Http\HttpCallContext::setQueryParameters
     * @covers \WindowsAzure\Common\Internal\Http\HttpCallContext::addQueryParameter
     * @depends test__construct
     */
    public function testSetQueryParameters(HttpCallContext $context)
    {
        // Setup
        $expected = ['value1', 'value2', 'value3'];

        // Test
        $context->setQueryParameters($expected);

        // Assert
        $this->assertEquals($expected, $context->getQueryParameters());
    }

    /**
     * @covers \WindowsAzure\Common\Internal\Http\HttpCallContext::getStatusCodes
     * @covers \WindowsAzure\Common\Internal\Http\HttpCallContext::setStatusCodes
     * @covers \WindowsAzure\Common\Internal\Http\HttpCallContext::addStatusCode
     * @depends test__construct
     */
    public function testSetStatusCodes(HttpCallContext $context)
    {
        // Setup
        $expected = [1, 2, 3];

        // Test
        $context->setStatusCodes($expected);

        // Assert
        $this->assertEquals($expected, $context->getStatusCodes());
    }

    /**
     * @covers \WindowsAzure\Common\Internal\Http\HttpCallContext::getHeader
     * @covers \WindowsAzure\Common\Internal\Http\HttpCallContext::addHeader
     * @depends test__construct
     */
    public function testAddHeader(HttpCallContext $context)
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
     * @covers \WindowsAzure\Common\Internal\Http\HttpCallContext::removeHeader
     * @covers \WindowsAzure\Common\Internal\Http\HttpCallContext::getHeaders
     * @covers \WindowsAzure\Common\Internal\Http\HttpCallContext::addHeader
     * @depends test__construct
     */
    public function testRemoveHeader(HttpCallContext $context)
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
     * @covers \WindowsAzure\Common\Internal\Http\HttpCallContext::__toString
     * @depends test__construct
     */
    public function test__toString(HttpCallContext $context)
    {
        // Setup
        $headers = ['h1' => 'v1', 'h2' => 'v2'];
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
