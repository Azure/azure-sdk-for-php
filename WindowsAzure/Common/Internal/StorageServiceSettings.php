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
 * @package   WindowsAzure\Common\Internal
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
 
namespace WindowsAzure\Common\Internal;
use WindowsAzure\Common\Internal\ConnectionStringParser;
use WindowsAzure\Common\Internal\Resources;

/**
 * Represents the settings used to sign and access a request against the storage 
 * service.
 *
 * @category  Microsoft
 * @package   WindowsAzure\Common\Internal
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
class StorageServiceSettings
{
    /**
     * The storage service name.
     * 
     * @var string
     */
    private $_name;
    
    /**
     * A base64 representation.
     * 
     * @var string
     */
    private $_key;
    
    /**
     * The endpoint for the blob service.
     * 
     * @var string
     */
    private $_blobEndpointUri;
    
    /**
     * The endpoint for the queue service.
     * 
     * @var string
     */
    private $_queueEndpointUri;
    
    /**
     * The endpoint for the table service.
     * 
     * @var string
     */
    private $_tableEndpointUri;
    
    /**
     * Devstore flag validation
     * 
     * @var array
     */
    private static $_useDevelopmentStorageSetting;
    
    /**
     * Devstore proxy uri validation.
     * 
     * @var array
     */
    private static $_developmentStorageProxyUriSetting;
    
    /**
     * @var StorageServiceSettings
     */
    private static $_devStoreAccount;
    
    public static function init()
    {
        $isValidUri = function ($uri) { return filter_var($uri, FILTER_VALIDATE_URL); };
        
        self::$_useDevelopmentStorageSetting = self::_setting(
            Resources::USE_DEVELOPMENT_STORAGE_NAME,
            'true'
        );
        
        self::$_developmentStorageProxyUriSetting = self::_settingWithFunc(
            Resources::DEVELOPMENT_STORAGE_PROXY_URI_NAME,
            $isValidUri
        );
    }
    
    public function __construct(
        $name,
        $key,
        $blobEndpointUri,
        $queueEndpointUri,
        $tableEndpointUri
    ) {
        $this->_name             = $name;
        $this->_key              = $key;
        $this->_blobEndpointUri  = $blobEndpointUri;
        $this->_queueEndpointUri = $queueEndpointUri;
        $this->_tableEndpointUri = $tableEndpointUri;
    }
    
    private static function _getValidator($requirements, $isRequired)
    {
        return function ($userSettings) use ($requirements, $isRequired) {
            $result = $userSettings;
            foreach ($requirements as $requirement) {
                $settingName = $requirement[Resources::SETTING_NAME];
                
                // Check if the setting name exists in the provided user settings.
                if (array_key_exists($settingName, $result)) {
                    // Check if the provided user setting value is valid.
                    $validationFunc = $requirement[Resources::SETTING_CONSTRAINT];
                    $isValid        = $validationFunc($result[$settingName]);
                    
                    if ($isValid) {
                        // Remove the setting as indicator for successful validation.
                        unset($result[$settingName]);
                        continue;
                    }
                }
                
                if ($isRequired) {
                    // If this line is reached, means a required validation failed.
                    return null;
                }
            }
            
            return $result;
        };
    }
    
    private static function _optional()
    {
        $optionalSettings  = func_get_args();
        return self::_getValidator($optionalSettings, false);
//        
//        return function ($settings) {
//            $result = $settings;
//            foreach ($optionalSettings as $requirement) {
//                $settingName = $requirement[Resources::SETTING_NAME];
//                
//                // Check if the setting name exists in the provided user settings.
//                if (array_key_exists($settingName, $result)) {
//                    // Check if the provided user setting value is valid.
//                    $validationFunc = $requirement[Resources::SETTING_CONSTRAINT];
//                    $isValid        = $validationFunc($result[$settingName]);
//                    
//                    if ($isValid) {
//                        // Remove the setting as indicator for successful validation.
//                        unset($result[$settingName]);
//                    }
//                }
//            }
//            
//            return $result;
//        };
    }
    
    private static function _allRequired()
    {
        $requiredSettings  = func_get_args();
        return self::_getValidator($requiredSettings, true);
        
//        return function ($settings) {
//            $result = $settings;
//            foreach ($requiredSettings as $requirement) {
//                $settingName = $requirement[Resources::SETTING_NAME];
//                
//                // Check if the setting name exists in the provided user settings.
//                if (array_key_exists($settingName, $result)) {
//                    // Check if the provided user setting value is valid.
//                    $validationFunc = $requirement[Resources::SETTING_CONSTRAINT];
//                    $isValid        = $validationFunc($result[$settingName]);
//                    
//                    if ($isValid) {
//                        // Remove the setting as indicator for successful validation.
//                        unset($result[$settingName]);
//                        continue;
//                    }
//                }
//                
//                // If this line is reached, means validation failure.
//                return null;
//            }
//            
//            return $result;
//        };
    }
    
    private static function _settingWithFunc($name, $validator)
    {
        $requirement                                = array();
        $requirement[Resources::SETTING_NAME]       = $name;
        $requirement[Resources::SETTING_CONSTRAINT] = $validator;
        
        return $requirement;
    }
    
    private static function _setting($name)
    {
        $args                                       = func_get_args();
        $count                                      = func_num_args();
        $requirement                                = array();
        $requirement[Resources::SETTING_NAME]       = $name;
        $requirement[Resources::SETTING_CONSTRAINT] = function ($settingValue)
        use ($count, $args){
            if ($count == 1) {
                // No restrictions, succeed
                return true;
            }
            
            // Check to find if the $settingValue is valid or not
            for ($index = 1; $index < $count; $index++) {
                if ($settingValue == $args[$index]) {
                    // $settingValue is found in valid values set, succeed
                    return true;
                }
            }
            
            // $settingValue is missing in valid values set, fail
            return false;
        };
        
        return $requirement;
    }
    
    private static function _matchedSpecification($settings)
    {
        $constraints = func_get_args();
        
        // Remove first element which corresponds to $settings
        unset($constraints[0]);
        
        foreach ($constraints as $constraint) {
            $remainingSettings = $constraint($settings);
            
            if (is_null($remainingSettings)) {
                return false;
            } else {
                $settings = $remainingSettings;
            }
        }
        
        if (empty($settings)) {
            return true;
        }
        
        return false;
    }
    
    private static function _getDevelopmentStorageAccount($proxyUri)
    {
        if (is_null($proxyUri)) {
            return self::developmentStorageAccount();
        }
        
        $scheme = parse_url($proxyUri, PHP_URL_SCHEME);
        $host   = parse_url($proxyUri, PHP_URL_HOST);
        $prefix = $scheme . "://" . $host;
        
        return new StorageServiceSettings(
            Resources::DEV_STORE_NAME,
            Resources::DEV_STORE_KEY,
            $prefix . ':10000/devstoreaccount1',
            $prefix . ':10001/devstoreaccount1',
            $prefix . ':10002/devstoreaccount1'
        );
    }
    
    public static function developmentStorageAccount()
    {
        if (is_null(self::$_devStoreAccount)) {
            self::$_devStoreAccount = self::_getDevelopmentStorageAccount(
                Resources::DEV_STORE_URI
            );
        }
        
        return self::$_devStoreAccount;
    }

    public static function createFromConnectionString($connectionString)
    {
        $storageServiceSettings = null;
        $tokenizedSettings      = ConnectionStringParser::parseConnectionString(
            Resources::STORAGE_SERVIE_CONNECTION_STRING,
            $connectionString
        );
        
        // Devstore case
        $matchedSpecs = self::_matchedSpecification(
            $tokenizedSettings,
            self::_allRequired(self::$_useDevelopmentStorageSetting),
            self::_optional(self::$_developmentStorageProxyUriSetting)
        );
        
        if ($matchedSpecs) {
            $settingName = Resources::DEVELOPMENT_STORAGE_PROXY_URI_NAME;
            $proxyUri    = Utilities::tryGetValue($tokenizedSettings, $settingName);
            
            $storageServiceSettings = self::_getDevelopmentStorageAccount($proxyUri);
        }
        
        return $storageServiceSettings;
    }
    
    public function getName()
    {
        return $this->_name;
    }
    
    public function getKey()
    {
        return $this->_key;
    }
    
    public function getBlobEndpointUri()
    {
        return $this->_blobEndpointUri;
    }
    
    public function getQueueEndpointUri()
    {
        return $this->_queueEndpointUri;
    }

    public function getTableEndpointUri()
    {
        return $this->_tableEndpointUri;
    }

    public function validate()
    {
        
    }
}

// Initialization of static members of the class
StorageServiceSettings::init();

?>
