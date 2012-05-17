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
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */

namespace Tests\Unit\WindowsAzure\Common\Internal;
use Tests\Framework\TestResources;
use WindowsAzure\Common\Internal\Resources;
use WindowsAzure\Common\Internal\ServicesBuilder;
use WindowsAzure\Common\Configuration;
use WindowsAzure\Queue\QueueSettings;
use WindowsAzure\Blob\BlobSettings;
use WindowsAzure\Table\TableSettings;
use WindowsAzure\Common\Internal\InvalidArgumentTypeException;

/**
 * Unit tests for class ServicesBuilder
 *
 * @category  Microsoft
 * @package   Tests\Unit\WindowsAzure\Common\Internal
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
class ServicesBuilderTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers WindowsAzure\Common\Internal\ServicesBuilder::build
     * @covers WindowsAzure\Common\Internal\ServicesBuilder::_buildQueue
     * @covers WindowsAzure\Common\Internal\ServicesBuilder::_addHeadersFilter
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
        $queueRestProxy = $builder->build($config, Resources::QUEUE_TYPE_NAME);
        
        // Assert
        $this->assertInstanceOf('WindowsAzure\Queue\Internal\IQueue', $queueRestProxy);
    }
    
    /**
     * @covers WindowsAzure\Common\Internal\ServicesBuilder::build
     * @covers WindowsAzure\Common\Internal\ServicesBuilder::_buildBlob
     * @covers WindowsAzure\Common\Internal\ServicesBuilder::_addHeadersFilter
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
        $blobRestProxy = $builder->build($config, Resources::BLOB_TYPE_NAME);
        
        // Assert
        $this->assertInstanceOf('WindowsAzure\Blob\Internal\IBlob', $blobRestProxy);
    }
    
    /**
     * @covers WindowsAzure\Common\Internal\ServicesBuilder::build
     * @covers WindowsAzure\Common\Internal\ServicesBuilder::_buildTable
     * @covers WindowsAzure\Common\Internal\ServicesBuilder::_addHeadersFilter
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
        $tableRestProxy = $builder->build($config, Resources::TABLE_TYPE_NAME);
        
        // Assert
        $this->assertInstanceOf('WindowsAzure\Table\Internal\ITable', $tableRestProxy);
    }
    
    /**
     * @covers WindowsAzure\Common\Internal\ServicesBuilder::build
     * @covers WindowsAzure\Common\Internal\ServicesBuilder::_buildQueue
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
