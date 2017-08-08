<?php
namespace Microsoft\Azure\Management\Network\_2016_12_01;
final class ExpressRouteCircuits
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_Delete_operation = $_client->createOperation('ExpressRouteCircuits_Delete');
        $this->_Get_operation = $_client->createOperation('ExpressRouteCircuits_Get');
        $this->_CreateOrUpdate_operation = $_client->createOperation('ExpressRouteCircuits_CreateOrUpdate');
        $this->_ListArpTable_operation = $_client->createOperation('ExpressRouteCircuits_ListArpTable');
        $this->_ListRoutesTable_operation = $_client->createOperation('ExpressRouteCircuits_ListRoutesTable');
        $this->_ListRoutesTableSummary_operation = $_client->createOperation('ExpressRouteCircuits_ListRoutesTableSummary');
        $this->_GetStats_operation = $_client->createOperation('ExpressRouteCircuits_GetStats');
        $this->_GetPeeringStats_operation = $_client->createOperation('ExpressRouteCircuits_GetPeeringStats');
        $this->_List_operation = $_client->createOperation('ExpressRouteCircuits_List');
        $this->_ListAll_operation = $_client->createOperation('ExpressRouteCircuits_ListAll');
    }
    /**
     * Deletes the specified express route circuit.
     * @param string $resourceGroupName
     * @param string $circuitName
     */
    public function delete(
        $resourceGroupName,
        $circuitName
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'circuitName' => $circuitName
        ]);
    }
    /**
     * Gets information about the specified express route circuit.
     * @param string $resourceGroupName
     * @param string $circuitName
     * @return array
     */
    public function get(
        $resourceGroupName,
        $circuitName
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'circuitName' => $circuitName
        ]);
    }
    /**
     * Creates or updates an express route circuit.
     * @param string $resourceGroupName
     * @param string $circuitName
     * @param array $parameters
     * @return array
     */
    public function createOrUpdate(
        $resourceGroupName,
        $circuitName,
        array $parameters
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'circuitName' => $circuitName,
            'parameters' => $parameters
        ]);
    }
    /**
     * Gets the currently advertised ARP table associated with the express route circuit in a resource group.
     * @param string $resourceGroupName
     * @param string $circuitName
     * @param string $peeringName
     * @param string $devicePath
     * @return array
     */
    public function listArpTable(
        $resourceGroupName,
        $circuitName,
        $peeringName,
        $devicePath
    )
    {
        return $this->_ListArpTable_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'circuitName' => $circuitName,
            'peeringName' => $peeringName,
            'devicePath' => $devicePath
        ]);
    }
    /**
     * Gets the currently advertised routes table associated with the express route circuit in a resource group.
     * @param string $resourceGroupName
     * @param string $circuitName
     * @param string $peeringName
     * @param string $devicePath
     * @return array
     */
    public function listRoutesTable(
        $resourceGroupName,
        $circuitName,
        $peeringName,
        $devicePath
    )
    {
        return $this->_ListRoutesTable_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'circuitName' => $circuitName,
            'peeringName' => $peeringName,
            'devicePath' => $devicePath
        ]);
    }
    /**
     * Gets the currently advertised routes table summary associated with the express route circuit in a resource group.
     * @param string $resourceGroupName
     * @param string $circuitName
     * @param string $peeringName
     * @param string $devicePath
     * @return array
     */
    public function listRoutesTableSummary(
        $resourceGroupName,
        $circuitName,
        $peeringName,
        $devicePath
    )
    {
        return $this->_ListRoutesTableSummary_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'circuitName' => $circuitName,
            'peeringName' => $peeringName,
            'devicePath' => $devicePath
        ]);
    }
    /**
     * Gets all the stats from an express route circuit in a resource group.
     * @param string $resourceGroupName
     * @param string $circuitName
     * @return array
     */
    public function getStats(
        $resourceGroupName,
        $circuitName
    )
    {
        return $this->_GetStats_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'circuitName' => $circuitName
        ]);
    }
    /**
     * Gets all stats from an express route circuit in a resource group.
     * @param string $resourceGroupName
     * @param string $circuitName
     * @param string $peeringName
     * @return array
     */
    public function getPeeringStats(
        $resourceGroupName,
        $circuitName,
        $peeringName
    )
    {
        return $this->_GetPeeringStats_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'circuitName' => $circuitName,
            'peeringName' => $peeringName
        ]);
    }
    /**
     * Gets all the express route circuits in a resource group.
     * @param string $resourceGroupName
     * @return array
     */
    public function list_($resourceGroupName)
    {
        return $this->_List_operation->call(['resourceGroupName' => $resourceGroupName]);
    }
    /**
     * Gets all the express route circuits in a subscription.
     * @return array
     */
    public function listAll()
    {
        return $this->_ListAll_operation->call([]);
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
    private $_ListArpTable_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListRoutesTable_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListRoutesTableSummary_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_GetStats_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_GetPeeringStats_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_List_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListAll_operation;
}
