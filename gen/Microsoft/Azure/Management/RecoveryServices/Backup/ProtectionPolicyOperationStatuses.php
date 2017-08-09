<?php
namespace Microsoft\Azure\Management\RecoveryServices\Backup;
final class ProtectionPolicyOperationStatuses
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_Get_operation = $_client->createOperation('ProtectionPolicyOperationStatuses_Get');
    }
    /**
     * Provides the status of the asynchronous operations like backup, restore. The status can be in progress, completed or failed. You can refer to the Operation Status enum for all the possible states of an operation. Some operations create jobs. This method returns the list of jobs associated with operation.
     * @param string $vaultName
     * @param string $resourceGroupName
     * @param string $policyName
     * @param string $operationId
     * @return array
     */
    public function get(
        $vaultName,
        $resourceGroupName,
        $policyName,
        $operationId
    )
    {
        return $this->_Get_operation->call([
            'vaultName' => $vaultName,
            'resourceGroupName' => $resourceGroupName,
            'policyName' => $policyName,
            'operationId' => $operationId
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Get_operation;
}
