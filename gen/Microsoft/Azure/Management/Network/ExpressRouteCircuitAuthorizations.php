<?php
namespace Microsoft\Azure\Management\Network;
final class ExpressRouteCircuitAuthorizations
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_Delete_operation = $_client->createOperation('ExpressRouteCircuitAuthorizations_Delete');
        $this->_Get_operation = $_client->createOperation('ExpressRouteCircuitAuthorizations_Get');
        $this->_CreateOrUpdate_operation = $_client->createOperation('ExpressRouteCircuitAuthorizations_CreateOrUpdate');
        $this->_List_operation = $_client->createOperation('ExpressRouteCircuitAuthorizations_List');
    }
    /**
     * Deletes the specified authorization from the specified express route circuit.
     * @param string $resourceGroupName
     * @param string $circuitName
     * @param string $authorizationName
     */
    public function delete(
        $resourceGroupName,
        $circuitName,
        $authorizationName
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'circuitName' => $circuitName,
            'authorizationName' => $authorizationName
        ]);
    }
    /**
     * Gets the specified authorization from the specified express route circuit.
     * @param string $resourceGroupName
     * @param string $circuitName
     * @param string $authorizationName
     * @return array
     */
    public function get(
        $resourceGroupName,
        $circuitName,
        $authorizationName
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'circuitName' => $circuitName,
            'authorizationName' => $authorizationName
        ]);
    }
    /**
     * Creates or updates an authorization in the specified express route circuit.
     * @param string $resourceGroupName
     * @param string $circuitName
     * @param string $authorizationName
     * @param array $authorizationParameters
     * @return array
     */
    public function createOrUpdate(
        $resourceGroupName,
        $circuitName,
        $authorizationName,
        array $authorizationParameters
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'circuitName' => $circuitName,
            'authorizationName' => $authorizationName,
            'authorizationParameters' => $authorizationParameters
        ]);
    }
    /**
     * Gets all authorizations in an express route circuit.
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
