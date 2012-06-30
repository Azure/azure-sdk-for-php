<?php

/**
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
 * PHP version 5
 *
 * @category  Microsoft
 * @package   Tests\Unit\WindowsAzure\ServiceBus\Internal
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      https://github.com/WindowsAzure/azure-sdk-for-php
 */

namespace Tests\Unit\WindowsAzure\ServiceBus\Internal;

use WindowsAzure\Common\Models\ServiceProperties;
use Tests\Framework\TestResources;
use WindowsAzure\Common\Configuration;
use WindowsAzure\Common\ServiceException;
use WindowsAzure\Common\Internal\Utilities;
use WindowsAzure\ServiceBus\WrapRestProxy;
use WindowsAzure\Common\Internal\Resources;
use WindowsAzure\Common\Internal\ServicesBuilder;

/**
 * Unit tests for WrapRestProxy class
 *
 * @category  Microsoft
 * @package   Tests\Unit\WindowsAzure\ServiceBus\Internal
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      https://github.com/WindowsAzure/azure-sdk-for-php
 */
class WrapRestProxyTest extends \PHPUnit_Framework_TestCase
{
    private $_wrapRestProxy;
    
    public function setUp()
    {
        $builder = new ServicesBuilder();
        $wrapUri = 'https://' . TestResources::serviceBusNamespace() .'-sb.accesscontrol.windows.net/WRAPv0.9';
        $wrapBuilder = new \ReflectionMethod($builder, 'createWrapService');
        $wrapBuilder->setAccessible(true);
        $this->_wrapRestProxy = $wrapBuilder->invoke($builder, $wrapUri);
    }
    
    /**
     * @covers WindowsAzure\ServiceBus\WrapRestProxy::__construct
     * @covers WindowsAzure\ServiceBus\WrapRestProxy::wrapAccessToken
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
        
        $wrapAccessTokenResult = $this->_wrapRestProxy->wrapAccessToken(
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
