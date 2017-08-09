<?php
namespace Microsoft\Azure\Management\RecoveryServices\Backup;
final class BackupOperationStatuses
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_Get_operation = $_client->createOperation('BackupOperationStatuses_Get');
    }
    /**
     * Fetches the status of an operation such as triggering a backup, restore. The status can be in progress, completed or failed. You can refer to the OperationStatus enum for all the possible states of an operation. Some operations create jobs. This method returns the list of jobs when the operation is complete.
     * @param string $vaultName
     * @param string $resourceGroupName
     * @param string $operationId
     * @return array
     */
    public function get(
        $vaultName,
        $resourceGroupName,
        $operationId
    )
    {
        return $this->_Get_operation->call([
            'vaultName' => $vaultName,
            'resourceGroupName' => $resourceGroupName,
            'operationId' => $operationId
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Get_operation;
}
