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

use WindowsAzure\MediaServices\Models\IngestManifestFile;

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
class IngestManifestFileTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers \WindowsAzure\MediaServices\Models\IngestManifestFile::createFromOptions
     * @covers \WindowsAzure\MediaServices\Models\IngestManifestFile::fromArray
     * @covers \WindowsAzure\MediaServices\Models\IngestManifestFile::__construct
     */
    public function testCreateFromOptions()
    {

        // Setup
        $id = 'manifest-file-id-897';
        $name = 'Manifest File Name 4634';
        $encryptionKeyId = 'Encryption-key-id-345';
        $parentIngestManifestId = 'parent-ingest-manifest-id-345';
        $parentIngestManifestAssetId = 'parent-ingest-manifest-asset-id-347';
        $options = [
                'Id' => $id,
                'Name' => $name,
                'EncryptionVersion' => 'Encryption Version',
                'EncryptionScheme' => 'Encryption Scheme',
                'IsEncrypted' => true,
                'EncryptionKeyId' => $encryptionKeyId,
                'InitializationVector' => 'Initialization Vector',
                'IsPrimary' => true,
                'LastModified' => '2013-12-18',
                'Created' => '2013-12-18',
                'MimeType' => 'mime type',
                'State' => IngestManifestFile::STATE_FINISHED,
                'ParentIngestManifestId' => $parentIngestManifestId,
                'ParentIngestManifestAssetId' => $parentIngestManifestAssetId,
                'ErrorDetail' => 'Some error details',
        ];
        $created = new \Datetime($options['Created']);
        $modified = new \Datetime($options['LastModified']);

        // Test
        $manifestFile = IngestManifestFile::createFromOptions($options);

        // Assert
        $this->assertEquals($id, $manifestFile->getId());
        $this->assertEquals($name, $manifestFile->getName());
        $this->assertEquals($options['EncryptionVersion'], $manifestFile->getEncryptionVersion());
        $this->assertEquals($options['EncryptionScheme'], $manifestFile->getEncryptionScheme());
        $this->assertEquals($options['IsEncrypted'], $manifestFile->getIsEncrypted());
        $this->assertEquals($encryptionKeyId, $manifestFile->getEncryptionKeyId());
        $this->assertEquals($options['IsPrimary'], $manifestFile->getIsPrimary());
        $this->assertEquals($options['InitializationVector'], $manifestFile->getInitializationVector());
        $this->assertEquals($created->getTimestamp(), $manifestFile->getCreated()->getTimestamp());
        $this->assertEquals($modified->getTimestamp(), $manifestFile->getLastModified()->getTimestamp());
        $this->assertEquals($options['MimeType'], $manifestFile->getMimeType());
        $this->assertEquals($options['State'], $manifestFile->getState());
        $this->assertEquals($parentIngestManifestId, $manifestFile->getParentIngestManifestId());
        $this->assertEquals($parentIngestManifestAssetId, $manifestFile->getParentIngestManifestAssetId());
        $this->assertEquals($options['ErrorDetail'], $manifestFile->getErrorDetail());
    }

    /**
     * @covers \WindowsAzure\MediaServices\Models\IngestManifestFile::getId
     */
    public function testGetId()
    {

        // Setup
        $id = 'manifest-file-id-897';
        $name = 'Manifest File Name 4634';
        $parentIngestManifestId = 'parent-ingest-manifest-id-345';
        $parentIngestManifestAssetId = 'parent-ingest-manifest-asset-id-347';
        $options = [
                'Id' => $id,
                'Name' => $name,
                'ParentIngestManifestId' => $parentIngestManifestId,
                'ParentIngestManifestAssetId' => $parentIngestManifestAssetId,
        ];
        $manifestFile = IngestManifestFile::createFromOptions($options);

        // Test
        $result = $manifestFile->getId();

        // Assert
        $this->assertEquals($id, $result);
    }

    /**
     * @covers \WindowsAzure\MediaServices\Models\IngestManifestFile::getCreated
     */
    public function testGetCreated()
    {

        // Setup
        $name = 'Manifest File Name 4634';
        $parentIngestManifestId = 'parent-ingest-manifest-id-345';
        $parentIngestManifestAssetId = 'parent-ingest-manifest-asset-id-347';
        $options = [
                'Name' => $name,
                'Created' => '2013-12-18',
                'ParentIngestManifestId' => $parentIngestManifestId,
                'ParentIngestManifestAssetId' => $parentIngestManifestAssetId,
        ];
        $created = new \Datetime($options['Created']);
        $manifestFile = IngestManifestFile::createFromOptions($options);

        // Test
        $result = $manifestFile->getCreated();

        // Assert
        $this->assertEquals($created->getTimestamp(), $result->getTimestamp());
    }

    /**
     * @covers \WindowsAzure\MediaServices\Models\IngestManifestFile::getLastModified
     */
    public function testGetLastModified()
    {

        // Setup
        $name = 'Manifest File Name 4634';
        $parentIngestManifestId = 'parent-ingest-manifest-id-345';
        $parentIngestManifestAssetId = 'parent-ingest-manifest-asset-id-347';
        $options = [
                'Name' => $name,
                'LastModified' => '2013-12-18',
                'ParentIngestManifestId' => $parentIngestManifestId,
                'ParentIngestManifestAssetId' => $parentIngestManifestAssetId,
        ];
        $modified = new \Datetime($options['LastModified']);
        $manifestFile = IngestManifestFile::createFromOptions($options);

        // Test
        $result = $manifestFile->getLastModified();

        // Assert
        $this->assertEquals($modified->getTimestamp(), $result->getTimestamp());
    }

    /**
     * @covers \WindowsAzure\MediaServices\Models\IngestManifestFile::getErrorDetail
     */
    public function testGetErrorDetail()
    {

        // Setup
        $errorDetail = 'Some error detail';
        $name = 'Manifest File Name 4634';
        $parentIngestManifestId = 'parent-ingest-manifest-id-345';
        $parentIngestManifestAssetId = 'parent-ingest-manifest-asset-id-347';
        $options = [
                'Name' => $name,
                'ParentIngestManifestId' => $parentIngestManifestId,
                'ParentIngestManifestAssetId' => $parentIngestManifestAssetId,
                'ErrorDetail' => $errorDetail,
        ];
        $manifestFile = IngestManifestFile::createFromOptions($options);

        // Test
        $result = $manifestFile->getErrorDetail();

        // Assert
        $this->assertEquals($errorDetail, $result);
    }

    /**
     * @covers \WindowsAzure\MediaServices\Models\IngestManifestFile::getState
     */
    public function testGetState()
    {

        // Setup
        $state = IngestManifestFile::STATE_FINISHED;
        $name = 'Manifest File Name 4634';
        $parentIngestManifestId = 'parent-ingest-manifest-id-345';
        $parentIngestManifestAssetId = 'parent-ingest-manifest-asset-id-347';
        $options = [
                'Name' => $name,
                'ParentIngestManifestId' => $parentIngestManifestId,
                'ParentIngestManifestAssetId' => $parentIngestManifestAssetId,
                'State' => $state,
        ];
        $manifestFile = IngestManifestFile::createFromOptions($options);

        // Test
        $result = $manifestFile->getState();

        // Assert
        $this->assertEquals($state, $result);
    }

    /**
     * @covers \WindowsAzure\MediaServices\Models\IngestManifestFile::getName
     * @covers \WindowsAzure\MediaServices\Models\IngestManifestFile::setName
     */
    public function testSetGetName()
    {

        // Setup
        $name = 'Manifest File Name 4634';
        $parentIngestManifestId = 'parent-ingest-manifest-id-345';
        $parentIngestManifestAssetId = 'parent-ingest-manifest-asset-id-347';
        $manifestFile = new IngestManifestFile($name, $parentIngestManifestId, $parentIngestManifestAssetId);

        // Test
        $manifestFile->setName($name);
        $result = $manifestFile->getName();

        // Assert
        $this->assertEquals($name, $result);
    }

    /**
     * @covers \WindowsAzure\MediaServices\Models\IngestManifestFile::getEncryptionVersion
     * @covers \WindowsAzure\MediaServices\Models\IngestManifestFile::setEncryptionVersion
     */
    public function testSetGetEncryptionVersion()
    {

        // Setup
        $name = 'Manifest File Name 4634';
        $parentIngestManifestId = 'parent-ingest-manifest-id-345';
        $parentIngestManifestAssetId = 'parent-ingest-manifest-asset-id-347';
        $encryptionVersion = 'Encryption Version';
        $manifestFile = new IngestManifestFile($name, $parentIngestManifestId, $parentIngestManifestAssetId);

        // Test
        $manifestFile->setEncryptionVersion($encryptionVersion);
        $result = $manifestFile->getEncryptionVersion();

        // Assert
        $this->assertEquals($encryptionVersion, $result);
    }

    /**
     * @covers \WindowsAzure\MediaServices\Models\IngestManifestFile::getEncryptionScheme
     * @covers \WindowsAzure\MediaServices\Models\IngestManifestFile::setEncryptionScheme
     */
    public function testSetGetEncryptionScheme()
    {

        // Setup
        $name = 'Manifest File Name 4634';
        $parentIngestManifestId = 'parent-ingest-manifest-id-345';
        $parentIngestManifestAssetId = 'parent-ingest-manifest-asset-id-347';
        $encryptionScheme = 'Encryption Scheme';
        $manifestFile = new IngestManifestFile($name, $parentIngestManifestId, $parentIngestManifestAssetId);

        // Test
        $manifestFile->setEncryptionScheme($encryptionScheme);
        $result = $manifestFile->getEncryptionScheme();

        // Assert
        $this->assertEquals($encryptionScheme, $result);
    }

    /**
     * @covers \WindowsAzure\MediaServices\Models\IngestManifestFile::getIsEncrypted
     * @covers \WindowsAzure\MediaServices\Models\IngestManifestFile::setIsEncrypted
     */
    public function testSetGetIsEncrypted()
    {

        // Setup
        $name = 'Manifest File Name 4634';
        $parentIngestManifestId = 'parent-ingest-manifest-id-345';
        $parentIngestManifestAssetId = 'parent-ingest-manifest-asset-id-347';
        $isEncrypted = false;
        $manifestFile = new IngestManifestFile($name, $parentIngestManifestId, $parentIngestManifestAssetId);

        // Test
        $manifestFile->setIsEncrypted($isEncrypted);
        $result = $manifestFile->getIsEncrypted();

        // Assert
        $this->assertEquals($isEncrypted, $result);
    }

    /**
     * @covers \WindowsAzure\MediaServices\Models\IngestManifestFile::getEncryptionKeyId
     * @covers \WindowsAzure\MediaServices\Models\IngestManifestFile::setEncryptionKeyId
     */
    public function testSetGetEncryptionKeyId()
    {

        // Setup
        $name = 'Manifest File Name 4634';
        $parentIngestManifestId = 'parent-ingest-manifest-id-345';
        $parentIngestManifestAssetId = 'parent-ingest-manifest-asset-id-347';
        $encryptionKeyId = 'Encryption-Key-Id-56764';
        $manifestFile = new IngestManifestFile($name, $parentIngestManifestId, $parentIngestManifestAssetId);

        // Test
        $manifestFile->setEncryptionKeyId($encryptionKeyId);
        $result = $manifestFile->getEncryptionKeyId();

        // Assert
        $this->assertEquals($encryptionKeyId, $result);
    }

    /**
     * @covers \WindowsAzure\MediaServices\Models\IngestManifestFile::getInitializationVector
     * @covers \WindowsAzure\MediaServices\Models\IngestManifestFile::setInitializationVector
     */
    public function testSetGetInitializationVector()
    {

        // Setup
        $name = 'Manifest File Name 4634';
        $parentIngestManifestId = 'parent-ingest-manifest-id-345';
        $parentIngestManifestAssetId = 'parent-ingest-manifest-asset-id-347';
        $initializationVector = 'Initialization Vector';
        $manifestFile = new IngestManifestFile($name, $parentIngestManifestId, $parentIngestManifestAssetId);

        // Test
        $manifestFile->setInitializationVector($initializationVector);
        $result = $manifestFile->getInitializationVector();

        // Assert
        $this->assertEquals($initializationVector, $result);
    }

    /**
     * @covers \WindowsAzure\MediaServices\Models\IngestManifestFile::getIsPrimary
     * @covers \WindowsAzure\MediaServices\Models\IngestManifestFile::setIsprimary
     */
    public function testSetGetIsPrimary()
    {

        // Setup
        $name = 'Manifest File Name 4634';
        $parentIngestManifestId = 'parent-ingest-manifest-id-345';
        $parentIngestManifestAssetId = 'parent-ingest-manifest-asset-id-347';
        $isPrimary = false;
        $manifestFile = new IngestManifestFile($name, $parentIngestManifestId, $parentIngestManifestAssetId);

        // Test
        $manifestFile->setIsPrimary($isPrimary);
        $result = $manifestFile->getIsPrimary();

        // Assert
        $this->assertEquals($isPrimary, $result);
    }

    /**
     * @covers \WindowsAzure\MediaServices\Models\IngestManifestFile::getMimeType
     * @covers \WindowsAzure\MediaServices\Models\IngestManifestFile::setMimeType
     */
    public function testSetGetMimeType()
    {

        // Setup
        $name = 'Manifest File Name 4634';
        $parentIngestManifestId = 'parent-ingest-manifest-id-345';
        $parentIngestManifestAssetId = 'parent-ingest-manifest-asset-id-347';
        $mimeType = 'Mime type';
        $manifestFile = new IngestManifestFile($name, $parentIngestManifestId, $parentIngestManifestAssetId);

        // Test
        $manifestFile->setMimeType($mimeType);
        $result = $manifestFile->getMimeType();

        // Assert
        $this->assertEquals($mimeType, $result);
    }

    /**
     * @covers \WindowsAzure\MediaServices\Models\IngestManifestFile::getParentIngestManifestId
     * @covers \WindowsAzure\MediaServices\Models\IngestManifestFile::setParentIngestManifestId
     */
    public function testSetGetParentIngestManifestId()
    {

        // Setup
        $name = 'Manifest File Name 4634';
        $parentIngestManifestId = 'parent-ingest-manifest-id-345';
        $parentIngestManifestAssetId = 'parent-ingest-manifest-asset-id-347';
        $manifestFile = new IngestManifestFile($name, $parentIngestManifestId, $parentIngestManifestAssetId);

        // Test
        $manifestFile->setParentIngestManifestId($parentIngestManifestId);
        $result = $manifestFile->getParentIngestManifestId();

        // Assert
        $this->assertEquals($parentIngestManifestId, $result);
    }

    /**
     * @covers \WindowsAzure\MediaServices\Models\IngestManifestFile::getParentIngestManifestAssetId
     * @covers \WindowsAzure\MediaServices\Models\IngestManifestFile::setParentIngestManifestAssetId
     */
    public function testSetGetParentIngestManifestAssetId()
    {

        // Setup
        $name = 'Manifest File Name 4634';
        $parentIngestManifestId = 'parent-ingest-manifest-id-345';
        $parentIngestManifestAssetId = 'parent-ingest-manifest-asset-id-347';
        $manifestFile = new IngestManifestFile($name, $parentIngestManifestId, $parentIngestManifestAssetId);

        // Test
        $manifestFile->setParentIngestManifestAssetId($parentIngestManifestAssetId);
        $result = $manifestFile->getParentIngestManifestAssetId();

        // Assert
        $this->assertEquals($parentIngestManifestAssetId, $result);
    }
}
