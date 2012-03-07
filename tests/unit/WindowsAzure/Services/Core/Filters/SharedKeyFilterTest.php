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
 * @package   PEAR2\Tests\Unit\WindowsAzure
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */

use PEAR2\WindowsAzure\Services\Core\Filters\SharedKeyFilter;
use PEAR2\WindowsAzure\Services\Core\HttpClient;
use PEAR2\WindowsAzure\Resources;
use PEAR2\WindowsAzure\Core\InvalidArgumentTypeException;

/**
 * Unit tests for class SharedKeyFilterTest
 *
 * @category  Microsoft
 * @package   PEAR2\Tests\Unit\WindowsAzure
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
class SharedKeyFilterTest extends PHPUnit_Framework_TestCase
{
    /**
     * @covers PEAR2\WindowsAzure\Services\Core\Filters\SharedKeyFilter::handleRequest
     * @covers PEAR2\WindowsAzure\Services\Core\Filters\SharedKeyFilter::__construct
     */
    public function testHandleRequest()
    {
        // Setup
        $channel = new HttpClient();
        $url = new \PEAR2\WindowsAzure\Core\Url('http://microsoft.com');
        $channel->setUrl($url);
        $filer = new SharedKeyFilter('acount', 'key', Resources::QUEUE_TYPE_NAME);
        
        // Test
        $request = $filer->handleRequest($channel);
        
        // Assert
        $this->assertArrayHasKey(strtolower(Resources::AUTHENTICATION), $request->getHeaders());
    }
    
    /**
     * @covers PEAR2\WindowsAzure\Services\Core\Filters\SharedKeyFilter::__construct
     */
    public function test__constructWithInvalidTypeFail()
    {
        // Setup
        $this->setExpectedException('PEAR2\\WindowsAzure\\Core\\InvalidArgumentTypeException');
        
        // Test
        new SharedKeyFilter('acount', 'key', 'FooType');
    }
    
    /**
     * @covers PEAR2\WindowsAzure\Services\Core\Filters\SharedKeyFilter::handleResponse
     */
    public function testHandleResponse()
    {
        // Setup
        $channel = new HttpClient();
        $url = new \PEAR2\WindowsAzure\Core\Url('http://microsoft.com');
        $channel->setUrl($url);
        $response = null;
        $filer = new SharedKeyFilter('acount', 'key', Resources::QUEUE_TYPE_NAME);
        
        // Test
        $response = $filer->handleResponse($channel, $response);
        
        // Assert
        $this->assertNull($response);
    }
}

?>
