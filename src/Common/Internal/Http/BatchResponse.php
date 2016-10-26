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
use Herrera\Json\Exception\Exception;
use MicrosoftAzure\Storage\Table\Internal\MimeReaderWriter;
use WindowsAzure\Common\Internal\Validate;
use WindowsAzure\Common\ServiceException;
use GuzzleHttp\Psr7\Response;
use Zend\Mime\Decode;
use Zend\Mime\Message;

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
     * @var Response[]
     */
    private $_responses = [];

    /**
     * Constructor.
     *
     * @param Response          $content Http response as string
     * @param BatchRequest|null $request Source batch request object
     */
    public function __construct(Response $response, BatchRequest $request = null)
    {
        $content = (string)$response->getBody();

        $params['include_bodies'] = true;
        $params['input']          = $content;

        $mimeDecoder = new \Mail_mimeDecode($content);
        $structure = $mimeDecoder->decode($params);
        $parts = $structure->parts;
        $requestContexts = null;

        print $content;

        $zendHeaders = [];
        $body = '';
        print_r($request);
        try {
            Decode::splitMessage($content, $zendHeaders, $body);
            print('=== headers ===');
            print_r($zendHeaders);
            print('=== body ===');
            print_r($body);
            print('=== ===');
        } catch (Exception $e) {
            print($e);
        }

        /*
        print(' ! mimeParts ! ');
        print_r($mimeParts);

        print(' ! structure ! ');
        print_r($structure);
        */
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
