<?php

/**
 * Implementation of class TableSharedKeyLiteAuthSchemeMock.
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
 * @package    WindowsAzure-sdk-for-php
 * @author     Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright  2012 Microsoft Corporation
 * @license    http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link       http://pear.php.net/package/azure-sdk-for-php
 */
 
namespace PEAR2\Tests\Mock\WindowsAzure\Services\Core\Authentication;
use PEAR2\WindowsAzure\Services\Core\Authentication\TableSharedKeyLiteAuthScheme;

/**
 * Mock class to wrap SharedKeyAuthScheme class.
 *
 * @package    WindowsAzure-sdk-for-php
 * @author     Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright  2012 Microsoft Corporation
 * @license    http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version    Release: @package_version@
 * @link       http://pear.php.net/package/azure-sdk-for-php
 */
class TableSharedKeyLiteAuthSchemeMock extends TableSharedKeyLiteAuthScheme
{
  public function getIncludedHeaders()
  {
    return $this->includedHeaders;
  }
  
  public function computeSignatureMock($headers, $url, $queryParams, $httpMethod)
  {
    return parent::computeSignature($headers, $url, $queryParams, $httpMethod);
  }
}

?>
