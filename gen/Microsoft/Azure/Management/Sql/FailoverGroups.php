<?php
namespace Microsoft\Azure\Management\Sql;
final class FailoverGroups
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_Get_operation = $_client->createOperation('FailoverGroups_Get');
        $this->_CreateOrUpdate_operation = $_client->createOperation('FailoverGroups_CreateOrUpdate');
        $this->_Delete_operation = $_client->createOperation('FailoverGroups_Delete');
        $this->_Update_operation = $_client->createOperation('FailoverGroups_Update');
        $this->_ListByServer_operation = $_client->createOperation('FailoverGroups_ListByServer');
        $this->_Failover_operation = $_client->createOperation('FailoverGroups_Failover');
        $this->_ForceFailoverAllowDataLoss_operation = $_client->createOperation('FailoverGroups_ForceFailoverAllowDataLoss');
    }
    /**
     * Gets a failover group.
     * @param string $resourceGroupName
     * @param string $serverName
     * @param string $failoverGroupName
     * @return array
     */
    public function get(
        $resourceGroupName,
        $serverName,
        $failoverGroupName
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serverName' => $serverName,
            'failoverGroupName' => $failoverGroupName
        ]);
    }
    /**
     * Creates or updates a failover group.
     * @param string $resourceGroupName
     * @param string $serverName
     * @param string $failoverGroupName
     * @param array $parameters
     * @return array
     */
    public function createOrUpdate(
        $resourceGroupName,
        $serverName,
        $failoverGroupName,
        array $parameters
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serverName' => $serverName,
            'failoverGroupName' => $failoverGroupName,
            'parameters' => $parameters
        ]);
    }
    /**
     * Deletes a failover group.
     * @param string $resourceGroupName
     * @param string $serverName
     * @param string $failoverGroupName
     */
    public function delete(
        $resourceGroupName,
        $serverName,
        $failoverGroupName
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serverName' => $serverName,
            'failoverGroupName' => $failoverGroupName
        ]);
    }
    /**
     * Updates a failover group.
     * @param string $resourceGroupName
     * @param string $serverName
     * @param string $failoverGroupName
     * @param array $parameters
     * @return array
     */
    public function update(
        $resourceGroupName,
        $serverName,
        $failoverGroupName,
        array $parameters
    )
    {
        return $this->_Update_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serverName' => $serverName,
            'failoverGroupName' => $failoverGroupName,
            'parameters' => $parameters
        ]);
    }
    /**
     * Lists the failover groups in a server.
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
     * Fails over from the current primary server to this server.
     * @param string $resourceGroupName
     * @param string $serverName
     * @param string $failoverGroupName
     * @return array
     */
    public function failover(
        $resourceGroupName,
        $serverName,
        $failoverGroupName
    )
    {
        return $this->_Failover_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serverName' => $serverName,
            'failoverGroupName' => $failoverGroupName
        ]);
    }
    /**
     * Fails over from the current primary server to this server. This operation might result in data loss.
     * @param string $resourceGroupName
     * @param string $serverName
     * @param string $failoverGroupName
     * @return array
     */
    public function forceFailoverAllowDataLoss(
        $resourceGroupName,
        $serverName,
        $failoverGroupName
    )
    {
        return $this->_ForceFailoverAllowDataLoss_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serverName' => $serverName,
            'failoverGroupName' => $failoverGroupName
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Get_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_CreateOrUpdate_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Delete_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Update_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListByServer_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Failover_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ForceFailoverAllowDataLoss_operation;
}
