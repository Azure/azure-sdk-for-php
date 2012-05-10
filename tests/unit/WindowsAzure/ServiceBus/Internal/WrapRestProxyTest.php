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
 * @package    Tests\Unit\WindowsAzure\Services\Queue
 * @author     Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright  2012 Microsoft Corporation
 * @license    http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link       http://pear.php.net/package/azure-sdk-for-php
 */

namespace Tests\Unit\WindowsAzure\Services\ServiceBus;

use WindowsAzure\Common\Models\ServiceProperties;
use Tests\Framework\TestResources;
use Tests\Framework\WrapRestProxyTestBase;
use WindowsAzure\Common\Configuration;
use WindowsAzure\Common\Internal\ServiceException;
use WindowsAzure\Common\Internal\Utilities;
use WindowsAzure\Services\ServiceBus\WrapRestProxy;
use WindowsAzure\Services\ServiceBus\ServiceBusSettings;
use WindowsAzure\Common\Internal\Resources;

/**
 * Unit tests for WrapRestProxy class
 *
 * @package    Tests\Unit\WindowsAzure\Services\ServiceBus
 * @author     Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright  2012 Microsoft Corporation
 * @license    http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version    Release: @package_version@
 * @link       http://pear.php.net/package/azure-sdk-for-php
 */
class WrapRestProxyTest extends WrapRestProxyTestBase
{
    /**
     * @covers WindowsAzure\Services\ServiceBus\WrapRestProxy::__construct
     * @covers WindowsAzure\Services\ServiceBus\WrapRestProxy::wrapAccessToken
     */
    public function testWrapAccessToken() 
    {
        $wrapUri = 'https://'
            .TestResources::serviceBusNamespace()
            .'-sb.accesscontrol.windows.net/WRAPv0.9';
        $wrapUserName = TestResources::wrapAuthenticationName();
        $wrapPassword = TestResources::wrapPassword();
        $scope = 'http://'
            .TestResources::serviceBusNameSpace()
            .'.servicebus.windows.net';
        
        $wrapAccessTokenResult = $this->wrapper->wrapAccessToken(
            $wrapUri, 
            $wrapUserName, 
            $wrapPassword, 
            $scope
        );
        
        $this->assertNotNull($wrapAccessTokenResult);
        $this->assertNotNull($wrapAccessTokenResult->getAccessToken());
    }
    
}

?>
