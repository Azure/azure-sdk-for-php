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
 * @package   PEAR2\WindowsAzure\Services\Table\Models
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
 
namespace PEAR2\WindowsAzure\Services\Table\Models;

/**
 * Holds optional parameters for queryEntities API
 *
 * @category  Microsoft
 * @package   PEAR2\WindowsAzure\Services\Table\Models
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
class QueryEntitiesOptions extends TableServiceOptions
{
    /**
     * @var Query
     */
    private $_query;
    
    /**
     * @var string
     */
    private $_nextPartitionKey;
    
    /**
     * @var string
     */
    private $_nextRowKey;
    
    /**
     * Gets query.
     * 
     * @return Query
     */
    public function getQuery()
    {
        return $this->_query;
    }
    
    /**
     * Sets query.
     * 
     * @param string $query The query instance.
     * 
     * @return none
     */
    public function setQuery($query)
    {
        $this->_query = $query;
    }
    
    /**
     * Gets entity next partition key.
     *
     * @return string
     */
    public function getNextPartitionKey()
    {
        return $this->_nextPartitionKey;
    }

    /**
     * Sets entity next partition key.
     *
     * @param string $nextPartitionKey The entity next partition key value.
     *
     * @return none
     */
    public function setNextPartitionKey($nextPartitionKey)
    {
        $this->_nextPartitionKey = $nextPartitionKey;
    }
    
    /**
     * Gets entity next row key.
     *
     * @return string
     */
    public function getNextRowKey()
    {
        return $this->_nextRowKey;
    }

    /**
     * Sets entity next row key.
     *
     * @param string $nextRowKey The entity next row key value.
     *
     * @return none
     */
    public function setNextRowKey($nextRowKey)
    {
        $this->_nextRowKey = $nextRowKey;
    }
}

?>
