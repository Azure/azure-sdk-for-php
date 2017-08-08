<?php
namespace Microsoft\Azure\Management\Sql\_2014_04_01;
final class QueryStatistics
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_ListByQuery_operation = $_client->createOperation('QueryStatistics_ListByQuery');
    }
    /**
     * Lists a query's statistics.
     * @param string $resourceGroupName
     * @param string $serverName
     * @param string $databaseName
     * @param string $queryId
     * @return array
     */
    public function listByQuery(
        $resourceGroupName,
        $serverName,
        $databaseName,
        $queryId
    )
    {
        return $this->_ListByQuery_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serverName' => $serverName,
            'databaseName' => $databaseName,
            'queryId' => $queryId
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListByQuery_operation;
}
