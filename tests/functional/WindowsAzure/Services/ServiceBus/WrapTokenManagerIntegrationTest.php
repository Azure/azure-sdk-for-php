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
 * @package    Tests\Functional\WindowsAzure\Services\ServiceBus
 * @author     Jason Cooke <jcooke@microsoft.com>
 * @copyright  2012 Microsoft Corporation
 * @license    http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link       http://pear.php.net/package/azure-sdk-for-php
 */

namespace Tests\Functional\WindowsAzure\Services\ServiceBus;

use Tests\Framework\ServiceBusRestProxyTestBase;
use Tests\Framework\TestResources;
use WindowsAzure\Resources;
use WindowsAzure\Core\Configuration;
use WindowsAzure\Services\ServiceBus\ServiceBusSettings;
use WindowsAzure\Services\ServiceBus\WrapTokenManager;

class WrapTokenManagerIntegrationTest extends ServiceBusRestProxyTestBase {
    public function testWrapClientWillAcquireAccessToken() {
        // Arrange
        $config = new Configuration();
        ServiceBusSettings::configureWithWrapAuthentication(
            $config,
            TestResources::serviceBusNameSpace(),
            TestResources::wrapAuthenticationName(),
            TestResources::wrapPassword()
        );

// TODO: Can we use $config->create instead of new?
//        $client = $config->create(Resources::WRAP_TYPE_NAME);
        $client = new WrapTokenManager(
            $config->getProperty(ServiceBusSettings::WRAP_URI),
            $config->getProperty(ServiceBusSettings::WRAP_NAME),
            $config->getProperty(ServiceBusSettings::WRAP_PASSWORD));

        // Act
        $serviceBusUri = $config->getProperty(ServiceBusSettings::URI);
        $accessToken = $client->getAccessToken($serviceBusUri);

        // Assert
        $this->assertNotNull($accessToken);
    }
}

?>
