<?php
namespace Microsoft\Azure\Management\Sql;
final class ReplicationLinks
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_Delete_operation = $_client->createOperation('ReplicationLinks_Delete');
        $this->_Get_operation = $_client->createOperation('ReplicationLinks_Get');
        $this->_Failover_operation = $_client->createOperation('ReplicationLinks_Failover');
        $this->_FailoverAllowDataLoss_operation = $_client->createOperation('ReplicationLinks_FailoverAllowDataLoss');
        $this->_ListByDatabase_operation = $_client->createOperation('ReplicationLinks_ListByDatabase');
    }
    /**
     * Deletes a database replication link. Cannot be done during failover.
     * @param string $resourceGroupName
     * @param string $serverName
     * @param string $databaseName
     * @param string $linkId
     */
    public function delete(
        $resourceGroupName,
        $serverName,
        $databaseName,
        $linkId
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serverName' => $serverName,
            'databaseName' => $databaseName,
            'linkId' => $linkId
        ]);
    }
    /**
     * Gets a database replication link.
     * @param string $resourceGroupName
     * @param string $serverName
     * @param string $databaseName
     * @param string $linkId
     * @return array
     */
    public function get(
        $resourceGroupName,
        $serverName,
        $databaseName,
        $linkId
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serverName' => $serverName,
            'databaseName' => $databaseName,
            'linkId' => $linkId
        ]);
    }
    /**
     * Sets which replica database is primary by failing over from the current primary replica database.
     * @param string $resourceGroupName
     * @param string $serverName
     * @param string $databaseName
     * @param string $linkId
     */
    public function failover(
        $resourceGroupName,
        $serverName,
        $databaseName,
        $linkId
    )
    {
        return $this->_Failover_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serverName' => $serverName,
            'databaseName' => $databaseName,
            'linkId' => $linkId
        ]);
    }
    /**
     * Sets which replica database is primary by failing over from the current primary replica database. This operation might result in data loss.
     * @param string $resourceGroupName
     * @param string $serverName
     * @param string $databaseName
     * @param string $linkId
     */
    public function failoverAllowDataLoss(
        $resourceGroupName,
        $serverName,
        $databaseName,
        $linkId
    )
    {
        return $this->_FailoverAllowDataLoss_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serverName' => $serverName,
            'databaseName' => $databaseName,
            'linkId' => $linkId
        ]);
    }
    /**
     * Lists a database's replication links.
     * @param string $resourceGroupName
     * @param string $serverName
     * @param string $databaseName
     * @return array
     */
    public function listByDatabase(
        $resourceGroupName,
        $serverName,
        $databaseName
    )
    {
        return $this->_ListByDatabase_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serverName' => $serverName,
            'databaseName' => $databaseName
        ]);
    }
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
    private $_Failover_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_FailoverAllowDataLoss_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListByDatabase_operation;
}
