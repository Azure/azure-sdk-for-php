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
 * @package   WindowsAzure\Core\Filters
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
 
namespace WindowsAzure\Core\Filters;
use WindowsAzure\Resources;
use WindowsAzure\Validate;
use WindowsAzure\Core\IServiceFilter;
use WindowsAzure\Core\Authentication\SharedKeyAuthScheme;
use WindowsAzure\Core\Authentication\TableSharedKeyLiteAuthScheme;
use WindowsAzure\Core\InvalidArgumentTypeException;
use WindowsAzure\Services\ServiceBus\WrapTokenManager;

/**
 * Adds WRAP authentication header to the http request object.
 *
 * @category  Microsoft
 * @package   WindowsAzure\Core\Filters
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
class WrapFilter implements IServiceFilter
{
    /**
     * @var WrapTokenManager
     */
    private $_wrapTokenManager;

    /**
     * Creates a WrapFilter with specified WRAP parameters.
     *
     * @param string $wrapUri      The URI of the WRAP service. 
     * @param string $wrapUsername The user name of the WRAP account.
     * @param string $wrapPassword The password of the WRAP account.
     * 
     * @return
     * WindowsAzure\Core\Filter\WrapFilter
     *         
     */
    public function __construct(
        $wrapUri, 
        $wrapUsername, 
        $wrapPassword
    ) {
        $this->_wrapTokenManager = new WrapTokenManager(
            $wrapUri, 
            $wrapUsername, 
            $wrapPassword
        );
    }

    /**
     * Adds WRAP authentication header to the request headers.
     *
     * @param HttpClient $request HTTP channel object.
     * 
     * @return \HTTP_Request2
     */
    public function handleRequest($request)
    {
        Validate::notNull($request, 'request');
        $wrapAccessToken = $this->_wrapTokenManager->getAccessToken(
            $request->getUrl()
        );
        
        $authorization = sprintf(
            Resources::WRAP_AUTHORIZATION,
            $wrapAccessToken
        );
        
        $request->setHeader(Resources::AUTHENTICATION, $authorization);

        return $request;
    }

    /**
     * Returns the original response.
     *
     * @param HttpClient              $request  A HTTP channel object.
     * @param \HTTP_Request2_Response $response A HTTP response object.
     * 
     * @return \HTTP_Request2_Response
     */
    public function handleResponse($request, $response) 
    {
        return $response;
    }
}

?>
