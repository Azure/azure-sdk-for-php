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
 * @package   Tests\Unit\WindowsAzure\Common\Internal
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */

namespace Tests\Unit\WindowsAzure\Common\Internal;
use Tests\Framework\TestResources;
use WindowsAzure\Common\Internal\Resources;
use WindowsAzure\Common\Internal\ServicesBuilder;
use WindowsAzure\Common\Configuration;
use WindowsAzure\Common\Internal\InvalidArgumentTypeException;

/**
 * Unit tests for class ServicesBuilder
 *
 * @category  Microsoft
 * @package   Tests\Unit\WindowsAzure\Common\Internal
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
class ServicesBuilderTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers WindowsAzure\Common\Internal\ServicesBuilder::createQueueService
     * @covers WindowsAzure\Common\Internal\ServicesBuilder::httpClient
     * @covers WindowsAzure\Common\Internal\ServicesBuilder::serializer
     * @covers WindowsAzure\Common\Internal\ServicesBuilder::queueAuthenticationScheme
     * @covers WindowsAzure\Common\Internal\ServicesBuilder::_addHeadersFilter
     */
    public function testBuildForQueue()
    {
        // Setup
        $builder = new ServicesBuilder();
        
        // Test
        $queueRestProxy = $builder->createQueueService(TestResources::getStorageServicesConnectionString());
        
        // Assert
        $this->assertInstanceOf('WindowsAzure\Queue\Internal\IQueue', $queueRestProxy);
    }
    
    /**
     * @covers WindowsAzure\Common\Internal\ServicesBuilder::createBlobService
     * @covers WindowsAzure\Common\Internal\ServicesBuilder::httpClient
     * @covers WindowsAzure\Common\Internal\ServicesBuilder::serializer
     * @covers WindowsAzure\Common\Internal\ServicesBuilder::blobAuthenticationScheme
     * @covers WindowsAzure\Common\Internal\ServicesBuilder::_addHeadersFilter
     */
    public function testBuildForBlob()
    {
        // Setup
        $builder = new ServicesBuilder();
        
        // Test
        $blobRestProxy = $builder->createBlobService(TestResources::getStorageServicesConnectionString());
        
        // Assert
        $this->assertInstanceOf('WindowsAzure\Blob\Internal\IBlob', $blobRestProxy);
    }
    
    /**
     * @covers WindowsAzure\Common\Internal\ServicesBuilder::createTableService
     * @covers WindowsAzure\Common\Internal\ServicesBuilder::httpClient
     * @covers WindowsAzure\Common\Internal\ServicesBuilder::serializer
     * @covers WindowsAzure\Common\Internal\ServicesBuilder::mimeSerializer
     * @covers WindowsAzure\Common\Internal\ServicesBuilder::atomSerializer
     * @covers WindowsAzure\Common\Internal\ServicesBuilder::tableAuthenticationScheme
     * @covers WindowsAzure\Common\Internal\ServicesBuilder::_addHeadersFilter
     */
    public function testBuildForTable()
    {
        // Setup
        $builder = new ServicesBuilder();
        
        // Test
        $tableRestProxy = $builder->createTableService(TestResources::getStorageServicesConnectionString());
        
        // Assert
        $this->assertInstanceOf('WindowsAzure\Table\Internal\ITable', $tableRestProxy);
    }
    
    /**
     * @covers WindowsAzure\Common\Internal\ServicesBuilder::createServiceManagementService
     * @covers WindowsAzure\Common\Internal\ServicesBuilder::httpClient
     * @covers WindowsAzure\Common\Internal\ServicesBuilder::serializer
     * @covers WindowsAzure\Common\Internal\ServicesBuilder::_addHeadersFilter
     */
    public function testBuildForServiceManagement()
    {
        // Setup
        $builder = new ServicesBuilder();
        
        // Test
        $serviceManagementRestProxy = $builder->createServiceManagementService(TestResources::getServiceManagementConnectionString());
        
        // Assert
        $this->assertInstanceOf('WindowsAzure\ServiceManagement\Internal\IServiceManagement', $serviceManagementRestProxy);
    }
}

?>
