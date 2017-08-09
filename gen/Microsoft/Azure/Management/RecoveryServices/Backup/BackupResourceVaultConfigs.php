<?php
namespace Microsoft\Azure\Management\RecoveryServices\Backup;
final class BackupResourceVaultConfigs
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_Get_operation = $_client->createOperation('BackupResourceVaultConfigs_Get');
        $this->_Update_operation = $_client->createOperation('BackupResourceVaultConfigs_Update');
    }
    /**
     * Fetches resource vault config.
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
     * Updates vault security config.
     * @param string $vaultName
     * @param string $resourceGroupName
     * @param array $parameters
     * @return array
     */
    public function update(
        $vaultName,
        $resourceGroupName,
        array $parameters
    )
    {
        return $this->_Update_operation->call([
            'vaultName' => $vaultName,
            'resourceGroupName' => $resourceGroupName,
            'parameters' => $parameters
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
