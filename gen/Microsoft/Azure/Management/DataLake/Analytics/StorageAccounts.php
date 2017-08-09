<?php
namespace Microsoft\Azure\Management\DataLake\Analytics;
final class StorageAccounts
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_Add_operation = $_client->createOperation('StorageAccounts_Add');
        $this->_Update_operation = $_client->createOperation('StorageAccounts_Update');
        $this->_Delete_operation = $_client->createOperation('StorageAccounts_Delete');
        $this->_Get_operation = $_client->createOperation('StorageAccounts_Get');
        $this->_GetStorageContainer_operation = $_client->createOperation('StorageAccounts_GetStorageContainer');
        $this->_ListStorageContainers_operation = $_client->createOperation('StorageAccounts_ListStorageContainers');
        $this->_ListSasTokens_operation = $_client->createOperation('StorageAccounts_ListSasTokens');
        $this->_ListByAccount_operation = $_client->createOperation('StorageAccounts_ListByAccount');
    }
    /**
     * Updates the specified Data Lake Analytics account to add an Azure Storage account.
     * @param string $resourceGroupName
     * @param string $accountName
     * @param string $storageAccountName
     * @param array $parameters
     */
    public function add(
        $resourceGroupName,
        $accountName,
        $storageAccountName,
        array $parameters
    )
    {
        return $this->_Add_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'accountName' => $accountName,
            'storageAccountName' => $storageAccountName,
            'parameters' => $parameters
        ]);
    }
    /**
     * Updates the Data Lake Analytics account to replace Azure Storage blob account details, such as the access key and/or suffix.
     * @param string $resourceGroupName
     * @param string $accountName
     * @param string $storageAccountName
     * @param array|null $parameters
     */
    public function update(
        $resourceGroupName,
        $accountName,
        $storageAccountName,
        array $parameters = null
    )
    {
        return $this->_Update_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'accountName' => $accountName,
            'storageAccountName' => $storageAccountName,
            'parameters' => $parameters
        ]);
    }
    /**
     * Updates the specified Data Lake Analytics account to remove an Azure Storage account.
     * @param string $resourceGroupName
     * @param string $accountName
     * @param string $storageAccountName
     */
    public function delete(
        $resourceGroupName,
        $accountName,
        $storageAccountName
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'accountName' => $accountName,
            'storageAccountName' => $storageAccountName
        ]);
    }
    /**
     * Gets the specified Azure Storage account linked to the given Data Lake Analytics account.
     * @param string $resourceGroupName
     * @param string $accountName
     * @param string $storageAccountName
     * @return array
     */
    public function get(
        $resourceGroupName,
        $accountName,
        $storageAccountName
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'accountName' => $accountName,
            'storageAccountName' => $storageAccountName
        ]);
    }
    /**
     * Gets the specified Azure Storage container associated with the given Data Lake Analytics and Azure Storage accounts.
     * @param string $resourceGroupName
     * @param string $accountName
     * @param string $storageAccountName
     * @param string $containerName
     * @return array
     */
    public function getStorageContainer(
        $resourceGroupName,
        $accountName,
        $storageAccountName,
        $containerName
    )
    {
        return $this->_GetStorageContainer_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'accountName' => $accountName,
            'storageAccountName' => $storageAccountName,
            'containerName' => $containerName
        ]);
    }
    /**
     * Lists the Azure Storage containers, if any, associated with the specified Data Lake Analytics and Azure Storage account combination. The response includes a link to the next page of results, if any.
     * @param string $resourceGroupName
     * @param string $accountName
     * @param string $storageAccountName
     * @return array
     */
    public function listStorageContainers(
        $resourceGroupName,
        $accountName,
        $storageAccountName
    )
    {
        return $this->_ListStorageContainers_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'accountName' => $accountName,
            'storageAccountName' => $storageAccountName
        ]);
    }
    /**
     * Gets the SAS token associated with the specified Data Lake Analytics and Azure Storage account and container combination.
     * @param string $resourceGroupName
     * @param string $accountName
     * @param string $storageAccountName
     * @param string $containerName
     * @return array
     */
    public function listSasTokens(
        $resourceGroupName,
        $accountName,
        $storageAccountName,
        $containerName
    )
    {
        return $this->_ListSasTokens_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'accountName' => $accountName,
            'storageAccountName' => $storageAccountName,
            'containerName' => $containerName
        ]);
    }
    /**
     * Gets the first page of Azure Storage accounts, if any, linked to the specified Data Lake Analytics account. The response includes a link to the next page, if any.
     * @param string $resourceGroupName
     * @param string $accountName
     * @param string|null $_filter
     * @param integer|null $_top
     * @param integer|null $_skip
     * @param string|null $_select
     * @param string|null $_orderby
     * @param boolean|null $_count
     * @return array
     */
    public function listByAccount(
        $resourceGroupName,
        $accountName,
        $_filter = null,
        $_top = null,
        $_skip = null,
        $_select = null,
        $_orderby = null,
        $_count = null
    )
    {
        return $this->_ListByAccount_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'accountName' => $accountName,
            '$filter' => $_filter,
            '$top' => $_top,
            '$skip' => $_skip,
            '$select' => $_select,
            '$orderby' => $_orderby,
            '$count' => $_count
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Add_operation;
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
    private $_GetStorageContainer_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListStorageContainers_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListSasTokens_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListByAccount_operation;
}
