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
 * @package   WindowsAzure\Common
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
 
namespace WindowsAzure\Common;
use WindowsAzure\Blob\BlobRestProxy;
use WindowsAzure\Common\Internal\Resources;
use WindowsAzure\Common\Internal\Validate;
use WindowsAzure\Common\Internal\Utilities;
use WindowsAzure\Common\Internal\Http\HttpClient;
use WindowsAzure\Common\Internal\Filters\DateFilter;
use WindowsAzure\Common\Internal\Filters\HeadersFilter;
use WindowsAzure\Common\Internal\Filters\AuthenticationFilter;
use WindowsAzure\Common\Internal\Filters\WrapFilter;
use WindowsAzure\Common\Internal\InvalidArgumentTypeException;
use WindowsAzure\Common\Internal\Serialization\XmlSerializer;
use WindowsAzure\Common\Internal\Authentication\SharedKeyAuthScheme;
use WindowsAzure\Common\Internal\Authentication\TableSharedKeyLiteAuthScheme;
use WindowsAzure\Common\Internal\StorageServiceSettings;
use WindowsAzure\Common\Internal\ServiceManagementSettings;
use WindowsAzure\Common\Internal\ServiceBusSettings;
use WindowsAzure\Queue\QueueRestProxy;
use WindowsAzure\ServiceBus\ServiceBusRestProxy;
use WindowsAzure\ServiceBus\WrapRestProxy;
use WindowsAzure\ServiceManagement\ServiceManagementRestProxy;
use WindowsAzure\Table\TableRestProxy;
use WindowsAzure\Table\Internal\AtomReaderWriter;
use WindowsAzure\Table\Internal\MimeReaderWriter;


/**
 * Builds azure service objects.
 *
 * @category  Microsoft
 * @package   WindowsAzure\Common
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
class ServicesBuilder
{
    /**
     * @var ServicesBuilder
     */
    private static $_instance = null;
    
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
     * @return \WindowsAzure\Common\Internal\Authentication\StorageAuthScheme
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
     * @return \WindowsAzure\Common\Internal\Authentication\StorageAuthScheme
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
        $headers = array();
        
        $headers[Resources::X_MS_VERSION] = Resources::STORAGE_API_LATEST_VERSION;
        
        $headersFilter = new HeadersFilter($headers);
        $queueWrapper  = $queueWrapper->withFilter($headersFilter);
        
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
        $headers = array();
        
        $headers[Resources::X_MS_VERSION] = Resources::STORAGE_API_LATEST_VERSION;
        
        $headersFilter = new HeadersFilter($headers);
        $blobWrapper   = $blobWrapper->withFilter($headersFilter);
        
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
        $headers               = array();
        $latestServicesVersion = Resources::STORAGE_API_LATEST_VERSION;
        $currentVersion        = Resources::DATA_SERVICE_VERSION_VALUE;
        $maxVersion            = Resources::MAX_DATA_SERVICE_VERSION_VALUE;
        $accept                = Resources::ACCEPT_HEADER_VALUE;
        $acceptCharset         = Resources::ACCEPT_CHARSET_VALUE;
        
        $headers[Resources::X_MS_VERSION]             = $latestServicesVersion;
        $headers[Resources::DATA_SERVICE_VERSION]     = $currentVersion;
        $headers[Resources::MAX_DATA_SERVICE_VERSION] = $maxVersion;
        $headers[Resources::MAX_DATA_SERVICE_VERSION] = $maxVersion;
        $headers[Resources::ACCEPT_HEADER]            = $accept;
        $headers[Resources::ACCEPT_CHARSET]           = $acceptCharset;
        
        $headersFilter = new HeadersFilter($headers);
        $tableWrapper  = $tableWrapper->withFilter($headersFilter);
        
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
     * Builds a Service Bus object. 
     * 
     * @param string $connectionString The configuration connection string.
     * 
     * @return WindowsAzure\ServiceBus\Internal\IServiceBus
     */
    public function createServiceBusService($connectionString)
    {
        $settings = ServiceBusSettings::createFromConnectionString(
            $connectionString
        );
        
        $httpClient        = $this->httpClient();
        $serializer        = $this->serializer();
        $serviceBusWrapper = new ServiceBusRestProxy(
            $httpClient,
            $settings->getServiceBusEndpointUri(),
            $serializer
        );
        
        $wrapFilter = new WrapFilter(
            $settings->getWrapEndpointUri(),
            $settings->getWrapName(),
            $settings->getWrapPassword(),
            $this->createWrapService($settings->getWrapEndpointUri())
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
        $headers = array();
        
        $headers[Resources::X_MS_VERSION] = Resources::SM_API_LATEST_VERSION;
        
        $headersFilter            = new HeadersFilter($headers);
        $serviceManagementWrapper = $serviceManagementWrapper->withFilter(
            $headersFilter
        );

        return $serviceManagementWrapper;
    }
    
    /**
     * Builds a WRAP client.
     * 
     * @param string $wrapEndpointUri The WRAP endpoint uri.
     *
     * @return WindowsAzure\ServiceBus\Internal\IWrap
     */
    protected function createWrapService($wrapEndpointUri)
    {   
        $httpClient  = $this->httpClient();
        $wrapWrapper = new WrapRestProxy($httpClient, $wrapEndpointUri);

        return $wrapWrapper;
    }
    
    /**
     * Gets the static instance of this class.
     * 
     * @return ServicesBuilder 
     */
    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            self::$_instance = new ServicesBuilder();
        }
        
        return self::$_instance;
    }
}