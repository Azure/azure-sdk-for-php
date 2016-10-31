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

namespace Tests\unit\WindowsAzure\Common\Internal\Http;

use WindowsAzure\Common\Internal\Http\BatchRequest;
use WindowsAzure\Common\Internal\Http\HttpCallContext;

/**
 * Unit tests for class HttpCallContext.
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
class BatchRequestTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers \WindowsAzure\Common\Internal\Http\batchRequest::appendContext
     * @covers \WindowsAzure\Common\Internal\Http\batchRequest::encode
     * @covers \WindowsAzure\Common\Internal\Http\batchRequest::getBody
     */
    public function testAppendContext()
    {

        //  Setup
        $batchReq = new BatchRequest();
        $context = new HttpCallContext();
        $body = 'test body';
        $uri = 'http://www.someurl.com';
        $context->setBody($body);
        $context->setUri($uri);

        // Test
        $batchReq->appendContext($context);
        $batchReq->encode();
        $resultBody = $batchReq->getBody();
        $resultHeader = $batchReq->getHeaders();

        // Assert
        $this->assertContains($body, $resultBody);
    }

    /**
     * @covers \WindowsAzure\Common\Internal\Http\BatchRequest::getHeaders
     */
    public function testGetHeaders()
    {

        //  Setup
        $batchReq = new BatchRequest();
        $context = new HttpCallContext();
        $body = 'test body';
        $uri = 'http://www.someurl.com';
        $context->setBody($body);
        $context->setUri($uri);

        // Test
        $batchReq->appendContext($context);
        $batchReq->encode();
        $resultHeader = $batchReq->getHeaders();

        // Assert
        $this->assertEquals(1, count($resultHeader));
        $this->assertContains('multipart/mixed', $resultHeader['Content-Type']);
    }

    /**
     * @covers \WindowsAzure\Common\Internal\Http\batchRequest::getContexts
     */
    public function testGetContexts()
    {

        //  Setup
        $batchReq = new BatchRequest();
        $context = new HttpCallContext();
        $batchReq->appendContext($context);

        // Test
        $result = $batchReq->getContexts();

        // Assert
        $this->assertEquals($context, $result[0]);
    }
}
