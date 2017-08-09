<?php
namespace Microsoft\Azure\Management\RecoveryServices\Backup;
final class BackupResourceStorageConfigs
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_Get_operation = $_client->createOperation('BackupResourceStorageConfigs_Get');
        $this->_Update_operation = $_client->createOperation('BackupResourceStorageConfigs_Update');
    }
    /**
     * Fetches resource storage config.
     * @param string $vaultName
     * @param string $resourceGroupName
     * @return array
     */
    public function get(
        $vaultName,
        $resourceGroupName
    )
    {
        return $this->_Get_operation->call([
            'vaultName' => $vaultName,
            'resourceGroupName' => $resourceGroupName
        ]);
    }
    /**
     * Updates vault storage model type.
     * @param string $vaultName
     * @param string $resourceGroupName
     */
    public function update(
        $vaultName,
        $resourceGroupName
    )
    {
        return $this->_Update_operation->call([
            'vaultName' => $vaultName,
            'resourceGroupName' => $resourceGroupName
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
