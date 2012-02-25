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
use PEAR2\WindowsAzure\Resources;

/**
 * Base class for azure authentication schemes.
 *
 * @category  Microsoft
 * @package   PEAR2\WindowsAzure\Services\Core\Authentication
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
abstract class AzureAuthentication
{
    protected $accountName;
    protected $accountKey;

    /**
     * Constructor.
     *
     * @param string $accountName storage account name.
     * @param string $accountKey  storage account primary or secondary key.
     * 
     * @return PEAR2\WindowsAzure\Services\Core\Authentication\AzureAuthentication
     */
    public function __construct($accountName, $accountKey)
    {
        $this->accountKey  = $accountKey;
        $this->accountName = $accountName;
    }

    /**
     * Computes canonicalized headers for headers array.
     *
     * @param array $headers request headers.
     * 
     * @see Constructing the Canonicalized Headers String section at 
     *      http://msdn.microsoft.com/en-us/library/windowsazure/dd179428.aspx
     * 
     * @return string
     */
    protected function computeCanonicalizedHeaders($headers)
    {
        $canonicalizedHeaders = array();

        if (!is_null($headers)) {
            foreach ($headers as $header => $value) {
                if (is_bool($value)) {
                    $value = $value === true ? 'True' : 'False';
                }

                $prefix = substr($header, 0, strlen(Resources::X_MS_HEADER_PREFIX));
                
                if ($prefix == Resources::X_MS_HEADER_PREFIX) {
                    $headers[$header]       = $value;
                    $canonicalizedHeaders[] = strtolower($header) . ':' . $value;
                }
            }
        }
        sort($canonicalizedHeaders);

        return $canonicalizedHeaders;
    }

    /**
     * Computes canonicalized resources for headers array.
     *
     * @param string $url         request url.
     * @param array  $queryParams request query variables.
     * 
     * @see Constructing the Canonicalized Resource String section at 
     *      http://msdn.microsoft.com/en-us/library/windowsazure/dd179428.aspx
     * 
     * @return string
     */
    protected function computeCanonicalizedResource($url, $queryParams)
    {
        // Note: Multi-valued query parameter is not supported (issue #17)
        // 1. Beginning with an empty string (""), append a forward slash (/), 
        //    followed by the name of the account that owns the accessed resource.
        $canonicalizedResource = '/' . $this->accountName;

        // 2. Append the resource's encoded URI path, without any query parameters.
        $canonicalizedResource .= parse_url($url, PHP_URL_PATH);

        // 3. Retrieve all query parameters on the resource URI, including the comp 
        //    parameter if it exists.
        // 4. Sort the query parameters lexicographically by parameter name, in 
        //    ascending order.
        if (count($queryParams) > 0) {
            ksort($queryParams);
        }

        // 5. Convert all parameter names to lowercase.
        // 6. URL-decode each query parameter name and value.
        // 7. Append each query parameter name and value to the string in the 
        //    following format:
        //      parameter-name:parameter-value
        // 8. Append a new line character (\n) after each name-value pair.
        foreach ($queryParams as $key => $value) {
            $canonicalizedResource .= "\n" . strtolower($key) . ':' . 
                rawurldecode($value);
        }

        return $canonicalizedResource;
    }

    /**
     * Returns authorization header to be included in the request.
     *
     * @param array  $headers     request headers.
     * @param string $url         reuqest url.
     * @param array  $queryParams query variables.
     * @param string $httpMethod  request http method.
     * 
     * @see Specifying the Authorization Header section at 
     *      http://msdn.microsoft.com/en-us/library/windowsazure/dd179428.aspx
     * 
     * @return string
     */
    public function getAuthorizationHeader($headers, $url, $queryParams, $httpMethod)
    {
        $signature = $this->computeSignature(
            $headers, $url, $queryParams, $httpMethod
        );

        return 'SharedKey ' . $this->accountName . ':' . base64_encode(
            hash_hmac('sha256', $signature, base64_decode($this->accountKey), true)
        );
    }

    /**
     * Computes the authorization signature.
     *
     * @param array  $headers     request headers.
     * @param string $url         reuqest url.
     * @param array  $queryParams query variables.
     * @param string $httpMethod  request http method.
     * 
     * @see check all authentication schemes at
     *      http://msdn.microsoft.com/en-us/library/windowsazure/dd179428.aspx
     * 
     * @return string
     */
    abstract protected function computeSignature($headers, $url, $queryParams, 
        $httpMethod
    );
}

?>
