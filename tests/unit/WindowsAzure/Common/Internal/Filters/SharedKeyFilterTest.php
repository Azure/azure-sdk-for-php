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

use WindowsAzure\Common\Internal\Filters\SharedKeyFilter;
use WindowsAzure\Common\Internal\Http\HttpClient;
use WindowsAzure\Common\Internal\Resources;
use WindowsAzure\Common\Internal\InvalidArgumentTypeException;

/**
 * Unit tests for class SharedKeyFilterTest
 *
 * @category  Microsoft
 * @package   Tests\Unit\WindowsAzure
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
class SharedKeyFilterTest extends PHPUnit_Framework_TestCase
{
    /**
     * @covers WindowsAzure\Common\Internal\Filters\SharedKeyFilter::handleRequest
     * @covers WindowsAzure\Common\Internal\Filters\SharedKeyFilter::__construct
     */
    public function testHandleRequest()
    {
        // Setup
        $channel = new HttpClient();
        $url = new \WindowsAzure\Common\Internal\Http\Url('http://microsoft.com');
        $channel->setUrl($url);
        $filter = new SharedKeyFilter('acount', 'key', Resources::QUEUE_TYPE_NAME);
        
        // Test
        $request = $filter->handleRequest($channel);
        
        // Assert
        $this->assertArrayHasKey(strtolower(Resources::AUTHENTICATION), $request->getHeaders());
    }
    
    /**
     * @covers WindowsAzure\Common\Internal\Filters\SharedKeyFilter::handleRequest
     * @covers WindowsAzure\Common\Internal\Filters\SharedKeyFilter::__construct
     */
    public function testHandleRequestWithTable()
    {
        // Setup
        $channel = new HttpClient();
        $url = new \WindowsAzure\Common\Internal\Http\Url('http://microsoft.com');
        $channel->setUrl($url);
        $filter = new SharedKeyFilter('acount', 'key', Resources::TABLE_TYPE_NAME);
        
        // Test
        $request = $filter->handleRequest($channel);
        
        // Assert
        $this->assertArrayHasKey(strtolower(Resources::AUTHENTICATION), $request->getHeaders());
    }
    
    /**
     * @covers WindowsAzure\Common\Internal\Filters\SharedKeyFilter::__construct
     */
    public function test__constructWithInvalidTypeFail()
    {
        // Setup
        $this->setExpectedException('WindowsAzure\Common\Internal\InvalidArgumentTypeException');
        
        // Test
        new SharedKeyFilter('acount', 'key', 'FooType');
    }
    
    /**
     * @covers WindowsAzure\Common\Internal\Filters\SharedKeyFilter::handleResponse
     */
    public function testHandleResponse()
    {
        // Setup
        $channel = new HttpClient();
        $url = new \WindowsAzure\Common\Internal\Http\Url('http://microsoft.com');
        $channel->setUrl($url);
        $response = null;
        $filter = new SharedKeyFilter('acount', 'key', Resources::QUEUE_TYPE_NAME);
        
        // Test
        $response = $filter->handleResponse($channel, $response);
        
        // Assert
        $this->assertNull($response);
    }
}

?>
