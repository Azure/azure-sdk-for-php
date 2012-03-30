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

class QueueServiceFunctionalOptionsTest extends \PHPUnit_Framework_TestCase  {
    const IntegerMAX_VALUE = 2147483647;
    const IntegerMIN_VALUE = -2147483648;
    
    public function testCheckQueueServiceOptions() {
        $options = new QueueServiceOptions();
        $this->assertNull('Default QueueServiceOptions->getTimeout should be null', $options->getTimeout());
        $options->setTimeout(self::IntegerMAX_VALUE);
        $this->assertEquals('Set QueueServiceOptions->getTimeout', self::IntegerMAX_VALUE, $options->getTimeout());
    }

    public function testCheckRetentionPolicy() {
        // Check that the default values of options are reasonable

        $rp = new RetentionPolicy();
        $this->assertNull('Default RetentionPolicy->getDays should be null', $rp->getDays());
        $this->assertNull('Default RetentionPolicy->getEnabled should be null', $rp->getEnabled());
        $rp->setDays(10);
        $rp->setEnabled(true);
        $this->assertEquals('Set RetentionPolicy->getDays should be 10', 10, $rp->getDays());
        $this->assertTrue('Sett RetentionPolicy->getEnabled should be true', $rp->getEnabled());
    }

    public function testCheckLogging() {
        // Check that the default values of options are reasonable
        $rp = new RetentionPolicy();

        $l = new Logging();
        $this->assertNull('Default Logging->getRetentionPolicy should be null', $l->getRetentionPolicy());
        $this->assertNull('Default Logging->getVersion should be null', $l->getVersion());
        $this->assertNull('Default Logging->getDelete should be null', $l->getDelete());
        $this->assertNull('Default Logging->getRead should be false', $l->getRead());
        $this->assertNull('Default Logging->getWrite should be false', $l->getWrite());
        $l->setRetentionPolicy($rp);
        $l->setVersion('2.0');
        $l->setDelete(true);
        $l->setRead(true);
        $l->setWrite(true);
        
        $this->assertEquals('Set Logging->getRetentionPolicy', $rp, $l->getRetentionPolicy());
        $this->assertEquals('Set Logging->getVersion', '2.0', $l->getVersion());
        $this->assertTrue('Set Logging->getDelete should be true', $l->getDelete());
        $this->assertTrue('Set Logging->getRead should be true', $l->getRead());
        $this->assertTrue('Set Logging->getWrite should be true', $l->getWrite());
    }

    public function testCheckMetrics() {
        // Check that the default values of options are reasonable
        $rp = new RetentionPolicy();

        $m = new Metrics();
        $this->assertNull('Default Metrics->getRetentionPolicy should be null', $m->getRetentionPolicy());
        $this->assertNull('Default Metrics->getVersion should be null', $m->getVersion());
        $this->assertNull('Default Metrics->getEnabled should be false', $m->getEnabled());
        $this->assertNull('Default Metrics->getIncludeAPIs should be null', $m->getIncludeAPIs());
        $m->setRetentionPolicy($rp);
        $m->setVersion('2.0');
        $m->setEnabled(true);
        $m->setIncludeAPIs(true);
        $this->assertEquals('Set Metrics->getRetentionPolicy', $rp, $m->getRetentionPolicy());
        $this->assertEquals('Set Metrics->getVersion', '2.0', $m->getVersion());
        $this->assertTrue('Set Metrics->getEnabled should be true', $m->getEnabled());
        $this->assertTrue('Set Metrics->getIncludeAPIs should be true', $m->getIncludeAPIs());
    }

    public function testCheckServiceProperties() {
        // Check that the default values of options are reasonable
        $l = new Logging();
        $m = new Metrics();

        $sp = new ServiceProperties();
        $this->assertNull('Default ServiceProperties->getLogging should not be null', $sp->getLogging());
        $this->assertNull('Default ServiceProperties->getMetrics should not be null', $sp->getMetrics());

        $sp->setLogging($l);
        $sp->setMetrics($m);
        $this->assertEquals('Set ServiceProperties->getLogging', $sp->getLogging(), $l);
        $this->assertEquals('Set ServiceProperties->getMetrics', $sp->getMetrics(), $m);
    }

    public function testCheckListQueuesOptions() {
        $options = new ListQueuesOptions();
        $this->assertNull('Default ListQueuesOptions->getIncludeMetadata', $options->getIncludeMetadata());
        $this->assertNull('Default ListQueuesOptions->getMarker', $options->getMarker());
        $this->assertEquals('Default ListQueuesOptions->getMaxResults', 0, $options->getMaxResults());
        $this->assertNull('Default ListQueuesOptions->getPrefix', $options->getPrefix());
        $this->assertNull('Default ListQueuesOptions->getTimeout', $options->getTimeout());        
        $options->setIncludeMetadata(true);
        $options->setMarker('foo');
        // TODO: Revert this change when fixed
        // https://github.com/WindowsAzure/azure-sdk-for-php/issues/69
        // $options->setMaxResults(-10);
        $options->setMaxResults('-10');
        $options->setPrefix('bar');
        $options->setTimeout(self::IntegerMAX_VALUE);
        $this->assertTrue('Set ListQueuesOptions->getIncludeMetadata', $options->getIncludeMetadata());
        $this->assertEquals('Set ListQueuesOptions->getMarker', 'foo', $options->getMarker());
        $this->assertEquals('Set ListQueuesOptions->getMaxResults', -10, $options->getMaxResults());
        $this->assertEquals('Set ListQueuesOptions->getPrefix', 'bar', $options->getPrefix());
        $this->assertEquals('Set ListQueuesOptions->getTimeout', self::IntegerMAX_VALUE, $options->getTimeout());
    }

    public function testCheckCreateQueueOptions() {
        $options = new CreateQueueOptions();
        $this->assertNull('Default CreateQueueOptions->getMetadata', $options->getMetadata());
        $this->assertEquals('Default CreateQueueOptions->getMetadata->size', 0, count($options->getMetadata()));
        // TODO: Uncomment when fixed.
        // https://github.com/WindowsAzure/azure-sdk-for-php/issues/59
        // $this->assertNull('Default CreateQueueOptions->getTimeout', $options->getTimeout());
        $metadata = array(
            'foo' => 'bar',
            'baz' => 'bat',
        );
        $options->setMetadata($metadata);
        // TODO: Uncomment when fixed.
        // https://github.com/WindowsAzure/azure-sdk-for-php/issues/59
        //$options->setTimeout(-10);
        $this->assertEquals('Set CreateQueueOptions->getMetadata', $options->getMetadata(), $metadata);
        $this->assertEquals('Set CreateQueueOptions->getMetadata->size', 2, count($options->getMetadata()));
        // TODO: Uncomment when fixed.
        // https://github.com/WindowsAzure/azure-sdk-for-php/issues/59
        // $this->assertEquals('Set CreateQueueOptions->getTimeout', -10, $options->getTimeout());
        $options->addMetadata('aaa', 'bbb');
        $this->assertEquals('Set CreateQueueOptions->getMetadata->size', 3, count($options->getMetadata()));
    }

    public function testCheckCreateMessageOptions() {
        $options = new CreateMessageOptions();
        // TODO: Uncomment when fixed.
        // https://github.com/WindowsAzure/azure-sdk-for-php/issues/59
        // $this->assertNull('Default CreateMessageOptions->getTimeout', $options->getTimeout());
        $this->assertNull('Default CreateMessageOptions->getTimeToLiveInSeconds', $options->getTimeToLiveInSeconds());
        $this->assertNull('Default CreateMessageOptions->getVisibilityTimeoutInSeconds', $options->getVisibilityTimeoutInSeconds());
        // TODO: Uncomment when fixed.
        // https://github.com/WindowsAzure/azure-sdk-for-php/issues/59
        // $options->setTimeout(self::IntegerMAX_VALUE);
        $options->setTimeToLiveInSeconds(0);
        $options->setVisibilityTimeoutInSeconds(self::IntegerMIN_VALUE);
        // TODO: Uncomment when fixed.
        // https://github.com/WindowsAzure/azure-sdk-for-php/issues/59
        // $this->assertEquals('Set CreateMessageOptions->getTimeout', self::IntegerMAX_VALUE, $options->getTimeout());
        $this->assertEquals('Set CreateMessageOptions->getTimeToLiveInSeconds', 0, $options->getTimeToLiveInSeconds());
        $this->assertEquals('Set CreateMessageOptions->getVisibilityTimeoutInSeconds', self::IntegerMIN_VALUE, $options->getVisibilityTimeoutInSeconds());
    }

    public function testCheckListMessagesOptions() {
        $options = new ListMessagesOptions();
        // TODO: Uncomment when fixed.
        // https://github.com/WindowsAzure/azure-sdk-for-php/issues/59
        // $this->assertNull('Default ListMessagesOptions->getTimeout', $options->getTimeout());
        $this->assertNull('Default ListMessagesOptions->getNumberOfMessages', $options->getNumberOfMessages());
        $this->assertNull('Default ListMessagesOptions->getVisibilityTimeoutInSeconds', $options->getVisibilityTimeoutInSeconds());
        // TODO: Uncomment when fixed.
        // https://github.com/WindowsAzure/azure-sdk-for-php/issues/59
        // $options->setTimeout(self::IntegerMAX_VALUE);
        $options->setNumberOfMessages(0);
        $options->setVisibilityTimeoutInSeconds(self::IntegerMIN_VALUE);
        // TODO: Uncomment when fixed.
        // https://github.com/WindowsAzure/azure-sdk-for-php/issues/59
        // $this->assertEquals('Set ListMessagesOptions->getTimeout', self::IntegerMAX_VALUE, $options->getTimeout());
        $this->assertEquals('Set ListMessagesOptions->getNumberOfMessages', 0, $options->getNumberOfMessages());
        $this->assertEquals('Set ListMessagesOptions->getVisibilityTimeoutInSeconds', self::IntegerMIN_VALUE, $options->getVisibilityTimeoutInSeconds());
    }

    public function testCheckPeekMessagesOptions() {
        $options = new PeekMessagesOptions();
        // TODO: Uncomment when fixed.
        // https://github.com/WindowsAzure/azure-sdk-for-php/issues/59
        // $this->assertNull('Default PeekMessagesOptions->getTimeout', $options->getTimeout());
        $this->assertNull('Default PeekMessagesOptions->getNumberOfMessages', $options->getNumberOfMessages());
        // TODO: Uncomment when fixed.
        // https://github.com/WindowsAzure/azure-sdk-for-php/issues/59
        // $options->setTimeout(self::IntegerMAX_VALUE);
        $options->setNumberOfMessages(0);
        // TODO: Uncomment when fixed.
        // https://github.com/WindowsAzure/azure-sdk-for-php/issues/59
        // $this->assertEquals('Set PeekMessagesOptions->getTimeout', self::IntegerMAX_VALUE, $options->getTimeout());
        $this->assertEquals('Set PeekMessagesOptions->getNumberOfMessages', 0, $options->getNumberOfMessages());
    }

    public static function assertNotNull($msg, $obj) {
        parent::assertNotNull($obj, $msg);
    }
    public static function assertNull($msg, $obj) {
        parent::assertNull($obj, $msg);
    }
    public static function assertTrue($msg, $obj) {
        parent::assertTrue($obj, $msg);
    }
    public static function assertFalse($msg, $obj) {
        parent::assertFalse($obj, $msg);
    }
    public static function assertEquals($msg, $obj1, $obj2) {
        parent::assertEquals($obj1, $obj2, $msg);
    }     
}
