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
 * @package   Tests\Unit\WindowsAzure\Services\Queue\Models
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */

namespace Tests\Unit\WindowsAzure\ServiceBus\Models;
use WindowsAzure\ServiceBus\Models\QueueInfo;
use WindowsAzure\ServiceBus\Models\WrapAccessTokenResult;

/**
 * Unit tests for class WrapAccessTokenResult
 *
 * @category  Microsoft
 * @package   Tests\Unit\WindowsAzure\Services\Queue\Models
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
class QueueInfoTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers WindowsAzure\ServiceBus\Models\QueueInfo::__construct
     */
    public function testQueueInfoConstructor()
    {
        // Setup
        $expected = 'testQueueName';
        
        // Test
        $queueInfo = new QueueInfo($expected);
        $actual = $queueInfo->getTitle();
       
        // Assert
        $this->assertNotNull($queueInfo);
        $this->assertEquals(
            $expected,
            $actual
        );
    }

    /** 
     * @covers WindowsAzure\ServiceBus\Models\QueueInfo::getQueueDescription
     * @covers WindowsAzure\ServiceBus\Models\QueueInfo::setQueueDescription
     */
    public function testGetSetQueueDescription() {
        // Setup
        $expected = 'testQueueDescription';
        $queueInfo = new QueueInfo();

        // Test
        $queueInfo->setQueueDescription($expected);
        $actual = $queueInfo->getQueueDescription();

        // Assert 
        $this->assertEquals(
            $expected,
            $actual
        );

    }


}

?>
