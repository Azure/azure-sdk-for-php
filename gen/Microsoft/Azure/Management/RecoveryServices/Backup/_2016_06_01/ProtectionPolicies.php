<?php
namespace Microsoft\Azure\Management\RecoveryServices\Backup\_2016_06_01;
final class ProtectionPolicies
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_Get_operation = $_client->createOperation('ProtectionPolicies_Get');
        $this->_CreateOrUpdate_operation = $_client->createOperation('ProtectionPolicies_CreateOrUpdate');
        $this->_Delete_operation = $_client->createOperation('ProtectionPolicies_Delete');
        $this->_List_operation = $_client->createOperation('ProtectionPolicies_List');
    }
    /**
     * Gets the details of the backup policy associated with the Recovery Services vault. This is an asynchronous operation. Use the GetPolicyOperationResult API to Get the operation status.
     * @param string $vaultName
     * @param string $resourceGroupName
     * @param string $policyName
     * @return array
     */
    public function get(
        $vaultName,
        $resourceGroupName,
        $policyName
    )
    {
        return $this->_Get_operation->call([
            'vaultName' => $vaultName,
            'resourceGroupName' => $resourceGroupName,
            'policyName' => $policyName
        ]);
    }
    /**
     * Creates or modifies a backup policy. This is an asynchronous operation. Use the GetPolicyOperationResult API to Get the operation status.
     * @param string $vaultName
     * @param string $resourceGroupName
     * @param string $policyName
     * @param array $resourceProtectionPolicy
     * @return array
     */
    public function createOrUpdate(
        $vaultName,
        $resourceGroupName,
        $policyName,
        array $resourceProtectionPolicy
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'vaultName' => $vaultName,
            'resourceGroupName' => $resourceGroupName,
            'policyName' => $policyName,
            'resourceProtectionPolicy' => $resourceProtectionPolicy
        ]);
    }
    /**
     * Deletes the specified backup policy from your Recovery Services vault. This is an asynchronous operation. Use the GetPolicyOperationResult API to Get the operation status.
     * @param string $vaultName
     * @param string $resourceGroupName
     * @param string $policyName
     */
    public function delete(
        $vaultName,
        $resourceGroupName,
        $policyName
    )
    {
        return $this->_Delete_operation->call([
            'vaultName' => $vaultName,
            'resourceGroupName' => $resourceGroupName,
            'policyName' => $policyName
        ]);
    }
    /**
     * Lists the backup policies associated with the Recovery Services vault. The API provides parameters to Get scoped results.
     * @param string $vaultName
     * @param string $resourceGroupName
     * @param string $_filter
     * @return array
     */
    public function list_(
        $vaultName,
        $resourceGroupName,
        $_filter
    )
    {
        return $this->_List_operation->call([
            'vaultName' => $vaultName,
            'resourceGroupName' => $resourceGroupName,
            '$filter' => $_filter
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
    private $_List_operation;
}
