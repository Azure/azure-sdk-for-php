<?php
namespace Microsoft\Azure\Management\RecoveryServices\Backup;
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
     * Restores the specified backed up data. This is an asynchronous operation. To know the status of this API call, use GetProtectedItemOperationResult API.
     * @param string $vaultName
     * @param string $resourceGroupName
     * @param string $fabricName
     * @param string $containerName
     * @param string $protectedItemName
     * @param string $recoveryPointId
     * @param array $parameters
     */
    public function trigger(
        $vaultName,
        $resourceGroupName,
        $fabricName,
        $containerName,
        $protectedItemName,
        $recoveryPointId,
        array $parameters
    )
    {
        return $this->_Trigger_operation->call([
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
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Trigger_operation;
}
