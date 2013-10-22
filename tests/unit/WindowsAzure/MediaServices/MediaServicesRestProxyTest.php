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
 * @package   Tests\Unit\WindowsAzure\Blob
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */

namespace Tests\Unit\WindowsAzure\MediaServices;
use Tests\Framework\VirtualFileSystem;
use Tests\Framework\MediaServicesRestProxyTestBase;
use Tests\Framework\TestResources;

/**
 * Unit tests for class MediaServcesRestProxy
 *
 * @category  Microsoft
 * @package   Tests\Unit\WindowsAzure\MediaServices
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: 0.3.1_2011-08
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
class MediaServicesProxyTest extends MediaServicesRestProxyTestBase
{
    /**
    * @covers WindowsAzure\MediaServces\MediaServcesRestProxy::fooConnaction
	* @todo delete after scenario 1 checked
    */
    public function testFooConnection()
    {
        $this->skipIfEmulated();
        
        $response = $this->restProxy->fooConnection();
        
        $this->assertNotNull($response);
    }    
}