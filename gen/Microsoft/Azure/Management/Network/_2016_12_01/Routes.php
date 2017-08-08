<?php
namespace Microsoft\Azure\Management\Network\_2016_12_01;
final class Routes
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_Delete_operation = $_client->createOperation('Routes_Delete');
        $this->_Get_operation = $_client->createOperation('Routes_Get');
        $this->_CreateOrUpdate_operation = $_client->createOperation('Routes_CreateOrUpdate');
        $this->_List_operation = $_client->createOperation('Routes_List');
    }
    /**
     * Deletes the specified route from a route table.
     * @param string $resourceGroupName
     * @param string $routeTableName
     * @param string $routeName
     */
    public function delete(
        $resourceGroupName,
        $routeTableName,
        $routeName
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'routeTableName' => $routeTableName,
            'routeName' => $routeName
        ]);
    }
    /**
     * Gets the specified route from a route table.
     * @param string $resourceGroupName
     * @param string $routeTableName
     * @param string $routeName
     * @return array
     */
    public function get(
        $resourceGroupName,
        $routeTableName,
        $routeName
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'routeTableName' => $routeTableName,
            'routeName' => $routeName
        ]);
    }
    /**
     * Creates or updates a route in the specified route table.
     * @param string $resourceGroupName
     * @param string $routeTableName
     * @param string $routeName
     * @param array $routeParameters
     * @return array
     */
    public function createOrUpdate(
        $resourceGroupName,
        $routeTableName,
        $routeName,
        array $routeParameters
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'routeTableName' => $routeTableName,
            'routeName' => $routeName,
            'routeParameters' => $routeParameters
        ]);
    }
    /**
     * Gets all routes in a route table.
     * @param string $resourceGroupName
     * @param string $routeTableName
     * @return array
     */
    public function list_(
        $resourceGroupName,
        $routeTableName
    )
    {
        return $this->_List_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'routeTableName' => $routeTableName
        ]);
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
}
