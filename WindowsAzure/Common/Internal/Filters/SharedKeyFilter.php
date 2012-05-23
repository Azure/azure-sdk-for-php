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
 * @package   WindowsAzure\Common\Internal\Filters
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
 
namespace WindowsAzure\Common\Internal\Filters;
use WindowsAzure\Common\Internal\Resources;
use WindowsAzure\Common\Internal\IServiceFilter;
use WindowsAzure\Common\Internal\Authentication\SharedKeyAuthScheme;
use WindowsAzure\Common\Internal\Authentication\TableSharedKeyLiteAuthScheme;
use WindowsAzure\Common\Internal\InvalidArgumentTypeException;

/**
 * Adds authentication header to the http request object.
 *
 * @category  Microsoft
 * @package   WindowsAzure\Common\Internal\Filters
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
class SharedKeyFilter implements IServiceFilter
{
    private $_sharedKeyAuthentication;

    /**
     * Return SharedKeyFilter based on the storage type.
     *
     * @param string $accountName storage account name.
     * @param string $accountKey  storage account primary or secondary key.
     * @param string $type        storage account type.
     * 
     * @return
     * WindowsAzure\Common\Internal\Authentication\StorageAuthScheme
     *         
     */
    public function __construct($accountName, $accountKey, $type)
    {
        switch ($type) {
        case Resources::QUEUE_TYPE_NAME:
        case Resources::BLOB_TYPE_NAME:
            $this->_sharedKeyAuthentication = new SharedKeyAuthScheme(
                $accountName, $accountKey
            );
            break;
        case Resources::TABLE_TYPE_NAME:
            $sharedKeyLiteAuth = new TableSharedKeyLiteAuthScheme(
                $accountName, $accountKey
            );
            
            $this->_sharedKeyAuthentication = $sharedKeyLiteAuth;
            break;

        default:
            $expected  = Resources::QUEUE_TYPE_NAME;
            $expected .= '|' . Resources::BLOB_TYPE_NAME;
            $expected .= '|' . Resources::TABLE_TYPE_NAME;
            throw new InvalidArgumentTypeException($expected);
        }
    }

    /**
     * Adds authentication header to the request headers.
     *
     * @param HttpClient $request HTTP channel object.
     * 
     * @return \HTTP_Request2
     */
    public function handleRequest($request)
    {
        $signedKey = $this->_sharedKeyAuthentication->getAuthorizationHeader(
            $request->getHeaders(), $request->getUrl(),
            $request->getUrl()->getQueryVariables(), $request->getMethod()
        );
        $request->setHeader(Resources::AUTHENTICATION, $signedKey);

        return $request;
    }

    /**
     * Does nothing with the response.
     *
     * @param HttpClient              $request  HTTP channel object.
     * @param \HTTP_Request2_Response $response HTTP response object.
     * 
     * @return \HTTP_Request2_Response
     */
    public function handleResponse($request, $response) 
    {
        // Do nothing with the response.
        return $response;
    }
}

?>
