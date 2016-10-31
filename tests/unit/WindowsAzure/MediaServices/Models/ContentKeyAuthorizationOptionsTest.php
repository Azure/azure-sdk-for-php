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

use Tests\Framework\TestResources;
use WindowsAzure\MediaServices\Models\ContentKeyAuthorizationPolicyOption;
use WindowsAzure\MediaServices\Models\ContentKeyAuthorizationPolicyRestriction;
use WindowsAzure\MediaServices\Models\ContentKeyDeliveryType;
use WindowsAzure\MediaServices\Models\ContentKeyRestrictionType;

/**
 * Unit Tests for ContentKeyAuthorizationPolicyOption.
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
class ContentKeyAuthorizationOptionsTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers \WindowsAzure\MediaServices\Models\ContentKeyAuthorizationPolicyOption::createFromOptions
     * @covers \WindowsAzure\MediaServices\Models\ContentKeyAuthorizationPolicyOption::fromArray
     * @covers \WindowsAzure\MediaServices\Models\ContentKeyAuthorizationPolicyOption::__construct
     */
    public function testCreateFromOptions()
    {

        // Setup
        $contentKeyAuthorizationOptionsId = 'content-key-authorization-options-id-12563';
        $options = [
                'Id' => $contentKeyAuthorizationOptionsId,
                'Name' => 'testNameForContentKeyAuthorizationPolicyOption',
                'KeyDeliveryType' => 2,
                'KeyDeliveryConfiguration' => 'testKeyDeliveryConfiguration',
                'Restrictions' => [],

        ];

        // Test
        $contentKeyAuthorizationOptions = ContentKeyAuthorizationPolicyOption::createFromOptions($options);

        // Assert
        $this->assertEquals($contentKeyAuthorizationOptionsId, $contentKeyAuthorizationOptions->getId());
        $this->assertEquals($options['Name'], $contentKeyAuthorizationOptions->getName());
        $this->assertEquals($options['KeyDeliveryType'], $contentKeyAuthorizationOptions->getKeyDeliveryType());
        $this->assertEquals($options['KeyDeliveryConfiguration'], $contentKeyAuthorizationOptions->getKeyDeliveryConfiguration());
        // TODO: Restrictions
    }

    /**
     * @covers \WindowsAzure\MediaServices\Models\ContentKeyAuthorizationPolicyOption::requiredFields
     */
    public function testRequiredFields()
    {
        // Setup
        $contentKeyAuthorizationOptions = new ContentKeyAuthorizationPolicyOption();
        $fixture = ['KeyDeliveryType'];

        // Test
        $result = $contentKeyAuthorizationOptions->requiredFields();

        // Assert
        $this->assertEquals($fixture, $result);
    }

    /**
     * @covers \WindowsAzure\MediaServices\Models\ContentKeyAuthorizationPolicyOption::getName
     * @covers \WindowsAzure\MediaServices\Models\ContentKeyAuthorizationPolicyOption::setName
     */
    public function testGetSetName()
    {

        // Setup
        $testNameForContentKeyAuthorizationPolicyOption = 'testNameForContentKeyAuthorizationPolicyOption';
        $contentKeyAuthorizationOptions = new ContentKeyAuthorizationPolicyOption();

        // Test
        $contentKeyAuthorizationOptions->setName($testNameForContentKeyAuthorizationPolicyOption);
        $result = $contentKeyAuthorizationOptions->getName();

        // Assert
        $this->assertEquals($testNameForContentKeyAuthorizationPolicyOption, $result);
    }

    /**
     * @covers \WindowsAzure\MediaServices\Models\ContentKeyAuthorizationPolicyOption::getId
     * @covers \WindowsAzure\MediaServices\Models\ContentKeyAuthorizationPolicyOption::setId
     */
    public function testGetSetId()
    {

        // Setup
        $testNameForContentKeyAuthorizationPolicyOptionId = 'content-key-authorization-Options-id-312312';
        $contentKeyAuthorizationOptions = new ContentKeyAuthorizationPolicyOption();

        // Test
        $contentKeyAuthorizationOptions->setId($testNameForContentKeyAuthorizationPolicyOptionId);
        $result = $contentKeyAuthorizationOptions->getId();

        // Assert
        $this->assertEquals($testNameForContentKeyAuthorizationPolicyOptionId, $result);
    }

    /**
     * @covers \WindowsAzure\MediaServices\Models\ContentKeyAuthorizationPolicyOption::getKeyDeliveryType
     * @covers \WindowsAzure\MediaServices\Models\ContentKeyAuthorizationPolicyOption::setKeyDeliveryType
     */
    public function testGetSetKeyDeliveryType()
    {
        // Setup
        $testNameForContentKeyAuthorizationPolicyOptionKeyDeliveryType = 2;
        $contentKeyAuthorizationOptions = new ContentKeyAuthorizationPolicyOption();

        // Test
        $contentKeyAuthorizationOptions->setKeyDeliveryType($testNameForContentKeyAuthorizationPolicyOptionKeyDeliveryType);
        $result = $contentKeyAuthorizationOptions->getKeyDeliveryType();

        // Assert
        $this->assertEquals($testNameForContentKeyAuthorizationPolicyOptionKeyDeliveryType, $result);
    }

    /**
     * @covers \WindowsAzure\MediaServices\Models\ContentKeyAuthorizationPolicyOption::getKeyDeliveryConfiguration
     * @covers \WindowsAzure\MediaServices\Models\ContentKeyAuthorizationPolicyOption::setKeyDeliveryConfiguration
     */
    public function testGetSetKeyDeliveryConfiguration()
    {
        // Setup
        $testNameForContentKeyAuthorizationPolicyOptionKeyDeliveryConfiguration = 'content-key-authorization-Options-id-312312';
        $contentKeyAuthorizationOptions = new ContentKeyAuthorizationPolicyOption();

        // Test
        $contentKeyAuthorizationOptions->setKeyDeliveryConfiguration($testNameForContentKeyAuthorizationPolicyOptionKeyDeliveryConfiguration);
        $result = $contentKeyAuthorizationOptions->getKeyDeliveryConfiguration();

        // Assert
        $this->assertEquals($testNameForContentKeyAuthorizationPolicyOptionKeyDeliveryConfiguration, $result);
    }

    /**
     * @covers \WindowsAzure\MediaServices\Models\ContentKeyAuthorizationPolicyOption::getRestrictions
     * @covers \WindowsAzure\MediaServices\Models\ContentKeyAuthorizationPolicyOption::setRestrictions
     */
    public function testGetSetRestrictions()
    {
        // Setup
        $name = TestResources::MEDIA_SERVICES_CONTENT_KEY_AUTHORIZATION_OPTIONS_NAME;
        $restrictionName = TestResources::MEDIA_SERVICES_CONTENT_KEY_AUTHORIZATION_POLICY_RESTRICTION_NAME;
        $restriction = new ContentKeyAuthorizationPolicyRestriction();
        $restriction->setName($restrictionName);
        $restriction->setKeyRestrictionType(ContentKeyRestrictionType::OPEN);
        $restrictions = [$restriction];

        $options = new ContentKeyAuthorizationPolicyOption();
        $options->setName($name);
        $options->setKeyDeliveryType(ContentKeyDeliveryType::BASELINE_HTTP);
        $options->setRestrictions($restrictions);
        // Test

        $result = $options->getRestrictions();

        // Assert
        $this->assertEquals($result, $restrictions);
    }
}
