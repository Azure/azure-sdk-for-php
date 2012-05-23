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
 * @package    Tests\Unit\WindowsAzure\ServiceBus\Internal
 * @author     Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright  2012 Microsoft Corporation
 * @license    http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link       http://pear.php.net/package/azure-sdk-for-php
 */

namespace Tests\Unit\WindowsAzure\ServiceBus\Internal;

use WindowsAzure\Common\Models\ServiceProperties;
use Tests\Framework\TestResources;
use Tests\Framework\WrapRestProxyTestBase;
use WindowsAzure\Common\Configuration;
use WindowsAzure\Common\ServiceException;
use WindowsAzure\Common\Internal\WindowsAzureUtilities;
use WindowsAzure\ServiceBus\ServiceBusSettings;
use WindowsAzure\ServiceBus\WrapRestProxy;
use WindowsAzure\ServiceBus\Internal\WrapTokenManager;
use WindowsAzure\Common\Internal\Resources;

/**
 * Unit tests for WrapRestProxy class
 *
 * @package    Tests\Unit\WindowsAzure\ServiceBus\Internal
 * @author     Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright  2012 Microsoft Corporation
 * @license    http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version    Release: @package_version@
 * @link       http://pear.php.net/package/azure-sdk-for-php
 */
class WrapTokenManagerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers WindowsAzure\ServiceBus\Internal\WrapTokenManager::__construct
     * @covers WindowsAzure\ServiceBus\Internal\WrapTokenManager::getAccessToken
     */
    public function testGetAccessTokenSuccess() 
    {
        // Setup
        $wrapUri = 'https://'
            .TestResources::serviceBusNamespace()
            .'-sb.accesscontrol.windows.net/WRAPv0.9';
        $wrapUserName = TestResources::wrapAuthenticationName();
        $wrapPassword = TestResources::wrapPassword();
        
        $scope = "https://"
            .TestResources::serviceBusNameSpace()
            .'.servicebus.windows.net';
        
        // Execute 
        $wrapTokenManager = new WrapTokenManager(
            $wrapUri,
            $wrapUserName,
            $wrapPassword
        );
        
        // Asserts
        $accessToken = $wrapTokenManager->getAccessToken($scope);
        parse_str($accessToken, $parsedAccessToken);
        $this->assertNotNull($accessToken);
        $this->assertTrue(is_array($parsedAccessToken));

    }
    
    /**
     * @covers WindowsAzure\ServiceBus\Internal\WrapTokenManager::__construct
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
        
        $accessToken = $wrapTokenManager->getAccessToken($scope);
    }
    
    /**
     * @covers WindowsAzure\ServiceBus\Internal\WrapTokenManager::__construct
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

        $accessToken = $wrapTokenManager->getAccessToken($scope);
        
    }
    
    /**
     * @covers WindowsAzure\ServiceBus\Internal\WrapTokenManager::__construct
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
        
        $accessToken = $wrapTokenManager->getAccessToken($scope);
        
    }
}

?>
