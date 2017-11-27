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
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 *
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */

namespace WindowsAzure\Common;

use MicrosoftAzure\Storage\Blob\Internal\IBlob;
use MicrosoftAzure\Storage\Queue\Internal\IQueue;
use MicrosoftAzure\Storage\Table\Internal\AtomReaderWriter;
use MicrosoftAzure\Storage\Table\Internal\IAtomReaderWriter;
use MicrosoftAzure\Storage\Table\Internal\IMimeReaderWriter;
use MicrosoftAzure\Storage\Table\Internal\ITable;
use MicrosoftAzure\Storage\Table\Internal\MimeReaderWriter;
use MicrosoftAzure\Storage\Common\ServicesBuilder as StorageServiceBuilder;
use WindowsAzure\Common\Internal\Authentication\StorageAuthScheme;
use WindowsAzure\Common\Internal\Http\IHttpClient;
use WindowsAzure\Common\Internal\MediaServicesSettings;
use WindowsAzure\Common\Internal\Resources;
use WindowsAzure\Common\Internal\Serialization\ISerializer;
use WindowsAzure\Common\Internal\Utilities;
use WindowsAzure\Common\Internal\Http\HttpClient;
use WindowsAzure\Common\Internal\Filters\HeadersFilter;
use WindowsAzure\Common\Internal\Filters\AuthenticationFilter;
use WindowsAzure\Common\Internal\Filters\WrapFilter;
use WindowsAzure\Common\Internal\Serialization\XmlSerializer;
use WindowsAzure\Common\Internal\Authentication\SharedKeyAuthScheme;
use WindowsAzure\Common\Internal\Authentication\TableSharedKeyLiteAuthScheme;
use WindowsAzure\Common\Internal\ServiceManagementSettings;
use WindowsAzure\Common\Internal\ServiceBusSettings;
use WindowsAzure\ServiceBus\Internal\IServiceBus;
use WindowsAzure\ServiceBus\Internal\IWrap;
use WindowsAzure\ServiceBus\ServiceBusRestProxy;
use WindowsAzure\ServiceBus\Internal\WrapRestProxy;
use WindowsAzure\ServiceManagement\Internal\IServiceManagement;
use WindowsAzure\ServiceManagement\ServiceManagementRestProxy;
use WindowsAzure\MediaServices\MediaServicesRestProxy;
use WindowsAzure\MediaServices\Authentication\AzureAdClient;
use WindowsAzure\Common\Internal\OAuthRestProxy;
use WindowsAzure\Common\Internal\Authentication\OAuthScheme;

/**
 * Builds azure service objects.
 *
 * @category  Microsoft
 *
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 *
 * @version   Release: 0.5.0_2016-11
 *
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
     * @return IHttpClient
     */
    protected function httpClient()
    {
        return new HttpClient();
    }

    /**
     * Gets the serializer used in the REST services construction.
     *
     * @return ISerializer
     */
    protected function serializer()
    {
        return new XmlSerializer();
    }

    /**
     * Gets the MIME serializer used in the REST services construction.
     *
     * @return IMimeReaderWriter
     */
    protected function mimeSerializer()
    {
        return new MimeReaderWriter();
    }

    /**
     * Gets the Atom serializer used in the REST services construction.
     *
     * @return IAtomReaderWriter
     */
    protected function atomSerializer()
    {
        return new AtomReaderWriter();
    }

    /**
     * Gets the Queue authentication scheme.
     *
     * @param string $accountName The account name
     * @param string $accountKey  The account key
     *
     * @return StorageAuthScheme
     */
    protected function queueAuthenticationScheme($accountName, $accountKey)
    {
        return new SharedKeyAuthScheme($accountName, $accountKey);
    }

    /**
     * Gets the Blob authentication scheme.
     *
     * @param string $accountName The account name
     * @param string $accountKey  The account key
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
     * @param string $accountName The account name
     * @param string $accountKey  The account key
     *
     * @return TableSharedKeyLiteAuthScheme
     */
    protected function tableAuthenticationScheme($accountName, $accountKey)
    {
        return new TableSharedKeyLiteAuthScheme($accountName, $accountKey);
    }

    /**
     * Builds a WRAP client.
     *
     * @param string $wrapEndpointUri The WRAP endpoint uri
     *
     * @return IWrap
     */
    protected function createWrapService($wrapEndpointUri)
    {
        $httpClient = $this->httpClient();
        $wrapWrapper = new WrapRestProxy($httpClient, $wrapEndpointUri);

        return $wrapWrapper;
    }

    /**
     * Builds a queue object.
     *
     * @param string $connectionString The configuration connection string
     *
     * @return IQueue
     */
    public function createQueueService($connectionString)
    {
        return StorageServiceBuilder::getInstance()->createQueueService($connectionString);
    }

    /**
     * Builds a blob object.
     *
     * @param string $connectionString The configuration connection string
     *
     * @return IBlob
     */
    public function createBlobService($connectionString)
    {
        return StorageServiceBuilder::getInstance()->createBlobService($connectionString);
    }

    /**
     * Builds a table object.
     *
     * @param string $connectionString The configuration connection string
     *
     * @return ITable
     */
    public function createTableService($connectionString)
    {
        return StorageServiceBuilder::getInstance()->createTableService($connectionString);
    }

    /**
     * Builds a Service Bus object.
     *
     * @param string $connectionString The configuration connection string
     *
     * @return IServiceBus
     */
    public function createServiceBusService($connectionString)
    {
        $settings = ServiceBusSettings::createFromConnectionString(
            $connectionString
        );

        $httpClient = $this->httpClient();
        $serializer = $this->serializer();
        $serviceBusWrapper = new ServiceBusRestProxy(
            $httpClient,
            $settings->getServiceBusEndpointUri(),
            $serializer
        );

        // Adding headers filter
        $headers = [];

        $headersFilter = new HeadersFilter($headers);
        $serviceBusWrapper = $serviceBusWrapper->withFilter($headersFilter);

        $filter = $settings->getFilter();

        return $serviceBusWrapper->withFilter($filter);
    }

    /**
     * Builds a service management object.
     *
     * @param string $connectionString The configuration connection string
     *
     * @return IServiceManagement
     */
    public function createServiceManagementService($connectionString)
    {
        $settings = ServiceManagementSettings::createFromConnectionString(
            $connectionString
        );

        $certificatePath = $settings->getCertificatePath();
        $httpClient = new HttpClient($certificatePath);
        $serializer = $this->serializer();
        $uri = Utilities::tryAddUrlScheme(
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
        $headers = [];

        $headers[Resources::X_MS_VERSION] = Resources::SM_API_LATEST_VERSION;

        $headersFilter = new HeadersFilter($headers);
        $serviceManagementWrapper = $serviceManagementWrapper->withFilter(
            $headersFilter
        );

        return $serviceManagementWrapper;
    }

    /**
     * Builds a media services object.
     *
     * @param MediaServicesSettings $settings The media services configuration settings
     *
     * @return MediaServicesRestProxy
     */
    public function createMediaServicesService(MediaServicesSettings $settings)
    {
        $httpClient = new HttpClient();
        $serializer = $this->serializer();
        $uri = Utilities::tryAddUrlScheme(
            $settings->getEndpointUri(),
            Resources::HTTPS_SCHEME
        );

        $mediaServicesWrapper = new MediaServicesRestProxy(
            $httpClient,
            $uri,
            Resources::EMPTY_STRING,
            $serializer
        );

        // Adding headers filter
        $xMSVersion = Resources::MEDIA_SERVICES_API_LATEST_VERSION;
        $dataVersion = Resources::MEDIA_SERVICES_DATA_SERVICE_VERSION_VALUE;
        $dataMaxVersion = Resources::MEDIA_SERVICES_MAX_DATA_SERVICE_VERSION_VALUE;
        $accept = Resources::ACCEPT_HEADER_VALUE;
        $contentType = Resources::ATOM_ENTRY_CONTENT_TYPE;

        $headers = [
            Resources::X_MS_VERSION => $xMSVersion,
            Resources::DATA_SERVICE_VERSION => $dataVersion,
            Resources::MAX_DATA_SERVICE_VERSION => $dataMaxVersion,
            Resources::ACCEPT_HEADER => $accept,
            Resources::CONTENT_TYPE => $contentType,
        ];

        $headersFilter = new HeadersFilter($headers);
        $mediaServicesWrapper = $mediaServicesWrapper->withFilter($headersFilter);

        // Adding Azure Active Directory Authentication filter
        $authenticationFilter = new AuthenticationFilter($settings->getTokenProvider());
        $mediaServicesWrapper = $mediaServicesWrapper->withFilter(
            $authenticationFilter
        );

        return $mediaServicesWrapper;
    }

    /**
     * Gets the static instance of this class.
     *
     * @return ServicesBuilder
     */
    public static function getInstance()
    {
        if (!isset(self::$_instance)) {
            self::$_instance = new self();
        }

        return self::$_instance;
    }
}
