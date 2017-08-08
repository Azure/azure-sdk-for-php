<?php
namespace Microsoft\Azure\Management\Network\_2016_12_01;
final class ExpressRouteCircuitPeerings
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_Delete_operation = $_client->createOperation('ExpressRouteCircuitPeerings_Delete');
        $this->_Get_operation = $_client->createOperation('ExpressRouteCircuitPeerings_Get');
        $this->_CreateOrUpdate_operation = $_client->createOperation('ExpressRouteCircuitPeerings_CreateOrUpdate');
        $this->_List_operation = $_client->createOperation('ExpressRouteCircuitPeerings_List');
    }
    /**
     * Deletes the specified peering from the specified express route circuit.
     * @param string $resourceGroupName
     * @param string $circuitName
     * @param string $peeringName
     */
    public function delete(
        $resourceGroupName,
        $circuitName,
        $peeringName
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'circuitName' => $circuitName,
            'peeringName' => $peeringName
        ]);
    }
    /**
     * Gets the specified authorization from the specified express route circuit.
     * @param string $resourceGroupName
     * @param string $circuitName
     * @param string $peeringName
     * @return array
     */
    public function get(
        $resourceGroupName,
        $circuitName,
        $peeringName
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'circuitName' => $circuitName,
            'peeringName' => $peeringName
        ]);
    }
    /**
     * Creates or updates a peering in the specified express route circuits.
     * @param string $resourceGroupName
     * @param string $circuitName
     * @param string $peeringName
     * @param array $peeringParameters
     * @return array
     */
    public function createOrUpdate(
        $resourceGroupName,
        $circuitName,
        $peeringName,
        array $peeringParameters
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'circuitName' => $circuitName,
            'peeringName' => $peeringName,
            'peeringParameters' => $peeringParameters
        ]);
    }
    /**
     * Gets all peerings in a specified express route circuit.
     * @param string $resourceGroupName
     * @param string $circuitName
     * @return array
     */
    public function list_(
        $resourceGroupName,
        $circuitName
    )
    {
        return $this->_List_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'circuitName' => $circuitName
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
