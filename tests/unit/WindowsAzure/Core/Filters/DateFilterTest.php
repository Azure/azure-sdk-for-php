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
 * @package   Tests\Unit\WindowsAzure\Core\Filters
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */

namespace Tests\Unit\WindowsAzure\Core\Filters;
use WindowsAzure\Core\Filters\DateFilter;
use WindowsAzure\Core\Http\HttpClient;
use WindowsAzure\Resources;

/**
 * Unit tests for class DateFilter
 *
 * @category  Microsoft
 * @package   Tests\Unit\WindowsAzure\Core\Filters
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
class DateFilterTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers WindowsAzure\Core\Filters\DateFilter::handleRequest
     */
    public function testHandleRequest()
    {
        // Setup
        $channel = new HttpClient();
        $filter = new DateFilter();
        
        // Test
        $request = $filter->handleRequest($channel);
        
        // Assert
        $this->assertArrayHasKey(Resources::DATE, $request->getHeaders());
    }
    
    /**
     * @covers WindowsAzure\Core\Filters\DateFilter::handleResponse
     */
    public function testHandleResponse()
    {
        // Setup
        $channel = new HttpClient();
        $response = null;
        $filter = new DateFilter();
        
        // Test
        $response = $filter->handleResponse($channel, $response);
        
        // Assert
        $this->assertNull($response);
    }
}

?>
