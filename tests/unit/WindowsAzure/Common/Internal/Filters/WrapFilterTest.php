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
 * @package   Tests\Unit\WindowsAzure\Common\Internal\Filters
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      https://github.com/WindowsAzure/azure-sdk-for-php
 */

namespace Tests\Unit\WindowsAzure\Common\Internal\Filters;
use Tests\Framework\TestResources;
use WindowsAzure\Common\Internal\Filters\WrapFilter;
use WindowsAzure\Common\Internal\Http\HttpClient;
use WindowsAzure\Common\Internal\Http\Url;
use WindowsAzure\Common\Internal\Resources;
use WindowsAzure\Common\Internal\InvalidArgumentTypeException;
use WindowsAzure\Common\Internal\ServicesBuilder;

/**
 * Unit tests for class WrapFilterTest
 *
 * @category  Microsoft
 * @package   Tests\Unit\WindowsAzure\Common\Internal\Filters
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      https://github.com/WindowsAzure/azure-sdk-for-php
 */
class WrapFilterTest extends \PHPUnit_Framework_TestCase
{
    private $_wrapRestProxy;
    
    public function setUp()
    {
        $builder = new ServicesBuilder();
        $wrapUri = 'https://' . TestResources::serviceBusNamespace() .'-sb.accesscontrol.windows.net/WRAPv0.9';
        $wrapBuilder = new \ReflectionMethod($builder, 'createWrapService');
        $wrapBuilder->setAccessible(true);
        $this->_wrapRestProxy = $wrapBuilder->invoke($builder, $wrapUri);
    }
    
    /**
     * @covers WindowsAzure\Common\Internal\Filters\WrapFilter::handleRequest
     * @covers WindowsAzure\Common\Internal\Filters\WrapFilter::__construct
     */
    public function testHandleRequest()
    {
        // Setup
        $channel = new HttpClient();
        
        $url = new Url(
            'https://'
            .TestResources::serviceBusNamespace()
            .'.servicebus.windows.net'
        );
        
        $wrapUri = 'https://'
            .TestResources::serviceBusNamespace()
            .'-sb.accesscontrol.windows.net/WRAPv0.9';

        $channel->setUrl($url);
        
        $wrapFilter = new WrapFilter(
            $wrapUri,
            TestResources::wrapAuthenticationName(),
            TestResources::wrapPassword(),
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
     * @covers WindowsAzure\Common\Internal\Filters\WrapFilter::handleResponse
     */
    public function testHandleResponse()
    {
        // Setup
        $channel = new HttpClient();
        $url = new Url('http://microsoft.com');
        $channel->setUrl($url);
        $response = null;

        $wrapUri = 'https://'
            .TestResources::serviceBusNamespace()
            .'-sb.accesscontro.windows.net';
        
        $wrapFilter = new WrapFilter(
            $wrapUri,
            TestResources::wrapAuthenticationName(),
            TestResources::wrapPassword(),
            $this->_wrapRestProxy
        );
        // Test
        $response = $wrapFilter->handleResponse($channel, $response);
        
        // Assert
        $this->assertNull($response);
    }
}

?>
