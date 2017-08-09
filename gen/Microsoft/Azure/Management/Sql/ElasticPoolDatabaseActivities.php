<?php
namespace Microsoft\Azure\Management\Sql;
final class ElasticPoolDatabaseActivities
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_ListByElasticPool_operation = $_client->createOperation('ElasticPoolDatabaseActivities_ListByElasticPool');
    }
    /**
     * Returns activity on databases inside of an elastic pool.
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
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListByElasticPool_operation;
}
