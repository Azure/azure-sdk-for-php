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
class QueueDescriptionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers \WindowsAzure\ServiceBus\Models\QueueDescription::__construct
     */
    public function testQueueDescriptionConstructor()
    {
        // Setup

        // Test
        $queueDescription = new QueueDescription();

        // Assert
        $this->assertNotNull($queueDescription);
    }

    /** 
     * @covers \WindowsAzure\ServiceBus\Models\QueueDescription::getLockDuration
     * @covers \WindowsAzure\ServiceBus\Models\QueueDescription::setLockDuration
     */
    public function testGetSetLockDuration()
    {
        // Setup
        $expected = 'testLockDuration';
        $queueDescription = new QueueDescription();

        // Test
        $queueDescription->setLockDuration($expected);
        $actual = $queueDescription->getLockDuration();

        // Assert 
        $this->assertEquals(
            $expected,
            $actual
        );
    }

    /** 
     * @covers \WindowsAzure\ServiceBus\Models\QueueDescription::getMaxSizeInMegabytes
     * @covers \WindowsAzure\ServiceBus\Models\QueueDescription::setMaxSizeInMegabytes
     */
    public function testGetSetMaxSizeInMegabytes()
    {
        // Setup
        $expected = 'testMaxSizeInMegabytes';
        $queueDescription = new QueueDescription();

        // Test
        $queueDescription->setMaxSizeInMegabytes($expected);
        $actual = $queueDescription->getMaxSizeInMegabytes();

        // Assert 
        $this->assertEquals(
            $expected,
            $actual
        );
    }

    /** 
     * @covers \WindowsAzure\ServiceBus\Models\QueueDescription::getRequiresDuplicateDetection
     * @covers \WindowsAzure\ServiceBus\Models\QueueDescription::setRequiresDuplicateDetection
     */
    public function testGetSetRequiresDuplicateDetection()
    {
        // Setup
        $expected = 'testRequiresDuplicateDetection';
        $queueDescription = new QueueDescription();

        // Test
        $queueDescription->setRequiresDuplicateDetection($expected);
        $actual = $queueDescription->getRequiresDuplicateDetection();

        // Assert 
        $this->assertEquals(
            $expected,
            $actual
        );
    }

    /** 
     * @covers \WindowsAzure\ServiceBus\Models\QueueDescription::getRequiresSession
     * @covers \WindowsAzure\ServiceBus\Models\QueueDescription::setRequiresSession
     */
    public function testGetSetRequiresSession()
    {
        // Setup
        $expected = 'testRequiresSession';
        $queueDescription = new QueueDescription();

        // Test
        $queueDescription->setRequiresSession($expected);
        $actual = $queueDescription->getRequiresSession();

        // Assert 
        $this->assertEquals(
            $expected,
            $actual
        );
    }

    /** 
     * @covers \WindowsAzure\ServiceBus\Models\QueueDescription::getDefaultMessageTimeToLive
     * @covers \WindowsAzure\ServiceBus\Models\QueueDescription::setDefaultMessageTimeToLive
     */
    public function testGetSetDefaultMessageTimeToLive()
    {
        // Setup
        $expected = 'testDefaultMessageTimeToLive';
        $queueDescription = new QueueDescription();

        // Test
        $queueDescription->setDefaultMessageTimeToLive($expected);
        $actual = $queueDescription->getDefaultMessageTimeToLive();

        // Assert 
        $this->assertEquals(
            $expected,
            $actual
        );
    }

    /** 
     * @covers \WindowsAzure\ServiceBus\Models\QueueDescription::getDeadLetteringOnMessageExpiration
     * @covers \WindowsAzure\ServiceBus\Models\QueueDescription::setDeadLetteringOnMessageExpiration
     */
    public function testGetSetDeadLetteringOnMessageExpiration()
    {
        // Setup
        $expected = 'testDeadLetteringOnMessageExpiration';
        $queueDescription = new QueueDescription();

        // Test
        $queueDescription->setDeadLetteringOnMessageExpiration($expected);
        $actual = $queueDescription->getDeadLetteringOnMessageExpiration();

        // Assert 
        $this->assertEquals(
            $expected,
            $actual
        );
    }

    /** 
     * @covers \WindowsAzure\ServiceBus\Models\QueueDescription::getDuplicateDetectionHistoryTimeWindow
     * @covers \WindowsAzure\ServiceBus\Models\QueueDescription::setDuplicateDetectionHistoryTimeWindow
     */
    public function testGetSetDuplicateDetectionHistoryTimeWindow()
    {
        // Setup
        $expected = 'testDuplicateDetectionHistoryTimeWindow';
        $queueDescription = new QueueDescription();

        // Test
        $queueDescription->setDuplicateDetectionHistoryTimeWindow($expected);
        $actual = $queueDescription->getDuplicateDetectionHistoryTimeWindow();

        // Assert 
        $this->assertEquals(
            $expected,
            $actual
        );
    }

    /** 
     * @covers \WindowsAzure\ServiceBus\Models\QueueDescription::getMaxDeliveryCount
     * @covers \WindowsAzure\ServiceBus\Models\QueueDescription::setMaxDeliveryCount
     */
    public function testGetSetMaxDeliveryCount()
    {
        // Setup
        $expected = 'testMaxDeliveryCount';
        $queueDescription = new QueueDescription();

        // Test
        $queueDescription->setMaxDeliveryCount($expected);
        $actual = $queueDescription->getMaxDeliveryCount();

        // Assert 
        $this->assertEquals(
            $expected,
            $actual
        );
    }

    /** 
     * @covers \WindowsAzure\ServiceBus\Models\QueueDescription::getEnableBatchedOperations
     * @covers \WindowsAzure\ServiceBus\Models\QueueDescription::setEnableBatchedOperations
     */
    public function testGetSetEnableBatchedOperations()
    {
        // Setup
        $expected = 'testEnableBatchedOperations';
        $queueDescription = new QueueDescription();

        // Test
        $queueDescription->setEnableBatchedOperations($expected);
        $actual = $queueDescription->getEnableBatchedOperations();

        // Assert 
        $this->assertEquals(
            $expected,
            $actual
        );
    }

    /** 
     * @covers \WindowsAzure\ServiceBus\Models\QueueDescription::getSizeInBytes
     * @covers \WindowsAzure\ServiceBus\Models\QueueDescription::setSizeInBytes
     */
    public function testGetSetSizeInBytes()
    {
        // Setup
        $expected = 'testSizeInBytes';
        $queueDescription = new QueueDescription();

        // Test
        $queueDescription->setSizeInBytes($expected);
        $actual = $queueDescription->getSizeInBytes();

        // Assert 
        $this->assertEquals(
            $expected,
            $actual
        );
    }

    /** 
     * @covers \WindowsAzure\ServiceBus\Models\QueueDescription::getMessageCount
     * @covers \WindowsAzure\ServiceBus\Models\QueueDescription::setMessageCount
     */
    public function testGetSetMessageCount()
    {
        // Setup
        $expected = 'testMessageCount';
        $queueDescription = new QueueDescription();

        // Test
        $queueDescription->setMessageCount($expected);
        $actual = $queueDescription->getMessageCount();

        // Assert 
        $this->assertEquals(
            $expected,
            $actual
        );
    }
}
