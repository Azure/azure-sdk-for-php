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

use PEAR2\WindowsAzure\Services\Core\Filters\DateFilter;
use PEAR2\WindowsAzure\Core\HttpClient;
use PEAR2\WindowsAzure\Resources;

/**
 * Unit tests for class DateFilter
 *
 * @category  Microsoft
 * @package   PEAR2\Tests\Unit\WindowsAzure
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
class DateFilterTest extends PHPUnit_Framework_TestCase
{
    /**
     * @covers PEAR2\WindowsAzure\Services\Core\Filters\DateFilter::handleRequest
     */
    public function testHandleRequest()
    {
        // Setup
        $channel = new HttpClient();
        $filer = new DateFilter();
        
        // Test
        $request = $filer->handleRequest($channel);
        
        // Assert
        $this->assertArrayHasKey(Resources::X_MS_DATE, $request->getHeaders());
    }
    
    /**
     * @covers PEAR2\WindowsAzure\Services\Core\Filters\DateFilter::handleResponse
     */
    public function testHandleResponse()
    {
        // Setup
        $channel = new HttpClient();
        $response = null;
        $filer = new DateFilter();
        
        // Test
        $response = $filer->handleResponse($channel, $response);
        
        // Assert
        $this->assertNull($response);
    }
}

?>
