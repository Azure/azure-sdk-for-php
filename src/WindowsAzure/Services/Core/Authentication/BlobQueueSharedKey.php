<?php

/**
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
 * PHP version 5
 *
 * @category  Microsoft
 * @package   PEAR2\WindowsAzure\Services\Core\Authentication
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
 
namespace PEAR2\WindowsAzure\Services\Core\Authentication;
use PEAR2\WindowsAzure\Services\Core\Authentication\AzureAuthentication;
use PEAR2\WindowsAzure\Resources;

/**
 * Provides shared key authentication scheme for blob and queue. For more info
 * check: http://msdn.microsoft.com/en-us/library/windowsazure/dd179428.aspx
 *
 * @category  Microsoft
 * @package   PEAR2\WindowsAzure\Services\Core\Authentication
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
class BlobQueueSharedKey extends AzureAuthentication
{
    protected $includedHeaders;

    /**
     * Constructor.
     *
     * @param string $accountName storage account name.
     * @param string $accountKey  storage account primary or secondary key.
     * 
     * @return PEAR2\WindowsAzure\Services\Core\Authentication\BlobQueueSharedKey
     */
    public function __construct($accountName, $accountKey)
    {
        parent::__construct($accountName, $accountKey);

        $this->includedHeaders   = array();
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

    /**
     * Computes the authorization signature for blob and queue shared key.
     *
     * @param array  $headers     request headers.
     * @param string $url         reuqest url.
     * @param array  $queryParams query variables.
     * @param string $httpMethod  request http method.
     * 
     * @see Blob and Queue Services (Shared Key Authentication) at
     *      http://msdn.microsoft.com/en-us/library/windowsazure/dd179428.aspx
     * 
     * @return string
     */
    protected function computeSignature($headers, $url, $queryParams, $httpMethod)
    {
        $canonicalizedHeaders = parent::computeCanonicalizedHeaders($headers);
        
        $canonicalizedResource = parent::computeCanonicalizedResource(
            $url, $queryParams
        );
        

        $stringToSign   = array();
        $stringToSign[] = strtoupper($httpMethod);

        foreach ($this->includedHeaders as $header) {
            $stringToSign[] = isset($headers[$header]) ? $headers[$header] : null;
        }

        if (count($canonicalizedHeaders) > 0) {
            $stringToSign[] = implode("\n", $canonicalizedHeaders);
        }

        $stringToSign[] = $canonicalizedResource;
        $stringToSign   = implode("\n", $stringToSign);

        return $stringToSign;
    }
}

?>
