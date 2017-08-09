<?php
namespace Microsoft\Azure\Management\Sql;
final class SyncMembers
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_Get_operation = $_client->createOperation('SyncMembers_Get');
        $this->_CreateOrUpdate_operation = $_client->createOperation('SyncMembers_CreateOrUpdate');
        $this->_Delete_operation = $_client->createOperation('SyncMembers_Delete');
        $this->_Update_operation = $_client->createOperation('SyncMembers_Update');
        $this->_ListBySyncGroup_operation = $_client->createOperation('SyncMembers_ListBySyncGroup');
        $this->_ListMemberSchemas_operation = $_client->createOperation('SyncMembers_ListMemberSchemas');
        $this->_RefreshMemberSchema_operation = $_client->createOperation('SyncMembers_RefreshMemberSchema');
    }
    /**
     * Gets a sync member.
     * @param string $resourceGroupName
     * @param string $serverName
     * @param string $databaseName
     * @param string $syncGroupName
     * @param string $syncMemberName
     * @return array
     */
    public function get(
        $resourceGroupName,
        $serverName,
        $databaseName,
        $syncGroupName,
        $syncMemberName
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serverName' => $serverName,
            'databaseName' => $databaseName,
            'syncGroupName' => $syncGroupName,
            'syncMemberName' => $syncMemberName
        ]);
    }
    /**
     * Creates or updates a sync member.
     * @param string $resourceGroupName
     * @param string $serverName
     * @param string $databaseName
     * @param string $syncGroupName
     * @param string $syncMemberName
     * @param array $parameters
     * @return array
     */
    public function createOrUpdate(
        $resourceGroupName,
        $serverName,
        $databaseName,
        $syncGroupName,
        $syncMemberName,
        array $parameters
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serverName' => $serverName,
            'databaseName' => $databaseName,
            'syncGroupName' => $syncGroupName,
            'syncMemberName' => $syncMemberName,
            'parameters' => $parameters
        ]);
    }
    /**
     * Deletes a sync member.
     * @param string $resourceGroupName
     * @param string $serverName
     * @param string $databaseName
     * @param string $syncGroupName
     * @param string $syncMemberName
     */
    public function delete(
        $resourceGroupName,
        $serverName,
        $databaseName,
        $syncGroupName,
        $syncMemberName
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serverName' => $serverName,
            'databaseName' => $databaseName,
            'syncGroupName' => $syncGroupName,
            'syncMemberName' => $syncMemberName
        ]);
    }
    /**
     * Updates an existing sync member.
     * @param string $resourceGroupName
     * @param string $serverName
     * @param string $databaseName
     * @param string $syncGroupName
     * @param string $syncMemberName
     * @param array $parameters
     * @return array
     */
    public function update(
        $resourceGroupName,
        $serverName,
        $databaseName,
        $syncGroupName,
        $syncMemberName,
        array $parameters
    )
    {
        return $this->_Update_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serverName' => $serverName,
            'databaseName' => $databaseName,
            'syncGroupName' => $syncGroupName,
            'syncMemberName' => $syncMemberName,
            'parameters' => $parameters
        ]);
    }
    /**
     * Lists sync members in the given sync group.
     * @param string $resourceGroupName
     * @param string $serverName
     * @param string $databaseName
     * @param string $syncGroupName
     * @return array
     */
    public function listBySyncGroup(
        $resourceGroupName,
        $serverName,
        $databaseName,
        $syncGroupName
    )
    {
        return $this->_ListBySyncGroup_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serverName' => $serverName,
            'databaseName' => $databaseName,
            'syncGroupName' => $syncGroupName
        ]);
    }
    /**
     * Gets a sync member database schema.
     * @param string $resourceGroupName
     * @param string $serverName
     * @param string $databaseName
     * @param string $syncGroupName
     * @param string $syncMemberName
     * @return array
     */
    public function listMemberSchemas(
        $resourceGroupName,
        $serverName,
        $databaseName,
        $syncGroupName,
        $syncMemberName
    )
    {
        return $this->_ListMemberSchemas_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serverName' => $serverName,
            'databaseName' => $databaseName,
            'syncGroupName' => $syncGroupName,
            'syncMemberName' => $syncMemberName
        ]);
    }
    /**
     * Refreshes a sync member database schema.
     * @param string $resourceGroupName
     * @param string $serverName
     * @param string $databaseName
     * @param string $syncGroupName
     * @param string $syncMemberName
     */
    public function refreshMemberSchema(
        $resourceGroupName,
        $serverName,
        $databaseName,
        $syncGroupName,
        $syncMemberName
    )
    {
        return $this->_RefreshMemberSchema_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serverName' => $serverName,
            'databaseName' => $databaseName,
            'syncGroupName' => $syncGroupName,
            'syncMemberName' => $syncMemberName
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
    private $_ListBySyncGroup_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListMemberSchemas_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_RefreshMemberSchema_operation;
}
