<?php
namespace Microsoft\Azure\Management\RecoveryServices\Backup;
final class ProtectionContainers
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_Get_operation = $_client->createOperation('ProtectionContainers_Get');
        $this->_Refresh_operation = $_client->createOperation('ProtectionContainers_Refresh');
    }
    /**
     * Gets details of the specific container registered to your Recovery Services Vault.
     * @param string $vaultName
     * @param string $resourceGroupName
     * @param string $fabricName
     * @param string $containerName
     * @return array
     */
    public function get(
        $vaultName,
        $resourceGroupName,
        $fabricName,
        $containerName
    )
    {
        return $this->_Get_operation->call([
            'vaultName' => $vaultName,
            'resourceGroupName' => $resourceGroupName,
            'fabricName' => $fabricName,
            'containerName' => $containerName
        ]);
    }
    /**
     * Discovers all the containers in the subscription that can be backed up to Recovery Services Vault. This is an asynchronous operation. To know the status of the operation, call GetRefreshOperationResult API.
     * @param string $vaultName
     * @param string $resourceGroupName
     * @param string $fabricName
     */
    public function refresh(
        $vaultName,
        $resourceGroupName,
        $fabricName
    )
    {
        return $this->_Refresh_operation->call([
            'vaultName' => $vaultName,
            'resourceGroupName' => $resourceGroupName,
            'fabricName' => $fabricName
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Get_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Refresh_operation;
}
