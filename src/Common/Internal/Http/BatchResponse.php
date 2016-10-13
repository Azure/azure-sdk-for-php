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
 * @copyright Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 *
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */

namespace WindowsAzure\Common\Internal\Http;

use WindowsAzure\Common\Internal\Validate;
use WindowsAzure\Common\ServiceException;
use WindowsAzure\Common\Internal\Http\BatchRequest;
use GuzzleHttp\Psr7\Response;

/**
 * Batch response parser.
 *
 * @category  Microsoft
 *
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 *
 * @version   Release: 0.4.5_2016-09
 *
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
class BatchResponse
{
    /**
     * Http responses list.
     *
     * @var array of Response
     */
    private $_responses;

    /**
     * Constructor.
     *
     * @param string       $content Http response as string
     * @param BatchRequest $request Source batch request object
     */
    public function __construct($content, BatchRequest $request = null)
    {
        $params['include_bodies'] = true;
        $params['input'] = $content;
        $mimeDecoder = new \Mail_mimeDecode($content);
        $structure = $mimeDecoder->decode($params);
        $parts = $structure->parts;
        $this->_contexts = array();
        $requestContexts = null;

        if ($request != null) {
            Validate::isA(
                $request,
                'WindowsAzure\Common\Internal\Http\BatchRequest',
                'request'
            );
            // array of HttpCallContext
            $requestContexts = $request->getContexts();
        }

        $i = 0;
        foreach ($parts as $part) {
            if (!empty($part->body)) {
                $response = parse_response($part->body);

                $this->_contexts[] = $response;

                if (is_array($requestContexts)) {
                    $expectedCodes = $requestContexts[$i]->getStatusCodes();
                    $statusCode = $response->getStatusCode();

                    if (!in_array($statusCode, $expectedCodes)) {
                        $reason = $response->getReasonPhrase();

                        throw new ServiceException($statusCode, $reason, $response->getBody());
                    }
                }

                ++$i;
            }
        }
    }

    /**
     * Get parsed contexts as array.
     *
     * @return array of Response.
     */
    public function getResponses()
    {
        return $this->_responses;
    }
}
