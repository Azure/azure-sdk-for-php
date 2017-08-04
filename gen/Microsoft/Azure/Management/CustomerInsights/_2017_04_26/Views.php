<?php
namespace Microsoft\Azure\Management\CustomerInsights\_2017_04_26;
final class Views
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_ListByHub_operation = $_client->createOperation('Views_ListByHub');
        $this->_CreateOrUpdate_operation = $_client->createOperation('Views_CreateOrUpdate');
        $this->_Get_operation = $_client->createOperation('Views_Get');
        $this->_Delete_operation = $_client->createOperation('Views_Delete');
    }
    /**
     * Gets all available views for given user in the specified hub.
     * @param string $resourceGroupName
     * @param string $hubName
     * @param string $userId
     * @return array
     */
    public function listByHub(
        $resourceGroupName,
        $hubName,
        $userId
    )
    {
        return $this->_ListByHub_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'hubName' => $hubName,
            'userId' => $userId
        ]);
    }
    /**
     * Creates a view or updates an exisiting view in the hub.
     * @param string $resourceGroupName
     * @param string $hubName
     * @param string $viewName
     * @param array $parameters
     * @return array
     */
    public function createOrUpdate(
        $resourceGroupName,
        $hubName,
        $viewName,
        array $parameters
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'hubName' => $hubName,
            'viewName' => $viewName,
            'parameters' => $parameters
        ]);
    }
    /**
     * Gets a view in the hub.
     * @param string $resourceGroupName
     * @param string $hubName
     * @param string $viewName
     * @param string $userId
     * @return array
     */
    public function get(
        $resourceGroupName,
        $hubName,
        $viewName,
        $userId
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'hubName' => $hubName,
            'viewName' => $viewName,
            'userId' => $userId
        ]);
    }
    /**
     * Deletes a view in the specified hub.
     * @param string $resourceGroupName
     * @param string $hubName
     * @param string $viewName
     * @param string $userId
     */
    public function delete(
        $resourceGroupName,
        $hubName,
        $viewName,
        $userId
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'hubName' => $hubName,
            'viewName' => $viewName,
            'userId' => $userId
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListByHub_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_CreateOrUpdate_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Get_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Delete_operation;
}
