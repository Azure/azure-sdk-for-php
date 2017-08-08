<?php
namespace Microsoft\Azure\Management\Network\_2016_12_01;
final class VirtualNetworks
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_Delete_operation = $_client->createOperation('VirtualNetworks_Delete');
        $this->_Get_operation = $_client->createOperation('VirtualNetworks_Get');
        $this->_CreateOrUpdate_operation = $_client->createOperation('VirtualNetworks_CreateOrUpdate');
        $this->_ListAll_operation = $_client->createOperation('VirtualNetworks_ListAll');
        $this->_List_operation = $_client->createOperation('VirtualNetworks_List');
        $this->_CheckIPAddressAvailability_operation = $_client->createOperation('VirtualNetworks_CheckIPAddressAvailability');
    }
    /**
     * Deletes the specified virtual network.
     * @param string $resourceGroupName
     * @param string $virtualNetworkName
     */
    public function delete(
        $resourceGroupName,
        $virtualNetworkName
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'virtualNetworkName' => $virtualNetworkName
        ]);
    }
    /**
     * Gets the specified virtual network by resource group.
     * @param string $resourceGroupName
     * @param string $virtualNetworkName
     * @param string $_expand
     * @return array
     */
    public function get(
        $resourceGroupName,
        $virtualNetworkName,
        $_expand
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'virtualNetworkName' => $virtualNetworkName,
            '$expand' => $_expand
        ]);
    }
    /**
     * Creates or updates a virtual network in the specified resource group.
     * @param string $resourceGroupName
     * @param string $virtualNetworkName
     * @param array $parameters
     * @return array
     */
    public function createOrUpdate(
        $resourceGroupName,
        $virtualNetworkName,
        array $parameters
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'virtualNetworkName' => $virtualNetworkName,
            'parameters' => $parameters
        ]);
    }
    /**
     * Gets all virtual networks in a subscription.
     * @return array
     */
    public function listAll()
    {
        return $this->_ListAll_operation->call([]);
    }
    /**
     * Gets all virtual networks in a resource group.
     * @param string $resourceGroupName
     * @return array
     */
    public function list_($resourceGroupName)
    {
        return $this->_List_operation->call(['resourceGroupName' => $resourceGroupName]);
    }
    /**
     * Checks whether a private IP address is available for use.
     * @param string $ipAddress
     * @param string $resourceGroupName
     * @param string $virtualNetworkName
     * @return array
     */
    public function checkIPAddressAvailability(
        $ipAddress,
        $resourceGroupName,
        $virtualNetworkName
    )
    {
        return $this->_CheckIPAddressAvailability_operation->call([
            'ipAddress' => $ipAddress,
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
    private $_ListAll_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_List_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_CheckIPAddressAvailability_operation;
}
