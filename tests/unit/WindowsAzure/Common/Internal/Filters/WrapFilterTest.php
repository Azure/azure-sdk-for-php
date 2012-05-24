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
 * @package   Tests\Unit\WindowsAzure
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
use Tests\Framework\TestResources;
use WindowsAzure\Common\Internal\Filters\WrapFilter;
use WindowsAzure\Common\Internal\Http\HttpClient;
use WindowsAzure\Common\Internal\Http\Url;
use WindowsAzure\Common\Internal\Resources;
use WindowsAzure\Common\Internal\InvalidArgumentTypeException;

/**
 * Unit tests for class WrapFilterTest
 *
 * @category  Microsoft
 * @package   Tests\Unit\WindowsAzure
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
class WrapFilterTest extends \PHPUnit_Framework_TestCase
{
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
            TestResources::wrapPassword()
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
            TestResources::wrapPassword()
        );
        // Test
        $response = $wrapFilter->handleResponse($channel, $response);
        
        // Assert
        $this->assertNull($response);
    }
}

?>
