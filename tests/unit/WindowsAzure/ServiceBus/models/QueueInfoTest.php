<?php

/**
 * LICENSE: Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 * http://www.apache.org/licenses/LICENSE-2.0.
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
 *
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 *
 * @link      https://github.com/WindowsAzure/azure-sdk-for-php
 */

namespace Tests\unit\WindowsAzure\ServiceBus\models;

use WindowsAzure\ServiceBus\Models\QueueDescription;
use WindowsAzure\ServiceBus\Models\QueueInfo;


/**
 * Unit tests for class WrapAccessTokenResult.
 *
 * @category  Microsoft
 *
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 *
 * @version   Release: 0.5.0_2016-11
 *
 * @link      https://github.com/WindowsAzure/azure-sdk-for-php
 */
class QueueInfoTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers \WindowsAzure\ServiceBus\Models\QueueInfo::__construct
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
     * @covers \WindowsAzure\ServiceBus\Models\QueueInfo::getQueueDescription
     * @covers \WindowsAzure\ServiceBus\Models\QueueInfo::setQueueDescription
     */
    public function testGetSetQueueDescription()
    {
        // Setup
        $expected = new QueueDescription('testQueueDescription');
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

    /** 
     * @covers \WindowsAzure\ServiceBus\Models\QueueInfo::getLockDuration
     * @covers \WindowsAzure\ServiceBus\Models\QueueInfo::setLockDuration
     */
    public function testGetSetLockDuration()
    {
        // Setup
        $expected = 'testLockDuration';
        $queueInfo = new QueueInfo();

        // Test
        $queueInfo->setLockDuration($expected);
        $actual = $queueInfo->getLockDuration();

        // Assert 
        $this->assertEquals(
            $expected,
            $actual
        );
    }

    /** 
     * @covers \WindowsAzure\ServiceBus\Models\QueueInfo::getMaxSizeInMegabytes
     * @covers \WindowsAzure\ServiceBus\Models\QueueInfo::setMaxSizeInMegabytes
     */
    public function testGetSetMaxSizeInMegabytes()
    {
        // Setup
        $expected = 'testMaxSizeInMegabytes';
        $queueInfo = new QueueInfo();

        // Test
        $queueInfo->setMaxSizeInMegabytes($expected);
        $actual = $queueInfo->getMaxSizeInMegabytes();

        // Assert 
        $this->assertEquals(
            $expected,
            $actual
        );
    }

    /** 
     * @covers \WindowsAzure\ServiceBus\Models\QueueInfo::getRequiresDuplicateDetection
     * @covers \WindowsAzure\ServiceBus\Models\QueueInfo::setRequiresDuplicateDetection
     */
    public function testGetSetRequiresDuplicateDetection()
    {
        // Setup
        $expected = 'testRequiresDuplicateDetection';
        $queueInfo = new QueueInfo();

        // Test
        $queueInfo->setRequiresDuplicateDetection($expected);
        $actual = $queueInfo->getRequiresDuplicateDetection();

        // Assert 
        $this->assertEquals(
            $expected,
            $actual
        );
    }

    /** 
     * @covers \WindowsAzure\ServiceBus\Models\QueueInfo::getRequiresSession
     * @covers \WindowsAzure\ServiceBus\Models\QueueInfo::setRequiresSession
     */
    public function testGetSetRequiresSession()
    {
        // Setup
        $expected = 'testRequiresSession';
        $queueInfo = new QueueInfo();

        // Test
        $queueInfo->setRequiresSession($expected);
        $actual = $queueInfo->getRequiresSession();

        // Assert 
        $this->assertEquals(
            $expected,
            $actual
        );
    }

    /** 
     * @covers \WindowsAzure\ServiceBus\Models\QueueInfo::getDefaultMessageTimeToLive
     * @covers \WindowsAzure\ServiceBus\Models\QueueInfo::setDefaultMessageTimeToLive
     */
    public function testGetSetDefaultMessageTimeToLive()
    {
        // Setup
        $expected = 'testDefaultMessageTimeToLive';
        $queueInfo = new QueueInfo();

        // Test
        $queueInfo->setDefaultMessageTimeToLive($expected);
        $actual = $queueInfo->getDefaultMessageTimeToLive();

        // Assert 
        $this->assertEquals(
            $expected,
            $actual
        );
    }

    /** 
     * @covers \WindowsAzure\ServiceBus\Models\QueueInfo::getDeadLetteringOnMessageExpiration
     * @covers \WindowsAzure\ServiceBus\Models\QueueInfo::setDeadLetteringOnMessageExpiration
     */
    public function testGetSetDeadLetteringOnMessageExpiration()
    {
        // Setup
        $expected = 'testDeadLetteringOnMessageExpiration';
        $queueInfo = new QueueInfo();

        // Test
        $queueInfo->setDeadLetteringOnMessageExpiration($expected);
        $actual = $queueInfo->getDeadLetteringOnMessageExpiration();

        // Assert 
        $this->assertEquals(
            $expected,
            $actual
        );
    }

    /** 
     * @covers \WindowsAzure\ServiceBus\Models\QueueInfo::getDuplicateDetectionHistoryTimeWindow
     * @covers \WindowsAzure\ServiceBus\Models\QueueInfo::setDuplicateDetectionHistoryTimeWindow
     */
    public function testGetSetDuplicateDetectionHistoryTimeWindow()
    {
        // Setup
        $expected = 'testDuplicateDetectionHistoryTimeWindow';
        $queueInfo = new QueueInfo();

        // Test
        $queueInfo->setDuplicateDetectionHistoryTimeWindow($expected);
        $actual = $queueInfo->getDuplicateDetectionHistoryTimeWindow();

        // Assert 
        $this->assertEquals(
            $expected,
            $actual
        );
    }

    /** 
     * @covers \WindowsAzure\ServiceBus\Models\QueueInfo::getMaxDeliveryCount
     * @covers \WindowsAzure\ServiceBus\Models\QueueInfo::setMaxDeliveryCount
     */
    public function testGetSetMaxDeliveryCount()
    {
        // Setup
        $expected = 'testMaxDeliveryCount';
        $queueInfo = new QueueInfo();

        // Test
        $queueInfo->setMaxDeliveryCount($expected);
        $actual = $queueInfo->getMaxDeliveryCount();

        // Assert 
        $this->assertEquals(
            $expected,
            $actual
        );
    }

    /** 
     * @covers \WindowsAzure\ServiceBus\Models\QueueInfo::getEnableBatchedOperations
     * @covers \WindowsAzure\ServiceBus\Models\QueueInfo::setEnableBatchedOperations
     */
    public function testGetSetEnableBatchedOperations()
    {
        // Setup
        $expected = 'testEnableBatchedOperations';
        $queueInfo = new QueueInfo();

        // Test
        $queueInfo->setEnableBatchedOperations($expected);
        $actual = $queueInfo->getEnableBatchedOperations();

        // Assert 
        $this->assertEquals(
            $expected,
            $actual
        );
    }

    /** 
     * @covers \WindowsAzure\ServiceBus\Models\QueueInfo::getSizeInBytes
     * @covers \WindowsAzure\ServiceBus\Models\QueueInfo::setSizeInBytes
     */
    public function testGetSetSizeInBytes()
    {
        // Setup
        $expected = 'testSizeInBytes';
        $queueInfo = new QueueInfo();

        // Test
        $queueInfo->setSizeInBytes($expected);
        $actual = $queueInfo->getSizeInBytes();

        // Assert 
        $this->assertEquals(
            $expected,
            $actual
        );
    }

    /** 
     * @covers \WindowsAzure\ServiceBus\Models\QueueInfo::getMessageCount
     * @covers \WindowsAzure\ServiceBus\Models\QueueInfo::setMessageCount
     */
    public function testGetSetMessageCount()
    {
        // Setup
        $expected = 'testMessageCount';
        $queueInfo = new QueueInfo();

        // Test
        $queueInfo->setMessageCount($expected);
        $actual = $queueInfo->getMessageCount();

        // Assert 
        $this->assertEquals(
            $expected,
            $actual
        );
    }
}
