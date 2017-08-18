<?php
namespace Microsoft\Azure\Management\Analysis;
final class Servers
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_GetDetails_operation = $_client->createOperation('Servers_GetDetails');
        $this->_Create_operation = $_client->createOperation('Servers_Create');
        $this->_Delete_operation = $_client->createOperation('Servers_Delete');
        $this->_Update_operation = $_client->createOperation('Servers_Update');
        $this->_Suspend_operation = $_client->createOperation('Servers_Suspend');
        $this->_Resume_operation = $_client->createOperation('Servers_Resume');
        $this->_ListByResourceGroup_operation = $_client->createOperation('Servers_ListByResourceGroup');
        $this->_List_operation = $_client->createOperation('Servers_List');
        $this->_ListSkusForNew_operation = $_client->createOperation('Servers_ListSkusForNew');
        $this->_ListSkusForExisting_operation = $_client->createOperation('Servers_ListSkusForExisting');
        $this->_ListGatewayStatus_operation = $_client->createOperation('Servers_ListGatewayStatus');
    }
    /**
     * Gets details about the specified Analysis Services server.
     * @param string $resourceGroupName
     * @param string $serverName
     * @return array
     */
    public function getDetails(
        $resourceGroupName,
        $serverName
    )
    {
        return $this->_GetDetails_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serverName' => $serverName
        ]);
    }
    /**
     * Provisions the specified Analysis Services server based on the configuration specified in the request.
     * @param string $resourceGroupName
     * @param string $serverName
     * @param array $serverParameters
     * @return array
     */
    public function create(
        $resourceGroupName,
        $serverName,
        array $serverParameters
    )
    {
        return $this->_Create_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serverName' => $serverName,
            'serverParameters' => $serverParameters
        ]);
    }
    /**
     * Deletes the specified Analysis Services server.
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
     * Updates the current state of the specified Analysis Services server.
     * @param string $resourceGroupName
     * @param string $serverName
     * @param array $serverUpdateParameters
     * @return array
     */
    public function update(
        $resourceGroupName,
        $serverName,
        array $serverUpdateParameters
    )
    {
        return $this->_Update_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serverName' => $serverName,
            'serverUpdateParameters' => $serverUpdateParameters
        ]);
    }
    /**
     * Supends operation of the specified Analysis Services server instance.
     * @param string $resourceGroupName
     * @param string $serverName
     */
    public function suspend(
        $resourceGroupName,
        $serverName
    )
    {
        return $this->_Suspend_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serverName' => $serverName
        ]);
    }
    /**
     * Resumes operation of the specified Analysis Services server instance.
     * @param string $resourceGroupName
     * @param string $serverName
     */
    public function resume(
        $resourceGroupName,
        $serverName
    )
    {
        return $this->_Resume_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serverName' => $serverName
        ]);
    }
    /**
     * Gets all the Analysis Services servers for the given resource group.
     * @param string $resourceGroupName
     * @return array
     */
    public function listByResourceGroup($resourceGroupName)
    {
        return $this->_ListByResourceGroup_operation->call(['resourceGroupName' => $resourceGroupName]);
    }
    /**
     * Lists all the Analysis Services servers for the given subscription.
     * @return array
     */
    public function list_()
    {
        return $this->_List_operation->call([]);
    }
    /**
     * Lists eligible SKUs for Analysis Services resource provider.
     * @return array
     */
    public function listSkusForNew()
    {
        return $this->_ListSkusForNew_operation->call([]);
    }
    /**
     * Lists eligible SKUs for an Analysis Services resource.
     * @param string $resourceGroupName
     * @param string $serverName
     * @return array
     */
    public function listSkusForExisting(
        $resourceGroupName,
        $serverName
    )
    {
        return $this->_ListSkusForExisting_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serverName' => $serverName
        ]);
    }
    /**
     * Return the gateway status of the specified Analysis Services server instance.
     * @param string $resourceGroupName
     * @param string $serverName
     * @return array
     */
    public function listGatewayStatus(
        $resourceGroupName,
        $serverName
    )
    {
        return $this->_ListGatewayStatus_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'serverName' => $serverName
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_GetDetails_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Create_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Delete_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Update_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Suspend_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Resume_operation;
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
    private $_ListSkusForNew_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListSkusForExisting_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListGatewayStatus_operation;
}
