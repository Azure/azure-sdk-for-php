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
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
 
namespace WindowsAzure\Common\Internal;
use WindowsAzure\Common\Internal\Resources;
use WindowsAzure\Common\Internal\Validate;
use WindowsAzure\Common\Internal\Utilities;
use WindowsAzure\Common\Internal\Http\HttpClient;
use WindowsAzure\Common\Internal\IServiceBuilder;
use WindowsAzure\Common\Configuration;
use WindowsAzure\Common\Internal\Filters\DateFilter;
use WindowsAzure\Common\Internal\Filters\HeadersFilter;
use WindowsAzure\Common\Internal\Filters\SharedKeyFilter;
use WindowsAzure\Common\Internal\Filters\WrapFilter;
use WindowsAzure\Common\Internal\InvalidArgumentTypeException;
use WindowsAzure\Queue\QueueRestProxy;
use WindowsAzure\Queue\QueueSettings;
use WindowsAzure\Blob\BlobRestProxy;
use WindowsAzure\Blob\BlobSettings;
use WindowsAzure\ServiceBus\ServiceBusRestProxy;
use WindowsAzure\ServiceBus\ServiceBusSettings;
use WindowsAzure\ServiceBus\WrapRestProxy;
use WindowsAzure\Table\TableRestProxy;
use WindowsAzure\Table\TableSettings;
use WindowsAzure\Table\Internal\AtomReaderWriter;
use WindowsAzure\Table\Internal\MimeReaderWriter;
use WindowsAzure\Common\Internal\Serialization\XmlSerializer;
use WindowsAzure\ServiceManagement\ServiceManagementSettings;
use WindowsAzure\ServiceManagement\ServiceManagementRestProxy;

/**
 * Builds azure service objects.
 *
 * @category  Microsoft
 * @package   WindowsAzure\Common\Internal
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
class ServicesBuilder implements IServiceBuilder
{
    /**
     * Adds HeadersFilter with constant headers for each service wrapper.
     * 
     * @param mix    $wrapper service wrapper
     * @param string $type    type of passed wrapper
     * 
     * @return mix
     */
    private function _addHeadersFilter($wrapper, $type)
    {
        $headers               = array();
        $latestServicesVersion = Resources::STORAGE_API_LATEST_VERSION;
        switch ($type) {
        case Resources::QUEUE_TYPE_NAME:
        case Resources::BLOB_TYPE_NAME:
            $headers[Resources::X_MS_VERSION] = $latestServicesVersion;
            break;
        
        case Resources::TABLE_TYPE_NAME:
            $currentVersion = Resources::DATA_SERVICE_VERSION_VALUE;
            $maxVersion     = Resources::MAX_DATA_SERVICE_VERSION_VALUE;
            $accept         = Resources::ACCEPT_HEADER_VALUE;
            $acceptCharset  = Resources::ACCEPT_CHARSET_VALUE;
            
            $headers[Resources::X_MS_VERSION]             = $latestServicesVersion;
            $headers[Resources::DATA_SERVICE_VERSION]     = $currentVersion;
            $headers[Resources::MAX_DATA_SERVICE_VERSION] = $maxVersion;
            $headers[Resources::MAX_DATA_SERVICE_VERSION] = $maxVersion;
            $headers[Resources::ACCEPT_HEADER]            = $accept;
            $headers[Resources::ACCEPT_CHARSET]           = $acceptCharset;
            break;
        
        case Resources::SERVICE_MANAGEMENT_TYPE_NAME:
            $headers[Resources::X_MS_VERSION] = Resources::SM_API_LATEST_VERSION;
            break;
        }
        
        $headersFilter = new HeadersFilter($headers);
        
        return $wrapper->withFilter($headersFilter);
    }
    
    /**
     * Builds a queue object.
     *
     * @param WindowsAzure\Common\Configuration $config configuration.
     * 
     * @return WindowsAzure\Queue\Internal\IQueue.
     */
    private function _buildQueue($config)
    {
        $httpClient    = new HttpClient();
        $xmlSerializer = new XmlSerializer();
        $uri           = Utilities::tryAddUrlScheme(
            $config->getProperty(QueueSettings::URI)
        );
        
        $queueWrapper = new QueueRestProxy(
            $httpClient, 
            $uri,
            Resources::EMPTY_STRING, 
            $xmlSerializer
        );

        // Adding headers filter
        $queueWrapper = self::_addHeadersFilter(
            $queueWrapper, Resources::QUEUE_TYPE_NAME
        );
        
        // Adding date filter
        $dateFilter   = new DateFilter();
        $queueWrapper = $queueWrapper->withFilter($dateFilter);

        // Adding authentication filter
        $authFilter = new SharedKeyFilter(
            $config->getProperty(QueueSettings::ACCOUNT_NAME),
            $config->getProperty(QueueSettings::ACCOUNT_KEY),
            Resources::QUEUE_TYPE_NAME
        );

        $queueWrapper = $queueWrapper->withFilter($authFilter);

        return $queueWrapper;
    }
    
    /**
     * Builds a blob object.
     *
     * @param WindowsAzure\Common\Configuration $config configuration.
     * 
     * @return WindowsAzure\Blob\Internal\IBlob.
     */
    private function _buildBlob($config)
    {
        $httpClient    = new HttpClient();
        $xmlSerializer = new XmlSerializer();
        $uri           = Utilities::tryAddUrlScheme(
            $config->getProperty(BlobSettings::URI)
        );

        $blobWrapper = new BlobRestProxy(
            $httpClient, 
            $uri,
            $config->getProperty(BlobSettings::ACCOUNT_NAME),
            $xmlSerializer
        );

        // Adding headers filter
        $blobWrapper = self::_addHeadersFilter(
            $blobWrapper, Resources::BLOB_TYPE_NAME
        );
        
        // Adding date filter
        $dateFilter  = new DateFilter();
        $blobWrapper = $blobWrapper->withFilter($dateFilter);

        // Adding authentication filter
        $authFilter = new SharedKeyFilter(
            $config->getProperty(BlobSettings::ACCOUNT_NAME),
            $config->getProperty(BlobSettings::ACCOUNT_KEY),
            Resources::BLOB_TYPE_NAME
        );

        $blobWrapper = $blobWrapper->withFilter($authFilter);

        return $blobWrapper;
    }

    /**
     * Builds a table object.
     *
     * @param WindowsAzure\Common\Configuration $config configuration.
     * 
     * @return WindowsAzure\Table\Internal\ITable.
     */
    private function _buildTable($config)
    {
        $httpClient     = new HttpClient();
        $atomSerializer = new AtomReaderWriter();
        $mimeSerializer = new MimeReaderWriter();
        $xmlSerializer  = new XmlSerializer();
        $uri            = Utilities::tryAddUrlScheme(
            $config->getProperty(TableSettings::URI)
        );

        $tableWrapper = new TableRestProxy(
            $httpClient,
            $uri,
            $atomSerializer,
            $mimeSerializer,
            $xmlSerializer
        );

        // Adding headers filter
        $tableWrapper = self::_addHeadersFilter(
            $tableWrapper, Resources::TABLE_TYPE_NAME
        );
        
        // Adding date filter
        $dateFilter   = new DateFilter();
        $tableWrapper = $tableWrapper->withFilter($dateFilter);

        // Adding authentication filter
        $authFilter = new SharedKeyFilter(
            $config->getProperty(TableSettings::ACCOUNT_NAME),
            $config->getProperty(TableSettings::ACCOUNT_KEY),
            Resources::TABLE_TYPE_NAME
        );

        $tableWrapper = $tableWrapper->withFilter($authFilter);

        return $tableWrapper;
    }

    /**
     * Builds a service bus client. 
     * 
     * @param WindowsAzure\Common\Configuration $config The configuration
     * for the service bus. 
     * 
     * @return WindowsAzure\ServiceBus\Internal\IServiceBus
     */
    private function _buildServiceBus($config)
    { 
        $httpClient        = new HttpClient();
        $xmlSerializer     = new XmlSerializer();
        $serviceBusWrapper = new ServiceBusRestProxy(
            $httpClient,
            $config->getProperty(ServiceBusSettings::URI),
            $xmlSerializer
        );
        
        $wrapFilter = new WrapFilter(
            $config->getProperty(ServiceBusSettings::WRAP_URI),
            $config->getProperty(ServiceBusSettings::WRAP_NAME),
            $config->getProperty(ServiceBusSettings::WRAP_PASSWORD)
        );
        
        return $serviceBusWrapper->withFilter($wrapFilter);
    }
    
    /**
     * Builds a service management object.
     *
     * @param WindowsAzure\Common\Configuration $config The configuration.
     * 
     * @return WindowsAzure\ServiceManagement\Internal\IServiceManagement
     */
    private function _buildServiceManagement($config)
    {
        $certificatePath = $config->getProperty(
            ServiceManagementSettings::CERTIFICATE_PATH
        );
        $httpClient      = new HttpClient($certificatePath);
        $xmlSerializer   = new XmlSerializer();
        $uri             = Utilities::tryAddUrlScheme(
            $config->getProperty(ServiceManagementSettings::URI),
            Resources::HTTPS_SCHEME
        );
        
        $serviceManagementWrapper = new ServiceManagementRestProxy(
            $httpClient,
            $config->getProperty(ServiceManagementSettings::SUBSCRIPTION_ID),
            $uri,
            $xmlSerializer
        );

        // Adding headers filter
        $serviceManagementWrapper = self::_addHeadersFilter(
            $serviceManagementWrapper, Resources::SERVICE_MANAGEMENT_TYPE_NAME
        );

        return $serviceManagementWrapper;
    }

    /**
     * Builds a WRAP client. 
     * 
     * @param WindowsAzure\Common\Configuration $config The configuration. 
     *
     * @return WindowsAzure\ServiceBus\Internal\IWrap
     */
    private function _buildWrap($config)
    {
        $httpClient  = new HttpClient();
        $wrapWrapper = new WrapRestProxy(
            $httpClient,
            $config->getProperty(ServiceBusSettings::WRAP_URI) 
        );

        return $wrapWrapper;
    }
    
    /**
     * Validates that the given config setting exists in the $config and it's value
     * is doesn't satisfy empty().
     * 
     * @param string                            $setting  The config setting name.
     * @param WindowsAzure\Common\Configuration $config   The configuration object. 
     * @param string                            $name     The setting code name.
     * @param string                            $restType The REST type name.
     * 
     * @return none
     */
    private function _validateConfigSetting($setting, $config, $name, $restType)
    {
        $missingKeyMsg   = sprintf(
            Resources::MISSING_CONFIG_SETTING_KEY_MSG,
            $name,
            $restType
        );
        $missingValueMsg = sprintf(
            Resources::MISSING_CONFIG_SETTING_VALUE_MSG,
            $name
        );
        $properties      = $config->getProperties();
        
        Validate::isTrue(array_key_exists($setting, $properties), $missingKeyMsg);
        
        $value       = $config->getProperty($setting);
        $isNullEmpty = empty($value);
        Validate::isTrue(!$isNullEmpty, $missingValueMsg);
    }
    
    /**
     * Validates that given config has required settings for creating the REST proxy.
     * 
     * @param WindowsAzure\Common\Configuration $config The configuration object.
     * @param string                            $type   The REST proxy type.
     * 
     * @return none
     * 
     * @throws InvalidArgumentTypeException 
     */
    private function _validateConfig($config, $type)
    {
        switch ($type) {
        case Resources::QUEUE_TYPE_NAME:
            $this->_validateConfigSetting(
                QueueSettings::URI,
                $config,
                'QueueSettings::URI',
                'Queue'
            );
            $this->_validateConfigSetting(
                QueueSettings::ACCOUNT_NAME,
                $config,
                'QueueSettings::ACCOUNT_NAME',
                'Queue'
            );
            $this->_validateConfigSetting(
                QueueSettings::ACCOUNT_KEY,
                $config,
                'QueueSettings::ACCOUNT_KEY',
                'Queue'
            );
            break;
            
        case Resources::BLOB_TYPE_NAME:
            $this->_validateConfigSetting(
                BlobSettings::URI,
                $config,
                'BlobSettings::URI',
                'Blob'
            );
            $this->_validateConfigSetting(
                BlobSettings::ACCOUNT_NAME,
                $config,
                'BlobSettings::ACCOUNT_NAME',
                'Blob'
            );
            $this->_validateConfigSetting(
                BlobSettings::ACCOUNT_KEY,
                $config,
                'BlobSettings::ACCOUNT_KEY',
                'Blob'
            );
            break;
            
        case Resources::TABLE_TYPE_NAME:
            $this->_validateConfigSetting(
                TableSettings::URI,
                $config,
                'TableSettings::URI',
                'Table'
            );
            $this->_validateConfigSetting(
                TableSettings::ACCOUNT_NAME,
                $config,
                'TableSettings::ACCOUNT_NAME',
                'Table'
            );
            $this->_validateConfigSetting(
                TableSettings::ACCOUNT_KEY,
                $config,
                'TableSettings::ACCOUNT_KEY',
                'Table'
            );
            break;
            
        case Resources::SERVICE_MANAGEMENT_TYPE_NAME:
            $this->_validateConfigSetting(
                ServiceManagementSettings::URI,
                $config,
                'ServiceManagementSettings::URI',
                'ServiceManagement'
            );
            $this->_validateConfigSetting(
                ServiceManagementSettings::CERTIFICATE_PATH,
                $config,
                'ServiceManagementSettings::CERTIFICATE_PATH',
                'ServiceManagement'
            );
            $this->_validateConfigSetting(
                ServiceManagementSettings::SUBSCRIPTION_ID,
                $config,
                'ServiceManagementSettings::SUBSCRIPTION_ID',
                'ServiceManagement'
            );
            break;
            
        case Resources::SERVICE_BUS_TYPE_NAME:
            $this->_validateConfigSetting(
                ServiceBusSettings::URI,
                $config,
                'ServiceBusSettings::URI',
                'ServiceBus'
            );
            $this->_validateConfigSetting(
                ServiceBusSettings::WRAP_URI,
                $config,
                'ServiceBusSettings::WRAP_URI',
                'ServiceBus'
            );
            $this->_validateConfigSetting(
                ServiceBusSettings::WRAP_NAME,
                $config,
                'ServiceBusSettings::WRAP_NAME',
                'ServiceBus'
            );
            $this->_validateConfigSetting(
                ServiceBusSettings::WRAP_PASSWORD,
                $config,
                'ServiceBusSettings::WRAP_PASSWORD',
                'ServiceBus'
            );
            break;
            
        case Resources::WRAP_TYPE_NAME:
            $this->_validateConfigSetting(
                ServiceBusSettings::WRAP_URI,
                $config,
                'ServiceBusSettings::WRAP_URI',
                'Wrap'
            );
            break;
        
        default:
            $expected  = Resources::QUEUE_TYPE_NAME;
            $expected .= '|' . Resources::BLOB_TYPE_NAME;
            $expected .= '|' . Resources::TABLE_TYPE_NAME;
            $expected .= '|' . Resources::SERVICE_MANAGEMENT_TYPE_NAME;
            $expected .= '|' . Resources::SERVICE_BUS_TYPE_NAME;
            $expected .= '|' . Resources::WRAP_TYPE_NAME;
            throw new InvalidArgumentTypeException($expected);
        }
    }
    
    /**
     * Creates an object passed $type configured with $config.
     *
     * @param WindowsAzure\Common\Configuration $config The configuration.
     * @param string                            $type   The type name.
     * 
     * @return WindowsAzure\Queue\Internal\IQueue
     *       | WindowsAzure\Blob\Internal\IBlob
     *       | WindowsAzure\Table\Internal\ITable
     *       | WindowsAzure\ServiceBus\Internal\IServiceBus 
     *       | WindowsAzure\ServiceBus\Internal\IWrap 
     */
    public function build($config, $type)
    {
        $this->_validateConfig($config, $type);
        $restProxy = null;
        
        switch ($type) {
        case Resources::QUEUE_TYPE_NAME:
            $restProxy = self::_buildQueue($config);
            break;
            
        case Resources::BLOB_TYPE_NAME:
            $restProxy = self::_buildBlob($config);
            break;
            
        case Resources::TABLE_TYPE_NAME:
            $restProxy = self::_buildTable($config);
            break;
            
        case Resources::SERVICE_MANAGEMENT_TYPE_NAME:
            $restProxy = self::_buildServiceManagement($config);
            break;

        case Resources::SERVICE_BUS_TYPE_NAME:
            $restProxy = self::_buildServiceBus($config);
            break;
            
        case Resources::WRAP_TYPE_NAME:
            $restProxy = self::_buildWrap($config);
            break;
        }
        
        return $restProxy;
    }
}

?>
