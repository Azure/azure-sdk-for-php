<?php
namespace Microsoft\Azure\Management\RecoveryServices\Backup\_2016_06_01;
final class ProtectedItems
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_List_operation = $_client->createOperation('ProtectedItems_List');
        $this->_Get_operation = $_client->createOperation('ProtectedItems_Get');
        $this->_CreateOrUpdate_operation = $_client->createOperation('ProtectedItems_CreateOrUpdate');
        $this->_Delete_operation = $_client->createOperation('ProtectedItems_Delete');
    }
    /**
     * Provides a pageable list of all items in a subscription, that can be protected.
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
     * Provides the details of the backup item. This is an asynchronous operation. To know the status of the operation, call the GetItemOperationResult API.
     * @param string $vaultName
     * @param string $resourceGroupName
     * @param string $fabricName
     * @param string $containerName
     * @param string $protectedItemName
     * @param string $_filter
     * @return array
     */
    public function get(
        $vaultName,
        $resourceGroupName,
        $fabricName,
        $containerName,
        $protectedItemName,
        $_filter
    )
    {
        return $this->_Get_operation->call([
            'vaultName' => $vaultName,
            'resourceGroupName' => $resourceGroupName,
            'fabricName' => $fabricName,
            'containerName' => $containerName,
            'protectedItemName' => $protectedItemName,
            '$filter' => $_filter
        ]);
    }
    /**
     * This operation enables an item to be backed up, or modifies the existing backup policy information for an item that has been backed up. This is an asynchronous operation. To learn the status of the operation, call the GetItemOperationResult API.
     * @param string $vaultName
     * @param string $resourceGroupName
     * @param string $fabricName
     * @param string $containerName
     * @param string $protectedItemName
     * @param array $resourceProtectedItem
     */
    public function createOrUpdate(
        $vaultName,
        $resourceGroupName,
        $fabricName,
        $containerName,
        $protectedItemName,
        array $resourceProtectedItem
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'vaultName' => $vaultName,
            'resourceGroupName' => $resourceGroupName,
            'fabricName' => $fabricName,
            'containerName' => $containerName,
            'protectedItemName' => $protectedItemName,
            'resourceProtectedItem' => $resourceProtectedItem
        ]);
    }
    /**
     * Used to disable the backup job for an item within a container. This is an asynchronous operation. To learn the status of the request, call the GetItemOperationResult API.
     * @param string $vaultName
     * @param string $resourceGroupName
     * @param string $fabricName
     * @param string $containerName
     * @param string $protectedItemName
     */
    public function delete(
        $vaultName,
        $resourceGroupName,
        $fabricName,
        $containerName,
        $protectedItemName
    )
    {
        return $this->_Delete_operation->call([
            'vaultName' => $vaultName,
            'resourceGroupName' => $resourceGroupName,
            'fabricName' => $fabricName,
            'containerName' => $containerName,
            'protectedItemName' => $protectedItemName
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
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_CreateOrUpdate_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Delete_operation;
}
