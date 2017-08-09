<?php
namespace Microsoft\Azure\Management\RecoveryServices\Backup;
final class BackupProtectableItems
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_List_operation = $_client->createOperation('BackupProtectableItems_List');
    }
    /**
     * Provides a pageable list of protectable objects within your subscription according to the query filter and the pagination parameters.
     * @param string $vaultName
     * @param string $resourceGroupName
     * @param string|null $_filter
     * @param string|null $_skipToken
     * @return array
     */
    public function list_(
        $vaultName,
        $resourceGroupName,
        $_filter = null,
        $_skipToken = null
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
