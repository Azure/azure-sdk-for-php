<?php
namespace Microsoft\Azure\Management\CosmosDb;
final class DatabaseAccounts
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_Get_operation = $_client->createOperation('DatabaseAccounts_Get');
        $this->_Patch_operation = $_client->createOperation('DatabaseAccounts_Patch');
        $this->_CreateOrUpdate_operation = $_client->createOperation('DatabaseAccounts_CreateOrUpdate');
        $this->_Delete_operation = $_client->createOperation('DatabaseAccounts_Delete');
        $this->_FailoverPriorityChange_operation = $_client->createOperation('DatabaseAccounts_FailoverPriorityChange');
        $this->_List_operation = $_client->createOperation('DatabaseAccounts_List');
        $this->_ListByResourceGroup_operation = $_client->createOperation('DatabaseAccounts_ListByResourceGroup');
        $this->_ListKeys_operation = $_client->createOperation('DatabaseAccounts_ListKeys');
        $this->_ListConnectionStrings_operation = $_client->createOperation('DatabaseAccounts_ListConnectionStrings');
        $this->_ListReadOnlyKeys_operation = $_client->createOperation('DatabaseAccounts_ListReadOnlyKeys');
        $this->_RegenerateKey_operation = $_client->createOperation('DatabaseAccounts_RegenerateKey');
        $this->_CheckNameExists_operation = $_client->createOperation('DatabaseAccounts_CheckNameExists');
    }
    /**
     * Retrieves the properties of an existing Azure Cosmos DB database account.
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
     * Patches the properties of an existing Azure Cosmos DB database account.
     * @param string $resourceGroupName
     * @param string $accountName
     * @param array $updateParameters
     * @return array
     */
    public function patch(
        $resourceGroupName,
        $accountName,
        array $updateParameters
    )
    {
        return $this->_Patch_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'accountName' => $accountName,
            'updateParameters' => $updateParameters
        ]);
    }
    /**
     * Creates or updates an Azure Cosmos DB database account.
     * @param string $resourceGroupName
     * @param string $accountName
     * @param array $createUpdateParameters
     * @return array
     */
    public function createOrUpdate(
        $resourceGroupName,
        $accountName,
        array $createUpdateParameters
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'accountName' => $accountName,
            'createUpdateParameters' => $createUpdateParameters
        ]);
    }
    /**
     * Deletes an existing Azure Cosmos DB database account.
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
     * Changes the failover priority for the Azure Cosmos DB database account. A failover priority of 0 indicates a write region. The maximum value for a failover priority = (total number of regions - 1). Failover priority values must be unique for each of the regions in which the database account exists.
     * @param string $resourceGroupName
     * @param string $accountName
     * @param array $failoverParameters
     */
    public function failoverPriorityChange(
        $resourceGroupName,
        $accountName,
        array $failoverParameters
    )
    {
        return $this->_FailoverPriorityChange_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'accountName' => $accountName,
            'failoverParameters' => $failoverParameters
        ]);
    }
    /**
     * Lists all the Azure Cosmos DB database accounts available under the subscription.
     * @return array
     */
    public function list_()
    {
        return $this->_List_operation->call([]);
    }
    /**
     * Lists all the Azure Cosmos DB database accounts available under the given resource group.
     * @param string $resourceGroupName
     * @return array
     */
    public function listByResourceGroup($resourceGroupName)
    {
        return $this->_ListByResourceGroup_operation->call(['resourceGroupName' => $resourceGroupName]);
    }
    /**
     * Lists the access keys for the specified Azure Cosmos DB database account.
     * @param string $resourceGroupName
     * @param string $accountName
     * @return array
     */
    public function listKeys(
        $resourceGroupName,
        $accountName
    )
    {
        return $this->_ListKeys_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'accountName' => $accountName
        ]);
    }
    /**
     * Lists the connection strings for the specified Azure Cosmos DB database account.
     * @param string $resourceGroupName
     * @param string $accountName
     * @return array
     */
    public function listConnectionStrings(
        $resourceGroupName,
        $accountName
    )
    {
        return $this->_ListConnectionStrings_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'accountName' => $accountName
        ]);
    }
    /**
     * Lists the read-only access keys for the specified Azure Cosmos DB database account.
     * @param string $resourceGroupName
     * @param string $accountName
     * @return array
     */
    public function listReadOnlyKeys(
        $resourceGroupName,
        $accountName
    )
    {
        return $this->_ListReadOnlyKeys_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'accountName' => $accountName
        ]);
    }
    /**
     * Regenerates an access key for the specified Azure Cosmos DB database account.
     * @param string $resourceGroupName
     * @param string $accountName
     * @param array $keyToRegenerate
     */
    public function regenerateKey(
        $resourceGroupName,
        $accountName,
        array $keyToRegenerate
    )
    {
        return $this->_RegenerateKey_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'accountName' => $accountName,
            'keyToRegenerate' => $keyToRegenerate
        ]);
    }
    /**
     * Checks that the Azure Cosmos DB account name already exists. A valid account name may contain only lowercase letters, numbers, and the '-' character, and must be between 3 and 50 characters.
     * @param string $accountName
     */
    public function checkNameExists($accountName)
    {
        return $this->_CheckNameExists_operation->call(['accountName' => $accountName]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Get_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Patch_operation;
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
    private $_FailoverPriorityChange_operation;
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
    private $_ListKeys_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListConnectionStrings_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListReadOnlyKeys_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_RegenerateKey_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_CheckNameExists_operation;
}
