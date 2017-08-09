<?php
namespace Microsoft\Azure\Management\RecoveryServices\Backup;
final class BackupUsageSummaries
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_List_operation = $_client->createOperation('BackupUsageSummaries_List');
    }
    /**
     * Fetches the backup management usage summaries of the vault.
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
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_List_operation;
}
