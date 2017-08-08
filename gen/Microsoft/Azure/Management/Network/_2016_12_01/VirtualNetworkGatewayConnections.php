<?php
namespace Microsoft\Azure\Management\Network\_2016_12_01;
final class VirtualNetworkGatewayConnections
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_CreateOrUpdate_operation = $_client->createOperation('VirtualNetworkGatewayConnections_CreateOrUpdate');
        $this->_Get_operation = $_client->createOperation('VirtualNetworkGatewayConnections_Get');
        $this->_Delete_operation = $_client->createOperation('VirtualNetworkGatewayConnections_Delete');
        $this->_SetSharedKey_operation = $_client->createOperation('VirtualNetworkGatewayConnections_SetSharedKey');
        $this->_GetSharedKey_operation = $_client->createOperation('VirtualNetworkGatewayConnections_GetSharedKey');
        $this->_List_operation = $_client->createOperation('VirtualNetworkGatewayConnections_List');
        $this->_ResetSharedKey_operation = $_client->createOperation('VirtualNetworkGatewayConnections_ResetSharedKey');
    }
    /**
     * Creates or updates a virtual network gateway connection in the specified resource group.
     * @param string $resourceGroupName
     * @param string $virtualNetworkGatewayConnectionName
     * @param array $parameters
     * @return array
     */
    public function createOrUpdate(
        $resourceGroupName,
        $virtualNetworkGatewayConnectionName,
        array $parameters
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'virtualNetworkGatewayConnectionName' => $virtualNetworkGatewayConnectionName,
            'parameters' => $parameters
        ]);
    }
    /**
     * Gets the specified virtual network gateway connection by resource group.
     * @param string $resourceGroupName
     * @param string $virtualNetworkGatewayConnectionName
     * @return array
     */
    public function get(
        $resourceGroupName,
        $virtualNetworkGatewayConnectionName
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'virtualNetworkGatewayConnectionName' => $virtualNetworkGatewayConnectionName
        ]);
    }
    /**
     * Deletes the specified virtual network Gateway connection.
     * @param string $resourceGroupName
     * @param string $virtualNetworkGatewayConnectionName
     */
    public function delete(
        $resourceGroupName,
        $virtualNetworkGatewayConnectionName
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'virtualNetworkGatewayConnectionName' => $virtualNetworkGatewayConnectionName
        ]);
    }
    /**
     * The Put VirtualNetworkGatewayConnectionSharedKey operation sets the virtual network gateway connection shared key for passed virtual network gateway connection in the specified resource group through Network resource provider.
     * @param string $resourceGroupName
     * @param string $virtualNetworkGatewayConnectionName
     * @param array $parameters
     * @return array
     */
    public function setSharedKey(
        $resourceGroupName,
        $virtualNetworkGatewayConnectionName,
        array $parameters
    )
    {
        return $this->_SetSharedKey_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'virtualNetworkGatewayConnectionName' => $virtualNetworkGatewayConnectionName,
            'parameters' => $parameters
        ]);
    }
    /**
     * The Get VirtualNetworkGatewayConnectionSharedKey operation retrieves information about the specified virtual network gateway connection shared key through Network resource provider.
     * @param string $resourceGroupName
     * @param string $virtualNetworkGatewayConnectionName
     * @return array
     */
    public function getSharedKey(
        $resourceGroupName,
        $virtualNetworkGatewayConnectionName
    )
    {
        return $this->_GetSharedKey_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'virtualNetworkGatewayConnectionName' => $virtualNetworkGatewayConnectionName
        ]);
    }
    /**
     * The List VirtualNetworkGatewayConnections operation retrieves all the virtual network gateways connections created.
     * @param string $resourceGroupName
     * @return array
     */
    public function list_($resourceGroupName)
    {
        return $this->_List_operation->call(['resourceGroupName' => $resourceGroupName]);
    }
    /**
     * The VirtualNetworkGatewayConnectionResetSharedKey operation resets the virtual network gateway connection shared key for passed virtual network gateway connection in the specified resource group through Network resource provider.
     * @param string $resourceGroupName
     * @param string $virtualNetworkGatewayConnectionName
     * @param array $parameters
     * @return array
     */
    public function resetSharedKey(
        $resourceGroupName,
        $virtualNetworkGatewayConnectionName,
        array $parameters
    )
    {
        return $this->_ResetSharedKey_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'virtualNetworkGatewayConnectionName' => $virtualNetworkGatewayConnectionName,
            'parameters' => $parameters
        ]);
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
    private $_SetSharedKey_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_GetSharedKey_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_List_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ResetSharedKey_operation;
}
