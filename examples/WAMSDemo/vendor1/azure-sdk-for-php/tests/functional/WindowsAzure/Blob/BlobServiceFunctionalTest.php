<?php

/**
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
 * PHP version 5
 *
 * @category  Microsoft
 * @package   Tests\Functional\WindowsAzure\Blob
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */

namespace Tests\Functional\WindowsAzure\Blob;

use Tests\Framework\TestResources;
use WindowsAzure\Blob\Models\BlobServiceOptions;
use WindowsAzure\Blob\Models\CopyBlobOptions;
use WindowsAzure\Blob\Models\CreateBlobSnapshotOptions;
use WindowsAzure\Blob\Models\CreateContainerOptions;
use WindowsAzure\Blob\Models\DeleteBlobOptions;
use WindowsAzure\Blob\Models\DeleteContainerOptions;
use WindowsAzure\Blob\Models\GetBlobMetadataOptions;
use WindowsAzure\Blob\Models\GetBlobOptions;
use WindowsAzure\Blob\Models\GetBlobPropertiesOptions;
use WindowsAzure\Blob\Models\ListBlobsOptions;
use WindowsAzure\Blob\Models\ListContainersOptions;
use WindowsAzure\Blob\Models\PublicAccessType;
use WindowsAzure\Blob\Models\SetBlobMetadataOptions;
use WindowsAzure\Blob\Models\SetContainerMetadataOptions;
use WindowsAzure\Common\ServiceException;
use WindowsAzure\Common\Internal\Resources;
use WindowsAzure\Common\Internal\StorageServiceSettings;
use WindowsAzure\Common\Internal\Utilities;

class BlobServiceFunctionalTest extends FunctionalTestBase
{
    /**
     * @covers WindowsAzure\Blob\BlobRestProxy::getServiceProperties
     */
    public function testGetServicePropertiesNoOptions()
    {
        $serviceProperties = BlobServiceFunctionalTestData::getDefaultServiceProperties();
        $shouldReturn = false;
        try {
            $this->restProxy->setServiceProperties($serviceProperties);
            $this->assertFalse($this->isEmulated(), 'Should succeed when not running in emulator');
        } catch (ServiceException $e) {
            // Expect failure in emulator, as v1.6 doesn't support this method
            if ($this->isEmulated()) {
                $this->assertEquals(TestResources::STATUS_BAD_REQUEST, $e->getCode(), 'getCode');
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
     * @covers WindowsAzure\Blob\BlobRestProxy::getServiceProperties
     */
    public function testGetServiceProperties()
    {
        $serviceProperties = BlobServiceFunctionalTestData::getDefaultServiceProperties();

        $shouldReturn = false;
        try {
            $this->restProxy->setServiceProperties($serviceProperties);
            $this->assertFalse($this->isEmulated(), 'Should succeed when not running in emulator');
        } catch (ServiceException $e) {
            // Expect failure in emulator, as v1.6 doesn't support this method
            if ($this->isEmulated()) {
                $this->assertEquals(TestResources::STATUS_BAD_REQUEST, $e->getCode(), 'getCode');
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
     * @covers WindowsAzure\Blob\BlobRestProxy::getServiceProperties
     */
    private function getServicePropertiesWorker($options)
    {
        $effOptions = (is_null($options) ? new BlobServiceOptions() : $options);
        try {
            $ret = (is_null($options) ? $this->restProxy->getServiceProperties() : $this->restProxy->getServiceProperties($effOptions));

            if (!is_null($effOptions->getTimeout()) && $effOptions->getTimeout() < 1) {
                $this->True('Expect negative timeouts in $options to throw', false);
            } else {
                $this->assertFalse($this->isEmulated(), 'Should succeed when not running in emulator');
            }
            $this->verifyServicePropertiesWorker($ret, null);
        } catch (ServiceException $e) {
            if ($this->isEmulated()) {
                if (!is_null($options->getTimeout()) && $options->getTimeout() < 1) {
                    $this->assertEquals(TestResources::STATUS_INTERNAL_SERVER_ERROR, $e->getCode(), 'getCode');
                } else {
                    // Expect failure in emulator, as v1.6 doesn't support this method
                    $this->assertEquals(TestResources::STATUS_BAD_REQUEST, $e->getCode(), 'getCode');
                }
            } else {
                if (is_null($effOptions->getTimeout()) || $effOptions->getTimeout() >= 1) {
                    throw $e;
                } else {
                    $this->assertEquals(TestResources::STATUS_INTERNAL_SERVER_ERROR, $e->getCode(), 'getCode');
                }
            }
        }
    }

    private function verifyServicePropertiesWorker($ret, $serviceProperties)
    {
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
     * @covers WindowsAzure\Blob\BlobRestProxy::getServiceProperties
     * @covers WindowsAzure\Blob\BlobRestProxy::setServiceProperties
     */
    public function testSetServicePropertiesNoOptions()
    {
        $serviceProperties = BlobServiceFunctionalTestData::getDefaultServiceProperties();
        $this->setServicePropertiesWorker($serviceProperties, null);
    }

    /**
     * @covers WindowsAzure\Blob\BlobRestProxy::getServiceProperties
     * @covers WindowsAzure\Blob\BlobRestProxy::setServiceProperties
     */
    public function testSetServiceProperties()
    {
        $interestingServiceProperties = BlobServiceFunctionalTestData::getInterestingServiceProperties();
        foreach($interestingServiceProperties as $serviceProperties)  {
            $interestingTimeouts = BlobServiceFunctionalTestData::getInterestingTimeoutValues();
            foreach($interestingTimeouts as $timeout)  {
                $options = new BlobServiceOptions();
                $options->setTimeout($timeout);
                $this->setServicePropertiesWorker($serviceProperties, $options);
            }
        }

        if (!$this->isEmulated()) {
            $this->restProxy->setServiceProperties($interestingServiceProperties[0]);
        }
    }

    /**
     * @covers WindowsAzure\Blob\BlobRestProxy::getServiceProperties
     * @covers WindowsAzure\Blob\BlobRestProxy::setServiceProperties
     */
    private function setServicePropertiesWorker($serviceProperties, $options)
    {
        try {
            if (is_null($options)) {
                $this->restProxy->setServiceProperties($serviceProperties);
            } else {
                $this->restProxy->setServiceProperties($serviceProperties, $options);
            }

            if (is_null($options)) {
                $options = new BlobServiceOptions();
            }

            if (!is_null($options->getTimeout()) && $options->getTimeout() < 1) {
                $this->assertTrue(false, 'Expect negative timeouts in $options to throw');
            } else {
                $this->assertFalse($this->isEmulated(), 'Should succeed when not running in emulator');
            }

            $ret = (is_null($options) ? $this->restProxy->getServiceProperties() : $this->restProxy->getServiceProperties($options));
            $this->verifyServicePropertiesWorker($ret, $serviceProperties);
        } catch (ServiceException $e) {
            if (is_null($options)) {
                $options = new BlobServiceOptions();
            }

            if ($this->isEmulated()) {
                if (!is_null($options->getTimeout()) && $options->getTimeout() < 1) {
                    $this->assertEquals(TestResources::STATUS_INTERNAL_SERVER_ERROR, $e->getCode(), 'getCode');
                } else {
                    $this->assertEquals(TestResources::STATUS_BAD_REQUEST, $e->getCode(), 'getCode');
                }
            } else {
                if (!is_null($options->getTimeout()) && $options->getTimeout() < 1) {
                    $this->assertEquals(TestResources::STATUS_INTERNAL_SERVER_ERROR, $e->getCode(), 'getCode');
                } else {
                    throw $e;
                }
            }
        }
    }

    /**
     * @covers WindowsAzure\Blob\BlobRestProxy::listContainers
     */
    public function testListContainersNoOptions()
    {
        $this->listContainersWorker(null);
    }

    /**
     * @covers WindowsAzure\Blob\BlobRestProxy::listContainers
     */
    public function testListContainers()
    {
        $interestingListContainersOptions = BlobServiceFunctionalTestData::getInterestingListContainersOptions();
        foreach($interestingListContainersOptions as $options)  {
            $this->listContainersWorker($options);
        }
    }

    /**
     * @covers WindowsAzure\Blob\BlobRestProxy::listContainers
     */
    private function listContainersWorker($options)
    {
        $finished = false;
        while (!$finished) {
            try {
                $ret = (is_null($options) ? $this->restProxy->listContainers() : $this->restProxy->listContainers($options));

                if (is_null($options)) {
                    $options = new ListContainersOptions();
                }

                if (!is_null($options->getTimeout()) && $options->getTimeout() < 1) {
                    $this->assertTrue(false, 'Expect negative timeouts in $options to throw');
                }
                $this->verifyListContainersWorker($ret, $options);

                if (strlen($ret->getNextMarker()) == 0) {
                    $finished = true;
                } else {
                    $options->setMarker($ret->getNextMarker());
                }
            } catch (ServiceException $e) {
                $finished = true;
                if (is_null($options->getTimeout()) || $options->getTimeout() >= 1) {
                    throw $e;
                } else {
                    $this->assertEquals(TestResources::STATUS_INTERNAL_SERVER_ERROR, $e->getCode(), 'getCode');
                }
            }
        }
    }

    private function verifyListContainersWorker($ret, $options)
    {
        // Cannot really check the next marker. Just make sure it is not null.
        $this->assertEquals($options->getMarker(), $ret->getMarker(), 'getMarker');
        $this->assertEquals($options->getMaxResults(), $ret->getMaxResults(), 'getMaxResults');
        $this->assertEquals($options->getPrefix(), $ret->getPrefix(), 'getPrefix');

        $this->assertNotNull($ret->getContainers(), 'getBlobs');
        if ($options->getMaxResults() == 0) {
            $this->assertEquals(0, strlen($ret->getNextMarker()), 'When MaxResults is 0, expect getNextMarker (' . strlen($ret->getNextMarker()) . ')to be  ');

            if (!is_null($options->getPrefix()) && $options->getPrefix() == (BlobServiceFunctionalTestData::$nonExistBlobPrefix)) {
                $this->assertEquals(0, count($ret->getContainers()), 'when MaxResults=0 and Prefix=(\'' . $options->getPrefix() . '\'), then Blobs length');
            } else if (!is_null($options->getPrefix()) && $options->getPrefix() == (BlobServiceFunctionalTestData::$testUniqueId)) {
                $this->assertEquals(count(BlobServiceFunctionalTestData::$testContainerNames), count($ret->getContainers()), 'when MaxResults=0 and Prefix=(\'' . $options->getPrefix() . '\'), then Blobs length');
            } else {
                // Do not know how many there should be
            }
        } else if (strlen($ret->getNextMarker()) == 0) {
            $this->assertTrue(count($ret->getContainers()) <= $options->getMaxResults(), 'when NextMarker (\'' . $ret->getNextMarker() . '\')==\'\', Blobs length (' . count($ret->getContainers()) . ') should be <= MaxResults (' . $options->getMaxResults() . ')');

            if (BlobServiceFunctionalTestData::$nonExistBlobPrefix == $options->getPrefix()) {
                $this->assertEquals(0, count($ret->getContainers()), 'when no next marker and Prefix=(\'' . $options->getPrefix() . '\'), then Blobs length');
            } else if (BlobServiceFunctionalTestData::$testUniqueId ==$options->getPrefix()) {
                // Need to futz with the mod because you are allowed to get MaxResults items returned.
                $expectedCount = count(BlobServiceFunctionalTestData::$testContainerNames) % $options->getMaxResults();
                if (!$this->isEmulated()) {
                    $expectedCount += 1;
                }
                $this->assertEquals(
                        $expectedCount,
                        count($ret->getContainers()),
                        'when no next marker and Prefix=(\'' . $options->getPrefix() . '\'), then Blobs length');
            } else {
                // Do not know how many there should be
            }
        } else {
            $this->assertEquals(
                    count($ret->getContainers()),
                    $options->getMaxResults(),
                    'when NextMarker (' . $ret->getNextMarker() . ')!=\'\', Blobs length (' . count($ret->getContainers()) . ') should be == MaxResults (' . $options->getMaxResults() . ')');

            if (!is_null($options->getPrefix()) && $options->getPrefix() == BlobServiceFunctionalTestData::$nonExistBlobPrefix) {
                $this->assertTrue(false, 'when a next marker and Prefix=(\'' . $options->getPrefix() . '\'), impossible');
            }
        }

    }

    /**
     * @covers WindowsAzure\Blob\BlobRestProxy::createContainer
     * @covers WindowsAzure\Blob\BlobRestProxy::deleteContainer
     * @covers WindowsAzure\Blob\BlobRestProxy::getContainerMetadata
     * @covers WindowsAzure\Blob\BlobRestProxy::listContainers
     */
    public function testCreateContainerNoOptions()
    {
        $this->createContainerWorker(null);
    }

    /**
     * @covers WindowsAzure\Blob\BlobRestProxy::createContainer
     * @covers WindowsAzure\Blob\BlobRestProxy::deleteContainer
     * @covers WindowsAzure\Blob\BlobRestProxy::getContainerMetadata
     * @covers WindowsAzure\Blob\BlobRestProxy::listContainers
     */
    public function testCreateContainer()
    {
        $interestingCreateContainerOptions = BlobServiceFunctionalTestData::getInterestingCreateContainerOptions();
        foreach($interestingCreateContainerOptions as $options)  {
            $this->createContainerWorker($options);
        }
    }

    /**
     * @covers WindowsAzure\Blob\BlobRestProxy::createContainer
     * @covers WindowsAzure\Blob\BlobRestProxy::deleteContainer
     * @covers WindowsAzure\Blob\BlobRestProxy::getContainerMetadata
     * @covers WindowsAzure\Blob\BlobRestProxy::listContainers
     */
    private function createContainerWorker($options)
    {
        $container = BlobServiceFunctionalTestData::getInterestingContainerName();
        $created = false;

        try {
            if (is_null($options)) {
                $this->restProxy->createContainer($container);
            } else {
                $this->restProxy->createContainer($container, $options);
            }
            $created = true;

            if (is_null($options)) {
                $options = new CreateContainerOptions();
            }

            if (!is_null($options->getTimeout()) && $options->getTimeout() < 1) {
                $this->assertTrue(false, 'Expect negative timeouts in $options to throw');
            }

            // Now check that the $container was $created correctly.

            // Make sure that the list of all applicable containers is correctly updated.
            $opts = new ListContainersOptions();
            $opts->setPrefix(BlobServiceFunctionalTestData::$testUniqueId);
            $qs = $this->restProxy->listContainers($opts);
            $this->assertEquals(count($qs->getContainers()), count(BlobServiceFunctionalTestData::$testContainerNames) + 1, 'After adding one, with Prefix=(\'' . BlobServiceFunctionalTestData::$testUniqueId . '\'), then Containers length');

            // Check the metadata on the container
            $ret = $this->restProxy->getContainerMetadata($container);
            $this->verifyCreateContainerWorker($ret, $options);
            $this->restProxy->deleteContainer($container);
        } catch (ServiceException $e) {
            if (is_null($options)) {
                $options = new CreateContainerOptions();
            }

            if (is_null($options->getTimeout()) || $options->getTimeout() >= 1) {
                throw $e;
            } else {
                $this->assertEquals(TestResources::STATUS_INTERNAL_SERVER_ERROR, $e->getCode(), 'getCode');
            }
        }

        if ($created) {
            try {
                $this->restProxy->deleteContainer($container);
            } catch (ServiceException $e) {
                // Ignore.
            }
        }
    }

    private function verifyCreateContainerWorker($ret, $options)
    {
        if (is_null($options->getMetadata())) {
            $this->assertNotNull($ret->getMetadata(), 'container Metadata');
            $this->assertEquals(0, count($ret->getMetadata()), 'count container Metadata');
        } else {
            $this->assertNotNull($ret->getMetadata(), 'container Metadata');
            $this->assertEquals(count($options->getMetadata()), count($ret->getMetadata()), 'Metadata');
            $retMetadata = $ret->getMetadata();
            foreach($options->getMetadata() as $key => $value)  {
                $this->assertEquals($value, $retMetadata[$key], 'Metadata(' . $key . ')');
            }
        }
    }

    /**
     * @covers WindowsAzure\Blob\BlobRestProxy::createContainer
     * @covers WindowsAzure\Blob\BlobRestProxy::deleteContainer
     * @covers WindowsAzure\Blob\BlobRestProxy::listContainers
     */
    public function testDeleteContainerNoOptions()
    {
        $this->deleteContainerWorker(null);
    }

    /**
     * @covers WindowsAzure\Blob\BlobRestProxy::createContainer
     * @covers WindowsAzure\Blob\BlobRestProxy::deleteContainer
     * @covers WindowsAzure\Blob\BlobRestProxy::listContainers
     */
    public function testDeleteContainer()
    {
        $interestingDeleteContainerOptions = BlobServiceFunctionalTestData::getInterestingDeleteContainerOptions();
        foreach($interestingDeleteContainerOptions as $options)  {
            $this->deleteContainerWorker($options);
        }
    }

    /**
     * @covers WindowsAzure\Blob\BlobRestProxy::createContainer
     * @covers WindowsAzure\Blob\BlobRestProxy::deleteContainer
     * @covers WindowsAzure\Blob\BlobRestProxy::listContainers
     */
    private function deleteContainerWorker($options)
    {
        $container = BlobServiceFunctionalTestData::getInterestingContainerName();

        // Make sure there is something to delete.
        $this->restProxy->createContainer($container);

        // Make sure that the list of all applicable containers is correctly updated.
        $opts = new ListContainersOptions();
        $opts->setPrefix(BlobServiceFunctionalTestData::$testUniqueId);
        $qs = $this->restProxy->listContainers($opts);
        $this->assertEquals(
                count($qs->getContainers()),
                count(BlobServiceFunctionalTestData::$testContainerNames) + 1,
                'After adding one, with Prefix=(\'' . BlobServiceFunctionalTestData::$testUniqueId . '\'), then Containers length');

        $deleted = false;
        try {
            if (is_null($options)) {
                $this->restProxy->deleteContainer($container);
            } else {
                $this->restProxy->deleteContainer($container, $options);
            }

            $deleted = true;

            if (is_null($options)) {
                $options = new DeleteContainerOptions();
            }

            if (!is_null($options->getTimeout()) && $options->getTimeout() < 1) {
                $this->assertTrue(false, 'Expect negative timeouts in $options to throw');
            }
            if (!$this->isEmulated() &&
                    !BlobServiceFunctionalTestData::passTemporalAccessCondition($options->getAccessCondition())) {
                $this->assertTrue(false, 'Failing access condition should throw');
            }

            // Make sure that the list of all applicable containers is correctly updated.
            $opts = new ListContainersOptions();
            $opts->setPrefix(BlobServiceFunctionalTestData::$testUniqueId);
            $qs = $this->restProxy->listContainers($opts);
            $this->assertEquals(
                    count($qs->getContainers()),
                    count(BlobServiceFunctionalTestData::$testContainerNames),
                    'After adding then deleting one, with Prefix=(\'' . BlobServiceFunctionalTestData::$testUniqueId . '\'), then Containers length');

            // Nothing else interesting to check for the $options.
        } catch (ServiceException $e) {
            if (is_null($options)) {
                $options = new DeleteContainerOptions();
            }

            if (!is_null($options->getTimeout()) && $options->getTimeout() < 1) {
                $this->assertEquals(TestResources::STATUS_INTERNAL_SERVER_ERROR, $e->getCode(), 'getCode');
            } else if (!$this->isEmulated() && !BlobServiceFunctionalTestData::passTemporalAccessCondition($options->getAccessCondition())) {
                $this->assertEquals(TestResources::STATUS_PRECONDITION_FAILED, $e->getCode(), 'getCode');
            } else {
                throw $e;
            }
        }

        if (!$deleted) {
            // Try again. If it does not work, not much else to try.
            $this->restProxy->deleteContainer($container);
        }
    }

    /**
     * @covers WindowsAzure\Blob\BlobRestProxy::createContainer
     * @covers WindowsAzure\Blob\BlobRestProxy::deleteContainer
     * @covers WindowsAzure\Blob\BlobRestProxy::getContainerMetadata
     * @covers WindowsAzure\Blob\BlobRestProxy::setContainerMetadata
     */
    public function testGetContainerMetadataNoOptions()
    {
        $metadata = BlobServiceFunctionalTestData::getNiceMetadata();
        $this->getContainerMetadataWorker(null, $metadata);
    }

    /**
     * @covers WindowsAzure\Blob\BlobRestProxy::createContainer
     * @covers WindowsAzure\Blob\BlobRestProxy::deleteContainer
     * @covers WindowsAzure\Blob\BlobRestProxy::getContainerMetadata
     * @covers WindowsAzure\Blob\BlobRestProxy::setContainerMetadata
     */
    public function testGetContainerMetadata()
    {
        $interestingTimeouts = BlobServiceFunctionalTestData::getInterestingTimeoutValues();
        $metadata = BlobServiceFunctionalTestData::getNiceMetadata();

        foreach($interestingTimeouts as $timeout)  {
            $options = new BlobServiceOptions();
            $options->setTimeout($timeout);
            $this->getContainerMetadataWorker($options, $metadata);
        }
    }

    /**
     * @covers WindowsAzure\Blob\BlobRestProxy::createContainer
     * @covers WindowsAzure\Blob\BlobRestProxy::deleteContainer
     * @covers WindowsAzure\Blob\BlobRestProxy::getContainerMetadata
     * @covers WindowsAzure\Blob\BlobRestProxy::setContainerMetadata
     */
    private function getContainerMetadataWorker($options, $metadata)
    {
        $container = BlobServiceFunctionalTestData::getInterestingContainerName();

        // Make sure there is something to test
        $this->restProxy->createContainer($container);
        $this->restProxy->setContainerMetadata($container, $metadata);

        try {
            $res = (is_null($options) ? $this->restProxy->getContainerMetadata($container) : $this->restProxy->getContainerMetadata($container, $options));

            if (is_null($options)) {
                $options = new BlobServiceOptions();
            }

            if (!is_null($options->getTimeout()) && $options->getTimeout() <= 0) {
                $this->assertTrue(false, 'Expect negative timeouts in $options to throw');
            }

            $this->verifyGetContainerMetadataWorker($res, $metadata);
        } catch (ServiceException $e) {
            if (is_null($options->getTimeout()) || $options->getTimeout() > 0) {
                throw $e;
            } else {
                $this->assertEquals(TestResources::STATUS_INTERNAL_SERVER_ERROR, $e->getCode(), 'getCode');
            }
        }
        // Clean up.
        $this->restProxy->deleteContainer($container);
    }

    private function verifyGetContainerMetadataWorker($ret, $metadata)
    {
        $this->assertNotNull($ret->getMetadata(), 'container Metadata');
        $this->assertNotNull($ret->getETag(), 'container getETag');
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
     * @covers WindowsAzure\Blob\BlobRestProxy::createContainer
     * @covers WindowsAzure\Blob\BlobRestProxy::deleteContainer
     * @covers WindowsAzure\Blob\BlobRestProxy::getContainerMetadata
     * @covers WindowsAzure\Blob\BlobRestProxy::setContainerMetadata
     */
    public function testSetContainerMetadataNoOptions()
    {
        $interestingMetadata = BlobServiceFunctionalTestData::getInterestingMetadata();
        foreach($interestingMetadata as $metadata) {
            $this->setContainerMetadataWorker(null, $metadata);
        }
    }

    /**
     * @covers WindowsAzure\Blob\BlobRestProxy::createContainer
     * @covers WindowsAzure\Blob\BlobRestProxy::deleteContainer
     * @covers WindowsAzure\Blob\BlobRestProxy::getContainerMetadata
     * @covers WindowsAzure\Blob\BlobRestProxy::setContainerMetadata
     */
    public function testSetContainerMetadata()
    {
        $interestingSetContainerMetadataOptions = BlobServiceFunctionalTestData::getSetContainerMetadataOptions();
        $interestingMetadata = BlobServiceFunctionalTestData::getInterestingMetadata();

        foreach($interestingSetContainerMetadataOptions as $options)  {
            foreach($interestingMetadata as $metadata) {
                $this->setContainerMetadataWorker($options, $metadata);
            }
        }
    }

    /**
     * @covers WindowsAzure\Blob\BlobRestProxy::createContainer
     * @covers WindowsAzure\Blob\BlobRestProxy::deleteContainer
     * @covers WindowsAzure\Blob\BlobRestProxy::getContainerMetadata
     * @covers WindowsAzure\Blob\BlobRestProxy::setContainerMetadata
     */
    private function setContainerMetadataWorker($options, $metadata)
    {
        $container = BlobServiceFunctionalTestData::getInterestingContainerName();

        // Make sure there is something to test
        $this->restProxy->createContainer($container);

        $firstkey = '';
        if (!is_null($metadata) && count($metadata) > 0) {
            $firstkey = array_keys($metadata);
            $firstkey = $firstkey[0];
        }

        try {
            try {
                // And put in some metadata
                if (is_null($options)) {
                    $this->restProxy->setContainerMetadata($container, $metadata);
                } else {
                    $this->restProxy->setContainerMetadata($container, $metadata, $options);
                }

                if (is_null($options)) {
                    $options = new SetContainerMetadataOptions();
                }

                $this->assertFalse(
                     Utilities::startsWith($firstkey, '<'),
                    'Should get HTTP request error if the metadata is invalid');

                if (!is_null($options->getTimeout()) && $options->getTimeout() < 1) {
                    $this->assertTrue(false, 'Expect negative timeouts in $options to throw');
                }

                // setMetadata only honors If-Modified-Since
                if (!$this->isEmulated() &&
                        !BlobServiceFunctionalTestData::passTemporalAccessCondition($options->getAccessCondition())
                        && (!is_null($options->getAccessCondition())
                        && $options->getAccessCondition()->getHeader() != Resources::IF_UNMODIFIED_SINCE)) {
                    $this->assertTrue(false, 'Expect failing access condition to throw');
                }

                $res = $this->restProxy->getContainerMetadata($container);
                $this->verifyGetContainerMetadataWorker($res, $metadata);
            } catch (\HTTP_Request2_LogicException $e) {
                $this->assertTrue(
                        Utilities::startsWith($firstkey, '<'),
                        'Should get HTTP request error only if the metadata is invalid');
            }
        } catch (ServiceException $e) {
            if (!$this->isEmulated() &&
                    !BlobServiceFunctionalTestData::passTemporalAccessCondition($options->getAccessCondition()) &&
                    (!is_null($options->getAccessCondition()) &&
                    $options->getAccessCondition()->getHeader() != Resources::IF_UNMODIFIED_SINCE)) {
                // setMetadata only honors If-Modified-Since
                $this->assertEquals(TestResources::STATUS_PRECONDITION_FAILED, $e->getCode(), 'getCode');
            } else if (!is_null($options->getTimeout()) && $options->getTimeout() < 1) {
                $this->assertEquals(TestResources::STATUS_INTERNAL_SERVER_ERROR, $e->getCode(), 'getCode');
            } else {
                throw $e;
            }
        }

        // Clean up.
        $this->restProxy->deleteContainer($container);
    }

    /**
      * @covers WindowsAzure\Blob\BlobRestProxy::createContainer
      * @covers WindowsAzure\Blob\BlobRestProxy::deleteContainer
      * @covers WindowsAzure\Blob\BlobRestProxy::getContainerProperties
      * @covers WindowsAzure\Blob\BlobRestProxy::setContainerMetadata
      */
    public function testGetContainerPropertiesNoOptions()
    {
        $metadata = BlobServiceFunctionalTestData::getNiceMetadata();
        $this->getContainerPropertiesWorker(null, $metadata);
    }

    /**
     * @covers WindowsAzure\Blob\BlobRestProxy::createContainer
     * @covers WindowsAzure\Blob\BlobRestProxy::deleteContainer
     * @covers WindowsAzure\Blob\BlobRestProxy::getContainerProperties
     * @covers WindowsAzure\Blob\BlobRestProxy::setContainerMetadata
     */
    public function testGetContainerProperties()
    {

        $interestingTimeouts = BlobServiceFunctionalTestData::getInterestingTimeoutValues();
        $metadata = BlobServiceFunctionalTestData::getNiceMetadata();
        foreach($interestingTimeouts as $timeout)  {
            $options = new BlobServiceOptions();
            $options->setTimeout($timeout);
            $this->getContainerPropertiesWorker($options, $metadata);
        }
    }

    /**
     * @covers WindowsAzure\Blob\BlobRestProxy::createContainer
     * @covers WindowsAzure\Blob\BlobRestProxy::deleteContainer
     * @covers WindowsAzure\Blob\BlobRestProxy::getContainerProperties
     * @covers WindowsAzure\Blob\BlobRestProxy::setContainerMetadata
     */
    private function getContainerPropertiesWorker($options, $metadata)
    {
        $container = BlobServiceFunctionalTestData::getInterestingContainerName();

        // Make sure there is something to test
        $this->restProxy->createContainer($container);
        $this->restProxy->setContainerMetadata($container, $metadata);

        try {
            $res = (is_null($options) ? $this->restProxy->getContainerProperties($container) : $this->restProxy->getContainerProperties($container, $options));

            if (is_null($options)) {
                $options = new BlobServiceOptions();
            }

            if (!is_null($options->getTimeout()) && $options->getTimeout() < 1) {
                $this->assertTrue(false, 'Expect negative timeouts in $options to throw');
            }

            $this->verifyGetContainerMetadataWorker($res, $metadata);
        } catch (ServiceException $e) {
            if (is_null($options->getTimeout()) || $options->getTimeout() >= 1) {
                throw $e;
            } else {
                $this->assertEquals(TestResources::STATUS_INTERNAL_SERVER_ERROR, $e->getCode(), 'getCode');
            }
        }

        // Clean up.
        $this->restProxy->deleteContainer($container);
    }

    /**
     * @covers WindowsAzure\Blob\BlobRestProxy::createContainer
     * @covers WindowsAzure\Blob\BlobRestProxy::deleteContainer
     * @covers WindowsAzure\Blob\BlobRestProxy::getContainerACL
     */
    public function testGetContainerACLNoOptions()
    {
        $this->getContainerACLWorker(null);
    }

    /**
     * @covers WindowsAzure\Blob\BlobRestProxy::createContainer
     * @covers WindowsAzure\Blob\BlobRestProxy::deleteContainer
     * @covers WindowsAzure\Blob\BlobRestProxy::getContainerACL
     */
    public function testGetContainerACL()
    {

        $interestingTimeouts = BlobServiceFunctionalTestData::getInterestingTimeoutValues();
        foreach($interestingTimeouts as $timeout)  {
            $options = new BlobServiceOptions();
            $options->setTimeout($timeout);
            $this->getContainerACLWorker($options);
        }
    }

    /**
     * @covers WindowsAzure\Blob\BlobRestProxy::createContainer
     * @covers WindowsAzure\Blob\BlobRestProxy::deleteContainer
     * @covers WindowsAzure\Blob\BlobRestProxy::getContainerACL
     */
    private function getContainerACLWorker($options)
    {
        $container = BlobServiceFunctionalTestData::getInterestingContainerName();

        // Make sure there is something to test
        $this->restProxy->createContainer($container);

        try {
            $res = (is_null($options) ? $this->restProxy->getContainerACL($container) : $this->restProxy->getContainerACL($container, $options));

            if (is_null($options)) {
                $options = new BlobServiceOptions();
            }

            if (!is_null($options->getTimeout()) && $options->getTimeout() < 1) {
                $this->assertTrue(false, 'Expect negative timeouts in $options to throw');
            }

            $this->verifyGetContainerACLWorker($res);
        } catch (ServiceException $e) {
            if (is_null($options->getTimeout()) || $options->getTimeout() >= 1) {
                throw $e;
            } else {
                $this->assertEquals(TestResources::STATUS_INTERNAL_SERVER_ERROR, $e->getCode(), 'getCode');
            }
        }

        // Clean up.
        $this->restProxy->deleteContainer($container);
    }

    private function verifyGetContainerACLWorker($ret)
    {
        $this->assertNotNull($ret->getContainerACL(), '$ret->getContainerACL');
        $this->assertNotNull($ret->getETag(), '$ret->getETag');
        $this->assertNotNull($ret->getLastModified(), '$ret->getLastModified');
        $this->assertNull($ret->getContainerACL()->getPublicAccess(), '$ret->getContainerACL->getPublicAccess');
        $this->assertNotNull($ret->getContainerACL()->getSignedIdentifiers(), '$ret->getContainerACL->getSignedIdentifiers');

        // Make sure the last modified date is within 10 seconds
        $now = new \DateTime();
        $this->assertTrue(BlobServiceFunctionalTestData::diffInTotalSeconds(
                $ret->getLastModified(),
                $now) < 10000,
                'Last modified date (' . $ret->getLastModified()->format(\DateTime::RFC1123) . ') ' .
                'should be within 10 seconds of $now (' . $now->format(\DateTime::RFC1123) . ')');
    }

    /**
     * @covers WindowsAzure\Blob\BlobRestProxy::createBlockBlob
     * @covers WindowsAzure\Blob\BlobRestProxy::createContainer
     * @covers WindowsAzure\Blob\BlobRestProxy::deleteContainer
     * @covers WindowsAzure\Blob\BlobRestProxy::getContainerACL
     * @covers WindowsAzure\Blob\BlobRestProxy::setContainerACL
     */
    public function testSetContainerACLNoOptions()
    {
        $interestingACL = BlobServiceFunctionalTestData::getInterestingACL();
        foreach($interestingACL as $acl)  {
            $this->setContainerACLWorker(null, $acl);
        }
    }

    /**
     * @covers WindowsAzure\Blob\BlobRestProxy::createBlockBlob
     * @covers WindowsAzure\Blob\BlobRestProxy::createContainer
     * @covers WindowsAzure\Blob\BlobRestProxy::deleteContainer
     * @covers WindowsAzure\Blob\BlobRestProxy::getContainerACL
     * @covers WindowsAzure\Blob\BlobRestProxy::setContainerACL
     */
    public function testSetContainerACL()
    {
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
     * @covers WindowsAzure\Blob\BlobRestProxy::createBlockBlob
     * @covers WindowsAzure\Blob\BlobRestProxy::createContainer
     * @covers WindowsAzure\Blob\BlobRestProxy::deleteContainer
     * @covers WindowsAzure\Blob\BlobRestProxy::getContainerACL
     * @covers WindowsAzure\Blob\BlobRestProxy::setContainerACL
     */
    private function setContainerACLWorker($options, $acl)
    {
        $container = BlobServiceFunctionalTestData::getInterestingContainerName();

        // Make sure there is something to test
        $this->restProxy->createContainer($container);
        $blobContent = uniqid();
        $this->restProxy->createBlockBlob($container, 'test', $blobContent);

        try {
            if (is_null($options)) {
                $this->restProxy->setContainerACL($container, $acl);
                $this->restProxy->setContainerACL($container, $acl);
            } else {
                $this->restProxy->setContainerACL($container, $acl, $options);
                $this->restProxy->setContainerACL($container, $acl, $options);
            }

            if (is_null($options)) {
                $options = new BlobServiceOptions();
            }

            if (!is_null($options->getTimeout()) && $options->getTimeout() < 1) {
                $this->assertTrue(false, 'Expect negative timeouts in $options to throw');
            }

            $res = $this->restProxy->getContainerACL($container);
            $this->verifySetContainerACLWorker($res, $container, $acl, $blobContent);
        } catch (ServiceException $e) {
            if (!is_null($options->getTimeout()) && $options->getTimeout() < 1) {
                $this->assertEquals(TestResources::STATUS_INTERNAL_SERVER_ERROR, $e->getCode(), 'getCode');
            } else {
                throw $e;
            }
        }

        // Clean up.
        $this->restProxy->deleteContainer($container);
    }

    private function verifySetContainerACLWorker($ret, $container, $acl, $blobContent)
    {
        $this->assertNotNull($ret->getContainerACL(), '$ret->getContainerACL');
        $this->assertNotNull($ret->getETag(), '$ret->getContainerACL->getETag');
        $now = new \DateTime();
        $this->assertTrue(BlobServiceFunctionalTestData::diffInTotalSeconds(
                $ret->getLastModified(),
                $now) < 10000,
                'Last modified date (' . $ret->getLastModified()->format(\DateTime::RFC1123) . ') ' .
                'should be within 10 seconds of $now (' . $now->format(\DateTime::RFC1123) . ')');

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

        if (!$this->isEmulated()) {
            $settings = StorageServiceSettings::createFromConnectionString($this->connectionString);
            $containerAddress = $settings->getBlobEndpointUri() . '/' . $container;
            $blobListAddress = $containerAddress . '?restype=container&comp=list';
            $blobAddress = $containerAddress . '/test';

            $canDownloadBlobList = $this->canDownloadFromUrl($blobListAddress,
                    "<?xml version=\"1.0\" encoding=\"utf-8\"?" . "><EnumerationResults");
            $canDownloadBlob = $this->canDownloadFromUrl($blobAddress, $blobContent);

            if (!is_null($acl->getPublicAccess()) && $acl->getPublicAccess() == PublicAccessType::CONTAINER_AND_BLOBS) {
                // Full public read access: Container and blob data can be read via anonymous request.
                // Clients can enumerate blobs within the $container via anonymous request,
                // but cannot enumerate containers within the storage account.
                $this->assertTrue($canDownloadBlobList, '$canDownloadBlobList when ' . $acl->getPublicAccess());
                $this->assertTrue($canDownloadBlob, '$canDownloadBlob when ' . $acl->getPublicAccess());
            } else if (!is_null($acl->getPublicAccess()) && $acl->getPublicAccess() == PublicAccessType::BLOBS_ONLY) {
                // Public read access for blobs only: Blob data within this container
                // can be read via anonymous request, but $container data is not available.
                // Clients cannot enumerate blobs within the $container via anonymous request.
                $this->assertFalse($canDownloadBlobList, '$canDownloadBlobList when ' . $acl->getPublicAccess());
                $this->assertTrue($canDownloadBlob, '$canDownloadBlob when ' . $acl->getPublicAccess());
            } else {
                // No public read access: Container and blob data can be read by the account owner only.
                $this->assertFalse($canDownloadBlobList, '$canDownloadBlobList when ' . $acl->getPublicAccess());
                $this->assertFalse($canDownloadBlob, '$canDownloadBlob when ' . $acl->getPublicAccess());
            }
        }
    }

    private function canDownloadFromUrl($blobAddress, $expectedStartingValue)
    {
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
     * @covers WindowsAzure\Blob\BlobRestProxy::listBlobs
     */
    public function testListBlobsNoOptions()
    {
        $container = BlobServiceFunctionalTestData::getContainerName();
        $this->listBlobsWorker($container, null);
    }

    // This fails because the service returns the container list
    // instead of the blob list. In principle, the service can
    // distinguish between the two, because this is of the
    // format:
    //     /?restype=container&comp=list
    // whereas the container list has this format:
    //     /?comp=list

//    /**
//     * @covers WindowsAzure\Blob\BlobRestProxy::listBlobs
//     */
//    public function testListBlobsNoOptionsRoot()
//    {
//        $container = null;
//        $this->listBlobsWorker($container, null);
//    }

    /**
     * @covers WindowsAzure\Blob\BlobRestProxy::listBlobs
     */
    public function testListBlobsNoOptionsExplicitRoot()
    {
        $container = '$root';
        $this->listBlobsWorker($container, null);
    }

    /**
     * @covers WindowsAzure\Blob\BlobRestProxy::listBlobs
     */
    public function testListBlobs()
    {
        $interestingListBlobsOptions = BlobServiceFunctionalTestData::getInterestingListBlobsOptions();
        $container = BlobServiceFunctionalTestData::getContainerName();
        foreach($interestingListBlobsOptions as $options)  {
            $this->listBlobsWorker($container, $options);
        }
    }

    /**
     * @covers WindowsAzure\Blob\BlobRestProxy::listBlobs
     */
    private function listBlobsWorker($container, $options)
    {
        $finished = false;
        while (!$finished) {
            try {
                $ret = (is_null($options) ? $this->restProxy->listBlobs($container) : $this->restProxy->listBlobs($container, $options));

                if (is_null($options)) {
                    $options = new ListBlobsOptions();
                }

                if (!is_null($options->getTimeout()) && $options->getTimeout() < 1) {
                    $this->assertTrue(false, 'Expect negative timeouts in $options to throw');
                }
                $this->verifyListBlobsWorker($ret, $options);

                if (strlen($ret->getNextMarker()) == 0) {
                    $finished = true;
                } else {
                    $options->setMarker($ret->getNextMarker());
                }
            } catch (ServiceException $e) {
                $finished = true;
                if (is_null($options->getTimeout()) || $options->getTimeout() >= 1) {
                    throw $e;
                } else {
                    $this->assertEquals(TestResources::STATUS_INTERNAL_SERVER_ERROR, $e->getCode(), 'getCode');
                }
            }
        }
    }

    private function verifyListBlobsWorker($ret, $options)
    {
        $this->assertEquals($options->getMarker(), $ret->getMarker(), 'getMarker');
        $this->assertEquals($options->getMaxResults(), $ret->getMaxResults(), 'getMaxResults');
        $this->assertEquals($options->getPrefix(), $ret->getPrefix(), 'getPrefix');

        $this->assertNotNull($ret->getBlobs(), 'getBlobs');
        if ($options->getMaxResults() == 0) {
            $this->assertEquals(0, strlen($ret->getNextMarker()), 'When MaxResults is 0, expect getNextMarker (' . strlen($ret->getNextMarker()) . ')to be  ');

            if (!is_null($options->getPrefix()) && $options->getPrefix() == (BlobServiceFunctionalTestData::$nonExistBlobPrefix)) {
                $this->assertEquals(0, count($ret->getBlobs()), 'when MaxResults=0 and Prefix=(\'' . $options->getPrefix() . '\'), then Blobs length');
            } else if (!is_null($options->getPrefix()) && $options->getPrefix() == (BlobServiceFunctionalTestData::$testUniqueId)) {
                $this->assertEquals(0, count($ret->getBlobs()), 'when MaxResults=0 and Prefix=(\'' . $options->getPrefix() . '\'), then Blobs length');
            } else {
                // Do not know how many there should be
            }
        } else if (strlen($ret->getNextMarker()) == 0) {
            $this->assertTrue(
                    count($ret->getBlobs()) <= $options->getMaxResults(),
                    'when NextMarker (\'' . $ret->getNextMarker() . '\')==\'\', Blobs length (' . count($ret->getBlobs()) . ') should be <= MaxResults (' . $options->getMaxResults() . ')');

            if (BlobServiceFunctionalTestData::$nonExistBlobPrefix == $options->getPrefix()) {
                $this->assertEquals(
                        0,
                        count($ret->getBlobs()),
                        'when no next marker and Prefix=(\'' . $options->getPrefix() . '\'), then Blobs length');
            } else if (BlobServiceFunctionalTestData::$testUniqueId == $options->getPrefix()) {
                // Need to futz with the mod because you are allowed to get MaxResults items returned.
                $this->assertEquals(
                        0,
                        count($ret->getBlobs()) % $options->getMaxResults(),
                        'when no next marker and Prefix=(\'' . $options->getPrefix() . '\'), then Blobs length');
            } else {
                // Do not know how many there should be
            }
        } else {
            $this->assertEquals(count($ret->getBlobs()), $options->getMaxResults(), 'when NextMarker (' . $ret->getNextMarker() . ')!=\'\', Blobs length (' . count($ret->getBlobs()) . ') should be == MaxResults (' . $options->getMaxResults() . ')');

            if (!is_null($options->getPrefix()) && $options->getPrefix() == (BlobServiceFunctionalTestData::$nonExistBlobPrefix)) {
                $this->assertTrue(false, 'when a next marker and Prefix=(\'' . $options->getPrefix() . '\'), impossible');
            }
        }
    }

    /**
     * @covers WindowsAzure\Blob\BlobRestProxy::createBlockBlob
     * @covers WindowsAzure\Blob\BlobRestProxy::deleteBlob
     * @covers WindowsAzure\Blob\BlobRestProxy::getBlobMetadata
     * @covers WindowsAzure\Blob\BlobRestProxy::getBlobProperties
     * @covers WindowsAzure\Blob\BlobRestProxy::setBlobMetadata
     */
    public function testGetBlobMetadataNoOptions()
    {
        $container = BlobServiceFunctionalTestData::getContainerName();
        $this->getBlobMetadataWorker($container, null);
    }

    /**
     * @covers WindowsAzure\Blob\BlobRestProxy::createBlockBlob
     * @covers WindowsAzure\Blob\BlobRestProxy::deleteBlob
     * @covers WindowsAzure\Blob\BlobRestProxy::getBlobMetadata
     * @covers WindowsAzure\Blob\BlobRestProxy::getBlobProperties
     * @covers WindowsAzure\Blob\BlobRestProxy::setBlobMetadata
     */
    public function testGetBlobMetadataNoOptionsRoot()
    {
        $container = null;
        $this->getBlobMetadataWorker($container, null);
    }

    /**
     * @covers WindowsAzure\Blob\BlobRestProxy::createBlockBlob
     * @covers WindowsAzure\Blob\BlobRestProxy::deleteBlob
     * @covers WindowsAzure\Blob\BlobRestProxy::getBlobMetadata
     * @covers WindowsAzure\Blob\BlobRestProxy::getBlobProperties
     * @covers WindowsAzure\Blob\BlobRestProxy::setBlobMetadata
     */
    public function testGetBlobMetadataNoOptionsExplicitRoot()
    {
        $container = '$root';
        $this->getBlobMetadataWorker($container, null);
    }

    /**
     * @covers WindowsAzure\Blob\BlobRestProxy::createBlockBlob
     * @covers WindowsAzure\Blob\BlobRestProxy::deleteBlob
     * @covers WindowsAzure\Blob\BlobRestProxy::getBlobMetadata
     * @covers WindowsAzure\Blob\BlobRestProxy::getBlobProperties
     * @covers WindowsAzure\Blob\BlobRestProxy::setBlobMetadata
     */
    public function testGetBlobMetadata()
    {
        $container = BlobServiceFunctionalTestData::getContainerName();
        $interestingTimeouts = BlobServiceFunctionalTestData::getInterestingTimeoutValues();

        foreach($interestingTimeouts as $timeout)  {
            $options = new GetBlobMetadataOptions();
            $options->setTimeout($timeout);
            $this->getBlobMetadataWorker($container, $options);
        }
    }

    /**
     * @covers WindowsAzure\Blob\BlobRestProxy::createBlockBlob
     * @covers WindowsAzure\Blob\BlobRestProxy::deleteBlob
     * @covers WindowsAzure\Blob\BlobRestProxy::getBlobMetadata
     * @covers WindowsAzure\Blob\BlobRestProxy::getBlobProperties
     * @covers WindowsAzure\Blob\BlobRestProxy::setBlobMetadata
     */
    private function getBlobMetadataWorker($container, $options)
    {
        $blob = BlobServiceFunctionalTestData::getInterestingBlobName($container);

        // Make sure there is something to test
        $createBlockBlobResult = $this->restProxy->createBlockBlob($container, $blob, "");

        $properties = BlobServiceFunctionalTestData::getNiceMetadata();
        $this->restProxy->setBlobMetadata($container, $blob, $properties);

        if (!is_null($options)) {
            BlobServiceFunctionalTestData::fixETagAccessCondition($options->getAccessCondition(), $createBlockBlobResult->getETag());
        }

        try {
            $res = (is_null($options) ? $this->restProxy->getBlobMetadata($container, $blob) : $this->restProxy->getBlobMetadata($container, $blob, $options));

            if (is_null($options)) {
                $options = new GetBlobMetadataOptions();
            }

            if (!is_null($options->getTimeout()) && $options->getTimeout() < 1) {
                $this->assertTrue(false, 'Expect negative timeouts in $options to throw');
            }
            if (!BlobServiceFunctionalTestData::passTemporalAccessCondition($options->getAccessCondition())) {
                $this->assertTrue(false, 'Failing temporal access condition should throw');
            }
            if (!BlobServiceFunctionalTestData::passETagAccessCondition($options->getAccessCondition())) {
                $this->assertTrue(false, 'Failing etag access condition should throw');
            }

            $this->verifyGetBlobMetadataWorker($res, $properties);
        } catch (ServiceException $e) {
            if (!is_null($options->getTimeout()) && $options->getTimeout() < 1) {
                $this->assertEquals(TestResources::STATUS_INTERNAL_SERVER_ERROR, $e->getCode(), 'bad timeout: getCode');
            } else if (!BlobServiceFunctionalTestData::passTemporalAccessCondition($options->getAccessCondition())) {
                $this->assertEquals(TestResources::STATUS_PRECONDITION_FAILED, $e->getCode(), 'bad temporal access condition: getCode');
            } else if (!BlobServiceFunctionalTestData::passETagAccessCondition($options->getAccessCondition())) {
                $this->assertEquals(TestResources::STATUS_PRECONDITION_FAILED, $e->getCode(), 'bad etag access condition: getCode');
            } else {
                throw $e;
            }
        }

        // Clean up.
        $this->restProxy->deleteBlob($container, $blob);
    }

    private function verifyGetBlobMetadataWorker($res, $metadata)
    {
        $this->assertNotNull($res->getMetadata(), 'blob Metadata');
        $this->assertNotNull($res->getETag(), 'blob getETag');
        $this->assertNotNull($res->getLastModified(), 'blob getLastModified');

        $this->assertEquals(count($metadata), count($res->getMetadata()), 'Metadata');
        $retMetadata = $res->getMetadata();
        foreach($metadata as $key => $value)  {
            $this->assertEquals($value, $retMetadata[$key], 'Metadata(' . $key . ')');
        }

        // Make sure the last modified date is within 10 seconds
        $now = new \DateTime();
        $this->assertTrue(BlobServiceFunctionalTestData::diffInTotalSeconds(
                $res->getLastModified(),
                $now) < 10000,
                'Last modified date (' . $res->getLastModified()->format(\DateTime::RFC1123) . ') ' .
                'should be within 10 seconds of $now (' . $now->format(\DateTime::RFC1123) . ')');
     }

    /**
     * @covers WindowsAzure\Blob\BlobRestProxy::createBlockBlob
     * @covers WindowsAzure\Blob\BlobRestProxy::deleteBlob
     * @covers WindowsAzure\Blob\BlobRestProxy::getBlobMetadata
     * @covers WindowsAzure\Blob\BlobRestProxy::getBlobProperties
     * @covers WindowsAzure\Blob\BlobRestProxy::setBlobMetadata
     */
    public function testSetBlobMetadataNoOptions()
    {
        $container = BlobServiceFunctionalTestData::getContainerName();
        $interestingMetadata = BlobServiceFunctionalTestData::getInterestingMetadata();
        foreach($interestingMetadata as $properties) {
            $this->setBlobMetadataWorker($container, null, $properties);
        }
    }

    /**
     * @covers WindowsAzure\Blob\BlobRestProxy::createBlockBlob
     * @covers WindowsAzure\Blob\BlobRestProxy::deleteBlob
     * @covers WindowsAzure\Blob\BlobRestProxy::getBlobMetadata
     * @covers WindowsAzure\Blob\BlobRestProxy::getBlobProperties
     * @covers WindowsAzure\Blob\BlobRestProxy::setBlobMetadata
     */
    public function testSetBlobMetadataNoOptionsRoot()
    {
        $container = null;
        $interestingMetadata = BlobServiceFunctionalTestData::getInterestingMetadata();
        foreach($interestingMetadata as $properties) {
            $this->setBlobMetadataWorker($container, null, $properties);
        }
    }

    /**
     * @covers WindowsAzure\Blob\BlobRestProxy::createBlockBlob
     * @covers WindowsAzure\Blob\BlobRestProxy::deleteBlob
     * @covers WindowsAzure\Blob\BlobRestProxy::getBlobMetadata
     * @covers WindowsAzure\Blob\BlobRestProxy::getBlobProperties
     * @covers WindowsAzure\Blob\BlobRestProxy::setBlobMetadata
     */
    public function testSetBlobMetadataNoOptionsExplicitRoot()
    {
        $container = '$root';
        $interestingMetadata = BlobServiceFunctionalTestData::getInterestingMetadata();
        foreach($interestingMetadata as $properties) {
            $this->setBlobMetadataWorker($container, null, $properties);
        }
    }

    /**
     * @covers WindowsAzure\Blob\BlobRestProxy::createBlockBlob
     * @covers WindowsAzure\Blob\BlobRestProxy::deleteBlob
     * @covers WindowsAzure\Blob\BlobRestProxy::getBlobMetadata
     * @covers WindowsAzure\Blob\BlobRestProxy::getBlobProperties
     * @covers WindowsAzure\Blob\BlobRestProxy::setBlobMetadata
     */
    public function testSetBlobMetadata()
    {
        $container = BlobServiceFunctionalTestData::getContainerName();
        $interestingSetBlobMetadataOptions = BlobServiceFunctionalTestData::getSetBlobMetadataOptions();
        $interestingMetadata = BlobServiceFunctionalTestData::getInterestingMetadata();

        foreach($interestingSetBlobMetadataOptions as $options)  {
            foreach($interestingMetadata as $properties) {
                $this->setBlobMetadataWorker($container, $options, $properties);
            }
        }
    }

    /**
     * @covers WindowsAzure\Blob\BlobRestProxy::createBlockBlob
     * @covers WindowsAzure\Blob\BlobRestProxy::deleteBlob
     * @covers WindowsAzure\Blob\BlobRestProxy::getBlobMetadata
     * @covers WindowsAzure\Blob\BlobRestProxy::getBlobProperties
     * @covers WindowsAzure\Blob\BlobRestProxy::setBlobMetadata
     */
    private function setBlobMetadataWorker($container, $options, $metadata)
    {
        $blob = BlobServiceFunctionalTestData::getInterestingBlobName($container);

        // Make sure there is something to test
        $createBlockBlobResult = $this->restProxy->createBlockBlob($container, $blob, "");
        if (!is_null($options)) {
            BlobServiceFunctionalTestData::fixETagAccessCondition($options->getAccessCondition(), $createBlockBlobResult->getETag());
        }

        $firstkey = '';
        if (!is_null($metadata) && count($metadata) > 0) {
            $firstkey = array_keys($metadata);
            $firstkey = $firstkey[0];
        }

        try {
            try {
                // And put in some properties
                $res = (is_null($options) ? $this->restProxy->setBlobMetadata($container, $blob, $metadata) : $this->restProxy->setBlobMetadata($container, $blob, $metadata, $options));
                if (is_null($options)) {
                    $options = new SetBlobMetadataOptions();
                }

                if (!is_null($options->getTimeout()) && $options->getTimeout() < 1) {
                    $this->assertTrue(false, 'Expect negative timeouts in $options to throw');
                }
                if (!BlobServiceFunctionalTestData::passTemporalAccessCondition($options->getAccessCondition())) {
                    $this->assertTrue(false, 'Failing access condition should throw');
                }
                if (!BlobServiceFunctionalTestData::passTemporalAccessCondition($options->getAccessCondition())) {
                    $this->assertTrue(false, 'Expect failing access condition to throw');
                }
                if (Utilities::startsWith($firstkey, '<')) {
                    $this->assertTrue(false, 'Should get HTTP request error if the metadata is invalid');
                }

                $this->verifySetBlobMetadataWorker($res);

                $res2 = $this->restProxy->getBlobMetadata($container, $blob);
                $this->verifyGetBlobMetadataWorker($res2, $metadata);
            } catch (\HTTP_Request2_LogicException $e) {
                $this->assertTrue(
                        Utilities::startsWith($firstkey, '<'),
                        'Should get HTTP request error only if the metadata is invalid');
            }
        } catch (ServiceException $e) {
            if (!is_null($options->getTimeout()) && $options->getTimeout() < 1) {
                $this->assertEquals(TestResources::STATUS_INTERNAL_SERVER_ERROR, $e->getCode(), 'bad timeout: getCode');
            } else if (!BlobServiceFunctionalTestData::passTemporalAccessCondition($options->getAccessCondition())) {
                $this->assertEquals(TestResources::STATUS_PRECONDITION_FAILED, $e->getCode(), 'bad temporal access condition: getCode');
            } else if (!BlobServiceFunctionalTestData::passETagAccessCondition($options->getAccessCondition())) {
                $this->assertEquals(TestResources::STATUS_PRECONDITION_FAILED, $e->getCode(), 'bad etag access condition: getCode');
            } else {
                throw $e;
            }
        }

        // Clean up.
        $this->restProxy->deleteBlob($container, $blob);
    }

    private function verifySetBlobMetadataWorker($res)
    {
        $this->assertNotNull($res->getETag(), 'blob getETag');
        $this->assertNotNull($res->getLastModified(), 'blob getLastModified');

        // Make sure the last modified date is within 10 seconds
        $now = new \DateTime();
        $this->assertTrue(BlobServiceFunctionalTestData::diffInTotalSeconds(
                $res->getLastModified(),
                $now) < 10000,
                'Last modified date (' . $res->getLastModified()->format(\DateTime::RFC1123) . ') ' .
                'should be within 10 seconds of $now (' . $now->format(\DateTime::RFC1123) . ')');
    }

    /**
     * @covers WindowsAzure\Blob\BlobRestProxy::createPageBlob
     * @covers WindowsAzure\Blob\BlobRestProxy::deleteBlob
     * @covers WindowsAzure\Blob\BlobRestProxy::getBlobProperties
     * @covers WindowsAzure\Blob\BlobRestProxy::setBlobMetadata
     */
    public function testGetBlobPropertiesNoOptions()
    {
        $container = BlobServiceFunctionalTestData::getContainerName();
        $this->getBlobPropertiesWorker($container, null);
    }

    /**
     * @covers WindowsAzure\Blob\BlobRestProxy::createPageBlob
     * @covers WindowsAzure\Blob\BlobRestProxy::deleteBlob
     * @covers WindowsAzure\Blob\BlobRestProxy::getBlobProperties
     * @covers WindowsAzure\Blob\BlobRestProxy::setBlobMetadata
     */
    public function testGetBlobPropertiesNoOptionsRoot()
    {
        $container = null;
        $this->getBlobPropertiesWorker($container, null);
    }

    /**
     * @covers WindowsAzure\Blob\BlobRestProxy::createPageBlob
     * @covers WindowsAzure\Blob\BlobRestProxy::deleteBlob
     * @covers WindowsAzure\Blob\BlobRestProxy::getBlobProperties
     * @covers WindowsAzure\Blob\BlobRestProxy::setBlobMetadata
     */
    public function testGetBlobPropertiesNoOptionsExplicitRoot()
    {
        $container = '$root';
        $this->getBlobPropertiesWorker($container, null);
    }

    /**
     * @covers WindowsAzure\Blob\BlobRestProxy::createPageBlob
     * @covers WindowsAzure\Blob\BlobRestProxy::deleteBlob
     * @covers WindowsAzure\Blob\BlobRestProxy::getBlobProperties
     * @covers WindowsAzure\Blob\BlobRestProxy::setBlobMetadata
     */
    public function testGetBlobProperties()
    {
        $container = BlobServiceFunctionalTestData::getContainerName();
        $interestingGetBlobPropertiesOptions = BlobServiceFunctionalTestData::getGetBlobPropertiesOptions();

        foreach($interestingGetBlobPropertiesOptions as $options)  {
            $this->getBlobPropertiesWorker($container, $options);
        }
    }

    /**
     * @covers WindowsAzure\Blob\BlobRestProxy::createPageBlob
     * @covers WindowsAzure\Blob\BlobRestProxy::deleteBlob
     * @covers WindowsAzure\Blob\BlobRestProxy::getBlobProperties
     * @covers WindowsAzure\Blob\BlobRestProxy::setBlobMetadata
     */
    private function getBlobPropertiesWorker($container, $options)
    {
        $blob = BlobServiceFunctionalTestData::getInterestingBlobName($container);

        // Make sure there is something to test
        $createPageBlobResult = $this->restProxy->createPageBlob($container, $blob, 512);

        $metadata = BlobServiceFunctionalTestData::getNiceMetadata();
        $this->restProxy->setBlobMetadata($container, $blob, $metadata);
        // Do not set the properties, there should be default properties.

        if (!is_null($options)) {
            BlobServiceFunctionalTestData::fixETagAccessCondition($options->getAccessCondition(), $createPageBlobResult->getETag());
        }

        try {
            $res = (is_null($options) ? $this->restProxy->getBlobProperties($container, $blob) : $this->restProxy->getBlobProperties($container, $blob, $options));

            if (is_null($options)) {
                $options = new GetBlobPropertiesOptions();
            }

            if (!is_null($options->getTimeout()) && $options->getTimeout() < 1) {
                $this->assertTrue(false, 'Expect negative timeouts in $options to throw');
            }
            if (!BlobServiceFunctionalTestData::passTemporalAccessCondition($options->getAccessCondition())) {
                $this->assertTrue(false, 'Failing temporal access condition should throw');
            }

            $this->verifyGetBlobPropertiesWorker($res, $metadata, null);
        } catch (ServiceException $e) {
            if (!is_null($options->getAccessCondition()) &&
                    !$this->hasSecureEndpoint() &&
                    $e->getCode() == TestResources::STATUS_FORBIDDEN) {
                // Proxies can eat the access condition headers of
                // unsecured (http) requests, which causes the authentication
                // to fail, with a 403:Forbidden. There is nothing much that
                // can be done about this, other than ignore it.
            } else if (!is_null($options->getTimeout()) && $options->getTimeout() < 1) {
                $this->assertEquals(TestResources::STATUS_INTERNAL_SERVER_ERROR, $e->getCode(), 'bad timeout: getCode');
            } else if (!BlobServiceFunctionalTestData::passTemporalAccessCondition($options->getAccessCondition())) {
                if ($options->getAccessCondition()->getHeader() == Resources::IF_MODIFIED_SINCE) {
                    $this->assertEquals(TestResources::STATUS_NOT_MODIFIED, $e->getCode(), 'bad temporal access condition IF_MODIFIED_SINCE: getCode');
                } else {
                    $this->assertEquals(TestResources::STATUS_PRECONDITION_FAILED, $e->getCode(), 'bad temporal access condition: getCode');
                }
            } else {
                throw $e;
            }
        }

        // Clean up.
        $this->restProxy->deleteBlob($container, $blob);
    }

    private function verifyGetBlobPropertiesWorker($res, $metadata, $properties)
    {
        /* The semantics for updating a blob's properties are as follows:
         *
         *  * A page blob's sequence number is updated only if the request meets either of the
         *    following conditions:
         *
         *     * The request sets the x-ms-sequence-number-action to max or update, and also
         *       specifies a value for the x-ms-blob-sequence-number header.
         *     * The request sets the x-ms-sequence-number-action to increment, indicating that
         *       the service should increment the sequence number by one.
         *
         *  * A page blob's size is modified only if the request specifies a value for the
         *    x-ms-content-length header.
         *
         *  * If a request sets only x-ms-blob-sequence-number and/or x-ms-content-length, and
         *    no other properties, then none of the blob's other properties are modified.
         *
         *  * If any one or more of the following properties is set in the request, then all of
         *    these properties are set together. If a value is not provided for a given property
         *    when at least one of the properties listed below is set, then that property will be
         *    cleared for the blob.
         *
         *     * x-ms-blob-cache-control
         *     * x-ms-blob-content-type
         *     * x-ms-blob-content-md5
         *     * x-ms-blob-content-encoding
         *     * x-ms-blob-content-language
         */

        $this->assertNotNull($res->getMetadata(), 'blob Metadata');
        if (is_null($metadata)) {
            $this->assertEquals(0, count($res->getMetadata()), 'Metadata');
        } else {
            $this->assertEquals(count($metadata), count($res->getMetadata()), 'Metadata');
            $resMetadata = $res->getMetadata();
            foreach($metadata as $key => $value)  {
                $this->assertEquals($value, $resMetadata[$key], 'Metadata(' . $key . ')');
            }
        }

        $this->assertNotNull($res->getProperties(), 'blob Properties');
        $this->assertNotNull($res->getProperties()->getETag(), 'blob getProperties->getETag');
        $this->assertNotNull($res->getProperties()->getLastModified(), 'blob getProperties->getLastModified');
        $this->assertEquals('PageBlob', $res->getProperties()->getBlobType(), 'blob getProperties->getBlobType');
        $this->assertEquals('unlocked', $res->getProperties()->getLeaseStatus(), 'blob getProperties->getLeaseStatus');

        if (is_null($properties) || !is_null($properties->getBlobContentLength()) || !is_null($properties->getSequenceNumber())) {
            $this->assertNull($res->getProperties()->getCacheControl(), 'blob getProperties->getCacheControl');
            $this->assertEquals('application/octet-stream', $res->getProperties()->getContentType(), 'blob getProperties->getContentType');
            $this->assertNull($res->getProperties()->getContentMD5(), 'blob getProperties->getContentMD5');
            $this->assertNull($res->getProperties()->getContentEncoding(), 'blob getProperties->getContentEncoding');
            $this->assertNull($res->getProperties()->getContentLanguage(), 'blob getProperties->getContentLanguage');
        } else {
            $this->assertEquals($properties->getBlobCacheControl(), $res->getProperties()->getCacheControl(), 'blob getProperties->getCacheControl');
            $this->assertEquals($properties->getBlobContentType(), $res->getProperties()->getContentType(), 'blob getProperties->getContentType');
            $this->assertEquals($properties->getBlobContentMD5(), $res->getProperties()->getContentMD5(), 'blob getProperties->getContentMD5');
            $this->assertEquals($properties->getBlobContentEncoding(), $res->getProperties()->getContentEncoding(), 'blob getProperties->getContentEncoding');
            $this->assertEquals($properties->getBLobContentLanguage(), $res->getProperties()->getContentLanguage(), 'blob getProperties->getContentLanguage');
        }

        if (is_null($properties) || is_null($properties->getBlobContentLength())) {
            $this->assertEquals(512, $res->getProperties()->getContentLength(), 'blob getProperties->getContentLength');
        } else {
            $this->assertEquals($properties->getBlobContentLength(), $res->getProperties()->getContentLength(), 'blob getProperties->getContentLength');
        }

        if (is_null($properties) || is_null($properties->getSequenceNumber())) {
            $this->assertEquals(0, $res->getProperties()->getSequenceNumber(), 'blob getProperties->getSequenceNumber');
        } else {
            $this->assertEquals($properties->getSequenceNumber(), $res->getProperties()->getSequenceNumber(), 'blob getProperties->getSequenceNumber');

        }

        // Make sure the last modified date is within 10 seconds
        $now = new \DateTime();
        $this->assertTrue(BlobServiceFunctionalTestData::diffInTotalSeconds(
                $res->getProperties()->getLastModified(),
                $now) < 10000,
                'Last modified date (' . $res->getProperties()->getLastModified()->format(\DateTime::RFC1123) . ') ' .
                'should be within 10 seconds of $now (' . $now->format(\DateTime::RFC1123) . ')');
    }

    /**
     * @covers WindowsAzure\Blob\BlobRestProxy::createPageBlob
     * @covers WindowsAzure\Blob\BlobRestProxy::deleteBlob
     * @covers WindowsAzure\Blob\BlobRestProxy::getBlobProperties
     * @covers WindowsAzure\Blob\BlobRestProxy::setBlobProperties
     */
    public function testSetBlobProperties()
    {
        $container = BlobServiceFunctionalTestData::getContainerName();
        $interestingSetBlobPropertiesOptions = BlobServiceFunctionalTestData::getSetBlobPropertiesOptions();

        foreach($interestingSetBlobPropertiesOptions as $properties)  {
            $this->setBlobPropertiesWorker($container, $properties);
        }
    }

    /**
     * @covers WindowsAzure\Blob\BlobRestProxy::createPageBlob
     * @covers WindowsAzure\Blob\BlobRestProxy::deleteBlob
     * @covers WindowsAzure\Blob\BlobRestProxy::getBlobProperties
     * @covers WindowsAzure\Blob\BlobRestProxy::setBlobProperties
     */
    public function testSetBlobPropertiesRoot()
    {
        $container = null;
        $interestingSetBlobPropertiesOptions = BlobServiceFunctionalTestData::getSetBlobPropertiesOptions();
        $this->setBlobPropertiesWorker($container, $interestingSetBlobPropertiesOptions[2]);
    }

    /**
     * @covers WindowsAzure\Blob\BlobRestProxy::createPageBlob
     * @covers WindowsAzure\Blob\BlobRestProxy::deleteBlob
     * @covers WindowsAzure\Blob\BlobRestProxy::getBlobProperties
     * @covers WindowsAzure\Blob\BlobRestProxy::setBlobProperties
     */
    public function testSetBlobPropertiesExplicitRoot()
    {
        $container = '$root';
        $interestingSetBlobPropertiesOptions = BlobServiceFunctionalTestData::getSetBlobPropertiesOptions();
        $this->setBlobPropertiesWorker($container, $interestingSetBlobPropertiesOptions[2]);
    }

    /**
     * @covers WindowsAzure\Blob\BlobRestProxy::createPageBlob
     * @covers WindowsAzure\Blob\BlobRestProxy::deleteBlob
     * @covers WindowsAzure\Blob\BlobRestProxy::getBlobProperties
     * @covers WindowsAzure\Blob\BlobRestProxy::setBlobProperties
     */
    private function setBlobPropertiesWorker($container, $properties)
    {
        $blob = BlobServiceFunctionalTestData::getInterestingBlobName($container);

        // Make sure there is something to test
        $createPageBlobResult = $this->restProxy->createPageBlob($container, $blob, 512);
        BlobServiceFunctionalTestData::fixETagAccessCondition($properties->getAccessCondition(), $createPageBlobResult->getETag());

        try {
            // And put in some properties
            $res = $this->restProxy->setBlobProperties($container, $blob, $properties);

            if (!is_null($properties->getTimeout()) && $properties->getTimeout() < 1) {
                $this->assertTrue(false, 'Expect negative timeouts in options to throw');
            }
            if (!BlobServiceFunctionalTestData::passTemporalAccessCondition($properties->getAccessCondition())) {
                $this->assertTrue(false, 'Failing access condition should throw');
            }
            if (!BlobServiceFunctionalTestData::passTemporalAccessCondition($properties->getAccessCondition())) {
                $this->assertTrue(false, 'Expect failing access condition to throw');
            }

            $this->verifySetBlobPropertiesWorker($res);

            $res2 = $this->restProxy->getBlobProperties($container, $blob);
            $this->verifyGetBlobPropertiesWorker($res2, null, $properties);
        } catch (ServiceException $e) {
            if (!is_null($properties->getTimeout()) && $properties->getTimeout() < 1) {
                $this->assertEquals(TestResources::STATUS_INTERNAL_SERVER_ERROR, $e->getCode(), 'bad timeout: getCode');
            } else if (!BlobServiceFunctionalTestData::passTemporalAccessCondition($properties->getAccessCondition())) {
                $this->assertEquals(TestResources::STATUS_PRECONDITION_FAILED, $e->getCode(), 'bad temporal access condition: getCode');
            } else if (!BlobServiceFunctionalTestData::passETagAccessCondition($properties->getAccessCondition())) {
                $this->assertEquals(TestResources::STATUS_PRECONDITION_FAILED, $e->getCode(), 'bad etag access condition: getCode');
            } else {
            }
        }

        // Clean up.
        $this->restProxy->deleteBlob($container, $blob);
    }

    private function verifySetBlobPropertiesWorker($res)
    {
        $this->assertNotNull($res->getETag(), 'blob getETag');
        $this->assertNotNull($res->getLastModified(), 'blob getLastModified');
        $this->assertNotNull($res->getSequenceNumber(), 'blob getSequenceNumber');
        $this->assertEquals(0, $res->getSequenceNumber(), 'blob getSequenceNumber');

        // Make sure the last modified date is within 10 seconds
        $now = new \DateTime();
        $this->assertTrue(BlobServiceFunctionalTestData::diffInTotalSeconds(
                $res->getLastModified(),
                $now) < 10000,
                'Last modified date (' . $res->getLastModified()->format(\DateTime::RFC1123) . ') ' .
                'should be within 10 seconds of $now (' . $now->format(\DateTime::RFC1123) . ')');
    }

    /**
     * @covers WindowsAzure\Blob\BlobRestProxy::createPageBlob
     * @covers WindowsAzure\Blob\BlobRestProxy::deleteBlob
     * @covers WindowsAzure\Blob\BlobRestProxy::getBlob
     * @covers WindowsAzure\Blob\BlobRestProxy::setBlobMetadata
     */
    public function testGetBlob_NoOptions()
    {
        $container = BlobServiceFunctionalTestData::getContainerName();
        $this->getBlobWorker(null, $container);
    }

    /**
     * @covers WindowsAzure\Blob\BlobRestProxy::createPageBlob
     * @covers WindowsAzure\Blob\BlobRestProxy::deleteBlob
     * @covers WindowsAzure\Blob\BlobRestProxy::getBlob
     * @covers WindowsAzure\Blob\BlobRestProxy::setBlobMetadata
     */
    public function testGetBlob_NoOptionsExplicitRoot()
    {
        $this->getBlobWorker(null, '$root');
    }

    /**
     * @covers WindowsAzure\Blob\BlobRestProxy::createPageBlob
     * @covers WindowsAzure\Blob\BlobRestProxy::deleteBlob
     * @covers WindowsAzure\Blob\BlobRestProxy::getBlob
     * @covers WindowsAzure\Blob\BlobRestProxy::setBlobMetadata
     */
    public function testGetBlob_NoOptionsRoot()
    {
        $this->getBlobWorker(null, '');
    }

    /**
     * @covers WindowsAzure\Blob\BlobRestProxy::createPageBlob
     * @covers WindowsAzure\Blob\BlobRestProxy::deleteBlob
     * @covers WindowsAzure\Blob\BlobRestProxy::getBlob
     * @covers WindowsAzure\Blob\BlobRestProxy::setBlobMetadata
     */
    public function testGetBlob_AllOptions()
    {
        $container = BlobServiceFunctionalTestData::getContainerName();
        $interestingGetBlobOptions = BlobServiceFunctionalTestData::getGetBlobOptions();
        foreach($interestingGetBlobOptions as $options)  {
            $this->getBlobWorker($options, $container);
        }
    }

    /**
     * @covers WindowsAzure\Blob\BlobRestProxy::createBlobSnapshot
     * @covers WindowsAzure\Blob\BlobRestProxy::createPageBlob
     * @covers WindowsAzure\Blob\BlobRestProxy::deleteBlob
     * @covers WindowsAzure\Blob\BlobRestProxy::getBlob
     * @covers WindowsAzure\Blob\BlobRestProxy::setBlobMetadata
     */
    private function getBlobWorker($options, $container)
    {
        $blob = BlobServiceFunctionalTestData::getInterestingBlobName($container);

        // Make sure there is something to test
        $dataSize = 512;
        $this->restProxy->createPageBlob($container, $blob, $dataSize);

        $metadata = BlobServiceFunctionalTestData::getNiceMetadata();
        $sbmd = $this->restProxy->setBlobMetadata($container, $blob, $metadata);

        $snapshot = $this->restProxy->createBlobSnapshot($container, $blob);
        $this->restProxy->createBlobSnapshot($container, $blob);

        if (!is_null($options)) {
            BlobServiceFunctionalTestData::fixETagAccessCondition($options->getAccessCondition(), $sbmd->getETag());
            $options->setSnapshot(is_null($options->getSnapshot()) ? null : $snapshot->getSnapshot());
        }

        try {
            $res = (is_null($options) ? $this->restProxy->getBlob($container, $blob) : $this->restProxy->getBlob($container, $blob, $options));

            if (is_null($options)) {
                $options = new GetBlobOptions();
            }

            if (!is_null($options->getTimeout()) && $options->getTimeout() < 1) {
                $this->assertTrue(false, 'Expect negative timeouts in $options to throw');
            }
            if (!BlobServiceFunctionalTestData::passTemporalAccessCondition($options->getAccessCondition())) {
                $this->assertTrue(false, 'Expect failing temporal access condition should throw');
            }
            if (!BlobServiceFunctionalTestData::passTemporalAccessCondition($options->getAccessCondition())) {
                $this->assertTrue(false, 'Expect failing etag access condition to throw');
            }
            if ($options->getComputeRangeMD5() && is_null($options->getRangeStart())) {
                $this->assertTrue(false, 'Expect compute range MD5 to fail if range not set');
            }

            $this->verifyGetBlobWorker($res, $options, $dataSize, $metadata);
        } catch (ServiceException $e) {
            if (!is_null($options->getAccessCondition()) &&
                    !$this->hasSecureEndpoint() &&
                    $e->getCode() == TestResources::STATUS_FORBIDDEN) {
                // Proxies can eat the access condition headers of
                // unsecured (http) requests, which causes the authentication
                // to fail, with a 403:Forbidden. There is nothing much that
                // can be done about this, other than ignore it.
            } else if (!is_null($options->getTimeout()) && $options->getTimeout() < 1) {
                $this->assertEquals(TestResources::STATUS_INTERNAL_SERVER_ERROR, $e->getCode(), 'bad timeout: getCode');
            } else if (!BlobServiceFunctionalTestData::passTemporalAccessCondition($options->getAccessCondition())) {
                if ($options->getAccessCondition()->getHeader() == Resources::IF_MODIFIED_SINCE) {
                    $this->assertEquals(TestResources::STATUS_NOT_MODIFIED, $e->getCode(), 'bad temporal access condition IF_MODIFIED_SINCE: getCode');
                } else {
                    $this->assertEquals(TestResources::STATUS_PRECONDITION_FAILED, $e->getCode(), 'bad temporal access condition IF_UNMODIFIED_SINCE: getCode');
                }
            } else if (!BlobServiceFunctionalTestData::passETagAccessCondition($options->getAccessCondition())) {
                $this->assertEquals(TestResources::STATUS_PRECONDITION_FAILED, $e->getCode(), 'bad etag access condition: getCode');
            } else if ($options->getComputeRangeMD5() && is_null($options->getRangeStart())) {
                $this->assertEquals(TestResources::STATUS_BAD_REQUEST, $e->getCode(), 'Expect compute range MD5 to fail when range not set: getCode');
            } else {
                throw $e;
            }
        }

        // Clean up.
        $this->restProxy->deleteBlob($container, $blob);
    }

    private function verifyGetBlobWorker($res, $options, $dataSize, $metadata)
    {
        $this->assertNotNull($res, 'result');

        $content =  stream_get_contents($res->getContentStream());

        $rangeSize = $dataSize;
        if (!is_null($options->getRangeEnd())) {
            $rangeSize = (int) $options->getRangeEnd() + 1;
        }
        if (!is_null($options->getRangeStart())) {
            $rangeSize -= $options->getRangeStart();
        } else {
            // One might expect that not specifying the start would just take the
            // first $rangeEnd bytes, but instead the Azure service ignores
            // the malformed Range headers.
            $rangeSize = $dataSize;
        }

        $this->assertEquals($rangeSize, strlen($content), '$content length and range');

        if ($options->getComputeRangeMD5()) {
            // Compute the MD5 from the stream.
            $md5 = base64_encode(md5($content, true));
            $this->assertEquals($md5, $res->getProperties()->getContentMD5(), 'asked for MD5, result->getProperties()->getContentMD5');
        } else {
            $this->assertNull($res->getProperties()->getContentMD5(), 'did not ask for MD5, result->getProperties()->getContentMD5');
        }

        $this->assertNotNull($res->getMetadata(), 'blob Metadata');
        $resMetadata = $res->getMetadata();
        $this->assertEquals(count($metadata), count($resMetadata), 'Metadata');
        foreach($metadata as $key => $value)  {
            $this->assertEquals($value, $resMetadata[$key], 'Metadata(' . $key . ')');
        }

        // Rest of the properties are tested elsewhere.
    }

    /**
     * @covers WindowsAzure\Blob\BlobRestProxy::createBlobSnapshot
     * @covers WindowsAzure\Blob\BlobRestProxy::createPageBlob
     * @covers WindowsAzure\Blob\BlobRestProxy::deleteBlob
     * @covers WindowsAzure\Blob\BlobRestProxy::getBlob
     * @covers WindowsAzure\Blob\BlobRestProxy::listBlobs
     */
    public function testDeleteBlobNoOptions()
    {
        $container = BlobServiceFunctionalTestData::getContainerName();
        $this->deleteBlobWorker(null, $container);
    }

    /**
     * @covers WindowsAzure\Blob\BlobRestProxy::createBlobSnapshot
     * @covers WindowsAzure\Blob\BlobRestProxy::createPageBlob
     * @covers WindowsAzure\Blob\BlobRestProxy::deleteBlob
     * @covers WindowsAzure\Blob\BlobRestProxy::getBlob
     * @covers WindowsAzure\Blob\BlobRestProxy::listBlobs
     */
    public function testDeleteBlobNoOptionsExplicitRoot()
    {
        $this->deleteBlobWorker(null, '$root');
    }

    /**
     * @covers WindowsAzure\Blob\BlobRestProxy::createBlobSnapshot
     * @covers WindowsAzure\Blob\BlobRestProxy::createPageBlob
     * @covers WindowsAzure\Blob\BlobRestProxy::deleteBlob
     * @covers WindowsAzure\Blob\BlobRestProxy::getBlob
     * @covers WindowsAzure\Blob\BlobRestProxy::listBlobs
     */
    public function testDeleteBlobNoOptionsRoot()
    {
        $this->deleteBlobWorker(null, '');
    }

    /**
     * @covers WindowsAzure\Blob\BlobRestProxy::createBlobSnapshot
     * @covers WindowsAzure\Blob\BlobRestProxy::createPageBlob
     * @covers WindowsAzure\Blob\BlobRestProxy::deleteBlob
     * @covers WindowsAzure\Blob\BlobRestProxy::getBlob
     * @covers WindowsAzure\Blob\BlobRestProxy::listBlobs
     */
    public function testDeleteBlob()
    {
        $container = BlobServiceFunctionalTestData::getContainerName();
        $interestingDeleteBlobOptions = BlobServiceFunctionalTestData::getDeleteBlobOptions();
        foreach($interestingDeleteBlobOptions as $options)  {
            $this->deleteBlobWorker($options, $container);
        }
    }

    /**
     * @covers WindowsAzure\Blob\BlobRestProxy::createBlobSnapshot
     * @covers WindowsAzure\Blob\BlobRestProxy::createPageBlob
     * @covers WindowsAzure\Blob\BlobRestProxy::deleteBlob
     * @covers WindowsAzure\Blob\BlobRestProxy::getBlob
     * @covers WindowsAzure\Blob\BlobRestProxy::listBlobs
     */
    private function deleteBlobWorker($options, $container)
    {
        $blob = BlobServiceFunctionalTestData::getInterestingBlobName($container);

        // Make sure there is something to test
        $dataSize = 512;
        $this->restProxy->createPageBlob($container, $blob, $dataSize);
        $snapshot = $this->restProxy->createBlobSnapshot($container, $blob);
        $this->restProxy->createBlobSnapshot($container, $blob);

        $blobinfo = $this->restProxy->getBlob($container, $blob);
        if (!is_null($options)) {
            BlobServiceFunctionalTestData::fixETagAccessCondition($options->getAccessCondition(), $blobinfo->getProperties()->getETag());
            $options->setSnapshot(is_null($options->getSnapshot()) ? null : $snapshot->getSnapshot());
        }

        $deleted = false;
        try {
            if (is_null($options)) {
                $this->restProxy->deleteBlob($container, $blob);
            } else {
                $this->restProxy->deleteBlob($container, $blob, $options);
            }
            $deleted = true;

            if (is_null($options)) {
                $options = new DeleteBlobOptions();
            }

            if (!is_null($options->getTimeout()) && $options->getTimeout() < 1) {
                $this->assertTrue(false, 'Expect negative timeouts in $options to throw');
            }
            if (!BlobServiceFunctionalTestData::passTemporalAccessCondition($options->getAccessCondition())) {
                $this->assertTrue(false, 'Expect failing temporal access condition should throw');
            }
            if (!BlobServiceFunctionalTestData::passTemporalAccessCondition($options->getAccessCondition())) {
                $this->assertTrue(false, 'Expect failing etag access condition to throw');
            }

            $listOptions = new ListBlobsOptions();
            $listOptions->setIncludeSnapshots(true);
            $listOptions->setPrefix($blob);
            $listBlobsResult = $this->restProxy->listBlobs($container == '' ? '$root' : $container, $listOptions);
            $blobs = $listBlobsResult->getBlobs();

            $this->verifyDeleteBlobWorker($options, $blobs);
        } catch (ServiceException $e) {
            if (!is_null($options->getTimeout()) && $options->getTimeout() < 1) {
                $this->assertEquals(TestResources::STATUS_INTERNAL_SERVER_ERROR, $e->getCode(), 'bad timeout: deleteHttpStatusCode');
            } else if (!BlobServiceFunctionalTestData::passTemporalAccessCondition($options->getAccessCondition())) {
                $this->assertEquals(TestResources::STATUS_PRECONDITION_FAILED, $e->getCode(), 'bad temporal access condition IF_UNMODIFIED_SINCE: deleteHttpStatusCode');
            } else if (!BlobServiceFunctionalTestData::passETagAccessCondition($options->getAccessCondition())) {
                $this->assertEquals(TestResources::STATUS_PRECONDITION_FAILED, $e->getCode(), 'bad etag access condition: deleteHttpStatusCode');
            } else {
                throw $e;
            }
        }

        // Clean up.
        if (!$deleted) {
            $this->restProxy->deleteBlob($container, $blob);
        }
    }

    private function verifyDeleteBlobWorker($options, $blobs)
    {
        if (!is_null($options->getSnapshot())) {
            $this->assertEquals(2, count($blobs), 'when give a snapshot, $blobs with same name as main blob');
        } else if ($options->getDeleteSnaphotsOnly()) {
            $this->assertEquals(1, count($blobs), 'when getDeleteSnaphotsOnly=true, $blobs with same name as main blob');
        } else {
            $this->assertEquals(0, count($blobs), 'when getDeleteSnaphotsOnly=false, blob with same name as main blob');
        }
    }


    /**
     * @covers WindowsAzure\Blob\BlobRestProxy::createBlobSnapshot
     * @covers WindowsAzure\Blob\BlobRestProxy::createPageBlob
     * @covers WindowsAzure\Blob\BlobRestProxy::deleteBlob
     * @covers WindowsAzure\Blob\BlobRestProxy::getBlob
     * @covers WindowsAzure\Blob\BlobRestProxy::listBlobs
     */
    public function testCreateBlobSnapshotNoOptionsContainer()
    {
        $container = BlobServiceFunctionalTestData::getContainerName();
        $this->createBlobSnapshotWorker(null, $container);
    }

    /**
     * @covers WindowsAzure\Blob\BlobRestProxy::createBlobSnapshot
     * @covers WindowsAzure\Blob\BlobRestProxy::createPageBlob
     * @covers WindowsAzure\Blob\BlobRestProxy::deleteBlob
     * @covers WindowsAzure\Blob\BlobRestProxy::getBlob
     * @covers WindowsAzure\Blob\BlobRestProxy::listBlobs
     */
    public function testCreateBlobSnapshotNoOptionsExplicitRoot()
    {
        $this->createBlobSnapshotWorker(null, '$root');
    }

    /**
     * @covers WindowsAzure\Blob\BlobRestProxy::createBlobSnapshot
     * @covers WindowsAzure\Blob\BlobRestProxy::createPageBlob
     * @covers WindowsAzure\Blob\BlobRestProxy::deleteBlob
     * @covers WindowsAzure\Blob\BlobRestProxy::getBlob
     * @covers WindowsAzure\Blob\BlobRestProxy::listBlobs
     */
    public function testCreateBlobSnapshotNoOptionsRoot()
    {
        $this->createBlobSnapshotWorker(null, '');
    }

    /**
     * @covers WindowsAzure\Blob\BlobRestProxy::createBlobSnapshot
     * @covers WindowsAzure\Blob\BlobRestProxy::createPageBlob
     * @covers WindowsAzure\Blob\BlobRestProxy::deleteBlob
     * @covers WindowsAzure\Blob\BlobRestProxy::getBlob
     * @covers WindowsAzure\Blob\BlobRestProxy::listBlobs
     */
    public function testCreateBlobSnapshotAllOptions()
    {
        $container = BlobServiceFunctionalTestData::getContainerName();
        $interestingCreateBlobSnapshotOptions = BlobServiceFunctionalTestData::getCreateBlobSnapshotOptions();
        foreach($interestingCreateBlobSnapshotOptions as $options)  {
            $this->createBlobSnapshotWorker($options, $container);
        }
    }

    /**
     * @covers WindowsAzure\Blob\BlobRestProxy::createBlobSnapshot
     * @covers WindowsAzure\Blob\BlobRestProxy::createPageBlob
     * @covers WindowsAzure\Blob\BlobRestProxy::deleteBlob
     * @covers WindowsAzure\Blob\BlobRestProxy::getBlob
     * @covers WindowsAzure\Blob\BlobRestProxy::listBlobs
     */
    private function createBlobSnapshotWorker($options, $container)
    {
        $blob = BlobServiceFunctionalTestData::getInterestingBlobName($container);

        // Make sure there is something to test
        $dataSize = 512;
        $this->restProxy->createPageBlob($container, $blob, $dataSize);
        $snapshot1 = $this->restProxy->createBlobSnapshot($container, $blob);
        if (!is_null($options)) {
            BlobServiceFunctionalTestData::fixETagAccessCondition($options->getAccessCondition(), $snapshot1->getETag());
        }

        try {
            $res = (is_null($options) ? $this->restProxy->createBlobSnapshot($container, $blob) : $this->restProxy->createBlobSnapshot($container, $blob, $options));

            if (is_null($options)) {
                $options = new CreateBlobSnapshotOptions();
            }

            if (!is_null($options->getTimeout()) && $options->getTimeout() < 1) {
                $this->assertTrue(false, 'Expect negative timeouts in $options to throw');
            }
            if (!BlobServiceFunctionalTestData::passTemporalAccessCondition($options->getAccessCondition())) {
                $this->assertTrue(false, 'Expect failing temporal access condition should throw');
            }
            if (!BlobServiceFunctionalTestData::passTemporalAccessCondition($options->getAccessCondition())) {
                $this->assertTrue(false, 'Expect failing etag access condition to throw');
            }

            $listOptions = new ListBlobsOptions();
            $listOptions->setIncludeSnapshots(true);
            $listOptions->setPrefix($blob);
            $listBlobsResult = $this->restProxy->listBlobs($container == '' ? '$root' : $container, $listOptions);
            $blobs = $listBlobsResult->getBlobs();

            $getBlobOptions = new GetBlobOptions();
            $getBlobOptions->setSnapshot($res->getSnapshot());
            $getBlobResult = $this->restProxy->getBlob($container, $blob, $getBlobOptions);

            $this->verifyCreateBlobSnapshotWorker($res, $options, $blobs, $getBlobResult);
        } catch (ServiceException $e) {
            if (!is_null($options->getTimeout()) && $options->getTimeout() < 1) {
                $this->assertEquals(TestResources::STATUS_INTERNAL_SERVER_ERROR, $e->getCode(), 'bad timeout: deleteHttpStatusCode');
            } else if (!BlobServiceFunctionalTestData::passTemporalAccessCondition($options->getAccessCondition())) {
                $this->assertEquals(TestResources::STATUS_PRECONDITION_FAILED, $e->getCode(), 'bad temporal access condition IF_UNMODIFIED_SINCE: deleteHttpStatusCode');
            } else if (!BlobServiceFunctionalTestData::passETagAccessCondition($options->getAccessCondition())) {
                $this->assertEquals(TestResources::STATUS_PRECONDITION_FAILED, $e->getCode(), 'bad etag access condition: deleteHttpStatusCode');
            } else {
                throw $e;
            }
        }

        // Clean up.
        $this->restProxy->deleteBlob($container, $blob);
    }

    private function verifyCreateBlobSnapshotWorker($res, $options, $blobs, $getBlobResult)
    {
        $now = new \DateTime();

        $this->assertNotNull($res->getETag(), 'result etag');

        $snapshotDate = new \DateTime($res->getSnapshot());

        // Make sure the last modified date is within 10 seconds
        $this->assertTrue(
                BlobServiceFunctionalTestData::diffInTotalSeconds($snapshotDate, $now) < 10,
                'Last modified date (' . $snapshotDate->format(\DateTime::RFC1123) . ')'.
                ' should be within 10 seconds of $now (' . $now->format(\DateTime::RFC1123) . ')');

        // Make sure the last modified date is within 10 seconds
        $this->assertTrue(
                BlobServiceFunctionalTestData::diffInTotalSeconds($res->getLastModified(), $now) < 10,
                'Last modified date (' . $res->getLastModified()->format(\DateTime::RFC1123) . ')'.
                ' should be within 10 seconds of $now (' . $now->format(\DateTime::RFC1123) . ')');

        $this->assertEquals(3, count($blobs), 'Should end up with 3 $blobs with same name as main blob');

        $this->assertNotNull($getBlobResult->getMetadata(), 'blob Metadata');
        $this->assertEquals(count($options->getMetadata()), count($getBlobResult->getMetadata()), 'Metadata');
        $retMetadata = $getBlobResult->getMetadata();
        if (!is_null($options->getMetadata())) {
            foreach($options->getMetadata() as $key => $value)  {
                $this->assertEquals($value, $retMetadata[$key], 'Metadata(' . $key . ')');
            }
        }
    }


    /**
     * @covers WindowsAzure\Blob\BlobRestProxy::copyBlob
     * @covers WindowsAzure\Blob\BlobRestProxy::createBlobSnapshot
     * @covers WindowsAzure\Blob\BlobRestProxy::createPageBlob
     * @covers WindowsAzure\Blob\BlobRestProxy::deleteBlob
     * @covers WindowsAzure\Blob\BlobRestProxy::getBlob
     * @covers WindowsAzure\Blob\BlobRestProxy::listBlobs
     * @covers WindowsAzure\Blob\BlobRestProxy::setBlobMetadata
     */
    public function testCopyBlobNoOptions()
    {
        $sourceContainers = array(
            BlobServiceFunctionalTestData::$testContainerNames[0],
            '$root',
            '');

        $destContainers = array(
            BlobServiceFunctionalTestData::$testContainerNames[1],
            '$root',
            '');

        foreach($sourceContainers as $sourceContainer)  {
            foreach($destContainers as $destContainer)  {
                $this->copyBlobWorker(null, $sourceContainer, $destContainer);
            }
        }
    }

    /**
     * @covers WindowsAzure\Blob\BlobRestProxy::copyBlob
     * @covers WindowsAzure\Blob\BlobRestProxy::createBlobSnapshot
     * @covers WindowsAzure\Blob\BlobRestProxy::createPageBlob
     * @covers WindowsAzure\Blob\BlobRestProxy::deleteBlob
     * @covers WindowsAzure\Blob\BlobRestProxy::getBlob
     * @covers WindowsAzure\Blob\BlobRestProxy::listBlobs
     * @covers WindowsAzure\Blob\BlobRestProxy::setBlobMetadata
     */
    public function testCopyBlobAllOptions()
    {
        $sourceContainer = BlobServiceFunctionalTestData::$testContainerNames[0];
        $destContainer = BlobServiceFunctionalTestData::$testContainerNames[1];

        $interestingCopyBlobOptions = BlobServiceFunctionalTestData::getCopyBlobOptions();
        foreach($interestingCopyBlobOptions as $options)  {
            $this->copyBlobWorker($options, $sourceContainer, $destContainer);
        }
    }

    /**
     * @covers WindowsAzure\Blob\BlobRestProxy::copyBlob
     * @covers WindowsAzure\Blob\BlobRestProxy::createBlobSnapshot
     * @covers WindowsAzure\Blob\BlobRestProxy::createPageBlob
     * @covers WindowsAzure\Blob\BlobRestProxy::deleteBlob
     * @covers WindowsAzure\Blob\BlobRestProxy::getBlob
     * @covers WindowsAzure\Blob\BlobRestProxy::listBlobs
     * @covers WindowsAzure\Blob\BlobRestProxy::setBlobMetadata
     */
    private function copyBlobWorker($options, $sourceContainer, $destContainer)
    {
        $sourceBlob = BlobServiceFunctionalTestData::getInterestingBlobName($sourceContainer);
        $destBlob = BlobServiceFunctionalTestData::getInterestingBlobName($destContainer);

        // Make sure there is something to test
        $sourceDataSize = 512;
        $this->restProxy->createPageBlob($sourceContainer, $sourceBlob, $sourceDataSize);

        $destDataSize = 2048;
        $destBlobInfo = $this->restProxy->createPageBlob($destContainer, $destBlob, $destDataSize);
        $this->restProxy->createBlobSnapshot($destContainer, $destBlob);

        $metadata = BlobServiceFunctionalTestData::getNiceMetadata();
        $this->restProxy->setBlobMetadata($sourceContainer, $sourceBlob, $metadata);
        $snapshot = $this->restProxy->createBlobSnapshot($sourceContainer, $sourceBlob);
        if (!is_null($options)) {
            BlobServiceFunctionalTestData::fixETagAccessCondition($options->getSourceAccessCondition(), $snapshot->getETag());
            BlobServiceFunctionalTestData::fixETagAccessCondition($options->getAccessCondition(), $destBlobInfo->getETag());
            $options->setSourceSnapshot(is_null($options->getSourceSnapshot()) ? null : $snapshot->getSnapshot());
        }

        try {
            if (is_null($options)) {
                $this->restProxy->copyBlob($destContainer, $destBlob, $sourceContainer, $sourceBlob);
            } else {
                $this->restProxy->copyBlob($destContainer, $destBlob, $sourceContainer, $sourceBlob, $options);
            }

            if (is_null($options)) {
                $options = new CopyBlobOptions();
            }

            if (!is_null($options->getTimeout()) && $options->getTimeout() < 1) {
                $this->assertTrue(false, 'Expect negative timeouts in $options to throw');
            }
            if (!BlobServiceFunctionalTestData::passTemporalAccessCondition($options->getSourceAccessCondition())) {
                $this->assertTrue(false, 'Expect failing source temporal access condition should throw');
            }
            if (!BlobServiceFunctionalTestData::passTemporalAccessCondition($options->getSourceAccessCondition())) {
                $this->assertTrue(false, 'Expect failing source etag access condition to throw');
            }
            if (!BlobServiceFunctionalTestData::passTemporalAccessCondition($options->getAccessCondition())) {
                $this->assertTrue(false, 'Expect failing dest temporal access condition should throw');
            }
            if (!BlobServiceFunctionalTestData::passTemporalAccessCondition($options->getAccessCondition())) {
                $this->assertTrue(false, 'Expect failing dest etag access condition to throw');
            }

            $listOptions = new ListBlobsOptions();
            $listOptions->setIncludeSnapshots(true);
            $listOptions->setPrefix($destBlob);
            $listBlobsResult = $this->restProxy->listBlobs($destContainer == '' ? '$root' : $destContainer, $listOptions);
            $blobs = $listBlobsResult->getBlobs();

            $getBlobResult = $this->restProxy->getBlob($destContainer, $destBlob);

            $this->verifyCopyBlobWorker($options, $blobs, $getBlobResult, $sourceDataSize, $metadata);
        } catch (ServiceException $e) {
            if (is_null($options)) {
                $options = new CopyBlobOptions();
            }

            if (!is_null($options->getTimeout()) && $options->getTimeout() < 1) {
                $this->assertEquals(500, $e->getCode(), 'bad timeout: deleteHttpStatusCode');
            } else if (!BlobServiceFunctionalTestData::passTemporalAccessCondition($options->getSourceAccessCondition())) {
                $this->assertEquals(412, $e->getCode(), 'bad source temporal access condition IF_UNMODIFIED_SINCE: deleteHttpStatusCode');
            } else if (!BlobServiceFunctionalTestData::passETagAccessCondition($options->getSourceAccessCondition())) {
                $this->assertEquals(412, $e->getCode(), 'bad source etag access condition: deleteHttpStatusCode');
            } else if (!BlobServiceFunctionalTestData::passTemporalAccessCondition($options->getAccessCondition())) {
                $this->assertEquals(412, $e->getCode(), 'bad dest temporal access condition IF_UNMODIFIED_SINCE: deleteHttpStatusCode');
            } else if (!BlobServiceFunctionalTestData::passETagAccessCondition($options->getAccessCondition())) {
                $this->assertEquals(412, $e->getCode(), 'bad dest etag access condition: deleteHttpStatusCode');
            } else {
                throw $e;
            }
        }

        // Clean up.
        $this->restProxy->deleteBlob($sourceContainer, $sourceBlob);
        $this->restProxy->deleteBlob($destContainer, $destBlob);
    }

    private function verifyCopyBlobWorker($options, $blobs, $getBlobResult, $sourceDataSize, $metadata)
    {
        $this->assertEquals(2, count($blobs), 'Should end up with 2 blob with same name as dest blob, snapshot and copied blob');
        $this->assertEquals($sourceDataSize, $getBlobResult->getProperties()->getContentLength(), 'Dest length should be the same as the source length');

        $this->assertNotNull($getBlobResult->getMetadata(), 'blob Metadata');
        $expectedMetadata = (count($options->getMetadata()) == 0 ? $metadata : $options->getMetadata());
        $resMetadata = $getBlobResult->getMetadata();
        $this->assertEquals(count($expectedMetadata), count($resMetadata), 'Metadata');
        foreach($expectedMetadata as $key => $value)  {
            $this->assertEquals($value, $resMetadata[strtolower($key)], 'Metadata(' . $key . ')');
        }

        // Make sure the last modified date is within 10 seconds
        $now = new \DateTime();
        $this->assertTrue(
                BlobServiceFunctionalTestData::diffInTotalSeconds($getBlobResult->getProperties()->getLastModified(), $now) < 10,
                'Last modified date (' . $getBlobResult->getProperties()->getLastModified()->format(\DateTime::RFC1123) . ')'.
                ' should be within 10 seconds of $now (' . $now->format(\DateTime::RFC1123) . ')');
    }

    //    createBlockBlob
    //    createBlobBlock
    //    commitBlobBlocks
    //    listBlobBlocks

    //    createPageBlob
    //    createBlobPages
    //    clearBlobPages
    //    listBlobRegions

    //    acquireLease
    //    renewLease
    //    releaseLease
    //    breakLease

}

