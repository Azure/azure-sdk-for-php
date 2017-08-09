<?php
namespace Microsoft\Azure\Management\KeyVault;
final class Vaults
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_CreateOrUpdate_operation = $_client->createOperation('Vaults_CreateOrUpdate');
        $this->_Delete_operation = $_client->createOperation('Vaults_Delete');
        $this->_Get_operation = $_client->createOperation('Vaults_Get');
        $this->_ListByResourceGroup_operation = $_client->createOperation('Vaults_ListByResourceGroup');
        $this->_ListDeleted_operation = $_client->createOperation('Vaults_ListDeleted');
        $this->_GetDeleted_operation = $_client->createOperation('Vaults_GetDeleted');
        $this->_PurgeDeleted_operation = $_client->createOperation('Vaults_PurgeDeleted');
        $this->_List_operation = $_client->createOperation('Vaults_List');
    }
    /**
     * Create or update a key vault in the specified subscription.
     * @param string $resourceGroupName
     * @param string $vaultName
     * @param array $parameters
     * @return array
     */
    public function createOrUpdate(
        $resourceGroupName,
        $vaultName,
        array $parameters
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'vaultName' => $vaultName,
            'parameters' => $parameters
        ]);
    }
    /**
     * Deletes the specified Azure key vault.
     * @param string $resourceGroupName
     * @param string $vaultName
     */
    public function delete(
        $resourceGroupName,
        $vaultName
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'vaultName' => $vaultName
        ]);
    }
    /**
     * Gets the specified Azure key vault.
     * @param string $resourceGroupName
     * @param string $vaultName
     * @return array
     */
    public function get(
        $resourceGroupName,
        $vaultName
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'vaultName' => $vaultName
        ]);
    }
    /**
     * The List operation gets information about the vaults associated with the subscription and within the specified resource group.
     * @param string $resourceGroupName
     * @param integer|null $_top
     * @return array
     */
    public function listByResourceGroup(
        $resourceGroupName,
        $_top = null
    )
    {
        return $this->_ListByResourceGroup_operation->call([
            'resourceGroupName' => $resourceGroupName,
            '$top' => $_top
        ]);
    }
    /**
     * Gets information about the deleted vaults in a subscription.
     * @return array
     */
    public function listDeleted()
    {
        return $this->_ListDeleted_operation->call([]);
    }
    /**
     * Gets the deleted Azure key vault.
     * @param string $vaultName
     * @param string $location
     * @return array
     */
    public function getDeleted(
        $vaultName,
        $location
    )
    {
        return $this->_GetDeleted_operation->call([
            'vaultName' => $vaultName,
            'location' => $location
        ]);
    }
    /**
     * Permanently deletes the specified vault. aka Purges the deleted Azure key vault.
     * @param string $vaultName
     * @param string $location
     */
    public function purgeDeleted(
        $vaultName,
        $location
    )
    {
        return $this->_PurgeDeleted_operation->call([
            'vaultName' => $vaultName,
            'location' => $location
        ]);
    }
    /**
     * The List operation gets information about the vaults associated with the subscription.
     * @param integer|null $_top
     * @return array
     */
    public function list_($_top = null)
    {
        return $this->_List_operation->call(['$top' => $_top]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_CreateOrUpdate_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Delete_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Get_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListByResourceGroup_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListDeleted_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_GetDeleted_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_PurgeDeleted_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_List_operation;
}
