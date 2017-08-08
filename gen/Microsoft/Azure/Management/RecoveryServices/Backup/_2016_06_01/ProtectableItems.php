<?php
namespace Microsoft\Azure\Management\RecoveryServices\Backup\_2016_06_01;
final class ProtectableItems
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_List_operation = $_client->createOperation('ProtectableItems_List');
    }
    /**
     * Based on the query filter and the pagination parameters, this operation provides a pageable list of objects within the subscription that can be protected.
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
