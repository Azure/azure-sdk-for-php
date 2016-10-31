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

namespace Client;

use MicrosoftAzure\Storage\Blob\Internal\IBlob;
use MicrosoftAzure\Storage\Queue\Internal\IQueue;
use MicrosoftAzure\Storage\Table\Internal\ITable;
use WindowsAzure\Common\ServicesBuilder;
use MicrosoftAzure\Storage\Table\Models\QueryTablesOptions;

/**
 * Encapsulates Windows Azure storage service operations.
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
class CloudStorageService
{
    /**
     * @var IQueue
     */
    private $_queueProxy;

    /**
     * @var IBlob
     */
    private $_blobProxy;

    /**
     * @var ITable
     */
    private $_tableProxy;

    /**
     * @var string
     */
    private $_blobEndpointUri;

    /**
     * @var string
     */
    private $_queueEndpointUri;

    /**
     * @var string
     */
    private $_tableEndpointUri;

    /**
     * Constructs CloudStorageService using the provided parameters.
     * 
     * @param string $name             The storage service name.
     * @param string $key              The storage service access key.
     * @param array  $blobEndpointUri  The blob endpoint URI.
     * @param array  $queueEndpointUri The queue endpoint URI.
     * @param array  $tableEndpointUri The queue endpoint URI.
     * 
     * @throws \InvalidArgumentException
     */
    public function __construct($name, $key, $blobEndpointUri, $queueEndpointUri, $tableEndpointUri)
    {
        $this->_queueEndpointUri = $queueEndpointUri;
        $this->_blobEndpointUri = $blobEndpointUri;
        $this->_tableEndpointUri = $tableEndpointUri;

        $connectionString = "DefaultEndpointsProtocol=http;AccountName=$name;AccountKey=$key";
        $this->_tableProxy = ServicesBuilder::getInstance()->createTableService($connectionString);
        $this->_blobProxy = ServicesBuilder::getInstance()->createBlobService($connectionString);
        $this->_queueProxy = ServicesBuilder::getInstance()->createQueueService($connectionString);
    }

    /**
     * Checks if a given table name exists or not.
     * 
     * @param string $name The table name.
     * 
     * @return bool
     */
    public function tableExists($name)
    {
        $tables = $this->listTables();
        foreach ($tables as $tableName) {
            if ($tableName == $name) {
                return true;
            }
        }

        return false;
    }

    /**
     * Lists all tables in this storage service.
     * 
     * @return array
     */
    public function listTables()
    {
        $nextTableName = null;
        $tables = array();

        do {
            $options = new QueryTablesOptions();
            $options->setNextTableName($nextTableName);
            $result = $this->_tableProxy->queryTables();
            $nextTableName = $result->getNextTableName();
            $tables = array_merge($tables, $result->getTables());
        } while (!is_null($nextTableName));

        return $tables;
    }

    /**
     * Creates table if it does not exist.
     * 
     * @param string $name The table name.
     * 
     * @return CloudTable
     */
    public function createTable($name)
    {
        $cloudTable = null;

        try {
            $this->_tableProxy->createTable($name);
            $cloudTable = new CloudTable($name, $this->_tableProxy);
        } catch (\Exception $e) {
            if ($e->getCode() == WindowsAzureErrorCodes::TABLE_ALREADY_EXISTS) {
                $cloudTable = new CloudTable($name, $this->_tableProxy);
            }
        }

        return $cloudTable;
    }

    /**
     * Deletes given table.
     * 
     * @param string $name The table name.
     * 
     * @return bool Indicates if the table was deleted or not.
     */
    public function deleteTable($name)
    {
        try {
            $this->_tableProxy->deleteTable($name);

            return true;
        } catch (\Exception $ex) {
            return false;
        }
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
