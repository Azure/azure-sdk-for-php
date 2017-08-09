<?php
namespace Microsoft\Azure\Management\RecoveryServices\Backup;
final class ItemLevelRecoveryConnections
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_Provision_operation = $_client->createOperation('ItemLevelRecoveryConnections_Provision');
        $this->_Revoke_operation = $_client->createOperation('ItemLevelRecoveryConnections_Revoke');
    }
    /**
     * Provisions a script which invokes an iSCSI connection to the backup data. Executing this script opens a file explorer displaying all the recoverable files and folders. This is an asynchronous operation. To know the status of provisioning, call GetProtectedItemOperationResult API.
     * @param string $vaultName
     * @param string $resourceGroupName
     * @param string $fabricName
     * @param string $containerName
     * @param string $protectedItemName
     * @param string $recoveryPointId
     * @param array $parameters
     */
    public function provision(
        $vaultName,
        $resourceGroupName,
        $fabricName,
        $containerName,
        $protectedItemName,
        $recoveryPointId,
        array $parameters
    )
    {
        return $this->_Provision_operation->call([
            'vaultName' => $vaultName,
            'resourceGroupName' => $resourceGroupName,
            'fabricName' => $fabricName,
            'containerName' => $containerName,
            'protectedItemName' => $protectedItemName,
            'recoveryPointId' => $recoveryPointId,
            'parameters' => $parameters
        ]);
    }
    /**
     * Revokes an iSCSI connection which can be used to download a script. Executing this script opens a file explorer displaying all recoverable files and folders. This is an asynchronous operation.
     * @param string $vaultName
     * @param string $resourceGroupName
     * @param string $fabricName
     * @param string $containerName
     * @param string $protectedItemName
     * @param string $recoveryPointId
     */
    public function revoke(
        $vaultName,
        $resourceGroupName,
        $fabricName,
        $containerName,
        $protectedItemName,
        $recoveryPointId
    )
    {
        return $this->_Revoke_operation->call([
            'vaultName' => $vaultName,
            'resourceGroupName' => $resourceGroupName,
            'fabricName' => $fabricName,
            'containerName' => $containerName,
            'protectedItemName' => $protectedItemName,
            'recoveryPointId' => $recoveryPointId
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Provision_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Revoke_operation;
}
