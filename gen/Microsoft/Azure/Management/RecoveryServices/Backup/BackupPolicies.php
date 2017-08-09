<?php
namespace Microsoft\Azure\Management\RecoveryServices\Backup;
final class BackupPolicies
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_List_operation = $_client->createOperation('BackupPolicies_List');
    }
    /**
     * Lists of backup policies associated with Recovery Services Vault. API provides pagination parameters to fetch scoped results.
     * @param string $vaultName
     * @param string $resourceGroupName
     * @param string|null $_filter
     * @return array
     */
    public function list_(
        $vaultName,
        $resourceGroupName,
        $_filter = null
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
