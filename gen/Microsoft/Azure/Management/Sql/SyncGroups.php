<?php
namespace Microsoft\Azure\Management\Sql;
final class SyncGroups
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_ListSyncDatabaseIds_operation = $_client->createOperation('SyncGroups_ListSyncDatabaseIds');
        $this->_RefreshHubSchema_operation = $_client->createOperation('SyncGroups_RefreshHubSchema');
        $this->_ListHubSchemas_operation = $_client->createOperation('SyncGroups_ListHubSchemas');
        $this->_ListLogs_operation = $_client->createOperation('SyncGroups_ListLogs');
        $this->_CancelSync_operation = $_client->createOperation('SyncGroups_CancelSync');
        $this->_TriggerSync_operation = $_client->createOperation('SyncGroups_TriggerSync');
        $this->_Get_operation = $_client->createOperation('SyncGroups_Get');
        $this->_CreateOrUpdate_operation = $_client->createOperation('SyncGroups_CreateOrUpdate');
        $this->_Delete_operation = $_client->createOperation('SyncGroups_Delete');
        $this->_Update_operation = $_client->createOperation('SyncGroups_Update');
        $this->_ListByDatabase_operation = $_client->createOperation('SyncGroups_ListByDatabase');
    }
    /**
     * Gets a collection of sync database ids.
     * @param string $locationName
     * @return array
     */
    public function listSyncDatabaseIds($locationName)
    {
        return $this->_ListSyncDatabaseIds_operation->call(['locationName' => $locationName]);
    }
    /**
     * Refreshes a hub database schema.
     * @param string $resourceGroupName
     * @param string $serverName
     * @param string $databaseName
     * @param string $syncGroupName
     */
    public function refreshHubSchema(
        $resourceGroupName,
        $serverName,
        $databaseName,
        $syncGroupName
    )
    {
        return $this->_RefreshHubSchema_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serverName' => $serverName,
            'databaseName' => $databaseName,
            'syncGroupName' => $syncGroupName
        ]);
    }
    /**
     * Gets a collection of hub database schemas.
     * @param string $resourceGroupName
     * @param string $serverName
     * @param string $databaseName
     * @param string $syncGroupName
     * @return array
     */
    public function listHubSchemas(
        $resourceGroupName,
        $serverName,
        $databaseName,
        $syncGroupName
    )
    {
        return $this->_ListHubSchemas_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serverName' => $serverName,
            'databaseName' => $databaseName,
            'syncGroupName' => $syncGroupName
        ]);
    }
    /**
     * Gets a collection of sync group logs.
     * @param string $resourceGroupName
     * @param string $serverName
     * @param string $databaseName
     * @param string $syncGroupName
     * @param string $startTime
     * @param string $endTime
     * @param string $type
     * @param string $continuationToken
     * @return array
     */
    public function listLogs(
        $resourceGroupName,
        $serverName,
        $databaseName,
        $syncGroupName,
        $startTime,
        $endTime,
        $type,
        $continuationToken
    )
    {
        return $this->_ListLogs_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serverName' => $serverName,
            'databaseName' => $databaseName,
            'syncGroupName' => $syncGroupName,
            'startTime' => $startTime,
            'endTime' => $endTime,
            'type' => $type,
            'continuationToken' => $continuationToken
        ]);
    }
    /**
     * Cancels a sync group synchronization.
     * @param string $resourceGroupName
     * @param string $serverName
     * @param string $databaseName
     * @param string $syncGroupName
     */
    public function cancelSync(
        $resourceGroupName,
        $serverName,
        $databaseName,
        $syncGroupName
    )
    {
        return $this->_CancelSync_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serverName' => $serverName,
            'databaseName' => $databaseName,
            'syncGroupName' => $syncGroupName
        ]);
    }
    /**
     * Triggers a sync group synchronization.
     * @param string $resourceGroupName
     * @param string $serverName
     * @param string $databaseName
     * @param string $syncGroupName
     */
    public function triggerSync(
        $resourceGroupName,
        $serverName,
        $databaseName,
        $syncGroupName
    )
    {
        return $this->_TriggerSync_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serverName' => $serverName,
            'databaseName' => $databaseName,
            'syncGroupName' => $syncGroupName
        ]);
    }
    /**
     * Gets a sync group.
     * @param string $resourceGroupName
     * @param string $serverName
     * @param string $databaseName
     * @param string $syncGroupName
     * @return array
     */
    public function get(
        $resourceGroupName,
        $serverName,
        $databaseName,
        $syncGroupName
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serverName' => $serverName,
            'databaseName' => $databaseName,
            'syncGroupName' => $syncGroupName
        ]);
    }
    /**
     * Creates or updates a sync group.
     * @param string $resourceGroupName
     * @param string $serverName
     * @param string $databaseName
     * @param string $syncGroupName
     * @param array $parameters
     * @return array
     */
    public function createOrUpdate(
        $resourceGroupName,
        $serverName,
        $databaseName,
        $syncGroupName,
        array $parameters
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serverName' => $serverName,
            'databaseName' => $databaseName,
            'syncGroupName' => $syncGroupName,
            'parameters' => $parameters
        ]);
    }
    /**
     * Deletes a sync group.
     * @param string $resourceGroupName
     * @param string $serverName
     * @param string $databaseName
     * @param string $syncGroupName
     */
    public function delete(
        $resourceGroupName,
        $serverName,
        $databaseName,
        $syncGroupName
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serverName' => $serverName,
            'databaseName' => $databaseName,
            'syncGroupName' => $syncGroupName
        ]);
    }
    /**
     * Updates a sync group.
     * @param string $resourceGroupName
     * @param string $serverName
     * @param string $databaseName
     * @param string $syncGroupName
     * @param array $parameters
     * @return array
     */
    public function update(
        $resourceGroupName,
        $serverName,
        $databaseName,
        $syncGroupName,
        array $parameters
    )
    {
        return $this->_Update_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serverName' => $serverName,
            'databaseName' => $databaseName,
            'syncGroupName' => $syncGroupName,
            'parameters' => $parameters
        ]);
    }
    /**
     * Lists sync groups under a hub database.
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
    private $_ListSyncDatabaseIds_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_RefreshHubSchema_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListHubSchemas_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListLogs_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_CancelSync_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_TriggerSync_operation;
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
    private $_ListByDatabase_operation;
}
