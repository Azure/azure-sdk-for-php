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
  public function __construct($accountName, $accountKey)
  {
    parent::__construct($accountName, $accountKey);
    // Initialize parent::$includedHeaders
  }
  
  protected function ComputeSignature($request) 
  {
    $canonicalizedHeaders = parent::ComputeCanonicalizedHeaders($request);
    $canonicalizedResource = parent::ComputeCanonicalizedResource($request);
    $headers = $request->getHeaders();
    
    $stringToSign   = array();
    $stringToSign[] = strtoupper($request->getMethod());
    
    foreach ($includedHeaders as $index => $header)
    {
      isset($headers[$header]) ? $headers[$header] : NULL;
    }
      // Verify above code and remove below
//    $stringToSign[] = array_key_exists(Resources::CONTENT_ENCODING,     $headers) ? $headers[Resources::CONTENT_ENCODING] : NULL;
//    $stringToSign[] = array_key_exists(Resources::CONTENT_LANGUAGE,     $headers) ? $headers[Resources::CONTENT_LANGUAGE] : NULL;
//    $stringToSign[] = array_key_exists(Resources::CONTENT_LENGTH,       $headers) ? $headers[Resources::CONTENT_LENGTH] : NULL;
//    $stringToSign[] = array_key_exists(Resources::CONTENT_MD5,          $headers) ? $headers[Resources::CONTENT_MD5] : NULL;
//    $stringToSign[] = array_key_exists(Resources::CONTENT_TYPE,         $headers) ? $headers[Resources::CONTENT_TYPE] : NULL;
//    $stringToSign[] = array_key_exists(Resources::DATE,                 $headers) ? $headers[Resources::DATE] : NULL;
//    $stringToSign[] = array_key_exists(Resources::IF_MODIFIED_SINCE,    $headers) ? $headers[Resources::IF_MODIFIED_SINCE] : NULL;
//    $stringToSign[] = array_key_exists(Resources::IF_MATCH,             $headers) ? $headers[Resources::IF_MATCH] : NULL;
//    $stringToSign[] = array_key_exists(Resources::IF_NONE_MATCH,        $headers) ? $headers[Resources::IF_NONE_MATCH] : NULL;
//    $stringToSign[] = array_key_exists(Resources::IF_UNMODIFIED_SINCE,  $headers) ? $headers[Resources::IF_UNMODIFIED_SINCE] : NULL;
//    $stringToSign[] = array_key_exists(Resources::RANGE,                $headers) ? $headers[RANGE] : NULL;
    $stringToSign[] = $canonicalizedHeaders;
    $stringToSign[] = $canonicalizedResource;
    
    if (count($canonicalizedHeaders) > 0)
    {
      $stringToSign[] = implode("\n", $canonicalizedHeaders);
    }
    
    $stringToSign = implode("\n", $stringToSign);
    
    return $stringToSign;
  }
}

?>
