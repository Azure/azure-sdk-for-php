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

use WindowsAzure\Common\Internal\ServiceBusSettings;
use WindowsAzure\Common\Internal\Resources;
use WindowsAzure\Common\Internal\Filters\WrapFilter;
use PHPUnit\Framework\TestCase;

/**
 * Unit tests for class ServiceBusSettings.
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
class ServiceBusSettingsTest extends TestCase
{
    public function setUp()
    {
        $property = new \ReflectionProperty('WindowsAzure\Common\Internal\ServiceBusSettings', 'isInitialized');
        $property->setAccessible(true);
        $property->setValue(false);
    }

    /**
     * @covers \WindowsAzure\Common\Internal\ServiceBusSettings::createFromConnectionString
     * @covers \WindowsAzure\Common\Internal\ServiceBusSettings::init
     * @covers \WindowsAzure\Common\Internal\ServiceBusSettings::__construct
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::getValidator
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::optional
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::allRequired
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::setting
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::settingWithFunc
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::matchedSpecification
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::parseAndValidateKeys
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::noMatch
     */
    public function testCreateFromConnectionStringWithServiceBusAutomaticCase()
    {
        // Setup
        $namespace = 'mynamespace';
        $expectedServiceBusEndpoint = "https://$namespace.servicebus.windows.net";
        $expectedWrapName = 'myname';
        $expectedWrapPassword = 'mypassword';
        $expectedWrapEndpointUri = "https://$namespace-sb.accesscontrol.windows.net/WRAPv0.9";
        $connectionString = "Endpoint=$expectedServiceBusEndpoint;SharedSecretIssuer=$expectedWrapName;SharedSecretValue=$expectedWrapPassword";

        // Test
        $actual = ServiceBusSettings::createFromConnectionString($connectionString);

        // Assert
        $this->assertInstanceOf('WindowsAzure\Common\Internal\IServiceFilter', $actual->getFilter());
        $this->assertEquals($expectedServiceBusEndpoint, $actual->getServiceBusEndpointUri());
    }

    /**
     * @covers \WindowsAzure\Common\Internal\ServiceBusSettings::createFromConnectionString
     * @covers \WindowsAzure\Common\Internal\ServiceBusSettings::init
     * @covers \WindowsAzure\Common\Internal\ServiceBusSettings::__construct
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::getValidator
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::optional
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::allRequired
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::setting
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::settingWithFunc
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::matchedSpecification
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::parseAndValidateKeys
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::noMatch
     */
    public function testCreateFromConnectionStringWithMissingServiceBusEndpointFail()
    {
        // Setup
        $connectionString = 'SharedSecretIssuer=name;SharedSecretValue=password';
        $expectedMsg = sprintf(Resources::MISSING_CONNECTION_STRING_SETTINGS, $connectionString);

        $this->setExpectedException('\RuntimeException', $expectedMsg);

        // Test
        ServiceBusSettings::createFromConnectionString($connectionString);
    }

    /**
     * @covers \WindowsAzure\Common\Internal\ServiceBusSettings::createFromConnectionString
     * @covers \WindowsAzure\Common\Internal\ServiceBusSettings::init
     * @covers \WindowsAzure\Common\Internal\ServiceBusSettings::__construct
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::getValidator
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::optional
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::allRequired
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::setting
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::settingWithFunc
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::matchedSpecification
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::parseAndValidateKeys
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::noMatch
     */
    public function testCreateFromConnectionStringWithInvalidServiceBusKeyFail()
    {
        // Setup
        $invalidKey = 'InvalidKey';
        $connectionString = "$invalidKey=value;SharedSecretIssuer=name;SharedSecretValue=password";
        $expectedMsg = sprintf(
            Resources::INVALID_CONNECTION_STRING_SETTING_KEY,
            $invalidKey,
            implode("\n", ['Endpoint', 'EntityPath', 'SharedSecretIssuer', 'SharedSecretValue'])
        );
        $this->setExpectedException('\RuntimeException', $expectedMsg);

        // Test
        ServiceBusSettings::createFromConnectionString($connectionString);
    }

    /**
     * @covers \WindowsAzure\Common\Internal\ServiceBusSettings::getServiceBusEndpointUri
     */
    public function testGetServiceBusEndpointUri()
    {
        // Setup
        $expected = 'serviceBusEndpointUri';
        $setting = new ServiceBusSettings($expected, null);

        // Test
        $actual = $setting->getServiceBusEndpointUri();

        // Assert
        $this->assertEquals($expected, $actual);
    }

    /**
     * @covers \WindowsAzure\Common\Internal\ServiceBusSettings::getFilter
     */
    public function testGetFilter()
    {
        // Setup
        $expected = 'filter';
        $setting = new ServiceBusSettings(null, $expected);

        // Test
        $actual = $setting->getFilter();

        // Assert
        $this->assertEquals($expected, $actual);
    }

    /**
     * @covers \WindowsAzure\Common\Internal\ServiceBusSettings::createFromConnectionString
     * @covers \WindowsAzure\Common\Internal\ServiceBusSettings::init
     * @covers \WindowsAzure\Common\Internal\ServiceBusSettings::__construct
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
        $namespace = 'mynamespace';
        $expectedServiceBusEndpoint = "https://$namespace.servicebus.windows.net";
        $expectedServiceBusEntityPath = 'myqueue';
        $expectedWrapName = 'myname';
        $expectedWrapPassword = 'mypassword';
        $expectedWrapEndpointUri = "https://$namespace-sb.accesscontrol.windows.net/WRAPv0.9";
        $connectionString = "eNdPoinT=$expectedServiceBusEndpoint;sHarEdsecRetiSsuer=$expectedWrapName;shArEdsecrEtvAluE=$expectedWrapPassword;eNtItYpAtH=$expectedServiceBusEntityPath";

        // Test
        $actual = ServiceBusSettings::createFromConnectionString($connectionString);

        // Assert
        $this->assertInstanceOf('WindowsAzure\Common\Internal\IServiceFilter', $actual->getFilter());
        $this->assertEquals($expectedServiceBusEndpoint, $actual->getServiceBusEndpointUri());
        $this->assertEquals($expectedServiceBusEntityPath, $actual->getServiceBusEntityPath());
    }

    /**
     * @covers \WindowsAzure\Common\Internal\ServiceBusSettings::createFromConnectionString
     * @covers \WindowsAzure\Common\Internal\ServiceBusSettings::init
     * @covers \WindowsAzure\Common\Internal\ServiceBusSettings::__construct
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::getValidator
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::optional
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::allRequired
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::setting
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::settingWithFunc
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::matchedSpecification
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::parseAndValidateKeys
     * @covers \WindowsAzure\Common\Internal\ServiceSettings::noMatch
     */
    public function testCreateFromConnectionStringWithWrapEndpoint()
    {
        // Setup
        $namespace = 'mynamespace';
        $expectedServiceBusEndpoint = "https://$namespace.servicebus.windows.net";
        $expectedWrapName = 'myname';
        $expectedWrapPassword = 'mypassword';
        $expectedWrapEndpointUri = 'https://mysb-sb.accesscontrol.chinacloudapi.cn/';
        $connectionString = "Endpoint=$expectedServiceBusEndpoint;StsEndpoint=$expectedWrapEndpointUri;SharedSecretIssuer=$expectedWrapName;SharedSecretValue=$expectedWrapPassword";

        // Test
        $actual = ServiceBusSettings::createFromConnectionString($connectionString);

        // Assert
        $this->assertInstanceOf('WindowsAzure\Common\Internal\IServiceFilter', $actual->getFilter());
        $this->assertEquals($expectedServiceBusEndpoint, $actual->getServiceBusEndpointUri());
    }
}
