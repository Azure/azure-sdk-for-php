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
 * @package   Tests\Unit\WindowsAzure\Services\Core
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */

namespace Tests\Unit\WindowsAzure\Services\Core;
use Tests\Framework\TestResources;
use WindowsAzure\Resources;
use WindowsAzure\Services\Core\ServicesBuilder;
use WindowsAzure\Services\Core\Configuration;
use WindowsAzure\Services\Queue\QueueSettings;
use WindowsAzure\Services\Blob\BlobSettings;
use WindowsAzure\Services\Table\TableSettings;
use WindowsAzure\Core\InvalidArgumentTypeException;

/**
 * Unit tests for class ServicesBuilder
 *
 * @category  Microsoft
 * @package   Tests\Unit\WindowsAzure\Services\Core
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
class ServicesBuilderTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers WindowsAzure\Services\Core\ServicesBuilder::build
     * @covers WindowsAzure\Services\Core\ServicesBuilder::_buildQueue
     * @covers WindowsAzure\Services\Core\ServicesBuilder::_addHeadersFilter
     */
    public function testBuildForQueue()
    {
        // Setup
        $uri = 'http://' . TestResources::accountName() . '.queue.core.windows.net';
        $config = new Configuration();
        $config->setProperty(QueueSettings::ACCOUNT_KEY, TestResources::accountKey());
        $config->setProperty(QueueSettings::ACCOUNT_NAME, TestResources::accountName());        
        $config->setProperty(QueueSettings::URI, $uri);
        $builder = new ServicesBuilder();
        
        // Test
        $queueWrapper = $builder->build($config, Resources::QUEUE_TYPE_NAME);
        
        // Assert
        $this->assertInstanceOf('WindowsAzure\Services\Queue\IQueue', $queueWrapper);
    }
    
    /**
     * @covers WindowsAzure\Services\Core\ServicesBuilder::build
     * @covers WindowsAzure\Services\Core\ServicesBuilder::_buildBlob
     * @covers WindowsAzure\Services\Core\ServicesBuilder::_addHeadersFilter
     */
    public function testBuildForBlob()
    {
        // Setup
        $uri = 'http://' . TestResources::accountName() . '.blob.core.windows.net';
        $config = new Configuration();
        $config->setProperty(BlobSettings::ACCOUNT_KEY, TestResources::accountKey());
        $config->setProperty(BlobSettings::ACCOUNT_NAME, TestResources::accountName());        
        $config->setProperty(BlobSettings::URI, $uri);
        $builder = new ServicesBuilder();
        
        // Test
        $blobWrapper = $builder->build($config, Resources::BLOB_TYPE_NAME);
        
        // Assert
        $this->assertInstanceOf('WindowsAzure\Services\Blob\IBlob', $blobWrapper);
    }
    
    /**
     * @covers WindowsAzure\Services\Core\ServicesBuilder::build
     * @covers WindowsAzure\Services\Core\ServicesBuilder::_buildTable
     * @covers WindowsAzure\Services\Core\ServicesBuilder::_addHeadersFilter
     */
    public function testBuildForTable()
    {
        // Setup
        $uri = 'http://' . TestResources::accountName() . '.table.core.windows.net';
        $config = new Configuration();
        $config->setProperty(TableSettings::ACCOUNT_KEY, TestResources::accountKey());
        $config->setProperty(TableSettings::ACCOUNT_NAME, TestResources::accountName());        
        $config->setProperty(TableSettings::URI, $uri);
        $builder = new ServicesBuilder();
        
        // Test
        $tableWrapper = $builder->build($config, Resources::TABLE_TYPE_NAME);
        
        // Assert
        $this->assertInstanceOf('WindowsAzure\Services\Table\ITable', $tableWrapper);
    }
    
    /**
     * @covers WindowsAzure\Services\Core\ServicesBuilder::build
     * @covers WindowsAzure\Services\Core\ServicesBuilder::_buildQueue
     */
    public function testBuildWithInvalidTypeFail()
    {
        // Setup
        $uri = 'http://' . TestResources::accountName() . '.queue.core.windows.net';
        $config = new Configuration();
        $config->setProperty(QueueSettings::ACCOUNT_KEY, TestResources::accountKey());
        $config->setProperty(QueueSettings::ACCOUNT_NAME, TestResources::accountName());        
        $config->setProperty(QueueSettings::URI, $uri);
        $builder = new ServicesBuilder();
        $this->setExpectedException(get_class(new InvalidArgumentTypeException('')));
        
        // Test
        $builder->build($config, 'FooType');
    }
}

?>