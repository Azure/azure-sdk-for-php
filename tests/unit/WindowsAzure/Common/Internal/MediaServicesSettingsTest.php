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
 * @copyright Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 *
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */

namespace Tests\unit\WindowsAzure\Common\Internal;

use WindowsAzure\Common\Internal\MediaServicesSettings;
use WindowsAzure\Common\Internal\Resources;

/**
 * Unit tests for class MediaServicesSettings.
 *
 * @category  Microsoft
 *
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 *
 * @version   Release: 0.5.0_2016-11
 *
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
class MediaServicesSettingsTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers \WindowsAzure\Common\Internal\MediaServicesSettings::__construct
     */
    public function testCreateDefaults()
    {
        // Setup
        $accountName = 'testAccount';
        $accessKey = 'testKey';
        $endpointUri = Resources::MEDIA_SERVICES_URL;
        $oauthEndpointUri = Resources::MEDIA_SERVICES_OAUTH_URL;

        // Test
        $settings = new MediaServicesSettings($accountName,  $accessKey);

        // Assert
        $this->assertEquals($accountName, $settings->getAccountName());
        $this->assertEquals($accessKey, $settings->getAccessKey());
        $this->assertEquals($endpointUri, $settings->getEndpointUri());
        $this->assertEquals($oauthEndpointUri, $settings->getOAuthEndpointUri());
    }

    /**
     * @covers \WindowsAzure\Common\Internal\MediaServicesSettings::__construct
     */
    public function testCreateCustom()
    {
        // Setup
        $accountName = 'testAccount';
        $accessKey = 'testKey';
        $endpointUri = 'http://test.com';
        $oauthEndpointUri = 'http://test.com';

        // Test
        $settings = new MediaServicesSettings($accountName, $accessKey, $endpointUri, $oauthEndpointUri);

        // Assert
        $this->assertEquals($accountName, $settings->getAccountName());
        $this->assertEquals($accessKey, $settings->getAccessKey());
        $this->assertEquals($endpointUri, $settings->getEndpointUri());
        $this->assertEquals($oauthEndpointUri, $settings->getOAuthEndpointUri());
    }

    /**
     * @covers \WindowsAzure\Common\Internal\MediaServicesSettings::getAccountName
     */
    public function testGetAccountName()
    {
        // Setup
        $data = 'test';

        // Test
        $settings = new MediaServicesSettings($data, 'test');

        // Assert
        $this->assertEquals($data, $settings->getAccountName());
    }

    /**
     * @covers \WindowsAzure\Common\Internal\MediaServicesSettings::getAccessKey
     */
    public function testGetAccessKey()
    {
        // Setup
        $data = 'test';

        // Test
        $settings = new MediaServicesSettings('test', $data);

        // Assert
        $this->assertEquals($data, $settings->getAccessKey());
    }
    /**
     * @covers \WindowsAzure\Common\Internal\MediaServicesSettings::getEndpointUri
     */
    public function testGetEndpointUri()
    {
        // Setup
        $data = 'http://test.com';

        // Test
        $settings = new MediaServicesSettings('test', 'test', $data);

        // Assert
        $this->assertEquals($data, $settings->getEndpointUri());
    }
    /**
     * @covers \WindowsAzure\Common\Internal\MediaServicesSettings::getOAuthEndpointUri
     */
    public function testGetOAuthEndpointUri()
    {
        // Setup
        $data = 'http://test.com';

        // Test
        $settings = new MediaServicesSettings('test', 'test', null, $data);

        // Assert
        $this->assertEquals($data, $settings->getOAuthEndpointUri());
    }
}
