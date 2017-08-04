<?php
namespace Microsoft\Azure\Management\CustomerInsights\_2017_04_26;
final class Hubs
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_CreateOrUpdate_operation = $_client->createOperation('Hubs_CreateOrUpdate');
        $this->_Update_operation = $_client->createOperation('Hubs_Update');
        $this->_Delete_operation = $_client->createOperation('Hubs_Delete');
        $this->_Get_operation = $_client->createOperation('Hubs_Get');
        $this->_ListByResourceGroup_operation = $_client->createOperation('Hubs_ListByResourceGroup');
        $this->_List_operation = $_client->createOperation('Hubs_List');
    }
    /**
     * Creates a hub, or updates an existing hub.
     * @param string $resourceGroupName
     * @param string $hubName
     * @param array $parameters
     * @return array
     */
    public function createOrUpdate(
        $resourceGroupName,
        $hubName,
        array $parameters
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'hubName' => $hubName,
            'parameters' => $parameters
        ]);
    }
    /**
     * Updates a Hub.
     * @param string $resourceGroupName
     * @param string $hubName
     * @param array $parameters
     * @return array
     */
    public function update(
        $resourceGroupName,
        $hubName,
        array $parameters
    )
    {
        return $this->_Update_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'hubName' => $hubName,
            'parameters' => $parameters
        ]);
    }
    /**
     * Deletes the specified hub.
     * @param string $resourceGroupName
     * @param string $hubName
     */
    public function delete(
        $resourceGroupName,
        $hubName
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'hubName' => $hubName
        ]);
    }
    /**
     * Gets information about the specified hub.
     * @param string $resourceGroupName
     * @param string $hubName
     * @return array
     */
    public function get(
        $resourceGroupName,
        $hubName
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'hubName' => $hubName
        ]);
    }
    /**
     * Gets all the hubs in a resource group.
     * @param string $resourceGroupName
     * @return array
     */
    public function listByResourceGroup($resourceGroupName)
    {
        return $this->_ListByResourceGroup_operation->call(['resourceGroupName' => $resourceGroupName]);
    }
    /**
     * Gets all hubs in the specified subscription.
     * @return array
     */
    public function list_()
    {
        return $this->_List_operation->call([]);
    }
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
    private $_Delete_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Get_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListByResourceGroup_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_List_operation;
}
