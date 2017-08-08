<?php
namespace Microsoft\Azure\Management\Network\_2016_12_01;
final class Subnets
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_Delete_operation = $_client->createOperation('Subnets_Delete');
        $this->_Get_operation = $_client->createOperation('Subnets_Get');
        $this->_CreateOrUpdate_operation = $_client->createOperation('Subnets_CreateOrUpdate');
        $this->_List_operation = $_client->createOperation('Subnets_List');
    }
    /**
     * Deletes the specified subnet.
     * @param string $resourceGroupName
     * @param string $virtualNetworkName
     * @param string $subnetName
     */
    public function delete(
        $resourceGroupName,
        $virtualNetworkName,
        $subnetName
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'virtualNetworkName' => $virtualNetworkName,
            'subnetName' => $subnetName
        ]);
    }
    /**
     * Gets the specified subnet by virtual network and resource group.
     * @param string $resourceGroupName
     * @param string $virtualNetworkName
     * @param string $subnetName
     * @param string $_expand
     * @return array
     */
    public function get(
        $resourceGroupName,
        $virtualNetworkName,
        $subnetName,
        $_expand
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'virtualNetworkName' => $virtualNetworkName,
            'subnetName' => $subnetName,
            '$expand' => $_expand
        ]);
    }
    /**
     * Creates or updates a subnet in the specified virtual network.
     * @param string $resourceGroupName
     * @param string $virtualNetworkName
     * @param string $subnetName
     * @param array $subnetParameters
     * @return array
     */
    public function createOrUpdate(
        $resourceGroupName,
        $virtualNetworkName,
        $subnetName,
        array $subnetParameters
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'virtualNetworkName' => $virtualNetworkName,
            'subnetName' => $subnetName,
            'subnetParameters' => $subnetParameters
        ]);
    }
    /**
     * Gets all subnets in a virtual network.
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
