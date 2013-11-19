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
 * @package   Tests\Unit\WindowsAzure\Blob
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */

namespace Tests\Unit\WindowsAzure\MediaServices;
use Tests\Framework\MediaServicesRestProxyTestBase;
use Tests\Framework\TestResources;
use WindowsAzure\Common\Internal\Resources;
use WindowsAzure\Common\Internal\Utilities;
use WindowsAzure\Common\ServiceException;
use WindowsAzure\Common\Models\ServiceProperties;
use WindowsAzure\MediaServices\Models\Asset;
use WindowsAzure\MediaServices\Models\AccessPolicy;
use WindowsAzure\MediaServices\Models\Locator;

/**
 * Unit tests for class MediaServicesRestProxy
 *
 * @category  Microsoft
 * @package   Tests\Unit\WindowsAzure\MediaServices
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: 0.3.1_2011-08
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
class MediaServicesRestProxyTest extends MediaServicesRestProxyTestBase
{
    /**
    * @covers WindowsAzure\MediaServices\MediaServicesRestProxy::createAsset
    */
    public function testCreateAsset()
    {
        // Setup
        $asset = new Asset(Asset::OPTIONS_NONE);
        $asset->setName('testAsset' . $this->createSuffix());

        // Test
        $result = $this->createAsset($asset);

        // Assert
        $this->assertEquals($asset->getName(), $result->getName());
    }

    /**
     * @covers WindowsAzure\MediaServices\MediaServicesRestProxy::createAccessPolicy
     */
    public function testCreateAccessPolicy()
    {
        // Setup
        $name = 'Name';
        $sample = new AccessPolicy($name);
        $sample->setName('testAccess' . $this->createSuffix());
        $sample->setDurationInMinutes(30);

        // Test
        $result = $this->createAccessPolicy($sample);

        // Assert
        $this->assertEquals($sample->getName(), $result->getName());
    }

    /**
     * @covers WindowsAzure\MediaServices\MediaServicesRestProxy::createLocator
     */
    public function testCreateLocator()
    {
        // Setup
        $asset = new Asset(Asset::OPTIONS_NONE);
        $asset->setName('AssetForLocator' . $this->createSuffix());
        $asset = $this->createAsset($asset);

        $access = new AccessPolicy('Name');
        $access->setName('AccessForLocator' . $this->createSuffix());
        $access->setDurationInMinutes(30);
        $access->setPermissions(AccessPolicy::PERMISSIONS_READ + AccessPolicy::PERMISSIONS_WRITE + AccessPolicy::PERMISSIONS_DELETE + AccessPolicy::PERMISSIONS_LIST);
        $access = $this->createAccessPolicy($access);

        $locat = new Locator($asset,  $access, 1);
        $locat->setName('testLocator' . $this->createSuffix());

        // Test
        $result = $this->createLocator($locat);

        // Assert
        $this->assertEquals($locat->getName(), $result->getName());

    }
}
