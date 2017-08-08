<?php
namespace Microsoft\Azure\Management\Network\_2016_12_01;
final class ApplicationGateways
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_Delete_operation = $_client->createOperation('ApplicationGateways_Delete');
        $this->_Get_operation = $_client->createOperation('ApplicationGateways_Get');
        $this->_CreateOrUpdate_operation = $_client->createOperation('ApplicationGateways_CreateOrUpdate');
        $this->_List_operation = $_client->createOperation('ApplicationGateways_List');
        $this->_ListAll_operation = $_client->createOperation('ApplicationGateways_ListAll');
        $this->_Start_operation = $_client->createOperation('ApplicationGateways_Start');
        $this->_Stop_operation = $_client->createOperation('ApplicationGateways_Stop');
        $this->_BackendHealth_operation = $_client->createOperation('ApplicationGateways_BackendHealth');
    }
    /**
     * Deletes the specified application gateway.
     * @param string $resourceGroupName
     * @param string $applicationGatewayName
     */
    public function delete(
        $resourceGroupName,
        $applicationGatewayName
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'applicationGatewayName' => $applicationGatewayName
        ]);
    }
    /**
     * Gets the specified application gateway.
     * @param string $resourceGroupName
     * @param string $applicationGatewayName
     * @return array
     */
    public function get(
        $resourceGroupName,
        $applicationGatewayName
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'applicationGatewayName' => $applicationGatewayName
        ]);
    }
    /**
     * Creates or updates the specified application gateway.
     * @param string $resourceGroupName
     * @param string $applicationGatewayName
     * @param array $parameters
     * @return array
     */
    public function createOrUpdate(
        $resourceGroupName,
        $applicationGatewayName,
        array $parameters
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'applicationGatewayName' => $applicationGatewayName,
            'parameters' => $parameters
        ]);
    }
    /**
     * Lists all application gateways in a resource group.
     * @param string $resourceGroupName
     * @return array
     */
    public function list_($resourceGroupName)
    {
        return $this->_List_operation->call(['resourceGroupName' => $resourceGroupName]);
    }
    /**
     * Gets all the application gateways in a subscription.
     * @return array
     */
    public function listAll()
    {
        return $this->_ListAll_operation->call([]);
    }
    /**
     * Starts the specified application gateway.
     * @param string $resourceGroupName
     * @param string $applicationGatewayName
     */
    public function start(
        $resourceGroupName,
        $applicationGatewayName
    )
    {
        return $this->_Start_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'applicationGatewayName' => $applicationGatewayName
        ]);
    }
    /**
     * Stops the specified application gateway in a resource group.
     * @param string $resourceGroupName
     * @param string $applicationGatewayName
     */
    public function stop(
        $resourceGroupName,
        $applicationGatewayName
    )
    {
        return $this->_Stop_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'applicationGatewayName' => $applicationGatewayName
        ]);
    }
    /**
     * Gets the backend health of the specified application gateway in a resource group.
     * @param string $resourceGroupName
     * @param string $applicationGatewayName
     * @param string $_expand
     * @return array
     */
    public function backendHealth(
        $resourceGroupName,
        $applicationGatewayName,
        $_expand
    )
    {
        return $this->_BackendHealth_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'applicationGatewayName' => $applicationGatewayName,
            '$expand' => $_expand
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
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListAll_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Start_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Stop_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_BackendHealth_operation;
}
