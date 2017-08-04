<?php
namespace Microsoft\Azure\Management\RecoveryServices\SiteRecovery\_2016_08_10;
final class ReplicationvCenters
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_Get_operation = $_client->createOperation('ReplicationvCenters_Get');
        $this->_Create_operation = $_client->createOperation('ReplicationvCenters_Create');
        $this->_Delete_operation = $_client->createOperation('ReplicationvCenters_Delete');
        $this->_Update_operation = $_client->createOperation('ReplicationvCenters_Update');
        $this->_ListByReplicationFabrics_operation = $_client->createOperation('ReplicationvCenters_ListByReplicationFabrics');
        $this->_List_operation = $_client->createOperation('ReplicationvCenters_List');
    }
    /**
     * Gets the details of a registered vCenter server(Add vCenter server.)
     * @param string $resourceName
     * @param string $resourceGroupName
     * @param string $fabricName
     * @param string $vCenterName
     * @return array
     */
    public function get(
        $resourceName,
        $resourceGroupName,
        $fabricName,
        $vCenterName
    )
    {
        return $this->_Get_operation->call([
            'resourceName' => $resourceName,
            'resourceGroupName' => $resourceGroupName,
            'fabricName' => $fabricName,
            'vCenterName' => $vCenterName
        ]);
    }
    /**
     * The operation to create a vCenter object..
     * @param string $resourceName
     * @param string $resourceGroupName
     * @param string $fabricName
     * @param string $vCenterName
     * @param array $addVCenterRequest
     * @return array
     */
    public function create(
        $resourceName,
        $resourceGroupName,
        $fabricName,
        $vCenterName,
        array $addVCenterRequest
    )
    {
        return $this->_Create_operation->call([
            'resourceName' => $resourceName,
            'resourceGroupName' => $resourceGroupName,
            'fabricName' => $fabricName,
            'vCenterName' => $vCenterName,
            'addVCenterRequest' => $addVCenterRequest
        ]);
    }
    /**
     * The operation to remove(unregister) a registered vCenter server from the vault.
     * @param string $resourceName
     * @param string $resourceGroupName
     * @param string $fabricName
     * @param string $vCenterName
     */
    public function delete(
        $resourceName,
        $resourceGroupName,
        $fabricName,
        $vCenterName
    )
    {
        return $this->_Delete_operation->call([
            'resourceName' => $resourceName,
            'resourceGroupName' => $resourceGroupName,
            'fabricName' => $fabricName,
            'vCenterName' => $vCenterName
        ]);
    }
    /**
     * The operation to update a registered vCenter.
     * @param string $resourceName
     * @param string $resourceGroupName
     * @param string $fabricName
     * @param string $vCenterName
     * @param array $updateVCenterRequest
     * @return array
     */
    public function update(
        $resourceName,
        $resourceGroupName,
        $fabricName,
        $vCenterName,
        array $updateVCenterRequest
    )
    {
        return $this->_Update_operation->call([
            'resourceName' => $resourceName,
            'resourceGroupName' => $resourceGroupName,
            'fabricName' => $fabricName,
            'vCenterName' => $vCenterName,
            'updateVCenterRequest' => $updateVCenterRequest
        ]);
    }
    /**
     * Lists the vCenter servers registered in a fabric.
     * @param string $resourceName
     * @param string $resourceGroupName
     * @param string $fabricName
     * @return array
     */
    public function listByReplicationFabrics(
        $resourceName,
        $resourceGroupName,
        $fabricName
    )
    {
        return $this->_ListByReplicationFabrics_operation->call([
            'resourceName' => $resourceName,
            'resourceGroupName' => $resourceGroupName,
            'fabricName' => $fabricName
        ]);
    }
    /**
     * Lists the vCenter servers registered in the vault.
     * @param string $resourceName
     * @param string $resourceGroupName
     * @return array
     */
    public function list_(
        $resourceName,
        $resourceGroupName
    )
    {
        return $this->_List_operation->call([
            'resourceName' => $resourceName,
            'resourceGroupName' => $resourceGroupName
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Get_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Create_operation;
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
    private $_ListByReplicationFabrics_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_List_operation;
}
