<?php

/**
 * Implementation of class AzureAuthentication.
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
use PEAR2\WindowsAzure\Resources;

/**
 * Base class for azure authentication schemes.
 *
 * @package    azure-sdk-for-php
 * @author     Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright  2012 Microsoft Corporation
 * @license    http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version    Release: @package_version@
 * @link       http://pear.php.net/package/azure-sdk-for-php
 */
abstract class AzureAuthentication
{
  private   $accountName;
  private   $accountKey;
  protected $includedHeaders;
  
  protected function ComputeCanonicalizedHeaders($request)
  {
    $headers = $request->getHeaders();
    $canonicalizedHeaders = array();
    
    if (!is_null($headers))
    {
      foreach ($headers as $header => $value)
      {
        if (is_bool($value)) 
        {
          $value = $value === true ? 'True' : 'False';
        }
      }
      $headers[$header] = $value;
      if (substr($header, 0, strlen(Resources::X_MS_HEADER_PREFIX)) == Resources::X_MS_HEADER_PREFIX)
      {
        $canonicalizedHeaders[] = strtolower($header) . ':' . $value;
      }
    }
    
    sort($canonicalizedHeaders);
  }
  
  protected function ComputeCanonicalizedResource($request)
  {
    
  }
  
  public function GetAuthorizationHeader($request)
  {
    return 'SharedKey ' . $this->accountName . ':' .
            base64_encode(hash_hmac('sha256', ComputeSignature($request), 
                    base64_decode($this->accountKey), true));
  }
  
  abstract protected function ComputeSignature($request);
  
  public function __construct($accountName, $accountKey)
  {
    $this->accountKey       = $accountKey;
    $this->accountName      = $accountName;
    $this->includedHeaders  = array();
  }
}

?>
