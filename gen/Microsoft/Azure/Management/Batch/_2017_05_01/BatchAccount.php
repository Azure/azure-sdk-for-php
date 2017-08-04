<?php
namespace Microsoft\Azure\Management\Batch\_2017_05_01;
final class BatchAccount
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_Create_operation = $_client->createOperation('BatchAccount_Create');
        $this->_Update_operation = $_client->createOperation('BatchAccount_Update');
        $this->_Delete_operation = $_client->createOperation('BatchAccount_Delete');
        $this->_Get_operation = $_client->createOperation('BatchAccount_Get');
        $this->_List_operation = $_client->createOperation('BatchAccount_List');
        $this->_ListByResourceGroup_operation = $_client->createOperation('BatchAccount_ListByResourceGroup');
        $this->_SynchronizeAutoStorageKeys_operation = $_client->createOperation('BatchAccount_SynchronizeAutoStorageKeys');
        $this->_RegenerateKey_operation = $_client->createOperation('BatchAccount_RegenerateKey');
        $this->_GetKeys_operation = $_client->createOperation('BatchAccount_GetKeys');
    }
    /**
     * Creates a new Batch account with the specified parameters. Existing accounts cannot be updated with this API and should instead be updated with the Update Batch Account API.
     * @param string $resourceGroupName
     * @param string $accountName
     * @param array $parameters
     * @return array
     */
    public function create(
        $resourceGroupName,
        $accountName,
        array $parameters
    )
    {
        return $this->_Create_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'accountName' => $accountName,
            'parameters' => $parameters
        ]);
    }
    /**
     * Updates the properties of an existing Batch account.
     * @param string $resourceGroupName
     * @param string $accountName
     * @param array $parameters
     * @return array
     */
    public function update(
        $resourceGroupName,
        $accountName,
        array $parameters
    )
    {
        return $this->_Update_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'accountName' => $accountName,
            'parameters' => $parameters
        ]);
    }
    /**
     * Deletes the specified Batch account.
     * @param string $resourceGroupName
     * @param string $accountName
     */
    public function delete(
        $resourceGroupName,
        $accountName
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'accountName' => $accountName
        ]);
    }
    /**
     * Gets information about the specified Batch account.
     * @param string $resourceGroupName
     * @param string $accountName
     * @return array
     */
    public function get(
        $resourceGroupName,
        $accountName
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'accountName' => $accountName
        ]);
    }
    /**
     * Gets information about the Batch accounts associated with the subscription.
     * @return array
     */
    public function list_()
    {
        return $this->_List_operation->call([]);
    }
    /**
     * Gets information about the Batch accounts associated with the specified resource group.
     * @param string $resourceGroupName
     * @return array
     */
    public function listByResourceGroup($resourceGroupName)
    {
        return $this->_ListByResourceGroup_operation->call(['resourceGroupName' => $resourceGroupName]);
    }
    /**
     * Synchronizes access keys for the auto-storage account configured for the specified Batch account.
     * @param string $resourceGroupName
     * @param string $accountName
     */
    public function synchronizeAutoStorageKeys(
        $resourceGroupName,
        $accountName
    )
    {
        return $this->_SynchronizeAutoStorageKeys_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'accountName' => $accountName
        ]);
    }
    /**
     * Regenerates the specified account key for the Batch account.
     * @param string $resourceGroupName
     * @param string $accountName
     * @param array $parameters
     * @return array
     */
    public function regenerateKey(
        $resourceGroupName,
        $accountName,
        array $parameters
    )
    {
        return $this->_RegenerateKey_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'accountName' => $accountName,
            'parameters' => $parameters
        ]);
    }
    /**
     * This operation applies only to Batch accounts created with a poolAllocationMode of 'BatchService'. If the Batch account was created with a poolAllocationMode of 'UserSubscription', clients cannot use access to keys to authenticate, and must use Azure Active Directory instead. In this case, getting the keys will fail.
     * @param string $resourceGroupName
     * @param string $accountName
     * @return array
     */
    public function getKeys(
        $resourceGroupName,
        $accountName
    )
    {
        return $this->_GetKeys_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'accountName' => $accountName
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Create_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Update_operation;
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
    private $_List_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListByResourceGroup_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_SynchronizeAutoStorageKeys_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_RegenerateKey_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_GetKeys_operation;
}
