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

use Tests\framework\TestResources;
use Tests\mock\WindowsAzure\Common\Internal\Filters\SimpleFilterMock;
use WindowsAzure\Common\Internal\Resources;
use WindowsAzure\Common\Internal\Http\HttpClient;
use WindowsAzure\Common\Internal\Http\Url;
use WindowsAzure\Common\ServiceException;

/**
 * Unit tests for class HttpClient.
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
class HttpClientTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers \WindowsAzure\Common\Internal\Http\HttpClient::__construct
     */
    public function test__construct()
    {
        // Test
        $channel = new HttpClient();
        $headers = $channel->getHeaders();

        // Assert
        $this->assertTrue(isset($channel));
    }

    /**
     * @covers \WindowsAzure\Common\Internal\Http\HttpClient::setUrl
     */
    public function testSetUrl()
    {
        // Setup
        $channel = new HttpClient();
        $url = new Url(TestResources::VALID_URL);

        // Test
        $channel->setUrl($url);

        // Assert
        $this->assertInstanceOf('\WindowsAzure\Common\Internal\Http\IUrl', $channel->getUrl());
    }

    /**
     * @covers \WindowsAzure\Common\Internal\Http\HttpClient::getUrl
     */
    public function testGetUrl()
    {
        // Setup
        $channel = new HttpClient();
        $url = new Url(TestResources::VALID_URL);
        $channel->setUrl($url);

        // Test
        $channelUrl = $channel->getUrl();

        // Assert
        $this->assertInstanceOf('WindowsAzure\Common\Internal\Http\IUrl', $channelUrl);
        $this->assertEquals(TestResources::VALID_URL.'/', $channelUrl);
    }

    /**
     * @covers \WindowsAzure\Common\Internal\Http\HttpClient::setMethod
     */
    public function testSetMethod()
    {
        // Setup
        $channel = new HttpClient();
        $httpMethod = 'GET';

        // Test
        $channel->setMethod($httpMethod);

        // Assert
        $this->assertEquals($httpMethod, $channel->getMethod());
    }

    /**
     * @covers \WindowsAzure\Common\Internal\Http\HttpClient::getMethod
     */
    public function testGetMethod()
    {
        // Setup
        $channel = new HttpClient();
        $httpMethod = 'GET';
        $channel->setMethod($httpMethod);

        // Test
        $channelHttpMethod = $channel->getMethod();

        // Assert
        $this->assertEquals($httpMethod, $channelHttpMethod);
    }

    /**
     * @covers \WindowsAzure\Common\Internal\Http\HttpClient::setHeaders
     */
    public function testSetHeaders()
    {
        // Setup
        $channel = new HttpClient();
        $header1 = TestResources::HEADER1;
        $header2 = TestResources::HEADER2;
        $value1 = TestResources::HEADER1_VALUE;
        $value2 = TestResources::HEADER2_VALUE;
        $headers = [$header1 => $value1, $header2 => $value2];

        // Test
        $channel->setHeaders($headers);

        // Assert
        $channelHeaders = $channel->getHeaders();
        $this->assertCount(4, $channelHeaders);
        $this->assertEquals($value1, $channelHeaders[$header1]);
        $this->assertEquals($value2, $channelHeaders[$header2]);
    }

    /**
     * @covers \WindowsAzure\Common\Internal\Http\HttpClient::getHeaders
     */
    public function testGetHeaders()
    {
        // Setup
        $channel = new HttpClient();
        $header1 = TestResources::HEADER1;
        $header2 = TestResources::HEADER2;
        $value1 = TestResources::HEADER1_VALUE;
        $value2 = TestResources::HEADER2_VALUE;
        $channel->setHeader($header1, $value1);
        $channel->setHeader($header2, $value2);

        // Test
        $headers = $channel->getHeaders();

        // Assert
        $this->assertCount(4, $headers);
        $this->assertEquals($value1, $headers[$header1]);
        $this->assertEquals($value2, $headers[$header2]);
    }

    /**
     * @covers \WindowsAzure\Common\Internal\Http\HttpClient::setHeader
     */
    public function testSetHeaderNewHeader()
    {
        // Setup
        $channel = new HttpClient();

        // Test
        $channel->setHeader(TestResources::HEADER1, TestResources::HEADER1_VALUE);

        // Assert
        $headers = $channel->getHeaders();
        $this->assertCount(3, $headers);
        $this->assertEquals(TestResources::HEADER1_VALUE, $headers[TestResources::HEADER1]);
    }

    /**
     * @covers \WindowsAzure\Common\Internal\Http\HttpClient::setHeader
     */
    public function testSetHeaderExistingHeaderReplace()
    {
        // Setup
        $channel = new HttpClient();
        $channel->setHeader(TestResources::HEADER1, TestResources::HEADER1_VALUE);

        // Test
        $channel->setHeader(TestResources::HEADER1, TestResources::HEADER2_VALUE, true);

        // Assert
        $headers = $channel->getHeaders();
        $this->assertCount(3, $headers);
        $this->assertEquals(TestResources::HEADER2_VALUE, $headers[TestResources::HEADER1]);
    }

    /**
     * @covers \WindowsAzure\Common\Internal\Http\HttpClient::setHeader
     */
    public function testSetHeaderExistingHeaderAppend()
    {
        // Setup
        $channel = new HttpClient();
        $channel->setHeader(TestResources::HEADER1, TestResources::HEADER1_VALUE);
        $expected = TestResources::HEADER1_VALUE.', '.TestResources::HEADER2_VALUE;

        // Test
        $channel->setHeader(TestResources::HEADER1, TestResources::HEADER2_VALUE);

        // Assert
        $headers = $channel->getHeaders();
        $this->assertCount(3, $headers);
        $this->assertEquals($expected, $headers[TestResources::HEADER1]);
    }

    /**
     * @covers \WindowsAzure\Common\Internal\Http\HttpClient::sendAndGetHttpResponse
     */
    public function testSendAndGetHttpResponse()
    {
        // Setup
        $channel = new HttpClient();
        $url = new Url('http://example.com/');
        $channel->setExpectedStatusCode('200');

        // Test
        $response = $channel->sendAndGetHttpResponse([], $url);

        // Assert
        $this->assertInstanceOf('\Psr\Http\Message\ResponseInterface', $response);
    }

    /**
     * @covers \WindowsAzure\Common\Internal\Http\HttpClient::send
     */
    public function testSendSimple()
    {
        // Setup
        $channel = new HttpClient();
        $url = new Url('http://example.com/');
        $channel->setExpectedStatusCode('200');

        // Test
        $response = $channel->send([], $url);

        // Assert
        $this->assertTrue(isset($response));
    }

    /**
     * @covers \WindowsAzure\Common\Internal\Http\HttpClient::send
     */
    public function testSendWithContent()
    {
        // Setup
        $channel = new HttpClient();
        $url = new Url('http://example.com/');
        $channel->setExpectedStatusCode('200');
        $channel->setBody('This is body');
        $channel->setMethod('PUT');
        $this->setExpectedException(get_class(new ServiceException('405')));

        // Test
        $channel->send([], $url);
    }

    /**
     * @covers \WindowsAzure\Common\Internal\Http\HttpClient::send
     */
    public function testSendWithOneFilter()
    {
        // Setup
        $channel = new HttpClient();
        $url = new Url('http://example.com/');
        $channel->setExpectedStatusCode('200');
        $expectedHeader = TestResources::HEADER1;
        $expectedResponseSubstring = TestResources::HEADER1_VALUE;
        $filter = new SimpleFilterMock($expectedHeader, $expectedResponseSubstring);
        $filters = [$filter];

        // Test
        $response = $channel->send($filters, $url);

        // Assert
        $this->assertArrayHasKey($expectedHeader, $channel->getHeaders());
        $this->assertTrue(isset($response));
        $this->assertContains($expectedResponseSubstring, $response);
    }

    /**
     * @covers \WindowsAzure\Common\Internal\Http\HttpClient::send
     */
    public function testSendWithMultipleFilters()
    {
        // Setup
        $channel = new HttpClient();
        $url = new Url('http://example.com/');
        $channel->setExpectedStatusCode('200');
        $expectedHeader1 = TestResources::HEADER1;
        $expectedResponseSubstring1 = TestResources::HEADER1_VALUE;
        $expectedHeader2 = TestResources::HEADER2;
        $expectedResponseSubstring2 = TestResources::HEADER2_VALUE;
        $filter1 = new SimpleFilterMock($expectedHeader1, $expectedResponseSubstring1);
        $filter2 = new SimpleFilterMock($expectedHeader2, $expectedResponseSubstring2);
        $filters = [$filter1, $filter2];

        // Test
        $response = $channel->send($filters, $url);

        // Assert
        $this->assertArrayHasKey($expectedHeader1, $channel->getHeaders());
        $this->assertArrayHasKey($expectedHeader2, $channel->getHeaders());
        $this->assertTrue(isset($response));
        $this->assertContains($expectedResponseSubstring1, $response);
        $this->assertContains($expectedResponseSubstring2, $response);
    }

    /**
     * @covers \WindowsAzure\Common\Internal\Http\HttpClient::send
     */
    public function testSendFail()
    {
        // Setup
        $channel = new HttpClient();
        $url = new Url('http://example.com/');
        $channel->setExpectedStatusCode('201');
        $this->setExpectedException(get_class(new ServiceException('200')));

        // Test
        $channel->send([], $url);
    }

    /**
     * @covers \WindowsAzure\Common\Internal\Http\HttpClient::setExpectedStatusCode
     */
    public function testSetSuccessfulStatusCodeSimple()
    {
        // Setup
        $channel = new HttpClient();
        $code = '200';

        // Test
        $channel->setExpectedStatusCode($code);

        // Assert
        $this->assertContains($code, $channel->getSuccessfulStatusCode());
    }

    /**
     * @covers \WindowsAzure\Common\Internal\Http\HttpClient::setExpectedStatusCode
     */
    public function testSetSuccessfulStatusCodeArray()
    {
        // Setup
        $channel = new HttpClient();
        $codes = ['200', '201', '202'];

        // Test
        $channel->setExpectedStatusCode($codes);

        // Assert
        $this->assertEquals($codes, $channel->getSuccessfulStatusCode());
    }

    /**
     * @covers \WindowsAzure\Common\Internal\Http\HttpClient::getSuccessfulStatusCode
     */
    public function testGetSuccessfulStatusCode()
    {
        // Setup
        $channel = new HttpClient();
        $codes = ['200', '201', '202'];
        $channel->setExpectedStatusCode($codes);

        // Test
        $actualErrorCodes = $channel->getSuccessfulStatusCode();

        // Assert
        $this->assertEquals($codes, $actualErrorCodes);
    }

    /**
     * @covers \WindowsAzure\Common\Internal\Http\HttpClient::setConfig
     */
    public function testSetConfig()
    {
        // Setup
        $channel = new HttpClient();
        $name = Resources::CONNECT_TIMEOUT;
        $value = 10;

        // Test
        $channel->setConfig($name, $value);

        // Assert
        $this->assertEquals($value, $channel->getConfig($name));
    }

    /**
     * @covers \WindowsAzure\Common\Internal\Http\HttpClient::getConfig
     */
    public function testGetConfig()
    {
        // Setup
        $channel = new HttpClient();
        $name = Resources::CONNECT_TIMEOUT;
        $value = 10;
        $channel->setConfig($name, $value);

        // Test
        $actualValue = $channel->getConfig($name);

        // Assert
        $this->assertEquals($value, $actualValue);
    }

    /**
     * @covers \WindowsAzure\Common\Internal\Http\HttpClient::setBody
     */
    public function testSetBody()
    {
        // Setup
        $channel = new HttpClient();
        $expected = 'new body';

        // Test
        $channel->setBody($expected);

        // Assert
        $this->assertEquals($expected, $channel->getBody());
    }

    /**
     * @covers \WindowsAzure\Common\Internal\Http\HttpClient::getBody
     */
    public function testGetBody()
    {
        // Setup
        $channel = new HttpClient();
        $expected = 'new body';
        $channel->setBody($expected);

        // Test
        $actual = $channel->getBody();

        // Assert
        $this->assertEquals($expected, $actual);
    }

    /**
     * @covers \WindowsAzure\Common\Internal\Http\HttpClient::__clone
     */
    public function test__clone()
    {
        // Setup
        $channel = new HttpClient();
        $channel->setHeader('myheader', 'headervalue');
        $channel->setUrl(new Url('http://www.example.com'));

        // Test
        $actual = clone $channel;
        $channel->setUrl(new Url('http://example.com/'));
        $channel->setHeader('headerx', 'valuex');

        // Assert
        $this->assertNotEquals($channel->getHeaders(), $actual->getHeaders());
        $this->assertNotEquals($channel->getUrl()->getUrl(), $actual->getUrl()->getUrl());
    }

    /**
     * @covers \WindowsAzure\Common\Internal\Http\HttpClient::throwIfError
     */
    public function testThrowIfError()
    {
        // Setup
        $this->setExpectedException(get_class(new ServiceException('200')));

        HttpClient::throwIfError(200, null, null, [10]);
    }
}
