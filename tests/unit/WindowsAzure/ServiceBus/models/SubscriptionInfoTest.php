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
use WindowsAzure\ServiceBus\Models\SubscriptionInfo;

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
class SubscriptionInfoTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers \WindowsAzure\ServiceBus\Models\SubscriptionInfo::__construct
     */
    public function testSubscriptionInfoConstructor()
    {
        // Setup
        $expected = 'testSubscriptionInfoName';

        // Test
        $SubscriptionInfo = new SubscriptionInfo($expected);
        $actual = $SubscriptionInfo->getTitle();

        // Assert
        $this->assertNotNull($SubscriptionInfo);
        $this->assertEquals(
            $expected,
            $actual
        );
    }

    /** 
     * @covers \WindowsAzure\ServiceBus\Models\SubscriptionInfo::getSubscriptionDescription
     * @covers \WindowsAzure\ServiceBus\Models\SubscriptionInfo::setSubscriptionDescription
     */
    public function testGetSetSubscriptionDescription()
    {
        // Setup
        $expected = new SubscriptionDescription('testSubscriptionDescription');
        $SubscriptionInfo = new SubscriptionInfo();

        // Test
        $SubscriptionInfo->setSubscriptionDescription($expected);
        $actual = $SubscriptionInfo->getSubscriptionDescription();

        // Assert 
        $this->assertEquals(
            $expected,
            $actual
        );
    }

    /** 
     * @covers \WindowsAzure\ServiceBus\Models\SubscriptionInfo::getLockDuration
     * @covers \WindowsAzure\ServiceBus\Models\SubscriptionInfo::setLockDuration
     */
    public function testGetSetLockDuration()
    {
        // Setup
        $expected = 'testLockDuration';
        $subscriptionInfo = new SubscriptionInfo();

        // Test
        $subscriptionInfo->setLockDuration($expected);
        $actual = $subscriptionInfo->getLockDuration();

        // Assert 
        $this->assertEquals(
            $expected,
            $actual
        );
    }

    /** 
     * @covers \WindowsAzure\ServiceBus\Models\SubscriptionInfo::getRequiresSession
     * @covers \WindowsAzure\ServiceBus\Models\SubscriptionInfo::setRequiresSession
     */
    public function testGetSetRequiresSession()
    {
        // Setup
        $expected = 'testRequiresSession';
        $subscriptionInfo = new SubscriptionInfo();

        // Test
        $subscriptionInfo->setRequiresSession($expected);
        $actual = $subscriptionInfo->getRequiresSession();

        // Assert 
        $this->assertEquals(
            $expected,
            $actual
        );
    }

    /** 
     * @covers \WindowsAzure\ServiceBus\Models\SubscriptionInfo::getDefaultMessageTimeToLive
     * @covers \WindowsAzure\ServiceBus\Models\SubscriptionInfo::setDefaultMessageTimeToLive
     */
    public function testGetSetDefaultMessageTimeToLive()
    {
        // Setup
        $expected = 'testDefaultMessageTimeToLive';
        $subscriptionInfo = new SubscriptionInfo();

        // Test
        $subscriptionInfo->setDefaultMessageTimeToLive($expected);
        $actual = $subscriptionInfo->getDefaultMessageTimeToLive();

        // Assert 
        $this->assertEquals(
            $expected,
            $actual
        );
    }

    /** 
     * @covers \WindowsAzure\ServiceBus\Models\SubscriptionInfo::getDeadLetteringOnMessageExpiration
     * @covers \WindowsAzure\ServiceBus\Models\SubscriptionInfo::setDeadLetteringOnMessageExpiration
     */
    public function testGetSetDeadLetteringOnMessageExpiration()
    {
        // Setup
        $expected = 'testDeadLetteringOnMessageExpiration';
        $subscriptionInfo = new SubscriptionInfo();

        // Test
        $subscriptionInfo->setDeadLetteringOnMessageExpiration($expected);
        $actual = $subscriptionInfo->getDeadLetteringOnMessageExpiration();

        // Assert 
        $this->assertEquals(
            $expected,
            $actual
        );
    }

    /** 
     * @covers \WindowsAzure\ServiceBus\Models\SubscriptionInfo::getDeadLetteringOnFilterEvaluationExceptions
     * @covers \WindowsAzure\ServiceBus\Models\SubscriptionInfo::setDeadLetteringOnFilterEvaluationExceptions
     */
    public function testGetSetDeadLetteringOnFilterEvaluationExceptions()
    {
        // Setup
        $expected = 'testDeadLetteringOnFilterEvaluationExceptions';
        $subscriptionInfo = new SubscriptionInfo();

        // Test
        $subscriptionInfo->setDeadLetteringOnFilterEvaluationExceptions($expected);
        $actual = $subscriptionInfo->getDeadLetteringOnFilterEvaluationExceptions();

        // Assert 
        $this->assertEquals(
            $expected,
            $actual
        );
    }

    /** 
     * @covers \WindowsAzure\ServiceBus\Models\SubscriptionInfo::getDefaultRuleDescription
     * @covers \WindowsAzure\ServiceBus\Models\SubscriptionInfo::setDefaultRuleDescription
     */
    public function testGetSetDefaultRuleDescription()
    {
        // Setup
        $expected = 'testDefaultRuleDescription';
        $subscriptionInfo = new SubscriptionInfo();

        // Test
        $subscriptionInfo->setDefaultRuleDescription($expected);
        $actual = $subscriptionInfo->getDefaultRuleDescription();

        // Assert 
        $this->assertEquals(
            $expected,
            $actual
        );
    }

    /** 
     * @covers \WindowsAzure\ServiceBus\Models\SubscriptionInfo::getMessageCount
     * @covers \WindowsAzure\ServiceBus\Models\SubscriptionInfo::setMessageCount
     */
    public function testGetSetMessageCount()
    {
        // Setup
        $expected = 'testMessageCount';
        $subscriptionInfo = new SubscriptionInfo();

        // Test
        $subscriptionInfo->setMessageCount($expected);
        $actual = $subscriptionInfo->getMessageCount();

        // Assert 
        $this->assertEquals(
            $expected,
            $actual
        );
    }

    /** 
     * @covers \WindowsAzure\ServiceBus\Models\SubscriptionInfo::getMaxDeliveryCount
     * @covers \WindowsAzure\ServiceBus\Models\SubscriptionInfo::setMaxDeliveryCount
     */
    public function testGetSetMaxDeliveryCount()
    {
        // Setup
        $expected = 'testMaxDeliveryCount';
        $subscriptionInfo = new SubscriptionInfo();

        // Test
        $subscriptionInfo->setMaxDeliveryCount($expected);
        $actual = $subscriptionInfo->getMaxDeliveryCount();

        // Assert 
        $this->assertEquals(
            $expected,
            $actual
        );
    }

    /** 
     * @covers \WindowsAzure\ServiceBus\Models\SubscriptionInfo::getEnableBatchedOperations
     * @covers \WindowsAzure\ServiceBus\Models\SubscriptionInfo::setEnableBatchedOperations
     */
    public function testGetSetEnableBatchedOperations()
    {
        // Setup
        $expected = 'testEnableBatchedOperations';
        $subscriptionInfo = new SubscriptionInfo();

        // Test
        $subscriptionInfo->setEnableBatchedOperations($expected);
        $actual = $subscriptionInfo->getEnableBatchedOperations();

        // Assert 
        $this->assertEquals(
            $expected,
            $actual
        );
    }
}
