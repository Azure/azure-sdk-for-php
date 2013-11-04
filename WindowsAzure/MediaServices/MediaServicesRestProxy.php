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
 * @package   WindowsAzure\Blob
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */

namespace WindowsAzure\MediaServices;
use WindowsAzure\Common\Internal\Utilities;
use WindowsAzure\Common\Internal\Resources;
use WindowsAzure\Common\Internal\Validate;
use WindowsAzure\Common\Models\ServiceProperties;
use WindowsAzure\Common\Internal\ServiceRestProxy;
use WindowsAzure\MediaServices\Internal\IMediaServices;

/**
 * This class constructs HTTP requests and receive HTTP responses for blob
 * service layer.
 *
 * @category  Microsoft
 * @package   WindowsAzure\MediaServices
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
class MediaServicesRestProxy extends ServiceRestProxy implements IMediaServices
{
    /**
     * Sends HTTP request with the specified parameters.
     *
     * @param string $method         HTTP method used in the request
     * @param array  $headers        HTTP headers.
     * @param array  $queryParams    URL query parameters.
     * @param array  $postParameters The HTTP POST parameters.
     * @param string $path           URL path
     * @param int    $statusCode     Expected status code received in the response
     * @param string $body           Request body
     *
     * @return \HTTP_Request2_Response
     */
    protected function send(
            $method,
            $headers,
            $queryParams,
            $postParameters,
            $path,
            $statusCode,
            $body = Resources::EMPTY_STRING
    )
    {
        // Add redirect to expected results
        if (!is_array($statusCode))
        {
            $statusCode = array($statusCode, );
        }
        array_push($statusCode, Resources::STATUS_MOVED_PERMANENTLY);

        $response = parent::send(
            $method,
            $headers,
            $queryParams,
            $postParameters,
            $path,
            $statusCode,
            $body
        );

        // Set new URI endpoint if we get redirect response and perform query
        if ($response->getStatus() == Resources::STATUS_MOVED_PERMANENTLY)
        {
            $this->setUri($response->getHeader('location'));
            array_pop($statusCode);

            $response = parent::send(
                $method,
                $headers,
                $queryParams,
                $postParameters,
                $path,
                $statusCode,
                $body
            );
        }


        return $response;
    }
}