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
 * @copyright Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 *
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */

namespace Tests\unit\WindowsAzure\MediaServices\Models;

use WindowsAzure\MediaServices\Models\IngestManifest;

/**
 * Represents access policy object used in media services.
 *
 * @category  Microsoft
 *
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 *
 * @version   Release: 0.5.0_2016-11
 *
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
class IngestManifestTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers \WindowsAzure\MediaServices\Models\IngestManifest::createFromOptions
     * @covers \WindowsAzure\MediaServices\Models\IngestManifest::fromArray
     */
    public function testCreateFromOptions()
    {

        // Setup
        $name = 'IngestManifest Name';
        $blobUri = 'http://blob-uri.com';
        $statistics = [
                'FinishedFilesCount' => 2,
        ];
        $storageName = 'Storage Account Name-4236';
        $options = [
                'Id' => '46-jhgjh-589',
                'State' => IngestManifest::STATE_ACTIVE,
                'Created' => '2013-12-18',
                'LastModified' => '2013-12-18',
                'Name' => $name,
                'BlobStorageUriForUpload' => $blobUri,
                'Statistics' => $statistics,
                'StorageAccountName' => $storageName,
        ];
        $created = new \Datetime($options['Created']);
        $modified = new \Datetime($options['LastModified']);

        // Test
        $ingestManifest = IngestManifest::createFromOptions($options);

        // Assert
        $statResult = $ingestManifest->getStatistics();

        $this->assertEquals($options['Id'], $ingestManifest->getId());
        $this->assertEquals($options['State'], $ingestManifest->getState());
        $this->assertEquals($created->getTimestamp(), $ingestManifest->getCreated()->getTimestamp());
        $this->assertEquals($modified->getTimestamp(), $ingestManifest->getLastModified()->getTimestamp());
        $this->assertEquals($name, $ingestManifest->getName());
        $this->assertEquals($blobUri, $ingestManifest->getBlobStorageUriForUpload());
        $this->assertEquals($statistics['FinishedFilesCount'], $statResult->getFinishedFilesCount());
        $this->assertEquals($storageName, $ingestManifest->getStorageAccountName());
    }

    /**
     * @covers \WindowsAzure\MediaServices\Models\IngestManifest::getStatistics
     */
    public function testGetStatistics()
    {

        // Setup
        $statistics = [
                'FinishedFilesCount' => 2,
        ];
        $options = [
                'Statistics' => $statistics,
        ];
        $ingestManifest = IngestManifest::createFromOptions($options);

        // Test
        $result = $ingestManifest->getStatistics();

        // Assert
        $this->assertEquals($statistics['FinishedFilesCount'], $result->getFinishedFilesCount());
    }

    /**
     * @covers \WindowsAzure\MediaServices\Models\IngestManifest::getBlobStorageUriForUpload
     */
    public function testGetBlobStorageUriForUpload()
    {

        // Setup
        $blobUri = 'http://blob-uri.com';
        $options = [
                'BlobStorageUriForUpload' => $blobUri,
        ];
        $ingestManifest = IngestManifest::createFromOptions($options);

        // Test
        $result = $ingestManifest->getBlobStorageUriForUpload();

        // Assert
        $this->assertEquals($blobUri, $result);
    }

    /**
     * @covers \WindowsAzure\MediaServices\Models\IngestManifest::getStorageAccountName
     */
    public function testGetStorageAccountName()
    {

        // Setup
        $storageName = 'Storage-Account-Name-45236';
        $options = [
                'StorageAccountName' => $storageName,
        ];
        $ingestManifest = IngestManifest::createFromOptions($options);

        // Test
        $result = $ingestManifest->getStorageAccountName();

        // Assert
        $this->assertEquals($storageName, $result);
    }

    /**
     * @covers \WindowsAzure\MediaServices\Models\IngestManifest::getName
     * @covers \WindowsAzure\MediaServices\Models\IngestManifest::setName
     */
    public function testSetGetName()
    {

        // Setup
        $name = 'Ingest Manifest Name-365';
        $ingestManifest = new IngestManifest();

        // Test
        $ingestManifest->setName($name);
        $result = $ingestManifest->getName();

        // Assert
        $this->assertEquals($name, $result);
    }

    /**
     * @covers \WindowsAzure\MediaServices\Models\IngestManifest::getLastModified
     */
    public function testGetLastModified()
    {

        // Setup
        $options = [
                'LastModified' => '2013-12-18',
        ];
        $modified = new \Datetime($options['LastModified']);
        $ingestManifest = IngestManifest::createFromOptions($options);

        // Test
        $result = $ingestManifest->getLastModified();

        // Assert
        $this->assertEquals($modified->getTimestamp(), $result->getTimestamp());
    }

    /**
     * @covers \WindowsAzure\MediaServices\Models\IngestManifest::getCreated
     */
    public function testGetCreated()
    {

        // Setup
        $options = [
                'Created' => '2013-12-18',
        ];
        $created = new \Datetime($options['Created']);
        $ingestManifest = IngestManifest::createFromOptions($options);

        // Test
        $result = $ingestManifest->getCreated();

        // Assert
        $this->assertEquals($created->getTimestamp(), $result->getTimestamp());
    }

    /**
     * @covers \WindowsAzure\MediaServices\Models\IngestManifest::getState
     */
    public function testGetState()
    {

        // Setup
        $state = IngestManifest::STATE_ACTIVE;
        $options = [
                'State' => $state,
        ];
        $ingestManifest = IngestManifest::createFromOptions($options);

        // Test
        $result = $ingestManifest->getState();

        // Assert
        $this->assertEquals($state, $result);
    }

    /**
     * @covers \WindowsAzure\MediaServices\Models\IngestManifest::getId
     */
    public function testGetId()
    {

        // Setup
        $id = 'ingest-id-258';
        $options = [
                'Id' => $id,
        ];
        $ingestManifest = IngestManifest::createFromOptions($options);

        // Test
        $result = $ingestManifest->getId();

        // Assert
        $this->assertEquals($id, $result);
    }
}
