<?php
namespace Microsoft\Azure\Management\RecoveryServices\SiteRecovery\_2016_08_10;
final class ReplicationStorageClassifications
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_Get_operation = $_client->createOperation('ReplicationStorageClassifications_Get');
        $this->_ListByReplicationFabrics_operation = $_client->createOperation('ReplicationStorageClassifications_ListByReplicationFabrics');
        $this->_List_operation = $_client->createOperation('ReplicationStorageClassifications_List');
    }
    /**
     * Gets the details of the specified storage classification.
     * @param string $resourceName
     * @param string $resourceGroupName
     * @param string $fabricName
     * @param string $storageClassificationName
     * @return array
     */
    public function get(
        $resourceName,
        $resourceGroupName,
        $fabricName,
        $storageClassificationName
    )
    {
        return $this->_Get_operation->call([
            'resourceName' => $resourceName,
            'resourceGroupName' => $resourceGroupName,
            'fabricName' => $fabricName,
            'storageClassificationName' => $storageClassificationName
        ]);
    }
    /**
     * Lists the storage classifications available in the specified fabric.
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
     * Lists the storage classifications in the vault.
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
    private $_ListByReplicationFabrics_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_List_operation;
}
