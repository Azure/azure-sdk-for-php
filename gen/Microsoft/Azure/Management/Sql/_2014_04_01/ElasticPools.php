<?php
namespace Microsoft\Azure\Management\Sql\_2014_04_01;
final class ElasticPools
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_ListMetrics_operation = $_client->createOperation('ElasticPools_ListMetrics');
        $this->_ListMetricDefinitions_operation = $_client->createOperation('ElasticPools_ListMetricDefinitions');
        $this->_CreateOrUpdate_operation = $_client->createOperation('ElasticPools_CreateOrUpdate');
        $this->_Update_operation = $_client->createOperation('ElasticPools_Update');
        $this->_Delete_operation = $_client->createOperation('ElasticPools_Delete');
        $this->_Get_operation = $_client->createOperation('ElasticPools_Get');
        $this->_ListByServer_operation = $_client->createOperation('ElasticPools_ListByServer');
    }
    /**
     * Returns elastic pool  metrics.
     * @param string $resourceGroupName
     * @param string $serverName
     * @param string $elasticPoolName
     * @param string $_filter
     * @return array
     */
    public function listMetrics(
        $resourceGroupName,
        $serverName,
        $elasticPoolName,
        $_filter
    )
    {
        return $this->_ListMetrics_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serverName' => $serverName,
            'elasticPoolName' => $elasticPoolName,
            '$filter' => $_filter
        ]);
    }
    /**
     * Returns elastic pool metric definitions.
     * @param string $resourceGroupName
     * @param string $serverName
     * @param string $elasticPoolName
     * @return array
     */
    public function listMetricDefinitions(
        $resourceGroupName,
        $serverName,
        $elasticPoolName
    )
    {
        return $this->_ListMetricDefinitions_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serverName' => $serverName,
            'elasticPoolName' => $elasticPoolName
        ]);
    }
    /**
     * Creates a new elastic pool or updates an existing elastic pool.
     * @param string $resourceGroupName
     * @param string $serverName
     * @param string $elasticPoolName
     * @param array $parameters
     * @return array
     */
    public function createOrUpdate(
        $resourceGroupName,
        $serverName,
        $elasticPoolName,
        array $parameters
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serverName' => $serverName,
            'elasticPoolName' => $elasticPoolName,
            'parameters' => $parameters
        ]);
    }
    /**
     * Updates an existing elastic pool.
     * @param string $resourceGroupName
     * @param string $serverName
     * @param string $elasticPoolName
     * @param array $parameters
     * @return array
     */
    public function update(
        $resourceGroupName,
        $serverName,
        $elasticPoolName,
        array $parameters
    )
    {
        return $this->_Update_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serverName' => $serverName,
            'elasticPoolName' => $elasticPoolName,
            'parameters' => $parameters
        ]);
    }
    /**
     * Deletes the elastic pool.
     * @param string $resourceGroupName
     * @param string $serverName
     * @param string $elasticPoolName
     */
    public function delete(
        $resourceGroupName,
        $serverName,
        $elasticPoolName
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serverName' => $serverName,
            'elasticPoolName' => $elasticPoolName
        ]);
    }
    /**
     * Gets an elastic pool.
     * @param string $resourceGroupName
     * @param string $serverName
     * @param string $elasticPoolName
     * @return array
     */
    public function get(
        $resourceGroupName,
        $serverName,
        $elasticPoolName
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serverName' => $serverName,
            'elasticPoolName' => $elasticPoolName
        ]);
    }
    /**
     * Returns a list of elastic pools in a server.
     * @param string $resourceGroupName
     * @param string $serverName
     * @return array
     */
    public function listByServer(
        $resourceGroupName,
        $serverName
    )
    {
        return $this->_ListByServer_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serverName' => $serverName
        ]);
    }
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
}
