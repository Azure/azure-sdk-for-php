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

use Tests\Framework\ServiceBusRestProxyTestBase;
use WindowsAzure\Common\Configuration;
use WindowsAzure\ServiceBus\ServiceBusSettings;

class ServiceBusConfigurationTest extends ServiceBusRestProxyTestBase
{
    /**
     * @covers WindowsAzure\ServiceBus\ServiceBusSettings::configureWithWrapAuthentication
     */
    public function testConfigureSetsExpectedProperties()
    {
        // Arrange
        $config = new Configuration();

        // Act
        ServiceBusSettings::configureWithWrapAuthentication($config, 'alpha', 'beta', 'gamma');

        // Assert
        $this->assertEquals(
            'https://alpha.servicebus.windows.net',
            $config->getProperty('serviceBus.uri'),
            '$config->getProperty(\'serviceBus.uri\')');
        $this->assertEquals(
            'https://alpha-sb.accesscontrol.windows.net/WRAPv0.9',
            $config->getProperty('serviceBus.wrap.uri'),
            '$config->getProperty(\'serviceBus.wrap.uri\')');
        $this->assertEquals(
            'beta',
            $config->getProperty('serviceBus.wrap.name'),
            '$config.getProperty(\'serviceBus.wrap.name\')');
        $this->assertEquals(
            'gamma',
            $config->getProperty('serviceBus.wrap.password'),
            '$config->getProperty(\'serviceBus.wrap.password\')');
    }
}

?>
