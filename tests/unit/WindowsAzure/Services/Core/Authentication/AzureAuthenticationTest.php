<?php

/**
 * Implementation of class AzureAuthentication.
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

use PEAR2\WindowsAzure\Services\Core\Authentication\AzureAuthentication;
use PEAR2\Tests\Unit\Utilities;
use PEAR2\Tests\Mock\WindowsAzure\Services\Core\Authentication\AzureAuthenticationMock;
use PEAR2\Tests\Unit\TestResources;
use PEAR2\WindowsAzure\Resources;

/**
 * Unit tests for AzureAuthentication class.
 *
 * @package    azure-sdk-for-php
 * @author     Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright  2012 Microsoft Corporation
 * @license    http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version    Release: @package_version@
 * @link       http://pear.php.net/package/azure-sdk-for-php
 */
class AzureAuthenticationTest extends PHPUnit_Framework_TestCase
{
  /**
  * @covers PEAR2\WindowsAzure\Services\Core\Authentication\AzureAuthentication::__construct
  */
  public function test__construct()
  {
    $mock = new AzureAuthenticationMock(TestResources::ACCOUNT_NAME, TestResources::KEY4);
    $this->assertEquals(TestResources::ACCOUNT_NAME, $mock->GetAccountName());
    $this->assertEquals(TestResources::KEY4, $mock->GetAccountKey());
  }
  
  /**
  * @covers PEAR2\WindowsAzure\Services\Core\Authentication\AzureAuthentication::__construct
  */
  public function testComputeCanonicalizedHeadersMock()
  {
    $date = TestResources::DATE1;
    $headers = array();
    $headers[Resources::X_MS_DATE] = $date;
    $headers[Resources::X_MS_VERSION] = Resources::API_VERSION;
    $expected = array();
    $expected[] = Resources::X_MS_DATE . ':' . $date;
    $expected[] = Resources::X_MS_VERSION . ':' . Resources::API_VERSION;
    $mock = new AzureAuthenticationMock(TestResources::ACCOUNT_NAME, TestResources::KEY4);
    
    $actual = $mock->ComputeCanonicalizedHeadersMock($headers);
    
    $this->assertEquals($expected, $actual);
  }
  
  /**
  * @covers PEAR2\WindowsAzure\Services\Core\Authentication\AzureAuthentication::ComputeCanonicalizedResource
  */
  public function testComputeCanonicalizedResourceMockSimple()
  {
    $queryVariables = array();
    $queryVariables['COMP'] = 'list';
    $accountName = TestResources::ACCOUNT_NAME;
    $url = TestResources::URI1;
    $expected = '/' . $accountName . parse_url($url, PHP_URL_PATH) . "\n" . 'comp:list';
    $mock = new AzureAuthenticationMock($accountName, TestResources::KEY4);
    
    $actual = $mock->ComputeCanonicalizedResourceMock($url, $queryVariables);
    
    $this->assertEquals($expected, $actual);
  }
}

?>
