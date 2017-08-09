<?php
namespace Microsoft\Azure\Management\RecoveryServices\Backup;
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
    }
    /**
     * Provides the details of the backup policies associated to Recovery Services Vault. This is an asynchronous operation. Status of the operation can be fetched using GetPolicyOperationResult API.
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
     * Creates or modifies a backup policy. This is an asynchronous operation. Status of the operation can be fetched using GetPolicyOperationResult API.
     * @param string $vaultName
     * @param string $resourceGroupName
     * @param string $policyName
     * @param array $parameters
     * @return array
     */
    public function createOrUpdate(
        $vaultName,
        $resourceGroupName,
        $policyName,
        array $parameters
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'vaultName' => $vaultName,
            'resourceGroupName' => $resourceGroupName,
            'policyName' => $policyName,
            'parameters' => $parameters
        ]);
    }
    /**
     * Deletes specified backup policy from your Recovery Services Vault. This is an asynchronous operation. Status of the operation can be fetched using GetPolicyOperationResult API.
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
}
