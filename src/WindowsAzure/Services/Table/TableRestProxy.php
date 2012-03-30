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
 * @package   PEAR2\WindowsAzure\Services\Table
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
 
namespace PEAR2\WindowsAzure\Services\Table;
use PEAR2\WindowsAzure\Resources;
use PEAR2\WindowsAzure\Utilities;
use PEAR2\WindowsAzure\Services\Core\ServiceRestProxy;
use PEAR2\WindowsAzure\Services\Table\Models\TableServiceOptions;
use PEAR2\WindowsAzure\Services\Core\Models\GetServicePropertiesResult;

/**
 * This class constructs HTTP requests and receive HTTP responses for table
 * service layer.
 *
 * @category  Microsoft
 * @package   PEAR2\WindowsAzure\Services\Table
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
class TableRestProxy extends ServiceRestProxy implements ITable
{
    /**
    * Gets the properties of the Table service.
    * 
    * @param Models\TableServiceOptions $options optional table service options.
    * 
    * @return PEAR2\WindowsAzure\Services\Core\Models\GetServicePropertiesResult
    * 
    * @see http://msdn.microsoft.com/en-us/library/windowsazure/hh452238.aspx
    */
    public function getServiceProperties($options = null)
    {
        $method      = \HTTP_Request2::METHOD_GET;
        $headers     = array();
        $queryParams = array();
        $path        = Resources::EMPTY_STRING;
        $statusCode  = Resources::STATUS_OK;
        
        if (is_null($options)) {
            $options = new TableServiceOptions();
        }
        
        $queryParams[Resources::QP_REST_TYPE] = 'service';
        $queryParams[Resources::QP_COMP]      = 'properties';
        $queryParams[Resources::QP_TIMEOUT]   = strval($options->getTimeout());
        
        $response = $this->send($method, $headers, $queryParams, $path, $statusCode);
        $parsed   = Utilities::unserialize($response->getBody());
        
        return GetServicePropertiesResult::create($parsed);
    }

    /**
    * Sets the properties of the Table service.
    * 
    * @param ServiceProperties          $serviceProperties new service properties
    * @param Models\TableServiceOptions $options           optional parameters
    * 
    * @return none.
    * 
    * @see http://msdn.microsoft.com/en-us/library/windowsazure/hh452240.aspx
    */
    public function setServiceProperties($serviceProperties, $options = null)
    {
        $method      = \HTTP_Request2::METHOD_PUT;
        $headers     = array();
        $queryParams = array();
        $statusCode  = Resources::STATUS_ACCEPTED;
        $path        = Resources::EMPTY_STRING;
        $body        = Resources::EMPTY_STRING;
        
        if (!isset($options)) {
            $options = new TableServiceOptions();
        }
        
        $queryParams[Resources::QP_REST_TYPE] = 'service';
        $queryParams[Resources::QP_COMP]      = 'properties';
        $queryParams[Resources::QP_TIMEOUT]   = strval($options->getTimeout());
        $body                                 = $serviceProperties->toXml();
        $headers[Resources::CONTENT_TYPE]     = Resources::XML_CONTENT_TYPE;
        
        $this->send($method, $headers, $queryParams, $path, $statusCode, $body);
    }
    
    /**
     * Quries tables in the given storage account.
     * 
     * @param Models\QueryTablesOptions $options optional parameters
     * 
     * @return Models\QueryTablesResult
     * 
     * @see http://msdn.microsoft.com/en-us/library/windowsazure/dd179405.aspx
     */
    public function queryTables($options = null)
    {
        throw new \Exception(Resources::NOT_IMPLEMENTED_MSG);
    }
    
    /**
     * Creates new table in the storage account
     * 
     * @param string                     $table   name of the name
     * @param Models\TableServiceOptions $options optional parameters
     * 
     * @return none
     * 
     * @see http://msdn.microsoft.com/en-us/library/windowsazure/dd135729.aspx
     */
    public function createTable($table, $options = null)
    {
        throw new \Exception(Resources::NOT_IMPLEMENTED_MSG);
    }
    
    /**
     * Deletes the specified table and any data it contains.
     * 
     * @param string                     $table   name of the name
     * @param Models\TableServiceOptions $options optional parameters
     * 
     * @return none
     * 
     * @see http://msdn.microsoft.com/en-us/library/windowsazure/dd179387.aspx
     */
    public function deleteTable($table, $options = null)
    {
        throw new \Exception(Resources::NOT_IMPLEMENTED_MSG);
    }
    
    /**
     * Quries entities for the given table name
     * 
     * @param string                      $table   name of the table
     * @param Models\QueryEntitiesOptions $options optional parameters
     * 
     * @return Models\QueryEntitiesResult
     * 
     * @see http://msdn.microsoft.com/en-us/library/windowsazure/dd179421.aspx
     */
    public function queryEntities($table, $options = null)
    {
        throw new \Exception(Resources::NOT_IMPLEMENTED_MSG);
    }
    
    /**
     * Inserts new entity to the table
     * 
     * @param string                     $table   name of the table
     * @param Models\Entity              $entity  table entity
     * @param Models\TableServiceOptions $options optional parameters
     * 
     * @return Models\InsertEntityResult
     * 
     * @see http://msdn.microsoft.com/en-us/library/windowsazure/dd179433.aspx
     */
    public function insertEntity($table, $entity, $options = null)
    {
        throw new \Exception(Resources::NOT_IMPLEMENTED_MSG);
    }
    
    /**
     * Updates an existing entity or inserts a new entity if it does not exist in the
     * table.
     * 
     * @param string                     $table   name of the table
     * @param Models\Entity              $entity  table entity
     * @param Models\TableServiceOptions $options optional parameters
     * 
     * @return Models\UpdateEntityResult
     * 
     * @see http://msdn.microsoft.com/en-us/library/windowsazure/hh452241.aspx
     */
    public function insertOrMergeEntity($table, $entity, $options = null)
    {
        throw new \Exception(Resources::NOT_IMPLEMENTED_MSG);
    }
    
    /**
     * Replaces an existing entity or inserts a new entity if it does not exist in
     * the table.
     * 
     * @param string                     $table   name of the table
     * @param Models\Entity              $entity  table entity
     * @param Models\TableServiceOptions $options optional parameters
     * 
     * @return Models\UpdateEntityResult
     * 
     * @see http://msdn.microsoft.com/en-us/library/windowsazure/hh452242.aspx
     */
    public function insertOrReplaceEntity($table, $entity, $options = null)
    {
        throw new \Exception(Resources::NOT_IMPLEMENTED_MSG);
    }
    
    /**
     * Updates an existing entity in a table. The Update Entity operation replaces 
     * the entire entity and can be used to remove properties.
     * 
     * @param string                     $table   name of the table
     * @param string                     $match   the matching condition. To force an
     * unconditional update, set If-Match to the wildcard character (*)
     * @param Models\Entity              $entity  table entity
     * @param Models\TableServiceOptions $options optional parameters
     * 
     * @return Models\UpdateEntityResult
     * 
     * @see http://msdn.microsoft.com/en-us/library/windowsazure/dd179427.aspx
     */
    public function updateEntity($table, $match, $entity, $options = null)
    {
        throw new \Exception(Resources::NOT_IMPLEMENTED_MSG);
    }
    
    /**
     * Updates an existing entity by updating the entity's properties. This operation
     * does not replace the existing entity, as the updateEntity operation does.
     * 
     * @param string                     $table   name of the table
     * @param string                     $match   the matching condition. To force an
     * unconditional merge, set $match to the wildcard character (*)
     * @param Models\Entity              $entity  table entity
     * @param Models\TableServiceOptions $options optional parameters
     * 
     * @return Models\UpdateEntityResult
     * 
     * @see http://msdn.microsoft.com/en-us/library/windowsazure/dd179392.aspx
     */
    public function mergeEntity($table, $match, $entity, $options = null)
    {
        throw new \Exception(Resources::NOT_IMPLEMENTED_MSG);
    }
    
    /**
     * Deletes an existing entity in a table.
     * 
     * @param string                     $table        name of the table
     * @param string                     $partitionKey the entity partition key
     * @param string                     $rowKey       the entity row key
     * @param string                     $match        the matching condition.
     * To force an unconditional delete, set $match to the wildcard character (*)
     * @param Models\DeleteEntityOptions $options      optional parameters
     * 
     * @return none
     * 
     * @see http://msdn.microsoft.com/en-us/library/windowsazure/dd135727.aspx
     */
    public function deleteEntity($table, $partitionKey, $rowKey, $match,
        $options = null
    ) {
        throw new \Exception(Resources::NOT_IMPLEMENTED_MSG);
    }
    
    /**
     * Gets table entity
     * 
     * @param string                     $table        name of the table
     * @param string                     $partitionKey the entity partition key
     * @param string                     $rowKey       the entity row key
     * @param Models\DeleteEntityOptions $options      optional parameters
     * 
     * @return Models\GetEntityResult
     * 
     * @see http://msdn.microsoft.com/en-us/library/windowsazure/dd179421.aspx
     */
    public function getEntity($table, $partitionKey, $rowKey, $options = null)
    {
        throw new \Exception(Resources::NOT_IMPLEMENTED_MSG);
    }
    
    /**
     * Does batch of operations on the table service.
     * 
     * @param BatchOperations            $operations the operations to apply
     * @param Models\TableServiceOptions $options    optional parameters
     * 
     * @return Models\BatchResult
     */
    public function batch($operations, $options = null)
    {
        throw new \Exception(Resources::NOT_IMPLEMENTED_MSG);
    }
}

?>
