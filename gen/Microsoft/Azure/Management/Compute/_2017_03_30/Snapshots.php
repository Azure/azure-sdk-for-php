<?php
namespace Microsoft\Azure\Management\Compute\_2017_03_30;
final class Snapshots
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_CreateOrUpdate_operation = $_client->createOperation('Snapshots_CreateOrUpdate');
        $this->_Update_operation = $_client->createOperation('Snapshots_Update');
        $this->_Get_operation = $_client->createOperation('Snapshots_Get');
        $this->_Delete_operation = $_client->createOperation('Snapshots_Delete');
        $this->_ListByResourceGroup_operation = $_client->createOperation('Snapshots_ListByResourceGroup');
        $this->_List_operation = $_client->createOperation('Snapshots_List');
        $this->_GrantAccess_operation = $_client->createOperation('Snapshots_GrantAccess');
        $this->_RevokeAccess_operation = $_client->createOperation('Snapshots_RevokeAccess');
    }
    /**
     * Creates or updates a snapshot.
     * @param string $resourceGroupName
     * @param string $snapshotName
     * @param array $snapshot
     * @return array
     */
    public function createOrUpdate(
        $resourceGroupName,
        $snapshotName,
        array $snapshot
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'snapshotName' => $snapshotName,
            'snapshot' => $snapshot
        ]);
    }
    /**
     * Updates (patches) a snapshot.
     * @param string $resourceGroupName
     * @param string $snapshotName
     * @param array $snapshot
     * @return array
     */
    public function update(
        $resourceGroupName,
        $snapshotName,
        array $snapshot
    )
    {
        return $this->_Update_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'snapshotName' => $snapshotName,
            'snapshot' => $snapshot
        ]);
    }
    /**
     * Gets information about a snapshot.
     * @param string $resourceGroupName
     * @param string $snapshotName
     * @return array
     */
    public function get(
        $resourceGroupName,
        $snapshotName
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'snapshotName' => $snapshotName
        ]);
    }
    /**
     * Deletes a snapshot.
     * @param string $resourceGroupName
     * @param string $snapshotName
     * @return array
     */
    public function delete(
        $resourceGroupName,
        $snapshotName
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'snapshotName' => $snapshotName
        ]);
    }
    /**
     * Lists snapshots under a resource group.
     * @param string $resourceGroupName
     * @return array
     */
    public function listByResourceGroup($resourceGroupName)
    {
        return $this->_ListByResourceGroup_operation->call(['resourceGroupName' => $resourceGroupName]);
    }
    /**
     * Lists snapshots under a subscription.
     * @return array
     */
    public function list_()
    {
        return $this->_List_operation->call([]);
    }
    /**
     * Grants access to a snapshot.
     * @param string $resourceGroupName
     * @param string $snapshotName
     * @param array $grantAccessData
     * @return array
     */
    public function grantAccess(
        $resourceGroupName,
        $snapshotName,
        array $grantAccessData
    )
    {
        return $this->_GrantAccess_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'snapshotName' => $snapshotName,
            'grantAccessData' => $grantAccessData
        ]);
    }
    /**
     * Revokes access to a snapshot.
     * @param string $resourceGroupName
     * @param string $snapshotName
     * @return array
     */
    public function revokeAccess(
        $resourceGroupName,
        $snapshotName
    )
    {
        return $this->_RevokeAccess_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'snapshotName' => $snapshotName
        ]);
    }
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
    private $_Get_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Delete_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListByResourceGroup_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_List_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_GrantAccess_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_RevokeAccess_operation;
}
