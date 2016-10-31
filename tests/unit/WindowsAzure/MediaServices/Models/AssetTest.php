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

use WindowsAzure\MediaServices\Models\Asset;

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
class AssetTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers \WindowsAzure\MediaServices\Models\Asset::__construct
     */
    public function test__construct()
    {

        // Setup
        $option = Asset::OPTIONS_NONE;

        // Test
        $result = new Asset(Asset::OPTIONS_NONE);

        // Assert
        $this->assertEquals($option, $result->getOptions());
    }

    /**
     * @covers \WindowsAzure\MediaServices\Models\Asset::getUri
     */
    public function testGetUri()
    {

       // Setup
        $assetArray = [
            'Options' => Asset::OPTIONS_NONE,
            'Uri' => 'http://someurl.com/asset',
        ];
        $value = Asset::createFromOptions($assetArray);

        // Test
        $actual = $value->getUri();

        // Assert
        $this->assertEquals($assetArray['Uri'], $actual);
    }

    /**
     * @covers \WindowsAzure\MediaServices\Models\Asset::getOptions
     * @covers \WindowsAzure\MediaServices\Models\Asset::setOptions
     */
    public function testGetOptions()
    {

        // Setup
        $asset = new Asset(Asset::OPTIONS_NONE);
        $option = Asset::OPTIONS_ENVELOPE_ENCRYPTION_PROTECTED;
        $asset->setOptions($option);

        // Test
        $actual = $asset->getOptions();

        // Assert
        $this->assertEquals($option, $actual);
    }

    /**
     * @covers \WindowsAzure\MediaServices\Models\Asset::getName
     * @covers \WindowsAzure\MediaServices\Models\Asset::setName
     */
    public function testGetName()
    {

        // Setup
        $asset = new Asset(Asset::OPTIONS_NONE);
        $name = 'NewName';
        $asset->setName($name);

        // Test
        $actual = $asset->getName();

        // Assert
        $this->assertEquals($name, $actual);
    }

    /**
     * @covers \WindowsAzure\MediaServices\Models\Asset::getAlternateId
     * @covers \WindowsAzure\MediaServices\Models\Asset::setAlternateId
     */
    public function testGetAlternateId()
    {

        // Setup
        $asset = new Asset(Asset::OPTIONS_NONE);
        $id = 'AlterID';
        $asset->setAlternateId($id);

        // Test
        $actual = $asset->getAlternateId();

        // Assert
        $this->assertEquals($id, $actual);
    }

    /**
     * @covers \WindowsAzure\MediaServices\Models\Asset::getLastModified
     */
    public function testGetLastModified()
    {

         // Setup
        $assetArray = [
            'Options' => Asset::OPTIONS_NONE,
            'LastModified' => '2013-11-21',
        ];
        $modified = new \Datetime($assetArray['LastModified']);
        $value = Asset::createFromOptions($assetArray);

        // Test
        $actual = $value->getLastModified();

        // Assert
        $this->assertEquals($modified->getTimestamp(), $actual->getTimestamp());
    }

    /**
     * @covers \WindowsAzure\MediaServices\Models\Asset::getCreated
     */
    public function testGetCreated()
    {

         // Setup
        $assetArray = [
            'Options' => Asset::OPTIONS_NONE,
            'Created' => '2013-11-21',
        ];
        $created = new \Datetime($assetArray['Created']);
        $value = Asset::createFromOptions($assetArray);

        // Test
        $actual = $value->getCreated();

        // Assert
        $this->assertEquals($created->getTimestamp(), $actual->getTimestamp());
    }

    /**
     * @covers \WindowsAzure\MediaServices\Models\Asset::getState
     */
    public function testGetState()
    {

        // Setup
        $assetArray = [
            'Options' => Asset::OPTIONS_NONE,
            'State' => Asset::STATE_PUBLISHED,
        ];
        $value = Asset::createFromOptions($assetArray);

        // Test
        $actual = $value->getState();

        // Assert
        $this->assertEquals($assetArray['State'], $actual);
    }

    /**
     * @covers \WindowsAzure\MediaServices\Models\Asset::getStorageAccountName
     */
    public function testGetStorageAccountName()
    {

       // Setup
        $assetArray = [
            'Options' => Asset::OPTIONS_NONE,
            'StorageAccountName' => 'StorageAccountName',
        ];
        $value = Asset::createFromOptions($assetArray);

        // Test
        $actual = $value->getStorageAccountName();

        // Assert
        $this->assertEquals($assetArray['StorageAccountName'], $actual);
    }

    /**
     * @covers \WindowsAzure\MediaServices\Models\Asset::getId
     */
    public function testGetId()
    {

        // Setup
        $assetArray = [
            'Id' => 'kjgdfg57',
            'Options' => Asset::OPTIONS_NONE,
        ];
        $value = Asset::createFromOptions($assetArray);

        // Test
        $actual = $value->getId();

        // Assert
        $this->assertEquals($assetArray['Id'], $actual);
    }

    /**
     * @covers \WindowsAzure\MediaServices\Models\Asset::createFromOptions
     * @covers \WindowsAzure\MediaServices\Models\Asset::fromArray
     */
    public function testAssetFromOptions()
    {

        // Setup
        $assetArray = [
            'Id' => '1',
            'State' => Asset::STATE_PUBLISHED,
            'Created' => '2013-11-19',
            'LastModified' => '2013-11-19',
            'AlternateId' => '2',
            'Name' => 'newName',
            'Options' => Asset::OPTIONS_NONE,
            'Uri' => 'http://en.wikipedia.org/wiki/Uniform_resource_locator',
            'StorageAccountName' => 'StorageName',
        ];
        $created = new \Datetime($assetArray['Created']);
        $modified = new \Datetime($assetArray['LastModified']);

        // Test
        $resultAsset = Asset::createFromOptions($assetArray);

        // Assert
        $this->assertEquals($assetArray['Id'], $resultAsset->getId());
        $this->assertEquals($assetArray['State'], $resultAsset->getState());
        $this->assertEquals($created, $resultAsset->getCreated());
        $this->assertEquals($modified, $resultAsset->getLastModified());
        $this->assertEquals($assetArray['AlternateId'], $resultAsset->getAlternateId());
        $this->assertEquals($assetArray['Name'], $resultAsset->getName());
        $this->assertEquals($assetArray['Options'], $resultAsset->getOptions());
        $this->assertEquals($assetArray['Uri'], $resultAsset->getUri());
        $this->assertEquals($assetArray['StorageAccountName'], $resultAsset->getStorageAccountName());
    }
}
