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
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 *
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */

namespace Tests\unit\WindowsAzure\Common\Internal;

use WindowsAzure\Common\Internal\ServiceManagementSettings;
use WindowsAzure\Common\Internal\Resources;

/**
 * Unit tests for class ServiceManagementSettings.
 *
 * @category  Microsoft
 *
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 *
 * @version   Release: 0.5.0_2016-11
 *
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
class ServiceManagementSettingsTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $property = new \ReflectionProperty('WindowsAzure\Common\Internal\ServiceManagementSettings', 'isInitialized');
        $property->setAccessible(true);
        $property->setValue(false);
    }

    /**
     * @covers \WindowsAzure\Common\Internal\ServiceManagementSettings::createFromConnectionString
     * @covers \WindowsAzure\Common\Internal\ServiceManagementSettings::init
     * @covers \WindowsAzure\Common\Internal\ServiceManagementSettings::__construct
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::getValidator
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::optional
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::allRequired
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::setting
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::settingWithFunc
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::matchedSpecification
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::parseAndValidateKeys
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::noMatch
     */
    public function testCreateFromConnectionStringWithAutomaticCase()
    {
        // Setup
        $expectedSubscriptionId = 'mySubscriptionId';
        $expectedCertificatePath = 'C:\path_to_my_cert.pem';
        $expectedEndpointUri = Resources::SERVICE_MANAGEMENT_URL;
        $connectionString = "SubscriptionID=$expectedSubscriptionId;CertificatePath=$expectedCertificatePath";

        // Test
        $actual = ServiceManagementSettings::createFromConnectionString($connectionString);

        // Assert
        $this->assertEquals($expectedEndpointUri, $actual->getEndpointUri());
        $this->assertEquals($expectedCertificatePath, $actual->getCertificatePath());
        $this->assertEquals($expectedEndpointUri, $actual->getEndpointUri());
    }

    /**
     * @covers \WindowsAzure\Common\Internal\ServiceManagementSettings::createFromConnectionString
     * @covers \WindowsAzure\Common\Internal\ServiceManagementSettings::init
     * @covers \WindowsAzure\Common\Internal\ServiceManagementSettings::__construct
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::getValidator
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::optional
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::allRequired
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::setting
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::settingWithFunc
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::matchedSpecification
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::parseAndValidateKeys
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::noMatch
     */
    public function testCreateFromConnectionStringWithExplicitCase()
    {
        // Setup
        $expectedSubscriptionId = 'mySubscriptionId';
        $expectedCertificatePath = 'C:\path_to_my_cert.pem';
        $expectedEndpointUri = 'http://myprivatedns.com';
        $connectionString = "SubscriptionID=$expectedSubscriptionId;CertificatePath=$expectedCertificatePath;ServiceManagementEndpoint=$expectedEndpointUri";

        // Test
        $actual = ServiceManagementSettings::createFromConnectionString($connectionString);

        // Assert
        $this->assertEquals($expectedEndpointUri, $actual->getEndpointUri());
        $this->assertEquals($expectedCertificatePath, $actual->getCertificatePath());
        $this->assertEquals($expectedEndpointUri, $actual->getEndpointUri());
    }

    /**
     * @covers \WindowsAzure\Common\Internal\ServiceManagementSettings::createFromConnectionString
     * @covers \WindowsAzure\Common\Internal\ServiceManagementSettings::init
     * @covers \WindowsAzure\Common\Internal\ServiceManagementSettings::__construct
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::getValidator
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::optional
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::allRequired
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::setting
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::settingWithFunc
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::matchedSpecification
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::parseAndValidateKeys
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::noMatch
     */
    public function testCreateFromConnectionStringWithMissingKeyFail()
    {
        // Setup
        $connectionString = "CertificatePath=C:\path_to_my_cert.pem;ServiceManagementEndpoint=http://myprivatedns.com";
        $expectedMsg = sprintf(Resources::MISSING_CONNECTION_STRING_SETTINGS, $connectionString);
        $this->setExpectedException('\RuntimeException', $expectedMsg);

        // Test
        ServiceManagementSettings::createFromConnectionString($connectionString);
    }

    /**
     * @covers \WindowsAzure\Common\Internal\ServiceManagementSettings::getSubscriptionId
     */
    public function testGetSubscriptionId()
    {
        // Setup
        $expected = 'subscriptionId';
        $setting = new ServiceManagementSettings($expected, null, null);

        // Test
        $actual = $setting->getSubscriptionId();

        // Assert
        $this->assertEquals($expected, $actual);
    }

    /**
     * @covers \WindowsAzure\Common\Internal\ServiceManagementSettings::getEndpointUri
     */
    public function testGetEndpointUri()
    {
        // Setup
        $expected = 'endpointUri';
        $setting = new ServiceManagementSettings(null, $expected, null);

        // Test
        $actual = $setting->getEndpointUri();

        // Assert
        $this->assertEquals($expected, $actual);
    }

    /**
     * @covers \WindowsAzure\Common\Internal\ServiceManagementSettings::getCertificatePath
     */
    public function testGetCertificatePath()
    {
        // Setup
        $expected = 'certificatePath';
        $setting = new ServiceManagementSettings(null, null, $expected);

        // Test
        $actual = $setting->getCertificatePath();

        // Assert
        $this->assertEquals($expected, $actual);
    }

    /**
     * @covers \WindowsAzure\Common\Internal\ServiceManagementSettings::createFromConnectionString
     * @covers \WindowsAzure\Common\Internal\ServiceManagementSettings::init
     * @covers \WindowsAzure\Common\Internal\ServiceManagementSettings::__construct
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::getValidator
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::optional
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::allRequired
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::setting
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::settingWithFunc
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::matchedSpecification
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::parseAndValidateKeys
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::noMatch
     */
    public function testCreateFromConnectionStringWithInvalidServiceManagementKeyFail()
    {
        // Setup
        $invalidKey = 'InvalidKey';
        $connectionString = "$invalidKey=value;SubscriptionID=12345;CertificatePath=C:\path_to_cert;ServiceManagementEndpoint=http://endpoint.com";
        $expectedMsg = sprintf(
            Resources::INVALID_CONNECTION_STRING_SETTING_KEY,
            $invalidKey,
            implode("\n", ['SubscriptionID', 'CertificatePath', 'ServiceManagementEndpoint'])
        );
        $this->setExpectedException('\RuntimeException', $expectedMsg);

        // Test
        ServiceManagementSettings::createFromConnectionString($connectionString);
    }

    /**
     * @covers \WindowsAzure\Common\Internal\ServiceManagementSettings::createFromConnectionString
     * @covers \WindowsAzure\Common\Internal\ServiceManagementSettings::init
     * @covers \WindowsAzure\Common\Internal\ServiceManagementSettings::__construct
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::getValidator
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::optional
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::allRequired
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::setting
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::settingWithFunc
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::matchedSpecification
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::parseAndValidateKeys
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::noMatch
     */
    public function testCreateFromConnectionStringWithCaseInsensitive()
    {
        // Setup
        $expectedSubscriptionId = 'mySubscriptionId';
        $expectedCertificatePath = 'C:\path_to_my_cert.pem';
        $expectedEndpointUri = 'http://myprivatedns.com';
        $connectionString = "suBscriptIonId=$expectedSubscriptionId;ceRtiFicAtepAth=$expectedCertificatePath;ServiCemAnagemenTendPoinT=$expectedEndpointUri";

        // Test
        $actual = ServiceManagementSettings::createFromConnectionString($connectionString);

        // Assert
        $this->assertEquals($expectedEndpointUri, $actual->getEndpointUri());
        $this->assertEquals($expectedCertificatePath, $actual->getCertificatePath());
        $this->assertEquals($expectedEndpointUri, $actual->getEndpointUri());
    }
}
