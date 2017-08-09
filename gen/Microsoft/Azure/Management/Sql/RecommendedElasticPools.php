<?php
namespace Microsoft\Azure\Management\Sql;
final class RecommendedElasticPools
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_Get_operation = $_client->createOperation('RecommendedElasticPools_Get');
        $this->_ListByServer_operation = $_client->createOperation('RecommendedElasticPools_ListByServer');
        $this->_ListMetrics_operation = $_client->createOperation('RecommendedElasticPools_ListMetrics');
    }
    /**
     * Gets a recommented elastic pool.
     * @param string $resourceGroupName
     * @param string $serverName
     * @param string $recommendedElasticPoolName
     * @return array
     */
    public function get(
        $resourceGroupName,
        $serverName,
        $recommendedElasticPoolName
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serverName' => $serverName,
            'recommendedElasticPoolName' => $recommendedElasticPoolName
        ]);
    }
    /**
     * Returns recommended elastic pools.
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
     * Returns recommented elastic pool metrics.
     * @param string $resourceGroupName
     * @param string $serverName
     * @param string $recommendedElasticPoolName
     * @return array
     */
    public function listMetrics(
        $resourceGroupName,
        $serverName,
        $recommendedElasticPoolName
    )
    {
        return $this->_ListMetrics_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serverName' => $serverName,
            'recommendedElasticPoolName' => $recommendedElasticPoolName
        ]);
    }
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
    private $_ListMetrics_operation;
}
