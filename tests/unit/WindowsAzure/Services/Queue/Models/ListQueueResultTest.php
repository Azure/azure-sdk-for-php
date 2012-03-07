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

use PEAR2\WindowsAzure\Services\Queue\Models\ListQueueResult;
use PEAR2\Tests\Unit\TestResources;

/**
 * Unit tests for class ListQueueResult
 *
 * @category  Microsoft
 * @package   PEAR2\Tests\Unit\WindowsAzure
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
class ListQueueResultTest extends PHPUnit_Framework_TestCase
{
    /**
     * @covers PEAR2\WindowsAzure\Services\Queue\Models\ListQueueResult::create 
     */
    public function testCreateWithEmpty()
    {
        // Setup
        $sample = TestResources::listQueuesEmpty();
        
        // Test
        $actual = ListQueueResult::create($sample);
        
        // Assert
        $this->assertCount(0, $actual->getQueues());
        $this->assertTrue(empty($sample['NextMarker']));
    }
    
    /**
     * @covers PEAR2\WindowsAzure\Services\Queue\Models\ListQueueResult::create 
     */
    public function testCreateWithOneEntry()
    {
        // Setup
        $sample = TestResources::listQueuesOneEntry();
        
        // Test
        $actual = ListQueueResult::create($sample);
        
        // Assert
        $queues = $actual->getQueues();
        $this->assertCount(1, $queues);
        $this->assertEquals($sample['Queues']['Queue']['Name'], $queues[0]->getName());
        $this->assertEquals($sample['Queues']['Queue']['Url'], $queues[0]->getUrl());
        $this->assertEquals($sample['Marker'], $actual->getMarker());
        $this->assertEquals($sample['MaxResults'], $actual->getMaxResults());
        $this->assertEquals($sample['NextMarker'], $actual->getNextMarker());
    }
    
    /**
     * @covers PEAR2\WindowsAzure\Services\Queue\Models\ListQueueResult::create 
     */
    public function testCreateWithmultipleEnties()
    {
        // Setup
        $sample = TestResources::listQueuesMultipleEntries();
        
        // Test
        $actual = ListQueueResult::create($sample);
        
        // Assert
        $queues = $actual->getQueues();
        $this->assertCount(2, $queues);
        $this->assertEquals($sample['Queues']['Queue'][0]['Name'], $queues[0]->getName());
        $this->assertEquals($sample['Queues']['Queue'][0]['Url'], $queues[0]->getUrl());
        $this->assertEquals($sample['Queues']['Queue'][1]['Name'], $queues[1]->getName());
        $this->assertEquals($sample['Queues']['Queue'][1]['Url'], $queues[1]->getUrl());
        $this->assertEquals($sample['MaxResults'], $actual->getMaxResults());
        $this->assertEquals($sample['NextMarker'], $actual->getNextMarker());
    }
}

?>
