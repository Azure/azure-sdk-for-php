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

namespace Tests\Unit\WindowsAzure\Blob;
use WindowsAzure\Blob\BlobService;
use WindowsAzure\Common\Configuration;
use Tests\Framework\TestResources;
use WindowsAzure\Blob\BlobSettings;

/**
 * Unit tests for class BlobService
 *
 * @category  Microsoft
 * @package   Tests\Unit\WindowsAzure\Blob
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
class BlobServiceTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers WindowsAzure\Blob\BlobService::create
     */
    public function testCreateWithConfig()
    {
        // Setup
        $uri = 'http://' . TestResources::accountName() . '.blob.core.windows.net';
        $config = new Configuration();
        $config->setProperty(BlobSettings::ACCOUNT_KEY, TestResources::accountKey());
        $config->setProperty(BlobSettings::ACCOUNT_NAME, TestResources::accountName());        
        $config->setProperty(BlobSettings::URI, $uri);
        
        // Test
        $blobRestProxy = BlobService::create($config);
        
        // Assert
        $this->assertInstanceOf('WindowsAzure\Blob\Internal\IBlob', $blobRestProxy);
    }
}

?>
