<?php
namespace Microsoft\Azure\Management\RecoveryServices;
final class ReplicationUsages
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_List_operation = $_client->createOperation('ReplicationUsages_List');
    }
    /**
     * Fetches the replication usages of the vault.
     * @param string $resourceGroupName
     * @param string $vaultName
     * @return array
     */
    public function list_(
        $resourceGroupName,
        $vaultName
    )
    {
        return $this->_List_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'vaultName' => $vaultName
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_List_operation;
}
