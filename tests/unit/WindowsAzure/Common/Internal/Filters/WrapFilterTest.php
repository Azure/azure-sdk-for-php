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
 * @link      https://github.com/WindowsAzure/azure-sdk-for-php
 */

namespace Tests\unit\WindowsAzure\Common\Internal\Filters;

use Tests\Framework\ServiceRestProxyTestBase;
use Tests\Framework\TestResources;
use WindowsAzure\Common\Internal\Filters\WrapFilter;
use WindowsAzure\Common\Internal\Http\HttpClient;
use WindowsAzure\Common\Internal\Http\Url;
use WindowsAzure\Common\Internal\Resources;
use WindowsAzure\Common\ServicesBuilder;
use WindowsAzure\Common\Internal\ServiceBusSettings;

/**
 * Unit tests for class WrapFilterTest.
 *
 * @category  Microsoft
 *
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 *
 * @version   Release: 0.5.0_2016-11
 *
 * @link      https://github.com/WindowsAzure/azure-sdk-for-php
 */
class WrapFilterTest extends ServiceRestProxyTestBase
{
    private $_wrapRestProxy;

    public function setUp()
    {
        $this->skipIfEmulated();

        $builder = new ServicesBuilder();
        $settings = ServiceBusSettings::createFromConnectionString(
            TestResources::getServiceBusConnectionString()
        );
        $wrapUri = $settings->getWrapEndpointUri();
        $wrapBuilder = new \ReflectionMethod($builder, 'createWrapService');
        $wrapBuilder->setAccessible(true);
        $this->_wrapRestProxy = $wrapBuilder->invoke($builder, $wrapUri);
    }

    /**
     * @covers \WindowsAzure\Common\Internal\Filters\WrapFilter::handleRequest
     * @covers \WindowsAzure\Common\Internal\Filters\WrapFilter::__construct
     */
    public function testHandleRequest()
    {
        // Setup
        $channel = new HttpClient();
        $settings = ServiceBusSettings::createFromConnectionString(
            TestResources::getServiceBusConnectionString()
        );
        $url = new Url($settings->getServiceBusEndpointUri());
        $wrapUri = $settings->getWrapEndpointUri();

        $channel->setUrl($url);

        $wrapFilter = new WrapFilter(
            $wrapUri,
            $settings->getWrapName(),
            $settings->getWrapPassword(),
            $this->_wrapRestProxy
        );

        // Test
        $request = $wrapFilter->handleRequest($channel);

        // Assert
        $this->assertArrayHasKey(
            strtolower(Resources::AUTHENTICATION),
            $request->getHeaders()
        );
    }

    /**
     * @covers \WindowsAzure\Common\Internal\Filters\WrapFilter::handleResponse
     */
    public function testHandleResponse()
    {
        // Setup
        $channel = new HttpClient();
        $url = new Url('http://microsoft.com');
        $channel->setUrl($url);
        $response = new \GuzzleHttp\Psr7\Response();

        $settings = ServiceBusSettings::createFromConnectionString(
            TestResources::getServiceBusConnectionString()
        );
        $wrapUri = $settings->getWrapEndpointUri();

        $wrapFilter = new WrapFilter(
            $wrapUri,
            $settings->getWrapName(),
            $settings->getWrapPassword(),
            $this->_wrapRestProxy
        );
        // Test
        $response = $wrapFilter->handleResponse($channel, $response);

        // Assert
        $this->assertNotNull($response);
    }
}
