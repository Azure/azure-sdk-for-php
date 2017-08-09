<?php
namespace Microsoft\Azure\Management\DataLake\Analytics;
final class Account
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_ListByResourceGroup_operation = $_client->createOperation('Account_ListByResourceGroup');
        $this->_List_operation = $_client->createOperation('Account_List');
        $this->_Create_operation = $_client->createOperation('Account_Create');
        $this->_Update_operation = $_client->createOperation('Account_Update');
        $this->_Delete_operation = $_client->createOperation('Account_Delete');
        $this->_Get_operation = $_client->createOperation('Account_Get');
    }
    /**
     * Gets the first page of Data Lake Analytics accounts, if any, within a specific resource group. This includes a link to the next page, if any.
     * @param string $resourceGroupName
     * @param string|null $_filter
     * @param integer|null $_top
     * @param integer|null $_skip
     * @param string|null $_select
     * @param string|null $_orderby
     * @param boolean|null $_count
     * @return array
     */
    public function listByResourceGroup(
        $resourceGroupName,
        $_filter = null,
        $_top = null,
        $_skip = null,
        $_select = null,
        $_orderby = null,
        $_count = null
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
     * Gets the first page of Data Lake Analytics accounts, if any, within the current subscription. This includes a link to the next page, if any.
     * @param string|null $_filter
     * @param integer|null $_top
     * @param integer|null $_skip
     * @param string|null $_select
     * @param string|null $_orderby
     * @param boolean|null $_count
     * @return array
     */
    public function list_(
        $_filter = null,
        $_top = null,
        $_skip = null,
        $_select = null,
        $_orderby = null,
        $_count = null
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
     * Creates the specified Data Lake Analytics account. This supplies the user with computation services for Data Lake Analytics workloads
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
     * Updates the Data Lake Analytics account object specified by the accountName with the contents of the account object.
     * @param string $resourceGroupName
     * @param string $accountName
     * @param array|null $parameters
     * @return array
     */
    public function update(
        $resourceGroupName,
        $accountName,
        array $parameters = null
    )
    {
        return $this->_Update_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'accountName' => $accountName,
            'parameters' => $parameters
        ]);
    }
    /**
     * Begins the delete process for the Data Lake Analytics account object specified by the account name.
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
     * Gets details of the specified Data Lake Analytics account.
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
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListByResourceGroup_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_List_operation;
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
}
