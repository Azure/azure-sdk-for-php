<?php
namespace Microsoft\Azure\Management\Network;
final class VirtualNetworkPeerings
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_Delete_operation = $_client->createOperation('VirtualNetworkPeerings_Delete');
        $this->_Get_operation = $_client->createOperation('VirtualNetworkPeerings_Get');
        $this->_CreateOrUpdate_operation = $_client->createOperation('VirtualNetworkPeerings_CreateOrUpdate');
        $this->_List_operation = $_client->createOperation('VirtualNetworkPeerings_List');
    }
    /**
     * Deletes the specified virtual network peering.
     * @param string $resourceGroupName
     * @param string $virtualNetworkName
     * @param string $virtualNetworkPeeringName
     */
    public function delete(
        $resourceGroupName,
        $virtualNetworkName,
        $virtualNetworkPeeringName
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'virtualNetworkName' => $virtualNetworkName,
            'virtualNetworkPeeringName' => $virtualNetworkPeeringName
        ]);
    }
    /**
     * Gets the specified virtual network peering.
     * @param string $resourceGroupName
     * @param string $virtualNetworkName
     * @param string $virtualNetworkPeeringName
     * @return array
     */
    public function get(
        $resourceGroupName,
        $virtualNetworkName,
        $virtualNetworkPeeringName
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'virtualNetworkName' => $virtualNetworkName,
            'virtualNetworkPeeringName' => $virtualNetworkPeeringName
        ]);
    }
    /**
     * Creates or updates a peering in the specified virtual network.
     * @param string $resourceGroupName
     * @param string $virtualNetworkName
     * @param string $virtualNetworkPeeringName
     * @param array $virtualNetworkPeeringParameters
     * @return array
     */
    public function createOrUpdate(
        $resourceGroupName,
        $virtualNetworkName,
        $virtualNetworkPeeringName,
        array $virtualNetworkPeeringParameters
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'virtualNetworkName' => $virtualNetworkName,
            'virtualNetworkPeeringName' => $virtualNetworkPeeringName,
            'VirtualNetworkPeeringParameters' => $virtualNetworkPeeringParameters
        ]);
    }
    /**
     * Gets all virtual network peerings in a virtual network.
     * @param string $resourceGroupName
     * @param string $virtualNetworkName
     * @return array
     */
    public function list_(
        $resourceGroupName,
        $virtualNetworkName
    )
    {
        return $this->_List_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'virtualNetworkName' => $virtualNetworkName
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
}
