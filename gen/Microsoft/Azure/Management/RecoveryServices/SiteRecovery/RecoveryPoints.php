<?php
namespace Microsoft\Azure\Management\RecoveryServices\SiteRecovery;
final class RecoveryPoints
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_Get_operation = $_client->createOperation('RecoveryPoints_Get');
        $this->_ListByReplicationProtectedItems_operation = $_client->createOperation('RecoveryPoints_ListByReplicationProtectedItems');
    }
    /**
     * Get the details of specified recovery point.
     * @param string $resourceName
     * @param string $resourceGroupName
     * @param string $fabricName
     * @param string $protectionContainerName
     * @param string $replicatedProtectedItemName
     * @param string $recoveryPointName
     * @return array
     */
    public function get(
        $resourceName,
        $resourceGroupName,
        $fabricName,
        $protectionContainerName,
        $replicatedProtectedItemName,
        $recoveryPointName
    )
    {
        return $this->_Get_operation->call([
            'resourceName' => $resourceName,
            'resourceGroupName' => $resourceGroupName,
            'fabricName' => $fabricName,
            'protectionContainerName' => $protectionContainerName,
            'replicatedProtectedItemName' => $replicatedProtectedItemName,
            'recoveryPointName' => $recoveryPointName
        ]);
    }
    /**
     * Lists the available recovery points for a replication protected item.
     * @param string $resourceName
     * @param string $resourceGroupName
     * @param string $fabricName
     * @param string $protectionContainerName
     * @param string $replicatedProtectedItemName
     * @return array
     */
    public function listByReplicationProtectedItems(
        $resourceName,
        $resourceGroupName,
        $fabricName,
        $protectionContainerName,
        $replicatedProtectedItemName
    )
    {
        return $this->_ListByReplicationProtectedItems_operation->call([
            'resourceName' => $resourceName,
            'resourceGroupName' => $resourceGroupName,
            'fabricName' => $fabricName,
            'protectionContainerName' => $protectionContainerName,
            'replicatedProtectedItemName' => $replicatedProtectedItemName
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Get_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListByReplicationProtectedItems_operation;
}
