<?php
namespace Microsoft\Azure\Management\MySql;
final class Servers
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_CreateOrUpdate_operation = $_client->createOperation('Servers_CreateOrUpdate');
        $this->_Update_operation = $_client->createOperation('Servers_Update');
        $this->_Delete_operation = $_client->createOperation('Servers_Delete');
        $this->_Get_operation = $_client->createOperation('Servers_Get');
        $this->_ListByResourceGroup_operation = $_client->createOperation('Servers_ListByResourceGroup');
        $this->_List_operation = $_client->createOperation('Servers_List');
    }
    /**
     * Creates a new server or updates an existing server. The update action will overwrite the existing server.
     * @param string $resourceGroupName
     * @param string $serverName
     * @param array $parameters
     * @return array
     */
    public function createOrUpdate(
        $resourceGroupName,
        $serverName,
        array $parameters
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serverName' => $serverName,
            'parameters' => $parameters
        ]);
    }
    /**
     * Updates an existing server. The request body can contain one to many of the properties present in the normal server definition.
     * @param string $resourceGroupName
     * @param string $serverName
     * @param array $parameters
     * @return array
     */
    public function update(
        $resourceGroupName,
        $serverName,
        array $parameters
    )
    {
        return $this->_Update_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serverName' => $serverName,
            'parameters' => $parameters
        ]);
    }
    /**
     * Deletes a server.
     * @param string $resourceGroupName
     * @param string $serverName
     */
    public function delete(
        $resourceGroupName,
        $serverName
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serverName' => $serverName
        ]);
    }
    /**
     * Gets information about a server.
     * @param string $resourceGroupName
     * @param string $serverName
     * @return array
     */
    public function get(
        $resourceGroupName,
        $serverName
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serverName' => $serverName
        ]);
    }
    /**
     * List all the servers in a given resource group.
     * @param string $resourceGroupName
     * @return array
     */
    public function listByResourceGroup($resourceGroupName)
    {
        return $this->_ListByResourceGroup_operation->call(['resourceGroupName' => $resourceGroupName]);
    }
    /**
     * List all the servers in a given subscription.
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
