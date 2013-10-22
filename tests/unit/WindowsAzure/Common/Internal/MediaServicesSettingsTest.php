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
 * @package   Tests\Unit\WindowsAzure\Common\Internal
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */

namespace Tests\Unit\WindowsAzure\Common\Internal;
use WindowsAzure\Common\Internal\MediaServicesSettings;
use WindowsAzure\Common\Internal\Resources;

/**
 * Unit tests for class ServiceManagementSettings
 *
 * @category  Microsoft
 * @package   Tests\Unit\WindowsAzure\Common\Internal
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: 0.3.1_2011-08
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
class MediaServicesSettingsTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers WindowsAzure\Common\Internal\MediaServicesSettings::createFromConnectionString
     * @covers WindowsAzure\Common\Internal\MediaServicesSettings::init
     * @covers WindowsAzure\Common\Internal\MediaServicesSettings::__construct
     * @covers WindowsAzure\Common\Internal\ServiceSettings::getValidator
     * @covers WindowsAzure\Common\Internal\ServiceSettings::optional
     * @covers WindowsAzure\Common\Internal\ServiceSettings::allRequired
     * @covers WindowsAzure\Common\Internal\ServiceSettings::setting
     * @covers WindowsAzure\Common\Internal\ServiceSettings::settingWithFunc
     * @covers WindowsAzure\Common\Internal\ServiceSettings::matchedSpecification
     * @covers WindowsAzure\Common\Internal\ServiceSettings::parseAndValidateKeys
     * @covers WindowsAzure\Common\Internal\ServiceSettings::noMatch
     */
    public function testCreateFromConnectionStringWithAutomaticCase()
    {
        // Setup
    	$accountName = 'testAccount';
    	$accessKey = 'testKey';
    	$endpointUri = Resources::MEDIA_SERVICES_URL;
    	$oauthEndpointUri = Resources::MEDIA_SERVICES_OAUTH_URL;
        $connectionString = "AccountName={$accountName};AccessKey={$accessKey}";
        
        // Test
        $actual = MediaServicesSettings::createFromConnectionString($connectionString);
        
        // Assert
        $this->assertEquals($accountName, $actual->getAccountName());
        $this->assertEquals($accessKey, $actual->getAccessKey());
        $this->assertEquals($endpointUri, $actual->getEndpointUri());
        $this->assertEquals($oauthEndpointUri, $actual->getOAuthEndpointUri());
    }
    
    /**
     * @covers WindowsAzure\Common\Internal\MediaServicesSettings::createFromConnectionString
     * @covers WindowsAzure\Common\Internal\MediaServicesSettings::init
     * @covers WindowsAzure\Common\Internal\MediaServicesSettings::__construct
     * @covers WindowsAzure\Common\Internal\ServiceSettings::getValidator
     * @covers WindowsAzure\Common\Internal\ServiceSettings::optional
     * @covers WindowsAzure\Common\Internal\ServiceSettings::allRequired
     * @covers WindowsAzure\Common\Internal\ServiceSettings::setting
     * @covers WindowsAzure\Common\Internal\ServiceSettings::settingWithFunc
     * @covers WindowsAzure\Common\Internal\ServiceSettings::matchedSpecification
     * @covers WindowsAzure\Common\Internal\ServiceSettings::parseAndValidateKeys
     * @covers WindowsAzure\Common\Internal\ServiceSettings::noMatch
     */
    public function testCreateFromConnectionStringWithExplicitCase()
    {
    	// Setup
    	$accountName = 'testAccount';
    	$accessKey = 'testKey';
    	$endpointUri = 'https://custom.endpoint';
    	$endpointUriSetting = Resources::MEDIA_SERVICES_ENDPOINT_URI_NAME;
    	$oauthEndpointUri = 'https://custom.oauth.endpoint';
    	$oauthEndpointUriSetting = Resources::MEDIA_SERVICES_OAUTH_ENDPOINT_URI_NAME;
    	$connectionString = "AccountName={$accountName};AccessKey={$accessKey};{$endpointUriSetting}={$endpointUri};{$oauthEndpointUriSetting}={$oauthEndpointUri}";
    
    	// Test
    	$actual = MediaServicesSettings::createFromConnectionString($connectionString);
    
    	// Assert
    	$this->assertEquals($accountName, $actual->getAccountName());
    	$this->assertEquals($accessKey, $actual->getAccessKey());
    	$this->assertEquals($endpointUri, $actual->getEndpointUri());
    	$this->assertEquals($oauthEndpointUri, $actual->getOAuthEndpointUri());
    }
    
    /**
     * @covers WindowsAzure\Common\Internal\MediaServicesSettings::createFromConnectionString
     * @covers WindowsAzure\Common\Internal\MediaServicesSettings::init
     * @covers WindowsAzure\Common\Internal\MediaServicesSettings::__construct
     * @covers WindowsAzure\Common\Internal\ServiceSettings::getValidator
     * @covers WindowsAzure\Common\Internal\ServiceSettings::optional
     * @covers WindowsAzure\Common\Internal\ServiceSettings::allRequired
     * @covers WindowsAzure\Common\Internal\ServiceSettings::setting
     * @covers WindowsAzure\Common\Internal\ServiceSettings::settingWithFunc
     * @covers WindowsAzure\Common\Internal\ServiceSettings::matchedSpecification
     * @covers WindowsAzure\Common\Internal\ServiceSettings::parseAndValidateKeys
     * @covers WindowsAzure\Common\Internal\ServiceSettings::noMatch
     */
    public function testCreateFromConnectionStringWithMissingKeyFail()
    {
        // Setup
        $connectionString = "AccountName=test";
        $expectedMsg = sprintf(Resources::MISSING_CONNECTION_STRING_SETTINGS, $connectionString);
        $this->setExpectedException('\RuntimeException', $expectedMsg);
        
        // Test
        MediaServicesSettings::createFromConnectionString($connectionString);
    }
    
    /**
     * @covers WindowsAzure\Common\Internal\MediaServicesSettings::createFromConnectionString
     * @covers WindowsAzure\Common\Internal\MediaServicesSettings::init
     * @covers WindowsAzure\Common\Internal\MediaServicesSettings::__construct
     * @covers WindowsAzure\Common\Internal\ServiceSettings::getValidator
     * @covers WindowsAzure\Common\Internal\ServiceSettings::optional
     * @covers WindowsAzure\Common\Internal\ServiceSettings::allRequired
     * @covers WindowsAzure\Common\Internal\ServiceSettings::setting
     * @covers WindowsAzure\Common\Internal\ServiceSettings::settingWithFunc
     * @covers WindowsAzure\Common\Internal\ServiceSettings::matchedSpecification
     * @covers WindowsAzure\Common\Internal\ServiceSettings::parseAndValidateKeys
     * @covers WindowsAzure\Common\Internal\ServiceSettings::noMatch
     */
    public function testCreateFromConnectionStringWithInvalidServiceManagementKeyFail()
    {
        // Setup
        $invalidKey = 'InvalidKey';
        $endpointUriSetting = Resources::MEDIA_SERVICES_ENDPOINT_URI_NAME;
        $accountNameSetting = Resources::MEDIA_SERVICES_ACCOUNT_NAME;
        $accessKeySetting = Resources::MEDIA_SERVICES_ACCESS_KEY;
        $oauthEndpointSetting = Resources::MEDIA_SERVICES_OAUTH_ENDPOINT_URI_NAME;
        
        $connectionString = "$invalidKey=value;{$endpointUriSetting}=12345;{$accountNameSetting}=test;{$accessKeySetting}=testkey;"
        	. "{$endpointUriSetting}=https://custom.endpoint;{$oauthEndpointSetting}=https://custom.oauth.endpoint";
        $expectedMsg = sprintf(
            Resources::INVALID_CONNECTION_STRING_SETTING_KEY,
            $invalidKey,
            implode("\n", array(
            	Resources::MEDIA_SERVICES_ENDPOINT_URI_NAME,
            	Resources::MEDIA_SERVICES_OAUTH_ENDPOINT_URI_NAME,
            	Resources::MEDIA_SERVICES_ACCOUNT_NAME,
            	Resources::MEDIA_SERVICES_ACCESS_KEY
        	))
        );
        $this->setExpectedException('\RuntimeException', $expectedMsg);
        
        // Test
        MediaServicesSettings::createFromConnectionString($connectionString);
    }
    
    /**
     * @covers WindowsAzure\Common\Internal\MediaServicesSettings::createFromConnectionString
     * @covers WindowsAzure\Common\Internal\MediaServicesSettings::init
     * @covers WindowsAzure\Common\Internal\MediaServicesSettings::__construct
     * @covers WindowsAzure\Common\Internal\ServiceSettings::getValidator
     * @covers WindowsAzure\Common\Internal\ServiceSettings::optional
     * @covers WindowsAzure\Common\Internal\ServiceSettings::allRequired
     * @covers WindowsAzure\Common\Internal\ServiceSettings::setting
     * @covers WindowsAzure\Common\Internal\ServiceSettings::settingWithFunc
     * @covers WindowsAzure\Common\Internal\ServiceSettings::matchedSpecification
     * @covers WindowsAzure\Common\Internal\ServiceSettings::parseAndValidateKeys
     * @covers WindowsAzure\Common\Internal\ServiceSettings::noMatch
     */
    public function testCreateFromConnectionStringWithCaseInsensitive()
    {
    	// Setup
    	$accountName = 'testAccount';
    	$accessKey = 'testKey';
    	$endpointUri = 'https://custom.endpoint';
    	$oauthEndpointUri = 'https://custom.oauth.endpoint';
    	$endpointUriSetting = Resources::MEDIA_SERVICES_ENDPOINT_URI_NAME;
    	$accountNameSetting = Resources::MEDIA_SERVICES_ACCOUNT_NAME;
    	$accessKeySetting = Resources::MEDIA_SERVICES_ACCESS_KEY;
    	$oauthEndpointUriSetting = Resources::MEDIA_SERVICES_OAUTH_ENDPOINT_URI_NAME;
    	$connectionString = "{$accountNameSetting}={$accountName};{$accessKeySetting}={$accessKey};{$endpointUriSetting}={$endpointUri};{$oauthEndpointUriSetting}={$oauthEndpointUri}";
    	 
    	// Test
    	$actual = MediaServicesSettings::createFromConnectionString($connectionString);
    	
    	// Assert
    	$this->assertEquals($accountName, $actual->getAccountName());
    	$this->assertEquals($accessKey, $actual->getAccessKey());
    	$this->assertEquals($endpointUri, $actual->getEndpointUri());
    	$this->assertEquals($oauthEndpointUri, $actual->getOAuthEndpointUri());
    }
    
    /**
     * @covers WindowsAzure\Common\Internal\MediaServicesSettings::getAccountName
     */
    public function testGetAccountName() 
    {
    	// Setup 
    	$data = 'test';
    	
    	// Test
    	$settings = new MediaServicesSettings($data, null, null, null, null);
    	
    	// Assert
    	$this->assertEquals($data, $settings->getAccountName());
    }

    /**
     * @covers WindowsAzure\Common\Internal\MediaServicesSettings::getAccessKey
     */
    public function testGetAccessKey() 
    {
    	// Setup 
    	$data = 'test';
    	
    	// Test
    	$settings = new MediaServicesSettings(null, $data, null, null, null);
    	
    	// Assert
    	$this->assertEquals($data, $settings->getAccessKey());
    }
    /**
     * @covers WindowsAzure\Common\Internal\MediaServicesSettings::getEndpointUri
     */
    public function testGetEndpointUri() 
    {
    	// Setup 
    	$data = 'test';
    	
    	// Test
    	$settings = new MediaServicesSettings(null, null, $data, null);
    	
    	// Assert
    	$this->assertEquals($data, $settings->getEndpointUri());
    }
    /**
     * @covers WindowsAzure\Common\Internal\MediaServicesSettings::getOAuthEndpointUri
     */
    public function testGetOAuthEndpointUri() 
    {
    	// Setup 
    	$data = 'test';
    	
    	// Test
    	$settings = new MediaServicesSettings(null, null, null, $data);
    	
    	// Assert
    	$this->assertEquals($data, $settings->getOAuthEndpointUri());
    }
}


