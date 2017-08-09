<?php
namespace Microsoft\Azure\Management\RecoveryServices;
final class BackupVaultConfigs
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_Get_operation = $_client->createOperation('BackupVaultConfigs_Get');
        $this->_Update_operation = $_client->createOperation('BackupVaultConfigs_Update');
    }
    /**
     * Fetches vault config.
     * @param string $resourceGroupName
     * @param string $vaultName
     * @return array
     */
    public function get(
        $resourceGroupName,
        $vaultName
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'vaultName' => $vaultName
        ]);
    }
    /**
     * Updates vault config model type.
     * @param string $resourceGroupName
     * @param string $vaultName
     * @param array $backupVaultConfig
     * @return array
     */
    public function update(
        $resourceGroupName,
        $vaultName,
        array $backupVaultConfig
    )
    {
        return $this->_Update_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'vaultName' => $vaultName,
            'backupVaultConfig' => $backupVaultConfig
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Get_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Update_operation;
}
