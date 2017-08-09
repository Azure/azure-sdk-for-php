<?php
namespace Microsoft\Azure\Management\RecoveryServices\Backup;
final class BackupEngines
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_List_operation = $_client->createOperation('BackupEngines_List');
        $this->_Get_operation = $_client->createOperation('BackupEngines_Get');
    }
    /**
     * Backup management servers registered to Recovery Services Vault. Returns a pageable list of servers.
     * @param string $vaultName
     * @param string $resourceGroupName
     * @param string $_filter
     * @param string $_skipToken
     * @return array
     */
    public function list_(
        $vaultName,
        $resourceGroupName,
        $_filter,
        $_skipToken
    )
    {
        return $this->_List_operation->call([
            'vaultName' => $vaultName,
            'resourceGroupName' => $resourceGroupName,
            '$filter' => $_filter,
            '$skipToken' => $_skipToken
        ]);
    }
    /**
     * Returns backup management server registered to Recovery Services Vault.
     * @param string $vaultName
     * @param string $resourceGroupName
     * @param string $backupEngineName
     * @param string $_filter
     * @param string $_skipToken
     * @return array
     */
    public function get(
        $vaultName,
        $resourceGroupName,
        $backupEngineName,
        $_filter,
        $_skipToken
    )
    {
        return $this->_Get_operation->call([
            'vaultName' => $vaultName,
            'resourceGroupName' => $resourceGroupName,
            'backupEngineName' => $backupEngineName,
            '$filter' => $_filter,
            '$skipToken' => $_skipToken
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_List_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Get_operation;
}
