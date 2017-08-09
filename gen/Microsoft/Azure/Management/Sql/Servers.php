<?php
namespace Microsoft\Azure\Management\Sql;
final class Servers
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_CheckNameAvailability_operation = $_client->createOperation('Servers_CheckNameAvailability');
        $this->_List_operation = $_client->createOperation('Servers_List');
        $this->_ListByResourceGroup_operation = $_client->createOperation('Servers_ListByResourceGroup');
        $this->_Get_operation = $_client->createOperation('Servers_Get');
        $this->_CreateOrUpdate_operation = $_client->createOperation('Servers_CreateOrUpdate');
        $this->_Delete_operation = $_client->createOperation('Servers_Delete');
        $this->_Update_operation = $_client->createOperation('Servers_Update');
    }
    /**
     * Determines whether a resource can be created with the specified name.
     * @param array $parameters
     * @return array
     */
    public function checkNameAvailability(array $parameters)
    {
        return $this->_CheckNameAvailability_operation->call(['parameters' => $parameters]);
    }
    /**
     * Gets a list of all servers in the subscription.
     * @return array
     */
    public function list_()
    {
        return $this->_List_operation->call([]);
    }
    /**
     * Gets a list of servers in a resource groups.
     * @param string $resourceGroupName
     * @return array
     */
    public function listByResourceGroup($resourceGroupName)
    {
        return $this->_ListByResourceGroup_operation->call(['resourceGroupName' => $resourceGroupName]);
    }
    /**
     * Gets a server.
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
     * Creates or updates a server.
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
     * Updates a server.
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
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_CheckNameAvailability_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_List_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListByResourceGroup_operation;
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
    private $_Delete_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Update_operation;
}
