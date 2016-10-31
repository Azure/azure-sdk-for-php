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

use WindowsAzure\MediaServices\Models\AssetDeliveryPolicy;
use WindowsAzure\MediaServices\Models\AssetDeliveryPolicyType;
use WindowsAzure\MediaServices\Models\AssetDeliveryProtocol;
use WindowsAzure\MediaServices\Models\AssetDeliveryPolicyConfigurationKey;

/**
 * Unit Tests for AssetDeliveryPolicy.
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
class AssetDeliveryPolicyTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers \WindowsAzure\MediaServices\Models\AssetDeliveryPolicy::createFromOptions
     * @covers \WindowsAzure\MediaServices\Models\AssetDeliveryPolicy::fromArray
     * @covers \WindowsAzure\MediaServices\Models\AssetDeliveryPolicy::__construct
     */
    public function testCreateFromOptions()
    {

        // Setup
        $assetDeliveryPolicyTestId = 'AssetDeliveryPolicyTest-12563';
        $options = [
                'Id' => $assetDeliveryPolicyTestId,
                'Name' => 'testNameForAssetDeliveryPolicyTest',
                'AssetDeliveryProtocol' => AssetDeliveryProtocol::SMOOTH_STREAMING,
                'AssetDeliveryPolicyType' => AssetDeliveryPolicyType::DYNAMIC_COMMON_ENCRYPTION,
                'AssetDeliveryConfiguration' => '<root>sample configuration</root>',
                'Created' => '1975-12-14',
                'LastModified' => '2015-12-14',
        ];

        $created = new \Datetime($options['Created']);
        $modified = new \Datetime($options['LastModified']);

        // Test
        $assetDeliveryPolicy = AssetDeliveryPolicy::createFromOptions($options);

        // Assert
        $this->assertEquals($assetDeliveryPolicyTestId, $assetDeliveryPolicy->getId());
        $this->assertEquals($options['Name'], $assetDeliveryPolicy->getName());
        $this->assertEquals($options['AssetDeliveryProtocol'], $assetDeliveryPolicy->getAssetDeliveryProtocol());
        $this->assertEquals($options['AssetDeliveryPolicyType'], $assetDeliveryPolicy->getAssetDeliveryPolicyType());
        $this->assertEquals($options['AssetDeliveryConfiguration'], $assetDeliveryPolicy->getAssetDeliveryConfiguration());
        $this->assertEquals($created, $assetDeliveryPolicy->getCreated());
        $this->assertEquals($modified, $assetDeliveryPolicy->getLastModified());
    }

    /**
     * @covers \WindowsAzure\MediaServices\Models\AssetDeliveryPolicy::getName
     * @covers \WindowsAzure\MediaServices\Models\AssetDeliveryPolicy::setName
     */
    public function testGetSetName()
    {

        // Setup
        $expected = 'testNameForAssetDeliveryPolicy';
        $assetDeliveryPolicy = new AssetDeliveryPolicy();

        // Test
        $assetDeliveryPolicy->setName($expected);
        $result = $assetDeliveryPolicy->getName();

        // Assert
        $this->assertEquals($expected, $result);
    }

    /**
     * @covers \WindowsAzure\MediaServices\Models\AssetDeliveryPolicy::getId
     * @covers \WindowsAzure\MediaServices\Models\AssetDeliveryPolicy::setId
     */
    public function testGetSetId()
    {

        // Setup
        $expected = 'content-key-authorization-policy-id-312312';
        $assetDeliveryPolicy = new AssetDeliveryPolicy();

        // Test
        $assetDeliveryPolicy->setId($expected);
        $result = $assetDeliveryPolicy->getId();

        // Assert
        $this->assertEquals($expected, $result);
    }

    /**
     * @covers \WindowsAzure\MediaServices\Models\AssetDeliveryPolicy::getAssetDeliveryProtocol
     * @covers \WindowsAzure\MediaServices\Models\AssetDeliveryPolicy::setAssetDeliveryProtocol
     */
    public function testGetSetAssetDeliveryProtocol()
    {

        // Setup
        $expected = AssetDeliveryProtocol::DASH;
        $assetDeliveryPolicy = new AssetDeliveryPolicy();

        // Test
        $assetDeliveryPolicy->setAssetDeliveryProtocol($expected);
        $result = $assetDeliveryPolicy->getAssetDeliveryProtocol();

        // Assert
        $this->assertEquals($expected, $result);
    }

    /**
     * @covers \WindowsAzure\MediaServices\Models\AssetDeliveryPolicy::getAssetDeliveryPolicyType
     * @covers \WindowsAzure\MediaServices\Models\AssetDeliveryPolicy::setAssetDeliveryPolicyType
     */
    public function testGetSetAssetDeliveryPolicyType()
    {

        // Setup
        $expected = AssetDeliveryPolicyType::DYNAMIC_COMMON_ENCRYPTION;
        $assetDeliveryPolicy = new AssetDeliveryPolicy();

        // Test
        $assetDeliveryPolicy->setAssetDeliveryPolicyType($expected);
        $result = $assetDeliveryPolicy->getAssetDeliveryPolicyType();

        // Assert
        $this->assertEquals($expected, $result);
    }

    /**
     * @covers \WindowsAzure\MediaServices\Models\AssetDeliveryPolicy::getAssetDeliveryConfiguration
     * @covers \WindowsAzure\MediaServices\Models\AssetDeliveryPolicy::setAssetDeliveryConfiguration
     */
    public function testGetSetAssetDeliveryConfiguration()
    {

        // Setup
        $expected = '<root>sample configuration</root>';
        $assetDeliveryPolicy = new AssetDeliveryPolicy();

        // Test
        $assetDeliveryPolicy->setAssetDeliveryConfiguration($expected);
        $result = $assetDeliveryPolicy->getAssetDeliveryConfiguration();

        // Assert
        $this->assertEquals($expected, $result);
    }

    /**
     * @covers \WindowsAzure\MediaServices\Models\AssetDeliveryPolicyConfigurationKey::stringifyAssetDeliveryPolicyConfigurationKey
     * @covers \WindowsAzure\MediaServices\Models\AssetDeliveryPolicyConfigurationKey::parseAssetDeliveryPolicyConfigurationKey
     */
    public function testStringifyParseDeliveryPolicyConfigurationKey()
    {

        // Setup
        $configuration = [AssetDeliveryPolicyConfigurationKey::ENVELOPE_KEY_ACQUISITION_URL => 'http://testurl/path',
                          AssetDeliveryPolicyConfigurationKey::ENVELOPE_ENCRYPTION_IV_AS_BASE64 => 'base64=', ];

        // Test
        $json = AssetDeliveryPolicyConfigurationKey::stringifyAssetDeliveryPolicyConfigurationKey($configuration);
        $result = AssetDeliveryPolicyConfigurationKey::parseAssetDeliveryPolicyConfigurationKey($json);

        // Assert
        $this->assertEquals($configuration, $result);
    }
}
