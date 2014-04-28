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
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */

namespace Tests\Unit\WindowsAzure\Common\Internal\Filters;
use WindowsAzure\Common\Internal\Filters\AuthenticationFilter;
use WindowsAzure\Common\Internal\Http\HttpClient;
use WindowsAzure\Common\Internal\Resources;
use WindowsAzure\Common\Internal\InvalidArgumentTypeException;
use WindowsAzure\Common\Internal\Authentication\SharedKeyAuthScheme;

/**
 * Unit tests for class AuthenticationFilterTest
 *
 * @category  Microsoft
 * @package   Tests\Unit\WindowsAzure\Common\Internal\Filters
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: 0.4.0_2014-01
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
class AuthenticationFilterTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers WindowsAzure\Common\Internal\Filters\AuthenticationFilter::handleRequest
     * @covers WindowsAzure\Common\Internal\Filters\AuthenticationFilter::__construct
     */
    public function testHandleRequest()
    {
        // Setup
        $channel = new HttpClient();
        $url = new \WindowsAzure\Common\Internal\Http\Url('http://microsoft.com');
        $channel->setUrl($url);
        $scheme = new SharedKeyAuthScheme('acount', 'key');
        $filter = new AuthenticationFilter($scheme);
        
        // Test
        $request = $filter->handleRequest($channel);
        
        // Assert
        $this->assertArrayHasKey(strtolower(Resources::AUTHENTICATION), $request->getHeaders());
    }
    
    /**
     * @covers WindowsAzure\Common\Internal\Filters\AuthenticationFilter::handleRequest
     * @covers WindowsAzure\Common\Internal\Filters\AuthenticationFilter::__construct
     */
    public function testHandleRequestWithTable()
    {
        // Setup
        $channel = new HttpClient();
        $url = new \WindowsAzure\Common\Internal\Http\Url('http://microsoft.com');
        $channel->setUrl($url);
        $scheme = new SharedKeyAuthScheme('acount', 'key');
        $filter = new AuthenticationFilter($scheme);
        
        // Test
        $request = $filter->handleRequest($channel);
        
        // Assert
        $this->assertArrayHasKey(strtolower(Resources::AUTHENTICATION), $request->getHeaders());
    }
    
    /**
     * @covers WindowsAzure\Common\Internal\Filters\AuthenticationFilter::handleResponse
     */
    public function testHandleResponse()
    {
        // Setup
        $channel = new HttpClient();
        $url = new \WindowsAzure\Common\Internal\Http\Url('http://microsoft.com');
        $channel->setUrl($url);
        $response = null;
        $scheme = new SharedKeyAuthScheme('acount', 'key');
        $filter = new AuthenticationFilter($scheme);
        
        // Test
        $response = $filter->handleResponse($channel, $response);
        
        // Assert
        $this->assertNull($response);
    }
}


