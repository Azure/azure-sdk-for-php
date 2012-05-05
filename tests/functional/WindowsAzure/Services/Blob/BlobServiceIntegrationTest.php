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
 * @package    Tests\Functional\WindowsAzure\Services\Blob
 * @author     Jason Cooke <jcooke@microsoft.com>
 * @copyright  2012 Microsoft Corporation
 * @license    http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link       http://pear.php.net/package/azure-sdk-for-php
 */

namespace Tests\Functional\WindowsAzure\Services\Blob;

use WindowsAzure\Utilities;
use WindowsAzure\Resources;
use WindowsAzure\Core\ServiceException;
use WindowsAzure\Core\WindowsAzureUtilities;
use WindowsAzure\Services\Blob\BlobService;
use WindowsAzure\Services\Blob\Models\AccessCondition;
use WindowsAzure\Services\Blob\Models\BlobProperties;
use WindowsAzure\Services\Blob\Models\BlockList;
use WindowsAzure\Services\Blob\Models\ContainerACL;
use WindowsAzure\Services\Blob\Models\CreateBlobOptions;
use WindowsAzure\Services\Blob\Models\CreateBlobPagesResult;
use WindowsAzure\Services\Blob\Models\CreateBlobSnapshotOptions;
use WindowsAzure\Services\Blob\Models\CreateBlobSnapshotResult;
use WindowsAzure\Services\Blob\Models\CreateContainerOptions;
use WindowsAzure\Services\Blob\Models\GetBlobMetadataResult;
use WindowsAzure\Services\Blob\Models\GetBlobOptions;
use WindowsAzure\Services\Blob\Models\GetBlobPropertiesOptions;
use WindowsAzure\Services\Blob\Models\GetBlobPropertiesResult;
use WindowsAzure\Services\Blob\Models\GetBlobResult;
use WindowsAzure\Services\Blob\Models\GetContainerPropertiesResult;
use WindowsAzure\Services\Blob\Models\ListBlobBlocksOptions;
use WindowsAzure\Services\Blob\Models\ListBlobBlocksResult;
use WindowsAzure\Services\Blob\Models\ListBlobRegionsResult;
use WindowsAzure\Services\Blob\Models\ListBlobsOptions;
use WindowsAzure\Services\Blob\Models\ListBlobsResult;
use WindowsAzure\Services\Blob\Models\ListContainersOptions;
use WindowsAzure\Services\Blob\Models\ListContainersResult\Container;
use WindowsAzure\Services\Blob\Models\ListContainersResult;
use WindowsAzure\Services\Blob\Models\PageRange;
use WindowsAzure\Services\Blob\Models\ServiceProperties;
use WindowsAzure\Services\Blob\Models\SetBlobMetadataResult;
use WindowsAzure\Services\Blob\Models\SetBlobPropertiesOptions;
use WindowsAzure\Services\Blob\Models\SetBlobPropertiesResult;
use WindowsAzure\Services\Blob\Models\PublicAccessType;
use WindowsAzure\Services\Blob\Models\BlobBlockType;

class BlobServiceIntegrationTest extends IntegrationTestBase {
    private static $testContainersPrefix = 'sdktest-';
    private static $createableContainersPrefix = 'csdktest-';
    private static $BLOB_FOR_ROOT_CONTAINER = 'sdktestroot';
    private static $CREATEABLE_CONTAINER_1;
    private static $CREATEABLE_CONTAINER_2;
    private static $CREATEABLE_CONTAINER_3;
    private static $CREATEABLE_CONTAINER_4;
    private static $TEST_CONTAINER_FOR_BLOBS;
    private static $TEST_CONTAINER_FOR_BLOBS_2;
    private static $TEST_CONTAINER_FOR_LISTING;
    private static $creatableContainers;
    private static $testContainers;

    public function setUp() {
        // Setup container names array (list of container names used by
        // integration tests)
        self::$testContainers = array();
        for ($i = 0; $i < 10; $i++) {
            self::$testContainers[$i] = self::$testContainersPrefix . ($i + 1);
        }

        self::$creatableContainers = array();
        for ($i = 0; $i < 10; $i++) {
            self::$creatableContainers[$i] = self::$createableContainersPrefix . ($i + 1);
        }

        self::$CREATEABLE_CONTAINER_1 = self::$creatableContainers[0];
        self::$CREATEABLE_CONTAINER_2 = self::$creatableContainers[1];
        self::$CREATEABLE_CONTAINER_3 = self::$creatableContainers[2];
        self::$CREATEABLE_CONTAINER_4 = self::$creatableContainers[3];

        self::$TEST_CONTAINER_FOR_BLOBS = self::$testContainers[0];
        self::$TEST_CONTAINER_FOR_BLOBS_2 = self::$testContainers[1];
        self::$TEST_CONTAINER_FOR_LISTING = self::$testContainers[2];

        // Create all test containers and their content
        self::createContainers(self::$testContainersPrefix, self::$testContainers);
    }

    public function tearDown() {
        self::deleteContainers(self::$testContainersPrefix, self::$testContainers);
        self::deleteContainers(self::$createableContainersPrefix, self::$creatableContainers);
    }

    private static function createContainers($prefix, $list) {
        $service = self::createService();
        $containers = self::listContainers($prefix);
        foreach($list as $item) {
            if (array_search($item, $containers) === FALSE) {
                $service->createContainer($item);
            }
        }
    }

    private static function deleteContainers($prefix, $list) {
        $service = self::createService();
        $containers = self::listContainers($prefix);
        foreach($list as $item)  {
            if (!(array_search($item, $containers) === FALSE)) {
                $service->deleteContainer($item);
            }
        }
    }

    private static function listContainers($prefix) {
        $service = self::createService();
        $result = array();
        $opts = new ListContainersOptions();
        $opts->setPrefix($prefix);
        $list = $service->listContainers($opts);
        foreach($list->getContainers() as $item)  {
            array_push($result, $item->getName());
        }
        return $result;
    }

    private static function createService() {
        $tmp = new IntegrationTestBase();
        return $tmp->wrapper;
    }
    
    public function testGetServicePropertiesWorks() {
        // Act
        $shouldReturn = false;
        try {
            $props = $this->wrapper->getServiceProperties()->getValue();
            $this->assertTrue(!WindowsAzureUtilities::isEmulated(), 'Should succeed if and only if not running in emulator');
        } catch (ServiceException $e) {
            // Expect failure in emulator, as v1.6 doesn't support this method
            if (WindowsAzureUtilities::isEmulated()) {
                $this->assertEquals(400, $e->getCode(), 'getCode');
                $shouldReturn = true;
            }
            else {
                throw $e;
            }
        }
        if($shouldReturn) {
            return;
        }

        // Assert
        $this->assertNotNull($props, '$props');
        $this->assertNotNull($props->getLogging(), '$props->getLogging');
        $this->assertNotNull($props->getLogging()->getRetentionPolicy(), '$props->getLogging()->getRetentionPolicy');
        $this->assertNotNull($props->getLogging()->getVersion(), '$props->getLogging()->getVersion');
        $this->assertNotNull($props->getMetrics()->getRetentionPolicy(), '$props->getMetrics()->getRetentionPolicy');
        $this->assertNotNull($props->getMetrics()->getVersion(), '$props->getMetrics()->getVersion');
    }

    public function testSetServicePropertiesWorks() {
        // Act
        $shouldReturn = false;
        try {
            $props = $this->wrapper->getServiceProperties()->getValue();
            $this->assertTrue(!WindowsAzureUtilities::isEmulated(), 'Should succeed if and only if not running in emulator');
        } catch (ServiceException $e) {
            // Expect failure in emulator, as v1.6 doesn't support this method
            if (WindowsAzureUtilities::isEmulated()) {
                $this->assertEquals(400, $e->getCode(), 'getCode');
                $shouldReturn = true;
            }
            else {
                throw $e;
            }
        }
        if($shouldReturn) {
            return;
        }

        $props->setDefaultServiceVersion('2009-09-19');
        $props->getLogging()->setRead(true);
        $this->wrapper->setServiceProperties($props);

        $props = $this->wrapper->getServiceProperties()->getValue();

        // Assert
        $this->assertNotNull($props, '$props');
        $this->assertEquals('2009-09-19', $props->getDefaultServiceVersion(), '$props->getDefaultServiceVersion()');
        $this->assertNotNull($props->getLogging(), '$props->getLogging');
        $this->assertNotNull($props->getLogging()->getRetentionPolicy(), '$props->getLogging()->getRetentionPolicy');
        $this->assertNotNull($props->getLogging()->getVersion(), '$props->getLogging()->getVersion');
        $this->assertTrue($props->getLogging()->getRead(), '$props->getLogging()->getRead');
        $this->assertNotNull($props->getMetrics()->getRetentionPolicy(), '$props->getMetrics()->getRetentionPolicy');
        $this->assertNotNull($props->getMetrics()->getVersion(), '$props->getMetrics()->getVersion');
    }

    public function testCreateContainerWorks() {
        // Act
        $this->wrapper->createContainer(self::$CREATEABLE_CONTAINER_1);
        
        // Assert
        $this->assertTrue(true, 'success');
    }

    public function testCreateContainerWithMetadataWorks() {
        // This fails due to 
        // https://github.com/WindowsAzure/azure-sdk-for-php/issues/94

        // Act
        $opts = new CreateContainerOptions();
        $opts->setPublicAccess('blob');
        $opts->addMetadata('test', 'bar');
        $opts->addMetadata('blah', 'bleah');
        $this->wrapper->createContainer(self::$CREATEABLE_CONTAINER_2, $opts);

        $prop = $this->wrapper->getContainerMetadata(self::$CREATEABLE_CONTAINER_2);
        $prop2 = $this->wrapper->getContainerProperties(self::$CREATEABLE_CONTAINER_2);
        $acl = $this->wrapper->getContainerACL(self::$CREATEABLE_CONTAINER_2)->getContainerACL();

        $opts = new ListContainersOptions();
        $opts->setPrefix(self::$CREATEABLE_CONTAINER_2);
        $opts->setIncludeMetadata(true);
        $results2 = $this->wrapper->listContainers($opts);

        $this->wrapper->deleteContainer(self::$CREATEABLE_CONTAINER_2);

        // Assert
        $this->assertNotNull($prop, '$prop');
        $this->assertNotNull($prop->getEtag(), '$prop->getEtag()');
        $this->assertNotNull($prop->getLastModified(), '$prop->getLastModified()');
        $this->assertNotNull($prop->getMetadata(), '$prop->getMetadata()');
        $this->assertEquals(2, count($prop->getMetadata()), 'count($prop->getMetadata())');
        $this->assertTrue(self::case_insensitive_array_key_exists('test', $prop->getMetadata()), 'self::case_insensitive_array_key_exists(\'test\', $prop->getMetadata())');
        $this->assertTrue(!(array_search('bar', $prop->getMetadata()) === FALSE), '!(array_search(\'bar\', $prop->getMetadata()) === FALSE)');
        $this->assertTrue(self::case_insensitive_array_key_exists('blah', $prop->getMetadata()), 'self::case_insensitive_array_key_exists(\'blah\', $prop->getMetadata())');
        $this->assertTrue(!(array_search('bleah', $prop->getMetadata()) === FALSE), '!(array_search(\'bleah\', $prop->getMetadata()) === FALSE)');

        $this->assertNotNull($prop2, '$prop2');
        $this->assertNotNull($prop2->getEtag(), '$prop2->getEtag()');
        $this->assertNotNull($prop2->getLastModified(), '$prop2->getLastModified()');
        $this->assertNotNull($prop2->getMetadata(), '$prop2->getMetadata()');
        $this->assertEquals(2, count($prop2->getMetadata()), 'count($prop2->getMetadata())');
        $this->assertTrue(self::case_insensitive_array_key_exists('test', $prop2->getMetadata()), 'self::case_insensitive_array_key_exists(\'test\', $prop2->getMetadata())');
        $this->assertTrue(!(array_search('bar', $prop2->getMetadata()) === FALSE), '!(array_search(\'bar\', $prop2->getMetadata()) === FALSE)');
        $this->assertTrue(self::case_insensitive_array_key_exists('blah', $prop2->getMetadata()), 'self::case_insensitive_array_key_exists(\'blah\', $prop2->getMetadata())');
        $this->assertTrue(!(array_search('bleah', $prop2->getMetadata()) === FALSE), '!(array_search(\'bleah\', $prop2->getMetadata()) === FALSE)');

        $this->assertNotNull($results2, '$results2');
        $this->assertEquals(1, count($results2->getContainers()), 'count($results2->getContainers())');
        $container0 = $results2->getContainers();
        $container0 = $container0[0];
        // The capitalizaion gets changed.
        $this->assertTrue(self::case_insensitive_array_key_exists('test', $container0->getMetadata()), 'self::case_insensitive_array_key_exists(\'test\', $container0->getMetadata())');
        $this->assertTrue(!(array_search('bar', $container0->getMetadata()) === FALSE), '!(array_search(\'bar\', $container0->getMetadata()) === FALSE)');
        $this->assertTrue(self::case_insensitive_array_key_exists('blah', $container0->getMetadata()), 'self::case_insensitive_array_key_exists(\'blah\', $container0->getMetadata())');
        $this->assertTrue(!(array_search('bleah', $container0->getMetadata()) === FALSE), '!(array_search(\'bleah\', $container0->getMetadata()) === FALSE)');

        $this->assertNotNull($acl, '$acl');
    }
    
    private static function case_insensitive_array_key_exists($key, array $search) {
        $lowerCaseKey = strtolower($key);
        foreach(array_keys($search) as $originalKey) {
            if ($lowerCaseKey == strtolower($originalKey)) {
                return true;
            }
        }
        return false;
    }            

    public function testSetContainerMetadataWorks() {
        // Act
        $this->wrapper->createContainer(self::$CREATEABLE_CONTAINER_3);

        $metadata = array(
            'test' => 'bar',
            'blah' => 'bleah');
        $this->wrapper->setContainerMetadata(self::$CREATEABLE_CONTAINER_3, $metadata);
        $prop = $this->wrapper->getContainerMetadata(self::$CREATEABLE_CONTAINER_3);

        // Assert
        $this->assertNotNull($prop, '$prop');
        $this->assertNotNull($prop->getEtag(), '$prop->getEtag()');
        $this->assertNotNull($prop->getLastModified(), '$prop->getLastModified()');
        $this->assertNotNull($prop->getMetadata(), '$prop->getMetadata()');
        $this->assertEquals(2, count($prop->getMetadata()), 'count($prop->getMetadata())');
        $this->assertTrue(self::case_insensitive_array_key_exists('test', $prop->getMetadata()), 'self::case_insensitive_array_key_exists(\'test\', $prop->getMetadata())');
        $this->assertTrue(!(array_search('bar', $prop->getMetadata()) === FALSE), '!(array_search(\'bar\', $prop->getMetadata()) === FALSE)');
        $this->assertTrue(self::case_insensitive_array_key_exists('blah', $prop->getMetadata()), 'self::case_insensitive_array_key_exists(\'blah\', $prop->getMetadata())');
        $this->assertTrue(!(array_search('bleah', $prop->getMetadata()) === FALSE), '!(array_search(\'bleah\', $prop->getMetadata()) === FALSE)');
    }

    public function testSetContainerACLWorks() {
        // Arrange
        $container = self::$CREATEABLE_CONTAINER_4;
        
        $expiryStartDate = new \DateTime;
        $expiryStartDate->setDate(2010, 1, 1);  
        $expiryEndDate = new \DateTime;
        $expiryEndDate->setDate(2020, 1, 1);  

        // Act
        $this->wrapper->createContainer($container);
        $acl = new ContainerACL();
        $acl->setPublicAccess(PublicAccessType::BLOBS_ONLY);
        
        // TODO: Revert when fixed:
        // https://github.com/WindowsAzure/azure-sdk-for-php/issues/134
        $expiryStartDate = \WindowsAzure\Utilities::convertToEdmDateTime($expiryStartDate); //->format('Y-m-d')) . 'T00:00:00.0000000Z';
        $expiryEndDate = \WindowsAzure\Utilities::convertToEdmDateTime($expiryEndDate); //->format('Y-m-d') . 'T00:00:00.0000000Z';
                
        $acl->addSignedIdentifier('test', $expiryStartDate, $expiryEndDate, 'rwd');
        $this->wrapper->setContainerACL($container, $acl);

        $acl2 = $this->wrapper->getContainerACL($container)->getContainerACL();
        $this->wrapper->deleteContainer($container);

        // Assert
        $this->assertNotNull($acl2, '$acl2');
        $this->assertNotNull($acl2->getEtag(), '$acl2->getEtag()');
        $this->assertNotNull($acl2->getLastModified(), '$acl2->getLastModified()');
        $this->assertNotNull($acl2->getPublicAccess(), '$acl2->getPublicAccess()');
        $this->assertEquals(PublicAccessType::BLOBS_ONLY, $acl2->getPublicAccess(), '$acl2->getPublicAccess()');
        $this->assertEquals(1, count($acl2->getSignedIdentifiers()), 'count($acl2->getSignedIdentifiers())');
        $signedids = $acl2->getSignedIdentifiers();
        $this->assertEquals('test', $signedids[0]->getId(), '$signedids[0]->getId()');
//        $expiryStartDate = $expiryStartDate->setTimezone(new \DateTimeZone('UTC'));
//        $expiryEndDate = $expiryEndDate->setTimezone(new \DateTimeZone('UTC'));
        $this->assertEquals(
                \WindowsAzure\Utilities::convertToDateTime($expiryStartDate), 
                \WindowsAzure\Utilities::convertToDateTime($signedids[0]->getAccessPolicy()->getStart()),
                '$signedids[0]->getAccessPolicy()->getStart()');
        $this->assertEquals(
                \WindowsAzure\Utilities::convertToDateTime($expiryEndDate),
                \WindowsAzure\Utilities::convertToDateTime($signedids[0]->getAccessPolicy()->getExpiry()),
                '$signedids[0]->getAccessPolicy()->getExpiry()');
        $this->assertEquals('rwd', $signedids[0]->getAccessPolicy()->getPermission(), '$signedids[0]->getAccessPolicy()->getPermission()');
    }

    public function testListContainersWorks() {
        // Act
        $results = $this->wrapper->listContainers();

        // Assert
        $this->assertNotNull($results, '$results');
        $this->assertTrue(count(self::$testContainers) <= count($results->getContainers()), 'count(self::$testContainers) <= count($results->getContainers())');
        $container0 = $results->getContainers();
        $container0 = $container0[0];
        $this->assertNotNull($container0->getName(), '$container0->getName()');
        $this->assertNotNull($container0->getMetadata(), '$container0->getMetadata()');
        $this->assertNotNull($container0->getProperties(), '$container0->getProperties()');
        $this->assertNotNull($container0->getProperties()->getEtag(), '$container0->getProperties()->getEtag()');
        $this->assertNotNull($container0->getProperties()->getLastModified(), '$container0->getProperties()->getLastModified()');
        $this->assertNotNull($container0->getUrl(), '$container0->getUrl()');
    }

    public function testListContainersWithPaginationWorks() {
        // Act
        $opts = new ListContainersOptions();
        // TODO: Revert when fixed:
        // https://github.com/WindowsAzure/azure-sdk-for-php/issues/69
//        $opts->setMaxResults(3);
        $opts->setMaxResults('3');
        $results = $this->wrapper->listContainers($opts);
        $opts2 = new ListContainersOptions();
        $opts2->setMarker($results ->getNextMarker());
        $results2 = $this->wrapper->listContainers($opts2);

        // Assert
        $this->assertNotNull($results, '$results');
        $this->assertEquals(3, count($results->getContainers()), 'count($results->getContainers())');
        $this->assertNotNull($results->getNextMarker(), '$results->getNextMarker()');
        $this->assertEquals(3, $results->getMaxResults(), '$results->getMaxResults()');

        $this->assertNotNull($results2, '$results2');
        $this->assertTrue(count(self::$testContainers) - 3 <= count($results2->getContainers()), 'count(self::$testContainers) - 3 <= count($results2->getContainers())');
        $this->assertEquals('', $results2->getNextMarker(), '$results2->getNextMarker()');
        $this->assertEquals(0, $results2->getMaxResults(), '$results2->getMaxResults()');
    }

    public function testListContainersWithPrefixWorks() {
        // Act
        $opts = new ListContainersOptions();
        $opts->setPrefix(self::$testContainersPrefix);
        // TODO: Revert when fixed:
        // https://github.com/WindowsAzure/azure-sdk-for-php/issues/69
//        $opts->setMaxResults(3);
        $opts->setMaxResults('3');
        $results = $this->wrapper->listContainers($opts);
        // Assert
        $this->assertNotNull($results, '$results');
        $this->assertEquals(3, count($results->getContainers()), 'count($results->getContainers())');
        $this->assertNotNull($results->getNextMarker(), '$results->getNextMarker()');
        $this->assertEquals(3, $results->getMaxResults(), '$results->getMaxResults()');

        // Act
        $opts = new ListContainersOptions();
        $opts->setPrefix( self::$testContainersPrefix);
        $opts->setMarker($results->getNextMarker());
        $results2 = $this->wrapper->listContainers($opts);

        // Assert
        $this->assertNotNull($results2, '$results2');
        $this->assertNull($results2->getNextMarker(), '$results2->getNextMarker()');
        $this->assertEquals(0, $results2->getMaxResults(), '$results2->getMaxResults()');

        // Act
        $opts = new ListContainersOptions();
        $opts->setPrefix(self::$testContainersPrefix);
        $results3 = $this->wrapper->listContainers($opts);

        // Assert
        $this->assertEquals(count($results->getContainers()) + count($results2->getContainers()), count($results3->getContainers()), 'count($results3->getContainers())');
    }

    public function testWorkingWithRootContainersWorks() {
        // Ensure root container exists
        $error = null;
        try {
            $this->wrapper->createContainer('$root');
        }
        catch (ServiceException $e) {
            $error = $e;
        }

        // Assert
        $this->assertTrue($error == null || $error->getCode() == 409, '$error == null || $error->getCode() == 409');

        // Work with root container explicitly ('$root')
        {
            // Act
            $this->wrapper->createPageBlob('$root', self::$BLOB_FOR_ROOT_CONTAINER, 512);
            $list = $this->wrapper->listBlobs('$root');
            $properties = $this->wrapper->getBlobProperties('$root', self::$BLOB_FOR_ROOT_CONTAINER);
            $metadata = $this->wrapper->getBlobMetadata('$root', self::$BLOB_FOR_ROOT_CONTAINER);

            // Assert
            $this->assertNotNull($list, '$list');
            $this->assertTrue(1 <= count($list->getBlobs()), '1 <= count($list->getBlobs())');
            $this->assertNotNull($properties, '$properties');
            $this->assertNotNull($metadata, '$metadata');

            // Act
            $this->wrapper->deleteBlob('$root', self::$BLOB_FOR_ROOT_CONTAINER);
        }

        // Work with root container implicitly ('')
        {
            // Act
            $this->wrapper->createPageBlob('', self::$BLOB_FOR_ROOT_CONTAINER, 512);
            // '$root' must be explicit when listing blobs in the root container
            $list = $this->wrapper->listBlobs('$root');
            $properties = $this->wrapper->getBlobProperties('', self::$BLOB_FOR_ROOT_CONTAINER);
            $metadata = $this->wrapper->getBlobMetadata('', self::$BLOB_FOR_ROOT_CONTAINER);

            // Assert
            $this->assertNotNull($list, '$list');
            $this->assertTrue(1 <= count($list->getBlobs()), '1 <= count($list->getBlobs())');
            $this->assertNotNull($properties, '$properties');
            $this->assertNotNull($metadata, '$metadata');

            // Act
            $this->wrapper->deleteBlob('', self::$BLOB_FOR_ROOT_CONTAINER);
        }

        // If container was created, delete it
        if ($error == null) {
            $this->wrapper->deleteContainer('$root');
        }
    }

    public function testListBlobsWorks() {
        // Arrange
        $blobNames = array( 'myblob1', 'myblob2', 'other-blob1', 'other-blob2' );
        foreach($blobNames as $blob)  {
            $this->wrapper->createPageBlob(self::$TEST_CONTAINER_FOR_LISTING, $blob, 512);
        }

        // Act
        $results = $this->wrapper->listBlobs(self::$TEST_CONTAINER_FOR_LISTING);

        foreach($blobNames as $blob)  {
            $this->wrapper->deleteBlob(self::$TEST_CONTAINER_FOR_LISTING, $blob);
        }

        // Assert
        $this->assertNotNull($results, '$results');
        $this->assertEquals(4, count($results->getBlobs()), 'count($results->getBlobs())');
    }

    public function testListBlobsWithPrefixWorks() {
        // Arrange
        $blobNames = array( 'myblob1', 'myblob2', 'otherblob1', 'otherblob2' );
        foreach($blobNames as $blob)  {
            $this->wrapper->createPageBlob(self::$TEST_CONTAINER_FOR_LISTING, $blob, 512);
        }

        // Act
        $opts = new ListBlobsOptions();
        $opts->setPrefix('myblob');
        $results = $this->wrapper->listBlobs(self::$TEST_CONTAINER_FOR_LISTING, $opts);
        $opts = new ListBlobsOptions();
        $opts->setPrefix('o');
        $results2 = $this->wrapper->listBlobs(self::$TEST_CONTAINER_FOR_LISTING, $opts);

        foreach($blobNames as $blob)  {
            $this->wrapper->deleteBlob(self::$TEST_CONTAINER_FOR_LISTING, $blob);
        }

        // Assert
        $this->assertNotNull($results, '$results');
        $this->assertEquals(2, count($results->getBlobs()), 'count($results->getBlobs())');
        $blobs = $results->getBlobs();
        $this->assertEquals('myblob1', $blobs[0]->getName(), '$blobs[0]->getName()');
        $this->assertEquals('myblob2', $blobs[1]->getName(), '$blobs[1]->getName()');

        $this->assertNotNull($results2, '$results2');
        $this->assertEquals(2, count($results2->getBlobs()), 'count($results2->getBlobs())');
        $blobs = $results2->getBlobs();
        $this->assertEquals('otherblob1', $blobs[0]->getName(), '$blobs[0]->getName()');
        $this->assertEquals('otherblob2', $blobs[1]->getName(), '$blobs[1]->getName()');
    }

    public function testListBlobsWithOptionsWorks() {
        // Arrange
        $blobNames = array( 'myblob1', 'myblob2', 'otherblob1', 'otherblob2' );
        foreach($blobNames as $blob)  {
            $this->wrapper->createPageBlob(self::$TEST_CONTAINER_FOR_LISTING, $blob, 512);
        }

        // Act
        $opts = new ListBlobsOptions();
        $opts->setIncludeMetadata(true);
        $opts->setIncludeSnapshots(true);
        $results = $this->wrapper->listBlobs(self::$TEST_CONTAINER_FOR_LISTING, $opts);

        foreach($blobNames as $blob)  {
            $this->wrapper->deleteBlob(self::$TEST_CONTAINER_FOR_LISTING, $blob);
        }

        // Assert
        $this->assertNotNull($results, '$results');
        $this->assertEquals(4, count($results->getBlobs()), 'count($results->getBlobs())');
    }

    public function testListBlobsWithDelimiterWorks() {
        // Arrange
        $blobNames = array( 'myblob1', 'myblob2', 'dir1-blob1', 'dir1-blob2', 'dir2-dir21-blob3', 'dir2-dir22-blob3' );
        foreach($blobNames as $blob)  {
            $this->wrapper->createPageBlob(self::$TEST_CONTAINER_FOR_LISTING, $blob, 512);
        }

        // Act
        $opts = new ListBlobsOptions();
        $opts->setDelimiter('-');
        $results = $this->wrapper->listBlobs(self::$TEST_CONTAINER_FOR_LISTING, $opts);
        $opts->setPrefix('dir1-');
        $results2 = $this->wrapper->listBlobs(self::$TEST_CONTAINER_FOR_LISTING, $opts);
        $opts->setPrefix('dir2-');
        $results3 = $this->wrapper->listBlobs(self::$TEST_CONTAINER_FOR_LISTING, $opts);
        $opts->setPrefix('dir2-dir21-');
        $results4 = $this->wrapper->listBlobs(self::$TEST_CONTAINER_FOR_LISTING, $opts);
        $opts->setPrefix('dir2-dir22-');
        $results5 = $this->wrapper->listBlobs(self::$TEST_CONTAINER_FOR_LISTING, $opts);
        $opts->setPrefix('dir2-dir44-');
        $results6 = $this->wrapper->listBlobs(self::$TEST_CONTAINER_FOR_LISTING, $opts);

        foreach($blobNames as $blob)  {
            $this->wrapper->deleteBlob(self::$TEST_CONTAINER_FOR_LISTING, $blob);
        }

        // Assert
        $this->assertNotNull($results, '$results');
        $this->assertEquals(2, count($results->getBlobs()), 'count($results->getBlobs())');
        $this->assertEquals(2, count($results->getBlobPrefixes()), 'count($results->getBlobPrefixes())');

        $this->assertEquals(2, count($results2->getBlobs()), 'count($results2->getBlobs())');
        $this->assertEquals(0, count($results2->getBlobPrefixes()), 'count($results2->getBlobPrefixes())');

        $this->assertEquals(0, count($results3->getBlobs()), 'count($results3->getBlobs())');
        $this->assertEquals(2, count($results3->getBlobPrefixes()), 'count($results3->getBlobPrefixes())');

        $this->assertEquals(1, count($results4->getBlobs()), 'count($results4->getBlobs())');
        $this->assertEquals(0, count($results4->getBlobPrefixes()), 'count($results4->getBlobPrefixes())');

        $this->assertEquals(1, count($results5->getBlobs()), 'count($results5->getBlobs())');
        $this->assertEquals(0, count($results5->getBlobPrefixes()), 'count($results5->getBlobPrefixes())');

        $this->assertEquals(0, count($results6->getBlobs()), 'count($results6->getBlobs())');
        $this->assertEquals(0, count($results6->getBlobPrefixes()), 'count($results6->getBlobPrefixes())');
    }

    public function testCreatePageBlobWorks() {
        // Act
        $this->wrapper->createPageBlob(self::$TEST_CONTAINER_FOR_BLOBS, 'test', 512);

        // Assert
        $this->assertTrue(true, 'success');
    }

    public function testCreatePageBlobWithOptionsWorks() {
        // Act
        $opts = new CreateBlobOptions();
        $opts->setBlobCacheControl('test');
        $opts->setBlobContentEncoding('UTF-8');
        $opts->setBlobContentLanguage('en-us');
        // opts->setBlobContentMD5('1234');
        $opts->setBlobContentType('text/plain');
        $opts->setCacheControl('test');
        $opts->setContentEncoding('UTF-8');
        // $opts->setContentMD5('1234');
        $opts->setContentType('text/plain');
        $this->wrapper->createPageBlob(self::$TEST_CONTAINER_FOR_BLOBS, 'test', 512, $opts);

        $result = $this->wrapper->getBlobProperties(self::$TEST_CONTAINER_FOR_BLOBS, 'test');

        // Assert
        $this->assertNotNull($result, '$result');

        $this->assertNotNull($result->getMetadata(), '$result->getMetadata()');
        $this->assertEquals(0, count($result->getMetadata()), 'count($result->getMetadata())');

        $props = $result->getProperties();
        $this->assertNotNull($props, '$props');
        $this->assertEquals('test', $props->getCacheControl(), '$props->getCacheControl()');
        $this->assertEquals('UTF-8', $props->getContentEncoding(), '$props->getContentEncoding()');
        $this->assertEquals('en-us', $props->getContentLanguage(), '$props->getContentLanguage()');
        $this->assertEquals('text/plain', $props->getContentType(), '$props->getContentType()');
        $this->assertEquals(512, $props->getContentLength(), '$props->getContentLength()');
        $this->assertNotNull($props->getEtag(), '$props->getEtag()');
        $this->assertNull($props->getContentMD5(), '$props->getContentMD5()');
        $this->assertNotNull($props->getLastModified(), '$props->getLastModified()');
        $this->assertEquals('PageBlob', $props->getBlobType(), '$props->getBlobType()');
        $this->assertEquals('unlocked', $props->getLeaseStatus(), '$props->getLeaseStatus()');
        $this->assertEquals(0, $props->getSequenceNumber(), '$props->getSequenceNumber()');
    }

    public function testClearBlobPagesWorks() {
        // Act
        $container = self::$TEST_CONTAINER_FOR_BLOBS;
        $blob = 'test';
        $this->wrapper->createPageBlob($container, $blob, 512);

        $result = $this->wrapper->clearBlobPages($container, $blob, new PageRange(0, 511));

        // Assert
        $this->assertNotNull($result, '$result');
        $this->assertNull($result->getContentMD5(), '$result->getContentMD5()');
        $this->assertNotNull($result->getLastModified(), '$result->getLastModified()');
        $this->assertNotNull($result->getEtag(), '$result->getEtag()');
        $this->assertEquals(0, $result->getSequenceNumber(), '$result->getSequenceNumber()');
    }

    public function testCreateBlobPagesWorks() {
        // Act
        $container = self::$TEST_CONTAINER_FOR_BLOBS;
        $blob = 'test';
        $content = str_pad('', 512);
        $this->wrapper->createPageBlob($container, $blob, 512);

        $result = $this->wrapper->createBlobPages($container, $blob, new PageRange(0, 511), $content);

        // Assert
        $this->assertNotNull($result, '$result');
        $this->assertNotNull($result->getContentMD5(), '$result->getContentMD5()');
        $this->assertNotNull($result->getLastModified(), '$result->getLastModified()');
        $this->assertNotNull($result->getEtag(), '$result->getEtag()');
        $this->assertEquals(0, $result->getSequenceNumber(), '$result->getSequenceNumber()');
    }

    public function testListBlobRegionsWorks() {
        // Act
        $container = self::$TEST_CONTAINER_FOR_BLOBS;
        $blob = 'test';
        $content = str_pad('', 512);
        $this->wrapper->createPageBlob($container, $blob, 16384 + 512);

        $this->wrapper->createBlobPages($container, $blob, new PageRange(0, 511), $content);
        $this->wrapper->createBlobPages($container, $blob, new PageRange(1024, 1024 + 511), $content);
        $this->wrapper->createBlobPages($container, $blob, new PageRange(8192, 8192 + 511), $content);
        $this->wrapper->createBlobPages($container, $blob, new PageRange(16384, 16384 + 511), $content);

//        $result = $this->wrapper->listBlobRegions($container, $blob);
        $result = $this->wrapper->listPageBlobRanges($container, $blob);

        // Assert
        $this->assertNotNull($result, '$result');
        $this->assertNotNull($result->getLastModified(), '$result->getLastModified()');
        $this->assertNotNull($result->getEtag(), '$result->getEtag()');
        $this->assertEquals(16384 + 512, $result->getContentLength(), '$result->getContentLength()');
        $this->assertNotNull($result->getPageRanges(), '$result->getPageRanges()');
        $this->assertEquals(4, count($result->getPageRanges()), 'count($result->getPageRanges())');
        $ranges = $result->getPageRanges();
        $this->assertEquals(0, $ranges[0]->getStart(), '$ranges[0]->getStart()');
        $this->assertEquals(511, $ranges[0]->getEnd(), '$ranges[0]->getEnd()');
        $this->assertEquals(1024, $ranges[1]->getStart(), '$ranges[1]->getStart()');
        $this->assertEquals(1024 + 511, $ranges[1]->getEnd(), '$ranges[1]->getEnd()');
        $this->assertEquals(8192, $ranges[2]->getStart(), '$ranges[2]->getStart()');
        $this->assertEquals(8192 + 511, $ranges[2]->getEnd(), '$ranges[2]->getEnd()');
        $this->assertEquals(16384, $ranges[3]->getStart(), '$ranges[3]->getStart()');
        $this->assertEquals(16384 + 511, $ranges[3]->getEnd(), '$ranges[3]->getEnd()');
    }

    public function testListBlobBlocksOnEmptyBlobWorks() {
        // Act
        $container = self::$TEST_CONTAINER_FOR_BLOBS;
        $blob = 'test13';
        $content = str_pad('', 512);
        $this->wrapper->createBlockBlob($container, $blob, $content);

        $result = $this->wrapper->listBlobBlocks($container, $blob);

        // Assert
        $this->assertNotNull($result, '$result');
        $this->assertNotNull($result->getLastModified(), '$result->getLastModified()');
        $this->assertNotNull($result->getEtag(), '$result->getEtag()');
        $this->assertEquals(512, $result->getContentLength(), '$result->getContentLength()');
        $this->assertNotNull($result->getCommittedBlocks(), '$result->getCommittedBlocks()');
        $this->assertEquals(0, count($result->getCommittedBlocks()), 'count($result->getCommittedBlocks())');
        $this->assertNotNull($result->getUncommittedBlocks(), '$result->getUncommittedBlocks()');
        $this->assertEquals(0, count($result->getUncommittedBlocks()), 'count($result->getUncommittedBlocks())');
    }

    public function testListBlobBlocksWorks() {
        // Act
        $container = self::$TEST_CONTAINER_FOR_BLOBS;
        $blob = 'test14';
        $this->wrapper->createBlockBlob($container, $blob, '');
        $this->wrapper->createBlobBlock($container, $blob, '123', str_pad('', 256));
        $this->wrapper->createBlobBlock($container, $blob, '124', str_pad('', 512));
        $this->wrapper->createBlobBlock($container, $blob, '125', str_pad('', 195));

        $opts = new ListBlobBlocksOptions();
        $opts->setIncludeCommittedBlobs(true);
        $opts->setIncludeUncommittedBlobs(true);
        $result = $this->wrapper->listBlobBlocks($container, $blob, $opts);

        // Assert
        $this->assertNotNull($result, '$result');
        $this->assertNotNull($result->getLastModified(), '$result->getLastModified()');
        $this->assertNotNull($result->getEtag(), '$result->getEtag()');
        $this->assertEquals(0, $result->getContentLength(), '$result->getContentLength()');
        $this->assertNotNull($result->getCommittedBlocks(), '$result->getCommittedBlocks()');
        $this->assertEquals(0, count($result->getCommittedBlocks()), 'count($result->getCommittedBlocks())');
        $this->assertNotNull($result->getUncommittedBlocks(), '$result->getUncommittedBlocks()');
        $this->assertEquals(3, count($result->getUncommittedBlocks()), 'count($result->getUncommittedBlocks())');
        $uncom = $result->getUncommittedBlocks();
        $keys = array_keys($uncom);
        $this->assertEquals('123', $keys[0], '$keys[0]');
        $this->assertEquals(256, $uncom[$keys[0]], '$uncom[$keys[0]]');
        $this->assertEquals('124', $keys[1], '$keys[1]');
        $this->assertEquals(512, $uncom[$keys[1]], '$uncom[$keys[1]]');
        $this->assertEquals('125', $keys[2], '$keys[2]');
        $this->assertEquals(195, $uncom[$keys[2]], '$uncom[$keys[2]]');
    }

    public function testListBlobBlocksWithOptionsWorks() {
        // Act
        $container = self::$TEST_CONTAINER_FOR_BLOBS;
        $blob = 'test14';
        $this->wrapper->createBlockBlob($container, $blob, '');
        $this->wrapper->createBlobBlock($container, $blob, '123', str_pad('', 256));

        $blockList = new BlockList();
        $blockList->addUncommittedEntry('123');
        $this->wrapper->commitBlobBlocks($container, $blob, $blockList);

        $this->wrapper->createBlobBlock($container, $blob, '124', str_pad('', 512));
        $this->wrapper->createBlobBlock($container, $blob, '125', str_pad('', 195));

        $opts = new ListBlobBlocksOptions();
        $opts->setIncludeCommittedBlobs(true);
        $opts->setIncludeUncommittedBlobs(true);
        $result1 = $this->wrapper->listBlobBlocks($container, $blob, $opts);
        $opts = new ListBlobBlocksOptions();
        $opts->setIncludeCommittedBlobs(true);
        $result2 = $this->wrapper->listBlobBlocks($container, $blob, $opts);
        $opts = new ListBlobBlocksOptions();
        $opts->setIncludeUncommittedBlobs(true);
        $result3 = $this->wrapper->listBlobBlocks($container, $blob, $opts);

        // Assert
        $this->assertEquals(1, count($result1->getCommittedBlocks()), 'count($result1->getCommittedBlocks())');
        $this->assertEquals(2, count($result1->getUncommittedBlocks()), 'count($result1->getUncommittedBlocks())');

        $this->assertEquals(1, count($result2->getCommittedBlocks()), 'count($result2->getCommittedBlocks())');
        $this->assertEquals(0, count($result2->getUncommittedBlocks()), 'count($result2->getUncommittedBlocks())');

        $this->assertEquals(0, count($result3->getCommittedBlocks()), 'count($result3->getCommittedBlocks())');
        $this->assertEquals(2, count($result3->getUncommittedBlocks()), 'count($result3->getUncommittedBlocks())');
    }

    public function testCommitBlobBlocksWorks() {
        // Act
        $container = self::$TEST_CONTAINER_FOR_BLOBS;
        $blob = 'test14';
        $blockId1 = '1fedcba';
        $blockId2 = '2abcdef';
        $blockId3 = '3zzzzzz';
        $this->wrapper->createBlockBlob($container, $blob, '');
        $this->wrapper->createBlobBlock($container, $blob, $blockId1, str_pad('', 256));
        $this->wrapper->createBlobBlock($container, $blob, $blockId2, str_pad('', 512));
        $this->wrapper->createBlobBlock($container, $blob, $blockId3, str_pad('', 195));

        $blockList = new BlockList();
        $blockList->addUncommittedEntry($blockId1);
        $blockList->addLatestEntry($blockId3);

        $this->wrapper->commitBlobBlocks($container, $blob, $blockList);

        $opts = new ListBlobBlocksOptions();
        $opts->setIncludeCommittedBlobs(true);
        $opts->setIncludeUncommittedBlobs(true);
        $result = $this->wrapper->listBlobBlocks($container, $blob, $opts);

        // Assert
        $this->assertNotNull($result, '$result');
        $this->assertNotNull($result->getLastModified(), '$result->getLastModified()');
        $this->assertNotNull($result->getEtag(), '$result->getEtag()');
        $this->assertEquals(256 + 195, $result->getContentLength(), '$result->getContentLength()');

        $this->assertNotNull($result->getCommittedBlocks(), '$result->getCommittedBlocks()');
        $this->assertEquals(2, count($result->getCommittedBlocks()), 'count($result->getCommittedBlocks())');
        $comblk = $result->getCommittedBlocks();
        $keys = array_keys($comblk);
        $this->assertEquals($blockId1, $keys[0], '$keys[0]');
        $this->assertEquals(256, $comblk[$keys[0]], '$comblk[$keys[0]]');
        $this->assertEquals($blockId3, $keys[1], '$keys[1]');
        $this->assertEquals(195, $comblk[$keys[1]], '$comblk[$keys[1]]');

        $this->assertNotNull($result->getUncommittedBlocks(), '$result->getUncommittedBlocks()');
        $this->assertEquals(0, count($result->getUncommittedBlocks()), 'count($result->getUncommittedBlocks())');
    }

    public function testCreateBlobBlockWorks() {
        // Act
        $container = self::$TEST_CONTAINER_FOR_BLOBS;
        $blob = 'test13';
        $content = str_pad('', 512);
        $this->wrapper->createBlockBlob($container, $blob, $content);
        $this->wrapper->createBlobBlock($container, $blob, '123', $content);
        $this->wrapper->createBlobBlock($container, $blob, '124', $content);

        // Assert
        $this->assertTrue(true, 'success');
    }

    public function testCreateBlockBlobWorks() {
        // Act
        $this->wrapper->createBlockBlob(self::$TEST_CONTAINER_FOR_BLOBS, 'test2', 'some content');

        // Assert
        $this->assertTrue(true, 'success');
    }

    public function testCreateBlockBlobWithOptionsWorks() {
        // Act
        $content = 'some $content';
        $opts = new CreateBlobOptions();
        $opts->setBlobCacheControl('test');
        $opts->setBlobContentEncoding('UTF-8');
        $opts->setBlobContentLanguage('en-us');
        // $opts->setBlobContentMD5('1234');
        $opts->setBlobContentType('text/plain');
        $opts->setCacheControl('test');
        $opts->setContentEncoding('UTF-8');
        // $opts->setContentMD5('1234');
        $opts->setContentType('text/plain');
        $this->wrapper->createBlockBlob(self::$TEST_CONTAINER_FOR_BLOBS, 'test2', $content, $opts);

        $result = $this->wrapper->getBlobProperties(self::$TEST_CONTAINER_FOR_BLOBS, 'test2');

        // Assert
        $this->assertNotNull($result, '$result');

        $this->assertNotNull($result->getMetadata(), '$result->getMetadata()');
        $this->assertEquals(0, count($result->getMetadata()), 'count($result->getMetadata())');

        $props = $result->getProperties();
        $this->assertNotNull($props, '$props');
        $this->assertEquals('test', $props->getCacheControl(), '$props->getCacheControl()');
        $this->assertEquals('UTF-8', $props->getContentEncoding(), '$props->getContentEncoding()');
        $this->assertEquals('en-us', $props->getContentLanguage(), '$props->getContentLanguage()');
        $this->assertEquals('text/plain', $props->getContentType(), '$props->getContentType()');
        $this->assertEquals(strlen($content), $props->getContentLength(), '$props->getContentLength()');
        $this->assertNotNull($props->getEtag(), '$props->getEtag()');
        $this->assertNull($props->getContentMD5(), '$props->getContentMD5()');
        $this->assertNotNull($props->getLastModified(), '$props->getLastModified()');
        $this->assertEquals('BlockBlob', $props->getBlobType(), '$props->getBlobType()');
        $this->assertEquals('unlocked', $props->getLeaseStatus(), '$props->getLeaseStatus()');
        $this->assertEquals(0, $props->getSequenceNumber(), '$props->getSequenceNumber()');
    }

    public function testCreateBlobSnapshotWorks() {
        // Act
        $container = self::$TEST_CONTAINER_FOR_BLOBS;
        $blob = 'test3';
        $this->wrapper->createBlockBlob($container, $blob, 'some content');
        $snapshot = $this->wrapper->createBlobSnapshot($container, $blob);
        
        // Assert
        $this->assertNotNull($snapshot, '$snapshot');
        $this->assertNotNull($snapshot->getEtag(), '$snapshot->getEtag()');
        $this->assertNotNull($snapshot->getLastModified(), '$snapshot->getLastModified()');
        $this->assertNotNull($snapshot->getSnapshot(), '$snapshot->getSnapshot()');
    }

    public function testCreateBlobSnapshotWithOptionsWorks() {
        // Act
        $container = self::$TEST_CONTAINER_FOR_BLOBS;
        $blob = 'test3';
        $this->wrapper->createBlockBlob($container, $blob, 'some content');
        $opts = new CreateBlobSnapshotOptions();
        $metadata = array(
            'test' => 'bar',
            'blah' => 'bleah');
        $opts->setMetadata($metadata);
        $snapshot = $this->wrapper->createBlobSnapshot($container, $blob, $opts);

        $opts = new GetBlobPropertiesOptions();
        $opts->setSnapshot($snapshot->getSnapshot());
        $result = $this->wrapper->getBlobProperties($container, $blob, $opts);

        // Assert
        $this->assertNotNull($result, '$result');
        $this->assertEquals($snapshot->getEtag(), $result->getProperties()->getEtag(), '$result->getProperties()->getEtag()');
        $this->assertEquals($snapshot->getLastModified(), $result->getProperties()->getLastModified(), '$result->getProperties()->getLastModified()');
        // The capitalizaion gets changed.
        $this->assertTrue(self::case_insensitive_array_key_exists('test', $result->getMetadata()), 'self::case_insensitive_array_key_exists(\'test\', $result->getMetadata())');
        $this->assertTrue(!(array_search('bar', $result->getMetadata()) === FALSE), '!(array_search(\'bar\', $result->getMetadata()) === FALSE)');
        $this->assertTrue(self::case_insensitive_array_key_exists('blah', $result->getMetadata()), 'self::case_insensitive_array_key_exists(\'blah\', $result->getMetadata())');
        $this->assertTrue(!(array_search('bleah', $result->getMetadata()) === FALSE), '!(array_search(\'bleah\', $result->getMetadata()) === FALSE)');
        }

    public function testGetBlockBlobWorks() {
        // Act
        $content = 'some $content';
        $opts = new CreateBlobOptions();
        $opts->setBlobCacheControl('test');
        $opts->setBlobContentEncoding('UTF-8');
        $opts->setBlobContentLanguage('en-us');
        // $opts->setBlobContentMD5('1234');
        $opts->setBlobContentType('text/plain');
        $opts->setCacheControl('test');
        $opts->setContentEncoding('UTF-8');
        // $opts->setContentMD5('1234');
        $opts->setContentType('text/plain');
        $this->wrapper->createBlockBlob(self::$TEST_CONTAINER_FOR_BLOBS, 'test2', $content, $opts);

        $result = $this->wrapper->getBlob(self::$TEST_CONTAINER_FOR_BLOBS, 'test2');

        // Assert
        $this->assertNotNull($result, '$result');

        $this->assertNotNull($result->getMetadata(), '$result->getMetadata()');
        $this->assertEquals(0, count($result->getMetadata()), 'count($result->getMetadata())');

        $props = $result->getProperties();
        $this->assertNotNull($props, '$props');
        $this->assertEquals('test', $props->getCacheControl(), '$props->getCacheControl()');
        $this->assertEquals('UTF-8', $props->getContentEncoding(), '$props->getContentEncoding()');
        $this->assertEquals('en-us', $props->getContentLanguage(), '$props->getContentLanguage()');
        $this->assertEquals('text/plain', $props->getContentType(), '$props->getContentType()');
        $this->assertEquals(strlen($content), $props->getContentLength(), '$props->getContentLength()');
        $this->assertNotNull($props->getEtag(), '$props->getEtag()');
        $this->assertNull($props->getContentMD5(), '$props->getContentMD5()');
        $this->assertNotNull($props->getLastModified(), '$props->getLastModified()');
        $this->assertEquals('BlockBlob', $props->getBlobType(), '$props->getBlobType()');
        $this->assertEquals('unlocked', $props->getLeaseStatus(), '$props->getLeaseStatus()');
        $this->assertEquals(0, $props->getSequenceNumber(), '$props->getSequenceNumber()');
        $this->assertEquals($content, stream_get_contents($result->getContentStream()), '$result->getContentStream()');
    }

    public function testGetPageBlobWorks() {
        // Act
        $opts = new CreateBlobOptions();
        $opts->setBlobCacheControl('test');
        $opts->setBlobContentEncoding('UTF-8');
        $opts->setBlobContentLanguage('en-us');
        // $opts->setBlobContentMD5('1234');
        $opts->setBlobContentType('text/plain');
        $opts->setCacheControl('test');
        $opts->setContentEncoding('UTF-8');
        // $opts->setContentMD5('1234');
        $opts->setContentType('text/plain');
        $this->wrapper->createPageBlob(self::$TEST_CONTAINER_FOR_BLOBS, 'test', 4096, $opts);

        $result = $this->wrapper->getBlob(self::$TEST_CONTAINER_FOR_BLOBS, 'test');

        // Assert
        $this->assertNotNull($result, '$result');

        $this->assertNotNull($result->getMetadata(), '$result->getMetadata()');
        $this->assertEquals(0, count($result->getMetadata()), 'count($result->getMetadata())');

        $props = $result->getProperties();
        $this->assertEquals('test', $props->getCacheControl(), '$props->getCacheControl()');
        $this->assertEquals('UTF-8', $props->getContentEncoding(), '$props->getContentEncoding()');
        $this->assertEquals('en-us', $props->getContentLanguage(), '$props->getContentLanguage()');
        $this->assertEquals('text/plain', $props->getContentType(), '$props->getContentType()');
        $this->assertEquals(4096, $props->getContentLength(), '$props->getContentLength()');
        $this->assertNotNull($props->getEtag(), '$props->getEtag()');
        $this->assertNull($props->getContentMD5(), '$props->getContentMD5()');
        $this->assertNotNull($props->getLastModified(), '$props->getLastModified()');
        $this->assertEquals('PageBlob', $props->getBlobType(), '$props->getBlobType()');
        $this->assertEquals('unlocked', $props->getLeaseStatus(), '$props->getLeaseStatus()');
        $this->assertEquals(0, $props->getSequenceNumber(), '$props->getSequenceNumber()');
        $this->assertEquals(4096, strlen(stream_get_contents($result->getContentStream())), 'strlen($result->getContentStream())');
    }

    public function testGetBlobWithIfMatchETagAccessConditionWorks() {
        // Act
        $this->wrapper->createPageBlob(self::$TEST_CONTAINER_FOR_BLOBS, 'test', 4096);
        try {
            $opts = new GetBlobOptions();
            $opts->setAccessCondition(AccessCondition::ifMatch('123'));
            $this->wrapper->getBlob(self::$TEST_CONTAINER_FOR_BLOBS, 'test', $opts);
            $this->fail('getBlob should throw an exception');
        }
        catch (ServiceException $e) {
            $this->assertEquals(412, $e->getCode(), 'got the expected exception');
        }
    }

    public function testGetBlobWithIfNoneMatchETagAccessConditionWorks() {
        // Act
        $this->wrapper->createPageBlob(self::$TEST_CONTAINER_FOR_BLOBS, 'test', 4096);
        $props = $this->wrapper->getBlobProperties(self::$TEST_CONTAINER_FOR_BLOBS, 'test');
        try {
            $opts = new GetBlobOptions();
            $opts->setAccessCondition(AccessCondition::ifNoneMatch($props->getProperties()->getEtag()));
            $this->wrapper->getBlob(self::$TEST_CONTAINER_FOR_BLOBS, 'test', $opts);
            $this->fail('getBlob should throw an exception');
        }
        catch (ServiceException $e) {
            $this->assertEquals(304, $e->getCode(), 'got the expected exception');
        }
    }

    public function testGetBlobWithIfModifiedSinceAccessConditionWorks() {
        // Act
        $this->wrapper->createPageBlob(self::$TEST_CONTAINER_FOR_BLOBS, 'test', 4096);
        $props = $this->wrapper->getBlobProperties(self::$TEST_CONTAINER_FOR_BLOBS, 'test');
        try {
            $opts = new GetBlobOptions();
            $lastMod = $props->getProperties()->getLastModified()->format(\WindowsAzure\Resources::AZURE_DATE_FORMAT);
            $opts->setAccessCondition(AccessCondition::ifModifiedSince($lastMod));
            $this->wrapper->getBlob(self::$TEST_CONTAINER_FOR_BLOBS, 'test', $opts);
            $this->fail('getBlob should throw an exception');
        }
        catch (ServiceException $e) {
            $this->assertEquals(304, $e->getCode(), 'got the expected exception');
        }
    }

    public function testGetBlobWithIfNotModifiedSinceAccessConditionWorks() {
        // Act
        $container = self::$TEST_CONTAINER_FOR_BLOBS;
        $blob = 'test';
        $this->wrapper->createPageBlob($container, $blob, 4096);
        $props = $this->wrapper->getBlobProperties($container, $blob);

        // To test for "IfNotModifiedSince", we need to make updates to the blob
        // until at least 1 second has passed since the blob creation
        $lastModifiedBase = $props->getProperties()->getLastModified();

        // +1 second
        $lastModifiedNext = clone $lastModifiedBase;
        $lastModifiedNext = $lastModifiedNext->modify("+1 sec");

        while (true) {
            $metadata = array('test' => 'test1');
            $result = $this->wrapper->setBlobMetadata($container, $blob, $metadata);
            if ($result->getLastModified() >= $lastModifiedNext) break;
        }
        try {
            $opts = new GetBlobOptions();
            $opts->setAccessCondition(AccessCondition::ifNotModifiedSince($lastModifiedBase->format(\WindowsAzure\Resources::AZURE_DATE_FORMAT)));
            $this->wrapper->getBlob($container, $blob, $opts);
            $this->fail('getBlob should throw an exception');
        }
        catch (ServiceException $e) {
            $this->assertEquals(412, $e->getCode(), 'got the expected exception');
        }
    }

    public function testGetBlobPropertiesWorks() {
        // Act
        $container = self::$TEST_CONTAINER_FOR_BLOBS;
        $blob = 'test';
        $this->wrapper->createPageBlob($container, $blob, 4096);
        $result = $this->wrapper->getBlobProperties($container, $blob);

        // Assert
        $this->assertNotNull($result, '$result');

        $this->assertNotNull($result->getMetadata(), '$result->getMetadata()');
        $this->assertEquals(0, count($result->getMetadata()), 'count($result->getMetadata())');

        $props = $result->getProperties();
        $this->assertNotNull($props, '$props');
        $this->assertNull($props->getCacheControl(), '$props->getCacheControl()');
        $this->assertNull($props->getContentEncoding(), '$props->getContentEncoding()');
        $this->assertNull($props->getContentLanguage(), '$props->getContentLanguage()');
        $this->assertEquals('application/octet-stream', $props->getContentType(), '$props->getContentType()');
        $this->assertEquals(4096, $props->getContentLength(), '$props->getContentLength()');
        $this->assertNotNull($props->getEtag(), '$props->getEtag()');
        $this->assertNull($props->getContentMD5(), '$props->getContentMD5()');
        $this->assertNotNull($props->getLastModified(), '$props->getLastModified()');
        $this->assertEquals('PageBlob', $props->getBlobType(), '$props->getBlobType()');
        $this->assertEquals('unlocked', $props->getLeaseStatus(), '$props->getLeaseStatus()');
        $this->assertEquals(0, $props->getSequenceNumber(), '$props->getSequenceNumber()');
    }

    public function testGetBlobMetadataWorks() {
        // Act
        $container = self::$TEST_CONTAINER_FOR_BLOBS;
        $blob = 'test';
        $opts = new CreateBlobOptions();
        $metadata = $opts->getMetadata();
        $metadata['test'] = 'bar';
        $metadata['blah'] = 'bleah';
        $opts->setMetadata($metadata);
        $this->wrapper->createPageBlob($container, $blob, 4096, $opts);
        $props = $this->wrapper->getBlobMetadata($container, $blob);

        // Assert
        $this->assertNotNull($props, '$props');
        $this->assertNotNull($props->getEtag(), '$props->getEtag()');
        $this->assertNotNull($props->getMetadata(), '$props->getMetadata()');
        $this->assertEquals(2, count($props->getMetadata()), 'count($props->getMetadata())');
        $this->assertTrue(self::case_insensitive_array_key_exists('test', $props->getMetadata()), 'self::case_insensitive_array_key_exists(\'test\', $props->getMetadata())');
        $this->assertTrue(!(array_search('bar', $props->getMetadata()) === FALSE), '!(array_search(\'bar\', $props->getMetadata()) === FALSE)');
        $this->assertTrue(self::case_insensitive_array_key_exists('blah', $props->getMetadata()), 'self::case_insensitive_array_key_exists(\'blah\', $props->getMetadata())');
        $this->assertTrue(!(array_search('bleah', $props->getMetadata()) === FALSE), '!(array_search(\'bleah\', $props->getMetadata()) === FALSE)');        
        $this->assertNotNull($props->getLastModified(), '$props->getLastModified()');
    }

    public function testSetBlobPropertiesWorks() {
        // Act
        $container = self::$TEST_CONTAINER_FOR_BLOBS;
        $blob = 'test10';
        $this->wrapper->createPageBlob($container, $blob, 4096);
        $opts = new SetBlobPropertiesOptions();
        $opts->setBlobCacheControl('test');
        $opts->setBlobContentEncoding('UTF-8');
        $opts->setBlobContentLanguage('en-us');
        $opts->setBlobContentLength(512);
        $opts->setBlobContentMD5(null);
        $opts->setBlobContentType('text/plain');
        $opts->setSequenceNumberAction('increment');
        $result = $this->wrapper->setBlobProperties($container, $blob, $opts);

        $getResult = $this->wrapper->getBlobProperties($container, $blob);

        // Assert
        $this->assertNotNull($result, '$result');
        $this->assertNotNull($result->getEtag(), '$result->getEtag()');
        $this->assertNotNull($result->getLastModified(), '$result->getLastModified()');
        $this->assertNotNull($result->getSequenceNumber(), '$result->getSequenceNumber()');
        $this->assertEquals(1, $result->getSequenceNumber(), '$result->getSequenceNumber()');

        $this->assertNotNull($getResult, '$getResult');

        $this->assertNotNull($getResult->getMetadata(), '$getResult->getMetadata()');
        $this->assertEquals(0, count($getResult->getMetadata()), 'count($getResult->getMetadata())');

        $props = $getResult->getProperties();
        $this->assertNotNull($props, '$props');
        $this->assertEquals('test', $props->getCacheControl(), '$props->getCacheControl()');
        $this->assertEquals('UTF-8', $props->getContentEncoding(), '$props->getContentEncoding()');
        $this->assertEquals('en-us', $props->getContentLanguage(), '$props->getContentLanguage()');
        $this->assertEquals('text/plain', $props->getContentType(), '$props->getContentType()');
        $this->assertEquals(512, $props->getContentLength(), '$props->getContentLength()');
        $this->assertNull($props->getContentMD5(), '$props->getContentMD5()');
        $this->assertNotNull($props->getLastModified(), '$props->getLastModified()');
        $this->assertEquals('PageBlob', $props->getBlobType(), '$props->getBlobType()');
        $this->assertEquals('unlocked', $props->getLeaseStatus(), '$props->getLeaseStatus()');
        $this->assertEquals(1, $props->getSequenceNumber(), '$props->getSequenceNumber()');
    }

    public function testSetBlobMetadataWorks() {
        // Act
        $container = self::$TEST_CONTAINER_FOR_BLOBS;
        $blob = 'test11';
        $metadata = array(
            'test' => 'bar',
            'blah' => 'bleah');

        $this->wrapper->createPageBlob($container, $blob, 4096);
        $result = $this->wrapper->setBlobMetadata($container, $blob, $metadata);
        $props = $this->wrapper->getBlobProperties($container, $blob);

        // Assert
        $this->assertNotNull($result, '$result');
        $this->assertNotNull($result->getEtag(), '$result->getEtag()');
        $this->assertNotNull($result->getLastModified(), '$result->getLastModified()');

        $this->assertNotNull($props, '$props');
        $this->assertNotNull($props->getMetadata(), '$props->getMetadata()');
        $this->assertEquals(2, count($props->getMetadata()), 'count($props->getMetadata())');
        $this->assertTrue(self::case_insensitive_array_key_exists('test', $props->getMetadata()), 'self::case_insensitive_array_key_exists(\'test\', $props->getMetadata())');
        $this->assertTrue(!(array_search('bar', $props->getMetadata()) === FALSE), '!(array_search(\'bar\', $props->getMetadata()) === FALSE)');
        $this->assertTrue(self::case_insensitive_array_key_exists('blah', $props->getMetadata()), 'self::case_insensitive_array_key_exists(\'blah\', $props->getMetadata())');
        $this->assertTrue(!(array_search('bleah', $props->getMetadata()) === FALSE), '!(array_search(\'bleah\', $props->getMetadata()) === FALSE)');
    }   

    public function testDeleteBlobWorks() {
        // Act
        $content = 'some $content';
        $this->wrapper->createBlockBlob(self::$TEST_CONTAINER_FOR_BLOBS, 'test2', $content);

        $this->wrapper->deleteBlob(self::$TEST_CONTAINER_FOR_BLOBS, 'test2');

        // Assert
        $this->assertTrue(true, 'success');
    }

    public function testCopyBlobWorks() {
        // Act
        $content = 'some content2';
        $this->wrapper->createBlockBlob(self::$TEST_CONTAINER_FOR_BLOBS, 'test6', $content);
        $this->wrapper->copyBlob(self::$TEST_CONTAINER_FOR_BLOBS_2, 'test5', self::$TEST_CONTAINER_FOR_BLOBS, 'test6');

        $result = $this->wrapper->getBlob(self::$TEST_CONTAINER_FOR_BLOBS_2, 'test5');

        // Assert
        $this->assertNotNull($result, '$result');

        $this->assertNotNull($result->getMetadata(), '$result->getMetadata()');
        $this->assertEquals(0, count($result->getMetadata()), 'count($result->getMetadata())');

        $props = $result->getProperties();
        $this->assertNotNull($props, '$props');
        $this->assertEquals(strlen($content), $props->getContentLength(), '$props->getContentLength()');
        $this->assertNotNull($props->getEtag(), '$props->getEtag()');
        $this->assertNull($props->getContentMD5(), '$props->getContentMD5()');
        $this->assertNotNull($props->getLastModified(), '$props->getLastModified()');
        $this->assertEquals('BlockBlob', $props->getBlobType(), '$props->getBlobType()');
        $this->assertEquals('unlocked', $props->getLeaseStatus(), '$props->getLeaseStatus()');
        $this->assertEquals(0, $props->getSequenceNumber(), '$props->getSequenceNumber()');
        $this->assertEquals($content, stream_get_contents($result->getContentStream()), '$result->getContentStream()');
    }

    public function testAcquireLeaseWorks() {
        // Act
        $content = 'some content2';
        $this->wrapper->createBlockBlob(self::$TEST_CONTAINER_FOR_BLOBS, 'test6', $content);
        $leaseId = $this->wrapper->acquireLease(self::$TEST_CONTAINER_FOR_BLOBS, 'test6')->getLeaseId();
        $this->wrapper->releaseLease(self::$TEST_CONTAINER_FOR_BLOBS, 'test6', $leaseId);

        // Assert
        $this->assertNotNull($leaseId, '$leaseId');
    }

    public function testRenewLeaseWorks() {
        // Act
        $content = 'some content2';
        $this->wrapper->createBlockBlob(self::$TEST_CONTAINER_FOR_BLOBS, 'test6', $content);
        $leaseId = $this->wrapper->acquireLease(self::$TEST_CONTAINER_FOR_BLOBS, 'test6')->getLeaseId();
        $leaseId2 = $this->wrapper->renewLease(self::$TEST_CONTAINER_FOR_BLOBS, 'test6', $leaseId)->getLeaseId();
        $this->wrapper->releaseLease(self::$TEST_CONTAINER_FOR_BLOBS, 'test6', $leaseId);

        // Assert
        $this->assertNotNull($leaseId, '$leaseId');
        $this->assertNotNull($leaseId2, '$leaseId2');
    }

    public function testBreakLeaseWorks() {
        // Act
        $content = 'some content2';
        $this->wrapper->createBlockBlob(self::$TEST_CONTAINER_FOR_BLOBS, 'test6', $content);
        $leaseId = $this->wrapper->acquireLease(self::$TEST_CONTAINER_FOR_BLOBS, 'test6')->getLeaseId();
        $this->wrapper->breakLease(self::$TEST_CONTAINER_FOR_BLOBS, 'test6', $leaseId);
        $this->wrapper->releaseLease(self::$TEST_CONTAINER_FOR_BLOBS, 'test6', $leaseId);

        // Assert
        $this->assertNotNull($leaseId, '$leaseId');
    }

    // Extra tests from Java
    //    public function testRetryPolicyWorks() { }
    //    public function testRetryPolicyCompositionWorks() { }
    //    public function testRetryPolicyThrowsOnInvalidInputStream() { }
    //    public function testRetryPolicyCallsResetOnValidInputStream() { }
}

