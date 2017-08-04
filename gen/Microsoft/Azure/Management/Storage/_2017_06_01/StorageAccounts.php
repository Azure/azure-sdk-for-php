<?php
namespace Microsoft\Azure\Management\Storage\_2017_06_01;
final class StorageAccounts
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_CheckNameAvailability_operation = $_client->createOperation('StorageAccounts_CheckNameAvailability');
        $this->_Create_operation = $_client->createOperation('StorageAccounts_Create');
        $this->_Delete_operation = $_client->createOperation('StorageAccounts_Delete');
        $this->_GetProperties_operation = $_client->createOperation('StorageAccounts_GetProperties');
        $this->_Update_operation = $_client->createOperation('StorageAccounts_Update');
        $this->_List_operation = $_client->createOperation('StorageAccounts_List');
        $this->_ListByResourceGroup_operation = $_client->createOperation('StorageAccounts_ListByResourceGroup');
        $this->_ListKeys_operation = $_client->createOperation('StorageAccounts_ListKeys');
        $this->_RegenerateKey_operation = $_client->createOperation('StorageAccounts_RegenerateKey');
        $this->_ListAccountSAS_operation = $_client->createOperation('StorageAccounts_ListAccountSAS');
        $this->_ListServiceSAS_operation = $_client->createOperation('StorageAccounts_ListServiceSAS');
    }
    /**
     * Checks that the storage account name is valid and is not already in use.
     * @param array $accountName
     * @return array
     */
    public function checkNameAvailability(array $accountName)
    {
        return $this->_CheckNameAvailability_operation->call(['accountName' => $accountName]);
    }
    /**
     * Asynchronously creates a new storage account with the specified parameters. If an account is already created and a subsequent create request is issued with different properties, the account properties will be updated. If an account is already created and a subsequent create or update request is issued with the exact same set of properties, the request will succeed.
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
     * Deletes a storage account in Microsoft Azure.
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
     * Returns the properties for the specified storage account including but not limited to name, SKU name, location, and account status. The ListKeys operation should be used to retrieve storage keys.
     * @param string $resourceGroupName
     * @param string $accountName
     * @return array
     */
    public function getProperties(
        $resourceGroupName,
        $accountName
    )
    {
        return $this->_GetProperties_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'accountName' => $accountName
        ]);
    }
    /**
     * The update operation can be used to update the SKU, encryption, access tier, or tags for a storage account. It can also be used to map the account to a custom domain. Only one custom domain is supported per storage account; the replacement/change of custom domain is not supported. In order to replace an old custom domain, the old value must be cleared/unregistered before a new value can be set. The update of multiple properties is supported. This call does not change the storage keys for the account. If you want to change the storage account keys, use the regenerate keys operation. The location and name of the storage account cannot be changed after creation.
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
     * Lists all the storage accounts available under the subscription. Note that storage keys are not returned; use the ListKeys operation for this.
     * @return array
     */
    public function list_()
    {
        return $this->_List_operation->call([]);
    }
    /**
     * Lists all the storage accounts available under the given resource group. Note that storage keys are not returned; use the ListKeys operation for this.
     * @param string $resourceGroupName
     * @return array
     */
    public function listByResourceGroup($resourceGroupName)
    {
        return $this->_ListByResourceGroup_operation->call(['resourceGroupName' => $resourceGroupName]);
    }
    /**
     * Lists the access keys for the specified storage account.
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
     * Regenerates one of the access keys for the specified storage account.
     * @param string $resourceGroupName
     * @param string $accountName
     * @param array $regenerateKey
     * @return array
     */
    public function regenerateKey(
        $resourceGroupName,
        $accountName,
        array $regenerateKey
    )
    {
        return $this->_RegenerateKey_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'accountName' => $accountName,
            'regenerateKey' => $regenerateKey
        ]);
    }
    /**
     * List SAS credentials of a storage account.
     * @param string $resourceGroupName
     * @param string $accountName
     * @param array $parameters
     * @return array
     */
    public function listAccountSAS(
        $resourceGroupName,
        $accountName,
        array $parameters
    )
    {
        return $this->_ListAccountSAS_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'accountName' => $accountName,
            'parameters' => $parameters
        ]);
    }
    /**
     * List service SAS credentials of a specific resource.
     * @param string $resourceGroupName
     * @param string $accountName
     * @param array $parameters
     * @return array
     */
    public function listServiceSAS(
        $resourceGroupName,
        $accountName,
        array $parameters
    )
    {
        return $this->_ListServiceSAS_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'accountName' => $accountName,
            'parameters' => $parameters
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_CheckNameAvailability_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Create_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Delete_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_GetProperties_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Update_operation;
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
    private $_RegenerateKey_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListAccountSAS_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListServiceSAS_operation;
}
