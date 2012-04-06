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
use PEAR2\WindowsAzure\Validate;
use PEAR2\WindowsAzure\Services\Core\ServiceRestProxy;
use PEAR2\WindowsAzure\Services\Table\Models\TableServiceOptions;
use PEAR2\WindowsAzure\Services\Core\Models\GetServicePropertiesResult;
use PEAR2\WindowsAzure\Services\Table\Models\Filters;
use PEAR2\WindowsAzure\Services\Table\Models\Filters\Filter;
use PEAR2\WindowsAzure\Services\Table\Models\QueryTablesOptions;
use PEAR2\WindowsAzure\Services\Table\Models\QueryTablesResult;
use PEAR2\WindowsAzure\Services\Table\Models\InsertEntityResult;
use PEAR2\WindowsAzure\Services\Table\Models\UpdateEntityResult;
use PEAR2\WindowsAzure\Services\Table\Models\QueryEntitiesOptions;
use PEAR2\WindowsAzure\Services\Table\Models\QueryEntitiesResult;

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
     * @var IAtomReaderWriter
     */
    private $_atomSerializer;
    
    /**
     * Constructs URI path for entity.
     * 
     * @param string $table The table name.
     * @param string $pk    The entity's partition key.
     * @param string $rk    The entity's row key.
     * 
     * @return string 
     */
    private function _getEntityPath($table, $pk, $rk)
    {
        return "$table(PartitionKey='$pk',RowKey='$rk')";
    }
    
    /**
     * Does actual work for update and merge entity APIs
     * 
     * @param string                     $table   The table name.
     * @param Models\Entity              $entity  The entity instance to use.
     * @param string                     $verb    The HTTP method.
     * @param boolean                    $ETag    The flag to include tag or not.
     * @param Models\TableServiceOptions $options The optional parameters.
     * 
     * @return Models\UpdateEntityResult
     */
    private function _putOrMergeEntityImpl($table, $entity, $verb, $ETag, $options)
    {
        Validate::isValidString($table);
        Validate::notNullOrEmpty($entity);
        Validate::isTrue($entity->isValid(), Resources::INVALID_ENTITY_MSG);
        
        $ETag        = false;
        $method      = $verb;
        $headers     = array();
        $queryParams = array();
        $statusCode  = Resources::STATUS_NO_CONTENT;
        $pk          = $entity->getPartitionKey();
        $rk          = $entity->getRowKey();
        $etag        = $entity->getEtag();
        $path        = $this->_getEntityPath($table, $pk, $rk);
        $body        = $this->_atomSerializer->getEntity($entity);
        
        if (is_null($options)) {
            $options = new TableServiceOptions();
        }
        
        $queryParams[Resources::QP_TIMEOUT] = strval($options->getTimeout());
        $headers[Resources::CONTENT_TYPE]   = Resources::XML_ATOM_CONTENT_TYPE;
        $headers[Resources::IF_MATCH]       = $ETag ? $etag : Resources::ASTERISK;
        
        $response = $this->send(
            $method, $headers, $queryParams, $path, $statusCode, $body
        );
        
        return UpdateEntityResult::create($response->getHeader());
    }
 
    /**
     * Builds filter expression
     * 
     * @param Filter $filter The filter object
     * 
     * @return string 
     */
    private function _buildFilterExpression($filter)
    {
        $e = Resources::EMPTY_STRING;
        $this->_buildFilterExpressionRec($filter, $e);
        
        return $e;
    }
    
    /**
     * Builds filter expression
     * 
     * @param Filter $filter The filter object
     * @param string &$e     The filter expression
     * 
     * @return string
     */
    private function _buildFilterExpressionRec($filter, &$e)
    {
        if (is_null($filter)) {
            return;
        }
        
        if ($filter instanceof Filters\LiteralFilter) {
            $e .= $filter->getLiteral();
        } else if ($filter instanceof Filters\ConstantFilter) {
            $e .= '\'' . $filter->getValue() . '\'';
        } else if ($filter instanceof Filters\UnaryFilter) {
            $e .= $filter->getOperator();
            $e .= '(';
            $this->_buildFilterExpressionRec($filter->getOperand(), $e);
            $e .= ')';
        } else if ($filter instanceof Filters\BinaryFilter) {
            $e .= '(';
            $this->_buildFilterExpressionRec($filter->getLeft(), $e);
            $e .= ' ';
            $e .= $filter->getOperator();
            $e .= ' ';
            $this->_buildFilterExpressionRec($filter->getRight(), $e);
            $e .= ')';
        } else if ($filter instanceof Filters\RawStringFilter) {
            $e .= $filter->getRawStringFilter();
        }
        
        return $e;
    }
    
    /**
     * Adds query object to the query parameter array
     * 
     * @param array        $queryParam The URI query parameters 
     * @param Models\Query $query      The query object
     * 
     * @return array 
     */
    private function _addOptionalQuery($queryParam, $query)
    {
        if (!is_null($query)) {
            $selectedFields = $query->getSelectFields();
            if (!empty($selectedFields)) {
                $final = $this->_encodeODataUriValues($selectedFields); 
                
                $queryParam[Resources::QP_SELECT] = implode(',', $final);
            }
            
            if (!is_null($query->getTop())) {
                $final = strval($this->_encodeODataUriValue($query->getTop()));
                
                $queryParam[Resources::QP_TOP] = $final;
            }
            
            if (!is_null($query->getFilter())) {
                $final = $this->_buildFilterExpression($query->getFilter());
                
                $queryParam[Resources::QP_FILTER] = $final;
            }
            
            $orderByFields = $query->getOrderByFields();
            if (!empty($orderByFields)) {
                $final = $this->_encodeODataUriValues($orderByFields);
                
                $queryParam[Resources::QP_ORDERBY] = implode(',', $final);
            }
        }
        
        return $queryParam;
    }
    
    /**
     * Encodes OData URI values
     * 
     * @param array $values The OData URL values
     * 
     * @return array
     */
    private function _encodeODataUriValues($values)
    {
        $list = array();
        
        foreach ($values as $value) {
            $list[] = $this->_encodeODataUriValue($value);
        }
        
        return $list;
    }
    
    /**
     * Encodes OData URI value
     * 
     * @param string $value The OData URL value
     * 
     * @return string
     */
    private function _encodeODataUriValue($value)
    {
        //TODO: Unclear if OData value in URI's need to be encoded or not
        return $value;
    }
    
    /**
     * Constructor
     * 
     * @param PEAR2\WindowsAzure\Core\IHttpClient $channel        http client channel
     * @param string                              $uri            storage account uri
     * @param Table\Utilities\IAtomReaderWriter   $atomSerializer serializer
     * 
     * @return TableRestProxy
     */
    public function __construct($channel, $uri, $atomSerializer)
    {
        parent::__construct($channel, $uri);
        $this->_atomSerializer = $atomSerializer;
    }
    
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
        
        if (is_null($options)) {
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
        $method      = \HTTP_Request2::METHOD_GET;
        $headers     = array();
        $queryParams = array();
        $statusCode  = Resources::STATUS_OK;
        $path        = 'Tables';
        
        if (is_null($options)) {
            $options = new QueryTablesOptions();
        }
        
        $query   = $options->getQuery();
        $next    = $options->getNextTableName();
        $prefix  = $options->getPrefix();
        $timeout = strval($options->getTimeout());
        
        if (!empty($prefix)) {
            // Append Max char to end '{' is 1 + 'z' in AsciiTable ==> upperBound 
            // is prefix + '{'
            $prefixFilter = Filter::applyAnd(
                Filter::applyGe(
                    Filter::applyLiteral('TableName'),
                    Filter::applyConstant($prefix)
                ),
                Filter::applyLe(
                    Filter::applyLiteral('TableName'),
                    Filter::applyConstant($prefix . '{')
                )
            );
            
            if (is_null($query)) {
                $query = new Models\Query();
            }

            if (is_null($query->getFilter())) {
                // use the prefix filter if the query filter is null
                $query->setFilter($prefixFilter);
            } else {
                // combine and use the prefix filter if the query filter exists
                $combinedFilter = Filter::applyAnd(
                    $query->getFilter(), $prefixFilter
                );
                $query->setFilter($combinedFilter);
            }
        }
        
        $queryParams = $this->_addOptionalQuery($queryParams, $query);
        
        $queryParams[Resources::QP_NEXT_TABLE_NAME] = $next;
        $queryParams[Resources::QP_TIMEOUT]         = $timeout;
        
        $response = $this->send($method, $headers, $queryParams, $path, $statusCode);
        $tables   = $this->_atomSerializer->parseTableEntries($response->getBody());
        
        return QueryTablesResult::create($response->getHeader(), $tables);
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
        Validate::isValidString($table);
        
        $method      = \HTTP_Request2::METHOD_POST;
        $headers     = array();
        $queryParams = array();
        $statusCode  = Resources::STATUS_CREATED;
        $path        = 'Tables';
        $body        = $this->_atomSerializer->getTable($table);
        
        if (is_null($options)) {
            $options = new TableServiceOptions();
        }
        
        $queryParams[Resources::QP_TIMEOUT] = strval($options->getTimeout());
        $headers[Resources::CONTENT_TYPE]   = Resources::XML_ATOM_CONTENT_TYPE;
        
        $this->send($method, $headers, $queryParams, $path, $statusCode, $body);
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
        Validate::isValidString($table);
        
        $method      = \HTTP_Request2::METHOD_DELETE;
        $headers     = array();
        $queryParams = array();
        $statusCode  = Resources::STATUS_NO_CONTENT;
        $path        = "Tables('$table')";
        
        if (is_null($options)) {
            $options = new TableServiceOptions();
        }
        
        $queryParams[Resources::QP_TIMEOUT] = strval($options->getTimeout());
        $headers[Resources::CONTENT_TYPE]   = Resources::XML_ATOM_CONTENT_TYPE;
        
        $this->send($method, $headers, $queryParams, $path, $statusCode);
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
        Validate::isValidString($table);
        
        $method      = \HTTP_Request2::METHOD_GET;
        $headers     = array();
        $queryParams = array();
        $statusCode  = Resources::STATUS_OK;
        $path        = $table;
        
        if (is_null($options)) {
            $options = new QueryEntitiesOptions();
        }
        
        $encodedPK   = $this->_encodeODataUriValue($options->getNextPartitionKey());
        $encodedRK   = $this->_encodeODataUriValue($options->getNextRowKey());
        $queryParams = $this->_addOptionalQuery($queryParams, $options->getQuery());
        
        $queryParams[Resources::QP_TIMEOUT] = strval($options->getTimeout());
        $queryParams[Resources::QP_NEXT_PK] = $encodedPK;
        $queryParams[Resources::QP_NEXT_RK] = $encodedRK;
        $headers[Resources::CONTENT_TYPE]   = Resources::XML_ATOM_CONTENT_TYPE;
        
        if (!is_null($options->getQuery())) {
            $dsHeader   = Resources::DATA_SERVICE_VERSION;
            $maxdsValue = Resources::MAX_DATA_SERVICE_VERSION_VALUE;
            $fields     = $options->getQuery()->getSelectFields();
            $hasSelect  = !empty($fields);
            if ($hasSelect) {
                $headers[$dsHeader] = $maxdsValue;
            }
        }
        
        $response = $this->send($method, $headers, $queryParams, $path, $statusCode);
        $entities = $this->_atomSerializer->parseEntities($response->getBody());
        
        return QueryEntitiesResult::create($response->getHeader(), $entities);
    }
    
    /**
     * Inserts new entity to the table.
     * 
     * @param string                     $table   name of the table.
     * @param Models\Entity              $entity  table entity.
     * @param Models\TableServiceOptions $options optional parameters.
     * 
     * @return Models\InsertEntityResult
     * 
     * @see http://msdn.microsoft.com/en-us/library/windowsazure/dd179433.aspx
     */
    public function insertEntity($table, $entity, $options = null)
    {
        Validate::isValidString($table);
        Validate::notNullOrEmpty($entity);
        Validate::isTrue($entity->isValid(), Resources::INVALID_ENTITY_MSG);
        
        $method      = \HTTP_Request2::METHOD_POST;
        $headers     = array();
        $queryParams = array();
        $statusCode  = Resources::STATUS_CREATED;
        $path        = $table;
        $body        = $this->_atomSerializer->getEntity($entity);
        
        if (is_null($options)) {
            $options = new TableServiceOptions();
        }
        
        $queryParams[Resources::QP_TIMEOUT] = strval($options->getTimeout());
        $headers[Resources::CONTENT_TYPE]   = Resources::XML_ATOM_CONTENT_TYPE;
        
        $response = $this->send(
            $method, $headers, $queryParams, $path, $statusCode, $body
        );
        
        $entity = $this->_atomSerializer->parseEntity($response->getBody());
        $result = new InsertEntityResult();
        $result->setEntity($entity);
        
        return $result;
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
        $this->_putOrMergeEntityImpl(
            $table,
            $entity,
            Resources::HTTP_MERGE,
            false, 
            $options
        );
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
        $this->_putOrMergeEntityImpl(
            $table,
            $entity,
            \HTTP_Request2::METHOD_PUT,
            false, 
            $options
        );
    }
    
    /**
     * Updates an existing entity in a table. The Update Entity operation replaces 
     * the entire entity and can be used to remove properties.
     * 
     * @param string                     $table   The table name.
     * @param Models\Entity              $entity  The table entity.
     * @param Models\TableServiceOptions $options The optional parameters.
     * 
     * @return Models\UpdateEntityResult
     * 
     * @see http://msdn.microsoft.com/en-us/library/windowsazure/dd179427.aspx
     */
    public function updateEntity($table, $entity, $options = null)
    {
        $this->_putOrMergeEntityImpl(
            $table,
            $entity,
            \HTTP_Request2::METHOD_PUT,
            true, 
            $options
        );
    }
    
    /**
     * Updates an existing entity by updating the entity's properties. This operation
     * does not replace the existing entity, as the updateEntity operation does.
     * 
     * @param string                     $table   The table name.
     * @param Models\Entity              $entity  The table entity.
     * @param Models\TableServiceOptions $options The optional parameters.
     * 
     * @return Models\UpdateEntityResult
     * 
     * @see http://msdn.microsoft.com/en-us/library/windowsazure/dd179392.aspx
     */
    public function mergeEntity($table, $entity, $options = null)
    {
        $this->_putOrMergeEntityImpl(
            $table,
            $entity,
            Resources::HTTP_MERGE,
            true, 
            $options
        );
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
