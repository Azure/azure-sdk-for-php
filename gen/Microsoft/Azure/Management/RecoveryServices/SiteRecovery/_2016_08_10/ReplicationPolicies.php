<?php
namespace Microsoft\Azure\Management\RecoveryServices\SiteRecovery\_2016_08_10;
final class ReplicationPolicies
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_Get_operation = $_client->createOperation('ReplicationPolicies_Get');
        $this->_Create_operation = $_client->createOperation('ReplicationPolicies_Create');
        $this->_Delete_operation = $_client->createOperation('ReplicationPolicies_Delete');
        $this->_Update_operation = $_client->createOperation('ReplicationPolicies_Update');
        $this->_List_operation = $_client->createOperation('ReplicationPolicies_List');
    }
    /**
     * Gets the details of a replication policy.
     * @param string $resourceName
     * @param string $resourceGroupName
     * @param string $policyName
     * @return array
     */
    public function get(
        $resourceName,
        $resourceGroupName,
        $policyName
    )
    {
        return $this->_Get_operation->call([
            'resourceName' => $resourceName,
            'resourceGroupName' => $resourceGroupName,
            'policyName' => $policyName
        ]);
    }
    /**
     * The operation to create a replication policy
     * @param string $resourceName
     * @param string $resourceGroupName
     * @param string $policyName
     * @param array $input
     * @return array
     */
    public function create(
        $resourceName,
        $resourceGroupName,
        $policyName,
        array $input
    )
    {
        return $this->_Create_operation->call([
            'resourceName' => $resourceName,
            'resourceGroupName' => $resourceGroupName,
            'policyName' => $policyName,
            'input' => $input
        ]);
    }
    /**
     * The operation to delete a replication policy.
     * @param string $resourceName
     * @param string $resourceGroupName
     * @param string $policyName
     */
    public function delete(
        $resourceName,
        $resourceGroupName,
        $policyName
    )
    {
        return $this->_Delete_operation->call([
            'resourceName' => $resourceName,
            'resourceGroupName' => $resourceGroupName,
            'policyName' => $policyName
        ]);
    }
    /**
     * The operation to update a replication policy.
     * @param string $resourceName
     * @param string $resourceGroupName
     * @param string $policyName
     * @param array $input
     * @return array
     */
    public function update(
        $resourceName,
        $resourceGroupName,
        $policyName,
        array $input
    )
    {
        return $this->_Update_operation->call([
            'resourceName' => $resourceName,
            'resourceGroupName' => $resourceGroupName,
            'policyName' => $policyName,
            'input' => $input
        ]);
    }
    /**
     * Lists the replication policies for a vault.
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
    private $_List_operation;
}
