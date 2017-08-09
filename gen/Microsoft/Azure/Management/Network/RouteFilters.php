<?php
namespace Microsoft\Azure\Management\Network;
final class RouteFilters
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_Delete_operation = $_client->createOperation('RouteFilters_Delete');
        $this->_Get_operation = $_client->createOperation('RouteFilters_Get');
        $this->_CreateOrUpdate_operation = $_client->createOperation('RouteFilters_CreateOrUpdate');
        $this->_Update_operation = $_client->createOperation('RouteFilters_Update');
        $this->_ListByResourceGroup_operation = $_client->createOperation('RouteFilters_ListByResourceGroup');
        $this->_List_operation = $_client->createOperation('RouteFilters_List');
    }
    /**
     * Deletes the specified route filter.
     * @param string $resourceGroupName
     * @param string $routeFilterName
     */
    public function delete(
        $resourceGroupName,
        $routeFilterName
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'routeFilterName' => $routeFilterName
        ]);
    }
    /**
     * Gets the specified route filter.
     * @param string $resourceGroupName
     * @param string $routeFilterName
     * @param string|null $_expand
     * @return array
     */
    public function get(
        $resourceGroupName,
        $routeFilterName,
        $_expand = null
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'routeFilterName' => $routeFilterName,
            '$expand' => $_expand
        ]);
    }
    /**
     * Creates or updates a route filter in a specified resource group.
     * @param string $resourceGroupName
     * @param string $routeFilterName
     * @param array $routeFilterParameters
     * @return array
     */
    public function createOrUpdate(
        $resourceGroupName,
        $routeFilterName,
        array $routeFilterParameters
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'routeFilterName' => $routeFilterName,
            'routeFilterParameters' => $routeFilterParameters
        ]);
    }
    /**
     * Updates a route filter in a specified resource group.
     * @param string $resourceGroupName
     * @param string $routeFilterName
     * @param array $routeFilterParameters
     * @return array
     */
    public function update(
        $resourceGroupName,
        $routeFilterName,
        array $routeFilterParameters
    )
    {
        return $this->_Update_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'routeFilterName' => $routeFilterName,
            'routeFilterParameters' => $routeFilterParameters
        ]);
    }
    /**
     * Gets all route filters in a resource group.
     * @param string $resourceGroupName
     * @return array
     */
    public function listByResourceGroup($resourceGroupName)
    {
        return $this->_ListByResourceGroup_operation->call(['resourceGroupName' => $resourceGroupName]);
    }
    /**
     * Gets all route filters in a subscription.
     * @return array
     */
    public function list_()
    {
        return $this->_List_operation->call([]);
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
    private $_Update_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListByResourceGroup_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_List_operation;
}
