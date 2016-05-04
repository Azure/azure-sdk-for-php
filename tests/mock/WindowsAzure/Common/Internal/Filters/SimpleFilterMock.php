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

namespace Tests\mock\WindowsAzure\Common\Internal\Filters;

/**
 * Alters request headers and response to mock real filter.
 *
 * @category  Microsoft
 *
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 *
 * @version   Release: 0.4.3_2016-05
 *
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
class SimpleFilterMock implements \WindowsAzure\Common\Internal\IServiceFilter
{
    private $_headerName;
    private $_data;

    public function __construct($headerName, $data)
    {
        $this->_data = $data;
        $this->_headerName = $headerName;
    }

    public function handleRequest($request)
    {
        $request->setHeader($this->_headerName, $this->_data);
        $request->setHeader('Accept-Encoding', 'identity', true);

        return $request;
    }

    public function handleResponse($request, $response)
    {
        $response->appendBody($this->_data);

        return $response;
    }
}
