<?php

namespace ext\microsoft\windowsazure\services\queue;

use PEAR2\WindowsAzure\Services\Core\Models\RetentionPolicy;
use PEAR2\WindowsAzure\Services\Core\Models\Logging;
use PEAR2\WindowsAzure\Services\Core\Models\Metrics;
use PEAR2\WindowsAzure\Services\Core\Models\ServiceProperties;
use PEAR2\WindowsAzure\Services\Queue\Models\ListQueuesOptions;
use PEAR2\WindowsAzure\Services\Queue\Models\ListQueuesResult;
use PEAR2\WindowsAzure\Services\Queue\Models\CreateQueueOptions;
use PEAR2\WindowsAzure\Services\Queue\Models\ListMessagesOptions;
use PEAR2\WindowsAzure\Services\Queue\Models\PeekMessagesOptions;
use PEAR2\WindowsAzure\Services\Queue\Models\QueueServiceOptions;
use PEAR2\WindowsAzure\Services\Queue\Models\CreateMessageOptions;

class QueueServiceFunctionalTestClasses {
    const IntegerMAX_VALUE = 2147483647;
    const IntegerMIN_VALUE = -2147483648;
    
    public function checkQueueServiceOptions() {
        $options = new QueueServiceOptions();
        Assert::assertNull("Default QueueServiceOptions->getTimeout should be null", $options->getTimeout());
        $options->setTimeout(QueueServiceFunctionalTestClasses::IntegerMAX_VALUE);
        Assert::assertEquals("Set QueueServiceOptions->getTimeout", QueueServiceFunctionalTestClasses::IntegerMAX_VALUE, $options->getTimeout());
    }

    public function checkRetentionPolicy() {
        // Check that the default values of options are reasonable

        $rp = new RetentionPolicy();
        Assert::assertNull("Default RetentionPolicy->getDays should be null", $rp->getDays());
        Assert::assertFalse("Default RetentionPolicy->getEnabled should be false", $rp->getEnabled());
        $rp->setDays(10);
        $rp->setEnabled(true);
        Assert::assertEquals("Set RetentionPolicy->getDays should be 10", 10, $rp->getDays());
        Assert::assertTrue("Sett RetentionPolicy->getEnabled should be true", $rp->getEnabled());
    }

    public function checkLogging() {
        // Check that the default values of options are reasonable
        $rp = new RetentionPolicy();

        $l = new Logging();
        Assert::assertNull("Default Logging->getRetentionPolicy should be null", $l->getRetentionPolicy());
        Assert::assertNull("Default Logging->getVersion should be null", $l->getVersion());
        Assert::assertNull("Default Logging->getDelete should be null", $l->getDelete());
        Assert::assertFalse("Default Logging->getRead should be false", $l->getRead());
        Assert::assertFalse("Default Logging->getWrite should be false", $l->getWrite());
        $l->setRetentionPolicy($rp);
        $l->setVersion("2.0");
        $l->setDelete(true);
        $l->setRead(true);
        $l->setWrite(true);
        
        Assert::assertEquals("Set Logging->getRetentionPolicy", $rp, $l->getRetentionPolicy());
        Assert::assertEquals("Set Logging->getVersion", "2.0", $l->getVersion());
        Assert::assertTrue("Set Logging->getDelete should be true", $l->getDelete());
        Assert::assertTrue("Set Logging->getRead should be true", $l->getRead());
        Assert::assertTrue("Set Logging->getWrite should be true", $l->getWrite());
    }

    public function checkMetrics() {
        // Check that the default values of options are reasonable
        $rp = new RetentionPolicy();

        $m = new Metrics();
        Assert::assertNull("Default Metrics->getRetentionPolicy should be null", $m->getRetentionPolicy());
        Assert::assertNull("Default Metrics->getVersion should be null", $m->getVersion());
        Assert::assertFalse("Default Metrics->getEnabled should be false", $m->getEnabled());
        Assert::assertNull("Default Metrics->getIncludeAPIs should be null", $m->getIncludeAPIs());
        $m->setRetentionPolicy($rp);
        $m->setVersion("2.0");
        $m->setEnabled(true);
        $m->setIncludeAPIs(true);
        Assert::assertEquals("Set Metrics->getRetentionPolicy", $rp, $m->getRetentionPolicy());
        Assert::assertEquals("Set Metrics->getVersion", "2.0", $m->getVersion());
        Assert::assertTrue("Set Metrics->getEnabled should be true", $m->getEnabled());
        Assert::assertTrue("Set Metrics->getIncludeAPIs should be true", $m->getIncludeAPIs());
    }

    public function checkServiceProperties() {
        // Check that the default values of options are reasonable
        $l = new Logging();
        $m = new Metrics();

        $sp = new ServiceProperties();
        Assert::assertNull("Default ServiceProperties->getLogging should not be null", $sp->getLogging());
        Assert::assertNull("Default ServiceProperties->getMetrics should not be null", $sp->getMetrics());

        $sp->setLogging($l);
        $sp->setMetrics($m);
        Assert::assertEquals("Set ServiceProperties->getLogging", $sp->getLogging(), $l);
        Assert::assertEquals("Set ServiceProperties->getMetrics", $sp->getMetrics(), $m);
    }

    public function checkListQueuesOptions() {
        $options = new ListQueuesOptions();
        Assert::assertFalse("Default ListQueuesOptions->getIncludeMetadata", $options->getIncludeMetadata());
        Assert::assertNull("Default ListQueuesOptions->getMarker", $options->getMarker());
        Assert::assertEquals("Default ListQueuesOptions->getMaxResults", 0, $options->getMaxResults());
        Assert::assertNull("Default ListQueuesOptions->getPrefix", $options->getPrefix());
        Assert::assertNull("Default ListQueuesOptions->getTimeout", $options->getTimeout());        
        $options->setIncludeMetadata(true);
        $options->setMarker("foo");
        // TODO: Revert this change when fixed
        // https://github.com/WindowsAzure/azure-sdk-for-php/issues/69
        // $options->setMaxResults(-10);
        $options->setMaxResults("-10");
        $options->setPrefix("bar");
        $options->setTimeout(QueueServiceFunctionalTestClasses::IntegerMAX_VALUE);
        Assert::assertTrue("Set ListQueuesOptions->getIncludeMetadata", $options->getIncludeMetadata());
        Assert::assertEquals("Set ListQueuesOptions->getMarker", "foo", $options->getMarker());
        Assert::assertEquals("Set ListQueuesOptions->getMaxResults", -10, $options->getMaxResults());
        Assert::assertEquals("Set ListQueuesOptions->getPrefix", "bar", $options->getPrefix());
        Assert::assertEquals("Set ListQueuesOptions->getTimeout", QueueServiceFunctionalTestClasses::IntegerMAX_VALUE, $options->getTimeout());
    }

    public function checkCreateQueueOptions() {
        $options = new CreateQueueOptions();
        Assert::assertNull("Default CreateQueueOptions->getMetadata", $options->getMetadata());
        Assert::assertEquals("Default CreateQueueOptions->getMetadata->size", 0, count($options->getMetadata()));
        // TODO: Uncomment when fixed.
        // https://github.com/WindowsAzure/azure-sdk-for-php/issues/59
        // Assert::assertNull("Default CreateQueueOptions->getTimeout", $options->getTimeout());
        $metadata = array(
            "foo" => "bar",
            "baz" => "bat",
        );
        $options->setMetadata($metadata);
        // TODO: Uncomment when fixed.
        // https://github.com/WindowsAzure/azure-sdk-for-php/issues/59
        //$options->setTimeout(-10);
        Assert::assertEquals("Set CreateQueueOptions->getMetadata", $options->getMetadata(), $metadata);
        Assert::assertEquals("Set CreateQueueOptions->getMetadata->size", 2, count($options->getMetadata()));
        // TODO: Uncomment when fixed.
        // https://github.com/WindowsAzure/azure-sdk-for-php/issues/59
        // Assert::assertEquals("Set CreateQueueOptions->getTimeout", -10, $options->getTimeout());
        $options->addMetadata("aaa", "bbb");
        Assert::assertEquals("Set CreateQueueOptions->getMetadata->size", 3, count($options->getMetadata()));
    }

    public function checkCreateMessageOptions() {
        $options = new CreateMessageOptions();
        // TODO: Uncomment when fixed.
        // https://github.com/WindowsAzure/azure-sdk-for-php/issues/59
        // Assert::assertNull("Default CreateMessageOptions->getTimeout", $options->getTimeout());
        Assert::assertNull("Default CreateMessageOptions->getTimeToLiveInSeconds", $options->getTimeToLiveInSeconds());
        Assert::assertNull("Default CreateMessageOptions->getVisibilityTimeoutInSeconds", $options->getVisibilityTimeoutInSeconds());
        // TODO: Uncomment when fixed.
        // https://github.com/WindowsAzure/azure-sdk-for-php/issues/59
        // $options->setTimeout(QueueServiceFunctionalTestClasses::IntegerMAX_VALUE);
        $options->setTimeToLiveInSeconds(0);
        $options->setVisibilityTimeoutInSeconds(QueueServiceFunctionalTestClasses::IntegerMIN_VALUE);
        // TODO: Uncomment when fixed.
        // https://github.com/WindowsAzure/azure-sdk-for-php/issues/59
        // Assert::assertEquals("Set CreateMessageOptions->getTimeout", QueueServiceFunctionalTestClasses::IntegerMAX_VALUE, $options->getTimeout());
        Assert::assertEquals("Set CreateMessageOptions->getTimeToLiveInSeconds", 0, $options->getTimeToLiveInSeconds());
        Assert::assertEquals("Set CreateMessageOptions->getVisibilityTimeoutInSeconds", QueueServiceFunctionalTestClasses::IntegerMIN_VALUE, $options->getVisibilityTimeoutInSeconds());
    }

    public function checkListMessagesOptions() {
        $options = new ListMessagesOptions();
        // TODO: Uncomment when fixed.
        // https://github.com/WindowsAzure/azure-sdk-for-php/issues/59
        // Assert::assertNull("Default ListMessagesOptions->getTimeout", $options->getTimeout());
        Assert::assertNull("Default ListMessagesOptions->getNumberOfMessages", $options->getNumberOfMessages());
        Assert::assertNull("Default ListMessagesOptions->getVisibilityTimeoutInSeconds", $options->getVisibilityTimeoutInSeconds());
        // TODO: Uncomment when fixed.
        // https://github.com/WindowsAzure/azure-sdk-for-php/issues/59
        // $options->setTimeout(QueueServiceFunctionalTestClasses::IntegerMAX_VALUE);
        $options->setNumberOfMessages(0);
        $options->setVisibilityTimeoutInSeconds(QueueServiceFunctionalTestClasses::IntegerMIN_VALUE);
        // TODO: Uncomment when fixed.
        // https://github.com/WindowsAzure/azure-sdk-for-php/issues/59
        // Assert::assertEquals("Set ListMessagesOptions->getTimeout", QueueServiceFunctionalTestClasses::IntegerMAX_VALUE, $options->getTimeout());
        Assert::assertEquals("Set ListMessagesOptions->getNumberOfMessages", 0, $options->getNumberOfMessages());
        Assert::assertEquals("Set ListMessagesOptions->getVisibilityTimeoutInSeconds", QueueServiceFunctionalTestClasses::IntegerMIN_VALUE, $options->getVisibilityTimeoutInSeconds());
    }

    public function checkPeekMessagesOptions() {
        $options = new PeekMessagesOptions();
        // TODO: Uncomment when fixed.
        // https://github.com/WindowsAzure/azure-sdk-for-php/issues/59
        // Assert::assertNull("Default PeekMessagesOptions->getTimeout", $options->getTimeout());
        Assert::assertNull("Default PeekMessagesOptions->getNumberOfMessages", $options->getNumberOfMessages());
        // TODO: Uncomment when fixed.
        // https://github.com/WindowsAzure/azure-sdk-for-php/issues/59
        // $options->setTimeout(QueueServiceFunctionalTestClasses::IntegerMAX_VALUE);
        $options->setNumberOfMessages(0);
        // TODO: Uncomment when fixed.
        // https://github.com/WindowsAzure/azure-sdk-for-php/issues/59
        // Assert::assertEquals("Set PeekMessagesOptions->getTimeout", QueueServiceFunctionalTestClasses::IntegerMAX_VALUE, $options->getTimeout());
        Assert::assertEquals("Set PeekMessagesOptions->getNumberOfMessages", 0, $options->getNumberOfMessages());
    }
}
