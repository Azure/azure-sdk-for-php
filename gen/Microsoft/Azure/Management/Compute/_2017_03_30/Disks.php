<?php
namespace Microsoft\Azure\Management\Compute\_2017_03_30;
final class Disks
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_CreateOrUpdate_operation = $_client->createOperation('Disks_CreateOrUpdate');
        $this->_Update_operation = $_client->createOperation('Disks_Update');
        $this->_Get_operation = $_client->createOperation('Disks_Get');
        $this->_Delete_operation = $_client->createOperation('Disks_Delete');
        $this->_ListByResourceGroup_operation = $_client->createOperation('Disks_ListByResourceGroup');
        $this->_List_operation = $_client->createOperation('Disks_List');
        $this->_GrantAccess_operation = $_client->createOperation('Disks_GrantAccess');
        $this->_RevokeAccess_operation = $_client->createOperation('Disks_RevokeAccess');
    }
    /**
     * Creates or updates a disk.
     * @param string $resourceGroupName
     * @param string $diskName
     * @param array $disk
     * @return array
     */
    public function createOrUpdate(
        $resourceGroupName,
        $diskName,
        array $disk
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'diskName' => $diskName,
            'disk' => $disk
        ]);
    }
    /**
     * Updates (patches) a disk.
     * @param string $resourceGroupName
     * @param string $diskName
     * @param array $disk
     * @return array
     */
    public function update(
        $resourceGroupName,
        $diskName,
        array $disk
    )
    {
        return $this->_Update_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'diskName' => $diskName,
            'disk' => $disk
        ]);
    }
    /**
     * Gets information about a disk.
     * @param string $resourceGroupName
     * @param string $diskName
     * @return array
     */
    public function get(
        $resourceGroupName,
        $diskName
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'diskName' => $diskName
        ]);
    }
    /**
     * Deletes a disk.
     * @param string $resourceGroupName
     * @param string $diskName
     * @return array
     */
    public function delete(
        $resourceGroupName,
        $diskName
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'diskName' => $diskName
        ]);
    }
    /**
     * Lists all the disks under a resource group.
     * @param string $resourceGroupName
     * @return array
     */
    public function listByResourceGroup($resourceGroupName)
    {
        return $this->_ListByResourceGroup_operation->call(['resourceGroupName' => $resourceGroupName]);
    }
    /**
     * Lists all the disks under a subscription.
     * @return array
     */
    public function list_()
    {
        return $this->_List_operation->call([]);
    }
    /**
     * Grants access to a disk.
     * @param string $resourceGroupName
     * @param string $diskName
     * @param array $grantAccessData
     * @return array
     */
    public function grantAccess(
        $resourceGroupName,
        $diskName,
        array $grantAccessData
    )
    {
        return $this->_GrantAccess_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'diskName' => $diskName,
            'grantAccessData' => $grantAccessData
        ]);
    }
    /**
     * Revokes access to a disk.
     * @param string $resourceGroupName
     * @param string $diskName
     * @return array
     */
    public function revokeAccess(
        $resourceGroupName,
        $diskName
    )
    {
        return $this->_RevokeAccess_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'diskName' => $diskName
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
