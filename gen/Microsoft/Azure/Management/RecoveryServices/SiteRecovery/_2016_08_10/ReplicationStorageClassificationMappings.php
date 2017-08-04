<?php
namespace Microsoft\Azure\Management\RecoveryServices\SiteRecovery\_2016_08_10;
final class ReplicationStorageClassificationMappings
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_Get_operation = $_client->createOperation('ReplicationStorageClassificationMappings_Get');
        $this->_Create_operation = $_client->createOperation('ReplicationStorageClassificationMappings_Create');
        $this->_Delete_operation = $_client->createOperation('ReplicationStorageClassificationMappings_Delete');
        $this->_ListByReplicationStorageClassifications_operation = $_client->createOperation('ReplicationStorageClassificationMappings_ListByReplicationStorageClassifications');
        $this->_List_operation = $_client->createOperation('ReplicationStorageClassificationMappings_List');
    }
    /**
     * Gets the details of the specified storage classification mapping.
     * @param string $resourceName
     * @param string $resourceGroupName
     * @param string $fabricName
     * @param string $storageClassificationName
     * @param string $storageClassificationMappingName
     * @return array
     */
    public function get(
        $resourceName,
        $resourceGroupName,
        $fabricName,
        $storageClassificationName,
        $storageClassificationMappingName
    )
    {
        return $this->_Get_operation->call([
            'resourceName' => $resourceName,
            'resourceGroupName' => $resourceGroupName,
            'fabricName' => $fabricName,
            'storageClassificationName' => $storageClassificationName,
            'storageClassificationMappingName' => $storageClassificationMappingName
        ]);
    }
    /**
     * The operation to create a storage classification mapping.
     * @param string $resourceName
     * @param string $resourceGroupName
     * @param string $fabricName
     * @param string $storageClassificationName
     * @param string $storageClassificationMappingName
     * @param array $pairingInput
     * @return array
     */
    public function create(
        $resourceName,
        $resourceGroupName,
        $fabricName,
        $storageClassificationName,
        $storageClassificationMappingName,
        array $pairingInput
    )
    {
        return $this->_Create_operation->call([
            'resourceName' => $resourceName,
            'resourceGroupName' => $resourceGroupName,
            'fabricName' => $fabricName,
            'storageClassificationName' => $storageClassificationName,
            'storageClassificationMappingName' => $storageClassificationMappingName,
            'pairingInput' => $pairingInput
        ]);
    }
    /**
     * The operation to delete a storage classification mapping.
     * @param string $resourceName
     * @param string $resourceGroupName
     * @param string $fabricName
     * @param string $storageClassificationName
     * @param string $storageClassificationMappingName
     */
    public function delete(
        $resourceName,
        $resourceGroupName,
        $fabricName,
        $storageClassificationName,
        $storageClassificationMappingName
    )
    {
        return $this->_Delete_operation->call([
            'resourceName' => $resourceName,
            'resourceGroupName' => $resourceGroupName,
            'fabricName' => $fabricName,
            'storageClassificationName' => $storageClassificationName,
            'storageClassificationMappingName' => $storageClassificationMappingName
        ]);
    }
    /**
     * Lists the storage classification mappings for the fabric.
     * @param string $resourceName
     * @param string $resourceGroupName
     * @param string $fabricName
     * @param string $storageClassificationName
     * @return array
     */
    public function listByReplicationStorageClassifications(
        $resourceName,
        $resourceGroupName,
        $fabricName,
        $storageClassificationName
    )
    {
        return $this->_ListByReplicationStorageClassifications_operation->call([
            'resourceName' => $resourceName,
            'resourceGroupName' => $resourceGroupName,
            'fabricName' => $fabricName,
            'storageClassificationName' => $storageClassificationName
        ]);
    }
    /**
     * Lists the storage classification mappings in the vault.
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
    private $_ListByReplicationStorageClassifications_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_List_operation;
}
