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

namespace Tests\unit\WindowsAzure\Common\Internal\Authentication;

use Tests\mock\WindowsAzure\Common\Internal\Authentication\SharedKeyAuthSchemeMock;
use WindowsAzure\Common\Internal\Resources;
use Tests\framework\TestResources;

/**
 * Unit tests for SharedKeyAuthScheme class.
 *
 * @author     Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright  2012 Microsoft Corporation
 * @license    http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 *
 * @version   Release: 0.5.0_2016-11
 *
 * @link       https://github.com/windowsazure/azure-sdk-for-php
 */
class SharedKeyAuthSchemeTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers \WindowsAzure\Common\Internal\Authentication\SharedKeyAuthScheme::__construct
     */
    public function test__construct()
    {
        $expected = [];
        $expected[] = Resources::CONTENT_ENCODING;
        $expected[] = Resources::CONTENT_LANGUAGE;
        $expected[] = Resources::CONTENT_LENGTH;
        $expected[] = Resources::CONTENT_MD5;
        $expected[] = Resources::CONTENT_TYPE;
        $expected[] = Resources::DATE;
        $expected[] = Resources::IF_MODIFIED_SINCE;
        $expected[] = Resources::IF_MATCH;
        $expected[] = Resources::IF_NONE_MATCH;
        $expected[] = Resources::IF_UNMODIFIED_SINCE;
        $expected[] = Resources::RANGE;

        $mock = new SharedKeyAuthSchemeMock(TestResources::ACCOUNT_NAME, TestResources::KEY4);

        $this->assertEquals($expected, $mock->getIncludedHeaders());
    }

    /**
     * @covers \WindowsAzure\Common\Internal\Authentication\SharedKeyAuthScheme::computeSignature
     */
    public function testComputeSignatureSimple()
    {
        $httpMethod = 'GET';
        $queryParams = [Resources::QP_COMP => 'list'];
        $url = TestResources::URI1;
        $date = TestResources::DATE1;
        $apiVersion = Resources::STORAGE_API_LATEST_VERSION;
        $accountName = TestResources::ACCOUNT_NAME;
        $headers = [Resources::X_MS_DATE => $date, Resources::X_MS_VERSION => $apiVersion];
        $expected = "GET\n\n\n\n\n\n\n\n\n\n\n\n".Resources::X_MS_DATE.":$date\n".Resources::X_MS_VERSION.
                ":$apiVersion\n/$accountName".parse_url($url, PHP_URL_PATH)."\ncomp:list";
        $mock = new SharedKeyAuthSchemeMock($accountName, TestResources::KEY4);

        $actual = $mock->computeSignatureMock($headers, $url, $queryParams, $httpMethod);

        $this->assertEquals($expected, $actual);
    }

    /**
     * @covers \WindowsAzure\Common\Internal\Authentication\SharedKeyAuthScheme::getAuthorizationHeader
     */
    public function testGetAuthorizationHeaderSimple()
    {
        $accountName = TestResources::ACCOUNT_NAME;
        $apiVersion = Resources::STORAGE_API_LATEST_VERSION;
        $accountKey = TestResources::KEY4;
        $url = TestResources::URI2;
        $date1 = TestResources::DATE2;
        $headers = [Resources::X_MS_VERSION => $apiVersion, Resources::X_MS_DATE => $date1];
        $queryParams = [Resources::QP_COMP => 'list'];
        $httpMethod = 'GET';
        $expected = 'SharedKey '.$accountName.':7O9UOMTnAEF+cuwZzo1BlDj2qJm8yNywajta5he6Qig=';

        $mock = new SharedKeyAuthSchemeMock($accountName, $accountKey);

        $actual = $mock->getAuthorizationHeader($headers, $url, $queryParams, $httpMethod);

        $this->assertEquals($expected, $actual);
    }
}
