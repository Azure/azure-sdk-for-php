<?php
namespace Microsoft\Azure\Management\Sql;
final class Databases
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_Import_operation = $_client->createOperation('Databases_Import');
        $this->_CreateImportOperation_operation = $_client->createOperation('Databases_CreateImportOperation');
        $this->_Export_operation = $_client->createOperation('Databases_Export');
        $this->_ListMetrics_operation = $_client->createOperation('Databases_ListMetrics');
        $this->_ListMetricDefinitions_operation = $_client->createOperation('Databases_ListMetricDefinitions');
        $this->_Pause_operation = $_client->createOperation('Databases_Pause');
        $this->_Resume_operation = $_client->createOperation('Databases_Resume');
        $this->_CreateOrUpdate_operation = $_client->createOperation('Databases_CreateOrUpdate');
        $this->_Update_operation = $_client->createOperation('Databases_Update');
        $this->_Delete_operation = $_client->createOperation('Databases_Delete');
        $this->_Get_operation = $_client->createOperation('Databases_Get');
        $this->_ListByServer_operation = $_client->createOperation('Databases_ListByServer');
        $this->_GetByElasticPool_operation = $_client->createOperation('Databases_GetByElasticPool');
        $this->_ListByElasticPool_operation = $_client->createOperation('Databases_ListByElasticPool');
        $this->_GetByRecommendedElasticPool_operation = $_client->createOperation('Databases_GetByRecommendedElasticPool');
        $this->_ListByRecommendedElasticPool_operation = $_client->createOperation('Databases_ListByRecommendedElasticPool');
    }
    /**
     * Imports a bacpac into a new database.
     * @param string $resourceGroupName
     * @param string $serverName
     * @param array $parameters
     * @return array
     */
    public function import(
        $resourceGroupName,
        $serverName,
        array $parameters
    )
    {
        return $this->_Import_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serverName' => $serverName,
            'parameters' => $parameters
        ]);
    }
    /**
     * Creates an import operation that imports a bacpac into an existing database. The existing database must be empty.
     * @param string $resourceGroupName
     * @param string $serverName
     * @param string $databaseName
     * @param array $parameters
     * @return array
     */
    public function createImportOperation(
        $resourceGroupName,
        $serverName,
        $databaseName,
        array $parameters
    )
    {
        return $this->_CreateImportOperation_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serverName' => $serverName,
            'databaseName' => $databaseName,
            'parameters' => $parameters
        ]);
    }
    /**
     * Exports a database to a bacpac.
     * @param string $resourceGroupName
     * @param string $serverName
     * @param string $databaseName
     * @param array $parameters
     * @return array
     */
    public function export(
        $resourceGroupName,
        $serverName,
        $databaseName,
        array $parameters
    )
    {
        return $this->_Export_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serverName' => $serverName,
            'databaseName' => $databaseName,
            'parameters' => $parameters
        ]);
    }
    /**
     * Returns database metrics.
     * @param string $resourceGroupName
     * @param string $serverName
     * @param string $databaseName
     * @param string $_filter
     * @return array
     */
    public function listMetrics(
        $resourceGroupName,
        $serverName,
        $databaseName,
        $_filter
    )
    {
        return $this->_ListMetrics_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serverName' => $serverName,
            'databaseName' => $databaseName,
            '$filter' => $_filter
        ]);
    }
    /**
     * Returns database metric definitions.
     * @param string $resourceGroupName
     * @param string $serverName
     * @param string $databaseName
     * @return array
     */
    public function listMetricDefinitions(
        $resourceGroupName,
        $serverName,
        $databaseName
    )
    {
        return $this->_ListMetricDefinitions_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serverName' => $serverName,
            'databaseName' => $databaseName
        ]);
    }
    /**
     * Pauses a data warehouse.
     * @param string $resourceGroupName
     * @param string $serverName
     * @param string $databaseName
     */
    public function pause(
        $resourceGroupName,
        $serverName,
        $databaseName
    )
    {
        return $this->_Pause_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serverName' => $serverName,
            'databaseName' => $databaseName
        ]);
    }
    /**
     * Resumes a data warehouse.
     * @param string $resourceGroupName
     * @param string $serverName
     * @param string $databaseName
     */
    public function resume(
        $resourceGroupName,
        $serverName,
        $databaseName
    )
    {
        return $this->_Resume_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serverName' => $serverName,
            'databaseName' => $databaseName
        ]);
    }
    /**
     * Creates a new database or updates an existing database.
     * @param string $resourceGroupName
     * @param string $serverName
     * @param string $databaseName
     * @param array $parameters
     * @return array
     */
    public function createOrUpdate(
        $resourceGroupName,
        $serverName,
        $databaseName,
        array $parameters
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serverName' => $serverName,
            'databaseName' => $databaseName,
            'parameters' => $parameters
        ]);
    }
    /**
     * Updates an existing database.
     * @param string $resourceGroupName
     * @param string $serverName
     * @param string $databaseName
     * @param array $parameters
     * @return array
     */
    public function update(
        $resourceGroupName,
        $serverName,
        $databaseName,
        array $parameters
    )
    {
        return $this->_Update_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serverName' => $serverName,
            'databaseName' => $databaseName,
            'parameters' => $parameters
        ]);
    }
    /**
     * Deletes a database.
     * @param string $resourceGroupName
     * @param string $serverName
     * @param string $databaseName
     */
    public function delete(
        $resourceGroupName,
        $serverName,
        $databaseName
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serverName' => $serverName,
            'databaseName' => $databaseName
        ]);
    }
    /**
     * Gets a database.
     * @param string $resourceGroupName
     * @param string $serverName
     * @param string $databaseName
     * @param string $_expand
     * @return array
     */
    public function get(
        $resourceGroupName,
        $serverName,
        $databaseName,
        $_expand
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serverName' => $serverName,
            'databaseName' => $databaseName,
            '$expand' => $_expand
        ]);
    }
    /**
     * Returns a list of databases in a server.
     * @param string $resourceGroupName
     * @param string $serverName
     * @param string $_expand
     * @param string $_filter
     * @return array
     */
    public function listByServer(
        $resourceGroupName,
        $serverName,
        $_expand,
        $_filter
    )
    {
        return $this->_ListByServer_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serverName' => $serverName,
            '$expand' => $_expand,
            '$filter' => $_filter
        ]);
    }
    /**
     * Gets a database inside of an elastic pool.
     * @param string $resourceGroupName
     * @param string $serverName
     * @param string $elasticPoolName
     * @param string $databaseName
     * @return array
     */
    public function getByElasticPool(
        $resourceGroupName,
        $serverName,
        $elasticPoolName,
        $databaseName
    )
    {
        return $this->_GetByElasticPool_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serverName' => $serverName,
            'elasticPoolName' => $elasticPoolName,
            'databaseName' => $databaseName
        ]);
    }
    /**
     * Returns a list of databases in an elastic pool.
     * @param string $resourceGroupName
     * @param string $serverName
     * @param string $elasticPoolName
     * @return array
     */
    public function listByElasticPool(
        $resourceGroupName,
        $serverName,
        $elasticPoolName
    )
    {
        return $this->_ListByElasticPool_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serverName' => $serverName,
            'elasticPoolName' => $elasticPoolName
        ]);
    }
    /**
     * Gets a database inside of a recommented elastic pool.
     * @param string $resourceGroupName
     * @param string $serverName
     * @param string $recommendedElasticPoolName
     * @param string $databaseName
     * @return array
     */
    public function getByRecommendedElasticPool(
        $resourceGroupName,
        $serverName,
        $recommendedElasticPoolName,
        $databaseName
    )
    {
        return $this->_GetByRecommendedElasticPool_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serverName' => $serverName,
            'recommendedElasticPoolName' => $recommendedElasticPoolName,
            'databaseName' => $databaseName
        ]);
    }
    /**
     * Returns a list of databases inside a recommented elastic pool.
     * @param string $resourceGroupName
     * @param string $serverName
     * @param string $recommendedElasticPoolName
     * @return array
     */
    public function listByRecommendedElasticPool(
        $resourceGroupName,
        $serverName,
        $recommendedElasticPoolName
    )
    {
        return $this->_ListByRecommendedElasticPool_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serverName' => $serverName,
            'recommendedElasticPoolName' => $recommendedElasticPoolName
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Import_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_CreateImportOperation_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Export_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListMetrics_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListMetricDefinitions_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Pause_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Resume_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_CreateOrUpdate_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Update_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Delete_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Get_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListByServer_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_GetByElasticPool_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListByElasticPool_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_GetByRecommendedElasticPool_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListByRecommendedElasticPool_operation;
}
