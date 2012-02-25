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

use PEAR2\WindowsAzure\Services\Core\IServiceBuilder;
use PEAR2\WindowsAzure\Services\Core\Configuration;
use PEAR2\WindowsAzure\Services\Queue\QueueRestProxy;
use PEAR2\WindowsAzure\Services\Queue\QueueConfiguration;
use PEAR2\WindowsAzure\Services\Core\Filters\SharedKeyFilter;
use PEAR2\WindowsAzure\Services\Core\Filters\DateFilter;
use PEAR2\WindowsAzure\Resources;
use PEAR2\WindowsAzure\Core\Exceptions\InvalidArgumentTypeException;

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
     * Creates an object passed $type configured with $config.
     *
     * @param PEAR2\WindowsAzure\Services\Core\Configuration $config configuration.
     * @param string                                         $type   type name.
     * 
     * @return mixed.
     */
    public static function build($config, $type)
    {
        switch ($type) {
        case Resources::QUEUE_TYPE_NAME:
            $httpClient = new HttpClient();

            $queueWrapper = new QueueRestProxy(
                $httpClient, $config->getProperty(QueueConfiguration::ACCOUNT_NAME),
                $config->getProperty(QueueConfiguration::URI)
            );

            // Adding date filter
            $dateFilter   = new DateFilter();
            $queueWrapper = $queueWrapper->withFilter($dateFilter);

            // Adding authentication filter
            $authFilter = new SharedKeyFilter(
                $config->getProperty(QueueConfiguration::ACCOUNT_NAME),
                $config->getProperty(QueueConfiguration::ACCOUNT_KEY),
                $type
            );

            $queueWrapper = $queueWrapper->withFilter($authFilter);

            return $queueWrapper;

        default: 
            throw new InvalidArgumentTypeException(Resources::QUEUE_TYPE_NAME);
        }
    }
}

?>
