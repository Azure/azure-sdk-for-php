<?php

/**
 * Implementation of class BlobQueueSharedKey.
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
 
namespace PEAR2\WindowsAzure\Services\Core\Authentication;
use PEAR2\WindowsAzure\Services\Core\Authentication\AzureAuthentication;
use PEAR2\WindowsAzure\Resources;

/**
 * Provides shared key authentication scheme for blob and queue. For more info
 * check: http://msdn.microsoft.com/en-us/library/windowsazure/dd179428.aspx
 *
 * @package    azure-sdk-for-php
 * @author     Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright  2012 Microsoft Corporation
 * @license    http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version    Release: @package_version@
 * @link       http://pear.php.net/package/azure-sdk-for-php
 */
class BlobQueueSharedKey extends AzureAuthentication
{
  private $includedHeaders;
  
  public function __construct($accountName, $accountKey)
  {
    parent::__construct($accountName, $accountKey);
    
    $this->includedHeaders = array();
    $this->includedHeaders[] = Resources::CONTENT_ENCODING;
    $this->includedHeaders[] = Resources::CONTENT_LANGUAGE;
    $this->includedHeaders[] = Resources::CONTENT_LENGTH;
    $this->includedHeaders[] = Resources::CONTENT_MD5;
    $this->includedHeaders[] = Resources::CONTENT_TYPE;
    $this->includedHeaders[] = Resources::DATE;
    $this->includedHeaders[] = Resources::IF_MODIFIED_SINCE;
    $this->includedHeaders[] = Resources::IF_MATCH;
    $this->includedHeaders[] = Resources::IF_NONE_MATCH;
    $this->includedHeaders[] = Resources::IF_UNMODIFIED_SINCE;
    $this->includedHeaders[] = Resources::RANGE;
  }
  
  protected function ComputeSignature($request) 
  {
    $canonicalizedHeaders = parent::ComputeCanonicalizedHeaders($request);
    $canonicalizedResource = parent::ComputeCanonicalizedResource($request);
    $headers = $request->GetHeaders();
    
    $stringToSign   = array();
    $stringToSign[] = strtoupper($request->getMethod());
    
    foreach ($this->includedHeaders as $header)
    {
      $stringToSign[] = isset($headers[$header]) ? $headers[$header] : NULL;
    }
    
    if (count($canonicalizedHeaders) > 0)
    {
      $stringToSign[] = implode("\n", $canonicalizedHeaders);
    }
    
    $stringToSign[] = $canonicalizedResource;
    $stringToSign = implode("\n", $stringToSign);
    
    return $stringToSign;
  }
}

?>
