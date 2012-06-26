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
use WindowsAzure\Common\Internal\Resources;
use WindowsAzure\Common\Internal\Validate;
use WindowsAzure\Common\Internal\Utilities;
use WindowsAzure\Common\Internal\Http\HttpClient;
use WindowsAzure\Common\Internal\IServicesBuilder;
use WindowsAzure\Common\Configuration;
use WindowsAzure\Common\Internal\Filters\DateFilter;
use WindowsAzure\Common\Internal\Filters\HeadersFilter;
use WindowsAzure\Common\Internal\Filters\AuthenticationFilter;
use WindowsAzure\Common\Internal\Filters\WrapFilter;
use WindowsAzure\Common\Internal\InvalidArgumentTypeException;
use WindowsAzure\Queue\QueueRestProxy;
use WindowsAzure\Blob\BlobRestProxy;
use WindowsAzure\ServiceBus\ServiceBusRestProxy;
use WindowsAzure\ServiceBus\ServiceBusSettings;
use WindowsAzure\ServiceBus\WrapRestProxy;
use WindowsAzure\Table\TableRestProxy;
use WindowsAzure\Table\Internal\AtomReaderWriter;
use WindowsAzure\Table\Internal\MimeReaderWriter;
use WindowsAzure\Common\Internal\Serialization\XmlSerializer;
use WindowsAzure\ServiceManagement\ServiceManagementRestProxy;
use WindowsAzure\Common\Internal\Authentication\SharedKeyAuthScheme;
use WindowsAzure\Common\Internal\Authentication\TableSharedKeyLiteAuthScheme;
use WindowsAzure\Common\Internal\StorageServiceSettings;

/**
 * Builds azure service objects.
 *
 * @category  Microsoft
 * @package   WindowsAzure\Common\Internal
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
class ServicesBuilder implements IServicesBuilder
{
    /**
     * Gets the HTTP client used in the REST services construction.
     * 
     * @return WindowsAzure\Common\Internal\Http\IHttpClient
     */
    protected function httpClient()
    {
        return new HttpClient();
    }
    
    /**
     * Gets the serializer used in the REST services construction.
     * 
     * @return WindowsAzure\Common\Internal\Serialization\ISerializer
     */
    protected function serializer()
    {
        return new XmlSerializer();
    }
    
    /**
     * Gets the MIME serializer used in the REST services construction.
     * 
     * @return \WindowsAzure\Table\Internal\IMimeReaderWriter
     */
    protected function mimeSerializer()
    {
        return new MimeReaderWriter();
    }
    
    /**
     * Gets the Atom serializer used in the REST services construction.
     * 
     * @return \WindowsAzure\Table\Internal\IAtomReaderWriter
     */
    protected function atomSerializer()
    {
        return new AtomReaderWriter();
    }

    /**
     * Gets the Queue authentication scheme.
     * 
     * @param string $accountName The account name.
     * @param string $accountKey  The account key.
     * 
     * @return \WindowsAzure\Common\Internal\Authentication\SharedKeyAuthScheme 
     */
    protected function queueAuthenticationScheme($accountName, $accountKey)
    {
        return new SharedKeyAuthScheme($accountName, $accountKey);
    }
    
    /**
     * Gets the Blob authentication scheme.
     * 
     * @param string $accountName The account name.
     * @param string $accountKey  The account key.
     * 
     * @return \WindowsAzure\Common\Internal\Authentication\SharedKeyAuthScheme 
     */
    protected function blobAuthenticationScheme($accountName, $accountKey)
    {
        return new SharedKeyAuthScheme($accountName, $accountKey);
    }
    
    /**
     * Gets the Table authentication scheme.
     * 
     * @param string $accountName The account name.
     * @param string $accountKey  The account key.
     * 
     * @return TableSharedKeyLiteAuthScheme
     */
    protected function tableAuthenticationScheme($accountName, $accountKey)
    {
        return new TableSharedKeyLiteAuthScheme($accountName, $accountKey);
    }
    
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
     * @param string $connectionString The configuration connection string.
     * 
     * @return WindowsAzure\Queue\Internal\IQueue
     */
    public function createQueueService($connectionString)
    {
        $settings = StorageServiceSettings::createFromConnectionString(
            $connectionString
        );
        
        $httpClient    = $this->httpClient();
        $serializer    = $this->serializer();
        $uri           = Utilities::tryAddUrlScheme(
            $settings->getQueueEndpointUri()
        );
        
        $queueWrapper = new QueueRestProxy(
            $httpClient, 
            $uri,
            Resources::EMPTY_STRING, 
            $serializer
        );

        // Adding headers filter
        $queueWrapper = self::_addHeadersFilter(
            $queueWrapper, Resources::QUEUE_TYPE_NAME
        );
        
        // Adding date filter
        $dateFilter   = new DateFilter();
        $queueWrapper = $queueWrapper->withFilter($dateFilter);

        // Adding authentication filter
        $authFilter = new AuthenticationFilter(
            $this->queueAuthenticationScheme(
                $settings->getName(),
                $settings->getKey()
            )
        );

        $queueWrapper = $queueWrapper->withFilter($authFilter);

        return $queueWrapper;
    }
    
    /**
     * Builds a blob object.
     *
     * @param string $connectionString The configuration connection string.
     * 
     * @return WindowsAzure\Blob\Internal\IBlob
     */
    public function createBlobService($connectionString)
    {
        $settings = StorageServiceSettings::createFromConnectionString(
            $connectionString
        );
        
        $httpClient    = $this->httpClient();
        $serializer    = $this->serializer();
        $uri           = Utilities::tryAddUrlScheme(
            $settings->getBlobEndpointUri()
        );

        $blobWrapper = new BlobRestProxy(
            $httpClient, 
            $uri,
            $settings->getName(),
            $serializer
        );

        // Adding headers filter
        $blobWrapper = self::_addHeadersFilter(
            $blobWrapper, Resources::BLOB_TYPE_NAME
        );
        
        // Adding date filter
        $dateFilter  = new DateFilter();
        $blobWrapper = $blobWrapper->withFilter($dateFilter);

        $authFilter = new AuthenticationFilter(
            $this->blobAuthenticationScheme(
                $settings->getName(),
                $settings->getKey()
            )
        );

        $blobWrapper = $blobWrapper->withFilter($authFilter);

        return $blobWrapper;
    }

    /**
     * Builds a table object.
     *
     * @param string $connectionString The configuration connection string.
     * 
     * @return WindowsAzure\Table\Internal\ITable
     */
    public function createTableService($connectionString)
    {
        $settings = StorageServiceSettings::createFromConnectionString(
            $connectionString
        );
        
        $httpClient     = $this->httpClient();
        $atomSerializer = $this->atomSerializer();
        $mimeSerializer = $this->mimeSerializer();
        $serializer     = $this->serializer();
        $uri            = Utilities::tryAddUrlScheme(
            $settings->getTableEndpointUri()
        );

        $tableWrapper = new TableRestProxy(
            $httpClient,
            $uri,
            $atomSerializer,
            $mimeSerializer,
            $serializer
        );

        // Adding headers filter
        $tableWrapper = self::_addHeadersFilter(
            $tableWrapper, Resources::TABLE_TYPE_NAME
        );
        
        // Adding date filter
        $dateFilter   = new DateFilter();
        $tableWrapper = $tableWrapper->withFilter($dateFilter);

        // Adding authentication filter
        $authFilter = new AuthenticationFilter(
            $this->tableAuthenticationScheme(
                $settings->getName(),
                $settings->getKey()
            )
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
    public function createServiceBusService($config)
    {
        $this->_validateConfig($config, Resources::SERVICE_BUS_TYPE_NAME);
        
        $httpClient        = $this->httpClient();
        $serializer        = $this->serializer();
        $serviceBusWrapper = new ServiceBusRestProxy(
            $httpClient,
            $config->getProperty(ServiceBusSettings::URI),
            $serializer
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
     * @param string $connectionString The configuration connection string.
     * 
     * @return WindowsAzure\ServiceManagement\Internal\IServiceManagement
     */
    public function createServiceManagementService($connectionString)
    {
        $settings = ServiceManagementSettings::createFromConnectionString(
            $connectionString
        );
        
        $certificatePath = $settings->getCertificatePath();
        $httpClient      = new HttpClient($certificatePath);
        $serializer      = $this->serializer();
        $uri             = Utilities::tryAddUrlScheme(
            $settings->getEndpointUri(),
            Resources::HTTPS_SCHEME
        );
        
        $serviceManagementWrapper = new ServiceManagementRestProxy(
            $httpClient,
            $settings->getSubscriptionId(),
            $uri,
            $serializer
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
    public function createWrapService($config)
    {
        $this->_validateConfig($config, Resources::WRAP_TYPE_NAME);
        
        $httpClient  = $this->httpClient();
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
            $expected  = Resources::SERVICE_BUS_TYPE_NAME;
            $expected .= '|' . Resources::WRAP_TYPE_NAME;
            throw new InvalidArgumentTypeException($expected);
        }
    }
}

?>
