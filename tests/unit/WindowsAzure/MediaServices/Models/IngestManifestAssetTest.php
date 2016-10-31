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

use WindowsAzure\MediaServices\Models\IngestManifestAsset;

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
class IngestManifestAssetTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers \WindowsAzure\MediaServices\Models\IngestManifestAsset::createFromOptions
     * @covers \WindowsAzure\MediaServices\Models\IngestManifestAsset::fromArray
     */
    public function testCreateFromOptions()
    {

        // Setup
        $options = [
              'Id' => 'asset-id-4567',
              'Created' => '2013-12-18',
              'LastModified' => '2013-12-18',
              'ParentIngestManifestId' => 'parent-manifest-id-3562',
        ];
        $created = new \Datetime($options['Created']);
        $modified = new \Datetime($options['LastModified']);

        // Test
        $manifestAsset = IngestManifestAsset::createFromOptions($options);

        // Assert
        $this->assertEquals($options['Id'], $manifestAsset->getId());
        $this->assertEquals($options['ParentIngestManifestId'], $manifestAsset->getParentIngestManifestId());
        $this->assertEquals($created->getTimestamp(), $manifestAsset->getCreated()->getTimestamp());
        $this->assertEquals($modified->getTimestamp(), $manifestAsset->getLastModified()->getTimestamp());
    }

    /**
     * @covers \WindowsAzure\MediaServices\Models\IngestManifestAsset::__construct
     * @covers \WindowsAzure\MediaServices\Models\IngestManifestAsset::getParentIngestManifestId
     */
    public function test__construct()
    {

        // Setup
        $parentIngestManifestId = 'parent-manifest-id-3562';

        // Test
        $manifestAsset = new IngestManifestAsset($parentIngestManifestId);

        // Assert
        $this->assertEquals($parentIngestManifestId, $manifestAsset->getParentIngestManifestId());
    }

    /**
     * @covers \WindowsAzure\MediaServices\Models\IngestManifestAsset::getLastModified
     */
    public function testGetLastModified()
    {

        // Setup
        $options = [
                'LastModified' => '2013-12-18',
                'ParentIngestManifestId' => 'parent-manifest-id-3562',
        ];
        $modified = new \Datetime($options['LastModified']);
        $manifestAsset = IngestManifestAsset::createFromOptions($options);

        // Test
        $result = $manifestAsset->getLastModified();

        // Assert
        $this->assertEquals($modified->getTimestamp(), $result->getTimestamp());
    }

    /**
     * @covers \WindowsAzure\MediaServices\Models\IngestManifestAsset::getCreated
     */
    public function testGetCreated()
    {

        // Setup
        $options = [
                'Created' => '2013-12-18',
                'ParentIngestManifestId' => 'parent-manifest-id-3562',
        ];
        $created = new \Datetime($options['Created']);
        $manifestAsset = IngestManifestAsset::createFromOptions($options);

        // Test
        $result = $manifestAsset->getCreated();

        // Assert
        $this->assertEquals($created->getTimestamp(), $result->getTimestamp());
    }

    /**
     * @covers \WindowsAzure\MediaServices\Models\IngestManifestAsset::getId
     */
    public function testGetId()
    {

        // Setup
        $id = 'ingest-id-258';
        $options = [
                'Id' => $id,
                'ParentIngestManifestId' => 'parent-manifest-id-3562',
        ];
        $manifestAsset = IngestManifestAsset::createFromOptions($options);

        // Test
        $result = $manifestAsset->getId();

        // Assert
        $this->assertEquals($id, $result);
    }
}
