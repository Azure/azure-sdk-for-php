<?php

namespace ext\microsoft\windowsazure\services\queue;

use PEAR2\WindowsAzure\Services\Core\Models\RetentionPolicy;
use PEAR2\WindowsAzure\Services\Core\Models\Logging;
use PEAR2\WindowsAzure\Services\Core\Models\Metrics;
use PEAR2\WindowsAzure\Services\Core\Models\ServiceProperties;
use PEAR2\WindowsAzure\Services\Queue\Models\QueueServiceOptions;
use PEAR2\WindowsAzure\Services\Queue\Models\ListQueuesOptions;
use PEAR2\WindowsAzure\Services\Queue\Models\CreateQueueOptions;
use PEAR2\WindowsAzure\Services\Queue\Models\CreateMessageOptions;
use PEAR2\WindowsAzure\Services\Queue\Models\ListMessagesOptions;
use PEAR2\WindowsAzure\Services\Queue\Models\PeekMessagesOptions;
use \LogicException;
use \HTTP_Request2_LogicException;
use PEAR2\WindowsAzure\Core\ServiceException;

class QueueServiceFunctionalTest extends FunctionalTestBase {
    // ----------------------------
    // --- getServiceProperties ---
    // ----------------------------

    public function getServicePropertiesNoOptions() {
        if (FunctionalTestBase::isRunningWithEmulator()) {
            FunctionalTestBase::println('Cannot run this test in the emulator, as v1.6 does not support service properties.'); 
            return;
        }
        
        $service = FunctionalTestBase::createService();
        $serviceProperties = QueueServiceFunctionalTestData::getDefaultServiceProperties();
        $service->setServiceProperties($serviceProperties);
        $this->getServicePropertiesWorker($service, null);
    }

    public function getServiceProperties() {
        if (FunctionalTestBase::isRunningWithEmulator()) {
            FunctionalTestBase::println('Cannot run this test in the emulator, as v1.6 does not support service properties.'); 
            return;
        }
        
        $service = FunctionalTestBase::createService();
        $serviceProperties = QueueServiceFunctionalTestData::getDefaultServiceProperties();
        $service->setServiceProperties($serviceProperties);

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
        FunctionalTestBase::println( 'Trying $options: ' . FunctionalTestBase::tostring($options));
        $effOptions = ($options == null ? new QueueServiceOptions() : $options);
        try {
            $ret = ($options == null ? $service->getServiceProperties() : $service->getServiceProperties($options));
            // TODO: Revert when fixed
            // https://github.com/WindowsAzure/azure-sdk-for-php/issues/101
            // if ($effOptions->getTimeout() != null && $effOptions->getTimeout() < 1) {
            if ($effOptions->getTimeout() != null && $effOptions->getTimeout() < 0) {
                Assert::assertTrue('Expect negative timeouts in $options to throw', false);
            }
            $this->verifyServicePropertiesWorker($ret, null);
        }
        catch (ServiceException $e) {
            if ($effOptions->getTimeout() == null || $effOptions->getTimeout() >= 1) {
                Assert::assertNull('Expect positive timeouts in $options to be fine', $e);
            }
            else {
                Assert::assertEquals('getCode', 500, $e->getCode());
            }
        }
    }

    private function verifyServicePropertiesWorker($ret, $serviceProperties) {
        if ($serviceProperties == null) {
            $serviceProperties = QueueServiceFunctionalTestData::getDefaultServiceProperties();
        }

        $sp = $ret->getValue();
        Assert::assertNotNull('getValue should be non-null', $sp);

        $l = $sp->getLogging();
        Assert::assertNotNull('getValue()->getLogging() should be non-null', $l);
        Assert::assertEquals('getValue()->getLogging()->getVersion', $serviceProperties->getLogging()->getVersion(), $l->getVersion());
        Assert::assertEquals('getValue()->getLogging()->getDelete', $serviceProperties->getLogging()->getDelete(), $l->getDelete());
        Assert::assertEquals('getValue()->getLogging()->getRead', $serviceProperties->getLogging()->getRead(), $l->getRead());
        Assert::assertEquals('getValue()->getLogging()->getWrite', $serviceProperties->getLogging()->getWrite(), $l->getWrite());

        $r = $l->getRetentionPolicy();
        Assert::assertNotNull('getValue()->getLogging()->getRetentionPolicy should be non-null', $r);
        Assert::assertEquals('getValue()->getLogging()->getRetentionPolicy()->getDays', $serviceProperties->getLogging() ->getRetentionPolicy()->getDays(), $r->getDays());

        $m = $sp->getMetrics();
        Assert::assertNotNull('getValue()->getMetrics() should be non-null', $m);
        Assert::assertEquals('getValue()->getMetrics()->getVersion', $serviceProperties->getMetrics()->getVersion(), $m->getVersion());
        Assert::assertEquals('getValue()->getMetrics()->getEnabled', $serviceProperties->getMetrics()->getEnabled(), $m->getEnabled());
        Assert::assertEquals('getValue()->getMetrics()->getIncludeAPIs', $serviceProperties->getMetrics()->getIncludeAPIs(), $m->getIncludeAPIs());

        $r = $m->getRetentionPolicy();
        Assert::assertNotNull('getValue()->getMetrics()->getRetentionPolicy should be non-null', $r);
        Assert::assertEquals('getValue()->getMetrics()->getRetentionPolicy()->getDays', $serviceProperties->getMetrics() ->getRetentionPolicy()->getDays(), $r->getDays());
    }

    // ----------------------------
    // --- setServiceProperties ---
    // ----------------------------

    public function setServicePropertiesNoOptions() {
        $service = FunctionalTestBase::createService();
        $serviceProperties = QueueServiceFunctionalTestData::getDefaultServiceProperties();
        $this->setServicePropertiesWorker($service, $serviceProperties, null);
    }

    public function setServiceProperties() {
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
        FunctionalTestBase::println( 'Trying $options: ' . 
                FunctionalTestBase::tostring($options) . ' and $serviceProperties' .
                FunctionalTestBase::tostring($serviceProperties));
        
        if (FunctionalTestBase::isRunningWithEmulator()) {
            FunctionalTestBase::println('Cannot run this test in the emulator, as v1.6 does not support service properties.'); 
            return;
        }

        try {
            if ($options == null) {
                $service->setServiceProperties($serviceProperties);
            } else {
                $service->setServiceProperties($serviceProperties, $options);
            }
            
            if ($options == null) {
                $options = new QueueServiceOptions();
            }

            // TODO: Revert when fixed
            // https://github.com/WindowsAzure/azure-sdk-for-php/issues/101
            // if ($options->getTimeout() != null && $options->getTimeout() < 1) {
            if ($options->getTimeout() != null && $options->getTimeout() < 0) {
                Assert::assertTrue('Expect negative timeouts in $options to throw', false);
            }

            $ret = ($options == null ? $service->getServiceProperties() : $service->getServiceProperties($options));

            $this->verifyServicePropertiesWorker($ret, $serviceProperties);
        }
        catch (ServiceException $e) {
            if ($options == null) {
                $options = new QueueServiceOptions();
            }

            if ($options->getTimeout() != null && $options->getTimeout() < 1) {
                Assert::assertEquals('getCode', 500, $e->getCode());
            }
            else {
                Assert::assertNull('Expect positive timeouts in $options to be fine', $e);
            }
        }
    }

    // ------------------
    // --- listQueues ---
    // ------------------

    public function listQueuesNoOptions() {
        $service = FunctionalTestBase::createService();
        $this->listQueuesWorker($service, null);
    }

    public function listQueues() {
        $service = FunctionalTestBase::createService();
        $interestingListQueuesOptions = QueueServiceFunctionalTestData::getInterestingListQueuesOptions();
        foreach($interestingListQueuesOptions as $options)  {
            $this->listQueuesWorker($service, $options);
        }
    }

    private function listQueuesWorker($service, $options) {
        FunctionalTestBase::println( 'Trying $options: ' . FunctionalTestBase::tostring($options));
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
//                    Assert::assertTrue('Expect negative timeouts ' . $options->getTimeout() . ' in $options to throw', false);
//                }
                $this->verifyListQueuesWorker($ret, $options);

                if (strlen($ret->getNextMarker()) == 0) {
                    FunctionalTestBase::println('Done with this loop');
                    $finished = true;
                }
                else {
                    FunctionalTestBase::println('Cycling to get the next marker: ' . $ret->getNextMarker());
                    $options->setMarker($ret->getNextMarker());
                }
            }
            catch (ServiceException $e) {
                $finished = true;
                if ($options->getTimeout() == null || $options->getTimeout() >= 1) {
                    Assert::assertNull('Expect positive timeouts in $options to be fine', $e);
                }
                else {
                    Assert::assertEquals('getCode', 500, $e->getCode());
                }
            }
        }
    }

    private function verifyListQueuesWorker($ret, $options) {
        // Uncomment when fixed
        // https://github.com/WindowsAzure/azure-sdk-for-php/issues/98
        //Assert::assertEquals('getAccountName', $accountName, $ret->getAccountName());
        
        // Cannot really check the next marker. Just make sure it is not null.
        Assert::assertNotNull('getNextMarker', $ret->getNextMarker());
        Assert::assertEquals('getMarker', $options->getMarker(), $ret->getMarker());
        Assert::assertEquals('getMaxResults', $options->getMaxResults(), $ret->getMaxResults());
        Assert::assertEquals('getPrefix', $options->getPrefix(), $ret->getPrefix());

        Assert::assertNotNull('getQueues', $ret->getQueues());
         
        if ($options->getMaxResults() == 0) {
            Assert::assertEquals(
                    'When MaxResults is 0, expect getNextMarker (' . 
                    $ret->getNextMarker() . ')to be have length 0', 
                    '', strlen($ret->getNextMarker()));

            if ($options->getPrefix() != null && $options->getPrefix() == QueueServiceFunctionalTestData::$nonExistQueuePrefix) {
                Assert::assertEquals('when MaxResults=0 and Prefix=(\'' . $options->getPrefix() . '\'), then Queues->length', 0, count($ret->getQueues()));
            }
            else if ($options->getPrefix() != null && $options->getPrefix() == QueueServiceFunctionalTestData::$testUniqueId) {
                Assert::assertEquals('when MaxResults=0 and Prefix=(\'' . $options->getPrefix() . '\'), then count Queues', count(QueueServiceFunctionalTestData::$TEST_QUEUE_NAMES), count($ret->getQueues()));
            }
            else {
                // Don't know how many there should be
            }
        }
        else if (strlen($ret->getNextMarker()) == 0) {
            Assert::assertTrue('when NextMarker (\'' . $ret->getNextMarker() . '\')==\'\', Queues->length (' . count($ret->getQueues()) . ') should be <= MaxResults (' . $options->getMaxResults() . ')', count($ret ->getQueues()) <= $options->getMaxResults());

            if ($options->getPrefix() != null && $options->getPrefix() == QueueServiceFunctionalTestData::$nonExistQueuePrefix) {
                Assert::assertEquals('when no next marker and Prefix=(\'' . $options->getPrefix() . '\'), then Queues->length', 0, count($ret->getQueues()));
            }
            else if ($options->getPrefix() != null && $options->getPrefix() == QueueServiceFunctionalTestData::$testUniqueId) {
                // Need to futz with the mod because you are allowed to get MaxResults items returned->
                Assert::assertEquals('when no next marker and Prefix=(\'' . $options->getPrefix() . '\'), then Queues->length', count(QueueServiceFunctionalTestData::$TEST_QUEUE_NAMES) % $options->getMaxResults(), count($ret ->getQueues()) % $options->getMaxResults());
            }
            else {
                // Don't know how many there should be
            }
        }
        else {
            Assert::assertEquals('when NextMarker (' . $ret->getNextMarker() .
                    ')!=\'\', Queues->length (' . count($ret->getQueues()) . 
                    ') should be == MaxResults (' . $options->getMaxResults() . ')', 
                    count($ret ->getQueues()), 
                    $options->getMaxResults());

            if ($options->getPrefix() != null && $options->getPrefix() == (QueueServiceFunctionalTestData::$nonExistQueuePrefix)) {
                Assert::assertTrue('when a next marker and Prefix=(\'' . $options->getPrefix() . '\'), impossible', false);
            }
        }

        // TODO: Need to verify the queue content?
    }

    // -------------------
    // --- createQueue --- 
    // -------------------  

    public function createQueueNoOptions() {
        $service = FunctionalTestBase::createService();
        $this->createQueueWorker($service, null);
    }

    public function createQueue() {
        $service = FunctionalTestBase::createService();
        $interestingCreateQueueOptions = QueueServiceFunctionalTestData::getInterestingCreateQueueOptions();
        foreach($interestingCreateQueueOptions as $options)  {
            $this->createQueueWorker($service, $options);
        }
    }

    private function createQueueWorker($service, $options) {
        FunctionalTestBase::println( 'Trying $options: ' . FunctionalTestBase::tostring($options));
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
//                Assert::assertTrue('Expect negative timeouts in $options to throw', false);
//            }

            // Now check that the queue was created correctly.

            // Make sure that the list of all applicable queues is correctly updated.
            $opts = new ListQueuesOptions();
            $opts->setPrefix(QueueServiceFunctionalTestData::$testUniqueId);
            $qs = $service->listQueues($opts);
            Assert::assertEquals('After adding one, with Prefix=(\'' . QueueServiceFunctionalTestData::$testUniqueId . '\'), then Queues->length', count($qs->getQueues()), (count(QueueServiceFunctionalTestData::$TEST_QUEUE_NAMES) + 1));

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
//                Assert::assertNull('Expect positive timeouts in $options to be fine', $e);
//            }
//            else 
                {
                Assert::assertEquals('getCode', 500, $e->getCode());
            }
        }
        if ($created) {
            $service->deleteQueue($queue);
        }
    }

    private function verifyCreateQueueWorker($ret, $options) {
        FunctionalTestBase::println( 'Trying $options: ' . 
                FunctionalTestBase::tostring($options) . ' and ret ' .
                FunctionalTestBase::tostring($ret));
        if ($options == null) {
            $options = QueueServiceFunctionalTestData::getInterestingCreateQueueOptions();
            $options = $options[0];
        }

        if ($options->getMetadata() == null) {
            Assert::assertNotNull('queue Metadata', $ret->getMetadata());
            Assert::assertEquals('queue Metadata count', 0, count($ret->getMetadata()));
        }
        else {
            Assert::assertNotNull('queue Metadata', $ret->getMetadata());
            Assert::assertEquals('Metadata', count($options->getMetadata()), count($ret->getMetadata()));
            $om = $options->getMetadata();
            $rm = $ret->getMetadata();
            foreach(array_keys($options->getMetadata()) as $key)  {
                Assert::assertEquals('Metadata(' . $key . ')', $om[$key], $rm[$key]);
            }
        }
        // TODO: Need to verify the queue content?
    }

    // -------------------
    // --- deleteQueue ---
    // -------------------

    public function deleteQueueNoOptions() {
        $service = FunctionalTestBase::createService();
        $this->deleteQueueWorker($service, null);
    }

    public function deleteQueue() {
        $service = FunctionalTestBase::createService();
        $interestingTimeouts = QueueServiceFunctionalTestData::getInterestingTimeoutValues();
        foreach($interestingTimeouts as $timeout)  {
            $options = new QueueServiceOptions();
            $options->setTimeout($timeout);
            $this->deleteQueueWorker($service, $options);
        }
    }

    private function deleteQueueWorker($service, $options) {
        FunctionalTestBase::println( 'Trying $options: ' . FunctionalTestBase::tostring($options));
        $queue = QueueServiceFunctionalTestData::getInterestingQueueName();

        // Make sure there is something to delete.
        $service->createQueue($queue);

        // Make sure that the list of all applicable queues is correctly updated.
        $opts = new ListQueuesOptions();
        $opts->setPrefix(QueueServiceFunctionalTestData::$testUniqueId);
        $qs = $service->listQueues($opts);
        Assert::assertEquals('After adding one, with Prefix=(\'' . QueueServiceFunctionalTestData::$testUniqueId . '\'), then Queues->length', count($qs->getQueues()), (count(QueueServiceFunctionalTestData::$TEST_QUEUE_NAMES) + 1));

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
//                Assert::assertTrue('Expect negative timeouts in $options to throw', false);
//            }

            // Make sure that the list of all applicable queues is correctly updated.
            $opts = new ListQueuesOptions();
            $opts->setPrefix(QueueServiceFunctionalTestData::$testUniqueId);
            $qs = $service->listQueues($opts);
            Assert::assertEquals('After adding then deleting one, with Prefix=(\'' . QueueServiceFunctionalTestData::$testUniqueId . '\'), then Queues->length', count($qs->getQueues()), count(QueueServiceFunctionalTestData::$TEST_QUEUE_NAMES));

            // Nothing else interesting to check for the options.
        }
        catch (ServiceException $e) {
            // Uncomment when fixed
            // https://github.com/WindowsAzure/azure-sdk-for-php/issues/59
//            if ($options->getTimeout() == null || $options->getTimeout() >= 1) {
//                Assert::assertNull('Expect positive timeouts in $options to be fine', $e);
//            }
//            else
            {
                Assert::assertEquals('getCode', 500, $e->getCode());
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

    public function getQueueMetadataNoOptions() {
        $service = FunctionalTestBase::createService();
        $interestingMetadata = QueueServiceFunctionalTestData::getNiceMetadata();
        foreach ($interestingMetadata as $metadata) {
            $this->getQueueMetadataWorker($service, null, $metadata);
        }
    }

    public function getQueueMetadata() {
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
        FunctionalTestBase::println( 'Trying $options: ' . 
                FunctionalTestBase::tostring($options) . ' and $metadata: ' .
                FunctionalTestBase::tostring($metadata));
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
//                Assert::assertTrue('Expect negative timeouts in $options to throw', false);
//            }

            $this->verifyGetSetQueueMetadataWorker($res, $metadata);
        }
        catch (ServiceException $e) {
            // Uncomment when fixed
            // https://github.com/WindowsAzure/azure-sdk-for-php/issues/59
//            if ($options->getTimeout() == null || $options->getTimeout() >= 1) {
//                Assert::assertNull('Expect positive timeouts in $options to be fine', $e);
//            }
//            else
            {
                Assert::assertEquals('getCode', 500, $e->getCode());
            }
        }
        // Clean up->
        $service->deleteQueue($queue);
    }

    private function verifyGetSetQueueMetadataWorker($ret, $metadata) {
        Assert::assertNotNull('queue Metadata', $ret->getMetadata());
        if ($metadata == null) {
            Assert::assertEquals('Metadata', 0, count($ret->getMetadata()));
            Assert::assertEquals('getApproximateMessageCount', 0, $ret->getApproximateMessageCount());
        }
        else {
            Assert::assertEquals('Metadata', count($metadata), count($ret->getMetadata()));
            $rm =$ret->getMetadata();
            foreach(array_keys($metadata) as $key)  {
                Assert::assertEquals('Metadata(' . $key . ')', $metadata[$key], $rm[$key]);
            }

            // Hard to test "approximate", so just verify that it is in the expected range
            Assert::assertTrue('0 <= getApproximateMessageCount (' . 
                    $ret->getApproximateMessageCount() . ') <= $metadata count (' . count($metadata) . ')', 
                            (0 <= $ret->getApproximateMessageCount()) && ($ret->getApproximateMessageCount() <= count($metadata)));
        }
    }

    // ------------------------
    // --- setQueueMetadata ---
    // ------------------------

    public function setQueueMetadataNoOptions() {
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

    public function setQueueMetadata() {
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
        FunctionalTestBase::println( 'Trying $options: ' . 
                FunctionalTestBase::tostring($options) . ' and $metadata: ' .
                FunctionalTestBase::tostring($metadata));
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
//                Assert::assertTrue('Expect negative timeouts in $options to throw', false);
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
////                Assert::assertEquals('getCode', 500, $e->getCode());
////            }
//            else {
//                Assert::assertNull('Expect positive timeouts in $options to be fine', $e);
//            }
//        }
        // Clean up.
        $service->deleteQueue($queue);
    }

    // ---------------------
    // --- createMessage ---
    // ---------------------

    public function createMessageEmpty() {
        $this->createMessageWorker('', QueueServiceFunctionalTestData::getSimpleCreateMessageOptions());
    }

    public function createMessageUnicodeMessage() {
        $this->createMessageWorker('Some unicode: \uB2E4\uB974\uB2E4\uB294\u0625 \u064A\u062F\u064A\u0648', QueueServiceFunctionalTestData::getSimpleCreateMessageOptions());
    }

    public function createMessageXmlMessage() {
        $this->createMessageWorker('Some HTML: <this><is></a>', QueueServiceFunctionalTestData::getSimpleCreateMessageOptions());
    }

    public function createMessageWithSmallTTL() {
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
        Assert::assertEquals('getQueueMessages() count', 0, count($lmr->getQueueMessages()));
        sleep(6);
        // Try again, passed the VisibilityTimeout has passed, but also the 4 second TTL has passed.
        $lmr = $service->listMessages($queue);

        Assert::assertEquals('getQueueMessages() count', 0, count($lmr->getQueueMessages()));

        $service->clearMessages($queue);
    }

    public function createMessage() {
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
        FunctionalTestBase::println( 'Trying $options: ' . 
                FunctionalTestBase::tostring($options));
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
                Assert::assertTrue('Expect negative getVisibilityTimeoutInSeconds in $options to throw', false);
            }
            // Uncomment when fixed
            // https://github.com/WindowsAzure/azure-sdk-for-php/issues/101
//            else if ($options->getTimeToLiveInSeconds() != null && $options->getTimeToLiveInSeconds() <= 0) {
            else if ($options->getTimeToLiveInSeconds() != null && $options->getTimeToLiveInSeconds() < 0) {
                Assert::assertTrue('Expect negative getVisibilityTimeoutInSeconds in $options to throw', false);
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
//                Assert::assertTrue('Expect getTimeToLiveInSeconds() <= getVisibilityTimeoutInSeconds in $options to throw', false);
//            }
            
            // Uncomment when fixed
            // https://github.com/WindowsAzure/azure-sdk-for-php/issues/59
//            else if ($options->getTimeout() != null && $options->getTimeout() < 1) {
//                Assert::assertTrue('Expect negative timeouts in $options to throw', false);
//            }

            // Check that the message matches
            $lmr = $service->listMessages($queue);
            if ($options->getVisibilityTimeoutInSeconds() != null && $options->getVisibilityTimeoutInSeconds() > 0) {
                Assert::assertEquals('getQueueMessages() count', 0, count($lmr->getQueueMessages()));
                sleep(QueueServiceFunctionalTestData::INTERESTING_TTL);
                // Try again, not that the 4 second visibility has passed
                $lmr = $service->listMessages($queue);
                if ($options->getVisibilityTimeoutInSeconds() > QueueServiceFunctionalTestData::INTERESTING_TTL) {
                    Assert::assertEquals('getQueueMessages() count', 0, count($lmr->getQueueMessages()));
                }
                else {
                    Assert::assertEquals('getQueueMessages() count', 1, count($lmr->getQueueMessages()));
                    $qm = $lmr->getQueueMessages();
                    $qm = $qm[0];
                    Assert::assertEquals('$qm->getMessageText', $messageText, $qm->getMessageText());
                }
            }
            else {
                Assert::assertEquals('getQueueMessages() count', 1, count($lmr->getQueueMessages()));
                $qm = $lmr->getQueueMessages();
                $qm = $qm[0];
                Assert::assertEquals('$qm->getMessageText', $messageText, $qm->getMessageText());
            }

        }
        catch (ServiceException $e) {
            // Uncomment when fixed
            // https://github.com/WindowsAzure/azure-sdk-for-php/issues/59
//            if ($options->getTimeout() != null && $options->getTimeout() < 1) {
//                Assert::assertEquals('getCode', 500, $e->getCode());
//            }
//            else
            if ($options->getVisibilityTimeoutInSeconds() != null && $options->getVisibilityTimeoutInSeconds() < 0) {
                // Trying to pass bad metadata
                Assert::assertEquals('getCode', 400, $e->getCode());
                // TODO: Can check more?
            }
            else if ($options->getTimeToLiveInSeconds() != null && $options->getTimeToLiveInSeconds() <= 0) {
                Assert::assertEquals('getCode', 400, $e->getCode());
            }
            else if ($options->getVisibilityTimeoutInSeconds() != null && $options->getTimeToLiveInSeconds() != null && $options->getVisibilityTimeoutInSeconds() > 0 && $options->getTimeToLiveInSeconds() <= $options->getVisibilityTimeoutInSeconds()) {
                Assert::assertEquals('getCode', 400, $e->getCode());
            }
            else {
                Assert::assertNull('Expect positive timeouts in $options to be fine', $e);
            }
            // TODO: More checks to not fall out the end if in error?
        }
        $service->clearMessages($queue);
    }

    // ---------------------
    // --- updateMessage ---
    // ---------------------

    public function updateMessageNoOptions() {
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

    public function updateMessage() {
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
        FunctionalTestBase::println( 'Trying $options: ' . 
                FunctionalTestBase::tostring($options) . ' and $visibilityTimeoutInSeconds: ' .
                FunctionalTestBase::tostring($visibilityTimeoutInSeconds));
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
                Assert::assertTrue('Expect negative getVisibilityTimeoutInSeconds in $options to throw', false);
            }
            //            // TODO: Commented out because this error condition (specified by the $service)
            //            // is not getting triggered-> These tests are for the client code, not the $service->
            //            // Filed issue https://github->com/WindowsAzure/azure-sdk-for-java-pr/issues/207
            //            else if ($visibilityTimeoutInSeconds > 0
            //                    && $startingMessage->getTimeToLiveInSeconds() <= $visibilityTimeoutInSeconds) {
            //                // According to http://msdn->microsoft->com/en-us/library/windowsazure/hh452234->aspx
            //                //     visibilitytimeout - 
            //                // Required-> Specifies the new visibility timeout value, in seconds, 
            //                // relative to server time-> The new value must be larger than or equal to 0, 
            //                // and cannot be larger than 7 days-> The visibility timeout of a message 
            //                // cannot be set to a value later than the expiry time-> A message can be 
            //                // updated until it has been deleted or has expired->
            //                Assert::assertTrue(
            //                        'Expect $startingMessage->getTimeToLiveInSeconds(' . $startingMessage->getTimeToLiveInSeconds()
            //                                . ') <= getVisibilityTimeoutInSeconds (' . visibilityTimeoutInSeconds
            //                                . ') in $options to throw', false);
            //            }

            
            // Uncomment when fixed
            // https://github.com/WindowsAzure/azure-sdk-for-php/issues/59
//            else if ($options->getTimeout() != null && $options->getTimeout() < 1) {
//                Assert::assertTrue('Expect negative timeouts in $options to throw', false);
//            }

            // Check that the message matches
            $lmr = $service->listMessages($queue);
            if ($visibilityTimeoutInSeconds > 0) {
                Assert::assertEquals('getQueueMessages() count', 0, count($lmr->getQueueMessages()));
                sleep(QueueServiceFunctionalTestData::INTERESTING_TTL);
                // Try again, not that the 4 second visibility has passed
                $lmr = $service->listMessages($queue);
                if ($visibilityTimeoutInSeconds > QueueServiceFunctionalTestData::INTERESTING_TTL) {
                    Assert::assertEquals('getQueueMessages() count', 0, count($lmr->getQueueMessages()));
                }
                else {
                    Assert::assertEquals('getQueueMessages() count', 1, count($lmr->getQueueMessages()));
                    $qm = $lmr->getQueueMessages();
                    $qm = $qm[0];
                    Assert::assertEquals('$qm->getMessageText', $messageText, $qm->getMessageText());
                }
            }
            else {
                Assert::assertEquals('getQueueMessages() count', 1, count($lmr->getQueueMessages()));
                $qm = $lmr->getQueueMessages();
                $qm = $qm[0];
                Assert::assertEquals('$qm->getMessageText', $messageText, $qm->getMessageText());
            }

        }
        catch (ServiceException $e) {
            if ($options == null) {
                $options = new CreateMessageOptions();
            }

            // Uncomment when fixed
            // https://github.com/WindowsAzure/azure-sdk-for-php/issues/59
//            if ($options->getTimeout() != null && $options->getTimeout() < 1) {
//                Assert::assertEquals('getCode', 500, $e->getCode());
//                // TODO: Anything else interesting to check here?
//            }
//            else
            if ($visibilityTimeoutInSeconds < 0) {
                // Trying to pass bad metadata
                Assert::assertEquals('getCode', 400, $e->getCode());
            }
            //            // TODO: Commented out because this error condition (specified by the $service)
            //            // is not getting triggered-> These tests are for the client code, not the $service->
            //            // Filed issue https://github->com/WindowsAzure/azure-sdk-for-java-pr/issues/207
            //            else if ($visibilityTimeoutInSeconds > 0
            //                    && $startingMessage->getTimeToLiveInSeconds() <= $visibilityTimeoutInSeconds) {
            //                Assert::assertEquals('getCode', 400, $e->getCode());
            //            }
            else {
                // Expect server to handle validation
                // Tracked by:  https://github->com/WindowsAzure/azure-sdk-for-java-pr/issues/204
                Assert::assertNull('Expect positive timeouts in $options to be fine', $e);
            }
        }
        $service->clearMessages($queue);
    }

    // ---------------------
    // --- deleteMessage ---
    // ---------------------

    public function deleteMessageNoOptions() {
        $this->deleteMessageWorker(null);
    }

    public function deleteMessage() {
        $interestingTimes = array(null, -1, 0, QueueServiceFunctionalTestData::INTERESTING_TTL, 1000);
        foreach($interestingTimes as $timeout)  {
            $options = new QueueServiceOptions();
            $options->setTimeout($timeout);
            $this->deleteMessageWorker($options);
        }
    }

    private function deleteMessageWorker($options) {
        FunctionalTestBase::println( 'Trying $options: ' . 
                FunctionalTestBase::tostring($options));
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
//                Assert::assertTrue('Expect negative timeouts in $options to throw', false);
//            }

            // Check that the message matches
            $lmr = $service->listMessages($queue);
            Assert::assertEquals('getQueueMessages() count', 0, count($lmr->getQueueMessages()));

            // Wait until the popped message should be visible again->
            sleep(QueueServiceFunctionalTestData::INTERESTING_TTL + 1);
            // Try again, to make sure the message really is gone->
            $lmr = $service->listMessages($queue);
            Assert::assertEquals('getQueueMessages() count', 0, count($lmr->getQueueMessages()));
        }
        catch (ServiceException $e) {
            // Uncomment when fixed
            // https://github.com/WindowsAzure/azure-sdk-for-php/issues/59
//            if ($options->getTimeout() != null && $options->getTimeout() < 1) {
//                Assert::assertEquals('getCode', 500, $e->getCode());
//            }
//            else 
               {
                // Expect server to handle validation
                // Tracked by:  https://github->com/WindowsAzure/azure-sdk-for-java-pr/issues/204
                Assert::assertNull('Expect positive timeouts in $options to be fine', $e);
            }
        }
        $service->clearMessages($queue);
    }

    // --------------------
    // --- listMessages ---
    // --------------------

    public function listMessagesNoOptions() {
        $this->listMessagesWorker(new ListMessagesOptions());
    }

    public function listMessages() {
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
        FunctionalTestBase::println( 'Trying $options: ' . 
                FunctionalTestBase::tostring($options));
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
                Assert::assertTrue('Expect non-positive getVisibilityTimeoutInSeconds in $options to throw', false);
            }
            else if ($options->getNumberOfMessages() != null && ($options->getNumberOfMessages() < 1 || $options->getNumberOfMessages() > 32)) {
                Assert::assertTrue('Expect  getNumberOfMessages < 1 or 32 < numMessages in $options to throw', false);
            }
            // Uncomment when fixed
            // https://github.com/WindowsAzure/azure-sdk-for-php/issues/59
//            else if ($options->getTimeout() != null && $options->getTimeout() < 1) {
//                Assert::assertTrue('Expect negative timeouts in $options to throw', false);
//            }

            Assert::assertEquals('list getQueueMessages() count', $expectedNumMessagesFirst, count($res->getQueueMessages()));
            $opts = new PeekMessagesOptions();
            $opts->setNumberOfMessages(32);
            $pres = $service->peekMessages($queue, $opts);
            Assert::assertEquals('peek getQueueMessages() count', 3 - $expectedNumMessagesFirst, count($pres->getQueueMessages()));

            // The visibilityTimeoutInSeconds controls when the requested messages will be visible again.
            // Wait 2.5 seconds to see when the messages are visible again.
            sleep(2.5);
            $opts = new ListMessagesOptions();
            $opts->setNumberOfMessages(32);
            $res2 = $service->listMessages($queue, $opts);
            Assert::assertEquals('list getQueueMessages() count', $expectedNumMessagesSecond, count($res2->getQueueMessages()));
            $opts = new PeekMessagesOptions();
            $opts->setNumberOfMessages(32);
            $pres2 = $service->peekMessages($queue, $opts);
            Assert::assertEquals('peek getQueueMessages() count', 0, count($pres2->getQueueMessages()));

            // TODO: These might get screwy if the timing gets off. Might need to use times spaces farther apart.
        }
        catch (ServiceException $e) {
            if ($options == null) {
                $options = new ListMessagesOptions();
            }

            // Uncomment when fixed
            // https://github.com/WindowsAzure/azure-sdk-for-php/issues/59
//            if ($options->getTimeout() != null && $options->getTimeout() < 1) {
//                Assert::assertEquals('getCode', 500, $e->getCode());
//            }
            //else 
                if ($options->getVisibilityTimeoutInSeconds() != null && $options->getVisibilityTimeoutInSeconds() < 1) {
                Assert::assertEquals('getCode', 400, $e->getCode());
            }
            else if ($options->getNumberOfMessages() != null && ($options->getNumberOfMessages() < 1 || $options->getNumberOfMessages() > 32)) {
                Assert::assertEquals('getCode', 400, $e->getCode());
            }
            else {
                Assert::assertNull('Expect positive timeouts in $options to be fine', $e);
            }
        }
        $service->clearMessages($queue);
    }

    // --------------------
    // --- peekMessages ---
    // --------------------

    public function peekMessagesNoOptions() {
        $this->peekMessagesWorker(new PeekMessagesOptions());
    }

    public function peekMessages() {
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
        FunctionalTestBase::println( 'Trying $options: ' . 
                FunctionalTestBase::tostring($options));
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
                Assert::assertTrue('Expect  getNumberOfMessages < 1 or 32 < numMessages in $options to throw', false);
            }
            // Uncomment when fixed
            // https://github.com/WindowsAzure/azure-sdk-for-php/issues/59
//            else if ($options->getTimeout() != null && $options->getTimeout() < 1) {
//                Assert::assertTrue('Expect negative timeouts in $options to throw', false);
//            }

            Assert::assertEquals('getQueueMessages() count', $expectedNumMessagesFirst, count($res->getQueueMessages()));
            $opts = new PeekMessagesOptions();
            $opts->setNumberOfMessages(32);
            $res2 = $service->peekMessages($queue, $opts);
            Assert::assertEquals('getQueueMessages() count', 3, count($res2->getQueueMessages()));
            $service->listMessages($queue);
            $opts = new PeekMessagesOptions();
            $opts->setNumberOfMessages(32);
            $res3 = $service->peekMessages($queue, $opts);
            Assert::assertEquals('getQueueMessages() count', 2, count($res3->getQueueMessages()));
        }
        catch (ServiceException $e) {
            if ($options == null) {
                $options = new PeekMessagesOptions();
            }

            // Uncomment when fixed
            // https://github.com/WindowsAzure/azure-sdk-for-php/issues/59
//            if ($options->getTimeout() != null && $options->getTimeout() < 1) {
//                Assert::assertEquals('getCode', 500, $e->getCode());
//                // TODO: Anything else interesting to check here?
//            }
            //else
                if ($options->getNumberOfMessages() != null && ($options->getNumberOfMessages() < 1 || $options->getNumberOfMessages() > 32)) {
                Assert::assertEquals('getCode', 400, $e->getCode());
            }
            else {
                Assert::assertNull('Expect positive timeouts in $options to be fine', $e);
            }
            // TODO: More checks to not fall out the end if in error?
        }
        $service->clearMessages($queue);
    }

    // ---------------------
    // --- clearMessages ---
    // ---------------------

    public function clearMessagesNoOptions() {
        $this->clearMessagesWorker(null);
    }

    public function clearMessages() {
        $interestingTimes = array(null, -1, 0, QueueServiceFunctionalTestData::INTERESTING_TTL, 1000);
        foreach($interestingTimes as $timeout)  {
            $options = new QueueServiceOptions();
            $options->setTimeout($timeout);
            $this->clearMessagesWorker($options);
        }
    }

    private function clearMessagesWorker($options) {
        FunctionalTestBase::println( 'Trying $options: ' . 
                FunctionalTestBase::tostring($options));
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
        Assert::assertEquals('getQueueMessages() count', 3, count($lmr->getQueueMessages()));
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
//                Assert::assertTrue('Expect negative timeouts in $options to throw', false);
//            }

            // Wait 2 seconds to make sure the messages would be visible again.
            $opts = new ListMessagesOptions();
            $opts->setVisibilityTimeoutInSeconds(1);
            $opts->setNumberOfMessages(32);
            $lmr = $service->listMessages($queue, $opts);
            Assert::assertEquals('getQueueMessages() count', 0, count($lmr->getQueueMessages()));
        }
        catch (ServiceException $e) {
            if ($options == null) {
                $options = new CreateMessageOptions();
            }

            // Uncomment when fixed
            // https://github.com/WindowsAzure/azure-sdk-for-php/issues/59
//            if ($options->getTimeout() != null && $options->getTimeout() < 1) {
//                Assert::assertEquals('getCode', 500, $e->getCode());
//            }
//            else {
             {
                Assert::assertNull('Expect positive timeouts in $options to be fine', $e);
            }
        }
        $service->clearMessages($queue);
    }

}
