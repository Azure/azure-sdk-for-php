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
 * @package    Tests\Functional\WindowsAzure\Blob
 * @author     Jason Cooke <jcooke@microsoft.com>
 * @copyright  2012 Microsoft Corporation
 * @license    http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link       http://pear.php.net/package/azure-sdk-for-php
 */

namespace Tests\Functional\WindowsAzure\Blob;

use WindowsAzure\Common\Internal\Utilities;
use WindowsAzure\Common\ServiceException;
use WindowsAzure\Common\Internal\Resources;
use WindowsAzure\Common\Configuration;
use WindowsAzure\Common\Models\Logging;
use WindowsAzure\Common\Models\Metrics;
use WindowsAzure\Common\Models\RetentionPolicy;
use WindowsAzure\Common\Models\ServiceProperties;

use WindowsAzure\Blob\Models\BlobServiceOptions;
use WindowsAzure\Blob\Models\GetServicePropertiesResult;
use WindowsAzure\Blob\Models\ListBlobsOptions;
use WindowsAzure\Blob\Models\ListBlobsResult;
use WindowsAzure\Blob\Models\ListContainersOptions;
use WindowsAzure\Blob\Models\ListContainersResult;
use WindowsAzure\Blob\Models\CreateContainerOptions;
use WindowsAzure\Blob\Models\DeleteContainerOptions;
use WindowsAzure\Blob\Models\AccessCondition;
use WindowsAzure\Blob\Models\SetContainerMetadataOptions;
use WindowsAzure\Blob\Models\ContainerAcl;
use WindowsAzure\Blob\BlobSettings;
use WindowsAzure\Blob\Models\PublicAccessType;

class BlobServiceFunctionalTest extends FunctionalTestBase {
    /**
     * @covers WindowsAzure\Blob\Internal\BlobRestProxy::getServiceProperties
     */
    public function testGetServicePropertiesNoOptions() {
        $serviceProperties = BlobServiceFunctionalTestData::getDefaultServiceProperties();
        $shouldReturn = false;
        try {
            $this->wrapper->setServiceProperties($serviceProperties);
            $this->assertFalse(Configuration::isEmulated(), 'Should succeed when not running in emulator');
        } catch (ServiceException $e) {
            // Expect failure in emulator, as v1.6 doesn't support this method
            if (Configuration::isEmulated()) {
                $this->assertEquals(400, $e->getCode(), 'getCode');
                $shouldReturn = true;
            } else {
                throw $e;
            }
        }
        if($shouldReturn) {
            return;
        }

        $this->getServicePropertiesWorker(null);
    }

    /**
     * @covers WindowsAzure\Blob\Internal\BlobRestProxy::getServiceProperties
     */
    public function testGetServiceProperties() {
        $serviceProperties = BlobServiceFunctionalTestData::getDefaultServiceProperties();

        $shouldReturn = false;
        try {
            $this->wrapper->setServiceProperties($serviceProperties);
            $this->assertFalse(Configuration::isEmulated(), 'Should succeed when not running in emulator');
        } catch (ServiceException $e) {
            // Expect failure in emulator, as v1.6 doesn't support this method
            if (Configuration::isEmulated()) {
                $this->assertEquals(400, $e->getCode(), 'getCode');
                $shouldReturn = true;
            } else {
                throw $e;
            }
        }
        if($shouldReturn) {
            return;
        }

        // Now look at the combos.
        $interestingTimeouts = BlobServiceFunctionalTestData::getInterestingTimeoutValues();
        foreach($interestingTimeouts as $timeout)  {
            $options = new BlobServiceOptions();
            $options->setTimeout($timeout);
            $this->getServicePropertiesWorker($options);
        }
    }

    /**
     * @covers WindowsAzure\Blob\Internal\BlobRestProxy::getServiceProperties
     */
    private function getServicePropertiesWorker($options) {
        $effOptions = (is_null($options) ? new BlobServiceOptions() : $options);
        try {
            $ret = (is_null($options) ? $this->wrapper->getServiceProperties() : $this->wrapper->getServiceProperties($effOptions));

            if (!is_null($effOptions->getTimeout()) && $effOptions->getTimeout() < 1) {
                $this->True('Expect negative timeouts in $options to throw', false);
            } else {
                $this->assertFalse(Configuration::isEmulated(), 'Should succeed when not running in emulator');
            }
            $this->verifyServicePropertiesWorker($ret, null);
        }
        catch (ServiceException $e) {
            if (Configuration::isEmulated()) {
                if (!is_null($options->getTimeout()) && $options->getTimeout() < 1) {
                    $this->assertEquals(500, $e->getCode(), 'getCode');
                } else {
                    // Expect failure in emulator, as v1.6 doesn't support this method
                    $this->assertEquals(400, $e->getCode(), 'getCode');
                }
            } else {
                if (is_null($effOptions->getTimeout()) || $effOptions->getTimeout() >= 1) {
                    throw $e;
                }
                else {
                    $this->assertEquals(500, $e->getCode(), 'getCode');
                }
            }
        }
    }

    private function verifyServicePropertiesWorker($ret, $serviceProperties) {
        if (is_null($serviceProperties)) {
            $serviceProperties = BlobServiceFunctionalTestData::getDefaultServiceProperties();
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
        $this->assertEquals($serviceProperties->getLogging()->getRetentionPolicy()->getDays(), $r->getDays(), 'getValue()->getLogging()->getRetentionPolicy()->getDays');

        $m = $sp->getMetrics();
        $this->assertNotNull($m, 'getValue()->getMetrics() should be non-null');
        $this->assertEquals($serviceProperties->getMetrics()->getVersion(), $m->getVersion(), 'getValue()->getMetrics()->getVersion');
        $this->assertEquals($serviceProperties->getMetrics()->getEnabled(), $m->getEnabled(), 'getValue()->getMetrics()->getEnabled');
        $this->assertEquals($serviceProperties->getMetrics()->getIncludeAPIs(), $m->getIncludeAPIs(), 'getValue()->getMetrics()->getIncludeAPIs');

        $r = $m->getRetentionPolicy();
        $this->assertNotNull($r, 'getValue()->getMetrics()->getRetentionPolicy should be non-null');
        $this->assertEquals($serviceProperties->getMetrics()->getRetentionPolicy()->getDays(), $r->getDays(), 'getValue()->getMetrics()->getRetentionPolicy()->getDays');
    }

    /**
     * @covers WindowsAzure\Blob\Internal\BlobRestProxy::getServiceProperties
     * @covers WindowsAzure\Blob\Internal\BlobRestProxy::setServiceProperties
     */
    public function testSetServicePropertiesNoOptions() {
        $serviceProperties = BlobServiceFunctionalTestData::getDefaultServiceProperties();
        $this->setServicePropertiesWorker($serviceProperties, null);
    }

    /**
     * @covers WindowsAzure\Blob\Internal\BlobRestProxy::getServiceProperties
     * @covers WindowsAzure\Blob\Internal\BlobRestProxy::setServiceProperties
     */
    public function testSetServiceProperties() {
        $interestingServiceProperties = BlobServiceFunctionalTestData::getInterestingServiceProperties();
        foreach($interestingServiceProperties as $serviceProperties)  {
            $interestingTimeouts = BlobServiceFunctionalTestData::getInterestingTimeoutValues();
            foreach($interestingTimeouts as $timeout)  {
                $options = new BlobServiceOptions();
                $options->setTimeout($timeout);
                $this->setServicePropertiesWorker($serviceProperties, $options);
            }
        }

        if (!Configuration::isEmulated()) {
            $this->wrapper->setServiceProperties($interestingServiceProperties[0]);
        }
    }

    /**
     * @covers WindowsAzure\Blob\Internal\BlobRestProxy::getServiceProperties
     * @covers WindowsAzure\Blob\Internal\BlobRestProxy::setServiceProperties
     */
    private function setServicePropertiesWorker($serviceProperties, $options) {
        try {
            if (is_null($options)) {
                $this->wrapper->setServiceProperties($serviceProperties);
            } else {
                $this->wrapper->setServiceProperties($serviceProperties, $options);
            }

            if (is_null($options)) {
                $options = new BlobServiceOptions();
            }

            if (!is_null($options->getTimeout()) && $options->getTimeout() < 1) {
                $this->assertTrue(false, 'Expect negative timeouts in $options to throw');
            } else {
                $this->assertFalse(Configuration::isEmulated(), 'Should succeed when not running in emulator');
            }

            $ret = (is_null($options) ? $this->wrapper->getServiceProperties() : $this->wrapper->getServiceProperties($options));
            $this->verifyServicePropertiesWorker($ret, $serviceProperties);
        } catch (ServiceException $e) {
            if (is_null($options)) {
                $options = new BlobServiceOptions();
            }

            if (Configuration::isEmulated()) {
                if (!is_null($options->getTimeout()) && $options->getTimeout() < 1) {
                    $this->assertEquals(500, $e->getCode(), 'getCode');
                } else {
                    $this->assertEquals(400, $e->getCode(), 'getCode');
                }
            } else {
                if (!is_null($options->getTimeout()) && $options->getTimeout() < 1) {
                    $this->assertEquals(500, $e->getCode(), 'getCode');
                } else {
                    throw $e;
                }
            }
        }
    }

    /**
     * @covers WindowsAzure\Blob\Internal\BlobRestProxy::listContainers
     */
    public function testListContainersNoOptions() {
        $this->listContainersWorker(null);
    }

    /**
     * @covers WindowsAzure\Blob\Internal\BlobRestProxy::listContainers
     */
    public function testListContainers() {
        $interestingListContainersOptions = BlobServiceFunctionalTestData::getInterestingListContainersOptions();
        foreach($interestingListContainersOptions as $options)  {
            $this->listContainersWorker($options);
        }
    }

    /**
     * @covers WindowsAzure\Blob\Internal\BlobRestProxy::listContainers
     */
    private function listContainersWorker($options) {
        $finished = false;
        while (!$finished) {
            try {
                $ret = ($options === null ? $this->wrapper->listContainers() : $this->wrapper->listContainers($options));

                if ($options === null) {
                    $options = new ListContainersOptions();
                }

                if ($options->getTimeout() !== null && $options->getTimeout() < 1) {
                    $this->assertTrue(false, 'Expect negative timeouts in $options to throw');
                }
                $this->verifyListContainersWorker($ret, $options);

                if (strlen($ret->getNextMarker()) == 0) {
                    $finished = true;
                }
                else {
                    $options->setMarker($ret->getNextMarker());
                }
            }
            catch (ServiceException $e) {
                $finished = true;
                if ($options->getTimeout() === null || $options->getTimeout() >= 1) {
                    throw $e;
                }
                else {
                    $this->assertEquals(500, $e->getCode(), 'getCode');
                }
            }
        }
    }

    private function verifyListContainersWorker($ret, $options) {
        // Cannot really check the next marker. Just make sure it is not null.
        $this->assertEquals($options->getMarker(), $ret->getMarker(), 'getMarker');
        $this->assertEquals($options->getMaxResults(), $ret->getMaxResults(), 'getMaxResults');
        $this->assertEquals($options->getPrefix(), $ret->getPrefix(), 'getPrefix');

        $this->assertNotNull($ret->getContainers(), 'getBlobs');
        if ($options->getMaxResults() == 0) {
            $this->assertEquals(0, strlen($ret->getNextMarker()), 'When MaxResults is 0, expect getNextMarker (' . strlen($ret->getNextMarker()) . ')to be  ');

            if ($options->getPrefix() !== null && $options->getPrefix() == (BlobServiceFunctionalTestData::$nonExistBlobPrefix)) {
                $this->assertEquals(0, count($ret->getContainers()), 'when MaxResults=0 and Prefix=(\'' . $options->getPrefix() . '\'), then Blobs length');
            }
            else if ($options->getPrefix() !== null && $options->getPrefix() == (BlobServiceFunctionalTestData::$testUniqueId)) {
                $this->assertEquals(count(BlobServiceFunctionalTestData::$TEST_CONTAINER_NAMES), count($ret->getContainers()), 'when MaxResults=0 and Prefix=(\'' . $options->getPrefix() . '\'), then Blobs length');
            }
            else {
                // Don"t know how many there should be
            }
        }
        else if (strlen($ret->getNextMarker()) == 0) {
            $this->assertTrue(count($ret->getContainers()) <= $options->getMaxResults(), 'when NextMarker (\'' . $ret->getNextMarker() . '\')==\'\', Blobs length (' . count($ret->getContainers()) . ') should be <= MaxResults (' . $options->getMaxResults() . ')');

            if (BlobServiceFunctionalTestData::$nonExistBlobPrefix == $options->getPrefix()) {
                $this->assertEquals(0, count($ret->getContainers()), 'when no next marker and Prefix=(\'' . $options->getPrefix() . '\'), then Blobs length');
            }
            else if (BlobServiceFunctionalTestData::$testUniqueId ==$options->getPrefix()) {
                // Need to futz with the mod because you are allowed to get MaxResults items returned.
                $expectedCount = count(BlobServiceFunctionalTestData::$TEST_CONTAINER_NAMES) % $options->getMaxResults();
                if (!Configuration::isEmulated()) {
                    $expectedCount += 1;
                }
                $this->assertEquals(
                        $expectedCount, 
                        count($ret->getContainers()),
                        'when no next marker and Prefix=(\'' . $options->getPrefix() . '\'), then Blobs length');
            }
            else {
                // Don"t know how many there should be
            }
        }
        else {
            $this->assertEquals(
                    count($ret->getContainers()), 
                    $options->getMaxResults(), 
                    'when NextMarker (' . $ret->getNextMarker() . ')!=\'\', Blobs length (' . count($ret->getContainers()) . ') should be == MaxResults (' . $options->getMaxResults() . ')');

            if ($options->getPrefix() !== null && $options->getPrefix() == BlobServiceFunctionalTestData::$nonExistBlobPrefix) {
                $this->assertTrue(false, 'when a next marker and Prefix=(\'' . $options->getPrefix() . '\'), impossible');
            }
        }

    }

    /**
     * @covers WindowsAzure\Blob\Internal\BlobRestProxy::createContainer
     * @covers WindowsAzure\Blob\Internal\BlobRestProxy::deleteContainer
     * @covers WindowsAzure\Blob\Internal\BlobRestProxy::getContainerMetadata
     * @covers WindowsAzure\Blob\Internal\BlobRestProxy::listContainers
     */
    public function testCreateContainerNoOptions() {
        $this->createContainerWorker(null);
    }

    /**
     * @covers WindowsAzure\Blob\Internal\BlobRestProxy::createContainer
     * @covers WindowsAzure\Blob\Internal\BlobRestProxy::deleteContainer
     * @covers WindowsAzure\Blob\Internal\BlobRestProxy::getContainerMetadata
     * @covers WindowsAzure\Blob\Internal\BlobRestProxy::listContainers
     */
    public function testCreateContainer() {
        $interestingCreateContainerOptions = BlobServiceFunctionalTestData::getInterestingCreateContainerOptions();
        foreach($interestingCreateContainerOptions as $options)  {
            $this->createContainerWorker($options);
        }
    }

    /**
     * @covers WindowsAzure\Blob\Internal\BlobRestProxy::createContainer
     * @covers WindowsAzure\Blob\Internal\BlobRestProxy::deleteContainer
     * @covers WindowsAzure\Blob\Internal\BlobRestProxy::getContainerMetadata
     * @covers WindowsAzure\Blob\Internal\BlobRestProxy::listContainers
     */
    private function createContainerWorker($options) {
        $container = BlobServiceFunctionalTestData::getInterestingContainerName();
        $created = false;

        try {
            if ($options === null) {
                $this->wrapper->createContainer($container);
            }
            else {
                $this->wrapper->createContainer($container, $options);
            }
            $created = true;

            if ($options === null) {
                $options = new CreateContainerOptions();
            }

            if ($options->getTimeout() !== null && $options->getTimeout() < 1) {
                $this->assertTrue(false, 'Expect negative timeouts in $options to throw');
            }

            // Now check that the $container was $created correctly.

            // Make sure that the list of all applicable containers is correctly updated.
            $opts = new ListContainersOptions();
            $opts->setPrefix(BlobServiceFunctionalTestData::$testUniqueId);
            $qs = $this->wrapper->listContainers($opts);
            $this->assertEquals(count($qs->getContainers()), count(BlobServiceFunctionalTestData::$TEST_CONTAINER_NAMES) + 1, 'After adding one, with Prefix=(\'' . BlobServiceFunctionalTestData::$testUniqueId . '\'), then Containers length');

            // Check the metadata on the container
            $ret = $this->wrapper->getContainerMetadata($container);
            $this->verifyCreateContainerWorker($ret, $options);
            $this->wrapper->deleteContainer($container);
        }
        catch (ServiceException $e) {
            if ($options === null) {
                $options = new CreateContainerOptions();
            }
            
            if ($options->getTimeout() === null || $options->getTimeout() >= 1) {
                throw $e;
            }
            else {
                $this->assertEquals(500, $e->getCode(), 'getCode');
            }
        }

        if ($created) {
            try {
                $this->wrapper->deleteContainer($container);
            } catch (ServiceException $e) {
                // Ignore.
            }
        }
    }
    
    private function verifyCreateContainerWorker($ret, $options) {
        if ($options->getMetadata() === null) {
            $this->assertNotNull($ret->getMetadata(), 'container Metadata');
            $this->assertEquals(0, count($ret->getMetadata()), 'count container Metadata');
        }
        else {
            $this->assertNotNull($ret->getMetadata(), 'container Metadata');
            $this->assertEquals(count($options->getMetadata()), count($ret->getMetadata()), 'Metadata');
            $retMetadata = $ret->getMetadata();
            foreach($options->getMetadata() as $key => $value)  {
                $this->assertEquals($value, $retMetadata[$key], 'Metadata(' . $key . ')');
            }
        }
    }

    /**
     * @covers WindowsAzure\Blob\Internal\BlobRestProxy::createContainer
     * @covers WindowsAzure\Blob\Internal\BlobRestProxy::deleteContainer
     * @covers WindowsAzure\Blob\Internal\BlobRestProxy::listContainers
     */
    public function testDeleteContainerNoOptions() {
        $this->deleteContainerWorker(null);
    }

    /**
     * @covers WindowsAzure\Blob\Internal\BlobRestProxy::createContainer
     * @covers WindowsAzure\Blob\Internal\BlobRestProxy::deleteContainer
     * @covers WindowsAzure\Blob\Internal\BlobRestProxy::listContainers
     */
    public function testDeleteContainer() {
        $interestingDeleteContainerOptions = BlobServiceFunctionalTestData::getInterestingDeleteContainerOptions();
        foreach($interestingDeleteContainerOptions as $options)  {
            $this->deleteContainerWorker($options);
        }
    }

    /**
     * @covers WindowsAzure\Blob\Internal\BlobRestProxy::createContainer
     * @covers WindowsAzure\Blob\Internal\BlobRestProxy::deleteContainer
     * @covers WindowsAzure\Blob\Internal\BlobRestProxy::listContainers
     */
    private function deleteContainerWorker($options) {
        $container = BlobServiceFunctionalTestData::getInterestingContainerName();

        // Make sure there is something to delete.
        $this->wrapper->createContainer($container);

        // Make sure that the list of all applicable containers is correctly updated.
        $opts = new ListContainersOptions();
        $opts->setPrefix(BlobServiceFunctionalTestData::$testUniqueId);
        $qs = $this->wrapper->listContainers($opts);
        $this->assertEquals(
                count($qs->getContainers()), 
                count(BlobServiceFunctionalTestData::$TEST_CONTAINER_NAMES) + 1,
                'After adding one, with Prefix=(\'' . BlobServiceFunctionalTestData::$testUniqueId . '\'), then Containers length');

        $deleted = false;
        try {
            if ($options === null) {
                $this->wrapper->deleteContainer($container);
            }
            else {
                $this->wrapper->deleteContainer($container, $options);
            }

            $deleted = true;

            if ($options === null) {
                $options = new DeleteContainerOptions();
            }

            if ($options->getTimeout() !== null && $options->getTimeout() < 1) {
                $this->assertTrue(false, 'Expect negative timeouts in $options to throw');
            }
            if (!Configuration::isEmulated() && !BlobServiceFunctionalTestData::passTemporalAccessCondition($options->getAccessCondition())) {
                $this->assertTrue(false, 'Failing access condition should throw');
            }

            // Make sure that the list of all applicable containers is correctly updated.
            $opts = new ListContainersOptions();
            $opts->setPrefix(BlobServiceFunctionalTestData::$testUniqueId);
            $qs = $this->wrapper->listContainers($opts);
            $this->assertEquals(
                    count($qs->getContainers()), 
                    count(BlobServiceFunctionalTestData::$TEST_CONTAINER_NAMES), 
                    'After adding then deleting one, with Prefix=(\'' . BlobServiceFunctionalTestData::$testUniqueId . '\'), then Containers length');

            // Nothing else interesting to check for the $options.
        }
        catch (ServiceException $e) {
            if ($options === null) {
                $options = new DeleteContainerOptions();
            }

            if ($options->getTimeout() !== null && $options->getTimeout() < 1) {
                $this->assertEquals(500, $e->getCode(), 'getCode');
            }
            else if (!Configuration::isEmulated() && !BlobServiceFunctionalTestData::passTemporalAccessCondition($options->getAccessCondition())) {
                $this->assertEquals(412, $e->getCode(), 'getCode');
            }
            else {
            }
        }

        if (!$deleted) {
            // Try again. If it doesn"t work, not much else to try.
            $this->wrapper->deleteContainer($container);
        }
    }

    /**
     * @covers WindowsAzure\Blob\Internal\BlobRestProxy::createContainer
     * @covers WindowsAzure\Blob\Internal\BlobRestProxy::deleteContainer
     * @covers WindowsAzure\Blob\Internal\BlobRestProxy::getContainerMetadata
     * @covers WindowsAzure\Blob\Internal\BlobRestProxy::setContainerMetadata
     */
    public function testGetContainerMetadataNoOptions() {
        $interestingMetadata = BlobServiceFunctionalTestData::getNiceMetadata();
        foreach ($interestingMetadata as $metadata) {
            $this->getContainerMetadataWorker(null, $metadata);
        }
    }

    /**
     * @covers WindowsAzure\Blob\Internal\BlobRestProxy::createContainer
     * @covers WindowsAzure\Blob\Internal\BlobRestProxy::deleteContainer
     * @covers WindowsAzure\Blob\Internal\BlobRestProxy::getContainerMetadata
     * @covers WindowsAzure\Blob\Internal\BlobRestProxy::setContainerMetadata
     */
    public function testGetContainerMetadata() {
        $interestingTimeouts = BlobServiceFunctionalTestData::getInterestingTimeoutValues();
        $interestingMetadata = BlobServiceFunctionalTestData::getNiceMetadata();

        foreach($interestingTimeouts as $timeout)  {
            foreach ($interestingMetadata as $metadata) {
                $options = new BlobServiceOptions();
                $options->setTimeout($timeout);
                $this->getContainerMetadataWorker($options, $metadata);
            }
        }
    }

    /**
     * @covers WindowsAzure\Blob\Internal\BlobRestProxy::createContainer
     * @covers WindowsAzure\Blob\Internal\BlobRestProxy::deleteContainer
     * @covers WindowsAzure\Blob\Internal\BlobRestProxy::getContainerMetadata
     * @covers WindowsAzure\Blob\Internal\BlobRestProxy::setContainerMetadata
     */
    private function getContainerMetadataWorker($options, $metadata) {
        $container = BlobServiceFunctionalTestData::getInterestingContainerName();

        // Make sure there is something to test
        $this->wrapper->createContainer($container);
        $this->wrapper->setContainerMetadata($container, $metadata);

        try {
            $res = ($options === null ? $this->wrapper->getContainerMetadata($container) : $this->wrapper->getContainerMetadata($container, $options));

            if ($options === null) {
                $options = new BlobServiceOptions();
            }

            if ($options->getTimeout() !== null && $options->getTimeout() <= 0) {
                $this->assertTrue(false, 'Expect negative timeouts in $options to throw');
            }

            $this->verifyGetContainerMetadataWorker($res, $metadata);
        }
        catch (ServiceException $e) {
            if ($options->getTimeout() === null || $options->getTimeout() > 0) {
                throw $e;
            }
            else {
                $this->assertEquals(500, $e->getCode(), 'getCode');
            }
        }
        // Clean up.
        $this->wrapper->deleteContainer($container);
    }

    private function verifyGetContainerMetadataWorker($ret, $metadata) {
        $this->assertNotNull($ret->getMetadata(), 'container Metadata');
        $this->assertNotNull($ret->getEtag(), 'container getEtag');
        $this->assertNotNull($ret->getLastModified(), 'container getLastModified');

        $this->assertEquals(count($metadata), count($ret->getMetadata()), 'Metadata');
        $md = $ret->getMetadata();
        foreach($metadata as $key => $value)  {
            $this->assertEquals($value, $md[$key], 'Metadata(' . $key . ')');
        }

        // Make sure the last modified date is within 10 seconds
        $now = new \DateTime();
        $this->assertTrue(
                BlobServiceFunctionalTestData::diffInTotalSeconds($ret->getLastModified(), $now) < 10,
                'Last modified date (' . $ret->getLastModified()->format(\DateTime::RFC1123) . ')'.
                ' should be within 10 seconds of $now (' . $now->format(\DateTime::RFC1123) . ')');
    }
    
    /**
     * @covers WindowsAzure\Blob\Internal\BlobRestProxy::createContainer
     * @covers WindowsAzure\Blob\Internal\BlobRestProxy::deleteContainer
     * @covers WindowsAzure\Blob\Internal\BlobRestProxy::getContainerMetadata
     * @covers WindowsAzure\Blob\Internal\BlobRestProxy::setContainerMetadata
     */
    public function testSetContainerMetadataNoOptions() {
        $interestingMetadata = BlobServiceFunctionalTestData::getInterestingMetadata();
        foreach($interestingMetadata as $metadata) {
            $this->setContainerMetadataWorker(null, $metadata);
        }
    }

    /**
     * @covers WindowsAzure\Blob\Internal\BlobRestProxy::createContainer
     * @covers WindowsAzure\Blob\Internal\BlobRestProxy::deleteContainer
     * @covers WindowsAzure\Blob\Internal\BlobRestProxy::getContainerMetadata
     * @covers WindowsAzure\Blob\Internal\BlobRestProxy::setContainerMetadata
     */
    public function testSetContainerMetadata() {
        $interestingSetContainerMetadataOptions = BlobServiceFunctionalTestData::getSetContainerMetadataOptions();
        $interestingMetadata = BlobServiceFunctionalTestData::getInterestingMetadata();

        foreach($interestingSetContainerMetadataOptions as $options)  {
            foreach($interestingMetadata as $metadata) {
                $this->setContainerMetadataWorker($options, $metadata);
            }
        }
    }

    /**
     * @covers WindowsAzure\Blob\Internal\BlobRestProxy::createContainer
     * @covers WindowsAzure\Blob\Internal\BlobRestProxy::deleteContainer
     * @covers WindowsAzure\Blob\Internal\BlobRestProxy::getContainerMetadata
     * @covers WindowsAzure\Blob\Internal\BlobRestProxy::setContainerMetadata
     */
    private function setContainerMetadataWorker($options, $metadata) {
        $container = BlobServiceFunctionalTestData::getInterestingContainerName();

        // Make sure there is something to test
        $this->wrapper->createContainer($container);

        $firstkey = '';
        if ($metadata !== null && count($metadata) > 0) {
            $firstkey = array_keys($metadata);
            $firstkey = $firstkey[0];
        }

        try {
            try {
                // And put in some metadata
                if ($options === null) {
                    $this->wrapper->setContainerMetadata($container, $metadata);
                }
                else {
                    $this->wrapper->setContainerMetadata($container, $metadata, $options);
                }

                if ($options === null) {
                    $options = new SetContainerMetadataOptions();
                }

                $this->assertFalse(
                     Utilities::startsWith($firstkey, '<'), 
                    'Should get HTTP request error if the metadata is invalid');

                if ($options->getTimeout() !== null && $options->getTimeout() < 1) {
                    $this->assertTrue(false, 'Expect negative timeouts in $options to throw');
                }

                // setMetadata only honors If-Modified-Since
                if (!Configuration::isEmulated() && 
                        !BlobServiceFunctionalTestData::passTemporalAccessCondition($options->getAccessCondition()) 
                        && ($options->getAccessCondition() !== null 
                        && $options->getAccessCondition()->getHeader() != Resources::IF_UNMODIFIED_SINCE)) {
                    $this->assertTrue(false, 'Expect failing access condition to throw');
                }

                $res = $this->wrapper->getContainerMetadata($container);
                $this->verifyGetContainerMetadataWorker($res, $metadata);
            }
            catch (\HTTP_Request2_LogicException $e) {
                $this->assertTrue(
                        Utilities::startsWith($firstkey, '<'), 
                        'Should get HTTP request error only if the metadata is invalid');
            }
        }
        catch (ServiceException $e) {
            if (!Configuration::isEmulated() &&
                    !BlobServiceFunctionalTestData::passTemporalAccessCondition($options->getAccessCondition()) && 
                    ($options->getAccessCondition() !== null &&
                    $options->getAccessCondition()->getHeader() != Resources::IF_UNMODIFIED_SINCE)) {
                // setMetadata only honors If-Modified-Since
                $this->assertEquals(412, $e->getCode(), 'getCode');
            }
            else if ($options->getTimeout() !== null && $options->getTimeout() < 1) {
                $this->assertEquals(500, $e->getCode(), 'getCode');
            }
            else {
                throw $e;
            }
        }

        // Clean up.
        $this->wrapper->deleteContainer($container);
    }

    /**
      * @covers WindowsAzure\Blob\Internal\BlobRestProxy::createContainer
      * @covers WindowsAzure\Blob\Internal\BlobRestProxy::deleteContainer
      * @covers WindowsAzure\Blob\Internal\BlobRestProxy::getContainerProperties
      * @covers WindowsAzure\Blob\Internal\BlobRestProxy::setContainerMetadata
      */
    public function testGetContainerPropertiesNoOptions() {
        $interestingMetadata = BlobServiceFunctionalTestData::getNiceMetadata();
        foreach ($interestingMetadata as $metadata) {
            $this->getContainerPropertiesWorker(null, $metadata);
        }
    }

    /**
     * @covers WindowsAzure\Blob\Internal\BlobRestProxy::createContainer
     * @covers WindowsAzure\Blob\Internal\BlobRestProxy::deleteContainer
     * @covers WindowsAzure\Blob\Internal\BlobRestProxy::getContainerProperties
     * @covers WindowsAzure\Blob\Internal\BlobRestProxy::setContainerMetadata
     */
    public function testGetContainerProperties() {

        $interestingTimeouts = BlobServiceFunctionalTestData::getInterestingTimeoutValues();
        $interestingMetadata = BlobServiceFunctionalTestData::getNiceMetadata();
        foreach($interestingTimeouts as $timeout)  {
            foreach($interestingMetadata as $metadata) {
                $options = new BlobServiceOptions();
                $options->setTimeout($timeout);
                $this->getContainerPropertiesWorker($options, $metadata);
            }
        }
    }

    /**
     * @covers WindowsAzure\Blob\Internal\BlobRestProxy::createContainer
     * @covers WindowsAzure\Blob\Internal\BlobRestProxy::deleteContainer
     * @covers WindowsAzure\Blob\Internal\BlobRestProxy::getContainerProperties
     * @covers WindowsAzure\Blob\Internal\BlobRestProxy::setContainerMetadata
     */
    private function getContainerPropertiesWorker($options, $metadata) {
        $container = BlobServiceFunctionalTestData::getInterestingContainerName();

        // Make sure there is something to test
        $this->wrapper->createContainer($container);
        $this->wrapper->setContainerMetadata($container, $metadata);

        try {
            $res = ($options === null ? $this->wrapper->getContainerProperties($container) : $this->wrapper->getContainerProperties($container, $options));

            if ($options === null) {
                $options = new BlobServiceOptions();
            }

            if ($options->getTimeout() !== null && $options->getTimeout() < 1) {
                $this->assertTrue(false, 'Expect negative timeouts in $options to throw');
            }

            $this->verifyGetContainerMetadataWorker($res, $metadata);
        }
        catch (ServiceException $e) {
            if ($options->getTimeout() === null || $options->getTimeout() >= 1) {
                throw $e;
            }
            else {
                $this->assertEquals(500, $e->getCode(), 'getCode');
            }
        }

        // Clean up.
        $this->wrapper->deleteContainer($container);
    }

    /**
     * @covers WindowsAzure\Blob\Internal\BlobRestProxy::createContainer
     * @covers WindowsAzure\Blob\Internal\BlobRestProxy::deleteContainer
     * @covers WindowsAzure\Blob\Internal\BlobRestProxy::getContainerACL
     */
    public function testGetContainerACLNoOptions() {
        $this->getContainerACLWorker(null);
    }

    /**
     * @covers WindowsAzure\Blob\Internal\BlobRestProxy::createContainer
     * @covers WindowsAzure\Blob\Internal\BlobRestProxy::deleteContainer
     * @covers WindowsAzure\Blob\Internal\BlobRestProxy::getContainerACL
     */
    public function testGetContainerACL() {

        $interestingTimeouts = BlobServiceFunctionalTestData::getInterestingTimeoutValues();
        foreach($interestingTimeouts as $timeout)  {
            $options = new BlobServiceOptions();
            $options->setTimeout($timeout);
            $this->getContainerACLWorker($options);
        }
    }

    /**
     * @covers WindowsAzure\Blob\Internal\BlobRestProxy::createContainer
     * @covers WindowsAzure\Blob\Internal\BlobRestProxy::deleteContainer
     * @covers WindowsAzure\Blob\Internal\BlobRestProxy::getContainerACL
     */
    private function getContainerACLWorker($options) {
        $container = BlobServiceFunctionalTestData::getInterestingContainerName();

        // Make sure there is something to test
        $this->wrapper->createContainer($container);

        try {
            $res = ($options === null ? $this->wrapper->getContainerACL($container) : $this->wrapper->getContainerACL($container, $options));

            if ($options === null) {
                $options = new BlobServiceOptions();
            }

            if ($options->getTimeout() !== null && $options->getTimeout() < 1) {
                $this->assertTrue(false, 'Expect negative timeouts in $options to throw');
            }

            $this->verifyGetContainerACLWorker($res);
        }
        catch (ServiceException $e) {
            if ($options->getTimeout() === null || $options->getTimeout() >= 1) {
                throw $e;
            }
            else {
                $this->assertEquals(500, $e->getCode(), 'getCode');
            }
        }

        // Clean up.
        $this->wrapper->deleteContainer($container);
    }

    private function verifyGetContainerACLWorker($ret) {
        $this->assertNotNull($ret->getContainerACL(), '$ret->getContainerACL');
        $this->assertNotNull($ret->getContainerACL()->getEtag(), '$ret->getContainerACL->getEtag');
        $this->assertNotNull($ret->getContainerACL()->getLastModified(), '$ret->getContainerACL->getLastModified');
      //  $this->assertNotNull($ret->getContainerACL()->getPublicAccess(), '$ret->getContainerACL->getPublicAccess');
        $this->assertNotNull($ret->getContainerACL()->getSignedIdentifiers(), '$ret->getContainerACL->getSignedIdentifiers');

        $now = new \DateTime();

        // Make sure the last modified date is within 10 seconds
        $this->assertTrue(BlobServiceFunctionalTestData::diffInTotalSeconds(
                $ret->getContainerACL()->getLastModified(),
                $now) < 10000,
                'Last modified date (' . $ret->getContainerACL()->getLastModified()->format(\DateTime::RFC1123) . ') ' .
                'should be within 10 seconds of $now (' . $now->format(\DateTime::RFC1123) . ')');
    }

    /**
     * @covers WindowsAzure\Blob\Internal\BlobRestProxy::createBlockBlob
     * @covers WindowsAzure\Blob\Internal\BlobRestProxy::createContainer
     * @covers WindowsAzure\Blob\Internal\BlobRestProxy::deleteContainer
     * @covers WindowsAzure\Blob\Internal\BlobRestProxy::getContainerACL
     * @covers WindowsAzure\Blob\Internal\BlobRestProxy::setContainerACL
     */
    public function testSetContainerACLNoOptions() {
        $interestingACL = BlobServiceFunctionalTestData::getInterestingACL();
        foreach($interestingACL as $acl)  {
            $this->setContainerACLWorker(null, $acl);
        }
    }

    /**
     * @covers WindowsAzure\Blob\Internal\BlobRestProxy::createBlockBlob
     * @covers WindowsAzure\Blob\Internal\BlobRestProxy::createContainer
     * @covers WindowsAzure\Blob\Internal\BlobRestProxy::deleteContainer
     * @covers WindowsAzure\Blob\Internal\BlobRestProxy::getContainerACL
     * @covers WindowsAzure\Blob\Internal\BlobRestProxy::setContainerACL
     */
    public function testSetContainerACL() {
        $interestingACL = BlobServiceFunctionalTestData::getInterestingACL();
        $interestingTimeouts = BlobServiceFunctionalTestData::getInterestingTimeoutValues();
        foreach($interestingTimeouts as $timeout)  {
            foreach($interestingACL as $acl)  {
                $options = new BlobServiceOptions();
                $options->setTimeout($timeout);
                $this->setContainerACLWorker($options, $acl);
            }
        }
    }

    /**
     * @covers WindowsAzure\Blob\Internal\BlobRestProxy::createBlockBlob
     * @covers WindowsAzure\Blob\Internal\BlobRestProxy::createContainer
     * @covers WindowsAzure\Blob\Internal\BlobRestProxy::deleteContainer
     * @covers WindowsAzure\Blob\Internal\BlobRestProxy::getContainerACL
     * @covers WindowsAzure\Blob\Internal\BlobRestProxy::setContainerACL
     */
    private function setContainerACLWorker($options, $acl) {
        $container = BlobServiceFunctionalTestData::getInterestingContainerName();

        // Make sure there is something to test
        $this->wrapper->createContainer($container);
        $blobContent = uniqid();
        try {
            $this->wrapper->createBlockBlob($container, 'test', $blobContent);
        }
        catch (UnsupportedEncodingException $e1) {
            // UTF-8 should be fine.
        }

        try {
            if ($options === null) {
                $this->wrapper->setContainerACL($container, $acl);
                $this->wrapper->setContainerACL($container, $acl);
            }
            else {
                $this->wrapper->setContainerACL($container, $acl, $options);
                $this->wrapper->setContainerACL($container, $acl, $options);
            }

            if ($options === null) {
                $options = new BlobServiceOptions();
            }

            if ($options->getTimeout() !== null && $options->getTimeout() < 1) {
                $this->assertTrue(false, 'Expect negative timeouts in $options to throw');
            }

            $res = $this->wrapper->getContainerACL($container);
            $this->verifySetContainerACLWorker($res, $container, $acl, $blobContent);
        }
        catch (ServiceException $e) {
            if ($options->getTimeout() !== null && $options->getTimeout() < 1) {
                $this->assertEquals(500, $e->getCode(), 'getCode');
            }
            else {
                throw $e;
            }
        }

        // Clean up.
        $this->wrapper->deleteContainer($container);
    }

    private function verifySetContainerACLWorker($ret, $container, $acl, $blobContent) {
        $this->assertNotNull($ret->getContainerACL(), '$ret->getContainerACL');
        $this->assertNotNull($ret->getContainerACL()->getEtag(), '$ret->getContainerACL->getEtag');
        $now = new \DateTime();
        $this->assertTrue(BlobServiceFunctionalTestData::diffInTotalSeconds(
                $ret->getContainerACL()->getLastModified(),
                $now) < 10000,
                'Last modified date (' . $ret->getContainerACL()->getLastModified()->format(\DateTime::RFC1123) . ') ' .
                'should be within 10 seconds of $now (' . $now->format(\DateTime::RFC1123) . ')');

//        $this->assertNotNull($ret->getContainerACL()->getPublicAccess(), '$ret->getContainerACL->getPublicAccess');
        $this->assertNotNull($ret->getContainerACL()->getSignedIdentifiers(), '$ret->getContainerACL->getSignedIdentifiers');

        $this->assertEquals((is_null($acl->getPublicAccess()) ? '' : $acl->getPublicAccess()), $ret->getContainerACL()->getPublicAccess(), '$ret->getContainerACL->getPublicAccess');
        $expIds = $acl->getSignedIdentifiers();
        $actIds = $ret->getContainerACL()->getSignedIdentifiers();
        $this->assertEquals(count($expIds), count($actIds), '$ret->getContainerACL->getSignedIdentifiers');

        for ($i = 0; $i < count($expIds); $i++) {
            $expId = $expIds[$i];
            $actId = $actIds[$i];
            $this->assertEquals($expId->getId(), $actId->getId(), 'SignedIdentifiers['+$i+']->getId');
            $this->assertEquals(
                    $expId->getAccessPolicy()->getPermission(), 
                    $actId->getAccessPolicy()->getPermission(), 
                    'SignedIdentifiers['+$i+']->getAccessPolicy->getPermission');
            $this->assertTrue(BlobServiceFunctionalTestData::diffInTotalSeconds(
                    $expId->getAccessPolicy()->getStart(), 
                    $actId->getAccessPolicy()->getStart()) < 1,
                    'SignedIdentifiers['+$i+']->getAccessPolicy->getStart should match within 1 second, ' .
                    'exp=' . $expId->getAccessPolicy()->getStart()->format(\DateTime::RFC1123) . ', ' .
                    'act=' . $actId->getAccessPolicy()->getStart()->format(\DateTime::RFC1123));
            $this->assertTrue(BlobServiceFunctionalTestData::diffInTotalSeconds(
                    $expId->getAccessPolicy()->getExpiry(), 
                    $actId->getAccessPolicy()->getExpiry()) < 1,
                    'SignedIdentifiers['+$i+']->getAccessPolicy->getExpiry should match within 1 second, ' .
                    'exp=' . $expId->getAccessPolicy()->getExpiry()->format(\DateTime::RFC1123) . ', ' .
                    'act=' . $actId->getAccessPolicy()->getExpiry()->format(\DateTime::RFC1123));
        }
        
        if (!Configuration::isEmulated()) {
            $containerAddress = $this->config->getProperty(BlobSettings::URI) . '/' . $container;
            $blobListAddress = $containerAddress . '?restype=container&comp=list';
            $blobAddress = $containerAddress . '/test';

            $canDownloadBlobList = $this->canDownloadFromUrl($blobListAddress,
                    "<?xml version=\"1.0\" encoding=\"utf-8\"?" . "><EnumerationResults");
            $canDownloadBlob = $this->canDownloadFromUrl($blobAddress, $blobContent);

            if ($acl->getPublicAccess() !== null && $acl->getPublicAccess() == PublicAccessType::CONTAINER_AND_BLOBS) {
                // Full public read access: Container and blob data can be read via anonymous request.
                // Clients can enumerate blobs within the $container via anonymous request,
                // but cannot enumerate containers within the storage account.
                $this->assertTrue($canDownloadBlobList, '$canDownloadBlobList when ' . $acl->getPublicAccess());
                $this->assertTrue($canDownloadBlob, '$canDownloadBlob when ' . $acl->getPublicAccess());
            }
            else if ($acl->getPublicAccess() !== null && $acl->getPublicAccess() == PublicAccessType::BLOBS_ONLY) {
                // Public read access for blobs only: Blob data within this container
                // can be read via anonymous request, but $container data is not available. 
                // Clients cannot enumerate blobs within the $container via anonymous request.
                $this->assertFalse($canDownloadBlobList, '$canDownloadBlobList when ' . $acl->getPublicAccess());
                $this->assertTrue($canDownloadBlob, '$canDownloadBlob when ' . $acl->getPublicAccess());
            }
            else {
                // No public read access: Container and blob data can be read by the account owner only.
                $this->assertFalse($canDownloadBlobList, '$canDownloadBlobList when ' . $acl->getPublicAccess());
                $this->assertFalse($canDownloadBlob, '$canDownloadBlob when ' . $acl->getPublicAccess());
            }
        }
    }

    private function canDownloadFromUrl($blobAddress, $expectedStartingValue) {
        $url = parse_url($blobAddress);
        $host = $url['host'];
        $fp = fsockopen($host, '80');
        $request = 'GET ' . $blobAddress . ' HTTP/1.1' . "\r\n" . 'Host: ' . $host ."\r\n\r\n";
        fputs($fp, $request);
        $value = fread($fp, 1000);
        fclose($fp);
        return strpos($value, $expectedStartingValue) !== false;
    }


    /**
     * @covers WindowsAzure\Blob\Internal\BlobRestProxy::listBlobs
     */
    public function testListBlobsNoOptions() {
        $container = BlobServiceFunctionalTestData::getContainerName();
        $this->listBlobsWorker($container, null);
    }

    /**
     * @covers WindowsAzure\Blob\Internal\BlobRestProxy::listBlobs
     */
    public function testListBlobs() {
        $interestingListBlobsOptions = BlobServiceFunctionalTestData::getInterestingListBlobsOptions();
        $container = BlobServiceFunctionalTestData::getContainerName();
        foreach($interestingListBlobsOptions as $options)  {
            $this->listBlobsWorker($container, $options);
        }
    }

    /**
     * @covers WindowsAzure\Blob\Internal\BlobRestProxy::listBlobs
     */
    private function listBlobsWorker($container, $options) {
        $finished = false;
        while (!$finished) {
            try {
                $ret = ($options === null ? $this->wrapper->listBlobs($container) : $this->wrapper->listBlobs($container, $options));

                if ($options === null) {
                    $options = new ListBlobsOptions();
                }

                if ($options->getTimeout() !== null && $options->getTimeout() < 1) {
                    $this->assertTrue(false, 'Expect negative timeouts in $options to throw');
                }
                $this->verifyListBlobsWorker($ret, $options);

                if (strlen($ret->getNextMarker()) == 0) {
                    $finished = true;
                }
                else {
                    $options->setMarker($ret->getNextMarker());
                }
            }
            catch (ServiceException $e) {
                $finished = true;
                if ($options->getTimeout() === null || $options->getTimeout() >= 1) {
                    throw $e;
                }
                else {
                    $this->assertEquals(500, $e->getCode(), 'getCode');
                }
            }
        }
    }

    private function verifyListBlobsWorker($ret, $options) {
        $this->assertEquals($options->getMarker(), $ret->getMarker(), 'getMarker');
        $this->assertEquals($options->getMaxResults(), $ret->getMaxResults(), 'getMaxResults');
        $this->assertEquals($options->getPrefix(), $ret->getPrefix(), 'getPrefix');

        $this->assertNotNull($ret->getBlobs(), 'getBlobs');
        if ($options->getMaxResults() == 0) {
            $this->assertEquals(0, strlen($ret->getNextMarker()), 'When MaxResults is 0, expect getNextMarker (' . strlen($ret->getNextMarker()) . ')to be  ');

            if ($options->getPrefix() !== null && $options->getPrefix() == (BlobServiceFunctionalTestData::$nonExistBlobPrefix)) {
                $this->assertEquals(0, count($ret->getBlobs()), 'when MaxResults=0 and Prefix=(\'' . $options->getPrefix() . '\'), then Blobs length');
            }
            else if ($options->getPrefix() !== null && $options->getPrefix() == (BlobServiceFunctionalTestData::$testUniqueId)) {
                $this->assertEquals(0, count($ret->getBlobs()), 'when MaxResults=0 and Prefix=(\'' . $options->getPrefix() . '\'), then Blobs length');
            }
            else {
                // Don"t know how many there should be
            }
        }
        else if (strlen($ret->getNextMarker()) == 0) {
            $this->assertTrue(
                    count($ret->getBlobs()) <= $options->getMaxResults(), 
                    'when NextMarker (\'' . $ret->getNextMarker() . '\')==\'\', Blobs length (' . count($ret->getBlobs()) . ') should be <= MaxResults (' . $options->getMaxResults() . ')');

            if (BlobServiceFunctionalTestData::$nonExistBlobPrefix == $options->getPrefix()) {
                $this->assertEquals(
                        0, 
                        count($ret->getBlobs()),
                        'when no next marker and Prefix=(\'' . $options->getPrefix() . '\'), then Blobs length');
            }
            else if (BlobServiceFunctionalTestData::$testUniqueId == $options->getPrefix()) {
                // Need to futz with the mod because you are allowed to get MaxResults items returned.
                $this->assertEquals(
                        0, 
                        count($ret->getBlobs()) % $options->getMaxResults(), 
                        'when no next marker and Prefix=(\'' . $options->getPrefix() . '\'), then Blobs length');
            }
            else {
                // Don"t know how many there should be
            }
        }
        else {
            $this->assertEquals(count($ret->getBlobs()), $options->getMaxResults(), 'when NextMarker (' . $ret->getNextMarker() . ')!=\'\', Blobs length (' . count($ret->getBlobs()) . ') should be == MaxResults (' . $options->getMaxResults() . ')');

            if ($options->getPrefix() !== null && $options->getPrefix() == (BlobServiceFunctionalTestData::$nonExistBlobPrefix)) {
                $this->assertTrue(false, 'when a next marker and Prefix=(\'' . $options->getPrefix() . '\'), impossible');
            }
        }
    }
    
    //    getBlobProperties
    //    getBlobMetadata
    //    setBlobProperties
    //    setBlobMetadata
    //    getBlob
    //    deleteBlob

    //    createBlockBlob
    //    createBlobBlock
    //    commitBlobBlocks
    //    listBlobBlocks

    //    createPageBlob
    //    clearBlobPages
    //    createBlobPages
    //    listBlobRegions

    //    createBlobSnapshot
    //    copyBlob

    //    acquireLease
    //    renewLease
    //    releaseLease
    //    breakLease

}
?>
