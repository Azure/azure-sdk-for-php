<?php

/**
 * Unit tests for the SDK
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
 * @package    Tests\Unit\WindowsAzure\ServiceBus
 * @author     Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright  2012 Microsoft Corporation
 * @license    http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link       http://pear.php.net/package/azure-sdk-for-php
 */

namespace Tests\Unit\WindowsAzure\ServiceBus;

use WindowsAzure\Common\Models\ServiceProperties;
use Tests\Framework\TestResources;
use Tests\Framework\WrapRestProxyTestBase;
use WindowsAzure\Common\Configuration;
use WindowsAzure\Common\ServiceException;
use WindowsAzure\Common\Internal\Utilities;
use WindowsAzure\ServiceBus\ServiceBusSettings;
use WindowsAzure\Common\Internal\Resources;

/**
 * Unit tests for ServiceBusSettings class
 *
 * @package    Tests\Unit\WindowsAzure\ServiceBus
 * @author     Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright  2012 Microsoft Corporation
 * @license    http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version    Release: @package_version@
 * @link       http://pear.php.net/package/azure-sdk-for-php
 */
class ServiceBusSettingsTest extends \PHPUnit_Framework_TestCase
{
    /*
     * @covers WindowsAzure\ServiceBus\ServiceBusSettings::ConfigureWithWrapAuthentication
     */ 
    public function testConfigureWithWrapAuthenticationTest()
    {
        //setup
        $configuration = new Configuration();
        
        // test
        $configuration = ServiceBusSettings::configureWithWrapAuthentication(
            $configuration,
            "alpha", 
            "beta", 
            "gamma"
        );

        // assert
        $this->assertEquals(
            'https://alpha.servicebus.windows.net', 
             $configuration->getProperty('serviceBus.uri')
        );
        
        $this->assertEquals(
            'https://alpha-sb.accesscontrol.windows.net/WRAPv0.9',
            $configuration->getProperty('serviceBus.wrap.uri')
        );
        
        $this->assertEquals(
            'beta',
            $configuration->getProperty('serviceBus.wrap.name')
        );
        
        $this->assertEquals(
            'gamma',
            $configuration->getProperty('serviceBus.wrap.password')
        );
        
    }
    
}

?>
