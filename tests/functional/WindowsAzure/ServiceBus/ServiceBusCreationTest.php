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
use WindowsAzure\Common\Internal\Resources;
use WindowsAzure\ServiceBus\ServiceBusRestProxy;
use WindowsAzure\ServiceBus\ServiceBusService;
use WindowsAzure\ServiceBus\ServiceBusSettings;

class ServiceBusCreationTest extends ServiceBusRestProxyTestBase
{
    /**
     * @covers WindowsAzure\ServiceBus\ServiceBusService::create
     */
    public function testTheServiceClassMayBeCreatedDirectlyWithConfig()
    {
        $config = $this->newConfiguration();
        $service = ServiceBusService::create($config);

        $this->assertNotNull($service, '$service');
        $this->assertTrue($service instanceof ServiceBusRestProxy, '$service->getClass()');
    }

    /**
     * @covers WindowsAzure\Common\Configuration::create
     */
    public function testTheServiceClassMayAlsoBeCreatedFromConfig()
    {
        $config = $this->newConfiguration();
        $service = $config->create(Resources::SERVICE_BUS_TYPE_NAME);

        $this->assertNotNull($service, '$service');
        $this->assertTrue($service instanceof ServiceBusRestProxy, '$service->getClass()');
    }

    public function newConfiguration()
    {
        $config = new Configuration();
        $config = ServiceBusSettings::configureWithWrapAuthentication(
            $config,
            'my-namespace',
            'my-identity',
            'my-shared-secret'
        );
        return $config;
    }
}
?>
