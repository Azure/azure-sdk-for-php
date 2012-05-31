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
use WindowsAzure\Common\ServiceRestProxy;
use WindowsAzure\Common\Http\IHttpClient;
use WindowsAzure\Common\Http\Url;
use WindowsAzure\Common\Internal\IServiceBuilder;
use WindowsAzure\Common\Internal\Resources;
use WindowsAzure\Common\Internal\Utilities;
use WindowsAzure\Common\Internal\Validate;
use WindowsAzure\Common\Models\GetServicePropertiesResult;
use WindowsAzure\Common\Models\ServiceProperties;
use WindowsAzure\ServiceBus\ServiceBusRestProxy;
use WindowsAzure\ServiceBus\ServiceBusService;
use WindowsAzure\ServiceBus\ServiceBusSettings;
use WindowsAzure\ServiceBus\Internal\IWrap;
use WindowsAzure\ServiceBus\Internal\WrapTokenManager;
use WindowsAzure\ServiceBus\Models\WrapAccessTokenResult;

class WrapTokenManagerTest extends ServiceBusRestProxyTestBase
{
    private $_contract;
    private $_client;
    const EXPIRES_IN_SEC = 9;

    public function init()
    {
        $this->_contract = new WrapTokenManagerTest_MockWrapRestProxy(self::EXPIRES_IN_SEC);
        $builder = new WrapTokenManagerTest_CustomBuilder($this->_contract);
        $this->_client = new WrapTokenManager('testurl', 'testname', 'testpassword', $builder);
    }

    public function testClientUsesContractToGetToken()
    {
        // Arrange
        $this->init();

        // Act
        $accessToken = $this->_client->getAccessToken('https://test/scope');

        // Assert
        $this->assertNotNull($accessToken, '$accessToken');
        $this->assertEquals('testaccesstoken1-1', $accessToken, '$accessToken');
    }

    public function testClientWillNotCallMultipleTimesWhileAccessTokenIsValid()
    {
        // Arrange
        $this->init();
        $expectedTokens = array('testaccesstoken1-1', 'testaccesstoken1-1', 'testaccesstoken1-1');

        // Act
        $accessTokens = array();
        $accessTokens[] = $this->_client->getAccessToken(('https://test/scope?arg=1'));
        $accessTokens[] = $this->_client->getAccessToken(('https://test/scope?arg=2'));
        // Wait until slightly before the token expires.
        sleep(self::EXPIRES_IN_SEC/2 - 1);
        $accessTokens[] = $this->_client->getAccessToken(('https://test/scope?arg=3'));

        // Assert
        for ($i = 0; $i < count($expectedTokens); $i++) {
            $this->assertEquals($expectedTokens[$i], $accessTokens[$i], '$accessTokens[' . $i . ']');
        }
    }

    public function testCallsToDifferentPathsWillResultInDifferentAccessTokens()
    {
        // Arrange
        $this->init();
        $expectedTokens = array('testaccesstoken1-1', 'testaccesstoken2-1', 'testaccesstoken1-1');

        // Act
        $accessTokens = array();
        $accessTokens[] = $this->_client->getAccessToken(('https://test/scope?arg=1'));
        $accessTokens[] = $this->_client->getAccessToken(('https://test/scope2?arg=2'));
        // Wait until slightly before the token expires.
        sleep(self::EXPIRES_IN_SEC/2 - 1);
        $accessTokens[] = $this->_client->getAccessToken(('https://test/scope?arg=3'));

        // Assert
        for ($i = 0; $i < count($expectedTokens); $i++) {
            $this->assertEquals($expectedTokens[$i], $accessTokens[$i], '$accessTokens[' . $i . ']');
        }

        $this->assertEquals(1, $this->_contract->count1, "number of times called wrapAccessToken(...'http://test/scope'");
        $this->assertEquals(1, $this->_contract->count2, "number of times called wrapAccessToken(...'http://test/scope2'");
    }

    public function testClientWillBeCalledWhenTokenIsHalfwayToExpiring()
    {
        // Arrange
        $this->init();
        $expectedTokens = array('testaccesstoken1-1', 'testaccesstoken1-1', 'testaccesstoken1-2');

        // Act
        $accessTokens = array();
        $accessTokens[] = $this->_client->getAccessToken(('https://test/scope'));
        $accessTokens[] = $this->_client->getAccessToken(('https://test/scope'));
        // Wait until slightly after the token expires.
        sleep(self::EXPIRES_IN_SEC/2 + 1);
        $accessTokens[] = $this->_client->getAccessToken(('https://test/scope'));

        // Assert
        for ($i = 0; $i < count($expectedTokens); $i++) {
            $this->assertEquals($expectedTokens[$i], $accessTokens[$i], '$accessTokens[' . $i . ']');
        }

        $this->assertEquals(2, $this->_contract->count1, "number of times called wrapAccessToken(...'http://test/scope'");
    }
}

class WrapTokenManagerTest_MockWrapRestProxy implements IWrap
{
    public $count1;
    public $count2;
    private $_expiresInSec;

    public function __construct($expiresInSec)
    {
        $this->_expiresInSec = $expiresInSec;
    }

    public function wrapAccessToken($uri, $name, $password, $scope)
    {
        if (!Utilities::startsWith($scope, 'http://test/scope2')) {
            $this->count1++;
            $id = '1-' . $this->count1;
        } else {
            $this->count2++;
            $id = '2-' . $this->count2;
        }

        $wrapResponse = new WrapAccessTokenResult();
        $wrapResponse->setExpiresIn($this->_expiresInSec);
        $wrapResponse->setAccessToken('testaccesstoken' . $id);
        return $wrapResponse;
    }

    public function withFilter($filter)
    {
        return $this;
    }
}

class WrapTokenManagerTest_CustomBuilder implements IServiceBuilder
{
    private $_contract;

    public function __construct($contract)
    {
        $this->_contract = $contract;
    }

    public function build($config, $type)
    {
        return $this->_contract;
    }
}

?>
