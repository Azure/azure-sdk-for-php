<?php
namespace Microsoft\Azure\Management\Network;
final class VirtualNetworkGateways
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_CreateOrUpdate_operation = $_client->createOperation('VirtualNetworkGateways_CreateOrUpdate');
        $this->_Get_operation = $_client->createOperation('VirtualNetworkGateways_Get');
        $this->_Delete_operation = $_client->createOperation('VirtualNetworkGateways_Delete');
        $this->_List_operation = $_client->createOperation('VirtualNetworkGateways_List');
        $this->_ListConnections_operation = $_client->createOperation('VirtualNetworkGateways_ListConnections');
        $this->_Reset_operation = $_client->createOperation('VirtualNetworkGateways_Reset');
        $this->_Generatevpnclientpackage_operation = $_client->createOperation('VirtualNetworkGateways_Generatevpnclientpackage');
        $this->_GenerateVpnProfile_operation = $_client->createOperation('VirtualNetworkGateways_GenerateVpnProfile');
        $this->_GetBgpPeerStatus_operation = $_client->createOperation('VirtualNetworkGateways_GetBgpPeerStatus');
        $this->_GetLearnedRoutes_operation = $_client->createOperation('VirtualNetworkGateways_GetLearnedRoutes');
        $this->_GetAdvertisedRoutes_operation = $_client->createOperation('VirtualNetworkGateways_GetAdvertisedRoutes');
    }
    /**
     * Creates or updates a virtual network gateway in the specified resource group.
     * @param string $resourceGroupName
     * @param string $virtualNetworkGatewayName
     * @param array $parameters
     * @return array
     */
    public function createOrUpdate(
        $resourceGroupName,
        $virtualNetworkGatewayName,
        array $parameters
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'virtualNetworkGatewayName' => $virtualNetworkGatewayName,
            'parameters' => $parameters
        ]);
    }
    /**
     * Gets the specified virtual network gateway by resource group.
     * @param string $resourceGroupName
     * @param string $virtualNetworkGatewayName
     * @return array
     */
    public function get(
        $resourceGroupName,
        $virtualNetworkGatewayName
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'virtualNetworkGatewayName' => $virtualNetworkGatewayName
        ]);
    }
    /**
     * Deletes the specified virtual network gateway.
     * @param string $resourceGroupName
     * @param string $virtualNetworkGatewayName
     */
    public function delete(
        $resourceGroupName,
        $virtualNetworkGatewayName
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'virtualNetworkGatewayName' => $virtualNetworkGatewayName
        ]);
    }
    /**
     * Gets all virtual network gateways by resource group.
     * @param string $resourceGroupName
     * @return array
     */
    public function list_($resourceGroupName)
    {
        return $this->_List_operation->call(['resourceGroupName' => $resourceGroupName]);
    }
    /**
     * Gets all the connections in a virtual network gateway.
     * @param string $resourceGroupName
     * @param string $virtualNetworkGatewayName
     * @return array
     */
    public function listConnections(
        $resourceGroupName,
        $virtualNetworkGatewayName
    )
    {
        return $this->_ListConnections_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'virtualNetworkGatewayName' => $virtualNetworkGatewayName
        ]);
    }
    /**
     * Resets the primary of the virtual network gateway in the specified resource group.
     * @param string $resourceGroupName
     * @param string $virtualNetworkGatewayName
     * @param string $gatewayVip
     * @return array
     */
    public function reset(
        $resourceGroupName,
        $virtualNetworkGatewayName,
        $gatewayVip
    )
    {
        return $this->_Reset_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'virtualNetworkGatewayName' => $virtualNetworkGatewayName,
            'gatewayVip' => $gatewayVip
        ]);
    }
    /**
     * Generates VPN client package for P2S client of the virtual network gateway in the specified resource group.
     * @param string $resourceGroupName
     * @param string $virtualNetworkGatewayName
     * @param array $parameters
     * @return string
     */
    public function generatevpnclientpackage(
        $resourceGroupName,
        $virtualNetworkGatewayName,
        array $parameters
    )
    {
        return $this->_Generatevpnclientpackage_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'virtualNetworkGatewayName' => $virtualNetworkGatewayName,
            'parameters' => $parameters
        ]);
    }
    /**
     * Generates VPN profile for P2S client of the virtual network gateway in the specified resource group. Used for IKEV2 and radius based authentication.
     * @param string $resourceGroupName
     * @param string $virtualNetworkGatewayName
     * @param array $parameters
     * @return string
     */
    public function generateVpnProfile(
        $resourceGroupName,
        $virtualNetworkGatewayName,
        array $parameters
    )
    {
        return $this->_GenerateVpnProfile_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'virtualNetworkGatewayName' => $virtualNetworkGatewayName,
            'parameters' => $parameters
        ]);
    }
    /**
     * The GetBgpPeerStatus operation retrieves the status of all BGP peers.
     * @param string $resourceGroupName
     * @param string $virtualNetworkGatewayName
     * @param string $peer
     * @return array
     */
    public function getBgpPeerStatus(
        $resourceGroupName,
        $virtualNetworkGatewayName,
        $peer
    )
    {
        return $this->_GetBgpPeerStatus_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'virtualNetworkGatewayName' => $virtualNetworkGatewayName,
            'peer' => $peer
        ]);
    }
    /**
     * This operation retrieves a list of routes the virtual network gateway has learned, including routes learned from BGP peers.
     * @param string $resourceGroupName
     * @param string $virtualNetworkGatewayName
     * @return array
     */
    public function getLearnedRoutes(
        $resourceGroupName,
        $virtualNetworkGatewayName
    )
    {
        return $this->_GetLearnedRoutes_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'virtualNetworkGatewayName' => $virtualNetworkGatewayName
        ]);
    }
    /**
     * This operation retrieves a list of routes the virtual network gateway is advertising to the specified peer.
     * @param string $resourceGroupName
     * @param string $virtualNetworkGatewayName
     * @param string $peer
     * @return array
     */
    public function getAdvertisedRoutes(
        $resourceGroupName,
        $virtualNetworkGatewayName,
        $peer
    )
    {
        return $this->_GetAdvertisedRoutes_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'virtualNetworkGatewayName' => $virtualNetworkGatewayName,
            'peer' => $peer
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
    private $_List_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListConnections_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Reset_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Generatevpnclientpackage_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_GenerateVpnProfile_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_GetBgpPeerStatus_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_GetLearnedRoutes_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_GetAdvertisedRoutes_operation;
}
