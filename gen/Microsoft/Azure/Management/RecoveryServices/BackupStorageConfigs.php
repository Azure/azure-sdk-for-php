<?php
namespace Microsoft\Azure\Management\RecoveryServices;
final class BackupStorageConfigs
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_Get_operation = $_client->createOperation('BackupStorageConfigs_Get');
        $this->_Update_operation = $_client->createOperation('BackupStorageConfigs_Update');
    }
    /**
     * Fetches resource storage config.
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
     * Updates vault storage model type.
     * @param string $resourceGroupName
     * @param string $vaultName
     * @param array $backupStorageConfig
     */
    public function update(
        $resourceGroupName,
        $vaultName,
        array $backupStorageConfig
    )
    {
        return $this->_Update_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'vaultName' => $vaultName,
            'backupStorageConfig' => $backupStorageConfig
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
