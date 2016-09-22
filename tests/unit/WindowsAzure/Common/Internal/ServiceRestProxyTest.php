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

namespace Tests\unit\WindowsAzure\Common\Internal;

use Tests\Mock\WindowsAzure\Common\Internal\Filters\SimpleFilterMock;
use MicrosoftAzure\Storage\Blob\Models\AccessCondition;
use WindowsAzure\Common\Internal\ServiceRestProxy;
use WindowsAzure\Common\Internal\Resources;
use WindowsAzure\Common\Internal\Http\HttpClient;
use WindowsAzure\Common\Internal\Serialization\XmlSerializer;

/**
 * Unit tests for class ServiceRestProxy.
 *
 * @category  Microsoft
 *
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 *
 * @version   Release: 0.4.5_2016-09
 *
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
class ServiceRestProxyTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers WindowsAzure\Common\Internal\ServiceRestProxy::generateMetadataHeaders
     */
    public function test__construct()
    {
        // Setup
        $channel = new HttpClient();
        $uri = 'http://www.microsoft.com';
        $accountName = 'myaccount';
        $dataSerializer = new XmlSerializer();

        // Test
        $proxy = new ServiceRestProxy($channel, $uri, $accountName, $dataSerializer);

        // Assert
        $this->assertNotNull($proxy);
        $this->assertEquals($accountName, $proxy->getAccountName());
        $this->assertEquals($uri, $proxy->getUri());

        return $proxy;
    }

    /**
     * @covers  WindowsAzure\Common\Internal\ServiceRestProxy::withFilter
     * @depends test__construct
     */
    public function testWithFilter($restRestProxy)
    {
        // Setup
        $filter = new SimpleFilterMock('name', 'value');

        // Test
        $actual = $restRestProxy->withFilter($filter);

        // Assert
        $this->assertCount(1, $actual->getFilters());
        $this->assertCount(0, $restRestProxy->getFilters());
    }

    /**
     * @covers  WindowsAzure\Common\Internal\ServiceRestProxy::getFilters
     * @depends test__construct
     */
    public function testGetFilters($restRestProxy)
    {
        // Setup
        $filter = new SimpleFilterMock('name', 'value');
        $withFilter = $restRestProxy->withFilter($filter);

        // Test
        $actual1 = $withFilter->getFilters();
        $actual2 = $restRestProxy->getFilters();

        // Assert
        $this->assertCount(1, $actual1);
        $this->assertCount(0, $actual2);
    }

    /**
     * @covers  WindowsAzure\Common\Internal\ServiceRestProxy::addOptionalAccessConditionHeader
     * @depends test__construct
     */
    public function testAddOptionalAccessContitionHeader($restRestProxy)
    {
        // Setup
        $expectedHeader = Resources::IF_MATCH;
        $expectedValue = '0x8CAFB82EFF70C46';
        $accessCondition = AccessCondition::ifMatch($expectedValue);
        $headers = array('Header1' => 'Value1', 'Header2' => 'Value2');

        // Test
        $actual = $restRestProxy->addOptionalAccessConditionHeader($headers, $accessCondition);

        // Assert
        $this->assertCount(3, $actual);
        $this->assertEquals($expectedValue, $actual[$expectedHeader]);
    }

    /**
     * @covers  WindowsAzure\Common\Internal\ServiceRestProxy::addOptionalSourceAccessConditionHeader
     * @depends test__construct
     */
    public function testAddOptionalSourceAccessContitionHeader($restRestProxy)
    {
        // Setup
        $expectedHeader = Resources::X_MS_SOURCE_IF_MATCH;
        $expectedValue = '0x8CAFB82EFF70C46';
        $accessCondition = AccessCondition::ifMatch($expectedValue);
        $headers = array('Header1' => 'Value1', 'Header2' => 'Value2');

        // Test
        $actual = $restRestProxy->addOptionalSourceAccessConditionHeader($headers, $accessCondition);

        // Assert
        $this->assertCount(3, $actual);
        $this->assertEquals($expectedValue, $actual[$expectedHeader]);
    }

    /**
     * @covers  WindowsAzure\Common\Internal\ServiceRestProxy::groupQueryValues
     * @depends test__construct
     */
    public function testGroupQueryValues($restRestProxy)
    {
        // Setup
        $values = array('A', 'B', 'C');
        $expected = 'A,B,C';

        // Test
        $actual = $restRestProxy->groupQueryValues($values);

        // Assert
        $this->assertEquals($expected, $actual);
    }

    /**
     * @covers  WindowsAzure\Common\Internal\ServiceRestProxy::groupQueryValues
     * @depends test__construct
     */
    public function testGroupQueryValuesWithNulls($restRestProxy)
    {
        // Setup
        $values = array(null, '', null);

        // Test
        $actual = $restRestProxy->groupQueryValues($values);

        // Assert
        $this->assertTrue(empty($actual));
    }

    /**
     * @covers  WindowsAzure\Common\Internal\ServiceRestProxy::groupQueryValues
     * @depends test__construct
     */
    public function testGroupQueryValuesWithMix($restRestProxy)
    {
        // Setup
        $values = array(null, 'B', 'C', '');
        $expected = 'B,C';

        // Test
        $actual = $restRestProxy->groupQueryValues($values);

        // Assert
        $this->assertEquals($expected, $actual);
    }

    /** 
     * @covers WindowsAzure\Common\Internal\ServiceRestProxy::addPostParameter
     * @depends test__construct
     */
    public function testPostParameter($restRestProxy)
    {
        // Setup
        $postParameters = array();
        $key = 'a';
        $expected = 'b';

        // Test
        $processedPostParameters = $restRestProxy->addPostParameter($postParameters, $key, $expected);
        $actual = $processedPostParameters[$key];

        // Assert
        $this->assertEquals(
            $expected,
            $actual
        );
    }

    /**
     * @covers WindowsAzure\Common\Internal\ServiceRestProxy::generateMetadataHeaders
     * @depends test__construct
     */
    public function testGenerateMetadataHeader($proxy)
    {
        // Setup
        $metadata = array('key1' => 'value1', 'MyName' => 'WindowsAzure', 'MyCompany' => 'Microsoft_');
        $expected = array();
        foreach ($metadata as $key => $value) {
            $expected[Resources::X_MS_META_HEADER_PREFIX.strtolower($key)] = $value;
        }

        // Test
        $actual = $proxy->generateMetadataHeaders($metadata);

        // Assert
        $this->assertEquals($expected, $actual);
    }

    /**
     * @covers WindowsAzure\Common\Internal\ServiceRestProxy::generateMetadataHeaders
     * @depends test__construct
     */
    public function testGenerateMetadataHeaderInvalidNameFail($proxy)
    {
        // Setup
        $metadata = array('key1' => "value1\n", 'MyName' => "\rAzurr", 'MyCompany' => "Micr\r\nosoft_");
        $this->setExpectedException(get_class(new \InvalidArgumentException(Resources::INVALID_META_MSG)));

        // Test
        $proxy->generateMetadataHeaders($metadata);
    }

    /**
     * @covers WindowsAzure\Common\Internal\ServiceRestProxy::getMetadataArray
     * @depends test__construct
     */
    public function testGetMetadataArray($proxy)
    {
        // Setup
        $expected = array('key1' => 'value1', 'myname' => 'azure', 'mycompany' => 'microsoft_');
        $metadataHeaders = array();
        foreach ($expected as $key => $value) {
            $metadataHeaders[Resources::X_MS_META_HEADER_PREFIX.strtolower($key)] = $value;
        }

        // Test
        $actual = $proxy->getMetadataArray($metadataHeaders);

        // Assert
        $this->assertEquals($expected, $actual);
    }

    /**
     * @covers WindowsAzure\Common\Internal\ServiceRestProxy::getMetadataArray
     * @depends test__construct
     */
    public function testGetMetadataArrayWithMsHeaders($proxy)
    {
        // Setup
        $key = 'name';
        $validMetadataKey = Resources::X_MS_META_HEADER_PREFIX.$key;
        $value = 'correct';
        $metadataHeaders = array('x-ms-key1' => 'value1', 'myname' => 'x-ms-date',
                          $validMetadataKey => $value, 'mycompany' => 'microsoft_', );

        // Test
        $actual = $proxy->getMetadataArray($metadataHeaders);

        // Assert
        $this->assertCount(1, $actual);
        $this->assertEquals($value, $actual[$key]);
    }
}
