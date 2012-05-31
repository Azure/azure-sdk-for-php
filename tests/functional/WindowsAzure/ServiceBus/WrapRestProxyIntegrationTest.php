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
 * @package    Tests\Functional\WindowsAzure\ServiceBus
 * @author     Jason Cooke <jcooke@microsoft.com>
 * @copyright  2012 Microsoft Corporation
 * @license    http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link       http://pear.php.net/package/azure-sdk-for-php
 */

namespace Tests\Functional\WindowsAzure\ServiceBus;

require_once 'Net/URL2.php';

use Tests\Framework\ServiceBusRestProxyTestBase;
use Tests\Framework\TestResources;
use WindowsAzure\Common\Configuration;
use WindowsAzure\Common\Internal\Resources;
use WindowsAzure\ServiceBus\ServiceBusSettings;

class WrapRestProxyIntegrationTest extends ServiceBusRestProxyTestBase
{
    public function testServiceCanBeCalledToCreateAccessToken()
    {
        // Arrange
        $config = new Configuration();
        ServiceBusSettings::configureWithWrapAuthentication(
            $config,
            TestResources::serviceBusNameSpace(),
            TestResources::wrapAuthenticationName(),
            TestResources::wrapPassword()
        );

        $contract = $config->create(Resources::WRAP_TYPE_NAME);

        // Act
        $serviceBusUriString = $config->getProperty(ServiceBusSettings::URI);
        $serviceBusUri =  new \Net_URL2($serviceBusUriString);
        $uri = $config->getProperty(ServiceBusSettings::WRAP_URI);
        $name = $config->getProperty(ServiceBusSettings::WRAP_NAME);
        $password = $config->getProperty(ServiceBusSettings::WRAP_PASSWORD);

        $scope = 'http://' . $serviceBusUri->getAuthority() . "/" . $serviceBusUri->getPath();
        $result = $contract->wrapAccessToken($uri, $name, $password, $scope);

        // Assert
        $this->assertNotNull($result, '$result');
        $this->assertNotNull($result->getAccessToken(), '$result->getAccessToken()');
    }
}

?>
