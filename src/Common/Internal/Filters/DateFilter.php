<?php

/**
 * LICENSE: Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 * http://www.apache.org/licenses/LICENSE-2.0.
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
 *
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 *
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */

namespace WindowsAzure\Common\Internal\Filters;

use WindowsAzure\Common\Internal\Resources;
use WindowsAzure\Common\Internal\IServiceFilter;
use WindowsAzure\Common\Internal\Http\IHttpClient;
use Psr\Http\Message\ResponseInterface;

/**
 * Adds date header to the http request.
 *
 * @category  Microsoft
 *
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 *
 * @version   Release: 0.5.0_2016-11
 *
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
class DateFilter implements IServiceFilter
{
    /**
     * Adds date (in GMT format) header to the request headers.
     *
     * @param IHttpClient $request HTTP channel object
     *
     * @return IHttpClient
     */
    public function handleRequest(IHttpClient $request)
    {
        $date = gmdate(Resources::AZURE_DATE_FORMAT, time());
        $request->setHeader(Resources::DATE, $date);

        return $request;
    }

    /**
     * Does nothing with the response.
     *
     * @param IHttpClient       $request  HTTP channel object
     * @param ResponseInterface $response HTTP response object
     *
     * @return ResponseInterface
     */
    public function handleResponse(IHttpClient $request, ResponseInterface $response)
    {
        // Do nothing with the response.
        return $response;
    }
}
