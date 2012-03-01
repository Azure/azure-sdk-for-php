<?php

/**
 * Unit tests for the SDK
 *
 * PHP version 5
 *
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
 * @package    Azure-sdk-for-php
 * @author     Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright  2012 Microsoft Corporation
 * @license    http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link       http://pear.php.net/package/azure-sdk-for-php
 */

use PEAR2\WindowsAzure\Services\Core\Configuration;
use PEAR2\WindowsAzure\Services\Queue\IQueue;
use PEAR2\WindowsAzure\Services\Queue\QueueService;
use PEAR2\WindowsAzure\Services\Queue\QueueSettings;
use PEAR2\WindowsAzure\Services\Queue\Models\ListQueueOptions;
use PEAR2\WindowsAzure\Services\Queue\Models\ListQueueResult;
use PEAR2\WindowsAzure\Services\Queue\Models\CreateQueueOptions;
use PEAR2\Tests\Unit\TestResources;
use PEAR2\WindowsAzure\Resources;
use PEAR2\WindowsAzure\Core\ServiceException;

/**
* Unit tests for QueueRestProxy class
*
* @package    Azure-sdk-for-php
* @author     Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
* @copyright  2012 Microsoft Corporation
* @license    http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
* @version    Release: @package_version@
* @link       http://pear.php.net/package/azure-sdk-for-php
*/
class QueueRestProxyTest extends \RestTestBase
{
    /**
    * @covers PEAR2\WindowsAzure\Services\Queue\QueueRestProxy::listQueues
    */
    public function testListQueuesSimple()
    {
        // Setup
        $queue1 = 'listqueuesimple1';
        $queue2 = 'listqueuesimple2';
        $queue3 = 'listqueuesimple3';

        parent::createQueue($queue1);
        parent::createQueue($queue2);
        parent::createQueue($queue3);
        
        // Test
        $result = $this->queueWrapper->listQueues();

        // Assert
        $queues = $result->getQueues();
        $this->assertEquals($queue1, $queues[0]->getName());
        $this->assertEquals($queue2, $queues[1]->getName());
        $this->assertEquals($queue3, $queues[2]->getName());
    }

    /**
    * @covers PEAR2\WindowsAzure\Services\Queue\QueueRestProxy::listQueues
    */
    public function testListQueuesWithOptions()
    {
        // Setup
        $queue1        = 'listqueuewithoptions1';
        $queue2        = 'listqueuewithoptions2';
        $queue3        = 'mlistqueuewithoptions3';
        $metadataName  = 'Mymetadataname';
        $metadataValue = 'MetadataValue';
        $options = new CreateQueueOptions();
        $options->addMetadata($metadataName, $metadataValue);
        parent::createQueue($queue1);
        parent::createQueue($queue2, $options);
        parent::createQueue($queue3);
        $options = new ListQueueOptions();
        $options->setPrefix('list');
        $options->setIncludeMetadata(true);
        
        // Test
        $result = $this->queueWrapper->listQueues($options);
        
        // Assert
        $queues   = $result->getQueues();
        $metadata = $queues[1]->getMetadata();
        $this->assertEquals(2, count($queues));
        $this->assertEquals($queue1, $queues[0]->getName());
        $this->assertEquals($queue2, $queues[1]->getName());
        $this->assertEquals($metadataValue, $metadata[$metadataName]);
    }

    /**
    * @covers PEAR2\WindowsAzure\Services\Queue\QueueRestProxy::listQueues
    */
    public function testListQueuesWithNextMarker()
    {
        // Setup
        $queue1 = 'listqueueswithnextmarker1';
        $queue2 = 'listqueueswithnextmarker2';
        $queue3 = 'listqueueswithnextmarker3';
        parent::createQueue($queue1);
        parent::createQueue($queue2);
        parent::createQueue($queue3);
        $options = new ListQueueOptions();
        $options->setMaxResults('2');
        
        // Test
        $result = $this->queueWrapper->listQueues($options);
        
        // Assert
        $queues = $result->getQueues();
        $this->assertEquals(2, count($queues));
        $this->assertEquals($queue1, $queues[0]->getName());
        $this->assertEquals($queue2, $queues[1]->getName());
        
        // Test
        $options->setMarker($result->getNextMarker());
        $result = $this->queueWrapper->listQueues($options);
        $queues = $result->getQueues();

        // Assert
        $this->assertEquals(1, count($queues));
        $this->assertEquals($queue3, $queues[0]->getName());
    }
    
    /**
    * @covers PEAR2\WindowsAzure\Services\Queue\QueueRestProxy::listQueues
    */
    public function testListQueuesWithInvalidNextMarkerFail()
    {
        // Setup
        $queue1 = 'listqueueswithinvalidnextmarker1';
        $queue2 = 'listqueueswithinvalidnextmarker2';
        $queue3 = 'listqueueswithinvalidnextmarker3';
        parent::createQueue($queue1);
        parent::createQueue($queue2);
        parent::createQueue($queue3);
        $options = new ListQueueOptions();
        $options->setMaxResults('2');
        $this->setExpectedException(get_class(new ServiceException('409')));
        
        // Test
        $this->queueWrapper->listQueues($options);
        $options->setMarker('wrong marker');
        $this->queueWrapper->listQueues($options);
    }

    /**
    * @covers PEAR2\WindowsAzure\Services\Queue\QueueRestProxy::listQueues
    */
    public function testListQueuesWithNoQueues()
    {
        // Test
        $result = $this->queueWrapper->listQueues();
        
        // Assert
        $queues = $result->getQueues();
        $this->assertTrue(empty($queues));
    }

    /**
    * @covers PEAR2\WindowsAzure\Services\Queue\QueueRestProxy::listQueues
    */
    public function testListQueuesWithOneResult()
    {
        // Setup
        $queueName = 'listqueueswithoneresult';
        parent::createQueue($queueName);
        
        // Test
        $result = $this->queueWrapper->listQueues();
        $queues = $result->getQueues();

        // Assert
        $this->assertEquals(1, count($queues));
    }

    /**
    * @covers PEAR2\WindowsAzure\Services\Queue\QueueRestProxy::createQueue
    */
    public function testCreateQueueSimple()
    {
        // Setup
        $queueName = 'createqueuesimple';
        
        // Test
        $this->createQueue($queueName);
        
        // Assert
        $result = $this->queueWrapper->listQueues();
        $queues = $result->getQueues();
        $this->assertEquals(1, count($queues));
        $this->assertEquals($queues[0]->getName(), $queueName);
    }
    
    /**
    * @covers PEAR2\WindowsAzure\Services\Queue\QueueRestProxy::createQueue
    */
    public function testCreateQueueWithMetadata()
    {
        $queueName     = 'createqueuewithmetadata';
        $metadataName  = 'Name';
        $metadataValue = 'MyName';
        $queueCreateOptions = new CreateQueueOptions();
        $queueCreateOptions->addMetadata($metadataName, $metadataValue);
        
        // Test
        $this->createQueue($queueName, $queueCreateOptions);

        // Assert
        $options = new ListQueueOptions();
        $options->setIncludeMetadata(true);
        $result   = $this->queueWrapper->listQueues($options);
        $queues   = $result->getQueues();
        $metadata = $queues[0]->getMetadata();
        $this->assertEquals($metadataValue, $metadata[$metadataName]);
    }
    
    /**
    * @covers PEAR2\WindowsAzure\Services\Queue\QueueRestProxy::createQueue
    */
    public function testCreateQueueInvalidNameFail()
    {
        // Setup
        $queueName = 'CreateQueueInvalidNameFail';
        $this->setExpectedException(get_class(new ServiceException('400')));
        
        // Test
        $this->createQueue($queueName);
    }
    
    /**
    * @covers PEAR2\WindowsAzure\Services\Queue\QueueRestProxy::deleteQueue
    */
    public function testDeleteQueue()
    {
        // Setup
        $queueName = 'deletequeue';
        $this->queueWrapper->createQueue($queueName);
        
        // Test
        $this->queueWrapper->deleteQueue($queueName);
        
        // Assert
        $result = $this->queueWrapper->listQueues();
        $queues = $result->getQueues();
        $this->assertTrue(empty($queues));
    }
    
    /**
    * @covers PEAR2\WindowsAzure\Services\Queue\QueueRestProxy::deleteQueue
    */
    public function testDeleteQueueFail()
    {
        // Setup
        $queueName = 'deletequeuefail';
        $this->setExpectedException(get_class(new ServiceException('404')));
        
        // Test
        $this->queueWrapper->deleteQueue($queueName);
    }
    
    /**
    * @covers PEAR2\WindowsAzure\Services\Queue\QueueRestProxy::getServiceProperties
    */
    public function testGetServiceProperties()
    {
        // Test
        $result = $this->queueWrapper->getServiceProperties();
        
        // Assert
        $version = $result->getValue()->getLogging()->getVersion();
        $this->assertGreaterThanOrEqual(Resources::MIN_STORAGE_ANALYTICS_VERSION, $version);
    }
}

?>
