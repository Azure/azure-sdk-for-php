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
 * service. For more information about storage service connection strings check this
 * page: http://msdn.microsoft.com/en-us/library/ee758697
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
     * @var StorageServiceSettings
     */
    private static $_devStoreAccount;
    
    /**
     * Validator for the UseDevelopmentStorage setting. Must be "true".
     * 
     * @var array
     */
    private static $_useDevelopmentStorageSetting;
    
    /**
     * Validator for the DevelopmentStorageProxyUri setting. Must be a valid Uri.
     * 
     * @var array
     */
    private static $_developmentStorageProxyUriSetting;
    
    /**
     * Validator for the DefaultEndpointsProtocol setting. Must be either "http" 
     * or "https".
     * 
     * @var array
     */
    private static $_defaultEndpointsProtocolSetting;
    
    /**
     * Validator for the AccountName setting. No restrictions.
     * 
     * @var array
     */
    private static $_accountNameSetting;
    
    /**
     * Validator for the AccountKey setting. Must be a valid base64 string.
     * 
     * @var array
     */
    private static $_accountKeySetting;
    
    /**
     * Validator for the BlobEndpoint setting. Must be a valid Uri.
     * 
     * @var array
     */
    private static $_blobEndpointSetting;
    
    /**
     * Validator for the QueueEndpoint setting. Must be a valid Uri.
     * 
     * @var array
     */
    private static $_queueEndpointSetting;
    
    /**
     * Validator for the TableEndpoint setting. Must be a valid Uri.
     * 
     * @var array
     */
    private static $_tableEndpointSetting;
    
    /**
     * Initializes static members of the class.
     * 
     * @return none
     */
    public static function init()
    {
        $isValidUri = function ($uri)
        {
            return filter_var($uri, FILTER_VALIDATE_URL);
        };
        
        self::$_useDevelopmentStorageSetting = self::_setting(
            Resources::USE_DEVELOPMENT_STORAGE_NAME,
            'true'
        );
        
        self::$_developmentStorageProxyUriSetting = self::_settingWithFunc(
            Resources::DEVELOPMENT_STORAGE_PROXY_URI_NAME,
            $isValidUri
        );
        
        self::$_defaultEndpointsProtocolSetting = self::_setting(
            Resources::DEFAULT_ENDPOINTS_PROTOCOL_NAME,
            'http', 'https'
        );
        
        self::$_accountNameSetting = self::_settingWithFunc(
            Resources::ACCOUNT_NAME_NAME,
            function ($name) { 
                return true;
            }
        );
        
        self::$_accountKeySetting = self::_settingWithFunc(
            Resources::ACCOUNT_KEY_NAME,
            // base64_decode will return false if the $key is not in base64 format.
            function ($key) { 
                return base64_decode($key, true);
            }
        );
        
        self::$_blobEndpointSetting = self::_settingWithFunc(
            Resources::BLOB_ENDPOINT_NAME,
            $isValidUri
        );
        
        self::$_queueEndpointSetting = self::_settingWithFunc(
            Resources::QUEUE_ENDPOINT_NAME,
            $isValidUri
        );
        
        self::$_tableEndpointSetting = self::_settingWithFunc(
            Resources::TABLE_ENDPOINT_NAME,
            $isValidUri
        );
    }
    
    /**
     * Creates new storage service settings instance.
     * 
     * @param string $name             The storage service name.
     * @param string $key              The storage service key.
     * @param string $blobEndpointUri  The sotrage service blob endpoint.
     * @param string $queueEndpointUri The sotrage service queue endpoint.
     * @param string $tableEndpointUri The sotrage service table endpoint.
     */
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
    
    /**
     * Creates an anonymous function that acts as predicate.
     * 
     * @param array   $requirements The array of conditions to satisfy.
     * @param boolean $isRequired   Either these conditions are allrequired or all 
     * optional.
     * 
     * @return callable
     */
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
    
    /**
     * Creates an optional predicate for passed list of requirements.
     * 
     * @return callable
     */
    private static function _optional()
    {
        $optionalSettings  = func_get_args();
        return self::_getValidator($optionalSettings, false);
    }
    
    /**
     * Creates an required predicate for passed list of requirements.
     * 
     * @return callable
     */
    private static function _allRequired()
    {
        $requiredSettings  = func_get_args();
        return self::_getValidator($requiredSettings, true);
    }
    
    /**
     * Creates a setting value condition using the passed predicate.
     * 
     * @param string   $name      The setting key name.
     * @param callable $validator The setting value predicate.
     * 
     * @return array 
     */
    private static function _settingWithFunc($name, $validator)
    {
        $requirement                                = array();
        $requirement[Resources::SETTING_NAME]       = $name;
        $requirement[Resources::SETTING_CONSTRAINT] = $validator;
        
        return $requirement;
    }
    
    /**
     * Creates a setting value condition that validates it is one of the
     * passed valid values.
     * 
     * @param string $name The setting key name.
     * 
     * @return array 
     */
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
    
    /**
     * Tests to see if a given list of settings matches a set of filters exactly.
     * 
     * @param array $settings The settings to check.
     * 
     * @return boolean If any filter returns null, false. If there are any settings 
     * left over after all filters are processed, false. Otherwise true.
     */
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
    
    /**
     * Returns a StorageServiceSettings with development storage credentials using 
     * the specified proxy Uri.
     * 
     * @param string $proxyUri The proxy endpoint to use.
     * 
     * @return StorageServiceSettings
     */
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
    
    /**
     * Gets a StorageServiceSettings object that references the development storage 
     * account.
     * 
     * @return StorageServiceSettings 
     */
    public static function developmentStorageAccount()
    {
        if (is_null(self::$_devStoreAccount)) {
            self::$_devStoreAccount = self::_getDevelopmentStorageAccount(
                Resources::DEV_STORE_URI
            );
        }
        
        return self::$_devStoreAccount;
    }
    
    /**
     * Gets the default service endpoint using the specified protocol and account 
     * name.
     * 
     * @param array  $settings The service settings.
     * @param string $dns      The service DNS.
     * 
     * @return string
     */
    private static function _getDefaultServiceEndpoint($settings, $dns)
    {
        $scheme      = $settings[Resources::DEFAULT_ENDPOINTS_PROTOCOL_NAME];
        $accountName = $settings[Resources::ACCOUNT_NAME_NAME];
        
        return sprintf(Resources::SERVICE_URI_FORMAT, $scheme, $accountName, $dns);
    }

    /**
     * Creates a StorageServiceSettings object from the given connection string.
     * 
     * @param string $connectionString The storage settings connection string.
     * 
     * @return StorageServiceSettings 
     */
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
        
        // automatic case
        $matchedSpecs = self::_matchedSpecification(
            $tokenizedSettings,
            self::_allRequired(
                self::$_defaultEndpointsProtocolSetting,
                self::$_accountNameSetting,
                self::$_accountKeySetting
            ),
            self::_optional(
                self::$_blobEndpointSetting,
                self::$_queueEndpointSetting,
                self::$_tableEndpointSetting
            )
        );
        if ($matchedSpecs) {
            $blobEndpoint = Utilities::tryGetValue(
                $tokenizedSettings,
                Resources::BLOB_ENDPOINT_NAME,
                self::_getDefaultServiceEndpoint(
                    $tokenizedSettings,
                    Resources::BLOB_BASE_DNS_NAME
                )
            );
            $queueEndpoint = Utilities::tryGetValue(
                $tokenizedSettings,
                Resources::QUEUE_ENDPOINT_NAME,
                self::_getDefaultServiceEndpoint(
                    $tokenizedSettings,
                    Resources::QUEUE_BASE_DNS_NAME
                )
            );
            $tableEndpoint = Utilities::tryGetValue(
                $tokenizedSettings,
                Resources::TABLE_ENDPOINT_NAME,
                self::_getDefaultServiceEndpoint(
                    $tokenizedSettings,
                    Resources::TABLE_BASE_DNS_NAME
                )
            );
            
            $storageServiceSettings = new StorageServiceSettings(
                $tokenizedSettings[Resources::ACCOUNT_NAME_NAME],
                $tokenizedSettings[Resources::ACCOUNT_KEY_NAME],
                $blobEndpoint,
                $queueEndpoint,
                $tableEndpoint
            );
        }
        
        return $storageServiceSettings;
    }
    
    /**
     * Gets storage service name.
     * 
     * @return string
     */
    public function getName()
    {
        return $this->_name;
    }
    
    /**
     * Gets storage service key.
     * 
     * @return string
     */
    public function getKey()
    {
        return $this->_key;
    }
    
    /**
     * Gets storage service blob endpoint uri.
     * 
     * @return string
     */
    public function getBlobEndpointUri()
    {
        return $this->_blobEndpointUri;
    }
    
    /**
     * Gets storage service queue endpoint uri.
     * 
     * @return string
     */
    public function getQueueEndpointUri()
    {
        return $this->_queueEndpointUri;
    }

    /**
     * Gets storage service table endpoint uri.
     * 
     * @return string
     */
    public function getTableEndpointUri()
    {
        return $this->_tableEndpointUri;
    }
}

// Initialization of static members of the class
StorageServiceSettings::init();

?>
