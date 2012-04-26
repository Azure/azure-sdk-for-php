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
 * @package   WindowsAzure\Core
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
 
namespace WindowsAzure\Core;
use WindowsAzure\Resources;
use WindowsAzure\Core\Http\HttpClient;
use WindowsAzure\Core\IServiceBuilder;
use WindowsAzure\Core\Configuration;
use WindowsAzure\Core\Filters\SharedKeyFilter;
use WindowsAzure\Core\Filters\DateFilter;
use WindowsAzure\Core\Filters\HeadersFilter;
use WindowsAzure\Core\InvalidArgumentTypeException;
use WindowsAzure\Services\Queue\QueueRestProxy;
use WindowsAzure\Services\Queue\QueueSettings;
use WindowsAzure\Services\Blob\BlobRestProxy;
use WindowsAzure\Services\Blob\BlobSettings;
use WindowsAzure\Services\Table\TableRestProxy;
use WindowsAzure\Services\Table\TableSettings;
use WindowsAzure\Services\Table\Utilities\AtomReaderWriter;
use WindowsAzure\Services\Table\Utilities\MimeReaderWriter;
use WindowsAzure\Core\Serialization\XmlSerializer;
use WindowsAzure\ServiceManagement\ServiceManagementSettings;
use WindowsAzure\ServiceManagement\ServiceManagementRestProxy;

/**
 * Builds azure service objects.
 *
 * @category  Microsoft
 * @package   WindowsAzure\Core
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
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

        default:
            $expected  = Resources::QUEUE_TYPE_NAME;
            $expected .= '|' . Resources::BLOB_TYPE_NAME;
            $expected .= '|' . Resources::TABLE_TYPE_NAME;
            throw new InvalidArgumentTypeException($expected);
        }
        
        $headersFilter = new HeadersFilter($headers);
        
        return $wrapper->withFilter($headersFilter);
    }
    
    /**
     * Builds a queue object.
     *
     * @param WindowsAzure\Core\Configuration $config configuration.
     * 
     * @return WindowsAzure\Services\Queue\IQueue.
     */
    private function _buildQueue($config)
    {
        $httpClient    = new HttpClient();
        $xmlSerializer = new XmlSerializer();
        
        $queueWrapper = new QueueRestProxy(
            $httpClient, $config->getProperty(QueueSettings::URI), $xmlSerializer
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
     * @param WindowsAzure\Core\Configuration $config configuration.
     * 
     * @return WindowsAzure\Services\Blob\IBlob.
     */
    private function _buildBlob($config)
    {
        $httpClient    = new HttpClient();
        $xmlSerializer = new XmlSerializer();

        $blobWrapper = new BlobRestProxy(
            $httpClient, $config->getProperty(BlobSettings::URI), $xmlSerializer
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
     * @param WindowsAzure\Core\Configuration $config configuration.
     * 
     * @return WindowsAzure\Services\Table\ITable.
     */
    private function _buildTable($config)
    {
        $httpClient     = new HttpClient();
        $atomSerializer = new AtomReaderWriter();
        $mimeSerializer = new MimeReaderWriter();
        $xmlSerializer  = new XmlSerializer();

        $tableWrapper = new TableRestProxy(
            $httpClient,
            $config->getProperty(TableSettings::URI),
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
     * Builds a service management object.
     *
     * @param WindowsAzure\Core\Configuration $config The configuration.
     * 
     * @return WindowsAzure\ServiceManagement\IServiceManagement
     */
    private function _buildServiceManagement($config)
    {
        $certificatePath          = $config->getProperty(
            ServiceManagementSettings::CERTIFICATE_PATH
        );
        $httpClient               = new HttpClient($certificatePath);
        $xmlSerializer            = new XmlSerializer();
        $serviceManagementWrapper = new ServiceManagementRestProxy(
            $httpClient,
            $config->getProperty(ServiceManagementSettings::SUBSCRIPTION_ID),
            $xmlSerializer
        );

        // Adding headers filter
        $serviceManagementWrapper = self::_addHeadersFilter(
            $serviceManagementWrapper, Resources::SERVICE_MANAGEMENT_TYPE_NAME
        );

        return $serviceManagementWrapper;
    }
    
    /**
     * Creates an object passed $type configured with $config.
     *
     * @param WindowsAzure\Core\Configuration $config The configuration.
     * @param string                          $type   The type name.
     * 
     * @return WindowsAzure\Services\Queue\IQueue
     *       | WindowsAzure\Services\Blob\IBlob
     *       | WindowsAzure\Services\Blob\ITable
     */
    public function build($config, $type)
    {
        switch ($type) {
        case Resources::QUEUE_TYPE_NAME:
            return self::_buildQueue($config);
            
        case Resources::BLOB_TYPE_NAME:
            return self::_buildBlob($config);
            
        case Resources::TABLE_TYPE_NAME:
            return self::_buildTable($config);
            
        case Resources::SERVICE_MANAGEMENT_TYPE_NAME:
            return self::_buildServiceManagement($config);
            
        default:
            $expected  = Resources::QUEUE_TYPE_NAME;
            $expected .= '|' . Resources::BLOB_TYPE_NAME;
            $expected .= '|' . Resources::TABLE_TYPE_NAME;
            $expected .= '|' . Resources::SERVICE_MANAGEMENT_TYPE_NAME;
            throw new InvalidArgumentTypeException($expected);
        }
    }
}

?>
