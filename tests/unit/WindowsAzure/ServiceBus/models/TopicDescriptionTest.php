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

use WindowsAzure\ServiceBus\Models\TopicDescription;


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
class TopicDescriptionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers \WindowsAzure\ServiceBus\Models\TopicDescription::__construct
     */
    public function testTopicDescriptionConstructor()
    {
        // Setup

        // Test
        $topicDescription = new TopicDescription();

        // Assert
        $this->assertNotNull($topicDescription);
    }

    /** 
     * @covers \WindowsAzure\ServiceBus\Models\TopicDescription::getDefaultMessageTimeToLive
     * @covers \WindowsAzure\ServiceBus\Models\TopicDescription::setDefaultMessageTimeToLive
     */
    public function testGetSetDefaultMessageTimeToLive()
    {
        // Setup
        $expected = 'testDefaultMessageTimeToLive';
        $topicDescription = new TopicDescription();

        // Test
        $topicDescription->setDefaultMessageTimeToLive($expected);
        $actual = $topicDescription->getDefaultMessageTimeToLive();

        // Assert 
        $this->assertEquals(
            $expected,
            $actual
        );
    }

    /** 
     * @covers \WindowsAzure\ServiceBus\Models\TopicDescription::getMaxSizeInMegabytes
     * @covers \WindowsAzure\ServiceBus\Models\TopicDescription::setMaxSizeInMegabytes
     */
    public function testGetSetMaxSizeInMegabytes()
    {
        // Setup
        $expected = 'testMaxSizeInMegabytes';
        $topicDescription = new TopicDescription();

        // Test
        $topicDescription->setMaxSizeInMegabytes($expected);
        $actual = $topicDescription->getMaxSizeInMegabytes();

        // Assert 
        $this->assertEquals(
            $expected,
            $actual
        );
    }

    /** 
     * @covers \WindowsAzure\ServiceBus\Models\TopicDescription::getRequiresDuplicateDetection
     * @covers \WindowsAzure\ServiceBus\Models\TopicDescription::setRequiresDuplicateDetection
     */
    public function testGetSetRequiresDuplicateDetection()
    {
        // Setup
        $expected = 'testRequiresDuplicateDetection';
        $topicDescription = new TopicDescription();

        // Test
        $topicDescription->setRequiresDuplicateDetection($expected);
        $actual = $topicDescription->getRequiresDuplicateDetection();

        // Assert 
        $this->assertEquals(
            $expected,
            $actual
        );
    }

    /** 
     * @covers \WindowsAzure\ServiceBus\Models\TopicDescription::getDuplicateDetectionHistoryTimeWindow
     * @covers \WindowsAzure\ServiceBus\Models\TopicDescription::setDuplicateDetectionHistoryTimeWindow
     */
    public function testGetSetDuplicateDetectionHistoryTimeWindow()
    {
        // Setup
        $expected = 'testDuplicateDetectionHistoryTimeWindow';
        $topicDescription = new TopicDescription();

        // Test
        $topicDescription->setDuplicateDetectionHistoryTimeWindow($expected);
        $actual = $topicDescription->getDuplicateDetectionHistoryTimeWindow();

        // Assert 
        $this->assertEquals(
            $expected,
            $actual
        );
    }

    /** 
     * @covers \WindowsAzure\ServiceBus\Models\TopicDescription::getEnableBatchedOperations
     * @covers \WindowsAzure\ServiceBus\Models\TopicDescription::setEnableBatchedOperations
     */
    public function testGetSetEnableBatchedOperations()
    {
        // Setup
        $expected = 'testEnableBatchedOperations';
        $topicDescription = new TopicDescription();

        // Test
        $topicDescription->setEnableBatchedOperations($expected);
        $actual = $topicDescription->getEnableBatchedOperations();

        // Assert 
        $this->assertEquals(
            $expected,
            $actual
        );
    }

    /** 
     * @covers \WindowsAzure\ServiceBus\Models\TopicDescription::getSizeInBytes
     * @covers \WindowsAzure\ServiceBus\Models\TopicDescription::setSizeInBytes
     */
    public function testGetSetSizeInBytes()
    {
        // Setup
        $expected = 'testSizeInBytes';
        $topicDescription = new TopicDescription();

        // Test
        $topicDescription->setSizeInBytes($expected);
        $actual = $topicDescription->getSizeInBytes();

        // Assert 
        $this->assertEquals(
            $expected,
            $actual
        );
    }
}
