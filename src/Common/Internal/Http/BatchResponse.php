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

use function GuzzleHttp\Psr7\parse_response;
use WindowsAzure\Common\Internal\Validate;
use WindowsAzure\Common\ServiceException;
use GuzzleHttp\Psr7\Response;
use Zend\Mime\Message;
use Zend\Mime\Part;

/**
 * Batch response parser.
 *
 * @category  Microsoft
 *
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 *
 * @version   Release: 0.5.0_2016-11
 *
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
class BatchResponse
{
    /**
     * Http responses list.
     *
     * @var Response[]
     */
    private $_responses = [];

    /**
     * @param string $contentType
     * @return string
     */
    private static function getBoundary($contentType) {
        $match = '';
        preg_match('/boundary=(.*)/', $contentType, $match);
        return str_replace('"', '', $match[1]);
    }

    /**
     * Constructor.
     *
     * @param Response          $response HTTP response
     * @param BatchRequest|null $request  Source batch request object
     */
    public function __construct(Response $response, BatchRequest $request = null)
    {
        $content = (string)$response->getBody();
        $contentType = HttpClient::getResponseHeaders($response)['content-type'];
        $boundary = self::getBoundary($contentType);
        $mimeBody = Message::createFromMessage($content, $boundary);

        /** @var Part[] $allParts */
        $allParts = [];
        $mimeParts = $mimeBody->getParts();
        foreach ($mimeParts as $mimePart) {
            $partBoundary = self::getBoundary($mimePart->getType());
            $partMessage = Message::createFromMessage($mimePart->getContent(), $partBoundary);
            $allParts = array_merge($allParts, $partMessage->getParts());
        }

        /** @var HttpCallContext[]|null $requestContexts */
        $requestContexts = null;

        if ($request != null) {
            Validate::isA(
                $request,
                'WindowsAzure\Common\Internal\Http\BatchRequest',
                'request'
            );
            $requestContexts = $request->getContexts();
        }

        $i = 0;
        foreach ($allParts as $part) {
            $body = $part->getContent();
            if (!empty($body)) {
                $response = parse_response($body);

                $this->_responses[] = $response;

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
     * @return Response[]
     */
    public function getResponses()
    {
        return $this->_responses;
    }
}
