<?php
namespace Microsoft\Azure\Management\DataLake\Store;
final class Account
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_Create_operation = $_client->createOperation('Account_Create');
        $this->_Update_operation = $_client->createOperation('Account_Update');
        $this->_Delete_operation = $_client->createOperation('Account_Delete');
        $this->_Get_operation = $_client->createOperation('Account_Get');
        $this->_EnableKeyVault_operation = $_client->createOperation('Account_EnableKeyVault');
        $this->_ListByResourceGroup_operation = $_client->createOperation('Account_ListByResourceGroup');
        $this->_List_operation = $_client->createOperation('Account_List');
    }
    /**
     * Creates the specified Data Lake Store account.
     * @param string $resourceGroupName
     * @param string $name
     * @param array $parameters
     * @return array
     */
    public function create(
        $resourceGroupName,
        $name,
        array $parameters
    )
    {
        return $this->_Create_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'parameters' => $parameters
        ]);
    }
    /**
     * Updates the specified Data Lake Store account information.
     * @param string $resourceGroupName
     * @param string $name
     * @param array $parameters
     * @return array
     */
    public function update(
        $resourceGroupName,
        $name,
        array $parameters
    )
    {
        return $this->_Update_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name,
            'parameters' => $parameters
        ]);
    }
    /**
     * Deletes the specified Data Lake Store account.
     * @param string $resourceGroupName
     * @param string $name
     */
    public function delete(
        $resourceGroupName,
        $name
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name
        ]);
    }
    /**
     * Gets the specified Data Lake Store account.
     * @param string $resourceGroupName
     * @param string $name
     * @return array
     */
    public function get(
        $resourceGroupName,
        $name
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'name' => $name
        ]);
    }
    /**
     * Attempts to enable a user managed Key Vault for encryption of the specified Data Lake Store account.
     * @param string $resourceGroupName
     * @param string $accountName
     */
    public function enableKeyVault(
        $resourceGroupName,
        $accountName
    )
    {
        return $this->_EnableKeyVault_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'accountName' => $accountName
        ]);
    }
    /**
     * Lists the Data Lake Store accounts within a specific resource group. The response includes a link to the next page of results, if any.
     * @param string $resourceGroupName
     * @param string $_filter
     * @param integer $_top
     * @param integer $_skip
     * @param string $_select
     * @param string $_orderby
     * @param boolean $_count
     * @return array
     */
    public function listByResourceGroup(
        $resourceGroupName,
        $_filter,
        $_top,
        $_skip,
        $_select,
        $_orderby,
        $_count
    )
    {
        return $this->_ListByResourceGroup_operation->call([
            'resourceGroupName' => $resourceGroupName,
            '$filter' => $_filter,
            '$top' => $_top,
            '$skip' => $_skip,
            '$select' => $_select,
            '$orderby' => $_orderby,
            '$count' => $_count
        ]);
    }
    /**
     * Lists the Data Lake Store accounts within the subscription. The response includes a link to the next page of results, if any.
     * @param string $_filter
     * @param integer $_top
     * @param integer $_skip
     * @param string $_select
     * @param string $_orderby
     * @param boolean $_count
     * @return array
     */
    public function list_(
        $_filter,
        $_top,
        $_skip,
        $_select,
        $_orderby,
        $_count
    )
    {
        return $this->_List_operation->call([
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
    private $_EnableKeyVault_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListByResourceGroup_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_List_operation;
}
