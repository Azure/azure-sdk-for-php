<?php
namespace Microsoft\Azure\Management\RecoveryServices\SiteRecovery;
final class ReplicationProtectedItems
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_ListByReplicationProtectionContainers_operation = $_client->createOperation('ReplicationProtectedItems_ListByReplicationProtectionContainers');
        $this->_List_operation = $_client->createOperation('ReplicationProtectedItems_List');
        $this->_ApplyRecoveryPoint_operation = $_client->createOperation('ReplicationProtectedItems_ApplyRecoveryPoint');
        $this->_RepairReplication_operation = $_client->createOperation('ReplicationProtectedItems_RepairReplication');
        $this->_UpdateMobilityService_operation = $_client->createOperation('ReplicationProtectedItems_UpdateMobilityService');
        $this->_Reprotect_operation = $_client->createOperation('ReplicationProtectedItems_Reprotect');
        $this->_FailoverCommit_operation = $_client->createOperation('ReplicationProtectedItems_FailoverCommit');
        $this->_TestFailoverCleanup_operation = $_client->createOperation('ReplicationProtectedItems_TestFailoverCleanup');
        $this->_TestFailover_operation = $_client->createOperation('ReplicationProtectedItems_TestFailover');
        $this->_UnplannedFailover_operation = $_client->createOperation('ReplicationProtectedItems_UnplannedFailover');
        $this->_PlannedFailover_operation = $_client->createOperation('ReplicationProtectedItems_PlannedFailover');
        $this->_Delete_operation = $_client->createOperation('ReplicationProtectedItems_Delete');
        $this->_Get_operation = $_client->createOperation('ReplicationProtectedItems_Get');
        $this->_Create_operation = $_client->createOperation('ReplicationProtectedItems_Create');
        $this->_Purge_operation = $_client->createOperation('ReplicationProtectedItems_Purge');
        $this->_Update_operation = $_client->createOperation('ReplicationProtectedItems_Update');
    }
    /**
     * Gets the list of ASR replication protected items in the protection container.
     * @param string $resourceName
     * @param string $resourceGroupName
     * @param string $fabricName
     * @param string $protectionContainerName
     * @return array
     */
    public function listByReplicationProtectionContainers(
        $resourceName,
        $resourceGroupName,
        $fabricName,
        $protectionContainerName
    )
    {
        return $this->_ListByReplicationProtectionContainers_operation->call([
            'resourceName' => $resourceName,
            'resourceGroupName' => $resourceGroupName,
            'fabricName' => $fabricName,
            'protectionContainerName' => $protectionContainerName
        ]);
    }
    /**
     * Gets the list of ASR replication protected items in the vault.
     * @param string $resourceName
     * @param string $resourceGroupName
     * @param string $skipToken
     * @param string $_filter
     * @return array
     */
    public function list_(
        $resourceName,
        $resourceGroupName,
        $skipToken,
        $_filter
    )
    {
        return $this->_List_operation->call([
            'resourceName' => $resourceName,
            'resourceGroupName' => $resourceGroupName,
            'skipToken' => $skipToken,
            '$filter' => $_filter
        ]);
    }
    /**
     * The operation to change the recovery point of a failed over replication protected item.
     * @param string $resourceName
     * @param string $resourceGroupName
     * @param string $fabricName
     * @param string $protectionContainerName
     * @param string $replicatedProtectedItemName
     * @param array $applyRecoveryPointInput
     * @return array
     */
    public function applyRecoveryPoint(
        $resourceName,
        $resourceGroupName,
        $fabricName,
        $protectionContainerName,
        $replicatedProtectedItemName,
        array $applyRecoveryPointInput
    )
    {
        return $this->_ApplyRecoveryPoint_operation->call([
            'resourceName' => $resourceName,
            'resourceGroupName' => $resourceGroupName,
            'fabricName' => $fabricName,
            'protectionContainerName' => $protectionContainerName,
            'replicatedProtectedItemName' => $replicatedProtectedItemName,
            'applyRecoveryPointInput' => $applyRecoveryPointInput
        ]);
    }
    /**
     * The operation to start resynchronize/repair replication for a replication protected item requiring resynchronization.
     * @param string $resourceName
     * @param string $resourceGroupName
     * @param string $fabricName
     * @param string $protectionContainerName
     * @param string $replicatedProtectedItemName
     * @return array
     */
    public function repairReplication(
        $resourceName,
        $resourceGroupName,
        $fabricName,
        $protectionContainerName,
        $replicatedProtectedItemName
    )
    {
        return $this->_RepairReplication_operation->call([
            'resourceName' => $resourceName,
            'resourceGroupName' => $resourceGroupName,
            'fabricName' => $fabricName,
            'protectionContainerName' => $protectionContainerName,
            'replicatedProtectedItemName' => $replicatedProtectedItemName
        ]);
    }
    /**
     * The operation to update(push update) the installed mobility service software on a replication protected item to the latest available version.
     * @param string $resourceName
     * @param string $resourceGroupName
     * @param string $fabricName
     * @param string $protectionContainerName
     * @param string $replicationProtectedItemName
     * @param array $updateMobilityServiceRequest
     * @return array
     */
    public function updateMobilityService(
        $resourceName,
        $resourceGroupName,
        $fabricName,
        $protectionContainerName,
        $replicationProtectedItemName,
        array $updateMobilityServiceRequest
    )
    {
        return $this->_UpdateMobilityService_operation->call([
            'resourceName' => $resourceName,
            'resourceGroupName' => $resourceGroupName,
            'fabricName' => $fabricName,
            'protectionContainerName' => $protectionContainerName,
            'replicationProtectedItemName' => $replicationProtectedItemName,
            'updateMobilityServiceRequest' => $updateMobilityServiceRequest
        ]);
    }
    /**
     * Operation to reprotect or reverse replicate a failed over replication protected item.
     * @param string $resourceName
     * @param string $resourceGroupName
     * @param string $fabricName
     * @param string $protectionContainerName
     * @param string $replicatedProtectedItemName
     * @param array $rrInput
     * @return array
     */
    public function reprotect(
        $resourceName,
        $resourceGroupName,
        $fabricName,
        $protectionContainerName,
        $replicatedProtectedItemName,
        array $rrInput
    )
    {
        return $this->_Reprotect_operation->call([
            'resourceName' => $resourceName,
            'resourceGroupName' => $resourceGroupName,
            'fabricName' => $fabricName,
            'protectionContainerName' => $protectionContainerName,
            'replicatedProtectedItemName' => $replicatedProtectedItemName,
            'rrInput' => $rrInput
        ]);
    }
    /**
     * Operation to commit the failover of the replication protected item.
     * @param string $resourceName
     * @param string $resourceGroupName
     * @param string $fabricName
     * @param string $protectionContainerName
     * @param string $replicatedProtectedItemName
     * @return array
     */
    public function failoverCommit(
        $resourceName,
        $resourceGroupName,
        $fabricName,
        $protectionContainerName,
        $replicatedProtectedItemName
    )
    {
        return $this->_FailoverCommit_operation->call([
            'resourceName' => $resourceName,
            'resourceGroupName' => $resourceGroupName,
            'fabricName' => $fabricName,
            'protectionContainerName' => $protectionContainerName,
            'replicatedProtectedItemName' => $replicatedProtectedItemName
        ]);
    }
    /**
     * Operation to clean up the test failover of a replication protected item.
     * @param string $resourceName
     * @param string $resourceGroupName
     * @param string $fabricName
     * @param string $protectionContainerName
     * @param string $replicatedProtectedItemName
     * @param array $cleanupInput
     * @return array
     */
    public function testFailoverCleanup(
        $resourceName,
        $resourceGroupName,
        $fabricName,
        $protectionContainerName,
        $replicatedProtectedItemName,
        array $cleanupInput
    )
    {
        return $this->_TestFailoverCleanup_operation->call([
            'resourceName' => $resourceName,
            'resourceGroupName' => $resourceGroupName,
            'fabricName' => $fabricName,
            'protectionContainerName' => $protectionContainerName,
            'replicatedProtectedItemName' => $replicatedProtectedItemName,
            'cleanupInput' => $cleanupInput
        ]);
    }
    /**
     * Operation to perform a test failover of the replication protected item.
     * @param string $resourceName
     * @param string $resourceGroupName
     * @param string $fabricName
     * @param string $protectionContainerName
     * @param string $replicatedProtectedItemName
     * @param array $failoverInput
     * @return array
     */
    public function testFailover(
        $resourceName,
        $resourceGroupName,
        $fabricName,
        $protectionContainerName,
        $replicatedProtectedItemName,
        array $failoverInput
    )
    {
        return $this->_TestFailover_operation->call([
            'resourceName' => $resourceName,
            'resourceGroupName' => $resourceGroupName,
            'fabricName' => $fabricName,
            'protectionContainerName' => $protectionContainerName,
            'replicatedProtectedItemName' => $replicatedProtectedItemName,
            'failoverInput' => $failoverInput
        ]);
    }
    /**
     * Operation to initiate a failover of the replication protected item.
     * @param string $resourceName
     * @param string $resourceGroupName
     * @param string $fabricName
     * @param string $protectionContainerName
     * @param string $replicatedProtectedItemName
     * @param array $failoverInput
     * @return array
     */
    public function unplannedFailover(
        $resourceName,
        $resourceGroupName,
        $fabricName,
        $protectionContainerName,
        $replicatedProtectedItemName,
        array $failoverInput
    )
    {
        return $this->_UnplannedFailover_operation->call([
            'resourceName' => $resourceName,
            'resourceGroupName' => $resourceGroupName,
            'fabricName' => $fabricName,
            'protectionContainerName' => $protectionContainerName,
            'replicatedProtectedItemName' => $replicatedProtectedItemName,
            'failoverInput' => $failoverInput
        ]);
    }
    /**
     * Operation to initiate a planned failover of the replication protected item.
     * @param string $resourceName
     * @param string $resourceGroupName
     * @param string $fabricName
     * @param string $protectionContainerName
     * @param string $replicatedProtectedItemName
     * @param array $failoverInput
     * @return array
     */
    public function plannedFailover(
        $resourceName,
        $resourceGroupName,
        $fabricName,
        $protectionContainerName,
        $replicatedProtectedItemName,
        array $failoverInput
    )
    {
        return $this->_PlannedFailover_operation->call([
            'resourceName' => $resourceName,
            'resourceGroupName' => $resourceGroupName,
            'fabricName' => $fabricName,
            'protectionContainerName' => $protectionContainerName,
            'replicatedProtectedItemName' => $replicatedProtectedItemName,
            'failoverInput' => $failoverInput
        ]);
    }
    /**
     * The operation to disable replication on a replication protected item. This will also remove the item.
     * @param string $resourceName
     * @param string $resourceGroupName
     * @param string $fabricName
     * @param string $protectionContainerName
     * @param string $replicatedProtectedItemName
     * @param array $disableProtectionInput
     */
    public function delete(
        $resourceName,
        $resourceGroupName,
        $fabricName,
        $protectionContainerName,
        $replicatedProtectedItemName,
        array $disableProtectionInput
    )
    {
        return $this->_Delete_operation->call([
            'resourceName' => $resourceName,
            'resourceGroupName' => $resourceGroupName,
            'fabricName' => $fabricName,
            'protectionContainerName' => $protectionContainerName,
            'replicatedProtectedItemName' => $replicatedProtectedItemName,
            'disableProtectionInput' => $disableProtectionInput
        ]);
    }
    /**
     * Gets the details of an ASR replication protected item.
     * @param string $resourceName
     * @param string $resourceGroupName
     * @param string $fabricName
     * @param string $protectionContainerName
     * @param string $replicatedProtectedItemName
     * @return array
     */
    public function get(
        $resourceName,
        $resourceGroupName,
        $fabricName,
        $protectionContainerName,
        $replicatedProtectedItemName
    )
    {
        return $this->_Get_operation->call([
            'resourceName' => $resourceName,
            'resourceGroupName' => $resourceGroupName,
            'fabricName' => $fabricName,
            'protectionContainerName' => $protectionContainerName,
            'replicatedProtectedItemName' => $replicatedProtectedItemName
        ]);
    }
    /**
     * The operation to create an ASR replication protected item (Enable replication).
     * @param string $resourceName
     * @param string $resourceGroupName
     * @param string $fabricName
     * @param string $protectionContainerName
     * @param string $replicatedProtectedItemName
     * @param array $input
     * @return array
     */
    public function create(
        $resourceName,
        $resourceGroupName,
        $fabricName,
        $protectionContainerName,
        $replicatedProtectedItemName,
        array $input
    )
    {
        return $this->_Create_operation->call([
            'resourceName' => $resourceName,
            'resourceGroupName' => $resourceGroupName,
            'fabricName' => $fabricName,
            'protectionContainerName' => $protectionContainerName,
            'replicatedProtectedItemName' => $replicatedProtectedItemName,
            'input' => $input
        ]);
    }
    /**
     * The operation to delete or purge a replication protected item. This operation will force delete the replication protected item. Use the remove operation on replication protected item to perform a clean disable replication for the item.
     * @param string $resourceName
     * @param string $resourceGroupName
     * @param string $fabricName
     * @param string $protectionContainerName
     * @param string $replicatedProtectedItemName
     */
    public function purge(
        $resourceName,
        $resourceGroupName,
        $fabricName,
        $protectionContainerName,
        $replicatedProtectedItemName
    )
    {
        return $this->_Purge_operation->call([
            'resourceName' => $resourceName,
            'resourceGroupName' => $resourceGroupName,
            'fabricName' => $fabricName,
            'protectionContainerName' => $protectionContainerName,
            'replicatedProtectedItemName' => $replicatedProtectedItemName
        ]);
    }
    /**
     * The operation to update the recovery settings of an ASR replication protected item.
     * @param string $resourceName
     * @param string $resourceGroupName
     * @param string $fabricName
     * @param string $protectionContainerName
     * @param string $replicatedProtectedItemName
     * @param array $updateProtectionInput
     * @return array
     */
    public function update(
        $resourceName,
        $resourceGroupName,
        $fabricName,
        $protectionContainerName,
        $replicatedProtectedItemName,
        array $updateProtectionInput
    )
    {
        return $this->_Update_operation->call([
            'resourceName' => $resourceName,
            'resourceGroupName' => $resourceGroupName,
            'fabricName' => $fabricName,
            'protectionContainerName' => $protectionContainerName,
            'replicatedProtectedItemName' => $replicatedProtectedItemName,
            'updateProtectionInput' => $updateProtectionInput
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListByReplicationProtectionContainers_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_List_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ApplyRecoveryPoint_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_RepairReplication_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_UpdateMobilityService_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Reprotect_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_FailoverCommit_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_TestFailoverCleanup_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_TestFailover_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_UnplannedFailover_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_PlannedFailover_operation;
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
    private $_Create_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Purge_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Update_operation;
}
