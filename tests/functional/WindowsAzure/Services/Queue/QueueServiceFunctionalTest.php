<?php

/**
 * Functional tests for the SDK
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
 * @category   Microsoft
 * @package    PEAR2\Tests\Functional\WindowsAzure\Services\Queue
 * @author     Jason Cooke <jcooke@microsoft.com>
 * @copyright  2012 Microsoft Corporation
 * @license    http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link       http://pear.php.net/package/azure-sdk-for-php
 */

namespace PEAR2\Tests\Functional\WindowsAzure\Services\Queue;

use \HTTP_Request2_LogicException;
use PEAR2\WindowsAzure\Core\ServiceException;
use PEAR2\WindowsAzure\Services\Core\Models\Logging;
use PEAR2\WindowsAzure\Services\Core\Models\Metrics;
use PEAR2\WindowsAzure\Services\Core\Models\RetentionPolicy;
use PEAR2\WindowsAzure\Services\Core\Models\ServiceProperties;
use PEAR2\WindowsAzure\Services\Queue\Models\CreateMessageOptions;
use PEAR2\WindowsAzure\Services\Queue\Models\CreateQueueOptions;
use PEAR2\WindowsAzure\Services\Queue\Models\ListMessagesOptions;
use PEAR2\WindowsAzure\Services\Queue\Models\ListQueuesOptions;
use PEAR2\WindowsAzure\Services\Queue\Models\PeekMessagesOptions;
use PEAR2\WindowsAzure\Services\Queue\Models\QueueServiceOptions;

class QueueServiceFunctionalTest extends FunctionalTestBase {
    // ----------------------------
    // --- getServiceProperties ---
    // ----------------------------

    public function testGetServicePropertiesNoOptions() {
        $service = FunctionalTestBase::createService();
        $serviceProperties = QueueServiceFunctionalTestData::getDefaultServiceProperties();
       
        $shouldReturn = false;
        try {
            $service->setServiceProperties($serviceProperties);
            $this->assertFalse(self::isRunningWithEmulator(), 'Should succeed when not running in emulator');
        } catch (ServiceException $e) {
            // Expect failure in emulator, as v1.6 doesn't support this method
            if (self::isRunningWithEmulator()) {
                $this->assertEquals(400, $e->getCode(), 'getCode');
                $shouldReturn = true;
            }
        }
        if($shouldReturn) {
            return;
        }

        $this->getServicePropertiesWorker($service, null);
    }

    public function testGetServiceProperties() {
        $service = FunctionalTestBase::createService();
        $serviceProperties = QueueServiceFunctionalTestData::getDefaultServiceProperties();

        $shouldReturn = false;
        try {
            $service->setServiceProperties($serviceProperties);
            $this->assertFalse(self::isRunningWithEmulator(), 'Should succeed when not running in emulator');
        } catch (ServiceException $e) {
            // Expect failure in emulator, as v1.6 doesn't support this method
            if (self::isRunningWithEmulator()) {
                $this->assertEquals(400, $e->getCode(), 'getCode');
                $shouldReturn = true;
            }
        }
        if($shouldReturn) {
            return;
        }

        // Now look at the combos.
        $interestingTimeouts = QueueServiceFunctionalTestData::getInterestingTimeoutValues();
        foreach($interestingTimeouts as $timeout)  {
            $options = new QueueServiceOptions();
            // TODO: Revert when fixed
            // https://github.com/WindowsAzure/azure-sdk-for-php/issues/69
            // $options->setTimeout($timeout);
            $options->setTimeout($timeout . '');
            $this->getServicePropertiesWorker($service, $options);
        }
    }

    private function getServicePropertiesWorker($service, $options) {
        self::println( 'Trying $options: ' . self::tmptostring($options));
        $effOptions = ($options == null ? new QueueServiceOptions() : $options);
        try {
            $ret = ($options == null ? $service->getServiceProperties() : $service->getServiceProperties($options));

            // TODO: Revert when fixed
            // https://github.com/WindowsAzure/azure-sdk-for-php/issues/101
            // if ($effOptions->getTimeout() != null && $effOptions->getTimeout() < 1) {
            if ($effOptions->getTimeout() != null && $effOptions->getTimeout() < 0) {
                $this->True('Expect negative timeouts in $options to throw', false);
            } else {
                $this->assertFalse(self::isRunningWithEmulator(), 'Should succeed when not running in emulator');
            }
            $this->verifyServicePropertiesWorker($ret, null);
        }
        catch (ServiceException $e) {
            if (self::isRunningWithEmulator()) {
                if ($options->getTimeout() != null && $options->getTimeout() < 0) {
                    $this->assertEquals(500, $e->getCode(), 'getCode');
                } else {
                // Expect failure in emulator, as v1.6 doesn't support this method
                    $this->assertEquals(400, $e->getCode(), 'getCode');
                }
            } else {
                if ($effOptions->getTimeout() == null || $effOptions->getTimeout() >= 1) {
                    $this->assertNull($e, 'Expect positive timeouts in $options to be fine');
                }
                else {
                    $this->assertEquals(500, $e->getCode(), 'getCode');
                }
            }
        }
    }

    private function verifyServicePropertiesWorker($ret, $serviceProperties) {
        if ($serviceProperties == null) {
            $serviceProperties = QueueServiceFunctionalTestData::getDefaultServiceProperties();
        }

        $sp = $ret->getValue();
        $this->assertNotNull($sp, 'getValue should be non-null');

        $l = $sp->getLogging();
        $this->assertNotNull($l, 'getValue()->getLogging() should be non-null');
        $this->assertEquals($serviceProperties->getLogging()->getVersion(), $l->getVersion(), 'getValue()->getLogging()->getVersion');
        $this->assertEquals($serviceProperties->getLogging()->getDelete(), $l->getDelete(), 'getValue()->getLogging()->getDelete');
        $this->assertEquals($serviceProperties->getLogging()->getRead(), $l->getRead(), 'getValue()->getLogging()->getRead');
        $this->assertEquals($serviceProperties->getLogging()->getWrite(), $l->getWrite(), 'getValue()->getLogging()->getWrite');

        $r = $l->getRetentionPolicy();
        $this->assertNotNull($r, 'getValue()->getLogging()->getRetentionPolicy should be non-null');
        $this->assertEquals($serviceProperties->getLogging() ->getRetentionPolicy()->getDays(), $r->getDays(), 'getValue()->getLogging()->getRetentionPolicy()->getDays');

        $m = $sp->getMetrics();
        $this->assertNotNull($m, 'getValue()->getMetrics() should be non-null');
        $this->assertEquals($serviceProperties->getMetrics()->getVersion(), $m->getVersion(), 'getValue()->getMetrics()->getVersion');
        $this->assertEquals($serviceProperties->getMetrics()->getEnabled(), $m->getEnabled(), 'getValue()->getMetrics()->getEnabled');
        $this->assertEquals($serviceProperties->getMetrics()->getIncludeAPIs(), $m->getIncludeAPIs(), 'getValue()->getMetrics()->getIncludeAPIs');

        $r = $m->getRetentionPolicy();
        $this->assertNotNull($r, 'getValue()->getMetrics()->getRetentionPolicy should be non-null');
        $this->assertEquals($serviceProperties->getMetrics() ->getRetentionPolicy()->getDays(), $r->getDays(), 'getValue()->getMetrics()->getRetentionPolicy()->getDays');
    }

    // ----------------------------
    // --- setServiceProperties ---
    // ----------------------------

    public function testSetServicePropertiesNoOptions() {
        $service = FunctionalTestBase::createService();
        $serviceProperties = QueueServiceFunctionalTestData::getDefaultServiceProperties();
        $this->setServicePropertiesWorker($service, $serviceProperties, null);
    }

    public function testSetServiceProperties() {
        $service = FunctionalTestBase::createService();
        $interestingServiceProperties = QueueServiceFunctionalTestData::getInterestingServiceProperties();
        foreach($interestingServiceProperties as $serviceProperties)  {
            $interestingTimeouts = QueueServiceFunctionalTestData::getInterestingTimeoutValues();
            foreach($interestingTimeouts as $timeout)  {
                $options = new QueueServiceOptions();
                // TODO: Revert when fixed
                // https://github.com/WindowsAzure/azure-sdk-for-php/issues/69
                // $options->setTimeout($timeout);
                $options->setTimeout($timeout . '');
                $this->setServicePropertiesWorker($service, $serviceProperties, $options);
            }
        }
    }

    private function setServicePropertiesWorker($service, $serviceProperties, $options) {
        self::println( 'Trying $options: ' . self::tmptostring($options) . 
                ' and $serviceProperties' . self::tmptostring($serviceProperties));
        
        try {
            if ($options == null) {
                $service->setServiceProperties($serviceProperties);
            } else {
                $service->setServiceProperties($serviceProperties, $options);
            }

            $this->assertFalse(self::isRunningWithEmulator(), 'Should succeed when not running in emulator');

            if ($options == null) {
                $options = new QueueServiceOptions();
            }

            // TODO: Revert when fixed
            // https://github.com/WindowsAzure/azure-sdk-for-php/issues/101
            // if ($options->getTimeout() != null && $options->getTimeout() < 1) {
            if ($options->getTimeout() != null && $options->getTimeout() < 0) {
                $this->assertTrue(false, 'Expect negative timeouts in $options to throw');
            } else {
                $this->assertFalse(self::isRunningWithEmulator(), 'Should succeed when not running in emulator');
            }

            $ret = ($options == null ? $service->getServiceProperties() : $service->getServiceProperties($options));

            $this->verifyServicePropertiesWorker($ret, $serviceProperties);

        } catch (ServiceException $e) {
            if ($options == null) {
                $options = new QueueServiceOptions();
            }

            if (self::isRunningWithEmulator()) {
                if ($options->getTimeout() != null && $options->getTimeout() < 0) {
                    $this->assertEquals(500, $e->getCode(), 'getCode');
                } else {
                    $this->assertEquals(400, $e->getCode(), 'getCode');
                }
            } else {
                if ($options->getTimeout() != null && $options->getTimeout() < 1) {
                    $this->assertEquals(500, $e->getCode(), 'getCode');
                } else {
                    $this->assertNull($e, 'Expect positive timeouts in $options to be fine');
                }
            }
        }
    }

    // ------------------
    // --- listQueues ---
    // ------------------

    public function testListQueuesNoOptions() {
        $service = FunctionalTestBase::createService();
        $this->listQueuesWorker($service, null);
    }

    public function testListQueues() {
        $service = FunctionalTestBase::createService();
        $interestingListQueuesOptions = QueueServiceFunctionalTestData::getInterestingListQueuesOptions();
        foreach($interestingListQueuesOptions as $options)  {
            $this->listQueuesWorker($service, $options);
        }
    }

    private function listQueuesWorker($service, $options) {
        self::println( 'Trying $options: ' . self::tmptostring($options));
        $finished = false;
        while (!$finished) {
            try {
                $ret = ($options == null ? $service->listQueues() : $service->listQueues($options));

                if ($options == null) {
                    $options = new ListQueuesOptions();
                }

                // TODO: Revert when fixed
                // https://github.com/WindowsAzure/azure-sdk-for-php/issues/101
//                if ($options->getTimeout() != null && $options->getTimeout() < 1) {

                // TODO: Uncomment when fixed
                // https://github.com/WindowsAzure/azure-sdk-for-php/issues/103
//                if ($options->getTimeout() != null && $options->getTimeout() < 0) {
//                    $this->assertTrue(false, 'Expect negative timeouts ' . $options->getTimeout() . ' in $options to throw');
//                }
                $this->verifyListQueuesWorker($ret, $options);

                if (strlen($ret->getNextMarker()) == 0) {
                    self::println('Done with this loop');
                    $finished = true;
                }
                else {
                    self::println('Cycling to get the next marker: ' . $ret->getNextMarker());
                    $options->setMarker($ret->getNextMarker());
                }
            }
            catch (ServiceException $e) {
                $finished = true;
                if ($options->getTimeout() == null || $options->getTimeout() >= 1) {
                    $this->assertNull($e, 'Expect positive timeouts in $options to be fine');
                }
                else {
                    $this->assertEquals(500, $e->getCode(), 'getCode');
                }
            }
        }
    }

    private function verifyListQueuesWorker($ret, $options) {
        // Uncomment when fixed
        // https://github.com/WindowsAzure/azure-sdk-for-php/issues/98
        //$this->assertEquals($accountName, $ret->getAccountName(), 'getAccountName');
        
        // Cannot really check the next marker. Just make sure it is not null.
        $this->assertNotNull($ret->getNextMarker(), 'getNextMarker');
        $this->assertEquals($options->getMarker(), $ret->getMarker(), 'getMarker');
        $this->assertEquals($options->getMaxResults(), $ret->getMaxResults(), 'getMaxResults');
        $this->assertEquals($options->getPrefix(), $ret->getPrefix(), 'getPrefix');

        $this->assertNotNull($ret->getQueues(), 'getQueues');
         
        if ($options->getMaxResults() == 0) {
            $this->assertEquals(
                    'When MaxResults is 0, expect getNextMarker (' . 
                    $ret->getNextMarker() . ')to be have length 0', 
                    0, strlen($ret->getNextMarker()));

            if ($options->getPrefix() != null && $options->getPrefix() == QueueServiceFunctionalTestData::$nonExistQueuePrefix) {
                $this->assertEquals(0, count($ret->getQueues()), 'when MaxResults=0 and Prefix=(\'' . $options->getPrefix() . '\'), then Queues->length');
            }
            else if ($options->getPrefix() != null && $options->getPrefix() == QueueServiceFunctionalTestData::$testUniqueId) {
                $this->assertEquals(count(QueueServiceFunctionalTestData::$TEST_QUEUE_NAMES), count($ret->getQueues()), 'when MaxResults=0 and Prefix=(\'' . $options->getPrefix() . '\'), then count Queues');
            }
            else {
                // Don't know how many there should be
            }
        }
        else if (strlen($ret->getNextMarker()) == 0) {
            $this->assertTrue(count($ret ->getQueues()) <= $options->getMaxResults(), 'when NextMarker (\'' . $ret->getNextMarker() . '\')==\'\', Queues->length (' . count($ret->getQueues()) . ') should be <= MaxResults (' . $options->getMaxResults() . ')');

            if ($options->getPrefix() != null && $options->getPrefix() == QueueServiceFunctionalTestData::$nonExistQueuePrefix) {
                $this->assertEquals(0, count($ret->getQueues()), 'when no next marker and Prefix=(\'' . $options->getPrefix() . '\'), then Queues->length');
            }
            else if ($options->getPrefix() != null && $options->getPrefix() == QueueServiceFunctionalTestData::$testUniqueId) {
                // Need to futz with the mod because you are allowed to get MaxResults items returned->
                $this->assertEquals(count(QueueServiceFunctionalTestData::$TEST_QUEUE_NAMES) % $options->getMaxResults(), count($ret ->getQueues()) % $options->getMaxResults(), 'when no next marker and Prefix=(\'' . $options->getPrefix() . '\'), then Queues->length');
            }
            else {
                // Don't know how many there should be
            }
        }
        else {
            $this->assertEquals('when NextMarker (' . $ret->getNextMarker() .
                    ')!=\'\', Queues->length (' . count($ret->getQueues()) . 
                    ') should be == MaxResults (' . $options->getMaxResults() . ')', 
                    count($ret ->getQueues()), 
                    $options->getMaxResults());

            if ($options->getPrefix() != null && $options->getPrefix() == (QueueServiceFunctionalTestData::$nonExistQueuePrefix)) {
                $this->assertTrue(false, 'when a next marker and Prefix=(\'' . $options->getPrefix() . '\'), impossible');
            }
        }

        // TODO: Need to verify the queue content?
    }

    // -------------------
    // --- createQueue --- 
    // -------------------  

    public function testCreateQueueNoOptions() {
        $service = FunctionalTestBase::createService();
        $this->createQueueWorker($service, null);
    }

    public function testCreateQueue() {
        $service = FunctionalTestBase::createService();
        $interestingCreateQueueOptions = QueueServiceFunctionalTestData::getInterestingCreateQueueOptions();
        foreach($interestingCreateQueueOptions as $options)  {
            $this->createQueueWorker($service, $options);
        }
    }

    private function createQueueWorker($service, $options) {
        self::println( 'Trying $options: ' . self::tmptostring($options));
        $queue = QueueServiceFunctionalTestData::getInterestingQueueName();
        $created = false;

        try {
            if ($options == null) {
                $service->createQueue($queue);
            }
            else {
                $service->createQueue($queue, $options);
            }
            $created = true;

            if ($options == null) {
                $options = new CreateQueueOptions();
            }

            // Uncomment when fixed
            // https://github.com/WindowsAzure/azure-sdk-for-php/issues/59
//            if ($options->getTimeout() != null && $options->getTimeout() < 1) {
//                $this->assertTrue(false, 'Expect negative timeouts in $options to throw');
//            }

            // Now check that the queue was created correctly.

            // Make sure that the list of all applicable queues is correctly updated.
            $opts = new ListQueuesOptions();
            $opts->setPrefix(QueueServiceFunctionalTestData::$testUniqueId);
            $qs = $service->listQueues($opts);
            $this->assertEquals(count($qs->getQueues()), (count(QueueServiceFunctionalTestData::$TEST_QUEUE_NAMES) + 1), 'After adding one, with Prefix=(\'' . QueueServiceFunctionalTestData::$testUniqueId . '\'), then Queues->length');

            // Check the metadata on the queue
            $ret = $service->getQueueMetadata($queue);
            $this->verifyCreateQueueWorker($ret, $options);
            $service->deleteQueue($queue);
            $created = false;
        }
        catch (ServiceException $e) {
            if ($options == null) {
                $options = new CreateQueueOptions();
            }
            // Uncomment when fixed
            // https://github.com/WindowsAzure/azure-sdk-for-php/issues/59
//            if ($options->getTimeout() == null || $options->getTimeout() >= 1) {
//                $this->assertNull($e, 'Expect positive timeouts in $options to be fine');
//            }
//            else 
                {
                $this->assertEquals(500, $e->getCode(), 'getCode');
            }
        }
        if ($created) {
            $service->deleteQueue($queue);
        }
    }

    private function verifyCreateQueueWorker($ret, $options) {
        self::println( 'Trying $options: ' . self::tmptostring($options) . 
                ' and ret ' . self::tmptostring($ret));
        if ($options == null) {
            $options = QueueServiceFunctionalTestData::getInterestingCreateQueueOptions();
            $options = $options[0];
        }

        if ($options->getMetadata() == null) {
            $this->assertNotNull($ret->getMetadata(), 'queue Metadata');
            $this->assertEquals(0, count($ret->getMetadata()), 'queue Metadata count');
        }
        else {
            $this->assertNotNull($ret->getMetadata(), 'queue Metadata');
            $this->assertEquals(count($options->getMetadata()), count($ret->getMetadata()), 'Metadata');
            $om = $options->getMetadata();
            $rm = $ret->getMetadata();
            foreach(array_keys($options->getMetadata()) as $key)  {
                $this->assertEquals($om[$key], $rm[$key], 'Metadata(' . $key . ')');
            }
        }
        // TODO: Need to verify the queue content?
    }

    // -------------------
    // --- deleteQueue ---
    // -------------------

    public function testDeleteQueueNoOptions() {
        $service = FunctionalTestBase::createService();
        $this->deleteQueueWorker($service, null);
    }

    public function testDeleteQueue() {
        $service = FunctionalTestBase::createService();
        $interestingTimeouts = QueueServiceFunctionalTestData::getInterestingTimeoutValues();
        foreach($interestingTimeouts as $timeout)  {
            $options = new QueueServiceOptions();
            $options->setTimeout($timeout);
            $this->deleteQueueWorker($service, $options);
        }
    }

    private function deleteQueueWorker($service, $options) {
        self::println( 'Trying $options: ' . self::tmptostring($options));
        $queue = QueueServiceFunctionalTestData::getInterestingQueueName();

        // Make sure there is something to delete.
        $service->createQueue($queue);

        // Make sure that the list of all applicable queues is correctly updated.
        $opts = new ListQueuesOptions();
        $opts->setPrefix(QueueServiceFunctionalTestData::$testUniqueId);
        $qs = $service->listQueues($opts);
        $this->assertEquals(count($qs->getQueues()), (count(QueueServiceFunctionalTestData::$TEST_QUEUE_NAMES) + 1), 'After adding one, with Prefix=(\'' . QueueServiceFunctionalTestData::$testUniqueId . '\'), then Queues->length');

        $deleted = false;
        try {
            if ($options == null) {
                $service->deleteQueue($queue);
            }
            else {
                $service->deleteQueue($queue, $options);
            }

            $deleted = true;

            if ($options == null) {
                $options = new QueueServiceOptions();
            }

            // Uncomment when fixed
            // https://github.com/WindowsAzure/azure-sdk-for-php/issues/59
//            if ($options->getTimeout() != null && $options->getTimeout() < 1) {
//                $this->assertTrue(false, 'Expect negative timeouts in $options to throw');
//            }

            // Make sure that the list of all applicable queues is correctly updated.
            $opts = new ListQueuesOptions();
            $opts->setPrefix(QueueServiceFunctionalTestData::$testUniqueId);
            $qs = $service->listQueues($opts);
            $this->assertEquals(count($qs->getQueues()), count(QueueServiceFunctionalTestData::$TEST_QUEUE_NAMES), 'After adding then deleting one, with Prefix=(\'' . QueueServiceFunctionalTestData::$testUniqueId . '\'), then Queues->length');

            // Nothing else interesting to check for the options.
        }
        catch (ServiceException $e) {
            // Uncomment when fixed
            // https://github.com/WindowsAzure/azure-sdk-for-php/issues/59
//            if ($options->getTimeout() == null || $options->getTimeout() >= 1) {
//                $this->assertNull($e, 'Expect positive timeouts in $options to be fine');
//            }
//            else
            {
                $this->assertEquals(500, $e->getCode(), 'getCode');
            }
        }
        if (!$deleted) {
            echo ('Test didn\'t delete the $queue, so try again more simply');
                // Try again. If it doesn't work, not much else to try.
            $service->deleteQueue($queue);
        }
    }

    // TODO: Negative tests, like accessing a non-existant queue, or recreating an existing queue?

    // ------------------------------------------
    // --- getQueueMetadata, setQueueMetadata ---
    // ------------------------------------------

    public function testGetQueueMetadataNoOptions() {
        $service = FunctionalTestBase::createService();
        $interestingMetadata = QueueServiceFunctionalTestData::getNiceMetadata();
        foreach ($interestingMetadata as $metadata) {
            $this->getQueueMetadataWorker($service, null, $metadata);
        }
    }

    public function testGetQueueMetadata() {
        $service = FunctionalTestBase::createService();
        $interestingTimeouts = QueueServiceFunctionalTestData::getInterestingTimeoutValues();
        $interestingMetadata = QueueServiceFunctionalTestData::getNiceMetadata();

        foreach($interestingTimeouts as $timeout)  {
            foreach ($interestingMetadata as $metadata) {
                $options = new QueueServiceOptions();
                $options->setTimeout($timeout);
                $this->getQueueMetadataWorker($service, $options, $metadata);
            }
        }
    }

    private function getQueueMetadataWorker($service, $options, $metadata) {
        self::println( 'Trying $options: ' . self::tmptostring($options) . 
                ' and $metadata: ' . self::tmptostring($metadata));
        $queue = QueueServiceFunctionalTestData::getInterestingQueueName();

        // Make sure there is something to test
        $service->createQueue($queue);

        // Put some messages to verify getApproximateMessageCount 
        if ($metadata != null) {
            for ($i = 0; $i < count($metadata); $i++) {
                $service->createMessage($queue, 'message ' . $i);
            }

            // And put in some metadata
            $service->setQueueMetadata($queue, $metadata);
        }

        try {
            $res = ($options == null ? $service->getQueueMetadata($queue) : $service->getQueueMetadata( $queue, $options));

            if ($options == null) {
                $options = new QueueServiceOptions();
            }

            // Uncomment when fixed
            // https://github.com/WindowsAzure/azure-sdk-for-php/issues/59
//            if ($options->getTimeout() != null && $options->getTimeout() < 1) {
//                $this->assertTrue(false, 'Expect negative timeouts in $options to throw');
//            }

            $this->verifyGetSetQueueMetadataWorker($res, $metadata);
        }
        catch (ServiceException $e) {
            // Uncomment when fixed
            // https://github.com/WindowsAzure/azure-sdk-for-php/issues/59
//            if ($options->getTimeout() == null || $options->getTimeout() >= 1) {
//                $this->assertNull($e, 'Expect positive timeouts in $options to be fine');
//            }
//            else
            {
                $this->assertEquals(500, $e->getCode(), 'getCode');
            }
        }
        // Clean up->
        $service->deleteQueue($queue);
    }

    private function verifyGetSetQueueMetadataWorker($ret, $metadata) {
        $this->assertNotNull($ret->getMetadata(), 'queue Metadata');
        if ($metadata == null) {
            $this->assertEquals(0, count($ret->getMetadata()), 'Metadata');
            $this->assertEquals(0, $ret->getApproximateMessageCount(), 'getApproximateMessageCount');
        }
        else {
            $this->assertEquals(count($metadata), count($ret->getMetadata()), 'Metadata');
            $rm =$ret->getMetadata();
            foreach(array_keys($metadata) as $key)  {
                $this->assertEquals($metadata[$key], $rm[$key], 'Metadata(' . $key . ')');
            }

            // Hard to test "approximate", so just verify that it is in the expected range
            $this->assertTrue('0 <= getApproximateMessageCount (' . 
                    $ret->getApproximateMessageCount() . ') <= $metadata count (' . count($metadata) . ')', 
                            (0 <= $ret->getApproximateMessageCount()) && ($ret->getApproximateMessageCount() <= count($metadata)));
        }
    }

    // ------------------------
    // --- setQueueMetadata ---
    // ------------------------

    public function testSetQueueMetadataNoOptions() {
        $service = FunctionalTestBase::createService();
        $interestingMetadata = QueueServiceFunctionalTestData::getInterestingMetadata();
        foreach ($interestingMetadata as $metadata) {
            if ($metadata == null) {
                // This is tested above.
                continue;
            }
            $this->setQueueMetadataWorker($service, null, $metadata);
        }
    }

    public function testSetQueueMetadata() {
        $service = FunctionalTestBase::createService();
        $interestingTimeouts = QueueServiceFunctionalTestData::getInterestingTimeoutValues();
        $interestingMetadata = QueueServiceFunctionalTestData::getInterestingMetadata();

        foreach($interestingTimeouts as $timeout)  {
            foreach ($interestingMetadata as $metadata) {
                if ($metadata == null) {
                    // This is tested above.
                    continue;
                }
                $options = new QueueServiceOptions();
                $options->setTimeout($timeout);
                $this->setQueueMetadataWorker($service, $options, $metadata);
            }
        }
    }

    private function setQueueMetadataWorker($service, $options, $metadata) {
        self::println( 'Trying $options: ' . self::tmptostring($options) . 
                ' and $metadata: ' . self::tmptostring($metadata));
        $queue = QueueServiceFunctionalTestData::getInterestingQueueName();

        // Make sure there is something to test
        $service->createQueue($queue);

        try {
            // And put in some metadata
            if ($options == null) {
                $service->setQueueMetadata($queue, $metadata);
            }
            else {
                $service->setQueueMetadata($queue, $metadata, $options);
            }

            if ($options == null) {
                $options = new QueueServiceOptions();
            }

            // Uncomment when fixed
            // https://github.com/WindowsAzure/azure-sdk-for-php/issues/59
//            if ($options->getTimeout() != null && $options->getTimeout() < 1) {
//                $this->assertTrue(false, 'Expect negative timeouts in $options to throw');
//            }

            $res = $service->getQueueMetadata($queue);
            $this->verifyGetSetQueueMetadataWorker($res, $metadata);
        }
        catch (HTTP_Request2_LogicException $le) {
            $keypart = array_keys($metadata);
            $keypart = $keypart[0];
            if ($metadata != null && count($metadata) > 0 && (substr($keypart, 0, 1) == '<')) {
                // Trying to pass bad metadata
            }            
            else {
                throw $le;
            }
        }
//        catch (ServiceException $e) {
//            // Uncomment when fixed
//            // https://github.com/WindowsAzure/azure-sdk-for-php/issues/59
////            else if ($options->getTimeout() != null && $options->getTimeout() < 1) {
////                $this->assertEquals(500, $e->getCode(), 'getCode');
////            }
//            else {
//                $this->assertNull($e, 'Expect positive timeouts in $options to be fine');
//            }
//        }
        // Clean up.
        $service->deleteQueue($queue);
    }

    // ---------------------
    // --- createMessage ---
    // ---------------------

    public function testCreateMessageEmpty() {
        $this->createMessageWorker('', QueueServiceFunctionalTestData::getSimpleCreateMessageOptions());
    }

    public function testCreateMessageUnicodeMessage() {
        $this->createMessageWorker('Some unicode: \uB2E4\uB974\uB2E4\uB294\u0625 \u064A\u062F\u064A\u0648', QueueServiceFunctionalTestData::getSimpleCreateMessageOptions());
    }

    public function testCreateMessageXmlMessage() {
        $this->createMessageWorker('Some HTML: <this><is></a>', QueueServiceFunctionalTestData::getSimpleCreateMessageOptions());
    }

    public function testCreateMessageWithSmallTTL() {
        $queue = QueueServiceFunctionalTestData::$TEST_QUEUE_NAMES;
        $queue = $queue[0];
        $messageText = QueueServiceFunctionalTestData::getSimpleMessageText();
        $service = FunctionalTestBase::createService();

        $options = new CreateMessageOptions();
        // Revert when fixed
        // https://github.com/WindowsAzure/azure-sdk-for-php/issues/69
//        $options->setVisibilityTimeoutInSeconds(2);
//        $options->setTimeToLiveInSeconds(4);
        $options->setVisibilityTimeoutInSeconds('2');
        $options->setTimeToLiveInSeconds('4');

        $service->createMessage($queue, $messageText, $options);

        $lmr = $service->listMessages($queue);

        // No messages, because it is not visible for 2 seconds.
        $this->assertEquals(0, count($lmr->getQueueMessages()), 'getQueueMessages() count');
        sleep(6);
        // Try again, passed the VisibilityTimeout has passed, but also the 4 second TTL has passed.
        $lmr = $service->listMessages($queue);

        $this->assertEquals(0, count($lmr->getQueueMessages()), 'getQueueMessages() count');

        $service->clearMessages($queue);
    }

    public function testCreateMessage() {
        $interestingTimes = array( null, -1, 0, QueueServiceFunctionalTestData::INTERESTING_TTL, 1000 );
        foreach($interestingTimes as $timeToLiveInSeconds)  {
            foreach($interestingTimes as $visibilityTimeoutInSeconds)  {
                $timeout = null;
                $options = new CreateMessageOptions();
            // Uncomment when fixed
            // https://github.com/WindowsAzure/azure-sdk-for-php/issues/59
//                $options->setTimeout($timeout);

        // Revert when fixed
        // https://github.com/WindowsAzure/azure-sdk-for-php/issues/69
//                $options->setTimeToLiveInSeconds($timeToLiveInSeconds);
//                $options->setVisibilityTimeoutInSeconds($visibilityTimeoutInSeconds);
                $options->setTimeToLiveInSeconds($timeToLiveInSeconds .'');
                $options->setVisibilityTimeoutInSeconds($visibilityTimeoutInSeconds . '');
                $this->createMessageWorker(QueueServiceFunctionalTestData::getSimpleMessageText(), $options);
            }
        }

        foreach($interestingTimes as $timeout)  {
            $timeToLiveInSeconds = 1000;
            $visibilityTimeoutInSeconds = QueueServiceFunctionalTestData::INTERESTING_TTL;
            $options = new CreateMessageOptions();
            // Uncomment when fixed
            // https://github.com/WindowsAzure/azure-sdk-for-php/issues/59
//            $options->setTimeout($timeout);

        // Revert when fixed
        // https://github.com/WindowsAzure/azure-sdk-for-php/issues/69
//            $options->setTimeToLiveInSeconds($timeToLiveInSeconds);
//            $options->setVisibilityTimeoutInSeconds($visibilityTimeoutInSeconds);
            $options->setTimeToLiveInSeconds($timeToLiveInSeconds . '');
            $options->setVisibilityTimeoutInSeconds($visibilityTimeoutInSeconds . '');
            $this->createMessageWorker(QueueServiceFunctionalTestData::getSimpleMessageText(), $options);
        }
    }

    private function createMessageWorker($messageText, $options) {
        self::println( 'Trying $options: ' . self::tmptostring($options));
        $queue = QueueServiceFunctionalTestData::$TEST_QUEUE_NAMES;
        $queue = $queue[0];
        $service = FunctionalTestBase::createService();

        try {
            if ($options == null) {
                $service->createMessage($queue, $messageText);
            }
            else {
                $service->createMessage($queue, $messageText, $options);
            }

            if ($options == null) {
                $options = new CreateMessageOptions();
            }

            if ($options->getVisibilityTimeoutInSeconds() != null && $options->getVisibilityTimeoutInSeconds() < 0) {
                $this->assertTrue(false, 'Expect negative getVisibilityTimeoutInSeconds in $options to throw');
            }
            // Uncomment when fixed
            // https://github.com/WindowsAzure/azure-sdk-for-php/issues/101
//            else if ($options->getTimeToLiveInSeconds() != null && $options->getTimeToLiveInSeconds() <= 0) {
            else if ($options->getTimeToLiveInSeconds() != null && $options->getTimeToLiveInSeconds() < 0) {
                $this->assertTrue(false, 'Expect negative getVisibilityTimeoutInSeconds in $options to throw');
            }
            // Uncomment when fixed
            // https://github.com/WindowsAzure/azure-sdk-for-php/issues/101
//            else if ($options->getVisibilityTimeoutInSeconds() != null && 
//                    $options->getTimeToLiveInSeconds() != null && 
//                    $options->getVisibilityTimeoutInSeconds() > 0 && 
//                    $options->getTimeToLiveInSeconds() <= $options->getVisibilityTimeoutInSeconds()) {

                // TODO: Uncomment when fixed
                // https://github.com/WindowsAzure/azure-sdk-for-php/issues/103
//            else if ($options->getVisibilityTimeoutInSeconds() != null && 
//                    $options->getTimeToLiveInSeconds() != null && 
//                    $options->getVisibilityTimeoutInSeconds() >= 0 && 
//                    $options->getTimeToLiveInSeconds() <= $options->getVisibilityTimeoutInSeconds()) {
//                $this->assertTrue(false, 'Expect getTimeToLiveInSeconds() <= getVisibilityTimeoutInSeconds in $options to throw');
//            }
            
            // Uncomment when fixed
            // https://github.com/WindowsAzure/azure-sdk-for-php/issues/59
//            else if ($options->getTimeout() != null && $options->getTimeout() < 1) {
//                $this->assertTrue(false, 'Expect negative timeouts in $options to throw');
//            }

            // Check that the message matches
            $lmr = $service->listMessages($queue);
            if ($options->getVisibilityTimeoutInSeconds() != null && $options->getVisibilityTimeoutInSeconds() > 0) {
                $this->assertEquals(0, count($lmr->getQueueMessages()), 'getQueueMessages() count');
                sleep(QueueServiceFunctionalTestData::INTERESTING_TTL);
                // Try again, not that the 4 second visibility has passed
                $lmr = $service->listMessages($queue);
                if ($options->getVisibilityTimeoutInSeconds() > QueueServiceFunctionalTestData::INTERESTING_TTL) {
                    $this->assertEquals(0, count($lmr->getQueueMessages()), 'getQueueMessages() count');
                }
                else {
                    $this->assertEquals(1, count($lmr->getQueueMessages()), 'getQueueMessages() count');
                    $qm = $lmr->getQueueMessages();
                    $qm = $qm[0];
                    $this->assertEquals($messageText, $qm->getMessageText(), '$qm->getMessageText');
                }
            }
            else {
                $this->assertEquals(1, count($lmr->getQueueMessages()), 'getQueueMessages() count');
                $qm = $lmr->getQueueMessages();
                $qm = $qm[0];
                $this->assertEquals($messageText, $qm->getMessageText(), '$qm->getMessageText');
            }

        }
        catch (ServiceException $e) {
            // Uncomment when fixed
            // https://github.com/WindowsAzure/azure-sdk-for-php/issues/59
//            if ($options->getTimeout() != null && $options->getTimeout() < 1) {
//                $this->assertEquals(500, $e->getCode(), 'getCode');
//            }
//            else
            if ($options->getVisibilityTimeoutInSeconds() != null && $options->getVisibilityTimeoutInSeconds() < 0) {
                // Trying to pass bad metadata
                $this->assertEquals(400, $e->getCode(), 'getCode');
                // TODO: Can check more?
            }
            else if ($options->getTimeToLiveInSeconds() != null && $options->getTimeToLiveInSeconds() <= 0) {
                $this->assertEquals(400, $e->getCode(), 'getCode');
            }
            else if ($options->getVisibilityTimeoutInSeconds() != null && $options->getTimeToLiveInSeconds() != null && $options->getVisibilityTimeoutInSeconds() > 0 && $options->getTimeToLiveInSeconds() <= $options->getVisibilityTimeoutInSeconds()) {
                $this->assertEquals(400, $e->getCode(), 'getCode');
            }
            else {
                $this->assertNull($e, 'Expect positive timeouts in $options to be fine');
            }
            // TODO: More checks to not fall out the end if in error?
        }
        $service->clearMessages($queue);
    }

    // ---------------------
    // --- updateMessage ---
    // ---------------------

    public function testUpdateMessageNoOptions() {
        // TODO: revert change when fixed
        // https://github.com/WindowsAzure/azure-sdk-for-php/issues/99
        // $interestingVisibilityTimes = array(-1, 0, QueueServiceFunctionalTestData::INTERESTING_TTL, QueueServiceFunctionalTestData::INTERESTING_TTL * 2);
        $interestingVisibilityTimes = array(-1, QueueServiceFunctionalTestData::INTERESTING_TTL, QueueServiceFunctionalTestData::INTERESTING_TTL * 2);

        $startingMessage = new CreateMessageOptions();
        
        // TODO: Revert when fixed
        // https://github.com/WindowsAzure/azure-sdk-for-php/issues/101
//        $startingMessage->setTimeout(QueueServiceFunctionalTestData::INTERESTING_TTL);

        
            // TODO: Revert when fixed
            // https://github.com/WindowsAzure/azure-sdk-for-php/issues/69
//        $startingMessage->setTimeToLiveInSeconds(QueueServiceFunctionalTestData::INTERESTING_TTL * 1.5);
        $startingMessage->setTimeToLiveInSeconds(QueueServiceFunctionalTestData::INTERESTING_TTL * 1.5 . '');

        foreach($interestingVisibilityTimes as $visibilityTimeoutInSeconds)  {
            $this->updateMessageWorker(QueueServiceFunctionalTestData::getSimpleMessageText(), $startingMessage, $visibilityTimeoutInSeconds, null);
        }
    }

    public function testUpdateMessage() {
        $interestingTimes = array(null, -1, 0, QueueServiceFunctionalTestData::INTERESTING_TTL, 1000);
        
        // TODO: revert change when fixed
        // https://github.com/WindowsAzure/azure-sdk-for-php/issues/99
        // $interestingVisibilityTimes = array(-1, 0, QueueServiceFunctionalTestData::INTERESTING_TTL, QueueServiceFunctionalTestData::INTERESTING_TTL * 2);
        $interestingVisibilityTimes = array(-1, QueueServiceFunctionalTestData::INTERESTING_TTL, QueueServiceFunctionalTestData::INTERESTING_TTL * 2);

        $startingMessage = new CreateMessageOptions();        
        // TODO: Revert when fixed
        // https://github.com/WindowsAzure/azure-sdk-for-php/issues/101
//        $startingMessage->setTimeout( QueueServiceFunctionalTestData::INTERESTING_TTL);

            // TODO: Revert when fixed
            // https://github.com/WindowsAzure/azure-sdk-for-php/issues/69
//        $startingMessage->setTimeToLiveInSeconds(QueueServiceFunctionalTestData::INTERESTING_TTL * 1.5);
        $startingMessage->setTimeToLiveInSeconds(QueueServiceFunctionalTestData::INTERESTING_TTL * 1.5 . '');

        foreach($interestingTimes as $timeout)  {
            foreach($interestingVisibilityTimes as $visibilityTimeoutInSeconds)  {
                $options = new QueueServiceOptions();
        // TODO: Revert when fixed
        // https://github.com/WindowsAzure/azure-sdk-for-php/issues/101
//                $options->setTimeout($timeout);
                $this->updateMessageWorker(QueueServiceFunctionalTestData::getSimpleMessageText(), $startingMessage, $visibilityTimeoutInSeconds, $options);
            }
        }
    }

    private function updateMessageWorker($messageText, $startingMessage, $visibilityTimeoutInSeconds, $options) {
        self::println( 'Trying $options: ' . self::tmptostring($options) . 
                ' and $visibilityTimeoutInSeconds: ' . self::tmptostring($visibilityTimeoutInSeconds));
        $queue = QueueServiceFunctionalTestData::$TEST_QUEUE_NAMES;
        $queue = $queue[0];
        $service = FunctionalTestBase::createService();

        $service->createMessage($queue, QueueServiceFunctionalTestData::getSimpleMessageText(), $startingMessage);
        $lmr = $service->listMessages($queue);
        $m = $lmr->getQueueMessages();
        $m = $m[0];

        try {
            if ($options == null) {
                $service->updateMessage($queue, $m->getMessageId(), $m->getPopReceipt(), $messageText, $visibilityTimeoutInSeconds);
            }
            else {
                $service->updateMessage($queue, $m->getMessageId(), $m->getPopReceipt(), $messageText, $visibilityTimeoutInSeconds, $options);
            }

            if ($options == null) {
                $options = new CreateMessageOptions();
            }

            if ($visibilityTimeoutInSeconds < 0) {
                $this->assertTrue(false, 'Expect negative getVisibilityTimeoutInSeconds in $options to throw');
            }
            
            // Uncomment when fixed
            // https://github.com/WindowsAzure/azure-sdk-for-php/issues/59
//            else if ($options->getTimeout() != null && $options->getTimeout() < 1) {
//                $this->assertTrue(false, 'Expect negative timeouts in $options to throw');
//            }

            // Check that the message matches
            $lmr = $service->listMessages($queue);
            if ($visibilityTimeoutInSeconds > 0) {
                $this->assertEquals(0, count($lmr->getQueueMessages()), 'getQueueMessages() count');
                sleep(QueueServiceFunctionalTestData::INTERESTING_TTL);
                // Try again, not that the 4 second visibility has passed
                $lmr = $service->listMessages($queue);
                if ($visibilityTimeoutInSeconds > QueueServiceFunctionalTestData::INTERESTING_TTL) {
                    $this->assertEquals(0, count($lmr->getQueueMessages()), 'getQueueMessages() count');
                }
                else {
                    $this->assertEquals(1, count($lmr->getQueueMessages()), 'getQueueMessages() count');
                    $qm = $lmr->getQueueMessages();
                    $qm = $qm[0];
                    $this->assertEquals($messageText, $qm->getMessageText(), '$qm->getMessageText');
                }
            }
            else {
                $this->assertEquals(1, count($lmr->getQueueMessages()), 'getQueueMessages() count');
                $qm = $lmr->getQueueMessages();
                $qm = $qm[0];
                $this->assertEquals($messageText, $qm->getMessageText(), '$qm->getMessageText');
            }

        }
        catch (ServiceException $e) {
            if ($options == null) {
                $options = new CreateMessageOptions();
            }

            // Uncomment when fixed
            // https://github.com/WindowsAzure/azure-sdk-for-php/issues/59
//            if ($options->getTimeout() != null && $options->getTimeout() < 1) {
//                $this->assertEquals(500, $e->getCode(), 'getCode');
//            }
//            else
            if ($visibilityTimeoutInSeconds < 0) {
                // Trying to pass bad metadata
                $this->assertEquals(400, $e->getCode(), 'getCode');
            }
            else {
                $this->assertNull($e, 'Expect positive timeouts in $options to be fine');
            }
        }
        $service->clearMessages($queue);
    }

    // ---------------------
    // --- deleteMessage ---
    // ---------------------

    public function testDeleteMessageNoOptions() {
        $this->deleteMessageWorker(null);
    }

    public function testDeleteMessage() {
        $interestingTimes = array(null, -1, 0, QueueServiceFunctionalTestData::INTERESTING_TTL, 1000);
        foreach($interestingTimes as $timeout)  {
            $options = new QueueServiceOptions();
            $options->setTimeout($timeout);
            $this->deleteMessageWorker($options);
        }
    }

    private function deleteMessageWorker($options) {
        self::println( 'Trying $options: ' . self::tmptostring($options));
        $queue = QueueServiceFunctionalTestData::$TEST_QUEUE_NAMES;
        $queue = $queue[0];
        $service = FunctionalTestBase::createService();

        $service->createMessage($queue, 'test');
        $opts = new ListMessagesOptions();
        $opts->setVisibilityTimeoutInSeconds(QueueServiceFunctionalTestData::INTERESTING_TTL);
        $lmr = $service->listMessages($queue, $opts);
        $m = $lmr->getQueueMessages();
        $m = $m[0];

        try {
            if ($options == null) {
                $service->deleteMessage($queue, $m->getMessageId(), $m->getPopReceipt());
            }
            else {
                $service->deleteMessage($queue, $m->getMessageId(), $m->getPopReceipt(), $options);
            }

            if ($options == null) {
                $options = new CreateMessageOptions();
            }

            // Uncomment when fixed
            // https://github.com/WindowsAzure/azure-sdk-for-php/issues/59
//            else if ($options->getTimeout() != null && $options->getTimeout() < 1) {
//                $this->assertTrue(false, 'Expect negative timeouts in $options to throw');
//            }

            // Check that the message matches
            $lmr = $service->listMessages($queue);
            $this->assertEquals(0, count($lmr->getQueueMessages()), 'getQueueMessages() count');

            // Wait until the popped message should be visible again->
            sleep(QueueServiceFunctionalTestData::INTERESTING_TTL + 1);
            // Try again, to make sure the message really is gone->
            $lmr = $service->listMessages($queue);
            $this->assertEquals(0, count($lmr->getQueueMessages()), 'getQueueMessages() count');
        }
        catch (ServiceException $e) {
            // Uncomment when fixed
            // https://github.com/WindowsAzure/azure-sdk-for-php/issues/59
//            if ($options->getTimeout() != null && $options->getTimeout() < 1) {
//                $this->assertEquals(500, $e->getCode(), 'getCode');
//            }
//            else 
               {
                $this->assertNull($e, 'Expect positive timeouts in $options to be fine');
            }
        }
        $service->clearMessages($queue);
    }

    // --------------------
    // --- listMessages ---
    // --------------------

    public function testListMessagesNoOptions() {
        $this->listMessagesWorker(new ListMessagesOptions());
    }

    public function testListMessages() {
        $interestingTimes = array(null, -1, 0, QueueServiceFunctionalTestData::INTERESTING_TTL, 1000);
        $interestingNums = array(null, -1, 0, 2, 10, 1000);
        foreach($interestingNums as $numberOfMessages)  {
            foreach($interestingTimes as $visibilityTimeoutInSeconds)  {
                $options = new ListMessagesOptions();
                $options->setNumberOfMessages($numberOfMessages);
                $options->setVisibilityTimeoutInSeconds($visibilityTimeoutInSeconds);
                $this->listMessagesWorker($options);
            }
        }

            // Uncomment when fixed:
            // https://github.com/WindowsAzure/azure-sdk-for-php/issues/59
//        foreach($interestingTimes as $timeout)  {
            $options = new ListMessagesOptions();
            
            // Uncomment when fixed:
            // https://github.com/WindowsAzure/azure-sdk-for-php/issues/59
            //            $options->setTimeout($timeout);
            
            $options->setNumberOfMessages(2);
            $options->setVisibilityTimeoutInSeconds(2);
            $this->listMessagesWorker($options);
//        }
    }

    private function listMessagesWorker($options) {
        self::println( 'Trying $options: ' . self::tmptostring($options));
        $queue = QueueServiceFunctionalTestData::$TEST_QUEUE_NAMES;
        $queue = $queue[0];
        $service = FunctionalTestBase::createService();

        // Put three messages into the queue.
        $service->createMessage($queue, QueueServiceFunctionalTestData::getSimpleMessageText());
        $service->createMessage($queue, QueueServiceFunctionalTestData::getSimpleMessageText());
        $service->createMessage($queue, QueueServiceFunctionalTestData::getSimpleMessageText());

        // Default is 1 message
        $effectiveNumOfMessages = ($options == null || $options->getNumberOfMessages() == null ? 1 : $options ->getNumberOfMessages());
        $effectiveNumOfMessages = ($effectiveNumOfMessages < 0 ? 0 : $effectiveNumOfMessages);

        // Default is 30 seconds
        $effectiveVisTimeout = ($options == null || $options->getVisibilityTimeoutInSeconds() == null ? 30 : $options ->getVisibilityTimeoutInSeconds());
        $effectiveVisTimeout = ($effectiveVisTimeout < 0 ? 0 : $effectiveVisTimeout);

        $expectedNumMessagesFirst = ($effectiveNumOfMessages > 3 ? 3 : $effectiveNumOfMessages);
        $expectedNumMessagesSecond = ($effectiveVisTimeout <= 2 ? 3 : 3 - $effectiveNumOfMessages);
        $expectedNumMessagesSecond = ($expectedNumMessagesSecond < 0 ? 0 : $expectedNumMessagesSecond);

        try {
            $res = ($options == null ? $service->listMessages($queue) : $service->listMessages($queue, $options));

            if ($options == null) {
                $options = new ListMessagesOptions();
            }

            if ($options->getVisibilityTimeoutInSeconds() != null && $options->getVisibilityTimeoutInSeconds() < 1) {
                $this->assertTrue(false, 'Expect non-positive getVisibilityTimeoutInSeconds in $options to throw');
            }
            else if ($options->getNumberOfMessages() != null && ($options->getNumberOfMessages() < 1 || $options->getNumberOfMessages() > 32)) {
                $this->assertTrue(false, 'Expect  getNumberOfMessages < 1 or 32 < numMessages in $options to throw');
            }
            // Uncomment when fixed
            // https://github.com/WindowsAzure/azure-sdk-for-php/issues/59
//            else if ($options->getTimeout() != null && $options->getTimeout() < 1) {
//                $this->assertTrue(false, 'Expect negative timeouts in $options to throw');
//            }

            $this->assertEquals($expectedNumMessagesFirst, count($res->getQueueMessages()), 'list getQueueMessages() count');
            $opts = new PeekMessagesOptions();
            $opts->setNumberOfMessages(32);
            $pres = $service->peekMessages($queue, $opts);
            $this->assertEquals(3 - $expectedNumMessagesFirst, count($pres->getQueueMessages()), 'peek getQueueMessages() count');

            // The visibilityTimeoutInSeconds controls when the requested messages will be visible again.
            // Wait 2.5 seconds to see when the messages are visible again.
            sleep(2.5);
            $opts = new ListMessagesOptions();
            $opts->setNumberOfMessages(32);
            $res2 = $service->listMessages($queue, $opts);
            $this->assertEquals($expectedNumMessagesSecond, count($res2->getQueueMessages()), 'list getQueueMessages() count');
            $opts = new PeekMessagesOptions();
            $opts->setNumberOfMessages(32);
            $pres2 = $service->peekMessages($queue, $opts);
            $this->assertEquals(0, count($pres2->getQueueMessages()), 'peek getQueueMessages() count');

            // TODO: These might get screwy if the timing gets off. Might need to use times spaces farther apart.
        }
        catch (ServiceException $e) {
            if ($options == null) {
                $options = new ListMessagesOptions();
            }

            // Uncomment when fixed
            // https://github.com/WindowsAzure/azure-sdk-for-php/issues/59
//            if ($options->getTimeout() != null && $options->getTimeout() < 1) {
//                $this->assertEquals(500, $e->getCode(), 'getCode');
//            }
            //else 
                if ($options->getVisibilityTimeoutInSeconds() != null && $options->getVisibilityTimeoutInSeconds() < 1) {
                $this->assertEquals(400, $e->getCode(), 'getCode');
            }
            else if ($options->getNumberOfMessages() != null && ($options->getNumberOfMessages() < 1 || $options->getNumberOfMessages() > 32)) {
                $this->assertEquals(400, $e->getCode(), 'getCode');
            }
            else {
                $this->assertNull($e, 'Expect positive timeouts in $options to be fine');
            }
        }
        $service->clearMessages($queue);
    }

    // --------------------
    // --- peekMessages ---
    // --------------------

    public function testPeekMessagesNoOptions() {
        $this->peekMessagesWorker(new PeekMessagesOptions());
    }

    public function testPeekMessages() {
        $interestingTimes = array(null, -1, 0, QueueServiceFunctionalTestData::INTERESTING_TTL, 1000);
        $interestingNums = array(null, -1, 0, 2, 10, 1000);
        foreach($interestingNums as $numberOfMessages)  {
            $options = new PeekMessagesOptions();
            $options->setNumberOfMessages($numberOfMessages);
            $this->peekMessagesWorker($options);
        }

            // Uncomment when fixed:
            // https://github.com/WindowsAzure/azure-sdk-for-php/issues/59
//        foreach($interestingTimes as $timeout)  {
            $options = new PeekMessagesOptions();
//            $options->setTimeout($timeout);
            $options->setNumberOfMessages(2);
            $this->peekMessagesWorker($options);
//        }
    }

    private function peekMessagesWorker($options) {
        self::println( 'Trying $options: ' . self::tmptostring($options));
        $queue = QueueServiceFunctionalTestData::$TEST_QUEUE_NAMES;
        $queue = $queue[0];
        $service = FunctionalTestBase::createService();

        // Put three messages into the queue.
        $service->createMessage($queue, QueueServiceFunctionalTestData::getSimpleMessageText());
        $service->createMessage($queue, QueueServiceFunctionalTestData::getSimpleMessageText());
        $service->createMessage($queue, QueueServiceFunctionalTestData::getSimpleMessageText());

        // Default is 1 message
        $effectiveNumOfMessages = ($options == null || $options->getNumberOfMessages() == null ? 1 : $options ->getNumberOfMessages());
        $effectiveNumOfMessages = ($effectiveNumOfMessages < 0 ? 0 : $effectiveNumOfMessages);

        $expectedNumMessagesFirst = ($effectiveNumOfMessages > 3 ? 3 : $effectiveNumOfMessages);

        try {
            $res = ($options == null ? $service->peekMessages($queue) : $service->peekMessages($queue, $options));

            if ($options == null) {
                $options = new PeekMessagesOptions();
            }

            if ($options->getNumberOfMessages() != null && ($options->getNumberOfMessages() < 1 || $options->getNumberOfMessages() > 32)) {
                $this->assertTrue(false, 'Expect  getNumberOfMessages < 1 or 32 < numMessages in $options to throw');
            }
            // Uncomment when fixed
            // https://github.com/WindowsAzure/azure-sdk-for-php/issues/59
//            else if ($options->getTimeout() != null && $options->getTimeout() < 1) {
//                $this->assertTrue(false, 'Expect negative timeouts in $options to throw');
//            }

            $this->assertEquals($expectedNumMessagesFirst, count($res->getQueueMessages()), 'getQueueMessages() count');
            $opts = new PeekMessagesOptions();
            $opts->setNumberOfMessages(32);
            $res2 = $service->peekMessages($queue, $opts);
            $this->assertEquals(3, count($res2->getQueueMessages()), 'getQueueMessages() count');
            $service->listMessages($queue);
            $opts = new PeekMessagesOptions();
            $opts->setNumberOfMessages(32);
            $res3 = $service->peekMessages($queue, $opts);
            $this->assertEquals(2, count($res3->getQueueMessages()), 'getQueueMessages() count');
        }
        catch (ServiceException $e) {
            if ($options == null) {
                $options = new PeekMessagesOptions();
            }

            // Uncomment when fixed
            // https://github.com/WindowsAzure/azure-sdk-for-php/issues/59
//            if ($options->getTimeout() != null && $options->getTimeout() < 1) {
//                $this->assertEquals(500, $e->getCode(), 'getCode');
//            }
            //else
                if ($options->getNumberOfMessages() != null && ($options->getNumberOfMessages() < 1 || $options->getNumberOfMessages() > 32)) {
                $this->assertEquals(400, $e->getCode(), 'getCode');
            }
            else {
                $this->assertNull($e, 'Expect positive timeouts in $options to be fine');
            }
            // TODO: More checks to not fall out the end if in error?
        }
        $service->clearMessages($queue);
    }

    // ---------------------
    // --- clearMessages ---
    // ---------------------

    public function testClearMessagesNoOptions() {
        $this->clearMessagesWorker(null);
    }

    public function testClearMessages() {
        $interestingTimes = array(null, -1, 0, QueueServiceFunctionalTestData::INTERESTING_TTL, 1000);
        foreach($interestingTimes as $timeout)  {
            $options = new QueueServiceOptions();
            $options->setTimeout($timeout);
            $this->clearMessagesWorker($options);
        }
    }

    private function clearMessagesWorker($options) {
        self::println( 'Trying $options: ' . 
                self::tmptostring($options));
        $queue = QueueServiceFunctionalTestData::$TEST_QUEUE_NAMES;
        $queue = $queue[0];
        $service = FunctionalTestBase::createService();

        // Put three messages into the queue.
        $service->createMessage($queue, QueueServiceFunctionalTestData::getSimpleMessageText());
        $service->createMessage($queue, QueueServiceFunctionalTestData::getSimpleMessageText());
        $service->createMessage($queue, QueueServiceFunctionalTestData::getSimpleMessageText());
        // Wait a bit to make sure the messages are there.
        sleep(1);
        // Make sure the messages are there, and use a short visibility timeout to make sure the are visible again later.
        $opts = new ListMessagesOptions();
        $opts->setVisibilityTimeoutInSeconds(1);
        $opts->setNumberOfMessages(32);
        $lmr = $service->listMessages($queue, $opts);
        $this->assertEquals(3, count($lmr->getQueueMessages()), 'getQueueMessages() count');
        sleep(2);
        try {
            if ($options == null) {
                $service->clearMessages($queue);
            }
            else {
                $service->clearMessages($queue, $options);
            }

            if ($options == null) {
                $options = new CreateMessageOptions();
            }

            // Uncomment when fixed
            // https://github.com/WindowsAzure/azure-sdk-for-php/issues/59
//            else if ($options->getTimeout() != null && $options->getTimeout() < 1) {
//                $this->assertTrue(false, 'Expect negative timeouts in $options to throw');
//            }

            // Wait 2 seconds to make sure the messages would be visible again.
            $opts = new ListMessagesOptions();
            $opts->setVisibilityTimeoutInSeconds(1);
            $opts->setNumberOfMessages(32);
            $lmr = $service->listMessages($queue, $opts);
            $this->assertEquals(0, count($lmr->getQueueMessages()), 'getQueueMessages() count');
        }
        catch (ServiceException $e) {
            if ($options == null) {
                $options = new CreateMessageOptions();
            }

            // Uncomment when fixed
            // https://github.com/WindowsAzure/azure-sdk-for-php/issues/59
//            if ($options->getTimeout() != null && $options->getTimeout() < 1) {
//                $this->assertEquals(500, $e->getCode(), 'getCode');
//            }
//            else {
             {
                $this->assertNull($e, 'Expect positive timeouts in $options to be fine');
            }
        }
        $service->clearMessages($queue);
    }
}
