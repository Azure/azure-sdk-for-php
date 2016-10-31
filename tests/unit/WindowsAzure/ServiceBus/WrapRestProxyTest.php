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
 * @link      https://github.com/WindowsAzure/azure-sdk-for-php
 */

namespace Tests\Unit\WindowsAzure\ServiceBus\Internal;

use Tests\Framework\TestResources;
use Tests\Framework\ServiceRestProxyTestBase;

use WindowsAzure\Common\ServicesBuilder;
use WindowsAzure\Common\Internal\ServiceBusSettings;
use WindowsAzure\ServiceBus\Internal\IWrap;

/**
 * Unit tests for WrapRestProxy class.
 *
 * @category  Microsoft
 *
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 *
 * @version   Release: 0.5.0_2016-11
 *
 * @link      https://github.com/WindowsAzure/azure-sdk-for-php
 */
class WrapRestProxyTest extends ServiceRestProxyTestBase
{
    /** @var  IWrap */
    private $_wrapRestProxy;

    public function setUp()
    {
        $this->skipIfEmulated();

        $builder = new ServicesBuilder();
        $settings = ServiceBusSettings::createFromConnectionString(
            TestResources::getServiceBusConnectionString()
        );
        $wrapUri = $settings->getWrapEndpointUri();
        $wrapBuilder = new \ReflectionMethod($builder, 'createWrapService');
        $wrapBuilder->setAccessible(true);
        $this->_wrapRestProxy = $wrapBuilder->invoke($builder, $wrapUri);
    }

    /**
     * @covers \WindowsAzure\ServiceBus\Internal\WrapRestProxy::__construct
     * @covers \WindowsAzure\ServiceBus\Internal\WrapRestProxy::wrapAccessToken
     */
    public function testWrapAccessToken()
    {
        $settings = ServiceBusSettings::createFromConnectionString(
            TestResources::getServiceBusConnectionString()
        );
        $wrapUri = $settings->getWrapEndpointUri();
        $wrapUserName = $settings->getWrapName();
        $wrapPassword = $settings->getWrapPassword();
        $scope = str_replace('https', 'http', $settings->getServiceBusEndpointUri());

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
