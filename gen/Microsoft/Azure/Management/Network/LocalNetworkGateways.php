<?php
namespace Microsoft\Azure\Management\Network;
final class LocalNetworkGateways
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_CreateOrUpdate_operation = $_client->createOperation('LocalNetworkGateways_CreateOrUpdate');
        $this->_Get_operation = $_client->createOperation('LocalNetworkGateways_Get');
        $this->_Delete_operation = $_client->createOperation('LocalNetworkGateways_Delete');
        $this->_List_operation = $_client->createOperation('LocalNetworkGateways_List');
    }
    /**
     * Creates or updates a local network gateway in the specified resource group.
     * @param string $resourceGroupName
     * @param string $localNetworkGatewayName
     * @param array $parameters
     * @return array
     */
    public function createOrUpdate(
        $resourceGroupName,
        $localNetworkGatewayName,
        array $parameters
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'localNetworkGatewayName' => $localNetworkGatewayName,
            'parameters' => $parameters
        ]);
    }
    /**
     * Gets the specified local network gateway in a resource group.
     * @param string $resourceGroupName
     * @param string $localNetworkGatewayName
     * @return array
     */
    public function get(
        $resourceGroupName,
        $localNetworkGatewayName
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'localNetworkGatewayName' => $localNetworkGatewayName
        ]);
    }
    /**
     * Deletes the specified local network gateway.
     * @param string $resourceGroupName
     * @param string $localNetworkGatewayName
     */
    public function delete(
        $resourceGroupName,
        $localNetworkGatewayName
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'localNetworkGatewayName' => $localNetworkGatewayName
        ]);
    }
    /**
     * Gets all the local network gateways in a resource group.
     * @param string $resourceGroupName
     * @return array
     */
    public function list_($resourceGroupName)
    {
        return $this->_List_operation->call(['resourceGroupName' => $resourceGroupName]);
    }
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
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_List_operation;
}
