<?php
namespace Microsoft\Azure\Management\RecoveryServices\SiteRecovery\_2016_08_10;
final class ReplicationRecoveryPlans
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_Reprotect_operation = $_client->createOperation('ReplicationRecoveryPlans_Reprotect');
        $this->_FailoverCommit_operation = $_client->createOperation('ReplicationRecoveryPlans_FailoverCommit');
        $this->_TestFailoverCleanup_operation = $_client->createOperation('ReplicationRecoveryPlans_TestFailoverCleanup');
        $this->_TestFailover_operation = $_client->createOperation('ReplicationRecoveryPlans_TestFailover');
        $this->_UnplannedFailover_operation = $_client->createOperation('ReplicationRecoveryPlans_UnplannedFailover');
        $this->_PlannedFailover_operation = $_client->createOperation('ReplicationRecoveryPlans_PlannedFailover');
        $this->_Get_operation = $_client->createOperation('ReplicationRecoveryPlans_Get');
        $this->_Create_operation = $_client->createOperation('ReplicationRecoveryPlans_Create');
        $this->_Delete_operation = $_client->createOperation('ReplicationRecoveryPlans_Delete');
        $this->_Update_operation = $_client->createOperation('ReplicationRecoveryPlans_Update');
        $this->_List_operation = $_client->createOperation('ReplicationRecoveryPlans_List');
    }
    /**
     * The operation to reprotect(reverse replicate) a recovery plan.
     * @param string $resourceName
     * @param string $resourceGroupName
     * @param string $recoveryPlanName
     * @return array
     */
    public function reprotect(
        $resourceName,
        $resourceGroupName,
        $recoveryPlanName
    )
    {
        return $this->_Reprotect_operation->call([
            'resourceName' => $resourceName,
            'resourceGroupName' => $resourceGroupName,
            'recoveryPlanName' => $recoveryPlanName
        ]);
    }
    /**
     * The operation to commit the fail over of a recovery plan.
     * @param string $resourceName
     * @param string $resourceGroupName
     * @param string $recoveryPlanName
     * @return array
     */
    public function failoverCommit(
        $resourceName,
        $resourceGroupName,
        $recoveryPlanName
    )
    {
        return $this->_FailoverCommit_operation->call([
            'resourceName' => $resourceName,
            'resourceGroupName' => $resourceGroupName,
            'recoveryPlanName' => $recoveryPlanName
        ]);
    }
    /**
     * The operation to cleanup test failover of a recovery plan.
     * @param string $resourceName
     * @param string $resourceGroupName
     * @param string $recoveryPlanName
     * @param array $input
     * @return array
     */
    public function testFailoverCleanup(
        $resourceName,
        $resourceGroupName,
        $recoveryPlanName,
        array $input
    )
    {
        return $this->_TestFailoverCleanup_operation->call([
            'resourceName' => $resourceName,
            'resourceGroupName' => $resourceGroupName,
            'recoveryPlanName' => $recoveryPlanName,
            'input' => $input
        ]);
    }
    /**
     * The operation to start the test failover of a recovery plan.
     * @param string $resourceName
     * @param string $resourceGroupName
     * @param string $recoveryPlanName
     * @param array $input
     * @return array
     */
    public function testFailover(
        $resourceName,
        $resourceGroupName,
        $recoveryPlanName,
        array $input
    )
    {
        return $this->_TestFailover_operation->call([
            'resourceName' => $resourceName,
            'resourceGroupName' => $resourceGroupName,
            'recoveryPlanName' => $recoveryPlanName,
            'input' => $input
        ]);
    }
    /**
     * The operation to start the failover of a recovery plan.
     * @param string $resourceName
     * @param string $resourceGroupName
     * @param string $recoveryPlanName
     * @param array $input
     * @return array
     */
    public function unplannedFailover(
        $resourceName,
        $resourceGroupName,
        $recoveryPlanName,
        array $input
    )
    {
        return $this->_UnplannedFailover_operation->call([
            'resourceName' => $resourceName,
            'resourceGroupName' => $resourceGroupName,
            'recoveryPlanName' => $recoveryPlanName,
            'input' => $input
        ]);
    }
    /**
     * The operation to start the planned failover of a recovery plan.
     * @param string $resourceName
     * @param string $resourceGroupName
     * @param string $recoveryPlanName
     * @param array $input
     * @return array
     */
    public function plannedFailover(
        $resourceName,
        $resourceGroupName,
        $recoveryPlanName,
        array $input
    )
    {
        return $this->_PlannedFailover_operation->call([
            'resourceName' => $resourceName,
            'resourceGroupName' => $resourceGroupName,
            'recoveryPlanName' => $recoveryPlanName,
            'input' => $input
        ]);
    }
    /**
     * Gets the details of the recovery plan.
     * @param string $resourceName
     * @param string $resourceGroupName
     * @param string $recoveryPlanName
     * @return array
     */
    public function get(
        $resourceName,
        $resourceGroupName,
        $recoveryPlanName
    )
    {
        return $this->_Get_operation->call([
            'resourceName' => $resourceName,
            'resourceGroupName' => $resourceGroupName,
            'recoveryPlanName' => $recoveryPlanName
        ]);
    }
    /**
     * The operation to create a recovery plan.
     * @param string $resourceName
     * @param string $resourceGroupName
     * @param string $recoveryPlanName
     * @param array $input
     * @return array
     */
    public function create(
        $resourceName,
        $resourceGroupName,
        $recoveryPlanName,
        array $input
    )
    {
        return $this->_Create_operation->call([
            'resourceName' => $resourceName,
            'resourceGroupName' => $resourceGroupName,
            'recoveryPlanName' => $recoveryPlanName,
            'input' => $input
        ]);
    }
    /**
     * Delete a recovery plan.
     * @param string $resourceName
     * @param string $resourceGroupName
     * @param string $recoveryPlanName
     */
    public function delete(
        $resourceName,
        $resourceGroupName,
        $recoveryPlanName
    )
    {
        return $this->_Delete_operation->call([
            'resourceName' => $resourceName,
            'resourceGroupName' => $resourceGroupName,
            'recoveryPlanName' => $recoveryPlanName
        ]);
    }
    /**
     * The operation to update a recovery plan.
     * @param string $resourceName
     * @param string $resourceGroupName
     * @param string $recoveryPlanName
     * @param array $input
     * @return array
     */
    public function update(
        $resourceName,
        $resourceGroupName,
        $recoveryPlanName,
        array $input
    )
    {
        return $this->_Update_operation->call([
            'resourceName' => $resourceName,
            'resourceGroupName' => $resourceGroupName,
            'recoveryPlanName' => $recoveryPlanName,
            'input' => $input
        ]);
    }
    /**
     * Lists the recovery plans in the vault.
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
    private $_List_operation;
}
