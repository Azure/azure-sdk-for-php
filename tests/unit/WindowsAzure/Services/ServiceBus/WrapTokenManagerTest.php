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

use WindowsAzure\Services\Core\Models\ServiceProperties;
use Tests\Framework\TestResources;
use Tests\Framework\WrapRestProxyTestBase;
use WindowsAzure\Core\Configuration;
use WindowsAzure\Core\ServiceException;
use WindowsAzure\Core\WindowsAzureUtilities;
use WindowsAzure\Services\ServiceBus\ServiceBusSettings;
use WindowsAzure\Services\ServiceBus\WrapRestProxy;
use WindowsAzure\Services\ServiceBus\WrapTokenManager;
use WindowsAzure\Resources;

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
class WrapTokenManagerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers WindowsAzure\Services\ServiceBus\WrapTokenManager::__construct
     * @covers WindowsAzure\Services\ServiceBus\WrapTokenManager::getAccessToken
     */
    public function testGetAccessTokenSuccess() 
    {
        $wrapUri = 'https://'
            .TestResources::serviceBusNamespace()
            .'-sb.accesscontrol.windows.net/WRAPv0.9';
        $wrapUserName = TestResources::wrapAuthenticationName();
        $wrapPassword = TestResources::wrapPassword();
        
        $scope = "https://"
            .TestResources::serviceBusNameSpace()
            .'.servicebus.windows.net';
        
        $wrapTokenManager = new WrapTokenManager(
            $wrapUri,
            $wrapUserName,
            $wrapPassword
        );
        
        $accesToken = $wrapTokenManager->getAccessToken($scope);
        
        $this->assertNotNull($accesToken);

    }
    
    /**
     * @covers WindowsAzure\Services\ServiceBus\WrapTokenManager::__construct
     * @covers WindowsAzure\Services\ServiceBus\WrapTokenManager::getAccessToken
     */
    public function testGetAccessTokenFailedWithInvalidWrapUri()
    {
        $this->setExpectedException(get_class(
            new \InvalidArgumentException(''))
        );
        $wrapUri = 'IamNotAValidUri';
        $wrapUserName = TestResources::wrapAuthenticationName();
        $wrapPassword = TestResources::wrapPassword();
        
        $scope = "http://"
            .TestResources::serviceBusNameSpace()
            .'.servicebus.windows.net';
        
        $wrapTokenManager = new WrapTokenManager(
            $wrapUri,
            $wrapUserName,
            $wrapPassword
        );
        
        $accesToken = $wrapTokenManager->getAccessToken($scope);
    }
    
    /**
     * @covers WindowsAzure\Services\ServiceBus\WrapTokenManager::__construct
     * @covers WindowsAzure\Services\ServiceBus\WrapTokenManager::getAccessToken
     */
    public function testGetAccessTokenFailedWithInvalidUserName()
    {
        $this->setExpectedException(get_class(
            new ServiceException(''))
        );
        $wrapUri = 'https://'
            .TestResources::serviceBusNamespace()
            .'-sb.accesscontrol.windows.net/WRAPv0.9';
        $wrapUserName = 'IAmNotAGoodUserName';
        $wrapPassword = TestResources::wrapPassword();
        
        $scope = "http://"
            .TestResources::serviceBusNameSpace()
            .'.servicebus.windows.net';
        
        $wrapTokenManager = new WrapTokenManager(
            $wrapUri,
            $wrapUserName,
            $wrapPassword
        );

        $accesToken = $wrapTokenManager->getAccessToken($scope);
        
    }
    
    /**
     * @covers WindowsAzure\Services\ServiceBus\WrapTokenManager::__construct
     * @covers WindowsAzure\Services\ServiceBus\WrapTokenManager::getAccessToken
     */
    public function testGetAccesTokenFailedWithInvalidPassword()
    {
        $this->setExpectedException(get_class(
            new ServiceException(''))
        );
        $wrapUri = 'https://'
            .TestResources::serviceBusNamespace()
            .'-sb.accesscontrol.windows.net/WRAPv0.9';
        $wrapUserName = TestResources::wrapAuthenticationName();
        $wrapPassword = 'IAmNotACorrectPassword';
        
        $scope = "http://"
            .TestResources::serviceBusNameSpace()
            .'.servicebus.windows.net';
        
        $wrapTokenManager = new WrapTokenManager(
            $wrapUri,
            $wrapUserName,
            $wrapPassword
        );
        
        $accesToken = $wrapTokenManager->getAccessToken($scope);
        
    }
}

?>
