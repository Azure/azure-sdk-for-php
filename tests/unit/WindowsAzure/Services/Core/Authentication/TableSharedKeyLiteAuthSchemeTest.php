<?php

/**
 * Implementation of class TableSharedKeyLiteAuthSchemeTest.
 *
 *
 * PHP version 5
 *
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
 * @package    PEAR2\Tests\Unit\WindowsAzure\Services\Core\Authentication
 * @author     Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright  2012 Microsoft Corporation
 * @license    http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link       http://pear.php.net/package/azure-sdk-for-php
 */

namespace PEAR2\Tests\Unit\WindowsAzure\Services\Core\Authentication;
use PEAR2\Tests\Mock\WindowsAzure\Services\Core\Authentication\TableSharedKeyLiteAuthSchemeMock;
use PEAR2\WindowsAzure\Resources;
use PEAR2\Tests\Framework\TestResources;

/**
 * Unit tests for TableSharedKeyLiteAuthScheme class.
 *
 * @package    PEAR2\Tests\Unit\WindowsAzure\Services\Core\Authentication
 * @author     Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright  2012 Microsoft Corporation
 * @license    http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version    Release: @package_version@
 * @link       http://pear.php.net/package/azure-sdk-for-php
 */
class TableSharedKeyLiteAuthSchemeTest extends \PHPUnit_Framework_TestCase
{
    /**
    * @covers PEAR2\WindowsAzure\Services\Core\Authentication\TableSharedKeyLiteAuthScheme::__construct
    */
    public function test__construct()
    {
        $expected = array();
        $expected[] = Resources::DATE;

        $mock = new TableSharedKeyLiteAuthSchemeMock(TestResources::ACCOUNT_NAME, TestResources::KEY4);

        $this->assertEquals($expected, $mock->getIncludedHeaders());
    }

    /**
    * @covers PEAR2\WindowsAzure\Services\Core\Authentication\TableSharedKeyLiteAuthScheme::computeSignature
    */
    public function testComputeSignatureSimple()
    {
        $httpMethod = 'GET';
        $queryParams = array(Resources::QP_COMP => 'list');
        $url = TestResources::URI1;
        $date = TestResources::DATE1;
        $apiVersion = Resources::API_VERSION;
        $accountName = TestResources::ACCOUNT_NAME;
        $headers = array(Resources::X_MS_DATE => $date, Resources::X_MS_VERSION => $apiVersion);
        $expected = "\n/$accountName" . parse_url($url, PHP_URL_PATH) . "?comp=list";
        $mock = new TableSharedKeyLiteAuthSchemeMock($accountName, TestResources::KEY4);

        $actual = $mock->computeSignatureMock($headers, $url, $queryParams, $httpMethod);

        $this->assertEquals($expected, $actual);
    }

    /**
     * @covers PEAR2\WindowsAzure\Services\Core\Authentication\TableSharedKeyLiteAuthScheme::getAuthorizationHeader
     */
    public function testGetAuthorizationHeaderSimple()
    {
        $accountName = TestResources::ACCOUNT_NAME;
        $apiVersion = Resources::API_VERSION;
        $accountKey = TestResources::KEY4;
        $url = TestResources::URI2;
        $date1 = TestResources::DATE2;
        $headers = array(Resources::X_MS_VERSION => $apiVersion, Resources::X_MS_DATE => $date1);
        $queryParams = array(Resources::QP_COMP => 'list');
        $httpMethod = 'GET';
        $expected = 'SharedKeyLite ' . $accountName . ':KB+TK3FPHLADYwd0/b3PcZgK/fYXUSlwsoOIf80l2co=';

        $mock = new TableSharedKeyLiteAuthSchemeMock($accountName, $accountKey);

        $actual = $mock->getAuthorizationHeader($headers, $url, $queryParams, $httpMethod);

        $this->assertEquals($expected, $actual);
    }
}

?>
