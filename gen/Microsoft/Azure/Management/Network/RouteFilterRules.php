<?php
namespace Microsoft\Azure\Management\Network;
final class RouteFilterRules
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_Delete_operation = $_client->createOperation('RouteFilterRules_Delete');
        $this->_Get_operation = $_client->createOperation('RouteFilterRules_Get');
        $this->_CreateOrUpdate_operation = $_client->createOperation('RouteFilterRules_CreateOrUpdate');
        $this->_Update_operation = $_client->createOperation('RouteFilterRules_Update');
        $this->_ListByRouteFilter_operation = $_client->createOperation('RouteFilterRules_ListByRouteFilter');
    }
    /**
     * Deletes the specified rule from a route filter.
     * @param string $resourceGroupName
     * @param string $routeFilterName
     * @param string $ruleName
     */
    public function delete(
        $resourceGroupName,
        $routeFilterName,
        $ruleName
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'routeFilterName' => $routeFilterName,
            'ruleName' => $ruleName
        ]);
    }
    /**
     * Gets the specified rule from a route filter.
     * @param string $resourceGroupName
     * @param string $routeFilterName
     * @param string $ruleName
     * @return array
     */
    public function get(
        $resourceGroupName,
        $routeFilterName,
        $ruleName
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'routeFilterName' => $routeFilterName,
            'ruleName' => $ruleName
        ]);
    }
    /**
     * Creates or updates a route in the specified route filter.
     * @param string $resourceGroupName
     * @param string $routeFilterName
     * @param string $ruleName
     * @param array $routeFilterRuleParameters
     * @return array
     */
    public function createOrUpdate(
        $resourceGroupName,
        $routeFilterName,
        $ruleName,
        array $routeFilterRuleParameters
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'routeFilterName' => $routeFilterName,
            'ruleName' => $ruleName,
            'routeFilterRuleParameters' => $routeFilterRuleParameters
        ]);
    }
    /**
     * Updates a route in the specified route filter.
     * @param string $resourceGroupName
     * @param string $routeFilterName
     * @param string $ruleName
     * @param array $routeFilterRuleParameters
     * @return array
     */
    public function update(
        $resourceGroupName,
        $routeFilterName,
        $ruleName,
        array $routeFilterRuleParameters
    )
    {
        return $this->_Update_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'routeFilterName' => $routeFilterName,
            'ruleName' => $ruleName,
            'routeFilterRuleParameters' => $routeFilterRuleParameters
        ]);
    }
    /**
     * Gets all RouteFilterRules in a route filter.
     * @param string $resourceGroupName
     * @param string $routeFilterName
     * @return array
     */
    public function listByRouteFilter(
        $resourceGroupName,
        $routeFilterName
    )
    {
        return $this->_ListByRouteFilter_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'routeFilterName' => $routeFilterName
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
    private $_Update_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListByRouteFilter_operation;
}
