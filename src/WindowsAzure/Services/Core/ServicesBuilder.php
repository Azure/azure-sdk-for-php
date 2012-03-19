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
 * @package   PEAR2\WindowsAzure\Services\Core
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
 
namespace PEAR2\WindowsAzure\Services\Core;
use PEAR2\WindowsAzure\Resources;
use PEAR2\WindowsAzure\Core\HttpClient;
use PEAR2\WindowsAzure\Services\Core\IServiceBuilder;
use PEAR2\WindowsAzure\Services\Core\Configuration;
use PEAR2\WindowsAzure\Services\Core\Filters\SharedKeyFilter;
use PEAR2\WindowsAzure\Services\Core\Filters\DateFilter;
use PEAR2\WindowsAzure\Core\InvalidArgumentTypeException;
use PEAR2\WindowsAzure\Services\Queue\QueueRestProxy;
use PEAR2\WindowsAzure\Services\Queue\QueueSettings;
use PEAR2\WindowsAzure\Services\Blob\BlobRestProxy;
use PEAR2\WindowsAzure\Services\Blob\BlobSettings;

/**
 * Builds azure service objects.
 *
 * @category  Microsoft
 * @package   PEAR2\WindowsAzure\Services\Core
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
class ServicesBuilder implements IServiceBuilder
{
    /**
     * Builds a queue object.
     *
     * @param PEAR2\WindowsAzure\Services\Core\Configuration $config configuration.
     * 
     * @return PEAR2\WindowsAzure\Services\Queue\IQueue.
     */
    private static function _buildQueue($config)
    {
        $httpClient = new HttpClient();
        
        $queueWrapper = new QueueRestProxy(
            $httpClient, $config->getProperty(QueueSettings::URI)
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
     * @param PEAR2\WindowsAzure\Services\Core\Configuration $config configuration.
     * 
     * @return PEAR2\WindowsAzure\Services\Blob\IBlob.
     */
    private static function _buildBlob($config)
    {
        $httpClient = new HttpClient();

        $blobWrapper = new BlobRestProxy(
            $httpClient, $config->getProperty(BlobSettings::URI)
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
     * Creates an object passed $type configured with $config.
     *
     * @param PEAR2\WindowsAzure\Services\Core\Configuration $config configuration.
     * @param string                                         $type   type name.
     * 
     * @return PEAR2\WindowsAzure\Services\Queue\IQueue
     *       | PEAR2\WindowsAzure\Services\Blob\IBlob
     */
    public static function build($config, $type)
    {
        switch ($type) {
        case Resources::QUEUE_TYPE_NAME:
            return self::_buildQueue($config);
        case Resources::BLOB_TYPE_NAME:
            return self::_buildBlob($config);

        default:
            $expected  = Resources::QUEUE_TYPE_NAME;
            $expected .= '|' . Resources::BLOB_TYPE_NAME;
            throw new InvalidArgumentTypeException($expected);
        }
    }
}

?>
