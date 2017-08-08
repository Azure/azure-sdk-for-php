<?php
namespace Microsoft\Azure\Management\RecoveryServices\Backup\_2016_06_01;
final class Restores
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_Trigger_operation = $_client->createOperation('Restores_Trigger');
    }
    /**
     * Restores the specified backup data. This is an asynchronous operation. To know the status of this API call, use GetProtectedItemOperationResult API.
     * @param string $vaultName
     * @param string $resourceGroupName
     * @param string $fabricName
     * @param string $containerName
     * @param string $protectedItemName
     * @param string $recoveryPointId
     * @param array $resourceRestoreRequest
     */
    public function trigger(
        $vaultName,
        $resourceGroupName,
        $fabricName,
        $containerName,
        $protectedItemName,
        $recoveryPointId,
        array $resourceRestoreRequest
    )
    {
        return $this->_Trigger_operation->call([
            'vaultName' => $vaultName,
            'resourceGroupName' => $resourceGroupName,
            'fabricName' => $fabricName,
            'containerName' => $containerName,
            'protectedItemName' => $protectedItemName,
            'recoveryPointId' => $recoveryPointId,
            'resourceRestoreRequest' => $resourceRestoreRequest
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Trigger_operation;
}
