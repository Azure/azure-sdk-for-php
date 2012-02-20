<?php

/**
 * Implementation of class BlobQueueSharedKeyTest.
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
 * @package    azure-sdk-for-php
 * @author     Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright  2012 Microsoft Corporation
 * @license    http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link       http://pear.php.net/package/azure-sdk-for-php
 */

use PEAR2\Tests\Mock\WindowsAzure\Services\Core\Authentication\BlobQueueSharedKeyMock;
use PEAR2\WindowsAzure\Resources;
use PEAR2\Tests\Unit\TestResources;

/**
 * Unit tests for BlobQueueSharedKey class.
 *
 * @package    azure-sdk-for-php
 * @author     Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright  2012 Microsoft Corporation
 * @license    http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version    Release: @package_version@
 * @link       http://pear.php.net/package/azure-sdk-for-php
 */
class BlobQueueSharedKeyTest extends PHPUnit_Framework_TestCase
{
  /**
  * @covers PEAR2\WindowsAzure\Services\Core\Authentication\BlobQueueSharedKey::__construct
  */
  public function test__construct()
  {
    $expected = array();
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
    
    $mock = new BlobQueueSharedKeyMock(TestResources::ACCOUNT_NAME, TestResources::KEY4);
    
    $this->assertEquals($expected, $mock->GetIncludedHeaders());
  }
  
  /**
  * @covers PEAR2\WindowsAzure\Services\Core\Authentication\BlobQueueSharedKey::ComputeSignature
  */
  public function testComputeSignatureSimple()
  {
    $httpMethod = 'GET';
    $queryParams = array('comp' => 'list');
    $url = TestResources::URI1;
    $date = TestResources::DATE1;
    $apiVersion = Resources::API_VERSION;
    $accountName = TestResources::ACCOUNT_NAME;
    $headers = array(Resources::X_MS_DATE => $date, Resources::X_MS_VERSION => $apiVersion);
    $expected = "GET\n\n\n\n\n\n\n\n\n\n\n\n" . Resources::X_MS_DATE . ":$date\n" . Resources::X_MS_VERSION . 
            ":$apiVersion\n/$accountName" . parse_url($url, PHP_URL_PATH) . "\ncomp:list";
    $mock = new BlobQueueSharedKeyMock($accountName, TestResources::KEY4);
    
    $actual = $mock->ComputeSignatureMock($headers, $url, $queryParams, $httpMethod);
    
    $this->assertEquals($expected, $actual);
  }
  
    /**
  * @covers PEAR2\WindowsAzure\Services\Core\Authentication\AzureAuthentication::GetAuthorizationHeader
  */
  public function testGetAuthorizationHeaderSimple()
  {
    $accountName = TestResources::ACCOUNT_NAME;
    $apiVersion = Resources::API_VERSION;
    $accountKey = TestResources::KEY4;
    $url = TestResources::URI2;
    $date1 = TestResources::DATE2;
    $headers = array(Resources::X_MS_VERSION => $apiVersion, Resources::X_MS_DATE => $date1);
    $queryParams = array('comp' => 'list');
    $httpMethod = 'GET';
    $expected = 'SharedKey ' . $accountName . ':tPIT33PrvWHsSXTbzvT93R4YmP13c5H6WB7lGKO3E2M=';
    
    $mock = new BlobQueueSharedKeyMock($accountName, $accountKey);
    
    $actual = $mock->GetAuthorizationHeader($headers, $url, $queryParams, $httpMethod);
    
    $this->assertEquals($expected, $actual);
  }
}

?>
