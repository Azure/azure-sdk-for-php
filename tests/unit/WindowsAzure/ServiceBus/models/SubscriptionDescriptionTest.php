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

use WindowsAzure\ServiceBus\Models\SubscriptionDescription;

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
class SubscriptionDescriptionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers \WindowsAzure\ServiceBus\Models\SubscriptionDescription::__construct
     */
    public function testSubscriptionDescriptionConstructor()
    {
        // Setup

        // Test
        $subscriptionDescription = new SubscriptionDescription();

        // Assert
        $this->assertNotNull($subscriptionDescription);
    }

    /** 
     * @covers \WindowsAzure\ServiceBus\Models\SubscriptionDescription::getLockDuration
     * @covers \WindowsAzure\ServiceBus\Models\SubscriptionDescription::setLockDuration
     */
    public function testGetSetLockDuration()
    {
        // Setup
        $expected = 'testLockDuration';
        $subscriptionDescription = new SubscriptionDescription();

        // Test
        $subscriptionDescription->setLockDuration($expected);
        $actual = $subscriptionDescription->getLockDuration();

        // Assert 
        $this->assertEquals(
            $expected,
            $actual
        );
    }

    /** 
     * @covers \WindowsAzure\ServiceBus\Models\SubscriptionDescription::getRequiresSession
     * @covers \WindowsAzure\ServiceBus\Models\SubscriptionDescription::setRequiresSession
     */
    public function testGetSetRequiresSession()
    {
        // Setup
        $expected = 'testRequiresSession';
        $subscriptionDescription = new SubscriptionDescription();

        // Test
        $subscriptionDescription->setRequiresSession($expected);
        $actual = $subscriptionDescription->getRequiresSession();

        // Assert 
        $this->assertEquals(
            $expected,
            $actual
        );
    }

    /** 
     * @covers \WindowsAzure\ServiceBus\Models\SubscriptionDescription::getDefaultMessageTimeToLive
     * @covers \WindowsAzure\ServiceBus\Models\SubscriptionDescription::setDefaultMessageTimeToLive
     */
    public function testGetSetDefaultMessageTimeToLive()
    {
        // Setup
        $expected = 'testDefaultMessageTimeToLive';
        $subscriptionDescription = new SubscriptionDescription();

        // Test
        $subscriptionDescription->setDefaultMessageTimeToLive($expected);
        $actual = $subscriptionDescription->getDefaultMessageTimeToLive();

        // Assert 
        $this->assertEquals(
            $expected,
            $actual
        );
    }

    /** 
     * @covers \WindowsAzure\ServiceBus\Models\SubscriptionDescription::getDeadLetteringOnMessageExpiration
     * @covers \WindowsAzure\ServiceBus\Models\SubscriptionDescription::setDeadLetteringOnMessageExpiration
     */
    public function testGetSetDeadLetteringOnMessageExpiration()
    {
        // Setup
        $expected = 'testDeadLetteringOnMessageExpiration';
        $subscriptionDescription = new SubscriptionDescription();

        // Test
        $subscriptionDescription->setDeadLetteringOnMessageExpiration($expected);
        $actual = $subscriptionDescription->getDeadLetteringOnMessageExpiration();

        // Assert 
        $this->assertEquals(
            $expected,
            $actual
        );
    }

    /** 
     * @covers \WindowsAzure\ServiceBus\Models\SubscriptionDescription::getDeadLetteringOnFilterEvaluationExceptions
     * @covers \WindowsAzure\ServiceBus\Models\SubscriptionDescription::setDeadLetteringOnFilterEvaluationExceptions
     */
    public function testGetSetDeadLetteringOnFilterEvaluationExceptions()
    {
        // Setup
        $expected = 'testDeadLetteringOnFilterEvaluationExceptions';
        $subscriptionDescription = new SubscriptionDescription();

        // Test
        $subscriptionDescription->setDeadLetteringOnFilterEvaluationExceptions($expected);
        $actual = $subscriptionDescription->getDeadLetteringOnFilterEvaluationExceptions();

        // Assert 
        $this->assertEquals(
            $expected,
            $actual
        );
    }

    /** 
     * @covers \WindowsAzure\ServiceBus\Models\SubscriptionDescription::getDefaultRuleDescription
     * @covers \WindowsAzure\ServiceBus\Models\SubscriptionDescription::setDefaultRuleDescription
     */
    public function testGetSetDefaultRuleDescription()
    {
        // Setup
        $expected = 'testDefaultRuleDescription';
        $subscriptionDescription = new SubscriptionDescription();

        // Test
        $subscriptionDescription->setDefaultRuleDescription($expected);
        $actual = $subscriptionDescription->getDefaultRuleDescription();

        // Assert 
        $this->assertEquals(
            $expected,
            $actual
        );
    }

    /** 
     * @covers \WindowsAzure\ServiceBus\Models\SubscriptionDescription::getMessageCount
     * @covers \WindowsAzure\ServiceBus\Models\SubscriptionDescription::setMessageCount
     */
    public function testGetSetMessageCount()
    {
        // Setup
        $expected = 'testMessageCount';
        $subscriptionDescription = new SubscriptionDescription();

        // Test
        $subscriptionDescription->setMessageCount($expected);
        $actual = $subscriptionDescription->getMessageCount();

        // Assert 
        $this->assertEquals(
            $expected,
            $actual
        );
    }

    /** 
     * @covers \WindowsAzure\ServiceBus\Models\SubscriptionDescription::getMaxDeliveryCount
     * @covers \WindowsAzure\ServiceBus\Models\SubscriptionDescription::setMaxDeliveryCount
     */
    public function testGetSetMaxDeliveryCount()
    {
        // Setup
        $expected = 'testMaxDeliveryCount';
        $subscriptionDescription = new SubscriptionDescription();

        // Test
        $subscriptionDescription->setMaxDeliveryCount($expected);
        $actual = $subscriptionDescription->getMaxDeliveryCount();

        // Assert 
        $this->assertEquals(
            $expected,
            $actual
        );
    }

    /** 
     * @covers \WindowsAzure\ServiceBus\Models\SubscriptionDescription::getEnableBatchedOperations
     * @covers \WindowsAzure\ServiceBus\Models\SubscriptionDescription::setEnableBatchedOperations
     */
    public function testGetSetEnableBatchedOperations()
    {
        // Setup
        $expected = 'testEnableBatchedOperations';
        $subscriptionDescription = new SubscriptionDescription();

        // Test
        $subscriptionDescription->setEnableBatchedOperations($expected);
        $actual = $subscriptionDescription->getEnableBatchedOperations();

        // Assert 
        $this->assertEquals(
            $expected,
            $actual
        );
    }
}
