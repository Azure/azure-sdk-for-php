<?php
namespace Microsoft\Azure\Management\RecoveryServices\Backup;
final class BackupProtectionContainers
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_List_operation = $_client->createOperation('BackupProtectionContainers_List');
    }
    /**
     * Lists the containers registered to Recovery Services Vault.
     * @param string $vaultName
     * @param string $resourceGroupName
     * @param string $_filter
     * @return array
     */
    public function list_(
        $vaultName,
        $resourceGroupName,
        $_filter
    )
    {
        return $this->_List_operation->call([
            'vaultName' => $vaultName,
            'resourceGroupName' => $resourceGroupName,
            '$filter' => $_filter
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_List_operation;
}
