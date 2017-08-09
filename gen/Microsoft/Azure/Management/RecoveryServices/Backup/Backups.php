<?php
namespace Microsoft\Azure\Management\RecoveryServices\Backup;
final class Backups
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_Trigger_operation = $_client->createOperation('Backups_Trigger');
    }
    /**
     * Triggers backup for specified backed up item. This is an asynchronous operation. To know the status of the operation, call GetProtectedItemOperationResult API.
     * @param string $vaultName
     * @param string $resourceGroupName
     * @param string $fabricName
     * @param string $containerName
     * @param string $protectedItemName
     * @param array $parameters
     */
    public function trigger(
        $vaultName,
        $resourceGroupName,
        $fabricName,
        $containerName,
        $protectedItemName,
        array $parameters
    )
    {
        return $this->_Trigger_operation->call([
            'vaultName' => $vaultName,
            'resourceGroupName' => $resourceGroupName,
            'fabricName' => $fabricName,
            'containerName' => $containerName,
            'protectedItemName' => $protectedItemName,
            'parameters' => $parameters
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Trigger_operation;
}
