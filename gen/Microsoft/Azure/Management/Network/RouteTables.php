<?php
namespace Microsoft\Azure\Management\Network;
final class RouteTables
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_Delete_operation = $_client->createOperation('RouteTables_Delete');
        $this->_Get_operation = $_client->createOperation('RouteTables_Get');
        $this->_CreateOrUpdate_operation = $_client->createOperation('RouteTables_CreateOrUpdate');
        $this->_List_operation = $_client->createOperation('RouteTables_List');
        $this->_ListAll_operation = $_client->createOperation('RouteTables_ListAll');
    }
    /**
     * Deletes the specified route table.
     * @param string $resourceGroupName
     * @param string $routeTableName
     */
    public function delete(
        $resourceGroupName,
        $routeTableName
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'routeTableName' => $routeTableName
        ]);
    }
    /**
     * Gets the specified route table.
     * @param string $resourceGroupName
     * @param string $routeTableName
     * @param string|null $_expand
     * @return array
     */
    public function get(
        $resourceGroupName,
        $routeTableName,
        $_expand = null
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'routeTableName' => $routeTableName,
            '$expand' => $_expand
        ]);
    }
    /**
     * Create or updates a route table in a specified resource group.
     * @param string $resourceGroupName
     * @param string $routeTableName
     * @param array $parameters
     * @return array
     */
    public function createOrUpdate(
        $resourceGroupName,
        $routeTableName,
        array $parameters
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'routeTableName' => $routeTableName,
            'parameters' => $parameters
        ]);
    }
    /**
     * Gets all route tables in a resource group.
     * @param string $resourceGroupName
     * @return array
     */
    public function list_($resourceGroupName)
    {
        return $this->_List_operation->call(['resourceGroupName' => $resourceGroupName]);
    }
    /**
     * Gets all route tables in a subscription.
     * @return array
     */
    public function listAll()
    {
        return $this->_ListAll_operation->call([]);
    }
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
    private $_CreateOrUpdate_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_List_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListAll_operation;
}
